"""Does every conversion calculator give the right answer?

Two independent passes.

1. **Static.** Every pair page's constants are recomputed from the unit
   definitions in `tools/conversion/units.py` and compared with what is written
   in the shipped PHP file. Every multi page's eight constants get the same
   treatment. A formula that is inverted, or written with too few digits to tell
   a mile from a kilometre, fails here without a browser.

2. **Browser.** A table of hand-checked conversions — exact by treaty or
   definition, not copied from this project — is typed into the real page in
   Chromium and the answer is compared with the expected value. This is the only
   pass that can catch a definition that is wrong in `units.py` itself.

Usage:
    python3 tools/conversion/answer_qa.py [--host URL] [--no-browser]
"""

from __future__ import annotations

import argparse
import math
import os
import re
import sys

sys.path.insert(0, os.path.dirname(os.path.abspath(__file__)))
import catalog  # noqa: E402
from units import UNITS  # noqa: E402

OUT = os.path.join(os.path.dirname(os.path.abspath(__file__)), "..", "..",
                   "plugins", "calc", "conversion")


def text(slug: str) -> str:
    return open(os.path.join(OUT, f"qm-calc-{slug}.php"), encoding="utf-8").read()


def formula_block(slug: str) -> str:
    t = text(slug)
    return t.split("'formula' =>", 1)[1].split("'article' =>", 1)[0]


def consts(slug: str) -> dict[str, str]:
    return dict(re.findall(r"'([a-z0-9_\-]+)' => 'value \* ([0-9.eE+\-]+)'",
                           formula_block(slug)))


def exprs(slug: str) -> dict[str, str]:
    """Every formula on the page, as written, whatever shape it has."""
    return dict(re.findall(r"'([a-z0-9_\-]+)' => '([^']+)'", formula_block(slug)))


def close(got: float, want: float, tol: float) -> bool:
    return math.isclose(got, want, rel_tol=tol, abs_tol=tol * max(abs(want), 1.0))


