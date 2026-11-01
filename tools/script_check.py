#!/usr/bin/env python3
"""
script_check.py — verify the calculators that depend on a page script.

These pages have no (or few) usable closed-form equations: the result comes from
the reference site's own JavaScript, which we ship and evaluate in the browser.
That makes them the group where "looks fine" and "actually works" can differ, so
each one is exercised for real: fill every visible number box, then require that
the widget's text changes and that no console error appears.

Usage:  python3 tools/script_check.py --group script --limit 60 --jobs 4
        python3 tools/script_check.py --paths /math/average,/math/xor
"""
from __future__ import annotations

import argparse
import asyncio
import json
import sys
from pathlib import Path

from playwright.async_api import async_playwright

ROOT = Path(__file__).resolve().parent.parent
SUPPORT = ROOT / "php-clone" / "data" / "calc" / "support.json"

FILL = """
async () => {
  const w = document.querySelector('[data-calculator]');
  let actions = 0;
  // 1. number boxes: type a new value. A sequence box is an <input type=text>
  //    with data-datetype="text" or a <textarea>; both take a word, not a number.
  const boxes = [...w.querySelectorAll('input[data-var], textarea[data-var]')]
      .filter(i => !i.readOnly && i.type !== 'radio');
  for (let k = 0; k < boxes.length && actions < 4; k++) {
    const b = boxes[k];
    b.focus();
    const isText = b.tagName === 'TEXTAREA' || b.getAttribute('data-datetype') === 'text';
    b.value = isText ? 'Hello World' : String(5 + k);
    b.dispatchEvent(new Event('input', {bubbles: true}));
    b.dispatchEvent(new Event('change', {bubbles: true}));
    actions++;
  }
  // 1b. drop-downs: choose a different option (the dice rollers have no boxes)
  const selects = [...w.querySelectorAll('select')].filter(s => !s.disabled);
  for (const sel of selects.slice(0, 3)) {
    if (sel.options.length < 2) continue;
    sel.selectedIndex = (sel.selectedIndex + 1) % sel.options.length;
    sel.dispatchEvent(new Event('change', {bubbles: true}));
    sel.dispatchEvent(new Event('input', {bubbles: true}));
    actions++;
  }
  // 1c. checkboxes that reveal or switch something (the duckling page is one tick)
  const checks = [...w.querySelectorAll('input[type=checkbox]')].filter(c => !c.disabled);
  for (const c of checks.slice(0, 2)) {
    if (c.checked) continue;
    c.checked = true;
    c.dispatchEvent(new Event('change', {bubbles: true}));
    c.dispatchEvent(new Event('input', {bubbles: true}));
    actions++;
  }
  // 2. choice groups: pick an option that is not already selected
  const names = [...new Set([...w.querySelectorAll('input[type=radio]')].map(r => r.name))];
  for (const n of names.slice(0, 3)) {
    const group = [...w.querySelectorAll(`input[type=radio][name="${n}"]`)];
    const target = group.find(r => !r.checked) || group[group.length - 1];
    if (target) {
      target.checked = true;
      target.dispatchEvent(new Event('change', {bubbles: true}));
      target.dispatchEvent(new Event('input', {bubbles: true}));
      actions++;
    }
  }
  return actions;
}
"""

CALCULATE = """
() => {
  const b = document.querySelector('[data-calc-go]');
  if (b) b.click();
  return !!b;
}
"""

SNAP = """
() => {
  const w = document.querySelector('[data-calculator]');
  const out = [...w.querySelectorAll('input[data-var]')].map(i => i.value).join('|');
  return { text: (w.innerText || '').replace(/\\s+/g, ' ').trim(), out };
}
"""


async def one(browser, base, path):
    ctx = await browser.new_context(viewport={"width": 1280, "height": 900})
    page = await ctx.new_page()
    errs = []
    page.on("pageerror", lambda e: errs.append(str(e)))
    page.on("console", lambda m: errs.append(m.text) if m.type == "error" else None)
    res = {"path": path, "problems": []}
    try:
        await page.goto(base.rstrip("/") + path, wait_until="load", timeout=25000)
        await page.wait_for_timeout(500)
        # Every box opens empty now (no harvested defaults), so the press has to
        # come after the fill: fill, press Calculate, and that is the state the
        # page is judged on.
        before = await page.evaluate(SNAP)
        filled = await page.evaluate(FILL)
        await page.wait_for_timeout(200)
        await page.evaluate(CALCULATE)
        await page.wait_for_timeout(600)
        after = await page.evaluate(SNAP)
        res["filled"] = filled
        if filled == 0:
            # Some harvested definitions carry no usable fields; those pages now
            # show an explanation instead of a Calculate button that cannot work.
            explained = await page.evaluate(
                "() => !!document.querySelector('[data-calculator] .calc-empty-widget')")
            if not explained:
                res["problems"].append("no fillable field")
        elif before["text"] == after["text"] and before["out"] == after["out"]:
            res["problems"].append("no change after filling inputs")
        hard = [e for e in errs if any(k in e for k in
                ("Uncaught", "TypeError", "ReferenceError", "SyntaxError", "is not a function"))]
        if hard:
            res["problems"].append(hard[0][:200])
    except Exception as exc:                                   # noqa: BLE001
        res["problems"].append(f"exception: {exc}"[:200])
    finally:
        await ctx.close()
    return res


async def main():
    ap = argparse.ArgumentParser()
    ap.add_argument("--base", default="http://127.0.0.1:8080")
    ap.add_argument("--group", default="script", choices=["script", "none", "partial", "all"])
    ap.add_argument("--limit", type=int, default=0)
    ap.add_argument("--paths", default="")
    ap.add_argument("--jobs", type=int, default=4)
    args = ap.parse_args()

    support = json.loads(SUPPORT.read_text())
    if args.paths:
        todo = [p.strip() for p in args.paths.split(",") if p.strip()]
    elif args.group == "all":
        todo = sorted(support)
    else:
        todo = sorted([p for p, v in support.items() if v == args.group])
    if args.limit:
        todo = todo[: args.limit]
    print(f"checking {len(todo)} {args.group} calculators")

    sem = asyncio.Semaphore(args.jobs)
    results = []
    async with async_playwright() as p:
        browser = await p.chromium.launch(args=["--no-sandbox"])

        async def run(path):
            async with sem:
                return await one(browser, args.base, path)

        for i in range(0, len(todo), 60):
            results.extend(await asyncio.gather(*(run(x) for x in todo[i:i + 60])))
            print(f"  {len(results)}/{len(todo)}  failures "
                  f"{sum(1 for r in results if r['problems'])}")
        await browser.close()

    bad = [r for r in results if r["problems"]]
    for r in bad[:30]:
        print(f"  FAIL {r['path']}: {'; '.join(r['problems'])[:180]}")
    out = ROOT / "docs" / f"script-failures-{args.group}.json"
    out.write_text(json.dumps(bad, indent=1))
    print(f"\n{len(results)} checked, {len(bad)} failures -> {out}")
    return 1 if bad else 0


if __name__ == "__main__":
    sys.exit(asyncio.run(main()))
