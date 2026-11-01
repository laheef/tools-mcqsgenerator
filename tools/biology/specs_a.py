"""Batch A — body proportions, livestock, poultry and fish.

Every formula here is a published rule of thumb or a standard anthropometric
index; the source is stated on each page so the reader can check it.
"""

from lib import Spec, num, sel, d

SPECS: list[Spec] = []


def add(spec: Spec) -> None:
    SPECS.append(spec)


# --------------------------------------------------------------- date helpers
# The page engine has no calendar arithmetic, so "day of the month + a number of
# days" has to be turned into a day of the year and back with comparisons.  These
# build those expressions once so the specs below stay readable.

_MONTH_DAYS = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]


def days_before_month(m: str) -> str:
    """Expression: days elapsed before month `m` (1-based) in a common year."""
    out = "365"
    for month in range(12, 0, -1):
        out = f"if_else({m}<={month},{sum(_MONTH_DAYS[:month - 1])},{out})"
    return out


def month_from_doy(doy: str) -> str:
    """Expression: calendar month (1-12) of a day of the year."""
    cuts = [sum(_MONTH_DAYS[:i]) for i in range(1, 12)]
    out = "12"
    for i in range(11, 0, -1):
        out = f"if_else({doy}<={cuts[i - 1]},{i},{out})"
    return out


def wrap_year(doy: str) -> str:
    """Expression: keep a day of the year inside 1-365 after adding days."""
    return f"mod({doy}-1,365)+1"


# ------------------------------------------------------------------ 1. bone -> height

add(Spec(
    name="Bone Length to Body Height Calculator",
    slug="bone-length-to-body-height",
    summary=("A single long bone carries enough information to estimate how tall the person it "
             "belonged to was. This calculator applies the Trotter–Gleser regression equations to "
             "the length of a femur, tibia, humerus or radius and returns a stature estimate in "
             "centimetres and feet and inches."),
    fields=[
        sel("bone", "Bone measured", [("Femur", "1"), ("Tibia", "2"), ("Humerus", "3"), ("Radius", "4")], "1"),
        sel("sex", "Sex of the individual", [("Male", "1"), ("Female", "0")], "1"),
        num("length", "Bone length", 45, "cm", "Maximum length of the bone, measured on an osteometric board"),
        num("height_cm", "Estimated stature", "", "cm", "", output=True),
        num("height_in", "Estimated stature", "", "in", "", output=True),
    ],
    dirs=[
        d("Stature", "height_cm",
          "if_else(bone==1, if_else(sex>0, 2.38*length+61.41, 2.47*length+54.13), "
          "if_else(bone==2, if_else(sex>0, 2.52*length+78.62, 2.90*length+61.53), "
          "if_else(bone==3, if_else(sex>0, 2.89*length+78.10, 3.36*length+57.97), "
          "if_else(sex>0, 3.79*length+79.42, 4.74*length+54.93))))"),
        d("Stature", "height_in", "height_cm/2.54"),
        d("Stature", "length",
          "if_else(bone==1, if_else(sex>0, (height_cm-61.41)/2.38, (height_cm-54.13)/2.47), "
          "if_else(bone==2, if_else(sex>0, (height_cm-78.62)/2.52, (height_cm-61.53)/2.90), "
          "if_else(bone==3, if_else(sex>0, (height_cm-78.10)/2.89, (height_cm-57.97)/3.36), "
          "if_else(sex>0, (height_cm-79.42)/3.79, (height_cm-54.93)/4.74))))"),
    ],
    formula=("Stature (cm) = slope × bone length (cm) + intercept, with the slope and intercept "
             "chosen from the bone and the sex of the individual."),
    symbols=[
        ("bone length", "maximum length of the measured bone", "cm"),
        ("slope", "Trotter–Gleser regression coefficient for that bone and sex", "—"),
        ("intercept", "regression constant for that bone and sex", "cm"),
        ("stature", "estimated living height", "cm / in"),
    ],
    steps=[
        "Choose which bone you measured and the sex recorded for the individual.",
        "Enter the maximum length in centimetres — the whole bone, not a fragment.",
        "Read the stature in centimetres; the same answer in feet and inches is shown beside it.",
    ],
    notes=[
        "The estimate is a population average, not a prediction for one person: the standard error "
        "of the estimate is roughly ±4 cm for a femur and a little wider for the arm bones.",
        "Measure the left side where possible. If only the right bone survives, apply the side "
        "correction of about 0.5–1 cm that the original papers report before comparing datasets.",
        "The equations were derived on mid-20th-century North American samples. On very tall, very "
        "short or non-European populations they tend to pull towards the middle.",
    ],
    mistakes=[
        "Using the female equation for a male skeleton (or the reverse) — the two differ by several "
        "centimetres at the same bone length, more than the measurement error.",
        "Measuring a bone that is broken, worn or still has cartilage on the ends. Reconstruct the "
        "length first; a missing condyle can cost 1–3 cm.",
        "Feeding a fragment length in and reading the stature off as if the bone were complete.",
    ],
    sources=[
        "Regression coefficients are those of Trotter & Gleser (1952, 1958), the equations still used "
        "as the reference standard in forensic anthropology.",
    ],
    faq=[
        ("How accurate is a height estimate from one bone?",
         "For a femur, the 95% prediction interval is about ±8 cm, so the estimate places a person "
         "within a stature band rather than at an exact height. Combining two bones narrows it."),
        ("Which bone gives the best estimate?",
         "The femur, then the tibia. Leg bones correlate most strongly with standing height because "
         "they carry most of it; the radius is the weakest of the four."),
    ],
    related=[("/biology/bone-length-to-body-height", "Bone length and stature"),
             ("/biology/femur-to-foot-ratio", "Femur to foot ratio"),
             ("/biology/cephalic-index", "Cephalic index")],
    example_note=("A 45 cm femur from a male gives 2.38 × 45 + 61.41 = 168.5 cm, and the same femur "
                  "from a female gives 165.3 cm — the two lines sit almost 3 cm apart."),
    svg=("chain", {"caption": "Bone type and sex pick the regression line; the length sets the position on it."}),
    keywords=["stature estimation", "Trotter Gleser", "forensic anthropology"],
    icon="bone",
))

# ------------------------------------------------------------------ 2. cephalic index

add(Spec(
    name="Cephalic Index Calculator",
    slug="cephalic-index",
    summary=("The cephalic index is the width of the head expressed as a percentage of its length, "
             "the standard measure used to describe head shape in anthropology, paediatrics and "
             "ergonomics. Enter the two diameters and it returns the index together with the shape "
             "category the value falls into."),
    fields=[
        num("width", "Head width (biparietal)", 150, "mm", "Widest transverse diameter of the head"),
        num("length", "Head length (fronto-occipital)", 190, "mm", "Glabella to the most posterior point"),
        num("index", "Cephalic index", "", "%", "", output=True),
        num("ratio", "Width to length ratio", "", "", "", output=True),
    ],
    dirs=[
        d("Cephalic index", "index", "width/length*100"),
        d("Cephalic index", "ratio", "width/length"),
        d("Cephalic index", "width", "index*length/100"),
        d("Cephalic index", "length", "width/index*100"),
    ],
    formula="Cephalic index = (head width ÷ head length) × 100",
    symbols=[("width", "maximum transverse diameter", "mm"),
             ("length", "maximum anteroposterior diameter", "mm"),
             ("index", "width as a percentage of length", "%")],
    bands=[("below 75", "Dolichocephalic", "long and narrow head"),
           ("75 – 79.9", "Mesocephalic", "average, the usual human range"),
           ("80 – 84.9", "Brachycephalic", "short and broad head"),
           ("85 and above", "Hyperbrachycephalic", "markedly broad head")],
    steps=[
        "Measure head width across the widest part of the skull, above the ears.",
        "Measure head length from the brow ridge to the furthest point at the back.",
        "Enter both in the same unit — the index is dimensionless, so millimetres or centimetres "
        "both work, but never one of each.",
    ],
    notes=[
        "The index describes shape, not size, and it is normal for it to differ between populations "
        "and between men and women within the same population.",
        "In infants the index is naturally higher, because the skull is still broad relative to its "
        "length; adult bands do not apply before about two years of age.",
        "Ergonomics uses the same number to size helmets and headphones, where the length matters "
        "more than the index itself.",
    ],
    mistakes=[
        "Mixing units: 150 mm of width with 19 cm of length gives an index ten times too small.",
        "Using head circumference as the width or the length. Circumference is a different measure "
        "and cannot be substituted into this ratio.",
        "Treating a high index as a diagnosis. Brachycephaly is a shape, and only a clinician can "
        "say whether a particular skull shape is a medical finding.",
    ],
    sources=["Boundaries follow the conventional anthropometric classification (Retzius, 1842; "
             "modern cut-offs in Martin & Saller)."],
    faq=[
        ("Is the cephalic index the same as the cranial index?",
         "Yes in everyday use. Strictly, the cranial index is measured on the skull and the cephalic "
         "index on the living head, which is a few millimetres wider because of soft tissue."),
        ("What is a normal cephalic index?",
         "Between about 75 and 85 for adults of most populations. Values outside that range are "
         "common in some regions and are not by themselves abnormal."),
    ],
    related=[("/biology/fwhr-facial-width-to-height-ratio", "Facial width-to-height ratio"),
             ("/biology/bone-length-to-body-height", "Bone length to body height"),
             ("/biology/medullary-index", "Medullary index")],
    example_note=("A head 150 mm wide and 190 mm long gives 78.9 — mesocephalic, the middle of the "
                  "usual adult range."),
    svg=("gauge", {"scale": (60, 100), "bands": [(60, 75, "dolicho"), (75, 80, "meso"),
                                                 (80, 85, "brachy"), (85, 100, "hyperbrachy")],
                   "caption": "The index plotted on the conventional shape scale."}),
    keywords=["head shape", "cranial index", "anthropometry"],
    icon="ruler",
))

# ------------------------------------------------------------------ 3. FWHR