# ---------------------------------------------------------------- pass 1
def static() -> list[str]:
    bad: list[str] = []
    for slug, (a_key, b_key) in catalog.PAIRS.items():
        a, b = UNITS[a_key], UNITS[b_key]
        c = consts(slug)
        if "result" not in c:
            bad.append(f"{slug}: no result formula")
            continue
        if not close(float(c["result"]), a.factor / b.factor, 1e-5):
            bad.append(f"{slug}: result {c['result']} should be {a.factor / b.factor:g}")
        if "base" in c and not close(float(c["base"]), a.factor, 1e-5):
            bad.append(f"{slug}: base {c['base']} should be {a.factor:g}")

    for slug, (a_key, _only) in catalog.MULTI.items():
        a = UNITS[a_key]
        c = consts(slug)
        if not c:
            bad.append(f"{slug}: no formulas")
        for key, value in c.items():
            u = UNITS.get(key)
            if not u or u.dim != a.dim:
                continue
            if not close(float(value), a.factor / u.factor, 1e-5):
                bad.append(f"{slug}: {key} {value} should be {a.factor / u.factor:g}")

    for slug, (a_key, b_key) in catalog.DENSITY.items():
        c = exprs(slug)
        if not c:
            bad.append(f"{slug}: no formulas")
            continue
        a, b = UNITS[a_key], UNITS[b_key]
        mass_b = a.dim == "mass"
        if mass_b:
            if "result" not in c:
                bad.append(f"{slug}: no result formula")
                continue
            # 1 kg/L water: X of a is X*a.factor kg, /density*1000 L, /b.factor
            probe = 1000.0
            expr = c["result"].replace("value", str(probe)).replace("density", "1000")
            got = eval(expr)  # noqa: S307 - a constant expression from our own file
            want_v = probe * a.factor / 1000 * 1000 / b.factor
            if not close(got, want_v, 1e-5):
                bad.append(f"{slug}: result {got:g} should be {want_v:g}")
        else:
            probe = 1000.0
            expr = c["result"].replace("value", str(probe)).replace("density", "1000")
            got = eval(expr)  # noqa: S307
            want_v = probe * a.factor / 1000 * 1000 / b.factor
            if not close(got, want_v, 1e-5):
                bad.append(f"{slug}: result {got:g} should be {want_v:g}")

    # temperature: nine pages, four readings each, checked against Kelvin
    for slug, from_scale in catalog.TEMPERATURE.items():
        c = exprs(slug)
        if not c:
            bad.append(f"{slug}: no formulas")
            continue
        for v in (-40.0, 0.0, 37.0, 100.0):
            kelvin = {"C": v + 273.15, "F": (v - 32) * 5 / 9 + 273.15, "K": v}[from_scale]
            want = {"celsius": kelvin - 273.15,
                    "fahrenheit": (kelvin - 273.15) * 9 / 5 + 32,
                    "kelvin": kelvin,
                    "rankine": kelvin * 9 / 5}
            for key, expected in want.items():
                if key not in c:
                    bad.append(f"{slug}: no {key} formula")
                    continue
                got = eval(c[key].replace("value", repr(v)).replace("celsius",
                          repr(kelvin - 273.15)), {"__builtins__": {}}, {})  # noqa: S307
                if not close(float(got), expected, 1e-9):
                    bad.append(f"{slug}: {key}({v:g}) = {got:g}, should be {expected:g}")

    # coins and round numbers: one division per page
    for slug, (unit, divisor) in catalog.MONEY.items():
        c = exprs(slug)
        if not c:
            bad.append(f"{slug}: no formulas")
            continue
        got = eval(c["dollars"].replace("value", "100"), {"__builtins__": {}}, {})  # noqa: S307
        if not close(float(got), 100 / divisor, 1e-4):
            bad.append(f"{slug}: 100 {unit}s = {got:g} dollars, should be {100 / divisor:g}")

    # every pair page names both units, so a copy-paste cannot ship a page
    # called "Kelvin to Celsius" at the address /conversion/kelvin-to-fahrenheit
    for slug, (a_key, b_key) in catalog.PAIRS.items():
        a, b = UNITS[a_key], UNITS[b_key]
        name = re.search(r"'name' => '([^']*)'", text(slug)).group(1).lower()
        for unit in (a, b):
            if not (unit.name.lower() in name or unit.plural.lower() in name
                    or unit.key.lower() in name):
                bad.append(f"{slug}: name {name!r} never mentions {unit.name}")

    return bad


