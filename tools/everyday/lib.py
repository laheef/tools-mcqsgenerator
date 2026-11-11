"""
Framework for the everyday-life pack.

One calculator is described once, as data:

    S(slug=..., name=..., title=..., desc=..., what=..., fields=[...],
      results=[...], formula={...}, prose={...}, checks=[...])

and this module turns that description into the calculator file the site builds
a page from:

    plugins/calc/everyday-life/qm-calc-<slug>.php

Nothing in the article is invented. The worked example, the sensitivity table and
the alternative scenarios are evaluated from the same expressions that go into
the file, with Python, and are checked again against the site's own PHP solver by
tools/everyday/qa.py.

Dates are the one thing that behaves differently here. The site hands a date to a
formula as a day number and a clock time as a fraction of a day (see
docs/calc-files.md and Solver::formulaUnits), so `date2 - date1` is a count of
days and `end_time - start_time` is a fraction of a day. Every formula in this
pack is written to that convention, and `to_day()` below is the Python side of
it.
"""

from __future__ import annotations

import datetime as _dt
import html
import math
import re
from dataclasses import dataclass, field as dc_field
from decimal import Decimal
from typing import Any, Callable

CAT = "everyday-life"
UPDATED = "2026-10-23"
EPOCH = _dt.date(1970, 1, 1)


# ------------------------------------------------------------------ fields

def F(key: str, label: str, suffix: str = "", default: Any = "", help: str = "",
      prefix: str = "") -> dict:
    """A number box."""
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
    return f


def R(key: str, label: str, suffix: str = "", help: str = "") -> dict:
    """A result box: computed, never typed into."""
    f: dict[str, Any] = {
        "name": key,
        "label": label,
        "type": "number",
        "readonly": True,
        "rounding": ["omni", "0.0001"],
    }
    if suffix:
        f["suffix"] = suffix
    if help:
        f["help"] = help
    return f


def RD(key: str, label: str, help: str = "") -> dict:
    """A result that is a date (or a clock time)."""
    f: dict[str, Any] = {"name": key, "label": label, "type": "date"}
    if help:
        f["help"] = help
    return f


def RT(key: str, label: str, help: str = "") -> dict:
    """A result that is a clock time."""
    f: dict[str, Any] = {"name": key, "label": label, "type": "time"}
    if help:
        f["help"] = help
    return f


def D(key: str, label: str, default: str = "", help: str = "") -> dict:
    """A date input. The formula receives it as a day number."""
    f: dict[str, Any] = {"name": key, "label": label, "type": "date"}
    if default:
        f["default"] = default
    if help:
        f["help"] = help
    return f


def T(key: str, label: str, default: str = "", help: str = "") -> dict:
    """A clock input. The formula receives it as a fraction of a day."""
    f: dict[str, Any] = {"name": key, "label": label, "type": "time"}
    if default:
        f["default"] = default
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
        # Calculator files pick a select default by the option's *label*, not
        # by the value it exports: CalcFile compares `default` against each
        # label. Writing the value there left these pages opening with no
        # answer chosen, so Calculate refused with "choose one of these
        # options". The label goes into the file; the value is kept beside it
        # for the formula environment.
        for lbl, val in options:
            if str(val) == str(default) or str(lbl) == str(default):
                f["default"] = str(lbl)
                f["default_value"] = str(val)
                break
        else:
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
    what: str
    fields: list[dict]
    results: list[dict]
    formula: dict[str, str]
    prose: dict[str, Any] = dc_field(default_factory=dict)
    faq: list[tuple[str, str]] = dc_field(default_factory=list)
    related: list[tuple[str, str]] = dc_field(default_factory=list)
    notes: list[str] = dc_field(default_factory=list)
    # (inputs, {result: expected}, tolerance) — values worked out by hand
    checks: list[tuple[dict, dict, float]] = dc_field(default_factory=list)
    h1: str = ""

    def all_formulas(self) -> dict[str, str]:
        return dict(self.formula)

    def inputs(self) -> dict[str, dict]:
        return {f["name"]: f for f in self.fields if f.get("type") != "note"}

    def raw_units(self) -> bool:
        """True when the formulas spell out their own date conversion.

        Solver::formulaUnits leaves such a page alone (its `86400` test), so a
        clock box arrives at the formula as milliseconds rather than as a
        fraction of a day. The formulas and the Python side both have to know.
        """
        return any(BYPASS.search(expr) for expr in self.formula.values())

    def formula_env(self) -> dict[str, float]:
        """The defaults as the formulas will see them."""
        env = self.default_env()
        if not self.raw_units():
            return env
        out = {}
        for f in self.fields:
            if f["name"] not in env:
                continue
            out[f["name"]] = (env[f["name"]] * 86400000.0
                              if f.get("type") in ("date", "time") else env[f["name"]])
        return out

    def default_env(self) -> dict[str, float]:
        env: dict[str, float] = {}
        for f in self.fields:
            if f.get("type") == "select":
                d = f.get("default_value", f.get("default"))
                try:
                    env[f["name"]] = float(d)          # a choice is a number to the formula
                except (TypeError, ValueError):
                    pass
                continue
            d = f.get("default")
            if d in (None, ""):
                continue
            env[f["name"]] = to_day(f, d) if f["type"] in ("date", "time") else float(d)
        return env


