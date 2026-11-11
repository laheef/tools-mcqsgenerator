"""


Everyday-life batch L: things that turn, and things that travel.

Ten pages of machinery and motion — engine rpm from road speed, speedometer
gears, compression ratio and cranking pressure, turbo airflow, brake-specific
fuel consumption, crosswind, nautical miles, hull speed, traffic density and
running cadence — and four numbers that are only arithmetic wearing a costume:
flight radiation, the odds of meeting someone, and Galleons.

Every constant is a stated one: 336 for rpm, 1 728 cubic inches to a cubic
foot, 0.076 pounds per cubic foot of air, 1.852 kilometres to a nautical mile,
17 Sickles to a Galleon.

"""

from __future__ import annotations

from lib import F, R, S, SEL

SPECS: list = []
# ---------------------------------------------------------------------- rpm

SPECS.append(S(
    slug="rpm",
    name="RPM Calculator",
    title="RPM Calculator — Road Speed to Engine Speed",
    desc="Road speed, tyre diameter and gearing turned into engine rpm, with wheel rpm and the "
         "speed a given rpm reaches — the three numbers a gearing change is judged on.",
    what="The engine speed a car turns at a given road speed, the wheel speed underneath it, and "
         "the road speed a chosen rpm produces in the same gear.",
    fields=[
        F("speed", "Road speed", "mph", 60),
        F("tire", "Tyre diameter", "in", 26),
        F("gear", "Gearbox ratio", "x", 1,
          help="First is 3 to 4, fourth or fifth is usually 1.0, and an overdrive is below 1."),
        F("axle", "Final drive ratio", "x", 3.55),
        F("target", "Rpm to check", "rpm", 6000),
    ],
    results=[
        R("rpm", "Engine speed", "rpm"),
        R("wheel", "Wheel speed", "rpm"),
        R("speed_at", "Speed at that rpm", "mph"),
    ],
    formula={
        "rpm": "speed * gear * axle * 336 / tire",
        "wheel": "speed * 336 / tire",
        "speed_at": "target * tire / (gear * axle * 336)",
    },
    prose={
        "why": "<p>A wheel of a known diameter covers a known distance per turn, so road speed is "
               "a wheel speed and engine speed is that multiplied by the gearing. The constant "
               "336 is what remains after converting miles an hour into revolutions a minute.</p>"
               "<p>Sixty miles an hour on 26-inch tyres with a 3.55 axle in direct gear is 2 753 "
               "rpm, and the wheels are turning at 775. Change the axle to 4.10 and the same "
               "road speed is 3 179 rpm — a quarter more noise for a quarter more pull.</p>",
        "formula_note": "Speed times the gearbox ratio times the axle ratio times 336, divided by "
                        "the tyre diameter. Wheel speed leaves the gearing out, and the speed at "
                        "a target rpm is the same relation solved the other way.",
        "reading": "60 mph on a 26-inch tyre with a 3.55 axle is 2 753 rpm and 775 at the wheels. "
                   "At 6 000 rpm the same car is doing 131 mph in that gear.",
        "example_note": "The diameter matters more than people expect: a 24-inch tyre at the same "
                        "speed is 2 982 rpm, which is most of a gear change's worth of revs.",
        "pitfalls": [
            "<strong>Using the nominal tyre size.</strong> A 225/45 R17 is 24.97 inches new and "
            "smaller worn, and the rpm rises as the tread goes. Use the measured diameter.",
            "<strong>Forgetting the converter.</strong> An automatic with a slipping converter "
            "turns more rpm than the gearing says at low speed. The formula is exact only when "
            "the converter is locked.</li>".replace("</li>", ""),
        ],
        "limits": [
            "<li><strong>One gear, one axle.</strong> A car with a lock-up converter and a "
            "slipping clutch is outside the arithmetic at the ends of the range.</li>",
        ],
        "uses": [
            "<li>Working out the revs at cruising speed before a gear change.</li>",
            "<li>Checking whether a tyre size change will make the engine drone.</li>",
        ],
        "scenarios": [
            {"inputs": {"speed": 60, "tire": 26, "gear": 1, "axle": 4.1, "target": 6000},
             "note": "A 4.10 axle at 60 mph is 3 179 rpm and 6 000 rpm arrives at 113 mph — "
                     "quicker off the line and louder on the motorway."},
        ],
    },
    faq=[
        ("Where does 336 come from?",
         "It converts miles an hour and inches into revolutions a minute: 60 minutes, 5 280 feet "
         "and 12 inches, divided by pi, give 336 to three figures."),
        ("Why is wheel speed useful?",
         "Because it tells you what the brakes and bearings are doing, and it is the figure a "
         "dyno measures at the rollers before the gearing."),
        ("Does tyre wear change the answer?",
         "A tyre worn from 8 mm to 2 mm of tread loses about 12 mm of diameter, which is half a "
         "per cent of the rpm. Small, and larger than most people's speedometer error."),
    ],
    related=[("/everyday-life/tire-size", "Tyre size"),
             ("/everyday-life/speedometer-gear", "Speedometer gear"),
             ("/everyday-life/mpg", "MPG calculator")],
    checks=[
        ({"speed": 60, "tire": 26, "gear": 1, "axle": 3.55, "target": 6000},
         {"rpm": 2752.6154, "wheel": 775.3846, "speed_at": 130.7847}, 0.01),
        ({"speed": 60, "tire": 26, "gear": 1, "axle": 4.1, "target": 6000},
         {"rpm": 3179.0769, "speed_at": 113.2324}, 0.01),
    ],
))

# ---------------------------------------------------------- speedometer gear

SPECS.append(S(
    slug="speedometer-gear",
    name="Speedometer Gear Calculator",
    title="Speedometer Gear — Teeth for the Tyre You Fitted",
    desc="Drive gear teeth, axle ratio and tyre revolutions give the driven gear a speedometer "
         "needs, and the percentage of error left if you buy the nearest whole tooth.",
    what="The speedometer gear teeth a gearbox needs for a given axle and tyre, the nearest gear "
         "that exists, and the percentage error that leaves on the dial.",
    fields=[
        F("drive", "Drive gear teeth", "teeth", 7,
          help="Counted on the output shaft, or given in the manual. Seven and eight are "
               "common."),
        F("axle", "Axle ratio", "x", 3.55),
        F("revs", "Tyre revolutions per mile", "rev/mi", 800,
          help="The tyre size page gives this: a 26-inch tyre turns about 808 times a mile."),
        F("standard", "Speedometer calibration", "rev/mi", 1000,
          help="Most mechanical speedometers are calibrated at 1 000 revolutions a mile, which "
               "is why the constant is in the formula."),
    ],
    results=[
        R("teeth", "Teeth needed", "teeth"),
        R("nearest", "Nearest whole gear", "teeth"),
        R("error", "Error with that gear", "%"),
        R("corrected", "Revs per mile that gear expects", "rev/mi"),
    ],
    formula={
        "teeth": "drive * axle * revs / standard",
        "nearest": "round(drive * axle * revs / standard)",
        "error": "(round(drive * axle * revs / standard) - drive * axle * revs / standard) / "
                 "(drive * axle * revs / standard) * 100",
        "corrected": "round(drive * axle * revs / standard) * standard / (drive * axle)",
    },
    prose={
        "why": "<p>A mechanical speedometer is a drag cup driven by a cable, and the cable turns "
               "off a pair of gears in the gearbox. Change the axle or the tyre and the cable "
               "turns at the wrong rate, which is why the dial reads high after a lift kit.</p>"
               "<p>The driven gear is the drive teeth times the axle ratio times the tyre's "
               "revolutions per mile, over the speedometer's own calibration: seven times 3.55 "
               "times 800 over a thousand is 19.88, so a 20-tooth gear is the one to buy.</p>",
        "formula_note": "Drive teeth times axle ratio times tyre revs, over the calibration. The "
                        "nearest whole tooth is rounded, and the error is that rounding as a "
                        "share of the ideal.",
        "reading": "Seven drive teeth, a 3.55 axle and 800 revs a mile call for 19.88 teeth. A "
                   "20-tooth gear leaves 0.6 per cent of error — about a third of a mile an hour "
                   "at 60.",
        "example_note": "Going to a 4.10 axle takes the ideal to 22.96, so a 23-tooth gear is "
                    "nearly exact. The same tyre, a different gear, one tooth of difference.",
        "pitfalls": [
            "<strong>Buying before counting the tyre.</strong> Revs per mile depends on the "
            "loaded radius, not the catalogue diameter. A taller tyre needs fewer teeth.",
            "<strong>Assuming every speedometer is calibrated the same.</strong> A thousand "
            "revolutions a mile is the common standard and not the only one; check the "
            "instrument before ordering.</li>".replace("</li>", ""),
        ],
        "limits": [
            "<li><strong>Mechanical speedometers.</strong> A modern car with an electronic "
            "sender takes the correction in software, and no gear will fix it.</li>",
        ],
        "uses": [
            "<li>Correcting the dial after a differential change.</li>",
            "<li>Checking a gearbox swap before the first drive.</li>",
        ],
        "scenarios": [
            {"inputs": {"drive": 7, "axle": 4.1, "revs": 800, "standard": 1000},
             "note": "A 4.10 axle calls for 22.96 teeth, so a 23-tooth gear is within 0.2 per "
                     "cent — the closest a whole tooth gets."},
        ],
    },
    faq=[
        ("How do I know how many teeth my gear has?",
         "The drive gear is inside the tailshaft housing and the driven gear is the plastic one "
         "under the speed sensor. Count the driven gear's teeth, and take the drive from the "
         "manual."),
        ("Which way does the dial go wrong?",
         "A taller tyre or a numerically lower axle makes the cable turn slower for the same "
         "speed, so the dial under-reads and the odometer under-counts."),
        ("Can I fix it with a ratio adapter?",
         "Yes, for gearboxes where the tooth count is not available. An adapter changes the "
         "cable speed by a fixed percentage and avoids taking the housing apart."),
    ],
    related=[("/everyday-life/rpm", "RPM calculator"),
             ("/everyday-life/tire-size", "Tyre size"),
             ("/everyday-life/wheel-offset", "Wheel offset")],
    checks=[
        ({"drive": 7, "axle": 3.55, "revs": 800, "standard": 1000},
         {"teeth": 19.88, "nearest": 20, "error": 0.6036, "corrected": 804.8195}, 0.01),
        ({"drive": 7, "axle": 4.1, "revs": 800, "standard": 1000},
         {"teeth": 22.96, "nearest": 23, "error": 0.1742}, 0.01),
    ],
))