add(Spec(
    name="FWHR (Facial Width-to-Height Ratio) Calculator",
    slug="fwhr-facial-width-to-height-ratio",
    summary=("Facial width-to-height ratio compares the distance between the cheekbones with the "
             "height of the upper face, from the brow to the upper lip. It is used in studies of "
             "perceived dominance, in behavioural endocrinology and in facial anthropometry, and it "
             "is simply the width divided by the height."),
    fields=[
        num("width", "Bizygomatic width", 138, "mm", "Widest point of the face, cheekbone to cheekbone"),
        num("height", "Upper face height", 98, "mm", "Brow (nasion) to the upper lip (prosthion)"),
        num("fwhr", "Facial width-to-height ratio", "", "", "", output=True),
        num("fwhr_100", "FWHR scaled ×100", "", "", "", output=True),
    ],
    dirs=[
        d("FWHR", "fwhr", "width/height"),
        d("FWHR", "fwhr_100", "width/height*100"),
        d("FWHR", "width", "fwhr*height"),
        d("FWHR", "height", "width/fwhr"),
    ],
    formula="FWHR = bizygomatic width ÷ upper face height",
    symbols=[("width", "distance between the left and right zygion", "mm"),
             ("height", "nasion to prosthion, the brow to the upper lip", "mm"),
             ("fwhr", "width divided by height, typically 1.5 to 2.2", "—")],
    bands=[("below 1.70", "Narrow", "longer, narrower face"),
           ("1.70 – 1.89", "Average", "where most adult faces sit"),
           ("1.90 and above", "Wide", "broader face relative to its upper height")],
    steps=[
        "Take a frontal photograph with the head level and a neutral expression.",
        "Measure cheekbone to cheekbone across the widest point.",
        "Measure from the brow ridge to the point where the upper and lower lips meet, not to the "
        "chin — including the chin is the usual way to get a value that cannot be compared with "
        "published figures.",
    ],
    notes=[
        "Published FWHR values cluster around 1.8–1.9 for men and 1.7–1.8 for women, with wide "
        "overlap between the sexes.",
        "Measurement method matters more than anatomy: studies that include the chin report values "
        "about 0.3 lower than studies that stop at the lip.",
        "The ratio changes with camera distance and head tilt, so it is only comparable between "
        "images taken the same way.",
    ],
    mistakes=[
        "Including the chin in the height measurement.",
        "Using a tilted or smiling photograph — both change the apparent height substantially.",
        "Comparing a value measured from a 50 mm portrait lens with one from a phone selfie; "
        "perspective distortion alone moves FWHR by 0.1 or more.",
    ],
    sources=["The width-over-upper-face-height definition follows Carré, McCormick & Mondloch (2009), "
             "the paper that established the measure in behavioural studies."],
    faq=[
        ("Does a high FWHR mean anything about personality?",
         "Studies report small statistical associations with perceived dominance, but the effect is "
         "weak and contested, and it says nothing about an individual. Treat the number as a "
         "measurement, not a personality test."),
        ("Should I measure to the lip or to the chin?",
         "To the upper lip for anything you want to compare with the literature. Chin-included "
         "variants exist but are not comparable with those figures."),
    ],
    related=[("/biology/cephalic-index", "Cephalic index"),
             ("/biology/height-to-finger-length", "Height to finger length")],
    example_note=("138 mm of width over 98 mm of upper face gives 1.41 by the strict measure — a "
                  "value below the published average because the height here spans brow to lip only."),
    svg=("gauge", {"scale": (1.2, 2.4), "bands": [(1.2, 1.7, "narrow"), (1.7, 1.9, "average"),
                                                  (1.9, 2.4, "wide")],
                   "caption": "FWHR on the usual range, with the average band shaded between 1.7 and 1.9."}),
    keywords=["facial anthropometry", "dominance", "bizygomatic"],
    icon="face",
))

# ------------------------------------------------------------------ 4. femur to foot

add(Spec(
    name="Femur to Foot Ratio Calculator",
    slug="femur-to-foot-ratio",
    summary=("The femur-to-foot ratio compares thigh-bone length with foot length. It is used in "
             "osteology to check that bones from the same individual are consistent, in forensic "
             "work when only part of a skeleton is recovered, and in comparative anatomy as a "
             "measure of how a species carries its weight."),
    fields=[
        num("femur", "Femur length", 45, "cm", "Maximum length of the femur"),
        num("foot", "Foot length", 26, "cm", "Heel to the tip of the longest toe"),
        num("ratio", "Femur to foot ratio", "", "", "", output=True),
        num("foot_pct", "Foot length as % of femur", "", "%", "", output=True),
    ],
    dirs=[
        d("Ratio", "ratio", "femur/foot"),
        d("Ratio", "foot_pct", "foot/femur*100"),
        d("Ratio", "femur", "ratio*foot"),
        d("Ratio", "foot", "femur/ratio"),
    ],
    formula="Femur-to-foot ratio = femur length ÷ foot length",
    symbols=[("femur", "maximum length of the femur", "cm"),
             ("foot", "heel to longest toe", "cm"),
             ("ratio", "how many foot lengths fit into one femur", "—")],
    bands=[("1.55 – 1.80", "Typical adult", "the usual range for modern humans"),
           ("below 1.55", "Long foot", "foot long relative to the thigh bone"),
           ("above 1.80", "Short foot", "foot short relative to the thigh bone")],
    notes=[
        "For modern adults the ratio usually lands near 1.7: a 45 cm femur and a 26 cm foot give 1.73.",
        "The ratio is a consistency check rather than an estimator. A pair of bones far outside the "
        "band more often comes from two different people than from an unusual one.",
        "In quadrupeds the femur is long relative to the foot; in humans the foot is "
        "disproportionately large because it has to absorb the whole body's landing force.",
    ],
    mistakes=[
        "Measuring foot length with shoes on, or with the foot bearing weight when the reference "
        "measurement was taken non-weight-bearing.",
        "Mixing the anatomical femur length (with the head) with a measurement taken on an X-ray, "
        "where magnification changes it by a few per cent.",
    ],
    sources=["Range follows standard osteometric practice; femur and foot lengths are both taken "
             "from the left side where available."],
    faq=[
        ("Can I estimate height from the ratio?",
         "Not directly — the ratio cancels size. Use femur length in the bone-length-to-height "
         "calculator instead, which uses the Trotter–Gleser equations."),
    ],
    related=[("/biology/bone-length-to-body-height", "Bone length to body height"),
             ("/biology/height-to-finger-length", "Height to finger length")],
    svg=("bars", {"caption": "Femur, foot and the gap between them, drawn to scale from your figures."}),
    icon="ruler",
))

# ------------------------------------------------------------------ 5. height to finger length

add(Spec(
    name="Height to Finger Length Calculator",
    slug="height-to-finger-length",
    summary=("Hand length is roughly 10.8% of standing height, and fingers are fixed fractions of the "
             "hand. Enter your height and a finger length to see how the two compare, or estimate the "
             "expected finger length from height alone."),
    fields=[
        num("height", "Standing height", 175, "cm", "Without shoes"),
        num("finger", "Measured finger length", 7.5, "cm", "Base of the finger to the tip, on the palm side"),
        sel("which", "Which finger", [("Index", "1"), ("Ring", "2"), ("Middle", "3")], "1"),
        num("expected_hand", "Expected hand length", "", "cm", "", output=True),
        num("expected_finger", "Expected finger length", "", "cm", "", output=True),
        num("difference", "Your finger minus the expectation", "", "cm", "", output=True),
    ],
    dirs=[
        d("Hand and finger", "expected_hand", "height*0.108"),
        d("Hand and finger", "expected_finger",
          "if_else(which==1, height*0.108*0.42, if_else(which==2, height*0.108*0.44, height*0.108*0.48))"),
        d("Hand and finger", "difference", "finger-expected_finger"),
    ],
    formula=("Hand length ≈ 0.108 × height; index finger ≈ 0.42 × hand length, "
             "ring finger ≈ 0.44, middle finger ≈ 0.48"),
    symbols=[("height", "standing height without shoes", "cm"),
             ("hand length", "wrist crease to the tip of the middle finger", "cm"),
             ("finger length", "base to tip on the palmar side", "cm")],
    notes=[
        "The fractions are averages: the standard deviation around them is about 0.4 cm, so a "
        "difference of a few millimetres means nothing.",
        "Digit ratio (index length ÷ ring length) is a separate measure and is not reproduced by "
        "this scaling — the two fingers move together with height.",
        "If the difference is more than about 1.5 cm, re-measure before drawing conclusions: the "
        "base of the finger is easy to place wrongly by a centimetre.",
    ],
    mistakes=[
        "Measuring the finger from the knuckle of the hand rather than the crease at the base of "
        "the digit.",
        "Measuring on the back of the hand, where the knuckle adds a centimetre.",
        "Using height in inches with a finger length in centimetres.",
    ],
    sources=["Hand-to-stature proportion of 10.8% is the figure used in anthropometric tables "
             "(Pheasant & Haslegrave, Bodyspace)."],
    faq=[
        ("Can finger length predict how tall someone will be?",
         "Only weakly. Hand and finger lengths correlate with height at about 0.7, which is good "
         "enough to flag a measurement error and not good enough to replace a stadiometer."),
    ],
    related=[("/biology/bone-length-to-body-height", "Bone length to body height"),
             ("/biology/femur-to-foot-ratio", "Femur to foot ratio"),
             ("/biology/cephalic-index", "Cephalic index")],
    svg=("chain", {"caption": "Height sets the expected hand, the hand sets the expected finger, and your measurement is compared with it."}),
    icon="hand",
))

# ------------------------------------------------------------------ 6. medullary index

