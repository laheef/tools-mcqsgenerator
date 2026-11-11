"""Does every conversion page give the RIGHT answer when Calculate is pressed?

Three kinds of page, three independent ways to know the right answer. Nothing
here reads the page's own formula to decide what is correct.

  unit pages (263)
      Recomputed from FACTS below — a table of unit sizes typed in from their
      definitions (the treaty inch, the international pound, the US gallon, the
      IAU light-year …) and deliberately NOT imported from tools/conversion/
      units.py, so a wrong factor in the project cannot certify itself.

  formula pages (42)
      A hand-derived expectation per page, written from the physics: 0 dBm is
      1 mW, V = sqrt(2E/C), P = V²/R, Q = Cd·A·sqrt(2gΔh), kW = T·ω/1000.

  script pages (23)
      A separate implementation in Python of the rule the page states: Roman
      numerals, bases 2/8/16, RGB/HSL, DMS, UTM, time zones, oracles from the
      standard library where one exists (datetime, zoneinfo).

Each page is loaded in Chromium, values are typed, Calculate is pressed, and the
number on screen is compared with the independent expectation to within half of
the last digit shown. A result that is merely "a number" does not pass.

Usage:
    python3 tools/conversion/correctness_qa.py [--host URL] [--workers 4]
                                              [--only prefix] [--verbose]
"""

from __future__ import annotations

import argparse
import json
import math
import os
import re
import sys
from concurrent.futures import ThreadPoolExecutor
from datetime import datetime, timedelta, timezone

sys.path.insert(0, os.path.dirname(os.path.abspath(__file__)))
import catalog  # noqa: E402

HOST = "http://127.0.0.1:8099"
ROOT = os.path.abspath(os.path.join(os.path.dirname(os.path.abspath(__file__)), "..", ".."))

# ---------------------------------------------------------------------------
# FACTS — unit sizes in the base unit of their dimension, from the definition.
# length in metres, mass in kilograms, volume in litres, area in square metres,
# time in seconds, speed in m/s, pressure in pascals, energy in joules,
# power in watts, force in newtons, angle in radians, data in bytes,
# rate in bits/s, capacitance in farads, viscosity in Pa·s, radiation in gray,
# density in kg/m³, quantity in units.
# ---------------------------------------------------------------------------
FACTS: dict[str, float] = {
    # length (m)
    "m": 1.0, "km": 1000.0, "cm": 0.01, "mm": 0.001, "dm": 0.1, "dam": 10.0,
    "micrometer": 1e-6, "nm": 1e-9, "angstrom": 1e-10,
    "inch": 0.0254, "foot": 0.3048, "yard": 0.9144, "mile": 1609.344,
    "nautical-mile": 1852.0, "furlong": 201.168, "fathom": 1.8288,
    "chain": 20.1168, "rod": 5.0292, "league": 4828.032, "hand": 0.1016,
    "mil": 2.54e-5, "light-year": 9460730472580800.0,
    "astronomical-unit": 149597870700.0, "parsec": 3.085677581491367e16,
    "fermi": 1e-15, "point": 0.0254 / 72, "pica": 12 * 0.0254 / 72,
    # mass (kg)
    "kg": 1.0, "g": 0.001, "mg": 1e-6, "mcg": 1e-9, "dag": 0.01,
    "tonne": 1000.0, "pound": 0.45359237, "ounce": 0.45359237 / 16,
    "stone": 14 * 0.45359237, "ton": 2000 * 0.45359237,
    "long-ton": 2240 * 0.45359237, "carat": 0.0002, "grain": 6.479891e-5,
    "quintal": 100.0, "slug": 14.59390294,
    # volume (L)
    "l": 1.0, "ml": 0.001, "cl": 0.01, "microlitre": 1e-6, "cc": 0.001,
    "m3": 1000.0, "mm3": 1e-6, "cubic-inch": 0.0254 ** 3 * 1000,
    "cubic-foot": 0.3048 ** 3 * 1000, "cubic-yard": 0.9144 ** 3 * 1000,
    "acre-foot": 4046.8564224 * 0.3048 * 1000,
    "gallon": 3.785411784, "imperial-gallon": 4.54609,
    "quart": 3.785411784 / 4, "pint": 3.785411784 / 8,
    "imperial-pint": 4.54609 / 8, "cup": 3.785411784 / 16,
    "floz": 3.785411784 / 128, "imperial-floz": 4.54609 / 160,
    "tbsp": 3.785411784 / 256, "tsp": 3.785411784 / 768,
    "drop": 5e-5, "barrel": 42 * 3.785411784,
    "bushel": 35.23907016688, "ccf": 100 * 0.3048 ** 3 * 1000,
    # area (m²)
    "m2": 1.0, "km2": 1e6, "cm2": 1e-4, "mm2": 1e-6,
    "hectare": 1e4, "are": 100.0, "acre": 4046.8564224,
    "square-foot": 0.3048 ** 2, "square-inch": 0.0254 ** 2,
    "square-yard": 0.9144 ** 2, "square-mile": 1609.344 ** 2,
    "cent": 4046.8564224 / 100, "gaj": 0.9144 ** 2, "katha": 66.890304,
    # time (s)
    "s": 1.0, "ms": 0.001, "microsecond": 1e-6, "ns": 1e-9,
    "minute": 60.0, "hour": 3600.0, "day": 86400.0, "week": 604800.0,
    "fortnight": 1209600.0, "month": 365.2425 * 86400 / 12,
    "year": 365.2425 * 86400, "decade": 365.2425 * 86400 * 10,
    "century": 365.2425 * 86400 * 100,
    # speed (m/s)
    "mps": 1.0, "kph": 1000 / 3600, "mph": 1609.344 / 3600,
    "knot": 1852 / 3600, "fps": 0.3048,
    # pressure (Pa)
    "pa": 1.0, "kpa": 1000.0, "mpa": 1e6, "bar": 1e5,
    "psi": 4.4482216152605 / 0.00064516, "ksi": 1000 * 4.4482216152605 / 0.00064516,
    "atm": 101325.0, "mmhg": 133.322387415, "torr": 101325 / 760,
    "inh2o": 249.08891, "kgcm2": 98066.5,
    # energy (J)
    "j": 1.0, "kj": 1000.0, "mj-energy": 1e6, "cal": 4.184, "kcal": 4184.0,
    "wh": 3600.0, "kwh": 3.6e6, "btu": 1055.05585262, "therm": 105480400.0,
    "ftlb": 0.3048 * 4.4482216152605, "inlb": 0.0254 * 4.4482216152605,
    "nm-energy": 1.0, "ev": 1.602176634e-19, "erg": 1e-7,
    # power (W)
    "w": 1.0, "kw": 1000.0, "mw-power": 1e6,
    "hp": 550 * 0.3048 * 4.4482216152605, "ps": 735.49875,
    "btuph": 1055.05585262 / 3600,
    # force (N)
    "n": 1.0, "kn": 1000.0, "lbf": 4.4482216152605, "kgf": 9.80665, "dyn": 1e-5,
    # angle (rad)
    "radian": 1.0, "degree": math.pi / 180, "gradian": math.pi / 200,
    "arcminute": math.pi / 10800, "arcsecond": math.pi / 648000,
    "turn": 2 * math.pi,
    # data (bytes)
    "byte": 1.0, "bit": 0.125, "kilobyte": 1e3, "megabyte": 1e6,
    "gigabyte": 1e9, "terabyte": 1e12, "petabyte": 1e15,
    "kibibyte": 1024.0, "mebibyte": 1048576.0,
    # transfer rate (bit/s)
    "bps": 1.0, "kbps": 1e3, "mbps": 1e6, "gbps": 1e9,
    # capacitance (F)
    "farad": 1.0, "millifarad": 1e-3, "microfarad": 1e-6,
    "nanofarad": 1e-9, "picofarad": 1e-12,
    # viscosity (Pa·s)
    "pas": 1.0, "poise": 0.1, "cp": 0.001, "stokes": 1e-4, "centistokes": 1e-6,
    # radiation (Gy)
    "gray": 1.0, "sievert": 1.0, "rad-dose": 0.01, "rem": 0.01,
    "becquerel": 1.0, "curie": 3.7e10, "roentgen": 2.58e-4,
    # density (kg/m³)
    "kgm3": 1.0, "gcm3": 1000.0, "gml": 1000.0, "gl": 1.0,
    "lbft3": 0.45359237 / 0.3048 ** 3,
    "lbgal": 0.45359237 / 0.003785411784,   # kg/m³: 1 lb in 1 US gal
    # quantity (units)
    "unit": 1.0, "dozen": 12.0, "score": 20.0, "gross": 144.0,
    "hundred": 100.0, "thousand": 1000.0, "lakh": 1e5, "million": 1e6,
    "crore": 1e7, "billion": 1e9, "trillion": 1e12,
}

