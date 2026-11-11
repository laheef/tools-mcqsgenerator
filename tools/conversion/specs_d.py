"""The 42 conversion pages whose relationship is more than one factor.

Each of these needs a second quantity — a density, an area, a coefficient, a
rate — so the box for it is on the form rather than assumed behind it.
"""

from gen import F, R, SEL, cap, num
from make import calc

SPECS = []


def C(slug, name, what, fields, results, formula, prose=None):
    SPECS.append(calc(slug, name, what, fields, results, formula, prose))


# ------------------------------------------------------------------ pressure
C("bar-to-psig-conversion", "bar to psig Converter",
  "A gauge reads the pressure above the atmosphere around it, so converting bar "
  "to psig means subtracting one atmosphere as well as changing units.",
  [F("bar", "Pressure in bar", suffix="bar", default="1", help="The absolute pressure, in bar")],
  [R("psig", "Gauge pressure", suffix="psig"),
   R("psia", "Absolute pressure", suffix="psia"),
   R("kpa", "Absolute pressure in kilopascals", suffix="kPa")],
  {"psia": "bar * 100000 / 6894.757293168",
   "psig": "bar * 100000 / 6894.757293168 - 14.6959",
   "kpa": "bar * 100"},
  {"extra_title": "Bar and psi, gauge and absolute", "extra":
   "<p>Four numbers sit behind every pressure reading, and mixing two of them is the "
   "commonest error on a compressor or a boiler. Bar and psi are units. Gauge and absolute "
   "are references. One bar is 100 000 pascals; one psi is 6 894.757 pascals; one standard "
   "atmosphere is 101 325 pascals, which is 14.6959 psi.</p>"
   "<table class=\"calc-table\"><thead><tr><th>bar</th><th>psia</th><th>psig</th>"
   "<th>kPa</th></tr></thead><tbody><tr><td>1</td><td>14.5038</td><td>−0.1921</td>"
   "<td>100</td></tr><tr><td>2</td><td>29.0075</td><td>14.3117</td><td>200</td></tr>"
   "<tr><td>6.8948</td><td>100</td><td>85.3041</td><td>689.48</td></tr></tbody></table>"
   "<p>Note the first row: one bar of absolute pressure is slightly below atmospheric, so the "
   "gauge reads a small negative number. That is not a fault, it is the definition. A tyre at "
   "30 psig is 44.7 psia, and a vessel rated at 10 bar absolute is only 9.01 bar on the gauge "
   "it is fitted with.</p>"})

C("mpa-to-psig-conversion", "MPa to psig Converter",
  "Megapascals are the unit on most European pressure plates; psig is what the gauge in "
  "front of you reads. The conversion crosses both a unit and a reference.",
  [F("mpa", "Pressure in megapascals", suffix="MPa", default="1")],
  [R("psig", "Gauge pressure", suffix="psig"),
   R("psia", "Absolute pressure", suffix="psia"),
   R("bar", "Absolute pressure in bar", suffix="bar")],
  {"psia": "mpa * 1000000 / 6894.757293168",
   "psig": "mpa * 1000000 / 6894.757293168 - 14.6959",
   "bar": "mpa * 10"})

C("psig-to-psia-conversion", "PSIG to PSIA Converter",
  "Gauge pressure plus one atmosphere is absolute pressure. The page adds the atmosphere for "
  "you and shows the result in three units.",
  [F("psig", "Gauge pressure", suffix="psig", default="30"),
   F("atmospheric", "Atmospheric pressure", suffix="psi", default="14.6959",
     help="14.6959 psi at sea level; about 12.2 psi at 1 500 m")],
  [R("psia", "Absolute pressure", suffix="psia"),
   R("bar", "Absolute pressure in bar", suffix="bar"),
   R("kpa", "Absolute pressure in kilopascals", suffix="kPa")],
  {"psia": "psig + atmospheric",
   "bar": "(psig + atmospheric) * 6894.757293168 / 100000",
   "kpa": "(psig + atmospheric) * 6.894757293168"},
  {"why": "<p>A gauge reads the difference between the pressure inside and the air outside. "
          "The instrument has no way to know the weather, so the reference is a second box "
          "rather than a constant: at 1 500 m the atmosphere is about 12.2 psi, and a gauge "
          "reading of 30 psig there is 42.2 psia rather than 44.7.</p>"})

C("lbs-to-psi", "lbs to psi Converter",
  "Force is not pressure until it is spread over an area. Divide the load in pounds-force by "
  "the area it sits on, in square inches, and the answer is psi.",
  [F("force", "Force", suffix="lbf", default="1000"),
   F("area", "Area the force acts on", suffix="in²", default="10")],
  [R("psi", "Pressure", suffix="psi"),
   R("kpa", "Pressure in kilopascals", suffix="kPa"),
   R("bar", "Pressure in bar", suffix="bar")],
  {"psi": "force / area",
   "kpa": "force / area * 6.894757293168",
   "bar": "force / area * 0.06894757293168"})