# ---------------------------------------------------------- compression ratio

SPECS.append(S(
    slug="compression-ratio",
    name="Compression Ratio Calculator",
    title="Compression Ratio — Swept Volume over Clearance",
    desc="Bore, stroke and chamber volume give the swept volume and the compression ratio: the "
         "one figure that decides what fuel an engine wants.",
    what="The swept volume of one cylinder from its bore and stroke, the clearance volume from "
         "the chamber and gasket, and the compression ratio between them.",
    fields=[
        F("bore", "Bore", "in", 4),
        F("stroke", "Stroke", "in", 3.48),
        F("chamber", "Chamber volume", "cc", 64),
        F("gasket", "Gasket volume", "cc", 8),
        F("dish", "Piston dish or dome", "cc", 0,
          help="A dish adds volume and lowers the ratio; a dome subtracts and raises it. Enter "
               "the dish as a positive number and a dome as a negative one."),
    ],
    results=[
        R("swept_ci", "Swept volume", "cu in"),
        R("swept_cc", "Swept volume", "cc"),
        R("clearance", "Clearance volume", "cc"),
        R("ratio", "Compression ratio", ":1"),
    ],
    formula={
        "swept_ci": "pi / 4 * bore * bore * stroke",
        "swept_cc": "pi / 4 * bore * bore * stroke * 16.387064",
        "clearance": "chamber + gasket + dish",
        "ratio": "(pi / 4 * bore * bore * stroke * 16.387064 + chamber + gasket + dish) / "
                 "(chamber + gasket + dish)",
    },
    prose={
        "why": "<p>Compression ratio is swept volume plus clearance volume, divided by clearance "
               "volume. A 4-inch bore and a 3.48-inch stroke sweep 43.7 cubic inches, which is "
               "716.6 cc.</p>"
               "<p>With 72 cc of clearance — a 64 cc chamber and an 8 cc gasket — the ratio is "
               "10.95 to one. Take a millimetre off the head, lose 6 cc, and the same engine is "
               "11.9, which is a different fuel and a different ignition curve.</p>",
        "formula_note": "Pi over four times bore squared times stroke gives the swept volume, "
                        "multiplied by 16.387 to turn cubic inches into cubic centimetres. "
                        "Clearance is chamber plus gasket plus dish, and the ratio adds the two "
                        "and divides by the clearance.",
        "reading": "4 by 3.48 inches sweeps 43.73 cubic inches or 716.6 cc. With 72 cc of "
                   "clearance the ratio is 10.95 to one.",
        "example_note": "A 10 cc dish drops the same engine to 9.7 to one, which is the usual way "
                        "a forced-induction build lowers its ratio without changing the pistons' "
                        "bore.",
        "pitfalls": [
            "<strong>Forgetting the gasket.</strong> Eight cubic centimetres is a tenth of the "
            "clearance volume and worth about a full point of ratio on a small engine.",
            "<strong>Assuming the chamber volume on the head.</strong> Valve reliefs, plug "
            "depth and a decked block all change it. The chamber has to be measured with "
            "liquid, not read off a specification.</li>".replace("</li>", ""),
        ],
        "limits": [
            "<li><strong>One cylinder.</strong> The ratio is per cylinder, and a worn engine has "
            "a different ratio in each. This is the blueprint figure.</li>",
        ],
        "uses": [
            "<li>Checking a ratio before choosing a camshaft.</li>",
            "<li>Working out what a head skim will do to the ratio.</li>",
        ],
        "scenarios": [
            {"inputs": {"bore": 4, "stroke": 3.48, "chamber": 64, "gasket": 8, "dish": 10},
             "note": "A 10 cc dish takes the clearance to 82 and the ratio to 9.74 — the same "
                     "engine, deliberately lower for boost."},
        ],
    },
    faq=[
        ("What is a normal compression ratio?",
         "Between 9 and 11 to one for a modern petrol engine, 15 to 18 for a diesel. Above 11 "
         "needs high-octane fuel or direct injection."),
        ("Does a higher ratio always make more power?",
         "More thermal efficiency, yes, up to the point where knock forces the ignition back and "
         "the gain disappears."),
        ("Why measure the chamber instead of trusting the spec?",
         "Because heads are machined, valves are replaced and pistons differ. A burette and a "
         "plate of glass give the real number in ten minutes."),
    ],
    related=[("/everyday-life/compression-ratio-to-psi", "Cranking pressure"),
             ("/everyday-life/horsepower", "Horsepower"),
             ("/everyday-life/turbo-size", "Turbo size")],
    checks=[
        ({"bore": 4, "stroke": 3.48, "chamber": 64, "gasket": 8, "dish": 0},
         {"swept_ci": 43.731, "swept_cc": 716.62, "clearance": 72, "ratio": 10.9531}, 0.01),
        ({"bore": 4, "stroke": 3.48, "chamber": 64, "gasket": 8, "dish": 10},
         {"clearance": 82, "ratio": 9.7393}, 0.01),
    ],
))

# --------------------------------------------------- compression ratio to psi

