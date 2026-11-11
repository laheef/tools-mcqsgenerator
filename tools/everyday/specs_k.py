"""

Everyday-life batch K: cutting and fitting.

Eight sewing pages — a circle skirt's radius, a pleated skirt's fullness, the
fabric a cross-stitch needs, half-square triangles, binding strips, hexagons, a
quilt's backing, and yards against metres — and six pages that fit something to
a space or a body: a bed, a sofa, a tent, a mirror, a desk and a standing desk.

The sewing arithmetic is the kind that goes wrong by an inch and stays wrong:
half-square triangles are cut seven eighths larger than they finish, and binding
is the perimeter plus a hand's width. Those constants are stated in the article
rather than assumed by the code.

"""

from __future__ import annotations

from lib import F, R, S, SEL

SPECS: list = []
# ------------------------------------------------------------- circle skirt

SPECS.append(S(
    slug="circle-skirt",
    name="Circle Skirt Calculator",
    title="Circle Skirt — Waist Radius, Length and Fabric",
    desc="Waist measurement divided by two pi gives the hole, plus the length gives the outer "
         "radius: the fabric a full circle skirt needs and the width to buy it in.",
    what="The inner radius for the waist, the outer radius of the finished skirt, the fabric "
         "area it takes and the minimum width a single-piece circle needs.",
    fields=[
        F("waist", "Waist measurement", "cm", 76),
        F("length", "Finished length", "cm", 60),
        F("hem", "Hem allowance", "cm", 3),
        F("seam", "Waist seam allowance", "cm", 1.5),
    ],
    results=[
        R("inner", "Waist radius", "cm"),
        R("outer", "Outer radius", "cm"),
        R("area", "Fabric area", "m²"),
        R("width", "Minimum fabric width", "cm"),
    ],
    formula={
        "inner": "waist / (2 * pi)",
        "outer": "waist / (2 * pi) + length + hem + seam",
        "area": "pi * ((waist / (2 * pi) + length + hem + seam) * "
                "(waist / (2 * pi) + length + hem + seam) - (waist / (2 * pi)) * "
                "(waist / (2 * pi))) / 10000",
        "width": "2 * (waist / (2 * pi) + length + hem + seam)",
    },
    prose={
        "why": "<p>A circle skirt is a donut: the waist is the hole and the skirt hangs from the "
               "outer edge. The hole's radius is the waist divided by 2π, which for a 76 cm waist "
               "is 12.1 cm.</p>"
               "<p>Add the length and the allowances and the outer radius is 76.6 cm, so the "
               "circle is 153 cm across before you cut it. That number is the one that decides "
               "whether a 150 cm bolt works in one piece or two — and a skirt cut in two pieces "
               "has seams on the sides that a circle skirt was never meant to have.</p>",
        "formula_note": "Waist over 2π gives the inner radius. Adding the finished length and the "
                        "hem and seam allowances gives the outer radius, and the area is π times "
                        "the difference of the squares, converted from square centimetres to "
                        "square metres.",
        "reading": "A 76 cm waist with a 60 cm length, a 3 cm hem and a 1.5 cm seam has a 12.1 cm "
                   "inner radius and a 76.6 cm outer radius: 1.80 square metres of fabric and a "
                   "153 cm minimum width.",
        "example_note": "A half-circle skirt halves the fabric and doubles the drop per metre. "
                    "The same waist on a half circle has an inner radius of 24.2 cm, which is "
                    "the number the pattern has in it.",
        "pitfalls": [
            "<strong>Using the hip instead of the waist.</strong> A circle skirt needs the waist "
            "to sit, and the hip has to pass through it. If the hips are more than 25 cm larger "
            "than the waist, use the hip measurement for the hole and gather the waist.",
            "<strong>Forgetting the seam.</strong> A skirt cut in two halves needs two seam "
            "allowances and two hems, and a circle skirt on a narrow bolt is usually cut in two "
            "halves.",
        ],
        "limits": [
            "<li><strong>Flat circle.</strong> Fabric hangs differently on the bias, so a "
            "circle skirt drops two to four centimetres after a day on a hanger. Cut it, hang "
            "it, then level the hem.</li>",
        ],
        "uses": [
            "<li>Buying fabric for a circle skirt without a pattern.</li>",
            "<li>Checking whether a bolt is wide enough for a single-piece skirt.</li>",
        ],
        "scenarios": [
            {"inputs": {"waist": 76, "length": 80, "hem": 3, "seam": 1.5},
             "note": "An 80 cm length takes the outer radius to 96.6 cm, which is a 193 cm "
                     "circle — more than any bolt is wide, so this one is cut in two."},
        ],
    },
    faq=[
        ("Why divide the waist by 2π?",
         "Because the circumference is 2π times the radius. The waist is the circumference of "
         "the hole, so the radius is the waist over 2π."),
        ("How much fabric does a circle skirt need?",
         "Twice the outer radius in each direction if cut in one piece, which for an adult is "
         "1.5 to 2.5 square metres. Most adult skirts are cut in two halves to fit a bolt."),
        ("Does the skirt need a zip?",
         "A full circle in a non-stretch fabric usually does, because the waist hole will not "
         "pass the hips. A half circle often does not."),
    ],
    related=[("/everyday-life/pleated-skirt", "Pleated skirt"),
             ("/everyday-life/fabric", "Fabric conversion"),
             ("/everyday-life/tablecloth-size", "Tablecloth size")],
    checks=[
        ({"waist": 76, "length": 60, "hem": 3, "seam": 1.5},
         {"inner": 12.0958, "outer": 76.5958, "area": 1.7972, "width": 153.1916}, 0.01),
        ({"waist": 76, "length": 80, "hem": 3, "seam": 1.5},
         {"outer": 96.5958, "area": 2.8854, "width": 193.1916}, 0.01),
    ],
))

# ------------------------------------------------------------ pleated skirt

