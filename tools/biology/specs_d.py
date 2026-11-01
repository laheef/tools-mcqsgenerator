"""Batch D — molecular biology bench calculators."""

from lib import Spec, num, sel, chk, d

SPECS: list[Spec] = []


def add(s: Spec) -> None:
    SPECS.append(s)


add(Spec(
    name="PCR Master Mix Calculator",
    slug="pcr-master-mix-calculator",
    summary=("A master mix is one bulk solution split across every tube in the run. This calculator sizes "
             "the mix, adds a pipetting allowance and returns the water volume to top up."),
    fields=[
        num("reactions", "Reactions", 24, "", "Samples plus controls"),
        num("extra", "Extra reactions", 2, "", "Allowance for pipetting loss"),
        num("rxn_vol", "Volume per reaction", 25, "µL", ""),
        num("mm_stock", "Master mix stock concentration", 2, "×", "2× mix is used at half the final volume"),
        num("primer_stock", "Primer stock", 10, "µM", "Each primer, from a 10 µM working stock"),
        num("primer_final", "Primer final concentration", 0.5, "µM", ""),
        num("template", "Template volume per reaction", 1, "µL", ""),
        num("total", "Total mix volume", "", "µL", "", output=True),
        num("mm_vol", "Master mix to add", "", "µL", "", output=True),
        num("primer_vol", "Each primer to add", "", "µL", "", output=True),
        num("water_vol", "Water to add", "", "µL", "", output=True),
    ],
    dirs=[
        d("Master mix", "total", "(reactions+extra)*rxn_vol"),
        d("Master mix", "mm_vol", "(reactions+extra)*rxn_vol/mm_stock"),
        d("Master mix", "primer_vol", "(reactions+extra)*rxn_vol*primer_final/primer_stock"),
        d("Master mix", "water_vol",
          "(reactions+extra)*rxn_vol-(reactions+extra)*rxn_vol/mm_stock"
          "-(reactions+extra)*rxn_vol*primer_final/primer_stock*2-(reactions+extra)*template"),
    ],
    formula=("Reactions prepared = reactions + extra;  master mix = total ÷ stock fold;  "
             "water = total − master mix − primers − template"),
    symbols=[("total", "number of tubes × volume per tube", "µL"),
             ("mm_vol", "2× master mix, used at half the final volume", "µL"),
             ("primer_vol", "each primer, from C1V1 = C2V2", "µL"),
             ("water_vol", "the balance", "µL")],
    notes=[
        "Prepare for two more reactions than you have tubes. Pipetting loss of 5–10% per component "
        "is normal, and running out halfway through a plate is unrecoverable.",
        "Add the master mix to the plate first and the template last: template in a well without mix "
        "is the classic cause of one empty lane.",
        "Primer volume is C1V1 = C2V2 per reaction, then multiplied by the number of reactions — "
        "0.5 µM final from a 10 µM stock is 1.25 µL in a 25 µL reaction.",
        "Keep the mix on ice and add polymerase last if it is a hot-start enzyme supplied separately.",
    ],
    mistakes=[
        "Making exactly the number of reactions needed and coming up short.",
        "Forgetting that the template volume is part of the 25 µL, not additional to it.",
        "Pipetting the viscous master mix without pre-wetting the tip, which loses several microlitres.",
    ],
    faq=[
        ("How many extra reactions should I make?",
         "Two, or 10% of the plate — more for a full 96-well plate."),
        ("Why is my water volume negative?",
         "The components already add up to more than the reaction volume: check the master mix "
         "concentration and the template volume."),
        ("Does this work for a 20 µL reaction?",
         "Yes — set the volume per reaction to 20 and every component rescales."),
    ],
    related=[("/biology/pcr-annealing-temperature", "Annealing temperature"),
             ("/biology/primer-resuspension-working-stock", "Primer resuspension"),
             ("/biology/dilution-calculator-c1v1", "C1V1 dilution")],
    svg=("chain", {"caption": "Reactions × volume, then each component's share, then the water."}),
    icon="pcr",
))

add(Spec(
    name="Primer Resuspension and Working Stock Calculator",
    slug="primer-resuspension-working-stock",
    summary=("A primer arrives as a dried pellet measured in nanomoles. Dissolve it to a 100 µM "
             "stock, then dilute to a 10 µM working stock — this calculator gives the exact volume "
             "of TE or water for each step and how much working stock one tube of stock will make."),
    fields=[
        num("nmol", "Primer in the tube", 33.4, "nmol", "Printed on the vial or the spec sheet"),
        num("stock", "Stock concentration", 100, "µM", "100 µM is the usual master stock"),
        num("working", "Working concentration", 10, "µM", ""),
        num("working_vol", "Working stock to make", 500, "µL", ""),
        num("water_stock", "Volume to add to the pellet", "", "µL", "", output=True),
        num("take", "Stock to take for the working stock", "", "µL", "", output=True),
        num("water_working", "Diluent for the working stock", "", "µL", "", output=True),
        num("aliquots", "Working stocks from one tube", "", "", "", output=True),
    ],
    dirs=[
        d("Resuspension", "water_stock", "nmol/stock*1000"),
        d("Resuspension", "take", "working*working_vol/stock"),
        d("Resuspension", "water_working", "working_vol-working*working_vol/stock"),
        d("Resuspension", "aliquots", "nmol/stock*1000/working*working_vol/stock"),
    ],
    formula="Volume (µL) = nmol ÷ concentration (µM) × 1000;  stock volume = C2V2 ÷ C1",
    symbols=[("nmol", "amount in the vial, per the spec sheet", "nmol"),
             ("stock", "master stock concentration", "µM"),
             ("volume", "diluent to add", "µL")],
    notes=[
        "1 nmol in 1 mL is 1 µM, so the arithmetic is friendly: 33.4 nmol in 334 µL gives 100 µM.",
        "Vortex for 30 seconds and leave at room temperature for 10 minutes; pellets of long "
        "oligos dissolve slowly and a half-dissolved stock reads low.",
        "Use TE rather than water for long-term storage: the Tris buffer holds the pH and the EDTA "
        "protects against nucleases.",
        "Store the 100 µM stock at −20 °C in aliquots and keep the 10 µM working stock at 4 °C for "
        "up to a few weeks.",
    ],
    mistakes=[
        "Assuming the vial contains exactly the nominal amount instead of reading the spec sheet.",
        "Freezing and thawing the working stock repeatedly, which is a common source of failed PCR.",
        "Recording concentrations as '100×' rather than in µM, which cannot be checked later.",
    ],
    faq=[
        ("How much water do I add to a 33.4 nmol primer?",
         "334 µL for a 100 µM stock, or 3.34 mL for 10 µM."),
        ("Can I use water instead of TE?",
         "For short-term use yes, but TE keeps the oligo stable for years."),
    ],
    related=[("/biology/pcr-master-mix-calculator", "PCR master mix"),
             ("/biology/dilution-calculator-c1v1", "C1V1 dilution"),
             ("/biology/oligo-tm-calculator", "Oligo Tm")],
    svg=("chain", {"caption": "Nanonmoles in the tube to microlitres of diluent, twice over."}),
    icon="pipette",
))

