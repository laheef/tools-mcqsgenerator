"""Classify all 330 conversion slugs into the shapes the generator can build.

Every slug in the inventory belongs to exactly one table. `covered()` raises if a
slug is claimed twice, and the audit at the bottom compares the tables against
the inventory so a slug can never be silently skipped.
"""

from __future__ import annotations

import glob
import json
import os
import re

import units
from units import UNITS

ROOT = os.path.abspath(os.path.join(os.path.dirname(__file__), "..", ".."))


def inventory() -> list[dict]:
    rows: list[dict] = []
    for path in sorted(glob.glob(os.path.join(ROOT, "data", "calc", "batch-*.ndjson"))):
        with open(path, encoding="utf-8") as fh:
            for line in fh:
                line = line.strip()
                if not line:
                    continue
                row = json.loads(line)
                if row.get("cat") == "conversion":
                    rows.append(row)
    return sorted(rows, key=lambda r: r["slug"])


# --------------------------------------------------------------- unit aliases
ALIAS: dict[str, str] = {}


def alias(key: str, *names: str) -> None:
    for n in names:
        ALIAS[n] = key


alias("m", "m", "meter", "meters", "metre", "metres")
alias("km", "km", "kilometer", "kilometers", "kilometre", "kilometres", "kilometre")
alias("cm", "cm", "centimeter", "centimeters", "centimetre", "centimetres")
alias("mm", "mm", "millimeter", "millimeters", "millimetre", "millimetres")
alias("dm", "dm", "decimeter", "decimeters")
alias("micrometer", "micrometer", "micrometers", "micron", "microns")
alias("nm", "nm", "nanometer", "nanometers", "nanometre", "nanometres")
alias("angstrom", "angstrom", "angstroms")
alias("inch", "in", "inch", "inches")
alias("foot", "ft", "foot", "feet")
alias("yard", "yd", "yard", "yards")
alias("mile", "mi", "mile", "miles")
alias("nautical-mile", "nautical-mile", "nautical-miles", "nmi")
alias("furlong", "furlong", "furlongs")
alias("mil", "mil", "mils")
alias("light-year", "light-year", "light-years")
alias("astronomical-unit", "astronomical-unit", "au")
alias("point", "pt", "point", "points")

alias("kg", "kg", "kilogram", "kilograms", "kilo", "kilos")
alias("g", "g", "gram", "grams")
alias("mg", "mg", "milligram", "milligrams")
alias("mcg", "mcg", "microgram", "micrograms")
alias("dag", "dag", "decagram", "decagrams")
alias("tonne", "tonne", "tonnes")
alias("pound", "lb", "lbs", "pound", "pounds")
alias("ounce", "oz-mass", "ounce", "ounces")
alias("stone", "stone", "stones")
alias("ton", "ton", "tons")

alias("l", "l", "liter", "liters", "litre", "litres")
alias("cl", "cl", "centiliter", "centiliters")
alias("ml", "ml", "milliliter", "milliliters", "millilitre", "millilitres")
alias("microlitre", "ul", "microliter", "microliters")
alias("cc", "cc")
alias("ccf", "ccf")
alias("m3", "m3", "cubic-meter", "cubic-meters", "cubic-metre", "cubic-metres")
alias("cubic-foot", "cubic-feet", "cubic-foot", "cu-ft")
alias("cubic-inch", "cubic-inches", "cubic-inch")
alias("cubic-yard", "cubic-yards", "cubic-yard")
alias("gallon", "gal", "gallon", "gallons")
alias("imperial-gallon", "imperial-gallon", "imperial-gallons")
alias("quart", "qt", "quart", "quarts")
alias("pint", "pt-liquid", "pint", "pints")
alias("cup", "cup", "cups")
alias("floz", "floz", "fl-oz", "fluid-ounce", "fluid-ounces")
alias("tbsp", "tbsp", "tablespoon", "tablespoons")
alias("tsp", "tsp", "teaspoon", "teaspoons")
alias("drop", "drop", "drops")
alias("barrel", "barrel", "barrels")

