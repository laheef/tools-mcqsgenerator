"""The unit registry for the conversion category.

Every unit is stored once, with the factor that turns it into the base unit of
its dimension. A conversion between two units is then one division, and a table
of ten units is ten readings of one number rather than ten hand-written
multipliers. Factors are exact wherever the definition is exact: an inch is
0.0254 m by treaty, a pound is 0.45359237 kg, a US gallon is 3.785411784 L.
"""

from __future__ import annotations

from dataclasses import dataclass


@dataclass(frozen=True)
class Unit:
    key: str
    name: str
    plural: str
    symbol: str
    dim: str
    factor: float

    def __str__(self) -> str:  # pragma: no cover - convenience
        return self.name


UNITS: dict[str, Unit] = {}
DIM: dict[str, str] = {}


def U(key: str, name: str, plural: str, symbol: str, dim: str, factor: float) -> Unit:
    if key in UNITS:
        raise SystemExit(f"duplicate unit key: {key}")
    u = Unit(key, name, plural, symbol, dim, float(factor))
    UNITS[key] = u
    return u


# --------------------------------------------------------------- length (m)
U("m", "metre", "metres", "m", "length", 1)
U("km", "kilometre", "kilometres", "km", "length", 1e3)
U("cm", "centimetre", "centimetres", "cm", "length", 0.01)
U("mm", "millimetre", "millimetres", "mm", "length", 0.001)
U("dm", "decimetre", "decimetres", "dm", "length", 0.1)
U("dam", "decametre", "decametres", "dam", "length", 10)
U("micrometer", "micrometre", "micrometres", "µm", "length", 1e-6)
U("nm", "nanometre", "nanometres", "nm", "length", 1e-9)
U("angstrom", "angstrom", "angstroms", "Å", "length", 1e-10)
U("inch", "inch", "inches", "in", "length", 0.0254)
U("foot", "foot", "feet", "ft", "length", 0.3048)
U("yard", "yard", "yards", "yd", "length", 0.9144)
U("mile", "mile", "miles", "mi", "length", 1609.344)
U("nautical-mile", "nautical mile", "nautical miles", "nmi", "length", 1852)
U("furlong", "furlong", "furlongs", "fur", "length", 201.168)
U("fathom", "fathom", "fathoms", "ftm", "length", 1.8288)
U("chain", "chain", "chains", "ch", "length", 20.1168)
U("rod", "rod", "rods", "rd", "length", 5.0292)
U("league", "league", "leagues", "lea", "length", 4828.032)
U("hand", "hand", "hands", "h", "length", 0.1016)
U("mil", "mil", "mils", "mil", "length", 2.54e-5)
U("light-year", "light-year", "light-years", "ly", "length", 9.4607304725808e15)
U("astronomical-unit", "astronomical unit", "astronomical units", "AU", "length", 1.495978707e11)
U("parsec", "parsec", "parsecs", "pc", "length", 3.0856775814913673e16)
U("fermi", "fermi", "fermis", "fm", "length", 1e-15)
U("point", "point", "points", "pt", "length", 0.0254 / 72)
U("pica", "pica", "picas", "pc-typo", "length", 0.0254 / 6)

# --------------------------------------------------------------- mass (kg)
U("kg", "kilogram", "kilograms", "kg", "mass", 1)
U("g", "gram", "grams", "g", "mass", 1e-3)
U("mg", "milligram", "milligrams", "mg", "mass", 1e-6)
U("mcg", "microgram", "micrograms", "µg", "mass", 1e-9)
U("dag", "decagram", "decagrams", "dag", "mass", 1e-2)
U("tonne", "tonne", "tonnes", "t", "mass", 1e3)
U("pound", "pound", "pounds", "lb", "mass", 0.45359237)
U("ounce", "ounce", "ounces", "oz", "mass", 0.028349523125)
U("stone", "stone", "stone", "st", "mass", 6.35029318)
U("ton", "short ton", "short tons", "tn", "mass", 907.18474)
U("long-ton", "long ton", "long tons", "lt", "mass", 1016.0469088)
U("carat", "carat", "carats", "ct", "mass", 2e-4)
U("grain", "grain", "grains", "gr", "mass", 6.479891e-5)
U("quintal", "quintal", "quintals", "q", "mass", 100)
U("slug", "slug", "slugs", "slug", "mass", 14.59390294)

