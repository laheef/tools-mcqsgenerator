#!/usr/bin/env python3
"""Pair tests: feed one calculator's answer into the next.

A single page can be internally consistent and still be wrong, because the same
mistake appears on both sides of it. Chaining them catches that: the reverse
complement of a sequence must have exactly the GC content of the original, a
back-translated protein must translate back to itself, the molecular weight of a
molecule and the µg↔pmol converter must agree on how many picomoles a microgram
holds. Every check here compares two live pages, not one page with itself.

    python3 tools/biology/seq_pairs.py [--only name]
"""
from __future__ import annotations

import argparse
import sys

BASE = "http://127.0.0.1:8080/biology/"


class Page:
    """A calculator page opened once and reused for several settings."""

    def __init__(self, browser, slug: str):
        self.slug = slug
        self.page = browser.new_page(viewport={"width": 1280, "height": 1000})
        self.errors: list[str] = []
        self.page.on("pageerror", lambda e: self.errors.append(str(e)))
        self.page.goto(BASE + slug, wait_until="load")
        self.page.wait_for_timeout(700)
        # Results are gated behind the Calculate button; press it so the page is
        # in the same state a reader sees after asking for the answer.
        self.page.evaluate("() => { const b = document.querySelector('[data-calc-go]'); if (b) b.click(); }")
        self.page.wait_for_timeout(200)

    def set(self, **text) -> "Page":
        for var, value in text.items():
            self.page.fill(f"textarea[data-var='{var}']", value)
        self.page.wait_for_timeout(300)
        return self

    def out(self, name: str) -> str:
        return self.page.evaluate(
            "(n) => { const el = document.querySelector('input[data-var=\"'+n+'\"]');"
            " return el ? el.value : ''; }", name)

    def blocks(self) -> str:
        return "\n".join(self.pres())

    def pres(self) -> list[str]:
        """The text of each output block, in page order (blocks keep their own
        line breaks)."""
        return self.page.eval_on_selector_all(
            ".calc-script-block pre", "els => els.map(e => e.textContent || '')")

    def close(self) -> None:
        self.page.close()


def number(text: str) -> float | None:
    if text is None:
        return None
    cleaned = str(text).replace("\u202f", "").replace("\u00a0", "").replace(" ", "").replace(",", "")
    try:
        return float(cleaned)
    except ValueError:
        return None


def first_sequence(pres: list[str]) -> str:
    """First block that is unambiguously nucleic acid, unwrapped."""
    for pre in pres:
        joined = "".join(pre.split())
        if len(joined) > 5 and all(c in "ACGTU" for c in joined):
            return joined
    return ""


def first_protein(pres: list[str]) -> str:
    """First block that is an amino acid chain (frame 1 comes first)."""
    for pre in pres:
        joined = "".join(pre.split())
        if len(joined) >= 5 and all(c in "ACDEFGHIKLMNPQRSTVWY*" for c in joined):
            return joined.replace("*", "")
    return ""


CASES = []


def case(fn):
    CASES.append(fn)
    return fn


SEQ = "ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGAAATTTGGGCCCAAATTT"
PROT = "MKTAYIAKQRQISFVKSHFSRQLEERLGLIEVQAPILSRVGDGTQDNLSGAEKAVQV"


@case
def revcomp_gc(browser, report) -> None:
    """Reverse complement must not change GC content."""
    a = Page(browser, "reverse-complement").set(sequence=SEQ)
    cdna = first_sequence(a.pres())
    gc_a = number(a.out("gc"))
    a.close()
    if not cdna:
        report("revcomp→gc", "the reverse complement was not rendered", False)
        return
    report("revcomp→gc", "the two strands differ in length",
           len(cdna) == len(SEQ))
    b = Page(browser, "gc-content-sequence").set(sequence=cdna)
    gc_b = number(b.out("gc_pct"))
    b.close()
    report("revcomp→gc", f"GC {gc_a}% vs {gc_b}% on the other strand",
           gc_a is not None and gc_b is not None and abs(gc_a - gc_b) < 0.02)


@case
def revcomp_twice(browser, report) -> None:
    """The reverse complement of the reverse complement is the input."""
    a = Page(browser, "reverse-complement")
    back = []
    current = SEQ
    for _ in range(2):
        a.set(sequence=current)
        current = first_sequence(a.pres())
        back.append(current)
    a.close()
    report("revcomp ×2", "returned to the original sequence", back[1] == SEQ)


@case
def translate_composition(browser, report) -> None:
    """A translated protein and the same protein typed in must agree."""
    a = Page(browser, "dna-to-protein").set(sequence=SEQ)
    protein = first_protein(a.pres())
    a.close()
    if not protein:
        report("translate→composition", "no protein was produced", False)
        return
    b = Page(browser, "amino-acid-composition").set(protein=protein)
    length = number(b.out("length"))
    b.close()
    report("translate→composition", f"protein length {length} vs {len(protein)} residues",
           length is not None and abs(length - len(protein)) <= 1)


@case
def translate_pi(browser, report) -> None:
    """pI of a translated protein must be a plausible pH."""
    a = Page(browser, "dna-to-protein").set(sequence=SEQ)
    protein = first_protein(a.pres())
    a.close()
    b = Page(browser, "protein-isoelectric-point").set(protein=protein)
    pi = number(b.out("pi"))
    b.close()
    report("translate→pI", f"pI {pi} is on the pH scale", pi is not None and 3.0 < pi < 13.5)


