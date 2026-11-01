"""Batch M — horticulture, soil and planting arithmetic.

Nine calculators a grower, a landscape contractor or an agronomist uses weekly:
how many plants fit, how much lime or sulfur or compost to spread, how much
water a crop actually needs, and what an intercrop buys you. They are ordinary
`lib.py` specs with real equations, so each one solves in both directions.
"""

from lib import Spec, num, sel, chk, txt, d

SPECS: list[Spec] = []


def add(s: Spec) -> None:
    SPECS.append(s)


# ------------------------------------------------------- 1. plants per hectare
add(Spec(
    name="Plants Per Hectare Calculator",
    slug="plants-per-hectare",
    summary=("How many plants fit in a field, from the spacing between rows and between plants. "
             "Ten thousand square metres divided by the area each plant occupies gives the "
             "population — the number every fertiliser rate, seed order and yield estimate is built "
             "on."),
    fields=[
        num("area", "Area to plant", 1, "ha", "1 hectare = 10 000 m²"),
        num("row_cm", "Row spacing", 75, "cm", "Distance between rows"),
        num("plant_cm", "In-row spacing", 30, "cm", "Distance between plants in a row"),
        num("loss_pct", "Expected losses", 5, "%", "Germination gaps, pest damage, headlands"),
        num("plants", "Plants needed", "", "", "After losses", output=True),
        num("plants_per_ha", "Plants per hectare", "", "/ha", "", output=True),
        num("area_per_plant", "Space per plant", "", "m²", "", output=True),
        num("seedlings", "Seedlings to buy", "", "", "Plants plus losses, rounded up", output=True),
    ],
    dirs=[
        d("Density", "area_per_plant", "row_cm*plant_cm/10000"),
        d("Density", "plants_per_ha", "10000/(row_cm*plant_cm/10000)"),
        d("Density", "plants", "area*10000/(row_cm*plant_cm/10000)*(1+loss_pct/100)"),
        d("Density", "seedlings", "round(area*10000/(row_cm*plant_cm/10000)*(1+loss_pct/100))"),
    ],
    formula=("Plants per hectare = 10 000 ÷ (row spacing in m × in-row spacing in m).  "
             "Total plants = area in ha × plants per hectare × (1 + losses)"),
    symbols=[("ha", "hectare, 10 000 m²", "m²"),
             ("row spacing", "distance between adjacent rows", "cm"),
             ("in-row spacing", "distance between plants within a row", "cm")],
    bands=[("under 20 000/ha", "Wide spacing", "orchard trees, maize for silage, pumpkins"),
           ("20 000 – 100 000/ha", "Field crops", "cereals, soybeans, potatoes"),
           ("over 100 000/ha", "Dense", "leafy greens, carrots, transplants in beds")],
    notes=[
        "Spacing sets the population, and population sets the yield curve. Doubling the density does "
        "not double the yield, because plants compete for the same light and water.",
        "Buy 5–10% more seedlings than the calculated population. Transplant losses and headland "
        "waste are real, and a second order mid-season costs more than the surplus.",
        "For beds rather than rows, use the bed spacing as the row spacing and count beds per "
        "hectare instead of rows.",
    ],
    mistakes=[
        "Mixing centimetres and metres in the same calculation — the classic factor-of-100 error.",
        "Forgetting the headland: a 1 ha field with a 3 m headland all round loses about 6% of its "
        "plantable area.",
        "Planning the population for the seed packet's ideal spacing rather than your equipment's "
        "actual row width.",
    ],
    faq=[
        ("How many plants per hectare at 75 × 30 cm?", "About 44 400 — 10 000 ÷ (0.75 × 0.30)."),
        ("How do I convert plants per hectare to plants per acre?", "Multiply by 0.4047, since an "
         "acre is 0.4047 ha."),
        ("Should I add a margin for losses?", "Yes, 5–10% for field crops and more for transplants "
         "or direct-sown small seed."),
    ],
    related=[("/biology/lawn-fertilizer-rate", "Lawn fertiliser rate"),
             ("/biology/crop-coefficient", "Crop coefficient"),
             ("/biology/stems-per-hectare", "Stems per hectare")],
    svg=("bars", {"caption": "Plants per hectare as spacing widens",
                  "series": [("50 × 20 cm", 100000), ("75 × 30 cm", 44444), ("90 × 50 cm", 22222)]}),
    icon="sprout",
    keywords=["plants per hectare", "plant population", "spacing", "planting density"],
    steps=[
        "Enter the area in hectares (1 acre is 0.4047 ha).",
        "Enter the row spacing and the in-row spacing in centimetres.",
        "Add the losses you expect; the plants and seedlings to order are shown.",
    ],
))


