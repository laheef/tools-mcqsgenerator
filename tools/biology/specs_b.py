"""Batch B — biochemistry, assay maths and kinetics."""

from lib import Spec, num, sel, d

SPECS: list[Spec] = []


def add(s: Spec) -> None:
    SPECS.append(s)


add(Spec(
    name="BCA Assay Calculator (standard curve)",
    slug="bca-assay-calculator",
    summary=("The BCA assay returns a colour, not a concentration: you read absorbance, put it on a "
             "standard curve and interpolate. This calculator takes the slope and intercept of your "
             "BSA standards and converts sample absorbance into protein concentration, including the "
             "dilution factor you used."),
    fields=[
        num("a562", "Sample absorbance", 0.62, "", "Read at 562 nm, blank subtracted"),
        num("slope", "Standard curve slope", 1.35, "per mg/mL", "Absorbance units per mg/mL of protein"),
        num("intercept", "Standard curve intercept", 0.02, "", "Absorbance at zero protein"),
        num("dilution", "Sample dilution factor", 1, "×", "2 for a 1:1 dilution with buffer"),
        num("conc", "Protein concentration", "", "mg/mL", "", output=True),
    ],
    dirs=[
        d("Concentration", "conc", "(a562-intercept)/slope*dilution"),
        d("Concentration", "a562", "conc*slope/dilution+intercept"),
    ],
    formula="Protein (mg/mL) = (A₅₆₂ − intercept) ÷ slope × dilution factor",
    symbols=[("A₅₆₂", "blank-corrected absorbance of the sample", "AU"),
             ("slope", "absorbance per mg/mL from the standards", "AU·mL/mg"),
             ("intercept", "fitted absorbance at zero protein", "AU"),
             ("dilution", "how much the sample was diluted before reading", "×")],
    bands=[("0.05 – 2 mg/mL", "Working range", "the linear part of a typical BCA curve"),
           ("below 0.05", "Too dilute", "concentrate or use a micro-BCA protocol"),
           ("above 2", "Too concentrated", "dilute and re-read; the curve flattens")],
    notes=[
        "The BCA curve is linear over roughly 20–2000 µg/mL for BSA. Outside that you are reading "
        "the shoulder of the curve, where a small absorbance error becomes a large concentration error.",
        "BCA is compatible with detergents such as 1% SDS but not with reducing agents above about "
        "5 mM DTT, which drive the colour reaction on their own.",
        "The response depends on the protein: BSA over-reads, lysozyme under-reads. Quote the "
        "standard you used.",
    ],
    mistakes=[
        "Forgetting the dilution factor, which is the most common cause of a concentration that is "
        "half or a quarter of the true value.",
        "Subtracting the blank from the standards but not from the samples.",
        "Reading at the wrong wavelength — BCA is measured at 562 nm, Bradford at 595 nm.",
    ],
    sources=["BCA chemistry: Smith et al. (1985), Analytical Biochemistry 150:76–85."],
    faq=[
        ("How do I make the standard curve?",
         "Dilute BSA to 0, 0.125, 0.25, 0.5, 1 and 2 mg/mL, run them with the samples, and fit "
         "absorbance against concentration. The slope and intercept go in the two boxes above."),
        ("Why is my sample reading above the top standard?",
         "The assay has saturated. Dilute the sample and multiply by the new dilution factor."),
    ],
    related=[("/biology/bradford-assay-calculator", "Bradford assay"),
             ("/chemistry/beer-lambert-law", "Beer–Lambert law"),
             ("/biology/protein-molar-conversions", "Protein molar conversions")],
    svg=("chain", {"caption": "Absorbance minus the intercept, divided by the slope, times the dilution."}),
    icon="flask",
))

add(Spec(
    name="Bradford Assay Calculator (standard curve)",
    slug="bradford-assay-calculator",
    summary=("Bradford is the quickest colorimetric protein assay and the one most sensitive to which "
             "protein you are measuring. This calculator converts a 595 nm reading into mg/mL using "
             "your own standard curve, with the dilution factor applied."),
    fields=[
        num("a595", "Sample absorbance", 0.48, "", "Read at 595 nm, blank subtracted"),
        num("slope", "Standard curve slope", 1.05, "per mg/mL", ""),
        num("intercept", "Standard curve intercept", 0.03, "", ""),
        num("dilution", "Sample dilution factor", 1, "×", ""),
        num("conc", "Protein concentration", "", "mg/mL", "", output=True),
    ],
    dirs=[
        d("Concentration", "conc", "(a595-intercept)/slope*dilution"),
    ],
    formula="Protein (mg/mL) = (A₅₉₅ − intercept) ÷ slope × dilution factor",
    symbols=[("A₅₉₅", "blank-corrected absorbance", "AU"),
             ("slope", "absorbance per mg/mL", "AU·mL/mg"),
             ("intercept", "fitted absorbance at zero protein", "AU")],
    bands=[("0.1 – 1.4 mg/mL", "Working range", "linear for most proteins"),
           ("below 0.1", "Too dilute", "use a micro-Bradford cuvette"),
           ("above 1.4", "Saturated", "dilute and re-read")],
    notes=[
        "Bradford binds basic and aromatic residues, so the response is strongly protein-dependent: "
        "BSA is the usual standard, but a lysine-rich protein will over-read against it.",
        "Detergents above 0.1% (especially SDS and Triton X-100) interfere; so do strong reducing agents.",
        "The dye binds the cuvette, so use a fresh one or rinse with methanol between samples.",
    ],
    mistakes=[
        "Reading Bradford at 562 nm, the BCA wavelength — the peak is 595 nm.",
        "Using a BSA curve for a very different protein and quoting the number as absolute.",
        "Leaving the dye–sample mix to stand for different times for standards and samples.",
    ],
    sources=["Bradford (1976), Analytical Biochemistry 72:248–254."],
    faq=[
        ("Is Bradford or BCA better?",
         "BCA is more tolerant of detergents and more linear; Bradford is faster and less sensitive "
         "to reducing agents. Both need a standard curve made with a protein similar to your sample."),
    ],
    related=[("/biology/bca-assay-calculator", "BCA assay"),
             ("/biology/protein-molar-conversions", "Protein molar conversions")],
    svg=("chain", {"caption": "A 595 nm reading turned into a concentration through your own standards."}),
    icon="flask",
))

