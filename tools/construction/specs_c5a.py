"""Batch 5a — the fence family: layout, pickets, posts, materials and cost."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="fence",
        name="Fence",
        title="Fence Calculator: Posts, Rails, Pickets and Cost",
        desc="Work out the posts, rails and pickets for a straight fence run from its length and spacing, then price the posts and pickets at your own rates.",
        what=("<p><strong>Posts = length ÷ spacing + 1</strong>, <strong>sections = length ÷ spacing</strong>, "
              "and <strong>pickets = run in inches ÷ (width + gap) + 1</strong>.</p>"),
        fields=[
            F("length", "Fence length", "ft", 100, "Total straight run"),
            F("height", "Fence height", "ft", 6, "Above ground"),
            F("post_spacing", "Post spacing", "ft", 8, "Post centre to centre"),
            F("rail_count", "Rails per section", "", 3, "Two or three is normal"),
            F("picket_width", "Picket width", "in", 5.5, "Face width of one board"),
            F("picket_gap", "Gap between pickets", "in", 0.25, "A quarter inch is usual"),
            F("post_price", "Post price", "$", 12, "Each post, with its concrete"),
            F("picket_price", "Picket price", "$", 2.5, "Each picket"),
        ],
        results=[
            R("posts", "Posts", ""),
            R("sections", "Sections", ""),
            R("rail_ft", "Rail length", "ft"),
            R("pickets", "Pickets", ""),
            R("cost", "Cost", "$"),
        ],
        formula={
            "posts": "ceil(length/post_spacing)+1",
            "sections": "ceil(length/post_spacing)",
            "rail_ft": "ceil(length/post_spacing)*rail_count*post_spacing",
            "pickets": "ceil(length*12/(picket_width+picket_gap))+1",
            "cost": "(ceil(length/post_spacing)+1)*post_price+"
                    "(ceil(length*12/(picket_width+picket_gap))+1)*picket_price",
            "length": "(posts-1)*post_spacing",
            "post_spacing": "length/(sections)",
            "picket_gap": "length*12/(pickets-1)-picket_width",
            "picket_price": "(cost-(ceil(length/post_spacing)+1)*post_price)/"
                            "(ceil(length*12/(picket_width+picket_gap))+1)",
            "post_price": "(cost-(ceil(length*12/(picket_width+picket_gap))+1)*picket_price)/"
                          "(ceil(length/post_spacing)+1)",
        },
        prose={
            "why": ("<p>A fence is bought in four different pieces — posts, rails, pickets and the concrete "
                    "that holds the posts — and each one is counted a different way. The posts come from the "
                    "spacing, the rails from the sections, and the pickets from the sliver of daylight you "
                    "want between them.</p>"),
            "formula_note": ("<p>One more post than sections, because both ends need one. The rail length is "
                             "the number of sections times the rails in each times the run of one section. "
                             "Pickets are counted across the full run in inches, divided by the width of one "
                             "picket plus one gap, and rounded up.</p>"),
            "example_note": ("<p>A {length|unit} run at {post_spacing|unit} centres needs {posts} posts and "
                             "{sections} sections, so {rail_ft|unit} of rail. With {picket_width|unit} pickets "
                             "and a {picket_gap|unit} gap that is {pickets} pickets, and at the prices on the "
                             "form the fence comes to {cost}.</p>"),
            "reading": ("<p>Read the picket count against the run: a six-foot dog-eared picket leaves about "
                        "four per foot, so a hundred feet lands near two hundred. A count near a tenth of that "
                        "means the gap has been entered in feet instead of inches.</p>"),
            "scenarios": [
                {"inputs": {"length": 60, "post_spacing": 8, "picket_gap": 0.5},
                 "note": "A shorter run with wider gaps: fewer pickets, the same posts."},
                {"inputs": {"length": 150, "post_spacing": 6, "rail_count": 2},
                 "note": "Posts closer together on a long run, with two rails instead of three."},
            ],
            "pitfalls": [
                "<strong>Counting sections instead of posts.</strong> There is always one more post.",
                "<strong>Gaps in feet.</strong> The picket gap is in inches on this form.",
                "<strong>Forgetting gates.</strong> A gate is two posts and no pickets.",
            ],
            "units_note": ("<p>Lengths and spacing in feet, picket width and gap in inches, prices in dollars "
                           "per piece.</p>"),
            "limits": [
                "<strong>Straight runs only.</strong> Corners need an extra post each.",
                "<strong>Level ground assumed.</strong> A slope needs stepped sections.",
                "<strong>No gates in the count.</strong> Add their posts by hand.",
            ],
            "uses": [
                "<li>Ordering pickets for a backyard run.</li>",
                "<li>Checking a contractor's post count.</li>",
                "<li>Comparing picket widths before you buy.</li>",
            ],
        },
        faq=[
            ("How many posts for a 100 foot fence?",
             "Fourteen at eight foot centres — thirteen sections plus the closing post."),
            ("How many pickets do I need per foot?",
             "About two for a five and a half inch picket with a quarter inch gap."),
        ],
        no_round_trip=["length", "post_spacing", "picket_gap", "picket_price", "post_price"],
        related=[("/construction/fence-perimeter", "Fence perimeter"),
                 ("/construction/fence-post-depth", "Fence post depth"),
                 ("/construction/fence-cost", "Fence cost")],
    ),

    S(
        slug="fence-cost",
        name="Fence cost",
        title="Fence Cost Calculator: Materials, Labour and Gates",
        desc="Estimate what a fence costs installed: material at a price per foot, labour at its own rate and each gate priced separately, with the total.",
        what=("<p><strong>Total = length × material rate + length × labour rate + gates × gate price.</strong></p>"),
        fields=[
            F("length", "Fence length", "ft", 120, "Total run"),
            F("price_per_ft", "Material price", "$/ft", 22, "Fence and fixings per foot"),
            F("labour_per_ft", "Labour price", "$/ft", 9, "Installation per foot"),
            F("gates", "Gates", "", 1, "Number of gates"),
            F("gate_price", "Gate price", "$", 250, "Each gate, fitted"),
        ],
        results=[
            R("material", "Material", "$"),
            R("labour", "Labour", "$"),
            R("gates_cost", "Gates", "$"),
            R("total", "Total", "$"),
        ],
        formula={
            "material": "length*price_per_ft",
            "labour": "length*labour_per_ft",
            "gates_cost": "gates*gate_price",
            "total": "length*price_per_ft+length*labour_per_ft+gates*gate_price",
            "length": "material/price_per_ft",
            "price_per_ft": "material/length",
            "labour_per_ft": "labour/length",
            "gate_price": "gates_cost/gates",
        },
        prose={
            "why": ("<p>Fence quotes are usually given as a price per linear foot, which hides the split "
                    "between material and labour and hides the gates entirely. Pulling the three parts apart "
                    "makes a quote comparable and shows where a cheaper fence actually saves money.</p>"),
            "formula_note": ("<p>Material and labour both scale with the run, so each is a rate per foot "
                             "multiplied by the length. Gates do not scale with length — they are a fixed "
                             "charge per gate, and on a short run they can be the largest single line.</p>"),
            "example_note": ("<p>A {length|unit} run at {price_per_ft}/ft of material and {labour_per_ft}/ft "
                             "of labour is {material} plus {labour}, with {gates} gate costing {gates_cost}. "
                             "The installed total is {total}.</p>"),
            "reading": ("<p>Read labour as a share of the total. Under a third and the job is mostly "
                        "material, which is normal for a simple run on flat ground; over half means the "
                        "fence is being installed in difficult ground or at height.</p>"),
            "scenarios": [
                {"inputs": {"length": 60, "gates": 2},
                 "note": "A short run with two gates: the gates become a large share."},
                {"inputs": {"length": 300, "price_per_ft": 30, "labour_per_ft": 12},
                 "note": "An acreage boundary in a heavier fence."},
            ],
            "pitfalls": [
                "<strong>Quotes that exclude gates.</strong> Ask for the gate line separately.",
                "<strong>Cheap material, dear labour.</strong> A kit fence can cost more to fit.",
                "<strong>No allowance for removal.</strong> Old fence disposal is a real charge.",
            ],
            "units_note": ("<p>Length in feet, rates in dollars per foot, gates priced each.</p>"),
            "limits": [
                "<strong>No ground conditions.</strong> Rock and slope are extra.",
                "<strong>Straight runs.</strong> Corners add posts and labour.",
            ],
            "uses": [
                "<li>Comparing two fencing quotes.</li>",
                "<li>Budgeting for gates and panels.</li>",
                "<li>Deciding whether to install yourself.</li>",
            ],
        },
        faq=[
            ("How much does a fence cost per foot?",
             "Material plus labour, so the two rates on this form added together."),
            ("Are gates included in a per foot price?",
             "Usually not, which is why they are a separate field here."),
        ],
        related=[("/construction/fence", "Fence"),
                 ("/construction/fence-estimate", "Fence estimate"),
                 ("/construction/vinyl-fence-cost", "Vinyl fence cost")],
    ),

    S(
        slug="fence-estimate",
        name="Fence estimate",
        title="Fence Estimate Calculator: Posts, Concrete and Screws",
        desc="Build a fence material estimate from the run: posts and their holes, concrete by the bag, rails and the screws that hold them.",
        what=("<p><strong>Posts = length ÷ spacing + 1</strong>; <strong>concrete per hole = π/4 × d² × depth ÷ 1 728</strong>.</p>"),
        fields=[
            F("length", "Fence length", "ft", 120, "Total run"),
            F("post_spacing", "Post spacing", "ft", 8, "Centre to centre"),
            F("hole_diameter", "Hole diameter", "in", 10, "A ten inch hole suits a four by four"),
            F("hole_depth", "Hole depth", "in", 30, "Below grade"),
            F("rails_per_section", "Rails per section", "", 2, "Usually two"),
            F("screws_per_rail", "Screws per rail end", "", 4, "Into each post"),
        ],
        results=[
            R("posts", "Posts", ""),
            R("sections", "Sections", ""),
            R("concrete_ft3", "Concrete", "ft³"),
            R("bags", "Bags of 80 lb", ""),
            R("screws", "Screws", ""),
        ],
        formula={
            "posts": "ceil(length/post_spacing)+1",
            "sections": "ceil(length/post_spacing)",
            "concrete_ft3": "(ceil(length/post_spacing)+1)*3.14159265/4*pow(hole_diameter,2)*hole_depth/1728",
            "bags": "ceil((ceil(length/post_spacing)+1)*3.14159265/4*pow(hole_diameter,2)*hole_depth/1728/0.6)",
            "screws": "ceil(length/post_spacing)*rails_per_section*screws_per_rail*2",
            "length": "(posts-1)*post_spacing",
            "post_spacing": "length/sections",
            "hole_depth": "concrete_ft3/(posts*3.14159265/4*pow(hole_diameter,2)/1728)",
            "screws_per_rail": "screws/(sections*rails_per_section*2)",
            "rails_per_section": "screws/(sections*screws_per_rail*2)",
        },
        prose={
            "why": ("<p>The material list is where a fence budget quietly goes wrong. Posts are easy to count, "
                    "but the concrete that holds them is measured in cubic feet and sold in bags, and the "
                    "screws run to two at each end of every rail.</p>"),
            "formula_note": ("<p>One hole per post, and each hole is a cylinder, so its volume is a quarter of "
                             "pi times the diameter squared times the depth, converted from cubic inches to "
                             "cubic feet. An eighty pound bag sets about six tenths of a cubic foot, so the "
                             "bag count is that volume divided by six tenths and rounded up.</p>"),
            "example_note": ("<p>{length|unit} at {post_spacing|unit} centres gives {posts} posts and "
                             "{sections} sections. The holes hold {concrete_ft3|unit} of concrete — {bags} "
                             "bags — and the rails take {screws} screws.</p>"),
            "reading": ("<p>Read the concrete against the posts: most four by four posts in a normal hole take "
                        "under two bags each. If the bag count is more than three times the post count, the "
                        "hole has been entered in feet rather than inches.</p>"),
            "scenarios": [
                {"inputs": {"post_spacing": 6, "hole_diameter": 12},
                 "note": "Closer posts in wider holes: more posts and more concrete."},
                {"inputs": {"length": 200, "hole_depth": 36, "rails_per_section": 3},
                 "note": "A long run in a deeper frost line with three rails."},
            ],
            "pitfalls": [
                "<strong>Holes measured in feet.</strong> The diameter and depth are inches.",
                "<strong>Forgetting the end posts.</strong> One more post than sections.",
                "<strong>Bag coverage assumed at a cubic foot.</strong> An eighty pound bag is about 0.6.",
            ],
            "units_note": ("<p>Lengths in feet, hole dimensions in inches, concrete in cubic feet and bags of "
                           "eighty pounds.</p>"),
            "limits": [
                "<strong>Set posts in soil.</strong> Rock needs a different method.",
                "<strong>No waste allowance.</strong> Add a bag or two for spillage.",
            ],
            "uses": [
                "<li>Writing a materials order.</li>",
                "<li>Pricing a fence before you dig.</li>",
                "<li>Checking a kit's concrete claim.</li>",
            ],
        },
        faq=[
            ("How many bags of concrete per fence post?",
             "About two for a ten inch hole three feet deep; the form gives the count for your own holes."),
            ("How many screws per rail?",
             "Two at each end, so four per rail across a section."),
        ],
        related=[("/construction/fence-post-depth", "Fence post depth"),
                 ("/construction/fence-material", "Fence material"),
                 ("/construction/fence", "Fence")],
    ),

    S(
        slug="fence-material",
        name="Fence material",
        title="Fence Material Calculator: Boards, Posts and Rails",
        desc="Turn a fence run into a timber order: the number of vertical boards, the posts, the rail footage and the board feet those boards represent.",
        what=("<p><strong>Boards = run in inches ÷ (width + gap) + 1</strong>; <strong>board feet = boards × width × height ÷ 12</strong>.</p>"),
        fields=[
            F("length", "Fence length", "ft", 100, "Straight run"),
            F("height", "Fence height", "ft", 6, "Height of the boards"),
            F("post_spacing", "Post spacing", "ft", 8, "Centre to centre"),
            F("rail_count", "Rails per section", "", 2, "Horizontal rails"),
            F("board_width", "Board width", "in", 5.5, "Face width"),
            F("board_gap", "Gap between boards", "in", 0.25, "Daylight between boards"),
            F("board_thickness", "Board thickness", "in", 1, "One inch nominal"),
        ],
        results=[
            R("boards", "Boards", ""),
            R("posts", "Posts", ""),
            R("rail_ft", "Rail length", "ft"),
            R("board_feet", "Board feet", "bd ft"),
        ],
        formula={
            "boards": "ceil(length*12/(board_width+board_gap))+1",
            "posts": "ceil(length/post_spacing)+1",
            "rail_ft": "ceil(length/post_spacing)*rail_count*post_spacing",
            "board_feet": "ceil(length*12/(board_width+board_gap)+1)*board_thickness*board_width*height/12",
            "length": "(boards-1)*(board_width+board_gap)/12",
            "board_gap": "length*12/(boards-1)-board_width",
            "board_width": "length*12/(boards-1)-board_gap",
        },
        prose={
            "why": ("<p>Timber is ordered in board feet, but a fence is built from boards of a fixed width "
                    "and height, and the two measures do not line up until you know how many boards the run "
                    "takes. This page does the counting and the conversion in one step.</p>"),
            "formula_note": ("<p>The board count is the run in inches divided by one board plus one gap, plus "
                             "the closing board. Board feet use the true dimensions: thickness times width "
                             "times length in inches, divided by one hundred and forty-four — with the "
                             "dividing by twelve already folded in here because the length is the fence "
                             "height in feet.</p>"),
            "example_note": ("<p>{length|unit} of {height|unit} fence in {board_width|unit} boards takes "
                             "{boards} boards, {posts} posts and {rail_ft|unit} of rail. The boards alone "
                             "come to {board_feet|unit}.</p>"),
            "reading": ("<p>Read board feet against boards: a six foot board of nominal five and a half "
                        "inches is about two and three quarter board feet. A figure far above that means the "
                        "width has been entered in centimetres.</p>"),
            "scenarios": [
                {"inputs": {"height": 4, "board_width": 3.5},
                 "note": "A low picket fence in narrower boards."},
                {"inputs": {"length": 160, "rail_count": 3, "board_gap": 0.5},
                 "note": "A long run with three rails and wider gaps."},
            ],
            "pitfalls": [
                "<strong>Nominal against actual width.</strong> A one by six is five and a half inches.",
                "<strong>Rails left out of the board feet.</strong> They are bought separately.",
                "<strong>No waste.</strong> Add five to ten per cent for cut boards.",
            ],
            "units_note": ("<p>Run and height in feet, board dimensions in inches, rail length in feet and "
                           "board feet in timber measure.</p>"),
            "limits": [
                "<strong>Vertical boards only.</strong> Horizontal cladding needs its own count.",
                "<strong>No rail board feet.</strong> The rail footage is given, not its volume.",
            ],
            "uses": [
                "<li>Ordering timber for a privacy fence.</li>",
                "<li>Converting a board count to board feet.</li>",
                "<li>Checking a lumber yard's quote.</li>",
            ],
        },
        faq=[
            ("How many boards for a six foot fence?",
             "About two per foot for a five and a half inch board, so roughly two hundred for a hundred feet."),
            ("How many board feet is one fence board?",
             "Thickness times width times height, divided by twelve — about 2.75 for a one by six."),
        ],
        no_round_trip=["length", "board_width", "board_gap"],
        related=[("/construction/wood-fence", "Wood fence"),
                 ("/construction/fence", "Fence"),
                 ("/construction/lumber", "Lumber")],
    ),

    S(
        slug="fence-picket",
        name="Fence picket",
        title="Fence Picket Calculator: Count, Spacing and Cost",
        desc="Count the pickets a run needs from the picket width and the gap, see what share of the fence is closed, and price the lot at a cost each.",
        what=("<p><strong>Pickets = run in inches ÷ (picket width + gap) + 1</strong>, and the closed share is "
              "<strong>width ÷ (width + gap)</strong>.</p>"),
        fields=[
            F("length", "Fence length", "ft", 100, "Straight run"),
            F("picket_width", "Picket width", "in", 5.5, "Face width"),
            F("gap", "Gap between pickets", "in", 0.25, "Daylight between pickets"),
            F("price", "Price per picket", "$", 2.5, "Each picket"),
        ],
        results=[
            R("pickets", "Pickets", ""),
            R("exposure", "Pitch", "in"),
            R("coverage", "Closed share", "%"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "pickets": "ceil(length*12/(picket_width+gap))+1",
            "exposure": "picket_width+gap",
            "coverage": "picket_width/(picket_width+gap)*100",
            "cost": "(ceil(length*12/(picket_width+gap))+1)*price",
            "length": "(pickets-1)*(picket_width+gap)/12",
            "gap": "length*12/(pickets-1)-picket_width",
            "picket_width": "length*12/(pickets-1)-gap",
            "price": "cost/pickets",
        },
        prose={
            "why": ("<p>Picket spacing is the whole character of a fence. Tight pickets give privacy, wide "
                    "gaps give airflow and light, and either way the count has to be right before the order "
                    "goes in, because pickets are sold in bundles rather than singly.</p>"),
            "formula_note": ("<p>One picket plus one gap is the pitch — the distance from the face of one "
                             "picket to the face of the next. The run in inches divided by the pitch gives the "
                             "number of pitches, and the closing picket adds one. The closed share is simply "
                             "how much of the pitch the picket itself covers.</p>"),
            "example_note": ("<p>{length|unit} at a {exposure|unit} pitch needs {pickets} pickets and leaves "
                             "{coverage} of the fence closed. At the price on the form that is {cost}.</p>"),
            "reading": ("<p>Read the closed share: ninety five per cent is a privacy fence, seventy per cent "
                        "is a picket fence you can see through. Anything under half means the gaps are wider "
                        "than the pickets and the fence is decorative.</p>"),
            "scenarios": [
                {"inputs": {"gap": 2, "picket_width": 3.5},
                 "note": "A classic front-yard picket fence with wide daylight."},
                {"inputs": {"gap": 0.125, "length": 60},
                 "note": "Almost closed: privacy on a short run."},
            ],
            "pitfalls": [
                "<strong>Gap in feet.</strong> The form wants inches.",
                "<strong>Forgetting the closing picket.</strong> A run always takes one more.",
                "<strong>Bundles assumed to be single pickets.</strong> Check the pack size.",
            ],
            "units_note": ("<p>Run in feet, picket width and gap in inches, pitch and coverage as shown.</p>"),
            "limits": [
                "<strong>Equal gaps.</strong> A rake or a slope changes the count.",
                "<strong>No rails or posts.</strong> The fence calculator covers those.",
            ],
            "uses": [
                "<li>Setting out picket spacing.</li>",
                "<li>Choosing between privacy and airflow.</li>",
                "<li>Pricing a picket order.</li>",
            ],
        },
        faq=[
            ("How do I work out picket spacing?",
             "Divide the run in inches by the pitch you want — picket plus gap — then add the closing picket."),
            ("How many pickets for 100 feet?",
             "Two hundred and ten at five and a half inches with a quarter inch gap."),
        ],
        no_round_trip=["length", "picket_width", "gap"],
        related=[("/construction/privacy-fence", "Privacy fence"),
                 ("/construction/board-on-board-fence", "Board on board fence"),
                 ("/construction/fence", "Fence")],
    ),

    S(
        slug="fence-perimeter",
        name="Fence perimeter",
        title="Fence Perimeter Calculator: Run, Posts and Cost",
        desc="Measure the fence run around a rectangular yard, subtract the gates, and see how many posts and panels that perimeter needs.",
        what=("<p><strong>Perimeter = 2 × (length + width)</strong>; the fence run is the perimeter less the "
              "gate openings.</p>"),
        fields=[
            F("length", "Yard length", "ft", 60, "One side"),
            F("width", "Yard width", "ft", 40, "The other side"),
            F("gate_width", "Total gate width", "ft", 12, "All gates added together"),
            F("post_spacing", "Post spacing", "ft", 8, "Centre to centre"),
            F("price", "Price per foot", "$/ft", 22, "Fence per linear foot"),
        ],
        results=[
            R("perimeter", "Perimeter", "ft"),
            R("fence_run", "Fence run", "ft"),
            R("posts", "Posts", ""),
            R("panels", "Sections", ""),
            R("cost", "Cost", "$"),
        ],
        formula={
            "perimeter": "2*(length+width)",
            "fence_run": "2*(length+width)-gate_width",
            "posts": "ceil((2*(length+width)-gate_width)/post_spacing)+1",
            "panels": "ceil((2*(length+width)-gate_width)/post_spacing)",
            "cost": "(2*(length+width)-gate_width)*price",
            "length": "perimeter/2-width",
            "width": "perimeter/2-length",
            "price": "cost/fence_run",
        },
        prose={
            "why": ("<p>Fencing a yard means fencing all four sides, and the gate is the one part of that "
                    "perimeter that is not fence. Getting the run right is the difference between buying a "
                    "couple of panels too many and coming up short on the last corner.</p>"),
            "formula_note": ("<p>Twice the length plus twice the width is the whole perimeter, and the gates "
                             "are subtracted to leave the fence run. Posts come from the run and the spacing, "
                             "with one more post than sections so both ends are closed.</p>"),
            "example_note": ("<p>A {length|unit} by {width|unit} yard has {perimeter|unit} of perimeter. With "
                             "{gate_width|unit} of gates the fence run is {fence_run|unit}, which needs "
                             "{posts} posts in {panels} sections and costs {cost} at the rate on the form.</p>"),
            "reading": ("<p>Read the run against the perimeter: the difference is the gates. A run longer "
                        "than the perimeter means the gate width has been subtracted with the wrong sign.</p>"),
            "scenarios": [
                {"inputs": {"length": 100, "width": 60, "gate_width": 4},
                 "note": "An acre-sized yard with a single walk gate."},
                {"inputs": {"length": 30, "width": 20, "gate_width": 10, "post_spacing": 6},
                 "note": "A small garden with a wide double gate."},
            ],
            "pitfalls": [
                "<strong>Forgetting a side.</strong> Four sides, not two.",
                "<strong>Gates counted as fence.</strong> Subtract the openings.",
                "<strong>Corners left out of the post count.</strong> Each corner needs its own post.",
            ],
            "units_note": ("<p>Sides and gate width in feet, the run and perimeter in feet, price per foot.</p>"),
            "limits": [
                "<strong>Rectangles only.</strong> An L-shaped yard is two runs.",
                "<strong>Level ground.</strong> A slope adds length and posts.",
            ],
            "uses": [
                "<li>Sizing a yard fence before ordering.</li>",
                "<li>Comparing a perimeter quote with the plan.</li>",
                "<li>Working out how much of the boundary a gate takes.</li>",
            ],
        },
        faq=[
            ("How do I measure a fence perimeter?",
             "Twice the length plus twice the width, then subtract every gate opening."),
            ("How many posts around a 200 foot perimeter?",
             "Twenty five at eight foot spacing with one gate, since the run is under 200."),
        ],
        related=[("/construction/fence", "Fence"),
                 ("/construction/fence-cost", "Fence cost"),
                 ("/construction/retaining-wall", "Retaining wall")],
    ),

    S(
        slug="fence-post-depth",
        name="Fence post depth",
        title="Fence Post Depth Calculator: Footing and Concrete",
        desc="Find how deep a fence post should sit from the frost line and the rule of thirds, plus the hole depth and the bags of concrete it takes.",
        what=("<p><strong>Depth below grade = the larger of the frost line and a third of the height above "
              "ground</strong>; the hole adds a gravel base.</p>"),
        fields=[
            F("above_grade", "Post above ground", "ft", 6, "Finished fence height"),
            F("frost_depth", "Frost depth", "in", 36, "Your local frost line"),
            F("embed_ratio", "Embed ratio", "", 0.33, "A third of the height as a rule"),
            F("hole_diameter", "Hole diameter", "in", 10, "Wider than the post"),
            F("gravel_base", "Gravel base", "in", 6, "Drainage under the post"),
        ],
        results=[
            R("below_grade", "Below grade", "in"),
            R("post_length", "Post length", "in"),
            R("hole_depth", "Hole depth", "in"),
            R("concrete_ft3", "Concrete", "ft³"),
            R("bags", "Bags of 80 lb", ""),
        ],
        formula={
            "below_grade": "max(frost_depth, above_grade*12*embed_ratio)",
            "post_length": "above_grade*12+max(frost_depth, above_grade*12*embed_ratio)",
            "hole_depth": "max(frost_depth, above_grade*12*embed_ratio)+gravel_base",
            "concrete_ft3": "3.14159265/4*pow(hole_diameter,2)*(max(frost_depth, above_grade*12*embed_ratio)+gravel_base)/1728",
            "bags": "ceil(3.14159265/4*pow(hole_diameter,2)*(max(frost_depth, above_grade*12*embed_ratio)+gravel_base)/1728/0.6)",
            "above_grade": "(post_length-below_grade)/12",
            "frost_depth": "below_grade",
            "embed_ratio": "below_grade/(above_grade*12)",
            "gravel_base": "hole_depth-below_grade",
        },
        prose={
            "why": ("<p>A fence post fails at the bottom, not the top. Two rules decide how far down it goes: "
                    "it must sit below the frost line so the ground cannot lift it, and it should be buried "
                    "about a third of its exposed height so the lever arm of a leaning fence does not pull it "
                    "over.</p>"),
            "formula_note": ("<p>The form takes the larger of the two rules, so a mild climate still gets the "
                             "one third depth and a cold one gets the frost depth. Six inches of gravel at the "
                             "bottom keeps water off the post and are added to the hole but not to the post.</p>"),
            "example_note": ("<p>A {above_grade|unit} post in a {frost_depth|unit} frost line sits "
                             "{below_grade|unit} below grade, so it needs a {post_length|unit} post in a "
                             "{hole_depth|unit} hole holding {concrete_ft3|unit} of concrete — {bags} bags.</p>"),
            "reading": ("<p>Read the post length against twice the height above ground: a post of about half "
                        "as much again as the fence is tall is normal. A post barely longer than the fence "
                        "means the embed ratio has been set too low for a windy site.</p>"),
            "scenarios": [
                {"inputs": {"frost_depth": 48, "above_grade": 6},
                 "note": "A cold climate: the frost line governs and the post gets long."},
                {"inputs": {"frost_depth": 12, "above_grade": 8},
                 "note": "A mild climate and a tall fence: the rule of thirds governs."},
            ],
            "pitfalls": [
                "<strong>Frost line ignored.</strong> Frost heave lifts shallow posts.",
                "<strong>Gravel left out.</strong> Water sits against the post and rots it.",
                "<strong>Concrete poured dry and unmixed.</strong> It sets weak.",
            ],
            "units_note": ("<p>Height above ground in feet, depth and hole dimensions in inches, concrete in "
                           "cubic feet and eighty pound bags.</p>"),
            "limits": [
                "<strong>Soil posts only.</strong> Rock, sand and fill behave differently.",
                "<strong>No wind load.</strong> A gate post needs more depth and a bigger hole.",
            ],
            "uses": [
                "<li>Sizing posts before the dig.</li>",
                "<li>Checking a contractor's footing depth.</li>",
                "<li>Ordering concrete for a run of posts.</li>",
            ],
        },
        faq=[
            ("How deep should a fence post be?",
             "Below the local frost line, and never less than a third of the height above ground."),
            ("How much concrete for one post?",
             "About a cubic foot and a half for a ten inch hole three feet deep, so two bags."),
        ],
        no_round_trip=["embed_ratio"],
        related=[("/construction/post-hole-concrete", "Post hole concrete"),
                 ("/construction/fence-estimate", "Fence estimate"),
                 ("/construction/fence", "Fence")],
    ),

    S(
        slug="privacy-fence",
        name="Privacy fence",
        title="Privacy Fence Calculator: Boards, Coverage and Cost",
        desc="Count the boards a privacy fence needs when each board overlaps the next, see the closed share of the fence and price the boards.",
        what=("<p><strong>Exposure = board width − overlap</strong>; <strong>boards = run in inches ÷ exposure + 1</strong>.</p>"),
        fields=[
            F("length", "Fence length", "ft", 80, "Straight run"),
            F("height", "Fence height", "ft", 6, "Board height"),
            F("board_width", "Board width", "in", 5.5, "Face width"),
            F("overlap", "Board overlap", "in", 0.5, "Each board over the last"),
            F("price", "Price per board", "$", 3, "Each board"),
        ],
        results=[
            R("boards", "Boards", ""),
            R("exposure", "Exposed width", "in"),
            R("coverage", "Closed share", "%"),
            R("board_feet", "Board feet", "bd ft"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "boards": "ceil(length*12/(board_width-overlap))+1",
            "exposure": "board_width-overlap",
            "coverage": "board_width/(board_width-overlap)*100",
            "board_feet": "ceil(length*12/(board_width-overlap)+1)*board_width*height/12",
            "cost": "(ceil(length*12/(board_width-overlap))+1)*price",
            "length": "(boards-1)*(board_width-overlap)/12",
            "overlap": "board_width-length*12/(boards-1)",
            "board_width": "length*12/(boards-1)+overlap",
        },
        prose={
            "why": ("<p>A privacy fence is not a picket fence with smaller gaps. The boards lap over one "
                    "another so that no straight line of sight gets through, which means every board covers "
                    "less than its own width and the count rises accordingly.</p>"),
            "formula_note": ("<p>The exposed width is the board width less the overlap, and that is the pitch "
                             "the boards are laid at. Dividing the run in inches by the pitch gives the "
                             "number of laps, and the closing board adds one. Board feet use the full width, "
                             "not the exposed width, because that is the timber you pay for.</p>"),
            "example_note": ("<p>{length|unit} of {height|unit} fence in {board_width|unit} boards with a "
                             "{overlap|unit} lap needs {boards} boards at a {exposure|unit} exposure, which "
                             "is {board_feet|unit} of timber and {cost} at the price on the form.</p>"),
            "reading": ("<p>Read the closed share: above a hundred per cent means the boards overlap and no "
                        "light passes, exactly as intended. A share just over a hundred with a large lap means "
                        "you are paying for timber you never see.</p>"),
            "scenarios": [
                {"inputs": {"board_width": 3.5, "overlap": 0.25},
                 "note": "Narrow boards, a small lap: more boards, thinner coverage."},
                {"inputs": {"length": 120, "overlap": 1},
                 "note": "A wide lap on a long run: the count climbs quickly."},
            ],
            "pitfalls": [
                "<strong>Overlap entered as a gap.</strong> An overlap of zero is a picket fence.",
                "<strong>Full width used for the pitch.</strong> The lap reduces it.",
                "<strong>Boards bought by the square foot.</strong> They are sold by the piece.",
            ],
            "units_note": ("<p>Run and height in feet, board width and overlap in inches, board feet in "
                           "timber measure.</p>"),
            "limits": [
                "<strong>Vertical boards.</strong> A horizontal privacy fence counts differently.",
                "<strong>No rails or posts.</strong> Those are on the fence calculator.",
            ],
            "uses": [
                "<li>Ordering boards for a screen fence.</li>",
                "<li>Comparing overlap against cost.</li>",
                "<li>Checking how much timber a lap needs.</li>",
            ],
        },
        faq=[
            ("How much overlap should a privacy fence have?",
             "Half an inch to an inch is typical; more overlap closes the fence but costs timber."),
            ("How many boards for 80 feet of privacy fence?",
             "A hundred and ninety three at five and a half inches with a half inch lap."),
        ],
        related=[("/construction/board-on-board-fence", "Board on board fence"),
                 ("/construction/fence-picket", "Fence picket"),
                 ("/construction/wood-fence", "Wood fence")],
    ),

    S(
        slug="vinyl-fence",
        name="Vinyl fence",
        title="Vinyl Fence Calculator: Panels, Posts and Rails",
        desc="Work out vinyl fence panels, posts and rails for a run, then price them: panels at a price each and posts at their own rate.",
        what=("<p><strong>Panels = length ÷ panel width</strong>, <strong>posts = panels + 1</strong>, "
              "<strong>rails = panels × 2</strong>.</p>"),
        fields=[
            F("length", "Fence length", "ft", 100, "Straight run"),
            F("height", "Fence height", "ft", 6, "Panel height"),
            F("panel_width", "Panel width", "ft", 8, "Nominal width of one panel"),
            F("panel_price", "Panel price", "$", 60, "Each panel"),
            F("post_price", "Post price", "$", 25, "Each post"),
        ],
        results=[
            R("panels", "Panels", ""),
            R("posts", "Posts", ""),
            R("rails", "Rails", ""),
            R("cost", "Cost", "$"),
        ],
        formula={
            "panels": "ceil(length/panel_width)",
            "posts": "ceil(length/panel_width)+1",
            "rails": "ceil(length/panel_width)*2",
            "cost": "ceil(length/panel_width)*panel_price+(ceil(length/panel_width)+1)*post_price",
            "length": "panels*panel_width",
            "panel_width": "length/panels",
            "post_price": "(cost-panels*panel_price)/(panels+1)",
            "panel_price": "(cost-(panels+1)*post_price)/panels",
        },
        prose={
            "why": ("<p>Vinyl fencing is sold as a kit of parts: a panel that drops between two posts, a top "
                    "and bottom rail already in the panel, and posts bought separately. Because panels are "
                    "rigid and fixed width, the count is a division rather than a measurement.</p>"),
            "formula_note": ("<p>The run divided by the panel width gives the panels, rounded up because a "
                             "partial panel is still a panel. Posts are one more than panels, since both ends "
                             "need one, and each panel brings two rails.</p>"),
            "example_note": ("<p>{length|unit} of {height|unit} fence in {panel_width|unit} panels is "
                             "{panels} panels, {posts} posts and {rails} rails, which comes to {cost} at the "
                             "prices on the form.</p>"),
            "reading": ("<p>Read the panels against the run: a nominal eight foot panel rarely leaves a "
                        "remainder of more than a foot, so the panel count should be within one of the run "
                        "divided by eight. More than that means the panel width is not what you think.</p>"),
            "scenarios": [
                {"inputs": {"length": 96, "panel_width": 6},
                 "note": "Six foot panels divide a short run evenly."},
                {"inputs": {"length": 150, "panel_width": 8, "post_price": 35},
                 "note": "A long run with heavier posts."},
            ],
            "pitfalls": [
                "<strong>Panels assumed to include posts.</strong> They do not.",
                "<strong>Partial panels ignored.</strong> A run is rounded up.",
                "<strong>Slopes.</strong> Racked panels cost more than stepped ones.",
            ],
            "units_note": ("<p>Run and panel width in feet, panel and post prices each.</p>"),
            "limits": [
                "<strong>Straight runs.</strong> Corners add a post and often a bracket.",
                "<strong>No gates.</strong> A gate kit is priced separately.",
            ],
            "uses": [
                "<li>Pricing a vinyl fence run.</li>",
                "<li>Comparing panel widths.</li>",
                "<li>Checking a kit's post count.</li>",
            ],
        },
        faq=[
            ("How many posts for a vinyl fence?",
             "One more than the number of panels, so both ends are closed."),
            ("Do vinyl panels come with posts?",
             "No — panels and posts are sold separately, which is why both prices are here."),
        ],
        no_round_trip=["length", "panel_width"],
        related=[("/construction/vinyl-fence-cost", "Vinyl fence cost"),
                 ("/construction/fence", "Fence"),
                 ("/construction/vinyl-siding", "Vinyl siding")],
    ),

    S(
        slug="vinyl-fence-cost",
        name="Vinyl fence cost",
        title="Vinyl Fence Cost Calculator: Sections, Posts, Labour",
        desc="Add up an installed vinyl fence: sections and posts at their prices, gates as a fixed charge, and labour at a rate per foot of run.",
        what=("<p><strong>Sections = length ÷ 8</strong>; <strong>total = sections × section price + posts × "
              "post price + gates × gate price + length × labour rate</strong>.</p>"),
        fields=[
            F("length", "Fence length", "ft", 100, "Straight run"),
            F("section_price", "Section price", "$", 65, "Panel and rails"),
            F("post_price", "Post price", "$", 25, "Each post"),
            F("gates", "Gates", "", 1, "Number of gates"),
            F("gate_price", "Gate price", "$", 350, "Each gate fitted"),
            F("labour_per_ft", "Labour price", "$/ft", 8, "Installation per foot"),
        ],
        results=[
            R("sections", "Sections", ""),
            R("posts", "Posts", ""),
            R("material", "Material", "$"),
            R("labour", "Labour", "$"),
            R("total", "Total", "$"),
        ],
        formula={
            "sections": "ceil(length/8)",
            "posts": "ceil(length/8)+1",
            "material": "ceil(length/8)*section_price+(ceil(length/8)+1)*post_price+gates*gate_price",
            "labour": "length*labour_per_ft",
            "total": "ceil(length/8)*section_price+(ceil(length/8)+1)*post_price+gates*gate_price+length*labour_per_ft",
            "length": "material/(section_price+labour_per_ft)",
            "section_price": "(material-(ceil(length/8)+1)*post_price-gates*gate_price)/ceil(length/8)",
            "gate_price": "(material-ceil(length/8)*section_price-(ceil(length/8)+1)*post_price)/gates",
            "labour_per_ft": "labour/length",
        },
        prose={
            "why": ("<p>Vinyl is usually quoted as an installed price, and the quote bundles a section price, "
                    "a post price, the gates and a labour rate. Separating them shows what a change of panel "
                    "or a second gate actually costs.</p>"),
            "formula_note": ("<p>Sections are counted at eight foot nominal width because that is what vinyl "
                             "panels are made in. Material is sections plus posts plus gates; labour is a "
                             "rate per foot of the whole run, which does not care how the sections divide.</p>"),
            "example_note": ("<p>{length|unit} at {section_price} a section and {post_price} a post is "
                             "{sections} sections and {posts} posts, so {material} of material. Labour at "
                             "{labour_per_ft}/ft adds {labour}, for {total} installed.</p>"),
            "reading": ("<p>Read labour as a share of the total. Vinyl is a heavy material to handle, so "
                        "labour usually runs between a quarter and a third of an installed price. Well under "
                        "that suggests a quote that has forgotten the digging.</p>"),
            "scenarios": [
                {"inputs": {"length": 60, "gates": 2, "gate_price": 400},
                 "note": "A short run where the gates dominate the bill."},
                {"inputs": {"length": 240, "labour_per_ft": 10},
                 "note": "A long boundary with a higher labour rate."},
            ],
            "pitfalls": [
                "<strong>Gates bundled into the section price.</strong> They are a separate charge.",
                "<strong>Posts assumed in the section.</strong> They are not.",
                "<strong>Removal of an old fence.</strong> Always an extra.",
            ],
            "units_note": ("<p>Length in feet, prices per section, per post and per gate, labour in dollars "
                           "per foot.</p>"),
            "limits": [
                "<strong>Fixed section width.</strong> Custom widths change the count.",
                "<strong>No permit or survey costs.</strong>",
            ],
            "uses": [
                "<li>Comparing vinyl with timber quotes.</li>",
                "<li>Budgeting for a second gate.</li>",
                "<li>Checking an installed price per foot.</li>",
            ],
        },
        faq=[
            ("What does an installed vinyl fence cost per foot?",
             "Add the material and labour columns, then divide by the length — that is the rate to compare."),
            ("How many sections in 100 feet?",
             "Thirteen, rounded up from twelve and a half, with fourteen posts."),
        ],
        no_round_trip=["length"],
        related=[("/construction/vinyl-fence", "Vinyl fence"),
                 ("/construction/fence-cost", "Fence cost"),
                 ("/construction/fence", "Fence")],
    ),

    S(
        slug="wood-fence",
        name="Wood fence",
        title="Wood Fence Calculator: Pickets, Rails and Timber Cost",
        desc="Cost a timber fence from the board feet it takes: pickets, rails and posts counted from the run, then priced at lumber and post rates.",
        what=("<p><strong>Pickets = run in inches ÷ (width + gap) + 1</strong>, and the timber cost is "
              "<strong>board feet × lumber price + posts × (post + concrete)</strong>.</p>"),
        fields=[
            F("length", "Fence length", "ft", 96, "Straight run"),
            F("height", "Fence height", "ft", 6, "Picket height"),
            F("post_spacing", "Post spacing", "ft", 8, "Centre to centre"),
            F("rail_count", "Rails per section", "", 2, "Horizontal rails"),
            F("picket_width", "Picket width", "in", 5.5, "Face width"),
            F("picket_gap", "Gap between pickets", "in", 0.25, "Daylight between pickets"),
            F("lumber_price", "Lumber price", "$/bd ft", 0.85, "Board foot rate"),
            F("post_price", "Post price", "$", 14, "Each post"),
            F("concrete_price", "Concrete", "$/post", 6, "Concrete per post"),
        ],
        results=[
            R("sections", "Sections", ""),
            R("pickets", "Pickets", ""),
            R("posts", "Posts", ""),
            R("board_feet", "Board feet", "bd ft"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "sections": "ceil(length/post_spacing)",
            "pickets": "ceil(length*12/(picket_width+picket_gap))+1",
            "posts": "ceil(length/post_spacing)+1",
            "board_feet": "ceil(length*12/(picket_width+picket_gap)+1)*picket_width*height/12"
                          "+ceil(length/post_spacing)*rail_count*post_spacing*3.5/12",
            "cost": "(ceil(length*12/(picket_width+picket_gap)+1)*picket_width*height/12"
                    "+ceil(length/post_spacing)*rail_count*post_spacing*3.5/12)*lumber_price"
                    "+(ceil(length/post_spacing)+1)*(post_price+concrete_price)",
            "length": "(pickets-1)*(picket_width+picket_gap)/12",
            "picket_gap": "length*12/(pickets-1)-picket_width",
            "picket_width": "length*12/(pickets-1)-picket_gap",
            "lumber_price": "(cost-(ceil(length/post_spacing)+1)*(post_price+concrete_price))/board_feet",
            "post_price": "(cost-board_feet*lumber_price)/(ceil(length/post_spacing)+1)-concrete_price",
        },
        prose={
            "why": ("<p>A timber fence is priced in board feet by the yard and by the piece at the fence "
                    "company, and the two do not agree until the rails are counted. This page gathers the "
                    "pickets, the rails and the posts into one board-foot figure and one cost.</p>"),
            "formula_note": ("<p>Pickets take the run divided by one picket plus one gap; rails take the "
                             "sections times the rails in each times the span, at a nominal three and a half "
                             "inch width. Posts are bought and set rather than measured in board feet, so "
                             "they enter the cost directly with their concrete.</p>"),
            "example_note": ("<p>{length|unit} of {height|unit} fence takes {pickets} pickets in {sections} "
                             "sections between {posts} posts, for {board_feet|unit} of timber. At the rates on "
                             "the form the fence costs {cost}.</p>"),
            "reading": ("<p>Read board feet against the run: a six foot fence in five and a half inch pickets "
                        "runs a little over six board feet per foot. Much less than that means the rails have "
                        "been left out of the total.</p>"),
            "scenarios": [
                {"inputs": {"height": 4, "lumber_price": 1.1},
                 "note": "A lower fence in dearer timber."},
                {"inputs": {"length": 200, "rail_count": 3, "post_spacing": 6},
                 "note": "A long run with three rails and closer posts."},
            ],
            "pitfalls": [
                "<strong>Rails left out.</strong> They are a real share of the timber.",
                "<strong>Nominal widths.</strong> A one by six is five and a half inches.",
                "<strong>Concrete forgotten.</strong> Two bags a post adds up.",
            ],
            "units_note": ("<p>Run and height in feet, picket dimensions in inches, timber in board feet, "
                           "lumber in dollars per board foot.</p>"),
            "limits": [
                "<strong>Plain runs.</strong> Corners, gates and slopes add material.",
                "<strong>No waste.</strong> Add five to ten per cent.",
            ],
            "uses": [
                "<li>Pricing a timber fence in board feet.</li>",
                "<li>Comparing lumber yards.</li>",
                "<li>Checking a contractor's material list.</li>",
            ],
        },
        faq=[
            ("How many board feet in a wood fence?",
             "About six per foot of run for a six foot fence; the form works it out from your pickets and rails."),
            ("Is it cheaper to buy pickets or boards?",
             "Boards, if you can rip them — but the board-foot price is what decides it."),
        ],
        no_round_trip=["length", "picket_width", "picket_gap"],
        related=[("/construction/fence-material", "Fence material"),
                 ("/construction/privacy-fence", "Privacy fence"),
                 ("/construction/lumber", "Lumber")],
    ),

    S(
        slug="board-on-board-fence",
        name="Board on board fence",
        title="Board on Board Fence Calculator: Boards and Cost",
        desc="Count the boards for a board-on-board fence, where two layers lap to close every gap, with the exposed width, board feet and cost.",
        what=("<p><strong>Boards = 2 × (run in inches ÷ exposed width)</strong>, where the exposed width is "
              "the board width less the lap.</p>"),
        fields=[
            F("length", "Fence length", "ft", 80, "Straight run"),
            F("height", "Fence height", "ft", 6, "Board height"),
            F("board_width", "Board width", "in", 5.5, "Face width"),
            F("lap", "Board lap", "in", 1.5, "How far one board covers the next"),
            F("price", "Price per board", "$", 3.2, "Each board"),
        ],
        results=[
            R("boards", "Boards", ""),
            R("exposure", "Exposed width", "in"),
            R("board_feet", "Board feet", "bd ft"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "boards": "2*ceil(length*12/(board_width-lap))",
            "exposure": "board_width-lap",
            "board_feet": "2*ceil(length*12/(board_width-lap))*board_width*height/12",
            "cost": "2*ceil(length*12/(board_width-lap))*price",
            "length": "boards*(board_width-lap)/24",
            "lap": "board_width-length*24/boards",
            "board_width": "length*24/boards+lap",
            "price": "cost/boards",
        },
        prose={
            "why": ("<p>Board on board is the belt and braces of timber fencing: one layer of boards on the "
                    "outside of the rails, a second layer on the inside covering the gaps. No light passes, "
                    "both faces look finished, and the board count is roughly double a standard fence.</p>"),
            "formula_note": ("<p>Each layer is laid at a pitch of the board width less the lap, and there are "
                             "two layers, so the pitch count is doubled. Because the two layers are offset, "
                             "the boards are usually cut from longer stock and the waste is higher than on a "
                             "single skin fence.</p>"),
            "example_note": ("<p>{length|unit} of {height|unit} fence in {board_width|unit} boards with a "
                             "{lap|unit} lap gives {boards} boards at a {exposure|unit} pitch — "
                             "{board_feet|unit} of timber, {cost} at the price on the form.</p>"),
            "reading": ("<p>Read the board count against a single skin fence: it should be a little over "
                        "double. Much more than double means the lap is wide and you are paying for coverage "
                        "twice over.</p>"),
            "scenarios": [
                {"inputs": {"lap": 1, "board_width": 3.5},
                 "note": "Narrow boards with a small lap: thinner stock, more pieces."},
                {"inputs": {"length": 140, "lap": 2},
                 "note": "A long run with a wide lap for a windy site."},
            ],
            "pitfalls": [
                "<strong>Lap counted as a gap.</strong> Board on board overlaps, it does not space.",
                "<strong>One layer priced.</strong> Both faces take boards.",
                "<strong>Waste ignored.</strong> Offset boards waste more at the ends.",
            ],
            "units_note": ("<p>Run and height in feet, board width and lap in inches, timber in board feet.</p>"),
            "limits": [
                "<strong>Vertical boards.</strong> Horizontal board on board is rare.",
                "<strong>No rails, posts or concrete.</strong> Those are on the fence calculators.",
            ],
            "uses": [
                "<li>Ordering a two-skin privacy fence.</li>",
                "<li>Comparing board on board with a single skin.</li>",
                "<li>Checking a quote for a school or a boundary.</li>",
            ],
        },
        faq=[
            ("What is a board on board fence?",
             "Two layers of vertical boards, one each side of the rails, lapped so the gaps are covered."),
            ("How many boards does it take?",
             "Roughly twice a single skin fence with the same run and board width."),
        ],
        related=[("/construction/privacy-fence", "Privacy fence"),
                 ("/construction/fence", "Fence"),
                 ("/construction/fence-picket", "Fence picket")],
    ),
]