BYPASS = re.compile(r"31557600|86400|604800|3600\b")


def S(**kwargs: Any) -> Spec:
    return Spec(**kwargs)


# --------------------------------------------------------------- date/time

def to_day(field: dict, value: Any) -> float:
    """A default or a typed value as the formula sees it.

    A date is days since 1970-01-01. A clock time is a fraction of a day, so
    06:00 is 0.25 and 18:00 is 0.75.
    """
    kind = field.get("type")
    if kind == "date":
        if isinstance(value, (int, float)):
            return float(value)
        d = _dt.date.fromisoformat(str(value)[:10])
        return float((d - EPOCH).days)
    if kind == "time":
        if isinstance(value, (int, float)):
            return float(value)
        text = str(value).strip()
        parts = [int(p) for p in text.split(":")]
        while len(parts) < 3:
            parts.append(0)
        h, m, s = parts[:3]
        return (h * 3600 + m * 60 + s) / 86400.0
    return float(value)


def day_to_date(value: float) -> _dt.date:
    return EPOCH + _dt.timedelta(days=round(value))


def day_to_clock(value: float) -> str:
    secs = round(value * 86400)
    secs %= 86400
    h, rem = divmod(secs, 3600)
    m, s = divmod(rem, 60)
    return f"{h:02d}:{m:02d}" if s == 0 else f"{h:02d}:{m:02d}:{s:02d}"


def pretty_day(value: float) -> str:
    d = day_to_date(value)
    return f"{d.day} {d.strftime('%B')} {d.year}"


# ------------------------------------------------------------------ maths

def _snap(x: float, up: bool) -> float:
    n = round(x)
    if abs(x - n) <= 1e-9 * max(1.0, abs(x)):
        return float(n)
    return math.ceil(x) if up else math.floor(x)


def _shift_months(day: float, months: int) -> float:
    """dateAtMonthsOld / dateAtYearsOld: move a day number by whole months.

    The day of the month is clamped to the length of the month it lands in, so
    31 January plus one month is 28 or 29 February, exactly as the site does it.
    """
    d = day_to_date(day)
    total = (d.year * 12 + d.month - 1) + int(months)
    year, month0 = divmod(total, 12)
    month = month0 + 1
    days = [31, 29 if (year % 4 == 0 and (year % 100 != 0 or year % 400 == 0)) else 28,
            31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month - 1]
    return float((_dt.date(year, month, min(d.day, days)) - EPOCH).days)


def _date_at_months_old(day: float, months: float) -> float:
    return _shift_months(day, int(round(months)))


def _date_at_years_old(day: float, years: float) -> float:
    return _shift_months(day, 12 * int(round(years)))


FUNCS: dict[str, Callable[..., Any]] = {
    "pow": pow,
    "sqrt": math.sqrt,
    "log": math.log,
    "ln": math.log,
    "log10": math.log10,
    "exp": math.exp,
    "abs": abs,
    "min": min,
    "max": max,
    "round": lambda x, d=0: round(x, int(d)),
    "floor": lambda x: _snap(x, False),
    "ceil": lambda x: _snap(x, True),
    "mod": lambda a, b: math.fmod(a, b),
    "sign": lambda x: (x > 0) - (x < 0),
    "sin": math.sin,
    "cos": math.cos,
    "tan": math.tan,
    "asin": math.asin,
    "acos": math.acos,
    "atan": math.atan,
    "atan2": math.atan2,
    "deg": math.degrees,
    "rad": math.radians,
    "pi": math.pi,
    "e": math.e,
    # The calendar helpers the site exposes to a formula. A date is a day
    # number, so each of these reads the calendar out of a number (lib/Expr.php).
    "getDate": lambda d: day_to_date(d).day,
    "getMonth": lambda d: day_to_date(d).month - 1,
    "getYear": lambda d: day_to_date(d).year,
    "getDayOfWeek": lambda d: day_to_date(d).isoweekday() % 7,
    "getDayOfYear": lambda d: day_to_date(d).timetuple().tm_yday - 1,
    "getHours": lambda d: int(round((d - math.floor(d)) * 24)) % 24,
    "dateAtMonthsOld": _date_at_months_old,
    "dateAtYearsOld": _date_at_years_old,
    "daysBetween": lambda a, b: b - a,
    "if_else": lambda c, a, b: a if c else b,
}


