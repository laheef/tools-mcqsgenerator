"""Batch L — bench arithmetic: converters, gel loading, microscopy, genetics.

Nine numeric calculators that a molecular biology bench asks for every week.
They are ordinary `lib.py` specs. Where a page offers a pair of equivalent
quantities (mass and molar amount, pmol/µL and µg/mL) both boxes are writable, so
you can start from whichever number you already have and the solver fills the
other.

Nothing here is script-driven: no sequence is read, only numbers, so the
solver's own arithmetic is the whole implementation and the same formulas are
what the worked example and the article quote.
"""

from lib import Spec, num, sel, chk, txt, d

SPECS: list[Spec] = []


def add(s: Spec) -> None:
    SPECS.append(s)


# ------------------------------------------- 1. linear DNA: µg to pmol of ends
add(Spec(
    name="Linear DNA µg to pmol of Ends Converter",
    slug="linear-dna-ends-ug-pmol",
    summary=("A linear DNA molecule has two ends, and many reactions care about the number of ends "
             "rather than the number of molecules — ligation, biotin labelling, exonuclease "
             "chewing. One microgram of a 1 kb fragment is 1.5 pmol of molecules but 3 pmol of "
             "ends, and this calculator gives both without the arithmetic."),
    fields=[
        num("length", "Length", 1000, "bp", ""),
        num("mass_ug", "Mass", 1, "µg", ""),
        num("pmol_ends", "Ends", "", "pmol", "Twice the molar amount", output=True),
        num("pmol", "Molecules", "", "pmol", "Type either the mass or the molar amount"),
        num("ends_per_ug", "Ends per microgram", "", "pmol/µg", "", output=True),
        num("molecules", "Molecules", "", "", "", output=True),
    ],
    dirs=[
        d("Ends", "pmol", "mass_ug*1000000/(660*length)"),
        d("Ends", "mass_ug", "pmol*660*length/1000000"),
        d("Ends", "pmol_ends", "2*pmol"),
        d("Ends", "ends_per_ug", "2*1000000/(660*length)"),
        d("Ends", "molecules", "pmol*602214076000"),
    ],
    formula=("pmol of molecules = µg × 10⁶ ÷ (660 × length).  "
             "pmol of ends = 2 × pmol of molecules.  Ends per µg = 2 × 10⁶ ÷ (660 × length)"),
    symbols=[("pmol", "picomole, 10⁻¹² mol", "mol"),
             ("end", "a 5′ or 3′ terminus of a linear molecule", "—"),
             ("660", "g/mol per base pair of double-stranded DNA", "g/mol")],
    bands=[("under 200 bp", "Many ends per µg", "0.5 µg of a 100 bp fragment carries 15 pmol of ends"),
           ("200 – 3 000 bp", "Typical cloning fragment", "1–7 pmol of ends per microgram"),
           ("over 10 000 bp", "Few ends", "a microgram carries well under 1 pmol of ends")],
    notes=[
        "Ligations are driven by the concentration of ends, not the mass of DNA: two fragments of "
        "different lengths at equal mass do not have equal numbers of ends.",
        "A circular plasmid has no ends, which is why a dephosphorylated vector is measured in "
        "molecules and an insert in ends.",
        "Below about 1 nM of ends, the two termini rarely meet and the ligation stalls however much "
        "enzyme you add.",
    ],
    mistakes=[
        "Using the molecules figure where the ends figure belongs — the answer is out by exactly 2.",
        "Applying this to a circular molecule, which has no ends at all.",
        "Forgetting that the mass must be the whole molecule, not the insert length.",
    ],
    faq=[
        ("Why do ends matter more than molecules?", "Every ligation event joins two ends, so the "
         "rate depends on how often a 5′ and a 3′ terminus meet."),
        ("How many pmol of ends are in 1 µg of a 500 bp fragment?", "6.06 pmol — 3.03 pmol of "
         "molecules, doubled."),
        ("Does a plasmid have ends?", "No. A closed circle contributes no ends, so it cannot ligate "
         "to anything without being cut first."),
    ],
    related=[("/biology/dsdna-ug-to-pmol", "dsDNA µg to pmol"),
             ("/biology/ligation-calculator", "Ligation calculator"),
             ("/biology/oligo-converter", "Oligo converter")],
    svg=("bars", {"caption": "pmol of ends in 1 µg of linear DNA",
                  "series": [("100 bp", 30.3), ("500 bp", 6.06), ("1 kb", 3.03), ("3 kb", 1.01)]}),
    icon="flask",
    keywords=["pmol of ends", "linear DNA", "ligation", "convert micrograms"],
    steps=[
        "Enter the length of the fragment in base pairs and the mass in micrograms.",
        "The molar amount and the number of ends are both reported.",
        "If you know how many pmol of ends you need, type it and the mass is solved instead.",
    ],
))


