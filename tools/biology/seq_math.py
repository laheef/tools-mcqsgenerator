#!/usr/bin/env python3
"""Numerical check for the sequence and protein calculators.

`seq_check.py` proves nothing throws. This proves the numbers are right: every
case sets an input, reads what the page published, and compares it with a value
worked out independently in Python. A wrong formula that renders beautifully
would pass the first test and fail this one.

    python3 tools/biology/seq_math.py [--only slug]
"""
from __future__ import annotations

import argparse
import math
import sys

BASE = "http://127.0.0.1:8080/biology/"

# Codon table (standard code), for the independent checks below.
_T = "FFLLSSSSYY**CC*WLLLLPPPPHHQQRRRRIIIMTTTTNNKKSSRRVVVVAAAADDEEGGGG"
_B = "TCAG"


def aa(codon: str) -> str:
    i1, i2, i3 = (_B.index(c) for c in codon)
    return _T[16 * i1 + 4 * i2 + i3]


def tm(n: int, gc: int, at: int, pct: float) -> float:
    if n <= 14:
        return 2 * at + 4 * gc
    if n <= 40:
        return 64.9 + 41 * (gc - 16.4) / n
    return 81.5 + 16.6 * math.log10(0.05) + 0.41 * pct - 675 / n


def gc_of(s: str) -> int:
    return sum(1 for c in s if c in "GC")


def num(got) -> float | None:
    """The page prints 3 644 with a narrow no-break space; read the digits."""
    if got is None:
        return None
    cleaned = str(got).replace("\u202f", "").replace("\u00a0", "").replace(" ", "").replace(",", "")
    try:
        return float(cleaned)
    except ValueError:
        return None


def close(got, want: float, tol: float = 0.05) -> bool:
    v = num(got)
    return v is not None and abs(v - want) <= tol



# --------------------------------------------------------------- batch O tables
# Independent copies of the reference data, written from the published values so
# the page has to agree with a second implementation rather than with itself.
_W_ECOLI = {
    "GCT": 0.53, "GCC": 0.58, "GCA": 0.45, "GCG": 1.00, "AAA": 1.00, "AAG": 0.25,
    "CTG": 1.00, "TTA": 0.13, "TTG": 0.13, "CTT": 0.10, "CTC": 0.10, "CTA": 0.04,
    "CGT": 1.00, "CGC": 0.55, "CGA": 0.06, "CGG": 0.03, "AGA": 0.03, "AGG": 0.02,
    "GAA": 0.68, "GAG": 1.00, "GAT": 0.63, "GAC": 1.00, "TTC": 1.00, "TTT": 0.57,
    "ATT": 0.51, "ATC": 1.00, "ATA": 0.08, "ATG": 1.00, "TGG": 1.00,
    "GGT": 1.00, "GGC": 0.74, "GGA": 0.19, "GGG": 0.15,
    "TCT": 0.60, "TCC": 0.60, "TCA": 0.14, "TCG": 0.14, "AGT": 0.31, "AGC": 1.00,
    "CCT": 0.35, "CCC": 0.22, "CCA": 0.35, "CCG": 1.00,
    "ACT": 0.49, "ACC": 1.00, "ACA": 0.13, "ACG": 0.27,
    "GTT": 0.60, "GTC": 0.42, "GTA": 0.27, "GTG": 1.00,
    "TAT": 0.57, "TAC": 1.00, "CAT": 0.57, "CAC": 1.00, "CAA": 0.34, "CAG": 1.00,
    "AAT": 0.49, "AAC": 1.00, "TGT": 0.46, "TGC": 1.00,
    "TAA": None, "TAG": None, "TGA": None,
}


def cai(seq: str, table: dict) -> float:
    """CAI = exp(mean(ln w)) over the codons that have a synonymous choice."""
    total, n = 0.0, 0
    for i in range(0, len(seq) - 2, 3):
        cod = seq[i:i + 3]
        if len(cod) < 3 or any(c not in "ACGT" for c in cod):
            continue
        if aa(cod) == "*" or cod in ("ATG", "TGG"):
            continue
        w = table.get(cod)
        if w is None:
            continue
        total += math.log(max(w, 0.005))
        n += 1
    return math.exp(total / n) if n else 0.0


# E. coli's most-used codon for each residue, for the reverse-translation check
_PREF_ECOLI = {"A": "GCG", "C": "TGC", "D": "GAC", "E": "GAG", "F": "TTC", "G": "GGT",
               "H": "CAC", "I": "ATC", "K": "AAA", "L": "CTG", "M": "ATG", "N": "AAC",
               "P": "CCG", "Q": "CAG", "R": "CGT", "S": "AGC", "T": "ACC", "V": "GTG",
               "W": "TGG", "Y": "TAC"}


def back_translate(pep: str) -> str:
    return "".join(_PREF_ECOLI[a] for a in pep if a in _PREF_ECOLI)

# The 26 enzymes the finder screens, with their published recognition sites.
_PANEL = {
    "EcoRI": "GAATTC", "BamHI": "GGATCC", "HindIII": "AAGCTT", "NotI": "GCGGCCGC",
    "XhoI": "CTCGAG", "SalI": "GTCGAC", "PstI": "CTGCAG", "XbaI": "TCTAGA",
    "KpnI": "GGTACC", "SmaI": "CCCGGG", "SacI": "GAGCTC", "NcoI": "CCATGG",
    "NdeI": "CATATG", "EcoRV": "GATATC", "ScaI": "AGTACT", "PvuII": "CAGCTG",
    "HpaI": "GTTAAC", "NruI": "TCGCGA", "ApaI": "GGGCCC", "BglII": "AGATCT",
    "SpeI": "ACTAGT", "NheI": "GCTAGC", "AgeI": "ACCGGT", "AscI": "GGCGCGCC",
    "MluI": "ACGCGT", "SphI": "GCATGC",
}
_COMP = str.maketrans("ACGT", "TGCA")


