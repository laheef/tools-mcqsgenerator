"""Batch 5c — combustion, process equipment and interfacial chemistry."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="air-fuel-ratio-afr",
        name="Air-fuel ratio (AFR)",
        title="Air-Fuel Ratio Calculator: AFR, Lambda, Excess",
        desc="Turn the masses of air and fuel you actually measured into an air-fuel ratio, then compare that ratio with stoichiometric to read lambda and excess air.",
        what=("<p>The air-fuel ratio is the mass of air burned with each unit mass of fuel: "
              "<strong>AFR = m<sub>air</sub> ÷ m<sub>fuel</sub></strong>. Comparing it with the "
              "stoichiometric ratio gives lambda, and lambda minus one is the excess air, as a "
              "percentage.</p>"),
        fields=[
            F("air_mass", "Mass of air", "kg", 14.7,
              "Weighed or metered over the same interval as the fuel"),
            F("fuel_mass", "Mass of fuel", "kg", 1.0,
              "Use the same interval as the air"),
            F("stoich_afr", "Stoichiometric AFR", "", 14.7,
              "14.7 for gasoline, 14.5 for diesel, 17.2 for natural gas", bounds=(5, 20)),
        ],
        results=[
            R("afr", "Air-fuel ratio", "kg/kg"),
            R("lambda", "Lambda (equivalence ratio)", ""),
            R("excess_air", "Excess air", "%"),
        ],
        formula={
            "afr": "air_mass/fuel_mass",
            "lambda": "air_mass/(fuel_mass*stoich_afr)",
            "excess_air": "(air_mass/(fuel_mass*stoich_afr)-1)*100",
            "air_mass": "afr*fuel_mass",
            "fuel_mass": "air_mass/afr",
            "stoich_afr": "air_mass/(fuel_mass*lambda)",
        },
        prose={
            "why": ("<p>AFR is the number that decides everything downstream of the injector: how hot "
                    "the flame runs, how much carbon monoxide leaves the tailpipe and whether a "
                    "three-way catalyst can work at all. Every lambda sensor is really reporting this "
                    "ratio, normalised to the fuel's own stoichiometry.</p>"),
            "formula_note": ("<p>Lambda is AFR divided by the stoichiometric AFR. Below one means rich — "
                             "there is not enough air to burn all the fuel; above one means lean. A "
                             "lambda of 1.05 is five per cent excess air, which is where most engines "
                             "cruise.</p>"),
            "example_note": ("<p>14.7 kg of air to 1.0 kg of gasoline is an AFR of 14.7 and a lambda of "
                             "1.00, with no excess air. Drop the air to 12.5 kg and lambda is 0.85 — a "
                             "rich mixture that makes power at the cost of carbon monoxide. Raise it to "
                             "15.4 kg and lambda is 1.05, the lean cruise point.</p>"),
            "reading": ("<p>Spark-ignition engines run around lambda 0.9 at full load for maximum power "
                        "and 1.05 to 1.1 when cruising for economy. Diesel runs lean throughout, usually "
                        "between lambda 1.3 and 6 depending on load, because it is not throttled.</p>"),
            "scenarios": [
                {"inputs": {"air_mass": 12.5, "fuel_mass": 1.0, "stoich_afr": 14.7},
                 "note": "AFR 12.5, lambda 0.85 and −15 per cent excess air: a rich mixture, and the "
                         "negative excess is how lambda less than one is usually reported."},
                {"inputs": {"air_mass": 17.2, "fuel_mass": 1.0, "stoich_afr": 17.2},
                 "note": "Natural gas at its own stoichiometric point: lambda 1.00, no excess air, and "
                         "the same 17.2 ratio as methane's chemistry gives."},
            ],
            "pitfalls": [
                "<strong>The wrong stoichiometric ratio.</strong> Using 14.7 for diesel makes the mixture "
                "look richer than it is; diesel's is about 14.5 and it normally runs far leaner.",
                "<strong>Air and fuel measured over different intervals.</strong> A ratio of two averages "
                "from different windows is not the ratio at any instant.",
                "<strong>Lambda read as excess air.</strong> Excess air is lambda minus one, expressed as "
                "a percentage; the two numbers differ by exactly that one.",
            ],
            "units_note": ("<p>Both masses must be in the same unit, and the ratio is dimensionless. The "
                           "stoichiometric AFR carries no unit either — it is kilograms of air per "
                           "kilogram of fuel, which cancels.</p>"),
            "limits": [
                "<strong>It ignores combustion efficiency.</strong> Some fuel always leaves unburned, so "
                "measured AFR and the true air-fuel charge differ.",
                "<strong>It says nothing about the fuel's composition.</strong> Two fuels with the same "
                "AFR can have very different energy content.",
            ],
            "uses": [
                "<li>Checking a fuel-injection calibration.</li>",
                "<li>Converting a lambda reading into an AFR for a given fuel.</li>",
                "<li>Setting up an engine test cell.</li>",
            ],
        },
        faq=[
            ("Why is gasoline's stoichiometric AFR 14.7?",
             "Because octane's combustion consumes about 14.7 grams of air for every gram of fuel. The "
             "number follows directly from the balanced equation and the oxygen fraction of air."),
            ("What lambda is best for power?",
             "Around 0.85 to 0.90 on a spark-ignition engine: slightly rich cools the charge and prevents "
             "detonation, at the cost of fuel and emissions."),
        ],
        related=[("/chemistry/chemical-equation-balancer", "Equation balancer"),
                 ("/chemistry/heat-of-combustion", "Heat of combustion"),
                 ("/chemistry/mole", "Mole")],
    ),

    S(
        slug="chemical-equation-balancer",
        name="Chemical equation balancer",
        title="Chemical Equation Balancer: Hydrocarbon Combustion",
        desc="Balance a hydrocarbon combustion in one step: give the fuel's carbon, hydrogen and oxygen atoms and read the coefficients for oxygen, carbon dioxide and water.",
        what=("<p>For a fuel C<sub>c</sub>H<sub>h</sub>O<sub>o</sub> burning in oxygen, the balanced "
              "equation is <strong>fuel + (c + h/4 − o/2) O₂ → c CO₂ + (h/2) H₂O</strong>. The page "
              "returns all three coefficients, and the mass of oxygen they imply.</p>"),
        fields=[
            F("carbon_atoms", "Carbon atoms in the fuel", "", 8,
              "Eight for octane, C8H18", bounds=(1, 30)),
            F("hydrogen_atoms", "Hydrogen atoms in the fuel", "", 18,
              "Eighteen for octane", bounds=(0, 60)),
            F("oxygen_atoms", "Oxygen atoms already in the fuel", "", 0,
              "Zero for a hydrocarbon; one for ethanol", bounds=(0, 10)),
        ],
        results=[
            R("o2_coefficient", "Coefficient of O₂", ""),
            R("co2_coefficient", "Coefficient of CO₂", ""),
            R("h2o_coefficient", "Coefficient of H₂O", ""),
            R("oxygen_mass", "Mass of O₂ per mole of fuel", "g"),
        ],
        formula={
            "o2_coefficient": "carbon_atoms+hydrogen_atoms/4-oxygen_atoms/2",
            "co2_coefficient": "carbon_atoms",
            "h2o_coefficient": "hydrogen_atoms/2",
            "oxygen_mass": "(carbon_atoms+hydrogen_atoms/4-oxygen_atoms/2)*31.998",
            "carbon_atoms": "co2_coefficient",
            "hydrogen_atoms": "2*h2o_coefficient",
            "oxygen_atoms": "2*(carbon_atoms+hydrogen_atoms/4-o2_coefficient)",
        },
        prose={
            "why": ("<p>Balancing is where every combustion question starts. The coefficients tell you how "
                    "much oxygen a fuel demands, how much carbon dioxide it will produce, and — once you "
                    "divide by the fuel's mass — the stoichiometric air-fuel ratio.</p>"),
            "formula_note": ("<p>The carbon coefficient is simply the number of carbon atoms, because each "
                             "one becomes a CO₂. Hydrogen appears in pairs in water, so it is halved. "
                             "Oxygen already in the fuel is subtracted, halved again because it arrives as "
                             "O₂ rather than as single atoms.</p>"),
            "example_note": ("<p>Octane, C₈H₁₈: 8 carbons give 8 CO₂, 18 hydrogens give 9 H₂O, and the "
                             "oxygen coefficient is 8 + 4.5 = 12.5. The balanced equation is "
                             "C₈H₁₈ + 12.5 O₂ → 8 CO₂ + 9 H₂O, which is 400 g of oxygen for 114 g of "
                             "fuel.</p>"),
            "reading": ("<p>Fractional coefficients are correct and often kept: 12.5 O₂ is the honest "
                        "count per molecule of octane. Double everything if a textbook wants whole "
                        "numbers — the ratio does not change.</p>"),
            "scenarios": [
                {"inputs": {"carbon_atoms": 1, "hydrogen_atoms": 4, "oxygen_atoms": 0},
                 "note": "Methane: 2 O₂ gives 1 CO₂ and 2 H₂O — the simplest complete combustion there "
                         "is."},
                {"inputs": {"carbon_atoms": 2, "hydrogen_atoms": 6, "oxygen_atoms": 1},
                 "note": "Ethanol: 3 O₂, 2 CO₂ and 3 H₂O. The fuel's own oxygen halves the demand."},
                {"inputs": {"carbon_atoms": 2, "hydrogen_atoms": 4, "oxygen_atoms": 0},
                 "note": "Ethene: 3 O₂, 2 CO₂ and 2 H₂O — an unsaturated fuel with a lower hydrogen "
                         "count."},
            ],
            "pitfalls": [
                "<strong>Oxygen in the fuel forgotten.</strong> Ethanol needs 3 O₂, not 3.5; the oxygen "
                "the molecule already carries is subtracted.",
                "<strong>Water written with one hydrogen.</strong> Water is H₂O, so the hydrogen "
                "coefficient is half the fuel's hydrogen count, not the whole of it.",
                "<strong>An incomplete combustion balanced as complete.</strong> Where carbon monoxide "
                "appears, the oxygen coefficient is smaller and this page does not apply.",
            ],
            "units_note": ("<p>The three coefficients are counts and carry no units. The oxygen mass is in "
                           "grams per mole of fuel, using 31.998 g/mol for O₂ — multiply the mole "
                           "coefficient by that to get grams.</p>"),
            "limits": [
                "<strong>Hydrocarbons only.</strong> The fuel may contain carbon, hydrogen and oxygen; "
                "nitrogen or sulfur in the fuel need their own terms.",
                "<strong>Complete combustion only.</strong> No carbon monoxide, soot or nitrogen oxides "
                "appear.",
            ],
            "uses": [
                "<li>Writing a combustion equation with correct coefficients.</li>",
                "<li>Finding the oxygen demand of a fuel before an AFR calculation.</li>",
                "<li>Checking a hand-balanced equation.</li>",
            ],
        },
        faq=[
            ("Why is the oxygen coefficient fractional?",
             "Because it is per molecule of fuel. For octane, 12.5 molecules of O₂ is the exact "
             "requirement; doubling the whole equation makes it 25 for two molecules of octane."),
            ("Does the order of the fuel's atoms matter?",
             "No. Carbon, hydrogen and oxygen counts are all the page needs; how they are arranged in the "
             "molecule does not change the balanced equation."),
        ],
        related=[("/chemistry/air-fuel-ratio-afr", "Air-fuel ratio"),
                 ("/chemistry/heat-of-combustion", "Heat of combustion"),
                 ("/chemistry/empirical-formula", "Empirical formula")],
    ),

    S(
        slug="chemical-name",
        name="Chemical name",
        title="Chemical Name Calculator: Ionic Formula From Charges",
        desc="Turn the charges on a cation and an anion into the subscripts of a neutral ionic formula, and read the molar mass of the compound those subscripts describe.",
        what=("<p>An ionic formula is neutral overall, so the charges have to cancel: with a charge "
              "z<sub>+</sub> on the cation and z<sub>−</sub> on the anion, the subscripts are "
              "<strong>z<sub>−</sub>/g</strong> cations and <strong>z<sub>+</sub>/g</strong> anions, "
              "where g is the greatest common divisor of the two charges.</p>"),
        fields=[
            F("cation_charge", "Charge on the cation", "", 2,
              "Magnitude only — 2 for calcium", bounds=(1, 4)),
            F("anion_charge", "Charge on the anion", "", 3,
              "Magnitude only — 3 for nitride", bounds=(1, 4)),
            F("cation_mass", "Molar mass of the cation", "g/mol", 40.08,
              "40.08 for calcium"),
            F("anion_mass", "Molar mass of the anion", "g/mol", 14.01,
              "14.01 for nitride"),
        ],
        results=[
            R("cation_count", "Cations per formula unit", ""),
            R("anion_count", "Anions per formula unit", ""),
            R("formula_mass", "Molar mass of the compound", "g/mol"),
            R("net_charge", "Net charge of the formula unit", ""),
        ],
        formula={
            "cation_count": "anion_charge/gcd(cation_charge,anion_charge)",
            "anion_count": "cation_charge/gcd(cation_charge,anion_charge)",
            "formula_mass": "(anion_charge/gcd(cation_charge,anion_charge))*cation_mass+(cation_charge/gcd(cation_charge,anion_charge))*anion_mass",
            "net_charge": "(anion_charge/gcd(cation_charge,anion_charge))*cation_charge-(cation_charge/gcd(cation_charge,anion_charge))*anion_charge",
            "cation_mass": "(formula_mass-(cation_charge/gcd(cation_charge,anion_charge))*anion_mass)/(anion_charge/gcd(cation_charge,anion_charge))",
            "anion_mass": "(formula_mass-(anion_charge/gcd(cation_charge,anion_charge))*cation_mass)/(cation_charge/gcd(cation_charge,anion_charge))",
        },
        prose={
            "why": ("<p>Naming an ionic compound is the reverse of writing its formula, and the formula is "
                    "nothing more than the smallest whole-number ratio that makes the charges cancel. The "
                    "subscripts follow from the charges alone.</p>"),
            "formula_note": ("<p>Dividing both charges by their greatest common divisor keeps the ratio in "
                             "its lowest terms: calcium and nitride, 2 and 3, give three calcium to two "
                             "nitride — Ca₃N₂. Without the divisor, magnesium oxide would come out as "
                             "Mg₂O₂ instead of MgO.</p>"),
            "example_note": ("<p>Calcium (2+) with nitride (3−): three Ca²⁺ carry +6 and two N³⁻ carry "
                             "−6, so the formula is Ca₃N₂ and its molar mass is 3 × 40.08 + 2 × 14.01 = "
                             "148.26 g/mol. The net charge comes back as zero, which is the check.</p>"),
            "reading": ("<p>If net charge is not zero the two charges cannot be paired as entered — a "
                        "common sign that one of them was written with the wrong magnitude, such as "
                        "sulfate as 1− rather than 2−.</p>"),
            "scenarios": [
                {"inputs": {"cation_charge": 1, "anion_charge": 2, "cation_mass": 22.99,
                            "anion_mass": 96.06},
                 "note": "Sodium and sulfate: two sodiums per sulfate, Na₂SO₄, 142.04 g/mol."},
                {"inputs": {"cation_charge": 2, "anion_charge": 1, "cation_mass": 40.08,
                            "anion_mass": 35.45},
                 "note": "Calcium and chloride: one calcium to two chlorides, CaCl₂, 110.98 g/mol — the "
                         "divisor keeps the ratio in its lowest terms."},
            ],
            "pitfalls": [
                "<strong>Charges written with signs.</strong> The page wants magnitudes; a 2+ entered as "
                "−2 would give a negative subscript.",
                "<strong>The divisor skipped.</strong> Charges of 2 and 4 give one to two, not two to "
                "four.",
                "<strong>Polyatomic ions taken apart.</strong> A sulfate is one anion with one molar "
                "mass; it is not a sulfur and four separate oxygens for this purpose.",
            ],
            "units_note": ("<p>The charges are dimensionless counts and the subscripts that come out are "
                           "counts as well. Molar masses in grams per mole give the compound's molar mass "
                           "in the same unit, and the net charge is dimensionless.</p>"),
            "limits": [
                "<strong>It does not name the compound.</strong> It gives the formula and its mass; the "
                "name follows the usual cation-then-anion pattern.",
                "<strong>It assumes a simple ionic pair.</strong> Hydrates and mixed salts need extra "
                "water or ion terms.",
            ],
            "uses": [
                "<li>Writing the formula of an ionic compound from its ions.</li>",
                "<li>Getting the molar mass of a salt you have just named.</li>",
                "<li>Checking a formula a student has written.</li>",
            ],
        },
        faq=[
            ("Why is the formula MgO and not Mg₂O₂?",
             "Because formulas are written in the lowest whole-number ratio. Both charges are 2, so the "
             "greatest common divisor of 2 and 2 is 2, and the subscripts become 1 and 1."),
            ("How do I handle a polyatomic ion?",
             "Treat it as one anion with its own charge and molar mass, and put the whole ion in "
             "brackets when its subscript is more than one."),
        ],
        related=[("/chemistry/molar-mass", "Molar mass"),
                 ("/chemistry/net-ionic-equation", "Net ionic equation"),
                 ("/chemistry/percent-composition", "Percent composition")],
    ),

    S(
        slug="detention-time",
        name="Detention time",
        title="Detention Time Calculator: Volume and Flow Rate",
        desc="Work out how long water is actually held in a tank, from its working volume and the flow passing through it, reported in days, in hours and in minutes.",
        what=("<p>Detention time is the volume divided by the flow: <strong>t = V ÷ Q</strong>. It is the "
              "average time a drop spends in the tank, and it sets how much settling, mixing or "
              "disinfection can happen before the water leaves.</p>"),
        fields=[
            F("volume", "Working volume of the tank", "m³", 1000,
              "The volume water actually occupies, not the tank's nominal size"),
            F("flow", "Flow through the tank", "m³/d", 5000,
              "Average daily flow, not the peak"),
        ],
        results=[
            R("detention_days", "Detention time", "d"),
            R("detention_hours", "Detention time", "h"),
            R("detention_minutes", "Detention time", "min"),
        ],
        formula={
            "detention_days": "volume/flow",
            "detention_hours": "volume/flow*24",
            "detention_minutes": "volume/flow*1440",
            "volume": "detention_days*flow",
            "flow": "volume/detention_days",
        },
        prose={
            "why": ("<p>Detention time is the first number a treatment works is designed around. A "
                    "primary clarifier needs two hours for grit and floc to settle; a chlorine contact "
                    "tank needs half an hour of travel for disinfection; a lagoon needs weeks. All of "
                    "them are volume over flow.</p>"),
            "formula_note": ("<p>Because it is a volume divided by a volume per time, the answer arrives "
                             "in whatever time unit the flow is given in. A flow in cubic metres per day "
                             "gives days, and the other two results convert from there.</p>"),
            "example_note": ("<p>A 1 000 m³ tank with 5 000 m³ a day passing through it holds water for "
                             "0.2 days — 4.8 hours, or 288 minutes. Halving the flow doubles the "
                             "detention time; halving the tank halves it.</p>"),
            "reading": ("<p>Compare the figure with the process: below 1.5 hours a clarifier will pass "
                        "solids through, and above about 30 hours a chlorine contact tank has lost most "
                        "of its disinfectant to demand before the water leaves.</p>"),
            "scenarios": [
                {"inputs": {"volume": 250, "flow": 1000},
                 "note": "A small contact tank: 0.25 days, or 6 hours, which is far longer than "
                         "disinfection needs."},
                {"inputs": {"volume": 5000, "flow": 20000},
                 "note": "A large lagoon at quarter of a day — 6 hours is short for a lagoon and long "
                         "for a clarifier."},
            ],
            "pitfalls": [
                "<strong>Nominal volume used.</strong> Freeboard is not water; the working volume is what "
                "counts.",
                "<strong>Peak flow treated as average.</strong> Detention time at peak flow is much "
                "shorter, and that is the case that fails.",
                "<strong>Units mixed.</strong> A volume in litres and a flow in cubic metres per day "
                "gives an answer a thousand times too large.",
            ],
            "units_note": ("<p>Cubic metres divided by cubic metres per day gives days. The page also "
                           "reports hours and minutes, which are the same quantity multiplied by 24 and "
                           "1 440.</p>"),
            "limits": [
                "<strong>It is an average, not a guarantee.</strong> Short-circuiting means some water "
                "leaves far sooner than the calculation says.",
                "<strong>It ignores the process.</strong> Detention time says how long, not whether that "
                "is long enough.",
            ],
            "uses": [
                "<li>Sizing a clarifier or contact tank.</li>",
                "<li>Checking a works against its design flow.</li>",
                "<li>Converting a design detention time into a volume.</li>",
            ],
        },
        faq=[
            ("What is the difference between detention time and retention time?",
             "In a tank they are the same volume-over-flow calculation. Hydraulic retention time is the "
             "same idea applied to biological reactors, where recycle also matters."),
            ("Why is peak flow used in design?",
             "Because detention time is shortest at peak flow, and that is when the process has to still "
             "work. Designing on the average fails on a wet day."),
        ],
        related=[("/chemistry/hydraulic-retention-time", "Hydraulic retention time"),
                 ("/chemistry/residence-time", "Residence time"),
                 ("/chemistry/dilution-factor", "Dilution factor")],
    ),

    S(
        slug="electron-configuration",
        name="Electron configuration",
        title="Electron Configuration Calculator: Shell Filling",
        desc="Fill the electron shells of an element from its atomic number, the way an aufbau diagram does it, and read how many electrons sit in each shell in turn.",
        what=("<p>Electrons fill the lowest available shell first, two in the first, eight in the second, "
              "eight in the third and two in the fourth for the first twenty elements. The page reports "
              "the occupancy of each shell and the number of valence electrons that leaves.</p>"),
        fields=[
            F("electrons", "Atomic number", "Z", 17,
              "Chlorine is 17; the page covers the first twenty elements", bounds=(1, 20)),
        ],
        results=[
            R("shell_1", "Electrons in the first shell", ""),
            R("shell_2", "Electrons in the second shell", ""),
            R("shell_3", "Electrons in the third shell", ""),
            R("shell_4", "Electrons in the fourth shell", ""),
            R("valence_electrons", "Valence electrons", ""),
        ],
        formula={
            "shell_1": "min(electrons,2)",
            "shell_2": "min(max(electrons-2,0),8)",
            "shell_3": "min(max(electrons-10,0),8)",
            "shell_4": "min(max(electrons-18,0),2)",
            "valence_electrons": "min(electrons,2)*(1-min(1,min(max(electrons-2,0),8)))+min(max(electrons-2,0),8)*(1-min(1,min(max(electrons-10,0),8)))+min(max(electrons-10,0),8)*(1-min(1,min(max(electrons-18,0),2)))+min(max(electrons-18,0),2)",
            "electrons": "shell_1+shell_2+shell_3+shell_4",
        },
        prose={
            "why": ("<p>The shell structure explains the periodic table's shape. Elements with one more "
                    "electron than a full shell behave alike — lithium, sodium and potassium all sit at "
                    "the start of a period with a single valence electron, and all react the same way.</p>"),
            "formula_note": ("<p>Each shell is filled in turn and capped at its capacity: two, then eight, "
                             "then eight again. The fourth shell only takes two electrons in this range, "
                             "because the 3d subshell jumps ahead of it and the page stops at calcium.</p>"),
            "example_note": ("<p>Chlorine, Z = 17: 2 in the first shell, 8 in the second, 7 in the third "
                             "and none in the fourth. Its 2, 8, 7 structure leaves seven valence "
                             "electrons — one short of an octet, which is why it forms chloride so "
                             "readily.</p>"),
            "reading": ("<p>A full outer shell means an inert-gas-like stability: neon at 2, 8 and argon "
                        "at 2, 8, 8 are the full-shell points. One electron over means a Group 1 metal; "
                        "one short means a halogen.</p>"),
            "scenarios": [
                {"inputs": {"electrons": 11},
                 "note": "Sodium: 2, 8, 1 — a single valence electron, which is why it loses one so "
                         "easily."},
                {"inputs": {"electrons": 18},
                 "note": "Argon: 2, 8, 8, with a closed outer shell and no valence electrons to offer."},
                {"inputs": {"electrons": 20},
                 "note": "Calcium: 2, 8, 8, 2 and two valence electrons — the page stops here because "
                         "the next element fills 3d before 4p."},
            ],
            "pitfalls": [
                "<strong>It read past calcium.</strong> From scandium onward the 3d subshell fills before "
                "the fourth shell continues, and a simple shell count will not match the real "
                "configuration.",
                "<strong>The 2n² rule taken as a filling order.</strong> Capacity and filling order are "
                "different: the third shell holds 18 but only takes 8 before the fourth starts.",
                "<strong>Chromium and copper expected to fit.</strong> Both are exceptions to the aufbau "
                "order even within the transition metals.",
            ],
            "units_note": ("<p>Everything on this page is a count of electrons — no units. The atomic "
                           "number and the shell occupancies are all dimensionless, and the shells must "
                           "add back up to the atomic number.</p>"),
            "limits": [
                "<strong>The first twenty elements.</strong> The page is a shell-level treatment, not a "
                "full orbital configuration.",
                "<strong>No subshell detail.</strong> It tells you 2, 8, 7, not 1s² 2s² 2p⁶ 3s² 3p⁵.",
            ],
            "uses": [
                "<li>Working out the shell structure from an atomic number.</li>",
                "<li>Finding the valence electron count for the main-group elements.</li>",
                "<li>Explaining periodic trends to a class.</li>",
            ],
        },
        faq=[
            ("Why does the third shell hold eight before the fourth starts?",
             "Because the 4s orbital fills at a lower energy than 3d. The third shell's remaining ten "
             "places are not filled until after the fourth shell has started."),
            ("What is the valence shell here?",
             "The outermost shell that actually has electrons in it. For chlorine that is the third "
             "shell, with seven, not the empty fourth."),
        ],
        related=[("/chemistry/molar-mass", "Molar mass"),
                 ("/chemistry/atomic-mass", "Atomic mass"),
                 ("/chemistry/electronegativity", "Electronegativity")],
    ),

    S(
        slug="hydraulic-retention-time",
        name="Hydraulic retention time",
        title="Hydraulic Retention Time Calculator: With Recycle",
        desc="Find the hydraulic retention time of an aeration tank once the sludge return is taken into account, with the effective flow, the hours and the days all shown.",
        what=("<p>In an activated-sludge tank the water does not leave at the influent flow alone — the "
              "return sludge adds to it: <strong>HRT = V ÷ (Q·(1 + R))</strong>, with R the recycle "
              "ratio.</p>"),
        fields=[
            F("volume", "Aeration tank volume", "m³", 2000,
              "The working volume of the biological tank"),
            F("influent_flow", "Influent flow", "m³/d", 10000,
              "The wastewater entering the works"),
            F("recycle_ratio", "Return sludge ratio", "", 0.5,
              "0.5 means half the influent flow is returned", bounds=(0, 3)),
        ],
        results=[
            R("effective_flow", "Flow through the tank", "m³/d"),
            R("hrt_hours", "Hydraulic retention time", "h"),
            R("hrt_days", "Hydraulic retention time", "d"),
        ],
        formula={
            "effective_flow": "influent_flow*(1+recycle_ratio)",
            "hrt_hours": "volume/(influent_flow*(1+recycle_ratio))*24",
            "hrt_days": "volume/(influent_flow*(1+recycle_ratio))",
            "volume": "influent_flow*(1+recycle_ratio)*hrt_days",
            "influent_flow": "volume/((1+recycle_ratio)*hrt_days)",
            "recycle_ratio": "volume/(influent_flow*hrt_days)-1",
        },
        prose={
            "why": ("<p>Hydraulic retention time is how long the water spends in the aeration tank, and it "
                    "is different from sludge age, which is how long the organisms do. HRT decides "
                    "whether the tank is big enough for the flow; sludge age decides whether the "
                    "biology can nitrify.</p>"),
            "formula_note": ("<p>The recycle adds its own flow to the tank's throughput, so the effective "
                             "flow is the influent multiplied by one plus the ratio. A recycle of 0.5 "
                             "raises the flow by half, which shortens the retention time by a third.</p>"),
            "example_note": ("<p>2 000 m³ of aeration volume at 10 000 m³ a day with a recycle ratio of "
                             "0.5: the tank sees 15 000 m³ a day, so HRT is 0.133 days — 3.2 hours. At a "
                             "recycle of 1.0 the same tank falls to 2.4 hours.</p>"),
            "reading": ("<p>Municipal activated sludge usually runs between 4 and 8 hours of HRT; a "
                        "high-rate plant can go below 2. Short HRT with a long sludge age is possible "
                        "precisely because the recycle keeps the biomass in the tank.</p>"),
            "scenarios": [
                {"inputs": {"volume": 3000, "influent_flow": 12000, "recycle_ratio": 1.0},
                 "note": "A full recycle doubles the flow: 24 000 m³ a day, 3 hours of HRT."},
                {"inputs": {"volume": 4000, "influent_flow": 8000, "recycle_ratio": 0},
                 "note": "No recycle at all: HRT is 12 hours, the plain volume-over-flow case."},
            ],
            "pitfalls": [
                "<strong>Recycle left out.</strong> Using influent flow alone overstates the retention "
                "time and the tank looks bigger than it is.",
                "<strong>HRT confused with sludge age.</strong> They differ by the ratio of solids to "
                "suspended solids in the effluent and can be an order of magnitude apart.",
                "<strong>Peak flow ignored.</strong> At storm flow the HRT collapses, and that is when "
                "solids wash out.",
            ],
            "units_note": ("<p>The volume is in cubic metres and the flow in cubic metres per day, so the "
                           "retention time is in days and the page shows it in hours as well. The "
                           "recycle ratio is a plain fraction and carries no units.</p>"),
            "limits": [
                "<strong>It assumes complete mixing.</strong> Real tanks short-circuit and the actual "
                "time for some of the water is shorter.",
                "<strong>It ignores the clarifier.</strong> The return sludge's own travel time is not "
                "included.",
            ],
            "uses": [
                "<li>Sizing an aeration tank.</li>",
                "<li>Checking a plant's HRT at its design flow.</li>",
                "<li>Seeing how much the recycle ratio shortens the retention time.</li>",
            ],
        },
        faq=[
            ("How is HRT different from SRT?",
             "HRT is how long the water stays; solids retention time is how long the sludge stays. A "
             "plant can have a 6-hour HRT and a 15-day SRT."),
            ("Does recycle really shorten the retention time?",
             "Yes — the same water passes through the tank more than once per day, so the flow through "
             "the tank is higher than the influent flow."),
        ],
        related=[("/chemistry/detention-time", "Detention time"),
                 ("/chemistry/hydraulic-retention-time", "Hydraulic retention time"),
                 ("/chemistry/dilution-factor", "Dilution factor")],
    ),

    S(
        slug="liquid-ethylene-density",
        name="Liquid ethylene density",
        title="Liquid Ethylene Density Calculator: Rackett",
        desc="Estimate the density of saturated liquid ethylene at any temperature below its critical point, using the Rackett correlation and ethylene's critical constants.",
        what=("<p>The Rackett equation gives the saturated liquid molar volume from the critical "
              "constants and the reduced temperature: <strong>V = (R·T<sub>c</sub>/P<sub>c</sub>)·"
              "Z<sub>RA</sub><sup>1+(1−T/T<sub>c</sub>)<sup>2/7</sup></sup></strong>. Density follows by "
              "dividing the molar mass by that volume.</p>"),
        fields=[
            F("temperature", "Temperature", "K", 250,
              "Must be below ethylene's critical 282.35 K", bounds=(120, 282)),
            F("critical_temperature", "Critical temperature", "K", 282.35,
              "282.35 K for ethylene"),
            F("critical_pressure", "Critical pressure", "MPa", 5.041,
              "5.041 MPa for ethylene"),
            F("rackett_z", "Rackett compressibility", "", 0.2727,
              "An empirical constant, 0.2727 for ethylene", bounds=(0.1, 0.4)),
            F("molar_mass", "Molar mass", "g/mol", 28.054,
              "Ethylene is 28.054 g/mol"),
        ],
        results=[
            R("molar_volume", "Saturated liquid molar volume", "cm³/mol"),
            R("density", "Density", "g/cm³"),
            R("density_kg_m3", "Density", "kg/m³"),
            R("reduced_temperature", "Reduced temperature", ""),
        ],
        formula={
            "molar_volume": "(8.314*critical_temperature/critical_pressure)*pow(rackett_z,1+pow(1-temperature/critical_temperature,2/7))",
            "density": "molar_mass/((8.314*critical_temperature/critical_pressure)*pow(rackett_z,1+pow(1-temperature/critical_temperature,2/7)))",
            "density_kg_m3": "molar_mass/((8.314*critical_temperature/critical_pressure)*pow(rackett_z,1+pow(1-temperature/critical_temperature,2/7)))*1000",
            "reduced_temperature": "temperature/critical_temperature",
            "temperature": "critical_temperature*(1-pow((log(molar_mass/density)-log(8.314*critical_temperature/critical_pressure))/log(rackett_z)-1,3.5))",
        },
        prose={
            "why": ("<p>Ethylene is stored and shipped as a refrigerated liquid, and its density decides "
                    "how much fits in a tank, how the level instruments are scaled and what the relief "
                    "valves are sized for. Below about 282 K it can be liquefied at modest pressure, so "
                    "the density curve is the working range.</p>"),
            "formula_note": ("<p>The bracketed term R·T<sub>c</sub>/P<sub>c</sub> is the critical volume "
                             "scale; everything else corrects it down as the temperature rises toward the "
                             "critical point. At the critical temperature the correction makes the volume "
                             "larger and the density falls toward the critical density.</p>"),
            "example_note": ("<p>At 250 K, with ethylene's constants: the corrected factor gives a molar "
                             "volume of about 63 cm³/mol, so the density is 28.054 ÷ 63 = 0.445 g/cm³. "
                             "Warm it to 280 K and the density falls to 0.31 g/cm³ as the liquid "
                             "approaches its critical point.</p>"),
            "reading": ("<p>Liquid ethylene at its boiling point, 169 K, is measured at about 0.57 g/cm³; "
                        "the correlation returns 0.60 there, a few per cent high. The density falls "
                        "steeply in the last ten kelvin before the critical point, which is why "
                        "refrigerated storage is run well below it.</p>"),
            "scenarios": [
                {"inputs": {"temperature": 170, "critical_temperature": 282.35, "critical_pressure": 5.041,
                            "rackett_z": 0.2727, "molar_mass": 28.054},
                 "note": "Just above the normal boiling point: the correlation gives 0.60 g/cm³ against a "
                         "measured 0.57, the value a storage vessel's level scale assumes."},
                {"inputs": {"temperature": 280, "critical_temperature": 282.35, "critical_pressure": 5.041,
                            "rackett_z": 0.2727, "molar_mass": 28.054},
                 "note": "Within two kelvin of the critical point: the liquid has thinned to 0.31 g/cm³ and the "
                         "correlation is at the edge of its validity."},
            ],
            "pitfalls": [
                "<strong>Above the critical temperature.</strong> There is no saturated liquid there, "
                "and the correlation has no meaning.",
                "<strong>Another compound's constants.</strong> The page's defaults are ethylene's; "
                "changing the temperature without checking the constants gives someone else's fluid.",
                "<strong>The Rackett constant ignored.</strong> Z<sub>RA</sub> is fitted per compound "
                "and a value borrowed from another fluid shifts the density by tens of per cent near "
                "the critical point.",
            ],
            "units_note": ("<p>R is used as 8.314 MPa·cm³/(mol·K), which is why the volume comes out in "
                           "cubic centimetres per mole and the density in grams per cubic centimetre. "
                           "Multiply by a thousand for kilograms per cubic metre.</p>"),
            "limits": [
                "<strong>An empirical correlation.</strong> Rackett is good to a few per cent over most "
                "of the liquid range and poorer near the critical point.",
                "<strong>Saturated liquid only.</strong> Compressed liquid at higher pressure is denser "
                "by a small amount the page does not model.",
            ],
            "uses": [
                "<li>Scaling a level gauge on a refrigerated ethylene tank.</li>",
                "<li>Getting a density for a pump or relief calculation.</li>",
                "<li>Seeing how steeply the density falls near the critical point.</li>",
            ],
        },
        faq=[
            ("Why is ethylene stored cold rather than compressed?",
             "Because its critical temperature is only 282 K: above that it cannot be liquefied by "
             "pressure alone. Refrigeration keeps it as a liquid at modest pressure."),
            ("How accurate is Rackett?",
             "A few per cent over the normal liquid range, degrading toward the critical point where all "
             "such correlations struggle."),
        ],
        no_round_trip=["critical_temperature"],
        related=[("/chemistry/molar-mass", "Molar mass"),
                 ("/chemistry/vapour-pressure-of-water", "Vapour pressure of water"),
                 ("/chemistry/standard-temperature-and-pressure", "Standard conditions")],
    ),

    S(
        slug="residence-time",
        name="Residence time",
        title="Residence Time Calculator: Column Length and Flow",
        desc="Work out how long a sample spends travelling inside a chromatography column, from the column's length, its internal diameter and the flow you set on the pump.",
        what=("<p>A sample moving through a column at the mobile phase's linear velocity stays for the "
              "column's length divided by that velocity: <strong>t = L ÷ u</strong>, where "
              "<strong>u = Q ÷ A</strong>. The page reports the cross-section, the linear velocity and "
              "the residence time.</p>"),
        fields=[
            F("length", "Column length", "cm", 25,
              "25 cm is a standard analytical column"),
            F("diameter", "Internal diameter", "mm", 4.6,
              "4.6 mm is the usual bore for a 25 cm column"),
            F("flow", "Flow rate", "mL/min", 1.0,
              "What the pump is delivering"),
        ],
        results=[
            R("area", "Column cross-section", "cm²"),
            R("linear_velocity", "Linear velocity", "cm/min"),
            R("residence_time", "Residence time", "min"),
            R("residence_time_s", "Residence time", "s"),
        ],
        formula={
            "area": "pi*pow(diameter/20,2)",
            "linear_velocity": "flow/(pi*pow(diameter/20,2))",
            "residence_time": "length/(flow/(pi*pow(diameter/20,2)))",
            "residence_time_s": "length/(flow/(pi*pow(diameter/20,2)))*60",
            "length": "residence_time*flow/(pi*pow(diameter/20,2))",
            "diameter": "20*sqrt(flow*residence_time/(pi*length))",
            "flow": "length*pi*pow(diameter/20,2)/residence_time",
        },
        prose={
            "why": ("<p>Residence time is what connects the flow you set to the time the sample actually "
                    "spends on the stationary phase. It is the number to change when a method is "
                    "transferred from a 4.6 mm column to a 2.1 mm one, and it is why a narrower column "
                    "needs a lower flow to keep the same time.</p>"),
            "formula_note": ("<p>Area is π times the square of the radius, and the radius in centimetres "
                             "is the diameter in millimetres divided by twenty. Flow divided by area "
                             "gives the velocity, and length divided by velocity gives the time.</p>"),
            "example_note": ("<p>A 25 cm column of 4.6 mm bore at 1.0 mL/min: the area is 0.166 cm², so "
                             "the linear velocity is 6.0 cm/min and the sample spends 4.2 minutes in the "
                             "column. Halve the bore to 2.1 mm and the same flow gives more than twice "
                             "the velocity — and the retention time falls with it.</p>"),
            "reading": ("<p>Compare the residence time with the run time: a gradient that reaches the "
                        "detector before the sample has left the column is not doing anything. And keep "
                        "the linear velocity near the optimum for the particle size, or efficiency pays "
                        "for the convenience.</p>"),
            "scenarios": [
                {"inputs": {"length": 15, "diameter": 2.1, "flow": 0.3},
                 "note": "A narrow-bore column: 0.0346 cm², 8.7 cm/min and 1.7 minutes of travel."},
                {"inputs": {"length": 25, "diameter": 4.6, "flow": 2.0},
                 "note": "Doubling the flow halves the residence time to 2.1 minutes, at the cost of "
                         "back-pressure."},
            ],
            "pitfalls": [
                "<strong>Diameter used as the radius.</strong> The area formula needs the radius; "
                "putting the diameter in makes the area four times too large.",
                "<strong>Millimetres mixed with centimetres.</strong> The page converts the bore for "
                "you, but hand calculations often do not.",
                "<strong>Residence time read as retention time.</strong> The chromatographic retention "
                "time also includes time on the stationary phase and is always longer.",
            ],
            "units_note": ("<p>Millilitres per minute over square centimetres gives centimetres per "
                           "minute, so the residence time comes out in minutes. The bore is entered in "
                           "millimetres because that is how columns are sold, and converted inside the "
                           "formula.</p>"),
            "limits": [
                "<strong>It ignores the packing.</strong> Interstitial velocity is higher than the "
                "average, because the particles take up volume.",
                "<strong>It assumes plug flow.</strong> Real flow spreads, so molecules leave over a "
                "range of times.",
            ],
            "uses": [
                "<li>Converting a method between column dimensions.</li>",
                "<li>Checking that a gradient fits inside a run.</li>",
                "<li>Working out linear velocity for a kinetic plot.</li>",
            ],
        },
        faq=[
            ("How do I keep the same residence time when I change the column diameter?",
             "Scale the flow with the square of the diameter: a 2.1 mm column takes about 0.21 of the "
             "flow of a 4.6 mm one for the same linear velocity."),
            ("Is residence time the same as retention time?",
             "No. Residence time is how long the mobile phase takes to pass; retention time adds the "
             "time the analyte spends interacting with the stationary phase."),
        ],
        related=[("/chemistry/detention-time", "Detention time"),
                 ("/chemistry/hydraulic-retention-time", "Hydraulic retention time"),
                 ("/chemistry/dilution-factor", "Dilution factor")],
    ),

    S(
        slug="two-photon-absorption",
        name="Two-photon absorption",
        title="Two-Photon Absorption Calculator: Excitation Rate",
        desc="Estimate how often a fluorophore is excited by two photons at once, from its cross-section, the laser power, the pulse timing and the size of the focus.",
        what=("<p>Two-photon absorption is proportional to the square of the intensity. For a pulsed "
              "laser the rate per molecule is <strong>R = σ₂·Φ²</strong>, where σ₂ is the cross-section "
              "in Goeppert-Mayer units and Φ the photon flux during a pulse.</p>"),
        fields=[
            F("cross_section", "Two-photon cross-section", "GM", 50,
              "1 GM is 10⁻⁵⁰ cm⁴·s/photon; dyes run from 1 to 1 000"),
            F("average_power", "Average laser power", "mW", 10,
              "Measured at the sample"),
            F("repetition_rate", "Pulse repetition rate", "MHz", 80,
              "80 MHz for a typical Ti:sapphire oscillator"),
            F("pulse_width", "Pulse duration", "fs", 100,
              "Full width at half maximum"),
            F("beam_area", "Focal spot area", "µm²", 0.3,
              "The diffraction-limited area, roughly π·r²"),
            F("wavelength", "Wavelength", "nm", 800,
              "Twice the single-photon absorption wavelength"),
        ],
        results=[
            R("pulse_energy", "Energy per pulse", "µJ"),
            R("peak_power", "Peak power", "W"),
            R("intensity", "Peak intensity", "GW/cm²"),
            R("photon_flux", "Peak photon flux", "photons/(cm²·s)"),
            R("excitation_rate", "Excitation rate per molecule", "s⁻¹"),
        ],
        formula={
            "pulse_energy": "average_power/repetition_rate*0.001",
            "peak_power": "average_power/(repetition_rate*pulse_width)*pow(10,6)",
            "intensity": "average_power/(repetition_rate*pulse_width)*pow(10,6)/(beam_area*pow(10,-8))/pow(10,9)",
            "photon_flux": "intensity*pow(10,9)*wavelength*pow(10,-7)/pow(10,-23)/1.9878",
            "excitation_rate": "cross_section*pow(10,-50)*pow(photon_flux,2)*pulse_width*pow(10,-15)*repetition_rate*pow(10,6)",
            "average_power": "pulse_energy*repetition_rate*1000",
            "beam_area": "average_power/(repetition_rate*pulse_width)*pow(10,6)/(intensity*pow(10,9))/pow(10,-8)",
            "wavelength": "photon_flux*pow(10,-23)*1.9878/(intensity*pow(10,9))/pow(10,-7)",
            "cross_section": "excitation_rate/(pow(10,-50)*pow(photon_flux,2)*pulse_width*pow(10,-15)*repetition_rate*pow(10,6))",
        },
        prose={
            "why": ("<p>Two-photon microscopy excites a fluorophore with two infrared photons instead of "
                    "one visible one, which confines excitation to the focal volume and lets you image "
                    "deep into scattering tissue. The rate calculation says whether a given dye, laser "
                    "and focus will give enough signal and not too much photobleaching.</p>"),
            "formula_note": ("<p>The intensity depends on the square of the peak power over the area, and "
                             "only the pulse peak matters — the average power is spread over the duty "
                             "cycle. Because the rate goes as the square of the flux, doubling the power "
                             "quadruples the excitation.</p>"),
            "example_note": ("<p>10 mW at 80 MHz is 0.125 nJ per pulse; squeezed into 100 fs that is "
                             "1.25 kW of peak power, which over a 0.3 µm² spot is about 420 GW/cm². "
                             "With a 50 GM cross-section and a duty cycle set by the pulse train, the "
                             "excitation rate is around 1.1 × 10⁷ per second — useful signal, and "
                             "enough to bleach if it is sustained.</p>"),
            "reading": ("<p>Compare the rate with the fluorophore's lifetime: at 1.1 × 10⁷ per second and a "
                        "three-nanosecond lifetime the product is 0.03, comfortably below saturation. "
                        "Push it toward one and the signal stops scaling with power.</p>"),
            "scenarios": [
                {"inputs": {"cross_section": 10, "average_power": 5, "repetition_rate": 80,
                            "pulse_width": 200, "beam_area": 0.5, "wavelength": 900},
                 "note": "A weaker dye, a quarter of the peak intensity and a longer wavelength: the rate falls "
                         "to about 1.3 × 10⁵ per second, some ninety times lower."},
                {"inputs": {"cross_section": 100, "average_power": 20, "repetition_rate": 80,
                            "pulse_width": 100, "beam_area": 0.3, "wavelength": 800},
                 "note": "Better dye and twice the power: the flux squares to four and the cross-section "
                         "doubles, so the rate is about eight times higher."},
            ],
            "pitfalls": [
                "<strong>Average power used as peak power.</strong> With 100 fs pulses at 80 MHz the peak "
                "power is five orders of magnitude higher, and the rate depends on it.",
                "<strong>The spot area estimated from the wavelength alone.</strong> A real objective's "
                "focus is diffraction-limited but not perfect; measuring the area with a bead scan is "
                "better.",
                "<strong>Units of the cross-section.</strong> A goeppert-mayer is 10⁻⁵⁰ "
                "cm⁴·s/photon, not 10⁻⁵⁰ cm² — the fourth power of length is what makes it a "
                "two-photon quantity.",
            ],
            "units_note": ("<p>Power in milliwatts, repetition rate in megahertz and pulse width in "
                           "femtoseconds give pulse energy in microjoules and peak power in watts. The "
                           "spot area is entered in square micrometres and converted to square "
                           "centimetres, which is what the intensity needs.</p>"),
            "limits": [
                "<strong>A simplified model.</strong> It ignores the pulse's temporal shape and the "
                "beam's Gaussian profile; both reduce the true rate by a factor of order one.",
                "<strong>No saturation.</strong> At high rates the ground state depletes and the "
                "measured rate falls below the square law.",
            ],
            "uses": [
                "<li>Comparing dyes for a two-photon microscope.</li>",
                "<li>Checking whether a laser setting will saturate a fluorophore.</li>",
                "<li>Estimating bleaching before a long time-lapse.</li>",
            ],
        },
        faq=[
            ("Why does two-photon absorption need pulsed lasers?",
             "Because the rate goes as the square of the intensity. Short pulses pack the same average "
             "power into a tiny fraction of the time, raising the peak intensity enormously."),
            ("What is a goeppert-mayer?",
             "The unit of two-photon cross-section, 10⁻⁵⁰ cm⁴·s per photon, named after the physicist "
             "who predicted the effect."),
        ],
        related=[("/chemistry/beer-lambert-law", "Beer-Lambert law"),
                 ("/chemistry/rate-constant", "Rate constant"),
                 ("/chemistry/activation-energy", "Activation energy")],
    ),

    S(
        slug="young-laplace-equation",
        name="Young Laplace equation",
        title="Young-Laplace Equation Calculator: Capillary Rise",
        desc="Get the capillary pressure and the height of the rise in a narrow tube from surface tension, contact angle, tube radius and the density of the liquid itself.",
        what=("<p>A curved meniscus supports a pressure difference: <strong>ΔP = 2γ·cosθ ÷ r</strong>, "
              "and that pressure lifts a column of liquid to <strong>h = ΔP ÷ (ρ·g)</strong>. Wetting "
              "liquids (θ below 90°) rise; non-wetting ones are depressed.</p>"),
        fields=[
            F("surface_tension", "Surface tension", "mN/m", 72.0,
              "72.0 for water at 25 °C", bounds=(1, 500)),
            F("contact_angle", "Contact angle", "°", 0,
              "0° for perfectly wetting glass; 140° for a hydrophobic surface", bounds=(0, 180)),
            F("radius", "Capillary radius", "mm", 0.5,
              "Half the tube's bore", bounds=(0.001, 10)),
            F("density", "Liquid density", "kg/m³", 1000,
              "1 000 for water", bounds=(100, 14000)),
        ],
        results=[
            R("capillary_pressure", "Capillary pressure", "Pa"),
            R("capillary_rise", "Capillary rise", "mm"),
            R("capillary_rise_m", "Capillary rise", "m"),
        ],
        formula={
            "capillary_pressure": "2*surface_tension*cos(contact_angle*pi/180)/radius",
            "capillary_rise": "2*surface_tension*cos(contact_angle*pi/180)/radius/(density*9.81)*1000",
            "capillary_rise_m": "2*surface_tension*cos(contact_angle*pi/180)/radius/(density*9.81)",
            "surface_tension": "capillary_pressure*radius/(2*cos(contact_angle*pi/180))",
            "contact_angle": "acos(capillary_pressure*radius/(2*surface_tension))*180/pi",
            "radius": "2*surface_tension*cos(contact_angle*pi/180)/capillary_pressure",
            "density": "2*surface_tension*cos(contact_angle*pi/180)/radius/(capillary_rise_m*9.81)",
        },
        prose={
            "why": ("<p>The Young–Laplace equation explains why water climbs a narrow tube, why a wetting "
                    "liquid soaks into paper, and why mercury is pushed down a thermometer's bore. It "
                    "also sets the pressure a membrane or a filter must overcome to let a non-wetting "
                    "liquid through.</p>"),
            "formula_note": ("<p>The factor of two is there because the meniscus is a sphere with two "
                             "principal radii of curvature. The contact angle enters through its cosine, "
                             "which is why a 90° angle gives no rise at all and a hydrophobic surface "
                             "gives a negative one.</p>"),
            "example_note": ("<p>Water in a 0.5 mm radius tube: 2 × 72 mN/m ÷ 0.5 mm is 288 Pa, and "
                             "288 Pa over a water column is 29.4 mm of rise. Use a 0.05 mm capillary and "
                             "the rise becomes 294 mm — ten times higher, because the radius is in the "
                             "denominator.</p>"),
            "reading": ("<p>Read the sign with the contact angle: below 90° the liquid rises, exactly 90° "
                        "it is flat, and above 90° the result is negative — a depression, as mercury "
                        "shows in a glass tube.</p>"),
            "scenarios": [
                {"inputs": {"surface_tension": 72.8, "contact_angle": 0, "radius": 0.1, "density": 998},
                 "note": "A finer capillary: 1 456 Pa and a 149 mm rise, the classic barometer-tube "
                         "result."},
                {"inputs": {"surface_tension": 72.8, "contact_angle": 120, "radius": 0.5, "density": 1000},
                 "note": "A hydrophobic surface: the pressure reverses and the liquid is pushed down "
                         "14.8 mm."},
                {"inputs": {"surface_tension": 485, "contact_angle": 140, "radius": 0.2, "density": 13534},
                 "note": "Mercury in glass: 3 715 Pa of pressure pushing it down, a depression of about "
                         "28 mm."},
            ],
            "pitfalls": [
                "<strong>Diameter entered as radius.</strong> The radius is what appears in the "
                "equation, and using the bore doubles the answer.",
                "<strong>Degrees passed straight to cosine.</strong> The formula converts to radians "
                "inside; a hand calculation that forgets gives nonsense.",
                "<strong>The contact angle assumed zero.</strong> Real surfaces rarely wet perfectly, "
                "and a 30° angle already cuts the rise by 13 per cent.",
            ],
            "units_note": ("<p>Surface tension in millinewtons per metre and radius in millimetres "
                           "cancel their factors of a thousand, so the pressure comes out directly in "
                           "pascals. Dividing by density times gravity then gives metres, and the page "
                           "shows millimetres as well.</p>"),
            "limits": [
                "<strong>A clean, cylindrical tube.</strong> Contamination and taper change the contact "
                "angle and the result.",
                "<strong>It ignores the meniscus mass.</strong> For a wide tube the correction is tiny; "
                "for a very narrow one the curved volume matters.",
                "<strong>It is static.</strong> It says nothing about the rate of rise once flow is "
                "involved.",
            ],
            "uses": [
                "<li>Working out how far water climbs in a capillary.</li>",
                "<li>Sizing a hydrophobic membrane's breakthrough pressure.</li>",
                "<li>Explaining why a meniscus is curved.</li>",
            ],
        },
        faq=[
            ("Why does a narrower tube lift the liquid higher?",
             "Because the same surface tension acts around a smaller perimeter, so the pressure it "
             "supports is larger — the radius is in the denominator."),
            ("Why does mercury go down instead of up?",
             "Its contact angle with glass is around 140°, so the cosine is negative and the pressure "
             "points the other way."),
        ],
        related=[("/chemistry/osmotic-pressure", "Osmotic pressure"),
                 ("/chemistry/vapour-pressure-of-water", "Vapour pressure of water"),
                 ("/chemistry/partial-pressure", "Partial pressure")],
    ),
]