SPECS.append(S(
    slug="pleated-skirt",
    name="Pleated Skirt Calculator",
    title="Pleated Skirt — Fullness, Pleats and Fabric",
    desc="A pleated skirt is the waist times the fullness, so a 76 cm waist at three times "
         "fullness is 228 cm of fabric before a single pleat is folded into it.",
    what="The fabric width a pleated skirt needs at a given fullness, how many pleats that "
         "makes at a chosen pleat width, and the fabric area including seams and hem.",
    fields=[
        F("waist", "Waist measurement", "cm", 76),
        F("fullness", "Fullness", "x", 3,
          help="Two is a light skirt, three is a standard pleated skirt, four or more is a "
               "costume."),
        F("pleat", "Pleat width", "cm", 5),
        F("length", "Finished length", "cm", 60),
        F("allowance", "Hem and seam", "cm", 5),
    ],
    results=[
        R("fabric_width", "Fabric across", "cm"),
        R("pleats", "Pleats", "pleats"),
        R("cut_length", "Cut length", "cm"),
        R("area", "Fabric area", "m²"),
    ],
    formula={
        "fabric_width": "waist * fullness",
        "pleats": "floor(waist * fullness / pleat)",
        "cut_length": "length + allowance",
        "area": "waist * fullness * (length + allowance) / 10000",
    },
    prose={
        "why": "<p>Pleats are fabric folded onto itself, so the skirt needs more fabric than it "
               "covers. A 76 cm waist at three times fullness is 228 cm of fabric, which in "
               "practice is two widths of a 150 cm bolt joined at a seam.</p>"
               "<p>The pleat width then decides the count: 228 cm at 5 cm a pleat is 45 pleats, "
               "and the number has to be close to a whole one before the pleats meet at the "
               "seam. That is why patterns give a pleat count rather than a fabric width.</p>",
        "formula_note": "Waist times fullness gives the fabric across. Divided by the pleat "
                        "width and rounded down, that gives the pleats that fit, and the area is "
                        "the width times the cut length in metres.",
        "reading": "76 cm at three times fullness is 228 cm across, 45 pleats of 5 cm, a 65 cm "
                   "cut length and 1.48 square metres of fabric.",
        "example_note": "At four times fullness the skirt takes 304 cm and 60 pleats, which is "
                        "the difference between a school skirt and a costume.",
        "pitfalls": [
            "<strong>Forgetting that pleats overlap.</strong> Each pleat folds three thicknesses "
            "of fabric at the fold if it is a box pleat, and the width calculation only counts "
            "the flat width.",
            "<strong>Cutting before the pleat count is settled.</strong> Pleats must divide the "
            "seam evenly or the skirt hangs crooked. Decide the count, then cut.",
        ],
        "limits": [
            "<li><strong>Even pleats only.</strong> Knife, box and accordion pleats all use the "
            "same fabric but different folding, and the count for a knife pleat is not the "
            "count for a box pleat of the same width.</li>",
        ],
        "uses": [
            "<li>Buying fabric for a school or uniform skirt.</li>",
            "<li>Working out how many pleats fit a bolt.</li>",
        ],
        "scenarios": [
            {"inputs": {"waist": 76, "fullness": 4, "pleat": 5, "length": 60, "allowance": 5},
             "note": "Four times fullness is 304 cm, 60 pleats and 1.98 square metres of "
                     "fabric — a third again for a fuller skirt."},
        ],
    },
    faq=[
        ("How much fabric does a pleated skirt need?",
         "The waist times the fullness, plus seams. At three times fullness an adult skirt is "
         "2.2 to 2.5 metres of 150 cm fabric."),
        ("Why does fullness come in whole numbers?",
         "Because the pleats have to divide evenly. Two-and-a-half times fullness works, but it "
         "leaves a half pleat to absorb at the seam, and a seam that eats a half pleat shows."),
        ("Do knife and box pleats use the same amount?",
         "The same fabric for the same fullness, and a box pleat looks fuller from the outside "
         "because it shows two flat faces rather than one."),
    ],
    related=[("/everyday-life/circle-skirt", "Circle skirt"),
             ("/everyday-life/fabric", "Fabric conversion"),
             ("/everyday-life/quilt-binding", "Quilt binding")],
    checks=[
        ({"waist": 76, "fullness": 3, "pleat": 5, "length": 60, "allowance": 5},
         {"fabric_width": 228, "pleats": 45, "cut_length": 65, "area": 1.482}, 0.01),
        ({"waist": 76, "fullness": 4, "pleat": 5, "length": 60, "allowance": 5},
         {"fabric_width": 304, "pleats": 60, "area": 1.976}, 0.01),
    ],
))

# --------------------------------------------------------------- cross stitch

SPECS.append(S(
    slug="cross-stitch",
    name="Cross Stitch Fabric Calculator",
    title="Cross Stitch — Fabric Count, Size and Margin",
    desc="A 140 by 100 stitch design on 14-count aida is ten by seven inches: the finished size, "
         "the fabric to cut, and the same in centimetres.",
    what="The finished size of a cross-stitch design on a given fabric count, and the piece of "
         "fabric to cut once a margin is allowed on every side.",
    fields=[
        F("stitches_w", "Stitches wide", "stitches", 140),
        F("stitches_h", "Stitches high", "stitches", 100),
        F("count", "Fabric count", "stitches/in", 14,
          help="Aida is sold as 14, 16 or 18 count, which is stitches to the inch. Evenweave "
               "counts differ: a 28-count evenweave works at 14 stitches an inch over two "
               "threads."),
        F("margin", "Margin each side", "in", 3),
    ],
    results=[
        R("finished_w", "Finished width", "in"),
        R("finished_h", "Finished height", "in"),
        R("fabric_w", "Fabric to cut", "in"),
        R("fabric_h", "Fabric to cut", "in"),
        R("fabric_cm", "Fabric to cut", "cm"),
    ],
    formula={
        "finished_w": "stitches_w / count",
        "finished_h": "stitches_h / count",
        "fabric_w": "stitches_w / count + 2 * margin",
        "fabric_h": "stitches_h / count + 2 * margin",
        "fabric_cm": "(stitches_w / count + 2 * margin) * 2.54",
    },
    prose={
        "why": "<p>Fabric count is stitches to the inch, so the design divides straight through. "
               "A 140 by 100 design on 14-count aida is ten inches by 7.14, and with three inches "
               "of margin on each side you cut a piece 16 by 13.1 inches.</p>"
               "<p>The margin is not optional. It is what the hoop grips, what a framer laces "
               "over, and what saves the piece when the stitching drifts half an inch to one "
               "side. Three inches is the minimum and four is comfortable.</p>",
        "formula_note": "Stitches over count gives inches. The fabric to cut adds twice the "
                        "margin, because a margin is on every side, and the centimetre figure "
                        "multiplies the width by 2.54.",
        "reading": "140 by 100 on 14-count is 10 by 7.14 inches finished. With a 3-inch margin "
                   "the cut is 16 by 13.14 inches, or 40.6 cm across.",
        "example_note": "On 18-count the same design finishes at 7.78 by 5.56 inches, which is "
                        "smaller and denser. The higher the count, the smaller the picture and "
                        "the more stitches to the inch.",
        "pitfalls": [
            "<strong>Using the fabric count for evenweave the same way.</strong> 28-count "
            "evenweave worked over two threads is 14 stitches an inch, not 28, and a piece cut "
            "for 28 is half the size it should be.",
            "<strong>Cutting the margin off the finished size instead of adding it.</strong> "
            "The margin goes outside the design, both sides, so it adds twice the figure to "
            "each dimension.",
        ],
        "limits": [
            "<li><strong>Stitches that are not square.</strong> Aida is square; some linens are "
            "not, and the design comes out stretched. The page assumes square.</li>",
        ],
        "uses": [
            "<li>Buying fabric for a counted cross-stitch chart.</li>",
            "<li>Checking whether a design will fit a standard frame.</li>",
        ],
        "scenarios": [
            {"inputs": {"stitches_w": 140, "stitches_h": 100, "count": 18, "margin": 3},
             "note": "On 18-count the design finishes 7.78 by 5.56 inches and the cut piece is "
                     "13.78 by 11.56 — smaller, denser and quicker to stitch."},
        ],
    },
    faq=[
        ("What does 14-count mean?",
         "Fourteen stitches to the inch in each direction. A 14-count aida square is about 1.8 "
         "millimetres, and a design's size in inches is its stitch count divided by fourteen."),
        ("How much margin should I leave?",
         "Three inches minimum on every side, four for a large piece or one that will be "
         "stretched over a frame."),
        ("Does the thread coverage change with count?",
         "Yes: higher counts need fewer strands to cover the same square. That is why 18-count "
         "uses two strands where 11-count uses three or four."),
    ],
    related=[("/everyday-life/half-square-triangle", "Half-square triangles"),
             ("/everyday-life/fabric", "Fabric conversion"),
             ("/everyday-life/quilt", "Quilt size")],
    checks=[
        ({"stitches_w": 140, "stitches_h": 100, "count": 14, "margin": 3},
         {"finished_w": 10, "finished_h": 7.1429, "fabric_w": 16, "fabric_h": 13.1429,
          "fabric_cm": 40.64}, 0.01),
        ({"stitches_w": 140, "stitches_h": 100, "count": 18, "margin": 3},
         {"finished_w": 7.7778, "finished_h": 5.5556, "fabric_w": 13.7778,
          "fabric_h": 11.5556, "fabric_cm": 34.9956}, 0.01),
    ],
))

# ------------------------------------------------------- half square triangles