add(Spec(
    name="Medullary Index Calculator",
    slug="medullary-index",
    summary=("The medullary index is the width of the medulla inside a hair shaft divided by the "
             "width of the whole shaft. Forensic hair examiners use it to tell human hair from "
             "animal hair: human medullae are thin, animal medullae are usually thick."),
    fields=[
        num("medulla", "Medulla diameter", 8, "µm", "Width of the central medulla"),
        num("shaft", "Hair shaft diameter", 70, "µm", "Total width of the hair, cuticle to cuticle"),
        num("index", "Medullary index", "", "", "", output=True),
        num("index_pct", "Medullary index", "", "%", "", output=True),
    ],
    dirs=[
        d("Medullary index", "index", "medulla/shaft"),
        d("Medullary index", "index_pct", "medulla/shaft*100"),
        d("Medullary index", "medulla", "index*shaft"),
        d("Medullary index", "shaft", "medulla/index"),
    ],
    formula="Medullary index = medulla diameter ÷ hair shaft diameter",
    symbols=[("medulla", "width of the central medullary column", "µm"),
             ("shaft", "total width of the hair", "µm"),
             ("index", "fraction of the shaft taken by the medulla", "—")],
    bands=[("below 0.33", "Human-type", "thin or fragmented medulla — the usual human pattern"),
           ("0.33 – 0.50", "Overlapping", "seen in both, so not diagnostic on its own"),
           ("above 0.50", "Animal-type", "thick medulla, typical of most non-human mammals")],
    notes=[
        "The conventional cut-off is one third: an index below 0.33 is described as human-like, "
        "above 0.50 as animal-like, and the middle band is where the measure stops being decisive.",
        "Medullation varies along a single hair and between hairs from the same head, so examiners "
        "measure several and report a range.",
        "A medullary index is a screening observation, not an identification — microscopic hair "
        "comparison cannot individualise a sample.",
    ],
    mistakes=[
        "Measuring where the medulla is fragmented or absent and calling it thin.",
        "Using a shaft width taken at the root, which is wider than the rest of the hair.",
        "Reporting the index without the magnification and the measurement method.",
    ],
    sources=["The one-third cut-off is the classical forensic criterion described by Robertson "
             "(Forensic Examination of Hair) and used in standard hair atlases."],
    faq=[
        ("Can this calculator identify an animal species?",
         "No. It separates the human pattern from the general mammalian one. Species level "
         "identification needs microscopic comparison with a reference collection or DNA."),
        ("Why is human hair medullated so thinly?",
         "The human medulla is often discontinuous or absent; when present it occupies a much "
         "smaller fraction of the shaft than in most other mammals."),
    ],
    related=[("/biology/cephalic-index", "Cephalic index"),
             ("/biology/microscope-magnification", "Actual specimen size from an image")],
    example_note=("An 8 µm medulla in a 70 µm shaft gives 0.11 — well inside the human range; the "
                  "same medulla in a 20 µm shaft would already read as animal-like."),
    svg=("bars", {"caption": "Medulla against shaft: the gap is what the index measures."}),
    icon="microscope",
))

# ------------------------------------------------------------------ 7–9. poultry

add(Spec(
    name="Chicken Density Calculator",
    slug="chicken-density",
    summary=("Chicken density is the number of birds divided by the usable floor area, in birds per m². "
             "Flip it and you get the floor allowance per bird, the figure welfare standards and coop "
             "plans are written in."),
    fields=[
        num("birds", "Number of birds", 60, "", "The flock you are housing"),
        num("area", "Usable floor area", 15, "m²", "Excluding feeders, drinkers and nest boxes"),
        num("density", "Stocking density", "", "birds/m²", "", output=True),
        num("per_bird", "Floor allowance", "", "m²/bird", "", output=True),
    ],
    dirs=[
        d("Density", "density", "birds/area"),
        d("Density", "per_bird", "area/birds"),
        d("Density", "birds", "density*area"),
        d("Density", "area", "birds/density"),
    ],
    formula="Density (birds/m²) = number of birds ÷ usable floor area (m²)",
    symbols=[("birds", "number of birds in the house", "birds"),
             ("area", "usable floor area", "m²"),
             ("density", "birds per square metre", "birds/m²"),
             ("per_bird", "floor each bird has to itself", "m²/bird")],
    bands=[("up to 7", "Free range / organic", "typical outdoor or low-density indoor systems"),
           ("7 – 9", "Barn", "indoor floor systems with litter"),
           ("9 – 12", "Higher-density indoor", "permitted in some schemes with enrichment")],
    notes=[
        "Count usable floor, not the footprint of the building: feeders, drinkers, nest boxes and "
        "service aisles do not count as space the birds can use.",
        "Density and allowance are reciprocals — 6 birds/m² is exactly 0.167 m²/bird — so a plan "
        "that quotes one and not the other is only half specified.",
        "Ventilation, not floor area, becomes the limiting factor above about 9 birds/m² in a "
        "naturally ventilated shed.",
    ],
    mistakes=[
        "Using the shed footprint instead of the usable floor.",
        "Forgetting that birds are moved or thinned: a plan for 10 birds/m² at placement becomes "
        "12 or more at depletion unless birds leave.",
        "Mixing metric and imperial floor areas.",
    ],
    faq=[
        ("What is a good chicken density?",
         "For backyard flocks, 1–2 m² per bird of run plus 0.3 m² of coop is the usual guidance. "
         "Commercial indoor systems run between 7 and 12 birds/m² depending on the standard."),
        ("Does the calculator account for outdoor run?",
         "It measures whatever area you give it. Use the indoor floor for housing density and the "
         "run area separately if you are checking free-range requirements."),
    ],
    related=[("/biology/chicken-feed-amount", "Chicken feed amount"),
             ("/biology/livestock-water-requirement", "Livestock water requirement")],
    svg=("chain", {"caption": "Birds over floor area gives the density, and the allowance is its reciprocal."}),
    icon="chicken",
))

add(Spec(
    name="Chicken Feed Amount Calculator",
    slug="chicken-feed-amount",
    summary=("Feed is the largest running cost of a flock, and a laying hen eats roughly 110–120 g a day. "
             "This calculator turns birds, daily intake and a period into kilos of feed, bags and cost."),
    fields=[
        num("birds", "Number of birds", 12, "", ""),
        num("intake", "Feed per bird per day", 120, "g", "Layers about 120 g, broilers 100–180 g"),
        num("days", "Number of days", 30, "", ""),
        num("price", "Feed price", 0.6, "per kg", "Optional — leave 0 to skip the cost"),
        num("daily", "Feed per day", "", "kg", "", output=True),
        num("total", "Total feed", "", "kg", "", output=True),
        num("bags", "25 kg bags", "", "", "", output=True),
        num("cost", "Feed cost", "", "", "", output=True),
    ],
    dirs=[
        d("Feed", "daily", "birds*intake/1000"),
        d("Feed", "total", "birds*intake*days/1000"),
        d("Feed", "bags", "birds*intake*days/1000/25"),
        d("Feed", "cost", "birds*intake*days/1000*price"),
        d("Feed", "days", "total*1000/(birds*intake)"),
        d("Feed", "intake", "total*1000/(birds*days)"),
    ],
    formula="Total feed (kg) = birds × grams per bird per day × days ÷ 1000",
    symbols=[("birds", "number of birds", "birds"),
             ("intake", "feed eaten by one bird in a day", "g/day"),
             ("days", "length of the period", "days"),
             ("total", "feed needed for the period", "kg")],
    bands=[("100 – 130 g/day", "Laying hen", "typical layer intake at 18–20 °C"),
           ("150 – 200 g/day", "Broiler, finishing", "fast-growing meat birds near market weight"),
           ("80 – 100 g/day", "Pullet or bantam", "smaller body, lower intake")],
    notes=[
        "Add 5–10% for spillage and wild birds; feeding to exactly the calculated figure leaves a "
        "trough empty before the next delivery.",
        "Intake rises with body weight and falls with ambient temperature above about 20 °C, so a "
        "winter month and a summer month are not the same calculation.",
        "The 25 kg bag count is rounded up in the field: half a bag is a bag you have to buy.",
    ],
    mistakes=[
        "Entering the bag weight instead of the daily intake per bird.",
        "Forgetting that chicks eat a fraction of adult intake and that the figure changes weekly.",
        "Budgeting for feed without a wastage allowance — usually the difference between the plan "
        "and the invoice.",
    ],
    faq=[
        ("How much feed does a chicken eat a day?",
         "A laying hen eats about 110–120 g, a broiler 100 g at the start of the cycle rising to "
         "180–200 g at finishing, and a bantam 80–90 g."),
        ("How many 25 kg bags is that?",
         "The calculator divides the total by 25 for you. Order the next whole bag up."),
    ],
    related=[("/biology/fcr", "Feed conversion ratio"),
             ("/biology/chicken-density", "Chicken density"),
             ("/biology/livestock-water-requirement", "Livestock water requirement")],
    svg=("chain", {"caption": "Birds × daily intake × days gives the feed bill."}),
    icon="feed",
))

add(Spec(
    name="Chicken Years to Human Years Calculator",
    slug="chicken-years-to-human-years",
    summary=("A chicken year is about 5.3 human years, so a one-year-old hen is already fully grown. This "
             "calculator converts a chicken's age into a human-equivalent age using the usual rule of "
             "thumb that one chicken year is about 5.3 human years, and shows where the bird sits against "
             "its expected lifespan."),
    fields=[
        num("years", "Chicken age", 2, "years", "Use 0.5 for six months"),
        num("human", "Human-equivalent age", "", "years", "", output=True),
        num("lifespan", "Share of a 10-year lifespan", "", "%", "", output=True),
    ],
    dirs=[
        d("Conversion", "human", "years*5.33"),
        d("Conversion", "lifespan", "years/10*100"),
        d("Conversion", "years", "human/5.33"),
    ],
    formula="Human-equivalent age ≈ chicken age × 5.33",
    symbols=[("years", "the bird's age in years", "years"),
             ("human", "human-equivalent age", "years"),
             ("lifespan", "age as a fraction of a typical 10-year lifespan", "%")],
    bands=[("0 – 0.25", "Chick", "first months, still under heat"),
           ("0.5 – 1", "Point of lay", "sexual maturity, first eggs at 18–22 weeks"),
           ("2 – 5", "Prime laying", "peak production years"),
           ("6 and over", "Senior", "declining lay, watch for arthritis and egg issues")],
    notes=[
        "The multiplier is a rule of thumb, not a biological law: chickens mature in months and "
        "then age slowly, so a linear factor overstates the difference at both ends.",
        "Backyard hybrids typically live 5–8 years; heritage breeds can reach 10–12, which is where "
        "the lifespan share becomes more useful than the raw conversion.",
        "Production lifespan is much shorter than biological lifespan — commercial layers are "
        "retired at around 72–80 weeks.",
    ],
    mistakes=[
        "Entering months as years (a 20-week bird is 0.38 years, not 20).",
        "Reading the human-equivalent age as a health prediction; it is a comparison, not a prognosis.",
    ],
    faq=[
        ("How long do chickens live?",
         "Five to eight years for most backyard hybrids, ten or more for some heritage breeds; "
         "commercial layers are kept for about 80 weeks."),
        ("Is 5.33 right for every breed?",
         "It is an average across breeds. Small bantams tend to age more slowly, fast-growing "
         "broilers much faster."),
    ],
    related=[("/biology/chicken-hatch-date", "Chicken hatch date"),
             ("/biology/goat-years-to-human-years", "Goat years to human years"),
             ("/biology/goldfish-years-to-human-years", "Goldfish years to human years")],
    svg=("bars", {"caption": "Chicken years beside their human equivalent."}),
    icon="chicken",
))