add(Spec(
    name="Serial Dilution Planner",
    slug="serial-dilution-planner",
    summary=("A serial dilution builds a concentration series by transferring a fixed volume from "
             "tube to tube. This planner gives the transfer volume, the diluent volume, every "
             "concentration in the series and the total volume of diluent you need to prepare."),
    fields=[
        num("stock", "Starting concentration", 1000, "", "Any unit — mg/mL, µM, CFU/mL"),
        num("factor", "Dilution factor per step", 10, "×", "10 for a tenfold series"),
        num("steps", "Number of steps", 6, "", ""),
        num("tube_vol", "Volume in each tube", 1000, "µL", ""),
        num("transfer", "Transfer volume", "", "µL", "", output=True),
        num("diluent", "Diluent per tube", "", "µL", "", output=True),
        num("final", "Final concentration", "", "", "", output=True),
        num("total_diluent", "Diluent needed in total", "", "µL", "", output=True),
    ],
    dirs=[
        d("Series", "transfer", "tube_vol/factor"),
        d("Series", "diluent", "tube_vol-tube_vol/factor"),
        d("Series", "final", "stock/pow(factor,steps)"),
        d("Series", "total_diluent", "(tube_vol-tube_vol/factor)*steps"),
    ],
    formula="Transfer = tube volume ÷ dilution factor;  C(n) = C₀ ÷ factorⁿ",
    symbols=[("factor", "how much each step dilutes", "×"),
             ("steps", "number of transfers", "—"),
             ("transfer", "volume moved from the previous tube", "µL")],
    notes=[
        "The transfer volume must not exceed a tenth of the tube volume to keep the previous tube's "
        "contents from being disturbed — that is the point of the factor.",
        "The last tube is a disposal tube: the series has one more tube than transfers.",
        "Each step multiplies the error of the previous one, so keep the numbers exact rather than "
        "rounding the intermediate concentrations.",
    ],
    mistakes=[
        "Changing tips for the transfer but not for the mixing, which carries over the previous tube.",
        "Diluting into the same volume you took from (which leaves the tube short).",
        "Assuming a tenfold series over six steps gives 10⁻⁶ when it gives 10⁻⁶ from a starting "
        "concentration of 1 — write the series out.",
    ],
    faq=[
        ("How many tubes do I need for a 10⁻⁶ dilution?",
         "Six transfers, so seven tubes including the starting material."),
        ("Why is my transfer volume so small?",
         "Because the tube volume is small or the factor is large; increase the tube volume or use a "
         "two-step dilution."),
    ],
    related=[("/biology/cfu-ml-calculator", "CFU/mL"),
             ("/biology/dilution-calculator-c1v1", "C1V1 dilution"),
             ("/biology/hemocytometer-cell-counter", "Hemocytometer counter")],
    svg=("curve", {"caption": "Every step divides the concentration by the same factor."}),
    icon="pipette",
))

add(Spec(
    name="Dilution Calculator (C1V1 = C2V2)",
    slug="dilution-calculator-c1v1",
    summary=("Every dilution question is the same equation: the amount of solute before equals the "
             "amount after. This calculator solves C₁V₁ = C₂V₂ for whichever value you are missing "
             "and tells you how much diluent to add."),
    fields=[
        num("c1", "Stock concentration", 10, "M", ""),
        num("v1", "Stock volume", "", "mL", "", output=True),
        num("c2", "Final concentration", 0.5, "M", ""),
        num("v2", "Final volume", 100, "mL", ""),
        num("diluent", "Diluent to add", "", "mL", "", output=True),
        num("fold", "Dilution factor", "", "×", "", output=True),
    ],
    dirs=[
        d("Dilution", "v1", "c2*v2/c1"),
        d("Dilution", "diluent", "v2-c2*v2/c1"),
        d("Dilution", "fold", "c1/c2"),
    ],
    formula="C₁ × V₁ = C₂ × V₂",
    symbols=[("C₁", "stock concentration", "any"),
             ("V₁", "volume of stock to take", "mL"),
             ("C₂", "final concentration", "any"),
             ("V₂", "final volume", "mL")],
    notes=[
        "The confidence check is units: C₁ and C₂ must be in the same unit and V₁ and V₂ in the same "
        "unit, or the equation quietly gives a wrong answer.",
        "Add the stock to about 80% of the final volume of diluent, then top up to the mark: mixing "
        "volumes is not strictly additive.",
        "For a dilution series, do it stepwise; a single 1000× dilution is less accurate than three "
        "10× steps because of pipetting error.",
    ],
    mistakes=[
        "Mixing molarity with mass concentration in the same equation.",
        "Forgetting that V₂ includes the stock volume.",
        "Using a volumetric flask for a small volume and a beaker for the rest.",
    ],
    faq=[
        ("What if I want a dilution factor, not a concentration?",
         "Dilution factor is C₁/C₂; a 1:10 dilution has a factor of 10."),
        ("Can V₁ be larger than V₂?",
         "No — that would mean concentrating the solution, which a dilution cannot do."),
    ],
    related=[("/biology/serial-dilution-planner", "Serial dilution"),
             ("/chemistry/molarity", "Molarity"),
             ("/biology/primer-resuspension-working-stock", "Primer resuspension")],
    svg=("chain", {"caption": "Concentration before and after, and the volume that bridges them."}),
    icon="flask",
))

add(Spec(
    name="OD260 to Nucleic Acid Concentration Calculator",
    slug="od260-nucleic-acid-concentration",
    summary=("A260 converts to concentration with a factor that depends on what you are measuring: "
             "50 for double-stranded DNA, 40 for RNA, 33 for single-stranded DNA. This calculator "
             "applies the right factor, the dilution, and the A260/A280 ratio that tells you whether "
             "the sample is clean."),
    fields=[
        sel("type", "Nucleic acid", [("dsDNA", "50"), ("ssDNA / oligo", "33"), ("RNA", "40"),
                                     ("Protein", "1.5")], "50"),
        num("a260", "A260 reading", 0.42, "", "Absorbance in a 1 cm cuvette"),
        num("dilution", "Dilution factor", 1, "×", "10 if you diluted 1:10 for the Nanodrop"),
        num("a280", "A280 reading", 0.23, "", "Optional — gives the purity ratio"),
        num("conc", "Concentration", "", "ng/µL", "", output=True),
        num("purity", "A260/A280", "", "", "", output=True),
        num("yield_ug", "Total yield in 100 µL", "", "µg", "", output=True),
    ],
    dirs=[
        d("Concentration", "conc", "a260*dilution*type*1000"),
        d("Concentration", "purity", "a260/a280"),
        d("Concentration", "yield_ug", "a260*dilution*type*1000*100/1000"),
    ],
    formula="Concentration (ng/µL) = A260 × dilution × factor, with factor 50 (dsDNA), 40 (RNA), 33 (ssDNA)",
    symbols=[("A260", "absorbance at 260 nm", "AU"),
             ("factor", "50 ng/µL per A260 for dsDNA", "ng/µL"),
             ("purity", "A260/A280", "ratio")],
    bands=[("1.8", "Pure DNA", "the usual target for dsDNA"),
           ("2.0", "Pure RNA", "the usual target for RNA"),
           ("below 1.6", "Protein or phenol carry-over", "re-purify before sequencing")],
    notes=[
        "The factors assume a 1 cm path length. A Nanodrop normalises to 1 cm automatically; a "
        "microplate reader does not, so check the path length.",
        "A260 measures everything that absorbs at 260 nm, including free nucleotides and primers, so "
        "a high concentration with a poor 260/280 can still fail downstream.",
        "Below about 0.1 AU the reading is dominated by noise; use a fluorescent assay instead.",
    ],
    mistakes=[
        "Using the dsDNA factor for RNA (50 instead of 40, a 25% overestimate).",
        "Forgetting the dilution when the sample was diluted for the reading.",
        "Reading a sample that still has ethanol in it — ethanol absorbs strongly in the UV.",
    ],
    sources=["Factors of 50, 40 and 33 ng/µL per A260 unit are the standard convention for "
             "dsDNA, RNA and ssDNA."],
    faq=[
        ("Why 50 for dsDNA?",
         "A 50 µg/mL solution of double-stranded DNA in a 1 cm cuvette has an A260 of 1.0."),
        ("My A260/A280 is 1.9 but the sequencing failed — why?",
         "The ratio is insensitive to some inhibitors; check A260/A230 and run a gel."),
    ],
    related=[("/biology/dsdna-ug-to-pmol-converter", "dsDNA µg to pmol"),
             ("/biology/genome-copy-number", "Genome copy number"),
             ("/chemistry/beer-lambert-law", "Beer–Lambert law")],
    svg=("chain", {"caption": "Absorbance, dilution and a factor that depends on the molecule."}),
    icon="spectrophotometer",
))