def revcomp(s: str) -> str:
    return s.translate(_COMP)[::-1]


def enzyme_counts(seq: str, circular: bool = False) -> tuple[int, int, int]:
    """(cutters, unique, non-cutters) — the same question the page answers."""
    hay = seq + seq[:10] if circular else seq
    unique = multi = none = 0
    for site in _PANEL.values():
        hits = set()
        for probe in {site, revcomp(site)}:
            start = hay.find(probe)
            while start >= 0:
                hits.add(start % len(seq) if circular else start)
                start = hay.find(probe, start + 1)
        if len(hits) == 1:
            unique += 1
        elif hits:
            multi += 1
        else:
            none += 1
    return unique + multi, unique, none

# Each case: slug, text inputs, radio picks (name -> value), and a list of
# (field, predicate-description, expected) where expected may be a callable.
CASES: list[dict] = [
    {
        "slug": "reverse-complement",
        "text": {"sequence": "ATGGCC"},
        "expect": {
            "length": ("6", lambda v: close(v, 6)),
            "gc": ("66.67", lambda v: close(v, 66.67)),
            "tm": ("20", lambda v: close(v, 20)),        # Wallace: 2(2) + 4(4)
        },
        "block_contains": ["GGCCAT"],
    },
    {
        "slug": "gc-content-sequence",
        "text": {"sequence": "ATGCATGCAT"},
        "expect": {
            "length": ("10", lambda v: close(v, 10)),
            "gc_count": ("4", lambda v: close(v, 4)),
            "gc_pct": ("40", lambda v: close(v, 40)),
            "at_pct": ("60", lambda v: close(v, 60)),
        },
    },
    {
        "slug": "dna-to-protein",
        "text": {"sequence": "ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAG"},
        "expect": {},
        "block_contains": ["MAIVMGR", "KGAR"],
    },
    {
        "slug": "codon-usage-calculator",
        "text": {"sequence": "ATGGCGGCGGCGTAA"},
        "expect": {
            "codons": ("4", lambda v: close(v, 4)),     # sense codons only
            "stops": ("1", lambda v: close(v, 1)),
            "distinct": ("2", lambda v: close(v, 2)),
        },
    },
    {
        # RSCU uses the degeneracy of the genetic code, not the number of codons
        # this sequence happens to use: TTT twice out of two phenylalanines is
        # an RSCU of 2.00, which a "distinct codons used" count would report as 1.
        "slug": "codon-usage-calculator",
        "text": {"sequence": "TTTTTTAAGAAATGG"},
        "expect": {
            "codons": ("5", lambda v: close(v, 5)),
            "distinct": ("4", lambda v: close(v, 4)),
        },
        "table_contains": ["2.00"],
    },
    {
        "slug": "dna-pattern-finder",
        "text": {"sequence": "TTTGAATTCTTGGATCCAAGCTTAAAGAATTCAAGCTTGATATCGAATTCCCC",
                 "pattern": "GAATTC"},
        "expect": {
            "matches_fwd": ("3", lambda v: close(v, 3)),
            "total": ("3", lambda v: close(v, 3)),      # palindromic: counted once
        },
    },
    {
        "slug": "dna-molecular-weight-calculator",
        "text": {"sequence": "AAATTTGGGCCC"},          # 12 nt: 3A, 3T, 3G, 3C
        "expect": {
            "length": ("12", lambda v: close(v, 12)),
            "gc_pct": ("50", lambda v: close(v, 50)),
            # ss = 3(313.21+304.20+289.18+329.21) - 61.96 = 3645.44
            "mw_ss": ("3645", lambda v: close(v, 3645.44, 1)),
            "mw": ("7291", lambda v: close(v, 7290.88, 1)),
        },
    },
    {
        "slug": "reverse-translate",
        "text": {"protein": "MA"},
        "expect": {
            "length_aa": ("2", lambda v: close(v, 2)),
            "length": ("9", lambda v: close(v, 9)),     # ATG GCG TAA
            "gc_pct": ("44.44", lambda v: close(v, 44.44)),
        },
        "block_contains": ["ATGGCGTAA"],
    },
    {
        "slug": "sequence-shuffler",
        "text": {"sequence": "ATGGCCATTGTAATGGGCCG"},
        "expect": {
            "length": ("20", lambda v: close(v, 20)),
            "gc_pct": ("55", lambda v: close(v, 55)),   # composition is preserved
                                                        # (11 of the 20 bases are G or C)
        },
    },
    {
        "slug": "pcr-primer-stats",
        "text": {"forward": "ATGGCCATTGTAATGGGCCG", "reverse": "CTATCGGGCACCCTTTCAG"},
        "expect": {
            "fwd_len": ("20", lambda v: close(v, 20)),
            "fwd_gc": ("55", lambda v: close(v, 55)),
            "fwd_tm": ("53.8", lambda v: close(v, tm(20, 11, 9, 55.0), 0.3)),
        },
    },
    {
        "slug": "amino-acid-composition",
        "text": {"protein": "ACDEFGHIKLMNPQRSTVWY"},
        "expect": {
            "length": ("20", lambda v: close(v, 20)),
            "cysteine": ("1", lambda v: close(v, 1)),
            "charge_balance": ("-1", lambda v: close(v, -1)),   # D+E = 2, K+R+H = 3
        },
    },
    {
        "slug": "protein-isoelectric-point",
        "text": {"protein": "KKKKKKKKKK"},
        "expect": {
            "length": ("10", lambda v: close(v, 10)),
            "acidic": ("0", lambda v: close(v, 0)),
            # poly-Lys: pI set by the lysine side chain (10.53) and the termini
            # every side chain is lysine (pKa 10.53), so the point of zero charge
            # sits above that pKa: 10/(1+10^(pH-10.53)) = 1 gives pH = 11.48
            "pi": ("11.48", lambda v: close(v, 11.48, 0.05)),
        },
    },
    {
        "slug": "cpg-island-finder",
        "text": {"sequence": "CG" * 120},               # 240 bp of pure CpG
        "expect": {
            "gc_pct": ("100", lambda v: close(v, 100)),
            "islands": ("1", lambda v: close(v, 1)),
            "longest": ("240", lambda v: close(v, 240)),
        },
    },
    {
        "slug": "dsdna-ug-to-pmol",
        "script": False,
        "expect": {
            "pmol": ("1.515", lambda v: close(v, 1.5151, 0.005)),
            "ng": ("1000", lambda v: close(v, 1000)),
        },
    },
    # ---------------------------------------------------------------- batch K
    {
        "slug": "restriction-digest",
        "script": True,
        "text": {"sequence": "AAAAGAATTCAAAGGGATCCAAAAGGGCCCTTTAAA"},
        "radios": {"enzyme2": "bamhi"},
        "expect": {
            "length": ("36", lambda v: close(v, 36)),
            "sites": ("2", lambda v: close(v, 2)),
            "fragments": ("3", lambda v: close(v, 3)),
        },
        "table_contains": ["bp"],
    },
    {
        "slug": "orf-finder",
        "script": True,
        "text": {"sequence": "CCCATGAAACCCGGGTTTAAACCCATGAAACCCTAG"},
        "inputs": {"min_aa": 2},
        "expect": {
            "orfs": ("2", lambda v: close(v, 2)),
            "longest": ("10", lambda v: close(v, 10)),
        },
    },
    {
        "slug": "primer-dimer-checker",
        "script": True,
        # the two 3' ends can pair for four bases (GGGG against CCCC)
        "text": {"forward": "ATGGCCATTGTAATGGGCGGGG", "reverse": "GCTAGCTAGCTAGCTAGCCCC"},
        "expect": {
            "tail_run": ("5", lambda v: close(v, 5)),   # GGGG/C pair for five bases
            "risk": ("8", lambda v: close(v, 8, 2)),
        },
    },
    {
        "slug": "dna-molarity-calculator",
        "script": False,
        "inputs": {"length": 1000, "conc_ng_ul": 100, "volume_ul": 50},
        "expect": {
            "mass_ng": ("5 000", lambda v: close(v, 5000)),
            "pmol": ("7.576", lambda v: close(v, 5000 * 1000 / (660 * 1000), 0.01)),
            "molarity": ("151.5", lambda v: close(v, 5000 * 1000 / (660 * 1000) / 50 * 1000, 0.2)),
            "a260": ("2", lambda v: close(v, 2)),
        },
    },
    {
        "slug": "henderson-hasselbalch-buffer",
        "script": False,
        "inputs": {"pka": 7.2, "ph": 7.4, "total_mm": 50},
        "expect": {
            "ratio": ("1.585", lambda v: close(v, 10 ** 0.2, 0.005)),
            "base_pct": ("61.3", lambda v: close(v, 100 * 10 ** 0.2 / (1 + 10 ** 0.2), 0.1)),
            "acid_mm": ("19.35", lambda v: close(v, 50 / (1 + 10 ** 0.2), 0.05)),
        },
    },
    {
        "slug": "mark-recapture",
        "script": False,
        "inputs": {"marked": 80, "second": 100, "recaptured": 20},
        "expect": {
            "estimate": ("400", lambda v: close(v, 400)),
            "chapman": ("388.6", lambda v: close(v, 81 * 101 / 21 - 1, 0.2)),
            "marked_share": ("20", lambda v: close(v, 20)),
        },
    },
    {
        "slug": "specific-growth-rate-od",
        "script": False,
        "inputs": {"od1": 0.15, "od2": 0.62, "t1": 0, "t2": 3},
        "expect": {
            "mu": ("0.474", lambda v: close(v, math.log(0.62 / 0.15) / 3, 0.005)),
            "doubling": ("87.8", lambda v: close(v, math.log(2) / (math.log(0.62 / 0.15) / 3) * 60, 0.3)),
            "generations": ("2.05", lambda v: close(v, math.log(0.62 / 0.15) / 3 * 3 / math.log(2), 0.02)),
        },
    },
    {
        "slug": "ligation-calculator",
        "script": False,
        "inputs": {"vector_ng": 50, "vector_bp": 3000, "insert_bp": 1000, "ratio": 3},
        "expect": {
            "insert_ng": ("50", lambda v: close(v, 3 * 50 * 1000 / 3000)),
            "vector_pmol": ("25.25", lambda v: close(v, 50e9 / (660 * 3000) / 1000, 0.1)),
        },
    },
    # ------------------------------------------------- choice fields really work
    {
        # the RNA radio must switch the alphabet: T becomes U in the output
        "slug": "reverse-complement",
        "radios": {"alphabet": "rna"},
        "text": {"sequence": "ATGGCC"},
        "expect": {"length": ("6", lambda v: close(v, 6))},
        "block_contains": ["GGCCAU"],
    },
    {
        # frame 2 of ATGGCGGCGGCGTAA skips the first base
        "slug": "codon-usage-calculator",
        "radios": {"frame": "frame-2"},
        "text": {"sequence": "GATGGCGGCGGCGTAA"},
        "expect": {"stops": ("1", lambda v: close(v, 1))},
    },
    {
        # a circular molecule cut twice gives two fragments; linear gives three
        "slug": "restriction-digest",
        "radios": {"enzyme2": "bamhi", "topology": "circular"},
        "text": {"sequence": "AAAAGAATTCAAAGGGATCCAAAAGGGCCCTTTAAA"},
        "expect": {
            "sites": ("2", lambda v: close(v, 2)),
            "fragments": ("2", lambda v: close(v, 2)),
        },
    },
    {
        # RNA is weighed with uracil: the molecule select must change the mass
        "slug": "dna-molecular-weight-calculator",
        "radios": {"strands": "single-stranded-rna"},
        "text": {"sequence": "AAATTTGGGCCC"},
        "expect": {"length": ("12", lambda v: close(v, 12))},
    },
    # ---------------------------------------------------------------- batch L
    {
        "slug": "linear-dna-ends-ug-pmol",
        "script": False,
        "inputs": {"length": 1000, "mass_ug": 1},
        "expect": {
            "pmol": ("1.515", lambda v: close(v, 1e6 / (660 * 1000), 0.005)),
            "pmol_ends": ("3.03", lambda v: close(v, 2e6 / (660 * 1000), 0.005)),
            "molecules": ("9.12e11", lambda v: close(v, 1e6 / (660 * 1000) * 6.02214076e11, 1e7)),
        },
    },
    {
        "slug": "mass-molarity-conversion",
        "script": False,
        "inputs": {"mw": 500, "mass_mg": 1, "volume_ml": 1},
        "expect": {
            "moles_umol": ("2", lambda v: close(v, 2)),
            "conc_mm": ("2", lambda v: close(v, 2)),
            "conc_mg_ml": ("1", lambda v: close(v, 1)),
        },
    },
    {
        "slug": "oligo-converter",
        "script": False,
        "inputs": {"length": 20, "pmol_ul": 100},
        "expect": {
            "um": ("100", lambda v: close(v, 100)),
            "ug_ml": ("660", lambda v: close(v, 100 * 330 * 20 / 1000)),
            "water_ul": ("250", lambda v: close(v, 25 * 10)),
        },
    },
    {
        "slug": "restriction-reaction-setup",
        "script": False,
        "inputs": {"dna_ug": 1, "dna_conc": 100, "volume_ul": 20, "units_per_ug": 10,
                   "enzyme_conc": 20000},
        "expect": {
            "dna_ul": ("10", lambda v: close(v, 10)),
            "units": ("10", lambda v: close(v, 10)),
            "enzyme_ul": ("0.5", lambda v: close(v, 0.5)),
            "buffer_ul": ("2", lambda v: close(v, 2)),
            "water_ul": ("7.5", lambda v: close(v, 7.5)),
            "glycerol_pct": ("2.5", lambda v: close(v, 2.5)),
        },
    },
    {
        "slug": "sds-page-gel",
        "script": False,
        "inputs": {"acrylamide_pct": 10, "bis_pct": 2.6, "total_ml": 10, "protein_kda": 50},
        "expect": {
            "acrylamide_ml": ("3.33", lambda v: close(v, 10 * 10 / 30, 0.01)),
            "bis_ml": ("13", lambda v: close(v, 2.6 * 10 / 2, 0.05)),
            "water_ml": ("4.67", lambda v: close(v, 10 - 10 * 10 / 30 - 2.6 * 10 / 2 - 1, 0.01)),
        },
    },
    {
        "slug": "western-blot-loading",
        "script": False,
        "inputs": {"conc_mg_ml": 2, "per_lane_ug": 20, "lanes": 10, "target_pct": 0.01},
        "expect": {
            "sample_ul": ("10", lambda v: close(v, 10)),
            "total_ug": ("200", lambda v: close(v, 200)),
            "total_ul": ("100", lambda v: close(v, 100)),
            "target_ng": ("200", lambda v: close(v, 20 * 0.01 * 1000)),
        },
    },
    {
        "slug": "microscope-field-of-view",
        "script": False,
        "inputs": {"field_number": 20, "magnification": 40, "cells_seen": 50},
        "expect": {
            "fov_mm": ("0.5", lambda v: close(v, 0.5)),
            "fov_um": ("500", lambda v: close(v, 500)),
            "area_mm2": ("0.196", lambda v: close(v, math.pi * 0.25 ** 2, 0.002)),
            "density": ("254.6", lambda v: close(v, 50 / (math.pi * 0.25 ** 2), 0.5)),
        },
    },
    {
        "slug": "genetic-odds-ratio",
        "script": False,
        "inputs": {"a": 60, "b": 40, "c": 30, "dd": 70},
        "expect": {
            "odds_ratio": ("3.5", lambda v: close(v, (60 / 30) / (40 / 70), 0.01)),
            "relative_risk": ("1.4", lambda v: close(v, (60 / 100) / (30 / 100), 0.01)),
            "case_pct": ("60", lambda v: close(v, 60)),
            "control_pct": ("30", lambda v: close(v, 30)),
        },
    },
    # ---------------------------------------------------------------- batch M
    {
        "slug": "plants-per-hectare",
        "script": False,
        "inputs": {"area": 1, "row_cm": 75, "plant_cm": 30, "loss_pct": 5},
        "expect": {
            "plants_per_ha": ("44444", lambda v: close(v, 10000 / (0.75 * 0.30), 1)),
            "area_per_plant": ("0.225", lambda v: close(v, 0.225, 0.001)),
            "plants": ("46667", lambda v: close(v, 10000 / 0.225 * 1.05, 2)),
        },
    },
    {
        "slug": "fruit-tree-spacing",
        "script": False,
        "inputs": {"area_ha": 1, "row_m": 4, "tree_m": 3, "pollinator_pct": 20},
        "expect": {
            "trees_per_ha": ("833", lambda v: close(v, 10000 / 12, 1)),
            "main_trees": ("667", lambda v: close(v, 10000 / 12 * 0.8, 1)),
            "hedge_ratio": ("1.33", lambda v: close(v, 4 / 3, 0.01)),
        },
    },
    {
        "slug": "lawn-fertilizer-rate",
        "script": False,
        "inputs": {"area": 5000, "n_rate": 1, "n_pct": 24, "bag_lb": 50},
        "expect": {
            "product_per_1000": ("4.17", lambda v: close(v, 1 / 0.24, 0.01)),
            "product_lb": ("20.8", lambda v: close(v, 5 * 1 / 0.24, 0.05)),
            "n_total": ("5", lambda v: close(v, 5)),
            "bags": ("0.42", lambda v: close(v, 5 / 0.24 / 50, 0.01)),
        },
    },
    {
        "slug": "compost-application-rate",
        "script": False,
        "inputs": {"area": 100, "depth_cm": 5, "density": 0.55},
        "expect": {
            "volume": ("5", lambda v: close(v, 5)),
            "cubic_yards": ("6.54", lambda v: close(v, 5 * 1.30795, 0.01)),
            "tonnes": ("2.75", lambda v: close(v, 5 * 0.55, 0.01)),
            "per_ha": ("275", lambda v: close(v, 275, 1)),
        },
    },
    {
        "slug": "gypsum-application-rate",
        "script": False,
        "inputs": {"area_ha": 2, "esp": 15, "esp_target": 5},
        "expect": {
            "rate_tha": ("3", lambda v: close(v, 3 * 10 / 10, 0.01)),
            "total_t": ("6", lambda v: close(v, 6, 0.01)),
            "bags_25kg": ("240", lambda v: close(v, 240, 1)),
        },
    },
    {
        "slug": "sulfur-soil-acidifier",
        "script": False,
        "inputs": {"area": 100, "ph_now": 7.5, "ph_target": 6.5},
        "expect": {
            "ph_drop": ("1", lambda v: close(v, 1, 0.001)),
            "sulfur_kg": ("20", lambda v: close(v, 100 * 1 * 1 * 0.2, 0.1)),
            "sulfur_kg_100": ("20", lambda v: close(v, 20, 0.1)),
        },
    },
    {
        "slug": "crop-coefficient",
        "script": False,
        "inputs": {"eto": 5, "kc": 1.05, "rain": 0},
        "expect": {
            "etc": ("5.25", lambda v: close(v, 5.25, 0.01)),
            "litres_m2": ("5.25", lambda v: close(v, 5.25, 0.01)),
            "litres_ha": ("52.5", lambda v: close(v, 52.5, 0.1)),
            "weekly": ("36.75", lambda v: close(v, 36.75, 0.1)),
        },
    },
    {
        "slug": "land-equivalent-ratio",
        "script": False,
        "inputs": {"y1i": 3200, "y1s": 5000, "y2i": 1800, "y2s": 2500},
        "expect": {
            "partial1": ("0.64", lambda v: close(v, 0.64, 0.001)),
            "partial2": ("0.72", lambda v: close(v, 0.72, 0.001)),
            "ler": ("1.36", lambda v: close(v, 1.36, 0.001)),
            "advantage": ("36", lambda v: close(v, 36, 0.1)),
        },
    },
    {
        "slug": "stems-per-hectare",
        "script": False,
        "inputs": {"area_ha": 1, "row_m": 1.5, "stool_m": 0.5, "stems_per_stool": 6, "survival": 85},
        "expect": {
            "stools": ("13333", lambda v: close(v, 10000 / 0.75, 1)),
            "stems": ("68000", lambda v: close(v, 10000 / 0.75 * 6 * 0.85, 1)),
            "stems_m2": ("6.8", lambda v: close(v, 6.8, 0.01)),
        },
    },
    {
        "slug": "cedar-tree-value",
        "script": False,
        "inputs": {"dbh": 40, "height": 12, "taper": 10, "price": 1.2, "trees": 10},
        "expect": {
            "cubic_m": ("0.633", lambda v: close(v, math.pi / 4 * (0.4 * 0.95) ** 2 * 12 * 0.42, 0.01)),
            "board_feet": ("268", lambda v: close(v, math.pi / 4 * (0.38) ** 2 * 12 * 0.42 / 0.002359737, 2)),
            "dbh_in": ("15.75", lambda v: close(v, 40 / 2.54, 0.01)),
        },
    },
    # ---------------------------------------------------------------- batch N
    {
        "slug": "mic-zone-of-inhibition",
        "script": False,
        "inputs": {"zone_mm": 22, "disc_ug": 30, "cal_zone_high": 25, "cal_mic_high": 1,
                   "cal_zone_low": 15, "cal_mic_low": 8, "breakpoint": 4, "well_ul": 200},
        "expect": {
            # slope = (25-15)/log2(8) = 3.32 mm per doubling; MIC = 1*2^((25-22)/3.32)
            "mic": ("1.87", lambda v: close(v, 2 ** (3 / (10 / 3)), 0.02)),
            "susceptibility": ("0.47", lambda v: close(v, 2 ** (3 / (10 / 3)) / 4, 0.01)),
            "plate_ug_ml": ("150", lambda v: close(v, 30 / 0.2, 0.5)),
        },
    },
    {
        "slug": "simpson-diversity-index",
        "script": False,
        "inputs": {"n1": 40, "n2": 25, "n3": 15, "n4": 12, "n5": 8},
        "expect": {
            # D = (40*39+25*24+15*14+12*11+8*7)/(100*99)
            "d": ("0.278", lambda v: close(v, (40*39+25*24+15*14+12*11+8*7)/(100*99), 0.002)),
            "diversity": ("0.722", lambda v: close(v, 1-(40*39+25*24+15*14+12*11+8*7)/(100*99), 0.002)),
            "richness": ("5", lambda v: close(v, 5)),
        },
    },
    {
        "slug": "linkage-disequilibrium",
        "script": False,
        "inputs": {"p_a": 0.4, "p_b": 0.3, "f_ab": 0.25},
        "expect": {
            # D = 0.25 - 0.4*0.3 = 0.13; r2 = D^2/(0.4*0.6*0.3*0.7) = 0.3353
            "d": ("0.13", lambda v: close(v, 0.13, 0.001)),
            "r2": ("0.335", lambda v: close(v, 0.13**2 / (0.4*0.6*0.3*0.7), 0.002)),
            "f_ab_expected": ("0.12", lambda v: close(v, 0.12, 0.001)),
        },
    },
    {
        "slug": "tajimas-d",
        "script": False,
        "inputs": {"sites": 20, "n": 20, "pi": 0.004, "length": 1000},
        "expect": {
            "a1": ("3.548", lambda v: close(v, 3.5477, 0.002)),
            "theta_pi": ("0.004", lambda v: close(v, 0.004, 0.0001)),
        },
    },
    {
        "slug": "genetic-linkage-distance",
        "script": False,
        "inputs": {"recombinants": 35, "total": 200},
        "expect": {
            "rf": ("0.175", lambda v: close(v, 0.175, 0.001)),
            # Haldane: -0.5 ln(1-2*0.175) * 100 = 21.03 cM
            "haldane": ("21.03", lambda v: close(v, -0.5 * math.log(1 - 2 * 0.175) * 100, 0.02)),
            # Kosambi: 0.25 ln((1+0.35)/(1-0.35)) * 100 = 18.34 cM
            "kosambi": ("18.34", lambda v: close(v, 0.25 * math.log(1.35 / 0.65) * 100, 0.02)),
        },
    },
    {
        "slug": "plasmid-molar-ratio",
        "script": False,
        "inputs": {"vector_ng": 50, "vector_bp": 5000, "insert1_bp": 800, "insert2_bp": 0,
                   "ratio": 3},
        "expect": {
            "insert1_ng": ("24", lambda v: close(v, 3 * 50 * 800 / 5000, 0.01)),
            "insert2_ng": ("0", lambda v: close(v, 0)),
            "total_ng": ("74", lambda v: close(v, 74, 0.01)),
            "vector_fmol": ("15.15", lambda v: close(v, 50 * 1000000 / (660 * 5000), 0.01)),
            "total_fmol": ("19.33", lambda v: close(v, (50 + 24) * 1000000 / (660 * 5800), 0.02)),
        },
    },
    {
        "slug": "specimen-size-from-image",
        "script": False,
        "inputs": {"measured_mm": 30, "scale_mm": 0, "magnification": 400},
        "expect": {
            "actual_um": ("75", lambda v: close(v, 30 * 1000 / 400, 0.01)),
            "actual_mm": ("0.075", lambda v: close(v, 0.075, 0.001)),
        },
    },
# ---------------------------------------------------------------- batch O
    {
        "slug": "codon-adaptation-index",
        "script": True,
        # GCG GCG GCG GCG AAA AAA CTG CTG CGT GAG GAC TTC — eleven scored codons
        "text": {"sequence": "ATG" + "GCG" * 4 + "AAA" * 2 + "CTG" * 2 + "CGT" + "GAG" + "GAC" + "TTC" + "TAA"},
        "expect": {
            "cai": ("0.72", lambda v: close(v, cai("GCG" * 4 + "AAA" * 2 + "CTG" * 2 + "CGT" + "GAG" + "GAC" + "TTC", _W_ECOLI), 0.002)),
            "codons": ("12", lambda v: close(v, 12)),
            "rare": ("0", lambda v: close(v, 0)),
        },
        "block_contains": ["CAI"],
    },
    {
        "slug": "codon-adaptation-index",
        "script": True,
        # the same gene with the rarest codons: every w is at or below 0.2
        "text": {"sequence": "ATG" + "CGA" * 3 + "AGG" * 3 + "CTA" * 3 + "ATA"},
        "inputs": {},
        "expect": {
            "cai": ("0.05", lambda v: close(v, cai("CGA" * 3 + "AGG" * 3 + "CTA" * 3 + "ATA", _W_ECOLI), 0.005)),
            "rare": ("10", lambda v: close(v, 10)),
        },
    },
    {
        "slug": "restriction-enzyme-finder",
        "script": True,
        "text": {"sequence": "AAAAGAATTCAAAGGGATCCAAAAGGGCCCTTTAAAAGATCTTTTGAATTC"},
        "expect": {
            # worked out by enzyme_counts() below, not by eye
            "cutters": ("4", lambda v: close(v, enzyme_counts("AAAAGAATTCAAAGGGATCCAAAAGGGCCCTTTAAAAGATCTTTTGAATTC")[0])),
            "unique": ("3", lambda v: close(v, enzyme_counts("AAAAGAATTCAAAGGGATCCAAAAGGGCCCTTTAAAAGATCTTTTGAATTC")[1])),
            "nocut": ("22", lambda v: close(v, enzyme_counts("AAAAGAATTCAAAGGGATCCAAAAGGGCCCTTTAAAAGATCTTTTGAATTC")[2])),
        },
        "table_contains": ["EcoRI", "BamHI"],
    },
    {
        "slug": "restriction-enzyme-finder",
        "script": True,
        # a site that only exists across the origin of a circular molecule
        # the page opens on a circular molecule, where this site also spans the
        # origin — so EcoRI cuts twice and nothing is unique
        "text": {"sequence": "AATTCGGGGGGAATTCGGGGGG"},
        "expect": {"unique": ("0", lambda v: close(v, enzyme_counts("AATTCGGGGGGAATTCGGGGGG", True)[1]))},
    },
    {
        "slug": "restriction-enzyme-finder",
        "script": True,
        # the same sequence read as a linear fragment: one site, one unique cutter
        "text": {"sequence": "AATTCGGGGGGAATTCGGGGGG"},
        "radios": {"circular": "no"},
        "expect": {"unique": ("1", lambda v: close(v, enzyme_counts("AATTCGGGGGGAATTCGGGGGG")[1]))},
    },
    {
        "slug": "restriction-buffer-compatibility",
        "script": True,
        # EcoRI (50 mM) with BamHI (100 mM): CutSmart is the only 100 % buffer for both
        "radios": {"enzyme2": "bamhi"},
        "expect": {
            "suitable": ("1", lambda v: close(v, 1)),
            "best": ("100", lambda v: close(v, 100)),
            "sequential": ("0", lambda v: close(v, 0)),
        },
        "table_contains": ["CutSmart"],
    },
    {
        "slug": "restriction-buffer-compatibility",
        "script": True,
        # EcoRI with SalI on the classic three buffers only: nothing reaches 75 %
        "radios": {"enzyme2": "sali", "classic_only": "yes"},
        "expect": {
            "suitable": ("0", lambda v: close(v, 0)),
            "best": ("60", lambda v: close(v, 60)),
            "sequential": ("1", lambda v: close(v, 1)),
        },
        "block_contains": ["Step 1 digest EcoRI"],
    },
    {
        "slug": "multi-reverse-translate",
        "script": True,
        "text": {"proteins": ">one\nMAKDF\n>two\nGWY"},
        "radios": {"stop": "yes"},
        "expect": {
            "sequences": ("2", lambda v: close(v, 2)),
            "residues": ("8", lambda v: close(v, 8)),
            "gc": ("50", lambda v: close(v, 50, 20)),
        },
        "block_contains": [back_translate("MAKDF")],
    },
    {
        "slug": "multi-reverse-translate",
        "script": True,
        # degenerate output must contain an ambiguity code for every residue
        "text": {"proteins": "LRIS"},
        "radios": {"host": "degenerate", "stop": "no"},
        "expect": {"residues": ("4", lambda v: close(v, 4))},
        "block_contains": ["YTNMGNATHWSN"],
    },
    {
        "slug": "fuzzy-protein-search",
        "script": True,
        "text": {"protein": "MKWVTFISLLFLFSSAYSR", "pattern": "LLFL"},
        "inputs": {"mismatch": 0},
        "expect": {
            "hits": ("1", lambda v: close(v, 1)),
            "best": ("0", lambda v: close(v, 0)),
            "total": ("19", lambda v: close(v, 19)),
        },
        "table_contains": ["LLFL"],
    },
    {
        "slug": "fuzzy-protein-search",
        "script": True,
        # W is the only residue that X can stand for here, so the hit survives
        "text": {"protein": "MKWVTFISLLFLFSSAYSR", "pattern": "LLXL"},
        "inputs": {"mismatch": 0},
        "expect": {"hits": ("1", lambda v: close(v, 1))},
    },
    {
        "slug": "fuzzy-protein-search",
        "script": True,
        # one mismatch allowed turns a near-miss into a match, and only one
        "text": {"protein": "MKWVTFISLLFAFSSAYSR", "pattern": "LLFL"},
        "inputs": {"mismatch": 1},
        "expect": {"hits": ("1", lambda v: close(v, 1)), "best": ("1", lambda v: close(v, 1))},
    },
    {
        "slug": "random-sequence-generator",
        "script": True,
        "inputs": {"length": 200, "gc": 40, "seed": 7},
        "expect": {"gc_actual": ("40", lambda v: close(v, 40, 12))},
        "block_contains": ["Seed 7"],
    },
# ---------------------------------------------------------------- batch P
    {
        "slug": "in-vivo-formulation",
        "script": False,
        # 10 mg/kg, 25 g mouse, 5 mg/mL stock → 0.25 mg ÷ 5 = 0.05 mL = 50 µL
        "inputs": {"dose": 10, "weight": 25, "animals": 10, "stock": 5, "max_vol": 10},
        "expect": {
            "volume": ("50", lambda v: close(v, 50, 0.01)),
            "volume_kg": ("2", lambda v: close(v, 2, 0.01)),
            "compound": ("2.5", lambda v: close(v, 2.5, 0.01)),
            "stock_needed": ("1", lambda v: close(v, 1, 0.001)),
            "dilution": ("5", lambda v: close(v, 5, 0.01)),
        },
    },
    {
        "slug": "in-vivo-formulation",
        "script": False,
        # a 200 g rat at 30 mg/kg from a 20 mg/mL stock: 6 mg ÷ 20 = 0.3 mL
        "inputs": {"dose": 30, "weight": 200, "animals": 6, "stock": 20, "max_vol": 5},
        "expect": {
            "volume": ("300", lambda v: close(v, 300, 0.01)),
            "volume_kg": ("1.5", lambda v: close(v, 1.5, 0.01)),
            "compound": ("36", lambda v: close(v, 36, 0.01)),
            "stock_needed": ("6", lambda v: close(v, 6, 0.001)),
        },
    },
    {
        "slug": "dna-percentage",
        "script": False,
        "inputs": {"genome": 3000, "coding": 90, "genes": 20000},
        "expect": {
            "coding_pct": ("3", lambda v: close(v, 3, 0.001)),
            "noncoding_pct": ("97", lambda v: close(v, 97, 0.001)),
            "gene_density": ("6.667", lambda v: close(v, 20000 / 3000, 0.001)),
            "bases_per_gene": ("150000", lambda v: close(v, 150000, 1)),
            "coding_per_gene": ("4500", lambda v: close(v, 4500, 1)),
        },
    },
    {
        "slug": "dna-percentage",
        "script": False,
        # E. coli: 4.6 Mb, 4.1 Mb coding, 4 400 genes
        "inputs": {"genome": 4.6, "coding": 4.1, "genes": 4400},
        "expect": {
            "coding_pct": ("89", lambda v: close(v, 4.1 / 4.6 * 100, 0.05)),
            "gene_density": ("957", lambda v: close(v, 4400 / 4.6, 0.5)),
        },
    },
    {
        "slug": "codon-plot",
        "script": True,
        # fourteen codons: GGA (0.19) x 4 in a row is a cluster, CGA x 4 is another
        "text": {"sequence": "ATG" + "GGA" * 4 + "CTG" * 4 + "CGA" * 4 + "TAA"},
        "inputs": {"window": 5},
        "expect": {
            "codons": ("14", lambda v: close(v, 14)),
            "rare": ("8", lambda v: close(v, 8)),
            "clusters": ("2", lambda v: close(v, 2)),
        },
        "block_contains": ["Runs of three or more rare codons"],
    },
    {
        "slug": "dog-coat-color",
        "script": True,
        # e/e cannot make black pigment, so chocolate B/b is invisible on a red dog
        "radios": {"e_locus": "e-e-no-black", "b_locus": "b-b-brown", "d_locus": "d-d-full-colour"},
        "expect": {"loci": ("4", lambda v: close(v, 4))},
        "block_contains": ["red / yellow"],
    },
    {
        "slug": "dog-coat-color",
        "script": True,
        # same B and D, one E allele present: now the brown shows
        "radios": {"e_locus": "e-e-black-allowed-carries", "b_locus": "b-b-brown",
                   "d_locus": "d-d-full-colour"},
        "block_contains": ["chocolate"],
    },
    {
        "slug": "dog-coat-color",
        "script": True,
        # chocolate diluted is lilac
        "radios": {"e_locus": "e-e-black-allowed", "b_locus": "b-b-brown", "d_locus": "d-d-diluted"},
        "block_contains": ["lilac"],
    },
]



