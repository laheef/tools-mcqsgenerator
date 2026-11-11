"""

Everyday-life batch G: the price per something, and things that have to fit.

Eight pages compare two buys on a common unit — ounce, pound, foot, square inch,
acre, round, weight, single unit — because the shelf label is never on the unit
you think in. Six pages size an object to a space: a bag to a bin, a cloth to a
table, a rug to a room, curtains and blinds to a window, a frame to a picture.

Nothing here needs a lookup table. Every answer is a division, an addition for
an allowance, or a perimeter, and the article says which.

"""

from __future__ import annotations

from lib import F, R, S, SEL

SPECS: list = []
# ---------------------------------------------------------- price per ounce

SPECS.append(S(
    slug="price-per-ounce",
    name="Price per Ounce Calculator",
    title="Price per Ounce — Which Pack Is Actually Cheaper",
    desc="Two packs, two prices, two weights: the price of an ounce of each and the gap "
         "between them, so the shelf comparison stops being a guess.",
    what="The price of one ounce of each of two packs, the difference per ounce, and the "
         "same two figures per pound, which is the unit most American labels use.",
    fields=[
        F("cost_a", "Pack A price", "$", 4.99),
        F("oz_a", "Pack A weight", "oz", 12),
        F("cost_b", "Pack B price", "$", 8.49),
        F("oz_b", "Pack B weight", "oz", 24,
          help="The net weight, not the gross. A box that weighs 26 ounces with 2 ounces of "
               "cardboard holds 24."),
    ],
    results=[
        R("unit_a", "Pack A, per ounce", "$/oz"),
        R("unit_b", "Pack B, per ounce", "$/oz"),
        R("diff", "B saves, per ounce", "$/oz"),
        R("pct", "B saves", "%"),
        R("pound_a", "Pack A, per pound", "$/lb"),
        R("pound_b", "Pack B, per pound", "$/lb"),
    ],
    formula={
        "unit_a": "cost_a / oz_a",
        "unit_b": "cost_b / oz_b",
        "diff": "cost_a / oz_a - cost_b / oz_b",
        "pct": "(cost_a / oz_a - cost_b / oz_b) / (cost_a / oz_a) * 100",
        "pound_a": "cost_a / oz_a * 16",
        "pound_b": "cost_b / oz_b * 16",
    },
    prose={
        "why": "<p>A shelf holds the same coffee in a twelve-ounce bag at 4.99 and a "
               "twenty-four-ounce bag at 8.49, and the big bag is not quite half the price "
               "of the small one per ounce. It is close, and close is where people buy the "
               "wrong side of the comparison and never find out.</p>"
               "<p>Divide price by ounces and the two packs sit on the same line. Four and a "
               "half cents a gram is a sentence that means something in a shop; \"the big one "
               "looks better value\" is a mood.</p>",
        "formula_note": "Price divided by net weight, twice. The difference is one taken from "
                        "the other, and the percentage is that difference over the dearer "
                        "pack's own unit price, so the answer reads as the share of the shelf "
                        "price you stop paying.",
        "reading": "Twelve ounces for 4.99 is 41.6 cents an ounce; twenty-four ounces for "
                   "8.49 is 35.4 cents, so the larger bag saves 6.2 cents an ounce, or "
                   "fourteen point nine per cent, and both figures multiply up to 6.65 and "
                   "5.66 a pound.",
        "example_note": "A negative difference means the second pack is dearer per ounce. "
                        "The page will not stop you putting the more expensive box in the B "
                        "slot, and the sign is how you notice.",
        "pitfalls": [
            "<strong>Comparing the shelf price.</strong> A bigger box costs more and is "
            "cheaper. The two facts are not in conflict, and only one of them is the one you "
            "are shopping for.",
            "<strong>Using the gross weight.</strong> The box, the tray and the plastic add "
            "ounces that nobody eats. The net weight is printed in small type beside the "
            "gross.",
        ],
        "limits": [
            "<li><strong>Packaging waste is not priced.</strong> A 24-ounce bag uses less "
            "plastic per ounce, and this page leaves that out because it is not on the "
            "price label.</li>",
        ],
        "uses": [
            "<li>Coffee, cereal and pasta, where the pack sizes switch between 12 and 24 "
            "ounces.</li>",
            "<li>Spices, where the small jar is almost never the cheap one per ounce.</li>",
        ],
        "scenarios": [
            {"inputs": {"cost_a": 3.99, "oz_a": 8, "cost_b": 8.49, "oz_b": 24},
             "note": "An eight-ounce bag at 3.99 is 49.9 cents an ounce, so the saving on the "
                     "large pack grows to 14.5 cents an ounce, or twenty-nine per cent."},
        ],
    },
    faq=[
        ("Which pack is cheaper per ounce when both prices end in .99?",
         "The one with the lower price divided by its ounces, which is rarely the one with "
         "the lower price. The trailing 99 is a pricing habit and carries no information "
         "about value."),
        ("Why show the price per pound as well?",
         "Because meat, cheese and dry goods in the United States are labelled per pound, "
         "and sixteen ounces make a pound. The two numbers are the same fact in the two "
         "units the shop uses."),
        ("Does the difference matter on small packs?",
         "On a six-dollar purchase the gap is often under fifty cents. Multiply by the "
         "number of packs bought in a year and the same gap turns into a monthly line."),
    ],
    related=[("/everyday-life/price-per-pound", "Price per pound"),
             ("/everyday-life/price-per-weight", "Price per weight"),
             ("/everyday-life/price-per-unit", "Price per unit")],
    checks=[
        ({"cost_a": 4.99, "oz_a": 12, "cost_b": 8.49, "oz_b": 24},
         {"unit_a": 0.4158, "unit_b": 0.3538, "diff": 0.0621, "pct": 14.93,
          "pound_a": 6.6533, "pound_b": 5.66}, 0.01),
        ({"cost_a": 3.99, "oz_a": 8, "cost_b": 8.49, "oz_b": 24},
         {"unit_a": 0.4988, "unit_b": 0.3538, "diff": 0.145, "pct": 29.07}, 0.01),
    ],
))

# ----------------------------------------------------------- price per pound

SPECS.append(S(
    slug="price-per-pound",
    name="Price per Pound Calculator",
    title="Price per Pound — Compare Two Weights Honestly",
    desc="One price, one weight, twice over: the cost of a pound of each and the gap between "
         "them, for meat, produce and anything sold loose.",
    what="The cost of a pound of each of two weighed items, the saving per pound, and the "
         "same figures per ounce, which is how small cuts are priced at a counter.",
    fields=[
        F("cost_a", "Item A price", "$", 5.49),
        F("lb_a", "Item A weight", "lb", 1.5),
        F("cost_b", "Item B price", "$", 12.99),
        F("lb_b", "Item B weight", "lb", 4),
    ],
    results=[
        R("unit_a", "Item A, per pound", "$/lb"),
        R("unit_b", "Item B, per pound", "$/lb"),
        R("diff", "B saves, per pound", "$/lb"),
        R("pct", "B saves", "%"),
        R("oz_a", "Item A, per ounce", "$/oz"),
        R("oz_b", "Item B, per ounce", "$/oz"),
    ],
    formula={
        "unit_a": "cost_a / lb_a",
        "unit_b": "cost_b / lb_b",
        "diff": "cost_a / lb_a - cost_b / lb_b",
        "pct": "(cost_a / lb_a - cost_b / lb_b) / (cost_a / lb_a) * 100",
        "oz_a": "cost_a / lb_a / 16",
        "oz_b": "cost_b / lb_b / 16",
    },
    prose={
        "why": "<p>Meat is sold in packs that are never the round number on the label: one "
               "pound and a half at 5.49 against four pounds at 12.99. The second costs more "
               "and the question is whether it costs more per pound.</p>"
               "<p>Two divisions settle it. 3.66 a pound against 3.25 is a saving of 41 "
               "cents a pound, and the pack that looked like the expensive one is the cheaper "
               "one on the only scale that compares.</p>",
        "formula_note": "Price over pounds for each item. The difference is A minus B, so a "
                        "positive answer means B is the cheaper buy; the percentage puts that "
                        "difference over A's own unit price. Ounces are the pound divided by "
                        "sixteen.",
        "reading": "1.5 pounds for 5.49 is 3.66 a pound; 4 pounds for 12.99 is 3.25, a saving "
                   "of 41 cents a pound or eleven point three per cent, which is 22.9 cents "
                   "an ounce against 20.3.",
        "example_note": "On a four-pound roast the eleven per cent is 1.65. That is the "
                        "number to weigh against the fuel and time of cooking a bigger joint.",
        "pitfalls": [
            "<strong>Reading the price per pound sticker as the price.</strong> A shelf tag "
            "showing 3.25 a pound on a four-pound pack means 12.99 at the till. The two "
            "numbers are different questions.",
            "<strong>Forgetting the bone.</strong> Two cuts with the same price per pound are "
            "not the same value if one is a third bone. Weigh the meat you will eat.",
        ],
        "limits": [
            "<li><strong>Weight, not yield.</strong> Cooking loses water, and a cheaper cut "
            "can lose more of it. The page compares what you buy, not what reaches the "
            "plate.</li>",
        ],
        "uses": [
            "<li>Comparing a family pack against a single pack.</li>",
            "<li>Deciding between two cuts at a butcher's counter.</li>",
        ],
        "scenarios": [
            {"inputs": {"cost_a": 5.49, "lb_a": 1.5, "cost_b": 12.99, "lb_b": 3},
             "note": "The same 12.99 on three pounds is 4.33 a pound, which flips the answer: "
                     "now the small pack is the cheaper buy."},
        ],
    },
    faq=[
        ("Why is the bigger pack not always cheaper per pound?",
         "Because shops price to what people will pay, not to weight. A four-pound pack can "
         "sit above a three-pound pack per pound when the four-pound size is the one that "
         "moves slowly."),
        ("Should I use cooked or raw weight?",
         "Raw, every time. Cooked weight depends on how long and how hot you cook, so it "
         "cannot be compared between two shops."),
        ("What is a normal saving from buying the larger pack?",
         "On meat and poultry it is often between ten and thirty per cent per pound. When it "
         "is under five, the bigger pack is mostly extra freezer space."),
    ],
    related=[("/everyday-life/price-per-ounce", "Price per ounce"),
             ("/everyday-life/price-per-weight", "Price per weight"),
             ("/everyday-life/price-per-unit", "Price per unit")],
    checks=[
        ({"cost_a": 5.49, "lb_a": 1.5, "cost_b": 12.99, "lb_b": 4},
         {"unit_a": 3.66, "unit_b": 3.2475, "diff": 0.4125, "pct": 11.27,
          "oz_a": 0.2288, "oz_b": 0.203}, 0.01),
        ({"cost_a": 5.49, "lb_a": 1.5, "cost_b": 12.99, "lb_b": 3},
         {"unit_a": 3.66, "unit_b": 4.33, "diff": -0.67, "pct": -18.31}, 0.01),
    ],
))

