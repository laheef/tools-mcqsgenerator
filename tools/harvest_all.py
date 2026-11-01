#!/usr/bin/env python3
"""
Harvest every English calculator definition from the reference site.

Design notes
------------
* The site is Next.js, so each page carries its full calculator model in
  <script id="__NEXT_DATA__">. We keep only the *functional* part — variables,
  equations (one variant per unknown), datasets, unit expressions, field layout
  and metadata. Article HTML is deliberately NOT stored: prose is generated from
  the definition instead of copied (see tools/generate_content.py).

* Output is sharded in batches of 100 as `.ndjson` files plus a byte-offset
  index, so a page request reads exactly one line instead of a 30 MB blob.

* Resumable: re-running skips calculators already present. Safe to interrupt.

Usage
    python3 tools/harvest_all.py                 # everything, batch 100
    python3 tools/harvest_all.py --limit 300     # first 300 (smoke run)
    python3 tools/harvest_all.py --batch 250     # bigger batches
"""
from __future__ import annotations

import argparse
import json
import os
import pathlib
import re
import sys
import threading
import time
import urllib.error
import urllib.request
from concurrent.futures import ThreadPoolExecutor, as_completed

ROOT = pathlib.Path(__file__).resolve().parent.parent
URLS = ROOT / "tools" / "all-urls.json"
OUT = ROOT / "php-clone" / "data" / "calc"
UA = ("Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 "
      "(KHTML, like Gecko) Chrome/126 Safari/537.36")

NEXT_DATA = re.compile(r'<script id="__NEXT_DATA__" type="application/json">(.*?)</script>', re.S)
WORKERS = 10
_lock = threading.Lock()


# --------------------------------------------------------------------- extract
def txt(node) -> str:
    if node is None:
        return ""
    if isinstance(node, str):
        return node
    return node.get("value") or ""


def html_of(node) -> str:
    if node is None:
        return ""
    if isinstance(node, str):
        return node
    return node.get("html") or (node.get("value") or "")


def strip(s: str) -> str:
    return re.sub(r"\s+", " ", re.sub(r"<[^>]+>", "", s or "")).strip()


def label_of(field) -> str:
    for lab in field.get("labels") or []:
        v = txt(lab)
        if v:
            return v
    return ""


# Unit switchers repeat verbatim on thousands of fields (the currency switcher
# alone is ~260 units). They are stored once, keyed by Omni's own switcher id,
# and fields reference the key.
UNIT_TABLE: dict[str, dict] = {}


def unit_key(sw: dict | None) -> str | None:
    if not sw:
        return None
    units = {}
    for u in sw.get("customUnits") or []:
        if isinstance(u, dict) and u.get("slug"):
            units[u["slug"]] = u
    for u in sw.get("units") or []:
        if isinstance(u, dict) and u.get("slug"):
            units[u["slug"]] = u
    for d in sw.get("defaultUnits") or []:
        u = d.get("unit") or {}
        if u.get("slug"):
            units[u["slug"]] = u

    key = str(sw.get("unitSwitcherId") or "")
    if not key:
        import hashlib
        key = "h" + hashlib.sha1(
            (sw.get("name", "") + ",".join(sorted(units))).encode()
        ).hexdigest()[:8]

    # A switcher id may be served with different unit subsets on different
    # pages (the site trims the list per calculator). Merge instead of taking
    # the first writer, otherwise whichever page was fetched first decides how
    # many units every other page offers.
    entry = UNIT_TABLE.setdefault(key, {"name": sw.get("name") or "", "default": [], "units": {}})
    if sw.get("name") and len(sw["name"]) > len(entry["name"]):
        entry["name"] = sw["name"]
    for d in (sw.get("defaultUnits") or []):
        slug = d.get("unit", {}).get("slug")
        if slug and slug not in entry["default"]:
            entry["default"].append(slug)
    for slug, u in units.items():
        if slug not in entry["units"]:
            entry["units"][slug] = {
                "n": u.get("name") or slug,
                "f": u.get("fullName") or u.get("name") or slug,
                "e": u.get("value") or "v",
            }
    return key


