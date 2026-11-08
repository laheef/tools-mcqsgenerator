"""Batch 5c — layout and fitting: balusters, marks, sag, offsets and holes."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="baluster",
        name="Baluster",
        title="Baluster Calculator: Count, Gap and Spacing",
        desc="Work out how many balusters a rail run takes, the equal gap between them and the centre spacing, while keeping the gap under your limit.",
        what=("<p><strong>Balusters = (run − max gap) ÷ (baluster width + max gap)</strong>, rounded up; the "
              "gap is then equalised across the run.</p>"),
        fields=[
            F("run", "Run between posts", "in", 96, "Clear opening"),
            F("baluster_width", "Baluster width", "in", 1.5, "Face width"),
            F("max_gap", "Maximum gap", "in", 4, "Building code usually caps this at four"),
        ],
        results=[
            R("balusters", "Balusters", ""),
            R("gap", "Equal gap", "in"),
            R("spacing", "Centre spacing", "in"),
            R("coverage", "Closed share", "%"),
        ],
        formula={
            "balusters": "ceil((run-max_gap)/(baluster_width+max_gap))",
            "gap": "(run-ceil((run-max_gap)/(baluster_width+max_gap))*baluster_width)"
                   "/(ceil((run-max_gap)/(baluster_width+max_gap))+1)",
            "spacing": "baluster_width+(run-ceil((run-max_gap)/(baluster_width+max_gap))*baluster_width)"
                       "/(ceil((run-max_gap)/(baluster_width+max_gap))+1)",
            "coverage": "ceil((run-max_gap)/(baluster_width+max_gap))*baluster_width/run*100",
            "run": "balusters*baluster_width+(balusters+1)*gap",
            "max_gap": "(run-balusters*baluster_width)/(balusters+1)",
        },
        prose={
            "why": ("<p>A balustrade is judged by its gaps, not by its balusters. The building code cares that "
                    "a sphere of a certain size cannot pass between them, so the job is to fit as few "
                    "balusters as the gap allows and then space them perfectly evenly, because the eye reads "
                    "the gaps.</p>"),
            "formula_note": ("<p>If there are n balusters there are n+1 gaps, one at each end and one between "
                             "every pair. The count comes from assuming the widest allowed gap and rounding "
                             "up, and the equal gap is then whatever is left of the run after the balusters "
                             "are taken out, shared between those gaps.</p>"),
            "example_note": ("<p>A {run|unit} opening with {baluster_width|unit} balusters and a "
                             "{max_gap|unit} limit takes {balusters} balusters at a {gap|unit} gap, which is "
                             "{spacing|unit} between centres and {coverage} of the run closed.</p>"),
            "reading": ("<p>Read the equal gap against the limit: it should always come out at or under it, "
                        "and usually just under. A gap well below the limit means a baluster too many, which "
                        "is a cost you did not need.</p>"),
            "scenarios": [
                {"inputs": {"run": 72, "max_gap": 4, "baluster_width": 2},
                 "note": "Heavier balusters on a shorter opening: a slightly wider gap remains."},
                {"inputs": {"run": 120, "max_gap": 3.5},
                 "note": "A tighter gap limit on a long rail."},
            ],
            "pitfalls": [
                "<strong>Running the count without the end gaps.</strong> There is always one more gap.",
                "<strong>Gap measured between centres.</strong> The code measures the clear opening.",
                "<strong>Cutting the last baluster to fit.</strong> Space the whole run equally instead.",
            ],
            "units_note": ("<p>Run, baluster width and gaps in inches, the count as pieces.</p>"),
            "limits": [
                "<strong>Straight level run.</strong> A rake changes the count.",
                "<strong>No code check.</strong> Confirm the local limit before cutting.",
            ],
            "uses": [
                "<li>Laying out a deck balustrade.</li>",
                "<li>Checking a stair rail against code.</li>",
                "<li>Ordering balusters for a porch.</li>",
            ],
        },
        faq=[
            ("How many balusters per foot?",
             "About two for a one and a half inch baluster with a four inch gap limit."),
            ("How do I space balusters evenly?",
             "Count them first, then divide the remaining run between one more gap than there are balusters."),
        ],
        no_round_trip=["max_gap"],
        related=[("/construction/spindle-spacing", "Spindle spacing"),
                 ("/construction/fence-picket", "Fence picket"),
                 ("/construction/decking", "Decking")],
    ),

    S(
        slug="spindle-spacing",
        name="Spindle spacing",
        title="Spindle Spacing Calculator: Marks, Equal Spacing",
        desc="Divide a run into equal spaces at a chosen spindle spacing, with the margin at each end, the number of marks and the real spacing.",
        what=("<p><strong>Spaces = (run − 2 × margin) ÷ spacing</strong>, rounded down; the real spacing is the "
              "usable run divided by that count.</p>"),
        fields=[
            F("run", "Run", "in", 120, "Total length"),
            F("spacing", "Nominal spacing", "in", 6, "What you would like"),
            F("margin", "End margin", "in", 2, "Clear at each end"),
        ],
        results=[
            R("spaces", "Spaces", ""),
            R("marks", "Marks", ""),
            R("actual_spacing", "Real spacing", "in"),
            R("leftover", "Leftover", "in"),
        ],
        formula={
            "spaces": "floor((run-2*margin)/spacing)",
            "marks": "floor((run-2*margin)/spacing)-1",
            "actual_spacing": "(run-2*margin)/floor((run-2*margin)/spacing)",
            "leftover": "run-2*margin-floor((run-2*margin)/spacing)*spacing",
            "run": "spaces*actual_spacing+2*margin",
            "margin": "(run-spaces*spacing)/2",
        },
        prose={
            "why": ("<p>Spindles, pickets, hooks and shelf pins all ask the same question: how many equal gaps "
                    "fit in this run without a ragged one at the end. Working from the nominal spacing gets "
                    "you close; equalising the remainder is what makes the run look deliberate.</p>"),
            "formula_note": ("<p>The usable run is the total less a margin at each end, and the number of "
                             "spaces is that run divided by the nominal spacing and rounded down, because a "
                             "part space at the end is not a space. The real spacing then spreads the "
                             "leftover evenly, and the marks are one fewer than the spaces.</p>"),
            "example_note": ("<p>A {run|unit} run with a {margin|unit} margin at each end gives {spaces} "
                             "spaces at {actual_spacing|unit} instead of {spacing|unit}, {marks} marks in "
                             "all, with {leftover|unit} to absorb.</p>"),
            "reading": ("<p>Read the real spacing against the nominal: the difference is the leftover divided "
                        "by the number of spaces. More than an eighth of an inch means the nominal spacing "
                        "should be changed rather than absorbed.</p>"),
            "scenarios": [
                {"inputs": {"run": 96, "spacing": 4, "margin": 1.5},
                 "note": "Close spacing on a short run: a small absorbable leftover."},
                {"inputs": {"run": 240, "spacing": 8, "margin": 3},
                 "note": "A long run where the leftover vanishes into the spacing."},
            ],
            "pitfalls": [
                "<strong>Spaces counted as marks.</strong> There is one more space than mark.",
                "<strong>Margin applied at one end only.</strong> It is at each end.",
                "<strong>Leftover crammed into the last gap.</strong> Spread it.",
            ],
            "units_note": ("<p>All lengths in inches, counts as pieces and marks.</p>"),
            "limits": [
                "<strong>Equal spacing.</strong> A wall that is out of square needs on-site adjustment.",
                "<strong>No spindle width.</strong> Subtract it first if the gap matters.",
            ],
            "uses": [
                "<li>Setting out a spindle rail.</li>",
                "<li>Spacing hooks or pegs evenly.</li>",
                "<li>Dividing a shelf run into bays.</li>",
            ],
        },
        faq=[
            ("How do I divide a run into equal spaces?",
             "Choose the spacing you want, take the number of whole spaces that fit, then share the leftover."),
            ("How many marks for a 120 inch run?",
             "Eighteen at a six inch spacing with a two inch margin, which gives nineteen spaces."),
        ],
        no_round_trip=["margin"],
        related=[("/construction/baluster", "Baluster"),
                 ("/construction/fence-picket", "Fence picket"),
                 ("/construction/board-and-batten", "Board and batten")],
    ),

    S(
        slug="sag",
        name="Sag",
        title="Sag Calculator: Cable Deflection from Tension",
        desc="Estimate how far a cable or wire sags at mid-span from its span, weight and tension, with the sag as a share of the span.",
        what=("<p><strong>Sag = weight per foot × span² ÷ (8 × tension)</strong>.</p>"),
        fields=[
            F("span", "Span", "ft", 50, "Between supports"),
            F("weight", "Weight", "lb/ft", 0.5, "Cable plus anything hung on it"),
            F("tension", "Tension", "lb", 300, "Pulling force in the cable"),
        ],
        results=[
            R("sag", "Sag at mid-span", "ft"),
            R("sag_pct", "Sag share of span", "%"),
            R("cable_length", "Cable length", "ft"),
        ],
        formula={
            "sag": "weight*pow(span,2)/(8*tension)",
            "sag_pct": "weight*pow(span,2)/(8*tension)/span*100",
            "cable_length": "span+8*pow(weight*pow(span,2)/(8*tension),2)/(3*span)",
            "span": "sqrt(8*tension*sag/weight)",
            "weight": "8*tension*sag/pow(span,2)",
            "tension": "weight*pow(span,2)/(8*sag)",
        },
        prose={
            "why": ("<p>Every strung cable sags, and the sag is not a defect — it is how the cable carries "
                    "its own weight. Too little sag means the tension is high and the anchors are being pulled "
                    "hard; too much means a low clearance or a cable that looks slack.</p>"),
            "formula_note": ("<p>For a cable under uniform weight the profile is close to a parabola, and the "
                             "mid-span sag is the weight per foot times the span squared, divided by eight "
                             "times the tension. The cable length adds a small correction for the sag itself, "
                             "which is why a long span needs more cable than the distance between the "
                             "posts.</p>"),
            "example_note": ("<p>A {span|unit} span of {weight|unit} cable at {tension|unit} of tension sags "
                             "{sag|unit} at mid-span, which is {sag_pct} of the span, and takes "
                             "{cable_length|unit} of cable.</p>"),
            "reading": ("<p>Read the sag share: under two per cent looks taut, five per cent looks like a "
                        "cable, ten per cent looks slack. A share over ten means either the tension is low or "
                        "the cable is heavy for the span.</p>"),
            "scenarios": [
                {"inputs": {"span": 30, "tension": 600},
                 "note": "A shorter span at double the tension: a quarter of the sag."},
                {"inputs": {"weight": 1.2, "span": 80},
                 "note": "A heavy cable on a long span: the sag grows with the square."},
            ],
            "pitfalls": [
                "<strong>Tension entered as safe working load.</strong> Use the actual pull.",
                "<strong>Weight of the load left out.</strong> Add anything hung on the cable.",
                "<strong>Sag measured at the anchor.</strong> Mid-span is the maximum.",
            ],
            "units_note": ("<p>Span in feet, weight per foot in pounds, tension in pounds, sag in feet.</p>"),
            "limits": [
                "<strong>Uniform load.</strong> A point load mid-span behaves differently.",
                "<strong>Static only.</strong> Wind and ice add load.",
            ],
            "uses": [
                "<li>Checking clearance under a wire.</li>",
                "<li>Sizing tension for a string light run.</li>",
                "<li>Estimating cable length.</li>",
            ],
        },
        faq=[
            ("How much does a cable sag?",
             "Weight times span squared over eight times tension — the form does it for your numbers."),
            ("Does more tension reduce sag?",
             "Yes, directly: double the tension and the sag halves."),
        ],
        related=[("/construction/bolt-circle", "Bolt circle"),
                 ("/construction/rolling-offset", "Rolling offset"),
                 ("/construction/vertical-curve", "Vertical curve")],
    ),

    S(
        slug="rolling-offset",
        name="Rolling offset",
        title="Rolling Offset Calculator: Travel, Run and Cut Length",
        desc="Work out the travel and run of a rolling offset from the offset distance and the fitting angle, with the length of pipe between the two bends.",
        what=("<p><strong>Travel = offset ÷ sin θ</strong> and <strong>run = offset ÷ tan θ</strong>.</p>"),
        fields=[
            F("offset", "Offset", "in", 12, "How far the pipe must shift"),
            F("angle", "Fitting angle", "°", 45, "Forty five is the common fitting"),
        ],
        results=[
            R("travel", "Travel", "in"),
            R("run", "Run", "in"),
            R("travel_ft", "Travel", "ft"),
            R("fitting_ratio", "Travel per inch", ""),
        ],
        formula={
            "travel": "offset/sin(angle*pi/180)",
            "run": "offset/tan(angle*pi/180)",
            "travel_ft": "offset/sin(angle*pi/180)/12",
            "fitting_ratio": "1/sin(angle*pi/180)",
            "offset": "travel*sin(angle*pi/180)",
            "angle": "asin(offset/travel)*180/pi",
        },
        prose={
            "why": ("<p>A rolling offset is the piece of pipe that steps sideways and up at the same time. The "
                    "fitter needs two numbers: how far the pipe travels along the diagonal, and how far it "
                    "runs in plan, because the second one is what the cut length and the fitting take-off "
                    "are measured from.</p>"),
            "formula_note": ("<p>The offset is the side opposite the fitting angle, so the diagonal travel is "
                             "the offset divided by the sine of the angle. The plan run is the offset divided "
                             "by the tangent, which for a forty five degree fitting is simply the offset "
                             "itself — the reason forty fives are the fitting of choice.</p>"),
            "example_note": ("<p>A {offset|unit} offset through a {angle|unit} fitting travels "
                             "{travel|unit} and runs {run|unit} in plan, which is {travel_ft|unit} along the "
                             "pipe — {fitting_ratio} of travel for every inch of offset.</p>"),
            "reading": ("<p>Read the travel per inch: 1.414 for forty five degrees, 2.0 for thirty, 1.155 for "
                        "sixty. A ratio outside that band means the angle is not a standard fitting.</p>"),
            "scenarios": [
                {"inputs": {"offset": 8, "angle": 30},
                 "note": "A shallower angle: double the travel for the same offset."},
                {"inputs": {"offset": 18, "angle": 60},
                 "note": "A steep offset close to the wall: a short, tight step."},
            ],
            "pitfalls": [
                "<strong>Fitting angle measured from the pipe.</strong> It is the bend angle.",
                "<strong>Fitting take-off ignored.</strong> Each bend eats into the travel.",
                "<strong>Offset measured centre to centre.</strong> It is not the gap between pipes.",
            ],
            "units_note": ("<p>Offset and travel in inches, travel also in feet, angle in degrees.</p>"),
            "limits": [
                "<strong>Two equal bends.</strong> Unequal bends need a different triangle.",
                "<strong>No fitting allowances.</strong> Subtract the take-off before cutting.",
            ],
            "uses": [
                "<li>Cutting a pipe offset.</li>",
                "<li>Setting out conduit around an obstruction.</li>",
                "<li>Checking a fitter's travel figure.</li>",
            ],
        },
        faq=[
            ("What is the multiplier for a 45 degree offset?",
             "1.414 — the travel is the offset times the square root of two."),
            ("What is the run of a rolling offset?",
             "The offset divided by the tangent of the angle, which equals the offset at forty five degrees."),
        ],
        related=[("/construction/pipe-volume", "Pipe volume"),
                 ("/construction/angle-cut", "Angle cut"),
                 ("/construction/sag", "Sag")],
    ),

    S(
        slug="bolt-circle",
        name="Bolt circle",
        title="Bolt Circle Calculator: Chord, Arc and Coordinates",
        desc="Lay out holes on a bolt circle: the chord between adjacent holes, the arc spacing, the radius and the coordinates of the first hole.",
        what=("<p><strong>Chord = D × sin(π ÷ n)</strong>; <strong>arc = π × D ÷ n</strong>.</p>"),
        fields=[
            F("diameter", "Bolt circle diameter", "in", 12, "Across the circle of holes"),
            F("holes", "Number of holes", "", 8, "Equally spaced"),
            F("start_angle", "Start angle", "°", 0, "From the positive X axis"),
        ],
        results=[
            R("radius", "Radius", "in"),
            R("chord", "Chord", "in"),
            R("arc_spacing", "Arc spacing", "in"),
            R("x_first", "First hole X", "in"),
            R("y_first", "First hole Y", "in"),
        ],
        formula={
            "radius": "diameter/2",
            "chord": "diameter*sin(pi/holes)",
            "arc_spacing": "pi*diameter/holes",
            "x_first": "diameter/2*cos(start_angle*pi/180)",
            "y_first": "diameter/2*sin(start_angle*pi/180)",
            "diameter": "2*radius",
            "holes": "pi*diameter/arc_spacing",
            "start_angle": "atan(y_first/x_first)*180/pi",
        },
        prose={
            "why": ("<p>A flange, a wheel hub and a cover plate are all drilled on a bolt circle, and the "
                    "layout number that matters is the chord — the straight distance between neighbouring "
                    "holes — because that is what a pair of dividers or a mill table is set to.</p>"),
            "formula_note": ("<p>Each hole subtends an angle of pi divided by the number of holes at the "
                             "centre, so the chord is the diameter times the sine of that half-angle, and the "
                             "arc along the circle is the circumference divided by the hole count. The first "
                             "hole's position is the radius resolved onto the two axes.</p>"),
            "example_note": ("<p>{holes} holes on a {diameter|unit} circle sit {radius|unit} from the centre, "
                             "{chord|unit} apart on the chord and {arc_spacing|unit} apart along the arc. The "
                             "first hole, at {start_angle|unit}, is at X {x_first|unit} and Y "
                             "{y_first|unit}.</p>"),
            "reading": ("<p>Read the chord against the arc: the chord is always a little shorter, and the "
                        "gap between them shrinks as the hole count rises. A chord equal to the arc means the "
                        "hole count is far too high for the diameter.</p>"),
            "scenarios": [
                {"inputs": {"diameter": 6, "holes": 4, "start_angle": 45},
                 "note": "Four holes at forty five degrees: a square pattern rotated."},
                {"inputs": {"diameter": 20, "holes": 12, "start_angle": 15},
                 "note": "A large flange with twelve holes."},
            ],
            "pitfalls": [
                "<strong>Chord used as arc.</strong> They differ, and the error grows with fewer holes.",
                "<strong>Start angle measured from the wrong axis.</strong> Zero is the positive X.",
                "<strong>Diameter entered as radius.</strong> A factor of two throughout.",
            ],
            "units_note": ("<p>Diameter, chord and arc in inches, angle in degrees, coordinates in inches.</p>"),
            "limits": [
                "<strong>Equal spacing.</strong> Unequal hole patterns are laid out individually.",
                "<strong>True position.</strong> Tolerances are a separate calculation.",
            ],
            "uses": [
                "<li>Marking out a flange.</li>",
                "<li>Setting a rotary table.</li>",
                "<li>Checking a drawing's chord dimension.</li>",
            ],
        },
        faq=[
            ("How do you calculate a bolt circle?",
             "Divide the circle into equal angles — 360 over the hole count — and use the sine of half that "
             "angle for the chord."),
            ("What is the chord for 8 holes on a 12 inch circle?",
             "About 4.59 inches, against an arc spacing of 4.71."),
        ],
        related=[("/construction/bolt-torque", "Bolt torque"),
                 ("/construction/pitch-diameter", "Pitch diameter"),
                 ("/construction/sag", "Sag")],
    ),

    S(
        slug="box-fill",
        name="Box fill",
        title="Box Fill Calculator: Conductor Volume and Fill Percent",
        desc="Check an electrical box against its volume allowance: conductors, devices, clamps and grounds counted in volume units and compared with capacity.",
        what=("<p><strong>Volume = (conductors + 2 × devices + clamps + grounds) × unit volume</strong>, "
              "compared with the box volume.</p>"),
        fields=[
            F("box_volume", "Box volume", "in³", 22, "Stamped inside the box"),
            F("conductors", "Current-carrying conductors", "", 8, "Count every one that enters"),
            F("conductor_volume", "Volume per conductor", "in³", 2.25, "From the wire gauge table"),
            F("devices", "Devices", "", 1, "Each counts as two"),
            F("clamps", "Clamps", "", 1, "One allowance if present"),
            F("grounds", "Grounds", "", 1, "One allowance for all"),
        ],
        results=[
            R("fill_volume", "Fill volume", "in³"),
            R("fill_pct", "Fill", "%"),
            R("spare_volume", "Spare volume", "in³"),
            R("unit_count", "Volume units", ""),
        ],
        formula={
            "fill_volume": "(conductors+2*devices+clamps+grounds)*conductor_volume",
            "fill_pct": "(conductors+2*devices+clamps+grounds)*conductor_volume/box_volume*100",
            "spare_volume": "box_volume-(conductors+2*devices+clamps+grounds)*conductor_volume",
            "unit_count": "conductors+2*devices+clamps+grounds",
            "conductors": "box_volume*1/conductor_volume-2*devices-clamps-grounds",
        },
        prose={
            "why": ("<p>A box that is too full is a code violation and a fire risk: the wires cannot shed "
                    "heat, and the insulation is damaged when the device is folded back. Box fill is counted "
                    "in volume units rather than wires because a device takes the space of two conductors and "
                    "a clamp takes one.</p>"),
            "formula_note": ("<p>Each current-carrying conductor counts once, each device twice, each clamp "
                             "once and all the grounds together once. Multiply that unit count by the volume "
                             "the largest conductor requires and compare with the cubic inches stamped inside "
                             "the box.</p>"),
            "example_note": ("<p>{unit_count} volume units at {conductor_volume|unit} each need "
                             "{fill_volume|unit}, which is {fill_pct} of a {box_volume|unit} box, leaving "
                             "{spare_volume|unit} spare.</p>"),
            "reading": ("<p>Read the fill against a hundred: under it and the box passes. Slightly over, a "
                        "deeper box of the same footprint is usually the cheapest fix; well over means the "
                        "box is the wrong size for the circuit.</p>"),
            "scenarios": [
                {"inputs": {"box_volume": 18, "conductors": 6, "devices": 0, "clamps": 0, "grounds": 1},
                 "note": "A junction with no device: only the conductors and a ground."},
                {"inputs": {"box_volume": 30, "conductors": 10, "conductor_volume": 2.25},
                 "note": "A larger box taking a heavier conductor count."},
            ],
            "pitfalls": [
                "<strong>Devices counted as one.</strong> They count as two units.",
                "<strong>Grounds counted individually.</strong> One allowance covers them all.",
                "<strong>Unit volume guessed.</strong> It comes from the wire gauge table.",
            ],
            "units_note": ("<p>Box volume and allowances in cubic inches, counts as pieces, fill in per cent.</p>"),
            "limits": [
                "<strong>Standard boxes.</strong> Pendant boxes and boxes with barriers have their own rules.",
                "<strong>No code book.</strong> Confirm against your edition before signing off.",
            ],
            "uses": [
                "<li>Checking a box before wiring.</li>",
                "<li>Choosing a deeper box for a device.</li>",
                "<li>Teaching the volume-unit rule.</li>",
            ],
        },
        faq=[
            ("How many conductors fit in a 22 cubic inch box?",
             "Twelve volume units at 2.25 each fills it exactly, so fewer once a device is fitted."),
            ("Does a ground wire count as a conductor?",
             "It takes one volume allowance for all the grounds together, not one each."),
        ],
        no_round_trip=["conductors"],
        related=[("/construction/clearance-hole", "Clearance hole"),
                 ("/construction/junction-box-sizing", "Junction box sizing"),
                 ("/construction/hole-volume", "Hole volume")],
    ),

    S(
        slug="clearance-hole",
        name="Clearance hole",
        title="Clearance Hole Calculator: Diameter, Edge and Area",
        desc="Work out the clearance hole for a bolt: the finished hole diameter, the edge distance a plate needs and the hole's cross-section area.",
        what=("<p><strong>Hole = bolt + clearance</strong>; the edge distance is one and a half bolt diameters, "
              "and the area follows from the hole diameter.</p>"),
        fields=[
            F("bolt_diameter", "Bolt diameter", "in", 0.5, "Nominal shank"),
            F("clearance", "Clearance", "in", 0.0625, "One sixteenth for a free fit"),
            F("thickness", "Plate thickness", "in", 0.5, "Material being drilled"),
        ],
        results=[
            R("hole_diameter", "Hole diameter", "in"),
            R("edge_distance", "Edge distance", "in"),
            R("hole_area", "Hole area", "in²"),
            R("grip_ratio", "Thickness to bolt", ""),
        ],
        formula={
            "hole_diameter": "bolt_diameter+clearance",
            "edge_distance": "1.5*bolt_diameter",
            "hole_area": "pi/4*pow(bolt_diameter+clearance,2)",
            "grip_ratio": "thickness/bolt_diameter",
            "bolt_diameter": "hole_diameter-clearance",
            "clearance": "hole_diameter-bolt_diameter",
        },
        prose={
            "why": ("<p>A bolt hole is deliberately bigger than the bolt. The clearance is what lets a bolt "
                    "drop in with the parts slightly out of line, and the edge distance is what stops the "
                    "plate tearing out when the bolt is tightened or loaded.</p>"),
            "formula_note": ("<p>The hole is the nominal bolt diameter plus the clearance class, which is "
                             "about a sixteenth of an inch for a normal fit and less for a machined one. The "
                             "edge distance of one and a half diameters is a structural rule of thumb, and the "
                             "hole area is a circle of the finished diameter.</p>"),
            "example_note": ("<p>A {bolt_diameter|unit} bolt with {clearance|unit} of clearance needs a "
                             "{hole_diameter|unit} hole, {edge_distance|unit} of edge distance, and removes "
                             "{hole_area|unit} of plate. At {thickness|unit} thick the grip ratio is "
                             "{grip_ratio}.</p>"),
            "reading": ("<p>Read the grip ratio: under one and the plate is thin against the bolt, so a "
                        "washer is doing the work; over four and the bolt is long and the shear plane is far "
                        "from the nut.</p>"),
            "scenarios": [
                {"inputs": {"bolt_diameter": 0.75, "clearance": 0.0625, "thickness": 0.75},
                 "note": "A heavier bolt in a thicker plate."},
                {"inputs": {"bolt_diameter": 0.375, "clearance": 0.03125},
                 "note": "A machined fit on a small bolt: half the usual clearance."},
            ],
            "pitfalls": [
                "<strong>Hole drilled at the nominal size.</strong> The bolt will not pass.",
                "<strong>Edge distance measured to the hole edge.</strong> It is to the centre.",
                "<strong>Clearance ignored on a slotted joint.</strong> Slots need more.",
            ],
            "units_note": ("<p>Bolt, clearance, thickness and distances in inches, area in square inches.</p>"),
            "limits": [
                "<strong>Structural rule of thumb.</strong> Code edge distances vary by joint.",
                "<strong>No tolerance stack-up.</strong> Machined assemblies need a fit calculation.",
            ],
            "uses": [
                "<li>Drilling a bolted connection.</li>",
                "<li>Checking edge distance before cutting plate.</li>",
                "<li>Sizing a bolt for a bracket.</li>",
            ],
        },
        faq=[
            ("How much bigger should a bolt hole be?",
             "About a sixteenth of an inch over the bolt for a normal fit, less for a precision fit."),
            ("What is the minimum edge distance for a bolt?",
             "One and a half bolt diameters from the centre to the edge as a rule of thumb."),
        ],
        related=[("/construction/bolt-circle", "Bolt circle"),
                 ("/construction/bolt-torque", "Bolt torque"),
                 ("/construction/box-fill", "Box fill")],
    ),
]
