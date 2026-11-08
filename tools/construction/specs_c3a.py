"""Batch 3a — cubic measure, tanks and pools."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="cubic-yard",
        name="Cubic yard",
        title="Cubic Yard Calculator: Feet, Inches and Yards",
        desc="Turn a length, a width and a depth into cubic feet, cubic yards and cubic metres, the three units a yard, a plant and a plan each insist on.",
        what=("<p>A cubic yard is 27 cubic feet. <strong>Volume = length × width × depth ÷ 27</strong>, with "
              "the depth converted to feet first if it is in inches.</p>"),
        fields=[
            F("length", "Length", "ft", 10, "Along the bed or slab"),
            F("width", "Width", "ft", 10, "Across it"),
            F("depth", "Depth", "in", 4, "Thickness in inches"),
        ],
        results=[
            R("volume_ft3", "Volume", "ft³"),
            R("volume_yd3", "Volume", "yd³"),
            R("volume_m3", "Volume", "m³"),
        ],
        formula={
            "volume_ft3": "length*width*depth/12",
            "volume_yd3": "length*width*depth/12/27",
            "volume_m3": "length*width*depth/12*0.0283168",
            "length": "12*volume_ft3/(width*depth)",
            "width": "12*volume_ft3/(length*depth)",
            "depth": "12*volume_ft3/(length*width)",
        },
        prose={
            "why": ("<p>Almost every material in construction ends up priced in cubic yards, and almost every "
                    "drawing is dimensioned in feet and inches. The conversion is one division by 27, but it "
                    "is the step where a pour comes up short, because a thickness in inches has to go to "
                    "feet first and the two divisions are easy to conflate.</p>"),
            "formula_note": ("<p>Depth over twelve puts the thickness in feet, so the product is cubic feet; "
                             "over 27 turns that into cubic yards. The metric result is the same volume in "
                             "cubic metres, which is what a plant outside the US will quote.</p>"),
            "example_note": ("<p>Ten feet by ten at four inches: {volume_ft3|unit}, which is {volume_yd3|unit} "
                             "— a little under {volume_m3|unit} in metric. The same box a foot deep would be "
                             "three times the volume, which is why depth is the box to measure twice.</p>"),
            "reading": ("<p>Read the cubic yards against the cubic feet: 27 to one, every time. If the two "
                        "numbers are not in that ratio, the depth has been entered in feet where inches were "
                        "meant, or the other way round.</p>"),
            "scenarios": [
                {"inputs": {"length": 20, "width": 12, "depth": 6},
                 "note": "A slab six inches thick — the depth that makes a driveway."},
                {"inputs": {"length": 4, "width": 3, "depth": 18},
                 "note": "A raised bed three foot by four, deep enough to matter."},
            ],
            "pitfalls": [
                "<strong>Depth in feet.</strong> Entering 0.33 for four inches works, entering 4 does not.",
                "<strong>Dividing by 27 twice.</strong> The 27 already contains the cubic-feet step.",
                "<strong>Yards confused with square yards.</strong> A yard of material is a volume — 27 ft³ — "
                "not a yard of area.",
            ],
            "units_note": ("<p>Length and width in feet, depth in inches, the result in cubic feet, cubic yards "
                           "and cubic metres.</p>"),
            "limits": [
                "<strong>Rectangular only.</strong> Curved beds need the area worked out first.",
                "<strong>No allowance for compaction.</strong> Loose and compacted volumes differ.",
            ],
            "uses": [
                "<li>Converting a takeoff into yards.</li>",
                "<li>Checking a ready-mix order.</li>",
                "<li>Comparing a metric quote with a US one.</li>",
            ],
        },
        faq=[
            ("How many cubic feet in a cubic yard?",
             "Twenty-seven: a yard is three feet each way, and three cubed is 27."),
            ("How do I convert inches of depth into yards?",
             "Divide the depth by twelve to get feet, then divide the volume by 27."),
        ],
        related=[("/construction/ft2-yd3", "Square feet to cubic yards"),
                 ("/construction/concrete-weight", "Concrete weight"),
                 ("/construction/concrete-slab", "Concrete slab")],
    ),

    S(
        slug="ft2-yd3",
        name="Square feet to cubic yards",
        title="Square Feet to Cubic Yards: Volume Calculator",
        desc="Convert a measured area and a depth into cubic feet and cubic yards, with an over-order allowance and the bags of mix that volume would take.",
        what=("<p><strong>Cubic yards = area × depth ÷ 12 ÷ 27</strong>: the area is already square feet, so "
              "the only conversion is the depth in inches, then the divisor of 27.</p>"),
        fields=[
            F("area", "Area", "ft²", 100, "The measured surface"),
            F("depth", "Depth", "in", 4, "The thickness being placed"),
            F("waste", "Over-order", "%", 10, "Spillage and an uneven base"),
        ],
        results=[
            R("volume_ft3", "Volume", "ft³"),
            R("volume_yd3", "Volume", "yd³"),
            R("bags_80lb", "Bags of 80 lb", ""),
        ],
        formula={
            "volume_ft3": "area*depth/12*(1+waste/100)",
            "volume_yd3": "area*depth/12/27*(1+waste/100)",
            "bags_80lb": "ceil(area*depth/12*(1+waste/100)/0.6)",
            "area": "27*volume_yd3/(depth/12*(1+waste/100))",
            "depth": "324*volume_yd3/(area*(1+waste/100))",
            "waste": "(volume_yd3/(area*depth/12/27)-1)*100",
        },
        prose={
            "why": ("<p>This is the workhorse conversion: an area you can measure with a tape, a depth the "
                    "specification gives, and an order the yard wants in cubic yards. Every material sold by "
                    "volume — concrete, gravel, sand, mulch — passes through this arithmetic.</p>"),
            "formula_note": ("<p>The over-order is applied to the volume before the bag count, so the two "
                             "results always agree. An 80 lb bag of premixed concrete yields 0.6 ft³, which "
                             "is why the bag count is so large on anything bigger than a small pad.</p>"),
            "example_note": ("<p>A hundred square feet at four inches with ten per cent over: "
                             "{volume_ft3|unit}, or {volume_yd3|unit} — and {bags_80lb} bags of 80 lb mix if "
                             "you are mixing it by hand rather than calling a truck.</p>"),
            "reading": ("<p>Read the bags against the yards: 45 bags of 80 lb make a yard, so a figure much "
                        "below that means the bag yield has been overestimated. Above about three yards the "
                        "truck is cheaper and far faster.</p>"),
            "scenarios": [
                {"inputs": {"area": 400, "depth": 6, "waste": 5},
                 "note": "A larger pad with a tighter allowance — the kind of job that arrives on a truck."},
                {"inputs": {"area": 24, "depth": 3, "waste": 15},
                 "note": "A single post pad, where a bag or two covers the whole job."},
            ],
            "pitfalls": [
                "<strong>Area taken from the plan.</strong> It is the measured surface, including any "
                "over-excavation.",
                "<strong>Depth in feet.</strong> The twelve is doing the conversion.",
                "<strong>Waste applied after the bag count.</strong> It belongs in the volume.",
            ],
            "units_note": ("<p>Area in square feet, depth in inches, volume in cubic feet and cubic yards, and "
                           "the bag count in 80 lb bags at 0.6 ft³ each.</p>"),
            "limits": [
                "<strong>Level surface.</strong> A graded base needs its depth varied along the slope.",
                "<strong>One material.</strong> Different mixes have different bag yields.",
            ],
            "uses": [
                "<li>Ordering concrete by the yard.</li>",
                "<li>Sizing a bag mix for a small pour.</li>",
                "<li>Converting a specification to an order.</li>",
            ],
        },
        faq=[
            ("How many cubic yards is 100 square feet at 4 inches?",
             "1.23 yd³ before an over-order, and about 1.36 with ten per cent."),
            ("How many bags of concrete make a cubic yard?",
             "Forty-five 80 lb bags at 0.6 ft³ each, or sixty 60 lb bags."),
        ],
        no_round_trip=["waste"],
        related=[("/construction/cubic-yard", "Cubic yard"),
                 ("/construction/concrete-slab", "Concrete slab"),
                 ("/construction/gravel", "Gravel")],
    ),

    S(
        slug="hole-volume",
        name="Hole volume",
        title="Hole Volume Calculator: Cubic Feet and Gallons",
        desc="Work out the volume of a round hole in cubic feet, cubic yards and gallons, from its diameter and depth, for footings, planting or a soakaway.",
        what=("<p>A hole is a cylinder: <strong>volume = π × (diameter ÷ 2)² × depth</strong>, with both "
              "dimensions converted to feet first.</p>"),
        fields=[
            F("diameter", "Diameter", "in", 12, "Across the hole"),
            F("depth", "Depth", "in", 36, "Bottom to grade"),
        ],
        results=[
            R("volume_ft3", "Volume", "ft³"),
            R("volume_yd3", "Volume", "yd³"),
            R("gallons", "Volume", "gal"),
        ],
        formula={
            "volume_ft3": "pi/4*pow(diameter/12,2)*depth/12",
            "volume_yd3": "pi/4*pow(diameter/12,2)*depth/12/27",
            "gallons": "pi/4*pow(diameter/12,2)*depth/12*7.48052",
            "diameter": "12*sqrt(4*volume_ft3/(pi*depth/12))",
            "depth": "48*volume_ft3/(pi*pow(diameter/12,2))",
        },
        prose={
            "why": ("<p>A hole is the one volume nobody measures twice and everybody under-estimates: a round "
                    "hole looks small at the top and holds a surprising amount once it is three feet deep. "
                    "The gallons figure is there for the case where the hole fills with water, which on a "
                    "clay site it will.</p>"),
            "formula_note": ("<p>Both dimensions are halved and divided by twelve inside the formula, so the "
                             "input can stay in the inches a tape gives. The result is a cylinder, which is "
                             "right for an augered hole and close enough for a dug one.</p>"),
            "example_note": ("<p>A twelve inch hole three feet deep holds {volume_ft3|unit} — {volume_yd3|unit}, "
                             "or {gallons} gallons if it fills. The same hole twice as wide holds four times "
                             "as much, because the diameter is squared.</p>"),
            "reading": ("<p>Read the gallons against the cubic feet: 7.48 to one. That ratio is the quickest "
                        "check that the diameter was entered in inches rather than feet.</p>"),
            "scenarios": [
                {"inputs": {"diameter": 18, "depth": 48},
                 "note": "A tree-planting hole: wide and deep, and a lot of backfill to find."},
                {"inputs": {"diameter": 8, "depth": 24},
                 "note": "A fence post hole — small enough to fill with a couple of bags."},
            ],
            "pitfalls": [
                "<strong>Diameter entered as radius.</strong> The formula halves it; the volume comes out "
                "four times too big.",
                "<strong>Depth measured to the top of the spoil.</strong> It is the hole, not the mound.",
                "<strong>Water table ignored.</strong> A hole that fills changes both the volume and the "
                "pour.",
            ],
            "units_note": ("<p>Diameter and depth in inches; volume in cubic feet, cubic yards and US gallons, "
                           "at 7.48 gallons to the cubic foot.</p>"),
            "limits": [
                "<strong>A cylinder.</strong> A bell-shaped or square hole needs its own section.",
                "<strong>No displacement.</strong> A post standing in the hole takes up some of it.",
            ],
            "uses": [
                "<li>Sizing concrete for a post hole.</li>",
                "<li>Estimating backfill for planting.</li>",
                "<li>Working out how much water a hole will hold.</li>",
            ],
        },
        faq=[
            ("How much concrete does a 12 inch hole 3 feet deep take?",
             "0.79 ft³ — about two bags of 80 lb mix once the post is allowed for."),
            ("How many gallons in a cubic foot?",
             "7.48 US gallons."),
        ],
        related=[("/construction/post-hole-concrete", "Post hole concrete"),
                 ("/construction/concrete-tube", "Concrete tube"),
                 ("/construction/tank-volume", "Tank volume")],
    ),

    S(
        slug="tank-volume",
        name="Tank volume",
        title="Tank Volume Calculator: Gallons, Litres and Feet",
        desc="Work out how many gallons and litres a rectangular tank holds from its length, width and depth, with the cubic footage beside them.",
        what=("<p>A box tank holds <strong>length × width × depth</strong> in cubic feet, and a cubic foot is "
              "7.48 US gallons or 28.32 litres.</p>"),
        fields=[
            F("length", "Internal length", "ft", 4, "Inside the tank"),
            F("width", "Internal width", "ft", 2, "Inside the tank"),
            F("depth", "Internal depth", "ft", 1.5, "Water depth, not tank height"),
        ],
        results=[
            R("volume_ft3", "Volume", "ft³"),
            R("gallons", "Volume", "gal"),
            R("litres", "Volume", "L"),
        ],
        formula={
            "volume_ft3": "length*width*depth",
            "gallons": "length*width*depth*7.48052",
            "litres": "length*width*depth*28.3168",
            "length": "volume_ft3/(width*depth)",
            "width": "volume_ft3/(length*depth)",
            "depth": "volume_ft3/(length*width)",
        },
        prose={
            "why": ("<p>Tank volumes come up in rainwater harvesting, aquariums, livestock troughs and "
                    "chemical dosing, and each trade asks for a different unit. The arithmetic is a box, and "
                    "the only trap is measuring the outside of a tank instead of the inside.</p>"),
            "formula_note": ("<p>Gallons and litres are both plain multiples of the cubic foot, so one "
                             "calculation serves both. A US gallon is 231 cubic inches and a litre is 1 000 "
                             "cubic centimetres, which is why the two do not relate by a round number.</p>"),
            "example_note": ("<p>A tank four feet by two, filled to eighteen inches: {volume_ft3|unit}, "
                             "{gallons} US gallons or {litres} litres. Filling it to the brim rather than to "
                             "the working depth would add a quarter more.</p>"),
            "reading": ("<p>Read the gallons against the litres: a US gallon is 3.785 litres, so 4 to 1 is "
                        "the check. A UK gallon is 4.55 litres, which is why imperial figures look "
                        "generous.</p>"),
            "scenarios": [
                {"inputs": {"length": 6, "width": 3, "depth": 2},
                 "note": "A water butt sized in feet rather than litres — a surprisingly large volume."},
                {"inputs": {"length": 1.5, "width": 1, "depth": 1},
                 "note": "A small dosing tank, where a litre-based measurement is easier to work in."},
            ],
            "pitfalls": [
                "<strong>Outside dimensions used.</strong> Wall thickness matters on a small tank.",
                "<strong>Depth taken as capacity.</strong> A tank is filled to a working level, not the "
                "rim.",
                "<strong>US and imperial gallons mixed.</strong> They differ by a fifth.",
            ],
            "units_note": ("<p>Dimensions in feet, volume in cubic feet, US gallons and litres.</p>"),
            "limits": [
                "<strong>A rectangular tank.</strong> Cylindrical and dished tanks hold less than the box "
                "they fit in.",
                "<strong>No ullage.</strong> Freeboard is a separate allowance.",
            ],
            "uses": [
                "<li>Sizing a water butt.</li>",
                "<li>Checking a dosing tank.</li>",
                "<li>Converting a specification in litres to feet.</li>",
            ],
        },
        faq=[
            ("How many gallons in a cubic foot?",
             "7.48 US gallons, or 6.23 imperial gallons."),
            ("How do I size a tank in litres?",
             "Multiply the cubic footage by 28.32."),
        ],
        related=[("/construction/round-pool-volume", "Round pool volume"),
                 ("/construction/pond", "Pond"),
                 ("/construction/hole-volume", "Hole volume")],
    ),

    S(
        slug="pool",
        name="Pool",
        title="Pool Volume Calculator: Gallons in a Rectangle",
        desc="Work out a rectangular swimming pool's volume in gallons from its length, width and the shallow and deep ends, with the average depth beside it.",
        what=("<p>A pool with a slope holds the average of its two depths: "
              "<strong>gallons = length × width × (shallow + deep) ÷ 2 × 7.48</strong>.</p>"),
        fields=[
            F("length", "Pool length", "ft", 24, "Wall to wall"),
            F("width", "Pool width", "ft", 12, "Wall to wall"),
            F("shallow", "Shallow depth", "ft", 3, "At the shallow end"),
            F("deep", "Deep depth", "ft", 6, "At the deep end"),
        ],
        results=[
            R("avg_depth", "Average depth", "ft"),
            R("volume_ft3", "Volume", "ft³"),
            R("gallons", "Volume", "gal"),
            R("litres", "Volume", "L"),
        ],
        formula={
            "avg_depth": "(shallow+deep)/2",
            "volume_ft3": "length*width*(shallow+deep)/2",
            "gallons": "length*width*(shallow+deep)/2*7.48052",
            "litres": "length*width*(shallow+deep)/2*28.3168",
            "length": "volume_ft3/(width*(shallow+deep)/2)",
            "width": "volume_ft3/(length*(shallow+deep)/2)",
            "shallow": "2*volume_ft3/(length*width)-deep",
            "deep": "2*volume_ft3/(length*width)-shallow",
        },
        prose={
            "why": ("<p>Pool chemicals are dosed by volume, and a pool is the rare volume where the depth is "
                    "not constant: the average of the two ends is the right approximation for a constant "
                    "slope, and the wrong one for a hopper bottom or a sport pool with a flat middle.</p>"),
            "formula_note": ("<p>Averaging the ends is exact for a plane sloping floor and close enough for "
                             "most domestic pools. The gallons then follow from the cubic feet at 7.48 to "
                             "the cubic foot.</p>"),
            "example_note": ("<p>A 24 by 12 ft pool from 3 ft to 6 ft: an average depth of {avg_depth|unit}, "
                             "{volume_ft3|unit} of water and {gallons} US gallons. That is the number on the "
                             "chlorine chart, and it is the one to get right.</p>"),
            "reading": ("<p>Read the average depth against the two ends: it sits halfway, and a pool with a "
                        "diving hopper holds more than that suggests. If the gallons look low against the "
                        "filter's turnover rating, the deep end is probably deeper than entered.</p>"),
            "scenarios": [
                {"inputs": {"length": 32, "width": 16, "shallow": 3.5, "deep": 8},
                 "note": "A pool with a diving end: the average depth carries the extra volume."},
                {"inputs": {"length": 16, "width": 8, "shallow": 4, "deep": 4},
                 "note": "A flat-bottom plunge pool, where both ends are the same."},
            ],
            "pitfalls": [
                "<strong>Water depth taken as wall height.</strong> The water sits below the coping.",
                "<strong>Deep end measured at the drain.</strong> It is the deepest point of the floor.",
                "<strong>A hopper bottom averaged.</strong> The straight average understates it.",
            ],
            "units_note": ("<p>Dimensions in feet, the average depth in feet, volume in cubic feet, US gallons "
                           "and litres.</p>"),
            "limits": [
                "<strong>Rectangular plan.</strong> Freeform and oval pools need a different area.",
                "<strong>A linear slope.</strong> A hopper or a sport pool is not a wedge.",
            ],
            "uses": [
                "<li>Dosing a pool.</li>",
                "<li>Sizing a pump and filter.</li>",
                "<li>Estimating a fill.</li>",
            ],
        },
        faq=[
            ("How many gallons is a 24 by 12 pool?",
             "About 9 695 US gallons at an average depth of 4.5 ft."),
            ("How do I find the average depth?",
             "Add the shallow and deep ends and halve it, which is right for a constant slope."),
        ],
        related=[("/construction/round-pool-volume", "Round pool volume"),
                 ("/construction/tank-volume", "Tank volume"),
                 ("/construction/pond", "Pond")],
    ),

    S(
        slug="round-pool-volume",
        name="Round pool volume",
        title="Round Pool Volume Calculator: Gallons and Litres",
        desc="Work out how many gallons and litres a round or above-ground pool holds from its diameter and water depth, with the cubic footage beside them.",
        what=("<p>A round pool is a cylinder: <strong>volume = π × (diameter ÷ 2)² × depth</strong>, and the "
              "gallons follow at 7.48 to the cubic foot.</p>"),
        fields=[
            F("diameter", "Pool diameter", "ft", 18, "Across the water line"),
            F("depth", "Water depth", "ft", 4, "Wall height less the freeboard"),
        ],
        results=[
            R("volume_ft3", "Volume", "ft³"),
            R("gallons", "Volume", "gal"),
            R("litres", "Volume", "L"),
            R("surface_area", "Surface area", "ft²"),
        ],
        formula={
            "volume_ft3": "pi/4*pow(diameter,2)*depth",
            "gallons": "pi/4*pow(diameter,2)*depth*7.48052",
            "litres": "pi/4*pow(diameter,2)*depth*28.3168",
            "surface_area": "pi/4*pow(diameter,2)",
            "diameter": "sqrt(4*volume_ft3/(pi*depth))",
            "depth": "4*volume_ft3/(pi*pow(diameter,2))",
        },
        prose={
            "why": ("<p>Above-ground pools are sold by diameter and wall height, and dosed by gallons. The "
                    "two are related by a circle, which is where the estimate goes wrong: a pool two feet "
                    "wider holds a fifth more water for the same wall height.</p>"),
            "formula_note": ("<p>The diameter is squared, so the area grows much faster than the pool looks. "
                             "The water depth is less than the wall height because the water sits a few "
                             "inches below the top, and that difference is worth a few hundred gallons.</p>"),
            "example_note": ("<p>An 18 ft pool filled to four feet: a surface of {surface_area|unit}, "
                             "{volume_ft3|unit} of water and {gallons} US gallons — about {litres} litres. "
                             "Filling it to the wall height instead would add another few hundred.</p>"),
            "reading": ("<p>Read the gallons against the manufacturer's figure: the label on the pool usually "
                        "quotes 90 per cent of the wall-height volume, which allows for the freeboard. If the "
                        "two disagree by more than that, the diameter is being measured at the top rail "
                        "rather than the water line.</p>"),
            "scenarios": [
                {"inputs": {"diameter": 24, "depth": 4.5},
                 "note": "A larger round pool — the diameter squared is what makes the difference."},
                {"inputs": {"diameter": 12, "depth": 3},
                 "note": "A paddling pool, where the arithmetic is small enough to check in your head."},
            ],
            "pitfalls": [
                "<strong>Diameter entered as radius.</strong> The formula squares the diameter over four.",
                "<strong>Wall height used as depth.</strong> The water line sits below the top.",
                "<strong>Oval pools entered as round.</strong> An oval is not a circle and holds less per "
                "foot of length.",
            ],
            "units_note": ("<p>Diameter and depth in feet, volume in cubic feet, US gallons and litres, the "
                           "surface in square feet.</p>"),
            "limits": [
                "<strong>A plain cylinder.</strong> A dished or hopper bottom holds more.",
                "<strong>No displacement.</strong> People, steps and equipment take up water.",
            ],
            "uses": [
                "<li>Dosing an above-ground pool.</li>",
                "<li>Checking a chemical chart's volume.</li>",
                "<li>Sizing a filter's turnover.</li>",
            ],
        },
        faq=[
            ("How many gallons in an 18 ft round pool?",
             "About 7 614 US gallons at a 4 ft depth."),
            ("Is an oval pool the same as a round one?",
             "No — an oval holds about two thirds of the circle that encloses it at the same width."),
        ],
        related=[("/construction/pool", "Pool volume"),
                 ("/construction/tank-volume", "Tank volume"),
                 ("/construction/pond", "Pond")],
    ),

    S(
        slug="pond",
        name="Pond",
        title="Pond Volume Calculator: Gallons and Acre-Feet",
        desc="Work out a pond's volume in gallons, litres and acre-feet from its length, width and maximum depth, using a shape factor for the sloping sides.",
        what=("<p>A pond is not a box: <strong>average depth = maximum depth × shape factor</strong>, usually "
              "0.6 for a dug pond, and <strong>volume = length × width × average depth</strong>.</p>"),
        fields=[
            F("length", "Pond length", "ft", 20, "Longest dimension at the water line"),
            F("width", "Pond width", "ft", 12, "Across it"),
            F("max_depth", "Maximum depth", "ft", 4, "At the deepest point"),
            F("shape_factor", "Shape factor", "", 0.6, "0.5 to 0.7 for a dug pond"),
        ],
        results=[
            R("avg_depth", "Average depth", "ft"),
            R("volume_ft3", "Volume", "ft³"),
            R("gallons", "Volume", "gal"),
            R("acre_feet", "Volume", "acre-ft"),
        ],
        formula={
            "avg_depth": "max_depth*shape_factor",
            "volume_ft3": "length*width*max_depth*shape_factor",
            "gallons": "length*width*max_depth*shape_factor*7.48052",
            "acre_feet": "length*width*max_depth*shape_factor/43560",
            "length": "volume_ft3/(width*max_depth*shape_factor)",
            "width": "volume_ft3/(length*max_depth*shape_factor)",
            "max_depth": "volume_ft3/(length*width*shape_factor)",
        },
        prose={
            "why": ("<p>A pond is judged by its volume: how many fish it carries, how often the pump turns it "
                    "over, how much treatment it needs, and how much liner it takes. The maximum depth is easy "
                    "to measure and the average is not, which is what the shape factor is for.</p>"),
            "formula_note": ("<p>Dug ponds with sloping sides average about 0.6 of their maximum depth; a "
                             "steep-sided or lined pond with vertical walls tends towards 0.8 or more. The "
                             "acre-foot is the unit a water engineer uses: one acre covered a foot deep, "
                             "which is 43 560 ft³.</p>"),
            "example_note": ("<p>A pond 20 ft by 12 with a maximum depth of 4 ft and a factor of 0.6: an "
                             "average depth of {avg_depth|unit}, {volume_ft3|unit} of water — {gallons} US "
                             "gallons, or {acre_feet} acre-feet.</p>"),
            "reading": ("<p>Read the shape factor against the profile: a saucer-shaped wildlife pond is nearer "
                        "0.5, a dug koi pond with steep sides nearer 0.7, and a lined tank of a pond 1.0. "
                        "Getting it wrong is the difference between a pump that copes and one that does "
                        "not.</p>"),
            "scenarios": [
                {"inputs": {"length": 30, "width": 20, "max_depth": 6, "shape_factor": 0.5},
                 "note": "A wide, saucer-shaped pond: the maximum depth is only reached in the middle."},
                {"inputs": {"length": 12, "width": 8, "max_depth": 3, "shape_factor": 0.75},
                 "note": "A small steep-sided pond with a liner and vertical walls."},
            ],
            "pitfalls": [
                "<strong>Maximum depth used as average.</strong> A dug pond holds about 60 per cent of the "
                "box it fits in.",
                "<strong>Dimensions taken at the top of the bank.</strong> Measure at the water line.",
                "<strong>Liner area confused with volume.</strong> They are different calculations and the "
                "liner is always bigger.",
            ],
            "units_note": ("<p>Dimensions and depths in feet, volume in cubic feet, US gallons and acre-feet, "
                           "with the shape factor as a plain number.</p>"),
            "limits": [
                "<strong>A simple shape.</strong> An irregular pond needs its area surveyed.",
                "<strong>No rainfall or groundwater.</strong> Steady-state level is a site question.",
            ],
            "uses": [
                "<li>Sizing a pump for a pond.</li>",
                "<li>Working out fish capacity.</li>",
                "<li>Estimating a water treatment dose.</li>",
            ],
        },
        faq=[
            ("How many gallons in a pond 20 feet by 12 feet, 4 feet deep?",
             "About 4 300 US gallons at a 0.6 shape factor."),
            ("What is an acre-foot?",
             "One acre covered a foot deep — 43 560 cubic feet, or about 326 000 gallons."),
        ],
        related=[("/construction/pool", "Pool volume"),
                 ("/construction/tank-volume", "Tank volume"),
                 ("/construction/round-pool-volume", "Round pool volume")],
    ),

    S(
        slug="pipe-volume",
        name="Pipe volume",
        title="Pipe Volume Calculator: Gallons and Cubic Feet",
        desc="Work out the water a pipe holds in gallons, cubic feet and litres per foot, from its inside diameter and length, for filling and dosing.",
        what=("<p>A pipe is a cylinder of its inside diameter: <strong>volume = π × (inside ÷ 2)² × "
              "length</strong>, and a cubic foot is 7.48 US gallons.</p>"),
        fields=[
            F("inside_diameter", "Inside diameter", "in", 2, "Bore, not nominal pipe size"),
            F("length", "Length", "ft", 100, "Run of pipe"),
        ],
        results=[
            R("volume_ft3", "Volume", "ft³"),
            R("gallons", "Volume", "gal"),
            R("litres", "Volume", "L"),
            R("gallons_per_ft", "Per foot", "gal/ft"),
        ],
        formula={
            "volume_ft3": "pi/4*pow(inside_diameter/12,2)*length",
            "gallons": "pi/4*pow(inside_diameter/12,2)*length*7.48052",
            "litres": "pi/4*pow(inside_diameter/12,2)*length*28.3168",
            "gallons_per_ft": "pi/4*pow(inside_diameter/12,2)*7.48052",
            "inside_diameter": "12*sqrt(4*volume_ft3/(pi*length))",
            "length": "4*volume_ft3/(pi*pow(inside_diameter/12,2))",
        },
        prose={
            "why": ("<p>Pipe volume matters when a line has to be filled, dosed or antifrozen: the water sitting "
                    "in a hundred feet of pipe is a real quantity, and on a large bore it is a surprising one. "
                    "The per-foot figure is the useful one for a run of any length.</p>"),
            "formula_note": ("<p>The bore is squared, so doubling the diameter quadruples the volume — a 4 in "
                             "pipe holds four times what a 2 in does. Nominal pipe size is not the bore: a 2 in "
                             "steel pipe has an inside diameter near two inches, and a 2 in copper one is "
                             "smaller again.</p>"),
            "example_note": ("<p>A hundred feet of 2 in bore holds {volume_ft3|unit}, which is {gallons} US "
                             "gallons or {litres} litres. Each foot of that pipe holds {gallons_per_ft|unit}, "
                             "which is the number to remember on site.</p>"),
            "reading": ("<p>Read the per-foot figure against the bore: 2 in gives about a fifth of a gallon a "
                        "foot, 4 in about four fifths, and 6 in nearly two. If the figure is far adrift, the "
                        "diameter has been entered as the outside rather than the bore.</p>"),
            "scenarios": [
                {"inputs": {"inside_diameter": 4, "length": 50},
                 "note": "A larger bore over a shorter run: the diameter squared more than makes up for the "
                         "length."},
                {"inputs": {"inside_diameter": 0.75, "length": 200},
                 "note": "A long, small-bore supply line — barely any water, but enough to freeze."},
            ],
            "pitfalls": [
                "<strong>Nominal size used as bore.</strong> Look up the actual inside diameter.",
                "<strong>Outside diameter entered.</strong> It overstates the volume.",
                "<strong>Volume of a whole system assumed.</strong> Add the fittings and the cylinder.",
            ],
            "units_note": ("<p>Inside diameter in inches, length in feet, volume in cubic feet, US gallons and "
                           "litres, with gallons per foot for a run of any length.</p>"),
            "limits": [
                "<strong>A clean cylinder.</strong> Scale and fittings reduce the working volume.",
                "<strong>Water only.</strong> Other fluids are the same volume at different weights.",
            ],
            "uses": [
                "<li>Working out how much antifreeze a line needs.</li>",
                "<li>Sizing a dose for a pipe run.</li>",
                "<li>Estimating a flush volume.</li>",
            ],
        },
        faq=[
            ("How many gallons in 100 feet of 2 inch pipe?",
             "About 16.3 US gallons at a 2 in bore."),
            ("Does pipe volume depend on the wall thickness?",
             "Only through the bore: a thicker wall means a smaller inside diameter."),
        ],
        related=[("/construction/pipe-weight", "Pipe weight"),
                 ("/construction/tank-volume", "Tank volume"),
                 ("/construction/hole-volume", "Hole volume")],
    ),

    S(
        slug="size-to-weight-rectangular-cuboid",
        name="Box size to weight",
        title="Box Weight Calculator: Volume to Weight in Pounds",
        desc="Turn the outside dimensions of a rectangular block into its volume and weight, at the density of whatever it is made from, in pounds and kilograms.",
        what=("<p>Volume first, then weight: <strong>volume = length × width × height</strong>, and "
              "<strong>weight = volume × density</strong>.</p>"),
        fields=[
            F("length", "Length", "in", 12, "Longest dimension"),
            F("width", "Width", "in", 6, "Middle dimension"),
            F("height", "Height", "in", 6, "Shortest dimension"),
            F("density", "Density", "lb/ft³", 150, "150 concrete, 45 oak, 0.075 air"),
        ],
        results=[
            R("volume_in3", "Volume", "in³"),
            R("volume_ft3", "Volume", "ft³"),
            R("weight_lb", "Weight", "lb"),
            R("weight_kg", "Weight", "kg"),
        ],
        formula={
            "volume_in3": "length*width*height",
            "volume_ft3": "length*width*height/1728",
            "weight_lb": "length*width*height/1728*density",
            "weight_kg": "length*width*height/1728*density/2.20462",
            "length": "1728*volume_ft3/(width*height)",
            "width": "1728*volume_ft3/(length*height)",
            "height": "1728*volume_ft3/(length*width)",
            "density": "weight_lb/volume_ft3",
        },
        prose={
            "why": ("<p>Weight is what decides whether something can be lifted, shipped or stood on a floor, "
                    "and a block of material gives up its weight from its dimensions and one density. The "
                    "density is the only external fact needed, and it is the one people guess.</p>"),
            "formula_note": ("<p>Dividing the cubic inches by 1 728 gives cubic feet, which is the unit the "
                             "density is quoted in. The kilograms result divides by 2.20462, so the two "
                             "weight boxes never disagree.</p>"),
            "example_note": ("<p>A block 12 by 6 by 6 in is {volume_in3|unit} — {volume_ft3|unit} — and at 150 "
                             "lb/ft³ it weighs {weight_lb} lb, or {weight_kg} kg. In oak at 45 lb/ft³ the "
                             "same block weighs less than a third of that.</p>"),
            "reading": ("<p>Read the density against the material: water is 62.4 lb/ft³, concrete 150, oak "
                        "about 45, aluminium 169 and steel 490. A weight that looks wrong by a factor of two "
                        "is usually a density in the wrong units.</p>"),
            "scenarios": [
                {"inputs": {"length": 24, "width": 12, "height": 4, "density": 490},
                 "note": "A steel billet — the density is eight times a block of timber."},
                {"inputs": {"length": 36, "width": 18, "height": 18, "density": 150},
                 "note": "A concrete pier block: small dimensions, heavy result."},
            ],
            "pitfalls": [
                "<strong>Density in g/cm³ entered as lb/ft³.</strong> A factor of 62 between them.",
                "<strong>Outside dimensions on a hollow box.</strong> It assumes solid.",
                "<strong>Millimetres typed as inches.</strong> The volume is out by a factor of 16 000.",
            ],
            "units_note": ("<p>Dimensions in inches, volume in cubic inches and cubic feet, weight in pounds "
                           "and kilograms at the density you enter in pounds per cubic foot.</p>"),
            "limits": [
                "<strong>Solid, rectangular.</strong> Hollow and shaped objects need their own volume.",
                "<strong>One material.</strong> A composite needs a weighted density.",
            ],
            "uses": [
                "<li>Checking a lift.</li>",
                "<li>Estimating a shipping weight.</li>",
                "<li>Comparing materials by weight.</li>",
            ],
        },
        faq=[
            ("How do I work out the weight of a block?",
             "Multiply the three dimensions, divide by 1 728 for cubic feet, then multiply by the density."),
            ("What density should I use for concrete?",
             "150 lb/ft³ for normal weight, about 110 for lightweight."),
        ],
        related=[("/construction/metal-weight", "Metal weight"),
                 ("/construction/glass-weight", "Glass weight"),
                 ("/construction/cubic-yard", "Cubic yard")],
    ),
]
