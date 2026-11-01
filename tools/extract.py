#!/usr/bin/env python3
"""
Omni Calculator clone — reference data extractor.

Reads the raw captured payloads in ./php-clone/docs/reference-payloads/*.json
(each is the `calculatorV2` object out of the Next.js __NEXT_DATA__ blob) and
emits a compact, framework-free schema into ./php-clone/data/.

The point of this file is documentation of the reverse engineering: it shows
exactly which fields of Omni's calculator definition drive the UI, the solver
and the SEO metadata.

Usage:  python3 tools/extract.py
"""
from __future__ import annotations

import glob
import hashlib
import json
import os
import re
import sys

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))

# Calculators whose arithmetic lives entirely in per-calculator custom JS rather
# than in the declarative equation list. Shipping them would mean a page whose
# fields never produce a result, so they are excluded on purpose (SPEC.md §8).
SKIP = {
    "math/average",             # no equations; list handling is bespoke JS
    "math/sig-fig",             # no equations; 30 KB of bespoke rounding JS
    "finance/compound-interest",  # only a rate identity; balances come from JS
}
SRC = os.path.join(ROOT, "php-clone", "docs", "reference-payloads")
OUT = os.path.join(ROOT, "php-clone", "data")

# ---------------------------------------------------------------- helpers


def txt(node, default=""):
    """Omni wraps every user-facing string in {uid, html, value}."""
    if node is None:
        return default
    if isinstance(node, str):
        return node
    return node.get("value") or default


def html(node, default=""):
    if node is None:
        return default
    if isinstance(node, str):
        return node
    return node.get("html") or default


def label_of(field):
    """First label variant, else empty."""
    for lab in field.get("labels") or []:
        v = txt(lab)
        if v:
            return v
    return ""


def strip_tags(s):
    return re.sub(r"<[^>]+>", "", s or "").strip()


def unescape_html_field(s: str) -> str:
    """
    Omni ships article HTML as a *doubly* encoded string: the payload value
    already contains JSON escapes, so it arrives as `<div class=\"textBlock\">`.
    Decode exactly one more layer so the markup is real HTML again.
    """
    if not s:
        return s
    marker = chr(92) + '"'   # backslash-quote
    if marker not in s and (chr(92) + "n") not in s:
        return s
    # Wrap in quotes and let json do the escape handling, escaping only the
    # quotes that are not already escaped.
    wrapped = '"' + s.replace('\\', '\\\\').replace('"', '\\"') + '"'
    try:
        return json.loads(wrapped)
    except Exception:  # noqa: BLE001
        return (
            s.replace(marker, '"')
            .replace(chr(92) + "n", chr(10))
            .replace(chr(92) + "r", "")
            .replace(chr(92) + "t", chr(9))
            .replace(chr(92) + "/", "/")
        )


# ---------------------------------------------------------------- units


class UnitRegistry:
    """Omni units are linear: base_value = eval(expr, v = unit_value)."""

    def __init__(self):
        self.by_sig = {}

    def sig(self, switcher):
        raw = json.dumps(switcher.get("name", ""), sort_keys=True)
        seen = []
        for d in switcher.get("defaultUnits") or []:
            u = d.get("unit") or {}
            seen.append(u.get("slug"))
        return hashlib.sha1((raw + "|" + ",".join(map(str, seen))).encode()).hexdigest()[:10]

    def collect(self, switcher):
        if not switcher:
            return None
        key = self.sig(switcher)
        if key in self.by_sig:
            return key
        units = {}

        def add(u):
            if not isinstance(u, dict) or not u.get("slug"):
                return
            units[u["slug"]] = {
                "name": u.get("name") or u["slug"],
                "full": u.get("fullName") or u.get("name") or u["slug"],
                "expr": u.get("value") or "v",
                "aliases": u.get("aliases") or [],
            }

        for u in switcher.get("customUnits") or []:
            add(u)
        for u in switcher.get("units") or []:
            add(u)
        for d in switcher.get("defaultUnits") or []:
            add(d.get("unit") or {})

        defaults = []
        for d in switcher.get("defaultUnits") or []:
            u = (d.get("unit") or {}).get("slug")
            if u and u not in defaults:
                defaults.append(u)

        self.by_sig[key] = {
            "name": switcher.get("name") or "",
            "units": units,
            "default": defaults,
            "base": switcher.get("baseUnitSlug"),
            "inversed": bool(switcher.get("inversed")),
        }
        return key

    def dump(self):
        return self.by_sig


