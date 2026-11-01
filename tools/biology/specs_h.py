"""Batch H — bioprocess, environmental engineering, lab conversions and aquaculture."""

from lib import Spec, num, sel, d

SPECS: list[Spec] = []


def add(s: Spec) -> None:
    SPECS.append(s)


# ------------------------------------------------------- 1. feed conversion ratio
add(Spec(
    name="Feed Conversion Ratio Calculator",
    slug="feed-conversion-ratio",
    summary=("Feed conversion ratio is the kilograms of feed it takes to add one kilogram of gain. This "
             "calculator returns FCR, its inverse (feed efficiency), the feed cost per kilogram of gain "
             "and the improvement from a target FCR."),
    fields=[
        num("feed", "Feed offered", 1200, "kg", "Total over the period"),
        num("start", "Starting weight", 30, "kg", ""),
        num("end", "Finishing weight", 105, "kg", ""),
        num("deaths", "Animals lost", 0, "head", "Their feed was still consumed"),
        num("price", "Feed price", 0.42, "per kg", ""),
        num("target", "Target FCR", 2.6, "", "What a good herd achieves"),
        num("fcr", "Feed conversion ratio", "", "kg/kg", "", output=True),
        num("efficiency", "Feed efficiency (gain per kg feed)", "", "kg/kg", "", output=True),
        num("total_gain", "Total liveweight gain", "", "kg", "", output=True),
        num("cost", "Feed cost per kg of gain", "", "per kg", "", output=True),
        num("feed_per_head", "Feed per surviving animal", "", "kg", "", output=True),
        num("target_feed", "Feed the target FCR would need", "", "kg", "", output=True),
    ],
    dirs=[
        d("Conversion", "total_gain", "max(0,end-start)"),
        d("Conversion", "fcr", "feed/max(0.0001,end-start)"),
        d("Conversion", "efficiency", "max(0,end-start)/max(0.0001,feed)"),
        d("Conversion", "cost", "price*feed/max(0.0001,end-start)"),
        d("Conversion", "feed_per_head", "feed/max(1,100-deaths)*100"),
        d("Conversion", "target_feed", "max(0,end-start)*target"),
    ],
    formula="FCR = feed consumed ÷ liveweight gain;  feed efficiency = gain ÷ feed = 1 ÷ FCR",
    symbols=[("feed", "dry or as-fed feed consumed", "kg"),
             ("gain", "weight gained over the same period", "kg"),
             ("FCR", "feed conversion ratio", "kg/kg")],
    bands=[("below 1.8", "Excellent", "modern broilers and well-run pig units"),
           ("1.8 – 2.5", "Good", "typical efficient pig finishing"),
           ("2.5 – 4.0", "Average", "beef feedlot, older genetics"),
           ("above 4.0", "Poor", "check feed wastage, health and weighing accuracy")],
    notes=[
        "Always compare FCR over the same weight range. A pig from 30 to 105 kg converts far "
        "better than the same pig from 8 to 30 kg, because maintenance is spread over more gain.",
        "Feed efficiency is the same information upside down: an FCR of 2.5 is an efficiency of "
        "0.40 kg of gain per kg of feed.",
        "Deaths do not change FCR as calculated on surviving animals unless you divide by the "
        "weight gain of the animals actually placed, which is what makes the figure honest.",
        "Report whether the feed weight is as-fed or dry matter. Silage at 35% dry matter looks "
        "like a wonderful FCR until you realise most of the weight was water.",
    ],
    mistakes=[
        "Recording feed delivered to the bunk instead of feed consumed — spillage and refusals "
        "inflate the number.",
        "Weighing animals once, at the end, after a different interval for each pen.",
        "Comparing FCR across species: poultry, pigs and cattle live on completely different scales.",
    ],
    sources=["Feed conversion ratio is the standard performance measure in livestock recording "
             "schemes; values quoted here follow typical commercial breed benchmarks."],
    faq=[
        ("What is a good feed conversion ratio for broilers?",
         "Around 1.5–1.7 kg of feed per kg of liveweight for modern broiler strains over a 42-day "
         "cycle."),
        ("Why does my FCR get worse as animals get heavier?",
         "Maintenance requirements scale with body weight while gain does not, so the marginal cost "
         "of each extra kilogram rises."),
        ("Does adding water to feed change FCR?",
         "It changes as-fed FCR but not dry-matter FCR, which is why dry-matter figures are the "
         "only ones that compare across farms."),
    ],
    related=[("/biology/dry-matter-intake", "Dry matter intake"),
             ("/biology/pig-weight", "Pig weight from measurements"),
             ("/biology/chicken-feed-amount", "Chicken feed amount")],
    svg=("chain", {"caption": "Feed in, gain out: the ratio is the whole story of feed cost."}),
    icon="wheat",
))

# --------------------------------------------------------- 2. hunting tooth ratio
add(Spec(
    name="Hunting Tooth Ratio Calculator",
    slug="hunting-tooth-ratio",
    summary=("The hunting tooth ratio compares the number of teeth on the driving gear with the "
             "number on the driven gear, and it predicts how often the same pair of teeth meets. "
             "In biology the same arithmetic explains carnassial wear and the molar wear gradients "
             "used to age mammals."),
    fields=[
        num("driver", "Teeth on the driver (or upper molar)", 21, "", ""),
        num("driven", "Teeth on the driven (or lower molar)", 34, "", ""),
        num("revolutions", "Driver revolutions observed", 100, "", ""),
        num("ratio", "Gear ratio", "", ":1", "", output=True),
        num("hunting", "Hunting tooth number", "", "revolutions", "", output=True),
        num("hunting_pct", "Share of one wear cycle per revolution", "", "%", "", output=True),
    ],
    dirs=[
        d("Ratio", "ratio", "driven/driver"),
        d("Ratio", "hunting", "driver*driven/gcd(driver,driven)"),
        d("Ratio", "hunting_pct",
          "revolutions/(driver*driven/gcd(driver,driven))*100"),
    ],
    formula=("Hunting tooth = (T₁ × T₂) ÷ gcd(T₁, T₂);  the same tooth pair meets again after that "
             "many revolutions of the driver"),
    symbols=[("T₁", "teeth on the driver", "teeth"),
             ("T₂", "teeth on the driven", "teeth"),
             ("gcd", "greatest common divisor of the two counts", "—")],
    bands=[("hunting tooth = T₁ × T₂", "Coprime counts", "every tooth meets every other tooth"),
           ("hunting tooth = T₁", "Driven is a multiple of driver", "the same few pairs do all the work"),
           ("between", "Partially hunting", "wear is spread over part of the gear")],
    notes=[
        "Gear designers choose tooth counts with a large common multiple so wear is distributed; "
        "cheap gearboxes fail early precisely because this was ignored.",
        "In zoology the ratio describes how the upper and lower cheek teeth occlude: matching counts "
        "produce grooves that repeat in the same place and wear faster.",
        "Ungulates with a large hunting tooth number keep a longer grinding surface, which is one "
        "explanation for the many teeth in horse and elephant dentitions.",
    ],
    mistakes=[
        "Using the ratio of radii instead of the tooth counts — teeth must mesh one to one.",
        "Forgetting that a 1:1 gear has the minimum possible hunting tooth, so it wears fastest.",
    ],
    sources=["The hunting tooth principle is classical gear design; its application to mammalian "
             "dentition comes from comparative anatomy of occlusal wear."],
    faq=[
        ("Why is a prime number of teeth useful?",
         "A prime count cannot share a factor with the mating gear, so every tooth meets every "
         "other tooth and wear spreads over the whole surface."),
        ("What is the hunting tooth for 21 and 34 teeth?",
         "gcd(21, 34) = 1, so the hunting tooth is 21 × 34 = 714 driver revolutions."),
    ],
    related=[("/biology/medullary-index", "Medullary index"),
             ("/biology/cephalic-index", "Cephalic index"),
             ("/math/gcd", "Greatest common divisor")],
    svg=("grid", {"caption": "Twenty-one teeth against thirty-four: every pair eventually meets.",
                  "cells": [["Driver", "21", "prime?"], ["Driven", "34", "2 x 17"],
                            ["Hunting tooth", "714", "revolutions"]]}),
    icon="gear",
))