# ---------------------------------------------------- 2. fruit tree spacing
add(Spec(
    name="Fruit Tree Spacing Calculator",
    slug="fruit-tree-spacing",
    summary=("How many fruit trees fit an orchard, and how far apart they should stand. Spacing "
             "depends on the rootstock far more than on the variety: a dwarf apple on M9 wants 3 m "
             "between trees, the same variety on a seedling rootstock wants 8 m."),
    fields=[
        num("area_ha", "Orchard area", 1, "ha", ""),
        num("row_m", "Between rows", 4, "m", "Usually 1.2–1.5 × the in-row spacing"),
        num("tree_m", "Between trees in the row", 3, "m", "3 m for a dwarf on M9, 7 m on a seedling rootstock"),
        num("pollinator_pct", "Pollinator rows", 20, "%", "Every fourth or fifth row, for cross-pollination"),
        num("trees", "Trees to plant", "", "", "", output=True),
        num("trees_per_ha", "Trees per hectare", "", "/ha", "", output=True),
        num("spacing_m2", "Space per tree", "", "m²", "", output=True),
        num("main_trees", "Trees of the main variety", "", "", "After the pollinator rows", output=True),
        num("hedge_ratio", "Row spacing ÷ tree spacing", "", "", "Around 1.25 for a modern hedge", output=True),
    ],
    dirs=[
        d("Orchard", "spacing_m2", "row_m*tree_m"),
        d("Orchard", "trees_per_ha", "10000/(row_m*tree_m)"),
        d("Orchard", "trees", "area_ha*10000/(row_m*tree_m)"),
        d("Orchard", "main_trees", "area_ha*10000/(row_m*tree_m)*(1-pollinator_pct/100)"),
        d("Orchard", "hedge_ratio", "row_m/tree_m"),
    ],
    formula=("Trees per hectare = 10 000 ÷ (row spacing × in-row spacing).  "
             "Trees to order = area in ha × trees per hectare"),
    symbols=[("rootstock", "the root system a variety is grafted onto; it sets the tree's vigour", "—"),
             ("in-row spacing", "distance between trees in the same row", "m"),
             ("hedge ratio", "row spacing divided by tree spacing", "—")],
    bands=[("1 000 – 1 500/ha", "Modern intensive", "dwarf trees on a trellis, 3 × 3.5 m"),
           ("400 – 800/ha", "Semi-intensive", "M26 or MM106 at 4.5 × 5 m"),
           ("100 – 250/ha", "Traditional standard", "seedling rootstock at 7 × 8 m")],
    notes=[
        "Dwarf trees crop earlier and are picked from the ground; standard trees need ladders but "
        "live far longer. The choice is about labour, not just yield.",
        "Pollination needs two different varieties that flower at the same time, and spacing must "
        "leave room for pollinator rows — often every fourth row.",
        "The hedge ratio matters for light: keep the row spacing at roughly 1.25 times the tree "
        "height that the mature canopy will reach.",
    ],
    mistakes=[
        "Using the variety's suggested spacing instead of the rootstock's, which is what actually "
        "determines vigour.",
        "Planting too close for the machinery, then having to remove every third tree in year eight.",
        "Forgetting that a windbreak costs the first and last rows some yield.",
    ],
    faq=[
        ("How many apple trees per hectare?", "About 1 100 for dwarf trees at 3 × 3 m, or 250 for "
         "standards at 7 × 6 m."),
        ("What spacing do dwarf trees need?", "3 m in the row and 3.5–4 m between rows, on a trellis."),
        ("Why keep pollinator rows?", "Most apple varieties are self-incompatible, so a different "
         "variety must flower at the same time within a bee's flight distance."),
        ("Why does row spacing exceed tree spacing?", "So light reaches the lower canopy and "
         "machinery can pass; the ratio is roughly 1.25."),
    ],
    related=[("/biology/plants-per-hectare", "Plants per hectare"),
             ("/biology/compost-application-rate", "Compost application"),
             ("/biology/crop-coefficient", "Crop coefficient")],
    svg=("bars", {"caption": "Trees per hectare by rootstock vigour",
                  "series": [("Dwarf 3 × 4 m", 833), ("Semi-dwarf 4.5 × 5 m", 444),
                             ("Standard 7 × 8 m", 178)]}),
    icon="sprout",
    keywords=["fruit tree spacing", "orchard density", "rootstock", "trees per hectare"],
    steps=[
        "Enter the area you have available in hectares.",
        "Choose the rootstock vigour — it sets the in-row spacing — and the row spacing your "
        "machinery needs.",
        "The number of trees and the planting density follow.",
    ],
))