add(Spec(
    name="dsDNA µg to pmol Converter",
    slug="dsdna-ug-to-pmol-converter",
    summary=("Molecular biology protocols ask for DNA in pmol, and the freezer gives you µg. The "
             "bridge is the length of the molecule: one base pair of double-stranded DNA weighs "
             "660 g/mol, so the conversion needs the size as well as the mass. This calculator "
             "handles both directions."),
    fields=[
        num("ug", "Mass of DNA", 1, "µg", ""),
        num("bp", "Fragment length", 3000, "bp", ""),
        num("pmol", "Amount", "", "pmol", "", output=True),
        num("ug_from_pmol", "Mass for 1 pmol", "", "µg", "", output=True),
        num("ng_ul", "Concentration if in 50 µL", "", "ng/µL", "", output=True),
        num("molecules", "Molecules", "", "", "", output=True),
    ],
    dirs=[
        d("Conversion", "pmol", "ug*1000000/(bp*660)"),
        d("Conversion", "ug_from_pmol", "bp*660/1000000"),
        d("Conversion", "ng_ul", "ug*1000/50"),
        d("Conversion", "molecules", "ug*0.000000000001/660/bp*602200000000000000000000"),
    ],
    formula="pmol = µg × 10⁶ ÷ (length in bp × 660);  1 pmol of 1 000 bp = 0.66 µg",
    symbols=[("µg", "mass of DNA", "µg"),
             ("bp", "length in base pairs", "bp"),
             ("660", "average molar mass of one base pair, g/mol", "g/mol")],
    notes=[
        "660 g/mol per bp is the standard average; a specific fragment can differ by a few percent "
        "depending on GC content, which does not matter for ligation ratios.",
        "The same arithmetic works in reverse: pmol × bp × 660 ÷ 10⁶ = µg.",
        "For single-stranded oligos the molar mass is roughly 330 g/mol per nucleotide, which is why "
        "primers are quoted in nmol rather than µg.",
    ],
    mistakes=[
        "Using the plasmid length when the fragment of interest is much shorter.",
        "Dropping the 10⁶ that converts grams to micrograms.",
        "Treating nmol and pmol as interchangeable — they differ by a thousand.",
    ],
    faq=[
        ("How many pmol is 1 µg of a 3 kb plasmid?",
         "About 0.505 pmol — 1 000 ng ÷ (3 000 × 0.66 ng/pmol)."),
        ("Why does length matter so much?",
         "Because the amount of substance is the mass divided by the molar mass, and the molar mass "
         "scales with length."),
    ],
    related=[("/biology/od260-nucleic-acid-concentration", "OD260 concentration"),
             ("/biology/ligation-molar-ratio", "Ligation molar ratio"),
             ("/biology/genome-copy-number", "Genome copy number")],
    svg=("chain", {"caption": "Mass divided by the molar mass of the fragment."}),
    icon="dna",
))

add(Spec(
    name="DNA Molarity from Mass or A260",
    slug="dna-molarity-from-mass",
    summary=("Concentration in ng/µL tells you how much DNA you have; molarity tells you how many "
             "molecules. Sequencing, ligation and qPCR all need the second. This calculator "
             "converts between mass concentration, molar concentration and copy number."),
    fields=[
        num("ng_ul", "DNA concentration", 50, "ng/µL", ""),
        num("bp", "Fragment length", 5000, "bp", ""),
        num("nm", "Molar concentration", "", "nM", "", output=True),
        num("pmol_ul", "pmol per µL", "", "pmol/µL", "", output=True),
        num("copies_ul", "Copies per µL", "", "", "", output=True),
        num("a260", "Equivalent A260", "", "", "", output=True),
    ],
    dirs=[
        d("Molarity", "nm", "ng_ul*1000000/(bp*660)"),
        d("Molarity", "pmol_ul", "ng_ul*1000000/(bp*660)/1000"),
        d("Molarity", "copies_ul", "ng_ul*0.000000001/660/bp*602200000000000000000000"),
        d("Molarity", "a260", "ng_ul/50"),
    ],
    formula="nM = (ng/µL × 10⁶) ÷ (bp × 660);  copies/µL = (ng/µL × 6.022×10¹⁴) ÷ (bp × 660)",
    symbols=[("ng/µL", "mass concentration", "ng/µL"),
             ("bp", "molecule length", "bp"),
             ("nM", "molar concentration", "nM")],
    notes=[
        "The copy-number form is the one qPCR standard curves are built on: a 10-fold dilution "
        "series is a 10-fold drop in copies per microlitre.",
        "Doubling the length halves the molarity at the same mass concentration — long constructs "
        "need much more mass for the same number of molecules.",
        "For a plasmid, use the full plasmid length, not the insert.",
    ],
    mistakes=[
        "Mixing ng/µL and µg/mL by a factor of a thousand.",
        "Using a size in kilobases in a formula that expects base pairs.",
        "Quoting molarity from a concentration measured with the wrong UV factor.",
    ],
    faq=[
        ("How many copies are in 1 ng of a 5 kb plasmid?",
         "About 1.8 × 10⁸ copies."),
        ("Why do I need molarity for sequencing?",
         "Because the reaction consumes molecules, not micrograms, and library molarity determines "
         "cluster density."),
    ],
    related=[("/biology/dsdna-ug-to-pmol-converter", "dsDNA µg to pmol"),
             ("/biology/genome-copy-number", "Genome copy number"),
             ("/biology/od260-nucleic-acid-concentration", "OD260 concentration")],
    svg=("chain", {"caption": "Mass concentration, length and Avogadro's number."}),
    icon="dna",
))

