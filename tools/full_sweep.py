#!/usr/bin/env python3
"""full_sweep.py — the round-32 form rules, on every calculator, resumable.

`form_rules_check.py` answers "do the rules hold on this page?"; this answers
"do they hold on all 3 831?" without wedging the sandbox. It walks the whole
catalogue in chunks, appends one JSON line per page to `docs/full-sweep.jsonl`
and skips whatever is already in that file, so a run can be stopped and started
again and picks up where it left off.

Each page is checked for the six rules (see form_rules_check.py) plus the option
group rule from item 2 (no field on screen twice when an option is switched).

Usage:
  python3 tools/full_sweep.py                       # continue where it stopped
  python3 tools/full_sweep.py --chunk 120 --workers 3
  python3 tools/full_sweep.py --report              # summarise what is recorded
"""
from __future__ import annotations

import argparse
import json
import sys
import time
import urllib.request
from concurrent.futures import ThreadPoolExecutor
from pathlib import Path

from playwright.sync_api import sync_playwright

BASE = "http://127.0.0.1:8080"
OUT = Path("docs/full-sweep.jsonl")

PROBE = """
() => {
  const w = document.querySelector('[data-calculator]');
  if (!w) return null;
  const controls = [...w.querySelectorAll('input[data-var], textarea[data-var]')]
    .filter(i => !i.readOnly);
  return {
    state: w.getAttribute('data-results'),
    values: controls.map(i => [i.getAttribute('data-var'), i.value]),
    errors: [...w.querySelectorAll('.calc-error')].map(e => e.textContent.trim()).filter(Boolean),
    notice: !!w.querySelector('.calc-empty-widget'),
    button: !!w.querySelector('[data-calc-go]'),
    choice: !!w.querySelector('input[type=radio], select[data-var]')
  };
}
"""

FILL_ONE = """
() => {
  const w = document.querySelector('[data-calculator]');
  const box = [...w.querySelectorAll('.calc-field-home input.calc-input:not([readonly])')]
    .filter(i => !i.getAttribute('data-datetype')
                 && i.closest('.calc-field') && !i.closest('[data-calc-results]'))[0];
  if (!box) return null;
  box.focus();
  box.value = '7';
  box.dispatchEvent(new Event('input', {bubbles: true}));
  box.dispatchEvent(new Event('change', {bubbles: true}));
  return box.getAttribute('data-var');
}
"""

FILL_ALL = """
() => {
  const w = document.querySelector('[data-calculator]');
  const boxes = [...w.querySelectorAll('.calc-field-home input.calc-input:not([readonly])')]
    .filter(i => !i.getAttribute('data-datetype'));
  boxes.forEach((box, k) => {
    box.focus();
    box.value = String(12 + k * 7);
    box.dispatchEvent(new Event('input', {bubbles: true}));
    box.dispatchEvent(new Event('change', {bubbles: true}));
  });
  /*
   * One date box, not every date box. Half the date pages solve "date + 63
   * days" in both directions, so filling both dates leaves nothing to derive
   * and the press correctly does nothing — which is not what is being tested.
   */
  const dates = [...w.querySelectorAll('input[data-datetype]:not([readonly])')];
  if (dates.length) {
    const d = dates[0];
    const t = d.getAttribute('data-datetype');
    d.value = t === 'time' ? '09:00' : (t === 'datetime' ? '2026-03-10T09:00' : '2026-03-10');
    d.dispatchEvent(new Event('input', {bubbles: true}));
    d.dispatchEvent(new Event('change', {bubbles: true}));
  }
  return boxes.length + dates.length;
}
"""

DUPS = """
() => {
  const w = document.querySelector('[data-calculator]');
  const vis = el => { const r = el.getBoundingClientRect();
    return r.width > 0 && r.height > 0; };
  const inForm = el => !el.closest('[data-calc-results]');
  const seen = {}, dups = [];
  [...w.querySelectorAll('input[data-var], select[data-var], textarea[data-var]')]
    .filter(el => vis(el) && inForm(el)).forEach(el => {
      const n = el.getAttribute('data-var');
      seen[n] = (seen[n] || 0) + 1;
      if (seen[n] === 2) dups.push(n);
    });
  return dups;
}
"""