add(Spec(
    name="Beer-Lambert A280 Protein Concentration",
    slug="beer-lambert-a280-protein-concentration",
    summary=("A280 is the fastest protein measurement there is: no reagents, no standard curve, and "
             "you get the sample back. This calculator applies the Beer–Lambert law with an "
             "extinction coefficient to turn an absorbance into mg/mL."),
    fields=[
        num("a280", "Absorbance at 280 nm", 0.85, "", "Blanked against buffer"),
        num("ext", "Extinction coefficient", 43824, "M⁻¹cm⁻¹", "From the sequence, or 1.0 for 1 mg/mL = 1 AU"),
        num("mw", "Molecular weight", 55000, "Da", "Used when the coefficient is molar"),
        num("path", "Path length", 1, "cm", "1 cm cuvette, or the drop path of a NanoDrop"),
        num("conc_mg", "Protein concentration", "", "mg/mL", "", output=True),
        num("conc_um", "Protein concentration", "", "µM", "", output=True),
    ],
    dirs=[
        d("Concentration", "conc_mg", "a280*mw/(ext*path)"),
        d("Concentration", "conc_um", "a280/(ext*path)*1000000"),
    ],
    formula="A = ε × c × l, so c (M) = A ÷ (ε × l); c (mg/mL) = c (M) × molecular weight",
    symbols=[("A₂₈₀", "absorbance at 280 nm", "AU"),
             ("ε", "molar extinction coefficient", "M⁻¹cm⁻¹"),
             ("l", "path length", "cm"),
             ("MW", "molecular weight", "Da")],
    bands=[("1 AU ≈ 1 mg/mL", "Rule of thumb", "true only for proteins with ε ≈ MW"),
           ("0.1 – 1.5 AU", "Reliable", "the linear range of most spectrophotometers"),
           ("above 1.5", "Too concentrated", "dilute; the detector is saturating")],
    notes=[
        "The rule that 1 mg/mL gives 1 AU at 280 nm is exactly true only when ε equals the molecular "
        "weight, which holds for a typical IgG and for few other proteins.",
        "Nucleic acid contamination inflates A280 badly. Read A260 as well: a 260/280 ratio above "
        "0.7 means the reading is mostly DNA or RNA.",
        "For a 1 cm cuvette the path is 1; for a NanoDrop-style instrument it is 0.1–0.05 cm, which "
        "the instrument corrects for internally.",
    ],
    mistakes=[
        "Using a molar coefficient with the mg/mL formula (or the reverse) — the answer is out by a "
        "factor of the molecular weight.",
        "Ignoring nucleic acid contamination.",
        "Forgetting to blank against the actual buffer, which may absorb at 280 nm itself.",
    ],
    sources=["Beer–Lambert law; extinction coefficients from the ExPASy ProtParam convention."],
    faq=[
        ("How do I get the extinction coefficient without a spectrophotometer?",
         "Compute it from the sequence: 5500 × Trp + 1490 × Tyr + 125 × cystines, the ProtParam rule. "
         "The protein extinction coefficient calculator does that for you."),
        ("Why is my A280 higher than expected?",
         "Usually DNA, RNA or a buffer component such as DTT absorbing at 280 nm. Check the 260/280 ratio."),
    ],
    related=[("/biology/protein-extinction-coefficient", "Protein extinction coefficient"),
             ("/biology/protein-molar-conversions", "Protein molar conversions"),
             ("/chemistry/beer-lambert-law", "Beer–Lambert law")],
    svg=("chain", {"caption": "Absorbance, coefficient and path length give concentration."}),
    icon="spectrophotometer",
))

add(Spec(
    name="Protein Extinction Coefficient (ε280) Calculator",
    slug="protein-extinction-coefficient",
    summary=("A protein's extinction coefficient at 280 nm can be calculated from its amino acid "
             "composition: tryptophans and tyrosines do the absorbing, and cystines add a small "
             "amount. Enter the counts and this returns ε in M⁻¹cm⁻¹ and the A280 of a 1 mg/mL "
             "solution."),
    fields=[
        num("trp", "Tryptophan residues", 8, "", "W"),
        num("tyr", "Tyrosine residues", 12, "", "Y"),
        num("cystine", "Cystine (disulfide) bonds", 4, "", "S–S pairs, not free cysteines"),
        num("mw", "Molecular weight", 55000, "Da", ""),
        num("ext", "Extinction coefficient", "", "M⁻¹cm⁻¹", "", output=True),
        num("a1mg", "A280 of a 1 mg/mL solution", "", "AU", "", output=True),
    ],
    dirs=[
        d("Extinction", "ext", "trp*5500+tyr*1490+cystine*125"),
        d("Extinction", "a1mg", "(trp*5500+tyr*1490+cystine*125)/mw"),
    ],
    formula="ε₂₈₀ = 5500 × Trp + 1490 × Tyr + 125 × cystines",
    symbols=[("Trp", "number of tryptophan residues", "—"),
             ("Tyr", "number of tyrosine residues", "—"),
             ("cystine", "number of disulfide bonds", "—"),
             ("ε", "molar extinction coefficient", "M⁻¹cm⁻¹")],
    notes=[
        "The coefficients come from Pace et al. (1995) and are what ExPASy ProtParam uses.",
        "Count disulfide bonds, not free cysteines: reduced cysteines contribute nothing at 280 nm.",
        "The A280 of a 1 mg/mL solution is the practical number for Beer–Lambert work, because it "
        "lets you skip the molecular weight.",
    ],
    mistakes=[
        "Counting every cysteine residue instead of disulfide pairs.",
        "Using the reduced-protein coefficient for a protein that is folded and disulfide-bonded.",
        "Assuming the value holds in 6 M guanidine, where the spectrum shifts.",
    ],
    sources=["Pace et al. (1995), Protein Science 4:2411–2423."],
    faq=[
        ("What if my protein has no Trp or Tyr?",
         "Then ε₂₈₀ is very small and A280 is useless. Use a colorimetric assay or measure at 205 nm, "
         "where the peptide backbone absorbs."),
        ("Does a His-tag change the coefficient?",
         "Only slightly — histidine contributes about 20 M⁻¹cm⁻¹ at 280 nm, which is negligible "
         "against a whole protein."),
    ],
    related=[("/biology/beer-lambert-a280-protein-concentration", "A280 concentration"),
             ("/biology/protein-molar-conversions", "Protein molar conversions")],
    svg=("chain", {"caption": "Trp, Tyr and disulfides add up to the extinction coefficient."}),
    icon="protein",
))