alias("m2", "m2", "square-meter", "square-meters", "sqm")
alias("km2", "km2", "square-km", "square-kilometer", "square-kilometers")
alias("cm2", "cm2", "square-centimeter", "square-centimeters")
alias("mm2", "mm2", "square-millimeter", "square-millimeters")
alias("hectare", "hectare", "hectares", "ha")
alias("are", "are", "ares")
alias("acre", "acre", "acres")
alias("square-foot", "square-feet", "square-foot", "sq-ft")
alias("square-inch", "square-inch", "square-inches")
alias("square-yard", "square-yard", "square-yards", "sq-yd")
alias("square-mile", "square-mile", "square-miles")
alias("cent", "cent", "cents", "cents-area")
alias("gaj", "gaj")
alias("katha", "katha")

alias("s", "s", "second", "seconds", "sec", "secs")
alias("ms", "ms", "millisecond", "milliseconds")
alias("minute", "min", "minute", "minutes", "mins")
alias("hour", "h", "hr", "hour", "hours")
alias("day", "day", "days")
alias("week", "week", "weeks")
alias("month", "month", "months")
alias("year", "year", "years", "yr")
alias("decade", "decade", "decades")

alias("kph", "kph", "kmh", "km/h")
alias("mph", "mph")
alias("knot", "knot", "knots")
alias("mps", "mps", "m/s")

alias("pa", "pa", "pascal", "pascals")
alias("kpa", "kpa", "kilopascal", "kilopascals")
alias("mpa", "mpa", "megapascal", "megapascals")
alias("bar", "bar", "bars")
alias("psi", "psi")
alias("ksi", "ksi")
alias("atm", "atm", "atmosphere", "atmospheres")
alias("mmhg", "mmhg")
alias("torr", "torr")
alias("inh2o", "inh2o", "inches-of-water")
alias("kgcm2", "kg-cm2", "kgcm2", "kg/cm2")

alias("j", "j", "joule", "joules")
alias("kj", "kj", "kilojoule", "kilojoules")
alias("cal", "cal", "calorie", "calories")
alias("kcal", "kcal", "kilocalorie", "kilocalories")
alias("kwh", "kwh", "kilowatt-hour", "kilowatt-hours")
alias("btu", "btu", "btus")
alias("ftlb", "ft-lb", "ft-lbs", "foot-pound", "foot-pounds")
alias("inlb", "in-lb", "in-lbs", "inch-lb", "inch-lbs", "inch-pound", "inch-pounds")
alias("nm-energy", "newton-meter", "newton-meters")

alias("w", "w", "watt", "watts")
alias("kw", "kw", "kilowatt", "kilowatts")
alias("hp", "hp", "horsepower")

alias("n", "n", "newton", "newtons")
alias("kn", "kn", "kilonewton", "kilonewtons")
alias("lbf", "lbf", "pounds-force")

alias("radian", "rad", "radian", "radians")
alias("degree", "deg", "degree", "degrees")

alias("byte", "byte", "bytes")
alias("kilobyte", "kb", "kilobyte", "kilobytes")
alias("megabyte", "mb", "megabyte", "megabytes")
alias("gigabyte", "gb", "gigabyte", "gigabytes")
alias("terabyte", "tb", "terabyte", "terabytes")

alias("kbps", "kbps")
alias("mbps", "mbps")
alias("gbps", "gbps")

alias("million", "million", "millions")
alias("billion", "billion", "billions")
alias("trillion", "trillion", "trillions")
alias("lakh", "lakh", "lakhs")
alias("crore", "crore", "crores")
alias("thousand", "thousand", "thousands")
alias("dozen", "dozen", "dozens")

VOLUME_EQUIVALENT = {"cup", "tsp", "tbsp", "floz", "ml", "l", "cc", "pint", "quart", "gallon",
                      "m3", "cubic-foot", "cubic-inch", "cubic-yard", "microlitre"}


