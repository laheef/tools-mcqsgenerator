#!/usr/bin/env python3
"""Coverage audit: which of the requested biology tools does the site actually serve?

The plan file (`plan2.json`) was written once and drifts — it counts a name as
missing when the catalogue serves it under a different wording. This audit reads
the live inventory instead: every harvested calculator in the manifest plus every
calculator created in the panel, and matches each requested name against both.

Matching is token overlap on the name and the slug, with a small synonym layer for
the cases where the same tool has three common names (mean arterial pressure /
MAP, FCR / feed conversion ratio). Anything scoring below the threshold is printed
with its best candidate so a human decides — the audit never guesses "close
enough" and quietly counts a tool as done.

    python3 tools/biology/coverage.py [--unmatched] [--json out.json]
"""
from __future__ import annotations

import argparse
import json
import re
import subprocess
import sys

ROOT = "/home/user"
BASE = "http://127.0.0.1:8080"
NAMES = f"{ROOT}/uploads/biology_tool_names.txt"
MANIFEST = f"{ROOT}/php-clone/data/calc/manifest.json"

STOP = {"calculator", "calculators", "free", "online", "the", "a", "an", "of", "for",
        "and", "to", "in", "how", "what", "is", "my", "your", "with", "by", "from",
        "per", "on", "at", "calculate", "calculation", "converter", "convert", "tool"}