SPECS.append(S(
    slug="compression-ratio-to-psi",
    name="Compression Ratio to PSI Calculator",
    title="Compression Ratio to PSI — What the Gauge Should Read",
    desc="A cranking compression gauge reads roughly nineteen pounds for every point of "
         "compression ratio: the rule, the number it gives, and how a camshaft moves it.",
    what="The cranking compression a given ratio should produce, and what a change of ratio or a "
         "bigger camshaft does to the reading on the gauge.",
    fields=[
        F("ratio", "Compression ratio", ":1", 10.95),
        F("psi_point", "Pounds per point of ratio", "psi", 19,
          help="Nineteen is the usual rule of thumb at sea level with a warm engine and the "
               "throttle open. Cold, closed-throttle and high altitude all read lower."),
        F("cam", "Camshaft adjustment", "%", 0,
          help="A long-duration cam bleeds compression at low speed. Ten to fifteen per cent is "
               "ordinary for a performance cam."),
    ],
    results=[
        R("psi", "Cranking pressure", "psi"),
        R("adjusted", "With the cam", "psi"),
        R("per_point", "Per point of ratio", "psi"),
        R("ratio_from", "Ratio from 180 psi", ":1"),
    ],
    formula={
        "psi": "ratio * psi_point",
        "adjusted": "ratio * psi_point * (1 - cam / 100)",
        "per_point": "psi_point",
        "ratio_from": "180 / psi_point",
    },
    prose={
        "why": "<p>A compression gauge measures the pressure the piston builds at cranking speed, "
               "and for ordinary engines it lands near nineteen pounds for every point of "
               "compression ratio. Ten and a half to one reads about 200 psi.</p>"
               "<p>The rule is a rule. A big camshaft holds the inlet valve open into the "
               "stroke and bleeds pressure, so the same engine reads 170; a cold engine, a "
               "throttle that is not held open and a mile of altitude all read low as well, and "
               "none of them is a fault.</p>",
        "formula_note": "Ratio times nineteen gives the cranking pressure. The cam adjustment "
                        "takes a percentage off, and the reverse figure divides a measured 180 "
                        "psi by the same constant to give a ratio back.",
        "reading": "10.95 to one at nineteen pounds a point is 208 psi, or 177 with a cam that "
                   "bleeds fifteen per cent. A gauge reading of 180 implies a ratio of 9.5.",
        "example_note": "Consistency matters more than the absolute number: four cylinders within "
                    "ten per cent of each other are healthy whatever the gauge says.",
        "pitfalls": [
            "<strong>Testing a cold engine.</strong> Cold rings do not seal and the reading is "
            "thirty to fifty pounds low. Warm it up, hold the throttle open and use a "
            "screw-in gauge.",
            "<strong>Reading altitude as a fault.</strong> Three per cent per thousand feet is "
            "ordinary, so a car at 5 000 feet reads fifteen per cent below its sea-level figure.",
        ],
        "limits": [
            "<li><strong>Rule of thumb.</strong> The relation depends on valve timing and "
            "camshaft duration. It predicts a healthy range, not a diagnosis.</li>",
        ],
        "uses": [
            "<li>Checking an engine against its specified ratio before buying.</li>",
            "<li>Working out whether a low gauge reading is the ratio or a fault.</li>",
        ],
        "scenarios": [
            {"inputs": {"ratio": 9.5, "psi_point": 19, "cam": 0},
             "note": "9.5 to one at the same nineteen a point is 180.5 psi — the figure most "
                     "older V8s quote, and why a modern 11:1 engine reads much higher."},
        ],
    },
    faq=[
        ("Why nineteen pounds a point?",
         "Because atmospheric pressure is 14.7 psi and the compression is roughly adiabatic, so "
         "each point of ratio adds about nineteen pounds at cranking speed. The constant is "
         "empirical."),
        ("Should the throttle be open?",
         "Wide open for a valid reading, yes. Closed throttle reads a fraction of the pressure "
         "because the cylinder cannot fill on the inlet stroke."),
        ("What difference do the rings make?",
         "A lot. A worn engine reads low and unevenly, which is exactly what the test is for: "
         "the spread across cylinders matters more than the absolute figure."),
    ],
    related=[("/everyday-life/compression-ratio", "Compression ratio"),
             ("/everyday-life/horsepower", "Horsepower"),
             ("/everyday-life/turbo-size", "Turbo size")],
    checks=[
        ({"ratio": 10.95, "psi_point": 19, "cam": 0},
         {"psi": 208.05, "adjusted": 208.05, "per_point": 19, "ratio_from": 9.4737}, 0.01),
        ({"ratio": 9.5, "psi_point": 19, "cam": 0},
         {"psi": 180.5, "adjusted": 180.5}, 0.01),
    ],
))
# --------------------------------------------------------------- turbo size

SPECS.append(S(
    slug="turbo-size",
    name="Turbo Size Calculator",
    title="Turbo Size — Airflow from Displacement and Boost",
    desc="Displacement, rpm, volumetric efficiency and boost give the airflow a turbo has to "
         "supply, in cubic feet a minute and pounds a minute, and the pressure ratio.",
    what="The airflow an engine needs at a given speed and boost, the pressure ratio the turbo "
         "runs at, and the same airflow without boost for comparison.",
    fields=[
        F("cid", "Displacement", "cu in", 122),
        F("rpm", "Engine speed", "rpm", 6000),
        F("ve", "Volumetric efficiency", "%", 90,
          help="Ninety per cent is a modern four-valve head at peak power; 80 is an older "
               "two-valve and 100 is a race engine."),
        F("boost", "Boost", "psi", 7.35),
    ],
    results=[
        R("pr", "Pressure ratio", "ratio"),
        R("cfm", "Airflow", "cfm"),
        R("lbs", "Airflow", "lb/min"),
        R("na_cfm", "Airflow without boost", "cfm"),
    ],
    formula={
        "pr": "(boost + 14.7) / 14.7",
        "cfm": "cid * rpm / 2 * (ve / 100) / 1728 * (boost + 14.7) / 14.7",
        "lbs": "cid * rpm / 2 * (ve / 100) / 1728 * (boost + 14.7) / 14.7 * 0.076",
        "na_cfm": "cid * rpm / 2 * (ve / 100) / 1728",
    },
    prose={
        "why": "<p>A four-stroke engine inhales its displacement once every two revolutions, so "
               "airflow is displacement times half the rpm, adjusted for how well the head fills "
               "and multiplied by the pressure ratio the turbo creates.</p>"
               "<p>A 122 cubic inch engine at 6 000 rpm and 90 per cent volumetric efficiency "
               "wants 190 cubic feet a minute on its own. At 7.35 pounds of boost the pressure "
               "ratio is 1.5, so the turbo has to move 286 — which is 21.7 pounds of air a "
               "minute, and roughly where a modern small turbo sits at full chat.</p>",
        "formula_note": "Displacement times half the rpm over 1 728 converts to cubic feet a "
                        "minute; the volumetric efficiency scales it and the pressure ratio "
                        "multiplies it. Pounds a minute is that volume times the 0.076 pounds a "
                        "cubic foot air weighs at sea level.",
        "reading": "122 cubic inches at 6 000 rpm and 90 per cent fills 190.6 cfm unboosted. At "
                   "7.35 psi the ratio is 1.5, so the turbo moves 286 cfm or 21.7 pounds a "
                   "minute.",
        "example_note": "Fourteen pounds of boost doubles the pressure ratio to 1.95 and asks for "
                    "372 cfm — half as much air again for a pressure that is twice atmospheric.",
        "pitfalls": [
            "<strong>Comparing cfm without the pressure ratio.</strong> A big turbo at low boost "
            "and a small one at high boost can move the same air, and only one of them will be "
            "efficient.",
            "<strong>Assuming volumetric efficiency is one number.</strong> It falls with rpm "
            "and rises with boost. Ninety per cent is a peak-power figure, not a constant.</li>".replace("</li>", ""),
        ],
        "limits": [
            "<li><strong>Steady state.</strong> The number is the airflow at one rpm. A turbo "
            "chart has to cover the whole range, from surge at low flow to choke at high.</li>",
        ],
        "uses": [
            "<li>Choosing a turbo frame before buying.</li>",
            "<li>Checking whether an intercooler is required at a given boost.</li>",
        ],
        "scenarios": [
            {"inputs": {"cid": 122, "rpm": 6000, "ve": 90, "boost": 14},
             "note": "Fourteen psi is a ratio of 1.95 and 372 cfm — 28.3 pounds a minute, which "
                     "is a bigger turbo and a stronger intercooler."},
        ],
    },
    faq=[
        ("Why half the rpm?",
         "A four-stroke takes two revolutions per cycle, so a 6 000 rpm engine breathes 3 000 "
         "times a minute. The division by two is the whole difference from a two-stroke."),
        ("What is pressure ratio?",
         "Absolute pressure after the compressor over absolute pressure before it. Seven pounds "
         "of boost on 14.7 psi of atmosphere is 22.05 over 14.7, or 1.5."),
        ("Is 0.076 pounds per cubic foot right?",
         "At sea level and 15 degrees, yes. Hot air is thinner, which is why an intercooler "
         "buys power — it puts the density back."),
    ],
    related=[("/everyday-life/horsepower", "Horsepower"),
             ("/everyday-life/compression-ratio", "Compression ratio"),
             ("/everyday-life/brake-specific-fuel-consumption", "Brake-specific fuel")],
    checks=[
        ({"cid": 122, "rpm": 6000, "ve": 90, "boost": 7.35},
         {"pr": 1.5, "cfm": 285.9375, "lbs": 21.7313, "na_cfm": 190.625}, 0.01),
        ({"cid": 122, "rpm": 6000, "ve": 90, "boost": 14},
         {"pr": 1.9524, "cfm": 372.1726, "lbs": 28.2851}, 0.01),
    ],
))

