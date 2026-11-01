"""Batch C — cell culture, viability, counting and bioprocess."""

from lib import Spec, num, sel, d

SPECS: list[Spec] = []


def add(s: Spec) -> None:
    SPECS.append(s)


add(Spec(
    name="Hemocytometer Cell Counter (cells/mL)",
    slug="hemocytometer-cell-counter",
    summary=("A hemocytometer turns a counted number of cells into a concentration using one physical "
             "fact: each large square holds 0.1 µL. This calculator averages your counts, applies the "
             "dilution factor — including the trypan blue step — and returns cells/mL, cells/µL and "
             "total cells."),
    fields=[
        num("cells_counted", "Total cells counted", 320, "cells", "Live plus dead, over all squares counted"),
        num("squares", "Squares counted", 4, "", "Usually the four corner squares"),
        num("dilution", "Dilution factor", 2, "×", "2 for a 1:1 mix with trypan blue"),
        num("volume", "Suspension volume", 10, "mL", "Used for the total yield"),
        num("conc", "Cell concentration", "", "cells/mL", "", output=True),
        num("per_ul", "Cell concentration", "", "cells/µL", "", output=True),
        num("total_cells", "Total cells in the suspension", "", "cells", "", output=True),
        num("million", "Concentration", "", "×10⁶/mL", "", output=True),
    ],
    dirs=[
        d("Concentration", "conc", "cells_counted/squares*dilution*10000"),
        d("Concentration", "per_ul", "cells_counted/squares*dilution*10"),
        d("Concentration", "total_cells", "cells_counted/squares*dilution*10000*volume"),
        d("Concentration", "million", "cells_counted/squares*dilution*10000/1000000"),
    ],
    formula="Cells/mL = (cells counted ÷ squares counted) × dilution factor × 10⁴",
    symbols=[("cells_counted", "cells counted across all squares", "cells"),
             ("squares", "number of large squares counted", "—"),
             ("dilution", "total dilution before counting", "×"),
             ("10⁴", "reciprocal of the 0.1 µL volume of one large square", "mL⁻¹")],
    bands=[("20 – 200 per square", "Countable", "high enough for precision, low enough to resolve"),
           ("below 20", "Too few", "sampling error dominates; count more squares"),
           ("above 200", "Too many", "clumps and overlapping cells; dilute")],
    notes=[
        "The 10⁴ is geometry, not a correction: 1 mm × 1 mm × 0.1 mm = 0.1 mm³ = 10⁻⁴ mL.",
        "Count the cells touching the top and left lines and skip the bottom and right ones, so "
        "border cells are counted exactly once.",
        "Aim for 100–200 cells per large square. Below about 20, the Poisson counting error alone "
        "is 20% or worse.",
    ],
    mistakes=[
        "Forgetting the trypan blue dilution — the single most common cause of a concentration that "
        "is exactly half the truth.",
        "Counting clumps as single cells without disaggregating and re-counting.",
        "Loading the chamber without letting it fill by capillary action, which leaves an uneven "
        "distribution.",
    ],
    sources=["Improved Neubauer chamber geometry; the counting convention is the standard "
             "haematology one."],
    faq=[
        ("Why do I multiply by 10 000?",
         "Because each large square holds 0.0001 mL, and dividing by such a small volume is the same "
         "as multiplying by 10 000."),
        ("How many squares should I count?",
         "Four large corner squares is standard; count more if the cells are sparse."),
        ("Does this work for the Fuchs–Rosenthal chamber?",
         "Not directly — that chamber is 0.2 mm deep, so the factor is 5 000 rather than 10 000."),
    ],
    related=[("/biology/cell-counting-calculator", "Cell counting calculator"),
             ("/biology/trypan-blue-cell-viability", "Trypan blue viability"),
             ("/biology/cell-density", "Cell density")],
    svg=("chain", {"caption": "Counts per square, times dilution, times the chamber constant."}),
    icon="cell",
))

add(Spec(
    name="Trypan Blue Cell Viability Calculator",
    slug="trypan-blue-cell-viability",
    summary=("Trypan blue viability is live cells divided by live plus dead cells, as a percentage. The "
             "same count, corrected for the squares counted and the dilution, gives the live cell "
             "concentration and the live cells in a fixed volume."),
    fields=[
        num("live", "Live cells counted", 280, "cells", ""),
        num("dead", "Dead cells counted", 40, "cells", ""),
        num("squares", "Squares counted", 4, "", ""),
        num("dilution", "Dilution factor", 2, "×", "Includes the trypan blue mix"),
        num("viability", "Viability", "", "%", "", output=True),
        num("live_conc", "Live cell concentration", "", "cells/mL", "", output=True),
        num("total_live", "Live cells in 10 mL", "", "cells", "", output=True),
    ],
    dirs=[
        d("Viability", "viability", "live/(live+dead)*100"),
        d("Viability", "live_conc", "live/squares*dilution*10000"),
        d("Viability", "total_live", "live/squares*dilution*10000*10"),
    ],
    formula="Viability (%) = live ÷ (live + dead) × 100;  live cells/mL = (live ÷ squares) × dilution × 10⁴",
    symbols=[("live", "unstained, refractile cells", "cells"),
             ("dead", "blue-stained cells", "cells"),
             ("dilution", "total dilution including the dye", "×")],
    bands=[("above 95%", "Healthy", "typical of a log-phase culture"),
           ("85 – 95%", "Acceptable", "fine for most assays"),
           ("below 85%", "Poor", "check handling, medium and time since harvest")],
    notes=[
        "Count within five minutes of adding the dye: longer and live cells start taking it up.",
        "Viability by dye exclusion overestimates health — a stressed cell that still excludes dye "
        "counts as live. Pair it with growth or an ATP assay for anything critical.",
        "Report live-cell density, not total, whenever you seed a plate: dead cells do not divide.",
    ],
    mistakes=[
        "Forgetting the dye dilution in the concentration calculation.",
        "Counting too few cells, which makes the percentage jump by several points per cell.",
        "Leaving the haemocytometer to dry between samples, which concentrates the cells.",
    ],
    faq=[
        ("Why do my live cells look blue?",
         "They have been in the dye too long, or the suspension is acidic. Recount within five minutes."),
        ("Is trypan blue toxic to cells?",
         "It is excluded by intact membranes but is cytotoxic over time, so count before plating."),
    ],
    related=[("/biology/hemocytometer-cell-counter", "Hemocytometer counter"),
             ("/biology/percent-viability", "Percent viability"),
             ("/biology/cell-seeding-density", "Cell seeding density")],
    svg=("bars", {"caption": "Live and dead counts give the percentage and the density."}),
    icon="cell",
))