# ------------------------------------------------------------ 3. PCR cycle time
add(Spec(
    name="PCR Cycle Calculator",
    slug="pcr-cycle-calculator",
    summary=("A PCR run is a few dozen repeats of three steps, and the total time on the machine is "
             "simply the sum of those steps plus the ramp between them. This calculator turns your "
             "protocol into the time per cycle, the time to the answer and the number of copies "
             "produced."),
    fields=[
        num("denature_t", "Denaturation time", 30, "s", ""),
        num("anneal_t", "Annealing time", 30, "s", ""),
        num("extend_t", "Extension time", 45, "s", ""),
        num("cycles", "Cycles", 35, "", ""),
        num("ramp", "Ramp time between steps", 4, "s", "Per transition"),
        num("copies", "Starting copies", 1000, "", ""),
        num("efficiency", "Amplification efficiency", 95, "%", "100% doubles every cycle"),
        num("cycle_time", "Time per cycle", "", "s", "", output=True),
        num("total_time", "Total run time", "", "min", "", output=True),
        num("final_copies", "Copies at the end", "", "", "", output=True),
        num("fold", "Fold amplification", "", "x", "", output=True),
    ],
    dirs=[
        d("Run", "cycle_time", "denature_t+anneal_t+extend_t+3*ramp"),
        d("Run", "total_time", "(denature_t+anneal_t+extend_t+3*ramp)*cycles/60"),
        d("Run", "fold", "pow(1+efficiency/100,cycles)"),
        d("Run", "final_copies", "copies*pow(1+efficiency/100,cycles)"),
    ],
    formula=("Time per cycle = t_denature + t_anneal + t_extend + 3 × ramp;  "
             "copies = N₀ × (1 + E)^cycles"),
    symbols=[("E", "efficiency per cycle (1.0 = perfect doubling)", "—"),
             ("N₀", "template copies at the start", "copies"),
             ("t", "time for each step", "s")],
    bands=[("90 – 100%", "Efficient", "clean primers, good template quality"),
           ("80 – 90%", "Workable", "some loss per cycle; enough product in 35 cycles"),
           ("below 80%", "Poor", "inhibitors, primer dimers or wrong annealing temperature")],
    notes=[
        "Ramp time is not small: a three-step protocol ramps six times per cycle, and on a slow "
        "block that can add half a minute to every cycle.",
        "Two-step protocols drop the separate extension step because the polymerase works at the "
        "annealing temperature, which is why fast protocols are so much shorter.",
        "Efficiency above 100% in real data almost always means the baseline was set badly, not "
        "that the reaction invented copies.",
    ],
    mistakes=[
        "Forgetting the initial hot start and the final extension when quoting a run time.",
        "Cutting extension time below about 30 s per kilobase for a long product.",
        "Adding cycles instead of fixing a low efficiency — beyond about 40 cycles the plateau "
        "gives artefacts, not more product.",
    ],
    faq=[
        ("How long does a 35-cycle PCR take?",
         "With 30 s denaturation, 30 s annealing, 45 s extension and 4 s ramps, about 70 minutes."),
        ("How many copies after 30 cycles?",
         "At 95% efficiency the target is multiplied by roughly 1.95³⁰ ≈ 5 × 10⁸."),
    ],
    related=[("/biology/pcr-annealing-temperature", "PCR annealing temperature"),
             ("/biology/pcr-master-mix-calculator", "PCR master mix"),
             ("/biology/oligo-tm-calculator", "Oligo Tm")],
    svg=("chain", {"caption": "Denature, anneal, extend — repeated until the product dominates."}),
    icon="flask",
))

# ------------------------------------------------ 4. specific productivity (qP)
add(Spec(
    name="Specific Productivity Calculator (qP)",
    slug="specific-productivity-qp",
    summary=("Specific productivity is the amount of product one cell makes per day, which is the "
             "only fair way to compare cell lines, media and processes of different sizes. This "
             "calculator derives qP from titre, cell density and culture time, then projects the "
             "titre a longer run would give."),
    fields=[
        num("titre", "Product titre", 2.5, "g/L", ""),
        num("vcd", "Viable cell density", 12, "10⁶/mL", "Time-weighted average, not the peak"),
        num("days", "Production phase", 10, "days", ""),
        num("volume", "Working volume", 2000, "L", ""),
        num("target", "Target titre", 4.0, "g/L", ""),
        num("qp", "Specific productivity", "", "pg/cell/d", "", output=True),
        num("total", "Total product per batch", "", "g", "", output=True),
        num("per_litre_day", "Volumetric productivity", "", "g/L/day", "", output=True),
        num("days_needed", "Days needed for the target titre", "", "days", "", output=True),
    ],
    dirs=[
        d("Productivity", "qp", "titre/(vcd*days)*1000"),
        d("Productivity", "total", "titre*volume"),
        d("Productivity", "per_litre_day", "titre/days"),
        d("Productivity", "days_needed",
          "target/(titre/days)"),
    ],
    formula="qP = titre ÷ (VCD × days) × 1000  [pg/cell/day],  with VCD in 10⁶ cells/mL",
    symbols=[("titre", "product concentration at harvest", "g/L"),
             ("VCD", "time-weighted mean viable cell density", "10⁶/mL"),
             ("t", "duration of the production phase", "days")],
    bands=[("1 – 10", "Low", "unoptimised CHO pools"),
           ("10 – 30", "Typical", "stable CHO fed-batch processes"),
           ("30 – 60", "High", "optimised hosts, strong promoters, good media"),
           ("above 60", "Very high", "check the assay — this is unusual")],
    notes=[
        "Use the integral of viable cell concentration over time (IVCC) rather than a single VCD "
        "reading; a run that peaks at 20 × 10⁶ cells/mL for two days produces far less than one "
        "that holds 10 × 10⁶ for ten days.",
        "qP is the fair comparison between a 2 L bioreactor and a 2 000 L tank, because titre alone "
        "rewards scale and harvest timing.",
        "Volumetric productivity (g/L/day) is what capacity planning uses; specific productivity is "
        "what cell-line development optimises.",
    ],
    mistakes=[
        "Plugging in peak VCD instead of the time-weighted average, which understates qP badly.",
        "Comparing qP across products with different molecular weights without converting to molar "
        "terms.",
        "Ignoring the harvest/clarification losses between the bioreactor and the reported titre.",
    ],
    faq=[
        ("What is a typical qP for CHO cells?",
         "Roughly 10–30 pg/cell/day in fed-batch, with high producers reaching 40–60."),
        ("How do I calculate IVCC?",
         "Trapezoidal integration of viable cell density against time over the production phase; "
         "qP = product ÷ IVCC."),
    ],
    related=[("/biology/bacterial-growth-curve", "Growth curve"),
             ("/biology/specific-growth-rate-from-od", "Specific growth rate from OD"),
             ("/biology/transfection-setup", "Transfection setup")],
    svg=("curve", {"caption": "Titre accumulates while viable cells hold — the area is the IVCC."}),
    icon="flask",
))

# ------------------------------------------------------ 5. TFF membrane area
add(Spec(
    name="TFF Membrane Area and Flux Calculator",
    slug="tff-membrane-area",
    summary=("A tangential-flow filtration step is sized by the volume to process and the flux the "
             "membrane will hold, and the membrane area then fixes how long the step takes. This "
             "calculator returns the area, the number of cassettes, the diafiltration volume and "
             "the step time at your flux."),
    fields=[
        num("volume", "Batch volume", 500, "L", ""),
        num("flux", "Permeate flux", 60, "L/m²/h", "30–100 for a typical mAb step"),
        num("concentration", "Concentration factor", 8, "x", ""),
        num("diavolumes", "Diafiltration volumes", 5, "DV", ""),
        num("cassette", "Area per cassette", 2.5, "m²", ""),
        num("load", "Maximum load per m²", 100, "L/m²", "Process-specific"),
        num("area", "Membrane area required", "", "m²", "", output=True),
        num("cassettes", "Cassettes to install", "", "cassettes", "", output=True),
        num("df_volume", "Diafiltration buffer needed", "", "L", "", output=True),
        num("time", "Estimated step time", "", "h", "", output=True),
        num("load_area", "Area set by the load limit", "", "m²", "", output=True),
        num("binding", "Which limit sets the area (1 = flux, 2 = load)", "", "", "", output=True),
    ],
    dirs=[
        d("Sizing", "area", "max(volume/load,volume/flux)"),
        d("Sizing", "cassettes", "ceil(max(volume/load,volume/flux)/cassette)"),
        d("Sizing", "df_volume", "volume/concentration*diavolumes"),
        d("Sizing", "time",
          "(volume/area+volume/concentration*diavolumes/area)/flux+0.5"),
        d("Sizing", "load_area", "volume/load"),
        d("Sizing", "binding", "if_else(volume/load>volume/flux,2,1)"),
    ],
    formula=("Area = max(batch ÷ load capacity, batch ÷ flux-based area);  "
             "DF buffer = (V ÷ CF) × DV;  time ≈ (V + V·DV/CF) ÷ (area × flux)"),
    symbols=[("V", "starting batch volume", "L"),
             ("J", "permeate flux", "L/m²/h"),
             ("CF", "concentration factor (final ÷ initial volume)", "×"),
             ("DV", "diafiltration volumes", "—")],
    bands=[("30 – 60", "Conservative flux", "high-mass, fouling feeds"),
           ("60 – 100", "Typical", "a well-behaved mAb ultrafiltration step"),
           ("above 100", "Aggressive", "only with pre-filtered, low-titre streams")],
    notes=[
        "Flux falls as the feed concentrates, so the time estimate is optimistic unless the quoted "
        "flux is the average over the step, not the clean-water value.",
        "Diafiltration is done at constant volume: you add buffer at the rate permeate leaves, and "
        "the buffer volume needed is (retentate volume) × DV.",
        "Install at least one cassette more than the calculation suggests; a single cassette leaves "
        "no margin for a fouled membrane.",
    ],
    mistakes=[
        "Using clean-water flux for a cell-culture feed, where fouling cuts it by half or more.",
        "Forgetting the hold-up volume of the system and tubing when quoting yield.",
        "Sizing exactly to the load limit and then having to dilute the batch to finish the step.",
    ],
    faq=[
        ("How do I choose a cassette size?",
         "Round the calculated area up to whole cassettes, then check the retentate channel height "
         "gives a sensible crossflow for your pump."),
        ("What is one diafiltration volume?",
         "A volume of buffer equal to the current retentate volume; five volumes remove about "
         "99.3% of a freely permeating impurity."),
    ],
    related=[("/biology/enzyme-specific-activity-yield", "Specific activity and yield"),
             ("/biology/specific-productivity-qp", "Specific productivity"),
             ("/chemistry/molarity", "Molarity")],
    svg=("chain", {"caption": "Feed, retentate and permeate: area sets the pace of the step."}),
    icon="flow",
))