add(Spec(
    name="Ligation Molar Ratio Calculator (Insert : Vector)",
    slug="ligation-molar-ratio",
    summary=("A ligation works when the insert outnumbers the vector enough to find it, but not so "
             "much that it ligates to itself. The standard is a 3:1 molar ratio, and the "
             "calculation converts that ratio into nanograms using the two lengths."),
    fields=[
        num("vector_ng", "Vector mass", 100, "ng", ""),
        num("vector_bp", "Vector length", 4000, "bp", ""),
        num("insert_bp", "Insert length", 800, "bp", ""),
        num("ratio", "Insert : vector molar ratio", 3, ":1", "3:1 is the usual starting point"),
        num("insert_ng", "Insert mass", "", "ng", "", output=True),
        num("vector_pmol", "Vector amount", "", "pmol", "", output=True),
        num("insert_pmol", "Insert amount", "", "pmol", "", output=True),
        num("total_ng", "Total DNA in the reaction", "", "ng", "", output=True),
    ],
    dirs=[
        d("Ligation", "insert_ng", "vector_ng*insert_bp/vector_bp*ratio"),
        d("Ligation", "vector_pmol", "vector_ng*1000000/(vector_bp*660)"),
        d("Ligation", "insert_pmol", "vector_ng*1000000/(vector_bp*660)*ratio"),
        d("Ligation", "total_ng", "vector_ng+vector_ng*insert_bp/vector_bp*ratio"),
    ],
    formula="Insert (ng) = vector (ng) × (insert bp ÷ vector bp) × molar ratio",
    symbols=[("vector_ng", "mass of cut vector", "ng"),
             ("vector_bp", "vector length", "bp"),
             ("insert_bp", "insert length", "bp"),
             ("ratio", "moles of insert per mole of vector", ":1")],
    notes=[
        "3:1 favours the desired product without starving the vector; 1:1 reduces tandem inserts, "
        "10:1 drives short-insert ligations that otherwise fail.",
        "Total DNA in a 20 µL ligation should stay around 100–200 ng: more DNA favours "
        "self-ligation and concatemers.",
        "Both fragments should be clean — a ligation is exquisitely sensitive to residual "
        "phosphatase, salt and EDTA from a gel-purification kit.",
    ],
    mistakes=[
        "Using the insert:vector mass ratio when the two fragments are different lengths.",
        "Phosphatasing the insert as well as the vector, which leaves nothing to ligate to.",
        "Leaving the ligation for hours at room temperature, which favours rearrangement.",
    ],
    faq=[
        ("Why 3:1?",
         "It is the ratio that maximises the chance of a vector meeting an insert while limiting "
         "vector–vector and insert–insert products."),
        ("How much insert for 100 ng of a 4 kb vector and an 800 bp insert?",
         "60 ng — 100 × (800/4000) × 3."),
    ],
    related=[("/biology/dsdna-ug-to-pmol-converter", "dsDNA µg to pmol"),
             ("/biology/transformation-efficiency", "Transformation efficiency"),
             ("/biology/restriction-digest-setup", "Restriction digest")],
    svg=("bars", {"caption": "Vector and insert masses that give the chosen molar ratio."}),
    icon="dna",
))

add(Spec(
    name="Restriction Digest Reaction Setup",
    slug="restriction-digest-setup",
    summary=("A restriction digest is a small reaction with a strict recipe: enzyme units, buffer strength "
             "and volume. This calculator builds the 20 µL reaction."),
    fields=[
        num("dna_ng", "DNA mass", 1000, "ng", ""),
        num("dna_conc", "DNA concentration", 200, "ng/µL", ""),
        num("total_vol", "Reaction volume", 20, "µL", ""),
        num("units_per_ug", "Enzyme units per µg DNA", 10, "U/µg", "5–10 is typical"),
        num("enzyme_conc", "Enzyme concentration", 20000, "U/mL", "20 U/µL is typical"),
        num("buffer_x", "Buffer stock", 10, "×", "CutSmart is 10×"),
        num("dna_vol", "DNA volume", "", "µL", "", output=True),
        num("enzyme_vol", "Enzyme volume", "", "µL", "", output=True),
        num("buffer_vol", "Buffer volume", "", "µL", "", output=True),
        num("water_vol", "Water volume", "", "µL", "", output=True),
        num("units", "Total enzyme units", "", "U", "", output=True),
    ],
    dirs=[
        d("Digest", "dna_vol", "dna_ng/dna_conc"),
        d("Digest", "enzyme_vol", "dna_ng/1000*units_per_ug/enzyme_conc*1000"),
        d("Digest", "buffer_vol", "total_vol/buffer_x"),
        d("Digest", "water_vol", "total_vol-dna_ng/dna_conc-dna_ng/1000*units_per_ug/enzyme_conc*1000"
                                 "-total_vol/buffer_x"),
        d("Digest", "units", "dna_ng/1000*units_per_ug"),
    ],
    formula="Enzyme units = DNA (µg) × units per µg;  buffer = reaction volume ÷ stock fold;  water = the balance",
    symbols=[("dna_ng", "mass of DNA digested", "ng"),
             ("units_per_ug", "enzyme excess over the minimum", "U/µg"),
             ("buffer_vol", "1× final concentration", "µL")],
    notes=[
        "Glycerol carry-over above 5% of the reaction volume causes star activity; keep the enzyme "
        "volume at or below 1/10 of the total.",
        "One unit is defined against a specific substrate DNA, so a new lot or a new template may "
        "need more; 10 U/µg is the safe working excess.",
        "Most enzymes are active for 15 minutes to an hour at 37 °C; longer incubations mostly add "
        "star activity, not completeness.",
        "Heat-inactivate or column-purify before ligation — residual enzyme will re-cut the product.",
    ],
    mistakes=[
        "Adding 5 µL of enzyme to a 20 µL reaction for a 'fast' digest.",
        "Using a 10× buffer at 1× in a reaction that already contains a large volume of DNA in TE.",
        "Assuming complete digestion without running an aliquot on a gel.",
    ],
    faq=[
        ("What if the DNA volume exceeds the reaction volume?",
         "Concentrate the DNA or scale the reaction up; the calculator returns a negative water "
         "volume when that happens."),
        ("Does doubled enzyme mean double the reaction volume?",
         "No — doubling units per µg means more enzyme in the same volume, until the glycerol limit."),
    ],
    related=[("/biology/ligation-molar-ratio", "Ligation molar ratio"),
             ("/biology/agarose-gel-calculator", "Agarose gel"),
             ("/biology/dilution-calculator-c1v1", "C1V1 dilution")],
    svg=("bars", {"caption": "A 20 µL digest: DNA, enzyme, buffer and water."}),
    icon="flask",
))

