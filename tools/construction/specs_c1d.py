"""Batch 1d — sand, stone and decorative rock."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="sand",
        name="Sand",
        title="Sand Calculator: Cubic Yards, Tons and Bags",
        desc="Work out how much sand a bed or a mix needs, in cubic yards, cubic feet, tons and 60 lb bags, with the density and moisture allowance that matter on site.",
        what=("<p>Sand is bought by the yard, the ton or the bag. <strong>Volume = L × W × D ÷ 27</strong> "
              "cubic yards, <strong>tons = volume × 1.35</strong> dry, and a 60 lb bag holds 0.5 ft³.</p>"),
        fields=[
            F("length", "Area length", "ft", 10, "Along the bed or the slab"),
            F("width", "Area width", "ft", 10, "Across it"),
            F("depth", "Depth", "in", 2, "Two inches under pavers, six for a sandbox"),
            F("density", "Density", "tons/yd³", 1.35, "1.35 dry, 1.45 damp"),
            F("waste", "Over-order", "%", 10, "Settlement and spillage"),
        ],
        results=[
            R("volume_yd3", "Sand volume", "yd³"),
            R("volume_ft3", "Sand volume", "ft³"),
            R("tons", "Sand weight", "tons"),
            R("bags_60lb", "Bags of 60 lb", ""),
        ],
        formula={
            "volume_yd3": "length*width*depth/12/27*(1+waste/100)",
            "volume_ft3": "length*width*depth/12*(1+waste/100)",
            "tons": "length*width*depth/12/27*(1+waste/100)*density",
            "bags_60lb": "ceil(length*width*depth/12*(1+waste/100)/0.5-0.000000001)",
            "length": "volume_ft3*12/(width*depth*(1+waste/100))",
            "width": "volume_ft3*12/(length*depth*(1+waste/100))",
            "depth": "volume_ft3*12/(length*width*(1+waste/100))",
            "density": "tons/volume_yd3",
            "waste": "(volume_ft3/(length*width*depth/12)-1)*100",
        },
        prose={
            "why": ("<p>Sand turns up everywhere: under pavers, mixed into mortar, filling a sandbox and "
                    "bedding a pool. It weighs about 1.35 tons per loose yard dry, and noticeably more "
                    "when it is wet — which is why a delivery can weigh out over the ticket.</p>"),
            "formula_note": ("<p>The volume arithmetic is the same as any bed; the density box converts "
                             "to tons and the last result divides into 60 lb bags, each holding half a "
                             "cubic foot.</p>"),
            "example_note": ("<p>Ten by ten feet at two inches: 16.7 ft³ before waste — about 0.68 yd³ with ten per cent over — and 0.92 ton at 1.35. That is 37 bags of 60 lb, "
                             "which is why nobody buys a paver bed bagged.</p>"),
            "reading": ("<p>For a paver bed, one inch of sand is the target, not two; deeper beds settle "
                        "and the pavers move. For a sandbox, six inches over the whole area is the usual "
                        "playing depth.</p>"),
            "scenarios": [
                {"inputs": {"length": 20, "width": 20, "depth": 1, "density": 1.35, "waste": 5},
                 "note": "A paver bed an inch deep: 1.30 yd³ and 1.8 tons — a trailer load."},
                {"inputs": {"length": 6, "width": 6, "depth": 6, "density": 1.35, "waste": 10},
                 "note": "A sandbox: 0.73 yd³, 1.0 ton, 40 bags."},
            ],
            "pitfalls": [
                "<strong>Depth overdone under pavers.</strong> An inch is right; three inches of sand "
                "is a floating pavement.",
                "<strong>Wet sand weighed as dry.</strong> Damp sand runs 1.45 tons/yd³ and the "
                "supplier's ticket may show more tons for the same volume.",
                "<strong>Bags assumed to be a yard.</strong> A yard is 54 bags of 60 lb, not 27.",
            ],
            "units_note": ("<p>Dimensions in feet, depth in inches, volume in cubic feet and yards, "
                           "weight in short tons, and bags of 60 lb mix — a different yield from an 80 lb "
                           "bag.</p>"),
            "limits": [
                "<strong>One bed.</strong> Layered beds need each layer calculated.",
                "<strong>No compaction allowance.</strong> Sand under pavers is screeded, not compacted, "
                "so the over-order stays small.",
            ],
            "uses": [
                "<li>Ordering sand for a paver bed.</li>",
                "<li>Filling a sandbox.</li>",
                "<li>Converting a ton price into a yard price.</li>",
            ],
        },
        faq=[
            ("How much does a yard of sand weigh?",
             "About 1.35 short tons dry and 1.45 damp, which is 2 700 to 2 900 lb."),
            ("How deep should the sand be under pavers?",
             "One inch, screeded level over a compacted base. Deeper sand is a sign the base is out of "
             "level."),
        ],
        related=[("/construction/paver-sand", "Paver sand"),
                 ("/construction/gravel", "Gravel"),
                 ("/construction/concrete-slab", "Concrete slab")],
    ),

    S(
        slug="stone",
        name="Stone",
        title="Stone Calculator: Wall Stone by Volume and Weight",
        desc="Work out the stone a wall or a bed needs from its dimensions, in cubic yards, tons and the number of pickup loads it will take to move it all. All shown.",
        what=("<p>Stone for a wall or a bed is a volume: <strong>L × H × T ÷ 27</strong> cubic yards, "
              "times about 1.5 tons per yard for most building stone. A pickup bed holds about half a "
              "yard.</p>"),
        fields=[
            F("length", "Length", "ft", 20, "Wall or bed length"),
            F("height", "Height", "ft", 3, "Above and below grade if it is a wall"),
            F("thickness", "Thickness", "in", 12, "Wall thickness, or the bed's depth"),
            F("density", "Density", "tons/yd³", 1.5, "1.5 for most building stone"),
            F("waste", "Wastage", "%", 10, "Cutting and broken pieces"),
        ],
        results=[
            R("volume_yd3", "Stone volume", "yd³"),
            R("tons", "Stone weight", "tons"),
            R("truckloads", "Pickup loads (½ yd³ each)", ""),
        ],
        formula={
            "volume_yd3": "length*height*thickness/12/27*(1+waste/100)",
            "tons": "length*height*thickness/12/27*(1+waste/100)*density",
            "truckloads": "ceil(length*height*thickness/12/27*(1+waste/100)/0.5-0.000000001)",
            "length": "volume_yd3*27*12/(height*thickness*(1+waste/100))",
            "height": "volume_yd3*27*12/(length*thickness*(1+waste/100))",
            "thickness": "volume_yd3*27*12/(length*height*(1+waste/100))",
            "density": "tons/volume_yd3",
            "waste": "(volume_yd3/(length*height*thickness/12/27)-1)*100",
        },
        prose={
            "why": ("<p>Stone is heavier than most people expect: a cubic yard of it is a ton and a "
                    "half, and a half-ton pickup should carry less than half a yard. The truckload "
                    "count is often the most useful number on the page.</p>"),
            "formula_note": ("<p>The thickness box does double duty: a wall's thickness or a bed's "
                             "depth, both in inches. The density of 1.5 tons per yard suits granite, "
                             "limestone and most fieldstone.</p>"),
            "example_note": ("<p>A 20 ft wall 3 ft high and 12 in thick: 60 ft³ — 2.22 yd³, 2.44 with "
                             "waste — 3.7 tons, and five pickup loads. The loads decide whether to "
                             "hire a tipper.</p>"),
            "reading": ("<p>Read the loads against your vehicle: half a ton per trip is the safe figure "
                        "for a half-ton truck, and the page's ½ yd³ per load is already generous. A "
                        "stone wall also needs a batter and a footing, neither of which is in the "
                        "volume.</p>"),
            "scenarios": [
                {"inputs": {"length": 12, "height": 2, "thickness": 8, "density": 1.6, "waste": 15},
                 "note": "A 12 ft garden wall 2 ft high and 8 in thick: 0.68 yd³ and 1.1 tons at the heavier density."},
                {"inputs": {"length": 30, "height": 0.5, "thickness": 6, "density": 1.5, "waste": 10},
                 "note": "A 30 ft bed six inches deep: 0.31 yd³ and 0.46 tons — one trip in a pickup."},
            ],
            "pitfalls": [
                "<strong>Wall thickness read as face width.</strong> The 8 to 12 inches is how deep the "
                "wall is, not how long.",
                "<strong>Batter and footing ignored.</strong> A dry stone wall leans and sits on a "
                "footing, both of which use stone.",
                "<strong>A ton assumed to be a yard.</strong> Stone is 1.5 tons per yard, so a "
                "half-ton load is a third of a yard.",
            ],
            "units_note": ("<p>Length and height in feet, thickness in inches, volume in cubic yards and "
                           "weight in short tons. The truckload count uses half a cubic yard per load.</p>"),
            "limits": [
                "<strong>Solid volume.</strong> A dry stone wall is maybe 70 per cent stone by volume, "
                "the rest voids.",
                "<strong>One stone type.</strong> Bluestone and granite are heavier; sandstone lighter.",
            ],
            "uses": [
                "<li>Ordering stone for a garden wall.</li>",
                "<li>Sizing a pickup trip.</li>",
                "<li>Estimating a stone bed's depth.</li>",
            ],
        },
        faq=[
            ("How much does a yard of stone weigh?",
             "About 1.5 short tons for most building stone, and up to 1.7 for granite."),
            ("How much stone fits in a pickup?",
             "Half a cubic yard safely in a half-ton truck — three quarters of a ton, not the ton a "
             "yard weighs."),
        ],
        related=[("/construction/landscape-rock", "Landscape rock"),
                 ("/construction/rip-rap", "Rip rap"),
                 ("/construction/limestone", "Limestone")],
    ),

    S(
        slug="rock",
        name="Rock",
        title="Rock Calculator: Boulders by Size and Cover",
        desc="Work out how many boulders or how many tons of rock a bed needs, from the coverage area and the size of the stone you are actually buying for it. All shown.",
        what=("<p>Boulders are counted, decorative rock is weighed. For <strong>A</strong> square feet "
              "covered with stone of average diameter <strong>d</strong> inches, the count is about "
              "<strong>A ÷ (d/12)²</strong> at one stone per square of its own footprint.</p>"),
        fields=[
            F("area", "Coverage area", "ft²", 200, "The bed being covered"),
            F("stone_size", "Average stone size", "in", 12, "The dimension across the stone"),
            F("depth", "Depth", "in", 3, "Depth of the rock layer"),
            F("density", "Density", "tons/yd³", 1.5, "1.5 for most decorative rock"),
            F("waste", "Over-order", "%", 10, "Gaps and spillage"),
        ],
        results=[
            R("stones", "Stones to cover the area", ""),
            R("volume_yd3", "Rock volume", "yd³"),
            R("tons", "Rock weight", "tons"),
        ],
        formula={
            "stones": "ceil(area/pow(stone_size/12,2)-0.000000001)",
            "volume_yd3": "area*depth/12/27*(1+waste/100)",
            "tons": "area*depth/12/27*(1+waste/100)*density",
            "area": "stones*pow(stone_size/12,2)",
            "stone_size": "12*sqrt(area/stones)",
            "depth": "volume_yd3*27*12/(area*(1+waste/100))",
            "density": "tons/volume_yd3",
            "waste": "(volume_yd3/(area*depth/12/27)-1)*100",
        },
        prose={
            "why": ("<p>Rock beds are bought in two different ways depending on what the stone is for: "
                    "boulders and specimen stones are counted, while river rock and drain rock are "
                    "weighed. The page gives both, so a plan drawn in stones and a delivery note in tons "
                    "can be reconciled.</p>"),
            "formula_note": ("<p>The count assumes each stone covers a square of its own diameter, which "
                             "is a reasonable coverage estimate for rounded boulders set in a bed; for "
                             "tight stacking it over-counts, and for a scatter it under-counts.</p>"),
            "example_note": ("<p>200 ft² of bed with 12 in stones: 200 stones at one per square foot, "
                             "and 2.04 yd³ of 3 in rock — 3.1 tons — for the same area. The count and "
                             "the weight answer different questions.</p>"),
            "reading": ("<p>Read the count against the look you want: one stone per square foot is a "
                        "full bed, one per two square feet a scattered feature. The weight is what the "
                        "delivery will be.</p>"),
            "scenarios": [
                {"inputs": {"area": 400, "stone_size": 18, "depth": 4, "density": 1.5, "waste": 10},
                 "note": "Four hundred square feet of 18 in boulders: 178 stones, and 5.4 yd³ of "
                         "underlay at 9 tons."},
                {"inputs": {"area": 50, "stone_size": 6, "depth": 2, "density": 1.4, "waste": 5},
                 "note": "A small feature bed: 200 six-inch stones, 0.32 yd³ and 0.46 tons."},
            ],
            "pitfalls": [
                "<strong>Stone size read as the bed depth.</strong> The stone size is the size of the "
                "rock, the depth is how deep the layer is buried.",
                "<strong>Count used for rock sold by weight.</strong> Boulders are counted, drain rock "
                "is weighed; the two are not interchangeable.",
                "<strong>Waste left out of a loose bed.</strong> Rock beds settle and spill; ten per "
                "cent is normal.",
            ],
            "units_note": ("<p>Coverage in square feet, stone size and depth in inches. The count is "
                           "whole stones, the volume in cubic yards and the weight in short tons at the "
                           "density you give.</p>"),
            "limits": [
                "<strong>Uniform stones.</strong> A mixed load needs an average size that means "
                "something.",
                "<strong>Coverage only.</strong> Setting boulders in soil needs a base the page does not "
                "include.",
            ],
            "uses": [
                "<li>Ordering boulders for a bed.</li>",
                "<li>Working out drain rock by weight.</li>",
                "<li>Checking a landscape quote.</li>",
            ],
        },
        faq=[
            ("How many boulders do I need per square foot?",
             "One 12 in boulder covers roughly one square foot of bed; a 24 in boulder covers about "
             "four."),
            ("How big is a ton of rock?",
             "About two thirds of a cubic yard for typical decorative stone at 1.5 tons per yard."),
        ],
        related=[("/construction/stone", "Stone"),
                 ("/construction/river-rock", "River rock"),
                 ("/construction/landscape-rock", "Landscape rock")],
    ),

    S(
        slug="river-rock",
        name="River rock",
        title="River Rock Calculator: Yards for a Rock Bed",
        desc="Work out how much river rock a bed or border needs in cubic yards and tons, and how far a single ton will cover at the depth you want to lay it. All shown.",
        what=("<p>River rock is a rounded, dense stone: about <strong>1.3 tons per cubic yard</strong>. "
              "Coverage is <strong>area × depth ÷ 27</strong> in yards, and a ton covers about "
              "<strong>33 ft² at 3 inches</strong>.</p>"),
        fields=[
            F("length", "Bed length", "ft", 20, "Along the border"),
            F("width", "Bed width", "ft", 4, "Across it"),
            F("depth", "Depth", "in", 3, "Three inches hides the soil"),
            F("density", "Density", "tons/yd³", 1.3, "1.3 for rounded river rock"),
            F("waste", "Over-order", "%", 10, "Settlement and gaps"),
        ],
        results=[
            R("area", "Bed area", "ft²"),
            R("volume_yd3", "River rock volume", "yd³"),
            R("tons", "River rock weight", "tons"),
            R("coverage_per_ton", "Coverage per ton", "ft²"),
        ],
        formula={
            "area": "length*width",
            "volume_yd3": "length*width*depth/12/27*(1+waste/100)",
            "tons": "length*width*depth/12/27*(1+waste/100)*density",
            "coverage_per_ton": "27*12/(density*depth)",
            "length": "area/width",
            "width": "area/length",
            "depth": "volume_yd3*27*12/(length*width*(1+waste/100))",
            "density": "tons/volume_yd3",
            "waste": "(volume_yd3/(length*width*depth/12/27)-1)*100",
        },
        prose={
            "why": ("<p>River rock is the standard bed and border stone: rounded, comfortable to walk "
                    "on and heavy enough to stay put. Because it is rounded it packs with more void than "
                    "crushed stone, which is why the depth and the over-order both matter.</p>"),
            "formula_note": ("<p>The coverage-per-ton result is the inverse of the volume calculation at "
                             "the chosen depth: it says how many square feet one ton will cover, which "
                             "is how bags and small deliveries are sold.</p>"),
            "example_note": ("<p>A 20 × 4 ft border three inches deep: 80 ft², 0.81 yd³, 1.06 tons with ten per cent over. One ton covers about 83 ft² at that depth, so a ton "
                             "almost does the whole border.</p>"),
            "reading": ("<p>Three inches is enough to hide soil and hold weeds down; two inches is a "
                        "mulch layer and four is a walking surface. Round rock at two inches lets soil "
                        "show through within a season.</p>"),
            "scenarios": [
                {"inputs": {"length": 10, "width": 3, "depth": 2, "density": 1.3, "waste": 5},
                 "note": "A small bed at two inches: 0.19 yd³ and a quarter of a ton — four or five "
                         "bags."},
                {"inputs": {"length": 50, "width": 6, "depth": 4, "density": 1.35, "waste": 10},
                 "note": "A long border at four inches: 4.07 yd³ and 5.5 tons — a tipper, not a "
                         "trailer."},
            ],
            "pitfalls": [
                "<strong>Depth understated.</strong> Two inches of rounded rock does not hide soil; the "
                "job needs three.",
                "<strong>Density of crushed stone used.</strong> River rock is lighter, 1.3 against "
                "1.4 to 1.5.",
                "<strong>Bags priced as yards.</strong> A 0.5 ft³ bag is 54 to the yard, and bagged rock "
                "costs several times the bulk price.",
            ],
            "units_note": ("<p>Bed dimensions in feet, depth in inches, area in square feet, volume in "
                           "cubic yards and weight in short tons. Coverage per ton is in square feet at "
                           "the depth entered.</p>"),
            "limits": [
                "<strong>One size of rock.</strong> Mixed sizes pack differently and need their own "
                "density.",
                "<strong>No edging.</strong> Round rock rolls; without an edge it ends up on the lawn.",
            ],
            "uses": [
                "<li>Ordering rock for a border.</li>",
                "<li>Working out what a ton covers.</li>",
                "<li>Comparing bagged and bulk prices.</li>",
            ],
        },
        faq=[
            ("How many square feet does a ton of river rock cover?",
             "About 83 ft² at three inches deep, or 62 ft² at four inches."),
            ("How deep should river rock be?",
             "Three inches for weed suppression, four if it will be walked on."),
        ],
        related=[("/construction/rock", "Rock"),
                 ("/construction/pea-gravel", "Pea gravel"),
                 ("/construction/landscape-rock", "Landscape rock")],
    ),

    S(
        slug="pea-gravel",
        name="Pea gravel",
        title="Pea Gravel Calculator: Yards, Tons and Bags",
        desc="Work out the pea gravel a path or play area needs, with the depth that suits small rounded stone and the coverage a ton gives at that depth. All shown.",
        what=("<p>Pea gravel is small, rounded and light: about <strong>1.25 tons per cubic yard</strong>. "
              "Coverage is <strong>area × depth ÷ 27</strong>, and because the stone is small the depth "
              "has to be greater to stay put.</p>"),
        fields=[
            F("length", "Area length", "ft", 30, "Along the path"),
            F("width", "Area width", "ft", 3, "Across it"),
            F("depth", "Depth", "in", 2, "Two inches of pea gravel is a path surface"),
            F("density", "Density", "tons/yd³", 1.25, "1.25 for dry pea gravel"),
            F("waste", "Over-order", "%", 10, "Pea gravel migrates and settles"),
        ],
        results=[
            R("area", "Area", "ft²"),
            R("volume_yd3", "Pea gravel volume", "yd³"),
            R("tons", "Pea gravel weight", "tons"),
            R("bags_50lb", "Bags of 50 lb", ""),
        ],
        formula={
            "area": "length*width",
            "volume_yd3": "length*width*depth/12/27*(1+waste/100)",
            "tons": "length*width*depth/12/27*(1+waste/100)*density",
            "bags_50lb": "ceil(length*width*depth/12*(1+waste/100)/0.5-0.000000001)",
            "length": "area/width",
            "width": "area/length",
            "depth": "volume_yd3*27*12/(length*width*(1+waste/100))",
            "density": "tons/volume_yd3",
            "waste": "(volume_yd3/(length*width*depth/12/27)-1)*100",
        },
        prose={
            "why": ("<p>Pea gravel is the friendly stone — barefoot-safe in a play area, quiet underfoot "
                    "on a path, and easy to top up. It is also the stone that migrates most, which is why "
                    "the depth and the edging matter more than the tonnage.</p>"),
            "formula_note": ("<p>The arithmetic is the usual bed calculation with a lighter density. The "
                             "bag count uses 50 lb bags at 0.5 ft³, which is how hardware stores sell "
                             "it for small jobs.</p>"),
            "example_note": ("<p>A 30 × 3 ft path at two inches: 90 ft², 0.61 yd³ with ten per cent, and 0.76 tons — one delivery, or 33 bags if you are carrying it yourself.</p>"),
            "reading": ("<p>Two inches is a path surface over a compacted base; three inches is a play "
                        "area. Without edging, expect to lose a bag or two a year to the lawn.</p>"),
            "scenarios": [
                {"inputs": {"length": 12, "width": 12, "depth": 3, "density": 1.25, "waste": 10},
                 "note": "A play area: 1.47 yd³ and 1.83 tons at three inches — a tipper load."},
                {"inputs": {"length": 8, "width": 2, "depth": 2, "density": 1.25, "waste": 5},
                 "note": "A short path: 0.10 yd³, a quarter of a ton, 6 bags."},
            ],
            "pitfalls": [
                "<strong>Depth under two inches.</strong> Small rounded stone disappears into the base "
                "and the soil.",
                "<strong>No edging.</strong> Pea gravel rolls; a 4 in edge keeps it where it was put.",
                "<strong>Bags bought for a large area.</strong> At 0.5 ft³ a bag, a cubic yard is 54 "
                "bags — bulk is far cheaper past a few square metres.",
            ],
            "units_note": ("<p>Dimensions in feet, depth in inches, area in square feet, volume in cubic "
                           "yards and weight in short tons; bag counts assume 50 lb bags of half a cubic "
                           "foot.</p>"),
            "limits": [
                "<strong>Clean, dry stone.</strong> Wet pea gravel is heavier and clumps.",
                "<strong>A flat bed.</strong> Slopes need a binder or a different aggregate.",
            ],
            "uses": [
                "<li>Ordering stone for a path.</li>",
                "<li>Filling a play area to depth.</li>",
                "<li>Working out a bag count for a small job.</li>",
            ],
        },
        faq=[
            ("How deep should pea gravel be?",
             "Two inches for a path over a solid base, three to four for a play area."),
            ("How much does a yard of pea gravel weigh?",
             "About 1.25 short tons — 2 500 lb — which is lighter than most other gravels."),
        ],
        related=[("/construction/river-rock", "River rock"),
                 ("/construction/gravel", "Gravel"),
                 ("/construction/rock", "Rock")],
    ),

    S(
        slug="landscape-rock",
        name="Landscape rock",
        title="Landscape Rock Calculator: Depth, Yards and Cost",
        desc="Work out the landscape rock a bed needs at any depth, in cubic yards and tons, and what it costs at the price your own supplier quotes you. All shown.",
        what=("<p>Landscape rock is a bed calculation with a price on the end: "
              "<strong>volume = area × depth ÷ 27</strong>, <strong>tons = volume × density</strong>, and "
              "<strong>cost = tons × price</strong>.</p>"),
        fields=[
            F("area", "Bed area", "ft²", 300, "The bed to be covered"),
            F("depth", "Depth", "in", 3, "Three inches is the usual mulch-depth replacement"),
            F("density", "Density", "tons/yd³", 1.4, "1.4 for mixed landscape rock"),
            F("price", "Price", "$/ton", 55, "Delivered, or $/yd³ if your yard quotes that way"),
            F("waste", "Over-order", "%", 10, "Settlement and a ragged edge"),
        ],
        results=[
            R("volume_yd3", "Rock volume", "yd³"),
            R("tons", "Rock weight", "tons"),
            R("cost", "Rock cost", "$"),
            R("cost_per_ft2", "Cost per square foot", "$/ft²"),
        ],
        formula={
            "volume_yd3": "area*depth/12/27*(1+waste/100)",
            "tons": "area*depth/12/27*(1+waste/100)*density",
            "cost": "area*depth/12/27*(1+waste/100)*density*price",
            "cost_per_ft2": "area*depth/12/27*(1+waste/100)*density*price/area",
            "area": "volume_yd3*27*12/(depth*(1+waste/100))",
            "depth": "volume_yd3*27*12/(area*(1+waste/100))",
            "density": "tons/volume_yd3",
            "price": "cost/tons",
            "waste": "(volume_yd3/(area*depth/12/27)-1)*100",
        },
        prose={
            "why": ("<p>Replacing mulch with rock is a one-off purchase that lasts decades, and the price "
                    "per square foot is what makes the comparison honest. Rock costs more up front and "
                    "much less over ten years — which is the calculation this page supports.</p>"),
            "formula_note": ("<p>The volume and weight are the same bed calculation as elsewhere; the "
                             "cost multiplies tons by the delivered price, and the last result divides by "
                             "the area so a rock bed can be compared with mulch by the square foot.</p>"),
            "example_note": ("<p>Three hundred square feet at three inches with ten per cent over: 3.06 yd³ and 4.28 tons, which at $55 a ton is $235 — 78 cents per square foot, "
                             "against a few dollars for mulch that has to be replaced.</p>"),
            "reading": ("<p>Read the cost per square foot against the alternative: mulch runs $1 to $3 "
                        "per square foot installed every year or two, rock $1 to $3 once. The "
                        "break-even is usually in the second or third season.</p>"),
            "scenarios": [
                {"inputs": {"area": 150, "depth": 2, "density": 1.4, "price": 60, "waste": 5},
                 "note": "A small bed at two inches: 0.97 yd³, 1.36 tons and $82 — 54 cents a square foot."},
                {"inputs": {"area": 800, "depth": 4, "density": 1.5, "price": 50, "waste": 10},
                 "note": "A large bed at four inches: 10.9 yd³, 16.3 tons and $815 — $1.02 per square foot, with a delivery charge on top."},
            ],
            "pitfalls": [
                "<strong>Price per yard entered as per ton.</strong> A yard is 1.4 tons, so the two "
                "prices differ by forty per cent.",
                "<strong>Depth copied from a mulch spec.</strong> Rock needs less depth to look right "
                "but is far heavier.",
                "<strong>Delivery left out.</strong> Bulk rock delivery is a separate, significant "
                "line.",
            ],
            "units_note": ("<p>Area in square feet, depth in inches, volume in cubic yards, weight in "
                           "short tons and cost in dollars at the price per ton you enter.</p>"),
            "limits": [
                "<strong>One rock type.</strong> Mixed loads average out; a single dense stone changes "
                "the density.",
                "<strong>No weed fabric.</strong> A membrane under rock is a separate cost that pays "
                "for itself.",
            ],
            "uses": [
                "<li>Budgeting a rock bed.</li>",
                "<li>Comparing rock against mulch.</li>",
                "<li>Checking a landscape supplier's quote.</li>",
            ],
        },
        faq=[
            ("How deep should landscape rock be?",
             "Two to three inches for weed suppression and appearance, four if it will be walked on."),
            ("Is rock cheaper than mulch?",
             "Per square foot it costs more up front and much less over a decade, because it is not "
             "replaced every year."),
        ],
        related=[("/construction/rock", "Rock"),
                 ("/construction/river-rock", "River rock"),
                 ("/construction/stone", "Stone")],
    ),

    S(
        slug="limestone",
        name="Limestone",
        title="Limestone Calculator: Volume, Tons and Price",
        desc="Work out the limestone a drive, base or wall needs, in cubic yards and tons, at the density crushed limestone actually runs, with the cost added up. All shown.",
        what=("<p>Limestone is denser than most gravel: about <strong>1.5 tons per cubic yard</strong> "
              "when crushed. <strong>Volume = L × W × D ÷ 27</strong>, and the tonnage follows from the "
              "density box.</p>"),
        fields=[
            F("length", "Area length", "ft", 40, "Along the drive or base"),
            F("width", "Area width", "ft", 12, "Across it"),
            F("depth", "Depth", "in", 4, "Four inches for a compacted base"),
            F("density", "Density", "tons/yd³", 1.5, "1.5 crushed, 1.7 for solid blocks"),
            F("price", "Price", "$/ton", 45, "Delivered crushed limestone"),
        ],
        results=[
            R("volume_yd3", "Limestone volume", "yd³"),
            R("tons", "Limestone weight", "tons"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "volume_yd3": "length*width*depth/12/27",
            "tons": "length*width*depth/12/27*density",
            "cost": "length*width*depth/12/27*density*price",
            "length": "volume_yd3*27*12/(width*depth)",
            "width": "volume_yd3*27*12/(length*depth)",
            "depth": "volume_yd3*27*12/(length*width)",
            "density": "tons/volume_yd3",
            "price": "cost/tons",
        },
        prose={
            "why": ("<p>Crushed limestone is the go-to base and drive surface across much of the US: it "
                    "compacts well, binds with fines and drains reasonably. Being denser than gravel, the "
                    "same volume costs more in tons — and the ton is how it is priced.</p>"),
            "formula_note": ("<p>There is no waste box here because a limestone base is usually ordered "
                             "to a compacted depth, and the over-order is the difference between loose "
                             "and compacted — about a fifth. Add it to the depth instead, or add ten per "
                             "cent to the volume by hand.</p>"),
            "example_note": ("<p>A 40 × 12 ft drive at four inches: 480 ft², 5.9 yd³ and 8.9 tons at "
                             "1.5 tons a yard, which at $45 a ton is $400 — before compaction, so order "
                             "in the region of seven yards loose.</p>"),
            "reading": ("<p>Compare the tonnage with the depth: a four-inch compacted base needs about "
                        "20 per cent more loose stone, so the number to order is 7.4 yd³ and 11.1 tons. "
                        "The page gives the finished volume, which is what the detail specifies.</p>"),
            "scenarios": [
                {"inputs": {"length": 20, "width": 10, "depth": 6, "density": 1.5, "price": 45},
                 "note": "A small pad at six inches: 3.70 yd³, 5.6 tons and $250."},
                {"inputs": {"length": 100, "width": 3, "depth": 3, "density": 1.5, "price": 50},
                 "note": "A hundred-foot path: 2.78 yd³ and 4.2 tons — $208 of stone."},
            ],
            "pitfalls": [
                "<strong>Finished depth entered as loose.</strong> Limestone compacts by about a fifth; "
                "order the loose volume.",
                "<strong>Density of solid stone used.</strong> Crushed limestone is 1.5 tons/yd³; solid "
                "blocks are 1.7 and are sold differently.",
                "<strong>Price per yard compared with per ton.</strong> A yard is 1.5 tons, so a $45/ton "
                "price is $67.50 a yard.",
            ],
            "units_note": ("<p>Dimensions in feet, depth in inches, volume in cubic yards, weight in "
                           "short tons and cost in dollars at the price per ton.</p>"),
            "limits": [
                "<strong>Crushed limestone only.</strong> Block and flagstone are priced by area, not by "
                "ton.",
                "<strong>No compaction factor.</strong> Add it to the depth or the volume yourself.",
            ],
            "uses": [
                "<li>Ordering a limestone drive.</li>",
                "<li>Budgeting a base course.</li>",
                "<li>Converting a ton price to a yard price.</li>",
            ],
        },
        faq=[
            ("How much does a yard of crushed limestone weigh?",
             "About 1.5 short tons, which is heavier than gravel at 1.35."),
            ("Does limestone compact?",
             "Yes, by about a fifth, which is why a four-inch finished base is ordered as five inches "
             "loose."),
        ],
        related=[("/construction/crushed-stone", "Crushed stone"),
                 ("/construction/gravel", "Gravel"),
                 ("/construction/road-base", "Road base")],
    ),
]