add(Spec(
    name="Cell Counting Calculator",
    slug="cell-counting-calculator",
    summary=("Cell counting turns a haemocytometer count, a dilution and a suspension volume into cells "
             "per mL. It also returns the total cells in the suspension and the volume to take for a "
             "target number of cells."),
    fields=[
        num("cells_counted", "Cells counted", 340, "cells", ""),
        num("squares", "Squares counted", 4, "", ""),
        num("dilution", "Dilution factor", 1, "×", ""),
        num("volume", "Suspension volume", 12, "mL", ""),
        num("target", "Cells needed", 2000000, "cells", "For the next flask or plate"),
        num("conc", "Concentration", "", "cells/mL", "", output=True),
        num("total", "Total cells available", "", "cells", "", output=True),
        num("take", "Volume to take", "", "mL", "", output=True),
        num("vessels", "Wells at 100 000 per well", "", "wells", "", output=True),
    ],
    dirs=[
        d("Counting", "conc", "cells_counted/squares*dilution*10000"),
        d("Counting", "total", "cells_counted/squares*dilution*10000*volume"),
        d("Counting", "take", "target/(cells_counted/squares*dilution*10000)"),
        d("Counting", "vessels", "cells_counted/squares*dilution*10000*volume/100000"),
    ],
    formula="Cells/mL = (count ÷ squares) × dilution × 10⁴;  volume to take = cells needed ÷ cells/mL",
    symbols=[("cells_counted", "cells counted", "cells"),
             ("squares", "large squares counted", "—"),
             ("conc", "cell density", "cells/mL"),
             ("take", "volume of suspension to pipette", "mL")],
    notes=[
        "Count twice, from two separate loadings, and average: the difference between loadings is a "
        "better error estimate than any single count.",
        "Take the volume with a pipette that is appropriate for it — 20 µL out of 12 mL carries a "
        "much larger relative error than 2 mL.",
        "If the count varies by more than 15% between loadings, the suspension is not homogeneous: "
        "triturate and start again.",
    ],
    mistakes=[
        "Using the average of counts taken from the same loading as if they were independent.",
        "Forgetting that the dilution factor applies to every downstream number.",
        "Seeding by volume rather than by cell number, which drifts as the culture grows.",
    ],
    faq=[
        ("How precise is a haemocytometer count?",
         "About 10–15% between operators when 100–200 cells are counted per square."),
        ("Should I count before or after dilution?",
         "Count after all dilutions and record the total factor; that is what the calculation needs."),
    ],
    related=[("/biology/hemocytometer-cell-counter", "Hemocytometer counter"),
             ("/biology/cell-seeding-density", "Cell seeding density"),
             ("/biology/cell-doubling-time", "Cell doubling time")],
    svg=("chain", {"caption": "Count, dilution and volume give concentration and yield."}),
    icon="cell",
))

add(Spec(
    name="Cell Density Calculator",
    slug="cell-density",
    summary=("Cell density is cells per millilitre of culture, and it decides when to split, how to "
             "seed and whether a culture is in log phase. This calculator converts counts, "
             "haemocytometer readings and OD600 values into cells/mL and cells/cm²."),
    fields=[
        num("cells_counted", "Cells counted", 300, "cells", ""),
        num("squares", "Squares counted", 4, "", ""),
        num("dilution", "Dilution factor", 1, "×", ""),
        num("area", "Growth area", 25, "cm²", "T25 = 25, T75 = 75, 6-well ≈ 9.6 per well"),
        num("density", "Cell density", "", "cells/mL", "", output=True),
        num("per_cm2", "Density per area", "", "cells/cm²", "", output=True),
        num("od", "OD600", 0.6, "", "For bacterial cultures only"),
        num("od_cells", "Cells/mL from OD600", "", "cells/mL", "", output=True),
    ],
    dirs=[
        d("Density", "density", "cells_counted/squares*dilution*10000"),
        d("Density", "per_cm2", "cells_counted/squares*dilution*10000/area"),
        d("Density", "od_cells", "od*800000000"),
    ],
    formula="Cells/mL = (count ÷ squares) × dilution × 10⁴;  for E. coli, 1 OD600 ≈ 8 × 10⁸ cells/mL",
    symbols=[("cells_counted", "cells counted", "cells"),
             ("dilution", "dilution before counting", "×"),
             ("OD600", "optical density at 600 nm", "AU")],
    bands=[("0.6 – 1.0 ×10⁶/mL", "Low", "sparse; split less or seed more"),
           ("1 – 5 ×10⁶/mL", "Log phase", "healthy adherent culture ready to passage"),
           ("above 10⁷/mL", "Confluent / stationary", "split now")],
    notes=[
        "The OD600 conversion is species-specific: 8 × 10⁸ cells/mL per OD unit is a working figure "
        "for E. coli, and yeast is roughly 3 × 10⁷.",
        "Adherent cultures are usually quoted per cm², suspension cultures per mL; the growth area "
        "box converts between them.",
        "Confluence is a visual estimate; density is the measurement. They disagree most in "
        "heterogeneous cultures.",
    ],
    mistakes=[
        "Using OD600 for eukaryotic cells, where it means almost nothing.",
        "Reading OD600 above 1.0 without diluting, where the relationship stops being linear.",
        "Quoting cells/mL for an adherent culture without the area.",
    ],
    faq=[
        ("What is a normal cell density for a T75 flask?",
         "About 1–2 × 10⁶ cells/mL at 80% confluence, or roughly 8 × 10⁴ cells/cm²."),
        ("Why is my OD600 reading not linear?",
         "Above about 1.0 the detector saturates; dilute tenfold and multiply."),
    ],
    related=[("/biology/hemocytometer-cell-counter", "Hemocytometer counter"),
             ("/biology/od600-to-cell-density", "OD600 to cell density"),
             ("/biology/cell-seeding-density", "Cell seeding density")],
    svg=("chain", {"caption": "Counts, dilution and growth area give density per mL and per cm²."}),
    icon="cell",
))

