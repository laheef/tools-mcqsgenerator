"""Batch 2b — roofs, rafters and headers."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="roof-truss",
        name="Roof truss",
        title="Roof Truss Calculator: Count, Rafters and Gable",
        desc="Work out how many trusses a roof needs from its length and spacing, with each rafter's length, the peak height and the gable area it closes. before the crane.",
        what=("<p>Trusses are placed on centres: <strong>count = roof length in inches ÷ spacing + 1</strong>. "
              "The rafter length comes from the half span and the pitch, with the overhang added along the "
              "slope.</p>"),
        fields=[
            F("roof_length", "Roof length", "ft", 30, "Along the ridge"),
            F("span", "Building span", "ft", 24, "Eave to eave across"),
            F("spacing", "Truss spacing", "in", 24, "24 in centres is common in trusses"),
            F("pitch", "Pitch", "x/12", 6, "Rise per foot of run"),
            F("overhang", "Overhang", "in", 12, "Beyond the wall line, each side"),
        ],
        results=[
            R("trusses", "Trusses", ""),
            R("rafter_length", "Rafter length", "ft"),
            R("peak_height", "Peak above wall", "ft"),
            R("gable_area", "Gable area", "ft²"),
        ],
        formula={
            "trusses": "ceil(roof_length*12/spacing+1)",
            "rafter_length": "sqrt(pow(span/2+overhang/12,2)+pow((span/2+overhang/12)*pitch/12,2))",
            "peak_height": "span/2*pitch/12",
            "gable_area": "span*(span/2*pitch/12)/2",
            "roof_length": "(trusses-1)*spacing/12",
            "span": "2*peak_height*12/pitch",
            "pitch": "peak_height*12/(span/2)",
            "overhang": "sqrt(pow(rafter_length,2)/(1+pow(pitch/12,2)))*12-span/2*12",
        },
        prose={
            "why": ("<p>Manufactured trusses arrive on a truck in one delivery, so the count has to be right "
                    "before the crane is booked. The same page gives the gable area, which is the sheathing "
                    "and the siding that closes the two ends.</p>"),
            "formula_note": ("<p>The rafter length is Pythagoras on the horizontal run — half the span plus "
                             "the overhang — and the rise that run produces at the stated pitch. The gable "
                             "is a triangle of base equal to the span and height equal to the peak.</p>"),
            "example_note": ("<p>A 30 ft roof on 24 in centres takes 16 trusses. At a 6/12 pitch over a "
                             "24 ft span the peak is 6 ft above the wall, each rafter runs about 14.5 ft with the overhang, and each gable closes 72 ft².</p>"),
            "reading": ("<p>Read the truss count against the roof length: one per two feet at 24 in centres. "
                        "A count per foot means the spacing box is in the wrong unit, which on a truss order "
                        "is an expensive mistake to discover on the day.</p>"),
            "scenarios": [
                {"inputs": {"roof_length": 40, "span": 30, "spacing": 24, "pitch": 8, "overhang": 18},
                 "note": "A larger roof at a steeper pitch: the rafters lengthen faster than the span grows."},
                {"inputs": {"roof_length": 20, "span": 20, "spacing": 16, "pitch": 4, "overhang": 12},
                 "note": "A shallow pitch on the tighter spacing, which is what a heavy tile roof asks for."},
            ],
            "pitfalls": [
                "<strong>Spacing read as a gap.</strong> 24 in centres is 24 in joist to joist.",
                "<strong>Overhang left out of the rafter.</strong> It adds length along the slope, not "
                "horizontally.",
                "<strong>Peak measured to the ridge board.</strong> The number here is the rise above the "
                "wall, before any ridge depth.",
            ],
            "units_note": ("<p>Roof length, span, pitch as rise per 12, overhang in inches; the count is whole "
                           "trusses, lengths in feet and the gable area in square feet.</p>"),
            "limits": [
                "<strong>A simple gable.</strong> Hips, valleys and dormers change both the count and the "
                "sheathing.",
                "<strong>No structural sizing.</strong> The truss engineer does that.",
            ],
            "uses": [
                "<li>Ordering trusses for a gable roof.</li>",
                "<li>Sizing gable sheathing.</li>",
                "<li>Checking a truss layout drawing.</li>",
            ],
        },
        faq=[
            ("How many trusses for a 30 ft roof?",
             "Sixteen at 24 in centres: fifteen spaces plus the truss at the far end."),
            ("How do you find the peak height from the pitch?",
             "Multiply half the span by the pitch and divide by twelve."),
        ],
        no_round_trip=["spacing"],
        related=[("/construction/roof-pitch", "Roof pitch"),
                 ("/construction/rafter-length", "Rafter length"),
                 ("/construction/roof-shingle", "Roof shingle")],
    ),

    S(
        slug="rafter-length",
        name="Rafter length",
        title="Rafter Length Calculator: Run, Rise and Overhang",
        desc="Work out a common rafter's length from its run, rise and overhang, with the pitch, the roof angle and the slope multiplier beside it. with the overhang added.",
        what=("<p>A rafter is the hypotenuse of its run and rise: <strong>rafter = √(run² + rise²)</strong>, "
              "plus the overhang measured along the same slope.</p>"),
        fields=[
            F("run", "Run", "ft", 12, "Half the span, wall to ridge line"),
            F("rise", "Rise", "ft", 6, "Wall top to ridge"),
            F("overhang", "Overhang", "in", 18, "Beyond the wall, along the slope"),
        ],
        results=[
            R("rafter", "Rafter length", "ft"),
            R("pitch", "Pitch", "x/12"),
            R("angle", "Roof angle", "°"),
            R("multiplier", "Slope multiplier", ""),
        ],
        formula={
            "rafter": "sqrt(pow(run,2)+pow(rise,2))+overhang/12*sqrt(1+pow(rise/run,2))",
            "pitch": "rise/run*12",
            "angle": "atan(rise/run)*180/pi",
            "multiplier": "sqrt(pow(run,2)+pow(rise,2))/run",
            "overhang": "(rafter-sqrt(pow(run,2)+pow(rise,2)))*12/sqrt(1+pow(rise/run,2))",
        },
        prose={
            "why": ("<p>The rafter is the one length on a roof that is easy to get wrong and expensive to "
                    "get wrong: too short and the fascia line is wrong, too long and the eaves are ragged. "
                    "It is a right triangle with the overhang stuck on the end of the hypotenuse.</p>"),
            "formula_note": ("<p>The pitch as x/12 is the rise divided by the run, times twelve. The angle is "
                             "the arctangent of the same ratio, and the slope multiplier is how much longer "
                             "the rafter is than its horizontal run — the number that turns a plan area into "
                             "a roof area.</p>"),
            "example_note": ("<p>A 12 ft run rising 6 ft is a 6/12 pitch at 26.6°, and the rafter is 13.42 ft "
                             "before the overhang. Eighteen inches of overhang adds 1.68 ft along the slope, "
                             "so the cut length is 15.1 ft.</p>"),
            "reading": ("<p>Read the multiplier against the pitch: 1.00 is a flat roof, 1.12 at 6/12, 1.41 "
                        "at 12/12. It is also the factor that converts a footprint area to a roof area, so "
                        "the two boxes agree.</p>"),
            "scenarios": [
                {"inputs": {"run": 16, "rise": 16, "overhang": 12},
                 "note": "A 12/12 roof — as steep as a walkable shingle roof gets, and a rafter 1.41 times "
                         "its run."},
                {"inputs": {"run": 10, "rise": 2.5, "overhang": 24},
                 "note": "A shallow porch roof, where the overhang is a larger share of the rafter than the "
                         "rise is."},
            ],
            "pitfalls": [
                "<strong>Run entered as the full span.</strong> The run is half the span, wall to ridge.",
                "<strong>Overhang measured horizontally.</strong> It is measured along the rafter, which is "
                "longer.",
                "<strong>Birdsmouth ignored.</strong> The seat cut removes a little length at the wall "
                "end.",
            ],
            "units_note": ("<p>Run, rise and rafter in feet, the overhang in inches and the angle in degrees; "
                           "the pitch is quoted as rise per 12 in the way carpenters say it.</p>"),
            "limits": [
                "<strong>Common rafters.</strong> Hip and valley rafters have their own geometry.",
                "<strong>No ridge deduction.</strong> Subtract half the ridge thickness for the finished "
                "length.",
            ],
            "uses": [
                "<li>Cutting common rafters.</li>",
                "<li>Converting plan area to roof area.</li>",
                "<li>Checking a pitch against a rise.</li>",
            ],
        },
        faq=[
            ("How long is a rafter for a 12 ft run at 6/12?",
             "13.42 ft before the overhang, 15.1 ft with 18 in of eave."),
            ("What is the slope multiplier?",
             "The rafter length divided by its run — 1.118 at 6/12 — used to turn plan area into roof "
             "area."),
        ],
        no_round_trip=["run", "rise"],
        related=[("/construction/roof-pitch", "Roof pitch"),
                 ("/construction/roof-truss", "Roof truss"),
                 ("/construction/birdsmouth-cut", "Birdsmouth cut")],
    ),

    S(
        slug="birdsmouth-cut",
        name="Birdsmouth cut",
        title="Birdsmouth Cut Calculator: Notch Depth and Seat",
        desc="Work out the birdsmouth a rafter needs at the wall plate from the pitch and the seat cut, and check the notch against the quarter-depth rule. in one cut.",
        what=("<p>The birdsmouth is a seat cut along the plate and a plumb cut up the rafter. At a roof angle θ, "
              "<strong>notch depth = seat cut × tan θ</strong>, and the rule is to keep it inside a quarter "
              "of the rafter's depth.</p>"),
        fields=[
            F("pitch", "Roof pitch", "x/12", 6, "Rise per 12 of run"),
            F("seat_cut", "Seat cut length", "in", 3.5, "Along the plate — usually the plate width"),
            F("rafter_depth", "Rafter depth", "in", 9.25, "Actual depth of the rafter"),
        ],
        results=[
            R("roof_angle", "Roof angle", "°"),
            R("notch_depth", "Notch depth", "in"),
            R("notch_limit", "Quarter-depth limit", "in"),
            R("remaining_depth", "Rafter left below the notch", "in"),
        ],
        formula={
            "roof_angle": "atan(pitch/12)*180/pi",
            "notch_depth": "seat_cut*pitch/12",
            "notch_limit": "rafter_depth/4",
            "remaining_depth": "rafter_depth-seat_cut*pitch/12",
            "pitch": "notch_depth*12/seat_cut",
            "seat_cut": "notch_depth*12/pitch",
            "rafter_depth": "notch_limit*4",
        },
        prose={
            "why": ("<p>The birdsmouth is where a rafter meets the wall, and it is also where rafters get "
                    "weakened. Cut too deep and the remaining timber carries the whole roof on a thin "
                    "strip; cut too shallow and the rafter sits proud of the plate. The quarter-depth rule "
                    "is the trade's answer.</p>"),
            "formula_note": ("<p>The seat cut is horizontal and the plumb cut vertical, so the notch is a "
                             "right triangle with the roof's own angle at the top. The tangent of that angle "
                             "is the pitch over twelve, which is why the arithmetic is one multiplication.</p>"),
            "example_note": ("<p>A 6/12 roof at 26.6° with a 3½ in seat cut: tan 26.6° is 0.5, so the notch "
                             "is 1.75 in deep. On a 2 × 10 that leaves 7.5 in of timber — comfortably "
                             "inside the 2.31 in quarter-depth limit.</p>"),
            "reading": ("<p>Read the notch against the limit: when the notch depth passes a quarter of the "
                        "rafter, the answer is a deeper rafter or a shorter seat cut, not a smaller "
                        "birdsmouth. Steep roofs reach the limit at a much shorter seat than shallow "
                        "ones.</p>"),
            "scenarios": [
                {"inputs": {"pitch": 12, "seat_cut": 3.5, "rafter_depth": 7.25},
                 "note": "A 12/12 roof: the notch takes half the seat cut in depth, which is why chunky "
                         "rafters are specified on steep pitches."},
                {"inputs": {"pitch": 3, "seat_cut": 5.5, "rafter_depth": 5.5},
                 "note": "A shallow roof over a 2 × 6 plate: a long seat and a shallow notch."},
            ],
            "pitfalls": [
                "<strong>Seat cut taken as the rafter width.</strong> It follows the plate, and a 2 × 6 "
                "plate wants a deeper seat than a 2 × 4.",
                "<strong>The plumb cut forgotten.</strong> The birdsmouth is two cuts; the depth here is "
                "the vertical one.",
                "<strong>Notch measured from the wrong face.</strong> Depth comes off the top edge, which "
                "is the tension side on a simple span.",
            ],
            "units_note": ("<p>Pitch as rise per 12, seat and depth in inches, the angle in degrees — and "
                           "the limit is a quarter of the rafter's depth in the same inches.</p>"),
            "limits": [
                "<strong>Rule of thumb.</strong> Engineered rafters have their own notching limits.",
                "<strong>One cut.</strong> The tail end and any splice are separate cuts.",
            ],
            "uses": [
                "<li>Laying out a birdsmouth before cutting.</li>",
                "<li>Checking a steep pitch against the rafter depth.</li>",
                "<li>Teaching the quarter-depth rule.</li>",
            ],
        },
        faq=[
            ("How deep should a birdsmouth be?",
             "No more than a quarter of the rafter's depth — 2.31 in on a 2 × 10, 1.8 in on a 2 × 8."),
            ("What angle is a birdsmouth cut at?",
             "The seat is level and the plumb cut is vertical, so the notch angle is the roof's own "
             "pitch angle."),
        ],
        related=[("/construction/rafter-length", "Rafter length"),
                 ("/construction/roof-pitch", "Roof pitch"),
                 ("/construction/roof-truss", "Roof truss")],
    ),

    S(
        slug="roof-pitch",
        name="Roof pitch",
        title="Roof Pitch Calculator: Rise per Run and Angle",
        desc="Convert between rise and run, the x/12 pitch, the roof angle in degrees and the slope multiplier that turns a plan area into roof area for estimating.",
        what=("<p>Roof pitch is rise over run, quoted as rise per twelve: <strong>pitch = rise ÷ run × "
              "12</strong>, and the angle is <strong>atan(rise ÷ run)</strong>.</p>"),
        fields=[
            F("rise", "Rise", "ft", 6, "Vertical height of the roof"),
            F("run", "Run", "ft", 12, "Horizontal distance it rises over"),
        ],
        results=[
            R("pitch", "Pitch", "x/12"),
            R("angle", "Angle", "°"),
            R("multiplier", "Slope multiplier", ""),
            R("rafter", "Rafter length", "ft"),
        ],
        formula={
            "pitch": "rise/run*12",
            "angle": "atan(rise/run)*180/pi",
            "multiplier": "sqrt(pow(rise,2)+pow(run,2))/run",
            "rafter": "sqrt(pow(rise,2)+pow(run,2))",
            "rise": "run*pitch/12",
            "run": "rise*12/pitch",
        },
        prose={
            "why": ("<p>Pitch is the number a roof is described by, and three trades use three different "
                    "versions of it: the roofer says 6/12, the engineer says 26.6 degrees, and the "
                    "estimator uses the 1.118 multiplier to turn plan area into roofing. This page is the "
                    "conversion between all three.</p>"),
            "formula_note": ("<p>The tangent of the roof angle is the rise over the run, so the angle is the "
                             "arctangent of the same ratio that gives the pitch. The multiplier is the "
                             "rafter divided by the run — the hypotenuse of the unit right triangle.</p>"),
            "example_note": ("<p>A 6 ft rise over a 12 ft run is a 6/12 pitch, 26.57°, with a multiplier of "
                             "1.118 — so 1 200 ft² of plan becomes 1 342 ft² of roofing. The rafter itself "
                             "is 13.42 ft.</p>"),
            "reading": ("<p>Read the pitch against the roofing material: below 2/12 most shingles are out, "
                        "below 4/12 they need a double underlayment, and above 8/12 the roof is not safely "
                        "walkable. The multiplier tells you how much more material the steepness costs.</p>"),
            "scenarios": [
                {"inputs": {"rise": 4, "run": 12},
                 "note": "A 4/12 roof — the shallow end of normal shingle work, at 18.4°."},
                {"inputs": {"rise": 12, "run": 12},
                 "note": "A 12/12 roof at 45°, where the multiplier costs more than a third extra "
                         "material."},
            ],
            "pitfalls": [
                "<strong>Pitch quoted as a percentage.</strong> A 50 per cent slope is 6/12, not 50/12.",
                "<strong>Run taken as the full span.</strong> The run is half the building width on a "
                "gable.",
                "<strong>Angle and pitch confused in a table.</strong> 6/12 is not 6 degrees.",
            ],
            "units_note": ("<p>Rise and run in feet, the pitch as inches of rise per 12 in of run, the "
                           "angle in degrees and the multiplier as a plain factor.</p>"),
            "limits": [
                "<strong>A straight slope.</strong> A curved or gambrel roof has a pitch per section.",
                "<strong>Geometry only.</strong> Minimum pitch for a material is its own rule.",
            ],
            "uses": [
                "<li>Converting a pitch to an angle.</li>",
                "<li>Working out roof area from plan area.</li>",
                "<li>Checking a pitch against a material's minimum.</li>",
            ],
        },
        faq=[
            ("What angle is a 6/12 pitch?",
             "26.57 degrees — the arctangent of 0.5."),
            ("How do I convert plan area to roof area?",
             "Multiply by the slope multiplier: 1.118 at 6/12, 1.25 at 9/12, 1.414 at 12/12."),
        ],
        related=[("/construction/rafter-length", "Rafter length"),
                 ("/construction/roof-shingle", "Roof shingle"),
                 ("/construction/roof-truss", "Roof truss")],
    ),

    S(
        slug="roof-shingle",
        name="Roof shingle",
        title="Roof Shingle Calculator: Squares and Bundles",
        desc="Work out the shingles a gable roof needs in squares, bundles and nails, and what they cost, from the footprint, the pitch and the waste. to the bundle.",
        what=("<p>Shingles are sold by the bundle, three to a square, and a square covers 100 ft² of roof. "
              "<strong>Roof area = footprint × slope multiplier</strong>, then squares, then bundles.</p>"),
        fields=[
            F("length", "Building length", "ft", 30, "Along the ridge"),
            F("width", "Building width", "ft", 24, "Eave to eave"),
            F("pitch", "Pitch", "x/12", 6, "Rise per foot of run"),
            F("waste", "Wastage", "%", 10, "Hips, valleys and starter course"),
            F("price", "Price", "$/bundle", 38, "Per bundle, delivered"),
        ],
        results=[
            R("roof_area", "Roof area", "ft²"),
            R("squares", "Squares", ""),
            R("bundles", "Bundles", ""),
            R("nails_lb", "Roofing nails", "lb"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "roof_area": "length*width*sqrt(1+pow(pitch/12,2))",
            "squares": "length*width*sqrt(1+pow(pitch/12,2))/100",
            "bundles": "ceil(length*width*sqrt(1+pow(pitch/12,2))*(1+waste/100)/100*3)",
            "nails_lb": "length*width*sqrt(1+pow(pitch/12,2))/100*1.5",
            "cost": "ceil(length*width*sqrt(1+pow(pitch/12,2))*(1+waste/100)/100*3)*price",
            "length": "roof_area/(width*sqrt(1+pow(pitch/12,2)))",
            "width": "roof_area/(length*sqrt(1+pow(pitch/12,2)))",
            "pitch": "12*sqrt(pow(roof_area/(length*width),2)-1)",
        },
        prose={
            "why": ("<p>Shingles are the material most often bought short, because the area quoted is the "
                    "floor plan and the roof is always bigger than the plan. The slope multiplier is the "
                    "correction, and it grows quickly: a 12/12 roof is forty per cent more material than "
                    "its footprint.</p>"),
            "formula_note": ("<p>The multiplier comes from the pitch: the square root of one plus the pitch "
                             "over twelve, squared. Bundles are three to the square, so the bundle count is "
                             "the area over a hundred, times three, times the waste allowance, rounded "
                             "up.</p>"),
            "example_note": ("<p>A 30 × 24 ft building at 6/12: 720 ft² of plan becomes 805 ft² of roof, "
                             "eight squares, and 27 bundles with ten per cent over. The nails come to about "
                             "12 lb, and at $38 a bundle the order is just over a thousand dollars.</p>"),
            "reading": ("<p>Read the bundle count against the area: three bundles a square, so eight squares "
                        "is 24 bundles and the waste takes it to 27. A figure near four bundles a square "
                        "means the waste box has been set too high.</p>"),
            "scenarios": [
                {"inputs": {"length": 40, "width": 28, "pitch": 8, "waste": 15, "price": 42},
                 "note": "A steeper roof on a bigger footprint: both terms in the area grow."},
                {"inputs": {"length": 20, "width": 16, "pitch": 4, "waste": 10, "price": 35},
                 "note": "A garage roof, shallow and small, where a bundle or two of waste is cheap "
                         "insurance."},
            ],
            "pitfalls": [
                "<strong>Plan area used as roof area.</strong> The multiplier is the whole point of the "
                "page.",
                "<strong>Waste left at zero.</strong> Starter course, ridge caps and valleys all come out "
                "of the same bundles.",
                "<strong>Bundles rounded down.</strong> Part bundles are bought whole.",
            ],
            "units_note": ("<p>Building dimensions in feet, pitch as rise per 12, area in square feet, "
                           "squares at 100 ft², bundles at three to the square and nails in pounds.</p>"),
            "limits": [
                "<strong>A simple gable.</strong> Hips and dormers add cut waste the percentage only partly "
                "covers.",
                "<strong>No underlayment or flashing.</strong> Both are separate lines.",
            ],
            "uses": [
                "<li>Ordering shingles for a new roof.</li>",
                "<li>Checking a roofer's square count.</li>",
                "<li>Budgeting a re-roof.</li>",
            ],
        },
        faq=[
            ("How many bundles are in a square?",
             "Three for standard three-tab and most architectural shingles."),
            ("Does pitch change the shingle count?",
             "Yes — a steeper roof has more surface for the same footprint, and the multiplier rises with "
             "the pitch."),
        ],
        no_round_trip=["length", "width", "waste"],
        related=[("/construction/roofing", "Roofing"),
                 ("/construction/roof-pitch", "Roof pitch"),
                 ("/construction/roof-truss", "Roof truss")],
    ),

    S(
        slug="roofing",
        name="Roofing",
        title="Roofing Calculator: Squares, Bundles and Rolls",
        desc="Turn a measured roof area into squares, bundles, underlayment rolls and a bill, with a waste figure that covers hips, valleys and the starter course. In full.",
        what=("<p>Roofing is counted in squares of 100 ft². <strong>Squares = area ÷ 100</strong>, bundles are "
              "three to the square, and underlayment comes in 400 ft² rolls.</p>"),
        fields=[
            F("area", "Roof area", "ft²", 1200, "Measured on the slope, not the plan"),
            F("waste", "Wastage", "%", 10, "Ten per cent for cuts and valleys"),
            F("bundles_per_square", "Bundles per square", "", 3, "3 for three-tab and architectural"),
            F("roll_coverage", "Underlayment per roll", "ft²", 400, "400 for a standard 36 in roll"),
            F("price", "Price", "$/bundle", 38, "Bundle price, delivered"),
        ],
        results=[
            R("area_with_waste", "Area with waste", "ft²"),
            R("squares", "Squares", ""),
            R("bundles", "Bundles", ""),
            R("rolls", "Underlayment rolls", ""),
            R("cost", "Cost", "$"),
        ],
        formula={
            "area_with_waste": "area*(1+waste/100)",
            "squares": "area*(1+waste/100)/100",
            "bundles": "ceil(area*(1+waste/100)/100*bundles_per_square)",
            "rolls": "ceil(area*(1+waste/100)/roll_coverage)",
            "cost": "ceil(area*(1+waste/100)/100*bundles_per_square)*price",
            "area": "squares*100*100/(100+waste)",
            "waste": "(area_with_waste/area-1)*100",
            "price": "cost/bundles",
        },
        prose={
            "why": ("<p>Every roofing quote is in squares, and every material is in bundles or rolls, so the "
                    "square is the pivot between what is measured and what is bought. Once the area is right, "
                    "the rest is multiplication — but the area has to be the sloped area, not the floor "
                    "under it.</p>"),
            "formula_note": ("<p>Waste is applied to the area first, then the material counts are rounded up "
                             "from it. Underlayment laps, so its coverage per roll is already net of the "
                             "standard horizontal lap; a steeper roof needs more of it for the same plan "
                             "area.</p>"),
            "example_note": ("<p>1 200 ft² of roof with ten per cent over is 1 320 ft², or 13.2 squares. "
                             "That is 40 bundles at three a square, and four rolls of underlayment at 400 "
                             "ft² each — a little under $1 520 in shingles.</p>"),
            "reading": ("<p>Read the squares against the area: one square per hundred, and a bundle count of "
                        "exactly three times that unless the waste pushes it over. Four rolls for 1 200 ft² "
                        "is the standard three-square-to-a-roll pace.</p>"),
            "scenarios": [
                {"inputs": {"area": 2400, "waste": 12, "bundles_per_square": 3, "roll_coverage": 400,
                            "price": 36},
                 "note": "A large roof: the waste percentage is worth more in bundles than the price "
                         "difference between suppliers."},
                {"inputs": {"area": 600, "waste": 15, "bundles_per_square": 4, "roll_coverage": 200,
                            "price": 44},
                 "note": "A small hip roof in a heavier shingle sold four bundles to the square."},
            ],
            "pitfalls": [
                "<strong>Plan area used.</strong> Measure along the slope, or multiply the plan by the "
                "pitch multiplier.",
                "<strong>Waste skipped on a hip roof.</strong> Hips and valleys are where the cuts go.",
                "<strong>Bundles counted from the net area.</strong> The waste belongs in the count.",
            ],
            "units_note": ("<p>Area in square feet, squares at 100 ft², bundles as whole bundles, rolls as "
                           "whole rolls and cost in dollars at the price per bundle.</p>"),
            "limits": [
                "<strong>Shingle roofing.</strong> Tile, slate and metal are counted differently.",
                "<strong>No flashing, vents or ridge.</strong> Each is its own line.",
            ],
            "uses": [
                "<li>Converting a measured roof to an order.</li>",
                "<li>Checking a roofer's quote.</li>",
                "<li>Budgeting underlayment.</li>",
            ],
        },
        faq=[
            ("How many squares is a 1,200 square foot roof?",
             "Twelve, before waste; thirteen and a bit with ten per cent."),
            ("How much does a square of shingles weigh?",
             "About 230 to 250 lb for standard shingles — three bundles."),
        ],
        no_round_trip=["waste"],
        related=[("/construction/roof-shingle", "Roof shingle"),
                 ("/construction/roof-pitch", "Roof pitch"),
                 ("/construction/roof-truss", "Roof truss")],
    ),

    S(
        slug="gambrel-roof",
        name="Gambrel roof",
        title="Gambrel Roof Calculator: Slopes and Surface Area",
        desc="Work out the two slope lengths, the total rise and the surface area of a gambrel roof from the span, both pitches and the building length. in two sections.",
        what=("<p>A gambrel is two pitches stacked. With the break at a quarter of the span, "
              "<strong>rise = (span ÷ 4) × pitch ÷ 12</strong> per section, and each slope's area is its "
              "length times the building length.</p>"),
        fields=[
            F("span", "Building span", "ft", 24, "Eave to eave"),
            F("lower_pitch", "Lower pitch", "x/12", 4, "The steep-to-shallow lower slope"),
            F("upper_pitch", "Upper pitch", "x/12", 10, "The shallow-to-peak upper slope"),
            F("length", "Building length", "ft", 30, "Along the ridge"),
        ],
        results=[
            R("total_rise", "Total rise", "ft"),
            R("lower_area", "Lower slope area", "ft²"),
            R("upper_area", "Upper slope area", "ft²"),
            R("roof_area", "Total roof area", "ft²"),
        ],
        formula={
            "total_rise": "(span/4)*lower_pitch/12+(span/4)*upper_pitch/12",
            "lower_area": "2*length*sqrt(pow(span/4,2)+pow(span/4*lower_pitch/12,2))",
            "upper_area": "2*length*sqrt(pow(span/4,2)+pow(span/4*upper_pitch/12,2))",
            "roof_area": "2*length*sqrt(pow(span/4,2)+pow(span/4*lower_pitch/12,2))+2*length*sqrt(pow(span/4,2)+pow(span/4*upper_pitch/12,2))",
            "span": "4*(total_rise*12/(lower_pitch+upper_pitch))",
            "length": "roof_area/(2*sqrt(pow(span/4,2)+pow(span/4*lower_pitch/12,2))+2*sqrt(pow(span/4,2)+pow(span/4*upper_pitch/12,2)))",
        },
        prose={
            "why": ("<p>The gambrel is the barn roof: a steep lower slope that makes headroom in the attic "
                    "and a shallow upper slope that closes it cheaply. Both surfaces have to be measured "
                    "separately, and both count towards the shingles.</p>"),
            "formula_note": ("<p>The break is taken at a quarter of the span from each eave, which divides "
                             "the roof into two equal horizontal runs and two different rises. Each slope is "
                             "a right triangle whose hypotenuse is the surface width, times the building "
                             "length, times two for the two sides.</p>"),
            "example_note": ("<p>A 24 ft span with a 4/12 lower pitch and a 10/12 upper: each run is 6 ft, "
                             "the lower slope rises 2 ft and the upper 5 ft, so the roof peaks 7 ft above the "
                             "eaves. The surfaces come to 848 ft² — 379 on the lower slopes and 469 on the upper, because the steeper upper slope is also the longer one.</p>"),
            "reading": ("<p>Read the two areas against each other: the lower slope is longer but shallower, "
                        "and on these pitches the two come out close. A lower slope much larger than the "
                        "upper means a shallow lower pitch, which is the wrong way round for headroom.</p>"),
            "scenarios": [
                {"inputs": {"span": 30, "lower_pitch": 6, "upper_pitch": 12, "length": 40},
                 "note": "A bigger barn with a steeper lower slope — more attic room and more material."},
                {"inputs": {"span": 20, "lower_pitch": 3, "upper_pitch": 8, "length": 24},
                 "note": "A shallow gambrel on a shed, where the lower slope is doing the work."},
            ],
            "pitfalls": [
                "<strong>Break taken at the wrong place.</strong> A quarter of the span either side is the "
                "convention; move it and both areas change.",
                "<strong>One pitch used for both.</strong> A gambrel is two roofs, priced separately.",
                "<strong>Plan area used.</strong> Each slope multiplies by its own hypotenuse.",
            ],
            "units_note": ("<p>Span and length in feet, both pitches as rise per 12, the rise in feet and the "
                           "areas in square feet.</p>"),
            "limits": [
                "<strong>Symmetrical gambrel.</strong> An unequal break needs its own run for each "
                "slope.",
                "<strong>No gable ends.</strong> The vertical triangles are separate siding.",
            ],
            "uses": [
                "<li>Measuring a barn roof for shingles.</li>",
                "<li>Checking attic headroom from a pitch.</li>",
                "<li>Sizing a gambrel for a shed.</li>",
            ],
        },
        faq=[
            ("What is a gambrel roof?",
             "A roof with two pitches a side — steep at the eave, shallow at the ridge — the classic barn "
             "shape."),
            ("How do you work out gambrel roof area?",
             "Treat each pitch as its own slope: hypotenuse times length times two, then add the two "
             "sections."),
        ],
        no_round_trip=["span", "length"],
        related=[("/construction/roof-pitch", "Roof pitch"),
                 ("/construction/roofing", "Roofing"),
                 ("/construction/rafter-length", "Rafter length")],
    ),

    S(
        slug="snow-load",
        name="Snow load",
        title="Snow Load Calculator: Roof Load from Ground Snow",
        desc="Turn a ground snow load into the load a roof actually carries, using the exposure, thermal and importance factors and a slope reduction. from the code factors.",
        what=("<p>The flat roof snow load is <strong>0.7 × Ce × Ct × I × Pg</strong>. A slope sheds snow above "
              "30°, and the roof load falls to nothing by about 70°.</p>"),
        fields=[
            F("ground", "Ground snow load", "psf", 30, "From the local building code map"),
            F("exposure", "Exposure factor", "", 1.0, "1.0 sheltered, 1.2 exposed, 0.9 in a city centre"),
            F("thermal", "Thermal factor", "", 1.1, "1.1 cold roof, 0.85 warm and well insulated"),
            F("importance", "Importance factor", "", 1.0, "1.0 ordinary, 1.1 for a high-occupancy building"),
            F("slope", "Roof slope", "°", 30, "The roof angle in degrees"),
            F("area", "Roof area", "ft²", 1500, "The surface that carries it"),
        ],
        results=[
            R("flat_load", "Flat roof snow load", "psf"),
            R("slope_factor", "Slope factor", ""),
            R("roof_load", "Roof snow load", "psf"),
            R("total_load", "Total snow on the roof", "lb"),
        ],
        formula={
            "flat_load": "0.7*exposure*thermal*importance*ground",
            "slope_factor": "min(1,max(0,1-(slope-30)/40))",
            "roof_load": "0.7*exposure*thermal*importance*ground*min(1,max(0,1-(slope-30)/40))",
            "total_load": "0.7*exposure*thermal*importance*ground*min(1,max(0,1-(slope-30)/40))*area",
            "ground": "flat_load/(0.7*exposure*thermal*importance)",
            "slope": "30+40*(1-slope_factor)",
            "area": "total_load/roof_load",
        },
        prose={
            "why": ("<p>Ground snow and roof snow are not the same number, and the difference is the reason "
                    "roofs in snowy country are built to a load a visitor from the ground would never guess. "
                    "Wind blows snow off a roof, a warm roof melts it, and a steep roof sheds it — all three "
                    "reduce what the structure has to carry.</p>"),
            "formula_note": ("<p>The 0.7 is the conversion from ground to roof snow in the code, and the "
                             "three factors adjust it for exposure, heat and consequence. The slope factor "
                             "is 1.0 up to 30° and falls linearly to zero at 70°, which is the shed "
                             "behaviour of a steep pitch.</p>"),
            "example_note": ("<p>A 30 psf ground load on an ordinary cold roof in a suburban exposure gives "
                             "23.1 psf flat. At 30° the slope factor is still 1.0, so the roof carries 23.1 "
                             "psf — nearly 35 000 lb over 1 500 ft² of roof.</p>"),
            "reading": ("<p>Read the roof load against the ground load: it is usually lower, but not always "
                        "— a fully exposed cold roof can take the full ground figure. The total is what a "
                        "truss or rafter is designed against, together with the dead load.</p>"),
            "scenarios": [
                {"inputs": {"ground": 50, "exposure": 1.0, "thermal": 1.1, "importance": 1.0, "slope": 20,
                            "area": 2000},
                 "note": "A heavy-snow region on a shallow roof, where nothing sheds and nothing is "
                         "discounted."},
                {"inputs": {"ground": 60, "exposure": 0.9, "thermal": 0.85, "importance": 1.1, "slope": 45,
                            "area": 1200},
                 "note": "A warm, sheltered roof at a steep pitch, where two factors reduce the load and one raises it."},
            ],
            "pitfalls": [
                "<strong>Ground load used as roof load.</strong> The 0.7 and the factors exist for a "
                "reason.",
                "<strong>Drifts ignored.</strong> A valley beside a taller roof can carry several times "
                "the uniform load.",
                "<strong>Slope in x/12 typed as degrees.</strong> A 6/12 roof is 26.6°, not 6°.",
            ],
            "units_note": ("<p>Loads in pounds per square foot, the slope in degrees, the factors as plain "
                           "numbers, and the total load in pounds at the area you enter.</p>"),
            "limits": [
                "<strong>Uniform load only.</strong> Drifts, rain-on-snow and sliding snow are separate "
                "cases in the code.",
                "<strong>A simplified clause.</strong> Use the full code for anything but an ordinary "
                "building.",
            ],
            "uses": [
                "<li>Checking a roof against a ground snow map.</li>",
                "<li>Seeing what a steeper pitch actually saves.</li>",
                "<li>Feeding a truss or rafter design.</li>",
            ],
        },
        faq=[
            ("Why is roof snow load less than ground snow load?",
             "Wind blows some off, a warm roof melts some, and the code's 0.7 factor accounts for the "
             "rest."),
            ("At what pitch does snow slide off a roof?",
             "Above 30° it starts to shed, and by 70° the code assumes it does not stay."),
        ],
        no_round_trip=["ground", "slope"],
        related=[("/construction/roof-truss", "Roof truss"),
                 ("/construction/roof-pitch", "Roof pitch"),
                 ("/construction/wood-beam-span", "Wood beam span")],
    ),

    S(
        slug="door-header-size",
        name="Door header size",
        title="Door Header Calculator: Depth for the Opening",
        desc="Work out the header depth a door or window opening needs from the load above it, the clear span, the species and the header thickness. and the stock depth.",
        what=("<p>A header is a beam over an opening: <strong>M = w × L² ÷ 8</strong>, the section modulus "
              "is <strong>S = M ÷ Fb</strong>, and the depth follows from <strong>S = b × d² ÷ 6</strong>.</p>"),
        fields=[
            F("opening", "Opening width", "ft", 4, "Clear span the header carries"),
            F("load", "Load above", "lb/ft", 300, "Wall, floor or roof load per foot of header"),
            F("fb", "Allowable bending stress", "psi", 1000, "Fb for the species and grade"),
            F("width", "Header thickness", "in", 3.5, "A single 2 × is 1½, a double 2 × is 3"),
        ],
        results=[
            R("moment", "Bending moment", "lb·in"),
            R("s_required", "Section modulus required", "in³"),
            R("depth_required", "Depth required", "in"),
            R("depth_nominal", "Depth, rounded up to stock", "in"),
        ],
        formula={
            "moment": "load*pow(opening,2)/8*12",
            "s_required": "load*pow(opening,2)/8*12/fb",
            "depth_required": "sqrt(6*load*pow(opening,2)/8*12/fb/width)",
            "depth_nominal": "ceil(sqrt(6*load*pow(opening,2)/8*12/fb/width)/2)*2",
            "opening": "sqrt(moment*8/(load*12))",
            "load": "moment*8/pow(opening,2)/12",
            "fb": "moment/s_required",
            "width": "6*moment/fb/pow(depth_required,2)",
        },
        prose={
            "why": ("<p>A door or window takes a piece out of a bearing wall, and the header puts it back. "
                    "Header tables give sizes for the usual cases, but they assume a load and a species — "
                    "and a heavy roof or an engineered floor changes both. This is the same arithmetic the "
                    "table was built from.</p>"),
            "formula_note": ("<p>The moment at midspan of a uniformly loaded simple beam is wL²/8 in "
                             "pound-feet, multiplied by twelve to work in pound-inches. Dividing by the "
                             "allowable stress gives the section modulus, and the depth comes back out of "
                             "the rectangle's formula with the header's thickness held.</p>"),
            "example_note": ("<p>A 4 ft opening carrying 300 lb/ft in a 1000 psi species: the moment is "
                             "7 200 lb·in, so the header needs 7.2 in³ of section. In a double 2 × (3 in "
                             "thick) that is a depth of 3.5 in — a 2 × 4 header passes, and a 2 × 6 is used in practice for stiffness.</p>"),
            "reading": ("<p>Read the required depth against the stock sizes: it is usually strength that "
                        "gives a small number, and deflection that pushes the size up by a couple of "
                        "inches. A header that only just passes the bending check will feel springy over a "
                        "door.</p>"),
            "scenarios": [
                {"inputs": {"opening": 8, "load": 400, "fb": 1000, "width": 3},
                 "note": "A wide opening under a heavy load: the span squared makes this the case that "
                         "needs a deep header."},
                {"inputs": {"opening": 3, "load": 250, "fb": 1200, "width": 1.5},
                 "note": "A doorway in an interior wall — the case the tables cover with a single 2 × 6."},
            ],
            "pitfalls": [
                "<strong>Deflection ignored.</strong> Headers over wide openings are usually governed by "
                "sag, not strength.",
                "<strong>Load guessed.</strong> A roof-bearing wall carries far more than an internal "
                "partition.",
                "<strong>Double 2 × counted as 3½ thick.</strong> Two 1½ in members make 3 in, and the "
                "thickness is what the depth is solved against.",
            ],
            "units_note": ("<p>Opening in feet, load in pounds per foot, stress in psi, thickness in inches, "
                           "the moment in pound-inches and depths in inches.</p>"),
            "limits": [
                "<strong>Bending only.</strong> Bearing, shear and deflection are separate checks.",
                "<strong>One span.</strong> A header carrying two openings is a different problem.",
            ],
            "uses": [
                "<li>Sizing a header over a garage door.</li>",
                "<li>Checking a table entry against your load.</li>",
                "<li>Seeing why deflection governs wide openings.</li>",
            ],
        },
        faq=[
            ("What size header for a 4 ft opening?",
             "A 2 × 4 passes the bending check under a light load; a 2 × 6 is used in practice for "
             "stiffness."),
            ("Do double headers carry twice as much?",
             "Yes — doubling the thickness doubles the section modulus, so it doubles the capacity."),
        ],
        no_round_trip=["opening", "load", "fb", "width"],
        related=[("/construction/wood-beam-span", "Wood beam span"),
                 ("/construction/beam-load", "Beam load"),
                 ("/construction/framing", "Framing")],
    ),
]
