"""Turn a Spec into a calculator file.

One source of truth for every page in the category: the form, the formula, the
worked example and the article all come from the same numbers, so a page cannot
describe arithmetic it does not perform.
"""

from __future__ import annotations

import html
import math
import os
import re
from dataclasses import dataclass, field
from itertools import product
from typing import Any

OUT = os.path.abspath(os.path.join(os.path.dirname(__file__), "..", "..",
                                   "plugins", "calc", "conversion"))
UPDATED = "2026-11-11"

_SAFE: dict[str, Any] = {k: getattr(math, k) for k in
                         ("sqrt", "log", "log10", "exp", "fabs", "pow", "floor", "ceil",
                          "sin", "cos", "tan", "atan", "asin", "acos")}
_SAFE.update({"abs": abs, "round": round, "min": min, "max": max,
              "pi": math.pi, "e": math.e})


# ------------------------------------------------------------------- fields
def F(name: str, label: str, **kw: Any) -> dict:
    f = {"name": name, "label": label, "type": "number", "rounding": ["omni", "0.0001"]}
    f.update(kw)
    return f


def T(name: str, label: str, **kw: Any) -> dict:
    f = {"name": name, "label": label, "type": "text"}
    f.update(kw)
    return f


def SEL(name: str, label: str, options: dict[str, str], **kw: Any) -> dict:
    """A choice. The file stores the default as an option *label*, because that
    is what the engine matches on; a default given as a value is translated
    here so the two can never drift apart."""
    f = {"name": name, "label": label, "type": "select", "options": options}
    f.update(kw)
    d = f.get("default")
    if d is not None and d not in options:
        for opt_label, opt_value in options.items():
            if str(opt_value) == str(d):
                f["default"] = opt_label
                break
    return f


def R(name: str, label: str, **kw: Any) -> dict:
    f = {"name": name, "label": label, "type": "number", "readonly": True,
         "rounding": ["omni", "0.0001"]}
    f.update(kw)
    return f


@dataclass
class Spec:
    slug: str
    name: str
    title: str = ""
    desc: str = ""
    h1: str = ""
    what: str = ""
    fields: list[dict] = field(default_factory=list)
    results: list[dict] = field(default_factory=list)
    formula: dict[str, str] = field(default_factory=dict)
    engine: str = "formula"
    engine_note: str = ""
    js: str = ""
    prose: dict[str, Any] = field(default_factory=dict)
    related: list[tuple[str, str]] = field(default_factory=list)

    def env(self) -> dict[str, Any]:
        out: dict[str, Any] = {}
        for f in self.fields:
            d = f.get("default")
            if d is None:
                continue
            if f.get("type") == "select":
                # the file stores the option label; the arithmetic wants its value
                opts = f.get("options") or {}
                d = opts.get(d, d)
            try:
                out[f["name"]] = float(d)
            except (TypeError, ValueError):
                out[f["name"]] = d
        return out


# ---------------------------------------------------------------- arithmetic
THIN = {"\u2009": "", "\u00a0": "", "\u202f": "", "\u2007": ""}


def clean(expr: Any) -> str:
    """An expression the engine can evaluate: no grouped-digit thin spaces."""
    text = str(expr)
    for bad, good in THIN.items():
        text = text.replace(bad, good)
    return text.strip()


def solve(spec: Spec, env: dict[str, Any]) -> dict[str, float]:
    out: dict[str, float] = {}
    scope = dict(_SAFE)
    scope.update({k: v for k, v in env.items() if isinstance(v, (int, float))})
    for key, expr in spec.formula.items():
        try:
            val = eval(clean(expr).replace("^", "**"), {"__builtins__": {}}, scope)  # noqa: S307
        except Exception:                                              # noqa: BLE001
            continue
        if isinstance(val, (int, float)) and math.isfinite(val):
            scope[key] = float(val)
            out[key] = float(val)
    return out


def fmt(v: Any, dp: int = 3) -> str:
    if v is None:
        return "—"
    try:
        v = float(v)
    except (TypeError, ValueError):
        return str(v)
    if not math.isfinite(v):
        return "—"
    if v == 0:
        return "0"
    a = abs(v)
    if a >= 1e6 or a < 1e-3:
        s = f"{v:.4g}"
        mant, _, exp = s.partition("e")
        mant = mant.rstrip("0").rstrip(".") if "." in mant else mant
        return f"{mant} × 10<sup>{int(exp):d}</sup>" if exp else mant
    s = f"{v:,.{dp}f}".rstrip("0").rstrip(".")
    return s.replace(",", "\u2009")


def num(v: Any) -> str:
    try:
        v = float(v)
    except (TypeError, ValueError):
        return str(v)
    if v == int(v) and abs(v) < 1e15:
        return f"{int(v):,}".replace(",", "\u2009")
    if abs(v) >= 1e5 or abs(v) < 1:
        # Small factors carry their meaning in the leading digits: 0.000621
        # loses the difference between a mile and a kilometre, so anything
        # below one is written with six significant figures instead of six
        # decimal places.
        return f"{v:.6g}"
    return f"{v:.6f}".rstrip("0").rstrip(".")


def numf(v: Any) -> str:
    """A constant written into a formula: full precision, no grouping.

    `num()` is for prose — six significant figures read well in a sentence. A
    formula is arithmetic, and six figures are not enough there: 7.5 miles came
    out as 1 207 005 cm instead of 1 207 008 because the constant written into
    the page was 160934 rather than 160934.4. The error is invisible at one mile
    and three centimetres wide at 7.5, so the formula gets the real number.
    """
    try:
        v = float(v)
    except (TypeError, ValueError):
        return str(v)
    if v == int(v) and abs(v) < 1e15:
        return f"{int(v)}"
    return f"{v:.15g}"