# ---------------------------------------------------------------- fields


def convert_field(field, reg, datasets, seen_names):
    ftype = field.get("type")
    out = {
        "type": ftype,
        "uid": field.get("uid"),
        "name": field.get("name"),
    }

    if ftype == "variable":
        vt = field.get("variableType")
        out.update(
            {
                "var": field.get("name"),
                "variableType": vt,
                "label": label_of(field),
                "prefix": txt(field.get("prefix")),
                "suffix": txt(field.get("suffix")),
                "help": strip_tags(html(field.get("helpText"))),
                "monetary": bool(field.get("monetary")),
                "inEquation": bool(field.get("inEquation")),
                "outputOnly": field.get("outputOnly") == "SET",
                "lock": field.get("lock") == "SET",
                "noFormat": bool(field.get("noFormat")),
                "minDigits": field.get("minimumDecimalDigits"),
                "defaults": [
                    {
                        "value": d.get("value"),
                        "now": d.get("now"),
                        "condition": d.get("condition"),
                    }
                    for d in (field.get("defaultValues") or [])
                ],
            }
        )
        r = field.get("rounding") or {}
        if r:
            out["rounding"] = {
                "algorithm": r.get("algorithm", "omni"),
                "precision": r.get("precision"),
            }
        keys = []
        for slot in ("unitSwitcher", "unitSwitcherSecond"):
            k = reg.collect(field.get(slot))
            out[slot] = k
            if k:
                keys.append((slot, k))
        if field.get("unitsType"):
            out["unitsType"] = field["unitsType"]
        if field.get("unitsSourceVariableUid"):
            out["unitsSource"] = field["unitsSourceVariableUid"]
        if field.get("datasetUid"):
            out["datasetUid"] = field["datasetUid"]
            ds = datasets.get(field["datasetUid"])
            if ds:
                out["options"] = [
                    {"uid": o["uid"], "label": o["label"], "value": o["value"]}
                    for o in ds["options"]
                ]
        if field.get("defaultValues"):
            pass
        if field.get("valueSetter"):
            out["valueSetter"] = field["valueSetter"]
        return out

    if ftype == "text":
        # Rich text chunk: each chunk has contentVariants with html+condition.
        chunks = []
        for ch in field.get("chunks") or []:
            variants = []
            for cv in ch.get("contentVariants") or []:
                variants.append(
                    {
                        "html": unescape_html_field(html(cv.get("content") or cv.get("text") or cv)),
                        "condition": cv.get("condition"),
                    }
                )
            chunks.append(
                {
                    "uid": ch.get("uid"),
                    "textType": ch.get("textType"),
                    "formatType": ch.get("formatType"),
                    "variants": variants,
                }
            )
        out["chunks"] = chunks
        out["formatType"] = field.get("formatType")
        out["condition"] = field.get("condition")
        return out

    if ftype == "image":
        urls = []
        for u in field.get("urls") or []:
            url = (u.get("url") or {}).get("value")
            if url:
                urls.append(
                    {
                        "value": url,
                        "width": (u.get("url") or {}).get("width"),
                        "height": (u.get("url") or {}).get("height"),
                        "condition": u.get("condition"),
                    }
                )
        out["urls"] = urls
        out["caption"] = strip_tags(html(field.get("caption")))
        return out

    if ftype == "table":
        out.update(
            {
                "headings": field.get("headings") or [],
                "rows": field.get("rows") or [],
                "caption": strip_tags(html(field.get("caption"))),
                "tableType": field.get("tableType"),
                "headers": field.get("headers") or [],
            }
        )
        return out

    if ftype == "chart":
        out.update(
            {
                "chartType": field.get("chartType"),
                "title": strip_tags(html(field.get("title"))),
                "dataSources": field.get("dataSources") or [],
                "xAxis": field.get("xAxis"),
                "series": field.get("series") or [],
                "code": field.get("code"),
            }
        )
        return out

    # unknown: keep the raw payload so nothing silently disappears
    out["raw"] = field
    return out


