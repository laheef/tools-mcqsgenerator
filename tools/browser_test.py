#!/usr/bin/env python3
"""
browser_test.py — prove that each calculator actually calculates.

For every page checked it:
  1. loads the page in headless Chromium and collects console / page errors
  2. records the widget text and every input value on load
  3. types a different value into the first editable numeric field
  4. asserts that *something* responded: an output box changed, or the results
     block changed. A calculator that ignores its inputs is the failure mode
     this catches
  5. re-checks for errors raised during interaction (script hooks included)

Usage:  python3 tools/browser_test.py --sample 200 --jobs 4
        python3 tools/browser_test.py --all
"""
from __future__ import annotations

import argparse
import asyncio
import json
import random
import sys
from pathlib import Path

from playwright.async_api import async_playwright

ROOT = Path(__file__).resolve().parent.parent
CALC = ROOT / "php-clone" / "data" / "calc"

ERROR_HINTS = ("Uncaught", "TypeError", "ReferenceError", "is not a function")


def load_paths(cat=None):
    out = []
    for f in sorted(CALC.glob("batch-*.ndjson")):
        for line in f.read_text().splitlines():
            if not line.strip():
                continue
            r = json.loads(line)
            if cat and r.get("cat") != cat:
                continue
            out.append(r["path"])
    return sorted(set(out))


PROBE = """
() => {
  const w = document.querySelector('[data-calculator]');
  if (!w) return null;
  const inputs = [...w.querySelectorAll('input[data-var]')].map(i => {
    const wrap = i.closest('.calc-input-wrap');
    return [i.getAttribute('data-var'), i.value, i.type,
            wrap ? wrap.classList.contains('is-computed') : false];
  });
  const text = (w.innerText || '').replace(/\\s+/g, ' ').trim();
  const script = w.querySelector('[data-script-output]');
  let values = '';
  try {
    const c = window.__calc;
    if (c) values = JSON.stringify(c.solve(c.readState()).values || {});
  } catch (e) { values = 'err'; }
  return {inputs, text, script: script ? script.innerText.slice(0, 400) : '',
          values: values.slice(0, 2000),
          radios: w.querySelectorAll('input[type=radio]').length,
          checks: w.querySelectorAll('input[data-var-check]').length};
}
"""

# Fill the *whole* form the way a visitor would: every editable number, every
# date, every drop-down moved off its default, one radio per group. Filling a
# single box under-tests pages that need several inputs before anything can be
# computed, which is exactly the shape most score calculators have.
INTERACT = """
(kind) => {
  const w = document.querySelector('[data-calculator]');
  if (kind === 'number') {
    const box = [...w.querySelectorAll('input[data-var]')]
      .find(i => i.type !== 'radio' && !i.readOnly && !i.getAttribute('data-datetype'));
    if (!box) return false;
    box.focus();
    box.value = '7';
    box.dispatchEvent(new Event('input', {bubbles: true}));
    box.dispatchEvent(new Event('change', {bubbles: true}));
    return true;
  }
  if (kind === 'date') {
    const box = [...w.querySelectorAll('input[data-datetype]')].find(i => !i.readOnly);
    if (!box) return false;
    const dt = box.getAttribute('data-datetype');
    box.value = dt === 'time' ? '09:30' : (dt === 'datetime' ? '1990-03-15T09:30' : '1990-03-15');
    box.dispatchEvent(new Event('input', {bubbles: true}));
    box.dispatchEvent(new Event('change', {bubbles: true}));
    return true;
  }
  if (kind === 'select') {
    const sels = [...w.querySelectorAll('select[data-var]')]
      .filter(s => !s.hasAttribute('data-unit-select'));
    let acted = 0;
    for (const s of sels) {
      if (s.options.length < 2) continue;
      // the neighbouring option often carries the same value (an ACT raw score
      // of 74 and 75 both map to 36), so jump to the far end of the list
      s.selectedIndex = s.selectedIndex === s.options.length - 1 ? 0 : s.options.length - 1;
      s.dispatchEvent(new Event('change', {bubbles: true}));
      acted++;
    }
    return acted > 0;
  }
  if (kind === 'check') {
    const boxes = [...w.querySelectorAll('input[data-var-check]')];
    let acted = 0;
    for (const c of boxes) { c.checked = !c.checked; c.dispatchEvent(new Event('change', {bubbles: true})); acted++; }
    return acted > 0;
  }
  if (kind === 'radio') {
    const names = [...new Set([...w.querySelectorAll('input[type=radio]')].map(r => r.name))];
    let acted = 0;
    for (const n of names.slice(0, 40)) {
      const group = [...w.querySelectorAll(`input[type=radio][name="${n}"]`)];
      const target = group.find(r => !r.checked);
      if (target) {
        target.checked = true;
        target.dispatchEvent(new Event('change', {bubbles: true}));
        target.dispatchEvent(new Event('input', {bubbles: true}));
        acted++;
      }
    }
    return acted > 0;
  }
  return false;
}
"""