# ------------------------------------------------- 2. mass ↔ molarity
add(Spec(
    name="Mass to Molarity Converter",
    slug="mass-molarity-conversion",
    summary=("Mass to molarity conversion needs one number: the molecular weight of the substance. It is "
             "the calculation behind every stock solution: 1 mg of a 500 g/mol compound in 1 mL is 2 mM, "
             "and the same arithmetic converts the other way when a protocol asks for a molar "
             "concentration and the balance gives you mass."),
    fields=[
        num("mw", "Molecular weight", 500, "g/mol", "Also called molar mass or relative molecular mass"),
        num("mass_mg", "Mass", 1, "mg", ""),
        num("volume_ml", "Volume", 1, "mL", ""),
        num("conc_mm", "Concentration", "", "mM", "", output=True),
        num("conc_mg_ml", "Concentration", "", "mg/mL", "", output=True),
        num("moles_umol", "Amount of substance", "", "µmol", "", output=True),
    ],
    dirs=[
        d("Convert", "moles_umol", "mass_mg*1000/mw"),
        d("Convert", "mass_mg", "moles_umol*mw/1000"),
        d("Convert", "conc_mm", "moles_umol/volume_ml"),
        d("Convert", "conc_mg_ml", "mass_mg/volume_ml"),
    ],
    formula=("µmol = mg × 1000 ÷ MW.  mM = µmol ÷ volume (mL).  mg/mL = mg ÷ volume (mL)"),
    symbols=[("MW", "molecular weight in g/mol", "g/mol"),
             ("mM", "millimole per litre, the same as µmol per mL", "mol/L"),
             ("µmol", "micromole, 10⁻⁶ mol", "mol")],
    bands=[("1 – 100 mM", "Typical stock", "dissolves easily and pipettes accurately"),
           ("100 mM – 1 M", "Concentrated stock", "check solubility before making it up"),
           ("under 1 mM", "Working dilution", "easy to lose to adsorption on plastic")],
    notes=[
        "A millimolar solution contains one micromole per millilitre, which is why 1 mg of a "
        "500 g/mol compound in 1 mL is 2 mM — no extra factor of 1000 is needed.",
        "Molecular weight must include the salt form. A drug as a hydrochloride salt weighs more "
        "than its free base, and dosing errors often come from mixing the two.",
        "Water of crystallisation counts too: CuSO₄·5H₂O is 249.7 g/mol, not 159.6.",
    ],
    mistakes=[
        "Using the free-base molecular weight for a salt, which over-concentrates the solution by "
        "up to 20%.",
        "Adding solvent to the final volume instead of dissolving and then making up to volume.",
        "Confusing mM with µmol/mL — they are numerically the same, which is why the two are easily "
        "mixed up in a protocol.",
    ],
    faq=[
        ("How do I make a 10 mM stock of a 300 g/mol compound?", "Dissolve 3 mg in 1 mL: 3 mg ÷ "
         "300 g/mol = 10 µmol, and 10 µmol/mL is 10 mM."),
        ("Does the salt form matter?", "Yes — always use the molecular weight of the exact form in "
         "the bottle, salt and hydration included."),
        ("What is the difference between molarity and molality?", "Molarity is per litre of "
         "solution, molality per kilogram of solvent; they differ by a few percent in water."),
    ],
    related=[("/chemistry/molarity", "Molarity"),
             ("/chemistry/molar-mass", "Molar mass"),
             ("/biology/dna-molarity-calculator", "DNA molarity")],
    svg=("bars", {"caption": "mM from 1 mg in 1 mL, by molecular weight",
                  "series": [("100 g/mol", 10), ("500 g/mol", 2), ("1 000 g/mol", 1),
                             ("5 000 g/mol", 0.2)]}),
    icon="flask",
    keywords=["mass to molarity", "stock solution", "molecular weight", "mM"],
    steps=[
        "Enter the molecular weight of the exact salt form you are weighing.",
        "Enter the mass in milligrams and the volume it is dissolved in.",
        "Read the concentration in mM and mg/mL, or type a target concentration to solve the mass.",
    ],
))