# ------------------------------------------------------ 6. transfection setup
add(Spec(
    name="Transfection Setup Calculator",
    slug="transfection-setup",
    summary=("Transfection protocols are written per well or per flask, and scaling them by hand is "
             "where experiments go wrong. This calculator scales DNA, transfection reagent and "
             "diluent from your reference format to the plate you actually have, with the complex "
             "formation time."),
    fields=[
        num("dna_ref", "DNA in the reference well", 0.5, "µg", ""),
        num("reagent_ref", "Reagent in the reference well", 1.5, "µL", ""),
        num("diluent_ref", "Diluent per reference well", 50, "µL", ""),
        num("wells", "Wells (or vessels) needed", 24, "", "Add 10% for pipetting loss"),
        num("dna_batch", "DNA per batch to make", "", "µg", "", output=True),
        num("reagent_batch", "Reagent for the batch", "", "µL", "", output=True),
        num("diluent_batch", "Diluent for the batch", "", "µL", "", output=True),
        num("tube_total", "Total complex volume", "", "µL", "", output=True),
        num("per_well", "Volume of complex per well", "", "µL", "", output=True),
    ],
    dirs=[
        d("Setup", "dna_batch", "dna_ref*wells*1.1"),
        d("Setup", "reagent_batch", "reagent_ref*wells*1.1"),
        d("Setup", "diluent_batch", "diluent_ref*wells*1.1"),
        d("Setup", "tube_total", "(reagent_ref+diluent_ref)*wells*1.1"),
        d("Setup", "per_well", "(reagent_ref+diluent_ref)"),
    ],
    formula=("Scale factor = wells × 1.1 for pipetting loss;  every component is multiplied by that "
             "factor, and the complex is formed at the reference ratio"),
    symbols=[("DNA", "plasmid per well", "µg"),
             ("reagent", "lipid or polymer per well", "µL"),
             ("diluent", "serum-free medium per well", "µL")],
    bands=[("1:2 – 1:3", "DNA to reagent", "typical for Lipofectamine-class reagents"),
           ("15 – 30 min", "Complex formation", "room temperature, no serum, no antibiotics"),
           ("4 – 6 h", "Exposure", "then change to complete medium for sensitive cells")],
    notes=[
        "Make the DNA and the reagent dilutions in separate tubes before mixing; adding lipid "
        "straight onto DNA creates local excess and uneven complexes.",
        "The 10% excess is not laziness: 24 wells need 25 wells' worth because no pipette delivers "
        "exactly what it draws.",
        "Scale by surface area, not by well number, when moving between plate formats — a 6-well "
        "well holds ten times the area of a 96-well well.",
    ],
    mistakes=[
        "Scaling a 24-well protocol to a 6-well plate by well count only.",
        "Leaving complexes on the cells overnight, which is toxic for most primary cells.",
        "Using medium with antibiotics during complex formation.",
    ],
    faq=[
        ("How much DNA for a 6-well transfection?",
         "About 1–2 µg per well for a 9.6 cm² surface, roughly double a 12-well well."),
        ("Can I scale this to a flask?",
         "Yes, but scale on growth area: a T-75 flask is about 8 times a 6-well well."),
    ],
    related=[("/biology/cell-culture-vessel-reference", "Cell culture vessel reference"),
             ("/biology/cell-seeding-density", "Seeding density"),
             ("/biology/transformation-efficiency", "Transformation efficiency")],
    svg=("chain", {"caption": "Two dilutions, one mix, then straight onto the cells."}),
    icon="flask",
))

# -------------------------------------------------------------- 7. BOD load
add(Spec(
    name="BOD Load Calculator",
    slug="bod-load",
    summary=("BOD load is the mass of oxygen-demanding material a waste stream delivers to a "
             "treatment plant each day, and it sizes the aeration tank. This calculator converts "
             "flow and BOD concentration into kilograms per day, population equivalents and the "
             "effluent surcharge band."),
    fields=[
        num("flow", "Flow", 500, "m³/day", ""),
        num("bod_in", "Influent BOD", 320, "mg/L", ""),
        num("bod_out", "Effluent BOD", 20, "mg/L", ""),
        num("volume", "Aeration tank volume", 750, "m³", ""),
        num("mlss", "MLSS", 3000, "mg/L", ""),
        num("load", "BOD load", "", "kg/day", "", output=True),
        num("removed", "BOD removed", "", "kg/day", "", output=True),
        num("pe", "Population equivalent", "", "people", "", output=True),
        num("f_m", "Food to microorganism ratio", "", "kg/kg/day", "", output=True),
        num("efficiency", "Removal efficiency", "", "%", "", output=True),
    ],
    dirs=[
        d("Load", "load", "flow*bod_in/1000"),
        d("Load", "removed", "flow*(bod_in-bod_out)/1000"),
        d("Load", "pe", "flow*bod_in/1000/0.06"),
        d("Load", "f_m", "flow*bod_in/1000/(volume*mlss/1000)"),
        d("Load", "efficiency", "(bod_in-bod_out)/bod_in*100"),
    ],
    formula=("BOD load (kg/day) = flow (m³/day) × BOD (mg/L) ÷ 1 000;  "
             "F/M = BOD load ÷ (tank volume × MLSS)"),
    symbols=[("Q", "flow", "m³/day"),
             ("BOD", "5-day biochemical oxygen demand", "mg/L"),
             ("MLSS", "mixed liquor suspended solids", "mg/L"),
             ("F/M", "food to microorganism ratio", "kg/kg/day")],
    bands=[("0.05 – 0.15", "Extended aeration", "long sludge age, low surplus sludge"),
           ("0.2 – 0.4", "Conventional", "the classic activated-sludge window"),
           ("0.4 – 0.6", "High rate", "fast, but sludge quality suffers"),
           ("above 1.0", "Overloaded", "poor settling, carry-over and odour")],
    notes=[
        "Population equivalent assumes 60 g of BOD per person per day, which is a European "
        "convention; check the local figure before quoting it in a permit application.",
        "BOD is a five-day test, so the number always lags the plant by a week. COD is the fast "
        "proxy, and the BOD/COD ratio tells you how biodegradable the stream is.",
        "F/M ratio, not load alone, decides whether the sludge settles. Two plants with the same "
        "load behave completely differently if one has triple the tank volume.",
    ],
    mistakes=[
        "Mixing units: mg/L with L/s needs a factor of 86.4 to reach kg/day.",
        "Using the influent BOD where the permit limit is on the effluent.",
        "Treating BOD load as constant when the plant sees a diurnal peak two to three times the "
        "daily mean.",
    ],
    faq=[
        ("How do I convert mg/L and m³/day to kg/day?",
         "Multiply flow by concentration and divide by 1 000."),
        ("What population does 1 000 kg BOD/day serve?",
         "About 16 700 people at 60 g per person per day."),
    ],
    related=[("/biology/svi-sludge-volume-index", "Sludge volume index"),
             ("/biology/solids-retention-time", "Solids retention time"),
             ("/biology/dilution-calculator-c1v1", "Dilution calculator")],
    svg=("bars", {"caption": "Load in, load out: the gap is what the biology removed."}),
    icon="droplet",
))