# ---------------------------------------------------------------- pass 2
# (slug, {field: value}, {output: expected}, relative tolerance)
# Every expected value comes from a definition, not from this project:
# the international inch is 25.4 mm by treaty, the pound 0.45359237 kg, the US
# gallon 3.785411784 L, the acre 4046.8564224 m², one atmosphere 101 325 Pa.
ANCHORS: list[tuple[str, dict[str, str], dict[str, float], float]] = [
    # length
    ("inch-to-meter", {"value": "1"}, {"result": 0.0254}, 1e-4),
    ("cm-to-in", {"value": "2.54"}, {"result": 1.0}, 1e-3),
    ("m-to-ft", {"value": "1"}, {"result": 3.280839895}, 1e-3),
    ("mm-to-inches-conversion", {"value": "25.4"}, {"result": 1.0}, 1e-3),
    ("kilometers-to-miles", {"value": "1"}, {"result": 0.6213711922}, 1e-3),
    ("mile-conversion", {"value": "1"}, {"km": 1.609344, "m": 1609.344}, 1e-3),
    ("yard-to-meter-conversion", {"value": "1"}, {"result": 0.9144}, 1e-3),
    ("light-year-conversion", {"value": "1"}, {"m": 9.4607304725808e15}, 1e-3),
    ("angstrom-to-nm-conversion", {"value": "10"}, {"result": 1.0}, 1e-3),
    ("micrometer-conversion", {"value": "1000"}, {"m": 0.001}, 1e-3),
    ("mil-to-mm-conversion", {"value": "1"}, {"result": 0.0254}, 1e-4),
    ("gallon", {"value": "1"}, {"l": 3.785411784}, 1e-3),
    # mass
    ("lbs-to-kg-converter", {"value": "1"}, {"result": 0.45359237}, 1e-3),
    ("kg-to-lbs-converter", {"value": "1"}, {"result": 2.204622622}, 1e-3),
    ("g-to-oz", {"value": "28.349523125"}, {"result": 1.0}, 1e-3),
    ("stone-to-kg", {"value": "1"}, {"result": 6.35029318}, 1e-3),
    ("stone-to-lbs", {"value": "1"}, {"result": 14.0}, 1e-4),
    ("pounds-to-grams", {"value": "1"}, {"result": 453.59237}, 1e-3),
    ("mcg-to-mg", {"value": "1000"}, {"result": 1.0}, 1e-4),
    # volume
    ("l-to-gal", {"value": "1"}, {"result": 0.2641720524}, 1e-3),
    ("ml-to-ul-conversion", {"value": "1"}, {"result": 1000.0}, 1e-3),
    ("cc-to-ml-converter", {"value": "1"}, {"result": 1.0}, 1e-4),
    ("liters-to-cl", {"value": "1"}, {"result": 100.0}, 1e-4),
    ("cups-to-oz", {"value": "1"}, {"result": 8.0}, 1e-3),
    ("tsp-ml-converter", {"value": "1"}, {"result": 4.92892159375}, 1e-3),
    ("tbsp-to-ml", {"value": "1"}, {"result": 14.78676478125}, 1e-3),
    # area
    ("acre-to-are-conversion", {"value": "1"}, {"result": 40.468564224}, 1e-3),
    ("acres-to-hectares-converter", {"value": "1"}, {"result": 0.40468564224}, 1e-3),
    ("hectares-to-acres-converter", {"value": "1"}, {"result": 2.4710538147}, 1e-3),
    ("square-feet-to-acres-converter", {"value": "43560"}, {"result": 1.0}, 1e-3),
    ("square-meters-to-square-feet-converter", {"value": "1"}, {"result": 10.763910417}, 1e-3),
    ("square-kilometers-to-acres", {"value": "1"}, {"result": 247.105381467}, 1e-3),
    ("square-miles-to-square-km-converter", {"value": "1"}, {"result": 2.589988110336}, 1e-3),
    # speed
    ("knots-to-kph", {"value": "1"}, {"result": 1.852}, 1e-3),
    ("knots-to-mph", {"value": "1"}, {"result": 1.150779448}, 1e-3),
    ("ms-to-kmh", {"value": "1"}, {"result": 3.6}, 1e-4),
    # pressure
    ("psi-to-atm-conversion", {"value": "14.6959487755"}, {"result": 1.0}, 1e-3),
    ("bar-to-psi-conversion", {"value": "1"}, {"result": 14.503773773}, 1e-3),
    ("atm-to-pascals-conversion", {"value": "1"}, {"result": 101325.0}, 1e-4),
    ("kpa-to-mmhg-conversion", {"value": "1"}, {"result": 7.500616827}, 1e-3),
    ("mpa-to-psi-conversion", {"value": "1"}, {"result": 145.037737730}, 1e-3),
    ("torr-to-atm", {"value": "760"}, {"result": 1.0}, 1e-3),
    ("kg-cm2-to-psi-converter", {"value": "1"}, {"result": 14.223343334}, 1e-3),
    # energy, power, torque
    ("dbm-to-watts", {"value": "30"}, {"watts": 1.0}, 1e-3),
    ("inch-lbs-to-nm", {"value": "1"}, {"result": 0.112984829}, 1e-3),
    ("nm-to-ft-lb", {"value": "1"}, {"result": 0.7375621493}, 1e-3),
    # temperature
    ("celsius-to-fahrenheit", {"value": "100"}, {"fahrenheit": 212.0, "kelvin": 373.15}, 1e-4),
    ("fahrenheit-to-celsius", {"value": "32"}, {"celsius": 0.0}, 1e-4),
    ("kelvin-to-celsius", {"value": "273.15"}, {"celsius": 0.0}, 1e-4),
    ("kelvin-to-fahrenheit", {"value": "273.15"}, {"fahrenheit": 32.0}, 1e-4),
    # data
    ("kilobytes-to-megabytes", {"value": "1000"}, {"result": 1.0}, 1e-3),
    ("mbps-to-gbps", {"value": "1000"}, {"result": 1.0}, 1e-3),
    # time
    ("hours-to-minutes-converter", {"value": "2"}, {"result": 120.0}, 1e-4),
    ("minutes-to-seconds-converter", {"value": "1"}, {"result": 60.0}, 1e-4),
    ("days-to-weeks", {"value": "7"}, {"result": 1.0}, 1e-4),
    ("hours-to-days", {"value": "48"}, {"result": 2.0}, 1e-4),
    ("seconds-to-minutes-converter", {"value": "120"}, {"result": 2.0}, 1e-4),
    ("day-converter", {"value": "1"}, {"s": 86400.0}, 1e-4),
    ("hour-converter", {"value": "1"}, {"s": 3600.0}, 1e-4),
    # money and counts
    ("cents-to-dollars", {"value": "250"}, {"dollars": 2.5}, 1e-4),
    ("dimes-to-dollars", {"value": "10"}, {"dollars": 1.0}, 1e-4),
    ("pennies-to-dollars", {"value": "100"}, {"dollars": 1.0}, 1e-4),
    ("quarters-to-dollars", {"value": "4"}, {"dollars": 1.0}, 1e-4),
    ("million-to-billion", {"value": "1000"}, {"result": 1.0}, 1e-4),
    ("crore-to-lakh", {"value": "1"}, {"result": 100.0}, 1e-4),
    # angles
    ("degrees-to-radians", {"value": "180"}, {"result": 3.14159265358979}, 1e-3),
    ("radians-to-degrees", {"value": "3.14159265358979"}, {"result": 180.0}, 1e-3),
    ("degrees-to-minutes", {"value": "1"}, {"result": 60.0}, 1e-4),
    # kitchen
    ("ml-to-cups", {"value": "236.5882365"}, {"result": 1.0}, 1e-3),
    ("grams-to-calories", {"grams": "100"}, {"kcal": 400.0}, 1e-3),
    # the mixed calculators: a formula with a constant of its own
    ("pixels-to-inches", {"px": "96", "ppi": "96"}, {"inches": 1.0, "mm": 25.4}, 1e-4),
    ("price-per-liter-to-price-per-gallon", {"price": "1"}, {"per_gallon": 3.785411784}, 1e-3),
    ("ppm-to-mgl-converter", {"ppm": "1", "density": "1"}, {"mgl": 1.0}, 1e-4),
    ("inches-to-fraction", {"inches": "0.5"}, {"whole": 0.0}, 1e-6),
    ("number-to-million", {"value": "1000000"}, {"million": 1.0}, 1e-6),
    ("psi-to-gpm", {"psi": "30", "diameter": "0.5", "cd": "0.62"},
     {"gpm": 25.333, "lpm": 95.896}, 2e-3),
    ("torque-to-horsepower", {"torque": "300", "rpm": "3000"},
     {"kw": 94.2478, "hp": 126.394}, 2e-3),
    ("psi-to-inches-of-water-conversion", {"value": "1"}, {"result": 27.6799}, 2e-3),
    ("mesh-to-micron-converter", {"mesh": "100"}, {"micron": 149.0}, 2e-2),
    ("fuel-economy-converter", {"mpg": "30"}, {"l100": 7.8405}, 2e-3),
    ("ppm", {"ppm": "1"}, {"mgl": 1.0, "percent": 0.0001}, 1e-3),
    ("paper-quantity", {"sheets": "500"}, {"reams": 1.0, "quires": 20.0}, 1e-4),
]