add(Spec(
    name="OD600 to Cell Density Calculator",
    slug="od600-to-cell-density",
    summary=("OD600 is the fastest way to follow a bacterial culture, but it is an optical reading, "
             "not a cell count. This calculator converts absorbance to cells/mL and to dry cell "
             "weight using the standard factors, with a dilution correction for readings above 1."),
    fields=[
        num("od", "OD600 reading", 0.45, "", ""),
        num("dilution", "Dilution before reading", 1, "×", "10 if you diluted 1:10"),
        num("factor", "Cells/mL per OD unit", 800000000, "cells/mL", "8×10⁸ for E. coli, 3×10⁷ for yeast"),
        num("dcw_factor", "Dry cell weight per OD unit", 0.4, "g/L", "About 0.4–0.5 g/L per OD for E. coli"),
        num("cells", "Cell density", "", "cells/mL", "", output=True),
        num("dcw", "Dry cell weight", "", "g/L", "", output=True),
        num("od_corrected", "Corrected OD600", "", "", "", output=True),
    ],
    dirs=[
        d("Conversion", "od_corrected", "od*dilution"),
        d("Conversion", "cells", "od*dilution*factor"),
        d("Conversion", "dcw", "od*dilution*dcw_factor"),
    ],
    formula="Cells/mL = OD600 × dilution × (cells/mL per OD unit)",
    symbols=[("OD600", "absorbance at 600 nm against a medium blank", "AU"),
             ("dilution", "how much the sample was diluted before reading", "×"),
             ("factor", "strain-specific conversion", "cells/mL per OD")],
    bands=[("0.1 – 1.0", "Linear", "the reliable range of the spectrophotometer"),
           ("1.0 – 1.5", "Edge", "dilute to be safe"),
           ("above 1.5", "Non-linear", "always dilute and correct")],
    notes=[
        "The factor depends on the strain, the medium and the instrument (path length). Calibrate it "
        "once against a haemocytometer count or a plate count for your own system.",
        "The relationship is only linear up to about 1.0; above that, dilution is mandatory rather "
        "than optional.",
        "OD600 counts dead cells as well as live ones, so it is a biomass measure, not a viability one.",
    ],
    mistakes=[
        "Reading against water rather than against fresh medium.",
        "Forgetting to multiply by the dilution factor after diluting.",
        "Using a cuvette with a different path length without correcting.",
    ],
    faq=[
        ("How many cells is OD600 = 1?",
         "About 8 × 10⁸ E. coli per mL, though this varies two-fold between strains and media."),
        ("Can I use OD600 to measure growth rate?",
         "Yes — in the linear range, ln(OD) against time gives the growth rate, which is what the "
         "growth curve calculator does."),
    ],
    related=[("/biology/bacterial-growth-curve", "Bacterial growth curve"),
             ("/biology/cell-density", "Cell density"),
             ("/biology/specific-growth-rate-from-od", "Specific growth rate from OD readings")],
    svg=("chain", {"caption": "Absorbance times dilution times the calibration factor."}),
    icon="spectrophotometer",
))

add(Spec(
    name="Cell Seeding Density Calculator",
    slug="cell-seeding-density",
    summary=("Seeding density is the number of cells per unit area or volume you start a culture "
             "with. Get it wrong and the experiment either takes a week to reach confluence or is "
             "confluent the next morning. This calculator turns a target density into the volume of "
             "suspension to pipette and the medium to add."),
    fields=[
        num("conc", "Stock concentration", 1500000, "cells/mL", "From your count"),
        num("target", "Target density", 20000, "cells/cm²", ""),
        num("area", "Growth area per vessel", 25, "cm²", "T25 = 25, T75 = 75, 6-well = 9.6"),
        num("vessels", "Number of vessels", 1, "", ""),
        num("medium", "Final volume per vessel", 5, "mL", ""),
        num("per_vessel", "Cells per vessel", "", "cells", "", output=True),
        num("volume", "Suspension to pipette per vessel", "", "mL", "", output=True),
        num("total_cells", "Cells needed in total", "", "cells", "", output=True),
        num("medium_add", "Medium to add per vessel", "", "mL", "", output=True),
    ],
    dirs=[
        d("Seeding", "per_vessel", "target*area"),
        d("Seeding", "volume", "target*area/conc"),
        d("Seeding", "total_cells", "target*area*vessels"),
        d("Seeding", "medium_add", "medium-target*area/conc"),
    ],
    formula="Cells per vessel = target density × growth area;  volume = cells per vessel ÷ stock concentration",
    symbols=[("target", "cells per cm² you want to start with", "cells/cm²"),
             ("area", "growth area of one flask or well", "cm²"),
             ("conc", "stock concentration", "cells/mL")],
    bands=[("5 000 – 20 000 /cm²", "Sparse", "cloning, single-cell work"),
           ("20 000 – 50 000 /cm²", "Standard", "routine passage of most lines"),
           ("above 50 000 /cm²", "Dense", "fast experiments, or a line that needs contact")],
    notes=[
        "Seeding density sets the time to confluence: doubling the density roughly halves it, which "
        "is often easier than changing the medium.",
        "Growth area is the number that matters for adherent cells; the flask volume is just what "
        "fits over it.",
        "For a first passage of a new line, seed two densities and keep the one that looks right on "
        "day two.",
    ],
    mistakes=[
        "Using the flask's nominal volume instead of its growth area.",
        "Forgetting that the medium added dilutes the density — you seed cells into the final volume.",
        "Seeding dead cells: always work from the live-cell count, not the total.",
    ],
    faq=[
        ("How many cells should I seed in a 6-well plate?",
         "A well is about 9.6 cm², so 20 000 cells/cm² is roughly 190 000 cells per well."),
        ("Does seeding density affect the experiment?",
         "It changes growth rate, confluency timing and sometimes differentiation, so keep it "
         "constant across arms."),
    ],
    related=[("/biology/cell-counting-calculator", "Cell counting calculator"),
             ("/biology/cell-doubling-time", "Cell doubling time"),
             ("/biology/cell-culture-vessel-reference", "Culture vessel reference")],
    svg=("chain", {"caption": "Target density × area gives cells; divide by stock concentration for the volume."}),
    icon="cell",
))