def compact_field(f: dict, datasets: dict) -> dict | None:
    t = f.get("type")
    if t == "variable":
        vt = f.get("variableType")
        out = {
            "t": "v",
            "n": f.get("name"),
            "vt": vt,
            "l": label_of(f),
        }
        if f.get("prefix") and txt(f.get("prefix")):
            out["pre"] = txt(f.get("prefix"))
        if f.get("suffix") and txt(f.get("suffix")):
            out["suf"] = txt(f.get("suffix"))
        h = strip(html_of(f.get("helpText")))
        if h:
            out["h"] = h
        k = unit_key(f.get("unitSwitcher"))
        if k:
            out["us"] = k
            # Each field opens in its own unit — "Length in feet" starts at ft
            # while "Length in meters" starts at m, even though both share one
            # unit switcher. Without this every row of a converter opens in the
            # switcher's default and the page reads wrong.
            sw = f.get("unitSwitcher") or {}
            for d in (sw.get("defaultUnitsSlugs") or []):
                slug = (d or {}).get("value")
                if slug:
                    out["du"] = slug
                    break
        if f.get("outputOnly") == "SET":
            out["oo"] = 1
        if f.get("datasetUid"):
            out["ds"] = f["datasetUid"]
            ds = datasets.get(f["datasetUid"])
            if ds:
                out["opts"] = [[o["uid"], o["label"], o["value"]] for o in ds["options"]]
        return out

    if t == "text":
        chunks = []
        for ch in f.get("chunks") or []:
            for cv in ch.get("contentVariants") or []:
                h = html_of(cv.get("content") or cv.get("text") or cv)
                if strip(h):
                    chunks.append([cv.get("condition"), strip(h)[:400]])
        if not chunks:
            return None
        return {"t": "x", "c": chunks}

    if t == "image":
        urls = []
        for u in f.get("urls") or []:
            v = (u.get("url") or {}).get("value")
            if v:
                urls.append(v)
        return {"t": "i", "u": urls[:1]} if urls else None

    return None  # tables/charts are custom-JS driven; nothing to render


def compact(calc: dict) -> dict:
    defn = calc.get("definition") or {}
    text = calc.get("text") or {}
    cat = calc.get("category") or {}

    datasets = {}
    for d in defn.get("datasets") or []:
        opts = []
        for o in d.get("options") or []:
            vals = o.get("values") or []
            opts.append({
                "uid": o.get("uid"),
                "label": txt(o.get("name")) or o.get("originalName") or "",
                "value": vals[0] if vals else None,
            })
        datasets[d.get("uid")] = {"name": d.get("name"), "uiType": d.get("uiType"), "options": opts}

    # unit switchers, deduplicated by a hash of their unit set
    units = {}

    def unit_key(sw):
        if not sw:
            return None
        key = sw.get("_key")
        if isinstance(key, str) and key:
            return key
        return None

    groups = []
    for bg in defn.get("blockGroups") or []:
        matrices = []
        for m in bg.get("matrices") or []:
            cols = []
            for col in m.get("columns") or []:
                fields = []
                for f in col:
                    cf = compact_field(f, datasets)
                    if cf is not None:
                        fields.append(cf)
                if fields:
                    cols.append(fields)
            if cols:
                matrices.append([m.get("gridTemplateColumns") or "FR1", cols])
        if not matrices:
            continue
        groups.append({
            "uid": bg.get("uid"),
            "title": strip(html_of(bg.get("name"))),
            "desc": strip(html_of(bg.get("description"))),
            "m": matrices,
        })

    variables = {}
    for v in defn.get("variables") or []:
        name = v.get("name")
        if not name:
            continue
        r = v.get("rounding") or {}
        entry = {
            "type": v.get("type"),
            "rnd": [r.get("algorithm", "omni"), r.get("precision")] if r else None,
        }
        defaults = [
            {"v": d.get("value"), "c": d.get("condition")}
            for d in (v.get("defaultValues") or [])
            if d.get("value") not in (None, "")
        ]
        if defaults:
            entry["dfl"] = defaults
        if v.get("datasetUid"):
            entry["ds"] = v["datasetUid"]
        if v.get("minimumDecimalDigits"):
            entry["min"] = v["minimumDecimalDigits"]
        variables[name] = entry

    equations = []
    for e in defn.get("equations") or []:
        variants = []
        for var in e.get("variants") or []:
            variants.append({
                "l": var.get("leftHandSideVariableName"),
                "f": var.get("formula"),
                "r": var.get("rightHandSideVariablesNames") or [],
            })
        if variants:
            equations.append({"formula": e.get("formula"), "var": variants})

    paths = {}
    for p in calc.get("paths") or []:
        paths[p.get("language")] = p.get("path")

    def person(p):
        name = p.get("name") or p.get("displayName") or " ".join(
            str(x) for x in (p.get("firstName"), p.get("lastName")) if x
        ).strip()
        return name or ""

    return {
        "path": paths.get("en") or "",
        "slug": calc.get("slug"),
        "cat": cat.get("slug"),
        "name": calc.get("name"),
        "title": text.get("seoTitle") or text.get("title") or calc.get("name"),
        "desc": strip(text.get("description") or "")[:300],
        "authors": [a for a in (person(p) for p in calc.get("authors") or []) if a],
        "reviewers": [a for a in (person(p) for p in calc.get("reviewers") or []) if a],
        "updated": (calc.get("lastUpdatedAt") or text.get("pageUpdatedAt") or "")[:10],
        "rate": calc.get("positiveRatingsCount") or 0,
        "groups": groups,
        "vars": variables,
        "datasets": {k: v for k, v in datasets.items() if k in
                     {vv.get("ds") for vv in variables.values()}},
        "eq": equations,
        # The page's own JS: it either defines helper functions the equations
        # call (omni.define) or computes results directly (omni.onResult).
        # Without it those calculators can never answer, so it is part of the
        # functional model, exactly like the equations are.
        "js": (defn.get("customJs") or "").strip() or None,
        "needsJs": bool((defn.get("customJs") or "").strip().strip('"use strict";')) and not equations,
    }