# --------------------------------------------------- 3. lawn fertiliser rate
add(Spec(
    name="Lawn Fertilizer Rate Calculator",
    slug="lawn-fertilizer-rate",
    summary=("How much fertiliser to spread on a lawn, from the nitrogen rate you want and the "
             "analysis on the bag. Turf wants about 0.5–1 lb of actual nitrogen per 1 000 ft² per "
             "application, and the bag's first number tells you how much product that is."),
    fields=[
        num("area", "Lawn area", 5000, "ft²", "1 000 ft² is about 93 m²"),
        num("n_rate", "Nitrogen per application", 1, "lb N/1000 ft²", "0.5–1 for most cool-season turf"),
        num("n_pct", "Nitrogen in the product", 24, "%", "The first number on the bag, e.g. 24-0-11"),
        num("bag_lb", "Bag size", 50, "lb", ""),
        num("product_lb", "Product needed", "", "lb", "", output=True),
        num("bags", "Bags needed", "", "", "Round up when ordering", output=True),
        num("n_total", "Nitrogen applied overall", "", "lb", "", output=True),
        num("product_per_1000", "Product per 1 000 ft²", "", "lb", "", output=True),
        num("n_per_year", "Nitrogen over a season", "", "lb/1000 ft²", "Four applications at the rate above", output=True),
    ],
    dirs=[
        d("Rate", "product_per_1000", "n_rate/(n_pct/100)"),
        d("Rate", "product_lb", "area/1000*n_rate/(n_pct/100)"),
        d("Rate", "bags", "area/1000*n_rate/(n_pct/100)/bag_lb"),
        d("Rate", "n_total", "area/1000*n_rate"),
        d("Rate", "n_per_year", "n_rate*4"),
    ],
    formula=("Product (lb) = area ÷ 1 000 × N rate ÷ (N% ÷ 100).  "
             "A season of 2–4 lb N per 1 000 ft² is split across the growing season"),
    symbols=[("N rate", "pounds of actual nitrogen per 1 000 square feet", "lb/1000 ft²"),
             ("N%", "the first number in the fertiliser analysis, e.g. 24 in 24-0-11", "%"),
             ("1 000 ft²", "about 93 m², the standard unit of turf recommendations", "ft²")],
    bands=[("0.5 lb N/1000 ft²", "Light", "shaded or low-maintenance turf"),
           ("0.75 – 1 lb", "Standard", "the usual rate per application for a home lawn"),
           ("over 1.5 lb", "Too much", "burn risk, thatch and runoff; split it into two applications")],
    notes=[
        "The rate that matters is actual nitrogen, not product weight. A 24-0-11 bag delivers a "
        "quarter of its weight as nitrogen, which is why 1 lb of N needs about 4 lb of product.",
        "Total seasonal nitrogen for cool-season grass is 2–4 lb per 1 000 ft², split into three or "
        "four applications; warm-season grass wants 2–3 lb.",
        "Sweep anything that lands on paving back onto the lawn — nitrogen on hard surfaces goes "
        "straight to the storm drain.",
    ],
    mistakes=[
        "Setting the spreader by product weight instead of nitrogen rate, which over-applies the "
        "cheap high-analysis products.",
        "Applying a high-nitrogen product in midsummer heat, which burns the turf.",
        "Feeding in late autumn in a cold climate, which feeds the snow mould rather than the grass.",
    ],
    faq=[
        ("How much 24-0-11 do I need per 1 000 ft² for 1 lb of nitrogen?", "About 4.2 lb — divide "
         "1 lb by 0.24."),
        ("How often should I fertilise a lawn?", "Three to four times a year for cool-season grass, "
         "at 0.5–1 lb N per 1 000 ft² each time."),
        ("Is more nitrogen better?", "No. Beyond about 1.5 lb per application the grass burns, "
         "thatch builds up and the surplus runs off."),
    ],
    related=[("/biology/compost-application-rate", "Compost application"),
             ("/biology/gypsum-application-rate", "Gypsum application"),
             ("/biology/plants-per-hectare", "Plants per hectare")],
    svg=("bars", {"caption": "Product needed for 1 lb of nitrogen, by analysis",
                  "series": [("46-0-0", 2.2), ("24-0-11", 4.2), ("10-10-10", 10)]}),
    icon="sprout",
    keywords=["lawn fertilizer", "nitrogen rate", "fertiliser calculator", "turf"],
    steps=[
        "Measure the lawn area in square feet (an acre is 43 560 ft²).",
        "Enter the nitrogen rate you want and the first number from the bag's analysis.",
        "The pounds of product, the number of bags and the season's total nitrogen are shown.",
    ],
))


# ------------------------------------------------ 4. compost application
add(Spec(
    name="Compost Application Rate Calculator",
    slug="compost-application-rate",
    summary=("How much compost to spread, in cubic yards or tonnes, from the area and the depth you "
             "want. A garden bed usually takes 5–10 cm worked into the top 15 cm, a lawn a 1 cm "
             "top-dressing, and a farm a 5–20 tonne per hectare maintenance application."),
    fields=[
        num("area", "Area", 100, "m²", ""),
        num("depth_cm", "Depth", 5, "cm", "5–10 cm for a new bed, 1 cm for a lawn top-dressing"),
        num("density", "Bulk density of the compost", 0.55, "t/m³", "0.4 for strawy compost, 0.7 for a wet, heavy one"),
        num("volume", "Volume", "", "m³", "", output=True),
        num("cubic_yards", "Volume", "", "yd³", "", output=True),
        num("tonnes", "Mass", "", "t", "", output=True),
        num("per_ha", "Rate", "", "t/ha", "Compare with 5–20 t/ha for field maintenance", output=True),
        num("cost", "Cost at 40 per tonne", "", "", "Optional sanity check", output=True),
    ],
    dirs=[
        d("Volume", "volume", "area*depth_cm/100"),
        d("Volume", "cubic_yards", "area*depth_cm/100*1.30795"),
        d("Volume", "tonnes", "area*depth_cm/100*density"),
        d("Volume", "per_ha", "area*depth_cm/100*density/area*10000"),
        d("Volume", "cost", "area*depth_cm/100*density*40"),
    ],
    formula=("Volume (m³) = area (m²) × depth (m).  Tonnes = volume × bulk density.  "
             "1 m³ = 1.308 cubic yards"),
    symbols=[("bulk density", "mass per cubic metre of loose compost, 0.4–0.7 t/m³", "t/m³"),
             ("depth", "how thick the layer is spread", "cm"),
             ("t/ha", "tonnes per hectare, the field-scale unit", "t/ha")],
    bands=[("5 – 10 cm", "New bed", "worked into the top 15 cm to build organic matter"),
           ("1 – 2 cm", "Lawn top-dressing", "applied in spring and brushed in"),
           ("5 – 20 t/ha", "Field maintenance", "an annual or biennial application on arable land")],
    notes=[
        "Compost is sold by volume and spread by mass, so the bulk density is the number that "
        "converts one to the other. It varies by a factor of two between a dry strawy compost and a "
        "wet, heavy one.",
        "More is not better: above about 25 t/ha in one application, salt and phosphorus load can "
        "harm the soil and the water course.",
        "Compost shrinks as it matures. A cubic metre delivered today can be 20% smaller in a month, "
        "which matters if you are ordering to a finished depth.",
    ],
    mistakes=[
        "Ordering by weight when the supplier sells by the cubic yard, or the reverse.",
        "Spreading fresh, immature compost, which ties up nitrogen as it finishes breaking down.",
        "Assuming 1 m³ is 1 yard³ — it is 1.31 yard³, so a short order is a 24% shortfall.",
    ],
    faq=[
        ("How many cubic yards is 1 m³ of compost?", "1.31 cubic yards."),
        ("How deep should compost be on a new bed?", "5–10 cm, mixed into the top 15 cm of soil."),
        ("How much does a cubic metre of compost weigh?", "About 550 kg, or 0.4–0.7 tonnes "
         "depending on moisture."),
    ],
    related=[("/biology/gypsum-application-rate", "Gypsum application"),
             ("/biology/sulfur-soil-acidifier", "Sulfur to acidify"),
             ("/biology/lawn-fertilizer-rate", "Lawn fertiliser rate")],
    svg=("bars", {"caption": "Compost for 100 m² at different depths (m³)",
                  "series": [("1 cm", 1), ("5 cm", 5), ("10 cm", 10), ("15 cm", 15)]}),
    icon="sprout",
    keywords=["compost calculator", "application rate", "cubic yards", "top dressing"],
    steps=[
        "Enter the area you will cover in square metres.",
        "Set the depth you want and, if you know it, the bulk density of your compost.",
        "Read the volume in cubic metres and yards, and the mass in tonnes.",
    ],
))