PROBES = ("1", "7.5", "1234.5")

# ---------------------------------------------------------------------------
# The display rule, from docs/calc-files.md. Used only to decide how close the
# number on screen has to be to the expected one.
# ---------------------------------------------------------------------------


def decimals_for(v: float) -> int:
    """Decimals the site would print for v under its own rule (0 is enough)."""
    a = abs(v)
    if a >= 1 or a == 0:
        return 3
    need = 3 - int(math.floor(math.log10(a)))
    return max(0, min(6, need))


def parse_display(s: str) -> tuple[float, float]:
    """'1 609.344' -> (1609.344, 0.0005);  '6.214 ×10^-4' -> (6.214e-4, 5e-8).

    The second value is half of the last digit the display actually shows —
    the largest error a correctly rounded reading of that many digits can have.
    """
    t = re.sub(r"[\s\u00a0\u2009\u202f]", "", s or "").replace("\u2212", "-")
    m = re.match(r"^(-?[0-9.]+)×10\^?(-?\d+)$", t)
    if m:
        mant = float(m.group(1))
        exp = int(m.group(2))
        dec = len(m.group(1).split(".")[1]) if "." in m.group(1) else 0
        return mant * 10 ** exp, 0.5 * 10 ** (exp - dec)
    value = float(t)
    dec = len(t.split(".")[1]) if "." in t else 0
    return value, 0.5 * 10 ** -dec


def check_number(shown: str, want: float) -> str:
    """'' when the number on screen is the expected value at the shown precision."""
    if not (shown or "").strip():
        return f"blank, wanted {want:g}"
    try:
        got, half = parse_display(shown)
    except ValueError:
        return f"{shown!r} is not a number, wanted {want:g}"
    tol = max(half, abs(want) * 1e-9, 1e-15)
    if abs(got - want) > tol * 1.000001:
        return f"shows {shown} ({got!r}), wanted {want:.10g}"
    # Below one the site prints four significant figures; a two-digit reading
    # there (0.025 for 0.0254) is inside the rounding but throws the answer
    # away. Above one, three decimals is the rule and fewer digits is right.
    if 1e-3 <= abs(want) < 1:
        digits = sum(ch.isdigit() for ch in shown if ch.isdigit())
        if digits < 3 and abs(got - want) > abs(want) * 1e-9 + 1e-15:
            return f"shows only {digits} digits ({shown}) for {want:.10g}"
    return ""


def check_text(shown: str, want: str) -> str:
    a = " ".join((shown or "").split())
    b = " ".join(want.split())
    return "" if a == b else f"{a!r}, wanted {b!r}"


# ---------------------------------------------------------------------------
# Independent expectations for the 42 formula pages.
# name -> (inputs, {output: expected number})
# ---------------------------------------------------------------------------
KPA_ATM = 14.6959          # psi in one atmosphere, to the digit the page prints
PSI_PER_BAR = 100000 / 6894.757293168