# --------------------------------------------------------------------- fetching
def fetch(path: str) -> dict | None:
    url = "https://www.omnicalculator.com" + path
    for attempt in range(3):
        try:
            req = urllib.request.Request(url, headers={"User-Agent": UA})
            raw = urllib.request.urlopen(req, timeout=45).read().decode("utf-8", "replace")
            m = NEXT_DATA.search(raw)
            if not m:
                return None
            payload = json.loads(m.group(1))
            calc = payload["props"]["pageProps"]["data"].get("calculatorV2")
            if not calc:
                return None
            rec = compact(calc)
            if not rec.get("path"):
                rec["path"] = path
            return rec
        except urllib.error.HTTPError as exc:
            if exc.code in (404, 410):
                return None
            time.sleep(1.5 * (attempt + 1))
        except Exception:  # noqa: BLE001
            time.sleep(1.0 * (attempt + 1))
    return None


def main() -> None:
    ap = argparse.ArgumentParser()
    ap.add_argument("--limit", type=int, default=0)
    ap.add_argument("--batch", type=int, default=100)
    args = ap.parse_args()

    urls = json.loads(URLS.read_text())
    if args.limit:
        urls = urls[: args.limit]

    OUT.mkdir(parents=True, exist_ok=True)

    # resume: the append-only log is the source of truth while running
    done: dict[str, dict] = {}
    raw_log = OUT / "raw.ndjson"
    sources = ([raw_log] if raw_log.exists() else []) + sorted(OUT.glob("batch-*.ndjson"))
    for f in sources:
        for line in f.read_text().splitlines():
            if not line.strip():
                continue
            try:
                rec = json.loads(line)
                done[rec["path"]] = rec
            except json.JSONDecodeError:
                continue
    todo = [u for u in urls if u not in done]
    print(f"total {len(urls)} · already have {len(done)} · to fetch {len(todo)}", flush=True)

    results: list[dict] = list(done.values())
    started = time.time()
    finished = 0
    log_fh = (OUT / "raw.ndjson").open("a", encoding="utf-8")

    with ThreadPoolExecutor(max_workers=WORKERS) as pool:
        futures = {pool.submit(fetch, u): u for u in todo}
        for fut in as_completed(futures):
            path = futures[fut]
            rec = None
            try:
                rec = fut.result()
            except Exception:  # noqa: BLE001
                rec = None
            finished += 1
            if rec:
                with _lock:
                    results.append(rec)
                    log_fh.write(json.dumps(rec, ensure_ascii=False, separators=(",", ":")) + "\n")
                    log_fh.flush()
            if finished % 100 == 0 or finished == len(todo):
                elapsed = time.time() - started
                rate = finished / elapsed if elapsed else 0
                eta = (len(todo) - finished) / rate / 60 if rate else 0
                print(f"  {finished}/{len(todo)}  {rate:.1f}/s  eta {eta:.0f} min  "
                      f"ok={len(results)}", flush=True)

    log_fh.close()

    # write batches of N, ordered for stable diffs
    results = list({r["path"]: r for r in results}.values())
    results.sort(key=lambda r: (r.get("cat") or "", r.get("path") or ""))
    for old in OUT.glob("batch-*.ndjson"):
        old.unlink()
    index = {}
    for i in range(0, len(results), args.batch):
        chunk = results[i : i + args.batch]
        name = f"batch-{i // args.batch:04d}.ndjson"
        path = OUT / name
        with path.open("w", encoding="utf-8") as fh:
            offset = 0
            for rec in chunk:
                line = json.dumps(rec, ensure_ascii=False, separators=(",", ":"))
                index[rec["path"]] = [name, offset, len(line.encode("utf-8"))]
                fh.write(line + "\n")
                offset += len(line.encode("utf-8")) + 1

    if raw_log.exists():
        raw_log.unlink()
    # merge with whatever is on disk: a resumed run only sees the units of the
    # records it fetched, and clobbering the table would strip every other field.
    upt = OUT / "units.json"
    merged: dict[str, dict] = {}
    if upt.exists():
        try:
            merged.update(json.loads(upt.read_text()))
        except json.JSONDecodeError:
            pass
    merged.update(UNIT_TABLE)
    upt.write_text(json.dumps(merged, ensure_ascii=False, separators=(",", ":"), sort_keys=True))

    meta = {
        "count": len(results),
        "units": "units.json",
        "batchSize": args.batch,
        "shards": sorted(p.name for p in OUT.glob("batch-*.ndjson")),
        "index": index,
    }
    (OUT / "index.json").write_text(json.dumps(meta, ensure_ascii=False, separators=(",", ":")))
    size = sum(p.stat().st_size for p in OUT.glob("*"))
    print(f"\nwrote {len(results)} calculators in {len(meta['shards'])} batches "
          f"({size / 1e6:.1f} MB)", flush=True)


if __name__ == "__main__":
    main()
