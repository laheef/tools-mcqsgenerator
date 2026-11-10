"""Browser QA for a batch of converted biology calculators.

Loads each page in a real Chromium, fills every visible field the way a visitor
would (real typing, real clicks), presses Calculate, and reads the results panel
and the answer boxes back.

    python3 tools/biology/browser_batch.py slug1 slug2 …
"""

from __future__ import annotations

import json
import os
import subprocess
import sys
import tempfile

from playwright.sync_api import sync_playwright

BASE = os.environ.get("CALC_BASE", "http://127.0.0.1:8080")
PREFIX = os.environ.get("CALC_PREFIX", "/biology/")   # live serves /tool/biology/

FILL = """
(vals) => {
  const vis = el => !!(el.offsetWidth || el.offsetHeight || el.getClientRects().length);
  const set = (el, v) => {
    const proto = el.tagName === 'TEXTAREA' ? HTMLTextAreaElement.prototype : HTMLInputElement.prototype;
    Object.getOwnPropertyDescriptor(proto, 'value').set.call(el, v);
    el.dispatchEvent(new Event('input', { bubbles: true }));
    el.dispatchEvent(new Event('change', { bubbles: true }));
  };
  const fields = [...document.querySelectorAll('.calc-widget .calc-field[data-var]')]
    .filter(f => !f.hasAttribute('data-output') && vis(f));
  const seen = new Set(); let n = 0;
  for (const f of fields) {
    const name = f.getAttribute('data-var');
    if (seen.has(name)) continue; seen.add(name);
    const radios = [...f.querySelectorAll('input[type=radio]')].filter(r => r.value);
    if (radios.length) { const r = radios.find(x => x.checked) || radios[0]; if (!r.checked) r.click(); n++; continue; }
    const chk = f.querySelector('input[type=checkbox]');
    if (chk) { if (!chk.checked) chk.click(); n++; continue; }
    const sel = f.querySelector('select');
    if (sel) { const o = [...sel.options].find(o => o.value !== ''); if (o && sel.value === '') { sel.value = o.value; sel.dispatchEvent(new Event('change', {bubbles:true})); n++; } continue; }
    const el = f.querySelector('input, textarea');
    if (!el) continue;
    if ((el.value || '').trim() !== '') { n++; continue; }
    let v = vals.num;
    if (el.type === 'date') v = vals.date;
    else if (el.tagName === 'TEXTAREA' || el.dataset.datetype === 'text') v = vals.text;
    const mn = parseFloat(el.getAttribute('min')), mx = parseFloat(el.getAttribute('max'));
    if (!isNaN(mn) && parseFloat(v) < mn) v = String(mn);
    if (!isNaN(mx) && parseFloat(v) > mx) v = String(Math.min(mx, 0.4));
    set(el, v); n++;
  }
  const go = document.querySelector('.calc-go[data-calc-go]');
  if (go) go.click();
  return n;
}
"""

READ = """
() => {
  const g = document.querySelector('[data-calculator]');
  const rows = [...document.querySelectorAll('.calc-results .calc-result')]
    .map(r => r.innerText.replace(/\\s+/g, ' ').trim()).filter(Boolean);
  /*
   * A result row holds its number in an input, and innerText does not reach it:
   * a page whose answers were all empty still produced three rows, and the
   * sweep called it answered. The value is what is read now.
   */
  const boxes = [...document.querySelectorAll('.calc-results input, .calc-results textarea, .calc-field[data-output] input')]
    .map(e => [e.closest('[data-result-slot]')?.getAttribute('data-result-slot')
                || e.closest('[data-var]')?.getAttribute('data-var') || '', (e.value || '').trim()]);
  const filled = boxes.filter(x => x[1] !== '');
  const errs = [...document.querySelectorAll('.calc-widget .calc-help, .calc-msg')]
    .map(e => e.innerText.trim())
    .filter(t => /required|enter a value from|outside/i.test(t));
  return { state: g ? g.getAttribute('data-results') : null,
           rows: rows.slice(0, 4), nrows: rows.length,
           boxes: filled.slice(0, 4), nboxes: filled.length,
           slots: boxes.length, errs: errs.slice(0, 2) };
}
"""

VALUES = [
    {"num": "2", "date": "2026-03-01", "text": "ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAG"},
    {"num": "10", "date": "2025-07-14", "text": "ATGGCCTTTAAAGGCCCCGGGTTTAAACCCGGGTTTAAACC"},
    {"num": "0.4", "date": "2024-02-20", "text": "ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGATG"},
]


