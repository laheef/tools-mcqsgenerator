"""The builders: one function per shape of page.

Each builder returns a Spec, and every Spec carries its own computed table so
the article has something to say that only this page can say.
"""

from __future__ import annotations

import catalog
from gen import (DEFAULT_PROSE, F, R, SEL, Spec, T, cap, clean, fit_desc, fit_title, fmt,
                 num, solve, unit_of)
import units
from units import UNITS, factor, get

SUBJECT = {
    "length": "length", "mass": "weight", "volume": "volume", "area": "area",
    "time": "time", "speed": "speed", "pressure": "pressure", "energy": "energy",
    "power": "power", "force": "force", "angle": "angle", "data": "data size",
    "rate": "data rate", "capacitance": "capacitance", "viscosity": "viscosity",
    "radiation": "radiation", "density": "density", "quantity": "quantity",
}

ALL_SLUGS: list[str] = []


def related_for(slug: str, n: int = 3) -> list[tuple[str, str]]:
    """Three neighbours from the same category, chosen by position so the set is
    stable and every page gets inbound links from its own neighbours."""
    global ALL_SLUGS
    if not ALL_SLUGS:
        ALL_SLUGS = [r["slug"] for r in catalog.inventory()]
    pool = [s for s in ALL_SLUGS if s != slug]
    if not pool:
        return []
    i = pool.index(slug) if slug in pool else 0
    picks = [pool[(i + k) % len(pool)] for k in (1, 2, 3)][:n]
    return [("/conversion/" + p, p.replace("-", " ").title()) for p in picks]


POPULAR = {
    "length": ["m", "cm", "mm", "km", "inch", "foot", "yard", "mile", "nm", "micrometer"],
    "mass": ["kg", "g", "mg", "ounce", "pound", "stone", "tonne", "ton"],
    "volume": ["l", "ml", "tsp", "tbsp", "floz", "cup", "pint", "quart", "gallon", "m3"],
    "area": ["m2", "square-foot", "square-yard", "km2", "hectare", "acre",
             "square-mile", "square-inch", "cm2", "mm2"],
    "speed": ["kph", "mph", "mps", "knot", "fps"],
    "pressure": ["pa", "kpa", "mpa", "bar", "psi", "atm", "mmhg", "torr", "inh2o", "kgcm2"],
    "energy": ["j", "kj", "cal", "kcal", "wh", "kwh", "btu", "therm", "ftlb", "nm-energy"],
    "power": ["w", "kw", "hp", "ps", "btuph"],
    "force": ["n", "kn", "lbf", "kgf", "dyn"],
    "time": ["s", "ms", "minute", "hour", "day", "week", "month", "year", "decade"],
    "angle": ["degree", "radian", "gradian", "arcminute", "arcsecond"],
    "data": ["byte", "kilobyte", "megabyte", "gigabyte", "terabyte", "bit"],
    "rate": ["mbps", "kbps", "gbps", "bps"],
    "capacitance": ["microfarad", "nanofarad", "picofarad", "millifarad", "farad"],
    "viscosity": ["cp", "poise", "pas", "stokes", "centistokes"],
    "density": ["kgm3", "gcm3", "gml", "lbft3", "lbgal"],
    "radiation": ["gray", "sievert", "becquerel", "curie", "rad-dose", "rem", "roentgen"],
    "quantity": ["unit", "dozen", "score", "gross", "hundred", "thousand", "million",
                 "lakh", "crore", "billion"],
}

MULTI_NAMES = {
    "acreage": "Acreage Converter",
    "angle-converter": "Angle Converter",
    "area-converter": "Area Converter",
    "astronomical-unit": "Astronomical Unit Converter",
    "atm-conversion": "Atmosphere Converter",
    "barometric-pressure-conversion": "Barometric Pressure Converter",
    "byte-converter": "Byte Converter",
    "capacitance-conversion": "Capacitance Converter",
    "centimeter": "Centimetre Converter",
    "cgs-system-of-units": "CGS Units Converter",
    "conversion-calculator": "Conversion Calculator",
    "cps-converter": "Centipoise Converter",
    "cubic-feet": "Cubic Feet Converter",
    "cubic-meter": "Cubic Metre Converter",
    "day-converter": "Day Converter",
    "density-converter": "Density Converter",
    "distance-converter": "Distance Converter",
    "dm-conversion": "Decimetre Converter",
    "energy-conversion": "Energy Converter",
    "feet-converter": "Feet Converter",
    "force-conversion": "Force Converter",
    "gallon": "Gallon Converter",
    "hour-converter": "Hour Converter",
    "imperial": "Imperial Measure Converter",
    "imperial-to-metric-conversion": "Imperial to Metric Converter",
    "inch-converter": "Inch Converter",
    "kilometer": "Kilometre Converter",
    "kpa-conversion": "Kilopascal Converter",
    "land-area": "Land Area Converter",
    "length-converter": "Length Converter",
    "light-year-conversion": "Light Year Converter",
    "mbps-converter": "Mbps Converter",
    "measurement-converter": "Measurement Converter",
    "meter-conversion": "Metre Converter",
    "metric-converter": "Metric Converter",
    "metric-to-imperial-conversion": "Metric to Imperial Converter",
    "micrometer-conversion": "Micrometre Converter",
    "mil-conversion": "Mil Converter",
    "mile-conversion": "Mile Converter",
    "millimeter": "Millimetre Converter",
    "milliseconds-converter": "Millisecond Converter",
    "minute-converter": "Minute Converter",
    "mm-millimeters": "Millimetre Converter",
    "mpa-conversion": "Megapascal Converter",
    "newton-meter": "Newton-Metre Converter",
    "nm-converter": "Nanometre Converter",
    "pascal-conversion": "Pascal Converter",
    "power-conversion": "Power Converter",
    "pressure-converter": "Pressure Converter",
    "pressure-unit-conversion": "Pressure Unit Converter",
    "psi-conversion": "PSI Converter",
    "quantity-converter": "Quantity Converter",
    "radiation-converter": "Radiation Converter",
    "seconds-converter": "Second Converter",
    "speed-converter": "Speed Converter",
    "square-feet-converter": "Square Feet Converter",
    "square-meter-converter": "Square Metre Converter",
    "square-yard-converter": "Square Yard Converter",
    "time-unit-converter": "Time Unit Converter",
    "volume-conversion": "Volume Converter",
    "weird-units": "Weird Units Converter",
    "weight-converter": "Weight Converter",
    "yard-conversion": "Yard Converter",
}