add(Spec(
    name="Cell Culture Dish / Plate / Flask Reference",
    slug="cell-culture-vessel-reference",
    summary=("Every plasticware format has a growth area, a working volume and a recommended cell "
             "number, and mixing them up is a classic source of inconsistent experiments. This "
             "reference converts between formats and tells you how much medium and how many cells a "
             "vessel takes."),
    fields=[
        sel("vessel", "Format", [("T25 flask", "25"), ("T75 flask", "75"), ("T175 flask", "175"),
                                 ("35 mm dish", "8"), ("60 mm dish", "21"), ("100 mm dish", "55"),
                                 ("6-well plate (per well)", "9.6"), ("12-well plate (per well)", "3.8"),
                                 ("24-well plate (per well)", "1.9"), ("96-well plate (per well)", "0.32")], "75"),
        num("factor", "Number of vessels", 1, "", ""),
        num("medium_per_cm2", "Medium per cm²", 0.2, "mL/cm²", "0.15–0.25 mL/cm² is the usual range"),
        num("target", "Target seeding density", 20000, "cells/cm²", ""),
        num("area", "Growth area", "", "cm²", "", output=True),
        num("medium", "Medium per vessel", "", "mL", "", output=True),
        num("cells", "Cells per vessel at that density", "", "cells", "", output=True),
        num("total_area", "Total growth area", "", "cm²", "", output=True),
    ],
    dirs=[
        d("Vessel", "area", "vessel"),
        d("Vessel", "medium", "vessel*medium_per_cm2"),
        d("Vessel", "cells", "vessel*target"),
        d("Vessel", "total_area", "vessel*factor"),
    ],
    formula="Medium (mL) ≈ 0.2 × growth area (cm²);  cells = growth area × target density",
    symbols=[("vessel", "growth area of one vessel", "cm²"),
             ("medium", "working volume", "mL"),
             ("cells", "cells to seed", "cells")],
    notes=[
        "The 0.2 mL/cm² rule keeps the depth of medium at about 2 mm, which is what most protocols "
        "assume for gas exchange and autocrine signalling.",
        "Multi-well plates are quoted per well: a 6-well plate is 9.6 cm² per well, about 58 cm² in total.",
        "Transwell and low-attachment formats have their own areas and should not be substituted.",
    ],
    mistakes=[
        "Using the plate's total area when the protocol is per well.",
        "Filling a T175 with the T25 volume (or the reverse) and calling the difference a medium effect.",
        "Forgetting that medium volume changes the drug concentration in a dose–response assay.",
    ],
    faq=[
        ("How much medium does a T75 flask need?",
         "About 15 mL at the usual 0.2 mL/cm², with a range of 10–20 mL depending on the protocol."),
        ("How many cells in a confluent T75?",
         "Roughly 7–8 million for most adherent lines, which is about 10⁵ cells/cm²."),
    ],
    related=[("/biology/cell-seeding-density", "Cell seeding density"),
             ("/biology/cell-density", "Cell density")],
    svg=("bars", {"caption": "Growth area, medium and cells for the format you picked."}),
    icon="plate",
))

add(Spec(
    name="Cell Density Unit Converter",
    slug="cell-density-unit-converter",
    summary=("Cell counts get written as cells/mL, cells/µL, ×10⁶/mL or ×10⁵/mL depending on the lab, "
             "and a factor of a thousand between them is easy to lose. This converter moves between "
             "all of them, and to and from a haemocytometer count."),
    fields=[
        num("value", "Cell concentration", 1.5, "×10⁶/mL", ""),
        num("per_ml", "Cells per mL", "", "cells/mL", "", output=True),
        num("per_ul", "Cells per µL", "", "cells/µL", "", output=True),
        num("million", "Millions per mL", "", "×10⁶/mL", "", output=True),
        num("per_l", "Cells per litre", "", "cells/L", "", output=True),
        num("log_value", "log₁₀(cells/mL)", "", "", "", output=True),
    ],
    dirs=[
        d("Conversion", "per_ml", "value*1000000"),
        d("Conversion", "per_ul", "value*1000"),
        d("Conversion", "million", "value"),
        d("Conversion", "per_l", "value*1000000000"),
        d("Conversion", "log_value", "log10(value*1000000)"),
    ],
    formula="1 ×10⁶ cells/mL = 1 000 000 cells/mL = 1 000 cells/µL",
    symbols=[("cells/mL", "the base unit", "cells/mL"),
             ("cells/µL", "a thousandth of cells/mL", "cells/µL"),
             ("×10⁶/mL", "millions per mL", "10⁶ cells/mL")],
    notes=[
        "A log₁₀ value is how cell densities are plotted in growth curves, because it turns "
        "exponential growth into a straight line.",
        "The ×10⁶/mL convention is common in haematology and in cell culture; the underlying unit "
        "is still cells per millilitre.",
        "Mixing cells/µL and cells/mL between a count and a protocol is the most common unit error "
        "in the lab.",
    ],
    mistakes=[
        "Reading 1.5 as 1.5 × 10⁵ rather than 1.5 × 10⁶.",
        "Converting a bacterial count (10⁸ scale) with the same factor as a mammalian one (10⁶ scale).",
    ],
    faq=[
        ("How many cells/µL is 1 × 10⁶ cells/mL?",
         "Exactly 1 000 cells/µL."),
    ],
    related=[("/biology/cell-density", "Cell density"),
             ("/biology/hemocytometer-cell-counter", "Hemocytometer counter")],
    svg=("chain", {"caption": "One concentration, every unit."}),
    icon="cell",
))