FILL_SOME = """
(n) => {
  const w = document.querySelector('[data-calculator]');
  const dates = [...w.querySelectorAll('input[data-datetype]:not([readonly])')];
  let k = 0;
  for (const d of dates) {
    if (k >= n) break;
    const t = d.getAttribute('data-datetype');
    d.value = t === 'time' ? '09:00' : (t === 'datetime' ? '2026-03-10T09:00' : '2026-03-10');
    d.dispatchEvent(new Event('input', {bubbles: true}));
    d.dispatchEvent(new Event('change', {bubbles: true}));
    k++;
  }
  const boxes = [...w.querySelectorAll('.calc-field-home input.calc-input:not([readonly])')]
    .filter(i => !i.getAttribute('data-datetype'));
  for (const box of boxes) {
    if (k >= n) break;
    box.focus();
    box.value = String(12 + (k * 7));
    box.dispatchEvent(new Event('input', {bubbles: true}));
    box.dispatchEvent(new Event('change', {bubbles: true}));
    k++;
  }
  return k;
}
"""


def fill_some(page, n: int) -> None:
    page.evaluate(FILL_SOME, n)


def catalogue() -> list[str]:
    with urllib.request.urlopen(f"{BASE}/search-index.json", timeout=60) as r:
        index = json.loads(r.read().decode())
    return sorted({e["u"] for e in index})


def read_done() -> set[str]:
    done = set()
    if OUT.exists():
        for line in OUT.read_text(encoding="utf-8").splitlines():
            try:
                done.add(json.loads(line)["path"])
            except Exception:                                   # noqa: BLE001
                continue
    return done


def check_page(page, path: str) -> dict:
    """One page, all the rules. Returns the row written to the log."""
    row = {"path": path, "problems": []}
    problems = row["problems"]

    def land():
        page.goto(BASE + path, wait_until="load", timeout=60000)
        page.wait_for_timeout(150)

    land()
    first = page.evaluate(PROBE)
    if first is None:
        problems.append("no calculator widget")
        return row
    if first["notice"] or not first["button"]:
        row["skip"] = "no Calculate button"
        return row

    prefilled = [n for n, v in first["values"] if str(v).strip() != ""]
    if prefilled:
        problems.append(f"{len(prefilled)} field(s) open with a value: {', '.join(prefilled[:3])}")

    # typing must not fill anything else
    typed = page.evaluate(FILL_ONE)
    page.wait_for_timeout(160)
    after_typing = page.evaluate(PROBE)
    if typed:
        moved = [n for n, v in after_typing["values"] if str(v).strip() != "" and n != typed]
        if moved:
            problems.append(f"typing in {typed} filled {', '.join(moved[:3])} before Calculate")

    # option groups: no field twice on screen
    dups = page.evaluate(DUPS)
    if dups:
        problems.append(f"field(s) on screen twice: {', '.join(dups[:4])}")

    # reveal with everything filled, then with one, two and three boxes
    land()
    page.evaluate(FILL_ALL)
    page.wait_for_timeout(160)
    page.click("[data-calc-go]")
    page.wait_for_timeout(240)
    shown = page.evaluate(PROBE)
    status = page.inner_text("[data-calc-status]").strip()

    if shown["state"] != "shown":
        for n in (1, 2, 3):
            land()
            fill_some(page, n)
            page.wait_for_timeout(140)
            page.click("[data-calc-go]")
            page.wait_for_timeout(240)
            shown = page.evaluate(PROBE)
            status = page.inner_text("[data-calc-status]").strip()
            row["filled"] = n
            if shown["state"] == "shown":
                break

    row["state"] = shown["state"]
    if shown["state"] != "shown" and not shown["errors"] and not status:
        problems.append("Calculate neither revealed a result nor explained why")

    # an empty press must explain itself and not invent an answer
    land()
    page.click("[data-calc-go]")
    page.wait_for_timeout(220)
    empty = page.evaluate(PROBE)
    said = page.inner_text("[data-calc-status]").strip()
    if empty["state"] == "shown" and not empty["errors"] and not first["choice"]:
        problems.append("an empty form produced a result")
    elif empty["state"] != "shown" and not empty["errors"] and not said:
        problems.append("pressing Calculate on an empty form said nothing")

    # a second press on a revealed widget clears it
    if shown["state"] == "shown":
        land()
        if row.get("filled"):
            fill_some(page, row["filled"])
        else:
            page.evaluate(FILL_ALL)
        page.wait_for_timeout(140)
        page.click("[data-calc-go]")
        page.wait_for_timeout(240)
        page.click("[data-calc-go]")
        page.wait_for_timeout(300)
        reset = page.evaluate(PROBE)
        left = [n for n, v in reset["values"] if str(v).strip() != ""]
        if reset["state"] == "shown" or left:
            problems.append(f"Calculate again left {len(left)} value(s) behind")

    return row