def order_units(a, outs):
    rank = {k: i for i, k in enumerate(POPULAR.get(a.dim, []))}
    outs = list(outs)
    outs.sort(key=lambda u: (rank.get(u.key, 99), abs(__import__("math").log10(u.factor / a.factor))))
    return outs


PAIR_NAMES = {
    "mm-to-atm-conversion": "Millimetres of Mercury to Atmospheres Converter",
    "metric-to-inches": "Centimetres to Inches Converter",
    "ms-to-kmh": "Metres per Second to Kilometres per Hour Converter",
    "liters-to-cl": "Litres to Centilitres Converter",
    "kilometer-meter-conversion": "Kilometres to Metres Converter",
    "liter-cc": "Litres to Cubic Centimetres Converter",
    "ares-to-cents": "Ares to Cents Converter",
    "yards-to-acres": "Square Yards to Acres Converter",
}


def pair(slug: str, a_key: str, b_key: str) -> Spec:
    a, b = get(a_key), get(b_key)
    k = factor(a, b)
    name = PAIR_NAMES.get(slug) or f"{cap(a.name)} to {cap(b.name)} Converter"
    cands = [
        f"{cap(a.plural)} to {cap(b.plural)}: {num(k)} to One, and Back",
        f"{cap(a.plural)} to {cap(b.plural)} Converter — Exact Factor",
        f"{cap(a.plural)} to {cap(b.plural)}: The Exact Conversion",
        f"Convert {cap(a.plural)} to {cap(b.plural)} Exactly",
        f"{cap(a.plural)} to {cap(b.plural)} ({a.symbol} → {b.symbol}): Factor and Table",
    ]
    if slug in PAIR_NAMES:
        cands.insert(0, name)
    title = fit_title(cands, name, seed=slug)
    desc = fit_desc(
        f"Convert {a.plural} to {b.plural} at exactly {num(k)} {b.plural} per {a.name}. "
        f"Type a figure and read {b.plural}, the reverse rate and the same quantity in "
        f"{get(units.BASE[a.dim]).plural}.")

    formula = {"result": f"value * {num(k)}",
               "base": f"value * {num(a.factor)}",
               "factor": num(k)}
    rows = "".join(f"<tr><td>{num(v)} {b.plural}</td><td>{num(v / k)} {a.plural}</td></tr>"
                   for v in (1, 2, 5, 10, 25, 50, 100, 250, 500, 1000))
    extra = (
        f"<p>The same conversion read the other way, for the values people actually type. "
        f"Every row is {num(k)} {b.plural} to the {a.name}, so the two columns multiply to "
        f"give the same physical quantity.</p>"
        f"<table class=\"calc-table\"><thead><tr><th>{cap(b.plural)}</th>"
        f"<th>{cap(a.plural)}</th></tr></thead><tbody>{rows}</tbody></table>"
        f"<p>Dividing is the other direction: one {b.name} is {num(1 / k)} {a.plural}, and "
        f"that is the number to use when the figure you were given is already in "
        f"{b.plural}. The two factors are reciprocals, which is a quick check that neither "
        f"was typed wrongly — multiply them and you should get one.</p>"
        f"<p>Precision deserves a sentence of its own. The factor {num(k)} is exact as "
        f"written, but a figure typed into the box has only the digits you gave it, and the "
        f"answer cannot be more precise than that. Where the small end of the range matters, "
        f"work in the smaller unit: {(a.plural if a.factor < b.factor else b.plural)} keep "
        f"more significant figures for the same measurement.</p>"
        f"<p>One last check that costs nothing: convert a round figure you already know. A "
        f"metre is 3.28 feet, a mile is 1.61 kilometres, a kilogram is 2.2 pounds. If the "
        f"page disagrees with the number in your head by a factor rather than a little, the "
        f"unit in the box is not the unit the label names.</p>")

    return Spec(
        slug=slug, name=name, title=title, desc=desc,
        h1=name,
        what=(f"One {a.name} is {num(k)} {b.plural}, and the page computes that ratio for any "
              f"figure you type rather than reading it off a table of round values."),
        fields=[F("value", f"In {a.plural}", suffix=a.symbol, default="1",
                  help=f"The figure to convert, in {a.plural}")],
        results=[R("result", f"{cap(a.plural)} in {b.plural}", suffix=b.symbol),
                 R("base", f"{cap(a.plural)} in {get(units.BASE[a.dim]).plural}",
                   suffix=get(units.BASE[a.dim]).symbol),
                 R("factor", f"{cap(b.plural)} per {a.name}", suffix=f"{b.symbol}/{a.symbol}")],
        formula=formula,
        prose={
            "why": (f"<p>One {a.name} is {num(k)} {b.plural}, and that figure is a definition "
                    f"rather than a measurement, so it is exact to as many digits as you print "
                    f"it. The reverse is {num(1 / k)} {a.plural} to the {b.name}, which is the "
                    f"same fact written the other way round.</p>"
                    f"<p>Both units belong to the same dimension, so the conversion is a single "
                    f"multiplication. That is worth saying plainly because half the arithmetic "
                    f"mistakes in this area come from treating a conversion like a formula with "
                    f"an offset in it: there is no offset here, and twice the figure is twice "
                    f"the answer.</p>"),
            "extra_title": f"{cap(a.plural)} and {b.plural} side by side",
            "extra": extra,
            "uses": [
                ("<strong>Reading a label.</strong>", f"A product marked in {b.plural} and a "
                 f"form that asks for {a.plural} is the commonest place this factor is needed."),
                ("<strong>Estimating in your own units.</strong>", f"Someone quotes a figure in "
                 f"{b.plural} and you think in {a.plural}: {num(k)} is the whole of the "
                 f"arithmetic."),
                ("<strong>Checking a spreadsheet.</strong>", f"A column converted with the wrong "
                 f"factor is out by exactly {num(k)}, which is easy to see once you know which "
                 f"number to expect."),
                ("<strong>Teaching the relationship.</strong>", f"One factor, used both ways, is "
                 f"easier to remember than two rules."),
                ("<strong>Rounding decisions.</strong>", f"{num(k)} has enough digits that a "
                 f"rounded version shows up in the fourth significant figure and nowhere "
                 f"earlier."),
            ],
            "pitfalls": [
                ("<strong>Using the inverse by accident.</strong>",
                 f"Multiplying when you should divide gives an answer out by {num(k * k)}, "
                 f"which is large enough to notice but small enough to be believed."),
                ("<strong>Mixing the systems mid-calculation.</strong>",
                 f"Convert once, at the end, rather than at every step."),
            ],
        },
        related=related_for(slug),
    )


