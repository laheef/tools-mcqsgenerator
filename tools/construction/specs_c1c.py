"""Batch 1c — reinforcement, piers, driveway cost and stone tonnage."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="rebar",
        name="Rebar",
        title="Rebar Calculator: Bar Count, Length and Weight",
        desc="Work out the rebar a slab needs: how many bars run each way, the total length to cut and the weight to order, from the slab size and the bar spacing. All shown.",
        what=("<p>Rebar goes in as a grid: bars running each way at a given spacing. With spacing "
              "<strong>s</strong> inches, a slab <strong>L × W</strong> feet takes "
              "<strong>W·12/s + 1</strong> bars one way and <strong>L·12/s + 1</strong> the other.</p>"),
        fields=[
            F("length", "Slab length", "ft", 20, "Along the bars' run"),
            F("width", "Slab width", "ft", 10, "Across the run"),
            F("spacing", "Bar spacing", "in", 12, "12 in for slab mesh, 18 for light slabs"),
            F("bar_size", "Bar size", "#", 4, "Number 4 is ½ in, 0.668 lb per foot"),
        ],
        results=[
            R("bars_length", "Bars running lengthwise", ""),
            R("bars_width", "Bars running crosswise", ""),
            R("total_length", "Total bar length", "ft"),
            R("weight", "Rebar weight", "lb"),
        ],
        formula={
            "bars_length": "ceil(width*12/spacing-0.000000001)+1",
            "bars_width": "ceil(length*12/spacing-0.000000001)+1",
            "total_length": "(ceil(width*12/spacing-0.000000001)+1)*length+(ceil(length*12/spacing-0.000000001)+1)*width",
            "weight": "((ceil(width*12/spacing-0.000000001)+1)*length+(ceil(length*12/spacing-0.000000001)+1)*width)*0.668*pow(bar_size/4,2)",
        },
        prose={
            "why": ("<p>Rebar is specified by bar size and spacing, and ordered by weight. Getting from "
                    "one to the other is a grid count and a multiply, and it is what turns a slab detail "
                    "into a delivery note.</p>"),
            "formula_note": ("<p>Bars in each direction are the dimension in inches divided by the "
                             "spacing, plus one because both edges get a bar. The weight uses 0.668 lb "
                             "per foot for a #4 bar, scaled by the square of the size ratio — a #6 is "
                             "2¼ times the weight of a #4 per foot.</p>"),
            "example_note": ("<p>A 20 × 10 ft slab at 12 in spacing: 11 bars one way and 21 the other, "
                             "giving 11 × 20 + 21 × 10 = 430 ft of #4 bar, which weighs 287 lb — just over seven 60 ft sticks.</p>"),
            "reading": ("<p>Check the steel against the slab: a typical driveway is #4 at 12 to 18 in "
                        "each way, while a structural slab has a designed schedule. The weight per "
                        "square foot is a useful cross-check — about 1.4 lb/ft² here.</p>"),
            "scenarios": [
                {"inputs": {"length": 40, "width": 20, "spacing": 18, "bar_size": 4},
                 "note": "A 40 × 20 driveway at 18 in: 1 160 ft of bar, 775 lb."},
                {"inputs": {"length": 10, "width": 10, "spacing": 12, "bar_size": 5},
                 "note": "A ten-foot pad in #5: 220 ft and 230 lb, since #5 is 1.56 times the weight "
                         "of #4 per foot."},
            ],
            "pitfalls": [
                "<strong>Edge bars left out.</strong> The plus one is a bar on each edge; skipping it "
                "leaves both ends unreinforced.",
                "<strong>Weight taken from the length of the longest bars.</strong> Rebar is sold in "
                "stock lengths and cut with waste, so order by the weight plus a few per cent.",
                "<strong>Spacing measured centre to centre and counted as gaps.</strong> Twelve-inch "
                "spacing means a bar every foot, not twelve bars in twelve feet.",
            ],
            "units_note": ("<p>Length and width in feet, spacing in inches, bar size as the standard "
                           "number. The length comes out in feet and the weight in pounds, using the "
                           "standard 0.668 lb/ft for #4.</p>"),
            "limits": [
                "<strong>A flat slab grid.</strong> Beams, footings and cranked bars need their own "
                "counts.",
                "<strong>No laps.</strong> Lap lengths at joints add five to ten per cent to the length "
                "on site.",
            ],
            "uses": [
                "<li>Ordering rebar for a slab.</li>",
                "<li>Estimating the steel in a driveway.</li>",
                "<li>Checking a reinforcement schedule against the geometry.</li>",
            ],
        },
        faq=[
            ("How much does #4 rebar weigh?",
             "0.668 lb per foot, which is 40 lb for a 60 ft stick. Every size scales by the square of "
             "its diameter."),
            ("What spacing should slab rebar be?",
             "Twelve to eighteen inches each way for a driveway or patio; a structural slab follows its "
             "engineer's schedule."),
        ],
        no_round_trip=['length', 'width', 'spacing'],
        related=[("/construction/concrete-slab", "Concrete slab"),
                 ("/construction/steel-weight", "Steel weight"),
                 ("/construction/concrete-weight", "Concrete weight")],
    ),

    S(
        slug="sonotube",
        name="Sonotube",
        title="Sonotube Calculator: One Pier and Its Concrete",
        desc="Size one cardboard pier tube: the concrete it holds, the 80 lb bags it needs and the tube surface you will be buying for the pour itself. Units shown.",
        what=("<p>A Sonotube takes the volume of a cylinder: <strong>π·(d/24)²·h</strong> cubic feet for "
              "a diameter <strong>d</strong> inches and height <strong>h</strong> feet. That divides by "
              "0.6 to give 80 lb bags.</p>"),
        fields=[
            F("diameter", "Tube diameter", "in", 12, "8, 10, 12 or 16 in are the common sizes"),
            F("height", "Tube height above the base", "ft", 4, "The full length of tube you fill"),
            F("waste", "Over-order", "%", 10, "Settlement and an uneven hole"),
        ],
        results=[
            R("volume_ft3", "Concrete per tube", "ft³"),
            R("volume_yd3", "Concrete per tube", "yd³"),
            R("bags_80lb", "Bags of 80 lb mix", ""),
            R("tube_area", "Tube surface area", "ft²"),
        ],
        formula={
            "volume_ft3": "pi*pow(diameter/24,2)*height",
            "volume_yd3": "pi*pow(diameter/24,2)*height*(1+waste/100)/27",
            "bags_80lb": "ceil(pi*pow(diameter/24,2)*height*(1+waste/100)/0.6-0.000000001)",
            "tube_area": "pi*diameter/12*height",
            "diameter": "24*sqrt(volume_ft3/(pi*height))",
            "height": "volume_ft3/(pi*pow(diameter/24,2))",
            "waste": "(volume_yd3*27/(pi*pow(diameter/24,2)*height)-1)*100",
        },
        prose={
            "why": ("<p>Sonotubes are how a deck or a fence line gets its concrete piers without a "
                    "carpenter-built form. One tube's volume decides the bags you carry to the hole, "
                    "and the surface area tells you how much tube to buy.</p>"),
            "formula_note": ("<p>The 24 converts diameter in inches to radius in feet. The surface area "
                             "is the circumference in feet times the height — the actual card you wrap "
                             "around the pour, which matters when the tube is cut from stock.</p>"),
            "example_note": ("<p>A 12 in tube four feet tall holds 3.14 ft³, or 0.128 yd³ with ten per "
                             "cent — six bags of 80 lb mix. Its surface is 12.6 ft², so a 12 ft tube "
                             "makes most of a second one.</p>"),
            "reading": ("<p>Check the size against the load: a 12 in pier is right for most decks, 16 in "
                        "for a porch post carrying a roof. The depth below grade should reach the frost "
                        "line in cold climates, and the height above grade is what you actually fill.</p>"),
            "scenarios": [
                {"inputs": {"diameter": 8, "height": 3, "waste": 10},
                 "note": "An 8 in fence post tube: 1.05 ft³ and two bags."},
                {"inputs": {"diameter": 16, "height": 6, "waste": 10},
                 "note": "A 16 in porch pier six feet tall: 8.4 ft³, 0.34 yd³ and 16 bags."},
            ],
            "pitfalls": [
                "<strong>The tube measured from the hole's bottom.</strong> Concrete only fills the "
                "tube, not the excavated bell around it.",
                "<strong>Diameter entered as radius.</strong> The formula halves it already.",
                "<strong>Waste left at zero.</strong> Cardboard tubes bulge and the top is never cut "
                "level to the millimetre.",
            ],
            "units_note": ("<p>Diameter in inches, height in feet, volume in cubic feet, bags of 80 lb "
                           "mix and surface area in square feet.</p>"),
            "limits": [
                "<strong>Round tubes only.</strong> Square forms and flared bases need their own "
                "volumes.",
                "<strong>No reinforcement allowance.</strong> A rebar cage displaces a little concrete; "
                "the over-order covers it.",
            ],
            "uses": [
                "<li>Working out bags for a single pier.</li>",
                "<li>Buying tube by the foot.</li>",
                "<li>Checking a deck's pier size.</li>",
            ],
        },
        faq=[
            ("How much concrete does a 12 inch Sonotube hold?",
             "About 0.785 ft³ per foot of height, so four feet takes 3.14 ft³ — six 80 lb bags."),
            ("Can the tube stay in the ground?",
             "Yes. Sonotubes are left in place; the cardboard is inert in soil and keeps the concrete "
             "from picking up dirt."),
        ],
        related=[("/construction/concrete-tube", "Concrete tube"),
                 ("/construction/post-hole-concrete", "Post hole concrete"),
                 ("/construction/concrete-column", "Concrete column")],
    ),

    S(
        slug="post-hole-concrete",
        name="Post hole concrete",
        title="Post Hole Concrete Calculator: Bags per Post",
        desc="Work out the concrete for a fence or deck post hole, per post and for the whole run, from the hole size, the depth and the post standing in it. All shown.",
        what=("<p>A post hole is a cylinder: <strong>π·(d/24)²·h</strong> cubic feet each, where "
              "<strong>d</strong> is the hole diameter in inches and <strong>h</strong> its depth in "
              "feet. Bags follow by dividing by 0.6.</p>"),
        fields=[
            F("hole_diameter", "Hole diameter", "in", 10, "Usually two to three times the post width"),
            F("hole_depth", "Hole depth", "ft", 3, "Below the frost line where that matters"),
            F("post_size", "Post size", "in", 4, "The post displaces its own volume"),
            F("posts", "Number of posts", "", 10, "Posts in the run"),
            F("waste", "Over-order", "%", 10, "Spoil and uneven holes"),
        ],
        results=[
            R("concrete_each", "Concrete per hole", "ft³"),
            R("concrete_total", "Concrete, all posts", "ft³"),
            R("bags_80lb", "Bags of 80 lb mix", ""),
            R("post_displacement", "Volume taken by the post", "ft³"),
        ],
        formula={
            "concrete_each": "(pi*pow(hole_diameter/24,2)-pow(post_size/12,2))*hole_depth",
            "concrete_total": "(pi*pow(hole_diameter/24,2)-pow(post_size/12,2))*hole_depth*posts*(1+waste/100)",
            "bags_80lb": "ceil((pi*pow(hole_diameter/24,2)-pow(post_size/12,2))*hole_depth*posts*(1+waste/100)/0.6-0.000000001)",
            "post_displacement": "pow(post_size/12,2)*hole_depth",
            "hole_diameter": "24*sqrt((concrete_each/hole_depth+pow(post_size/12,2))/pi)",
            "hole_depth": "concrete_each/(pi*pow(hole_diameter/24,2)-pow(post_size/12,2))",
            "posts": "concrete_total/((pi*pow(hole_diameter/24,2)-pow(post_size/12,2))*hole_depth*(1+waste/100))",
            "waste": "(concrete_total/((pi*pow(hole_diameter/24,2)-pow(post_size/12,2))*hole_depth*posts)-1)*100",
        },
        prose={
            "why": ("<p>Post holes are the classic Saturday job, and the bag count is the difference "
                    "between one trip to the yard and three. The post itself takes up a chunk of the "
                    "hole, and leaving that out over-orders by about a fifth.</p>"),
            "formula_note": ("<p>The hole is a cylinder and the post is a square prism, so the concrete "
                             "is the difference between them. The square term is the post's side in feet, "
                             "squared — a 4 in post takes 0.111 ft² of the hole's area.</p>"),
            "example_note": ("<p>Ten holes 10 in across and 3 ft deep with 4 in posts: the hole holds "
                             "1.64 ft³ and the post takes 0.33, so each needs 1.30 ft³ — 13.0 ft³ for the run, 14.3 with ten per cent, or 24 bags.</p>"),
            "reading": ("<p>Compare with the rule of thumb: about one 80 lb bag per post for a shallow "
                        "hole and two or three for a deep one. A hole three times the post's width takes "
                        "much more concrete than it looks like it should.</p>"),
            "scenarios": [
                {"inputs": {"hole_diameter": 8, "hole_depth": 2.5, "post_size": 4, "posts": 20,
                            "waste": 10},
                 "note": "A twenty-post fence with 8 in holes: 0.60 ft³ per hole, 13.1 ft³ in total, 22 bags."},
                {"inputs": {"hole_diameter": 12, "hole_depth": 4, "post_size": 6, "posts": 4, "waste": 15},
                 "note": "Four deck posts in 12 in holes four feet deep: 2.14 ft³ each, 9.9 ft³ and 17 bags."},
            ],
            "pitfalls": [
                "<strong>Post displacement ignored.</strong> A 6 in post takes a quarter of a 12 in "
                "hole's area.",
                "<strong>Depth measured above grade.</strong> Only the buried length is filled with "
                "concrete; the rest is backfill or the post itself.",
                "<strong>Bags for one post multiplied without the waste.</strong> One bag per post times "
                "twenty is the wrong answer when each hole needs 1.3 ft³.",
            ],
            "units_note": ("<p>Hole and post sizes in inches, depth in feet. The per-hole volume is cubic "
                           "feet, the run total the same, and the bags are whole 80 lb bags.</p>"),
            "limits": [
                "<strong>Straight-sided holes.</strong> Bell-shaped and rocky holes take more.",
                "<strong>Round posts.</strong> A round post displaces a circle, not a square.",
            ],
            "uses": [
                "<li>Buying bags for a fence line.</li>",
                "<li>Deciding how wide to dig.</li>",
                "<li>Checking a deck's pier schedule.</li>",
            ],
        },
        faq=[
            ("How many bags of concrete per fence post?",
             "About one bag of 80 lb mix for an 8 in hole two feet deep, and two to three for a 10 in "
             "hole three feet deep."),
            ("Should I put gravel in the bottom of a post hole?",
             "Yes, about six inches, for drainage — and it does not change the concrete volume much "
             "because it is below the post's base."),
        ],
        related=[("/construction/sonotube", "Sonotube"),
                 ("/construction/concrete-tube", "Concrete tube"),
                 ("/construction/fence-post-depth", "Fence post depth")],
    ),

    S(
        slug="concrete-driveway-cost",
        name="Concrete driveway cost",
        title="Concrete Driveway Cost Calculator: Yards and Bill",
        desc="Estimate a concrete driveway's volume, the concrete bill and the finishing charge, and the price per square foot a contractor's quote works out to. All shown.",
        what=("<p>The cost is the concrete plus the finishing: <strong>volume = L × W × T ÷ 27</strong>, "
              "the concrete bill is that volume times the price per yard, and the price per square foot "
              "follows by division.</p>"),
        fields=[
            F("length", "Driveway length", "ft", 40, "From the road to the garage"),
            F("width", "Driveway width", "ft", 12, "Two cars need 18 to 20 ft"),
            F("thickness", "Slab thickness", "in", 5, "Five inches for cars, six for a heavy vehicle"),
            F("price", "Concrete price", "$/yd³", 165, "Ready-mix delivered, plus a short-load fee below 5 yd³"),
            F("labor", "Labour and finishing", "$/ft²", 4.5, "Forming, placing, finishing, curing"),
        ],
        results=[
            R("area", "Driveway area", "ft²"),
            R("volume_yd3", "Concrete volume", "yd³"),
            R("concrete_cost", "Concrete cost", "$"),
            R("labor_cost", "Labour cost", "$"),
            R("total_cost", "Total cost", "$"),
            R("cost_per_ft2", "Cost per square foot", "$/ft²"),
        ],
        formula={
            "area": "length*width",
            "volume_yd3": "length*width*thickness/12/27",
            "concrete_cost": "length*width*thickness/12/27*price",
            "labor_cost": "length*width*labor",
            "total_cost": "length*width*thickness/12/27*price+length*width*labor",
            "cost_per_ft2": "(length*width*thickness/12/27*price+length*width*labor)/(length*width)",
            "length": "area/width",
            "width": "area/length",
            "thickness": "volume_yd3*27*12/(length*width)",
            "price": "(total_cost-length*width*labor)/(length*width*thickness/12/27)",
            "labor": "(total_cost-length*width*thickness/12/27*price)/(length*width)",
        },
        prose={
            "why": ("<p>A driveway quote is really three numbers stacked: the concrete, the labour to form "
                    "and finish it, and the base underneath. This page gives the first two and the price "
                    "per square foot, which is the number quotes are compared on.</p>"),
            "formula_note": ("<p>The volume is the same slab calculation as anywhere else; the cost per "
                             "square foot divides the total by the area, which is how contractors price. "
                             "The base, reinforcement and permits are not in either figure.</p>"),
            "example_note": ("<p>A 40 × 12 ft driveway at 5 in: 480 ft², 7.4 yd³, and at $165 a yard the "
                             "concrete is $1 222. Finishing at $4.50/ft² adds $2 160, so the total is "
                             "$3 382 — $7.05 per square foot.</p>"),
            "reading": ("<p>Compare the per-foot figure with the range for your area: $6 to $12 per "
                        "square foot is typical for a plain slab, with stamped or exposed finishes "
                        "adding several dollars more.</p>"),
            "scenarios": [
                {"inputs": {"length": 60, "width": 20, "thickness": 6, "price": 175, "labor": 5},
                 "note": "A 60 × 20 ft drive at 6 in: 22.2 yd³ and $3 889 of concrete, plus $6 000 of "
                         "finishing — $8.24 per square foot."},
                {"inputs": {"length": 20, "width": 10, "thickness": 4, "price": 165, "labor": 6},
                 "note": "A small pad: 2.47 yd³, $407 of concrete and $1 200 of labour — the labour "
                         "dominates on small jobs."},
            ],
            "pitfalls": [
                "<strong>Base and drainage left out.</strong> Six inches of compacted gravel is a real "
                "cost and is not in the concrete price.",
                "<strong>Short-load fees ignored.</strong> A 2½ yard pour usually carries a surcharge "
                "that can add a hundred dollars or more.",
                "<strong>Finishing priced per yard.</strong> Most finishers quote per square foot, and "
                "mixing the two bases distorts the comparison.",
            ],
            "units_note": ("<p>Dimensions in feet, thickness in inches, volume in cubic yards. The "
                           "concrete price is per cubic yard and the labour per square foot, so the two "
                           "costs arrive in dollars and the total per square foot follows.</p>"),
            "limits": [
                "<strong>Concrete and finishing only.</strong> Excavation, base, rebar, saw cuts and "
                "sealing are separate line items.",
                "<strong>Prices vary by region.</strong> The defaults are indicative; replace them with "
                "local quotes.",
            ],
            "uses": [
                "<li>Budgeting a driveway replacement.</li>",
                "<li>Comparing two contractors' quotes.</li>",
                "<li>Checking whether a quote's yardage is plausible.</li>",
            ],
        },
        faq=[
            ("How much does a concrete driveway cost per square foot?",
             "$6 to $12 for a plain slab, including concrete and finishing, depending on region, "
             "thickness and access."),
            ("Is a thicker driveway worth it?",
             "For cars, five inches over a good base is usually enough; six inches pays off where "
             "heavier vehicles or poor drainage are involved."),
        ],
        related=[("/construction/concrete-slab", "Concrete slab"),
                 ("/construction/gravel-driveway", "Gravel driveway"),
                 ("/construction/cubic-yard", "Cubic yard")],
    ),

    S(
        slug="gravel",
        name="Gravel",
        title="Gravel Calculator: Yards and Tons for a Bed",
        desc="Work out the gravel a drive or bed needs in cubic yards, cubic feet and tons, from the area, the depth and the density of the gravel you are buying. All shown.",
        what=("<p>Gravel is ordered by the yard or the ton: <strong>volume = L × W × D ÷ 27</strong> in "
              "cubic yards, and <strong>tons = volume × 1.35</strong> for a typical 1½ in crushed "
              "gravel.</p>"),
        fields=[
            F("length", "Area length", "ft", 30, "Along the drive or bed"),
            F("width", "Area width", "ft", 10, "Across it"),
            F("depth", "Depth", "in", 4, "Four inches is a light drive, six a permanent one"),
            F("density", "Density", "tons/yd³", 1.35, "1.35 for crushed gravel, 1.5 for wet stone"),
            F("waste", "Over-order", "%", 10, "Compaction and an uneven subgrade"),
        ],
        results=[
            R("area", "Area", "ft²"),
            R("volume_yd3", "Gravel volume", "yd³"),
            R("tons", "Gravel weight", "tons"),
            R("volume_ft3", "Gravel volume", "ft³"),
        ],
        formula={
            "area": "length*width",
            "volume_yd3": "length*width*depth/12/27*(1+waste/100)",
            "tons": "length*width*depth/12/27*(1+waste/100)*density",
            "volume_ft3": "length*width*depth/12*(1+waste/100)",
            "length": "area/width",
            "width": "area/length",
            "depth": "volume_yd3*27*12/(length*width*(1+waste/100))",
            "density": "tons/(length*width*depth/12/27*(1+waste/100))",
            "waste": "(volume_yd3/(length*width*depth/12/27)-1)*100",
        },
        prose={
            "why": ("<p>Gravel is sold both ways — by the yard from a landscape yard and by the ton from "
                    "a quarry — and the density is what converts between them. A cubic yard of crushed "
                    "stone is a little over 1.3 tons, which is why a small trailer rarely carries a "
                    "full yard.</p>"),
            "formula_note": ("<p>Depth in inches over twelve gives feet, and the product over 27 gives "
                             "cubic yards. The density box is the only place the material matters, so "
                             "the same calculation serves gravel, crushed stone and sand.</p>"),
            "example_note": ("<p>A 30 × 10 ft drive at 4 in: 300 ft², 4.07 yd³ and 5.5 tons at 1.35 tons/yd³ with ten per cent over — two trips in most pickups, or one "
                             "small tipper.</p>"),
            "reading": ("<p>Check the depth against the use: four inches for a footpath or light drive, "
                        "six for cars, and eight to twelve for a heavy vehicle. Gravel at four inches "
                        "over soft ground will rut whatever the tonnage.</p>"),
            "scenarios": [
                {"inputs": {"length": 50, "width": 12, "depth": 6, "density": 1.4, "waste": 10},
                 "note": "A 50 × 12 drive six inches deep: 12.2 yd³ and 17.1 tons — a full delivery "
                         "truck."},
                {"inputs": {"length": 10, "width": 4, "depth": 3, "density": 1.35, "waste": 10},
                 "note": "A garden path: 0.41 yd³ and half a ton — a few trailer loads."},
            ],
            "pitfalls": [
                "<strong>Depth entered in feet.</strong> The formula divides by twelve, so 4 means four "
                "inches.",
                "<strong>Volume ordered without compaction.</strong> Gravel settles by ten to twenty per "
                "cent, which is what the over-order is for.",
                "<strong>Density borrowed from sand.</strong> Sand is about the same, but wet stone and "
                "slag are heavier.",
            ],
            "units_note": ("<p>Lengths in feet, depth in inches, volume in cubic feet and cubic yards, and "
                           "weight in short tons at the density you give. The over-order applies to both "
                           "volumes and the weight.</p>"),
            "limits": [
                "<strong>One layer.</strong> A drive with a base course and a surface course needs two "
                "calculations.",
                "<strong>No allowance for edging.</strong> Gravel migrates without an edge, which costs "
                "more than the stone.",
            ],
            "uses": [
                "<li>Ordering gravel for a drive.</li>",
                "<li>Converting a yard price to a ton price.</li>",
                "<li>Sizing a delivery.</li>",
            ],
        },
        faq=[
            ("How many tons in a cubic yard of gravel?",
             "About 1.35 for 1½ in crushed gravel, 1.4 to 1.5 for wet or denser stone."),
            ("How deep should a gravel drive be?",
             "Four inches for light use over a prepared base, six for cars, and more over soft ground "
             "with a geotextile underneath."),
        ],
        related=[("/construction/crushed-stone", "Crushed stone"),
                 ("/construction/gravel-driveway", "Gravel driveway"),
                 ("/construction/cubic-yard", "Cubic yard")],
    ),

    S(
        slug="crushed-stone",
        name="Crushed stone",
        title="Crushed Stone Calculator: Tons for a Base Course",
        desc="Size a crushed stone base course in tons and yards, with the compaction factor that turns loose stone into the finished layer the detail asks for. All shown.",
        what=("<p>A compacted base is thinner than the loose stone that makes it. For a finished depth "
              "<strong>d</strong>, the loose volume is <strong>d ÷ (1 − compaction)</strong> — typically "
              "20 to 25 per cent more stone goes in than the finished layer measures.</p>"),
        fields=[
            F("length", "Area length", "ft", 40, "Along the base"),
            F("width", "Area width", "ft", 12, "Across it"),
            F("depth", "Compacted depth", "in", 4, "The finished thickness"),
            F("compaction", "Compaction", "%", 20, "Twenty per cent is typical for crushed stone"),
            F("density", "Loose density", "tons/yd³", 1.4, "1.4 for ¾ in crushed stone"),
        ],
        results=[
            R("area", "Area", "ft²"),
            R("loose_volume", "Loose stone volume", "yd³"),
            R("compacted_volume", "Compacted volume", "yd³"),
            R("tons", "Stone to order", "tons"),
        ],
        formula={
            "area": "length*width",
            "loose_volume": "length*width*depth/12/27/(1-compaction/100)",
            "compacted_volume": "length*width*depth/12/27",
            "tons": "length*width*depth/12/27/(1-compaction/100)*density",
            "length": "area/width",
            "width": "area/length",
            "depth": "compacted_volume*27*12/(length*width)",
            "compaction": "(1-compacted_volume/loose_volume)*100",
            "density": "tons/loose_volume",
        },
        prose={
            "why": ("<p>A crushed stone base is what stops a driveway failing, and it is ordered by the "
                    "ton before it is compacted. The gap between loose and compacted volume is the "
                    "single number that makes a base course come out at the depth the detail asks "
                    "for.</p>"),
            "formula_note": ("<p>Dividing the finished volume by one minus the compaction fraction "
                             "gives the loose volume that will compact to it. Twenty per cent is a fair "
                             "figure for ¾ in crushed stone placed in two lifts and rolled.</p>"),
            "example_note": ("<p>A 40 × 12 ft drive with a four-inch compacted base: 480 ft², 5.9 yd³ "
                             "compacted, so 7.4 yd³ loose and 10.4 tons at 1.4 tons/yd³ — the base "
                             "costs as much stone as the surface course.</p>"),
            "reading": ("<p>Check the depth against the traffic: four inches compacted is a light "
                        "driveway, six for cars over soft subgrade, and eight to twelve for a road. "
                        "Compaction matters more than thickness past a point.</p>"),
            "scenarios": [
                {"inputs": {"length": 20, "width": 10, "depth": 4, "compaction": 25, "density": 1.45},
                 "note": "A small pad with a hard-compacting stone: 2.47 yd³ finished, 3.29 loose, 4.8 "
                         "tons."},
                {"inputs": {"length": 100, "width": 20, "depth": 6, "compaction": 20, "density": 1.4},
                 "note": "A long drive: 37 yd³ finished, 46 yd³ loose and 65 tons — four deliveries."},
            ],
            "pitfalls": [
                "<strong>Loose depth specified as finished depth.</strong> The base comes out 20 per "
                "cent thin and fails within a season.",
                "<strong>Compaction assumed for a single lift.</strong> Six inches compacted is placed "
                "in two lifts, and rolling each one is what delivers the number.",
                "<strong>Density of the finished layer used.</strong> The box wants the loose density "
                "you are ordering, not the compacted density.",
            ],
            "units_note": ("<p>Area in feet, depth in inches, volumes in cubic yards and weight in short "
                           "tons. The compaction percentage is a plain number applied to the volume "
                           "before the density.</p>"),
            "limits": [
                "<strong>One layer.</strong> A geotextile and a sub-base are separate items.",
                "<strong>Typical compaction only.</strong> The real figure depends on the stone's "
                "grading and the roller.",
            ],
            "uses": [
                "<li>Ordering a driveway base course.</li>",
                "<li>Checking a contractor's tonnage.</li>",
                "<li>Working out how much a lift will shrink.</li>",
            ],
        },
        faq=[
            ("How much does a yard of crushed stone weigh?",
             "About 1.4 tons loose for ¾ in stone, and 1.5 for larger or wetter stone."),
            ("How much does stone compact?",
             "Twenty to twenty-five per cent for a well-graded crushed stone placed and rolled in lifts."),
        ],
        related=[("/construction/gravel", "Gravel"),
                 ("/construction/road-base", "Road base"),
                 ("/construction/cubic-yard", "Cubic yard")],
    ),
]
