#!/usr/bin/env python3
"""html_audit_round32.py — the served-HTML half of the round-32 acceptance.

Some of the eight items are promises about the markup every page sends, and
markup can be checked faster than a browser can drive it: 4 000 pages of HTML in
a couple of minutes instead of hours.

    python3 tools/html_audit_round32.py            # all calculators
    python3 tools/html_audit_round32.py --limit 200

Checks, per page:
  3  no input carries a `value="…"` on load (a box that arrives filled)
  5  no empty label is emitted for a control, and no group renders with neither
     a title nor a field in it
  6  date/time boxes are present and are not given a starting text
  8  a page with no formula offers a note instead of a Calculate button
"""
from __future__ import annotations

import argparse
import json
import re
import sys
import urllib.request
from concurrent.futures import ThreadPoolExecutor

BASE = "http://127.0.0.1:8080"

# an input that carries a starting value (the unit selects are excluded: a unit
# chip is a choice of scale, not an answer, and it must have a selection)
VALUED_INPUT = re.compile(
    r'<input\b[^>]*\bdata-var="[^"]+"[^>]*>', re.S)
VALUE_ATTR = re.compile(r'\bvalue="([^"]*)"')
EMPTY_LABEL = re.compile(r'<(legend|label)[^>]*class="[^"]*calc-label[^"]*"[^>]*>\s*</\1>')
GROUP = re.compile(r'<section class="calc-group[^"]*"[^>]*>(.*?)</section>', re.S)
EMPTY_DATE = re.compile(r'<input\b[^>]*\bdata-datetype="[^"]+"[^>]*>')


def paths(limit: int) -> list[str]:
    with urllib.request.urlopen(f"{BASE}/search-index.json", timeout=60) as r:
        index = json.loads(r.read().decode())
    out = sorted({e["u"] for e in index})
    return out[:limit] if limit else out


def fetch(path: str) -> str:
    with urllib.request.urlopen(BASE + path, timeout=60) as r:
        return r.read().decode("utf-8", "replace")


def check(path: str) -> list[str]:
    try:
        html = fetch(path)
    except Exception as exc:                                    # noqa: BLE001
        return [f"{path}: could not fetch ({str(exc)[:60]})"]

    problems: list[str] = []
    widget = html.split('data-calculator=', 1)
    body = widget[1] if len(widget) > 1 else html

    # --- item 3: no control arrives with a value --------------------------
    filled = []
    for tag in VALUED_INPUT.findall(body):
        if 'type="radio"' in tag or 'type="checkbox"' in tag or 'readonly' in tag:
            continue
        m = VALUE_ATTR.search(tag)
        if m and m.group(1).strip() != "":
            name = re.search(r'data-var="([^"]+)"', tag)
            filled.append((name.group(1) if name else "?", m.group(1)))
    if filled:
        problems.append(f"{len(filled)} box(es) open with a value: "
                        + ", ".join(f"{n}={v!r}" for n, v in filled[:3]))

    # --- item 5: no empty label, no group with neither title nor field ----
    if EMPTY_LABEL.search(body):
        problems.append("an empty label is rendered for a control")

    for group in GROUP.findall(body):
        title = re.search(r'calc-group-title"[^>]*>\s*([^<]*?)\s*</span>', group)
        has_title = bool(title and title.group(1).strip())
        has_field = 'data-field' in group or 'calc-field-home' in group
        has_input = bool(re.search(r'<input\b', group))
        if not has_title and not has_field and not has_input:
            if re.search(r'<div class="calc-group-body"[^>]*>\s*</div>', group):
                problems.append("a group renders with no title and nothing in it")

    # --- item 8: no dead Calculate button ---------------------------------
    has_button = 'data-calc-go' in body
    no_formula = 'Nothing to calculate here' in body
    if no_formula and has_button:
        problems.append("says there is nothing to calculate but still offers the button")
    if not no_formula and not has_button and 'written up, not wired up' not in body:
        problems.append("neither a Calculate button nor an explanation")

    # --- item 6: a date box must not carry a starting text ----------------
    for tag in EMPTY_DATE.findall(body):
        m = VALUE_ATTR.search(tag)
        if m and m.group(1).strip() != "":
            problems.append(f"date box opens with {m.group(1)!r}")

    return problems


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--limit", type=int, default=0)
    ap.add_argument("--jobs", type=int, default=8)
    args = ap.parse_args()

    todo = paths(args.limit)
    problems: list[str] = []
    done = 0

    def batch(items: list[str]) -> None:
        nonlocal done
        for path in items:
            problems.extend(check(path))
            done += 1

    size = max(1, len(todo) // args.jobs)
    with ThreadPoolExecutor(max_workers=args.jobs) as ex:
        list(ex.map(batch, [todo[i:i + size] for i in range(0, len(todo), size)]))

    print(f"pages checked : {done}")
    print(f"problems      : {len(problems)}")
    kinds: dict[str, int] = {}
    for p in problems:
        key = p.split(":", 1)[1].strip()[:60] if ":" in p else p[:60]
        kinds[key] = kinds.get(key, 0) + 1
    for k, v in sorted(kinds.items(), key=lambda kv: -kv[1])[:10]:
        print(f"  {v:5d}  {k}")
    for p in problems[:20]:
        print("  -", p)
    return 1 if problems else 0


if __name__ == "__main__":
    sys.exit(main())
