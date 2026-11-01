#!/usr/bin/env python3
"""Runtime abuse test for the sequence calculators.

A numeric box can only produce a number, so the worst a visitor can do to a
formula is divide by zero — and the engine catches that. A text box can hold
*anything*: an empty string, a FASTA header with no sequence, pasted line
numbers, alignment gaps, emoji, a protein sequence, or twenty kilobases. Every
one of those has to produce an answer or a polite message, never a stack trace,
an empty panel, `NaN` or `undefined`.

This drives each text-box calculator with the same battery and checks that:

  * the page script never throws (no `pageerror`),
  * every input produces at least one output block,
  * no numeric field ends up showing NaN / Infinity / undefined,
  * pasted junk is not echoed into the page as markup.

    python3 tools/biology/seq_check.py [--slugs a,b] [--limit N]
"""
from __future__ import annotations

import argparse
import sys

BASE = "http://127.0.0.1:8080/biology/"

# (name, the text that goes in the box)
CASES = [
    ("empty", ""),
    ("whitespace", "   \n\t  "),
    ("fasta with header", ">seq1 test\nATGGC CATTG\nTAATGG"),
    ("pasted line numbers", "1 atggccattg\n2 taatgggcc"),
    ("alignment gaps", "ATGGC--CATTG.TAAT"),
    ("protein letters", "MKVLAAGGXX**"),
    ("lowercase", "atggccattgtaatgggcc"),
    ("rna", "AUGGCCAUUGUAAUGGGCC"),
    ("long sequence", "ATGGCC" * 2000),
    ("unicode and emoji", "ATG\U0001F600GCC\u2014ATTG"),
    ("single base", "A"),
    ("two bases", "AT"),
    ("html injection", "<script>alert(1)</script>ATG"),
    ("sqli attempt", "ATG' OR 1=1; DROP TABLE x;--"),
    ("nul-ish text", "ATG\x00GCCATTG"),
]

DEFAULT_SLUGS = ["reverse-complement", "gc-content-sequence", "dna-to-protein",
                 "codon-usage-calculator", "cpg-island-finder", "dna-pattern-finder",
                 "dna-molecular-weight-calculator", "reverse-translate", "sequence-shuffler",
                 "pcr-primer-stats", "protein-isoelectric-point", "amino-acid-composition",
                 "restriction-digest", "orf-finder", "primer-dimer-checker",
                 # batch O: the table-driven tools take text too
                 "codon-adaptation-index", "restriction-enzyme-finder",
                 "multi-reverse-translate", "fuzzy-protein-search"]


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--slugs", default=",".join(DEFAULT_SLUGS))
    ap.add_argument("--limit", type=int, default=0)
    ap.add_argument("--headful", action="store_true")
    args = ap.parse_args()

    slugs = [s.strip() for s in args.slugs.split(",") if s.strip()]
    if args.limit:
        slugs = slugs[: args.limit]

    from playwright.sync_api import sync_playwright

    problems = 0
    checked = 0
    with sync_playwright() as p:
        browser = p.chromium.launch(headless=not args.headful)
        for slug in slugs:
            page = browser.new_page(viewport={"width": 1280, "height": 1000})
            errors: list[str] = []
            page.on("pageerror", lambda e: errors.append(str(e)))
            resp = page.goto(BASE + slug, wait_until="load")
            if resp is None or resp.status != 200:
                print(f"  ! {slug}: page did not load ({resp.status if resp else 'no response'})")
                problems += 1
                page.close()
                continue
            page.wait_for_timeout(700)
            boxes = page.eval_on_selector_all(
                "textarea[data-var]", "els => els.map(e => e.getAttribute('data-var'))"
            )
            if not boxes:
                print(f"  ! {slug}: no text box on the page")
                problems += 1
                page.close()
                continue

            for name, text in CASES:
                checked += 1
                for var in boxes:
                    page.fill(f"textarea[data-var='{var}']", text)
                page.wait_for_timeout(120)
                blocks = page.eval_on_selector_all(
                    ".calc-script-block pre", "els => els.map(e => e.textContent || '')"
                )
                bad_values = page.eval_on_selector_all(
                    "input[data-var].calc-input",
                    "els => els.map(e => e.value).filter(v => v === 'NaN' || v === 'Infinity'"
                    " || v === '-Infinity' || v === 'undefined')",
                )
                injected = any("<script>" in (b or "") or "alert(1)" in (b or "") for b in blocks)
                if errors:
                    print(f"  ! {slug} / {name}: script threw {errors[0]}")
                    problems += 1
                elif not blocks:
                    print(f"  ! {slug} / {name}: nothing was rendered")
                    problems += 1
                elif bad_values:
                    print(f"  ! {slug} / {name}: numeric output {bad_values[0]}")
                    problems += 1
                elif "DROP TABLE" in (blocks[0] or ""):
                    print(f"  ! {slug} / {name}: input echoed back unfiltered")
                    problems += 1
                elif injected:
                    print(f"  ! {slug} / {name}: markup from the input reached the page")
                    problems += 1
            page.close()
        browser.close()

    print(f"checked {checked} input cases over {len(slugs)} calculators, {problems} problems")
    return 1 if problems else 0


if __name__ == "__main__":
    sys.exit(main())
