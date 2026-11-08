"""Batch 4b — asphalt, paving, drywall, siding and trim."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="asphalt",
        name="Asphalt",
        title="Asphalt Calculator: Tons for a Driveway",
        desc="Work out the asphalt a driveway takes in tons and tonnes from its length, width and compacted depth, with a waste allowance and the delivered cost.",
        what=("<p><strong>Volume = length × width × depth</strong>, then <strong>tons = volume × density ÷ "
              "2 000</strong>, with a compaction allowance on top.</p>"),
        fields=[
            F("length", "Drive length", "ft", 40, "Along the run"),
            F("width", "Drive width", "ft", 12, "Carriageway"),
            F("depth", "Compacted depth", "in", 3, "Finished thickness"),
            F("density", "Density", "lb/ft³", 145, "145 for hot-mix asphalt"),
            F("waste", "Over-order", "%", 5, "Edges and joints"),
            F("price", "Price", "$/ton", 120, "Delivered and laid"),
        ],
        results=[
            R("volume_yd3", "Volume", "yd³"),
            R("tons", "Tons", ""),
            R("tonnes", "Tonnes", "t"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "volume_yd3": "length*width*depth/12*(1+waste/100)/27",
            "tons": "length*width*depth/12*(1+waste/100)*density/2000",
            "tonnes": "length*width*depth/12*(1+waste/100)*density/2204.62",
            "cost": "length*width*depth/12*(1+waste/100)*density/2000*price",
            "length": "27*volume_yd3/(width*depth/12*(1+waste/100))",
            "width": "27*volume_yd3/(length*depth/12*(1+waste/100))",
            "depth": "324*volume_yd3/(length*width*(1+waste/100))",
            "density": "tons*2000/(length*width*depth/12*(1+waste/100))",
            "waste": "(tons/(length*width*depth/12*density/2000)-1)*100",
            "price": "cost/tons",
        },
        prose={
            "why": ("<p>Asphalt is ordered by the ton and laid by the inch, and the density is the number that "
                    "connects them: a ton of hot-mix covers about 80 square feet at two inches. Getting the "
                    "tonnage wrong means a lorry sent away or a driveway that finishes two inches thin at "
                    "the gate.</p>"),
            "formula_note": ("<p>Hot-mix asphalt is about 145 lb/ft³ laid and compacted, which works out near "
                             "1.95 tons to the cubic yard. The over-order is small here — five per cent "
                             "covers the joints and edges — because surplus hot-mix is expensive to "
                             "waste.</p>"),
            "example_note": ("<p>A drive 40 by 12 ft at three inches is {volume_yd3|unit} of asphalt, "
                             "weighing {tons} tons — {tonnes} tonnes. At $120 a ton, laid, that is "
                             "{cost}.</p>"),
            "reading": ("<p>Read the tons against the volume: asphalt is close to two tons to the cubic yard. "
                        "If the figure is far off, the density has been entered as kilograms per cubic metre, "
                        "which is about 2 400.</p>"),
            "scenarios": [
                {"inputs": {"length": 60, "width": 15, "depth": 4, "density": 145, "waste": 5,
                            "price": 115},
                 "note": "A heavier section for a drive used by vans: four inches instead of three."},
                {"inputs": {"length": 20, "width": 10, "depth": 2, "density": 145, "waste": 8,
                            "price": 130},
                 "note": "A patch or a footpath: two inches, and a larger over-order for the small "
                         "area."},
            ],
            "pitfalls": [
                "<strong>Loose depth used instead of compacted.</strong> Asphalt compacts by about a "
                "quarter.",
                "<strong>Density in metric.</strong> 2 400 kg/m³ is the same material in other units.",
                "<strong>Base left out of the price.</strong> The sub-base is a separate line.",
            ],
            "units_note": ("<p>Length and width in feet, depth in inches, volume in cubic yards, weight in "
                           "short tons and tonnes, cost in dollars per ton.</p>"),
            "limits": [
                "<strong>A flat rectangle.</strong> Camber and tie-ins add a little.",
                "<strong>Material and lay only.</strong> Excavation and edging are separate.",
            ],
            "uses": [
                "<li>Ordering asphalt for a drive.</li>",
                "<li>Pricing a resurfacing job.</li>",
                "<li>Checking a contractor's tonnage.</li>",
            ],
        },
        faq=[
            ("How many tons of asphalt for a 40 by 12 drive?",
             "About 9 tons at three inches with five per cent over-order."),
            ("How thick should an asphalt drive be?",
             "Two to three inches over a prepared base for cars, four for heavier traffic."),
        ],
        related=[("/construction/road-base", "Road base"),
                 ("/construction/gravel-driveway", "Gravel driveway"),
                 ("/construction/paver", "Paver")],
    ),

    S(
        slug="paver",
        name="Paver",
        title="Paver Calculator: Blocks, Sand and Cost",
        desc="Work out how many pavers a patio needs from its area and the block size, with the joint, a waste allowance and the price per block.",
        what=("<p><strong>Pavers = ceiling(area × (1 + waste) ÷ module)</strong>, where the module is the "
              "block plus its joint, and the cost follows from the count.</p>"),
        fields=[
            F("length", "Patio length", "ft", 16, "Being paved"),
            F("width", "Patio width", "ft", 12, "Across it"),
            F("paver_length", "Paver length", "in", 8, "Nominal block size"),
            F("paver_width", "Paver width", "in", 4, "Nominal block size"),
            F("joint", "Joint width", "in", 0.125, "Sand joint"),
            F("waste", "Waste", "%", 10, "Cuts and breakage"),
            F("price", "Price per paver", "$", 1.4, "Delivered"),
        ],
        results=[
            R("area_ft2", "Area", "ft²"),
            R("module_ft2", "Paver module", "ft²"),
            R("pavers", "Pavers", ""),
            R("cost", "Cost", "$"),
        ],
        formula={
            "area_ft2": "length*width",
            "module_ft2": "(paver_length+joint)*(paver_width+joint)/144",
            "pavers": "ceil(length*width*(1+waste/100)/((paver_length+joint)*(paver_width+joint)/144))",
            "cost": "ceil(length*width*(1+waste/100)/((paver_length+joint)*(paver_width+joint)/144))*price",
            "length": "area_ft2/width",
            "width": "area_ft2/length",
            "paver_length": "module_ft2*144/(paver_width+joint)-joint",
            "paver_width": "module_ft2*144/(paver_length+joint)-joint",
            "price": "cost/pavers",
        },
        prose={
            "why": ("<p>Pavers are sold by the piece and laid on a pattern, and the count depends on the "
                    "joint as much as the block: a 4 by 8 block with an eighth-inch joint covers a little "
                    "under a quarter of a square foot, so a hundred square feet is well over four hundred "
                    "blocks.</p>"),
            "formula_note": ("<p>The joint is added to both sides of every block, which is what makes the "
                             "grid close. The waste allowance then covers the edge cuts, and since pavers "
                             "are bought by the piece rather than the pallet, the count rounds up once.</p>"),
            "example_note": ("<p>A 16 by 12 ft patio is {area_ft2|unit}. In 4 by 8 blocks with an eighth-inch "
                             "joint each module is {module_ft2|unit}, so the job takes {pavers} pavers and "
                             "{cost} at $1.40 each.</p>"),
            "reading": ("<p>Read the count against the area: 4 by 8 pavers work out near four and a half "
                        "per square foot, and 12 in squares near one. A count far above that means the block "
                        "size has been entered in centimetres rather than inches.</p>"),
            "scenarios": [
                {"inputs": {"length": 20, "width": 14, "paver_length": 12, "paver_width": 12, "joint": 0.125,
                            "waste": 8, "price": 3.2},
                 "note": "Large square pavers: a quarter of the pieces at twice the price."},
                {"inputs": {"length": 30, "width": 10, "paver_length": 8, "paver_width": 4, "joint": 0.125,
                            "waste": 15, "price": 1.1},
                 "note": "A long path with a lot of cutting: the waste allowance climbs."},
            ],
            "pitfalls": [
                "<strong>Joint left out.</strong> The sand joint is part of the module.",
                "<strong>Waste too low.</strong> A curved edge can waste twenty per cent.",
                "<strong>Bedding sand forgotten.</strong> It is a separate calculation.",
            ],
            "units_note": ("<p>Patio dimensions in feet, paver size and joint in inches, module in square "
                           "feet, pavers as a whole count and cost in dollars.</p>"),
            "limits": [
                "<strong>A rectangular area.</strong> Circles and curves need a layout drawing.",
                "<strong>Pavers only.</strong> Base, bedding sand and edging are extra.",
            ],
            "uses": [
                "<li>Ordering pavers for a patio.</li>",
                "<li>Comparing block sizes by count.</li>",
                "<li>Pricing a paving job.</li>",
            ],
        },
        faq=[
            ("How many pavers in a square foot?",
             "About 4.5 for a 4 by 8 block with a sand joint, and one for a 12 in square."),
            ("How much waste should I allow for pavers?",
             "Ten per cent for a straight layout and fifteen for a curved one."),
        ],
        no_round_trip=["waste", "joint"],
        related=[("/construction/paver-sand", "Paver sand"),
                 ("/construction/tile", "Tile"),
                 ("/construction/asphalt", "Asphalt")],
    ),

    S(
        slug="paver-sand",
        name="Paver sand",
        title="Paver Sand Calculator: Bags and Volume",
        desc="Work out the bedding sand a paver patio needs in cubic feet, tons and 50 lb bags from the area and the depth of the sand course.",
        what=("<p><strong>Volume = area × depth</strong>, and <strong>bags = ceiling(volume ÷ 0.5)</strong> "
              "for 50 lb bags of damp sand.</p>"),
        fields=[
            F("area", "Patio area", "ft²", 200, "Being paved"),
            F("depth", "Sand depth", "in", 1, "One inch is the usual bedding"),
            F("density", "Sand density", "lb/ft³", 100, "100 for damp bedding sand"),
            F("waste", "Waste", "%", 10, "Losses and screeding"),
            F("price", "Price per bag", "$", 6, "50 lb bag"),
        ],
        results=[
            R("volume_ft3", "Volume", "ft³"),
            R("tons", "Weight", "tons"),
            R("bags", "Bags", ""),
            R("cost", "Cost", "$"),
        ],
        formula={
            "volume_ft3": "area*depth/12*(1+waste/100)",
            "tons": "area*depth/12*(1+waste/100)*density/2000",
            "bags": "ceil(area*depth/12*(1+waste/100)*density/50)",
            "cost": "ceil(area*depth/12*(1+waste/100)*density/50)*price",
            "area": "12*volume_ft3/(depth*(1+waste/100))",
            "depth": "12*volume_ft3/(area*(1+waste/100))",
            "waste": "(volume_ft3/(area*depth/12)-1)*100",
            "price": "cost/bags",
        },
        prose={
            "why": ("<p>Bedding sand is what the pavers sit on, and the course is thin — an inch is normal, "
                    "and anything deeper settles unevenly. Because it is thin, the tonnage is small and the "
                    "bag count is what people actually buy.</p>"),
            "formula_note": ("<p>Damp bedding sand weighs about 100 lb/ft³, so an inch over a hundred square "
                             "feet is a little over eight cubic feet, or about half a ton. Bags are sold at "
                             "50 lb, which is 0.5 ft³ each.</p>"),
            "example_note": ("<p>A 200 ft² patio with an inch of bedding sand and ten per cent waste is "
                             "{volume_ft3|unit} of sand — {tons} tons, or {bags} bags, and {cost} at $6 a "
                             "bag.</p>"),
            "reading": ("<p>Read the volume against the area: an inch of sand covers 12 ft² per cubic foot, "
                        "so a hundred square feet is eight and a bit. If the volume is far higher, the depth "
                        "has been entered in centimetres.</p>"),
            "scenarios": [
                {"inputs": {"area": 500, "depth": 1, "density": 100, "waste": 12, "price": 5},
                 "note": "A driveway in pavers: the same inch, five times the area."},
                {"inputs": {"area": 60, "depth": 2, "density": 100, "waste": 15, "price": 7},
                 "note": "A small terrace over an uneven base, where the bedding is thicker."},
            ],
            "pitfalls": [
                "<strong>Masonry sand ordered as bedding.</strong> Bedding sand is sharp and graded.",
                "<strong>Depth over an inch.</strong> A thick bed compacts unevenly and the pavers rock.",
                "<strong>Joint sand forgotten.</strong> It is swept in afterwards and is a separate bag "
                "count.",
            ],
            "units_note": ("<p>Area in square feet, depth in inches, volume in cubic feet, weight in short "
                           "tons, bags at 50 lb and cost in dollars.</p>"),
            "limits": [
                "<strong>A level course.</strong> Slopes and steps change the thickness.",
                "<strong>Bedding only.</strong> The base is compacted stone, not sand.",
            ],
            "uses": [
                "<li>Buying bedding sand.</li>",
                "<li>Checking a bulk order against bags.</li>",
                "<li>Estimating a small patio.</li>",
            ],
        },
        faq=[
            ("How much sand under pavers?",
             "One inch of bedding sand, which is about 0.083 ft³ per square foot."),
            ("How many bags of sand for 200 square feet?",
             "About 50 bags of 50 lb at an inch deep with ten per cent waste."),
        ],
        no_round_trip=["density"],
        related=[("/construction/paver", "Paver"),
                 ("/construction/sand", "Sand"),
                 ("/construction/road-base", "Road base")],
    ),

    S(
        slug="drywall",
        name="Drywall",
        title="Drywall Calculator: Sheets, Mud and Tape",
        desc="Work out the drywall sheets a wall or ceiling needs from its area, the sheet size and waste, with joint compound, tape, screws and the cost.",
        what=("<p><strong>Sheets = ceiling(area × (1 + waste) ÷ sheet area)</strong>, and the mud, tape and "
              "screws follow from the sheet count.</p>"),
        fields=[
            F("length", "Room length", "ft", 16, "Wall to wall"),
            F("width", "Room width", "ft", 12, "Wall to wall"),
            F("height", "Ceiling height", "ft", 8, "Floor to ceiling"),
            F("waste", "Waste", "%", 10, "Cuts and breaks"),
            F("sheet_area", "Sheet area", "ft²", 32, "4 × 8 is 32 ft²"),
            F("price", "Price per sheet", "$", 16, "Delivered"),
        ],
        results=[
            R("area_ft2", "Wall area", "ft²"),
            R("sheets", "Sheets", ""),
            R("mud_lb", "Joint compound", "lb"),
            R("tape_ft", "Tape", "ft"),
            R("screws", "Screws", ""),
            R("cost", "Cost", "$"),
        ],
        formula={
            "area_ft2": "2*(length+width)*height",
            "sheets": "ceil(2*(length+width)*height*(1+waste/100)/sheet_area)",
            "mud_lb": "2*(length+width)*height*0.1",
            "tape_ft": "2*(length+width)*height*0.5",
            "screws": "ceil(2*(length+width)*height*1.1)",
            "cost": "ceil(2*(length+width)*height*(1+waste/100)/sheet_area)*price",
            "length": "area_ft2/(2*height)-width",
            "width": "area_ft2/(2*height)-length",
            "height": "area_ft2/(2*(length+width))",
            "waste": "(sheets*sheet_area/area_ft2-1)*100",
            "price": "cost/sheets",
        },
        prose={
            "why": ("<p>Drywall is cheap per sheet and expensive per trip, and the hanging is only half the "
                    "job: the mud, tape and screws have to arrive with the boards. A room's wall area is the "
                    "starting point, and every sheet of 4 by 8 covers 32 square feet of it.</p>"),
            "formula_note": ("<p>The sheet count rounds up because a wall is never a whole number of boards. "
                             "The other three figures are rules of thumb from site practice: about a tenth of "
                             "a pound of joint compound per square foot, half a foot of tape, and a screw "
                             "every square foot with a tenth over for studs and corners.</p>"),
            "example_note": ("<p>A room 16 by 12 with an 8 ft ceiling has {area_ft2|unit} of wall. That is "
                             "{sheets} sheets with ten per cent for cuts, {mud_lb} lb of joint compound, "
                             "{tape_ft} ft of tape and {screws} screws — {cost} in board.</p>"),
            "reading": ("<p>Read the sheets against the area: a 32 ft² sheet means roughly one sheet per 29 "
                        "square feet once waste is allowed. If the count is near the area itself, the sheet "
                        "size has been entered as 1.</p>"),
            "scenarios": [
                {"inputs": {"length": 20, "width": 16, "height": 9, "waste": 12, "sheet_area": 48,
                            "price": 24},
                 "note": "A large room in 4 by 12 sheets: fewer joints to tape, heavier to handle."},
                {"inputs": {"length": 10, "width": 8, "height": 8, "waste": 8, "sheet_area": 32,
                            "price": 14},
                 "note": "A small bedroom: fewer than ten sheets and one bucket of mud."},
            ],
            "pitfalls": [
                "<strong>Ceiling left out.</strong> Add length × width if it is being boarded.",
                "<strong>Waste below ten per cent.</strong> Doorways and corners always cut.",
                "<strong>Fire-rated board priced as standard.</strong> The sheet price differs.",
            ],
            "units_note": ("<p>Room dimensions in feet, area and sheet size in square feet, compound in pounds, "
                           "tape in feet, screws as a count and cost in dollars.</p>"),
            "limits": [
                "<strong>Plain board.</strong> Moisture and fire boards are a different spec.",
                "<strong>Rules of thumb.</strong> Heavy texture and many corners take more mud.",
            ],
            "uses": [
                "<li>Buying drywall for a room.</li>",
                "<li>Ordering mud and tape in one pass.</li>",
                "<li>Comparing sheet sizes.</li>",
            ],
        },
        faq=[
            ("How many sheets of drywall for a 12 by 16 room?",
             "About 20 sheets of 4 by 8 for the walls with ten per cent waste."),
            ("How much joint compound per sheet?",
             "About 3 lb a sheet, which is a tenth of a pound per square foot."),
        ],
        no_round_trip=["waste", "sheet_area"],
        related=[("/construction/paint", "Paint"),
                 ("/construction/framing", "Framing"),
                 ("/construction/insulation", "Insulation")],
    ),

    S(
        slug="siding",
        name="Siding",
        title="Siding Calculator: Squares, Openings and Cost",
        desc="Work out the siding a wall or a gable needs in square feet and squares, with doors and windows deducted, waste added and the cost per square.",
        what=("<p><strong>Wall area = perimeter run × height</strong>, plus the gable triangle, less the "
              "openings; a square is 100 ft².</p>"),
        fields=[
            F("wall_length", "Wall length", "ft", 40, "The run being clad"),
            F("height", "Height", "ft", 9, "Eave to ground"),
            F("gable_rise", "Gable rise", "ft", 0, "Eave to ridge, 0 for a flat wall"),
            F("doors", "Doors", "", 1, "Opening count"),
            F("door_area", "Each door", "ft²", 21, "Standard door"),
            F("windows", "Windows", "", 4, "Opening count"),
            F("window_area", "Each window", "ft²", 15, "Measured opening"),
            F("waste", "Waste", "%", 10, "Laps and cuts"),
            F("price", "Price", "$/square", 320, "100 ft² supplied and fitted"),
        ],
        results=[
            R("wall_area", "Gross area", "ft²"),
            R("net_area", "Siding needed", "ft²"),
            R("squares", "Squares", ""),
            R("cost", "Cost", "$"),
        ],
        formula={
            "wall_area": "wall_length*height+wall_length*gable_rise/2",
            "net_area": "wall_length*height+wall_length*gable_rise/2-doors*door_area-windows*window_area",
            "squares": "(wall_length*height+wall_length*gable_rise/2-doors*door_area-windows*window_area)*(1+waste/100)/100",
            "cost": "(wall_length*height+wall_length*gable_rise/2-doors*door_area-windows*window_area)*(1+waste/100)/100*price",
            "wall_length": "wall_area/(height+gable_rise/2)",
            "height": "wall_area/wall_length-gable_rise/2",
            "gable_rise": "2*(wall_area/wall_length-height)",
            "doors": "(wall_length*height+wall_length*gable_rise/2-windows*window_area-net_area)/door_area",
            "windows": "(wall_length*height+wall_length*gable_rise/2-doors*door_area-net_area)/window_area",
            "waste": "(squares*100/net_area-1)*100",
            "price": "cost/squares",
        },
        prose={
            "why": ("<p>Siding is quoted in squares — a hundred square feet — and the gable end above a plain "
                    "wall can add a fifth to the order. Openings come off, but only at face value, because "
                    "the cut pieces around a window cannot be used elsewhere.</p>"),
            "formula_note": ("<p>A gable is a triangle on top of a rectangle, so its area is half the span "
                             "times the rise. The waste allowance covers the laps that siding needs and the "
                             "cuts at every opening and corner.</p>"),
            "example_note": ("<p>A 40 ft wall 9 ft high with no gable is {wall_area|unit}. One door and four "
                             "windows take off 81 ft², leaving {net_area|unit} — {squares} squares with ten "
                             "per cent waste, and {cost} at $320 a square.</p>"),
            "reading": ("<p>Read the squares against the area: a hundred square feet is one square, so the "
                        "figures should be in that ratio. If the squares come out near the square footage, "
                        "the divisor of 100 has been dropped.</p>"),
            "scenarios": [
                {"inputs": {"wall_length": 32, "height": 8, "gable_rise": 6, "doors": 1, "door_area": 21,
                            "windows": 2, "window_area": 15, "waste": 12, "price": 380},
                 "note": "A gable end in vinyl: the triangle adds two hundred square feet."},
                {"inputs": {"wall_length": 60, "height": 10, "gable_rise": 0, "doors": 2, "door_area": 42,
                            "windows": 6, "window_area": 20, "waste": 8, "price": 290},
                 "note": "A long barn wall with big openings: the deduction is a real part of the job."},
            ],
            "pitfalls": [
                "<strong>Gable measured as a rectangle.</strong> Half the span times the rise is the "
                "triangle.",
                "<strong>Openings deducted at the frame.</strong> Measure the opening, not the glass.",
                "<strong>Waste left at zero.</strong> Every corner and lap cuts.",
            ],
            "units_note": ("<p>Dimensions in feet, opening areas in square feet, siding in square feet and "
                           "squares, cost in dollars per square.</p>"),
            "limits": [
                "<strong>Flat walls and single gables.</strong> Dormers and bays need their own areas.",
                "<strong>Material and labour together.</strong> The price is per square, not per board.",
            ],
            "uses": [
                "<li>Ordering siding by the square.</li>",
                "<li>Comparing quotes from contractors.</li>",
                "<li>Checking a gable's contribution.</li>",
            ],
        },
        faq=[
            ("What is a square of siding?",
             "One hundred square feet of wall area."),
            ("Do you deduct windows and doors from siding?",
             "At face value, yes, but the offcuts around them are waste so the saving is smaller than it "
             "looks."),
        ],
        related=[("/construction/vinyl-siding", "Vinyl siding"),
                 ("/construction/wall-square-footage", "Wall square footage"),
                 ("/construction/shiplap", "Shiplap")],
    ),

    S(
        slug="vinyl-siding",
        name="Vinyl siding",
        title="Vinyl Siding Calculator: Panels and Trim",
        desc="Work out how many vinyl siding panels a wall takes, plus the J-channel, undersill and starter strip, and what the whole order costs.",
        what=("<p><strong>Panels = ceiling(area × (1 + waste) ÷ panel area)</strong>, and the trim runs "
              "follow the perimeter, the openings and the bottom course.</p>"),
        fields=[
            F("wall_length", "Wall length", "ft", 40, "The run being clad"),
            F("height", "Height", "ft", 9, "Eave to ground"),
            F("openings", "Openings", "ft", 60, "Total perimeter of doors and windows"),
            F("panel_length", "Panel length", "ft", 12, "12 ft is common"),
            F("panel_width", "Panel width", "in", 8, "Exposed width of a lap"),
            F("waste", "Waste", "%", 10, "Laps and cuts"),
            F("panel_price", "Price per panel", "$", 14, "Delivered"),
            F("trim_price", "Trim price", "$/ft", 2.5, "J-channel, undersill and starter"),
        ],
        results=[
            R("area_ft2", "Wall area", "ft²"),
            R("panel_area", "Panel coverage", "ft²"),
            R("panels", "Panels", ""),
            R("trim_ft", "Trim run", "ft"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "area_ft2": "wall_length*height",
            "panel_area": "panel_length*panel_width/12",
            "panels": "ceil(wall_length*height*(1+waste/100)/(panel_length*panel_width/12))",
            "trim_ft": "wall_length*2+openings+height*2",
            "cost": "ceil(wall_length*height*(1+waste/100)/(panel_length*panel_width/12))*panel_price+(wall_length*2+openings+height*2)*trim_price",
            "wall_length": "area_ft2/height",
            "height": "area_ft2/wall_length",
            "openings": "trim_ft-wall_length*2-height*2",
            "panel_length": "panel_area/(panel_width/12)",
            "panel_width": "panel_area/panel_length*12",
            "waste": "(panels*panel_area/area_ft2-1)*100",
            "panel_price": "(cost-(wall_length*2+openings+height*2)*trim_price)/panels",
        },
        prose={
            "why": ("<p>Vinyl is bought in panels that cover far less than their nominal area, because each "
                    "lap covers the one below it: an 8 in panel exposes about 4 to 6 in of wall. The trim is "
                    "the part that catches people out, since every window and door needs J-channel all the "
                    "way round.</p>"),
            "formula_note": ("<p>The panel's coverage is its length times its exposed width, not its full "
                             "width — a 12 in panel lapped to 8 in covers two thirds of its nominal area. The "
                             "trim run is the two ends, the top, the bottom course and every opening "
                             "perimeter.</p>"),
            "example_note": ("<p>A 40 by 9 ft wall is {area_ft2|unit}. A 12 ft panel at 8 in exposed covers "
                             "{panel_area|unit}, so the job takes {panels} panels and {trim_ft|unit} of trim "
                             "— {cost} at the prices entered.</p>"),
            "reading": ("<p>Read the panel count against the area: a 12 ft panel at 8 in exposed covers eight "
                        "square feet. If the count is half what that suggests, the full panel width has been "
                        "used instead of the exposed width.</p>"),
            "scenarios": [
                {"inputs": {"wall_length": 32, "height": 8, "openings": 40, "panel_length": 12.5,
                            "panel_width": 6, "waste": 12, "panel_price": 12, "trim_price": 2.2},
                 "note": "A narrower lap: same wall, a third more panels."},
                {"inputs": {"wall_length": 60, "height": 10, "openings": 120, "panel_length": 16,
                            "panel_width": 9, "waste": 8, "panel_price": 19, "trim_price": 2.8},
                 "note": "A commercial wall with many openings: the trim becomes a serious line item."},
            ],
            "pitfalls": [
                "<strong>Full panel width used.</strong> Only the exposed width covers wall.",
                "<strong>Trim measured as the wall only.</strong> Every opening adds its perimeter.",
                "<strong>Waste left at zero.</strong> Cutting around openings wastes both ends.",
            ],
            "units_note": ("<p>Wall dimensions in feet, panel width in inches, openings as a total perimeter "
                           "in feet, coverage in square feet, trim in feet and cost in dollars.</p>"),
            "limits": [
                "<strong>A flat wall.</strong> Gables add a triangle, and soffits are separate.",
                "<strong>One profile.</strong> Board-and-batten and insulated profiles cover "
                "differently.",
            ],
            "uses": [
                "<li>Ordering vinyl siding panels.</li>",
                "<li>Estimating the trim with the panels.</li>",
                "<li>Comparing lap profiles.</li>",
            ],
        },
        faq=[
            ("How many panels of vinyl siding for a 40 ft wall?",
             "About 47 panels of 12 ft at 8 in exposed with ten per cent waste."),
            ("How much does a panel of vinyl siding cover?",
             "Its length times the exposed width — eight square feet for a 12 ft panel lapped to 8 in."),
        ],
        no_round_trip=["waste"],
        related=[("/construction/siding", "Siding"),
                 ("/construction/shiplap", "Shiplap"),
                 ("/construction/framing", "Framing")],
    ),

    S(
        slug="wainscoting",
        name="Wainscoting",
        title="Wainscoting Calculator: Panel Widths and Layout",
        desc="Work out the width of each wainscot panel and their height from the wall length, the number of panels, the stiles and the rails above and below.",
        what=("<p><strong>Panel width = (wall length − 2 × end margin − (panels − 1) × stile) ÷ panels</strong>, "
              "and the height comes off the chair rail less the base.</p>"),
        fields=[
            F("wall_length", "Wall length", "ft", 12, "The run being panelled"),
            F("panels", "Number of panels", "", 5, "Equal widths"),
            F("stile", "Stile width", "in", 4, "Between panels"),
            F("end_margin", "End margin", "in", 4, "Wall end to first panel"),
            F("rail_height", "Chair rail height", "in", 36, "Floor to rail top"),
            F("base_height", "Baseboard height", "in", 5, "Floor to base top"),
            F("rail_width", "Rail width", "in", 3, "Chair rail moulding"),
        ],
        results=[
            R("panel_width", "Panel width", "in"),
            R("panel_height", "Panel height", "in"),
            R("panel_area", "Panel area", "ft²"),
            R("stile_run", "Stile run", "ft"),
        ],
        formula={
            "panel_width": "(wall_length*12-2*end_margin-(panels-1)*stile)/panels",
            "panel_height": "rail_height-base_height-2*rail_width",
            "panel_area": "panels*((wall_length*12-2*end_margin-(panels-1)*stile)/panels)*(rail_height-base_height-2*rail_width)/144",
            "stile_run": "((panels-1)*stile+2*end_margin)/12",
            "wall_length": "(panels*panel_width+(panels-1)*stile+2*end_margin)/12",
            "panels": "(wall_length*12-2*end_margin+stile)/(panel_width+stile)",
            "stile": "(wall_length*12-2*end_margin-panels*panel_width)/(panels-1)",
            "end_margin": "(wall_length*12-(panels-1)*stile-panels*panel_width)/2",
            "rail_height": "panel_height+base_height+2*rail_width",
            "base_height": "rail_height-panel_height-2*rail_width",
            "rail_width": "(rail_height-base_height-panel_height)/2",
        },
        prose={
            "why": ("<p>Wainscoting is a layout problem before it is a material problem: the panels have to be "
                    "equal, the margins have to match at both ends, and the whole thing has to land under the "
                    "chair rail. Getting the arithmetic right first saves taking a panel off the wall.</p>"),
            "formula_note": ("<p>The wall is divided into whole panels and the spaces between them: two end "
                             "margins, one stile between each pair of panels, and the panels themselves. The "
                             "height is the rail position less the baseboard and less the rail's own width "
                             "top and bottom.</p>"),
            "example_note": ("<p>A 12 ft wall with {panels} panels and 4 in stiles leaves {panel_width|unit} "
                             "for each panel, and a panel {panel_height|unit} tall between the base and the "
                             "rail — {panel_area|unit} of panelling and {stile_run|unit} of stile.</p>"),
            "reading": ("<p>Read the panel width against the wall: it should look like a standard rail width, "
                        "roughly 14 to 24 in. If it comes out negative, the stiles and margins are wider than "
                        "the wall allows.</p>"),
            "scenarios": [
                {"inputs": {"wall_length": 16, "panels": 6, "stile": 3, "end_margin": 6, "rail_height": 42,
                            "base_height": 6, "rail_width": 3},
                 "note": "A longer wall with a higher rail: more panels and a taller field."},
                {"inputs": {"wall_length": 8, "panels": 3, "stile": 5, "end_margin": 5, "rail_height": 32,
                            "base_height": 4, "rail_width": 2.5},
                 "note": "A short wall in a hallway, where three panels fill the run."},
            ],
            "pitfalls": [
                "<strong>Stiles counted as panels plus one.</strong> There is one fewer stile than "
                "panels.",
                "<strong>Rail width ignored.</strong> The moulding takes space at the top and bottom.",
                "<strong>Unequal end margins.</strong> Both ends should match.",
            ],
            "units_note": ("<p>Wall length in feet, all the moulding dimensions in inches, panel width and "
                           "height in inches, panel area in square feet and stile run in feet.</p>"),
            "limits": [
                "<strong>Equal panels.</strong> A centred window needs the layout adjusted around it.",
                "<strong>Flat walls.</strong> Corners and returns are separate runs.",
            ],
            "uses": [
                "<li>Laying out a wainscot wall.</li>",
                "<li>Ordering stile and rail stock.</li>",
                "<li>Checking a joiner's setting-out.</li>",
            ],
        },
        faq=[
            ("How wide should wainscot panels be?",
             "Usually 14 to 24 inches, with the number of panels chosen to make them equal."),
            ("How high should wainscoting be?",
             "Chair rail at 32 to 42 inches, depending on the room and the ceiling."),
        ],
        no_round_trip=["panels"],
        related=[("/construction/wall-square-footage", "Wall square footage"),
                 ("/construction/shiplap", "Shiplap"),
                 ("/construction/board-and-batten", "Board and batten")],
    ),

    S(
        slug="square-footage",
        name="Square footage",
        title="Square Footage Calculator: Area and Cost",
        desc="Work out the square footage of a rectangle, repeat it over several rooms, and see the area in square yards and square metres with a cost.",
        what=("<p><strong>Area = length × width × quantity</strong>, with the same figure in square yards and "
              "square metres beside it.</p>"),
        fields=[
            F("length", "Length", "ft", 12, "One dimension"),
            F("width", "Width", "ft", 10, "The other"),
            F("quantity", "Quantity", "", 1, "Identical areas"),
            F("price", "Price", "$/ft²", 4.5, "Material or flooring"),
        ],
        results=[
            R("area_ft2", "Area", "ft²"),
            R("area_yd2", "Area", "yd²"),
            R("area_m2", "Area", "m²"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "area_ft2": "length*width*quantity",
            "area_yd2": "length*width*quantity/9",
            "area_m2": "length*width*quantity*0.092903",
            "cost": "length*width*quantity*price",
            "length": "area_ft2/(width*quantity)",
            "width": "area_ft2/(length*quantity)",
            "quantity": "area_ft2/(length*width)",
            "price": "cost/area_ft2",
        },
        prose={
            "why": ("<p>Square footage is the unit every material and every lease is priced in, and it is the "
                    "one measurement people take from memory. Writing the length and width down and letting "
                    "the arithmetic happen is worth more than any estimating app.</p>"),
            "formula_note": ("<p>The quantity box multiplies identical areas — four identical bedrooms, eight "
                             "identical bays — so a repeated layout does not need repeating arithmetic. The "
                             "square yards divide by nine and the square metres by 10.764.</p>"),
            "example_note": ("<p>A room 12 by 10 ft is {area_ft2|unit} — {area_yd2|unit} or {area_m2|unit}. At "
                             "$4.50 a square foot, flooring for it costs {cost}.</p>"),
            "reading": ("<p>Read the three areas together: square yards are about a ninth of square feet and "
                        "square metres about a tenth. If the metric figure is larger than the imperial one, "
                        "the feet have been entered as metres.</p>\n"
                        "<p>The quantity box is worth using on any layout that repeats — a block of four "
                        "identical flats, a row of eight identical bays — because a mistyped dimension in a "
                        "repeated area is four times the error by the time it reaches the order.</p>"),
            "scenarios": [
                {"inputs": {"length": 15, "width": 12, "quantity": 4, "price": 3.2},
                 "note": "Four identical bedrooms: the quantity box does the repeating."},
                {"inputs": {"length": 30, "width": 24, "quantity": 1, "price": 12},
                 "note": "A large open floor in an expensive finish."},
            ],
            "pitfalls": [
                "<strong>Paces used as feet.</strong> They are about a third short.",
                "<strong>Wall height included.</strong> This is floor area, not wall area.",
                "<strong>Closets left out.</strong> They count in most property measurements.",
            ],
            "units_note": ("<p>Length and width in feet, area in square feet, square yards and square metres, "
                           "cost in dollars per square foot.</p>"),
            "limits": [
                "<strong>Rectangles.</strong> L-shapes are two rectangles added together, measured as a "
                "pair and added.",
                "<strong>One price.</strong> Mixed flooring is a line per material, so a room with a "
                "tiled bathroom corner is two calculations.",
                "<strong>Plan area, not floor area.</strong> A sloping ceiling reduces the usable floor "
                "but not the measurement a plan shows.",
            ],
            "uses": [
                "<li>Measuring a room for flooring.</li>",
                "<li>Checking a floor plan's area.</li>",
                "<li>Pricing material by the square foot.</li>",
            ],
        },
        faq=[
            ("How do I work out square footage?",
             "Multiply the length by the width in feet."),
            ("How many square feet in a square metre?",
             "About 10.76."),
        ],
        related=[("/construction/square-meter", "Square meter"),
                 ("/construction/square-yard", "Square yard"),
                 ("/construction/flooring", "Flooring")],
    ),

    S(
        slug="wall-square-footage",
        name="Wall square footage",
        title="Wall Square Footage Calculator: Room Walls",
        desc="Work out the wall area of a room from its perimeter and ceiling height, less the doors and windows, with gable and soffit areas noted.",
        what=("<p><strong>Wall area = perimeter × ceiling height</strong>, less the openings; the perimeter "
              "is twice the sum of the two room dimensions.</p>"),
        fields=[
            F("length", "Room length", "ft", 14, "Wall to wall"),
            F("width", "Room width", "ft", 12, "Wall to wall"),
            F("height", "Ceiling height", "ft", 9, "Floor to ceiling"),
            F("doors", "Doors", "", 2, "Opening count"),
            F("door_area", "Each door", "ft²", 21, "Standard door"),
            F("windows", "Windows", "", 3, "Opening count"),
            F("window_area", "Each window", "ft²", 15, "Measured opening"),
        ],
        results=[
            R("perimeter", "Perimeter", "ft"),
            R("gross_area", "Gross wall area", "ft²"),
            R("openings", "Openings", "ft²"),
            R("net_area", "Net wall area", "ft²"),
        ],
        formula={
            "perimeter": "2*(length+width)",
            "gross_area": "2*(length+width)*height",
            "openings": "doors*door_area+windows*window_area",
            "net_area": "2*(length+width)*height-doors*door_area-windows*window_area",
            "length": "perimeter/2-width",
            "width": "perimeter/2-length",
            "height": "gross_area/(2*(length+width))",
            "doors": "(gross_area-windows*window_area-net_area)/door_area",
            "windows": "(gross_area-doors*door_area-net_area)/window_area",
        },
        prose={
            "why": ("<p>Wall area is what paint, wallpaper, panelling and insulation are all bought against, "
                    "and it is always larger than the floor — roughly three times for a normal room. The "
                    "openings matter most on small walls, where two doors can take a sixth of the paint.</p>"),
            "formula_note": ("<p>The perimeter is twice the sum of the room's two dimensions, because every "
                             "room has two long walls and two short ones. Multiply by the ceiling height and "
                             "the openings come off at face value.</p>"),
            "example_note": ("<p>A room 14 by 12 with a 9 ft ceiling has {perimeter|unit} of wall running "
                             "{gross_area|unit}. Two doors and three windows take {openings|unit} off, "
                             "leaving {net_area|unit}.</p>"),
            "reading": ("<p>Read the net against the gross: the openings should be 10 to 20 per cent of the "
                        "total. A deduction much larger than that means the door or window areas have been "
                        "entered in inches.</p>"),
            "scenarios": [
                {"inputs": {"length": 24, "width": 18, "height": 10, "doors": 3, "door_area": 21,
                            "windows": 6, "window_area": 20},
                 "note": "An open-plan room: a long perimeter and a lot of glass."},
                {"inputs": {"length": 8, "width": 8, "height": 8, "doors": 1, "door_area": 21,
                            "windows": 1, "window_area": 15},
                 "note": "A box room where the single door takes a seventh of the wall."},
            ],
            "pitfalls": [
                "<strong>Floor area used instead.</strong> Walls are about three times the floor.",
                "<strong>Ceiling area double-counted.</strong> It is a separate rectangle.",
                "<strong>Openings deducted twice.</strong> Do not deduct and then add back for trim.",
            ],
            "units_note": ("<p>Room dimensions in feet, perimeter and gross area in feet and square feet, "
                           "opening areas in square feet and net wall area in square feet.</p>"),
            "limits": [
                "<strong>A rectangular room.</strong> Sloped ceilings and half walls need their own runs.",
                "<strong>Face area only.</strong> Reveals and returns are extra.",
            ],
            "uses": [
                "<li>Sizing paint or wallpaper.</li>",
                "<li>Ordering panelling or cladding.</li>",
                "<li>Checking a room's wall area for insulation.</li>",
            ],
        },
        faq=[
            ("How do I find the wall area of a room?",
             "Add the length and width, double it for the perimeter, multiply by the ceiling height, then "
             "subtract the doors and windows."),
            ("How much wall area is a 12 by 12 room?",
             "384 ft² at an 8 ft ceiling before openings."),
        ],
        related=[("/construction/paint", "Paint"),
                 ("/construction/square-footage", "Square footage"),
                 ("/construction/siding", "Siding")],
    ),
]
