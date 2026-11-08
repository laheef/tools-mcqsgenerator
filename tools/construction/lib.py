"""
Framework for the construction pack.

One calculator is described once, as data:

    S(slug=..., name=..., title=..., desc=..., what=..., fields=[...],
      results=[...], formula={...}, prose={...})

and this module turns that description into the calculator file the site
builds a page from:

    plugins/calc/construction/qm-calc-<slug>.php

Nothing in the article is invented: the worked example, the sensitivity table
and the alternative scenarios are all evaluated from the same expressions that
go into the file, with Python, and are checked again against the site's PHP
solver by tools/construction/qa.py.
"""

from __future__ import annotations

import html
import math
import re
from decimal import Decimal
from dataclasses import dataclass, field as dc_field
from typing import Any

CAT = "construction"
UPDATED = "2026-10-23"


# ------------------------------------------------------------------ fields

def F(key: str, label: str, suffix: str = "", default: Any = "", help: str = "",
      step: str = "", prefix: str = "", bounds: tuple[float, float] | None = None) -> dict:
    """An input box."""
    f: dict[str, Any] = {"name": key, "label": label, "type": "number"}
    if suffix:
        f["suffix"] = suffix
    if prefix:
        f["prefix"] = prefix
    if str(default) != "":
        f["default"] = str(default)
    if help:
        f["help"] = help
    f["rounding"] = ["omni", "0.0001"]
    if bounds:
        f["_bounds"] = list(bounds)
    return f


def R(key: str, label: str, suffix: str = "", help: str = "", rounding: str = "0.0001") -> dict:
    """A result box: computed, not typed into."""
    f: dict[str, Any] = {
        "name": key,
        "label": label,
        "type": "number",
        "readonly": True,
        "rounding": ["omni", rounding],
    }
    if suffix:
        f["suffix"] = suffix
    if help:
        f["help"] = help
    return f


def SEL(key: str, label: str, options, default: Any = None, help: str = "") -> dict:
    """A drop-down, options as (label, value)."""
    f: dict[str, Any] = {
        "name": key,
        "label": label,
        "type": "select",
        "options": {str(lbl): v for lbl, v in options},
        "control": "SELECT",
    }
    if default is not None:
        f["default"] = str(default)
    if help:
        f["help"] = help
    return f


def NOTE(text: str) -> dict:
    return {"type": "note", "text": text}


# -------------------------------------------------------------------- spec

@dataclass
class Spec:
    slug: str
    name: str
    title: str
    desc: str
    what: str                                   # the answer, in one paragraph
    fields: list[dict]                          # inputs
    results: list[dict]                         # result boxes
    formula: dict[str, str]                     # result key -> expression
    extra: dict[str, str] = dc_field(default_factory=dict)   # other rearrangements
    prose: dict[str, Any] = dc_field(default_factory=dict)   # article specifics
    faq: list[tuple[str, str]] = dc_field(default_factory=list)
    related: list[tuple[str, str]] = dc_field(default_factory=list)
    notes: list[str] = dc_field(default_factory=list)         # note lines on the form
    passes: list[dict] = dc_field(default_factory=list)       # multi-pass formulas
    h1: str = ""
    no_round_trip: list[str] = dc_field(default_factory=list)  # inputs with no inverse

    def all_formulas(self) -> dict[str, str]:
        out = dict(self.formula)
        out.update(self.extra)
        return out

    def inputs(self) -> dict[str, dict]:
        return {f["name"]: f for f in self.fields if f.get("type") != "note"}

    def default_env(self) -> dict[str, float]:
        env: dict[str, float] = {}
        for f in self.fields:
            if f.get("type") == "select":
                continue
            d = f.get("default")
            if d not in (None, ""):
                try:
                    env[f["name"]] = float(d)
                except (TypeError, ValueError):
                    pass
        return env


def S(**kwargs: Any) -> Spec:
    """A calculator, keyword-only, as the specs files read it."""
    return Spec(**kwargs)


# ------------------------------------------------------------------ maths