class BadMath(ValueError):
    pass


def ev(expr: str, env: dict[str, float]) -> float:
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
    out = dict(env)
    pending = dict(spec.all_formulas())
    for _ in range(4):
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


# ------------------------------------------------------------- metadata fit

TITLE_TAILS = ["", " — Free Tool", " — Steps and Example", " — Formula Shown",
               " — Date and Time", " — Formula and Example", " — No Sign-Up",
               " — Free, With Example", " — Free and Instant"]


def fit_title(core: str, lo: int = 43, hi: int = 53) -> str:
    core = core.strip()
    if lo <= len(core) <= hi:
        return core
    for tail in TITLE_TAILS:
        cand = core + tail
        if lo <= len(cand) <= hi:
            return cand
    words = core.split()
    while words and len(" ".join(words)) > hi:
        words.pop()
    return " ".join(words)


DESC_TAILS = [
    "", " The formula is shown.", " See the formula and an example.",
    " See the formula, the inputs and a worked example.",
    " The formula, the inputs and a worked example are shown below.",
    " See the formula, the units and a worked example.",
    " The arithmetic is shown, with a worked example and the limits.",
]


def fit_desc(core: str, lo: int = 150, hi: int = 160) -> str:
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
    return label[:1].lower() + label[1:] if label else label


def fmt(v: float, dp: int = 3) -> str:
    if v is None:
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


def pct(v: float) -> str:
    return fmt(v * 100, 2) + " %"


def plain(expr: str, labels: dict[str, str]) -> str:
    s = expr
    s = re.sub(r"\bpi\(\)", "π", s)
    s = re.sub(r"\blog10\(", "log₁₀(", s)
    s = re.sub(r"\blog\(", "ln(", s)
    s = re.sub(r"\bsqrt\(", "√(", s)
    for _ in range(6):
        m = re.search(r"pow\(([^(),]*(?:\([^()]*\))?[^(),]*),\s*([^(),]*(?:\([^()]*\))?[^(),]*)\)", s)
        if not m:
            break
        s = s[:m.start()] + f"({m.group(1)})^{m.group(2)}" + s[m.end():]
    s = re.sub(r"\b\d+(?:\.\d+)?[eE][+-]?\d+\b", lambda m: fmt(float(m.group(0))), s)
    s = re.sub(r"\b([A-Za-z_][A-Za-z0-9_]*)\b", lambda m: labels.get(m.group(1), m.group(1)), s)
    s = s.replace(" * ", " × ").replace("*", " × ")
    s = s.replace(" / ", " ÷ ").replace("/", " ÷ ")
    return re.sub(r"\s+", " ", s).strip()


def label_of(field: dict) -> str:
    return str(field.get("label") or field.get("name"))


def unit_of(field: dict) -> str:
    return str(field.get("suffix") or "").strip()


def is_datey(field: dict) -> bool:
    return field.get("type") in ("date", "time")


def show_value(field: dict, value: float) -> str:
    """A number the way a reader expects to see it, given the box it belongs to."""
    if field.get("type") == "date":
        return pretty_day(value)
    if field.get("type") == "time":
        return day_to_clock(value)
    return fmt(value)


# ------------------------------------------------------------------ article

def solve_display(spec: Spec, env: dict) -> dict:
    """solve(), with dates and clock times in the units the page shows.

    A page whose formulas spell out the millisecond conversion hands the solver
    raw milliseconds for every date and time box, and gets milliseconds back.
    The article talks about those values the way a reader sees them — 2026-10-23
    and 17:30 — so this wrapper converts on the way in and back out again and
    leaves everything else alone.
    """
    kinds = {f["name"]: f.get("type") for f in spec.fields}
    kinds.update({r["name"]: r.get("type") for r in spec.results})
    raw = spec.raw_units()
    wire = dict(env)
    if raw:
        for k, v in list(wire.items()):
            if kinds.get(k) in ("date", "time"):
                wire[k] = v * 86400000.0
    out = solve(spec, wire)
    if raw:
        for k, v in list(out.items()):
            if kinds.get(k) in ("date", "time"):
                out[k] = v / 86400000.0
    return out