def dens(slug: str, a_key: str, b_key: str) -> Spec:
    """Mass to volume, or volume to mass: the density is a box, not a guess."""
    a, b = get(a_key), get(b_key)          # a is what you type, b is what you get
    mass_b = a.dim == "mass"
    unit_mass = get("kg")
    name = f"{cap(a.name)} to {cap(b.name)} Converter"
    title = fit_title([
        f"{cap(a.plural)} to {cap(b.plural)}: Mass, Volume and Density",
        f"{cap(a.plural)} to {cap(b.plural)} Converter with Density",
        f"Convert {cap(a.plural)} to {cap(b.plural)} Given the Density",
        f"{cap(a.plural)} to {cap(b.plural)}: Density Is the Missing Number",
    ], name, seed=slug)
    desc = fit_desc(
        f"Convert {a.plural} to {b.plural} with the density as an input, because mass and "
        f"volume only meet through it. Type the figure, the density, and read both sides.")
    if mass_b:
        formula = {"result": f"value * {num(a.factor)} / density * 1000 / {num(b.factor)}",
                   "litres": f"value * {num(a.factor)} / density * 1000",
                   "kilograms": f"value * {num(a.factor)}"}
        out_unit = b.symbol
    else:
        formula = {"result": f"value * {num(a.factor)} / 1000 * density / {num(b.factor)}",
                   "litres": f"value * {num(a.factor)}",
                   "kilograms": f"value * {num(a.factor)} / 1000 * density"}
        out_unit = b.symbol

    rows = "".join(
        f"<tr><td>{num(v)} {get('l').plural if not mass_b else get('l').plural}</td>"
        f"<td>{num(v * 1000 / 1000 * 500 / 1000)}</td>"
        f"<td>{num(v * 1000 / 1000 * 1000 / 1000)}</td>"
        f"<td>{num(v * 1000 / 1000 * 1500 / 1000)}</td></tr>"
        for v in (1, 5, 10, 50, 100, 500, 1000))
    extra = (
        "<p>Density is the number that turns a volume into a mass, and it is not a constant: "
        "water is 1 000 kg/m³, cooking oil about 920, honey about 1 420, and a bag of flour "
        "sits near 590 because it is mostly air. The table below holds the volume fixed and "
        "moves the density, which is what changes between one substance and the next.</p>"
        "<table class=\"calc-table\"><thead><tr><th>Volume (L)</th><th>500 kg/m³</th>"
        "<th>1 000 kg/m³</th><th>1 500 kg/m³</th></tr></thead>"
        f"<tbody>{rows}</tbody></table>"
        "<p>Read it across for one substance at three volumes, or down for three substances "
        "at one volume. The second column is the water line: a litre of water is a kilogram, "
        "and that coincidence is why the two systems feel interchangeable in a kitchen and "
        "are not.</p>"
        "<p>Where the density comes from matters more than the arithmetic. A figure taken "
        "from a table is a room-temperature figure for a pure substance; what you are "
        "measuring may be colder, wetter, packed differently or simply a different material "
        "with the same name. If the answer matters, weigh a known volume and use that "
        "density rather than a textbook one.</p>")

    return Spec(
        slug=slug, name=name, title=title, desc=desc, h1=name,
        what=(f"Mass and volume only meet through density, so this page takes the density as "
              f"a box rather than assuming one. One kilogram of water is one litre; one "
              f"kilogram of honey is about 0.7 litres."),
        fields=[F("value", f"In {a.plural}", suffix=a.symbol, default="1",
                  help=f"The figure to convert, in {a.plural}"),
                F("density", "Density", suffix="kg/m³", default="1000",
                  help="Water is 1000, cooking oil about 920, honey about 1420")],
        results=[R("result", f"{cap(a.plural)} in {b.plural}", suffix=out_unit),
                 R("litres", "The same quantity in litres", suffix="L"),
                 R("kilograms", "The same quantity in kilograms", suffix="kg")],
        formula=formula,
        prose={
            "why": ("<p>A mass is not a volume and no factor turns one into the other. What "
                    "bridges them is density, the mass of a fixed volume of the stuff you "
                    "actually have, so this page asks for it instead of assuming water.</p>"
                    "<p>The assumption is the dangerous part of every online converter that "
                    "silently uses one gram per millilitre. It is right for water, close for "
                    "milk, and wrong by a factor of two for flour that has been scooped rather "
                    "than sieved. Making the density a visible input means the answer carries "
                    "the assumption with it.</p>"),
            "extra_title": "The same volume at three densities",
            "extra": extra,
            "pitfalls": [
                ("<strong>Using a textbook density for a real substance.</strong>",
                 "Flour, sugar and sand all change density with how they are packed."),
                ("<strong>Confusing kg/m³ with g/cm³.</strong>",
                 "Water is 1 000 kg/m³ and 1 g/cm³ at the same time; entering 1 where 1000 "
                 "belongs gives an answer a thousand times out."),
                ("<strong>Forgetting that temperature moves density.</strong>",
                 "Water gains about one per cent between 20 °C and 4 °C, which is small until "
                 "the quantity is large."),
            ],
            "limits": [
                ("<strong>One substance, one density.</strong>", "A mixture does not have a "
                 "single density unless it is well mixed."),
            ],
        },
        related=related_for(slug),
    )