add(Spec(
    name="Goat Years to Human Years Calculator",
    slug="goat-years-to-human-years",
    summary=("A goat's first year is about 18 human years and each later year adds around 2.5. This "
             "calculator uses the widely quoted schedule — the first goat year is about 18 human years and "
             "each later year adds around 2.5 — and shows the animal's life stage as well."),
    fields=[
        num("years", "Goat age", 3, "years", "Use decimals for months, e.g. 0.5 for six months"),
        num("human", "Human-equivalent age", "", "years", "", output=True),
        num("lifespan", "Share of an 18-year lifespan", "", "%", "", output=True),
    ],
    dirs=[
        d("Conversion", "human", "if_else(years<=1, years*18, 18+(years-1)*2.5)"),
        d("Conversion", "lifespan", "years/18*100"),
        d("Conversion", "years", "if_else(human<=18, human/18, 1+(human-18)/2.5)"),
    ],
    formula="Human-equivalent age = 18 × goat age for the first year, then 18 + 2.5 × (goat age − 1)",
    symbols=[("years", "the goat's age", "years"),
             ("human", "human-equivalent age", "years"),
             ("lifespan", "age as a share of an 18-year lifespan", "%")],
    bands=[("0 – 0.5", "Kid", "weaning at about 10 weeks"),
           ("0.5 – 1", "Young stock", "growth and first breeding decisions"),
           ("2 – 7", "Adult", "prime productive years"),
           ("8 and over", "Senior", "teeth wear is the usual limiting factor")],
    notes=[
        "A six-month-old goat is roughly nine human years old by this schedule, which is why kids "
        "are weaned and breeding-ready so much sooner than a mammal of human size would be.",
        "Dairy goats are usually productive to 8–10 years; after that, worn incisors decide more "
        "than age does.",
        "Different sources use 2.5 to 4.7 human years per goat year after maturity. The schedule "
        "here is the conservative middle of that range.",
    ],
    mistakes=[
        "Applying the first-year rate to an adult goat, which makes a five-year-old read as ninety.",
        "Confusing a goat's age with its kidding history, which is not linear in age.",
    ],
    faq=[
        ("How long do goats live?",
         "Twelve to eighteen years for pets and dairy stock, with most reaching 12–15."),
        ("Why is the first year different?",
         "Because maturity is fast: a year-old goat is sexually and physically mature, which no "
         "human is."),
    ],
    related=[("/biology/chicken-years-to-human-years", "Chicken years to human years"),
             ("/biology/goldfish-years-to-human-years", "Goldfish years to human years"),
             ("/biology/goat-gestation", "Goat gestation")],
    svg=("bars", {"caption": "The first year converts steeply; later years add a little at a time."}),
    icon="goat",
))

add(Spec(
    name="Goldfish Years to Human Years Calculator",
    slug="goldfish-years-to-human-years",
    summary=("A goldfish in a bowl lives a couple of years; the same fish in a large, filtered tank "
             "can reach twenty. This calculator converts its age to a human-equivalent using the "
             "usual published rule of thumb — 16.5 years at age one, then 4 years per fish year — "
             "and shows how far through a typical lifespan it is."),
    fields=[
        num("years", "Goldfish age", 3, "years", "Use 0.5 for six months"),
        num("human", "Human-equivalent age", "", "years", "", output=True),
        num("lifespan", "Share of a 20-year lifespan", "", "%", "", output=True),
    ],
    dirs=[
        d("Conversion", "human", "if_else(years<=1, years*16.5, 16.5+(years-1)*4)"),
        d("Conversion", "lifespan", "years/20*100"),
        d("Conversion", "years", "if_else(human<=16.5, human/16.5, 1+(human-16.5)/4)"),
    ],
    formula="Human-equivalent age = 16.5 + (goldfish age − 1) × 4, with 16.5 × age for the first year",
    symbols=[("years", "the fish's age", "years"),
             ("human", "human-equivalent age", "years"),
             ("lifespan", "age as a share of a 20-year lifespan", "%")],
    bands=[("0 – 0.25", "Fry", "first months, high mortality"),
           ("0.5 – 1", "Juvenile", "body shape still developing"),
           ("2 – 8", "Adult", "the long healthy middle"),
           ("10 and over", "Old", "growth has stopped, colour fades")],
    notes=[
        "The number is a comparison, not a forecast. Housing decides goldfish lifespan far more "
        "than genetics: 40 litres for the first fish plus 20 per additional one, filtered and cycled.",
        "Growth rings on scales can be read like tree rings to age a fish properly; the conversion "
        "here starts from that age.",
        "Fancy varieties with rounded bodies generally live shorter lives than common goldfish.",
    ],
    mistakes=[
        "Entering months as years for a young fish, which exaggerates the equivalent age enormously.",
        "Reading the human-equivalent age as a lifespan prediction from a bowl — in a bowl, the "
        "fish rarely reaches the years the conversion assumes.",
    ],
    faq=[
        ("How long do goldfish live?",
         "Ten to twenty years in adequate housing, and often two to five in an unfiltered bowl."),
        ("Does tank size change the conversion?",
         "It changes the expected lifespan, which is the second number the calculator shows; the "
         "conversion factor itself stays the same."),
    ],
    related=[("/biology/fish-density", "Fish density"),
             ("/biology/fish-condition-factor", "Fish condition factor"),
             ("/biology/chicken-years-to-human-years", "Chicken years to human years")],
    svg=("bars", {"caption": "Fish years against human-equivalent years."}),
    icon="fish",
))

add(Spec(
    name="Mouse to Human Age Calculator",
    slug="mouse-to-human-age",
    summary=("Mice age about forty times faster than people, but not evenly: the first months "
             "compress decades. This calculator converts a mouse age in months to a human-equivalent "
             "using the published life-stage anchors (16 human years at two months, 38 at ten, 69 "
             "at two years) and names the developmental stage."),
    fields=[
        num("months", "Mouse age", 4, "months", "3 weeks = 0.7 months; 126 days = 4.1 months"),
        num("human", "Human-equivalent age", "", "years", "", output=True),
        num("weeks", "Mouse age", "", "weeks", "", output=True),
        num("lifespan", "Share of a 2-year lifespan", "", "%", "", output=True),
    ],
    dirs=[
        d("Conversion", "weeks", "months*4.345"),
        d("Conversion", "human",
          "if_else(months<=2, months*8, if_else(months<=10, 16+(months-2)*2.75, "
          "if_else(months<=15, 38+(months-10)*1.8, if_else(months<=18, 47+(months-15)*3, "
          "if_else(months<=24, 56+(months-18)*2.167, 69+(months-24)*2.2)))))"),
        d("Conversion", "lifespan", "months/24*100"),
        d("Conversion", "months", "weeks/4.345"),
    ],
    formula=("Piecewise linear between the standard life-stage anchors: 2 months ≈ 16 human years, "
             "10 months ≈ 38, 15 months ≈ 47, 18 months ≈ 56, 24 months ≈ 69"),
    symbols=[("months", "the animal's age", "months"),
             ("human", "human-equivalent age", "years"),
             ("lifespan", "age as a share of the ~24-month median lifespan", "%")],
    bands=[("3 – 6 weeks", "Weanling", "independent, still growing"),
           ("6 weeks – 6 months", "Young adult", "the standard experimental window"),
           ("6 – 12 months", "Mature adult", "equivalent to roughly 30–40 human years"),
           ("18 – 24 months", "Old", "the usual 'aged' cohort in ageing studies")],
    notes=[
        "Ageing studies quote cohorts in months because the mapping to human life stages is "
        "nonlinear: a two-month difference at six months is worth decades, at eighteen months "
        "barely a few years.",
        "Strain matters. C57BL/6J, BALB/c and FVB have different median lifespans, so the lifespan "
        "share is indicative.",
        "The conversion is a communication device for comparing cohorts, not a biological claim "
        "that the two species age identically.",
    ],
    mistakes=[
        "Converting in years rather than months for a young animal.",
        "Using the linear 40× rule for a mouse younger than six months, which understates the "
        "early life-stage equivalence dramatically.",
    ],
    faq=[
        ("How old is a 1-year-old mouse in human years?",
         "About 42 human years by these anchors — early adulthood, not old age."),
        ("Why are there different conversion tables?",
         "Because the species differ in more than one dimension: lifespan, developmental milestones "
         "and disease onset do not all scale by the same factor."),
    ],
    related=[("/biology/chicken-years-to-human-years", "Chicken years to human years"),
             ("/biology/goat-years-to-human-years", "Goat years to human years")],
    svg=("curve", {"caption": "The conversion is a curve, not a straight line: early months move fast.",
                   "axis": ("mouse months", "human years")}),
    icon="mouse",
))

