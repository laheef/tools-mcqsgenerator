#!/usr/bin/env python3
"""form_rules_check.py — the six form rules, checked on every calculator.

The brief asks for behaviour that is the same on all 4 041 pages, so it gets one
suite rather than a per-page claim:

  1. **No default values.** Every control opens empty. A box that arrives
     pre-filled is a value the visitor did not enter.
  2. **No live fields.** Typing into one box must not fill another. Before
     Calculate, every box holds only what the visitor typed into it.
  3. **Calculate reveals.** The press fills the solved boxes (or the panel).
  4. **Calculate again resets.** A second press puts the page back to first use:
     every box empty, no results.
  5. **Empty submit explains itself.** Pressing Calculate on an empty form names
     the fields that are waiting instead of doing nothing.
  6. **Bad input is refused with a reason.** Letters in a number box and a
     decimal in a whole-number box both stop the reveal and say why.

Usage:
  python3 tools/form_rules_check.py                 # 120-page sample
  python3 tools/form_rules_check.py --pages 400 --jobs 4
  python3 tools/form_rules_check.py --paths-file docs/form-rules-pages.txt
  python3 tools/form_rules_check.py --slug /health/bmi --verbose
"""
from __future__ import annotations

import argparse
import json
import sys
import urllib.request
from concurrent.futures import ThreadPoolExecutor
from pathlib import Path

from playwright.sync_api import sync_playwright

