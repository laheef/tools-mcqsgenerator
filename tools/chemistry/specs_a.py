"""Batch 1a — amount of substance: moles, mass, molar mass, particles."""

from __future__ import annotations

from lib import F, R, SEL, S

SPECS = [

    S(
        slug="mole",
        name="Mole Calculator",
        title="Mole Calculator: Mass to Moles and Particles",
        desc="Type a weighed mass and the molar mass of a substance and the calculator returns moles and a molecule count, with the formula and every rearrangement shown.",
        what=("<p>A mole is a counting unit: 6.022 140 76 × 10²³ particles, whether those are atoms, "
              "ions or molecules. The number of moles in a sample is its mass divided by its molar mass, "
              "<strong>n = m ÷ M</strong>, and this calculator applies that one relationship in both "
              "directions — type the mass and molar mass to get moles, or type moles and one of the other "
              "two to get the missing quantity.</p>"),
        fields=[
            F("mass", "Mass of sample (m)", "g", 36.46,
              "Weighed mass of the substance, in grams"),
            F("molar_mass", "Molar mass (M)", "g/mol", 36.46,
              "Mass of one mole of the substance — 36.46 for HCl, 18.015 for water"),
        ],
        results=[
            R("moles", "Amount of substance (n)", "mol"),
            R("particles", "Number of particles (N)", ""),
        ],
        formula={
            "moles": "mass/molar_mass",
            "particles": "mass/molar_mass*6.02214076e23",
            "mass": "moles*molar_mass",
            "molar_mass": "mass/moles",
        },
        prose={
            "why": ("<p>The arithmetic is trivial; what people come to the page for is the answer in a "
                    "readable form. A mass in grams says nothing about how many particles are reacting, "
                    "because atoms differ in mass. Moles put every substance on the same footing, which is "
                    "why every balanced equation is written in them.</p>"),
            "formula_note": ("<p>Molar mass is the bridge between the two: it carries the units "
                             "g mol⁻¹, so grams divided by g mol⁻¹ leaves moles. If you only have a "
                             "formula, add up the atomic masses — water is 2 × 1.008 + 15.999 = 18.015 g/mol.</p>"),
            "example_note": ("<p>36.46 g of hydrogen chloride is 36.46 ÷ 36.46 = 1 mol, and that mole "
                             "holds 6.022 × 10²³ HCl molecules. The values above are chosen so the answer is "
                             "exactly one mole and the particle count is exactly Avogadro's number.</p>"),
            "reading": ("<p>The two results answer different questions. <strong>Amount of substance</strong> "
                        "is the chemist's count, the one that goes into stoichiometry. <strong>Number of "
                        "particles</strong> is the same quantity written as objects, which is useful for "
                        "colligative properties and for anything involving a single molecule.</p>"),
            "sensitivity_note": ("<p>Both results move in proportion to mass and both move against molar "
                                 "mass, so a molar mass entered 10 % too high gives an answer 9.09 % too low.</p>"),
            "scenarios": [
                {"inputs": {"mass": 18.015, "molar_mass": 18.015},
                 "note": "One mole of water weighs 18.015 g."},
                {"inputs": {"mass": 180.16, "molar_mass": 180.16},
                 "note": "The same pattern holds for glucose: its own molar mass in grams is one mole."},
            ],
            "pitfalls": [
                "<strong>Molar mass of an element mistaken for its molecule.</strong> Oxygen gas is O₂, "
                "32.00 g/mol, not the 16.00 g/mol atomic mass. Halving the molar mass doubles the moles "
                "and nothing on the page will flag it.",
                "<strong>Percentage purity ignored.</strong> A 90 % pure sample of 36.46 g holds 0.9 mol, "
                "not 1 mol. Multiply the weighed mass by the purity before entering it.",
                "<strong>Hydrated salts.</strong> CuSO₄·5H₂O has a molar mass of 249.68 g/mol, not 159.61; "
                "the water of crystallisation counts.",
            ],
            "units_note": ("<p>The particle count has no unit — it is a number of objects. Written out it "
                           "runs to twenty-four digits, so the page reports it in scientific notation.</p>"),
            "limits": [
                "<strong>It assumes a pure, identified substance.</strong> A mixture has a molar mass only "
                "if you define an average; the page has no way to know what you weighed.",
                "<strong>It cannot tell elements from compounds.</strong> Whether 32 g/mol means O₂ or S is "
                "outside the arithmetic — the number you enter is the one used.",
            ],
            "uses": [
                "<li>Converting a bench weight into the amount a balanced equation asks for.</li>",
                "<li>Checking a solution's strength before diluting it.</li>",
                "<li>Turning a measured mass of a gas into the moles that occupy a stated volume.</li>",
            ],
        },
        faq=[
            ("What is a mole in plain terms?",
             "6.022 140 76 × 10²³ particles — the number of particles as there are atoms in 12 g of carbon-12. "
             "It is a count, not a mass, which is why the same one mole weighs different amounts in different substances."),
            ("Why does the page report particles as well as moles?",
             "Because two of the same question are often useful in one go. Stoichiometry wants moles; "
             "colligative properties, spectroscopy and single-molecule work want the count."),
        ],
        related=[("/chemistry/molar-mass", "Molar mass"),
                 ("/chemistry/grams-to-moles", "Grams to moles"),
                 ("/chemistry/avogadro", "Avogadro's number")],
    ),

    S(
        slug="molar-mass",
        name="Molar Mass Calculator",
        title="Molar Mass Calculator: Mass Over Moles, g/mol",
        desc="Divide a weighed sample by the number of moles it holds to confirm its molar mass in g/mol, then read the mass of a single molecule of the compound in grams.",
        what=("<p>Molar mass is the mass one mole of a substance carries, <strong>M = m ÷ n</strong>, "
              "reported in g/mol. Weigh a sample, know how many moles it contains — from a titration, from "
              "a known formula, or from the page's own mole calculator — and this one returns the molar mass "
              "and the mass of one molecule of the substance.</p>"),
        fields=[
            F("mass", "Mass of sample (m)", "g", 5.85, "Weighed mass, in grams"),
            F("moles", "Amount of substance (n)", "mol", 0.1, "Moles present in that mass"),
        ],
        results=[
            R("molar_mass", "Molar mass (M)", "g/mol"),
            R("molecule_mass", "Mass of one molecule", "g"),
        ],
        formula={
            "molar_mass": "mass/moles",
            "molecule_mass": "mass/moles/6.02214076e23",
            "mass": "molar_mass*moles",
            "moles": "mass/molar_mass",
        },
        prose={
            "why": ("<p>Molar mass is how an identity is confirmed. A compound with a formula mass of "
                    "58.44 g/mol that comes out of the arithmetic at 118.7 is not the compound the label "
                    "claims — usually a hydrate, a dimer, or a salt that has picked up a counter-ion.</p>"),
            "formula_note": ("<p>The calculation is a division, so it is the mass that carries the precision. "
                             "A four-figure balance and a five-figure mole count give a molar mass good to "
                             "four figures, whatever the display shows.</p>"),
            "example_note": ("<p>5.85 g of sodium chloride is 0.1 mol, so the molar mass is 5.85 ÷ 0.1 = "
                             "58.5 g/mol — within 0.1 % of the tabulated 58.44. The second result divides "
                             "that by Avogadro's number: 9.7 × 10⁻²³ g for a single NaCl formula unit.</p>"),
            "reading": ("<p>Compare the answer with the formula mass you expected. A match to within a "
                        "per cent is confirmation; a ratio of exactly 2 or 3 usually means a dimer or a "
                        "missing coefficient in the formula you assumed; a fraction such as 0.5 means the "
                        "mole count belongs to a two-ion formula unit.</p>"),
            "scenarios": [
                {"inputs": {"mass": 18.015, "moles": 1},
                 "note": "One mole of water weighs 18.015 g, so the molar mass is 18.015 g/mol."},
                {"inputs": {"mass": 0.5, "moles": 0.01},
                 "note": "A 0.5 g sample containing 0.01 mol has a molar mass of 50 g/mol."},
            ],
            "pitfalls": [
                "<strong>Moles taken from the mass instead of measured.</strong> If n was itself calculated "
                "from m using an assumed molar mass, dividing gives the assumption back and confirms nothing.",
                "<strong>Water of crystallisation left out of the mole count.</strong> A hydrated salt has "
                "fewer formula units per gram than the anhydrous one, so the molar mass comes out high.",
                "<strong>Mass of solution used as mass of solute.</strong> A dissolved sample weighs less "
                "than the solution it sits in; use the mass that is actually the substance.",
            ],
            "units_note": ("<p>g/mol and Da are numerically identical: 58.44 g/mol is 58.44 Da. The second "
                           "result is per molecule, so it is reported in grams and runs to 22 orders of "
                           "magnitude below it.</p>"),
            "limits": [
                "<strong>It reports an average.</strong> Natural isotopic abundance is what makes chlorine "
                "35.45 g/mol rather than 35; a single isotopologue has a different, exact mass.",
                "<strong>It cannot identify the substance.</strong> Isomers share a molar mass exactly; "
                "the number is necessary but not sufficient.",
            ],
            "uses": [
                "<li>Confirming that the solid in the bottle is what the label says.</li>",
                "<li>Deriving the formula mass to use in every later stoichiometry step.</li>",
                "<li>Spotting a hydrate: the difference between the answer and the formula mass, divided "
                "by 18.015, is the number of water molecules.</li>",
            ],
        },
        faq=[
            ("Is molar mass the same as molecular weight?",
             "Numerically yes — both are the mass of one mole in g/mol, and in daltons for a single "
             "molecule. Molar mass is the stricter term when the substance is ionic and has no discrete "
             "molecules."),
            ("How many decimals should I keep?",
             "As many as your mass measurement supports and no more. The page prints three decimals; "
             "the underlying value keeps full precision for any further step."),
        ],
        related=[("/chemistry/mole", "Mole"),
                 ("/chemistry/molecular-weight", "Molecular weight"),
                 ("/chemistry/average-atomic-mass", "Average atomic mass")],
    ),

    S(
        slug="molecular-weight",
        name="Molecular Weight Calculator",
        title="Molecular Weight Calculator: Da, kDa & g/mol",
        desc="Turn a measured mass and a mole count into molecular weight in daltons, kilodaltons and grams per molecule, at whichever scale your bench work happens to use.",
        what=("<p>Molecular weight is the mass of one molecule measured against one-twelfth of a carbon-12 "
              "atom. It is numerically the same as molar mass in g/mol, but it is the unit a "
              "biochemist or a mass spectrometrist reads: <strong>MW = m ÷ n</strong>, reported here in "
              "daltons, in kilodaltons, and as the mass of a single molecule in grams.</p>"),
        fields=[
            F("mass", "Mass of sample (m)", "g", 20,
              "Weighed mass of the purified substance"),
            F("moles", "Amount of substance (n)", "mol", 0.25,
              "Moles in that mass, from the formula or a titration"),
        ],
        results=[
            R("mw_da", "Molecular weight", "Da"),
            R("mw_kda", "Molecular weight", "kDa"),
            R("molecule_mass", "Mass of one molecule", "g"),
        ],
        formula={
            "mw_da": "mass/moles",
            "mw_kda": "mass/moles/1000",
            "molecule_mass": "mass/moles/6.02214076e23",
            "mass": "mw_da*moles",
            "moles": "mass/mw_da",
        },
        prose={
            "why": ("<p>The dalton is defined so that the molecular weight of a molecule and the molar mass "
                    "of a mole of those molecules agree exactly. That makes the number portable: 66 000 Da "
                    "of albumin is 66 kDa or 66 kg/mol, and all three describe the same thing.</p>"),
            "formula_note": ("<p>The only conversion here is the unit: 1 kDa = 1000 Da, and both are the same "
                             "number as g/mol. The third result divides by Avogadro's number to give the mass "
                             "of one molecule in grams.</p>"),
            "example_note": ("<p>A 20 g sample containing 0.25 mol has a molecular weight of 80 Da — small "
                             "enough to be a single amino acid. A protein of 66 kDa would need 0.25 mol to "
                             "weigh 16.5 kg, which is why protein samples are usually given in milligrams and "
                             "the mole count runs to nanomoles.</p>"),
            "reading": ("<p>Read the dalton figure against what you expect for the class of molecule: "
                        "under 300 Da for a drug, a few hundred to a few thousand for a peptide, 10–150 kDa "
                        "for most proteins, and megadaltons for a polymer or a virus capsid.</p>"),
            "scenarios": [
                {"inputs": {"mass": 1, "moles": 1e-5},
                 "note": "1 g holding 10 µmol gives 100 kDa — the size of a mid-sized enzyme."},
                {"inputs": {"mass": 0.00018, "moles": 1e-6},
                 "note": "180 µg in 1 µmol is 180 Da, the molecular weight of glucose."},
            ],
            "pitfalls": [
                "<strong>Moles entered in millimoles.</strong> 0.25 mmol is 0.00025 mol; entering 0.25 makes "
                "the molecular weight a thousand times too small.",
                "<strong>Molecular weight read as molecular radius.</strong> It says nothing about shape; "
                "two molecules of the same weight can differ tenfold in hydrodynamic size.",
                "<strong>A mixture averaged as if pure.</strong> The result is a weight-average over whatever "
                "was in the sample, which is legitimate but must be described as one.",
            ],
            "units_note": ("<p>Dalton and g/mol are the same number by definition, so the kDa result is the "
                           "first divided by a thousand — no physical conversion is happening, only a change "
                           "of scale.</p>"),
            "limits": [
                "<strong>It assumes one species.</strong> A sample with aggregates shows a multiple of the "
                "true weight and tells you nothing about which multiple.",
                "<strong>It is a mass, not a sequence.</strong> Post-translational modification, salt "
                "adducts and glycosylation all move the number.",
            ],
            "uses": [
                "<li>Reading a mass spectrum: the [M+H]⁺ peak sits one dalton above the molecular weight.</li>",
                "<li>Converting between milligrams of protein and nanomoles for an assay.</li>",
                "<li>Sizing a band on a gel before running the standard curve.</li>",
            ],
        },
        faq=[
            ("Why are Da and g/mol the same number?",
             "Because the mole is defined as exactly Avogadro's number of entities, and the dalton as "
             "one-twelfth of a carbon-12 atom. Multiplying one molecule's mass in daltons by Avogadro's "
             "number gives that molecule's molar mass in grams."),
        ],
        related=[("/chemistry/molar-mass", "Molar mass"),
                 ("/chemistry/mole", "Mole"),
                 ("/chemistry/moles-to-atoms", "Moles to atoms")],
    ),

    S(
        slug="grams-to-moles",
        name="Grams to Moles Calculator",
        title="Grams to Moles Calculator: g to mol and mmol",
        desc="Convert grams to moles with the molar mass, reported in mol, mmol and micromoles, so a protocol written at any of those scales can be followed exactly.",
        what=("<p>Grams and moles are the two ways of saying how much of a substance you have, and the "
              "molar mass converts between them: <strong>n = m ÷ M</strong>. This page takes the mass you "
              "weighed and the molar mass of the compound, and reports the amount in moles, millimoles and "
              "micromoles, because a bench protocol is usually written in one of the last two.</p>"),
        fields=[
            F("mass", "Mass (m)", "g", 100,
              "What the balance reads"),
            F("molar_mass", "Molar mass (M)", "g/mol", 18.015,
              "Sum of the atomic masses; 18.015 for water"),
        ],
        results=[
            R("moles", "Amount (n)", "mol"),
            R("millimoles", "Amount", "mmol"),
            R("micromoles", "Amount", "µmol"),
        ],
        formula={
            "moles": "mass/molar_mass",
            "millimoles": "mass/molar_mass*1000",
            "micromoles": "mass/molar_mass*1000000",
            "mass": "moles*molar_mass",
            "molar_mass": "mass/moles",
        },
        prose={
            "why": ("<p>Most mistakes in a wet lab happen in this conversion, not in the reaction. A "
                    "protocol asking for 2 mmol and a balance reading in grams need one exact division "
                    "between them, and doing it three times at three scales is how people stop making it "
                    "in their heads.</p>"),
            "formula_note": ("<p>The three results are the same quantity in different units, so they move "
                             "together. If the mole figure is right the millimole figure is right, and the "
                             "page is only saving you the decimal point.</p>"),
            "example_note": ("<p>100 g of water is 100 ÷ 18.015 = 5.551 mol, which is 5 551 mmol or "
                             "5.55 × 10⁶ µmol. All three results describe the same beaker.</p>"),
            "reading": ("<p>Cross-check the magnitude before anything else: molecular compounds sit in the "
                        "tens to hundreds of g/mol, so a gram is a millimole to a few tens of millimoles. "
                        "Salts and metals are similar. A figure a thousand times out is a molar mass entered "
                        "in the wrong units, not a new compound.</p>"),
            "scenarios": [
                {"inputs": {"mass": 58.44, "molar_mass": 58.44},
                 "note": "One molar mass in grams is exactly one mole, which is the quickest check of any conversion."},
                {"inputs": {"mass": 0.0058, "molar_mass": 58.44},
                 "note": "5.8 mg of salt is about 0.1 mmol — the scale most bench protocols are written at."},
            ],
            "pitfalls": [
                "<strong>Molar mass typed in kDa.</strong> A protein of 66 kDa is 66 000 g/mol; entering 66 "
                "multiplies the answer by a thousand.",
                "<strong>Mass of a solution used as mass of solute.</strong> A 10 % solution weighs ten times "
                "the solute in it.",
                "<strong>Rounding the molar mass too early.</strong> Using 18 instead of 18.015 costs 0.08 %, "
                "which matters when the answer feeds a second calculation.",
            ],
            "units_note": ("<p>mmol is 10⁻³ mol and µmol is 10⁻⁶ mol. A molar mass in g/mol with a mass in "
                           "grams gives moles directly; any other mass unit has to be converted first.</p>"),
            "limits": [
                "<strong>It needs the right molar mass.</strong> Hydrates, counter-ions and impurities all "
                "change it, and the page cannot see any of them.",
                "<strong>It assumes the sample is what the label says.</strong> A purity figure has to be "
                "applied to the mass before it is entered here.",
            ],
            "uses": [
                "<li>Scaling a recipe written in millimoles to the grams a balance can weigh.</li>",
                "<li>Preparing a stock solution of a stated molarity.</li>",
                "<li>Converting a purchased vial's stated mass into the amount a protocol asks for.</li>",
            ],
        },
        faq=[
            ("How do I go the other way — moles to grams?",
             "Multiply by the molar mass. The page does that too: type the moles into the amount box and "
             "clear the mass box, and it solves for the mass instead."),
            ("Does this work for gases and solutions?",
             "Yes for the mass-to-mole step; it is the same division for any substance. What changes is how "
             "you get the mass in the first place — for solutions you need the density and the strength."),
        ],
        related=[("/chemistry/mole", "Mole"),
                 ("/chemistry/molar-mass", "Molar mass"),
                 ("/chemistry/moles-to-atoms", "Moles to atoms")],
    ),

    S(
        slug="moles-to-atoms",
        name="Moles to Atoms Calculator",
        title="Moles to Atoms Calculator: Avogadro's Count",
        desc="Multiply moles by Avogadro's number to get the molecule count, then by the number of atoms in a formula unit for the total number of atoms in the sample.",
        what=("<p>One mole holds Avogadro's number of particles, so the particle count is "
              "<strong>N = n × N<sub>A</sub></strong>. For a compound there are two counts worth having: the "
              "number of formula units and the number of atoms, which is that first number multiplied by how "
              "many atoms one unit contains.</p>"),
        fields=[
            F("moles", "Amount of substance (n)", "mol", 0.5,
              "Moles of the compound"),
            F("atoms_per_unit", "Atoms per formula unit", "", 2,
              "2 for O₂, 3 for H₂O, 24 for C₆H₁₂O₆"),
        ],
        results=[
            R("molecules", "Formula units (molecules)", ""),
            R("atoms", "Atoms", ""),
        ],
        formula={
            "molecules": "moles*6.02214076e23",
            "atoms": "moles*6.02214076e23*atoms_per_unit",
            "moles": "molecules/6.02214076e23",
            "atoms_per_unit": "atoms/molecules",
        },
        prose={
            "why": ("<p>Atom counts matter whenever a reaction happens at a surface, in a single molecule, "
                    "or in a detector that registers individual events. The mole is a bookkeeping unit; the "
                    "count is what the physics sees.</p>"),
            "formula_note": ("<p>Count the atoms in the formula carefully before typing the second box: "
                             "C₆H₁₂O₆ has 6 + 12 + 6 = 24 atoms, not 3. The page multiplies, it does not "
                             "read formulae.</p>"),
            "example_note": ("<p>Half a mole of O₂ contains 3.011 × 10²³ molecules and 6.022 × 10²³ atoms, "
                             "because each molecule carries two oxygen atoms. Notice that the atom count "
                             "equals one mole's worth exactly — 0.5 mol × 2 atoms is 1 mol of atoms.</p>"),
            "reading": ("<p>Check the relationship between the two results before trusting either: the atom "
                        "count should be a small whole multiple of the molecule count. If it is not, the "
                        "atoms-per-unit figure was typed with a decimal point in it.</p>"),
            "scenarios": [
                {"inputs": {"moles": 1, "atoms_per_unit": 1},
                 "note": "One mole of a monatomic element is Avogadro's number of atoms — the definition."},
                {"inputs": {"moles": 0.25, "atoms_per_unit": 24},
                 "note": "0.25 mol of glucose holds 6 mol of atoms in total, 24 per molecule."},
            ],
            "pitfalls": [
                "<strong>Counting molecules as atoms.</strong> For O₂ the two differ by a factor of two — "
                "the single most common error on this page.",
                "<strong>Using the empirical formula count.</strong> C₆H₁₂O₆ and CH₂O share a ratio but not "
                "a molecule; the count per molecule depends on which one you mean.",
                "<strong>Exponent slips when typing moles.</strong> 1e-3 mol is a thousand times smaller "
                "than 1 mol, and the answer inherits the error exactly.",
            ],
            "units_note": ("<p>Neither result carries a unit: both are counts. They are printed in "
                           "scientific notation because even a micromole runs to seventeen digits.</p>"),
            "limits": [
                "<strong>It is a count of formula units, not of distinct species.</strong> In solution a salt "
                "may be dissociated, and then the ion count, not the formula-unit count, is what reacts.",
                "<strong>It says nothing about state.</strong> The same count of molecules can be a gas, a "
                "liquid or a solid.",
            ],
            "uses": [
                "<li>Working out how many molecules sit in a monolayer on a surface.</li>",
                "<li>Converting a molar concentration into molecules per litre.</li>",
                "<li>Checking that a stoichiometric ratio makes sense in particles as well as in moles.</li>",
            ],
        },
        faq=[
            ("How many atoms are in a mole of a compound?",
             "Avogadro's number times the number of atoms in one formula unit. A mole of water holds "
             "1.806 × 10²⁴ atoms: three per molecule."),
        ],
        related=[("/chemistry/avogadro", "Avogadro's number"),
                 ("/chemistry/mole", "Mole"),
                 ("/chemistry/percent-composition", "Percent composition")],
    ),

    S(
        slug="avogadro",
        name="Avogadro's Number Calculator",
        title="Avogadro's Number Calculator: Particles / Moles",
        desc="Divide a counted number of particles by the moles they represent and compare the result with the defined 6.022 140 76 × 10²³ particles per mole of substance.",
        what=("<p>Avogadro's constant is the number of particles in one mole, "
              "<strong>N<sub>A</sub> = N ÷ n</strong>. Since the 2019 revision of SI it is fixed by "
              "definition at 6.022 140 76 × 10²³ mol⁻¹, so this page is really a check: divide a counted "
              "number of particles by the moles they represent and see whether the arithmetic and the "
              "count agree.</p>"),
        fields=[
            F("particles", "Number of particles (N)", "", 1.204428152e24,
              "Counted or calculated number of particles"),
            F("moles", "Amount of substance (n)", "mol", 2,
              "Moles those particles represent"),
        ],
        results=[
            R("avogadro", "Avogadro's constant (Nₐ)", "1/mol"),
            R("moles_check", "Amount implied by the count", "mol"),
        ],
        formula={
            "avogadro": "particles/moles",
            "moles_check": "particles/6.02214076e23",
            "particles": "avogadro*moles",
            "moles": "particles/avogadro",
        },
        prose={
            "why": ("<p>The constant is exact, but counts never are. This page is how you find out how far "
                    "a measured count lands from the definition — a useful check on a particle-counting "
                    "experiment, a coulometry run, or a student's first calculation.</p>"),
            "formula_note": ("<p>The second result is the same division the other way round: it applies the "
                             "defined constant to the count, so a discrepancy in the first result shows up "
                             "here as a mole figure that disagrees with the one you typed.</p>"),
            "example_note": ("<p>1.2044 × 10²⁴ particles over 2 mol gives 6.022 × 10²³ mol⁻¹, the defined "
                             "value to four significant figures. The check result returns exactly 2 mol.</p>"),
            "reading": ("<p>Agreement to the first four digits means the count and the amount are consistent. "
                        "The constant is exact, so any gap between the two is a gap in the count, the mole "
                        "figure or the arithmetic that produced them — never in the definition itself.</p>"
                        "<p>A result within a few per cent is a normal experimental spread. A factor of two or "
                        "ten out is a unit or a mole-basis error, not a measurement.</p>"),
            "scenarios": [
                {"inputs": {"particles": 6.02214076e23, "moles": 1},
                 "note": "One mole of anything is exactly the defined constant."},
                {"inputs": {"particles": 1e20, "moles": 1e-4},
                 "note": "Small counts work the same way: 10²⁰ particles in 0.1 mmol still gives 10²⁴ per mole."},
            ],
            "pitfalls": [
                "<strong>Particles entered per litre.</strong> A concentration is not a count; multiply by "
                "the volume first, or the answer is off by that volume.",
                "<strong>Moles entered as millimoles.</strong> 2 mmol is 0.002 mol and changes the result by "
                "a factor of a thousand.",
                "<strong>Formula units counted as atoms.</strong> Avogadro's number counts whatever you "
                "counted; mixing the two gives a result that is wrong by the atoms-per-unit factor.",
            ],
            "units_note": ("<p>The result carries the unit mol⁻¹ — per mole — because it is a number of "
                           "particles divided by a number of moles. It is a defined constant, not a "
                           "measurement, so it should reproduce to the digits you typed.</p>"),
            "limits": [
                "<strong>It cannot validate a count.</strong> If the particle figure came from the same "
                "moles by the same constant, the answer is circular and proves nothing.",
                "<strong>It assumes identical particles.</strong> A mixture needs a statement of what was "
                "counted before the division means anything.",
            ],
            "uses": [
                "<li>Checking a particle-counting experiment against the defined constant.</li>",
                "<li>Converting between molar and molecular scales in a calculation.</li>",
                "<li>Teaching why the mole is a count rather than a mass.</li>",
            ],
        },
        faq=[
            ("Is Avogadro's number a measured value?",
             "No longer. Since 2019 the mole is defined by fixing Avogadro's constant at exactly "
             "6.022 140 76 × 10²³ mol⁻¹, so the number is exact and the mole is what the measurement defines."),
        ],
        related=[("/chemistry/moles-to-atoms", "Moles to atoms"),
                 ("/chemistry/mole", "Mole"),
                 ("/chemistry/molar-mass", "Molar mass")],
    ),
]
