#!/usr/bin/env python3
"""sweep_list.py — run the census on a chosen list of pages.

`silent_sweep.py` walks the whole catalogue a chunk at a time. When the question
is narrower — "do the 43 pages that used to answer nothing answer now?" — walking
four thousand pages to find out is hours of work for five hundred answers. This
runs the same visit (same filler, same buckets, same jsonl) over the paths given
in a file, and prints the ones that still do not answer.

    python3 tools/sweep_list.py /tmp/bad43.txt --workers 3
"""
from __future__ import annotations

import argparse
import json
import sys
from concurrent.futures import ThreadPoolExecutor

sys.path.insert(0, 'tools')
import silent_sweep as S  # noqa: E402


def main() -> None:
    ap = argparse.ArgumentParser()
    ap.add_argument('paths')
    ap.add_argument('--workers', type=int, default=3)
    args = ap.parse_args()

    paths = [line.strip() for line in open(args.paths) if line.strip()]
    seen = S.done()
    todo = [p for p in paths if p not in seen]
    skipped = len(paths) - len(todo)
    parts = [todo[i::args.workers] for i in range(min(args.workers, max(1, len(todo))))]
    results = []
    if todo:
        with ThreadPoolExecutor(len(parts)) as pool:
            for part in pool.map(S.work, parts):
                results.extend(part)
    counts: dict[str, int] = {}
    for rec in results:
        counts[rec['bucket']] = counts.get(rec['bucket'], 0) + 1
    print(f'checked {len(results)} (already recorded {skipped})')
    for key in sorted(counts, key=lambda k: -counts[k]):
        print(f'  {key:12s} {counts[key]}')
    for rec in results:
        if rec['bucket'] != 'ok':
            print(f"  {rec['bucket']:11s} {rec['path']}")
            if rec.get('last'):
                print(f"      {json.dumps(rec['last'])[:220]}")


if __name__ == '__main__':
    main()