# -------------------------------------------------- brake specific fuel use

SPECS.append(S(
    slug="brake-specific-fuel-consumption",
    name="BSFC Calculator",
    title="BSFC — Fuel per Horsepower per Hour",
    desc="Pounds of fuel an hour divided by horsepower is brake-specific fuel consumption: 0.50 "
         "is an ordinary petrol engine and 0.40 is a good one, in two units.",
    what="The fuel an engine burns per horsepower per hour, from its fuel flow and its output, "
         "in pounds per horsepower-hour and in grams per kilowatt-hour.",
    fields=[
        F("hp", "Power", "hp", 300),
        F("fuel", "Fuel flow", "lb/h", 150),
        F("density", "Fuel density", "lb/gal", 6.07,
          help="Petrol is 6.0 to 6.3 pounds a gallon and diesel about 7.1."),
    ],
    results=[
        R("bsfc", "BSFC", "lb/hp·h"),
        R("g_kwh", "BSFC", "g/kWh"),
        R("gallons", "Fuel flow", "gal/h"),
        R("litres", "Fuel flow", "L/h"),
    ],
    formula={
        "bsfc": "fuel / hp",
        "g_kwh": "fuel / hp * 608.277",
        "gallons": "fuel / density",
        "litres": "fuel / density * 3.78541",
    },
    prose={
        "why": "<p>Brake-specific fuel consumption is the honest measure of an engine's "
               "efficiency: how much fuel it burns for each horsepower it makes. 0.50 pounds per "
               "horsepower-hour is ordinary, 0.45 is good, and 0.40 is a modern direct-injection "
               "engine at its best point.</p>"
               "<p>The unit looks strange until it is converted. Multiply by 608.277 and the "
               "same figure is in grams per kilowatt-hour, which is how European engines are "
               "quoted: 0.50 is 304 g/kWh, and the best diesels get under 200.</p>",
        "formula_note": "Fuel flow over power gives the figure directly. Multiply by 608.277 for "
                        "grams per kilowatt-hour, and divide the flow by the fuel density for "
                        "gallons an hour and by 3.785 for litres.",
        "reading": "150 pounds an hour at 300 horsepower is 0.50 lb/hp·h, or 304 g/kWh. That is "
                   "24.7 gallons an hour, which is 93.5 litres.",
        "example_note": "The same 300 horsepower at 0.42 needs 126 pounds an hour — 24 pounds "
                    "less, or ten per cent of the fuel, for the same output.",
        "pitfalls": [
            "<strong>Using peak power.</strong> BSFC is a curve with a best point in the middle "
            "of the range. Quoting the figure at the redline flatters nothing and hides the "
            "efficiency.",
            "<strong>Forgetting that rich is safe and wasteful.</strong> A turbo engine at "
            "0.55 is being cooled by fuel. The number is a design choice as well as a measure.",
        ],
        "limits": [
            "<li><strong>Brake power only.</strong> Indicated efficiency, which includes "
            "friction and pumping losses, is higher and less useful for a vehicle.</li>",
        ],
        "uses": [
            "<li>Working out the injector size an engine needs.</li>",
            "<li>Comparing two engines of different ages honestly.</li>",
        ],
        "scenarios": [
            {"inputs": {"hp": 300, "fuel": 126, "density": 6.07},
             "note": "126 pounds an hour is 0.42 lb/hp·h and 255 g/kWh — a modern engine at its "
                     "best point rather than a rich one."},
        ],
    },
    faq=[
        ("What does brake mean in brake-specific?",
         "Measured at the flywheel with a brake, which is what a dynamometer is. It distinguishes "
         "usable output from the indicated power inside the cylinders."),
        ("What is a good BSFC?",
         "0.45 to 0.50 for a petrol engine at full load, 0.40 for the best, and 0.33 to 0.38 for "
         "a diesel. Numbers above 0.6 mean a rich mixture."),
        ("Why 608.277?",
         "It converts pounds per horsepower-hour to grams per kilowatt-hour: 453.59 grams a "
         "pound and 0.7457 kilowatts a horsepower."),
    ],
    related=[("/everyday-life/horsepower", "Horsepower"),
             ("/everyday-life/turbo-size", "Turbo size"),
             ("/everyday-life/mpg", "MPG calculator")],
    checks=[
        ({"hp": 300, "fuel": 150, "density": 6.07},
         {"bsfc": 0.5, "g_kwh": 304.1385, "gallons": 24.7117, "litres": 93.5444}, 0.01),
        ({"hp": 300, "fuel": 126, "density": 6.07},
         {"bsfc": 0.42, "g_kwh": 255.4763, "gallons": 20.7578}, 0.01),
    ],
))

# ------------------------------------------------------------------ crosswind

SPECS.append(S(
    slug="crosswind",
    name="Crosswind Calculator",
    title="Crosswind — Splitting Wind into Cross and Head",
    desc="A 25 mph wind at 40 degrees is 16 mph across the road and 19 on the nose. The page "
         "splits the wind into the two components that decide the correction.",
    what="The crosswind and headwind components of a wind blowing at an angle to your direction "
         "of travel, and the share of it that is pushing you sideways.",
    fields=[
        F("wind", "Wind speed", "mph", 25),
        F("angle", "Angle off the nose", "deg", 40,
          help="Zero is a direct headwind, 90 is a pure crosswind, and 180 is a tailwind."),
    ],
    results=[
        R("cross", "Crosswind", "mph"),
        R("head", "Headwind", "mph"),
        R("cross_pct", "Crosswind share", "%"),
        R("effective", "Component along your track", "mph"),
    ],
    formula={
        "cross": "wind * sin(rad(angle))",
        "head": "wind * cos(rad(angle))",
        "cross_pct": "sin(rad(angle)) * 100",
        "effective": "wind * cos(rad(angle))",
    },
    prose={
        "why": "<p>A wind at an angle is two winds at once. The component across your track has "
               "to be corrected for, and the component along it either slows you down or helps. "
               "The two are the sine and the cosine of the angle.</p>"
               "<p>At 40 degrees the crosswind is 64 per cent of the total and the headwind 77 "
               "per cent, which is why a wind that feels like a headwind always has a sideways "
               "part to it. At 30 degrees the crosswind is already half the wind speed.</p>",
        "formula_note": "Wind times the sine of the angle gives the crosswind; times the cosine "
                        "gives the headwind, which is negative for a tailwind. The percentages "
                        "are the same functions without the wind speed.",
        "reading": "A 25 mph wind at 40 degrees is 16.1 mph across the track and 19.2 mph on the "
                   "nose, so 64 per cent of it is sideways and 77 per cent of it is slowing you.",
        "example_note": "A quartering wind at 45 degrees splits evenly: 70.7 per cent each way. "
                    "Beyond 60 degrees the crosswind dominates and the headwind stops mattering.",
        "pitfalls": [
            "<strong>Subtracting the angle from the wind speed.</strong> Twenty-five at forty "
            "degrees is not fifteen sideways. The relation is trigonometric and the two "
            "components add up in quadrature, not by addition.",
            "<strong>Adding the components instead of the squares.</strong> Head squared plus "
            "cross squared equals wind squared. That is the check that the split is right.</li>".replace("</li>", ""),
        ],
        "limits": [
            "<li><strong>Steady wind.</strong> Gusts add a transitory component that no "
            "component split predicts, and gust factor is a separate question.</li>",
        ],
        "uses": [
            "<li>Judging a crosswind landing against a limit.</li>",
            "<li>Working out what a side wind does to fuel use or to a bike.</li>",
        ],
        "scenarios": [
            {"inputs": {"wind": 25, "angle": 45},
             "note": "At 45 degrees the split is even: 17.7 mph across and 17.7 on the nose, 71 "
                     "per cent each."},
        ],
    },
    faq=[
        ("What is a strong crosswind for a light aircraft?",
         "A direct crosswind of 15 knots is a lot for a light plane and many have a 17-knot "
         "demonstrated limit. The number on the dial is the crosswind, not the wind."),
        ("Why is the headwind cosine?",
         "Because at zero angle the whole wind is on the nose — cosine zero is one — and at 90 "
         "degrees none of it is, which is cosine 90."),
        ("Does a tailwind count as negative?",
         "Yes. The headwind result goes negative past 90 degrees, and that negative number is the "
         "tailwind component."),
    ],
    related=[("/everyday-life/boat-speed", "Boat speed"),
             ("/everyday-life/rpm", "RPM calculator"),
             ("/everyday-life/traffic-density", "Traffic density")],
    checks=[
        ({"wind": 25, "angle": 40},
         {"cross": 16.0697, "head": 19.1511, "cross_pct": 64.2788,
          "effective": 19.1511}, 0.01),
        ({"wind": 25, "angle": 45},
         {"cross": 17.6777, "head": 17.6777, "cross_pct": 70.7107}, 0.01),
    ],
))