# ------------------------------------------------------- 3. oligo converter
add(Spec(
    name="Oligo pmol/µL to µg/mL Converter",
    slug="oligo-converter",
    summary=("An oligo arrives from the synthesiser in nanomoles of dry powder and is used in micromolar "
             "stocks. This converter moves between pmol/µL, µg/mL and µM for a single-stranded oligo of "
             "known length, so a resuspended primer can be diluted correctly the first time."),
    fields=[
        num("length", "Oligo length", 20, "nt", ""),
        num("pmol_ul", "Concentration", 100, "pmol/µL", "A 100 µM stock is 100 pmol/µL"),
        num("ug_ml", "Concentration", "", "µg/mL", "Either this or pmol/µL can be typed"),
        num("um", "Concentration", "", "µM", "", output=True),
        num("nmol_total", "Amount in the tube", "", "nmol", "Fill the volume to get the total", output=True),
        num("water_ul", "Water to add for a 100 µM stock", "", "µL", "From the nmol on the tube label", output=True),
        num("tube_nmol", "Oligo amount on the label", 25, "nmol", "Normally printed on the synthesis sheet"),
    ],
    dirs=[
        # 330 g/mol per nucleotide is the standard single-strand constant
        d("Convert", "um", "pmol_ul"),
        d("Convert", "ug_ml", "pmol_ul*330*length/1000"),
        d("Convert", "pmol_ul", "ug_ml*1000/(330*length)"),
        d("Convert", "nmol_total", "pmol_ul/1000*1"),
        d("Convert", "water_ul", "tube_nmol*10"),
    ],
    formula=("µg/mL = pmol/µL × 0.33 × length.  µM = pmol/µL.  "
             "Water for a 100 µM stock (µL) = nmol on the label × 10"),
    symbols=[("330", "g/mol per nucleotide of single-stranded DNA", "g/mol"),
             ("pmol/µL", "the same number as µM", "mol/L"),
             ("nt", "nucleotide", "—")],
    bands=[("100 µM", "Standard stock", "dilute 1:10 into a PCR for a 10 µM working stock"),
           ("10 µM", "Working stock", "1 µL in a 25 µL reaction is 0.4 µM"),
           ("under 1 µM", "Too dilute to freeze", "aliquot at 10 µM or above")],
    notes=[
        "pmol/µL and µM are the same number: 1 pmol/µL is 1 µmol/L. Half of all primer-dilution "
        "mistakes come from treating them as different.",
        "A primer arrives as a known number of nanomoles. Adding 10 µL of water per nanomole gives "
        "exactly a 100 µM stock, whatever the sequence.",
        "The 330 g/mol per nucleotide constant is an average; a GC-rich 20-mer is a few percent "
        "heavier, which matters only for quantitative work.",
    ],
    mistakes=[
        "Adding a round number of microlitres (say 200 µL) instead of nmol × 10, which gives an "
        "unknown concentration.",
        "Freezing and thawing a 10 µM stock repeatedly — keep 100 µM aliquots and dilute fresh.",
        "Using the double-stranded 660 constant for a primer, which halves the answer.",
    ],
    faq=[
        ("How much water do I add to a 25 nmol primer?", "250 µL for a 100 µM stock — 10 µL per "
         "nanomole."),
        ("Is pmol/µL the same as µM?", "Yes. 1 pmol/µL = 1 µmol/L = 1 µM."),
        ("What working concentration should I use?", "10 µM for routine PCR; 100 µM stocks keep "
         "better at −20 °C."),
    ],
    related=[("/biology/pcr-primer-stats", "PCR primer stats"),
             ("/biology/primer-dimer-checker", "Primer dimer checker"),
             ("/biology/dna-molarity-calculator", "DNA molarity")],
    svg=("bars", {"caption": "µg/mL for a 100 µM oligo, by length",
                  "series": [("15 nt", 495), ("20 nt", 660), ("25 nt", 825), ("30 nt", 990)]}),
    icon="flask",
    keywords=["oligo concentration", "pmol per microlitre", "primer dilution", "micromolar"],
    steps=[
        "Enter the primer length and the concentration you have or want.",
        "The other units are filled in — pmol/µL, µM and µg/mL are the same quantity expressed three ways.",
        "For a fresh tube, enter the nanomoles printed on the label to get the water volume for a "
        "100 µM stock.",
    ],
))