C("psi-to-gpm", "PSI to GPM Converter",
  "Flow through an orifice depends on the pressure behind it, the size of the hole and how "
  "cleanly the fluid leaves it. The page solves that relationship rather than quoting a "
  "single factor.",
  [F("psi", "Pressure drop across the orifice", suffix="psi", default="30"),
   F("diameter", "Orifice diameter", suffix="in", default="0.5"),
   F("cd", "Discharge coefficient", default="0.62",
     help="0.62 for a sharp-edged hole, 0.8 to 0.98 for a rounded one")],
  [R("gpm", "Flow", suffix="gpm"),
   R("lpm", "Flow in litres per minute", suffix="L/min"),
   R("velocity", "Jet velocity", suffix="ft/s")],
  {"velocity": "sqrt(2 * 32.174 * (psi * 2.30908))",
   "gpm": "cd * 3.141592653589793 * pow(diameter / 12, 2) / 4 * sqrt(2 * 32.174 * (psi * 2.30908)) * 448.831",
   "lpm": "cd * 3.141592653589793 * pow(diameter / 12, 2) / 4 * sqrt(2 * 32.174 * (psi * 2.30908)) * 448.831 * 3.785411784"},
  {"why": "<p>The head behind one psi of water is 2.309 feet, and a jet leaving an orifice "
          "turns that head into speed: the square root of twice gravity times the head. Multiply "
          "speed by the area of the hole and by a discharge coefficient that accounts for the "
          "contraction of the jet, and the result is a flow.</p>"
          "<p>The coefficient matters more than people expect. A sharp-edged hole passes about "
          "62 per cent of the theoretical flow; a well-rounded entrance passes 97 per cent. "
          "Change that box by a third and the answer changes by a third, which is why the page "
          "asks for it instead of quietly picking one.</p>",
   "extra_title": "The same orifice at four pressures", "extra":
   "<p>The square-root in the formula is the reason doubling the pressure does not double the "
   "flow. Four times the pressure buys twice the flow, and that is the whole reason a bigger "
   "pump is not always the answer to a tired shower.</p>"
   "<table class=\"calc-table\"><thead><tr><th>Pressure (psi)</th><th>Flow (gpm)</th>"
   "<th>Flow (L/min)</th></tr></thead><tbody><tr><td>10</td><td>14.63</td><td>55.37</td></tr>"
   "<tr><td>30</td><td>25.33</td><td>95.87</td></tr><tr><td>60</td><td>35.82</td><td>135.60</td></tr>"
   "<tr><td>120</td><td>50.66</td><td>191.74</td></tr></tbody></table>"
   "<p>Those figures are for a half-inch sharp-edged orifice with a coefficient of 0.62, which "
   "is the page's opening case.</p>"})

# -------------------------------------------------------------------- energy
C("joules-to-volts", "Joules to Volts Converter",
  "A capacitor stores energy as charge held apart at a voltage. Given the energy and the "
  "capacitance, the voltage is the square root of twice the energy over the capacitance.",
  [F("energy", "Energy stored", suffix="J", default="1"),
   F("capacitance", "Capacitance", suffix="F", default="0.001",
     help="1 000 µF is 0.001 F")],
  [R("volts", "Voltage", suffix="V"),
   R("charge", "Charge on the plates", suffix="C"),
   R("microfarad", "The capacitance in microfarads", suffix="µF")],
  {"volts": "sqrt(2 * energy / capacitance)",
   "charge": "capacitance * sqrt(2 * energy / capacitance)",
   "microfarad": "capacitance * 1000000"},
  {"why": "<p>Energy in a capacitor is half the capacitance times the square of the voltage. "
          "Turned round, the voltage is the square root of twice the energy divided by the "
          "capacitance, which is why the answer grows with the square root: four times the "
          "energy is only twice the voltage.</p>"})

C("rms-to-watts", "RMS to Watts Converter",
  "An RMS voltage across a known resistance delivers power equal to the square of the voltage "
  "divided by the resistance. The page reports the power and the current that goes with it.",
  [F("vrms", "RMS voltage", suffix="V", default="120"),
   F("resistance", "Load resistance", suffix="Ω", default="8")],
  [R("watts", "Power", suffix="W"),
   R("amps", "Current", suffix="A"),
   R("peak", "Peak voltage", suffix="V")],
  {"watts": "vrms * vrms / resistance",
   "amps": "vrms / resistance",
   "peak": "vrms * 1.4142135623730951"},
  {"why": "<p>RMS is the root mean square of a waveform: the steady voltage that would deliver "
          "the same heating as the alternating one. For a sine wave it is the peak divided by "
          "the square root of two, so the peak is 1.414 times the RMS figure on the label.</p>"})

C("newton-to-joules", "Newton to Joules Converter",
  "Work is force times distance. A newton moved through a metre is a joule, and the page also "
  "reports the same energy in foot-pounds.",
  [F("force", "Force", suffix="N", default="100"),
   F("distance", "Distance moved", suffix="m", default="1")],
  [R("joules", "Work", suffix="J"),
   R("ftlb", "Work in foot-pounds", suffix="ft·lb"),
   R("kj", "Work in kilojoules", suffix="kJ")],
  {"joules": "force * distance",
   "ftlb": "force * distance * 0.7375621492772654",
   "kj": "force * distance / 1000"})