# ------------------------------------------------------ 8. sludge volume index
add(Spec(
    name="Sludge Volume Index Calculator (SVI)",
    slug="svi-sludge-volume-index",
    summary=("Sludge volume index is the volume one gram of sludge occupies after thirty minutes of "
             "settling, and it is the fastest signal that an activated-sludge plant is about to "
             "bulk. This calculator returns SVI, the sludge density index and the return-sludge "
             "ratio the clarifier needs."),
    fields=[
        num("settled", "Settled sludge volume after 30 min", 280, "mL/L", "Read from the cone"),
        num("mlss", "MLSS", 3000, "mg/L", ""),
        num("flow", "Influent flow", 500, "m³/day", ""),
        num("return_mlss", "Return sludge MLSS", 8000, "mg/L", ""),
        num("svi", "Sludge volume index", "", "mL/g", "", output=True),
        num("sdi", "Sludge density index", "", "", "", output=True),
        num("return_ratio", "Return sludge ratio", "", "%", "", output=True),
        num("return_flow", "Return sludge flow", "", "m³/day", "", output=True),
    ],
    dirs=[
        d("Sludge", "svi", "settled/mlss*1000"),
        d("Sludge", "sdi", "100/(settled/mlss*1000)"),
        d("Sludge", "return_ratio", "mlss/(return_mlss-mlss)*100"),
        d("Sludge", "return_flow", "flow*mlss/(return_mlss-mlss)"),
    ],
    formula=("SVI = settled volume (mL/L) × 1 000 ÷ MLSS (mg/L);  "
             "RAS ratio = MLSS ÷ (RAS MLSS − MLSS)"),
    symbols=[("SV₃₀", "settled sludge volume in 30 minutes", "mL/L"),
             ("MLSS", "mixed liquor suspended solids", "mg/L"),
             ("SVI", "sludge volume index", "mL/g")],
    bands=[("below 80", "Dense, well settling", "excellent sludge; check for pin floc"),
           ("80 – 150", "Normal", "typical healthy activated sludge"),
           ("150 – 250", "Poor settling", "investigate loading, aeration and nutrients"),
           ("above 250", "Bulking", "filamentous outbreak; the clarifier will lose solids")],
    notes=[
        "SVI is a ratio, so it rises both when sludge settles badly and when the MLSS reading is "
        "too low — always check the MLSS measurement before blaming filaments.",
        "Sludge density index is simply 100 ÷ SVI, a measure of how many grams one litre of settled "
        "sludge contains.",
        "The return-sludge ratio follows from a mass balance on the clarifier: solids leaving in the "
        "return must equal solids arriving from the aeration tank.",
    ],
    mistakes=[
        "Reading the settled volume from a stirred or disturbed cylinder.",
        "Measuring MLSS from a sample taken at the wrong point in the tank.",
        "Raising the return rate to fight bulking without checking whether the clarifier can take "
        "the hydraulic load.",
    ],
    faq=[
        ("What is a normal SVI?",
         "About 100–150 mL/g for conventional activated sludge; below 80 suits membrane and "
         "oxidation-ditch plants."),
        ("What causes a high SVI?",
         "Filamentous bacteria, low dissolved oxygen, nutrient deficiency (often phosphorus) or a "
         "sudden organic load."),
    ],
    related=[("/biology/bod-load", "BOD load"),
             ("/biology/solids-retention-time", "Solids retention time"),
             ("/biology/field-capacity", "Field capacity")],
    svg=("gauge", {"caption": "Settling quality on one dial from dense to bulking."}),
    icon="droplet",
))

# ------------------------------------------------- 9. solids retention time (SRT)
add(Spec(
    name="Solids Retention Time Calculator (SRT)",
    slug="solids-retention-time",
    summary=("Solids retention time, or sludge age, is how long a bacterium stays in the system, and "
             "it decides which organisms survive there. This calculator returns SRT from the tank "
             "inventory and the daily sludge wasting, plus the wasting rate needed to hit a target "
             "age."),
    fields=[
        num("volume", "Aeration tank volume", 750, "m³", ""),
        num("mlss", "MLSS", 3000, "mg/L", ""),
        num("waste", "Waste sludge flow", 25, "m³/day", ""),
        num("waste_mlss", "Waste sludge MLSS", 8000, "mg/L", ""),
        num("effluent", "Effluent flow", 500, "m³/day", ""),
        num("effluent_tss", "Effluent suspended solids", 15, "mg/L", ""),
        num("target", "Target SRT", 15, "days", ""),
        num("srt", "Solids retention time", "", "days", "", output=True),
        num("sludge_age_mass", "Solids inventory", "", "kg", "", output=True),
        num("waste_needed", "Wasting rate for the target SRT", "", "m³/day", "", output=True),
    ],
    dirs=[
        d("Retention", "sludge_age_mass", "volume*mlss/1000"),
        d("Retention", "srt",
          "(volume*mlss/1000)/(waste*waste_mlss/1000+effluent*effluent_tss/1000)"),
        d("Retention", "waste_needed",
          "((volume*mlss/1000)/target-effluent*effluent_tss/1000)/(waste_mlss/1000)"),
    ],
    formula=("SRT = (V × MLSS) ÷ (Q_w × MLSS_w + Q_e × TSS_e),  all masses in the same units"),
    symbols=[("V", "aeration tank volume", "m³"),
             ("Q_w", "waste sludge flow", "m³/day"),
             ("MLSS_w", "wasted sludge concentration", "mg/L"),
             ("Q_e", "effluent flow", "m³/day")],
    bands=[("2 – 4 days", "High rate", "fast growth, poor nitrification"),
           ("5 – 10 days", "Conventional", "BOD removal, partial nitrification"),
           ("10 – 20 days", "Nitrifying", "stable ammonia removal"),
           ("above 25 days", "Extended aeration", "sludge stabilisation, low yield")],
    notes=[
        "SRT, not hydraulic retention time, controls the biology: a plant can have a four-hour "
        "hydraulic pass and a fifteen-day sludge age at the same time.",
        "Nitrifying bacteria grow slowly, so a plant designed for ammonia removal needs an SRT of at "
        "least 8–10 days at 15 °C and more when colder.",
        "Solids lost over the weir count. On a plant with poor clarification, effluent TSS can be "
        "the dominant term in the denominator.",
    ],
    mistakes=[
        "Quoting hydraulic retention time when asked about sludge age.",
        "Ignoring effluent suspended solids, which quietly shorten the SRT.",
        "Wasting from the return line without using the return concentration in the calculation.",
    ],
    faq=[
        ("How long should sludge be kept in an activated-sludge plant?",
         "5–10 days for BOD removal, 10–20 for nitrification, 25 and above for stabilisation."),
        ("Does SRT set sludge production?",
         "Yes — surplus sludge falls roughly as 1/SRT, which is why long ages produce less waste "
         "sludge."),
    ],
    related=[("/biology/svi-sludge-volume-index", "Sludge volume index"),
             ("/biology/bod-load", "BOD load"),
             ("/biology/bacterial-growth-curve", "Growth curve")],
    svg=("curve", {"caption": "Solids inventory divided by daily loss is the sludge age."}),
    icon="clock",
))

# ------------------------------------------------------ 10. net reproductive rate
add(Spec(
    name="Net Reproductive Rate Calculator (R₀)",
    slug="net-reproductive-rate",
    summary=("The net reproductive rate is the number of daughters a female leaves over her whole "
             "life, and it is the single number that says whether a population will grow. Enter "
             "age-specific survival and fertility and it returns R₀, generation time and the "
             "per-generation change."),
    fields=[
        num("survival", "Probability a newborn reaches breeding age", 0.6, "", "0–1"),
        num("fecundity", "Daughters per female per season", 3.2, "daughters", ""),
        num("seasons", "Breeding seasons per lifetime", 2, "", ""),
        num("interval", "Age at first reproduction", 1, "years", ""),
        num("r0", "Net reproductive rate", "", "daughters", "", output=True),
        num("generation", "Generation time", "", "years", "", output=True),
        num("r", "Intrinsic rate of increase", "", "per year", "", output=True),
        num("doubling", "Doubling time", "", "years", "", output=True),
    ],
    dirs=[
        d("Life table", "r0", "survival*fecundity*seasons"),
        d("Life table", "generation", "interval+(seasons-1)*interval/2"),
        d("Life table", "r", "ln(max(0.000001,survival*fecundity*seasons))/max(0.5,interval)"),
        d("Life table", "doubling",
          "ln(2)/(ln(max(0.000001,survival*fecundity*seasons))/max(0.5,interval))"),
    ],
    formula="R₀ = Σ l(x)·m(x);  r ≈ ln R₀ ÷ T;  doubling time = ln 2 ÷ r",
    symbols=[("l(x)", "survival to age x", "probability"),
             ("m(x)", "daughters produced at age x", "daughters"),
             ("R₀", "net reproductive rate", "daughters per female"),
             ("T", "generation time", "years")],
    bands=[("R₀ < 1", "Declining", "each female is replaced by less than one daughter"),
           ("R₀ = 1", "Stable", "exact replacement"),
           ("1 < R₀ < 2", "Slow growth", "typical of long-lived vertebrates"),
           ("R₀ > 2", "Fast growth", "insects, weeds, invasive species")],
    notes=[
        "R₀ is a lifetime figure, so it compares across lifespans in a way that r does not; r is the "
        "per-year rate and is the one that goes into exponential growth models.",
        "The approximation r ≈ ln R₀ / T is exact only in a stable age distribution. When the age "
        "structure is disturbed — after a drought or a cull — the realised rate differs for years.",
        "A species with R₀ of 1.1 but a generation time of 15 years is effectively static on any "
        "management timescale.",
    ],
    mistakes=[
        "Counting offspring rather than daughters — sons do not add to R₀.",
        "Using the mean age at reproduction when reproduction is spread over several seasons.",
        "Treating R₀ as a projection: it is an average over the whole life, not next year's growth.",
    ],
    faq=[
        ("What does R₀ = 1 mean?",
         "The population replaces itself exactly; every female is replaced by one daughter on "
         "average."),
        ("How is R₀ different from the intrinsic rate r?",
         "R₀ is per generation and ignores timing; r is per unit time and includes it. A fast-"
         "breeding species can have the same R₀ as a slow one but a much larger r."),
    ],
    related=[("/biology/logistic-population-growth", "Logistic population growth"),
             ("/biology/exponential-population-growth", "Exponential growth"),
             ("/biology/maximum-sustainable-yield", "Maximum sustainable yield")],
    svg=("bars", {"caption": "Survival times fertility, summed over the lifetime."}),
    icon="people",
))