# -------------------------------------------------------------- volume (L)
U("l", "litre", "litres", "L", "volume", 1)
U("ml", "millilitre", "millilitres", "mL", "volume", 1e-3)
U("cl", "centilitre", "centilitres", "cL", "volume", 1e-2)
U("microlitre", "microlitre", "microlitres", "µL", "volume", 1e-6)
U("cc", "cubic centimetre", "cubic centimetres", "cc", "volume", 1e-3)
U("m3", "cubic metre", "cubic metres", "m³", "volume", 1e3)
U("mm3", "cubic millimetre", "cubic millimetres", "mm³", "volume", 1e-6)
U("cubic-inch", "cubic inch", "cubic inches", "in³", "volume", 0.016387064)
U("cubic-foot", "cubic foot", "cubic feet", "ft³", "volume", 28.316846592)
U("cubic-yard", "cubic yard", "cubic yards", "yd³", "volume", 764.554857984)
U("acre-foot", "acre-foot", "acre-feet", "ac·ft", "volume", 1233481.83754752)
U("gallon", "US gallon", "US gallons", "gal", "volume", 3.785411784)
U("imperial-gallon", "imperial gallon", "imperial gallons", "imp gal", "volume", 4.54609)
U("quart", "US quart", "US quarts", "qt", "volume", 0.946352946)
U("pint", "US pint", "US pints", "pt-liquid", "volume", 0.473176473)
U("imperial-pint", "imperial pint", "imperial pints", "imp pt", "volume", 0.56826125)
U("cup", "US cup", "US cups", "cup", "volume", 0.2365882365)
U("floz", "US fluid ounce", "US fluid ounces", "fl oz", "volume", 0.0295735295625)
U("imperial-floz", "imperial fluid ounce", "imperial fluid ounces", "imp fl oz", "volume", 0.0284130625)
U("tbsp", "tablespoon", "tablespoons", "tbsp", "volume", 0.01478676478125)
U("tsp", "teaspoon", "teaspoons", "tsp", "volume", 0.00492892159375)
U("drop", "drop", "drops", "gtt", "volume", 5e-5)
U("barrel", "oil barrel", "oil barrels", "bbl", "volume", 158.987294928)
U("bushel", "US bushel", "US bushels", "bu", "volume", 35.23907016688)
U("ccf", "CCF", "CCF", "CCF", "volume", 2831.6846592)

# ---------------------------------------------------------------- area (m²)
U("m2", "square metre", "square metres", "m²", "area", 1)
U("km2", "square kilometre", "square kilometres", "km²", "area", 1e6)
U("cm2", "square centimetre", "square centimetres", "cm²", "area", 1e-4)
U("mm2", "square millimetre", "square millimetres", "mm²", "area", 1e-6)
U("hectare", "hectare", "hectares", "ha", "area", 1e4)
U("are", "are", "ares", "a", "area", 100)
U("acre", "acre", "acres", "ac", "area", 4046.8564224)
U("square-foot", "square foot", "square feet", "ft²", "area", 0.09290304)
U("square-inch", "square inch", "square inches", "in²", "area", 6.4516e-4)
U("square-yard", "square yard", "square yards", "yd²", "area", 0.83612736)
U("square-mile", "square mile", "square miles", "mi²", "area", 2589988.110336)
U("cent", "cent", "cents", "cent", "area", 40.468564224)
U("gaj", "gaj", "gaj", "gaj", "area", 0.83612736)
U("katha", "katha", "kathas", "katha", "area", 66.890304)