# ----------------------------------------------------- price per linear foot

SPECS.append(S(
    slug="price-per-linear-foot",
    name="Price per Linear Foot Calculator",
    title="Price per Linear Foot — Compare Timber and Trim",
    desc="Two lengths at two prices: the cost of a foot of each, what the difference comes to "
         "on the length you actually need, and which to order.",
    what="The price of one linear foot of each material and, more usefully, what a run of a "
         "given length costs in each, which is the number that goes into a quote.",
    fields=[
        F("len_a", "Material A length", "ft", 8),
        F("cost_a", "Material A price", "$", 24),
        F("len_b", "Material B length", "ft", 12),
        F("cost_b", "Material B price", "$", 34),
        F("run", "Length you need", "ft", 20),
    ],
    results=[
        R("unit_a", "Material A, per foot", "$/ft"),
        R("unit_b", "Material B, per foot", "$/ft"),
        R("diff", "B saves, per foot", "$/ft"),
        R("run_a", "A, for your run", "$"),
        R("run_b", "B, for your run", "$"),
        R("run_diff", "Saved on the run", "$"),
    ],
    formula={
        "unit_a": "cost_a / len_a",
        "unit_b": "cost_b / len_b",
        "diff": "cost_a / len_a - cost_b / len_b",
        "run_a": "cost_a / len_a * run",
        "run_b": "cost_b / len_b * run",
        "run_diff": "(cost_a / len_a - cost_b / len_b) * run",
    },
    prose={
        "why": "<p>Timber, skirting and trim are quoted by the length of the shortest piece "
               "the yard will sell you, and those lengths change with the profile. An "
               "eight-foot length at 24 and a twelve-foot length at 34 do not compare until "
               "both are turned into a price per foot.</p>"
               "<p>The second half of the page is the part worth using: type the run you "
               "need, twenty feet of skirting, and the two prices become 60 and 56.67. Now "
               "the choice is a number you can spend.</p>",
        "formula_note": "Price over length for the foot price. The run cost is that foot "
                        "price multiplied by the run, so the answer carries the same rounding "
                        "as the per-foot figure rather than a fresh division.",
        "reading": "Eight feet for 24 is 3.00 a foot; twelve feet for 34 is 2.83. On a "
                   "twenty-foot run that is 60 against 56.67, a saving of 3.33, and the "
                   "difference per foot is 16.7 cents.",
        "example_note": "The run cost assumes the lengths can be cut without waste. A run of "
                        "twenty feet from twelve-foot lengths leaves four feet, and that offcut "
                        "is the real difference between the two materials.",
        "pitfalls": [
            "<strong>Buying to the run exactly.</strong> Boards are cut square and joints "
            "eat an inch each. Order one length more than the arithmetic says, then work out "
            "whether it was needed.",
            "<strong>Comparing a short length with a long one as if the offcut is free.</strong> "
            "The offcut has the same price per foot as the board it came from. It is only "
            "free if you have a use for it.",
        ],
        "limits": [
            "<li><strong>Linear measure only.</strong> A wider board at the same price per "
            "foot is better value per square foot, and that is a different division. Use the "
            "price per square inch page for sheet goods.</li>",
        ],
        "uses": [
            "<li>Skirting, architrave and picture rail.</li>",
            "<li>Fencing rails and decking boards, where lengths of 8, 10 and 12 feet are "
            "stocked side by side.</li>",
        ],
        "scenarios": [
            {"inputs": {"len_a": 8, "cost_a": 24, "len_b": 12, "cost_b": 42, "run": 20},
             "note": "At 3.50 a foot the twelve-foot length is no longer the cheap one: the "
                     "run costs 70 against 60."},
        ],
    },
    faq=[
        ("What is a linear foot?",
         "Twelve inches along one edge, ignoring width and thickness. A 1 by 6 board and a "
         "1 by 12 board can both be sold by the linear foot at different prices."),
        ("Why is a twelve-foot length rarely twelve feet?",
         "Because it is planed. Dressed timber loses an eighth or a quarter of an inch on "
         "each face, and the stated length is nominal on some stock."),
        ("Should I price in the offcut?",
         "Only if you have a job for it. A run of twenty feet from twelve-foot boards leaves "
         "four feet of waste, which is a third of a board gone."),
    ],
    related=[("/everyday-life/price-per-square-inch", "Price per square inch"),
             ("/everyday-life/price-per-acre", "Price per acre"),
             ("/everyday-life/price-per-unit", "Price per unit")],
    checks=[
        ({"len_a": 8, "cost_a": 24, "len_b": 12, "cost_b": 34, "run": 20},
         {"unit_a": 3, "unit_b": 2.8333, "diff": 0.1667, "run_a": 60, "run_b": 56.6667,
          "run_diff": 3.3333}, 0.01),
        ({"len_a": 8, "cost_a": 24, "len_b": 12, "cost_b": 42, "run": 20},
         {"unit_a": 3, "unit_b": 3.5, "diff": -0.5, "run_a": 60, "run_b": 70,
          "run_diff": -10}, 0.01),
    ],
))

# ---------------------------------------------------- price per square inch