def _snap(x: float, up: bool) -> float:
    """ceil/floor, immune to binary rounding noise (mirrors lib/Expr.php)."""
    n = round(x)
    if abs(x - n) <= 1e-9 * max(1.0, abs(x)):
        return float(n)
    return math.ceil(x) if up else math.floor(x)


FUNCS = {
    "pow": pow,
    "sqrt": math.sqrt,
    "log": math.log,
    "ln": math.log,
    "log10": math.log10,
    "exp": math.exp,
    "abs": abs,
    "min": min,
    "max": max,
    "round": round,
    "floor": lambda x: _snap(x, False),
    "ceil": lambda x: _snap(x, True),
    "gcd": lambda a, b: math.gcd(int(round(a)), int(round(b))),
    "sin": math.sin,
    "cos": math.cos,
    "tan": math.tan,
    "asin": math.asin,
    "acos": math.acos,
    "atan": math.atan,
    "rad": math.radians,
    "deg": math.degrees,
    "pi": math.pi,
    "e": math.e,
}


class BadMath(ValueError):
    pass


def ev(expr: str, env: dict[str, float]) -> float:
    """Evaluate one site expression with Python, refusing anything surprising."""
    py = expr.replace("^", "**")
    py = re.sub(r"\bpi\b(?![a-zA-Z_])", "pi()", py)

    def pi() -> float:
        return math.pi

    scope: dict[str, Any] = dict(FUNCS)
    scope["pi"] = pi
    scope.update(env)
    try:
        value = eval(py, {"__builtins__": {}}, scope)      # noqa: S307 - our own strings
    except Exception as exc:                               # noqa: BLE001
        raise BadMath(f"{expr}: {exc}") from exc
    if isinstance(value, complex) or not math.isfinite(float(value)):
        raise BadMath(f"{expr}: not a finite number")
    return float(value)


def solve(spec: Spec, env: dict[str, float]) -> dict[str, float]:
    """Evaluate every formula that can be evaluated, in dependency order."""
    out = dict(env)
    pending = dict(spec.all_formulas())
    for _ in range(6):
        progress = False
        for key, expr in list(pending.items()):
            try:
                out[key] = ev(expr, out)
            except (BadMath, KeyError):
                continue
            pending.pop(key)
            progress = True
        if not pending or not progress:
            break
    return out



# ------------------------------------------------------------ metadata fit

TITLE_TAILS = ["", " Tool", " Guide", " — Formula", " and Units", " — Steps",
               " — Formula and Steps", " with Formula and Units", " — Formula, Units"]
DESC_TAILS = [
    "", " Units shown.", " With units.", " See the steps.", " The formula is shown.",
    " The formula and units are shown.", " See the formula.",
    " The formula and a worked example are shown.",
    " See the formula, the units and a worked example.",
    " The formula, the units and a worked example are shown below.",
    " See the formula, the units, a worked example and the rearrangements.",
]


def fit_title(core: str, lo: int = 43, hi: int = 53) -> str:
    """The title with the brand suffix counted: 50-60 characters in the head."""
    core = core.strip()
    if lo <= len(core) <= hi:
        return core
    for tail in TITLE_TAILS:
        cand = core + tail
        if lo <= len(cand) <= hi:
            return cand
    # last resort: trim words from the end
    words = core.split()
    while words and len(" ".join(words)) > hi:
        words.pop()
    return " ".join(words)


def fit_desc(core: str, lo: int = 150, hi: int = 160) -> str:
    """The description within the 150-160 window, padded with a real sentence."""
    core = core.strip()
    if lo <= len(core) <= hi:
        return core
    for tail in DESC_TAILS:
        cand = core + tail
        if lo <= len(cand) <= hi:
            return cand
    if len(core) > hi:
        words = core.split()
        while words and len(" ".join(words)) > hi:
            words.pop()
        return " ".join(words).rstrip(",;") + "."
    return core

def soft(label: str) -> str:
    """A label mid-sentence: lowercases the first letter only, so (M) stays (M)."""
    return label[:1].lower() + label[1:] if label else label


def fmt(v: float, dp: int = 3) -> str:
    """A number as the page prints it: at most three decimals, thin groups."""
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


def pct(v: float) -> str:
    return fmt(v * 100, 2) + " %"


