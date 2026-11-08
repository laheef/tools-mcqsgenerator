"""Batch 2a — lumber, plywood and beams."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="lumber",
        name="Lumber",
        title="Lumber Calculator: Board Feet, Volume and Cost",
        desc="Work out the board feet, cubic feet, linear feet and cost of a stack of lumber from the size of each piece and how many of them you have. before you order.",
        what=("<p>Lumber is sold three ways at once: by the piece, by the foot and by the board foot. "
              "<strong>Board feet = length × width × thickness ÷ 12</strong>, with the length in feet and "
              "the section in inches.</p>"),
        fields=[
            F("length", "Length of a piece", "ft", 8, "Stock length, end to end"),
            F("width", "Width", "in", 6, "Nominal or actual — be consistent"),
            F("thickness", "Thickness", "in", 2, "2 for a nominal 2 in"),
            F("quantity", "Pieces", "", 10, "How many of this size"),
            F("price", "Price", "$/bf", 3.5, "Board-foot price, or a piece price converted"),
        ],
        results=[
            R("volume_piece", "Volume of one piece", "ft³"),
            R("total_volume", "Total volume", "ft³"),
            R("board_feet", "Board feet", "bf"),
            R("total_length", "Total length", "ft"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "volume_piece": "length*width*thickness/144",
            "total_volume": "length*width*thickness/144*quantity",
            "board_feet": "length*width*thickness/12*quantity",
            "total_length": "length*quantity",
            "cost": "length*width*thickness/12*quantity*price",
            "length": "total_length/quantity",
            "quantity": "total_length/length",
            "width": "144*volume_piece/(length*thickness)",
            "thickness": "144*volume_piece/(length*width)",
            "price": "cost/board_feet",
        },
        prose={
            "why": ("<p>A lumber quote is rarely in the unit you built the takeoff in. The yard prices by "
                    "the board foot and delivers by the piece; the truck is loaded by the yard of volume "
                    "and the job is planned in linear feet. Getting from one to the others without losing "
                    "a factor of twelve is the whole exercise.</p>"),
            "formula_note": ("<p>The 12 in the board-foot formula is not a conversion between units the way "
                             "the 144 is: a board foot is a volume of 144 cubic inches, one square foot an "
                             "inch thick, so board feet are cubic inches divided by 144 and then multiplied "
                             "by twelve. Writing it as length × width × thickness ÷ 12 with the length in "
                             "feet is the same arithmetic in the form carpenters use.</p>"),
            "example_note": ("<p>Ten pieces of 2 × 6 in 8 ft lengths: each is 8 × 6 × 2 ÷ 12 = 8 board feet, "
                             "so the stack is 80 board feet and 6.67 ft³ of timber. At $3.50 a board foot "
                             "that is $280, which is the number to compare against a per-piece price.</p>"),
            "reading": ("<p>Read the board-foot total against the volume: twelve board feet make a cubic foot, so 80 board feet is 6.67 ft³ and the two boxes agree. They only diverge when the section is entered one way and the price is quoted on another — a nominal 2 × 6 is dressed to 1½ × 5½, and the board-foot price is set on the size the yard actually ships.</p>"),
            "scenarios": [
                {"inputs": {"length": 12, "width": 4, "thickness": 1, "quantity": 40, "price": 2.4},
                 "note": "A run of 1 × 4 trim: a small stack that prices by the foot far more often than "
                         "by the board foot."},
                {"inputs": {"length": 16, "width": 11.25, "thickness": 1.75, "quantity": 6, "price": 4.8},
                 "note": "Six 2 × 12 joists in 16 ft lengths — the case where the yard will quote per "
                         "piece and the invoice will show board feet."},
            ],
            "pitfalls": [
                "<strong>Nominal and actual mixed.</strong> A 2 × 6 is 1½ × 5½ dressed; using nominal "
                "width for volume and actual for board feet gives two answers for one stack.",
                "<strong>Thickness in quarters ignored.</strong> Rough hardwood is priced in quarter "
                "inches — 8/4 is 2 in — and the board-foot figure depends on it.",
                "<strong>Length left in inches.</strong> The formula divides by 12 once; a length in "
                "inches makes the answer twelve times too large.",
            ],
            "units_note": ("<p>Length in feet, width and thickness in inches, volume in cubic feet, board "
                           "feet as the trade unit — 144 cubic inches — and cost in dollars at the price per "
                           "board foot.</p>"),
            "limits": [
                "<strong>Rectangular stock only.</strong> Mouldings and rounds are priced by the linear "
                "foot.",
                "<strong>One size per line.</strong> A mixed order needs a line per size.",
            ],
            "uses": [
                "<li>Checking a yard's board-foot price against a piece price.</li>",
                "<li>Sizing a stack for collection.</li>",
                "<li>Converting a cut list into an order.</li>",
            ],
        },
        faq=[
            ("How many board feet are in a 2 × 4 × 8?",
             "5⅓ board feet nominal: 8 × 4 × 2 ÷ 12. Priced on actual 1½ × 3½ it is 3½."),
            ("Is a board foot the same as a cubic foot?",
             "No. A board foot is 144 cubic inches, so there are twelve board feet in a cubic foot."),
        ],
        no_round_trip=["quantity"],
        related=[("/construction/board-foot", "Board foot"),
                 ("/construction/lumber-weight", "Lumber weight"),
                 ("/construction/plywood", "Plywood")],
    ),

    S(
        slug="board-foot",
        name="Board foot",
        title="Board Foot Calculator: Lumber Pricing by Volume",
        desc="Turn width, thickness, length and a piece count into board feet and a price, the way a lumber yard quotes hardwood, dressed stock and trim. per board foot.",
        what=("<p>A board foot is 144 cubic inches — a foot square and an inch thick. "
              "<strong>bf = length(ft) × width(in) × thickness(in) ÷ 12</strong> per piece, times the "
              "number of pieces.</p>"),
        fields=[
            F("width", "Width", "in", 6, "Actual width of the dressed board"),
            F("thickness", "Thickness", "in", 2, "In inches, or quarters divided by four"),
            F("length", "Length", "ft", 8, "End to end"),
            F("pieces", "Pieces", "", 10, "The same size and length"),
            F("price", "Price", "$/bf", 4, "Board-foot price before tax"),
        ],
        results=[
            R("board_feet", "Board feet", "bf"),
            R("volume_ft3", "Volume", "ft³"),
            R("total_length", "Total length", "ft"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "board_feet": "width*thickness*length/12*pieces",
            "volume_ft3": "width*thickness*length/144*pieces",
            "total_length": "length*pieces",
            "cost": "width*thickness*length/12*pieces*price",
            "width": "12*board_feet/(thickness*length*pieces)",
            "thickness": "12*board_feet/(width*length*pieces)",
            "length": "total_length/pieces",
            "pieces": "total_length/length",
            "price": "cost/board_feet",
        },
        prose={
            "why": ("<p>Hardwood, and most dressed softwood above a certain grade, is priced by the board "
                    "foot rather than by the piece. It is a volume unit dressed up as a length unit, which "
                    "is why the arithmetic trips people up: a long thin board and a short thick one can be "
                    "the same money.</p>"),
            "formula_note": ("<p>Dividing by twelve converts the inch dimensions into feet-thicknesses once. "
                             "The equivalent route — cubic inches divided by 144, then multiplied by twelve "
                             "— gives exactly the same number, and is worth doing in your head as a check "
                             "when a quote looks wrong.</p>"),
            "example_note": ("<p>Ten boards 6 in wide, 2 in thick and 8 ft long come to 80 board feet and "
                             "6.67 ft³. At $4 a board foot the stack is $320, and the per-piece price the "
                             "yard might quote instead is $32.</p>"),
            "reading": ("<p>Read the board feet against the volume: this pair of results is a direct check, "
                        "because twelve board feet make a cubic foot. If the two disagree by anything other "
                        "than a factor of twelve, a dimension is in the wrong unit.</p>"),
            "scenarios": [
                {"inputs": {"width": 5.5, "thickness": 1.5, "length": 10, "pieces": 24, "price": 3.2},
                 "note": "A stack of dressed 2 × 6 in ten-foot lengths, priced the way a yard quotes it."},
                {"inputs": {"width": 7.25, "thickness": 1.75, "length": 16, "pieces": 40, "price": 5.1},
                 "note": "Forty 2 × 8 joists: a bigger stack where the board-foot price decides the "
                         "supplier."},
            ],
            "pitfalls": [
                "<strong>Quarters read as inches.</strong> 4/4 stock is one inch thick, not four.",
                "<strong>Length typed in inches.</strong> A 96 where 8 belongs multiplies the price by "
                "twelve.",
                "<strong>Board feet used for sheet goods.</strong> Plywood is sold by the sheet, not by "
                "the board foot.",
            ],
            "units_note": ("<p>Width and thickness in inches, length in feet, area-independent volume in "
                           "cubic feet, and the board-foot count in the trade unit of 144 in³.</p>"),
            "limits": [
                "<strong>Rectangular sections.</strong> A moulded profile is priced by its own rules.",
                "<strong>No grade or species.</strong> Both change the price per board foot, not the "
                "count.",
            ],
            "uses": [
                "<li>Pricing hardwood by the board foot.</li>",
                "<li>Comparing a piece price with a board-foot price.</li>",
                "<li>Checking a yard's invoice.</li>",
            ],
        },
        faq=[
            ("How do you calculate board feet?",
             "Multiply length in feet by width in inches by thickness in inches and divide by twelve; "
             "multiply by the number of pieces."),
            ("How many board feet is a 1 × 6 × 8?",
             "Four board feet: 8 × 6 × 1 ÷ 12."),
        ],
        related=[("/construction/lumber", "Lumber"),
                 ("/construction/lumber-weight", "Lumber weight"),
                 ("/construction/plywood", "Plywood")],
    ),

    S(
        slug="lumber-weight",
        name="Lumber weight",
        title="Lumber Weight Calculator: Pounds per Piece and Load",
        desc="Work out what a stack of lumber weighs from the actual section, the length, the piece count and the species density, in pounds and kilograms. before you load.",
        what=("<p>Lumber weight is volume times density: <strong>weight = length × width × thickness ÷ 144 × "
              "pieces × density</strong>, with density in pounds per cubic foot — about 32 for softwood, "
              "45 for oak.</p>"),
        fields=[
            F("width", "Width", "in", 6, "Actual dressed width"),
            F("thickness", "Thickness", "in", 2, "Actual dressed thickness"),
            F("length", "Length", "ft", 8, "End to end"),
            F("pieces", "Pieces", "", 10, "How many"),
            F("density", "Density", "lb/ft³", 32, "32 softwood, 45 oak, 50 hickory"),
        ],
        results=[
            R("volume_piece", "Volume of one piece", "ft³"),
            R("weight_piece", "Weight of one piece", "lb"),
            R("weight_total", "Total weight", "lb"),
            R("weight_kg", "Total weight", "kg"),
        ],
        formula={
            "volume_piece": "length*width*thickness/144",
            "weight_piece": "length*width*thickness/144*density",
            "weight_total": "length*width*thickness/144*pieces*density",
            "weight_kg": "length*width*thickness/144*pieces*density/2.20462",
            "length": "144*volume_piece/(width*thickness)",
            "width": "144*volume_piece/(length*thickness)",
            "thickness": "144*volume_piece/(length*width)",
            "pieces": "weight_total/weight_piece",
        },
        prose={
            "why": ("<p>Weight decides the trailer, the roof rack and the pair of hands at the other end of "
                    "a 16 ft joist. Lumber is lighter than concrete by a long way, but a stack of it is not "
                    "light: a 2 × 10 in 16 ft lengths runs about 40 lb a piece in the common softwoods.</p>"),
            "formula_note": ("<p>The 144 converts the inch section and the foot length into cubic feet, and "
                             "the density in pounds per cubic foot finishes the job. Density is the only "
                             "term that changes with species, so it is the one to look up rather than "
                             "guess.</p>"),
            "example_note": ("<p>Ten 2 × 6 in 8 ft lengths at 32 lb/ft³: each is 0.67 ft³ and weighs 21 lb, "
                             "so the stack is 213 lb — a trailer rather than a car boot. The same stack in "
                             "oak is heavier again.</p>"),
            "reading": ("<p>Read the per-piece weight as the handling question and the total as the "
                        "transport question. Thirty-five pounds is about the ceiling for one person on a "
                        "ladder; anything above that is a two-person lift, whatever the total says.</p>"),
            "scenarios": [
                {"inputs": {"width": 9.25, "thickness": 1.5, "length": 16, "pieces": 20, "density": 32},
                 "note": "Twenty 2 × 10 joists — the load that decides whether the trailer is big enough."},
                {"inputs": {"width": 3.5, "thickness": 1.5, "length": 8, "pieces": 100, "density": 45},
                 "note": "A hundred studs in a dense hardwood, the sort of order that arrives on a pallet "
                         "and gets weighed."},
            ],
            "pitfalls": [
                "<strong>Nominal size weighed.</strong> A 2 × 6 is 1½ × 5½; weighing the nominal section "
                "overstates the load by about a quarter.",
                "<strong>Green timber read as dry.</strong> Fresh softwood can weigh half as much again as "
                "kiln-dried.",
                "<strong>Density guessed.</strong> Species run from about 20 to over 60 lb/ft³, so the box "
                "matters more than the measurements.",
            ],
            "units_note": ("<p>Width and thickness in inches, length in feet, volume in cubic feet, weight in "
                           "pounds and kilograms at the density you enter.</p>"),
            "limits": [
                "<strong>Solid stock.</strong> Engineered lumber has its own published weights.",
                "<strong>Moisture content unmodelled.</strong> Dry density is assumed.",
            ],
            "uses": [
                "<li>Checking a trailer's capacity.</li>",
                "<li>Planning a two-person lift.</li>",
                "<li>Estimating freight.</li>",
            ],
        },
        faq=[
            ("How much does a 2 × 4 × 8 weigh?",
             "About 10 lb in kiln-dried spruce at 1½ × 3½ in, and nearer 13 lb in a denser species."),
            ("How heavy is a cubic foot of lumber?",
             "Between about 20 and 60 lb depending on species and moisture; 32 lb is a fair softwood "
             "figure."),
        ],
        related=[("/construction/lumber", "Lumber"),
                 ("/construction/board-foot", "Board foot"),
                 ("/construction/wood-beam-span", "Wood beam span")],
    ),

    S(
        slug="plywood",
        name="Plywood",
        title="Plywood Calculator: Sheets for a Floor or Wall",
        desc="Work out how many 4 by 8 sheets a floor, wall or roof needs from its area, with a waste allowance for cuts, offcuts and the last row. with the waste you decide.",
        what=("<p>Plywood is bought by the sheet, so the calculation is area divided by sheet area, "
              "rounded up: <strong>sheets = area × (1 + waste) ÷ sheet area</strong>, with a 4 × 8 sheet "
              "covering 32 ft².</p>"),
        fields=[
            F("length", "Area length", "ft", 20, "The floor or wall"),
            F("width", "Area width", "ft", 12, "Across it"),
            F("sheet_length", "Sheet length", "ft", 8, "Eight feet is standard"),
            F("sheet_width", "Sheet width", "ft", 4, "Four feet is standard"),
            F("waste", "Wastage", "%", 10, "Ten per cent covers cuts and damage"),
            F("price", "Price", "$/sheet", 42, "Per sheet, delivered"),
        ],
        results=[
            R("area", "Area", "ft²"),
            R("sheets", "Sheets", ""),
            R("waste_area", "Waste allowance", "ft²"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "area": "length*width",
            "sheets": "ceil(length*width*(1+waste/100)/(sheet_length*sheet_width))",
            "waste_area": "length*width*waste/100",
            "cost": "ceil(length*width*(1+waste/100)/(sheet_length*sheet_width))*price",
            "length": "area/width",
            "width": "area/length",
            "waste": "(sheets*sheet_length*sheet_width/area-1)*100",
            "price": "cost/sheets",
        },
        prose={
            "why": ("<p>Sheets are a packing problem disguised as an area calculation. A 240 ft² floor is "
                    "7½ sheets of 4 × 8 by area, but the offcuts rarely tile perfectly, so the order is "
                    "nine or ten — and a sheet short at the end of the day costs a trip, not a dollar.</p>"),
            "formula_note": ("<p>The waste percentage is applied to the area before dividing, which is the "
                             "same as buying the extra sheets up front. A ten per cent allowance is normal "
                             "for a rectangular room and light for a roof with hips and valleys, where "
                             "fifteen to twenty is closer.</p>"),
            "example_note": ("<p>A 20 × 12 ft floor is 240 ft², which is 8.25 sheets with ten per cent over "
                             "— nine sheets, at $42 each $378. The waste allowance is 24 ft², most of which "
                             "ends up as the last row.</p>"),
            "reading": ("<p>Read the sheet count against the room's dimensions: a room whose width is a "
                        "multiple of four loses nothing to cuts, while one at 13 ft leaves a foot off every "
                        "row. That is the difference the waste figure is standing in for.</p>"),
            "scenarios": [
                {"inputs": {"length": 12, "width": 12, "sheet_length": 8, "sheet_width": 4, "waste": 15,
                            "price": 38},
                 "note": "A square room with a diagonal lay: more cutting, so a bigger allowance."},
                {"inputs": {"length": 40, "width": 24, "sheet_length": 8, "sheet_width": 4, "waste": 5,
                            "price": 30},
                 "note": "A large rectangular deck, where the sheets run out cleanly and the allowance can "
                         "come down."},
            ],
            "pitfalls": [
                "<strong>Waste applied to the sheet count.</strong> It belongs on the area, before the "
                "division.",
                "<strong>Tongue-and-groove ignored.</strong> T&G sheets lose a little coverage to the "
                "joint, and the joints have to land on joists.",
                "<strong>Thickness not in the order.</strong> The area is the same for ⅜ and ¾, but the "
                "price and the structure are not.",
            ],
            "units_note": ("<p>Area and sheet dimensions in feet, the result in whole sheets, and the cost in "
                           "dollars at the price per sheet.</p>"),
            "limits": [
                "<strong>Area only.</strong> Cutting layout, joist spacing and sheet orientation are not "
                "modelled.",
                "<strong>One thickness.</strong> Mixed thicknesses need a line each.",
            ],
            "uses": [
                "<li>Ordering subfloor for a room.</li>",
                "<li>Sizing roof sheathing.</li>",
                "<li>Budgeting a wall lining.</li>",
            ],
        },
        faq=[
            ("How many square feet is a sheet of plywood?",
             "32 ft² for the standard 4 × 8 sheet."),
            ("How much waste should I allow for plywood?",
             "Ten per cent for a simple rectangular floor, fifteen to twenty where there are hips, "
             "valleys or diagonal layouts."),
        ],
        no_round_trip=["waste"],
        related=[("/construction/lumber", "Lumber"),
                 ("/construction/framing", "Framing"),
                 ("/construction/decking", "Decking")],
    ),

    S(
        slug="framing",
        name="Framing",
        title="Framing Calculator: Studs, Plates and Board Feet",
        desc="Work out the studs, the plate lengths and the board feet for a stud wall, with the openings counted and the double top plate included. with openings counted.",
        what=("<p>A stud wall is counted on centres: <strong>studs = wall length in inches ÷ spacing + "
              "1</strong>, plus the corner and opening studs, times the waste. Plates run the length of the "
              "wall, three courses deep.</p>"),
        fields=[
            F("wall_length", "Wall length", "ft", 20, "Along the wall"),
            F("wall_height", "Wall height", "ft", 9, "Floor to the underside of the ceiling"),
            F("spacing", "Stud spacing", "in", 16, "16 in centres, or 24"),
            F("openings", "Opening width", "ft", 0, "Doors and windows, for the extra studs"),
            F("stud_width", "Stud width", "in", 3.5, "Actual 2 × 4 is 3½"),
            F("stud_thickness", "Stud thickness", "in", 1.5, "Actual 2 × 4 is 1½"),
            F("waste", "Wastage", "%", 10, "Cuts and culls"),
        ],
        results=[
            R("studs", "Studs", ""),
            R("plate_length", "Plate length", "ft"),
            R("stud_linear", "Stud linear feet", "ft"),
            R("board_feet", "Board feet", "bf"),
        ],
        formula={
            "studs": "ceil((wall_length*12/spacing+1+openings*2)*(1+waste/100))",
            "plate_length": "wall_length*3",
            "stud_linear": "ceil((wall_length*12/spacing+1+openings*2)*(1+waste/100))*wall_height",
            "board_feet": "(ceil((wall_length*12/spacing+1+openings*2)*(1+waste/100))*wall_height+wall_length*3)*stud_width*stud_thickness/12",
            "wall_length": "plate_length/3",
            "wall_height": "stud_linear/studs",
            "openings": "(studs/(1+waste/100)-wall_length*12/spacing-1)/2",
            "waste": "(studs/(wall_length*12/spacing+1+openings*2)-1)*100",
        },
        prose={
            "why": ("<p>Framing is the one trade where counting is still the fastest method: a stud every 16 "
                    "inches, a plate top and bottom, and a trimmer either side of every opening. The "
                    "calculator does the counting so the order is in studs and board feet at the same "
                    "time.</p>"),
            "formula_note": ("<p>The plus one is the stud at the far end, which a length divided by spacing "
                             "does not count. Openings add two studs each — a trimmer on either side — and "
                             "the waste percentage sits outside the whole count because culls happen to "
                             "every stud equally.</p>"),
            "example_note": ("<p>A 20 ft wall 9 ft high on 16 in centres: 16 studs before waste, 18 with "
                             "ten per cent, and 60 ft of plate for the top, bottom and double top. In 2 × 4 that is 97 board feet of timber and 162 linear feet of stud.</p>"),
            "reading": ("<p>Read the stud count against the wall length: about one per foot at 16 in centres, "
                        "and a little more once openings and waste are included. A figure far above that "
                        "means the spacing box has been read as centimetres.</p>"),
            "scenarios": [
                {"inputs": {"wall_length": 32, "wall_height": 8, "spacing": 24, "openings": 6, "stud_width": 5.5,
                            "stud_thickness": 1.5, "waste": 10},
                 "note": "A long wall on 24 in centres in 2 × 6, the layout a modern code asks for in an "
                         "exterior wall."},
                {"inputs": {"wall_length": 12, "wall_height": 9, "spacing": 16, "openings": 3, "stud_width": 3.5,
                            "stud_thickness": 1.5, "waste": 15},
                 "note": "A short interior wall with a door and a window: the openings dominate the count."},
            ],
            "pitfalls": [
                "<strong>The end stud left out.</strong> Sixteen inches into a 20 ft wall is 15 spaces and "
                "16 studs.",
                "<strong>Openings ignored.</strong> Every door and window needs a trimmer each side and a "
                "header above.",
                "<strong>Single top plate assumed.</strong> Most walls carry a double top plate, which is "
                "why the plate length here is three times the wall length.",
            ],
            "units_note": ("<p>Wall dimensions in feet, spacing and stud section in inches, the count in "
                           "whole studs, plates in linear feet and the timber in board feet at the actual "
                           "section you enter.</p>"),
            "limits": [
                "<strong>Straight walls.</strong> Corners, tees and intersections add studs the count does "
                "not see.",
                "<strong>No headers.</strong> Header sizing is a separate calculation.",
            ],
            "uses": [
                "<li>Ordering studs for a partition.</li>",
                "<li>Converting a wall takeoff to board feet.</li>",
                "<li>Checking a framer's material list.</li>",
            ],
        },
        faq=[
            ("How many studs are in a 20 ft wall?",
             "Sixteen at 16 in centres before openings and waste, plus one either side of each opening."),
            ("How many plates does a stud wall need?",
             "Three: one bottom plate and a double top plate, so three times the wall length in linear "
             "feet."),
        ],
        no_round_trip=["spacing", "openings", "waste"],
        related=[("/construction/floor-joist", "Floor joist"),
                 ("/construction/plywood", "Plywood"),
                 ("/construction/drywall", "Drywall")],
    ),

    S(
        slug="floor-joist",
        name="Floor joist",
        title="Floor Joist Calculator: Count, Span and Board Feet",
        desc="Work out how many floor joists a floor needs, their board feet and the hangers, from the floor size, the joist spacing and the actual section. and the timber.",
        what=("<p>Joists run at a fixed spacing across a floor: <strong>count = span in inches ÷ spacing + "
              "1</strong>, times the waste, and the timber is that many joists times their length and "
              "section.</p>"),
        fields=[
            F("length", "Floor length", "ft", 20, "Along the joists"),
            F("width", "Floor width", "ft", 12, "Across the joists"),
            F("spacing", "Joist spacing", "in", 16, "12, 16 or 19.2 in centres"),
            F("joist_depth", "Joist depth", "in", 9.25, "Actual 2 × 10 is 9¼"),
            F("joist_width", "Joist width", "in", 1.5, "Actual 2 × 10 is 1½"),
            F("waste", "Wastage", "%", 10, "Cutting and culling"),
        ],
        results=[
            R("joists", "Joists", ""),
            R("linear_feet", "Joist linear feet", "ft"),
            R("board_feet", "Board feet", "bf"),
            R("hangers", "Hangers", ""),
        ],
        formula={
            "joists": "ceil((width*12/spacing+1)*(1+waste/100))",
            "linear_feet": "ceil((width*12/spacing+1)*(1+waste/100))*length",
            "board_feet": "ceil((width*12/spacing+1)*(1+waste/100))*length*joist_depth*joist_width/12",
            "hangers": "ceil((width*12/spacing+1)*(1+waste/100))*2",
            "length": "linear_feet/joists",
            "width": "(joists/(1+waste/100)-1)*spacing/12",
            "spacing": "width*12/(joists/(1+waste/100)-1)",
            "waste": "(joists/(width*12/spacing+1)-1)*100",
        },
        prose={
            "why": ("<p>The joist count sets the deck, the subfloor and the hangers all at once, and it is "
                    "the number the lumber yard asks for first. The spacing is a structural decision made "
                    "elsewhere; the calculator's job is to turn it into a length of timber and a box of "
                    "hardware.</p>"),
            "formula_note": ("<p>Spacing is measured from the face of the first joist, so a width divided by "
                             "spacing gives the spaces and one more gives the joists. The hangers are two "
                             "per joist because a floor joist is hung at both ends unless it bears on a "
                             "wall.</p>"),
            "example_note": ("<p>A 20 × 12 ft floor on 16 in centres: 10 joists before waste, 11 with ten "
                             "per cent, 220 linear feet and 254 board feet in 2 × 10, plus 22 hangers. The subfloor above it is nine sheets of 4 × 8 with ten per cent over.</p>"),
            "reading": ("<p>Read the joist count against the width: one joist per 16 inches is about three "
                        "quarters of a joist per foot. A count near one per foot means 12 in centres, which "
                        "is what a heavy tile floor or a hot tub asks for.</p>"),
            "scenarios": [
                {"inputs": {"length": 24, "width": 16, "spacing": 12, "joist_depth": 11.25, "joist_width": 1.5,
                            "waste": 10},
                 "note": "A floor over a tiled area at 12 in centres in 2 × 12 — a stiff floor for stone."},
                {"inputs": {"length": 16, "width": 10, "spacing": 19.2, "joist_depth": 7.25, "joist_width": 1.5,
                            "waste": 5},
                 "note": "A small floor on the 19.2 in module, which divides a 4 × 8 sheet evenly."},
            ],
            "pitfalls": [
                "<strong>Spacing measured as gap.</strong> 16 in centres means 16 in from one joist to the "
                "next, not a 16 in gap between them.",
                "<strong>Waste left at zero.</strong> Joists are cut to length on site and the ends are "
                "never all good.",
                "<strong>Section guessed.</strong> Depth and width must be the actual dressed size for the "
                "board-foot figure to mean anything.",
            ],
            "units_note": ("<p>Floor and joist lengths in feet, spacing and section in inches, the count in "
                           "whole joists, hangers as a count of hardware, and the timber in board feet.</p>"),
            "limits": [
                "<strong>Count and quantity only.</strong> Whether a given depth spans the distance is a "
                "separate check.",
                "<strong>No bridging or blocking.</strong> Both are extra material.",
            ],
            "uses": [
                "<li>Ordering joists for a floor.</li>",
                "<li>Counting hangers.</li>",
                "<li>Converting a joist layout to board feet.</li>",
            ],
        },
        faq=[
            ("How many joists do I need for a 12 ft span?",
             "Ten at 16 in centres before waste — nine spaces plus the closing joist."),
            ("Does joist spacing change the board feet?",
             "Yes: going from 16 to 12 in centres adds a third more joists for the same floor."),
        ],
        no_round_trip=["spacing", "waste"],
        related=[("/construction/framing", "Framing"),
                 ("/construction/plywood", "Plywood"),
                 ("/construction/wood-beam-span", "Wood beam span")],
    ),

    S(
        slug="wood-beam-span",
        name="Wood beam span",
        title="Wood Beam Span Calculator: Depth for a Load",
        desc="Check how far a wood beam can span from its section, its species and the load it carries, using the section modulus and allowable bending stress. in one check.",
        what=("<p>A beam fails in bending when the moment exceeds the allowable stress: "
              "<strong>M = Fb × S</strong> with <strong>S = b × d² ÷ 6</strong>. Set that against "
              "<strong>M = w × L² ÷ 8</strong> and the span follows.</p>"),
        fields=[
            F("width", "Beam width", "in", 3.5, "Actual width of the section"),
            F("depth", "Beam depth", "in", 9.25, "Actual depth — the term that matters"),
            F("fb", "Allowable bending stress", "psi", 1000, "Fb for the species and grade, about 1000"),
            F("load", "Uniform load", "lb/ft", 300, "Total load per foot of beam"),
        ],
        results=[
            R("section_modulus", "Section modulus", "in³"),
            R("max_moment", "Allowable moment", "lb·in"),
            R("max_span", "Maximum span", "ft"),
            R("total_load", "Load at that span", "lb"),
        ],
        formula={
            "section_modulus": "width*pow(depth,2)/6",
            "max_moment": "fb*width*pow(depth,2)/6",
            "max_span": "sqrt(8*fb*width*pow(depth,2)/6/(load/12))/12",
            "total_load": "load*sqrt(8*fb*width*pow(depth,2)/6/(load/12))/12",
            "width": "6*section_modulus/pow(depth,2)",
            "depth": "sqrt(6*section_modulus/width)",
            "fb": "max_moment/section_modulus",
            "load": "8*fb*width*pow(depth,2)/6/pow(max_span*12,2)*12",
        },
        prose={
            "why": ("<p>Span tables answer this question by looking up a number, which is fine until the "
                    "beam is a size the table does not list, or the load is not the one the table assumes. "
                    "Going back to the bending equation shows why depth matters so much more than width: "
                    "the capacity goes with the square of the depth and only linearly with the width.</p>"),
            "formula_note": ("<p>The section modulus of a rectangle is bd²/6. Multiplying by the allowable "
                             "bending stress gives the moment the beam can take, and the moment at midspan "
                             "of a uniformly loaded beam is wL²/8, so the span is the square root of eight "
                             "times the moment over the load. The load in pounds per foot is divided by "
                             "twelve to keep the span in inches.</p>"),
            "example_note": ("<p>A 3½ × 9¼ beam of 1000 psi timber carrying 300 lb/ft: the section modulus is "
                             "49.9 in³, the allowable moment 49 900 lb·in, and the span works out near 10½ ft — before deflection is considered, which usually governs a long span first.</p>"),
            "reading": ("<p>Read the span against the depth: a 2 × 10 spans about 1.3 times a 2 × 8 in the "
                        "same species, because capacity follows the square of the depth. Doubling the depth "
                        "quadruples the allowable moment and roughly doubles the span.</p>"),
            "scenarios": [
                {"inputs": {"width": 5.5, "depth": 11.25, "fb": 1200, "load": 400},
                 "note": "A 6 × 12 in a better grade, carrying a heavier floor — the same calculation with "
                         "both capacity terms improved."},
                {"inputs": {"width": 3.5, "depth": 7.25, "fb": 900, "load": 250},
                 "note": "A 2 × 8 doing light duty: the depth term falls away quickly."},
            ],
            "pitfalls": [
                "<strong>Deflection ignored.</strong> The bending check gives the strength span; the "
                "serviceability limit is often shorter.",
                "<strong>Fb guessed.</strong> Species and grade move the allowable stress from about 600 "
                "to over 1500 psi.",
                "<strong>Self weight left out.</strong> A heavy beam adds to its own load.",
            ],
            "units_note": ("<p>Section in inches, stress in psi, load in pounds per linear foot, moment in "
                           "pound-inches and the span in feet.</p>"),
            "limits": [
                "<strong>Simple span, uniform load.</strong> Point loads, cantilevers and continuous beams "
                "need their own equations.",
                "<strong>No lateral stability check.</strong> Bearing, shear and buckling are separate.",
            ],
            "uses": [
                "<li>Checking a beam size against a span.</li>",
                "<li>Seeing what a deeper section buys.</li>",
                "<li>Sanity-checking a span table.</li>",
            ],
        },
        faq=[
            ("How far can a 2 × 10 span?",
             "Roughly 12 ft carrying 300 lb/ft in a 1000 psi species on the bending check; deflection "
             "usually shortens it."),
            ("Why does depth matter more than width?",
             "The section modulus goes with the square of the depth but only linearly with the width."),
        ],
        no_round_trip=["width", "depth", "fb", "load"],
        related=[("/construction/beam-deflection", "Beam deflection"),
                 ("/construction/beam-load", "Beam load"),
                 ("/construction/floor-joist", "Floor joist")],
    ),

    S(
        slug="beam-deflection",
        name="Beam deflection",
        title="Beam Deflection Calculator: Sag under a Uniform Load",
        desc="Work out how far a beam sags under a uniform load from its span, stiffness and section, and compare the answer with the L/360 limit. before the floor is framed.",
        what=("<p>A uniformly loaded simple beam sags by <strong>δ = 5 w L⁴ ÷ (384 E I)</strong>, with the "
              "load in pounds per inch, the span in inches, E in psi and I in inches to the fourth.</p>"),
        fields=[
            F("span", "Span", "ft", 12, "Clear span, support to support"),
            F("load", "Uniform load", "lb/ft", 300, "Total load per foot"),
            F("e", "Modulus of elasticity", "psi", 1600000, "1.6 million for softwood, 1.8 for better grades"),
            F("i", "Moment of inertia", "in⁴", 120, "For a 2 × 10: bd³/12 = 98"),
        ],
        results=[
            R("deflection", "Deflection", "in"),
            R("ratio", "Span / deflection", ""),
            R("limit", "L/360 limit", "in"),
            R("margin", "Margin to the L/360 limit", "in"),
        ],
        formula={
            "deflection": "5*(load/12)*pow(span*12,4)/(384*e*i)",
            "ratio": "span*12/(5*(load/12)*pow(span*12,4)/(384*e*i))",
            "limit": "span*12/360",
            "margin": "span*12/360-5*(load/12)*pow(span*12,4)/(384*e*i)",
            "span": "pow(deflection*384*e*i/(5*(load/12)),0.25)/12",
            "i": "5*(load/12)*pow(span*12,4)/(384*e*deflection)",
            "e": "5*(load/12)*pow(span*12,4)/(384*i*deflection)",
        },
        prose={
            "why": ("<p>Strength and stiffness are different questions. A beam can be strong enough not to "
                    "break and still sag enough to crack the plaster above it or make a floor feel "
                    "springy. The L/360 rule — a deflection of no more than the span divided by 360 — is "
                    "the usual serviceability limit for a floor.</p>"),
            "formula_note": ("<p>The span appears to the fourth power, which is why deflection is so "
                             "sensitive to length: doubling the span multiplies the sag by sixteen. The "
                             "load is divided by twelve to get pounds per inch so that the whole equation "
                             "works in inches.</p>"),
            "example_note": ("<p>A 12 ft span carrying 300 lb/ft on E 1.6 M psi and I 120 in⁴ sags 0.73 in, which is L/198 — past the L/360 limit of 0.40 in, so this beam fails the serviceability check. A 2 × 14 with I 290 in⁴ brings it to 0.30 in and inside the limit, which is the trade this page is for.</p>"),
            "reading": ("<p>Read the ratio against 360: a larger number is stiffer and a smaller one sags "
                        "more than a floor should. Ceilings with plaster want L/480, and a garage header "
                        "with brick above wants more again.</p>"),
            "scenarios": [
                {"inputs": {"span": 16, "load": 300, "e": 1600000, "i": 120},
                 "note": "The same load over a longer span: the fourth-power term makes this the case "
                         "that fails."},
                {"inputs": {"span": 10, "load": 450, "e": 1800000, "i": 178},
                 "note": "A short, deep, stiff beam carrying a heavy load — comfortably inside L/360."},
            ],
            "pitfalls": [
                "<strong>Span in feet in the equation.</strong> Everything inside works in inches; the "
                "twelve is not optional.",
                "<strong>Moment of inertia guessed.</strong> For a rectangle it is bd³/12, and the cube "
                "makes depth decisive.",
                "<strong>Deflection checked after the fact.</strong> It usually governs the design, so it "
                "belongs in the first pass.",
            ],
            "units_note": ("<p>Span in feet, load in pounds per foot, E in psi and I in in⁴; the deflection "
                           "and the L/360 limit come out in inches, and the ratio is a plain number.</p>"),
            "limits": [
                "<strong>Simple span, uniform load.</strong> Point loads and cantilevers differ.",
                "<strong>No creep or long-term factor.</strong> Timber sags further over time under "
                "sustained load.",
            ],
            "uses": [
                "<li>Checking a floor for springiness.</li>",
                "<li>Sizing a header over a wide opening.</li>",
                "<li>Seeing what a deeper section does to sag.</li>",
            ],
        },
        faq=[
            ("What is the L/360 rule?",
             "A beam may sag no more than its span divided by 360 — 0.4 in on a 12 ft span."),
            ("How much does a beam sag under a uniform load?",
             "5wL⁴/(384EI), with everything in inches: the span to the fourth power dominates."),
        ],
        no_round_trip=["span", "i", "e"],
        related=[("/construction/wood-beam-span", "Wood beam span"),
                 ("/construction/beam-load", "Beam load"),
                 ("/construction/floor-joist", "Floor joist")],
    ),

    S(
        slug="beam-load",
        name="Beam load",
        title="Beam Load Calculator: Line Load from a Floor",
        desc="Turn a floor's dead and live load into the line load a beam carries at its tributary width, and the load that lands on each end bearing. and sizes the bearing.",
        what=("<p>A beam carries half the floor on each side of it: <strong>w = (dead + live) × tributary "
              "width</strong> in pounds per foot, and <strong>total = w × span</strong>.</p>"),
        fields=[
            F("tributary", "Tributary width", "ft", 10, "Half the floor each side of the beam"),
            F("dead", "Dead load", "psf", 15, "Structure, subfloor, finishes"),
            F("live", "Live load", "psf", 40, "People and furniture — 40 for a dwelling"),
            F("span", "Beam span", "ft", 12, "Support to support"),
        ],
        results=[
            R("total_psf", "Total load", "psf"),
            R("line_load", "Line load on the beam", "lb/ft"),
            R("total_load", "Total load on the beam", "lb"),
            R("reaction", "Reaction at each end", "lb"),
        ],
        formula={
            "total_psf": "dead+live",
            "line_load": "(dead+live)*tributary",
            "total_load": "(dead+live)*tributary*span",
            "reaction": "(dead+live)*tributary*span/2",
            "tributary": "line_load/(dead+live)",
            "dead": "line_load/tributary-live",
            "live": "line_load/tributary-dead",
            "span": "total_load/line_load",
        },
        prose={
            "why": ("<p>Every beam problem starts with the load it carries, and the load per square foot of "
                    "floor is not the load on the beam. The tributary width is the share: a beam in the "
                    "middle of a floor takes half the span either side, and a beam at the edge takes the "
                    "near half only.</p>"),
            "formula_note": ("<p>Dead load is everything that stays put — joists, sheathing, insulation, "
                             "ceiling and floor finish — and runs about 10 to 20 psf for a timber floor. "
                             "Live load is what moves, and 40 psf is the residential standard for a "
                             "floor.</p>"),
            "example_note": ("<p>A beam with 10 ft of tributary width carrying 15 psf dead and 40 psf live "
                             "takes 55 psf over 10 ft, which is 550 lb per foot. Over a 12 ft span that is "
                             "6 600 lb on the beam and 3 300 lb on each end bearing.</p>"),
            "reading": ("<p>Read the reaction against the bearing: a 3½ in bearing plate on a wall carries "
                        "about 300 psi of masonry, and the same load on a post needs a steel plate. The "
                        "reaction is the number that sizes the post, not the beam.</p>"),
            "scenarios": [
                {"inputs": {"tributary": 16, "dead": 20, "live": 40, "span": 16},
                 "note": "A beam taking a full half-floor of a 32 ft span — the load that makes a steel "
                         "beam necessary."},
                {"inputs": {"tributary": 5, "dead": 12, "live": 30, "span": 10},
                 "note": "A porch edge beam: a narrow tributary and a lighter live load, so a timber "
                         "section works."},
            ],
            "pitfalls": [
                "<strong>Full floor width used as tributary.</strong> A beam takes half the span either "
                "side, not the whole floor.",
                "<strong>Dead load forgotten.</strong> It is a quarter of the total on a timber floor and "
                "more under tile.",
                "<strong>Load per foot confused with load per square foot.</strong> The beam sees the "
                "line load; the floor sees the area load.",
            ],
            "units_note": ("<p>Loads in pounds per square foot, tributary width and span in feet, the line "
                           "load in pounds per foot, and the total and reactions in pounds.</p>"),
            "limits": [
                "<strong>Uniform load only.</strong> Point loads need their own combination.",
                "<strong>Simple span.</strong> Continuous beams redistribute load to the interior "
                "supports.",
            ],
            "uses": [
                "<li>Converting a floor load to a beam load.</li>",
                "<li>Sizing a post under a beam.</li>",
                "<li>Feeding the beam span calculator.</li>",
            ],
        },
        faq=[
            ("What is tributary width?",
             "The strip of floor a beam carries — half the distance to the next support on each side."),
            ("What live load should I use for a floor?",
             "40 psf for a dwelling, 50 or more for a deck with a hot tub, and 100 for a garage."),
        ],
        related=[("/construction/wood-beam-span", "Wood beam span"),
                 ("/construction/beam-deflection", "Beam deflection"),
                 ("/construction/floor-joist", "Floor joist")],
    ),
]
