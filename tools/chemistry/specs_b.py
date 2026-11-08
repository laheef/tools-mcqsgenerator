"""Batch 1b — concentration: molarity, molality, normality, fractions, percent."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="concentration",
        name="Concentration Calculator",
        title="Concentration Calculator: g/L and mol/L Units",
        desc="Enter the mass of solute, the volume of solution and the molar mass to get the strength in grams per litre and in moles per litre from the same three numbers.",
        what=("<p>Concentration says how much solute sits in a stated volume of solution. This page reports "
              "it in both of the units a lab uses: <strong>mass concentration = m ÷ V</strong> in g/L, and "
              "<strong>molarity = (m ÷ M) ÷ V</strong> in mol/L, from the same three numbers.</p>"),
        fields=[
            F("mass_solute", "Mass of solute (m)", "g", 5, "What was dissolved"),
            F("volume", "Volume of solution (V)", "L", 0.25,
              "Final volume after dissolving, not the volume of solvent added"),
            F("molar_mass", "Molar mass (M)", "g/mol", 58.44,
              "Molar mass of the solute; 58.44 for sodium chloride"),
        ],
        results=[
            R("mass_conc", "Mass concentration", "g/L"),
            R("molarity", "Molarity", "mol/L"),
            R("millimolarity", "Molarity", "mmol/L"),
        ],
        formula={
            "mass_conc": "mass_solute/volume",
            "molarity": "mass_solute/molar_mass/volume",
            "millimolarity": "mass_solute/molar_mass/volume*1000",
            "mass_solute": "mass_conc*volume",
            "volume": "mass_solute/mass_conc",
            "molar_mass": "mass_solute/molarity/volume",
        },
        prose={
            "why": ("<p>The two units answer different questions. g/L is what you weigh and pour; mol/L is "
                    "what reacts. A solution can be strong in grams and dilute in moles — 5 g/L of a "
                    "polymer is almost nothing chemically, 5 g/L of sodium chloride is 86 mmol/L.</p>"),
            "formula_note": ("<p>The molar mass is the only thing linking the two results, so a wrong molar "
                             "mass changes the molarity and leaves the g/L figure standing. That asymmetry is "
                             "useful when you are checking which number is wrong.</p>"),
            "example_note": ("<p>5 g of sodium chloride made up to 250 mL is 20 g/L and 0.342 mol/L. The "
                             "volume is the final one: if you add 250 mL of water to 5 g of salt the volume "
                             "is slightly more than 250 mL, and every figure shifts.</p>"),
            "reading": ("<p>Compare the two results against familiar benchmarks. Seawater is about 35 g/L of "
                        "dissolved salts, a physiological saline is 9 g/L (0.154 mol/L), and a 1 M solution "
                        "of a small salt is strong enough to matter in most reactions.</p>"),
            "scenarios": [
                {"inputs": {"mass_solute": 9, "volume": 1, "molar_mass": 58.44},
                 "note": "Normal saline: 9 g/L is 0.154 mol/L."},
                {"inputs": {"mass_solute": 58.44, "volume": 1, "molar_mass": 58.44},
                 "note": "A molar mass of solute per litre is exactly 1 M, by definition."},
            ],
            "pitfalls": [
                "<strong>Solvent volume used as solution volume.</strong> Volumes are not additive; make the "
                "solution up to the mark rather than adding a measured volume of water.",
                "<strong>Molar mass of the anhydrous form used for a hydrate.</strong> The water of "
                "crystallisation adds to the mass that has to dissolve.",
                "<strong>g/L mistaken for g per 100 mL.</strong> The percent figure is ten times smaller "
                "than the g/L figure, and the two are written side by side on reagent bottles.",
            ],
            "units_note": ("<p>The volume box is in litres. A 250 mL flask is 0.25 L; entering 250 gives an "
                           "answer a thousand times too small and is the commonest slip on this page.</p>"),
            "limits": [
                "<strong>It assumes complete dissolution.</strong> Undissolved solid contributes nothing to "
                "the concentration, however much was weighed in.",
                "<strong>It ignores volume change on mixing.</strong> Strong solutions of salts and alcohols "
                "shrink or swell; the volume you enter is the one used.",
            ],
            "uses": [
                "<li>Turning a recipe's weighed mass into the molarity the reaction needs.</li>",
                "<li>Checking that a bought solution matches its stated strength.</li>",
                "<li>Converting between the g/L on a label and the mol/L in a method.</li>",
            ],
        },
        faq=[
            ("What is the difference between g/L and molarity?",
             "g/L counts mass, molarity counts particles. Dividing the first by the molar mass gives the "
             "second, which is why the same solution has two very different numbers attached to it."),
        ],
        related=[("/chemistry/molarity", "Molarity"),
                 ("/chemistry/mass-concentration-to-molar-concentration", "Mass to molar concentration"),
                 ("/chemistry/percent-solution", "Percent solution")],
    ),

    S(
        slug="molarity",
        name="Molarity Calculator",
        title="Molarity Calculator: Moles per Litre of Solution",
        desc="Work out molarity from moles of solute and litres of solution, or solve backwards for the moles or the volume that a target strength of solution needs.",
        what=("<p>Molarity is the number of moles of solute in one litre of solution, "
              "<strong>M = n ÷ V</strong>, and it is the concentration unit that balanced equations speak. "
              "This page solves the relationship in all three directions, so it answers both <em>how strong "
              "is this?</em> and <em>what do I need to make it?</em></p>"),
        fields=[
            F("moles", "Moles of solute (n)", "mol", 0.5, "Amount dissolved"),
            F("volume", "Volume of solution (V)", "L", 0.25,
              "Final volume, measured after the solute has dissolved"),
        ],
        results=[
            R("molarity", "Molarity (M)", "mol/L"),
            R("millimolarity", "Molarity", "mmol/L"),
        ],
        formula={
            "molarity": "moles/volume",
            "millimolarity": "moles/volume*1000",
            "moles": "molarity*volume",
            "volume": "moles/molarity",
        },
        prose={
            "why": ("<p>Molarity is the unit chemistry happens in: one mole of A reacts with two moles of B, "
                    "so the reacting ratio is a ratio of molarities times volumes. Every titration reduces to "
                    "that idea, and every stock solution is described by it.</p>"),
            "formula_note": ("<p>M is mol per litre, so the volume must be in litres. A 500 mL volumetric "
                             "flask is 0.5 L, and a 50 mL aliquot is 0.05 L — the conversion is where most "
                             "errors on this page enter.</p>"),
            "example_note": ("<p>Half a mole made up to 250 mL gives 2 mol/L. Reverse the question and the "
                             "same numbers say that 2 M in 250 mL needs 0.5 mol; the page answers whichever "
                             "box you leave empty.</p>"),
            "reading": ("<p>Read molarity against the reaction you have in mind. Millimolar solutions are "
                        "typical for enzyme work, 0.1–1 M for general synthesis, and 10 M and above only for "
                        "concentrated acids and ammonia, where the solute is most of the solution.</p>"),
            "scenarios": [
                {"inputs": {"moles": 1, "volume": 1},
                 "note": "One mole in one litre is 1 M, the definition."},
                {"inputs": {"moles": 0.01, "volume": 0.1},
                 "note": "10 mmol in 100 mL is still 0.1 M — molarity is a ratio, not a quantity."},
            ],
            "pitfalls": [
                "<strong>Volume in millilitres.</strong> 250, not 0.25, gives an answer a thousand times out.",
                "<strong>Volume before dissolving.</strong> Solid solutes add volume; make up to the mark "
                "after dissolution, not before.",
                "<strong>Moles left in millimoles.</strong> The molarity result inherits the factor of a "
                "thousand exactly.",
            ],
            "units_note": ("<p>1 M = 1 mol/L = 1 mmol/mL. The millimolar result is the same number times a "
                           "thousand, which is why a 2 M stock is a 2 000 mM stock and a 1:1000 dilution of "
                           "it is 2 mM.</p>"),
            "limits": [
                "<strong>Molarity depends on temperature.</strong> The volume expands with heat, so a "
                "solution made at 20 °C is slightly less molar at 37 °C. Molality does not move.",
                "<strong>It counts formula units, not ions.</strong> A 1 M solution of NaCl is 2 mol/L in "
                "ions, which matters for every colligative and conductivity property.",
            ],
            "uses": [
                "<li>Preparing a stock solution to a stated strength.</li>",
                "<li>Converting a titration's titre into the concentration of the unknown.</li>",
                "<li>Working out what dilution a working solution needs from a stock.</li>",
            ],
        },
        faq=[
            ("Is molarity the same as molality?",
             "No. Molarity is moles per litre of solution; molality is moles per kilogram of solvent. They "
             "agree closely in dilute aqueous solutions and diverge as the solute takes up volume."),
            ("What does a 1 M solution mean in practice?",
             "One mole of the substance dissolved and made up to one litre in total. For sodium chloride "
             "that is 58.44 g in a 1 L flask filled to the mark."),
        ],
        related=[("/chemistry/concentration", "Concentration"),
                 ("/chemistry/molality", "Molality"),
                 ("/chemistry/solution-dilution", "Solution dilution")],
    ),

    S(
        slug="molality",
        name="Molality Calculator",
        title="Molality Calculator: Moles per Kilogram Solvent of It",
        desc="Find molality from the moles of solute and the mass of solvent in grams — the temperature-proof concentration unit used for colligative property work.",
        what=("<p>Molality is the number of moles of solute per kilogram of <em>solvent</em>, "
              "<strong>b = n ÷ m<sub>solvent</sub></strong>, and its advantage is that it does not move when "
              "the solution is heated: mass does not expand. This page converts bench masses in grams into "
              "the molality that boiling-point and freezing-point equations need.</p>"),
        fields=[
            F("moles", "Moles of solute (n)", "mol", 0.5, "Amount of the dissolved substance"),
            F("solvent_mass_g", "Mass of solvent", "g", 500,
              "The liquid doing the dissolving, not the solution"),
        ],
        results=[
            R("molality", "Molality (b)", "mol/kg"),
            R("millimolality", "Molality", "mmol/kg"),
        ],
        formula={
            "molality": "moles/(solvent_mass_g/1000)",
            "millimolality": "moles/(solvent_mass_g/1000)*1000",
            "moles": "molality*solvent_mass_g/1000",
            "solvent_mass_g": "moles/molality*1000",
        },
        prose={
            "why": ("<p>Every colligative property — freezing-point depression, boiling-point elevation, "
                    "osmotic pressure, vapour-pressure lowering — is proportional to the number of particles "
                    "per kilogram of solvent. Using molarity there introduces a temperature error exactly "
                    "when temperature is what you are measuring.</p>"),
            "formula_note": ("<p>The 1000 in the expression converts grams to kilograms. If you already have "
                             "the solvent mass in kilograms, type it as grams by multiplying by a thousand — "
                             "or leave the mass box empty and solve from a molality you already know.</p>"),
            "example_note": ("<p>Half a mole of solute in 500 g of water is 1 mol/kg. The same solution is "
                             "roughly 1 M, but not exactly: its total volume is a little over 500 mL, and it "
                             "is the kilogram of water, not the litre of solution, that this page divides by.</p>"),
            "reading": ("<p>Molality is numerically close to molarity for dilute aqueous solutions and "
                        "increasingly different above 1 mol/kg, where the solute occupies a real fraction of "
                        "the volume. When the two disagree by more than a few per cent, the molality is the "
                        "one to use in any equation that involves a temperature change.</p>"),
            "scenarios": [
                {"inputs": {"moles": 1, "solvent_mass_g": 1000},
                 "note": "One mole per kilogram of solvent is 1 mol/kg, the definition."},
                {"inputs": {"moles": 0.05844, "solvent_mass_g": 1000},
                 "note": "58.44 mmol of salt in a kilogram of water is 0.058 mol/kg — a freezing point "
                         "depression of about 0.108 °C."},
            ],
            "pitfalls": [
                "<strong>Solution mass used instead of solvent mass.</strong> The solute is inside the "
                "solution; subtracting it matters as soon as the solution is concentrated.",
                "<strong>Molality and molarity swapped.</strong> In water at room temperature they are close "
                "enough to hide the mistake until a calculation that depends on the difference.",
                "<strong>Grams assumed.</strong> The box says grams and the formula divides by a thousand; a "
                "mass typed in kilograms makes the answer a thousand times too small.",
            ],
            "units_note": ("<p>The unit is mol kg⁻¹, sometimes written lowercase m. It is not the same as "
                           "molarity's uppercase M, and the two are easy to confuse in a lab notebook.</p>"),
            "limits": [
                "<strong>It needs the solvent identified.</strong> A kilogram of water and a kilogram of "
                "ethanol behave completely differently at the same molality.",
                "<strong>It assumes the solute is fully dissolved.</strong> A saturated solution has undissolved "
                "solid that is not part of the molality.",
            ],
            "uses": [
                "<li>Freezing-point and boiling-point calculations, where molality is the correct unit.</li>",
                "<li>Comparing solutions made at different temperatures.</li>",
                "<li>Electrolyte work where the number of particles matters more than the volume.</li>",
            ],
        },
        faq=[
            ("Why use molality instead of molarity?",
             "Because mass does not change with temperature and volume does. Any property tied to the "
             "solvent's mass — freezing point, boiling point, vapour pressure — is written in molality."),
        ],
        related=[("/chemistry/molarity", "Molarity"),
                 ("/chemistry/normality", "Normality"),
                 ("/chemistry/freezing-point-depression", "Freezing point depression")],
    ),

    S(
        slug="normality",
        name="Normality Calculator",
        title="Normality Calculator: N and Equivalents per Litre",
        desc="Convert molarity to normality with the n-factor of an acid, base or salt, and see how many equivalents a given volume of the solution actually carries.",
        what=("<p>Normality counts equivalents rather than moles: <strong>N = M × n</strong>, where the "
              "n-factor is the number of protons, hydroxide ions or electrons one formula unit contributes "
              "to the reaction. For sulfuric acid the n-factor is 2, for sodium hydroxide 1, and for "
              "potassium permanganate in acid solution 5.</p>"),
        fields=[
            F("molarity", "Molarity (M)", "mol/L", 0.1, "Moles per litre of solution"),
            F("n_factor", "Equivalents per mole (n)", "", 2,
              "2 for H₂SO₄, 1 for HCl, 3 for H₃PO₄, 5 for KMnO₄ in acid"),
            F("volume", "Volume of solution (V)", "L", 0.5, "The portion you are working with"),
        ],
        results=[
            R("normality", "Normality (N)", "eq/L"),
            R("equivalents", "Equivalents in that volume", "eq"),
        ],
        formula={
            "normality": "molarity*n_factor",
            "equivalents": "molarity*n_factor*volume",
            "molarity": "normality/n_factor",
            "n_factor": "normality/molarity",
            "volume": "equivalents/(molarity*n_factor)",
        },
        prose={
            "why": ("<p>Normality is the unit titrations were written in for a century, and it survives "
                    "because it makes the arithmetic of neutralisation trivial: one equivalent of acid "
                    "neutralises one equivalent of base, whatever the formula. No stoichiometric coefficients "
                    "to carry through the calculation.</p>"),
            "formula_note": ("<p>The n-factor is not a property of the substance alone — it depends on the "
                             "reaction. Sulfuric acid is 1 for a single proton exchange, 2 when both protons "
                             "react, and permanganate is 5 in acid but 3 in neutral solution.</p>"),
            "example_note": ("<p>0.1 M sulfuric acid has a normality of 0.2 N, and 0.5 L of it carries 0.1 "
                             "equivalents of acid — enough to neutralise 0.1 mol of sodium hydroxide, "
                             "because the n-factor of NaOH is 1.</p>"),
            "reading": ("<p>Normality is always equal to or larger than molarity, and the ratio between them "
                        "is the n-factor. If a normality comes out smaller than the molarity, the n-factor "
                        "was entered below 1 and the calculation is wrong.</p>"),
            "scenarios": [
                {"inputs": {"molarity": 1, "n_factor": 1, "volume": 1},
                 "note": "A monoprotic acid is the case where normality and molarity coincide."},
                {"inputs": {"molarity": 0.02, "n_factor": 5, "volume": 0.25},
                 "note": "0.02 M permanganate in acid is 0.1 N; a 250 mL portion carries 25 meq of oxidising power."},
            ],
            "pitfalls": [
                "<strong>n-factor guessed from the formula.</strong> It comes from the reaction, not the "
                "subscripts; acetic acid is monoprotic however many hydrogens it has.",
                "<strong>Normality used where molarity is meant.</strong> Thermodynamics, equilibrium and "
                "spectroscopy all use molarity. Normality is for stoichiometric matching only.",
                "<strong>Mixed acid and base definitions.</strong> For a base the n-factor counts hydroxide "
                "ions or protons accepted, not protons donated.",
            ],
            "units_note": ("<p>The equivalent is not a mole and has no single SI unit; the result is reported "
                           "in eq/L, which is numerically the same as meq/mL. Both are written N.</p>"),
            "limits": [
                "<strong>It needs a defined reaction.</strong> Without knowing what the substance is "
                "reacting with, the n-factor is only a convention.",
                "<strong>It is not a thermodynamic concentration.</strong> Equilibrium constants are not "
                "written in normality.",
            ],
            "uses": [
                "<li>Titration calculations written in the old equivalent style.</li>",
                "<li>Water treatment and effluent dosing, where equivalents match directly.</li>",
                "<li>Redox work: the electron count is the n-factor.</li>",
            ],
        },
        faq=[
            ("Is 1 N always 1 M?",
             "Only when the n-factor is 1 — hydrochloric acid or sodium hydroxide, for example. Sulfuric "
             "acid at 1 M is 2 N, and potassium permanganate in acid is 5 N per mole."),
        ],
        related=[("/chemistry/molarity", "Molarity"),
                 ("/chemistry/molality", "Molality"),
                 ("/chemistry/titration", "Titration")],
    ),

    S(
        slug="mole-fraction",
        name="Mole Fraction Calculator",
        title="Mole Fraction Calculator: x1 and x2 Fractions",
        desc="Work out the mole fraction of each component in a two-component mixture from their amounts in moles, and check that the two fractions add up to exactly one.",
        what=("<p>The mole fraction of a component is its moles divided by the total moles, "
              "<strong>x₁ = n₁ ÷ (n₁ + n₂)</strong>. It is unitless, lies between 0 and 1, and the fractions "
              "of a mixture always add to exactly 1 — which makes it the natural variable for Raoult's law "
              "and every gas-phase calculation.</p>"),
        fields=[
            F("n1", "Moles of component 1 (n₁)", "mol", 2, "Amount of the first substance"),
            F("n2", "Moles of component 2 (n₂)", "mol", 6, "Amount of the second substance"),
        ],
        results=[
            R("x1", "Mole fraction of component 1 (x₁)", ""),
            R("x2", "Mole fraction of component 2 (x₂)", ""),
        ],
        formula={
            "x1": "n1/(n1+n2)",
            "x2": "n2/(n1+n2)",
            "n1": "x1*n2/(1-x1)",
            "n2": "x2*n1/(1-x2)",
        },
        prose={
            "why": ("<p>Mole fraction is what partial pressure and vapour pressure are made of. In a gas "
                    "mixture the partial pressure of a component is its mole fraction times the total "
                    "pressure; above a liquid mixture, the vapour pressure of each component is its mole "
                    "fraction times its pure vapour pressure.</p>"),
            "formula_note": ("<p>Only the ratio matters. Doubling both amounts leaves both fractions "
                             "unchanged, which is why the page does not ask for a volume or a mass — the "
                             "composition alone determines the answer.</p>"),
            "example_note": ("<p>2 mol of one component and 6 mol of another is 2 ÷ 8 = 0.25 and 6 ÷ 8 = "
                             "0.75. Those two fractions would give partial pressures of 0.25 atm and "
                             "0.75 atm in a gas at one atmosphere.</p>"),
            "reading": ("<p>Check that the two results add to 1: they must, to the last digit the page "
                        "prints. A total that is off by a few per cent means the numbers were rounded before "
                        "they were entered, not that the arithmetic is wrong.</p>"),
            "scenarios": [
                {"inputs": {"n1": 1, "n2": 1},
                 "note": "Equal amounts give equal fractions — an equimolar mixture, 0.5 and 0.5."},
                {"inputs": {"n1": 0.02, "n2": 9.98},
                 "note": "A dilute solute: 0.002 mole fraction, which is 2 parts per thousand."},
            ],
            "pitfalls": [
                "<strong>Mass used as moles.</strong> A mixture that is 50 % by mass is rarely 50 % by mole, "
                "because the molecules differ in mass.",
                "<strong>A third component ignored.</strong> The fractions of a three-component mixture are "
                "computed over the total of all three; this page handles two.",
                "<strong>Fractions reported as percentages.</strong> 0.25 and 25 % are the same composition, "
                "but the arithmetic downstream expects one or the other.",
            ],
            "units_note": ("<p>Mole fraction has no unit at all. Percent by mole is the same number times a "
                           "hundred; parts per million is the same number times a million.</p>"),
            "limits": [
                "<strong>It describes composition, not behaviour.</strong> Two mixtures with identical mole "
                "fractions can behave completely differently if the components interact.",
                "<strong>It is limited to two components.</strong> For three or more, total the moles of all "
                "components and divide each by that total.",
            ],
            "uses": [
                "<li>Partial pressures in a gas mixture.</li>",
                "<li>Raoult's law and vapour pressure above a liquid mixture.</li>",
                "<li>Expressing the composition of an alloy, a solvent blend or a distillate.</li>",
            ],
        },
        faq=[
            ("Do the mole fractions always add to one?",
             "Yes, by definition, because each is a share of the same total. If they do not, one of the "
             "amounts you typed is wrong or a component was left out."),
            ("How is mole fraction different from mass percent?",
             "Mass percent divides by mass, mole fraction divides by moles. For a mixture of water and "
             "ethanol the two differ substantially because a mole of ethanol weighs 46 g and a mole of "
             "water 18 g."),
        ],
        related=[("/chemistry/mass-percent", "Mass percent"),
                 ("/chemistry/partial-pressure", "Partial pressure"),
                 ("/chemistry/raoults-law", "Raoult's law")],
    ),

    S(
        slug="mass-percent",
        name="Mass Percent Calculator",
        title="Mass Percent Calculator: % w/w of a Solution",
        desc="Work out the mass percent of a solution from the mass of solute and the mass of the whole solution, and the grams of solute per kilogram that this implies.",
        what=("<p>Mass percent, written % w/w, is the mass of solute divided by the mass of the entire "
              "solution: <strong>% = (m<sub>solute</sub> ÷ m<sub>solution</sub>) × 100</strong>. It is the "
              "unit on nearly every bottle of concentrated reagent, and it needs no volumetry at all — "
              "which is why it survives in an era of volumetric glassware.</p>"),
        fields=[
            F("mass_solute", "Mass of solute", "g", 5, "The substance being dissolved"),
            F("mass_solution", "Mass of solution", "g", 100,
              "Solute plus solvent — the whole mixture"),
        ],
        results=[
            R("percent", "Mass percent", "% w/w"),
            R("g_per_kg", "Solute per kilogram of solution", "g/kg"),
        ],
        formula={
            "percent": "mass_solute/mass_solution*100",
            "g_per_kg": "mass_solute/mass_solution*1000",
            "mass_solute": "percent*mass_solution/100",
            "mass_solution": "mass_solute/percent*100",
        },
        prose={
            "why": ("<p>Mass percent is how concentrated acids, alkalis and brines are sold. It is also the "
                    "only concentration unit that can be checked with a balance alone, which makes it the "
                    "fallback when a volumetric flask is not to hand.</p>"),
            "formula_note": ("<p>The denominator is the solution, not the solvent. A solution made from 5 g "
                             "of salt and 95 g of water is 5 % w/w; made from 5 g and 100 g of water it is "
                             "4.76 %.</p>"),
            "example_note": ("<p>5 g of solute in 100 g of solution is 5 % w/w and 50 g/kg. That is the same "
                             "composition as 50 g in a kilogram, or 500 g in ten kilograms — mass percent is a "
                             "ratio and scales with the batch.</p>"),
            "reading": ("<p>Read the figure against the reagent you are handling: household bleach is about "
                        "5 % w/w sodium hypochlorite, concentrated hydrochloric acid 37 %, glacial acetic "
                        "acid 99.5 %, and seawater about 3.5 % dissolved salts.</p>"),
            "scenarios": [
                {"inputs": {"mass_solute": 35, "mass_solution": 1000},
                 "note": "35 g per kilogram is 3.5 % — the salinity of seawater."},
                {"inputs": {"mass_solute": 37, "mass_solution": 100},
                 "note": "Concentrated hydrochloric acid, 37 % w/w."},
            ],
            "pitfalls": [
                "<strong>Solvent mass used as solution mass.</strong> Add the solute to the solvent before "
                "dividing, or the percentage comes out high.",
                "<strong>w/w read as w/v.</strong> A 5 % w/v solution has 5 g in 100 mL of solution, which "
                "is a different composition from 5 g in 100 g.",
                "<strong>Mixing mass percent with mole percent.</strong> The two only agree for equimolar "
                "mixtures of equal-mass components.",
            ],
            "units_note": ("<p>Percent means per hundred, so the result of 5 is 5 g per 100 g. The second "
                           "result rescales the same ratio to a kilogram, which is the form density tables "
                           "and mixing calculations usually want.</p>"),
            "limits": [
                "<strong>It needs a complete mass balance.</strong> If the solution lost water to evaporation, "
                "the denominator is wrong and every concentration derived from it is wrong too.",
                "<strong>It does not describe volume.</strong> Two 10 % w/w solutions of different solutes "
                "have different densities and therefore different molarities.",
            ],
            "uses": [
                "<li>Reading a reagent bottle and converting to molarity with the density.</li>",
                "<li>Formulating brines, syrups and pickles, where the ratio is the recipe.</li>",
                "<li>Checking a solution against a specification written in percent by mass.</li>",
            ],
        },
        faq=[
            ("Is mass percent the same as percent concentration?",
             "Only if the label says w/w. Percent w/v uses a volume of solution and percent v/v uses a "
             "volume of solute; all three are common and none of them is interchangeable."),
        ],
        related=[("/chemistry/percent-solution", "Percent solution"),
                 ("/chemistry/mole-fraction", "Mole fraction"),
                 ("/chemistry/percentage-concentration-to-molarity", "Percent to molarity")],
    ),

    S(
        slug="percent-solution",
        name="Percent Solution Calculator",
        title="Percent Solution Calculator: % w/v into g/L",
        desc="Make sense of a percent w/v solution: grams of solute per 100 mL, converted to grams per litre and to the mass concentration that a method expects of it.",
        what=("<p>A percent w/v solution holds so many grams of solute per 100 mL of solution: "
              "<strong>% w/v = (m ÷ V) × 100</strong> with the volume in millilitres. It is the unit of "
              "physiological saline, of many pharmaceutical preparations and of most school chemistry — "
              "and this page converts it into g/L so it can be carried into a molarity calculation.</p>"),
        fields=[
            F("mass_solute", "Mass of solute", "g", 5, "Mass dissolved"),
            F("volume", "Volume of solution", "mL", 100,
              "Final volume in millilitres, after dissolving"),
        ],
        results=[
            R("percent_wv", "Concentration", "% w/v"),
            R("g_per_l", "Mass concentration", "g/L"),
        ],
        formula={
            "percent_wv": "mass_solute/volume*100",
            "g_per_l": "mass_solute/volume*1000",
            "mass_solute": "percent_wv*volume/100",
            "volume": "mass_solute/percent_wv*100",
        },
        prose={
            "why": ("<p>Percent w/v is easy to make and easy to check: weigh the solid, dissolve it, fill to "
                    "the mark. It avoids the molar mass entirely, which is exactly why it is used in "
                    "pharmacy and in medicine, where the strength of a bag of saline is written as 0.9 % "
                    "rather than 154 mmol/L.</p>"),
            "formula_note": ("<p>The factor of 100 in the expression is the definition of percent, and the "
                             "factor of 10 between the two results is the conversion from 100 mL to a litre. "
                             "5 % w/v is 50 g/L; the two numbers differ by a factor of ten, not by a "
                             "convention.</p>"),
            "example_note": ("<p>5 g made up to 100 mL is 5 % w/v and 50 g/L. Divide that 50 g/L by the "
                             "molar mass to get molarity: for glucose, 50 ÷ 180.16 = 0.278 mol/L.</p>"),
            "reading": ("<p>Familiar reference points: normal saline is 0.9 % w/v (9 g/L), glucose for "
                        "infusion is usually 5 % w/v (50 g/L), and a 10 % w/v solution of a small salt is "
                        "already strong enough to be near saturation.</p>"),
            "scenarios": [
                {"inputs": {"mass_solute": 0.9, "volume": 100},
                 "note": "0.9 % w/v is normal saline, 9 g/L."},
                {"inputs": {"mass_solute": 5, "volume": 1000},
                 "note": "5 g in a litre is 0.5 % w/v — a tenth of the strength above, despite the same "
                         "mass of solute."},
            ],
            "pitfalls": [
                "<strong>Volume of water instead of volume of solution.</strong> Fill to the mark; adding "
                "100 mL of water to 5 g of solute gives slightly more than 100 mL of solution.",
                "<strong>% w/v and % w/w confused.</strong> The first counts grams per 100 mL of solution, "
                "the second grams per 100 g of solution. For a dilute aqueous solution they are close; for "
                "concentrated ones they are not.",
                "<strong>mg/mL read as %.</strong> 10 mg/mL is 1 % w/v, not 10 %.",
            ],
            "units_note": ("<p>The volume box is in millilitres because percent w/v is defined per 100 mL. "
                           "Entering litres gives an answer a thousand times too large.</p>"),
            "limits": [
                "<strong>It says nothing about moles.</strong> Percent w/v cannot be used in stoichiometry "
                "until it is divided by the molar mass.",
                "<strong>It is temperature-sensitive.</strong> The volume changes with temperature even "
                "though the mass does not.",
            ],
            "uses": [
                "<li>Making up saline, glucose or any solution specified in percent w/v.</li>",
                "<li>Converting a medicine's stated strength into a mass concentration.</li>",
                "<li>Turning a school practical's percent solution into a molarity for a calculation.</li>",
            ],
        },
        faq=[
            ("How do I turn a percent w/v solution into molarity?",
             "Multiply by ten to get g/L, then divide by the molar mass. A 5 % w/v glucose solution is 50 g/L "
             "and therefore 0.278 mol/L."),
        ],
        related=[("/chemistry/mass-percent", "Mass percent"),
                 ("/chemistry/concentration", "Concentration"),
                 ("/chemistry/percentage-concentration-to-molarity", "Percent to molarity")],
    ),

    S(
        slug="mass-concentration-to-molar-concentration",
        name="Mass to Molar Concentration Calculator",
        title="Mass to Molar Concentration: g/L into mol/L",
        desc="Divide a mass concentration in grams per litre by the molar mass to get molarity, or go the other way from moles per litre back to grams per litre of solution.",
        what=("<p>Mass concentration and molar concentration describe the same solution in two different "
              "currencies. One division converts between them: <strong>M = c<sub>m</sub> ÷ M<sub>r</sub></strong>, "
              "where the mass concentration is in g/L and the molar mass in g/mol.</p>"),
        fields=[
            F("mass_conc", "Mass concentration", "g/L", 10, "Grams of solute per litre of solution"),
            F("molar_mass", "Molar mass", "g/mol", 58.44, "Molar mass of the solute"),
        ],
        results=[
            R("molarity", "Molar concentration", "mol/L"),
            R("millimolarity", "Molar concentration", "mmol/L"),
        ],
        formula={
            "molarity": "mass_conc/molar_mass",
            "millimolarity": "mass_conc/molar_mass*1000",
            "mass_conc": "molarity*molar_mass",
            "molar_mass": "mass_conc/molarity",
        },
        prose={
            "why": ("<p>Analytical methods are written either way depending on what the instrument measures. "
                    "An HPLC method may call for 10 g/L while a kinetics experiment needs the same solution "
                    "as 0.171 mol/L, and the only thing between them is the molar mass.</p>"),
            "formula_note": ("<p>The arithmetic is a single division, so the error budget is entirely in the "
                             "molar mass. A salt bought as a hydrate has a molar mass several per cent higher "
                             "than the anhydrous value on the method sheet.</p>"),
            "example_note": ("<p>10 g/L of sodium chloride is 10 ÷ 58.44 = 0.171 mol/L, or 171 mmol/L. The "
                             "mass figure sounds modest and the molar figure shows how strong the solution "
                             "really is.</p>"),
            "reading": ("<p>Sanity-check the answer against the mass: for anything with a molar mass near "
                        "100 g/mol, moles per litre is roughly a hundredth of grams per litre. Results far "
                        "from that rule of thumb are worth re-reading.</p>"),
            "scenarios": [
                {"inputs": {"mass_conc": 180.16, "molar_mass": 180.16},
                 "note": "A molar mass in g/L is exactly 1 M — the quickest check there is."},
                {"inputs": {"mass_conc": 5, "molar_mass": 50000},
                 "note": "A protein at 5 g/L and 50 kDa is only 0.1 mmol/L, which is why protein work is "
                         "written in micromoles."},
            ],
            "pitfalls": [
                "<strong>Mass concentration in mg/mL.</strong> That is numerically the same as g/L, so no "
                "conversion is needed — but 10 mg/mL is not 10 g/L.",
                "<strong>Molar mass of the wrong form.</strong> Anhydrous versus hydrated shifts the answer "
                "by the water of crystallisation.",
                "<strong>Mixing the units of the two boxes.</strong> The expression expects g/L and g/mol; "
                "anything else has to be converted first.",
            ],
            "units_note": ("<p>Both g/L and mg/mL describe the same concentration. The page takes g/L because "
                           "that is the unit the expression needs; multiply a mg/mL figure by a thousand "
                           "before typing it.</p>"),
            "limits": [
                "<strong>It assumes the solute is fully dissolved and pure.</strong> A stated percent purity "
                "or a suspension changes the real concentration.",
                "<strong>It is an average over the whole solution.</strong> It says nothing about gradients "
                "or local concentrations at a surface.",
            ],
            "uses": [
                "<li>Reconciling a method written in g/L with calculations written in mol/L.</li>",
                "<li>Converting a label's strength into a molarity for a kinetics calculation.</li>",
                "<li>Working out what dilution of a stock gives a target in either unit.</li>",
            ],
        },
        faq=[
            ("Why does the answer depend on molar mass?",
             "Because grams and moles are different currencies. The molar mass is the exchange rate, so the "
             "same g/L figure is a strong solution for a small molecule and a dilute one for a protein."),
        ],
        related=[("/chemistry/concentration", "Concentration"),
                 ("/chemistry/molarity", "Molarity"),
                 ("/chemistry/percentage-concentration-to-molarity", "Percent to molarity")],
    ),

    S(
        slug="percentage-concentration-to-molarity",
        name="Percent to Molarity Calculator",
        title="Percent to Molarity Calculator: % w/w into M",
        desc="Convert a percent by mass solution into molarity with its density and molar mass, the calculation that sits behind every concentrated acid or base label.",
        what=("<p>A bottle of concentrated reagent gives its strength as a percentage by mass, while every "
              "method wants molarity. The bridge is the density: "
              "<strong>M = (% × density × 10) ÷ M<sub>r</sub></strong>, which turns 37 % hydrochloric acid "
              "(density 1.19 g/mL) into 12.1 mol/L.</p>"),
        fields=[
            F("percent", "Concentration", "% w/w", 37, "Percent by mass, as printed on the bottle"),
            F("density", "Density of the solution", "g/mL", 1.19,
              "From the label or a density table, not the density of water"),
            F("molar_mass", "Molar mass", "g/mol", 36.46, "Molar mass of the solute"),
        ],
        results=[
            R("molarity", "Molarity", "mol/L"),
            R("mass_conc", "Mass concentration", "g/L"),
            R("molality_approx", "Moles per kg of solution", "mol/kg"),
        ],
        formula={
            "molarity": "percent*density*10/molar_mass",
            "mass_conc": "percent*density*10",
            "molality_approx": "percent*10/molar_mass",
            "percent": "molarity*molar_mass/density/10",
            "density": "molarity*molar_mass/percent/10",
            "molar_mass": "percent*density*10/molarity",
        },
        prose={
            "why": ("<p>This is the calculation that turns a reagent bottle into a working solution. "
                    "Hydrochloric acid is sold as 37 % w/w, sulfuric acid as 98 %, ammonia as 28 %; none of "
                    "those numbers can go into a stoichiometric calculation until they are divided by a "
                    "molar mass and multiplied by a density.</p>"),
            "formula_note": ("<p>The factor of ten comes from two unit conversions at once: 100 g of "
                             "solution to a percentage, and a millilitre to a litre. It is not a fudge "
                             "factor, and it does not change with the substance.</p>"),
            "example_note": ("<p>37 % × 1.19 g/mL × 10 ÷ 36.46 gives 12.08 mol/L, which agrees with the "
                             "12.1 M quoted for concentrated hydrochloric acid. The third result, 12.3 "
                             "mol/kg of solution, shows how little the two differ at this strength.</p>"),
            "reading": ("<p>Compare with the supplier's stated molarity. Most reagent labels print both; if "
                        "the calculation and the label disagree by more than a per cent, the density used is "
                        "the wrong one — check whether it is the solution density or the pure substance's.</p>"),
            "scenarios": [
                {"inputs": {"percent": 98, "density": 1.84, "molar_mass": 98.079},
                 "note": "98 % sulfuric acid at 1.84 g/mL is 18.4 M."},
                {"inputs": {"percent": 28, "density": 0.9, "molar_mass": 17.031},
                 "note": "28 % ammonia solution at 0.9 g/mL is 14.8 M."},
            ],
            "pitfalls": [
                "<strong>Density of the pure solute.</strong> The box wants the density of the solution as "
                "sold; water's 1.00 g/mL is a common and costly substitute.",
                "<strong>Percent read as w/v.</strong> A w/v percentage already contains the volume, so "
                "multiplying by density double-counts it.",
                "<strong>Molar mass of the solution.</strong> The molar mass belongs to the solute alone.",
            ],
            "units_note": ("<p>Density must be in g/mL so that the percentage, the density and the factor of "
                           "ten give grams per litre. kg/m³ values are a thousand times smaller and need "
                           "converting.</p>"),
            "limits": [
                "<strong>It needs the true density at your temperature.</strong> Concentrated acids expand "
                "noticeably between 15 °C and 30 °C.",
                "<strong>It assumes one solute.</strong> A mixed reagent — an acid with a stabiliser, for "
                "instance — gives the total dissolved mass, not the active component's.",
            ],
            "uses": [
                "<li>Turning a concentrated acid or base label into the molarity a method needs.</li>",
                "<li>Working out how much of a reagent to weigh for a target molarity.</li>",
                "<li>Checking a supplier's stated molarity against their own percentage and density.</li>",
            ],
        },
        faq=[
            ("Why is a factor of 10 in the formula?",
             "Because a percentage is per 100 g and a molarity is per litre. Density converts the 100 g to "
             "a volume in millilitres, and the factor of ten carries that to a litre."),
            ("Which density should I use?",
             "The density of the solution as supplied, at the temperature you are working at. It is printed "
             "on most reagent labels and tabulated in the supplier's safety data sheet."),
        ],
        related=[("/chemistry/mass-percent", "Mass percent"),
                 ("/chemistry/molarity", "Molarity"),
                 ("/chemistry/mass-concentration-to-molar-concentration", "Mass to molar concentration")],
    ),

    S(
        slug="ppm-to-molarity",
        name="PPM to Molarity Calculator",
        title="PPM to Molarity Calculator: mg/L into mol/L",
        desc="Convert parts per million in water into a molar concentration with the molar mass, the calculation that sits behind water-quality limits and trace analysis.",
        what=("<p>In dilute aqueous solution one part per million is one milligram per litre, so ppm converts "
              "to molarity as <strong>M = ppm ÷ (M<sub>r</sub> × 1000)</strong>. This page does that "
              "division and shows the mg/L figure it starts from.</p>"),
        fields=[
            F("ppm", "Concentration", "ppm", 1000,
              "Parts per million by mass; 1 ppm ≈ 1 mg/L in water"),
            F("molar_mass", "Molar mass", "g/mol", 58.44, "Molar mass of the dissolved substance"),
        ],
        results=[
            R("mg_per_l", "Mass concentration", "mg/L"),
            R("molarity", "Molar concentration", "mol/L"),
            R("micromolarity", "Molar concentration", "µmol/L"),
        ],
        formula={
            "mg_per_l": "ppm",
            "molarity": "ppm/(molar_mass*1000)",
            "micromolarity": "ppm/molar_mass",
            "ppm": "molarity*molar_mass*1000",
            "molar_mass": "ppm/molarity/1000",
        },
        prose={
            "why": ("<p>Drinking-water standards, effluent consents and nutrient solutions are all written in "
                    "ppm or mg/L, while the chemistry behind them — precipitation, complexation, toxicity — "
                    "happens in moles. The conversion is how a regulatory limit becomes an equilibrium "
                    "calculation.</p>"),
            "formula_note": ("<p>The approximation is that a litre of dilute aqueous solution weighs a "
                             "kilogram. That is true to about 0.1 % for the concentrations where ppm is "
                             "normally used, and it is why 1 ppm is treated as 1 mg/L without comment.</p>"),
            "example_note": ("<p>1 000 ppm of sodium chloride is 1 000 mg/L and 0.0171 mol/L — 17 mmol/L. "
                             "The micromolar result, 17 100 µmol/L, is the scale at which trace-metal "
                             "chemists usually work.</p>"),
            "reading": ("<p>Read the molarity against the effect you are studying. Metal solubility limits "
                        "often bite in the micromolar range, nutrient solutions sit in the millimolar range, "
                        "and a 1 000 ppm total-dissolved-solids reading is brackish water.</p>"),
            "scenarios": [
                {"inputs": {"ppm": 10, "molar_mass": 40.078},
                 "note": "10 ppm calcium is 0.25 mmol/L — soft water by any standard."},
                {"inputs": {"ppm": 1, "molar_mass": 1000},
                 "note": "1 ppm of a large molecule is only 1 µmol/L, which is why trace analytics are hard."},
            ],
            "pitfalls": [
                "<strong>ppm by volume used as ppm by mass.</strong> For gases these differ by the density "
                "ratio and the two are routinely confused.",
                "<strong>The 1 kg/L assumption broken.</strong> In brine or a dense solvent, a litre weighs "
                "more than a kilogram and the conversion needs the density.",
                "<strong>ppm read as mg/kg of dry matter.</strong> Environmental results are often quoted "
                "per dry kilogram; the water content has to be allowed for.",
            ],
            "units_note": ("<p>1 ppm = 1 mg/kg ≈ 1 mg/L in water. 1 ppb = 1 µg/L and 1 ppt = 1 ng/L; the "
                           "same conversion chain carries through with the molar mass unchanged.</p>"),
            "limits": [
                "<strong>It is an approximation for dilute aqueous solutions.</strong> Above about 1 % "
                "dissolved solids the density correction matters.",
                "<strong>It cannot distinguish species.</strong> A ppm figure for an element says nothing "
                "about whether it is free ion, complexed or colloidal.",
            ],
            "uses": [
                "<li>Turning a water-quality limit into the molar concentration that drives a reaction.</li>",
                "<li>Preparing trace standards from a concentrated stock in mg/L.</li>",
                "<li>Comparing a nutrient solution's ppm of each ion with a plant's requirement in mmol/L.</li>",
            ],
        },
        faq=[
            ("Is 1 ppm exactly 1 mg/L?",
             "In dilute aqueous solution, to within about 0.1 %. Strictly, ppm is a mass ratio and mg/L is a "
             "mass per volume; they coincide only because a litre of dilute solution weighs almost exactly "
             "a kilogram."),
            ("How do I convert ppb or ppt?",
             "The chain is the same with the decimal point moved: 1 ppb = 1 µg/L and 1 ppt = 1 ng/L. Divide "
             "by the molar mass in g/mol and by 10⁶ or 10⁹ instead of 10³."),
        ],
        related=[("/chemistry/concentration", "Concentration"),
                 ("/chemistry/mass-concentration-to-molar-concentration", "Mass to molar concentration"),
                 ("/chemistry/tds", "Total dissolved solids")],
    ),

    S(
        slug="dilution-factor",
        name="Dilution Factor Calculator",
        title="Dilution Factor Calculator: V2 over V1 Volumes",
        desc="Work out the dilution factor from the sample and final volumes, the diluent to add, and the fraction of the original concentration left in the tube itself.",
        what=("<p>A dilution factor is the ratio of the final volume to the volume of sample it contains: "
              "<strong>DF = V<sub>final</sub> ÷ V<sub>sample</sub></strong>. A 1 in 10 dilution has a factor "
              "of 10, and the concentration of the original is ten times the concentration of the result — "
              "which is why every serial dilution is a chain of factors multiplied together.</p>"),
        fields=[
            F("initial_volume", "Volume of sample", "mL", 1, "How much of the stock went in"),
            F("final_volume", "Final volume", "mL", 10, "The volume it was made up to"),
        ],
        results=[
            R("dilution_factor", "Dilution factor", "×"),
            R("diluent_volume", "Diluent to add", "mL"),
            R("fraction_remaining", "Fraction of the original concentration", ""),
        ],
        formula={
            "dilution_factor": "final_volume/initial_volume",
            "diluent_volume": "final_volume-initial_volume",
            "fraction_remaining": "initial_volume/final_volume",
            "initial_volume": "final_volume/dilution_factor",
            "final_volume": "initial_volume*dilution_factor",
        },
        prose={
            "why": ("<p>The dilution factor is the number written on a tube and used weeks later to correct "
                    "an instrument reading. Getting it wrong is silent: the assay still reports a number, "
                    "just one that is off by the factor you miscounted.</p>"),
            "formula_note": ("<p>Two conventions coexist: a 1:10 dilution means one part sample in ten parts "
                             "total (factor 10), while a 1:9 dilution means one part sample plus nine parts "
                             "diluent — which is also a factor of 10. This page uses volumes, so the "
                             "ambiguity never arises.</p>"),
            "example_note": ("<p>1 mL made up to 10 mL is a dilution factor of 10, with 9 mL of diluent "
                             "added and a tenth of the original concentration left in the tube. Three such "
                             "steps in a row give a factor of 1 000.</p>"),
            "reading": ("<p>The fraction remaining is the number an assay reading is multiplied by to recover "
                        "the original concentration. A reading of 0.4 absorbance taken on a 1-in-10 dilution "
                        "corresponds to a 4-fold stronger original, if the response is linear.</p>"),
            "scenarios": [
                {"inputs": {"initial_volume": 0.5, "final_volume": 10},
                 "note": "0.5 mL in 10 mL is a 20-fold dilution, a common serum dilution for immunoassays."},
                {"inputs": {"initial_volume": 1, "final_volume": 2},
                 "note": "A twofold dilution is the smallest step worth making accurately."},
            ],
            "pitfalls": [
                "<strong>Diluent volume entered as final volume.</strong> Adding 9 mL of water to 1 mL of "
                "sample gives 10 mL; the box wants the 10, not the 9.",
                "<strong>Pipetting error at small volumes.</strong> A 1 µL pipette into 1 mL carries a "
                "relative error ten times larger than a 10 µL into 1 mL.",
                "<strong>Forgetting the factor later.</strong> The factor belongs on the tube, not in "
                "memory; the page is a check on that note.",
            ],
            "units_note": ("<p>The volumes only need to be in the same unit. Microlitres into millilitres are "
                           "fine as long as both boxes are converted — and the ratio, unlike the result, is "
                           "unitless.</p>"),
            "limits": [
                "<strong>It assumes the volumes are additive.</strong> A large volume of a concentrated "
                "stock in a small volume of water can leave the final volume short of the sum.",
                "<strong>It does not account for the assay's own dilution.</strong> A plate reader that "
                "takes up 200 µL has its own factor; multiply the two.",
            ],
            "uses": [
                "<li>Recording what a dilution actually was, on the tube and in the notebook.</li>",
                "<li>Correcting an instrument reading back to the original concentration.</li>",
                "<li>Planning a dilution series so each step is a manageable volume.</li>",
            ],
        },
        faq=[
            ("Is 1:10 the same as a 10-fold dilution?",
             "In most laboratory usage, yes: one part in ten total is a factor of 10. But a 1:10 written by "
             "a pharmacologist sometimes means one part plus nine of diluent, which is also a factor of 10 — "
             "the two readings coincide here, and it is the 1:1 ratios where they do not."),
        ],
        related=[("/chemistry/solution-dilution", "Solution dilution"),
                 ("/chemistry/serial-dilution", "Serial dilution"),
                 ("/chemistry/molarity", "Molarity")],
    ),

    S(
        slug="solution-dilution",
        name="Solution Dilution Calculator",
        title="Solution Dilution Calculator: C1 V1 = C2 V2",
        desc="Dilute a stock to a target strength: enter the stock concentration and the volumes to get the strength you end up with, or the volume you must take out.",
        what=("<p>Dilution conserves the amount of solute, so the product of concentration and volume is the "
              "same before and after: <strong>C₁V₁ = C₂V₂</strong>. Enter the stock strength and either pair "
              "of volumes and the page returns whatever is missing — the diluted concentration, the volume "
              "to take, or the volume to make it up to.</p>"),
        fields=[
            F("c1", "Stock concentration (C₁)", "mol/L", 2, "Strength of the solution in the bottle"),
            F("v1", "Volume taken (V₁)", "mL", 50, "How much stock is pipetted out"),
            F("v2", "Final volume (V₂)", "mL", 500, "The volume it is made up to"),
        ],
        results=[
            R("c2", "Diluted concentration (C₂)", "mol/L"),
            R("c2_mm", "Diluted concentration", "mmol/L"),
            R("diluent_volume", "Diluent to add", "mL"),
        ],
        formula={
            "c2": "c1*v1/v2",
            "c2_mm": "c1*v1/v2*1000",
            "diluent_volume": "v2-v1",
            "c1": "c2*v2/v1",
            "v1": "c2*v2/c1",
            "v2": "c1*v1/c2",
        },
        prose={
            "why": ("<p>This is the single most-used equation in a laboratory. Almost nothing is used at the "
                    "strength it is bought at; almost everything is a dilution of a stock, and the amount of "
                    "solute is what has to be preserved.</p>"),
            "formula_note": ("<p>Any consistent unit of concentration works, and any consistent unit of volume "
                             "works, because both sides are products. That is why a method can mix molarity "
                             "with millilitres without converting anything — but not molarity with milligrams.</p>"),
            "example_note": ("<p>50 mL of 2 M stock made up to 500 mL gives 0.2 mol/L — a tenfold dilution. "
                             "450 mL of diluent was added, and the second result confirms the strength in "
                             "millimoles: 200 mmol/L.</p>"),
            "reading": ("<p>The ratio V₂ ÷ V₁ is the dilution factor, so the answer can always be checked "
                        "against it: a tenfold dilution is a tenth of the strength, and the concentration "
                        "should be one decimal place different, not two.</p>"),
            "scenarios": [
                {"inputs": {"c1": 1, "v1": 1, "v2": 1000},
                 "note": "1 mL of 1 M into a litre is 1 mmol/L — a thousandfold dilution."},
                {"inputs": {"c1": 0.1, "v1": 10, "v2": 10},
                 "note": "Taking the whole volume leaves the concentration unchanged, which is a useful "
                         "check that the formula is oriented correctly."},
            ],
            "pitfalls": [
                "<strong>Diluent volume used as final volume.</strong> Adding 450 mL to 50 mL gives 500 mL; "
                "adding 500 mL gives 550 mL and a slightly weaker solution than intended.",
                "<strong>Mixing concentration units.</strong> C₁ in mol/L and C₂ in g/L breaks the equation "
                "silently.",
                "<strong>Assuming volumes add.</strong> Ethanol and water famously do not; make up to the "
                "mark rather than trusting the arithmetic of volumes.",
            ],
            "units_note": ("<p>Concentrations must share a unit across C₁ and C₂, and volumes must share a "
                           "unit across V₁ and V₂. The two pairs do not have to match each other.</p>"),
            "limits": [
                "<strong>It assumes the solute is conserved.</strong> If the stock is a suspension or a "
                "volatile solute, the real concentration after dilution is lower.",
                "<strong>It says nothing about activity.</strong> Doubling the dilution does not halve the "
                "activity coefficient in a non-ideal solution.",
            ],
            "uses": [
                "<li>Making a working solution from a concentrated stock.</li>",
                "<li>Working out what concentration a given pipetting scheme will produce.</li>",
                "<li>Scaling a method up or down while keeping the same final strength.</li>",
            ],
        },
        faq=[
            ("What if I know the concentration I want but not the volume to take?",
             "Clear the V₁ box and enter the target concentration as C₂. The page solves for the volume "
             "directly: V₁ = C₂V₂ ÷ C₁."),
            ("Does this work for percent solutions?",
             "Yes, as long as both concentrations are in the same percent convention. Percent w/v and "
             "molarity cannot be mixed in one equation."),
        ],
        related=[("/chemistry/dilution-factor", "Dilution factor"),
                 ("/chemistry/serial-dilution", "Serial dilution"),
                 ("/chemistry/molarity", "Molarity")],
    ),
]