add(Spec(
    name="PCR Annealing Temperature Calculator",
    slug="pcr-annealing-temperature",
    summary=("Annealing temperature is the one PCR variable worth calculating: too low and you get "
             "primer dimers and non-specific bands, too high and you get nothing. This calculator "
             "uses the primer pair's melting temperatures, the salt and the product length to "
             "suggest a starting temperature and a gradient to test."),
    fields=[
        num("tm_f", "Forward primer Tm", 60, "°C", ""),
        num("tm_r", "Reverse primer Tm", 60, "°C", ""),
        num("offset", "Offset below the lower Tm", 5, "°C", "3–5 °C is standard"),
        num("product", "Product length", 400, "bp", ""),
        num("ta", "Annealing temperature", "", "°C", "", output=True),
        num("gradient_low", "Gradient low", "", "°C", "", output=True),
        num("gradient_high", "Gradient high", "", "°C", "", output=True),
        num("tm_gap", "Tm difference", "", "°C", "", output=True),
        num("extension_s", "Extension time (Taq, 1 min per kb)", "", "s", "", output=True),
        num("cycles_time", "Cycling time for 30 cycles", "", "min", "", output=True),
    ],
    dirs=[
        d("Annealing", "ta", "min(tm_f,tm_r)-offset"),
        d("Annealing", "gradient_low", "min(tm_f,tm_r)-offset-3"),
        d("Annealing", "gradient_high", "min(tm_f,tm_r)-offset+3"),
        d("Annealing", "tm_gap", "max(tm_f,tm_r)-min(tm_f,tm_r)"),
        d("Annealing", "extension_s", "max(15,product/1000*60)"),
        d("Annealing", "cycles_time",
          "30*(max(tm_f,tm_r)-min(tm_f,tm_r)+max(15,product/1000*60))/60"),
    ],
    formula="Ta = min(Tm) − 5 °C; test a gradient of Ta ± 3 °C",
    symbols=[("Tm", "melting temperature of each primer", "°C"),
             ("offset", "how far below Tm to anneal", "°C"),
             ("Ta", "annealing temperature", "°C")],
    bands=[("Tm gap under 2 °C", "Good pair", "both primers anneal at the same temperature"),
           ("2 – 5 °C", "Acceptable", "use the lower Tm and expect reduced efficiency"),
           ("above 5 °C", "Poor pair", "redesign; a long product will not amplify efficiently")],
    notes=[
        "Use the lower of the two Tms, and 5 °C below it as a starting point. The first cycles "
        "matter more than the rest, so a two-step or touchdown protocol can rescue a difficult pair.",
        "Salt matters: Tm rises about 16.6 °C per log unit of monovalent cation concentration, so a "
        "primer quoted in 50 mM Na⁺ is not the same in a 1× Q5 buffer.",
        "Add 3 °C if the primers are longer than 22 nt or the product is GC-rich; subtract it for "
        "AT-rich templates.",
        "Two-step PCR (denature, then anneal/extend at 68–72 °C) is becoming standard for high-fidelity "
        "polymerases that extend quickly.",
    ],
    mistakes=[
        "Averaging the two Tms instead of using the lower one.",
        "Using the manufacturer's default 60 °C for every pair — it works often enough to hide the "
        "pairs it fails.",
        "Changing several variables at once when a single gradient would identify the problem.",
    ],
    faq=[
        ("Should annealing temperature be higher or lower than Tm?",
         "Lower, usually 3–5 °C below the lower primer's Tm."),
        ("Why does my product vanish at higher annealing temperatures?",
         "Because the primers no longer bind; the temperature is above their Tm in your buffer."),
        ("What is a touchdown PCR?",
         "A program that starts 10 °C above the annealing temperature and steps down, which favours "
         "the specific product early and prevents primer dimers later."),
    ],
    related=[("/biology/oligo-tm-calculator", "Oligo Tm"),
             ("/biology/pcr-master-mix-calculator", "PCR master mix"),
             ("/biology/gc-content-calculator", "GC content")],
    svg=("gauge", {"caption": "Annealing temperature against the primers' melting temperatures."}),
    icon="thermometer",
))

add(Spec(
    name="Oligo Tm (Melting Temperature) Calculator",
    slug="oligo-tm-calculator",
    summary=("Melting temperature is where half the oligo is unpaired, and it decides annealing "
             "temperatures, hybridisation conditions and whether a primer pair will work together. "
             "This calculator offers the simple Wallace rule, the GC-based rule and the nearest-"
             "neighbour model that real protocols use."),
    fields=[
        num("length", "Oligo length", 20, "nt", ""),
        num("gc", "Number of G and C bases", 11, "", ""),
        num("salt", "Monovalent salt", 50, "mM", ""),
        num("tm_salt", "Tm, GC rule with salt correction", "", "°C", "", output=True),
        num("tm_wallace", "Tm, Wallace", "", "°C", "", output=True),
        num("tm_gc", "Tm, GC rule", "", "°C", "", output=True),
        num("gc_pct", "GC content", "", "%", "", output=True),
    ],
    dirs=[
        d("Melting", "gc_pct", "gc/length*100"),
        d("Melting", "tm_wallace", "2*(length-gc)+4*gc"),
        d("Melting", "tm_gc", "64.9+41*(gc-16.4)/length"),
        d("Melting", "tm_salt",
          "64.9+41*(gc-16.4)/length+16.6*log10(salt/1000)"),
    ],
    formula=("Wallace: Tm = 2(A+T) + 4(G+C);  GC rule: Tm = 64.9 + 41(G+C − 16.4)/N;  "
             "salt correction adds 16.6·log₁₀[Na⁺]"),
    symbols=[("A, T, G, C", "base counts", "nt"),
             ("N", "oligo length", "nt"),
             ("[Na⁺]", "monovalent salt concentration", "M")],
    notes=[
        "The Wallace rule is only valid for oligos of 14 nt or shorter; for longer primers it "
        "overestimates Tm badly.",
        "The nearest-neighbour model is the one to trust: it accounts for stacking interactions "
        "between adjacent bases, which is why GC content alone is not enough.",
        "The salt correction is large: going from 50 mM to 1 M Na⁺ adds about 16 °C to Tm.",
        "The value shown here is the GC-based estimate with a salt correction; treat it as a strong "
        "starting point and confirm with a gradient.",
    ],
    mistakes=[
        "Using the Wallace rule for a 25-mer.",
        "Comparing Tm values computed by different methods and expecting them to agree.",
        "Ignoring the magnesium concentration, which raises Tm further.",
    ],
    faq=[
        ("Which Tm method should I use?",
         "Nearest-neighbour for anything you will actually order or anneal; Wallace for quick "
         "estimates of short oligos."),
        ("Does Tm depend on concentration?",
         "Yes — higher oligo concentration raises Tm, which is why 250 nM is quoted as a standard."),
    ],
    related=[("/biology/pcr-annealing-temperature", "Annealing temperature"),
             ("/biology/gc-content-calculator", "GC content"),
             ("/biology/primer-resuspension-working-stock", "Primer resuspension")],
    svg=("gauge", {"caption": "Three models, one oligo, a spread worth knowing about."}),
    icon="thermometer",
))

add(Spec(
    name="GC Content Calculator",
    slug="gc-content-calculator",
    summary=("GC content is the share of guanine and cytosine in a sequence, and it predicts melting "
             "temperature, PCR difficulty, codon bias and even the organism a sequence came from. "
             "This calculator takes counts or a raw sequence and returns GC content, AT content and "
             "the expected Tm."),
    fields=[
        num("g", "Guanine (G)", 220, "", ""),
        num("c", "Cytosine (C)", 180, "", ""),
        num("a", "Adenine (A)", 300, "", ""),
        num("t", "Thymine (T)", 300, "", ""),
        num("gc", "GC content", "", "%", "", output=True),
        num("at", "AT content", "", "%", "", output=True),
        num("length", "Sequence length", "", "nt", "", output=True),
        num("tm", "Estimated Tm (GC rule)", "", "°C", "", output=True),
    ],
    dirs=[
        d("Content", "gc", "(g+c)/(g+c+a+t)*100"),
        d("Content", "at", "(a+t)/(g+c+a+t)*100"),
        d("Content", "length", "g+c+a+t"),
        d("Content", "tm", "64.9+41*((g+c)-16.4)/(g+c+a+t)"),
    ],
    formula="GC content (%) = (G + C) ÷ (A + T + G + C) × 100",
    symbols=[("G, C, A, T", "base counts", "nt"),
             ("GC content", "share of G and C", "%")],
    bands=[("30 – 50%", "AT-rich", "lower Tm; may need additives or a lower annealing temperature"),
           ("50 – 60%", "Typical", "most genomes and most successful primers"),
           ("above 60%", "GC-rich", "secondary structure and hairpins; consider DMSO or betaine")],
    notes=[
        "Human DNA averages about 41% GC; bacterial genomes range from 25% to 75%, and the number is "
        "often used to identify an organism from a genome assembly.",
        "GC-rich templates form secondary structure that blocks polymerase processivity, which is why "
        "they need higher denaturation temperatures or cosolvents.",
        "For primers, aim for 40–60% GC and check that the 3′ end is not a GC clamp of more than "
        "three bases.",
    ],
    mistakes=[
        "Counting Ns or ambiguous bases as AT.",
        "Computing GC content on the coding strand with a counting error introduced by line breaks.",
        "Assuming 50% GC means an average primer — a 30-mer and a 15-mer at 50% have very different "
        "Tms.",
    ],
    faq=[
        ("What is a good GC content for a primer?",
         "40–60%, with a Tm matched to its partner."),
        ("How does GC content affect sequencing?",
         "GC-rich regions sequence poorly because of secondary structure and polymerase stalling."),
    ],
    related=[("/biology/oligo-tm-calculator", "Oligo Tm"),
             ("/biology/pcr-annealing-temperature", "Annealing temperature"),
             ("/biology/dna-molarity-from-mass", "DNA molarity")],
    svg=("bars", {"caption": "Each base as a share of the sequence, GC highlighted."}),
    icon="dna",
))

