"""Batch 2c — stairs, angles and board cladding."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="stairs",
        name="Stairs",
        title="Stairs Calculator: Risers, Run and Stringer",
        desc="Work out the risers, the actual riser height, the total run, the stringer length and the stair angle for a flight, from the floor-to-floor rise. in one go.",
        what=("<p>Stairs are set out from the total rise: <strong>risers = total rise ÷ riser height</strong>, "
              "rounded up, and <strong>run = (risers − 1) × tread depth</strong> because the top step is the "
              "floor.</p>"),
        fields=[
            F("total_rise", "Floor-to-floor rise", "in", 108, "Finished floor to finished floor"),
            F("riser", "Maximum riser height", "in", 7.5, "7¾ is the usual code maximum"),
            F("tread", "Tread depth", "in", 10, "10 in minimum, 11 more comfortable"),
            F("width", "Stair width", "ft", 3.5, "Clear width for the calculation of the stringer"),
        ],
        results=[
            R("risers", "Risers", ""),
            R("riser_actual", "Actual riser height", "in"),
            R("total_run", "Total run", "ft"),
            R("stringer", "Stringer length", "ft"),
            R("angle", "Stair angle", "°"),
        ],
        formula={
            "risers": "ceil(total_rise/riser)",
            "riser_actual": "total_rise/ceil(total_rise/riser)",
            "total_run": "(ceil(total_rise/riser)-1)*tread/12",
            "stringer": "sqrt(pow((ceil(total_rise/riser)-1)*tread/12,2)+pow(total_rise/12,2))",
            "angle": "atan(total_rise/((ceil(total_rise/riser)-1)*tread))*180/pi",
                        "tread": "total_run*12/(ceil(total_rise/riser)-1)",
        },
        prose={
            "why": ("<p>A stair is the one part of a house where the numbers are not allowed to drift: every "
                    "riser in a flight has to be within ⅜ in of the others, or the stair becomes a trip "
                    "hazard. The calculation starts from the total rise, because that is the only dimension "
                    "that is truly fixed.</p>"),
            "formula_note": ("<p>Dividing the total rise by the maximum riser gives a number of risers that "
                             "is almost never whole, so it is rounded up and the riser height is recalculated "
                             "from it — that is the actual riser the stair will have. The run counts one "
                             "fewer tread, because the top riser lands on the floor.</p>"),
            "example_note": ("<p>A 108 in floor-to-floor rise with a 7½ in maximum: 14.4 rounds to 15 "
                             "risers, so each is 7.2 in. Fourteen treads at 10 in make a 11.67 ft run, and "
                             "the stringer along the slope is 14.7 ft.</p>"),
            "reading": ("<p>Read the actual riser against the code: 4 to 7¾ in, all equal. The angle is a "
                        "useful cross-check too — domestic stairs land between 30 and 38 degrees, and "
                        "anything outside that is either a ships ladder or uncomfortably shallow.</p>"),
            "scenarios": [
                {"inputs": {"total_rise": 96, "riser": 7.5, "tread": 11, "width": 3},
                 "note": "A basement stair with a shorter rise and a deeper tread — a gentler flight."},
                {"inputs": {"total_rise": 120, "riser": 7.75, "tread": 10, "width": 4},
                 "note": "A full storey at the code maximum riser: the flight that just fits in the "
                         "plan."},
            ],
            "pitfalls": [
                "<strong>Rise measured to the subfloor.</strong> It is finished floor to finished floor, "
                "including the flooring above and below.",
                "<strong>Riser height left as the maximum.</strong> The actual riser is the total rise "
                "divided by the number of risers.",
                "<strong>Treads counted equal to risers.</strong> The top riser lands on the floor, so "
                "there is one fewer tread.",
            ],
            "units_note": ("<p>Rise and tread in inches, width in feet, the run and stringer in feet and the "
                           "stair angle in degrees.</p>"),
            "limits": [
                "<strong>A straight flight.</strong> Winders, landings and spirals are set out "
                "differently.",
                "<strong>Headroom not checked.</strong> The opening above the stair is a separate "
                "calculation.",
            ],
            "uses": [
                "<li>Laying out a stair before cutting stringers.</li>",
                "<li>Checking a rise against the code.</li>",
                "<li>Sizing a stairwell opening.</li>",
            ],
        },
        faq=[
            ("How do you calculate the number of risers?",
             "Divide the total rise by the maximum riser height and round up; then divide again to get the "
             "actual riser."),
            ("How many treads for 15 risers?",
             "Fourteen — the top riser lands on the upper floor."),
        ],
        no_round_trip=["riser", "total_rise"],
        related=[("/construction/concrete-stairs", "Concrete stairs"),
                 ("/construction/spiral-staircase", "Spiral staircase"),
                 ("/construction/ramp-slope", "Ramp slope")],
    ),

    S(
        slug="spiral-staircase",
        name="Spiral staircase",
        title="Spiral Staircase Calculator: Treads and Turns",
        desc="Work out the treads, the turns, the walking distance and the tread width of a spiral staircase from the rise and the tread angle. and the well it needs in plan.",
        what=("<p>A spiral stair is a ring of treads: <strong>treads = rise ÷ riser</strong>, and "
              "<strong>turns = treads × tread angle ÷ 360</strong>. The walking line is the circle halfway "
              "between the two rails.</p>"),
        fields=[
            F("total_rise", "Floor-to-floor rise", "in", 108, "Finished floor to finished floor"),
            F("riser", "Riser height", "in", 7.5, "7½ to 9 for a spiral"),
            F("tread_angle", "Tread angle", "°", 30, "The pie angle of one tread — 30° is twelve a turn"),
            F("outer_radius", "Outer radius", "in", 30, "Centre to the outside edge"),
            F("inner_radius", "Inner radius", "in", 6, "Centre to the newel, half its diameter"),
        ],
        results=[
            R("treads", "Treads", ""),
            R("turns", "Turns", ""),
            R("walkline", "Walking distance", "ft"),
            R("tread_width", "Tread width", "in"),
        ],
        formula={
            "treads": "ceil(total_rise/riser)",
            "turns": "ceil(total_rise/riser)*tread_angle/360",
            "walkline": "2*pi*(outer_radius+inner_radius)/2/12*ceil(total_rise/riser)*tread_angle/360",
            "tread_width": "outer_radius-inner_radius",
                        "riser": "total_rise/ceil(total_rise/riser)",
            "tread_angle": "turns*360/ceil(total_rise/riser)",
        },
        prose={
            "why": ("<p>Spiral stairs buy floor area with discomfort: the treads are wedges, the walking line "
                    "is narrow, and the whole flight fits in a circle two or three feet across. The useful "
                    "numbers are how many treads it takes to climb the rise, how far round it goes, and how "
                    "far you actually walk.</p>"),
            "formula_note": ("<p>The tread angle decides how many treads make a full turn — 30° gives twelve, "
                             "15° gives twenty-four. The walking distance follows the circle at the midpoint "
                             "of the tread, which is where a person actually puts their feet.</p>"),
            "example_note": ("<p>A 108 in rise at 7.5 in is 15 treads. At 30° each that is 1.25 turns, and "
                             "the walkline — a circle of 18 in radius — comes to 11.8 ft of travel to climb "
                             "9 ft.</p>"),
            "reading": ("<p>Read the turns against the plan: more than about 1.5 turns and the stair is "
                        "working in a shaft rather than a room. A tread width under 24 in is tight for "
                        "carrying anything up.</p>"),
            "scenarios": [
                {"inputs": {"total_rise": 96, "riser": 8, "tread_angle": 24, "outer_radius": 36,
                            "inner_radius": 8},
                 "note": "A wider, slower turn — fifteen treads at 24°, so exactly one full turn."},
                {"inputs": {"total_rise": 120, "riser": 9, "tread_angle": 30, "outer_radius": 26,
                            "inner_radius": 6},
                 "note": "A steep compact stair to a loft: fewer, taller, tighter."},
            ],
            "pitfalls": [
                "<strong>Total run used like a straight stair.</strong> A spiral has no run — it has "
                "turns.",
                "<strong>Inner radius entered as the diameter.</strong> The radius is half the newel's "
                "diameter.",
                "<strong>Headroom ignored.</strong> A spiral needs the same clear height as any stair, "
                "and the turns decide where it is.",
            ],
            "units_note": ("<p>Rise and riser in inches, radii in inches, the tread angle in degrees, the "
                           "count of treads and turns as plain numbers, and the walking distance in feet.</p>"),
            "limits": [
                "<strong>Circular plan.</strong> A landing or an oval tread changes the walkline.",
                "<strong>Comfort not modelled.</strong> Codes limit spiral stairs in dwellings only.",
            ],
            "uses": [
                "<li>Checking a loft stair fits the rise.</li>",
                "<li>Working out how far a spiral turns.</li>",
                "<li>Sizing the well it needs.</li>",
            ],
        },
        faq=[
            ("How many treads does a spiral stair need?",
             "The rise divided by the riser, rounded up — fifteen for a 108 in rise at 7½ in."),
            ("What is the walking line on a spiral stair?",
             "The circle halfway between the inner and outer edges, where people actually step."),
        ],
        no_round_trip=["riser", "total_rise"],
        related=[("/construction/stairs", "Stairs"),
                 ("/construction/concrete-stairs", "Concrete stairs"),
                 ("/construction/ladder-angle", "Ladder angle")],
    ),

    S(
        slug="miter-angle",
        name="Miter angle",
        title="Miter Angle Calculator: Two Widths, One Joint",
        desc="Work out the two mitre angles where mouldings of different widths meet, from the joint angle and the face width of each piece. so unequal casings still close.",
        what=("<p>When two mouldings of different widths meet, the mitre is not 45°. With widths a and b and "
              "a joint angle θ: <strong>angle A = atan(a sin θ ÷ (a cos θ + b))</strong>.</p>"),
        fields=[
            F("joint_angle", "Joint angle", "°", 90, "The angle between the two walls"),
            F("a_width", "Width of piece A", "in", 3, "The face width of the first moulding"),
            F("b_width", "Width of piece B", "in", 5, "The face width of the second"),
        ],
        results=[
            R("angle_a", "Mitre on piece A", "°"),
            R("angle_b", "Mitre on piece B", "°"),
            R("difference", "Difference from 45°", "°"),
        ],
        formula={
            "angle_a": "atan(a_width*sin(rad(joint_angle))/(a_width*cos(rad(joint_angle))+b_width))*180/pi",
            "angle_b": "joint_angle-atan(a_width*sin(rad(joint_angle))/(a_width*cos(rad(joint_angle))+b_width))*180/pi",
            "difference": "abs(atan(a_width*sin(rad(joint_angle))/(a_width*cos(rad(joint_angle))+b_width))*180/pi-joint_angle/2)",
            "a_width": "b_width*sin(rad(joint_angle))*cos(atan(rad(angle_a)))/(cos(atan(rad(angle_a)))*sin(rad(joint_angle))-cos(rad(joint_angle))*sin(atan(rad(angle_a))))",
            "joint_angle": "angle_a+angle_b",
        },
        prose={
            "why": ("<p>Mitres are cut at half the joint angle, and that is right until the two pieces are "
                    "different widths. Then the cut has to be biased so that the two faces finish flush, and "
                    "the angle stops being 45°. Crown moulding, window casing and skirting all hit this "
                    "constantly.</p>"),
            "formula_note": ("<p>The formula projects the two face widths onto the joint and takes the "
                             "arctangent of the ratio they make. Equal widths reduce it to exactly half the "
                             "joint angle, which is the 45° cut everyone learns first.</p>"),
            "example_note": ("<p>A 90° corner between a 3 in and a 5 in moulding: piece A takes 31.0° and piece B 59.0°, a long way from 45/45. Setting the saw to 45 would leave a step "
                             "at the joint roughly the difference in width times the sine of the "
                             "error.</p>"),
            "reading": ("<p>Read the two angles against each other: they must add to the joint angle, and the "
                        "difference from 45° is the amount by which the joint is out of balance. The wider "
                        "piece always takes the larger cut.</p>"),
            "scenarios": [
                {"inputs": {"joint_angle": 90, "a_width": 4, "b_width": 4},
                 "note": "Equal widths: both cuts are 45°, which is the sanity check for the formula."},
                {"inputs": {"joint_angle": 135, "a_width": 2.5, "b_width": 4},
                 "note": "An obtuse corner with unequal casings — the joint that catches people who cut 22.5° "
                         "blindly."},
            ],
            "pitfalls": [
                "<strong>Half the joint angle assumed.</strong> True only for equal widths.",
                "<strong>Width measured on the back.</strong> It is the face width that shows in the "
                "joint.",
                "<strong>Inside and outside corners confused.</strong> The same numbers apply, but the "
                "cut is mirrored.",
            ],
            "units_note": ("<p>The joint angle in degrees, the two widths in inches, and the mitre angles in "
                           "degrees from the square cut.</p>"),
            "limits": [
                "<strong>Two flat faces.</strong> A profiled moulding meeting a flat one needs the profile "
                "projected.",
                "<strong>No spring angle.</strong> Crown moulding cut in the flat also needs its own angle.",
            ],
            "uses": [
                "<li>Cutting a casing joint between two widths.</li>",
                "<li>Fitting skirting round an off-square corner.</li>",
                "<li>Checking why a mitre did not close.</li>",
            ],
        },
        faq=[
            ("Why is my mitre not closing?",
             "Either the corner is not 90°, or the two pieces are different widths and need different "
             "angles."),
            ("What is the mitre angle for a 135° corner?",
             "67.5° on equal widths, and rather less on the wider piece if the widths differ."),
        ],
        no_round_trip=["a_width"],
        related=[("/construction/angle-cut", "Angle cut"),
                 ("/construction/wainscoting", "Wainscoting"),
                 ("/construction/board-and-batten", "Board and batten")],
    ),

    S(
        slug="angle-cut",
        name="Angle cut",
        title="Angle Cut Calculator: Slope, Mitre and Bevel",
        desc="Turn a rise and a run into a slope angle, the mitre that cuts it and the bevel that matches, with the pitch expressed as rise per 12. for a mitre saw setup.",
        what=("<p>A slope is an angle before it is a pair of saw settings: <strong>angle = atan(rise ÷ "
              "run)</strong>, the mitre is measured from the square cut, and the bevel from the face.</p>"),
        fields=[
            F("rise", "Rise", "in", 6, "How far it climbs"),
            F("run", "Run", "in", 12, "How far it travels"),
        ],
        results=[
            R("angle", "Slope angle", "°"),
            R("mitre", "Mitre from square", "°"),
            R("ratio", "Rise per 12", "x/12"),
        ],
        formula={
            "angle": "atan(rise/run)*180/pi",
            "mitre": "90-atan(rise/run)*180/pi",
            "ratio": "rise/run*12",
            "rise": "run*tan(rad(angle))",
            "run": "rise/tan(rad(angle))",
        },
        prose={
            "why": ("<p>Every angle cut is two numbers on a saw: how far the table turns and how far the "
                    "blade tilts. Getting from a rise and a run to those numbers is the step that most "
                    "off-cuts come from — especially on a mitre saw that measures its scales from a "
                    "different zero.</p>"),
            "formula_note": ("<p>The slope angle is the arctangent of rise over run. The mitre is its "
                             "complement, because a mitre saw's 0° is a square cut across the timber, not a "
                             "horizontal line.</p>"),
            "example_note": ("<p>A rise of 6 in over a run of 12 in is 26.6° of slope, a mitre of 63.4° from "
                             "square and a ratio of 6 in 12 — the same slope a 6/12 roof has.</p>"),
            "reading": ("<p>Read the mitre against the saw: most mitre saws stop at 45° either way, so "
                        "anything past that has to be cut from the other face or with the work turned. That "
                        "is a constraint on the setup, not on the angle.</p>"),
            "scenarios": [
                {"inputs": {"rise": 12, "run": 12},
                 "note": "A 45° slope — the one angle every saw is built around."},
                {"inputs": {"rise": 3, "run": 16},
                 "note": "A shallow ramp or a handrail: 10.6° of slope, a mitre of 79.4°."},
            ],
            "pitfalls": [
                "<strong>Rise and run swapped.</strong> The angle changes to its complement, which is a very "
                "different cut.",
                "<strong>Degrees read off the wrong scale.</strong> A mitre saw's bevel scale may read from "
                "vertical.",
                "<strong>Slope and mitre confused.</strong> They add to 90°, so one is never the other.",
            ],
            "units_note": ("<p>Rise and run in the same unit — inches or millimetres — the angles in degrees, "
                           "and the ratio as rise per 12 of run.</p>"),
            "limits": [
                "<strong>One straight cut.</strong> Compound cuts need both angles at once.",
                "<strong>No kerf allowance.</strong> The blade's width is the saw's business.",
            ],
            "uses": [
                "<li>Setting a mitre saw for a sloped rail.</li>",
                "<li>Converting a roof pitch to an angle.</li>",
                "<li>Cutting a ramp's end.</li>",
            ],
        },
        faq=[
            ("How do I convert a 6/12 pitch to degrees?",
             "Arctangent of 6/12 is 26.57°."),
            ("What is the difference between a mitre and a bevel?",
             "A mitre turns the work in the horizontal plane; a bevel tilts the blade. The two angles "
             "complement each other."),
        ],
        related=[("/construction/miter-angle", "Mitre angle"),
                 ("/construction/roof-pitch", "Roof pitch"),
                 ("/construction/ramp-slope", "Ramp slope")],
    ),

    S(
        slug="arch",
        name="Arch",
        title="Arch Calculator: Radius, Arc Length and Area",
        desc="Work out the radius of a segmental arch from its span and rise, with the arc length, the angle it subtends and the area it encloses. for the setting-out string.",
        what=("<p>A segmental arch is a chord and a rise on one circle: <strong>R = (span² ÷ 4 + rise²) ÷ "
              "(2 × rise)</strong>, and the arc follows from the angle that circle subtends.</p>"),
        fields=[
            F("span", "Span", "ft", 10, "The clear opening, chord to chord"),
            F("rise", "Rise", "ft", 2.5, "Height of the arch above the springing line"),
        ],
        results=[
            R("radius", "Radius", "ft"),
            R("angle", "Angle subtended", "°"),
            R("arc_length", "Arc length", "ft"),
            R("area", "Area under the arch", "ft²"),
        ],
        formula={
            "radius": "(pow(span,2)/4+pow(rise,2))/(2*rise)",
            "angle": "2*asin((span/2)/((pow(span,2)/4+pow(rise,2))/(2*rise)))*180/pi",
            "arc_length": "(pow(span,2)/4+pow(rise,2))/(2*rise)*2*asin((span/2)/((pow(span,2)/4+pow(rise,2))/(2*rise)))",
            "area": "pow((pow(span,2)/4+pow(rise,2))/(2*rise),2)/2*(2*asin((span/2)/((pow(span,2)/4+pow(rise,2))/(2*rise)))-sin(2*asin((span/2)/((pow(span,2)/4+pow(rise,2))/(2*rise)))))",
            "span": "2*sqrt(2*radius*rise-pow(rise,2))",
            "rise": "radius-sqrt(pow(radius,2)-pow(span,2)/4)",
        },
        prose={
            "why": ("<p>An arch is drawn by its span and its rise, but it is built from a radius — the "
                    "setting-out string, the plywood template and the brick bond all need that radius. The "
                    "arc length is what the arch soffit is measured along, and the area is what the infill "
                    "concrete or the glass has to match.</p>"),
            "formula_note": ("<p>The radius comes from the intersecting chord theorem: half the span squared "
                             "over the rise, plus half the rise. The arc length is the radius times the angle "
                             "in radians, and the segment area is a sector minus the triangle inside "
                             "it.</p>"),
            "example_note": ("<p>A 10 ft span with a 2.5 ft rise needs a radius of 6.25 ft, subtends 106.3° "
                             "and runs 11.6 ft along the arc. The segment enclosed is 17.47 ft² — the area a "
                             "window or a lintel infill has to fill.</p>"),
            "reading": ("<p>Read the angle against the rise: a shallow segment subtends a small angle, and a "
                        "semicircular arch subtends exactly 180° when the rise is half the span. Past "
                        "that, the arch is horseshoe-shaped and the formula still works.</p>"),
            "scenarios": [
                {"inputs": {"span": 6, "rise": 3},
                 "note": "A semicircular arch: rise is half the span, so the radius equals half the span and "
                         "the angle is 180°."},
                {"inputs": {"span": 12, "rise": 1.5},
                 "note": "A shallow segmental arch over a wide opening — a long radius and a small angle."},
            ],
            "pitfalls": [
                "<strong>Rise measured to the top of the arch.</strong> It is measured from the springing "
                "line, the level where the curve starts.",
                "<strong>Radius assumed to be half the span.</strong> That is only true of a semicircle.",
                "<strong>Arc length used as the opening.</strong> The opening is the chord.",
            ],
            "units_note": ("<p>Span and rise in feet, the radius and arc length in feet, the angle in degrees "
                           "and the area in square feet.</p>"),
            "limits": [
                "<strong>A circular segment.</strong> Elliptical and pointed arches are set out "
                "differently.",
                "<strong>Geometry only.</strong> Thrust and abutment are the engineer's problem.",
            ],
            "uses": [
                "<li>Setting out an arch template.</li>",
                "<li>Measuring a soffit along the curve.</li>",
                "<li>Sizing glass or infill for a segmental opening.</li>",
            ],
        },
        faq=[
            ("How do you find the radius of an arch?",
             "R = (span²/4 + rise²) / (2 × rise). A semicircular arch gives R = span/2."),
            ("What is the area under an arch?",
             "A circular segment: R²/2 × (θ − sin θ) with θ in radians."),
        ],
        no_round_trip=["span", "rise"],
        related=[("/construction/arch", "Arch"),
                 ("/construction/rafter-length", "Rafter length"),
                 ("/construction/roof-pitch", "Roof pitch")],
    ),

    S(
        slug="shiplap",
        name="Shiplap",
        title="Shiplap Calculator: Boards, Coverage and Waste",
        desc="Work out how many shiplap boards a wall needs once the rebate overlap is taken off the coverage, with the linear feet and the waste to buy. before you order.",
        what=("<p>Shiplap overlaps by a rebate, so each board shows less than its width. "
              "<strong>Boards = area ÷ (exposed width × length)</strong>, with the lap subtracted first.</p>"),
        fields=[
            F("area", "Wall area", "ft²", 200, "The face to be clad"),
            F("board_width", "Board width", "in", 6, "Full width, edge to edge"),
            F("overlap", "Overlap", "in", 1, "The rebate that is hidden"),
            F("board_length", "Board length", "ft", 8, "The length you are buying"),
            F("waste", "Wastage", "%", 10, "Ends, openings and broken boards"),
        ],
        results=[
            R("exposed_width", "Exposed width", "in"),
            R("boards", "Boards", ""),
            R("linear_feet", "Linear feet", "ft"),
            R("coverage_per_board", "Coverage per board", "ft²"),
        ],
        formula={
            "exposed_width": "board_width-overlap",
            "boards": "ceil(area*144/((board_width-overlap)*board_length*12)*(1+waste/100))",
            "linear_feet": "ceil(area*144/((board_width-overlap)*board_length*12)*(1+waste/100))*board_length",
            "coverage_per_board": "(board_width-overlap)*board_length/12",
            "area": "boards/(1+waste/100)*(board_width-overlap)*board_length/12",
            "board_length": "linear_feet/boards",
            "waste": "(boards/(area*144/((board_width-overlap)*board_length*12))-1)*100",
        },
        prose={
            "why": ("<p>Shiplap is the one cladding where the width you buy is not the width that covers: "
                    "the rebate hides an inch, so a 6 in board lays up as 5 in. Order by the full width and "
                    "the wall comes up short by a sixth of its boards.</p>"),
            "formula_note": ("<p>The exposed width is the board width minus the overlap, and that is what the "
                             "area is divided by. Horizontal shiplap wastes more than vertical because every "
                             "course ends in a cut at the corner.</p>"),
            "example_note": ("<p>200 ft² of wall in 6 in boards overlapping an inch: each 8 ft board covers "
                             "3.33 ft², so 60 boards cover the wall before waste and 66 with ten per cent. "
                             "That is 528 linear feet.</p>"),
            "reading": ("<p>Read the coverage per board against the board: 3.33 ft² of wall for every 4 ft² "
                        "of board is the rebate showing up as a fifteen per cent loss. Halving the overlap "
                        "won't help — the rebate is cut to a fixed depth.</p>"),
            "scenarios": [
                {"inputs": {"area": 450, "board_width": 8, "overlap": 1, "board_length": 12, "waste": 12},
                 "note": "A gable end in wide boards: longer stock covers more, so the count comes down "
                         "faster than the area grows."},
                {"inputs": {"area": 120, "board_width": 5.5, "overlap": 0.75, "board_length": 8,
                            "waste": 15},
                 "note": "A small bathroom wall with a lot of cuts: the waste allowance carries the "
                         "fiddly work."},
            ],
            "pitfalls": [
                "<strong>Full width used as coverage.</strong> The overlap is always hidden.",
                "<strong>Overlap guessed.</strong> Measure the rebate — a half-inch board and an inch board "
                "differ.",
                "<strong>Openings not deducted.</strong> Windows and doors take boards out of the count.",
            ],
            "units_note": ("<p>Wall area in square feet, board width and overlap in inches, board length in "
                           "feet; the count is whole boards and the linear footage in feet.</p>"),
            "limits": [
                "<strong>Flat wall.</strong> Corners and rakes add cuts the percentage only partly "
                "covers.",
                "<strong>One board size.</strong> A mixed layout needs a line per size.",
            ],
            "uses": [
                "<li>Ordering shiplap for a wall.</li>",
                "<li>Comparing board widths by coverage.</li>",
                "<li>Budgeting a feature wall.</li>",
            ],
        },
        faq=[
            ("How much does a 6 in shiplap board cover?",
             "Five inches with a one-inch overlap; the rebate is hidden behind the next board."),
            ("Should I add waste for shiplap?",
             "Yes — ten per cent for a plain wall, fifteen or more where there are openings and corners."),
        ],
        no_round_trip=["area", "waste"],
        related=[("/construction/board-and-batten", "Board and batten"),
                 ("/construction/siding", "Siding"),
                 ("/construction/wainscoting", "Wainscoting")],
    ),

    S(
        slug="board-and-batten",
        name="Board and batten",
        title="Board and Batten Calculator: Boards and Battens",
        desc="Work out the boards, the battens and the linear feet for a board-and-batten wall from the area, board width and batten spacing. with both orders counted.",
        what=("<p>Board and batten is a layer of boards with a narrow strip over every joint: "
              "<strong>boards = area ÷ board coverage</strong> and <strong>battens = area ÷ spacing</strong>, "
              "each with its own waste.</p>"),
        fields=[
            F("area", "Wall area", "ft²", 200, "The face to be clad"),
            F("board_width", "Board width", "in", 6, "Board edge to edge, no overlap"),
            F("batten_width", "Batten width", "in", 2, "The strip over each joint"),
            F("batten_spacing", "Batten spacing", "in", 16, "Centre to centre across the wall"),
            F("board_length", "Board length", "ft", 8, "Stock length you are buying"),
            F("waste", "Wastage", "%", 10, "Cuts and culls"),
        ],
        results=[
            R("boards", "Boards", ""),
            R("battens", "Battens", ""),
            R("total_linear", "Total linear feet", "ft"),
            R("coverage_per_board", "Board coverage", "ft²"),
        ],
        formula={
            "boards": "ceil(area*144/(board_width*board_length*12)*(1+waste/100))",
            "battens": "ceil(area*144/(batten_spacing*board_length*12)*(1+waste/100))",
            "total_linear": "(ceil(area*144/(board_width*board_length*12)*(1+waste/100))+ceil(area*144/(batten_spacing*board_length*12)*(1+waste/100)))*board_length",
            "coverage_per_board": "board_width*board_length/12",
            "area": "boards/(1+waste/100)*board_width*board_length/12",
            "board_length": "total_linear/(boards+battens)",
            "waste": "(boards/(area*144/(board_width*board_length*12))-1)*100",
        },
        prose={
            "why": ("<p>Board and batten is two orders rolled into one: the boards cover the wall and the "
                    "battens cover the joints. Count only the boards and the wall comes up an eighth short, "
                    "because the battens are a separate purchase at a different width.</p>"),
            "formula_note": ("<p>Boards are counted on their full width, because they butt rather than "
                             "overlap; battens are counted at the spacing, one strip per joint. In practice "
                             "the board count is set by the batten spacing, so the two totals are linked.</p>"),
            "example_note": ("<p>200 ft² of wall in 6 in boards: 50 boards cover it, 55 with waste. Battens "
                             "at 16 in centre cover the same area at 19 before waste and 21 after, so the "
                             "order is 76 pieces — 608 linear feet in 8 ft stock.</p>"),
            "reading": ("<p>Read the two counts against each other: the battens come to roughly one per "
                        "buttoned joint, so a ratio near one batten for every two and a half boards is "
                        "right. Far fewer means the spacing is wider than the board width, which shows a "
                        "gap between battens.</p>"),
            "scenarios": [
                {"inputs": {"area": 400, "board_width": 8, "batten_width": 2, "batten_spacing": 16,
                            "board_length": 12, "waste": 12},
                 "note": "A barn wall in wide boards: bigger pieces cover more, so the count grows slower "
                         "than the area."},
                {"inputs": {"area": 80, "board_width": 5.5, "batten_width": 1.5, "batten_spacing": 12,
                            "board_length": 8, "waste": 15},
                 "note": "A small gable in tight spacing: the battens take a much bigger share of the "
                         "order."},
            ],
            "pitfalls": [
                "<strong>Battens left out of the order.</strong> They are a separate width and a separate "
                "count.",
                "<strong>Batten spacing read as the gap.</strong> It is centre to centre.",
                "<strong>Boards overlapping.</strong> Board and batten boards butt; shiplap overlaps, and "
                "the two are counted differently.",
            ],
            "units_note": ("<p>Area in square feet, widths and spacing in inches, board length in feet, the "
                           "counts in whole pieces and the total in linear feet.</p>"),
            "limits": [
                "<strong>Vertical boarding.</strong> Horizontal board and batten adds a course per board "
                "width.",
                "<strong>Openings ignored.</strong> Deduct windows and doors from the area.",
            ],
            "uses": [
                "<li>Ordering a board-and-batten wall.</li>",
                "<li>Comparing batten spacings by material.</li>",
                "<li>Budgeting a gable end.</li>",
            ],
        },
        faq=[
            ("How many battens do I need?",
             "One per joint — the batten spacing sets it, so a 16 in spacing gives roughly one batten for "
             "every 16 in of wall width."),
            ("Do the boards overlap in board and batten?",
             "No. They butt and the batten covers the joint, which is why the board width is used in "
             "full."),
        ],
        no_round_trip=["area", "waste"],
        related=[("/construction/shiplap", "Shiplap"),
                 ("/construction/siding", "Siding"),
                 ("/construction/wainscoting", "Wainscoting")],
    ),

    S(
        slug="decking",
        name="Decking",
        title="Decking Calculator: Boards, Gaps and Linear Feet",
        desc="Work out how many deck boards a deck needs with the gap counted in the coverage, plus the linear feet, the cost and the fixings to order. before you buy.",
        what=("<p>Deck boards cover their own width plus one gap: <strong>boards = area ÷ ((width + gap) × "
              "length)</strong>, times the waste, and the linear feet follow from the count.</p>"),
        fields=[
            F("area", "Deck area", "ft²", 200, "The surface to be boarded"),
            F("board_width", "Board width", "in", 5.5, "A 1 × 6 deck board is 5½ actual"),
            F("gap", "Gap between boards", "in", 0.25, "¼ in is usual, ⅛ for hardwood"),
            F("board_length", "Board length", "ft", 12, "Stock length you are buying"),
            F("waste", "Wastage", "%", 10, "End cuts and culls"),
            F("price", "Price", "$/board", 14, "Per board, delivered"),
        ],
        results=[
            R("boards", "Boards", ""),
            R("linear_feet", "Linear feet", "ft"),
            R("coverage_per_board", "Coverage per board", "ft²"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "boards": "ceil(area*144/((board_width+gap)*board_length*12)*(1+waste/100))",
            "linear_feet": "ceil(area*144/((board_width+gap)*board_length*12)*(1+waste/100))*board_length",
            "coverage_per_board": "(board_width+gap)*board_length/12",
            "cost": "ceil(area*144/((board_width+gap)*board_length*12)*(1+waste/100))*price",
            "area": "boards/(1+waste/100)*(board_width+gap)*board_length/12",
            "board_length": "linear_feet/boards",
            "waste": "(boards/(area*144/((board_width+gap)*board_length*12))-1)*100",
        },
        prose={
            "why": ("<p>A deck is the classic weekend order that comes up two boards short. The reason is the "
                    "gap: a 5½ in board laid with a ¼ in gap covers 5¾ in, not 6, and on a 200 ft² deck that "
                    "is a difference of a whole board and a bit.</p>"),
            "formula_note": ("<p>Boards and gaps together make the module — 5.75 in here. Dividing the area "
                             "by the module times the board length gives the count, and the waste allowance "
                             "covers the cut at the far end of every row.</p>"),
            "example_note": ("<p>A 200 ft² deck in 5½ in boards with ¼ in gaps: each 12 ft board covers 5.75 "
                             "ft², so the deck takes 35 boards and 39 with ten per cent. That is 468 linear "
                             "feet, and at $14 a board $546.</p>"),
            "reading": ("<p>Read the coverage against the board width: the gap adds about four per cent on a "
                        "5½ in board and nine per cent on a 3½ in one — which is why narrow boards cost more "
                        "than their width suggests.</p>"),
            "scenarios": [
                {"inputs": {"area": 320, "board_width": 5.5, "gap": 0.125, "board_length": 16, "waste": 8,
                            "price": 22},
                 "note": "A hardwood deck with a tight ⅛ in gap and long boards: fewer joints, fewer "
                         "wasteful ends."},
                {"inputs": {"area": 100, "board_width": 3.5, "gap": 0.25, "board_length": 8, "waste": 15,
                            "price": 7},
                 "note": "A small porch in narrow boards, where the gaps take a bigger share and the "
                         "waste runs higher."},
            ],
            "pitfalls": [
                "<strong>Board width used without the gap.</strong> The gap is part of the coverage.",
                "<strong>Nominal width used.</strong> A 1 × 6 is 5½ in, and the difference is a board in "
                "twenty.",
                "<strong>Picture-frame borders ignored.</strong> A border changes the board direction and "
                "adds cuts.",
            ],
            "units_note": ("<p>Deck area in square feet, board width and gap in inches, board length in feet, "
                           "the count in whole boards and the cost in dollars at the board price.</p>"),
            "limits": [
                "<strong>A rectangular deck.</strong> Angles and diagonal layouts waste more.",
                "<strong>Fixings not counted.</strong> Screws run at about two per joist crossing per "
                "board.",
            ],
            "uses": [
                "<li>Ordering deck boards.</li>",
                "<li>Comparing board widths by cost.</li>",
                "<li>Budgeting a deck rebuild.</li>",
            ],
        },
        faq=[
            ("How many deck boards do I need for 200 square feet?",
             "About 35 in 12 ft lengths of 5½ in board with a ¼ in gap, and 39 with ten per cent waste."),
            ("What gap should be left between deck boards?",
             "A quarter inch for softwood, an eighth for hardwood that moves less."),
        ],
        no_round_trip=["area", "waste"],
        related=[("/construction/plywood", "Plywood"),
                 ("/construction/deck-stain", "Deck stain"),
                 ("/construction/shiplap", "Shiplap")],
    ),
]