def _resolve(token: str, other_dim: str | None = None) -> str | None:
    """A slug fragment to a unit key, with `oz` resolved by the other side."""
    tok = token.strip("-").lower()
    if tok in ("oz", "ounces", "ounce"):
        return "floz" if other_dim == "volume" else "ounce"
    if tok == "nm":
        return "nm-energy" if other_dim == "energy" else "nm"
    if tok in ("minute", "minutes", "mins") and other_dim == "angle":
        return "arcminute"
    if tok in ("second", "seconds", "secs") and other_dim == "angle":
        return "arcsecond"
    key = ALIAS.get(tok)
    if key:
        return "pound" if key == "oz-mass" else key
    return None


def _parse_pair(slug: str) -> tuple[str, str] | None:
    base = re.sub(r"-(conversion|converter)$", "", slug)
    if "-to-" not in base:
        return None
    left, right = base.split("-to-", 1)
    b0 = _resolve(right)
    a = _resolve(left, UNITS[b0].dim if b0 else None)
    dim = UNITS[a].dim if a else None
    if dim == "angle" and right in ("minutes", "seconds"):
        b = "arcminute" if right == "minutes" else "arcsecond"
    else:
        b = _resolve(right, dim)
    if a and b and UNITS[a].dim == UNITS[b].dim and a != b:
        return a, b
    return None


PAIR_OVERRIDES = {
    "kilometer-meter-conversion": ("km", "m"),
    "liter-cc": ("l", "cc"),
    "metric-to-inches": ("cm", "inch"),
    "mm-to-atm-conversion": ("mmhg", "atm"),
    "yards-to-acres": ("square-yard", "acre"),
    "oz-ml-converter": ("floz", "ml"),
    "ml-tbsp-converter": ("ml", "tbsp"),
    "ml-tsp-converter": ("ml", "tsp"),
    "tsp-ml-converter": ("tsp", "ml"),
    "tbsp-to-grams": ("tbsp", "g"),
    "tsp-to-grams": ("tsp", "g"),
    "ms-to-kmh": ("mps", "kph"),
    "cc-to-grams-converter": ("cc", "g"),
    "fluid-ounces-to-pounds-conversion": ("floz", "pound"),
    "liters-to-pounds": ("l", "pound"),
    "gallons-to-pounds": ("gallon", "pound"),
    "quarts-to-pounds": ("quart", "pound"),
    "pint-to-pound": ("pint", "pound"),
    "gallons-to-grams": ("gallon", "g"),
    "kg-to-gallons": ("kg", "gallon"),
    "kg-to-liter": ("kg", "l"),
    "kg-to-ml": ("kg", "ml"),
    "gal-to-kg": ("gallon", "kg"),
    "ml-to-kg": ("ml", "kg"),
    "ml-to-lbs": ("ml", "pound"),
    "mg-to-ml": ("mg", "ml"),
    "mcg-to-ml": ("mcg", "ml"),
    "mg-to-cc": ("mg", "cc"),
    "mg-to-lbs": ("mg", "pound"),
    "cc-to-grams": ("cc", "g"),
    "gram-to-liter": ("g", "l"),
    "cubic-feet-to-pounds": ("cubic-foot", "pound"),
    "gallons-to-cubic-feet": ("gallon", "cubic-foot"),
    "cubic-feet-to-gallons": ("cubic-foot", "gallon"),
    "cubic-inches-to-gallons": ("cubic-inch", "gallon"),
    "cubic-yards-to-tons": ("cubic-yard", "ton"),
    "gallon-to-tons": ("gallon", "ton"),
    "cubic-meter-to-ton": ("m3", "tonne"),
}