def multi(slug: str, base_key: str, only: list[str] | None = None) -> Spec:
    """One figure in, every unit of the dimension out."""
    a = get(base_key)
    outs = [get(k) for k in only] if only else [u for u in UNITS.values() if u.dim == a.dim]
    outs = [u for u in outs if u.key != a.key]
    outs = order_units(a, outs)[:8]
    name = MULTI_NAMES.get(slug, f"{cap(a.name)} Converter")
    title = fit_title([
        f"{name}: {len(outs) + 1} Units, One Figure",
        f"{name} — Every Unit on One Page",
        f"{name}: {cap(outs[0].plural)} and {len(outs)} More",
        f"{name} — Convert {cap(a.plural)} into {len(outs) + 1} Units",
        f"{name}: {cap(a.plural)} into {len(outs) + 1} Units, One Table",
    ], name, seed=slug)
    desc = fit_desc(
        f"Type one figure in {a.plural} and read it in {len(outs) + 1} units of "
        f"{SUBJECT[a.dim]}, with the factor for each written out.")

    formula = {u.key: f"value * {num(u.factor / a.factor)}" for u in outs}
    results = [R(u.key, f"In {u.plural}", suffix=u.symbol) for u in outs]

    head = "".join(f"<th>{cap(u.plural)}</th>" for u in outs[:4])
    body = ""
    for v in (1, 2, 5, 10, 25, 50, 100):
        cells = "".join(f"<td>{num(v * u.factor / a.factor)}</td>" for u in outs[:4])
        shown = fmt(v) + ((" " + a.symbol) if a.symbol else "")
        body += f"<tr><td>{shown}</td>{cells}</tr>"
    extra = (
        f"<p>Four of the {len(outs) + 1} units, at the values a person types. Each column is "
        f"the same figure multiplied by one factor, so a row that looks wrong next to its "
        f"neighbours is a factor typed wrongly rather than a formula that changes shape.</p>"
        f"<table class=\"calc-table\"><thead><tr><th>{cap(a.plural)}</th>{head}</tr></thead>"
        f"<tbody>{body}</tbody></table>"
        f"<p>The panel reports {len(outs) + 1} readings from the single box because the units "
        f"share one dimension: they are all measures of {SUBJECT[a.dim]}, and the page holds "
        f"every conversion factor between them. Nothing is rounded before the last step, so "
        f"the figures in the table and the figures in the panel agree to the digit shown.</p>"
        f"<p>Converting between two of the columns directly means dividing their factors, and "
        f"any route through this page gives the same answer as the direct route. That is worth "
        f"testing once with a pair you know: a kilometre in metres, a kilogram in grams, an "
        f"hour in seconds.</p>")

    return Spec(
        slug=slug, name=name, title=title, desc=desc, h1=name,
        what=(f"One figure in {a.plural}, read out in every unit of {SUBJECT[a.dim]} that the "
              f"page carries."),
        fields=[F("value", f"In {a.plural}", suffix=a.symbol, default="1",
                  help=f"The figure to convert, in {a.plural}")],
        results=results,
        formula=formula,
        prose={
            "why": (f"<p>Most conversions are asked one at a time: how many of these in one of "
                    f"those. That is fine until you are looking at a specification sheet in "
                    f"one unit, a form asking for another, and a tape measure reading a third. "
                    f"This page shows the figure in {len(outs) + 1} units at once so the one you "
                    f"need is already on screen.</p>"
                    f"<p>Every reading comes from the same input and the same base unit, so the "
                    f"columns cannot disagree with each other. What they can do is make a "
                    f"mismatch obvious: a figure that looks plausible in one unit and absurd in "
                    f"another is usually a figure typed in the wrong one.</p>"),
            "extra_title": "Four units, seven values",
            "extra": extra,
            "uses": [
                ("<strong>Specification sheets.</strong>", "A part listed in one system and a "
                 "drawing dimensioned in another."),
                ("<strong>Reports for two audiences.</strong>", "The same quantity in the unit "
                 "each reader expects, from one entry."),
                ("<strong>Sanity checks.</strong>", f"A figure that is reasonable in "
                 f"{a.plural} and impossible in another unit is a typing error."),
                ("<strong>Teaching the dimension.</strong>", f"Seeing all the units of "
                 f"{SUBJECT[a.dim]} together makes the size of each one concrete."),
            ],
            "pitfalls": [
                ("<strong>Picking the column by habit.</strong>",
                 "The unit you always use is not always the unit the other person meant."),
                ("<strong>Copying a rounded column.</strong>",
                 "The panel rounds for display; the table rounds the same way, so neither is a "
                 "source of extra precision."),
            ],
        },
        related=related_for(slug),
    )