add(Spec(
    name="Genome Copy Number Calculator",
    slug="genome-copy-number",
    summary=("The genome copy number in a nanogram of DNA depends only on the genome size. The answer "
             "depends only on genome size, and it is the number that sets qPCR standard curves, sequencing "
             "input and the limit of detection. This calculator converts mass to copies for any genome "
             "size."),
    fields=[
        num("mass_ng", "DNA mass", 10, "ng", ""),
        num("genome_mb", "Genome size", 3.2, "Mb", "3 200 Mb for human, 4.6 Mb for E. coli"),
        num("copies", "Genome copies", "", "", "", output=True),
        num("copies_ul", "Copies per µL in 50 µL", "", "copies/µL", "", output=True),
        num("log_copies", "log₁₀ copies", "", "", "", output=True),
        num("mass_per_copy", "Mass of one genome", "", "fg", "", output=True),
    ],
    dirs=[
        d("Copies", "copies", "mass_ng*0.000000001/(genome_mb*1000000*660)/1.66054e-24"),
        d("Copies", "copies_ul", "mass_ng*0.000000001/(genome_mb*1000000*660)/1.66054e-24/50"),
        d("Copies", "log_copies", "log10(mass_ng*0.000000001/(genome_mb*1000000*660)/1.66054e-24)"),
        d("Copies", "mass_per_copy", "genome_mb*1000000*660/602200000000000000000000*1000000000000000"),
    ],
    formula="Copies = mass (g) ÷ (genome length × 660 g/mol) × 6.022 × 10²³",
    symbols=[("mass", "mass of DNA", "ng"),
             ("genome size", "length of one genome", "bp"),
             ("copies", "number of genomes", "—")],
    notes=[
        "A human diploid genome weighs about 6.6 pg; a haploid one 3.3 pg. That is the number to "
        "remember: one cell, one copy.",
        "For qPCR standards, diluting to 10⁶ copies per µL and then serially tenfold gives a clean "
        "seven-point curve.",
        "Long-read sequencing needs far more mass per copy because the molecules are not amplified — "
        "the copy number, not the mass, is what the flow cell sees.",
    ],
    mistakes=[
        "Using genome size in base pairs where the formula expects megabases.",
        "Forgetting that a diploid cell contains two copies per genome equivalent.",
        "Treating mitochondrial or plasmid DNA with the nuclear genome size.",
    ],
    faq=[
        ("How many copies of a genome are in 1 ng of human DNA?",
         "About 303 copies of the 3.2 Gb genome."),
        ("What is the mass of one copy of the E. coli genome?",
         "About 5.0 fg for 4.6 Mb."),
    ],
    related=[("/biology/dna-molarity-from-mass", "DNA molarity"),
             ("/biology/od260-nucleic-acid-concentration", "OD260 concentration"),
             ("/biology/plasmid-copy-number", "Plasmid copy number")],
    svg=("chain", {"caption": "Mass, genome length and Avogadro's number."}),
    icon="dna",
))

add(Spec(
    name="Plasmid Copy Number Calculator",
    slug="plasmid-copy-number",
    summary=("Copy number is how many plasmids each cell carries, and it decides how much a culture "
             "yields and how strongly a gene is expressed. This calculator derives it from a "
             "miniprep yield, the plasmid size and the number of cells harvested."),
    fields=[
        num("yield_ug", "Plasmid yield", 8, "µg", "From a miniprep of known culture volume"),
        num("plasmid_kb", "Plasmid size", 5, "kb", ""),
        num("culture_ml", "Culture volume", 3, "mL", ""),
        num("od", "Culture OD600", 2, "", "At harvest"),
        num("copy_number", "Plasmids per cell", "", "", "", output=True),
        num("cells_total", "Cells harvested", "", "", "", output=True),
        num("plasmid_pmol", "Plasmid recovered", "", "pmol", "", output=True),
    ],
    dirs=[
        d("Copy number", "cells_total", "culture_ml*od*800000000"),
        d("Copy number", "plasmid_pmol", "yield_ug*1000000/(plasmid_kb*1000*660)"),
        d("Copy number", "copy_number",
          "yield_ug*0.000001/(plasmid_kb*1000*660)*602200000000000000000000/(culture_ml*od*800000000)"),
    ],
    formula="Copy number = plasmids recovered ÷ cells harvested",
    symbols=[("yield", "plasmid mass from the prep", "µg"),
             ("plasmid size", "length in kb", "kb"),
             ("cells", "culture volume × OD600 × 8×10⁸", "cells")],
    bands=[("1 – 20", "Low copy", "pBR322-style, stringent replication"),
           ("20 – 100", "Medium copy", "pUC relatives with a weakened origin"),
           ("above 100", "High copy", "pUC19 and pET-style plasmids, relaxed replication")],
    notes=[
        "Culture OD600 × 8 × 10⁸ cells/mL is a working estimate for E. coli; the answer moves with "
        "the strain and the medium, so compare copy numbers measured the same way.",
        "Copy number rises with chloramphenicol amplification in relaxed plasmids and falls with "
        "large inserts, which are a replication burden.",
        "A miniprep yield is not a purity measurement: contaminating genomic DNA and RNA inflate the "
        "apparent copy number.",
    ],
    mistakes=[
        "Forgetting that the harvested culture volume sets the cell number.",
        "Using the insert size instead of the whole plasmid length.",
        "Comparing a maxiprep yield per litre with a miniprep yield per millilitre.",
    ],
    faq=[
        ("What is a normal plasmid copy number?",
         "About 15–20 for pBR322 and 500–700 for pUC-based high-copy plasmids."),
        ("Why is my measured copy number low?",
         "Large inserts, a low-copy origin, or growth at 37 °C to stationary phase, which reduces "
         "plasmid yield per cell."),
    ],
    related=[("/biology/genome-copy-number", "Genome copy number"),
             ("/biology/transformation-efficiency", "Transformation efficiency"),
             ("/biology/dna-molarity-from-mass", "DNA molarity")],
    svg=("bars", {"caption": "Yield per cell decides the copy number class."}),
    icon="dna",
))

