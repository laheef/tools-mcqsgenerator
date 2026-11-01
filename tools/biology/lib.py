"""
Framework for the biology calculator pack.

Every calculator is described once, as data:

    S(name=..., slug=..., summary=..., fields=[...], dirs=[...])

and this module turns that description into

  * a panel definition (fields + re-arranged formulas) that `CustomCalc::compile()`
    accepts and the site solver can run in both directions,
  * a long article (answer-first, formula table, worked example computed from the
    very same formulas, interpretation bands, pitfalls, sources, FAQ),
  * an animated SVG infographic, self-contained, with <title>/<desc> so a crawler
    or a language model reads what the picture shows,
  * the SEO title/description.

Nothing here invents numbers: the worked example is evaluated from the formulas
with Python and re-checked against the PHP solver by the test suite.
"""

from __future__ import annotations

import html
import zlib
import math
import re
from dataclasses import dataclass, field as dc_field
from typing import Any, Callable, Iterable, Sequence

CAT = "biology"
BASE = "/uploads/biology"


# --------------------------------------------------------------------- fields

def num(key: str, label: str, default: Any = "", unit: str = "", help: str = "",
        output: bool = False, step: str = "") -> dict:
    f = {"key": key, "label": label, "type": "number", "default": str(default),
         "suffix": unit, "help": help}
    if output:
        f["output"] = True
    return f


def sel(key: str, label: str, options: Sequence[tuple[str, Any]], default: Any = None,
        help: str = "") -> dict:
    """A drop-down. `options` are (label, value) pairs."""
    # The panel stores a select as [uid, label, value] triples and remembers its
    # default as a *uid*, not as the option's value. Passing the value straight
    # through therefore matched nothing and every page opened on its first
    # option — which silently made "Loam" impossible to select as a default.
    triples = [[re.sub(r"[^a-z0-9]+", "-", l.lower()).strip("-") or f"opt{i}", l, v]
               for i, (l, v) in enumerate(options)]
    wanted = str(default if default is not None else options[0][1])
    chosen = next((o for o in triples if str(o[2]) == wanted), None) \
        or next((o for o in triples if o[1] == wanted), None)
    return {
        "key": key, "label": label, "type": "select",
        "options": triples,
        # the panel keys its default on the option uid; the numeric meaning of
        # that option travels separately so the Python mirror can evaluate it
        "default": chosen[0] if chosen else triples[0][0],
        "default_value": str(chosen[2]) if chosen else str(triples[0][2]),
        "help": help,
    }


def chk(key: str, label: str, default: bool = False, help: str = "") -> dict:
    return {"key": key, "label": label, "type": "checkbox",
            "default": "1" if default else "0", "help": help}


def txt(key: str, label: str, default: str = "", help: str = "", rows: int = 4) -> dict:
    """A sequence box: text in, text out. Never an output, never in a formula."""
    return {"key": key, "label": label, "type": "text",
            "default": default, "help": help, "rows": rows}


def d(group: str, lhs: str, expr: str) -> dict:
    """One direction: work out `lhs` from `expr`."""
    return {"group": group, "l": lhs, "f": expr}


# --------------------------------------------------------------------- spec

@dataclass
class Spec:
    name: str
    slug: str
    summary: str                      # 2-4 sentences, answer-first
    fields: list[dict]
    dirs: list[dict]
    formula: str                      # human-readable, e.g. "CI = width / length × 100"
    symbols: list[tuple[str, str, str]] = dc_field(default_factory=list)  # (symbol, meaning, unit)
    steps: list[str] = dc_field(default_factory=list)     # how a person uses it
    bands: list[tuple[str, str, str]] = dc_field(default_factory=list)  # (range, label, meaning)
    notes: list[str] = dc_field(default_factory=list)     # "what the number means"
    mistakes: list[str] = dc_field(default_factory=list)
    sources: list[str] = dc_field(default_factory=list)
    faq: list[tuple[str, str]] = dc_field(default_factory=list)
    related: list[tuple[str, str]] = dc_field(default_factory=list)   # (path, anchor text)
    example: dict[str, Any] = dc_field(default_factory=dict)          # input overrides
    example_note: str = ""
    svg: tuple[str, dict] = ("chain", {})
    category: str = CAT
    icon: str = "flask"
    keywords: list[str] = dc_field(default_factory=list)
    meta_title: str = ""
    meta_description: str = ""
    h1: str = ""
    script: str = ""                  # optional per-page JS (sequence tools)
    unit_note: str = ""

    # derived -------------------------------------------------------------
    def key(self) -> str:
        return "bio-" + self.slug

    def pick(self, options: Sequence[str]) -> str:
        """Deterministic choice, so re-running the build changes nothing."""
        h = zlib.crc32(self.slug.encode()) & 0xFFFFFFFF
        return options[h % len(options)]


# --------------------------------------------------------------- expressions

