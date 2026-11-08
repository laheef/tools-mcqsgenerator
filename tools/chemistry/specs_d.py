"""Batch 2b — equilibrium and thermo: K, Kp, Q, Gibbs, Nernst, colligative."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="equilibrium-constant",
        name="Equilibrium Constant Calculator",
        title="Equilibrium Constant Calculator: K and ΔG°",
        desc="Work out the equilibrium constant from product and reactant concentrations, and the standard free energy change it implies at a stated temperature.",
        what=("<p>For a reaction at equilibrium the ratio of product concentrations to reactant "
              "concentrations, each raised to its coefficient, is a constant: "
              "<strong>K = [products]ⁿ ÷ [reactants]ᵐ</strong>. This page computes K from the concentrations "
              "and converts it into the standard free energy change, <strong>ΔG° = −RT ln K</strong>.</p>"),
        fields=[
            F("product_conc", "Product concentration at equilibrium", "mol/L", 0.8,
              "Total of the products on the right of the equation"),
            F("product_coeff", "Product coefficient", "", 1, "The exponent in the equilibrium expression",
              bounds=(1, 3)),
            F("reactant_conc", "Reactant concentration at equilibrium", "mol/L", 0.2,
              "Total of the reactants on the left"),
            F("reactant_coeff", "Reactant coefficient", "", 1, "The exponent in the equilibrium expression",
              bounds=(1, 3)),
            F("temperature", "Temperature (T)", "K", 298.15, "Kelvin: add 273.15 to a Celsius reading"),
        ],
        results=[
            R("k", "Equilibrium constant (K)", ""),
            R("gibbs_standard", "Standard free energy change (ΔG°)", "kJ/mol"),
            R("gibbs_standard_j", "Standard free energy change", "J/mol"),
        ],
        formula={
            "k": "pow(product_conc,product_coeff)/pow(reactant_conc,reactant_coeff)",
            "gibbs_standard": "-8.314*temperature*log(pow(product_conc,product_coeff)/pow(reactant_conc,reactant_coeff))/1000",
            "gibbs_standard_j": "-8.314*temperature*log(pow(product_conc,product_coeff)/pow(reactant_conc,reactant_coeff))",
            "product_conc": "pow(reactant_conc,reactant_coeff/product_coeff)*pow(exp(-gibbs_standard*1000/(8.314*temperature)),1/product_coeff)",
        },
        prose={
            "why": ("<p>K is the one number that says where a reaction sits when it has stopped changing. It "
                    "is independent of the starting amounts, which is why it can be tabulated and why it can "
                    "be compared across experiments that began with completely different mixtures.</p>"),
            "formula_note": ("<p>ΔG° = −RT ln K is the bridge between the thermodynamic tables and the "
                             "concentration ratio. A K above 1 gives a negative ΔG°, meaning the reaction is "
                             "product-favoured under standard conditions; a K below 1 gives a positive one.</p>"),
            "example_note": ("<p>With 0.8 mol/L of product and 0.2 mol/L of reactant, both to the first "
                             "power, K = 4. The standard free energy change at 298.15 K is "
                             "−8.314 × 298.15 × ln 4 = −3.44 kJ/mol, comfortably negative — a reaction that "
                             "sits to the right but not overwhelmingly so.</p>"),
            "reading": ("<p>Read K on a logarithmic scale, not a linear one. K = 10 and K = 0.1 are equally "
                        "far from equilibrium, in opposite directions; K = 1 × 10⁵ and K = 1 × 10⁻⁵ differ by "
                        "a factor of 10¹⁰. Dividing a tenfold change into the ΔG° result gives 5.7 kJ/mol at "
                        "room temperature.</p>"),
            "bands": [
                ("K above 10³", "Product-favoured: effectively complete for most practical purposes."),
                ("K between 0.1 and 10", "A genuinely balanced equilibrium; both sides present."),
                ("K below 10⁻³", "Reactant-favoured: very little product at equilibrium."),
            ],
            "sensitivity_note": ("<p>Temperature is the only box that moves both results in different "
                                 "directions: it leaves K alone but scales ΔG° directly, so a temperature "
                                 "entered in Celsius rather than kelvin reverses a sign without any warning.</p>"),
            "scenarios": [
                {"inputs": {"product_conc": 1, "product_coeff": 1, "reactant_conc": 1,
                            "reactant_coeff": 1, "temperature": 298.15},
                 "note": "Equal concentrations give K = 1 and ΔG° = 0 — the definition of standard state."},
                {"inputs": {"product_conc": 0.01, "product_coeff": 1, "reactant_conc": 1,
                            "reactant_coeff": 1, "temperature": 298.15},
                 "note": "K = 0.01 gives ΔG° = +11.4 kJ/mol: reactant-favoured, but only just."},
            ],
            "pitfalls": [
                "<strong>Pure solids and liquids left in the expression.</strong> They have an activity of 1 "
                "and do not appear; including their concentration is the classic error on this page.",
                "<strong>Coefficients ignored.</strong> The exponents are not decoration: doubling a "
                "coefficient squares that side of the ratio.",
                "<strong>Celsius used as kelvin.</strong> 25 instead of 298.15 makes the free energy change "
                "twelve times too small and can flip its sign.",
            ],
            "units_note": ("<p>K is unitless — it is a ratio of concentrations each raised to a power, with "
                           "the standard state implied. ΔG° is reported in both kJ/mol and J/mol because "
                           "tables use the first and the equation produces the second.</p>"),
            "limits": [
                "<strong>It assumes ideal behaviour.</strong> In concentrated solutions, activities replace "
                "concentrations and K computed this way is only approximate.",
                "<strong>It describes one temperature.</strong> K moves with temperature — by the van 't Hoff "
                "relationship — and so does ΔG°.",
            ],
            "uses": [
                "<li>Deciding whether a reaction will go, and how far.</li>",
                "<li>Converting a tabulated ΔG° into the concentration ratio it implies.</li>",
                "<li>Checking that a measured equilibrium composition is self-consistent.</li>",
            ],
        },
        faq=[
            ("Why is ΔG° called standard?",
             "Because it refers to every species at its standard state — 1 mol/L for solutes, 1 bar for "
             "gases. The actual ΔG at other concentrations uses the reaction quotient instead."),
            ("What does a K of exactly 1 mean?",
             "That the products and reactants are equally favoured under standard conditions, and ΔG° is "
             "zero. It does not mean the reaction is at its midpoint in your flask."),
        ],
        related=[("/chemistry/reaction-quotient", "Reaction quotient"),
                 ("/chemistry/gibbs-energy", "Gibbs energy"),
                 ("/chemistry/kp", "Kp")],
    ),

    S(
        slug="kp",
        name="Kp Calculator",
        title="Kp Calculator: From Kc, R and Temperature",
        desc="Convert an equilibrium constant expressed in concentrations into one expressed in partial pressures, with the (RT)^Δn factor that does it.",
        what=("<p>Equilibria in the gas phase can be written in concentrations or in partial pressures, and "
              "the two are related by <strong>Kp = Kc × (RT)<sup>Δn</sup></strong>, where Δn is the change in "
              "the number of moles of gas across the equation and R = 0.08206 L·atm/(mol·K).</p>"),
        fields=[
            F("kc", "Kc (from concentrations)", "", 4, "The equilibrium constant in mol/L terms"),
            F("temperature", "Temperature (T)", "K", 298.15, "Kelvin"),
            F("delta_n", "Change in moles of gas (Δn)", "", 0,
              "Moles of gaseous product minus gaseous reactant; 0 for a reaction with no change"),
        ],
        results=[
            R("kp", "Kp (from partial pressures)", ""),
            R("rt_factor", "RT factor (L·atm/mol)", ""),
            R("kp_over_kc", "Kp ÷ Kc", ""),
        ],
        formula={
            "kp": "kc*pow(0.08206*temperature,delta_n)",
            "rt_factor": "0.08206*temperature",
            "kp_over_kc": "pow(0.08206*temperature,delta_n)",
            "kc": "kp/pow(0.08206*temperature,delta_n)",
            "temperature": "pow(kp/kc,1/delta_n)/0.08206",
        },
        prose={
            "why": ("<p>Gas equilibria are measured in pressures and tabulated in concentrations, and the two "
                    "differ by a temperature-dependent factor. Getting the conversion right is what lets a "
                    "Kc from a textbook be compared with a Kp from a pressure gauge.</p>"),
            "formula_note": ("<p>The exponent Δn counts only gases. A reaction that consumes two moles of gas "
                    "and produces one has Δn = −1, and the factor becomes 1/(RT) — the direction of the "
                    "correction reverses.</p>"),
            "example_note": ("<p>At 298.15 K the RT factor is 0.08206 × 298.15 = 24.46 L·atm/mol. With "
                             "Δn = 0 the exponent vanishes and Kp equals Kc exactly, which is the check that "
                             "the page is wired correctly: a reaction with the same number of gas moles on "
                             "each side has the same constant in either unit.</p>"),
            "reading": ("<p>Look at Δn first. Positive Δn means more gas on the product side and a Kp larger "
                        "than Kc at room temperature — by a factor of 24 for each unit of Δn. Negative Δn "
                        "does the opposite, and a large negative Δn can move Kp by many orders of "
                        "magnitude.</p>"),
            "scenarios": [
                {"inputs": {"kc": 1, "temperature": 500, "delta_n": 1},
                 "note": "At 500 K the RT factor is 41.0, so Kp is 41 times Kc."},
                {"inputs": {"kc": 1, "temperature": 298.15, "delta_n": -1},
                 "note": "Δn of −1 divides by 24.46 instead of multiplying: Kp = 0.041."},
            ],
            "pitfalls": [
                "<strong>Δn counted from the whole equation.</strong> Only gaseous species count; a solid "
                "product does not enter it.",
                "<strong>R in the wrong units.</strong> 8.314 is the gas constant in J/mol·K. Using it here "
                "gives a factor 101 times too large, because the pressure must be in atmospheres.",
                "<strong>Temperature in Celsius.</strong> The factor is linear in kelvin, so 25 makes it "
                "twelve times too small.",
            ],
            "units_note": ("<p>Kp is unitless in the thermodynamic sense, but the RT factor carries units of "
                           "L·atm/mol: R is 0.08206 L·atm/(mol·K) precisely because pressures here are in "
                           "atmospheres.</p>"),
            "limits": [
                "<strong>It assumes ideal gases.</strong> At high pressure, fugacity replaces partial "
                "pressure and the conversion drifts.",
                "<strong>It is a single-temperature relationship.</strong> Both Kc and Kp move with "
                "temperature, each in its own way, so the conversion must be redone whenever T changes.",
            ],
            "uses": [
                "<li>Comparing a tabulated Kc with a Kp measured from gas pressures.</li>",
                "<li>Converting an equilibrium constant for use in a pressure-based calculation.</li>",
                "<li>Seeing how much of a difference the mole-count change really makes.</li>",
            ],
        },
        faq=[
            ("When is Kp equal to Kc?",
             "When Δn is zero — the same number of moles of gas on each side. Then (RT)⁰ = 1 and the two "
             "constants are identical."),
            ("Why is R 0.08206 here and 8.314 elsewhere?",
             "Because this page works in atmospheres and litres. 0.08206 L·atm/(mol·K) and 8.314 J/(mol·K) "
             "are the same constant in different units."),
        ],
        no_round_trip=["temperature"],
        related=[("/chemistry/equilibrium-constant", "Equilibrium constant"),
                 ("/chemistry/partial-pressure", "Partial pressure"),
                 ("/chemistry/reaction-quotient", "Reaction quotient")],
    ),

    S(
        slug="reaction-quotient",
        name="Reaction Quotient Calculator",
        title="Reaction Quotient Calculator: Q, K and ΔG",
        desc="Compute the reaction quotient from the concentrations you have now, compare it with K, and read the free energy that decides which way it goes.",
        what=("<p>The reaction quotient is the equilibrium expression evaluated with whatever concentrations "
              "are present right now: <strong>Q = [products]ⁿ ÷ [reactants]ᵐ</strong>. Comparing Q with K "
              "gives the direction, and <strong>ΔG = RT ln(Q ÷ K)</strong> gives the driving force.</p>"),
        fields=[
            F("product_conc", "Product concentration now", "mol/L", 0.1, "As the mixture stands"),
            F("reactant_conc", "Reactant concentration now", "mol/L", 0.5, "As the mixture stands"),
            F("k", "Equilibrium constant (K)", "", 4, "For the reaction, at this temperature"),
            F("temperature", "Temperature (T)", "K", 298.15, "Kelvin"),
        ],
        results=[
            R("q", "Reaction quotient (Q)", ""),
            R("delta_g", "Free energy change (ΔG)", "kJ/mol"),
            R("q_over_k", "Q ÷ K", ""),
        ],
        formula={
            "q": "product_conc/reactant_conc",
            "delta_g": "8.314*temperature*log((product_conc/reactant_conc)/k)/1000",
            "q_over_k": "product_conc/reactant_conc/k",
            "product_conc": "k*exp(delta_g*1000/(8.314*temperature))*reactant_conc",
            "reactant_conc": "product_conc/(k*exp(delta_g*1000/(8.314*temperature)))",
        },
        prose={
            "why": ("<p>K tells you where a reaction would settle; Q tells you where it is. The ratio of the "
                    "two is the sign of the free energy change, which is the only thing that decides whether "
                    "the forward or the reverse reaction is spontaneous at this instant.</p>"),
            "formula_note": ("<p>At equilibrium Q equals K, the logarithm vanishes and ΔG is zero — the "
                             "statement of equilibrium written as an equation. Away from it, the sign of ΔG "
                             "follows the sign of ln(Q ÷ K), which is the same as whether Q is above or "
                             "below K.</p>"),
            "example_note": ("<p>With 0.1 mol/L of product, 0.5 mol/L of reactant and K = 4, Q = 0.2 — well "
                             "below K. The logarithm of 0.05 is −3.00, so ΔG = 8.314 × 298.15 × (−3.00) = "
                             "−7.43 kJ/mol: the forward reaction is spontaneous and the mixture will make "
                             "more product.</p>"),
            "reading": ("<p>Read the sign, then the size. A ΔG of −7 kJ/mol is a mild push; −40 kJ/mol is a "
                        "reaction that will go. Exactly zero means the mixture is already at equilibrium, "
                        "and no net change will occur however long it is left.</p>"),
            "bands": [
                ("Q below K", "ΔG negative: the forward reaction is spontaneous."),
                ("Q equal to K", "ΔG zero: the mixture is at equilibrium."),
                ("Q above K", "ΔG positive: the reverse reaction is spontaneous."),
            ],
            "scenarios": [
                {"inputs": {"product_conc": 2, "reactant_conc": 0.5, "k": 4, "temperature": 298.15},
                 "note": "Q = 4 equals K, so ΔG is exactly 0 — an equilibrium mixture."},
                {"inputs": {"product_conc": 4, "reactant_conc": 0.5, "k": 4, "temperature": 298.15},
                 "note": "Q = 8 is twice K: ΔG = +1.72 kJ/mol, and the reaction runs backwards."},
            ],
            "pitfalls": [
                "<strong>Q computed with the wrong powers.</strong> The coefficients of the balanced "
                "equation are the exponents, exactly as in K.",
                "<strong>Solids and pure liquids included.</strong> Their activity is 1 and they are left "
                "out of both Q and K.",
                "<strong>K from a different temperature.</strong> K is temperature-dependent; pairing a "
                "room-temperature K with a hot Q gives a meaningless ΔG.",
            ],
            "units_note": ("<p>Q is unitless, and so is the ratio Q ÷ K. ΔG is reported in kJ/mol, the unit "
                           "thermodynamic tables use.</p>"),
            "limits": [
                "<strong>It says nothing about rate.</strong> A reaction can be strongly spontaneous and "
                "still immeasurably slow; that is what a catalyst changes.",
                "<strong>It uses concentrations, not activities.</strong> In non-ideal mixtures the real "
                "driving force differs from the one computed here.",
            ],
            "uses": [
                "<li>Predicting which way a mixture will shift.</li>",
                "<li>Checking whether a reaction has reached equilibrium.</li>",
                "<li>Working out how far from equilibrium a starting mixture is.</li>",
            ],
        },
        faq=[
            ("What is the difference between Q and K?",
             "They are the same expression. K is its value at equilibrium; Q is its value at any other "
             "moment. Comparing them is how you know which way the reaction will move."),
        ],
        related=[("/chemistry/equilibrium-constant", "Equilibrium constant"),
                 ("/chemistry/gibbs-energy", "Gibbs energy"),
                 ("/chemistry/kp", "Kp")],
    ),

    S(
        slug="gibbs-energy",
        name="Gibbs Energy Calculator",
        title="Gibbs Energy Calculator: ΔG = ΔH − TΔS",
        desc="Work out the free energy change of a reaction from its enthalpy, entropy and temperature, and the temperature at which it turns.",
        what=("<p>Whether a reaction is spontaneous at a given temperature is decided by the Gibbs energy: "
              "<strong>ΔG = ΔH − TΔS</strong>. Negative ΔG means the forward reaction is spontaneous; positive "
              "means it is not. This page computes ΔG and the temperature at which it changes sign.</p>"),
        fields=[
            F("enthalpy", "Enthalpy change (ΔH)", "kJ/mol", -92.2,
              "From a table or a calorimetry experiment; negative for an exothermic reaction"),
            F("entropy", "Entropy change (ΔS)", "J/mol/K", -198.7,
              "Note the units: joules, not kilojoules"),
            F("temperature", "Temperature (T)", "K", 298.15, "Kelvin"),
        ],
        results=[
            R("delta_g", "Gibbs energy change (ΔG)", "kJ/mol"),
            R("t_switch", "Temperature at which ΔG = 0", "K"),
            R("entropy_term", "Entropy contribution (TΔS)", "kJ/mol"),
        ],
        formula={
            "delta_g": "enthalpy-temperature*entropy/1000",
            "t_switch": "enthalpy*1000/entropy",
            "entropy_term": "temperature*entropy/1000",
            "enthalpy": "delta_g+temperature*entropy/1000",
            "entropy": "(enthalpy-delta_g)*1000/temperature",
            "temperature": "(enthalpy-delta_g)*1000/entropy",
        },
        prose={
            "why": ("<p>The Gibbs energy is the accountant of chemistry: it weighs the heat released against "
                    "the disorder created and returns a single number that decides direction. Everything "
                    "about why some reactions run cold and some only run hot comes out of that balance.</p>"),
            "formula_note": ("<p>The unit mismatch is deliberate and is the commonest source of error: "
                    "enthalpy is tabulated in kJ/mol and entropy in J/mol·K, so the entropy term is divided by "
                    "a thousand before it is subtracted.</p>"),
            "example_note": ("<p>The combustion of hydrogen has ΔH = −92.2 kJ/mol and ΔS = −198.7 J/mol·K at "
                             "298.15 K. The entropy term is −59.2 kJ/mol, so ΔG = −92.2 + 59.2 = −33.0 "
                             "kJ/mol — spontaneous, but only because the enthalpy term wins. The switch "
                             "temperature, where ΔG reaches zero, is 464 K.</p>"),
            "reading": ("<p>Read the two contributions side by side. If |TΔS| is much smaller than |ΔH|, the "
                        "reaction is enthalpy-driven and roughly temperature-insensitive; if they nearly "
                        "cancel, the reaction is finely balanced and a modest temperature change flips it. A "
                        "switch temperature below the working range means the reaction is spontaneous "
                        "throughout it.</p>"),
            "bands": [
                ("ΔH negative, ΔS positive", "Spontaneous at every temperature — rare and welcome."),
                ("ΔH negative, ΔS negative", "Spontaneous below the switch temperature, not above."),
                ("ΔH positive, ΔS positive", "Spontaneous above the switch temperature — the entropy-driven case."),
                ("ΔH positive, ΔS negative", "Never spontaneous as written."),
            ],
            "sensitivity_note": ("<p>Temperature acts only on the entropy term, so a change of 10 K moves ΔG "
                                 "by 10 × ΔS — small for a small entropy change and decisive for a large one.</p>"),
            "scenarios": [
                {"inputs": {"enthalpy": 0, "entropy": 100, "temperature": 300},
                 "note": "A purely entropic process: ΔG = −30 kJ/mol at 300 K."},
                {"inputs": {"enthalpy": 50, "entropy": 100, "temperature": 400},
                 "note": "Above the switch temperature of 500 K the reaction is still not spontaneous: "
                         "ΔG = +10 kJ/mol."},
            ],
            "pitfalls": [
                "<strong>Entropy entered in kJ.</strong> A factor of a thousand error that makes the entropy "
                "term invisible and the answer look believable.",
                "<strong>ΔG° used for a real mixture.</strong> The tabulated standard value applies at "
                "1 mol/L; the actual ΔG adds RT ln Q.",
                "<strong>Switch temperature treated as applicable always.</strong> ΔH and ΔS both drift with "
                "temperature, so the linear extrapolation is only good over a modest range.",
            ],
            "units_note": ("<p>ΔG and ΔH are in kJ/mol, ΔS in J/mol·K, and T in kelvin. Everything in the "
                           "formula is per mole of reaction as written, so a doubled equation doubles all "
                           "three quantities.</p>"),
            "limits": [
                "<strong>It is a thermodynamic answer, not a kinetic one.</strong> A reaction with ΔG of "
                "−100 kJ/mol may still be too slow to observe at room temperature.",
                "<strong>It assumes standard conditions.</strong> The concentrations in a real flask shift ΔG "
                "by RT ln Q, which can be many kilojoules.",
            ],
            "uses": [
                "<li>Deciding whether a proposed route will go at the temperature available.</li>",
                "<li>Explaining why a reaction needs heating to start.</li>",
                "<li>Choosing between two routes on thermodynamic grounds.</li>",
            ],
        },
        faq=[
            ("Why can a reaction with positive ΔS be spontaneous even when it absorbs heat?",
             "Because the entropy term −TΔS is negative when ΔS is positive, and above the switch temperature "
             "it outweighs the positive enthalpy change."),
            ("What does the switch temperature mean?",
             "It is the temperature at which ΔG = 0, so the reaction is at equilibrium under standard "
             "conditions. Below it one direction dominates, above it the other."),
        ],
        related=[("/chemistry/entropy", "Entropy"),
                 ("/chemistry/equilibrium-constant", "Equilibrium constant"),
                 ("/chemistry/reaction-quotient", "Reaction quotient")],
    ),

    S(
        slug="entropy",
        name="Entropy Change Calculator",
        title="Entropy Change Calculator: Heat Over Temperature",
        desc="Work out the entropy change of a process from the reversible heat it exchanges and the temperature at which it happens, in J/K and per mole.",
        what=("<p>For a reversible process the entropy change is the heat exchanged divided by the temperature "
              "at which it is exchanged: <strong>ΔS = q<sub>rev</sub> ÷ T</strong>. This page computes ΔS from "
              "a measured heat and temperature, and the molar entropy change from the moles involved.</p>"),
        fields=[
            F("heat", "Heat exchanged (q)", "J", 6010,
              "Positive for heat absorbed by the system, negative for heat released"),
            F("temperature", "Temperature (T)", "K", 373.15, "The temperature at which it is exchanged"),
            F("moles", "Amount of substance (n)", "mol", 1, "Moles the heat refers to"),
        ],
        results=[
            R("delta_s", "Entropy change (ΔS)", "J/K"),
            R("delta_s_molar", "Molar entropy change", "J/mol/K"),
            R("delta_s_kj", "Entropy change", "kJ/K"),
        ],
        formula={
            "delta_s": "heat/temperature",
            "delta_s_molar": "heat/temperature/moles",
            "delta_s_kj": "heat/temperature/1000",
            "heat": "delta_s*temperature",
            "temperature": "heat/delta_s",
        },
        prose={
            "why": ("<p>Entropy measures how the energy of a system is spread out, and the heat over "
                    "temperature definition is the one that can be measured. Everything else — the entropy of "
                    "vaporisation, the third-law values in tables, the TΔS term in the Gibbs energy — is "
                    "built on it.</p>"),
            "formula_note": ("<p>The division by temperature is what makes entropy a state function: the same "
                             "heat exchanged at a higher temperature changes the entropy less, because the "
                             "same energy is spread over more available states.</p>"),
            "example_note": ("<p>Vaporising one mole of water takes about 40.7 kJ, and at the normal boiling "
                             "point of 373.15 K that gives an entropy of vaporisation of 109 J/mol·K — the "
                             "tabulated value, recovered from two numbers and one division.</p>"),
            "reading": ("<p>Compare the molar result with what the process should cost. Melting ice takes "
                        "6.01 kJ/mol at 273.15 K, giving 22.0 J/mol·K — much smaller than vaporisation, "
                        "because a liquid is only slightly more disordered than a solid. Vaporisation is the "
                        "expensive step in every phase change.</p>"),
            "scenarios": [
                {"inputs": {"heat": 6010, "temperature": 273.15, "moles": 1},
                 "note": "The enthalpy of fusion of ice, divided by the melting point: 22.0 J/mol·K."},
                {"inputs": {"heat": -40700, "temperature": 373.15, "moles": 1},
                 "note": "Condensation, the reverse of vaporisation: −109 J/mol·K."},
            ],
            "pitfalls": [
                "<strong>Heat in kilojoules.</strong> The formula divides joules; a kJ figure gives an "
                "entropy a thousand times too small.",
                "<strong>Heat over the wrong temperature.</strong> The temperature must be the one at which "
                "the heat is exchanged, not room temperature.",
                "<strong>Irreversible processes treated as reversible.</strong> q/T gives ΔS only for a "
                "reversible path; for a real one, use tabulated entropies instead.",
            ],
            "units_note": ("<p>J/K for the whole system, J/mol·K for one mole of substance. The third result "
                           "in kJ/K exists because the Gibbs energy equation wants to subtract it from an "
                           "enthalpy in kJ.</p>"),
            "limits": [
                "<strong>It is reversible-path only.</strong> Measured heat in a real process is not q_rev, "
                "and the entropy computed from it is not the system's entropy change.",
                "<strong>It needs a defined system.</strong> Heat into the surroundings has the opposite "
                "sign, and the two must not be mixed.",
            ],
            "uses": [
                "<li>Finding an entropy of vaporisation or fusion from calorimetry.</li>",
                "<li>Supplying the ΔS a Gibbs energy calculation needs.</li>",
                "<li>Showing why vaporisation costs so much entropy.</li>",
            ],
        },
        faq=[
            ("Can entropy be negative?",
             "Yes — the entropy of the system falls when heat leaves it, as in condensation or freezing. The "
             "entropy of the universe still rises, which is what the second law requires."),
        ],
        related=[("/chemistry/gibbs-energy", "Gibbs energy"),
                 ("/chemistry/equilibrium-constant", "Equilibrium constant"),
                 ("/chemistry/heat-of-combustion", "Heat of combustion")],
    ),

    S(
        slug="nernst-equation",
        name="Nernst Equation Calculator",
        title="Nernst Equation Calculator: Cell Potential",
        desc="Adjust a standard electrode potential for the concentrations actually present, and see the millivolts per decade the cell is working with.",
        what=("<p>A cell's potential falls as its products accumulate and its reactants are consumed. The "
              "Nernst equation states that: <strong>E = E° − (2.303RT ÷ nF) log₁₀Q</strong>, which at 25 °C "
              "collapses to E° − (0.0592 ÷ n) log₁₀Q.</p>"),
        fields=[
            F("e0", "Standard cell potential (E°)", "V", 1.1, "From a table of standard potentials"),
            F("n", "Electrons transferred (n)", "", 2, "From the balanced half-reactions"),
            F("q", "Reaction quotient (Q)", "", 1, "[products] ÷ [reactants], each raised to its coefficient"),
            F("temperature", "Temperature (T)", "K", 298.15, "Kelvin"),
        ],
        results=[
            R("e", "Cell potential (E)", "V"),
            R("e_mv", "Cell potential", "mV"),
            R("slope_mv", "Potential per decade of Q", "mV"),
        ],
        formula={
            "e": "e0-8.314*temperature/(n*96485)*log(q)",
            "e_mv": "(e0-8.314*temperature/(n*96485)*log(q))*1000",
            "slope_mv": "2.302585*8.314*temperature/(n*96485)*1000",
            "e0": "e+8.314*temperature/(n*96485)*log(q)",
            "q": "exp((e0-e)*n*96485/(8.314*temperature))",
            "temperature": "(e0-e)*n*96485/(8.314*log(q))",
        },
        prose={
            "why": ("<p>Standard potentials describe a situation that never quite exists — everything at unit "
                    "activity. The Nernst equation is how a real cell's voltage is predicted from what is "
                    "actually in it, and it is the basis of every pH electrode, ion-selective sensor and "
                    "battery voltage curve.</p>"),
            "formula_note": ("<p>The 2.303 converts natural to base-10 logarithms; the page uses the natural "
                             "logarithm with the full RT/nF factor, so it stays correct at any temperature. "
                             "At 25 °C the coefficient works out to 59.2 mV per decade for a one-electron "
                             "process.</p>"),
            "example_note": ("<p>Taking a standard potential of 1.1 V, two electrons and Q = 1 leaves the "
                             "logarithm at zero and the potential at 1.1 V — the standard state. The slope "
                             "result, 29.6 mV per decade, is half the familiar 59 mV because two electrons "
                             "are transferred per reaction event.</p>"),
            "reading": ("<p>Read the slope against the number of electrons: 59 mV per decade for one, 30 for "
                        "two, 20 for three. A measured slope well away from that in a real sensor is the "
                        "diagnostic for a failing electrode — the classic check on a pH meter is that it "
                        "delivers close to 59 mV per pH unit.</p>"),
            "bands": [
                ("Q = 1", "The standard potential, by definition."),
                ("Q = 10", "The potential falls by one slope unit (59 mV for n = 1)."),
                ("Q = 100", "Two decades: 118 mV down for a one-electron process."),
            ],
            "scenarios": [
                {"inputs": {"e0": 1.1, "n": 2, "q": 10, "temperature": 298.15},
                 "note": "One decade of Q: E drops from 1.1 V to 1.070 V."},
                {"inputs": {"e0": 0, "n": 1, "q": 1e-7, "temperature": 298.15},
                 "note": "The hydrogen electrode at pH 7 reads −0.414 V — the pH term in every electrode "
                         "potential."},
            ],
            "pitfalls": [
                "<strong>Q inverted.</strong> Products over reactants is the convention; the reciprocal "
                "flips the sign of the correction and moves the potential the wrong way.",
                "<strong>n left at 1.</strong> Each electron changes the slope by a factor, so a two-electron "
                "reaction with n = 1 has twice the correction it should.",
                "<strong>E° and E confused.</strong> E° is a constant; E depends on the mixture. Quoting E° "
                "for a working cell overstates it whenever products have built up.",
            ],
            "units_note": ("<p>Potentials are reported in volts and millivolts because electrode work is done "
                           "in millivolts: 59 mV per decade is the number every electrochemist knows.</p>"),
            "limits": [
                "<strong>It assumes Nernstian behaviour.</strong> Real electrodes have junction potentials, "
                "drift and a finite response time.",
                "<strong>It ignores activity coefficients.</strong> At high ionic strength, Q computed from "
                "concentrations is not the thermodynamically correct ratio.",
            ],
            "uses": [
                "<li>Predicting a cell's voltage from its concentrations.</li>",
                "<li>Working out the potential of an electrode at a given pH.</li>",
                "<li>Checking that a pH or ion-selective electrode is responding properly.</li>",
            ],
        },
        faq=[
            ("Why 59 mV per decade?",
             "Because (RT/F) ln 10 at 25 °C is 0.0592 V. It is the voltage equivalent of a tenfold "
             "concentration change for a one-electron process."),
            ("What is Q here?",
             "The reaction quotient — products over reactants, each raised to its coefficient, with solids "
             "and pure liquids omitted."),
        ],
        no_round_trip=["temperature"],
        related=[("/chemistry/electromotive-force", "Cell EMF"),
                 ("/chemistry/reaction-quotient", "Reaction quotient"),
                 ("/chemistry/ph", "pH")],
    ),

    S(
        slug="electromotive-force",
        name="Cell EMF Calculator",
        title="Cell EMF Calculator: E°cell and ΔG°",
        desc="Combine two standard electrode potentials into a cell EMF, and convert that voltage into the free energy the cell can deliver.",
        what=("<p>A cell's standard electromotive force is the cathode potential minus the anode potential: "
              "<strong>E°<sub>cell</sub> = E°<sub>cathode</sub> − E°<sub>anode</sub></strong>. A positive "
              "result means the cell works as written, and the free energy it corresponds to is "
              "<strong>ΔG° = −nFE°</strong>.</p>"),
        fields=[
            F("cathode", "Cathode potential (E°cathode)", "V", 0.34,
              "The reduction that takes place at the positive electrode"),
            F("anode", "Anode potential (E°anode)", "V", -0.76,
              "The reduction half-reaction that is reversed, so it is usually negative"),
            F("n", "Electrons transferred (n)", "", 2, "From the balanced cell reaction"),
        ],
        results=[
            R("emf", "Cell EMF (E°cell)", "V"),
            R("emf_mv", "Cell EMF", "mV"),
            R("delta_g", "Standard free energy change (ΔG°)", "kJ/mol"),
        ],
        formula={
            "emf": "cathode-anode",
            "emf_mv": "(cathode-anode)*1000",
            "delta_g": "-n*96485*(cathode-anode)/1000",
            "cathode": "anode+emf",
            "anode": "cathode-emf",
            "n": "-delta_g*1000/(96485*(cathode-anode))",
        },
        prose={
            "why": ("<p>Standard potentials are tabulated one half-reaction at a time, and every cell is a "
                    "combination of two of them. The subtraction is where the sign conventions are won or "
                    "lost: both values are reduction potentials, and the anode is the one that is reversed.</p>"),
            "formula_note": ("<p>F is the Faraday constant, 96 485 C/mol, and n is the number of electrons in "
                             "the balanced cell reaction. Their product converts volts into joules per mole: "
                             "one volt times one faraday is 96.5 kJ/mol.</p>"),
            "example_note": ("<p>A copper cathode at +0.34 V against a zinc anode at −0.76 V gives "
                             "E°cell = 0.34 − (−0.76) = 1.10 V, the Daniell cell. With two electrons, "
                             "ΔG° = −2 × 96 485 × 1.10 = −212 kJ/mol — a genuinely driving reaction.</p>"),
            "reading": ("<p>A positive EMF means the cell as written is spontaneous and the free energy is "
                        "negative; the two always agree because one is the other multiplied by −nF. A negative "
                        "EMF means the reaction runs the other way, and swapping the electrodes gives the same "
                        "cell with the sign flipped.</p>"),
            "scenarios": [
                {"inputs": {"cathode": 0.8, "anode": 0.34, "n": 1},
                 "note": "Silver over copper: E° = 0.46 V, ΔG° = −44.4 kJ/mol."},
                {"inputs": {"cathode": 0.0, "anode": 0.0, "n": 1},
                 "note": "Two identical electrodes give no EMF, as they must — a cell needs a difference."},
            ],
            "pitfalls": [
                "<strong>The anode potential added rather than subtracted.</strong> The single most common "
                "error: E°cell is a difference, not a sum, even though the numbers look like they should add.",
                "<strong>Sign convention reversed.</strong> Both values are reduction potentials as written; "
                "the anode is reversed only through the subtraction.",
                "<strong>n taken from one half-reaction.</strong> n belongs to the balanced overall reaction, "
                "which may double one of the halves.",
            ],
            "units_note": ("<p>Volts for the potentials, millivolts for the reading most meters give, and "
                           "kJ/mol for the free energy. The three are related by the Faraday constant and the "
                           "electron count.</p>"),
            "limits": [
                "<strong>It is standard-state only.</strong> A real cell at other concentrations follows the "
                "Nernst equation, and the measured EMF can be well below E°.",
                "<strong>It says nothing about rate.</strong> A large EMF does not stop a cell being slow, "
                "and it says nothing about the overpotential at either electrode.",
            ],
            "uses": [
                "<li>Working out whether a proposed cell will deliver current.</li>",
                "<li>Converting a measured EMF into a free energy change.</li>",
                "<li>Checking a textbook's cell against its two half-potentials.</li>",
            ],
        },
        faq=[
            ("Why is the cell EMF a difference and not a sum?",
             "Because both tabulated values are reduction potentials. Reversing the anode half to oxidise it "
             "flips its sign, which turns the sum into the subtraction."),
            ("What does a negative ΔG° mean for the cell?",
             "That the cell reaction as written is spontaneous: it will deliver energy rather than consume it."),
        ],
        related=[("/chemistry/nernst-equation", "Nernst equation"),
                 ("/chemistry/electrolysis", "Electrolysis"),
                 ("/chemistry/gibbs-energy", "Gibbs energy")],
    ),

    S(
        slug="freezing-point-depression",
        name="Freezing Point Depression Calculator",
        title="Freezing Point Depression Calculator: ΔTf = Kf·b·i",
        desc="Work out how far a solution freezes below the pure solvent, from the cryoscopic constant, the molality and the van't Hoff factor.",
        what=("<p>Dissolving something in a solvent lowers its freezing point in proportion to the number of "
              "particles: <strong>ΔT<sub>f</sub> = K<sub>f</sub> × b × i</strong>. For water Kf is "
              "1.86 K·kg/mol, b is the molality and i is the number of particles each formula unit produces.</p>"),
        fields=[
            F("kf", "Cryoscopic constant (Kf)", "K·kg/mol", 1.86,
              "1.86 for water, 5.12 for benzene, 37.7 for camphor"),
            F("molality", "Molality of the solution (b)", "mol/kg", 1, "Moles of solute per kilogram of solvent"),
            F("van_t_hoff", "Van't Hoff factor (i)", "", 2,
              "2 for NaCl, 3 for CaCl₂, 1 for a non-electrolyte"),
            F("pure_fp", "Freezing point of the pure solvent", "°C", 0,
              "0 for water, 5.5 for benzene"),
        ],
        results=[
            R("delta_tf", "Freezing point depression (ΔTf)", "K"),
            R("solution_fp", "Freezing point of the solution", "°C"),
            R("effective_particles", "Particles per litre of solvent", "mol/kg"),
        ],
        formula={
            "delta_tf": "kf*molality*van_t_hoff",
            "solution_fp": "pure_fp-kf*molality*van_t_hoff",
            "effective_particles": "molality*van_t_hoff",
            "kf": "delta_tf/(molality*van_t_hoff)",
            "molality": "delta_tf/(kf*van_t_hoff)",
            "van_t_hoff": "delta_tf/(kf*molality)",
            "pure_fp": "solution_fp+delta_tf",
        },
        prose={
            "why": ("<p>Freezing point depression is one of the colligative properties, which depend on how "
                    "many particles are dissolved rather than what they are. That makes it a way of counting "
                    "molecules without knowing anything about them — the classical method for finding molar "
                    "mass, and the reason salt melts ice on a road.</p>"),
            "formula_note": ("<p>The van't Hoff factor is the ideal particle count. Sodium chloride gives 2, "
                             "calcium chloride 3, glucose 1. In real solutions ion pairing pulls the effective "
                             "value below the ideal one, so measured depressions are slightly smaller than "
                             "this predicts.</p>"),
            "example_note": ("<p>A 1 mol/kg solution of sodium chloride in water has i = 2, so "
                             "ΔTf = 1.86 × 1 × 2 = 3.72 K and the solution freezes at −3.72 °C. That is "
                             "roughly the strength of the brine used on winter roads.</p>"),
            "reading": ("<p>Read the depression against the application. A few tenths of a kelvin is a "
                        "laboratory curiosity; 10 K is a serious antifreeze mixture; more than about 20 K is "
                        "beyond what any practical solute achieves in water before the solution becomes "
                        "unworkable.</p>"),
            "bands": [
                ("ΔTf under 0.5 K", "Dilute solution — osmolarity work, or a check on water purity."),
                ("0.5–5 K", "Typical de-icing brine or a laboratory cooling bath."),
                ("Above 10 K", "Concentrated antifreeze; the colligative approximation is stretched."),
            ],
            "scenarios": [
                {"inputs": {"kf": 1.86, "molality": 0.5, "van_t_hoff": 1, "pure_fp": 0},
                 "note": "Half a mole per kilogram of sugar: −0.93 °C."},
                {"inputs": {"kf": 1.86, "molality": 2, "van_t_hoff": 3, "pure_fp": 0},
                 "note": "Calcium chloride at 2 mol/kg: ΔTf = 11.2 K, the classic road-salt strength."},
            ],
            "pitfalls": [
                "<strong>i left at 1 for a salt.</strong> Halving the predicted depression — the single "
                "biggest error on this page.",
                "<strong>Molarity used as molality.</strong> Close in dilute aqueous solution, wrong in "
                "concentrated ones, and this equation needs the mass-based unit.",
                "<strong>Ka or Kb used as Kf.</strong> The cryoscopic constant is a property of the solvent, "
                "not of the solute.",
            ],
            "units_note": ("<p>Kf carries K·kg/mol, so molality in mol/kg gives a depression in kelvin. A "
                           "kelvin step is the same size as a Celsius step, which is why the freezing point "
                           "result can be reported in °C.</p>"),
            "limits": [
                "<strong>It assumes dilute, ideal behaviour.</strong> Above about 1 mol/kg, ion pairing and "
                "solute-solute interaction make the real depression smaller.",
                "<strong>It is one colligative property among four.</strong> Boiling point elevation, "
                "osmotic pressure and vapour pressure lowering all describe the same particle count.",
            ],
            "uses": [
                "<li>Working out how much salt protects a road or a cooling system.</li>",
                "<li>Estimating the molar mass of an unknown from a measured depression.</li>",
                "<li>Checking that a solution's osmolarity is what a protocol assumed.</li>",
            ],
        },
        faq=[
            ("Why does salt melt ice if it makes water freeze at a lower temperature?",
             "Because the ice is already at 0 °C and the salted water in contact with it is now below its own "
             "freezing point, so the ice melts into the brine. The mixture ends up colder than 0 °C."),
            ("Is the depression the same for every solute?",
             "For equal numbers of particles, yes. Two moles of glucose depress the freezing point as much as "
             "one mole of sodium chloride, which dissociates into two."),
        ],
        related=[("/chemistry/boiling-point-elevation", "Boiling point elevation"),
                 ("/chemistry/osmotic-pressure", "Osmotic pressure"),
                 ("/chemistry/molality", "Molality")],
    ),

    S(
        slug="boiling-point-elevation",
        name="Boiling Point Elevation Calculator",
        title="Boiling Point Elevation Calculator: ΔTb = Kb·b·i",
        desc="Work out how far a solution boils above the pure solvent, from the ebullioscopic constant, the molality and the number of particles.",
        what=("<p>A dissolved solute raises the boiling point in proportion to the number of particles: "
              "<strong>ΔT<sub>b</sub> = K<sub>b</sub> × b × i</strong>. For water Kb is 0.512 K·kg/mol — a "
              "smaller constant than the freezing-point one, which is why the boiling effect is always the "
              "less dramatic of the two.</p>"),
        fields=[
            F("kb", "Ebullioscopic constant (Kb)", "K·kg/mol", 0.512,
              "0.512 for water, 2.53 for benzene, 3.63 for chloroform"),
            F("molality", "Molality of the solution (b)", "mol/kg", 1, "Moles of solute per kilogram of solvent"),
            F("van_t_hoff", "Van't Hoff factor (i)", "", 2,
              "2 for NaCl, 3 for CaCl₂, 1 for a non-electrolyte"),
            F("pure_bp", "Boiling point of the pure solvent", "°C", 100,
              "100 for water at sea level, 80.1 for benzene"),
        ],
        results=[
            R("delta_tb", "Boiling point elevation (ΔTb)", "K"),
            R("solution_bp", "Boiling point of the solution", "°C"),
            R("effective_particles", "Particles per kilogram of solvent", "mol/kg"),
        ],
        formula={
            "delta_tb": "kb*molality*van_t_hoff",
            "solution_bp": "pure_bp+kb*molality*van_t_hoff",
            "effective_particles": "molality*van_t_hoff",
            "kb": "delta_tb/(molality*van_t_hoff)",
            "molality": "delta_tb/(kb*van_t_hoff)",
            "van_t_hoff": "delta_tb/(kb*molality)",
            "pure_bp": "solution_bp-delta_tb",
        },
        prose={
            "why": ("<p>Boiling point elevation is the same physics as freezing point depression seen from the "
                    "other side: the solute lowers the chemical potential of the liquid, so more heat is "
                    "needed before its vapour pressure reaches atmospheric. It is also how a candy-maker "
                    "judges a syrup's sugar concentration without a refractometer.</p>"),
            "formula_note": ("<p>Kb is about a quarter of Kf for water, so a solution that freezes at −3.7 °C "
                             "boils only about 1 K above 100 °C. That asymmetry is thermodynamic, not "
                             "experimental.</p>"),
            "example_note": ("<p>A 1 mol/kg solution of sodium chloride in water gives "
                             "ΔTb = 0.512 × 1 × 2 = 1.02 K, so it boils at 101.02 °C at sea level. The same "
                             "solution freezes at −3.72 °C — the freezing effect is nearly four times "
                             "larger.</p>"),
            "reading": ("<p>Read the elevation against the precision of your thermometer. A tenth of a kelvin "
                        "needs a good thermometer and a steady pressure; that is why boiling point elevation "
                        "is used less often than freezing point depression for molar mass work.</p>"),
            "scenarios": [
                {"inputs": {"kb": 0.512, "molality": 0.5, "van_t_hoff": 1, "pure_bp": 100},
                 "note": "Half a mole per kilogram of sugar raises the boiling point to 100.26 °C."},
                {"inputs": {"kb": 0.512, "molality": 5, "van_t_hoff": 1, "pure_bp": 100},
                 "note": "A 5 mol/kg sugar syrup boils at 102.6 °C — close to the soft-ball stage of candy."},
            ],
            "pitfalls": [
                "<strong>Atmospheric pressure ignored.</strong> Water boils at 94 °C in Denver; the pure "
                "boiling point has to be the local one before any elevation is added.",
                "<strong>i left at 1 for a salt.</strong> The predicted elevation halves and looks plausible.",
                "<strong>A volatile solute used.</strong> Ethanol in water raises the vapour pressure and "
                "lowers the boiling point; this equation assumes a non-volatile solute.",
            ],
            "units_note": ("<p>Kb is in K·kg/mol, molality in mol/kg, so the elevation is in kelvin. A kelvin "
                           "step equals a Celsius step, which is why the boiling point result is in °C.</p>"),
            "limits": [
                "<strong>It assumes a non-volatile solute.</strong> Anything with a measurable vapour "
                "pressure of its own breaks the model.",
                "<strong>It is dilute-solution physics.</strong> In thick syrups the activity of water "
                "departs sharply from the molality.",
            ],
            "uses": [
                "<li>Estimating the strength of a sugar syrup from its boiling point.</li>",
                "<li>Finding the molar mass of an unknown from a measured elevation.</li>",
                "<li>Correcting a distillation temperature for dissolved solids.</li>",
            ],
        },
        faq=[
            ("Why is boiling point elevation smaller than freezing point depression?",
             "Because the constants differ: 0.512 against 1.86 K·kg/mol for water. The same particle count "
             "moves the boiling point about a quarter as far."),
            ("Does altitude matter?",
             "Yes, for the starting point. The elevation from solute is added to whatever the pure solvent "
             "boils at locally, so at altitude the whole answer shifts down."),
        ],
        related=[("/chemistry/freezing-point-depression", "Freezing point depression"),
                 ("/chemistry/boiling-point-altitude", "Boiling point at altitude"),
                 ("/chemistry/molality", "Molality")],
    ),

    S(
        slug="osmotic-pressure",
        name="Osmotic Pressure Calculator",
        title="Osmotic Pressure Calculator: π = iMRT",
        desc="Work out the pressure a solution exerts across a semipermeable membrane, from the particle count, molarity and temperature.",
        what=("<p>Osmotic pressure is the pressure needed to stop solvent crossing a semipermeable membrane: "
              "<strong>π = iMRT</strong>, with i the van't Hoff factor, M the molarity, R = 8.314 "
              "J/(mol·K) and T the temperature in kelvin.</p>"),
        fields=[
            F("van_t_hoff", "Van't Hoff factor (i)", "", 2, "2 for NaCl, 1 for glucose"),
            F("molarity", "Molarity (M)", "mol/L", 0.15, "Moles per litre of solution"),
            F("temperature", "Temperature (T)", "K", 310.15, "Kelvin: 37 °C is 310.15 K"),
        ],
        results=[
            R("pressure_kpa", "Osmotic pressure (π)", "kPa"),
            R("pressure_atm", "Osmotic pressure", "atm"),
            R("osmolarity", "Osmolarity (iM)", "osmol/L"),
        ],
        formula={
            "pressure_kpa": "van_t_hoff*molarity*8.314*temperature",
            "pressure_atm": "van_t_hoff*molarity*8.314*temperature/101.325",
            "osmolarity": "van_t_hoff*molarity",
            "van_t_hoff": "pressure_kpa/(molarity*8.314*temperature)",
            "molarity": "pressure_kpa/(van_t_hoff*8.314*temperature)",
            "temperature": "pressure_kpa/(van_t_hoff*molarity*8.314)",
        },
        prose={
            "why": ("<p>Osmotic pressure is the colligative property that matters most in biology: cell "
                    "volumes are set by it, and an intravenous fluid has to match blood's osmolarity or cells "
                    "swell and burst. It is also the largest of the four colligative effects — a millimolar "
                    "solution generates a pressure you can measure on a dial.</p>"),
            "formula_note": ("<p>R = 8.314 J/(mol·K) with molarity in mol/L gives pascals directly, because a "
                             "joule is a pascal-cubic metre and a litre is 10⁻³ m³. The page reports kPa so "
                             "the number stays readable.</p>"),
            "example_note": ("<p>Normal saline, 0.154 mol/L of sodium chloride at 310.15 K with i = 2, gives "
                             "π = 2 × 0.154 × 8.314 × 310.15 = 794 kPa — about 7.8 atmospheres, the pressure "
                             "that keeps red cells the right shape. Its osmolarity is 0.308 osmol/L, which "
                             "is blood's.</p>"),
            "reading": ("<p>Read the osmolarity rather than the pressure when comparing with biology: blood "
                        "plasma sits at about 0.29 osmol/L, so 0.308 is isotonic and 0.15 would be "
                        "hypotonic, letting water into cells. The pressure figure is more useful to an "
                        "engineer sizing a membrane.</p>"),
            "bands": [
                ("0.15 osmol/L", "Hypotonic: water enters cells, which swell."),
                ("0.29–0.31 osmol/L", "Isotonic: the physiological range for mammalian cells."),
                ("Above 0.5 osmol/L", "Hypertonic: cells lose water and shrivel."),
            ],
            "scenarios": [
                {"inputs": {"van_t_hoff": 1, "molarity": 0.3, "temperature": 310.15},
                 "note": "0.3 M glucose is isotonic with blood: 773 kPa at 37 °C."},
                {"inputs": {"van_t_hoff": 1, "molarity": 0.001, "temperature": 298.15},
                 "note": "Even a millimolar solution exerts 2.48 kPa — enough to move a column of water "
                         "25 cm high."},
            ],
            "pitfalls": [
                "<strong>i left at 1 for a salt.</strong> Half the real pressure, and a fluid that will "
                "haemolyse cells.",
                "<strong>Temperature in Celsius.</strong> 37 instead of 310.15 understates the pressure by a "
                "factor of eight.",
                "<strong>Molarity used for a concentrated solution.</strong> Above about 0.1 mol/L, "
                "osmolarity and osmolality diverge and the measured pressure follows the second more "
                "closely.",
            ],
            "units_note": ("<p>Osmolarity is in osmol/L — the same as molarity multiplied by the particle "
                           "count, and numerically equal to it for a non-electrolyte. Pressure is reported in "
                           "kPa and in atmospheres because clinical and engineering work use different "
                           "units.</p>"),
            "limits": [
                "<strong>It assumes a semipermeable membrane.</strong> A leaky membrane lets the solute "
                "through and the pressure falls towards zero.",
                "<strong>It assumes ideal dilute behaviour.</strong> At physiological ionic strength, "
                "osmotic coefficients are noticeably below 1, so measured pressures run a little lower.",
            ],
            "uses": [
                "<li>Checking that an intravenous fluid is isotonic.</li>",
                "<li>Sizing the pressure a membrane has to withstand.</li>",
                "<li>Working out how much a cryoprotectant will shrink cells before freezing.</li>",
            ],
        },
        faq=[
            ("Why does saline have i = 2?",
             "Because sodium chloride dissociates into two ions, and each ion contributes to the particle "
             "count that sets the pressure."),
            ("Is osmotic pressure the same as oncotic pressure?",
             "Oncotic pressure is the part of it contributed by proteins across a capillary wall. The "
             "physics is the same; the setting is biological."),
        ],
        related=[("/chemistry/freezing-point-depression", "Freezing point depression"),
                 ("/chemistry/molarity", "Molarity"),
                 ("/chemistry/raoults-law", "Raoult's law")],
    ),

    S(
        slug="raoults-law",
        name="Raoult's Law Calculator",
        title="Raoult's Law Calculator: Vapour Pressure Above a Mix",
        desc="Work out the vapour pressure of one component above an ideal mixture from its mole fraction and the pressure of the pure liquid.",
        what=("<p>Raoult's law says the partial vapour pressure of a component is proportional to how much of "
              "it is present: <strong>p<sub>i</sub> = x<sub>i</sub> × p°<sub>i</sub></strong>, where x is the "
              "mole fraction in the liquid and p° the vapour pressure of the pure liquid.</p>"),
        fields=[
            F("mole_fraction", "Mole fraction in the liquid (x)", "", 0.3, "Between 0 and 1"),
            F("pure_pressure", "Vapour pressure of the pure liquid (p°)", "kPa", 2.34,
              "For water at 20 °C, 2.34 kPa; for ethanol, 5.95 kPa"),
        ],
        results=[
            R("partial_pressure", "Partial vapour pressure (p)", "kPa"),
            R("total_pressure", "Total if the rest is the other component", "kPa"),
            R("pressure_drop", "Drop from the pure liquid", "kPa"),
        ],
        formula={
            "partial_pressure": "mole_fraction*pure_pressure",
            "pressure_drop": "pure_pressure-mole_fraction*pure_pressure",
            "total_pressure": "mole_fraction*pure_pressure+(1-mole_fraction)*pure_pressure",
            "mole_fraction": "partial_pressure/pure_pressure",
            "pure_pressure": "partial_pressure/mole_fraction",
        },
        prose={
            "why": ("<p>Raoult's law is the simplest statement about mixtures: each component contributes "
                    "vapour in proportion to its share of the surface. It is the ideal case that real "
                    "mixtures are measured against, and the reference for every activity coefficient.</p>"),
            "formula_note": ("<p>The drop from the pure liquid is simply the solute's share of the surface: "
                             "with 30 % of the liquid being solute, 30 % of the vapour pressure disappears. "
                             "That is the mechanism behind vapour pressure lowering, the fourth colligative "
                             "property.</p>"),
            "example_note": ("<p>Water at 20 °C has a vapour pressure of 2.34 kPa. With a mole fraction of "
                             "0.3 water in an ideal mixture, its partial pressure is 0.70 kPa and the "
                             "pressure has dropped by 1.64 kPa. In a sealed container, that is the difference "
                             "between 70 % and 30 % relative humidity above the liquid.</p>"),
            "reading": ("<p>Check that the partial pressure is below the pure value — Raoult's law reduces "
                        "vapour pressure and never raises it. A mixture with a higher vapour pressure than the "
                        "pure component is showing positive deviation, and it is no longer obeying the law.</p>"),
            "scenarios": [
                {"inputs": {"mole_fraction": 1, "pure_pressure": 2.34},
                 "note": "A pure liquid is the whole surface: the partial pressure is the pure one."},
                {"inputs": {"mole_fraction": 0.02, "pure_pressure": 101.3},
                 "note": "A trace of a volatile solvent in a non-volatile solute: 2.03 kPa still escapes."},
            ],
            "pitfalls": [
                "<strong>Mass fraction used as mole fraction.</strong> They coincide only for equal molar "
                "masses; for water and ethanol they differ by a factor of 2.5.",
                "<strong>The wrong component's pressure.</strong> Each component has its own p°, and the "
                "partial pressure of each is computed separately.",
                "<strong>Ideal behaviour assumed for a non-ideal mixture.</strong> Ethanol and water, or "
                "acetone and chloroform, deviate strongly and can form azeotropes.",
            ],
            "units_note": ("<p>Mole fraction is unitless, so the result carries the unit of the pressure you "
                           "entered — kPa here. p° must be the vapour pressure at the same temperature as the "
                           "mixture.</p>"),
            "limits": [
                "<strong>It holds for ideal mixtures only.</strong> Strongly interacting components give "
                "positive or negative deviations, corrected by an activity coefficient.",
                "<strong>It describes the liquid surface, not the gas.</strong> The vapour phase composition "
                "needs its own calculation from the partial pressures.",
            ],
            "uses": [
                "<li>Estimating the vapour pressure above a solvent mixture.</li>",
                "<li>Working out how much a dissolved solid lowers a solvent's vapour pressure.</li>",
                "<li>Starting point for a distillation calculation.</li>",
            ],
        },
        faq=[
            ("What is a positive deviation from Raoult's law?",
             "A mixture whose components escape more readily than the law predicts — usually because the two "
             "liquids interact less strongly with each other than with themselves. Ethanol and water are the "
             "familiar example."),
        ],
        related=[("/chemistry/partial-pressure", "Partial pressure"),
                 ("/chemistry/vapor-pressure", "Vapour pressure"),
                 ("/chemistry/mole-fraction", "Mole fraction")],
    ),

    S(
        slug="partial-pressure",
        name="Partial Pressure Calculator",
        title="Partial Pressure Calculator: Dalton's Law",
        desc="Work out a gas's partial pressure from its mole fraction and the total pressure, and the mole fraction a measured partial pressure implies.",
        what=("<p>In a gas mixture each component exerts the pressure it would exert alone: "
              "<strong>p<sub>i</sub> = x<sub>i</sub> × P<sub>total</sub></strong>. Dalton's law says those "
              "partial pressures add up to the total, which is why a gas analysis in percent is also an "
              "analysis in pressure.</p>"),
        fields=[
            F("mole_fraction", "Mole fraction of the gas (x)", "", 0.21,
              "0.21 for oxygen in air, 0.0004 for carbon dioxide"),
            F("total_pressure", "Total pressure (P)", "kPa", 101.3, "At sea level, 101.3 kPa"),
        ],
        results=[
            R("partial_pressure", "Partial pressure (p)", "kPa"),
            R("partial_atm", "Partial pressure", "atm"),
            R("partial_mmhg", "Partial pressure", "mmHg"),
        ],
        formula={
            "partial_pressure": "mole_fraction*total_pressure",
            "partial_atm": "mole_fraction*total_pressure/101.325",
            "partial_mmhg": "mole_fraction*total_pressure*760/101.325",
            "mole_fraction": "partial_pressure/total_pressure",
            "total_pressure": "partial_pressure/mole_fraction",
        },
        prose={
            "why": ("<p>Every gas exchange in physiology and every gas-phase equilibrium is written in partial "
                    "pressures: oxygen uptake in the lung, carbon dioxide in a fermenter, the driving force of "
                    "a reaction over a catalyst. Percent by volume is the same number, which makes the "
                    "conversion almost transparent.</p>"),
            "formula_note": ("<p>Dalton's law is exact for ideal gases and a very good approximation at "
                             "atmospheric pressure. The mole fraction is the same as the volume fraction, "
                             "which is why 21 % oxygen is 21 kPa of oxygen in 101 kPa of air.</p>"),
            "example_note": ("<p>Oxygen at a mole fraction of 0.21 in air at 101.3 kPa has a partial pressure "
                             "of 21.3 kPa — 159 mmHg, the figure printed on every blood-gas report as the "
                             "inspired oxygen pressure.</p>"),
            "reading": ("<p>Read the result against the physiological or industrial range you care about. "
                        "Alveolar oxygen sits near 13 kPa, arterial blood near 12 kPa, and supplemental "
                        "oxygen at 2 atmospheres pushes it past 40 kPa. For a reaction over a catalyst, it is "
                        "the partial pressure of the reactant that sets the rate.</p>"),
            "scenarios": [
                {"inputs": {"mole_fraction": 0.04, "total_pressure": 101.3},
                 "note": "Carbon dioxide at 4 % — the concentration in expired air — is 4.05 kPa."},
                {"inputs": {"mole_fraction": 0.21, "total_pressure": 202.6},
                 "note": "The same 21 % at two atmospheres doubles the partial pressure to 42.5 kPa."},
            ],
            "pitfalls": [
                "<strong>Percent used undivided.</strong> 21 instead of 0.21 gives a partial pressure a "
                "hundred times too large.",
                "<strong>Total pressure assumed to be one atmosphere.</strong> At altitude, in a pressurised "
                "cabin or in a fermenter, it is not.",
                "<strong>Water vapour left out of the total.</strong> In humid gas at body temperature, "
                "water contributes about 6.3 kPa and reduces every dry gas's share.",
            ],
            "units_note": ("<p>The result is reported in kPa, atm and mmHg because the three are in daily use: "
                           "kPa in engineering, atm in chemistry, mmHg in medicine and physiology.</p>"),
            "limits": [
                "<strong>It assumes an ideal gas.</strong> At high pressure, fugacity replaces partial "
                "pressure and the law drifts.",
                "<strong>It says nothing about interaction.</strong> Two gases at the same partial pressure "
                "can behave very differently if one dissolves or reacts.",
            ],
            "uses": [
                "<li>Working out the oxygen available at altitude or under pressure.</li>",
                "<li>Setting a gas mixture for a fermenter or an incubator.</li>",
                "<li>Converting a gas analysis in percent into the pressures an equilibrium needs.</li>",
            ],
        },
        faq=[
            ("Is partial pressure the same as concentration?",
             "They are proportional through the ideal gas law: p = cRT. A partial pressure is the easier "
             "thing to control, which is why gas work is written in it."),
            ("Do the partial pressures really add up to the total?",
             "For ideal gases, exactly. For real gases at high pressure, the sum of the fugacities does, and "
             "the partial pressures only approximately."),
        ],
        related=[("/chemistry/raoults-law", "Raoult's law"),
                 ("/chemistry/mole-fraction", "Mole fraction"),
                 ("/chemistry/kp", "Kp")],
    ),
]