def calc_expectations() -> dict[str, tuple[dict[str, str], dict[str, float]]]:
    out: dict[str, tuple[dict[str, str], dict[str, float]]] = {}

    def add(slug, inputs, **want):
        out[slug] = (inputs, {k.replace("_x_", "-"): v for k, v in want.items()})

    add("bar-to-psig-conversion", {"bar": "2"},
        psia=2 * PSI_PER_BAR, psig=2 * PSI_PER_BAR - KPA_ATM, kpa=200)
    add("ccf-to-therms", {"ccf": "10", "factor": "1.0367"},
        therms=10 * 1.0367, kwh=10 * 1.0367 * 29.30710701722222,
        m3=10 * 100 * 0.3048 ** 3)
    add("cents-to-euros", {"cents": "10000", "rate": "0.92"},
        euros=100 * 0.92, dollars=100, rate_used=0.92)
    add("cm-height-conversion", {"cm": "180"},
        inches_total=180 / 2.54, ft=math.floor(180 / 2.54 / 12),
        **{"in": 180 / 2.54 - math.floor(180 / 2.54 / 12) * 12})
    add("cm-to-ft-in-converter", {"cm": "180"},
        total_inches=180 / 2.54, feet=math.floor(180 / 2.54 / 12),
        inches=180 / 2.54 - math.floor(180 / 2.54 / 12) * 12)
    add("dbm-to-watts", {"dbm": "30"},
        watts=10 ** ((30 - 30) / 10), milliwatts=10 ** (30 / 10), dbw=0)
    add("dimensional-analysis", {"value": "12345"},
        power=math.log10(12345),
        mantissa=12345 / 10 ** (math.floor(math.log10(12345) / 3) * 3),
        engineering=math.floor(math.log10(12345) / 3) * 3)
    add("feet-and-inches", {"feet": "5", "inches": "11"},
        total_inches=71, m=71 * 0.0254, cm=71 * 2.54)
    add("fuel-economy-converter", {"mpg": "30"},
        l100=235.214583 / 30, kmpl=30 * 1.609344 / 3.785411784,
        mpg_imp=30 * 4.54609 / 3.785411784)
    add("grams-to-calories", {"grams": "100"},
        kcal=400, kj=400 * 4.184, share=400 / 2000 * 100)
    add("hardness-conversion", {"hb": "250"},
        hrc=0.944 * 250 - 17.7, hv=1.05 * 250, tensile=3.45 * 250)
    add("height-converter", {"cm": "180"},
        m=1.8, feet=math.floor(180 / 2.54 / 12),
        inches=180 / 2.54 - math.floor(180 / 2.54 / 12) * 12)
    add("height-in-inches", {"feet": "5", "inches": "11"},
        total_inches=71, cm=71 * 2.54, m=71 * 0.0254)
    add("inches-to-fraction", {"inches": "2.7543"},
        whole=2, numerator=24, denominator=32, nm32=24)
    add("joules-to-volts", {"energy": "1", "capacitance": "0.001"},
        volts=math.sqrt(2 * 1 / 0.001), charge=0.001 * math.sqrt(2 * 1 / 0.001),
        microfarad=1000)
    add("lbs-to-newton", {"pounds": "100"},
        newtons=100 * 0.45359237 * 9.80665, kgf=100 * 0.45359237,
        kn=100 * 0.45359237 * 9.80665 / 1000)
    add("lbs-to-pounds", {"value": "10"},
        pounds=10, kg=10 * 0.45359237, oz=160)
    add("lbs-to-psi", {"force": "100", "area": "4"},
        psi=25, kpa=25 * 6894.757293168 / 1000, bar=25 * 6894.757293168 / 1e5)
    add("lot-size-to-acres", {"width": "100", "depth": "200"},
        acres=20000 / 43560, sqft=20000,
        hectares=20000 * 0.09290304 / 10000)
    add("lot-size-to-square-feet", {"width": "100", "depth": "200"},
        sqft=20000, sqm=20000 * 0.09290304, acres=20000 / 43560)
    add("mesh-to-micron-converter", {"mesh": "100"},
        micron=149, mm=0.149, inch=149 / 25400)
    add("metric-to-sae", {"mm": "13"},
        inches=13 / 25.4, n32=math.floor(13 / 25.4 * 32 + 0.5),
        decimal32=math.floor(13 / 25.4 * 32 + 0.5) / 32)
    add("metric-to-standard-converter", {"mm": "13"},
        inches=13 / 25.4, nm64=math.floor(13 / 25.4 * 64 + 0.5),
        decimal64=math.floor(13 / 25.4 * 64 + 0.5) / 64)
    add("mg-to-tablespoon-converter", {"mg": "5000", "density": "1000"},
        ml=5, tbsp=5 / 14.78676478125, tsp=5 / 4.92892159375)
    add("mg-to-teaspoon-converter", {"mg": "5000", "density": "1000"},
        ml=5, tsp=5 / 4.92892159375, tbsp=5 / 14.78676478125)
    add("minutes-to-decimal-conversion", {"minutes": "90"},
        hours=1.5, whole=1, rest=30)
    add("mpa-to-psig-conversion", {"mpa": "1"},
        psia=1e6 / 6894.757293168, psig=1e6 / 6894.757293168 - KPA_ATM, bar=10)
    add("natural-gas-converter", {"ccf": "10", "factor": "1.0367", "price": "1.25"},
        therms=10 * 1.0367, kwh=10 * 1.0367 * 29.30710701722222,
        cost=10 * 1.0367 * 1.25)
    add("newton-to-joules", {"force": "10", "distance": "3"},
        joules=30, ftlb=30 / 1.3558179483314004, kj=0.03)
    add("paper-quantity", {"sheets": "1200"},
        reams=2.4, quires=48, sheets_left=200)
    add("pixels-to-inches", {"px": "192", "ppi": "96"},
        inches=2, cm=5.08, mm=50.8)
    add("pounds-ounces", {"pounds": "3", "ounces": "5"},
        total_oz=53, kg=53 * 0.028349523125, g=53 * 28.349523125)
    add("pounds-to-lbs", {"value": "10"},
        lbs=10, kg=10 * 0.45359237, g=10 * 453.59237)
    add("ppm", {"ppm": "500"}, percent=0.05, mgl=500, ratio=2000)
    add("ppm-to-mgl-converter", {"ppm": "500", "density": "1"},
        mgl=500, mgkg=500, percent=0.05)
    add("price-per-liter-to-price-per-gallon", {"price": "1.5"},
        per_gallon=1.5 * 3.785411784, per_quart=1.5 * 3.785411784 / 4,
        per_100km=1.5 * 7)
    v = math.sqrt(2 * 32.174 * (30 * 2.30908))
    gpm = 0.62 * math.pi * (0.5 / 12) ** 2 / 4 * v * 448.831
    add("psi-to-gpm", {"psi": "30", "diameter": "0.5", "cd": "0.62"},
        velocity=v, gpm=gpm, lpm=gpm * 3.785411784)
    add("psig-to-psia-conversion", {"psig": "30", "atmospheric": "14.6959"},
        psia=30 + 14.6959, bar=44.6959 * 6894.757293168 / 1e5,
        kpa=44.6959 * 6.894757293168)
    add("px-to-em", {"px": "32", "base": "16", "root": "16"},
        em=2, rem=2, pt=24, percent=200)
    add("rms-to-watts", {"vrms": "10", "resistance": "8"},
        watts=12.5, amps=1.25, peak=10 * math.sqrt(2))
    add("scale-conversion", {"scale": "50000", "length": "10"},
        km=5, m=5000, miles=5 / 1.609344)
    kw = 300 * 3000 * 2 * math.pi / 60 / 1000
    add("torque-to-horsepower", {"torque": "300", "rpm": "3000"},
        kw=kw, hp=kw / 0.7456998715822702, ps=kw / 0.73549875)
    return out