add(Spec(
    name="Hatch Rate Calculator",
    slug="hatch-rate",
    summary=("Hatch rate is the share of fertile eggs that actually hatch, and hatchability is the "
             "share of all eggs set. The two numbers answer different questions — one measures the "
             "incubator, the other the flock — and this calculator reports both plus the total "
             "losses."),
    fields=[
        num("eggs_set", "Eggs set", 48, "eggs", "Everything that went into the incubator"),
        num("fertile", "Fertile eggs", 40, "eggs", "From candling at day 7–10"),
        num("hatched", "Chicks hatched", 34, "chicks", ""),
        num("hatch_rate", "Hatch rate (of fertile)", "", "%", "", output=True),
        num("hatchability", "Hatchability (of set)", "", "%", "", output=True),
        num("infertile", "Infertile eggs", "", "eggs", "", output=True),
        num("dead_in_shell", "Died after candling", "", "eggs", "", output=True),
    ],
    dirs=[
        d("Hatch", "hatch_rate", "hatched/fertile*100"),
        d("Hatch", "hatchability", "hatched/eggs_set*100"),
        d("Hatch", "infertile", "eggs_set-fertile"),
        d("Hatch", "dead_in_shell", "fertile-hatched"),
        d("Hatch", "hatched", "hatch_rate*fertile/100"),
        d("Hatch", "fertile", "hatched/hatch_rate*100"),
    ],
    formula="Hatch rate = hatched ÷ fertile × 100;  hatchability = hatched ÷ eggs set × 100",
    symbols=[("set", "eggs placed in the incubator", "eggs"),
             ("fertile", "eggs with a visible embryo at candling", "eggs"),
             ("hatched", "chicks that emerged", "chicks")],
    bands=[("85% and above", "Good", "commercial hatchery performance"),
           ("70 – 85%", "Fair", "check turning, temperature and humidity"),
           ("below 70%", "Poor", "look at fertility, storage and incubation first")],
    notes=[
        "A low hatch rate with good fertility points at incubation; a low hatchability with poor "
        "fertility points at the breeding flock, the cockerel ratio or egg storage.",
        "Candling at day 7 removes the infertiles, which is why both numbers are worth reporting: "
        "they separate two different problems.",
        "Stored eggs lose about 1% of hatchability per day after day seven.",
    ],
    mistakes=[
        "Dividing by eggs set and calling it hatch rate — that is hatchability, and it makes a "
        "fertility problem look like an incubator problem.",
        "Candling too early, before day 7, and counting live embryos as infertile.",
    ],
    faq=[
        ("What is a good hatch rate for chickens?",
         "85% of fertile eggs is the commercial benchmark; backyard hatches often run 70–85%."),
        ("What is the difference between hatch rate and hatchability?",
         "Hatch rate is chicks over fertile eggs; hatchability is chicks over all eggs set. The gap "
         "between them is the infertile count."),
    ],
    related=[("/biology/chicken-hatch-date", "Chicken hatch date"),
             ("/biology/egg-incubation-hatch-date", "Egg incubation hatch date"),
             ("/biology/hatch-rate", "Percent germination")],
    svg=("chain", {"caption": "Eggs set, fertile eggs and chicks give two different percentages."}),
    icon="egg",
))

add(Spec(
    name="Fish Condition Factor Calculator",
    slug="fish-condition-factor",
    summary=("Condition factor (K) compares a fish's weight with the weight you would expect for its "
             "length. It is the standard way to describe how well-fed, how healthy or how "
             "well-shaped a fish is, and it is used in fisheries assessment, aquaculture and "
             "aquarium husbandry."),
    fields=[
        num("weight", "Fish weight", 250, "g", "Total body weight"),
        num("length", "Fork length", 25, "cm", "Fork of the tail to the snout"),
        num("k", "Condition factor (K)", "", "", "", output=True),
        num("expected", "Expected weight at K = 1", "", "g", "", output=True),
        num("deviation", "Weight against K = 1", "", "%", "", output=True),
    ],
    dirs=[
        d("Condition", "k", "weight/length^3*100"),
        d("Condition", "expected", "length^3/100"),
        d("Condition", "deviation", "(k-1)*100"),
        d("Condition", "weight", "k*length^3/100"),
        d("Condition", "length", "cbrt(weight*100/k)"),
    ],
    formula="K = (weight in grams ÷ fork length in cm³) × 100",
    symbols=[("weight", "total body weight", "g"),
             ("length", "fork length", "cm"),
             ("k", "Fulton's condition factor", "—")],
    bands=[("below 1.0", "Poor condition", "thin fish; check feeding, disease and water quality"),
           ("1.0 – 1.4", "Normal", "the usual range for most species"),
           ("above 1.4", "Excellent", "well fed, often pre-spawning or a deep-bodied species")],
    notes=[
        "Fulton's K assumes the fish grows isometrically (weight ∝ length³). For species that "
        "change shape as they grow, the relative condition factor against a species-specific "
        "regression is the better measure.",
        "K rises before spawning in females and falls after it, so single measurements taken at "
        "different times of year are not comparable.",
        "A K below 1.0 in a well-fed tank usually means a water-quality or parasite problem, not "
        "underfeeding.",
    ],
    mistakes=[
        "Using total length in one measurement and fork length in another — the difference is "
        "several per cent of length and 10% or more of K.",
        "Weighing a wet fish with a wet net, or a gutted fish, without saying so.",
        "Comparing K across species as if 1.0 meant the same thing everywhere.",
    ],
    sources=["Fulton (1904) condition factor; ranges follow standard fisheries assessment practice."],
    faq=[
        ("What is a good condition factor for a fish?",
         "Around 1.0–1.4 for most freshwater species; below 1.0 suggests the fish is thin for its "
         "length and above 1.4 that it is in good condition — but the normal band is species-specific."),
        ("Should I use fork length or total length?",
         "Whatever you use, use it consistently and say which. This calculator is set up for fork "
         "length, which is standard in fisheries work."),
    ],
    related=[("/biology/fish-density", "Fish density"),
             ("/biology/farm-pond-fish-stocking", "Farm pond fish stocking"),
             ("/biology/goldfish-years-to-human-years", "Goldfish years to human years")],
    svg=("gauge", {"scale": (0.6, 2), "bands": [(0.6, 1.0, "poor"), (1.0, 1.4, "normal"),
                                                (1.4, 2.0, "excellent")],
                   "caption": "Where this fish sits on the usual condition scale."}),
    icon="fish",
))

add(Spec(
    name="Fish Density Calculator",
    slug="fish-density",
    summary=("Fish density is the number of fish per litre or per cubic metre of water, and it is "
             "the number that decides whether a tank, pond or raceway is stocked sensibly. Enter "
             "fish and volume and the calculator returns fish per litre, litres per fish and the "
             "biomass density in grams per litre."),
    fields=[
        num("fish", "Number of fish", 20, "", ""),
        num("volume", "Water volume", 200, "L", "Net water volume, not the tank's outside size"),
        num("weight", "Average fish weight", 15, "g", "Optional: adds a biomass figure"),
        num("density", "Fish per litre", "", "fish/L", "", output=True),
        num("per_fish", "Litres per fish", "", "L/fish", "", output=True),
        num("biomass", "Biomass density", "", "g/L", "", output=True),
    ],
    dirs=[
        d("Density", "density", "fish/volume"),
        d("Density", "per_fish", "volume/fish"),
        d("Density", "biomass", "fish*weight/volume"),
        d("Density", "fish", "density*volume"),
        d("Density", "volume", "fish/density"),
    ],
    formula="Density (fish/L) = number of fish ÷ water volume in litres",
    symbols=[("fish", "number of fish", "fish"),
             ("volume", "net water volume", "L"),
             ("weight", "average weight per fish", "g"),
             ("biomass", "grams of fish per litre", "g/L")],
    bands=[("up to 0.02 fish/L", "Light", "50 L or more per fish"),
           ("0.02 – 0.05 fish/L", "Moderate", "20–50 L per fish"),
           ("0.05 – 0.1 fish/L", "Heavy", "10–20 L per fish, needs strong filtration"),
           ("above 0.1 fish/L", "Very heavy", "under 10 L per fish; only with serious filtration")],
    notes=[
        "Fish per litre is the inverse of litres per fish, so 0.05 fish/L is the same statement as "
        "20 L per fish. Both are shown because different guidelines use different ones.",
        "Biomass density is the number that actually constrains a system: 20 g/L of small fish is a "
        "different load from 20 g/L of large ones, but it is closer to the truth than counting fish.",
        "Volume should be net water volume. Gravel, decorations and a sump that is not running do "
        "not count.",
    ],
    mistakes=[
        "Using the aquarium's advertised capacity rather than the water actually in it.",
        "Judging by fish count alone when the fish are still growing.",
        "Forgetting that density limits depend on the species: a betta and a koi are not the same "
        "calculation.",
    ],
    faq=[
        ("How many fish per litre is safe?",
         "As a starting point, 1 cm of adult fish length per litre is the old freshwater rule, "
         "which corresponds to roughly 20–30 L per small fish. Large or messy fish need far more."),
        ("Does this work for ponds?",
         "Yes — enter the pond volume in litres (1 m³ = 1000 L). Pond stocking is usually quoted in "
         "fish per m³, which is the same ratio at a different scale."),
    ],
    related=[("/biology/fish-per-liter", "Fish per litre"),
             ("/biology/fish-condition-factor", "Fish condition factor"),
             ("/biology/farm-pond-fish-stocking", "Farm pond fish stocking"),
             ("/other/aquarium-volume", "Aquarium water volume")],
    svg=("chain", {"caption": "Fish over litres gives density; average weight adds the biomass load."}),
    icon="fish",
))

add(Spec(
    name="Fish Per Liter Calculator",
    slug="fish-per-liter",
    summary=("Stocking an aquarium or a tank system comes down to one ratio: how many fish one litre "
             "of water supports. This calculator converts between fish per litre, litres per fish "
             "and the total a tank of a given size can hold, and adds the traditional centimetres "
             "of fish per litre rule as a cross-check."),
    fields=[
        num("fish", "Number of fish", 20, "", ""),
        num("volume", "Tank volume", 200, "L", ""),
        num("length", "Average adult fish length", 4, "cm", "Adult size, not the size you bought"),
        num("density", "Fish per litre", "", "fish/L", "", output=True),
        num("per_fish", "Litres per fish", "", "L/fish", "", output=True),
        num("cm_per_l", "Centimetres of fish per litre", "", "cm/L", "", output=True),
        num("capacity", "Fish the tank supports at 0.05 fish/L", "", "fish", "", output=True),
    ],
    dirs=[
        d("Stocking", "density", "fish/volume"),
        d("Stocking", "per_fish", "volume/fish"),
        d("Stocking", "cm_per_l", "fish*length/volume"),
        d("Stocking", "capacity", "volume*0.05"),
        d("Stocking", "fish", "density*volume"),
    ],
    formula="Fish per litre = number of fish ÷ tank volume in litres",
    symbols=[("fish", "number of fish", "fish"),
             ("volume", "tank volume", "L"),
             ("length", "adult length of the species", "cm"),
             ("cm_per_l", "centimetres of fish per litre", "cm/L")],
    bands=[("below 0.5 cm/L", "Understocked", "room to grow"),
           ("0.5 – 1 cm/L", "Traditional rule", "the old inch-per-gallon style guidance"),
           ("above 2 cm/L", "Overstocked", "needs heavy filtration and frequent water changes")],
    notes=[
        "The centimetre-per-litre figure is the classic freshwater rule of thumb (about 1 cm of "
        "adult fish per litre). It is crude but it is what most guidance is based on.",
        "Species matter more than the number: goldfish produce several times the waste of a "
        "same-length tetra.",
        "Always size for the adult, not the juvenile you are buying.",
    ],
    mistakes=[
        "Stocking by current size and then not upgrading as the fish grow.",
        "Ignoring filtration, which determines how much of the load can actually be processed.",
    ],
    faq=[
        ("How many fish can I put in a 200 litre tank?",
         "About 10 small community fish at 0.05 fish/L, or the same tank could hold fewer larger "
         "fish — the biomass, not the count, is the real limit."),
    ],
    related=[("/biology/fish-density", "Fish density"),
             ("/other/aquarium-volume", "Aquarium water volume"),
             ("/biology/fish-condition-factor", "Fish condition factor")],
    svg=("gauge", {"scale": (0, 3), "bands": [(0, 0.5, "under"), (0.5, 1, "rule of thumb"),
                                              (1, 3, "heavy")],
                   "caption": "Centimetres of adult fish per litre, with the traditional band in the middle."}),
    icon="fish",
))