# --------------------------------------------------------- 11. fixation index Fst
add(Spec(
    name="Fixation Index Calculator (Fst)",
    slug="fixation-index-fst",
    summary=("Fst measures how much of the genetic variation in a set of populations is explained by "
             "the differences between them, on a scale from zero (panmixia) to one (complete "
             "fixation). This calculator takes allele frequencies from two or more populations and "
             "returns Fst, heterozygosity and the migration rate it implies."),
    fields=[
        num("p1", "Allele frequency in population 1", 0.2, "", "0–1"),
        num("p2", "Allele frequency in population 2", 0.7, "", "0–1"),
        num("n1", "Sample size, population 1", 50, "", ""),
        num("n2", "Sample size, population 2", 50, "", ""),
        num("p_bar", "Mean allele frequency", "", "", "", output=True),
        num("hs", "Expected heterozygosity within populations", "", "", "", output=True),
        num("ht", "Expected heterozygosity overall", "", "", "", output=True),
        num("fst", "Fst", "", "", "", output=True),
        num("migrants", "Migrants per generation implied by Fst", "", "per gen", "", output=True),
    ],
    dirs=[
        d("Divergence", "p_bar", "(p1*n1+p2*n2)/(n1+n2)"),
        d("Divergence", "hs", "(2*p1*(1-p1)+2*p2*(1-p2))/2"),
        d("Divergence", "ht", "2*((p1*n1+p2*n2)/(n1+n2))*(1-(p1*n1+p2*n2)/(n1+n2))"),
        d("Divergence", "fst",
          "(2*((p1*n1+p2*n2)/(n1+n2))*(1-(p1*n1+p2*n2)/(n1+n2))"
          "-(2*p1*(1-p1)+2*p2*(1-p2))/2)"
          "/max(0.000001,2*((p1*n1+p2*n2)/(n1+n2))*(1-(p1*n1+p2*n2)/(n1+n2)))"),
        d("Divergence", "migrants",
          "(1/max(0.000001,((2*((p1*n1+p2*n2)/(n1+n2))*(1-(p1*n1+p2*n2)/(n1+n2))"
          "-(2*p1*(1-p1)+2*p2*(1-p2))/2)"
          "/max(0.000001,2*((p1*n1+p2*n2)/(n1+n2))*(1-(p1*n1+p2*n2)/(n1+n2)))))-1)/4"),
    ],
    formula="Fst = (H_T − H_S) ÷ H_T;  H_T = 2p̄(1 − p̄);  H_S = mean of 2pᵢ(1 − pᵢ);  Fst ≈ 1/(4Nm + 1)",
    symbols=[("p̄", "mean allele frequency across populations", "0–1"),
             ("H_T", "heterozygosity expected with random mating overall", "—"),
             ("H_S", "mean heterozygosity within populations", "—")],
    bands=[("0 – 0.05", "Little differentiation", "one interbreeding population"),
           ("0.05 – 0.15", "Moderate", "substructure, some restricted gene flow"),
           ("0.15 – 0.25", "Great", "distinct subpopulations"),
           ("above 0.25", "Very great", "near-separate species-level units")],
    notes=[
        "These bands are Wright's rules of thumb, and they were calibrated on protein "
        "polymorphisms. Genome-wide Fst values from SNP data are usually an order of magnitude "
        "smaller for the same biology.",
        "Fst depends on the marker: microsatellites show more differentiation than SNPs at the same "
        "level of gene flow.",
        "The migration estimate assumes an island model at equilibrium. A recent split looks the "
        "same as low migration, and no allele-frequency calculation can tell them apart.",
    ],
    mistakes=[
        "Comparing Fst computed from different marker types.",
        "Ignoring sample size, which biases Fst upward in small samples.",
        "Reading Fst as a proportion of individuals that are migrants rather than a proportion of "
        "variation.",
    ],
    faq=[
        ("What Fst value indicates separate populations?",
         "Above 0.15 is conventionally 'great differentiation', but the number only means something "
         "against the marker and the species' baseline."),
        ("Can Fst be negative?",
         "Slightly, from sampling noise in small samples; the true value is bounded at zero."),
    ],
    related=[("/biology/allele-frequency", "Allele frequency"),
             ("/biology/inbreeding-coefficient", "Inbreeding coefficient"),
             ("/biology/hardy-weinberg-equilibrium", "Hardy–Weinberg equilibrium")],
    svg=("gauge", {"caption": "From freely mixing to completely fixed."}),
    icon="dna",
))

# ------------------------------------------------- 12. heritability coefficient
add(Spec(
    name="Heritability Coefficient Calculator",
    slug="heritability-coefficient",
    summary=("Heritability is the share of the variation in a trait, in one population in one "
             "environment, that is attributable to genetic differences. This calculator estimates "
             "narrow-sense heritability from parent-offspring or half-sib data and shows the "
             "expected response to selection."),
    fields=[
        num("r_parent", "Correlation between parent and offspring", 0.35, "", "0–1"),
        num("r_halfsib", "Correlation among half sibs", 0.09, "", "0–1"),
        num("additive", "Additive genetic variance", 0.4, "", "V_A"),
        num("environment", "Environmental variance", 0.6, "", "V_E"),
        num("selection", "Selection differential", 1.2, "SD", "How far the selected parents sit above the mean"),
        num("h2_regression", "Heritability from parent-offspring regression", "", "", "", output=True),
        num("h2_sib", "Heritability from half-sib correlation", "", "", "", output=True),
        num("h2_variance", "Heritability from variance components", "", "", "", output=True),
        num("response", "Response to selection", "", "SD", "", output=True),
    ],
    dirs=[
        d("Heritability", "h2_regression", "2*r_parent"),
        d("Heritability", "h2_sib", "4*r_halfsib"),
        d("Heritability", "h2_variance", "additive/(additive+environment)"),
        d("Heritability", "response", "additive/(additive+environment)*selection"),
    ],
    formula="h² = V_A ÷ (V_A + V_E);  h² = 2r(parent, offspring);  h² = 4r(half sibs);  R = h² × S",
    symbols=[("V_A", "additive genetic variance", "—"),
             ("V_E", "environmental variance", "—"),
             ("S", "selection differential", "SD"),
             ("R", "response to selection", "SD")],
    bands=[("0 – 0.2", "Low", "environment dominates; breeding progress is slow"),
           ("0.2 – 0.4", "Moderate", "typical for growth and yield traits"),
           ("0.4 – 0.7", "High", "typical for body size and milk yield"),
           ("0.7 – 1.0", "Very high", "highly canalised traits such as coat pattern")],
    notes=[
        "Heritability is a property of a population in an environment, not of a gene. The same "
        "trait can be 0.6 in a uniform greenhouse and 0.2 in a variable field.",
        "Narrow-sense heritability counts only additive effects, because that is the part that "
        "responds to selection; broad-sense includes dominance and interaction.",
        "The breeder's equation R = h²S is the most useful form: it turns heritability into a "
        "prediction of how much the next generation moves.",
    ],
    mistakes=[
        "Quoting a heritability figure for a trait without saying which population and environment.",
        "Using a parent-offspring correlation from different environments, which inflates h².",
        "Assuming that a high heritability means a trait cannot be changed by the environment.",
    ],
    faq=[
        ("What is the difference between h² and H²?",
         "h² (narrow sense) is additive variance over total; H² (broad sense) is all genetic "
         "variance over total. Only h² predicts selection response."),
        ("Can heritability be greater than 1?",
         "Not in a properly estimated design; a value above 1 signals a data or model error."),
    ],
    related=[("/biology/fixation-index-fst", "Fst"),
             ("/biology/relatedness-coefficient", "Relatedness coefficient"),
             ("/biology/heritability-coefficient", "Heritability")],
    svg=("bars", {"caption": "Additive plus environmental variance sets the ceiling."}),
    icon="dna",
))