CALC_SPECS = calc_expectations()

# ---------------------------------------------------------------------------
# Independent implementations for the 23 script pages.
# ---------------------------------------------------------------------------
ROMAN = [(1000, "M"), (900, "CM"), (500, "D"), (400, "CD"), (100, "C"),
         (90, "XC"), (50, "L"), (40, "XL"), (10, "X"), (9, "IX"),
         (5, "V"), (4, "IV"), (1, "I")]


def to_roman(n: int) -> str:
    if not 0 < n < 4000:
        return ""
    s = ""
    for v, r in ROMAN:
        while n >= v:
            s += r
            n -= v
    return s


def from_roman(text: str) -> int:
    m = {"I": 1, "V": 5, "X": 10, "L": 50, "C": 100, "D": 500, "M": 1000}
    s = re.sub(r"[^IVXLCDM]", "", text.upper())
    total = 0
    for i, ch in enumerate(s):
        v = m[ch]
        nxt = m[s[i + 1]] if i + 1 < len(s) else 0
        total += -v if v < nxt else v
    return total


def base_str(n: int, b: int) -> str:
    if n == 0:
        return "0"
    digits = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"
    s = ""
    while n:
        s = digits[n % b] + s
        n //= b
    return s


LEET = {"a": "4", "b": "8", "e": "3", "g": "6", "i": "1", "l": "1",
        "o": "0", "s": "5", "t": "7"}


def leet(text: str) -> tuple[str, int]:
    out, changed = [], 0
    for ch in text:
        low = ch.lower()
        if low in LEET:
            out.append(LEET[low])
            changed += 1
        else:
            out.append(ch)
    return "".join(out), changed


GREEK = {"Α": 1, "Β": 2, "Γ": 3, "Δ": 4, "Ε": 5, "Ζ": 7, "Η": 8, "Θ": 9,
         "Ι": 10, "Κ": 20, "Λ": 30, "Μ": 40, "Ν": 50, "Ξ": 60, "Ο": 70,
         "Π": 80, "Ρ": 100, "Σ": 200, "Τ": 300, "Υ": 400, "Φ": 500,
         "Χ": 600, "Ψ": 700, "Ω": 800, "Ϛ": 6, "Ͱ": 8}


def hsl_of(hexstr: str) -> str:
    s = hexstr.lstrip("#").strip()
    if len(s) == 3:
        s = "".join(c * 2 for c in s)
    r, g, b = (int(s[i:i + 2], 16) / 255 for i in (0, 2, 4))
    mx, mn = max(r, g, b), min(r, g, b)
    h = s_ = 0.0
    l = (mx + mn) / 2
    if mx != mn:
        d = mx - mn
        s_ = d / (2 - mx - mn) if l > 0.5 else d / (mx + mn)
        if mx == r:
            h = (g - b) / d + (6 if g < b else 0)
        elif mx == g:
            h = (b - r) / d + 2
        else:
            h = (r - g) / d + 4
        h *= 60
    return f"hsl({round(h)}, {round(s_ * 100)}%, {round(l * 100)}%)"


def utm_forward(lat: float, lon: float) -> tuple[float, float, str]:
    a = 6378137.0
    f = 1 / 298.257223563
    k0 = 0.9996
    zone = int(math.floor((lon + 180) / 6)) + 1
    lon0 = (zone - 1) * 6 - 180 + 3
    rad = math.pi / 180
    e2 = 2 * f - f * f
    ep2 = e2 / (1 - e2)
    phi, lam, lam0 = lat * rad, lon * rad, lon0 * rad
    n = a / math.sqrt(1 - e2 * math.sin(phi) ** 2)
    t = math.tan(phi) ** 2
    c = ep2 * math.cos(phi) ** 2
    aa = math.cos(phi) * (lam - lam0)
    m = a * ((1 - e2 / 4 - 3 * e2 ** 2 / 64 - 5 * e2 ** 3 / 256) * phi
             - (3 * e2 / 8 + 3 * e2 ** 2 / 32 + 45 * e2 ** 3 / 1024) * math.sin(2 * phi)
             + (15 * e2 ** 2 / 256 + 45 * e2 ** 3 / 1024) * math.sin(4 * phi)
             - (35 * e2 ** 3 / 3072) * math.sin(6 * phi))
    easting = k0 * n * (aa + (1 - t + c) * aa ** 3 / 6
                        + (5 - 18 * t + t * t + 72 * c - 58 * ep2) * aa ** 5 / 120) + 500000
    northing = k0 * (m + n * math.tan(phi) * (aa ** 2 / 2
                                              + (5 - t + 9 * c + 4 * c * c) * aa ** 4 / 24
                                              + (61 - 58 * t + t * t + 600 * c - 330 * ep2) * aa ** 6 / 720))
    if lat < 0:
        northing += 10000000
    return easting, northing, f"{zone}{'N' if lat >= 0 else 'S'}"


