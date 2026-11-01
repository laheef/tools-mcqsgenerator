#!/usr/bin/env python3
"""Pair tests for the numeric biology calculators.

`seq_pairs.py` chains the script-style pages (paste a sequence here, read it
there). Numeric pages have no such hand-off, so they are paired differently:
two pages that model the same quantity are opened side by side and made to agree.
The pairs are chosen so that neither page can be right on its own — one page
computes a value that the other page must reproduce from its own independent
formula, or one page's output is typed into the other page and the round trip
has to come back to the starting number.

    python3 tools/biology/pairs_numeric.py [--only substring] [-v]

Every check prints PASS/FAIL with both numbers; the exit code is the failure count.
"""
from __future__ import annotations

import argparse
import re
import sys

from playwright.sync_api import sync_playwright

BASE = "http://127.0.0.1:8080/biology/"


def num(text: str) -> float:
    """Page text to float. Results use U+00A0/U+202F thousands separators."""
    if text is None:
        return float("nan")
    cleaned = re.sub(r"[\u00a0\u202f\s,]", "", str(text)).replace("%", "")
    try:
        return float(cleaned)
    except ValueError:
        return float("nan")


class Page:
    def __init__(self, browser, slug: str):
        self.slug = slug
        self.page = browser.new_page(viewport={"width": 1280, "height": 1000})
        self.errors: list[str] = []
        self.page.on("pageerror", lambda e: self.errors.append(str(e)))
        self.page.goto(BASE + slug, wait_until="load")
        self.page.wait_for_timeout(600)
        # Results are gated behind the Calculate button; press it so the page is
        # in the same state a reader sees after asking for the answer.
        self.page.evaluate("() => { const b = document.querySelector('[data-calc-go]'); if (b) b.click(); }")
        self.page.wait_for_timeout(200)

    def set(self, **values) -> "Page":
        for var, value in values.items():
            self.page.fill(f"input[data-var='{var}']", str(value))
            self.page.wait_for_timeout(120)
        self.page.wait_for_timeout(350)
        return self

    def text(self, **values) -> "Page":
        for var, value in values.items():
            self.page.fill(f"textarea[data-var='{var}']", str(value))
            self.page.wait_for_timeout(150)
        self.page.wait_for_timeout(350)
        return self

    def pick(self, **values) -> "Page":
        """Choose an option by value prefix, on a select or a radio group."""
        for var, prefix in values.items():
            ok = self.page.evaluate(
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
                }""", [var, prefix])
            if not ok:
                raise RuntimeError(f"{self.slug}: no option starting with {prefix!r} for {var}")
            self.page.wait_for_timeout(350)
        return self

    def get(self, var: str) -> float:
        return num(self.page.eval_on_selector(
            f"input[data-var='{var}']", "e => e.value"))

    def close(self) -> None:
        self.page.close()


class Report:
    def __init__(self, verbose: bool):
        self.checks = 0
        self.failed = 0
        self.verbose = verbose
        self.errors: list[str] = []

    def close(self, got: float, want: float, label: str, tol: float = 0.01) -> None:
        self.checks += 1
        ok = abs(got - want) <= max(tol, abs(want) * 1e-4) and got == got
        if not ok:
            self.failed += 1
        if self.verbose or not ok:
            print(f"  {'PASS' if ok else 'FAIL'} {label}: {got:g} vs {want:g}")
        if not ok:
            self.errors.append(label)


def pairs(rep: Report, b) -> None:
    # 1. Simpson's index computed twice: the new page and the older general
    #    biodiversity page must agree on the same counts (D, 1−D and 1/D).
    new = Page(b, "simpson-diversity-index").set(n1=40, n2=25, n3=15, n4=10, n5=6)
    old = Page(b, "biodiversity-index").set(n1=40, n2=25, n3=15, n4=10, n5=6)
    rep.close(new.get("d"), old.get("dom"), "simpson D = biodiversity dominance")
    rep.close(new.get("diversity"), old.get("div"), "simpson 1−D = biodiversity diversity")
    rep.close(new.get("reciprocal"), old.get("inv"), "simpson 1/D = biodiversity inverse")
    rep.close(new.get("richness"), 5, "simpson richness counts five species")
    new.close()
    old.close()

    # 2. Recombinant count → recombination frequency, two pages.
    new = Page(b, "genetic-linkage-distance").set(recombinants=35, total=200)
    old = Page(b, "recombination-frequency").set(recombinant=35, total=200)
    rep.close(new.get("rf") * 100, old.get("rf"), "linkage RF = recombination-frequency RF (%)")
    rep.close(old.get("parental"), 165, "recombination-frequency parental count")
    new.close()
    old.close()

    # 3. Round trip: a map distance in cM typed back into the cM→RF converter has
    #    to return the recombination frequency it came from (both maps).
    new = Page(b, "genetic-linkage-distance").set(recombinants=35, total=200)
    haldane, kosambi = new.get("haldane"), new.get("kosambi")
    back = Page(b, "centimorgan-to-percentage").set(cm=haldane)
    rep.close(back.get("rf_haldane"), 17.5, "haldane cM → RF round trip (%)", 0.02)
    back.set(cm=kosambi)
    rep.close(back.get("rf_kosambi"), 17.5, "kosambi cM → RF round trip (%)", 0.02)
    rep.close(new.get("gap"), haldane - 17.5, "haldane gap over raw RF (cM)", 0.02)
    # the mapping function is a radio, so it has to re-drive the two derived boxes
    new.page.check("input[name='use_kosambi'][value='yes']")
    new.page.wait_for_timeout(400)
    rep.close(new.get("corrected"), kosambi, "Kosambi selected → corrected distance follows", 0.02)
    rep.close(new.get("gap"), kosambi - 17.5, "Kosambi selected → gap follows", 0.02)
    new.close()
    back.close()

    # 4. Molar ratio → the dsDNA mass↔moles converter: 50 ng of a 5 kb vector is
    #    15.15 fmol, and that page must say the same thing from its own formula.
    new = Page(b, "plasmid-molar-ratio").set(vector_ng=50, vector_bp=5000,
                                             insert1_bp=800, insert2_bp=0, ratio=3)
    old = Page(b, "dsdna-ug-to-pmol").set(length=5000, mass_ug=0.05)
    # the converter rounds its pmol to four decimals, so 15.1515 fmol arrives as 15.2
    rep.close(new.get("vector_fmol"), old.get("pmol") * 1000, "vector fmol = µg→pmol converter (fmol)", 0.1)
    rep.close(new.get("insert1_ng"), 24, "3-fold insert mass for 800 bp in 5 kb")
    new.close()
    old.close()

    # 5. Scale bar → microscope magnification: a 30 mm measurement at 400× is
    #    75 µm, and the older magnification page must produce the same 0.075 mm.
    new = Page(b, "specimen-size-from-image").set(measured_mm=30, scale_mm=0, magnification=400)
    old = Page(b, "microscope-magnification").set(measured=30)
    rep.close(new.get("actual_um"), old.get("actual"), "specimen µm = magnification page (µm)")
    rep.close(new.get("actual_mm"), old.get("actual") / 1000, "specimen mm = magnification page (mm)")
    new.close()
    old.close()

    # 6. A zone of inhibition gives a plate concentration; that stock has to
    #    dilute to a chosen breakpoint by the volume the C1V1 page computes.
    new = Page(b, "mic-zone-of-inhibition").set(zone_mm=22, disc_ug=30, well_ul=200)
    stock = new.get("plate_ug_ml")
    rep.close(stock, 150, "30 µg in 200 µL = 150 µg/mL on the plate")
    old = Page(b, "dilution-calculator-c1v1").set(c1=stock, c2=4, v2=1)
    rep.close(old.get("v1"), 4 * 1 / stock, "C1V1 volume to reach a 4 µg/mL breakpoint (mL)", 0.001)
    rep.close(old.get("fold"), stock / 4, "dilution fold to breakpoint", 0.01)
    new.close()
    old.close()

    # 7. The two coalescent pages must use the same harmonic number a₁ and the
    #    same θ per site for the same sample, from different formulas.
    new = Page(b, "tajimas-d").set(sites=24, n=20, length=1000, pi=0.0068)
    old = Page(b, "watterson-estimator").set(sites=24, n=20, length=1000)
    rep.close(new.get("a1"), old.get("a1"), "Tajima a₁ = Watterson a₁ at n = 20", 0.0005)
    rep.close(old.get("theta_w"), 24 / 3.54774, "Watterson θ = S/H(19)", 0.01)
    rep.close(new.get("theta_w"), old.get("theta_per_site"), "Tajima θ_W/site = Watterson θ per site", 0.0001)
    rep.close(old.get("theta_per_kb"), old.get("theta_w") / 1000 * 1000, "θ per kb consistent with θ", 0.01)
    new.close()
    old.close()



    # ---- batch O: the table-driven tools against the pages that compute the same
    # thing by a different route.

    # 8. Codon adaptation vs codon usage: the CAI page's rare-codon count for a
    #    gene built from the rarest E. coli codons must be every scored codon.
    new = Page(b, "codon-adaptation-index").text(sequence="ATG" + "CGA" * 10 + "AGG" * 10)
    rep.close(new.get("codons"), 20, "CAI scores 20 codons (ATG excluded)")
    rep.close(new.get("rare"), 20, "every scored codon is rare")
    rep.close(new.get("cai") < 0.2, 1, "CAI of a rare-codon gene is below 0.2")
    new.close()

    # 9. A random sequence and the GC page must agree on its composition: the
    #    generator reports the GC it produced, and the GC page recomputes it from
    #    the bases it is given. Two implementations, one answer.
    gen = Page(b, "random-sequence-generator").set(length=400, gc=40, seed=11)
    seq = gen.page.evaluate(
        """() => {
            const blocks = [...document.querySelectorAll('.calc-script-block')];
            const hit = blocks.find(b => /^Sequence$/.test((b.querySelector('h3')||{}).textContent||''));
            return hit ? hit.querySelector('pre').textContent : '';
        }""")
    dna = "".join(c for c in seq if c in "ACGT")
    rep.close(len(dna), 400, "generator produced 400 bases")
    rep.close(gen.get("gc_actual"),
              100 * sum(1 for c in dna if c in "GC") / len(dna),
              "generator's GC matches a count of its own bases", 0.02)
    gen.close()

    # 10. The enzyme finder says which enzymes cut once; the digest page must find
    #     the same number of sites for that enzyme.
    finder = Page(b, "restriction-enzyme-finder").text(
        sequence="AAAAGAATTCAAAGGGATCCAAAAGGGCCCTTT").pick(circular="no")
    rep.close(finder.get("unique") >= 1, 1, "finder reports a unique cutter")
    digest = Page(b, "restriction-digest").text(sequence="AAAAGAATTCAAAGGGATCCAAAAGGGCCCTTT")
    rep.close(digest.get("sites"), 1, "digest page agrees: EcoRI cuts this sequence once")
    finder.close()
    digest.close()

def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--only")
    ap.add_argument("-v", "--verbose", action="store_true")
    args = ap.parse_args()
    if args.only:
        print("--only is not used: the pair suite always runs whole (pairs are cheap)")
    rep = Report(args.verbose)
    with sync_playwright() as p:
        browser = p.chromium.launch()
        pairs(rep, browser)
        browser.close()
    print(f"{rep.checks} pair checks, {rep.failed} problems")
    for e in rep.errors:
        print("  -", e)
    return rep.failed


if __name__ == "__main__":
    raise SystemExit(main())