def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--only", default="")
    args = ap.parse_args()

    from playwright.sync_api import sync_playwright

    problems = 0
    checks = 0
    with sync_playwright() as p:
        browser = p.chromium.launch()
        for case in CASES:
            slug = case["slug"]
            if args.only and args.only not in slug:
                continue
            page = browser.new_page(viewport={"width": 1280, "height": 1000})
            errors: list[str] = []
            page.on("pageerror", lambda e: errors.append(str(e)))
            page.goto(BASE + slug, wait_until="load")
            page.wait_for_timeout(700)

            for var, text in case.get("text", {}).items():
                page.fill(f"textarea[data-var='{var}']", text)
            for var, value in case.get("inputs", {}).items():
                page.fill(f"input[data-var='{var}']", str(value))
            # A choice field renders as radios when it has few options and as a
            # <select> when it has many; either way the value is the option's
            # uid, so pick by prefix and announce the change.
            for name, prefix in case.get("radios", {}).items():
                picked = page.evaluate(
                    """([name, prefix]) => {
                        const sel = document.querySelector(`select[data-var="${name}"]`);
                        if (sel) {
                            const opt = [...sel.options].find(o => o.value.startsWith(prefix));
                            if (!opt) return false;
                            sel.value = opt.value;
                            sel.dispatchEvent(new Event('change', {bubbles: true}));
                            return true;
                        }
                        const radio = document.querySelector(`input[name="${name}"][value^="${prefix}"]`);
                        if (!radio) return false;
                        radio.checked = true;
                        radio.dispatchEvent(new Event('change', {bubbles: true}));
                        return true;
                    }""", [name, prefix])
                if not picked:
                    raise RuntimeError(f"{slug}: no option starting with {prefix!r} for {name}")
            page.wait_for_timeout(350)
            # Press Calculate, the way a visitor does: results are gated behind
            # the button, and a hidden block also has an empty innerText, so any
            # check that reads rendered text has to open the gate first.
            page.evaluate("() => { const b = document.querySelector('[data-calc-go]');"
                          " if (b) b.click(); }")
            page.wait_for_timeout(250)

            values = page.eval_on_selector_all(
                "input[data-var].calc-input", "els => els.map(e => [e.dataset.var, e.value])"
            )
            got = {k: v for k, v in values}

            for var, (shown, ok) in case.get("expect", {}).items():
                checks += 1
                actual = got.get(var, "<missing>")
                if not ok(actual):
                    problems += 1
                    print(f"  ! {slug} / {var}: got {actual!r}, expected about {shown}")

            if case.get("table_contains"):
                table_text = " ".join(page.eval_on_selector_all(
                    ".calc-script-table tr", "els => els.map(e => e.textContent || '')"))
                for needle in case["table_contains"]:
                    checks += 1
                    if needle not in table_text:
                        problems += 1
                        print(f"  ! {slug}: table does not contain {needle!r}")

            if case.get("block_contains"):
                raw_text = " ".join(page.eval_on_selector_all(
                    ".calc-script-block", "els => els.map(e => e.textContent || '')"))
                text = " ".join(raw_text.split()).lower()
                for needle in case["block_contains"]:
                    checks += 1
                    if " ".join(str(needle).split()).lower() not in text:
                        problems += 1
                        print(f"  ! {slug}: output text does not contain {needle!r}")

            checks += 1
            if errors:
                problems += 1
                print(f"  ! {slug}: page error {errors[0]}")

            page.close()
        browser.close()

    print(f"checked {checks} values over {len(CASES)} cases, {problems} problems")
    return 1 if problems else 0


if __name__ == "__main__":
    raise SystemExit(main())