# ---------------------------------------------------------------- time (s)
U("s", "second", "seconds", "s", "time", 1)
U("ms", "millisecond", "milliseconds", "ms", "time", 1e-3)
U("microsecond", "microsecond", "microseconds", "µs", "time", 1e-6)
U("ns", "nanosecond", "nanoseconds", "ns", "time", 1e-9)
U("minute", "minute", "minutes", "min", "time", 60)
U("hour", "hour", "hours", "h", "time", 3600)
U("day", "day", "days", "d", "time", 86400)
U("week", "week", "weeks", "wk", "time", 604800)
U("fortnight", "fortnight", "fortnights", "fn", "time", 1209600)
U("month", "month", "months", "mo", "time", 2629746)
U("year", "year", "years", "yr", "time", 31556952)
U("decade", "decade", "decades", "dec", "time", 315569520)
U("century", "century", "centuries", "c", "time", 3155695200)

# --------------------------------------------------------------- speed (m/s)
U("mps", "metre per second", "metres per second", "m/s", "speed", 1)
U("kph", "kilometre per hour", "kilometres per hour", "km/h", "speed", 1e3 / 3600)
U("mph", "mile per hour", "miles per hour", "mph", "speed", 0.44704)
U("knot", "knot", "knots", "kn", "speed", 1852 / 3600)
U("fps", "foot per second", "feet per second", "ft/s", "speed", 0.3048)

# -------------------------------------------------------------- pressure (Pa)
U("pa", "pascal", "pascals", "Pa", "pressure", 1)
U("kpa", "kilopascal", "kilopascals", "kPa", "pressure", 1e3)
U("mpa", "megapascal", "megapascals", "MPa", "pressure", 1e6)
U("bar", "bar", "bar", "bar", "pressure", 1e5)
U("psi", "pound per square inch", "pounds per square inch", "psi", "pressure", 6894.757293168)
U("ksi", "kip per square inch", "kips per square inch", "ksi", "pressure", 6894757.293168)
U("atm", "atmosphere", "atmospheres", "atm", "pressure", 101325)
U("mmhg", "millimetre of mercury", "millimetres of mercury", "mmHg", "pressure", 133.322387415)
U("torr", "torr", "torr", "Torr", "pressure", 133.322368421)
U("inh2o", "inch of water", "inches of water", "inH₂O", "pressure", 249.08891)
U("kgcm2", "kilogram per square centimetre", "kilograms per square centimetre", "kgf/cm²", "pressure", 98066.5)

# ---------------------------------------------------------------- energy (J)
U("j", "joule", "joules", "J", "energy", 1)
U("kj", "kilojoule", "kilojoules", "kJ", "energy", 1e3)
U("mj-energy", "megajoule", "megajoules", "MJ", "energy", 1e6)
U("cal", "calorie", "calories", "cal", "energy", 4.184)
U("kcal", "kilocalorie", "kilocalories", "kcal", "energy", 4184)
U("wh", "watt-hour", "watt-hours", "Wh", "energy", 3600)
U("kwh", "kilowatt-hour", "kilowatt-hours", "kWh", "energy", 3.6e6)
U("btu", "British thermal unit", "British thermal units", "BTU", "energy", 1055.05585262)
U("therm", "therm", "therms", "thm", "energy", 105480400)
U("ftlb", "foot-pound", "foot-pounds", "ft·lb", "energy", 1.3558179483314004)
U("inlb", "inch-pound", "inch-pounds", "in·lb", "energy", 0.1129848290276167)
U("nm-energy", "newton-metre", "newton-metres", "N·m", "energy", 1)
U("ev", "electronvolt", "electronvolts", "eV", "energy", 1.602176634e-19)
U("erg", "erg", "ergs", "erg", "energy", 1e-7)

# ----------------------------------------------------------------- power (W)
U("w", "watt", "watts", "W", "power", 1)
U("kw", "kilowatt", "kilowatts", "kW", "power", 1e3)
U("mw-power", "megawatt", "megawatts", "MW", "power", 1e6)
U("hp", "horsepower", "horsepower", "hp", "power", 745.6998715822702)
U("ps", "metric horsepower", "metric horsepower", "PS", "power", 735.49875)
U("btuph", "BTU per hour", "BTU per hour", "BTU/h", "power", 0.29307107017222)