# ------------------------------------------------ 5. gypsum application
add(Spec(
    name="Gypsum Application Rate Calculator",
    slug="gypsum-application-rate",
    summary=("Gypsum (calcium sulfate) adds calcium without raising pH, and it improves the "
             "structure of sodic clay soils. The rate depends on the soil's exchangeable sodium and "
             "its clay content — typically 0.5–2 tonnes per acre, or 1–5 tonnes per hectare."),
    fields=[
        num("area_ha", "Area", 1, "ha", ""),
        sel("texture", "Soil texture", [("Sand", "1.5"), ("Loam", "3"), ("Clay", "5")], "3",
            "Sets the tonnes per hectare for a one-unit pH-neutral treatment"),
        num("esp", "Exchangeable sodium percentage", 15, "%", "Above 15% the soil is sodic"),
        num("esp_target", "Target ESP", 5, "%", "Below 7% is considered non-sodic"),
        num("rate_tha", "Gypsum rate", "", "t/ha", "", output=True),
        num("total_t", "Gypsum needed", "", "t", "", output=True),
        num("bags_25kg", "25 kg bags", "", "", "", output=True),
    ],
    dirs=[
        d("Rate", "rate_tha", "texture*(esp-esp_target)/10"),
        d("Rate", "total_t", "area_ha*texture*(esp-esp_target)/10"),
        d("Rate", "bags_25kg", "area_ha*texture*(esp-esp_target)/10*40"),
    ],
    formula=("Gypsum (t/ha) = texture factor × (ESP − target ESP) ÷ 10, where the texture factor is "
             "1.5 for sand, 3 for loam and 5 for clay"),
    symbols=[("ESP", "exchangeable sodium percentage, the share of cation sites holding sodium", "%"),
             ("gypsum", "calcium sulfate dihydrate, CaSO₄·2H₂O", "—"),
             ("t/ha", "tonnes per hectare", "t/ha")],
    bands=[("under 1 t/ha", "Light", "a maintenance application on a slightly sodic soil"),
           ("1 – 3 t/ha", "Standard", "the usual correction for a loam at 15% ESP"),
           ("over 5 t/ha", "Heavy", "split across two seasons and follow with leaching water")],
    notes=[
        "Gypsum supplies calcium and sulfur but does not change pH. If the soil is also acid, lime "
        "is the amendment you want, not gypsum.",
        "Gypsum works by exchanging calcium for sodium on the clay, and the displaced sodium then "
        "needs water to leach away. Without drainage and leaching, the sodium stays.",
        "It is also the standard cure for clay dispersion and for subsoil acidity at depth, where "
        "lime cannot be incorporated.",
    ],
    mistakes=[
        "Applying gypsum to raise pH — it does not, and the mistake costs a season.",
        "Spreading the full rate in one pass on a heavy clay with no drainage.",
        "Ignoring the sodium: gypsum on a non-sodic soil does little for structure.",
    ],
    faq=[
        ("How much gypsum per hectare?", "1–3 t/ha for a loam at 15% ESP; up to 5 t/ha for a sodic "
         "clay."),
        ("Does gypsum lower pH?", "No. It is pH-neutral; use elemental sulfur or aluminium sulfate "
         "to acidify."),
        ("Can I apply gypsum with fertiliser?", "Yes, but not mixed with ammonium sulfate or "
         "superphosphate in the same hopper."),
    ],
    related=[("/biology/sulfur-soil-acidifier", "Sulfur to acidify"),
             ("/biology/compost-application-rate", "Compost application"),
             ("/biology/lawn-fertilizer-rate", "Lawn fertiliser rate")],
    svg=("bars", {"caption": "Gypsum rate (t/ha) for a loam at different ESP",
                  "series": [("ESP 10", 1.5), ("ESP 15", 3), ("ESP 25", 6)]}),
    icon="sprout",
    keywords=["gypsum rate", "sodic soil", "calcium sulfate", "soil amendment"],
    steps=[
        "Enter the area and the soil texture.",
        "Enter the exchangeable sodium percentage from a soil test and the level you are aiming for.",
        "Read the rate in tonnes per hectare, the total and the number of bags.",
    ],
))