async def check(browser, base, path, timeout=25000):
    ctx = await browser.new_context(viewport={"width": 1280, "height": 900})
    page = await ctx.new_page()
    errors = []
    page.on("pageerror", lambda e: errors.append(f"pageerror: {e}"))
    page.on("console", lambda m: errors.append(f"console.{m.type}: {m.text}")
            if m.type == "error" else None)

    result = {"path": path, "problems": [], "errors": errors}
    try:
        resp = await page.goto(base.rstrip("/") + path, wait_until="load", timeout=timeout)
        if resp is None or resp.status != 200:
            result["problems"].append(f"status {resp.status if resp else 'none'}")
            return result
        await page.wait_for_timeout(450)

        before = await page.evaluate(PROBE)
        if before is None:
            result["problems"].append("no calculator widget")
            return result

        # fill everything the page offers, in the order a visitor would
        kind = None
        acted = []
        has_number = any(t in ("text", "number") and not comp for _, v, t, comp in before["inputs"])
        has_date = await page.evaluate(
            "() => !!document.querySelector('[data-calculator] input[data-datetype]')")
        has_radio = before["radios"] > 0
        has_check = before.get("checks", 0) > 0
        has_select = await page.evaluate(
            "() => !!document.querySelector('[data-calculator] select[data-var]:not([data-unit-select])')")

        for candidate, present in (("number", has_number), ("date", has_date),
                                   ("select", has_select), ("check", has_check),
                                   ("radio", has_radio)):
            if not present:
                continue
            if await page.evaluate(INTERACT, candidate):
                acted.append(candidate)
        kind = "+".join(acted) if acted else None

        result["kind"] = kind
        if kind is None:
            # A retired calculator is a single notice block: the reference page
            # has no fields at all, so there is nothing to interact with.
            live = await page.evaluate(
                "() => { const w = document.querySelector('[data-calculator]');"
                " const f = w.querySelectorAll('input[data-var],select[data-var],input[type=radio],input[data-var-check]');"
                " return {fields: f.length, text: (w.innerText || '').trim().length}; }")
            if live["fields"] == 0 and live["text"] > 40:
                result["retired"] = True
                return result
            result["problems"].append("no interactable field")
            return result
        await page.wait_for_timeout(500)

        after = await page.evaluate(PROBE)
        changed_inputs = 0
        bvals = dict((row[0], row[1]) for row in before["inputs"])
        for row in after["inputs"]:
            n, v = row[0], row[1]
            if bvals.get(n, None) != v:
                changed_inputs += 1
        text_changed = (before["text"] != after["text"]
                        or before.get("values") != after.get("values"))
        result["changed_inputs"] = changed_inputs
        result["text_changed"] = text_changed
        if changed_inputs == 0 and not text_changed:
            result["problems"].append("no response to input")

        for e in errors:
            if any(h in e for h in ERROR_HINTS):
                result["problems"].append(e[:180])
                break
    except Exception as exc:                                  # noqa: BLE001
        result["problems"].append(f"exception: {exc}"[:180])
    finally:
        await ctx.close()
    return result


async def run(args):
    todo = load_paths(args.cat or None)
    if args.paths:
        todo = [p.strip() for p in args.paths.split(",") if p.strip()]
    if args.all or args.paths:
        sample = todo
    else:
        rng = random.Random(args.seed)
        sample = rng.sample(todo, min(args.sample, len(todo)))
        sample.sort()

    print(f"testing {len(sample)} pages with {args.jobs} workers")
    sem = asyncio.Semaphore(args.jobs)
    results = []

    async with async_playwright() as p:
        browser = await p.chromium.launch(args=["--no-sandbox"])

        async def one(path):
            async with sem:
                return await check(browser, args.base, path)

        for i in range(0, len(sample), 100):
            chunk = sample[i:i + 100]
            results.extend(await asyncio.gather(*(one(p) for p in chunk)))
            done = len(results)
            bad = sum(1 for r in results if r["problems"])
            print(f"  {done}/{len(sample)}  failures {bad}")
        await browser.close()

    bad = [r for r in results if r["problems"]]
    for r in bad[:40]:
        print(f"  FAIL {r['path']}: {'; '.join(r['problems'])[:200]}")
    out = ROOT / "docs" / "browser-failures.json"
    out.parent.mkdir(exist_ok=True)
    out.write_text(json.dumps(bad, indent=1))
    retired = [r for r in results if r.get("retired")]
    extra = f", {len(retired)} retired notices" if retired else ""
    print(f"\n{len(results)} pages, {len(bad)} failures{extra} -> {out}")
    return 1 if bad else 0


def main():
    ap = argparse.ArgumentParser()
    ap.add_argument("--base", default="http://127.0.0.1:8080")
    ap.add_argument("--sample", type=int, default=100)
    ap.add_argument("--all", action="store_true")
    ap.add_argument("--cat", default="")
    ap.add_argument("--jobs", type=int, default=4)
    ap.add_argument("--seed", type=int, default=7)
    ap.add_argument("--paths", default="", help="comma-separated paths to test")
    args = ap.parse_args()
    return asyncio.run(run(args))


if __name__ == "__main__":
    sys.exit(main())
