#!/usr/bin/env python3
"""
contrast_audit.py — WCAG contrast check on the rendered pages.

The palette in SPEC §2 is deliberately quiet: four greys on a near-white
background. Quiet is exactly where contrast failures hide, and they only show up
in a browser, because the ratio depends on the *computed* colour and font size,
not on what the stylesheet says.

This walks a set of pages in Chromium, takes every element that renders its own
text, resolves its effective background by climbing ancestors until it finds an
opaque one (or is stopped by a gradient/image), and computes the WCAG 2.1
contrast ratio. Thresholds: 4.5:1 for normal text, 3:1 for large text
(24 px, or 18.66 px when bold) — the AA levels.

Usage:
    python3 tools/contrast_audit.py [--sample 40] [--all] [--jobs 4] [--verbose]
"""
from __future__ import annotations

import argparse
import asyncio
import json
import random
from pathlib import Path

from playwright.async_api import async_playwright

ROOT = Path(__file__).resolve().parent.parent
MANIFEST = ROOT / "php-clone" / "data" / "calc" / "manifest.json"
BASE = "http://127.0.0.1:8080"
OUT = ROOT / "docs" / "contrast-failures.json"

# Runs inside the page: returns one row per element that directly renders text.
JS = r"""
() => {
  const lum = (c) => {
    const f = c.map(v => { v /= 255; return v <= 0.03928 ? v / 12.92 : Math.pow((v + 0.055) / 1.055, 2.4); });
    return 0.2126 * f[0] + 0.7152 * f[1] + 0.0722 * f[2];
  };
  const parse = (s) => {
    const m = s.match(/rgba?\(([^)]+)\)/);
    if (!m) return null;
    const p = m[1].split(/[\s,\/]+/).filter(Boolean).map(Number);
    return { r: p[0], g: p[1], b: p[2], a: p.length > 3 ? p[3] : 1 };
  };
  const blend = (fg, bg) => [
    fg.r * fg.a + bg[0] * (1 - fg.a),
    fg.g * fg.a + bg[1] * (1 - fg.a),
    fg.b * fg.a + bg[2] * (1 - fg.a),
  ];
  const bgOf = (el) => {
    let node = el;
    while (node && node !== document.documentElement) {
      const cs = getComputedStyle(node);
      if (cs.backgroundImage && cs.backgroundImage !== 'none') return null;   // gradient / photo
      const c = parse(cs.backgroundColor);
      if (c && c.a > 0.999) return [c.r, c.g, c.b];
      node = node.parentElement;
    }
    const body = getComputedStyle(document.body).backgroundColor;
    const c = parse(body);
    return c && c.a > 0.999 ? [c.r, c.g, c.b] : [255, 255, 255];
  };
  const ratio = (a, b) => {
    const l1 = lum(a), l2 = lum(b);
    return (Math.max(l1, l2) + 0.05) / (Math.min(l1, l2) + 0.05);
  };

  const out = [];
  const seen = new Set();
  document.querySelectorAll('body *').forEach((el) => {
    // only elements whose own text content is non-empty
    const own = [].filter.call(el.childNodes, n => n.nodeType === 3)
      .map(n => n.textContent.trim()).join(' ').trim();
    if (!own) return;
    const rect = el.getBoundingClientRect();
    if (rect.width < 1 || rect.height < 1) return;
    const cs = getComputedStyle(el);
    if (cs.visibility === 'hidden' || cs.display === 'none' || parseFloat(cs.opacity) === 0) return;
    if (cs.textIndent && parseFloat(cs.textIndent) < -900) return;          // visually hidden
    const fg = parse(cs.color);
    const bg = bgOf(el);
    if (!fg || !bg) return;
    const colour = blend(fg, bg);
    const r = ratio(colour, bg);
    const size = parseFloat(cs.fontSize);
    const weight = parseInt(cs.fontWeight, 10) || 400;
    const large = size >= 24 || (size >= 18.66 && weight >= 700);
    const need = large ? 3.0 : 4.5;
    if (r + 0.02 >= need) return;
    const key = el.className + '|' + cs.color + '|' + size;
    if (seen.has(key)) return;
    seen.add(key);
    out.push({
      sel: el.tagName.toLowerCase() + (el.className && typeof el.className === 'string'
        ? '.' + el.className.trim().split(/\s+/).slice(0, 2).join('.') : ''),
      text: own.slice(0, 60),
      colour: cs.color,
      size: size,
      weight: weight,
      ratio: Math.round(r * 100) / 100,
      need: need,
    });
  });
  return out;
}
"""


async def check(browser, path: str, sem: asyncio.Semaphore) -> dict:
    async with sem:
        page = await browser.new_page(viewport={"width": 1280, "height": 900})
        try:
            await page.goto(BASE + path, wait_until="domcontentloaded", timeout=45000)
            await page.wait_for_timeout(350)
            rows = await page.evaluate(JS)
            return {"path": path, "rows": rows}
        except Exception as exc:                                  # noqa: BLE001
            return {"path": path, "error": str(exc)}
        finally:
            await page.close()


async def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--sample", type=int, default=40)
    ap.add_argument("--all", action="store_true")
    ap.add_argument("--jobs", type=int, default=4)
    ap.add_argument("--seed", type=int, default=5)
    ap.add_argument("--verbose", action="store_true")
    args = ap.parse_args()

    paths = [row[0] for row in json.loads(MANIFEST.read_text())["calcs"]]
    if not args.all:
        random.seed(args.seed)
        paths = random.sample(paths, min(args.sample, len(paths)))
    paths = ["/", "/math/percentage", "/finance/mortgage", "/search?q=mortgage"] + paths

    async with async_playwright() as p:
        browser = await p.chromium.launch(args=["--no-sandbox"])
        sem = asyncio.Semaphore(args.jobs)
        results = await asyncio.gather(*[check(browser, t, sem) for t in paths])
        await browser.close()

    failures = [r for r in results if r.get("rows")]
    errors = [r for r in results if r.get("error")]
    tally: dict[str, dict] = {}
    for r in failures:
        for row in r["rows"]:
            key = f'{row["sel"]}  {row["colour"]}  {row["size"]:.0f}px/{row["weight"]}'
            entry = tally.setdefault(key, {"row": row, "pages": []})
            entry["pages"].append(r["path"])

    OUT.write_text(json.dumps(list(tally.values()), indent=1))

    print(f"pages checked        : {len(results)}")
    print(f"render errors        : {len(errors)}")
    print(f"pages with failures  : {len(failures)}")
    print(f"distinct offenders   : {len(tally)}")
    for key, entry in sorted(tally.items(), key=lambda kv: -len(kv[1]["pages"]))[:15]:
        row = entry["row"]
        print(f"  {row['ratio']:>4}:1 (needs {row['need']})  {row['sel']:<32} "
              f"{row['size']:.0f}px  {len(entry['pages'])} page(s)  «{row['text']}»")
        if args.verbose:
            print(f"        on {entry['pages'][:3]}")

    return 1 if failures else 0


if __name__ == "__main__":
    raise SystemExit(asyncio.run(main()))