add(Spec(
    name="AlamarBlue Cell Viability / Percent Reduction Calculator",
    slug="alamarblue-cell-viability",
    summary=("AlamarBlue (resazurin) is reduced by living cells to resorufin, which is fluorescent "
             "and pink. Viability is the reduction relative to a control, corrected for the "
             "background of medium alone. This calculator does that three-point correction."),
    fields=[
        num("sample", "Sample fluorescence", 32000, "RFU", "Treated wells"),
        num("control", "Control fluorescence", 48000, "RFU", "Untreated wells"),
        num("blank", "Medium-only blank", 2500, "RFU", "No cells"),
        num("reduction", "Percent reduction", "", "%", "", output=True),
        num("viability", "Viability relative to control", "", "%", "", output=True),
        num("ic", "Cytotoxicity", "", "%", "", output=True),
    ],
    dirs=[
        d("Viability", "reduction", "(sample-blank)/(control-blank)*100"),
        d("Viability", "viability", "(sample-blank)/(control-blank)*100"),
        d("Viability", "ic", "100-(sample-blank)/(control-blank)*100"),
    ],
    formula="Viability (%) = (sample − blank) ÷ (control − blank) × 100",
    symbols=[("sample", "fluorescence of treated wells", "RFU"),
             ("control", "fluorescence of untreated wells", "RFU"),
             ("blank", "medium plus reagent, no cells", "RFU")],
    bands=[("above 90%", "Non-cytotoxic", "within normal variation"),
           ("70 – 90%", "Mild", "watch for dose-dependent effects"),
           ("below 70%", "Cytotoxic", "the usual threshold in ISO 10993 testing")],
    notes=[
        "AlamarBlue measures metabolic activity, not cell number. A cytostatic compound lowers the "
        "signal without killing anything.",
        "The blank matters: resazurin is partly reduced by medium components, and an uncorrected "
        "blank inflates weak signals.",
        "Incubation time should be identical for all wells; reduction is enzymatic and keeps going.",
    ],
    mistakes=[
        "Reading in the wrong channel — resorufin fluoresces at 590 nm with excitation around 560 nm.",
        "Comparing plates incubated for different times.",
        "Leaving the reagent in the wells during imaging, where it bleaches.",
    ],
    sources=["AlamarBlue/resazurin reduction chemistry; 70% viability threshold from ISO 10993-5."],
    faq=[
        ("What is percent reduction?",
         "The share of the dye that the cells have reduced, corrected for the medium-only blank — "
         "the same number as viability when the control is fully viable."),
        ("Can I use absorbance instead of fluorescence?",
         "Yes, at 570 nm against a 600 nm reference; the calculation is identical."),
    ],
    related=[("/biology/percent-viability", "Percent viability"),
             ("/biology/trypan-blue-cell-viability", "Trypan blue viability"),
             ("/biology/percent-inhibition", "Percent inhibition")],
    svg=("bars", {"caption": "Sample, control and blank, and the reduction between them."}),
    icon="plate",
))

add(Spec(
    name="Percent Viability Calculator",
    slug="percent-viability",
    summary=("Percent viability is live cells as a share of all cells, and there are three ways to "
             "measure it: dye exclusion, metabolic reduction and membrane integrity. This calculator "
             "handles the live/dead form and the control-relative form, and reports the cytotoxicity "
             "that goes with it."),
    fields=[
        num("live", "Live cells", 920, "cells", ""),
        num("dead", "Dead cells", 80, "cells", ""),
        num("viability", "Viability", "", "%", "", output=True),
        num("dead_pct", "Non-viable", "", "%", "", output=True),
        num("ratio", "Live to dead ratio", "", ":1", "", output=True),
    ],
    dirs=[
        d("Viability", "viability", "live/(live+dead)*100"),
        d("Viability", "dead_pct", "dead/(live+dead)*100"),
        d("Viability", "ratio", "live/dead"),
    ],
    formula="Viability (%) = live ÷ (live + dead) × 100",
    symbols=[("live", "cells excluding the dye or reducing the substrate", "cells"),
             ("dead", "cells taking up the dye", "cells"),
             ("viability", "live share of the population", "%")],
    bands=[("95 – 100%", "Healthy", "normal for a fresh culture"),
           ("80 – 95%", "Reduced", "harvest stress or a mild treatment"),
           ("below 80%", "Low", "check conditions before the experiment")],
    notes=[
        "A viability of 50% can mean 50% of the cells are dead, or that every cell is half as "
        "metabolically active — the two methods answer different questions.",
        "Always quote the method: trypan blue, PI/FACS and ATP assays give different numbers on the "
        "same population.",
        "For cytotoxicity reporting, the complement of viability assumes the untreated control was "
        "100% viable, which is rarely exactly true.",
    ],
    mistakes=[
        "Counting fewer than 100 cells, where a single cell is a whole percentage point.",
        "Using total cells (live + dead) as the denominator in one place and live cells in another.",
    ],
    faq=[
        ("What viability is acceptable for an experiment?",
         "90% or better at the start of most assays; treatments that drop it below 70% usually "
         "confound the readout with cytotoxicity."),
    ],
    related=[("/biology/trypan-blue-cell-viability", "Trypan blue viability"),
             ("/biology/alamarblue-cell-viability", "AlamarBlue viability"),
             ("/biology/percent-inhibition", "Percent inhibition")],
    svg=("bars", {"caption": "Live and dead cells as a share of the population."}),
    icon="cell",
))

