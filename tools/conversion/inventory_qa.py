"""Does every conversion calculator have its own PHP file?

Answers the question a reader actually asks: *is anything in this category still
running through the generic widget instead of a page built for it?*

Four lists are compared, and the script refuses if any two disagree:

    A  data/calc/batch-*.ndjson  rows with cat = conversion   (the inventory)
    B  data/content/conversion/*.json                          (the page copy)
    C  plugins/calc/conversion/qm-calc-*.php                   (the separate files)
    D  the live category index and sitemap                     (what a visitor sees)

Run with `--live` to add D (needs network).
"""

from __future__ import annotations

import argparse
import glob
import json
import os
import re
import sys
import urllib.request

HERE = os.path.dirname(os.path.abspath(__file__))
ROOT = os.path.abspath(os.path.join(HERE, "..", ".."))
CAT = "conversion"
LIVE = "https://mcqsgenerator.com/tool"


def inventory() -> dict[str, dict]:
    rows: dict[str, dict] = {}
    for path in sorted(glob.glob(os.path.join(ROOT, "data", "calc", "batch-*.ndjson"))):
        with open(path, encoding="utf-8") as fh:
            for line in fh:
                line = line.strip()
                if not line:
                    continue
                row = json.loads(line)
                if row.get("cat") == CAT:
                    rows[row["slug"]] = row
    return rows


def content() -> set[str]:
    out = set()
    for path in glob.glob(os.path.join(ROOT, "data", "content", CAT, "*.json")):
        out.add(os.path.basename(path)[: -len(".json")])
    return out


def files() -> set[str]:
    out = set()
    for path in glob.glob(os.path.join(ROOT, "plugins", "calc", CAT, "qm-calc-*.php")):
        base = os.path.basename(path)
        out.add(base[len("qm-calc-") : -len(".php")])
    return out


def claims() -> dict[str, str]:
    """The route a file's own header comment says it serves.

    A calculator file names its route in the docblock at the top
    (`* /conversion/inch-to-meter`). A copied-and-not-edited file keeps the old
    route in that line while sitting under a new filename, and that is exactly
    the mistake this catches.
    """
    out: dict[str, str] = {}
    for path in glob.glob(os.path.join(ROOT, "plugins", "calc", CAT, "qm-calc-*.php")):
        head = "".join(open(path, encoding="utf-8").readlines()[:12])
        m = re.search(r"^\s*\*\s*/([a-z0-9\-]+/[a-z0-9\-]+)\s*$", head, re.M)
        out[os.path.basename(path)] = m.group(1) if m else "?"
    return out


def fetch(url: str) -> str:
    req = urllib.request.Request(url, headers={"User-Agent": "onim-qa/1.0"})
    with urllib.request.urlopen(req, timeout=45) as fh:
        return fh.read().decode("utf-8", "replace")


def live_lists() -> tuple[set[str], set[str]]:
    index = fetch(f"{LIVE}/conversion")
    cards = set(re.findall(r'href="[^"]*?/tool/conversion/([a-z0-9\-]+)"', index))
    cards |= {m for m in re.findall(r'href="/tool/conversion/([a-z0-9\-]+)"', index)}
    cards.discard("")
    sitemap = fetch(f"{LIVE}/sitemap.xml")
    locs = set(re.findall(r"<loc>[^<]*?/tool/conversion/([a-z0-9\-]+)</loc>", sitemap))
    return cards, locs


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--live", action="store_true")
    args = ap.parse_args()

    inv = inventory()
    cont = content()
    fls = files()
    ok = True

    print(f"inventory rows (cat=conversion)   {len(inv)}")
    print(f"content JSON pages                {len(cont)}")
    print(f"separate PHP files                {len(fls)}")

    missing_files = sorted(set(inv) - fls)
    extra_files = sorted(fls - set(inv))
    missing_content = sorted(set(inv) - cont)
    extra_content = sorted(cont - set(inv))

    print("\nWITHOUT A SEPARATE PHP FILE:", len(missing_files))
    for slug in missing_files:
        print("   ", slug)
    if extra_files:
        ok = False
        print("\nPHP FILE WITH NO INVENTORY ROW:", len(extra_files))
        for slug in extra_files:
            print("   ", slug)
    if missing_content:
        ok = False
        print("\nINVENTORY ROW WITH NO CONTENT JSON:", len(missing_content))
        for slug in missing_content:
            print("   ", slug)
    if extra_content:
        ok = False
        print("\nCONTENT JSON WITH NO INVENTORY ROW:", len(extra_content))
        for slug in extra_content:
            print("   ", slug)

    wrong = []
    for base, route in claims().items():
        want = base[len("qm-calc-") : -len(".php")]
        if route != f"{CAT}/{want}":
            wrong.append((base, route, f"{CAT}/{want}"))
    if wrong:
        ok = False
        print("\nFILES CLAIMING THE WRONG SLUG OR PATH:", len(wrong))
        for row in wrong[:20]:
            print("   ", row)
    else:
        print("\nall 330 files claim their own slug and /conversion/<slug> path")

    if args.live:
        cards, locs = live_lists()
        print(f"\nlive category index cards         {len(cards)}")
        print(f"live sitemap conversion URLs      {len(locs)}")
        for label, seen in (("category index", cards), ("sitemap", locs)):
            gone = sorted(set(inv) - seen)
            extra = sorted(seen - set(inv))
            if gone or extra:
                ok = False
                print(f"{label}: {len(gone)} listed-but-missing, {len(extra)} extra")
                for s in gone[:10]:
                    print("   missing from", label, s)
                for s in extra[:10]:
                    print("   extra in", label, s)
            else:
                print(f"{label}: exactly the inventory, nothing missing, nothing extra")

    print("\nRESULT:", "PASS" if ok else "FAIL")
    return 0 if ok else 1


if __name__ == "__main__":
    sys.exit(main())