# --------------------------------------------- 4. restriction reaction setup
add(Spec(
    name="Restriction Digest Recipe",
    meta_title="Restriction Digest Recipe — Enzyme Limit",
    slug="restriction-reaction-setup",
    summary=("Work out how much enzyme, buffer and water go into a digest. The rule that matters is "
             "that the enzyme must never be more than a tenth of the reaction volume, because "
             "restriction enzymes are stored in glycerol and too much of it inhibits the digest."),
    fields=[
        num("dna_ug", "DNA to digest", 1, "µg", ""),
        num("dna_conc", "DNA concentration", 100, "ng/µL", ""),
        num("volume_ul", "Reaction volume", 20, "µL", ""),
        num("units_per_ug", "Units per microgram", 10, "U/µg", "5–10 U/µg is routine for a plasmid"),
        num("enzyme_conc", "Enzyme stock", 20000, "U/mL", "Most enzymes are supplied at 20 000 U/mL"),
        num("dna_ul", "DNA volume", "", "µL", "", output=True),
        num("units", "Enzyme units needed", "", "U", "", output=True),
        num("enzyme_ul", "Enzyme volume", "", "µL", "Must stay under 10% of the reaction", output=True),
        num("buffer_ul", "10× buffer", "", "µL", "One tenth of the reaction", output=True),
        num("water_ul", "Water", "", "µL", "Makes up the rest", output=True),
        num("glycerol_pct", "Glycerol in the reaction", "", "%", "Above 5% the enzyme starts to starve", output=True),
    ],
    dirs=[
        d("Setup", "dna_ul", "dna_ug*1000/dna_conc"),
        d("Setup", "units", "dna_ug*units_per_ug"),
        d("Setup", "enzyme_ul", "units/(enzyme_conc/1000)"),
        d("Setup", "buffer_ul", "volume_ul/10"),
        d("Setup", "water_ul", "volume_ul-dna_ul-enzyme_ul-volume_ul/10"),
        d("Setup", "glycerol_pct", "enzyme_ul/volume_ul*100"),
    ],
    formula=("DNA volume (µL) = µg × 1000 ÷ ng/µL.  Units = µg × U/µg.  "
             "Enzyme volume = units ÷ (U/mL ÷ 1000).  Buffer = 1/10 of the reaction"),
    symbols=[("U", "one unit digests 1 µg of substrate in one hour", "U"),
             ("glycerol", "the storage solvent of the enzyme, an inhibitor above 5%", "%"),
             ("10×", "ten-times concentrated buffer, diluted to 1× in the reaction", "—")],
    bands=[("glycerol under 5%", "Safe", "the enzyme works at full speed"),
           ("glycerol 5 – 10%", "Marginal", "star activity and incomplete digestion appear"),
           ("glycerol over 10%", "Inhibited", "dilute the DNA first rather than adding more enzyme")],
    notes=[
        "Adding more enzyme is the usual reaction to an incomplete digest, and it is usually wrong: "
        "it adds glycerol, which inhibits the enzyme and can relax its specificity.",
        "One unit is defined against a specific substrate in one hour. A PCR product with a blunt "
        "end or a plasmid with a methylation pattern may need several times the nominal amount.",
        "Keep the reaction at 1× buffer. A 10× buffer diluted wrongly is a common cause of a digest "
        "that simply does not work.",
    ],
    mistakes=[
        "Adding 2 µL of enzyme to a 20 µL reaction, which is 10% glycerol before the DNA is counted.",
        "Forgetting to mix gently — enzyme sticks to the tube wall above the liquid line.",
        "Incubating for 15 minutes and calling an incomplete digest a failure of the enzyme.",
    ],
    faq=[
        ("Why must the enzyme be under a tenth of the volume?", "Because the enzyme is stored in "
         "50% glycerol, and glycerol above about 5% of the reaction inhibits cutting and can change "
         "specificity."),
        ("How many units should I use?", "5–10 U per microgram of plasmid for an hour; more for "
         "genomic DNA or a blunt-ended PCR product."),
        ("Can I digest in a smaller volume?", "Yes, and it usually works better — a smaller volume "
         "means a higher concentration of both ends."),
    ],
    related=[("/biology/restriction-digest", "Restriction digest"),
             ("/biology/dna-molarity-calculator", "DNA molarity"),
             ("/chemistry/dilution-factor", "Dilution factor")],
    svg=("bars", {"caption": "Glycerol carried in by the enzyme, by enzyme volume in a 20 µL digest",
                  "series": [("0.5 µL", 1.25), ("1 µL", 2.5), ("2 µL", 5), ("4 µL", 10)]}),
    icon="flask",
    keywords=["restriction digest setup", "enzyme units", "glycerol", "reaction volume"],
    steps=[
        "Enter how much DNA you want to cut and its concentration.",
        "Set the final reaction volume and the units per microgram you intend to use.",
        "Read the volumes of DNA, enzyme, buffer and water — and the glycerol percentage, which "
        "must stay under 5%.",
    ],
))


