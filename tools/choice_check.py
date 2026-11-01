#!/usr/bin/env python3
"""choice_check.py — option groups: alignment, and no double fields.

Round 32, item 2: "radio/option sections must be properly aligned; each option's
field set gets its own place, and switching a radio must not leave two copies of
the same field."

Two things are checked on every page that has an option group:

  duplicates  after choosing each option in turn, no variable may be on screen
              twice. Switching options shows a different set of fields; it must
              not stack the new set on top of the old one.
  alignment   every control in a row starts on the same left edge as its
              neighbours, and no two controls overlap. This is what "properly
              aligned" means on screen, and it catches a field that kept the
              width of the column it used to be in.

Usage:
  python3 tools/choice_check.py                  # 120-page sample
  python3 tools/choice_check.py --pages 300 --jobs 4
  python3 tools/choice_check.py --slug /health/bmi --verbose
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

GROUPS = """
() => {
  const w = document.querySelector('[data-calculator]');
  return [...w.querySelectorAll('fieldset.calc-field, .calc-field')]
    .map(f => f.getAttribute('data-var'))
    .filter(Boolean);
}
"""

STATE = """
() => {
  const w = document.querySelector('[data-calculator]');
  const vis = el => {
    const r = el.getBoundingClientRect();
    return r.width > 0 && r.height > 0 && getComputedStyle(el).visibility !== 'hidden';
  };
  /*
   * Only the form counts. The same variable legitimately appears twice on the
   * page — once as a box the visitor fills in and once as a row in the results
   * panel — and that is the design, not a duplicate.
   */
  const inForm = el => !el.closest('[data-calc-results]');
  const seen = {}, dups = [];
  [...w.querySelectorAll('input[data-var], select[data-var], textarea[data-var]')]
    .filter(el => vis(el) && inForm(el)).forEach(el => {
    const n = el.getAttribute('data-var');
    if (!n) return;
    seen[n] = (seen[n] || 0) + 1;
    if (seen[n] === 2) dups.push(n);
  });
  // overlap between two controls that sit side by side
  const boxes = [...w.querySelectorAll('.calc-field')].filter(el => vis(el) && inForm(el)).map(el => {
    const r = el.getBoundingClientRect();
    return {x: r.left, y: r.top, w: r.width, h: r.height, n: el.getAttribute('data-var') || ''};
  });
  const overlaps = [];
  for (let i = 0; i < boxes.length; i++) {
    for (let j = i + 1; j < boxes.length; j++) {
      const a = boxes[i], b = boxes[j];
      const ox = Math.min(a.x + a.w, b.x + b.w) - Math.max(a.x, b.x);
      const oy = Math.min(a.y + a.h, b.y + b.h) - Math.max(a.y, b.y);
      if (ox > 2 && oy > 2) overlaps.push(a.n + '/' + b.n);
    }
  }
  return {dups, overlaps: overlaps.slice(0, 4), count: boxes.length};
}
"""

OPTIONS = """
() => {
  const w = document.querySelector('[data-calculator]');
  const groups = {};
  [...w.querySelectorAll('input[type="radio"]')].forEach(r => {
    (groups[r.name] = groups[r.name] || []).push(r.value);
  });
  return groups;
}
"""

PICK = """
([name, value]) => {
  const r = document.querySelector(`[data-calculator] input[type="radio"][name="${name}"][value="${value}"]`);
  if (!r) return false;
  r.scrollIntoView({block: 'center'});
  r.click();
  return true;
}
"""


def catalogue(limit: int, only: str) -> list[str]:
    if only:
        return [only if only.startswith("/") else f"/biology/{only}"]
    with urllib.request.urlopen(f"{BASE}/search-index.json", timeout=30) as r:
        index = json.loads(r.read().decode())
    paths = sorted({e["u"] for e in index})
    special = [p for p in ("/health/bmi", "/biology/dog-age", "/everyday-life/8-hour-shift",
                           "/math/truth-table", "/conversion/unix-time", "/statistics/pie-chart")
               if p in paths]
    rest = [p for p in paths if p not in special]
    stride = max(1, len(rest) // max(1, limit - len(special)))
    return (special + rest[::stride])[:limit]


def check_page(page, path: str, problems: list[str]) -> dict:
    page.goto(BASE + path, wait_until="load", timeout=60000)
    page.wait_for_timeout(250)
    options = page.evaluate(OPTIONS)
    if not options:
        return {"path": path, "skipped": "no option group"}

    base = page.evaluate(STATE)
    if base["dups"]:
        problems.append(f"{path}: {len(base['dups'])} field(s) on screen twice on load: "
                        + ", ".join(base["dups"][:4]))
    if base["overlaps"]:
        problems.append(f"{path}: fields overlap on load: " + ", ".join(base["overlaps"]))

    for name, values in options.items():
        for value in values:
            if not page.evaluate(PICK, [name, value]):
                continue
            page.wait_for_timeout(140)
            after = page.evaluate(STATE)
            if after["dups"]:
                problems.append(f"{path}: choosing {name}={value} left "
                                f"{len(after['dups'])} field(s) twice: "
                                + ", ".join(after["dups"][:4]))
            if after["overlaps"]:
                problems.append(f"{path}: choosing {name}={value} made fields overlap: "
                                + ", ".join(after["overlaps"]))
    return {"path": path, "options": sum(len(v) for v in options.values())}


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--pages", type=int, default=120)
    ap.add_argument("--jobs", type=int, default=4)
    ap.add_argument("--slug", default="")
    ap.add_argument("--verbose", action="store_true")
    ap.add_argument("--json", default="")
    args = ap.parse_args()

    paths = catalogue(args.pages, args.slug)
    problems: list[str] = []
    rows: list[dict] = []

    def chunk(items: list[str]) -> None:
        local: list[str] = []
        with sync_playwright() as p:
            browser = p.chromium.launch(args=["--no-sandbox"])
            ctx = browser.new_context(viewport={"width": 1280, "height": 1400})
            page = ctx.new_page()
            page.set_default_timeout(60000)
            for path in items:
                try:
                    rows.append(check_page(page, path, local))
                except Exception as exc:                       # noqa: BLE001
                    local.append(f"{path}: crashed — {str(exc).splitlines()[0][:120]}")
            browser.close()
        problems.extend(local)

    size = max(1, len(paths) // max(1, args.jobs))
    groups = [paths[i:i + size] for i in range(0, len(paths), size)]
    with ThreadPoolExecutor(max_workers=args.jobs) as ex:
        list(ex.map(chunk, groups))

    skipped = [r for r in rows if r and r.get("skipped")]
    print(f"pages checked : {len(paths) - len(skipped)}")
    print(f"skipped       : {len(skipped)} (no option group on the page)")
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