# -------------------------------------------------------------- expression

def plain(expr: str, labels: dict[str, str]) -> str:
    """An expression as prose: labels instead of names, × and ÷ instead of * and /."""
    s = expr
    s = re.sub(r"\bpi\(\)", "π", s)
    s = re.sub(r"\blog10\(", "log₁₀(", s)
    s = re.sub(r"\blog\(", "ln(", s)
    s = re.sub(r"\bsqrt\(", "√(", s)
    # pow(a, b) -> (a)^b, innermost first
    for _ in range(6):
        m = re.search(r"pow\(([^()]*\([^()]*\)[^()]*|[^(),]*),\s*([^(),]*(?:\([^()]*\))?[^(),]*)\)", s)
        if not m:
            break
        base, exp = m.group(1), m.group(2)
        s = s[:m.start()] + f"({base})^{exp}" + s[m.end():]
    s = re.sub(r"\b\d+(?:\.\d+)?[eE][+-]?\d+\b", lambda m: fmt(float(m.group(0))), s)
    s = re.sub(r"\b\d{12,}\b", lambda m: fmt(float(m.group(0))), s)
    s = re.sub(r"\b([A-Za-z_][A-Za-z0-9_]*)\b",
               lambda m: labels.get(m.group(1), m.group(1)), s)
    s = s.replace(" * ", " × ").replace("*", " × ")
    s = s.replace(" / ", " ÷ ").replace("/", " ÷ ")
    return re.sub(r"\s+", " ", s).strip()


def unit_of(field: dict) -> str:
    return str(field.get("suffix") or "").strip()


def label_of(field: dict) -> str:
    return str(field.get("label") or field.get("name"))


# ------------------------------------------------------------------ article