# ------------------------------------------------ 6. sulfur to acidify soil
add(Spec(
    name="Sulfur Soil Acidifier Calculator",
    slug="sulfur-soil-acidifier",
    summary=("Elemental sulfur is how you lower soil pH without adding salt: soil bacteria oxidise "
             "it to sulfuric acid, which acidifies the soil over several months. The amount depends "
             "on how far the pH has to fall and on the texture — a sand needs a third of what a "
             "clay needs for the same change."),
    fields=[
        num("area", "Area", 100, "m²", ""),
        num("ph_now", "Current pH", 7.5, "pH", "From a soil test"),
        num("ph_target", "Target pH", 6.5, "pH", "Blueberries want 4.5–5.5, most vegetables 6–7"),
        sel("texture", "Soil texture", [("Sand", "0.5"), ("Loam", "1"), ("Clay", "1.5")], "1",
            "Multiplier on the base rate"),
        num("sulfur_kg", "Elemental sulfur", "", "kg", "", output=True),
        num("sulfur_kg_100", "Sulfur per 100 m²", "", "kg", "", output=True),
        num("sulfur_lb_1000", "Sulfur per 1 000 ft²", "", "lb", "", output=True),
        num("months", "Time to take effect", "", "months", "Sulfur needs warm, moist soil to oxidise", output=True),
        num("ph_drop", "pH change", "", "units", "", output=True),
    ],
    dirs=[
        # 1 kg per 10 m² lowers loam pH by about 0.5 unit, so the base rate is
        # 0.2 kg per m2 per pH unit, scaled by texture
        d("Sulfur", "ph_drop", "ph_now-ph_target"),
        d("Sulfur", "sulfur_kg", "area*(ph_now-ph_target)*texture*0.2"),
        d("Sulfur", "sulfur_kg_100", "(ph_now-ph_target)*texture*0.2*100"),
        d("Sulfur", "sulfur_lb_1000", "(ph_now-ph_target)*texture*0.2*9.29*10.7639/10"),
        d("Sulfur", "months", "(ph_now-ph_target)*texture*3"),
    ],
    formula=("Sulfur (kg) ≈ area (m²) × ΔpH × texture factor × 0.2.  "
             "One pH unit on a loam takes about 20 kg per 100 m² (≈ 4 lb per 100 ft²)"),
    symbols=[("ΔpH", "how many pH units you need to come down", "—"),
             ("S⁰", "elemental sulfur, oxidised by soil bacteria to sulfuric acid", "—"),
             ("texture factor", "0.5 for sand, 1 for loam, 1.5 for clay — clay buffers more", "—")],
    bands=[("under 0.5 unit", "Trim", "0.5–1 kg per 10 m² on a loam"),
           ("0.5 – 1 unit", "Typical", "apply in autumn so winter rain works it in"),
           ("over 1.5 units", "Large change", "split over two years and retest between")],
    notes=[
        "Sulfur is slow: the bacteria need warm, moist, aerated soil and it can take six months to a "
        "year. For a fast change use aluminium sulfate or a pH-adjusted mix, at the cost of adding "
        "salts.",
        "Never change pH by more than about one unit in a single season — the shift is uneven and the "
        "plants in the patch get shocked.",
        "Sulfur does not move far in soil. Incorporate it into the root zone rather than spreading "
        "it on the surface.",
    ],
    mistakes=[
        "Expecting a pH change within a week — elemental sulfur needs microbial oxidation.",
        "Using lime to raise pH and sulfur to lower it on the same bed in one season.",
        "Applying sulfur to dry soil in a cold month, where the bacteria do nothing at all.",
    ],
    faq=[
        ("How long does elemental sulfur take to lower pH?", "Three to twelve months, depending on "
         "temperature, moisture and how finely ground it is."),
        ("How much sulfur to lower pH by one unit?", "About 20 kg per 100 m² on a loam, roughly half "
         "that on sand and one and a half times on clay."),
        ("Is aluminum sulfate better?", "It acts within weeks, but adds aluminium and salt; sulfur "
         "is gentler and slower."),
    ],
    related=[("/biology/gypsum-application-rate", "Gypsum application"),
             ("/chemistry/buffer-ph", "Buffer pH"),
             ("/biology/compost-application-rate", "Compost application")],
    svg=("bars", {"caption": "Sulfur to lower pH by one unit, by texture (kg per 100 m²)",
                  "series": [("Sand", 10), ("Loam", 20), ("Clay", 30)]}),
    icon="sprout",
    keywords=["soil pH", "elemental sulfur", "acidify soil", "amendment"],
    steps=[
        "Enter the area and the pH from your soil test, plus the pH you want.",
        "Choose the texture; clay needs the most sulfur, sand the least.",
        "The sulfur to apply is given in kilograms and in pounds per 1 000 ft², with the months it "
        "will take.",
    ],
))