SPECS.append(S(
    slug="price-per-square-inch",
    name="Price per Square Inch Calculator",
    title="Price per Square Inch — Pizza, Panels and Sheets",
    desc="Two sizes at two prices, reduced to the price of one square inch and of one square "
         "foot, so a big baking tray and a small roasting tin can be compared fairly.",
    what="The price of a square inch of each of two rectangular things, the difference, and "
         "the price per square foot, which is how sheet goods are quoted.",
    fields=[
        F("cost_a", "Item A price", "$", 12),
        F("w_a", "Item A width", "in", 10),
        F("h_a", "Item A height", "in", 8),
        F("cost_b", "Item B price", "$", 18.5),
        F("w_b", "Item B width", "in", 12),
        F("h_b", "Item B height", "in", 10),
    ],
    results=[
        R("area_a", "Item A area", "sq in"),
        R("area_b", "Item B area", "sq in"),
        R("unit_a", "Item A, per square inch", "$/sq in"),
        R("unit_b", "Item B, per square inch", "$/sq in"),
        R("pct", "B saves", "%"),
        R("sqft_a", "Item A, per square foot", "$/sq ft"),
        R("sqft_b", "Item B, per square foot", "$/sq ft"),
    ],
    formula={
        "area_a": "w_a * h_a",
        "area_b": "w_b * h_b",
        "unit_a": "cost_a / (w_a * h_a)",
        "unit_b": "cost_b / (w_b * h_b)",
        "pct": "(cost_a / (w_a * h_a) - cost_b / (w_b * h_b)) / (cost_a / (w_a * h_a)) * 100",
        "sqft_a": "cost_a / (w_a * h_a) * 144",
        "sqft_b": "cost_b / (w_b * h_b) * 144",
    },
    prose={
        "why": "<p>A sixteen-inch pizza is not twice a twelve-inch pizza. Area goes as the "
               "square of the width, so sixteen inches is 201 square inches against 113, "
               "which is seventy-eight per cent more pizza for a price that is usually "
               "forty per cent higher.</p>"
               "<p>The same arithmetic prices sheet metal, acrylic, plywood and cake. Put the "
               "width and height of each into the boxes and the two prices land on one scale: "
               "cents per square inch, and dollars per square foot, which is how the trade "
               "quotes.</p>",
        "formula_note": "Width times height gives the area in square inches. Price over area "
                        "gives the unit price, and multiplying that by 144 converts square "
                        "inches to square feet without going back to the shop's numbers.",
        "reading": "Ten by eight is 80 square inches for 12, which is 15 cents a square inch "
                   "or 21.60 a square foot. Twelve by ten is 120 square inches for 18.50, "
                   "which is 15.4 cents, so the larger sheet is 2.8 per cent dearer per "
                   "square inch and 22.20 a square foot.",
        "example_note": "A negative percentage means B costs more per square inch. On sheet "
                        "goods that is often worth paying for, because cutting a bigger sheet "
                        "wastes less.",
        "pitfalls": [
            "<strong>Comparing the diagonal.</strong> A sixteen-inch round pan and a "
            "sixteen-inch square pan have the same stated size and different areas, because a "
            "circle is 79 per cent of its bounding square. This page multiplies width by "
            "height, so it is for rectangles.",
            "<strong>Ignoring the offcut.</strong> The price per square inch assumes every "
            "square inch gets used. A sheet cut for three parts leaves a skeleton of waste.",
        ],
        "limits": [
            "<li><strong>Rectangles only.</strong> A round pizza needs a different formula, "
            "which the pizza size page has. Here the boxes are width and height.</li>",
        ],
        "uses": [
            "<li>Pizza trays and baking tins.</li>",
            "<li>Sheet goods: acrylic, aluminium, plywood, foam board.</li>",
        ],
        "scenarios": [
            {"inputs": {"cost_a": 12, "w_a": 10, "h_a": 8, "cost_b": 22, "w_b": 12, "h_b": 10},
             "note": "At 22 the larger sheet is 18.3 cents a square inch against 15, so the "
                     "smaller one wins the comparison."},
        ],
    },
    faq=[
        ("Why does a sixteen-inch pizza cost so much less per inch than a twelve?",
         "Because the area grew faster than the price. Materials, labour and rent are roughly "
         "the same per pizza, so the larger one carries them across more square inches."),
        ("Is price per square inch ever the wrong measure?",
         "For anything sold by the piece where the piece is not a rectangle. For round things "
         "use the diameter; for irregular shapes use the weight."),
        ("How do I get from square inches to square feet?",
         "Divide by 144, or let the page do it: the last two results are the same prices in "
         "the unit the trade uses."),
    ],
    related=[("/everyday-life/price-per-linear-foot", "Price per linear foot"),
             ("/everyday-life/price-per-acre", "Price per acre"),
             ("/everyday-life/price-per-ounce", "Price per ounce")],
    checks=[
        ({"cost_a": 12, "w_a": 10, "h_a": 8, "cost_b": 18.5, "w_b": 12, "h_b": 10},
         {"area_a": 80, "area_b": 120, "unit_a": 0.15, "unit_b": 0.1542, "pct": -2.7778,
          "sqft_a": 21.6, "sqft_b": 22.2}, 0.01),
        ({"cost_a": 12, "w_a": 10, "h_a": 8, "cost_b": 22, "w_b": 12, "h_b": 10},
         {"unit_a": 0.15, "unit_b": 0.1833, "pct": -22.22, "sqft_b": 26.4}, 0.01),
    ],
))

# --------------------------------------------------------- price per acre

SPECS.append(S(
    slug="price-per-acre",
    name="Price per Acre Calculator",
    title="Price per Acre — Two Parcels Side by Side",
    desc="Two parcels, two prices: what an acre of each costs, the gap between them, and the "
         "same figures per square foot for the small plot.",
    what="The price of an acre of each of two parcels, the difference per acre, and the "
         "price per square foot, which is the unit small plots and building lots use.",
    fields=[
        F("cost_a", "Parcel A price", "$", 210000),
        F("acres_a", "Parcel A size", "acres", 35),
        F("cost_b", "Parcel B price", "$", 172000),
        F("acres_b", "Parcel B size", "acres", 28),
    ],
    results=[
        R("unit_a", "Parcel A, per acre", "$/acre"),
        R("unit_b", "Parcel B, per acre", "$/acre"),
        R("diff", "B saves, per acre", "$/acre"),
        R("pct", "B saves", "%"),
        R("sqft_a", "Parcel A, per square foot", "$/sq ft"),
        R("sqft_b", "Parcel B, per square foot", "$/sq ft"),
    ],
    formula={
        "unit_a": "cost_a / acres_a",
        "unit_b": "cost_b / acres_b",
        "diff": "cost_a / acres_a - cost_b / acres_b",
        "pct": "(cost_a / acres_a - cost_b / acres_b) / (cost_a / acres_a) * 100",
        "sqft_a": "cost_a / acres_a / 43560",
        "sqft_b": "cost_b / acres_b / 43560",
    },
    prose={
        "why": "<p>Land is advertised by the acre and priced by the parcel, and the two "
               "figures come from different people. Thirty-five acres at 210 000 is 6 000 an "
               "acre; twenty-eight acres at 172 000 is 6 143, so the smaller parcel is the "
               "dearer one by 143 an acre.</p>"
               "<p>Per square foot the numbers turn small and stop being intuitive, which is "
               "why they matter: 13.8 cents a square foot is a sentence a builder can use, "
               "and 6 000 an acre is not.</p>",
        "formula_note": "Price over acres for the acre price. The square-foot figure is that "
                        "price divided by 43 560, the number of square feet in an acre — an "
                        "acre is a chain by a furlong, 66 by 660 feet.",
        "reading": "35 acres at 210 000 is 6 000 an acre and 13.8 cents a square foot; 28 "
                   "acres at 172 000 is 6 142.86 an acre and 14.1 cents, so B is 2.4 per cent "
                   "dearer per acre.",
        "example_note": "Negative percentages mean the second parcel costs more. On land the "
                        "reason is usually access, drainage or a boundary that is not where "
                        "the map says.",
        "pitfalls": [
            "<strong>Buying the acre count instead of the usable acre.</strong> A forty-acre "
            "parcel crossed by a stream can have thirty dry acres. Compare the price per "
            "usable acre if you know them.",
            "<strong>Mixing acres with hectares.</strong> A hectare is 2.471 acres, so a "
            "price per hectare looks 2.5 times a price per acre for the same land. Check "
            "which unit the agent quoted.",
        ],
        "limits": [
            "<li><strong>Price only.</strong> Survey, tax, fencing and access costs are "
            "separate, and on small parcels they can be a quarter of the total.</li>",
        ],
        "uses": [
            "<li>Comparing two listings before a viewing.</li>",
            "<li>Checking an agent's arithmetic on a price per acre.</li>",
        ],
        "scenarios": [
            {"inputs": {"cost_a": 210000, "acres_a": 35, "cost_b": 172000, "acres_b": 24},
             "note": "Twenty-four acres at 172 000 is 7 166.67 an acre, so the parcel that "
                     "looked cheaper is nineteen per cent dearer on the acre."},
        ],
    },
    faq=[
        ("How many square feet are in an acre?",
         "43 560. The old definition is 66 by 660 feet, one chain by one furlong, and it "
         "survives because deeds still use it."),
        ("Why is the price per acre lower on bigger parcels?",
         "Because the buyer who can spend seven figures on land is rarer than the one who "
         "can spend six. Size discounts of twenty to forty per cent between a five-acre and "
         "a fifty-acre parcel are ordinary."),
        ("Does the shape of the parcel matter?",
         "To the price per acre it does not, and to the use it does. A long thin strip is "
         "worth less than a square with the same area because it costs more to fence and "
         "road."),
    ],
    related=[("/everyday-life/price-per-square-inch", "Price per square inch"),
             ("/everyday-life/price-per-linear-foot", "Price per linear foot"),
             ("/everyday-life/rug-size", "Rug size")],
    checks=[
        ({"cost_a": 210000, "acres_a": 35, "cost_b": 172000, "acres_b": 28},
         {"unit_a": 6000, "unit_b": 6142.8571, "diff": -142.8571, "pct": -2.381,
          "sqft_a": 0.1377, "sqft_b": 0.141}, 0.01),
        ({"cost_a": 210000, "acres_a": 35, "cost_b": 172000, "acres_b": 24},
         {"unit_a": 6000, "unit_b": 7166.6667, "diff": -1166.6667, "pct": -19.4444}, 0.01),
    ],
))
# --------------------------------------------------------- price per round

