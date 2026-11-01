"""
Build the biology pack: specs -> panel definitions + articles + SVGs -> import.

Usage:
    python3 tools/biology/build.py --write      # write JSON + SVG files
    python3 tools/biology/build.py --report     # what would be built
"""

from __future__ import annotations

import argparse
import glob
import importlib.util
import json
import os
import re
import subprocess
import sys

sys.path.insert(0, os.path.dirname(__file__))

from lib import CAT, Spec, solve_example  # noqa: E402
import article as art  # noqa: E402
import svg as svglib  # noqa: E402

ROOT = "/home/user/php-clone"
SITE = os.path.dirname(os.path.dirname(os.path.dirname(os.path.abspath(__file__)))) + "/php-clone"
SVG_OUT = "/home/user/php-clone/uploads/biology"
DOC_OUT = "/home/user/php-clone/data/samples/biology-pack.json"


def load_specs() -> list[Spec]:
    specs: list[Spec] = []
    for path in sorted(glob.glob(os.path.join(os.path.dirname(__file__), "specs_*.py"))):
        name = os.path.basename(path)[:-3]
        spec_ = importlib.util.spec_from_file_location(name, path)
        module = importlib.util.module_from_spec(spec_)
        spec_.loader.exec_module(module)
        specs.extend(getattr(module, "SPECS", []))
    return specs


def custom_index() -> dict[str, str]:
    """slug -> name for every calculator already created in the panel.

    `catalogue_index` only knows the harvested files, so a spec that repeats a
    calculator built in an *earlier biology batch* used to sail through: the
    slug differed, the name did not, and three pairs of pages ended up sharing a
    <title> ("GC Content Calculator" twice under /biology/gc-content-*,
    "Genetic Linkage Distance Calculator" twice, "Restriction Digest Reaction
    Setup" twice). Two pages competing for one query is a duplicate-content
    defect that nothing else in the pipeline can see.
    """
    out = subprocess.run(
        ["bash", f"{ROOT}/../tools/php.sh", "-r",
         'require "php-clone/config.php";'
         'foreach (Omni\\Db::all("SELECT slug, name FROM custom_calculators") as $r)'
         ' echo $r["slug"], "\\t", $r["name"], "\\n";'],
        capture_output=True, text=True, cwd=ROOT + "/..")
    index: dict[str, str] = {}
    for line in out.stdout.splitlines():
        bits = line.split("\t")
        if len(bits) == 2 and bits[0]:
            index[bits[0].strip()] = bits[1].strip()
    return index


def catalogue_index() -> tuple[dict[str, str], set[str]]:
    by_slug: dict[str, str] = {}
    for f in glob.glob(ROOT + "/data/calc/*.ndjson"):
        for line in open(f):
            line = line.strip()
            if not line:
                continue
            r = json.loads(line)
            by_slug[r["slug"]] = r["cat"]
    return by_slug, set(by_slug)


def validate(spec: Spec) -> list[str]:
    """Rules the page engine enforces at save time, checked here first."""
    problems: list[str] = []
    text_keys = [f["key"] for f in spec.fields if f.get("type") == "text"]
    for f in spec.fields:
        if f.get("type") == "text" and f.get("output"):
            problems.append(f"{spec.slug}: text field “{f['key']}” cannot be an output")
    for direction in spec.dirs:
        for key in text_keys:
            if re.search(rf"\b{re.escape(key)}\b", direction["f"]):
                problems.append(f"{spec.slug}: formula for “{direction['l']}” reads the text field "
                                f"“{key}” — formulas are numeric, use the page script")
    # num(key, label, default, unit, help, output) takes the default third; a unit
    # typed into that slot stores "%" or "bp" as the value and the page opens with
    # a non-number in a numeric box. Cheap to catch here, invisible in the browser.
    for f_ in spec.fields:
        if f_.get("type") == "number":
            dfl = str(f_.get("default", "")).strip()
            if dfl and dfl not in ("0",) and not dfl.lstrip("-").replace(".", "", 1).isdigit():
                problems.append(
                    f"{spec.slug}: field “{f_['key']}” has a non-numeric default “{dfl}” — "
                    "is the unit in the default slot?")

    if not spec.dirs and not spec.script:
        problems.append(f"{spec.slug}: no formulas and no page script, so nothing is calculated")
    if spec.script and "onResult" not in spec.script and "define" not in spec.script:
        problems.append(f"{spec.slug}: the page script never registers a hook")
    return problems