add(Spec(
    name="Bacterial Growth Curve Calculator (generation time)",
    slug="bacterial-growth-curve",
    summary=("Two OD readings taken at two times contain everything needed to describe exponential "
             "growth: the specific growth rate, the doubling time and the number of generations. "
             "This calculator extracts them and shows the projected curve."),
    fields=[
        num("od1", "First OD600", 0.1, "", ""),
        num("od2", "Second OD600", 0.8, "", ""),
        num("t1", "First reading time", 0, "h", ""),
        num("t2", "Second reading time", 4, "h", ""),
        num("mu", "Specific growth rate", "", "h⁻¹", "", output=True),
        num("doubling", "Doubling time", "", "min", "", output=True),
        num("generations", "Generations elapsed", "", "", "", output=True),
        num("fold", "Fold increase", "", "×", "", output=True),
    ],
    dirs=[
        d("Growth", "mu", "(log(od2)-log(od1))/(t2-t1)"),
        d("Growth", "doubling", "0.6931471805599453/((log(od2)-log(od1))/(t2-t1))*60"),
        d("Growth", "generations", "(log(od2)-log(od1))/0.6931471805599453"),
        d("Growth", "fold", "od2/od1"),
    ],
    formula="µ = (ln OD₂ − ln OD₁) ÷ (t₂ − t₁);  doubling time = ln2 ÷ µ",
    symbols=[("OD", "optical density in the linear range", "AU"),
             ("t", "time of the reading", "h"),
             ("µ", "specific growth rate", "h⁻¹")],
    bands=[("below 0.05", "Lag", "the culture has not started dividing"),
           ("0.1 – 1.0", "Exponential", "the window the maths assumes"),
           ("above 1.0", "Stationary approach", "OD is no longer linear with cell number")],
    notes=[
        "The formula assumes exponential growth with no lag and no death. Use readings inside the "
        "linear OD range (0.1–1.0), taken during log phase.",
        "µ has units of reciprocal time, so a rate of 0.7 h⁻¹ is a doubling time of about an hour.",
        "Dilute and read again if your second OD is above 1.0: saturation bends the curve and makes "
        "µ look smaller than it is.",
    ],
    mistakes=[
        "Using readings that span the lag phase, which gives a nonsense negative rate.",
        "Mixing OD values from different path lengths or instruments.",
        "Reporting a doubling time without the medium and temperature it was measured in.",
    ],
    faq=[
        ("What is a typical doubling time for E. coli?",
         "About 20 minutes at 37 °C in rich medium; 60 minutes or more in minimal medium."),
        ("Why is my growth rate negative?",
         "The second OD is lower than the first — the culture is dying, or the readings were entered "
         "in the wrong order."),
    ],
    related=[("/biology/specific-growth-rate-from-od", "Specific growth rate from OD"),
             ("/biology/od600-to-cell-density", "OD600 to cell density"),
             ("/biology/cell-doubling-time", "Cell doubling time")],
    svg=("curve", {"caption": "A straight line on a log scale, and the doubling time it implies."}),
    icon="bacteria",
))

add(Spec(
    name="Specific Growth Rate from OD Readings",
    slug="specific-growth-rate-from-od",
    summary=("The specific growth rate µ is the slope of ln(OD) against time, and it is the standard "
             "way to compare growth conditions. This calculator computes it from a series of OD "
             "readings, with the doubling time and the generation count that follow from it."),
    fields=[
        num("od_start", "OD at start", 0.05, "", ""),
        num("od_end", "OD at end", 0.9, "", ""),
        num("hours", "Time between readings", 3, "h", ""),
        num("mu", "Specific growth rate", "", "h⁻¹", "", output=True),
        num("doubling_h", "Doubling time", "", "h", "", output=True),
        num("generations", "Generations", "", "", "", output=True),
        num("cells_end", "Cell density at the end", "", "cells/mL", "", output=True),
    ],
    dirs=[
        d("Rate", "mu", "(log(od_end)-log(od_start))/hours"),
        d("Rate", "doubling_h", "0.6931471805599453/((log(od_end)-log(od_start))/hours)"),
        d("Rate", "generations", "(log(od_end)-log(od_start))/0.6931471805599453"),
        d("Rate", "cells_end", "od_end*800000000"),
    ],
    formula="µ = ln(OD_end ÷ OD_start) ÷ Δt",
    symbols=[("OD", "absorbance at 600 nm", "AU"),
             ("µ", "specific growth rate", "h⁻¹"),
             ("Δt", "time between readings", "h")],
    bands=[("µ above 0.6 h⁻¹", "Fast", "rich medium, optimal temperature"),
           ("µ 0.3 – 0.6 h⁻¹", "Moderate", "typical of minimal medium with a good carbon source"),
           ("µ below 0.3 h⁻¹", "Slow", "stress, a poor carbon source, or a suboptimal temperature")],
    notes=[
        "Doubling time is ln2/µ — 0.693 divided by the rate — not 1/µ. Mixing the two is the most "
        "common error in growth-rate reporting.",
        "Take at least three readings across log phase and fit a line rather than using two points; "
        "two points hide the moment the culture leaves exponential growth.",
        "µ is temperature- and medium-dependent; a Q10-style comparison only makes sense when nothing "
        "else changed.",
    ],
    mistakes=[
        "Using OD values below 0.05, where the blank error dominates.",
        "Fitting a line through lag, log and stationary points together.",
        "Reporting 1/µ as the doubling time.",
    ],
    faq=[
        ("What is the difference between µ and the doubling time?",
         "µ is the rate of exponential increase per unit time; doubling time is the time to double, "
         "ln2/µ."),
        ("Can I use this for mammalian cells?",
         "Yes, provided the readings are in the linear range or replaced by cell counts."),
    ],
    related=[("/biology/bacterial-growth-curve", "Bacterial growth curve"),
             ("/biology/od600-to-cell-density", "OD600 to cell density"),
             ("/biology/cell-doubling-time", "Cell doubling time")],
    svg=("curve", {"caption": "ln(OD) against time: the slope is the growth rate."}),
    icon="bacteria",
))

add(Spec(
    name="Agarose Gel Calculator (gel percentage and loading)",
    slug="agarose-gel-calculator",
    summary=("The agarose percentage decides which fragment sizes resolve, and the number of lanes "
             "decides how much gel and buffer you need. This calculator gives the grams of agarose, "
             "the buffer volume, the loading dye and the ladder volume for your gel."),
    fields=[
        num("percent", "Agarose percentage", 1, "%", "1% for 0.5–10 kb"),
        num("volume", "Gel volume", 100, "mL", "Depends on the tray"),
        num("lanes", "Number of lanes", 16, "", ""),
        num("sample_vol", "Sample volume per lane", 10, "µL", ""),
        num("dye_x", "Loading dye stock", 6, "×", "6× is standard"),
        num("agarose_g", "Agarose to weigh out", "", "g", "", output=True),
        num("dye_vol", "Loading dye per sample", "", "µL", "", output=True),
        num("buffer_vol", "Running buffer", "", "mL", "", output=True),
        num("total_sample", "Total volume needed", "", "µL", "", output=True),
    ],
    dirs=[
        d("Gel", "agarose_g", "volume*percent/100"),
        d("Gel", "dye_vol", "sample_vol/dye_x"),
        d("Gel", "buffer_vol", "volume*5"),
        d("Gel", "total_sample", "lanes*sample_vol"),
    ],
    formula="Agarose (g) = % × gel volume (mL) ÷ 100;  dye volume = sample volume ÷ dye fold",
    symbols=[("percent", "agarose concentration", "% w/v"),
             ("volume", "gel volume", "mL"),
             ("agarose", "mass to weigh", "g")],
    bands=[("0.5 – 0.8%", "Large fragments", "1–20 kb; resolves genomic digests"),
           ("1 – 1.5%", "Most PCR products", "200 bp – 5 kb"),
           ("2 – 3%", "Small fragments", "20–200 bp; needs high-resolution agarose")],
    notes=[
        "Migration is roughly logarithmic in size: a 1% gel resolves 0.5–10 kb well, and every "
        "increase in percentage shifts the useful window downward.",
        "Use the same buffer for the gel and the tank. TAE gives better resolution on large "
        "fragments, TBE better buffering capacity for long runs.",
        "Let the gel cool to about 55 °C before pouring — hotter warps the tray, cooler sets it "
        "before you pour.",
    ],
    mistakes=[
        "Weighing agarose into a wet flask and forgetting the water already there.",
        "Overloading lanes so the bands merge into a smear.",
        "Running at a voltage that heats the gel enough to distort the bands.",
    ],
    faq=[
        ("What percentage gel do I need?",
         "1% for most PCR products, 2% for fragments under 300 bp, 0.7% for genomic digests."),
        ("How much dye do I add to a 10 µL sample with 6× dye?",
         "About 1.7 µL, or adjust the sample so the final volume is convenient."),
    ],
    related=[("/biology/restriction-digest-setup", "Restriction digest"),
             ("/biology/dsdna-ug-to-pmol-converter", "dsDNA µg to pmol")],
    svg=("bars", {"caption": "Agarose, buffer, dye and sample for one gel."}),
    icon="gel",
))

