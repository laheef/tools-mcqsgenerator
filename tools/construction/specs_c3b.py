"""Batch 3b — steel, plate, metal and glass weights."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="steel-weight",
        name="Steel weight",
        title="Steel Weight Calculator: Round and Square Bar",
        desc="Work out the weight of a round or square steel bar from its size and length, in pounds and kilograms, at 490 pounds to the cubic foot.",
        what=("<p>A bar is its section times its length: <strong>weight = size² × factor × length × 12 × "
              "0.2836</strong>, with a factor of 0.785 for round stock and 1.000 for square.</p>"),
        fields=[
            F("size", "Size", "in", 1, "Diameter or side"),
            F("factor", "Section factor", "", 0.785, "0.785 round, 1.000 square"),
            F("length", "Length", "ft", 20, "One bar"),
            F("count", "Bars", "", 1, "Same size"),
        ],
        results=[
            R("area_in2", "Section area", "in²"),
            R("weight_each", "Weight each", "lb"),
            R("weight_total", "Total weight", "lb"),
            R("weight_kg", "Total weight", "kg"),
        ],
        formula={
            "area_in2": "size*size*factor",
            "weight_each": "size*size*factor*length*12*0.2836",
            "weight_total": "size*size*factor*length*12*0.2836*count",
            "weight_kg": "size*size*factor*length*12*0.2836*count/2.20462",
            "size": "sqrt(area_in2/factor)",
            "factor": "area_in2/(size*size)",
            "length": "weight_each/(area_in2*12*0.2836)",
            "count": "weight_total/weight_each",
        },
        prose={
            "why": ("<p>Steel is bought by weight and worked by length, and the two only meet through the "
                    "section. A bar's weight per foot is the number a fabricator knows off the book; this "
                    "calculator derives it from first principles so any size can be checked.</p>"),
            "formula_note": ("<p>Steel is 490 lb/ft³, which is 0.2836 lb per cubic inch — the constant that "
                             "does all the work here. The section factor carries the shape, 0.785 for a "
                             "round bar and 1.000 for square stock, and the length in feet goes in as "
                             "inches.</p>"),
            "example_note": ("<p>A 1 in round bar 20 ft long has a section of {area_in2|unit} and weighs "
                             "{weight_each} lb — {weight_total} lb for the bar, or {weight_kg} kg. The same "
                             "size in square stock is heavier, because the square encloses more of the "
                             "circle.</p>"),
            "reading": ("<p>Read the weight each against a stock table: 1 in round bar is 2.67 lb/ft, so a "
                        "20 ft bar is about 53 lb. A result far from the book is usually a diameter entered "
                        "as a radius.</p>"),
            "scenarios": [
                {"inputs": {"size": 1.5, "factor": 1.0, "length": 10, "count": 4},
                 "note": "Four short square bars: the count carries the total."},
                {"inputs": {"size": 0.5, "factor": 0.785, "length": 20, "count": 10},
                 "note": "A bundle of small round bar, where the per-bar weight is under a pound a foot."},
            ],
            "pitfalls": [
                "<strong>Diameter entered as radius.</strong> The volume comes out four times too small.",
                "<strong>Hollow sections.</strong> This assumes solid bar.",
                "<strong>Length in inches.</strong> It is feet, multiplied by twelve internally.",
            ],
            "units_note": ("<p>Size in inches, length in feet, section in square inches, weight in pounds and "
                           "kilograms, with the section factor as a plain number.</p>"),
            "limits": [
                "<strong>Solid sections only.</strong> Tube and angle need their own area.",
                "<strong>Plain carbon steel.</strong> Stainless is about three per cent heavier.",
            ],
            "uses": [
                "<li>Checking a delivery weight.</li>",
                "<li>Sizing a lifting sling.</li>",
                "<li>Estimating freight.</li>",
            ],
        },
        faq=[
            ("How much does 1 inch round bar weigh per foot?",
             "About 2.67 lb/ft at 490 lb/ft³."),
            ("How do I work out steel weight?",
             "Volume in cubic inches times 0.2836 gives pounds."),
        ],
        related=[("/construction/steel-plate-weight", "Steel plate weight"),
                 ("/construction/metal-weight", "Metal weight"),
                 ("/construction/pipe-weight", "Pipe weight")],
    ),

    S(
        slug="steel-plate-weight",
        name="Steel plate weight",
        title="Steel Plate Weight Calculator by Thickness",
        desc="Work out what a steel plate weighs from its length, width and thickness, in pounds, kilograms and pounds per square foot.",
        what=("<p><strong>Weight = length × width × thickness × 0.2836</strong>, with every dimension in "
              "inches; the constant is the weight of a cubic inch of steel.</p>"),
        fields=[
            F("length", "Length", "in", 48, "Plate length"),
            F("width", "Width", "in", 24, "Plate width"),
            F("thickness", "Thickness", "in", 0.25, "Gauge thickness in inches"),
            F("count", "Plates", "", 1, "Same size"),
        ],
        results=[
            R("area_ft2", "Area each", "ft²"),
            R("weight_each", "Weight each", "lb"),
            R("weight_total", "Total weight", "lb"),
            R("psf", "Weight per ft²", "lb/ft²"),
        ],
        formula={
            "area_ft2": "length*width/144",
            "weight_each": "length*width*thickness*0.2836",
            "weight_total": "length*width*thickness*0.2836*count",
            "psf": "thickness*12*12*0.2836",
            "length": "weight_each/(width*thickness*0.2836)",
            "width": "weight_each/(length*thickness*0.2836)",
            "thickness": "weight_each/(length*width*0.2836)",
            "count": "weight_total/weight_each",
        },
        prose={
            "why": ("<p>Plate is priced by the pound and fabricated by the sheet, and the weight decides "
                    "everything from the shear table to the tail-lift. The per-square-foot figure is the one "
                    "to carry: it depends only on the thickness, so it works for any plate size.</p>"),
            "formula_note": ("<p>A square foot of steel one inch thick weighs 40.8 lb, so a quarter-inch "
                             "plate is 10.2 lb/ft². The total weight is that figure times the area times the "
                             "number of plates.</p>"),
            "example_note": ("<p>A plate 48 by 24 in at a quarter inch is {area_ft2|unit} of steel weighing "
                             "{weight_each} lb — {psf} lb per square foot. A half-inch plate of the same size "
                             "doubles that, and both are still liftable by two people.</p>"),
            "reading": ("<p>Read the per-square-foot figure against the thickness: 40.8 lb for every inch. "
                        "Three-sixteenths plate comes out at 7.65 lb/ft², which is a useful sanity figure for "
                        "a trailer deck or a patch panel.</p>"),
            "scenarios": [
                {"inputs": {"length": 96, "width": 48, "thickness": 0.5, "count": 2},
                 "note": "Two half-inch plates at 8 by 4: a forklift job, not a two-person one."},
                {"inputs": {"length": 12, "width": 12, "thickness": 0.125, "count": 20},
                 "note": "Twenty small gauge plates, cut from one sheet."},
            ],
            "pitfalls": [
                "<strong>Gauge number used as thickness.</strong> Gauge is a table, not a decimal.",
                "<strong>Millimetres typed as inches.</strong> The weight comes out about twenty-five times "
                "too high.",
                "<strong>Cut-outs ignored.</strong> Heavy holes change the lift.",
            ],
            "units_note": ("<p>Length, width and thickness in inches, area in square feet, weight in pounds "
                           "with a per-square-foot figure.</p>"),
            "limits": [
                "<strong>Rectangular plates.</strong> Shapes need an area, not a rectangle.",
                "<strong>Plain carbon steel.</strong> Stainless is about 3 per cent heavier.",
            ],
            "uses": [
                "<li>Checking a lift or a tail-lift limit.</li>",
                "<li>Estimating a shear order.</li>",
                "<li>Comparing plate thicknesses.</li>",
            ],
        },
        faq=[
            ("How much does 1/4 inch steel plate weigh per square foot?",
             "About 10.2 lb/ft²."),
            ("How much does a 4 by 8 sheet of half-inch plate weigh?",
             "About 653 lb, which is why it arrives on a truck with a crane."),
        ],
        related=[("/construction/plate-weight", "Plate weight"),
                 ("/construction/steel-weight", "Steel weight"),
                 ("/construction/metal-weight", "Metal weight")],
    ),

    S(
        slug="plate-weight",
        name="Plate weight",
        title="Plate Weight Calculator for Any Metal Sheet",
        desc="Work out the weight of a metal plate from its dimensions, thickness and the density of the metal, in pounds and kilograms, for steel, aluminium or copper.",
        what=("<p><strong>Weight = length × width × thickness × density</strong>, with the density given per "
              "cubic inch so steel, aluminium and copper all fit the same formula.</p>"),
        fields=[
            F("length", "Length", "in", 48, "Plate length"),
            F("width", "Width", "in", 24, "Plate width"),
            F("thickness", "Thickness", "in", 0.25, "Plate thickness"),
            F("density", "Density", "lb/in³", 0.2836, "0.2836 steel, 0.0975 aluminium"),
        ],
        results=[
            R("volume_in3", "Volume", "in³"),
            R("weight_lb", "Weight", "lb"),
            R("weight_kg", "Weight", "kg"),
            R("psf", "Weight per ft²", "lb/ft²"),
        ],
        formula={
            "volume_in3": "length*width*thickness",
            "weight_lb": "length*width*thickness*density",
            "weight_kg": "length*width*thickness*density/2.20462",
            "psf": "thickness*144*density",
            "length": "weight_lb/(width*thickness*density)",
            "width": "weight_lb/(length*thickness*density)",
            "thickness": "weight_lb/(length*width*density)",
            "density": "weight_lb/volume_in3",
        },
        prose={
            "why": ("<p>Any plate — steel, aluminium, brass, copper — is the same arithmetic with one number "
                    "changed. Working from the density per cubic inch keeps the units consistent and lets a "
                    "mixed order be priced sheet by sheet.</p>"),
            "formula_note": ("<p>The density is per cubic inch rather than per cubic foot so nothing has to be "
                             "converted twice. Steel is 0.2836, aluminium 0.0975, copper 0.323, brass 0.306 "
                             "and lead 0.410.</p>"),
            "example_note": ("<p>A 48 by 24 in plate at a quarter inch is {volume_in3|unit} of metal, so "
                             "{weight_lb} lb in steel or a third of that in aluminium. The per-square-foot "
                             "weight is {psf|unit}, which is what a deck or a panel is really judged on.</p>"),
            "reading": ("<p>Read the per-square-foot weight against the metal: a quarter inch of steel is "
                        "10.2 lb/ft², the same thickness of aluminium 3.5. A panel that is too heavy to lift "
                        "is a panel to roll or to reduce.</p>"),
            "scenarios": [
                {"inputs": {"length": 48, "width": 24, "thickness": 0.125, "density": 0.0975},
                 "note": "An aluminium tread plate cover — a quarter of the weight of steel."},
                {"inputs": {"length": 36, "width": 12, "thickness": 0.5, "density": 0.323},
                 "note": "A heavy copper busbar plate, where density matters more than size."},
            ],
            "pitfalls": [
                "<strong>Density per cubic foot used here.</strong> The box wants per cubic inch.",
                "<strong>Gauge numbers mistaken for inches.</strong> Convert through the gauge table.",
                "<strong>Coating weight added.</strong> Galvanising adds a little, paint almost nothing.",
            ],
            "units_note": ("<p>Dimensions in inches, volume in cubic inches, density in pounds per cubic inch, "
                           "weight in pounds and kilograms.</p>"),
            "limits": [
                "<strong>Rectangular.</strong> Cut shapes need their own area.",
                "<strong>A single alloy.</strong> Density varies slightly by grade.",
            ],
            "uses": [
                "<li>Comparing metals by weight.</li>",
                "<li>Estimating a fabrication order.</li>",
                "<li>Checking a panel can be lifted.</li>",
            ],
        },
        faq=[
            ("How do I weigh a plate of any metal?",
             "Multiply the three dimensions in inches, then by the density in lb/in³."),
            ("What is the density of aluminium?",
             "About 0.0975 lb/in³, or 169 lb/ft³."),
        ],
        related=[("/construction/steel-plate-weight", "Steel plate weight"),
                 ("/construction/aluminum-weight", "Aluminium weight"),
                 ("/construction/metal-weight", "Metal weight")],
    ),

    S(
        slug="metal-weight",
        name="Metal weight",
        title="Metal Weight Calculator: Round, Square and Hex",
        desc="Work out a metal bar's weight from its section, size and length, for round, square or hexagonal stock in steel, aluminium or brass.",
        what=("<p>Section area times length times density, with the section as <strong>size² × factor</strong>: "
              "0.785 for round, 1.000 for square, 0.866 for hexagon across the flats.</p>"),
        fields=[
            F("size", "Size", "in", 2, "Diameter, or across flats"),
            F("factor", "Section factor", "", 0.785, "0.785 round, 1.000 square, 0.866 hex"),
            F("length", "Length", "in", 12, "Length of the piece"),
            F("density", "Density", "lb/in³", 0.2836, "0.2836 steel, 0.0975 aluminium"),
        ],
        results=[
            R("area_in2", "Section area", "in²"),
            R("volume_in3", "Volume", "in³"),
            R("weight_lb", "Weight", "lb"),
            R("weight_kg", "Weight", "kg"),
        ],
        formula={
            "area_in2": "size*size*factor",
            "volume_in3": "size*size*factor*length",
            "weight_lb": "size*size*factor*length*density",
            "weight_kg": "size*size*factor*length*density/2.20462",
            "size": "sqrt(area_in2/factor)",
            "factor": "area_in2/(size*size)",
            "length": "volume_in3/area_in2",
            "density": "weight_lb/volume_in3",
        },
        prose={
            "why": ("<p>Stock comes in three sections and one job: working out the weight before it is cut. "
                    "The hexagonal section is the one people look up rather than derive, and 0.866 times the "
                    "square of the across-flats size is the whole of it.</p>"),
            "formula_note": ("<p>For a hexagon, the area is 0.866 times the square of the distance across "
                             "the flats — not across the corners. The volume in cubic inches times the "
                             "density gives pounds, and kilograms follow at 2.20462 to the pound.</p>"),
            "example_note": ("<p>A 2 in round bar a foot long is {area_in2|unit} of section — {volume_in3|unit} "
                             "of steel weighing {weight_lb} lb, or {weight_kg} kg. In aluminium at 0.0975 the "
                             "same bar weighs just over a third.</p>"),
            "reading": ("<p>Read the section area first: round and square of the same nominal size differ by "
                        "27 per cent, and the hexagon sits between. A weight that disagrees with a stock "
                        "table is nearly always the across-corners dimension entered for across-flats.</p>"),
            "scenarios": [
                {"inputs": {"size": 1.5, "factor": 0.866, "length": 6, "density": 0.2836},
                 "note": "A short hex nut blank: the section area is 0.866 of the square."},
                {"inputs": {"size": 2, "factor": 1.0, "length": 24, "density": 0.0975},
                 "note": "An aluminium square bar — long, but light enough to handle."},
            ],
            "pitfalls": [
                "<strong>Across corners used for a hex.</strong> That is the circumscribed circle, not the "
                "flats.",
                "<strong>Mixed units.</strong> Inches for the section, and inches again for the length.",
                "<strong>Tubing entered as solid.</strong> Hollow sections weigh a fraction.",
            ],
            "units_note": ("<p>Size and length in inches, section in square inches, volume in cubic inches, "
                           "density per cubic inch, weight in pounds and kilograms.</p>"),
            "limits": [
                "<strong>Solid stock.</strong> Tubes, angles and channels need their own areas.",
                "<strong>One alloy.</strong> Density varies by a few per cent.",
            ],
            "uses": [
                "<li>Weighing stock before cutting.</li>",
                "<li>Estimating a scrap value.</li>",
                "<li>Balancing a fabrication.</li>",
            ],
        },
        faq=[
            ("How do I work out the weight of hex bar?",
             "0.866 times the across-flats size squared, times the length, times the density."),
            ("What is the difference between round and square bar weight?",
             "Square is 27 per cent heavier at the same nominal size, because it encloses more area."),
        ],
        related=[("/construction/steel-weight", "Steel weight"),
                 ("/construction/aluminum-weight", "Aluminium weight"),
                 ("/construction/plate-weight", "Plate weight")],
    ),

    S(
        slug="aluminum-weight",
        name="Aluminium weight",
        title="Aluminium Weight Calculator: Bar and Sheet",
        desc="Work out what an aluminium bar or sheet weighs from its dimensions, in pounds and kilograms, at 169 pounds to the cubic foot.",
        what=("<p><strong>Weight = length × width × thickness × 0.0975</strong>, with the dimensions in inches "
              "and 0.0975 the weight of a cubic inch of aluminium.</p>"),
        fields=[
            F("length", "Length", "in", 48, "Longest dimension"),
            F("width", "Width", "in", 24, "Second dimension"),
            F("thickness", "Thickness", "in", 0.125, "Thickness or diameter"),
            F("count", "Pieces", "", 1, "Same size"),
        ],
        results=[
            R("volume_in3", "Volume each", "in³"),
            R("weight_each", "Weight each", "lb"),
            R("weight_total", "Total weight", "lb"),
            R("weight_kg", "Total weight", "kg"),
        ],
        formula={
            "volume_in3": "length*width*thickness",
            "weight_each": "length*width*thickness*0.0975",
            "weight_total": "length*width*thickness*0.0975*count",
            "weight_kg": "length*width*thickness*0.0975*count/2.20462",
            "length": "weight_each/(width*thickness*0.0975)",
            "width": "weight_each/(length*thickness*0.0975)",
            "thickness": "weight_each/(length*width*0.0975)",
            "count": "weight_total/weight_each",
        },
        prose={
            "why": ("<p>Aluminium is chosen for its weight, so getting the weight right is the whole point of "
                    "choosing it. At about a third of steel by volume, a panel that is impossible in steel is "
                    "carryable in aluminium, and the arithmetic is one density away.</p>"),
            "formula_note": ("<p>Aluminium is 169 lb/ft³, which is 0.0975 lb per cubic inch. Alloys run from "
                             "about 0.095 to 0.101, so the difference across the range is under six per "
                             "cent.</p>"),
            "example_note": ("<p>A quarter-inch sheet 48 by 24 in is {volume_in3|unit} — {weight_each} lb in "
                             "aluminium, or {weight_kg} kg — against about three times that in steel.</p>"),
            "reading": ("<p>Read the per-square-foot figure in your head: an eighth of an inch of aluminium is "
                        "1.76 lb/ft². If a result is near ten times that, a gauge number has been entered as "
                        "a thickness.</p>"),
            "scenarios": [
                {"inputs": {"length": 96, "width": 48, "thickness": 0.25, "count": 4},
                 "note": "Four sheets at 8 by 4 — the sort of order that arrives on a pallet."},
                {"inputs": {"length": 36, "width": 2, "thickness": 2, "count": 6},
                 "note": "Six short square bars, where the count matters more than the unit weight."},
            ],
            "pitfalls": [
                "<strong>Density typed as 169.</strong> That is per cubic foot, not per cubic inch.",
                "<strong>Extrusion entered as flat.</strong> A box extrusion has voids.",
                "<strong>Millimetres used throughout.</strong> The result is out by 16 000 times.",
            ],
            "units_note": ("<p>Dimensions in inches, volume in cubic inches, weight in pounds and kilograms.</p>"),
            "limits": [
                "<strong>Solid rectangular stock.</strong> Tubes and extrusions need their own area.",
                "<strong>Alloy grade ignored.</strong> The spread across grades is small.",
            ],
            "uses": [
                "<li>Checking a sheet can be lifted.</li>",
                "<li>Comparing aluminium with steel.</li>",
                "<li>Estimating freight.</li>",
            ],
        },
        faq=[
            ("How much does aluminium weigh per square foot?",
             "About 14.1 lb per square foot per inch of thickness."),
            ("How much lighter is aluminium than steel?",
             "About 34 per cent of steel's weight for the same volume."),
        ],
        related=[("/construction/metal-weight", "Metal weight"),
                 ("/construction/plate-weight", "Plate weight"),
                 ("/construction/steel-weight", "Steel weight")],
    ),

    S(
        slug="glass-weight",
        name="Glass weight",
        title="Glass Weight Calculator by Thickness and Size",
        desc="Work out how much a pane of glass weighs from its width, height and thickness, in pounds and kilograms, at 160 pounds to the cubic foot.",
        what=("<p><strong>Weight = width × height × thickness × 0.092</strong>, with all three dimensions in "
              "inches and 0.092 the weight of a cubic inch of glass.</p>"),
        fields=[
            F("width", "Width", "in", 36, "Pane width"),
            F("height", "Height", "in", 48, "Pane height"),
            F("thickness", "Thickness", "in", 0.25, "6 mm is about 0.236 in"),
            F("count", "Panes", "", 1, "Same size"),
        ],
        results=[
            R("area_ft2", "Area each", "ft²"),
            R("weight_each", "Weight each", "lb"),
            R("weight_total", "Total weight", "lb"),
            R("psf", "Weight per ft²", "lb/ft²"),
        ],
        formula={
            "area_ft2": "width*height/144",
            "weight_each": "width*height*thickness*0.092",
            "weight_total": "width*height*thickness*0.092*count",
            "psf": "thickness*144*0.092",
            "width": "weight_each/(height*thickness*0.092)",
            "height": "weight_each/(width*thickness*0.092)",
            "thickness": "weight_each/(width*height*0.092)",
            "count": "weight_total/weight_each",
        },
        prose={
            "why": ("<p>Glass is heavier than most people expect: a square metre of 6 mm glass weighs 15 kg, "
                    "and a large double-glazed unit is a two-person lift with suction cups. The weight decides "
                    "the glazing bar, the hinge and how many people turn up.</p>"),
            "formula_note": ("<p>Glass is about 160 lb/ft³, which is 0.092 lb per cubic inch — a little under "
                             "a third of steel. Double glazing adds a second pane and a spacer, so roughly "
                             "double the figure for the glass alone.</p>"),
            "example_note": ("<p>A pane 36 by 48 in at a quarter inch is {area_ft2|unit} weighing {weight_each} "
                             "lb — {psf} lb per square foot. In 6 mm glass the figure is close, because 6 mm "
                             "is 0.236 in and the density is similar.</p>"),
            "reading": ("<p>Read the per-square-foot weight against the thickness: 2.5 lb/ft² for every eighth "
                        "of an inch. A full sheet of quarter-inch glass is about 3.3 lb/ft², which is the "
                        "number to quote when someone plans to carry a 4 by 8 pane alone.</p>"),
            "scenarios": [
                {"inputs": {"width": 24, "height": 36, "thickness": 0.375, "count": 2},
                 "note": "Two thick panes for a shower screen: short and wide, but heavy."},
                {"inputs": {"width": 96, "height": 48, "thickness": 0.5, "count": 1},
                 "note": "A shopfront pane — a crane item, not a lifting item."},
            ],
            "pitfalls": [
                "<strong>Nominal glass thickness.</strong> 6 mm is 0.236 in, not a quarter.",
                "<strong>Double glazing counted once.</strong> Each pane weighs its own.",
                "<strong>Frame weight left out.</strong> Add it for the whole unit.",
            ],
            "units_note": ("<p>Dimensions in inches, area in square feet, weight in pounds with a "
                           "per-square-foot figure.</p>"),
            "limits": [
                "<strong>Flat glass only.</strong> Laminated and coated glass differs a little.",
                "<strong>Glass weight only.</strong> Frames, seals and spacers are extra.",
            ],
            "uses": [
                "<li>Sizing a lifting crew.</li>",
                "<li>Checking a glazing bar or hinge rating.</li>",
                "<li>Estimating freight.</li>",
            ],
        },
        faq=[
            ("How much does 6 mm glass weigh per square metre?",
             "About 15 kg, or 3.1 lb per square foot."),
            ("How much does a 36 by 48 quarter-inch pane weigh?",
             "About 40 lb."),
        ],
        related=[("/construction/plate-weight", "Plate weight"),
                 ("/construction/metal-weight", "Metal weight"),
                 ("/construction/steel-weight", "Steel weight")],
    ),

    S(
        slug="log-weight",
        name="Log weight",
        title="Log Weight Calculator by Diameter and Length",
        desc="Estimate a log's weight in pounds and tonnes from its small-end diameter, length and a form factor, at the density of the species you are burning.",
        what=("<p><strong>Volume = π/4 × (diameter ÷ 12)² × length × form factor</strong>, then volume times "
              "density. The form factor allows for the taper.</p>"),
        fields=[
            F("diameter", "Small-end diameter", "in", 12, "Inside the bark"),
            F("length", "Log length", "ft", 8, "End to end"),
            F("form_factor", "Form factor", "", 0.7, "0.6 to 0.8 for a tapered log"),
            F("density", "Density", "lb/ft³", 40, "40 green oak, 30 pine, 25 dry"),
        ],
        results=[
            R("volume_ft3", "Volume", "ft³"),
            R("weight_lb", "Weight", "lb"),
            R("weight_kg", "Weight", "kg"),
            R("tons", "Weight", "short tons"),
        ],
        formula={
            "volume_ft3": "pi/4*pow(diameter/12,2)*length*form_factor",
            "weight_lb": "pi/4*pow(diameter/12,2)*length*form_factor*density",
            "weight_kg": "pi/4*pow(diameter/12,2)*length*form_factor*density/2.20462",
            "tons": "pi/4*pow(diameter/12,2)*length*form_factor*density/2000",
            "diameter": "12*sqrt(volume_ft3/(pi/4*length*form_factor))",
            "length": "volume_ft3/(pi/4*pow(diameter/12,2)*form_factor)",
            "form_factor": "volume_ft3/(pi/4*pow(diameter/12,2)*length)",
        },
        prose={
            "why": ("<p>The weight of a log decides whether it goes in a trailer, a pickup or a skid steer. "
                    "Timber is bought by volume and weighed by the ton, and the gap between green and dry "
                    "wood is bigger than the gap between most species.</p>"),
            "formula_note": ("<p>The small-end diameter is measured inside the bark, and the form factor of "
                             "about 0.7 accounts for the cone-shape taper — a true cylinder would overstate "
                             "the volume by a third. Green hardwood is about 40 to 55 lb/ft³; seasoned wood "
                             "drops to the high twenties.</p>"),
            "example_note": ("<p>A 12 in log 8 ft long at a form factor of 0.7 holds {volume_ft3|unit}, and at "
                             "40 lb/ft³ that is {weight_lb} lb — {weight_kg} kg, or {tons} short tons. Dry "
                             "firewood of the same size would weigh about two thirds as much.</p>"),
            "reading": ("<p>Read the tonnage against the vehicle: a half-ton pickup takes about half a cord "
                        "of dry hardwood, which is around a ton. If the weight says two tons, the trailer "
                        "suspension and the brakes need to agree.</p>"),
            "scenarios": [
                {"inputs": {"diameter": 18, "length": 10, "form_factor": 0.75, "density": 50},
                 "note": "A green hardwood saw log: the density is the season's biggest uncertainty."},
                {"inputs": {"diameter": 8, "length": 4, "form_factor": 0.65, "density": 30},
                 "note": "A short, small bolt of seasoned softwood — carryable, just."},
            ],
            "pitfalls": [
                "<strong>Large-end diameter measured.</strong> The small end sets the volume.",
                "<strong>Bark counted.</strong> It is lighter and burns badly.",
                "<strong>Green density used for seasoned wood.</strong> The weight is overstated by a "
                "third.",
            ],
            "units_note": ("<p>Diameter in inches, length in feet, volume in cubic feet, density in pounds per "
                           "cubic foot, weight in pounds, kilograms and short tons.</p>"),
            "limits": [
                "<strong>A tapered cylinder.</strong> Crooked and forked logs need a volume table.",
                "<strong>Density is species and moisture.</strong> It is the biggest single source of "
                "error.",
            ],
            "uses": [
                "<li>Loading a trailer within its rating.</li>",
                "<li>Estimating firewood weight.</li>",
                "<li>Pricing timber by weight.</li>",
            ],
        },
        faq=[
            ("How much does a 12 inch log weigh?",
             "An 8 ft green hardwood log is about 175 lb at 40 lb/ft³ and a 0.7 form factor."),
            ("Why is green wood heavier than dry?",
             "It contains water: up to half its weight when freshly felled."),
        ],
        related=[("/construction/lumber-weight", "Lumber weight"),
                 ("/construction/lumber", "Lumber"),
                 ("/construction/board-foot", "Board foot")],
    ),

    S(
        slug="pipe-weight",
        name="Pipe weight",
        title="Pipe Weight Calculator per Foot and per Length",
        desc="Work out a pipe's weight per foot and per length from its outside diameter and wall thickness, in pounds and kilograms, for steel pipe of any size.",
        what=("<p><strong>Weight per foot = π × wall × (outside − wall) × 12 × 0.2836</strong>: the annular "
              "section, which is the outside circle less the bore.</p>"),
        fields=[
            F("outside_diameter", "Outside diameter", "in", 2.375, "2 in pipe is 2.375 OD"),
            F("wall", "Wall thickness", "in", 0.154, "Schedule 40 in 2 in is 0.154"),
            F("length", "Length", "ft", 21, "One length, usually 21 or 40 ft"),
        ],
        results=[
            R("inside_diameter", "Inside diameter", "in"),
            R("weight_per_ft", "Weight per foot", "lb/ft"),
            R("weight_total", "Weight", "lb"),
            R("weight_kg", "Weight", "kg"),
        ],
        formula={
            "inside_diameter": "outside_diameter-2*wall",
            "weight_per_ft": "pi*wall*(outside_diameter-wall)*12*0.2836",
            "weight_total": "pi*wall*(outside_diameter-wall)*12*0.2836*length",
            "weight_kg": "pi*wall*(outside_diameter-wall)*12*0.2836*length/2.20462",
            "outside_diameter": "inside_diameter+2*wall",
            "wall": "(outside_diameter-sqrt(pow(outside_diameter,2)-4*weight_per_ft/(pi*12*0.2836)))/2",
            "length": "weight_total/weight_per_ft",
        },
        prose={
            "why": ("<p>Pipe is priced and handled by weight, and nominal size is neither the outside nor the "
                    "inside diameter: 2 in pipe is 2.375 in across the outside whatever the schedule. The "
                    "annular formula is the only way to get from the numbers on the stencil to the number on "
                    "the ticket.</p>"),
            "formula_note": ("<p>π times wall times the mean diameter gives the metal section; times twelve "
                             "gives a foot; times 0.2836 gives pounds. The inside diameter is the outside less "
                             "twice the wall, which is the bore the fluid actually sees.</p>"),
            "example_note": ("<p>Two-inch schedule 40 pipe — {outside_diameter} in outside, {wall} in wall — "
                             "has an inside diameter of {inside_diameter|unit} and weighs {weight_per_ft} "
                             "lb/ft. A 21 ft length is {weight_total} lb, or {weight_kg} kg.</p>"),
            "reading": ("<p>Read the weight per foot against the tables: 2 in schedule 40 is 3.65 lb/ft, and "
                        "schedule 80 is nearly half again. If the result is well under the table, the wall "
                        "has been entered as a bore measurement.</p>"),
            "scenarios": [
                {"inputs": {"outside_diameter": 4.5, "wall": 0.237, "length": 21},
                 "note": "Four-inch schedule 40: a two-person length at about 90 lb."},
                {"inputs": {"outside_diameter": 6.625, "wall": 0.28, "length": 40},
                 "note": "Six-inch pipe in a 40 ft length — a crane or a side-boom job."},
            ],
            "pitfalls": [
                "<strong>Nominal size used as diameter.</strong> Look up the actual OD for the size.",
                "<strong>Inside diameter entered as outside.</strong> The weight collapses.",
                "<strong>Schedule forgotten.</strong> The same nominal size in schedule 80 is much "
                "heavier.",
            ],
            "units_note": ("<p>Diameters and wall in inches, length in feet, weight per foot and total in "
                           "pounds, with kilograms beside them.</p>"),
            "limits": [
                "<strong>Plain carbon steel.</strong> Stainless, PVC and copper have their own densities.",
                "<strong>No coating or lining.</strong> Concrete-lined pipe is much heavier.",
            ],
            "uses": [
                "<li>Checking a length can be carried.</li>",
                "<li>Estimating a pipe order.</li>",
                "<li>Sizing a support or a hanger.</li>",
            ],
        },
        faq=[
            ("How much does 2 inch schedule 40 pipe weigh?",
             "About 3.65 lb per foot, or 77 lb in a 21 ft length."),
            ("What is the outside diameter of 2 inch pipe?",
             "2.375 inches, whatever the wall thickness."),
        ],
        related=[("/construction/pipe-volume", "Pipe volume"),
                 ("/construction/steel-weight", "Steel weight"),
                 ("/construction/metal-weight", "Metal weight")],
    ),
]