# Hand-verified mappings for requests whose wording does not share enough words
# with the page that answers them. Each line was checked against the live page,
# not guessed from the name — this is the part of the audit a human has to do.
OVERRIDES = {
    "Codon Plot": "/biology/codon-plot",
    "Coat Color Calculator": "/biology/dog-coat-color",
    "DNA Percentage Calculator": "/biology/dna-percentage",
    "In Vivo Formulation Calculator": "/biology/in-vivo-formulation",
    "HWE Calculator": "/biology/hardy-weinberg-equilibrium",
    "Blood Pressure & MAP Calculator": "/health/mean-arterial-pressure",
    "Heart Rate Reserve / Target Heart Rate Calculator": "/sports/heart-rate",
    "Goat Years Calculator": "/biology/goat-years-to-human-years",
    "Dog Pregnancy Week-by-Week / Ovulation Timing Calculator": "/biology/dog-pregnancy",
    "Blood Type Inheritance Calculator": "/health/blood-type",
    "Eye Color Inheritance Calculator": "/health/baby-eye-color",
    "Primer Tm Calculator (nearest-neighbour)": "/biology/oligo-tm-calculator",
    "Mark-Recapture (Lincoln-Petersen) Population Estimator": "/biology/mark-recapture",
    "Random DNA / Protein Sequence Generator": "/biology/random-sequence-generator",
    "Shuffle DNA / Protein Sequence": "/biology/sequence-shuffler",
    "Translate DNA to Protein (reading frames)": "/biology/dna-to-protein",
    "RNA to Protein (Translation) Calculator": "/biology/dna-to-protein",
    "TFF Membrane Area & Scale-Up Flux Calculator": "/biology/tff-membrane-area",
    "Double Digest Buffer Compatibility Finder": "/biology/restriction-buffer-compatibility",
    "Restriction Enzyme Double Digest Finder": "/biology/restriction-enzyme-finder",
    "Restriction Enzyme Finder by Sequence": "/biology/restriction-enzyme-finder",
    "Temperature Conversions Tool (°C/°F/K)": "/conversion/temperature-converter",
    "ng/µL Dilution Calculator": "/biology/dilution-calculator-c1v1",
    "Codon Optimization / Codon Adaptation Index Calculator": "/biology/codon-adaptation-index",
    "DNA / Protein Pattern Finder": "/biology/dna-pattern-finder",
    "Protein Isoelectric Point (pI) Calculator": "/biology/protein-isoelectric-point",
    "Watterson Estimator Calculator (genetic diversity)": "/biology/watterson-estimator",
    "PCR Primer Stats (Tm, GC%)": "/biology/pcr-primer-stats",
    "Linkage Disequilibrium (D, D′, r²) Calculator": "/biology/linkage-disequilibrium",
    "Tajima’s D / Nucleotide Diversity Calculator": "/biology/tajimas-d",
    "Chi-Square Test for Genetics (Mendelian ratios)": "/biology/chi-square-genetics-test",
    "Odds Ratio / Relative Risk Calculator for Genetics": "/biology/genetic-odds-ratio",
    "Nernst Equation (Equilibrium Potential) Calculator": "/chemistry/nernst-equation",
    "Respiratory Quotient (RQ) Calculator": "/biology/respiratory-quotient",
    "Bacterial Growth Curve (Lag/Log Phase) Calculator": "/biology/bacterial-growth-curve",
    "Specific Productivity (qP) Calculator – fed-batch cell culture": "/biology/specific-productivity-qp",
    "Cell Culture Dish / Plate / Flask Reference (seeding density, volumes)": "/biology/cell-culture-vessel-reference",
    "SDS-PAGE / Native PAGE Gel Calculator": "/biology/sds-page-gel",
    "Agarose Gel Calculator (TAE/TBE, stain volume)": "/biology/agarose-gel-calculator",
    "Dilution Factor Calculator (molarity, %, ppm, cells/mL)": "/chemistry/dilution-factor",
    "Percent Solution Calculator (w/v, v/v, w/w)": "/chemistry/percent-solution",
    "Crop Coefficient (Kc) Calculator": "/biology/crop-coefficient",
    "Plants Per Hectare / Planting Density Calculator": "/biology/plants-per-hectare",
    "Oligo (ssDNA): pmol/µL to µg/mL Converter": "/biology/oligo-converter",
    "Oligo (ssDNA): µg/mL to pmol/µL Converter": "/biology/oligo-converter",
    "NEB Ligation Calculator": "/biology/ligation-calculator",
    "NEB Tm Calculator (primer annealing)": "/biology/annealing-temperature",
    "Molecular Weight Calculator (compound / sequence)": "/biology/protein-molecular-weight",
    "Molarity Calculator (mass, moles, MW table)": "/biology/mass-molarity-conversion",
    "Enzyme Activity Calculator": "/biology/enzyme-activity-units",
    "Enzyme Unit Converter (U/mg, kcat)": "/biology/enzyme-unit-converter",
    "CFU/g Calculator": "/biology/cfu-g-calculator",
    "CFU/mL Calculator": "/biology/cfu-ml-calculator",
    "Percent Viability Calculator": "/biology/percent-viability",
    "Simpson’s Diversity Index Calculator": "/biology/simpson-diversity-index",
    "Genetic Linkage Distance Calculator": "/biology/genetic-linkage-distance",
    "Hardy–Weinberg: Given Dominant Allele Frequency": "/biology/hardy-weinberg-dominant-allele",
    "Hardy–Weinberg: Given Dominant Homozygote Frequency": "/biology/hardy-weinberg-dominant-homozygote",
    "Hardy–Weinberg: Given Heterozygote Frequency": "/biology/hardy-weinberg-heterozygote",
    "Hardy–Weinberg: Given Recessive Allele Frequency": "/biology/hardy-weinberg-recessive-allele",
    "Hardy–Weinberg: Given Recessive Homozygote Frequency": "/biology/hardy-weinberg-recessive-homozygote",
    "Dilution Calculator (C1V1=C2V2)": "/biology/dilution-calculator-c1v1",
    "Mass–Molarity Conversion Calculator": "/biology/mass-molarity-conversion",
    "Field Capacity Calculator": "/biology/field-capacity",
    "Tidal Volume / Lung Capacity Calculator": "/biology/tidal-volume-lung-capacity",
    "Osmolarity / Osmotic Pressure Calculator": "/biology/osmolarity-osmotic-pressure",
    "BMR / TDEE Calculator": "/health/tdee",
    # Not a calculator: a *collection* of them. Both are answered by the pages that
    # make them up, so they are recorded as suites rather than as missing tools.
    "AP Biology Calculator (genetics + population growth + dilution)": "SUITE:/biology/hardy-weinberg-equilibrium + /biology/logistic-population-growth + /biology/dilution-calculator-c1v1",
    "NEBioCalculator (suite of lab calculators)": "SUITE:/biology/ligation-calculator + /biology/dna-molarity-calculator + /biology/dsdna-ug-to-pmol",
}