TEMP_TITLES = {
    "celsius-to-fahrenheit": "Celsius to Fahrenheit: The Formula and the Table",
    "fahrenheit-to-celsius": "Fahrenheit to Celsius: The Formula Together",
    "kelvin-to-celsius": "Kelvin to Celsius: One Subtraction, No Factor",
    "kelvin-to-fahrenheit": "Kelvin to Fahrenheit: Two Steps, One Page",
    "celsius-converter": "Celsius Converter: Fahrenheit, Kelvin, Rankine",
    "fahrenheit": "Fahrenheit Converter: Celsius, Kelvin, Rankine",
    "kelvin-converter": "Kelvin Converter: Celsius, Fahrenheit, Rankine",
    "temperature-converter": "Temperature Converter: Four Scales, One Figure",
    "centigrade-to-celsius": "Centigrade to Celsius: The Same Scale, Twice",
}


def temperature(slug: str, from_scale: str) -> Spec:
    scale_name = {"C": "Celsius", "F": "Fahrenheit", "K": "Kelvin"}[from_scale]
    if slug == "centigrade-to-celsius":
        name = "Centigrade to Celsius Converter"
    else:
        name = f"{scale_name} Converter" if slug.endswith("-converter") or slug in (
            "fahrenheit", "celsius-converter", "kelvin-converter") else \
            f"{scale_name} to {'Celsius' if slug.startswith('kelvin') or slug.startswith('fahrenheit') else 'Fahrenheit'} Converter"
    if slug == "temperature-converter":
        name = "Temperature Converter"
    title = fit_title([
        TEMP_TITLES.get(slug, ""),
        f"{name}: Celsius, Fahrenheit, Kelvin and Rankine",
        f"{name} — All Four Scales in One Step",
    ], name, seed=slug)
    desc = fit_desc(
        f"Convert {scale_name} to Celsius, Fahrenheit, Kelvin and Rankine with the offsets "
        f"written out, a worked example and a table that crosses the freezing and boiling "
        f"points.")

    formula = {
        "celsius": {"C": "value", "F": "(value - 32) * 5 / 9", "K": "value - 273.15"}[from_scale],
        "fahrenheit": {"C": "value * 9 / 5 + 32", "F": "value", "K": "(value - 273.15) * 9 / 5 + 32"}[from_scale],
        "kelvin": {"C": "value + 273.15", "F": "(value - 32) * 5 / 9 + 273.15", "K": "value"}[from_scale],
        "rankine": {"C": "(value + 459.67)", "F": "value + 459.67", "K": "value * 9 / 5"}[from_scale],
    }
    # rankine is row four in every case
    formula["rankine"] = "(celsius + 273.15) * 9 / 5"

    rows = ""
    for c in (-40, 0, 10, 20, 37, 100, 200):
        f_ = c * 9 / 5 + 32
        k = c + 273.15
        r = (c + 273.15) * 9 / 5
        rows += (f"<tr><td>{num(c)}</td><td>{num(f_)}</td><td>{num(k)}</td>"
                 f"<td>{num(r)}</td></tr>")
    extra = (
        "<p>The four scales are two decisions made twice: where zero sits, and how big a degree "
        "is. Celsius and Kelvin share a degree size and differ by an offset; Fahrenheit and "
        "Rankine share a degree size and differ by an offset; Celsius and Fahrenheit differ in "
        "both. That is why two of the four conversions are a subtraction and the other two are "
        "a multiplication.</p>"
        "<table class=\"calc-table\"><thead><tr><th>°C</th><th>°F</th><th>K</th>"
        f"<th>°R</th></tr></thead><tbody>{rows}</tbody></table>"
        "<p>Two rows are worth memorising. At −40 the Celsius and Fahrenheit readings meet, "
        "which is the only temperature where the two numbers are the same. At 0 °C water "
        "freezes and at 100 °C it boils at one atmosphere, which gives the two fixed points "
        "the Fahrenheit scale was later pegged to.</p>"
        "<p>A conversion with an offset is not proportional, so doubling a temperature does not "
        "double the reading in another scale. 20 °C is 68 °F; 40 °C is 104 °F, not 136. Treat "
        "temperature as a position on a scale rather than as a quantity, and the arithmetic "
        "stops being surprising.</p>")

    return Spec(
        slug=slug, name=name, title=title, desc=desc, h1=name,
        what=(f"Temperature is the one conversion in this category with an offset in it, so "
              f"the page writes the formula out and shows all four scales at once."),
        fields=[F("value", f"Temperature in {scale_name}", suffix="°C" if from_scale == "C"
                  else ("°F" if from_scale == "F" else "K"), default="20",
                  help=f"The reading to convert, in {scale_name}")],
        results=[R("celsius", "In Celsius", suffix="°C"),
                 R("fahrenheit", "In Fahrenheit", suffix="°F"),
                 R("kelvin", "In Kelvin", suffix="K"),
                 R("rankine", "In Rankine", suffix="°R")],
        formula=formula,
        prose={
            "why": (f"<p>A temperature is a position on a scale, not a quantity of something, "
                    f"and that is why this page has four results where the length converters "
                    f"have one. Celsius and Fahrenheit put their zero in different places and "
                    f"make their degrees different sizes, so converting needs a shift as well "
                    f"as a factor.</p>"
                    f"<p>Kelvin starts at absolute zero, which makes it the scale to use in any "
                    f"calculation that multiplies or divides by temperature. Rankine is the same "
                    f"idea on Fahrenheit-sized degrees, and it survives in a few engineering "
                    f"tables.</p>"),
            "extra_title": "Four scales, seven readings",
            "extra": extra,
            "pitfalls": [
                ("<strong>Doubling a temperature.</strong>",
                 "20 °C doubled is 40 °C, not 40 °F or 68 °F; the scale has an offset and a "
                 "ratio does not survive it."),
                ("<strong>Using °C where K belongs.</strong>",
                 "Gas laws and thermodynamic formulas need kelvin, and the answer is wrong by "
                 "the ratio of the temperatures, not by the offset."),
                ("<strong>Rounding the offset.</strong>",
                 "273.15 is not 273; the 0.15 K is 0.27 °F, which matters in a calibration."),
            ],
            "limits": [
                ("<strong>Below absolute zero there is no reading.</strong>",
                 "The formula will produce a number, but a negative kelvin is not a temperature."),
            ],
        },
        related=related_for(slug),
    )