# --------------------------------------------------------- 5. SDS-PAGE gel
add(Spec(
    name="SDS-PAGE Gel Calculator",
    slug="sds-page-gel",
    summary=("The acrylamide percentage decides which protein sizes a gel separates. Total acrylamide (%T) "
             "and the crosslinker ratio (%C) set the pore size, and a gel outside the right range runs "
             "everything into one band at the top or into the dye front."),
    fields=[
        num("protein_kda", "Protein of interest", 50, "kDa", ""),
        num("acrylamide_pct", "Acrylamide in the gel", 10, "%T", "10% separates 20–150 kDa"),
        num("bis_pct", "Crosslinker in the gel", 2.6, "%C", "2.6% is the usual ratio"),
        num("total_ml", "Gel volume to pour", 10, "mL", "Two mini gels are about 10 mL"),
        num("acrylamide_ml", "30% acrylamide stock", "", "mL", "", output=True),
        num("bis_ml", "2% bis-acrylamide stock", "", "mL", "", output=True),
        num("water_ml", "Water", "", "mL", "", output=True),
        num("best_pct", "Best acrylamide percentage", "", "%T", "For the protein you entered", output=True),
        num("separation", "Range this gel resolves", "", "kDa", "", output=True),
    ],
    dirs=[
        d("Gel", "acrylamide_ml", "acrylamide_pct*total_ml/30"),
        d("Gel", "water_ml",
          "total_ml-acrylamide_pct*total_ml/30-bis_pct*total_ml/2-total_ml/10"),
        d("Gel", "bis_ml", "bis_pct*total_ml/2"),
        # the empirical rule of thumb: 10% gel separates roughly 20-150 kDa, and
        # the useful upper limit scales inversely with the percentage
        d("Gel", "best_pct", "150/protein_kda*5"),
        d("Gel", "separation", "1500/acrylamide_pct"),
    ],
    formula=("%T = (acrylamide + bis) ÷ total volume × 100.  %C = bis ÷ (acrylamide + bis) × 100.  "
             "A gel of %T resolves proteins up to roughly 1 500 ÷ %T kDa"),
    symbols=[("%T", "total acrylamide concentration", "%"),
             ("%C", "crosslinker as a share of the total acrylamide", "%"),
             ("kDa", "kilodalton", "—")],
    bands=[("7.5 %", "Large proteins", "50–500 kDa, good for antibodies"),
           ("10 %", "The default", "20–150 kDa, which covers most proteins"),
           ("12 – 15 %", "Small proteins", "10–50 kDa, peptides and growth factors"),
           ("gradient 4–20%", "Wide range", "one gel for a whole lysate")],
    notes=[
        "Pore size falls as %T rises, so a higher percentage resolves smaller proteins and a lower "
        "percentage lets large ones enter the gel at all.",
        "%C matters as much as %T: at 2.6% crosslinking the pores are at their tightest for a given "
        "acrylamide concentration, which is why nearly every recipe uses it.",
        "A protein that runs at the dye front is too small for the gel; one that stays at the top is "
        "too large. Neither is a loading problem.",
    ],
    mistakes=[
        "Pouring a 15% gel for a 200 kDa protein, which never enters the separating layer.",
        "Mixing 30% acrylamide with the crosslinker already in it and then adding more bis.",
        "Forgetting that the running buffer pH, not the acrylamide, sets the stacking.",
    ],
    faq=[
        ("What percentage gel do I need for a 50 kDa protein?", "10% — it resolves 20–150 kDa and "
         "puts a 50 kDa band comfortably in the middle."),
        ("What is %C?", "The crosslinker (bis-acrylamide) as a percentage of total acrylamide; 2.6% "
         "gives the smallest pores for a given %T."),
        ("Why is my protein at the dye front?", "It is smaller than the gel can resolve — lower the "
         "acrylamide percentage or use a gradient gel."),
    ],
    related=[("/biology/western-blot-loading", "Western blot loading"),
             ("/biology/protein-isoelectric-point", "Protein isoelectric point"),
             ("/biology/amino-acid-composition", "Amino acid composition")],
    svg=("bars", {"caption": "Acrylamide percentage and the proteins it resolves",
                  "series": [("7.5 %", 500), ("10 %", 150), ("12 %", 80), ("15 %", 40)]}),
    icon="protein",
    keywords=["SDS-PAGE", "acrylamide percentage", "gel recipe", "protein separation"],
    steps=[
        "Enter the size of your protein in kDa to see which percentage suits it.",
        "Set the gel volume you need (about 10 mL for two mini gels).",
        "The volumes of acrylamide, bis-acrylamide and water are given for the stocks you have.",
    ],
))