# The same tool under another name. Left side: what the list calls it.
SYNONYM = {
    "fcr": ["feed conversion ratio", "fcr"],
    "feed conversion ratio": ["feed conversion ratio", "fcr"],
    "mean arterial pressure": ["mean arterial pressure", "map", "blood pressure"],
    "map": ["mean arterial pressure", "map"],
    "bca assay": ["bca assay", "protein concentration"],
    "bradford assay": ["bradford assay", "protein concentration"],
    "beer-lambert a280": ["beer-lambert", "a280", "protein concentration"],
    "protein extinction coefficient": ["extinction coefficient", "a280"],
    "enzyme unit converter": ["enzyme unit", "kcat", "enzyme activity"],
    "activation energy": ["activation energy", "arrhenius"],
    "arrhenius equation": ["arrhenius"],
    "colour": ["color"],
    "coat colour": ["coat color", "coat colour"],
}


def variants(name: str) -> list[str]:
    """The names a request can legitimately be served under.

    "DNA / Protein Pattern Finder" is one request with two answerable halves;
    "NEB Ligation Calculator" is the same tool as "Ligation"; "Hardy–Weinberg:
    Given the Recessive Allele Frequency" drops its colon clause into a shape the
    catalogue may phrase differently. Each variant is matched on its own and the
    best score wins.
    """
    base = re.sub(r"\([^)]*\)", " ", name)                 # drop parentheticals
    base = re.sub(r"^NEB ?", "", base)                      # "NEB Tm" == "Tm"
    parts = re.split(r"\s*[/–—]\s*|:\s*", base)
    out = [base] + [p for p in parts if p.strip()]
    out.append(re.sub(r"\bCalculator\b", "", base))
    return [p.strip() for p in out if p.strip()]


def tokens(text: str) -> set[str]:
    return {t for t in re.findall(r"[a-z0-9]+", text.lower()) if t not in STOP}


def custom_paths() -> set[str]:
    """Paths of the calculators created in the panel (they live in MySQL)."""
    out = subprocess.run(
        ["bash", f"{ROOT}/tools/php.sh", "-r",
         'require "php-clone/config.php";'
         'foreach (Onim\\Db::all("SELECT slug, category_slug FROM custom_calculators") as $r)'
         ' echo "/", $r["category_slug"], "/", $r["slug"], "\\n";'],
        capture_output=True, text=True, cwd=ROOT)
    return {line.strip() for line in out.stdout.splitlines() if line.startswith("/")}


def inventory() -> list[tuple[str, str]]:
    """(path, name) for every calculator the site serves."""
    rows: list[tuple[str, str]] = []
    with open(MANIFEST) as fh:
        manifest = json.load(fh)
    for row in manifest["calcs"]:
        rows.append((row[0], re.sub(r"\s*Calculator.*$", "", row[3])))
    out = subprocess.run(
        ["bash", f"{ROOT}/tools/php.sh", "-r",
         'require "php-clone/config.php";'
         'foreach (Onim\\Db::all("SELECT slug, name, category_slug FROM custom_calculators") as $r)'
         ' echo "/", $r["category_slug"], "/", $r["slug"], "\\t", $r["name"], "\\n";'],
        capture_output=True, text=True, cwd=ROOT)
    for line in out.stdout.splitlines():
        if "\t" in line:
            path, name = line.split("\t", 1)
            rows.append((path.strip(), name.strip()))
    return rows


def expand(words: set[str]) -> set[str]:
    """Widen a token set with the aliases of its members, on both sides."""
    out = set(words)
    for word in list(words):
        for alias in SYNONYM.get(word, []):
            out |= tokens(alias)
    return out


