"""Batch 6c — threads, machining and fabrication arithmetic."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="pitch-diameter",
        name="Pitch diameter",
        title="Pitch Diameter Calculator: Thread Pitch and Diameters",
        desc="Work out the pitch, the pitch diameter and the minor diameter of a unified thread from its major diameter and threads per inch.",
        what=("<p><strong>Pitch = 1 ÷ TPI</strong>; <strong>pitch diameter = D − 0.649 52 × P</strong>.</p>"),
        fields=[
            F("major_diameter", "Major diameter", "in", 0.5, "Nominal size"),
            F("tpi", "Threads per inch", "", 13, "Coarse or fine series"),
        ],
        results=[
            R("pitch", "Pitch", "in"),
            R("pitch_diameter", "Pitch diameter", "in"),
            R("minor_diameter", "Minor diameter", "in"),
            R("thread_height", "Thread height", "in"),
        ],
        formula={
            "pitch": "1/tpi",
            "pitch_diameter": "major_diameter-0.64952/tpi",
            "minor_diameter": "major_diameter-1.2269/tpi",
            "thread_height": "0.61343/tpi",
            "major_diameter": "pitch_diameter+0.64952/tpi",
            "tpi": "0.64952/(major_diameter-pitch_diameter)",
        },
        prose={
            "why": ("<p>The pitch diameter is the diameter at which the thread actually fits — half way up the "
                    "flank — and it is the number a thread gauge, a micrometer with wires or a go/no-go gauge is "
                    "really measuring. The major diameter only says how big the bolt is.</p>"),
            "formula_note": ("<p>The pitch is one divided by the threads per inch. The unified thread form takes "
                             "0.649 52 pitches off the major diameter to reach the pitch diameter, and 1.2269 "
                             "pitches to reach the minor. The thread height is 0.613 43 of the pitch.</p>"),
            "example_note": ("<p>A {major_diameter|unit} bolt at {tpi|unit} has a pitch of {pitch|unit}, a pitch "
                             "diameter of {pitch_diameter|unit}, a minor diameter of {minor_diameter|unit} and a "
                             "thread height of {thread_height|unit}.</p>"),
            "reading": ("<p>Read the pitch diameter against the major: it should sit a little under it, and the "
                        "gap grows as the thread gets coarser. On a half-inch coarse thread the pitch diameter "
                        "is about nine tenths of the nominal size.</p>"),
            "scenarios": [
                {"inputs": {"major_diameter": 1, "tpi": 8},
                 "note": "A one inch coarse thread: a deep, strong form."},
                {"inputs": {"major_diameter": 0.25, "tpi": 28},
                 "note": "A quarter inch fine thread: a shallow form for thin walls."},
            ],
            "pitfalls": [
                "<strong>Pitch entered as TPI.</strong> They are reciprocals.",
                "<strong>Major diameter measured over the crest burs.</strong> Clean the thread first.",
                "<strong>Metric thread checked against unified constants.</strong> The form is different.",
            ],
            "units_note": ("<p>Diameters and pitch in inches, threads per inch as a count.</p>"),
            "limits": [
                "<strong>Unified form.</strong> Metric and Whitworth threads use other constants.",
                "<strong>No tolerance class.</strong> Allowances are separate.",
            ],
            "uses": [
                "<li>Checking a thread with wires.</li>",
                "<li>Choosing a tap drill.</li>",
                "<li>Specifying a thread on a drawing.</li>",
            ],
        },
        faq=[
            ("What is pitch diameter?",
             "The diameter where the thread flanks are half their full height — the effective diameter."),
            ("How do I get the pitch from threads per inch?",
             "Divide one by the threads per inch."),
        ],
        related=[("/construction/thread", "Thread"),
                 ("/construction/thread-pitch", "Thread pitch"),
                 ("/construction/bolt-circle", "Bolt circle")],
    ),

    S(
        slug="punch-force",
        name="Punch force",
        title="Punch Force Calculator: Tonnage for a Round Hole",
        desc="Work out the force a punch needs to shear a round hole through plate, in pounds, tons and kilonewtons, from the diameter and shear strength.",
        what=("<p><strong>Force = π × diameter × thickness × shear strength</strong>.</p>"),
        fields=[
            F("diameter", "Hole diameter", "in", 0.5, "Round punch"),
            F("thickness", "Plate thickness", "in", 0.125, "Material being punched"),
            F("shear_strength", "Shear strength", "psi", 50000, "About 80 % of tensile"),
        ],
        results=[
            R("force_lb", "Punch force", "lb"),
            R("force_tons", "Punch force", "ton"),
            R("force_kn", "Punch force", "kN"),
            R("shear_area", "Shear area", "in²"),
        ],
        formula={
            "force_lb": "pi*diameter*thickness*shear_strength",
            "force_tons": "pi*diameter*thickness*shear_strength/2000",
            "force_kn": "pi*diameter*thickness*shear_strength*0.00444822",
            "shear_area": "pi*diameter*thickness",
            "diameter": "force_lb/(pi*thickness*shear_strength)",
            "thickness": "force_lb/(pi*diameter*shear_strength)",
            "shear_strength": "force_lb/(pi*diameter*thickness)",
        },
        prose={
            "why": ("<p>A punch does not cut metal, it shears it, and the force needed is the area of the sheared "
                    "surface times the shear strength. That area is the circumference of the hole times the "
                    "thickness — which is why a small increase in diameter or thickness demands a "
                    "disproportionately larger press.</p>"),
            "formula_note": ("<p>The circumference is pi times the diameter, the sheared band is that "
                             "circumference times the thickness, and the force is the band times the shear "
                             "strength of the material. Divide by two thousand for short tons, or multiply by "
                             "0.004 448 for kilonewtons.</p>"),
            "example_note": ("<p>A {diameter|unit} hole through {thickness|unit} plate at {shear_strength|unit} "
                             "shears {shear_area|unit} of material and needs {force_lb|unit} — {force_tons} tons, "
                             "or {force_kn|unit}.</p>"),
            "reading": ("<p>Read the tonnage against the press: a punch that needs more than about eighty per "
                        "cent of the press rating will stall or snap the punch. The usual answer is a smaller "
                        "diameter and a second pass.</p>"),
            "scenarios": [
                {"inputs": {"diameter": 1, "thickness": 0.25},
                 "note": "A one inch hole in quarter plate: four times the force."},
                {"inputs": {"diameter": 0.25, "thickness": 0.048, "shear_strength": 30000},
                 "note": "Thin aluminium: a bench press handles it."},
            ],
            "pitfalls": [
                "<strong>Tensile strength used.</strong> Shear is about eighty per cent of it.",
                "<strong>Thickness in gauge numbers.</strong> Convert to inches.",
                "<strong>Clearance ignored.</strong> A tight die raises the force and wears the punch.",
            ],
            "units_note": ("<p>Diameter and thickness in inches, strength in psi, force in pounds, tons and "
                           "kilonewtons.</p>"),
            "limits": [
                "<strong>Sharp punch and die.</strong> Wear increases the force.",
                "<strong>Single hit.</strong> Stripping and slug ejection add load.",
            ],
            "uses": [
                "<li>Checking a press is big enough.</li>",
                "<li>Comparing materials for a punched part.</li>",
                "<li>Teaching the shear-area method.</li>",
            ],
        },
        faq=[
            ("How do I calculate punch tonnage?",
             "Circumference times thickness times shear strength, divided by two thousand."),
            ("What shear strength should I use?",
             "About eighty per cent of the tensile strength of the material."),
        ],
        related=[("/construction/material-removal-rate", "Material removal rate"),
                 ("/construction/rivet-size", "Rivet size"),
                 ("/construction/bending-stress", "Bending stress")],
    ),

    S(
        slug="rivet-size",
        name="Rivet size",
        title="Rivet Size Calculator: Diameter, Edge and Pitch",
        desc="Pick a rivet diameter from the plate thickness, with the edge distance and rivet pitch that go with it for a sound joint.",
        what=("<p><strong>Rivet diameter = 1.2 × √thickness</strong>; edge distance is twice the diameter and "
              "pitch three times.</p>"),
        fields=[
            F("thickness", "Plate thickness", "in", 0.125, "Thinner sheet of the joint"),
            F("rivet_factor", "Diameter factor", "", 1.2, "One point two for a standard joint"),
        ],
        results=[
            R("rivet_diameter", "Rivet diameter", "in"),
            R("edge_distance", "Edge distance", "in"),
            R("pitch", "Rivet pitch", "in"),
            R("rivets_per_ft", "Rivets per foot", ""),
        ],
        formula={
            "rivet_diameter": "rivet_factor*sqrt(thickness)",
            "edge_distance": "2*rivet_factor*sqrt(thickness)",
            "pitch": "3*rivet_factor*sqrt(thickness)",
            "rivets_per_ft": "12/(3*rivet_factor*sqrt(thickness))+1",
            "thickness": "pow(rivet_diameter/rivet_factor,2)",
            "rivet_factor": "rivet_diameter/sqrt(thickness)",
        },
        prose={
            "why": ("<p>A rivet that is too small for the plate tears out; one that is too large needs a punch "
                    "the sheet cannot take without distorting. The rule that links the two is that the rivet "
                    "diameter should be a little larger than the square root of the plate thickness.</p>"),
            "formula_note": ("<p>Take the square root of the thickness in inches and multiply by about one and "
                             "a fifth. Everything else follows from that diameter: the edge distance is twice "
                             "it, so the plate does not tear out, and the pitch is three times it, so the seam "
                             "neither buckles nor leaks.</p>"),
            "example_note": ("<p>{thickness|unit} plate takes a {rivet_diameter|unit} rivet, set {edge_distance|unit} "
                             "from the edge and {pitch|unit} apart, which is {rivets_per_ft} rivets to the "
                             "foot.</p>"),
            "reading": ("<p>Read the diameter against the thickness: the ratio should be about four to one. A "
                        "rivet less than three times the thickness is likely to tear out; more than six times "
                        "and the punch load becomes the problem.</p>"),
            "scenarios": [
                {"inputs": {"thickness": 0.25},
                 "note": "Quarter plate: a heavier rivet and a wider pitch."},
                {"inputs": {"thickness": 0.048, "rivet_factor": 1.0},
                 "note": "Thin sheet with a finer factor: a small, close-set rivet."},
            ],
            "pitfalls": [
                "<strong>Thickness in gauge.</strong> Convert it to inches first.",
                "<strong>Edge distance from the hole edge.</strong> It is from the rivet centre.",
                "<strong>Pitch used as edge distance.</strong> The two rules differ.",
            ],
            "units_note": ("<p>Thickness, diameter, edge distance and pitch in inches, rivets per foot as a "
                           "count.</p>"),
            "limits": [
                "<strong>Static lap joint.</strong> Fatigue and pressure vessels need a design check.",
                "<strong>Solid rivets.</strong> Blind rivets follow the maker's data.",
            ],
            "uses": [
                "<li>Laying out a riveted patch.</li>",
                "<li>Choosing a rivet for a repair.</li>",
                "<li>Checking a drawing's pitch.</li>",
            ],
        },
        faq=[
            ("How do I choose a rivet diameter?",
             "About one point two times the square root of the plate thickness in inches."),
            ("What is the usual rivet pitch?",
             "Three times the rivet diameter, with twice the diameter at the edges."),
        ],
        related=[("/construction/punch-force", "Punch force"),
                 ("/construction/bolt-circle", "Bolt circle"),
                 ("/construction/clearance-hole", "Clearance hole")],
    ),

    S(
        slug="spindle-speed",
        name="Spindle speed",
        title="Spindle Speed Calculator: RPM from Cutting Speed",
        desc="Convert a cutting speed in surface feet per minute into spindle RPM for a given tool diameter, with the metric surface speed.",
        what=("<p><strong>RPM = 12 × SFM ÷ (π × diameter)</strong>.</p>"),
        fields=[
            F("sfm", "Cutting speed", "ft/min", 300, "Surface speed for the material"),
            F("diameter", "Tool diameter", "in", 0.5, "Cutter or drill"),
        ],
        results=[
            R("rpm", "Spindle speed", "rpm"),
            R("surface_m_min", "Cutting speed", "m/min"),
            R("rpm_per_sfm", "RPM per SFM", "rpm"),
        ],
        formula={
            "rpm": "12*sfm/(pi*diameter)",
            "surface_m_min": "sfm*0.3048",
            "rpm_per_sfm": "12/(pi*diameter)",
            "sfm": "pi*diameter*rpm/12",
            "diameter": "12*sfm/(pi*rpm)",
        },
        prose={
            "why": ("<p>Cutting speed is a property of the material and the tool, and it is quoted at the "
                    "cutting edge, in feet per minute. The spindle turns at revolutions per minute, so a small "
                    "cutter has to turn much faster than a large one to give the edge the same surface "
                    "speed.</p>"),
            "formula_note": ("<p>The circumference of the tool is pi times the diameter in inches, so twelve "
                             "inches of travel per foot divide through: revolutions a minute is twelve times the "
                             "surface speed divided by the circumference in inches. Halving the diameter doubles "
                             "the RPM for the same cut.</p>"),
            "example_note": ("<p>A {diameter|unit} cutter at {sfm|unit} runs at {rpm|unit}, which is "
                             "{surface_m_min|unit} in metric terms — about {rpm_per_sfm} revolutions for every "
                             "foot a minute of surface speed.</p>"),
            "reading": ("<p>Read the RPM against the machine's maximum: a small end mill in aluminium often "
                        "wants more speed than a manual mill can give. Burning the edge rather than cutting it "
                        "is the sign that the surface speed is too high.</p>"),
            "scenarios": [
                {"inputs": {"sfm": 100, "diameter": 1},
                 "note": "Mild steel with a one inch cutter: a slow, steady speed."},
                {"inputs": {"sfm": 500, "diameter": 0.25},
                 "note": "Aluminium with a quarter inch cutter: a high spindle speed."},
            ],
            "pitfalls": [
                "<strong>Diameter in millimetres.</strong> The form wants inches.",
                "<strong>Feed confused with speed.</strong> Feed is inches a minute.",
                "<strong>Tool runout ignored.</strong> It limits the speed in practice.",
            ],
            "units_note": ("<p>Cutting speed in feet per minute and metres per minute, diameter in inches, "
                           "spindle speed in revolutions per minute.</p>"),
            "limits": [
                "<strong>Nominal speed.</strong> Rigidity and coolant decide the real limit.",
                "<strong>No feed calculation.</strong> Chip load is a separate sheet.",
            ],
            "uses": [
                "<li>Setting a mill or a drill press.</li>",
                "<li>Converting a tool supplier's chart.</li>",
                "<li>Checking a machinist's numbers.</li>",
            ],
        },
        faq=[
            ("What RPM for a half inch drill in steel?",
             "About two thousand three hundred at three hundred surface feet a minute."),
            ("Why does a smaller cutter need more RPM?",
             "Because the surface speed is set at the edge, and a smaller circle has less circumference."),
        ],
        related=[("/construction/material-removal-rate", "Material removal rate"),
                 ("/construction/taper", "Taper"),
                 ("/construction/k-factor", "K-factor")],
    ),

    S(
        slug="taper",
        name="Taper",
        title="Taper Calculator: Per Inch, Per Foot and Angle",
        desc="Work out the taper of a turned part from its two diameters and its length, per inch, per foot and as an included angle in degrees.",
        what=("<p><strong>Taper per inch = (D − d) ÷ length</strong>; the half angle is its arctangent halved.</p>"),
        fields=[
            F("large_diameter", "Large diameter", "in", 1, "At the big end"),
            F("small_diameter", "Small diameter", "in", 0.8, "At the small end"),
            F("length", "Length", "in", 4, "Between the two diameters"),
        ],
        results=[
            R("taper_per_inch", "Taper per inch", "in/in"),
            R("taper_per_ft", "Taper per foot", "in/ft"),
            R("half_angle", "Half angle", "°"),
            R("included_angle", "Included angle", "°"),
        ],
        formula={
            "taper_per_inch": "(large_diameter-small_diameter)/length",
            "taper_per_ft": "(large_diameter-small_diameter)/length*12",
            "half_angle": "atan((large_diameter-small_diameter)/(2*length))*180/pi",
            "included_angle": "2*atan((large_diameter-small_diameter)/(2*length))*180/pi",
            "large_diameter": "small_diameter+taper_per_inch*length",
            "small_diameter": "large_diameter-taper_per_inch*length",
            "length": "(large_diameter-small_diameter)/taper_per_inch",
        },
        prose={
            "why": ("<p>A taper is quoted on a drawing as a difference in diameter over a length, but it is cut "
                    "on a lathe by setting the compound slide to an angle. Converting one to the other is the "
                    "first thing that happens at the machine.</p>"),
            "formula_note": ("<p>The difference between the diameters over the length is the taper per inch, "
                             "and twelve of those make the taper per foot. The half angle is the arctangent of "
                             "the radius change over the length — half the diameter difference, because the "
                             "axis runs down the middle.</p>"),
            "example_note": ("<p>A part turning down from {large_diameter|unit} to {small_diameter|unit} over "
                             "{length|unit} has {taper_per_inch|unit} of taper per inch — {taper_per_ft|unit} per "
                             "foot — a half angle of {half_angle|unit} and an included angle of "
                             "{included_angle|unit}.</p>"),
            "reading": ("<p>Read the included angle against the length: a few degrees is a self-holding taper "
                        "like a Morse, twenty or more is a chamfer. Mistaking the two is the commonest error at "
                        "the lathe.</p>"),
            "scenarios": [
                {"inputs": {"large_diameter": 1, "small_diameter": 0.6, "length": 6},
                 "note": "A gentle taper over a long length."},
                {"inputs": {"large_diameter": 2, "small_diameter": 1, "length": 1},
                 "note": "A steep taper: a chamfer rather than a fit."},
            ],
            "pitfalls": [
                "<strong>Half angle set on the compound.</strong> Most lathes swivel to half the included angle.",
                "<strong>Length measured along the slope.</strong> Use the axial length.",
                "<strong>Diameter difference halved twice.</strong> The formula already halves it.",
            ],
            "units_note": ("<p>Diameters and length in inches, taper per inch and per foot in inches, angles in "
                           "degrees.</p>"),
            "limits": [
                "<strong>Straight taper.</strong> A bell or a radius is a different profile.",
                "<strong>No fit allowance.</strong> Clearance is a separate decision.",
            ],
            "uses": [
                "<li>Setting a compound slide.</li>",
                "<li>Checking a taper gauge.</li>",
                "<li>Turning a self-holding taper.</li>",
            ],
        },
        faq=[
            ("How do I convert taper per foot to an angle?",
             "Halve the diameter change, divide by the length in feet, and take the arctangent in degrees."),
            ("What is the taper of a Morse 2?",
             "About 0.0500 per inch, or roughly 1.43 degrees of half angle."),
        ],
        related=[("/construction/countersink-depth", "Countersink depth"),
                 ("/construction/thread", "Thread"),
                 ("/construction/spindle-speed", "Spindle speed")],
    ),

    S(
        slug="thread",
        name="Thread",
        title="Thread Calculator: Minor Diameter and Tap Drill",
        desc="Work out the pitch, minor diameter and tap drill size for a unified thread from its major diameter and threads per inch.",
        what=("<p><strong>Pitch = 1 ÷ TPI</strong>; <strong>minor diameter = D − 1.226 9 × P</strong>, and the tap "
              "drill is <strong>D − P</strong>.</p>"),
        fields=[
            F("major_diameter", "Major diameter", "in", 0.5, "Nominal bolt size"),
            F("tpi", "Threads per inch", "", 13, "Coarse is usual"),
        ],
        results=[
            R("pitch", "Pitch", "in"),
            R("minor_diameter", "Minor diameter", "in"),
            R("tap_drill", "Tap drill", "in"),
            R("drill_number", "Tap drill as", "in"),
        ],
        formula={
            "pitch": "1/tpi",
            "minor_diameter": "major_diameter-1.2269/tpi",
            "tap_drill": "major_diameter-1/tpi",
            "drill_number": "major_diameter-1/tpi",
            "major_diameter": "minor_diameter+1.2269/tpi",
            "tpi": "1/(major_diameter-tap_drill)",
        },
        prose={
            "why": ("<p>Drilling for a tap is a compromise: the hole must clear the tap's core so it does not "
                    "break, but leave enough material for the thread to hold. The usual shop rule is the major "
                    "diameter minus one pitch, which gives roughly three quarters of full thread.</p>"),
            "formula_note": ("<p>The pitch is one over the threads per inch. The minor diameter takes 1.2269 "
                             "pitches off the major diameter, and the tap drill takes a full pitch, which is a "
                             "little larger than the minor diameter and leaves the crest slightly flattened.</p>"),
            "example_note": ("<p>A {major_diameter|unit} thread at {tpi|unit} has a pitch of {pitch|unit}, a "
                             "minor diameter of {minor_diameter|unit} and takes a {tap_drill|unit} tap drill.</p>"),
            "reading": ("<p>Read the tap drill against the minor diameter: it should be the larger of the two by "
                        "a few thousandths. A drill below the minor diameter means the tap will bind and very "
                        "likely snap.</p>"),
            "scenarios": [
                {"inputs": {"major_diameter": 0.25, "tpi": 20},
                 "note": "A quarter inch coarse thread: the classic tap drill case."},
                {"inputs": {"major_diameter": 0.75, "tpi": 10},
                 "note": "A three quarter inch thread for a heavy bolted joint."},
            ],
            "pitfalls": [
                "<strong>Minor diameter used as the drill size.</strong> It is too small to tap.",
                "<strong>TPI entered as pitch.</strong> They are reciprocals.",
                "<strong>Drill number read as a decimal.</strong> Convert it first.",
            ],
            "units_note": ("<p>Diameters, pitch and drill size in inches, threads per inch as a count.</p>"),
            "limits": [
                "<strong>Unified form.</strong> Metric threads differ slightly.",
                "<strong>No class of fit.</strong> A close fit takes a bigger drill.",
            ],
            "uses": [
                "<li>Choosing a tap drill.</li>",
                "<li>Checking a thread specification.</li>",
                "<li>Teaching the diameter-minus-pitch rule.</li>",
            ],
        },
        faq=[
            ("What tap drill for a half inch 13 thread?",
             "About 0.423 inch, which is the major diameter less one pitch."),
            ("Why does the tap drill differ from the minor diameter?",
             "It is slightly larger, leaving a flattened crest and less load on the tap."),
        ],
        related=[("/construction/pitch-diameter", "Pitch diameter"),
                 ("/construction/thread-pitch", "Thread pitch"),
                 ("/construction/countersink-depth", "Countersink depth")],
    ),

    S(
        slug="thread-pitch",
        name="Thread pitch",
        title="Thread Pitch Calculator: Metric and Imperial Conversion",
        desc="Convert a metric thread pitch in millimetres to threads per inch and back, with the pitch in inches and micrometres for a thread gauge.",
        what=("<p><strong>TPI = 25.4 ÷ pitch in mm</strong>, and <strong>pitch in mm = 25.4 ÷ TPI</strong>.</p>"),
        fields=[
            F("pitch_mm", "Pitch", "mm", 1.5, "Metric pitch"),
        ],
        results=[
            R("tpi", "Threads per inch", ""),
            R("pitch_in", "Pitch", "in"),
            R("pitch_um", "Pitch", "µm"),
            R("threads_per_cm", "Threads per cm", ""),
        ],
        formula={
            "tpi": "25.4/pitch_mm",
            "pitch_in": "pitch_mm/25.4",
            "pitch_um": "pitch_mm*1000",
            "threads_per_cm": "10/pitch_mm",
            "pitch_mm": "25.4/tpi",
        },
        prose={
            "why": ("<p>A metric thread is specified by its pitch, an imperial thread by how many fit in an "
                    "inch. The two conventions describe the same helix from opposite ends, and a thread gauge "
                    "or a tap set from one system has to be matched to a drawing from the other.</p>"),
            "formula_note": ("<p>There are twenty five point four millimetres in an inch, so threads per inch "
                             "is twenty five point four divided by the pitch in millimetres — and the pitch in "
                             "inches is the pitch in millimetres divided by the same number. Threads per "
                             "centimetre follows the same logic in a smaller unit.</p>"),
            "example_note": ("<p>A {pitch_mm|unit} pitch is {tpi} threads per inch, a pitch of {pitch_in|unit} "
                             "or {pitch_um|unit}, and {threads_per_cm} threads to the centimetre.</p>"),
            "reading": ("<p>Read the threads per inch against the millimetres: 1.0 mm is 25.4 TPI, 2.0 mm is "
                        "12.7. If the two numbers move in the same direction, the reciprocal has been "
                        "dropped.</p>"),
            "scenarios": [
                {"inputs": {"pitch_mm": 2},
                 "note": "A coarse metric pitch: about thirteen threads an inch."},
                {"inputs": {"pitch_mm": 1},
                 "note": "A fine metric pitch: close to one millimetre and a twentieth of an inch."},
                {"inputs": {"pitch_mm": 0.5},
                 "note": "A miniature thread: fifty threads an inch, used in instruments and watches."},
            ],
            "pitfalls": [
                "<strong>Pitch counted as threads per millimetre.</strong> It is millimetres per thread.",
                "<strong>TPI used as pitch in inches.</strong> They are reciprocals.",
                "<strong>Nominal size confused with pitch.</strong> M10 is a diameter, not a pitch.",
                "<strong>Coarse and fine series mixed.</strong> The same diameter comes in both, so the pitch has to be read from the callout.",
            ],
            "units_note": ("<p>Pitch in millimetres, inches and micrometres, counts as threads per inch and per "
                           "centimetre.</p>"),
            "reading": ("<p>Read the threads per inch against the millimetres: 1.0 mm is 25.4 TPI, 2.0 mm "
                        "is 12.7. If the two move in the same direction, the reciprocal has been dropped and "
                        "the answer is the pitch rather than the count.</p>"),
            "limits": [
                "<strong>Conversion only.</strong> Thread form and tolerance are separate.",
                "<strong>No designation decoding.</strong> M10×1.5 is diameter times pitch.",
            ],
            "uses": [
                "<li>Matching a metric tap to an imperial drawing.</li>",
                "<li>Setting a thread gauge.</li>",
                "<li>Reading a callout.</li>",
            ],
        },
        faq=[
            ("How do I convert pitch to threads per inch?",
             "Divide twenty five point four by the pitch in millimetres."),
            ("What is 1.5 mm pitch in TPI?",
             "About sixteen point nine threads per inch."),
        ],
        related=[("/construction/thread", "Thread"),
                 ("/construction/pitch-diameter", "Pitch diameter"),
                 ("/construction/taper", "Taper")],
    ),

    S(
        slug="true-position",
        name="True position",
        title="True Position Calculator: Deviation and Tolerance Zone",
        desc="Work out the true position of a hole from its deviations in X and Y, as a diametral zone in inches, millimetres and radius.",
        what=("<p><strong>True position = 2 × √(Δx² + Δy²)</strong>.</p>"),
        fields=[
            F("deviation_x", "Deviation in X", "in", 0.01, "Measured minus basic"),
            F("deviation_y", "Deviation in Y", "in", 0.005, "Measured minus basic"),
        ],
        results=[
            R("true_position", "True position", "in"),
            R("true_position_mm", "True position", "mm"),
            R("radius", "Radial deviation", "in"),
            R("zone_area", "Zone area", "in²"),
        ],
        formula={
            "true_position": "2*sqrt(pow(deviation_x,2)+pow(deviation_y,2))",
            "true_position_mm": "2*sqrt(pow(deviation_x,2)+pow(deviation_y,2))*25.4",
            "radius": "sqrt(pow(deviation_x,2)+pow(deviation_y,2))",
            "zone_area": "pi*pow(sqrt(pow(deviation_x,2)+pow(deviation_y,2)),2)",
            "deviation_x": "sqrt(pow(true_position/2,2)-pow(deviation_y,2))",
            "deviation_y": "sqrt(pow(true_position/2,2)-pow(deviation_x,2))",
        },
        prose={
            "why": ("<p>True position is how a drawing says \"put this hole here, and let it be off by no more "
                    "than this much in any direction\". Because the tolerance is a circle, the deviation is "
                    "combined as a diameter — twice the radial distance — which is why the formula doubles it.</p>"),
            "formula_note": ("<p>The two deviations form a right triangle, so the radial error is the square "
                             "root of the sum of their squares. The tolerance zone is a circle of twice that "
                             "diameter, so the true position is the diameter of the smallest circle that would "
                             "contain the actual hole centre.</p>"),
            "example_note": ("<p>A hole {deviation_x|unit} off in X and {deviation_y|unit} off in Y has a radial "
                             "error of {radius|unit} and a true position of {true_position|unit} — "
                             "{true_position_mm|unit}.</p>"),
            "reading": ("<p>Read the true position against the drawing's tolerance: if it is inside, the hole "
                        "passes. A value at about seventy per cent of the tolerance is the sensible target, "
                        "because the next part will not be made the same way.</p>"),
            "scenarios": [
                {"inputs": {"deviation_x": 0.02, "deviation_y": 0.02},
                 "note": "Equal deviations: the radial error is over forty per cent larger than either."},
                {"inputs": {"deviation_x": 0.005, "deviation_y": 0},
                 "note": "A hole off in one axis only: the position is twice the deviation."},
            ],
            "pitfalls": [
                "<strong>Radial error quoted as true position.</strong> It is half the tolerance zone.",
                "<strong>Deviations added rather than squared.</strong> The error is a vector.",
                "<strong>MMC bonus forgotten.</strong> It enlarges the zone.",
            ],
            "units_note": ("<p>Deviations and position in inches and millimetres.</p>"),
            "limits": [
                "<strong>Two axes.</strong> A three-dimensional position needs a third term.",
                "<strong>Position only.</strong> Form and orientation are separate tolerances.",
            ],
            "uses": [
                "<li>Checking a hole on a CMM.</li>",
                "<li>Converting a drawing callout.</li>",
                "<li>Reporting an inspection result.</li>",
            ],
        },
        faq=[
            ("Why does the true position formula double the error?",
             "Because the tolerance is a diametral zone, so the combined error is expressed as a diameter."),
            ("What true position is acceptable?",
             "Whatever the drawing allows — the calculated value must be inside that zone."),
        ],
        related=[("/construction/bolt-circle", "Bolt circle"),
                 ("/construction/clearance-hole", "Clearance hole"),
                 ("/construction/thread", "Thread")],
    ),

    S(
        slug="welding",
        name="Welding",
        title="Welding Calculator: Fillet Volume, Weight and Cost",
        desc="Work out the weld metal in a fillet run: throat, volume, deposited weight, the electrode it needs and the cost at a price per pound.",
        what=("<p><strong>Throat = 0.707 × leg</strong>; <strong>volume = leg² ÷ 2 × length</strong>.</p>"),
        fields=[
            F("leg", "Fillet leg", "in", 0.25, "Both legs equal"),
            F("length", "Weld length", "in", 100, "Total run"),
            F("efficiency", "Deposition efficiency", "%", 65, "Electrode to weld metal"),
            F("price", "Electrode price", "$/lb", 4, "Per pound of electrode"),
        ],
        results=[
            R("throat", "Throat", "in"),
            R("volume", "Weld volume", "in³"),
            R("weight", "Deposited weight", "lb"),
            R("electrode", "Electrode needed", "lb"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "throat": "0.7071*leg",
            "volume": "pow(leg,2)/2*length",
            "weight": "pow(leg,2)/2*length*0.2836",
            "electrode": "pow(leg,2)/2*length*0.2836/(efficiency/100)",
            "cost": "pow(leg,2)/2*length*0.2836/(efficiency/100)*price",
            "leg": "sqrt(2*volume/length)",
            "length": "2*volume/pow(leg,2)",
            "price": "cost/electrode",
        },
        prose={
            "why": ("<p>Weld metal is bought, stored and paid for by weight, while a drawing gives a leg length "
                    "and a run. Turning one into the other is what an estimate needs, and the deposition "
                    "efficiency is the bridge: not all the electrode reaches the joint.</p>"),
            "formula_note": ("<p>A fillet weld has a triangular cross-section, so its area is half the square of "
                             "the leg, and the throat is the leg times the sine of forty five degrees. The volume "
                             "is that area along the run, the weight uses steel's 0.2836 pounds per cubic inch, "
                             "and the electrode is the deposited weight divided by the efficiency.</p>"),
            "example_note": ("<p>A {leg|unit} fillet {length|unit} long has a {throat|unit} throat and "
                             "{volume|unit} of weld metal, weighing {weight|unit}. At {efficiency|unit} "
                             "efficiency that is {electrode|unit} of electrode, costing {cost}.</p>"),
            "reading": ("<p>Read the electrode against the deposit: a third more electrode than weld metal is "
                        "normal. Much more means the efficiency has been set for a process that is not "
                        "stick welding.</p>"),
            "scenarios": [
                {"inputs": {"leg": 0.375, "length": 200},
                 "note": "A heavier fillet over a longer run: the weight climbs with the square of the leg."},
                {"inputs": {"leg": 0.125, "efficiency": 90, "price": 6},
                 "note": "A light wire-fed run with a high efficiency."},
            ],
            "pitfalls": [
                "<strong>Leg used as throat.</strong> The throat is 0.707 of the leg.",
                "<strong>Efficiency assumed at 100.</strong> Stick welding wastes a third.",
                "<strong>Waste and stubs left out.</strong> They are already in the efficiency.",
            ],
            "units_note": ("<p>Leg and length in inches, volume in cubic inches, weight and electrode in "
                           "pounds, efficiency in per cent.</p>"),
            "limits": [
                "<strong>Equal legs.</strong> An unequal fillet needs its own areas.",
                "<strong>No distortion or preparation.</strong> Those change the real cost.",
            ],
            "uses": [
                "<li>Estimating electrode for a job.</li>",
                "<li>Pricing weld metal per foot.</li>",
                "<li>Comparing a stick and a wire process.</li>",
            ],
        },
        faq=[
            ("How much weld metal is in a fillet?",
             "Half the leg squared, times the length of the run."),
            ("How much electrode for 100 feet of quarter inch fillet?",
             "About four pounds of deposited metal, and about six pounds of stick electrode."),
        ],
        related=[("/construction/carbon-equivalent", "Carbon equivalent"),
                 ("/construction/steel-weight", "Steel weight"),
                 ("/construction/bending-stress", "Bending stress")],
    ),
]