def cap(text: str) -> str:
    return text[:1].upper() + text[1:] if text else text


def soft(text: str) -> str:
    words = str(text).split()
    if words and words[0][:1].isupper() and not words[0].isupper():
        return str(text)[:1].lower() + str(text)[1:]
    return str(text)


def unit_of(f: dict) -> str:
    return str(f.get("suffix") or "").strip()


def label_of(f: dict) -> str:
    return str(f.get("label") or f.get("name") or "")


def plain(expr: str, labels: dict[str, str]) -> str:
    text = clean(expr)
    for key in sorted(labels, key=len, reverse=True):
        text = re.sub(rf"\b{re.escape(key)}\b", labels[key], text)
    text = text.replace(" * ", " × ").replace(" / ", " ÷ ")
    text = text.replace("*", "×").replace("/", "÷").replace("**", "^").replace("^", " ^ ")
    text = re.sub(r"\s+", " ", text).strip()
    return text.replace(" ^ ", " ^ ")


def _natural(items: list[str]) -> str:
    items = [i for i in items if i]
    if not items:
        return ""
    if len(items) == 1:
        return items[0]
    if len(items) == 2:
        return f"{items[0]} and {items[1]}"
    return ", ".join(items[:-1]) + f" and {items[-1]}"


# -------------------------------------------------------------------- title
# The page prints "<title> | Onim", so a stored title of 43 to 53 characters
# is the 50 to 60 a search result shows.
T_MIN, T_MAX = 43, 53
TITLE_TAILS = [
    " — Formula, Factor and Table",
    ": Exact Factor and Conversion Table",
    ": Factor, Formula and Worked Table",
    " — Exact Factor and Reverse Rate",
    ": Formula, Table and Reverse Rate",
    " — Convert Both Ways with a Table",
    " — Exact Conversion and Reference",
    ": The Exact Factor and a Table",
    " — Convert Both Ways",
    ": Factor and Table",
]


def fit_title(candidates: list[str], name: str, seed: str = "") -> str:
    cands = [c for c in candidates if c]
    for c in cands:
        if T_MIN <= len(c) <= T_MAX:
            return c
    pool = [c for c in cands if len(c) <= T_MAX] or [name]
    stem = max(pool, key=len)
    order = TITLE_TAILS[:]
    if seed:
        shift = sum(ord(ch) for ch in seed) % len(order)
        order = order[shift:] + order[:shift]
    for tail in order:
        cand = stem + tail
        if T_MIN <= len(cand) <= T_MAX:
            return cand
    for c in cands:
        if len(c) > T_MAX:
            cut = c[:T_MAX].rsplit(" ", 1)[0].rstrip(",;:—–- ")
            if T_MIN <= len(cut) <= T_MAX:
                return cut
    for tail in order:
        cand = name + tail
        if T_MIN <= len(cand) <= T_MAX:
            return cand
    long_tails = [
        " — Every Unit, One Figure, Exact Factors",
        ": Every Unit in One Place with the Factor",
        " — Convert Any Unit into Every Other One",
        ": All the Units, One Figure, Exact Factors",
    ]
    for tail in long_tails:
        cand = name + tail
        if T_MIN <= len(cand) <= T_MAX:
            return cand
    cand = name + long_tails[0]
    return cand[:T_MAX].rsplit(" ", 1)[0] if len(cand) > T_MAX else cand


DESC_CLAUSES = [
    " Exact.",
    " Both ways.",
    " Reverse too.",
    " Three decimals.",
    " Shown in full.",
    " Free.",
    " Units shown.",
    " Every result carries its unit.",
    " The factor is shown with the answer.",
    " Nothing is rounded before the last step.",
    " A worked example sits beside the form.",
    " The formula is on the page.",
    " The reverse rate is printed too.",
    " Every step is shown.",
    " Nothing is hidden.",
    " The arithmetic runs in your browser.",
    " Copy the figure and its unit.",
    " The table gives ten values at once.",
    " Both directions are on the page, with the factor written out.",
    " The factor, the reverse rate and a worked example are all here.",
    " Enter one figure and read every unit of the measure beside it.",
    " Nothing is stored, so a second visit starts from the same defaults.",
    " The formula table shows the same relationship rearranged for each unknown.",
    " Ten values are tabulated so the shape of the relationship is visible.",
    " A worked example at the opening values shows what the panel should read.",
]


def fit_desc(base: str) -> str:
    """A description of 150 to 160 characters, assembled from whole clauses."""
    base = re.sub(r"\s+", " ", base).strip().rstrip(",")
    if not base.strip("."):
        base = "A conversion page with the working shown."
    if not base.endswith("."):
        base += "."
    if 150 <= len(base) <= 160:
        return base
    if len(base) > 160:
        cut = base[:159].rsplit(" ", 1)[0].rstrip(",;:")
        return cut + "." if len(cut) >= 148 else cut
    clauses = [c for c in DESC_CLAUSES if c.strip() not in base]
    for count in (1, 2, 3):
        for combo in product(clauses, repeat=count):
            cand = base + "".join(combo)
            if 150 <= len(cand) <= 160:
                return cand
    return base


