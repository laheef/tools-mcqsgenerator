#!/usr/bin/env python3
"""Mobile / accessibility audit at a 390x844 viewport.

The full-page sweeps in this repo run at desktop size, so a layout that pushes the
document sideways on a phone, or a control that is too small to tap, would never be
seen. This walks a sample (or all) manifest paths at iPhone-12 size and checks:

  * horizontal overflow      document.scrollWidth > viewport width
  * elements past the edge   a non-decorative box whose right edge exceeds the
                             viewport by more than 2 px (position:fixed excepted)
  * tap targets              every visible <a>/<button>/input[type=checkbox] with a
                             hit box under 28x28 px, excluding inline prose links
  * unlabelled fields        an input/select/textarea with no <label for>, no
                             aria-label and no aria-labelledby
  * heading order            an h2 that follows an h3 with no h2 in between
  * console errors           uncaught JS errors and failed requests

Usage:  python3 tools/mobile_audit.py [--sample 120] [--jobs 4] [--seed 1]
        python3 tools/mobile_audit.py --all
"""
import argparse
import asyncio
import json
import random
import sys
from pathlib import Path

from playwright.async_api import async_playwright

ROOT = Path(__file__).resolve().parent.parent
MANIFEST = ROOT / "php-clone" / "data" / "calc" / "manifest.json"
OUT = ROOT / "docs" / "mobile-failures.json"
BASE = "http://127.0.0.1:8080"
VIEWPORT = {"width": 390, "height": 844}

MEASURE = """
() => {
  const vw = window.innerWidth;
  const out = { scrollWidth: document.documentElement.scrollWidth, vw, wide: [], small: [], unlabelled: [], headings: [] };

  const visible = (el) => {
    const s = getComputedStyle(el);
    if (s.display === 'none' || s.visibility === 'hidden' || s.opacity === '0') return false;
    const r = el.getBoundingClientRect();
    return r.width > 0 && r.height > 0;
  };

  // 1. anything sticking out of the viewport (fixed overlays excluded)
  const boxes = document.querySelectorAll('body *');
  for (const el of boxes) {
    if (!visible(el)) continue;
    const s = getComputedStyle(el);
    if (s.position === 'fixed') continue;
    const r = el.getBoundingClientRect();
    let scroller = null;
    for (let n = el.parentElement; n && n !== document.body; n = n.parentElement) {
      const cs = getComputedStyle(n);
      if ((cs.overflowX === 'auto' || cs.overflowX === 'scroll') && n.scrollWidth > n.clientWidth + 1) { scroller = n; break; }
    }
    if (scroller) continue;
    if (r.right > vw + 2 && r.width > 8) {
      out.wide.push({ sel: el.tagName.toLowerCase() + (el.className ? '.' + String(el.className).split(' ')[0] : ''), right: Math.round(r.right), w: Math.round(r.width) });
      if (out.wide.length >= 6) break;
    }
  }

  // 2. tap targets — inline links inside running prose are exempt
  const controls = document.querySelectorAll('a[href], button, [role=button], input[type=checkbox], input[type=radio], select');
  for (const el of controls) {
    if (!visible(el)) continue;
    if (el.closest('p, li, .article, .calc-article, .prose')) continue;
    // a radio/checkbox sized by its wrapping <label> is fine: the label is the target
    const own = el.closest('label');
    if (own) {
      const lr = own.getBoundingClientRect();
      if (lr.width >= 28 && lr.height >= 28) continue;
    }
    const r = el.getBoundingClientRect();
    if (r.width < 28 || r.height < 28) {
      out.small.push({ sel: el.tagName.toLowerCase(), text: (el.textContent || el.value || '').trim().slice(0, 40), w: Math.round(r.width), h: Math.round(r.height) });
      if (out.small.length >= 8) break;
    }
  }

  // 3. form controls with no accessible name
  for (const el of document.querySelectorAll('input:not([type=hidden]), select, textarea')) {
    if (!visible(el)) continue;
    const id = el.getAttribute('id');
    const hasLabel = id && document.querySelector('label[for="' + CSS.escape(id) + '"]');
    // an input wrapped in a label that carries text is named by that label
    const wrap = el.closest('label');
    const wrapText = wrap && wrap.textContent.trim().length > 0;
    const named = hasLabel || wrapText || el.getAttribute('aria-label') || el.getAttribute('aria-labelledby') || el.getAttribute('title');
    if (!named) out.unlabelled.push({ tag: el.tagName.toLowerCase(), type: el.type || '', name: el.name || '' });
  }

  // 4. heading order
  let last = 0;
  for (const h of document.querySelectorAll('h1, h2, h3, h4')) {
    if (!visible(h)) continue;
    const lvl = Number(h.tagName[1]);
    if (lvl > last + 1 && last !== 0) out.headings.push({ jump: last + '->' + lvl, text: h.textContent.trim().slice(0, 40) });
    last = lvl;
  }
  return out;
}
"""


