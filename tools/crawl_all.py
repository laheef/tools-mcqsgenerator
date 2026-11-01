#!/usr/bin/env python3
"""
crawl_all.py — hit every calculator page and report anything that is not clean.

Checks per page:
  * HTTP 200
  * no PHP error text (Fatal error / Warning: / Notice: / Deprecated: / Uncaught)
  * the rendered page contains the article body and the widget shell
  * a rough byte-size floor, which catches half-rendered templates

Usage:  python3 tools/crawl_all.py [--base URL] [--cat math] [--limit N] [--jobs 8]
"""
from __future__ import annotations

import argparse
import json
import sys
import time
import urllib.error
import re
import urllib.request
from concurrent.futures import ThreadPoolExecutor
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent
CALC = ROOT / "php-clone" / "data" / "calc"

ERROR_PAT = ("Fatal error", "Parse error", "Uncaught ", "Warning: ", "Notice: ",
             "Deprecated: ", "Call to a member function", "Undefined array key")
REQUIRED = ('class="calc-widget"', 'class="calc-article"', "<h1")


def paths(cat=None):
    out = []
    for f in sorted(CALC.glob("batch-*.ndjson")):
        for line in f.read_text().splitlines():
            if not line.strip():
                continue
            r = json.loads(line)
            if cat and r.get("cat") != cat:
                continue
            out.append(r["path"])
    return sorted(set(out))


def fetch(base, path, timeout=30):
    url = base.rstrip("/") + path
    req = urllib.request.Request(url, headers={"User-Agent": "OmniCloneCrawler/1.0",
                                               "Accept-Encoding": "identity"})
    t0 = time.time()
    try:
        with urllib.request.urlopen(req, timeout=timeout) as r:
            body = r.read().decode("utf-8", "replace")
            return r.status, body, (time.time() - t0) * 1000
    except urllib.error.HTTPError as e:
        return e.code, e.read().decode("utf-8", "replace"), (time.time() - t0) * 1000
    except Exception as e:                                   # noqa: BLE001
        return 0, f"__exception__ {e}", (time.time() - t0) * 1000


SCRIPTS = re.compile(r"<(script|style)\b[^>]*>.*?</\1>", re.S | re.I)


def check(base, path):
    status, body, ms = fetch(base, path)
    problems = []
    if status != 200:
        problems.append(f"status {status}")
    # the inline JSON payload and the scripts legitimately contain the words
    # "Warning:" and "Notice:" — scan only what a reader is shown
    visible = SCRIPTS.sub(" ", body)
    for pat in ERROR_PAT:
        if pat in visible:
            idx = visible.find(pat)
            problems.append(f"{pat.strip()} @ {visible[max(0, idx - 60):idx + 140]!r}")
            break
    if status == 200:
        for req in REQUIRED:
            if req not in body:
                problems.append(f"missing {req}")
        if len(body) < 12000:
            problems.append(f"short page ({len(body)} bytes)")
    return {"path": path, "status": status, "ms": round(ms), "bytes": len(body),
            "problems": problems}


def main():
    ap = argparse.ArgumentParser()
    ap.add_argument("--base", default="http://127.0.0.1:8080")
    ap.add_argument("--cat", default="")
    ap.add_argument("--limit", type=int, default=0)
    ap.add_argument("--jobs", type=int, default=8)
    ap.add_argument("--verbose", action="store_true")
    args = ap.parse_args()

    todo = paths(args.cat or None)
    if args.limit:
        todo = todo[: args.limit]
    print(f"crawling {len(todo)} pages with {args.jobs} workers against {args.base}")

    t0 = time.time()
    bad = []
    times = []
    with ThreadPoolExecutor(max_workers=args.jobs) as pool:
        for i, res in enumerate(pool.map(lambda p: check(args.base, p), todo), 1):
            times.append(res["ms"])
            if res["problems"]:
                bad.append(res)
                print(f"  FAIL {res['path']}: {'; '.join(res['problems'])[:220]}")
            if i % 250 == 0:
                print(f"  {i}/{len(todo)}  elapsed {time.time() - t0:.0f}s")

    times.sort()
    print(f"\n{len(todo)} pages in {time.time() - t0:.0f}s  "
          f"median {times[len(times) // 2] if times else 0} ms  "
          f"p95 {times[int(len(times) * 0.95)] if times else 0} ms")
    print(f"failures: {len(bad)}")
    out = ROOT / "docs" / "crawl-failures.json"
    out.parent.mkdir(exist_ok=True)
    out.write_text(json.dumps(bad, indent=1))
    print(f"detail: {out}")
    return 1 if bad else 0


if __name__ == "__main__":
    sys.exit(main())
