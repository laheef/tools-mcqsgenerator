"""Batch 6b — electrical sizings and shop-floor arithmetic."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="junction-box-sizing",
        name="Junction box sizing",
        title="Junction Box Sizing Calculator: Volume Required",
        desc="Work out the volume a junction box needs from its conductors, devices, clamps and grounds, and the smallest standard box that will hold them.",
        what=("<p><strong>Volume = (conductors + 2 × devices + clamps + grounds) × unit volume</strong>, then "
              "rounded up to a box size.</p>"),
        fields=[
            F("conductors", "Current-carrying conductors", "", 8, "Count every one"),
            F("devices", "Devices", "", 1, "Each counts as two"),
            F("clamps", "Clamps", "", 1, "One allowance if fitted"),
            F("grounds", "Grounds", "", 1, "One allowance for all"),
            F("conductor_volume", "Volume per conductor", "in³", 2.25, "From the wire gauge table"),
        ],
        results=[
            R("unit_count", "Volume units", ""),
            R("required_volume", "Volume required", "in³"),
            R("min_box", "Smallest box", "in³"),
            R("units_left", "Units at", ""),
        ],
        formula={
            "unit_count": "conductors+2*devices+clamps+grounds",
            "required_volume": "(conductors+2*devices+clamps+grounds)*conductor_volume",
            "min_box": "ceil((conductors+2*devices+clamps+grounds)*conductor_volume/5)*5",
            "units_left": "ceil((conductors+2*devices+clamps+grounds)*conductor_volume/5)*5/conductor_volume",
            "conductors": "unit_count-2*devices-clamps-grounds",
            "devices": "(unit_count-conductors-clamps-grounds)/2",
            "clamps": "unit_count-conductors-2*devices-grounds",
            "grounds": "unit_count-conductors-2*devices-clamps",
        },
        prose={
            "why": ("<p>Choosing a box is the reverse of checking one: the wiring is known, and the question is "
                    "how much cubic inches it needs. Because boxes come in a handful of standard volumes, the "
                    "practical answer is the next size up from the arithmetic.</p>"),
            "formula_note": ("<p>Each conductor counts once, each device twice, each clamp once, and all the "
                             "grounds together once. Those units times the volume a single conductor of the "
                             "circuit requires gives the volume needed. The standard box sizes step in fives, "
                             "so the requirement is rounded up to the next multiple of five.</p>"),
            "example_note": ("<p>{unit_count} volume units at {conductor_volume|unit} need "
                             "{required_volume|unit}, so the smallest sensible box is {min_box|unit}, which "
                             "holds {units_left} units.</p>"),
            "reading": ("<p>Read the box size against the requirement: a box near the bottom of its size will "
                        "be crowded when the device is folded back. Half a size of headroom is worth the small "
                        "extra cost.</p>"),
            "scenarios": [
                {"inputs": {"conductors": 6, "devices": 0, "clamps": 0, "grounds": 1},
                 "note": "A splice box: conductors and a ground only."},
                {"inputs": {"conductors": 12, "devices": 2, "conductor_volume": 2.25},
                 "note": "A busy box with two devices."},
            ],
            "pitfalls": [
                "<strong>Devices counted once.</strong> They take two units each.",
                "<strong>Grounds counted individually.</strong> One allowance covers them.",
                "<strong>Volume per conductor guessed.</strong> It comes from the gauge table.",
            ],
            "units_note": ("<p>Counts as pieces, volume in cubic inches, box size in cubic inches.</p>"),
            "limits": [
                "<strong>Standard boxes.</strong> Special boxes have their own rules.",
                "<strong>No code check.</strong> Confirm against your edition.",
            ],
            "uses": [
                "<li>Choosing a box for a junction.</li>",
                "<li>Checking a box already fitted.</li>",
                "<li>Teaching the volume-unit method.</li>",
            ],
        },
        faq=[
            ("How many cubic inches do I need?",
             "The volume units times the volume per conductor — the form does it and rounds to a box size."),
            ("Does a device count as two conductors?",
             "Yes, two volume units of the largest conductor."),
        ],
        related=[("/construction/box-fill", "Box fill"),
                 ("/construction/clearance-hole", "Clearance hole"),
                 ("/construction/hole-volume", "Hole volume")],
    ),

    S(
        slug="liters-per-minute",
        name="Litres per minute",
        title="Litres per Minute Calculator: Flow Rate Conversion",
        desc="Convert a volume and a time into litres per minute, with the same flow in litres per second and US gallons per minute.",
        what=("<p><strong>L/min = litres × 60 ÷ seconds</strong>.</p>"),
        fields=[
            F("liters", "Volume", "L", 200, "Total measured"),
            F("seconds", "Time", "s", 60, "Duration"),
        ],
        results=[
            R("lpm", "Flow", "L/min"),
            R("lps", "Flow", "L/s"),
            R("gpm", "Flow", "gpm"),
            R("m3h", "Flow", "m³/h"),
        ],
        formula={
            "lpm": "liters*60/seconds",
            "lps": "liters/seconds",
            "gpm": "liters*60/seconds/3.78541",
            "m3h": "liters*60/seconds*0.06",
            "liters": "lpm*seconds/60",
            "seconds": "liters*60/lpm",
        },
        prose={
            "why": ("<p>Metric plumbing is quoted in litres a minute and imperial plumbing in gallons a minute, "
                    "and the two are close enough to be confused. A shower in litres a minute sounds larger "
                    "than the same shower in gallons, and a datasheet in either unit is no use until it is in "
                    "the one your fixtures use.</p>"),
            "formula_note": ("<p>Litres per minute is the volume multiplied by sixty and divided by the seconds "
                             "it took. Litres per second is the same volume over the raw seconds. Gallons a "
                             "minute divides the metric answer by three point seven eight five, and cubic "
                             "metres an hour multiplies it by sixty thousandths.</p>"),
            "example_note": ("<p>{liters|unit} in {seconds|unit} is {lpm|unit}, or {lps|unit}, or {gpm|unit} in "
                             "US gallons, and {m3h|unit}.</p>"),
            "reading": ("<p>Read the litres a minute against the gallons: a gallon is under four litres, so "
                        "the metric figure should be roughly four times the imperial one. A ratio near one "
                        "means a conversion has been skipped.</p>"),
            "scenarios": [
                {"inputs": {"liters": 10, "seconds": 30},
                 "note": "A tap test: twenty litres a minute."},
                {"inputs": {"liters": 1200, "seconds": 600},
                 "note": "A long pump test at a steady rate."},
                {"inputs": {"liters": 2, "seconds": 15},
                 "note": "A dripping outlet: eight litres a minute."},
            ],
            "pitfalls": [
                "<strong>Time in minutes.</strong> This form asks for seconds.",
                "<strong>US and imperial gallons mixed.</strong> They differ by a fifth.",
                "<strong>Average flow used as peak demand.</strong>",
            ],
            "units_note": ("<p>Volume in litres, time in seconds, flow in litres per minute and second, US "
                           "gallons per minute and cubic metres per hour.</p>"),
            "limits": [
                "<strong>Steady flow.</strong> A pump's rate depends on head.",
                "<strong>No pressure.</strong> Flow alone does not describe a supply.",
            ],
            "uses": [
                "<li>Converting a pump datasheet.</li>",
                "<li>Checking a shower flow rate.</li>",
                "<li>Recording a borehole yield.</li>",
            ],
        },
        faq=[
            ("How do I convert litres per minute to gallons per minute?",
             "Divide by 3.785."),
            ("How many litres a minute is a good shower?",
             "About nine or ten, which is under three gallons a minute."),
        ],
        related=[("/construction/gallons-per-minute", "Gallons per minute"),
                 ("/construction/fire-flow", "Fire flow"),
                 ("/construction/cfm", "CFM")],
    ),

    S(
        slug="tonnage",
        name="Tonnage",
        title="Tonnage Calculator: Btu, kW and Tons of Cooling",
        desc="Convert a cooling capacity between Btu per hour, refrigeration tons, kilowatts and horsepower, so equipment from different datasheets can be compared.",
        what=("<p><strong>Tons = Btu/h ÷ 12 000</strong>, and <strong>kW = Btu/h ÷ 3 412</strong>.</p>"),
        fields=[
            F("btu", "Capacity", "Btu/h", 36000, "Rated cooling"),
        ],
        results=[
            R("tons", "Tonnage", "ton"),
            R("kw", "Capacity", "kW"),
            R("hp", "Capacity", "hp"),
            R("btu_per_ton", "Btu per ton", "Btu/h"),
        ],
        formula={
            "tons": "btu/12000",
            "kw": "btu/3412.14",
            "hp": "btu/3412.14/0.7457",
            "btu_per_ton": "btu/(btu/12000)",
            "btu": "tons*12000",
        },
        prose={
            "why": ("<p>Tonnage, kilowatts and horsepower all appear on cooling equipment, and none of them is "
                    "interchangeable with the others. A chiller rated in kilowatts and a split unit rated in "
                    "tons can only be compared once both are in the same unit.</p>"),
            "formula_note": ("<p>Twelve thousand Btu an hour make a ton of refrigeration, three thousand four "
                             "hundred and twelve Btu an hour make a kilowatt, and a horsepower is seven "
                             "hundred and forty six watts of shaft power — close enough to a three quarter "
                             "kilowatt that the difference is often ignored in round numbers.</p>"),
            "example_note": ("<p>{btu|unit} is {tons|unit}, or {kw|unit}, or {hp|unit} of mechanical "
                             "horsepower.</p>"),
            "reading": ("<p>Read the kilowatts per ton: it should land near three and a half. A figure near "
                        "seven means the input is a tonnage of coal or a boiler rating rather than cooling, "
                        "and a figure near one means the kilowatts are the electrical input rather than the "
                        "cooling output. Both mistakes appear on real datasheets, because a chiller is often "
                        "quoted by its compressor power while a split unit is quoted by the heat it moves.</p>"),
            "scenarios": [
                {"inputs": {"btu": 12000},
                 "note": "One ton exactly: the definition in one line."},
                {"inputs": {"btu": 120000},
                 "note": "Ten tons: a small commercial unit."},
                {"inputs": {"btu": 24000},
                 "note": "Two tons: the smallest residential splits start here."},
            ],
            "pitfalls": [
                "<strong>Tons of coal.</strong> Refrigeration tons are capacity.",
                "<strong>kW electrical confused with kW cooling.</strong> They differ threefold.",
                "<strong>Input kW used as output.</strong> Check the rating.",
                "<strong>Rounded conversions chained.</strong> Multiply by the full constants, not a rounded one.",
            ],
            "units_note": ("<p>Capacity in Btu per hour, tons of refrigeration, kilowatts and horsepower.</p>"),
            "limits": [
                "<strong>Rated capacity only.</strong> Delivered capacity depends on conditions.",
                "<strong>No efficiency.</strong> COP is a separate figure.",
                "<strong>Nameplate against delivered.</strong> Duct losses and a hot roof can take a fifth of the rated capacity before the air reaches a room.",
            ],
            "uses": [
                "<li>Comparing chillers with split units.</li>",
                "<li>Converting a datasheet to tons.</li>",
                "<li>Checking a nameplate.</li>",
            ],
        },
        faq=[
            ("How many kW is one ton of cooling?",
             "Three point five one seven."),
            ("How many Btu in one ton?",
             "Twelve thousand per hour."),
        ],
        related=[("/construction/ac-tonnage", "AC tonnage"),
                 ("/construction/air-conditioner-room-size", "Air conditioner room size"),
                 ("/construction/heat-loss", "Heat loss")],
    ),

    S(
        slug="bending-stress",
        name="Bending stress",
        title="Bending Stress Calculator: Moment, Section and Stress",
        desc="Work out the bending stress in a beam from its moment, the distance to the extreme fibre and its second moment of area, in psi and MPa.",
        what=("<p><strong>Stress = M × c ÷ I</strong>.</p>"),
        fields=[
            F("moment", "Bending moment", "lb·in", 12000, "At the section"),
            F("c", "Distance to fibre", "in", 2, "Half the depth for a rectangle"),
            F("inertia", "Second moment", "in⁴", 10, "Of the section"),
        ],
        results=[
            R("stress", "Bending stress", "psi"),
            R("stress_mpa", "Bending stress", "MPa"),
            R("section_modulus", "Section modulus", "in³"),
            R("stress_ksi", "Bending stress", "ksi"),
        ],
        formula={
            "stress": "moment*c/inertia",
            "stress_mpa": "moment*c/inertia*0.00689476",
            "section_modulus": "inertia/c",
            "stress_ksi": "moment*c/inertia/1000",
            "moment": "stress*inertia/c",
            "c": "stress*inertia/moment",
            "inertia": "moment*c/stress",
        },
        prose={
            "why": ("<p>Every beam carries a moment, and the stress that moment produces is what decides "
                    "whether the section is adequate. The same moment is far more damaging on a shallow "
                    "section than a deep one, because the stress depends on how far the extreme fibre sits from "
                    "the neutral axis.</p>"),
            "formula_note": ("<p>The moment divided by the section modulus gives the stress, and the section "
                             "modulus is the second moment of area divided by the distance to the extreme "
                             "fibre. For a rectangle that distance is half the depth, so a beam twice as deep "
                             "carries four times the moment for the same stress.</p>"),
            "example_note": ("<p>A {moment|unit} moment on a section with a {c|unit} extreme fibre and an "
                             "inertia of {inertia|unit} develops {stress|unit} — {stress_mpa|unit} — with a "
                             "section modulus of {section_modulus|unit}.</p>"),
            "reading": ("<p>Read the stress against the allowable for the material: mild steel is usually run "
                        "under twenty thousand psi, timber under fifteen hundred. Anything near double that "
                        "means the section is too shallow.</p>"),
            "scenarios": [
                {"inputs": {"moment": 24000, "c": 4, "inertia": 40},
                 "note": "A deeper beam carrying twice the moment: the same stress."},
                {"inputs": {"moment": 8000, "c": 1.5, "inertia": 3},
                 "note": "A small section under a small moment."},
            ],
            "pitfalls": [
                "<strong>Inertia about the wrong axis.</strong> Bending happens about one axis.",
                "<strong>c taken as the full depth.</strong> It is half for a symmetric section.",
                "<strong>Units mixed.</strong> lb·in with in and in⁴ gives psi.",
            ],
            "units_note": ("<p>Moment in pound-inches, distances in inches, inertia in inches to the fourth, "
                           "stress in psi, ksi and MPa.</p>"),
            "limits": [
                "<strong>Elastic range only.</strong> Yielding changes the distribution.",
                "<strong>No shear or buckling.</strong> Those are separate checks.",
            ],
            "uses": [
                "<li>Checking a beam section.</li>",
                "<li>Comparing timber with steel.</li>",
                "<li>Teaching the section modulus.</li>",
            ],
        },
        faq=[
            ("What is the bending stress formula?",
             "Moment times the distance to the extreme fibre, divided by the second moment of area."),
            ("What is the section modulus?",
             "The inertia divided by the distance to the extreme fibre — the same calculation rearranged."),
        ],
        related=[("/construction/wood-beam-span", "Wood beam span"),
                 ("/construction/beam-load", "Beam load"),
                 ("/construction/steel-weight", "Steel weight")],
    ),

    S(
        slug="bolt-torque",
        name="Bolt torque",
        title="Bolt Torque Calculator: Clamp Force and Torque",
        desc="Work out the torque needed to develop a clamp force in a bolt from its diameter and the nut factor, in foot-pounds and newton metres.",
        what=("<p><strong>Torque = K × F × d ÷ 12</strong>, with torque in foot-pounds.</p>"),
        fields=[
            F("force", "Clamp force", "lb", 8000, "Tension wanted in the bolt"),
            F("diameter", "Bolt diameter", "in", 0.5, "Nominal shank"),
            F("k_factor", "Nut factor", "", 0.2, "About 0.2 for dry steel"),
        ],
        results=[
            R("torque_ftlb", "Torque", "lb·ft"),
            R("torque_nm", "Torque", "N·m"),
            R("stress_psi", "Bolt stress", "psi"),
            R("torque_inlb", "Torque", "lb·in"),
        ],
        formula={
            "torque_ftlb": "k_factor*force*diameter/12",
            "torque_nm": "k_factor*force*diameter/12*1.35582",
            "stress_psi": "force/(3.14159/4*pow(diameter,2))",
            "torque_inlb": "k_factor*force*diameter",
            "force": "torque_ftlb*12/(k_factor*diameter)",
            "k_factor": "torque_ftlb*12/(force*diameter)",
            "diameter": "torque_ftlb*12/(k_factor*force)",
        },
        prose={
            "why": ("<p>A torque wrench does not measure tension, it measures the twist that friction and "
                    "thread geometry turn into tension. The nut factor is the fudge that connects the two, and "
                    "it is why the same torque gives very different clamp loads on dry and lubricated "
                    "threads.</p>"),
            "formula_note": ("<p>Torque is the nut factor times the clamp force times the bolt diameter, with "
                             "the division by twelve converting inch-pounds to foot-pounds. The stress follows "
                             "from the clamp force over the tensile area, which is close to the shank area for "
                             "a first estimate.</p>"),
            "example_note": ("<p>A {diameter|unit} bolt pulled to {force|unit} at a nut factor of {k_factor} "
                             "takes {torque_ftlb|unit}, or {torque_nm|unit}, and carries {stress_psi|unit}.</p>"),
            "reading": ("<p>Read the stress against the bolt's proof load: a grade 5 half-inch bolt is good for "
                        "about eighty five thousand psi, a grade 8 nearer a hundred and twenty. If the stress "
                        "is above the proof load the bolt will yield before the torque is reached.</p>"),
            "scenarios": [
                {"inputs": {"diameter": 0.75, "force": 20000},
                 "note": "A heavier bolt at a higher clamp force."},
                {"inputs": {"k_factor": 0.16, "force": 8000},
                 "note": "A lubricated thread: less torque for the same tension."},
            ],
            "pitfalls": [
                "<strong>Torque taken as tension.</strong> It is a proxy at best.",
                "<strong>Dry and lubricated mixed.</strong> The nut factor differs by a third.",
                "<strong>Reusing a torque value across diameters.</strong> Torque scales with diameter.",
            ],
            "units_note": ("<p>Force in pounds, diameter in inches, torque in foot-pounds and newton metres, "
                           "stress in psi.</p>"),
            "limits": [
                "<strong>Elastic clamping.</strong> Yielding and embedment change the tension.",
                "<strong>Static only.</strong> Vibration needs a locking method.",
            ],
            "uses": [
                "<li>Setting a torque wrench.</li>",
                "<li>Checking a bolted joint.</li>",
                "<li>Comparing lubricated assemblies.</li>",
            ],
        },
        faq=[
            ("What is a nut factor?",
             "A dimensionless factor near 0.2 that links applied torque to bolt tension for dry steel threads."),
            ("Does grease change the torque?",
             "Yes — a lubricated thread needs less torque for the same tension."),
        ],
        related=[("/construction/bolt-circle", "Bolt circle"),
                 ("/construction/clearance-hole", "Clearance hole"),
                 ("/construction/bending-stress", "Bending stress")],
    ),

    S(
        slug="carbon-equivalent",
        name="Carbon equivalent",
        title="Carbon Equivalent Calculator: Weldability of Steel",
        desc="Work out the carbon equivalent of a steel from its alloying elements, the number that decides how much preheat a weld needs.",
        what=("<p><strong>CE = C + Mn/6 + (Cr + Mo + V)/5 + (Ni + Cu)/15</strong>.</p>"),
        fields=[
            F("carbon", "Carbon", "%", 0.2, "From the mill certificate"),
            F("manganese", "Manganese", "%", 1.0, "Usually the largest addition"),
            F("chromium", "Chromium", "%", 0.1, "Alloying"),
            F("molybdenum", "Molybdenum", "%", 0.0, "Alloying"),
            F("vanadium", "Vanadium", "%", 0.0, "Micro-alloying"),
            F("nickel", "Nickel", "%", 0.1, "Alloying"),
            F("copper", "Copper", "%", 0.1, "Residual or alloying"),
        ],
        results=[
            R("ce", "Carbon equivalent", "%"),
            R("alloy_effect", "Alloy contribution", "%"),
            R("margin", "Margin to 0.4", "%"),
            R("preheat", "Suggested preheat", "°F"),
        ],
        formula={
            "ce": "carbon+manganese/6+(chromium+molybdenum+vanadium)/5+(nickel+copper)/15",
            "alloy_effect": "manganese/6+(chromium+molybdenum+vanadium)/5+(nickel+copper)/15",
            "margin": "0.4-carbon-manganese/6-(chromium+molybdenum+vanadium)/5-(nickel+copper)/15",
            "preheat": "max(0, (carbon+manganese/6+(chromium+molybdenum+vanadium)/5+(nickel+copper)/15-0.4)*500)",
            "manganese": "(ce-carbon-(chromium+molybdenum+vanadium)/5-(nickel+copper)/15)*6",
            "nickel": "(ce-carbon-manganese/6-(chromium+molybdenum+vanadium)/5-copper/15)*15",
            "copper": "(ce-carbon-manganese/6-(chromium+molybdenum+vanadium)/5-nickel/15)*15",
        },
        prose={
            "why": ("<p>Carbon makes steel hard and, past a point, makes it crack when welded. The carbon "
                    "equivalent rolls every other alloying element into an equivalent amount of carbon, so a "
                    "single number says whether a steel welds freely or needs preheat.</p>"),
            "formula_note": ("<p>Carbon counts in full, manganese at a sixth, chromium, molybdenum and "
                             "vanadium at a fifth, and nickel and copper at a fifteenth. The result is compared "
                             "with the usual threshold of four tenths of a per cent, and the suggested preheat "
                             "rises with the margin above it.</p>"),
            "example_note": ("<p>This steel has {carbon|unit} of carbon but a carbon equivalent of {ce|unit}. "
                             "That leaves a margin of {margin|unit} to the four tenths threshold and suggests a "
                             "preheat near {preheat|unit}.</p>"),
            "reading": ("<p>Read the equivalent against four tenths: below it the steel welds without preheat "
                        "in thin sections, above it the risk of hydrogen cracking climbs quickly. Past six "
                        "tenths the procedure needs engineering.</p>"),
            "scenarios": [
                {"inputs": {"carbon": 0.3, "manganese": 1.4},
                 "note": "A higher carbon steel: past the threshold and needing preheat."},
                {"inputs": {"carbon": 0.12, "manganese": 0.6, "chromium": 0.0, "nickel": 0.0, "copper": 0.0},
                 "note": "A mild steel well under the limit."},
            ],
            "pitfalls": [
                "<strong>Carbon equivalent read as carbon.</strong> They are different numbers.",
                "<strong>Elements left as fractions.</strong> The form wants per cent.",
                "<strong>Section thickness ignored.</strong> A thick section needs more preheat at the same CE.",
            ],
            "units_note": ("<p>All alloy contents in per cent by weight, preheat in Fahrenheit degrees.</p>"),
            "limits": [
                "<strong>One formula.</strong> Different equivalents exist for different standards.",
                "<strong>Guide only.</strong> A welding procedure is qualified by test.",
            ],
            "uses": [
                "<li>Deciding on preheat.</li>",
                "<li>Checking a mill certificate.</li>",
                "<li>Comparing two steels for weldability.</li>",
            ],
        },
        faq=[
            ("What carbon equivalent needs preheat?",
             "Above about 0.4 per cent, depending on thickness and the process."),
            ("How is carbon equivalent calculated?",
             "Carbon plus manganese over six plus chromium, molybdenum and vanadium over five plus nickel and "
             "copper over fifteen."),
        ],
        related=[("/construction/welding", "Welding"),
                 ("/construction/bending-stress", "Bending stress"),
                 ("/construction/steel-weight", "Steel weight")],
    ),

    S(
        slug="countersink-depth",
        name="Countersink depth",
        title="Countersink Depth Calculator: Head, Shaft and Angle",
        desc="Work out how deep to cut a countersink so a screw head sits flush, from the head diameter, the shaft diameter and the included angle.",
        what=("<p><strong>Depth = (head − shaft) ÷ (2 × tan(angle ÷ 2))</strong>.</p>"),
        fields=[
            F("head_diameter", "Head diameter", "in", 0.4, "Across the head"),
            F("shaft_diameter", "Shaft diameter", "in", 0.16, "The screw body"),
            F("angle", "Included angle", "°", 82, "Eighty two for a wood screw"),
        ],
        results=[
            R("depth", "Countersink depth", "in"),
            R("depth_mm", "Countersink depth", "mm"),
            R("radius_diff", "Head to shaft", "in"),
            R("cone_volume", "Removed volume", "in³"),
        ],
        formula={
            "depth": "(head_diameter-shaft_diameter)/(2*tan(angle/2*pi/180))",
            "depth_mm": "(head_diameter-shaft_diameter)/(2*tan(angle/2*pi/180))*25.4",
            "radius_diff": "(head_diameter-shaft_diameter)/2",
            "cone_volume": "pi/3*pow((head_diameter-shaft_diameter)/2,2)"
                           "*(head_diameter-shaft_diameter)/(2*tan(angle/2*pi/180))",
            "head_diameter": "shaft_diameter+2*tan(angle/2*pi/180)*depth",
            "shaft_diameter": "head_diameter-2*tan(angle/2*pi/180)*depth",
            "angle": "2*atan((head_diameter-shaft_diameter)/(2*depth))*180/pi",
        },
        prose={
            "why": ("<p>A countersunk screw is only flush when the cone cut matches the head. Too shallow and "
                    "the head stands proud; too deep and the wood around it is crushed and the joint loses "
                    "strength. The depth follows directly from the head and shaft diameters.</p>"),
            "formula_note": ("<p>Half the difference between head and shaft is the radius the cone has to "
                             "cover. The cone's slope is the tangent of half the included angle, so dividing "
                             "the radius by that tangent gives the depth. Wood screws are usually eighty two "
                             "degrees, machine screws ninety.</p>"),
            "example_note": ("<p>A {head_diameter|unit} head on a {shaft_diameter|unit} screw at "
                             "{angle|unit} needs a {depth|unit} countersink — {depth_mm|unit} — with a rim of "
                             "{radius_diff|unit} and {cone_volume|unit} of material removed.</p>"),
            "reading": ("<p>Read the depth against the head thickness: a countersink deeper than the head is "
                        "thin wastes the material under the screw. Anything more than half the head thickness "
                        "means the angle is wrong for the screw.</p>"),
            "scenarios": [
                {"inputs": {"head_diameter": 0.5, "shaft_diameter": 0.19, "angle": 90},
                 "note": "A machine screw with a ninety degree head."},
                {"inputs": {"head_diameter": 0.3, "shaft_diameter": 0.11, "angle": 82},
                 "note": "A small wood screw: a shallow cut."},
            ],
            "pitfalls": [
                "<strong>Included angle halved twice.</strong> The formula already halves it.",
                "<strong>Head diameter measured across flats.</strong> Use the full diameter.",
                "<strong>Depth measured from the surface.</strong> It is from the surface to the seat.",
            ],
            "units_note": ("<p>Diameters and depth in inches, angle in degrees, depth also in millimetres.</p>"),
            "limits": [
                "<strong>Sharp cone assumed.</strong> A worn bit leaves a rounded seat.",
                "<strong>No material compression.</strong> Softwood crushes a little.",
            ],
            "uses": [
                "<li>Setting a countersink bit.</li>",
                "<li>Choosing a bit for a screw.</li>",
                "<li>Checking a flush finish.</li>",
            ],
        },
        faq=[
            ("How deep should a countersink be?",
             "Roughly (head − shaft) divided by twice the tangent of half the angle."),
            ("What angle are wood screw heads?",
             "Eighty two degrees; machine screws are usually ninety."),
        ],
        related=[("/construction/clearance-hole", "Clearance hole"),
                 ("/construction/thread", "Thread"),
                 ("/construction/taper", "Taper")],
    ),

    S(
        slug="k-factor",
        name="K-factor",
        title="K-Factor Calculator: Bend Allowance and Deduction",
        desc="Work out the bend allowance, setback and bend deduction for a sheet metal bend from its angle, inside radius, thickness and K-factor.",
        what=("<p><strong>Bend allowance = θ × (R + K × t)</strong>, with θ in radians.</p>"),
        fields=[
            F("angle", "Bend angle", "°", 90, "Included angle of the bend"),
            F("inside_radius", "Inside radius", "in", 0.125, "To the inside face"),
            F("thickness", "Thickness", "in", 0.05, "Sheet gauge thickness"),
            F("k_factor", "K-factor", "", 0.44, "About 0.44 for air bending"),
        ],
        results=[
            R("bend_allowance", "Bend allowance", "in"),
            R("neutral_radius", "Neutral radius", "in"),
            R("setback", "Setback", "in"),
            R("bend_deduction", "Bend deduction", "in"),
        ],
        formula={
            "bend_allowance": "angle*pi/180*(inside_radius+k_factor*thickness)",
            "neutral_radius": "inside_radius+k_factor*thickness",
            "setback": "(inside_radius+thickness)*tan(angle/2*pi/180)",
            "bend_deduction": "2*(inside_radius+thickness)*tan(angle/2*pi/180)"
                              "-angle*pi/180*(inside_radius+k_factor*thickness)",
            "angle": "bend_allowance/(inside_radius+k_factor*thickness)*180/pi",
            "thickness": "(bend_allowance/(angle*pi/180)-inside_radius)/k_factor",
            "k_factor": "(bend_allowance/(angle*pi/180)-inside_radius)/thickness",
        },
        prose={
            "why": ("<p>Sheet metal does not bend on its inside face — it stretches around a neutral line "
                    "somewhere in the thickness. The K-factor says where that line sits, and without it the "
                    "flat pattern is either too long or too short by the bend allowance.</p>"),
            "formula_note": ("<p>The neutral radius is the inside radius plus the K-factor times the "
                             "thickness. Multiply that by the bend angle in radians and the answer is the arc "
                             "length along the neutral line — the bend allowance. The setback is the outside "
                             "corner distance, and the bend deduction is twice the setback less the "
                             "allowance.</p>"),
            "example_note": ("<p>A {angle|unit} bend on {thickness|unit} sheet with a {inside_radius|unit} "
                             "radius and K-{k_factor} has a neutral radius of {neutral_radius|unit} and a bend "
                             "allowance of {bend_allowance|unit}. The setback is {setback|unit} and the "
                             "deduction {bend_deduction|unit}.</p>"),
            "reading": ("<p>Read the K-factor against the process: about 0.33 for a tight bottomed bend, 0.44 "
                        "for air bending, and nearer 0.5 as the radius grows. A K-factor above half means the "
                        "neutral line has left the material.</p>"),
            "scenarios": [
                {"inputs": {"thickness": 0.125, "inside_radius": 0.25, "k_factor": 0.5},
                 "note": "A heavy bend where the neutral line sits mid-thickness."},
                {"inputs": {"angle": 45, "thickness": 0.036, "k_factor": 0.33},
                 "note": "A shallow bend in thin sheet."},
            ],
            "pitfalls": [
                "<strong>Degrees used as radians.</strong> The formula needs radians.",
                "<strong>K-factor guessed.</strong> It depends on the tooling.",
                "<strong>Allowance and deduction confused.</strong> They move opposite ways.",
            ],
            "units_note": ("<p>Angle in degrees, radii and thickness in inches, allowance and deduction in "
                           "inches.</p>"),
            "limits": [
                "<strong>Single bend.</strong> A multi-bend part accumulates tolerance.",
                "<strong>No springback.</strong> The finished angle differs slightly.",
            ],
            "uses": [
                "<li>Laying out a flat pattern.</li>",
                "<li>Setting a press brake.</li>",
                "<li>Checking a fabricator's blank size.</li>",
            ],
        },
        faq=[
            ("What is a K-factor in sheet metal?",
             "The fraction of the thickness at which the neutral bending line sits."),
            ("What is bend allowance?",
             "The arc length along the neutral line — the material consumed by the bend."),
        ],
        related=[("/construction/taper", "Taper"),
                 ("/construction/bending-stress", "Bending stress"),
                 ("/construction/material-removal-rate", "Material removal rate")],
    ),

    S(
        slug="material-removal-rate",
        name="Material removal rate",
        title="Material Removal Rate Calculator: MRR for Milling",
        desc="Work out the cubic inches a milling cut removes per minute from the width and depth of cut and the feed rate, with the metric equivalent.",
        what=("<p><strong>MRR = width of cut × depth of cut × feed rate</strong>.</p>"),
        fields=[
            F("width_cut", "Width of cut", "in", 0.5, "Radial engagement"),
            F("depth_cut", "Depth of cut", "in", 0.1, "Axial engagement"),
            F("feed_rate", "Feed rate", "in/min", 20, "Table travel"),
        ],
        results=[
            R("mrr", "Removal rate", "in³/min"),
            R("mrr_cm3", "Removal rate", "cm³/min"),
            R("mrr_hour", "Removal per hour", "in³/h"),
            R("time_per_in3", "Time per in³", "min"),
        ],
        formula={
            "mrr": "width_cut*depth_cut*feed_rate",
            "mrr_cm3": "width_cut*depth_cut*feed_rate*16.3871",
            "mrr_hour": "width_cut*depth_cut*feed_rate*60",
            "time_per_in3": "1/(width_cut*depth_cut*feed_rate)",
            "width_cut": "mrr/(depth_cut*feed_rate)",
            "depth_cut": "mrr/(width_cut*feed_rate)",
            "feed_rate": "mrr/(width_cut*depth_cut)",
        },
        prose={
            "why": ("<p>The removal rate is the productivity number in a machine shop. Two cuts that produce the "
                    "same finish can differ tenfold in cubic inches a minute, and the rate is what decides "
                    "whether a job takes an hour or a day.</p>"),
            "formula_note": ("<p>The tool sweeps a rectangular channel, so the volume removed each minute is the "
                             "width engaged times the depth times the distance travelled in that minute. Multiply "
                             "by sixteen point three nine for cubic centimetres.</p>"),
            "example_note": ("<p>A {width_cut|unit} wide cut {depth_cut|unit} deep at {feed_rate|unit} removes "
                             "{mrr|unit} — {mrr_cm3|unit} — which is {time_per_in3|unit} of cutting for every "
                             "cubic inch.</p>"),
            "reading": ("<p>Read the rate against the spindle power: a horsepower removes roughly one cubic inch "
                        "of steel a minute, three of aluminium. A rate well above that is asking for more power "
                        "than the machine has.</p>"),
            "scenarios": [
                {"inputs": {"width_cut": 2, "depth_cut": 0.25, "feed_rate": 40},
                 "note": "A heavy roughing pass: ten times the removal."},
                {"inputs": {"width_cut": 0.25, "depth_cut": 0.02, "feed_rate": 5},
                 "note": "A finishing pass: a small, precise cut."},
            ],
            "pitfalls": [
                "<strong>Feed in inches per tooth.</strong> The form wants inches per minute.",
                "<strong>Depth entered in millimetres.</strong> Keep the units consistent.",
                "<strong>Rate read as power.</strong> The two relate, but they differ by material.",
            ],
            "units_note": ("<p>Cut dimensions in inches, feed in inches per minute, removal in cubic inches and "
                           "cubic centimetres per minute.</p>"),
            "limits": [
                "<strong>Full engagement.</strong> Partial cuts need the true engaged width.",
                "<strong>No tool life.</strong> Higher rates wear the edge faster.",
            ],
            "uses": [
                "<li>Estimating machining time.</li>",
                "<li>Comparing two roughing strategies.</li>",
                "<li>Checking a cut against spindle power.</li>",
            ],
        },
        faq=[
            ("How is material removal rate calculated?",
             "Width of cut times depth of cut times feed rate."),
            ("How much steel can one horsepower remove?",
             "Roughly a cubic inch a minute in mild steel."),
        ],
        related=[("/construction/spindle-speed", "Spindle speed"),
                 ("/construction/k-factor", "K-factor"),
                 ("/construction/punch-force", "Punch force")],
    ),
]