# ------------------------------------------------------------ nautical mile

SPECS.append(S(
    slug="nautical-mile",
    name="Nautical Mile Calculator",
    title="Nautical Mile — Knots, Miles and Kilometres",
    desc="A nautical mile is 1.852 kilometres and a knot is that per hour. The page converts a "
         "distance, a speed and the time a passage takes.",
    what="Kilometres into nautical miles, knots into kilometres and miles an hour, and the hours "
         "a passage takes at a given speed.",
    fields=[
        F("km", "Distance", "km", 100),
        F("knots", "Speed", "kn", 6),
    ],
    results=[
        R("nm", "Distance", "nm"),
        R("kmh", "Speed", "km/h"),
        R("mph", "Speed", "mph"),
        R("hours", "Passage time", "h"),
    ],
    formula={
        "nm": "km / 1.852",
        "kmh": "knots * 1.852",
        "mph": "knots * 1.15078",
        "hours": "km / 1.852 / knots",
    },
    prose={
        "why": "<p>A nautical mile is a minute of latitude, which is why charts and sextants use "
               "it: one minute of arc on the globe. It works out at 1.852 kilometres, and a knot "
               "is one of those an hour.</p>"
               "<p>A hundred kilometres is 54 nautical miles, and at six knots that is nine "
               "hours. Six knots is 11.1 kilometres an hour and 6.9 miles an hour, which is a "
               "sensible sailing speed and slower than a bicycle.</p>",
        "formula_note": "Kilometres divided by 1.852 gives nautical miles. Knots times 1.852 "
                        "gives kilometres an hour and times 1.15078 gives miles an hour. Passage "
                        "time is the distance in nautical miles over the speed.",
        "reading": "100 kilometres is 54 nautical miles. Six knots is 11.1 km/h and 6.9 mph, so "
                   "the passage takes nine hours.",
        "example_note": "A knot is not a mile an hour: 1.15078 of one. A ten-knot boat is doing "
                        "11.5 mph, which is the difference between a fast walk and a jog.",
        "pitfalls": [
            "<strong>Using statute miles on a chart.</strong> A nautical mile is fifteen per cent "
            "longer, and a passage plotted in the wrong one is off by an hour in six.",
            "<strong>Confusing speed with distance.</strong> A knot is a speed and a nautical "
            "mile is a distance. \"Knots per hour\" is a tautology that has never meant anything.</li>".replace("</li>", ""),
        ],
        "limits": [
            "<li><strong>Still water.</strong> A passage time ignores current and leeway, both of "
            "which can be a knot either way and neither of which is in this page.</li>",
        ],
        "uses": [
            "<li>Planning a day sail from a chart distance.</li>",
            "<li>Converting a boat's speed for someone who thinks in mph.</li>",
        ],
        "scenarios": [
            {"inputs": {"km": 100, "knots": 10},
             "note": "At ten knots the same hundred kilometres takes 5.4 hours, and the speed is "
                     "18.5 km/h — a decent cruising boat."},
        ],
    },
    faq=[
        ("Why is a nautical mile longer than a mile?",
         "Because it is defined by the earth rather than by a king's stride: one minute of "
         "latitude, which is 1 852 metres."),
        ("Why do ships use knots?",
         "Because the unit matches the chart. A minute of latitude on the vertical scale is a "
         "nautical mile, so distance can be measured with dividers and no arithmetic."),
        ("How fast is a knot in mph?",
         "1.15078 miles an hour. A 20-knot boat is doing 23 mph, which is why boats feel faster "
         "than their numbers suggest."),
    ],
    related=[("/everyday-life/boat-speed", "Boat speed"),
             ("/conversion/kilometers-to-miles", "Kilometres to miles"),
             ("/everyday-life/miles-to-hours", "Miles to hours")],
    checks=[
        ({"km": 100, "knots": 6},
         {"nm": 53.9957, "kmh": 11.112, "mph": 6.9047, "hours": 8.9993}, 0.01),
        ({"km": 100, "knots": 10},
         {"nm": 53.9957, "kmh": 18.52, "mph": 11.5078, "hours": 5.3996}, 0.01),
    ],
))
# --------------------------------------------------------------- boat speed

SPECS.append(S(
    slug="boat-speed",
    name="Boat Speed Calculator",
    title="Boat Speed — Hull Speed from Waterline Length",
    desc="A displacement hull is limited by its waterline: 1.34 times the square root of the "
         "length gives the hull speed in knots, and the length a target speed needs.",
    what="The hull speed a displacement boat's waterline allows, in knots, kilometres and miles "
         "an hour, and the waterline length needed for a speed you want.",
    fields=[
        F("lwl", "Waterline length", "ft", 30,
          help="The length at the water, not the length overall. Overhangs do not add hull "
               "speed."),
        F("target", "Speed you want", "kn", 8),
    ],
    results=[
        R("hull", "Hull speed", "kn"),
        R("kmh", "Hull speed", "km/h"),
        R("mph", "Hull speed", "mph"),
        R("lwl_for", "Waterline for your target", "ft"),
    ],
    formula={
        "hull": "1.34 * sqrt(lwl)",
        "kmh": "1.34 * sqrt(lwl) * 1.852",
        "mph": "1.34 * sqrt(lwl) * 1.15078",
        "lwl_for": "(target / 1.34) * (target / 1.34)",
    },
    prose={
        "why": "<p>A displacement hull pushes water aside and sits in the trough it makes. The "
               "wave it creates has a speed of its own, set by the waterline length, and pushing "
               "past that means climbing your own bow wave.</p>"
               "<p>The rule is 1.34 times the square root of the waterline in feet: 30 feet "
               "gives 7.3 knots, which is 13.6 kilometres an hour. To do 8 knots in a "
               "displacement hull you need 35.6 feet at the water, and no engine changes that.</p>",
        "formula_note": "The square root of the waterline in feet times 1.34 gives knots, and the "
                        "same figure converts to kilometres and miles an hour. The length for a "
                        "target speed is that relation reversed and squared.",
        "reading": "A 30-foot waterline gives a hull speed of 7.34 knots, 13.6 km/h and 8.4 mph. "
                   "To hold 8 knots the waterline has to be 35.6 feet.",
        "example_note": "A 25-foot waterline is 6.7 knots; a 40-foot one is 8.5. Doubling the "
                        "length does not double the speed — it goes up with the square root.",
        "pitfalls": [
            "<strong>Using length overall.</strong> A plumb bow and a long counter add length "
            "above the water and nothing to the hull speed. Measure at the waterline, loaded.",
            "<strong>Expecting a planing boat to obey it.</strong> The rule is for displacement "
            "hulls. A boat that gets on the plane leaves it behind entirely, which is why a "
            "21-foot runabout passes a 40-foot trawler.</li>".replace("</li>", ""),
        ],
        "limits": [
            "<li><strong>Calm water.</strong> Hull speed assumes flat water and no current. A "
            "following sea and a fair tide are worth a knot each and are not in the rule.</li>",
        ],
        "uses": [
            "<li>Working out what a longer boat would actually buy.</li>",
            "<li>Setting a realistic passage plan before a passage.</li>",
        ],
        "scenarios": [
            {"inputs": {"lwl": 25, "target": 8},
             "note": "A 25-foot waterline is 6.7 knots, and 8 knots would need 35.6 feet — three "
                     "feet of hull for every tenth of a knot at this end of the scale."},
        ],
    },
    faq=[
        ("What is hull speed?",
         "The speed at which a displacement hull's bow wave is as long as the hull. Beyond it, "
         "the boat climbs its own wave and the power needed rises steeply."),
        ("Why the square root?",
         "Because wave speed in deep water goes with the square root of the wavelength, and the "
         "wavelength is set by the hull length."),
        ("Can a displacement boat go faster downhill?",
         "In a current, yes, over the ground. Through the water it is still limited, which is "
         "why speed over ground and speed through water are different numbers."),
    ],
    related=[("/everyday-life/nautical-mile", "Nautical mile"),
             ("/everyday-life/boat-speed", "Boat speed"),
             ("/everyday-life/rpm", "RPM calculator")],
    checks=[
        ({"lwl": 30, "target": 8},
         {"hull": 7.3394, "kmh": 13.5926, "mph": 8.4461, "lwl_for": 35.6409}, 0.01),
        ({"lwl": 25, "target": 8},
         {"hull": 6.7, "kmh": 12.4084, "mph": 7.7103}, 0.01),
    ],
))

