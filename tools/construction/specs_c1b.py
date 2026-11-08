"""Batch 1b — tubes, weights, cement, mortar, grout and thinset."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="concrete-tube",
        name="Concrete tube",
        title="Concrete Tube Calculator: Footing Tubes in Bulk",
        desc="Size a run of cardboard footing tubes at once: concrete volume, 80 lb bags and the tube length to buy, for any number of piers of the same size. All shown.",
        what=("<p>Each tube is a cylinder, so a run of <strong>n</strong> piers of diameter "
              "<strong>d</strong> and depth <strong>h</strong> takes <strong>n·π·(d/24)²·h</strong> cubic "
              "feet of concrete, and <strong>n·π·d·h</strong> square inches of tube wall.</p>"),
        fields=[
            F("diameter", "Tube diameter", "in", 10, "Inside diameter of the tube"),
            F("depth", "Pour depth", "in", 36, "The tube's buried length plus any above grade"),
            F("count", "Number of tubes", "", 8, "Piers in the run"),
            F("waste", "Over-order", "%", 10, "Tubes never fill exactly"),
        ],
        results=[
            R("concrete_each", "Concrete per tube", "ft³"),
            R("concrete_total", "Concrete, all tubes", "yd³"),
            R("bags_80lb", "Bags of 80 lb mix", ""),
            R("tube_length", "Tube to buy", "ft"),
        ],
        formula={
            "concrete_each": "pi*pow(diameter/24,2)*depth/12",
            "concrete_total": "pi*pow(diameter/24,2)*depth/12*count*(1+waste/100)/27",
            "bags_80lb": "ceil(pi*pow(diameter/24,2)*depth/12*count*(1+waste/100)/0.6)",
            "tube_length": "depth/12*count",
            "diameter": "24*sqrt(concrete_each/(pi*depth/12))",
            "depth": "concrete_each*12/(pi*pow(diameter/24,2))",
            "count": "tube_length*12/depth",
        },
        prose={
            "why": ("<p>Deck and porch piers are usually a run of identical tubes, so the useful answer is "
                    "the total: how many yards, how many bags, and how much tube to buy. The tube length "
                    "is sold in eight-foot sections, which is what the last result is for.</p>"),
            "formula_note": ("<p>Both the diameter and the depth are converted to feet inside the "
                             "formula, so the per-tube volume is direct. The tube length is simply the "
                             "depth in feet times the count, before any cutting allowance.</p>"),
            "example_note": ("<p>Eight 10 in tubes 36 in deep: each holds π × 0.174 × 3 = 1.64 ft³, so "
                             "the run needs 13.1 ft³ — 0.53 yd³ with ten per cent, or 24 bags. The tube "
                             "itself is 24 ft, three eight-foot sections.</p>"),
            "reading": ("<p>Check the diameter against the load: a 10 in pier is generous for a deck, "
                        "and 8 in is the usual minimum. The depth is what the frost line and the load "
                        "decide, not the deck height.</p>"),
            "scenarios": [
                {"inputs": {"diameter": 12, "depth": 48, "count": 12, "waste": 10},
                 "note": "Twelve 12 in piers four feet deep: 3.14 ft³ each, 1.54 yd³ to order and 70 bags."},
                {"inputs": {"diameter": 8, "depth": 24, "count": 4, "waste": 5},
                 "note": "Four small post holes: 0.73 ft³ each, 0.11 yd³ total, five bags."},
            ],
            "pitfalls": [
                "<strong>Tube diameter used as the hole.</strong> The hole is dug wider than the tube; "
                "the concrete fills the tube, not the hole.",
                "<strong>Depth measured above grade only.</strong> The buried length is most of the "
                "volume.",
                "<strong>Waste set to zero.</strong> Cardboard tubes settle and bow, and a level cut "
                "never catches every pier.",
            ],
            "units_note": ("<p>Diameter and depth are in inches, the cured volume in cubic feet and cubic "
                           "yards, and the tube length in feet — the unit the supplier sells in.</p>"),
            "limits": [
                "<strong>Round tubes only.</strong> Square footing forms need a different volume.",
                "<strong>No bell or flare.</strong> A flared footing base is a separate volume.",
            ],
            "uses": [
                "<li>Ordering tubes for a deck.</li>",
                "<li>Buying concrete for a pier run.</li>",
                "<li>Sizing a short-load delivery.</li>",
            ],
        },
        faq=[
            ("What size tube do I need for a deck?",
             "Ten inches is the usual minimum for a deck pier, twelve for anything carrying a roof. The "
             "depth is set by the frost line and the soil."),
            ("Can I pour tubes with a bag mix?",
             "Yes, up to a point — 23 bags is manageable in an afternoon; 70 is not, and a short-load "
             "delivery becomes the cheaper route."),
        ],
        related=[("/construction/sonotube", "Sonotube"),
                 ("/construction/concrete-column", "Concrete column"),
                 ("/construction/post-hole-concrete", "Post hole concrete")],
    ),

    S(
        slug="concrete-weight",
        name="Concrete weight",
        title="Concrete Weight Calculator: Pounds and Tons",
        desc="Turn a concrete volume into the weight you will be lifting, delivering or loading, with the densities of normal, lightweight and heavy mixes on hand. All shown.",
        what=("<p>Concrete weighs about <strong>150 lb per cubic foot</strong>, which is 4 050 lb — just "
              "over two tons — per cubic yard. <strong>Weight = volume × density</strong>, and the density "
              "box is where you tell the page which mix you have.</p>"),
        fields=[
            F("volume", "Concrete volume", "yd³", 3, "From a slab, footing or column takeoff"),
            F("density", "Density", "lb/ft³", 150, "150 normal weight, 110 lightweight, 180+ heavy"),
        ],
        results=[
            R("weight_lb", "Weight", "lb"),
            R("weight_tons", "Weight", "short tons"),
            R("weight_kg", "Weight", "kg"),
            R("volume_ft3", "Volume", "ft³"),
        ],
        formula={
            "weight_lb": "volume*27*density",
            "weight_tons": "volume*27*density/2000",
            "weight_kg": "volume*27*density*0.45359237",
            "volume_ft3": "volume*27",
            "volume": "weight_lb/(27*density)",
            "density": "weight_lb/(volume*27)",
        },
        prose={
            "why": ("<p>Weight is what decides the truck, the crane and the deck the concrete is sitting "
                    "on. A cubic yard of normal concrete is a little over two tons — the number that "
                    "surprises everyone who first lifts a bag.</p>"),
            "formula_note": ("<p>A cubic yard is 27 cubic feet, so the density in pounds per cubic foot is "
                             "multiplied by 27 to get pounds per yard. A short ton is 2 000 lb, and a "
                             "metric tonne would be 2 204.6 lb — the page reports short tons.</p>"),
            "example_note": ("<p>Three yards at 150 lb/ft³ weighs 12 150 lb, or 6.08 short tons — 5 511 "
                             "kg. Lightweight concrete at 110 lb/ft³ would weigh 8 910 lb, a saving of "
                             "nearly a third that a structural engineer cares about.</p>"),
            "reading": ("<p>Compare the weight with the delivery ticket: ready-mix is billed by the yard "
                        "and weighed at the plant, and a mix that comes in light usually means too much "
                        "water.</p>"),
            "scenarios": [
                {"inputs": {"volume": 1, "density": 150},
                 "note": "One yard: 4 050 lb, 2.03 tons — the reference figure for a standard mix."},
                {"inputs": {"volume": 10, "density": 110},
                 "note": "Ten yards of lightweight: 29 700 lb, or 14.9 tons — a third less than normal "
                         "weight."},
            ],
            "pitfalls": [
                "<strong>Metric tonnes assumed.</strong> A short ton is 2 000 lb; reporting tonnes when "
                "tons were meant overstates the load by ten per cent.",
                "<strong>Density treated as a constant.</strong> Lightweight and heavyweight mixes differ "
                "by more than half.",
                "<strong>Volume in cubic feet fed to a yard box.</strong> The formula multiplies by 27, "
                "so the volume must be in yards.",
            ],
            "units_note": ("<p>Volume in cubic yards and density in pounds per cubic foot, giving weight in "
                           "pounds, short tons and kilograms. The kilograms result is a straight "
                           "conversion of the pounds.</p>"),
            "limits": [
                "<strong>No reinforcement.</strong> Rebar and mesh add a few per cent to a reinforced "
                "member's weight.",
                "<strong>Averages only.</strong> The actual density depends on the aggregate and the "
                "water content.",
            ],
            "uses": [
                "<li>Checking a truck's payload.</li>",
                "<li>Working out a crane lift.</li>",
                "<li>Estimated weight for a demolition skip.</li>",
            ],
        },
        faq=[
            ("How much does a yard of concrete weigh?",
             "About 4 050 lb, or 2.03 short tons, for normal-weight concrete at 150 lb/ft³."),
            ("How heavy is a bag of concrete?",
             "80 lb for the standard bag, which yields 0.6 ft³ — so a cubic yard is 45 bags."),
        ],
        related=[("/construction/concrete-slab", "Concrete slab"),
                 ("/construction/cubic-yard", "Cubic yard"),
                 ("/construction/cement", "Cement")],
    ),

    S(
        slug="cement",
        name="Cement",
        title="Cement Calculator: Bags, Sand and Aggregate",
        desc="Work out the cement, sand and aggregate a volume of concrete needs from the mix ratio, and how many 94 lb bags of cement that comes to for the whole pour.",
        what=("<p>A 1:2:3 mix is one part cement, two sand and three aggregate by volume. For "
              "<strong>V</strong> cubic feet of concrete, cement takes "
              "<strong>V ÷ (1 + 2 + 3)</strong> of the total — plus a third for bulking and waste.</p>"),
        fields=[
            F("volume", "Concrete volume", "ft³", 27, "One cubic yard is 27 ft³"),
            F("cement_parts", "Cement parts", "", 1, "One part in a 1:2:3 mix"),
            F("sand_parts", "Sand parts", "", 2, "Two parts"),
            F("aggregate_parts", "Aggregate parts", "", 3, "Three parts"),
            F("waste", "Allowance", "%", 33, "Dry mix bulks; a third is the usual allowance"),
        ],
        results=[
            R("cement_ft3", "Cement volume", "ft³"),
            R("sand_ft3", "Sand volume", "ft³"),
            R("aggregate_ft3", "Aggregate volume", "ft³"),
            R("cement_bags", "Bags of cement (94 lb)", ""),
        ],
        formula={
            "cement_ft3": "volume*cement_parts/(cement_parts+sand_parts+aggregate_parts)*(1+waste/100)",
            "sand_ft3": "volume*sand_parts/(cement_parts+sand_parts+aggregate_parts)*(1+waste/100)",
            "aggregate_ft3": "volume*aggregate_parts/(cement_parts+sand_parts+aggregate_parts)*(1+waste/100)",
            "cement_bags": "ceil(volume*cement_parts/(cement_parts+sand_parts+aggregate_parts)*(1+waste/100))",
            "volume": "cement_ft3*(cement_parts+sand_parts+aggregate_parts)/(cement_parts*(1+waste/100))",
            "waste": "(cement_ft3*(cement_parts+sand_parts+aggregate_parts)/(volume*cement_parts)-1)*100",
        },
        prose={
            "why": ("<p>Mixing on site is all about parts: a 1:2:3 mix is the general-purpose concrete "
                    "everyone knows, 1:1½:3 is stronger and 1:3:6 is mass concrete for footings. The "
                    "parts are by volume, and the allowance for bulking is what makes the bags come "
                    "out right.</p>"),
            "formula_note": ("<p>The cement fraction is its share of the total parts. A 94 lb bag of "
                             "cement is one cubic foot, which is why the cement volume and the bag count "
                             "are the same number rounded up.</p>"),
            "example_note": ("<p>One cubic yard at 1:2:3 with a third allowance: cement 27 × ⅙ × 1.33 = "
                             "6 ft³, sand 12 ft³, aggregate 18 ft³ — six bags of cement, 12 ft³ of sand "
                             "and 18 ft³ of gravel.</p>"),
            "reading": ("<p>Check the mix against the job: 1:2:3 is about 3 500 psi, 1:1½:3 about 4 500, "
                        "and 1:3:6 nearer 2 000. A mix richer than the job needs wastes cement and "
                        "makes the concrete shrink more.</p>"),
            "scenarios": [
                {"inputs": {"volume": 8, "cement_parts": 1, "sand_parts": 2, "aggregate_parts": 3,
                            "waste": 33},
                 "note": "A small slab: 1.8 ft³ of cement — two bags — with 3.6 ft³ of sand and 5.3 of "
                         "aggregate."},
                {"inputs": {"volume": 54, "cement_parts": 1, "sand_parts": 1.5, "aggregate_parts": 3,
                            "waste": 10},
                 "note": "Two yards of a richer 1:1½:3 mix: 10.8 ft³ of cement, 11 bags, and 16.2 ft³ of sand."},
            ],
            "pitfalls": [
                "<strong>Parts read as weights.</strong> The ratio is by volume; weighing the sand and "
                "calling it a part changes the mix.",
                "<strong>The bulking allowance left out.</strong> Dry sand and aggregate bulk up when "
                "shovelled, and a mix without the allowance comes out short.",
                "<strong>Cement bags counted as concrete bags.</strong> A 94 lb bag of cement is not an "
                "80 lb bag of premixed concrete.",
            ],
            "units_note": ("<p>Volumes in cubic feet, and the bag count is whole 94 lb bags — one per "
                           "cubic foot of cement. The parts are plain numbers and carry no units "
                           "themselves.</p>"),
            "limits": [
                "<strong>Volume batching only.</strong> Weight batching is more accurate and is what a "
                "plant does.",
                "<strong>No water.</strong> The water-cement ratio is the single biggest factor in "
                "strength, and it is not in this ratio.",
            ],
            "uses": [
                "<li>Ordering sand, aggregate and cement for a site mix.</li>",
                "<li>Scaling a known mix to a bigger pour.</li>",
                "<li>Checking a contractor's materials list.</li>",
            ],
        },
        faq=[
            ("What does a 1:2:3 mix mean?",
             "One part cement, two parts sand and three parts coarse aggregate, by volume. It is the "
             "standard general-purpose mix, around 3 500 psi."),
            ("How many bags of cement are in a yard of concrete?",
             "About six 94 lb bags at a 1:2:3 mix including the bulking allowance — a little over one "
             "bag per 4½ cubic feet."),
        ],
        related=[("/construction/concrete-slab", "Concrete slab"),
                 ("/construction/sand", "Sand"),
                 ("/construction/gravel", "Gravel")],
    ),

    S(
        slug="mortar",
        name="Mortar",
        title="Mortar Calculator: Bags Needed to Lay Blocks",
        desc="Work out the mortar a block or brick wall needs from its area, the joint size and the wall's thickness, in cubic feet and in 80 lb bags of mix. All shown.",
        what=("<p>Mortar fills the joints and the beds between units. For a wall of <strong>A</strong> "
              "square feet, the mortar volume is the joint's share of the face times the wall's "
              "thickness: <strong>A × joint/(joint + 8) × depth</strong>.</p>"),
        fields=[
            F("wall_area", "Wall area", "ft²", 200, "Face area, openings deducted"),
            F("joint", "Joint thickness", "in", 0.375, "⅜ in for block, ⅜ to ½ for brick"),
            F("unit_depth", "Wall thickness", "in", 8, "The joint's depth into the wall"),
            F("waste", "Wastage", "%", 10, "Mortar that falls off the trowel"),
        ],
        results=[
            R("mortar_ft3", "Mortar volume", "ft³"),
            R("bags_80lb", "Bags of mortar mix (80 lb)", ""),
            R("joint_fraction", "Joint share of the wall face", "%"),
        ],
        formula={
            "mortar_ft3": "wall_area*joint/(joint+8)*unit_depth/12*(1+waste/100)",
            "bags_80lb": "ceil(wall_area*joint/(joint+8)*unit_depth/12*(1+waste/100)/0.7)",
            "joint_fraction": "joint/(joint+8)*100",
            "wall_area": "mortar_ft3/(joint/(joint+8)*unit_depth/12*(1+waste/100))",
            "joint": "8*mortar_ft3/(wall_area*unit_depth/12*(1+waste/100)-mortar_ft3)",
            "unit_depth": "mortar_ft3/(wall_area*joint/(joint+8)*(1+waste/100))*12",
            "waste": "(mortar_ft3/(wall_area*joint/(joint+8)*unit_depth/12)-1)*100",
        },
        prose={
            "why": ("<p>Mortar is a small part of a wall's cost but a large part of its appearance and "
                    "strength. Ordering it by the bag from the wall area avoids the common habit of "
                    "estimating a bag per so many blocks, which drifts badly with joint size.</p>"),
            "formula_note": ("<p>The joint fraction is the joint divided by the unit-plus-joint module — "
                             "for a ⅜ joint against an 8 in unit that is about 4.5 per cent of the face. "
                             "Multiplying by the wall thickness gives the volume behind that face.</p>"),
            "example_note": ("<p>A 200 ft² block wall, 8 in thick, ⅜ joints: the joint is 4.5 per cent of "
                             "the face, so the mortar is 200 × 0.045 × 0.667 = 6.0 ft³, 6.6 ft³ with "
                             "waste, or ten bags of mix.</p>"),
            "reading": ("<p>This page assumes the joint is fully bedded, which is right for solid brick "
                        "and for block laid with a full bed. Hollow block is usually face-shell bedded "
                        "and uses about a third of the figure; the site rule of thumb is 2½ bags of mix "
                        "per hundred 8 in blocks. A count far above that means the joints are oversized, "
                        "and much below means they are not full, which is a strength problem rather "
                        "than a saving.</p>"),
            "scenarios": [
                {"inputs": {"wall_area": 100, "joint": 0.375, "unit_depth": 8, "waste": 10},
                 "note": "A hundred square feet of block: 3.3 ft³ of mortar, five bags."},
                {"inputs": {"wall_area": 150, "joint": 0.5, "unit_depth": 4.5, "waste": 15},
                 "note": "Brick veneer with ½ in joints: 3.8 ft³ of mortar and six bags."},
            ],
            "pitfalls": [
                "<strong>Openings not deducted.</strong> Mortar is only used where there is wall.",
                "<strong>Joint thickness treated as unimportant.</strong> Going from ⅜ to ½ in raises the "
                "mortar volume by nearly a third.",
                "<strong>Bag yield assumed like concrete.</strong> Mortar mix yields about 0.7 ft³ per "
                "80 lb bag, more than concrete because there is no coarse aggregate.",
            ],
            "units_note": ("<p>The wall area is in square feet and the thicknesses in inches; the joint "
                           "fraction is a percentage of the face, and the volume lands in cubic feet, "
                           "which is what the bag yield is quoted in.</p>"),
            "limits": [
                "<strong>An estimate of the joint fill.</strong> Tooling, waste and the mason's habit "
                "move the number more than the arithmetic does.",
                "<strong>One unit size.</strong> A wall of mixed units needs the area split.",
            ],
            "uses": [
                "<li>Ordering mortar for a block wall.</li>",
                "<li>Pricing a masonry job's materials.</li>",
                "<li>Checking that joints are being filled.</li>",
            ],
        },
        faq=[
            ("How many blocks will a bag of mortar lay?",
             "About 40 standard 8 in blocks, which is roughly 2½ bags per hundred blocks."),
            ("Does joint size really matter?",
             "Yes — it is the whole mortar volume. A ½ in joint uses nearly a third more mortar than a "
             "⅜ in one over the same wall."),
        ],
        related=[("/construction/brick", "Brick"),
                 ("/construction/concrete-block", "Concrete block"),
                 ("/construction/grout", "Grout")],
    ),

    S(
        slug="grout",
        name="Grout",
        title="Grout Calculator: Tile Grout by Joint Volume",
        desc="Work out the grout a tiled floor needs from the tile size, the joint width and the joint depth, and the area, in kilograms and litres before you buy. All shown.",
        what=("<p>Grout fills the joint network between tiles: <strong>grout = area × joint width × joint "
              "depth ÷ tile area</strong>, all in the same units, then scaled by the grout's density — "
              "about 1.6 kg per litre.</p>"),
        fields=[
            F("area", "Tiled area", "ft²", 100, "The area being tiled"),
            F("tile_length", "Tile length", "in", 12, "Longer dimension of one tile"),
            F("tile_width", "Tile width", "in", 12, "Shorter dimension of one tile"),
            F("joint_width", "Joint width", "mm", 3, "3 mm for rectified porcelain, 5 for ceramic"),
            F("joint_depth", "Joint depth", "mm", 8, "Roughly the tile's thickness"),
            F("density", "Grout density", "kg/L", 1.6, "Cementitious grout is about 1.6"),
        ],
        results=[
            R("grout_kg", "Grout needed", "kg"),
            R("grout_litres", "Grout volume", "L"),
            R("joint_length", "Total joint length", "ft"),
        ],
        formula={
            "grout_litres": "area*(tile_length+tile_width)/(tile_length*tile_width)*joint_width*joint_depth*0.003658",
            "grout_kg": "area*(tile_length+tile_width)/(tile_length*tile_width)*joint_width*joint_depth*0.003658*1.6",
            "joint_length": "area*144*(tile_length+tile_width)/(tile_length*tile_width)/12",
            "joint_width": "grout_kg/(area*(tile_length+tile_width)/(tile_length*tile_width)*joint_depth*0.003658*1.6)",
            "joint_depth": "grout_kg/(area*(tile_length+tile_width)/(tile_length*tile_width)*joint_width*0.003658*1.6)",
            "density": "grout_kg/grout_litres",
        },
        prose={
            "why": ("<p>Grout is cheap and running out halfway across a floor is not, because a second "
                    "batch may not match. The joint network is what the quantity depends on, and it is "
                    "surprisingly large: small tiles mean much more joint than large ones.</p>"),
            "formula_note": ("<p>The perimeter term (length + width) divided by the area is the joint "
                             "length per unit area — the number of joints a tile contributes. Multiplying "
                             "by the joint's cross-section gives the volume, and the density turns it "
                             "into kilograms.</p>"),
            "example_note": ("<p>100 ft² of 12 in tiles with 3 mm joints 8 mm deep: 1.46 L of grout, 2.34 kg — a 3 kg bag covers it with a little to spare.</p>"),
            "reading": ("<p>Check against the manufacturer's coverage chart: most quote 0.5 to 1.5 kg "
                        "per square metre for standard joints, which is 1 to 3 kg per hundred square "
                        "feet. Small mosaic tiles can need several times that.</p>"),
            "scenarios": [
                {"inputs": {"area": 50, "tile_length": 6, "tile_width": 6, "joint_width": 3,
                            "joint_depth": 6, "density": 1.6},
                 "note": "Fifty square feet of 6 in tiles: four times the joint per area, so 1.76 kg for half the floor."},
                {"inputs": {"area": 200, "tile_length": 24, "tile_width": 12, "joint_width": 5,
                            "joint_depth": 10, "density": 1.6},
                 "note": "Two hundred square feet of large-format tile: 7.3 kg, because 24 in tiles carry half the joint length per square foot."},
            ],
            "pitfalls": [
                "<strong>Tile size dropped from the formula.</strong> Grout is not proportional to area "
                "alone; halving the tile size roughly doubles the quantity.",
                "<strong>Joint depth assumed equal to the tile thickness.</strong> Grout only fills the "
                "joint to the tile's face; a deep bedding layer is not grouted.",
                "<strong>Units mixed.</strong> Tile sizes are in inches here and the joint in "
                "millimetres, and the formula converts both.",
            ],
            "units_note": ("<p>Tile dimensions in inches, joints in millimetres, area in square feet. The "
                           "result is a volume in litres and a mass in kilograms at the density you "
                           "give, with the total joint length in feet.</p>"),
            "limits": [
                "<strong>Square-jointed tiles.</strong> Herringbone and irregular patterns have more "
                "joint per area.",
                "<strong>No waste allowance.</strong> Add ten per cent for a first-time job.",
            ],
            "uses": [
                "<li>Buying grout for a floor.</li>",
                "<li>Comparing grout costs between tile sizes.</li>",
                "<li>Checking a tiler's materials list.</li>",
            ],
        },
        faq=[
            ("How much grout do I need per square metre?",
             "For 12 in tiles with 3 mm joints, about 0.5 kg — the figure doubles and more as the tile "
             "size falls."),
            ("Does grout go off if I buy too much?",
             "Cementitious grout has a shelf life of about a year unopened; opened bags absorb moisture "
             "and are best used within weeks."),
        ],
        related=[("/construction/tile", "Tile"),
                 ("/construction/thinset", "Thinset"),
                 ("/construction/mortar", "Mortar")],
    ),

    S(
        slug="thinset",
        name="Thinset",
        title="Thinset Calculator: Bags of Tile Adhesive Mix",
        desc="Work out how many 50 lb bags of thinset a tiled floor needs, from the area, the trowel notch and the coverage the manufacturer quotes for that notch. All shown.",
        what=("<p>Thinset is spread with a notched trowel, and the notch sets the coverage: a "
              "<strong>¼ × ¼ in</strong> notch lays about 10 ft² per 50 lb bag, a "
              "<strong>½ × ½ in</strong> notch about 3.5 ft². Bags = area ÷ coverage.</p>"),
        fields=[
            F("area", "Tiled area", "ft²", 100, "Floor or wall area to be covered"),
            F("coverage", "Coverage per bag", "ft²/50 lb", 10, "About 10 for a ¼ in square notch"),
            F("coats", "Layers", "", 1, "Two only where a thick bed is being built up"),
            F("waste", "Wastage", "%", 10, "Mixed adhesive that goes off in the bucket"),
        ],
        results=[
            R("bags", "Bags of 50 lb thinset", ""),
            R("weight", "Adhesive weight", "lb"),
            R("coverage_used", "Coverage used", "ft²"),
        ],
        formula={
            "bags": "ceil(area*coats*(1+waste/100)/coverage)",
            "weight": "ceil(area*coats*(1+waste/100)/coverage)*50",
            "coverage_used": "area*coats",
            "area": "bags*coverage/(coats*(1+waste/100))",
            "waste": "(bags*coverage/(area*coats)-1)*100",
        },
        prose={
            "why": ("<p>Thinset coverage is set by the trowel, not by the bag: the same 50 lb bag covers "
                    "three times as much under a small notch as under a large one. Getting the bag count "
                    "right is mostly about knowing which trowel the job needs.</p>"),
            "formula_note": ("<p>Coverage per bag is a manufacturer's figure for a specific notch and a "
                             "flat substrate. The waste allowance matters more than on most materials "
                             "because mixed thinset has a working life of about twenty minutes.</p>"),
            "example_note": ("<p>100 ft² of floor with a ¼ in notch: at 10 ft² per bag and ten per cent "
                             "waste that is 11 bags — 550 lb of adhesive for a hundred square feet, which "
                             "sounds a lot until you see how much a notched trowel leaves behind.</p>"),
            "reading": ("<p>Compare the bag count with the tile: large-format tile needs a ½ in notch and "
                        "therefore three times the adhesive. Back-buttering adds more again.</p>"),
            "scenarios": [
                {"inputs": {"area": 60, "coverage": 3.5, "coats": 1, "waste": 10},
                 "note": "Sixty square feet of 24 in tile with a ½ in notch: 19 bags."},
                {"inputs": {"area": 200, "coverage": 12, "coats": 1, "waste": 5},
                 "note": "Mosaic on a flat floor with a small notch: 18 bags for twice the area."},
            ],
            "pitfalls": [
                "<strong>Coverage borrowed from another trowel.</strong> Doubling the notch roughly "
                "halves the coverage.",
                "<strong>No waste allowance.</strong> Bucket life is short; a mixed batch that skins "
                "over is thrown away.",
                "<strong>Thinset used as levelling compound.</strong> Bedding out dips with adhesive "
                "uses far more than any coverage figure.",
            ],
            "units_note": ("<p>Area in square feet and coverage in square feet per 50 lb bag, so the "
                           "result is a count of bags and their total weight in pounds.</p>"),
            "limits": [
                "<strong>Manufacturer figures.</strong> Coverage varies with the substrate's flatness and "
                "the trowel's actual wear.",
                "<strong>One trowel.</strong> Mixing notches across a floor needs the area split.",
            ],
            "uses": [
                "<li>Ordering adhesive for a floor.</li>",
                "<li>Comparing trowel sizes by cost.</li>",
                "<li>Checking a tiler's materials list.</li>",
            ],
        },
        faq=[
            ("How many square feet does a bag of thinset cover?",
             "About 10 ft² with a ¼ × ¼ in notch and 3.5 ft² with a ½ × ½ in notch on a flat floor."),
            ("How long does mixed thinset last?",
             "About twenty minutes in the bucket. Mix what you can lay in that time rather than the "
             "whole bag at once."),
        ],
        no_round_trip=['area', 'coverage', 'coats', 'waste'],
        related=[("/construction/tile", "Tile"),
                 ("/construction/grout", "Grout"),
                 ("/construction/mortar", "Mortar")],
    ),
]