add(Spec(
    name="Farm Pond Fish Stocking Calculator",
    slug="farm-pond-fish-stocking",
    summary=("A farm pond is usually stocked in a ratio, not a single species: bluegill as forage, "
             "bass as predators, and often channel catfish alongside. This calculator turns pond "
             "surface area into a stocking plan — total fish, the predator-to-forage split and the "
             "biomass it implies."),
    fields=[
        num("area", "Pond surface area", 0.4, "hectares", "1 acre = 0.405 ha"),
        num("rate", "Stocking rate", 2500, "fish/ha", "Typical fertilised pond: 2,500–5,000/ha"),
        num("predator", "Predator share", 20, "%", "Bass or equivalent, typically 10–25%"),
        num("pests", "Presence of wild fish (1 = yes, 0 = no)", 0, "", "Stock heavier if wild fish are present"),
        num("total", "Total fish to stock", "", "fish", "", output=True),
        num("predators", "Predators", "", "fish", "", output=True),
        num("forage", "Forage fish", "", "fish", "", output=True),
        num("per_ha", "Fish per hectare", "", "fish/ha", "", output=True),
    ],
    dirs=[
        d("Stocking", "total", "area*rate*(1+0.1*pests)"),
        d("Stocking", "predators", "area*rate*(1+0.1*pests)*predator/100"),
        d("Stocking", "forage", "area*rate*(1+0.1*pests)*(1-predator/100)"),
        d("Stocking", "per_ha", "total/area"),
        d("Stocking", "area", "total/(rate*(1+0.1*pests))"),
        d("Stocking", "rate", "total/(area*(1+0.1*pests))"),
    ],
    formula="Total fish = pond area (ha) × stocking rate (fish/ha); predators = total × predator share",
    symbols=[("area", "pond surface area", "ha"),
             ("rate", "fish per hectare", "fish/ha"),
             ("predator", "share of the stock that is predatory", "%"),
             ("total", "fish to stock", "fish")],
    bands=[("1,000 – 2,500 /ha", "Light", "unfertilised pond, natural productivity only"),
           ("2,500 – 5,000 /ha", "Standard", "fertilised pond with a bass-bluegill balance"),
           ("above 5,000 /ha", "Intensive", "needs aeration and feeding")],
    notes=[
        "The classic bass-bluegill plan stocks forage first and predators a season later, so the "
        "forage population is established before anything eats it.",
        "If wild fish are already present, stock larger fingerlings and expect lower survival.",
        "Pond depth matters as much as area: 1.5–2 m over most of the pond, with deeper water for "
        "overwintering, is the usual minimum.",
    ],
    mistakes=[
        "Stocking predators and forage at the same time in a pond with no cover.",
        "Applying a hatchery's per-acre rate to a hectare (or the reverse) — a factor of 2.47.",
        "Stocking before the pond has cycled and the food chain has established.",
    ],
    faq=[
        ("How many fish per acre should I stock?",
         "A common starting point is 1,000 fish per acre (about 2,500 per hectare) in a fertilised "
         "pond, split roughly 80% forage to 20% predators."),
        ("Can I stock without aeration?",
         "Yes at low densities with good depth and vegetation control; above about 5,000 fish/ha, "
         "summer oxygen becomes the limiting factor."),
    ],
    related=[("/biology/fish-density", "Fish density"),
             ("/biology/fish-condition-factor", "Fish condition factor"),
             ("/biology/farm-pond-fish-stocking", "Pond stocking")],
    svg=("chain", {"caption": "Area × rate gives the total; the predator share splits it."}),
    icon="fish",
))

add(Spec(
    name="Livestock Water Requirement Calculator",
    slug="livestock-water-requirement",
    summary=("Water intake scales with dry-matter intake and with heat, and it is the number most "
             "often under-designed on a farm. This calculator estimates daily and weekly water "
             "demand for a herd from body weight, species and temperature, together with the peak "
             "flow rate a trough has to deliver."),
    fields=[
        sel("species", "Species", [("Cattle", "1"), ("Sheep", "2"), ("Goat", "3"),
                                   ("Pig", "4"), ("Horse", "5"), ("Poultry", "6")], "1"),
        num("head", "Number of animals", 20, "", ""),
        num("weight", "Average body weight", 500, "kg", "Adult weight"),
        num("temp", "Ambient temperature", 25, "°C", "Daily average or expected maximum"),
        num("per_head", "Water per animal per day", "", "L", "", output=True),
        num("daily", "Herd water per day", "", "L", "", output=True),
        num("weekly", "Herd water per week", "", "L", "", output=True),
        num("flow", "Peak flow for a 4-hour drinking window", "", "L/h", "", output=True),
    ],
    dirs=[
        d("Water", "per_head",
          "if_else(species==1, weight*0.10, if_else(species==2, weight*0.08, "
          "if_else(species==3, weight*0.09, if_else(species==4, weight*0.12, "
          "if_else(species==5, weight*0.06, weight*0.20)))))*(1+max(0,temp-20)*0.02)"),
        d("Water", "daily", "head*per_head"),
        d("Water", "weekly", "head*per_head*7"),
        d("Water", "flow", "head*per_head/4"),
        d("Water", "head", "daily/per_head"),
    ],
    formula=("Daily water (L/animal) = body weight × species factor × temperature correction; "
             "temperature correction = 1 + 0.02 × (temp − 20 °C) above 20 °C"),
    symbols=[("weight", "average body weight", "kg"),
             ("species factor", "litres per kg of body weight for that species", "L/kg"),
             ("head", "number of animals", "head"),
             ("per_head", "daily water per animal", "L/day")],
    bands=[("cattle", "0.10 L/kg", "roughly 50 L for a 500 kg cow at 20 °C"),
           ("sheep / goat", "0.08–0.09 L/kg", "4–6 L for a 50 kg ewe"),
           ("pig", "0.12 L/kg", "about 18 L for a 150 kg sow"),
           ("poultry", "0.20 L/kg", "approximately 0.3 L per hen per day")],
    notes=[
        "Intake climbs steeply with heat: a 500 kg cow needs about 50 L at 20 °C and around 70 L "
        "at 40 °C, which is why summer failures are usually a flow problem rather than a volume one.",
        "Lactation adds 30–50% for dairy cattle; the calculator deliberately gives the "
        "maintenance figure and says so.",
        "Peak flow matters: animals drink most of their water in a few hours after milking or "
        "feeding, so a trough sized for the daily total can still leave the herd waiting.",
    ],
    mistakes=[
        "Sizing storage for the daily total but not the trough's refill rate.",
        "Ignoring the temperature term in summer, which is where most shortfalls appear.",
        "Using mature weight for growing animals, which overstates demand.",
    ],
    faq=[
        ("How much water does a cow drink a day?",
         "About 40–70 litres for a 500 kg beef cow at moderate temperatures, rising to 100 litres "
         "or more in heat or during lactation."),
        ("How do I size a trough?",
         "Give the herd its daily requirement in one to two hours of refill, which is what the peak "
         "flow figure here approximates."),
    ],
    related=[("/biology/dry-matter-intake", "Dry matter intake"),
             ("/biology/pasture-stocking-rate", "Pasture stocking rate"),
             ("/biology/chicken-feed-amount", "Chicken feed amount")],
    svg=("bars", {"caption": "Daily demand by species at the temperature you entered."}),
    icon="water",
))

add(Spec(
    name="Pasture Stocking Rate Calculator",
    slug="pasture-stocking-rate",
    summary=("Stocking rate is how many animals a paddock can carry without the grass running out "
             "before it regrows. It balances pasture supply against intake and grazing efficiency, "
             "and gives both the stocking rate and the area each animal needs."),
    fields=[
        num("area", "Pasture area", 10, "ha", ""),
        num("dm_yield", "Pasture dry-matter yield", 8000, "kg/ha/yr", "Temperate pasture: 6,000–12,000"),
        num("use", "Utilisation", 65, "%", "How much of the growth animals actually harvest"),
        num("intake", "Daily dry-matter intake per animal", 12, "kg/day", "Cattle: 2–2.5% of body weight"),
        num("season", "Grazing days per year", 220, "days", "Days the animals are on pasture"),
        num("capacity", "Animals carried", "", "head", "", output=True),
        num("lu", "Livestock units (1 LU = 600 kg cow)", "", "LU", "", output=True),
        num("per_head", "Pasture per animal", "", "ha/head", "", output=True),
        num("dm_available", "Usable dry matter", "", "kg", "", output=True),
    ],
    dirs=[
        d("Stocking", "dm_available", "area*dm_yield*use/100"),
        d("Stocking", "capacity", "area*dm_yield*use/100/(intake*season)"),
        d("Stocking", "lu", "area*dm_yield*use/100/(intake*season)"),
        d("Stocking", "per_head", "area/(area*dm_yield*use/100/(intake*season))"),
        d("Stocking", "area", "intake*season*capacity/(dm_yield*use/100)"),
    ],
    formula="Animals = (area × yield × utilisation) ÷ (daily intake × grazing days)",
    symbols=[("area", "grazed area", "ha"),
             ("yield", "annual dry-matter production", "kg/ha"),
             ("use", "share of growth actually eaten", "%"),
             ("intake", "dry matter eaten per animal per day", "kg/day"),
             ("season", "grazing days", "days")],
    bands=[("0.8–1.5 LU/ha", "Extensive", "unimproved or dryland pasture"),
           ("1.5–3 LU/ha", "Moderate", "improved temperate pasture"),
           ("3–5 LU/ha", "Intensive", "high-rainfall or irrigated, rotational grazing"),
           ("above 5 LU/ha", "Very intensive", "needs nitrogen, irrigation or supplementary feed")],
    notes=[
        "Utilisation is the honest number in the equation: of the grass that grows, typically 50–70% "
        "can be eaten before the pasture is damaged.",
        "Grazing days matters as much as yield — a pasture that is only grazed in summer carries "
        "more animals than the same pasture grazed all year.",
        "Livestock units let you compare mixed herds: 1 LU is conventionally a 600 kg mature cow.",
    ],
    mistakes=[
        "Using total grass growth as if all of it were available.",
        "Forgetting that stock still need feed when the grass stops growing.",
        "Comparing stocking rates without checking whether both are per hectare or per acre.",
    ],
    faq=[
        ("How many cows per hectare?",
         "On improved temperate pasture, roughly 1.5–3 livestock units per hectare, which is "
         "1.5–3 cows or several times that number of sheep."),
        ("What utilisation should I assume?",
         "60–70% for rotational grazing, lower for continuous grazing."),
    ],
    related=[("/biology/livestock-water-requirement", "Livestock water requirement"),
             ("/biology/dry-matter-intake", "Dry matter intake"),
             ("/biology/maximum-sustainable-yield", "Maximum sustainable yield")],
    svg=("chain", {"caption": "Grass grown, the share eaten, and the intake per animal set the stocking rate."}),
    icon="grass",
))