def build_article(spec: Spec) -> dict:
    fields = [f for f in spec.fields if f.get("type") not in ("note",)]
    results = spec.results

    def stem_of(label: str) -> str:
        return re.sub(r"\s*\([^)]*\)\s*$", "", label)

    labels = {f["name"]: label_of(f) for f in fields}
    stems: dict[str, int] = {}
    for r in results:
        stems[stem_of(label_of(r))] = stems.get(stem_of(label_of(r)), 0) + 1
    for r in results:
        stem = stem_of(label_of(r))
        if stems[stem] > 1 and unit_of(r):
            labels[r["name"]] = f"{stem} ({unit_of(r).replace('/', ' per ')})"
        else:
            labels[r["name"]] = label_of(r)

    env = spec.default_env()
    solved = solve(spec, env)
    prose = spec.prose

    names_in = " and ".join(soft(label_of(f)) for f in fields)

    def out_name(r: dict) -> str:
        """Two results can share a label (M and mmol/L); the unit tells them apart."""
        stem = stem_of(label_of(r))
        same = sum(1 for other in results if stem_of(label_of(other)) == stem)
        if same > 1 and unit_of(r):
            return f"{soft(stem)} ({unit_of(r)})"
        return soft(label_of(r))

    names_out = " and ".join(out_name(r) for r in results)

    inlist = []
    for f in fields:
        if f.get("type") == "select":
            opts = list(f.get("options", {}))
            inlist.append(f"<li><strong>{html.escape(label_of(f))}</strong> — a choice: "
                          f"{html.escape(', '.join(opts))}</li>")
            continue
        u = unit_of(f)
        helptext = f.get("help", "")
        tail = f". {html.escape(helptext)}" if helptext else "."
        inlist.append(f"<li><strong>{html.escape(label_of(f))}</strong>"
                      f"{(' — in ' + html.escape(u)) if u else ''}{tail}</li>")

    outlist = []
    for r in results:
        u = unit_of(r)
        outlist.append(f"<li><strong>{html.escape(label_of(r))}</strong>"
                       f"{(' — in ' + html.escape(u)) if u else ''}"
                       f"{('. ' + html.escape(r['help'])) if r.get('help') else ''}</li>")

    formulas = spec.all_formulas()
    rows = []
    for key, expr in formulas.items():
        rows.append(f"<tr><td><strong>{html.escape(labels.get(key, key))}</strong></td>"
                    f"<td><code>{plain(expr, labels)}</code></td></tr>")

    # Worked example at the page's default values
    worked = []
    for r in results:
        key = r["name"]
        if key in solved:
            worked.append(
                f"<li><strong>{html.escape(label_of(r))}</strong> = "
                f"<code>{plain(spec.formula.get(key, ''), labels)}</code> = "
                f"<strong>{fmt(solved[key])}{(' ' + html.escape(unit_of(r))) if unit_of(r) else ''}</strong></li>")

    defaults_in = ", ".join(
        f"{label_of(f)} = {fmt(env[f['name']])}{(' ' + unit_of(f)) if unit_of(f) else ''}"
        for f in fields if f["name"] in env)

    # Sensitivity: +10 % on each input, every result
    base = solved
    sens_rows = []
    effect: list[tuple[str, float]] = []
    ten_rows = []
    for f in fields:
        k = f["name"]
        if k not in base:
            continue
        bumped = dict(env)
        bumped[k] = base[k] * 1.1 if base[k] else 0.1
        alt = solve(spec, bumped)
        cells = []
        worst = 0.0
        for r in results:
            rk = r["name"]
            if rk in base and rk in alt and base[rk]:
                change = (alt[rk] - base[rk]) / abs(base[rk])
                worst = max(worst, abs(change))
                cells.append(f"{'+' if change >= 0 else '−'}{fmt(abs(change) * 100, 2)} %")
            else:
                cells.append("—")
        effect.append((label_of(f), worst))
        sens_rows.append(f"<tr><td><strong>{html.escape(label_of(f))}</strong> +10 %</td>"
                         + "".join(f"<td>{c}</td>" for c in cells) + "</tr>")
        ten = dict(env)
        ten[k] = (base[k] * 10) if base[k] else 1
        alt10 = solve(spec, ten)
        first = results[0]["name"] if results else ""
        if first in alt10 and first in base and base[first]:
            ratio = alt10[first] / base[first]
            if abs(ratio - 10) < 0.01:
                word = "ten times larger"
            elif abs(ratio - 0.1) < 0.001:
                word = "ten times smaller"
            elif abs(ratio - 1) < 0.001:
                word = "unchanged"
            else:
                word = f"×{fmt(ratio)}"
            ten_rows.append(f"<tr><td><strong>{html.escape(label_of(f))}</strong> ×10</td>"
                            f"<td>{fmt(base[first])}</td><td>{fmt(alt10[first])}</td><td>{word}</td></tr>")

    effect.sort(key=lambda t: -t[1])
    if effect:
        top = effect[0]
        weakest = effect[-1]
        exposure = (f"<p>The box this answer is most exposed to is <strong>{html.escape(top[0])}</strong>: "
                    f"a ten per cent move there shifts the result by about {fmt(top[1] * 100, 1)} per cent. "
                    + (f"The least sensitive is <strong>{html.escape(weakest[0])}</strong>, at "
                       f"{fmt(weakest[1] * 100, 1)} per cent for the same change. "
                       if weakest[0] != top[0] else "")
                    + "That ranking is what to keep in mind when you have to estimate one number rather "
                      "than measure it.</p>")
    else:
        exposure = ""

    sens_head = "".join(f"<th>{html.escape(label_of(r))}</th>" for r in results)

    # The first result with the numbers written into it
    first_key = results[0]["name"] if results else ""
    first_expr = spec.formula.get(first_key, "")

    def nums(m: "re.Match[str]") -> str:
        name = m.group(0)
        return fmt(env[name]) if name in env else name

    numeric_example = re.sub(r"[A-Za-z_][A-Za-z0-9_]*", nums, first_expr)
    numeric_example = re.sub(r"\b\d+(?:\.\d+)?[eE][+-]?\d+\b",
                             lambda m: fmt(float(m.group(0))), numeric_example)
    numeric_example = re.sub(r"\b\d{12,}\b", lambda m: fmt(float(m.group(0))), numeric_example)
    numeric_example = (numeric_example.replace(" * ", " × ").replace("*", " × ")
                       .replace(" / ", " ÷ ").replace("/", " ÷ "))
    if first_key in solved:
        numeric_example += f" = {fmt(solved[first_key])}"

    # Two more scenarios
    scen_html = []
    for sc in prose.get("scenarios", []):
        values = dict(env)
        values.update(sc["inputs"])
        out = solve(spec, values)
        given = ", ".join(f"{html.escape(labels.get(k, k))} = {fmt(v)}"
                          for k, v in sc["inputs"].items())
        got = ", ".join(f"<strong>{html.escape(label_of(r))}</strong> = {fmt(out[r['name']])}"
                        f"{(' ' + html.escape(unit_of(r))) if unit_of(r) else ''}"
                        for r in results if r["name"] in out)
        scen_html.append(f"<li>With {given}, the page reports {got}."
                         + (f" {sc['note']}" if sc.get("note") else "") + "</li>")

    bands = prose.get("bands", [])
    if bands:
        band_html = ("<table class=\"calc-table\"><thead><tr><th>Range</th><th>What it means</th>"
                     "</tr></thead><tbody>"
                     + "".join(f"<tr><td><strong>{rng}</strong></td><td>{meaning}</td></tr>"
                               for rng, meaning in bands)
                     + "</tbody></table>")
    else:
        band_html = ("<p>There is no fixed band to read this number against: it is a quantity in its own "
                     "right, and whether it is right for you depends on the case. Use the worked example "
                     "above as the sanity check.</p>"
                     "<p>A useful habit is to predict the answer before pressing anything. Even a rough "
                     "estimate — this should be somewhere near a tenth, or a few hundred — catches the "
                     "errors that a plausible-looking result would otherwise hide.</p>")

    pitfalls = prose.get("pitfalls", [])
    pit_html = "".join(f"<li>{p}</li>" for p in pitfalls)
    limits = prose.get("limits", [])
    lim_html = "".join(f"<li>{p}</li>" for p in limits)
    uses = prose.get("uses", [])
    use_html = "".join(f"<li>{p}</li>" for p in uses)

    links = " ".join(f'<a href="{path}">{html.escape(name)}</a>' for path, name in spec.related)
    link_text = ("<p>If the answer you need is one step further on, these pages pick up where this one "
                 f"stops: {links}.</p>" if spec.related else "")

    sections = [
        ("What this calculator works out",
         (f"{prose['why']}" if prose.get("why") else "")
         + f"<p>The page reports <strong>{names_out}</strong> from the boxes above it. "
           f"Every line of the formula table below is the same relationship rearranged, which is why "
           f"leaving a different box empty changes the question rather than breaking the page.</p>"),

        ("The formula, and every way round it",
         "<p>One relationship drives the page. Each line below is the same relationship arranged for a "
         "different unknown, which is what lets the calculator answer from either end.</p>"
         "<table class=\"calc-table\"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead>"
         f"<tbody>{''.join(rows)}</tbody></table>"
         + (f"<p>{prose['formula_note']}</p>" if prose.get("formula_note") else "")),

        ("What to enter, and what comes back",
         f"<p>Fill in {len(fields)} box{'es' if len(fields) != 1 else ''} and the page has everything it "
         f"needs. It reports {names_out}.</p><ul>{''.join(inlist)}</ul>"
         f"<p>The results are the boxes you leave alone:</p><ul>{''.join(outlist)}</ul>"
         "<p>The last box you fill in is the one the page answers from: it reads whatever is present, "
         "works out which value is missing, and solves for that.</p>"
         "<p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — "
         "a rearrangement that needs a value it does not have stays blank rather than guessing. That is "
         "the difference between a calculator and a spreadsheet that has been filled down: nothing here is "
         "carried over from a previous run, so a blank result always means a missing input.</p>"),

        ("A worked example you can reproduce",
         f"<p>Enter the values the page is built around — {defaults_in} — and the results "
         f"panel reads:</p><ul>{''.join(worked)}</ul>"
         f"<p>With the numbers written into the formula, the first result is "
         f"<code>{numeric_example}</code>. Nothing is rounded between steps: the arithmetic is done at full "
         f"precision and only the display is shortened.</p>"
         + (f"<p>{prose['example_note']}</p>" if prose.get("example_note") else "")),

        ("Reading the answer",
         (f"<p>{prose['reading']}</p>" if prose.get("reading") else "")
         + band_html),

        ("How much each input moves the answer",
         "<p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far "
         "each result moves:</p>"
         f"<table class=\"calc-table\"><thead><tr><th>Change</th>{sens_head}</tr></thead>"
         f"<tbody>{''.join(sens_rows)}</tbody></table>"
         + (f"<p>{prose['sensitivity_note']}</p>" if prose.get("sensitivity_note") else "")
         + "<p>The point of the table is not the exact percentages — they are a property of the formula at "
           "these particular values — but which box the answer is most exposed to. That is the number to "
           "measure twice.</p>"
         + exposure),

        ("Two more scenarios, worked through",
         "<p>One example shows the page computes. Two more show how it behaves away from the values "
         "above:</p>"
         f"<ul>{''.join(scen_html)}</ul>"
         + (f"<p>{prose['scenario_note']}</p>" if prose.get("scenario_note") else "")),

        ("Where the numbers usually go wrong",
         f"<ul>{pit_html}<li><strong>A unit entered against the wrong row.</strong> Each box says what it "
         "expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the "
         "answer still looks plausible.</li>"
         "<li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous "
         "answer into one turns the calculation round and solves for whichever box is empty instead.</li>"
         "</ul>"),

        ("Units and precision",
         "<p>Each box carries its unit beside it, and the result is reported in the unit named with it: "
         f"{', '.join((label_of(r) + (' (' + unit_of(r) + ')' if unit_of(r) else '')) for r in results)}.</p>"
         "<p>No answer on this site is printed with more than three decimals, and values far from everyday "
         "size are shown in scientific notation so the significant figures stay readable. Display rounding "
         "never feeds back into the calculation: the value behind the number keeps its full precision "
         "until the next input changes.</p>"
         "<p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in "
         "feet leaves square feet; a square footage multiplied by a thickness in inches and divided by "
         "twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a "
         "result comes out with the wrong order of magnitude, writing the units of each box into the "
         "formula is usually enough to show which one was entered on the wrong scale.</p>"
         + (f"<p>{prose['units_note']}</p>" if prose.get("units_note") else "")),

        ("Getting an answer, step by step",
         "<ol>"
         f"<li><strong>Collect the inputs.</strong> You need {names_in}. Note the unit each one is in before "
         "you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li>"
         "<li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough "
         "to answer. Leave the box you are solving for empty.</li>"
         f"<li><strong>Read the result against the worked example.</strong> {names_out.capitalize()} should be "
         "of the same order of magnitude as the figure above for inputs of the same order.</li>"
         "<li><strong>Change one box to check the direction.</strong> Move a single input and confirm the "
         "result moves the way the formula says it should. When it does, the number is yours to use.</li>"
         "</ol>"
         "<p>Write the answer down with its unit and the values that produced it. A bare number copied "
         "into a report later is exactly where units get lost, and a result that cannot be traced back to "
         "its inputs cannot be checked by anyone else — including you, a fortnight later.</p>"),

        ("When one input is out by a factor of ten",
         "<p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer "
         "that still looks like an answer. Here is what the first result does if each box in turn is typed "
         "ten times too large:</p>"
         "<table class=\"calc-table\"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th>"
         f"<th>Effect</th></tr></thead><tbody>{''.join(ten_rows)}</tbody></table>"
         "<p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is "
         "linear in that box and a unit slip goes straight through to the answer. Where the effect is "
         "weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly "
         "absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>"),

        ("What the page does before it answers",
         "<p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an "
         "input changes. A result stays blank until every value it needs is present and finite, so an empty "
         "box in the panel means a missing input rather than an error. Zero is accepted as an input, but a "
         "formula that would divide by it reports no result instead of infinity.</p>"
         "<p>Values are carried at full precision between the formula and the display, and the three-decimal "
         "limit is applied only at the end. If you type a value into a result box, the page treats it as "
         "known and solves for whichever input is then empty — the same calculation, run backwards.</p>"),

        ("Limits worth knowing",
         f"<ul>{lim_html}<li><strong>It computes the relationship, not your case.</strong> Nothing here "
         "corrects for measurement error, impurities or conditions outside the range the relationship was "
         "written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>"),

        ("Where this calculation comes up",
         (f"<ul>{use_html}</ul>" if use_html else
          "<p>Anywhere the numbers you have are the ones in the form and the number you are missing is the "
          "one the page reports.</p>")
         + link_text),
    ]

    faq = [
        (f"What does the {spec.name.replace(' Calculator', '')} calculator work out?",
         f"It returns {names_out} from {names_in}. "
         f"The relationship is {plain(list(spec.formula.values())[0], labels)}."),
        ("Which values do I need before I start?",
         ", ".join(label_of(f) + (f" ({unit_of(f)})" if unit_of(f) else "") for f in fields)
         + ". Leave the result boxes alone unless one of them is the value you are solving for."),
        ("Can I use it backwards?",
         "Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a "
         "result and leaving an input empty makes the page solve for that input instead."),
        ("Does it matter which unit I type in?",
         "It matters that every box is in the unit printed beside it: "
         + "; ".join(f"{soft(label_of(f))} in {unit_of(f)}" for f in fields if unit_of(f))
         + ". The page converts nothing on its own, so a mixed set of units is the most common wrong answer."),
        ("How precise is the answer?",
         "Results are computed at full precision and printed with at most three decimals, with scientific "
         "notation for very large or small values. Copy the number out if you need it later — nothing is saved."),
        ("Is it free, and is my data sent anywhere?",
         "Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values "
         "you type are not uploaded or stored."),
    ]
    faq.extend(spec.faq)

    intro = (f"{spec.what} " + (prose.get("intro_extra", "") or "")).strip()

    return {
        "intro": intro,
        "sections": [{"title": t, "html": h} for t, h in sections],
        "faq": [{"q": q, "a": a} for q, a in faq],
        "related": [{"path": p, "name": n} for p, n in spec.related],
        "authors": prose.get("authors", [
            {"name": "Onim Editorial", "role": "Written and checked"},
        ]),
    }


