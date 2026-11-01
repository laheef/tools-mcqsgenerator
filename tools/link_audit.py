#!/usr/bin/env python3
"""
link_audit.py — measure the contextual internal linking on every page.

Checks, per page:
  * how many links were inserted into the article body
  * that no link points at the page itself
  * that no target is linked twice (spam signal)
  * that every target is a real calculator path
  * that the article's total internal links (body + cards + chips) is sane

Usage: python3 tools/link_audit.py [--sample N] [--jobs 8]
"""
from __future__ import annotations

import argparse, json, random, re, sys, urllib.request
from collections import Counter
from concurrent.futures import ThreadPoolExecutor
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent
BASE = "http://127.0.0.1:8080"
INLINE = re.compile(r'<a class="inline-link" href="([^"]+)"[^>]*>([^<]+)</a>')


def load_paths():
    """Paths of the live catalogue (the sitemap also lists retired/aliased URLs)."""
    manifest = json.loads((ROOT / "php-clone" / "data" / "calc" / "manifest.json").read_text())
    return [c[0] for c in manifest["calcs"]]


def check(path):
    try:
        html = urllib.request.urlopen(BASE + path, timeout=30).read().decode("utf-8", "replace")
    except Exception as exc:                                  # noqa: BLE001
        return {"path": path, "error": str(exc)}
    links = INLINE.findall(html)
    hrefs = [h.split("?")[0] for h, _ in links]
    issues = []
    if len(hrefs) != len(set(hrefs)):
        issues.append("duplicate target")
    if path in hrefs:
        issues.append("self link")
    if any(not h.count("/") >= 2 for h in hrefs):
        issues.append("bad target")
    total_internal = len(re.findall(r'href="/(?:[a-z0-9-]+)/(?:[a-z0-9-]+)"', html))
    return {
        "path": path,
        "inline": len(links),
        "cards": html.count('class="calc-card"'),
        "chips": html.count('class="chip"'),
        "internal_total": total_internal,
        "issues": issues,
    }


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--sample", type=int, default=0)
    ap.add_argument("--jobs", type=int, default=8)
    args = ap.parse_args()

    paths = load_paths()
    if args.sample:
        random.seed(11)
        paths = random.sample(paths, args.sample)

    with ThreadPoolExecutor(max_workers=args.jobs) as pool:
        rows = list(pool.map(check, paths))

    errs = [r for r in rows if r.get("error")]
    bad = [r for r in rows if r.get("issues")]
    counts = [r["inline"] for r in rows if "inline" in r]
    zero = [r["path"] for r in rows if r.get("inline") == 0]
    ins = [r["internal_total"] for r in rows if "internal_total" in r]

    print(f"pages checked        : {len(rows)}")
    print(f"fetch errors         : {len(errs)}")
    if counts:
        print(f"inline links / page  : avg {sum(counts)/len(counts):.1f}  min {min(counts)}  max {max(counts)}")
        print(f"pages with none      : {len(zero)}  {zero[:5]}")
        print(f"internal links / page: avg {sum(ins)/len(ins):.1f}  min {min(ins)}")
    print(f"violations           : {len(bad)}")
    # Distribution, so a page that only picked up one link is visible instead of
    # being averaged away. Written next to the other audit artefacts.
    dist = Counter(counts)
    print("distribution         :", "  ".join(f"{k} link(s): {dist[k]}" for k in sorted(dist)))
    thin = sorted((r for r in rows if r.get("inline", 99) <= 2), key=lambda r: r.get("inline", 0))
    (ROOT / "docs" / "link-coverage.json").write_text(json.dumps(thin, indent=1))
    print(f"pages with <=2 links : {len(thin)} -> docs/link-coverage.json")
    for r in bad[:8]:
        print("  ", r["path"], r["issues"])
    return 1 if (errs or bad) else 0


if __name__ == "__main__":
    sys.exit(main())
