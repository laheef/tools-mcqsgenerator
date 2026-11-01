"""Batch G — plant science, soil and agronomy."""

from lib import Spec, num, sel, d

SPECS: list[Spec] = []


def add(s: Spec) -> None:
    SPECS.append(s)


add(Spec(
    name="Growing Degree Days Calculator",
    slug="growing-degree-days",
    summary=("Growing degree days count the heat a crop has accumulated above its base temperature. "
             "They predict development far better than calendar days do, which is why sowing dates, "
             "variety maturity and pest emergence are all scheduled on them."),
    fields=[
        sel("method", "Method", [("Mean temperature, no cap", "0"),
                                 ("Cap the maximum at the upper cut-off", "1")], "0"),
        num("tmax", "Daily maximum", 33, "°C", ""),
        num("tmin", "Daily minimum", 12, "°C", ""),
        num("base", "Base temperature", 10, "°C", "10 °C for maize, 5 °C for wheat"),
        num("upper", "Upper cut-off", 30, "°C", "Growth stops above this in many models"),
        num("gdd", "Growing degree days for the day", "", "GDD", "", output=True),
        num("gdd_week", "Over seven days at this weather", "", "GDD", "", output=True),
        num("since_sowing", "Accumulated over 60 days", "", "GDD", "", output=True),
    ],
    dirs=[
        d("Degree days", "gdd", "if_else(method>0,max(0,(min(tmax,upper)+tmin)/2-base),max(0,(tmax+tmin)/2-base))"),
        d("Degree days", "gdd_week", "if_else(method>0,max(0,(min(tmax,upper)+tmin)/2-base),max(0,(tmax+tmin)/2-base))*7"),
        d("Degree days", "since_sowing", "if_else(method>0,max(0,(min(tmax,upper)+tmin)/2-base),max(0,(tmax+tmin)/2-base))*60"),
    ],
    formula="GDD = max(0, (T_max + T_min)/2 − T_base)",
    symbols=[("T_max, T_min", "daily maximum and minimum air temperature", "°C"),
             ("T_base", "temperature below which development stops", "°C"),
             ("GDD", "degree days accumulated in one day", "°C·day")],
    bands=[("0 GDD", "No development", "below the base temperature all day"),
           ("5 – 15 GDD/day", "Normal growing weather", "typical of a temperate summer"),
           ("above 25 GDD/day", "Very rapid", "heat that may also stress the crop")],
    notes=[
        "Base temperatures are crop-specific: 0 °C for cool-season grasses, 5 °C for wheat, 10 °C "
        "for maize and soybean, 15.5 °C for cotton.",
        "The upper cut-off matters in hot climates: without it, a 40 °C day adds heat the plant "
        "cannot use and maturity predictions come out early.",
        "Accumulate from sowing, not from 1 January, if you are timing a crop rather than a season.",
    ],
    mistakes=[
        "Using the mean of hourly readings instead of the daily maximum and minimum.",
        "Mixing Fahrenheit maxima with Celsius minima.",
        "Assuming a single GDD target fits every variety — early and late maturities differ by "
        "hundreds of degree days.",
    ],
    faq=[
        ("How many GDD does maize need to mature?",
         "About 2 400–2 800 GDD (50 °F base) depending on the hybrid; in Celsius-base-10 terms, "
         "roughly 1 300–1 500."),
        ("What if the minimum is below the base temperature?",
         "The standard method still uses the daily mean; more refined models floor each half-day at "
         "the base temperature."),
    ],
    related=[("/biology/crop-water-requirement", "Crop water requirement"),
             ("/biology/days-to-maturity", "Days to maturity"),
             ("/biology/q10-temperature-coefficient", "Q10 coefficient")],
    svg=("curve", {"caption": "Degree days accumulating across a season."}),
    icon="sprout",
))

add(Spec(
    name="NPK Fertilizer Blend Calculator",
    slug="npk-fertilizer-blend",
    summary=("A fertilizer grade such as 20-10-10 tells you the percentage of nitrogen, phosphate "
             "and potash by weight — not the mass to spread. This calculator converts a nutrient "
             "requirement into kilograms of product per hectare and the fill weight for a spreader."),
    fields=[
        num("n_need", "Nitrogen required", 120, "kg/ha", ""),
        num("p_need", "Phosphate required (P₂O₅)", 60, "kg/ha", ""),
        num("k_need", "Potash required (K₂O)", 60, "kg/ha", ""),
        num("n_pct", "N in the product", 20, "%", ""),
        num("p_pct", "P₂O₅ in the product", 10, "%", ""),
        num("k_pct", "K₂O in the product", 10, "%", ""),
        num("rate", "Product to apply (limited by N)", "", "kg/ha", "", output=True),
        num("rate_p", "Product limited by P", "", "kg/ha", "", output=True),
        num("rate_k", "Product limited by K", "", "kg/ha", "", output=True),
        num("bag", "Bags of 50 kg per hectare", "", "bags", "", output=True),
    ],
    dirs=[
        d("Blend", "rate", "n_need/n_pct*100"),
        d("Blend", "rate_p", "p_need/p_pct*100"),
        d("Blend", "rate_k", "k_need/k_pct*100"),
        d("Blend", "bag", "n_need/n_pct*100/50"),
    ],
    formula="Product (kg/ha) = nutrient required ÷ percentage in the product × 100",
    symbols=[("N, P₂O₅, K₂O", "nutrient requirement", "kg/ha"),
             ("grade", "percentage of each nutrient in the product", "%"),
             ("rate", "product needed", "kg/ha")],
    notes=[
        "The grade is by weight of N, P₂O₅ and K₂O — not elemental phosphorus and potassium. To "
        "convert, P₂O₅ × 0.44 = P and K₂O × 0.83 = K.",
        "A single blend rarely matches all three requirements, so the product rate is set by the "
        "nutrient that runs out first and the rest is topped up with straight fertilizers.",
        "Fertilizer grade percentages must sum to at most 100; a 20-10-10 blend is 40% nutrient and "
        "60% carrier.",
    ],
    mistakes=[
        "Treating P₂O₅ as elemental P, which overstates phosphate by a factor of 2.3.",
        "Dividing by the grade instead of multiplying by 100 ÷ grade.",
        "Ignoring the nutrient already in the soil test.",
    ],
    faq=[
        ("How much 20-10-10 gives 120 kg of nitrogen?",
         "600 kg per hectare — 120 ÷ 0.20."),
        ("Why does the bag count differ from the rate?",
         "Because bags are sold in fixed weights; divide the rate by the bag weight."),
    ],
    related=[("/biology/fertilizer-injector-ratio", "Fertilizer injector ratio"),
             ("/biology/lime-requirement", "Lime requirement"),
             ("/biology/crop-water-requirement", "Crop water requirement")],
    svg=("bars", {"caption": "Nutrient requirement against the product rate for each nutrient."}),
    icon="sprout",
))

