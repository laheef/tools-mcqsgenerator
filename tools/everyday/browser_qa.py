"""
Browser QA for the everyday-life pack.

Type a set of values into each page's own boxes, press Calculate, read the result
boxes back from the DOM, and compare them with the numbers worked out
independently in Python. This is the only check that sees what a visitor sees:
the value in the box after the arithmetic, not the value the solver holds.

    python3 tools/everyday/browser_qa.py [slug,slug] [--host=http://127.0.0.1:8099]
"""

from __future__ import annotations

import argparse
import os
import re
import sys

sys.path.insert(0, os.path.dirname(__file__))

from lib import solve, to_day  # noqa: E402
import build  # noqa: E402

from playwright.sync_api import sync_playwright  # noqa: E402

SET_JS = """([pairs]) => {
    const done = [];
    for (const [name, value] of pairs) {
        const holder = document.querySelector('.calc-field[data-var="' + name + '"]');
        let el = holder && holder.matches('fieldset')
            ? [...holder.querySelectorAll('input[type=radio]')].find(r => {
                  const lab = r.closest('label');
                  return (lab ? lab.textContent : r.value).trim() === String(value);
              })
            : document.querySelector('.calc-field:not([data-output]) [data-var="' + name + '"]');
        if (!holder || !el) continue;
        if (holder.matches('fieldset')) {
            el.checked = true;
            el.dispatchEvent(new Event('input', { bubbles: true }));
            el.dispatchEvent(new Event('change', { bubbles: true }));
            done.push(name);
            continue;
        }
        if (el.tagName === 'SELECT') {
            const opt = [...el.options].find(o => o.textContent.trim() === String(value))
                     || [...el.options].find(o => o.value === String(value));
            if (opt) { el.value = opt.value; }
        } else {
            el.value = value;
        }
        el.dispatchEvent(new Event('input', { bubbles: true }));
        el.dispatchEvent(new Event('change', { bubbles: true }));
        done.push(name);
    }
    return done;
}"""

# Results come back from two places. A number the page gives its own box is
# read from that box; a date the page prints as a sentence ("Mon 19 October
# 2026") has no box at all and is read from the results panel, which is where
# the visitor reads it. Reading only the boxes made every date answer look
# missing.
READ_JS = """() => {
    const out = {};
    document.querySelectorAll('[data-var]').forEach(el => {
        if (el.tagName !== 'INPUT' && el.tagName !== 'TEXTAREA') return;
        const field = el.closest('.calc-field');
        if (!field || !field.hasAttribute('data-output')) return;
        out[el.getAttribute('data-var')] = String(el.value === undefined ? '' : el.value);
    });
    /* The answers a page has no box for — a date said in words — are added to
       the panel as extra rows, tagged data-extra-row. */
    document.querySelectorAll('[data-extra-row]').forEach(row => {
        const name = row.getAttribute('data-extra-row');
        const val = row.querySelector('.calc-result-value');
        if (val) out[name] = val.textContent.replace(/\\s+/g, ' ').trim();
    });
    document.querySelectorAll('[data-result-row]').forEach(row => {
        const name = row.getAttribute('data-result-row');
        if (out[name] !== undefined && out[name] !== '') return;
        let text = row.textContent.replace(/\\s+/g, ' ').trim();
        const label = row.querySelector('.calc-result-label');
        if (label) text = text.slice(label.textContent.replace(/\\s+/g, ' ').trim().length);
        text = text.replace(/^\\s*Copy\\s*/i, '').replace(/\\s*Copy\\s*$/, '').trim();
        out[name] = text;
    });
    return out;
}"""


MONTHS = ["January", "February", "March", "April", "May", "June", "July",
          "August", "September", "October", "November", "December"]


def parse_human_date(text: str) -> float | None:
    """"Mon 19 October 2026" as a day number, the unit the checks use."""
    m = re.search(r"(\d{1,2})\s+([A-Z][a-z]+)\s+(\d{4})", text or "")
    if not m or m.group(2) not in MONTHS:
        return None
    import datetime as _dt
    d = _dt.date(int(m.group(3)), MONTHS.index(m.group(2)) + 1, int(m.group(1)))
    return float((d - _dt.date(1970, 1, 1)).days)


def parse_number(text: str) -> float | None:
    s = (text or "").replace("\u2009", "").replace("\xa0", "").replace(" ", "").strip()
    if s == "":
        return None
    s = s.replace("×10^", "e").replace("×10", "e")
    s = s.replace(",", "")
    try:
        return float(s)
    except ValueError:
        return None


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("slugs", nargs="?", default="")
    ap.add_argument("--host", default="http://127.0.0.1:8099")
    ap.add_argument("--shots", default="")
    args = ap.parse_args()

    wanted = {s.strip() for s in args.slugs.split(",") if s.strip()}
    specs = [s for s in build.load_specs() if not wanted or s.slug in wanted]

    bad = 0
    checked = 0
    with sync_playwright() as pw:
        browser = pw.chromium.launch(args=["--no-sandbox"])
        page = browser.new_page(viewport={"width": 1280, "height": 1000})
        for spec in specs:
            for case_no, (inputs, expected, tol) in enumerate(spec.checks, 1):
                page.goto(f"{args.host}/everyday-life/{spec.slug}", wait_until="networkidle",
                          timeout=60000)
                pairs = []
                for k, v in inputs.items():
                    field = next((f for f in spec.fields if f["name"] == k), None)
                    if field and field.get("type") == "select":
                        label = next((lbl for lbl, val in field["options"].items()
                                      if float(val) == float(v)), str(v))
                        pairs.append([k, label])
                    else:
                        pairs.append([k, str(v)])
                filled = page.evaluate(SET_JS, [pairs])
                missing = [p[0] for p in pairs if p[0] not in filled]
                if missing:
                    print(f"  ! {spec.slug}: no box {missing}")
                    bad += 1
                    continue
                page.evaluate("() => { const b = document.querySelector('.calc-go'); if (b) b.click(); }")
                page.wait_for_timeout(250)
                shown = page.evaluate(READ_JS)
                for key, want in expected.items():
                    field = next((r for r in spec.results if r["name"] == key), None)
                    raw = shown.get(key, "")
                    got = parse_number(raw)
                    if got is None and field and field.get("type") == "time":
                        # a clock answer reads 10:30, and the checks are in minutes
                        hm = re.match(r"\s*(\d{1,2}):(\d{2})", raw)
                        if hm:
                            got = int(hm.group(1)) * 60 + int(hm.group(2))
                    if got is None or abs(float(want)) >= 1000:
                        human = parse_human_date(raw)
                        if human is not None and abs(float(want)) >= 1000:
                            got = human
                    checked += 1
                    if got is None:
                        print(f"  ! {spec.slug} case {case_no}: {key} reads {shown.get(key)!r}")
                        bad += 1
                        continue
                    if abs(got - float(want)) > max(tol, abs(float(want)) * 5e-4) + 1e-9:
                        print(f"  ! {spec.slug} case {case_no}: {key} shows {got}, "
                              f"worked out as {want}")
                        bad += 1
                if args.shots and case_no == 1:
                    page.screenshot(path=os.path.join(args.shots, f"{spec.slug}.png"),
                                    full_page=False)
        browser.close()

    print(f"{len(specs)} pages, {checked} on-screen readings compared, {bad} wrong")
    return 1 if bad else 0


if __name__ == "__main__":
    raise SystemExit(main())