add(Spec(
    name="Protein Molar Conversions",
    slug="protein-molar-conversions",
    summary=("Protein concentrations get quoted in mg/mL, µM and nmol depending on who is asking. "
             "This calculator converts between mass concentration, molarity and amount using the "
             "molecular weight, so a protocol written in µM can be carried out from a stock "
             "measured in mg/mL."),
    fields=[
        num("mw", "Molecular weight", 55000, "Da", "g/mol"),
        num("mg_ml", "Mass concentration", 2, "mg/mL", ""),
        num("um", "Molar concentration", "", "µM", "", output=True),
        num("nm", "Molar concentration", "", "nM", "", output=True),
        num("nmol_ml", "Amount per mL", "", "nmol/mL", "", output=True),
        num("mg_total", "Mass in 1 mL", "", "mg", "", output=True),
    ],
    dirs=[
        d("Conversion", "um", "mg_ml/mw*1000000"),
        d("Conversion", "nm", "mg_ml/mw*1000000000"),
        d("Conversion", "nmol_ml", "mg_ml/mw*1000000"),
        d("Conversion", "mg_total", "mg_ml*1"),
        d("Conversion", "mg_ml", "um*mw/1000000"),
    ],
    formula="Molarity (M) = mass concentration (g/L) ÷ molecular weight (g/mol)",
    symbols=[("MW", "molecular weight", "Da = g/mol"),
             ("c", "mass concentration", "mg/mL"),
             ("M", "molar concentration", "µM")],
    notes=[
        "1 mg/mL of a 55 kDa protein is 18.2 µM; the same mass of a 5.5 kDa peptide is 182 µM. "
        "Molarity is where small proteins and peptides differ enormously from large ones.",
        "Molecular weight in daltons is numerically the same as g/mol, which is why the unit "
        "conversion is so easy to get wrong by a factor of 1000.",
        "For a protein complex, use the molecular weight of the whole assembly.",
    ],
    mistakes=[
        "Using the molecular weight in kDa and forgetting the ×1000.",
        "Converting a concentration of a protein solution that also contains carrier protein or BSA.",
        "Quoting molarity for a heterogeneous sample such as a cell lysate, where it has no meaning.",
    ],
    faq=[
        ("How do I convert µg/mL to µM?",
         "Divide by the molecular weight in Da and multiply by 1000: 100 µg/mL of a 50 kDa protein "
         "is 2 µM."),
        ("Why does 1 mg/mL give different molarities for different proteins?",
         "Because molarity counts molecules, and heavier molecules are fewer per milligram."),
    ],
    related=[("/biology/beer-lambert-a280-protein-concentration", "A280 concentration"),
             ("/biology/protein-molecular-weight", "Protein molecular weight"),
             ("/biology/protein-extinction-coefficient", "Protein extinction coefficient")],
    svg=("chain", {"caption": "Mass concentration and molecular weight give molarity."}),
    icon="protein",
))

add(Spec(
    name="Enzyme Unit Converter (U/mg, kcat)",
    slug="enzyme-unit-converter",
    summary=("One unit of enzyme converts one micromole of substrate per minute; kcat is the same "
             "activity per active site per second. This calculator converts between specific "
             "activity (U/mg), molar activity, kcat and turnover number, which is how enzyme "
             "datasheets and papers are compared."),
    fields=[
        num("activity", "Specific activity", 120, "U/mg", "Micromoles per minute per milligram"),
        num("mw", "Enzyme molecular weight", 48000, "Da", ""),
        num("kcat", "kcat (turnover number)", "", "s⁻¹", "", output=True),
        num("molar_activity", "Molar activity", "", "min⁻¹", "", output=True),
        num("ukat", "Activity in katal per mg", "", "µkat/mg", "", output=True),
        num("efficiency", "Catalytic efficiency (with Km)", "", "M⁻¹s⁻¹", "", output=True),
        num("km", "Km", 250, "µM", "Optional — used for catalytic efficiency"),
    ],
    dirs=[
        d("Enzyme units", "kcat", "activity*60000/mw"),
        d("Enzyme units", "molar_activity", "activity*60000/mw*60"),
        d("Enzyme units", "ukat", "activity/60"),
        d("Enzyme units", "efficiency", "activity*60000/mw/(km/1000000)"),
        d("Enzyme units", "activity", "kcat*mw/60000"),
    ],
    formula="kcat (s⁻¹) = specific activity (U/mg) × 60 000 ÷ molecular weight (Da)",
    symbols=[("specific activity", "µmol substrate per minute per mg enzyme", "U/mg"),
             ("MW", "molecular weight of the enzyme subunit", "Da"),
             ("kcat", "substrate molecules converted per active site per second", "s⁻¹"),
             ("Km", "Michaelis constant", "µM")],
    bands=[("1 – 10 s⁻¹", "Slow", "typical of many metabolic enzymes"),
           ("10 – 1000 s⁻¹", "Efficient", "the usual range for well-characterised enzymes"),
           ("above 10⁵ s⁻¹", "Diffusion-limited", "catalase, acetylcholinesterase territory")],
    notes=[
        "kcat assumes one active site per subunit. For a dimer with two active sites, divide the "
        "molar activity by two.",
        "Catalytic efficiency is kcat/Km and approaches a diffusion limit of about 10⁸–10⁹ M⁻¹s⁻¹; "
        "values near that mean the enzyme is as fast as substrate arrival allows.",
        "The 1 U = 1 µmol/min definition is the IUBMB one; 1 katal = 1 mol/s = 6 × 10⁷ U.",
    ],
    mistakes=[
        "Using the molecular weight of the whole multimer when the activity is quoted per subunit.",
        "Confusing U/mg (specific activity) with U/mL (volumetric activity) — the second says "
        "nothing about purity.",
        "Converting at 25 °C and comparing with a kcat measured at 37 °C.",
    ],
    faq=[
        ("What is the difference between kcat and specific activity?",
         "Specific activity is per milligram of protein; kcat is per molecule of enzyme per second. "
         "The molecular weight links them."),
        ("How do I go from U/mL to kcat?",
         "Convert U/mL to U/mg using the protein concentration, then use the formula on this page."),
    ],
    related=[("/chemistry/michaelis-menten-equation", "Michaelis–Menten equation"),
             ("/chemistry/enzyme-activity", "Enzyme activity"),
             ("/biology/lineweaver-burk-plot", "Lineweaver–Burk plot")],
    svg=("chain", {"caption": "Specific activity and molecular weight give the turnover number."}),
    icon="protein",
))