add(Spec(
    name="Fertilizer Injector Ratio Calculator",
    slug="fertilizer-injector-ratio",
    summary=("Injector ratios tell you how much stock solution to mix so that the water reaching the "
             "plants carries the intended concentration. This calculator converts between a target "
             "ppm in the irrigation line, the injector ratio and the weight of fertilizer for a stock "
             "tank of any size."),
    fields=[
        num("target", "Target nitrogen in the line", 150, "ppm", ""),
        num("n_pct", "Nitrogen in the fertilizer", 20, "%", ""),
        num("ratio", "Injector ratio", 100, ":1", "1:100 means 1 part stock to 99 parts water"),
        num("tank", "Stock tank size", 200, "L", ""),
        num("stock_ppm", "Stock concentration", "", "ppm", "", output=True),
        num("per_litre", "Fertilizer per litre of stock", "", "g/L", "", output=True),
        num("per_tank", "Fertilizer per tank", "", "kg", "", output=True),
    ],
    dirs=[
        d("Injection", "stock_ppm", "target*ratio"),
        d("Injection", "per_litre", "target*ratio/n_pct/100/1000"),
        d("Injection", "per_tank", "target*ratio/n_pct/100/1000*tank"),
    ],
    formula="Stock ppm = line ppm × injector ratio;  grams per litre = stock ppm ÷ (%N × 10)",
    symbols=[("target", "desired concentration in the irrigation line", "ppm"),
             ("ratio", "dilution factor of the injector", ":1"),
             ("%N", "nitrogen content of the fertilizer", "%")],
    notes=[
        "A 1:100 injector makes the stock 100 times stronger than the line, so a 150 ppm target "
        "needs 15 000 ppm in the tank.",
        "Weigh fertilizers in grams per litre of stock, then check the electrical conductivity — it "
        "rises with concentration and is the quickest in-field check that the mix is right.",
        "Nitrogen sources differ: calcium nitrate and ammonium nitrate carry different amounts of "
        "calcium and ammonium, which matters for pH drift in the root zone.",
    ],
    mistakes=[
        "Confusing 1:100 with 1:99 — the difference is small for the stock strength but large for "
        "water accounting.",
        "Mixing the stock in the irrigation line instead of the tank.",
        "Using a fertilizer percentage as a decimal in one place and a percentage in another.",
    ],
    faq=[
        ("How do I mix 100 ppm nitrogen with 20% fertilizer at 1:100?",
         "50 g per litre of stock — 100 × 100 ÷ (20 × 10)."),
        ("Does the injector ratio affect the final EC?",
         "Yes: the line EC is set by the diluted concentration, so a stronger stock at a higher ratio "
         "can deliver the same EC."),
    ],
    related=[("/biology/npk-fertilizer-blend", "NPK fertilizer blend"),
             ("/chemistry/ppm-to-molarity", "ppm to molarity"),
             ("/biology/crop-water-requirement", "Crop water requirement")],
    svg=("chain", {"caption": "Line concentration, injector ratio and stock weight."}),
    icon="sprout",
))

add(Spec(
    name="Crop Water Requirement Calculator (ETc)",
    slug="crop-water-requirement",
    summary=("A crop's water use is the reference evapotranspiration multiplied by a crop "
             "coefficient: ETc = Kc × ETo. This calculator gives daily and seasonal water use per "
             "hectare, the irrigation volume and how long a system must run to deliver it."),
    fields=[
        num("eto", "Reference evapotranspiration (ETo)", 5.4, "mm/day", "From a weather station or FAO-56"),
        num("kc", "Crop coefficient (Kc)", 1.05, "", "1.05 is a typical mid-season value"),
        num("area", "Area", 1, "ha", ""),
        num("efficiency", "Irrigation efficiency", 80, "%", "Drip 90%, sprinkler 75%, furrow 60%"),
        num("etc", "Crop water use", "", "mm/day", "", output=True),
        num("season", "Seasonal use (120 days)", "", "mm", "", output=True),
        num("volume", "Volume to apply per hectare", "", "m³/ha/day", "", output=True),
        num("hours", "Hours a 10 m³/h system must run", "", "h", "", output=True),
    ],
    dirs=[
        d("Water use", "etc", "eto*kc"),
        d("Water use", "season", "eto*kc*120"),
        d("Water use", "volume", "eto*kc*10/(efficiency/100)"),
        d("Water use", "hours", "eto*kc*10/(efficiency/100)/area/10"),
    ],
    formula="ETc = Kc × ETo;  volume (m³/ha) = ETc (mm) × 10 ÷ efficiency",
    symbols=[("ETo", "reference evapotranspiration", "mm/day"),
             ("Kc", "crop coefficient for the growth stage", "—"),
             ("ETc", "crop evapotranspiration", "mm/day")],
    notes=[
        "One millimetre over one hectare is 10 m³ of water — the conversion that makes irrigation "
        "arithmetic easy.",
        "Kc changes through the season: about 0.3 at emergence, 1.0–1.2 at mid-season, and falling "
        "as the crop senesces.",
        "Irrigation efficiency divides the requirement: 80% efficiency means a fifth of the water "
        "never reaches the root zone.",
    ],
    mistakes=[
        "Using a single Kc for the whole season.",
        "Treating mm as litres per square metre — they are numerically equal, which is a help, not "
        "a licence to mix the units.",
        "Ignoring rainfall, which reduces the irrigation requirement.",
    ],
    faq=[
        ("What is a typical Kc?",
         "0.3 for bare soil, 0.7 for early growth, 1.0–1.2 at full canopy, 0.5 at senescence."),
        ("How much water is 5 mm/day per hectare?",
         "50 m³ per hectare per day."),
    ],
    related=[("/biology/growing-degree-days", "Growing degree days"),
             ("/biology/field-capacity", "Field capacity"),
             ("/biology/plant-available-water", "Plant available water")],
    svg=("bars", {"caption": "Reference ET, the crop coefficient, and the water it implies."}),
    icon="sprout",
))

add(Spec(
    name="Crop Water Stress Index Calculator",
    slug="crop-water-stress-index",
    summary=("The crop water stress index compares a canopy temperature with the wet and dry reference "
             "surfaces around it: 0 means a well-watered crop transpiring freely, 1 means a fully "
             "closed stomata. It is the standard way to turn a thermal image into an irrigation "
             "decision."),
    fields=[
        num("tc", "Canopy temperature", 28.5, "°C", ""),
        num("twet", "Wet reference temperature", 22, "°C", "A fully transpiring surface"),
        num("tdry", "Dry reference temperature", 36, "°C", "A non-transpiring surface"),
        num("cswi", "Crop water stress index", "", "", "", output=True),
        num("depletion", "Estimated root-zone depletion", "", "%", "", output=True),
        num("stress", "Stress class", "", "", "", output=True),
    ],
    dirs=[
        d("Stress", "cswi", "(tc-twet)/(tdry-twet)"),
        d("Stress", "depletion", "(tc-twet)/(tdry-twet)*100"),
        d("Stress", "stress", "(tc-twet)/(tdry-twet)*3"),
    ],
    formula="CWSI = (T_c − T_wet) ÷ (T_dry − T_wet)",
    symbols=[("T_c", "canopy temperature", "°C"),
             ("T_wet", "temperature of a well-watered reference surface", "°C"),
             ("T_dry", "temperature of a dry, non-transpiring surface", "°C")],
    bands=[("0 – 0.2", "No stress", "transpiring freely; irrigate on schedule"),
           ("0.2 – 0.4", "Mild stress", "the usual trigger for scheduling"),
           ("0.4 – 0.7", "Moderate stress", "yield is beginning to be affected"),
           ("above 0.7", "Severe stress", "stomata closed; growth has stopped")],
    notes=[
        "The wet and dry references can be measured (wet and dry paper discs beside the canopy) or "
        "computed from air temperature and humidity.",
        "Thermal readings need to be taken near solar noon, from a nadir angle, with the canopy "
        "filling the field of view.",
        "CWSI rises before visible wilting, which is the point: it gives a day or two of warning.",
    ],
    mistakes=[
        "Measuring the canopy from an oblique angle, which mixes in soil temperature.",
        "Using air temperature as the wet reference — a transpiring surface is usually cooler.",
        "Comparing CWSI between days with very different vapour pressure deficits.",
    ],
    faq=[
        ("What CWSI should trigger irrigation?",
         "Most scheduling programmes use 0.3–0.4 as the threshold; sensitive crops prefer the lower "
         "end."),
        ("Can CWSI be negative?",
         "Yes — a canopy cooler than the wet reference means unusually high transpiration, often "
         "after irrigation."),
    ],
    related=[("/biology/crop-water-requirement", "Crop water requirement"),
             ("/biology/stomatal-density", "Stomatal density"),
             ("/biology/transpiration-rate", "Transpiration rate")],
    svg=("gauge", {"caption": "Canopy temperature between the wet and dry references."}),
    icon="sprout",
))