# --------------------------------------------------------------- the file

def php_constants(value: Any) -> Any:
    """Plain decimals in formulas: the site's parser reads `e23` as a name."""
    if isinstance(value, str):
        def repl(m: "re.Match[str]") -> str:
            return format(Decimal(m.group(0)), "f")
        return re.sub(r"\b\d+(?:\.\d+)?[eE][+-]?\d+\b", repl, value)
    if isinstance(value, list):
        return [php_constants(v) for v in value]
    if isinstance(value, dict):
        return {k: php_constants(v) for k, v in value.items()}
    return value


def build_def(spec: Spec) -> dict:
    """The array the calculator file returns."""
    fields = []
    for f in spec.fields:
        f = dict(f)
        f.pop("_columns", None)
        f.pop("_bounds", None)
        if f.get("type") == "number" and "rounding" not in f:
            f["rounding"] = ["omni", "0.0001"]
        fields.append(f)
    fields = fields + [dict(r) for r in spec.results]

    section: dict[str, Any] = {"columns": 2, "fields": fields}
    if spec.notes:
        section["note"] = " ".join(spec.notes)

    formulas = spec.all_formulas()
    passes = spec.passes or [{"title": spec.name.replace(" Calculator", ""), "results": formulas}]

    article = build_article(spec)

    return php_constants({
        "_cat": CAT,
        "_slug": spec.slug,
        "name": spec.name,
        "meta": {
            "title": fit_title(spec.title),
            "description": fit_desc(spec.desc),
            "h1": spec.h1 or spec.name,
            "updated": UPDATED,
        },
        "sections": [section],
        "formula": passes,
        "article": article,
    })


def words(defn: dict) -> int:
    text = defn["article"]["intro"] + " " + " ".join(
        re.sub(r"<[^>]+>", " ", s["html"]) for s in defn["article"]["sections"])
    text += " " + " ".join(q["a"] for q in defn["article"]["faq"])
    return len(re.findall(r"[A-Za-z0-9\u00b7][A-Za-z0-9'\u00b7\-.,]*", text))