add(Spec(
    name="ATP / Cellular Respiration Energy Yield Calculator",
    slug="atp-cellular-respiration-energy-yield",
    summary=("How much ATP a fuel yields depends on the pathway it enters and on which shuttle "
             "carries its electrons into the mitochondrion. This calculator totals ATP, NADH and "
             "FADH₂ for glucose, fatty acids and amino acids using the modern P/O ratios of 2.5 "
             "and 1.5."),
    fields=[
        sel("fuel", "Fuel", [("Glucose (aerobic)", "1"), ("Glucose (anaerobic)", "2"),
                             ("Palmitate (C16)", "3"), ("Lactate", "4"), ("Glutamate", "5")], "1"),
        num("nadh", "NADH produced", 10, "", "From glycolysis, pyruvate oxidation and the cycle"),
        num("fadh2", "FADH₂ produced", 2, "", ""),
        num("atp_sub", "ATP (or GTP) made directly", 4, "", "Substrate-level phosphorylation"),
        num("atp_total", "Total ATP", "", "ATP", "", output=True),
        num("energy", "Energy captured", "", "kJ/mol", "", output=True),
    ],
    dirs=[
        d("Yield", "atp_total", "if_else(fuel==2, atp_sub*2, atp_sub+nadh*2.5+fadh2*1.5)"),
        d("Yield", "energy", "(atp_sub+nadh*2.5+fadh2*1.5)*30.5"),
    ],
    formula="ATP total = substrate-level ATP + 2.5 × NADH + 1.5 × FADH₂",
    symbols=[("NADH", "reducing equivalents delivered to complex I", "mol/mol fuel"),
             ("FADH₂", "equivalents delivered via complex II", "mol/mol fuel"),
             ("P/O ratio", "ATP per oxygen atom reduced (2.5 for NADH, 1.5 for FADH₂)", "—"),
             ("energy", "chemical energy captured at ~30.5 kJ/mol ATP", "kJ/mol")],
    bands=[("2 ATP", "Anaerobic glycolysis", "glucose to lactate, no oxygen needed"),
           ("30 – 32 ATP", "Aerobic glucose", "the textbook figure; 32 with the malate–aspartate shuttle"),
           ("106 ATP", "Palmitate", "the classic fatty-acid figure, β-oxidation plus the cycle")],
    notes=[
        "The older textbooks said 38 ATP for glucose, using P/O ratios of 3 and 2. The modern "
        "values 2.5 and 1.5 give 30–32.",
        "The glycerol-3-phosphate shuttle costs one ATP per cytosolic NADH, which is why muscle "
        "tissue reports 30 and liver 32 for the same glucose.",
        "Anaerobic yield is small but fast: 2 ATP per glucose, and lactate is regenerated to keep "
        "glycolysis running.",
    ],
    mistakes=[
        "Counting the 2 ATP from glycolysis twice.",
        "Using 3 and 2 as P/O ratios and then comparing with a modern paper.",
        "Forgetting that amino-acid entry points differ — glutamate enters as α-ketoglutarate and "
        "yields far less than a fatty acid.",
    ],
    sources=["P/O ratios from the current biochemistry consensus (2.5 for NADH, 1.5 for FADH₂)."],
    faq=[
        ("Why 30 and 32 ATP for glucose?",
         "The difference is the shuttle used to move cytosolic NADH into the mitochondrion: the "
         "malate–aspartate shuttle preserves it (32), the glycerol-3-phosphate shuttle costs 1 ATP (30)."),
        ("How much ATP does a fatty acid give?",
         "Palmitate yields 106 ATP by β-oxidation plus the cycle — more than three times glucose, "
         "per molecule, because it is far more reduced."),
    ],
    related=[("/chemistry/q10", "Q10 temperature coefficient"),
             ("/biology/atp-cellular-respiration-energy-yield", "Respiratory quotient"),
             ("/chemistry/enzyme-activity", "Enzyme activity")],
    svg=("bars", {"caption": "Yield by pathway for the same starting material."}),
    icon="mitochondria",
))