# ---------------------------------------------------- 6. western blot loading
add(Spec(
    name="Western Blot Protein Loading Calculator",
    slug="western-blot-loading",
    summary=("How much lysate to load per lane, and how much of it is your protein of interest. It "
             "turns a protein concentration in mg/mL into the microlitres for 20 µg per lane, works "
             "out how many cells that represents, and checks that the band will be inside the "
             "linear range of the detector."),
    fields=[
        num("conc_mg_ml", "Lysate concentration", 2, "mg/mL", "From a BCA or Bradford assay"),
        num("per_lane_ug", "Protein per lane", 20, "µg", "20–30 µg for a whole lysate"),
        num("lanes", "Number of lanes", 10, "", ""),
        num("sample_ul", "Lysate volume per lane", "", "µL", "", output=True),
        num("total_ug", "Protein needed in total", "", "µg", "Includes the spare lanes for the ladder", output=True),
        num("total_ul", "Lysate needed in total", "", "µL", "", output=True),
        num("loading_ug_ul", "Final loading concentration", "", "µg/µL", "After adding sample buffer", output=True),
        num("target_pct", "Share that is your target", 0.01, "of total", "0.01 means 1% of the lysate"),
        num("target_ng", "Target protein per lane", "", "ng", "", output=True),
    ],
    dirs=[
        d("Loading", "sample_ul", "per_lane_ug/conc_mg_ml"),
        d("Loading", "total_ug", "per_lane_ug*lanes"),
        d("Loading", "total_ul", "total_ug/conc_mg_ml"),
        d("Loading", "loading_ug_ul", "per_lane_ug/(sample_ul*1.25)"),
        d("Loading", "target_ng", "per_lane_ug*target_pct*1000"),
    ],
    formula=("Lysate per lane (µL) = protein per lane (µg) ÷ concentration (mg/mL).  "
             "Target mass = total protein × fraction that is the target"),
    symbols=[("mg/mL", "protein concentration of the lysate", "g/L"),
             ("µg/lane", "total protein loaded in one well", "µg"),
             ("target", "the fraction of the lysate that is the protein you are blotting", "—")],
    bands=[("10 – 30 µg/lane", "Whole lysate", "enough to see a moderately expressed protein"),
           ("1 – 5 µg/lane", "Immunoprecipitation", "a purified or enriched sample"),
           ("under 1 µg/lane", "Too little", "the signal disappears into the background")],
    notes=[
        "Loading equal total protein per lane is what makes a blot quantitative. Measure every "
        "sample in the same assay, on the same plate, at the same time.",
        "A 1 mL lysate at 2 mg/mL gives 2 mg of protein — enough for 100 lanes at 20 µg, which is "
        "why a single mini-prep covers a whole experiment.",
        "Overloading saturates the detector: bands stop being proportional above about 40 µg of a "
        "complex lysate on a mini gel.",
    ],
    mistakes=[
        "Loading equal volume instead of equal protein, which makes a loading control meaningless.",
        "Boiling a membrane protein for ten minutes, which aggregates it at the top of the gel.",
        "Comparing band intensities from a blot that was stripped and reprobed twice.",
    ],
    faq=[
        ("How much protein should I load?", "20–30 µg of a whole lysate per lane on a mini gel; less "
         "for a purified sample."),
        ("How do I load equal amounts?", "Divide the protein per lane by each sample's concentration; "
         "the volumes will differ and that is correct."),
        ("How many cells is 20 µg of lysate?", "Roughly 200 000 cells, since a mammalian cell "
         "contains about 100 pg of protein."),
    ],
    related=[("/biology/sds-page-gel", "SDS-PAGE gel"),
             ("/biology/protein-isoelectric-point", "Protein isoelectric point"),
             ("/biology/bradford-assay-calculator", "Bradford assay")],
    svg=("bars", {"caption": "Lysate volume per lane from a 2 mg/mL stock",
                  "series": [("10 µg", 5), ("20 µg", 10), ("30 µg", 15), ("40 µg", 20)]}),
    icon="protein",
    keywords=["western blot", "protein loading", "lysate", "µg per lane"],
    steps=[
        "Enter the concentration of each lysate from the protein assay.",
        "Set the protein you want per lane and how many lanes you will run.",
        "Read the volume to pipette, the total lysate needed and the mass of your target protein.",
    ],
))