add(Spec(
    name="Field Capacity and Plant Available Water Calculator",
    slug="plant-available-water",
    summary=("Plant available water is what a soil holds between field capacity and the permanent "
             "wilting point. It decides how long a crop can go between irrigations, and it is one of "
             "the few soil properties worth measuring once because it barely changes."),
    fields=[
        num("fc", "Field capacity", 32, "%", "Volumetric water content"),
        num("pwp", "Permanent wilting point", 15, "%", ""),
        num("depth", "Rooting depth", 600, "mm", ""),
        num("current", "Current water content", 24, "%", ""),
        num("paw", "Plant available water", "", "%", "", output=True),
        num("paw_mm", "Available water in the root zone", "", "mm", "", output=True),
        num("deficit", "Deficit to refill", "", "mm", "", output=True),
        num("days", "Days until wilting at 5 mm/day", "", "days", "", output=True),
    ],
    dirs=[
        d("Water", "paw", "fc-pwp"),
        d("Water", "paw_mm", "(fc-pwp)/100*depth"),
        d("Water", "deficit", "(fc-current)/100*depth"),
        d("Water", "days", "(current-pwp)/100*depth/5"),
    ],
    formula="PAW (%) = FC − PWP;  PAW (mm) = PAW% ÷ 100 × rooting depth",
    symbols=[("FC", "field capacity, volumetric", "%"),
             ("PWP", "permanent wilting point, volumetric", "%"),
             ("PAW", "plant available water", "% or mm")],
    bands=[("below 10%", "Low", "sand and gravel; irrigate little and often"),
           ("10 – 20%", "Moderate", "sandy loam; the common middle ground"),
           ("above 20%", "High", "clay loam and peat; long intervals between irrigations")],
    notes=[
        "Sands hold little plant available water even though they drain freely; clays hold a lot but "
        "release it slowly.",
        "The mm figure is what an irrigation schedule works in: 51 mm of available water at 5 mm/day "
        "is about ten days of buffer.",
        "Field capacity and wilting point are measured on undisturbed cores — a texture class "
        "conversion is only a rough guide.",
    ],
    mistakes=[
        "Using gravimetric water content as if it were volumetric.",
        "Applying the same rooting depth to seedlings and mature plants.",
        "Ignoring compaction, which cuts rooting depth far below the value in the table.",
    ],
    faq=[
        ("How long can a crop go between irrigations?",
         "Divide the available water in the root zone by the daily crop water use."),
        ("Why does clay hold more water than sand but wilt sooner?",
         "Because much of the water in clay is held too tightly for roots to extract."),
    ],
    related=[("/biology/crop-water-requirement", "Crop water requirement"),
             ("/biology/crop-water-stress-index", "Crop water stress index"),
             ("/biology/field-capacity", "Field capacity")],
    svg=("bars", {"caption": "Saturation, field capacity, wilting point, and what roots can reach."}),
    icon="sprout",
))

add(Spec(
    name="Field Capacity Calculator",
    slug="field-capacity",
    summary=("Field capacity is the water a soil retains after excess has drained away — the upper "
             "limit of what a root zone can store. This calculator derives it from a wet and a dry "
             "sample weight, and reports the porosity and bulk density that go with it."),
    fields=[
        num("wet", "Wet soil mass", 620, "g", ""),
        num("dry", "Oven-dry soil mass", 500, "g", ""),
        num("volume", "Core volume", 300, "cm³", ""),
        num("fc", "Field capacity (gravimetric)", "", "%", "", output=True),
        num("vol", "Field capacity (volumetric)", "", "%", "", output=True),
        num("bulk", "Bulk density", "", "g/cm³", "", output=True),
        num("water", "Water stored in the root zone", "", "mm", "", output=True),
    ],
    dirs=[
        d("Soil water", "fc", "(wet-dry)/dry*100"),
        d("Soil water", "vol", "(wet-dry)/volume*100"),
        d("Soil water", "bulk", "dry/volume"),
        d("Soil water", "water", "(wet-dry)/volume*100*600/100"),
    ],
    formula="Gravimetric FC = (wet − dry) ÷ dry × 100;  volumetric = (wet − dry) ÷ volume × 100",
    symbols=[("wet", "mass at field capacity", "g"),
             ("dry", "oven-dry mass at 105 °C", "g"),
             ("volume", "volume of the undisturbed core", "cm³")],
    notes=[
        "Oven-dry means 105 °C to constant mass; a domestic oven at 100 °C leaves a percent or two "
        "of water behind.",
        "Volumetric water content is the version irrigation models use, because roots explore volume "
        "rather than mass.",
        "Bulk density above about 1.6 g/cm³ in a loam signals compaction, which lowers both "
        "infiltration and rooting depth.",
    ],
    mistakes=[
        "Drying at too low a temperature and treating the result as oven-dry.",
        "Using a disturbed sample, which loses the pore structure that holds the water.",
        "Reporting gravimetric values where a volumetric figure is expected.",
    ],
    faq=[
        ("What is field capacity in mm?",
         "Volumetric water content × rooting depth in mm — 30% over 600 mm is 180 mm."),
        ("How long does drainage take?",
         "Two to three days in most soils after saturation."),
    ],
    related=[("/biology/plant-available-water", "Plant available water"),
             ("/biology/crop-water-requirement", "Crop water requirement"),
             ("/biology/solute-potential", "Solute potential")],
    svg=("bars", {"caption": "Wet mass, dry mass and the water held between them."}),
    icon="sprout",
))

add(Spec(
    name="Seeding Rate and Plants per Hectare Calculator",
    slug="seeding-rate",
    summary=("Seed rate depends on the target plant population, thousand-seed weight and germination: "
             "you must sow more seed than the plants you want, because some will not establish. This "
             "calculator gives the seed weight per hectare and per square metre."),
    fields=[
        num("target", "Target plants", 300000, "plants/ha", ""),
        num("tsw", "Thousand seed weight", 40, "g", ""),
        num("germination", "Germination", 92, "%", ""),
        num("establishment", "Field establishment", 90, "%", "Survival of germinated seedlings"),
        num("rate", "Seed rate", "", "kg/ha", "", output=True),
        num("per_m2", "Seeds per square metre", "", "seeds/m²", "", output=True),
        num("row", "Seeds per metre of row", "", "seeds/m", "At 25 cm row spacing", output=True),
        num("spacing", "Plant spacing in the row", "", "cm", "", output=True),
    ],
    dirs=[
        d("Seed rate", "rate", "target*tsw/1000/1000/(germination/100)/(establishment/100)"),
        d("Seed rate", "per_m2", "target/10000/(germination/100)/(establishment/100)"),
        d("Seed rate", "row", "target/10000/(germination/100)/(establishment/100)*0.25"),
        d("Seed rate", "spacing", "100/target/10000/(germination/100)/(establishment/100)*0.25/0.25"),
    ],
    formula="Seed rate (kg/ha) = target plants × TSW ÷ 10⁶ ÷ germination ÷ establishment",
    symbols=[("target", "plants wanted at harvest", "plants/ha"),
             ("TSW", "thousand seed weight", "g"),
             ("germination", "laboratory germination", "%"),
             ("establishment", "field survival of germinated seed", "%")],
    notes=[
        "Thousand seed weight is the single most useful seed-lot measurement: it converts a plant "
        "target into kilograms without any guessing.",
        "Germination and field establishment are separate: a lot can germinate at 95% in the "
        "laboratory and still establish at 80% in a rough seedbed.",
        "Every doubling of target population roughly halves the plants per metre of row, which is "
        "where competition, lodging and disease pressure are decided.",
    ],
    mistakes=[
        "Using laboratory germination as if it were field establishment.",
        "Confusing thousand seed weight with seed weight per plant.",
        "Calculating for the target population rather than the sown population.",
    ],
    faq=[
        ("How do I convert a seed rate to seeds per square metre?",
         "Divide the seed weight per hectare by the thousand seed weight and multiply by 1 000 ÷ 10 000."),
        ("Why sow more than the target?",
         "Because a proportion of seeds never germinate or never establish."),
    ],
    related=[("/biology/thousand-seed-weight", "Thousand seed weight"),
             ("/biology/percent-germination", "Percent germination"),
             ("/biology/growing-degree-days", "Growing degree days")],
    svg=("chain", {"caption": "Target plants, seed weight and germination to a seed rate."}),
    icon="sprout",
))