add(Spec(
    name="Enzyme Activity Calculator",
    slug="enzyme-activity-units",
    summary=("Enzyme activity is the rate at which a preparation converts substrate, expressed in "
             "units. This calculator converts between absorbance change per minute, units per mL "
             "and units per mg, using the extinction coefficient of the product and the light path."),
    fields=[
        num("dabs", "Absorbance change per minute", 0.05, "AU/min", "Slope of the linear phase"),
        num("ext", "Molar extinction coefficient", 6220, "M⁻¹cm⁻¹", "10 000–15 000 for NADH at 340 nm is 6220"),
        num("path", "Path length", 1, "cm", ""),
        num("volume", "Reaction volume", 1, "mL", ""),
        num("protein", "Protein in the assay", 0.1, "mg", ""),
        num("u_ml", "Activity", "", "U/mL", "", output=True),
        num("u_mg", "Specific activity", "", "U/mg", "", output=True),
        num("rate", "Substrate converted", "", "µmol/min", "", output=True),
    ],
    dirs=[
        d("Activity", "rate", "dabs/(ext*path)*1000000*volume/1000"),
        d("Activity", "u_ml", "dabs/(ext*path)*1000000*1000"),
        d("Activity", "u_mg", "dabs/(ext*path)*1000000*volume/protein"),
    ],
    formula="Activity (µmol/min) = (ΔA/min ÷ (ε × l)) × volume;  1 U = 1 µmol/min",
    symbols=[("ΔA/min", "initial rate from the linear part of the curve", "AU/min"),
             ("ε", "extinction coefficient of the absorbing species", "M⁻¹cm⁻¹"),
             ("l", "path length", "cm"),
             ("volume", "total reaction volume", "mL")],
    bands=[("linear phase", "Use this", "the first 10–20% of substrate conversion"),
           ("plateau", "Do not use", "substrate depletion or product inhibition"),
           ("lag", "Do not use", "temperature equilibration")],
    notes=[
        "Only the initial linear rate is a measure of activity. Once the curve bends, you are "
        "measuring the assay, not the enzyme.",
        "NADH and NADPH absorb at 340 nm with ε = 6220 M⁻¹cm⁻¹, which is why so many coupled assays "
        "are read at that wavelength.",
        "Units must be quoted with temperature, pH and substrate concentration, or they are not comparable.",
    ],
    mistakes=[
        "Using the extinction coefficient of NAD⁺ instead of NADH (NAD⁺ barely absorbs at 340 nm).",
        "Reading a plate without correcting for path length, which is much shorter than 1 cm.",
        "Fitting the whole curve rather than the linear portion.",
    ],
    sources=["IUBMB enzyme unit definition; ε₃₄₀ for NADH = 6220 M⁻¹cm⁻¹."],
    faq=[
        ("What is 1 unit of enzyme?",
         "One micromole of substrate converted per minute under the stated conditions."),
        ("Why does my rate fall off?",
         "Substrate depletion, product inhibition, or enzyme instability. Measure earlier in the curve."),
    ],
    related=[("/biology/enzyme-unit-converter", "Enzyme unit converter"),
             ("/chemistry/michaelis-menten-equation", "Michaelis–Menten equation"),
             ("/biology/lineweaver-burk-plot", "Lineweaver–Burk plot")],
    svg=("curve", {"caption": "Take the slope of the linear phase, never the plateau."}),
    icon="spectrophotometer",
))

add(Spec(
    name="Lineweaver-Burk Plot / Km & Vmax Calculator",
    slug="lineweaver-burk-plot",
    summary=("The Lineweaver–Burk plot linearises Michaelis–Menten kinetics: 1/v against 1/[S] gives "
             "a straight line whose intercepts are 1/Vmax and −1/Km. Enter two substrate/velocity "
             "pairs and the calculator returns Vmax, Km and catalytic efficiency."),
    fields=[
        num("s1", "Substrate concentration 1", 0.5, "mM", ""),
        num("v1", "Initial velocity 1", 0.35, "µmol/min", ""),
        num("s2", "Substrate concentration 2", 2, "mM", ""),
        num("v2", "Initial velocity 2", 0.62, "µmol/min", ""),
        num("vmax", "Vmax", "", "µmol/min", "", output=True),
        num("km", "Km", "", "mM", "", output=True),
        num("kcat_km", "Vmax/Km", "", "µmol/min/mM", "", output=True),
    ],
    dirs=[
        d("Kinetics", "vmax", "1/((1/v1)-(((1/v2)-(1/v1))/((1/s2)-(1/s1)))*(1/s1))"),
        d("Kinetics", "km", "(((1/v2)-(1/v1))/((1/s2)-(1/s1)))/((1/v1)-(((1/v2)-(1/v1))/((1/s2)-(1/s1)))*(1/s1))"),
        d("Kinetics", "kcat_km", "1/((1/v1)-(((1/v2)-(1/v1))/((1/s2)-(1/s1)))*(1/s1))"
                                 "/((((1/v2)-(1/v1))/((1/s2)-(1/s1)))/((1/v1)-(((1/v2)-(1/v1))/((1/s2)-(1/s1)))*(1/s1)))"),
    ],
    formula="1/v = (Km/Vmax)(1/[S]) + 1/Vmax",
    symbols=[("*S*", "substrate concentration", "mM"),
             ("v", "initial velocity", "µmol/min"),
             ("Vmax", "velocity at saturating substrate", "µmol/min"),
             ("Km", "substrate concentration at half Vmax", "mM")],
    notes=[
        "With two points, Vmax and Km are exact for a linear fit but very sensitive to a single bad "
        "measurement; four to six points from 0.2 to 5 × Km is the practical minimum.",
        "The double-reciprocal plot weights the lowest substrate points most heavily, which is its "
        "well-known weakness. A non-linear fit to the same data is more reliable.",
        "Km is an operational constant: it changes with pH, temperature and the second substrate.",
    ],
    mistakes=[
        "Using substrate concentrations in different units on one line.",
        "Including points where the rate has already plateaued.",
        "Reading Km off the y-intercept instead of the x-intercept (which is −1/Km).",
    ],
    sources=["Lineweaver & Burk (1934); the cautions on the double-reciprocal fit follow Dowd & "
             "Riggs (1965)."],
    faq=[
        ("What does a high Km mean?",
         "Low affinity: more substrate is needed to reach half of Vmax."),
        ("How many points do I need?",
         "At least four, spread geometrically from about 0.2 to 5 × Km."),
    ],
    related=[("/chemistry/michaelis-menten-equation", "Michaelis–Menten equation"),
             ("/biology/enzyme-unit-converter", "Enzyme unit converter"),
             ("/biology/cheng-prusoff-equation", "Cheng–Prusoff equation")],
    svg=("curve", {"caption": "The double-reciprocal line: x-intercept −1/Km, y-intercept 1/Vmax.",
                   "axis": ("1/[S]", "1/v")}),
    icon="protein",
))