_MATH = {
    "sqrt": math.sqrt, "cbrt": lambda x: math.copysign(abs(x) ** (1 / 3), x),
    "abs": abs, "exp": math.exp, "log": math.log, "ln": math.log,
    "log10": math.log10, "log2": math.log2, "min": min, "max": max,
    "round": round, "floor": math.floor, "ceil": math.ceil, "pow": pow,
    "sin": math.sin, "cos": math.cos, "tan": math.tan, "atan": math.atan,
    "asin": math.asin, "acos": math.acos, "pi": math.pi, "e": math.e,
    # the page engine evaluates if_else(a, b, c) as "b when a is true, else c"
    "if_else": lambda a, b, c: b if a else c,
    "mod": lambda a, b: a % b,
    "sign": lambda x: (x > 0) - (x < 0),
    "gcd": lambda a, b: math.gcd(int(round(a)), int(round(b))),
    "lcm": lambda a, b: abs(int(round(a)) * int(round(b)))
           // max(1, math.gcd(int(round(a)), int(round(b)))),
    "fact": lambda x: math.factorial(int(round(x))),
}


def evaluate(expr: str, values: dict[str, float]) -> float:
    """Evaluate one direction with Python, for the worked example only."""
    py = expr.replace("^", "**")
    py = re.sub(r"(?<![<>!=])=(?!=)", "==", py)      # no assignment here
    env = dict(_MATH)
    env.update({k: float(v) for k, v in values.items() if isinstance(v, (int, float))})
    return float(eval(py, {"__builtins__": {}}, env))  # noqa: S307 - our own strings


def solve_example(spec: Spec) -> dict[str, Any]:
    """Fill the defaults, run the first direction of each group, collect results."""
    values: dict[str, float] = {}
    for f in spec.fields:
        if f.get("type") == "text":
            continue                      # sequence boxes are not numbers
        dv = str(f.get("default_value", f.get("default", ""))).strip()
        if dv == "":
            continue
        try:
            values[f["key"]] = float(dv)
        except ValueError:
            pass
    values.update(spec.example or {})

    outputs: dict[str, float] = {}
    seen: set[str] = set()
    for direction in spec.dirs:
        lhs = direction["l"]
        if lhs in seen:
            continue
        seen.add(lhs)
        try:
            outputs[lhs] = evaluate(direction["f"], {**values, **outputs})
        except Exception:                      # a direction that needs more inputs
            continue
    values.update(outputs)
    return {"inputs": {f["key"]: values.get(f["key"]) for f in spec.fields
                       if f["key"] in values},
            "outputs": outputs, "all": values}


def fmt(x: float, digits: int = 2) -> str:
    if x is None:
        return "—"
    if abs(x) >= 1000:
        return f"{x:,.0f}" if abs(x) >= 100000 else f"{x:,.{digits}f}".rstrip("0").rstrip(".")
    if abs(x) >= 1:
        return f"{x:,.{digits}f}".rstrip("0").rstrip(".")
    if x == 0:
        return "0"
    if abs(x) < 0.001:
        return f"{x:.2e}"
    return f"{x:.{max(digits, 4)}f}".rstrip("0").rstrip(".")


def label_of(spec: Spec, key: str) -> str:
    for f in spec.fields:
        if f["key"] == key:
            return f["label"]
    return key.replace("_", " ")


def unit_of(spec: Spec, key: str) -> str:
    for f in spec.fields:
        if f["key"] == key:
            return f.get("suffix", "") or ""
    return ""


def outputs_head(spec: Spec, ex: dict) -> str:
    """A short noun phrase for the results, for summaries and meta descriptions."""
    keys = [k for k in ex["outputs"] if k in {f["key"] for f in spec.fields}]
    if not keys:
        outs = [f["label"].lower() for f in spec.fields if f.get("output")]
        keys = []
        phrase = outs
    else:
        # keep the label's own casing ("BOD load", "Fst", "qP") — lower-casing a
        # field label turned "BOD load" into "bod load" in every summary.
        phrase = [label_of(spec, k) for k in keys[:4]]
        # "Total DNA ..." -> "total DNA ..." mid-sentence, but never
        # "BOD load" -> "bOD load": only lower-case an initial that is a normal
        # capitalised word, not an all-caps abbreviation.
        phrase = [
            p if p.split()[0].isupper() else p[0].lower() + p[1:]
            for p in phrase
        ]
    if not phrase:
        return "the result"
    if len(phrase) == 1:
        return phrase[0]
    if len(phrase) == 2:
        return f"{phrase[0]} and {phrase[1]}"
    return ", ".join(phrase[:-1]) + " and " + phrase[-1]


Spec.outputs_head = outputs_head


def quantity(spec: Spec, key: str, value: float | None = None, digits: int = 2) -> str:
    """"Engagement rate of 5.28%" — a value with its label and unit, for prose."""
    label = label_of(spec, key).lower()
    unit = unit_of(spec, key)
    if value is None:
        return label
    text = f"<strong>{fmt(value, digits)}</strong>"
    if unit in {"%", "‰", "°C", "°F"}:
        return f"{label} of {text}{unit}"
    if unit:
        return f"{label} of {text} {html.escape(unit)}"
    return f"{label} of {text}"
