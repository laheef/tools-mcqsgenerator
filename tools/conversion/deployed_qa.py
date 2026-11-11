#!/usr/bin/env python3
"""Is the deployed page the page that was tested?

The browser QA proves the answers in this working tree. This proves that the
site is serving the same arithmetic: for every conversion page it fetches the
page from the live host and the same page from the local server, pulls the
`calc-definition` JSON out of both, and compares the formulas, the field
defaults and the rounding rules. A page whose formula differs on the host is
reported by name, so a stale deploy cannot hide behind a green test run.
"""
from __future__ import annotations

import json
import os
import re
import sys
from concurrent.futures import ThreadPoolExecutor
from urllib.request import Request, urlopen

import catalog

LOCAL = "http://127.0.0.1:8099"
LIVE = "https://mcqsgenerator.com/tool"
BLOB = re.compile(
    r'<script type="application/json" id="calc-definition">(.*?)</script>', re.S)


def definition(base: str, slug: str) -> dict:
    req = Request(f"{base}/conversion/{slug}", headers={"User-Agent": "onim-qa/1"})
    with urlopen(req, timeout=40) as fh:
        page = fh.read().decode("utf-8", "replace")
    m = BLOB.search(page)
    if not m:
        raise ValueError("no calc-definition")
    return json.loads(m.group(1))


def main() -> int:
    slugs = sorted({*catalog.PAIRS, *catalog.DENSITY, *catalog.MULTI,
                    *catalog.TEMPERATURE, *catalog.MONEY, *catalog.SCALE,
                    *catalog.CALC, *catalog.SCRIPT})

    def one(slug: str):
        try:
            return slug, definition(LOCAL, slug), definition(LIVE, slug), None
        except Exception as exc:  # noqa: BLE001
            return slug, None, None, str(exc)[:100]

    bad, same = [], 0
    with ThreadPoolExecutor(max_workers=8) as pool:
        for slug, here, live, err in pool.map(one, slugs):
            if err:
                bad.append((slug, f"fetch failed: {err}"))
                continue
            here_eq = here.get("eq") or here.get("formulas")
            live_eq = live.get("eq") or live.get("formulas")
            if here_eq != live_eq:
                bad.append((slug, "formulas differ"))
                continue
            if here.get("fields") != live.get("fields"):
                bad.append((slug, "fields differ"))
                continue
            same += 1

    print(f"{same}/{len(slugs)} pages serve the formulas tested here")
    for slug, why in bad[:20]:
        print(f"  ! {slug}: {why}")
    out = os.path.join(os.path.dirname(os.path.dirname(os.path.dirname(
        os.path.abspath(__file__)))), "qa", "R87_deployed.json")
    with open(out, "w", encoding="utf-8") as fh:
        json.dump({"same": same, "pages": len(slugs),
                   "mismatch": [{"slug": s, "why": w} for s, w in bad]},
                  fh, indent=1, ensure_ascii=False)
    return 0 if not bad else 1


if __name__ == "__main__":
    raise SystemExit(main())