SPECS.append(S(
    slug="price-per-round",
    name="Price per Round Calculator",
    title="Price per Round — Ammunition Cost That Adds Up",
    desc="Two boxes, two counts: the cost of a single round in dollars and in cents, the saving "
         "per round, and what a whole two-hundred-round range session costs.",
    what="The price of one round from each of two boxes, the saving per round, and what a "
         "session of a given size costs in each, because a cent a round is real money at 200.",
    fields=[
        F("rounds_a", "Box A rounds", "rounds", 50),
        F("cost_a", "Box A price", "$", 24.99),
        F("rounds_b", "Box B rounds", "rounds", 200),
        F("cost_b", "Box B price", "$", 89.99),
        F("session", "Rounds in a session", "rounds", 200),
    ],
    results=[
        R("unit_a", "Box A, per round", "$"),
        R("unit_b", "Box B, per round", "$"),
        R("cents_a", "Box A, cents a round", "¢"),
        R("cents_b", "Box B, cents a round", "¢"),
        R("diff", "B saves, per round", "$"),
        R("session_a", "A, for your session", "$"),
        R("session_b", "B, for your session", "$"),
    ],
    formula={
        "unit_a": "cost_a / rounds_a",
        "unit_b": "cost_b / rounds_b",
        "cents_a": "cost_a / rounds_a * 100",
        "cents_b": "cost_b / rounds_b * 100",
        "diff": "cost_a / rounds_a - cost_b / rounds_b",
        "session_a": "cost_a / rounds_a * session",
        "session_b": "cost_b / rounds_b * session",
    },
    prose={
        "why": "<p>Ammunition is priced per box and shot by the round, and the box counts "
               "shift with the cartridge: fifty, a hundred, two hundred. A box at 24.99 looks "
               "dearer than one at 89.99 until both are divided by their counts.</p>"
               "<p>Fifty rounds for 24.99 is 49.98 cents a round; two hundred for 89.99 is "
               "45.00. Four cents is nothing in a shop and 10 in a two-hundred-round session, "
               "which is the number to take to the counter.</p>",
        "formula_note": "Price over rounds gives dollars per round; multiplying by a hundred "
                        "gives cents, which is the figure shooters quote. The session costs "
                        "are the per-round price multiplied out, so they inherit its "
                        "rounding.",
        "reading": "50 rounds at 24.99 is 49.98 cents; 200 at 89.99 is 45.00 cents, a saving "
                   "of 4.99 cents a round, or 9.97 in a 200-round session: 99.96 against "
                   "89.99.",
        "example_note": "The larger box is not automatically the cheaper one. Bulk packs "
                        "sometimes carry a handling premium, and a negative difference here "
                        "is your cue to buy two small boxes.",
        "pitfalls": [
            "<strong>Comparing a box of fifty with a box of twenty.</strong> The smaller box "
            "is often a premium load sold for hunting, where the same cartridge in a bulk "
            "pack is plinking ammunition. Check the load, not only the count.",
            "<strong>Forgetting tax and shipping.</strong> Two boxes from different sellers "
            "are not comparable once one adds a shipping charge and the other does not.",
        ],
        "limits": [
            "<li><strong>Ammunition only, and only the sticker price.</strong> Reloading "
            "costs depend on powder and primers and are a different sum.</li>",
        ],
        "uses": [
            "<li>Deciding between a fifty-round box and a bulk pack.</li>",
            "<li>Working out what a range trip costs before you go.</li>",
        ],
        "scenarios": [
            {"inputs": {"rounds_a": 20, "cost_a": 12.99, "rounds_b": 200, "cost_b": 89.99,
                        "session": 200},
             "note": "A twenty-round box at 12.99 is 64.95 cents a round, so the bulk pack "
                     "saves 19.96 cents and 39.93 across a session."},
        ],
    },
    faq=[
        ("Why quote cents rather than dollars per round?",
         "Because dollars per round arrives as 0.45 or 0.4499, and a trailing decimal hides "
         "the difference that matters. Cents per round is how the price is discussed and how "
         "the saving is noticed."),
        ("Is the cheapest round per round the right buy?",
         "For practice, usually. For anything where the load matters — hunting, a "
         "semi-automatic that is fussy about pressure — the cheaper round can cost more in "
         "functioning."),
        ("Does the box size change the price per round much?",
         "Between a fifty and a two-hundred box it is often five to fifteen per cent. Below "
         "fifty rounds the premium is steeper, because the packaging is a larger share of "
         "the cost."),
    ],
    related=[("/everyday-life/price-per-unit", "Price per unit"),
             ("/everyday-life/price-per-ounce", "Price per ounce"),
             ("/everyday-life/price-per-weight", "Price per weight")],
    checks=[
        ({"rounds_a": 50, "cost_a": 24.99, "rounds_b": 200, "cost_b": 89.99, "session": 200},
         {"unit_a": 0.4998, "unit_b": 0.44995, "cents_a": 49.98, "cents_b": 44.995,
          "diff": 0.04985, "session_a": 99.96, "session_b": 89.99}, 0.01),
        ({"rounds_a": 20, "cost_a": 12.99, "rounds_b": 200, "cost_b": 89.99, "session": 200},
         {"unit_a": 0.6495, "cents_a": 64.95, "diff": 0.19955, "session_a": 129.9}, 0.01),
    ],
))

# -------------------------------------------------------- price per weight

SPECS.append(S(
    slug="price-per-weight",
    name="Price per Weight Calculator",
    title="Price per Weight — Grams, Kilos and the Real Deal",
    desc="Two packs weighed in grams or kilos: the cost of a gram, a hundred grams and a "
         "kilo of each, so metric shelf labels finally compare.",
    what="The cost of one gram, one hundred grams and one kilogram of each of two packs, "
         "plus the percentage the second saves, all from the two weights on the labels.",
    fields=[
        F("cost_a", "Pack A price", "$", 3.29),
        F("g_a", "Pack A weight", "g", 250),
        F("cost_b", "Pack B price", "$", 5.49),
        F("g_b", "Pack B weight", "g", 500),
    ],
    results=[
        R("per_g_a", "Pack A, per gram", "$/g"),
        R("per_g_b", "Pack B, per gram", "$/g"),
        R("per_100_a", "Pack A, per 100 g", "$"),
        R("per_100_b", "Pack B, per 100 g", "$"),
        R("per_kg_a", "Pack A, per kilo", "$/kg"),
        R("per_kg_b", "Pack B, per kilo", "$/kg"),
        R("pct", "B saves", "%"),
    ],
    formula={
        "per_g_a": "cost_a / g_a",
        "per_g_b": "cost_b / g_b",
        "per_100_a": "cost_a / g_a * 100",
        "per_100_b": "cost_b / g_b * 100",
        "per_kg_a": "cost_a / g_a * 1000",
        "per_kg_b": "cost_b / g_b * 1000",
        "pct": "(cost_a / g_a - cost_b / g_b) / (cost_a / g_a) * 100",
    },
    prose={
        "why": "<p>Metric labels put the weight in grams and the price in dollars, and the "
               "two do not meet anywhere convenient. A 250-gram pack at 3.29 against a "
               "500-gram pack at 5.49 is a comparison nobody does in their head at a shelf.</p>"
               "<p>Per hundred grams is the number most European shops print, and it is the "
               "right one: 1.32 against 1.10, so the larger pack saves sixteen and a half per "
               "cent. Per kilo is the same fact for a bulk buyer.</p>",
        "formula_note": "Price over grams, then multiplied by 100 and by 1 000. Multiplying "
                        "the unit price rather than dividing the price again keeps the three "
                        "figures consistent with each other to the last digit.",
        "reading": "250 grams at 3.29 is 1.32 per 100 grams and 13.16 a kilo; 500 grams at "
                   "5.49 is 1.10 per 100 grams and 10.98 a kilo, so B is 16.6 per cent "
                   "cheaper by weight.",
        "example_note": "A percentage under five on a staple you buy weekly still adds up "
                        "over a year. Above twenty, the cheap option is usually a different "
                        "product in the same kind of bag.",
        "pitfalls": [
            "<strong>Mixing grams with ounces.</strong> An ounce is 28.35 grams, so a "
            "sixteen-ounce pack is 454 grams and not 16. Convert before comparing.",
            "<strong>Trusting the pack size in the name.</strong> A \"family pack\" can hold "
            "less than two standard packs. The grams on the front are the fact; the words are "
            "marketing.",
        ],
        "limits": [
            "<li><strong>Net weight only.</strong> A pack with a lot of packaging weighs more "
            "than it contains, and only the net figure is used here.</li>",
        ],
        "uses": [
            "<li>Comparing two sizes of the same staple on a metric label.</li>",
            "<li>Checking a bulk bag against the standard pack before ordering online.</li>",
        ],
        "scenarios": [
            {"inputs": {"cost_a": 3.29, "g_a": 250, "cost_b": 6.99, "g_b": 500},
             "note": "At 6.99 the larger pack is 1.40 per 100 grams against 1.32, so the "
                     "small pack is the cheaper one and the percentage turns negative."},
        ],
    },
    faq=[
        ("Why show per hundred grams rather than per gram?",
         "Because per gram is a number with three zeros in front of it — 0.0132 — and nobody "
         "compares those. Per hundred grams lands on a scale that a shelf label can print."),
        ("Is per kilo the same as per 100 grams times ten?",
         "Exactly the same, and the page computes it that way, so the two lines can never "
         "disagree."),
        ("What if the packs are in ounces?",
         "Multiply ounces by 28.35 to get grams, or use the price per ounce page, which does "
         "the same division in the imperial unit."),
    ],
    related=[("/everyday-life/price-per-ounce", "Price per ounce"),
             ("/everyday-life/price-per-pound", "Price per pound"),
             ("/everyday-life/price-per-unit", "Price per unit")],
    checks=[
        ({"cost_a": 3.29, "g_a": 250, "cost_b": 5.49, "g_b": 500},
         {"per_g_a": 0.01316, "per_g_b": 0.01098, "per_100_a": 1.316, "per_100_b": 1.098,
          "per_kg_a": 13.16, "per_kg_b": 10.98, "pct": 16.565}, 0.01),
        ({"cost_a": 3.29, "g_a": 250, "cost_b": 6.99, "g_b": 500},
         {"per_100_a": 1.316, "per_100_b": 1.398, "pct": -6.231}, 0.01),
    ],
))

