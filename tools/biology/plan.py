#!/usr/bin/env python3
"""Work out which requested biology tools already exist and which are new.

    python3 tools/biology/plan.py            # summary + writes plan.json

The requested list is prose ("Hardy–Weinberg: Given Recessive Allele Frequency"),
the catalogue is slugs ("hardy-weinberg-equilibrium"). Matching therefore runs
three passes, strongest first:

  1. an alias table for names that mean the same thing in different words
     (HWE, COI, cM, RQ, GHK …);
  2. slug equality after normalisation (case, dashes, "calculator" suffix,
     parenthetical qualifiers);
  3. token containment — every significant token of the request appears in a
     catalogue slug — which catches "Base Pair to Dalton" vs "dna-base-pair-mass".

A pass only *proposes*; the file is written with the evidence so a wrong match
can be corrected by editing ALIASES or FORCE_NEW.
"""
from __future__ import annotations

import json
import os
import re
import unicodedata

HERE = os.path.dirname(os.path.abspath(__file__))
ROOT = os.path.normpath(os.path.join(HERE, "..", ".."))
SITE = os.path.join(ROOT, "php-clone")
REQ = os.path.join(ROOT, "uploads", "biology_tool_names.txt")

STOP = {"calculator", "calculators", "calc", "tool", "the", "of", "and", "to", "a", "an", "for", "in", "by", "from"}

# Names in the request that are the same thing as a catalogue slug.
ALIASES = {
    "alamarblue cell viability / percent reduction": "alamarblue-cell-viability",
    "cell culture dish / plate / flask reference (seeding density, volumes)": "cell-culture-vessel-reference",
    "protein isoelectric point (pi)": None,
    "pcr primer stats (tm, gc%)": None,
    "hwe calculator": "hardy-weinberg-equilibrium",
    "hardy-weinberg equilibrium": "hardy-weinberg-equilibrium",
    "base pair to dalton": None,
    "buffer preparation": "buffer-preparation",
    "dilution calculator (c1v1=c2v2)": "solution-dilution",
    "hwe: given recessive allele frequency": "hardy-weinberg-equilibrium",
    "mrna to protein": "rna-to-protein",
    "temperature conversions tool (°c/°f/k)": "temperature-converter",
    "maximum sustainable yield": "maximum-sustainable-yield",
    "net primary productivity": "net-primary-productivity",
    "ideal fish tank size": "aquarium-size",
    "fish tank stocking": "aquarium-stocking",
}

# Requested names that must be built even if a token match is proposed, because
# the existing page answers a different question.
FORCE_NEW = {
    "percent viability",
    "fold change",
    "specific growth rate",
    "solute potential",
    "respiratory quotient",
    "hardy-weinberg: given heterozygote frequency",
}


def norm(text: str) -> str:
    text = unicodedata.normalize("NFKD", text)
    text = text.replace("–", "-").replace("—", "-").replace("′", "'")
    text = re.sub(r"\(.*?\)", " ", text)
    text = text.lower()
    text = re.sub(r"[^a-z0-9]+", " ", text)
    return re.sub(r"\s+", " ", text).strip()


def slugify(text: str) -> str:
    return norm(text).replace(" ", "-")


def tokens(text: str) -> set[str]:
    return {t for t in norm(text).split() if t not in STOP and len(t) > 1}


def catalogue() -> dict[str, str]:
    """slug -> category, harvested catalogue plus anything the panel created."""
    out: dict[str, str] = {}
    for name in os.listdir(os.path.join(SITE, "data", "calc")):
        if not name.endswith(".ndjson"):
            continue
        with open(os.path.join(SITE, "data", "calc", name)) as fh:
            for line in fh:
                line = line.strip()
                if not line:
                    continue
                try:
                    row = json.loads(line)
                except json.JSONDecodeError:
                    continue
                out[row["slug"]] = row.get("cat", "")
    return out


def custom_slugs() -> dict[str, str]:
    """Slugs the panel has already created (from the last import pack)."""
    out: dict[str, str] = {}
    pack = os.path.join(SITE, "data", "samples", "biology-pack.json")
    if os.path.isfile(pack):
        for row in json.load(open(pack)):
            out[row["slug"]] = row.get("category_slug", "biology")
    return out


def main() -> int:
    wanted = [l.strip() for l in open(REQ, encoding="utf-8") if l.strip()]
    cat = catalogue()
    custom = custom_slugs()
    known = {**cat, **custom}
    known_tokens = {slug: tokens(slug.replace("-", " ")) for slug in known}
    aliases = {norm(k): v for k, v in ALIASES.items()}

    rows = []
    for name in wanted:
        key = norm(name)
        match, how = None, ""
        alias = aliases.get(key, "unset")
        if alias not in (None, "unset"):
            match, how = (alias, "alias") if alias in known else (None, "alias-new")
        elif key in known:
            match, how = key, "slug"
        else:
            slug = slugify(name)
            if slug in known:
                match, how = slug, "slug"
            else:
                want = tokens(name)
                best, score = None, 0.0
                for cand, have in known_tokens.items():
                    if not want or not have:
                        continue
                    overlap = len(want & have) / len(want | have)
                    if overlap > score:
                        best, score = cand, overlap
                if best and score >= 0.85:
                    match, how = best, f"tokens:{score:.2f}"
        if name in FORCE_NEW:
            match, how = None, "forced-new"
        rows.append({
            "requested": name,
            "slug": slugify(name),
            "status": "exists" if match else "new",
            "match": match,
            "how": how,
            "cat": known.get(match, "") if match else "biology",
            "built": (slugify(name) in custom) or (match in custom if match else False),
        })

    new = [r for r in rows if r["status"] == "new"]
    print(f"requested {len(rows)}  exists {len(rows) - len(new)}  new {len(new)}")
    for r in rows:
        if r["status"] == "exists" and r["how"].startswith("tokens"):
            print(f"  ? {r['requested'][:52]:54} -> {r['match']}  ({r['how']})")
    out = os.path.join(HERE, "plan2.json")
    json.dump(rows, open(out, "w"), indent=1, ensure_ascii=False)
    print("wrote", out)
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