# ------------------------------------------------------- 7. crop coefficient
add(Spec(
    name="Crop Coefficient Calculator",
    slug="crop-coefficient",
    summary=("The crop coefficient converts the reference evapotranspiration of a well-watered "
             "grass crop into what your crop actually uses: ETc = Kc × ETo. It is the standard "
             "first step of irrigation scheduling, and the Kc changes with growth stage, so a maize "
             "field in July uses three times the water it used in June."),
    fields=[
        num("eto", "Reference evapotranspiration", 5, "mm/day", "From a weather station or a local "
            "network — the daily reference for grass"),
        num("kc", "Crop coefficient", 1.05, "", "0.3 at establishment, 1.0–1.2 mid-season"),
        num("etc", "Crop water use", "", "mm/day", "", output=True),
        num("litres_m2", "Crop water use", "", "L/m²/day", "1 mm on 1 m² is 1 litre", output=True),
        num("litres_ha", "Water per hectare", "", "m³/day", "", output=True),
        num("rain", "Effective rainfall", 0, "mm/day", "Leave at 0 if none"),
        num("irrigation", "Irrigation needed", "", "mm/day", "", output=True),
        num("weekly", "Irrigation per week", "", "mm", "", output=True),
    ],
    dirs=[
        d("Water use", "etc", "eto*kc"),
        d("Water use", "litres_m2", "eto*kc"),
        d("Water use", "litres_ha", "eto*kc*10"),
        d("Water use", "irrigation", "eto*kc-rain"),
        d("Water use", "weekly", "(eto*kc-rain)*7"),
    ],
    formula=("ETc = Kc × ETo.  Irrigation (mm) = ETc − effective rainfall.  "
             "1 mm over 1 ha is 10 m³ of water"),
    symbols=[("ETo", "reference evapotranspiration of a grass crop", "mm/day"),
             ("Kc", "crop coefficient, a factor by growth stage", "—"),
             ("ETc", "crop evapotranspiration, the water the crop actually uses", "mm/day")],
    bands=[("Kc 0.2 – 0.4", "Establishment", "bare soil and tiny plants lose little"),
           ("Kc 0.7 – 0.9", "Development", "canopy closing, water use climbing"),
           ("Kc 1.0 – 1.2", "Mid-season", "full canopy and maximum water use"),
           ("above 1.2", "Very high", "certain crops and orchard canopies, or advection")],
    notes=[
        "ETo is a property of the weather, Kc is a property of the crop, and their product is what "
        "the root zone must replace. Keeping the two separate is what makes the method portable "
        "between sites.",
        "The coefficient is not constant: for most field crops it runs 0.3 early, about 1.0 at full "
        "canopy, and 0.5 again at senescence.",
        "1 mm of water over 1 m² is 1 litre. That single identity converts every meteorological "
        "figure into a volume you can pump.",
    ],
    mistakes=[
        "Using a single Kc for the whole season instead of the growth-stage values.",
        "Treating rainfall as fully effective — heavy storms mostly run off.",
        "Scheduling by the calendar rather than by the accumulated ETc since the last irrigation.",
    ],
    faq=[
        ("What is a typical crop coefficient?", "About 1.0–1.2 at full canopy for most field crops, "
         "0.3 at establishment."),
        ("How much water is 1 mm of ETc per hectare?", "10 m³ — 1 mm over 10 000 m² is 10 m³."),
        ("Where do I get ETo?", "From a local weather network or a reference evapotranspiration "
         "service; it is calculated from temperature, humidity, wind and solar radiation."),
    ],
    related=[("/biology/plants-per-hectare", "Plants per hectare"),
             ("/ecology/water-demand", "Water demand"),
             ("/biology/lawn-fertilizer-rate", "Lawn fertiliser rate")],
    svg=("curve", {"caption": "Crop coefficient over a growing season",
                   "samples": [(0, 0.3), (30, 0.5), (60, 0.9), (90, 1.15), (120, 1.0), (150, 0.5)],
                   "axis": ("days after sowing", "Kc")}),
    icon="sprout",
    keywords=["crop coefficient", "Kc", "evapotranspiration", "irrigation scheduling"],
    steps=[
        "Enter the reference evapotranspiration from your weather source, in mm per day.",
        "Enter the crop coefficient for the growth stage the crop is in.",
        "Read the water use in mm and litres per square metre, and subtract any effective rainfall "
        "to get the irrigation needed.",
    ],
))


