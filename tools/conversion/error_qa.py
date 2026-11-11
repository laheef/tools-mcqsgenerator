"""Error handling, page by page, in a real browser.

Every one of the 330 conversion calculators is loaded in Chromium and pushed
through the same seven situations a visitor can create. Nothing here checks
arithmetic — that is `answer_qa.py`. This file checks that the page behaves when
the visitor does something wrong or extreme:

  empty      every box cleared, no result, no NaN, no exception
  zero       every box 0 — no NaN, no Infinity, no crash
  huge       every box 1e12 — no overflow to Infinity in a result box
  negative   every box -5 — no NaN, no crash
  letters    "abc" typed into a number box — refused at the door, a note under
             the box, the field never holds a letter
  garbage    "12abc" set on the value and blurred — the state a paste or an
             autofill can leave behind
  markup     "<script>alert(1)</script>" typed into a text box — never executed,
             never injected into the page as HTML

Usage:
    python3 tools/conversion/error_qa.py [--limit N] [--workers 4] [--host URL]
Writes qa/R85_error_handling.json.
"""

from __future__ import annotations

import argparse
import json
import os
import sys
import traceback
from concurrent.futures import ThreadPoolExecutor
from urllib.parse import urljoin

sys.path.insert(0, os.path.dirname(os.path.abspath(__file__)))
import catalog  # noqa: E402
import browser_qa  # noqa: E402

HOST = "http://127.0.0.1:8099"
BAD = ("nan", "infinity", "undefined", "null")

FIELDS_JS = """
() => Array.from(document.querySelectorAll('.calc-field')).map(f => {
  const el = f.querySelector('[data-var]');
  return {
    name: el && el.getAttribute('data-var'),
    tag: el ? el.tagName : null,
    out: f.hasAttribute('data-output'),
    readOnly: el ? !!el.readOnly : true,
    text: el ? el.tagName === 'TEXTAREA' : false,
    label: ((f.querySelector('.calc-label') || {}).textContent || '').trim(),
  };
}).filter(f => f.name)
"""

READ_JS = """
(names) => {
  const out = {};
  names.forEach(n => {
    const el = document.querySelector('.calc-field[data-output] [data-var="' + n + '"]');
    if (el) out[n] = String(el.value === undefined ? '' : el.value).trim();
  });
  return out;
}
"""

SET_JS = """
(args) => {
  const [names, value] = args;
  names.forEach(n => {
    const el = document.querySelector('.calc-field:not([data-output]) [data-var="' + n + '"]');
    if (!el) return;
    el.value = value;
    el.dispatchEvent(new Event('input', { bubbles: true }));
    el.dispatchEvent(new Event('change', { bubbles: true }));
  });
  return names.length;
}
"""

ERRORS_JS = """
() => Array.from(document.querySelectorAll('.calc-field')).map(f => {
  const slot = f.querySelector('.calc-error');
  const el = f.querySelector('[data-var]');
  return {
    name: el && el.getAttribute('data-var'),
    msg: slot ? (slot.textContent || '').trim() : '',
    shown: slot ? !!(slot.offsetWidth || slot.offsetHeight || slot.getClientRects().length) : false,
    hasErrorClass: f.classList.contains('has-error'),
    value: el ? String(el.value || '') : '',
  };
}).filter(r => r.msg || r.hasErrorClass)
"""


def bad(results: dict) -> list[str]:
    out = []
    for name, value in results.items():
        low = value.lower()
        if any(b in low for b in BAD):
            out.append(f"{name}={value!r}")
    return out


def press(page) -> None:
    """Press Calculate the way the page expects, without depending on layout."""
    page.evaluate("""() => { const b = document.querySelector('.calc-go'); if (b) b.click(); }""")