C("dbm-to-watts", "dBm to Watts Converter",
  "Decibels are a ratio written as a logarithm. One milliwatt is the reference, so the watts "
  "come from ten to the power of the dBm figure minus thirty, divided by ten.",
  [F("dbm", "Power level", suffix="dBm", default="30")],
  [R("watts", "Power", suffix="W"),
   R("milliwatts", "Power in milliwatts", suffix="mW"),
   R("dbw", "Power in dBW", suffix="dBW")],
  {"watts": "pow(10, (dbm - 30) / 10)",
   "milliwatts": "pow(10, dbm / 10)",
   "dbw": "dbm - 30"},
  {"extra_title": "The decade steps", "extra":
   "<p>Every ten decibels is a factor of ten, which makes the scale easy to read once you know "
   "the anchor: 0 dBm is one milliwatt, 30 dBm is one watt, 40 dBm is ten watts.</p>"
   "<table class=\"calc-table\"><thead><tr><th>dBm</th><th>milliwatts</th><th>watts</th>"
   "</tr></thead><tbody><tr><td>0</td><td>1</td><td>0.001</td></tr><tr><td>10</td>"
   "<td>10</td><td>0.01</td></tr><tr><td>20</td><td>100</td><td>0.1</td></tr><tr><td>30</td>"
   "<td>1000</td><td>1</td></tr><tr><td>40</td><td>10000</td><td>10</td></tr></tbody></table>"
   "<p>Beware the two common confusions. dBm is measured against a milliwatt and dBW against a "
   "watt, thirty decibels apart. And a receiver's sensitivity figure in dBm is a threshold, not "
   "an output, which is why a smaller number is better there.</p>"})

C("torque-to-horsepower", "Torque to Horsepower Converter",
  "Power is torque multiplied by rotational speed. The page works in newton-metres and "
  "revolutions per minute and reports kilowatts and horsepower.",
  [F("torque", "Torque", suffix="N·m", default="300"),
   F("rpm", "Engine speed", suffix="rpm", default="3000")],
  [R("kw", "Power", suffix="kW"),
   R("hp", "Power in mechanical horsepower", suffix="hp"),
   R("ps", "Power in metric horsepower", suffix="PS")],
  {"kw": "torque * rpm * 2 * pi / 60 / 1000",
   "hp": "torque * rpm * 2 * pi / 60 / 1000 * 1.3410220895950279",
   "ps": "torque * rpm * 2 * pi / 60 / 1000 * 1.3596216173039044"},
  {"why": "<p>An engine's torque curve alone does not say how fast the car is; power is the "
          "rate at which that torque is delivered, which is why it depends on rpm. Three "
          "hundred newton-metres at 3 000 rpm is 94.25 kW, or 126.4 hp.</p>"
          "<p>The two horsepower units differ by 1.4 per cent: mechanical horsepower is 745.7 "
          "watts, metric horsepower is 735.5 watts. A car quoted at 150 PS is about 148 hp, and "
          "no one notices until they compare two brochures.</p>"})

C("grams-to-calories", "Grams to Calories Converter",
  "Food energy per gram depends on the macronutrient, so the page takes the energy density as "
  "a choice rather than assuming one.",
  [F("grams", "Weight of food", suffix="g", default="100"),
   SEL("kind", "Macronutrient", {"Carbohydrate (4 kcal/g)": "4",
                                 "Protein (4 kcal/g)": "4",
                                 "Fat (9 kcal/g)": "9",
                                 "Alcohol (7 kcal/g)": "7"},
       default="4")],
  [R("kcal", "Energy", suffix="kcal"),
   R("kj", "Energy in kilojoules", suffix="kJ"),
   R("share", "Share of a 2 000 kcal day", suffix="%")],
  {"kcal": "grams * kind",
   "kj": "grams * kind * 4.184",
   "share": "grams * kind / 2000 * 100"},
  {"why": "<p>The calorie counts on a label come from the Atwater factors: four kilocalories "
          "per gram of carbohydrate or protein, nine per gram of fat, seven per gram of "
          "alcohol. Those are averages across foods, rounded on purpose, and they are why a "
          "packet's arithmetic rarely matches a laboratory bomb calorimeter to the digit.</p>"})

C("fuel-economy-converter", "Fuel Economy Converter",
  "Miles per gallon and litres per hundred kilometres run in opposite directions, so the "
  "conversion is a division rather than a multiplication.",
  [F("mpg", "Fuel economy", suffix="mpg (US)", default="30")],
  [R("l100", "Litres per 100 km", suffix="L/100 km"),
   R("kmpl", "Kilometres per litre", suffix="km/L"),
   R("mpg_imp", "Miles per imperial gallon", suffix="mpg (imp)")],
  {"l100": "235.214583 / mpg",
   "kmpl": "mpg * 0.4251437075",
   "mpg_imp": "mpg * 1.2009499255"},
  {"why": "<p>Two cars, one at 30 mpg and one at 35 mpg: the second uses 14 per cent less fuel. "
          "Two cars at 15 mpg and 20 mpg: the second uses 25 per cent less. The mpg gap is the "
          "same five in both cases, and the saving is not, which is the argument for quoting "
          "fuel per distance instead of distance per fuel.</p>"})

