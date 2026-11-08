"""Batch 5b — biochemistry, solids and engineering practice."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="phase-rule",
        name="Gibbs Phase Rule Calculator",
        title="Gibbs Phase Rule Calculator: Degrees of Freedom",
        desc="Work out how many variables you can set independently in a system, from its number of components and the number of phases that are present in equilibrium.",
        what=("<p>The phase rule counts freedom: <strong>F = C − P + 2</strong>, where C is the number of "
              "components and P the number of phases in equilibrium. The two at the end are temperature and "
              "pressure, which is why holding one of them constant removes one degree of freedom.</p>"),
        fields=[
            F("components", "Independent components", "", 1,
              "Water is one component; a water–sugar solution is two", bounds=(1, 10)),
            F("phases", "Phases present", "", 1,
              "Ice alone is one; ice and water together are two", bounds=(1, 10)),
        ],
        results=[
            R("freedom", "Degrees of freedom", ""),
            R("at_fixed_pressure", "Degrees of freedom at fixed pressure", ""),
            R("max_phases", "Most phases possible for these components", ""),
        ],
        formula={
            "freedom": "components-phases+2",
            "at_fixed_pressure": "components-phases+1",
            "max_phases": "components+2",
            "components": "freedom+phases-2",
            "phases": "components+2-freedom",
        },
        prose={
            "why": ("<p>The phase rule is the reason a phase diagram has the shape it has. It says how many "
                    "lines can meet at a point, why pure water has one boiling temperature at a given "
                    "pressure, and why a eutectic sits at a single composition.</p>"),
            "formula_note": ("<p>Each phase in equilibrium adds a constraint that ties the phases' "
                             "compositions together, and each constraint removes one variable. Subtract "
                             "enough and the count reaches zero — a triple point, where nothing is free at "
                             "all.</p>"),
            "example_note": ("<p>Pure water as a single liquid: C = 1, P = 1, so F = 2 — you can choose a "
                             "temperature and a pressure independently. At the boiling point, liquid and "
                             "vapour coexist, P = 2 and F = 1 — choose the pressure and the temperature "
                             "follows.</p>"),
            "reading": ("<p>A result of zero means the system is invariant: every variable is fixed by the "
                        "phases present. A negative result means those phases cannot coexist at all at "
                        "equilibrium — the page will return it rather than hide it.</p>"),
            "scenarios": [
                {"inputs": {"components": 2, "phases": 1},
                 "note": "A two-component solution: three degrees of freedom — temperature, pressure and "
                         "composition."},
                {"inputs": {"components": 1, "phases": 3},
                 "note": "The triple point of water: zero degrees of freedom at exactly 273.16 K and "
                         "611.7 Pa."},
            ],
            "pitfalls": [
                "<strong>Components counted as substances.</strong> A mixture of water and salt where the "
                "salt is fully dissociated has three species but is still a two-component system by "
                "convention.",
                "<strong>Constituent phases confused with phases present.</strong> Ice and water are two "
                "phases; two pieces of ice are one.",
                "<strong>The plus-two dropped.</strong> At constant pressure the expression becomes "
                "C − P + 1, which is the version most metallurgy problems use.",
            ],
            "units_note": ("<p>Everything here is a count, so no units appear. The two in the expression is "
                           "the number of intensive variables — temperature and pressure — that a "
                           "one-phase system leaves free.</p>"),
            "limits": [
                "<strong>It counts, it does not explain.</strong> The rule says how many variables are "
                "free, not what their values are.",
                "<strong>It assumes equilibrium.</strong> A supercooled liquid or a glass is not at "
                "equilibrium and can hold phases the rule says should be gone.",
            ],
            "uses": [
                "<li>Reading a phase diagram's degrees of freedom.</li>",
                "<li>Checking whether a proposed equilibrium is possible.</li>",
                "<li>Sizing a distillation's specification variables.</li>",
            ],
        },
        faq=[
            ("Why plus two?",
             "Because temperature and pressure are the two intensive variables that can be varied "
             "independently in a system with one phase. Fix one of them and the rule becomes C − P + 1."),
            ("What does a negative number mean?",
             "That the combination of phases cannot coexist in equilibrium: too many phases for the "
             "components available."),
        ],
        related=[("/chemistry/raoults-law", "Raoult's law"),
                 ("/chemistry/boiling-point", "Boiling point"),
                 ("/chemistry/mole-fraction", "Mole fraction")],
    ),

    S(
        slug="enzyme-activity",
        name="Enzyme Activity Calculator",
        title="Enzyme Activity Calculator: From Absorbance Rate",
        desc="Convert a spectrophotometric rate into enzyme activity in international units, corrected for the assay volume and for any dilution of the sample before assay.",
        what=("<p>One international unit is one micromole of substrate converted per minute. From an "
              "absorbance change, <strong>U per mL = ΔA ÷ (ε·l·t)</strong>, with ε in millimolar "
              "inverse-centimetres and t in minutes; the assay volume and the dilution scale it to your "
              "sample.</p>"),
        fields=[
            F("delta_a", "Absorbance change", "ΔA", 0.5,
              "Over the measurement window, at the assay wavelength"),
            F("extinction", "Extinction coefficient", "mM⁻¹·cm⁻¹", 6.22,
              "6.22 for NADH at 340 nm"),
            F("path_length", "Path length", "cm", 1,
              "1 cm for a standard cuvette"),
            F("time", "Time over which ΔA was measured", "min", 1,
              "Minutes, because a unit is defined per minute"),
            F("volume", "Assay volume", "mL", 1,
              "The total volume in the cuvette"),
            F("dilution", "Dilution of the sample", "", 1,
              "10 for a sample diluted ten-fold before assay"),
        ],
        results=[
            R("activity_per_ml", "Activity in the assay", "U/mL"),
            R("total_activity", "Total activity in the assay", "U"),
            R("sample_activity", "Activity of the undiluted sample", "U/mL"),
        ],
        formula={
            "activity_per_ml": "delta_a/(extinction*path_length*time)",
            "total_activity": "delta_a/(extinction*path_length*time)*volume",
            "sample_activity": "delta_a/(extinction*path_length*time)*dilution",
            "delta_a": "activity_per_ml*extinction*path_length*time",
            "extinction": "delta_a/(activity_per_ml*path_length*time)",
            "path_length": "delta_a/(activity_per_ml*extinction*time)",
            "time": "delta_a/(activity_per_ml*extinction*path_length)",
            "volume": "total_activity/(delta_a/(extinction*path_length*time))",
            "dilution": "sample_activity/(delta_a/(extinction*path_length*time))",
        },
        prose={
            "why": ("<p>Enzyme activity is the currency of every biochemistry lab: it is how much enzyme "
                    "you have, how pure a fraction is, and whether a batch is going off. Because it is "
                    "measured as a rate, every number in the assay — volume, path length, time — enters "
                    "the conversion.</p>"),
            "formula_note": ("<p>The bracket ε·l converts absorbance into millimolar concentration, and "
                             "dividing by time makes it a rate. Millimolar per minute is micromoles per "
                             "millilitre per minute, which is exactly a unit per millilitre.</p>"),
            "example_note": ("<p>An NADH assay losing 0.5 absorbance units a minute at 340 nm: 0.5 ÷ 6.22 "
                             "is 0.080 U/mL, so a one millilitre assay holds 0.080 U — 80 milliunits. If "
                             "the sample had been diluted ten-fold, the undiluted activity is 0.80 "
                             "U/mL.</p>"),
            "reading": ("<p>Keep the rate in the linear range: a ΔA per minute between about 0.05 and 0.3 "
                        "is comfortable. Faster than that and the substrate is depleted during the "
                        "measurement; slower and the noise dominates.</p>"),
            "scenarios": [
                {"inputs": {"delta_a": 0.15, "extinction": 6.22, "path_length": 1, "time": 1,
                            "volume": 1, "dilution": 10},
                 "note": "A twenty-fold lower rate with a ten-fold dilution: 0.024 U/mL in the assay, "
                         "0.24 U/mL in the sample."},
                {"inputs": {"delta_a": 1.244, "extinction": 6.22, "path_length": 1, "time": 2,
                            "volume": 0.2, "dilution": 1},
                 "note": "A 200 µL assay read over two minutes: 0.1 U/mL and 0.02 U in the well."},
            ],
            "pitfalls": [
                "<strong>The extinction coefficient in the wrong units.</strong> 6 220 L/(mol·cm) is the "
                "same as 6.22 mM⁻¹·cm⁻¹; the factor of a thousand has to be right or the answer is out "
                "by it.",
                "<strong>Time in seconds.</strong> A unit is per minute, and entering seconds makes the "
                "activity sixty times too large.",
                "<strong>The dilution left out.</strong> Activity per millilitre of a diluted sample is not "
                "the activity of the sample; multiply by the dilution factor.",
            ],
            "units_note": ("<p>Absorbance is dimensionless, the extinction coefficient is per millimolar "
                           "per centimetre and the time is in minutes, which is what makes the answer come "
                           "out in micromoles per millilitre per minute — the international unit.</p>"),
            "limits": [
                "<strong>It needs a known extinction coefficient.</strong> For a coupled assay, the "
                "coefficient belongs to the reporter, not the substrate.",
                "<strong>It says nothing about purity.</strong> Activity per millilitre and specific "
                "activity per milligram of protein are different numbers; this page gives the first.",
            ],
            "uses": [
                "<li>Reporting an enzyme preparation's activity in units.</li>",
                "<li>Converting a plate-reader kinetic read into units per millilitre.</li>",
                "<li>Comparing two batches of the same enzyme.</li>",
            ],
        },
        faq=[
            ("What exactly is one unit of enzyme?",
             "One micromole of substrate converted per minute, under the assay's stated conditions. It is "
             "defined by the assay, not by the protein."),
            ("Why does the assay volume matter?",
             "Because the unit is per millilitre. The same rate in a smaller volume means a higher "
             "concentration of enzyme, and the total activity is what the volume converts."),
        ],
        related=[("/chemistry/beer-lambert-law", "Beer-Lambert law"),
                 ("/chemistry/michaelis-menten-equation", "Michaelis-Menten"),
                 ("/chemistry/protein-solubility", "Protein solubility")],
    ),

    S(
        slug="michaelis-menten-equation",
        name="Michaelis-Menten Calculator",
        title="Michaelis-Menten Calculator: Rate From Vmax and Km",
        desc="Work out an enzyme's reaction velocity at any given substrate concentration, and see how far below its maximum rate the enzyme is really running in practice.",
        what=("<p>The Michaelis–Menten equation describes a saturating rate: "
              "<strong>v = V<sub>max</sub>·S ÷ (K<sub>m</sub> + S)</strong>. At S = Km the enzyme runs at "
              "exactly half its maximum; far above Km it approaches Vmax and stops responding to "
              "substrate.</p>"),
        fields=[
            F("vmax", "Maximum velocity Vmax", "µmol/min", 100,
              "The rate at saturating substrate"),
            F("km", "Michaelis constant Km", "mmol/L", 0.5,
              "The substrate concentration giving half of Vmax"),
            F("substrate", "Substrate concentration", "mmol/L", 1.0,
              "The concentration in the assay"),
        ],
        results=[
            R("velocity", "Reaction velocity", "µmol/min"),
            R("fraction_of_vmax", "Fraction of Vmax", "%"),
            R("substrate_ratio", "Substrate relative to Km", ""),
        ],
        formula={
            "velocity": "vmax*substrate/(km+substrate)",
            "fraction_of_vmax": "substrate/(km+substrate)*100",
            "substrate_ratio": "substrate/km",
            "vmax": "velocity*(km+substrate)/substrate",
            "km": "substrate*(vmax-velocity)/velocity",
            "substrate": "velocity*km/(vmax-velocity)",
        },
        prose={
            "why": ("<p>Km and Vmax are the two numbers that summarise an enzyme. Vmax says how fast it can "
                    "go, Km says how much substrate it needs to get halfway there — and the ratio of "
                    "substrate to Km says whether a change in substrate will change the rate at all.</p>"),
            "formula_note": ("<p>The curve is a rectangular hyperbola, not a straight line: the first half "
                             "of the saturation range costs as much substrate as all the rest. That is why "
                             "assays are run at substrate concentrations several times Km, where the rate "
                             "is nearly independent of small pipetting errors.</p>"),
            "example_note": ("<p>Km = 0.5 mmol/L and S = 1.0 mmol/L: v = 100 × 1.0 ÷ 1.5 = 66.7 µmol/min, "
                             "two thirds of Vmax. Doubling the substrate again takes it to 80 % — each "
                             "doubling buys less than the one before.</p>"),
            "reading": ("<p>At S = Km the enzyme runs at 50 % and the rate is most sensitive to substrate. "
                        "At 10 × Km it is at 91 % and nearly saturated; at 0.1 × Km it is at 9 % and the "
                        "assay is effectively first order in substrate.</p>"),
            "scenarios": [
                {"inputs": {"vmax": 50, "km": 2, "substrate": 2},
                 "note": "Substrate equal to Km gives exactly half of Vmax — the definition, as a check."},
                {"inputs": {"vmax": 50, "km": 2, "substrate": 20},
                 "note": "Ten times Km reaches 90.9 % of Vmax, which is as close to saturated as most "
                         "assays need."},
            ],
            "pitfalls": [
                "<strong>Km and S in different units.</strong> One in millimoles and one in micromoles "
                "puts the ratio out by a thousand.",
                "<strong>Vmax read as the measured rate.</strong> The measured rate only equals Vmax at "
                "infinite substrate; everything finite runs below it.",
                "<strong>It applied to a real assay with inhibition.</strong> Competitive and "
                "non-competitive inhibitors change the apparent Km or Vmax, and this page has neither.",
            ],
            "units_note": ("<p>Km and the substrate must share a unit, so the ratio inside the expression is "
                           "dimensionless. The velocity comes back in whatever unit Vmax was entered in, "
                           "and the fraction of Vmax is a percentage.</p>"),
            "limits": [
                "<strong>One substrate, no inhibitors.</strong> The equation assumes a single substrate and "
                "a simple mechanism.",
                "<strong>Steady-state only.</strong> Before the first few milliseconds the enzyme is still "
                "filling up, and the equation does not apply.",
            ],
            "uses": [
                "<li>Choosing an assay substrate concentration.</li>",
                "<li>Checking whether a rate is substrate-limited.</li>",
                "<li>Reading a Km and Vmax pair off a measured rate.</li>",
            ],
        },
        faq=[
            ("What does Km mean physically?",
             "The substrate concentration at which half the enzyme's active sites are occupied, which is "
             "why it is also the concentration giving half of Vmax."),
            ("Is a low Km good or bad?",
             "Neither — it means high affinity. A low Km enzyme saturates at a low substrate "
             "concentration, which matters when substrate is scarce."),
        ],
        related=[("/chemistry/enzyme-activity", "Enzyme activity"),
                 ("/chemistry/rate-constant", "Rate constant"),
                 ("/chemistry/langmuir-isotherm", "Langmuir isotherm")],
    ),

    S(
        slug="protein-solubility",
        name="Protein Solubility Calculator",
        title="Protein Solubility Calculator: Salting Out Curve",
        desc="Estimate how far a protein's solubility falls as salt is added, using the exponential salting-out relation that every purification step is built on in practice.",
        what=("<p>Salt changes a protein's solubility exponentially: <strong>S = S₀·e<sup>−K<sub>s</sub>·I"
              "</sup></strong>, with S₀ the solubility in pure water, K<sub>s</sub> the salting-out "
              "constant and I the ionic strength. The page reports the solubility, the fraction "
              "remaining, and the fold reduction.</p>"),
        fields=[
            F("s0", "Solubility in pure water", "mg/mL", 10,
              "The solubility with no salt present"),
            F("ks", "Salting-out constant Ks", "L/mol", 2.5,
              "Roughly 1 to 10 for most proteins; a property of the protein and the salt"),
            F("ionic_strength", "Ionic strength of the salt", "mol/L", 0.5,
              "For ammonium sulfate, 0.5 mol/L is about 12 per cent saturation"),
        ],
        results=[
            R("solubility", "Solubility at this salt", "mg/mL"),
            R("fraction_remaining", "Fraction of the salt-free solubility", "%"),
            R("fold_reduction", "Fold reduction in solubility", ""),
        ],
        formula={
            "solubility": "s0*exp(-ks*ionic_strength)",
            "fraction_remaining": "exp(-ks*ionic_strength)*100",
            "fold_reduction": "1/exp(-ks*ionic_strength)",
            "s0": "solubility/exp(-ks*ionic_strength)",
            "ks": "-log(solubility/s0)/ionic_strength",
            "ionic_strength": "-log(solubility/s0)/ks",
        },
        prose={
            "why": ("<p>Salting out is the oldest and still the cheapest way to fractionate a protein "
                    "mixture. At low salt, solubility often rises slightly; past a point it falls "
                    "exponentially, and the constant that governs the fall differs enough between proteins "
                    "to separate them.</p>"),
            "formula_note": ("<p>The exponent is the product of the salt's ionic strength and a constant "
                             "for that protein in that salt. Because it is exponential, a change in ionic "
                             "strength of 1 mol/L can change the solubility by a factor of a hundred or "
                             "more.</p>"),
            "example_note": ("<p>10 mg/mL in water with Ks = 2.5 and I = 0.5 gives 10 × e<sup>−1.25</sup> "
                             "= 2.86 mg/mL — 29 per cent of the salt-free value, a 3.5-fold reduction. "
                             "Doubling the salt to 1.0 mol/L takes it to 0.82 mg/mL.</p>"),
            "reading": ("<p>Purifications are run as stepwise additions: bring the salt to a level where "
                        "the contaminating proteins precipitate, spin them out, then raise it further to "
                        "precipitate the target. The gap between the two constants is what makes the "
                        "separation work.</p>"),
            "scenarios": [
                {"inputs": {"s0": 20, "ks": 3, "ionic_strength": 1.0},
                 "note": "A high Ks protein at 1 mol/L: 20 × e⁻³ = 1.0 mg/mL, a twenty-fold drop."},
                {"inputs": {"s0": 20, "ks": 1.5, "ionic_strength": 1.0},
                 "note": "Half the constant leaves 4.5 mg/mL — four times more soluble, which is exactly "
                         "the difference a step gradient exploits."},
            ],
            "pitfalls": [
                "<strong>Molarity used as ionic strength.</strong> Ammonium sulfate at 0.5 mol/L has an "
                "ionic strength of 1.5, because it splits into three ions of charge 1 and 2.",
                "<strong>Ks assumed constant.</strong> It depends on both the protein and the salt, and it "
                "changes with temperature.",
                "<strong>Precipitation read as denaturation.</strong> Salted-out protein is usually "
                "refoldable; heat or acid precipitation often is not.",
            ],
            "units_note": ("<p>Solubility in milligrams per millilitre, ionic strength in moles per litre "
                           "and Ks in litres per mole keep the exponent dimensionless. The fraction "
                           "remaining is a percentage and the fold reduction is a plain ratio.</p>"),
            "limits": [
                "<strong>A two-constant model.</strong> Real solubility curves bend at low salt and near "
                "saturation, where the salt itself runs out of water to dissolve in.",
                "<strong>It assumes one protein.</strong> In a mixture each protein has its own Ks, which "
                "is the point — but this page describes a single species.",
            ],
            "uses": [
                "<li>Planning an ammonium sulfate cut.</li>",
                "<li>Estimating how much protein will stay in solution at a given salt level.</li>",
                "<li>Comparing two proteins' salting-out behaviour.</li>",
            ],
        },
        faq=[
            ("Why does salt make proteins precipitate?",
             "The ions compete for water, leaving less of it to hydrate the protein. Past a point the "
             "protein's own interactions win and it comes out of solution."),
            ("Which salt is used most?",
             "Ammonium sulfate: it is very soluble, its ions are doubly charged so it works at lower "
             "molarity, and it stabilises rather than denatures most proteins."),
        ],
        related=[("/chemistry/ionic-strength", "Ionic strength"),
                 ("/chemistry/isoelectric-point", "Isoelectric point"),
                 ("/chemistry/enzyme-activity", "Enzyme activity")],
    ),

    S(
        slug="isoelectric-point",
        name="Isoelectric Point Calculator",
        title="Isoelectric Point Calculator: pI From Two pKas",
        desc="Find the pH at which an amino acid or a small peptide carries no net charge, and see the charge that it carries at any other pH you care to ask about.",
        what=("<p>The isoelectric point is the average of the two pKas that bracket the neutral form: "
              "<strong>pI = (pK₁ + pK₂) ÷ 2</strong>. At that pH the molecule is a zwitterion, its net "
              "charge is zero, and its solubility is at a minimum.</p>"),
        fields=[
            F("pka1", "First pKa (the acid group)", "", 2.34,
              "Glycine's carboxyl group is 2.34", bounds=(0, 14)),
            F("pka2", "Second pKa (the base group)", "", 9.60,
              "Glycine's amino group is 9.60", bounds=(0, 14)),
            F("ph", "pH of interest", "", 7.0,
              "The pH you want the net charge at", bounds=(0, 14)),
        ],
        results=[
            R("pi", "Isoelectric point", ""),
            R("net_charge", "Net charge at that pH", ""),
            R("fraction_positive", "Fraction with the acid group protonated", ""),
        ],
        formula={
            "pi": "(pka1+pka2)/2",
            "net_charge": "1/(1+pow(10,ph-pka1))-1/(1+pow(10,pka2-ph))",
            "fraction_positive": "1/(1+pow(10,ph-pka1))",
            "pka2": "2*pi-pka1",
        },
        prose={
            "why": ("<p>The isoelectric point is where a molecule stops migrating in an electric field, "
                    "where it precipitates most readily and where a buffer has the least charge to "
                    "counter. Electrophoresis, isoelectric focusing and protein purification all hang on "
                    "it.</p>"),
            "formula_note": ("<p>The two pKas are the ones either side of the neutral species. For a "
                             "simple amino acid that is the carboxyl and the amino group; for a peptide "
                             "with a side chain that ionises, the average is taken over the pair that "
                             "brackets zero charge, which may be different constants.</p>"),
            "example_note": ("<p>Glycine, with pKas of 2.34 and 9.60, has pI = 5.97. At pH 7 its net "
                             "charge is about −0.0025 — nearly zero on the scale of a whole proton, which "
                             "is why a solution at pH 7 is mostly zwitterion with a trace of anion.</p>"),
            "reading": ("<p>Below the pI a molecule carries net positive charge; above it, net negative. "
                        "The further the pH from the pI, the more charge it carries and the more soluble "
                        "it usually is.</p>"),
            "scenarios": [
                {"inputs": {"pka1": 2.19, "pka2": 9.67, "ph": 6},
                 "note": "Alanine: pI 5.93, and at pH 6 the charge is already slightly negative."},
                {"inputs": {"pka1": 3.65, "pka2": 10.07, "ph": 3.65},
                 "note": "At pH equal to the first pKa, half the carboxyl groups are protonated and the "
                         "net charge is close to +0.5."},
            ],
            "pitfalls": [
                "<strong>The wrong pair of pKas.</strong> For an acidic amino acid such as glutamate the "
                "pI averages the two carboxyl pKas, not the carboxyl and the amino group.",
                "<strong>pI read as neutral pH.</strong> A protein's pI can be 5 or 9; it says nothing "
                "about neutrality in the pH-7 sense.",
                "<strong>Charge treated as a whole number.</strong> The net charge varies continuously "
                "with pH and is rarely exactly zero except at the pI.",
            ],
            "units_note": ("<p>pKa, pH and pI are all dimensionless logarithms of concentrations — no "
                           "units belong anywhere on this page, and adding one is the commonest way to "
                           "confuse a buffer table.</p>"),
            "limits": [
                "<strong>Two pKas only.</strong> A protein with dozens of ionisable groups has an "
                "effective pI, not one derivable from two constants.",
                "<strong>It ignores the environment.</strong> Salt, temperature and neighbouring residues "
                "shift a pKa by up to a unit.",
            ],
            "uses": [
                "<li>Choosing a buffer pH for ion-exchange chromatography.</li>",
                "<li>Predicting which way a peptide migrates in a gel.</li>",
                "<li>Finding the pH of minimum solubility for a precipitation step.</li>",
            ],
        },
        faq=[
            ("Why is a molecule least soluble at its pI?",
             "Because its net charge is zero, so molecules attract each other rather than repelling, and "
             "they aggregate and precipitate."),
            ("How do I find the pI of a protein?",
             "Compute it from its sequence, or measure it by isoelectric focusing. Averaging two pKas is "
             "the small-molecule version."),
        ],
        no_round_trip=["pka1", "ph"],
        related=[("/chemistry/protein-solubility", "Protein solubility"),
                 ("/chemistry/pka", "pKa"),
                 ("/chemistry/buffer-ph", "Buffer pH")],
    ),

    S(
        slug="langmuir-isotherm",
        name="Langmuir Isotherm Calculator",
        title="Langmuir Isotherm Calculator: Surface Coverage",
        desc="Work out how much of a surface is covered at a given concentration, from the adsorption capacity and the Langmuir binding constant for that particular pair.",
        what=("<p>The Langmuir isotherm assumes a fixed number of identical sites that fill up and then "
              "stop: <strong>q = q<sub>max</sub>·K·C ÷ (1 + K·C)</strong>. The page reports the amount "
              "adsorbed, the fraction of sites occupied and the dimensionless product K·C that drives "
              "both.</p>"),
        fields=[
            F("qmax", "Maximum adsorption capacity", "mg/g", 100,
              "Saturation coverage, from the isotherm's plateau"),
            F("k", "Langmuir constant K", "L/mg", 2,
              "The affinity of the adsorbate for the surface"),
            F("concentration", "Equilibrium concentration", "mg/L", 1,
              "The concentration left in solution at equilibrium"),
        ],
        results=[
            R("adsorbed", "Amount adsorbed", "mg/g"),
            R("coverage", "Fraction of sites occupied", "%"),
            R("kc", "K × C", ""),
        ],
        formula={
            "adsorbed": "qmax*k*concentration/(1+k*concentration)",
            "coverage": "k*concentration/(1+k*concentration)*100",
            "kc": "k*concentration",
            "qmax": "adsorbed*(1+k*concentration)/(k*concentration)",
            "k": "adsorbed/(concentration*(qmax-adsorbed))",
            "concentration": "adsorbed/(k*(qmax-adsorbed))",
        },
        prose={
            "why": ("<p>Langmuir's isotherm is the standard description of monolayer adsorption: activated "
                    "carbon, catalysts, antibody surfaces and soil particles all get fitted with it. Two "
                    "numbers — capacity and affinity — then describe the whole curve.</p>"),
            "formula_note": ("<p>At low concentration the product K·C is small and the isotherm is nearly "
                             "linear, with a slope of qmax·K. At high concentration it saturates at qmax. "
                             "The transition happens around C = 1/K.</p>"),
            "example_note": ("<p>qmax = 100 mg/g and K = 2 L/mg at C = 1 mg/L: 66.7 mg/g adsorbed, with "
                             "two thirds of the sites occupied. At 10 mg/L it reaches 95.2 mg/g — the "
                             "remaining sites are hard to fill.</p>"),
            "reading": ("<p>A large K means strong binding and saturation at low concentration. A small K "
                        "means a nearly linear isotherm across the working range, which is easier to use "
                        "but harder to desorb.</p>"),
            "scenarios": [
                {"inputs": {"qmax": 200, "k": 0.1, "concentration": 10},
                 "note": "K·C = 1 gives exactly half the capacity — the definition of the constant, and a "
                         "useful check."},
                {"inputs": {"qmax": 50, "k": 20, "concentration": 5},
                 "note": "Strong binding saturates the surface: 99 per cent coverage at 5 mg/L."},
            ],
            "pitfalls": [
                "<strong>K's units ignored.</strong> K is per concentration unit, so the product K·C only "
                "comes out dimensionless when the two share that unit.",
                "<strong>It fitted to multilayer data.</strong> Where adsorption keeps rising past the "
                "plateau, the BET or Freundlich models apply, not Langmuir.",
                "<strong>The capacity read as the amount adsorbed.</strong> qmax is the ceiling; what you "
                "get at a given concentration is always below it.",
            ],
            "units_note": ("<p>The capacity is in milligrams per gram of adsorbent, the concentration in "
                           "milligrams per litre and K in litres per milligram, so K·C is dimensionless "
                           "and the coverage is a percentage.</p>"),
            "limits": [
                "<strong>One adsorbate, one layer.</strong> Competing species and multilayer adsorption "
                "both break the model.",
                "<strong>It assumes identical sites.</strong> Real surfaces have a distribution of binding "
                "energies, which is why fitted curves often miss at the ends.",
            ],
            "uses": [
                "<li>Sizing a carbon bed from a batch isotherm.</li>",
                "<li>Comparing two adsorbents' capacity and affinity.</li>",
                "<li>Predicting the equilibrium loading for a given dose.</li>",
            ],
        },
        faq=[
            ("What does the Langmuir constant mean?",
             "The affinity of the adsorbate for the surface. Its reciprocal is the concentration at which "
             "half the sites are filled, which is why K·C = 1 gives 50 per cent coverage."),
            ("How do I find qmax and K from data?",
             "Plot C/q against C: the slope is 1/qmax and the intercept is 1/(qmax·K). The page runs the "
             "same relation the other way."),
        ],
        related=[("/chemistry/beer-lambert-law", "Beer-Lambert law"),
                 ("/chemistry/michaelis-menten-equation", "Michaelis-Menten"),
                 ("/chemistry/calibration-curve", "Calibration curve")],
    ),

    S(
        slug="net-ionic-equation",
        name="Net Ionic Equation Calculator",
        title="Net Ionic Equation Calculator: Precipitate Mass",
        desc="After the spectator ions cancel, work out which ion limits a precipitation, how much solid actually forms and what is left over in the solution afterwards.",
        what=("<p>A net ionic equation keeps only the ions that actually react. Once the spectators are "
              "struck out, the stoichiometry is one-to-one in charge, so the limiting ion sets the "
              "precipitate: <strong>mass = min(n<sub>cation</sub>, n<sub>anion</sub>) × M</strong>.</p>"),
        fields=[
            F("cation_moles", "Moles of the precipitating cation", "mol", 0.01,
              "Silver ion, in the silver nitrate solution"),
            F("anion_moles", "Moles of the precipitating anion", "mol", 0.008,
              "Chloride ion, in the salt solution"),
            F("molar_mass", "Molar mass of the precipitate", "g/mol", 143.32,
              "Silver chloride is 143.32"),
        ],
        results=[
            R("precipitate_moles", "Moles of precipitate", "mol"),
            R("precipitate_mass", "Mass of precipitate", "g"),
            R("excess_moles", "Ions left in excess", "mol"),
        ],
        formula={
            "precipitate_moles": "min(cation_moles,anion_moles)",
            "precipitate_mass": "min(cation_moles,anion_moles)*molar_mass",
            "excess_moles": "max(cation_moles,anion_moles)-min(cation_moles,anion_moles)",
            "molar_mass": "precipitate_mass/min(cation_moles,anion_moles)",
        },
        prose={
            "why": ("<p>Writing the net ionic equation is how a double displacement is reduced to what "
                    "actually happens: two ions meet a solid. Everything else was watching, and the "
                    "quantity of solid depends only on the two reacting ions.</p>"),
            "formula_note": ("<p>For a 1:1 precipitate the moles of solid are the smaller of the two ion "
                             "amounts, and the difference is what stays in solution. For a 1:2 salt the "
                             "amounts must first be divided by their charges, which is why the balanced "
                             "equation has to be written before the arithmetic.</p>"),
            "example_note": ("<p>0.010 mol of silver ion meeting 0.008 mol of chloride: 0.008 mol of "
                             "silver chloride forms, which is 1.15 g, and 0.002 mol of silver ion is left "
                             "in solution — the solution is still slightly cloudy with excess, not "
                             "exactly balanced.</p>"),
            "reading": ("<p>A large excess means the precipitate's mass is set by the other ion and more "
                        "reagent would not help. Equal amounts mean the reaction is at its equivalence "
                        "point, which is what a titration is trying to hit.</p>"),
            "scenarios": [
                {"inputs": {"cation_moles": 0.02, "anion_moles": 0.05, "molar_mass": 100.09},
                 "note": "Carbonate in excess: the calcium limits, giving 0.02 mol and 2.00 g of "
                         "calcium carbonate."},
                {"inputs": {"cation_moles": 0.005, "anion_moles": 0.005, "molar_mass": 233.39},
                 "note": "Exactly matched amounts: 0.005 mol and 1.17 g of barium sulfate, with nothing "
                         "left over."},
            ],
            "pitfalls": [
                "<strong>Spectator ions kept.</strong> Sodium and nitrate do not appear in the net "
                "equation, and including them makes the stoichiometry look more complicated than it is.",
                "<strong>Charge ratios ignored.</strong> Silver chloride is 1:1, but silver chromate is "
                "2:1 — the moles of solid are not simply the smaller ion count.",
                "<strong>Solubility ignored.</strong> A sparingly soluble salt leaves some ions in "
                "solution; this page assumes the precipitation goes to completion.",
            ],
            "units_note": ("<p>Moles in, moles and grams out. The molar mass of the solid — not of either "
                           "ion — is what converts, and it must include every ion in the formula "
                           "unit.</p>"),
            "limits": [
                "<strong>One precipitate at a time.</strong> Side reactions and complexes change the "
                "amounts.",
                "<strong>It ignores solubility products.</strong> Where Ksp matters, a small fraction "
                "stays dissolved and the mass is slightly lower.",
            ],
            "uses": [
                "<li>Finding the mass of precipitate a reaction will give.</li>",
                "<li>Checking which reagent is in excess after mixing two solutions.</li>",
                "<li>Setting up a gravimetric analysis.</li>",
            ],
        },
        faq=[
            ("What is a spectator ion?",
             "One that appears unchanged on both sides of the full equation. It is cancelled when the net "
             "ionic equation is written, and it carries no stoichiometry."),
            ("Why is the precipitate mass set by the smaller amount?",
             "Because the reaction stops when either ion runs out. For a 1:1 salt that is simply the "
             "smaller of the two amounts."),
        ],
        no_round_trip=["cation_moles", "anion_moles"],
        related=[("/chemistry/titration", "Titration"),
                 ("/chemistry/theoretical-yield", "Theoretical yield"),
                 ("/chemistry/mole", "Mole")],
    ),

    S(
        slug="saponification-value",
        name="Saponification Value Calculator",
        title="Saponification Value Calculator: mg KOH per Gram",
        desc="Turn a blank and a sample titration into a fat's saponification value in milligrams of potassium hydroxide per gram, plus the molar mass it implies for the oil.",
        what=("<p>The saponification value is the milligrams of potassium hydroxide that one gram of fat "
              "consumes: <strong>SV = 56.1 × (V<sub>blank</sub> − V<sub>sample</sub>) × M ÷ m</strong>. It "
              "measures the average chain length, because shorter chains have more ester groups per "
              "gram.</p>"),
        fields=[
            F("blank_titre", "Titre of the blank", "mL", 25.0,
              "KOH with no fat in it"),
            F("sample_titre", "Titre of the sample", "mL", 15.0,
              "The same digestion with the fat"),
            F("acid_molarity", "Molarity of the titrating acid", "mol/L", 0.5,
              "Hydrochloric acid, standardised"),
            F("sample_mass", "Mass of fat", "g", 2.0,
              "Weighed into the flask"),
        ],
        results=[
            R("saponification_value", "Saponification value", "mg/g"),
            R("koh_consumed", "KOH consumed by the sample", "mg"),
            R("mean_molar_mass", "Mean molar mass of the oil", "g/mol"),
        ],
        formula={
            "saponification_value": "56.1*(blank_titre-sample_titre)*acid_molarity/sample_mass",
            "koh_consumed": "56.1*(blank_titre-sample_titre)*acid_molarity",
            "mean_molar_mass": "3*56.1*1000/(56.1*(blank_titre-sample_titre)*acid_molarity/sample_mass)",
            "blank_titre": "sample_titre+saponification_value*sample_mass/(56.1*acid_molarity)",
            "sample_titre": "blank_titre-saponification_value*sample_mass/(56.1*acid_molarity)",
            "acid_molarity": "saponification_value*sample_mass/((blank_titre-sample_titre)*56.1)",
            "sample_mass": "56.1*(blank_titre-sample_titre)*acid_molarity/saponification_value",
        },
        prose={
            "why": ("<p>Saponification value is how a fat is identified and how a soap recipe is "
                    "calculated. Butter, olive oil and coconut oil sit at very different values — 225, 190 "
                    "and 255 — and the number tells a buyer what the label claims is plausible.</p>"),
            "formula_note": ("<p>The 56.1 is the molar mass of potassium hydroxide in grams per mole. The "
                             "difference in titres is the alkali the fat consumed, and dividing by the "
                             "sample's mass puts it on a per-gram basis.</p>"),
            "example_note": ("<p>A blank at 25.0 mL against a sample at 15.0 mL, 0.5 M acid and 2 g of "
                             "fat: 10 mL of alkali was consumed, which is 280 mg of KOH, or 140 mg per "
                             "gram. A value near 190–200 is typical of olive oil.</p>"),
            "reading": ("<p>Values above 200 mean short chains — coconut and palm kernel. Around 190 is "
                        "olive, rapeseed and sunflower. Below 180 means long chains or a lot of "
                        "unsaponifiable material, such as lanolin or a mineral oil cut.</p>"),
            "scenarios": [
                {"inputs": {"blank_titre": 25, "sample_titre": 12, "acid_molarity": 0.5, "sample_mass": 2},
                 "note": "A shorter-chain fat: 182 mg/g, on the coconut side of the range."},
                {"inputs": {"blank_titre": 25, "sample_titre": 18, "acid_molarity": 0.5, "sample_mass": 2},
                 "note": "98 mg/g is too low for a triglyceride — a sign the sample was largely "
                         "unsaponifiable."},
            ],
            "pitfalls": [
                "<strong>The titres the wrong way round.</strong> Sample minus blank is negative and the "
                "value comes out impossible.",
                "<strong>Free fatty acids counted as saponification.</strong> They consume alkali too, "
                "which is why the acid value is measured separately and subtracted.",
                "<strong>Reflux time too short.</strong> Incomplete saponification leaves unreacted fat "
                "and a value that reads low.",
            ],
            "units_note": ("<p>Titres in millilitres, molarity in moles per litre and the sample in grams "
                           "give milligrams of KOH per gram of fat. The mean molar mass that follows "
                           "assumes a triglyceride, so it is three times the mass per mole of ester.</p>"),
            "limits": [
                "<strong>It is an average.</strong> A mixture of fats gives a weighted average, not a "
                "single compound's value.",
                "<strong>It cannot distinguish isomers.</strong> Two fats with the same chain length "
                "statistics share a saponification value.",
            ],
            "uses": [
                "<li>Checking a fat or oil against its specification.</li>",
                "<li>Calculating the lye a soap recipe needs.</li>",
                "<li>Spotting adulteration in an expensive oil.</li>",
            ],
        },
        faq=[
            ("What is the difference between saponification value and acid value?",
             "The acid value measures free fatty acids; the saponification value measures all the alkali "
             "the fat consumes, including those. A fresh oil has a low acid value."),
            ("Why is the factor 56.1?",
             "It is the molar mass of KOH: one millilitre of 1 M acid corresponds to 56.1 mg of potassium "
             "hydroxide."),
        ],
        related=[("/chemistry/neutralization", "Neutralization"),
                 ("/chemistry/titration", "Titration"),
                 ("/chemistry/molar-mass", "Molar mass")],
    ),

    S(
        slug="crude-protein",
        name="Crude Protein Calculator",
        title="Crude Protein Calculator: Kjeldahl Nitrogen",
        desc="Convert a Kjeldahl nitrogen percentage into crude protein with the standard conversion factor, and see the nitrogen mass that sits behind the declared figure.",
        what=("<p>Crude protein is nitrogen multiplied by a factor that assumes a protein is about 16 per "
              "cent nitrogen: <strong>% protein = % N × 6.25</strong>. The page also reports the nitrogen "
              "and protein masses in a sample of the size you specify.</p>"),
        fields=[
            F("nitrogen_percent", "Nitrogen by mass", "%", 3.2,
              "From a Kjeldahl or Dumas determination"),
            F("factor", "Conversion factor", "", 6.25,
              "6.25 for food and feed; 5.7 for wheat, 6.38 for milk", bounds=(5, 7)),
            F("sample_mass", "Sample mass", "g", 100,
              "The portion the percentages refer to"),
        ],
        results=[
            R("protein_percent", "Crude protein", "%"),
            R("protein_mass", "Protein in the sample", "g"),
            R("nitrogen_mass", "Nitrogen in the sample", "g"),
        ],
        formula={
            "protein_percent": "nitrogen_percent*factor",
            "protein_mass": "sample_mass*nitrogen_percent*factor/100",
            "nitrogen_mass": "sample_mass*nitrogen_percent/100",
            "nitrogen_percent": "protein_percent/factor",
            "factor": "protein_percent/nitrogen_percent",
            "sample_mass": "protein_mass*100/(nitrogen_percent*factor)",
        },
        prose={
            "why": ("<p>Protein is expensive, so its declared content is regulated. The Kjeldahl method "
                    "measures nitrogen and multiplies — which is why the figure is called crude: it counts "
                    "the nitrogen in nucleic acids, urea and anything else as if it were protein.</p>"),
            "formula_note": ("<p>The factor is the reciprocal of the nitrogen fraction: 16 per cent gives "
                             "6.25. Because different proteins have different nitrogen contents, the "
                             "factor is chosen for the material — 5.7 for wheat, 6.25 for meat and feed, "
                             "6.38 for dairy.</p>"),
            "example_note": ("<p>3.2 per cent nitrogen times 6.25 is 20 per cent crude protein, which in a "
                             "100 g sample is 20 g of protein and 3.2 g of nitrogen. A feed labelled 20 "
                             "per cent protein is making exactly that claim.</p>"),
            "reading": ("<p>Compare the protein figure with the feed's other components: percentages "
                        "should sum to a hundred with fat, fibre, ash and moisture. A figure that leaves "
                        "no room for the rest means the nitrogen was overstated.</p>"),
            "scenarios": [
                {"inputs": {"nitrogen_percent": 5.0, "factor": 5.7, "sample_mass": 100},
                 "note": "Wheat at 5.0 per cent nitrogen gives 28.5 per cent protein with the 5.7 factor. "
                         "Using 6.25 would overstate it by 3 points."},
                {"inputs": {"nitrogen_percent": 0.52, "factor": 6.38, "sample_mass": 250},
                 "note": "Milk at 0.52 per cent nitrogen and the dairy factor is 3.3 per cent — its "
                         "protein content, not its solids."},
            ],
            "pitfalls": [
                "<strong>The wrong factor.</strong> Using 6.25 for wheat overstates protein by about 10 "
                "per cent.",
                "<strong>Crude read as true protein.</strong> Non-protein nitrogen is counted, which "
                "matters in silage and in adulterated samples — melamine was added to milk precisely "
                "because it is nitrogen-rich.",
                "<strong>Nitrogen reported on a dry basis and used wet.</strong> Check which basis the "
                "laboratory used before comparing with a specification.",
            ],
            "units_note": ("<p>Percentages are by mass and the sample is in grams, so the masses come back "
                           "in grams. The factor is dimensionless and differs by product — it is a "
                           "field, not a constant.</p>"),
            "limits": [
                "<strong>It measures nitrogen, not protein.</strong> Any other nitrogen source inflates "
                "the result.",
                "<strong>It assumes a nitrogen content.</strong> A protein with an unusual amino acid "
                "composition needs its own factor.",
            ],
            "uses": [
                "<li>Converting a Kjeldahl result into a declared protein figure.</li>",
                "<li>Checking a feed label against a laboratory certificate.</li>",
                "<li>Sizing a ration from a feed's protein content.</li>",
            ],
        },
        faq=[
            ("Why is it called crude protein?",
             "Because it is nitrogen times a factor, not a measurement of protein. Non-protein nitrogen "
             "counts as protein under this calculation."),
            ("Which factor should I use?",
             "6.25 unless the regulation for that product says otherwise: 5.7 for wheat and cereals, 5.95 "
             "for rice, 6.38 for dairy."),
        ],
        related=[("/chemistry/percent-composition", "Percent composition"),
                 ("/chemistry/molar-mass", "Molar mass"),
                 ("/chemistry/enzyme-activity", "Enzyme activity")],
    ),

    S(
        slug="miller-indices",
        name="Miller Indices Calculator",
        title="Miller Indices Calculator: d-Spacing and 2θ",
        desc="For a cubic crystal, turn Miller indices and a lattice parameter into a d-spacing and a diffraction angle, in one step and in the units crystallography uses.",
        what=("<p>In a cubic crystal the spacing of a set of planes follows directly from the lattice "
              "parameter: <strong>d = a ÷ √(h² + k² + l²)</strong>. Bragg's law then gives the angle at "
              "which those planes diffract: <strong>2θ = 2·arcsin(λ ÷ 2d)</strong>.</p>"),
        fields=[
            F("lattice_parameter", "Lattice parameter a", "Å", 4.05,
              "Aluminium is 4.05 Å", bounds=(2, 12)),
            F("h", "Miller index h", "", 1, "The first index, a whole number", bounds=(0, 6)),
            F("k", "Miller index k", "", 1, "The second index", bounds=(0, 6)),
            F("l", "Miller index l", "", 1, "The third index", bounds=(0, 6)),
            F("wavelength", "X-ray wavelength", "Å", 1.5406,
              "Copper Kα is 1.5406 Å"),
        ],
        results=[
            R("d_spacing", "d-spacing", "Å"),
            R("two_theta", "Diffraction angle 2θ", "°"),
            R("index_sum", "√(h² + k² + l²)", ""),
        ],
        formula={
            "d_spacing": "lattice_parameter/sqrt(pow(h,2)+pow(k,2)+pow(l,2))",
            "two_theta": "2*asin(min(1,wavelength/(2*lattice_parameter/sqrt(pow(h,2)+pow(k,2)+pow(l,2)))))*180/pi",
            "index_sum": "sqrt(pow(h,2)+pow(k,2)+pow(l,2))",
            "lattice_parameter": "d_spacing*sqrt(pow(h,2)+pow(k,2)+pow(l,2))",
            "wavelength": "2*lattice_parameter/sqrt(pow(h,2)+pow(k,2)+pow(l,2))*sin(pi*two_theta/360)",
        },
        prose={
            "why": ("<p>Every X-ray diffraction pattern is read through these two equations. The angles a "
                    "powder diffractometer measures become d-spacings, the d-spacings become the indices, "
                    "and the indices become the lattice — which is how a crystal structure is solved.</p>"),
            "formula_note": ("<p>The square root of the sum of squares is the reciprocal of the "
                             "interplanar spacing in units of a. It grows as the indices grow, so higher "
                             "indices give smaller spacings and larger angles.</p>"),
            "example_note": ("<p>Aluminium with a = 4.05 Å and the (111) planes: √3 = 1.732, so d = 2.34 Å. "
                             "With copper Kα at 1.5406 Å the angle is 2 × 19.2 = 38.5° — the first and "
                             "strongest peak in an aluminium pattern.</p>"),
            "reading": ("<p>In a cubic system the allowed reflections follow selection rules: face-centred "
                        "cubic shows only indices that are all odd or all even. That is why the first "
                        "aluminium peak is (111) and not (100).</p>"),
            "scenarios": [
                {"inputs": {"lattice_parameter": 4.05, "h": 2, "k": 0, "l": 0, "wavelength": 1.5406},
                 "note": "The (200) reflection sits at 44.7° — the second peak, and exactly where √4 = 2 "
                         "puts it."},
                {"inputs": {"lattice_parameter": 3.615, "h": 1, "k": 1, "l": 1, "wavelength": 1.5406},
                 "note": "Copper's (111): d = 2.087 Å and 2θ = 43.3°, the strongest line in its pattern."},
            ],
            "pitfalls": [
                "<strong>Indices with a common factor not reduced.</strong> (222) is the second order of "
                "(111) and appears at a different angle — they are not the same reflection.",
                "<strong>Wavelength in the wrong unit.</strong> Bragg's law needs λ and d in the same "
                "unit; mixing nanometres with angstroms moves the angle.",
                "<strong>The non-cubic formula used.</strong> For tetragonal or hexagonal cells the "
                "square root has extra terms, and this page would be wrong.",
            ],
            "units_note": ("<p>The lattice parameter and the wavelength are both in angstroms, so the "
                           "d-spacing comes back in angstroms and the angle in degrees. The index sum is "
                           "dimensionless.</p>"),
            "limits": [
                "<strong>Cubic crystals only.</strong> Face-centred, body-centred and primitive cells all "
                "work; anything with unequal axes does not.",
                "<strong>It needs the indices.</strong> Indexing an unknown pattern is a separate, harder "
                "step.",
            ],
            "uses": [
                "<li>Predicting where a phase's peaks will fall.</li>",
                "<li>Getting a d-spacing for a phase identification search.</li>",
                "<li>Checking an indexed pattern for internal consistency.</li>",
            ],
        },
        faq=[
            ("What do the Miller indices mean physically?",
             "They describe a set of parallel planes by the reciprocals of where the planes cut the three "
             "axes. (111) cuts all three axes at one lattice unit."),
            ("Why is there no (100) peak from aluminium?",
             "Because face-centred cubic lattices cancel it: the face-centring causes the (100) reflection "
             "to interfere destructively."),
        ],
        related=[("/chemistry/cubic-cell", "Cubic cell"),
                 ("/chemistry/atomic-mass", "Atomic mass"),
                 ("/chemistry/beer-lambert-law", "Beer-Lambert law")],
    ),
]