# slugs whose two sides are mass and volume: the density box is the point
DENSITY_SLUGS = {
    "fluid-ounces-to-pounds-conversion", "liters-to-pounds", "gallons-to-pounds",
    "quarts-to-pounds", "pint-to-pound", "gallons-to-grams", "kg-to-gallons",
    "kg-to-liter", "kg-to-ml", "gal-to-kg", "ml-to-kg", "ml-to-lbs", "mg-to-ml",
    "mcg-to-ml", "mg-to-cc", "mg-to-lbs", "cc-to-grams", "gram-to-liter",
    "cubic-feet-to-pounds", "cubic-yards-to-tons", "cubic-meter-to-ton",
    "grams-in-ml-converter", "grams-to-fl-oz", "gr-to-ml-converter", "gr-to-tsp-converter",
}


def build_pairs() -> dict[str, tuple[str, str]]:
    out: dict[str, tuple[str, str]] = {}
    for row in inventory():
        slug = row["slug"]
        if slug in DENSITY_SLUGS or slug in DENSITY:
            continue
        if slug in PAIR_OVERRIDES and row["cat"] == "conversion":
            out[slug] = PAIR_OVERRIDES[slug]
            continue
        got = _parse_pair(slug)
        if got:
            out[slug] = got
    return out




# ------------------------------------------------------------- the tables
# A page that offers one input and reads out every unit of its dimension.
MULTI: dict[str, tuple[str, list[str]]] = {
    "acreage": ("acre", []),
    "angle-converter": ("degree", []),
    "area-converter": ("m2", []),
    "astronomical-unit": ("astronomical-unit", []),
    "atm-conversion": ("atm", []),
    "barometric-pressure-conversion": ("mmhg", []),
    "byte-converter": ("byte", []),
    "capacitance-conversion": ("microfarad", []),
    "centimeter": ("cm", []),
    "cgs-system-of-units": ("cm", []),
    "conversion-calculator": ("m", []),
    "cubic-feet": ("cubic-foot", []),
    "cubic-meter": ("m3", []),
    "day-converter": ("day", []),
    "density-converter": ("kgm3", []),
    "distance-converter": ("m", []),
    "dm-conversion": ("dm", []),
    "energy-conversion": ("j", []),
    "feet-converter": ("foot", []),
    "force-conversion": ("n", []),
    "gallon": ("gallon", []),
    "hour-converter": ("hour", []),
    "imperial": ("foot", []),
    "imperial-to-metric-conversion": ("foot", []),
    "inch-converter": ("inch", []),
    "kilometer": ("km", []),
    "kpa-conversion": ("kpa", []),
    "land-area": ("acre", []),
    "length-converter": ("m", []),
    "light-year-conversion": ("light-year", []),
    "measurement-converter": ("m", []),
    "meter-conversion": ("m", []),
    "metric-converter": ("m", []),
    "metric-to-imperial-conversion": ("m", []),
    "micrometer-conversion": ("micrometer", []),
    "mil-conversion": ("mil", []),
    "mile-conversion": ("mile", []),
    "millimeter": ("mm", []),
    "milliseconds-converter": ("ms", []),
    "minute-converter": ("minute", []),
    "mbps-converter": ("mbps", []),
    "cps-converter": ("cp", []),
    "mm-millimeters": ("mm", []),
    "mpa-conversion": ("mpa", []),
    "newton-meter": ("nm-energy", []),
    "nm-converter": ("nm", []),
    "pascal-conversion": ("pa", []),
    "power-conversion": ("w", []),
    "pressure-converter": ("pa", []),
    "pressure-unit-conversion": ("pa", []),
    "psi-conversion": ("psi", []),
    "quantity-converter": ("unit", []),
    "radiation-converter": ("gray", []),
    "seconds-converter": ("s", []),
    "speed-converter": ("mps", []),
    "square-feet-converter": ("square-foot", []),
    "square-meter-converter": ("m2", []),
    "square-yard-converter": ("square-yard", []),
    "time-unit-converter": ("s", []),
    "volume-conversion": ("l", []),
    "weight-converter": ("kg", []),
    "weird-units": ("m", ["furlong", "fathom", "chain", "rod", "league", "hand",
                          "light-year", "astronomical-unit", "parsec", "angstrom"]),
    "yard-conversion": ("yard", []),
}