SPECS.append(S(
    slug="half-square-triangle",
    name="Half Square Triangle Calculator",
    title="Half Square Triangles — Cut Seven Eighths Larger",
    desc="A 4-inch half-square triangle comes from a 4 7/8 inch square and not from a 4-inch "
         "one, because the diagonal seam eats seven eighths of an inch of it.",
    what="The size to cut a square that will finish as a half-square triangle, the same in "
         "centimetres, how many starting squares the block count needs, and the fabric area.",
    fields=[
        F("finished", "Finished size", "in", 4,
          help="The size of the triangle once it is sewn into the quilt, seam included."),
        F("count", "Triangles wanted", "triangles", 8),
    ],
    results=[
        R("cut", "Square to cut", "in"),
        R("cut_cm", "Square to cut", "cm"),
        R("squares", "Starting squares", "squares"),
        R("fabric", "Fabric area", "sq in"),
    ],
    formula={
        "cut": "finished + 0.875",
        "cut_cm": "(finished + 0.875) * 2.54",
        "squares": "ceil(count / 2)",
        "fabric": "ceil(count / 2) * (finished + 0.875) * (finished + 0.875)",
    },
    prose={
        "why": "<p>The two-at-a-time method sews two squares right sides together, draws a "
               "diagonal, and cuts. Each square gives two triangles, and the seam allowance on "
               "the diagonal eats 7/8 of an inch — not a half.</p>"
               "<p>That is why a 4-inch finished triangle comes from a 4.875-inch square. Cut "
               "4.5 and every triangle is a quarter inch small; cut 4.5 and eight triangles are "
               "already a mistake before the first seam.</p>",
        "formula_note": "The finished size plus 7/8 of an inch gives the cut square, because the "
                        "diagonal seam takes two 1/4-inch allowances on a diagonal. Triangles "
                        "come two to a square, so the square count is the triangles halved and "
                        "rounded up.",
        "reading": "A 4-inch finished triangle is cut from a 4.875-inch square, 12.38 cm. Eight "
                   "triangles need four squares and 95 square inches of fabric.",
        "example_note": "For a 2-inch finished triangle the square is 2.875 and the fabric for "
                        "eight is 33 square inches — half the size, a quarter of the fabric.",
        "pitfalls": [
            "<strong>Cutting at the finished size.</strong> A 4-inch square gives a 3.125-inch "
            "triangle once sewn, and a quilt that is an inch short across eight rows.",
            "<strong>Forgetting the other method.</strong> Four-at-a-time and eight-at-a-time "
            "methods have their own constants — 1.414 and larger. The 7/8 rule is for two at a "
            "time only.",
        ],
        "limits": [
            "<li><strong>Cut size, not seam quality.</strong> A wobbly 1/4-inch seam will lose "
            "more than the 7/8 allowance protects. Press before measuring.</li>",
        ],
        "uses": [
            "<li>Cutting for a pinwheel or star block.</li>",
            "<li>Working out how much fabric a triangle border takes.</li>",
        ],
        "scenarios": [
            {"inputs": {"finished": 2, "count": 8},
             "note": "A 2-inch triangle is cut from a 2.875 square, so eight triangles need 33 "
                     "square inches — four squares of 8.27 each."},
        ],
    },
    faq=[
        ("Why seven eighths and not half an inch?",
         "Because the seam runs on the diagonal, and a quarter-inch allowance on a diagonal "
         "takes more fabric than on a straight edge. The geometry gives 0.875, and every quilt "
         "book agrees with it."),
        ("How many triangles from one square?",
         "Two with the two-at-a-time method. Four and eight are possible with other techniques "
         "and different allowances."),
        ("Do I add anything for pressing?",
         "No, but you do lose a thread or two to fraying. Cut accurately and handle the pieces "
         "gently rather than adding fabric."),
    ],
    related=[("/everyday-life/hexagon-quilt", "Hexagon quilt"),
             ("/everyday-life/quilt", "Quilt size"),
             ("/everyday-life/fabric", "Fabric conversion")],
    checks=[
        ({"finished": 4, "count": 8},
         {"cut": 4.875, "cut_cm": 12.3825, "squares": 4, "fabric": 95.0625}, 0.01),
        ({"finished": 2, "count": 8},
         {"cut": 2.875, "cut_cm": 7.3025, "squares": 4, "fabric": 33.0625}, 0.01),
    ],
))
# ------------------------------------------------------------- quilt binding

SPECS.append(S(
    slug="quilt-binding",
    name="Quilt Binding Calculator",
    title="Quilt Binding — Strips, Fabric Width and Yards",
    desc="The perimeter plus ten inches, divided by the usable fabric width: how many binding "
         "strips a quilt takes and how much fabric to cut them from at 42 inches.",
    what="The binding length a quilt needs, the number of strips that length makes from a "
         "width of fabric, and the fabric to buy in inches and yards.",
    fields=[
        F("quilt_w", "Quilt width", "in", 60),
        F("quilt_l", "Quilt length", "in", 80),
        F("strip", "Strip width", "in", 2.5,
          help="Two and a quarter for double-fold binding, two and a half for a generous one "
               "with a wide stitch line."),
        F("fabric_width", "Usable fabric width", "in", 42,
          help="A 44-inch bolt is 42 inches usable once the selvedges are cut off."),
    ],
    results=[
        R("perimeter", "Quilt perimeter", "in"),
        R("binding", "Binding needed", "in"),
        R("strips", "Strips", "strips"),
        R("fabric_in", "Fabric to cut", "in"),
        R("fabric_yd", "Fabric to buy", "yd"),
    ],
    formula={
        "perimeter": "2 * (quilt_w + quilt_l)",
        "binding": "2 * (quilt_w + quilt_l) + 10",
        "strips": "ceil((2 * (quilt_w + quilt_l) + 10) / fabric_width)",
        "fabric_in": "ceil((2 * (quilt_w + quilt_l) + 10) / fabric_width) * strip",
        "fabric_yd": "ceil((2 * (quilt_w + quilt_l) + 10) / fabric_width) * strip / 36",
    },
    prose={
        "why": "<p>Binding goes round the edge, so the length is the perimeter plus ten inches "
               "for the join and the corners. A 60 by 80 quilt has a 280-inch perimeter and "
               "needs 290 inches of binding.</p>"
               "<p>The strips are cut across the fabric and joined end to end, so the number of "
               "strips is the binding length over the usable width: seven strips of 2.5 inches, "
               "which is 17.5 inches of fabric or half a yard.</p>",
        "formula_note": "Twice length plus twice width gives the perimeter; ten inches covers "
                        "the join and the mitered corners. That length over the usable width, "
                        "rounded up, gives whole strips, and the strips times their width gives "
                        "the fabric to cut.",
        "reading": "A 60 by 80 quilt has a 280-inch perimeter and takes 290 inches of binding: "
                   "seven strips of 42 inches, 17.5 inches of fabric, half a yard.",
        "example_note": "A queen at 90 by 108 has a 396-inch perimeter and needs ten strips, "
                        "which is 2.5 inches of fabric per strip — under three quarters of a "
                        "yard.",
        "pitfalls": [
            "<strong>Using the bolt width instead of the usable width.</strong> Selvedges are "
            "woven tighter and do not fold. Cutting 44 strips from a 44-inch bolt gives you one "
            "strip that will not behave.",
            "<strong>Forgetting the diagonal join.</strong> Strips joined on the diagonal need a "
            "little more length than a straight butt seam, and the ten-inch allowance covers "
            "it.",
        ],
        "limits": [
            "<li><strong>Straight binding.</strong> Bias binding stretches round curves and "
            "needs a longer strip for the same perimeter — fifteen per cent more for a round "
            "quilt.</li>",
        ],
        "uses": [
            "<li>Buying binding fabric with the rest of the backing.</li>",
            "<li>Checking whether the leftovers in the stash are enough.</li>",
        ],
        "scenarios": [
            {"inputs": {"quilt_w": 90, "quilt_l": 108, "strip": 2.5, "fabric_width": 42},
             "note": "A 90 by 108 quilt needs 406 inches of binding — ten strips, 25 inches of "
                     "fabric, 0.69 yards."},
        ],
    },
    faq=[
        ("Why add ten inches?",
         "For the join where the binding meets itself, and for the corners, which take up "
         "fabric when mitered. Ten inches is the usual allowance."),
        ("How wide should binding be?",
         "Two and a quarter inches folded double gives a quarter-inch finished binding. Two and "
         "a half is easier to work with and finishes slightly wider."),
        ("Can I use the backing as binding?",
         "Yes — bring it round to the front and stitch it down. That method needs two to three "
         "inches of backing beyond the batting on every side, and no separate strips."),
    ],
    related=[("/everyday-life/quilt", "Quilt size"),
             ("/everyday-life/half-square-triangle", "Half-square triangles"),
             ("/everyday-life/fabric", "Fabric conversion")],
    checks=[
        ({"quilt_w": 60, "quilt_l": 80, "strip": 2.5, "fabric_width": 42},
         {"perimeter": 280, "binding": 290, "strips": 7, "fabric_in": 17.5,
          "fabric_yd": 0.4861}, 0.01),
        ({"quilt_w": 90, "quilt_l": 108, "strip": 2.5, "fabric_width": 42},
         {"perimeter": 396, "binding": 406, "strips": 10, "fabric_in": 25,
          "fabric_yd": 0.6944}, 0.01),
    ],
))