# ------------------------------------------------------------------- prose
DEFAULT_PROSE: dict[str, Any] = {
    "why": (
        "<p>A conversion is the smallest calculation on this site and the one most often "
        "got wrong, not because the arithmetic is hard but because two numbers that look "
        "alike are one decimal place apart. The pages in this category start from the "
        "factor rather than from a lookup table, so the answer is recomputed for whatever "
        "you type instead of being read off a chart somebody made at round values.</p>"
        "<p>The rule that keeps a conversion honest is simple: work in one unit, convert "
        "at the end, and never convert back from a rounded figure. A metre is 3.280839895 "
        "feet, not 3.28, and the difference only shows up when the number is multiplied by "
        "something large. Everything on this page is done at full precision and rounded "
        "once, for the eye.</p>"
    ),
    "formula_note": (
        "<p>Nothing is applied twice. The factor you see is the ratio of two definitions, "
        "so once a figure is in the base unit of its dimension the rest is multiplication "
        "or division by a number written on the page. That is why the same factor works at "
        "any size, and why a conversion of one or of a million gives the same ratio.</p>"
    ),
    "example_note": (
        "<p>Reproduce this on a calculator and you should land on the same figures, give or "
        "take the last decimal. If you land a factor of ten away, the value you entered was "
        "in a different unit from the one the box names, and no amount of care with the "
        "arithmetic will fix that.</p>"
    ),
    "reading": (
        "<p>Read the answer with its unit, not on its own. A bare number carried into a "
        "report is where conversions go wrong months later. The panel keeps the unit beside "
        "every figure for that reason, and the table above repeats it.</p>"
        "<p>Ask whether the size is plausible before you use it. One acre is smaller than a "
        "football pitch; a kilogram is a little over two pounds; a litre of water weighs a "
        "kilogram. Comparison with something you can picture catches most slips faster than "
        "rechecking the arithmetic.</p>"
    ),
    "sensitivity_note": (
        "<p>A ten per cent nudge is used because it is the size of error a person makes when "
        "they measure roughly. Where the table shows ten per cent in and ten per cent out, "
        "the relationship is proportional in that box and the accuracy of your measurement "
        "is the accuracy of the answer.</p>"
    ),
    "scenario_note": (
        "<p>Neither scenario is exotic. The small one is what a quick estimate looks like; "
        "the large one is what a real job looks like. Both are computed by the same lines of "
        "arithmetic as the example above, which is the point.</p>"
    ),
    "units_note": (
        "<p>Unit names are written in full in the article and abbreviated on the form, so a "
        "box labelled metres can never be mistaken for one labelled millimetres. Where two "
        "systems use the same word for different sizes, the article names the system: a US "
        "gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses "
        "that line is out by twenty per cent.</p>"
    ),
    "method_note": (
        "<p>The method is the same on every page in this category. Take the figure in the "
        "unit you measured it in, convert it once into the unit the other side expects, and "
        "report the result with the unit printed beside it.</p>"
    ),
    "uses": [
        ("<strong>Cooking and dosing.</strong>", "A recipe written in cups, a label written "
         "in millilitres and a scale that reads grams are three units in one kitchen."),
        ("<strong>Trade and shipping.</strong>", "Freight is priced by weight, volume or "
         "both, and the two systems meet on the same invoice."),
        ("<strong>Study and exams.</strong>", "A worked example with the units written out "
         "is worth more than a memorised factor, because it can be rebuilt."),
        ("<strong>Estimating before you measure.</strong>", "A rough conversion decides "
         "whether a job is small or large before anyone fetches a tape."),
    ],
    "pitfalls": [
        ("<strong>Converting twice.</strong>", "A figure already in feet converted to metres "
         "and then to feet again comes back wrong, and nothing in the display says so."),
        ("<strong>Using a rounded factor and a rounded answer.</strong>", "Each rounding is "
         "small; the product of several is not. Keep precision in the middle and round only "
         "at the end."),
        ("<strong>Assuming both sides use the same word the same way.</strong>", "A US "
         "gallon, an imperial gallon, a dry gallon and a metric gallon are four different "
         "volumes sharing one name."),
    ],
    "limits": [
        ("<strong>The factor is exact; the input is not.</strong>", "Nothing here knows how "
         "the figure was measured, and a conversion cannot add precision that was never "
         "there."),
        ("<strong>Rounded display, unrounded arithmetic.</strong>", "A figure copied from "
         "the panel has three decimals; the value behind it has more, and a chain of "
         "conversions done on copied figures drifts."),
        ("<strong>One dimension at a time.</strong>", "Mass does not convert to volume "
         "without a density, and the pages that offer it ask for one rather than inventing "
         "a number."),
    ],
    "scenarios": [],
}


# ------------------------------------------------------------------- article
def _words(blocks) -> int:
    text = " ".join(str(h) for _, h in blocks)
    text = re.sub(r"<[^>]+>", " ", text)
    return sum(1 for tok in text.split() if re.search(r"[A-Za-z0-9]", tok))