# Temperature is the one dimension with offsets, so it gets its own shape.
TEMPERATURE: dict[str, str] = {
    "celsius-converter": "C",
    "celsius-to-fahrenheit": "C",
    "centigrade-to-celsius": "C",
    "fahrenheit": "F",
    "fahrenheit-to-celsius": "F",
    "kelvin-converter": "K",
    "kelvin-to-celsius": "K",
    "kelvin-to-fahrenheit": "K",
    "temperature-converter": "C",
}

# Coins: a count in, dollars out, one division per page.
MONEY: dict[str, tuple[str, float]] = {
    "cents-to-dollars": ("cent", 100),
    "dimes-to-dollars": ("dime", 10),
    "nickels-to-dollars": ("nickel", 20),
    "pennies-to-dollars": ("penny", 100),
    "quarters-to-dollars": ("quarter", 4),
}

# A page whose two sides are mass and volume, with the density as a box.
DENSITY: dict[str, tuple[str, str]] = {
    "cc-to-grams-converter": ("cc", "g"),
    "cubic-feet-to-pounds": ("cubic-foot", "pound"),
    "cubic-meter-to-ton": ("m3", "tonne"),
    "cubic-yards-to-tons": ("cubic-yard", "ton"),
    "fluid-ounces-to-pounds-conversion": ("floz", "pound"),
    "gal-to-kg": ("gallon", "kg"),
    "gallon-to-tons": ("gallon", "ton"),
    "gallons-to-grams": ("gallon", "g"),
    "gallons-to-pounds": ("gallon", "pound"),
    "gram-to-liter-conversion": ("g", "l"),
    "grams-in-ml-converter": ("g", "ml"),
    "grams-to-fl-oz": ("g", "floz"),
    "gr-to-ml-converter": ("grain", "ml"),
    "gr-to-tsp-converter": ("grain", "tsp"),
    "kg-to-gallons": ("kg", "gallon"),
    "kg-to-liter": ("kg", "l"),
    "kg-to-ml": ("kg", "ml"),
    "liters-to-pounds": ("l", "pound"),
    "mcg-to-ml": ("mcg", "ml"),
    "mg-to-cc": ("mg", "cc"),
    "mg-to-lbs": ("mg", "pound"),
    "mg-to-ml": ("mg", "ml"),
    "ml-to-kg": ("ml", "kg"),
    "ml-to-lbs": ("ml", "pound"),
    "pint-to-pound": ("pint", "pound"),
    "quarts-to-pounds": ("quart", "pound"),
    "tbsp-to-grams": ("tbsp", "g"),
    "tsp-to-grams": ("tsp", "g"),
}

# Scale and money-of-numbers pages: one figure, one word, a power of ten.
SCALE: dict[str, str] = {
    "number-to-million": "million",
    "number-to-billion-converter": "billion",
}