# ------------------------------------------------------------- hexagon quilt

SPECS.append(S(
    slug="hexagon-quilt",
    name="Hexagon Quilt Calculator",
    title="Hexagon Quilt — Pieces, Area and What It Covers",
    desc="Hexagons tessellate, so a quilt is a count of pieces: the area of one from its side "
         "length, the pieces in your layout, and the finished area in square feet.",
    what="The area of one hexagon from its side length, the pieces a grid of rows and columns "
         "needs, and the finished quilt area in square inches and square feet.",
    fields=[
        F("side", "Hexagon side", "in", 4,
          help="For a hexagon cut from a 4-inch strip, the side is 4 inches and the width "
               "across the flats is 6.93."),
        F("rows", "Rows", "rows", 8),
        F("per_row", "Hexagons a row", "hexagons", 10),
    ],
    results=[
        R("hex_area", "Area of one hexagon", "sq in"),
        R("pieces", "Pieces", "hexagons"),
        R("total_in2", "Quilt area", "sq in"),
        R("total_sqft", "Quilt area", "sq ft"),
    ],
    formula={
        "hex_area": "2.598076 * side * side",
        "pieces": "rows * per_row",
        "total_in2": "rows * per_row * 2.598076 * side * side",
        "total_sqft": "rows * per_row * 2.598076 * side * side / 144",
    },
    prose={
        "why": "<p>A regular hexagon's area is 2.598 times the square of its side, because it is "
               "six equilateral triangles of side <em>s</em> and each of those is 0.433 <em>s</em>"
               "². A 4-inch hexagon is 41.57 square inches.</p>"
               "<p>Eighty of them is 3 326 square inches, or 23 square feet — a lap quilt. The "
               "count is exact because hexagons tessellate; nothing is lost between them the way "
               "it is between circles.</p>",
        "formula_note": "Side squared times 2.598 gives the area. Rows times hexagons a row gives "
                        "the pieces, and the total divides the product by the 144 square inches "
                        "in a square foot.",
        "reading": "A 4-inch hexagon is 41.57 square inches. Eight rows of ten is 80 pieces, "
                   "3 326 square inches and 23.1 square feet.",
        "example_note": "A 5-inch hexagon is 64.95 square inches, so the same 80 pieces cover 36 "
                    "square feet — half as much again for a side that grew a quarter.",
        "pitfalls": [
            "<strong>Confusing side with width.</strong> A hexagon that is 4 inches across the "
            "flats has a side of 2.31, not 4. Templates are usually made to the side, and "
            "English paper piecing goes by the side.",
            "<strong>Forgetting the seams.</strong> Each piece loses a quarter inch on every "
            "edge when sewn, which shrinks a 4-inch hexagon to about 3.8 and costs six per cent "
            "of the area.",
        ],
        "limits": [
            "<li><strong>Perfect tessellation.</strong> A quilt with gaps between the pieces, or "
            "a border, has an area larger than the pieces add up to. This counts the pieces "
            "only.</li>",
        ],
        "uses": [
            "<li>Working out how many hexagons a quilt of a given size needs.</li>",
            "<li>Buying papers or acrylic templates by count.</li>",
        ],
        "scenarios": [
            {"inputs": {"side": 5, "rows": 8, "per_row": 10},
             "note": "A 5-inch hexagon is 64.95 square inches, so 80 of them cover 5 196 square "
                     "inches — 36 square feet."},
        ],
    },
    faq=[
        ("Why 2.598?",
         "It is three times the square root of three over two, the constant in the area of a "
         "regular hexagon. It comes from six equilateral triangles each of 0.433 s²."),
        ("How do hexagons fit together?",
         "Edge to edge with no gaps, which is why they are used in honeycomb quilts and in "
         "English paper piecing. The columns offset by half a hexagon, so the rows interlock."),
        ("How many hexagons for a queen quilt?",
         "About 400 at 3 inches a side, or 200 at 4. The area is what matters, and the side "
         "length is the lever."),
    ],
    related=[("/everyday-life/half-square-triangle", "Half-square triangles"),
             ("/everyday-life/quilt", "Quilt size"),
             ("/everyday-life/rug-size", "Rug size")],
    checks=[
        ({"side": 4, "rows": 8, "per_row": 10},
         {"hex_area": 41.5692, "pieces": 80, "total_in2": 3325.5366,
          "total_sqft": 23.094}, 0.01),
        ({"side": 5, "rows": 8, "per_row": 10},
         {"hex_area": 64.9519, "total_in2": 5196.1524, "total_sqft": 36.0844}, 0.01),
    ],
))

# --------------------------------------------------------------------- quilt

SPECS.append(S(
    slug="quilt",
    name="Quilt Size Calculator",
    title="Quilt Size — Top, Batting and Backing",
    desc="A quilt top plus an allowance on every side gives the batting and the backing, in "
         "inches, square feet and square yards, so the shop order is right first time.",
    what="The batting and backing sizes for a finished quilt top, with the allowance a longarmer "
         "and a home machine both need, in inches and in square yards to buy.",
    fields=[
        F("top_w", "Quilt top width", "in", 60),
        F("top_l", "Quilt top length", "in", 80),
        F("extra", "Batting extra each side", "in", 2,
          help="Two inches is the minimum for a home machine; longarm quilters usually ask for "
               "four."),
        F("backing_extra", "Backing extra each side", "in", 4),
    ],
    results=[
        R("batting_w", "Batting width", "in"),
        R("batting_l", "Batting length", "in"),
        R("backing_w", "Backing width", "in"),
        R("backing_l", "Backing length", "in"),
        R("backing_yd", "Backing fabric", "sq yd"),
    ],
    formula={
        "batting_w": "top_w + 2 * extra",
        "batting_l": "top_l + 2 * extra",
        "backing_w": "top_w + 2 * backing_extra",
        "backing_l": "top_l + 2 * backing_extra",
        "backing_yd": "(top_w + 2 * backing_extra) * (top_l + 2 * backing_extra) / 1296",
    },
    prose={
        "why": "<p>Three layers, three sizes. The top is the size it is; the batting goes two "
               "inches beyond it on every side; the backing goes four, because it has to be "
               "gripped at the edges and there has to be enough left for the binding.</p>"
               "<p>A 60 by 80 top therefore takes a 64 by 84 piece of batting and a 68 by 88 "
               "backing — 4.6 square yards, which is why backing is bought in three-yard "
               "lengths of a wide fabric or pieced from two widths of a standard one.</p>",
        "formula_note": "Each allowance is added twice, once per edge. The backing area divides "
                        "square inches by 1 296, the number in a square yard, which is what "
                        "fabric is sold in.",
        "reading": "A 60 by 80 top takes 64 by 84 batting and a 68 by 88 backing: 5 984 square "
                   "inches, or 4.62 square yards.",
        "example_note": "A longarm needs four inches of batting on every side, which turns the "
                        "same top into 68 by 88 and a backing of 4.99 square yards — a third of "
                        "a yard more.",
        "pitfalls": [
            "<strong>Cutting batting to the top's size.</strong> A quilted top pulls in by an "
            "inch or two across, and batting cut flush leaves the edges short after quilting.",
            "<strong>Forgetting the backing has to be wider than one bolt.</strong> A 68-inch "
            "backing from a 42-inch fabric is two panels and a seam, and the seam has to be "
            "planned before it is sewn.",
        ],
        "limits": [
            "<li><strong>Rectangular quilts.</strong> A quilt with a pieced border or an "
            "irregular edge needs the largest width and length measured across it, not the "
            "average.</li>",
        ],
        "uses": [
            "<li>Ordering batting and backing before a longarm booking.</li>",
            "<li>Checking whether a wide backing is cheaper than piecing one.</li>",
        ],
        "scenarios": [
            {"inputs": {"top_w": 60, "top_l": 80, "extra": 4, "backing_extra": 4},
             "note": "Four inches of batting each side gives 68 by 88 and the same backing: "
                     "4.99 square yards, a third more than the home-machine allowance."},
        ],
    },
    faq=[
        ("How much bigger should batting be than the top?",
         "Two inches each side for a home machine and four for a longarm. The extra is what the "
         "frame grips and what the quilting pulls in."),
        ("How much backing do I need?",
         "Four inches each side, plus enough to come round for the binding if you are binding "
         "from the back. The page gives the flat figure."),
        ("Why measure backing in square yards?",
         "Because fabric is sold by length at a fixed width. A 4.6 square yard backing in "
         "108-inch wide fabric is 1.6 running yards; in 42-inch fabric it is three lengths of "
         "2.6 yards."),
    ],
    related=[("/everyday-life/quilt-binding", "Quilt binding"),
             ("/everyday-life/hexagon-quilt", "Hexagon quilt"),
             ("/everyday-life/fabric", "Fabric conversion")],
    checks=[
        ({"top_w": 60, "top_l": 80, "extra": 2, "backing_extra": 4},
         {"batting_w": 64, "batting_l": 84, "backing_w": 68, "backing_l": 88,
          "backing_yd": 4.6173}, 0.01),
        ({"top_w": 60, "top_l": 80, "extra": 4, "backing_extra": 4},
         {"batting_w": 68, "batting_l": 88, "backing_w": 68, "backing_yd": 4.6173}, 0.01),
    ],
))
# -------------------------------------------------------------------- fabric