# -------------------------------------------------- 7. microscope field of view
add(Spec(
    name="Microscope Field of View Calculator",
    slug="microscope-field-of-view",
    summary=("The field of view is how much of the specimen you see through the eyepiece: the "
             "eyepiece field number divided by the objective magnification. It decides how many "
             "cells fit in one frame, which is the first number you need to turn a count into a "
             "concentration."),
    fields=[
        num("field_number", "Eyepiece field number", 20, "mm", "Usually printed on the eyepiece, 18–26"),
        num("magnification", "Objective magnification", 40, "×", "4, 10, 40 or 100"),
        num("fov_mm", "Field of view", "", "mm", "", output=True),
        num("fov_um", "Field of view", "", "µm", "", output=True),
        num("area_mm2", "Area of the field", "", "mm²", "", output=True),
        num("cells_seen", "Cells counted in the field", 50, "", ""),
        num("density", "Cell density", "", "cells/mm²", "", output=True),
        num("density_ml", "Cells per mL", "", "", "Assumes a monolayer on a haemocytometer scale", output=True),
    ],
    dirs=[
        d("Field", "fov_mm", "field_number/magnification"),
        d("Field", "fov_um", "field_number/magnification*1000"),
        d("Field", "area_mm2", "3.14159265358979*(field_number/magnification/2)^2"),
        d("Field", "density", "cells_seen/(3.14159265358979*(field_number/magnification/2)^2)"),
        d("Field", "density_ml", "cells_seen/(3.14159265358979*(field_number/magnification/2)^2)*100"),
    ],
    formula=("FOV (mm) = field number ÷ magnification.  Area = π × (FOV ÷ 2)².  "
             "Density = cells counted ÷ area"),
    symbols=[("FN", "field number of the eyepiece, in mm", "mm"),
             ("M", "objective magnification", "×"),
             ("FOV", "diameter of the circular field of view", "mm")],
    bands=[("4× / 10×", "Overview", "find the specimen and check confluence"),
           ("40×", "Counting", "individual cells are distinguishable"),
           ("100× oil", "Detail", "subcellular structure, not for counting")],
    notes=[
        "The objective magnifies, not the eyepiece: a 10× eyepiece with a 20 mm field number gives a "
        "2 mm field at 10× and a 0.5 mm field at 40×.",
        "Counting cells in a field only gives a density once you know the area — which is why the "
        "field number matters and the eyepiece magnification does not.",
        "For a haemocytometer the field of view is irrelevant: the grid defines the volume, and a "
        "count there is already per 0.1 µL.",
    ],
    mistakes=[
        "Using the eyepiece magnification instead of the field number, which gives a made-up answer.",
        "Assuming the field is square — it is a circle, so the area uses π.",
        "Comparing cell counts from different objectives without rescaling to area.",
    ],
    faq=[
        ("What is a field number?", "The diameter in millimetres of the image the eyepiece shows "
         "before the objective magnifies it, usually 18–26 mm."),
        ("How big is the field at 400× total magnification?", "With a 20 mm field number and a 40× "
         "objective, 0.5 mm across — about 0.196 mm²."),
        ("Does the eyepiece magnification change the field?", "No, only the field number does; the "
         "eyepiece's 10× affects the apparent size, not the area imaged."),
    ],
    related=[("/biology/western-blot-loading", "Western blot loading"),
             ("/biology/cell-doubling-time", "Cell doubling time"),
             ("/biology/bacterial-growth-curve", "Bacterial growth curve")],
    svg=("bars", {"caption": "Field of view with a 20 mm field number (mm)",
                  "series": [("4×", 5), ("10×", 2), ("40×", 0.5), ("100×", 0.2)]}),
    icon="flask",
    keywords=["field of view", "microscope", "magnification", "cell counting"],
    steps=[
        "Read the field number off the eyepiece (18, 20, 22 or 25 mm is common).",
        "Enter the objective magnification you are using.",
        "The diameter, area and — if you counted cells — the density are calculated.",
    ],
))