add(Spec(
    name="Cheng-Prusoff Equation Calculator",
    slug="cheng-prusoff-equation",
    summary=("The Cheng–Prusoff equation converts an assay IC50 into Ki, the true inhibition constant. The "
             "Cheng–Prusoff relationship converts one into the other using the substrate concentration and "
             "its Km, and it is the standard correction when comparing inhibitors across assays."),
    fields=[
        num("ic50", "IC50", 120, "nM", "From the competition assay"),
        num("s", "Substrate concentration", 1, "× Km", "Radiometric assays often run at 1 × Km"),
        num("km", "Km of the substrate", 1, "µM", "Not needed when the substrate box is in Km units"),
        sel("mode", "Inhibition type", [("Competitive", "1"), ("Non-competitive", "2"),
                                        ("Uncompetitive", "3")], "1"),
        num("ki", "Ki", "", "nM", "", output=True),
        num("km_app", "Km apparent at this [S]", "", "µM", "", output=True),
    ],
    dirs=[
        d("Ki", "ki", "if_else(mode==1, ic50/(1+s), if_else(mode==2, ic50, ic50/(1+1/s)))"),
        d("Ki", "km_app", "km*(1+s)"),
    ],
    formula="Competitive: Ki = IC50 ÷ (1 + [S]/Km);  non-competitive: Ki = IC50;  "
            "uncompetitive: Ki = IC50 ÷ (1 + Km/[S])",
    symbols=[("IC50", "half-maximal inhibitory concentration in the assay", "nM"),
             ("[S]", "substrate concentration", "µM"),
             ("Km", "Michaelis constant of the substrate", "µM"),
             ("Ki", "dissociation constant of the inhibitor", "nM")],
    bands=[("competitive", "Ki < IC50", "raising [S] makes inhibition look weaker"),
           ("non-competitive", "Ki = IC50", "substrate concentration does not matter"),
           ("uncompetitive", "Ki < IC50", "the inhibitor prefers the ES complex")],
    notes=[
        "The correction only holds for reversible inhibitors under rapid-equilibrium assumptions; "
        "tight-binding inhibitors need the Morrison equation.",
        "Assay at a substrate concentration near Km: that is where the correction is most robust "
        "and where the signal is still workable.",
        "Report Ki and the conditions: a Ki without Km and [S] cannot be reproduced.",
    ],
    mistakes=[
        "Applying the competitive correction to a non-competitive inhibitor.",
        "Using [S] in µM with Km in mM.",
        "Treating IC50 from a cell-based assay as Ki — transport and protein binding intervene.",
    ],
    sources=["Cheng & Prusoff (1973), Biochemical Pharmacology 22:3099–3108."],
    faq=[
        ("Why is IC50 different from Ki?",
         "Because IC50 depends on how much substrate is present: more substrate competes with the "
         "inhibitor and raises the apparent IC50."),
        ("When can I skip the correction?",
         "When [S] is far below Km, the competitive correction factor is close to 1."),
    ],
    related=[("/biology/lineweaver-burk-plot", "Lineweaver–Burk plot"),
             ("/chemistry/michaelis-menten-equation", "Michaelis–Menten equation"),
             ("/biology/percent-inhibition", "Percent inhibition")],
    svg=("chain", {"caption": "IC50 corrected by the substrate-to-Km ratio gives Ki."}),
    icon="protein",
))

add(Spec(
    name="Percent Inhibition Calculator",
    slug="percent-inhibition",
    summary=("Percent inhibition compares a treated sample with an untreated control, and there are "
             "two conventions in use: relative to the control signal, and relative to the full "
             "signal window. This calculator reports both, plus the IC50-style fraction remaining."),
    fields=[
        num("control", "Control signal", 1.2, "AU", "Untreated wells"),
        num("sample", "Sample signal", 0.45, "AU", "Treated wells"),
        num("blank", "Blank / background", 0.05, "AU", "No-enzyme or no-cell wells"),
        num("inhibition", "Percent inhibition", "", "%", "", output=True),
        num("remaining", "Percent of control remaining", "", "%", "", output=True),
        num("window", "Percent of signal window", "", "%", "", output=True),
    ],
    dirs=[
        d("Inhibition", "inhibition", "(control-sample)/(control-blank)*100"),
        d("Inhibition", "remaining", "sample/control*100"),
        d("Inhibition", "window", "(sample-blank)/(control-blank)*100"),
    ],
    formula="Inhibition (%) = (control − sample) ÷ (control − blank) × 100",
    symbols=[("control", "mean of untreated wells", "AU"),
             ("sample", "mean of treated wells", "AU"),
             ("blank", "background with no enzyme or no cells", "AU")],
    bands=[("0 – 20%", "Weak", "within assay noise for many systems"),
           ("20 – 80%", "Dose-dependent", "the useful part of a dose–response curve"),
           ("80 – 100%", "Near-complete", "check for cytotoxicity or assay interference")],
    notes=[
        "Blank-correcting both arms matters: a raw comparison against an uncorrected control "
        "understates inhibition whenever the background is a significant fraction of the signal.",
        "Percent inhibition is concentration-dependent; on its own, without the concentration, it "
        "is not a property of the compound.",
        "Aggregators and fluorescence quenchers show up as 100% inhibition at every concentration — "
        "a flat curve is a warning sign, not a hit.",
    ],
    mistakes=[
        "Averaging wells with very different cell numbers and calling it a mean.",
        "Comparing a treated plate read on one day with a control plate read on another.",
        "Reporting inhibition without the concentration and the incubation time.",
    ],
    faq=[
        ("Should I blank-correct?",
         "Yes, both the control and the sample. Otherwise the background dilutes the apparent effect."),
        ("What is a good percent inhibition?",
         "There is no universal threshold; what matters is the shape of the dose–response curve "
         "and the reproducibility of the control."),
    ],
    related=[("/biology/cheng-prusoff-equation", "Cheng–Prusoff equation"),
             ("/biology/percent-viability", "Percent viability"),
             ("/biology/alamarblue-cell-viability", "AlamarBlue viability")],
    svg=("bars", {"caption": "Control, sample and blank, and the inhibition they imply."}),
    icon="plate",
))