SPECS.append(S(
    slug="fabric",
    name="Fabric Conversion Calculator",
    title="Fabric Conversion — Yards, Metres and Square Feet",
    desc="A length of fabric in yards, metres, inches and square feet at a given width: four "
         "units of the same bolt, because patterns and shops do not agree on one.",
    what="A fabric length converted between yards and metres, with the inches, the square feet "
         "and the square metres that the same piece covers at the bolt's width.",
    fields=[
        F("yards", "Length", "yd", 3),
        F("width", "Usable width", "in", 44),
    ],
    results=[
        R("metres", "Length", "m"),
        R("inches", "Length", "in"),
        R("sqft", "Area", "sq ft"),
        R("sqm", "Area", "m²"),
    ],
    formula={
        "metres": "yards * 0.9144",
        "inches": "yards * 36",
        "sqft": "yards * 36 * width / 144",
        "sqm": "yards * 0.9144 * width * 0.0254",
    },
    prose={
        "why": "<p>Fabric is sold by the yard in the United States and by the metre almost "
               "everywhere else, and the two are close enough that people treat them as the "
               "same. A yard is 91.44 centimetres, so three yards is 2.74 metres and a "
               "three-metre order is 3.28 yards.</p>"
               "<p>That eight per cent matters on a project that needs every centimetre, which "
               "is most of them. The area figures go further: three yards of 44-inch fabric is "
               "33 square feet, and a pattern that specifies square metres is asking a different "
               "question.</p>",
        "formula_note": "Yards times 0.9144 gives metres and times 36 gives inches. Area "
                        "multiplies the inches by the width and divides by 144 for square feet, "
                        "or converts both dimensions to metres for square metres.",
        "reading": "Three yards is 2.74 metres, 108 inches, and at 44 inches wide it is 33 "
                   "square feet or 3.07 square metres.",
        "example_note": "A 60-inch wide fabric covers 45 square feet in the same three yards — "
                        "a third more area for the same length, which is why upholstery fabric "
                        "is sold wide.",
        "pitfalls": [
            "<strong>Treating a metre as a yard.</strong> It is nine per cent longer, so a "
            "pattern in yards ordered in metres has eight per cent more fabric, not the same "
            "amount.",
            "<strong>Using the bolt width as usable width.</strong> Selvedges are 1 to 2 inches "
            "of each side that cannot be used, and a 44-inch bolt is 42 usable.",
        ],
        "limits": [
            "<li><strong>Flat fabric.</strong> The area is the rectangle. A pattern with curves "
            "and nap layouts wastes 10 to 25 per cent of it, and the page cannot see that.</li>",
        ],
        "uses": [
            "<li>Converting a US pattern's yardage for a metric shop.</li>",
            "<li>Checking whether a remnant is enough for a project.</li>",
        ],
        "scenarios": [
            {"inputs": {"yards": 3, "width": 60},
             "note": "At 60 inches wide the same three yards is 45 square feet — the width is "
                     "the second half of the area and the part people forget."},
        ],
    },
    faq=[
        ("Is a metre bigger than a yard?",
         "Yes, by about nine per cent: 1 metre is 1.0936 yards. A metre is 39.37 inches and a "
         "yard is 36."),
        ("Why is fabric 44 inches wide?",
         "Because the looms that made it were, and the standard survived. Quilting cotton is "
         "usually 42 to 44, apparel fabric 58 to 60, and upholstery 54 to 60."),
        ("How do I convert square yards to metres?",
         "One square yard is 0.836 square metres. For lengths it is 0.9144, and mixing the two "
         "conversions is the usual error."),
    ],
    related=[("/everyday-life/circle-skirt", "Circle skirt"),
             ("/everyday-life/quilt", "Quilt size"),
             ("/everyday-life/paper-weight", "Paper weight")],
    checks=[
        ({"yards": 3, "width": 44},
         {"metres": 2.7432, "inches": 108, "sqft": 33, "sqm": 3.0658}, 0.01),
        ({"yards": 3, "width": 60},
         {"metres": 2.7432, "inches": 108, "sqft": 45, "sqm": 4.1806}, 0.01),
    ],
))

# ------------------------------------------------------------------ bed size

SPECS.append(S(
    slug="bed-size",
    name="Bed Size Calculator",
    title="Bed Size — Area, Length over Height and Space per Sleeper",
    desc="A mattress in inches and in square feet, with the length left over for your height "
         "and the width each sleeper gets when two share it.",
    what="The area of a mattress in square feet, how much longer it is than the person sleeping "
         "in it, and the width each person gets when two share.",
    fields=[
        F("width", "Mattress width", "in", 60,
          help="Queen is 60 by 80, king 76 by 80, double 54 by 75 and single 38 by 75."),
        F("length", "Mattress length", "in", 80),
        F("height", "Sleeper height", "in", 70),
        F("sleepers", "People in the bed", "people", 2),
    ],
    results=[
        R("area_sqft", "Mattress area", "sq ft"),
        R("area_m2", "Mattress area", "m²"),
        R("extra", "Length beyond your height", "in"),
        R("per_sleeper", "Width each", "in"),
    ],
    formula={
        "area_sqft": "width * length / 144",
        "area_m2": "width * length * 0.00064516",
        "extra": "length - height",
        "per_sleeper": "width / sleepers",
    },
    prose={
        "why": "<p>A bed is sold by name and measured in inches, and the two names that sound "
               "alike are nine inches apart in width. A double is 54 by 75; a queen is 60 by 80 "
               "and about a fifth more area.</p>"
               "<p>The figures that matter are the ones nobody quotes. Six inches of length "
               "beyond your height is the minimum and ten is comfortable; twenty-seven inches "
               "each is the width two adults get in a double, which is less than a cot.</p>",
        "formula_note": "Width times length gives square inches, divided by 144 for square feet "
                        "and converted to square metres at 0.00064516. The length left over is a "
                        "subtraction and the width per person is a division.",
        "reading": "A queen is 60 by 80, which is 33.3 square feet or 3.1 square metres. It "
                   "leaves 10 inches beyond a 70-inch sleeper and 30 inches each for two.",
        "example_note": "A double leaves 27 inches each for two people and only 75 inches of "
                        "length, which is six inches less than the standard queen — the reason "
                        "tall couples skip it.",
        "pitfalls": [
            "<strong>Buying bedding for the wrong name.</strong> A queen sheet on a double is "
            "six inches too wide in both directions. The inches are on the label and the name "
            "is what people remember.",
            "<strong>Ignoring the frame.</strong> A bed frame adds two to four inches to the "
            "footprint in each direction, which matters in a small room.",
        ],
        "limits": [
            "<li><strong>Mattress only.</strong> Headboards, bedside tables and the space to walk "
            "round the bed are a room-planning question this page does not answer.</li>",
        ],
        "uses": [
            "<li>Deciding between a double and a queen in a small bedroom.</li>",
            "<li>Checking whether a tall sleeper fits a standard length.</li>",
        ],
        "scenarios": [
            {"inputs": {"width": 54, "length": 75, "height": 70, "sleepers": 2},
             "note": "A double is 28.1 square feet, leaves 5 inches for a 70-inch sleeper and "
                     "gives 27 inches each — a squeeze by any standard."},
        ],
    },
    faq=[
        ("What size is a queen bed?",
         "60 by 80 inches, or 152 by 203 centimetres, which is 33.3 square feet. A king in the "
         "US is 76 by 80; a UK king is 60 by 78."),
        ("How much length does a tall person need?",
         "Six inches beyond their height at minimum, and ten is comfortable. A 75-inch mattress "
         "is short for anyone over 6 foot 2."),
        ("Is a double big enough for two?",
         "27 inches of width each is narrower than a single bed's 38. It is a bed for one "
         "person and a guest, not for two adults every night."),
    ],
    related=[("/everyday-life/sofa-size", "Sofa size"),
             ("/everyday-life/rug-size", "Rug size"),
             ("/everyday-life/quilt", "Quilt size")],
    checks=[
        ({"width": 60, "length": 80, "height": 70, "sleepers": 2},
         {"area_sqft": 33.3333, "area_m2": 3.0968, "extra": 10, "per_sleeper": 30}, 0.01),
        ({"width": 54, "length": 75, "height": 70, "sleepers": 2},
         {"area_sqft": 28.125, "area_m2": 2.6129, "extra": 5, "per_sleeper": 27}, 0.01),
    ],
))

