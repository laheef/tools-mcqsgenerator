"""Batch 4a — paint, paper, tile, carpet and stain."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="paint",
        name="Paint",
        title="Paint Calculator: Gallons for a Room",
        desc="Work out the paintable wall area of a room, the gallons and cans of paint it takes for two coats, and what the job costs at your price.",
        what=("<p><strong>Wall area = perimeter × height</strong>, less the doors and windows, then "
              "<strong>gallons = net area × coats ÷ coverage</strong>.</p>"),
        fields=[
            F("length", "Room length", "ft", 12, "Wall to wall"),
            F("width", "Room width", "ft", 10, "Wall to wall"),
            F("height", "Wall height", "ft", 8, "Floor to ceiling"),
            F("doors", "Doors", "", 2, "Counted as openings"),
            F("door_area", "Each door", "ft²", 21, "A standard door is 21 ft²"),
            F("windows", "Windows", "", 2, "Counted as openings"),
            F("window_area", "Each window", "ft²", 15, "Measured glass and frame"),
            F("coats", "Coats", "", 2, "Two is normal"),
            F("coverage", "Coverage", "ft²/gal", 350, "350 on a smooth wall"),
            F("price", "Price", "$/gal", 38, "Per gallon"),
        ],
        results=[
            R("wall_area", "Wall area", "ft²"),
            R("net_area", "Paintable area", "ft²"),
            R("gallons", "Paint", "gal"),
            R("cans", "Cans to buy", ""),
            R("cost", "Cost", "$"),
        ],
        formula={
            "wall_area": "2*(length+width)*height",
            "net_area": "2*(length+width)*height-doors*door_area-windows*window_area",
            "gallons": "(2*(length+width)*height-doors*door_area-windows*window_area)*coats/coverage",
            "cans": "ceil((2*(length+width)*height-doors*door_area-windows*window_area)*coats/coverage)",
            "cost": "ceil((2*(length+width)*height-doors*door_area-windows*window_area)*coats/coverage)*price",
            "length": "wall_area/(2*height)-width",
            "width": "wall_area/(2*height)-length",
            "height": "wall_area/(2*(length+width))",
            "doors": "(2*(length+width)*height-windows*window_area-net_area)/door_area",
            "windows": "(2*(length+width)*height-doors*door_area-net_area)/window_area",
            "coats": "gallons*coverage/net_area",
            "coverage": "net_area*coats/gallons",
            "price": "cost/cans",
        },
        prose={
            "why": ("<p>Paint is the one material almost everyone buys twice: the first tin goes on, the wall "
                    "drinks it, and the second trip is an hour of the weekend. The room's perimeter times its "
                    "height is a rectangle you can measure in two minutes, and subtracting the openings keeps "
                    "the estimate honest.</p>"),
            "formula_note": ("<p>Every wall is counted twice — the long pair and the short pair — which is "
                             "where the factor of two comes from. Doors and windows are subtracted at face "
                             "value, though a door usually needs its frame painted, so the over-order in the "
                             "can count absorbs it.</p>"),
            "example_note": ("<p>A room 12 by 10 ft with an 8 ft ceiling has {wall_area|unit} of wall. Two "
                             "doors and two windows take off 72 ft², leaving {net_area|unit} to paint — "
                             "{gallons} gallons, or {cans} cans, for {cost}.</p>"),
            "reading": ("<p>Read the gallons against the room: a typical bedroom lands near two gallons for "
                        "two coats. If the figure is far higher, the coverage has been entered as square "
                        "metres per litre, which is a much larger number.</p>"),
            "scenarios": [
                {"inputs": {"length": 20, "width": 16, "height": 9, "doors": 2, "door_area": 21,
                            "windows": 4, "window_area": 18, "coats": 2, "coverage": 350, "price": 42},
                 "note": "A large open room: the perimeter grows with both dimensions, so the gallon count "
                         "climbs faster than the floor area suggests."},
                {"inputs": {"length": 10, "width": 10, "height": 8, "doors": 1, "door_area": 21,
                            "windows": 1, "window_area": 15, "coats": 3, "coverage": 300, "price": 45},
                 "note": "A dark colour over a light wall: three coats and a heavier hide."},
            ],
            "pitfalls": [
                "<strong>Floor area used as wall area.</strong> The walls are always larger.",
                "<strong>Ceiling left out.</strong> Add length × width if it is being painted.",
                "<strong>Coverage taken from the label.</strong> A textured or bare wall takes far more.",
            ],
            "units_note": ("<p>Room dimensions in feet, door and window areas in square feet, coverage in "
                           "square feet per gallon, paint in gallons and cost in dollars.</p>"),
            "limits": [
                "<strong>A rectangular room.</strong> Alcoves, bays and stairwells need their own runs.",
                "<strong>One colour.</strong> Trim, doors and ceiling are separate work.",
            ],
            "uses": [
                "<li>Buying paint for a room.</li>",
                "<li>Pricing a decorating job.</li>",
                "<li>Checking a painter's estimate.</li>",
            ],
        },
        faq=[
            ("How much paint for a 12 by 12 room?",
             "About 2.4 gallons for two coats on an 8 ft ceiling, before openings are taken off."),
            ("How many square feet does a gallon cover?",
             "About 350 ft² on a smooth sealed wall, and 250 on new plaster."),
        ],
        no_round_trip=["coverage"],
        related=[("/construction/wall-square-footage", "Wall square footage"),
                 ("/construction/wallpaper", "Wallpaper"),
                 ("/construction/drywall", "Drywall")],
    ),

    S(
        slug="wallpaper",
        name="Wallpaper",
        title="Wallpaper Calculator: Rolls for a Room",
        desc="Work out how many wallpaper rolls a room needs from its perimeter, ceiling height and pattern repeat, with the strips and drops per roll.",
        what=("<p><strong>Strips = ceiling(perimeter ÷ roll width)</strong>, <strong>drops per roll = "
              "floor(roll length ÷ drop)</strong>, and the drop is the height plus the pattern repeat.</p>"),
        fields=[
            F("length", "Room length", "ft", 12, "Wall to wall"),
            F("width", "Room width", "ft", 10, "Wall to wall"),
            F("height", "Ceiling height", "ft", 8, "Floor to ceiling"),
            F("roll_width", "Roll width", "in", 20.5, "20.5 in is a US double roll"),
            F("roll_length", "Roll length", "ft", 33, "33 ft is a double roll"),
            F("repeat", "Pattern repeat", "in", 0, "Straight match; 0 if none"),
            F("price", "Price per roll", "$", 45, "Delivered"),
        ],
        results=[
            R("perimeter", "Wall perimeter", "ft"),
            R("strips", "Strips needed", ""),
            R("per_roll", "Drops per roll", ""),
            R("rolls", "Rolls", ""),
            R("cost", "Cost", "$"),
        ],
        formula={
            "perimeter": "2*(length+width)",
            "strips": "ceil(2*(length+width)/(roll_width/12))",
            "per_roll": "floor(roll_length/(height+repeat/12))",
            "rolls": "ceil(ceil(2*(length+width)/(roll_width/12))/floor(roll_length/(height+repeat/12)))",
            "cost": "ceil(ceil(2*(length+width)/(roll_width/12))/floor(roll_length/(height+repeat/12)))*price",
            "length": "perimeter/2-width",
            "width": "perimeter/2-length",
            "price": "cost/rolls",
        },
        prose={
            "why": ("<p>Wallpaper is the material most often bought wrong, because a roll is sold by area but "
                    "used by the strip: what matters is how many full drops come off one roll, and a pattern "
                    "repeat quietly steals a few inches from every one of them.</p>"),
            "formula_note": ("<p>The perimeter divided by the roll width gives whole strips, rounded up "
                             "because the last strip is rarely full. The pattern repeat is added to every "
                             "drop before the roll is divided, which is why a large repeat costs rolls "
                             "rather than wallpaper.</p>"),
            "example_note": ("<p>A 12 by 10 ft room has {perimeter|unit} of wall. At 20.5 in wide that is "
                             "{strips} strips, and a 33 ft roll gives {per_roll} drops at an 8 ft ceiling — "
                             "so {rolls} rolls and {cost}.</p>"),
            "reading": ("<p>Read the drops per roll: an eight-foot ceiling takes four from a 33 ft roll, and "
                        "a nine-foot one takes three. If the figure collapses to one, the repeat has been "
                        "entered in feet rather than inches.</p>"),
            "scenarios": [
                {"inputs": {"length": 16, "width": 12, "height": 9, "roll_width": 20.5, "roll_length": 33,
                            "repeat": 21, "price": 55},
                 "note": "A large repeat in a large room: the drop grows and so does the roll count."},
                {"inputs": {"length": 8, "width": 8, "height": 8, "roll_width": 27, "roll_length": 27,
                            "repeat": 0, "price": 30},
                 "note": "A small box room in a wide European roll: fewer strips, fewer joins."},
            ],
            "pitfalls": [
                "<strong>Roll area used as coverage.</strong> Offcuts from the pattern match cannot be used.",
                "<strong>Repeat entered in feet.</strong> The box is in inches.",
                "<strong>Openings subtracted twice.</strong> Cutting around a window wastes the paper "
                "anyway.",
            ],
            "units_note": ("<p>Room dimensions in feet, roll width and pattern repeat in inches, roll length "
                           "in feet, strips and rolls as whole numbers and cost in dollars.</p>"),
            "limits": [
                "<strong>A rectangular room.</strong> Sloped ceilings and stair wells need their own trim.",
                "<strong>Straight match.</strong> A drop match wastes more than this allows.",
            ],
            "uses": [
                "<li>Buying wallpaper for a room.</li>",
                "<li>Checking a decorator's quantity.</li>",
                "<li>Comparing a large repeat with a plain paper.</li>",
            ],
        },
        faq=[
            ("How many rolls of wallpaper for a 12 by 10 room?",
             "About 8 double rolls at an 8 ft ceiling with no repeat, from 21 strips."),
            ("How many drops in a roll?",
             "Four from a 33 ft double roll at an 8 ft ceiling, and three at nine feet."),
        ],
        no_round_trip=["height", "roll_width", "roll_length", "repeat"],
        related=[("/construction/paint", "Paint"),
                 ("/construction/wainscoting", "Wainscoting"),
                 ("/construction/wall-square-footage", "Wall square footage")],
    ),

    S(
        slug="tile",
        name="Tile",
        title="Tile Calculator: Tiles, Boxes and Waste",
        desc="Work out how many tiles and boxes a floor needs from its size, the tile size and the joint gap, with a waste allowance and the cost per box.",
        what=("<p><strong>Tiles = ceiling(area × (1 + waste) ÷ tile area)</strong>, where the tile area "
              "includes its joint, and <strong>boxes = ceiling(tiles ÷ per box)</strong>.</p>"),
        fields=[
            F("length", "Room length", "ft", 10, "The area being tiled"),
            F("width", "Room width", "ft", 8, "Across it"),
            F("tile_length", "Tile length", "in", 12, "Nominal size"),
            F("tile_width", "Tile width", "in", 12, "Nominal size"),
            F("gap", "Joint width", "in", 0.125, "A 1/8 in joint"),
            F("waste", "Waste", "%", 10, "Cuts and breakage"),
            F("per_box", "Tiles per box", "", 10, "On the carton"),
            F("price", "Price per box", "$", 42, "Delivered"),
        ],
        results=[
            R("area_ft2", "Area", "ft²"),
            R("tile_ft2", "Tile module", "ft²"),
            R("tiles", "Tiles", ""),
            R("boxes", "Boxes", ""),
            R("cost", "Cost", "$"),
        ],
        formula={
            "area_ft2": "length*width",
            "tile_ft2": "(tile_length+gap)*(tile_width+gap)/144",
            "tiles": "ceil(length*width*(1+waste/100)/((tile_length+gap)*(tile_width+gap)/144))",
            "boxes": "ceil(ceil(length*width*(1+waste/100)/((tile_length+gap)*(tile_width+gap)/144))/per_box)",
            "cost": "ceil(ceil(length*width*(1+waste/100)/((tile_length+gap)*(tile_width+gap)/144))/per_box)*price",
            "length": "area_ft2/width",
            "width": "area_ft2/length",
            "tile_length": "tile_ft2*144/(tile_width+gap)-gap",
            "tile_width": "tile_ft2*144/(tile_length+gap)-gap",
            "gap": "sqrt(tile_ft2*144)-tile_length",
            "price": "cost/boxes",
        },
        prose={
            "why": ("<p>Tile is bought by the box and laid by the joint, so the two never quite agree: a "
                    "12 in tile with an eighth-inch joint occupies more floor than a square foot, and the "
                    "difference over a whole room is a box or two.</p>"),
            "formula_note": ("<p>The joint is added to both dimensions of every tile, which is what makes a "
                             "grid of tiles plus joints exactly cover the floor. The waste allowance then "
                             "covers edge cuts, and since boxes are sealed units the count rounds up "
                             "again.</p>"),
            "example_note": ("<p>An 80 ft² floor in 12 in tiles with an eighth-inch joint needs "
                             "{tiles} tiles — each module is {tile_ft2|unit} — which is {boxes} boxes and "
                             "{cost}. The same room in 6 in tiles needs four times as many pieces.</p>"),
            "reading": ("<p>Read the tile count against the area: 12 in tiles with joints work out near one "
                        "tile per square foot, so a count much above the area means the waste is being "
                        "applied twice.</p>"),
            "scenarios": [
                {"inputs": {"length": 12, "width": 10, "tile_length": 6, "tile_width": 6, "gap": 0.125,
                            "waste": 15, "per_box": 25, "price": 38},
                 "note": "Small tiles: four times the pieces, and a bigger waste allowance for cuts."},
                {"inputs": {"length": 20, "width": 15, "tile_length": 24, "tile_width": 12, "gap": 0.1875,
                            "waste": 10, "per_box": 4, "price": 68},
                 "note": "Large format in a big room: fewer pieces, more care with the layout."},
            ],
            "pitfalls": [
                "<strong>Tile thickness entered as the module.</strong> The gap goes into the count, not "
                "the depth.",
                "<strong>Waste left at zero.</strong> Every wall leaves edge cuts.",
                "<strong>Spare box not kept.</strong> A broken tile after the line is discontinued is a "
                "problem.",
            ],
            "units_note": ("<p>Room dimensions in feet, tile size and joint in inches, tile module in square "
                           "feet, counts as whole numbers and cost in dollars.</p>"),
            "limits": [
                "<strong>Square or rectangular rooms.</strong> Diagonal and herringbone layouts waste far "
                "more.",
                "<strong>Tiles only.</strong> Adhesive, grout and backer board are separate lines.",
            ],
            "uses": [
                "<li>Ordering floor tile.</li>",
                "<li>Checking a box count for a bathroom.</li>",
                "<li>Comparing tile sizes by piece count.</li>",
            ],
        },
        faq=[
            ("How many 12x12 tiles do I need for 100 square feet?",
             "About 104 with a 1/8 in joint, plus waste — usually two boxes of ten more."),
            ("Should I add waste to tile?",
             "Yes: ten per cent for a square room and fifteen for a diagonal layout."),
        ],
        no_round_trip=["waste", "per_box"],
        related=[("/construction/thinset", "Thinset"),
                 ("/construction/grout", "Grout"),
                 ("/construction/paver", "Paver")],
    ),

    S(
        slug="carpet",
        name="Carpet",
        title="Carpet Calculator: Square Yards and Cost",
        desc="Turn a room's length and width into carpet area in square feet and square yards, with a waste allowance and the installed cost at your price.",
        what=("<p><strong>Area = length × width</strong>, <strong>square yards = area ÷ 9</strong>, and the "
              "order carries a waste allowance for the roll cut.</p>"),
        fields=[
            F("length", "Room length", "ft", 15, "Longest run"),
            F("width", "Room width", "ft", 12, "Across it"),
            F("waste", "Waste", "%", 10, "Roll direction and cuts"),
            F("price", "Price", "$/yd²", 18, "Supplied and laid"),
        ],
        results=[
            R("area_ft2", "Area", "ft²"),
            R("area_yd2", "Area", "yd²"),
            R("order_yd2", "Order", "yd²"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "area_ft2": "length*width",
            "area_yd2": "length*width/9",
            "order_yd2": "length*width/9*(1+waste/100)",
            "cost": "length*width/9*(1+waste/100)*price",
            "length": "area_ft2/width",
            "width": "area_ft2/length",
            "waste": "(order_yd2/(area_ft2/9)-1)*100",
            "price": "cost/order_yd2",
        },
        prose={
            "why": ("<p>Carpet is sold by the square yard and cut from a roll, and the two do not match the "
                    "room: a roll is twelve or fifteen feet wide, so a room that is eleven feet across wastes "
                    "a strip if the pile runs the long way. The square yard figure is the trade's unit and "
                    "the one on the invoice.</p>"),
            "formula_note": ("<p>Dividing the square footage by nine gives square yards. The waste allowance "
                             "is applied to the order rather than the area, because it exists to cover the "
                             "roll cut, seams and the odd angle — not the floor itself.</p>"),
            "example_note": ("<p>A room 15 by 12 ft is {area_ft2|unit} — {area_yd2|unit} of carpet. With ten "
                             "per cent for cuts the order is {order_yd2|unit}, and at $18 a square yard the "
                             "job is {cost}.</p>"),
            "reading": ("<p>Read the square yards against the square feet: nine to one. If the two are much "
                        "closer, the length and width have been entered in yards rather than feet.</p>"),
            "scenarios": [
                {"inputs": {"length": 24, "width": 18, "waste": 15, "price": 22},
                 "note": "A large room where the roll width does not divide evenly: more waste."},
                {"inputs": {"length": 10, "width": 9, "waste": 5, "price": 14},
                 "note": "A small bedroom that fits inside one roll width with almost no waste."},
            ],
            "pitfalls": [
                "<strong>Square feet ordered.</strong> Carpet is priced by the square yard.",
                "<strong>Pile direction ignored.</strong> Turning a piece to save carpet shows at the "
                "seam.",
                "<strong>Underlay forgotten.</strong> It is a separate line, usually cheaper.",
            ],
            "units_note": ("<p>Room dimensions in feet, area in square feet and square yards, the order in "
                           "square yards and cost in dollars per square yard.</p>"),
            "limits": [
                "<strong>A rectangle.</strong> L-shaped rooms are two rectangles plus a seam.",
                "<strong>One price.</strong> Underlay, gripper and fitting are separate.",
            ],
            "uses": [
                "<li>Buying carpet for a room.</li>",
                "<li>Comparing quotes in square yards.</li>",
                "<li>Checking a fitter's measure.</li>",
            ],
        },
        faq=[
            ("How many square yards is a 15 by 12 room?",
             "20 square yards, and about 22 once waste is allowed."),
            ("Why is carpet sold by the square yard?",
             "It is the traditional trade unit; nine square feet make one square yard."),
        ],
        related=[("/construction/flooring", "Flooring"),
                 ("/construction/stair-carpet", "Stair carpet"),
                 ("/construction/square-yard", "Square yard")],
    ),

    S(
        slug="flooring",
        name="Flooring",
        title="Flooring Calculator: Boxes, Waste and Cost",
        desc="Work out how much flooring a room needs in square feet, how many boxes that makes at the coverage on the carton, and the total cost.",
        what=("<p><strong>Area = length × width</strong>, the order adds waste, and <strong>boxes = "
              "ceiling(order ÷ coverage per box)</strong>.</p>"),
        fields=[
            F("length", "Room length", "ft", 14, "Longest run"),
            F("width", "Room width", "ft", 11, "Across it"),
            F("waste", "Waste", "%", 10, "Cuts and grading"),
            F("coverage", "Coverage per box", "ft²", 24, "Printed on the carton"),
            F("price", "Price per box", "$", 58, "Delivered"),
        ],
        results=[
            R("area_ft2", "Area", "ft²"),
            R("order_ft2", "Order area", "ft²"),
            R("boxes", "Boxes", ""),
            R("cost", "Cost", "$"),
        ],
        formula={
            "area_ft2": "length*width",
            "order_ft2": "length*width*(1+waste/100)",
            "boxes": "ceil(length*width*(1+waste/100)/coverage)",
            "cost": "ceil(length*width*(1+waste/100)/coverage)*price",
            "length": "area_ft2/width",
            "width": "area_ft2/length",
            "waste": "(order_ft2/area_ft2-1)*100",
            "price": "cost/boxes",
        },
        prose={
            "why": ("<p>Laminate, vinyl plank and engineered wood all arrive in boxes with a coverage figure "
                    "on the side, and that figure is the one number the whole order hangs on. Rooms are "
                    "rarely square, so the waste allowance matters more here than it does for carpet.</p>"),
            "formula_note": ("<p>The waste is applied to the area before the box count, so the boxes and the "
                             "cost can never disagree. Ten per cent is right for a simple rectangle laid "
                             "straight; fifteen is safer for a herringbone or a room full of doorways.</p>"),
            "example_note": ("<p>A room 14 by 11 ft is {area_ft2|unit}. With ten per cent that is "
                             "{order_ft2|unit} of flooring, {boxes} boxes at 24 ft² each, and {cost} at $58 "
                             "a box.</p>"),
            "reading": ("<p>Read the boxes against the area: at 24 ft² a box, a hundred square feet is five "
                        "boxes with a little over. If the count is double that, the coverage has been "
                        "entered in square metres.</p>"),
            "scenarios": [
                {"inputs": {"length": 20, "width": 15, "waste": 15, "coverage": 20, "price": 46},
                 "note": "A large room with a diagonal layout: more waste and a smaller box."},
                {"inputs": {"length": 8, "width": 6, "waste": 8, "coverage": 30, "price": 72},
                 "note": "A small bathroom where one box may be enough."},
            ],
            "pitfalls": [
                "<strong>Waste left at the retailer's minimum.</strong> Always keep one spare box.",
                "<strong>Coverage in square metres.</strong> The box is in square feet.",
                "<strong>Doorway and alcove left out.</strong> Measure the floor, not the room schedule.",
            ],
            "units_note": ("<p>Room dimensions in feet, area in square feet, coverage in square feet per box, "
                           "boxes as a whole count and cost in dollars.</p>"),
            "limits": [
                "<strong>A rectangle.</strong> Add each bay and doorway separately.",
                "<strong>Material only.</strong> Underlay, trim and fitting are extra.",
            ],
            "uses": [
                "<li>Buying laminate or vinyl plank.</li>",
                "<li>Comparing boxes across products.</li>",
                "<li>Estimating a room renovation.</li>",
            ],
        },
        faq=[
            ("How many boxes of flooring for a 14 by 11 room?",
             "About eight boxes at 24 ft² per box with ten per cent waste."),
            ("How much waste should I allow for flooring?",
             "Ten per cent laid straight, fifteen for a diagonal or a room with many cuts."),
        ],
        no_round_trip=["coverage"],
        related=[("/construction/carpet", "Carpet"),
                 ("/construction/decking", "Decking"),
                 ("/construction/square-footage", "Square footage")],
    ),

    S(
        slug="stair-carpet",
        name="Stair carpet",
        title="Stair Carpet Calculator: Run and Area",
        desc="Work out the carpet run and area for a flight of stairs from the number of steps, the riser height, the tread and the nosing, with the cost per square foot.",
        what=("<p><strong>Each step takes riser + tread + nosing</strong>, so the run is that times the "
              "number of steps, and <strong>area = run × stair width</strong>.</p>"),
        fields=[
            F("steps", "Number of steps", "", 13, "Count the treads"),
            F("riser", "Riser height", "in", 7.5, "Floor to floor divided by steps"),
            F("tread", "Tread depth", "in", 10, "Going, without the nosing"),
            F("nosing", "Nosing", "in", 1, "The lip over the riser"),
            F("width", "Stair width", "ft", 3, "Wall to wall"),
            F("waste", "Waste", "%", 10, "Pattern match and cuts"),
            F("price", "Price", "$/ft²", 3.5, "Supplied and laid"),
        ],
        results=[
            R("per_step", "Carpet per step", "in"),
            R("run", "Carpet run", "ft"),
            R("area_ft2", "Area", "ft²"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "per_step": "riser+tread+nosing",
            "run": "steps*(riser+tread+nosing)/12",
            "area_ft2": "steps*(riser+tread+nosing)/12*width",
            "cost": "steps*(riser+tread+nosing)/12*width*(1+waste/100)*price",
            "steps": "run*12/per_step",
            "riser": "per_step-tread-nosing",
            "tread": "per_step-riser-nosing",
            "nosing": "per_step-riser-tread",
            "width": "area_ft2/run",
            "price": "cost/(area_ft2*(1+waste/100))",
        },
        prose={
            "why": ("<p>Stairs are where a carpet estimate goes wrong: the floor area of a flight is tiny, "
                    "but the carpet has to fold over every tread and drop down every riser, so the run is "
                    "roughly double the plan length. A fitter measuring the stairwell footprint will "
                    "under-order by half.</p>"),
            "formula_note": ("<p>Each step is unrolled into a flat length of riser plus tread plus the nosing "
                             "that laps the riser. Multiply by the number of steps for the run, then by the "
                             "stair width for the area, and allow for the pattern match at the top of the "
                             "flight.</p>"),
            "example_note": ("<p>A flight of {steps} steps with a 7.5 in riser, a 10 in tread and an inch of "
                             "nosing needs {per_step|unit} of carpet per step — {run|unit} in total, or "
                             "{area_ft2|unit} at 3 ft wide. That is {cost} at $3.50 a square foot.</p>"),
            "reading": ("<p>Read the run against the staircase: a floor-to-floor height of about eight feet "
                        "is a run near fifteen feet once the treads are counted. If the run equals the plan "
                        "length of the stairs, the risers have been left out.</p>"),
            "scenarios": [
                {"inputs": {"steps": 15, "riser": 7, "tread": 11, "nosing": 1.25, "width": 3.5,
                            "waste": 15, "price": 4},
                 "note": "A wider flight with deeper treads: the run grows with every dimension."},
                {"inputs": {"steps": 4, "riser": 7.5, "tread": 10, "nosing": 1, "width": 3, "waste": 5,
                            "price": 3},
                 "note": "A short porch flight, where the area is small and the waste allowance can be "
                         "tight."},
            ],
            "pitfalls": [
                "<strong>Floor area measured instead of the run.</strong> The stairwell footprint is half "
                "the carpet.",
                "<strong>Nosing counted twice.</strong> It laps the riser, so it adds one lip, not two.",
                "<strong>Landings ignored.</strong> Each landing is a separate rectangle.",
            ],
            "units_note": ("<p>Riser, tread and nosing in inches, stair width in feet, the run in feet, area "
                           "in square feet and cost in dollars per square foot.</p>"),
            "limits": [
                "<strong>A straight flight.</strong> Winders and spirals need a template.",
                "<strong>One price per square foot.</strong> Fitting stairs costs more than fitting a "
                "room.",
            ],
            "uses": [
                "<li>Buying carpet for a staircase.</li>",
                "<li>Checking a fitter's run measurement.</li>",
                "<li>Estimating a runner.</li>",
            ],
        },
        faq=[
            ("How much carpet for 13 stairs?",
             "About 20 ft of run and 60 ft² at 3 ft wide, before waste."),
            ("Do you measure stairs by the tread only?",
             "No — each step takes the tread plus the riser plus the nosing, roughly twice the tread."),
        ],
        related=[("/construction/carpet", "Carpet"),
                 ("/construction/stairs", "Stairs"),
                 ("/construction/flooring", "Flooring")],
    ),

    S(
        slug="deck-stain",
        name="Deck stain",
        title="Deck Stain Calculator: Gallons for a Deck",
        desc="Work out the stain a deck needs by adding the floor, both faces of the railing and the steps, then dividing by the coverage per gallon.",
        what=("<p><strong>Total area = floor + railing + stairs</strong>, and <strong>gallons = area × "
              "coats ÷ coverage</strong>.</p>"),
        fields=[
            F("deck_length", "Deck length", "ft", 16, "Along the house"),
            F("deck_width", "Deck depth", "ft", 12, "Out from the house"),
            F("rail_length", "Railing length", "ft", 40, "Total run of rail"),
            F("rail_height", "Railing height", "ft", 3, "Top rail to deck"),
            F("stair_steps", "Stair steps", "", 3, "Count the treads"),
            F("stair_width", "Stair width", "ft", 4, "Wall to wall"),
            F("rise", "Riser", "in", 7.5, "Per step"),
            F("run", "Tread", "in", 10, "Per step"),
            F("coats", "Coats", "", 2, "Two is usual on bare timber"),
            F("coverage", "Coverage", "ft²/gal", 250, "250 on new timber"),
            F("price", "Price", "$/gal", 45, "Per gallon"),
        ],
        results=[
            R("floor_area", "Floor area", "ft²"),
            R("rail_area", "Railing area", "ft²"),
            R("stair_area", "Stair area", "ft²"),
            R("total_area", "Total area", "ft²"),
            R("gallons", "Stain", "gal"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "floor_area": "deck_length*deck_width",
            "rail_area": "rail_length*rail_height*2",
            "stair_area": "stair_steps*(rise+run)/12*stair_width",
            "total_area": "deck_length*deck_width+rail_length*rail_height*2+stair_steps*(rise+run)/12*stair_width",
            "gallons": "(deck_length*deck_width+rail_length*rail_height*2+stair_steps*(rise+run)/12*stair_width)*coats/coverage",
            "cost": "ceil((deck_length*deck_width+rail_length*rail_height*2+stair_steps*(rise+run)/12*stair_width)*coats/coverage)*price",
            "deck_length": "floor_area/deck_width",
            "deck_width": "floor_area/deck_length",
            "rail_length": "rail_area/(rail_height*2)",
            "rail_height": "rail_area/(rail_length*2)",
            "stair_steps": "stair_area/((rise+run)/12*stair_width)",
            "stair_width": "stair_area/(stair_steps*(rise+run)/12)",
            "rise": "stair_area/(stair_steps*stair_width)*12-run",
            "run": "stair_area/(stair_steps*stair_width)*12-rise",
            "coats": "gallons*coverage/total_area",
            "coverage": "total_area*coats/gallons",
            "price": "cost/ceil(gallons)",
        },
        prose={
            "why": ("<p>A deck is mostly not the floor. The railing is a fence on top of it and takes stain "
                    "on both faces, and the steps are the part everyone forgets until the tin runs dry "
                    "halfway down them.</p>"),
            "formula_note": ("<p>The railing is counted twice because it is stained from both sides — that "
                             "factor of two is the single biggest correction to a naive floor-area estimate. "
                             "Steps flatten out the same way they do for carpet: riser plus tread per "
                             "step.</p>"),
            "example_note": ("<p>A 16 by 12 deck has {floor_area|unit} of floor and {rail_area|unit} of "
                             "railing, plus {stair_area|unit} of steps — {total_area|unit} in all. Two coats "
                             "at 250 ft² a gallon is {gallons} gallons, or {cost} at $45.</p>"),
            "reading": ("<p>Read the total against the floor: a deck with a full railing runs close to twice "
                        "its floor area. If the total is barely above the floor, the railing factor has been "
                        "left out.</p>"),
            "scenarios": [
                {"inputs": {"deck_length": 24, "deck_width": 16, "rail_length": 60, "rail_height": 3,
                            "stair_steps": 5, "stair_width": 4, "rise": 7, "run": 11, "coats": 2,
                            "coverage": 200, "price": 50},
                 "note": "A large deck on new timber: the coverage drops and the gallons climb quickly."},
                {"inputs": {"deck_length": 10, "deck_width": 8, "rail_length": 0, "rail_height": 3,
                            "stair_steps": 0, "stair_width": 3, "rise": 7.5, "run": 10, "coats": 1,
                            "coverage": 300, "price": 40},
                 "note": "A bare platform with no railing and one coat: the floor area is the whole job."},
            ],
            "pitfalls": [
                "<strong>Railing counted once.</strong> Both faces take stain.",
                "<strong>Floor area used as total.</strong> Railing and steps add a third or more.",
                "<strong>New timber coverage.</strong> It drinks the first coat at half the label figure.",
            ],
            "units_note": ("<p>Deck dimensions in feet, risers and treads in inches, areas in square feet, "
                           "coverage in square feet per gallon and cost in dollars.</p>"),
            "limits": [
                "<strong>Flat surfaces only.</strong> Baluster faces are counted inside the railing "
                "allowance.",
                "<strong>One product.</strong> A two-tone deck is two calculations.",
            ],
            "uses": [
                "<li>Buying stain for a deck.</li>",
                "<li>Comparing a clear sealer with a solid stain.</li>",
                "<li>Estimating an annual recoat.</li>",
            ],
        },
        faq=[
            ("How many gallons to stain a 16 by 12 deck?",
             "About 3.2 gallons for two coats once the railing and steps are included."),
            ("Does a railing take more stain than the deck?",
             "Often nearly as much — it is stained on both faces and has more edges."),
        ],
        related=[("/construction/decking", "Decking"),
                 ("/construction/fence-stain", "Fence stain"),
                 ("/construction/paint", "Paint")],
    ),

    S(
        slug="fence-stain",
        name="Fence stain",
        title="Fence Stain Calculator: Gallons and Cost",
        desc="Work out how much stain a fence needs from its length, height and the number of faces you are coating, with coats, coverage and the cost per gallon.",
        what=("<p><strong>Area = length × height × faces</strong>, and <strong>gallons = area × coats ÷ "
              "coverage</strong>.</p>"),
        fields=[
            F("length", "Fence length", "ft", 100, "Total run"),
            F("height", "Fence height", "ft", 6, "Above ground"),
            F("faces", "Faces to stain", "", 2, "Two for a boundary fence"),
            F("coats", "Coats", "", 2, "Two on bare timber"),
            F("coverage", "Coverage", "ft²/gal", 200, "200 on rough sawn"),
            F("price", "Price", "$/gal", 42, "Per gallon"),
        ],
        results=[
            R("area_ft2", "Area", "ft²"),
            R("gallons", "Stain", "gal"),
            R("cans", "Cans to buy", ""),
            R("cost", "Cost", "$"),
        ],
        formula={
            "area_ft2": "length*height*faces",
            "gallons": "length*height*faces*coats/coverage",
            "cans": "ceil(length*height*faces*coats/coverage)",
            "cost": "ceil(length*height*faces*coats/coverage)*price",
            "length": "area_ft2/(height*faces)",
            "height": "area_ft2/(length*faces)",
            "faces": "area_ft2/(length*height)",
            "coats": "gallons*coverage/area_ft2",
            "coverage": "area_ft2*coats/gallons",
            "price": "cost/cans",
        },
        prose={
            "why": ("<p>A hundred feet of six-foot fence is six hundred square feet a side, and a boundary "
                    "fence has to be done both sides or it looks unfinished from the neighbour's garden. That "
                    "doubling is the difference between two gallons and four.</p>"),
            "formula_note": ("<p>Length times height gives one face; the faces box multiplies it. Rough sawn "
                             "timber takes about 200 ft² a gallon, planed timber nearer 300, so the coverage "
                             "figure is the one input worth checking against the tin.</p>"),
            "example_note": ("<p>A hundred feet of 6 ft fence stained both sides is {area_ft2|unit}. Two "
                             "coats at 200 ft² a gallon is {gallons} gallons — {cans} cans and {cost}.</p>"),
            "reading": ("<p>Read the gallons against the fence: a hundred feet of six-foot fence takes about "
                        "three gallons a coat per side. If the total is under two, one face has been "
                        "counted.</p>"),
            "scenarios": [
                {"inputs": {"length": 60, "height": 4, "faces": 1, "coats": 1, "coverage": 300,
                            "price": 38},
                 "note": "A low fence with one good side and a single refresher coat."},
                {"inputs": {"length": 200, "height": 6, "faces": 2, "coats": 2, "coverage": 175,
                            "price": 48},
                 "note": "A long boundary in rough sawn timber: the coverage drops and the order grows."},
            ],
            "pitfalls": [
                "<strong>One face counted.</strong> A boundary fence is stained both sides.",
                "<strong>Coverage from a smooth-timber tin.</strong> Rough sawn takes a third more.",
                "<strong>Posts and rails left out.</strong> Add ten per cent for the edges and ends.",
            ],
            "units_note": ("<p>Length and height in feet, faces and coats as counts, area in square feet, "
                           "coverage in square feet per gallon and cost in dollars.</p>"),
            "limits": [
                "<strong>A flat run.</strong> Slatted and lattice panels have far more surface.",
                "<strong>One product.</strong> Clear and solid stains cover differently.",
            ],
            "uses": [
                "<li>Buying stain for a fence.</li>",
                "<li>Comparing one side with two.</li>",
                "<li>Pricing a fence maintenance job.</li>",
            ],
        },
        faq=[
            ("How much stain for 100 feet of 6 ft fence?",
             "About 3 gallons per face per coat at 200 ft² a gallon."),
            ("Should I stain both sides of a fence?",
             "Yes — an untreated back face weathers faster and the fence lasts longer when both are sealed."),
        ],
        related=[("/construction/fence", "Fence"),
                 ("/construction/deck-stain", "Deck stain"),
                 ("/construction/paint", "Paint")],
    ),

    S(
        slug="epoxy",
        name="Epoxy",
        title="Epoxy Floor Calculator: Kits and Cost",
        desc="Work out how many epoxy kits a garage floor needs from its area, the number of coats and the coverage per kit, with a waste allowance and the cost.",
        what=("<p><strong>Kits = ceiling(area × coats × (1 + waste) ÷ coverage per kit)</strong>, and the "
              "cost is kits times the price.</p>"),
        fields=[
            F("length", "Floor length", "ft", 20, "Garage length"),
            F("width", "Floor width", "ft", 20, "Garage width"),
            F("coats", "Coats", "", 2, "A base and a top coat"),
            F("coverage", "Coverage per kit", "ft²", 250, "At the film thickness sold"),
            F("waste", "Waste", "%", 10, "Roller loss and edges"),
            F("price", "Price per kit", "$", 120, "Delivered"),
        ],
        results=[
            R("area_ft2", "Area", "ft²"),
            R("coated_ft2", "Coated area", "ft²"),
            R("kits", "Kits", ""),
            R("cost", "Cost", "$"),
        ],
        formula={
            "area_ft2": "length*width",
            "coated_ft2": "length*width*coats*(1+waste/100)",
            "kits": "ceil(length*width*coats*(1+waste/100)/coverage)",
            "cost": "ceil(length*width*coats*(1+waste/100)/coverage)*price",
            "length": "area_ft2/width",
            "width": "area_ft2/length",
            "coats": "coated_ft2/(area_ft2*(1+waste/100))",
            "waste": "(coated_ft2/(area_ft2*coats)-1)*100",
            "price": "cost/kits",
        },
        prose={
            "why": ("<p>Epoxy is sold in kits that cover a stated area at a stated thickness, and the two "
                    "are tied together: spreading a kit thinner to save money gives a coat that wears "
                    "through in a year. Running out mid-pour is worse than buying a spare kit, because the "
                    "join shows.</p>"),
            "formula_note": ("<p>The area is multiplied by the number of coats before the kit count, because "
                             "a two-coat system uses twice the material. The waste allowance covers the "
                             "roller loss that never reaches the floor and the extra at the walls.</p>"),
            "example_note": ("<p>A 20 by 20 ft garage is {area_ft2|unit}. Two coats with ten per cent waste "
                             "is {coated_ft2|unit} of coverage to buy — {kits} kits at 250 ft² each, and "
                             "{cost}.</p>"),
            "reading": ("<p>Read the kits against the area: a single-car garage lands near two kits, a double "
                        "near four. If a two-car garage asks for eight, the coverage has been entered for a "
                        "single coat.</p>"),
            "scenarios": [
                {"inputs": {"length": 24, "width": 24, "coats": 2, "coverage": 200, "waste": 15,
                            "price": 135},
                 "note": "A larger garage on a porous slab: more waste and a heavier film."},
                {"inputs": {"length": 12, "width": 10, "coats": 1, "coverage": 300, "waste": 5,
                            "price": 95},
                 "note": "A small utility room with a single coat over a sealed floor."},
            ],
            "pitfalls": [
                "<strong>One coat counted.</strong> Most systems need a base and a top.",
                "<strong>Coverage for a thin film.</strong> The kit covers less at the thickness that "
                "lasts.",
                "<strong>Moisture left in the slab.</strong> No kit count saves a floor that blisters.",
            ],
            "units_note": ("<p>Floor dimensions in feet, area in square feet, coverage in square feet per kit, "
                           "kits as a whole count and cost in dollars.</p>"),
            "limits": [
                "<strong>A sound, dry slab.</strong> New concrete needs curing first.",
                "<strong>One system.</strong> Flake, metallic and mortar systems differ.",
            ],
            "uses": [
                "<li>Buying epoxy for a garage.</li>",
                "<li>Comparing kits by coverage.</li>",
                "<li>Pricing a floor coating.</li>",
            ],
        },
        faq=[
            ("How many epoxy kits for a 2-car garage?",
             "About four 250 ft² kits for two coats on a 400 ft² floor with ten per cent waste."),
            ("Can I apply epoxy in one coat?",
             "A single coat can work on a sealed floor, but a base plus top coat wears far better."),
        ],
        no_round_trip=["coverage"],
        related=[("/construction/concrete-slab", "Concrete slab"),
                 ("/construction/paint", "Paint"),
                 ("/construction/flooring", "Flooring")],
    ),
]