# ------------------------------------------------------ 8. genetic odds ratio
add(Spec(
    name="Odds Ratio Calculator for Genetics",
    slug="genetic-odds-ratio",
    summary=("A genetic odds ratio compares how often a variant appears in cases and in controls. From "
             "four counts — carriers and non-carriers in each group — you get the odds ratio, the relative "
             "risk and their 95% confidence intervals, which is the standard first pass in a genetic "
             "association study."),
    fields=[
        num("a", "Cases with the variant", 60, "", "Exposed cases"),
        num("b", "Cases without the variant", 40, "", "Unexposed cases"),
        num("c", "Controls with the variant", 30, "", "Exposed controls"),
        num("dd", "Controls without the variant", 70, "", "Unexposed controls"),
        num("odds_ratio", "Odds ratio", "", "", "", output=True),
        num("ci_low", "95% confidence, lower", "", "", "Woolf interval", output=True),
        num("ci_high", "95% confidence, upper", "", "", "", output=True),
        num("relative_risk", "Relative risk", "", "", "Cases ÷ controls risk", output=True),
        num("case_pct", "Variant frequency in cases", "", "%", "", output=True),
        num("control_pct", "Variant frequency in controls", "", "%", "", output=True),
    ],
    dirs=[
        d("Association", "odds_ratio", "(a/c)/(b/dd)"),
        d("Association", "case_pct", "a/(a+b)*100"),
        d("Association", "control_pct", "c/(c+dd)*100"),
        d("Association", "relative_risk", "(a/(a+b))/(c/(c+dd))"),
        d("Association", "ci_low", "exp(ln((a/c)/(b/dd))-1.96*sqrt(1/a+1/b+1/c+1/dd))"),
        d("Association", "ci_high", "exp(ln((a/c)/(b/dd))+1.96*sqrt(1/a+1/b+1/c+1/dd))"),
    ],
    formula=("OR = (a ÷ c) ÷ (b ÷ d).  RR = (a ÷ (a+b)) ÷ (c ÷ (c+d)).  "
             "95% CI = exp(ln OR ± 1.96 × √(1/a + 1/b + 1/c + 1/d))"),
    symbols=[("a, b", "cases with and without the variant", "people"),
             ("c, d", "controls with and without the variant", "people"),
             ("OR", "odds of the variant in cases over the odds in controls", "—")],
    bands=[("OR = 1", "No association", "the interval crossing 1 is the usual test of significance"),
           ("OR 1.2 – 2", "Modest association", "typical of most complex-trait variants"),
           ("OR above 3", "Strong association", "check for genotyping artefacts and stratification")],
    notes=[
        "An odds ratio of 2 does not mean twice the risk. For a rare disease the two numbers are "
        "close; for a common one they diverge, and RR is the honest measure.",
        "The confidence interval, not the p-value, is what tells you whether the study was big "
        "enough. An OR of 1.8 with an interval of 0.6–5.4 is a null result.",
        "Population stratification — mixing two ancestries with different allele frequencies — "
        "creates associations that vanish once it is corrected for.",
    ],
    mistakes=[
        "Filling in the table by column instead of by row, which inverts the ratio.",
        "Reporting OR as if it were relative risk for a common disease.",
        "Ignoring a control group whose variant frequency does not match the published population.",
    ],
    faq=[
        ("What does an odds ratio of 1 mean?", "The variant is equally common in cases and controls "
         "— no association."),
        ("When is a confidence interval significant?", "When it does not include 1.0. The p-value "
         "adds nothing that the interval does not already show."),
        ("Why is my OR so much larger than the RR?", "Because the disease is common: odds "
         "overestimate risk when the outcome is not rare."),
    ],
    related=[("/biology/hardy-weinberg-equilibrium", "Hardy–Weinberg"),
             ("/biology/mark-recapture", "Mark–recapture"),
             ("/biology/biodiversity-index", "Biodiversity index")],
    svg=("bars", {"caption": "Odds ratio as the case table changes",
                  "series": [("Even odds", 1), ("Modest", 1.8), ("Strong", 4)]}),
    icon="flask",
    keywords=["odds ratio", "genetic association", "relative risk", "case control"],
    steps=[
        "Count cases with and without the variant, then controls with and without it.",
        "Enter the four numbers in the order the table shows them.",
        "Read the odds ratio, the relative risk and the 95% interval — the interval is what decides "
        "whether the result is real.",
    ],
))