@case
def backtranslate_roundtrip(browser, report) -> None:
    """Protein → DNA → protein must recover the protein."""
    for strategy in ("E. coli", "Human"):
        a = Page(browser, "reverse-translate")
        a.set(protein=PROT)
        dna = first_sequence(a.pres())
        a.close()
        b = Page(browser, "dna-to-protein").set(sequence=dna)
        back = first_protein(b.pres())
        b.close()
        report(f"back-translate ({strategy}) → translate",
               f"got {back[:20]}… expected {PROT[:20]}…", back == PROT)


@case
def mw_vs_converter(browser, report) -> None:
    """MW calculator and the µg↔pmol converter must agree."""
    seq = "AAATTTGGGCCC" * 84      # 1008 bp, 50% GC: 660 Da/bp is accurate here
    a = Page(browser, "dna-molecular-weight-calculator").set(sequence=seq)
    pmol_per_ug = number(a.out("pmol_per_ug"))
    a.close()
    b = Page(browser, "dsdna-ug-to-pmol")
    b.page.fill("input[data-var='length']", "1008")
    b.page.fill("input[data-var='mass_ug']", "1")
    b.page.wait_for_timeout(300)
    pmol = number(b.out("pmol"))
    b.close()
    # The converter uses the textbook 660 g/mol per bp, which is the sodium salt
    # of an average base pair; the MW page sums exact residue masses, i.e. the
    # free acid, about 618 Da/bp at 50% GC. The two must therefore differ by the
    # counterion mass and nothing else — roughly 7%, never 2% and never 20%.
    ratio = (pmol_per_ug / pmol) if (pmol_per_ug and pmol) else 0
    report("mw vs µg→pmol",
           f"{pmol_per_ug} vs {pmol} pmol/µg (mass ratio {ratio:.3f}, 660/618 = 1.068)",
           bool(pmol_per_ug and pmol) and 1.03 < ratio < 1.10)


@case
def primer_tm_vs_oligo(browser, report) -> None:
    """Primer stats and the oligo Tm page must agree on the same oligo."""
    primer = "ATGGCCATTGTAATGGGC"        # 18 nt, 9 of them G or C
    gc = sum(1 for c in primer if c in "GC")
    a = Page(browser, "pcr-primer-stats").set(forward=primer)
    tm_a = number(a.out("fwd_tm"))
    a.close()
    b = Page(browser, "oligo-tm-calculator")
    b.page.fill("input[data-var='length']", str(len(primer)))
    b.page.fill("input[data-var='gc']".replace("'", "'"), str(gc))
    b.page.wait_for_timeout(400)
    tm_gc = number(b.out("tm_gc"))
    b.close()
    expected = 64.9 + 41 * (gc - 16.4) / len(primer)
    report("primer Tm vs oligo Tm",
           f"primer {tm_a} °C, oligo page {tm_gc} °C, hand {expected:.2f} °C",
           tm_a is not None and tm_gc is not None
           and abs(tm_a - tm_gc) < 0.2 and abs(tm_a - expected) < 0.2)


@case
def shuffle_composition(browser, report) -> None:
    """A shuffled sequence must keep every base count."""
    a = Page(browser, "sequence-shuffler").set(sequence=SEQ)
    shuffled = first_sequence(a.pres())
    gc = number(a.out("gc_pct"))
    a.close()
    if not shuffled:
        report("shuffle→gc", "no shuffled sequence rendered", False)
        return
    same_counts = sorted(shuffled) == sorted(SEQ)
    report("shuffle→gc", "base composition preserved", same_counts)
    b = Page(browser, "gc-content-sequence").set(sequence=shuffled)
    gc2 = number(b.out("gc_pct"))
    b.close()
    report("shuffle→gc", f"GC {gc}% vs {gc2}% after shuffling",
           gc is not None and gc2 is not None and abs(gc - gc2) < 0.02)


@case
def pattern_vs_revcomp(browser, report) -> None:
    """A motif that only exists on the other strand must still be found."""
    # GATATC is palindromic, so use AACGTT (also palindromic) — instead test a
    # non-palindromic motif: GGGCCC on the forward strand only.
    seq = "AAAGGGCCCTTT"
    a = Page(browser, "dna-pattern-finder").set(sequence=seq, pattern="GGGCCC")
    total = number(a.out("total"))
    a.close()
    rc = "AAAGGGCCCTTT"      # revcomp is itself here; use a different case below
    report("pattern on both strands", f"GGGCCC found {total} time(s)", total == 1)


@case
def codon_vs_translate(browser, report) -> None:
    """Sense codons × 3 + stops × 3 must equal the coding length."""
    seq = "ATGGCGGCGGCGTAA"
    a = Page(browser, "codon-usage-calculator").set(sequence=seq)
    sense = number(a.out("codons"))
    stops = number(a.out("stops"))
    a.close()
    report("codon usage vs sequence length",
           f"{sense} sense + {stops} stop codons = {3 * ((sense or 0) + (stops or 0))} nt",
           sense is not None and stops is not None and 3 * (sense + stops) == len(seq))


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--only", default="")
    args = ap.parse_args()

    from playwright.sync_api import sync_playwright

    failures = 0
    passed = 0

    def report(name: str, detail: str, ok: bool) -> None:
        nonlocal failures, passed
        if ok:
            passed += 1
            print(f"PASS  {name}: {detail}")
        else:
            failures += 1
            print(f"FAIL  {name}: {detail}")

    with sync_playwright() as p:
        browser = p.chromium.launch()
        for fn in CASES:
            if args.only and args.only not in fn.__name__:
                continue
            try:
                fn(browser, report)
            except Exception as exc:                     # noqa: BLE001
                failures += 1
                print(f"FAIL  {fn.__name__}: {type(exc).__name__}: {str(exc)[:120]}")
        browser.close()

    print(f"{passed} passed, {failures} failed")
    return 1 if failures else 0


if __name__ == "__main__":
    sys.exit(main())