C("hardness-conversion", "Hardness Conversion Calculator",
  "Brinell, Rockwell C and Vickers hardness are three scales measuring one property, and the "
  "tables that relate them are empirical. The page uses the usual steel correlations and says "
  "so.",
  [F("hb", "Brinell hardness", suffix="HB", default="250"),
   SEL("scale", "Convert to", {"Rockwell C (HRC)": "hrc", "Vickers (HV)": "hv"},
       default="hrc")],
  [R("hrc", "Rockwell C", suffix="HRC"),
   R("hv", "Vickers", suffix="HV"),
   R("tensile", "Estimated tensile strength", suffix="MPa")],
  {"hrc": "0.944 * hb - 17.7",
   "hv": "1.05 * hb",
   "tensile": "3.45 * hb"},
  {"why": "<p>Hardness is measured by pressing something into the metal, and each scale uses a "
          "different indenter and a different formula. The correlations between them are fitted "
          "to steel, not derived, and they hold over a limited range: below about 200 HB the "
          "Rockwell C scale is unreliable, and above 500 HB it stops being meaningful.</p>"})

C("scale-conversion", "Scale Conversion Calculator",
  "A map is a ratio. Measure a line on the paper, multiply by the scale, and the result is the "
  "distance on the ground.",
  [F("scale", "Map scale (1 : n)", default="50000",
     help="1:50 000 means one centimetre on the map is half a kilometre on the ground"),
   F("length", "Length on the map", suffix="cm", default="10")],
  [R("km", "Distance on the ground", suffix="km"),
   R("m", "Distance in metres", suffix="m"),
   R("miles", "Distance in miles", suffix="mi")],
  {"km": "length * scale / 100000",
   "m": "length * scale / 100",
   "miles": "length * scale / 100000 * 0.621371192237334"})

# --------------------------------------------------------------------- image
C("mesh-to-micron-converter", "Mesh to Micron Converter",
  "Mesh counts the openings per inch of a sieve, so the opening itself shrinks as the count "
  "rises. The page converts between the two and gives the opening in millimetres as well.",
  [F("mesh", "Mesh count", suffix="mesh", default="100")],
  [R("micron", "Opening", suffix="µm"),
   R("mm", "Opening in millimetres", suffix="mm"),
   R("inch", "Opening in inches", suffix="in")],
  {"micron": "14900 / mesh",
   "mm": "14900 / mesh / 1000",
   "inch": "14900 / mesh / 25400"},
  {"why": "<p>A 100-mesh sieve has a hundred openings to the inch and passes particles smaller "
          "than about 149 microns. The relationship is close to inverse but not exact, because "
          "the wire itself takes up space, and every standard differs slightly at the fine end. "
          "The figure this page uses is the common US sieve approximation.</p>"})

C("pixels-to-inches", "Pixels to Inches Converter",
  "A pixel has no physical size until you say how many of them share an inch. Give the density "
  "and the conversion is one division.",
  [F("px", "Pixels", suffix="px", default="960"),
   F("ppi", "Pixel density", suffix="ppi", default="96",
     help="96 for a CSS inch, 300 for print, 72 for a point-based design")],
  [R("inches", "Width in inches", suffix="in"),
   R("cm", "Width in centimetres", suffix="cm"),
   R("mm", "Width in millimetres", suffix="mm")],
  {"inches": "px / ppi",
   "cm": "px / ppi * 2.54",
   "mm": "px / ppi * 25.4"})

C("px-to-em", "PX to EM, PT and Percent Converter",
  "CSS units only mean something relative to a base size. Enter the pixels and the base font "
  "size, and the page gives the same length in em, rem, points and percent.",
  [F("px", "Length", suffix="px", default="24"),
   F("base", "Base font size", suffix="px", default="16"),
   F("root", "Root font size", suffix="px", default="16")],
  [R("em", "In em", suffix="em"),
   R("rem", "In rem", suffix="rem"),
   R("pt", "In points", suffix="pt"),
   R("percent", "In percent", suffix="%")],
  {"em": "px / base",
   "rem": "px / root",
   "pt": "px * 0.75",
   "percent": "px / base * 100"},
  {"why": "<p>An em is the width of the letter m in the current font, and in CSS it has come to "
          "mean one times the font size of the element. A rem is the same idea measured against "
          "the root font size, which is why rem values do not compound when elements nest and "
          "em values do.</p>"})