# ---------------------------------------------------------- traffic density

SPECS.append(S(
    slug="traffic-density",
    name="Traffic Density Calculator",
    title="Traffic Density — Vehicles per Kilometre and Gap",
    desc="Flow over speed gives density: at 1 800 vehicles an hour and 60 km/h that is 30 a "
         "kilometre, a 33-metre gap and a two-second headway.",
    what="How densely traffic packs a road from its flow and speed, the space between vehicles "
         "and the time gap that space gives a following driver.",
    fields=[
        F("flow", "Traffic flow", "veh/h", 1800),
        F("speed", "Average speed", "km/h", 60),
        F("segment", "Segment length", "m", 500),
    ],
    results=[
        R("density", "Density", "veh/km"),
        R("spacing", "Space per vehicle", "m"),
        R("headway", "Time headway", "s"),
        R("in_segment", "Vehicles in your segment", "vehicles"),
    ],
    formula={
        "density": "flow / speed",
        "spacing": "1000 / (flow / speed)",
        "headway": "3600 / flow",
        "in_segment": "flow / speed * segment / 1000",
    },
    prose={
        "why": "<p>Flow is how many vehicles pass a point in an hour and density is how many are "
               "on a kilometre at once. Dividing one by the other is the whole of traffic "
               "arithmetic: 1 800 an hour at 60 km/h is 30 vehicles to the kilometre.</p>"
               "<p>Thirty a kilometre is a 33-metre space each, which at 60 km/h is a two-second "
               "headway. That is the difference between a road that flows and a queue: the same "
               "flow at 20 km/h would be 90 vehicles a kilometre and a metre of road each.</p>",
        "formula_note": "Flow over speed gives density in vehicles a kilometre when the speed is "
                        "in kilometres an hour. The spacing is a thousand metres over the "
                        "density, and the headway is 3 600 seconds over the flow.",
        "reading": "1 800 vehicles an hour at 60 km/h is 30 a kilometre: 33.3 metres each, a "
                   "two-second headway, and 15 vehicles in a 500-metre stretch.",
        "example_note": "The same flow at 30 km/h doubles the density to 60 a kilometre — the "
                        "road is twice as full for the same throughput, which is what a "
                        "slowdown does.",
        "pitfalls": [
            "<strong>Mixing miles and kilometres.</strong> Density is vehicles a unit of "
            "length, so flow and speed have to be in matching units. 1 800 an hour at 40 mph is "
            "28 a mile, not 45 a kilometre.",
            "<strong>Treating flow as capacity.</strong> A road can carry its capacity at a "
            "range of speeds and collapse suddenly above it. The number here is what is "
            "happening, not what it could take.</li>".replace("</li>", ""),
        ],
        "limits": [
            "<li><strong>An average.</strong> Traffic is not uniform: density near a junction is "
            "double the average for the same flow.</li>",
        ],
        "uses": [
            "<li>Making sense of a traffic report's flow figure.</li>",
            "<li>Working out whether a cycle lane fits the space between vehicles.</li>",
        ],
        "scenarios": [
            {"inputs": {"flow": 1800, "speed": 30, "segment": 500},
             "note": "At 30 km/h the same flow is 60 vehicles a kilometre and 16.7 metres "
                     "apart — half a second of headway, which nobody leaves."},
        ],
    },
    faq=[
        ("What is a good traffic density?",
         "Under 15 vehicles a kilometre is free-flowing, 25 to 40 is busy, and above 60 it is a "
         "queue with a speed of its own."),
        ("Why does the headway matter more than the gap?",
         "Because a gap in metres shrinks with speed. Two seconds is the same following distance "
         "at 30 km/h and 100, and it is the figure driving guidance uses."),
        ("Does density predict delay?",
         "Roughly: delay rises steeply as density approaches the point where flow starts to fall "
         "with speed. That tipping point is what a traffic model is for."),
    ],
    related=[("/everyday-life/miles-to-hours", "Miles to hours"),
             ("/everyday-life/crosswind", "Crosswind"),
             ("/everyday-life/cost-per-mile", "Cost per mile")],
    checks=[
        ({"flow": 1800, "speed": 60, "segment": 500},
         {"density": 30, "spacing": 33.3333, "headway": 2, "in_segment": 15}, 0.01),
        ({"flow": 1800, "speed": 30, "segment": 500},
         {"density": 60, "spacing": 16.6667, "headway": 2, "in_segment": 30}, 0.01),
    ],
))

# ------------------------------------------------------------ pulse per mile

SPECS.append(S(
    slug="pulse-per-mile",
    name="Steps per Mile Calculator",
    title="Steps per Mile — Stride Length, Cadence and Time",
    desc="Stride length decides steps per mile: 2.5 feet is 2 112 steps, and walking at 3 mph "
         "turns that into 105 steps a minute.",
    what="The steps a mile takes at a given stride, the minutes the mile takes at a given speed, "
         "and the cadence that comes out of the two.",
    fields=[
        F("stride", "Stride length", "ft", 2.5,
          help="Stride is heel to heel on the same foot, so it is two steps. A step is half a "
               "stride — here the field is the length of one step, heel to heel."),
        F("speed", "Walking speed", "mph", 3),
        F("minutes", "Minutes walked", "min", 30),
    ],
    results=[
        R("steps_mile", "Steps a mile", "steps"),
        R("minutes_mile", "Minutes a mile", "min"),
        R("cadence", "Steps a minute", "steps/min"),
        R("steps_session", "Steps in your walk", "steps"),
    ],
    formula={
        "steps_mile": "5280 / stride",
        "minutes_mile": "60 / speed",
        "cadence": "5280 / stride * speed / 60",
        "steps_session": "5280 / stride * speed / 60 * minutes",
    },
    prose={
        "why": "<p>A mile is 5 280 feet, so the steps in it are a division: 2 112 at a 2.5-foot "
               "step, 1 760 at three feet. Most pedometers assume 2 000 and most people are "
               "within a quarter of that.</p>"
               "<p>Cadence is the step length and the speed together: 2.5 feet at 3 mph is 105 "
               "steps a minute, which is a brisk walk, and a 30-minute walk is 3 168 steps. "
               "That is the number a 10 000-step goal is asking for a third of.</p>",
        "formula_note": "5 280 feet over the step length gives steps a mile. Speed into minutes a "
                        "mile is sixty over the speed, and cadence is the steps a mile times the "
                        "speed over sixty, which is steps a minute.",
        "reading": "A 2.5-foot step is 2 112 steps a mile. At 3 mph a mile takes 20 minutes and "
                   "the cadence is 105.6 a minute, so half an hour of walking is 3 168 steps.",
        "example_note": "A 3-foot step is 1 760 steps a mile, so the same half hour at the same "
                    "speed is 600 fewer steps — stride length changes the count without changing "
                    "the distance.",
        "pitfalls": [
            "<strong>Confusing step with stride.</strong> A stride is two steps. Using a stride "
            "length in a step formula halves the count and doubles the apparent distance.",
            "<strong>Trusting a pedometer's fixed default.</strong> They assume a step length "
            "unless told otherwise. Walking a known mile once gives the real number.</li>".replace("</li>", ""),
        ],
        "limits": [
            "<li><strong>Flat ground.</strong> Uphill steps are shorter and downhill longer, so "
            "a hilly mile has more steps than a flat one at the same distance.</li>",
        ],
        "uses": [
            "<li>Calibrating a pedometer or a phone.</li>",
            "<li>Working out whether a step goal is realistic for your stride.</li>",
        ],
        "scenarios": [
            {"inputs": {"stride": 3, "speed": 3, "minutes": 30},
             "note": "A 3-foot step is 1 760 a mile and a cadence of 88 a minute, so half an "
                     "hour is 2 640 steps rather than 3 168."},
        ],
    },
    faq=[
        ("How many steps are in a mile?",
         "About 2 000 for an average adult, and between 1 760 and 2 400 across the normal range "
         "of stride length. Two thousand is a good default and a poor measurement."),
        ("What is a good walking cadence?",
         "100 to 120 steps a minute is brisk. Below 80 is a stroll, and above 130 is race "
         "walking or a jog."),
        ("Does pace change the step count?",
         "For the same distance, barely: you take the same number of steps faster. Cadence "
         "rises with speed and step length changes less than people think."),
    ],
    related=[("/everyday-life/30-min", "30-minute blocks"),
             ("/everyday-life/miles-to-hours", "Miles to hours"),
             ("/everyday-life/bed-size", "Bed size")],
    checks=[
        ({"stride": 2.5, "speed": 3, "minutes": 30},
         {"steps_mile": 2112, "minutes_mile": 20, "cadence": 105.6,
          "steps_session": 3168}, 0.01),
        ({"stride": 3, "speed": 3, "minutes": 30},
         {"steps_mile": 1760, "cadence": 88, "steps_session": 2640}, 0.01),
    ],
))