def build_row(spec: Spec) -> tuple[dict, str]:
    ex = solve_example(spec)
    row = {
        "name": spec.name,
        "slug": spec.slug,
        "category_slug": CAT,
        "h1": spec.h1 or spec.name,
        "meta_title": art.meta_title(spec),
        "meta_description": art.meta_description(spec, ex),
        "summary": art.summary(spec, ex),
        "status": "published",
        "icon": spec.icon,
        "sort_order": 1000,
        "fields": spec.fields,
        "directions": spec.dirs,
        "sections": art.sections(spec, ex),
        "faq": art.faq(spec, ex),
        "js": spec.script or "",
    }
    return row, svglib.render(spec, ex)


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--write", action="store_true")
    ap.add_argument("--report", action="store_true")
    ap.add_argument("--only", default="")
    ap.add_argument("--links", action="store_true",
                    help="check every internal related link against the running site")
    args = ap.parse_args()

    specs = load_specs()
    by_slug, existing = catalogue_index()
    panel = custom_index()
    pack_slugs = {s.slug for s in specs}
    # A row that this run is about to update keeps whatever name the spec now
    # gives it, so only rows *outside* the pack are fixed competition. Names
    # inside the pack are compared with each other, which catches two specs
    # claiming one name before either reaches the database.
    name_owner = {name: slug for slug, name in panel.items() if slug not in pack_slugs}
    pack_names: dict[str, str] = {}
    for spec_ in specs:
        if spec_.slug in pack_slugs:
            pack_names.setdefault(spec_.name, spec_.slug)

    if args.links:
        only = [s for s in specs if not args.only or args.only in s.slug]
        bad = check_related(only)
        for b in bad:
            print(" !", b)
        print(f"checked related links on {len(only)} specs, {len(bad)} problems")
        return 1 if bad else 0

    rows, svgs, problems = [], {}, []
    seen = set()
    for spec in specs:
        if args.only and args.only not in spec.slug:
            continue
        if spec.slug in existing:
            problems.append(f"skip {spec.slug}: already in the catalogue ({by_slug[spec.slug]})")
            continue
        if spec.slug in seen:
            problems.append(f"skip {spec.slug}: duplicate in the pack")
            continue
        # A page may keep the name it already has, but it may not take a name
        # another page is already competing for — that is how the three
        # duplicate <title> pairs were made.
        owner = name_owner.get(spec.name)
        if owner is None and pack_names.get(spec.name) != spec.slug:
            owner = pack_names.get(spec.name)
        if owner is not None and owner != spec.slug:
            problems.append(f"FAILED {spec.slug}: the name “{spec.name}” already belongs to "
                            f"/biology/{owner}; give this page its own name")
            continue
        seen.add(spec.slug)
        bad = validate(spec)
        if bad:
            problems.extend("FAILED " + b for b in bad)
            continue
        try:
            row, svg = build_row(spec)
        except Exception as exc:                      # noqa: BLE001 - report, do not stop
            problems.append(f"FAILED {spec.slug}: {exc}")
            continue
        rows.append(row)
        svgs[spec.slug] = svg

    if args.write:
        os.makedirs(SVG_OUT, exist_ok=True)
        for slug, svg in svgs.items():
            with open(os.path.join(SVG_OUT, slug + ".svg"), "w") as fh:
                fh.write(svg)
        with open(DOC_OUT, "w") as fh:
            json.dump(rows, fh, indent=1, ensure_ascii=False)
        print(f"wrote {len(rows)} calculators -> {DOC_OUT}")
        print(f"wrote {len(svgs)} infographics -> {SVG_OUT}")
    else:
        print(f"{len(rows)} calculators ready ({len(specs)} specs)")

    for spec, row in zip([s for s in specs if s.slug in {r['slug'] for r in rows}], rows):
        words = len(" ".join([row["summary"]] + [s["html"] for s in row["sections"]]
                             + [f["a"] for f in row["faq"]]).split())
        print(f"  {spec.slug:42s} fields={len(row['fields']):2d} "
              f"dirs={len(row['directions']):2d} sections={len(row['sections'])} "
              f"faq={len(row['faq'])} words={words}")
    for p in problems:
        print(" !", p)
    return 0


def check_related(specs: list[Spec]) -> list[str]:
    """Every related link must resolve on the running site.

    An internal link to a 404 is worse than no link: it wastes the crawl budget
    and it tells the reader the page was written without checking. This runs at
    build time so a typo cannot ship.
    """
    import urllib.request
    import urllib.error
    problems = []
    for spec in specs:
        # `seen` is per spec: two pages linking to the same target is normal, one
        # page linking to the same target twice is the mistake.
        seen: dict[str, str] = {}
        for path, _label in spec.related:
            if path in seen:
                problems.append(f"{spec.slug}: duplicate related link {path} (also in {seen[path]})")
                continue
            seen[path] = spec.slug
            try:
                with urllib.request.urlopen("http://localhost:8080" + path, timeout=20) as r:
                    if r.status != 200:
                        problems.append(f"{spec.slug}: related link {path} -> HTTP {r.status}")
            except Exception as exc:  # noqa: BLE001
                problems.append(f"{spec.slug}: related link {path} -> {str(exc)[:60]}")
    return problems


if __name__ == "__main__":
    raise SystemExit(main())
