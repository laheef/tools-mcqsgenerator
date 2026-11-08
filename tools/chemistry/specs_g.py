"""Batch 5a — the analytical and water group."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="beer-lambert-law",
        name="Beer-Lambert Law Calculator",
        title="Beer-Lambert Law Calculator: Absorbance and T",
        desc="Turn a molar absorptivity, a concentration and a path length into an absorbance, and read off the transmittance and the fraction of light the sample absorbed.",
        what=("<p>Absorbance is proportional to how much light-absorbing material the beam passes "
              "through: <strong>A = ε·c·l</strong>. The page reports the absorbance, the transmitted "
              "fraction as a percentage, and how much light the sample removed.</p>"),
        fields=[
            F("absorptivity", "Molar absorptivity ε", "L/(mol·cm)", 15000,
              "A property of the substance at that wavelength; 15 000 is a strong chromophore"),
            F("concentration", "Concentration", "mol/L", 0.0002,
              "0.2 mmol/L"),
            F("path_length", "Path length", "cm", 1,
              "1 cm is the standard cuvette"),
        ],
        results=[
            R("absorbance", "Absorbance", ""),
            R("transmittance", "Transmittance", "%"),
            R("absorbed", "Light absorbed", "%"),
        ],
        formula={
            "absorbance": "absorptivity*concentration*path_length",
            "transmittance": "pow(10,-(absorptivity*concentration*path_length))*100",
            "absorbed": "(1-pow(10,-(absorptivity*concentration*path_length)))*100",
            "absorptivity": "absorbance/(concentration*path_length)",
            "concentration": "absorbance/(absorptivity*path_length)",
            "path_length": "absorbance/(absorptivity*concentration)",
        },
        prose={
            "why": ("<p>Almost every quantitative measurement in a spectrophotometer rests on this one "
                    "linear relation. It converts a number the instrument prints — absorbance — into a "
                    "concentration, which is the quantity the experiment is actually about.</p>"),
            "formula_note": ("<p>Absorbance is logarithmic, so it adds along the path: two identical "
                             "cuvettes in series double the absorbance but multiply the transmitted light "
                             "by a hundredth. That is why the law is linear in c and l but the "
                             "transmittance is exponential.</p>"),
            "example_note": ("<p>ε = 15 000, c = 0.2 mmol/L, l = 1 cm: A = 3.0, so one photon in a thousand "
                             "gets through — 0.1 per cent transmittance. Absorbances above about 2 are "
                             "usually too dark to measure reliably, which is why the sample would be "
                             "diluted.</p>"),
            "reading": ("<p>Keep the absorbance between roughly 0.1 and 1.0. Below 0.1 the noise in the "
                        "detector dominates; above 1.5 stray light starts to flatten the curve and the "
                        "linear relation fails, so the answer drifts low.</p>"),
            "scenarios": [
                {"inputs": {"absorptivity": 6220, "concentration": 0.0001, "path_length": 1},
                 "note": "NADH at 340 nm: 6 220 L/(mol·cm) and 0.1 mmol/L gives A = 0.622, a comfortable "
                         "reading."},
                {"inputs": {"absorptivity": 15000, "concentration": 0.00004, "path_length": 1},
                 "note": "Diluting ten-fold leaves A = 0.60 — the same sample, back inside the reliable "
                         "range."},
            ],
            "pitfalls": [
                "<strong>Transmittance read as absorbance.</strong> A = −log₁₀T; a transmittance of 10 per "
                "cent is an absorbance of 1, not of 10.",
                "<strong>Concentration in mmol/L.</strong> ε is per mole; using millimoles in the c box "
                "makes the absorbance a thousand times too small.",
                "<strong>Absorbance beyond the linear range.</strong> Above about 1.5 the instrument's "
                "stray light bends the curve and the concentration comes out low.",
            ],
            "units_note": ("<p>Molar absorptivity in litres per mole per centimetre, concentration in moles "
                           "per litre and path length in centimetres give a dimensionless absorbance. A "
                           "path in millimetres has to be divided by ten first.</p>"),
            "limits": [
                "<strong>Dilute solutions only.</strong> Above about 10 mmol/L, solute interactions shift "
                "the spectrum and the law stops being linear.",
                "<strong>One absorbing species at a time.</strong> A mixture's absorbance is the sum of its "
                "components, which is what makes multi-wavelength analysis possible and this page "
                "insufficient on its own.",
            ],
            "uses": [
                "<li>Converting a plate-reader absorbance into a concentration.</li>",
                "<li>Choosing a dilution so a sample lands in the linear range.</li>",
                "<li>Finding an extinction coefficient from a known standard.</li>",
            ],
        },
        faq=[
            ("Why is absorbance not just a percentage?",
             "Because the transmitted light falls exponentially with concentration. The logarithm turns "
             "that curve into a straight line, and a straight line is what a calibration uses."),
            ("What is a typical molar absorptivity?",
             "From a few hundred for a weak chromophore to over 100 000 for a strong dye. Proteins at "
             "280 nm are around 40 000 per molar concentration of the whole molecule."),
        ],
        related=[("/chemistry/calibration-curve", "Calibration curve"),
                 ("/chemistry/concentration", "Concentration"),
                 ("/chemistry/molarity", "Molarity")],
    ),

    S(
        slug="calibration-curve",
        name="Calibration Curve Calculator",
        title="Calibration Curve Calculator: Line From Standards",
        desc="Fit a straight line through three standards, read the sample's concentration back off it, and see the correlation coefficient that says whether it is usable.",
        what=("<p>Three standards define a straight line by least squares, and the sample's signal is read "
              "back off it: <strong>c = (signal − intercept) ÷ slope</strong>. The page reports the slope, "
              "the intercept, R² and the concentration the sample corresponds to.</p>"),
        fields=[
            F("x1", "Concentration of standard 1", "mg/L", 0.1, "The lowest standard"),
            F("y1", "Signal of standard 1", "", 0.12, "Absorbance or peak area"),
            F("x2", "Concentration of standard 2", "mg/L", 0.5, "A middle standard"),
            F("y2", "Signal of standard 2", "", 0.55, ""),
            F("x3", "Concentration of standard 3", "mg/L", 1.0, "The highest standard"),
            F("y3", "Signal of standard 3", "", 1.08, ""),
            F("sample_signal", "Signal of the sample", "", 0.72, "Measured the same way as the standards"),
        ],
        results=[
            R("concentration", "Concentration of the sample", "mg/L"),
            R("slope", "Slope of the line", "per mg/L"),
            R("intercept", "Intercept", ""),
            R("r_squared", "R²", ""),
            R("mean_x", "Mean concentration of the standards", "mg/L"),
            R("mean_y", "Mean signal of the standards", ""),
        ],
        formula={
            "mean_x": "(x1+x2+x3)/3",
            "mean_y": "(y1+y2+y3)/3",
            "slope": "((x1-mean_x)*(y1-mean_y)+(x2-mean_x)*(y2-mean_y)+(x3-mean_x)*(y3-mean_y))/(pow(x1-mean_x,2)+pow(x2-mean_x,2)+pow(x3-mean_x,2))",
            "intercept": "mean_y-slope*mean_x",
            "concentration": "(sample_signal-intercept)/slope",
            "r_squared": "pow(slope,2)*(pow(x1-mean_x,2)+pow(x2-mean_x,2)+pow(x3-mean_x,2))/(pow(y1-mean_y,2)+pow(y2-mean_y,2)+pow(y3-mean_y,2))",
        },
        prose={
            "why": ("<p>A calibration curve is how an instrument is made quantitative. The standards "
                    "convert a signal into a concentration, and the correlation coefficient says whether "
                    "that conversion is worth trusting.</p>"),
            "formula_note": ("<p>Least squares finds the line that minimises the squared vertical "
                             "distances from the three points. With only three standards the arithmetic is "
                             "short enough to check by hand, which is why three is the usual minimum in a "
                             "teaching lab.</p>"),
            "example_note": ("<p>Standards at 0.1, 0.5 and 1.0 mg/L giving 0.12, 0.55 and 1.08: the slope "
                             "is about 1.07 per mg/L and the intercept near 0.01. A sample reading 0.72 "
                             "sits at roughly 0.66 mg/L, and an R² that rounds to 1.000 says the three points are "
                             "almost exactly on one line.</p>"),
            "reading": ("<p>An R² below about 0.995 with three points means something went wrong with a "
                        "standard rather than that the chemistry is curved. Re-run the outlier before "
                        "trusting the sample's number.</p>"),
            "scenarios": [
                {"inputs": {"x1": 1, "y1": 0.2, "x2": 2, "y2": 0.4, "x3": 3, "y3": 0.6,
                            "sample_signal": 0.5},
                 "note": "A perfect line through the origin: slope 0.2, intercept 0, and a signal of 0.5 "
                         "is 2.5 mg/L."},
                {"inputs": {"x1": 0, "y1": 0.05, "x2": 5, "y2": 0.53, "x3": 10, "y3": 1.01,
                            "sample_signal": 0.77},
                 "note": "A blank with a real signal offsets the intercept to about 0.05, which is why a "
                         "blank is included even when it reads zero."},
            ],
            "pitfalls": [
                "<strong>The blank left out.</strong> A reagent blank shifts the intercept, and every "
                "sample concentration then inherits that offset.",
                "<strong>R² read as accuracy.</strong> Three points can sit perfectly on a line that is "
                "wrong because every standard was made up at the wrong concentration.",
                "<strong>Extrapolating past the standards.</strong> A sample reading above the top "
                "standard is outside the tested range, however straight the line looks.",
            ],
            "units_note": ("<p>The standards' concentrations and the sample's answer share a unit; the "
                           "signal and the intercept share theirs. The slope carries signal per "
                           "concentration unit, and R² is dimensionless.</p>"),
            "limits": [
                "<strong>Three points only.</strong> Three standards cannot show curvature; five or six "
                "across the range can.",
                "<strong>It assumes the relation is linear.</strong> Where the chemistry is not — "
                "immunoassays at low concentration, for instance — a straight line is the wrong model.",
            ],
            "uses": [
                "<li>Turning an absorbance into a concentration against standards.</li>",
                "<li>Checking whether a set of standards is linear at all.</li>",
                "<li>Estimating the detection limit from the slope and the blank's noise.</li>",
            ],
        },
        faq=[
            ("How many standards do I need?",
             "Three is the minimum for a line with a check; five is the usual number in practice. Three "
             "cannot detect curvature, only gross error."),
            ("What R² is good enough?",
             "Above 0.995 for a three-point calibration. Above 0.999 is what a well-made set of standards "
             "should give."),
        ],
        related=[("/chemistry/beer-lambert-law", "Beer-Lambert law"),
                 ("/chemistry/concentration", "Concentration"),
                 ("/chemistry/serial-dilution", "Serial dilution")],
    ),

    S(
        slug="chemical-oxygen-demand",
        name="COD Calculator",
        title="Chemical Oxygen Demand Calculator: From Titration",
        desc="Convert a dichromate blank and sample titration into chemical oxygen demand in milligrams per litre, together with the oxygen mass the sample itself consumed.",
        what=("<p>COD is found by the difference between a blank and a sample titration: "
              "<strong>COD = (V<sub>blank</sub> − V<sub>sample</sub>) × M × 8000 ÷ V</strong>, with the "
              "titres in millilitres and M the molarity of the ferrous ammonium sulfate.</p>"),
        fields=[
            F("blank_titre", "Titre of the blank", "mL", 25.0,
              "Dichromate with no sample in it"),
            F("sample_titre", "Titre of the sample", "mL", 16.5,
              "The same digestion with the sample"),
            F("fas_molarity", "Molarity of the titrant", "mol/L", 0.1,
              "Ferrous ammonium sulfate, standardised daily"),
            F("sample_volume", "Volume of sample digested", "mL", 20,
              "The portion that went into the digestion tube"),
        ],
        results=[
            R("cod", "Chemical oxygen demand", "mg/L"),
            R("oxygen_mass", "Oxygen consumed by the sample", "mg"),
            R("cod_g_per_l", "Chemical oxygen demand", "g/L"),
        ],
        formula={
            "cod": "(blank_titre-sample_titre)*fas_molarity*8000/sample_volume",
            "oxygen_mass": "(blank_titre-sample_titre)*fas_molarity*8000/sample_volume*sample_volume/1000",
            "cod_g_per_l": "(blank_titre-sample_titre)*fas_molarity*8000/sample_volume/1000",
            "blank_titre": "sample_titre+cod*sample_volume/(fas_molarity*8000)",
            "sample_titre": "blank_titre-cod*sample_volume/(fas_molarity*8000)",
            "fas_molarity": "cod*sample_volume/((blank_titre-sample_titre)*8000)",
            "sample_volume": "(blank_titre-sample_titre)*fas_molarity*8000/cod",
        },
        prose={
            "why": ("<p>COD is the single number a wastewater plant is permitted against. It measures "
                    "everything oxidisable in a water sample — not just what bacteria would eat — and it "
                    "takes two hours rather than the five days BOD needs.</p>"),
            "formula_note": ("<p>The 8000 combines the oxygen equivalent of one mole of electrons with the "
                             "milligram-to-gram conversion: 1 mL of 1 M reductant corresponds to 8 mg of "
                             "oxygen, and the factor carries the thousand for millilitres and the "
                             "thousand for milligrams at once.</p>"),
            "example_note": ("<p>A blank at 25.0 mL against a sample at 16.5 mL, with 0.1 M titrant and a "
                             "20 mL sample: the difference is 8.5 mL, which is 340 mg/L of COD, or 6.8 mg "
                             "of oxygen for the portion digested.</p>"),
            "reading": ("<p>Untreated domestic sewage sits near 400–600 mg/L; a plant's discharge consent "
                        "is usually 125 mg/L or lower. A sample above 1 000 mg/L is normally diluted before "
                        "digestion, and the dilution factor multiplies the answer.</p>"),
            "scenarios": [
                {"inputs": {"blank_titre": 25, "sample_titre": 20, "fas_molarity": 0.1,
                            "sample_volume": 20},
                 "note": "A five millilitre difference is 200 mg/L — a weak but not clean effluent."},
                {"inputs": {"blank_titre": 25, "sample_titre": 25, "fas_molarity": 0.1,
                            "sample_volume": 20},
                 "note": "Identical titres are zero COD: nothing in the sample reduced any dichromate."},
            ],
            "pitfalls": [
                "<strong>The titres the wrong way round.</strong> Sample minus blank is negative, and a "
                "negative COD means the numbers were swapped.",
                "<strong>Chloride not masked.</strong> Chloride is oxidised by dichromate and inflates the "
                "result; mercuric sulfate is added to suppress it.",
                "<strong>Dilution forgotten.</strong> A diluted sample's COD must be multiplied by the "
                "dilution factor, not divided by it.",
            ],
            "units_note": ("<p>Both titres in millilitres and the sample in millilitres, with molarity in "
                           "moles per litre, give milligrams per litre directly. The second result is the "
                           "mass of oxygen for the sample portion and the third is the same demand in "
                           "grams per litre.</p>"),
            "limits": [
                "<strong>It measures everything oxidisable.</strong> A high COD with a low BOD means the "
                "sample holds material biology cannot touch.",
                "<strong>It needs a matched blank.</strong> The blank carries the reagents through the "
                "same digestion, and a stale blank poisons every result that day.",
            ],
            "uses": [
                "<li>Reporting an effluent against its discharge consent.</li>",
                "<li>Estimating the load a treatment works has to handle.</li>",
                "<li>Checking a reagent batch with a standard such as potassium hydrogen phthalate.</li>",
            ],
        },
        faq=[
            ("What is the difference between COD and BOD?",
             "COD oxidises everything chemically, in two hours. BOD measures what microorganisms consume, "
             "in five days. COD is always the larger of the two."),
            ("Why is the factor 8000?",
             "Half a mole of oxygen takes one mole of electrons, so 1 mL of 1 M titrant corresponds to 8 mg "
             "of oxygen. The 8000 is that 8 multiplied by the two thousands in the units."),
        ],
        related=[("/chemistry/tds", "TDS"),
                 ("/chemistry/water-hardness", "Water hardness"),
                 ("/chemistry/concentration", "Concentration")],
    ),

    S(
        slug="tds",
        name="TDS Calculator",
        title="TDS Calculator: From Electrical Conductivity",
        desc="Convert a water sample's electrical conductivity into total dissolved solids in milligrams per litre, using the conversion factor your water type calls for.",
        what=("<p>Dissolved ions conduct electricity, so conductivity is a proxy for total dissolved "
              "solids: <strong>TDS = k × EC</strong>, with EC in microsiemens per centimetre and k "
              "between about 0.5 and 0.7 depending on the water's chemistry.</p>"),
        fields=[
            F("conductivity", "Electrical conductivity", "µS/cm", 500,
              "Measured at 25 °C, temperature-corrected"),
            F("factor", "Conversion factor k", "", 0.64,
              "0.55 for high-sodium water, 0.65 for mixed, 0.7 for chloride-rich", bounds=(0.4, 0.9)),
        ],
        results=[
            R("tds", "Total dissolved solids", "mg/L"),
            R("tds_g_per_l", "Total dissolved solids", "g/L"),
            R("grains_per_gallon", "Hardness as grains per gallon", "gpg"),
        ],
        formula={
            "tds": "conductivity*factor",
            "tds_g_per_l": "conductivity*factor/1000",
            "grains_per_gallon": "conductivity*factor/17.118",
            "conductivity": "tds/factor",
            "factor": "tds/conductivity",
        },
        prose={
            "why": ("<p>Conductivity is cheap, instant and continuous, which is why nearly every water "
                    "treatment plant logs it. TDS is what the specification is written in, so the "
                    "conversion between them is a number a plant uses every shift.</p>"),
            "formula_note": ("<p>The factor is not a constant of nature: it depends on which ions carry "
                             "the current. Sodium and chloride are poor conductors per milligram, calcium "
                             "and sulfate are better, so the same conductivity can mean a different mass "
                             "of dissolved solids. That is why the box lets you set it.</p>"),
            "example_note": ("<p>500 µS/cm at 0.65 is 325 mg/L. Drinking water is usually held under 500 "
                             "mg/L, seawater is around 35 000, and irrigation guidelines sit near 1 000 for "
                             "sensitive crops.</p>"),
            "reading": ("<p>For a first estimate use 0.5 to 0.55 for water dominated by sodium chloride, "
                        "and 0.65 to 0.7 where calcium and magnesium sulfates dominate. For most municipal "
                        "supplies 0.65 is close enough to keep a plant inside its specification.</p>"),
            "scenarios": [
                {"inputs": {"conductivity": 2000, "factor": 0.55},
                 "note": "Brackish, sodium-rich water: 1 100 mg/L, not the 1 300 a 0.65 factor would "
                         "suggest."},
                {"inputs": {"conductivity": 342, "factor": 0.65},
                 "note": "A clean municipal supply reads about 222 mg/L — well inside the 500 mg/L "
                         "guideline."},
            ],
            "pitfalls": [
                "<strong>The factor used as a constant.</strong> A plant that changes its raw water source "
                "without re-deriving k reports the wrong TDS.",
                "<strong>Temperature uncorrected.</strong> Conductivity rises about 2 per cent per degree; "
                "an uncorrected 30 °C reading overstates TDS by around a tenth.",
                "<strong>TDS treated as salinity.</strong> Conductivity sees only charged species, so "
                "uncharged dissolved organics and silica are invisible to it.",
            ],
            "units_note": ("<p>Microsiemens per centimetre times a dimensionless factor gives milligrams per "
                           "litre, which is numerically the same as parts per million in water this dilute. "
                           "The third result converts to grains per gallon, the unit US water softeners "
                           "are sold in.</p>"),
            "limits": [
                "<strong>It cannot see non-conductors.</strong> Sugars, alcohols and many organics dissolve "
                "without adding TDS by this method.",
                "<strong>It over-reads at high concentration.</strong> Above about 10 000 mg/L the relation "
                "between conductivity and mass bends.",
            ],
            "uses": [
                "<li>Estimating TDS from a conductivity meter reading.</li>",
                "<li>Setting a softener's regeneration schedule.</li>",
                "<li>Checking irrigation water against a crop's tolerance.</li>",
            ],
        },
        faq=[
            ("Is TDS the same as salinity?",
             "No. Salinity is a measure of dissolved salts specifically, while TDS counts every dissolved "
             "solid the conductivity sees. For seawater the two are close; for a sugary drink they are "
             "not."),
            ("Why does my meter read TDS directly?",
             "Because it is a conductivity meter with this multiplication built in, and it uses a fixed "
             "factor. If your water is unusual, the lab's own factor is better."),
        ],
        related=[("/chemistry/water-hardness", "Water hardness"),
                 ("/chemistry/chemical-oxygen-demand", "COD"),
                 ("/chemistry/ppm-to-molarity", "PPM to molarity")],
    ),

    S(
        slug="water-hardness",
        name="Water Hardness Calculator",
        title="Water Hardness Calculator: Calcium and Magnesium",
        desc="Turn calcium and magnesium concentrations into total hardness expressed as calcium carbonate, in the units that a softener or a water report uses every day.",
        what=("<p>Hardness is reported as the equivalent mass of calcium carbonate, so both ions are "
              "converted onto one scale: <strong>hardness = (Ca ÷ 40.08 + Mg ÷ 24.31) × 100.09</strong>, "
              "with the concentrations in milligrams per litre.</p>"),
        fields=[
            F("calcium", "Calcium concentration", "mg/L", 80,
              "As Ca²⁺, from a water report or an EDTA titration"),
            F("magnesium", "Magnesium concentration", "mg/L", 24,
              "As Mg²⁺"),
        ],
        results=[
            R("hardness", "Total hardness as CaCO₃", "mg/L"),
            R("hardness_mmol", "Hardness", "mmol/L"),
            R("grains", "Hardness", "gpg"),
        ],
        formula={
            "hardness": "(calcium/40.078+magnesium/24.305)*100.09",
            "hardness_mmol": "calcium/40.078+magnesium/24.305",
            "grains": "(calcium/40.078+magnesium/24.305)*100.09/17.118",
            "calcium": "(hardness/100.09-magnesium/24.305)*40.078",
            "magnesium": "(hardness/100.09-calcium/40.078)*24.305",
        },
        prose={
            "why": ("<p>Hardness is what makes soap refuse to lather, kettles fur and boilers scale. "
                    "Because it is caused by two different ions, it is always expressed on a common scale "
                    "— as if all of it were calcium carbonate.</p>"),
            "formula_note": ("<p>Each ion's mass is divided by its molar mass to give millimoles, and the "
                             "sum is multiplied by the molar mass of calcium carbonate. That is why the "
                             "conversion factors are 2.5 for calcium and 4.1 for magnesium: one millimole "
                             "of either produces one millimole of carbonate equivalent.</p>"),
            "example_note": ("<p>80 mg/L calcium and 24 mg/L magnesium is 2.00 plus 0.99 millimoles, or "
                             "about 299 mg/L as CaCO₃ — firmly in the hard range, and about 17.5 grains "
                             "per gallon.</p>"),
            "reading": ("<p>Below 60 mg/L is soft, 60–120 is moderately hard, 120–180 is hard and above 180 "
                        "is very hard. Most municipal supplies sit between 100 and 300; groundwater from "
                        "limestone can exceed 400.</p>"),
            "scenarios": [
                {"inputs": {"calcium": 40, "magnesium": 12},
                 "note": "A moderately hard supply at about 150 mg/L — pleasant to drink and kind to "
                         "pipework."},
                {"inputs": {"calcium": 200, "magnesium": 48},
                 "note": "A limestone aquifer at 697 mg/L: softeners cannot keep up and the water needs "
                         "treatment before a boiler sees it."},
            ],
            "pitfalls": [
                "<strong>Calcium reported as CaCO₃ already.</strong> Many lab reports convert, and "
                "converting again multiplies the answer by 2.5.",
                "<strong>Magnesium ignored.</strong> In soft waters it is a minor contributor; in hard "
                "groundwater it can be a fifth of the total.",
                "<strong>Grains and mg/L mixed.</strong> A softener rated in grains per gallon and a "
                "report in milligrams per litre have to be converted before they can be compared.",
            ],
            "units_note": ("<p>Both inputs are in milligrams per litre and the main result is too, "
                           "expressed as calcium carbonate. The millimole figure is the carbonate "
                           "equivalent per litre, and grains per gallon is the US customary unit — "
                           "17.118 mg/L each.</p>"),
            "limits": [
                "<strong>It counts only calcium and magnesium.</strong> Strontium and iron add hardness "
                "but are usually minor; aluminium and silica are counted separately.",
                "<strong>Hardness is not the same as alkalinity.</strong> They are often similar, but a "
                "water can be hard and poorly buffered.",
            ],
            "uses": [
                "<li>Checking a supply against a softener's specification.</li>",
                "<li>Deciding whether a boiler needs pretreatment.</li>",
                "<li>Converting a lab report into the units a client uses.</li>",
            ],
        },
        faq=[
            ("Why report hardness as calcium carbonate?",
             "Because it is a mixture of ions and a single number is easier to specify against. Calcium "
             "carbonate is the traditional common denominator."),
            ("Does hard water harm you?",
             "No — it is a source of dietary calcium and magnesium. It is tough on appliances, not on "
             "people."),
        ],
        related=[("/chemistry/tds", "TDS"),
                 ("/chemistry/molarity", "Molarity"),
                 ("/chemistry/ppm-to-molarity", "PPM to molarity")],
    ),

    S(
        slug="ionic-strength",
        name="Ionic Strength Calculator",
        title="Ionic Strength Calculator: Three Ions at a Time",
        desc="Add up each dissolved ion's concentration weighted by the square of its charge to get the ionic strength that activity corrections and pH both depend on.",
        what=("<p>Ionic strength counts not just how much salt is dissolved but how strongly each ion "
              "interacts electrostatically: <strong>I = ½ Σ c·z²</strong>. A divalent ion counts four "
              "times as much as a monovalent one at the same concentration.</p>"),
        fields=[
            F("conc_1", "Concentration of ion 1", "mol/L", 0.1, "Sodium, in a 0.1 M NaCl solution"),
            F("charge_1", "Charge of ion 1", "", 1, "Magnitude only", bounds=(0, 4)),
            F("conc_2", "Concentration of ion 2", "mol/L", 0.1, "Chloride"),
            F("charge_2", "Charge of ion 2", "", 1, "Magnitude only", bounds=(0, 4)),
            F("conc_3", "Concentration of ion 3", "mol/L", 0, "Leave at zero for a two-ion salt"),
            F("charge_3", "Charge of ion 3", "", 1, "Magnitude only", bounds=(0, 4)),
        ],
        results=[
            R("ionic_strength", "Ionic strength", "mol/L"),
            R("contribution_1", "Contribution of the first ion", "mol/L"),
            R("contribution_2", "Contribution of the second ion", "mol/L"),
        ],
        formula={
            "ionic_strength": "0.5*(conc_1*pow(charge_1,2)+conc_2*pow(charge_2,2)+conc_3*pow(charge_3,2))",
            "contribution_1": "0.5*conc_1*pow(charge_1,2)",
            "contribution_2": "0.5*conc_2*pow(charge_2,2)",
            "conc_1": "(2*ionic_strength-conc_2*pow(charge_2,2)-conc_3*pow(charge_3,2))/pow(charge_1,2)",
            "conc_2": "(2*ionic_strength-conc_1*pow(charge_1,2)-conc_3*pow(charge_3,2))/pow(charge_2,2)",
            "conc_3": "(2*ionic_strength-conc_1*pow(charge_1,2)-conc_2*pow(charge_2,2))/pow(charge_3,2)",
        },
        prose={
            "why": ("<p>Every activity coefficient, every pH measured in salt water and every equilibrium "
                    "constant quoted in a buffer depends on ionic strength rather than on concentration. "
                    "It is the single variable that says how far a solution is from ideal.</p>"),
            "formula_note": ("<p>The half is there because the sum counts both signs and each ion pair "
                             "shares the effect. The charge is squared, which is why a 0.1 M solution of "
                             "sodium sulfate has three times the ionic strength of 0.1 M sodium "
                             "chloride.</p>"),
            "example_note": ("<p>0.1 M sodium chloride: each ion contributes 0.05, and the total ionic "
                             "strength is 0.1 mol/L. Calcium chloride at the same molarity gives "
                             "½(0.1 × 4 + 0.2 × 1) = 0.3 mol/L — three times as much, because the calcium "
                             "is divalent.</p>"),
            "reading": ("<p>Below 0.01 mol/L the Debye–Hückel limiting law holds. Between 0.01 and 0.1 "
                        "extended forms are needed, and above 0.5 — seawater, brine — activity "
                        "coefficients have to be measured rather than calculated.</p>"),
            "scenarios": [
                {"inputs": {"conc_1": 0.1, "charge_1": 2, "conc_2": 0.2, "charge_2": 1,
                            "conc_3": 0, "charge_3": 1},
                 "note": "Calcium chloride: 0.1 mol/L of the 2+ ion and 0.2 of the 1− gives I = 0.3."},
                {"inputs": {"conc_1": 0.05, "charge_1": 2, "conc_2": 0.05, "charge_2": 2,
                            "conc_3": 0, "charge_3": 1},
                 "note": "Magnesium sulfate at 0.05 M: I = 0.2, four times its molarity because both ions are "
                         "divalent."},
            ],
            "pitfalls": [
                "<strong>Charge signs included.</strong> The square removes the sign; entering −1 for an "
                "anion gives the same contribution as +1, which is correct, but summing signed charges "
                "first is not.",
                "<strong>Molarity used as ionic strength.</strong> They are equal only for a 1:1 salt at "
                "any concentration.",
                "<strong>Water's own ions ignored.</strong> They matter only below about 10⁻⁶ mol/L, but "
                "that is exactly where ultra-pure water chemistry lives.",
            ],
            "units_note": ("<p>Concentrations in moles per litre and charges as magnitudes give an ionic "
                           "strength in moles per litre, which is dimensionless in the Debye–Hückel "
                           "expressions because it appears inside a square root against a constant.</p>"),
            "limits": [
                "<strong>Three ions at a time.</strong> A full water analysis has ten or more; group them "
                "or use the summation directly.",
                "<strong>It says nothing about ion pairing.</strong> At high concentration, paired ions "
                "behave as uncharged species and the effective ionic strength is lower.",
            ],
            "uses": [
                "<li>Supplying the ionic strength an activity coefficient needs.</li>",
                "<li>Comparing buffers of the same molarity but different salts.</li>",
                "<li>Estimating how far a solution deviates from ideal behaviour.</li>",
            ],
        },
        faq=[
            ("Why is ionic strength not just total concentration?",
             "Because charge matters more than count. A divalent ion interacts four times as strongly as a "
             "monovalent one, and the square captures that."),
            ("What is the ionic strength of seawater?",
             "About 0.7 mol/L. That is well beyond the range where any simple theory works, which is why "
             "seawater chemistry uses measured activity coefficients."),
        ],
        related=[("/chemistry/activity-coefficient", "Activity coefficient"),
                 ("/chemistry/molarity", "Molarity"),
                 ("/chemistry/tds", "TDS")],
    ),

    S(
        slug="vapour-pressure-of-water",
        name="Water Vapour Pressure Calculator",
        title="Water Vapour Pressure Calculator: Antoine Equation",
        desc="Get the saturation vapour pressure of water at any temperature from 1 to 100 °C from the Antoine equation, in millimetres of mercury, kPa and atmospheres.",
        what=("<p>Water's saturation vapour pressure follows the Antoine equation: "
              "<strong>log₁₀ P = 8.07131 − 1730.63 ÷ (233.426 + T)</strong>, with P in millimetres of "
              "mercury and T in degrees Celsius. This page evaluates it and converts the result.</p>"),
        fields=[
            F("temperature", "Temperature", "°C", 25,
              "Between 1 and 100 °C, where these constants are fitted"),
        ],
        results=[
            R("pressure_mmhg", "Vapour pressure", "mmHg"),
            R("pressure_kpa", "Vapour pressure", "kPa"),
            R("pressure_atm", "Vapour pressure", "atm"),
        ],
        formula={
            "pressure_mmhg": "pow(10,8.07131-1730.63/(233.426+temperature))",
            "pressure_kpa": "pow(10,8.07131-1730.63/(233.426+temperature))*0.133322",
            "pressure_atm": "pow(10,8.07131-1730.63/(233.426+temperature))/760",
            "temperature": "1730.63/(8.07131-log10(pressure_mmhg))-233.426",
        },
        prose={
            "why": ("<p>Water's vapour pressure sets the humidity of every room, the drying rate of every "
                    "sample and the boiling point of every open vessel. Knowing it is what makes a "
                    "desiccator, a lyophilisator or a humidity chamber calculable rather than "
                    "rule-of-thumb.</p>"),
            "formula_note": ("<p>The Antoine equation is an empirical fit to measured data rather than a "
                             "theoretical law, which is why the three constants are quoted with a range of "
                             "validity. These are for 1–100 °C; outside that the error grows.</p>"),
            "example_note": ("<p>At 25 °C: 23.7 mmHg, which is 3.16 kPa and 0.0312 atm — the familiar "
                             "figure behind relative humidity. At 100 °C it reaches 760 mmHg, which is the "
                             "definition of the normal boiling point.</p>"),
            "reading": ("<p>Relative humidity is the actual vapour pressure divided by this saturation "
                        "value. A room at 25 °C holding 1.6 kPa of water vapour is at 50 per cent "
                        "humidity, and cooling it to 14 °C brings it to saturation and the dew point.</p>"),
            "scenarios": [
                {"inputs": {"temperature": 20},
                 "note": "At 20 °C the saturation pressure is 17.5 mmHg, or 2.34 kPa — a comfortable "
                         "indoor humidity at about 1.2 kPa."},
                {"inputs": {"temperature": 37},
                 "note": "Body temperature: 46.9 mmHg, or 6.26 kPa, which is why exhaled air condenses on "
                         "a cold mirror."},
            ],
            "pitfalls": [
                "<strong>Kelvin entered.</strong> The Antoine constants here are for Celsius; entering "
                "298.15 evaluates the fit far outside its range.",
                "<strong>Saturation confused with actual pressure.</strong> This is the maximum the air "
                "can hold at that temperature, not what is in it.",
                "<strong>Supercooled water.</strong> Below 0 °C the fit still returns a number, but the "
                "true value needs the ice constants, not these.",
            ],
            "units_note": ("<p>The temperature is Celsius and the first result is in millimetres of mercury, "
                           "the unit the constants were fitted in. The kilopascal and atmosphere results "
                           "are conversions, and 1 atm is exactly 760 mmHg.</p>"),
            "limits": [
                "<strong>Valid from 1 to 100 °C.</strong> Above the boiling point the pressure rises faster "
                "than this fit describes.",
                "<strong>Pure water only.</strong> A solution's vapour pressure is lower — that is Raoult's "
                "law — and a salt solution lowers it further.",
            ],
            "uses": [
                "<li>Converting a relative humidity to an absolute vapour pressure.</li>",
                "<li>Finding the dew point of a room by cooling its air.</li>",
                "<li>Checking the pressure inside a vacuum desiccator.</li>",
            ],
        },
        faq=[
            ("Why does water boil at 100 °C?",
             "Because that is the temperature at which its vapour pressure reaches one atmosphere. Lower "
             "the external pressure and it boils cooler; raise it and it boils hotter."),
            ("What is the vapour pressure at 0 °C?",
             "4.58 mmHg over ice, about 0.6 kPa. Water just above freezing shows the same value."),
        ],
        related=[("/chemistry/vapor-pressure", "Clausius-Clapeyron"),
                 ("/chemistry/boiling-point", "Boiling point"),
                 ("/chemistry/raoults-law", "Raoult's law")],
    ),

    S(
        slug="vapor-pressure",
        name="Vapour Pressure Calculator",
        title="Vapour Pressure Calculator: Clausius-Clapeyron",
        desc="Use the Clausius-Clapeyron equation to move a liquid's vapour pressure from one temperature to the next, from the enthalpy of vaporisation in kilojoules per mole.",
        what=("<p>Vapour pressure rises steeply with temperature, and the Clausius–Clapeyron equation "
              "connects two points on that curve: <strong>ln(P₂/P₁) = −ΔH<sub>vap</sub>/R · "
              "(1/T₂ − 1/T₁)</strong>. The page reports the second pressure and the ratio between them.</p>"),
        fields=[
            F("pressure_1", "Vapour pressure at T₁", "mmHg", 760,
              "One atmosphere at the normal boiling point"),
            F("temp_1", "Temperature T₁", "K", 373.15,
              "Water's normal boiling point"),
            F("enthalpy", "Enthalpy of vaporisation", "kJ/mol", 40.66,
              "Water is 40.66 kJ/mol at its boiling point"),
            F("temp_2", "Temperature T₂", "K", 298.15,
              "The temperature you want the pressure at"),
        ],
        results=[
            R("pressure_2", "Vapour pressure at T₂", "mmHg"),
            R("pressure_ratio", "Pressure ratio P₂/P₁", ""),
            R("pressure_2_kpa", "Vapour pressure at T₂", "kPa"),
        ],
        formula={
            "pressure_2": "pressure_1*exp(-enthalpy*1000/8.314*(1/temp_2-1/temp_1))",
            "pressure_ratio": "exp(-enthalpy*1000/8.314*(1/temp_2-1/temp_1))",
            "pressure_2_kpa": "pressure_1*exp(-enthalpy*1000/8.314*(1/temp_2-1/temp_1))*0.133322",
            "pressure_1": "pressure_2/exp(-enthalpy*1000/8.314*(1/temp_2-1/temp_1))",
            "enthalpy": "-8.314*log(pressure_2/pressure_1)/(1/temp_2-1/temp_1)/1000",
            "temp_1": "1/(1/temp_2+8.314*log(pressure_2/pressure_1)/enthalpy/1000)",
            "temp_2": "1/(1/temp_1-8.314*log(pressure_2/pressure_1)/enthalpy/1000)",
        },
        prose={
            "why": ("<p>The Clausius–Clapeyron equation is why a pressure cooker works, why water boils "
                    "cooler in the mountains, and why a solvent evaporates in a rotavap but not on the "
                    "bench. One equation ties all three together.</p>"),
            "formula_note": ("<p>The temperatures enter as reciprocals and must be in kelvin. The enthalpy "
                             "is per mole and needs to match R's joules, which is what the thousand does. "
                             "Because the left side is a logarithm, a pressure change of a factor of ten is "
                             "only about 2.3 in the exponent.</p>"),
            "example_note": ("<p>Water from 373.15 K to 298.15 K with ΔH 40.66 kJ/mol: the exponent is "
                             "about −3.30, so the pressure falls to 28 mmHg. The measured value is 23.8 — "
                             "the equation is good but not exact, because ΔH itself changes with "
                             "temperature.</p>"),
            "reading": ("<p>A large enthalpy means a steep curve and a large pressure change over a modest "
                        "temperature range. That is why water, with 40.66 kJ/mol, has a much steeper curve "
                        "than a volatile solvent at 30 kJ/mol.</p>"),
            "scenarios": [
                {"inputs": {"pressure_1": 760, "temp_1": 373.15, "enthalpy": 40.66, "temp_2": 323.15},
                 "note": "Water at 50 °C: 100 mmHg, about an eighth of an atmosphere."},
                {"inputs": {"pressure_1": 100, "temp_1": 300, "enthalpy": 32, "temp_2": 350},
                 "note": "A solvent with a 32 kJ/mol enthalpy raises it about six-fold over "
                         "fifty degrees."},
            ],
            "pitfalls": [
                "<strong>Celsius temperatures.</strong> The reciprocals need kelvin; 100 and 25 give a "
                "negative absolute temperature in the algebra.",
                "<strong>A constant enthalpy assumed.</strong> ΔHvap falls as temperature rises, so a wide "
                "extrapolation drifts.",
                "<strong>Logarithm base mixed.</strong> ln, not log₁₀ — the difference is a factor of 2.303 "
                "in the exponent.",
            ],
            "units_note": ("<p>Pressures can be in any unit as long as both are the same, because only the "
                           "ratio matters. The enthalpy is in kilojoules per mole and the temperatures in "
                           "kelvin; the output pressure follows the input's units.</p>"),
            "limits": [
                "<strong>Two points at a time.</strong> It assumes a straight line of ln P against 1/T, "
                "which holds over a moderate range and not across a phase change.",
                "<strong>It needs a known ΔH.</strong> Without a measured enthalpy of vaporisation, the "
                "equation has nothing to say.",
            ],
            "uses": [
                "<li>Finding a solvent's vapour pressure away from its boiling point.</li>",
                "<li>Working out a boiling point at a pressure you can reach in the lab.</li>",
                "<li>Deriving an enthalpy of vaporisation from two measured pressures.</li>",
            ],
        },
        faq=[
            ("Why is my answer lower than the handbook?",
             "Because ΔHvap is not constant: it falls by several per cent across the range. Using the "
             "value at the boiling point underestimates the low-temperature pressure."),
            ("Can I use this for a solid?",
             "Yes, with the enthalpy of sublimation instead. The algebra is identical; only the physical "
             "process and the constants change."),
        ],
        related=[("/chemistry/vapour-pressure-of-water", "Water vapour pressure"),
                 ("/chemistry/boiling-point", "Boiling point"),
                 ("/chemistry/boiling-point-altitude", "Boiling point at altitude")],
    ),

    S(
        slug="boiling-point",
        name="Boiling Point Calculator",
        title="Boiling Point Calculator: Boiling Under Any Pressure",
        desc="Find the temperature at which a liquid boils at a pressure other than one atmosphere, from its normal boiling point and its enthalpy of vaporisation in kJ/mol.",
        what=("<p>A liquid boils when its vapour pressure equals the surrounding pressure. Rearranging "
              "Clausius–Clapeyron gives the boiling temperature at any pressure: "
              "<strong>1/T = 1/T<sub>b</sub> − R·ln(P/P₀) ÷ ΔH<sub>vap</sub></strong>.</p>"),
        fields=[
            F("normal_bp", "Normal boiling point", "°C", 100,
              "At one atmosphere"),
            F("enthalpy", "Enthalpy of vaporisation", "kJ/mol", 40.66,
              "Water is 40.66 kJ/mol"),
            F("pressure", "External pressure", "kPa", 70,
              "101.325 is one atmosphere"),
        ],
        results=[
            R("boiling_point_c", "Boiling point", "°C"),
            R("boiling_point_k", "Boiling point", "K"),
            R("shift", "Shift from the normal boiling point", "K"),
        ],
        formula={
            "boiling_point_k": "1/(1/(normal_bp+273.15)-8.314*log(pressure/101.325)/(enthalpy*1000))",
            "boiling_point_c": "1/(1/(normal_bp+273.15)-8.314*log(pressure/101.325)/(enthalpy*1000))-273.15",
            "shift": "1/(1/(normal_bp+273.15)-8.314*log(pressure/101.325)/(enthalpy*1000))-(normal_bp+273.15)",
            "normal_bp": "1/(1/(boiling_point_k)+8.314*log(pressure/101.325)/(enthalpy*1000))-273.15",
            "enthalpy": "8.314*log(pressure/101.325)/(1/(normal_bp+273.15)-1/boiling_point_k)/1000",
            "pressure": "101.325*exp((1/(normal_bp+273.15)-1/boiling_point_k)*enthalpy*1000/8.314)",
        },
        prose={
            "why": ("<p>Boiling is not a property of a liquid alone; it is a relation between the liquid's "
                    "vapour pressure and what is pressing down on it. That is why a vacuum distillation "
                    "works at all and why a mountain camp cooks slowly.</p>"),
            "formula_note": ("<p>The normal boiling point anchors the curve at exactly one atmosphere, and "
                             "the enthalpy sets its slope. Everything else is the same equation rearranged "
                             "for temperature instead of for pressure.</p>"),
            "example_note": ("<p>Water at 70 kPa: 1/373.15 plus 8.314 × ln(0.691) ÷ 40 660 gives 1/368.1, "
                             "so it boils at 89.8 °C — a shift of about 10 K. At 20 kPa it would boil near "
                             "60 °C, which is the point of a vacuum line.</p>"),
            "reading": ("<p>Roughly, water's boiling point falls about 1 K per 3.5 kPa near atmospheric "
                        "pressure. At the top of Everest, 33 kPa, it boils at 71 °C — hot enough to cook "
                        "rice badly and not to make decent tea.</p>"),
            "scenarios": [
                {"inputs": {"normal_bp": 78.37, "enthalpy": 38.56, "pressure": 50},
                 "note": "Ethanol at 50 kPa boils at 61 °C instead of 78.4 — why a rotavap runs warm "
                         "water and still strips solvent quickly."},
                {"inputs": {"normal_bp": 100, "enthalpy": 40.66, "pressure": 101.325},
                 "note": "At exactly one atmosphere the shift is zero, which is the check to run on the "
                         "constants."},
            ],
            "pitfalls": [
                "<strong>Normal boiling point entered in kelvin.</strong> The box expects Celsius, and "
                "273.15 added twice makes the answer absurd.",
                "<strong>Gauge pressure used.</strong> A vacuum gauge reading −30 kPa is 71 kPa absolute, "
                "not 30.",
                "<strong>ΔH assumed constant.</strong> Over the range from one atmosphere to a hard "
                "vacuum it falls by several per cent, so the answer drifts at the extremes.",
            ],
            "units_note": ("<p>The normal boiling point is in Celsius and the pressures are absolute "
                           "kilopascals. The answer comes back in both scales, and the shift is in kelvin "
                           "— the same size as a Celsius degree.</p>"),
            "limits": [
                "<strong>No dissolved solutes.</strong> Boiling point elevation is a separate effect; this "
                "page describes the pure liquid.",
                "<strong>No superheating.</strong> A clean vessel can hold a liquid above its boiling point "
                "until it nucleates — the calculated value is where it boils, not where it must.",
            ],
            "uses": [
                "<li>Setting a vacuum distillation's temperature.</li>",
                "<li>Working out a cooking time at altitude.</li>",
                "<li>Checking whether a solvent can be stripped at a safe temperature.</li>",
            ],
        },
        faq=[
            ("Why does water boil at 71 °C on Everest?",
             "Because the summit pressure is about a third of an atmosphere, and vapour pressure matches "
             "it at 71 °C. The water is boiling; it is simply not hot enough to cook with."),
            ("Does boiling point depend on how much liquid there is?",
             "No, only on pressure and the liquid's identity. A teaspoon and a litre boil at the same "
             "temperature."),
        ],
        related=[("/chemistry/boiling-point-altitude", "Boiling point at altitude"),
                 ("/chemistry/vapour-pressure-of-water", "Water vapour pressure"),
                 ("/chemistry/boiling-point-elevation", "Boiling point elevation")],
    ),

    S(
        slug="boiling-point-altitude",
        name="Boiling Point at Altitude Calculator",
        title="Boiling Point at Altitude Calculator: Pressure and T",
        desc="Estimate the atmospheric pressure at a given altitude and the temperature at which water boils there, from the barometric formula and Clausius-Clapeyron.",
        what=("<p>Air pressure falls with height, and water's boiling point falls with it. The page "
              "applies the barometric formula for pressure and Clausius–Clapeyron for the boiling "
              "temperature that pressure gives.</p>"),
        fields=[
            F("altitude", "Altitude above sea level", "m", 1500,
              "Metres; a mountain valley or a highland city"),
            F("enthalpy", "Enthalpy of vaporisation", "kJ/mol", 40.66,
              "Water is 40.66 kJ/mol at 100 °C"),
        ],
        results=[
            R("pressure", "Atmospheric pressure", "kPa"),
            R("boiling_point", "Boiling point of water", "°C"),
            R("shift", "Shift from 100 °C", "K"),
        ],
        formula={
            "pressure": "101.325*exp(-altitude/8434.5)",
            "boiling_point": "1/(1/373.15-8.314*log((101.325*exp(-altitude/8434.5))/101.325)/(enthalpy*1000))-273.15",
            "shift": "1/(1/373.15-8.314*log((101.325*exp(-altitude/8434.5))/101.325)/(enthalpy*1000))-273.15-100",
            "altitude": "-8434.5*log(pressure/101.325)",
            "enthalpy": "-8.314*log(pressure/101.325)/(1/(boiling_point+273.15)-1/373.15)/1000",
            "pressure": "101.325*exp((1/373.15-1/(boiling_point+273.15))*enthalpy*1000/8.314)",
        },
        prose={
            "why": ("<p>Cooking instructions written at sea level produce undercooked food at 2 000 m, and "
                    "a steriliser set for 121 °C does not reach it. The reason is entirely pressure, and "
                    "both numbers follow from the altitude.</p>"),
            "formula_note": ("<p>The barometric formula assumes a standard atmosphere — 15 °C at sea level, "
                             "lapsing at 6.5 K per kilometre. Real weather moves the pressure by a few per "
                             "cent around that curve, which is worth about a degree of boiling point.</p>"),
            "example_note": ("<p>At 1 500 m the pressure is about 84.8 kPa, and water boils at 94.9 °C — a "
                             "shift of 5 K. That is enough to change a bread recipe and not enough to "
                             "sterilise anything that needs 121 °C.</p>"),
            "reading": ("<p>Rule of thumb: the boiling point drops about 1 °C per 300 m near sea level, and "
                        "faster at height. By 5 000 m the pressure is 56 kPa and water boils at 84 °C; at "
                        "the summit of Everest it is 71 °C.</p>"),
            "scenarios": [
                {"inputs": {"altitude": 0, "enthalpy": 40.66},
                 "note": "Sea level: 101.3 kPa and exactly 100 °C, which is the anchor both formulas are "
                         "built around."},
                {"inputs": {"altitude": 3000, "enthalpy": 40.66},
                 "note": "Three thousand metres: 70.9 kPa and a boiling point near 90 °C — pasta needs "
                         "several extra minutes."},
            ],
            "pitfalls": [
                "<strong>Altitude in feet.</strong> The formula expects metres; 5 000 feet entered as "
                "5 000 metres gives Everest-like pressure at a modest hill.",
                "<strong>A standard atmosphere assumed.</strong> A low-pressure weather system can cost two "
                "more degrees of boiling point at the same altitude.",
                "<strong>Boiling point read as cooking temperature.</strong> Food cooks at the water's "
                "temperature, so a lower boiling point means slower cooking, not less heat in the pan.",
            ],
            "units_note": ("<p>Altitude in metres, pressure in kilopascals and boiling point in Celsius, "
                           "with the shift in kelvin — the same size as a Celsius degree. The enthalpy is "
                           "in kilojoules per mole.</p>"),
            "limits": [
                "<strong>Water only, as written.</strong> The enthalpy is a field, so another liquid works "
                "if its own normal boiling point is substituted by hand.",
                "<strong>It ignores humidity and weather.</strong> Both move the pressure a little and the "
                "boiling point less.",
            ],
            "uses": [
                "<li>Adjusting a recipe for a high-altitude kitchen.</li>",
                "<li>Checking whether an autoclave can reach its set point locally.</li>",
                "<li>Explaining why a kettle takes longer to boil on a mountain.</li>",
            ],
        },
        faq=[
            ("Does water boil faster at altitude?",
             "It reaches boiling sooner but at a lower temperature, so food cooks more slowly. Boiling "
             "faster and cooking faster are not the same thing."),
            ("At what altitude does water boil at 90 °C?",
             "About 3 000 m, where the pressure is 70 kPa. The page will give the exact figure for any "
             "height you enter."),
        ],
        related=[("/chemistry/boiling-point", "Boiling point"),
                 ("/chemistry/vapour-pressure-of-water", "Water vapour pressure"),
                 ("/chemistry/boiling-point-elevation", "Boiling point elevation")],
    ),
]