# ---------------------------------------------------------------- dataset


def convert_datasets(defn):
    ds = {}
    for d in defn.get("datasets") or []:
        options = []
        for o in d.get("options") or []:
            vals = o.get("values") or []
            options.append(
                {
                    "uid": o.get("uid"),
                    "label": txt(o.get("name")) or o.get("originalName") or "",
                    "value": vals[0] if vals else None,
                }
            )
        ds[d.get("uid")] = {
            "uid": d.get("uid"),
            "name": d.get("name"),
            "uiType": d.get("uiType"),
            "options": options,
        }
    return ds


# ---------------------------------------------------------------- equations


def convert_equations(defn):
    eqs = []
    for e in defn.get("equations") or []:
        variants = []
        for v in e.get("variants") or []:
            variants.append(
                {
                    "lhs": v.get("leftHandSideVariableName"),
                    "formula": v.get("formula"),
                    "rhs": v.get("rightHandSideVariablesNames") or [],
                }
            )
        eqs.append(
            {
                "formula": e.get("formula"),
                "variants": variants,
                "messages": [m for m in (e.get("messages") or [])],
            }
        )
    return eqs


# ---------------------------------------------------------------- variables


def convert_variables(defn, datasets):
    out = {}
    for v in defn.get("variables") or []:
        name = v.get("name")
        if not name:
            continue
        r = v.get("rounding") or {}
        entry = {
            "type": v.get("type"),
            "lock": v.get("lock"),
            "unit": (v.get("rounding") or {}).get("algorithm"),
            "rounding": (
                {"algorithm": r.get("algorithm", "omni"), "precision": r.get("precision")}
                if r
                else None
            ),
            "minDigits": v.get("minimumDecimalDigits"),
            "defaults": [
                {"value": d.get("value"), "now": d.get("now"), "condition": d.get("condition")}
                for d in (v.get("defaultValues") or [])
            ],
        }
        if v.get("datasetUid"):
            entry["datasetUid"] = v["datasetUid"]
        out[name] = entry
    return out


# ---------------------------------------------------------------- groups


def convert_groups(defn, reg, datasets):
    groups = []
    for gi, bg in enumerate(defn.get("blockGroups") or []):
        matrices = []
        for m in bg.get("matrices") or []:
            cols = []
            for col in m.get("columns") or []:
                fields = [convert_field(f, reg, datasets, set()) for f in col]
                cols.append(fields)
            matrices.append(
                {
                    "uid": m.get("uid"),
                    "grid": m.get("gridTemplateColumns") or "FR1",
                    "columns": cols,
                }
            )
        groups.append(
            {
                "uid": bg.get("uid"),
                "title": strip_tags(html(bg.get("name"))),
                "description": strip_tags(html(bg.get("description"))),
                "collapsable": bg.get("collapsableVariant") or "defaultExpanded",
                "hidden": bool(bg.get("isHiddenGroup")),
                "condition": bg.get("condition"),
                "matrices": matrices,
            }
        )
    return groups


# ---------------------------------------------------------------- main


