"""Batch 5b — site work: grades, ramps, walls, drainage and layout angles."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="elevation-grade",
        name="Elevation grade",
        title="Elevation Grade Calculator: Slope, Rise and Levels",
        desc="Turn a grade in per cent into the rise over a run, the finished elevation and the level at any station along a driveway, drain or path.",
        what=("<p><strong>Rise = run × grade ÷ 100</strong>; the finished elevation is the start elevation plus "
              "the rise.</p>"),
        fields=[
            F("start_elevation", "Start elevation", "ft", 100, "Existing ground level"),
            F("run", "Run", "ft", 100, "Horizontal distance"),
            F("grade", "Grade", "%", 2, "Fall or rise per hundred"),
            F("station", "Station", "ft", 50, "Distance along the run"),
        ],
        results=[
            R("rise", "Rise", "ft"),
            R("end_elevation", "End elevation", "ft"),
            R("station_elevation", "Level at station", "ft"),
            R("slope_ratio", "Slope ratio", "1 in"),
        ],
        formula={
            "rise": "run*grade/100",
            "end_elevation": "start_elevation+run*grade/100",
            "station_elevation": "start_elevation+station*grade/100",
            "slope_ratio": "100/grade",
            "run": "rise/grade*100",
            "grade": "rise/run*100",
            "start_elevation": "end_elevation-rise",
            "station": "(station_elevation-start_elevation)/grade*100",
        },
        prose={
            "why": ("<p>Grades are quoted in per cent because a surveyor's level and a laser both work in per "
                    "cent, while plans are drawn in feet. Turning a grade into a rise over a known run is how "
                    "a driveway, a drain or a path gets its levels set before any material arrives.</p>"),
            "formula_note": ("<p>Per cent grade is rise over run times a hundred, so the rise is the run "
                             "multiplied by the grade and divided by a hundred. The level at a station is the "
                             "same sum with the station in place of the run, which is why a long run is better "
                             "checked at two or three stations than at the end.</p>"),
            "example_note": ("<p>A {grade|unit} grade over {run|unit} rises {rise|unit}, taking "
                             "{start_elevation|unit} to {end_elevation|unit}. Halfway along, at "
                             "{station|unit}, the level is {station_elevation|unit}.</p>"),
            "reading": ("<p>Read the slope ratio against the grade: a two per cent grade is one in fifty, a "
                        "ten per cent grade is one in ten. If the ratio comes out below about eight, the slope "
                        "is steeper than a vehicle should be asked to climb.</p>"),
            "scenarios": [
                {"inputs": {"grade": 12, "run": 40},
                 "note": "A steep driveway: twelve per cent is close to the practical limit."},
                {"inputs": {"grade": -2, "run": 120},
                 "note": "A negative grade falls away from the start elevation."},
            ],
            "pitfalls": [
                "<strong>Grade entered as a decimal.</strong> Two per cent is 2, not 0.02.",
                "<strong>Run measured along the slope.</strong> Grade uses the horizontal distance.",
                "<strong>Sign ignored.</strong> A fall is negative.",
            ],
            "units_note": ("<p>Elevations, runs and stations in feet, grade in per cent, the ratio as one in "
                           "so many.</p>"),
            "limits": [
                "<strong>Constant grade.</strong> A vertical curve changes the rate.",
                "<strong>No earthwork.</strong> Cut and fill volumes are not included.",
            ],
            "uses": [
                "<li>Setting a driveway fall.</li>",
                "<li>Checking a drainage invert.</li>",
                "<li>Levels for a garden path.</li>",
            ],
        },
        faq=[
            ("How do I convert a grade to a rise?",
             "Multiply the run by the grade in per cent and divide by a hundred."),
            ("What is a two per cent grade in inches per foot?",
             "About a quarter inch per foot, which is one in fifty."),
        ],
        related=[("/construction/ramp-slope", "Ramp slope"),
                 ("/construction/ladder-angle", "Ladder angle"),
                 ("/construction/gravel-driveway", "Gravel driveway")],
    ),

    S(
        slug="ramp-slope",
        name="Ramp slope",
        title="Ramp Slope Calculator: Run, Length and Gradient",
        desc="Work out the run a ramp needs for a given rise at a chosen slope ratio, with the sloping length, the gradient in per cent and the deck area.",
        what=("<p><strong>Run = rise × ratio</strong>; the sloping length is the square root of rise squared "
              "plus run squared.</p>"),
        fields=[
            F("rise", "Rise", "in", 24, "Height to climb"),
            F("slope_ratio", "Slope ratio", "1 in", 12, "Twelve is the accessible standard"),
            F("width", "Ramp width", "ft", 4, "Deck width"),
        ],
        results=[
            R("run_ft", "Run", "ft"),
            R("length_ft", "Sloping length", "ft"),
            R("slope_pct", "Gradient", "%"),
            R("deck_ft2", "Deck area", "ft²"),
        ],
        formula={
            "run_ft": "rise*slope_ratio/12",
            "length_ft": "sqrt(pow(rise,2)+pow(rise*slope_ratio,2))/12",
            "slope_pct": "100/slope_ratio",
            "deck_ft2": "sqrt(pow(rise,2)+pow(rise*slope_ratio,2))/12*width",
            "rise": "run_ft*12/slope_ratio",
            "slope_ratio": "run_ft*12/rise",
            "width": "deck_ft2/length_ft",
        },
        prose={
            "why": ("<p>A ramp is described by its ratio — one in twelve means twelve inches of run for every "
                    "inch of rise — and a ratio is easy to misread as a per cent grade. The two are "
                    "reciprocals of each other, so one in twelve is eight and a third per cent, not twelve.</p>"),
            "formula_note": ("<p>The run comes straight from the ratio once the rise and the ratio are in the "
                             "same units. The sloping length is the hypotenuse of the rise and the run, and "
                             "the deck area multiplies that length by the width of the ramp rather than its "
                             "plan.</p>"),
            "example_note": ("<p>A {rise|unit} rise at one in {slope_ratio} needs a {run_ft|unit} run and a "
                             "{length_ft|unit} ramp, which is a {slope_pct|unit} gradient and "
                             "{deck_ft2|unit} of deck.</p>"),
            "reading": ("<p>Read the gradient against the ratio: one in twelve is about eight per cent, one in "
                        "eight is twelve and a half. Anything steeper than one in eight is a step with a "
                        "surface, not a ramp.</p>"),
            "scenarios": [
                {"inputs": {"rise": 12, "slope_ratio": 8},
                 "note": "A short garden ramp at the steepest sensible ratio."},
                {"inputs": {"rise": 36, "slope_ratio": 12, "width": 5},
                 "note": "Three feet up at the accessible ratio: a long ramp needing a landing."},
            ],
            "pitfalls": [
                "<strong>Ratio read as per cent.</strong> One in twelve is 8.33 per cent.",
                "<strong>Run measured on the slope.</strong> The run is horizontal.",
                "<strong>Landings left out.</strong> Long ramps need resting platforms.",
            ],
            "units_note": ("<p>Rise in inches, run and length in feet, width in feet, gradient in per cent.</p>"),
            "limits": [
                "<strong>Straight ramp.</strong> A switchback adds landings.",
                "<strong>No handrails or curbs.</strong> Both take material and cost.",
            ],
            "uses": [
                "<li>Designing an accessible entrance.</li>",
                "<li>Checking a shed or garage ramp.</li>",
                "<li>Costing the deck for a sloped path.</li>",
            ],
        },
        faq=[
            ("What is the standard ramp slope?",
             "One in twelve, which is about eight and a third per cent."),
            ("How long a ramp do I need for 24 inches?",
             "Twenty four feet of run at one in twelve, or about thirty four feet of sloping surface."),
        ],
        related=[("/construction/elevation-grade", "Elevation grade"),
                 ("/construction/ladder-angle", "Ladder angle"),
                 ("/construction/stairs", "Stairs")],
    ),

    S(
        slug="retaining-wall",
        name="Retaining wall",
        title="Retaining Wall Calculator: Blocks, Courses and Cost",
        desc="Work out how many blocks a retaining wall takes from its length, height and block size, with the cap run and the cost of blocks and caps.",
        what=("<p><strong>Courses = wall height ÷ block height</strong>; <strong>blocks = blocks per course × "
              "courses</strong>.</p>"),
        fields=[
            F("length", "Wall length", "ft", 20, "Straight run"),
            F("height", "Wall height", "ft", 3, "Finished height"),
            F("block_length", "Block length", "in", 12, "Face length"),
            F("block_height", "Block height", "in", 6, "Course height"),
            F("price", "Block price", "$", 4, "Each block"),
            F("cap_price", "Cap price", "$/ft", 8, "Cap per linear foot"),
        ],
        results=[
            R("wall_area", "Wall face", "ft²"),
            R("courses", "Courses", ""),
            R("blocks", "Blocks", ""),
            R("cap_ft", "Cap length", "ft"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "wall_area": "length*height",
            "courses": "ceil(height*12/block_height)",
            "blocks": "ceil(length*12/block_length)*ceil(height*12/block_height)",
            "cap_ft": "length",
            "cost": "ceil(length*12/block_length)*ceil(height*12/block_height)*price+length*cap_price",
            "length": "wall_area/height",
            "height": "wall_area/length",
            "price": "(cost-cap_ft*cap_price)/blocks",
            "cap_price": "(cost-blocks*price)/cap_ft",
        },
        prose={
            "why": ("<p>A block wall is counted in courses, not square feet, because blocks are laid in rows "
                    "and every row ends in a block or a cut. Knowing the course count first is what tells you "
                    "whether the last row will be a full block or a sliver that has to be trimmed.</p>"),
            "formula_note": ("<p>The wall height in inches divided by the block height gives the courses, "
                             "rounded up. The length divided by the block length gives the blocks in a "
                             "course. Multiply the two and add the cap, which is bought by the linear "
                             "foot.</p>"),
            "example_note": ("<p>A {length|unit} wall {height|unit} high in {block_length|unit} by "
                             "{block_height|unit} blocks is {courses} courses of blocks, {blocks} blocks in "
                             "all, with {cap_ft|unit} of cap. The material comes to {cost}.</p>"),
            "reading": ("<p>Read the courses against the height: six inch blocks give two courses per foot. An "
                        "odd number of courses usually means the cap will sit on a cut course, which wastes "
                        "blocks and shows.</p>"),
            "scenarios": [
                {"inputs": {"height": 2, "block_height": 4},
                 "note": "A low garden wall in shallow blocks: six courses."},
                {"inputs": {"length": 45, "height": 4, "block_length": 18},
                 "note": "A long wall in longer blocks: fewer blocks per course."},
            ],
            "pitfalls": [
                "<strong>Square feet ordered instead of blocks.</strong> Cuts and corners waste blocks.",
                "<strong>Cap forgotten.</strong> It is a separate line.",
                "<strong>Height above the footing.</strong> Buried courses still cost money.",
            ],
            "units_note": ("<p>Length and height in feet, block dimensions in inches, blocks each, cap by the "
                           "linear foot.</p>"),
            "limits": [
                "<strong>Gravity walls.</strong> Tall walls need engineering and a geogrid.",
                "<strong>No base or drainage stone.</strong> Both are needed and both cost.",
            ],
            "uses": [
                "<li>Ordering blocks for a garden wall.</li>",
                "<li>Checking a contractor's course count.</li>",
                "<li>Budgeting a terrace wall.</li>",
            ],
        },
        faq=[
            ("How many blocks per square foot of wall?",
             "Two for a six by twelve block, more for a shorter block."),
            ("How many courses in a three foot wall?",
             "Six with six inch blocks, or nine with four inch blocks."),
        ],
        related=[("/construction/fence-perimeter", "Fence perimeter"),
                 ("/construction/gravel-driveway", "Gravel driveway"),
                 ("/construction/square-footage", "Square footage")],
    ),

    S(
        slug="gravel-driveway",
        name="Gravel driveway",
        title="Gravel Driveway Calculator: Yards, Tons and Cost",
        desc="Work out how much gravel a driveway needs in cubic yards and tons from its area, depth and density, then price it at a cost per ton.",
        what=("<p><strong>Cubic yards = length × width × depth ÷ 12 ÷ 27</strong>, and <strong>tons = cubic "
              "yards × 27 × density ÷ 2 000</strong>.</p>"),
        fields=[
            F("length", "Driveway length", "ft", 50, "Total run"),
            F("width", "Driveway width", "ft", 12, "Single lane"),
            F("depth", "Depth", "in", 4, "Compacted thickness"),
            F("density", "Density", "lb/ft³", 110, "Gravel is about 100 to 120"),
            F("waste", "Waste", "%", 5, "For compaction and spreading"),
            F("price", "Price", "$/ton", 35, "Delivered gravel"),
        ],
        results=[
            R("volume_yd3", "Volume", "yd³"),
            R("tons", "Tons", "ton"),
            R("tonnes", "Tonnes", "t"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "volume_yd3": "length*width*depth/12*(1+waste/100)/27",
            "tons": "length*width*depth/12*(1+waste/100)*density/2000",
            "tonnes": "length*width*depth/12*(1+waste/100)*density/2204.62",
            "cost": "length*width*depth/12*(1+waste/100)*density/2000*price",
            "length": "volume_yd3*27/(width*depth/12*(1+waste/100))",
            "depth": "volume_yd3*27/(length*width*(1+waste/100))*12",
            "price": "cost/tons",
            "waste": "(volume_yd3*27/(length*width*depth/12)-1)*100",
        },
        prose={
            "why": ("<p>Gravel is sold by the ton and laid by the yard, so a driveway estimate has to cross "
                    "between the two. The density of the stone is what does the crossing, and it is the number "
                    "most estimates get wrong — a ton of gravel is not a cubic yard of it.</p>"),
            "formula_note": ("<p>The area times the depth gives cubic feet, a waste allowance is added for "
                             "compaction and spreading, and twenty seven cubic feet make a cubic yard. Weight "
                             "is the volume times the density, divided by two thousand for short tons or by "
                             "the metric conversion for tonnes.</p>"),
            "example_note": ("<p>A {length|unit} by {width|unit} drive at {depth|unit} deep is "
                             "{volume_yd3|unit} of gravel — {tons} tons, or {tonnes} tonnes — costing {cost} "
                             "at the price on the form.</p>"),
            "reading": ("<p>Read the tons against the yards: gravel runs about a ton and a third to a ton and "
                        "a half per cubic yard. A figure near two tons per yard means the density has been "
                        "entered for stone rather than for loose gravel.</p>"),
            "scenarios": [
                {"inputs": {"depth": 6, "density": 120},
                 "note": "A deeper base in heavier stone: the tonnage climbs fast."},
                {"inputs": {"length": 120, "width": 10, "depth": 3},
                 "note": "A long single-track lane with a thin dressing."},
            ],
            "pitfalls": [
                "<strong>Depth entered in feet.</strong> The form wants inches.",
                "<strong>Density of solid rock.</strong> Loose gravel is nearer 110 lb/ft³.",
                "<strong>No compaction allowance.</strong> Four inches loose is not four compacted.",
            ],
            "units_note": ("<p>Area in feet, depth in inches, volume in cubic yards, weight in short tons and "
                           "metric tonnes.</p>"),
            "limits": [
                "<strong>One layer.</strong> A base and a surface are two separate orders.",
                "<strong>No subgrade.</strong> Soft ground needs geotextile and more stone.",
            ],
            "uses": [
                "<li>Ordering gravel for a drive.</li>",
                "<li>Comparing a delivered price per ton.</li>",
                "<li>Checking a grader's estimate.</li>",
            ],
        },
        faq=[
            ("How many tons of gravel in a cubic yard?",
             "About 1.4 at 110 pounds per cubic foot, which is typical for loose driveway gravel."),
            ("How much gravel for a 50 by 12 drive?",
             "Four inches deep is about 7.8 cubic yards, or 11.6 tons before waste."),
        ],
        related=[("/construction/asphalt", "Asphalt"),
                 ("/construction/french-drain", "French drain"),
                 ("/construction/elevation-grade", "Elevation grade")],
    ),

    S(
        slug="french-drain",
        name="French drain",
        title="French Drain Calculator: Gravel, Pipe and Fabric",
        desc="Size a French drain trench: the gravel it holds, the pipe and geotextile that line it, and the cost of the three at your own prices.",
        what=("<p><strong>Trench cubic feet = length × width × depth ÷ 144</strong> with inches for width and "
              "depth; the gravel weight follows from the density.</p>"),
        fields=[
            F("length", "Drain length", "ft", 60, "Total trench"),
            F("trench_width", "Trench width", "in", 12, "A shovel's width"),
            F("trench_depth", "Trench depth", "in", 18, "Below the surface"),
            F("density", "Gravel density", "lb/ft³", 100, "Washed stone is about 100"),
            F("gravel_price", "Gravel price", "$/ton", 45, "Delivered"),
            F("pipe_price", "Pipe price", "$/ft", 1.5, "Perforated pipe"),
            F("fabric_price", "Fabric price", "$/ft²", 0.4, "Geotextile"),
        ],
        results=[
            R("trench_ft3", "Trench volume", "ft³"),
            R("gravel_tons", "Gravel", "ton"),
            R("pipe_ft", "Pipe", "ft"),
            R("fabric_ft2", "Fabric", "ft²"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "trench_ft3": "length*trench_width*trench_depth/144",
            "gravel_tons": "length*trench_width*trench_depth/144*density/2000",
            "pipe_ft": "length",
            "fabric_ft2": "length*(trench_width+2*trench_depth)/12",
            "cost": "length*trench_width*trench_depth/144*density/2000*gravel_price"
                    "+length*pipe_price+length*(trench_width+2*trench_depth)/12*fabric_price",
            "length": "trench_ft3*144/(trench_width*trench_depth)",
            "trench_depth": "trench_ft3*144/(length*trench_width)",
            "trench_width": "trench_ft3*144/(length*trench_depth)",
            "gravel_price": "(cost-pipe_ft*pipe_price-fabric_ft2*fabric_price)/gravel_tons",
        },
        prose={
            "why": ("<p>A French drain is a trench filled with stone around a perforated pipe, lined with "
                    "fabric so the soil does not silt it up. It is cheap to build and easy to under-order, "
                    "because the stone is nearly the whole volume and the pipe is a small part of the cost.</p>"),
            "formula_note": ("<p>The trench is a long box, so its volume is length times width times depth, "
                             "with the two small dimensions in inches and the conversion of a hundred and "
                             "forty four folded in. The fabric has to line the sides and the bottom, so it "
                             "takes the width plus twice the depth for every foot of trench.</p>"),
            "example_note": ("<p>{length|unit} of trench {trench_width|unit} wide and {trench_depth|unit} "
                             "deep holds {trench_ft3|unit} of stone — {gravel_tons} tons — with {pipe_ft|unit} "
                             "of pipe and {fabric_ft2|unit} of fabric, for {cost} at the prices shown.</p>"),
            "reading": ("<p>Read the stone against the length: a foot of twelve by eighteen trench holds about "
                        "a cubic foot and a half, so the tons should be a little under a tenth of the length "
                        "in feet. Half that suggests a missing conversion.</p>"),
            "scenarios": [
                {"inputs": {"length": 120, "trench_width": 18, "trench_depth": 24},
                 "note": "A deep, wide drain around a wet basement: much more stone."},
                {"inputs": {"length": 40, "trench_depth": 12},
                 "note": "A shallow surface drain for a lawn."},
            ],
            "pitfalls": [
                "<strong>Fabric counted once.</strong> It lines both sides and the bottom.",
                "<strong>Stone compacted.</strong> Loose fill settles; order a little more.",
                "<strong>No fall.</strong> A level trench holds water instead of moving it.",
            ],
            "units_note": ("<p>Length in feet, trench dimensions in inches, stone in tons, fabric in square "
                           "feet.</p>"),
            "limits": [
                "<strong>Straight trench.</strong> Corners and outlets need fittings.",
                "<strong>No outlet design.</strong> The drain still needs somewhere to go.",
            ],
            "uses": [
                "<li>Ordering stone for a drain.</li>",
                "<li>Costing a basement waterproofing job.</li>",
                "<li>Checking a landscaper's quantities.</li>",
            ],
        },
        faq=[
            ("How much gravel goes in a French drain?",
             "The whole trench volume — about a cubic foot and a half per foot for twelve by eighteen."),
            ("Do I need fabric around a French drain?",
             "Yes, or the surrounding soil silts into the stone and the drain stops working."),
        ],
        related=[("/construction/gravel-driveway", "Gravel driveway"),
                 ("/construction/retaining-wall", "Retaining wall"),
                 ("/construction/elevation-grade", "Elevation grade")],
    ),

    S(
        slug="ladder-angle",
        name="Ladder angle",
        title="Ladder Angle Calculator: Safety, Base and Length",
        desc="Find the angle a ladder makes with the ground from its height and base, the length of the ladder it needs and the safe base distance.",
        what=("<p><strong>Angle = arctan(height ÷ base)</strong>, and the safe rule is a base of one quarter "
              "of the height.</p>"),
        fields=[
            F("height", "Height to the wall", "ft", 12, "Where the ladder touches"),
            F("base", "Base out from wall", "ft", 3, "Foot of the ladder"),
        ],
        results=[
            R("angle", "Angle", "°"),
            R("ladder_length", "Ladder length", "ft"),
            R("ratio", "Height to base", ""),
            R("safe_base", "Safe base", "ft"),
        ],
        formula={
            "angle": "atan(height/base)*180/pi",
            "ladder_length": "sqrt(pow(height,2)+pow(base,2))",
            "ratio": "height/base",
            "safe_base": "height/4",
            "base": "height/tan(angle*pi/180)",
            "height": "base*tan(angle*pi/180)",
        },
        prose={
            "why": ("<p>A ladder is a lever, and the angle at its foot decides whether it stays up. Too "
                    "vertical and it tips backwards over the wall; too shallow and the feet slide out. The "
                    "rule every fire service teaches is one out for every four up, which is about "
                    "seventy six degrees.</p>"),
            "formula_note": ("<p>Height over base is the tangent of the angle at the ground, so the inverse "
                             "tangent gives the angle in degrees. The ladder length is the hypotenuse of the "
                             "same triangle and has to be at least as long as that, before any allowance for "
                             "reaching past the wall.</p>"),
            "example_note": ("<p>A {height|unit} wall with the feet {base|unit} out is {ratio} to one, which "
                             "is {angle|unit}. A ladder touching the wall takes {ladder_length|unit}, and the "
                             "safe base for this height is {safe_base|unit}.</p>"),
            "reading": ("<p>Read the angle: between seventy and eighty degrees is the safe band, and one in "
                        "four sits at seventy six. Below sixty five degrees the feet will slide; above eighty "
                        "five the ladder is better described as a very long stick.</p>"),
            "scenarios": [
                {"inputs": {"height": 20, "base": 4},
                 "note": "The rule of four at a two storey height."},
                {"inputs": {"height": 10, "base": 5},
                 "note": "A base of half the height: far too shallow and unsafe."},
            ],
            "pitfalls": [
                "<strong>Base measured from the wall's face at the top.</strong> Use the foot.",
                "<strong>Ladder exactly the length needed.</strong> Leave a few rungs above the wall.",
                "<strong>Soft ground.</strong> Feet sink and the angle shallows.",
            ],
            "units_note": ("<p>Heights and base in feet, the angle in degrees, the ratio as height to base.</p>"),
            "limits": [
                "<strong>Plain ladder geometry.</strong> No wind or footing strength.",
                "<strong>Not a working-at-height plan.</strong> Use the manufacturer's rules.",
            ],
            "uses": [
                "<li>Setting a ladder against a wall.</li>",
                "<li>Choosing a ladder length.</li>",
                "<li>Checking a roofer's setup.</li>",
            ],
        },
        faq=[
            ("What is the correct ladder angle?",
             "About seventy five degrees, which is a base of one quarter of the height."),
            ("How long a ladder do I need for 12 feet?",
             "At least 12.4 feet to the contact point, plus enough to reach past it."),
        ],
        related=[("/construction/ramp-slope", "Ramp slope"),
                 ("/construction/angle-of-depression", "Angle of depression"),
                 ("/construction/elevation-grade", "Elevation grade")],
    ),

    S(
        slug="vertical-curve",
        name="Vertical curve",
        title="Vertical Curve Calculator: K Value and Offset",
        desc="Work out the rate of change, the K value and the turning point of a vertical curve from its two grades and its length, in road or site work.",
        what=("<p><strong>A = g₂ − g₁</strong>, <strong>K = length ÷ |A|</strong>, and the turning point sits "
              "where <strong>g₁ ÷ |A|</strong> of the curve has run.</p>"),
        fields=[
            F("g1", "Entry grade", "%", 2, "Grade before the curve"),
            F("g2", "Exit grade", "%", -3, "Grade after it"),
            F("length", "Curve length", "ft", 500, "Along the profile"),
        ],
        results=[
            R("a_rate", "Rate of change", "%"),
            R("k_value", "K value", "ft/%"),
            R("turning_station", "Turning point", "ft"),
            R("mid_offset", "Mid-curve offset", "ft"),
        ],
        formula={
            "a_rate": "g2-g1",
            "k_value": "length/abs(g2-g1)",
            "turning_station": "abs(g1)*length/abs(g2-g1)",
            "mid_offset": "abs(g2-g1)*length/800",
            "length": "k_value*abs(g2-g1)",
            "g1": "g2-a_rate",
            "g2": "g1+a_rate",
        },
        prose={
            "why": ("<p>Roads and site roads change grade along a vertical curve rather than at a sharp "
                    "break, because a vehicle at speed cannot follow a kink. The K value is the one number "
                    "highway agencies publish: it says how much length buys one per cent of grade "
                    "change.</p>"),
            "formula_note": ("<p>The algebraic difference of the two grades is the total change, and dividing "
                             "the curve length by that change gives the K value in feet per per cent. The "
                             "turning point — the crest or the sag — sits where the entry grade has been "
                             "worked off, which is the entry grade divided by the total change.</p>"),
            "example_note": ("<p>A curve from {g1|unit} to {g2|unit} over {length|unit} changes by "
                             "{a_rate|unit}, so K is {k_value|unit}. The turning point is "
                             "{turning_station|unit} into the curve and the mid-curve offset is "
                             "{mid_offset|unit}.</p>"),
            "reading": ("<p>Read K against the length: a small K on a big grade change is a tight curve that "
                        "will be uncomfortable at speed. On a driveway a K under thirty is usually fine; on a "
                        "public road the minimum is set by design speed.</p>"),
            "scenarios": [
                {"inputs": {"g1": 4, "g2": 4},
                 "note": "Equal grades: no curve at all, and K is undefined."},
                {"inputs": {"g1": -2, "g2": 5, "length": 300},
                 "note": "A sag curve over a shorter length: a sharper K."},
            ],
            "pitfalls": [
                "<strong>Grades in feet per foot.</strong> The form takes per cent.",
                "<strong>Sign dropped.</strong> A falling grade is negative.",
                "<strong>Offset read as a height.</strong> It is the vertical distance from the tangent.",
            ],
            "units_note": ("<p>Grades in per cent, length and station in feet, K in feet per per cent.</p>"),
            "limits": [
                "<strong>Parabolic curve.</strong> Other profiles have other offsets.",
                "<strong>No sight distance.</strong> Stopping sight is a separate check.",
            ],
            "uses": [
                "<li>Laying out a site road.</li>",
                "<li>Checking a crest for drainage.</li>",
                "<li>Setting out levels on a long drive.</li>",
            ],
        },
        faq=[
            ("What is a K value in a vertical curve?",
             "The length of curve for each one per cent change of grade."),
            ("Where is the high point of a vertical curve?",
             "Where the grade passes through zero — the entry grade divided by the total change along the "
             "curve."),
        ],
        related=[("/construction/elevation-grade", "Elevation grade"),
                 ("/construction/ramp-slope", "Ramp slope"),
                 ("/construction/angle-of-depression", "Angle of depression")],
    ),

    S(
        slug="angle-of-depression",
        name="Angle of depression",
        title="Angle of Depression Calculator: Sight Line and Slope",
        desc="Find the angle of depression from a height and a horizontal distance, with the straight line of sight and the same slope as a percentage.",
        what=("<p><strong>Angle = arctan(height ÷ distance)</strong>, measured down from the horizontal.</p>"),
        fields=[
            F("height", "Height", "ft", 20, "Eye or instrument above the target"),
            F("distance", "Horizontal distance", "ft", 50, "Level distance to the target"),
        ],
        results=[
            R("angle", "Angle of depression", "°"),
            R("slope_pct", "Slope", "%"),
            R("line_of_sight", "Line of sight", "ft"),
            R("horizon_ratio", "Drop per 100 ft", "ft"),
        ],
        formula={
            "angle": "atan(height/distance)*180/pi",
            "slope_pct": "height/distance*100",
            "line_of_sight": "sqrt(pow(height,2)+pow(distance,2))",
            "horizon_ratio": "height/distance*100",
            "distance": "height/tan(angle*pi/180)",
            "height": "distance*tan(angle*pi/180)",
        },
        prose={
            "why": ("<p>The angle of depression is what a surveyor, a drone pilot or a roofer measures when "
                    "looking down at something: the angle between the horizontal and the line of sight. It is "
                    "the mirror image of the angle of elevation and uses exactly the same triangle.</p>"),
            "formula_note": ("<p>Height over horizontal distance is the tangent of the angle, so the inverse "
                             "tangent gives the answer. The line of sight is the hypotenuse, and the slope in "
                             "per cent is the same ratio times a hundred, which is why a twenty per cent slope "
                             "and an eleven degree depression describe the same line.</p>"),
            "example_note": ("<p>From {height|unit} up, a target {distance|unit} away lies at {angle|unit} "
                             "below the horizontal, on a line of sight {line_of_sight|unit} long. The same "
                             "line is a {slope_pct|unit} slope.</p>"),
            "reading": ("<p>Read the angle against the slope: forty five degrees is a hundred per cent, and "
                        "every ten per cent of slope is about five and three quarter degrees. A large angle "
                        "with a small slope means the height and distance have been swapped.</p>"),
            "scenarios": [
                {"inputs": {"height": 6, "distance": 60},
                 "note": "Eye height looking down a long drive: a shallow angle."},
                {"inputs": {"height": 30, "distance": 30},
                 "note": "Equal height and distance: forty five degrees exactly."},
            ],
            "pitfalls": [
                "<strong>Distance measured along the ground slope.</strong> Use the horizontal.",
                "<strong>Angle measured from the vertical.</strong> Depression is from the horizontal.",
                "<strong>Height to the wrong point.</strong> Use the instrument, not the ground.",
            ],
            "units_note": ("<p>Height and distance in feet, the angle in degrees, slope in per cent.</p>"),
            "limits": [
                "<strong>Flat earth.</strong> Very long sights need curvature correction.",
                "<strong>No refraction.</strong> Surveying instruments correct for it separately.",
            ],
            "uses": [
                "<li>Setting out a sight line.</li>",
                "<li>Checking a drainage fall on site.</li>",
                "<li>Working out a drone camera angle.</li>",
            ],
        },
        faq=[
            ("What is the difference between elevation and depression?",
             "Elevation is measured up from the horizontal, depression down; the triangle is the same."),
            ("What angle is a 20 per cent slope?",
             "About eleven and a third degrees, since the tangent of the angle is 0.2."),
        ],
        related=[("/construction/elevation-grade", "Elevation grade"),
                 ("/construction/ladder-angle", "Ladder angle"),
                 ("/construction/ramp-slope", "Ramp slope")],
    ),
]