# ----------------------------------------------------------------- force (N)
U("n", "newton", "newtons", "N", "force", 1)
U("kn", "kilonewton", "kilonewtons", "kN", "force", 1e3)
U("lbf", "pound-force", "pounds-force", "lbf", "force", 4.4482216152605)
U("kgf", "kilogram-force", "kilograms-force", "kgf", "force", 9.80665)
U("dyn", "dyne", "dynes", "dyn", "force", 1e-5)

# ---------------------------------------------------------------- angle (rad)
U("radian", "radian", "radians", "rad", "angle", 1)
U("degree", "degree", "degrees", "°", "angle", 0.017453292519943295)
U("gradian", "gradian", "gradians", "gon", "angle", 0.015707963267948967)
U("arcminute", "arcminute", "arcminutes", "′", "angle", 2.908882086657216e-4)
U("arcsecond", "arcsecond", "arcseconds", "″", "angle", 4.84813681109536e-6)
U("turn", "turn", "turns", "turn", "angle", 6.283185307179586)

# ---------------------------------------------------------------- data (B)
U("byte", "byte", "bytes", "B", "data", 1)
U("bit", "bit", "bits", "bit", "data", 0.125)
U("kilobyte", "kilobyte", "kilobytes", "kB", "data", 1e3)
U("megabyte", "megabyte", "megabytes", "MB", "data", 1e6)
U("gigabyte", "gigabyte", "gigabytes", "GB", "data", 1e9)
U("terabyte", "terabyte", "terabytes", "TB", "data", 1e12)
U("petabyte", "petabyte", "petabytes", "PB", "data", 1e15)
U("kibibyte", "kibibyte", "kibibytes", "KiB", "data", 1024)
U("mebibyte", "mebibyte", "mebibytes", "MiB", "data", 1048576)

# --------------------------------------------------------------- rate (bit/s)
U("bps", "bit per second", "bits per second", "bps", "rate", 1)
U("kbps", "kilobit per second", "kilobits per second", "kbps", "rate", 1e3)
U("mbps", "megabit per second", "megabits per second", "Mbps", "rate", 1e6)
U("gbps", "gigabit per second", "gigabits per second", "Gbps", "rate", 1e9)

# ------------------------------------------------------- capacitance (farad)
U("farad", "farad", "farads", "F", "capacitance", 1)
U("millifarad", "millifarad", "millifarads", "mF", "capacitance", 1e-3)
U("microfarad", "microfarad", "microfarads", "µF", "capacitance", 1e-6)
U("nanofarad", "nanofarad", "nanofarads", "nF", "capacitance", 1e-9)
U("picofarad", "picofarad", "picofarads", "pF", "capacitance", 1e-12)

# ------------------------------------------------------- viscosity (Pa·s)
U("pas", "pascal-second", "pascal-seconds", "Pa·s", "viscosity", 1)
U("poise", "poise", "poise", "P", "viscosity", 0.1)
U("cp", "centipoise", "centipoise", "cP", "viscosity", 1e-3)
U("stokes", "stokes", "stokes", "St", "viscosity", 1e-4)
U("centistokes", "centistokes", "centistokes", "cSt", "viscosity", 1e-6)

# ----------------------------------------------------------- radiation (Gy)
U("gray", "gray", "gray", "Gy", "radiation", 1)
U("sievert", "sievert", "sieverts", "Sv", "radiation", 1)
U("rad-dose", "rad", "rad", "rad", "radiation", 0.01)
U("rem", "rem", "rem", "rem", "radiation", 0.01)
U("becquerel", "becquerel", "becquerels", "Bq", "radiation", 1)
U("curie", "curie", "curies", "Ci", "radiation", 3.7e10)
U("roentgen", "roentgen", "roentgens", "R", "radiation", 2.58e-4)