def fill_like_a_visitor(page, values: dict, inputs: dict[str, str]) -> int:
    """Type into the boxes the record says are inputs, the way a visitor would.

    `inputs` maps a variable name to its type, read from the page's own record:
    a box the record calls a result is stepped over, whatever it looks like.
    """
    filled = 0
    for name, kind in inputs.items():
        if kind in ("dependent", "presentation"):
            continue
        field = page.locator(f'.calc-widget .calc-field[data-var="{name}"]').first
        if not field.count():
            continue
        try:
            if not field.is_visible():
                continue
        except Exception:
            continue
        radios = field.locator("input[type=radio]")
        if radios.count():
            try:
                radios.first.check()
            except Exception:
                pass
            filled += 1
            continue
        check = field.locator("input[type=checkbox]")
        if check.count():
            try:
                if not check.first.is_checked():
                    check.first.check()
            except Exception:
                pass
            filled += 1
            continue
        box = field.locator("input[type=text], input[type=number], textarea").first
        if box.count():
            try:
                if box.input_value().strip():
                    filled += 1
                    continue
            except Exception:
                pass
            value = values["num"]
            if box.evaluate("e => e.tagName") == "TEXTAREA" or box.get_attribute("data-datetype") == "text":
                value = values["text"]
            try:
                lo, hi = box.get_attribute("min"), box.get_attribute("max")
                if lo is not None and float(value) < float(lo):
                    value = lo
                if hi is not None and float(value) > float(hi):
                    value = hi
            except Exception:
                pass
            try:
                box.click()
                box.type(value, delay=12)
                filled += 1
            except Exception:
                pass
            continue
        date = field.locator("input[type=date]").first
        if date.count():
            try:
                date.fill(values["date"])          # a date box wants a whole date
                filled += 1
            except Exception:
                pass
            continue
        select = field.locator("select").first
        if select.count():
            try:
                select.select_option(index=1)
                filled += 1
            except Exception:
                pass
            continue
    return filled


def inputs_of(slug: str) -> dict[str, str]:
    table = json.load(open(os.path.join(tempfile.gettempdir(), "inputs.json")))
    return table.get(slug, {})


def write_inputs(slugs: list[str]) -> None:
    """Ask the site itself which boxes each page calls inputs."""
    php = os.path.join(os.path.dirname(__file__), "inputs.php")
    subprocess.run(["php", php, *slugs], check=True, capture_output=True)


def fill_subset(page, values: dict, inputs: dict[str, str], limit: int | None) -> int:
    """Fill at most `limit` of the record's inputs, in form order."""
    chosen = {k: v for k, v in list(inputs.items())[:limit]} if limit else inputs
    return fill_like_a_visitor(page, values, chosen)


def formula_page(inputs: dict[str, str]) -> bool:
    """True when every field is also a result: the page works either way round."""
    kinds = [k for k, t in inputs.items() if t not in ("dependent", "presentation")]
    return len(kinds) > 1


def check(slug: str) -> dict:
    """Try the page the way its own gate asks to be used.

    A converter answers when one side is given; a calculator answers when the
    inputs are filled. So the same page is tried with one value, then two, then
    every input, and the first attempt that produces a result is the one
    reported — with how many boxes it took.
    """
    out = {"slug": slug, "answered": False}
    inputs = inputs_of(slug)
    with sync_playwright() as p:
        browser = p.chromium.launch()
        page = browser.new_page(viewport={"width": 1400, "height": 1000})
        errors: list[str] = []
        page.on("pageerror", lambda e: errors.append(str(e)[:160]))
        attempts = [1, 2, None] if formula_page(inputs) else [None, 1]
        for limit in attempts:
            for values in VALUES:
                page.goto(f"{BASE}{PREFIX}{slug}", wait_until="domcontentloaded", timeout=25000)
                page.wait_for_timeout(260)
                filled = fill_subset(page, values, inputs, limit)
                page.wait_for_timeout(140)
                button = page.locator(".calc-go[data-calc-go]")
                if button.count():
                    button.click()
                page.wait_for_timeout(430)
                read = page.evaluate(READ)
                # An answered page shows a value. A panel of empty boxes is a
                # page of empty boxes; only a page with no result box at all
                # can be answered by its sentences alone.
                # A page with result boxes answers when it fills one. A page that
                # answers through injected prose alone is accepted only when it
                # says so: state=shown, rows, and no empty box left behind.
                answered = read["nboxes"] > 0 or (
                    read.get("state") == "shown" and read.get("slots", 0) == 0 and read["nrows"] > 0
                )
                out.update(read)
                out["filled"] = filled
                out["limit"] = limit
                out["errors"] = errors[:2]
                if answered:
                    out["answered"] = True
                    out["values"] = values["num"]
                    browser.close()
                    return out
        browser.close()
    return out


def main() -> int:
    slugs = sys.argv[1:]
    write_inputs(slugs)
    results = [check(s) for s in slugs]
    bad = [r for r in results if not r["answered"]]
    for r in results:
        flag = "ok  " if r["answered"] else "NONE"
        print(f"{flag} {r['slug']:<32} state={r.get('state')} rows={r.get('nrows')} "
              f"boxes={r.get('nboxes')} err={r.get('errs')}")
        if r["answered"]:
            print("       ", "; ".join(r["rows"][:2] or [b[0] + "=" + b[1] for b in r["boxes"][:2]]))
    print(f"\n{len(results) - len(bad)} answered, {len(bad)} did not")
    json.dump(results, open(os.environ.get("CALC_OUT", "/tmp/browser_batch.json"), "w"), indent=1)
    return 0 if not bad else 1


if __name__ == "__main__":
    sys.exit(main())