async def check(browser, path, sem):
    async with sem:
        page = await browser.new_page(viewport=VIEWPORT, device_scale_factor=2, is_mobile=True, has_touch=True)
        errors, failed = [], []
        page.on("pageerror", lambda e: errors.append(str(e)))
        page.on("requestfailed", lambda r: failed.append(r.url))
        try:
            await page.goto(BASE + path, wait_until="load", timeout=30000)
            await page.wait_for_timeout(250)
            m = await page.evaluate(MEASURE)
        except Exception as exc:  # noqa: BLE001
            await page.close()
            return {"path": path, "error": str(exc)}
        await page.close()

    problems = []
    if m["scrollWidth"] > m["vw"] + 2:
        problems.append("document is %dpx wide at %dpx viewport" % (m["scrollWidth"], m["vw"]))
    if m["wide"]:
        problems.append("overflows: " + json.dumps(m["wide"][:3]))
    if m["small"]:
        problems.append("small targets: " + json.dumps(m["small"][:3]))
    if m["unlabelled"]:
        problems.append("unlabelled: " + json.dumps(m["unlabelled"][:3]))
    if m["headings"]:
        problems.append("heading jumps: " + json.dumps(m["headings"][:3]))
    if errors:
        problems.append("js errors: " + json.dumps(errors[:2]))
    real_failed = [u for u in failed if "favicon" not in u]
    if real_failed:
        problems.append("failed requests: " + json.dumps(real_failed[:2]))
    return {"path": path, "problems": problems}


def main():
    ap = argparse.ArgumentParser()
    ap.add_argument("--sample", type=int, default=120)
    ap.add_argument("--all", action="store_true")
    ap.add_argument("--jobs", type=int, default=4)
    ap.add_argument("--seed", type=int, default=1)
    ap.add_argument("--paths", default="", help="comma-separated paths to check")
    args = ap.parse_args()

    paths = [row[0] for row in json.loads(MANIFEST.read_text())["calcs"]]
    if args.paths:
        targets = [p.strip() for p in args.paths.split(",") if p.strip()]
    elif args.all:
        targets = paths
    else:
        random.seed(args.seed)
        targets = random.sample(paths, min(args.sample, len(paths)))
    targets = ["/", "/finance", "/math", "/search?q=mortgage", "/math/percentage"] + targets

    async def run():
        results = []
        async with async_playwright() as p:
            browser = await p.chromium.launch(args=["--no-sandbox"])
            sem = asyncio.Semaphore(args.jobs)
            tasks = [check(browser, t, sem) for t in targets]
            done = 0
            for fut in asyncio.as_completed(tasks):
                results.append(await fut)
                done += 1
                if done % 50 == 0:
                    print("  %d/%d" % (done, len(targets)), flush=True)
            await browser.close()
        return results

    results = asyncio.run(run())

    bad = [r for r in results if r.get("error") or r.get("problems")]
    OUT.write_text(json.dumps(bad, indent=1))
    print("\n%d pages, %d with problems -> %s" % (len(results), len(bad), OUT))
    for r in bad[:12]:
        print(" ", r["path"], "|", (r.get("error") or "; ".join(r["problems"]))[:220])
    return 1 if bad else 0


if __name__ == "__main__":
    sys.exit(main())