def money(slug: str, coin: str, per_dollar: float) -> Spec:
    name = f"{cap(coin)}s to Dollars Converter"
    title = fit_title([
        f"{cap(coin)}s to Dollars: {num(per_dollar)} to the Dollar",
        f"Convert {cap(coin)}s to Dollars and Cents",
        f"{cap(coin)}s to Dollars — One Division, No Rate",
        f"{cap(coin)}s into Dollars: Count, Divide, Read",
    ], name, seed=slug)
    desc = fit_desc(
        f"Turn a count of {coin}s into dollars and cents at {num(per_dollar)} to the dollar, "
        f"with the same total in {coin}s and a table from one to a hundred.")
    rows = "".join(f"<tr><td>{num(v)}</td><td>{num(v / per_dollar)}</td></tr>"
                   for v in (1, 5, 10, 20, 50, 100, 200, 500, 1000))
    extra = (
        f"<p>Counting coins is a division with a fixed divisor: {num(per_dollar)} {coin}s to "
        f"the dollar, whatever the pile weighs. The table runs from a single coin to a "
        f"thousand, which covers a pocket and a collection tin.</p>"
        f"<table class=\"calc-table\"><thead><tr><th>{cap(coin)}s</th><th>Dollars</th></tr>"
        f"</thead><tbody>{rows}</tbody></table>"
        f"<p>The figure to check against is 100: a hundred {coin}s is "
        f"{num(100 / per_dollar)} dollars, and that is the row where most counting errors "
        f"show up. If your pile is mixed, sort by denomination first and convert each pile "
        f"separately — the totals add, and the arithmetic stays honest.</p>")
    return Spec(
        slug=slug, name=name, title=title, desc=desc, h1=name,
        what=(f"A count of {coin}s divided by {num(per_dollar)} gives the value in dollars. "
              f"The page reports the dollars, the cents and the coins needed to make a dollar."),
        fields=[F("value", f"Number of {coin}s", suffix=coin, default="100",
                  help=f"How many {coin}s you have")],
        results=[R("dollars", f"Value in dollars", suffix="$"),
                 R("cents", "Value in cents", suffix="¢"),
                 R("per_dollar", f"{cap(coin)}s in one dollar", suffix=coin)],
        formula={"dollars": f"value / {num(per_dollar)}",
                 "cents": f"value / {num(per_dollar)} * 100",
                 "per_dollar": num(per_dollar)},
        prose={
            "why": (f"<p>A jar of coins is a counting problem with a division at the end. The "
                    f"only fact needed is how many {coin}s make a dollar — {num(per_dollar)} — "
                    f"and everything else follows from it.</p>"
                    f"<p>Doing the division once, on the whole count, is more accurate than "
                    f"converting handfuls and adding the rounded results. Rounding a part to "
                    f"the cent and then adding twenty of them can drift by several cents, and "
                    f"the drift is always in the same direction.</p>"),
            "extra_title": f"{cap(coin)}s into dollars, ten counts",
            "extra": extra,
            "uses": [
                ("<strong>Counting a jar.</strong>", "Cash the whole pile rather than weighing "
                 "it."),
                ("<strong>Change at a till.</strong>", "A drawer counted in coins and reported "
                 "in dollars."),
                ("<strong>Fundraising tins.</strong>", "A total from a collection counted by "
                 "denomination."),
                ("<strong>Teaching division.</strong>", f"A divisor of {num(per_dollar)} is "
                 f"easy to check by hand."),
            ],
            "pitfalls": [
                ("<strong>Counting a mixed pile as one denomination.</strong>",
                 "Sort first, then convert each pile."),
                ("<strong>Rounding each handful.</strong>",
                 "Round once, at the end, or the cents drift."),
            ],
        },
        related=related_for(slug),
    )