# What the box must read, character for character. Three decimals above one,
# four significant figures below it, ×10ⁿ under a thousandth.
DISPLAY_ANCHORS: list[tuple[str, dict[str, str], dict[str, str]]] = [
    ("inch-to-meter", {"value": "1"}, {"result": "0.0254"}),
    ("mil-to-mm-conversion", {"value": "1"}, {"result": "0.0254"}),
    ("kilometers-to-miles", {"value": "1"}, {"result": "0.6214"}),
    ("lbs-to-kg-converter", {"value": "1"}, {"result": "0.4536"}),
    ("g-to-oz", {"value": "1"}, {"result": "0.03527"}),
    ("l-to-gal", {"value": "1"}, {"result": "0.2642"}),
    ("mile-conversion", {"value": "1"}, {"km": "1.609"}),
    ("micrometer-conversion", {"value": "1"}, {"m": "1.000 ×10^-6", "mm": "0.001"}),
    ("meters-to-feet", {"value": "3"}, {"result": "9.843"}),
]

# Pages that answer in words; compared exactly, spaces normalised.
TEXT_ANCHORS: list[tuple[str, dict[str, str], dict[str, str]]] = [
    ("decimal-to-hexadecimal", {"number": "255"},
     {"hex": "FF", "binary": "11111111", "octal": "377"}),
    ("decimal-to-hexadecimal", {"number": "4095"},
     {"hex": "FFF", "binary": "111111111111", "octal": "7777"}),
    ("binary", {"number": "42"}, {"binary": "101010", "octal": "52", "hex": "2A"}),
    ("roman-numerals", {"number": "1987"}, {"roman_out": "MCMLXXXVII"}),
    ("military-time", {"time": "3:45 PM"}, {"military": "15:45"}),
    ("leet-speak", {"text": "Elite hacker"}, {"leet": "31173 h4ck3r"}),
    ("decimal-to-octal", {"number": "255"}, {"octal": "377", "hex": "FF"}),
    ("lat-long-to-utm", {"latitude": "-33.8688", "longitude": "151.2093"},
     {"zone": "56S", "easting": "334368.63", "northing": "6250948.35"}),
]


