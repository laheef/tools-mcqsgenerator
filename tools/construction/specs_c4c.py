"""Batch 4c — area conversions, planning ratios, roofs and insulation."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="square-meter",
        name="Square meter",
        title="Square Meter Calculator: Area in m² and ft²",
        desc="Work out an area in square meters from a rectangle, a circle or a triangle, with the square footage and the cost at a price per square meter.",
        what=("<p><strong>Rectangle = a × b</strong>, <strong>circle = π × r²</strong>, <strong>triangle = "
              "½ × base × height</strong>, then <strong>ft² = m² × 10.764</strong>.</p>"),
        fields=[
            F("length", "Length", "m", 5, "Rectangle side"),
            F("width", "Width", "m", 4, "Rectangle side"),
            F("shape_factor", "Shape factor", "", 1, "1 rectangle, 0.785 circle, 0.5 triangle"),
            F("price", "Price", "$/m²", 22, "Material per square meter"),
        ],
        results=[
            R("area_m2", "Area", "m²"),
            R("area_ft2", "Area", "ft²"),
            R("perimeter", "Perimeter", "m"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "area_m2": "length*width*shape_factor",
            "area_ft2": "length*width*shape_factor*10.7639",
            "perimeter": "2*(length+width)",
            "cost": "length*width*shape_factor*price",
            "length": "area_m2/(width*shape_factor)",
            "width": "area_m2/(length*shape_factor)",
            "shape_factor": "area_m2/(length*width)",
            "price": "cost/area_m2",
        },
        prose={
            "why": ("<p>Most of the world quotes flooring, paint and land in square metres, and most plans "
                    "drawn in feet are quoted in square feet, so the conversion runs in both directions every "
                    "working day. One square metre is 10.764 square feet — a little more than a square "
                    "yard.</p>"),
            "formula_note": ("<p>The shape factor turns the rectangle into the other common shapes: π/4 for a "
                             "circle described by its diameter, and 0.5 for a triangle. The perimeter stays a "
                             "rectangle's perimeter, which is the correct figure for skirting and edging.</p>"),
            "example_note": ("<p>A rectangle 5 by 4 m is {area_m2|unit} — {area_ft2|unit} — with {perimeter|unit} "
                             "around it. At $22 a square metre the material is {cost}.</p>"),
            "reading": ("<p>Read the square metres against the square feet: ten to one, roughly. A result much "
                        "closer than that means the metric figure has been typed into the imperial "
                        "conversion.</p>"),
            "scenarios": [
                {"inputs": {"length": 6, "width": 6, "shape_factor": 0.785, "price": 30},
                 "note": "A circle drawn inside a 6 m square: the factor turns it into the round bed."},
                {"inputs": {"length": 8, "width": 5, "shape_factor": 0.5, "price": 18},
                 "note": "A triangular gable end: half the rectangle that encloses it."},
            ],
            "pitfalls": [
                "<strong>Centimetres entered as metres.</strong> A factor of ten thousand.",
                "<strong>Radius used as diameter for a circle.</strong> The factor assumes the full width.",
                "<strong>Perimeter assumed for every shape.</strong> A circle's perimeter is π times the "
                "diameter.",
            ],
            "units_note": ("<p>Dimensions in metres, area in square metres and square feet, perimeter in "
                           "metres and cost in dollars per square metre.</p>"),
            "limits": [
                "<strong>Three shapes.</strong> Irregular rooms need splitting into these.",
                "<strong>Plan area.</strong> Sloping surfaces are larger than their plan.",
            ],
            "uses": [
                "<li>Converting a plan to metric.</li>",
                "<li>Pricing imported flooring.</li>",
                "<li>Checking a property's floor area.</li>",
            ],
        },
        faq=[
            ("How many square feet in a square meter?",
             "10.764."),
            ("How do I work out square meters of a circle?",
             "Three point one four times the radius squared, or 0.785 times the diameter squared."),
        ],
        related=[("/construction/square-footage", "Square footage"),
                 ("/construction/square-yard", "Square yard"),
                 ("/construction/floor-area-ratio", "Floor area ratio")],
    ),

    S(
        slug="square-yard",
        name="Square yard",
        title="Square Yard Calculator: Area, Perimeter and Cost",
        desc="Work out a rectangular area in square yards and square feet from its sides, with the perimeter and the cost at a price per square yard.",
        what=("<p><strong>Square yards = length × width ÷ 9</strong>, and the perimeter is twice the sum of "
              "the sides.</p>"),
        fields=[
            F("length", "Length", "ft", 15, "One side"),
            F("width", "Width", "ft", 12, "The other"),
            F("price", "Price", "$/yd²", 20, "Material per square yard"),
        ],
        results=[
            R("area_yd2", "Area", "yd²"),
            R("area_ft2", "Area", "ft²"),
            R("perimeter", "Perimeter", "ft"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "area_yd2": "length*width/9",
            "area_ft2": "length*width",
            "perimeter": "2*(length+width)",
            "cost": "length*width/9*price",
            "length": "area_ft2/width",
            "width": "area_ft2/length",
            "price": "cost/area_yd2",
        },
        prose={
            "why": ("<p>The square yard is the unit carpet, concrete and topsoil are still sold in across "
                    "the United States, and it is a ninth of a square foot — a figure that catches out anyone "
                    "who assumes a yard is three feet and forgets to square it.</p>"),
            "formula_note": ("<p>Length times width gives square feet, and nine of those make a square yard. "
                             "The perimeter is a plain length and stays in feet, which is what a border, "
                             "edging or skirting is bought in.</p>"),
            "example_note": ("<p>A rectangle 15 by 12 ft is {area_ft2|unit} — {area_yd2|unit} — with "
                             "{perimeter|unit} around it. At $20 a square yard the material is {cost}.</p>"),
            "reading": ("<p>Read the two areas together: nine square feet to one square yard. If they come out "
                        "close, the dimensions have been entered in yards rather than feet.</p>"),
            "scenarios": [
                {"inputs": {"length": 30, "width": 20, "price": 16},
                 "note": "A larger floor where the square yardage is the number on the quote."},
                {"inputs": {"length": 9, "width": 9, "price": 25},
                 "note": "A nine-foot square, which is exactly nine square yards — a useful check."},
            ],
            "pitfalls": [
                "<strong>Dividing by three instead of nine.</strong> Both dimensions need converting, "
                "because a yard of length and a yard of width make nine square feet, not three.",
                "<strong>Perimeter priced as area.</strong> Edging and skirting are bought by the running "
                "foot, and that figure stays in feet.",
                "<strong>Waste left out.</strong> Carpet, turf and paving all need an allowance for cuts, "
                "and the allowance is applied to the square yardage rather than the square footage.",
            ],
            "units_note": ("<p>Dimensions in feet, area in square yards and square feet, perimeter in feet and "
                           "cost in dollars per square yard.</p>"),
            "limits": [
                "<strong>A rectangle.</strong> Other shapes need their own area worked out first and then "
                "converted the same way.",
                "<strong>Plan area only.</strong> A sloping roof, a stair or a cambered drive measures "
                "larger than the flat rectangle it plans as.",
                "<strong>No seam allowance.</strong> Carpet and turf are cut from a roll, so the width that "
                "divides into the room matters as much as the area.",
            ],
            "uses": [
                "<li>Buying carpet in square yards.</li>",
                "<li>Ordering concrete or topsoil.</li>",
                "<li>Converting a square-foot quote.</li>",
            ],
        },
        faq=[
            ("How many square feet in a square yard?",
             "Nine."),
            ("How do I convert square feet to square yards?",
             "Divide by nine."),
        ],
        related=[("/construction/square-yards", "Square yards"),
                 ("/construction/carpet", "Carpet"),
                 ("/construction/square-meter", "Square meter")],
    ),

    S(
        slug="square-yards",
        name="Square yards",
        title="Square Yards Calculator: Feet, Metres and Cost",
        desc="Convert square feet or square metres into square yards, with the square footage, the square metres and the cost at a price per square yard.",
        what=("<p><strong>Square yards = ft² ÷ 9</strong> and <strong>= m² × 1.196</strong>; the two are the "
              "same area in different units.</p>"),
        fields=[
            F("square_feet", "Square feet", "ft²", 200, "The area you have"),
            F("price", "Price", "$/yd²", 18, "Material per square yard"),
            F("waste", "Waste", "%", 10, "Cuts and seams"),
        ],
        results=[
            R("square_yards", "Square yards", "yd²"),
            R("square_meters", "Square meters", "m²"),
            R("order_yards", "Order", "yd²"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "square_yards": "square_feet/9",
            "square_meters": "square_feet*0.092903",
            "order_yards": "square_feet/9*(1+waste/100)",
            "cost": "square_feet/9*(1+waste/100)*price",
            "square_feet": "square_yards*9",
            "price": "cost/order_yards",
            "waste": "(order_yards/(square_feet/9)-1)*100",
        },
        prose={
            "why": ("<p>This is the conversion rather than the measurement: a quantity you already know in "
                    "square feet, turned into the square yards a supplier prices in, with the waste applied "
                    "once so the order and the cost agree.</p>"),
            "formula_note": ("<p>Nine square feet to the square yard, and 1.196 square yards to the square "
                             "metre. The waste is applied after the conversion, so the price per square yard "
                             "multiplies the yardage actually being bought.</p>"),
            "example_note": ("<p>Two hundred square feet is {square_yards|unit} — {square_meters|unit}. With ten "
                             "per cent for cuts the order is {order_yards|unit}, and at $18 a square yard the "
                             "cost is {cost}.</p>"),
            "reading": ("<p>Read the square yards against the square feet: nine to one. A figure that is a "
                        "third of the square footage means it has been divided by three instead of nine.</p>\n"
                        "<p>The square metre figure on the same row is a useful second opinion, because a "
                        "square metre and a square yard are within twenty per cent of each other — if the two "
                        "differ by a factor of ten, one of the conversions has gone wrong.</p>"),
            "scenarios": [
                {"inputs": {"square_feet": 450, "price": 14, "waste": 15},
                 "note": "A large room with a diagonal layout: more waste on the same area."},
                {"inputs": {"square_feet": 54, "price": 30, "waste": 5},
                 "note": "A small bathroom: six square yards and almost no waste."},
            ],
            "pitfalls": [
                "<strong>Divided by three.</strong> A yard is three feet, but a square yard is nine square "
                "feet.",
                "<strong>Waste applied to the price.</strong> It belongs in the quantity.",
                "<strong>Metric mixed in.</strong> Square metres are about 20 per cent bigger than square "
                "yards.",
            ],
            "units_note": ("<p>Area in square feet, converted to square yards and square metres, the order in "
                           "square yards and cost in dollars per square yard.</p>"),
            "limits": [
                "<strong>Area only.</strong> Perimeter and length stay in feet.",
                "<strong>A flat surface.</strong> Slopes measure larger than their plan.",
            ],
            "uses": [
                "<li>Converting a square-foot takeoff.</li>",
                "<li>Comparing a metric quote with a US one.</li>",
                "<li>Ordering carpet from an area figure.</li>",
            ],
        },
        faq=[
            ("How many square yards is 200 square feet?",
             "22.2 square yards."),
            ("Is a square yard the same as a square metre?",
             "No — a square metre is about 1.196 square yards, nearly a fifth larger."),
        ],
        related=[("/construction/square-yard", "Square yard"),
                 ("/construction/square-meter", "Square meter"),
                 ("/construction/carpet", "Carpet")],
    ),

    S(
        slug="floor-area-ratio",
        name="Floor area ratio",
        title="Floor Area Ratio Calculator: FAR and Coverage",
        desc="Work out the floor area ratio of a plot from its land area and the floor area built on it, with the ground coverage and the open space left.",
        what=("<p><strong>FAR = total floor area ÷ plot area</strong>; coverage is the footprint divided by "
              "the plot, and both are ratios, not percentages.</p>"),
        fields=[
            F("plot_area", "Plot area", "ft²", 8000, "The land"),
            F("footprint", "Building footprint", "ft²", 2000, "Ground floor area"),
            F("floors", "Floors", "", 2, "Storeys above ground"),
            F("setback_area", "Landscaped or open", "ft²", 4000, "Unbuilt and unpaved"),
        ],
        results=[
            R("total_floor", "Total floor area", "ft²"),
            R("far", "Floor area ratio", ""),
            R("coverage", "Ground coverage", ""),
            R("open_ratio", "Open space ratio", ""),
        ],
        formula={
            "total_floor": "footprint*floors",
            "far": "footprint*floors/plot_area",
            "coverage": "footprint/plot_area",
            "open_ratio": "setback_area/plot_area",
            "plot_area": "footprint*floors/far",
            "footprint": "total_floor/floors",
            "floors": "total_floor/footprint",
            "setback_area": "open_ratio*plot_area",
        },
        prose={
            "why": ("<p>Floor area ratio is the number planning departments use to say how much building a "
                    "plot may carry. It is a ratio rather than a percentage, so a FAR of 1.5 means the "
                    "building's floor area is one and a half times the land — a very different thing from "
                    "150 per cent coverage, which would mean every square foot of ground is built on.</p>"),
            "formula_note": ("<p>Total floor area is the footprint times the number of storeys, and dividing "
                             "that by the plot gives the ratio. Coverage is the footprint alone, which is "
                             "always smaller than FAR once a building is taller than one storey.</p>"),
            "example_note": ("<p>An 8 000 ft² plot with a 2 000 ft² footprint over two floors holds "
                             "{total_floor|unit}. That is a floor area ratio of {far|unit} against a "
                             "{coverage|unit} coverage, leaving an open space ratio of {open_ratio|unit}.</p>"),
            "reading": ("<p>Read the far against the coverage: a two-storey building has exactly twice the "
                        "coverage. If the two are equal, the floors box has been left at one.</p>"),
            "scenarios": [
                {"inputs": {"plot_area": 5000, "footprint": 1500, "floors": 3, "setback_area": 2000},
                 "note": "A three-storey infill: the ratio climbs without the footprint changing."},
                {"inputs": {"plot_area": 20000, "footprint": 2000, "floors": 1, "setback_area": 15000},
                 "note": "A single-storey building on a large plot: the coverage is a tenth."},
            ],
            "pitfalls": [
                "<strong>FAR read as a percentage.</strong> It is a ratio; 1.0 means equal areas.",
                "<strong>Garages and basements.</strong> Whether they count depends on the local code.",
                "<strong>Plot measured at the fence.</strong> It is the registered boundary area.",
            ],
            "units_note": ("<p>All areas in square feet, floors as a count, and the three ratios as plain "
                           "numbers.</p>"),
            "limits": [
                "<strong>A simple block.</strong> Setbacks and podiums follow local rules.",
                "<strong>One plot.</strong> A phased development needs a ratio per phase.",
            ],
            "uses": [
                "<li>Checking a site's permitted floor area.</li>",
                "<li>Comparing two development options.</li>",
                "<li>Explaining a planning condition.</li>",
            ],
        },
        faq=[
            ("What is a good floor area ratio?",
             "It depends on the zone: suburban plots often allow 0.5 to 1.0, city centres far more."),
            ("What is the difference between FAR and coverage?",
             "Coverage counts the ground the building sits on; FAR counts every floor."),
        ],
        related=[("/construction/square-footage", "Square footage"),
                 ("/construction/square-meter", "Square meter"),
                 ("/construction/concrete-slab", "Concrete slab")],
    ),

    S(
        slug="metal-roof-cost",
        name="Metal roof cost",
        title="Metal Roof Cost Calculator: Panels and Price",
        desc="Work out the true roof area from the plan size and the pitch, the number of metal panels it takes, and the total cost with a waste allowance.",
        what=("<p><strong>Roof area = footprint × pitch factor</strong>, where the factor is "
              "√(1 + (rise ÷ 12)²), then <strong>panels = ceiling(area × (1 + waste) ÷ panel area)</strong>.</p>"),
        fields=[
            F("length", "Roof length", "ft", 40, "Along the ridge"),
            F("width", "Roof width", "ft", 24, "Eave to eave"),
            F("pitch", "Pitch", "in/12", 6, "Rise per 12 in of run"),
            F("panel_width", "Panel width", "in", 36, "Cover width of a panel"),
            F("panel_length", "Panel length", "ft", 12, "Supplied length"),
            F("waste", "Waste", "%", 10, "Cuts and laps"),
            F("price", "Price per panel", "$", 85, "Delivered"),
        ],
        results=[
            R("pitch_factor", "Pitch factor", ""),
            R("roof_area", "Roof area", "ft²"),
            R("panels", "Panels", ""),
            R("cost", "Cost", "$"),
        ],
        formula={
            "pitch_factor": "sqrt(1+pow(pitch/12,2))",
            "roof_area": "length*width*sqrt(1+pow(pitch/12,2))",
            "panels": "ceil(length*width*sqrt(1+pow(pitch/12,2))*(1+waste/100)/(panel_width/12*panel_length))",
            "cost": "ceil(length*width*sqrt(1+pow(pitch/12,2))*(1+waste/100)/(panel_width/12*panel_length))*price",
            "length": "roof_area/(width*sqrt(1+pow(pitch/12,2)))",
            "width": "roof_area/(length*sqrt(1+pow(pitch/12,2)))",
            "panel_width": "length*width*sqrt(1+pow(pitch/12,2))*(1+waste/100)/panels*12/panel_length",
            "panel_length": "length*width*sqrt(1+pow(pitch/12,2))*(1+waste/100)/panels/(panel_width/12)",
            "waste": "(panels*(panel_width/12*panel_length)/roof_area-1)*100",
            "price": "cost/panels",
        },
        prose={
            "why": ("<p>A metal roof is priced from the roof area, and the roof area is always larger than the "
                    "plan: at a 6 in 12 pitch it is twelve per cent bigger, and at 12 in 12 it is forty-one per "
                    "cent bigger. Ordering panels from the footprint is how a roofing job comes up short.</p>"),
            "formula_note": ("<p>The pitch factor is the hypotenuse of a 12 in run and a rise equal to the "
                             "pitch, so a 6 in 12 roof gives √(1 + 0.25) = 1.118. The panel count then divides "
                             "the covered area by the cover width times the panel length, and rounds up.</p>"),
            "example_note": ("<p>A 40 by 24 roof at 6 in 12 has a pitch factor of {pitch_factor|unit} and a true "
                             "area of {roof_area|unit}. In 36 in by 12 ft panels that is {panels} panels and "
                             "{cost}.</p>"),
            "reading": ("<p>Read the pitch factor against the pitch: 3 in 12 gives 1.03, 6 in 12 gives 1.12, "
                        "12 in 12 gives 1.41. A factor of 1.0 means the pitch is being ignored.</p>"),
            "scenarios": [
                {"inputs": {"length": 30, "width": 20, "pitch": 4, "panel_width": 24, "panel_length": 10,
                            "waste": 12, "price": 60},
                 "note": "A low pitch in narrow panels: less waste on the slope, more panels."},
                {"inputs": {"length": 60, "width": 30, "pitch": 12, "panel_width": 36, "panel_length": 16,
                            "waste": 10, "price": 120},
                 "note": "A steep roof: the pitch factor alone adds forty per cent to the area."},
            ],
            "pitfalls": [
                "<strong>Footprint used as roof area.</strong> The pitch always adds.",
                "<strong>Cover width used as panel width.</strong> Laps are excluded from the cover.",
                "<strong>Ridge and trim left out.</strong> They are separate line items.",
            ],
            "units_note": ("<p>Roof dimensions in feet, pitch in inches of rise per 12 in of run, panel width "
                           "in inches, panel length in feet, area in square feet and cost in dollars.</p>"),
            "limits": [
                "<strong>A gable or a single slope.</strong> Hips and valleys waste more.",
                "<strong>Panels only.</strong> Fasteners, ridge, trim and underlay are extra.",
            ],
            "uses": [
                "<li>Pricing a metal roof.</li>",
                "<li>Checking a roofer's panel count.</li>",
                "<li>Comparing pitches by area.</li>",
            ],
        },
        faq=[
            ("How much bigger is a roof than its footprint?",
             "About twelve per cent at a 6 in 12 pitch, and forty-one per cent at 12 in 12."),
            ("How do I work out the pitch factor?",
             "The square root of one plus the pitch over twelve, squared."),
        ],
        no_round_trip=["waste", "panel_width", "panel_length"],
        related=[("/construction/roof-pitch", "Roof pitch"),
                 ("/construction/roofing", "Roofing"),
                 ("/construction/roof-shingle", "Roof shingle")],
    ),

    S(
        slug="diy-shed-cost",
        name="DIY shed cost",
        title="DIY Shed Cost Calculator: Floor, Walls and Roof",
        desc="Estimate a garden shed's floor, wall and roof areas from its size, then add the slab, wall and roofing prices into a single total cost.",
        what=("<p><strong>Floor = width × length</strong>, <strong>walls = perimeter × height</strong>, and "
              "<strong>roof = footprint × pitch factor</strong>, each priced per square foot.</p>"),
        fields=[
            F("width", "Shed width", "ft", 8, "Gable end"),
            F("length", "Shed length", "ft", 10, "Along the ridge"),
            F("wall_height", "Wall height", "ft", 7, "Floor to eave"),
            F("roof_rise", "Roof rise", "ft", 2, "Eave to ridge"),
            F("overhang", "Overhang", "ft", 1, "All round"),
            F("slab_price", "Slab price", "$/ft²", 8, "Foundation"),
            F("wall_price", "Wall price", "$/ft²", 12, "Frame and cladding"),
            F("roof_price", "Roof price", "$/ft²", 6, "Roofing"),
        ],
        results=[
            R("floor_area", "Floor area", "ft²"),
            R("wall_area", "Wall area", "ft²"),
            R("roof_area", "Roof area", "ft²"),
            R("total_cost", "Total cost", "$"),
        ],
        formula={
            "floor_area": "width*length",
            "wall_area": "2*(width+length)*wall_height",
            "roof_area": "(width+2*overhang)*(length+2*overhang)*sqrt(1+pow((roof_rise+overhang)/((width+2*overhang)/2),2))",
            "total_cost": "width*length*slab_price+2*(width+length)*wall_height*wall_price+(width+2*overhang)*(length+2*overhang)*sqrt(1+pow((roof_rise+overhang)/((width+2*overhang)/2),2))*roof_price",
            "width": "floor_area/length",
            "length": "floor_area/width",
            "wall_height": "wall_area/(2*(width+length))",
            "roof_rise": "sqrt(pow(roof_area/((width+2*overhang)*(length+2*overhang)),2)-1)*(width+2*overhang)/2-overhang",
            "slab_price": "(total_cost-2*(width+length)*wall_height*wall_price-(width+2*overhang)*(length+2*overhang)*sqrt(1+pow((roof_rise+overhang)/((width+2*overhang)/2),2))*roof_price)/floor_area",
            "wall_price": "(total_cost-width*length*slab_price-(width+2*overhang)*(length+2*overhang)*sqrt(1+pow((roof_rise+overhang)/((width+2*overhang)/2),2))*roof_price)/wall_area",
            "roof_price": "(total_cost-width*length*slab_price-2*(width+length)*wall_height*wall_price)/roof_area",
        },
        prose={
            "why": ("<p>A shed is three separate boxes of cost — a slab, a box of walls and a roof — and "
                    "each is priced by the square foot. Doing them separately is what stops the estimate "
                    "being one guessed number, and it makes the roof, which is usually the smallest area, "
                    "visible as the biggest surprise.</p>"),
            "formula_note": ("<p>The floor is the footprint; the walls are the perimeter times the height, "
                             "which ignores gable triangles and openings because they roughly cancel in a "
                             "shed. The roof is measured at its pitch, with the overhang added all round.</p>"),
            "example_note": ("<p>An 8 by 10 ft shed with 7 ft walls has {floor_area|unit} of floor, "
                             "{wall_area|unit} of wall and {roof_area|unit} of roof — {total_cost} at the "
                             "prices entered.</p>"),
            "reading": ("<p>Read the wall area against the floor: for a shed, the walls are usually two to "
                        "three times the floor. If they are close, the floor has been counted as walls.</p>"),
            "scenarios": [
                {"inputs": {"width": 12, "length": 16, "wall_height": 8, "roof_rise": 3, "overhang": 1.5,
                            "slab_price": 9, "wall_price": 14, "roof_price": 7},
                 "note": "A larger workshop: every area grows and the slab becomes a serious line."},
                {"inputs": {"width": 6, "length": 8, "wall_height": 6.5, "roof_rise": 1.5, "overhang": 0.5,
                            "slab_price": 6, "wall_price": 10, "roof_price": 5},
                 "note": "A small garden store: a cheap job where the slab is a dry-laid base."},
            ],
            "pitfalls": [
                "<strong>Roof measured as the floor.</strong> Pitch and overhang both add.",
                "<strong>Doors and windows ignored.</strong> They roughly cancel with the gables.",
                "<strong>Labour assumed included.</strong> The prices are materials unless you say so.",
            ],
            "units_note": ("<p>Dimensions in feet, areas in square feet and prices in dollars per square "
                           "foot.</p>"),
            "limits": [
                "<strong>A simple gable shed.</strong> Lean-tos and gambrels differ.",
                "<strong>A parametric estimate.</strong> It is not a quote.",
            ],
            "uses": [
                "<li>Budgeting a garden shed.</li>",
                "<li>Comparing a kit with a build.</li>",
                "<li>Splitting a cost into trades.</li>",
            ],
        },
        faq=[
            ("How much does it cost to build an 8 by 10 shed?",
             "About 1 700 to 2 500 dollars in materials at typical prices, depending on the cladding."),
            ("Is it cheaper to build a shed or buy a kit?",
             "A kit is usually cheaper for a standard size and quicker to assemble."),
        ],
        no_round_trip=["overhang"],
        related=[("/construction/framing", "Framing"),
                 ("/construction/square-footage", "Square footage"),
                 ("/construction/hoop-house", "Hoop house")],
    ),

    S(
        slug="insulation",
        name="Insulation",
        title="Insulation Calculator: R-Value and Bags",
        desc="Work out the R-value of an insulation layer from its thickness and material, and the number of bags needed to cover an attic at that depth.",
        what=("<p><strong>R = thickness ÷ conductivity</strong>, or thickness times the R per inch of the "
              "material; <strong>bags = ceiling(area × depth ÷ coverage per bag)</strong>.</p>"),
        fields=[
            F("area", "Area to insulate", "ft²", 1200, "Attic floor or wall"),
            F("thickness", "Thickness", "in", 12, "Installed depth"),
            F("r_per_inch", "R per inch", "", 3.7, "3.7 blown fibre, 3.1 mineral wool"),
            F("bag_coverage", "Coverage per bag", "ft³", 40, "Cubic feet in the bag"),
            F("price", "Price per bag", "$", 18, "Delivered"),
        ],
        results=[
            R("r_value", "R-value", ""),
            R("volume_ft3", "Volume", "ft³"),
            R("bags", "Bags", ""),
            R("cost", "Cost", "$"),
        ],
        formula={
            "r_value": "thickness*r_per_inch",
            "volume_ft3": "area*thickness/12",
            "bags": "ceil(area*thickness/12/bag_coverage)",
            "cost": "ceil(area*thickness/12/bag_coverage)*price",
            "area": "volume_ft3*12/thickness",
            "thickness": "r_value/r_per_inch",
            "r_per_inch": "r_value/thickness",
            "bag_coverage": "volume_ft3/bags",
            "price": "cost/bags",
        },
        prose={
            "why": ("<p>Insulation is sold by the bag and judged by the R-value, and the two are linked by "
                    "the depth it is blown or laid to: a bag that covers a certain volume only gives its "
                    "stated R-value at the depth it was designed for. Compressing it to fit takes the R-value "
                    "away.</p>"),
            "formula_note": ("<p>R per inch is a property of the material — about 3.7 for blown cellulose, "
                             "3.1 for mineral wool, 3.6 for fibreglass batts — so the R-value is simply "
                             "thickness times that figure. The bag coverage is the volume of insulation in "
                             "the bag, which is why the area times the depth has to be divided by it.</p>"),
            "example_note": ("<p>Twelve inches of blown fibre at 3.7 per inch is {r_value|unit} — the sort of "
                             "figure a cold climate asks for. A thousand two hundred square feet at that depth "
                             "is {volume_ft3|unit}, which is {bags} bags and {cost}.</p>"),
            "reading": ("<p>Read the R-value against the thickness: ten inches of mineral wool is R-31, twelve "
                        "inches of blown cellulose R-44. A figure much lower means the R per inch was entered "
                        "as a total R.</p>"),
            "scenarios": [
                {"inputs": {"area": 900, "thickness": 16, "r_per_inch": 3.7, "bag_coverage": 40,
                            "price": 20},
                 "note": "A deep attic blanket: the R-value climbs into the fifties."},
                {"inputs": {"area": 400, "thickness": 4, "r_per_inch": 3.1, "bag_coverage": 30,
                            "price": 15},
                 "note": "A stud wall in mineral wool: a modest R-value over a small area."},
            ],
            "pitfalls": [
                "<strong>Total R entered as R per inch.</strong> The figure then multiplies by the depth.",
                "<strong>Compressed to fit.</strong> Squashing batts lowers the R-value.",
                "<strong>Coverage in square feet used as volume.</strong> The bag is sold by volume.",
            ],
            "units_note": ("<p>Area in square feet, thickness in inches, bag coverage in cubic feet, volume in "
                           "cubic feet and cost in dollars per bag.</p>"),
            "limits": [
                "<strong>A single layer.</strong> Mixed materials add their R-values separately.",
                "<strong>No thermal bridging.</strong> Studs and joists bypass the insulation.",
            ],
            "uses": [
                "<li>Sizing an attic top-up.</li>",
                "<li>Checking a bag count.</li>",
                "<li>Comparing materials by R-value.</li>",
            ],
        },
        faq=[
            ("How many inches of insulation for R-49?",
             "About thirteen inches of blown cellulose at 3.7 per inch."),
            ("Does compressing insulation lower its R-value?",
             "Yes — the R-value depends on the installed thickness, not the bag's nominal depth."),
        ],
        no_round_trip=["bag_coverage"],
        related=[("/construction/heat-loss", "Heat loss"),
                 ("/construction/drywall", "Drywall"),
                 ("/construction/framing", "Framing")],
    ),

    S(
        slug="gallons-per-square-foot",
        name="Gallons per square foot",
        title="Gallons per Square Foot Calculator: Volume",
        desc="Work out the gallons a tray, a tank or a flooded floor holds from its area and depth, with gallons per square foot and the litres beside them.",
        what=("<p><strong>Volume = area × depth</strong>, and <strong>gallons per square foot = depth × "
              "7.48</strong> because a cubic foot holds 7.48 US gallons.</p>"),
        fields=[
            F("length", "Length", "ft", 10, "One side"),
            F("width", "Width", "ft", 8, "The other"),
            F("depth", "Depth", "in", 6, "Water or liquid depth"),
        ],
        results=[
            R("area_ft2", "Area", "ft²"),
            R("volume_ft3", "Volume", "ft³"),
            R("gallons", "Volume", "gal"),
            R("gallons_per_ft2", "Gallons per ft²", "gal/ft²"),
        ],
        formula={
            "area_ft2": "length*width",
            "volume_ft3": "length*width*depth/12",
            "gallons": "length*width*depth/12*7.48052",
            "gallons_per_ft2": "depth/12*7.48052",
            "length": "area_ft2/width",
            "width": "area_ft2/length",
            "depth": "12*gallons_per_ft2/7.48052",
        },
        prose={
            "why": ("<p>The gallons per square foot figure is the one worth remembering: an inch of water "
                    "over a square foot is 0.623 gallons, so a foot of it is 7.48. That single number turns "
                    "a flooded floor or a shallow tray into a volume without any further arithmetic.</p>"),
            "formula_note": ("<p>Depth in inches divided by twelve gives feet, and 7.48 converts the cubic "
                             "foot to US gallons. The per-square-foot figure is the same calculation with the "
                             "area left out, so it depends only on the depth.</p>"),
            "example_note": ("<p>A floor 10 by 8 ft flooded six inches deep holds {volume_ft3|unit} of water — "
                             "{gallons} US gallons, or {gallons_per_ft2|unit}. An inch of water would be only "
                             "an eighth of that.</p>"),
            "reading": ("<p>Read the per-square-foot figure against the depth: 0.62 gallons for every inch. If "
                        "a result is near 7.5, the depth is being read in feet rather than inches.</p>"),
            "scenarios": [
                {"inputs": {"length": 20, "width": 20, "depth": 1},
                 "note": "A large shallow tray: an inch over four hundred square feet is still 250 gallons."},
                {"inputs": {"length": 4, "width": 2, "depth": 24},
                 "note": "A deep bin: the depth matters more than the area at this size."},
            ],
            "pitfalls": [
                "<strong>Depth in feet.</strong> The box is in inches and divides by twelve.",
                "<strong>Imperial gallons.</strong> A UK gallon is 4.55 litres, not 3.79, so an imperial "
                "figure is a fifth larger than the same volume in US gallons.",
                "<strong>Displacement ignored.</strong> Whatever sits in the volume takes up some of it.",
            ],
            "units_note": ("<p>Length and width in feet, depth in inches, area in square feet, volume in cubic "
                           "feet and US gallons, and the per-square-foot figure in gallons per square foot.</p>"),
            "limits": [
                "<strong>A level surface.</strong> A sloping floor holds less.",
                "<strong>Water only by weight.</strong> Other liquids have their own density.",
            ],
            "uses": [
                "<li>Estimating flood water.</li>",
                "<li>Sizing a tray or a shallow tank.</li>",
                "<li>Working out a dose per square foot.</li>",
            ],
        },
        faq=[
            ("How many gallons per square foot per inch of depth?",
             "About 0.623 US gallons."),
            ("How many gallons in a cubic foot?",
             "7.48 US gallons."),
        ],
        related=[("/construction/tank-volume", "Tank volume"),
                 ("/construction/pipe-volume", "Pipe volume"),
                 ("/construction/square-footage", "Square footage")],
    ),
]
