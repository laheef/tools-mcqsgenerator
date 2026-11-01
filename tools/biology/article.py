"""Article writer: turns a Spec into summary + sections + FAQ."""

from __future__ import annotations

import html
import re

from lib import (
    BASE, Spec, fmt, label_of, quantity, solve_example, unit_of,
)


def esc(text: str) -> str:
    return html.escape(text, quote=False)


def _ul(items) -> str:
    return "<ul>" + "".join(f"<li>{item}</li>" for item in items) + "</ul>"


def _table(head: list[str], rows: list[list[str]], caption: str = "") -> str:
    head_html = "".join(f"<th>{esc(h)}</th>" for h in head)
    body = "".join("<tr>" + "".join(f"<td>{c}</td>" for c in row) + "</tr>" for row in rows)
    cap = f"<caption>{esc(caption)}</caption>" if caption else ""
    return f'<table>{cap}<thead><tr>{head_html}</tr></thead><tbody>{body}</tbody></table>'


def figure(spec: Spec, caption: str) -> str:
    alt = f"Animated diagram: {spec.name} — {caption}"
    return (
        f'<figure class="calc-figure">'
        f'<img src="{BASE}/{spec.slug}.svg" width="720" height="300" loading="lazy" '
        f'alt="{esc(alt)}" title="{esc(spec.name)}">'
        f"<figcaption>{caption}</figcaption></figure>"
    )


# ------------------------------------------------------------------ summary

def _sentences(text: str) -> list[str]:
    """Split on sentence ends without breaking on “e.g.” or a decimal point."""
    out = []
    for part in re.split(r"(?<=[.!?])\s+(?=[A-Z“])", " ".join(text.split())):
        if part.strip():
            out.append(part.strip())
    return out


def summary(spec: Spec, ex: dict) -> str:
    out = spec.outputs_head(ex)
    tail = spec.pick([
        "Press Calculate and the results appear in the grey boxes; after the first press they "
        "keep up with every edit, so there is no page to reload.",
        "Every result is derived from the boxes you fill in, so changing one input updates the whole panel at once.",
        "The arithmetic keeps full precision internally and only rounds what it displays, so the "
        "number you copy out is the number the formula produced.",
    ])
    unit = spec.unit_note or (
        "Units are stated on every box and in every result, so a figure copied out of a "
        "protocol, a datasheet or a chart can be entered without converting it first."
        if not spec.unit_note else spec.unit_note
    )
    # Two paragraphs, because an answer engine lifts the *first* one and a reader
    # skimming on a phone reads the same two sentences. Paragraph one is the
    # quotable answer: what the tool is, then what it hands back. Everything
    # else — the second half of the spec's own summary, the live-recalculation
    # note, the unit convention — is support, and goes below it.
    sents = _sentences(spec.summary)
    first = sents[0] if sents else spec.name
    lead = f"{first} It returns {out}, and the panel shows all of them at once."
    rest = " ".join([*sents[1:], tail, unit]).strip()
    return f"{lead}\n\n{rest}"


# ------------------------------------------------------------------ sections

