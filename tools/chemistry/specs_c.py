"""Batch 2a — acids and bases: pH, pKa, buffers, titration."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="ph",
        name="pH Calculator",
        title="pH Calculator: From Hydrogen Ion Concentration",
        desc="Turn a hydrogen ion concentration into pH, pOH and the hydroxide concentration with one logarithmic step, then read the answer against familiar solutions.",
        what=("<p>pH is the negative base-10 logarithm of the hydrogen ion concentration: "
              "<strong>pH = −log₁₀[H⁺]</strong>. This page converts a concentration in mol/L into pH, and "
              "from there into pOH and the hydroxide concentration, using the water ion product "
              "Kw = 1 × 10⁻¹⁴ at 25 °C.</p>"),
        fields=[
            F("h_conc", "Hydrogen ion concentration [H⁺]", "mol/L", 1e-7,
              "Molar concentration of H⁺; pure water is 1 × 10⁻⁷"),
        ],
        results=[
            R("ph", "pH", ""),
            R("poh", "pOH", ""),
            R("oh_conc", "Hydroxide ion concentration [OH⁻]", "mol/L"),
        ],
        formula={
            "ph": "-log10(h_conc)",
            "poh": "14+log10(h_conc)",
            "oh_conc": "1e-14/h_conc",
            "h_conc": "pow(10,-ph)",
        },
        prose={
            "why": ("<p>The logarithm is the whole point: hydrogen ion concentrations in ordinary solutions "
                    "span fourteen orders of magnitude, from 1 mol/L in strong acid to 10⁻¹⁴ mol/L in strong "
                    "base. pH squeezes that range into a scale of numbers people can hold in their heads, "
                    "and every buffer, enzyme and corrosion question is asked on it.</p>"),
            "formula_note": ("<p>pH is defined on activity, not concentration, and the two part company above "
                             "about 0.1 mol/L. For the dilute solutions this page is normally used on, the "
                             "difference is smaller than the precision of your measurement.</p>"),
            "example_note": ("<p>Pure water at 25 °C has [H⁺] = 1 × 10⁻⁷ mol/L, so pH = 7 exactly, pOH = 7, "
                             "and [OH⁻] = 1 × 10⁻⁷ mol/L. Those three results are the neutral point the whole "
                             "scale is built around.</p>"),
            "reading": ("<p>Read the pH against the chemistry you are doing: stomach acid sits near 1.5, "
                        "lemon juice near 2, black coffee near 5, blood at 7.35–7.45, seawater at 8.1, and "
                        "household ammonia at 11. A change of one pH unit is a tenfold change in hydrogen ion "
                        "concentration, so a shift from 7.4 to 7.1 is a doubling of acidity, not a "
                        "rounding error.</p>"),
            "sensitivity_note": ("<p>Because pH is logarithmic, a ten per cent change in concentration moves "
                                 "it by only 0.04 — and that is the point. Large-sounding pH differences are "
                                 "enormous concentration differences, and small concentration errors are "
                                 "almost invisible on the scale.</p>"),
            "scenarios": [
                {"inputs": {"h_conc": 1e-3},
                 "note": "A millimolar strong acid gives pH 3, pOH 11."},
                {"inputs": {"h_conc": 1e-11},
                 "note": "A base: pH 11, pOH 3, and a hydroxide concentration of 1 mmol/L."},
            ],
            "pitfalls": [
                "<strong>pH used as a concentration.</strong> Averaging, diluting or mixing pH values is "
                "arithmetically meaningless; convert to concentrations, mix those, then convert back.",
                "<strong>Temperature ignored.</strong> Kw rises with temperature, so neutral pH is 7.00 at "
                "25 °C but about 6.8 at 50 °C — a neutral solution can read below 7.",
                "<strong>Activity read as concentration.</strong> In seawater or a 1 M salt solution, pH "
                "measured with an electrode and pH calculated from the amount added differ by a real margin.",
            ],
            "units_note": ("<p>pH itself carries no unit. The concentration must be in mol per litre — a "
                           "figure in mmol/L has to be divided by a thousand first, or the answer is exactly "
                           "three units too low.</p>"),
            "limits": [
                "<strong>It assumes a single dominant acid.</strong> In a mixture, [H⁺] is the total from "
                "every source, and this page converts whatever concentration you give it.",
                "<strong>It says nothing about buffering.</strong> Two solutions at pH 7.4 behave completely "
                "differently when acid is added; the buffer capacity page is the next step.",
            ],
            "uses": [
                "<li>Checking a measured hydrogen ion concentration against a pH meter.</li>",
                "<li>Converting a stated pH into the concentration an equilibrium calculation needs.</li>",
                "<li>Seeing how large a pH change a given dilution really is.</li>",
            ],
        },
        faq=[
            ("Why is pH 7 neutral?",
             "Because at 25 °C water dissociates into 10⁻⁷ mol/L each of H⁺ and OH⁻, and pH is the negative "
             "logarithm of the first. Neutrality means the two are equal, not that the number is 7 forever."),
            ("Does pH depend on temperature?",
             "Yes. The ion product of water increases with temperature, so neutral pH falls to about 6.8 at "
             "50 °C and rises to about 7.5 at 0 °C. Comparisons should be made at the same temperature."),
        ],
        related=[("/chemistry/hydrogen-ion-concentration", "Hydrogen ion concentration"),
                 ("/chemistry/pka", "pKa"),
                 ("/chemistry/buffer-ph", "Buffer pH")],
    ),

    S(
        slug="hydrogen-ion-concentration",
        name="Hydrogen Ion Concentration Calculator",
        title="Hydrogen Ion Concentration: From pH to mol/L",
        desc="Convert a pH reading back into a hydrogen ion concentration in mol/L and nmol/L, the step every equilibrium or kinetics calculation needs first of all.",
        what=("<p>pH is a logarithm, so it has to be undone to be used: "
              "<strong>[H⁺] = 10<sup>−pH</sup></strong> mol/L. This page converts a pH reading into the "
              "concentration that equilibrium expressions, rate laws and buffer calculations actually "
              "take, and reports the hydroxide concentration alongside it.</p>"),
        fields=[
            F("ph", "pH", "", 7.4, "A pH reading, as the meter shows it"),
        ],
        results=[
            R("h_conc", "Hydrogen ion concentration [H⁺]", "mol/L"),
            R("h_conc_nm", "Hydrogen ion concentration", "nmol/L"),
            R("oh_conc", "Hydroxide ion concentration [OH⁻]", "mol/L"),
        ],
        formula={
            "h_conc": "pow(10,-ph)",
            "h_conc_nm": "pow(10,-ph)*1000000000",
            "oh_conc": "1e-14/pow(10,-ph)",
            "ph": "-log10(h_conc)",
        },
        prose={
            "why": ("<p>A pH meter reports a number; an equilibrium expression wants a concentration. The "
                    "conversion is a single power of ten, but getting it the wrong way round — multiplying "
                    "where you should divide — is the commonest slip in buffer arithmetic.</p>"),
            "formula_note": ("<p>The nanomolar result is the same quantity scaled up a billion times. Blood "
                             "plasma at pH 7.4 holds 40 nmol/L of hydrogen ions, which is easier to compare "
                             "with clinical reference ranges than 4 × 10⁻⁸ mol/L.</p>"),
            "example_note": ("<p>pH 7.4 gives 10⁻⁷·⁴ = 3.98 × 10⁻⁸ mol/L, or 39.8 nmol/L. The hydroxide "
                             "concentration is 1 × 10⁻¹⁴ ÷ 3.98 × 10⁻⁸ = 2.51 × 10⁻⁷ mol/L — the pH 6.6 "
                             "figure, exactly as the pOH of 6.6 implies.</p>"),
            "reading": ("<p>Sanity-check with the neutral point: a pH below 7 gives a hydrogen ion "
                        "concentration above 10⁻⁷ mol/L, and a pH above 7 gives one below it. The further "
                        "from 7, the further the exponent moves, in steps of one per pH unit.</p>"),
            "scenarios": [
                {"inputs": {"ph": 2},
                 "note": "pH 2 is 0.01 mol/L — a 10 mM strong acid, roughly stomach acid."},
                {"inputs": {"ph": 10},
                 "note": "pH 10 is 1 × 10⁻¹⁰ mol/L of H⁺, and 1 mmol/L of OH⁻."},
            ],
            "pitfalls": [
                "<strong>The sign dropped.</strong> 10^pH instead of 10^−pH turns an acidic solution into "
                "an absurd one, and the answer still parses.",
                "<strong>pH of a buffer read as free acid.</strong> A buffer at pH 4.7 does not hold 2 × "
                "10⁻⁵ mol/L of acid in total; most of it is undissociated.",
                "<strong>Units of the result.</strong> The output is mol/L, not mmol/L; a solution at pH 3 "
                "is 1 mmol/L, not 1 mol/L.",
            ],
            "units_note": ("<p>Both concentrations are molar. The nanomolar column exists because "
                           "physiological concentrations sit in the tens of nanomoles per litre, where a "
                           "power of ten is easier to read than a negative exponent.</p>"),
            "limits": [
                "<strong>It uses the 25 °C ion product.</strong> At other temperatures Kw changes and the "
                "hydroxide result moves with it, even though the hydrogen figure does not.",
                "<strong>Concentration is not activity.</strong> In concentrated or high-ionic-strength "
                "solutions, the thermodynamically active concentration is lower than the figure here.",
            ],
            "uses": [
                "<li>Feeding an equilibrium expression with a measured pH.</li>",
                "<li>Comparing a physiological pH with a reference range in nmol/L.</li>",
                "<li>Working out how much acid a buffer must contain to sit at a given pH.</li>",
            ],
        },
        faq=[
            ("Is the result the total acid concentration?",
             "No — it is the free hydrogen ion concentration. A weak acid at pH 3 may be 0.1 mol/L in total "
             "and still only hold 10⁻³ mol/L of free H⁺."),
        ],
        related=[("/chemistry/ph", "pH"),
                 ("/chemistry/pka", "pKa"),
                 ("/chemistry/buffer-ph", "Buffer pH")],
    ),

    S(
        slug="pka",
        name="pKa Calculator",
        title="pKa Calculator: From Ka, With Kb of the Base",
        desc="Convert an acid dissociation constant into pKa and into the Kb of its conjugate base, the two numbers that decide where an acid can be used as a buffer.",
        what=("<p>pKa is the negative base-10 logarithm of the acid dissociation constant, "
              "<strong>pKa = −log₁₀Ka</strong>, and it is the pH at which an acid is half dissociated. This "
              "page converts Ka into pKa and reports Kb for the conjugate base, using "
              "Ka × Kb = Kw = 1 × 10⁻¹⁴.</p>"),
        fields=[
            F("ka", "Acid dissociation constant (Ka)", "mol/L", 1.8e-5,
              "Acetic acid is 1.8 × 10⁻⁵; formic acid 1.8 × 10⁻⁴"),
        ],
        results=[
            R("pka", "pKa", ""),
            R("kb", "Kb of the conjugate base", ""),
            R("pkb", "pKb of the conjugate base", ""),
        ],
        formula={
            "pka": "-log10(ka)",
            "kb": "1e-14/ka",
            "pkb": "14+log10(ka)",
            "ka": "pow(10,-pka)",
        },
        prose={
            "why": ("<p>The pKa is the one number that tells you where an acid is useful. It sets the pH at "
                    "which the acid and its conjugate base are present in equal amounts, which is exactly the "
                    "centre of the buffer range — and it predicts charge state, solubility and reactivity "
                    "for every molecule with an ionisable group.</p>"),
            "formula_note": ("<p>Ka and Kb are reciprocal through the water ion product, so pKa + pKb = 14 at "
                             "25 °C. A weak acid with pKa 4.76 has a conjugate base with pKb 9.24 — which is "
                             "why acetate is such a poor base.</p>"),
            "example_note": ("<p>Acetic acid has Ka = 1.8 × 10⁻⁵, so pKa = 4.745 and its conjugate base, the "
                             "acetate ion, has Kb = 5.56 × 10⁻¹⁰ and pKb 9.255. The two pK values add to 14, "
                             "as they must.</p>"),
            "reading": ("<p>Read the pKa against the pH you intend to work at. A buffer is effective within "
                        "about one pH unit of its pKa; more than two units away, the acid or the base "
                        "dominates and the buffering collapses. Below pKa 0 the acid is strong enough to be "
                        "fully dissociated in water; above about 14 it is not an acid in water at all.</p>"),
            "scenarios": [
                {"inputs": {"ka": 1.8e-5},
                 "note": "Acetic acid: pKa 4.745, the standard acetate buffer."},
                {"inputs": {"ka": 1.0},
                 "note": "Ka = 1 is pKa 0 — the boundary of strong-acid behaviour."},
            ],
            "pitfalls": [
                "<strong>Ka and pKa swapped.</strong> A larger Ka means a stronger acid and a smaller pKa; "
                "quoting a big pKa for a strong acid is the classic sign that the two were confused.",
                "<strong>pKa quoted without the temperature.</strong> Ionisation is strongly temperature "
                "dependent; the literature value for Tris moves by about 0.03 per degree.",
                "<strong>pKa used for a polyprotic acid.</strong> Phosphoric acid has three, at 2.15, 7.20 "
                "and 12.35; a single number describes only one of them.",
            ],
            "units_note": ("<p>Ka is a concentration (mol/L for a weak acid), but pKa is a logarithm and "
                           "therefore unitless. That is one reason the pKa is quoted in tables.</p>"),
            "limits": [
                "<strong>It assumes the 25 °C ion product.</strong> At other temperatures pKa and pKb no "
                "longer sum to exactly 14.",
                "<strong>It describes one ionisation.</strong> A molecule with several acidic groups has a "
                "microscopic pKa for each; the macroscopic value is a weighted average.",
            ],
            "uses": [
                "<li>Choosing a buffer system for a target pH.</li>",
                "<li>Predicting the charge of a molecule at a given pH.</li>",
                "<li>Comparing acid strengths without writing scientific notation.</li>",
            ],
        },
        faq=[
            ("What does a pKa of 4.76 mean in practice?",
             "At pH 4.76, half of the acid is dissociated and half is not. One unit below, roughly 90 % is "
             "undissociated; one unit above, roughly 90 % is dissociated."),
            ("Why is pKa more useful than Ka?",
             "Because it sits on the same scale as pH. Choosing a buffer means matching a pKa to a target pH, "
             "and that comparison is impossible on a scale of 10⁻⁵."),
        ],
        related=[("/chemistry/ph", "pH"),
                 ("/chemistry/henderson-hasselbalch", "Henderson–Hasselbalch"),
                 ("/chemistry/isoelectric-point", "Isoelectric point")],
    ),

    S(
        slug="buffer-ph",
        name="Buffer pH Calculator",
        title="Buffer pH Calculator: Henderson–Hasselbalch",
        desc="Work out the pH of a buffer from its pKa and the ratio of conjugate base to acid, and see the ratio that the recipe implies at the pH you are aiming for.",
        what=("<p>The pH of a buffer follows the Henderson–Hasselbalch relationship: "
              "<strong>pH = pKa + log₁₀([A⁻] ÷ [HA])</strong>. Enter the pKa and the concentrations of the "
              "conjugate base and the weak acid, and the page returns the pH and the ratio it came from.</p>"),
        fields=[
            F("pka", "pKa of the weak acid", "", 4.76, "Acetic acid is 4.76 at 25 °C"),
            F("base_conc", "Conjugate base concentration [A⁻]", "mol/L", 0.1,
              "For an acetate buffer, this is the salt"),
            F("acid_conc", "Weak acid concentration [HA]", "mol/L", 0.1,
              "The undissociated acid"),
        ],
        results=[
            R("ph", "pH of the buffer", ""),
            R("ratio", "Base to acid ratio [A⁻] ÷ [HA]", ""),
            R("h_conc", "Hydrogen ion concentration", "mol/L"),
        ],
        formula={
            "ph": "pka+log10(base_conc/acid_conc)",
            "ratio": "base_conc/acid_conc",
            "h_conc": "pow(10,-(pka+log10(base_conc/acid_conc)))",
            "pka": "ph-log10(base_conc/acid_conc)",
            "base_conc": "pow(10,ph-pka)*acid_conc",
            "acid_conc": "base_conc/pow(10,ph-pka)",
        },
        prose={
            "why": ("<p>A buffer holds pH steady because the weak acid absorbs added base and the conjugate "
                    "base absorbs added acid. The Henderson–Hasselbalch equation is the statement of where "
                    "that balance sits, and it is how every buffer recipe in every protocol was arrived at.</p>"),
            "formula_note": ("<p>The equation is exact only when the concentrations are the amounts put in, "
                             "which holds while the buffer is well away from the extremes of its range. That "
                             "is why a buffer is used within about one pH unit of its pKa, where neither "
                             "partner has been used up.</p>"),
            "example_note": ("<p>With pKa 4.76 and equal concentrations of acetate and acetic acid, the "
                             "logarithm is zero and the pH is exactly the pKa, 4.76. Doubling the salt to "
                             "0.2 mol/L while the acid stays at 0.1 gives pH 5.06 — a tenth of a unit for a "
                             "doubling, which is the signature of a logarithm.</p>"),
            "reading": ("<p>Check the ratio result first. A ratio between 0.1 and 10 is a usable buffer; "
                        "outside that the pH will move sharply the moment anything is added, and the recipe "
                        "should be reconsidered or a different pKa chosen.</p>"),
            "bands": [
                ("Ratio 10:1", "pH = pKa + 1 — the top of the useful range, about 91 % base."),
                ("Ratio 1:1", "pH = pKa — the centre, equal acid and base, maximum capacity."),
                ("Ratio 1:10", "pH = pKa − 1 — the bottom of the useful range, about 91 % acid."),
            ],
            "sensitivity_note": ("<p>A doubling of the salt moves the pH by 0.3, and a doubling of the acid "
                                 "moves it the other way by the same amount — because both enter as a ratio "
                                 "inside a logarithm.</p>"),
            "scenarios": [
                {"inputs": {"pka": 7.2, "base_conc": 0.05, "acid_conc": 0.1},
                 "note": "A phosphate buffer weighted to the acid side: pH 6.90."},
                {"inputs": {"pka": 9.25, "base_conc": 0.2, "acid_conc": 0.1},
                 "note": "An ammonium buffer at twice the base: pH 9.55."},
            ],
            "pitfalls": [
                "<strong>Moles entered where concentrations were wanted.</strong> The ratio is what matters, "
                "so equal volumes make the two interchangeable — mixed volumes do not.",
                "<strong>The acid and the salt swapped.</strong> Putting the salt underneath gives the "
                "reciprocal ratio and a pH the same distance on the wrong side of the pKa.",
                "<strong>Activity ignored.</strong> Above about 0.1 mol/L the calculated pH drifts from the "
                "measured one; calibrate the meter and trust it for the final figure.",
            ],
            "units_note": ("<p>The two concentrations cancel in the ratio, so any consistent unit works — "
                           "mol/L, mmol/L or even grams if both are in grams and the molar masses match. "
                           "Mixing units between the two boxes does not.</p>"),
            "limits": [
                "<strong>It assumes the buffer components do not interact.</strong> At high ionic strength "
                "the activity coefficients of the two partners differ and the pH shifts.",
                "<strong>It ignores dilution.</strong> A buffer diluted tenfold keeps its pH but loses "
                "capacity — the ratio is unchanged, the number of moles is not.",
            ],
            "uses": [
                "<li>Designing a buffer to sit at a stated pH.</li>",
                "<li>Checking an existing recipe before use.</li>",
                "<li>Working out how far a buffer can be pushed before it stops buffering.</li>",
            ],
        },
        faq=[
            ("Why does the pH equal the pKa when the concentrations are equal?",
             "Because the logarithm of 1 is zero. The Henderson–Hasselbalch equation then reduces to "
             "pH = pKa, which is the definition of the half-dissociation point."),
            ("Does diluting a buffer change its pH?",
             "Barely — the ratio of acid to base is unchanged, which is why buffers are diluted rather than "
             "reconstituted. The capacity does fall in proportion to the dilution."),
        ],
        related=[("/chemistry/henderson-hasselbalch", "Henderson–Hasselbalch"),
                 ("/chemistry/pka", "pKa"),
                 ("/chemistry/buffer-capacity", "Buffer capacity")],
    ),

    S(
        slug="henderson-hasselbalch",
        name="Henderson–Hasselbalch Calculator",
        title="Henderson–Hasselbalch Calculator: pKa from pH",
        desc="Use the Henderson–Hasselbalch equation backwards: from a measured buffer pH and the acid and base concentrations, recover the pKa and the Ka of that acid.",
        what=("<p>The Henderson–Hasselbalch equation relates pH, pKa and the ratio of conjugate base to "
              "acid: <strong>pKa = pH − log₁₀([A⁻] ÷ [HA])</strong>. Where the buffer pH page answers "
              "<em>what pH will this recipe give?</em>, this page answers <em>what is the pKa of the acid in "
              "my buffer?</em> from a pH measurement.</p>"),
        fields=[
            F("ph", "Measured pH of the buffer", "", 5.0, "From the meter, at the working temperature"),
            F("base_conc", "Conjugate base concentration [A⁻]", "mol/L", 0.05,
              "Moles of the salt per litre"),
            F("acid_conc", "Weak acid concentration [HA]", "mol/L", 0.1,
              "Moles of the undissociated acid per litre"),
        ],
        results=[
            R("pka", "pKa of the acid", ""),
            R("ka", "Acid dissociation constant (Ka)", "mol/L"),
            R("ratio", "Base to acid ratio", ""),
        ],
        formula={
            "pka": "ph-log10(base_conc/acid_conc)",
            "ka": "pow(10,-(ph-log10(base_conc/acid_conc)))",
            "ratio": "base_conc/acid_conc",
            "ph": "pka+log10(base_conc/acid_conc)",
        },
        prose={
            "why": ("<p>Measuring a pH is easy; measuring a pKa needs a titration. If the concentrations are "
                    "known — a buffer made up from a recipe — then one pH reading is enough to recover the "
                    "pKa, and the recovered value is a useful check that the acid is what the label said.</p>"),
            "formula_note": ("<p>The equation is the same one rearranged: the pH sits on the left where the "
                             "pKa used to be, and the logarithm subtrahend switches side. Nothing else "
                             "changes, which is why the two pages always agree with each other.</p>"),
            "example_note": ("<p>A buffer made from 0.1 mol/L acetic acid and 0.05 mol/L sodium acetate reads "
                             "pH 5.0. The ratio is 0.5, its logarithm is −0.301, so the pKa is 5.0 + 0.301 = "
                             "5.301 — higher than the tabulated 4.76, which tells you the acid in the bottle "
                             "is not pure acetic acid or the meter needs calibrating.</p>"),
            "reading": ("<p>Compare the recovered pKa with the tabulated value for the acid you think you "
                        "have. Agreement within 0.05 is confirmation; a consistent offset of 0.2 or more is a "
                        "calibration error, a concentration error, or a different acid.</p>"),
            "scenarios": [
                {"inputs": {"ph": 4.76, "base_conc": 0.1, "acid_conc": 0.1},
                 "note": "Equal concentrations put the pH exactly on the pKa — the definition of the "
                         "half-dissociation point."},
                {"inputs": {"ph": 7.4, "base_conc": 0.08, "acid_conc": 0.02},
                 "note": "A phosphate buffer at the top of its range: pKa 6.80."},
            ],
            "pitfalls": [
                "<strong>A pH meter reading activity, not concentration.</strong> At high ionic strength the "
                "recovered pKa drifts; the discrepancy is real, not an arithmetic error.",
                "<strong>Concentrations that are not the equilibrium ones.</strong> If a strong acid or base "
                "was added to set the pH, the acid and salt figures from the recipe are no longer valid.",
                "<strong>Temperature ignored.</strong> Both the meter and the acid's pKa move with "
                "temperature, and they do not move together.",
            ],
            "units_note": ("<p>The ratio is unitless and the result is a logarithm, so only the ratio of the "
                           "two concentrations enters the calculation. Both boxes must use the same unit.</p>"),
            "limits": [
                "<strong>It needs a buffer, not a solution.</strong> The equation assumes both partners are "
                "present; in a solution of the acid alone there is no ratio to speak of.",
                "<strong>It recovers a macroscopic pKa.</strong> For a polyprotic acid this is a weighted "
                "average of the microscopic constants, valid only near the pH measured.",
            ],
            "uses": [
                "<li>Checking a buffer recipe against a pH reading.</li>",
                "<li>Recovering an unknown acid's pKa from a prepared buffer.</li>",
                "<li>Confirming that a pH meter is behaving before an experiment.</li>",
            ],
        },
        faq=[
            ("How is this different from the buffer pH calculator?",
             "It is the same equation solved for a different variable. That page takes the pKa and gives the "
             "pH; this one takes the pH and gives the pKa."),
        ],
        related=[("/chemistry/buffer-ph", "Buffer pH"),
                 ("/chemistry/pka", "pKa"),
                 ("/chemistry/titration", "Titration")],
    ),

    S(
        slug="titration",
        name="Titration Calculator",
        title="Titration Calculator: Concentration from Titre",
        desc="Find the unknown concentration from a titration: enter the titrant strength, the volumes delivered and the stoichiometry, and read the analyte back out.",
        what=("<p>A titration measures the volume of a standard solution needed to react completely with an "
              "unknown. Equating the moles gives <strong>c<sub>2</sub> = c<sub>1</sub>V<sub>1</sub>n<sub>1</sub> "
              "÷ (V<sub>2</sub>n<sub>2</sub>)</strong>, where the n terms are the stoichiometric coefficients "
              "from the balanced equation.</p>"),
        fields=[
            F("c1", "Titrant concentration (c₁)", "mol/L", 0.1, "The standard solution, of known strength"),
            F("v1", "Titre volume (V₁)", "mL", 25, "The volume delivered, from the burette"),
            F("n1", "Titrant coefficient (n₁)", "", 1,
              "Its coefficient in the balanced equation: 2 for H₂SO₄ against NaOH"),
            F("v2", "Analyte volume (V₂)", "mL", 25, "The aliquot that was titrated"),
            F("n2", "Analyte coefficient (n₂)", "", 1,
              "Its coefficient in the same equation: 2 for NaOH against H₂SO₄"),
        ],
        results=[
            R("c2", "Analyte concentration (c₂)", "mol/L"),
            R("moles_analyte", "Amount of analyte in the aliquot", "mmol"),
            R("moles_titrant", "Amount of titrant delivered", "mmol"),
        ],
        formula={
            "c2": "c1*v1*n2/(v2*n1)",
            "moles_titrant": "c1*v1",
            "moles_analyte": "c1*v1*n2/n1",
            "c1": "c2*v2*n1/(v1*n2)",
            "v1": "c2*v2*n1/(c1*n2)",
            "v2": "c1*v1*n2/(c2*n1)",
        },
        prose={
            "why": ("<p>Everything in a titration reduces to one sentence: the moles of titrant delivered are "
                    "in a fixed ratio to the moles of analyte present. The burette measures the first, the "
                    "balanced equation supplies the ratio, and the analyte concentration falls out.</p>"),
            "formula_note": ("<p>The coefficients n₁ and n₂ are what make sulfuric acid and sodium hydroxide "
                             "behave differently from hydrochloric acid and sodium hydroxide. One mole of "
                             "H₂SO₄ neutralises two moles of NaOH, so with the acid as titrant n₁ = 1 and "
                             "n₂ = 2; with the acid as analyte the two swap.</p>"),
            "example_note": ("<p>25.00 mL of 0.1 mol/L sodium hydroxide reaches the endpoint at 25.00 mL "
                             "against a monoprotic acid of the same volume. The coefficients are both 1, the "
                             "volumes cancel, and the acid is 0.1 mol/L — as close to a demonstration of the "
                             "arithmetic as chemistry offers.</p>"),
            "reading": ("<p>Read the two mole results before the concentration. They should stand in the "
                        "ratio the equation demands; if they do not, a coefficient was entered on the wrong "
                        "row, and the concentration is wrong by exactly that factor.</p>"),
            "scenarios": [
                {"inputs": {"c1": 0.1, "v1": 20, "n1": 2, "v2": 25, "n2": 1},
                 "note": "A diprotic titrant: 20 mL of 0.1 M delivers 2 mmol of acid, and with two acid "
                         "molecules per analyte molecule that is 1 mmol of analyte in 25 mL — 0.04 mol/L."},
                {"inputs": {"c1": 0.05, "v1": 12.5, "n1": 1, "v2": 50, "n2": 1},
                 "note": "A dilute analyte: 0.625 mmol in 50 mL is 0.0125 mol/L."},
            ],
            "pitfalls": [
                "<strong>Coefficients swapped.</strong> Putting n₁ where n₂ belongs inverts the stoichiometry "
                "and gives an answer off by the square of the coefficient.",
                "<strong>Volumes left in litres.</strong> Both volumes are in millilitres here; converting "
                "one and not the other breaks the ratio.",
                "<strong>The endpoint read as the equivalence point.</strong> An indicator changes colour "
                "near, not at, the equivalence point; the difference is the indicator error.",
            ],
            "units_note": ("<p>Concentration in mol/L with volumes in mL gives millimoles directly — the unit "
                           "the mole results are reported in. That is why the numbers multiply so cleanly on "
                           "this page.</p>"),
            "limits": [
                "<strong>It assumes a single clean reaction.</strong> Side reactions, a second acidic proton "
                "or a slow endpoint all shift the result.",
                "<strong>It cannot correct for a blank.</strong> If the solvent consumes titrant, the blank "
                "volume has to be subtracted from the titre before it is entered.",
            ],
            "uses": [
                "<li>Finding the concentration of an unknown acid or base.</li>",
                "<li>Assaying a reagent against a primary standard.</li>",
                "<li>Checking the strength of a solution made up from a recipe.</li>",
            ],
        },
        faq=[
            ("What is the difference between the endpoint and the equivalence point?",
             "The equivalence point is where the stoichiometry is exactly satisfied; the endpoint is where "
             "the indicator changes colour. A well-chosen indicator keeps the two within a drop."),
            ("Do I use the volume of the aliquot or the total volume?",
             "The aliquot — the amount of analyte solution actually titrated, before any diluent was added. "
             "If the analyte was diluted, the dilution factor has to be applied afterwards."),
        ],
        related=[("/chemistry/normality", "Normality"),
                 ("/chemistry/neutralization", "Neutralization"),
                 ("/chemistry/concentration", "Concentration")],
    ),

    S(
        slug="neutralization",
        name="Neutralization Calculator",
        title="Neutralization Calculator: Acid, Base and Mass",
        desc="Work out the mass of base needed to neutralise a given volume of acid, or the mass of acid an alkali will take, from the equivalents and the molar mass.",
        what=("<p>Neutralising an acid means supplying the same number of equivalents of base. With "
              "equivalents matched, <strong>m<sub>base</sub> = c<sub>acid</sub>V<sub>acid</sub>n<sub>acid</sub> "
              "× M<sub>base</sub> ÷ n<sub>base</sub></strong> gives the mass that has to be weighed out.</p>"),
        fields=[
            F("acid_conc", "Acid concentration", "mol/L", 1, "Strength of the acid solution"),
            F("acid_volume", "Volume of acid", "L", 0.25, "How much is to be neutralised"),
            F("acid_equivalents", "Acid equivalents per mole (n)", "", 2,
              "1 for HCl, 2 for H₂SO₄, 3 for H₃PO₄"),
            F("base_equivalents", "Base equivalents per mole (n)", "", 1,
              "1 for NaOH and KOH, 2 for Ca(OH)₂"),
            F("base_molar_mass", "Molar mass of the base", "g/mol", 40.0,
              "40.00 for NaOH, 56.11 for KOH, 74.09 for Ca(OH)₂"),
        ],
        results=[
            R("base_mass", "Mass of base needed", "g"),
            R("equivalents", "Equivalents to neutralise", "eq"),
            R("base_moles", "Moles of base needed", "mol"),
        ],
        formula={
            "base_mass": "acid_conc*acid_volume*acid_equivalents*base_molar_mass/base_equivalents",
            "equivalents": "acid_conc*acid_volume*acid_equivalents",
            "base_moles": "acid_conc*acid_volume*acid_equivalents/base_equivalents",
            "acid_conc": "base_moles*base_equivalents/(acid_volume*acid_equivalents)",
            "acid_volume": "base_moles*base_equivalents/(acid_conc*acid_equivalents)",
        },
        prose={
            "why": ("<p>This is the calculation behind every spill kit and every waste-neutralisation record. "
                    "It answers a question asked in the middle of a job: given this much acid, how much "
                    "soda ash do I add, and how will I know to stop?</p>"),
            "formula_note": ("<p>Equivalents rather than moles is the whole idea. One equivalent of acid "
                             "neutralises one equivalent of base whatever the formulae, and the n factors are "
                             "what convert between the two bookkeeping systems.</p>"),
            "example_note": ("<p>250 mL of 1 mol/L sulfuric acid carries 0.5 equivalents. Sodium hydroxide "
                             "supplies one equivalent per mole and weighs 40.00 g/mol, so 20.0 g neutralises "
                             "the lot — 0.5 mol of base for 0.25 mol of a diprotic acid.</p>"),
            "reading": ("<p>Check the equivalents result against the acid: a 1 mol/L diprotic acid has twice "
                        "the equivalents of a monoprotic one at the same strength. If the mass looks small, "
                        "the acid equivalents are probably still on 1.</p>"),
            "scenarios": [
                {"inputs": {"acid_conc": 1, "acid_volume": 1, "acid_equivalents": 1,
                            "base_equivalents": 1, "base_molar_mass": 40},
                 "note": "One litre of 1 M HCl takes 40 g of NaOH — one mole of each."},
                {"inputs": {"acid_conc": 0.5, "acid_volume": 2, "acid_equivalents": 3,
                            "base_equivalents": 2, "base_molar_mass": 74.09},
                 "note": "2 L of 0.5 M phosphoric acid is 3 equivalents; calcium hydroxide supplies 2 per "
                         "mole, so 1.5 mol — 111.1 g — is needed."},
            ],
            "pitfalls": [
                "<strong>Equivalents left at 1 for a polyprotic acid.</strong> Sulfuric acid then needs half "
                "the base it really does, and the mixture stays acidic.",
                "<strong>Molar mass of the anhydrous base used for a hydrate.</strong> Calcium hydroxide and "
                "soda ash both carry water in some forms.",
                "<strong>Neutralisation read as a target pH of 7.</strong> Exact neutrality is a knife edge; "
                "in practice a slight excess of base is used and the endpoint confirmed with a meter.",
            ],
            "units_note": ("<p>The acid volume is in litres on this page, not millilitres. A 250 mL beaker "
                           "of acid is 0.25 L; entering 250 asks for a thousand times too much base.</p>"),
            "limits": [
                "<strong>It assumes complete reaction.</strong> A weak acid neutralised to its salt still "
                "leaves a solution that is not neutral in pH.",
                "<strong>It ignores heat.</strong> Neutralisation is exothermic, and a concentrated spill "
                "can boil; the arithmetic says nothing about rate.",
            ],
            "uses": [
                "<li>Working out how much reagent a spill or a waste stream needs.</li>",
                "<li>Planning a batch neutralisation with a weighed solid base.</li>",
                "<li>Converting between normalities without going through molarity twice.</li>",
            ],
        },
        faq=[
            ("Why use equivalents instead of moles?",
             "Because one equivalent of acid always neutralises one equivalent of base, whatever the "
             "formulae. Moles need the stoichiometric coefficients, and those are easy to get wrong."),
        ],
        related=[("/chemistry/titration", "Titration"),
                 ("/chemistry/normality", "Normality"),
                 ("/chemistry/ph", "pH")],
    ),

    S(
        slug="buffer-capacity",
        name="Buffer Capacity Calculator",
        title="Buffer Capacity Calculator: Moles per pH Unit",
        desc="Measure how much acid or base a buffer can absorb for each unit of pH change — the number that says whether a buffer is really doing its job well enough.",
        what=("<p>Buffer capacity is the amount of strong base (or acid) a litre of buffer can absorb per "
              "unit change in pH: <strong>β = n ÷ ΔpH</strong>, in mol per litre per pH unit. It is the "
              "number that answers <em>how much abuse will this buffer take?</em></p>"),
        fields=[
            F("moles_added", "Moles of strong acid or base added", "mol", 0.01,
              "The amount added to the buffer, per litre of it"),
            F("ph_change", "pH change observed (ΔpH)", "", 0.05,
              "Final pH minus starting pH, as a positive number"),
            F("volume", "Volume of buffer", "L", 1, "The volume the moles were added to"),
        ],
        results=[
            R("capacity", "Buffer capacity (β)", "mol/L"),
            R("capacity_per_ph", "Capacity per pH unit", "mol/L per pH"),
            R("moles_per_litre", "Moles added per litre of buffer", "mol/L"),
        ],
        formula={
            "capacity": "moles_added/volume/ph_change",
            "capacity_per_ph": "moles_added/volume/ph_change",
            "moles_per_litre": "moles_added/volume",
            "moles_added": "capacity*volume*ph_change",
            "ph_change": "moles_added/(capacity*volume)",
        },
        prose={
            "why": ("<p>Capacity is what separates a buffer that works from a buffer that merely has the "
                    "right pH. A 1 mmol/L buffer at pH 7.4 and a 100 mmol/L buffer at pH 7.4 read the same "
                    "on a meter and behave nothing alike when a reaction produces acid.</p>"),
            "formula_note": ("<p>Strictly, capacity is the differential dn/dpH and it peaks at the pKa. "
                             "Measuring it over a small interval, as this page does, is the practical "
                             "version: keep ΔpH below about 0.1 and the answer is close to the differential "
                             "value.</p>"),
            "example_note": ("<p>Adding 10 mmol of strong base to a litre of buffer raises the pH by 0.05, so "
                             "the capacity is 10 ÷ 0.05 = 200 mmol per litre per pH unit. That is a strong, "
                             "well-made buffer; below about 10 mmol/L per pH unit, the buffer is thin.</p>"),
            "reading": ("<p>Interpret the capacity against the demand. A tissue-culture medium buffered with "
                        "25 mmol/L bicarbonate has a capacity of roughly 25 mmol per pH unit near its pKa, "
                        "which is why it is kept in a 5 % CO₂ atmosphere. Capacity falls away as the buffer "
                        "is used up, so the same measurement late in a reaction gives a lower number.</p>"),
            "bands": [
                ("Above 100 mmol/L per pH", "Strong: suitable for a reaction that produces substantial acid."),
                ("20–100 mmol/L per pH", "Typical: the range most biochemical buffers are designed for."),
                ("Below 10 mmol/L per pH", "Thin: the pH will move noticeably under modest load."),
            ],
            "scenarios": [
                {"inputs": {"moles_added": 0.001, "ph_change": 0.02, "volume": 0.1},
                 "note": "A small volume of a strong buffer: 10 mmol/L added to 100 mL over 0.02 pH units "
                         "gives 0.5 mol per litre per pH unit."},
                {"inputs": {"moles_added": 0.05, "ph_change": 0.5, "volume": 1},
                 "note": "A weak buffer: 50 mmol moves the pH half a unit, so capacity is 0.1 mol per pH."},
            ],
            "pitfalls": [
                "<strong>Moles added to the aliquot, not per litre.</strong> Adding 1 mmol to 100 mL is "
                "10 mmol/L; entering the 1 makes the capacity ten times too small.",
                "<strong>ΔpH signed.</strong> Adding acid lowers the pH; use the magnitude, or the capacity "
                "comes out negative.",
                "<strong>A large ΔpH treated as a small one.</strong> Beyond about 0.2 units the relationship "
                "is no longer linear and the single division understates the true capacity.",
            ],
            "units_note": ("<p>Capacity is reported in mol/L per pH unit, sometimes written as equivalents per "
                           "litre per pH unit. pH itself is a logarithm and carries no unit, so the capacity "
                           "inherits the concentration's.</p>"),
            "limits": [
                "<strong>It is an empirical number.</strong> The result depends on the interval you measured "
                "over, the temperature and what else is dissolved in the buffer.",
                "<strong>It says nothing about the buffer's range.</strong> A high capacity two pH units from "
                "the pKa is a measurement of an exhausted buffer, not a good one.",
            ],
            "uses": [
                "<li>Deciding whether a buffer is strong enough for a reaction that produces acid.</li>",
                "<li>Comparing two buffer recipes at the same pH.</li>",
                "<li>Estimating how much base a fermentation or a cell culture can absorb.</li>",
            ],
        },
        faq=[
            ("What is a good buffer capacity?",
             "There is no universal number. It has to exceed the acid or base the system will produce, "
             "divided by the pH change you are willing to tolerate. 20–50 mmol per pH unit is a common "
             "working target."),
            ("Why does capacity peak at the pKa?",
             "Because that is where both the acid and its conjugate base are present in equal amounts, so "
             "either direction of disturbance finds something to react with."),
        ],
        related=[("/chemistry/buffer-ph", "Buffer pH"),
                 ("/chemistry/pka", "pKa"),
                 ("/chemistry/henderson-hasselbalch", "Henderson–Hasselbalch")],
    ),
]
