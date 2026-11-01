#!/usr/bin/env python3
"""Re-derive the byte offsets in data/calc/index.json after a shard is edited.

The harvested catalogue is read with `fseek()` at (offset, length) pairs stored in
index.json, so a single hand-edit that changes a record's length silently shifts
every record after it — the symptom is a 404 (or the wrong calculator) on pages
that were fine before the edit.

    python3 tools/fix_shard_offsets.py batch-0000.ndjson [--write]

Without --write it only reports what would change.
"""
from __future__ import annotations

import json
import sys

INDEX = "/home/user/php-clone/data/calc/index.json"
SHARDS = "/home/user/php-clone/data/calc/"


def main(argv: list[str]) -> int:
    names = [a for a in argv if not a.startswith("--")]
    write = "--write" in argv
    if not names:
        print("usage: fix_shard_offsets.py <shard.ndjson> [...] [--write]")
        return 2
    idx = json.load(open(INDEX))
    index = idx["index"]
    total = 0
    for name in names:
        path = idx["shards"][0] if False else SHARDS + name  # keep shard dir explicit
        raw = open(path, "rb").read()
        pos, fixed = 0, 0
        while pos < len(raw):
            end = raw.find(b"\n", pos)
            end = len(raw) if end < 0 else end
            chunk = raw[pos:end]
            if chunk.strip():
                rec = json.loads(chunk)
                key = rec["path"]
                want = [name, pos, len(chunk)]
                if index.get(key) != want:
                    fixed += 1
                    index[key] = want
            pos = end + 1
        print(f"{name}: {fixed} offsets corrected")
        total += fixed
    if write:
        json.dump(idx, open(INDEX, "w"), ensure_ascii=False)
        print("index.json written")
    else:
        print("dry run — pass --write to save")
    return 0 if total >= 0 else 1


if __name__ == "__main__":
    raise SystemExit(main(sys.argv[1:]))
