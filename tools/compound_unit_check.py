#!/usr/bin/env python3
"""
compound_unit_check.py — verify every field whose declared unit is a compound
("weeks / days", "deg min sec", ...) renders its own default, unscaled.

Such units hold more than one number, so there is no single factor. The engine
must hand the stored default straight to the box. This walks every page that has
at least one, reads the HTML, and compares the printed input value with the
definition's default. Any other value means a factor was invented again.
"""
from __future__ import annotations

import json
import re
import sys
import urllib.request
from concurrent.futures import ThreadPoolExecutor
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent
CALC = ROOT / "php-clone" / "data" / "calc"
BASE = "http://127.0.0.1:8080"
INPUT = re.compile(r'data-var="([\w]+)"[\s\S]{0,400}?value="([^"]*)"')


def compound_units() -> dict:
    raw = json.loads((CALC / "units.json").read_text())
    out = {}
    for key, sw in raw.items():
        for slug, u in (sw.get("units") or {}).items():
            if (u.get("e") or "").strip().startswith("mix("):
                out[(key, slug)] = u["e"]
    return out


def targets():
    comp = compound_units()
    pages = []
    for f in sorted(CALC.glob("batch-*.ndjson")):
        for line in f.read_text().splitlines():
            if not line.strip():
                continue
            r = json.loads(line)
            fields = []
            for g in r.get("groups") or []:
                for _grid, cols in g.get("m") or []:
                    for col in cols or []:
                        for fd in col or []:
                            k, du, name = fd.get("us"), fd.get("du"), fd.get("n")
                            if not (k and du and (k, du) in comp and name):
                                continue
                            var = (r.get("vars") or {}).get(name) or {}
                            d = None
                            for cand in var.get("dfl") or []:
                                if cand.get("v"):
                                    d = cand["v"]
                                    break
                            fields.append((name, du, comp[(k, du)], d))
            if fields:
                pages.append((r["path"], fields))
    return pages


def check(job):
    path, fields = job
    try:
        html = urllib.request.urlopen(BASE + path, timeout=25).read().decode()
    except Exception as exc:                                # noqa: BLE001
        return {"path": path, "error": str(exc)}
    shown = {m.group(1): m.group(2) for m in INPUT.finditer(html)}
    bad = []
    for name, du, expr, default in fields:
        if default in (None, "", 0, "0"):
            continue        # computed fields have no default to preserve
        got = shown.get(name)
        if got is None:
            continue
        def num(x):
            try:
                return float(str(x).replace(",", ""))
            except ValueError:
                return None

        a, b = num(got), num(default)
        same = (a is not None and b is not None and abs(a - b) <= 1e-9 * max(1.0, abs(b)))
        if not same and got.strip() != str(default).strip():
            bad.append({"var": name, "unit": du, "default": default, "rendered": got})
    return {"path": path, "checked": len([f for f in fields if f[3] not in (None, "", 0, "0")]),
            "bad": bad}


def main() -> int:
    pages = targets()
    with ThreadPoolExecutor(max_workers=8) as pool:
        results = list(pool.map(check, pages))
    errors = [r for r in results if r.get("error")]
    bad = [r for r in results if r["bad"]]
    fields = sum(r.get("checked", 0) for r in results)
    print(f"pages with a compound-unit field : {len(pages)}")
    print(f"defaulted fields compared        : {fields}")
    print(f"HTTP errors                      : {len(errors)}")
    print(f"rescaled or altered              : {len(bad)}")
    for r in bad[:10]:
        print("  ", r["path"], json.dumps(r["bad"][:3]))
    (ROOT / "docs" / "compound-unit-check.json").write_text(json.dumps(results, indent=1))
    return 1 if (bad or errors) else 0


if __name__ == "__main__":
    sys.exit(main())