# --------------------------------------------------------- flight radiation

SPECS.append(S(
    slug="flight-radiation",
    name="Flight Radiation Calculator",
    title="Flight Radiation — Cosmic Dose per Flight",
    desc="At cruising altitude the atmosphere is thin enough to take a measurable dose: hours "
         "times a rate per hour, against the public and occupational limits.",
    what="The cosmic radiation dose a flight delivers, how much of the annual public and "
         "occupational limits it uses, and how many flights would reach each.",
    fields=[
        F("hours", "Flight time", "h", 10),
        F("rate", "Dose rate at altitude", "mSv/h", 0.005,
          help="Three to five thousandths of a millisievert an hour at 35 000 feet. Polar "
               "routes and high latitudes are at the top of that range."),
        F("public_limit", "Annual public limit", "mSv", 1),
        F("work_limit", "Annual occupational limit", "mSv", 20),
    ],
    results=[
        R("dose", "Dose for the flight", "mSv"),
        R("public_pct", "Of the public limit", "%"),
        R("work_pct", "Of the work limit", "%"),
        R("flights_public", "Flights to reach the public limit", "flights"),
    ],
    formula={
        "dose": "hours * rate",
        "public_pct": "hours * rate / public_limit * 100",
        "work_pct": "hours * rate / work_limit * 100",
        "flights_public": "public_limit / (hours * rate)",
    },
    prose={
        "why": "<p>At 35 000 feet there is less air above you and less shielding, so the cosmic "
               "rays that are absorbed at ground level land in the aircraft. The rate is a few "
               "thousandths of a millisievert an hour — about the same as a chest X-ray every "
               "few hours, or a dental X-ray an hour.</p>"
               "<p>Ten hours at 0.005 an hour is 0.05 mSv, five per cent of the annual public "
               "limit of 1. A frequent flyer doing that every week would pass the public limit "
               "in twenty flights, which is why aircrew are treated as radiation workers.</p>",
        "formula_note": "Hours times the rate gives the dose. Divided by each annual limit and "
                        "multiplied by a hundred gives the share of it, and the limit over one "
                        "flight's dose gives the flights to reach it.",
        "reading": "Ten hours at 0.005 mSv/h is 0.05 mSv: five per cent of the public limit, a "
                   "quarter of a per cent of the occupational one, and twenty such flights to "
                   "reach a millisievert.",
        "example_note": "A two-hour hop is 0.01 mSv, a hundredth of the public limit. The rate "
                        "matters more than the length: at 0.008 the same ten hours is eight per "
                        "cent.",
        "pitfalls": [
            "<strong>Using the ground-level background.</strong> The dose in the air is the "
            "flight's, above and beyond what everyone receives at sea level, which is about 2.4 "
            "mSv a year on its own.",
            "<strong>Assuming one rate for every route.</strong> Latitude, altitude and the "
            "solar cycle move it by a factor of two. A polar route at 39 000 feet is the worst "
            "case.</li>".replace("</li>", ""),
        ],
        "limits": [
            "<li><strong>Cosmic rays only.</strong> Solar particle events can spike the rate "
            "briefly, and aviation authorities reroute around them. Averages do not capture "
            "those hours.</li>",
        ],
        "uses": [
            "<li>Comparing a working flight schedule with the public limit.</li>",
            "<li>Putting an aircrew's annual dose in context.</li>",
        ],
        "scenarios": [
            {"inputs": {"hours": 10, "rate": 0.008, "public_limit": 1, "work_limit": 20},
             "note": "At a polar-route rate of 0.008 the same flight is 0.08 mSv — eight per "
                     "cent of the public limit, and twelve and a half flights to reach it."},
        ],
    },
    faq=[
        ("How much radiation is a flight?",
         "About 0.003 to 0.005 mSv an hour at cruising altitude, so a transatlantic flight is "
         "0.04 to 0.06 — a few chest X-rays."),
        ("Should I worry about it?",
         "For occasional travel, no. For aircrew and very frequent flyers it is a recognised "
         "occupational exposure with its own limits and monitoring."),
        ("Is the return flight the same?",
         "Nearly, and a different route can be higher. Latitude matters more than direction, "
         "because the magnetic field funnels cosmic rays toward the poles."),
    ],
    related=[("/everyday-life/engine-hours-to-miles-converter", "Engine hours to miles"),
             ("/everyday-life/nautical-mile", "Nautical mile"),
             ("/everyday-life/boat-speed", "Boat speed")],
    checks=[
        ({"hours": 10, "rate": 0.005, "public_limit": 1, "work_limit": 20},
         {"dose": 0.05, "public_pct": 5, "work_pct": 0.25, "flights_public": 20}, 0.01),
        ({"hours": 10, "rate": 0.008, "public_limit": 1, "work_limit": 20},
         {"dose": 0.08, "public_pct": 8, "work_pct": 0.4, "flights_public": 12.5}, 0.01),
    ],
))
# ------------------------------------------------------ drake equation love