def sections(spec: Spec, ex: dict) -> list[dict]:
    s: list[dict] = []
    values = ex["all"]

    # 1 —— formula -------------------------------------------------------
    sym_rows = [[f"<code>{esc(sym)}</code>", esc(meaning), esc(unit or "—")]
                for sym, meaning, unit in spec.symbols]
    formula_html = [
        f"<p>{spec.formula}</p>",
        figure(spec, spec.svg[1].get("caption", f"{spec.name}: the inputs on the left, the result on the right.")),
    ]
    if sym_rows:
        formula_html.append(_table(["Symbol", "What it stands for", "Unit"], sym_rows,
                                   "The symbols in the formula"))
    if spec.sources:
        formula_html.append(
            "<p><strong>Where the relationship comes from.</strong> "
            + " ".join(spec.sources) + "</p>"
        )
    s.append({"title": f"The formula behind the {spec.name.replace(' Calculator', '')}",
              "html": "\n".join(formula_html)})

    # 2 —— how to use ----------------------------------------------------
    steps = spec.steps or [
        "Enter the values you already have. Every box accepts a decimal point and a minus sign; "
        "thousands separators are ignored.",
        "The grey boxes are results: they are worked out from your inputs and cannot be typed into.",
        "Press <strong>Calculate</strong>. The results fill in together, and from then on they follow every edit "
        "you make — there is no page to reload and nothing to submit.",
    ]
    how = ["<p>" + spec.pick([
        "Every input sits in the same order the formula is written, so the page reads like the equation.",
        "The form asks only for what the formula needs — nothing is optional decoration.",
        "Fill the boxes you have numbers for; the calculator decides what it can derive from them.",
    ]) + "</p>", "<ol>" + "".join(f"<li>{step}</li>" for step in steps) + "</ol>"]
    s.append({"title": f"How do I use the {spec.name.replace(' Calculator', '')}?",
              "html": "\n".join(how)})

    # 3 —— worked example ------------------------------------------------
    ex_parts = []
    given = []
    for f in spec.fields:
        key = f["key"]
        if key in ex["outputs"] or key not in values:
            continue
        if f.get("type") == "select":
            opt = str(values[key])
            shown = next((o[1] for o in f.get("options", [])
                          if str(o[2]) == opt), opt)
            given.append(f"{esc(f['label'].lower())} set to <strong>{esc(shown)}</strong>")
        else:
            given.append(quantity(spec, key, values[key]))
    got = [quantity(spec, k, v) for k, v in ex["outputs"].items()]
    if given:
        ex_parts.append("<p>Take the default values the page opens with: " + ", ".join(given) + ".</p>")
    if got:
        ex_parts.append("<p>Substituting them into the formula gives " + ", ".join(got) + ".</p>")
    if spec.example_note:
        ex_parts.append(f"<p>{spec.example_note}</p>")
    ex_parts.append("<p>" + spec.pick([
        "Those numbers come from the same solver the page runs in your browser, not from an "
        "illustration, so typing different inputs moves the answer exactly as the arithmetic says.",
        "The arithmetic is the page's own: change one box and the result moves by the amount the "
        "formula implies, which is the quickest way to convince yourself the tool is honest.",
        "Because the example uses the defaults, you can reproduce it by loading the page and "
        "reading the results panel before touching anything.",
    ]) + "</p>")
    s.append({"title": "A worked example", "html": "\n".join(ex_parts)})

    # 4 —— interpretation ------------------------------------------------
    read = []
    if spec.bands:
        read.append("<p>" + spec.pick([
            "The number on its own is not a judgement. These are the bands most often used when "
            "the result is quoted in a paper, a report or a label:",
            "A raw figure only means something next to the bands it is normally judged against. "
            "Here is the scale that goes with this one:",
            "Interpretation is a convention, not part of the arithmetic. The usual bands are:",
        ]) + "</p>")
        read.append(_table(["Result", "Band", "What it means"],
                           [[esc(a), f"<strong>{esc(b)}</strong>", esc(c)] for a, b, c in spec.bands],
                           "How to read the result"))
    if spec.notes:
        read.append(_ul([f"<p>{n}</p>" for n in spec.notes]))
    if not read:
        read.append("<p>Compare the result with a value you already trust before drawing a "
                    "conclusion from it; most surprises turn out to be an input in the wrong unit.</p>")
    s.append({"title": "What does the result mean?", "html": "\n".join(read)})

    # 5 —— mistakes ------------------------------------------------------
    mistakes = spec.mistakes or [
        "Mixing units in one calculation — millimetres in one box and centimetres in another — "
        "is the most common way to be out by a factor of ten.",
        "Entering a measured average as if it were exact: report the range you saw, not only the midpoint.",
    ]
    s.append({"title": "What are the common mistakes?",
              "html": "<p>" + spec.pick([
                  "These are the errors that account for almost every wrong answer people bring to this calculator:",
                  "The arithmetic is simple; the inputs are where things go wrong. The usual culprits:",
                  "Before blaming the formula, check these — they explain nearly every mismatch:",
              ]) + "</p>" + _ul(mistakes)})

    # 6 —— related -------------------------------------------------------
    if spec.related:
        links = " ".join(
            f'<a href="{path}">{esc(text)}</a>.' for path, text in spec.related
        )
        s.append({"title": "Calculators that go with this one",
                  "html": "<p>" + spec.pick([
                      "This tool answers one step of the question. The neighbouring steps have their own pages:",
                      "If you need the rest of the working, these cover the adjacent quantities:",
                      "Most real jobs need two or three of these together:",
                  ]) + "</p><p>" + links + "</p>"})

    return s


def faq(spec: Spec, ex: dict) -> list[dict]:
    """At least six question/answer pairs, every answer leading with its answer.

    Six is the floor because a page with two FAQs reads as an afterthought to an
    answer engine: there is nothing for it to lift when the reader asks a
    follow-up. The generic pairs below only fill a gap — a spec's own pairs
    always come first and are never overwritten.
    """
    pairs = list(spec.faq)
    bare = spec.name.replace(" Calculator", "")
    generic = [
        (f"What does the {bare} actually calculate?",
         f"It returns {spec.outputs_head(ex)}. Each one is derived by the formula on this page, "
         "so you can check any figure by hand."),
        ("Do I have to fill in every box?",
         "Fill in the ones you know. The result boxes are computed from them, so you never enter "
         "a value the formula can derive — and if you change an input, every result updates with "
         "it."),
        ("Why is the answer different from the one in my protocol?",
         "Nearly always a unit or a rounding difference. This calculator works in the units "
         "printed next to each box, keeps full precision internally and only rounds for display, "
         "so recomputing from the rounded numbers on screen can differ in the last digit."),
        ("Can I use it with the numbers straight from a datasheet?",
         "Yes. Every box states its unit, and nothing is converted behind your back, so a figure "
         "copied from a datasheet, a kit insert or a protocol goes in as printed."),
        ("Does it work in both directions?",
         "Where the maths allows it, yes: the page states which values it solves for and which "
         "you supply. A field marked as a result is always computed, never typed into."),
        ("How precise is the result?",
         "The arithmetic runs at full floating-point precision and only the displayed figure is "
         "rounded, so repeating the calculation with the numbers on screen can differ in the last "
         "digit without being an error."),
        ("What does the chart show?",
         "It plots the quantities that change as you edit the inputs, so you can see the trend "
         "rather than a single value. The caption under it names what is being plotted."),
    ]
    seen = {q.strip().lower() for q, _ in pairs}
    for q, a in generic:
        if len(pairs) >= 6:
            break
        if q.strip().lower() not in seen:
            pairs.append((q, a))
            seen.add(q.strip().lower())
    return [{"q": q, "a": a} for q, a in pairs[:8]]


# --------------------------------------------------------------------- meta

def meta_title(spec: Spec) -> str:
    if spec.meta_title:
        return spec.meta_title
    base = spec.name.replace(" Calculator", "")
    t = f"{base} Calculator"
    if len(t) < 45:
        t = f"{base} Calculator — Formula & Results"
    return t[:62]


def meta_description(spec: Spec, ex: dict) -> str:
    if spec.meta_description:
        return spec.meta_description
    out = spec.outputs_head(ex)
    d = (f"{spec.summary.split('. ')[0]}. Free {spec.name.replace(' Calculator', '').lower()} "
         f"calculator: enter your values and get {out} instantly.")
    return d[:158]