# ----------------------------------------------------------------- sofa size

SPECS.append(S(
    slug="sofa-size",
    name="Sofa Size Calculator",
    title="Sofa Size — Wall Space, Walkway and Whether It Fits",
    desc="A sofa against a wall leaves the rest of the room for walking through: the clearance "
         "left, the walkway it allows and the share of the wall it takes up.",
    what="How much wall is left either side of a sofa, the walkway that leaves, and what share "
         "of the wall the sofa occupies — the check before a delivery van arrives.",
    fields=[
        F("room", "Wall length", "in", 144),
        F("sofa", "Sofa width", "in", 84),
        F("walkway", "Walkway you want", "in", 36,
          help="Thirty-six inches is the minimum for two people to pass; twenty-four is a "
               "squeeze and eighteen is a shuffle."),
    ],
    results=[
        R("clearance", "Wall left over", "in"),
        R("spare", "Beyond the walkway", "in"),
        R("share", "Share of the wall", "%"),
        R("fits", "Room for the walkway", "yes/no"),
    ],
    formula={
        "clearance": "room - sofa",
        "spare": "room - sofa - walkway",
        "share": "sofa / room * 100",
        "fits": "if_else(room - sofa >= walkway, 1, 0)",
    },
    prose={
        "why": "<p>A sofa is the largest thing most people buy for a room and the last thing "
               "they measure for. An 84-inch sofa on a 144-inch wall leaves 60 inches, which is "
               "a 36-inch walkway and 24 inches spare, and takes 58 per cent of the wall.</p>"
               "<p>Under 36 inches of clearance the walkway has to come from somewhere else — "
               "usually the middle of the room, which is why sofas that fit perfectly still "
               "make a room feel crowded.</p>",
        "formula_note": "The wall less the sofa gives the clearance, and less the walkway again "
                        "gives what is spare. The share is the sofa over the wall, and the "
                        "fits line is a comparison that answers one or zero.",
        "reading": "An 84-inch sofa on a 144-inch wall leaves 60 inches: 24 beyond a 36-inch "
                   "walkway, 58.3 per cent of the wall, and it fits.",
        "example_note": "A 108-inch sofa on the same wall leaves 36 inches — exactly the "
                        "walkway, with nothing to spare, which is what \"it just fits\" means "
                        "in practice.",
        "pitfalls": [
            "<strong>Measuring the wall, not the route.</strong> A sofa that fits the wall can "
            "still fail at the stairwell. Measure the doorways and the turn before ordering.",
            "<strong>Forgetting the arm clearance.</strong> Sofas need two to four inches at "
            "each end to get past a radiator or a doorway, and a wall-to-wall fit has to be "
            "exact to the half inch.",
        ],
        "limits": [
            "<li><strong>One wall, one sofa.</strong> A corner arrangement needs both walls and "
            "the corner measured, which is a different sum.</li>",
        ],
        "uses": [
            "<li>Checking a sofa against a wall before delivery day.</li>",
            "<li>Deciding between two lengths on the shop floor.</li>",
        ],
        "scenarios": [
            {"inputs": {"room": 144, "sofa": 108, "walkway": 36},
             "note": "A 108-inch sofa leaves exactly 36 inches: it fits, takes 75 per cent of "
                     "the wall and leaves no spare at all."},
        ],
    },
    faq=[
        ("How much space should be left around a sofa?",
         "Thirty-six inches for a main walkway, eighteen inches to squeeze past, and two to "
         "four inches at the ends for getting it in."),
        ("Does a sofa need to sit against a wall?",
         "No. Floating it on a rug with a walkway behind is a better arrangement in a large "
         "room, and then the wall measurement matters less."),
        ("How do I measure a room for delivery?",
         "Doorway width, hallway width and the tightest turn. A sofa is a rigid rectangle and "
         "the diagonal is the number that gets it round a corner."),
    ],
    related=[("/everyday-life/rug-size", "Rug size"),
             ("/everyday-life/bed-size", "Bed size"),
             ("/everyday-life/tablecloth-size", "Tablecloth size")],
    checks=[
        ({"room": 144, "sofa": 84, "walkway": 36},
         {"clearance": 60, "spare": 24, "share": 58.3333, "fits": 1}, 0.01),
        ({"room": 144, "sofa": 108, "walkway": 36},
         {"clearance": 36, "spare": 0, "share": 75, "fits": 1}, 0.01),
    ],
))

# ------------------------------------------------------------------ tent size