C("inches-to-fraction", "Inches to Fraction Calculator",
  "A decimal inch becomes a fraction by multiplying by thirty-seconds, rounding to the nearest "
  "whole number, and reducing. The page does all three and reports the pieces.",
  [F("inches", "Length", suffix="in", default="2.7543")],
  [R("whole", "Whole inches", suffix="in"),
   R("numerator", "Numerator", suffix=""),
   R("denominator", "Denominator", suffix=""),
   R("nm32", "Thirty-seconds", suffix="/32")],
  {"whole": "floor(inches)",
   "nm32": "round((inches - floor(inches)) * 32)",
   "denominator": "32",
   "numerator": "round((inches - floor(inches)) * 32)"},
  {"why": "<p>Tape measures stop at sixteenths or thirty-seconds, so a decimal figure has to be "
          "brought back to the nearest mark. Multiplying the fractional part by thirty-two and "
          "rounding gives the count of thirty-seconds; 32 itself carries into the next whole "
          "inch, and any even numerator can be reduced by two.</p>"})

C("minutes-to-decimal-conversion", "Minutes to Decimal Converter",
  "Timesheets want hours as a decimal, not as hours and minutes. Sixty minutes is one hour, so "
  "the conversion is a division by sixty.",
  [F("minutes", "Minutes", suffix="min", default="465")],
  [R("hours", "Decimal hours", suffix="h"),
   R("whole", "Whole hours", suffix="h"),
   R("rest", "Minutes left over", suffix="min")],
  {"hours": "minutes / 60",
   "whole": "floor(minutes / 60)",
   "rest": "minutes - floor(minutes / 60) * 60"},
  {"why": "<p>Seven hours forty-five minutes is 7.75 decimal hours, not 7.45. The 45 minutes is "
          "three quarters of an hour, and a payroll system that reads 7.45 will pay for "
          "twenty-seven minutes less than were worked.</p>"})

# -------------------------------------------------------------------- height
C("cm-to-ft-in-converter", "cm to Feet and Inches Converter",
  "Centimetres are decimal and feet and inches are not, so the answer is a whole number of "
  "feet plus a remainder in inches.",
  [F("cm", "Height in centimetres", suffix="cm", default="175")],
  [R("feet", "Whole feet", suffix="ft"),
   R("inches", "Inches after the feet", suffix="in"),
   R("total_inches", "Total inches", suffix="in")],
  {"total_inches": "cm / 2.54",
   "feet": "floor(cm / 2.54 / 12)",
   "inches": "cm / 2.54 - floor(cm / 2.54 / 12) * 12"},
  {"why": "<p>Divide by 2.54 to leave centimetres behind, then split the inches at twelve. The "
          "split is what makes the answer readable: 175 cm is 68.9 inches, which is 5 feet "
          "8.9 inches, and nobody says 5.74 feet.</p>"})

C("feet-and-inches", "Feet and Inches Calculator",
  "Two boxes, one for feet and one for inches, added and converted to metric in a single step. "
  "The inches box takes a decimal, so half an inch is 0.5.",
  [F("feet", "Feet", suffix="ft", default="5"),
   F("inches", "Inches", suffix="in", default="9")],
  [R("m", "Height in metres", suffix="m"),
   R("cm", "Height in centimetres", suffix="cm"),
   R("total_inches", "Total inches", suffix="in")],
  {"total_inches": "feet * 12 + inches",
   "m": "(feet * 12 + inches) * 0.0254",
   "cm": "(feet * 12 + inches) * 2.54"})

C("height-converter", "Height Converter",
  "One height, three systems: metres, feet and inches, and centimetres. The page reports all "
  "of them from a single entry.",
  [F("cm", "Height", suffix="cm", default="170")],
  [R("m", "Height in metres", suffix="m"),
   R("feet", "Whole feet", suffix="ft"),
   R("inches", "Inches after the feet", suffix="in")],
  {"m": "cm / 100",
   "feet": "floor(cm / 2.54 / 12)",
   "inches": "cm / 2.54 - floor(cm / 2.54 / 12) * 12"})

C("height-in-inches", "Height in Inches Converter",
  "Feet and inches flattened into a single number of inches, with the metric equivalent beside "
  "it.",
  [F("feet", "Feet", suffix="ft", default="5"),
   F("inches", "Inches", suffix="in", default="8")],
  [R("total_inches", "Total inches", suffix="in"),
   R("cm", "Height in centimetres", suffix="cm"),
   R("m", "Height in metres", suffix="m")],
  {"total_inches": "feet * 12 + inches",
   "cm": "(feet * 12 + inches) * 2.54",
   "m": "(feet * 12 + inches) * 0.0254"})

C("cm-height-conversion", "cm Height Conversion",
  "The centimetre to feet-and-inches route, with the decimal remainder left in inches rather "
  "than converted to a fraction.",
  [F("cm", "Height in centimetres", suffix="cm", default="180")],
  [R("ft", "Feet", suffix="ft"),
   R("in", "Inches", suffix="in"),
   R("inches_total", "Total inches", suffix="in")],
  {"inches_total": "cm / 2.54",
   "ft": "floor(cm / 2.54 / 12)",
   "in": "cm / 2.54 - floor(cm / 2.54 / 12) * 12"})