# ---------------------------------------------------------- price per unit

SPECS.append(S(
    slug="price-per-unit",
    name="Price per Unit Calculator",
    title="Price per Unit — Three Packs, One Winner",
    desc="Three packs, three prices and three counts: the cost of a single unit in each, the "
         "cheapest of the three, and how wide the spread runs.",
    what="The cost of one item in each of three multibuys, which of the three is cheapest per "
         "unit, and the gap between the best and the worst, which is the money a bad choice "
         "costs.",
    fields=[
        F("cost_a", "Pack A price", "$", 4.99),
        F("qty_a", "Pack A count", "items", 6),
        F("cost_b", "Pack B price", "$", 8.99),
        F("qty_b", "Pack B count", "items", 12),
        F("cost_c", "Pack C price", "$", 15.99),
        F("qty_c", "Pack C count", "items", 24),
    ],
    results=[
        R("unit_a", "Pack A, per item", "$"),
        R("unit_b", "Pack B, per item", "$"),
        R("unit_c", "Pack C, per item", "$"),
        R("best", "Cheapest per item", "$"),
        R("spread", "Dearest minus cheapest", "$"),
        R("spread_pct", "Spread", "%"),
    ],
    formula={
        "unit_a": "cost_a / qty_a",
        "unit_b": "cost_b / qty_b",
        "unit_c": "cost_c / qty_c",
        "best": "min(cost_a / qty_a, cost_b / qty_b, cost_c / qty_c)",
        "spread": "max(cost_a / qty_a, cost_b / qty_b, cost_c / qty_c) - "
                  "min(cost_a / qty_a, cost_b / qty_b, cost_c / qty_c)",
        "spread_pct": "(max(cost_a / qty_a, cost_b / qty_b, cost_c / qty_c) - "
                      "min(cost_a / qty_a, cost_b / qty_b, cost_c / qty_c)) / "
                      "max(cost_a / qty_a, cost_b / qty_b, cost_c / qty_c) * 100",
    },
    prose={
        "why": "<p>Supermarkets price the same item at 4.99 for six, 8.99 for twelve and 15.99 "
               "for twenty-four, and the middle size is often the worst value. That is not an "
               "accident: it is the size the shopper reaches for without doing the division.</p>"
               "<p>Three divisions put the packs in order — 0.832, 0.749, 0.666 — and the gap "
               "between best and worst is 0.166 an item, twenty per cent. On a weekly shop "
               "that is the difference between the sizes you think you are choosing between.</p>",
        "formula_note": "Each pack's price over its count. The best line is the smallest of "
                        "the three and the spread is the largest minus the smallest, so the "
                        "answer is the penalty for picking the wrong pack rather than a "
                        "comparison against an average.",
        "reading": "Six for 4.99 is 83.2 cents an item, twelve for 8.99 is 74.9 and "
                   "twenty-four for 15.99 is 66.6. The spread is 16.5 cents an item, twenty "
                   "per cent of the dearest pack.",
        "example_note": "The count must be the count you use. Twenty-four bars at 15.99 is a "
                        "good price per bar and a bad price if twelve of them go stale.",
        "pitfalls": [
            "<strong>Comparing multipacks of different products.</strong> Six smaller bars "
            "and twenty-four larger ones are two different products, and the per-item figure "
            "is meaningless across them. Compare grams with the weight page.",
            "<strong>Assumed monotony.</strong> Bulk sizes can be worse value than the "
            "middle one when a promotion runs on the middle one. The page will tell you, "
            "provided you enter the promoted price.",
        ],
        "limits": [
            "<li><strong>Three packs.</strong> A fourth size needs a second run with the "
            "worst of the three replaced.</li>",
        ],
        "uses": [
            "<li>Choosing between three sizes of the same household staple.</li>",
            "<li>Checking whether a bulk pack is a discount or a mirage.</li>",
        ],
        "scenarios": [
            {"inputs": {"cost_a": 4.99, "qty_a": 6, "cost_b": 7.99, "qty_b": 12,
                        "cost_c": 15.99, "qty_c": 24},
             "note": "With the middle pack on promotion at 7.99 the best price drops to 66.6 "
                     "cents an item, a shade under the bulk pack, and the spread stays at "
                     "16.6 cents."},
        ],
    },
    faq=[
        ("Is the largest pack always the cheapest per unit?",
         "No. It is cheaper most of the time on staples, and it is beaten often enough — by "
         "promotions, by pack sizes that are not proportional — that the division is worth "
         "twenty seconds."),
        ("What if the packs hold different weights?",
         "Then items per pack is the wrong count. Enter the grams as the count, or use the "
         "price per weight page, which compares the actual quantity."),
        ("Does the spread percentage mean anything?",
         "It is the share of the dearest price you stop paying by buying the cheapest. On "
         "cleaning products and pet food it runs from ten to forty per cent, which is worth "
         "knowing before you fill a cupboard."),
    ],
    related=[("/everyday-life/price-per-ounce", "Price per ounce"),
             ("/everyday-life/price-per-weight", "Price per weight"),
             ("/everyday-life/price-per-round", "Price per round")],
    checks=[
        ({"cost_a": 4.99, "qty_a": 6, "cost_b": 8.99, "qty_b": 12, "cost_c": 15.99, "qty_c": 24},
         {"unit_a": 0.8317, "unit_b": 0.7492, "unit_c": 0.6663, "best": 0.6663,
          "spread": 0.1654, "spread_pct": 19.89}, 0.01),
        ({"cost_a": 4.99, "qty_a": 6, "cost_b": 7.99, "qty_b": 12, "cost_c": 15.99, "qty_c": 24},
         {"unit_a": 0.8317, "unit_b": 0.6658, "best": 0.6658, "spread": 0.1658}, 0.01),
    ],
))
# -------------------------------------------------------- garbage bag size

SPECS.append(S(
    slug="garbage-bag-size",
    name="Garbage Bag Size Calculator",
    title="Garbage Bag Size — Width, Height and Gallons",
    desc="The bag a bin actually needs: flat width from the rim's perimeter, height with the "
         "overhang, and the capacity of the bin in gallons.",
    what="The flat width and length of bag that fits a bin, with the overhang used to hold it "
         "in place, plus how many gallons the bin holds, for round and rectangular bins.",
    fields=[
        SEL("shape", "Bin shape",
            [("Round bin", 1), ("Rectangular bin", 0)], 1),
        F("diameter", "Round bin diameter", "in", 18),
        F("length", "Rectangular bin length", "in", 20),
        F("width", "Rectangular bin width", "in", 14),
        F("height", "Bin height", "in", 24),
        F("overhang", "Overhang over the rim", "in", 6,
          help="The bag has to fold over the rim. Three inches holds on a light load, six on "
               "anything heavy."),
    ],
    results=[
        R("bag_width", "Bag flat width", "in"),
        R("bag_height", "Bag length", "in"),
        R("capacity", "Bin capacity", "gallons"),
        R("perimeter", "Rim perimeter", "in"),
    ],
    formula={
        "bag_width": "if_else(shape > 0.5, pi * diameter / 2 + overhang, "
                     "length + width + overhang)",
        "bag_height": "height + overhang",
        "capacity": "if_else(shape > 0.5, pi * (diameter / 2) * (diameter / 2) * height / 231, "
                    "length * width * height / 231)",
        "perimeter": "if_else(shape > 0.5, pi * diameter, 2 * (length + width))",
    },
    prose={
        "why": "<p>A bin liner is sold flat, as a width and a length, and the bin is round or "
               "rectangular. The bag has to do two things at once: go round the rim and go "
               "down to the bottom, with enough left over to fold back.</p>"
               "<p>The width is half the rim's perimeter plus the overhang, because the bag "
               "is folded flat and each side of the fold covers half the rim. An 18-inch bin "
               "has a perimeter of 56.5 inches, so the bag is 28.3 wide before the fold-over "
               "and 34.3 with it.</p>",
        "formula_note": "For a round bin the perimeter is pi times the diameter and the flat "
                        "width is half of that. For a rectangular bin the perimeter is twice "
                        "length plus twice width, and half of it is length plus width. The "
                        "length is the bin height plus the overhang, and capacity is the "
                        "volume over 231 cubic inches, which is a US gallon.",
        "reading": "An 18-inch round bin 24 inches tall has a 56.5-inch rim, so the bag is "
                   "34.3 inches wide with a 6-inch overhang and 30 inches long, and the bin "
                   "holds 26.4 gallons.",
        "example_note": "A rectangular bin 20 by 14 by 24 inches takes a 40-inch bag, which is "
                    "wider than the round one despite the smaller volume, because a rectangle "
                    "has a longer rim than the circle that encloses it.",
        "pitfalls": [
            "<strong>Buying by gallon capacity alone.</strong> A 30-gallon bag is a volume, "
            "not a shape. A tall narrow bin and a short wide one can hold the same 30 gallons "
            "and need different bags.",
            "<strong>Under-buying the length.</strong> A bag that fits the rim and not the "
            "bottom slides in. Length is height plus overhang, and the overhang is what stops "
            "that.",
        ],
        "limits": [
            "<li><strong>Straight-sided bin, no lid.</strong> A bin with a taper needs a bag "
            "sized to its top, and a lid that clamps needs less overhang than this assumes.</li>",
        ],
        "uses": [
            "<li>Restocking liners for a kitchen bin without the old box in hand.</li>",
            "<li>Checking whether a cheaper bag will actually fit.</li>",
        ],
        "scenarios": [
            {"inputs": {"shape": 0, "diameter": 18, "length": 20, "width": 14, "height": 24,
                        "overhang": 6},
             "note": "The rectangular bin of the same height takes a 40-inch bag and holds "
                     "29.1 gallons, so the bin that looks bigger is bigger by volume and "
                     "needs a wider bag."},
        ],
    },
    faq=[
        ("Why is the bag width half the perimeter?",
         "Because a flat bag has two sides. When it opens over the rim, each side covers half "
         "the way round, so the flat width has to be the half perimeter."),
        ("How much overhang do I need?",
         "Three inches for paper and light waste, six for kitchen waste that gets lifted, and "
         "more if the bag is tied rather than folded. The fold is what carries the weight."),
        ("Is a gallon the same as a litre?",
         "No: a US gallon is 3.785 litres, so a 30-gallon bag is 113 litres. Bag boxes in "
         "Europe print litres and the numbers are not interchangeable."),
    ],
    related=[("/everyday-life/tablecloth-size", "Tablecloth size"),
             ("/everyday-life/rug-size", "Rug size"),
             ("/conversion/cubic-inches-to-gallons", "Cubic inches to gallons")],
    checks=[
        ({"shape": 1, "diameter": 18, "length": 20, "width": 14, "height": 24, "overhang": 6},
         {"bag_width": 34.2743, "bag_height": 30, "capacity": 26.4405,
          "perimeter": 56.5487}, 0.01),
        ({"shape": 0, "diameter": 18, "length": 20, "width": 14, "height": 24, "overhang": 6},
         {"bag_width": 40, "bag_height": 30, "capacity": 29.0909, "perimeter": 68}, 0.01),
    ],
))