# -------------------------------------------------- 8. land equivalent ratio
add(Spec(
    name="Land Equivalent Ratio Calculator",
    slug="land-equivalent-ratio",
    summary=("The land equivalent ratio answers the only question that matters about intercropping: "
             "would two crops be better grown separately? LER is the sum, over every crop in the "
             "mixture, of its intercrop yield divided by its sole-crop yield. Above 1.0 the mixture "
             "wins, below 1.0 it loses."),
    fields=[
        num("y1i", "Crop 1 yield, intercropped", 3200, "kg/ha", ""),
        num("y1s", "Crop 1 yield, sole crop", 5000, "kg/ha", ""),
        num("y2i", "Crop 2 yield, intercropped", 1800, "kg/ha", ""),
        num("y2s", "Crop 2 yield, sole crop", 2500, "kg/ha", ""),
        num("ler", "Land equivalent ratio", "", "", "", output=True),
        num("partial1", "Crop 1 partial ratio", "", "", "", output=True),
        num("partial2", "Crop 2 partial ratio", "", "", "", output=True),
        num("advantage", "Land saved", "", "%", "The share of land the mixture saves", output=True),
    ],
    dirs=[
        d("LER", "partial1", "y1i/y1s"),
        d("LER", "partial2", "y2i/y2s"),
        d("LER", "ler", "y1i/y1s+y2i/y2s"),
        d("LER", "advantage", "(y1i/y1s+y2i/y2s-1)*100"),
    ],
    formula=("LER = (Y₁ᵢ ÷ Y₁ₛ) + (Y₂ᵢ ÷ Y₂ₛ).  Land saved (%) = (LER − 1) × 100"),
    symbols=[("Yᵢ", "yield of a crop in the intercrop", "kg/ha"),
             ("Yₛ", "yield of the same crop as a sole crop", "kg/ha"),
             ("LER", "land equivalent ratio, the land the mixture replaces", "—")],
    bands=[("LER above 1.2", "Strong advantage", "the mixture is worth the extra management"),
           ("LER 1.0 – 1.2", "Small advantage", "possible, but check the economics and the labour"),
           ("LER below 1.0", "Disadvantage", "grow the crops separately")],
    notes=[
        "An LER of 1.25 means the same total yield could only be produced from 1.25 ha of sole crops "
        "— so the mixture saves a quarter of the land.",
        "Compare like with like: the sole-crop yields must come from the same season, soil and "
        "management. Book values from another year will give a meaningless ratio.",
        "LER is a yield measure, not an economic one. A mixture that wins on land can still lose on "
        "labour, harvest timing and the price of the smaller crop.",
    ],
    mistakes=[
        "Adding yields in tonnes without dividing by the sole-crop yields, which ignores that the two "
        "crops are not comparable.",
        "Using a sole-crop yield from an unfertilised plot to flatter the intercrop.",
        "Reporting LER without saying which season and site the sole-crop reference came from.",
    ],
    faq=[
        ("What LER is worth intercropping?", "Above 1.1 to justify the extra management; the best "
         "cereal–legume systems reach 1.2–1.4."),
        ("What does LER 1.0 mean?", "The mixture produces exactly as much as the same land split "
         "between the two sole crops — no advantage."),
        ("Can LER exceed 2?", "In theory each crop could yield its sole-crop yield in half the land, "
         "but real systems rarely pass 1.5."),
    ],
    related=[("/biology/plants-per-hectare", "Plants per hectare"),
             ("/biology/crop-coefficient", "Crop coefficient"),
             ("/biology/biodiversity-index", "Biodiversity index")],
    svg=("bars", {"caption": "Partial land equivalent ratios in a cereal–legume intercrop",
                  "series": [("Cereal", 0.64), ("Legume", 0.72)]}),
    icon="sprout",
    keywords=["land equivalent ratio", "intercropping", "LER", "mixed cropping"],
    steps=[
        "Enter the yield of each crop grown in the mixture.",
        "Enter the yield of each crop grown alone, under the same management.",
        "Compare the total with 1.0; above it, the mixture is using land more efficiently.",
    ],
))


# ------------------------------------------------------ 9. stems per hectare
add(Spec(
    name="Stems Per Hectare Calculator",
    slug="stems-per-hectare",
    summary=("Stem counts for plantations and cane: given the row and stool spacing and the share "
             "that survives, how many harvestable stems a hectare will carry. It is the population "
             "that sets the tonnage, so getting it right is the difference between a full cane crop "
             "and a thin one."),
    fields=[
        num("area_ha", "Area", 1, "ha", ""),
        num("row_m", "Row spacing", 1.5, "m", "Sugarcane: 1.4–1.8 m"),
        num("stool_m", "Spacing along the row", 0.5, "m", "Distance between planting setts"),
        num("stems_per_stool", "Stems per stool", 6, "", "Tillering gives 5–10 in a good crop"),
        num("survival", "Survival", 85, "%", "Germination and overwintering losses"),
        num("stools", "Stools per hectare", "", "/ha", "", output=True),
        num("stems", "Stems per hectare", "", "/ha", "", output=True),
        num("total_stems", "Stems on the area", "", "", "", output=True),
        num("stems_m2", "Stems per square metre", "", "/m²", "", output=True),
    ],
    dirs=[
        d("Stems", "stools", "10000/(row_m*stool_m)"),
        d("Stems", "stems", "10000/(row_m*stool_m)*stems_per_stool*survival/100"),
        d("Stems", "total_stems", "area_ha*10000/(row_m*stool_m)*stems_per_stool*survival/100"),
        d("Stems", "stems_m2", "10000/(row_m*stool_m)*stems_per_stool*survival/100/10000"),
    ],
    formula=("Stools/ha = 10 000 ÷ (row spacing × stool spacing).  "
             "Stems/ha = stools/ha × stems per stool × survival"),
    symbols=[("stool", "the planted sett and the tillers that grow from it", "—"),
             ("survival", "share of stools that establish and overwinter", "%"),
             ("stems/ha", "harvestable stalks per hectare", "/ha")],
    bands=[("under 60 000/ha", "Thin", "a poor strike or wide rows; yield will disappoint"),
           ("60 000 – 120 000/ha", "Normal cane", "a well-established commercial crop"),
           ("over 150 000/ha", "Very dense", "lodging risk and thinner, lighter stalks")],
    notes=[
        "Yields scale with stem number up to a point; after that the stalks compete and each one "
        "weighs less, so the tonnage levels off.",
        "Sugarcane is counted in millable stalks, which excludes the small tillers that never "
        "mature — the survival figure should reflect that.",
        "For a timber or biomass plantation, the same arithmetic works with stems per hectare as the "
        "planted density, before thinning.",
    ],
    mistakes=[
        "Counting every tiller as a millable stalk and over-estimating the tonnage by a third.",
        "Using the planted spacing without any survival figure, which assumes every sett establishes.",
        "Comparing stem counts taken at different ages, before tillering has finished.",
    ],
    faq=[
        ("How many sugarcane stalks per hectare?", "60 000–120 000 millable stalks in a commercial "
         "crop."),
        ("How many stools per hectare at 1.5 × 0.5 m?", "About 13 300 — 10 000 ÷ 0.75."),
        ("Does more stems mean more sugar?", "Up to a point; excessive density lowers stalk weight "
         "and increases lodging."),
    ],
    related=[("/biology/plants-per-hectare", "Plants per hectare"),
             ("/biology/crop-coefficient", "Crop coefficient"),
             ("/biology/land-equivalent-ratio", "Land equivalent ratio")],
    svg=("bars", {"caption": "Stems per hectare by spacing (6 stems per stool, 85% survival)",
                  "series": [("1.5 × 0.5 m", 68000), ("1.8 × 0.5 m", 56667),
                             ("1.5 × 0.75 m", 45333)]}),
    icon="sprout",
    keywords=["stems per hectare", "sugarcane", "plant population", "stool"],
    steps=[
        "Enter the row spacing and the spacing between stools along the row.",
        "Enter how many harvestable stems a stool carries and the survival you expect.",
        "The stool count, stem count and stems per square metre follow.",
    ],
))