# ------------------------------------------------------ 13. Watterson estimator
add(Spec(
    name="Watterson Estimator Calculator",
    slug="watterson-estimator",
    summary=("The Watterson estimator infers the population mutation parameter θ from the number of "
             "segregating sites in a sample, with a correction for how many sequences you "
             "sequenced. It is the quickest way to compare diversity between samples of different "
             "sizes and to spot a population that is not at equilibrium."),
    fields=[
        num("sites", "Segregating sites", 24, "", "Columns that vary"),
        num("length", "Sequence length", 1000, "bp", ""),
        num("n", "Number of sequences", 20, "", ""),
        num("theta_w", "Watterson θ (per locus)", "", "", "", output=True),
        num("theta_per_site", "θ per site", "", "", "", output=True),
        num("theta_per_kb", "Watterson θ per kb", "", "", "", output=True),
        num("a1", "Harmonic number a₁ (n − 1)", "", "", "", output=True),
    ],
    dirs=[
        # a₁ = H(n−1) is evaluated in closed form: the exact sum cannot be written without
        # knowing n, and the asymptotic expansion is accurate to ten digits from n = 3 up
        # (H(19) = 3.54774 vs 3.54774 here). Keeping it in n makes the page correct for every
        # sample size instead of one hard-coded 20.
        d("Diversity", "a1",
          "log(max(n,2)-1)+0.5772156649+1/(2*(max(n,2)-1))-1/(12*(max(n,2)-1)*(max(n,2)-1))"),
        d("Diversity", "theta_w", "sites/(log(max(n,2)-1)+0.5772156649+1/(2*(max(n,2)-1))-1/(12*(max(n,2)-1)*(max(n,2)-1)))"),
        d("Diversity", "theta_per_site",
          "sites/(log(max(n,2)-1)+0.5772156649+1/(2*(max(n,2)-1))-1/(12*(max(n,2)-1)*(max(n,2)-1)))/length"),
        d("Diversity", "theta_per_kb",
          "sites/(log(max(n,2)-1)+0.5772156649+1/(2*(max(n,2)-1))-1/(12*(max(n,2)-1)*(max(n,2)-1)))/length*1000"),
    ],
    formula="θ_W = S ÷ a₁,  where a₁ = Σ 1/i for i = 1 … n−1",
    symbols=[("S", "number of segregating sites", "sites"),
             ("n", "number of sequences in the sample", "sequences"),
             ("a₁", "harmonic number of n − 1", "—")],
    bands=[("0 – 0.001", "Low diversity", "bottleneck, inbreeding or a small population"),
           ("0.001 – 0.01", "Typical", "many outcrossing eukaryotes"),
           ("0.01 – 0.05", "High", "large populations, viruses, bacteria"),
           ("above 0.05", "Very high", "often a sign of recent admixture")],
    notes=[
        "θ_W uses only the count of variable sites, so it is cheap to compute and stable, but it "
        "is sensitive to sample size through a₁.",
        "Comparing θ_W with π (average pairwise difference) is the basis of Tajima's D: they agree "
        "under a standard neutral model and diverge under selection or demographic change.",
        "The estimator assumes an infinite-sites model with no recombination within the locus. "
        "Recombining data must be split into blocks.",
    ],
    mistakes=[
        "Forgetting the a₁ correction and dividing S by n.",
        "Comparing θ from samples of very different sizes without noting a₁.",
        "Applying it to a locus with recombination, which biases θ downward.",
    ],
    faq=[
        ("Why is a₁ in the denominator?",
         "Because the expected number of segregating sites grows with the harmonic number of the "
         "sample size under the neutral coalescent."),
        ("Can θ_W estimate effective population size?",
         "Yes, for a neutral locus: θ = 4Nₑμ for a diploid autosome, so Nₑ = θ ÷ (4μ)."),
    ],
    related=[("/biology/tajimas-d", "Tajima's D"),
             ("/biology/fixation-index-fst", "Fixation index"),
             ("/biology/hardy-weinberg-equilibrium", "Hardy-Weinberg equilibrium")],
    svg=("curve", {"caption": "More sequences means more expected variable sites."}),
    icon="dna",
))

# --------------------------------------------- 14. absorbance ↔ transmittance
add(Spec(
    name="Absorbance to Transmittance Converter",
    slug="absorbance-transmittance",
    summary=("Absorbance and transmittance are two ways of writing the same measurement, related by "
             "a base-ten logarithm. This converter goes both ways, adds percent transmission and "
             "the concentration the reading implies at a chosen extinction coefficient."),
    fields=[
        num("absorbance", "Absorbance", 0.5, "", ""),
        num("extinction", "Extinction coefficient", 1.0, "per mg/mL", "Use 1 for a plain conversion"),
        num("path", "Path length", 1, "cm", ""),
        num("transmittance", "Transmittance", "", "", "", output=True),
        num("percent", "Transmittance", "", "%", "", output=True),
        num("concentration", "Concentration from Beer–Lambert", "", "mg/mL", "", output=True),
        num("lost", "Fraction of light lost", "", "%", "", output=True),
    ],
    dirs=[
        d("Optics", "transmittance", "pow(10,-absorbance)"),
        d("Optics", "percent", "pow(10,-absorbance)*100"),
        d("Optics", "concentration", "absorbance/(extinction*path)"),
        d("Optics", "lost", "(1-pow(10,-absorbance))*100"),
    ],
    formula="A = −log₁₀(T) = 2 − log₁₀(%T);  T = 10^(−A);  A = ε·c·l",
    symbols=[("A", "absorbance (optical density)", "—"),
             ("T", "transmittance as a fraction", "—"),
             ("ε", "extinction coefficient", "per mg/mL"),
             ("l", "path length", "cm")],
    bands=[("0 – 0.1", "Very dilute", "poor signal-to-noise on most instruments"),
           ("0.1 – 1.0", "Reliable", "the linear window of a spectrophotometer"),
           ("1.0 – 1.5", "High", "stray light starts to bend the curve"),
           ("above 2.0", "Unreliable", "dilute the sample and multiply the result")],
    notes=[
        "An absorbance of 1.0 means 10% of the light got through; 2.0 means 1%. This is why a "
        "doubling of absorbance corresponds to ten times less light, not half.",
        "Instruments quote linear range up to about 1.0–1.5 A, above which stray light makes the "
        "reading saturate. Always dilute and multiply.",
        "Transmittance is sometimes quoted as a percentage in older methods; 50% T is 0.301 A, not "
        "0.5 A.",
    ],
    mistakes=[
        "Treating absorbance as linear in transmittance: doubling A does not halve T.",
        "Using a cuvette with the wrong path length and forgetting to scale c.",
        "Forgetting the blank, which shifts every reading by its own absorbance.",
    ],
    faq=[
        ("What is an absorbance of 2 in transmittance?",
         "1% transmittance, or 0.01 as a fraction."),
        ("Why does my reading stop increasing when I add more sample?",
         "The instrument has reached the top of its linear range and stray light now dominates."),
    ],
    related=[("/biology/beer-lambert-a280-protein-concentration", "Beer–Lambert for proteins"),
             ("/biology/od600-to-cell-density", "OD600 to cell density"),
             ("/biology/dilution-calculator-c1v1", "Dilution calculator")],
    svg=("curve", {"caption": "A logarithmic scale from full transmission to darkness."}),
    icon="light",
))

# ------------------------------------------------------- 15. centrifuge RCF/RPM
add(Spec(
    name="Centrifuge RCF to RPM Converter",
    slug="centrifuge-rcf-rpm",
    summary=("RCF and RPM are the same centrifuge force in different units: RPM depends on the rotor, RCF "
             "does not. This converter goes between the two using the rotor radius, so a protocol written "
             "for someone else's centrifuge can be run on yours."),
    fields=[
        num("radius", "Rotor radius", 8.5, "cm", "Measure to the bottom of the tube, not the top"),
        num("rpm", "Speed", 4000, "rpm", ""),
        num("rcf", "Relative centrifugal force", "", "× g", "", output=True),
        num("rpm_needed", "Speed for 10 000 × g", "", "rpm", "", output=True),
        num("per_minute", "Distance travelled per minute", "", "km", "", output=True),
    ],
    dirs=[
        d("Centrifuge", "rcf", "1.118*pow(10,-5)*radius*rpm*rpm"),
        d("Centrifuge", "rpm_needed", "sqrt(10000/(1.118*pow(10,-5)*radius))"),
        d("Centrifuge", "per_minute", "2*pi*radius/100000*rpm"),
    ],
    formula="RCF = 1.118 × 10⁻⁵ × r × (rpm)²,  with r in centimetres and RCF in multiples of g",
    symbols=[("r", "rotor radius (centre to tube bottom)", "cm"),
             ("rpm", "revolutions per minute", "rpm"),
             ("RCF", "relative centrifugal force", "× g")],
    bands=[("below 500 × g", "Gentle pelleting", "cells, nuclei, large precipitates"),
           ("1 000 – 5 000 × g", "Standard", "bacteria, mitochondria"),
           ("10 000 – 20 000 × g", "High", "cell debris, protein precipitates"),
           ("above 100 000 × g", "Ultracentrifuge", "ribosomes, viruses, density gradients")],
    notes=[
        "RCF scales with the square of the speed and linearly with the radius, so a rotor with a "
        "17 cm radius needs far fewer rpm than a small benchtop one to reach the same force.",
        "Radius is measured horizontally from the spindle axis to the bottom of the tube when the "
        "rotor is in its running position, not the top of the tube.",
        "Because force varies along the tube, only the maximum radius (the pellet end) is used for "
        "pelleting steps; for gradients, use the average radius.",
    ],
    mistakes=[
        "Measuring the radius from the rotor edge instead of the spindle axis.",
        "Copying rpm from a protocol run on a different rotor.",
        "Assuming the same rpm always means the same force across a swinging-bucket and a "
        "fixed-angle rotor.",
    ],
    faq=[
        ("How do I convert 10 000 × g to rpm?",
         "rpm = √(RCF ÷ (1.118 × 10⁻⁵ × r)). For an 8.5 cm radius, about 10 260 rpm."),
        ("Is RCF the same as g?",
         "RCF is the force expressed as multiples of Earth's gravity, so 10 000 × g means ten "
         "thousand times gravity."),
    ],
    related=[("/biology/hemocytometer-cell-counter", "Hemocytometer counting"),
             ("/biology/osmolarity-osmotic-pressure", "Osmolarity"),
             ("/biology/absorbance-transmittance", "Absorbance and transmittance")],
    svg=("curve", {"caption": "Force rises with the square of the speed."}),
    icon="orbit",
))