def convert(calc, reg):
    defn = calc.get("definition") or {}
    datasets = convert_datasets(defn)
    cat = calc.get("category") or {}
    text = calc.get("text") or {}
    def person(p):
        name = p.get("name") or p.get("displayName")
        if not name:
            name = " ".join(
                str(x) for x in (p.get("firstName"), p.get("lastName")) if x
            ).strip()
        return {
            "name": name or "",
            "title": p.get("title") or "",
            "bio": (p.get("bio") or "").strip(),
            "avatar": p.get("portraitImageUrl") or "",
        }

    authors = [person(a) for a in calc.get("authors") or []]
    reviewers = [person(a) for a in calc.get("reviewers") or []]
    paths = {}
    for p in calc.get("paths") or []:
        paths[p.get("language")] = p.get("path")

    parts = []
    for p in text.get("tableOfContentsWithHtmlParts") or []:
        parts.append(
            {
                "type": p.get("type"),
                "title": p.get("title"),
                "html": unescape_html_field(p.get("html") or ""),
            }
        )

    data = {
        "id": calc.get("id"),
        "slug": calc.get("slug"),
        "path": paths.get("en") or "",
        "category": {"slug": cat.get("slug"), "name": cat.get("name")},
        "name": calc.get("name"),
        "seoTitle": text.get("seoTitle"),
        "title": text.get("title"),
        "description": text.get("description"),
        "createdAt": calc.get("createdAt"),
        "updatedAt": calc.get("lastUpdatedAt") or text.get("pageUpdatedAt"),
        "authors": [a for a in authors if a["name"]],
        "reviewers": [r for r in reviewers if r["name"]],
        "rating": calc.get("positiveRatingsCount") or 0,
        "faq": [
            {
                "q": strip_tags(html(f.get("question") if isinstance(f.get("question"), dict) else None) or f.get("question") or ""),
                "a": unescape_html_field(f.get("answerConverted") or f.get("answer") or ""),
            }
            for f in text.get("faq") or []
        ],
        "toc": [
            {"slug": t.get("slug"), "text": t.get("text")}
            for t in text.get("tableOfContents") or []
        ],
        "article": parts,
        "groups": convert_groups(defn, reg, datasets),
        "variables": convert_variables(defn, datasets),
        "datasets": datasets,
        "equations": convert_equations(defn),
    }
    return data


def main():
    os.makedirs(OUT, exist_ok=True)
    reg = UnitRegistry()
    index = []
    files = sorted(glob.glob(os.path.join(SRC, "*.json")))
    if not files:
        sys.exit(f"no source payloads found in {SRC}")
    skipped = []
    for f in files:
        raw = json.load(open(f, encoding="utf-8"))
        data = convert(raw, reg)
        if (data.get("path") or "").strip("/") in SKIP:
            skipped.append(data["path"])
            continue

        # stable local slug = last path segment
        path = data["path"] or "/"
        seg = path.rstrip("/").split("/")
        cat_slug = seg[-2] if len(seg) > 1 else ""
        slug = seg[-1] if seg else data["slug"]
        data["cat"] = cat_slug
        data["file"] = f"{cat_slug}--{slug}.json"

        with open(os.path.join(OUT, data["file"]), "w", encoding="utf-8") as fh:
            json.dump(data, fh, indent=1, ensure_ascii=False)

        index.append(
            {
                "slug": slug,
                "cat": cat_slug,
                "name": data["name"],
                "title": data["title"],
                "seoTitle": data["seoTitle"],
                "description": data["description"],
                "path": data["path"],
                "file": data["file"],
                "file": data["file"],
                "vars": len(data["variables"]),
                "groups": len(data["groups"]),
                "eq": len(data["equations"]),
            }
        )
        print(f"  {data['file']:44} vars={len(data['variables']):3} eq={len(data['equations']):2}")

    with open(os.path.join(OUT, "calculators.json"), "w", encoding="utf-8") as fh:
        json.dump({"count": len(index), "calculators": index}, fh, indent=1, ensure_ascii=False)

    with open(os.path.join(OUT, "units.json"), "w", encoding="utf-8") as fh:
        json.dump(reg.dump(), fh, indent=1, ensure_ascii=False)

    if skipped:
        print(f"\nskipped (custom-JS only): {', '.join(skipped)}")
    print(f"\n{len(index)} calculators -> {OUT}")
    print(f"{len(reg.dump())} unit switchers")


if __name__ == "__main__":
    main()