add(Spec(
    name="Protein Hydrodynamic Radius Calculator",
    slug="protein-hydrodynamic-radius",
    summary=("The hydrodynamic radius is the effective size a protein presents to the solvent — what "
             "size-exclusion chromatography and dynamic light scattering actually measure. This "
             "calculator estimates it from molecular weight, and converts between radius, diffusion "
             "coefficient and elution behaviour for globular and disordered proteins."),
    fields=[
        num("mw", "Molecular weight", 55000, "Da", ""),
        sel("shape", "Fold", [("Globular", "1"), ("Disordered / coil", "2")], "1"),
        num("viscosity", "Solvent viscosity", 0.89, "cP", "Water at 25 °C = 0.89 cP"),
        num("temp", "Temperature", 25, "°C", ""),
        num("rh", "Hydrodynamic radius", "", "nm", "", output=True),
        num("d", "Diffusion coefficient", "", "µm²/s", "", output=True),
        num("ve", "Relative elution volume (SEC)", "", "Ve/V0", "", output=True),
    ],
    dirs=[
        d("Size", "rh", "if_else(shape==1, 0.066*pow(mw,0.333), 0.192*pow(mw,0.5))"),
        d("Size", "d", "0.0000000000000000000000138*(temp+273.15)/(6*3.14159265358979*viscosity*0.001*(0.066*pow(mw,0.333)*0.000000001))*1000000000000"),
        d("Size", "ve", "1+0.35*pow(0.066*pow(mw,0.333)/2.5,3)"),
    ],
    formula="Globular: Rh ≈ 0.066 × MW^⅓ nm;  D = kT ÷ (6πηR)",
    symbols=[("MW", "molecular weight", "Da"),
             ("Rh", "hydrodynamic radius", "nm"),
             ("η", "solvent viscosity", "Pa·s"),
             ("D", "translational diffusion coefficient", "µm²/s")],
    bands=[("1 – 3 nm", "Small globular", "lysozyme, cytochrome c"),
           ("3 – 6 nm", "Typical globular", "BSA, IgG fragments"),
           ("above 8 nm", "Large or disordered", "multimers, complexes, IDPs")],
    notes=[
        "A disordered protein of the same molecular weight is two to three times larger than a "
        "globular one; the difference is what makes SEC a shape measurement, not just a mass one.",
        "The Stokes–Einstein relation assumes a sphere, which is why a radius derived this way is "
        "'hydrodynamic' rather than geometric.",
        "Glycosylation adds mass without adding much radius per dalton, so heavily modified proteins "
        "sit below the globular line.",
    ],
    mistakes=[
        "Using viscosity in poise where Pa·s is needed (a factor of 10).",
        "Treating the estimate as a measurement: DLS gives the real number.",
        "Comparing Rh across temperatures without correcting the viscosity of water.",
    ],
    faq=[
        ("What is a normal hydrodynamic radius for a 50 kDa protein?",
         "About 3 nm if globular, 6–8 nm if partly disordered."),
        ("Why does my SEC elution suggest a much larger protein?",
         "Because SEC separates by size, and an elongated or disordered protein behaves like a "
         "larger sphere."),
    ],
    related=[("/biology/protein-molar-conversions", "Protein molar conversions"),
             ("/biology/beer-lambert-a280-protein-concentration", "A280 concentration")],
    svg=("chain", {"caption": "Mass and fold give a radius, and the radius gives the diffusion coefficient."}),
    icon="protein",
))

add(Spec(
    name="Protein GRAVY (Hydropathy) Calculator",
    slug="protein-gravy-calculator",
    summary=("GRAVY — grand average of hydropathicity — is the mean Kyte–Doolittle hydropathy of a "
             "protein's residues. Positive values mean the protein is hydrophobic, negative means "
             "hydrophilic, and the number is a quick read on solubility. This calculator computes it "
             "from residue counts."),
    fields=[
        num("hydrophobic", "Hydrophobic residues (A V I L M F W Y)", 120, "", "Counted in the sequence"),
        num("neutral", "Neutral residues (G P S T C N Q)", 80, "", ""),
        num("hydrophilic", "Hydrophilic residues (D E K R H)", 100, "", ""),
        num("total", "Total residues", 300, "", ""),
        num("gravy", "GRAVY", "", "", "", output=True),
        num("hydrophobic_pct", "Hydrophobic fraction", "", "%", "", output=True),
    ],
    dirs=[
        d("Hydropathy", "gravy", "(1.8*hydrophobic+(-0.9)*neutral+(-2.6)*hydrophilic)/total"),
        d("Hydropathy", "hydrophobic_pct", "hydrophobic/total*100"),
    ],
    formula="GRAVY = Σ (hydropathy value of each residue) ÷ number of residues",
    symbols=[("hydrophobic", "A, V, I, L, M, F, W, Y — positive Kyte–Doolittle values", "count"),
             ("neutral", "G, P, S, T, C, N, Q — near zero", "count"),
             ("hydrophilic", "D, E, K, R, H — strongly negative", "count"),
             ("GRAVY", "mean hydropathy, roughly −2 to +2", "—")],
    bands=[("below −1.0", "Hydrophilic", "soluble cytoplasmic protein"),
           ("−1.0 to 0", "Mixed", "soluble, often with a hydrophobic core"),
           ("0 to +0.5", "Hydrophobic", "membrane-associated or aggregation-prone"),
           ("above +0.5", "Strongly hydrophobic", "membrane protein or a fragment of one")],
    notes=[
        "The grouped average uses representative values; residue-exact GRAVY needs the real sequence "
        "and a lookup table, which is what ProtParam does.",
        "GRAVY is a bulk property: a soluble protein can contain a strongly hydrophobic stretch "
        "(a transmembrane helix) and still average out hydrophilic.",
        "For aggregation risk, look at the hydrophobic fraction inside a sliding window, not the "
        "whole-protein average.",
    ],
    mistakes=[
        "Counting residues twice or using the sequence length instead of the counted total.",
        "Reading GRAVY as a solubility test — it correlates with, but does not determine, solubility.",
    ],
    sources=["Kyte & Doolittle (1982), Journal of Molecular Biology 157:105–132."],
    faq=[
        ("What GRAVY value means a protein is soluble?",
         "Usually below 0, and comfortably below −0.5. Overexpression constructs often carry a "
         "fusion tag partly to push GRAVY down."),
        ("Is GRAVY the same as the hydropathy plot?",
         "No. GRAVY is one number for the whole protein; a hydropathy plot slides a window along "
         "the sequence to find transmembrane segments."),
    ],
    related=[("/biology/protein-molar-conversions", "Protein molar conversions"),
             ("/biology/protein-hydrodynamic-radius", "Protein hydrodynamic radius")],
    svg=("gauge", {"scale": (-2, 2), "bands": [(-2, -1, "hydrophilic"), (-1, 0, "mixed"),
                                               (0, 0.5, "hydrophobic"), (0.5, 2, "very hydrophobic")],
                   "caption": "GRAVY on the Kyte–Doolittle scale."}),
    icon="protein",
))