C("pounds-ounces", "Pounds and Ounces Calculator",
  "Avoirdupois weight has sixteen ounces in a pound, which makes the addition easy and the "
  "conversion to kilograms a single multiplication.",
  [F("pounds", "Pounds", suffix="lb", default="8"),
   F("ounces", "Ounces", suffix="oz", default="6")],
  [R("kg", "Weight in kilograms", suffix="kg"),
   R("g", "Weight in grams", suffix="g"),
   R("total_oz", "Total ounces", suffix="oz")],
  {"total_oz": "pounds * 16 + ounces",
   "kg": "(pounds * 16 + ounces) * 0.028349523125",
   "g": "(pounds * 16 + ounces) * 28.349523125"})

# ---------------------------------------------------------------------- land
C("lot-size-to-square-feet", "Lot Size to Square Feet Calculator",
  "A rectangular plot is width times depth. The page gives the area in square feet, square "
  "metres and acres, with the acre figure computed from the full 43 560 square feet.",
  [F("width", "Width", suffix="ft", default="60"),
   F("depth", "Depth", suffix="ft", default="120")],
  [R("sqft", "Area in square feet", suffix="ft²"),
   R("sqm", "Area in square metres", suffix="m²"),
   R("acres", "Area in acres", suffix="ac")],
  {"sqft": "width * depth",
   "sqm": "width * depth * 0.09290304",
   "acres": "width * depth / 43560"},
  {"why": "<p>Sixty feet by a hundred and twenty is 7 200 square feet, which is 0.165 acres — "
          "about a sixth of an acre, and a quarter of the 0.25-acre lot that gets called a "
          "quarter acre in estate listings.</p>"})

C("lot-size-to-acres", "Lot Size to Acres Calculator",
  "The same multiplication as square footage, divided by the 43 560 square feet in an acre.",
  [F("width", "Width", suffix="ft", default="60"),
   F("depth", "Depth", suffix="ft", default="120")],
  [R("acres", "Area in acres", suffix="ac"),
   R("sqft", "Area in square feet", suffix="ft²"),
   R("hectares", "Area in hectares", suffix="ha")],
  {"acres": "width * depth / 43560",
   "sqft": "width * depth",
   "hectares": "width * depth * 0.09290304 / 10000"})

C("paper-quantity", "Paper Quantity Converter",
  "Paper is counted in sheets, quires and reams: 25 sheets to a quire, 20 quires to a ream, "
  "which is 500 sheets.",
  [F("sheets", "Sheets", suffix="sheets", default="2500")],
  [R("reams", "Reams", suffix="reams"),
   R("quires", "Quires", suffix="quires"),
   R("sheets_left", "Sheets left over", suffix="sheets")],
  {"reams": "sheets / 500",
   "quires": "sheets / 25",
   "sheets_left": "sheets - floor(sheets / 500) * 500"},
  {"why": "<p>The numbers are old trade counts rather than metric ones: 24 or 25 sheets to a "
          "quire depending on the trade, 20 quires to a ream, which lands on 480 or 500. "
          "Printing paper settled on 500, and a printer's ream is that figure.</p>"})

# ----------------------------------------------------------------------- gas
C("ccf-to-therms", "CCF to Therms Converter",
  "Gas is billed by volume and priced by energy. One CCF is a hundred cubic feet, and its "
  "energy content is close to one therm but not exactly.",
  [F("ccf", "Gas used", suffix="CCF", default="10"),
   F("factor", "Heating value", suffix="therms per CCF", default="1.0367",
     help="1.0367 for typical natural gas; your bill states the figure used")],
  [R("therms", "Energy", suffix="therms"),
   R("kwh", "Energy in kilowatt-hours", suffix="kWh"),
   R("m3", "Volume in cubic metres", suffix="m³")],
  {"therms": "ccf * factor",
   "kwh": "ccf * factor * 29.30710701722222",
   "m3": "ccf * 2.8316846592"},
  {"why": "<p>A therm is 100 000 BTU. A hundred cubic feet of natural gas carries about 103 700 "
          "BTU, so one CCF is about 1.037 therms, and the gap is a billing detail rather than a "
          "rounding error.</p>"})

C("natural-gas-converter", "Natural Gas Converter",
  "Volume, energy and cost in one place, because a gas bill quotes all three and they do not "
  "convert with a single factor.",
  [F("ccf", "Gas used", suffix="CCF", default="50"),
   F("factor", "Heating value", suffix="therms per CCF", default="1.0367"),
   F("price", "Price", suffix="$ per therm", default="1.20")],
  [R("therms", "Energy", suffix="therms"),
   R("kwh", "Energy in kilowatt-hours", suffix="kWh"),
   R("cost", "Cost", suffix="$")],
  {"therms": "ccf * factor",
   "kwh": "ccf * factor * 29.30710701722222",
   "cost": "ccf * factor * price"})