# ---------------------------------------------------- 16. aquarium water volume
add(Spec(
    name="Aquarium Water Volume Calculator",
    slug="aquarium-water-volume",
    summary=("Tank capacity is quoted as a nominal volume, but the water you actually hold is less "
             "once glass, substrate and decoration are accounted for. This calculator returns gross "
             "and true volume, the weight of the water and the heater and filter turnover the tank "
             "needs."),
    fields=[
        sel("shape", "Shape", [("Rectangular", "1"), ("Bow-front", "0.85"), ("Cylinder", "0.785")],
            "1"),
        num("length", "Length", 90, "cm", ""),
        num("width", "Width or diameter", 45, "cm", ""),
        num("height", "Water height", 45, "cm", ""),
        num("substrate", "Substrate depth", 5, "cm", "Displaces water and must be subtracted"),
        num("litres", "Gross volume", "", "L", "", output=True),
        num("net", "True water volume", "", "L", "", output=True),
        num("gallons", "True volume", "", "US gal", "", output=True),
        num("weight", "Weight of the water", "", "kg", "", output=True),
        num("turnover", "Filter turnover needed (5x per hour)", "", "L/h", "", output=True),
    ],
    dirs=[
        d("Tank", "litres", "length*width*height*shape/1000"),
        d("Tank", "net", "length*width*height*shape/1000-length*width*substrate/1000"),
        d("Tank", "gallons",
          "(length*width*height*shape/1000-length*width*substrate/1000)/3.785"),
        d("Tank", "weight",
          "length*width*height*shape/1000-length*width*substrate/1000"),
        d("Tank", "turnover", "(length*width*height*shape/1000-length*width*substrate/1000)*5"),
    ],
    formula="Volume (L) = length × width × height ÷ 1 000;  subtract length × width × substrate depth",
    symbols=[("L, W, H", "internal dimensions", "cm"),
             ("substrate", "gravel or sand depth", "cm"),
             ("1 L", "1 000 cm³ of water, 1 kg", "—")],
    bands=[("below 20 L", "Nano", "very little buffering; small changes matter"),
           ("20 – 60 L", "Small", "easy to maintain, few fish"),
           ("60 – 200 L", "Community", "stable, forgiving of mistakes"),
           ("above 200 L", "Large", "stable but heavy: check the floor loading")],
    notes=[
        "Tanks are sold by external dimensions. A '90 cm' tank usually holds about 90 cm "
        "internally, but the glass thickness and the fill line cost another few litres.",
        "Water weighs one kilogram per litre, so a 200 L tank is a quarter of a tonne before glass, "
        "substrate and cabinet — worth checking against a floor joist span.",
        "The old rule of five turnovers per hour suits most freshwater community tanks; marine and "
        "cichlid setups want ten or more.",
    ],
    mistakes=[
        "Using external dimensions and filling to the brim in the calculation.",
        "Forgetting that substrate and rock displace water, which is most of the error in a "
        "heavily decorated tank.",
        "Treating US gallons and imperial gallons as the same — they differ by 20%.",
    ],
    faq=[
        ("How many litres is a 90 × 45 × 45 cm tank?",
         "182 L gross, and about 162 L with 5 cm of substrate."),
        ("How much does a 200 L tank weigh?",
         "About 200 kg of water, plus 40–60 kg of glass and stand, plus substrate."),
    ],
    related=[("/biology/fish-tank-stocking", "Fish tank stocking"),
             ("/biology/ideal-fish-tank-size", "Ideal tank size"),
             ("/biology/fish-per-liter", "Fish per litre")],
    svg=("grid", {"caption": "Length, width, height — then subtract what the gravel takes."}),
    icon="fish",
))

# ------------------------------------------------------ 17. fish tank stocking
add(Spec(
    name="Fish Tank Stocking Calculator",
    slug="fish-tank-stocking",
    summary=("Stocking is limited by filter capacity and by the space adult fish need, and both are "
             "usually miscalculated because people stock for the size the fish are now. This "
             "calculator gives the inch-per-gallon and surface-area limits, the biomass the filter "
             "must process and how many fish of each adult size fit."),
    fields=[
        num("volume", "True water volume", 160, "L", ""),
        num("length", "Adult length of the species", 6, "cm", "Not the juvenile size"),
        num("fish_count", "Fish planned", 20, "", ""),
        num("filter", "Filter turnover", 800, "L/h", ""),
        num("factor", "Stocking factor", 1.0, "cm per L", "0.6 for goldfish, 0.8 for cichlids"),
        num("capacity", "Stocking capacity", "", "cm", "", output=True),
        num("used", "Stocking level", "", "%", "", output=True),
        num("biomass", "Adult biomass", "", "g", "", output=True),
        num("turnover", "Turnovers per hour", "", "per hour", "", output=True),
        num("max_fish", "Fish of this size that fit", "", "fish", "", output=True),
    ],
    dirs=[
        d("Stocking", "capacity", "volume*factor"),
        d("Stocking", "used", "fish_count*length/max(0.001,volume*factor)*100"),
        d("Stocking", "biomass", "fish_count*pow(length,3)/1000*10"),
        d("Stocking", "turnover", "filter/volume"),
        d("Stocking", "max_fish", "volume*factor/length"),
    ],
    formula=("Capacity (cm of adult fish) = volume (L) × turnover factor;  "
             "biomass ≈ count × (length/10)³ × 10 g"),
    symbols=[("V", "true water volume", "L"),
             ("L", "adult body length of the species", "cm"),
             ("factor", "cm of fish per litre", "cm/L")],
    bands=[("below 60%", "Understocked", "safe, and the filter has headroom"),
           ("60 – 90%", "Well stocked", "the target for a display tank"),
           ("90 – 110%", "At the limit", "only with strong filtration and weekly changes"),
           ("above 110%", "Overstocked", "ammonia spikes, disease and stunted growth")],
    notes=[
        "The old inch-per-gallon rule is a volume proxy for oxygen demand and waste, which scale "
        "with mass, not length. It fails badly for deep-bodied fish, so the biomass line here is the "
        "more honest limit.",
        "Freshwater community tanks: about 1 cm of adult fish per litre of net water; cichlids and "
        "goldfish need double the volume because they are taller and messier.",
        "Filter turnover of five times the tank volume per hour is the usual starting point; the "
        "fish load is what actually decides whether it is enough.",
    ],
    mistakes=[
        "Stocking by the size of the juveniles you bought.",
        "Ignoring that fish grow: 20 small tetras and 20 silver dollars are not the same tank.",
        "Adding all the fish at once, which overwhelms the bacteria before they multiply.",
    ],
    faq=[
        ("How many fish can I keep in 100 L?",
         "Roughly 100 cm of adult fish at 1 cm per litre — so about 16 fish of 6 cm, or 8 of 12 cm."),
        ("Does more filtration allow more fish?",
         "It buys some headroom, but oxygen and swimming space set a hard ceiling."),
    ],
    related=[("/biology/aquarium-water-volume", "Aquarium water volume"),
             ("/biology/ideal-fish-tank-size", "Ideal tank size"),
             ("/biology/fish-per-liter", "Fish per litre")],
    svg=("bars", {"caption": "Length is not mass: the biomass curve grows as a cube."}),
    icon="fish",
))