add(Spec(
    name="Enzyme Kinetics: Specific Activity and Yield",
    slug="enzyme-specific-activity-yield",
    summary=("Purification tables report specific activity and fold purification, and both come from "
             "the same three numbers: total protein, total activity and the starting values. This "
             "calculator builds the two summary figures for any step and shows what the recovery "
             "cost."),
    fields=[
        num("total_protein", "Total protein in this step", 45, "mg", ""),
        num("total_activity", "Total activity in this step", 5400, "U", ""),
        num("start_protein", "Total protein in the starting material", 900, "mg", ""),
        num("start_activity", "Total activity in the starting material", 7200, "U", ""),
        num("specific", "Specific activity", "", "U/mg", "", output=True),
        num("start_specific", "Starting specific activity", "", "U/mg", "", output=True),
        num("fold", "Fold purification", "", "×", "", output=True),
        num("yield", "Activity yield", "", "%", "", output=True),
    ],
    dirs=[
        d("Purification", "specific", "total_activity/total_protein"),
        d("Purification", "start_specific", "start_activity/start_protein"),
        d("Purification", "fold", "(total_activity/total_protein)/(start_activity/start_protein)"),
        d("Purification", "yield", "total_activity/start_activity*100"),
    ],
    formula="Specific activity = total activity ÷ total protein;  fold = specific ÷ starting specific;  "
            "yield = activity recovered ÷ activity started with × 100",
    symbols=[("total protein", "protein in the fraction", "mg"),
             ("total activity", "units in the fraction", "U"),
             ("fold", "purification factor", "×"),
             ("yield", "recovery of activity", "%")],
    notes=[
        "Fold purification and yield always trade off: the step that purifies most is usually the "
        "one that loses the most activity.",
        "A step with a fold below 1 has removed protein and activity in the same proportion — it is "
        "a concentration step, not a purification step.",
        "Specific activity is only comparable if it is measured at the same temperature, pH and "
        "substrate concentration in every row of the table.",
    ],
    mistakes=[
        "Using the protein concentration of the fraction instead of the total.",
        "Adding the yields of successive steps — they multiply, not add.",
        "Comparing specific activities measured with different substrates.",
    ],
    faq=[
        ("What is a good fold purification?",
         "There is no target; what matters is that specific activity rises and enough activity "
         "survives for the next step."),
        ("Why did my yield rise?",
         "Usually activation or removal of an inhibitor — or an assay artefact. Re-measure before "
         "believing it."),
    ],
    related=[("/biology/enzyme-unit-converter", "Enzyme unit converter"),
             ("/chemistry/enzyme-activity", "Enzyme activity"),
             ("/biology/bca-assay-calculator", "BCA assay")],
    svg=("chain", {"caption": "Activity over protein gives specific activity; compare it with the start."}),
    icon="protein",
))

add(Spec(
    name="Osmolarity / Osmotic Pressure Calculator",
    slug="osmolarity-osmotic-pressure",
    summary=("Osmolarity counts the particles a solute produces in solution, which is why 150 mM NaCl "
             "is 300 mOsm. This calculator converts concentration, osmolality and osmotic pressure, "
             "and it handles the dissociation factor that makes salt and sugars behave differently."),
    fields=[
        num("conc", "Molar concentration", 150, "mM", "Total solute molarity"),
        num("i", "Dissociation factor (i)", 2, "", "2 for NaCl, 1 for glucose, 1.8 for a weak electrolyte"),
        num("temp", "Temperature", 37, "°C", ""),
        num("osmolarity", "Osmolarity", "", "mOsm/L", "", output=True),
        num("pressure", "Osmotic pressure", "", "kPa", "", output=True),
        num("atm", "Osmotic pressure", "", "atm", "", output=True),
    ],
    dirs=[
        d("Osmotic pressure", "osmolarity", "conc*i"),
        d("Osmotic pressure", "pressure", "conc*i*8.314*(temp+273.15)/1000"),
        d("Osmotic pressure", "atm", "conc*i*0.082057*(temp+273.15)/1000"),
    ],
    formula="Osmolarity = M × i;  π = iMRT",
    symbols=[("M", "molar concentration", "mol/L"),
             ("i", "van 't Hoff factor, particles per formula unit", "—"),
             ("R", "gas constant", "8.314 J/mol·K"),
             ("π", "osmotic pressure", "kPa")],
    bands=[("275 – 295 mOsm/L", "Isotonic", "plasma-like; safe for cells"),
           ("below 275", "Hypotonic", "cells swell and can lyse"),
           ("above 295", "Hypertonic", "cells shrink; used for cryopreservation")],
    notes=[
        "Osmolarity is per litre of solution; osmolality is per kilogram of water. In dilute "
        "solutions they are the same; in plasma they differ by about 1%.",
        "Osmotic pressure is a colligative property: it depends on particle count, not identity. "
        "That is why 150 mM NaCl and 300 mM glucose are both about 300 mOsm.",
        "Cell culture media are formulated to 260–320 mOsm/L, and adding a drug stock can push a "
        "medium out of range if the stock is concentrated in salt.",
    ],
    mistakes=[
        "Forgetting the dissociation factor for salts.",
        "Entering concentration in mmol/L and reading the result as molar.",
        "Using 8.314 with pressure in atm.",
    ],
    sources=["van 't Hoff relation; physiological ranges from standard clinical chemistry references."],
    faq=[
        ("What is the osmolarity of normal saline?",
         "154 mM NaCl × 2 = 308 mOsm/L, close to plasma at about 290."),
        ("Why is osmolality used in clinical work?",
         "Because it is measured per kilogram of water, which does not change with temperature or "
         "with the volume the solute displaces."),
    ],
    related=[("/chemistry/molarity", "Molarity"),
             ("/chemistry/percent-solution", "Percent solution"),
             ("/biology/dilution-calculator-c1v1", "Dilution (C1V1 = C2V2)")],
    svg=("chain", {"caption": "Concentration × particles, then the gas law, gives osmotic pressure."}),
    icon="drop",
))