CALC: dict[str, str] = {
    "bar-to-psig-conversion": "gauge pressure from absolute bar",
    "mpa-to-psig-conversion": "gauge pressure from megapascals",
    "psig-to-psia-conversion": "absolute from gauge",
    "lbs-to-psi": "pressure from a force and an area",
    "psi-to-gpm": "flow through an orifice",
    "joules-to-volts": "voltage from energy stored in a capacitor",
    "rms-to-watts": "power from RMS voltage and resistance",
    "newton-to-joules": "work from force and distance",
    "dbm-to-watts": "radio power",
    "torque-to-horsepower": "power from torque and speed",
    "grams-to-calories": "food energy",
    "fuel-economy-converter": "mpg and L/100 km",
    "hardness-conversion": "Brinell, Rockwell and Vickers",
    "scale-conversion": "map scale",
    "mesh-to-micron-converter": "sieve opening from mesh count",
    "pixels-to-inches": "pixels to physical size",
    "px-to-em": "CSS units",
    "inches-to-fraction": "decimal inches to the nearest fraction",
    "minutes-to-decimal-conversion": "minutes to decimal hours",
    "cm-to-ft-in-converter": "centimetres to feet and inches",
    "feet-and-inches": "feet and inches to metres",
    "height-converter": "height in cm, feet and inches",
    "height-in-inches": "height in inches",
    "cm-height-conversion": "centimetres to feet and inches",
    "pounds-ounces": "pounds and ounces to kilograms",
    "lot-size-to-square-feet": "plot size from width and depth",
    "lot-size-to-acres": "plot size in acres",
    "paper-quantity": "sheets, quires and reams",
    "ccf-to-therms": "gas billing",
    "natural-gas-converter": "gas volume and energy",
    "ppm": "parts per million",
    "ppm-to-mgl-converter": "ppm to mg/L",
    "lbs-to-pounds": "the same unit twice",
    "pounds-to-lbs": "the same unit twice",
    "mg-to-teaspoon-converter": "a dose as a spoonful",
    "mg-to-tablespoon-converter": "a dose as a spoonful",
    "price-per-liter-to-price-per-gallon": "price per litre and gallon",
    "cents-to-euros": "a currency rate as a box",
    "lbs-to-newton": "weight to force",
    "dimensional-analysis": "a figure in engineering notation",
    "metric-to-sae": "wrench sizes",
    "metric-to-standard-converter": "wrench sizes",
}

# Pages where the arithmetic is a script rather than a formula: number bases,
# ciphers, time zones, colours. The formula table stays empty on purpose and
# the page says so, because an empty table with an explanation is honest and a
# made-up formula is not.
SCRIPT: dict[str, str] = {
    "binary": "decimal to binary and back",
    "binary-to-hexadecimal": "binary digits to hex",
    "binary-to-octal": "binary digits to octal",
    "decimal-to-hexadecimal": "decimal to hex",
    "decimal-to-octal": "decimal to octal",
    "hexadecimal": "hex to decimal and binary",
    "roman-numerals": "numbers to Roman numerals and back",
    "leet-speak": "text to leet",
    "gematria": "letter values",
    "greek-gematria": "Greek letter values",
    "unicode-text": "characters to code points",
    "uppercase-to-lowercase-converter": "case",
    "lowercase-to-uppercase-converter": "case",
    "color-converter": "colour between hex, rgb and hsl",
    "hex-to-rgb": "hex to rgb",
    "rgb-to-hex": "rgb to hex",
    "military-time": "24-hour clock",
    "zulu-time-converter": "UTC",
    "time-zones": "one clock, two cities",
    "unix-time": "epoch seconds to a date",
    "coordinates-converter": "decimal to degrees, minutes, seconds",
    "lat-long-to-utm": "latitude and longitude to UTM",
    "degrees-minutes-seconds": "degrees, minutes, seconds to decimal",
}


PAIRS = build_pairs()


def covered() -> dict[str, str]:
    seen: dict[str, str] = {}

    def take(slugs, table):
        for slug in slugs:
            if slug in seen:
                raise SystemExit(f"{slug} is claimed by {seen[slug]} and {table}")
            seen[slug] = table

    take(PAIRS, "PAIRS")
    take(DENSITY, "DENSITY")
    take(MULTI, "MULTI")
    take(TEMPERATURE, "TEMPERATURE")
    take(MONEY, "MONEY")
    take(SCALE, "SCALE")
    take(CALC, "CALC")
    take(SCRIPT, "SCRIPT")
    return seen


if __name__ == "__main__":
    rows = inventory()
    slugs = {r["slug"] for r in rows}
    got = covered()
    missing = sorted(slugs - set(got))
    extra = sorted(set(got) - slugs)
    counts: dict[str, int] = {}
    for table in got.values():
        counts[table] = counts.get(table, 0) + 1
    print(f"{len(slugs)} slugs, {len(got)} classified")
    print("  " + ", ".join(f"{k} {v}" for k, v in sorted(counts.items())))
    if missing:
        print("MISSING", len(missing))
        for m in missing:
            print("  -", m)
    if extra:
        print("EXTRA", len(extra))
        for m in extra:
            print("  +", m)