def scale(slug: str, word: str) -> Spec:
    """A plain number read against the words used for large quantities."""
    word_value = {"million": 1e6, "billion": 1e9}[word]
    name = f"Number to {cap(word)} Converter"
    title = fit_title([
        f"How Many {cap(word)}s: Number to {cap(word)} Converter",
        f"Convert a Number to {cap(word)}s and Back",
        f"Number to {cap(word)}: Digits and Words",
        f"{cap(word)}s from a Number: Table and Words",
    ], name, seed=slug)
    desc = fit_desc(
        f"Turn a plain number into {word}s, thousands, lakhs and crores, with the division "
        f"written out and a table that shows where the words stop matching the digits.")
    extra = (
        f"<p>Large numbers are read in groups of three in English and in groups of two after "
        f"the thousand in the Indian system, which is where lakh and crore come from. One "
        f"{word} is {num(word_value)}; one crore is ten million; one lakh is a hundred "
        f"thousand. The same count written in both systems is the same quantity, and the "
        f"digits do not change.</p>"
        "<table class=\"calc-table\"><thead><tr><th>Number</th><th>Millions</th>"
        "<th>Lakhs</th><th>Crores</th></tr></thead><tbody>"
        + "".join(f"<tr><td>{num(v)}</td><td>{num(v / 1e6)}</td><td>{num(v / 1e5)}</td>"
                  f"<td>{num(v / 1e7)}</td></tr>"
                  for v in (1e5, 1e6, 5e6, 1e7, 1e8, 1e9))
        + "</tbody></table>"
        "<p>Read the columns carefully rather than the first digits. A crore is ten million, "
        "so a figure in crores is a figure in millions divided by ten, and moving a decimal "
        "place in the wrong direction costs a factor of a hundred. Newspaper headlines mix "
        "the two systems more often than they should, which is exactly when a converter "
        "earns its place.</p>")
    return Spec(
        slug=slug, name=name, title=title, desc=desc, h1=name,
        what=(f"A plain number divided by {num(word_value)} is the same quantity in {word}s. "
              f"The page reports it beside thousands, lakhs and crores so the words and the "
              f"digits can be checked against each other."),
        fields=[F("value", "The number", default="1000000",
                  help="The figure to read in words")],
        results=[R(word, f"In {word}s", suffix=word),
                 R("thousands", "In thousands", suffix="thousand"),
                 R("lakh", "In lakhs", suffix="lakh"),
                 R("crore", "In crores", suffix="crore")],
        formula={word: f"value / {num(word_value)}",
                 "thousands": "value / 1000",
                 "lakh": "value / 100000",
                 "crore": "value / 10000000"},
        prose={
            "why": (f"<p>Counting words are a notation, not a unit, and they differ between "
                    f"English and the Indian system. One {word} is {num(word_value)}, written "
                    f"with no ambiguity at all, so the page works from the digits and puts the "
                    f"words on top.</p>"
                    "<p>It is worth knowing where the two systems diverge. Both agree up to a "
                    "thousand. English then groups by thousands — million, billion, trillion — "
                    "while the Indian system groups by hundreds after the thousand: lakh for a "
                    "hundred thousand, crore for a hundred lakh. The quantities are the same; "
                    "only the grouping changes.</p>"),
            "extra_title": "The same count in two systems",
            "extra": extra,
            "pitfalls": [
                ("<strong>A billion is not a million million here.</strong>",
                 "In English usage a billion is a thousand million; the long-scale billion of "
                 "a million million is not what a newspaper means."),
                ("<strong>Lakh and million are not adjacent.</strong>",
                 "Ten lakh is one million; a crore is ten million."),
            ],
            "limits": [
                ("<strong>Words are not numbers.</strong>", "Once a figure is written in words "
                 "its precision is the word, not the digits behind it."),
            ],
        },
        related=related_for(slug),
    )