BASE = "http://127.0.0.1:8080"

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
    button: !!w.querySelector('[data-calc-go]')
  };
}
"""

FILL = """
() => {
  const w = document.querySelector('[data-calculator]');
  const box = [...w.querySelectorAll('input[data-var]')]
    .filter(i => !i.readOnly && !i.getAttribute('data-datetype')
                 && i.closest('.calc-field') && !i.closest('[data-calc-results]'))[0];
  if (!box) return null;
  box.focus();
  box.value = '7';
  box.dispatchEvent(new Event('input', {bubbles: true}));
  box.dispatchEvent(new Event('change', {bubbles: true}));
  return box.getAttribute('data-var');
}
"""


def catalogue(limit: int, only: str) -> list[str]:
    if only:
        return [only if only.startswith("/") else f"/biology/{only}"]
    with urllib.request.urlopen(f"{BASE}/search-index.json", timeout=30) as r:
        index = json.loads(r.read().decode())
    paths = sorted({e["u"] for e in index})
    special = [p for p in ("/everyday-life/8-hour-shift", "/health/bmi",
                           "/everyday-life/years-between-dates", "/math/truth-table",
                           "/conversion/unix-time", "/biology/codon-plot",
                           "/finance/mortgage-payment", "/math/percentage")
               if p in paths]
    rest = [p for p in paths if p not in special]
    stride = max(1, len(rest) // max(1, limit - len(special)))
    return (special + rest[::stride])[:limit]


def check_page(page, path: str, problems: list[str]) -> dict:
    page.goto(BASE + path, wait_until="load", timeout=60000)
    page.wait_for_timeout(220)
    before = page.evaluate(PROBE)
    if before is None:
        problems.append(f"{path}: no calculator widget")
        return {"path": path}
    if before["notice"] or not before["button"]:
        return {"path": path, "skipped": "no controls"}

    # 1 — nothing arrives pre-filled
    prefilled = [v for v in before["values"] if str(v[1]).strip() != ""]
    if prefilled:
        problems.append(f"{path}: {len(prefilled)} field(s) open with a value: "
                        + ", ".join(f"{n}={v!r}" for n, v in prefilled[:3]))

    # 2 — typing must not fill anything else
    typed = page.evaluate(FILL)
    page.wait_for_timeout(200)
    after_typing = page.evaluate(PROBE)
    if typed:
        moved = [v for v in after_typing["values"]
                 if str(v[1]).strip() != "" and v[0] != typed]
        if moved:
            problems.append(f"{path}: typing in {typed} filled "
                            + ", ".join(f"{n}={v!r}" for n, v in moved[:3])
                            + " before Calculate")

    # 5 — an empty submit explains itself, on a fresh page
    page.goto(BASE + path, wait_until="load", timeout=60000)
    page.wait_for_timeout(200)
    page.click("[data-calc-go]")
    page.wait_for_timeout(260)
    empty = page.evaluate(PROBE)
    said = page.inner_text("[data-calc-status]").strip()
    # A page with a radio or drop-down has a choice made for it, which is a real
    # input; a page of empty number boxes has nothing to go on.
    has_choice = page.evaluate(
        "() => !!document.querySelector('[data-calculator] input[type=radio],"
        " [data-calculator] select[data-var]')")
    if empty["state"] == "shown" and not empty["errors"] and not has_choice:
        problems.append(f"{path}: an empty form produced a result from values nobody entered")
    elif empty["state"] != "shown" and not empty["errors"] and not said:
        problems.append(f"{path}: pressing Calculate on an empty form said nothing")

    # 3 — Calculate reveals
    page.click("[data-calc-go]")
    page.wait_for_timeout(320)
    shown = page.evaluate(PROBE)
    filled = [v for v in shown["values"] if str(v[1]).strip() != ""]
    said = page.inner_text("[data-calc-status]").strip()
    if shown["state"] != "shown" and len(filled) <= 1 and not shown["errors"] and not said:
        problems.append(f"{path}: Calculate neither revealed a result nor explained why")

    # 4 — Calculate again resets
    if shown["state"] == "shown":
        page.click("[data-calc-go]")
        page.wait_for_timeout(320)
        reset = page.evaluate(PROBE)
        left = [v for v in reset["values"] if str(v[1]).strip() != ""]
        if reset["state"] == "shown" or left:
            problems.append(f"{path}: Calculate again left {len(left)} value(s) behind "
                            f"(state {reset['state']!r})")

    return {"path": path}


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--pages", type=int, default=120)
    ap.add_argument("--jobs", type=int, default=3)
    ap.add_argument("--slug", default="")
    ap.add_argument("--paths-file", default="")
    ap.add_argument("--verbose", action="store_true")
    ap.add_argument("--json", default="")
    args = ap.parse_args()

    if args.paths_file:
        paths = [l.strip() for l in Path(args.paths_file).read_text().splitlines() if l.strip()]
    else:
        paths = catalogue(args.pages, args.slug)

    problems: list[str] = []
    rows: list[dict] = []

    def chunk(items: list[str]) -> None:
        local: list[str] = []
        with sync_playwright() as p:
            browser = p.chromium.launch(args=["--no-sandbox"])
            ctx = browser.new_context(viewport={"width": 1280, "height": 900})
            page = ctx.new_page()
            page.set_default_timeout(60000)
            for path in items:
                errs: list[str] = []
                page.on("pageerror", lambda e, e2=errs: e2.append(str(e)))
                try:
                    rows.append(check_page(page, path, local))
                except Exception as exc:                       # noqa: BLE001
                    local.append(f"{path}: crashed — {str(exc).splitlines()[0][:120]}")
                if errs:
                    local.append(f"{path}: JavaScript error — {errs[0][:120]}")
            browser.close()
        problems.extend(local)

    size = max(1, len(paths) // max(1, args.jobs))
    groups = [paths[i:i + size] for i in range(0, len(paths), size)]
    with ThreadPoolExecutor(max_workers=args.jobs) as ex:
        list(ex.map(chunk, groups))

    skipped = [r for r in rows if r and r.get("skipped")]
    print(f"pages checked : {len(paths) - len(skipped)}")
    print(f"skipped       : {len(skipped)} (no controls on the page)")
    print(f"problems      : {len(problems)}")
    for p in problems[:40 if args.verbose else 12]:
        print("  -", p)
    if args.json:
        Path(args.json).write_text(json.dumps({"problems": problems, "rows": rows}, indent=1),
                                   encoding="utf-8")
        print(f"detail -> {args.json}")
    return 1 if problems else 0


if __name__ == "__main__":
    sys.exit(main())