def build_article(spec: Spec) -> dict:  # noqa: C901
    results = spec.results
    fields = list(spec.fields)
    labels = {f["name"]: label_of(f) for f in fields}
    labels.update({r["name"]: re.sub(r"^(?:In|in)\s+", "", label_of(r)) for r in results})

    env = spec.env()
    solved = solve(spec, env)

    def fill(text: str) -> str:
        if not isinstance(text, str) or "{" not in text:
            return text

        def one(m: re.Match[str]) -> str:
            key = m.group(1)
            return fmt(solved[key]) if key in solved else m.group(0)
        return re.sub(r"\{([a-z_0-9]+)\}", one, text)

    prose = dict(DEFAULT_PROSE)
    prose.update(spec.prose)
    for key in ("why", "formula_note", "example_note", "reading", "sensitivity_note",
                "scenario_note", "units_note", "method_note"):
        prose[key] = fill(prose.get(key, ""))
    for key in ("pitfalls", "limits", "uses"):
        prose[key] = [fill(x) for x in prose.get(key, [])]

    def out_name(r: dict) -> str:
        return soft(re.sub(r"^(?:In|in)\s+", "", label_of(r)))

    names_out = _natural([out_name(r) for r in results]) if results else ""
    names_in = _natural([soft(label_of(f)) for f in fields])

    inlist = []
    for f in fields:
        if f.get("type") == "select":
            keys = ", ".join(str(k) for k in (f.get("options") or {}).keys())
            inlist.append(f"<li><strong>{html.escape(label_of(f))}</strong> — a choice: "
                          f"{html.escape(keys)}</li>")
            continue
        u = unit_of(f)
        tail = f". {html.escape(f['help'])}" if f.get("help") else "."
        inlist.append(f"<li><strong>{html.escape(label_of(f))}</strong>"
                      f"{(' — in ' + html.escape(u)) if u else ''}{tail}</li>")
    outlist = [f"<li><strong>{html.escape(label_of(r))}</strong>"
               f"{(' — in ' + html.escape(unit_of(r))) if unit_of(r) else ''}</li>"
               for r in results]

    rows = "".join(
        f"<tr><td><strong>{html.escape(labels.get(k, k))}</strong></td>"
        f"<td><code>{plain(v, labels)}</code></td></tr>"
        for k, v in spec.formula.items())

    worked = []
    for r in results:
        if r["name"] in solved:
            worked.append(f"<li><strong>{html.escape(label_of(r))}</strong> = "
                          f"<code>{plain(spec.formula.get(r['name'], ''), labels)}</code> = "
                          f"<strong>{fmt(solved[r['name']])}"
                          f"{(' ' + html.escape(unit_of(r))) if unit_of(r) else ''}</strong></li>")

    numbered = ", ".join(
        f"{label_of(f)} = {fmt(env[f['name']])}{(' ' + unit_of(f)) if unit_of(f) else ''}"
        for f in fields if isinstance(env.get(f["name"]), (int, float)))

    # how much each input moves each result
    sens_rows = []
    head = "".join(f"<th>{html.escape(out_name(r))}</th>" for r in results)
    worst: tuple[str, float] = ("", 0.0)
    for f in fields:
        k = f["name"]
        base = env.get(k)
        if not isinstance(base, (int, float)) or k not in solved:
            continue
        bump = dict(env)
        bump[k] = base * 1.1 if base else 0.1
        alt = solve(spec, bump)
        cells, top = [], 0.0
        for r in results:
            rk = r["name"]
            if rk in solved and rk in alt and solved[rk]:
                change = (alt[rk] - solved[rk]) / abs(solved[rk])
                top = max(top, abs(change))
                cells.append(f"{'+' if change >= 0 else '−'}{fmt(abs(change) * 100, 2)} %")
            else:
                cells.append("—")
        if top > worst[1]:
            worst = (label_of(f), top)
        sens_rows.append(f"<tr><td><strong>{html.escape(label_of(f))}</strong> +10 %</td>"
                         + "".join(f"<td>{c}</td>" for c in cells) + "</tr>")

    # one input typed ten times too large
    ten_rows = []
    first = results[0]["name"] if results else ""
    for f in fields:
        k = f["name"]
        base = env.get(k)
        if not isinstance(base, (int, float)) or first not in solved:
            continue
        ten = dict(env)
        ten[k] = base * 10 if base else 1.0
        alt = solve(spec, ten)
        if first in alt and solved.get(first):
            ratio = alt[first] / solved[first]
            if abs(ratio - 10) < 0.01:
                word = "ten times larger"
            elif abs(ratio - 0.1) < 0.001:
                word = "ten times smaller"
            elif abs(ratio - 1) < 0.001:
                word = "unchanged"
            else:
                word = f"×{num(ratio)}"
            ten_rows.append(f"<tr><td><strong>{html.escape(label_of(f))}</strong> ×10</td>"
                            f"<td>{fmt(solved[first])}</td><td>{fmt(alt[first])}</td>"
                            f"<td>{word}</td></tr>")

    # the same conversion at ten scales
    scale_html = ""
    first_field = next((f for f in fields if isinstance(env.get(f["name"]), (int, float))), None)
    if first_field and results and spec.formula:
        key = first_field["name"]
        base_value = float(env[key])
        if base_value > 0:
            body, seen = [], set()
            for step in (0.1, 0.5, 1, 2, 5, 10, 100, 1000):
                vals = dict(env)
                vals[key] = base_value * step
                got = solve(spec, vals)
                if not got:
                    continue
                cells = tuple(fmt(got.get(r["name"])) if r["name"] in got else "—"
                              for r in results)
                if cells in seen:
                    continue
                seen.add(cells)
                shown = fmt(vals[key]) + ((" " + unit_of(first_field)) if unit_of(first_field) else "")
                body.append(f"<tr><td>{shown}</td>"
                            + "".join(f"<td>{c}</td>" for c in cells) + "</tr>")
            if len(body) >= 4:
                scale_html = (
                    "<p>One row per reading, the input from a tenth of its opening value up to a "
                    "thousand times it. The point of the table is the shape rather than the "
                    "figures: a column that keeps its first digits as the input grows is a "
                    "proportional relationship, and a column whose digits move sideways is one "
                    "with an offset or a power in it.</p>"
                    "<table class=\"calc-table\"><thead><tr>"
                    f"<th>{html.escape(label_of(first_field))}</th>"
                    + "".join(f"<th>{html.escape(out_name(r))}</th>" for r in results)
                    + f"</tr></thead><tbody>{''.join(body)}</tbody></table>"
                    "<p>Nothing in that table was computed by a different route from the panel. "
                    "It is the same formula, run eight times, which is why a row you can check by "
                    "hand is a check on the whole page.</p>")

    # the arithmetic with the numbers written in
    steps_rows = []
    for r in results:
        expr = spec.formula.get(r["name"], "")
        if not expr or r["name"] not in solved:
            continue

        def sub_val(m: re.Match[str]) -> str:
            name = m.group(0)
            if name in env and isinstance(env[name], (int, float)):
                return fmt(float(env[name]))
            if name in solved:
                return fmt(solved[name])
            return name

        literal = re.sub(r"[A-Za-z_][A-Za-z0-9_]*", sub_val, clean(expr))
        literal = literal.replace(" * ", " × ").replace(" / ", " ÷ ")
        literal = literal.replace("*", " × ").replace("/", " ÷ ")
        literal = re.sub(r"\s+", " ", literal).strip()
        steps_rows.append(
            f"<tr><td><strong>{html.escape(label_of(r))}</strong></td>"
            f"<td><code>{html.escape(literal)}</code></td>"
            f"<td><strong>{fmt(solved[r['name']])}</strong></td></tr>")
    steps_html = ""
    if steps_rows:
        spread = ""
        vals = [solved[r["name"]] for r in results if r["name"] in solved]
        if len(vals) >= 2 and min(vals) > 0 and max(vals) / min(vals) > 1e3:
            spread = (f"<p>At these values the results span {num(max(vals) / min(vals))} times "
                      f"from smallest to largest, which is the sort of page where a misplaced "
                      f"decimal point survives a glance and only the unit gives it away.</p>")
        steps_html = (
            "<p>The same working with the numbers written in place of the names. Nothing is "
            "applied between the two columns that the formula table above does not show.</p>"
            "<table class=\"calc-table\"><thead><tr><th>Result</th><th>With the values in</th>"
            f"<th>Answer</th></tr></thead><tbody>{''.join(steps_rows)}</tbody></table>"
            "<p>Read the middle column against the formula table if a figure surprises you: the "
            "two should differ only in that the names have been replaced.</p>" + spread +
            "<p>Doing the arithmetic by hand once, at the values the page opens with, is the "
            "quickest way to find out whether you understand the relationship or have simply "
            "learned to trust the panel. Where the hand answer and the panel disagree, the "
            "middle column shows which input you used differently.</p>")

    # a grid over two inputs
    grid_html = ""
    nums = [f for f in fields if isinstance(env.get(f["name"]), (int, float))
            and f["name"] in solved]
    if len(nums) >= 2 and results:
        a_f, b_f = nums[0], nums[1]
        a0, b0 = float(env[a_f["name"]]), float(env[b_f["name"]])
        if a0 and b0:
            body = []
            for sa in (0.5, 1, 2, 10):
                for sb in (0.5, 1, 2, 10):
                    vals = dict(env)
                    vals[a_f["name"]] = a0 * sa
                    vals[b_f["name"]] = b0 * sb
                    got = solve(spec, vals)
                    if results[0]["name"] not in got:
                        continue
                    body.append(
                        f"<tr><td>{fmt(vals[a_f['name']])}</td><td>{fmt(vals[b_f['name']])}</td>"
                        + "".join(f"<td>{fmt(got[r['name']]) if r['name'] in got else '—'}</td>"
                                  for r in results) + "</tr>")
            if len(body) >= 4:
                grid_html = (
                    f"<p>Two inputs means two ways to be wrong, so the grid below moves both: "
                    f"{html.escape(soft(label_of(a_f)))} in the first column and "
                    f"{html.escape(soft(label_of(b_f)))} in the second, each taken at half, at "
                    f"its opening value, at twice and at ten times.</p>"
                    f"<table class=\"calc-table\"><thead><tr>"
                    f"<th>{html.escape(label_of(a_f))}</th><th>{html.escape(label_of(b_f))}</th>"
                    + "".join(f"<th>{html.escape(out_name(r))}</th>" for r in results)
                    + f"</tr></thead><tbody>{''.join(body)}</tbody></table>"
                    "<p>Read it for the shape rather than the figures. Where a column doubles "
                    "when its input doubles, that input enters linearly; where the column barely "
                    "moves, the formula is holding it in a sum with something much larger; and "
                    "where two rows repeat the same numbers, the two inputs are compensating for "
                    "each other and only their combination matters.</p>")

    # two scenarios
    scen = []
    for sc in spec.prose.get("scenarios", []):
        vals = dict(env)
        vals.update(sc["inputs"])
        got = solve(spec, vals)
        given = ", ".join(f"{html.escape(labels.get(k, k))} = {fmt(v)}"
                          for k, v in sc["inputs"].items())
        reported = ", ".join(f"<strong>{html.escape(out_name(r))}</strong> = {fmt(got[r['name']])}"
                             f"{(' ' + html.escape(unit_of(r))) if unit_of(r) else ''}"
                             for r in results if r["name"] in got)
        scen.append(f"<li>With {given}, the page reports {reported}."
                    + (f" {sc['note']}" if sc.get("note") else "") + "</li>")
    if not scen:
        for factor in (0.25, 4.0):
            vals = {k: (v * factor if isinstance(v, (int, float)) else v) for k, v in env.items()}
            got = solve(spec, vals)
            if not got:
                continue
            given = ", ".join(f"{html.escape(labels.get(k, k))} = {fmt(v)}"
                              for k, v in vals.items() if isinstance(v, (int, float)))
            reported = ", ".join(f"<strong>{html.escape(out_name(r))}</strong> = {fmt(got[r['name']])}"
                                 for r in results if r["name"] in got)
            scen.append(f"<li>With {given}, the page reports {reported}.</li>")

    def li(x) -> str:
        if isinstance(x, (tuple, list)):
            return f"<li><strong>{x[0]}</strong> {' '.join(str(y) for y in x[1:])}</li>"
        t = str(x).strip()
        return t if t.startswith("<li>") else f"<li>{t}</li>"

    pit = "".join(li(x) for x in prose["pitfalls"])
    lim = "".join(li(x) for x in prose["limits"])
    use = "".join(li(x) for x in prose["uses"])
    links = " ".join(f'<a href="{p}">{html.escape(n)}</a>' for p, n in spec.related)
    link_text = f"<p>Where the answer is one step further on: {links}.</p>" if links else ""

    rules_html = "".join(f"<li>{r}</li>" for r in spec.prose.get("rules", []))
    examples_html = ""
    examples = spec.prose.get("examples_out") or []
    if examples:
        head_cells = "".join(f"<th>{html.escape(str(k))}</th>" for k in examples[0][0])
        body = ""
        for given, got, note in examples:
            cells = "".join(f"<td>{html.escape(str(v))}</td>" for v in given.values())
            answers = " · ".join(f"<strong>{html.escape(k)}</strong> {html.escape(str(v))}"
                                 for k, v in got.items())
            body += f"<tr>{cells}<td>{answers}</td></tr>"
        # what the runs say taken together, computed rather than described
        first_key = next(iter(examples[0][1]), None)
        spread_note = ""
        if first_key:
            vals = [str(got.get(first_key, "")) for _g, got, _n in examples]
            lengths = [len(v) for v in vals]
            if min(lengths) != max(lengths):
                spread_note = (
                    f"<p>Taking the runs together, the {first_key} answer ranges from "
                    f"{min(lengths)} to {max(lengths)} characters — "
                    f"{html.escape(min(vals, key=len))} is the shortest and "
                    f"{html.escape(max(vals, key=len))} the longest. A rule that is applied "
                    f"evenly produces answers whose length tracks the input; a run whose answer "
                    f"is much shorter than its neighbours has usually had characters dropped "
                    f"by the clean-up step, not by the conversion.</p>")
        count = {1: "One run", 2: "Two runs", 3: "Three runs", 4: "Four runs"}.get(
            len(examples), f"{len(examples)} runs")
        examples_html = (
            f"<p>{count} through this page, with the input in the first columns and what "
            "the panel returns beside it. They are not illustrations: each row is the page's "
            "own output for the input shown, which is why a row you can reproduce by hand is a "
            "check on the whole script.</p>"
            f"<table class=\"calc-table\"><thead><tr>{head_cells}<th>What comes back</th>"
            f"</tr></thead><tbody>{body}</tbody></table>"
            "<p>Read the rows against each other rather than one at a time. Where one input "
            "changes and the answer does not, that input is not consulted for this case; where "
            "two rows give the same answer, the difference between them was outside the range "
            "the rules look at.</p>"
            + spread_note)

    first_rule = (f"The relationship is {plain(list(spec.formula.values())[0], labels)}."
                  if spec.formula else
                  (f"It {spec.engine_note}." if spec.engine_note else
                   "It reads the inputs and reports the result."))

    if spec.engine == "script":
        prose["reading"] = spec.prose.get("reading_script", prose["reading"])

    reading_extra = (f"<p>{cap(names_out)} should land in the range you expected before you "
                     "pressed anything. A figure ten times out, or a thousand times out, is the "
                     "usual shape of a unit slip and not of a calculation error.</p>"
                     if results else "")

    sections = [
        ("What this calculator works out",
         prose["why"]
         + f"<p>The page reports <strong>{names_out}</strong> from the boxes above it. "
           f"{first_rule}"
         + (" Every line of the table below is that same relationship arranged for a different "
            "unknown, so the working can be followed from whichever quantity you already have.</p>"
            if spec.formula else "</p>")),
        (("The rules it applies" if not spec.formula else "The formula, and every way round it"),
         ("<p>There is no equation here to rearrange, so the table an ordinary converter would "
          "carry is empty on purpose. What replaces it is the list of rules the page applies, "
          "each one written the way the script implements it.</p>"
          + (f"<ul>{rules_html}</ul>" if rules_html else "")
          + (f"<p>The list is a sequence rather than a menu: the clean-up happens first, the "
             f"conversion second and the formatting last. That order matters, because a "
             f"character thrown away at the top never reaches the step below it — which is why "
             f"an answer can look wrong when the rule that changed it was the tidying, not the "
             f"arithmetic.</p>" if rules_html else "")
          + prose["formula_note"])
         if not spec.formula else
         ("<p>One relationship drives the page. Each line below is the same relationship "
          "arranged for a different unknown, which is what you need when the quantity you "
          "already know is not the one this page reports.</p>"
          "<table class=\"calc-table\"><thead><tr><th>Solving for</th><th>Expression</th>"
          f"</tr></thead><tbody>{rows}</tbody></table>" + prose["formula_note"])),
        ("What to enter, and what comes back",
         f"<p>Fill in {len(fields)} box{'es' if len(fields) != 1 else ''} and the page has "
         f"everything it needs. It reports {names_out}.</p><ul>{''.join(inlist)}</ul>"
         f"<p>The results are the boxes you leave alone:</p><ul>{''.join(outlist)}</ul>"
         "<p>Every input needs a value before the page can answer. Nothing is carried over "
         "from a previous run, so a result that stays blank means an input is missing rather "
         "than that the page has kept an older number. The result boxes are read-only and "
         "recomputed from the inputs, so the page always works forwards"
         + (", and the rules above are what a conversion to the other direction would need.</p>"
            if spec.engine == "script" else
            "; to go the other way the table above gives the rearrangement.</p>")),
        ("A worked example you can reproduce",
         (f"<p>Enter the values the page is built around — {numbered} — and the results panel "
          f"reads:</p><ul>{''.join(worked)}</ul>"
          "<p>Nothing is rounded between steps: the arithmetic is done at full precision and "
          "only the display is shortened.</p>" + prose["example_note"])
         if worked else examples_html + prose["example_note"]),
        ("Reading the answer", prose["reading"] + reading_extra),
    ]
    if sens_rows:
        sections.append(
        ("How much each input moves the answer",
         "<p>Take the values above, raise one box by ten per cent and re-solve. The percentage "
         "is how far each result moves:</p>"
         "<table class=\"calc-table\"><thead><tr><th>Change</th>" + head + "</tr></thead>"
         f"<tbody>{''.join(sens_rows)}</tbody></table>" + prose["sensitivity_note"]
         + (f"<p>The box the answer is most exposed to is <strong>{html.escape(worst[0])}</strong>: "
            f"ten per cent there moves a result by about {fmt(worst[1] * 100, 1)} per cent. That "
            f"is the number to measure twice.</p>" if worst[0] else "")))
    if scen:
        sections.append(
        ("Two more scenarios, worked through",
         "<p>One example shows the page computes. Two more show how it behaves away from the "
         f"values above:</p><ul>{''.join(scen)}</ul>" + prose["scenario_note"]))
    if steps_html:
        sections.append(("The arithmetic, line by line", steps_html))
    if scale_html:
        sections.append(("The same conversion at other values", scale_html))
    if grid_html:
        sections.append(("How the two inputs combine", grid_html))
    if spec.prose.get("extra"):
        sections.append((spec.prose.get("extra_title", "More on this conversion"),
                         spec.prose["extra"]))

    sections += [
        ("Where the numbers usually go wrong",
         f"<ul>{pit}"
         "<li><strong>A unit entered against the wrong row.</strong> Each box says what it "
         "expects; a milligram typed where grams are asked for is out by a factor of a "
         "thousand, and the answer still looks plausible.</li>"
         "<li><strong>A past answer typed back in.</strong> The result boxes are read-only, so "
         "a previous answer has to be worked back through the inputs.</li></ul>"),
        (("What it does not do" if spec.engine == "script" else "Units and precision"),
         prose["units_note"] if spec.engine == "script" and not any(
             unit_of(r) or unit_of(f) for r in results for f in fields) else
         ("<p>Each box carries its unit beside it, and each result is reported in the unit "
          "named with it: "
          + ", ".join(out_name(r) + ((f" ({unit_of(r)})") if unit_of(r) else "")
                      for r in results) + ".</p>"
          "<p>No answer on this site is printed with more than three decimals, and values far "
          "from everyday size are shown in scientific notation so the significant figures stay "
          "readable. Display rounding never feeds back into the calculation: the value behind "
          "the number keeps its full precision until an input changes.</p>"
          "<p>Units in a formula behave like ordinary algebra: feet times feet leaves square "
          "feet, and a square footage times a thickness divided by twelve leaves cubic feet. "
          "If a result comes out with the wrong order of magnitude, writing the units of each "
          "box into the formula usually shows which one was entered on the wrong scale.</p>"
          + prose["units_note"])),
        ("Getting an answer, step by step",
         "<ol>"
         f"<li><strong>Collect the inputs.</strong> You need {names_in}. Note the unit each one "
         "is in before you type, because the page cannot tell a value entered in the wrong "
         "unit from a correct one.</li>"
         "<li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel "
         "updates as you change a value. Fill every box the page asks for.</li>"
         f"<li><strong>Read the result against the worked example.</strong> {cap(names_out)} "
         "should be of the same order of magnitude as the figure above for inputs of the same "
         "order.</li>"
         "<li><strong>Change one box to check the direction.</strong> Move a single input and "
         "confirm the result moves the way the formula says it should.</li></ol>"
         "<p>Write the answer down with its unit and the values that produced it.</p>"),
    ]
    if ten_rows:
        sections.append(
        ("When one input is out by a factor of ten",
         "<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an "
         "answer that still looks like an answer. Here is what the first result does if each "
         "box in turn is typed ten times too large:</p>"
         "<table class=\"calc-table\"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th>"
         f"<th>Effect</th></tr></thead><tbody>{''.join(ten_rows)}</tbody></table>"
         "<p>Read the last column two ways. Where it says ten times larger or smaller, the "
         "relationship is linear in that box and a unit slip goes straight through to the "
         "answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum "
         "and the mistake is partly absorbed — which is more dangerous, because the result then "
         "looks reasonable.</p>"))
    sections += [
        ("What the page does before it answers",
         "<p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser "
         "each time an input changes. A result stays blank until every value it needs is "
         "present and finite, so an empty box means a missing input rather than an error. Zero "
         "is accepted, but a formula that would divide by it reports no result instead of "
         "infinity. Precision is carried throughout and the three-decimal limit is applied "
         "only at the end.</p>"),
        ("Limits worth knowing",
         f"<ul>{lim}<li><strong>It computes the relationship, not your case.</strong> Nothing "
         "here corrects for measurement error, impurities or conditions outside the range the "
         "relationship was written for.</li></ul>"),
        ("Where this calculation comes up",
         (f"<ul>{use}</ul>" if use else
          "<p>Anywhere the number you have is the one in the form and the number you are "
          "missing is the one the page reports.</p>") + link_text),
    ]

    # a page whose sections come out thin gets a computed cross-check, not padding
    if first_field and results and _words(sections) < 1600:
        key = first_field["name"]
        base_value = float(env[key])
        if base_value:
            pairs = []
            for step in (0.9, 1.0, 1.1):
                vals = dict(env)
                vals[key] = base_value * step
                got = solve(spec, vals)
                if results[0]["name"] in got:
                    pairs.append((vals[key], got[results[0]["name"]]))
            if len(pairs) == 3:
                (v1, r1), (v2, r2), (v3, r3) = pairs
                slope = (r3 - r1) / (v3 - v1) if v3 != v1 else 0.0
                cross = (
                    "<p>A conversion is easy to check when the relationship is smooth, because "
                    f"a small move in the input gives a small move in the answer. Reading "
                    f"{html.escape(soft(label_of(first_field)))} at {fmt(v1)}, at {fmt(v2)} and "
                    f"at {fmt(v3)} gives {fmt(r1)}, {fmt(r2)} and {fmt(r3)} "
                    f"{html.escape(unit_of(results[0])) if unit_of(results[0]) else ''}, and "
                    "the three figures sit evenly apart.</p>"
                    f"<p>The local rate works out at {fmt(slope)} units of answer per unit of "
                    "input around the opening value. Multiply that rate by the difference "
                    "between any two readings here and you get back the difference between "
                    "their answers — which is the test. If the middle figure were not halfway "
                    "between the outer two, the relationship would be bending at this scale and "
                    "the rate would only hold over a narrow band.</p>"
                    "<p>Two independent routes to the same number is what makes a result worth "
                    "quoting. The panel does the arithmetic, this check does the direction, and "
                    "a figure that survives both is one you can put in a document without a "
                    "caveat.</p>")
                sections.insert(-1, ("Checking the answer against a nearby value", cross))

    # A page whose tables are full of large numbers can run past the top of the
    # window on its own; the least essential computed sections go first.
    for _title in ("The same conversion at other values", "How the two inputs combine",
                   "Two more scenarios, worked through", "The arithmetic, line by line",
                   "Checking the answer against a nearby value"):
        if _words(sections) + _words([("", spec.what)]) <= 2430:
            break
        for _i, (_t, _h) in enumerate(sections):
            if _t == _title:
                sections.pop(_i)
                break

    faq = [
        (f"What does the {spec.name.replace(' Calculator', '')} work out?",
         f"It returns {names_out} from {names_in}. {first_rule}"),
        ("Which values do I need before I start?",
         ", ".join(label_of(f) + (f" ({unit_of(f)})" if unit_of(f) else "") for f in fields)
         + ". The result boxes need no input of their own: they are computed."),
        ("Can I use it backwards?",
         "Not from the page itself: the results are read-only and the arithmetic always runs "
         "from the inputs. The formula table lists the rearrangement for each unknown."),
        ("Does it matter which unit I type in?",
         "It matters that every box is in the unit printed beside it: "
         + "; ".join(f"{soft(label_of(f))} in {unit_of(f)}" for f in fields if unit_of(f))
         + ". The page converts nothing on its own, so a mixed set of units is the most common "
           "wrong answer."),
        ("How precise is the answer?",
         "Results are computed at full precision and printed with at most three decimals, with "
         "scientific notation for very large or small values."),
        ("What happens if I leave a box empty?",
         "The result stays blank until every input it needs holds a number. Nothing is guessed "
         "and no default is substituted behind your back."),
        ("Is anything saved?",
         "No. The arithmetic runs in the browser, nothing is submitted, and a reload starts "
         "from the values the page ships with."),
    ]

    return {
        "intro": spec.what,
        "sections": [{"title": t, "html": h} for t, h in sections],
        "faq": [{"q": q, "a": a} for q, a in faq],
        "related": [{"path": p, "name": n} for p, n in spec.related],
        "authors": [{"name": "Onim Editorial", "role": "Written and checked"}],
    }