def dms(value: float, pos: str, neg: str) -> str:
    hemi = neg if value < 0 else pos
    a = abs(value)
    d = math.floor(a)
    mf = (a - d) * 60
    m = math.floor(mf)
    s = (mf - m) * 60
    return f"{d}° {m}′ {s:.1f}″ {hemi}"


def script_expectations() -> dict[str, tuple[dict[str, str], dict[str, float], dict[str, str]]]:
    """slug -> (inputs, numbers, text)"""
    out = {}

    def add(slug, inputs, num=None, text=None):
        out[slug] = (inputs, num or {}, text or {})

    add("binary", {"number": "42"},
        text={"binary": "101010", "octal": "52", "hex": "2A"})
    add("binary-to-hexadecimal", {"binary": "101010"},
        num={"decimal": 42}, text={"hex": "2A", "octal": "52"})
    add("binary-to-octal", {"binary": "1010"},
        num={"decimal": 10}, text={"octal": "12", "hex": "A"})
    add("decimal-to-hexadecimal", {"number": "255"},
        text={"hex": "FF", "binary": "11111111", "octal": "377"})
    add("decimal-to-octal", {"number": "255"},
        text={"octal": "377", "binary": "11111111", "hex": "FF"})
    add("hexadecimal", {"hex": "FF"},
        num={"decimal": 255}, text={"binary": "11111111", "octal": "377"})
    add("roman-numerals", {"number": "1987", "roman": "MMXXIV"},
        num={"arabic_out": 2024}, text={"roman_out": "MCMLXXXVII", "length": "10"})
    add("leet-speak", {"text": "Elite hacker"},
        num={"changed": 7, "length": 12}, text={"leet": "31173 h4ck3r"})
    add("gematria", {"text": "Elite hacker"},
        num={"total": 97, "reduced": 7, "letters": 11})
    add("greek-gematria", {"text": "λόγος"},
        num={"total": 373, "letters": 5, "words": 1})
    add("rgb-to-hex", {"r": "52", "g": "152", "b": "219"},
        num={"total": 423}, text={"hex": "#3498db", "rgb": "rgb(52, 152, 219)"})
    add("hex-to-rgb", {"hex": "#3498db"},
        num={"r": 52, "g": 152, "b": 219})
    add("color-converter", {"hex": "#3498db"},
        num={"luminance": 0.2126 * 52 / 255 + 0.7152 * 152 / 255 + 0.0722 * 219 / 255},
        text={"rgb": "rgb(52, 152, 219)", "hsl": hsl_of("#3498db")})
    add("military-time", {"time": "3:45 PM"},
        num={"hours": 15, "minutes": 45}, text={"military": "15:45"})
    add("degrees-minutes-seconds",
        {"degrees": "33", "minutes": "52", "seconds": "7.68"},
        num={"decimal": 33 + 52 / 60 + 7.68 / 3600,
             "total_minutes": 33 * 60 + 52 + 7.68 / 60,
             "total_seconds": 33 * 3600 + 52 * 60 + 7.68})
    add("coordinates-converter", {"latitude": "-33.8688", "longitude": "151.2093"},
        text={"lat_dms": dms(-33.8688, "N", "S"), "lon_dms": dms(151.2093, "E", "W"),
              "decimal": "-33.868800, 151.209300"})
    e, n, z = utm_forward(-33.8688, 151.2093)
    add("lat-long-to-utm", {"latitude": "-33.8688", "longitude": "151.2093"},
        num={"easting": e, "northing": n}, text={"zone": z})
    d = datetime.fromtimestamp(1700000000, timezone.utc)
    add("unix-time", {"timestamp": "1700000000"},
        num={"year": d.year, "days": 1700000000 // 86400},
        text={"date": d.strftime("%Y-%m-%d %H:%M:%S") + " UTC"})
    # 14:30 in UTC+0 read in UTC+10
    tot = (14 * 60 + 30 + 10 * 60) % 1440
    add("time-zones", {"time": "14:30", "from": "0", "to": "10"},
        num={"hours": tot // 60, "minutes": tot % 60},
        text={"converted": f"{tot // 60:02d}:{tot % 60:02d}"})
    tot = (14 * 60 + 30 - 5 * 60) % 1440
    add("zulu-time-converter", {"time": "14:30", "offset": "5"},
        num={"hours": tot // 60, "day": 0},
        text={"zulu": f"{tot // 60:02d}:{tot % 60:02d}Z"})
    add("unicode-text", {"text": "héllo"},
        num={"count": 5, "bytes": 6},
        text={"codes": "U+0068 U+00E9 U+006C U+006C U+006F"})
    add("lowercase-to-uppercase-converter", {"text": "Hello World"},
        num={"changed": 8, "length": 11}, text={"upper": "HELLO WORLD"})
    add("uppercase-to-lowercase-converter", {"text": "Hello World"},
        # only H and W are upper-case, so only they change
        num={"changed": 2, "length": 11}, text={"lower": "hello world"})
    return out


SCRIPT_SPECS = script_expectations()

# ---------------------------------------------------------------------------
# Browser side
# ---------------------------------------------------------------------------


def build_specs(only: str, wanted: set[str] | None = None) -> list[dict]:
    specs: list[dict] = []
    seen: set[str] = set()

    for slug, (a, b) in catalog.PAIRS.items():
        if a not in FACTS or b not in FACTS:
            continue
        specs.append({"kind": "unit", "slug": slug, "inputs": {}, "a": a, "b": b, "pair": True,
                      "expect": lambda v, a=a, b=b: {
                          "result": v * FACTS[a] / FACTS[b],
                          "base": v * FACTS[a],
                          "factor": FACTS[a] / FACTS[b]}})
        seen.add(slug)

    for slug, (a, _only) in catalog.MULTI.items():
        if a not in FACTS:
            continue
        outs = [k for k in re.findall(
            r"'([a-z0-9\-]+)' => 'value \* [0-9]",
            open(os.path.join(ROOT, "plugins", "calc", "conversion",
                              f"qm-calc-{slug}.php")).read())]
        specs.append({"kind": "unit", "slug": slug, "inputs": {}, "a": a,
                      "expect": lambda v, a=a, outs=tuple(outs): {
                          k: v * FACTS[a] / FACTS[k] for k in outs if k in FACTS}})
        seen.add(slug)

    for slug, (a, b) in catalog.DENSITY.items():
        if a not in FACTS or b not in FACTS:
            continue

        specs.append({"kind": "density", "slug": slug, "a": a, "b": b})
        seen.add(slug)

    for slug, scale in catalog.TEMPERATURE.items():
        specs.append({"kind": "temperature", "slug": slug, "scale": scale})
        seen.add(slug)

    for slug, (unit, divisor) in catalog.MONEY.items():
        specs.append({"kind": "money", "slug": slug, "divisor": divisor})
        seen.add(slug)

    for slug in catalog.SCALE:
        specs.append({"kind": "scale", "slug": slug})
        seen.add(slug)

    for slug, (inputs, want) in CALC_SPECS.items():
        specs.append({"kind": "calc", "slug": slug, "inputs": inputs,
                      "num": want, "text": {}})
        seen.add(slug)

    for slug, (inputs, num, text) in SCRIPT_SPECS.items():
        specs.append({"kind": "script", "slug": slug, "inputs": inputs,
                      "num": num, "text": text})
        seen.add(slug)

    if only:
        specs = [s for s in specs if s["slug"].startswith(only)]
    if wanted:
        specs = [s for s in specs if s["slug"] in wanted]
    return specs


SET_JS = """
(args) => {
  const [inputs] = args;
  const done = [];
  Object.keys(inputs).forEach(name => {
    const el = document.querySelector('.calc-field:not([data-output]) [data-var="' + name + '"]');
    if (!el) return;
    if (el.tagName === 'SELECT') {
      const want = inputs[name];
      [...el.options].forEach(o => { if (o.text.trim() === want || o.value === want) el.value = o.value; });
    } else {
      el.value = inputs[name];
    }
    el.dispatchEvent(new Event('input', { bubbles: true }));
    el.dispatchEvent(new Event('change', { bubbles: true }));
    done.push(name);
  });
  return done;
}
"""

ALL_JS = """
() => {
  const out = {};
  document.querySelectorAll('[data-var]').forEach(el => {
    if (el.tagName !== 'INPUT' && el.tagName !== 'TEXTAREA') return;
    const field = el.closest('.calc-field');
    out[el.getAttribute('data-var')] = {
      v: String(el.value === undefined ? '' : el.value),
      out: !!(field && field.hasAttribute('data-output')),
    };
  });
  return out;
}
"""


def run_unit(spec: dict, page, probes=PROBES) -> list[str]:
    problems = []
    slug = spec["slug"]
    kind = spec["kind"]
    page.goto(f"{HOST}/conversion/{slug}", wait_until="networkidle", timeout=60000)
    present = page.evaluate(
        """() => [...document.querySelectorAll('.calc-field:not([data-output]) input[data-var],'
            + ' .calc-field:not([data-output]) textarea[data-var]')].map(e => e.getAttribute('data-var'))""")
    if not present:
        return [f"{slug}: no input field"]
    field = present[0]
    for probe in probes:
        page.evaluate(
            """([first, v, others]) => {
                const set = (n, val) => {
                    const e = document.querySelector(
                        '.calc-field:not([data-output]) [data-var="' + n + '"]');
                    if (!e) return;
                    e.value = val;
                    e.dispatchEvent(new Event('input', { bubbles: true }));
                    e.dispatchEvent(new Event('change', { bubbles: true }));
                };
                set(first, v);
                others.forEach(n => set(n, '1000'));
            }""",
            [field, probe, present[1:]])
        page.wait_for_timeout(120)
        page.evaluate("() => { const b = document.querySelector('.calc-go'); if (b) b.click(); }")
        page.wait_for_timeout(200)
        vals = page.evaluate(ALL_JS)
        shown = {k: v["v"] for k, v in vals.items() if v["out"]}
        p = float(probe)

        if kind == "unit":
            want = spec["expect"](p)
        elif kind == "money":
            want = {"dollars": p / spec["divisor"],
                    "cents": p / spec["divisor"] * 100,
                    "per_dollar": spec["divisor"]}
        elif kind == "scale":
            if spec["slug"] == "number-to-million":
                want = {"million": p / 1e6, "thousands": p / 1e3,
                        "lakh": p / 1e5, "crore": p / 1e7}
            else:
                want = {"billion": p / 1e9, "thousands": p / 1e3,
                        "lakh": p / 1e5, "crore": p / 1e7}
        elif kind == "temperature":
            kelvin = {"C": p + 273.15, "F": (p - 32) * 5 / 9 + 273.15, "K": p}[spec["scale"]]
            want = {"celsius": kelvin - 273.15,
                    "fahrenheit": (kelvin - 273.15) * 9 / 5 + 32,
                    "kelvin": kelvin, "rankine": kelvin * 9 / 5}
        elif kind == "density":
            # density typed as 1000 kg/m³ — water, so one litre weighs one kg.
            #   mass -> volume : kg = p·a, litres = kg/1 kg/L, out = litres/b
            #   volume -> mass : litres = p·a, kg = litres·1 kg/L, out = kg/b
            a, b = spec["a"], spec["b"]
            base = p * FACTS[a]
            want = {"litres": base, "kilograms": base,
                    "result": base / FACTS[b]}
        else:
            continue

        for name, expected in want.items():
            if name not in shown:
                problems.append(f"{slug}@{probe}: no box called {name}")
                continue
            why = check_number(shown[name], expected)
            if why:
                problems.append(f"{slug}@{probe}: {name} {why}")
        checked = [n for n in want if n in shown]
        spec.setdefault("_cov", [set(), set()])
        spec["_cov"][0].update(checked)
        spec["_cov"][1].update(n for n in shown if n not in want)
        spec["_answers"] = spec.get("_answers", 0) + len(checked)
    return problems


def run_explicit(spec: dict, page) -> list[str]:
    problems = []
    slug = spec["slug"]
    page.goto(f"{HOST}/conversion/{slug}", wait_until="networkidle", timeout=60000)
    filled = page.evaluate(SET_JS, [spec["inputs"]])
    missing = [k for k in spec["inputs"] if k not in filled]
    if missing:
        problems.append(f"{slug}: fields missing: {missing}")
    page.wait_for_timeout(150)
    page.evaluate("() => { const b = document.querySelector('.calc-go'); if (b) b.click(); }")
    page.wait_for_timeout(250)
    vals = page.evaluate(ALL_JS)
    for name, expected in spec.get("num", {}).items():
        if name not in vals:
            problems.append(f"{slug}: no box called {name}")
            continue
        why = check_number(vals[name]["v"], expected)
        if why:
            problems.append(f"{slug}: {name} {why}")
    want = set(spec.get("num", {})) | set(spec.get("text", {}))
    shown_out = {n for n, v in vals.items() if v["out"]}
    spec["_cov"] = [want & shown_out, shown_out - want]
    spec["_answers"] = len(want & shown_out)
    for name, expected in spec.get("text", {}).items():
        if name not in vals:
            problems.append(f"{slug}: no box called {name}")
            continue
        why = check_text(vals[name]["v"], expected)
        if why:
            problems.append(f"{slug}: {name} {why}")
    return problems


# --------------------------------------------------------------------------
# The article's "four units, seven values" table is generated from the same
# factors as the panel, so it can be read without a browser and checked cell by
# cell. One request per pair page, 4 400 numbers.
# --------------------------------------------------------------------------

def _rows(html: str) -> list[list[str]]:
    """Cell contents as raw HTML, so a ×10<sup>6</sup> reading survives."""
    rows = []
    for tr in re.findall(r"<tr>(.*?)</tr>", html, re.S):
        rows.append(re.findall(r"<t[dh]>(.*?)</t[dh]>", tr, re.S))
    return rows


def _clean(cell: str) -> str:
    """'1.609 ×10<sup>6</sup>' -> '1.609 ×10^6'; '160 934.4' -> unchanged text."""
    import html as htmlmod
    out = re.sub(r"<sup>(.*?)</sup>", r"^\1", cell)
    out = re.sub(r"<[^>]+>", "", out)
    return htmlmod.unescape(out).strip()


def _row_value(cell: str, a: str) -> float:
    """The input as the panel would receive it, in unit `a`.

    A row labelled '2 1,000,000' states two million — already counted in the
    base unit — while '2 mi' states two miles. The first is divided back into
    unit `a` before the pair's factor is applied.
    """
    # A thin space groups thousands inside a number; an ordinary space is the
    # gap between the count and the base figure ('1 000 1,000,000').
    tok = r"[0-9]+(?:\.[0-9]+)?(?:[,\u00a0\u2009\u202f][0-9]{3})*"
    head = re.split(r"[A-Za-z]", _clean(cell))[0].strip()
    m = re.fullmatch(rf"({tok}) +({tok})", head)
    if m:
        def val(t: str) -> float:
            return float(re.sub(r"[ ,\u00a0\u2009\u202f]", "", t))
        return val(m.group(1)) * val(m.group(2)) / FACTS[a]
    return _first_num(cell)


def _numtext(cell: str) -> str:
    """The number out of a table cell that also carries its unit."""
    t = _clean(cell)
    m = re.match(r"\s*(-?[0-9][0-9\s\u00a0\u2009\u202f]*(?:\.[0-9]+)?"
                 r"(?:\s*\u00d7\s*10\^?-?\d+)?)", t)
    return m.group(1).strip() if m else t


def _first_num(cell: str) -> float:
    """'1 000 cm' -> 1000.0. The thin space is the site's thousands separator.

    The money-of-scale pages label a row '2 1,000,000', meaning two million, so
    a grouped number after a bare number is a multiplication, not a separator.
    """
    raw = re.sub(r"[\s\u00a0\u2009\u202f]", " ", _clean(cell)).strip()
    m = re.match(r"^([0-9]+(?:\.[0-9]+)?)\s+([0-9]{1,3}(?:,[0-9]{3})+)", raw)
    if m:
        return float(m.group(1)) * float(m.group(2).replace(",", ""))
    t = re.sub(r"[\s\u00a0\u2009\u202f]", "", _clean(cell))
    m = re.match(r"-?[0-9]*\.?[0-9]+", t)
    if not m:
        raise ValueError(cell)
    return float(m.group(0))


def check_table_number(shown: str, want: float) -> str:
    """Like check_number, but one whole unit in the last place, not half.

    The article tables print six decimals below one (the panel prints four
    significant figures), so the last digit is thrown away either way; half an
    ulp is too tight for a value that has already been rounded twice.
    """
    try:
        got, half = parse_display(shown)
    except ValueError:
        return f"{shown!r} is not a number, wanted {want:g}"
    if abs(got - want) > max(half * 1.5, abs(want) * 1e-6):
        return f"shows {shown} ({got!r}), wanted {want:.10g}"
    return ""


def _check_pair_article(page: str, slug: str, a: str, b: str) -> tuple[list[str], int]:
    """The two tables a pair page carries, read against FACTS.

    One is four columns of [input, answer, base, factor]; the other is a plain
    two-column reverse table. Every cell has to be one of the numbers the pair
    can produce, computed here rather than read from the page.
    """
    problems, checked = [], 0
    ratio, back = FACTS[a] / FACTS[b], FACTS[b] / FACTS[a]

    for block in re.findall(r'<table class="calc-table">(.*?)</table>', page, re.S):
        cand = _rows(block)
        if not cand:
            continue
        width = len(cand[0])
        data = [r for r in cand[1:] if len(r) == width]

        if width == 4 and len(data) >= 4 and len({_clean(r[3]) for r in data}) == 1:
            for row in data:
                try:
                    v = _row_value(row[0], a)
                except (ValueError, KeyError):
                    continue
                allowed = [v * ratio, v * FACTS[a], ratio, FACTS[a]]
                for cell in row[1:]:
                    checked += 1
                    if not any(check_table_number(_numtext(cell), w) == "" for w in allowed):
                        problems.append(
                            f"{slug}: table {_clean(row[0])!r} cell {_clean(cell)!r} is none of "
                            f"{[round(w, 6) for w in allowed]}")
            return problems, checked

        if width == 2 and len(data) >= 6:
            for row in data:
                try:
                    v = _row_value(row[0], a)
                except (ValueError, KeyError):
                    continue
                checked += 1
                cells = [_numtext(row[1])]
                if not any(check_table_number(c, v * ratio) == "" or check_table_number(c, v * back) == ""
                           for c in cells):
                    problems.append(
                        f"{slug}: table {_clean(row[0])!r} -> {cells[0]!r} is neither "
                        f"{v * ratio:.6g} nor {v * back:.6g}")
            return problems, checked
    return [f"{slug}: no table found in the article"], 0


def check_static_tables(specs: list[dict]) -> tuple[list[str], int]:
    import urllib.request
    from units import UNITS

    plural = {}
    for key in FACTS:
        if key in UNITS:
            plural.setdefault(UNITS[key].plural.lower(), key)

    problems, checked = [], 0
    for spec in specs:
        if spec["kind"] != "unit":
            continue
        slug = spec["slug"]
        try:
            with urllib.request.urlopen(f"{HOST}/conversion/{slug}", timeout=30) as fh:
                page = fh.read().decode("utf-8", "replace")
        except Exception as exc:  # noqa: BLE001
            problems.append(f"{slug}: table fetch failed {str(exc)[:80]}")
            continue
        cut = page.find("multiplied by one factor")
        start = page.find("<table", cut) if cut >= 0 else -1
        if start < 0:
            if spec.get("pair"):
                pp, pn = _check_pair_article(page, spec["slug"], spec["a"], spec["b"])
                problems += pp
                checked += pn
                continue
            continue
        a = spec.get("a")
        if not a:
            problems.append(f"{slug}: table has no source unit in its spec")
            continue
        rows = _rows(page[start:page.find("</table>", start)])
        if not rows:
            problems.append(f"{slug}: empty table")
            continue
        heads = [plural.get(_clean(h).lower()) for h in rows[0][1:]]
        if None in heads:
            problems.append(f"{slug}: unknown column {[_clean(h) for h in rows[0][1:]]}")
            continue
        for row in rows[1:]:
            if len(row) != len(heads) + 1:
                continue
            try:
                v = _row_value(row[0], a)
            except (ValueError, KeyError):
                continue
            for key, cell in zip(heads, row[1:]):
                checked += 1
                want = v * FACTS[a] / FACTS[key]
                why = check_table_number(_numtext(cell), want)
                if why:
                    problems.append(f"{slug}: table {_clean(row[0])} {key} {why}")
    return problems, checked


def main() -> int:
    global HOST
    ap = argparse.ArgumentParser()
    ap.add_argument("--host", default=HOST)
    ap.add_argument("--workers", type=int, default=4)
    ap.add_argument("--only", default="", help="slug prefix")
    ap.add_argument("--slugs", default="", help="comma-separated exact slugs")
    ap.add_argument("--verbose", action="store_true")
    ap.add_argument("--tables", action="store_true",
                    help="also check the four-unit table in each pair page's article")
    args = ap.parse_args()
    HOST = args.host.rstrip("/")

    wanted = {x.strip() for x in args.slugs.split(",") if x.strip()}
    specs = build_specs(args.only, wanted)
    print(f"{len(specs)} pages to check against an independent answer")

    results: list[tuple[str, str, list[str]]] = []

    def one(spec: dict):
        from playwright.sync_api import sync_playwright
        with sync_playwright() as pw:
            browser = pw.chromium.launch(args=["--no-sandbox"])
            page = browser.new_page()
            try:
                if spec["kind"] in ("unit", "money", "scale", "temperature", "density"):
                    problems = run_unit(spec, page)
                else:
                    problems = run_explicit(spec, page)
            except Exception as exc:  # noqa: BLE001
                problems = [f"{spec['slug']}: harness {str(exc)[:120]}"]
            finally:
                browser.close()
        return (spec["slug"], spec["kind"], problems)

    with ThreadPoolExecutor(max_workers=args.workers) as pool:
        for i, res in enumerate(pool.map(one, specs), 1):
            results.append(res)
            if i % 25 == 0:
                print(f"  {i}/{len(specs)}", flush=True)

    bad = [(s, k, p) for s, k, p in results if p]
    cov = {sp["slug"]: {"checked": sorted(sp.get("_cov", [[], []])[0]),
                        "not_checked": sorted(sp.get("_cov", [[], []])[1])}
           for sp in specs}
    answers = sum(sp.get("_answers", 0) for sp in specs)
    loose = {k: v for k, v in cov.items() if v["not_checked"]}
    out = os.path.join(ROOT, "qa", "R87_correctness.json")
    with open(out, "w", encoding="utf-8") as fh:
        json.dump({"host": HOST, "pages": len(results), "answers_checked": answers,
                   "coverage": cov,
                   "results": [{"slug": s, "kind": k, "problems": p} for s, k, p in results]},
                  fh, indent=1, ensure_ascii=False)

    print(f"\n{len(results) - len(bad)}/{len(results)} pages give the right answer"
          f" ({answers} individual answers compared)")
    tables = {"cells": 0, "wrong": []}
    if args.tables:
        tp, tn = check_static_tables(specs)
        tables = {"cells": tn, "wrong": tp}
        print(f"article tables: {tn} cells compared, {len(tp)} wrong")
        for line in tp[:20]:
            print("  ! " + line)
        with open(out, "w", encoding="utf-8") as fh:
            json.dump({"host": HOST, "pages": len(results), "answers_checked": answers,
                       "coverage": cov, "tables": tables,
                       "results": [{"slug": s, "kind": k, "problems": p} for s, k, p in results]},
                      fh, indent=1, ensure_ascii=False)

    print(f"outputs not covered by an expectation: {len(loose)} pages"
          + (f" — {sorted(loose)[:6]}" if loose else ""))
    for slug, kind, problems in bad[:60]:
        print(f"  ! {slug} [{kind}]")
        for p in problems[:4]:
            print(f"      {p}")
    return 0 if not bad else 1


if __name__ == "__main__":
    raise SystemExit(main())