add(Spec(
    name="Percent Germination Calculator",
    slug="percent-germination",
    summary=("Percent germination is germinated seeds divided by seeds sown — the number on a seed "
             "packet, and the number that decides how much seed to buy. This calculator adds the "
             "viability and vigour figures that explain a low result."),
    fields=[
        num("germinated", "Seeds germinated", 88, "seeds", ""),
        num("sown", "Seeds sown", 100, "seeds", ""),
        num("dead", "Seeds rotted or dead", 5, "seeds", "Optional — separates non-viable from dormant"),
        num("germination", "Germination", "", "%", "", output=True),
        num("viability", "Viability (germinated + dormant)", "", "%", "", output=True),
        num("seed_needed", "Seeds needed for 10 000 plants", "", "seeds", "", output=True),
        num("sow_rate", "Sowing rate for 1 000 plants/m²", "", "seeds/m²", "", output=True),
    ],
    dirs=[
        d("Germination", "germination", "germinated/sown*100"),
        d("Germination", "viability", "(sown-dead)/sown*100"),
        d("Germination", "seed_needed", "10000/(germinated/sown)"),
        d("Germination", "sow_rate", "1000/(germinated/sown)"),
    ],
    formula="Germination (%) = germinated ÷ sown × 100",
    symbols=[("germinated", "seeds that produced a normal seedling", "seeds"),
             ("sown", "seeds placed on the test", "seeds"),
             ("germination", "the percentage", "%")],
    bands=[("above 90%", "Excellent", "sow at the planned rate"),
           ("70 – 90%", "Acceptable", "increase the rate by the shortfall"),
           ("below 70%", "Poor", "check storage, seed lot age and test conditions")],
    notes=[
        "Standard tests count normal seedlings under specified conditions — 20 °C for most "
        "vegetables, alternating temperatures for grasses.",
        "Dormant seed is viable but not counted as germinated; a tetrazolium test separates dormancy "
        "from death.",
        "Vigour (how fast and uniformly seedlings emerge) predicts field establishment better than "
        "germination percentage alone.",
    ],
    mistakes=[
        "Counting abnormal seedlings as germinated.",
        "Testing too few seeds — 100 is the minimum for a useful percentage.",
        "Testing freshly harvested seed that is still dormant.",
    ],
    faq=[
        ("How many seeds do I need for a 95% germination rate and 10 000 plants?",
         "About 10 526 seeds."),
        ("Why is field emergence lower than the test result?",
         "Soil temperature, crusting, pathogens and sowing depth all reduce it."),
    ],
    related=[("/biology/seeding-rate", "Seeding rate"),
             ("/biology/thousand-seed-weight", "Thousand seed weight"),
             ("/biology/growing-degree-days", "Growing degree days")],
    svg=("bars", {"caption": "Germinated, dormant and dead seed in a test lot."}),
    icon="sprout",
))

add(Spec(
    name="Thousand Seed Weight Calculator",
    slug="thousand-seed-weight",
    summary=("Thousand seed weight — the mass of a thousand seeds — converts plant populations into "
             "kilograms of seed and is the fastest way to compare seed lots. This calculator "
             "standardises a sample of any size to the standard TSW figure and gives the seed count "
             "per kilogram."),
    fields=[
        num("sample_mass", "Sample mass", 4.2, "g", ""),
        num("sample_count", "Seeds in the sample", 100, "seeds", ""),
        num("moisture", "Moisture content", 12, "%", "Optional — standard is 12–14%"),
        num("tsw", "Thousand seed weight", "", "g", "", output=True),
        num("seeds_kg", "Seeds per kilogram", "", "seeds/kg", "", output=True),
        num("tsw_dry", "TSW at 12% moisture", "", "g", "", output=True),
        num("seed_per_g", "Seeds per gram", "", "", "", output=True),
    ],
    dirs=[
        d("Seed weight", "tsw", "sample_mass/sample_count*1000"),
        d("Seed weight", "seeds_kg", "1000/(sample_mass/sample_count*1000)*1000"),
        d("Seed weight", "tsw_dry", "sample_mass/sample_count*1000*(88/(100-moisture))"),
        d("Seed weight", "seed_per_g", "sample_count/sample_mass"),
    ],
    formula="TSW (g) = sample mass ÷ seeds in the sample × 1 000",
    symbols=[("sample mass", "mass of the counted seeds", "g"),
             ("sample count", "number of seeds weighed", "seeds"),
             ("TSW", "thousand seed weight", "g")],
    notes=[
        "Count at least 100 seeds and weigh to 0.01 g; the error in TSW falls as the square root of "
        "the count, so a 100-seed sample is about ±5%.",
        "Moisture matters: the same lot is heavier at 14% than at 10%, which is why standards quote "
        "TSW at a stated moisture.",
        "TSW is a variety and seed-lot trait — it also predicts seedling vigour, because bigger seeds "
        "carry more reserves.",
    ],
    mistakes=[
        "Weighing a scoop instead of counting the seeds in it.",
        "Comparing TSW between lots at different moisture contents.",
        "Using field-run seed (with chaff) in a weight-based rate calculation.",
    ],
    faq=[
        ("What is a typical thousand seed weight?",
         "40 g for wheat, 300 g for maize, 150 g for soybean, 4 g for oilseed rape."),
        ("How does TSW affect seeding rate?",
         "Directly and proportionally: doubling TSW doubles the kilograms needed for the same plant "
         "population."),
    ],
    related=[("/biology/seeding-rate", "Seeding rate"),
             ("/biology/percent-germination", "Percent germination"),
             ("/biology/days-to-maturity", "Days to maturity")],
    svg=("chain", {"caption": "A counted sample scaled to a thousand seeds."}),
    icon="sprout",
))