def calc(slug: str, name: str, what: str, fields: list[dict], results: list[dict],
         formula: dict[str, str], prose: dict | None = None,
         engine_note: str = "", engine: str = "formula", js: str = "") -> Spec:
    """A page whose relationship is more than one factor."""
    title = fit_title([
        f"{name}: Formula, Table and Worked Example",
        f"{name} — Convert with the Formula Shown",
        f"{name}: The Formula and a Worked Example",
        f"{name} with the Working Shown",
    ], name, seed=slug)
    desc = fit_desc(what if what.endswith(".") else what + ".")
    p: dict = {"why": f"<p>{what}</p>"}
    if prose:
        p.update(prose)
    return Spec(
        slug=slug, name=name, title=title, desc=desc, h1=name, what=what,
        fields=fields, results=results, formula=formula,
        engine=engine, engine_note=engine_note, js=js, prose=p,
        related=related_for(slug),
    )


def script_page(slug: str, name: str, what: str, fields: list[dict], results: list[dict],
                js: str, note: str, prose: dict | None = None) -> Spec:
    """A page whose working is a transformation rather than an equation."""
    title = fit_title([
        f"{name}: Converter with the Working Shown",
        f"{name} — Free Converter, No Sign-Up",
        f"{name}: Convert, Check and Copy",
        f"{name}: The Converter and Its Rules",
    ], name, seed=slug)
    desc = fit_desc(what if what.endswith(".") else what + ".")
    p: dict = {
        "why": (f"<p>{what}</p><p>The formula table is deliberately empty, because this page "
                f"does not solve an equation: it applies a fixed set of rules to what you "
                f"type. An empty table with an explanation is honest, and a made-up formula "
                f"would not be.</p>"),
        "formula_note": (f"<p>There is no algebraic relationship to rearrange here, which is "
                         f"why the table is empty. The script on the page is the calculator, "
                         f"and the rules it applies are listed in the article below it.</p>"),
        "units_note": ("<p>The boxes on this page take what you type and nothing else: there is "
                       "no unit chip to get wrong and no scale to match, which is one class of "
                       "error this page simply does not have. What it can do is decline: a value "
                       "it cannot read leaves the answer boxes empty rather than producing a "
                       "plausible-looking substitute.</p>"
                       "<p>Text is copied character for character, including the spacing the "
                       "rules add, so a result pasted into another document keeps its shape. "
                       "Nothing is normalised on the way out — no trimming, no case folding, no "
                       "smart quotes.</p>"
                       "<p>That also means the page has a narrow definition of success: a value "
                       "either reads as the kind of input the rules expect or it does not, and "
                       "a partial match is treated as a mistake rather than guessed at. A page "
                       "that guessed would be more convenient once and wrong quietly "
                       "afterwards.</p>"
                       "<p>What the page does not do is check the result against the outside "
                       "world. It has no table of real codes, no list of valid dates and no "
                       "opinion on whether the value you typed means what you think it means. "
                       "It converts the syntax, and the meaning is yours.</p>"),
        "example_note": ("<p>The figures in the table are the page's own output for the inputs "
                         "shown, taken from the script that runs in your browser rather than "
                         "written into the article by hand. Reproduce a row by typing the same "
                         "input and reading the panel: if it disagrees, the page and this "
                         "article have drifted apart and the page is the one to believe.</p>"),
        "reading_script": (
            "<p>Read the answer as a whole rather than a first character. A base conversion "
            "looks right or wrong at a glance once you know the alphabet of the base it is "
            "written in, and a single slipped digit is the usual failure rather than a totally "
            "wrong figure.</p>"
            "<p>Where the page reports more than one reading, compare them. A hexadecimal "
            "figure that disagrees with its own binary column is a rule applied twice, not a "
            "typing error, and the disagreement is the diagnosis.</p>"),
        "reading": DEFAULT_PROSE["reading"] + (
                    f"<p>{cap(what.split('.')[0])}. The answer arrives in the boxes beside the "
                    f"form, and every box is written by the same script, so a figure that "
                    f"appears in one and not another means the input it needed was empty.</p>"
                    f"<p>Copy what you need before you change the input: nothing on the page is "
                    f"saved, and the previous answer is gone the moment the next one is "
                    f"computed. Where the output is text, it is copied character for character, "
                    f"including any spacing the rules add.</p>"),
    }
    if prose:
        p.update(prose)
    return Spec(
        slug=slug, name=name, title=title, desc=desc, h1=name, what=what,
        fields=fields, results=results, formula={}, engine="script",
        engine_note=note, js=js, prose=p, related=related_for(slug),
    )