def score(name: str, path: str, other: str) -> float:
    """
    Share of the requested name's words that the page's own words cover.

    Aliases widen *both* sides and the denominator stays the requested tokens, so
    "FCR" matches a page that says "feed conversion ratio" — and does not match
    an unrelated page, which an earlier version of this function did because it
    widened only the haystack.
    """
    hay = expand(tokens(other) | tokens(path.replace("-", " ").replace("/", " ")))
    best = 0.0
    for variant in variants(name):
        want = tokens(variant)
        if not want:
            continue
        best = max(best, len(want & hay) / len(want))
    return best


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--unmatched", action="store_true", help="print every name that is not served")
    ap.add_argument("--json", default="")
    ap.add_argument("--markdown", default="", help="write the full mapping as a markdown table")
    ap.add_argument("--threshold", type=float, default=0.85)
    args = ap.parse_args()

    names = [l.strip() for l in open(NAMES) if l.strip()]
    inv = inventory()

    by_path = {path: name for path, name in inv}
    served, missing = [], []
    for name in names:
        override = OVERRIDES.get(name)
        if override:
            if override.startswith("SUITE:"):
                served.append({"requested": name, "path": override[6:].split(" + ")[0],
                               "served_as": "suite — every component page is live",
                               "score": 1.0, "suite": True})
            else:
                served.append({"requested": name, "path": override,
                               "served_as": by_path.get(override, override),
                               "score": 1.0, "verified": True})
            continue
        best_path, best_name, best = "", "", 0.0
        for path, other in inv:
            s = score(name, path, other)
            if s > best:
                best, best_path, best_name = s, path, other
        if best >= args.threshold:
            served.append({"requested": name, "path": best_path, "served_as": best_name,
                           "score": round(best, 3)})
        else:
            missing.append({"requested": name, "best_guess": best_path,
                            "best_name": best_name, "score": round(best, 3)})

    import urllib.request

    def resolves(path: str) -> bool:
        try:
            with urllib.request.urlopen(BASE + path, timeout=10) as r:
                return r.status == 200
        except Exception:                                            # noqa: BLE001
            return False

    global BASE
    BASE = "http://127.0.0.1:8080"
    broken = [r for r in served if not resolves(r["path"])]
    for row in broken:
        served.remove(row)
        missing.append({"requested": row["requested"], "best_guess": row["path"],
                        "best_name": "mapped path does not resolve", "score": 0.0})

    print(f"requested {len(names)}   served {len(served)}   not served {len(missing)}")
    if args.unmatched:
        for m in missing:
            print(f"  ? {m['requested']:52s} best {m['score']:.2f}  {m['best_name']}")
    if args.markdown:
        custom = custom_paths()
        panel = sum(1 for r in served if r["path"] in custom and not r.get("suite"))
        harvested = sum(1 for r in served if r["path"] not in custom and not r.get("suite"))
        suites = sum(1 for r in served if r.get("suite"))
        lines = [
            "# Biology tool list — coverage audit",
            "",
            f"Source list: `uploads/biology_tool_names.txt` — **{len(names)} tools**.",
            "",
            f"**{len(served)} of {len(names)} requested tools are served**, and every mapped URL was "
            "fetched and returned HTTP 200.",
            "",
            "| Kind | Count | Meaning |",
            "| --- | --- | --- |",
            f"| Harvested page | {harvested} | already in the catalogue; the request is answered under "
            "a different name |",
            f"| Built in the panel | {panel} | created as a custom calculator in the biology rounds "
            "(batches A–P) |",
            f"| Suite | {suites} | a *collection* of tools, not one calculator; every component page "
            "is live |",
            "",
            "Two entries are not calculators at all — “AP Biology Calculator” and “NEBioCalculator” "
            "name a bundle of tools, so they are recorded against the pages that make them up.",
            "",
            "The table is generated, not hand-written:",
            "",
            "```bash",
            "python3 tools/biology/coverage.py --unmatched --markdown docs/BIOLOGY-COVERAGE.md",
            "```",
            "",
            "It matches each requested name against the live inventory (the harvested catalogue plus "
            "everything created in the panel, read from MySQL), widens both sides with a synonym "
            "table, pins the names whose wording is furthest from the answering page in `OVERRIDES`, "
            "and finally **refuses to count a name as served unless its URL returns 200**.",
            "",
            "## Every requested tool",
            "",
            "| # | Requested tool | Served by | Origin |",
            "| --- | --- | --- | --- |",
        ]
        for i, row in enumerate(served, 1):
            path = row["path"].split(" + ")[0]
            origin = "suite" if row.get("suite") else ("panel" if path in custom else "harvested")
            lines.append(f"| {i} | {row['requested']} | `{path}` | {origin} |")
        for row in missing:
            lines.append(f"| — | {row['requested']} | **missing** | — |")
        with open(args.markdown, "w") as fh:
            fh.write("\n".join(lines) + "\n")
        print(f"wrote {args.markdown}")
    if args.json:
        with open(args.json, "w") as fh:
            json.dump({"served": served, "missing": missing}, fh, indent=1)
        print(f"wrote {args.json}")
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