add(Spec(
    name="Days to Maturity Calculator",
    slug="days-to-maturity",
    summary=("Days to maturity tells you whether a crop will finish before the season does. This "
             "calculator converts a variety's maturity rating into a calendar date, adjusting for "
             "sowing date and the heat the season is actually delivering."),
    fields=[
        num("sow_day", "Sowing day of year", 120, "day", "1 January = 1"),
        num("dtm", "Days to maturity", 95, "days", ""),
        num("gdd_target", "GDD to maturity", 1400, "GDD", "Optional — use instead of days"),
        num("gdd_per_day", "Average GDD per day", 13, "GDD/day", ""),
        num("harvest_day", "Harvest day of year", "", "day", "", output=True),
        num("harvest_month", "Harvest month", "", "", "", output=True),
        num("gdd_days", "Days implied by the GDD target", "", "days", "", output=True),
        num("slack", "Days remaining after harvest (season 220 days)", "", "days", "", output=True),
    ],
    dirs=[
        d("Maturity", "harvest_day", "sow_day+dtm"),
        d("Maturity", "harvest_month", "min(12,1+round((sow_day+dtm-15)/30))"),
        d("Maturity", "gdd_days", "gdd_target/gdd_per_day"),
        d("Maturity", "slack", "220-(sow_day+dtm)"),
    ],
    formula="Harvest day = sowing day + days to maturity",
    symbols=[("sowing day", "day of year the crop was sown", "day"),
             ("DTM", "days to maturity for the variety", "days"),
             ("GDD", "heat required, an alternative to DTM", "°C·day")],
    notes=[
        "Catalogue days-to-maturity ratings assume a reference temperature; a cool season stretches "
        "them and a hot one shortens them, which is why GDD is the better input.",
        "Divide the GDD target by the average daily accumulation to get days — a crop needing 1 400 "
        "GDD at 13 GDD/day takes about 108 days.",
        "Late sowing in a shortening season often needs a shorter-maturity variety rather than more "
        "inputs.",
    ],
    mistakes=[
        "Counting from emergence in one place and from sowing in another.",
        "Using last year's GDD accumulation for this year's forecast.",
        "Assuming a fixed harvest date ignores the difference between physiological and harvest "
        "maturity.",
    ],
    faq=[
        ("What does days to maturity mean?",
         "The number of days from sowing (or transplanting) to a marketable or physiologically mature "
         "crop."),
        ("Why does my crop mature later than the packet says?",
         "Cooler than expected weather; the rating assumes a reference temperature."),
    ],
    related=[("/biology/growing-degree-days", "Growing degree days"),
             ("/biology/seeding-rate", "Seeding rate"),
             ("/biology/crop-water-requirement", "Crop water requirement")],
    svg=("chain", {"caption": "Sowing date plus maturity rating gives the harvest date."}),
    icon="sprout",
))

add(Spec(
    name="Stomatal Density Calculator",
    slug="stomatal-density",
    summary=("Stomatal density is the number of stomata per square millimetre of leaf surface — the "
             "structural limit on how fast a leaf can take up carbon dioxide. This calculator "
             "converts a count in a microscope field into density per mm² and per cm²."),
    fields=[
        num("stomata", "Stomata counted", 46, "stomata", ""),
        num("fields", "Fields counted", 5, "", ""),
        num("diameter", "Field of view diameter", 2.2, "mm", "From the microscope magnification"),
        num("spi", "Stomatal pore index (optional)", 0.0021, "mm²", "Mean pore area × density"),
        num("density", "Stomatal density", "", "per mm²", "", output=True),
        num("per_cm2", "Stomatal density", "", "per cm²", "", output=True),
        num("area", "Area sampled", "", "mm²", "", output=True),
        num("index", "Pore index", "", "", "", output=True),
    ],
    dirs=[
        d("Density", "area", "fields*3.14159265358979*pow(diameter/2,2)"),
        d("Density", "density", "stomata/(fields*3.14159265358979*pow(diameter/2,2))"),
        d("Density", "per_cm2", "stomata/(fields*3.14159265358979*pow(diameter/2,2))*100"),
        d("Density", "index", "stomata/(fields*3.14159265358979*pow(diameter/2,2))*spi"),
    ],
    formula="Density = stomata ÷ (fields × π × (diameter/2)²)",
    symbols=[("stomata", "stomata counted across all fields", "stomata"),
             ("fields", "number of microscope fields", "fields"),
             ("diameter", "field-of-view diameter at that magnification", "mm")],
    bands=[("below 100 per mm²", "Low", "thick-leaved, shade or water-limited species"),
           ("100 – 300", "Typical", "most mesophytic crop and wild species"),
           ("above 400", "High", "sun-adapted grasses and fast-growing herbs")],
    notes=[
        "Count on the abaxial (lower) surface of a dicot leaf and either surface of a grass; the two "
        "surfaces differ by a factor of two or more.",
        "Stomatal density falls with rising atmospheric CO₂ and rises with growth temperature and "
        "light — which is why fossil leaves are used as palaeoclimate proxies.",
        "Density is not conductance: guard-cell aperture and behaviour matter as much as count.",
    ],
    mistakes=[
        "Forgetting to convert the field diameter from micrometres.",
        "Counting only the top surface of a leaf whose stomata are mostly underneath.",
        "Using a nail-varnish peel without noting which surface it came from.",
    ],
    faq=[
        ("How do I calculate stomatal density?",
         "Divide the number of stomata by the area of the field(s) they were counted in."),
        ("What is the stomatal ratio?",
         "Density on the upper surface divided by density on the lower, about 0 for most trees and "
         "about 1 for grasses."),
    ],
    related=[("/biology/transpiration-rate", "Transpiration rate"),
             ("/biology/crop-water-stress-index", "Crop water stress index"),
             ("/biology/photosynthesis-rate", "Photosynthesis rate")],
    svg=("grid", {"caption": "A counted field, scaled to a square millimetre.",
                  "cells": [["", "Field", "mm²"], ["Count", "46", "—"], ["Area", "5", "19.0"]]}),
    icon="microscope",
))

add(Spec(
    name="Plant Population Calculator",
    slug="plant-population",
    summary=("Plant population is determined by row spacing and within-row spacing: it is the geometry "
             "of the field, not the seeding rate. This calculator converts spacing into plants per "
             "hectare and per square metre, and back again."),
    fields=[
        num("row_spacing", "Row spacing", 75, "cm", ""),
        num("plant_spacing", "Within-row spacing", 20, "cm", ""),
        num("area", "Field area", 1, "ha", ""),
        num("population", "Plants per hectare", "", "plants/ha", "", output=True),
        num("per_m2", "Plants per m²", "", "plants/m²", "", output=True),
        num("for_field", "Plants in the field", "", "plants", "", output=True),
        num("row_length", "Row length per hectare", "", "m", "", output=True),
    ],
    dirs=[
        d("Population", "population", "10000/(row_spacing/100)/(plant_spacing/100)"),
        d("Population", "per_m2", "1/(row_spacing/100)/(plant_spacing/100)"),
        d("Population", "for_field", "10000/(row_spacing/100)/(plant_spacing/100)*area"),
        d("Population", "row_length", "area*10000/(row_spacing/100)"),
    ],
    formula="Plants/ha = 10 000 ÷ (row spacing m × plant spacing m)",
    symbols=[("row spacing", "distance between rows", "m"),
             ("plant spacing", "distance between plants in a row", "m"),
             ("population", "plants per hectare", "plants/ha")],
    bands=[("below 40 000", "Wide", "maize at wide rows, orchards, vines"),
           ("40 000 – 150 000", "Field crop", "typical row-crop populations"),
           ("above 400 000", "Dense", "cereals drilled at narrow spacing")],
    notes=[
        "Populations are quoted per hectare as a matter of convention; per square metre is easier to "
        "check in the field.",
        "Rectangular spacing (wide rows, close within) and square spacing with the same population "
        "compete differently — that is the whole point of changing row width.",
        "Plant population, not seed rate, is what the crop actually experiences; the gap between the "
        "two is establishment.",
    ],
    mistakes=[
        "Using seed rate as if it were plant population.",
        "Mixing centimetres and metres in the same formula.",
        "Ignoring that missing plants typically run at 5–15% even in good seedbeds.",
    ],
    faq=[
        ("How many plants per hectare at 75 × 20 cm?",
         "About 66 667 — 10 000 ÷ (0.75 × 0.20)."),
        ("Does narrower row spacing change the optimum population?",
         "It usually raises it slightly, because plants compete less within the row."),
    ],
    related=[("/biology/seeding-rate", "Seeding rate"),
             ("/biology/plant-population", "Plant population"),
             ("/biology/basal-area", "Basal area")],
    svg=("grid", {"caption": "Row spacing and within-row spacing set the population.",
                  "cells": [["", "Row 1", "Row 2"], ["Plant", "20 cm", "20 cm"], ["Row", "75 cm", "75 cm"]]}),
    icon="sprout",
))