def read(page) -> dict[str, str]:
    return page.evaluate(
        """() => Object.fromEntries([...document.querySelectorAll(
            '.calc-field[data-output] [data-var]')].map(e =>
            [e.getAttribute('data-var'), e.value]))""")


def num(s: str) -> float:
    s = re.sub(r"[\s\u00a0\u2009\u202f]", "", s).replace("\u00d710^", "e").replace("\u2212", "-")
    if "e" in s:
        mant, _, exp = s.partition("e")
        return float(mant) * 10 ** int(exp)
    return float(s)


def browser_pass(host: str) -> list[str]:
    from playwright.sync_api import sync_playwright

    bad: list[str] = []
    with sync_playwright() as pw:
        browser = pw.chromium.launch(args=["--no-sandbox"])
        page = browser.new_page()
        for slug, inputs, expected, tol in ANCHORS:
            page.goto(f"{host}/conversion/{slug}", wait_until="networkidle", timeout=45000)
            present = page.evaluate(
                """() => [...document.querySelectorAll(
                    '.calc-field:not([data-output]) [data-var]')].map(e =>
                    e.getAttribute('data-var'))""")
            targets = {}
            for name, value in inputs.items():
                key = name if name in present else (present[0] if present else name)
                targets[key] = value
            for name, value in targets.items():
                page.evaluate(
                    """([n, v]) => { const e = document.querySelector(
                        '.calc-field:not([data-output]) [data-var="' + n + '"]');
                        if (!e) return; e.value = v;
                        e.dispatchEvent(new Event('input', { bubbles: true }));
                        e.dispatchEvent(new Event('change', { bubbles: true })); }""",
                    [name, value])
            page.wait_for_timeout(250)
            got = read(page)
            if not any(got.values()):
                # Some pages reveal as you type; others wait for the button.
                # A real click, because that is what a visitor does and what the
                # page's own reveal is written against.
                try:
                    page.click(".calc-go", timeout=1500)
                except Exception:                                      # noqa: BLE001
                    pass
                page.wait_for_timeout(300)
                got = read(page)
            for key, want in expected.items():
                raw = got.get(key)
                if not raw:
                    bad.append(f"{slug}: {key} is blank, wanted {want:g}")
                    continue
                try:
                    value = num(raw)
                except ValueError:
                    bad.append(f"{slug}: {key} = {raw!r} is not a number")
                    continue
                if not close(value, want, tol):
                    bad.append(f"{slug}: {key} = {raw} (wanted {want:g})")

        for slug, inputs, expected in DISPLAY_ANCHORS:
            page.goto(f"{host}/conversion/{slug}", wait_until="networkidle", timeout=45000)
            for name, value in inputs.items():
                page.evaluate(
                    """([n, v]) => { const e = document.querySelector(
                        '.calc-field:not([data-output]) [data-var="' + n + '"]');
                        if (!e) return; e.value = v;
                        e.dispatchEvent(new Event('input', { bubbles: true }));
                        e.dispatchEvent(new Event('change', { bubbles: true })); }""",
                    [name, value])
            page.wait_for_timeout(220)
            got = read(page)
            if not any(got.values()):
                try:
                    page.click(".calc-go", timeout=1500)
                except Exception:                                      # noqa: BLE001
                    pass
                page.wait_for_timeout(300)
                got = read(page)
            for key, want in expected.items():
                raw = " ".join((got.get(key) or "").split())
                if raw != want:
                    bad.append(f"{slug}: {key} reads {raw!r}, should read {want!r}")

        for slug, inputs, expected in TEXT_ANCHORS:
            page.goto(f"{host}/conversion/{slug}", wait_until="networkidle", timeout=45000)
            for name, value in inputs.items():
                page.evaluate(
                    """([n, v]) => { const e = document.querySelector(
                        '.calc-field:not([data-output]) [data-var="' + n + '"]');
                        if (!e) return; e.value = v;
                        e.dispatchEvent(new Event('input', { bubbles: true }));
                        e.dispatchEvent(new Event('change', { bubbles: true })); }""",
                    [name, value])
            page.wait_for_timeout(250)
            got = read(page)
            if not any(got.values()):
                try:
                    page.click(".calc-go", timeout=1500)
                except Exception:                                      # noqa: BLE001
                    pass
                page.wait_for_timeout(300)
                got = read(page)
            for key, want in expected.items():
                raw = " ".join((got.get(key) or "").split())
                if raw != want:
                    bad.append(f"{slug}: {key} = {raw!r} (wanted {want!r})")
        browser.close()
    return bad


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--host", default="http://127.0.0.1:8099")
    ap.add_argument("--no-browser", action="store_true")
    args = ap.parse_args()

    static_bad = static()
    covered = (len(catalog.PAIRS) + len(catalog.MULTI) + len(catalog.DENSITY)
               + len(catalog.TEMPERATURE) + len(catalog.MONEY))
    print(f"static formula audit: {len(catalog.PAIRS)} pair + {len(catalog.MULTI)} multi"
          f" + {len(catalog.DENSITY)} density + {len(catalog.TEMPERATURE)} temperature"
          f" + {len(catalog.MONEY)} money = {covered} pages")
    print(f"  {len(static_bad)} wrong")
    for row in static_bad[:20]:
        print("   !", row)

    browser_bad = []
    if not args.no_browser:
        browser_bad = browser_pass(args.host)
        print(f"\nbrowser anchors: {len(ANCHORS) + len(TEXT_ANCHORS)} numbers + "
              f"{len(DISPLAY_ANCHORS)} exact readings")
        print(f"  {len(browser_bad)} wrong")
        for row in browser_bad[:30]:
            print("   !", row)

    total = len(static_bad) + len(browser_bad)
    print("\nRESULT:", "PASS" if total == 0 else f"FAIL ({total})")
    return 0 if total == 0 else 1


if __name__ == "__main__":
    raise SystemExit(main())