add(Spec(
    name="Buffer Preparation Calculator",
    slug="buffer-preparation-calculator",
    summary=("A buffer is a weak acid and its conjugate base, and the ratio between them sets the pH. The "
             "Henderson–Hasselbalch equation turns a target pH into a ratio, and this calculator turns the "
             "ratio into the volumes or masses you pipette."),
    fields=[
        sel("acid", "Buffer system", [("Acetate (pKa 4.76)", "4.76"), ("MES (pKa 6.10)", "6.10"),
                                      ("Phosphate (pKa 7.20)", "7.20"), ("HEPES (pKa 7.55)", "7.55"),
                                      ("Tris (pKa 8.06 at 25 °C)", "8.06"),
                                      ("Bicarbonate (pKa 6.35)", "6.35")], "7.55"),
        chk("custom", "Use my own pKa instead (temperature-corrected, another buffer)", False),
        num("pka", "My pKa", 7.2, "", "Only used when the box above is ticked"),
        num("ph", "Target pH", 7.4, "", ""),
        num("conc", "Buffer concentration", 0.05, "M", ""),
        num("volume", "Final volume", 1, "L", ""),
        num("ratio", "Base : acid ratio", "", ":1", "", output=True),
        num("base_frac", "Fraction as base", "", "%", "", output=True),
        num("pka_used", "pKa used", "", "", "Working pH range starts here minus 1", output=True),
        num("headroom", "Lower end of the useful pH range", "", "", "", output=True),
        num("total_mol", "Buffer substance in the batch", "", "mmol", "", output=True),
        num("base_mol", "Basic form needed", "", "mmol", "", output=True),
        num("acid_mol", "Acidic form needed", "", "mmol", "", output=True),
    ],
    dirs=[
        d("Buffer", "pka_used", "(1-custom)*acid+custom*pka"),
        d("Buffer", "ratio", "pow(10,ph-((1-custom)*acid+custom*pka))"),
        d("Buffer", "base_frac",
          "pow(10,ph-((1-custom)*acid+custom*pka))"
          "/(1+pow(10,ph-((1-custom)*acid+custom*pka)))*100"),
        d("Buffer", "headroom", "((1-custom)*acid+custom*pka)-1"),
        d("Buffer", "total_mol", "conc*volume*1000"),
        d("Buffer", "base_mol",
          "conc*volume*1000*pow(10,ph-((1-custom)*acid+custom*pka))"
          "/(1+pow(10,ph-((1-custom)*acid+custom*pka)))"),
        d("Buffer", "acid_mol",
          "conc*volume*1000/(1+pow(10,ph-((1-custom)*acid+custom*pka)))"),
    ],
    formula="pH = pKa + log₁₀([A⁻] ÷ [HA]),  so  [A⁻]/[HA] = 10^(pH − pKa)",
    symbols=[("pKa", "acid dissociation constant of the buffer", "—"),
             ("pH", "target pH", "—"),
             ("ratio", "base to acid", ":1")],
    notes=[
        "A buffer works within about one pH unit of its pKa; outside that the ratio runs away from "
        "1:1 and the buffering capacity collapses.",
        "Tris has a large temperature coefficient: a solution at pH 8.06 at 25 °C reads about 7.7 at "
        "4 °C, so pH it at the temperature you will use it.",
        "Prepare a concentrated stock and dilute — weighing 0.05 mol into a litre is imprecise, and "
        "the pH will need adjusting anyway.",
        "Phosphate buffers precipitate divalent cations; if your assay needs Mg²⁺, use HEPES or Tris.",
    ],
    mistakes=[
        "Choosing a buffer whose pKa is two units from the target pH.",
        "Adjusting pH with strong acid without noting the final volume, which changes concentration.",
        "Assuming pH paper is precise enough for an enzyme assay.",
    ],
    faq=[
        ("Which buffer should I use for pH 7.4?",
         "Phosphate or HEPES — both have pKa values within half a unit of 7.4. HEPES is preferred "
         "when metal ions are involved."),
        ("Does temperature matter?",
         "For Tris, strongly. For phosphate and HEPES, much less."),
    ],
    related=[("/chemistry/ph", "pH calculator"),
             ("/chemistry/molarity", "Molarity"),
             ("/biology/osmolarity-osmotic-pressure", "Osmolarity and osmotic pressure")],
    svg=("gauge", {"caption": "The base-to-acid ratio that produces the target pH."}),
    icon="flask",
))

add(Spec(
    name="Microscope Magnification Calculator",
    slug="microscope-magnification",
    summary=("Total magnification is the objective times the eyepiece, but what people usually need "
             "is the reverse: how big the object actually is. This calculator converts a measured "
             "image size into a real size, and a real size into the field of view."),
    fields=[
        num("objective", "Objective magnification", 40, "×", ""),
        num("eyepiece", "Eyepiece magnification", 10, "×", ""),
        num("field_number", "Field number", 20, "", "Eyepiece field number, usually 18–22"),
        num("measured", "Measured image size", 25, "mm", "On the printed or on-screen image"),
        num("total", "Total magnification", "", "×", "", output=True),
        num("fov", "Field of view", "", "mm", "", output=True),
        num("actual", "Actual specimen size", "", "µm", "", output=True),
    ],
    dirs=[
        d("Magnification", "total", "objective*eyepiece"),
        d("Magnification", "fov", "field_number/objective"),
        d("Magnification", "actual", "measured/(objective*eyepiece)*1000"),
    ],
    formula="Total magnification = objective × eyepiece;  field of view = field number ÷ objective",
    symbols=[("objective", "objective lens magnification", "×"),
             ("eyepiece", "ocular magnification", "×"),
             ("field number", "the eyepiece's field-of-view diameter in mm", "mm")],
    notes=[
        "Resolution, not magnification, is the limit: 0.2 µm is about the best a light microscope can "
        "do, and empty magnification beyond about 1000× adds nothing.",
        "Use a stage micrometer to calibrate a camera or an eyepiece graticule — the printed "
        "magnification of a screen image is almost never the optical one.",
        "Field of view shrinks in proportion to the objective magnification: a 40× objective on a "
        "20 mm field number sees 0.5 mm.",
    ],
    mistakes=[
        "Multiplying by the camera's digital zoom and calling it magnification.",
        "Measuring an image printed at a different size than assumed.",
        "Confusing field of view (diameter) with field area.",
    ],
    faq=[
        ("What is the magnification of a 40× objective with a 10× eyepiece?",
         "400×."),
        ("How do I measure a cell from a photograph?",
         "Calibrate with a stage micrometer, then measure pixels and convert; the optical "
         "magnification alone does not tell you the scale of a resized image."),
    ],
    related=[("/biology/microscope-magnification", "Microscope magnification"),
             ("/biology/mitotic-index", "Mitotic index")],
    svg=("chain", {"caption": "Objective, eyepiece, and the size of the real object."}),
    icon="microscope",
))