# ------------------------------------------------------------------ solutions
C("ppm", "PPM Calculator",
  "Parts per million is a ratio with no units of its own. In water the arithmetic happens to "
  "give milligrams per litre, and the page says when that short cut holds.",
  [F("ppm", "Concentration", suffix="ppm", default="500")],
  [R("percent", "As a percentage", suffix="%"),
   R("mgl", "Milligrams per litre (water)", suffix="mg/L"),
   R("ratio", "One part in", suffix="")],
  {"percent": "ppm / 10000",
   "mgl": "ppm",
   "ratio": "1000000 / ppm"},
  {"why": "<p>One part per million is one milligram in a kilogram, or a millilitre in a cubic "
          "metre. For water, whose density is one kilogram per litre, that is the same as one "
          "milligram per litre, which is why the two are used interchangeably in water testing "
          "and nowhere else.</p>"})

C("ppm-to-mgl-converter", "ppm to mg/L Converter",
  "Milligrams per litre equals parts per million only when the density is one kilogram per "
  "litre. The page takes the density as a box so the answer is right outside water too.",
  [F("ppm", "Concentration", suffix="ppm", default="500"),
   F("density", "Density of the liquid", suffix="kg/L", default="1",
     help="1 for water, 0.92 for cooking oil, 1.26 for glycerine")],
  [R("mgl", "Milligrams per litre", suffix="mg/L"),
   R("mgkg", "Milligrams per kilogram", suffix="mg/kg"),
   R("percent", "As a percentage", suffix="%")],
  {"mgl": "ppm * density",
   "mgkg": "ppm",
   "percent": "ppm / 10000"})

C("lbs-to-pounds", "lbs to pounds Converter",
  "Pounds and lbs are two spellings of one unit, so there is nothing to convert. The page says "
  "so and gives the metric equivalent instead.",
  [F("value", "Value", suffix="lb", default="10")],
  [R("pounds", "Pounds", suffix="lb"),
   R("kg", "Kilograms", suffix="kg"),
   R("oz", "Ounces", suffix="oz")],
  {"pounds": "value", "kg": "value * 0.45359237", "oz": "value * 16"},
  {"why": "<p>There is no conversion here, and inventing one would be worse than saying so. "
          "lb is the abbreviation of the Latin libra, the Roman pound, and pounds is the "
          "English word for the same thing. Ten pounds is ten lbs.</p>"})

C("pounds-to-lbs", "pounds to lbs Converter",
  "The other way round, and still no conversion: the two names mean the same unit. What the "
  "page does give is the metric and ounce equivalents.",
  [F("value", "Value", suffix="lb", default="10")],
  [R("lbs", "Pounds", suffix="lb"),
   R("kg", "Kilograms", suffix="kg"),
   R("g", "Grams", suffix="g")],
  {"lbs": "value", "kg": "value * 0.45359237", "g": "value * 453.59237"},
  {"why": "<p>Pounds and lbs are the same unit under two names, so the conversion factor is "
          "one. The page keeps the box because the metric equivalent beside it is what most "
          "people came for.</p>"})

C("mg-to-teaspoon-converter", "mg to Teaspoon Converter",
  "A milligram is a mass and a teaspoon is a volume, so the bridge is the density of the "
  "powder or liquid in the spoon.",
  [F("mg", "Mass", suffix="mg", default="500"),
   F("density", "Density", suffix="mg/mL", default="1000",
     help="Water is 1000, sugar about 850 packed, salt about 1200")],
  [R("tsp", "Teaspoons", suffix="tsp"),
   R("ml", "Volume in millilitres", suffix="mL"),
   R("tbsp", "Tablespoons", suffix="tbsp")],
  {"ml": "mg / density",
   "tsp": "mg / density / 4.92892159375",
   "tbsp": "mg / density / 14.78676478125"},
  {"why": "<p>A US teaspoon holds 4.9289 millilitres. Divide the mass by the density to get "
          "millilitres, then divide by 4.9289 to get teaspoons. Skipping the density step is "
          "how a dose gets out by a factor of two.</p>"})

C("mg-to-tablespoon-converter", "mg to Tablespoon Converter",
  "The same mass-to-volume route as the teaspoon page, with a tablespoon of 14.7868 millilitres "
  "at the end of it.",
  [F("mg", "Mass", suffix="mg", default="5000"),
   F("density", "Density", suffix="mg/mL", default="1000")],
  [R("tbsp", "Tablespoons", suffix="tbsp"),
   R("tsp", "Teaspoons", suffix="tsp"),
   R("ml", "Volume in millilitres", suffix="mL")],
  {"ml": "mg / density",
   "tbsp": "mg / density / 14.78676478125",
   "tsp": "mg / density / 4.92892159375"})