add(Spec(
    name="Mitotic Index Calculator",
    slug="mitotic-index",
    summary=("The mitotic index is the percentage of cells caught in mitosis on a slide, the classic "
             "measure of proliferation in plant roots, tumour tissue and any treated culture. This "
             "calculator returns the index, the phase breakdown and the total counted."),
    fields=[
        num("total", "Total cells counted", 1200, "cells", ""),
        num("mitotic", "Cells in mitosis", 96, "cells", "Prophase to telophase"),
        num("prophase", "Prophase", 40, "cells", "Optional phase breakdown"),
        num("metaphase", "Metaphase", 28, "cells", ""),
        num("anaphase", "Anaphase", 18, "cells", ""),
        num("telophase", "Telophase", 10, "cells", ""),
        num("index", "Mitotic index", "", "%", "", output=True),
        num("per_1000", "Mitotic cells per 1000", "", "", "", output=True),
        num("phase_check", "Phases add up to", "", "cells", "", output=True),
    ],
    dirs=[
        d("Index", "index", "mitotic/total*100"),
        d("Index", "per_1000", "mitotic/total*1000"),
        d("Index", "phase_check", "prophase+metaphase+anaphase+telophase"),
    ],
    formula="Mitotic index (%) = mitotic cells ÷ total cells × 100",
    symbols=[("mitotic", "cells showing condensed chromosomes", "cells"),
             ("total", "all cells counted in the field", "cells"),
             ("index", "share of cells in mitosis", "%")],
    bands=[("0 – 2%", "Low", "quiescent tissue or an inhibited treatment"),
           ("2 – 6%", "Normal", "typical of healthy root meristems"),
           ("above 6%", "High", "rapidly dividing tissue, or a block in mitosis")],
    notes=[
        "The index depends on how long mitosis lasts as well as on how often it starts: a drug that "
        "arrests cells in metaphase raises the index without raising proliferation.",
        "Count at least 1000 cells, ideally from several fields, and score blind to the treatment.",
        "Colchicine or similar spindle poisons are used to accumulate metaphases; say whether you used one.",
    ],
    mistakes=[
        "Counting only fields with obvious mitoses, which inflates the index.",
        "Confusing apoptotic bodies with mitotic figures.",
        "Counting cells that overlap, which makes the denominator unreliable.",
    ],
    faq=[
        ("What is a normal mitotic index?",
         "About 2–6% in plant root tips and lower in most adult animal tissues."),
        ("Why is my mitotic index so high after treatment?",
         "Spindle poisons and DNA damage can arrest cells in mitosis, so the index rises even as "
         "proliferation falls."),
    ],
    related=[("/biology/cell-doubling-time", "Cell doubling time"),
             ("/biology/percent-viability", "Percent viability"),
             ("/biology/microscope-magnification", "Microscope magnification")],
    svg=("bars", {"caption": "Mitotic phases as a share of the cells counted."}),
    icon="microscope",
))

add(Spec(
    name="Fold Change Calculator",
    slug="fold-change",
    summary=("Fold change compares a treated value with a control: 2 means doubled, 0.5 means halved. "
             "This calculator handles the direction properly, works with averages and replicates, and "
             "warns when the two conventions (treated/control versus control/treated) give different "
             "answers."),
    fields=[
        num("treated", "Treated value", 240, "", ""),
        num("control", "Control value", 100, "", ""),
        num("fold", "Fold change", "", "×", "", output=True),
        num("log2fc", "log₂ fold change", "", "", "", output=True),
        num("pct", "Percent change", "", "%", "", output=True),
        num("inverse", "Reciprocal fold change", "", "×", "", output=True),
    ],
    dirs=[
        d("Fold change", "fold", "treated/control"),
        d("Fold change", "log2fc", "log2(treated/control)"),
        d("Fold change", "pct", "(treated/control-1)*100"),
        d("Fold change", "inverse", "control/treated"),
    ],
    formula="Fold change = treated ÷ control;  log₂ fold change = log₂(treated/control)",
    symbols=[("treated", "mean of the treated group", "any"),
             ("control", "mean of the control group", "any"),
             ("log₂ FC", "symmetric measure: 1 is up twofold, −1 is down twofold", "—")],
    bands=[("2 and above", "Upregulated", "at least doubled"),
           ("0.5 – 2", "Unchanged", "within the usual biological noise"),
           ("0.5 and below", "Downregulated", "at least halved")],
    notes=[
        "Fold change on a linear scale is asymmetric: up twofold is 2, down twofold is 0.5. log₂ "
        "makes the two symmetric, which is why it is used in expression analysis.",
        "A fold change without a measure of variance is nearly meaningless — a 3× change from n=2 "
        "can be noise.",
        "With qPCR, fold change is usually computed as 2^−ΔΔCt, which is the same thing expressed "
        "through cycle thresholds.",
    ],
    mistakes=[
        "Comparing a treated sample with a different baseline than the one the graph uses.",
        "Averaging fold changes across replicates instead of computing them from the means, or the reverse.",
        "Going from a negative control value close to zero, where small absolute differences become "
        "enormous ratios.",
    ],
    faq=[
        ("Is a 2-fold change significant?",
         "Not by itself. Significance needs the variance of the replicates; fold change is an effect size."),
        ("Why do some papers report log₂ fold change?",
         "Because it is symmetric and averages sensibly across genes and conditions."),
    ],
    related=[("/biology/percent-inhibition", "Percent inhibition"),
             ("/biology/cfu-ml-calculator", "CFU/mL"), ],
    svg=("bars", {"caption": "Control and treated, and the ratio between them."}),
    icon="chart",
))