# ------------------------------------------------------ 18. ideal fish tank size
add(Spec(
    name="Ideal Fish Tank Size Calculator",
    slug="ideal-fish-tank-size",
    summary=("The right tank is set by the largest adult fish, because a fish needs a length to swim "
             "and a volume for its waste. This calculator turns your species list into a recommended "
             "volume, footprint and minimum dimension, and flags when the plan is too small."),
    fields=[
        num("fish_length", "Adult length of the largest fish", 12, "cm", ""),
        num("school", "Number in the school", 6, "", ""),
        sel("temperament", "Temperament",
            [("Peaceful community", "1"), ("Semi-aggressive", "1.4"), ("Territorial", "1.8")], "1"),
        num("min_volume", "Recommended volume", "", "L", "", output=True),
        num("min_length", "Minimum tank length", "", "cm", "", output=True),
        num("min_depth", "Minimum tank depth", "", "cm", "", output=True),
        num("gallons", "Recommended volume", "", "US gal", "", output=True),
    ],
    dirs=[
        d("Sizing", "min_volume",
          "max(20,fish_length*fish_length*school*0.6*temperament/10+fish_length*school)"),
        d("Sizing", "min_length", "max(45,fish_length*8)"),
        d("Sizing", "min_depth", "max(30,fish_length*3)"),
        d("Sizing", "gallons",
          "max(20,fish_length*fish_length*school*0.6*temperament/10+fish_length*school)/3.785"),
    ],
    formula=("Minimum length = 8 × adult body length;  minimum depth = 3 × body length;  "
             "volume grows with the square of length times the school size"),
    symbols=[("L", "adult body length of the largest fish", "cm"),
             ("n", "number of fish in the school", "fish"),
             ("temperament", "multiplier for aggression", "—")],
    bands=[("8 × body length", "Minimum tank length", "three body lengths to accelerate, five to cruise, eight to feel safe"),
           ("3 × body length", "Minimum depth", "room to turn without touching the glass"),
           ("6 × body length", "Comfortable", "what a permanent home should really be")],
    notes=[
        "Swimming length matters more than volume for active species: a 30 cm fish needs a tank at "
        "least 240 cm long, whatever the litres say.",
        "Territorial species need footprint, not depth. A tall narrow tank gives litres without "
        "giving the territory a cichlid actually defends.",
        "Volume scales with the cube of linear size, so doubling a fish's length multiplies its "
        "waste output by about eight.",
    ],
    mistakes=[
        "Buying by litres alone and ending up with a tall, short tank.",
        "Sizing for juveniles and then discovering the fish triples in length.",
        "Ignoring the school size: many 'peaceful' species are only peaceful in groups.",
    ],
    faq=[
        ("What size tank does a 12 cm fish need?",
         "At least 96 cm long and 36 cm deep, which in practice means a 120 cm tank."),
        ("Do goldfish need a big tank?",
         "Yes — they reach 25–30 cm, so 120 cm and 200 L or more, not the bowl they are sold with."),
    ],
    related=[("/biology/aquarium-water-volume", "Aquarium water volume"),
             ("/biology/fish-tank-stocking", "Fish tank stocking"),
             ("/biology/fish-per-liter", "Fish per litre")],
    svg=("grid", {"caption": "Eight lengths long, three deep — the swimming rule."}),
    icon="fish",
))

# ------------------------------------------------------- 19. mushroom yield
add(Spec(
    name="Mushroom Yield Calculator",
    slug="mushroom-yield",
    summary=("Mushroom yield is reported as biological efficiency: kilograms of fresh mushrooms per "
             "100 kg of dry substrate. This calculator converts your harvest and substrate weights "
             "into BE, the yield per block and the number of blocks a target harvest needs."),
    fields=[
        num("fresh", "Fresh mushrooms harvested", 18, "kg", ""),
        num("substrate", "Substrate dry weight", 10, "kg", "Dry weight, not wet"),
        num("moisture", "Substrate moisture", 65, "%", "Wet weight = dry ÷ (1 − moisture)"),
        num("blocks", "Number of blocks", 10, "", ""),
        num("be", "Biological efficiency", "", "%", "", output=True),
        num("wet_weight", "Wet substrate weight", "", "kg", "", output=True),
        num("per_block", "Yield per block", "", "kg", "", output=True),
        num("blocks_needed", "Blocks for a 100 kg harvest", "", "blocks", "", output=True),
    ],
    dirs=[
        d("Yield", "be", "fresh/substrate*100"),
        d("Yield", "wet_weight", "substrate/(1-moisture/100)"),
        d("Yield", "per_block", "fresh/blocks"),
        d("Yield", "blocks_needed", "100/(fresh/blocks)"),
    ],
    formula="BE (%) = fresh mushroom weight ÷ dry substrate weight × 100",
    symbols=[("fresh", "fresh mushrooms harvested", "kg"),
             ("dry substrate", "substrate dry matter at spawning", "kg"),
             ("BE", "biological efficiency", "%")],
    bands=[("below 40%", "Poor", "contamination, wrong moisture or bad spawn run"),
           ("40 – 70%", "Low", "typical of a first flush only"),
           ("70 – 100%", "Good", "normal for oyster mushrooms over three flushes"),
           ("above 100%", "Excellent", "achievable because the mushroom is mostly water")],
    notes=[
        "BE above 100% is possible and normal: mushrooms are about 90% water, so the fresh weight "
        "can exceed the dry substrate they grew on.",
        "Always state whether the substrate weight is wet or dry. A 65% moisture block weighs "
        "nearly three times its dry matter, so the two numbers are not comparable.",
        "Yield is counted over all flushes. Quoting the first flush only flatters the strain.",
    ],
    mistakes=[
        "Using wet substrate weight in the denominator, which halves the apparent BE.",
        "Harvesting after the veil breaks — heavier, but a lower grade and a shorter shelf life.",
        "Comparing species: shiitake and oyster mushrooms have very different ceilings.",
    ],
    faq=[
        ("What is a good biological efficiency for oyster mushrooms?",
         "70–100% over three flushes on straw or sawdust blocks."),
        ("How much substrate do I need for 100 kg of mushrooms?",
         "At 80% BE, about 125 kg of dry substrate — roughly 360 kg of wet blocks."),
    ],
    related=[("/biology/seeding-rate", "Seeding rate"),
             ("/biology/percent-germination", "Percent germination"),
             ("/biology/dry-matter-intake", "Dry matter intake")],
    svg=("bars", {"caption": "Fresh harvest against dry substrate: the ratio is the score."}),
    icon="leaf",
))

# --------------------------------------------------------- 20. BMR-free spare slot
add(Spec(
    name="Cell Surface Area to Volume Ratio Calculator",
    slug="cell-surface-area-volume-ratio",
    summary=("A cell's surface area to volume ratio sets how fast it can exchange materials, and it "
             "falls as the cell grows — which is why cells divide instead of getting bigger. This "
             "calculator returns the ratio for spheres, rods and cubes, and the size at which "
             "diffusion becomes limiting."),
    fields=[
        sel("shape", "Shape", [("Sphere (coccus)", "1"), ("Rod, 2:1 (bacillus)", "2"),
                               ("Cube", "3")], "1"),
        num("size", "Size (diameter or length)", 2, "µm", ""),
        num("flux", "Surface flux", 1.0, "µmol/m²/s", "Substrate uptake per area"),
        num("area", "Surface area", "", "µm²", "", output=True),
        num("volume", "Volume", "", "µm³", "", output=True),
        num("ratio", "Surface area to volume", "", "per µm", "", output=True),
        num("uptake", "Total uptake capacity", "", "µmol/s", "", output=True),
    ],
    dirs=[
        d("Geometry", "area",
          "if_else(shape==1,4*pi*pow(size/2,2),if_else(shape==2,2*pi*pow(size/2,2)+2*pi*size/2*size*2,6*size*size))"),
        d("Geometry", "volume",
          "if_else(shape==1,4/3*pi*pow(size/2,3),if_else(shape==2,pi*pow(size/2,2)*size*2,pow(size,3)))"),
        d("Geometry", "ratio",
          "if_else(shape==1,4*pi*pow(size/2,2),if_else(shape==2,2*pi*pow(size/2,2)+2*pi*size/2*size*2,6*size*size))/"
          "if_else(shape==1,4/3*pi*pow(size/2,3),if_else(shape==2,pi*pow(size/2,2)*size*2,pow(size,3)))"),
        d("Geometry", "uptake",
          "if_else(shape==1,4*pi*pow(size/2,2),if_else(shape==2,2*pi*pow(size/2,2)+2*pi*size/2*size*2,6*size*size))*flux"),
    ],
    formula="Sphere: A = 4πr², V = 4⁄3πr³, A/V = 3/r;  cube: A/V = 6/s",
    symbols=[("r", "radius", "µm"),
             ("s", "side length", "µm"),
             ("A/V", "surface area to volume ratio", "per µm")],
    bands=[("6 per µm", "1 µm sphere", "enormous exchange capacity"),
           ("3 per µm", "2 µm sphere", "typical bacterium"),
           ("0.6 per µm", "10 µm sphere", "typical eukaryotic cell"),
           ("below 0.2 per µm", "Very large", "diffusion alone cannot feed the cell")],
    notes=[
        "For a sphere the ratio is exactly 3/r, so a cell that doubles its diameter halves its "
        "exchange capacity per unit volume — the reason growth triggers division.",
        "Rod shapes keep a higher ratio than spheres at the same volume, which is one explanation "
        "for the success of bacilli in nutrient-poor environments.",
        "Above roughly 1 mm, diffusion cannot supply oxygen to the centre; that is when organisms "
        "need a circulatory system.",
        "Real cells are not smooth spheres: microvilli and cristae raise the effective area "
        "several-fold, and this calculation is the lower bound.",
    ],
    mistakes=[
        "Using the diameter where the formula needs the radius.",
        "Comparing a rod's ratio with a sphere's at the same 'size' — the two are different lengths.",
        "Forgetting that units matter: a ratio in per micrometre is a thousand times one in per "
        "millimetre.",
    ],
    faq=[
        ("Why do cells stay small?",
         "Because the surface to volume ratio falls as size rises, and beyond a point the membrane "
         "cannot import nutrients or export waste fast enough."),
        ("What is the A/V ratio of a 2 µm coccus?",
         "3/(1 µm) = 3 µm⁻¹."),
    ],
    related=[("/biology/cell-density", "Cell density"),
             ("/biology/bacterial-growth-curve", "Growth curve"),
             ("/biology/osmolarity-osmotic-pressure", "Osmolarity")],
    svg=("curve", {"caption": "The ratio falls as 1/size — the geometric reason cells divide."}),
    icon="cell",
))