C("price-per-liter-to-price-per-gallon", "Price per Litre to Price per Gallon",
  "Fuel is priced by the litre in most of the world and by the gallon in the United States, and "
  "the two gallons are not the same size.",
  [F("price", "Price per litre", suffix="/L", default="1.50"),
   SEL("gallon", "Gallon to use", {"US gallon (3.785 L)": "3.785411784",
                                   "Imperial gallon (4.546 L)": "4.54609"},
       default="3.785411784")],
  [R("per_gallon", "Price per gallon", suffix="/gal"),
   R("per_quart", "Price per quart", suffix="/qt"),
   R("per_100km", "Cost per 100 km at 7 L/100 km", suffix="")],
  {"per_gallon": "price * gallon",
   "per_quart": "price * gallon / 4",
   "per_100km": "price * 7"},
  {"why": "<p>Multiplying a price per litre by the number of litres in a gallon is the whole "
          "conversion, but which gallon matters: 3.785 litres in the US and 4.546 in the UK, a "
          "twenty per cent difference in the answer.</p>"})

C("cents-to-euros", "Cents to Euros Converter",
  "Cents to euros is a division by a hundred. Crossing into another currency needs a rate, so "
  "the page asks for one instead of pretending it knows today's.",
  [F("cents", "Amount in cents", suffix="¢", default="1000"),
   F("rate", "Euros per dollar", default="0.92",
     help="Type today's rate; the page does not fetch one")],
  [R("euros", "Amount in euros", suffix="€"),
   R("dollars", "Amount in dollars", suffix="$"),
   R("rate_used", "Rate used", suffix="€/$")],
  {"euros": "cents / 100 * rate",
   "dollars": "cents / 100",
   "rate_used": "rate"},
  {"why": "<p>Within one currency the conversion is a hundred cents to the euro and nothing "
          "else. Between currencies there is no fixed factor at all, which is why the rate is a "
          "box: a rate baked into a page is wrong the next morning.</p>"})

C("metric-to-sae", "Metric to SAE Converter",
  "Wrenches are sized in millimetres everywhere except the inch world, and a metric size is "
  "rarely an exact SAE one. The page gives the inch equivalent and the nearest thirty-second.",
  [F("mm", "Metric size", suffix="mm", default="13")],
  [R("inches", "Exact inch equivalent", suffix="in"),
   R("n32", "Nearest thirty-second", suffix="/32"),
   R("decimal32", "That size in inches", suffix="in")],
  {"inches": "mm / 25.4",
   "n32": "round(mm / 25.4 * 32)",
   "decimal32": "round(mm / 25.4 * 32) / 32"},
  {"why": "<p>A thirteen millimetre wrench is 0.5118 inches, which is a hair over half an "
          "inch: the nearest SAE size is 1/2 inch, and it is loose enough on a tight bolt to "
          "round it. That is why the answer is given as a nearest mark rather than an "
          "equivalence.</p>"})

C("metric-to-standard-converter", "Metric to Standard Converter",
  "The same millimetre-to-inch arithmetic for sockets and bolts, reported as a decimal, a "
  "fraction and the nearest standard size.",
  [F("mm", "Metric size", suffix="mm", default="10")],
  [R("inches", "Decimal inches", suffix="in"),
   R("nm64", "Nearest sixty-fourth", suffix="/64"),
   R("decimal64", "That size in inches", suffix="in")],
  {"inches": "mm / 25.4",
   "nm64": "round(mm / 25.4 * 64)",
   "decimal64": "round(mm / 25.4 * 64) / 64"})

C("lbs-to-newton", "lbs to Newtons Converter",
  "A pound is a mass and a newton is a force, so the bridge is gravity. On Earth one kilogram "
  "pulls with 9.80665 newtons, and that is the factor the page uses.",
  [F("pounds", "Mass", suffix="lb", default="100")],
  [R("newtons", "Force on Earth", suffix="N"),
   R("kgf", "Force in kilograms-force", suffix="kgf"),
   R("kn", "Force in kilonewtons", suffix="kN")],
  {"newtons": "pounds * 0.45359237 * 9.80665",
   "kgf": "pounds * 0.45359237",
   "kn": "pounds * 0.45359237 * 9.80665 / 1000"},
  {"why": "<p>Strictly, pounds-force and newtons are both forces and the factor is 4.4482. But "
          "a weight in pounds is a mass, so turning it into a force needs gravity: multiply by "
          "0.4536 to get kilograms, then by 9.80665 to get newtons. The two routes give the "
          "same answer only because 4.4482 is exactly that product.</p>"})

C("dimensional-analysis", "Dimensional Analysis Calculator",
  "Every figure can be written as a mantissa and a power of ten. The page splits a number into "
  "those two parts and puts it in engineering notation, where the exponent is a multiple of "
  "three.",
  [F("value", "The number", default="0.00042")],
  [R("power", "Power of ten", suffix=""),
   R("mantissa", "Mantissa", suffix=""),
   R("engineering", "Engineering exponent", suffix="")],
  {"power": "log10(value)",
   "mantissa": "value / pow(10, floor(log10(value) / 3) * 3)",
   "engineering": "floor(log10(value) / 3) * 3"},
  {"why": "<p>Dimensional analysis is the habit of carrying units through the algebra and "
          "checking they cancel. A figure written as a mantissa and a power of ten makes that "
          "easier, because the order of magnitude is separated from the digits and a slip of "
          "three in the exponent is visible at a glance.</p>"})