def build_article(spec: Spec) -> dict:
    fields = [f for f in spec.fields if f.get("type") != "note"]
    results = spec.results
    inputs = [f for f in fields if f not in results]
    display_env = spec.default_env()
    env = display_env                       # display units from here on
    solved = solve_display(spec, display_env)

    labels = {f["name"]: label_of(f) for f in fields}
    for f in fields:
        if is_datey(f):
            labels[f["name"]] = label_of(f)

    def fill(text: str) -> str:
        if not isinstance(text, str) or "{" not in text:
            return text

        def one(m: re.Match[str]) -> str:
            key, _, unit = m.group(1).partition("|")
            if key not in solved:
                return m.group(0)
            field = next((r for r in results if r["name"] == key), None) \
                or next((f for f in fields if f["name"] == key), None)
            value = show_value(field, solved[key]) if field else fmt(solved[key])
            if unit and field and unit_of(field):
                return f"{value} {unit_of(field)}"
            return value

        return re.sub(r"\{([a-z_0-9]+(?:\|[^}]*)?)\}", one, text)

    prose = dict(spec.prose)
    for key in list(prose):
        if isinstance(prose[key], str):
            prose[key] = fill(prose[key])
        elif isinstance(prose[key], list):
            prose[key] = [fill(x) if isinstance(x, str) else x for x in prose[key]]
    if "scenarios" in prose:
        prose["scenarios"] = [dict(sc, note=fill(sc.get("note", "")))
                              for sc in prose["scenarios"]]

    def out_name(r: dict) -> str:
        stem = re.sub(r"\s*\([^)]*\)\s*$", "", label_of(r))
        return soft(stem)

    names_in = " and ".join(soft(label_of(f)) for f in inputs)
    names_out = " and ".join(out_name(r) for r in results)

    inlist = "".join(
        f"<li><strong>{html.escape(label_of(f))}</strong>"
        + (f" — {html.escape(unit_of(f))}" if unit_of(f) else "")
        + (f". {html.escape(f['help'])}" if f.get("help") else ".")
        + (f" A choice: {html.escape(', '.join(f['options']))}." if f.get("type") == "select" else "")
        + "</li>"
        for f in inputs)
    outlist = "".join(
        f"<li><strong>{html.escape(label_of(r))}</strong>"
        + (f" — {html.escape(unit_of(r))}" if unit_of(r) else "")
        + (f". {html.escape(r['help'])}" if r.get("help") else ".")
        + "</li>"
        for r in results)

    known = {r["name"] for r in results}
    live_formula = {k: v for k, v in spec.formula.items() if k in known}
    rows = "".join(
        f"<tr><td><strong>{html.escape(labels.get(k, k))}</strong></td>"
        f"<td><code>{plain(expr, labels)}</code></td></tr>"
        for k, expr in live_formula.items())

    worked = "".join(
        f"<li><strong>{html.escape(label_of(r))}</strong> = "
        f"<code>{plain(live_formula.get(r['name'], ''), labels)}</code> = "
        f"<strong>{show_value(r, solved[r['name']])}"
        f"{(' ' + html.escape(unit_of(r))) if unit_of(r) else ''}</strong></li>"
        for r in results if r["name"] in solved)

    defaults_in = ", ".join(
        f"{soft(label_of(f))} = {show_value(f, display_env[f['name']])}"
        f"{(' ' + unit_of(f)) if unit_of(f) else ''}"
        for f in inputs if f["name"] in env)

    # ---- sensitivity: numbers by ten per cent, dates by a day, times by an hour
    base = solved
    sens_rows = []
    effect: list[tuple[str, float]] = []
    for f in inputs:
        k = f["name"]
        if k not in base:
            continue
        bumped = dict(env)
        if f.get("type") == "date":
            bumped[k] = base[k] + 1
            move = "+1 day"
        elif f.get("type") == "time":
            bumped[k] = base[k] + 1 / 24
            move = "+1 hour"
        else:
            bumped[k] = base[k] * 1.1 if base[k] else 0.1
            move = "+10 %"
        alt = solve_display(spec, bumped)
        cells, worst = [], 0.0
        for r in results:
            rk = r["name"]
            if rk in base and rk in alt and base[rk]:
                change = (alt[rk] - base[rk]) / abs(base[rk])
                worst = max(worst, abs(change))
                if is_datey(r):
                    cells.append(f"{alt[rk] - base[rk]:+.0f} d")
                else:
                    cells.append(f"{'+' if change >= 0 else '−'}{fmt(abs(change) * 100, 2)} %")
            else:
                cells.append("—")
        effect.append((label_of(f), worst))
        sens_rows.append(f"<tr><td><strong>{html.escape(label_of(f))}</strong> {move}</td>"
                         + "".join(f"<td>{c}</td>" for c in cells) + "</tr>")

    effect.sort(key=lambda t: -t[1])
    exposure = ""
    if effect and effect[0][1] > 0:
        top, weakest = effect[0], effect[-1]
        exposure = (f"<p>The box the answer leans on hardest is <strong>{html.escape(top[0])}</strong>. "
                    + (f"<strong>{html.escape(weakest[0])}</strong> barely moves it at all. "
                       if weakest[0] != top[0] and weakest[1] < top[1] / 4 else "")
                    + "If you only get one number right, make it the first one.</p>")

    sens_head = "".join(f"<th>{html.escape(label_of(r))}</th>" for r in results)

    # ---- the first result written out with its numbers, one step at a time
    first_result = results[0] if results else None
    numeric_line = ""
    if spec.raw_units():
        # the expression is written in milliseconds while the boxes show clock
        # times and dates, so substituting them would print a line that does
        # not evaluate. The step-by-step table above already carries the work.
        first_result = None
    if first_result and first_result["name"] in live_formula:
        nums = dict(env)
        nums.update(solved)
        expr = live_formula[first_result["name"]]
        line = re.sub(r"\b[A-Za-z_][A-Za-z0-9_]*\b",
                      lambda m: fmt(nums[m.group(0)]) if m.group(0) in nums else m.group(0), expr)
        line = (line.replace(" * ", " × ").replace("*", " × ")
                    .replace(" / ", " ÷ ").replace("/", " ÷ "))
        numeric_line = (f"<p>Written out with the numbers in it, the first line of the table is "
                        f"<code>{line}</code>, which comes to "
                        f"<strong>{show_value(first_result, solved[first_result['name']])}"
                        f"{(' ' + html.escape(unit_of(first_result))) if unit_of(first_result) else ''}"
                        f"</strong>. Nothing is rounded before that last step, so a person "
                        f"reproducing it on paper should keep the intermediate figures in full "
                        f"and only round at the end.</p>")

    default_rows = "".join(
        f"<li><strong>{html.escape(label_of(f))}</strong> opens at "
        f"{show_value(f, env[f['name']])}{(' ' + html.escape(unit_of(f))) if unit_of(f) else ''}"
        f"{(' — ' + html.escape(f['help'])) if f.get('help') else ''}</li>"
        for f in inputs if f["name"] in env)

    # ---- ten times (or ten days) on the first result
    first = results[0] if results else None
    ten_rows = []
    if first:
        for f in inputs:
            k = f["name"]
            if k not in base:
                continue
            ten = dict(env)
            label = "×10"
            if f.get("type") == "date":
                ten[k] = base[k] + 10
                label = "+10 days"
            elif f.get("type") == "time":
                ten[k] = base[k] + 10 / 24
                label = "+10 hours"
            else:
                ten[k] = base[k] * 10 if base[k] else 1
            alt = solve_display(spec, ten)
            if first["name"] in alt and first["name"] in base:
                a, b = base[first["name"]], alt[first["name"]]
                if is_datey(first):
                    word = f"{b - a:+.0f} d"
                elif a:
                    ratio = b / a
                    word = ("ten times larger" if abs(ratio - 10) < 0.01 else
                            "ten times smaller" if abs(ratio - 0.1) < 0.001 else
                            "unchanged" if abs(ratio - 1) < 0.001 else f"×{fmt(ratio)}")
                else:
                    word = "—"
                ten_rows.append(f"<tr><td><strong>{html.escape(label_of(f))}</strong> {label}</td>"
                                f"<td>{show_value(first, a)}</td><td>{show_value(first, b)}</td>"
                                f"<td>{word}</td></tr>")

    # ---- the same calculation at five sizes of the first box
    ladder_rows = []
    first_in = inputs[0] if inputs else None
    if first_in and first_in.get("type") == "number":
        base_v = env.get(first_in["name"], 0)
        for v in ([base_v * k for k in (0.5, 1, 2, 5, 10)] if base_v else []):
            trial = dict(env)
            trial[first_in["name"]] = v
            out = solve_display(spec, trial)
            cells = "".join(f"<td>{show_value(r, out[r['name']])}</td>"
                            for r in results if r["name"] in out)
            ladder_rows.append(
                "<tr><td>" + show_value(first_in, v)
                + ((" " + unit_of(first_in)) if unit_of(first_in) else "")
                + "</td>" + cells + "</tr>")
    ladder_head = "".join(f"<th>{html.escape(label_of(r))}</th>" for r in results)
    ladder_html = ""
    if ladder_rows:
        ladder_html = (
            "<p>The same calculation at five sizes of the first box, everything else left "
            "alone. Read down a column to see whether the answer grows in step, and across a "
            "row to see which readings move together.</p>"
            '<table class="calc-table"><thead><tr><th>'
            + html.escape(label_of(first_in)) + "</th>" + ladder_head
            + "</tr></thead><tbody>" + "".join(ladder_rows) + "</tbody></table>"
            "<p>Where a column doubles as the first box doubles, the relationship is "
            "proportional. Where it lags or leads, something in the formula is doing more than "
            "multiplying.</p>")

    # ---- two more scenarios
    scen_html = []
    for sc in prose.get("scenarios", []):
        values = dict(env)
        for k, v in sc["inputs"].items():
            fld = next((f for f in inputs if f["name"] == k), None)
            values[k] = to_day(fld, v) if fld and is_datey(fld) else float(v)
        out = solve_display(spec, values)
        given = ", ".join(
            f"{html.escape(soft(labels.get(k, k)))} = "
            f"{show_value(next((f for f in inputs if f['name'] == k), {}), values[k])}"
            for k in sc["inputs"])
        got = ", ".join(
            f"<strong>{html.escape(label_of(r))}</strong> = {show_value(r, out[r['name']])}"
            f"{(' ' + html.escape(unit_of(r))) if unit_of(r) else ''}"
            for r in results if r["name"] in out)
        scen_html.append(f"<li>Set {given}: {got}. {sc.get('note', '')}</li>")

    bands = prose.get("bands", [])
    band_html = ("<table class=\"calc-table\"><thead><tr><th>Range</th><th>What it usually means</th>"
                 "</tr></thead><tbody>"
                 + "".join(f"<tr><td><strong>{rng}</strong></td><td>{meaning}</td></tr>"
                           for rng, meaning in bands)
                 + "</tbody></table>") if bands else ""

    pitfalls = "".join(f"<li>{p}</li>" for p in prose.get("pitfalls", []))
    limits = "".join(f"<li>{p}</li>" for p in prose.get("limits", []))
    uses = "".join(f"<li>{p}</li>" for p in prose.get("uses", []))

    links = " ".join(f'<a href="{path}">{html.escape(name)}</a>' for path, name in spec.related)
    link_text = (f"<p>Close neighbours on this site: {links}.</p>" if spec.related else "")

    has_dates = any(is_datey(f) for f in fields)
    time_note = (
        "<p>Dates are compared as calendar days, not as moments. A date typed as 3 March "
        "and a date typed as 4 March are one day apart whether or not a clock is involved, "
        "and a leap day is counted like any other day. Clock times are read as they are "
        "written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is "
        "the small hours of the same date.</p>"
        if has_dates else "")

    sections = [
        ("What this calculator gives you",
         (prose.get("why", "") or "")
         + f"<p>The answer is <strong>{names_out}</strong>, worked out from {names_in}. "
           "Everything is computed from the boxes on this page. Nothing is looked up in a "
           "table and nothing is fetched from the internet.</p>"),

        ("The arithmetic, written out",
         "<p>One line states the whole calculation. Everything else on the page is that line "
         "being evaluated.</p>"
         "<table class=\"calc-table\"><thead><tr><th>Result</th><th>Expression</th></tr></thead>"
         f"<tbody>{rows}</tbody></table>"
         + (f"<p>{prose['formula_note']}</p>" if prose.get("formula_note") else "")),

        ("What to type, and what comes back",
         f"<p>There are {len(inputs)} box{'es' if len(inputs) != 1 else ''} to fill. "
         f"It reports {names_out}.</p><ul>{inlist}</ul>"
         f"<p>These are the boxes you read rather than type into:</p><ul>{outlist}</ul>"
         "<p>A result stays blank until every value it needs has arrived. A blank box in the "
         "panel is a missing input, not an error, and it is never filled with an old answer "
         "from a previous visit.</p>"),

        ("A worked example you can rerun",
         f"<p>Put {defaults_in} into the form and the panel reads:</p><ul>{worked}</ul>"
         f"<p>{prose.get('example_note', '')}</p>"
         "<p>The arithmetic keeps full precision between steps. Only the last step is "
         "shortened for display, so a number copied from the panel is the rounded value, not "
         "a value that has already been rounded twice.</p>"),

        ("Checking it on paper",
         numeric_line
         + "<p>Do the divisions last. A calculator that rounds a division before multiplying it "
           "back up loses a digit that a person working with a pencil keeps, which is why two "
           "answers that differ in the third decimal are usually both right.</p>"
           "<p>If your figure disagrees in the first digit, the problem is upstream of the "
           "arithmetic: a unit, a date, or a box holding a different quantity from the one its "
           "label asks for.</p>"),

        ("Reading the answer",
         (f"<p>{prose['reading']}</p>" if prose.get("reading") else "")
         + band_html
         + (f"<p>{prose['reading_note']}</p>" if prose.get("reading_note") else "")),

        ("How much each box moves the answer",
         "<p>Change one box at a time and watch what happens to the results. A date is moved "
         "by a day and a clock time by an hour, because ten per cent of a date means "
         "nothing.</p>"
         f"<table class=\"calc-table\"><thead><tr><th>Change</th>{sens_head}</tr></thead>"
         f"<tbody>{''.join(sens_rows)}</tbody></table>"
         + (f"<p>{prose['sensitivity_note']}</p>" if prose.get("sensitivity_note") else "")
         + exposure),

        ("Where the default values come from", f"<ul>{default_rows}</ul>"
         "<p>They are a typical case, not a recommendation. Loading a page with a worked "
         "example already in the boxes means the first thing you see is arithmetic you can "
         "check; replacing each value with your own is the next step, and the panel follows as "
         "you type.</p>"
         "<p>Keeping the defaults is also how to compare this page with another tool. If the "
         "other calculator accepts the same six numbers, put the same six in and compare the "
         "answers; if it does not accept them, it is computing something else.</p>"
         "<p>The example is deliberately dated rather than set to today, so the numbers quoted "
         "in this article can be reproduced months after it was written. On a page that counts "
         "from a date, change the second box to today and the answer moves with it.</p>"),

        ("The same calculation at other values", ladder_html),

        ("Two other cases, worked through",
         f"<ul>{''.join(scen_html)}</ul>"
         + (f"<p>{prose['scenario_note']}</p>" if prose.get("scenario_note") else "")),

        ("Where people get this wrong",
         f"<ul>{pitfalls}"
         "<li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit "
         "beside it. Mixing minutes with hours, or centimetres with inches, still produces a "
         "number that looks reasonable.</li>"
         "<li><strong>A copied answer used as an input.</strong> The result boxes cannot be "
         "typed into, so a previous answer has to go back through the inputs to be reused.</li>"
         "</ul>"),

        ("What this page does not do",
         f"<ul>{limits}"
         "<li><strong>It does not know your circumstances.</strong> The calculation is "
         "arithmetic on the numbers you supply. It cannot check them for you, and a wrong "
         "input produces a confidently wrong answer.</li></ul>"),

        ("Dates, time and rounding" if has_dates else "Units and rounding",
         time_note
         + "<p>Each box states the unit it wants, and each result carries the unit it is in. "
         "Results print with at most three decimals above one, four significant figures below "
         "one, and in scientific notation below a thousandth. Display rounding never feeds "
         "back into the calculation.</p>"
         + (f"<p>{prose['units_note']}</p>" if prose.get("units_note") else "")),

        (prose.get("extra_title", "More about this calculation"),
         prose.get("extra", "")),

        ("Getting the answer without a calculator",
         "<ol>"
         f"<li><strong>Collect the numbers.</strong> You need {names_in}. Write each one with "
         "its unit before you type it.</li>"
         "<li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel "
         "updates again if you change a value.</li>"
         f"<li><strong>Sanity-check the size.</strong> {names_out.capitalize()} should be in "
         "the range you expected before you pressed anything. Ten times out is a unit slip; "
         "twice out is usually a wrong assumption.</li>"
         "<li><strong>Change one thing.</strong> Move a single input and confirm the answer "
         "moves the way the formula says it should. Then the number is yours to use.</li>"
         "</ol>"
         + (f"<ul>{uses}</ul>" if uses else "") + link_text),

        ("If the answer looks wrong",
         "<p>Check the size first, then the units, then the inputs. A number that is out by "
         "exactly ten or a hundred is a unit slip; a number that is out by two is usually an "
         "assumption, such as counting both ends of a date range or treating an average as a "
         "constant. Only after those two checks is it worth suspecting the arithmetic, which is "
         "one line long and has been checked against the worked example above.</p>"
         "<p>If you are comparing this page with another tool and the figures differ slightly, "
         "the difference is usually rounding: this page computes at full precision and shortens "
         "only for display, while a hand calculation often rounds at every step and drifts.</p>"),

        ("When one number is out by a factor of ten",
         "<p>A decimal slip leaves an answer that still looks like an answer. Here is what the "
         f"first result does when each box is exaggerated:</p>"
         "<table class=\"calc-table\"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th>"
         f"<th>Effect</th></tr></thead><tbody>{''.join(ten_rows)}</tbody></table>"
         "<p>Where the effect column says ten times larger, that box feeds the answer "
         "directly, so a slip passes straight through. Where the effect is smaller, the box "
         "sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, "
         "not better: the answer then looks believable.</p>"),
    ]

    faq = [
        (f"What does the {re.sub(r' Calculator$', '', spec.name)} calculator work out?",
         f"It returns {names_out} from {names_in}. The relationship is "
         f"{plain(list(spec.formula.values())[0], labels)}."),
        ("Which numbers do I need before I start?",
         ", ".join(label_of(f) + (f" ({unit_of(f)})" if unit_of(f) else "") for f in inputs)
         + ". Everything else is computed."),
        ("Can I work it backwards from the answer?",
         "Not in the panel: the result boxes are read-only, and the arithmetic always runs "
         "from the inputs. The table in the arithmetic section gives the same relationship "
         "arranged for each unknown, which is what you need to go back the other way by hand."),
        ("Does it matter which unit I use?",
         "It matters that each box is in the unit printed beside it: "
         + "; ".join(f"{soft(label_of(f))} in {unit_of(f)}" for f in inputs if unit_of(f))
         + ". The page converts nothing on its own."),
        ("How precise is the answer?",
         "Computed at full precision, printed with at most three decimals above one and four "
         "significant figures below one. Copy the number if you need it later; nothing is "
         "stored."),
        ("Why does the page show several results rather than one?",
         "Because one quantity is rarely read in one unit. The same answer in a second unit is "
         "a check on the first: if the two do not agree, one of them was computed from a "
         "different input."),
        ("Is it free, and is anything sent anywhere?",
         "It is free, there is no account, and the arithmetic runs in your browser. The values "
         "you type are not uploaded."),
    ]
    faq.extend(spec.faq)

    return {
        "intro": spec.what.strip(),
        "sections": [{"title": t, "html": h} for t, h in sections if h],
        "faq": [{"q": q, "a": a} for q, a in faq],
        "related": [{"path": p, "name": n} for p, n in spec.related],
        "authors": [{"name": "Onim Editorial", "role": "Written and checked"}],
    }


