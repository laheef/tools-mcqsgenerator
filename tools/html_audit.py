#!/usr/bin/env python3
"""
html_audit.py — structural checks that a crawler or a screen reader trips over.

None of these are visible on screen, which is why they survive a design review:

  * duplicate `id` attributes — `document.getElementById` returns only the first,
    so the second copy's label, `aria-labelledby` and `#anchor` all point at the
    wrong element (a calculator whose form repeats a field per matrix column is
    the classic case);
  * a `<label for=…>` or `aria-labelledby` / `aria-describedby` that names an id
    which does not exist on the page;
  * unclosed or mis-nested tags;
  * an `<a>` wrapping a block element (invalid, and it breaks the link's
    accessible name in some readers);
  * `<img>` without `width`/`height` (layout shift) or without `decoding`;
  * `<html>` without `lang`, and internal links that leave the site.

Usage: python3 tools/html_audit.py [--sample N] [--all] [--jobs 12] [--verbose]
"""
from __future__ import annotations

import argparse
import json
import random
import re
import sys
import urllib.request
from collections import Counter
from concurrent.futures import ThreadPoolExecutor
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent
MANIFEST = ROOT / "php-clone" / "data" / "calc" / "manifest.json"
BASE = "http://127.0.0.1:8080"
OUT = ROOT / "docs" / "html-failures.json"

VOID = {"area", "base", "br", "col", "embed", "hr", "img", "input", "link",
        "meta", "param", "source", "track", "wbr"}
# HTML5 makes <a> transparent, so block content inside a link is valid; a
# heading inside one is still worth flagging because it flattens the outline.
BLOCK_IN_A = {"h1", "h2", "h3", "h4", "h5", "h6"}
TAG = re.compile(r"<(/?)([a-zA-Z][a-zA-Z0-9-]*)([^>]*?)(/?)>", re.S)
ATTR = re.compile(r'([a-zA-Z_:][-a-zA-Z0-9_:.]*)\s*=\s*"([^"]*)"')


def check(path: str) -> dict:
    try:
        raw = urllib.request.urlopen(BASE + path, timeout=30).read().decode("utf-8", "replace")
    except Exception as exc:                                    # noqa: BLE001
        return {"path": path, "error": str(exc)}

    problems: list[str] = []
    notes: list[str] = []

    # strip comments and the contents of script/style: neither is markup to parse
    html = re.sub(r"<!--.*?-->", "", raw, flags=re.S)
    html = re.sub(r"<(script|style)\b.*?</\1>", "", html, flags=re.S | re.I)

    if not re.search(r"<html[^>]*\slang=", raw, re.I):
        problems.append("<html> has no lang attribute")

    # ---- ids ---------------------------------------------------------------
    ids = re.findall(r'\sid="([^"]*)"', html)
    dup = {i: n for i, n in Counter(ids).items() if n > 1 and i.strip()}
    for i, n in list(dup.items())[:4]:
        problems.append(f'duplicate id="{i}" x{n}')

    # ---- references --------------------------------------------------------
    known = set(ids)
    for attr in ("for", "aria-labelledby", "aria-describedby", "aria-controls"):
        for value in re.findall(rf'\s{attr}="([^"]*)"', html):
            for token in value.split():
                if token and token not in known:
                    problems.append(f'{attr}="{token}" names no element on the page')
    # in-page anchors
    for href in re.findall(r'href="#([^"]+)"', html):
        if href not in known:
            problems.append(f'href="#{href}" has no target')

    # ---- tag nesting -------------------------------------------------------
    stack: list[str] = []
    for m in TAG.finditer(html):
        closing, name, _attrs, selfclose = m.group(1), m.group(2).lower(), m.group(3), m.group(4)
        if name in VOID or selfclose:
            continue
        if not closing:
            stack.append(name)
        else:
            if not stack:
                problems.append(f"</{name}> with nothing open")
                continue
            if stack[-1] == name:
                stack.pop()
            elif name in stack:
                # implicitly closed nodes in between are fine for <p>, <li>, <tr>
                while stack and stack[-1] != name:
                    dangling = stack.pop()
                    if dangling not in ("p", "li", "tr", "td", "th", "option", "dt", "dd"):
                        problems.append(f"<{dangling}> closed by </{name}>")
                if stack:
                    stack.pop()
            else:
                problems.append(f"stray </{name}>")
    for leftover in stack:
        if leftover not in ("p", "li", "tr", "td", "th", "option", "dt", "dd"):
            problems.append(f"<{leftover}> never closed")

    # ---- an <a> may not wrap a block ---------------------------------------
    for inner in re.findall(r"<a\b[^>]*>(.*?)</a>", html, re.S):
        found = {m.group(2).lower() for m in TAG.finditer(inner)}
        bad = found & BLOCK_IN_A
        if bad:
            notes.append("<a> wraps " + "/".join(sorted(bad)) + " (valid, informational)")
            break

    # ---- images ------------------------------------------------------------
    for img in re.findall(r"<img\b[^>]*>", html):
        a = dict(ATTR.findall(img))
        if "width" not in a or "height" not in a:
            problems.append("<img> without width/height (layout shift)")
            break
        if a.get("decoding") != "async" and "loading" not in a:
            problems.append("<img> without loading/decoding hints")
            break

    # ---- internal links that leave the site ---------------------------------
    for href in re.findall(r'<a\b[^>]*\shref="(https?://[^"]+)"', html):
        if "127.0.0.1" not in href and "omnicalculator.com" not in href and "google.com" not in href:
            problems.append(f"outbound link to {href.split('/')[2]}")
            break

    return {"path": path, "ids": len(ids), "problems": problems[:8],
            "notes": notes, "count": len(problems)}


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--sample", type=int, default=0)
    ap.add_argument("--all", action="store_true")
    ap.add_argument("--jobs", type=int, default=12)
    ap.add_argument("--seed", type=int, default=3)
    ap.add_argument("--verbose", action="store_true")
    args = ap.parse_args()

    paths = [row[0] for row in json.loads(MANIFEST.read_text())["calcs"]]
    if not args.all:
        random.seed(args.seed)
        paths = random.sample(paths, min(args.sample or 120, len(paths)))
    paths = ["/", "/search?q=mortgage", "/finance", "/math/percentage"] + paths

    with ThreadPoolExecutor(max_workers=args.jobs) as pool:
        rows = list(pool.map(check, paths))

    errors = [r for r in rows if r.get("error")]
    bad = [r for r in rows if r.get("problems")]
    tally = Counter()
    for r in bad:
        for p in r["problems"]:
            tally[re.sub(r'"[^"]*"', '"…"', p)] += 1

    OUT.write_text(json.dumps(bad, indent=1))
    print(f"pages checked        : {len(rows)}")
    print(f"fetch errors         : {len(errors)}")
    print(f"pages with problems  : {len(bad)}")
    print(f"distinct problems    : {len(tally)}")
    for msg, n in tally.most_common(12):
        print(f"  {n:>5} page(s)  {msg}")
    if args.verbose:
        for r in bad[:5]:
            print("  ", r["path"], r["problems"][:3])
    return 1 if (errors or bad) else 0


if __name__ == "__main__":
    sys.exit(main())