# ------------------------------------------------------------ density (kg/m³)
U("kgm3", "kilogram per cubic metre", "kilograms per cubic metre", "kg/m³", "density", 1)
U("gcm3", "gram per cubic centimetre", "grams per cubic centimetre", "g/cm³", "density", 1e3)
U("gml", "gram per millilitre", "grams per millilitre", "g/mL", "density", 1e3)
U("gl", "gram per litre", "grams per litre", "g/L", "density", 1)
U("lbft3", "pound per cubic foot", "pounds per cubic foot", "lb/ft³", "density", 16.018463373960142)
U("lbgal", "pound per US gallon", "pounds per US gallon", "lb/gal", "density", 119.82642731689663)

# ----------------------------------------------------------------- quantity
U("unit", "unit", "units", "unit", "quantity", 1)
U("dozen", "dozen", "dozen", "doz", "quantity", 12)
U("score", "score", "score", "score", "quantity", 20)
U("gross", "gross", "gross", "gro", "quantity", 144)
U("hundred", "hundred", "hundreds", "100", "quantity", 100)
U("thousand", "thousand", "thousands", "1,000", "quantity", 1e3)
U("lakh", "lakh", "lakh", "lakh", "quantity", 1e5)
U("million", "million", "millions", "1,000,000", "quantity", 1e6)
U("crore", "crore", "crore", "crore", "quantity", 1e7)
U("billion", "billion", "billions", "1,000,000,000", "quantity", 1e9)
U("trillion", "trillion", "trillions", "1,000,000,000,000", "quantity", 1e12)

# --------------------------------------------------------------- dimensions
DIM = {
    "length": ("metre", "length"),
    "mass": ("kilogram", "mass"),
    "volume": ("litre", "volume"),
    "area": ("square metre", "area"),
    "time": ("second", "time"),
    "speed": ("metre per second", "speed"),
    "pressure": ("pascal", "pressure"),
    "energy": ("joule", "energy"),
    "power": ("watt", "power"),
    "force": ("newton", "force"),
    "angle": ("radian", "angle"),
    "data": ("byte", "data"),
    "rate": ("bit per second", "data rate"),
    "capacitance": ("farad", "capacitance"),
    "viscosity": ("pascal-second", "viscosity"),
    "radiation": ("gray", "radiation dose"),
    "density": ("kilogram per cubic metre", "density"),
    "quantity": ("unit", "count"),
}

BASE = {dim: u.key for dim in DIM for u in UNITS.values() if u.dim == dim and u.factor == 1.0 and
        (u.key in ("m", "kg", "l", "m2", "s", "mps", "pa", "j", "w", "n", "radian", "byte",
                   "bps", "farad", "pas", "gray", "kgm3", "unit"))}


def get(key: str) -> Unit:
    try:
        return UNITS[key]
    except KeyError:
        raise SystemExit(f"unknown unit: {key}") from None


def of_dim(dim: str) -> list[Unit]:
    return [u for u in UNITS.values() if u.dim == dim and u.factor != 1.0]


def factor(a: str | Unit, b: str | Unit) -> float:
    """How many b in one a."""
    ua = get(a) if isinstance(a, str) else a
    ub = get(b) if isinstance(b, str) else b
    if ua.dim != ub.dim:
        raise SystemExit(f"{ua.key} and {ub.key} are different dimensions")
    return ua.factor / ub.factor


if __name__ == "__main__":
    by_dim: dict[str, int] = {}
    for u in UNITS.values():
        by_dim[u.dim] = by_dim.get(u.dim, 0) + 1
    print(f"{len(UNITS)} units across {len(by_dim)} dimensions")
    print(", ".join(f"{k} {v}" for k, v in sorted(by_dim.items())))
    print("acre -> are", round(factor("acre", "are"), 8))
    print("1 lb in kg", factor("pound", "kg"))
    print("1 gal in L", factor("gallon", "l"))