def check(slug: str, base: str) -> dict:
    from playwright.sync_api import sync_playwright

    report = {"slug": slug, "problems": [], "answers": {}, "notes": {}}
    with sync_playwright() as pw:
        browser = pw.chromium.launch(args=["--no-sandbox"])
        page = browser.new_page(viewport={"width": 1280, "height": 900})
        errors: list[str] = []
        page.on("pageerror", lambda e: errors.append("pageerror: " + str(e)[:200]))
        page.on("console", lambda m: errors.append("console: " + m.text[:200])
                if m.type == "error" else None)
        dialogs: list[str] = []
        page.on("dialog", lambda d: (dialogs.append(d.message), d.dismiss()))

        try:
            stored = browser_qa._spec_defaults(slug)
        except Exception:                                          # noqa: BLE001
            stored = {}
        url = urljoin(base, f"/conversion/{slug}")
        page.goto(url, wait_until="networkidle", timeout=60000)
        load_errors = list(errors)
        if load_errors:
            report["problems"].append("on load: " + " | ".join(load_errors[:2]))

        fields = page.evaluate(FIELDS_JS)
        fill = [f for f in fields if not f["out"] and not f["readOnly"] and f["tag"]]
        nums = [f["name"] for f in fill if not f["text"] and f["tag"] == "INPUT"]
        texts = [f["name"] for f in fill if f["text"]]
        outs = [f["name"] for f in fields if f["out"]]
        report["notes"] = {"fill": len(fill), "numbers": len(nums),
                           "texts": len(texts), "outputs": len(outs)}
        if not outs:
            report["problems"].append("no result field on the page")
        if not fill:
            report["problems"].append("no input the visitor can type in")

        # ---- baseline: a plain value in every box, the way a visitor starts
        # The pages open blank on purpose (the stored default is a placeholder),
        # so "does it answer at all" has to be asked after typing something.
        press(page)
        if nums:
            page.evaluate(SET_JS, [nums, "2"])
        for name in texts:
            page.evaluate(SET_JS, [[name], stored.get(name) or "hello"])
        page.wait_for_timeout(150)
        press(page)
        page.wait_for_timeout(250)
        answers = page.evaluate(READ_JS, outs)
        report["answers"] = answers
        if not any(v for v in answers.values()):
            report["problems"].append("no answer with 2 in every box")
        for hit in bad(answers):
            report["problems"].append("baseline answer is not a number: " + hit)

        # ---- empty
        if nums:
            page.evaluate(SET_JS, [nums, ""])
            press(page)
            page.wait_for_timeout(200)
            empty = page.evaluate(READ_JS, outs)
            for hit in bad(empty):
                report["problems"].append("empty input: " + hit)
            report["notes"]["empty"] = empty

        # ---- zero
        if nums:
            page.evaluate(SET_JS, [nums, "0"])
            press(page)
            page.wait_for_timeout(200)
            zero = page.evaluate(READ_JS, outs)
            for hit in bad(zero):
                report["problems"].append("all zeros: " + hit)

        # ---- huge
        if nums:
            page.evaluate(SET_JS, [nums, "1000000000000"])
            press(page)
            page.wait_for_timeout(200)
            huge = page.evaluate(READ_JS, outs)
            for hit in bad(huge):
                report["problems"].append("1e12 input: " + hit)

        # ---- negative
        if nums:
            page.evaluate(SET_JS, [nums, "-5"])
            press(page)
            page.wait_for_timeout(200)
        neg = page.evaluate(READ_JS, outs)
        for hit in bad(neg):
            report["problems"].append("negative input: " + hit)

        # ---- letters, typed, as a visitor types them
        if nums:
            first = page.query_selector(
                f'.calc-field:not([data-output]) [data-var="{nums[0]}"]')
            page.evaluate(SET_JS, [nums, ""])
            if first:
                try:
                    first.click(timeout=4000)
                except Exception:                                      # noqa: BLE001
                    # A sticky header or a cookie strip can sit over the box at
                    # one scroll position; focusing it is what the test needs.
                    first.focus()
                page.keyboard.press("Control+a")
                page.keyboard.type("abc", delay=12)
                page.wait_for_timeout(220)
                state = page.evaluate(ERRORS_JS)
                value = first.input_value()
                report["notes"]["letter_value"] = value
                report["notes"]["letter_note"] = state
                if any(ch.isalpha() for ch in value):
                    report["problems"].append(f"a letter survived in {nums[0]}: {value!r}")
                mine = [s for s in state if s["name"] == nums[0] and s["msg"]]
                if not mine:
                    report["problems"].append("typing letters gave no note under the box")
                elif not mine[0]["shown"]:
                    report["problems"].append("the note under the box is not visible")
                after = page.evaluate(READ_JS, outs)
                for hit in bad(after):
                    report["problems"].append("after letters: " + hit)

        # ---- garbage left in the box (paste / autofill / drag)
        if nums:
            page.evaluate(SET_JS, [nums, "12abc"])
            press(page)
            page.wait_for_timeout(200)
            garbage = page.evaluate(READ_JS, outs)
            for hit in bad(garbage):
                report["problems"].append("garbage in box: " + hit)
            state = page.evaluate(ERRORS_JS)
            kept = page.evaluate(
                f'() => {{ const e = document.querySelector(".calc-field:not([data-output]) [data-var=\\"{nums[0]}\\"]"); return e ? e.value : null; }}')
            if kept and any(ch.isalpha() for ch in kept):
                mine = [s for s in state if s["name"] == nums[0] and s["msg"]]
                if not mine:
                    report["problems"].append("a letter sat in the box with no note")

        # ---- markup in a text box
        if texts:
            payload = '<script>alert(1)</script><img src=x onerror=alert(2)>'
            try:
                page.evaluate(SET_JS, [texts, payload])
                press(page)
                page.wait_for_timeout(300)
            except Exception as exc:  # noqa: BLE001
                report["problems"].append("text box threw on markup: " + str(exc)[:120])
            if dialogs:
                report["problems"].append("markup was executed: " + " / ".join(dialogs[:2]))
            injected = page.evaluate(
                "() => document.querySelectorAll('.calc-field script, .calc-field img[onerror]').length")
            if injected:
                report["problems"].append("markup was injected into the form as HTML")

        if errors[len(load_errors):]:
            report["problems"].append("runtime: " + " | ".join(errors[len(load_errors):][:2]))

        browser.close()
    return report


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--host", default=HOST)
    ap.add_argument("--workers", type=int, default=4)
    ap.add_argument("--limit", type=int, default=0)
    args = ap.parse_args()

    slugs = [r["slug"] for r in catalog.inventory()]
    if args.limit:
        slugs = slugs[: args.limit]

    reports: list[dict] = []

    def run(slug: str) -> dict:
        try:
            return check(slug, args.host)
        except Exception as exc:  # noqa: BLE001
            return {"slug": slug, "problems": ["harness: " + str(exc)[:180]],
                    "answers": {}, "notes": {"trace": traceback.format_exc()[-400:]}}

    with ThreadPoolExecutor(max_workers=args.workers) as pool:
        for i, rep in enumerate(pool.map(run, slugs), 1):
            reports.append(rep)
            if i % 25 == 0:
                print(f"  {i}/{len(slugs)}", flush=True)

    bad_pages = [r for r in reports if r["problems"]]
    out = os.path.join(os.path.dirname(os.path.abspath(__file__)), "..", "..",
                       "qa", "R85_error_handling.json")
    with open(out, "w", encoding="utf-8") as fh:
        json.dump(reports, fh, indent=1, ensure_ascii=False)

    print(f"\n{len(reports) - len(bad_pages)}/{len(reports)} pages handled every case cleanly")
    kinds: dict[str, int] = {}
    for r in reports:
        for p in r["problems"]:
            key = p.split(":")[0][:44]
            kinds[key] = kinds.get(key, 0) + 1
    for key, n in sorted(kinds.items(), key=lambda z: -z[1]):
        print(f"  {n:4}  {key}")
    for r in bad_pages[:40]:
        print("  !", r["slug"], "->", "; ".join(r["problems"])[:150])
    return 0 if not bad_pages else 1


if __name__ == "__main__":
    raise SystemExit(main())