# ------------------------------------------------------- tablecloth size

SPECS.append(S(
    slug="tablecloth-size",
    name="Tablecloth Size Calculator",
    title="Tablecloth Size — the Drop Decides Everything",
    desc="Table size plus the drop you want gives the cloth to buy, round or rectangular, "
         "with the fabric area in square yards for a made-to-measure tablecloth.",
    what="The size of tablecloth to buy for a given table and drop, for round and rectangular "
         "tables, and the area of fabric the cloth takes, in square yards.",
    fields=[
        SEL("shape", "Table shape",
            [("Round table", 1), ("Rectangular table", 0)], 1),
        F("diameter", "Round table diameter", "in", 60),
        F("length", "Table length", "in", 72),
        F("width", "Table width", "in", 36),
        F("drop", "Drop at the edge", "in", 12,
          help="Ten to twelve inches is a casual drop, fifteen is formal, and thirty puts "
               "the cloth on the floor."),
    ],
    results=[
        R("cloth_length", "Cloth length", "in"),
        R("cloth_width", "Cloth width", "in"),
        R("area", "Fabric area", "sq yd"),
        R("drop_check", "Drop used", "in"),
    ],
    formula={
        "cloth_length": "if_else(shape > 0.5, diameter + 2 * drop, length + 2 * drop)",
        "cloth_width": "if_else(shape > 0.5, diameter + 2 * drop, width + 2 * drop)",
        "area": "if_else(shape > 0.5, pi * ((diameter + 2 * drop) / 2) * "
                "((diameter + 2 * drop) / 2) / 1296, "
                "(length + 2 * drop) * (width + 2 * drop) / 1296)",
        "drop_check": "drop",
    },
    prose={
        "why": "<p>The table is sixty inches across and the shop sells cloths in 70, 90 and "
               "108. Which one hangs properly depends on the drop, and the drop is the only "
               "decision in the calculation: ten inches for a kitchen table, fifteen for "
               "dinner, thirty to the floor.</p>"
               "<p>The cloth is the table plus twice the drop, because the cloth hangs on "
               "both sides. Sixty plus two twelves is 84 inches, which is why the 90 hangs a "
               "little long and the 70 does not hang at all.</p>",
        "formula_note": "Table dimension plus drop added twice. The area divides square "
                        "inches by 1 296, which is 36 by 36, to give square yards of fabric — "
                        "the unit dress fabric is sold in.",
        "reading": "A 60-inch round table with a 12-inch drop needs an 84-inch round cloth, "
                   "which is 4.28 square yards of fabric. The same table at a 30-inch drop to "
                   "the floor needs 120 inches.",
        "example_note": "A rectangular 72 by 36 table at the same 12-inch drop needs 96 by 60, "
                    "4.44 square yards. The round and the rectangle are close, and the "
                    "rectangle is the one with corners to get right.",
        "pitfalls": [
            "<strong>Buying the table size as the cloth size.</strong> A 60-inch round cloth "
            "on a 60-inch table covers the top and nothing else. Every cloth size quoted is "
            "the finished cloth, not the table.",
            "<strong>Forgetting the table thickness.</strong> A thick top and an apron make "
            "the drop a couple of inches shorter than the geometry says.",
        ],
        "limits": [
            "<li><strong>No seam allowance.</strong> The area is the finished cloth. A wide "
            "round table needs a pieced cloth, and cut sizes have to allow for seams.</li>",
        ],
        "uses": [
            "<li>Buying a cloth without measuring the one you already have.</li>",
            "<li>Estimating fabric for a cloth you will sew.</li>",
        ],
        "scenarios": [
            {"inputs": {"shape": 1, "diameter": 60, "length": 72, "width": 36, "drop": 30},
             "note": "Floor length for a 60-inch round table is a 120-inch cloth, 8.73 square "
                     "yards, which is why floor-length rounds are usually hired rather than "
                     "bought."},
        ],
    },
    faq=[
        ("What drop should a dining table have?",
         "Ten to twelve inches for everyday use, fifteen for a formal setting, and about "
         "thirty if you want the cloth on the floor. The drop is measured from the tabletop "
         "down."),
        ("How do I size a cloth for an oval table?",
         "Treat it as the rectangle that encloses it and add the drop twice; an oval cloth is "
         "then cut from that rectangle. The area figure is the fabric you need."),
        ("Why do shop sizes skip from 70 to 90 inches?",
         "Because 70 covers a 48-inch table with a short drop and 90 covers the 60-inch one "
         "with a standard drop. The gap is where the awkward sizes live and where made to "
         "measure starts."),
    ],
    related=[("/everyday-life/garbage-bag-size", "Garbage bag size"),
             ("/everyday-life/rug-size", "Rug size"),
             ("/everyday-life/curtain-size", "Curtain size")],
    checks=[
        ({"shape": 1, "diameter": 60, "length": 72, "width": 36, "drop": 12},
         {"cloth_length": 84, "cloth_width": 84, "area": 4.2761, "drop_check": 12}, 0.01),
        ({"shape": 0, "diameter": 60, "length": 72, "width": 36, "drop": 12},
         {"cloth_length": 96, "cloth_width": 60, "area": 4.4444}, 0.01),
    ],
))

# ------------------------------------------------------------------ rug size

