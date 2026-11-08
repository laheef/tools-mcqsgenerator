"""Batch 3 — stoichiometry and yield: formulas from composition, yields, ratios."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="empirical-formula",
        name="Empirical Formula Calculator",
        title="Empirical Formula Calculator: Percent to Subscript",
        desc="Turn a percentage composition into the simplest whole-number ratio of atoms, then scale that ratio up to the molecular formula using the compound's molar mass.",
        what=("<p>An empirical formula is the smallest whole-number ratio of atoms a compound can have. "
              "Divide each element's percentage by its atomic mass to get moles, divide every mole "
              "figure by the smallest, and the quotients are the subscripts. Scale by the compound's "
              "molar mass and the same ratio becomes the molecular formula.</p>"),
        fields=[
            F("percent_a", "Mass of element A in 100 g", "%", 69.94,
              "Percentage by mass of the first element; in 100 g of sample this is also its mass in grams"),
            F("molar_mass_a", "Atomic mass of element A", "g/mol", 55.845,
              "From the periodic table — iron is 55.845"),
            F("percent_b", "Mass of element B in 100 g", "%", 30.06,
              "Percentage by mass of the second element"),
            F("molar_mass_b", "Atomic mass of element B", "g/mol", 15.999,
              "Oxygen is 15.999"),
            F("compound_molar_mass", "Molar mass of the compound", "g/mol", 159.69,
              "From a mass spectrometry or freezing point measurement; use the empirical mass itself if you only want the ratio"),
        ],
        results=[
            R("mol_a", "Moles of element A per 100 g", "mol"),
            R("mol_b", "Moles of element B per 100 g", "mol"),
            R("ratio_a", "Subscript ratio for element A", ""),
            R("ratio_b", "Subscript ratio for element B", ""),
            R("multiplier", "Multiplier to the molecular formula", ""),
        ],
        formula={
            "mol_a": "percent_a/molar_mass_a",
            "mol_b": "percent_b/molar_mass_b",
            "ratio_a": "mol_a/min(mol_a,mol_b)",
            "ratio_b": "mol_b/min(mol_a,mol_b)",
            "multiplier": "compound_molar_mass/(mol_a/min(mol_a,mol_b)*molar_mass_a+mol_b/min(mol_a,mol_b)*molar_mass_b)",
            "percent_a": "mol_a*molar_mass_a",
            "molar_mass_a": "percent_a/mol_a",
            "percent_b": "mol_b*molar_mass_b",
            "molar_mass_b": "percent_b/mol_b",
            "compound_molar_mass": "multiplier*(ratio_a*molar_mass_a+ratio_b*molar_mass_b)",
        },
        prose={
            "why": ("<p>Percentages off an elemental analyser describe mass, and mass is not what a formula "
                    "is written in. Moles are. The division by atomic mass is the whole conversion, and the "
                    "ratio that comes out is the formula — no need to know the compound beforehand.</p>"),
            "formula_note": ("<p>The multiplier is the compound's molar mass divided by the mass of the "
                             "empirical unit. Iron oxide at 1 : 1.5 has an empirical mass of 79.85 g/mol; a "
                             "measured 159.69 g/mol is exactly twice that, so the molecular formula is "
                             "Fe₂O₃, not FeO₁.₅.</p>"),
            "example_note": ("<p>69.94 % iron and 30.06 % oxygen gives 1.252 mol of Fe and 1.879 mol of O "
                             "per 100 g. Dividing both by 1.252 gives 1 and 1.5 — a ratio, not yet a "
                             "formula, because subscripts are whole numbers.</p>"),
            "reading": ("<p>When a ratio lands near a half or a third, multiply the whole set: 1 : 1.5 is "
                        "2 : 3, and 1 : 1.33 is 3 : 4. When it lands near 0.98 or 1.02, round it to the "
                        "integer — that spread is what the last two digits of an atomic mass are for.</p>"),
            "scenarios": [
                {"inputs": {"percent_a": 40.0, "molar_mass_a": 12.011, "percent_b": 6.72,
                            "molar_mass_b": 1.008, "compound_molar_mass": 180.16},
                 "note": "40 % carbon and 6.72 % hydrogen give 1 : 2, and 180.16 g/mol makes that CH₂ unit "
                         "fit six times — C₆H₁₂, which is only the whole story if the missing 53 % is oxygen."},
                {"inputs": {"percent_a": 63.65, "molar_mass_a": 63.546, "percent_b": 36.35,
                            "molar_mass_b": 15.999, "compound_molar_mass": 79.545},
                 "note": "Copper at 1 : 1 and a molar mass of 79.55 g/mol is CuO, the multiplier being one."},
            ],
            "pitfalls": [
                "<strong>Dividing by the largest instead of the smallest.</strong> The smallest mole figure "
                "sets the scale; dividing by any other number gives a ratio nobody can read.",
                "<strong>Reporting 1.5 as a formula.</strong> Subscripts are integers. Multiply the whole "
                "ratio until every entry is whole, and say so in your answer.",
                "<strong>Using the molecular molar mass when the question asks for the empirical "
                "formula.</strong> The ratio is the empirical formula; only the multiplier turns it into "
                "the molecular one.",
            ],
            "units_note": ("<p>Percent by mass and grams are interchangeable here because the arithmetic is "
                           "done per 100 g. Atomic and molar masses must both be in grams per mole, and the "
                           "compound's molar mass on the same scale as the atomic masses — grams per mole "
                           "throughout, not kilograms.</p>"),
            "limits": [
                "<strong>Two elements at a time.</strong> For a three-element compound, run the page twice or "
                "reduce all three mole figures by the same divisor by hand.",
                "<strong>It trusts the analysis.</strong> Percentages that do not sum to 100 mean unweighed "
                "oxygen, moisture or ash, and every ratio downstream inherits that error.",
            ],
            "uses": [
                "<li>Turning combustion-analysis percentages into a formula.</li>",
                "<li>Checking a supplier's stated formula against a measured composition.</li>",
                "<li>Finding the molecular formula once the molar mass is known.</li>",
            ],
        },
        faq=[
            ("What is the difference between empirical and molecular formula?",
             "The empirical formula is the simplest ratio — CH₂O for glucose. The molecular formula is "
             "the ratio scaled by a whole number, C₆H₁₂O₆. Multiply the empirical unit's mass by the "
             "multiplier this page reports and you have the molecular formula."),
            ("What if the ratio comes out as 1.33?",
             "Multiply the whole ratio by three: 1 : 1.33 is 3 : 4. Half ratios scale by two, quarter "
             "ratios by four. A ratio that stays awkward after that usually means one percentage is wrong."),
        ],
        related=[("/chemistry/percent-composition", "Percent composition"),
                 ("/chemistry/molar-mass", "Molar mass"),
                 ("/chemistry/mole", "Mole")],
    ),

    S(
        slug="percent-composition",
        name="Percent Composition Calculator",
        title="Percent Composition Calculator: Element by Mass",
        desc="Work out what fraction of a compound's mass one element carries, given how many atoms of it the formula holds and the molar masses of the element and compound.",
        what=("<p>The mass fraction of an element in a compound is the mass its atoms contribute divided "
              "by the mass of one mole of the compound: <strong>% = n × Ar ÷ Mr × 100</strong>. This page "
              "reports that percentage, the grams it accounts for in every 100 g, and what is left for "
              "everything else.</p>"),
        fields=[
            F("atoms", "Atoms of this element in the formula", "", 1,
              "The subscript, multiplied by any bracket multiplier — two hydrogen atoms in H₂O is 2", bounds=(1, 12)),
            F("atomic_mass", "Atomic mass of the element", "g/mol", 22.99,
              "From the periodic table; sodium is 22.99"),
            F("compound_molar_mass", "Molar mass of the compound", "g/mol", 58.44,
              "Sum of every atom in the formula; sodium chloride is 58.44"),
        ],
        results=[
            R("element_mass", "Mass contributed by the element", "g/mol"),
            R("percent", "Mass percent of the element", "%"),
            R("remainder", "Mass percent of everything else", "%"),
        ],
        formula={
            "element_mass": "atoms*atomic_mass",
            "percent": "atoms*atomic_mass/compound_molar_mass*100",
            "remainder": "100-atoms*atomic_mass/compound_molar_mass*100",
            "atoms": "element_mass/atomic_mass",
            "atomic_mass": "element_mass/atoms",
            "compound_molar_mass": "atoms*atomic_mass*100/percent",
        },
        prose={
            "why": ("<p>Percent composition is the bridge between a formula and a laboratory result. It "
                    "tells you what a fertiliser bag's nitrogen figure should be, what a mineral assay is "
                    "expected to report, and whether an elemental analysis came back plausible.</p>"),
            "formula_note": ("<p>The numerator counts one element and the denominator counts the whole "
                             "molecule, both in grams per mole, so the units cancel and what is left is a "
                             "fraction. Multiply by a hundred and it is a percentage by mass — not by "
                             "volume, and not by moles.</p>"),
            "example_note": ("<p>Sodium chloride: one sodium atom at 22.99 g/mol in a formula weighing "
                             "58.44 g/mol is 39.34 % sodium, leaving 60.66 % chlorine. Those two numbers "
                             "add to a hundred exactly, which is the check to run on any composition.</p>"),
            "reading": ("<p>Percentages that do not add to a hundred mean either the compound is a hydrate "
                        "(water of crystallisation is part of the molar mass but often left out of the "
                        "comparison) or the molar mass used was for the anhydrous form.</p>"),
            "scenarios": [
                {"inputs": {"atoms": 2, "atomic_mass": 1.008, "compound_molar_mass": 18.015},
                 "note": "Water is 11.19 % hydrogen by mass, not the two-in-three atom count might suggest."},
                {"inputs": {"atoms": 1, "atomic_mass": 55.845, "compound_molar_mass": 159.69},
                 "note": "Iron in Fe₂O₃ is 69.94 % of the mass, and that is the number an assay reports."},
            ],
            "pitfalls": [
                "<strong>Atom count taken from the wrong place.</strong> In Ca(OH)₂ the bracket doubles the "
                "oxygen and hydrogen but not the calcium; count what the formula actually contains.",
                "<strong>Molar mass of the wrong hydrate.</strong> Copper sulfate pentahydrate is 249.7 "
                "g/mol, not 159.6 — using the anhydrous figure inflates every percentage.",
                "<strong>Percent by mass read as percent by moles.</strong> Water is 66.7 % hydrogen atoms "
                "and 11.2 % hydrogen by mass; only the second is a composition figure.",
            ],
            "units_note": ("<p>Atomic and molar masses share one unit, grams per mole, so the ratio inside "
                           "the percent is dimensionless. If one figure is entered in kilograms per "
                           "kilomole the ratio still works, but mixing grams with kilograms does not.</p>"),
            "limits": [
                "<strong>One element per run.</strong> Run it once per element; the remainders should then "
                "add back to a hundred.",
                "<strong>It says nothing about structure.</strong> Two isomers share a composition exactly, "
                "which is why percent composition gives a formula and never a structure.",
            ],
            "uses": [
                "<li>Checking an elemental analysis for arithmetic slips.</li>",
                "<li>Reading a fertiliser label's N-P-K figure against the salt it is made from.</li>",
                "<li>Converting a mineral assay's oxide percentages into element percentages.</li>",
            ],
        },
        faq=[
            ("How do I find the percent of an element in a hydrate?",
             "Include the water in the molar mass. CuSO₄·5H₂O weighs 249.7 g/mol; the copper is still "
             "63.55 g/mol of that, so copper is 25.45 %, not the 39.8 % the anhydrous salt gives."),
            ("Why do my percentages add to 99.9 and not 100?",
             "Rounding of the atomic masses. A tenth of a percent over the whole compound is normal; a "
             "shortfall of several percent means an element is missing from the calculation."),
        ],
        related=[("/chemistry/empirical-formula", "Empirical formula"),
                 ("/chemistry/molar-mass", "Molar mass"),
                 ("/chemistry/mass-percent", "Mass percent")],
    ),

    S(
        slug="theoretical-yield",
        name="Theoretical Yield Calculator",
        title="Theoretical Yield Calculator: Mass of Product",
        desc="Convert the mass of your limiting reagent into the mass of product the balanced equation allows, using the mole ratio and the molar mass of the product.",
        what=("<p>The theoretical yield is what the balanced equation permits, not what you collected: "
              "<strong>mass of product = (mass of reagent ÷ Mr reagent) × ratio × Mr product</strong>. "
              "Enter the limiting reagent — the one that runs out first — and the page returns the moles "
              "and the mass of product.</p>"),
        fields=[
            F("reagent_mass", "Mass of limiting reagent", "g", 10,
              "Weighed mass of the reagent that runs out first"),
            F("reagent_molar_mass", "Molar mass of that reagent", "g/mol", 100.09,
              "Calcium carbonate is 100.09"),
            F("mole_ratio", "Moles of product per mole of reagent", "", 1,
              "From the balanced equation; one mole of CaCO₃ gives one mole of CaO", bounds=(0.01, 20)),
            F("product_molar_mass", "Molar mass of the product", "g/mol", 56.08,
              "Calcium oxide is 56.08"),
        ],
        results=[
            R("reagent_moles", "Moles of limiting reagent", "mol"),
            R("product_moles", "Moles of product", "mol"),
            R("product_mass", "Theoretical yield", "g"),
        ],
        formula={
            "reagent_moles": "reagent_mass/reagent_molar_mass",
            "product_moles": "reagent_mass/reagent_molar_mass*mole_ratio",
            "product_mass": "reagent_mass/reagent_molar_mass*mole_ratio*product_molar_mass",
            "reagent_mass": "product_mass/(mole_ratio*product_molar_mass)*reagent_molar_mass",
            "reagent_molar_mass": "reagent_mass/(product_mass/(mole_ratio*product_molar_mass))",
            "mole_ratio": "product_moles/(reagent_mass/reagent_molar_mass)",
            "product_molar_mass": "product_mass/product_moles",
        },
        prose={
            "why": ("<p>Every yield figure — percent yield, atom economy, cost per kilogram — is measured "
                    "against the theoretical yield. Getting it right first means the batch record can be "
                    "believed afterwards.</p>"),
            "formula_note": ("<p>The three steps are mass to moles, moles across the equation, moles back to "
                             "mass. The middle step is the only one that uses the chemistry; the outer two "
                             "are arithmetic on molar masses.</p>"),
            "example_note": ("<p>Heating 10 g of calcium carbonate: 10 ÷ 100.09 = 0.0999 mol of CaCO₃, which "
                             "the equation converts one-for-one into 0.0999 mol of CaO, and 0.0999 × 56.08 "
                             "= 5.60 g. The missing 4.4 g leaves as carbon dioxide.</p>"),
            "reading": ("<p>If the yield you collect is larger than this figure, the product is wet, "
                        "impure, or the equation is unbalanced. A theoretical yield is an upper bound, and "
                        "nothing in a beaker exceeds it.</p>"),
            "scenarios": [
                {"inputs": {"reagent_mass": 25, "reagent_molar_mass": 105.99, "mole_ratio": 1,
                            "product_molar_mass": 58.44},
                 "note": "25 g of sodium carbonate gives 0.236 mol and 13.8 g of sodium chloride against "
                         "two moles of HCl per mole of carbonate."},
                {"inputs": {"reagent_mass": 4.6, "reagent_molar_mass": 46.07, "mole_ratio": 2,
                            "product_molar_mass": 18.015},
                 "note": "4.6 g of ethanol burns to 0.2 mol of water, which is 3.6 g — the ratio of three "
                         "to one is not what the equation says, two is."},
            ],
            "pitfalls": [
                "<strong>The wrong reagent treated as limiting.</strong> Compare mole ratios, not masses: "
                "the reagent with fewer moles than the equation needs is the one that sets the yield.",
                "<strong>Mole ratio read upside down.</strong> It is moles of product per mole of reagent, "
                "which for a 2 : 3 equation is 1.5, not 0.67.",
                "<strong>Molar masses mixed up.</strong> The reagent's molar mass divides the reagent's "
                "mass; the product's multiplies. Swapping them produces a plausible, wrong answer.",
            ],
            "units_note": ("<p>Mass in grams with molar mass in grams per mole gives moles. If the reagent "
                           "is weighed in milligrams, convert to grams first or the yield comes out a "
                           "thousand times too small.</p>"),
            "limits": [
                "<strong>It assumes a balanced equation.</strong> An unbalanced one shifts every ratio and "
                "silently changes the answer.",
                "<strong>It assumes complete reaction.</strong> Equilibrium, side reactions and losses are "
                "what percent yield measures — this page is the ceiling, not the forecast.",
            ],
            "uses": [
                "<li>Setting the target mass for a batch before weighing anything.</li>",
                "<li>Working out how much reagent a required mass of product needs.</li>",
                "<li>Supplying the denominator in a percent yield calculation.</li>",
            ],
        },
        faq=[
            ("How do I know which reagent is limiting?",
             "Divide each reagent's moles by its coefficient in the balanced equation. The smallest "
             "quotient is the limiting reagent, and that is the one this page wants."),
            ("Why is the theoretical yield always higher than what I get?",
             "Because it assumes no losses: no side reaction, no product left in the flask, no transfer "
             "losses on the filter. Real yields of 70–90 % are normal and excellent."),
        ],
        related=[("/chemistry/percent-yield", "Percent yield"),
                 ("/chemistry/actual-yield", "Actual yield"),
                 ("/chemistry/mole", "Mole")],
    ),

    S(
        slug="percent-yield",
        name="Percent Yield Calculator",
        title="Percent Yield Calculator: Actual vs Theoretical",
        desc="Compare the mass you actually collected with the mass the equation allowed, and read the result as a percentage, a fraction and the mass lost along the way.",
        what=("<p>Percent yield is what you got divided by what the equation allowed, times a hundred: "
              "<strong>% yield = actual ÷ theoretical × 100</strong>. The page also reports the shortfall "
              "in grams and as a fraction, which is what tells you whether a low yield is worth "
              "investigating.</p>"),
        fields=[
            F("actual_mass", "Mass actually collected", "g", 8.5,
              "Weighed after drying — wet product inflates this figure"),
            F("theoretical_mass", "Theoretical yield", "g", 10,
              "From the balanced equation and the limiting reagent"),
        ],
        results=[
            R("percent_yield", "Percent yield", "%"),
            R("mass_lost", "Mass not recovered", "g"),
            R("yield_fraction", "Yield as a fraction", ""),
        ],
        formula={
            "percent_yield": "actual_mass/theoretical_mass*100",
            "mass_lost": "theoretical_mass-actual_mass",
            "yield_fraction": "actual_mass/theoretical_mass",
            "actual_mass": "percent_yield*theoretical_mass/100",
            "theoretical_mass": "actual_mass*100/percent_yield",
        },
        prose={
            "why": ("<p>Yield is the single number that says whether a synthesis worked. It is also the "
                    "number most often computed against the wrong denominator — a theoretical yield that "
                    "assumed complete reaction of the wrong reagent.</p>"),
            "formula_note": ("<p>Both masses must be the same substance. Comparing 8.5 g of wet crystals "
                             "with 10 g of dry theoretical product mixes water into the yield and can push "
                             "it above a hundred per cent.</p>"),
            "example_note": ("<p>8.5 g collected against 10 g allowed is 85 %: 1.5 g was left in the "
                             "filtrate, on the glassware, or never formed. A yield above 100 % means the "
                             "product is wet or contaminated, never that the reaction beat thermodynamics.</p>"),
            "reading": ("<p>Above 90 % is excellent for a clean reaction. 70–90 % is normal for a "
                        "multi-step purification. Below 50 % usually points at an incomplete reaction, "
                        "product left in the mother liquor, or a transfer loss worth chasing.</p>"),
            "scenarios": [
                {"inputs": {"actual_mass": 12.4, "theoretical_mass": 15.0},
                 "note": "12.4 of 15 is 82.7 %, with 2.6 g unaccounted for — a normal purification loss."},
                {"inputs": {"actual_mass": 9.9, "theoretical_mass": 10.0},
                 "note": "99 % against a theoretical yield close to the balance's readability is suspicious "
                         "rather than impressive; dry it and weigh again."},
            ],
            "pitfalls": [
                "<strong>Theoretical yield from the wrong reagent.</strong> The denominator has to come "
                "from the limiting reagent's moles, not from the most abundant one.",
                "<strong>Undried product.</strong> Residual solvent counts as mass. A yield of 104 % is a "
                "drying problem, not a discovery.",
                "<strong>Molar mass mismatches.</strong> If the product is a hydrate and the theoretical "
                "figure used the anhydrous mass, the percentage is wrong by the water.",
            ],
            "units_note": ("<p>Any consistent mass unit works because it cancels inside the ratio, but both "
                           "masses must use the same one. The mass lost is reported in whatever unit the "
                           "inputs were given in.</p>"),
            "limits": [
                "<strong>It measures mass, not purity.</strong> A 95 % yield of 80 % pure material is not "
                "95 % of the product you wanted.",
                "<strong>It cannot tell you where the loss went.</strong> A mass balance over the mother "
                "liquor and washings is the next step if the figure matters.",
            ],
            "uses": [
                "<li>Recording a batch against its expected yield.</li>",
                "<li>Deciding whether a low yield is worth investigating.</li>",
                "<li>Comparing routes to the same product on a fair basis.</li>",
            ],
        },
        faq=[
            ("Can percent yield be more than 100?",
             "Not for a pure, dry product. Above 100 % means the product is wet, contaminated with "
             "starting material, or the theoretical yield was calculated from the wrong limiting reagent."),
            ("What counts as a good yield?",
             "It depends on the reaction, but 80–95 % for a straightforward synthesis is normal. Anything "
             "above 100 % is an analytical problem, not a success."),
        ],
        related=[("/chemistry/theoretical-yield", "Theoretical yield"),
                 ("/chemistry/actual-yield", "Actual yield"),
                 ("/chemistry/atom-economy", "Atom economy")],
    ),

    S(
        slug="actual-yield",
        name="Actual Yield Calculator",
        title="Actual Yield Calculator: From Percent Yield",
        desc="Start from the theoretical yield and the percent yield you measured, and work out the mass of product to expect, the mass that will be lost and the waste share.",
        what=("<p>When the percent yield is known — from a previous identical batch, or from a method "
              "note — the mass to expect is <strong>actual = theoretical × % yield ÷ 100</strong>. This "
              "page turns that into a planned batch mass, plus the shortfall and the waste percentage.</p>"),
        fields=[
            F("theoretical_mass", "Theoretical yield", "g", 10,
              "What the balanced equation allows from the limiting reagent"),
            F("percent_yield", "Expected percent yield", "%", 85,
              "From a previous batch of the same reaction, or the method's reported figure"),
        ],
        results=[
            R("actual_mass", "Expected actual yield", "g"),
            R("mass_lost", "Mass expected to be lost", "g"),
            R("loss_percent", "Loss", "%"),
        ],
        formula={
            "actual_mass": "theoretical_mass*percent_yield/100",
            "mass_lost": "theoretical_mass-theoretical_mass*percent_yield/100",
            "loss_percent": "100-percent_yield",
            "theoretical_mass": "actual_mass*100/percent_yield",
            "percent_yield": "actual_mass/theoretical_mass*100",
        },
        prose={
            "why": ("<p>Planning a batch means knowing what the balance should read at the end. A yield "
                    "figure from the literature or from the last run is the only honest basis for that "
                    "number, and the conversion is one multiplication.</p>"),
            "formula_note": ("<p>Nothing here depends on the chemistry beyond the theoretical yield; the "
                             "percent is an empirical correction for how this reaction behaves in your "
                             "hands, your glassware and your drying oven.</p>"),
            "example_note": ("<p>Ten grams allowed at 85 % gives 8.5 g expected, with 1.5 g to be lost — "
                             "and the loss percentage is simply 100 − 85 = 15 %. If you collect 9.4 g, this "
                             "batch did better than the historical figure.</p>"),
            "reading": ("<p>Treat the answer as a target band, not a promise. Two identical runs on the "
                        "same day routinely differ by several per cent, so a batch inside a few points of "
                        "this figure is on plan.</p>"),
            "scenarios": [
                {"inputs": {"theoretical_mass": 25, "percent_yield": 72},
                 "note": "25 g at 72 % plans for 18 g, with 7 g written off to purification."},
                {"inputs": {"theoretical_mass": 4.0, "percent_yield": 95},
                 "note": "A small scale-up: 3.8 g expected, which is close enough to four grams that the "
                         "drying step decides it."},
            ],
            "pitfalls": [
                "<strong>Using someone else's yield as your own.</strong> Literature yields are optimised "
                "and often on a larger scale; a first run at 85 % of them is normal.",
                "<strong>Applying the percentage to the reagent mass.</strong> The percentage applies to "
                "the product's theoretical mass, not to what you weighed out.",
                "<strong>Percent yield above 100 carried forward.</strong> It propagates the error into "
                "every planned batch that follows.",
            ],
            "units_note": ("<p>The percent carries no unit and the two masses share one, so grams in gives "
                           "grams out. A yield quoted as a fraction — 0.85 — has to be multiplied by a "
                           "hundred before it is entered here.</p>"),
            "limits": [
                "<strong>It is a forecast.</strong> Nothing about a planned yield can account for a "
                "reaction that behaves differently on the day.",
                "<strong>It assumes the same conditions.</strong> Scale, stirring and drying change yields, "
                "so the figure drifts as the batch size grows.",
            ],
            "uses": [
                "<li>Setting the expected mass for a batch record.</li>",
                "<li>Deciding how much starting material to buy for a target mass of product.</li>",
                "<li>Spotting a run that underperformed before purification is complete.</li>",
            ],
        },
        faq=[
            ("Should I use the literature yield or my own?",
             "Your own, once you have one. Literature yields are the best available optimism; a yield "
             "from your own last batch is the truth about your hands and your equipment."),
            ("Does the loss percentage have to be 100 minus the yield?",
             "Yes, on a mass basis. If 15 % of the theoretical mass is not collected, 15 % is the loss — "
             "though part of it may still be recoverable from the mother liquor."),
        ],
        related=[("/chemistry/percent-yield", "Percent yield"),
                 ("/chemistry/theoretical-yield", "Theoretical yield"),
                 ("/chemistry/mole", "Mole")],
    ),
    S(
        slug="atom-economy",
        name="Atom Economy Calculator",
        title="Atom Economy Calculator: How Much Becomes Product",
        desc="Measure what share of the atoms you paid for ends up in the product, by comparing the product's molar mass with the total mass of everything the reaction makes.",
        what=("<p>Atom economy asks how much of the reactant mass survives into the product: "
              "<strong>% = Mr product ÷ Σ Mr all products × 100</strong>. It is a property of the route, "
              "not of your technique, so it cannot be improved by working more carefully — only by "
              "choosing a different reaction.</p>"),
        fields=[
            F("product_molar_mass", "Molar mass of the desired product", "g/mol", 56.08,
              "Calcium oxide is 56.08"),
            F("products_molar_mass", "Total molar mass of all products", "g/mol", 100.09,
              "CaO plus CO₂ is 56.08 + 44.01, so 100.09"),
        ],
        results=[
            R("atom_economy", "Atom economy", "%"),
            R("waste_per_100g", "Waste per 100 g of product", "g"),
            R("use_fraction", "Fraction of mass used", ""),
        ],
        formula={
            "atom_economy": "product_molar_mass/products_molar_mass*100",
            "waste_per_100g": "(products_molar_mass-product_molar_mass)/product_molar_mass*100",
            "use_fraction": "product_molar_mass/products_molar_mass",
            "product_molar_mass": "atom_economy*products_molar_mass/100",
            "products_molar_mass": "product_molar_mass*100/atom_economy",
        },
        prose={
            "why": ("<p>Two routes to the same molecule can differ enormously in how much material they "
                    "throw away. Atom economy is the figure green chemistry uses to say so, because it "
                    "counts every atom in the equation rather than only the ones you weighed.</p>"),
            "formula_note": ("<p>The denominator is the sum of all products, by their coefficients, not "
                             "just the one you want. A reaction with a single product — an addition or a "
                             "rearrangement — scores 100 % by definition; a substitution that ejects a "
                             "leaving group cannot.</p>"),
            "example_note": ("<p>CaCO₃ → CaO + CO₂ keeps 56.08 of 100.09 units of mass, which is 56.0 %. "
                             "The other 44 % leaves as carbon dioxide, and no amount of careful weighing "
                             "brings it back.</p>"),
            "reading": ("<p>Above 90 % the route is nearly additive and the waste problem is solvent, not "
                        "stoichiometry. Below 50 % every kilogram of product creates at least a kilogram of "
                        "by-product, which is a disposal cost as well as a design fault.</p>"),
            "scenarios": [
                {"inputs": {"product_molar_mass": 151.16, "products_molar_mass": 151.16},
                 "note": "An addition reaction with one product: 100 %, which is the ceiling by definition."},
                {"inputs": {"product_molar_mass": 180.16, "products_molar_mass": 342.3},
                 "note": "A glycoside synthesis that keeps 52.6 % of the mass leaves 90 g of by-product per "
                         "100 g of product."},
            ],
            "pitfalls": [
                "<strong>Counting only the desired product's mass.</strong> The denominator is every "
                "product, coefficients included.",
                "<strong>Confusing it with percent yield.</strong> Yield measures what you collected; "
                "economy measures what the equation allows. A 100 % yield of a 30 % economy route is "
                "still wasteful.",
                "<strong>Forgetting solvent and reagents.</strong> Atom economy ignores them entirely, so "
                "a solvent-heavy process can look excellent on this page.",
            ],
            "units_note": ("<p>Molar masses in grams per mole cancel in the ratio, so the result is a "
                           "percentage. The waste figure is grams of by-product per 100 g of desired "
                           "product, which is the number a process chemist budgets for.</p>"),
            "limits": [
                "<strong>It ignores energy and solvents.</strong> A 100 % atom economy reaction that needs "
                "ten litres of dichloromethane per gram is not green.",
                "<strong>It says nothing about toxicity.</strong> The by-product's harm is not in the mass "
                "balance.",
            ],
            "uses": [
                "<li>Comparing two synthetic routes before choosing one.</li>",
                "<li>Reporting a green-chemistry metric to a tutor or a review.</li>",
                "<li>Estimating by-product tonnage for a given production volume.</li>",
            ],
        },
        faq=[
            ("Does atom economy change with yield?",
             "No. Yield depends on how well the reaction runs; atom economy depends only on the balanced "
             "equation. A route can have 100 % atom economy and a 40 % yield, or the reverse."),
            ("Why is a Diels-Alder reaction so highly rated?",
             "It is an addition: two molecules become one, with no atoms left over. Atom economy is 100 % "
             "by construction, which is why it appears in so many green-chemistry examples."),
        ],
        related=[("/chemistry/percent-yield", "Percent yield"),
                 ("/chemistry/theoretical-yield", "Theoretical yield"),
                 ("/chemistry/molar-mass", "Molar mass")],
    ),

    S(
        slug="molar-ratio",
        name="Molar Ratio Calculator",
        title="Molar Ratio Calculator: Moles of A to Moles of B",
        desc="Use the coefficients from a balanced equation to convert moles of one substance into moles of another, and to check the ratio the reaction actually requires.",
        what=("<p>Molar ratio is the bridge across an equation: <strong>n(B) = n(A) × coefficient B ÷ "
              "coefficient A</strong>. It is the middle step in every stoichiometry problem, and the one "
              "where moles get lost if the equation is not balanced first.</p>"),
        fields=[
            F("moles_a", "Moles of substance A", "mol", 0.5,
              "Whatever you started with, in moles"),
            F("coeff_a", "Coefficient of A", "", 1,
              "From the balanced equation", bounds=(1, 16)),
            F("coeff_b", "Coefficient of B", "", 3,
              "From the balanced equation", bounds=(1, 16)),
        ],
        results=[
            R("moles_b", "Moles of substance B", "mol"),
            R("ratio", "Molar ratio B to A", ""),
            R("a_per_b", "Moles of A needed per mole of B", "mol"),
        ],
        formula={
            "moles_b": "moles_a*coeff_b/coeff_a",
            "ratio": "coeff_b/coeff_a",
            "a_per_b": "coeff_a/coeff_b",
            "moles_a": "moles_b*coeff_a/coeff_b",
            "coeff_b": "moles_b*coeff_a/moles_a",
            "coeff_a": "moles_a*coeff_b/moles_b",
        },
        prose={
            "why": ("<p>Moles are the only currency that crosses an equation. Grams do not, litres of "
                    "solution do not, and the coefficients are the exchange rate — which is why an "
                    "unbalanced equation produces a confident, wrong answer.</p>"),
            "formula_note": ("<p>The ratio is dimensionless and fixed by the equation: 1 : 3 means every "
                             "mole of A consumes three of B. The last result inverts it, so 0.333 mol of A "
                             "per mole of B is the same fact read the other way.</p>"),
            "example_note": ("<p>0.5 mol of A against a coefficient of 1, with B at a coefficient of 3, "
                             "gives 1.5 mol of B. If you only have 1.2 mol of B in the flask, B is the "
                             "limiting reagent regardless of how much A was weighed out.</p>"),
            "reading": ("<p>Compare the moles you have with the moles the ratio demands, substance by "
                        "substance. The one that falls short first is limiting, and the ratio then fixes "
                        "everything downstream from it.</p>"),
            "scenarios": [
                {"inputs": {"moles_a": 0.25, "coeff_a": 2, "coeff_b": 3},
                 "note": "Ammonia synthesis at 2 : 3 gives 0.375 mol of ammonia from 0.25 mol of nitrogen."},
                {"inputs": {"moles_a": 2.0, "coeff_a": 1, "coeff_b": 2},
                 "note": "Two moles of methane and a 1 : 2 ratio need four moles of oxygen — double what "
                         "looks like an equal partnership."},
            ],
            "pitfalls": [
                "<strong>Ratio applied to grams.</strong> Converting mass to moles first is not optional; "
                "the coefficients count particles, not kilograms.",
                "<strong>Coefficients from an unbalanced equation.</strong> Balance it, then read them off.",
                "<strong>The ratio inverted.</strong> 1 : 3 is not 3 : 1; decide which substance is A "
                "before typing.",
            ],
            "units_note": ("<p>The moles are in mol and the coefficients are unitless. If your amount is in "
                           "millimoles the ratio still works, and the answer comes back in millimoles.</p>"),
            "limits": [
                "<strong>It assumes a single reaction.</strong> Competing pathways consume the same "
                "reagent in different ratios and this page cannot see them.",
                "<strong>It assumes complete conversion.</strong> Real conversions stop short, which is "
                "what percent yield is for.",
            ],
            "uses": [
                "<li>Converting a weighed amount of one reagent into the moles another needs.</li>",
                "<li>Finding the limiting reagent before starting a reaction.</li>",
                "<li>Reading a balanced equation as a set of working ratios.</li>",
            ],
        },
        faq=[
            ("Do I use moles or mass for the ratio?",
             "Moles. The coefficients count molecules, so the ratio is between amounts in moles — convert "
             "any mass first with the substance's molar mass."),
            ("What if the ratio is 1 : 1.5?",
             "Multiply both coefficients by two to clear the fraction: 2 : 3. The ratio is unchanged, and "
             "whole-number coefficients are easier to check."),
        ],
        related=[("/chemistry/theoretical-yield", "Theoretical yield"),
                 ("/chemistry/mole", "Mole"),
                 ("/chemistry/molar-mass", "Molar mass")],
    ),

    S(
        slug="molar-mass-of-gas",
        name="Molar Mass of Gas Calculator",
        title="Molar Mass of Gas Calculator: From P, V and T",
        desc="Find the molar mass of an unknown gas from its mass, pressure, volume and temperature, using the ideal gas law rearranged for M, with density alongside.",
        what=("<p>Weigh a known volume of gas at a known pressure and temperature and the ideal gas law "
              "hands you the molar mass: <strong>M = mRT ÷ PV</strong>. It is the standard way to identify "
              "a gas you can weigh but cannot see.</p>"),
        fields=[
            F("mass", "Mass of the gas", "g", 32,
              "The weighed mass of the sample"),
            F("pressure", "Pressure", "kPa", 101.325,
              "Absolute pressure, not gauge"),
            F("volume", "Volume", "L", 22.414,
              "The volume the gas occupies"),
            F("temperature", "Temperature", "K", 273.15,
              "Absolute temperature: add 273.15 to the Celsius reading"),
        ],
        results=[
            R("molar_mass", "Molar mass", "g/mol"),
            R("density", "Density at these conditions", "g/L"),
            R("moles", "Moles in the sample", "mol"),
        ],
        formula={
            "molar_mass": "mass*8.314*temperature/(pressure*volume)",
            "density": "mass/volume",
            "moles": "pressure*volume/(8.314*temperature)",
            "mass": "molar_mass*pressure*volume/(8.314*temperature)",
            "pressure": "mass*8.314*temperature/(molar_mass*volume)",
            "volume": "mass*8.314*temperature/(molar_mass*pressure)",
            "temperature": "molar_mass*pressure*volume/(mass*8.314)",
        },
        prose={
            "why": ("<p>Molar mass identifies a gas: 32 g/mol is oxygen, 44 carbon dioxide, 28 nitrogen. "
                    "Weighing a flask of gas is easy; deciding what the number means is where the ideal gas "
                    "law comes in.</p>"),
            "formula_note": ("<p>R is 8.314 kPa·L per mole per kelvin, which is why the pressure is in "
                             "kilopascals and the volume in litres. Using 0.08206 instead means switching "
                             "pressure to atmospheres — the two mistakes cancel only by luck.</p>"),
            "example_note": ("<p>32 g of a gas filling 22.414 L at 101.325 kPa and 273.15 K gives "
                             "M = 32 × 8.314 × 273.15 ÷ (101.325 × 22.414) = 32.0 g/mol, and one mole in "
                             "the flask — which is oxygen.</p>"),
            "reading": ("<p>Compare the answer with the periodic table: 28.01 is nitrogen or carbon "
                        "monoxide, 44.01 is carbon dioxide or propane's cousin nitrous oxide. When two "
                        "gases share a molar mass, the chemistry of the source decides between them.</p>"),
            "scenarios": [
                {"inputs": {"mass": 44, "pressure": 101.325, "volume": 22.414, "temperature": 273.15},
                 "note": "44.0 g/mol at STP in one mole's volume is carbon dioxide."},
                {"inputs": {"mass": 0.572, "pressure": 95, "volume": 0.5, "temperature": 298.15},
                 "note": "Half a litre at 95 kPa in a warm room: about 29.8 g/mol, which is air."},
            ],
            "pitfalls": [
                "<strong>Celsius entered as kelvin.</strong> 25 °C is 298.15 K; entering 25 changes the "
                "answer by more than a factor of ten.",
                "<strong>Gauge pressure used as absolute.</strong> A cylinder reading 200 kPa gauge is at "
                "about 300 kPa absolute, and the molar mass scales with the difference.",
                "<strong>A wet gas weighed as dry.</strong> Water vapour contributes mass but not molar "
                "mass of your gas, so a sample collected over water reads heavy.",
            ],
            "units_note": ("<p>Kelvin, kilopascals, litres and grams throughout — that is what R = 8.314 "
                           "expects. Mixing millilitres or atmospheres with this R offsets the answer by "
                           "a factor of a thousand or a hundred.</p>"),
            "limits": [
                "<strong>It assumes ideal behaviour.</strong> Above a few atmospheres, real gases deviate "
                "and the answer drifts by a per cent or two.",
                "<strong>It assumes a pure sample.</strong> A mixture gives the average molar mass, which "
                "is a perfectly good number but not any single substance's.",
            ],
            "uses": [
                "<li>Identifying an unknown gas from a weighed flask.</li>",
                "<li>Checking that a cylinder holds what the label says.</li>",
                "<li>Getting a molar mass for a vapour before running further analysis.</li>",
            ],
        },
        faq=[
            ("Which R should I use?",
             "8.314 with kilopascals and litres, or 0.08206 with atmospheres and litres. This page uses "
             "the first, so pressure must be in kPa."),
            ("Why is the answer slightly off the periodic table value?",
             "Real gases are not ideal, and a weighed flask has buoyancy and vapour errors. A per cent or "
             "two of deviation is normal; ten per cent means the sample is impure."),
        ],
        related=[("/chemistry/standard-temperature-and-pressure", "Gas volume at STP"),
                 ("/chemistry/molar-mass", "Molar mass"),
                 ("/chemistry/mole", "Mole")],
    ),

    S(
        slug="standard-temperature-and-pressure",
        name="STP Calculator",
        title="STP Calculator: Gas Volume at 0 °C and 100 kPa",
        desc="Convert moles of gas to volume — or volume back to moles — at standard temperature and pressure, with the molar volume at your own conditions shown alongside.",
        what=("<p>At standard temperature and pressure one mole of an ideal gas occupies a fixed volume: "
              "<strong>V = nRT ÷ P</strong>. At 273.15 K and 101.325 kPa that is 22.414 L; at the IUPAC "
              "definition of 100 kPa it is 22.71 L. This page reports both the volume and the molar volume "
              "at the conditions you give it.</p>"),
        fields=[
            F("moles", "Amount of gas", "mol", 1,
              "Moles, not grams"),
            F("temperature", "Temperature", "K", 273.15,
              "273.15 K is 0 °C"),
            F("pressure", "Pressure", "kPa", 101.325,
              "101.325 kPa is one atmosphere"),
        ],
        results=[
            R("volume", "Volume", "L"),
            R("molar_volume", "Molar volume at these conditions", "L/mol"),
            R("molecules", "Molecules", ""),
        ],
        formula={
            "volume": "moles*8.314*temperature/pressure",
            "molar_volume": "8.314*temperature/pressure",
            "molecules": "moles*6.02214076*100000000000000000000000",
            "moles": "volume/molar_volume",
            "temperature": "pressure*volume/(moles*8.314)",
            "pressure": "moles*8.314*temperature/volume",
        },
        prose={
            "why": ("<p>Gas volumes are quoted at standard conditions because gases expand and contract "
                    "with temperature. Comparing two litres measured at different temperatures without "
                    "correcting to STP is comparing two different amounts.</p>"),
            "formula_note": ("<p>Molar volume is the volume of one mole, so it has the units litres per "
                             "mole and depends only on temperature and pressure. Multiply it by the moles "
                             "and you have the volume; divide a measured volume by it and you have the "
                             "moles.</p>"),
            "example_note": ("<p>One mole at 273.15 K and 101.325 kPa: 1 × 8.314 × 273.15 ÷ 101.325 = "
                             "22.41 L. Warm the same mole to 298.15 K at the same pressure and it occupies "
                             "24.47 L — the same gas, a larger volume.</p>"),
            "reading": ("<p>Remember which standard you are using. The older 22.4 L per mole assumes one "
                        "atmosphere; the IUPAC standard since 1982 is 100 kPa, which gives 22.71 L. The 1.3 "
                        "per cent difference matters on a stoichiometry exam answer.</p>"),
            "scenarios": [
                {"inputs": {"moles": 0.5, "pressure": 101.325, "temperature": 273.15},
                 "note": "Half a mole at STP is 11.21 L, whatever the gas is."},
                {"inputs": {"moles": 1, "pressure": 100, "temperature": 273.15},
                 "note": "At the IUPAC standard pressure of exactly 100 kPa, one mole is 22.71 L."},
            ],
            "pitfalls": [
                "<strong>Celsius entered.</strong> 0 °C is 273.15 K; entering 0 divides the volume by "
                "zero in the algebra and the page has nothing to return.",
                "<strong>22.4 taken as universal.</strong> It holds at one atmosphere and 0 °C only; "
                "at 25 °C the figure is 24.5 L.",
                "<strong>Real gas behaviour ignored.</strong> At high pressure or near condensation, the "
                "molar volume departs from the ideal figure, and no correction is applied here.",
            ],
            "units_note": ("<p>The volume comes back in litres because R is in kilopascal-litres per mole "
                           "per kelvin. A gas volume in cubic centimetres or cubic metres has to be "
                           "converted before it is entered.</p>"),
            "limits": [
                "<strong>Ideal gas only.</strong> The law is a model, accurate near room temperature and "
                "pressure, poor near a boiling point.",
                "<strong>One gas at a time.</strong> In a mixture, each component has its own partial "
                "volume — see the partial pressure page.",
            ],
            "uses": [
                "<li>Converting a gas volume measured in the lab to a standard figure for comparison.</li>",
                "<li>Sizing a gas collection vessel for a known number of moles.</li>",
                "<li>Checking an exam answer that uses 22.4 L.</li>",
            ],
        },
        faq=[
            ("Is STP 22.4 L or 22.7 L?",
             "Both, depending on the standard. 22.414 L per mole uses 1 atmosphere (101.325 kPa); 22.71 L "
             "uses the IUPAC standard of 100 kPa. State which one you used."),
            ("Does the molar volume depend on the gas?",
             "For an ideal gas, no — one mole of any gas occupies the same volume at the same "
             "temperature and pressure. Real gases differ slightly, more so as pressure rises."),
        ],
        related=[("/chemistry/molar-mass-of-gas", "Molar mass of a gas"),
                 ("/chemistry/partial-pressure", "Partial pressure"),
                 ("/chemistry/mole", "Mole")],
    ),

    S(
        slug="combustion-analysis",
        name="Combustion Analysis Calculator",
        title="Combustion Analysis Calculator: C, H and O Mass",
        desc="Recover the masses of carbon, hydrogen and oxygen in a sample from the carbon dioxide and water it produces when burnt, ready to turn into an empirical formula.",
        what=("<p>Burning a sample converts all its carbon to CO₂ and all its hydrogen to H₂O. Weigh those "
              "two, and the masses of C and H follow from the ratios of molar masses: "
              "<strong>m(C) = m(CO₂) × 12.011 ÷ 44.01</strong>. Oxygen is whatever mass is left, and it can "
              "only be found that way.</p>"),
        fields=[
            F("sample_mass", "Mass of the sample burnt", "g", 1.0,
              "Weighed before combustion"),
            F("co2_mass", "Mass of CO₂ collected", "g", 1.5,
              "From the absorption tube, corrected for the blank"),
            F("h2o_mass", "Mass of H₂O collected", "g", 0.61,
              "From the second absorption tube"),
        ],
        results=[
            R("carbon_mass", "Mass of carbon in the sample", "g"),
            R("hydrogen_mass", "Mass of hydrogen in the sample", "g"),
            R("oxygen_mass", "Mass of oxygen by difference", "g"),
            R("percent_carbon", "Carbon by mass", "%"),
        ],
        formula={
            "carbon_mass": "co2_mass*12.011/44.01",
            "hydrogen_mass": "h2o_mass*2.016/18.015",
            "oxygen_mass": "sample_mass-co2_mass*12.011/44.01-h2o_mass*2.016/18.015",
            "percent_carbon": "co2_mass*12.011/44.01/sample_mass*100",
            "co2_mass": "carbon_mass*44.01/12.011",
            "h2o_mass": "hydrogen_mass*18.015/2.016",
            "sample_mass": "carbon_mass+hydrogen_mass+oxygen_mass",
        },
        prose={
            "why": ("<p>Combustion analysis is how an unknown organic compound is identified from a few "
                    "milligrams. Every carbon atom becomes one CO₂ and every two hydrogen atoms one H₂O, so "
                    "the two tube masses carry the whole elemental composition.</p>"),
            "formula_note": ("<p>12.011 ÷ 44.01 is the carbon fraction of carbon dioxide by mass, and "
                             "2.016 ÷ 18.015 is the hydrogen fraction of water. Oxygen cannot be weighed "
                             "directly, so it is found by subtracting the other two from the sample mass.</p>"),
            "example_note": ("<p>A 1.00 g sample giving 1.50 g of CO₂ and 0.61 g of H₂O contains 0.409 g of "
                             "carbon and 0.068 g of hydrogen. The remaining 0.523 g must be oxygen — that "
                             "subtraction is the only route to it.</p>"),
            "reading": ("<p>If the three masses add to slightly more than the sample, the CO₂ figure "
                        "includes a blank or the sample was wet. A shortfall of several per cent usually "
                        "means an element the analysis cannot see — nitrogen, sulfur, a halogen.</p>"),
            "scenarios": [
                {"inputs": {"sample_mass": 2.0, "co2_mass": 2.933, "h2o_mass": 1.2},
                 "note": "2.0 g giving 2.933 g of CO₂ and 1.2 g of water is 0.800 g of carbon and 0.134 g "
                         "of hydrogen — about 47 % oxygen left over."},
                {"inputs": {"sample_mass": 0.5, "co2_mass": 1.571, "h2o_mass": 0.0},
                 "note": "No water at all means a carbon-only sample, or a leak in the second absorption "
                         "tube."},
            ],
            "pitfalls": [
                "<strong>Using 12 ÷ 44 as exact.</strong> It is close, but with 44.01 and 12.011 the third "
                "decimal place of the answer holds up.",
                "<strong>Assuming the remainder is oxygen.</strong> Nitrogen, sulfur and halogens also hide "
                "in the difference; a nitrogen-containing sample needs a Dumas or Kjeldahl figure too.",
                "<strong>Forgetting the blank.</strong> The absorption tubes gain mass from the air in the "
                "apparatus; a blank run is what makes the numbers trustworthy.",
            ],
            "units_note": ("<p>All masses in the same unit — grams throughout. The percentage that comes "
                           "back is by mass, and it is the figure the empirical formula page wants.</p>"),
            "limits": [
                "<strong>It assumes complete combustion.</strong> Soot in the tube is carbon that never "
                "became CO₂, and it disappears from the balance.",
                "<strong>It cannot see oxygen.</strong> By difference it can, which means one bad mass "
                "corrupts the oxygen figure doubly.",
            ],
            "uses": [
                "<li>Starting an empirical formula determination.</li>",
                "<li>Confirming the composition of a synthesised organic compound.</li>",
                "<li>Checking a combustion result for a plausible mass balance.</li>",
            ],
        },
        faq=[
            ("Why is oxygen found by difference?",
             "Because it is the only element that leaves no dedicated product — its atoms end up split "
             "between CO₂ and H₂O. Subtract the carbon and hydrogen masses from the sample and what "
             "remains is oxygen, provided nothing else is present."),
            ("How much sample do I need?",
             "A few milligrams is standard for a modern analyser. Below about 1 mg, the weighing error "
             "starts to matter more than the chemistry."),
        ],
        related=[("/chemistry/empirical-formula", "Empirical formula"),
                 ("/chemistry/percent-composition", "Percent composition"),
                 ("/chemistry/combustion-reaction", "Combustion reaction")],
    ),
    S(
        slug="combustion-reaction",
        name="Combustion Reaction Calculator",
        title="Combustion Reaction Calculator: Fuel, O₂, CO₂",
        desc="For a hydrocarbon fuel, work out the oxygen a given amount needs, and the carbon dioxide and water it produces, straight from the balanced equation itself.",
        what=("<p>Burning a hydrocarbon C<sub>n</sub>H<sub>m</sub> is fixed by one balance: "
              "<strong>C<sub>n</sub>H<sub>m</sub> + (n + m/4) O₂ → n CO₂ + (m/2) H₂O</strong>. Given the "
              "formula and the moles of fuel, the page reports the oxygen consumed and both products, in "
              "moles and in grams.</p>"),
        fields=[
            F("carbon_atoms", "Carbon atoms in the fuel molecule", "", 1, "n in CₙHₘ; methane is 1", bounds=(1, 20)),
            F("hydrogen_atoms", "Hydrogen atoms in the fuel molecule", "", 4, "m in CₙHₘ; methane is 4", bounds=(1, 42)),
            F("fuel_moles", "Moles of fuel burnt", "mol", 1, "Amount of fuel, in moles"),
        ],
        results=[
            R("oxygen_moles", "Oxygen required", "mol"),
            R("co2_moles", "Carbon dioxide produced", "mol"),
            R("water_moles", "Water produced", "mol"),
            R("oxygen_mass", "Mass of oxygen required", "g"),
        ],
        formula={
            "oxygen_moles": "fuel_moles*(carbon_atoms+hydrogen_atoms/4)",
            "co2_moles": "fuel_moles*carbon_atoms",
            "water_moles": "fuel_moles*hydrogen_atoms/2",
            "oxygen_mass": "fuel_moles*(carbon_atoms+hydrogen_atoms/4)*31.998",
            "fuel_moles": "co2_moles/carbon_atoms",
            "carbon_atoms": "co2_moles/fuel_moles",
            "hydrogen_atoms": "water_moles*2/fuel_moles",
        },
        prose={
            "why": ("<p>Every combustion calculation — a burner's air demand, a car's CO₂ output, a bomb "
                    "calorimeter's oxygen charge — starts from this one balance. The formula alone fixes "
                    "every coefficient, so nothing has to be looked up.</p>"),
            "formula_note": ("<p>Each carbon atom needs one O₂ to become CO₂; each pair of hydrogen atoms "
                             "needs half an O₂ to become water. Adding them gives n + m/4, which is why "
                             "methane needs two moles of oxygen for every mole burnt.</p>"),
            "example_note": ("<p>One mole of methane, CH₄: oxygen is 1 + 4 ÷ 4 = 2 mol, carbon dioxide is "
                             "1 mol, water is 2 mol. In mass terms that is 64.0 g of oxygen for 16.0 g of "
                             "fuel — a ratio of four to one, which is why gas burners have large air "
                             "ports.</p>"),
            "reading": ("<p>Compare the oxygen the equation needs with the oxygen actually supplied. Equal "
                        "amounts is stoichiometric, less is a reducing flame that leaves soot and carbon "
                        "monoxide, more is an oxidising flame and a stack loss.</p>"),
            "scenarios": [
                {"inputs": {"carbon_atoms": 8, "hydrogen_atoms": 18, "fuel_moles": 1},
                 "note": "Octane needs 12.5 mol of oxygen per mole — a fractional coefficient that is "
                         "normal in combustion and doubles cleanly to 25 O₂ for 2 C₈H₁₈."},
                {"inputs": {"carbon_atoms": 2, "hydrogen_atoms": 6, "fuel_moles": 0.5},
                 "note": "Half a mole of ethanol needs 1.5 mol of oxygen and gives 1 mol of CO₂."},
            ],
            "pitfalls": [
                "<strong>Using m/4 as the whole oxygen figure.</strong> The carbon term comes first; "
                "methane needs 2, not 1.",
                "<strong>Oxygenated fuels treated as hydrocarbons.</strong> Ethanol already carries an "
                "oxygen atom, so its own oxygen reduces the demand below what C₂H₆ alone would take.",
                "<strong>Incomplete combustion assumed.</strong> The equation describes complete burning "
                "to CO₂; a sooty flame follows a different balance and produces CO.",
            ],
            "units_note": ("<p>Moles in, moles out. The mass result uses 31.998 g/mol for O₂ — if your "
                           "answer is in kilograms, multiply by a thousand at the end rather than entering "
                           "moles in kilomoles.</p>"),
            "limits": [
                "<strong>Hydrocarbons only.</strong> Fuels with oxygen, nitrogen or sulfur need those atoms "
                "in the balance; use this page for the carbon and hydrogen backbone and add the rest by "
                "hand.",
                "<strong>It assumes complete combustion.</strong> Real flames produce some CO and unburnt "
                "fuel, which is what an emissions measurement reports.",
            ],
            "uses": [
                "<li>Sizing the air supply for a burner.</li>",
                "<li>Working out the CO₂ a given amount of fuel emits.</li>",
                "<li>Checking a combustion equation you have balanced by hand.</li>",
            ],
        },
        faq=[
            ("Why does octane need 12.5 moles of oxygen?",
             "Because n + m/4 = 8 + 18/4 = 12.5. Fractions are fine in a balanced equation for a single "
             "molecule; double everything if you want whole numbers, which gives 2 C₈H₁₈ + 25 O₂."),
            ("Does this work for diesel and petrol?",
             "Approximately. Real fuels are mixtures, so use an average formula — roughly C₁₂H₂₃ for "
             "diesel — and treat the answer as an estimate."),
        ],
        related=[("/chemistry/combustion-analysis", "Combustion analysis"),
                 ("/chemistry/heat-of-combustion", "Heat of combustion"),
                 ("/chemistry/molar-ratio", "Molar ratio")],
    ),

    S(
        slug="heat-of-combustion",
        name="Heat of Combustion Calculator",
        title="Heat of Combustion Calculator: kJ per Mole Burnt",
        desc="Turn a calorimeter's temperature rise into the heat released by a weighed sample, then into the molar and the specific heat of combustion for that fuel.",
        what=("<p>A bomb calorimeter measures heat, not enthalpy directly: <strong>q = C × ΔT</strong>, "
              "where C is the calorimeter's heat capacity in kilojoules per kelvin. Divide the heat by the "
              "moles burnt and you have the molar heat of combustion in kJ/mol.</p>"),
        fields=[
            F("sample_mass", "Mass of fuel burnt", "g", 0.5,
              "Weighed sample in the bomb"),
            F("molar_mass", "Molar mass of the fuel", "g/mol", 46.07,
              "Ethanol is 46.07"),
            F("temperature_rise", "Temperature rise", "K", 1.5,
              "ΔT of the water jacket; a kelvin and a Celsius degree are the same size"),
            F("heat_capacity", "Heat capacity of the calorimeter", "kJ/K", 10.0,
              "From calibration with a known standard, usually benzoic acid"),
        ],
        results=[
            R("heat_released", "Heat released", "kJ"),
            R("moles_burnt", "Moles of fuel burnt", "mol"),
            R("molar_heat", "Molar heat of combustion", "kJ/mol"),
            R("specific_heat", "Specific heat of combustion", "kJ/g"),
        ],
        formula={
            "heat_released": "heat_capacity*temperature_rise",
            "moles_burnt": "sample_mass/molar_mass",
            "molar_heat": "heat_capacity*temperature_rise/(sample_mass/molar_mass)",
            "specific_heat": "heat_capacity*temperature_rise/sample_mass",
            "sample_mass": "heat_capacity*temperature_rise/specific_heat",
            "molar_mass": "sample_mass/(heat_capacity*temperature_rise/molar_heat)",
            "temperature_rise": "molar_heat*(sample_mass/molar_mass)/heat_capacity",
            "heat_capacity": "molar_heat*(sample_mass/molar_mass)/temperature_rise",
        },
        prose={
            "why": ("<p>Heats of combustion are how fuel values are compared — megajoules per kilogram on "
                    "a gas bill, kilojoules per mole in a textbook. A calorimeter gives the first "
                    "directly and the second with one division by the molar mass.</p>"),
            "formula_note": ("<p>q = CΔT is the whole measurement: the heat capacity folds in the water, "
                             "the bomb and the thermometer, which is why the vessel has to be calibrated "
                             "with a substance whose heat of combustion is known exactly.</p>"),
            "example_note": ("<p>0.5 g of ethanol is 0.01085 mol. A 1.5 K rise with C = 10 kJ/K is 15 kJ, "
                             "which is 1 382 kJ/mol and 30 kJ/g — within a couple of per cent of the "
                             "accepted 1 367 kJ/mol for ethanol, which is what a good calorimeter run "
                             "should give.</p>"),
            "reading": ("<p>Bomb calorimetry gives the higher heating value, because the water formed is "
                        "liquid. Real burners vent steam, so the lower heating value — about 10 % smaller "
                        "for a hydrocarbon — is the number for fuel economy.</p>"),
            "scenarios": [
                {"inputs": {"sample_mass": 1.0, "molar_mass": 180.16, "temperature_rise": 1.3,
                            "heat_capacity": 12.0},
                 "note": "15.6 kJ from 1 g of glucose is 2 810 kJ/mol, and a carbohydrate is expected near "
                         "2 800."},
                {"inputs": {"sample_mass": 0.2, "molar_mass": 2.016, "temperature_rise": 2.6,
                            "heat_capacity": 11.0},
                 "note": "28.6 kJ from 0.2 g of hydrogen is 143 kJ/g — three times what methane releases "
                         "per gram, and why hydrogen is a candidate fuel."},
            ],
            "pitfalls": [
                "<strong>Heat capacity of the water only.</strong> The bomb, the stirrer and the "
                "thermometer absorb heat too; the calibrated value covers all of them.",
                "<strong>Moles forgotten.</strong> The calorimeter gives kilojoules per sample, not per "
                "mole — divide by n before quoting a molar figure.",
                "<strong>Sign convention dropped.</strong> Combustion releases heat, so ΔH is negative "
                "while q, as measured by the rise, is positive.",
            ],
            "units_note": ("<p>Kilojoules, grams and moles. A temperature rise in kelvin and one in degrees "
                           "Celsius are numerically identical, so no conversion is needed — but a rise in "
                           "degrees Fahrenheit is not.</p>"),
            "limits": [
                "<strong>It measures a constant-volume process.</strong> The bomb's heat is internal "
                "energy; converting to enthalpy at constant pressure needs the small PV work term.",
                "<strong>It assumes complete combustion.</strong> Soot or carbon monoxide means part of the "
                "sample never released its share.",
            ],
            "uses": [
                "<li>Comparing fuels by energy per gram before buying them.</li>",
                "<li>Converting a calorimetry practical's numbers into a molar enthalpy.</li>",
                "<li>Checking a published heat of combustion against a measured one.</li>",
            ],
        },
        faq=[
            ("Why is the measured value sometimes lower than the data book?",
             "Heat lost to the surroundings, incomplete combustion, and the difference between the higher "
             "and lower heating values. A few per cent below the literature figure is a clean experiment."),
            ("Should ΔH be negative here?",
             "Yes, for combustion. The heat released is positive as a quantity but the enthalpy change is "
             "negative, because the products hold less energy than the reactants."),
        ],
        related=[("/chemistry/combustion-reaction", "Combustion reaction"),
                 ("/chemistry/gibbs-energy", "Gibbs energy"),
                 ("/chemistry/entropy", "Entropy")],
    ),

    S(
        slug="alligation",
        name="Alligation Calculator",
        title="Alligation Calculator: Mixing Two Strengths",
        desc="Find the proportions in which two solutions of different strengths must be mixed to reach a target strength, worked out by the alligation cross method.",
        what=("<p>Alligation gives the mixing ratio directly: the parts of the strong solution are the "
              "difference between the target and the weak strength, and the parts of the weak one are the "
              "difference between the strong strength and the target. The two differences always add up to "
              "the strength gap.</p>"),
        fields=[
            F("strong_percent", "Strength of the stronger solution", "%", 70,
              "Concentration in per cent, as the label states it"),
            F("weak_percent", "Strength of the weaker solution", "%", 0,
              "Use 0 for water or any diluent that carries none of the solute"),
            F("target_percent", "Strength wanted", "%", 30,
              "Between the other two figures"),
        ],
        results=[
            R("parts_strong", "Parts of the strong solution", ""),
            R("parts_weak", "Parts of the weak solution", ""),
            R("ratio", "Ratio of strong to weak", ""),
        ],
        formula={
            "parts_strong": "target_percent-weak_percent",
            "parts_weak": "strong_percent-target_percent",
            "ratio": "(target_percent-weak_percent)/(strong_percent-target_percent)",
            "strong_percent": "target_percent+parts_weak",
            "weak_percent": "target_percent-parts_strong",
            "target_percent": "weak_percent+parts_strong",
        },
        prose={
            "why": ("<p>Alligation is the fastest way to answer the question every pharmacy and plant "
                    "asks: how much of each stock do I mix to hit this strength? It needs no volumes and no "
                    "molar masses, only the three percentages.</p>"),
            "formula_note": ("<p>The cross is a weighted average written sideways. Reading diagonally: "
                             "target minus weak gives parts of strong, and strong minus target gives parts "
                             "of weak. The parts are volumes, not percentages, and any unit works as long "
                             "as both are the same.</p>"),
            "example_note": ("<p>70 % alcohol diluted to 30 %: parts strong = 30 − 0 = 30, parts weak = "
                             "70 − 30 = 40. So 30 volumes of the 70 % solution with 40 volumes of water "
                             "gives 70 volumes at 30 % — a 3 : 4 ratio, not 1 : 1.</p>"),
            "reading": ("<p>Sanity-check the ratio against the target's position. A target close to the "
                        "weak strength needs mostly weak solution, and a target near the middle needs "
                        "roughly equal parts. If the ratio comes out the other way round, the diagonals "
                        "were read in the wrong direction.</p>"),
            "scenarios": [
                {"inputs": {"strong_percent": 95, "weak_percent": 0, "target_percent": 70},
                 "note": "70 % from 95 % stock: 70 parts stock to 25 parts diluent, a 14 : 5 ratio."},
                {"inputs": {"strong_percent": 20, "weak_percent": 5, "target_percent": 12},
                 "note": "12 % from 20 % and 5 %: 7 parts strong with 8 parts weak, almost equal."},
            ],
            "pitfalls": [
                "<strong>Volumes added without contraction.</strong> Alcohol and water shrink when mixed, "
                "so 30 mL plus 40 mL can come to less than 70 mL; make up to volume instead.",
                "<strong>Percent w/w and w/v mixed.</strong> The percentages must be the same kind — both "
                "by mass or both by volume — or the ratio is meaningless.",
                "<strong>A target outside the two strengths.</strong> No mixture of 5 % and 20 % can give "
                "30 %; the page will return a negative part, which is the signal that the problem is "
                "impossible.",
            ],
            "units_note": ("<p>The inputs are percentages and the outputs are parts — read them as millilitres "
                           "per hundred millilitres, or litres per hundred litres, whichever suits your "
                           "batch. The ratio is unitless.</p>"),
            "limits": [
                "<strong>Two components only.</strong> Three stocks need the algebra or two alligation "
                "steps.",
                "<strong>It assumes volumes are additive</strong>, which is close for dilute aqueous "
                "solutions and poor for alcohol and strong electrolytes.",
            ],
            "uses": [
                "<li>Compounding a dilution to a stated strength.</li>",
                "<li>Mixing two fuel grades to a target octane.</li>",
                "<li>Adjusting a cleaner's concentration for a job.</li>",
            ],
        },
        faq=[
            ("Why do the parts add up to the strength gap?",
             "Because the mixture's strength is a weighted average of the two, and the weights are the "
             "parts. (Target − weak) + (strong − target) = strong − weak, always."),
            ("Can I use alligation for molarity?",
             "Yes, any two concentrations on the same scale — molarity, percentage, ppm — as long as the "
             "target and both stocks share it."),
        ],
        related=[("/chemistry/solution-dilution", "Solution dilution"),
                 ("/chemistry/dilution-factor", "Dilution factor"),
                 ("/chemistry/percent-solution", "Percent solution")],
    ),

    S(
        slug="serial-dilution",
        name="Serial Dilution Calculator",
        title="Serial Dilution Calculator: Concentration After Steps",
        desc="Follow a dilution series down its steps: the concentration after any number of transfers, the total dilution factor, and the fold change at each stage.",
        what=("<p>Each step in a serial dilution multiplies the concentration by 1 ÷ D, where D is the "
              "dilution factor of that step. After n steps, <strong>C<sub>n</sub> = C₀ ÷ D<sup>n</sup></strong>. "
              "This page reports the final concentration and the cumulative factor.</p>"),
        fields=[
            F("stock_conc", "Starting concentration", "mol/L", 1,
              "Anything on a single scale — molarity, mg/mL, cells per mL"),
            F("dilution_factor", "Dilution factor per step", "", 10,
              "10 means one part sample plus nine parts diluent", bounds=(1.01, 1000)),
            F("steps", "Number of steps", "", 3,
              "Each step is a separate transfer and mix", bounds=(1, 20)),
        ],
        results=[
            R("final_conc", "Concentration after the last step", "mol/L"),
            R("total_factor", "Total dilution factor", ""),
            R("fold_dilution", "Fold dilution", ""),
        ],
        formula={
            "final_conc": "stock_conc/pow(dilution_factor,steps)",
            "total_factor": "pow(dilution_factor,steps)",
            "fold_dilution": "pow(dilution_factor,steps)",
            "stock_conc": "final_conc*pow(dilution_factor,steps)",
            "dilution_factor": "pow(stock_conc/final_conc,1/steps)",
            "steps": "log(stock_conc/final_conc)/log(dilution_factor)",
        },
        prose={
            "why": ("<p>Serial dilution is how a 1 M stock becomes a workable 1 mM solution in three "
                    "transfers instead of one enormous flask. Each step is more accurate than a single "
                    "thousand-fold dilution, because the volumes stay in the range a pipette measures "
                    "well.</p>"),
            "formula_note": ("<p>The factors multiply, so the exponents add: three ten-fold steps is a "
                             "thousand-fold dilution, not thirty-fold. That is the arithmetic error the "
                             "page exists to prevent.</p>"),
            "example_note": ("<p>1 mol/L through three ten-fold steps: 1 ÷ 10³ = 0.001 mol/L, with a total "
                             "factor of 1000. The intermediate solutions are 0.1 and 0.01 mol/L, which is "
                             "what a dilution series plate actually holds.</p>"),
            "reading": ("<p>Keep the final concentration inside the measuring range of your assay. A "
                        "ten-fold series run one step too far lands below the detection limit, and the "
                        "result is a blank rather than a low reading.</p>"),
            "scenarios": [
                {"inputs": {"stock_conc": 0.5, "dilution_factor": 2, "steps": 5},
                 "note": "Five doubling dilutions take 0.5 mol/L down to 0.0156 mol/L — the classic "
                         "two-fold series for a titration or an ELISA."},
                {"inputs": {"stock_conc": 100, "dilution_factor": 100, "steps": 2},
                 "note": "Two hundred-fold steps give a total of ten thousand, so 100 mg/mL becomes 0.01 "
                         "mg/mL."},
            ],
            "pitfalls": [
                "<strong>Factors added instead of multiplied.</strong> Ten three times is a thousand, not "
                "thirty — the single commonest serial-dilution mistake.",
                "<strong>Carry-over between steps.</strong> A tip that is not changed leaves a few "
                "microlitres of the previous, stronger solution in the next tube.",
                "<strong>Step count off by one.</strong> The stock itself is step zero; diluting it once "
                "is one step, not two.",
            ],
            "units_note": ("<p>The concentration comes back in whatever unit went in, because only the "
                           "factor and the step count do any work. The dilution factors and the fold figure "
                           "are plain numbers.</p>"),
            "limits": [
                "<strong>It assumes perfect mixing and exact volumes.</strong> Real pipettes carry a per "
                "cent or so of error that compounds with the step count.",
                "<strong>It ignores the detection limit.</strong> Whether the final solution can be "
                "measured is an analytical question, not an arithmetic one.",
            ],
            "uses": [
                "<li>Planning a standard curve's concentration series.</li>",
                "<li>Getting a working concentration from a concentrated stock.</li>",
                "<li>Checking a serial dilution someone else has designed.</li>",
            ],
        },
        faq=[
            ("Is a 1:10 dilution a dilution factor of 10 or 9?",
             "Ten. The factor is final volume divided by sample volume — one part sample into nine parts "
             "diluent is 1 in 10, a factor of 10."),
            ("How many steps do I need for a million-fold dilution?",
             "Six ten-fold steps. The page's step box accepts up to 20, and the total factor shows the "
             "cumulative result as you go."),
        ],
        related=[("/chemistry/solution-dilution", "Solution dilution"),
                 ("/chemistry/dilution-factor", "Dilution factor"),
                 ("/chemistry/alligation", "Alligation")],
    ),

    S(
        slug="bleach-dilution",
        name="Bleach Dilution Calculator",
        title="Bleach Dilution Calculator: From Stock to ppm",
        desc="Convert a stock sodium hypochlorite percentage into the volume needed for a target concentration in parts per million, with the water to add alongside.",
        what=("<p>Bleach is sold as a percentage of sodium hypochlorite by mass per volume, and disinfection "
              "protocols are written in parts per million of available chlorine. One per cent w/v is "
              "10 000 mg/L, so <strong>V stock = target ppm × V final ÷ (% × 10 000)</strong>.</p>"),
        fields=[
            F("stock_percent", "Strength of the stock bleach", "% w/v", 5,
              "5 % w/v is the common household strength"),
            F("target_ppm", "Target concentration", "ppm", 1000,
              "1 000 ppm is a 1:50 dilution of 5 % bleach"),
            F("final_volume", "Volume of solution needed", "L", 1,
              "How much working solution you are making"),
        ],
        results=[
            R("stock_volume", "Volume of stock bleach", "mL"),
            R("water_volume", "Volume of water to add", "mL"),
            R("dilution_factor", "Dilution factor", ""),
        ],
        formula={
            "stock_volume": "target_ppm*final_volume/(stock_percent*10000)*1000",
            "water_volume": "final_volume*1000-target_ppm*final_volume/(stock_percent*10000)*1000",
            "dilution_factor": "stock_percent*10000/target_ppm",
            "stock_percent": "target_ppm*dilution_factor/10000",
            "target_ppm": "stock_percent*10000/dilution_factor",
            "final_volume": "stock_volume/(target_ppm/(stock_percent*10000))/1000",
        },
        prose={
            "why": ("<p>Disinfection protocols are written as ppm of available chlorine — 1 000 ppm for a "
                    "blood spill, 100 ppm for food surfaces — and bleach is sold as a percentage. The "
                    "conversion is one division, but getting it wrong by a factor of ten is both a "
                    "disinfection failure and a hazard.</p>"),
            "formula_note": ("<p>Percent w/v means grams per 100 mL, which is ten thousand milligrams per "
                             "litre. Dividing the target ppm by that gives the fraction of stock needed, "
                             "and multiplying by the final volume gives the millilitres to measure.</p>"),
            "example_note": ("<p>1 000 ppm from 5 % stock: 5 × 10 000 = 50 000 mg/L, so the fraction is "
                             "1 000 ÷ 50 000 = 0.02 — a 1:50 dilution. For one litre, that is 20 mL of "
                             "bleach and 980 mL of water.</p>"),
            "reading": ("<p>Check the label's percentage before trusting the default. Household bleach "
                        "ranges from 2.5 % to 6 %, and thick or scented products often carry less "
                        "available chlorine than the plain one beside them.</p>"),
            "scenarios": [
                {"inputs": {"stock_percent": 5, "target_ppm": 5000, "final_volume": 1},
                 "note": "5 000 ppm is a 1:10 dilution: 100 mL of bleach in a litre."},
                {"inputs": {"stock_percent": 12.5, "target_ppm": 1000, "final_volume": 5},
                 "note": "Pool-strength 12.5 % bleach needs 8 mL in five litres for 1 000 ppm."},
            ],
            "pitfalls": [
                "<strong>The percentage read as ppm directly.</strong> 5 % is 50 000 ppm, not 5 ppm; the "
                "factor of ten thousand is where most errors live.",
                "<strong>Mixing bleach with acid or ammonia.</strong> Chlorine gas and chloramine come off "
                "the solution — this is a safety rule, not a calculation one.",
                "<strong>Assuming the percentage stays.</strong> Bleach loses strength in storage, about "
                "half its activity a year at room temperature in a warm cupboard.",
            ],
            "units_note": ("<p>The stock volume comes back in millilitres because the percentage is mass "
                           "per 100 mL. The final volume is entered in litres; for smaller volumes enter "
                           "the decimal, not millilitres.</p>"),
            "limits": [
                "<strong>Available chlorine, not hypochlorite mass.</strong> Some products quote both, and "
                "they differ by the chlorine content of the molecule.",
                "<strong>It says nothing about contact time.</strong> Concentration and time are two "
                "halves of a disinfection protocol.",
            ],
            "uses": [
                "<li>Making a surface disinfectant to a stated ppm.</li>",
                "<li>Scaling a 1:50 recipe to a five-litre bucket.</li>",
                "<li>Comparing the cost per litre of two bleach strengths.</li>",
            ],
        },
        faq=[
            ("What does 1 000 ppm of bleach mean in practice?",
             "It means 1 000 mg of available chlorine per litre, which is a 1:50 dilution of 5 % household "
             "bleach — about 20 mL in a litre of water."),
            ("Can I use ppm and mg/L interchangeably?",
             "For dilute aqueous solutions, yes. One milligram per litre is one part per million when the "
             "solution is mostly water."),
        ],
        related=[("/chemistry/ppm-to-molarity", "PPM to molarity"),
                 ("/chemistry/solution-dilution", "Solution dilution"),
                 ("/chemistry/dilution-factor", "Dilution factor")],
    ),
    S(
        slug="reconstitution",
        name="Reconstitution Calculator",
        title="Reconstitution Calculator: mg per mL and Dose Volume",
        desc="After adding a diluent to a vial of powder, work out the concentration it makes and the volume you need to draw to deliver a prescribed dose in millilitres.",
        what=("<p>A vial holds a fixed mass of drug; the diluent you add sets its concentration. "
              "<strong>Concentration = mass ÷ volume</strong>, and the volume to draw is "
              "<strong>dose ÷ concentration</strong>. This page reports both, together with what is left "
              "in the vial.</p>"),
        fields=[
            F("vial_mass", "Drug mass in the vial", "mg", 500,
              "As printed on the label, in terms of the salt or the base — use one throughout"),
            F("diluent_volume", "Volume of diluent added", "mL", 10,
              "The volume you actually added, not the nominal fill volume"),
            F("dose", "Dose to administer", "mg", 250,
              "The prescribed mass for this patient"),
        ],
        results=[
            R("concentration", "Concentration after reconstitution", "mg/mL"),
            R("draw_volume", "Volume to draw", "mL"),
            R("remaining_volume", "Volume left in the vial", "mL"),
            R("remaining_mass", "Mass left in the vial", "mg"),
        ],
        formula={
            "concentration": "vial_mass/diluent_volume",
            "draw_volume": "dose/(vial_mass/diluent_volume)",
            "remaining_volume": "diluent_volume-dose/(vial_mass/diluent_volume)",
            "remaining_mass": "vial_mass-dose",
            "vial_mass": "concentration*diluent_volume",
            "diluent_volume": "vial_mass/concentration",
            "dose": "draw_volume*concentration",
        },
        prose={
            "why": ("<p>Reconstitution arithmetic is the last step before a drug reaches a patient, and it "
                    "is done under time pressure by hand. Knowing the concentration the vial now holds — "
                    "and what that means in millilitres — is the difference between a correct dose and a "
                    "ten-fold error.</p>"),
            "formula_note": ("<p>The diluent volume, not the final volume, is what divides the mass, "
                             "because powder contributes almost no volume. A 500 mg vial brought to 10 mL "
                             "is 50 mg/mL; the same vial brought to 10 mL *final* volume, with the powder "
                             "displacing some of that, is slightly stronger.</p>"),
            "example_note": ("<p>500 mg in 10 mL is 50 mg/mL. A 250 mg dose is 5 mL drawn; 250 mg stays "
                             "in the vial, which is half the contents and half the volume. If the label "
                             "says the powder displaces 0.5 mL, the concentration is 52.6 mg/mL instead.</p>"),
            "reading": ("<p>Check the concentration against what the label or the protocol expects before "
                        "drawing anything. A figure ten times too high is usually a milligram/gram slip; "
                        "the weight of an error that gets through is not measured in millilitres.</p>"),
            "scenarios": [
                {"inputs": {"vial_mass": 1000, "diluent_volume": 20, "dose": 125},
                 "note": "1 g in 20 mL is 50 mg/mL, so 125 mg is 2.5 mL — the familiar pattern of a "
                         "1 g vial and a paediatric dose."},
                {"inputs": {"vial_mass": 250, "diluent_volume": 5, "dose": 50},
                 "note": "250 mg in 5 mL is 50 mg/mL and a 50 mg dose is exactly 1 mL."},
            ],
            "pitfalls": [
                "<strong>Final volume used as diluent volume.</strong> If the label says bring the total "
                "to 10 mL, the powder occupies part of it and the concentration is higher than mass ÷ 10.",
                "<strong>Salt against base.</strong> 500 mg of a hydrochloride salt is not 500 mg of the "
                "free base; use the form the prescription names.",
                "<strong>Dead volume ignored.</strong> A vial's overfill and the needle's hold-up mean the "
                "last dose is short — never plan to the last drop.",
            ],
            "units_note": ("<p>Milligrams and millilitres throughout, giving milligrams per millilitre. If "
                           "the vial is labelled in grams or units, convert once at the start rather than "
                           "mixing scales in the boxes.</p>"),
            "limits": [
                "<strong>It assumes complete dissolution.</strong> Powder that will not fully dissolve "
                "leaves the concentration lower and the dose unreliable.",
                "<strong>It is arithmetic, not pharmacy.</strong> Stability, compatibility with the "
                "diluent and expiry after reconstitution are separate questions with real answers.",
            ],
            "uses": [
                "<li>Working out the concentration after adding a diluent.</li>",
                "<li>Converting a prescribed dose into a draw volume.</li>",
                "<li>Checking a colleague's reconstitution calculation.</li>",
            ],
        },
        faq=[
            ("Why not divide by the final volume?",
             "Because you do not know it until the powder is in. Most labels quote the diluent volume for "
             "exactly this reason; if the label quotes a final volume, the concentration is higher than "
             "mass ÷ that figure by the volume the powder displaces."),
            ("Does the concentration change with temperature?",
             "Slightly, by thermal expansion of the liquid. For a dose calculation at room temperature the "
             "effect is far below the accuracy of a syringe."),
        ],
        related=[("/chemistry/resuspension", "Resuspension"),
                 ("/chemistry/mass-concentration-to-molar-concentration", "Mass to molar concentration"),
                 ("/chemistry/molarity", "Molarity")],
    ),

    S(
        slug="resuspension",
        name="Resuspension Calculator",
        title="Resuspension Calculator: Solvent Volume to Add",
        desc="For a lyophilised powder, find the volume of solvent that gives the concentration you want, or the concentration that a given volume of solvent produces.",
        what=("<p>Resuspending a lyophilised powder is the reverse of reconstituting a drug vial: you choose "
              "the concentration and the page tells you how much liquid to add, "
              "<strong>V = mass ÷ concentration</strong>. It reports the volume in millilitres and the "
              "concentration in both mg/mL and µg/µL, which are the same number.</p>"),
        fields=[
            F("powder_mass", "Mass of lyophilised powder", "mg", 10,
              "Mass of protein or compound in the vial"),
            F("target_conc", "Target concentration", "mg/mL", 1,
              "What the assay protocol asks for"),
        ],
        results=[
            R("solvent_volume", "Volume of solvent to add", "mL"),
            R("conc_ug_ul", "Concentration", "µg/µL"),
            R("total_aliquot_1ml", "Aliquots of 100 µL at this concentration", ""),
        ],
        formula={
            "solvent_volume": "powder_mass/target_conc",
            "conc_ug_ul": "target_conc",
            "total_aliquot_1ml": "powder_mass/target_conc*10",
            "powder_mass": "solvent_volume*target_conc",
            "target_conc": "powder_mass/solvent_volume",
        },
        prose={
            "why": ("<p>Every lyophilised protein comes with a mass and no volume. The concentration is "
                    "whatever you make it, so the solvent volume is a decision rather than a measurement — "
                    "and it is the decision that sets every dilution downstream.</p>"),
            "formula_note": ("<p>mg/mL and µg/µL are the same unit written twice: one milligram per "
                             "millilitre is one microgram per microlitre. A protocol that asks for 1 µg/µL "
                             "wants 1 mg/mL, and no conversion is needed.</p>"),
            "example_note": ("<p>10 mg of powder at 1 mg/mL takes 10 mL of solvent, and makes twenty "
                             "100 µL aliquots. At 2 mg/mL the same vial takes 5 mL and makes ten aliquots — "
                             "the same material, half the handling.</p>"),
            "reading": ("<p>Choose the concentration from the assay's working range, not from convenience. "
                        "A stock that is too dilute forces large volumes into a small well; too "
                        "concentrated and the freeze-thaw aliquots are too small to pipette accurately.</p>"),
            "scenarios": [
                {"inputs": {"powder_mass": 25, "target_conc": 2.5},
                 "note": "25 mg at 2.5 mg/mL is 10 mL — a common working stock for an antibody."},
                {"inputs": {"powder_mass": 1, "target_conc": 0.5},
                 "note": "1 mg at 0.5 mg/mL is 2 mL, and the same 0.5 µg/µL in the protocol's units."},
            ],
            "pitfalls": [
                "<strong>Adding to the powder instead of the powder to the solvent.</strong> Either works "
                "for dissolution, but adding liquid to a dry cake wets it more evenly than tipping powder "
                "into a tube wall.",
                "<strong>Centrifuging before opening.</strong> Powder on the cap or the seal is a real "
                "fraction of a small vial; spin it down first.",
                "<strong>Ignoring the salt and the counter-ion.</strong> A stated mass may include "
                "counter-ions, so the active mass is lower than the number on the label.",
            ],
            "units_note": ("<p>Milligrams and millilitres give milligrams per millilitre, which is the same "
                           "as micrograms per microlitre. The aliquot count assumes 100 µL aliquots; "
                           "recalculate for a different size.</p>"),
            "limits": [
                "<strong>It assumes full solubility.</strong> Many proteins need a specific buffer and will "
                "not reach the target concentration at all.",
                "<strong>It says nothing about stability.</strong> Freeze-thaw cycles and the choice of "
                "buffer decide how long the stock lasts.",
            ],
            "uses": [
                "<li>Making up a protein stock to a protocol's concentration.</li>",
                "<li>Planning how many aliquots a vial will give.</li>",
                "<li>Converting a target concentration into a volume to pipette.</li>",
            ],
        },
        faq=[
            ("Is µg/µL the same as mg/mL?",
             "Yes, exactly: 1 µg/µL = 1 mg/mL. The two are the same concentration written with different "
             "prefixes, which is why protocols use them interchangeably."),
            ("Should I resuspend the whole vial?",
             "Usually yes. Dissolving part of a lyophilised cake is impossible to do reproducibly; "
             "resuspend everything and aliquot the result."),
        ],
        related=[("/chemistry/reconstitution", "Reconstitution"),
                 ("/chemistry/concentration", "Concentration"),
                 ("/chemistry/dilution-factor", "Dilution factor")],
    ),

    S(
        slug="mixing-ratio",
        name="Mixing Ratio Calculator",
        title="Mixing Ratio Calculator: Parts of A and B by Volume",
        desc="Turn a ratio such as 1:3 into the volumes of each component that a given batch needs, with the share each part takes in the finished mixture by volume.",
        what=("<p>A mixing ratio of A:B means A parts of one component for every B parts of the other. "
              "For a batch of total volume V, <strong>V<sub>A</sub> = V × A ÷ (A + B)</strong>, and the "
              "second component takes the rest. The page reports both volumes and each one's share.</p>"),
        fields=[
            F("part_a", "Parts of component A", "", 1, "The first number of the ratio", bounds=(0.01, 100)),
            F("part_b", "Parts of component B", "", 3, "The second number of the ratio", bounds=(0.01, 100)),
            F("total_volume", "Total volume needed", "L", 1, "The batch size, in litres"),
        ],
        results=[
            R("volume_a", "Volume of component A", "mL"),
            R("volume_b", "Volume of component B", "mL"),
            R("share_a", "Share of component A", "%"),
        ],
        formula={
            "volume_a": "total_volume*part_a/(part_a+part_b)*1000",
            "volume_b": "total_volume*part_b/(part_a+part_b)*1000",
            "share_a": "part_a/(part_a+part_b)*100",
            "total_volume": "volume_a/(part_a/(part_a+part_b)*1000)",
            "part_a": "share_a*part_b/(100-share_a)",
            "part_b": "part_a*(100-share_a)/share_a",
        },
        prose={
            "why": ("<p>Ratios are how two-part epoxy, concrete mixes, nutrient solutions and paint "
                    "thinners are specified. The arithmetic is a proportion, but the parts are not "
                    "percentages, and treating 1:3 as 33 % and 67 % is where batches go wrong.</p>"),
            "formula_note": ("<p>The denominator is the sum of the parts, not the total of a hundred. A "
                             "1:3 ratio is four parts in all, so A is a quarter of the volume — 25 %, not "
                             "33 %.</p>"),
            "example_note": ("<p>A litre at 1:3 takes 250 mL of A and 750 mL of B. The ratio is not a "
                             "percentage split: four parts in total, one of them A.</p>"),
            "reading": ("<p>Check the answer against the ratio: B should be three times A for 1:3, and the "
                        "two volumes should add to the batch size. If they do not, a unit slipped between "
                        "litres and millilitres.</p>"),
            "scenarios": [
                {"inputs": {"part_a": 1, "part_b": 1, "total_volume": 5},
                 "note": "A 1:1 mix of five litres is 2.5 L each — the case where a ratio does match a "
                         "percentage split."},
                {"inputs": {"part_a": 2, "part_b": 3, "total_volume": 0.5},
                 "note": "Half a litre at 2:3 is 200 mL and 300 mL, five parts of a hundred millilitres."},
            ],
            "pitfalls": [
                "<strong>The ratio read as percentages.</strong> 1:3 is 25 % and 75 %; adding the two "
                "ratio numbers and calling them percentages gives 1 % and 3 %.",
                "<strong>Mixing by mass when the ratio is by volume.</strong> Resins, diluents and "
                "solvents often have densities near 1 but not equal to it, and the mistake shows up only "
                "when the batch will not cure.",
                "<strong>Shrinkage on mixing.</strong> Solvent plus water, or resin plus hardener, can end "
                "up smaller than the sum; make up to the mark rather than trusting addition.",
            ],
            "units_note": ("<p>Enter the batch in litres and both component volumes come back in "
                           "millilitres. The share is a percentage of volume, and the parts themselves are "
                           "plain numbers with no units at all.</p>"),
            "limits": [
                "<strong>Two components only.</strong> A three-part ratio needs the same proportion split "
                "across three denominators.",
                "<strong>It assumes volumes are additive.</strong> That is very good for most liquids and "
                "poor for concentrated alcohol solutions.",
            ],
            "uses": [
                "<li>Mixing two-part resins and adhesives to the maker's ratio.</li>",
                "<li>Making up a nutrient or developer solution from a stock ratio.</li>",
                "<li>Scaling a 1:3 recipe to a batch size you actually need.</li>",
            ],
        },
        faq=[
            ("Is a 1:3 ratio the same as 1 part in 3?",
             "No. 1:3 means one part plus three parts, four in total, so the first component is a quarter "
             "of the mix. One part in three would be a third."),
            ("How do I scale a ratio to a different batch size?",
             "Find the total parts, divide the batch volume by that number to get one part's volume, then "
             "multiply by each ratio number. This page does exactly that."),
        ],
        related=[("/chemistry/alligation", "Alligation"),
                 ("/chemistry/dilution-factor", "Dilution factor"),
                 ("/chemistry/solution-dilution", "Solution dilution")],
    ),

    S(
        slug="cubic-cell",
        name="Cubic Cell Calculator",
        title="Cubic Cell Calculator: Density From Unit Cell",
        desc="Compute a crystal's density from its unit cell — the atoms the cell holds, the element's molar mass, and the cube's edge in angstroms, converted to g/cm³.",
        what=("<p>Density follows from the cell: <strong>ρ = n × M ÷ (N<sub>A</sub> × a³)</strong>, where "
              "n is the number of atoms per unit cell and a is the edge length. The cell volume comes out "
              "in cubic centimetres, so angstroms convert cleanly into grams per cubic centimetre.</p>"),
        fields=[
            F("atoms_per_cell", "Atoms per unit cell", "", 4,
              "Four for face-centred cubic, two for body-centred, one for simple cubic", bounds=(1, 12)),
            F("molar_mass", "Molar mass of the element", "g/mol", 63.546,
              "Copper is 63.546"),
            F("edge_length", "Unit cell edge length", "Å", 3.615,
              "From X-ray diffraction; copper's cell is 3.615 Å on each side"),
        ],
        results=[
            R("cell_volume", "Volume of one unit cell", "cm³"),
            R("density", "Density", "g/cm³"),
            R("mass_per_cell", "Mass of one unit cell", "g"),
        ],
        formula={
            "cell_volume": "pow(edge_length*0.00000001,3)",
            "density": "atoms_per_cell*molar_mass/(6.02214076*100000000000000000000000*pow(edge_length*0.00000001,3))",
            "mass_per_cell": "atoms_per_cell*molar_mass/6.02214076/100000000000000000000000",
            "atoms_per_cell": "density*6.02214076*100000000000000000000000*pow(edge_length*0.00000001,3)/molar_mass",
            "molar_mass": "density*6.02214076*100000000000000000000000*pow(edge_length*0.00000001,3)/atoms_per_cell",
            "edge_length": "pow(atoms_per_cell*molar_mass/(density*6.02214076*100000000000000000000000),1/3)/0.00000001",
        },
        prose={
            "why": ("<p>Density measured on a balance and density calculated from a cell should agree. "
                    "When they do, the crystal structure is confirmed; when they do not, the packing is "
                    "different from the one assumed — which is how body-centred and face-centred cells are "
                    "told apart.</p>"),
            "formula_note": ("<p>The number of atoms per cell counts fractions: a corner atom is shared by "
                             "eight cells and contributes one eighth, a face atom one half, a body-centre "
                             "atom one whole. Face-centred cubic works out to four whole atoms per cell.</p>"),
            "example_note": ("<p>Copper is face-centred cubic: four atoms, 63.546 g/mol, and a 3.615 Å "
                             "edge. The cell volume is 4.72 × 10⁻²³ cm³ and the density works out at 8.93 "
                             "g/cm³, which is what a piece of copper weighs.</p>"),
            "reading": ("<p>A calculated density well above the measured one means too many atoms were "
                        "counted per cell; below it means too few. The ratio between the two is the quickest "
                        "guide to whether the cell is primitive, body-centred or face-centred.</p>"),
            "scenarios": [
                {"inputs": {"atoms_per_cell": 2, "molar_mass": 55.845, "edge_length": 2.866},
                 "note": "Iron as body-centred cubic: two atoms and a 2.866 Å edge give 7.87 g/cm³."},
                {"inputs": {"atoms_per_cell": 4, "molar_mass": 26.982, "edge_length": 4.05},
                 "note": "Aluminium, face-centred cubic: 4 atoms at 4.05 Å give 2.70 g/cm³."},
            ],
            "pitfalls": [
                "<strong>Angstroms entered as centimetres.</strong> 1 Å is 1 × 10⁻⁸ cm; the conversion "
                "inside this page assumes the box holds angstroms.",
                "<strong>Atoms per cell counted as corners.</strong> Eight corners contribute one atom "
                "between them, not eight.",
                "<strong>Density of a powder used for comparison.</strong> A powder includes voids between "
                "grains, so the measured figure is lower than the crystal's own density.",
            ],
            "units_note": ("<p>The edge length is in angstroms, the molar mass in grams per mole, and the "
                           "density comes back in grams per cubic centimetre — the units crystallography "
                           "reports and the ones a handbook lists.</p>"),
            "limits": [
                "<strong>Cubic cells only.</strong> Hexagonal and tetragonal cells need a different "
                "volume formula, with more than one edge length.",
                "<strong>It assumes a pure, perfect crystal.</strong> Defects and substitutional impurities "
                "change both the cell volume and the mass per cell.",
            ],
            "uses": [
                "<li>Identifying a metal's crystal structure from its measured density.</li>",
                "<li>Predicting a density before a sample is available.</li>",
                "<li>Checking an X-ray diffraction cell parameter against a handbook value.</li>",
            ],
        },
        faq=[
            ("Why four atoms in a face-centred cubic cell?",
             "Eight corners contribute one eighth each — one atom — and six faces contribute one half "
             "each — three atoms. Four in total."),
            ("What if my edge length is in picometres?",
             "Divide by a hundred. Copper's 361.5 pm is 3.615 Å, and entering 361.5 gives a cell volume a "
             "million times too large."),
        ],
        related=[("/chemistry/atom", "Atom"),
                 ("/chemistry/molar-mass", "Molar mass"),
                 ("/chemistry/average-atomic-mass", "Average atomic mass")],
    ),

    S(
        slug="average-atomic-mass",
        name="Average Atomic Mass Calculator",
        title="Average Atomic Mass Calculator: Two Isotopes",
        desc="Combine two isotopes, each with its percentage abundance and its exact atomic mass, into the average atomic mass the periodic table prints for that element.",
        what=("<p>The atomic mass on the periodic table is a weighted average: "
              "<strong>Ar = (a₁m₁ + a₂m₂) ÷ (a₁ + a₂)</strong>. Enter each isotope's percentage "
              "abundance and its exact mass in atomic mass units, and the page returns the figure a "
              "periodic table would list.</p>"),
        fields=[
            F("abundance_1", "Abundance of isotope 1", "%", 75.77, "Chlorine-35 is 75.77 %", bounds=(0, 100)),
            F("mass_1", "Mass of isotope 1", "u", 34.9689, "Exact mass from the mass spectrum"),
            F("abundance_2", "Abundance of isotope 2", "%", 24.23, "Chlorine-37 is 24.23 %", bounds=(0, 100)),
            F("mass_2", "Mass of isotope 2", "u", 36.9659, "Exact mass, not the mass number"),
        ],
        results=[
            R("average_mass", "Average atomic mass", "u"),
            R("total_abundance", "Total abundance", "%"),
            R("heavier_fraction", "Mass contributed by isotope 2", "%"),
        ],
        formula={
            "average_mass": "(abundance_1*mass_1+abundance_2*mass_2)/(abundance_1+abundance_2)",
            "total_abundance": "abundance_1+abundance_2",
            "heavier_fraction": "abundance_2*mass_2/(abundance_1*mass_1+abundance_2*mass_2)*100",
            "abundance_1": "abundance_2*(average_mass-mass_2)/(mass_1-average_mass)",
            "abundance_2": "abundance_1*(mass_1-average_mass)/(average_mass-mass_2)",
            "mass_1": "((abundance_1+abundance_2)*average_mass-abundance_2*mass_2)/abundance_1",
            "mass_2": "((abundance_1+abundance_2)*average_mass-abundance_1*mass_1)/abundance_2",
        },
        prose={
            "why": ("<p>No atom of chlorine weighs 35.45 u; that figure is the average over a bottle of "
                    "chlorine atoms. Every molar mass in the rest of chemistry depends on this weighting, "
                    "which is why the isotopes' exact masses rather than their mass numbers appear in it.</p>"),
            "formula_note": ("<p>Dividing by the total abundance rather than by a hundred makes the page "
                             "tolerant of abundances that sum to something other than a hundred — useful "
                             "when a figure comes off a partial analysis.</p>"),
            "example_note": ("<p>Chlorine: 0.7577 × 34.9689 + 0.2423 × 36.9659 gives 35.45 u, the figure on "
                             "the periodic table. The masses are 34.9689 and 36.9659, not 35 and 37 — using "
                             "the mass numbers gives 35.48, which is close but not the table's value.</p>"),
            "reading": ("<p>Check the total abundance first. A total near 100 % and an answer close to the "
                        "table value means the isotope data is consistent; a total of 92 % means an isotope "
                        "is missing and the average has been pulled towards the one you did enter.</p>"),
            "scenarios": [
                {"inputs": {"abundance_1": 69.15, "mass_1": 62.9296, "abundance_2": 30.85,
                            "mass_2": 64.9278},
                 "note": "Copper's two isotopes average to 63.55 u, which is the table's figure and not a "
                         "whole number."},
                {"inputs": {"abundance_1": 50.69, "mass_1": 78.9183, "abundance_2": 49.31,
                            "mass_2": 80.9163},
                 "note": "Bromine comes out at 79.90 u — an almost even split, so the average sits nearly "
                         "midway between the two masses."},
            ],
            "pitfalls": [
                "<strong>Mass numbers used instead of isotope masses.</strong> 35 and 37 are labels; the "
                "actual masses are 34.9689 and 36.9659, and the difference shows in the second decimal.",
                "<strong>Abundances that do not sum to a hundred.</strong> Either an isotope is missing or "
                "one figure is wrong; the total abundance here tells you which.",
                "<strong>The average treated as a real atom.</strong> No single chlorine atom weighs 35.45 "
                "u — a mass spectrometer shows two clean peaks, nothing in between.",
            ],
            "units_note": ("<p>Isotope masses are in unified atomic mass units, which are numerically "
                           "identical to grams per mole for the average. The abundances are percentages and "
                           "the total abundance that comes back is a percentage too.</p>"),
            "limits": [
                "<strong>Two isotopes at a time.</strong> Elements such as tin have ten; combine the results "
                "in pairs, or weight them all by abundance directly.",
                "<strong>It assumes a natural sample.</strong> An enriched or depleted sample has different "
                "abundances and, for some elements, a measurably different molar mass.",
            ],
            "uses": [
                "<li>Checking isotope data against the periodic table.</li>",
                "<li>Finding the abundance ratio a measured average implies.</li>",
                "<li>Explaining why atomic masses are not whole numbers.</li>",
            ],
        },
        faq=[
            ("Why is chlorine's atomic mass 35.45 and not 35.5?",
             "Because the isotopes' exact masses are 34.9689 and 36.9659 u at abundances of 75.77 and "
             "24.23 %. The weighted average lands at 35.45; rounding the isotope masses to 35 and 37 gives "
             "a slightly different answer."),
            ("Does the average atomic mass change from sample to sample?",
             "Slightly, because natural isotope ratios vary with the source. That variation is why the "
             "periodic table quotes an interval for some elements."),
        ],
        related=[("/chemistry/atomic-mass", "Atomic mass"),
                 ("/chemistry/atom", "Atom"),
                 ("/chemistry/molar-mass", "Molar mass")],
    ),
]