SPECS.append(S(
    slug="tent-size",
    name="Tent Size Calculator",
    title="Tent Size — Floor Area, People and Gear",
    desc="A four-person tent with 4.5 square metres is not four people's worth of room once "
         "the bags are inside: the area per person and the shortfall, in one page.",
    what="The floor area each person gets once the gear takes its share, what a tent of that "
         "size should hold at a sensible standard, and how far short it falls.",
    fields=[
        F("area", "Tent floor area", "m²", 4.5),
        F("people", "People", "people", 4),
        F("gear", "Floor space for gear", "m²", 1.5),
        F("standard", "Area per person wanted", "m²/person", 1.2,
          help="1.2 square metres per person is a realistic three-season standard. "
               "Manufacturers quote 0.8."),
    ],
    results=[
        R("per_person", "Area each, gear included", "m²"),
        R("needed", "Area this party needs", "m²"),
        R("shortfall", "Shortfall", "m²"),
        R("rating", "People the tent really holds", "people"),
    ],
    formula={
        "per_person": "(area - gear) / people",
        "needed": "people * standard + gear",
        "shortfall": "people * standard + gear - area",
        "rating": "floor((area - gear) / standard)",
    },
    prose={
        "why": "<p>Tent sizes are quoted at about 0.8 square metres a person, which is a "
               "sleeping mat and nothing else. A four-person tent at 4.5 square metres sounds "
               "generous and gives 0.75 a person once the bags are inside.</p>"
               "<p>At a realistic 1.2 square metres each plus 1.5 for gear, four people need "
               "6.3 square metres. The same tent really holds two, and the label says four.</p>",
        "formula_note": "The floor less the gear area, divided by the people, gives what each "
                        "sleeper gets. The needed area is the party times the standard plus the "
                        "gear, and the rating divides the usable floor by the standard and "
                        "rounds down.",
        "reading": "4.5 square metres for four people and 1.5 of gear is 0.75 each, against the "
                   "6.3 the party needs — a shortfall of 1.8 square metres, and the tent really "
                   "holds two.",
        "example_note": "Two people in the same tent get 1.5 square metres each, which is the "
                        "difference between a good night and a wet sleeping bag against the "
                        "wall.",
        "pitfalls": [
            "<strong>Believing the person rating.</strong> It is a maximum at the test standard "
            "with no luggage. Take one person off any rating above two and the tent becomes "
            "comfortable.",
            "<strong>Ignoring the shape.</strong> A tapered tent loses the corners to sloping "
            "walls, so the usable floor is ten to twenty per cent less than the quoted figure.",
        ],
        "limits": [
            "<li><strong>Floor area only.</strong> Porches, headroom and where the door opens "
            "matter as much as the number and are not in the arithmetic.</li>",
        ],
        "uses": [
            "<li>Choosing between a three and a four-person tent for two people.</li>",
            "<li>Checking a tent you already own for a party of four.</li>",
        ],
        "scenarios": [
            {"inputs": {"area": 4.5, "people": 2, "gear": 1.5, "standard": 1.2},
             "note": "Two people in the same tent get 1.5 square metres each, and the tent has "
                     "0.6 square metres to spare — the same tent, a different night."},
        ],
    },
    faq=[
        ("How many people fit in a four-person tent?",
         "Two comfortably, three with the gear outside, four as the label says and nobody "
         "sleeping well."),
        ("What is a realistic tent area per person?",
         "1.2 to 1.5 square metres for three-season camping and more for winter, when the gear "
         "is bulkier and stays inside."),
        ("Do vestibules count?",
         "No. They are the answer to the gear problem, though, and a tent with two good porches "
         "can take the rating it claims."),
    ],
    related=[("/everyday-life/bed-size", "Bed size"),
             ("/everyday-life/sofa-size", "Sofa size"),
             ("/everyday-life/rug-size", "Rug size")],
    checks=[
        ({"area": 4.5, "people": 4, "gear": 1.5, "standard": 1.2},
         {"per_person": 0.75, "needed": 6.3, "shortfall": 1.8, "rating": 2}, 0.01),
        ({"area": 4.5, "people": 2, "gear": 1.5, "standard": 1.2},
         {"per_person": 1.5, "needed": 3.9, "shortfall": -0.6, "rating": 2}, 0.01),
    ],
))
# -------------------------------------------------- bathroom mirror height

SPECS.append(S(
    slug="bathroom-mirror-size",
    name="Bathroom Mirror Height Calculator",
    title="Bathroom Mirror — Centre It on Eye Level",
    desc="A mirror is hung to the person, not the wall: eye level from height, the mirror's top "
         "and bottom, and the gap above a vanity that decides whether it works.",
    what="Where the middle of a bathroom mirror should sit, the top and bottom edges that gives, "
         "and the gap between the bottom edge and the vanity, so a mirror is hung once.",
    fields=[
        F("height", "User height", "cm", 175),
        F("mirror", "Mirror height", "cm", 60),
        F("vanity", "Vanity height", "cm", 85),
        F("eye_ratio", "Eye level as a share of height", "x", 0.94,
          help="Eye height is about 94 per cent of standing height for an adult, and closer to "
               "90 for a child."),
    ],
    results=[
        R("eye", "Eye level", "cm"),
        R("bottom", "Mirror bottom", "cm"),
        R("top", "Mirror top", "cm"),
        R("gap", "Clearance over the vanity", "cm"),
    ],
    formula={
        "eye": "height * eye_ratio",
        "bottom": "height * eye_ratio - mirror / 2",
        "top": "height * eye_ratio + mirror / 2",
        "gap": "height * eye_ratio - mirror / 2 - vanity",
    },
    prose={
        "why": "<p>A mirror is used at eye level, so the middle of it should sit at eye level. "
               "At 175 centimetres tall the eyes are around 164.5, and a 60-centimetre mirror "
               "centred there runs from 134.5 to 194.5.</p>"
               "<p>The gap over the vanity is the check. Fifty centimetres over an 85-centimetre "
               "vanity is fine; a 70-centimetre mirror leaves only 45, which is still usable and "
               "looks squeezed.</p>",
        "formula_note": "Height times the eye ratio gives eye level. Half the mirror either side "
                        "of that gives the edges, and subtracting the vanity height gives the "
                        "clearance between the two.",
        "reading": "A 175 cm person with a 60 cm mirror has an eye level of 164.5 cm: the mirror "
                   "runs from 134.5 to 194.5, leaving 49.5 cm above an 85 cm vanity.",
        "example_note": "A household with a child and an adult should hang to the shorter eye "
                    "line and accept a little looking up, or fit a mirror with a tilt.",
        "pitfalls": [
            "<strong>Hanging to the ceiling line.</strong> The top of the mirror aligned with "
            "the tile course looks tidy and puts the middle of the glass above everybody's head.",
            "<strong>Ignoring the basin.</strong> The clearance is measured from the tap, not "
            "the counter, and a tall tap needs its own ten centimetres.",
        ],
        "limits": [
            "<li><strong>One user.</strong> A shared bathroom has an average eye level, and the "
            "range between a 160 and a 190 centimetre person is 28 centimetres of mirror.</li>",
        ],
        "uses": [
            "<li>Hanging a new mirror without measuring five times.</li>",
            "<li>Checking whether a mirror in a shop is the right height for the room.</li>",
        ],
        "scenarios": [
            {"inputs": {"height": 160, "mirror": 60, "vanity": 85, "eye_ratio": 0.94},
             "note": "At 160 cm the eye level is 150.4, so the mirror runs from 120.4 to 180.4 "
                     "— 35.4 cm over the vanity, which is tight."},
        ],
    },
    faq=[
        ("What height should a bathroom mirror be hung?",
         "Centre the mirror on the eye level of the people who use it, which is about 94 per "
         "cent of standing height. For a 175 cm adult that is 164.5 cm."),
        ("How much gap should there be above the basin?",
         "Twenty to thirty centimetres minimum to clear the tap and the splash zone, and "
         "fifty is comfortable."),
        ("Does the mirror have to be centred on the basin?",
         "It should be centred on the basin and the person standing at it, which are usually "
         "the same wall position. A mirror offset from the basin looks wrong from the door."),
    ],
    related=[("/everyday-life/desk-height", "Desk height"),
             ("/everyday-life/standing-desk-height", "Standing desk height"),
             ("/everyday-life/blind-size", "Blind size")],
    checks=[
        ({"height": 175, "mirror": 60, "vanity": 85, "eye_ratio": 0.94},
         {"eye": 164.5, "bottom": 134.5, "top": 194.5, "gap": 49.5}, 0.01),
        ({"height": 160, "mirror": 60, "vanity": 85, "eye_ratio": 0.94},
         {"eye": 150.4, "bottom": 120.4, "top": 180.4, "gap": 35.4}, 0.01),
    ],
))

# --------------------------------------------------------------- desk height