# ----------------------------------------------------- 10. cedar tree value
add(Spec(
    name="Standing Timber Value Calculator",
    slug="cedar-tree-value",
    summary=("What a standing tree is worth: estimate the board feet in the trunk from its diameter "
             "and merchantable height, then apply the price per board foot. It is the number a "
             "landowner needs before accepting an offer, and the one a logger uses to decide whether "
             "a tree is worth felling."),
    fields=[
        num("dbh", "Diameter at breast height", 40, "cm", "Measured 1.3 m above the ground"),
        num("height", "Merchantable height", 12, "m", "Up to the first major fork or the top log"),
        num("taper", "Taper allowance", 10, "%", "The trunk narrows towards the top"),
        num("price", "Price per board foot", 1.2, "", "Local mill price for the species and grade"),
        num("trees", "Number of trees", 1, "", ""),
        num("board_feet", "Volume", "", "board feet", "", output=True),
        num("cubic_m", "Volume", "", "m³", "", output=True),
        num("value", "Value per tree", "", "", "", output=True),
        num("total", "Value of the stand", "", "", "", output=True),
        num("dbh_in", "Diameter", "", "in", "", output=True),
    ],
    dirs=[
        d("Value", "dbh_in", "dbh/2.54"),
        # International 1/4-inch rule, the usual North American board-foot scale
        # Trunk volume as a cylinder of the mean diameter (which the taper
        # allowance reduces) times a form factor of 0.42 for a mature conifer;
        # one board foot is 0.002359737 m3.
        d("Value", "cubic_m",
          "pi/4*(dbh/100*(1-taper/200))^2*height*0.42"),
        d("Value", "board_feet",
          "pi/4*(dbh/100*(1-taper/200))^2*height*0.42/0.002359737"),
        d("Value", "value", "board_feet*price"),
        d("Value", "total", "board_feet*price*trees"),
    ],
    formula=("Volume (m³) = π/4 × (D × taper factor)² × H × 0.42, the form factor of a mature "
             "conifer.  Board feet = m³ ÷ 0.0023597.  Value = board feet × price"),
    symbols=[("DBH", "diameter at breast height, 1.3 m above the ground", "cm or in"),
             ("board foot", "144 cubic inches of sawn timber, 1 ft × 1 ft × 1 in", "—"),
             ("merchantable height", "the usable length of trunk", "m")],
    bands=[("under 30 cm DBH", "Pole", "pulp or firewood value, not sawtimber"),
           ("30 – 50 cm", "Small sawtimber", "the grade depends on knots and straightness"),
           ("over 60 cm", "Mature sawtimber", "worth calling a forester before selling")],
    notes=[
        "Board-foot rules are regional and approximate. The International ¼-inch rule, Scribner and "
        "Doyle each give different answers for the same tree — sometimes by 30%.",
        "Diameter is measured at breast height and inside the bark. A quick tape around the trunk "
        "gives the circumference, which divides by π to give the diameter.",
        "A standing tree is worth much less than its sawn volume: felling, hauling and milling take "
        "the majority of the retail price.",
    ],
    mistakes=[
        "Measuring the diameter with the bark on and not subtracting for it, which overstates the "
        "volume.",
        "Using the total height instead of the merchantable height to the first major fork.",
        "Comparing a stumpage (standing) price with a delivered log price, which differ severalfold.",
    ],
    faq=[
        ("How do I measure DBH with a tape?", "Measure the circumference at 1.3 m and divide by π; "
         "a 126 cm circumference is a 40 cm diameter."),
        ("What is a board foot?", "144 cubic inches — a piece 1 ft × 1 ft × 1 in thick, the standard "
         "unit of sawn timber in North America."),
        ("Why do two people get different volumes for the same tree?", "Different board-foot rules. "
         "State which one you used before comparing prices."),
    ],
    related=[("/biology/fruit-tree-spacing", "Fruit tree spacing"),
             ("/ecology/tree-benefits", "Tree benefits"),
             ("/construction/lumber", "Lumber calculator")],
    svg=("bars", {"caption": "Board feet in a 12 m merchantable trunk, by diameter",
                  "series": [("30 cm", 120), ("40 cm", 230), ("50 cm", 370), ("60 cm", 540)]}),
    icon="sprout",
    keywords=["tree value", "board feet", "timber", "DBH"],
    steps=[
        "Measure the diameter at 1.3 m and the merchantable height to the first major fork.",
        "Enter the local price per board foot for the species and grade.",
        "Read the volume in board feet and cubic metres, and the value per tree and for the stand.",
    ],
))