add(Spec(
    name="Vine Density Calculator",
    slug="vine-density",
    summary=("Vine density — vines per hectare — is set by row spacing and vine spacing, and it drives "
             "competition, fruit exposure and yield per vine. This calculator gives density, vines per "
             "row, and the yield per vine that a target tonnes-per-hectare implies."),
    fields=[
        num("row_spacing", "Row spacing", 2.5, "m", ""),
        num("vine_spacing", "Vine spacing", 1.2, "m", ""),
        num("yield_tha", "Target yield", 8, "t/ha", ""),
        num("bunches", "Bunches per vine", 24, "", ""),
        num("density", "Vines per hectare", "", "vines/ha", "", output=True),
        num("per_row", "Vines per 100 m of row", "", "vines", "", output=True),
        num("kg_vine", "Yield per vine", "", "kg", "", output=True),
        num("g_bunch", "Grams per bunch", "", "g", "", output=True),
    ],
    dirs=[
        d("Vines", "density", "10000/(row_spacing*vine_spacing)"),
        d("Vines", "per_row", "100/vine_spacing"),
        d("Vines", "kg_vine", "yield_tha*1000/(10000/(row_spacing*vine_spacing))"),
        d("Vines", "g_bunch", "yield_tha*1000/(10000/(row_spacing*vine_spacing))/bunches*1000"),
    ],
    formula="Vines/ha = 10 000 ÷ (row spacing × vine spacing);  kg per vine = yield ÷ density",
    symbols=[("row spacing", "distance between rows", "m"),
             ("vine spacing", "distance between vines in the row", "m"),
             ("density", "vines per hectare", "vines/ha")],
    bands=[("below 3 000", "Low density", "bush vines, old-vine plots, dry-grown"),
           ("3 000 – 6 000", "Typical", "most modern trellised vineyards"),
           ("above 7 000", "High density", "cool-climate quality plantings")],
    notes=[
        "Doubling density roughly halves the yield per vine for the same tonnes per hectare, which "
        "changes fruit composition as much as it changes tonnage.",
        "Row spacing also has to fit the tractor: 2.0–2.5 m is common because machinery sets a floor.",
        "Bunch weight is the least stable variable in the chain — it moves by 30% between seasons.",
    ],
    mistakes=[
        "Using feet for spacing in a metre-based formula.",
        "Setting density from yield targets alone, ignoring vine vigour and water supply.",
        "Confusing tonnes per hectare with tonnes per acre (1 t/ac ≈ 2.47 t/ha).",
    ],
    faq=[
        ("How many vines per hectare at 2.5 × 1.2 m?",
         "About 3 333 vines."),
        ("Does higher density give better wine?",
         "It can improve competition and fruit exposure, but only where water and nutrition allow it."),
    ],
    related=[("/biology/plant-population", "Plant population"),
             ("/biology/growing-degree-days", "Growing degree days"),
             ("/biology/huglin-index", "Huglin index")],
    svg=("grid", {"caption": "Row and vine spacing in a vineyard block.",
                  "cells": [["", "Vine", "Vine"], ["Row", "1.2 m", "1.2 m"], ["Row", "2.5 m", "2.5 m"]]}),
    icon="sprout",
))

add(Spec(
    name="Huglin Index Calculator",
    slug="huglin-index",
    summary=("The Huglin index measures the heat available for grape ripening, weighting daytime "
             "temperatures more heavily than night ones. It is the standard climate index for "
             "matching a grape variety to a site, and it decides which varieties can ripen there."),
    fields=[
        num("tmax", "Mean daily maximum", 26, "°C", "April–September in the north"),
        num("tmean", "Mean daily temperature", 18, "°C", ""),
        num("base", "Base temperature", 10, "°C", ""),
        num("days", "Days in the growing period", 180, "days", ""),
        num("coef", "Daylength coefficient (K)", 1.02, "", "1.02 below 40° latitude, 1.00 above"),
        num("huglin", "Huglin index", "", "", "", output=True),
        num("class_no", "Climate class (1 very cool … 6 too hot)", "", "", "", output=True),
        num("per_day", "Contribution per day", "", "°C·day", "", output=True),
    ],
    dirs=[
        d("Huglin", "per_day", "coef*((max(0,tmax-base)+max(0,tmean-base))/2)"),
        d("Huglin", "huglin", "coef*((max(0,tmax-base)+max(0,tmean-base))/2)*days"),
        d("Huglin", "class_no",
          "if_else(coef*((max(0,tmax-base)+max(0,tmean-base))/2)*days<=1500,1,"
          "if_else(coef*((max(0,tmax-base)+max(0,tmean-base))/2)*days<=1800,2,"
          "if_else(coef*((max(0,tmax-base)+max(0,tmean-base))/2)*days<=2100,3,"
          "if_else(coef*((max(0,tmax-base)+max(0,tmean-base))/2)*days<=2400,4,"
          "if_else(coef*((max(0,tmax-base)+max(0,tmean-base))/2)*days<=3000,5,6)))))"),
    ],
    formula="HI = K × [(T_max − 10) + (T_mean − 10)] ÷ 2, summed over the growing period",
    symbols=[("T_max", "mean daily maximum", "°C"),
             ("T_mean", "mean daily temperature", "°C"),
             ("K", "daylength coefficient", "—"),
             ("HI", "Huglin heliothermal index", "°C·day")],
    bands=[("below 1 500 (class 1)", "Very cool", "early varieties only; sparkling base wines"),
           ("1 500 – 1 800 (class 2)", "Cool", "Pinot Noir, Chardonnay, Riesling"),
           ("1 800 – 2 100 (class 3)", "Temperate", "Cabernet Franc, Merlot, Sauvignon Blanc"),
           ("2 100 – 2 400 (class 4)", "Warm", "Cabernet Sauvignon, Syrah, Grenache"),
           ("2 400 – 3 000 (class 5)", "Very warm", "late-ripening Mediterranean varieties"),
           ("above 3 000 (class 6)", "Too hot", "heat stress and irrigation become the limit")],
    notes=[
        "The formula weights the maximum temperature fully, which is what distinguishes it from "
        "growing degree days.",
        "The daylength coefficient K is 1.02 below 40° latitude and 1.00 above it, correcting for "
        "longer summer days in the south.",
        "Huglin is usually calculated over the frost-free period from April to September in the "
        "northern hemisphere, October to March in the south.",
    ],
    mistakes=[
        "Summing over a full year rather than the growing period.",
        "Forgetting the K coefficient and comparing sites at different latitudes.",
        "Using the Huglin index to compare varieties without checking their own heat requirements.",
    ],
    faq=[
        ("What Huglin index suits Cabernet Sauvignon?",
         "About 2 100–2 400, which is why it struggles to ripen in cool maritime climates."),
        ("Is Huglin better than growing degree days?",
         "For viticulture it usually is, because the extra weight on daytime heat matches ripening "
         "better than a plain mean."),
    ],
    related=[("/biology/growing-degree-days", "Growing degree days"),
             ("/biology/vine-density", "Vine density"),
             ("/biology/crop-water-requirement", "Crop water requirement")],
    svg=("bars", {"caption": "The heat accumulated across the growing period."}),
    icon="sprout",
))