add(Spec(
    name="CFU/mL Calculator",
    slug="cfu-ml-calculator",
    summary=("A CFU/mL count comes from one plate: clumps form a single colony, so the count is "
             "colony-forming units, not cells. This calculator converts a colony count and a plating "
             "volume into CFU/mL, choosing the countable dilution and applying the volume factor "
             "correctly."),
    fields=[
        num("colonies", "Colonies counted", 148, "CFU", "Countable range is 30–300"),
        num("volume", "Volume plated", 0.1, "mL", "0.1 mL for a spread plate"),
        num("dilution", "Dilution factor of the plated sample", 1000000, "×", "10⁶ for a 10⁻⁶ dilution"),
        num("cfu_ml", "CFU per mL", "", "CFU/mL", "", output=True),
        num("cfu_log", "log₁₀(CFU/mL)", "", "", "", output=True),
        num("cfu_100", "CFU per 100 mL", "", "CFU/100 mL", "", output=True),
    ],
    dirs=[
        d("Count", "cfu_ml", "colonies/volume*dilution"),
        d("Count", "cfu_log", "log10(colonies/volume*dilution)"),
        d("Count", "cfu_100", "colonies/volume*dilution*100"),
        d("Count", "dilution", "cfu_ml*volume/colonies"),
    ],
    formula="CFU/mL = colonies ÷ volume plated (mL) × dilution factor",
    symbols=[("colonies", "colonies on the countable plate", "CFU"),
             ("volume", "volume of diluted sample plated", "mL"),
             ("dilution", "the reciprocal of the dilution", "×")],
    bands=[("30 – 300 colonies", "Countable", "statistically reliable window"),
           ("below 30", "Too few", "the counting error exceeds 10%"),
           ("above 300", "Too many", "crowding merges colonies")],
    notes=[
        "CFU undercounts cells: a pair of attached cells forms one colony, so the result is a lower "
        "bound on cell number.",
        "Plate at least two dilutions: you cannot know in advance which one will land in 30–300.",
        "For drinking water, results are usually reported per 100 mL; the calculator gives that too.",
    ],
    mistakes=[
        "Forgetting the plating volume, which changes the answer by a factor of ten.",
        "Using a dilution factor of 10⁻⁶ instead of 10⁶.",
        "Counting a plate with 500 colonies and reporting it as precise.",
    ],
    faq=[
        ("Why CFU and not cells?",
         "Because the method counts colonies, and two cells that stick together produce one colony."),
        ("What if my plates have 20 and 280 colonies?",
         "Use the 280 plate and quote it as within range; average both only if they give the same "
         "CFU/mL estimate."),
    ],
    related=[("/biology/cfu-g-calculator", "CFU/g"),
             ("/biology/bacterial-concentration-calculator", "Bacterial concentration"),
             ("/biology/serial-dilution-planner", "Serial dilution planner")],
    svg=("chain", {"caption": "Colonies, volume and dilution give CFU/mL."}),
    icon="petri",
))

add(Spec(
    name="CFU/g Calculator",
    slug="cfu-g-calculator",
    summary=("Food, soil and tissue microbiology counts per gram, not per millilitre, and getting from "
             "a plate count to CFU/g needs the dilution and the wet weight. This calculator does it, "
             "and converts to log CFU/g, the scale used in food safety limits."),
    fields=[
        num("colonies", "Colonies counted", 126, "CFU", ""),
        num("volume", "Volume plated", 0.1, "mL", ""),
        num("dilution", "Dilution factor", 10000, "×", "10⁴ for a 1 g in 9 mL then 10⁻³ series"),
        num("weight", "Sample weight", 1, "g", "Weight that went into the first dilution"),
        num("cfu_g", "CFU per gram", "", "CFU/g", "", output=True),
        num("cfu_log", "log₁₀(CFU/g)", "", "", "", output=True),
        num("per_kg", "CFU per kg", "", "CFU/kg", "", output=True),
    ],
    dirs=[
        d("Count", "cfu_g", "colonies/volume*dilution/weight"),
        d("Count", "cfu_log", "log10(colonies/volume*dilution/weight)"),
        d("Count", "per_kg", "colonies/volume*dilution/weight*1000"),
    ],
    formula="CFU/g = colonies ÷ volume plated × dilution factor ÷ sample weight",
    symbols=[("colonies", "colonies on the countable plate", "CFU"),
             ("volume", "volume plated", "mL"),
             ("dilution", "total dilution", "×"),
             ("weight", "mass of sample in the first dilution", "g")],
    bands=[("below 4 log CFU/g", "Low", "below most spoilage thresholds"),
           ("4 – 6 log", "Moderate", "typical of raw foods"),
           ("above 6 log", "High", "spoilage or a process failure")],
    notes=[
        "Log CFU/g is the industry language: 6 log CFU/g is a million per gram.",
        "If the sample was frozen or dried, report whether the weight was taken before or after.",
        "Homogenisation must be included in the first dilution volume, not after it.",
    ],
    mistakes=[
        "Dividing by the weight twice.",
        "Treating a 25 g sample in 225 mL as a dilution factor of 225 instead of 10.",
        "Reporting CFU/mL from a solid sample without stating the weight used.",
    ],
    faq=[
        ("How do I convert CFU/g to log CFU/g?",
         "Take the base-10 logarithm: 1 × 10⁶ CFU/g is 6 log CFU/g."),
        ("Does this work for swabs?",
         "Use CFU per swab or per cm² instead; a swab has no meaningful gram weight."),
    ],
    related=[("/biology/cfu-ml-calculator", "CFU/mL"),
             ("/biology/serial-dilution-planner", "Serial dilution planner")],
    svg=("chain", {"caption": "Plate count, dilution and sample weight give CFU/g."}),
    icon="petri",
))

