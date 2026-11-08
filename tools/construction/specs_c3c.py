"""Batch 3c — road base, landscape and workshop calculators."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="road-base",
        name="Road base",
        title="Road Base Calculator: Tons and Cubic Yards",
        desc="Work out how much road base a drive needs, in cubic yards, tons and tonnes, with compaction allowed for and the delivered cost beside it.",
        what=("<p><strong>Volume = length × width × depth</strong>, and <strong>tons = volume × density ÷ "
              "2 000</strong>, with a compaction allowance added to the loose volume.</p>"),
        fields=[
            F("length", "Road length", "ft", 100, "Along the drive"),
            F("width", "Road width", "ft", 10, "Carriageway width"),
            F("depth", "Compacted depth", "in", 6, "Finished thickness"),
            F("compaction", "Compaction allowance", "%", 20, "Loose over compacted, 15 to 25"),
            F("density", "Density", "lb/ft³", 120, "120 crushed stone, 105 gravel"),
            F("price", "Price", "$/ton", 25, "Delivered"),
        ],
        results=[
            R("volume_yd3", "Order volume", "yd³"),
            R("tons", "Weight", "tons"),
            R("tonnes", "Weight", "t"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "volume_yd3": "length*width*depth/12*(1+compaction/100)/27",
            "tons": "length*width*depth/12*(1+compaction/100)*density/2000",
            "tonnes": "length*width*depth/12*(1+compaction/100)*density/2204.62",
            "cost": "length*width*depth/12*(1+compaction/100)*density/2000*price",
            "length": "27*volume_yd3/(width*depth/12*(1+compaction/100))",
            "width": "27*volume_yd3/(length*depth/12*(1+compaction/100))",
            "depth": "12*27*volume_yd3/(length*width*(1+compaction/100))",
            "price": "cost/tons",
        },
        prose={
            "why": ("<p>A road base is ordered loose and paid for compacted, and the gap between the two is "
                    "the whole difficulty: stone that measures six inches loose will finish nearer five, so "
                    "the order carries a fifth more. Get the allowance wrong and the drive ends up short at "
                    "the gate, which is the worst place to be short.</p>"),
            "formula_note": ("<p>The compaction allowance is applied to the loose volume, not to the finished "
                             "depth, so the finished job is the depth asked for. Density at 120 lb/ft³ is "
                             "typical of crushed limestone; a rounded river gravel is nearer 105.</p>"),
            "example_note": ("<p>A hundred feet by ten at six inches compacted, with twenty per cent extra, is "
                             "{volume_yd3|unit} of loose stone weighing {tons} short tons — {tonnes} tonnes. "
                             "At $25 a ton that is {cost} delivered.</p>"),
            "reading": ("<p>Read the tons against the yards: crushed stone at 120 lb/ft³ works out near 1.6 "
                        "tons to the cubic yard. If the figure is far from that, the density is in the wrong "
                        "units — tonnes per cubic metre is 1 600, not 120.</p>"),
            "scenarios": [
                {"inputs": {"length": 60, "width": 12, "depth": 4, "compaction": 15,
                            "density": 120, "price": 28},
                 "note": "A short domestic drive with a thinner base and a tighter allowance."},
                {"inputs": {"length": 400, "width": 12, "depth": 8, "compaction": 25,
                            "density": 120, "price": 22},
                 "note": "A long farm track: the allowance is larger because the sub-base is uneven."},
            ],
            "pitfalls": [
                "<strong>Finished depth used as the order depth.</strong> Stone compacts by about a "
                "fifth.",
                "<strong>Density in kg/m³.</strong> Those figures are about 1 600 and belong in a metric "
                "calculator.",
                "<strong>Geotextile left out.</strong> Without a membrane the base pumps into the "
                "subgrade.",
            ],
            "units_note": ("<p>Length and width in feet, depth in inches, order volume in cubic yards, weight "
                           "in short tons and tonnes, cost in dollars at the price you enter per ton.</p>"),
            "limits": [
                "<strong>A flat rectangle.</strong> Camber and cross-fall add a little material.",
                "<strong>One layer.</strong> A two-layer base is two calculations.",
            ],
            "uses": [
                "<li>Ordering stone for a drive.</li>",
                "<li>Pricing a haul.</li>",
                "<li>Comparing crushed stone with gravel.</li>",
            ],
        },
        faq=[
            ("How many tons of road base do I need?",
             "About 1.6 tons per cubic yard of finished base at 120 lb/ft³, plus a fifth for compaction."),
            ("How thick should a drive base be?",
             "Four inches of compacted stone carries a car; eight carries a delivery truck."),
        ],
        related=[("/construction/gravel", "Gravel"),
                 ("/construction/crushed-stone", "Crushed stone"),
                 ("/construction/gravel-driveway", "Gravel driveway")],
    ),

    S(
        slug="rip-rap",
        name="Rip rap",
        title="Rip Rap Calculator: Rock Size and Volume",
        desc="Size rip rap rock from the water velocity it must resist, and work out the volume and tonnage needed to cover a bank at a given layer thickness.",
        what=("<p>Isbash gives the stable rock size: <strong>diameter = v² ÷ (2 g C²)</strong>, then the "
              "layer volume is area times thickness.</p>"),
        fields=[
            F("velocity", "Water velocity", "ft/s", 8, "Approach velocity"),
            F("isbash", "Isbash constant", "", 0.86, "0.86 turbulent, 1.2 still"),
            F("area", "Bank area", "ft²", 500, "To be covered"),
            F("thickness", "Layer thickness", "ft", 1.5, "About twice the rock diameter"),
            F("density", "Rock density", "lb/ft³", 165, "165 granite, 150 limestone"),
        ],
        results=[
            R("rock_in", "Rock diameter", "in"),
            R("volume_yd3", "Volume", "yd³"),
            R("tons", "Weight", "tons"),
        ],
        formula={
            "rock_in": "12*velocity*velocity/(2*32.174*pow(isbash,2))",
            "volume_yd3": "area*thickness/27",
            "tons": "area*thickness*density/2000",
            "velocity": "sqrt(rock_in/12*2*32.174*pow(isbash,2))",
            "area": "27*volume_yd3/thickness",
            "thickness": "27*volume_yd3/area",
        },
        prose={
            "why": ("<p>Rip rap fails in one of two ways: the rock is too small and the flood carries it away, "
                    "or the layer is too thin and the bank washes out beneath it. Sizing the rock to the "
                    "velocity is the part that cannot be eyeballed, because a doubling of velocity quadruples "
                    "the size needed.</p>"),
            "formula_note": ("<p>Isbash's relationship sets the stable diameter from the square of the "
                             "velocity, over twice gravity and the square of the Isbash constant — 0.86 for "
                             "highly turbulent flow and 1.2 for still water. The layer should be about twice "
                             "the rock diameter to be self-supporting.</p>"),
            "example_note": ("<p>Water at 8 ft/s against a bank of 500 ft² needs rock about {rock_in|unit} "
                             "across. Laid 1.5 ft thick that is {volume_yd3|unit} of stone, {tons} short "
                             "tons — around three truckloads.</p>"),
            "reading": ("<p>Read the rock size against the velocity: 8 ft/s gives about sixteen inches and "
                        "10 ft/s about two feet, because the size goes with the square of the velocity. Above "
                        "about 12 ft/s no loose rock is stable and the answer is revetment, not rip rap.</p>"),
            "scenarios": [
                {"inputs": {"velocity": 4, "isbash": 1.2, "area": 200, "thickness": 1, "density": 165},
                 "note": "A slow, sheltered bank: small rock in a single layer."},
                {"inputs": {"velocity": 12, "isbash": 0.86, "area": 800, "thickness": 4, "density": 165},
                 "note": "Flood velocity: the rock is boulder size and the layer is a machine job."},
            ],
            "pitfalls": [
                "<strong>Average velocity used.</strong> It is the velocity at the bank, which is faster on "
                "the outside of a bend.",
                "<strong>Layer thinner than twice the rock.</strong> It cannot interlock.",
                "<strong>Subgrade ignored.</strong> Soft ground needs a filter layer first.",
            ],
            "units_note": ("<p>Velocity in feet per second, area in square feet, thickness in feet, density in "
                           "pounds per cubic foot, rock diameter in inches, volume in cubic yards and weight "
                           "in short tons.</p>"),
            "limits": [
                "<strong>Isbash sizing.</strong> It is a design aid, not a substitute for a hydraulic "
                "study.",
                "<strong>Angular rock.</strong> Rounded stone interlocks badly and needs to be larger.",
            ],
            "uses": [
                "<li>Sizing rock for a stream bank.</li>",
                "<li>Estimating a revetment order.</li>",
                "<li>Checking a culvert outfall.</li>",
            ],
        },
        faq=[
            ("How big should rip rap be?",
             "About v² over 2gC²: at 8 ft/s with a 0.86 constant that is about sixteen inches across."),
            ("How thick should a rip rap layer be?",
             "About twice the diameter of the rock, so it interlocks rather than floats."),
        ],
        related=[("/construction/river-rock", "River rock"),
                 ("/construction/rock", "Rock"),
                 ("/construction/gravel", "Gravel")],
    ),

    S(
        slug="fire-glass",
        name="Fire glass",
        title="Fire Glass Calculator: Pounds for a Fire Pit",
        desc="Work out how many pounds of fire glass a round or rectangular fire pit takes from its size and the depth of glass, with the volume in cubic feet.",
        what=("<p><strong>Volume = area × depth</strong>, and <strong>weight = volume × density</strong>: "
              "reflective glass is about 100 lb/ft³, recycled glass about 80.</p>"),
        fields=[
            F("length", "Length", "in", 24, "Diameter for a round pit"),
            F("width", "Width", "in", 24, "Equal to the length for a round pit"),
            F("factor", "Shape factor", "", 0.785, "0.785 round, 1.000 square"),
            F("depth", "Glass depth", "in", 2, "Usually one to two inches"),
            F("density", "Density", "lb/ft³", 100, "100 reflective, 80 recycled"),
        ],
        results=[
            R("area_ft2", "Pit area", "ft²"),
            R("volume_ft3", "Volume", "ft³"),
            R("weight_lb", "Glass", "lb"),
        ],
        formula={
            "area_ft2": "length*width*factor/144",
            "volume_ft3": "length*width*factor/144*depth/12",
            "weight_lb": "length*width*factor/144*depth/12*density",
            "length": "area_ft2*144/(width*factor)",
            "width": "area_ft2*144/(length*factor)",
            "factor": "area_ft2*144/(length*width)",
            "depth": "12*volume_ft3/area_ft2",
        },
        prose={
            "why": ("<p>Fire glass is sold by the pound and covers by the inch, so the two numbers have to be "
                    "worked back and forth. It is heavier than people expect: two inches over a two-foot "
                    "fire pit is over fifty pounds, so a pit takes several bags rather than one.</p>"),
            "formula_note": ("<p>The pit area is a circle or a rectangle — the shape factor is π over four for "
                             "a round pit and 1.000 for a square, with width set equal to length. The glass "
                             "depth is rarely more than two inches; deeper than that and the burner "
                             "disappears.</p>"),
            "example_note": ("<p>A round pit 24 in across takes {area_ft2|unit}, and two inches of glass fills "
                             "{volume_ft3|unit} — about {weight_lb} lb. A square pit the same size takes more, "
                             "because the corners hold more than the circle.</p>"),
            "reading": ("<p>Read the weight against the bag size: 10 lb bags are standard, so round up and "
                        "keep a spare. A pit that wants 52 lb wants six bags, not five and a bit.</p>"),
            "scenarios": [
                {"inputs": {"length": 36, "width": 12, "factor": 1.0, "depth": 2, "density": 80},
                 "note": "A long linear fire pit with recycled glass: a shallow, wide bed."},
                {"inputs": {"length": 36, "width": 36, "factor": 0.785, "depth": 1, "density": 100},
                 "note": "A larger round pit with a thin, decorative layer."},
            ],
            "pitfalls": [
                "<strong>Buried burner.</strong> Glass deeper than the burner's air gap will soot.",
                "<strong>Shape factor left at round.</strong> A square pit needs 1.000.",
                "<strong>Density guessed.</strong> Reflective glass is denser than recycled.",
            ],
            "units_note": ("<p>Pit dimensions in inches, area in square feet, volume in cubic feet, density in "
                           "pounds per cubic foot and the glass weight in pounds.</p>"),
            "limits": [
                "<strong>A flat bed.</strong> A bowl holds more per inch of depth.",
                "<strong>No burner displacement.</strong> A large burner ring takes up some volume.",
            ],
            "uses": [
                "<li>Buying glass for a fire pit.</li>",
                "<li>Comparing reflective with recycled glass.</li>",
                "<li>Checking a depth against a burner.</li>",
            ],
        },
        faq=[
            ("How many pounds of fire glass for a 24 inch pit?",
             "About 52 lb for two inches at 100 lb/ft³."),
            ("How deep should fire glass be?",
             "One to two inches — just enough to cover the burner."),
        ],
        related=[("/construction/gravel", "Gravel"),
                 ("/construction/pea-gravel", "Pea gravel"),
                 ("/construction/rock", "Rock")],
    ),

    S(
        slug="round-pen",
        name="Round pen",
        title="Round Pen Calculator: Corral Panels Needed",
        desc="Work out how many corral panels it takes to close a round pen of a given diameter, with the circumference and the cost of the set.",
        what=("<p><strong>Panels = ceiling(π × diameter ÷ panel length)</strong>: the circumference divided "
              "by one panel, rounded up to a number you can actually build.</p>"),
        fields=[
            F("diameter", "Pen diameter", "ft", 50, "Across the pen"),
            F("panel_length", "Panel length", "ft", 12, "Standard panels are 10 to 16 ft"),
            F("price", "Price per panel", "$", 180, "Delivered"),
        ],
        results=[
            R("circumference", "Circumference", "ft"),
            R("panels", "Panels", ""),
            R("actual_area", "Pen area", "ft²"),
            R("cost", "Panel cost", "$"),
        ],
        formula={
            "circumference": "pi*diameter",
            "panels": "ceil(pi*diameter/panel_length)",
            "actual_area": "pi/4*pow(diameter,2)",
            "cost": "ceil(pi*diameter/panel_length)*price",
            "diameter": "circumference/pi",
            "panel_length": "circumference/panels",
            "price": "cost/panels",
        },
        prose={
            "why": ("<p>A round pen is bought in panels and measured in diameter, and the two do not divide "
                    "into each other: a 50 ft pen is 157 ft round, which is thirteen panels of twelve with a "
                    "foot left over. Ordering twelve leaves a gap; the thirteenth laps its neighbour "
                    "slightly.</p>"),
            "formula_note": ("<p>The panel count is rounded up, so the pen you build is a hair larger than "
                             "the one you asked for — the panel ends overlap slightly, which is normal. The "
                             "area shown is the circle of the diameter, not the panel polygon.</p>"),
            "example_note": ("<p>A 50 ft pen takes {circumference|unit} of rail, so {panels} panels of 12 ft "
                             "— the last one laps its neighbour a little. At $180 each the pen costs "
                             "{cost}.</p>"),
            "reading": ("<p>Read the panel count against the circumference: a 60 ft pen is 189 ft, which is "
                        "sixteen panels of twelve. If the count seems high, the diameter is being measured "
                        "as a radius.</p>"),
            "scenarios": [
                {"inputs": {"diameter": 40, "panel_length": 10, "price": 150},
                 "note": "A smaller training pen in shorter panels — easier to set up alone."},
                {"inputs": {"diameter": 60, "panel_length": 16, "price": 220},
                 "note": "A large pen in long panels: fewer joints, heavier to handle."},
            ],
            "pitfalls": [
                "<strong>Radius used as diameter.</strong> Half the panels arrive.",
                "<strong>Gate left out of the count.</strong> A gate panel replaces one rail panel.",
                "<strong>Ground anchors forgotten.</strong> Panels walk in soft ground.",
            ],
            "units_note": ("<p>Diameter and panel length in feet, circumference in feet, area in square feet, "
                           "panels as a whole count and cost in dollars.</p>"),
            "limits": [
                "<strong>A closed circle.</strong> Pens with straight sides need their own perimeter.",
                "<strong>Level ground.</strong> Panels on a slope need longer posts.",
            ],
            "uses": [
                "<li>Buying panels for a round pen.</li>",
                "<li>Checking a pen's area against a training standard.</li>",
                "<li>Estimating a set-up cost.</li>",
            ],
        },
        faq=[
            ("How many panels for a 50 foot round pen?",
             "Fourteen 12 ft panels, from a circumference of 157 ft."),
            ("How big should a round pen be?",
             "Forty to sixty feet across for groundwork; larger for lungeing a fit horse."),
        ],
        no_round_trip=["panels", "panel_length"],
        related=[("/construction/fence", "Fence"),
                 ("/construction/fence-perimeter", "Fence perimeter"),
                 ("/construction/hoop-house", "Hoop house")],
    ),

    S(
        slug="hoop-house",
        name="Hoop house",
        title="Hoop House Calculator: Cover Area and Heater",
        desc="Work out the plastic a hoop house or gable greenhouse needs, its volume and the heater size in BTU, from its length, width and roof height.",
        what=("<p><strong>Cover area</strong> is the two side walls, the two roof slopes and the two gable "
              "ends; <strong>heater BTU = area × temperature lift × 1.2</strong>.</p>"),
        fields=[
            F("length", "Length", "ft", 24, "Along the ridge"),
            F("width", "Width", "ft", 12, "Span"),
            F("wall_height", "Side wall height", "ft", 4, "Eave to ground"),
            F("rise", "Roof rise", "ft", 4, "Eave to ridge"),
            F("delta_t", "Temperature lift", "°F", 30, "Inside above outside"),
        ],
        results=[
            R("cover_area", "Cover area", "ft²"),
            R("volume_ft3", "Volume", "ft³"),
            R("heater_btu", "Heater", "BTU/h"),
        ],
        formula={
            "cover_area": "2*length*wall_height+2*length*sqrt(pow(width/2,2)+pow(rise,2))+2*(width*wall_height+width*rise/2)",
            "volume_ft3": "length*(width*wall_height+width*rise/2)",
            "heater_btu": "(2*length*wall_height+2*length*sqrt(pow(width/2,2)+pow(rise,2))+2*(width*wall_height+width*rise/2))*delta_t*1.2",
            "length": "volume_ft3/(width*wall_height+width*rise/2)",
            "width": "volume_ft3/(length*wall_height+length*rise/2)",
            "rise": "2*volume_ft3/(length*width)-2*wall_height",
            "delta_t": "heater_btu/cover_area/1.2",
        },
        prose={
            "why": ("<p>Greenhouse plastic is ordered by the square foot and heat by the BTU, and both come "
                    "from the same envelope. The gable ends and the roof pitch are where the estimate usually "
                    "drifts, because a greenhouse is all surface and very little floor.</p>"),
            "formula_note": ("<p>The cover is the two side walls, two roof slopes, and the gable ends — the "
                             "rectangular part plus the triangle above it. The heater figure uses 1.2 BTU per "
                             "square foot per degree, which is a single-skin plastic house; a double-skin "
                             "house is nearer 0.7 and a glass house 1.0.</p>"),
            "example_note": ("<p>A house 24 by 12 with 4 ft walls and a 4 ft rise needs {cover_area|unit} of "
                             "cover, so a 24 ft wide roll about 28 ft long. It holds {volume_ft3|unit}, and "
                             "holding 30 °F above outside takes {heater_btu} BTU/h.</p>"),
            "reading": ("<p>Read the cover area against the footprint: here it is more than twice the floor, "
                        "which is normal. If it comes out close to the floor area, the gable ends have been "
                        "left out of the formula somewhere.</p>"),
            "scenarios": [
                {"inputs": {"length": 40, "width": 20, "wall_height": 5, "rise": 6, "delta_t": 25},
                 "note": "A larger house: the cover rises with the length, the end walls stay fixed."},
                {"inputs": {"length": 12, "width": 8, "wall_height": 3, "rise": 2, "delta_t": 35},
                 "note": "A small cold frame house, where the heater is barely needed."},
            ],
            "pitfalls": [
                "<strong>Floor area used as cover.</strong> The cover is always larger.",
                "<strong>Rise measured as total height.</strong> It is the ridge above the eave.",
                "<strong>Heater sized for the coldest night.</strong> It is the temperature lift that "
                "matters, not the outdoor number.",
            ],
            "units_note": ("<p>Dimensions in feet, cover in square feet, volume in cubic feet, temperature "
                           "lift in Fahrenheit degrees and heater output in BTU per hour.</p>"),
            "limits": [
                "<strong>A gable profile.</strong> A quonset or a lean-to has a different envelope.",
                "<strong>Steady-state heat only.</strong> Thermal mass slows the response and a real design "
                "needs the worst night.",
            ],
            "uses": [
                "<li>Ordering greenhouse plastic.</li>",
                "<li>Sizing a space heater.</li>",
                "<li>Comparing a gable house with a hoop.</li>",
            ],
        },
        faq=[
            ("How much plastic does a 24 by 12 hoop house need?",
             "About 682 ft² for a 4 ft wall and 4 ft rise, which is a 24 ft wide roll about 28 ft long."),
            ("How many BTU to heat a greenhouse?",
             "About 1.2 BTU per square foot of cover per degree Fahrenheit for single plastic."),
        ],
        related=[("/construction/fence", "Fence"),
                 ("/construction/insulation", "Insulation"),
                 ("/construction/heat-loss", "Heat loss")],
    ),

    S(
        slug="chicken-coop-size",
        name="Chicken coop size",
        title="Chicken Coop Size Calculator by Bird Count",
        desc="Work out the coop, run and yard space a flock needs, counting bantams as a fraction of a full-size bird, in square feet and square metres.",
        what=("<p><strong>Coop 4 ft², run 10 ft² and yard 25 ft² per full-size bird</strong>; a bantam "
              "counts as two thirds of a bird.</p>"),
        fields=[
            F("regular", "Full-size chickens", "", 6, "Standard breeds"),
            F("bantam", "Bantams", "", 2, "Small breeds"),
        ],
        results=[
            R("birds", "Equivalent birds", ""),
            R("coop_area", "Coop floor", "ft²"),
            R("run_area", "Run floor", "ft²"),
            R("coop_m2", "Coop floor", "m²"),
        ],
        formula={
            "birds": "regular+bantam*0.67",
            "coop_area": "(regular+bantam*0.67)*4",
            "run_area": "(regular+bantam*0.67)*10",
            "coop_m2": "(regular+bantam*0.67)*4*0.092903",
            "regular": "birds-bantam*0.67",
            "bantam": "(birds-regular)/0.67",
        },
        prose={
            "why": ("<p>Overcrowding is the root of most flock problems — pecking, feather loss, dirty "
                    "litter and disease — and it is invisible until the birds are in. The numbers are "
                    "generous compared with a factory shed because a backyard coop has no ventilation "
                    "system, and the run matters as much as the coop.</p>"),
            "formula_note": ("<p>All three figures are shown because all three are worth knowing: four square "
                             "feet inside, ten in a run and twenty-five when the birds have a yard. Bantams "
                             "are counted at two thirds of a full-size bird.</p>"),
            "example_note": ("<p>Six full-size hens and two bantams come to {birds} equivalent birds, so a "
                             "coop of {coop_area|unit} — about {coop_m2|unit} — and a run of {run_area|unit}. "
                             "An 8 by 4 shed is the smallest thing that works.</p>"),
            "reading": ("<p>Read the run against the coop: the run is two and a half times the coop at every "
                        "flock size. If the run you have is smaller than that, the birds are effectively kept "
                        "inside and the coop needs to be larger than the minimum.</p>"),
            "scenarios": [
                {"inputs": {"regular": 10, "bantam": 0},
                 "note": "Ten hybrids in a covered run: a twenty by five run is about right."},
                {"inputs": {"regular": 0, "bantam": 8},
                 "note": "A bantam-only flock, where the smaller birds need less of everything."},
            ],
            "pitfalls": [
                "<strong>Coop area counted as run area.</strong> They are separate requirements.",
                "<strong>Nest boxes counted as floor space.</strong> They are above the floor.",
                "<strong>Bantams counted as full size.</strong> They are about two thirds.",
            ],
            "units_note": ("<p>Bird counts as numbers, floor areas in square feet with the coop in square "
                           "metres beside it.</p>"),
            "limits": [
                "<strong>Minimums, not targets.</strong> More space is always better.",
                "<strong>Climate ignored.</strong> Cold climates need more inside space.",
            ],
            "uses": [
                "<li>Sizing a coop before buying it.</li>",
                "<li>Checking a run against a flock.</li>",
                "<li>Planning a mixed flock.</li>",
            ],
        },
        faq=[
            ("How much coop space per chicken?",
             "Four square feet inside and ten in a run for full-size birds."),
            ("How many chickens fit in an 8 by 4 coop?",
             "Eight, at four square feet each."),
        ],
        related=[("/construction/hoop-house", "Hoop house"),
                 ("/construction/fence", "Fence"),
                 ("/construction/round-pen", "Round pen")],
    ),

    S(
        slug="trump",
        name="Border wall cost",
        title="Border Wall Cost Calculator: Panels and Concrete",
        desc="Model the cost of a long border wall from its length, height and panel size, with concrete for the footing, steel and a panel price you supply.",
        what=("<p>Panels come from the length and the panel size: <strong>panels = ceiling(length × 5 280 ÷ "
              "panel length)</strong>, and the cost is panels times the price, plus the footing.</p>"),
        fields=[
            F("length", "Wall length", "mi", 1000, "Miles of wall"),
            F("height", "Wall height", "ft", 30, "Above ground"),
            F("panel_length", "Panel length", "ft", 30, "Precast or steel panel"),
            F("panel_price", "Panel cost", "$", 9000, "Supplied and set"),
            F("concrete_price", "Concrete", "$/yd³", 150, "Footing concrete"),
        ],
        results=[
            R("panels", "Panels", ""),
            R("wall_area", "Wall face", "ft²"),
            R("concrete_yd3", "Footing concrete", "yd³"),
            R("total_cost", "Total cost", "$"),
        ],
        formula={
            "panels": "ceil(length*5280/panel_length)",
            "wall_area": "length*5280*height",
            "concrete_yd3": "length*5280*2*2/27",
            "total_cost": "ceil(length*5280/panel_length)*panel_price+length*5280*2*2/27*concrete_price",
            "length": "panels*panel_length/5280",
            "height": "wall_area/(length*5280)",
            "panel_price": "(total_cost-length*5280*2*2/27*concrete_price)/panels",
        },
        prose={
            "why": ("<p>A border wall is a long, simple structure, which makes it a good exercise in "
                    "order-of-magnitude costing: the panel count drives everything, and at a thousand miles "
                    "the numbers stop being intuitive. The model is deliberately plain — rectangular panels "
                    "on a continuous footing — so each input can be argued with on its own.</p>"),
            "formula_note": ("<p>The length is converted to feet once and used for both the panel count and "
                             "the footing. The footing is taken as two feet wide by two feet deep throughout, "
                             "which is a plausible continuous strip for a thirty-foot wall and is the largest "
                             "single unknown in the model.</p>"),
            "example_note": ("<p>A thousand miles of thirty-foot wall in thirty-foot panels needs {panels} "
                             "panels and presents {wall_area|unit} of face. On a 2 by 2 ft footing that is "
                             "{concrete_yd3|unit} of concrete, and at the prices entered the total is "
                             "{total_cost|unit}.</p>"),
            "reading": ("<p>Read the footing cost against the panel cost: at these defaults the footing is "
                        "under a tenth of the panels. Where the two are closer than that, the ground is "
                        "carrying more than the model assumes.</p>"),
            "scenarios": [
                {"inputs": {"length": 700, "height": 18, "panel_length": 20, "panel_price": 6500,
                            "concrete_price": 150},
                 "note": "A shorter run at a lower height: the panel count, not the face area, drives the "
                         "cost."},
                {"inputs": {"length": 2000, "height": 30, "panel_length": 40, "panel_price": 12000,
                            "concrete_price": 160},
                 "note": "A longer run in bigger panels: fewer joints, heavier lifts."},
            ],
            "pitfalls": [
                "<strong>Prices treated as facts.</strong> They are inputs; change them to match a real "
                "bid.",
                "<strong>Length in miles typed as feet.</strong> The panel count collapses by 5 280.",
                "<strong>Footing assumed constant.</strong> Ground conditions change it more than "
                "anything else in the model.",
            ],
            "units_note": ("<p>Length in miles, height and panel length in feet, prices in dollars and dollars "
                           "per cubic yard, wall face in square feet and footing in cubic yards.</p>"),
            "limits": [
                "<strong>A parametric model.</strong> It is not a cost estimate for any real project.",
                "<strong>No land, access or maintenance.</strong> Those are separate lines.",
            ],
            "uses": [
                "<li>Exploring how length and panel size drive cost.</li>",
                "<li>Comparing a twenty-foot wall with a thirty.</li>",
                "<li>Testing a price assumption against a bid.</li>",
            ],
        },
        faq=[
            ("How many panels for a thousand miles of wall?",
             "176 000 panels of thirty feet."),
            ("What drives the cost most?",
             "The panel count and the footing: at these defaults the panels are about four fifths of the "
             "total."),
        ],
        no_round_trip=["panels"],
        related=[("/construction/fence", "Fence"),
                 ("/construction/retaining-wall", "Retaining wall"),
                 ("/construction/concrete-slab", "Concrete slab")],
    ),

    S(
        slug="bowl-segment",
        name="Bowl segment",
        title="Bowl Segment Calculator: Cut Angle and Length",
        desc="Work out the miter angle and the inside and outside edge lengths for each segment of a segmented woodturning bowl ring.",
        what=("<p><strong>Cut angle = 180 ÷ segments</strong>, and each segment's outer edge is "
              "<strong>2 R tan(π ÷ n)</strong> for a ring of n pieces.</p>"),
        fields=[
            F("segments", "Segments per ring", "", 12, "Eight to sixteen is usual"),
            F("outer_radius", "Outer radius", "in", 6, "Finished ring"),
            F("ring_width", "Ring width", "in", 1.5, "Radial width"),
            F("thickness", "Segment thickness", "in", 1, "Height of the ring"),
        ],
        results=[
            R("cut_angle", "Miter angle", "°"),
            R("outer_length", "Outer edge", "in"),
            R("inner_length", "Inner edge", "in"),
            R("volume_in3", "Segment volume", "in³"),
        ],
        formula={
            "cut_angle": "180/segments",
            "outer_length": "2*outer_radius*tan(pi/segments)",
            "inner_length": "2*(outer_radius-ring_width)*tan(pi/segments)",
            "volume_in3": "(outer_length+inner_length)/2*ring_width*thickness",
            "segments": "180/cut_angle",
            "outer_radius": "outer_length/(2*tan(pi/segments))",
            "ring_width": "outer_radius-inner_length/(2*tan(pi/segments))",
            "thickness": "volume_in3/((outer_length+inner_length)/2*ring_width)",
        },
        prose={
            "why": ("<p>A segmented ring is made of identical wedges, and every one of them has to be cut at "
                    "the same angle or the ring will not close. The angle is simple — 180 over the number of "
                    "pieces — but the edge lengths are not, because the inside of the wedge is shorter than "
                    "the outside, and both have to be cut from the same setup.</p>"),
            "formula_note": ("<p>The miter angle is measured at the saw, between the cut face and the long "
                             "edge, so a twelve-segment ring needs each piece cut at 15°. The edge lengths "
                             "come from the tangent of the half-segment angle, which is why the outside is "
                             "longer.</p>"),
            "example_note": ("<p>Twelve segments at a six-inch outer radius: a miter of {cut_angle|unit}, an "
                             "outer edge of {outer_length|unit} and an inner edge of {inner_length|unit}. "
                             "Each piece is {volume_in3|unit} of wood, which is the number that sizes the "
                             "blank.</p>"),
            "reading": ("<p>Read the two edge lengths together: their average times the ring width is the "
                        "area of the wedge. If the inner edge comes out negative, the ring width is larger "
                        "than the radius and the ring would close on itself.</p>"),
            "scenarios": [
                {"inputs": {"segments": 8, "outer_radius": 4, "ring_width": 1, "thickness": 0.75},
                 "note": "A small eight-segment ring: the angle is sharper and the pieces are chunkier."},
                {"inputs": {"segments": 16, "outer_radius": 8, "ring_width": 2, "thickness": 1.5},
                 "note": "A large fine ring: many thin pieces, each with a shallow angle."},
            ],
            "pitfalls": [
                "<strong>Cut angle used as the full angle.</strong> The saw is set to half the segment "
                "angle.",
                "<strong>Radius entered as diameter.</strong> Every length doubles.",
                "<strong>Kerf ignored.</strong> A wide blade steals a little from each piece.",
            ],
            "units_note": ("<p>Radius, ring width and thickness in inches, lengths in inches, volume in cubic "
                           "inches and the miter angle in degrees.</p>"),
            "limits": [
                "<strong>Flat rings only.</strong> A staved or angled bowl needs a compound cut.",
                "<strong>No kerf allowance.</strong> Trim each piece to length after the cut.",
            ],
            "uses": [
                "<li>Setting up a miter cut.</li>",
                "<li>Sizing a blank for a ring.</li>",
                "<li>Checking a segment count.</li>",
            ],
        },
        faq=[
            ("What angle do I cut for a 12 segment bowl?",
             "15° on the miter gauge, since the full segment angle is 30°."),
            ("How long should each segment be?",
             "Two times the radius times the tangent of 180 over the segment count."),
        ],
        related=[("/construction/miter-angle", "Miter angle"),
                 ("/construction/angle-cut", "Angle cut"),
                 ("/construction/board-foot", "Board foot")],
    ),

    S(
        slug="sealant",
        name="Sealant",
        title="Sealant Calculator: Tubes for a Joint Run",
        desc="Work out how many tubes or cartridges of sealant a run of joints takes from the joint size, tube volume and wastage, with the cost of the batch.",
        what=("<p><strong>Volume = length × width × depth</strong>, then <strong>tubes = ceiling(volume × "
              "(1 + waste) ÷ tube volume)</strong>.</p>"),
        fields=[
            F("length", "Joint length", "ft", 60, "Total run to be sealed"),
            F("width", "Joint width", "in", 0.375, "The gap"),
            F("depth", "Joint depth", "in", 0.25, "Sealant thickness"),
            F("tube", "Tube volume", "mL", 310, "310 mL cartridge, 600 mL sausage"),
            F("waste", "Wastage", "%", 10, "Gun waste and spoil"),
            F("price", "Price per tube", "$", 12, "Delivered"),
        ],
        results=[
            R("volume_ml", "Sealant volume", "mL"),
            R("tubes", "Tubes needed", ""),
            R("cost", "Cost", "$"),
        ],
        formula={
            "volume_ml": "length*12*width*depth*16.3871",
            "tubes": "ceil(length*12*width*depth*16.3871*(1+waste/100)/tube)",
            "cost": "ceil(length*12*width*depth*16.3871*(1+waste/100)/tube)*price",
            "length": "volume_ml/(12*width*depth*16.3871)",
            "width": "volume_ml/(length*12*depth*16.3871)",
            "depth": "volume_ml/(length*12*width*16.3871)",
            "price": "cost/tubes",
        },
        prose={
            "why": ("<p>Sealant is cheap per tube and annoying to run out of: a joint half-sealed while you "
                    "drive to the shop is a joint that has to be redone. The volume of a joint is smaller "
                    "than it looks — a sixty-foot run at three eighths by a quarter is a bit over a litre — "
                    "so the arithmetic is worth doing before the trip.</p>"),
            "formula_note": ("<p>The joint is treated as a rectangular slot: length times width times depth, "
                             "with the length converted from feet to inches and the result converted from "
                             "cubic inches to millilitres at 16.39. The tube count rounds up, because half a "
                             "tube is no use.</p>"),
            "example_note": ("<p>Sixty feet of joint at 3/8 by 1/4 in holds {volume_ml} mL of sealant, or "
                             "{tubes} cartridges of 310 mL once wastage is allowed. At $12 a tube that is "
                             "{cost}, which is the sort of price that makes a backer rod worthwhile.</p>"),
            "reading": ("<p>Read the tubes against the volume: a 310 mL cartridge holds a little over a "
                        "third of a litre. If a small run is asking for ten tubes, the joint depth has "
                        "probably been entered in the wrong unit.</p>"),
            "scenarios": [
                {"inputs": {"length": 200, "width": 0.5, "depth": 0.375, "tube": 600, "waste": 15,
                            "price": 18},
                 "note": "A long expansion joint in sausage packs: bigger joints, fewer packs."},
                {"inputs": {"length": 20, "width": 0.25, "depth": 0.25, "tube": 310, "waste": 5,
                            "price": 9},
                 "note": "A small window run where one tube covers the job."},
            ],
            "pitfalls": [
                "<strong>Joint depth over-filled.</strong> Sealant needs a backer and a correct depth to "
                "stretch.",
                "<strong>Wastage left at zero.</strong> A gun always leaves some in the tube.",
                "<strong>Tube volume guessed.</strong> A sausage is 600 mL, a cartridge 310.",
            ],
            "units_note": ("<p>Joint length in feet, width and depth in inches, volume in millilitres, tube "
                           "count as whole tubes, wastage as a percentage and cost in dollars.</p>"),
            "limits": [
                "<strong>A rectangular joint.</strong> A fillet uses less, a deep gap needs a backer.",
                "<strong>No movement allowance.</strong> Joint design is a separate question.",
            ],
            "uses": [
                "<li>Buying sealant for a run of joints.</li>",
                "<li>Comparing cartridges with sausages.</li>",
                "<li>Pricing a sealing job.</li>",
            ],
        },
        faq=[
            ("How many tubes of sealant for 60 feet of joint?",
             "About four 310 mL cartridges at 3/8 by 1/4 in with ten per cent wastage."),
            ("How much sealant is in a cartridge?",
             "310 mL in a standard cartridge and 600 mL in a sausage."),
        ],
        no_round_trip=["tubes"],
        related=[("/construction/thinset", "Thinset"),
                 ("/construction/mortar", "Mortar"),
                 ("/construction/grout", "Grout")],
    ),
]