add(Spec(
    name="NDVI Calculator (Normalised Difference Vegetation Index)",
    slug="ndvi-calculator",
    summary=("NDVI compares near-infrared with red reflectance: healthy vegetation reflects strongly "
             "in the near-infrared and absorbs red. The result runs from −1 to +1 and is the most "
             "widely used satellite index of vegetation vigour."),
    fields=[
        num("nir", "Near-infrared reflectance", 0.42, "", "0 to 1"),
        num("red", "Red reflectance", 0.08, "", "0 to 1"),
        num("ndvi", "NDVI", "", "", "", output=True),
        num("evi", "EVI approximation", "", "", "", output=True),
        num("cover", "Estimated fractional cover", "", "%", "", output=True),
        num("class_no", "Surface class (0 water … 6 very dense)", "", "", "", output=True),
    ],
    dirs=[
        d("Vegetation", "ndvi", "(nir-red)/(nir+red)"),
        d("Vegetation", "evi", "2.5*(nir-red)/(nir+6*red+1)"),
        d("Vegetation", "cover", "pow(max(0,(nir-red)/(nir+red)),0.6)*100"),
        d("Vegetation", "class_no",
          "if_else((nir+red)==0,-1,"
          "if_else((nir-red)/(nir+red)<0,0,"
          "if_else((nir-red)/(nir+red)<0.1,1,"
          "if_else((nir-red)/(nir+red)<0.2,2,"
          "if_else((nir-red)/(nir+red)<0.4,3,"
          "if_else((nir-red)/(nir+red)<0.6,4,"
          "if_else((nir-red)/(nir+red)<0.8,5,6)))))))"),
    ],
    formula="NDVI = (NIR − Red) ÷ (NIR + Red)",
    symbols=[("NIR", "near-infrared reflectance", "0–1"),
             ("Red", "red reflectance", "0–1"),
             ("NDVI", "normalised difference vegetation index", "−1 to 1")],
    bands=[("−1 to 0 (class 0)", "Water, snow, cloud", "no vegetation signal"),
           ("0 – 0.1 (class 1)", "Barren", "rock, sand, built-up"),
           ("0.1 – 0.2 (class 2)", "Sparse", "bare soil with scattered plants"),
           ("0.2 – 0.4 (class 3)", "Shrub and early crop", "dry grassland"),
           ("0.4 – 0.6 (class 4)", "Moderate canopy", "growing crop"),
           ("0.6 – 0.8 (class 5)", "Dense", "closed canopy at peak season"),
           ("0.8 – 1 (class 6)", "Very dense", "rainforest or irrigated crop at full cover")],
    notes=[
        "NDVI saturates in dense canopies: above a leaf area index of about 3 it stops rising, which "
        "is why EVI was developed.",
        "Atmospheric haze and thin cloud lower NDVI without changing the ground; compositing several "
        "dates reduces that.",
        "Values are only comparable when computed from the same sensor and the same processing "
        "baseline — an NDVI from Landsat and one from Sentinel-2 need harmonising.",
    ],
    mistakes=[
        "Mixing reflectance scaled 0–255 with reflectance scaled 0–1.",
        "Comparing a growing-season maximum with an off-season image.",
        "Reading NDVI as biomass in a saturated canopy.",
    ],
    faq=[
        ("What is a good NDVI?",
         "0.6–0.8 for healthy dense crops; below 0.3 suggests bare soil or severe stress."),
        ("Why is NDVI negative over water?",
         "Water absorbs near-infrared much more strongly than red, so NIR − Red goes negative."),
    ],
    related=[("/biology/net-primary-productivity", "Net primary productivity"),
             ("/biology/crop-water-stress-index", "Crop water stress index"),
             ("/biology/photosynthesis-rate", "Photosynthesis rate")],
    svg=("gauge", {"caption": "Where the index falls between soil and dense canopy."}),
    icon="satellite",
))

add(Spec(
    name="Lime Requirement Calculator",
    slug="lime-requirement",
    summary=("Lime raises soil pH, and the amount needed depends on how far the pH must rise and how "
             "heavy the soil is. This calculator estimates the rate from a target pH and a buffer "
             "index, and warns when the change is large enough to split over seasons."),
    fields=[
        num("ph_now", "Current pH", 5.4, "", ""),
        num("ph_target", "Target pH", 6.5, "", ""),
        sel("texture", "Soil texture", [("Sand", "1"), ("Sandy loam", "0.6"), ("Loam", "0.4"),
                                        ("Clay loam", "0.25"), ("Clay", "0.18")], "0.4"),
        num("buffer", "Buffer index", 6.4, "", "From a lime requirement test; lower means more lime"),
        num("rate", "Lime required", "", "t/ha", "", output=True),
        num("pure_caco3", "As pure CaCO₃ equivalent", "", "t/ha", "", output=True),
        num("splits", "Application splits recommended", "", "", "", output=True),
        num("ph_gain", "pH increase per tonne", "", "", "", output=True),
    ],
    dirs=[
        d("Lime", "rate", "(ph_target-ph_now)*buffer*texture"),
        d("Lime", "pure_caco3", "(ph_target-ph_now)*buffer*texture*0.9"),
        d("Lime", "splits", "max(1,ceil((ph_target-ph_now)*buffer*texture/2))"),
        d("Lime", "ph_gain", "(ph_target-ph_now)/((ph_target-ph_now)*buffer*texture)"),
    ],
    formula="Lime (t/ha) ≈ (target pH − current pH) × buffer factor × texture factor",
    symbols=[("ΔpH", "change in pH required", "pH units"),
             ("buffer", "buffer index from a soil test", "—"),
             ("texture", "texture factor, 1.0 for sand down to 0.18 for clay", "—")],
    notes=[
        "Clay soils need more lime per unit of pH because they have far more exchange sites to "
        "neutralise.",
        "Lime moves slowly — about 2.5 cm a year in the profile — so a large requirement is split "
        "over two or three seasons rather than applied at once.",
        "Use a buffer index test where available; the texture factor alone is a rough estimate.",
    ],
    mistakes=[
        "Applying the full rate when the requirement exceeds 4–5 t/ha.",
        "Lime and ammonium fertilizer applied in the same operation, which loses nitrogen as ammonia.",
        "Chasing a high pH where the crop prefers acid soil — blueberries at pH 7 will be chlorotic.",
    ],
    faq=[
        ("How much does pH rise per tonne of lime?",
         "About 0.1–0.3 pH units on a loam; much more on sand, much less on clay."),
        ("Does lime replace magnesium?",
         "Dolomitic lime does; calcitic lime does not, so check the soil test for magnesium."),
    ],
    related=[("/biology/npk-fertilizer-blend", "NPK fertilizer blend"),
             ("/biology/field-capacity", "Field capacity"),
             ("/biology/crop-water-requirement", "Crop water requirement")],
    svg=("gauge", {"caption": "Current pH, target pH and the lime between them."}),
    icon="sprout",
))