SPECS.append(S(
    slug="rug-size",
    name="Rug Size Calculator",
    title="Rug Size — the Border You Leave Around It",
    desc="Room size and the band of bare floor you want left visible give the rug that fits, "
         "the floor it covers, and what it costs at the price you were quoted.",
    what="The rug dimensions that leave an even margin of floor around them, the rug's area, "
         "what share of the floor it covers, and the cost at the price you are quoted.",
    fields=[
        F("room_length", "Room length", "ft", 14),
        F("room_width", "Room width", "ft", 11),
        F("border", "Bare floor at each wall", "ft", 2,
          help="Eighteen inches to two feet is the usual margin on long sides, more if the "
               "rug stops short of a fireplace."),
        F("price", "Price per square foot", "$/sq ft", 8),
    ],
    results=[
        R("rug_length", "Rug length", "ft"),
        R("rug_width", "Rug width", "ft"),
        R("area", "Rug area", "sq ft"),
        R("coverage", "Share of floor covered", "%"),
        R("cost", "Rug cost", "$"),
    ],
    formula={
        "rug_length": "room_length - 2 * border",
        "rug_width": "room_width - 2 * border",
        "area": "(room_length - 2 * border) * (room_width - 2 * border)",
        "coverage": "(room_length - 2 * border) * (room_width - 2 * border) / "
                    "(room_length * room_width) * 100",
        "cost": "(room_length - 2 * border) * (room_width - 2 * border) * price",
    },
    prose={
        "why": "<p>The rug is not the room. A rug that touches all four walls makes a small "
               "room look smaller, and a rug in the middle of a large one leaves the furniture "
               "floating. What most rooms want is an even band of bare floor, and the band is "
               "the input.</p>"
               "<p>Fourteen feet by eleven with two feet at each wall gives a ten by seven rug, "
               "70 square feet, which is 45 per cent of the floor. At eight dollars a square "
               "foot that is 560, and now the sizes on the shop page mean something.</p>",
        "formula_note": "The border comes off both ends of each dimension, so the rug length "
                        "is the room length minus twice the border. Area is the product of the "
                        "two, and the cost is that area times the price per square foot.",
        "reading": "A 14 by 11 room with a 2-foot border takes a 10 by 7 rug, 70 square feet "
                   "and 45.5 per cent of the floor, which costs 560 at 8 a square foot.",
        "example_note": "Standard rug sizes are 5 by 8, 8 by 10 and 9 by 12. A 10 by 7 answer "
                    "means an 8 by 10 rug with more floor at the ends or a 9 by 12 that "
                    "covers the border entirely.",
        "pitfalls": [
            "<strong>Fitting the rug to the furniture instead of the room.</strong> A sofa "
            "and two chairs need to sit on the rug, front legs at least. Measure the group, "
            "then check the room.",
            "<strong>Ignoring the door swing.</strong> A rug that reaches a door becomes a "
            "trip hazard and a folded corner. Cut the border on that side instead of keeping "
            "it even.",
        ],
        "limits": [
            "<li><strong>Rectangular rooms and rugs.</strong> An L-shaped room or a round rug "
            "needs a different sum, and this page assumes right angles.</li>",
        ],
        "uses": [
            "<li>Choosing between 8 by 10 and 9 by 12 for a living room.</li>",
            "<li>Budgeting a rug for a bedroom before the sales.</li>",
        ],
        "scenarios": [
            {"inputs": {"room_length": 14, "room_width": 11, "border": 1, "price": 8},
             "note": "A one-foot border gives a 12 by 9 rug, 108 square feet and 69 per cent "
                     "coverage, which costs 864 — the border is the expensive input."},
        ],
    },
    faq=[
        ("Should the rug go under the sofa?",
         "The front legs of every seat should be on the rug, or all of them if the rug is "
         "large. A rug that stops short of the front legs makes the seating look like it is "
         "waiting to be moved."),
        ("What size rug for a queen bed?",
         "Eight by ten under the bottom two-thirds of the bed, or two runners at the sides. "
         "The border arithmetic is the same, with the bed as the room."),
        ("Does a bigger rug always look better?",
         "Up to the room's proportions. A rug that reaches within a foot of the walls reads "
         "as carpet, and carpet under furniture is cheaper per square foot than a rug."),
    ],
    related=[("/everyday-life/tablecloth-size", "Tablecloth size"),
             ("/everyday-life/garbage-bag-size", "Garbage bag size"),
             ("/everyday-life/price-per-acre", "Price per acre")],
    checks=[
        ({"room_length": 14, "room_width": 11, "border": 2, "price": 8},
         {"rug_length": 10, "rug_width": 7, "area": 70, "coverage": 45.4545,
          "cost": 560}, 0.01),
        ({"room_length": 14, "room_width": 11, "border": 1, "price": 8},
         {"rug_length": 12, "rug_width": 9, "area": 108, "coverage": 70.1299,
          "cost": 864}, 0.01),
    ],
))

# ------------------------------------------------------------- curtain size

SPECS.append(S(
    slug="curtain-size",
    name="Curtain Size Calculator",
    title="Curtain Size — Panel Width, Length and Fabric",
    desc="Window width, drop and fullness give the panel width to buy, the total fabric "
         "across the pair, and the fabric area in square feet.",
    what="The width and length of each curtain panel for a window, from the track width, the "
         "fullness the heading needs and the allowance below the sill.",
    fields=[
        F("window_width", "Track or pole width", "in", 60,
          help="The width the curtains have to cover, which is the track, not the glass. A "
               "track that overshoots the window by six inches each side is normal."),
        F("window_height", "Drop to the floor", "in", 72),
        SEL("fullness", "Fullness",
            [("1.5 — pencil pleat, tight", 1.5), ("2 — standard gathered", 2),
             ("2.5 — deep pinch pleat", 2.5)], 2),
    ],
    results=[
        R("panel_width", "Each panel, flat", "in"),
        R("total_width", "Fabric across the pair", "in"),
        R("cut_length", "Cut length", "in"),
        R("fabric", "Fabric area", "sq ft"),
    ],
    formula={
        "panel_width": "window_width * fullness / 2",
        "total_width": "window_width * fullness",
        "cut_length": "window_height + 8",
        "fabric": "window_width * fullness * (window_height + 8) / 144",
    },
    prose={
        "why": "<p>Curtains are sold as panels, and a panel is not the width of the window. "
               "The fabric has to be gathered to twice the track width to hang with folds, and "
               "the two panels share that between them.</p>"
               "<p>A sixty-inch track at double fullness needs 120 inches of fabric, so each "
               "panel is 60 inches flat. Buy two 60-inch panels, or one 120-inch panel cut in "
               "half — and cut length is the drop plus a hem allowance, which is where the "
               "measurement usually goes wrong.</p>",
        "formula_note": "Track width times fullness gives the fabric across the window; divided "
                        "by two it is the flat width of each panel. Cut length is the drop plus "
                        "eight inches, four at the hem and four at the heading.",
        "reading": "A 60-inch track at double fullness and a 72-inch drop needs two 60-inch "
                   "panels, 120 inches of fabric across, cut 80 inches long, which is 66.7 "
                   "square feet of fabric.",
        "example_note": "At two-and-a-half fullness the panels become 75 inches each and the "
                    "fabric area rises to 83.3 square feet. Fullness is the input that moves "
                    "the bill most.",
        "pitfalls": [
            "<strong>Measuring the glass.</strong> Curtains cover the track and overlap in the "
            "middle. A track is wider than the window, and measuring the glass gives curtains "
            "that will not meet.",
            "<strong>Forgetting the heading and hem.</strong> Eight inches is the allowance "
            "here: four for a hem, four for a heading. A lined curtain or a deep pleat needs "
            "more.",
        ],
        "limits": [
            "<li><strong>Two panels, one window.</strong> A bay or a very wide opening needs "
            "more panels, and fabric widths of 54 or 60 inches decide how many drops.</li>",
        ],
        "uses": [
            "<li>Working out how many metres of fabric to buy.</li>",
            "<li>Checking whether a ready-made pair will cover the window.</li>",
        ],
        "scenarios": [
            {"inputs": {"window_width": 60, "window_height": 72, "fullness": 2.5},
             "note": "Deep pinch pleats at two-and-a-half fullness give 75-inch panels and "
                     "83.3 square feet, a quarter more fabric than the gathered pair."},
        ],
    },
    faq=[
        ("Why does fullness change the panel width?",
         "Because gathered fabric only covers a fraction of its flat width once the heading "
         "pulls it in. Two times fullness is the standard gathered look; one and a half looks "
         "tight and flat, two and a half looks generous."),
        ("How much extra length should I add?",
         "Four inches for a hem and four for a heading is a working allowance. Add more for a "
         "lined curtain, a deep pleat or a pattern that has to be matched across panels."),
        ("Do curtains have to reach the floor?",
         "No: a sill length is common in kitchens and a radiator-length in living rooms. The "
         "drop box takes whichever you measured."),
    ],
    related=[("/everyday-life/blind-size", "Blind size"),
             ("/everyday-life/tablecloth-size", "Tablecloth size"),
             ("/everyday-life/rug-size", "Rug size")],
    checks=[
        ({"window_width": 60, "window_height": 72, "fullness": 2},
         {"panel_width": 60, "total_width": 120, "cut_length": 80, "fabric": 66.6667}, 0.01),
        ({"window_width": 60, "window_height": 72, "fullness": 2.5},
         {"panel_width": 75, "total_width": 150, "cut_length": 80, "fabric": 83.3333}, 0.01),
    ],
))
# -------------------------------------------------------------- blind size