add(Spec(
    name="Pig Weight Calculator",
    slug="pig-weight",
    summary=("You cannot put a pig on a bathroom scale, but you can measure it with a tape. This "
             "calculator estimates live weight from heart girth and body length using the standard "
             "girth-squared × length formula, and reports the result in kilograms and pounds."),
    fields=[
        num("girth", "Heart girth", 110, "cm", "Circumference just behind the front legs"),
        num("length", "Body length", 100, "cm", "Between the ears to the base of the tail"),
        sel("unit", "Measured in", [("Centimetres", "1"), ("Inches", "2")], "1"),
        num("weight", "Estimated live weight", "", "kg", "", output=True),
        num("weight_lb", "Estimated live weight", "", "lb", "", output=True),
    ],
    dirs=[
        d("Live weight", "weight",
          "if_else(unit==1, girth*girth*length/400, (girth*girth*length)*0.4536/400*16.387)"),
        d("Live weight", "weight_lb", "weight*2.2046"),
        d("Live weight", "girth", "sqrt(weight*400/length)"),
        d("Live weight", "length", "weight*400/(girth*girth)"),
    ],
    formula="Live weight (kg) ≈ (heart girth² × body length) ÷ 400, with both measured in centimetres",
    symbols=[("girth", "heart girth behind the front legs", "cm"),
             ("length", "from between the ears to the tail base", "cm"),
             ("weight", "estimated live weight", "kg")],
    bands=[("under 30 kg", "Piglet", "still on the sow"),
           ("30 – 70 kg", "Grower", "the fast-growth phase"),
           ("70 – 110 kg", "Finisher", "approaching market weight"),
           ("over 110 kg", "Heavy", "sow or mature boar territory")],
    notes=[
        "The 400 divisor is an empirical constant for typical commercial pigs. Feral, obese or very "
        "lean animals fall outside it, and the estimate can be 10% out.",
        "Measure with the pig standing square and its head up; a pig that is lying down or "
        "squirming gives a girth several centimetres too small.",
        "For management decisions — dosing, feed allocation — a 10% margin is the useful way to "
        "read this number.",
    ],
    mistakes=[
        "Measuring girth behind the shoulders instead of behind the front legs.",
        "Taking the length along the back's curve instead of straight from ear base to tail base.",
        "Mixing centimetres and inches in one calculation.",
    ],
    sources=["Girth-squared method used in pig husbandry extension guidance; the constant is "
             "calibrated for commercial crossbreeds."],
    faq=[
        ("How accurate is the tape method?",
         "Usually within 5–10% for healthy commercial pigs. Weigh on a scale when the decision is "
         "critical, such as medication dosing."),
        ("Can I use it for a pot-bellied pig?",
         "Roughly, but the constant is calibrated on commercial breeds; expect a larger error on "
         "very different body shapes."),
    ],
    related=[("/biology/dry-matter-intake", "Dry matter intake"),
             ("/biology/pasture-stocking-rate", "Pasture stocking rate"),
             ("/biology/horse-weight", "Horse weight")],
    svg=("chain", {"caption": "Two tape measurements give the weight."}),
    icon="pig",
))

add(Spec(
    name="Puppy Adult Weight Predictor",
    slug="puppy-adult-weight-predictor",
    summary=("A puppy's adult weight can be estimated from its current weight and age, because "
             "growth follows a predictable curve that depends on the breed's adult size. This "
             "calculator gives an estimate and a realistic range, and names the size class the dog "
             "is heading for."),
    fields=[
        num("weight", "Current weight", 6, "kg", "At the age you enter below"),
        num("age", "Current age", 14, "weeks", "Weeks old"),
        sel("size_class", "Predicted breed size", [("Small (<10 kg adult)", "1"),
                                              ("Medium (10–25 kg)", "2"),
                                              ("Large (25–45 kg)", "3"),
                                              ("Giant (>45 kg)", "4")], "2"),
        num("adult", "Estimated adult weight", "", "kg", "", output=True),
        num("low", "Likely range — low", "", "kg", "", output=True),
        num("high", "Likely range — high", "", "kg", "", output=True),
        num("remaining", "Growth still to come", "", "%", "", output=True),
    ],
    dirs=[
        d("Adult weight", "adult",
          "if_else(size_class==1, weight*(1+max(0,0.30-age*0.004)), "
          "if_else(size_class==2, weight*(1+max(0,0.60-age*0.007)), "
          "if_else(size_class==3, weight*(1+max(0,1.10-age*0.010)), weight*(1+max(0,1.60-age*0.013)))))"),
        d("Adult weight", "low", "adult*0.9"),
        d("Adult weight", "high", "adult*1.1"),
        d("Adult weight", "remaining", "adult/weight"),
        d("Adult weight", "weight", "adult/(1+max(0,0.60-age*0.007))"),
    ],
    formula=("Adult weight ≈ current weight × (1 + growth allowance), where the allowance shrinks "
             "with age and is larger for bigger breeds"),
    symbols=[("weight", "puppy weight now", "kg"),
             ("age", "age in weeks", "weeks"),
             ("class", "breed size class", "—"),
             ("adult", "estimated adult weight", "kg")],
    bands=[("under 10 kg", "Small", "terriers, toy breeds, reaching adult weight at 9–10 months"),
           ("10 – 25 kg", "Medium", "beagles, border collies, adult at 12 months"),
           ("25 – 45 kg", "Large", "labradors, shepherds, adult at 14–16 months"),
           ("over 45 kg", "Giant", "mastiffs, great danes, growing until 18–24 months")],
    notes=[
        "The estimate is a band, not a promise: within one litter of the same breed, adult weights "
        "can differ by 20%.",
        "Large and giant breeds keep growing long after small breeds have stopped, which is why the "
        "same 14-week-old puppy can have very different trajectories.",
        "Puppies should be weighed weekly for the first months — the trend matters more than any "
        "single estimate.",
    ],
    mistakes=[
        "Entering the age in months where weeks are expected (a 14 here means 14 weeks).",
        "Picking the size class by what the puppy looks like now rather than by its parentage.",
        "Feeding to the predicted adult weight instead of to body condition score.",
    ],
    faq=[
        ("How accurate is a puppy weight prediction?",
         "Within about 10–15% for purebred puppies of known parentage; much less reliable for "
         "mixed breeds and for puppies whose growth has been uneven."),
        ("When does a puppy stop growing?",
         "Small breeds at 9–10 months, medium at about 12, large at 14–16 and giant breeds at 18–24."),
    ],
    related=[("/biology/dog-food", "Dog food"),
             ("/biology/dry-matter-intake", "Dry matter intake"),
             ("/biology/pig-weight", "Pig weight")],
    svg=("curve", {"caption": "Growth curves flatten at different ages depending on adult size.",
                   "axis": ("age", "weight")}),
    icon="dog",
))

add(Spec(
    name="Dry Matter Intake Calculator",
    slug="dry-matter-intake",
    summary=("Dry matter intake is how much feed an animal actually eats once the water is taken "
             "out, and it is the number nutritionists formulate against. This calculator estimates "
             "intake from body weight and feed type, converts as-fed weights into dry matter, and "
             "reports the percentage of body weight consumed."),
    fields=[
        num("weight", "Body weight", 500, "kg", ""),
        sel("feed", "Feed type", [("Pasture / forage", "1"), ("Hay", "2"), ("Silage", "3"),
                                  ("Concentrate", "4")], "2"),
        num("dm", "Dry matter of the feed", 88, "%", "Hay ~88%, silage ~35%, grain ~88%"),
        num("asfed", "Feed offered", 14, "kg/day", "Weight as it comes out of the bag or bale"),
        num("intake", "Dry matter intake", "", "kg/day", "", output=True),
        num("pct_bw", "Intake as % of body weight", "", "%", "", output=True),
        num("target", "Target intake", "", "kg/day", "", output=True),
    ],
    dirs=[
        d("Intake", "intake", "asfed*dm/100"),
        d("Intake", "pct_bw", "asfed*dm/100/weight*100"),
        d("Intake", "target", "weight*if_else(feed==1, 0.025, if_else(feed==2, 0.022, "
                               "if_else(feed==3, 0.020, 0.018)))"),
        d("Intake", "asfed", "intake*100/dm"),
    ],
    formula="Dry matter intake = as-fed weight × dry-matter % ÷ 100; "
            "target intake ≈ 1.8–2.5% of body weight depending on feed",
    symbols=[("weight", "body weight", "kg"),
             ("asfed", "feed offered, as fed", "kg/day"),
             ("dm", "dry matter content of that feed", "%"),
             ("intake", "dry matter actually eaten", "kg/day")],
    bands=[("1.8 – 2.0% of BW", "Concentrate-heavy", "high-energy rations"),
           ("2.0 – 2.2% of BW", "Silage-based", "wet forage limits intake"),
           ("2.2 – 2.5% of BW", "Hay / pasture", "the usual range for dry forage")],
    notes=[
        "Two feeds with the same as-fed weight can differ by a factor of three in dry matter: 10 kg "
        "of silage at 35% DM is 3.5 kg of dry matter, 10 kg of hay at 88% is 8.8 kg.",
        "Intake as a percentage of body weight is how guidelines are written, so it is the number "
        "to compare against them.",
        "Palatability, water access and fibre length all cap intake before the arithmetic does.",
    ],
    mistakes=[
        "Comparing a silage ration with a hay ration on an as-fed basis.",
        "Assuming the dry matter percentage on the label is the same as the batch in the yard.",
        "Feeding to a target intake without checking what is actually refused.",
    ],
    faq=[
        ("What is a normal dry matter intake for cattle?",
         "About 2–2.5% of body weight on dry forage and 1.8–2% on high-concentrate rations."),
        ("Why does dry matter matter more than as-fed weight?",
         "Because water has no nutritional value: dry matter is the part of the feed the animal can "
         "actually use."),
    ],
    related=[("/biology/livestock-water-requirement", "Livestock water requirement"),
             ("/biology/fcr", "Feed conversion ratio"),
             ("/biology/pasture-stocking-rate", "Pasture stocking rate")],
    svg=("chain", {"caption": "As-fed weight, dry-matter percentage and body weight give intake."}),
    icon="feed",
))