SPECS.append(S(
    slug="desk-height",
    name="Desk Height Calculator",
    title="Desk Height — Sitting, Chair and the Gap Between",
    desc="Height times 0.41 gives a sitting desk and height times 0.25 a chair: the two numbers "
         "that decide whether a desk is comfortable, and the gap that has to fit your legs.",
    what="The height a sitting desk and its chair should be for a given person, the gap between "
         "them that has to take your thighs, and the eye level they should be looking at.",
    fields=[
        F("height", "Your height", "cm", 175),
        F("desk_ratio", "Desk as a share of height", "x", 0.41),
        F("chair_ratio", "Chair as a share of height", "x", 0.25),
    ],
    results=[
        R("desk", "Desk height", "cm"),
        R("chair", "Chair seat height", "cm"),
        R("gap", "Chair to desk", "cm"),
        R("eye", "Eye level sitting", "cm"),
    ],
    formula={
        "desk": "height * desk_ratio",
        "chair": "height * chair_ratio",
        "gap": "height * desk_ratio - height * chair_ratio",
        "eye": "height * 0.94 - 7",
    },
    prose={
        "why": "<p>Ergonomic furniture is sized to the person, not the room. A sitting desk is "
               "about 41 per cent of standing height and a chair seat about 25, which for 175 "
               "centimetres is 71.75 and 43.75.</p>"
               "<p>The gap between them is the number that is never quoted and decides "
               "everything: 28 centimetres has to take your thighs and leave the elbows at 90 "
               "degrees on the desk. A deep chair and a thin desk raise the elbows; a thick "
               "desktop and a low chair drop them.</p>",
        "formula_note": "Height times the desk ratio and the chair ratio. The gap is the "
                        "difference — it is also 16 per cent of height — and the sitting eye "
                        "level is 94 per cent of standing height less about seven centimetres, "
                        "because sitting lowers the head slightly.",
        "reading": "At 175 cm the desk is 71.75 and the chair 43.75, a 28 cm gap, with the eyes "
                   "at 157.5 — which is where the top of a monitor should be.",
        "example_note": "At 190 cm the desk is 77.9 and the chair 47.5, a 30.4 cm gap. A "
                        "standard 74 cm desk is already three centimetres low for that person.",
        "pitfalls": [
            "<strong>Adjusting the chair to the desk.</strong> The chair sets the feet and the "
            "knees; the desk then has to meet the elbows. Fixing the desk and raising the chair "
            "leaves the feet dangling and the thighs compressed.",
            "<strong>Ignoring the keyboard.</strong> A desk at elbow height for typing is right; "
            "a laptop on the same desk puts the screen 20 centimetres too low and the neck "
            "follows.",
        ],
        "limits": [
            "<li><strong>Average proportions.</strong> Leg length and torso length vary by five "
            "centimetres for the same height, so two people of equal height can want desks two "
            "centimetres apart.</li>",
        ],
        "uses": [
            "<li>Setting up a home office without an adjustable desk.</li>",
            "<li>Deciding whether a desk needs a footrest or a riser.</li>",
        ],
        "scenarios": [
            {"inputs": {"height": 190, "desk_ratio": 0.41, "chair_ratio": 0.25},
             "note": "At 190 cm the desk wants 77.9 and the chair 47.5, leaving a 30.4 gap — "
                     "and a standard 74 cm desk is low by nearly four."},
        ],
    },
    faq=[
        ("Why 41 per cent of height?",
         "It is the anthropometric relation between standing height and the height of the "
         "elbow when seated at a desk. It fits adults from 150 to 200 centimetres within a "
         "centimetre or two."),
        ("What if my desk is not the right height?",
         "A footrest or a thicker chair cushion fixes a low desk; a keyboard tray or a monitor "
         "riser fixes a high one. Replacing the desk is the expensive third option."),
        ("Where should the monitor go?",
         "The top of the screen at eye level, an arm's length away, so the gaze is slightly "
         "downward. The sitting eye level on this page is the number to line it up with."),
    ],
    related=[("/everyday-life/standing-desk-height", "Standing desk height"),
             ("/everyday-life/bathroom-mirror-size", "Mirror height"),
             ("/everyday-life/sofa-size", "Sofa size")],
    checks=[
        ({"height": 175, "desk_ratio": 0.41, "chair_ratio": 0.25},
         {"desk": 71.75, "chair": 43.75, "gap": 28, "eye": 157.5}, 0.01),
        ({"height": 190, "desk_ratio": 0.41, "chair_ratio": 0.25},
         {"desk": 77.9, "chair": 47.5, "gap": 30.4, "eye": 171.6}, 0.01),
    ],
))

# ------------------------------------------------------- standing desk height

SPECS.append(S(
    slug="standing-desk-height",
    name="Standing Desk Height Calculator",
    title="Standing Desk Height — Elbow, Screen and the 0.61 Rule",
    desc="A standing desk sits at about 61 per cent of your height, with the keyboard at elbow "
         "height and the top of the screen at eye level. Three numbers, one setup.",
    what="The height a standing desk should be for a given person, the elbow height the keyboard "
         "belongs at, and the eye level the top of the monitor should reach.",
    fields=[
        F("height", "Your height", "cm", 175),
        F("desk_ratio", "Desk as a share of height", "x", 0.61),
        F("elbow_ratio", "Elbow height as a share", "x", 0.63),
        F("eye_ratio", "Eye level standing", "x", 0.94),
    ],
    results=[
        R("desk", "Desk height", "cm"),
        R("elbow", "Elbow height", "cm"),
        R("eye", "Eye level", "cm"),
        R("screen_mid", "Middle of the screen", "cm"),
    ],
    formula={
        "desk": "height * desk_ratio",
        "elbow": "height * elbow_ratio",
        "eye": "height * eye_ratio",
        "screen_mid": "height * eye_ratio - 10",
    },
    prose={
        "why": "<p>Standing to work is a posture, not a cure, and the posture only works at the "
               "right height. A standing desk sits at about 61 per cent of your height — 106.75 "
               "centimetres for 175 — with the keyboard at elbow height, which is 63 per cent or "
               "110.25.</p>"
               "<p>Those two figures are four centimetres apart, which is why the keyboard "
               "usually ends up on a slightly lower tray and the screen on a riser. The screen's "
               "top goes at eye level, 164.5, and the gaze falls a little to the middle of it.</p>",
        "formula_note": "Height times the ratio for each reference point. The desk and the elbow "
                        "height are close by design: the desk sits a little below the elbow so "
                        "the wrist can be flat, and the keyboard tray takes the difference.",
        "reading": "At 175 cm the desk is 106.75, the elbows 110.25 and the eyes 164.5, so the "
                   "top of the screen goes at eye level and its middle sits at 154.5.",
        "example_note": "At 165 cm the desk falls to 100.65 and the screen top to 155.1. Two "
                    "people sharing one standing desk need it adjustable, not averaged.",
        "pitfalls": [
            "<strong>Standing all day.</strong> The evidence favours alternating, not standing "
            "continuously. A desk that can drop is worth more than one that only rises.",
            "<strong>Putting the screen at desk height.</strong> A laptop on a standing desk is "
            "half a metre too low, and the neck compensates by looking down for the rest of the "
            "day.",
        ],
        "limits": [
            "<li><strong>Proportions, not comfort.</strong> Shoe thickness, floor surface and "
            "personal preference move these figures by two or three centimetres.</li>",
        ],
        "uses": [
            "<li>Setting up a standing desk you already own.</li>",
            "<li>Choosing an adjustable desk's range before buying.</li>",
        ],
        "scenarios": [
            {"inputs": {"height": 165, "desk_ratio": 0.61, "elbow_ratio": 0.63,
                        "eye_ratio": 0.94},
             "note": "At 165 cm the desk is 100.65, the elbows 103.95 and the eyes 155.1 — a desk "
                     "fixed at 107 is four centimetres too high."},
        ],
    },
    faq=[
        ("What is the right standing desk height?",
         "About 61 per cent of your height, which is 107 centimetres for 175. It should put "
         "your elbows just above the desk with the shoulders relaxed."),
        ("How long should I stand?",
         "Twenty to thirty minutes at a time, alternating with sitting, rather than a fixed "
         "number of hours. The switch is the benefit."),
        ("Do I need an anti-fatigue mat?",
         "It helps more than it sounds. Standing on a hard floor for an hour is tiring before "
         "the work is, and the mat removes a good part of that."),
    ],
    related=[("/everyday-life/desk-height", "Desk height"),
             ("/everyday-life/bathroom-mirror-size", "Mirror height"),
             ("/everyday-life/sofa-size", "Sofa size")],
    checks=[
        ({"height": 175, "desk_ratio": 0.61, "elbow_ratio": 0.63, "eye_ratio": 0.94},
         {"desk": 106.75, "elbow": 110.25, "eye": 164.5, "screen_mid": 154.5}, 0.01),
        ({"height": 165, "desk_ratio": 0.61, "elbow_ratio": 0.63, "eye_ratio": 0.94},
         {"desk": 100.65, "elbow": 103.95, "eye": 155.1, "screen_mid": 145.1}, 0.01),
    ],
))