SPECS.append(S(
    slug="blind-size",
    name="Blind Size Calculator",
    title="Blind Size — Inside or Outside the Recess",
    desc="Window opening in, two blind sizes out: the recess fit that clears the frame and "
         "the outside fit that covers it, with the floor area each blind covers.",
    what="The width and drop of a blind fitted inside the window recess and the same for one "
         "fitted outside it, from the opening and the overlap you want over the frame.",
    fields=[
        F("opening_width", "Opening width", "in", 48),
        F("opening_height", "Opening height", "in", 60),
        F("side_overlap", "Overlap each side, outside fit", "in", 1.5,
          help="A blind outside the recess needs two inches each side of the opening to stop "
               "light coming round the edge."),
        F("top_extra", "Extra above the opening", "in", 3,
          help="Room for the headrail and cassette above the frame."),
    ],
    results=[
        R("inside_width", "Inside fit, width", "in"),
        R("inside_height", "Inside fit, drop", "in"),
        R("outside_width", "Outside fit, width", "in"),
        R("outside_height", "Outside fit, drop", "in"),
        R("outside_area", "Outside fit, area", "sq ft"),
    ],
    formula={
        "inside_width": "opening_width - 0.25",
        "inside_height": "opening_height",
        "outside_width": "opening_width + 2 * side_overlap",
        "outside_height": "opening_height + top_extra",
        "outside_area": "(opening_width + 2 * side_overlap) * (opening_height + top_extra) "
                        "/ 144",
    },
    prose={
        "why": "<p>A blind measured to the window is a quarter of an inch too wide, every "
               "time. Frames are not square, plaster beads are not straight, and the recess "
               "narrows by a millimetre somewhere along its height.</p>"
               "<p>So an inside fit is the narrowest point of the opening, a quarter inch "
               "less, and an outside fit is the opening plus an overlap each side plus the "
               "headrail above. A 48 by 60 opening becomes 47.75 inside, or 51 by 63 outside — "
               "two blinds, two jobs, and one of them covers the frame.</p>",
        "formula_note": "The inside width takes a quarter inch off the opening and keeps the "
                        "drop. The outside fit adds twice the side overlap to the width and the "
                        "top allowance to the drop, and the area converts square inches to "
                        "square feet by dividing by 144.",
        "reading": "A 48 by 60 opening takes a 47.75 by 60 blind inside the recess, or a 51 by "
                   "63 blind outside it, which covers 22.3 square feet.",
        "example_note": "Inside fits look neater and let less light past; outside fits sit "
                    "proud of the wall and cope with a window that has no recess at all. The "
                    "two sizes differ by more than three inches in each direction.",
        "pitfalls": [
            "<strong>Measuring once.</strong> Measure the width at the top, the middle and the "
            "bottom of the recess and take the smallest. The same for height, at both sides.",
            "<strong>Forgetting the tiles.</strong> A tiled or beaded recess is narrower than "
            "the bare opening, and a blind that measures the plaster fits nothing.",
        ],
        "limits": [
            "<li><strong>One blind, one window.</strong> A bay window needs a blind per face, "
            "and the angles need the projection as well as the opening.</li>",
        ],
        "uses": [
            "<li>Ordering a made-to-measure blind without a fitter.</li>",
            "<li>Deciding between a recess fit and an outside fit.</li>",
        ],
        "scenarios": [
            {"inputs": {"opening_width": 48, "opening_height": 60, "side_overlap": 2,
                        "top_extra": 4},
             "note": "A two-inch overlap each side and four inches above gives a 52 by 64 "
                     "blind, which covers 23.1 square feet and clears the frame by an inch."},
        ],
    },
    faq=[
        ("Why take a quarter inch off an inside fit?",
         "Because the recess is never exactly the size on the tape. The blind has to clear the "
         "deepest narrow point, and a quarter inch is the allowance that keeps a roller blind "
         "from touching the sides as it turns."),
        ("How much overlap does an outside fit need?",
         "Two inches each side and three or four above is the usual minimum, which stops light "
         "leaking round the edges. More overlap looks heavier and blocks more of the wall."),
        ("Is the drop the same for both fits?",
         "No. Inside, the drop is the opening height and often half an inch less so the blind "
         "clears the sill. Outside, the drop is the opening plus the headrail above it."),
    ],
    related=[("/everyday-life/curtain-size", "Curtain size"),
             ("/everyday-life/tablecloth-size", "Tablecloth size"),
             ("/everyday-life/picture-frame", "Picture frame")],
    checks=[
        ({"opening_width": 48, "opening_height": 60, "side_overlap": 1.5, "top_extra": 3},
         {"inside_width": 47.75, "inside_height": 60, "outside_width": 51,
          "outside_height": 63, "outside_area": 22.3125}, 0.01),
        ({"opening_width": 48, "opening_height": 60, "side_overlap": 2, "top_extra": 4},
         {"outside_width": 52, "outside_height": 64, "outside_area": 23.1111}, 0.01),
    ],
))

# ------------------------------------------------------------ picture frame

SPECS.append(S(
    slug="picture-frame",
    name="Picture Frame Calculator",
    title="Picture Frame Size — Mat, Glass and Moulding",
    desc="Art size, mat border and moulding width give the glass, the inside opening, the "
         "outside frame and the feet of moulding you need to order at a framing counter.",
    what="The outside size of a framed picture, the glass size behind the mat, the frame's "
         "perimeter in feet for ordering moulding, and the mat area you will lose.",
    fields=[
        F("art_width", "Artwork width", "in", 16),
        F("art_height", "Artwork height", "in", 20),
        F("mat", "Mat border", "in", 3,
          help="Two to three inches is a gallery border. A mat narrower than two inches "
               "leaves the art crowded in its frame."),
        F("moulding", "Moulding width", "in", 1.5),
    ],
    results=[
        R("glass_width", "Glass width", "in"),
        R("glass_height", "Glass height", "in"),
        R("frame_width", "Frame outside width", "in"),
        R("frame_height", "Frame outside height", "in"),
        R("moulding_ft", "Moulding needed", "ft"),
        R("mat_area", "Mat area", "sq in"),
    ],
    formula={
        "glass_width": "art_width + 2 * mat",
        "glass_height": "art_height + 2 * mat",
        "frame_width": "art_width + 2 * mat + 2 * moulding",
        "frame_height": "art_height + 2 * mat + 2 * moulding",
        "moulding_ft": "2 * (art_width + 2 * mat + 2 * moulding + "
                       "art_height + 2 * mat + 2 * moulding) / 12",
        "mat_area": "(art_width + 2 * mat) * (art_height + 2 * mat) - art_width * art_height",
    },
    prose={
        "why": "<p>Three widths stack on every side of a picture: the art, the mat, the "
               "moulding. Sixteen by twenty art with a three-inch mat needs a 22 by 26 piece "
               "of glass, and a frame cut to 25 by 29 because the moulding is an inch and a "
               "half wide.</p>"
               "<p>Order the frame to the glass size and the glass to the mat, and nobody has "
               "to measure twice. The moulding figure is the outside perimeter in feet, which "
               "is how a framer prices a length.</p>",
        "formula_note": "Each layer adds its width twice, once at each edge. The moulding "
                        "length is the outside perimeter divided by twelve, and the mat area is "
                        "the glass area minus the art area, which is the four L-shaped strips "
                        "in one number.",
        "reading": "16 by 20 art with a 3-inch mat and a 1.5-inch moulding: 22 by 26 glass, a "
                   "25 by 29 frame, 9 feet of moulding and 252 square inches of mat.",
        "example_note": "A narrow mat saves moulding. Drop the mat to one inch and the glass "
                        "falls to 18 by 22 and the frame to 21 by 25, which is 1.3 feet less "
                        "moulding, 176 square inches less mat and a smaller piece of glass.",
        "pitfalls": [
            "<strong>Framing to the art size.</strong> The frame opening is the mat's inner "
            "edge, not the art. A frame cut to 16 by 20 clips the mat and leaves no border.",
            "<strong>Forgetting the overlap.</strong> The mat sits a quarter inch over the art "
            "on each side to hold it flat, so the visible art is slightly smaller than the "
            "sheet. Cut the opening four millimetres under.",
        ],
        "limits": [
            "<li><strong>One mat, one moulding.</strong> Double mats and a mount board behind "
            "add width per layer, and each layer is another two times its own depth.</li>",
        ],
        "uses": [
            "<li>Ordering a custom frame online without the framer's calculator.</li>",
            "<li>Checking that a readymade frame will take a matted print.</li>",
        ],
        "scenarios": [
            {"inputs": {"art_width": 16, "art_height": 20, "mat": 1, "moulding": 1.5},
             "note": "A one-inch mat gives 18 by 22 glass and a 21 by 25 frame, 7.67 feet of "
                     "moulding and 76 square inches of mat."},
        ],
    },
    faq=[
        ("How wide should a mat be?",
         "Two to three inches for most work, wider for a small print in a large frame. The "
         "border should look like a deliberate margin rather than a packing gap."),
        ("Do I order the frame to the glass size?",
         "Yes. The rebate in the back of the moulding takes the glass, the mat and the art as "
         "a stack, so the frame's opening matches the glass and the outside is that plus twice "
         "the moulding width."),
        ("Why measure moulding in feet?",
         "Because it is sold in lengths of six to ten feet and cut to the perimeter. The "
         "perimeter is four sides of the outside frame, and a framer adds a little for the "
         "mitres."),
    ],
    related=[("/everyday-life/blind-size", "Blind size"),
             ("/everyday-life/curtain-size", "Curtain size"),
             ("/everyday-life/price-per-square-inch", "Price per square inch")],
    checks=[
        ({"art_width": 16, "art_height": 20, "mat": 3, "moulding": 1.5},
         {"glass_width": 22, "glass_height": 26, "frame_width": 25, "frame_height": 29,
          "moulding_ft": 9, "mat_area": 252}, 0.01),
        ({"art_width": 16, "art_height": 20, "mat": 1, "moulding": 1.5},
         {"glass_width": 18, "glass_height": 22, "frame_width": 21, "frame_height": 25,
          "moulding_ft": 7.6667, "mat_area": 76}, 0.01),
    ],
))