# --------------------------------------------------------------- the file

def php_constants(value: Any) -> Any:
    if isinstance(value, str):
        return re.sub(r"\b\d+(?:\.\d+)?[eE][+-]?\d+\b",
                      lambda m: format(Decimal(m.group(0)), "f"), value)
    if isinstance(value, list):
        return [php_constants(v) for v in value]
    if isinstance(value, dict):
        return {k: php_constants(v) for k, v in value.items()}
    return value


def build_def(spec: Spec) -> dict:
    fields = [dict(f, _columns=None) for f in spec.fields]
    for f in fields:
        f.pop("_columns", None)
    fields = fields + [dict(r) for r in spec.results]
    for f in fields:
        f.pop("default_value", None)

    section: dict[str, Any] = {"columns": 2, "fields": fields}
    if spec.notes:
        section["note"] = " ".join(spec.notes)

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
        "formula": spec.formula,
        "article": build_article(spec),
    })


def words(defn: dict) -> int:
    text = (defn["article"]["intro"] + " "
            + " ".join(re.sub(r"<[^>]+>", " ", s["html"]) for s in defn["article"]["sections"]))
    text += " " + " ".join(q["a"] for q in defn["article"]["faq"])
    return len(re.findall(r"[A-Za-z0-9\u00b7][A-Za-z0-9'\u00b7\-.,]*", text))
