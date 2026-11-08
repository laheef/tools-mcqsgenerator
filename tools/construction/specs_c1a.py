"""Batch 1a — brick, slabs, blockwork and columns."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="brick",
        name="Brick Calculator",
        title="Brick Calculator: Bricks for a Wall, Plus Waste",
        desc="Work out how many bricks a wall needs from its area, the brick's face size and the mortar joint, then add the wastage every job eats: five to ten per cent.",
        what=("<p>A wall takes one brick per <strong>(brick length + joint) × (brick height + joint)</strong> "
              "of face area. Multiply the wall's area by 144 to work in square inches, divide by that face, "
              "and round up: the joint is part of the module, not part of the brick.</p>"),
        fields=[
            F("wall_length", "Wall length", "ft", 20, "Measured along the face, not the footing"),
            F("wall_height", "Wall height", "ft", 8, "Floor to underside of the course above"),
            F("brick_length", "Brick length", "in", 7.625, "A modular brick's face is 7⅝ in"),
            F("brick_height", "Brick height", "in", 2.25, "A modular brick's height is 2¼ in"),
            F("joint", "Mortar joint", "in", 0.375, "⅜ in for a standard bed joint"),
            F("waste", "Wastage", "%", 5, "Five per cent is the usual allowance for cuts and breakage"),
        ],
        results=[
            R("wall_area", "Wall area", "ft²"),
            R("bricks", "Bricks, no waste", ""),
            R("bricks_with_waste", "Bricks to order", ""),
        ],
        formula={
            "wall_area": "wall_length*wall_height",
            "bricks": "ceil(wall_length*wall_height*144/((brick_length+joint)*(brick_height+joint))-0.000000001)",
            "bricks_with_waste": "ceil(wall_length*wall_height*144/((brick_length+joint)*(brick_height+joint))*(1+waste/100)-0.000000001)",
            "wall_length": "wall_area/wall_height",
            "wall_height": "wall_area/wall_length",
        },
        prose={
            "why": ("<p>Brick counts are the classic quantity takeoff: small units, a joint that changes "
                    "the module, and a wastage allowance that decides whether you finish the wall with a "
                    "half pallet left over or run out on the last course.</p>"),
            "formula_note": ("<p>The joint thickness is added to both the length and the height, because "
                             "the module a brick occupies is the brick plus one joint in each direction. "
                             "That is why a 7⅝ × 2¼ brick laid with a ⅜ joint occupies 8 × 2⅝ inches of "
                             "wall — the familiar 6.9 bricks per square foot.</p>"),
            "example_note": ("<p>A 20 ft by 8 ft wall is 160 ft², or 23 040 in². Each brick module is "
                             "8 × 2.625 = 21 in², so the wall needs 1 098 bricks, and with five per cent "
                             "waste 1 152 to order — about 2.3 pallets of 500.</p>"),
            "reading": ("<p>Sanity-check against the rule of thumb: roughly 7 bricks per square foot for "
                        "a single-skin wall with ⅜ joints. A count far from that usually means the brick "
                        "dimensions were entered in the wrong unit — millimetres into an inch box, for "
                        "instance.</p>"),
            "scenarios": [
                {"inputs": {"wall_length": 30, "wall_height": 10, "brick_length": 7.625,
                            "brick_height": 2.25, "joint": 0.375, "waste": 10},
                 "note": "A 30 ft by 10 ft wall: 2 058 bricks before waste, 2 263 to order at ten per cent."},
                {"inputs": {"wall_length": 12, "wall_height": 4, "brick_length": 8, "brick_height": 4,
                            "joint": 0.5, "waste": 5},
                 "note": "A garden wall of 8 × 4 units with ½ in joints: 181 units, 190 with waste."},
            ],
            "pitfalls": [
                "<strong>Piers and returns left out.</strong> The area formula is a flat wall; measure "
                "each face separately and add.",
                "<strong>The joint omitted.</strong> A brick-only area overstates the count by about a "
                "tenth — one of the commonest takeoff errors.",
                "<strong>Waste treated as optional.</strong> Cuts at corners, breakage and the last "
                "course eat into the order; five to ten per cent is normal.",
            ],
            "units_note": ("<p>Lengths are in feet and the brick face in inches, which is why the area is "
                           "multiplied by 144 before dividing. The two counts are whole bricks, rounded "
                           "up, because a part brick still has to be cut from a whole one.</p>"),
            "limits": [
                "<strong>One skin.</strong> A cavity wall takes two of these counts; a solid 9 in wall "
                "takes roughly one and a half.",
                "<strong>No openings.</strong> Subtract window and door areas before entering the wall "
                "area, or the count will be high.",
            ],
            "uses": [
                "<li>Ordering brick for a single-skin wall.</li>",
                "<li>Checking a subcontractor's takeoff.</li>",
                "<li>Pricing a wall by the thousand.</li>",
            ],
        },
        faq=[
            ("How many bricks are in a square foot?",
             "About 6.9 with a ⅜ inch joint on a modular brick, which rounds to 7 for estimating. The exact "
             "figure is 144 divided by the module area in square inches."),
            ("Should I add waste on top?",
             "Yes — five per cent for a straightforward wall, ten for one with many openings, corners or a "
             "patterned bond."),
        ],
        no_round_trip=['brick_length', 'brick_height', 'waste'],
        related=[("/construction/concrete-block", "Concrete block"),
                 ("/construction/mortar", "Mortar"),
                 ("/construction/wall-square-footage", "Wall square footage")],
    ),

    S(
        slug="concrete-slab",
        name="Concrete slab",
        title="Concrete Slab Calculator: Cubic Yards and Bags",
        desc="Turn a slab's length, width and thickness into cubic yards of ready-mix, and the number of 80 lb bags you would need if you mix it yourself. All shown.",
        what=("<p>Concrete is ordered by the cubic yard: <strong>volume = length × width × thickness ÷ "
              "27</strong>, with the thickness converted from inches to feet first. One 80 lb bag yields "
              "0.6 ft³, so bags follow by division.</p>"),
        fields=[
            F("length", "Slab length", "ft", 20, "The longer dimension"),
            F("width", "Slab width", "ft", 10, "The shorter dimension"),
            F("thickness", "Slab thickness", "in", 4, "Four inches for a path, five or six for a drive"),
            F("waste", "Over-order", "%", 5, "Five to ten per cent covers an uneven subgrade"),
        ],
        results=[
            R("area", "Slab area", "ft²"),
            R("volume_ft3", "Concrete volume", "ft³"),
            R("volume_yd3", "Concrete volume", "yd³"),
            R("bags_80lb", "Bags of 80 lb mix", ""),
        ],
        formula={
            "area": "length*width",
            "volume_ft3": "length*width*thickness/12*(1+waste/100)",
            "volume_yd3": "length*width*thickness/12/27*(1+waste/100)",
            "bags_80lb": "ceil(length*width*thickness/12*(1+waste/100)/0.6-0.000000001)",
            "length": "area/width",
            "width": "area/length",
            "thickness": "volume_ft3*12/(length*width*(1+waste/100))",
        },
        prose={
            "why": ("<p>A slab is the most common concrete pour there is, and the two numbers that matter "
                    "are the yardage to order and the bag count if you are mixing by hand. Getting the "
                    "thickness into the same unit as the plan dimensions is where most of the errors "
                    "happen.</p>"),
            "formula_note": ("<p>Dividing the thickness by twelve puts it in feet, so length × width × "
                             "thickness is cubic feet; dividing by 27 gives cubic yards, which is how "
                             "ready-mix is sold. An 80 lb bag of premixed concrete fills 0.6 ft³ and a "
                             "60 lb bag 0.45 ft³.</p>"),
            "example_note": ("<p>A 20 × 10 ft patio at 4 in: 200 ft², 70.0 ft³ and 2.59 yd³ with five per cent over — order 2¾ yards — or 117 bags of 80 lb mix, "
                             "which is why anyone pouring more than about a yard calls for a truck.</p>"),
            "reading": ("<p>Compare the yardage with the truck's minimum: most ready-mix suppliers charge "
                        "a short-load fee below 3 to 5 yd³, so a small slab is often cheaper bagged. Above "
                        "about 4 yd³ the truck wins on both price and consistency.</p>"),
            "scenarios": [
                {"inputs": {"length": 40, "width": 20, "thickness": 6, "waste": 10},
                 "note": "A 40 × 20 ft driveway at 6 in: 440 ft³, 16.3 yd³ with ten per cent — two trucks."},
                {"inputs": {"length": 8, "width": 4, "thickness": 4, "waste": 5},
                 "note": "A small walkway: 11.2 ft³, 0.41 yd³, or 19 bags — the case where bags make "
                         "sense."},
            ],
            "pitfalls": [
                "<strong>Thickness left in inches.</strong> Entering 4 where feet are expected gives a "
                "volume twelve times too small, and the error survives a sanity check because 2.47 yd³ "
                "looks reasonable.",
                "<strong>Subgrade not levelled.</strong> Over-excavation is why the over-order exists; "
                "five per cent on a slab on grade is not padding, it is the ruts.",
                "<strong>Bag yield confused between sizes.</strong> An 80 lb bag is 0.6 ft³ and a 60 lb "
                "bag 0.45 ft³; the two are not interchangeable.",
            ],
            "units_note": ("<p>Lengths in feet, thickness in inches, volume in cubic feet and cubic "
                           "yards. The bag count is a whole number rounded up, because a part bag cannot "
                           "be bought.</p>"),
            "limits": [
                "<strong>No reinforcement.</strong> Mesh or rebar does not change the volume, but it does "
                "change the cover you need.",
                "<strong>Flat slabs only.</strong> Footings, steps and curved shapes need their own "
                "volumes.",
            ],
            "uses": [
                "<li>Ordering ready-mix for a patio or shed base.</li>",
                "<li>Deciding between bags and a truck.</li>",
                "<li>Checking a concrete quote.</li>",
            ],
        },
        faq=[
            ("How many bags of concrete make a yard?",
             "45 bags of 80 lb mix, or 60 bags of 60 lb mix, per cubic yard. Both round up, and both "
             "assume the stated yield."),
            ("How thick should a slab be?",
             "Four inches for a footpath or patio, five to six for a driveway carrying cars, and more with "
             "a proper base and reinforcement for anything heavier."),
        ],
        no_round_trip=['waste'],
        related=[("/construction/cubic-yard", "Cubic yard"),
                 ("/construction/concrete-weight", "Concrete weight"),
                 ("/construction/rebar", "Rebar")],
    ),

    S(
        slug="concrete-block",
        name="Concrete block",
        title="Concrete Block Calculator: Blocks and Courses",
        desc="Count the concrete blocks a wall needs from its area and the block's nominal size, with the courses it works out to and the waste to order on top of it.",
        what=("<p>A concrete block wall takes one block per <strong>nominal face area</strong> — the block "
              "plus its mortar joint. A standard 8 × 16 in block with a ⅜ joint modules to 8⅜ × 16⅜, so a "
              "square foot holds about 1.1 blocks.</p>"),
        fields=[
            F("wall_length", "Wall length", "ft", 24, "Along the face"),
            F("wall_height", "Wall height", "ft", 8, "Bottom of the first course to the top"),
            F("block_length", "Nominal block length", "in", 16, "16 in for a standard block"),
            F("block_height", "Nominal block height", "in", 8, "8 in for a standard block"),
            F("joint", "Mortar joint", "in", 0.375, "⅜ in is standard"),
            F("waste", "Wastage", "%", 5, "Corner cuts and breakage"),
        ],
        results=[
            R("wall_area", "Wall area", "ft²"),
            R("blocks", "Blocks, no waste", ""),
            R("blocks_with_waste", "Blocks to order", ""),
            R("courses", "Courses high", ""),
        ],
        formula={
            "wall_area": "wall_length*wall_height",
            "blocks": "ceil(wall_length*wall_height*144/((block_length+joint)*(block_height+joint))-0.000000001)",
            "blocks_with_waste": "ceil(wall_length*wall_height*144/((block_length+joint)*(block_height+joint))*(1+waste/100)-0.000000001)",
            "courses": "ceil(wall_height*12/(block_height+joint)-0.000000001)",
            "wall_length": "wall_area/wall_height",
            "wall_height": "wall_area/wall_length",
        },
        prose={
            "why": ("<p>Block is faster than brick — bigger units, fewer joints — and the count is the "
                    "first thing a masonry quote depends on. The nominal size already includes the joint, "
                    "which is what makes the arithmetic simple and is also the thing people get wrong.</p>"),
            "formula_note": ("<p>Nominal sizes (8 × 16 in) already allow for the mortar joint, so the joint "
                             "box should be left at zero if you enter nominal dimensions. It is there for "
                             "the other convention: actual 7⅝ × 15⅝ blocks, where the joint has to be "
                             "added back.</p>"),
            "example_note": ("<p>A 24 ft by 8 ft wall is 192 ft². With 16 × 8 nominal blocks and a "
                             "⅜ joint the module is 16.375 × 8.375, so the wall takes 202 blocks, 212 with five per cent waste, and the courses come out at 12 high.</p>"),
            "reading": ("<p>Read the course count against the wall height: a wall that ends mid-course "
                        "needs a cut course, and that is where the waste allowance goes. A count per "
                        "square foot near 1.1 is right for a standard block.</p>"),
            "scenarios": [
                {"inputs": {"wall_length": 40, "wall_height": 10, "block_length": 16, "block_height": 8,
                            "joint": 0.375, "waste": 10},
                 "note": "A 40 × 10 ft wall: 421 blocks, 463 to order, 15 courses high."},
                {"inputs": {"wall_length": 12, "wall_height": 4, "block_length": 16, "block_height": 8,
                            "joint": 0.375, "waste": 5},
                 "note": "A low garden wall: 51 blocks, 53 with waste, six courses."},
            ],
            "pitfalls": [
                "<strong>Nominal and actual mixed.</strong> Using actual 7⅝ × 15⅝ with a zero joint "
                "undercounts; the two conventions have to match.",
                "<strong>Openings not deducted.</strong> A doorway is a block-wide gap, not a rounding "
                "error.",
                "<strong>Course height confused with block height.</strong> Twelve courses of 8 in block "
                "plus joints reach 8 ft 4½ in, not 8 ft.",
            ],
            "units_note": ("<p>Wall dimensions in feet, block size and joint in inches. The area is "
                           "converted to square inches by the factor of 144, and every count is rounded "
                           "up to whole blocks.</p>"),
            "limits": [
                "<strong>Single skin.</strong> A reinforced or grouted wall may be double the count.",
                "<strong>No bond pattern.</strong> Running bond is assumed; stack bond and decorative "
                "patterns waste more.",
            ],
            "uses": [
                "<li>Ordering block for a single-skin wall.</li>",
                "<li>Estimating courses for a wall of fixed height.</li>",
                "<li>Pricing masonry labour by the block.</li>",
            ],
        },
        faq=[
            ("How many blocks are in a square foot?",
             "About 1.1 for a standard 8 × 16 in block including the joint, which is why a 100 ft² wall "
             "takes roughly 110 blocks."),
            ("What is the difference between nominal and actual block size?",
             "Nominal (8 × 16) includes the mortar joint; actual (7⅝ × 15⅝) is the moulded block. Enter "
             "whichever your supplier quotes, and set the joint to match."),
        ],
        no_round_trip=['block_length', 'block_height', 'waste'],
        related=[("/construction/concrete-block-fill", "Block fill"),
                 ("/construction/brick", "Brick"),
                 ("/construction/mortar", "Mortar")],
    ),

    S(
        slug="concrete-block-fill",
        name="Concrete block fill",
        title="Concrete Block Fill Calculator: Grout Volume",
        desc="Work out the grout a block wall needs from the number of blocks and the core each one holds, and how many 80 lb bags of grout mix that comes to in total.",
        what=("<p>Grout fills the cores of hollow block. With a core volume of <strong>c</strong> cubic "
              "inches per block, a wall of <strong>n</strong> blocks holds <strong>n·c ÷ 46656</strong> "
              "cubic yards before any waste.</p>"),
        fields=[
            F("blocks", "Number of blocks", "", 200, "From the block count for the wall"),
            F("core_volume", "Core volume per block", "in³", 400, "About 400 in³ for a standard 8 in block"),
            F("waste", "Wastage", "%", 10, "Grout spills and overfill"),
        ],
        results=[
            R("grout_ft3", "Grout volume", "ft³"),
            R("grout_yd3", "Grout volume", "yd³"),
            R("bags_80lb", "Bags of grout mix (80 lb)", ""),
        ],
        formula={
            "grout_ft3": "blocks*core_volume/1728",
            "grout_yd3": "blocks*core_volume/46656*(1+waste/100)",
            "bags_80lb": "ceil(blocks*core_volume/1728*(1+waste/100)/0.45-0.000000001)",
            "blocks": "grout_ft3*1728/core_volume",
            "core_volume": "grout_ft3*1728/blocks",
            "waste": "(grout_yd3/(blocks*core_volume/46656)-1)*100",
        },
        prose={
            "why": ("<p>A reinforced block wall is grouted solid, and the grout is ordered by the yard "
                    "like concrete. Counting it from the cores is far more reliable than guessing a depth "
                    "of fill across the wall's face.</p>"),
            "formula_note": ("<p>There are 1 728 cubic inches in a cubic foot and 46 656 in a cubic yard. "
                             "An 80 lb bag of grout mix yields about 0.45 ft³, less than concrete because "
                             "the mix is leaner and flows into the cores.</p>"),
            "example_note": ("<p>Two hundred 8 in blocks with 400 in³ cores hold 80 000 in³, which is 46.3 "
                             "ft³ or 1.71 yd³. With ten per cent waste that is 1.89 yd³, or 114 bags if "
                             "you are mixing it yourself.</p>"),
            "reading": ("<p>Compare the yardage with the wall's own volume: solid grout in an 8 in wall "
                        "comes to about two thirds of the wall's gross volume, because the webs stay "
                        "unfilled. A figure far above that means the core volume is too high.</p>"),
            "scenarios": [
                {"inputs": {"blocks": 450, "core_volume": 500, "waste": 15},
                 "note": "A 12 in block wall: 130 ft³, 4.8 yd³ before waste, 5.5 with fifteen per cent."},
                {"inputs": {"blocks": 60, "core_volume": 400, "waste": 10},
                 "note": "A short pier run: 13.9 ft³ and 0.51 yd³ — a bag job, not a truck."},
            ],
            "pitfalls": [
                "<strong>Every block assumed grouted.</strong> Only cells with rebar, and the ones a "
                "specification names, are filled; counting all of them can double the order.",
                "<strong>Core volume guessed from the face size.</strong> The core is smaller and varies "
                "with block thickness and web design.",
                "<strong>Grout treated as concrete.</strong> Grout has a lower yield per bag and a "
                "different slump; the bag count is not interchangeable.",
            ],
            "units_note": ("<p>Core volumes in cubic inches, results in cubic feet and cubic yards. The "
                           "block count is a whole number; the grout volume carries the waste percentage "
                           "and the bag count rounds up.</p>"),
            "limits": [
                "<strong>Straight walls.</strong> Bond beams and lintels take additional grout the block "
                "count does not include.",
                "<strong>A single block size.</strong> Mixed block sizes need the count split by type.",
            ],
            "uses": [
                "<li>Ordering grout for a reinforced wall.</li>",
                "<li>Estimating bags for a small pier.</li>",
                "<li>Checking a masonry quote's grout line.</li>",
            ],
        },
        faq=[
            ("How much grout does a block wall take?",
             "Roughly two thirds of the wall's gross volume when every core is filled, or a little over "
             "half a cubic yard per hundred 8 in blocks."),
            ("Does every core need grouting?",
             "No — only cores with reinforcement and those a specification calls out. Filling all of them "
             "is common for basement walls but not for every wall."),
        ],
        related=[("/construction/concrete-block", "Concrete block"),
                 ("/construction/grout", "Grout"),
                 ("/construction/rebar", "Rebar")],
    ),

    S(
        slug="concrete-column",
        name="Concrete column",
        title="Concrete Column Calculator: Round Column Volume",
        desc="Get the concrete a round column needs from its diameter and height, plus the bag count and the form area the pour will take to build on the site. All shown.",
        what=("<p>A round column is a cylinder: <strong>volume = π·r²·h</strong>. With the diameter in "
              "inches and the height in feet, that is <strong>π·(d/24)²·h</strong> cubic feet, then "
              "divided by 27 for yards.</p>"),
        fields=[
            F("diameter", "Column diameter", "in", 12, "Inside the form"),
            F("height", "Column height", "ft", 10, "From footing top to the underside of the beam"),
            F("count", "Number of columns", "", 4, "Columns in the run"),
            F("waste", "Over-order", "%", 5, "Spillage and an uneven footing"),
        ],
        results=[
            R("volume_each", "Volume per column", "ft³"),
            R("volume_total", "Volume, all columns", "yd³"),
            R("bags_80lb", "Bags of 80 lb mix", ""),
            R("form_area", "Form area", "ft²"),
        ],
        formula={
            "volume_each": "pi*pow(diameter/24,2)*height",
            "volume_total": "pi*pow(diameter/24,2)*height*count*(1+waste/100)/27",
            "bags_80lb": "ceil(pi*pow(diameter/24,2)*height*count*(1+waste/100)/0.6-0.000000001)",
            "form_area": "pi*diameter/12*height*count",
            "diameter": "24*sqrt(volume_each/(pi*height))",
            "height": "volume_each/(pi*pow(diameter/24,2))",
            "count": "volume_total*27/(pi*pow(diameter/24,2)*height*(1+waste/100))",
            "waste": "(volume_total*27/(pi*pow(diameter/24,2)*height*count)-1)*100",
        },
        prose={
            "why": ("<p>Columns are usually a small part of a pour but a large part of the formwork, and "
                    "getting the volume right decides whether the truck comes once or twice. The form area "
                    "is what the tube or the plywood costs.</p>"),
            "formula_note": ("<p>The diameter is halved for the radius and divided by twelve for feet in "
                             "one step — hence the 24 in the denominator. The form's lateral area is the "
                             "circumference times the height, which is what you wrap around the column.</p>"),
            "example_note": ("<p>Four 12 in columns 10 ft tall: each holds π × 0.25 × 10 = 7.85 ft³, so "
                             "the run is 31.4 ft³, 1.22 yd³ with five per cent — or 55 bags. The forms "
                             "take π × 1 × 10 = 31.4 ft² each of wrapping.</p>"),
            "reading": ("<p>A 12 in column holding about 0.785 ft³ per foot of height is a useful check: "
                        "the area is 0.785 ft², and everything scales from there. Double the diameter and "
                        "the volume quadruples.</p>"),
            "scenarios": [
                {"inputs": {"diameter": 18, "height": 12, "count": 6, "waste": 10},
                 "note": "Six 18 in columns 12 ft high: 21.2 ft³ each, 5.18 yd³ to order, 234 bags."},
                {"inputs": {"diameter": 8, "height": 8, "count": 2, "waste": 5},
                 "note": "Two porch posts: 2.8 ft³ each, 0.22 yd³ in total, ten bags."},
            ],
            "pitfalls": [
                "<strong>Diameter entered as radius.</strong> The formula does the halving; putting in "
                "the radius makes the volume four times too large.",
                "<strong>Footing depth forgotten.</strong> The column volume stops at the footing, and "
                "the footing is a separate pour.",
                "<strong>Bags assumed for a yard.</strong> 45 bags of 80 lb mix make a yard, and columns "
                "with deep formwork spill more than a slab.",
            ],
            "units_note": ("<p>Diameter in inches and height in feet, with the 24 converting both; "
                           "volumes come out in cubic feet and cubic yards, and the form area in square "
                           "feet because the circumference is converted to feet as well.</p>"),
            "limits": [
                "<strong>Straight cylinders.</strong> Tapered and fluted columns need their own geometry.",
                "<strong>No reinforcement volume.</strong> Rebar displaces a little concrete; the "
                "over-order covers it.",
            ],
            "uses": [
                "<li>Ordering concrete for a column run.</li>",
                "<li>Buying form tubes by area.</li>",
                "<li>Checking whether a pour is a bag job.</li>",
            ],
        },
        faq=[
            ("How much concrete is in a 12 inch column?",
             "About 0.785 ft³ per foot of height, so a 10 ft column is 7.85 ft³ — a little under a third "
             "of a cubic yard."),
            ("Do I need to subtract the rebar?",
             "No. The displacement is small and the over-order covers it; subtracting it would leave you "
             "short."),
        ],
        related=[("/construction/concrete-tube", "Concrete tube"),
                 ("/construction/sonotube", "Sonotube"),
                 ("/construction/concrete-weight", "Concrete weight")],
    ),

    S(
        slug="concrete-cylinder",
        name="Concrete cylinder",
        title="Concrete Cylinder Calculator: Test Specimens",
        desc="Work out the volume and weight of concrete test cylinders, and how many specimens a pour's sampling schedule will actually need at each test age. All shown.",
        what=("<p>A test cylinder is 6 in across and 12 in tall in US practice, which is 0.196 ft³ or "
              "0.00727 yd³ each. <strong>Volume = π·(d/24)²·h</strong>, and the specimens scale with the "
              "pour's volume.</p>"),
        fields=[
            F("diameter", "Cylinder diameter", "in", 6, "6 in for standard US specimens"),
            F("height", "Cylinder height", "in", 12, "12 in, twice the diameter"),
            F("count", "Number of cylinders", "", 3, "Three is the usual set: 7, 14 and 28 day"),
            F("density", "Concrete density", "lb/ft³", 150, "150 for normal-weight concrete"),
        ],
        results=[
            R("volume_each", "Volume per cylinder", "ft³"),
            R("volume_total", "Volume of all cylinders", "ft³"),
            R("weight_each", "Weight per cylinder", "lb"),
            R("weight_total", "Weight of all cylinders", "lb"),
        ],
        formula={
            "volume_each": "pi*pow(diameter/24,2)*height/12",
            "volume_total": "pi*pow(diameter/24,2)*height/12*count",
            "weight_each": "pi*pow(diameter/24,2)*height/12*density",
            "weight_total": "pi*pow(diameter/24,2)*height/12*count*density",
            "diameter": "24*sqrt(volume_each/(pi*height/12))",
            "height": "volume_each*12/(pi*pow(diameter/24,2))",
            "count": "volume_total/(pi*pow(diameter/24,2)*height/12)",
            "density": "weight_each/(pi*pow(diameter/24,2)*height/12)",
        },
        prose={
            "why": ("<p>Cylinders are how a pour proves its strength. The set size and the volume behind it "
                    "matter to the testing lab, to the sample's cure weight, and to whether the pour's "
                    "sampling plan is being met.</p>"),
            "formula_note": ("<p>The height is divided by twelve as well, so both dimensions are in feet "
                             "before multiplying. A 6 × 12 cylinder is 0.196 ft³; the strength test is on "
                             "the cross-section, 28.3 in², and the volume only matters for the mix and "
                             "the weight.</p>"),
            "example_note": ("<p>Three 6 × 12 cylinders: 0.196 ft³ each, 0.589 ft³ in total, and at 150 "
                             "lb/ft³ each weighs 29.4 lb — 88 lb of samples to carry, cure and break.</p>"),
            "reading": ("<p>A set of three at 7, 14 and 28 days is the minimum for a standard "
                        "specification; six cylinders, two per age, is what most specifications ask for "
                        "on a structural pour so a break can fail without losing the age.</p>"),
            "scenarios": [
                {"inputs": {"diameter": 4, "height": 8, "count": 6, "density": 150},
                 "note": "Small 4 × 8 specimens: 0.0582 ft³ each, 8.7 lb, six for 52 lb."},
                {"inputs": {"diameter": 6, "height": 12, "count": 12, "density": 145},
                 "note": "Twelve cylinders from a large pour at 145 lb/ft³: 2.35 ft³ and 341 lb of "
                         "samples."},
            ],
            "pitfalls": [
                "<strong>The height left in inches.</strong> The 12 in the denominator is easy to drop, "
                "and a cylinder twelve times too heavy is the result.",
                "<strong>Weight taken as the test load.</strong> The break load is force over area; the "
                "weight is only handling.",
                "<strong>Density assumed for heavyweight mixes.</strong> 150 lb/ft³ is normal weight; "
                "heavyweight aggregate runs to 180 or more.",
            ],
            "units_note": ("<p>Diameter and height are both entered in inches and converted inside, so the "
                           "volume is in cubic feet and the weight in pounds at the density you give.</p>"),
            "limits": [
                "<strong>Geometry only.</strong> Compaction, curing and the mould's condition are what "
                "actually decide the break.",
                "<strong>One size.</strong> A pour tested with both 4 × 8 and 6 × 12 specimens needs two "
                "calculations.",
            ],
            "uses": [
                "<li>Sizing a cylinder set for a pour.</li>",
                "<li>Estimating sample weight for transport.</li>",
                "<li>Checking a lab's sampling quantity.</li>",
            ],
        },
        faq=[
            ("Why are cylinders twice as tall as they are wide?",
             "So the failure plane in compression is not influenced by the platens. The 2:1 ratio is what "
             "makes the measured strength comparable between labs."),
            ("How many cylinders should a pour have?",
             "At least three per sample, for 7, 14 and 28 day breaks, and six where the specification "
             "wants a spare at each age."),
        ],
        related=[("/construction/concrete-slab", "Concrete slab"),
                 ("/construction/concrete-weight", "Concrete weight"),
                 ("/construction/concrete-tube", "Concrete tube")],
    ),

    S(
        slug="concrete-stairs",
        name="Concrete stairs",
        title="Concrete Stairs Calculator: Steps and Volume",
        desc="Work out the concrete a flight of steps takes, from the rise, the tread, the waist slab under it and the landing, in cubic feet, yards and bags.",
        what=("<p>A cast flight is three volumes: the <strong>step wedges</strong>, the <strong>sloped "
              "waist slab</strong> under them, and the <strong>landing</strong>. The waist is usually the "
              "largest part of the pour and the part most estimates forget.</p>"),
        fields=[
            F("steps", "Number of steps", "", 6, "Risers in the flight"),
            F("rise", "Riser height", "in", 7, "4 to 7¾ in by code"),
            F("run", "Tread depth", "in", 11, "10 in minimum, 11 is comfortable"),
            F("width", "Stair width", "ft", 3.5, "Clear width between walls"),
            F("landing", "Top landing depth", "ft", 4, "Zero for a flight that ends at a door"),
            F("waist", "Waist slab thickness", "in", 6, "The sloped slab under the steps"),
            F("waste", "Over-order", "%", 10, "Spillage and an uneven subgrade"),
        ],
        results=[
            R("total_rise", "Total rise", "in"),
            R("footprint", "Footprint", "ft²"),
            R("flight_length", "Sloped length", "ft"),
            R("volume_ft3", "Concrete volume", "ft³"),
            R("volume_yd3", "Concrete volume", "yd³"),
            R("bags_80lb", "Bags of 80 lb", ""),
        ],
        formula={
            "total_rise": "steps*rise",
            "footprint": "steps*run/12*width",
            "flight_length": "sqrt(pow(steps*run/12,2)+pow(steps*rise/12,2))",
            "volume_ft3": "(steps*(rise/24)*(run/12)*width+(sqrt(pow(steps*run/12,2)+pow(steps*rise/12,2))+landing)*width*waist/12)*(1+waste/100)",
            "volume_yd3": "volume_ft3/27",
            "bags_80lb": "ceil(volume_ft3/0.6-0.000000001)",
        },
        prose={
            "why": ("<p>A stair pour is the one place in domestic concrete work where the geometry is "
                    "genuinely three-dimensional: every step is a wedge on a sloping slab, and the volume "
                    "is neither the footprint times a thickness nor a plain box. The waist slab is what "
                    "carries the flight, and it is usually bigger than all the wedges added together.</p>"),
            "formula_note": ("<p>Each step contributes half a riser over its tread — the wedge between "
                             "the nosing line and the tread — and the riser is converted to feet as the "
                             "wedges are summed. The waist is a slab of the entered thickness over the "
                             "sloped length of the flight plus the landing, and that length comes from "
                             "Pythagoras on the total run and the total rise.</p>"),
            "example_note": ("<p>Six steps of 7 in rise and 11 in tread, 3.5 ft wide, with a 6 in waist "
                             "and a 4 ft landing: the flight rises 42 in, covers 19.3 ft² and runs 6.52 ft "
                             "along the slope. The wedges take 5.6 ft³ and the waist and landing 20.8, so "
                             "the pour is 26.4 ft³ with ten per cent — 0.98 yd³, or 45 bags.</p>"),
            "reading": ("<p>Check the riser against the code: between 4 and 7¾ in, with every riser in "
                        "the flight equal to within ⅜ in. The tread should be at least 10 in, and one "
                        "riser plus one tread is usually kept near 17½ in. The waist is a structural "
                        "decision: 6 in for a garden flight, 8 in where the flight spans or carries a "
                        "wall.</p>"),
            "scenarios": [
                {"inputs": {"steps": 14, "rise": 7.5, "run": 10, "width": 4, "landing": 4, "waist": 8,
                            "waste": 10},
                 "note": "A full storey: 105 in of rise, 46.7 ft² of footprint and 2.61 yd³ — 118 bags, "
                         "which is a truck rather than a mixer."},
                {"inputs": {"steps": 3, "rise": 6, "run": 12, "width": 5, "landing": 0, "waist": 6,
                            "waste": 10},
                 "note": "Three entry steps: 18 in of rise, 0.49 yd³ and 23 bags — an easy morning's "
                         "mixing."},
            ],
            "pitfalls": [
                "<strong>The waist slab forgotten.</strong> The wedges alone are about a fifth of the "
                "pour; a flight formed without its waist is a flight with no slab under it.",
                "<strong>Riser and tread swapped.</strong> The rise is vertical and the run horizontal, "
                "and swapping them changes both the geometry and the volume.",
                "<strong>Riser heights not equal.</strong> A first riser measured from an uneven slab "
                "throws every step out; set out from the finished floor.",
            ],
            "units_note": ("<p>Riser, tread and waist in inches, width and landing in feet, volume in "
                           "cubic feet and cubic yards, and the bag count in 80 lb bags of premixed "
                           "concrete at 0.6 ft³ each.</p>"),
            "limits": [
                "<strong>A straight flight.</strong> Winder and curved stairs need their own geometry.",
                "<strong>No footing or side walls.</strong> Both are separate pours with their own "
                "reinforcement.",
            ],
            "uses": [
                "<li>Ordering concrete for an entry flight.</li>",
                "<li>Sizing a bag mix for a garden stair.</li>",
                "<li>Checking a waist thickness against the pour.</li>",
            ],
        },
        faq=[
            ("How thick should a concrete stair waist be?",
             "Six inches for a short garden flight, eight where the flight spans or carries a wall."),
            ("How much concrete do three steps take?",
             "About half a cubic yard with a six-inch waist and no landing — 23 bags of 80 lb mix."),
        ],
        no_round_trip=["steps", "rise", "run", "width", "landing", "waist", "waste"],
        related=[("/construction/concrete-slab", "Concrete slab"),
                 ("/construction/concrete-stair", "Concrete stair"),
                 ("/construction/concrete-weight", "Concrete weight")],
    ),
]
