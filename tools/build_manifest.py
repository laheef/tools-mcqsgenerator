#!/usr/bin/env python3
"""Build the compact manifest the PHP front controller reads on every request.

The shards stay as the single source of truth for definitions; this manifest is
just an offset map so a page render reads one line instead of 30 MB of JSON.

Output: php-clone/data/calc/manifest.json
    {
      "count": 3831,
      "shards": ["batch-0000.ndjson", ...],
      "categories": {"math": 681, ...},          # slug => count
      "calcs": [[path, cat, slug, name, desc, shardIndex, offset, byteLength], ...]
    }
"""
from __future__ import annotations

import html
import json
import pathlib

ROOT = pathlib.Path(__file__).resolve().parent.parent
CALC = ROOT / "php-clone" / "data" / "calc"
CATS = ROOT / "php-clone" / "data" / "categories.json"

CAT_ORDER = ["math", "finance", "physics", "health", "conversion", "everyday-life",
             "other", "statistics", "construction", "biology", "sports", "chemistry",
             "food", "ecology"]
CAT_NAMES = {c["slug"]: c.get("name", c["slug"].title())
             for c in json.loads(CATS.read_text())} if CATS.exists() else {}
CONTENT = ROOT / "php-clone" / "data" / "content"


def main() -> None:
    shards = sorted(CALC.glob("batch-*.ndjson"))
    names = [s.name for s in shards]
    rows = []
    counts: dict[str, int] = {}

    for si, shard in enumerate(shards):
        offset = 0
        with shard.open("rb") as fh:
            for line in fh:
                if line.strip():
                    rec = json.loads(line)
                    cat = rec.get("cat") or "other"
                    slug = rec.get("slug") or rec["path"].rsplit("/", 1)[-1]
                    counts[cat] = counts.get(cat, 0) + 1
                    # Listings and <title>/<meta description> use the generated,
                    # original copy — never the reference site's own text.
                    title, desc = rec.get("name") or "", ""
                    cpath = CONTENT / cat / f"{slug}.json"
                    if cpath.exists():
                        doc = json.loads(cpath.read_text())
                        title = doc.get("seoTitle") or title
                        # Stored as plain text: the corpus keeps the maths escaped
                        # ("(0&lt;p&lt;1)") because it is HTML, but this value is put
                        # into JSON and escaped again by the template.
                        desc = html.unescape(doc.get("seoDesc") or "")
                        title = html.unescape(title)
                    rows.append([rec["path"], cat, slug, title, desc, si, offset, len(line)])
                offset += len(line)

    rows.sort(key=lambda r: (CAT_ORDER.index(r[1]) if r[1] in CAT_ORDER else 99,
                             r[3].lower(), r[0]))
    manifest = {
        "count": len(rows),
        "shards": names,
        "categories": [{"slug": c, "name": CAT_NAMES.get(c, c.replace("-", " ").title()),
                        "count": counts[c]}
                       for c in sorted(counts, key=lambda c: (CAT_ORDER.index(c) if c in CAT_ORDER else 99))],
        "calcs": rows,
    }
    out = CALC / "manifest.json"
    out.write_text(json.dumps(manifest, ensure_ascii=False, separators=(",", ":")))
    print(f"{len(rows)} calculators · {len(shards)} shards · "
          f"{out.stat().st_size / 1024:.0f} KB · {len(counts)} categories")
    for c in manifest["categories"]:
        print(f"   {c['slug']:16} {c['count']:5}  {c['name']}")


if __name__ == "__main__":
    main()