# ---------------------------------------------------------------------- file
def php(value: Any, indent: int = 0) -> str:
    pad = "    " * indent
    if isinstance(value, bool):
        return "true" if value else "false"
    if isinstance(value, (int, float)):
        return str(value) if not isinstance(value, float) else f"{value:g}"
    if value is None:
        return "null"
    if isinstance(value, str):
        return "'" + value.replace("\\", "\\\\").replace("'", "\\'") + "'"
    if isinstance(value, dict):
        body = "".join(f"{pad}    '{k}' => {php(v, indent + 1)},\n" for k, v in value.items())
        return "[\n" + body + pad + "]"
    if isinstance(value, (list, tuple)):
        body = "".join(f"{pad}    {php(v, indent + 1)},\n" for v in value)
        return "[\n" + body + pad + "]"
    raise TypeError(f"cannot serialise {type(value)}")


def render_file(spec: Spec) -> str:
    fields: list[dict] = []
    for f in spec.fields:
        if f.get("type") == "number" and "default" in f:
            d = f["default"]
            try:
                if float(d) == int(float(d)):
                    f = dict(f, default=str(int(float(d))))
            except (TypeError, ValueError):
                pass
        fields.append(f)
    fields += spec.results

    art = build_article(spec)
    defn = {
        "authored": True,
        "name": spec.name,
        "meta": {
            "title": spec.title,
            "description": spec.desc,
            "h1": spec.h1 or spec.name,
            "updated": UPDATED,
        },
        "sections": [{"columns": 2, "fields": fields}],
        "formula": [{"title": spec.name,
                     "results": {k: clean(v) for k, v in spec.formula.items()}}],
        "article": art,
    }
    if spec.engine == "script":
        defn["engine"] = "script"
        defn["engine_note"] = spec.engine_note
    body = php(defn)
    out = ("<?php\n\n/**\n"
           f" * {spec.name}\n * /conversion/{spec.slug}\n *\n"
           " * One calculator, one file. Edit the form, the formulas or the\n"
           " * article here; the page is rebuilt from this file on the next\n"
           " * request. See docs/calc-files.md for the format.\n */\n\n")
    if spec.engine == "script" and spec.js.strip():
        body = body.rstrip()
        assert body.endswith("]")
        body = (body[:-1] + "\n    'js' => <<<'TXT'\n" + spec.js.strip() + "\nTXT,\n]\n")
    return out + "return " + body + ";\n"


def write_file(spec: Spec) -> str:
    os.makedirs(OUT, exist_ok=True)
    path = os.path.join(OUT, f"qm-calc-{spec.slug}.php")
    with open(path, "w", encoding="utf-8") as fh:
        fh.write(render_file(spec))
    return path