add(Spec(
    name="Photosynthesis Rate Calculator",
    slug="photosynthesis-rate",
    summary=("Photosynthesis rate is the carbon fixed per unit leaf area per unit time. This "
             "calculator converts between the ways it is reported — µmol CO₂ per m² per second, mg "
             "CO₂ per dm² per hour and grams of dry matter — so measurements from a gas analyser can "
             "be compared with growth data."),
    fields=[
        num("a", "Net assimilation rate", 12, "µmol CO₂/m²/s", ""),
        num("area", "Leaf area", 0.02, "m²", ""),
        num("minutes", "Measurement period", 10, "min", ""),
        num("umol", "Carbon fixed", "", "µmol CO₂", "", output=True),
        num("mg_dm2_h", "Rate", "", "mg CO₂/dm²/h", "", output=True),
        num("g_m2_day", "Daily carbon gain at this rate", "", "g C/m²/day", "", output=True),
        num("biomass", "Dry matter equivalent per day", "", "g/m²/day", "", output=True),
    ],
    dirs=[
        d("Rate", "umol", "a*area*minutes*60"),
        d("Rate", "mg_dm2_h", "a*1.584"),
        d("Rate", "g_m2_day", "a*0.012*86400/1000000*12"),
        d("Rate", "biomass", "a*0.012*86400/1000000*12*2.2"),
    ],
    formula="1 µmol CO₂/m²/s ≈ 1.584 mg CO₂/dm²/h",
    symbols=[("A", "net assimilation rate", "µmol CO₂/m²/s"),
             ("44", "molar mass of CO₂, g/mol", "g/mol"),
             ("12", "molar mass of carbon", "g/mol")],
    notes=[
        "Net assimilation is photosynthesis minus leaf respiration; gross photosynthesis is higher, "
        "and the difference is largest in shade leaves.",
        "The 1.584 factor converts µmol CO₂ m⁻² s⁻¹ to mg CO₂ dm⁻² h⁻¹ and is worth remembering — it "
        "is 44 ÷ 1 000 × 36.",
        "Extrapolating a leaf-level rate to a canopy overstates it, because lower leaves are shaded "
        "and older.",
    ],
    mistakes=[
        "Comparing a net rate with a gross rate.",
        "Extrapolating a mid-morning measurement across a whole day.",
        "Using leaf area measured flat when the leaf was held at an angle.",
    ],
    faq=[
        ("What is a typical photosynthesis rate?",
         "10–25 µmol CO₂/m²/s for healthy C3 crop leaves in full sun; C4 grasses can exceed 40."),
        ("Why is the rate lower at midday?",
         "Stomatal closure under high vapour pressure deficit and photorespiration both reduce it."),
    ],
    related=[("/biology/net-primary-productivity", "Net primary productivity"),
             ("/biology/transpiration-rate", "Transpiration rate"),
             ("/biology/stomatal-density", "Stomatal density")],
    svg=("chain", {"caption": "Leaf-level assimilation scaled to carbon and dry matter."}),
    icon="leaf",
))

add(Spec(
    name="Transpiration Rate Calculator",
    slug="transpiration-rate",
    summary=("Transpiration is water lost through stomata, driven by the vapour pressure difference "
             "between leaf and air. This calculator converts a measured loss into a rate per unit "
             "leaf area and a whole-plant water use, and links it to the water the roots must supply."),
    fields=[
        num("mass", "Mass lost", 2.4, "g", ""),
        num("area", "Leaf area", 0.015, "m²", ""),
        num("minutes", "Duration", 30, "min", ""),
        num("rate", "Transpiration rate", "", "g/m²/h", "", output=True),
        num("per_day", "Daily water use per m² of leaf", "", "L/m²/day", "", output=True),
        num("mmol", "Molar rate", "", "mmol/m²/s", "", output=True),
        num("conductance", "Approximate stomatal conductance", "", "mol/m²/s", "", output=True),
    ],
    dirs=[
        d("Water loss", "rate", "mass/area/(minutes/60)"),
        d("Water loss", "per_day", "mass/area/(minutes/60)*12/1000"),
        d("Water loss", "mmol", "mass/area/(minutes/60)/18/3.6"),
        d("Water loss", "conductance", "mass/area/(minutes/60)/18/3.6/44"),
    ],
    formula="Transpiration rate (g/m²/h) = mass lost ÷ leaf area ÷ time in hours",
    symbols=[("mass", "water lost by the shoot", "g"),
             ("area", "leaf area of the shoot", "m²"),
             ("rate", "transpiration rate", "g/m²/h")],
    bands=[("below 20 g/m²/h", "Low", "shade, high humidity or closed stomata"),
           ("20 – 100", "Moderate", "typical glasshouse conditions"),
           ("above 100", "High", "bright, dry, windy conditions")],
    notes=[
        "Mass loss measured by weighing is total evapotranspiration from the shoot; a gas analyser "
        "measures the transpiration flux directly.",
        "Water lost is water the roots must replace: at 1 L/m²/day a square metre of leaf needs "
        "about a litre a day, which scales quickly to whole-canopy irrigation.",
        "Transpiration cools the leaf; a water-stressed leaf runs several degrees warmer, which is "
        "the principle behind thermal stress indices.",
    ],
    mistakes=[
        "Weighing the pot rather than the shoot, so evaporation from the substrate is included.",
        "Using leaf area measured on one side of the leaf when both are transpiring.",
        "Reporting g/h without normalising to leaf area.",
    ],
    faq=[
        ("How do I convert g/m²/h to mmol/m²/s?",
         "Divide by 18 (grams per mole of water) and by 3.6."),
        ("Why does transpiration matter for nutrient uptake?",
         "Because mass flow in the xylem is the main route by which nutrients reach the roots."),
    ],
    related=[("/biology/photosynthesis-rate", "Photosynthesis rate"),
             ("/biology/stomatal-density", "Stomatal density"),
             ("/biology/crop-water-requirement", "Crop water requirement")],
    svg=("chain", {"caption": "Mass lost, leaf area and time to a transpiration rate."}),
    icon="leaf",
))

add(Spec(
    name="Solute Potential Calculator",
    slug="solute-potential",
    summary=("Solute potential is the osmotic component of water potential: dissolved solutes lower "
             "it, pulling water in. This calculator applies the van 't Hoff relation to give solute "
             "potential from concentration and temperature, and compares it with pure water at zero."),
    fields=[
        num("conc", "Solute concentration", 0.2, "mol/L", ""),
        num("temp", "Temperature", 25, "°C", ""),
        num("i", "Ionisation factor (i)", 1, "", "2 for NaCl, 1 for sucrose"),
        num("psi", "Solute potential", "", "MPa", "", output=True),
        num("bar", "Solute potential", "", "bar", "", output=True),
        num("molarity_mmol", "Concentration", "", "mmol/L", "", output=True),
        num("equiv_nacl", "Equivalent NaCl concentration", "", "mmol/L", "", output=True),
    ],
    dirs=[
        d("Potential", "psi", "0-i*conc*8.314*(temp+273.15)/1000000"),
        d("Potential", "bar", "0-i*conc*8.314*(temp+273.15)/100000"),
        d("Potential", "molarity_mmol", "conc*1000"),
        d("Potential", "equiv_nacl", "conc/i*1000"),
    ],
    formula="Ψ_s = −i × C × R × T",
    symbols=[("i", "number of particles the solute dissociates into", "—"),
             ("C", "concentration", "mol/L"),
             ("R", "gas constant, 8.314", "J/mol/K"),
             ("T", "absolute temperature", "K")],
    bands=[("0 MPa", "Pure water", "the maximum water potential"),
           ("−0.1 to −0.5 MPa", "Typical plant cell", "most mesophytes at full turgor"),
           ("−1 to −2 MPa", "Stressed or saline", "growth slows and stomata close"),
           ("below −2 MPa", "Severe", "halophytes only; most crops die")],
    notes=[
        "Solute potential is always negative or zero: solutes can only lower water potential, never "
        "raise it.",
        "The ionisation factor doubles the effect of sodium chloride, which is why seawater at about "
        "1 mol/L NaCl gives roughly −4.5 MPa.",
        "Water potential also has a pressure component, so a turgid cell's total potential can be "
        "near zero even though its solute potential is strongly negative.",
    ],
    mistakes=[
        "Forgetting i for a salt, which halves the apparent osmotic effect.",
        "Using degrees Celsius in the gas constant term.",
        "Reporting solute potential as positive because only the magnitude was calculated.",
    ],
    faq=[
        ("Why is solute potential negative?",
         "Because pure water at atmospheric pressure is defined as zero, and solutes always reduce "
         "the free energy of water."),
        ("What is the solute potential of 0.1 M sucrose at 20 °C?",
         "About −0.24 MPa."),
    ],
    related=[("/biology/osmolarity-osmotic-pressure", "Osmolarity and osmotic pressure"),
             ("/biology/water-potential", "Water potential"),
             ("/biology/plant-available-water", "Plant available water")],
    svg=("gauge", {"caption": "Concentration lowering the water potential below zero."}),
    icon="leaf",
))
