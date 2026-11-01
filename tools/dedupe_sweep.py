#!/usr/bin/env python3
"""dedupe_sweep.py — keep the last record for each path in the sweep jsonl.

The sweep appends a chunk at a time and skips paths it has already recorded, but
a chunk interrupted by a kill, or a record removed by hand to force a re-run, can
leave two lines for one page. The last line wins: it is the most recent result.

    python3 tools/dedupe_sweep.py            # rewrite in place, print a summary
    python3 tools/dedupe_sweep.py --dry      # only report
"""
from __future__ import annotations

import json
import sys

PATH = 'docs/silent-sweep.jsonl'


def main() -> int:
    dry = '--dry' in sys.argv
    order: list[str] = []
    last: dict[str, dict] = {}
    for line in open(PATH):
        line = line.strip()
        if not line:
            continue
        try:
            rec = json.loads(line)
        except json.JSONDecodeError:
            continue
        path = rec.get('path')
        if not path:
            continue
        if path not in last:
            order.append(path)
        last[path] = rec
    counts: dict[str, int] = {}
    for rec in last.values():
        counts[rec.get('bucket', '?')] = counts.get(rec.get('bucket', '?'), 0) + 1
    print(f'{len(order)} unique paths, ' + ', '.join(f'{k} {v}' for k, v in sorted(counts.items())))
    if dry:
        return 0
    with open(PATH, 'w') as fh:
        for path in order:
            fh.write(json.dumps(last[path]) + '\n')
    print(f'rewritten {PATH}')
    return 0


if __name__ == '__main__':
    raise SystemExit(main())