add(Spec(
    name="Bacterial Concentration Calculator",
    slug="bacterial-concentration-calculator",
    summary=("Bacterial concentration can come from a plate count, an OD reading or a dilution series, "
             "and the three disagree. This calculator converts between them and reports the "
             "concentration in cells/mL, CFU/mL and log units, with the doubling time it implies."),
    fields=[
        num("cfu_ml", "CFU per mL", 5000000, "CFU/mL", "From a plate count"),
        num("od", "OD600", 0.6, "", "Optional cross-check"),
        num("factor", "Cells per mL per OD unit", 8e8, "cells/mL", ""),
        num("cells", "Cells per mL (from OD)", "", "cells/mL", "", output=True),
        num("log_cfu", "log₁₀ CFU/mL", "", "", "", output=True),
        num("ratio", "Cells per CFU", "", "", "", output=True),
    ],
    dirs=[
        d("Concentration", "cells", "od*factor"),
        d("Concentration", "log_cfu", "log10(cfu_ml)"),
        d("Concentration", "ratio", "od*factor/cfu_ml"),
    ],
    formula="Cells/mL ≈ OD600 × (cells/mL per OD unit);  log₁₀ CFU/mL = log₁₀(CFU/mL)",
    symbols=[("CFU/mL", "colony-forming units from a plate", "CFU/mL"),
             ("OD600", "absorbance of the culture", "AU"),
             ("ratio", "how many cells make up one colony — the clumping factor", "—")],
    notes=[
        "Cells per CFU is usually 1–3 for well-dispersed cultures and much higher for clumping "
        "strains; it is the size of the gap between the two methods.",
        "Both methods count dead cells differently: OD600 counts everything, plating counts only "
        "what can grow.",
        "For a standard curve, calibrate OD against CFU for your own strain, medium and "
        "spectrophotometer once, and reuse the factor.",
    ],
    mistakes=[
        "Comparing OD-derived cell counts with CFU directly and reporting a discrepancy as a result.",
        "Using the E. coli factor for a Gram-positive organism.",
    ],
    faq=[
        ("Which number should I report?",
         "Both, with the method: OD-based cells/mL for mass, CFU/mL for viable count."),
        ("Why do they differ by a factor of two?",
         "Clumping, dead cells and chains of cells. For streptococci the gap can be tenfold."),
    ],
    related=[("/biology/cfu-ml-calculator", "CFU/mL"),
             ("/biology/od600-to-cell-density", "OD600 to cell density"),
             ("/biology/bacterial-growth-curve", "Bacterial growth curve")],
    svg=("bars", {"caption": "Plate count against the OD estimate, side by side."}),
    icon="bacteria",
))

add(Spec(
    name="Transformation Efficiency Calculator",
    slug="transformation-efficiency",
    summary=("Transformation efficiency is the number of transformants per microgram of plasmid — the "
             "number that tells you whether your competent cells are any good. This calculator "
             "computes it from colonies, plated volume and plasmid mass, and flags the values that "
             "mean something went wrong."),
    fields=[
        num("colonies", "Colonies on the plate", 320, "CFU", ""),
        num("volume_plated", "Volume plated", 0.1, "mL", ""),
        num("recovery", "Recovery volume", 1, "mL", "SOC or LB used to resuspend"),
        num("dna", "Plasmid DNA transformed", 10, "ng", ""),
        num("dilution", "Dilution plated", 1, "×", "10 if you plated 1/10 of the recovery"),
        num("efficiency", "Transformation efficiency", "", "CFU/µg", "", output=True),
        num("total_colonies", "Total transformants", "", "CFU", "", output=True),
        num("per_ng", "Transformants per ng", "", "CFU/ng", "", output=True),
    ],
    dirs=[
        d("Efficiency", "efficiency", "colonies/(volume_plated/recovery)/dna*1000*dilution"),
        d("Efficiency", "total_colonies", "colonies/(volume_plated/recovery)*dilution"),
        d("Efficiency", "per_ng", "colonies/(volume_plated/recovery)/dna*dilution"),
    ],
    formula="Efficiency (CFU/µg) = colonies × (recovery volume ÷ plated volume) × dilution ÷ µg DNA",
    symbols=[("colonies", "colonies on the countable plate", "CFU"),
             ("recovery", "volume the cells were resuspended in", "mL"),
             ("volume plated", "fraction of the recovery that was plated", "mL"),
             ("dna", "mass of plasmid added", "ng")],
    bands=[("above 1 × 10⁸", "Excellent", "chemically competent commercial-grade cells"),
           ("1 × 10⁷ – 1 × 10⁸", "Good", "fine for cloning and library work"),
           ("1 × 10⁶ – 1 × 10⁷", "Adequate", "check heat shock, antibiotics and DNA quality"),
           ("below 1 × 10⁶", "Poor", "usually competent-cell preparation or a salt problem")],
    notes=[
        "Efficiency drops sharply with plasmid size: a 10 kb construct transforms several times less "
        "well than a 3 kb one, and that is not a competent-cell problem.",
        "Plate a range of volumes (10 µL and 100 µL of the recovery) so at least one plate is countable.",
        "The antibiotic must be at the right concentration and the plates fresh; old ampicillin "
        "plates give satellite colonies that look like transformants.",
    ],
    mistakes=[
        "Using the plated volume as if it were the whole recovery.",
        "Reporting CFU/µg using the mass of DNA in the ligation rather than the plasmid transformed.",
        "Reading efficiency from a plate with 2000 colonies, where the count is meaningless.",
    ],
    faq=[
        ("What is a good transformation efficiency?",
         "10⁸ CFU/µg or better for chemically competent cells; 10⁹–10¹⁰ for electroporation."),
        ("Why is my efficiency low for a ligation?",
         "Ligations contain nicked and linear DNA; efficiency is quoted for supercoiled plasmid."),
    ],
    related=[("/biology/plasmid-copy-number", "Plasmid copy number"),
             ("/biology/cfu-ml-calculator", "CFU/mL"),
             ("/biology/transformation-efficiency", "Transformation efficiency")],
    svg=("chain", {"caption": "Colonies scaled to the whole recovery, divided by the DNA mass."}),
    icon="bacteria",
))