def sweep(chunk: int, workers: int) -> int:
    paths = catalogue()
    done = read_done()
    todo = [p for p in paths if p not in done]
    print(f"catalogue {len(paths)}, already recorded {len(done)}, to go {len(todo)}", flush=True)
    if not todo:
        return 0

    OUT.parent.mkdir(parents=True, exist_ok=True)
    started = time.time()
    written = 0
    with OUT.open("a", encoding="utf-8") as log:
        def work(batch: list[str]) -> None:
            nonlocal written
            with sync_playwright() as p:
                browser = p.chromium.launch(args=["--no-sandbox"])
                ctx = browser.new_context(viewport={"width": 1280, "height": 1200})
                page = ctx.new_page()
                page.set_default_timeout(60000)
                for path in batch:
                    try:
                        row = check_page(page, path)
                    except Exception as exc:                   # noqa: BLE001
                        row = {"path": path,
                               "problems": [f"crashed: {str(exc).splitlines()[0][:120]}"]}
                    log.write(json.dumps(row) + "\n")
                    log.flush()
                    written += 1
                browser.close()

        for i in range(0, len(todo), chunk):
            batch = todo[i:i + chunk]
            with ThreadPoolExecutor(max_workers=workers) as ex:
                list(ex.map(work, [batch[j::workers] for j in range(workers)]))
            rate = written / max(1e-6, time.time() - started)
            left = len(todo) - written
            print(f"  {written}/{len(todo)} pages, {rate:.2f}/s, "
                  f"~{left / rate / 60:.0f} min left", flush=True)
    print("done", flush=True)
    return 0


def report() -> int:
    rows = [json.loads(l) for l in OUT.read_text(encoding="utf-8").splitlines() if l.strip()]
    bad = [r for r in rows if r.get("problems")]
    skipped = [r for r in rows if r.get("skip")]
    print(f"pages recorded : {len(rows)}")
    print(f"skipped        : {len(skipped)} (nothing to calculate)")
    print(f"with problems  : {len(bad)}")
    kinds: dict[str, int] = {}
    for r in bad:
        for p in r["problems"]:
            key = p.split(":")[0][:60]
            kinds[key] = kinds.get(key, 0) + 1
    for k, v in sorted(kinds.items(), key=lambda kv: -kv[1]):
        print(f"  {v:5d}  {k}")
    for r in bad[:20]:
        print("  -", r["path"], "|", "; ".join(r["problems"])[:120])
    return 1 if bad else 0


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--chunk", type=int, default=120)
    ap.add_argument("--workers", type=int, default=3)
    ap.add_argument("--report", action="store_true")
    args = ap.parse_args()
    if args.report:
        return report()
    return sweep(args.chunk, args.workers)


if __name__ == "__main__":
    sys.exit(main())