SPECS.append(S(
    slug="drake-equation-for-love",
    name="Drake Equation for Love Calculator",
    title="Drake Equation for Love — How Many People, Really",
    desc="Population times the shares who are the right age, single, attractive and compatible "
         "gives a number of candidates — usually smaller than anyone expects.",
    what="How many people in a city pass every filter at once, what share of the population that "
         "is, and how many people you would have to meet to find one of them.",
    fields=[
        F("population", "People in your area", "people", 1000000),
        F("age", "Right age range", "%", 20),
        F("single", "Single", "%", 50),
        F("attract", "You find attractive", "%", 5),
        F("back", "Who find you attractive", "%", 5),
        F("compatible", "You get on with", "%", 10),
    ],
    results=[
        R("candidates", "People who pass", "people"),
        R("per_1000", "Per thousand people", "people"),
        R("meet_one", "People to meet for one match", "people"),
        R("share", "Share of the population", "%"),
    ],
    formula={
        "candidates": "population * (age / 100) * (single / 100) * (attract / 100) * "
                      "(back / 100) * (compatible / 100)",
        "per_1000": "population * (age / 100) * (single / 100) * (attract / 100) * "
                    "(back / 100) * (compatible / 100) / population * 1000",
        "meet_one": "population / (population * (age / 100) * (single / 100) * "
                    "(attract / 100) * (back / 100) * (compatible / 100))",
        "share": "(age / 100) * (single / 100) * (attract / 100) * (back / 100) * "
                 "(compatible / 100) * 100",
    },
    prose={
        "why": "<p>It is the Drake equation with the astronomy taken out. A million people, a "
               "fifth in the right age range, half of them single, and then the honest and "
               "uncomfortable filters: five per cent you find attractive, five per cent who "
               "agree, and a tenth you would actually get on with.</p>"
               "<p>The answer is twenty-five people in a million. It is a joke that turns out to "
               "be arithmetic, and the useful part is not the number: it is which filter you "
               "would move. The last one is worth more than the first four together.</p>",
        "formula_note": "Each percentage is divided by a hundred and multiplied in turn. The "
                        "meet-one figure is the population over the survivors, which is the "
                        "reciprocal of the combined share.",
        "reading": "A million people, twenty per cent in range, half of them single, five per "
                   "cent attractive to you, five per cent the other way and a tenth compatible: "
                   "25 people, 0.025 per thousand, and 40 000 people met for each one.",
        "example_note": "Double the compatibility filter to twenty per cent and the answer "
                    "doubles to fifty. Change the attractiveness filter from five to ten and the "
                    "same thing happens — the filters multiply, so the smallest one dominates.",
        "pitfalls": [
            "<strong>Treating the filters as independent.</strong> They are not: compatibility "
            "and attractiveness overlap, and people who share your interests are likelier to be "
            "met where you already go.",
            "<strong>Reading it as a verdict.</strong> It is a model of a search, not a "
            "statement about you. The number says the search is a numbers game, which is what "
            "everyone who found somebody already knew.</li>".replace("</li>", ""),
        ],
        "limits": [
            "<li><strong>No meeting mechanics.</strong> The page counts people who exist, not "
            "people you would ever encounter. Where you spend your week is the missing "
            "variable.</li>",
        ],
        "uses": [
            "<li>Settling an argument about whether a city is too small.</li>",
            "<li>Seeing which filter is doing the work in your own estimate.</li>",
        ],
        "scenarios": [
            {"inputs": {"population": 1000000, "age": 20, "single": 50, "attract": 5,
                        "back": 5, "compatible": 20},
             "note": "A more generous compatibility filter takes the count to fifty — the same "
                     "city, twice the odds, and one changed line."},
        ],
    },
    faq=[
        ("Is this the real Drake equation?",
         "Its shape, yes. Drake multiplied the rate of star formation by the fractions with "
         "planets, life and intelligence. This multiplies a population by the fractions who "
         "are available."),
        ("Why does the answer feel too small?",
         "Because people compare it with everyone they know rather than everyone who exists. "
         "Twenty-five in a million is one in forty thousand, and forty thousand people is a "
         "large stadium."),
        ("Which filter should I improve?",
         "The one that is small for a reason you can change — usually where you meet people. "
         "The arithmetic cannot help with that, but it does show how much it is worth."),
    ],
    related=[("/everyday-life/meeting-cost", "Meeting cost"),
             ("/everyday-life/every-second", "Every second"),
             ("/everyday-life/podcasts", "Podcast time")],
    checks=[
        ({"population": 1000000, "age": 20, "single": 50, "attract": 5, "back": 5,
          "compatible": 10},
         {"candidates": 25, "per_1000": 0.025, "meet_one": 40000, "share": 0.0025}, 0.01),
        ({"population": 1000000, "age": 20, "single": 50, "attract": 5, "back": 5,
          "compatible": 20},
         {"candidates": 50, "per_1000": 0.05, "meet_one": 20000, "share": 0.005}, 0.01),
    ],
))

# --------------------------------------------------------- wizarding currency

SPECS.append(S(
    slug="wizarding-currency",
    name="Wizarding Currency Calculator",
    title="Wizarding Currency — Galleons, Sickles and Knuts",
    desc="Seventeen Sickles to a Galleon and twenty-nine Knuts to a Sickle: the conversion, "
         "the coin count and what a purse is worth in pounds at a stated rate.",
    what="A purse of Galleons converted into Sickles and Knuts, the total number of coins, and "
         "what the gold is worth in ordinary money at a rate you choose.",
    fields=[
        F("galleons", "Galleons", "G", 10),
        F("rate", "Pounds per Galleon", "£", 4.93,
          help="There is no official rate. Five pounds a Galleon is the figure most "
               "calculations use, and the films' prop budget suggests something similar."),
        F("sickles", "Extra Sickles", "S", 0),
        F("knuts", "Extra Knuts", "K", 0),
    ],
    results=[
        R("total_sickles", "Sickles in all", "S"),
        R("total_knuts", "Knuts in all", "K"),
        R("pounds", "Worth in pounds", "£"),
        R("coins", "Coins in the purse", "coins"),
    ],
    formula={
        "total_sickles": "galleons * 17 + sickles",
        "total_knuts": "(galleons * 17 + sickles) * 29 + knuts",
        "pounds": "galleons * rate + sickles * rate / 17 + knuts * rate / 493",
        "coins": "galleons + sickles + knuts",
    },
    prose={
        "why": "<p>Wizarding money is a base-seventeen system wearing a base-twenty-nine "
               "underneath: seventeen Sickles to a Galleon, twenty-nine Knuts to a Sickle, and "
               "therefore 493 Knuts to a Galleon.</p>"
               "<p>That is why the coins are hard to add up and why a purse of ten Galleons is "
               "170 Sickles or 4 930 Knuts. Converting to pounds needs a rate that does not "
               "exist, so the page takes yours: at 4.93 a Galleon, ten is 49.30.</p>",
        "formula_note": "Galleons times seventeen plus Sickles gives Sickles; times twenty-nine "
                        "again gives Knuts. Pounds use the same rates in reverse on the chosen "
                        "Galleon price, and the coin count is simply how many pieces of metal "
                        "are in the purse.",
        "reading": "Ten Galleons is 170 Sickles and 4 930 Knuts — ten coins in the purse if "
                   "nothing is changed up, and 49.30 in pounds at 4.93.",
        "example_note": "A Sickle is a seventeenth of a Galleon, about 29 pence, and a Knut is "
                        "about a penny. Which makes a Butterbeer at two Sickles a bargain and a "
                        "Firebolt absurd.",
        "pitfalls": [
            "<strong>Using decimals of a Galleon.</strong> There is no such thing as 0.6 "
            "Galleons in change; the coins are seventeen and twenty-nine, which is the whole "
            "joke about wizards and arithmetic.",
            "<strong>Trusting a fixed exchange rate.</strong> Every published figure is an "
            "estimate from the books' prices. Change the rate box and every answer moves with "
            "it.</li>".replace("</li>", ""),
        ],
        "limits": [
            "<li><strong>Coins only.</strong> Vault balances, interest at Gringotts and the "
            "relative value of goblin-made silver are outside a currency converter.</li>",
        ],
        "uses": [
            "<li>Costing a Harry Potter party in Galleons and back.</li>",
            "<li>Settling an argument about what a Sickle is worth.</li>",
        ],
        "scenarios": [
            {"inputs": {"galleons": 10, "rate": 5, "sickles": 3, "knuts": 12},
             "note": "Ten Galleons, three Sickles and twelve Knuts is 173 Sickles or 5 029 "
                     "Knuts, twenty-five coins, and 51.00 in pounds at five to the Galleon."},
        ],
    },
    faq=[
        ("How many Knuts are in a Galleon?",
         "493: seventeen Sickles at twenty-nine Knuts each. It is a prime times a prime, which "
         "is why the arithmetic is unpleasant by design."),
        ("What is a Galleon worth?",
         "About five pounds is the usual estimate, derived from the price of a wand and a "
         "Butterbeer in the books. Nothing official exists."),
        ("Why seventeen and twenty-nine?",
         "Because Rowling wanted a system that felt foreign and old, and pre-decimal British "
         "money was itself twelve and twenty. The primes make mental arithmetic hard on purpose."),
    ],
    related=[("/everyday-life/money-weight", "Money weight"),
             ("/everyday-life/price-per-unit", "Price per unit"),
             ("/everyday-life/tickets", "Concert tickets")],
    checks=[
        ({"galleons": 10, "rate": 4.93, "sickles": 0, "knuts": 0},
         {"total_sickles": 170, "total_knuts": 4930, "pounds": 49.3, "coins": 10}, 0.01),
        ({"galleons": 10, "rate": 5, "sickles": 3, "knuts": 12},
         {"total_sickles": 173, "total_knuts": 5029, "pounds": 51.0041, "coins": 25}, 0.01),
    ],
))