add(Spec(
    name="Chicken Hatch Date Calculator",
    slug="chicken-hatch-date",
    summary=("Chicken eggs hatch 21 days after they are set, with a one-day window either side. "
             "This calculator counts forward from the day you set the eggs to the hatch date, tells "
             "you which incubation stage the eggs are at today, and flags the days when you should "
             "candle and when to stop turning."),
    fields=[
        num("set_day", "Day of month you set the eggs", 1, "day", "1–31"),
        num("set_month", "Month", 4, "month", "1 = January, 12 = December"),
        num("elapsed", "Days already incubated", 0, "days", "Leave 0 if you set them today"),
        num("hatch_day", "Hatch day (day of month)", "", "day", "", output=True),
        num("hatch_month", "Hatch month", "", "month", "", output=True),
        num("total_days", "Incubation period", 21, "days", "21 for chickens, 28 duck, 28–30 goose"),
        num("remaining", "Days remaining", "", "days", "", output=True),
        num("candle_at", "Candle on day", "", "", "", output=True),
        num("lockdown_at", "Stop turning on day", "", "", "", output=True),
    ],
    dirs=[
        d("Timeline", "remaining", "total_days-elapsed"),
        d("Timeline", "candle_at", "7"),
        d("Timeline", "lockdown_at", "total_days-3"),
        d("Timeline", "hatch_day", "set_day+total_days"),
        d("Timeline", "hatch_month", "set_month+0"),
    ],
    formula="Hatch date = set date + 21 days; lockdown (stop turning, raise humidity) at day 18",
    symbols=[("set date", "the day the eggs went in", "date"),
             ("total_days", "incubation period for the species", "days"),
             ("hatch date", "expected hatch", "date")],
    bands=[("day 1 – 7", "Setting", "temperature and humidity stabilising"),
           ("day 7 – 10", "Candling", "clear eggs can be removed"),
           ("day 18", "Lockdown", "stop turning, raise humidity to 65–70%"),
           ("day 21", "Hatch", "chicks emerge over 12–24 hours")],
    notes=[
        "The hatch date moves by up to a day either way with temperature: a forced-air incubator "
        "running 0.5 °C cool can add a day, and a still-air one can finish early.",
        "If you set eggs on several days, treat each batch separately — a two-day spread becomes a "
        "two-day spread at hatch.",
        "Month arithmetic here is a plain addition of the day number; if the sum passes the end of "
        "the month, count into the next month when you plan your calendar.",
    ],
    mistakes=[
        "Counting the set day as day 1 when the eggs went in late in the evening.",
        "Leaving the turner on past day 18, which is a common cause of malpositioned chicks.",
        "Opening the incubator during hatch, which drops humidity exactly when the chicks need it.",
    ],
    faq=[
        ("How long do chicken eggs take to hatch?",
         "21 days at 37.5 °C in a forced-air incubator. Ducks take 28, quail 17–18, geese 28–30."),
        ("What is lockdown?",
         "The last three days, when turning stops, humidity goes up to about 65–70% and the "
         "incubator stays closed."),
    ],
    related=[("/biology/egg-incubation-hatch-date", "Egg incubation hatch date"),
             ("/biology/hatch-rate", "Hatch rate"),
             ("/biology/chicken-years-to-human-years", "Chicken years to human years")],
    svg=("chain", {"caption": "Set date plus incubation period lands on hatch day."}),
    icon="egg",
))

add(Spec(
    name="Egg Incubation Hatch Date Calculator",
    slug="egg-incubation-hatch-date",
    summary=("Different species take different times to hatch, and setting a mixed batch means "
             "tracking several dates at once. Choose the species, enter the set date and the "
             "calculator returns the hatch date, the candling window and the lockdown day for "
             "chickens, ducks, quail, turkeys, geese and pheasants."),
    fields=[
        sel("species", "Species", [("Chicken", "21"), ("Duck (mallard type)", "28"),
                                   ("Muscovy duck", "35"), ("Turkey", "28"), ("Goose", "30"),
                                   ("Japanese quail", "18"), ("Pheasant", "24")], "21"),
        num("set_day", "Day of month set", 10, "day", "1-31"),
        num("set_month", "Month set", 3, "month", "1-12"),
        num("period", "Incubation period", "", "days", "", output=True),
        num("hatch_doy", "Hatch - day of the year", "", "day", "", output=True),
        num("hatch_month", "Hatch month", "", "month", "", output=True),
        num("hatch_day", "Hatch day of month", "", "day", "", output=True),
        num("candle_day", "Candle on day", "", "days", "", output=True),
        num("lockdown_month", "Lockdown month", "", "month", "", output=True),
        num("lockdown_day", "Lockdown day of month", "", "day", "", output=True),
    ],
    dirs=[
        d("Hatch", "period", "species"),
        d("Hatch", "hatch_doy", "mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1"),
        d("Hatch", "hatch_month", "if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=334,11,12)))))))))))"),
        d("Hatch", "hatch_day", "mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1-(if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=334,11,12)))))))))))<=1,0,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=334,11,12)))))))))))<=2,31,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=334,11,12)))))))))))<=3,59,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=334,11,12)))))))))))<=4,90,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=334,11,12)))))))))))<=5,120,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=334,11,12)))))))))))<=6,151,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=334,11,12)))))))))))<=7,181,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=334,11,12)))))))))))<=8,212,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=334,11,12)))))))))))<=9,243,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=334,11,12)))))))))))<=10,273,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=334,11,12)))))))))))<=11,304,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-1)-1,365)+1<=334,11,12)))))))))))<=12,334,365)))))))))))))"),
        d("Hatch", "candle_day", "round(species*0.33,0)"),
        d("Hatch", "lockdown_month", "if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=334,11,12)))))))))))"),
        d("Hatch", "lockdown_day", "mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1-(if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=334,11,12)))))))))))<=1,0,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=334,11,12)))))))))))<=2,31,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=334,11,12)))))))))))<=3,59,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=334,11,12)))))))))))<=4,90,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=334,11,12)))))))))))<=5,120,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=334,11,12)))))))))))<=6,151,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=334,11,12)))))))))))<=7,181,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=334,11,12)))))))))))<=8,212,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=334,11,12)))))))))))<=9,243,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=334,11,12)))))))))))<=10,273,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=334,11,12)))))))))))<=11,304,if_else(if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=31,1,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=59,2,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=90,3,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=120,4,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=151,5,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=181,6,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=212,7,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=243,8,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=273,9,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=304,10,if_else(mod(((if_else(set_month<=1,0,if_else(set_month<=2,31,if_else(set_month<=3,59,if_else(set_month<=4,90,if_else(set_month<=5,120,if_else(set_month<=6,151,if_else(set_month<=7,181,if_else(set_month<=8,212,if_else(set_month<=9,243,if_else(set_month<=10,273,if_else(set_month<=11,304,if_else(set_month<=12,334,365))))))))))))+set_day-1)+species-4)-1,365)+1<=334,11,12)))))))))))<=12,334,365)))))))))))))"),
    ],
    formula=("Hatch date = set date + incubation period;  candling at about a third of the "
             "way through;  lockdown 3 days before hatch"),
    symbols=[("species period", "days from set to hatch", "days"),
             ("set day", "day of month the eggs went in", "day"),
             ("hatch day", "day of month they should hatch", "day")],
    bands=[("17 – 18 days", "Quail", "the shortest common incubation"),
           ("21 days", "Chicken", "37.5 °C, 45–55% humidity"),
           ("28 days", "Duck / turkey", "slightly higher humidity than chicken"),
           ("30 – 35 days", "Goose / Muscovy", "cooler and slower, more water needed")],
    notes=[
        "Candling is placed at a third of the way through the incubation, which is when the embryo "
        "is large enough to see but the egg is still easy to handle.",
        "Waterfowl eggs need more humidity and benefit from cooling and misting once a day once "
        "incubation is under way.",
        "The quoted periods assume a forced-air incubator at the species' standard temperature.",
    ],
    mistakes=[
        "Running waterfowl eggs on the chicken humidity schedule, which dries them out.",
        "Candling too early and discarding eggs that are merely slow to show veins.",
        "Mixing species in one incubator without tracking each batch separately.",
    ],
    faq=[
        ("How long do duck eggs take to hatch?",
         "28 days for mallard-type ducks and 35 for Muscovy, which are a different species entirely."),
        ("Can I set different species together?",
         "Yes, if you track each batch's dates separately — lockdown differs by several days."),
    ],
    related=[("/biology/chicken-hatch-date", "Chicken hatch date"),
             ("/biology/hatch-rate", "Hatch rate"),
             ("/biology/chicken-feed-amount", "Chicken feed amount")],
    svg=("bars", {"caption": "Incubation lengths side by side."}),
    icon="egg",
))
