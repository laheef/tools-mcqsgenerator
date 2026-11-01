#!/usr/bin/env python3
"""
Step 2 of the pipeline — harvest calculator definitions.

Each calculator page embeds its full definition in __NEXT_DATA__
(props.pageProps.data.calculatorV2): variables, equations with one variant per
unknown, unit expressions, datasets and the article HTML. We save that object
per calculator to recon/calcs/, which tools/extract.py then converts.

Usage: python3 tools/harvest.py            # default list
       python3 tools/harvest.py /math/foo  # or explicit paths
"""
from __future__ import annotations

import json
import pathlib
import re
import sys
import time
import urllib.request

ROOT = pathlib.Path(__file__).resolve().parent.parent
OUT = ROOT / "recon" / "calcs"
UA = {"User-Agent": ("Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 "
                     "(KHTML, like Gecko) Chrome/126 Safari/537.36")}

PATHS = [
    "/math/percentage", "/finance/mortgage", "/math/percentage-increase",
    "/math/square-root", "/math/pythagorean-theorem", "/math/slope",
    "/math/scientific-notation", "/math/log", "/math/exponent",
    "/math/circumference", "/finance/sales-tax", "/finance/salary-to-hourly",
    "/statistics/p-value", "/statistics/confidence-interval", "/other/test-grade",
    "/construction/square-footage", "/math/sig-fig", "/health/bmi",
    "/physics/ohms-law", "/math/average", "/finance/compound-interest",
    "/finance/loan-payment", "/health/ideal-weight", "/physics/speed",
    "/math/triangle-area",
]

NEXT_DATA = re.compile(r'<script id="__NEXT_DATA__" type="application/json">(.*?)</script>', re.S)


def harvest(path: str) -> bool:
    url = "https://www.omnicalculator.com" + path
    try:
        req = urllib.request.Request(url, headers=UA)
        html = urllib.request.urlopen(req, timeout=40).read().decode("utf-8", "replace")
        match = NEXT_DATA.search(html)
        if not match:
            print(f"  NOJSON {path}")
            return False
        payload = json.loads(match.group(1))
        calc = payload["props"]["pageProps"]["data"]["calculatorV2"]
        name = path.strip("/").replace("/", "_")
        OUT.mkdir(parents=True, exist_ok=True)
        (OUT / f"{name}.json").write_text(json.dumps(calc, indent=1, ensure_ascii=False))
        definition = calc["definition"]
        print(
            f"  OK  {path:36} vars={len(definition['variables']):3} "
            f"eq={len(definition['equations']):3} groups={len(definition['blockGroups']):2}"
        )
        return True
    except Exception as exc:  # noqa: BLE001
        print(f"  ERR {path} {exc}")
        return False


def main(paths):
    ok = 0
    for path in paths:
        ok += harvest(path)
        time.sleep(0.4)   # be a polite client
    print(f"\nharvested {ok}/{len(paths)} -> {OUT}")


if __name__ == "__main__":
    main(sys.argv[1:] or PATHS)
