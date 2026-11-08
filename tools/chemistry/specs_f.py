"""Batch 4 — kinetics, decay and structure."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="activation-energy",
        name="Activation Energy Calculator",
        title="Activation Energy Calculator: Two Temperatures",
        desc="Find the activation energy of a reaction from two rate constants measured at two temperatures, together with the pre-exponential factor those two points imply.",
        what=("<p>Two rate constants at two temperatures fix the barrier between them: "
              "<strong>Ea = R·ln(k₂/k₁) ÷ (1/T₁ − 1/T₂)</strong>. The page returns the activation energy "
              "in kilojoules per mole, the ratio of the two constants, and the pre-exponential factor A "
              "in the units of your rate constants.</p>"),
        fields=[
            F("k1", "Rate constant at T₁", "", 0.001,
              "In any consistent unit; only the ratio to k₂ is used"),
            F("t1", "Temperature T₁", "K", 300,
              "Absolute temperature: add 273.15 to the Celsius reading"),
            F("k2", "Rate constant at T₂", "", 0.01,
              "Measured at the higher of the two temperatures"),
            F("t2", "Temperature T₂", "K", 320,
              "Must differ from T₁ by enough to matter — 20 K is a good start"),
        ],
        results=[
            R("activation_energy", "Activation energy", "kJ/mol"),
            R("ratio", "Rate constant ratio k₂/k₁", ""),
            R("pre_exponential", "Pre-exponential factor A", ""),
        ],
        formula={
            "activation_energy": "8.314*log(k2/k1)/(1/t1-1/t2)/1000",
            "ratio": "k2/k1",
            "pre_exponential": "k1*exp(activation_energy*1000/(8.314*t1))",
            "k1": "k2/exp(activation_energy*1000/8.314*(1/t1-1/t2))",
            "k2": "k1*exp(activation_energy*1000/8.314*(1/t1-1/t2))",
            "t1": "1/(1/t2+8.314*log(k2/k1)/(activation_energy*1000))",
            "t2": "1/(1/t1-8.314*log(k2/k1)/(activation_energy*1000))",
        },
        prose={
            "why": ("<p>Activation energy is what makes a reaction fast at one temperature and slow at "
                    "another. Measuring it needs nothing more than the same experiment run twice at two "
                    "temperatures, and the logarithm turns the exponential into a straight line.</p>"),
            "formula_note": ("<p>The two temperatures enter as reciprocals, which is why they must be in "
                             "kelvin. A mistake between 25 °C and 298.15 K changes the reciprocal by more "
                             "than a factor of ten, and the barrier with it.</p>"),
            "example_note": ("<p>A rate constant rising from 0.001 to 0.01 between 300 K and 320 K: the "
                             "ratio is ten, ln 10 is 2.303, and 1/300 − 1/320 is 2.083 × 10⁻⁴. That gives "
                             "91.9 kJ/mol — the kind of barrier whose rate more than triples every ten degrees, so it "
                             "doubles in about six, at room temperature.</p>"),
            "reading": ("<p>Barriers under about 20 kJ/mol are diffusive: the reaction runs as fast as the "
                        "molecules can find each other. Between 50 and 100 kJ/mol is the ordinary chemical "
                        "range, with rates roughly doubling per ten degrees. Above 150 kJ/mol a reaction "
                        "needs a flame, a catalyst or both.</p>"),
            "scenarios": [
                {"inputs": {"k1": 2e-4, "t1": 290, "k2": 4e-4, "t2": 300},
                 "note": "A doubling over ten degrees just above room temperature is about 50 kJ/mol — the "
                         "textbook rule of thumb made exact."},
                {"inputs": {"k1": 1, "t1": 300, "k2": 8, "t2": 350},
                 "note": "An eight-fold rise over fifty degrees is only 36 kJ/mol: a fast, poorly "
                         "temperature-sensitive reaction."},
            ],
            "pitfalls": [
                "<strong>Celsius in the temperature boxes.</strong> The reciprocal term assumes kelvin; "
                "25 and 35 instead of 298.15 and 308.15 gives a barrier wrong by a factor of ten.",
                "<strong>The two temperatures too close together.</strong> Two runs 2 K apart give a number "
                "dominated by the experimental error in k.",
                "<strong>The rate constants in different units.</strong> Only their ratio matters, but a "
                "ratio taken between molar and millimolar figures is out by a thousand.",
            ],
            "units_note": ("<p>The rate constants can be in any unit as long as both are the same — the "
                           "page only uses their ratio. The activation energy comes back in kilojoules "
                           "per mole because R is 8.314 J per mole per kelvin and the division by a "
                           "thousand is included.</p>"),
            "limits": [
                "<strong>Two points only.</strong> A curved Arrhenius plot — which happens with a change "
                "of mechanism or a phase change — is not a straight line, and this page averages it into "
                "one misleading slope.",
                "<strong>It assumes the rate constants are accurate.</strong> A few per cent of error in k "
                "propagates into several kilojoules per mole.",
            ],
            "uses": [
                "<li>Finding a barrier from two reaction runs.</li>",
                "<li>Predicting the rate at a temperature you did not measure.</li>",
                "<li>Checking a literature activation energy against your own data.</li>",
            ],
        },
        faq=[
            ("Why must the temperatures be in kelvin?",
             "Because the Arrhenius equation contains 1/T, and a ratio of reciprocals only behaves the way "
             "the algebra expects on an absolute scale. 0 °C is 273.15 K, and 0 in the box divides by "
             "zero."),
            ("What if k₂ is smaller than k₁?",
             "Then the ratio is below one and the logarithm is negative, so the activation energy comes out "
             "negative — which means the numbers were entered with the temperatures the wrong way round, or "
             "the reaction slows as it warms and something else is going on."),
        ],
        related=[("/chemistry/arrhenius-equation", "Arrhenius equation"),
                 ("/chemistry/rate-constant", "Rate constant"),
                 ("/chemistry/half-life", "Half-life")],
    ),

    S(
        slug="arrhenius-equation",
        name="Arrhenius Equation Calculator",
        title="Arrhenius Equation Calculator: k From A, Ea and T",
        desc="Work out a rate constant from the pre-exponential factor, the activation energy and the temperature, and see what fraction of collisions clears the barrier.",
        what=("<p>The Arrhenius equation says a rate constant is the frequency factor discounted by the "
              "fraction of collisions with enough energy: <strong>k = A·exp(−Ea ÷ RT)</strong>. This page "
              "reports k, that exponential fraction, and the rate constant ten kelvin higher.</p>"),
        fields=[
            F("a_factor", "Pre-exponential factor A", "", 10000000000000,
              "In the units of the rate constant; 10¹³ per second is typical for a unimolecular step"),
            F("ea", "Activation energy Ea", "kJ/mol", 100,
              "From two rate constants at two temperatures, or the literature"),
            F("temp", "Temperature", "K", 298.15,
              "Absolute temperature: 25 °C is 298.15 K"),
        ],
        results=[
            R("rate_constant", "Rate constant k", ""),
            R("boltzmann_fraction", "Fraction of collisions with enough energy", ""),
            R("rate_ten_kelvin_higher", "Rate constant at T + 10 K", ""),
        ],
        formula={
            "rate_constant": "a_factor*exp(-ea*1000/(8.314*temp))",
            "boltzmann_fraction": "exp(-ea*1000/(8.314*temp))",
            "rate_ten_kelvin_higher": "a_factor*exp(-ea*1000/(8.314*(temp+10)))",
            "a_factor": "rate_constant/exp(-ea*1000/(8.314*temp))",
            "ea": "-8.314*temp*log(rate_constant/a_factor)/1000",
            "temp": "-ea*1000/(8.314*log(rate_constant/a_factor))",
        },
        prose={
            "why": ("<p>Every rate constant in a mechanism is a number with a story behind it: how often "
                    "molecules collide, and what fraction of those collisions clears the barrier. The "
                    "Arrhenius equation is that story written in three symbols, and it is the reason "
                    "heating a reaction works at all.</p>"),
            "formula_note": ("<p>The exponent is dimensionless, so Ea and RT must be in the same energy "
                             "unit. The 1000 in the expression converts kilojoules per mole into joules "
                             "per mole, which is what R = 8.314 works in.</p>"),
            "example_note": ("<p>A = 10¹³ s⁻¹ with a 100 kJ/mol barrier at 298.15 K: RT is 2.479 kJ/mol, so "
                             "the exponent is −40.3 and only 3.0 × 10⁻¹⁸ of the collisions qualify. The rate "
                             "constant is 3.03 × 10⁻⁵ per second, and ten degrees warmer it is 3.7 times "
                             "larger.</p>"),
            "reading": ("<p>The fraction is the number to look at. An exponent around −10 leaves one "
                        "collision in twenty thousand able to react and the reaction is brisk. An exponent "
                        "around −40 leaves one in a hundred million billion, and the reaction at room "
                        "temperature is effectively stopped.</p>"),
            "scenarios": [
                {"inputs": {"a_factor": 1e13, "ea": 50, "temp": 298.15},
                 "note": "Halving the barrier raises the fraction from 3.0 × 10⁻¹⁸ to 1.7 × 10⁻⁹ — more "
                         "than half a billion times faster, which is what a catalyst is for."},
                {"inputs": {"a_factor": 1e11, "ea": 20, "temp": 600},
                 "note": "A small barrier at high temperature leaves 1.8 % of collisions productive."},
            ],
            "pitfalls": [
                "<strong>Ea entered in joules and read as kilojoules.</strong> The expression expects "
                "kilojoules per mole; a joule figure makes the exponent a thousand times too small.",
                "<strong>The pre-exponential factor guessed.</strong> A ranges over many orders of "
                "magnitude, and k is exactly proportional to it, so a guess makes the answer a guess.",
                "<strong>Using the equation beyond its range.</strong> Near a phase change or with a "
                "changing mechanism, no single A and Ea describe the data.",
            ],
            "units_note": ("<p>The rate constant comes back in whatever unit A was entered in, and the "
                           "fraction has no unit. Entering A per second gives k per second; entering A in "
                           "litres per mole per second gives k in the same units.</p>"),
            "limits": [
                "<strong>It is empirical.</strong> A and Ea are fitted, not derived: the equation describes "
                "the temperature dependence well but explains none of the chemistry.",
                "<strong>It ignores diffusion and catalysts.</strong> In solution the observed barrier "
                "includes the solvent's own temperature dependence.",
            ],
            "uses": [
                "<li>Sizing a reactor for a target rate at a known temperature.</li>",
                "<li>Seeing how much a ten-degree rise actually buys.</li>",
                "<li>Back-calculating A from one measured rate constant.</li>",
            ],
        },
        faq=[
            ("What is the pre-exponential factor physically?",
             "Roughly the frequency of collisions with the right orientation, in the units of the rate "
             "constant. For a simple unimolecular step it is near the vibrational frequency, about 10¹³ "
             "per second."),
            ("Does a rate constant double every ten degrees?",
             "Often, yes — but only because typical reaction barriers near room temperature happen to give "
             "that. A small barrier doubles per ten degrees twice over; a large one barely moves."),
        ],
        related=[("/chemistry/activation-energy", "Activation energy"),
                 ("/chemistry/rate-constant", "Rate constant"),
                 ("/chemistry/q10", "Q10 coefficient")],
    ),

    S(
        slug="rate-constant",
        name="Rate Constant Calculator",
        title="Rate Constant Calculator: First Order Kinetics",
        desc="Get the first-order rate constant from an initial concentration, the concentration left after a measured time, plus the half-life that constant implies.",
        what=("<p>For a first-order reaction the concentration decays exponentially, and the rate constant "
              "is the slope of the logarithm: <strong>k = ln(C₀ ÷ Cₜ) ÷ t</strong>. The page reports k in "
              "per second, the half-life it corresponds to, and how much of the starting material remains.</p>"),
        fields=[
            F("c0", "Initial concentration", "mol/L", 1.0,
              "Measured at the start of the run"),
            F("ct", "Concentration after time t", "mol/L", 0.5,
              "Measured at the end of the same run"),
            F("time", "Elapsed time", "s", 60,
              "Between the two measurements"),
        ],
        results=[
            R("rate_constant", "Rate constant k", "1/s"),
            R("half_life", "Half-life", "s"),
            R("fraction_remaining", "Fraction remaining", "%"),
        ],
        formula={
            "rate_constant": "log(c0/ct)/time",
            "half_life": "log(2)*time/log(c0/ct)",
            "fraction_remaining": "ct/c0*100",
            "c0": "ct*exp(rate_constant*time)",
            "ct": "c0*exp(-rate_constant*time)",
            "time": "log(c0/ct)/rate_constant",
        },
        prose={
            "why": ("<p>A first-order rate constant is the cleanest number in kinetics: it has units of "
                    "per second and it does not depend on concentration. Every drug's clearance, every "
                    "radionuclide and every unimolecular decomposition is described by one.</p>"),
            "formula_note": ("<p>The logarithm of the ratio is dimensionless, so dividing by the time gives "
                             "per second directly. Using logarithms to base ten instead of natural logs "
                             "shifts the answer by 2.303 — the commonest error in this calculation.</p>"),
            "example_note": ("<p>One molar falling to half a molar in sixty seconds is exactly one "
                             "half-life: k = ln 2 ÷ 60 = 0.01155 per second, which is a half-life of sixty "
                             "seconds. Any pair of points on the same curve gives the same k, which is what "
                             "\"first order\" means.</p>"),
            "reading": ("<p>Check the units against the chemistry. A rate constant around 10⁻³ per second "
                        "means a half-life near twelve minutes; one around 10⁻⁵ per second means about "
                        "nineteen hours. A number that looks orders of magnitude wrong is usually a unit slip in the "
                        "time box.</p>"),
            "scenarios": [
                {"inputs": {"c0": 2, "ct": 1, "time": 600},
                 "note": "Two molar to one in ten minutes: k = 1.16 × 10⁻³ per second, half-life ten "
                         "minutes."},
                {"inputs": {"c0": 0.1, "ct": 0.01, "time": 3600},
                 "note": "One decade of concentration loss in an hour: k = 6.4 × 10⁻⁴ per second, "
                         "half-life eighteen minutes."},
            ],
            "pitfalls": [
                "<strong>Base-ten logarithms used.</strong> ln(C₀/Cₜ) ÷ t, not log₁₀; the difference is a "
                "factor of 2.303.",
                "<strong>A reaction that is not first order.</strong> If doubling the concentration "
                "quadruples the rate, the decay is second order and this page's constant will drift with "
                "concentration.",
                "<strong>Time in the wrong unit.</strong> Sixty seconds is not sixty minutes: k comes back "
                "per second, so the time must be in seconds.",
            ],
            "units_note": ("<p>Both concentrations must share a unit — the ratio is what matters — and the "
                           "time must be in seconds for k to come back in per second. The half-life is "
                           "returned in the same unit as the time box.</p>"),
            "limits": [
                "<strong>First order only.</strong> Zero-order, second-order and Michaelis–Menten "
                "reactions all have different integrated forms and different constants.",
                "<strong>Two points only.</strong> A single pair of measurements cannot show whether the "
                "order is really one; several points on a log plot can.",
            ],
            "uses": [
                "<li>Finding a rate constant from two concentration readings.</li>",
                "<li>Converting a measured decay into the half-life a protocol quotes.</li>",
                "<li>Checking whether a reaction is really first order.</li>",
            ],
        },
        faq=[
            ("Why is the rate constant called k and not a rate?",
             "Because it is the rate per unit concentration. A first-order rate is k times the "
             "concentration, so k carries the per-second unit and the concentration carries the rest."),
            ("What units does k have for other orders?",
             "First order is per second; second order is litres per mole per second; zero order is moles "
             "per litre per second. Only the first-order case is covered here."),
        ],
        related=[("/chemistry/half-life", "Half-life"),
                 ("/chemistry/arrhenius-equation", "Arrhenius equation"),
                 ("/chemistry/activation-energy", "Activation energy")],
    ),

    S(
        slug="half-life",
        name="Half-Life Calculator",
        title="Half-Life Calculator: Amount Left After a Given Time",
        desc="Follow a decaying substance through its half-lives: how much of it remains after a given time, how many half-lives have passed, and what fraction is left.",
        what=("<p>Each half-life halves what is left, so after n half-lives the amount is "
              "<strong>N = N₀ × (1/2)<sup>n</sup></strong>, with n = t ÷ t½. The page reports the remaining "
              "amount, the number of half-lives elapsed and the percentage left.</p>"),
        fields=[
            F("initial_amount", "Starting amount", "mg", 100,
              "Mass, activity or count — the unit carries through unchanged"),
            F("half_life", "Half-life", "h", 6,
              "Hours in this example; the same unit as the elapsed time"),
            F("time", "Elapsed time", "h", 24,
              "Measured on the same clock as the half-life"),
        ],
        results=[
            R("remaining", "Amount remaining", "mg"),
            R("half_lives", "Half-lives elapsed", ""),
            R("fraction_remaining", "Fraction remaining", "%"),
        ],
        formula={
            "remaining": "initial_amount*pow(0.5,time/half_life)",
            "half_lives": "time/half_life",
            "fraction_remaining": "pow(0.5,time/half_life)*100",
            "initial_amount": "remaining/pow(0.5,time/half_life)",
            "half_life": "time*log(2)/log(initial_amount/remaining)",
            "time": "half_life*log(initial_amount/remaining)/log(2)",
        },
        prose={
            "why": ("<p>Half-life is how decay is reported because it does not depend on how much you "
                    "started with. Four half-lives leave a sixteenth whether the starting amount was a "
                    "microgram or a tonne, which is why the number travels so well between fields.</p>"),
            "formula_note": ("<p>Halving repeatedly is the same as multiplying by a half in each half-life, "
                             "which is why the exponent is the number of half-lives rather than the time. "
                             "Because 0.5 raised to a power is easy to chain, the tenth half-life leaves "
                             "one part in a thousand, not one in ten.</p>"),
            "example_note": ("<p>100 mg with a 6-hour half-life, read after 24 hours: four half-lives "
                             "have passed, so what is left is 100 ÷ 16 = 6.25 mg, or 6.25 % of the "
                             "starting amount.</p>"),
            "reading": ("<p>Count in half-lives rather than in hours: after 1 half-life 50 % remains, after "
                        "3 it is 12.5 %, after 7 it is 0.78 %, after 10 it is 0.098 %. Ten half-lives is the "
                        "usual definition of \"gone\" in radiochemistry, and about the point where a "
                        "measurement stops being possible.</p>"),
            "scenarios": [
                {"inputs": {"initial_amount": 80, "half_life": 12.3, "time": 36.9},
                 "note": "Three half-lives leave 10 mg — an eighth of 80, whatever the substance."},
                {"inputs": {"initial_amount": 500, "half_life": 5730, "time": 17190},
                 "note": "Carbon-14 after three half-lives: 62.5 mg of a 500 mg sample, 12.5 %."},
            ],
            "pitfalls": [
                "<strong>Halving at the wrong interval.</strong> Two half-lives is a quarter, not a third; "
                "the halving is multiplicative, never additive.",
                "<strong>Mismatched units.</strong> A half-life in hours with an elapsed time in minutes "
                "moves the answer by a factor of sixty.",
                "<strong>Half-life treated as a shelf life.</strong> After one half-life half remains; "
                "there is no time at which all of it is gone.",
            ],
            "units_note": ("<p>The remaining amount is in whatever unit the starting amount used, because "
                           "the fraction is dimensionless. The half-lives elapsed is a plain number, and "
                           "the fraction is a percentage.</p>"),
            "limits": [
                "<strong>It assumes a single decay process.</strong> A substance eliminated by two routes "
                "at once has a curve that is not a single exponential.",
                "<strong>It says nothing about what the substance becomes.</strong> The daughter product "
                "may itself be radioactive, which is what a decay chain is.",
            ],
            "uses": [
                "<li>Working out how much of a reagent survives a storage period.</li>",
                "<li>Reading a radiopharmaceutical's activity at the time of use.</li>",
                "<li>Finding a half-life from two amounts measured at known times.</li>",
            ],
        },
        faq=[
            ("How much is left after five half-lives?",
             "One thirty-second, about 3.1 %. After ten, one thousandth and a bit. The fraction halves "
             "each time; it never reaches zero."),
            ("Can I find the half-life from two measurements?",
             "Yes — enter one as the starting amount, the other as the remaining amount and the time "
             "between them, then solve for the half-life. The page will return it."),
        ],
        related=[("/chemistry/radioactive-decay", "Radioactive decay"),
                 ("/chemistry/carbon-dating", "Carbon dating"),
                 ("/chemistry/rate-constant", "Rate constant")],
    ),

    S(
        slug="radioactive-decay",
        name="Radioactive Decay Calculator",
        title="Radioactive Decay Calculator: Activity and Atoms",
        desc="From an initial activity and a half-life, get the activity after a given time, the decay constant in per second, and the number of atoms behind that count.",
        what=("<p>Activity falls exponentially: <strong>A = A₀·e<sup>−λt</sup></strong>, with the decay "
              "constant λ = ln 2 ÷ t½. This page reports the activity left, λ in per second, and the number "
              "of radioactive atoms the starting activity implies, since N = A ÷ λ.</p>"),
        fields=[
            F("initial_activity", "Initial activity", "Bq", 1000,
              "Becquerels: decays per second"),
            F("half_life", "Half-life", "s", 3600,
              "In seconds here; one hour is 3600"),
            F("time", "Elapsed time", "s", 7200,
              "On the same clock as the half-life"),
        ],
        results=[
            R("activity", "Activity after the time", "Bq"),
            R("decay_constant", "Decay constant λ", "1/s"),
            R("atoms_initial", "Radioactive atoms at the start", ""),
            R("fraction_decayed", "Fraction decayed", "%"),
        ],
        formula={
            "decay_constant": "log(2)/half_life",
            "activity": "initial_activity*exp(-log(2)/half_life*time)",
            "atoms_initial": "initial_activity/(log(2)/half_life)",
            "fraction_decayed": "(1-exp(-log(2)/half_life*time))*100",
            "initial_activity": "activity*exp(log(2)/half_life*time)",
            "half_life": "log(2)*time/log(initial_activity/activity)",
            "time": "log(initial_activity/activity)*half_life/log(2)",
        },
        prose={
            "why": ("<p>Activity is what a detector measures; atom count is what the inventory holds. "
                    "The link between them is λ, and it is a surprisingly large number: a becquerel is one "
                    "decay per second, so a million becquerels of a substance with a half-life of an hour "
                    "means five billion atoms.</p>"),
            "formula_note": ("<p>λ has units of per second and is the probability that any one atom decays "
                             "in the next second. Dividing the activity by it converts a rate into a "
                             "population, which is why the answer for a long-lived isotope is enormous.</p>"),
            "example_note": ("<p>1000 Bq with a one-hour half-life, read after two hours: 250 Bq remains, "
                             "λ = 1.925 × 10⁻⁴ per second, and the starting activity needed 5.19 million "
                             "atoms to produce it. Three quarters of the activity is gone.</p>"),
            "reading": ("<p>Compare the activity you measure with the date on the vial. A source reading a "
                        "quarter of its stated activity has passed two half-lives, which is what a "
                        "radiopharmaceutical's working life is planned around.</p>"),
            "scenarios": [
                {"inputs": {"initial_activity": 4000, "half_life": 8, "time": 24},
                 "note": "Three half-lives in a day: 500 Bq left of 4 000, and 87.5 % decayed."},
                {"inputs": {"initial_activity": 10000, "half_life": 3600, "time": 1800},
                 "note": "Half a half-life leaves 70.7 % — 7 071 Bq — because the decay is exponential "
                         "rather than linear."},
            ],
            "pitfalls": [
                "<strong>Becquerels and counts per minute mixed.</strong> 1 Bq is 1 decay per second, so a "
                "counter reading in cpm is sixty times smaller when converted, not the other way.",
                "<strong>Half-life in the wrong unit.</strong> 3 600 entered as hours rather than seconds "
                "changes λ by a factor of 3 600.",
                "<strong>Atom count read as the sample's mass.</strong> N is the number of radioactive "
                "atoms, and the mass behind it needs the molar mass and Avogadro's number.",
            ],
            "units_note": ("<p>Activity in becquerels, time in seconds, λ in per second — the three fit "
                           "together with no conversion factors. The atom count is a plain number, and the "
                           "fraction decayed is a percentage.</p>"),
            "limits": [
                "<strong>It assumes one isotope.</strong> A sample holding a decay chain has activity from "
                "the daughters as well, and the curve is not a single exponential.",
                "<strong>Measurement efficiency is not included.</strong> A detector registering 250 counts "
                "per second may be seeing fewer decays than that, or more, depending on geometry.",
            ],
            "uses": [
                "<li>Working out a source's activity after a delay.</li>",
                "<li>Converting a measured activity into an atom count.</li>",
                "<li>Checking a radionuclide's decay after transport.</li>",
            ],
        },
        faq=[
            ("Why is the atom count so much larger than the activity?",
             "Because each atom decays only rarely. With a one-hour half-life, λ is about 2 × 10⁻⁴ per "
             "second, so it takes several thousand atoms to give one decay per second."),
            ("What is a becquerel?",
             "One decay per second. A curie, the older unit, is 3.7 × 10¹⁰ Bq — the activity of a gram of "
             "radium."),
        ],
        related=[("/chemistry/half-life", "Half-life"),
                 ("/chemistry/carbon-dating", "Carbon dating"),
                 ("/chemistry/rate-constant", "Rate constant")],
    ),
    S(
        slug="carbon-dating",
        name="Radiocarbon Dating Calculator",
        title="Radiocarbon Dating Calculator: Age From Activity",
        desc="Turn a sample's residual carbon-14 activity into an age in years, with the fraction of modern carbon still in it and the number of half-lives that implies.",
        what=("<p>Living things hold carbon-14 at the modern level; when they die it decays with a 5 730 "
              "year half-life. The age follows from the ratio of what is left to what a modern sample "
              "holds: <strong>t = t½ · ln(A₀ ÷ A) ÷ ln 2</strong>.</p>"),
        fields=[
            F("measured_activity", "Activity of the sample", "dpm/g", 3.4,
              "Disintegrations per minute per gram of carbon, corrected for background"),
            F("modern_activity", "Activity of modern carbon", "dpm/g", 13.6,
              "13.6 dpm/g is the standard for living material"),
            F("half_life", "Half-life of carbon-14", "years", 5730,
              "5 730 years is the Libby value in everyday use"),
        ],
        results=[
            R("age", "Age of the sample", "years"),
            R("fraction_modern", "Fraction of modern carbon", "%"),
            R("half_lives", "Half-lives elapsed", ""),
        ],
        formula={
            "age": "half_life*log(modern_activity/measured_activity)/log(2)",
            "fraction_modern": "measured_activity/modern_activity*100",
            "half_lives": "log(modern_activity/measured_activity)/log(2)",
            "measured_activity": "modern_activity*exp(-log(2)*age/half_life)",
            "modern_activity": "measured_activity*exp(log(2)*age/half_life)",
            "half_life": "age*log(2)/log(modern_activity/measured_activity)",
        },
        prose={
            "why": ("<p>Radiocarbon dating works because the carbon in a living organism is continuously "
                    "exchanged with the atmosphere, and stops being exchanged at death. From that moment "
                    "the carbon-14 fraction falls on a clock that nothing chemical can reset.</p>"),
            "formula_note": ("<p>The ratio carries the whole calculation: half the modern activity is one "
                             "half-life, a quarter is two, and an eighth is three. Only when that ratio "
                             "gets close to the measurement's own uncertainty does the date stop being "
                             "useful.</p>"),
            "example_note": ("<p>A sample at 3.4 dpm/g against a modern 13.6 is exactly a quarter, so two "
                             "half-lives have passed and the sample is 11 460 years old. A reading of "
                             "6.8 dpm/g would be half-modern and 5 730 years old.</p>"),
            "reading": ("<p>The method runs out at about forty thousand years, where less than one per cent "
                        "of the original carbon-14 remains and contamination by modern carbon dominates. "
                        "Near that limit the error bar, not the age, is the interesting number.</p>"),
            "scenarios": [
                {"inputs": {"measured_activity": 6.8, "modern_activity": 13.6, "half_life": 5730},
                 "note": "Half of modern activity is 5 730 years — the textbook one-half-life case."},
                {"inputs": {"measured_activity": 1.7, "modern_activity": 13.6, "half_life": 5730},
                 "note": "An eighth of modern activity is three half-lives: 17 190 years."},
            ],
            "pitfalls": [
                "<strong>Modern activity assumed constant.</strong> Atmospheric testing and fossil fuel "
                "burning moved it by several per cent, which is what calibration curves correct for.",
                "<strong>Contamination by modern carbon.</strong> A fingerprint's worth of handling makes a "
                "very old sample look younger, which is why samples are cleaned so aggressively.",
                "<strong>The Libby half-life used as the answer.</strong> The measured value is 5 700 ± 30 "
                "years; the 5 730 figure is the conventional one that calibration curves are built around.",
            ],
            "units_note": ("<p>Both activities must be in the same unit — disintegrations per minute per "
                           "gram is the convention — and the half-life in years, which makes the age come "
                           "back in years.</p>"),
            "limits": [
                "<strong>Organic material only.</strong> The method needs carbon fixed by a living "
                "organism: bone, wood, charcoal, shell. It cannot date stone or metal.",
                "<strong>It assumes a closed system.</strong> Carbon exchanged with groundwater or "
                "carbonates after burial shifts the age.",
            ],
            "uses": [
                "<li>Dating archaeological wood, charcoal and bone.</li>",
                "<li>Checking whether a sample is authentically old.</li>",
                "<li>Converting museum activities into an age for a display.</li>",
            ],
        },
        faq=[
            ("Why is the half-life 5 730 years and not 5 700?",
             "5 730 is Libby's original value, kept because the calibration curves used by archaeologists "
             "are built on it. The modern measurement is about 5 700 years."),
            ("How old can something be dated?",
             "In practice about 40 000 to 50 000 years. Beyond that so little carbon-14 is left that "
             "background and contamination swamp the signal."),
        ],
        related=[("/chemistry/radioactive-decay", "Radioactive decay"),
                 ("/chemistry/half-life", "Half-life"),
                 ("/chemistry/rate-constant", "Rate constant")],
    ),

    S(
        slug="q10",
        name="Q10 Temperature Coefficient Calculator",
        title="Q10 Calculator: Reaction Rate Per 10 Degrees",
        desc="Measure how strongly a reaction rate responds to temperature by comparing two rates, then use that coefficient to predict the rate ten degrees higher.",
        what=("<p>Q10 is the factor by which a rate changes over ten degrees: "
              "<strong>Q10 = (r₂ ÷ r₁)<sup>10 ÷ (T₂ − T₁)</sup></strong>. A Q10 of 2 means the rate doubles "
              "per ten degrees, which is the usual figure for biological and many chemical processes.</p>"),
        fields=[
            F("rate1", "Rate at T₁", "", 1.0,
              "Any consistent unit; only the ratio is used"),
            F("temp1", "Temperature T₁", "°C", 25,
              "Celsius here, because the ten-degree interval is defined on that scale"),
            F("rate2", "Rate at T₂", "", 2.0,
              "Measured at the second temperature"),
            F("temp2", "Temperature T₂", "°C", 35,
              "Ten degrees above T₁ gives Q10 directly"),
        ],
        results=[
            R("q10", "Q10 coefficient", ""),
            R("rate_ratio", "Rate ratio r₂/r₁", ""),
            R("rate_plus_10", "Rate at T₁ + 10 °C", ""),
        ],
        formula={
            "q10": "pow(rate2/rate1,10/(temp2-temp1))",
            "rate_ratio": "rate2/rate1",
            "rate_plus_10": "rate1*pow(rate2/rate1,10/(temp2-temp1))",
            "rate1": "rate2/pow(q10,(temp2-temp1)/10)",
            "rate2": "rate1*pow(q10,(temp2-temp1)/10)",
            "temp1": "temp2-10*log(rate2/rate1)/log(q10)",
            "temp2": "temp1+10*log(rate2/rate1)/log(q10)",
        },
        prose={
            "why": ("<p>Q10 is the working version of the Arrhenius equation: instead of joules per mole it "
                    "answers the question people actually ask — how much faster is this at body temperature "
                    "than in the fridge? For most biological processes the answer is about two.</p>"),
            "formula_note": ("<p>The exponent rescales whatever temperature interval you used to ten "
                             "degrees. Measure across ten degrees and the exponent is one; measure across "
                             "thirty and the ratio is raised to a third first.</p>"),
            "example_note": ("<p>A rate doubling between 25 °C and 35 °C is Q10 = 2.0 measured directly. "
                             "The same doubling between 25 °C and 45 °C is four-fold over twenty degrees, "
                             "which normalises to a Q10 of 2.0 as well — the square root of four.</p>"),
            "reading": ("<p>A Q10 near 1 means the process ignores temperature, which happens for "
                        "diffusion-limited steps. Between 2 and 3 is ordinary chemistry. Above 4 usually "
                        "means a protein is unfolding or a phase is changing, not that the reaction itself "
                        "is fast.</p>"),
            "scenarios": [
                {"inputs": {"rate1": 5, "temp1": 20, "rate2": 15, "temp2": 30},
                 "note": "A three-fold rise per ten degrees is Q10 = 3, steep but plausible for an "
                         "enzyme."},
                {"inputs": {"rate1": 1, "temp1": 10, "rate2": 4, "temp2": 30},
                 "note": "Four-fold over twenty degrees is Q10 = 2 — the square root, because the "
                         "interval is twice ten degrees."},
            ],
            "pitfalls": [
                "<strong>The interval not divided by ten.</strong> Four-fold over twenty degrees is Q10 = "
                "2, not 4; the exponent of a half does that.",
                "<strong>Kelvin and Celsius mixed.</strong> Q10 is defined on a ten-degree interval, which "
                "is the same size in both scales, but entering 298.15 and 25 makes the interval 273.",
                "<strong>Q10 assumed constant.</strong> It falls as temperature rises, because the "
                "Arrhenius exponent is not linear in T.",
            ],
            "units_note": ("<p>The rates can be in any unit as long as both are the same — Q10 is a pure "
                           "ratio. Temperatures are in Celsius here, since the ten-degree interval is "
                           "defined that way and a kelvin step is the same size.</p>"),
            "limits": [
                "<strong>It is a local approximation.</strong> Over a wide temperature range the "
                "coefficient drifts and a single number misleads.",
                "<strong>It says nothing above the optimum.</strong> Enzymes denature, and the rate falls "
                "rather than rising, which Q10 cannot represent.",
            ],
            "uses": [
                "<li>Comparing a biological rate at two temperatures.</li>",
                "<li>Predicting shelf life or reaction speed at a warmer temperature.</li>",
                "<li>Reducing a measured rate ratio to the standard ten-degree basis.</li>",
            ],
        },
        faq=[
            ("What is a normal Q10?",
             "About 2 for most chemical and biological reactions near room temperature. Values between 1.5 "
             "and 3 cover the ordinary range."),
            ("Why use ten degrees rather than one?",
             "Because a one-degree change is close to measurement noise, while ten degrees gives a ratio "
             "big enough to read reliably."),
        ],
        related=[("/chemistry/arrhenius-equation", "Arrhenius equation"),
                 ("/chemistry/activation-energy", "Activation energy"),
                 ("/chemistry/rate-constant", "Rate constant")],
    ),

    S(
        slug="grahams-law-of-diffusion",
        name="Graham's Law Calculator",
        title="Graham's Law Calculator: Effusion Rate Ratio",
        desc="Compare the effusion rates of two gases from their molar masses, and work out how long the heavier of the two takes to escape through the same pinhole.",
        what=("<p>Graham's law says a gas's effusion rate is inversely proportional to the square root of "
              "its molar mass: <strong>r₁ ÷ r₂ = √(M₂ ÷ M₁)</strong>. Light gases escape faster, by exactly "
              "the square root of the mass ratio.</p>"),
        fields=[
            F("molar_mass_1", "Molar mass of gas 1", "g/mol", 2.016,
              "Hydrogen is 2.016"),
            F("molar_mass_2", "Molar mass of gas 2", "g/mol", 32.0,
              "Oxygen is 32.0"),
            F("time_1", "Time for gas 1 to effuse", "s", 10,
              "Through the same pinhole, at the same temperature and pressure"),
        ],
        results=[
            R("rate_ratio", "Effusion rate ratio r₁/r₂", ""),
            R("time_2", "Time for gas 2 to effuse", "s"),
            R("relative_rate", "Rate of gas 2 relative to gas 1", "%"),
        ],
        formula={
            "rate_ratio": "sqrt(molar_mass_2/molar_mass_1)",
            "time_2": "time_1*sqrt(molar_mass_2/molar_mass_1)",
            "relative_rate": "sqrt(molar_mass_1/molar_mass_2)*100",
            "molar_mass_1": "molar_mass_2/pow(rate_ratio,2)",
            "molar_mass_2": "molar_mass_1*pow(rate_ratio,2)",
            "time_1": "time_2/sqrt(molar_mass_2/molar_mass_1)",
        },
        prose={
            "why": ("<p>Graham's law is the reason uranium enrichment worked: the two isotopes' fluorides "
                    "differ in molar mass by less than one per cent, and the square root of that tiny "
                    "difference is what a cascade of thousands of barriers multiplies into a separation.</p>"),
            "formula_note": ("<p>The square root is what distinguishes effusion from ordinary mixing. At the "
                             "same temperature both gases have the same average kinetic energy, so the "
                             "lighter one must be moving faster — by exactly √(M₂/M₁).</p>"),
            "example_note": ("<p>Hydrogen against oxygen: √(32 ÷ 2.016) = 3.98, so hydrogen escapes four "
                             "times as fast. Ten seconds for hydrogen to pass a pinhole means 39.8 seconds "
                             "for the same amount of oxygen.</p>"),
            "reading": ("<p>The ratio is the thing to quote, not the times. If your measured ratio is far "
                        "from the square root of the masses, the pinhole is too large and you are measuring "
                        "bulk flow rather than effusion.</p>"),
            "scenarios": [
                {"inputs": {"molar_mass_1": 4.0, "molar_mass_2": 44.0, "time_1": 20},
                 "note": "Helium against carbon dioxide: √(44/4) = 3.32, so 20 seconds becomes 66.3."},
                {"inputs": {"molar_mass_1": 28.0, "molar_mass_2": 32.0, "time_1": 30},
                 "note": "Nitrogen and oxygen are close: a ratio of 1.069, so the times differ by only "
                         "seven per cent."},
            ],
            "pitfalls": [
                "<strong>The ratio inverted.</strong> √(M₂/M₁) gives the rate of gas 1 relative to gas 2; "
                "the other way round is the reciprocal, not the same number.",
                "<strong>Density used instead of molar mass.</strong> At the same temperature and pressure "
                "they are proportional, so the ratio survives — but they are not interchangeable at "
                "different conditions.",
                "<strong>The law applied to diffusion in a liquid.</strong> Graham's law is about gas "
                "effusion through a pinhole; diffusion in solution follows different rules.",
            ],
            "units_note": ("<p>Molar masses in grams per mole cancel inside the square root, so the ratio is "
                           "dimensionless. The time comes back in whatever unit the first time used, and "
                           "the relative rate is a percentage.</p>"),
            "limits": [
                "<strong>It assumes ideal gases and a small pinhole.</strong> Wide openings give bulk flow, "
                "where both gases leave together.",
                "<strong>It assumes one gas at a time.</strong> In a mixture, each component effuses at its "
                "own rate and the composition changes as it does.",
            ],
            "uses": [
                "<li>Comparing how fast two gases escape a leak.</li>",
                "<li>Understanding isotope separation by gaseous diffusion.</li>",
                "<li>Estimating a gas's molar mass from two measured effusion times.</li>",
            ],
        },
        faq=[
            ("Why the square root?",
             "Because at the same temperature the average kinetic energy ½mv² is the same for both gases, "
             "so v is proportional to 1/√m. The ratio of speeds is therefore the square root of the inverse "
             "mass ratio."),
            ("Does temperature matter?",
             "It cancels, as long as both gases are at the same temperature. At different temperatures the "
             "ratio picks up a factor of √(T₁/T₂)."),
        ],
        related=[("/chemistry/diffusion-coefficient", "Diffusion coefficient"),
                 ("/chemistry/molar-mass-of-gas", "Molar mass of a gas"),
                 ("/chemistry/partial-pressure", "Partial pressure")],
    ),

    S(
        slug="diffusion-coefficient",
        name="Diffusion Coefficient Calculator",
        title="Diffusion Coefficient Calculator: Stokes-Einstein",
        desc="Use the Stokes-Einstein relation to get a particle's diffusion coefficient from the temperature, the viscosity of the liquid and the particle's radius.",
        what=("<p>The Stokes–Einstein relation links a particle's random walk to the fluid dragging on it: "
              "<strong>D = k<sub>B</sub>T ÷ (6πηr)</strong>. The page reports D in square metres per second, "
              "in square micrometres per second, and the time it takes to diffuse one micrometre.</p>"),
        fields=[
            F("temperature", "Temperature", "K", 298.15,
              "Absolute temperature: 25 °C is 298.15 K"),
            F("viscosity", "Viscosity of the liquid", "mPa·s", 0.89,
              "Water at 25 °C is 0.89 mPa·s, which is 0.89 centipoise"),
            F("radius", "Particle radius", "nm", 5,
              "Hydrodynamic radius; a 10 nm diameter particle has a radius of 5 nm"),
        ],
        results=[
            R("diffusion_coefficient", "Diffusion coefficient D", "m²/s"),
            R("d_um2_s", "Diffusion coefficient", "µm²/s"),
            R("time_one_um", "Time to diffuse 1 µm", "s"),
        ],
        formula={
            "diffusion_coefficient": "0.00000000000000000000001380649*temperature/(6*pi*viscosity*0.001*radius*0.000000001)",
            "d_um2_s": "0.00000000000000000000001380649*temperature/(6*pi*viscosity*0.001*radius*0.000000001)*1000000000000",
            "time_one_um": "2*pow(0.000001,2)/(0.00000000000000000000001380649*temperature/(6*pi*viscosity*0.001*radius*0.000000001))",
            "temperature": "diffusion_coefficient*6*pi*viscosity*0.001*radius*0.000000001/0.00000000000000000000001380649",
            "viscosity": "0.00000000000000000000001380649*temperature/(6*pi*diffusion_coefficient*0.001*radius*0.000000001)",
            "radius": "0.00000000000000000000001380649*temperature/(6*pi*viscosity*0.001*diffusion_coefficient*0.000000001)",
        },
        prose={
            "why": ("<p>D sets the timescale of everything that moves by diffusion rather than by flow: how "
                    "fast a drug reaches a cell, how a protein finds its partner, how long a stain takes to "
                    "spread through a gel. It is the single most useful number in transport at small "
                    "scales.</p>"),
            "formula_note": ("<p>Boltzmann's constant over six pi is the geometry of a sphere in a viscous "
                             "fluid; the rest is the drag. Because the radius sits in the denominator, "
                             "doubling the particle halves D and quadruples the time to cross a given "
                             "distance.</p>"),
            "example_note": ("<p>A 5 nm particle in water at 25 °C: k<sub>B</sub>T is 4.12 × 10⁻²¹ J, the "
                             "drag term 6πηr is 8.39 × 10⁻¹¹ kg/s, and D comes out at 4.91 × 10⁻¹¹ m²/s — "
                             "49 µm²/s. One micrometre takes about 0.04 seconds.</p>"),
            "reading": ("<p>Diffusion time grows as the square of distance. A small molecule crosses a "
                        "micrometre in milliseconds, a cell in seconds, a millimetre in minutes and a "
                        "centimetre in hours — which is why organisms above a certain size need a "
                        "circulatory system.</p>"),
            "scenarios": [
                {"inputs": {"temperature": 310.15, "viscosity": 1.0, "radius": 3},
                 "note": "A 3 nm particle in plasma-like viscosity at body temperature: 7.6 × 10⁻¹¹ m²/s, "
                         "slower than in water because the fluid is thicker."},
                {"inputs": {"temperature": 298.15, "viscosity": 1.0, "radius": 50},
                 "note": "A 50 nm particle diffuses ten times slower than a 5 nm one — 4.9 µm²/s."},
            ],
            "pitfalls": [
                "<strong>Centipoise entered as pascal-seconds.</strong> Water is 0.00089 Pa·s, which is "
                "0.89 mPa·s; the box wants mPa·s, so 0.00089 is three orders out.",
                "<strong>Diameter used as radius.</strong> Halving the number doubles the answer — a factor "
                "of two error that looks small on the page and large in a model.",
                "<strong>The result read as speed.</strong> D has units of area per second; the distance "
                "travelled grows as √t, not linearly.",
            ],
            "units_note": ("<p>Temperature in kelvin, viscosity in millipascal-seconds, radius in "
                           "nanometres. Those units convert to metres, kilograms and seconds inside the "
                           "expression, so the answer is in square metres per second — 4.9 × 10⁻¹¹ for a "
                           "small molecule in water.</p>"),
            "limits": [
                "<strong>Spheres in a continuum.</strong> Real proteins are not spheres, and near a "
                "membrane or a pore the continuum breaks down.",
                "<strong>It ignores charge and interaction.</strong> A charged particle in an electrolyte "
                "experiences a different drag, which is what the Debye length and electrophoresis are "
                "about.",
            ],
            "uses": [
                "<li>Estimating how long a molecule takes to cross a cell.</li>",
                "<li>Finding a particle radius from a measured diffusion coefficient.</li>",
                "<li>Sizing a diffusion-limited reaction's rate.</li>",
            ],
        },
        faq=[
            ("Why does the time go as the square of distance?",
             "Because random motion accumulates: after N steps the distance is only proportional to √N. "
             "Doubling the distance takes four times as long."),
            ("What is the diffusion coefficient of water itself?",
             "About 2.3 × 10⁻⁹ m²/s at 25 °C. A small ion such as sodium is around 1.3 × 10⁻⁹ m²/s."),
        ],
        related=[("/chemistry/grahams-law-of-diffusion", "Graham's law"),
                 ("/chemistry/osmotic-pressure", "Osmotic pressure"),
                 ("/chemistry/activity-coefficient", "Activity coefficient")],
    ),

    S(
        slug="electrolysis",
        name="Electrolysis Calculator",
        title="Electrolysis Calculator: Mass Deposited by Current",
        desc="From the current, the time and the electrons each ion needs, work out how much charge passes through the cell and what mass of metal it therefore deposits.",
        what=("<p>Faraday's laws turn current and time into matter: charge is current × time, and "
              "<strong>mass = (M × I × t) ÷ (n × F)</strong>, where n is the electrons each ion needs and F "
              "is 96 485 coulombs per mole. The page reports the charge, the moles of electrons and the "
              "mass deposited.</p>"),
        fields=[
            F("current", "Current", "A", 1,
              "Amperes, held constant through the run"),
            F("time", "Time", "s", 3600,
              "Seconds; one hour is 3 600"),
            F("molar_mass", "Molar mass of the substance", "g/mol", 63.546,
              "Copper is 63.546"),
            F("electrons", "Electrons per ion", "", 2,
              "Two for Cu²⁺, three for Al³⁺, one for Ag⁺"),
        ],
        results=[
            R("charge", "Charge passed", "C"),
            R("mass", "Mass deposited", "g"),
            R("moles", "Moles deposited", "mol"),
        ],
        formula={
            "charge": "current*time",
            "mass": "molar_mass*current*time/(electrons*96485)",
            "moles": "current*time/(electrons*96485)",
            "current": "mass*electrons*96485/(molar_mass*time)",
            "time": "mass*electrons*96485/(molar_mass*current)",
            "molar_mass": "mass*electrons*96485/(current*time)",
            "electrons": "molar_mass*current*time/(mass*96485)",
        },
        prose={
            "why": ("<p>Electrolysis is the one place where a chemist can count electrons with a stopwatch "
                    "and an ammeter. One mole of electrons is 96 485 coulombs, and that constant is what "
                    "connects the electrical world to the molar one.</p>"),
            "formula_note": ("<p>Dividing the charge by nF gives moles of the substance directly. For a "
                             "metal, that is the mass divided by its molar mass; for a gas, the same "
                             "calculation gives moles of gas, which the ideal gas law then turns into a "
                             "volume.</p>"),
            "example_note": ("<p>One ampere for an hour is 3 600 C, which is 0.01866 mol of electrons. "
                             "Copper takes two electrons per ion, so 0.00933 mol of copper is deposited — "
                             "1.19 g — and the same charge would deposit 4.02 g of silver, more than three times as much, because silver needs a single electron per ion.</p>"),
            "reading": ("<p>Compare the mass you weigh with the mass this page predicts. A shortfall means "
                        "a side reaction: hydrogen evolution on the cathode, oxygen on the anode, or metal "
                        "falling off the electrode as powder.</p>"),
            "scenarios": [
                {"inputs": {"current": 2, "time": 1800, "molar_mass": 107.87, "electrons": 1},
                 "note": "Silver from one electron per ion: 3 600 C deposits 4.02 g, which is why silver "
                         "coulometers are used to measure charge."},
                {"inputs": {"current": 5, "time": 7200, "molar_mass": 26.982, "electrons": 3},
                 "note": "Aluminium at 5 A for two hours: 36 000 C gives 0.124 mol of electrons, so "
                         "3.36 g of metal."},
            ],
            "pitfalls": [
                "<strong>Electrons per ion taken as the charge on the ion.</strong> For Cu²⁺ it is 2, but "
                "for a complex ion or a gas-evolving reaction it is the number actually transferred at "
                "the electrode.",
                "<strong>Current efficiency assumed to be 100 per cent.</strong> In water, part of the "
                "current goes to hydrogen or oxygen evolution and the metal yield falls short.",
                "<strong>Time entered in minutes.</strong> The faraday is defined per second, so all times "
                "must be in seconds.",
            ],
            "units_note": ("<p>Amperes and seconds give coulombs; coulombs divided by 96 485 give moles of "
                           "electrons. The mass is in grams because the molar mass is in grams per mole, "
                           "and the moles deposited is in moles of the substance rather than of electrons.</p>"),
            "limits": [
                "<strong>It assumes 100 % current efficiency.</strong> Real cells lose current to side "
                "reactions, which is what a current-efficiency figure measures.",
                "<strong>It ignores what happens at the other electrode.</strong> The anode reaction must "
                "balance the cathode one, and the cell voltage it needs is a thermodynamic question.",
            ],
            "uses": [
                "<li>Sizing a plating bath's current and time for a target thickness.</li>",
                "<li>Checking the charge a coulometer delivered.</li>",
                "<li>Working out how much hydrogen or chlorine an electrolysis run produces.</li>",
            ],
        },
        faq=[
            ("Why 96 485?",
             "That is Faraday's constant: the charge on one mole of electrons, equal to Avogadro's number "
             "times the elementary charge."),
            ("Does a higher current always mean faster deposition?",
             "Usually, but above a limiting current the extra current goes into side reactions and the "
             "deposit becomes powdery rather than smooth."),
        ],
        related=[("/chemistry/electromotive-force", "Cell EMF"),
                 ("/chemistry/nernst-equation", "Nernst equation"),
                 ("/chemistry/mole", "Mole")],
    ),
    S(
        slug="atom",
        name="Atom Calculator",
        title="Atom Calculator: Protons, Neutrons, Electrons",
        desc="From an atomic number, a mass number and an ionic charge, work out exactly how many protons, neutrons and electrons a particular atom or ion contains.",
        what=("<p>An atom is described by three counts. The atomic number fixes the protons, the mass "
              "number fixes protons plus neutrons, and the charge fixes how many electrons have been "
              "gained or lost: <strong>neutrons = A − Z</strong>, <strong>electrons = Z − charge</strong>.</p>"),
        fields=[
            F("atomic_number", "Atomic number Z", "", 11,
              "Protons in the nucleus; this is what makes the element sodium", bounds=(1, 118)),
            F("mass_number", "Mass number A", "", 23,
              "Protons plus neutrons, rounded to the nearest whole number"),
            F("charge", "Charge of the particle", "", 0,
              "0 for a neutral atom, +1 for a cation, −1 for an anion"),
        ],
        results=[
            R("protons", "Protons", ""),
            R("neutrons", "Neutrons", ""),
            R("electrons", "Electrons", ""),
        ],
        formula={
            "protons": "atomic_number",
            "neutrons": "mass_number-atomic_number",
            "electrons": "atomic_number-charge",
            "atomic_number": "protons",
            "mass_number": "protons+neutrons",
            "charge": "atomic_number-electrons",
        },
        prose={
            "why": ("<p>Nearly every piece of chemistry starts by counting particles: which element, which "
                    "isotope, and how ionised. Three numbers describe any atom or ion, and they are related "
                    "by nothing more than addition and subtraction.</p>"),
            "formula_note": ("<p>The charge term is the one people forget. A magnesium ion written Mg²⁺ has "
                             "twelve protons and ten electrons, not twelve and twelve — the superscript is a "
                             "count of electrons lost, not a decoration.</p>"),
            "example_note": ("<p>Sodium: Z = 11 and A = 23 gives eleven protons, twelve neutrons and, at "
                             "neutral charge, eleven electrons. The same nucleus with a +1 charge is the "
                             "sodium ion, ten electrons and a full second shell.</p>"),
            "reading": ("<p>Check the counts against the periodic table: the proton count is the element, "
                        "the neutron count distinguishes the isotope, and the electron count decides the "
                        "charge. Two atoms with the same Z and different A are isotopes of one another.</p>"),
            "scenarios": [
                {"inputs": {"atomic_number": 8, "mass_number": 18, "charge": -2},
                 "note": "Oxygen-18 as the oxide ion: eight protons, ten neutrons, ten electrons."},
                {"inputs": {"atomic_number": 26, "mass_number": 56, "charge": 3},
                 "note": "Iron-56 as Fe³⁺: twenty-six protons, thirty neutrons, twenty-three electrons."},
            ],
            "pitfalls": [
                "<strong>The charge added instead of subtracted.</strong> A +2 ion has two electrons "
                "fewer, so electrons = Z − charge, and getting the sign backwards makes a cation look "
                "like an anion.",
                "<strong>Mass number read as atomic mass.</strong> 35.45 is chlorine's average atomic mass; "
                "the mass number of one isotope is a whole number such as 35.",
                "<strong>Neutrons from the atomic mass.</strong> Use the mass number, not the weighted "
                "average, or the neutron count comes out fractional.",
            ],
            "units_note": ("<p>All three results are counts with no unit. The charge is entered as a plain "
                           "number — 1 for a singly charged cation, −1 for a singly charged anion — not as "
                           "a superscript.</p>"),
            "limits": [
                "<strong>Ground-state atoms only.</strong> The electron count is the total, not the number "
                "in the valence shell, which needs the electron configuration.",
                "<strong>It says nothing about isotopes' stability.</strong> The counts are arithmetic; "
                "whether the nucleus holds together is nuclear physics.",
            ],
            "uses": [
                "<li>Working out the electron count of an ion.</li>",
                "<li>Checking an isotope's neutron number.</li>",
                "<li>Converting between isotope notation and particle counts.</li>",
            ],
        },
        faq=[
            ("How many electrons does Ca²⁺ have?",
             "Twenty protons minus two is eighteen electrons. The same count as argon, which is why calcium "
             "loses two electrons so readily."),
            ("What is the difference between mass number and atomic mass?",
             "Mass number is a whole-number count of protons and neutrons in one isotope. Atomic mass is "
             "the weighted average over all the isotopes, which is why it has decimals."),
        ],
        related=[("/chemistry/atomic-mass", "Atomic mass"),
                 ("/chemistry/average-atomic-mass", "Average atomic mass"),
                 ("/chemistry/effective-charge", "Effective nuclear charge")],
    ),

    S(
        slug="atomic-mass",
        name="Atomic Mass Calculator",
        title="Atomic Mass Calculator: Mass of a Single Atom",
        desc="Convert an atomic mass in unified atomic units into the grams and kilograms that a single atom of it weighs, and find how many atoms go to make up one gram.",
        what=("<p>One atomic mass unit is 1.6605 × 10⁻²⁴ grams, so a single atom's mass is "
              "<strong>m = Ar × 1.6605 × 10⁻²⁴ g</strong>. The page reports the mass of the atoms you specify "
              "in grams and kilograms, and how many atoms go into a gram.</p>"),
        fields=[
            F("atomic_mass", "Atomic mass", "u", 55.845,
              "From the periodic table; iron is 55.845"),
            F("atoms", "Number of atoms", "", 1,
              "Set to 1 for the mass of a single atom"),
        ],
        results=[
            R("mass_g", "Mass", "g"),
            R("mass_kg", "Mass", "kg"),
            R("atoms_per_gram", "Atoms in one gram", ""),
        ],
        formula={
            "mass_g": "atomic_mass*atoms*1.6605390666/1000000000000000000000000",
            "mass_kg": "atomic_mass*atoms*1.6605390666/1000000000000000000000000/1000",
            "atoms_per_gram": "1000000000000000000000000/(atomic_mass*1.6605390666)",
            "atomic_mass": "mass_g/atoms*1000000000000000000000000/1.6605390666",
            "atoms": "mass_g/atomic_mass*1000000000000000000000000/1.6605390666",
        },
        prose={
            "why": ("<p>The mass of one atom is not a number anybody can measure directly; it comes from the "
                    "molar mass, which is measurable. The conversion between the two is Avogadro's number, "
                    "which is what the 1.6605 × 10⁻²⁴ g constant really is — one gram divided by "
                    "6.022 × 10²³.</p>"),
            "formula_note": ("<p>The atomic mass unit and the molar mass are numerically identical: an atom "
                             "of iron weighs 55.845 u and a mole of iron weighs 55.845 g. That equality is "
                             "the whole reason the mole exists.</p>"),
            "example_note": ("<p>One iron atom: 55.845 × 1.6605 × 10⁻²⁴ g is 9.27 × 10⁻²³ g, or "
                             "9.27 × 10⁻²⁶ kg. And a gram of iron holds 1.08 × 10²² atoms — ten thousand "
                             "billion billion of them.</p>"),
            "reading": ("<p>Sanity-check with the inverse: about 10²² atoms per gram for anything of ordinary "
                        "atomic mass. A gram of hydrogen, at atomic mass 1.008, holds six times as many "
                        "atoms as a gram of iron, because each one is fifty-five times lighter.</p>"),
            "scenarios": [
                {"inputs": {"atomic_mass": 1.008, "atoms": 1},
                 "note": "One hydrogen atom is 1.674 × 10⁻²⁴ g — slightly more than a proton, because of "
                         "the electron and the binding energy."},
                {"inputs": {"atomic_mass": 12.011, "atoms": 1000},
                 "note": "A thousand carbon atoms weigh 1.994 × 10⁻²⁰ g, still far below a picogram."},
            ],
            "pitfalls": [
                "<strong>Atomic mass and mass number confused.</strong> 55.845 is the weighted average; a "
                "single iron-56 atom weighs 56 u, not 55.845.",
                "<strong>Grams and kilograms mixed.</strong> The two results differ by a thousand, and a "
                "molecular model built from the wrong one is off by three orders of magnitude.",
                "<strong>The electron mass ignored.</strong> For most purposes the atom's mass is the "
                "nucleus's; the electrons contribute about one part in four thousand.",
            ],
            "units_note": ("<p>The atomic mass is in unified atomic mass units, which are dimensionless "
                           "scales of one twelfth of a carbon-12 atom. The outputs are in grams and "
                           "kilograms, and the atom count is a plain number.</p>"),
            "limits": [
                "<strong>Average atomic mass, not isotope mass.</strong> A sample of an element is a "
                "mixture, and this page uses the average unless you enter a single isotope's mass.",
                "<strong>It ignores relativistic and binding effects.</strong> These matter at the parts "
                "per million level, far below anything a chemistry calculation needs.",
            ],
            "uses": [
                "<li>Finding the mass of a single atom or molecule.</li>",
                "<li>Working out how many atoms a weighed sample contains.</li>",
                "<li>Seeing why a mole of anything weighs its atomic mass in grams.</li>",
            ],
        },
        faq=[
            ("Why is one atomic mass unit 1.6605 × 10⁻²⁴ g?",
             "Because it is defined as one twelfth of a carbon-12 atom, and a mole of carbon-12 weighs "
             "12 g. Dividing 12 g by twelve and then by Avogadro's number gives that constant."),
            ("Does the mass of an atom include its electrons?",
             "Yes, but they contribute little: a carbon atom's six electrons add about 0.03 % to the mass "
             "of its nucleus."),
        ],
        related=[("/chemistry/atom", "Atom"),
                 ("/chemistry/average-atomic-mass", "Average atomic mass"),
                 ("/chemistry/mole", "Mole")],
    ),

    S(
        slug="bond-order",
        name="Bond Order Calculator",
        title="Bond Order Calculator: Bonding and Antibonding",
        desc="Work out a bond order from a molecule's molecular orbital electron counts, and see the total valence electrons and the net bonding surplus behind the answer.",
        what=("<p>Bond order is the net number of bonding pairs: "
              "<strong>bond order = (bonding − antibonding) ÷ 2</strong>. An antibonding electron cancels "
              "one bonding electron, so filling an antibonding orbital weakens the bond instead of "
              "strengthening it.</p>"),
        fields=[
            F("bonding_e", "Electrons in bonding orbitals", "", 8,
              "Total across all the bonding molecular orbitals that are filled", bounds=(0, 30)),
            F("antibonding_e", "Electrons in antibonding orbitals", "", 2,
              "Total across all the antibonding orbitals that are filled", bounds=(0, 30)),
        ],
        results=[
            R("bond_order", "Bond order", ""),
            R("total_electrons", "Total valence electrons counted", ""),
            R("net_bonding", "Net bonding electrons", ""),
        ],
        formula={
            "bond_order": "(bonding_e-antibonding_e)/2",
            "total_electrons": "bonding_e+antibonding_e",
            "net_bonding": "bonding_e-antibonding_e",
            "bonding_e": "net_bonding+antibonding_e",
            "antibonding_e": "bonding_e-net_bonding",
        },
        prose={
            "why": ("<p>Bond order predicts bond length, bond strength and whether the molecule is stable at "
                    "all. Oxygen's bond order of two and nitrogen's of three are exactly why nitrogen is "
                    "inert and oxygen is not, and the same arithmetic explains why O₂ is magnetic.</p>"),
            "formula_note": ("<p>Only electrons in the valence molecular orbitals count. For a second-row "
                             "diatomic, the eight bonding electrons fill σ and π levels and the antibonding "
                             "ones sit above them; the difference divided by two is the bond order, which "
                             "can be a half when a single antibonding electron is present.</p>"),
            "example_note": ("<p>Eight bonding and two antibonding is a bond order of three, which is "
                             "nitrogen: a triple bond, 110 pm long and 945 kJ/mol strong. Remove one "
                             "bonding electron and the order falls to 2.5, which is why N₂⁺ has a longer "
                             "bond than N₂.</p>"),
            "reading": ("<p>An order of zero means the molecule does not survive: Be₂ with four bonding and "
                        "four antibonding electrons is held together by nothing but dispersion forces. Half "
                        "and quarter orders are real, and they show up as fractional bond lengths.</p>"),
            "scenarios": [
                {"inputs": {"bonding_e": 8, "antibonding_e": 4},
                 "note": "Eight and four is a bond order of two — oxygen, with two unpaired electrons in "
                         "the antibonding π* orbitals."},
                {"inputs": {"bonding_e": 10, "antibonding_e": 4},
                 "note": "Ten bonding is a triple bond: six net bonding electrons over two gives three, "
                         "which is carbon monoxide."},
            ],
            "pitfalls": [
                "<strong>Antibonding electrons added instead of subtracted.</strong> They weaken the bond; "
                "adding them makes every molecule look stronger than it is.",
                "<strong>Core electrons counted.</strong> Only the valence molecular orbitals matter — the "
                "1s electrons stay in their atomic orbitals.",
                "<strong>Bond order read as the number of bonds drawn.</strong> A Lewis structure with a "
                "double bond is a picture; the molecular orbital calculation can say 2.5.",
            ],
            "units_note": ("<p>All three results are plain counts or ratios and carry no unit. The bond "
                           "order is dimensionless and can be fractional, which is not an error.</p>"),
            "limits": [
                "<strong>It assumes a simple molecular orbital diagram.</strong> Transition metals, with "
                "their d orbitals, need a different filling order and often a different answer.",
                "<strong>It is not a bond strength.</strong> Bond order correlates with strength within a "
                "series, but energy is a separate calculation.",
            ],
            "uses": [
                "<li>Predicting whether a diatomic molecule is stable.</li>",
                "<li>Explaining bond lengths across a series such as O₂⁺, O₂ and O₂⁻.</li>",
                "<li>Checking an MO diagram's electron count.</li>",
            ],
        },
        faq=[
            ("Can a bond order be a fraction?",
             "Yes. H₂⁺, with one bonding electron and none antibonding, has a bond order of 0.5 and a real, "
             "weak bond. Fractional orders are normal in molecular orbital theory."),
            ("Why does O₂ have a bond order of 2 and two unpaired electrons?",
             "Its last two electrons occupy separate π* orbitals, so it loses one bonding pair and is a "
             "diradical — which is why liquid oxygen sticks to a magnet."),
        ],
        related=[("/chemistry/atom", "Atom"),
                 ("/chemistry/atomic-mass", "Atomic mass"),
                 ("/chemistry/percent-ionic-character", "Percent ionic character")],
    ),

    S(
        slug="electronegativity",
        name="Mulliken Electronegativity Calculator",
        title="Mulliken Electronegativity Calculator: From IE and EA",
        desc="Work out an element's Mulliken electronegativity from its first ionisation energy and its electron affinity, and see where that puts it next to hydrogen.",
        what=("<p>Mulliken's definition splits the difference between holding an electron and taking one: "
              "<strong>χ = (IE + EA) ÷ 2</strong>. The page reports χ in electronvolts, the gap between the "
              "two energies, and how far the element sits from hydrogen's 2.20 eV.</p>"),
        fields=[
            F("ionization_energy", "First ionisation energy", "eV", 5.14,
              "Energy to remove one electron; sodium is 5.14 eV"),
            F("electron_affinity", "Electron affinity", "eV", 0.55,
              "Energy released on gaining one electron; sodium is 0.55 eV"),
        ],
        results=[
            R("electronegativity", "Mulliken electronegativity", "eV"),
            R("energy_gap", "Ionisation energy minus affinity", "eV"),
            R("vs_hydrogen", "Difference from hydrogen (7.18 eV)", "eV"),
        ],
        formula={
            "electronegativity": "(ionization_energy+electron_affinity)/2",
            "energy_gap": "ionization_energy-electron_affinity",
            "vs_hydrogen": "(ionization_energy+electron_affinity)/2-7.18",
            "ionization_energy": "2*electronegativity-electron_affinity",
            "electron_affinity": "2*electronegativity-ionization_energy",
        },
        prose={
            "why": ("<p>Electronegativity decides which way a bond polarises, and Mulliken's version is the "
                    "one with a physical meaning you can state in a sentence: it is the average of how hard "
                    "the atom holds its own electron and how much it wants another.</p>"),
            "formula_note": ("<p>Both energies are positive quantities here — ionisation energy is what you "
                             "pay, electron affinity is what you get back — so the average sits between "
                             "them. Mulliken's original scale is in electronvolts; Pauling's is a "
                             "relative scale anchored on hydrogen, and the two are related by a linear "
                             "conversion.</p>"),
            "example_note": ("<p>Sodium: 5.14 eV to remove an electron and 0.55 eV returned on gaining one, "
                             "giving χ = 2.85 eV — well below hydrogen's 7.18 eV on the same scale, which "
                             "is what makes sodium the electropositive partner in every bond it forms. "
                             "Chlorine, at 12.97 and 3.61 eV, comes out at 8.29 eV.</p>"),
            "reading": ("<p>Large χ means the atom pulls electrons towards itself; small χ means it gives "
                        "them up. Sodium at 2.85 eV and chlorine at 8.29 eV are 5.4 eV apart, which is "
                        "why sodium chloride is ionic — the percent ionic character page turns that gap "
                        "into a number.</p>"),
            "scenarios": [
                {"inputs": {"ionization_energy": 13.598, "electron_affinity": 0.754},
                 "note": "Hydrogen: χ = 7.18 eV — the reference point the third result measures against."},
                {"inputs": {"ionization_energy": 12.967, "electron_affinity": 3.613},
                 "note": "Chlorine: χ = 8.29 eV, among the highest of any element."},
            ],
            "pitfalls": [
                "<strong>Electron affinity's sign taken as negative.</strong> The energy released on gaining "
                "an electron is quoted as positive here; entering it as a negative number halves the "
                "electronegativity wrongly.",
                "<strong>It compared directly with Pauling numbers.</strong> A Mulliken value in "
                "electronvolts and a Pauling value on a 0.7–4 scale are different scales; do not mix them.",
                "<strong>Second ionisation energy used.</strong> Mulliken's χ takes the first, because a "
                "bond involves the outermost electron.",
            ],
            "units_note": ("<p>Both inputs are in electronvolts and the results are too. One electronvolt is "
                           "96.5 kJ/mol, which is the conversion to use if the ionisation energy came from "
                           "a table in kilojoules per mole.</p>"),
            "limits": [
                "<strong>Mulliken is a gas-phase measure.</strong> In a solid or a solution, the energies "
                "shift and the electronegativity with them.",
                "<strong>It is one number for a many-electron atom.</strong> An atom's effective "
                "electronegativity depends on what it is bonded to.",
            ],
            "uses": [
                "<li>Predicting the direction of bond polarisation.</li>",
                "<li>Converting ionisation energies into an electronegativity scale.</li>",
                "<li>Comparing an element's electron-holding and electron-taking tendencies.</li>",
            ],
        },
        faq=[
            ("How does Mulliken's scale relate to Pauling's?",
             "They are linearly related: Pauling values can be approximated from Mulliken electronvolt "
             "values by a straight-line conversion, and the two orderings agree across the periodic "
             "table."),
            ("Why average the two energies?",
             "Because the two extremes of a bond are complete electron loss and complete electron gain. Half "
             "way between them is a fair measure of how the atom behaves when it is sharing."),
        ],
        related=[("/chemistry/percent-ionic-character", "Percent ionic character"),
                 ("/chemistry/effective-charge", "Effective nuclear charge"),
                 ("/chemistry/atom", "Atom")],
    ),

    S(
        slug="lattice-energy",
        name="Lattice Energy Calculator",
        title="Lattice Energy Calculator: Kapustinskii Equation",
        desc="Estimate a salt's lattice energy from its ion charges, its formula-unit ion count and the two ionic radii, using the Kapustinskii equation in picometres.",
        what=("<p>Kapustinskii's equation estimates lattice energy from nothing but charges and radii: "
              "<strong>U = 120 250 · ν · z₊·z₋ ÷ r · (1 − 34.5 ÷ r)</strong>, with r the sum of the radii in "
              "picometres. It has no structural input at all, which is what makes it useful.</p>"),
        fields=[
            F("charge_cation", "Charge of the cation", "", 1,
              "Magnitude only: 1 for Na⁺, 2 for Ca²⁺", bounds=(1, 4)),
            F("charge_anion", "Charge of the anion", "", 1,
              "Magnitude only: 1 for Cl⁻, 2 for O²⁻", bounds=(1, 4)),
            F("ions", "Ions per formula unit", "", 2,
              "Two for NaCl, three for CaCl₂", bounds=(2, 8)),
            F("radius_cation", "Radius of the cation", "pm", 102,
              "Sodium is 102 pm", bounds=(30, 250)),
            F("radius_anion", "Radius of the anion", "pm", 181,
              "Chloride is 181 pm", bounds=(50, 300)),
        ],
        results=[
            R("lattice_energy", "Lattice energy", "kJ/mol"),
            R("distance", "Internuclear distance", "pm"),
            R("energy_per_ion", "Lattice energy per ion", "kJ/mol"),
        ],
        formula={
            "distance": "radius_cation+radius_anion",
            "lattice_energy": "120250*ions*charge_cation*charge_anion/(radius_cation+radius_anion)*(1-34.5/(radius_cation+radius_anion))",
            "energy_per_ion": "120250*ions*charge_cation*charge_anion/(radius_cation+radius_anion)*(1-34.5/(radius_cation+radius_anion))/ions",
            "charge_cation": "lattice_energy/(120250*ions*charge_anion/(radius_cation+radius_anion)*(1-34.5/(radius_cation+radius_anion)))",
            "charge_anion": "lattice_energy/(120250*ions*charge_cation/(radius_cation+radius_anion)*(1-34.5/(radius_cation+radius_anion)))",
            "ions": "lattice_energy/(120250*charge_cation*charge_anion/(radius_cation+radius_anion)*(1-34.5/(radius_cation+radius_anion)))",
        },
        prose={
            "why": ("<p>Lattice energy is what holds an ionic solid together, and it predicts melting points, "
                    "solubility and hardness better than any other single number. Measuring it needs a "
                    "Born–Haber cycle; estimating it needs only this equation.</p>"),
            "formula_note": ("<p>The first factor counts the electrostatic attraction — charge products and "
                             "ion count over distance — and the bracket in 34.5/r corrects for the repulsion "
                             "of the electron clouds as they touch. That bracket is why the energy does not "
                             "rise quite as fast as 1/r suggests.</p>"),
            "example_note": ("<p>Sodium chloride: one and one charges, two ions, and a 283 pm separation. "
                             "The first factor is 850 kJ/mol and the bracket brings it to 746 — close to the "
                             "Born–Haber value of 787, and about as good as an equation with no structure "
                             "in it gets.</p>"),
            "reading": ("<p>Doubling a charge quadruples the energy: magnesium oxide, with 2+ and 2−, is "
                        "about five times sodium chloride's lattice energy and melts at 2 852 °C rather "
                        "than 801 °C. Shrinking the ions does the same thing, less dramatically.</p>"),
            "scenarios": [
                {"inputs": {"charge_cation": 2, "charge_anion": 2, "ions": 2, "radius_cation": 72,
                            "radius_anion": 140},
                 "note": "Magnesium oxide: 3 799 kJ/mol, which is why it is refractory enough for furnace "
                         "linings."},
                {"inputs": {"charge_cation": 1, "charge_anion": 1, "ions": 2, "radius_cation": 138,
                            "radius_anion": 181},
                 "note": "Potassium chloride, with the larger cation: 672 kJ/mol against sodium chloride's "
                         "746."},
            ],
            "pitfalls": [
                "<strong>Signed charges entered.</strong> The equation takes magnitudes; a −1 for the anion "
                "makes the lattice energy negative, which no ionic solid has.",
                "<strong>Ions per formula unit miscounted.</strong> CaCl₂ has three, not two, and the "
                "energy scales directly with it.",
                "<strong>Radii in the wrong units.</strong> The 34.5 constant assumes picometres. Nanometres "
                "or angstroms give an answer that looks plausible and is wrong by a factor of ten.",
            ],
            "units_note": ("<p>Radii in picometres and charges as plain numbers give kilojoules per mole, "
                           "because 120 250 carries the 1/(4πε₀) and the Avogadro factor together. The "
                           "internuclear distance comes back in picometres.</p>"),
            "limits": [
                "<strong>It ignores structure.</strong> Kapustinskii's equation has no idea whether the "
                "salt is rock salt, caesium chloride or something else, and the real values differ by a "
                "few per cent because of it.",
                "<strong>It needs ionic radii.</strong> Those are themselves estimated, and the answer "
                "inherits their uncertainty.",
            ],
            "uses": [
                "<li>Ranking salts by melting point before measuring one.</li>",
                "<li>Estimating a lattice energy when a Born–Haber cycle has missing data.</li>",
                "<li>Showing why 2+ / 2− salts are so refractory.</li>",
            ],
        },
        faq=[
            ("Why does the equation not need the crystal structure?",
             "Because Kapustinskii showed the Madelung constant divided by the ion count is nearly the same "
             "for every structure type — so a formula that ignores structure still lands within a few per "
             "cent."),
            ("Why is my answer smaller than the data book?",
             "The book value is usually the Born–Haber value, which is exact for that structure. "
             "Kapustinskii is an estimate, typically within about five per cent."),
        ],
        related=[("/chemistry/percent-ionic-character", "Percent ionic character"),
                 ("/chemistry/effective-charge", "Effective nuclear charge"),
                 ("/chemistry/cubic-cell", "Cubic cell")],
    ),
    S(
        slug="effective-charge",
        name="Effective Nuclear Charge Calculator",
        title="Effective Nuclear Charge Calculator: Slater",
        desc="Turn an atomic number and a shielding constant into the effective nuclear charge an outer electron feels, and into the orbital energy it then implies.",
        what=("<p>Inner electrons screen the nucleus, so an outer electron feels less than the full charge: "
              "<strong>Z<sub>eff</sub> = Z − σ</strong>. The page reports Z<sub>eff</sub>, the hydrogen-like "
              "energy of the orbital and the ionisation energy it predicts.</p>"),
        fields=[
            F("atomic_number", "Atomic number Z", "", 11,
              "Protons in the nucleus", bounds=(1, 118)),
            F("shielding", "Shielding constant σ", " ", 8.8,
              "From Slater's rules; 8.8 for sodium's 3s electron", bounds=(0, 118)),
            F("principal_n", "Principal quantum number n", "", 3,
              "3 for the 3s electron of sodium", bounds=(1, 7)),
        ],
        results=[
            R("effective_charge", "Effective nuclear charge", ""),
            R("orbital_energy", "Orbital energy", "eV"),
            R("ionization_energy", "Ionisation energy it predicts", "eV"),
        ],
        formula={
            "effective_charge": "atomic_number-shielding",
            "orbital_energy": "-13.6*pow(atomic_number-shielding,2)/pow(principal_n,2)",
            "ionization_energy": "13.6*pow(atomic_number-shielding,2)/pow(principal_n,2)",
            "atomic_number": "effective_charge+shielding",
            "shielding": "atomic_number-effective_charge",
        },
        prose={
            "why": ("<p>Why does sodium lose its outer electron so much more easily than neon holds its "
                    "own? Both have the same number of electrons in the second shell. The answer is that "
                    "sodium's eleventh proton is barely screened, while neon's tenth is not screened at "
                    "all — and that difference is what Z<sub>eff</sub> measures.</p>"),
            "formula_note": ("<p>Slater's rules assign 0.35 of shielding to each electron in the same shell, "
                             "0.85 to each in the shell below and a full 1.00 to everything further in. For "
                             "sodium's 3s electron that is 8 × 0.85 + 2 × 1.00 = 8.8, leaving Z<sub>eff</sub> "
                             "= 2.2 out of a nuclear charge of 11.</p>"),
            "example_note": ("<p>Sodium: 11 − 8.8 = 2.2, which is the effective charge its outer electron "
                             "feels. The hydrogen-like orbital energy is −13.6 × 2.2² ÷ 3² = −7.31 eV, and "
                             "the ionisation energy it predicts, 7.31 eV, is close to the measured 5.14 — "
                             "a good estimate from an arithmetic rule.</p>"),
            "reading": ("<p>Compare Z<sub>eff</sub> across a period: it rises from about 2.2 at sodium to "
                        "nearly 6 at chlorine, which is why ionisation energy and electronegativity both "
                        "increase to the right, and why atomic radius falls.</p>"),
            "scenarios": [
                {"inputs": {"atomic_number": 3, "shielding": 1.7, "principal_n": 2},
                 "note": "Lithium's 2s electron: Z_eff 1.3 and an orbital energy of −5.75 eV, close to its "
                         "measured 5.39 eV ionisation energy."},
                {"inputs": {"atomic_number": 17, "shielding": 10.9, "principal_n": 3},
                 "note": "Chlorine: Z_eff 6.1, which is nearly three times sodium's — the same shell, a "
                         "much tighter hold."},
            ],
            "pitfalls": [
                "<strong>Full electron count used as σ.</strong> Shielding only counts electrons closer to "
                "the nucleus than the one you are asking about, weighted by Slater's coefficients.",
                "<strong>Z<sub>eff</sub> read as the nuclear charge.</strong> It is what the electron "
                "feels, and it is always smaller than Z for an outer electron.",
                "<strong>The hydrogen-like energy taken literally.</strong> That formula is exact only for "
                "one electron; the estimate here is a first approximation.",
            ],
            "units_note": ("<p>Z and σ are plain counts and the result is too. The energies are in "
                           "electronvolts, because the 13.6 eV Rydberg constant is what the hydrogen-like "
                           "expression is built on.</p>"),
            "limits": [
                "<strong>Slater's rules are approximate.</strong> They were fitted to the elements known in "
                "1930 and are poorest for transition metals and for f-block elements.",
                "<strong>It is one number for one electron.</strong> Different electrons in the same atom "
                "feel different effective charges, which is why each needs its own shielding constant.",
            ],
            "uses": [
                "<li>Estimating an ionisation energy without a data table.</li>",
                "<li>Explaining the trend in atomic radius across a period.</li>",
                "<li>Finding the shielding constant a measured ionisation energy implies.</li>",
            ],
        },
        faq=[
            ("Why is sodium's effective charge only 2.2 when it has 11 protons?",
             "Because ten inner electrons screen almost all of that charge. The outer electron feels roughly "
             "two units, which is why sodium ionises so easily."),
            ("Can I get Z_eff from an ionisation energy?",
             "Yes — rearrange the orbital energy relation: Z_eff = n × √(IE ÷ 13.6). The page's ionisation "
             "result is the same calculation the other way round."),
        ],
        related=[("/chemistry/electronegativity", "Electronegativity"),
                 ("/chemistry/atom", "Atom"),
                 ("/chemistry/lattice-energy", "Lattice energy")],
    ),

    S(
        slug="percent-ionic-character",
        name="Percent Ionic Character Calculator",
        title="Percent Ionic Character Calculator: Pauling",
        desc="Turn a difference in electronegativity into the percentage of ionic character a bond carries, using Pauling's exponential relation and its covalent remainder.",
        what=("<p>Pauling's relation converts an electronegativity difference into a share of ionic "
              "character: <strong>% ionic = (1 − e<sup>−0.25 Δχ²</sup>) × 100</strong>. A difference of zero "
              "gives a pure covalent bond; a difference of two gives about 63 per cent ionic.</p>"),
        fields=[
            F("delta_en", "Electronegativity difference Δχ", "", 0.96,
              "H–Cl is 0.96 on the Pauling scale", bounds=(0.0, 3.0)),
        ],
        results=[
            R("percent_ionic", "Ionic character", "%"),
            R("percent_covalent", "Covalent character", "%"),
            R("ionic_fraction", "Ionic character as a fraction", ""),
        ],
        formula={
            "percent_ionic": "(1-exp(-0.25*pow(delta_en,2)))*100",
            "percent_covalent": "(exp(-0.25*pow(delta_en,2)))*100",
            "ionic_fraction": "1-exp(-0.25*pow(delta_en,2))",
            "delta_en": "sqrt(-4*log(1-ionic_fraction))",
        },
        prose={
            "why": ("<p>The bond between two different atoms is never purely ionic or purely covalent. "
                    "Pauling's relation gives a number to that in-between-ness, and it is the first "
                    "quantitative thing most courses say about bond polarity.</p>"),
            "formula_note": ("<p>The exponent is quadratic in the difference, so the ionic share grows "
                             "quickly at small differences and then flattens: it approaches 100 per cent "
                             "without ever reaching it. A difference of 1.7 is the conventional dividing "
                             "line where a bond is called ionic rather than polar covalent.</p>"),
            "example_note": ("<p>Hydrogen chloride, Δχ = 0.96: the exponent is −0.23, so 20.6 per cent ionic "
                             "and 79.4 per cent covalent. Sodium chloride, at Δχ = 2.1, is 66.8 per cent "
                             "ionic — ionic by any naming convention, but still not purely so.</p>"),
            "reading": ("<p>Read the percentage as a description rather than a measurement: a bond with 40 "
                        "per cent ionic character is polar-covalent and behaves like neither limiting case. "
                        "The number's real use is comparing similar bonds, where the ordering is reliable.</p>"),
            "scenarios": [
                {"inputs": {"delta_en": 0.4},
                 "note": "A small difference — carbon and hydrogen — leaves only 3.9 per cent ionic "
                         "character, which is why methane is treated as covalent."},
                {"inputs": {"delta_en": 2.1},
                 "note": "Sodium chloride at 2.1 is 66.8 per cent ionic, and the 33 per cent of covalent "
                         "character is why it is not a perfect ionic model."},
            ],
            "pitfalls": [
                "<strong>The percentage read as a bond order.</strong> It is a share of ionic bonding, not "
                "a number of bonds; a value of 20 does not mean a fifth of a bond.",
                "<strong>Δχ taken from the wrong scale.</strong> Pauling differences only; a Mulliken "
                "difference in electronvolts fed into this expression gives a nonsense answer.",
                "<strong>Ionic character read as reactivity.</strong> Two bonds with the same percentage "
                "differ enormously in strength, and the percentage says nothing about that.",
            ],
            "units_note": ("<p>Δχ is dimensionless on the Pauling scale and the percentage carries no unit "
                           "either. The third result is that same share written as a fraction between zero "
                           "and one.</p>"),
            "limits": [
                "<strong>It is empirical.</strong> The 0.25 was fitted to dipole moments, and the relation "
                "is a good summary rather than a derivation.",
                "<strong>It fails for very different atoms.</strong> Bonds with large differences often "
                "have substantial covalent character anyway, which the formula cannot see.",
            ],
            "uses": [
                "<li>Classifying a bond as ionic, polar covalent or covalent.</li>",
                "<li>Comparing the polarity of two similar bonds.</li>",
                "<li>Estimating a dipole moment's ionic contribution.</li>",
            ],
        },
        faq=[
            ("What electronegativity difference makes a bond ionic?",
             "Conventionally 1.7 or more, which this relation puts at about 51 per cent ionic character. "
             "The line is arbitrary but widely used."),
            ("Can a bond be 100 per cent ionic?",
             "Not in this model. The exponential approaches 100 per cent as the difference grows but never "
             "arrives."),
        ],
        related=[("/chemistry/electronegativity", "Electronegativity"),
                 ("/chemistry/lattice-energy", "Lattice energy"),
                 ("/chemistry/effective-charge", "Effective nuclear charge")],
    ),

    S(
        slug="double-bond-equivalent",
        name="Double Bond Equivalent Calculator",
        title="Double Bond Equivalent Calculator: From Formula",
        desc="Get the number of rings and pi bonds a molecular formula allows, from its carbon, hydrogen, nitrogen and halogen counts in a single line of arithmetic.",
        what=("<p>The double bond equivalent counts rings plus pi bonds: "
              "<strong>DBE = (2C + 2 + N − H − X) ÷ 2</strong>. Oxygen and sulfur are ignored because they "
              "are divalent, so they do not change the hydrogen count a saturated molecule would have.</p>"),
        fields=[
            F("carbon", "Carbon atoms", "", 6, "C in the formula", bounds=(0, 60)),
            F("hydrogen", "Hydrogen atoms", "", 6, "H in the formula", bounds=(0, 100)),
            F("nitrogen", "Nitrogen atoms", "", 0, "N in the formula", bounds=(0, 20)),
            F("halogen", "Halogen atoms", "", 0, "F, Cl, Br or I, counted together", bounds=(0, 20)),
        ],
        results=[
            R("dbe", "Double bond equivalents", ""),
            R("max_hydrogen", "Hydrogens if fully saturated", ""),
            R("hydrogen_deficit", "Hydrogens missing", ""),
        ],
        formula={
            "dbe": "(2*carbon+2+nitrogen-hydrogen-halogen)/2",
            "max_hydrogen": "2*carbon+2+nitrogen-halogen",
            "hydrogen_deficit": "2*carbon+2+nitrogen-halogen-hydrogen",
            "carbon": "(2*dbe-2-nitrogen+hydrogen+halogen)/2",
            "hydrogen": "2*carbon+2+nitrogen-halogen-2*dbe",
            "nitrogen": "2*dbe-2*carbon-2+hydrogen+halogen",
            "halogen": "2*carbon+2+nitrogen-hydrogen-2*dbe",
        },
        prose={
            "why": ("<p>A molecular formula from a mass spectrometer is only half the answer: dozens of "
                    "structures share one. The double bond equivalent is the first constraint, because it "
                    "says how many rings and multiple bonds the structure must contain before any of them "
                    "are drawn.</p>"),
            "formula_note": ("<p>Each ring or pi bond removes two hydrogens from the saturated count, which "
                             "is why the deficit is divided by two. Nitrogen adds one hydrogen to the "
                             "saturated formula and each halogen replaces one, so they enter with opposite "
                             "signs.</p>"),
            "example_note": ("<p>Benzene, C₆H₆: the saturated alkane would be C₆H₁₄, so eight hydrogens are "
                             "missing and the DBE is four — three double bonds and one ring, exactly as "
                             "drawn.</p>"),
            "reading": ("<p>A DBE of zero means a saturated, ring-free molecule. Four suggests an aromatic "
                        "ring, and five or more suggests a second ring or a carbonyl alongside it. A "
                        "negative value means the formula is impossible: too many hydrogens for that many "
                        "carbons.</p>"),
            "scenarios": [
                {"inputs": {"carbon": 6, "hydrogen": 12, "nitrogen": 0, "halogen": 0},
                 "note": "Cyclohexane, C₆H₁₂: one DBE, which must be the ring."},
                {"inputs": {"carbon": 4, "hydrogen": 9, "nitrogen": 1, "halogen": 0},
                 "note": "C₄H₉N: (8 + 2 + 1 − 9) ÷ 2 = 1. Nitrogen's extra hydrogen changes the count "
                         "without adding unsaturation."},
            ],
            "pitfalls": [
                "<strong>Oxygen counted.</strong> Oxygen is divalent and does not change the DBE; a "
                "carbonyl's oxygen contributes nothing, though its double bond does.",
                "<strong>Halogens ignored.</strong> Each halogen takes the place of a hydrogen, so "
                "chloroform's formula needs them in the count.",
                "<strong>A fractional answer read as an error.</strong> It means the formula is "
                "inconsistent — an odd hydrogen count with no nitrogen, most often.",
            ],
            "units_note": ("<p>All inputs are atom counts and all outputs are counts. There are no units "
                           "anywhere in this calculation, which is what makes it a good first check on a "
                           "proposed formula.</p>"),
            "limits": [
                "<strong>It cannot say what the unsaturation is.</strong> A DBE of four could be a benzene "
                "ring or four separate double bonds.",
                "<strong>It assumes normal valences throughout.</strong> Charged species, radicals and "
                "hypervalent atoms need the count adjusted by hand.",
            ],
            "uses": [
                "<li>Narrowing the structures a molecular formula allows.</li>",
                "<li>Spotting an impossible formula before drawing anything.</li>",
                "<li>Confirming that a proposed structure matches the mass spectrum's formula.</li>",
            ],
        },
        faq=[
            ("Why is oxygen left out?",
             "Because it is divalent: an oxygen in the middle of a chain takes the place of a CH₂ group "
             "without changing the hydrogen count. C₆H₁₄ and C₆H₁₄O have the same DBE."),
            ("How do I know whether the DBE is a ring or a double bond?",
             "You cannot from the formula alone. The infrared spectrum shows the carbonyl and the ring "
             "strain, and hydrogen counts from NMR settle it."),
        ],
        related=[("/chemistry/degree-of-unsaturation", "Degree of unsaturation"),
                 ("/chemistry/molar-mass", "Molar mass"),
                 ("/chemistry/empirical-formula", "Empirical formula")],
    ),

    S(
        slug="degree-of-unsaturation",
        name="Degree of Unsaturation Calculator",
        title="Degree of Unsaturation Calculator: Rings and Pi Bonds",
        desc="Count rings, double bonds and triple bonds in a structure and get its degree of unsaturation, plus the hydrogens it hides against a saturated skeleton.",
        what=("<p>From a structure rather than a formula, the degree of unsaturation adds up what is "
              "missing: <strong>DoU = rings + double bonds + 2 × triple bonds</strong>. Each ring or pi bond "
              "costs two hydrogens, and a triple bond counts as two pi bonds.</p>"),
        fields=[
            F("rings", "Rings", "", 1, "Independent rings in the structure", bounds=(0, 10)),
            F("double_bonds", "Double bonds", "", 3, "C=C, C=O and C=N all count", bounds=(0, 20)),
            F("triple_bonds", "Triple bonds", "", 0, "C≡C and C≡N", bounds=(0, 10)),
        ],
        results=[
            R("degree_of_unsaturation", "Degree of unsaturation", ""),
            R("pi_bonds", "Pi bonds", ""),
            R("missing_hydrogens", "Hydrogens below the saturated formula", ""),
        ],
        formula={
            "degree_of_unsaturation": "rings+double_bonds+2*triple_bonds",
            "pi_bonds": "double_bonds+triple_bonds",
            "missing_hydrogens": "2*(rings+double_bonds+2*triple_bonds)",
            "rings": "degree_of_unsaturation-double_bonds-2*triple_bonds",
            "double_bonds": "degree_of_unsaturation-rings-2*triple_bonds",
            "triple_bonds": "(degree_of_unsaturation-rings-double_bonds)/2",
        },
        prose={
            "why": ("<p>The degree of unsaturation is the bridge between a drawn structure and its formula: "
                    "count what you can see, and the hydrogen count follows. It also works the other way "
                    "when the formula arrives before the structure does.</p>"),
            "formula_note": ("<p>A triple bond is two pi bonds sharing one pair of carbons, so it counts "
                        "twice. A ring counts once because closing a chain costs exactly the two hydrogens "
                        "that a pi bond would.</p>"),
            "example_note": ("<p>Benzene: one ring plus three double bonds is four, which is why its formula "
                             "is C₆H₆ rather than C₆H₁₄ — eight hydrogens short of the alkane, or two per "
                             "degree of unsaturation.</p>"),
            "reading": ("<p>Compare with the double bond equivalent from the formula. The two must agree; if "
                        "the structure gives three and the formula gives four, a ring or a carbonyl is "
                        "missing from the drawing.</p>"),
            "scenarios": [
                {"inputs": {"rings": 0, "double_bonds": 0, "triple_bonds": 1},
                 "note": "An alkyne: one triple bond counts as two, so acetylene is C₂H₂ against a "
                         "saturated C₂H₆."},
                {"inputs": {"rings": 2, "double_bonds": 1, "triple_bonds": 0},
                 "note": "A bicyclic ketone: three degrees of unsaturation, six hydrogens below the "
                         "saturated skeleton."},
            ],
            "pitfalls": [
                "<strong>A triple bond counted once.</strong> It is two pi bonds and counts twice; counting "
                "once makes the hydrogen count wrong by two.",
                "<strong>Rings counted by drawing.</strong> The number is the smallest set of rings whose "
                "closure accounts for every ring bond — two fused rings count as two.",
                "<strong>Nitrogen and halogen ignored.</strong> They shift the saturated formula, so a "
                "structure containing them needs the formula-side check as well.",
            ],
            "units_note": ("<p>Every input and output is a count with no unit. The hydrogens below the "
                           "saturated formula is the number times two, because each lost pair of hydrogens "
                           "is one degree.</p>"),
            "limits": [
                "<strong>It needs the structure.</strong> That is the point — this page is for checking a "
                "drawing against a formula, not for finding one from nothing.",
                "<strong>It says nothing about which hydrogens are missing.</strong> Position and "
                "stereochemistry are separate questions.",
            ],
            "uses": [
                "<li>Checking that a drawn structure matches its formula.</li>",
                "<li>Working out how many hydrogens a skeleton implies.</li>",
                "<li>Confirming an aromatic ring's contribution.</li>",
            ],
        },
        faq=[
            ("Why does a ring count the same as a double bond?",
             "Because closing a chain removes two hydrogens, exactly as forming a pi bond does. Both are "
             "one degree of unsaturation."),
            ("How does this relate to the double bond equivalent?",
             "They are the same quantity computed from opposite ends: DBE from the molecular formula, DoU "
             "from the structure. Agreement between them is a useful check."),
        ],
        related=[("/chemistry/double-bond-equivalent", "Double bond equivalent"),
                 ("/chemistry/empirical-formula", "Empirical formula"),
                 ("/chemistry/mole", "Mole")],
    ),

    S(
        slug="activity-coefficient",
        name="Activity Coefficient Calculator",
        title="Activity Coefficient Calculator: Debye-Hückel",
        desc="Use the Debye-Hückel limiting law to turn an ionic strength and an ion's charge into an activity coefficient, which is how far a solution is from ideal.",
        what=("<p>In a real solution, concentration is not what the ion experiences: "
              "<strong>log₁₀γ = −A·z²·√I</strong>, with A near 0.509 for water at 25 °C. The page reports γ, "
              "its logarithm and the percentage by which the ion's activity falls short of its "
              "concentration.</p>"),
        fields=[
            F("ionic_strength", "Ionic strength", "mol/L", 0.01,
              "Half the sum of every concentration times its charge squared"),
            F("charge", "Charge of the ion", "", 1,
              "Magnitude only: 1 for Na⁺, 2 for Ca²⁺", bounds=(1, 4)),
            F("constant_a", "Debye-Hückel constant A", "", 0.509,
              "0.509 for water at 25 °C; 0.51 at 20 °C"),
        ],
        results=[
            R("activity_coefficient", "Activity coefficient γ", ""),
            R("log_gamma", "log₁₀ γ", ""),
            R("shortfall", "Activity below concentration", "%"),
        ],
        formula={
            "log_gamma": "-constant_a*pow(charge,2)*sqrt(ionic_strength)",
            "activity_coefficient": "pow(10,-constant_a*pow(charge,2)*sqrt(ionic_strength))",
            "shortfall": "(1-pow(10,-constant_a*pow(charge,2)*sqrt(ionic_strength)))*100",
            "ionic_strength": "pow(log_gamma/(constant_a*pow(charge,2)),2)",
            "charge": "sqrt(-log_gamma/(constant_a*sqrt(ionic_strength)))",
            "constant_a": "-log_gamma/(pow(charge,2)*sqrt(ionic_strength))",
        },
        prose={
            "why": ("<p>Equilibrium constants, pH measurements and electrode potentials are all defined on "
                    "activities, and activity is concentration times γ. In dilute solution the two are "
                    "almost the same; in seawater or a physiological buffer they are not.</p>"),
            "formula_note": ("<p>The law is logarithmic because the effect is electrostatic: an ion is "
                             "surrounded by an atmosphere of opposite charge that grows with √I. The "
                             "charge appears squared, so a 2+ ion is affected four times as strongly as a "
                             "1+ ion at the same ionic strength.</p>"),
            "example_note": ("<p>I = 0.01 mol/L and z = 1: log₁₀γ = −0.509 × 0.1 = −0.0509, so γ = 0.889. "
                             "The ion's activity is 88.9 per cent of its concentration — an 11 per cent "
                             "correction in a solution that most people would call dilute.</p>"),
            "reading": ("<p>γ falls as ionic strength rises, reaching about 0.69 at I = 0.1 for a 1:1 "
                        "electrolyte. The limiting law works below about 0.01 mol/L; beyond that, extended "
                        "forms with an ion-size term are needed.</p>"),
            "scenarios": [
                {"inputs": {"ionic_strength": 0.001, "charge": 1, "constant_a": 0.509},
                 "note": "A millimolar solution: γ = 0.964, only a 3.6 per cent correction."},
                {"inputs": {"ionic_strength": 0.01, "charge": 2, "constant_a": 0.509},
                 "note": "A divalent ion at the same ionic strength: γ = 0.626, because the charge is squared and "
                         "the deviation is four times larger."},
            ],
            "pitfalls": [
                "<strong>Concentration used as ionic strength.</strong> I weights every ion by its charge "
                "squared, so a 0.1 mol/L solution of CaCl₂ has I = 0.3, not 0.1.",
                "<strong>The law used above 0.01 mol/L.</strong> Seawater has I near 0.7, where the "
                "limiting law over-corrects badly and activity coefficients start to rise again.",
                "<strong>Temperature ignored.</strong> The constant A is 0.509 at 25 °C and about 0.49 at "
                "0 °C, and the dielectric constant it depends on moves with temperature.",
            ],
            "units_note": ("<p>Ionic strength is in moles per litre, and the charge and the constant A are "
                           "plain numbers. The activity coefficient is dimensionless, as is its logarithm; "
                           "the shortfall is a percentage.</p>"),
            "limits": [
                "<strong>Limiting law only.</strong> It ignores ion size and ion pairing, which is why it "
                "is accurate only in very dilute solutions.",
                "<strong>Single ions, not salts.</strong> A single ion's activity coefficient cannot be "
                "measured on its own; mean ionic coefficients are what experiments give.",
            ],
            "uses": [
                "<li>Correcting a concentration into an activity.</li>",
                "<li>Seeing how far a buffer is from ideal behaviour.</li>",
                "<li>Estimating the ionic-strength limit of a measurement method.</li>",
            ],
        },
        faq=[
            ("What is activity, in one sentence?",
             "It is the effective concentration — what the ion behaves as, rather than how many are in the "
             "litre. Activity is concentration multiplied by this coefficient."),
            ("Why does γ fall and then rise?",
             "The limiting law only describes the fall. At high ionic strength, ions pair up and carry "
             "each other's charge, so their effective concentration climbs again."),
        ],
        related=[("/chemistry/ionic-strength", "Ionic strength"),
                 ("/chemistry/molarity", "Molarity"),
                 ("/chemistry/ph", "pH")],
    ),
]
