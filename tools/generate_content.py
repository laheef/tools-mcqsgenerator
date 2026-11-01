#!/usr/bin/env python3
"""
generate_content.py — write original, long-form prose for every calculator.

Input : php-clone/data/calc/batch-*.ndjson   (harvested definitions)
        php-clone/data/calc/units.json       (unit registry)
        php-clone/data/examples.json         (solved worked example per page)
Output: php-clone/data/content/<cat>/<slug>.json

Everything here is composed from the calculator's own functional model — the
labels on its fields, the units it accepts, the equations it solves and the
numbers the server-side solver produces for its example. No sentence is copied
from the reference page: the source is only ever read for structure (which
field is an input, which is an output, what the algebra says).

Wording is varied deterministically per path, so the catalogue does not read
like a mail-merge and re-runs are byte-stable.
"""
from __future__ import annotations

import argparse
import html
import json
import random
import re
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent
CALC = ROOT / "php-clone" / "data" / "calc"
EXAMPLES = ROOT / "php-clone" / "data" / "examples.json"
OUT = ROOT / "php-clone" / "data" / "content"

# --------------------------------------------------------------------------- #
# text helpers
# --------------------------------------------------------------------------- #

TAG = re.compile(r"<[^>]+>")
WS = re.compile(r"\s+")
BOLD = re.compile(r"\*\*(.+?)\*\*")


SUB = re.compile(r"==(.+?)==")
SUB_MAP = {"0": "₀", "1": "₁", "2": "₂", "3": "₃", "4": "₄", "5": "₅", "6": "₆",
           "7": "₇", "8": "₈", "9": "₉", "+": "₊", "-": "₋", "=": "₌",
           "(": "₍", ")": "₎", "a": "ₐ", "e": "ₑ", "o": "ₒ", "x": "ₓ",
           "h": "ₕ", "k": "ₖ", "l": "ₗ", "m": "ₘ", "n": "ₙ", "p": "ₚ",
           "s": "ₛ", "t": "ₜ"}


def subscript(m):
    return "".join(SUB_MAP.get(c, c) for c in m.group(1))


LATEX_SYM = {"mathrm": "", "text": "", "sigma": "σ", "mu": "μ", "alpha": "α", "beta": "β",
             "gamma": "γ", "Delta": "Δ", "delta": "δ", "pi": "π", "lambda": "λ", "omega": "ω",
             "theta": "θ", "rho": "ρ", "tau": "τ", "phi": "φ", "varepsilon": "ε", "pm": "±",
             "times": "×", "cdot": "·", "le": "≤", "ge": "≥", "ne": "≠", "infty": "∞"}


def delatex(s: str) -> str:
    """`z-score ($$\\mathrm{Z}$$)` -> `z-score (Z)`."""
    if not s or ("$" not in s and "\\" not in s):
        return s

    def one(m):
        body = m.group(1)
        for key, val in LATEX_SYM.items():
            # not \b: the next character is often "_" (\sigma_{\hat{p}}), and "a"
            # followed by "_" is not a word boundary, so the symbol was dropped
            body = re.sub(r"\\%s(?![A-Za-z])" % key, val, body)
        body = body.replace("\\_", "_").replace("\\,", " ").replace("\\ ", " ")
        body = re.sub(r"\\[A-Za-z]+", "", body)
        # `\\sigma_{\\hat{p}}` leaves braces and a doubled underscore behind once
        # the commands are gone: "σ_{{p". Strip the braces, collapse the run.
        body = body.replace("{", "").replace("}", "")
        body = re.sub(r"_+", "_", body)
        body = re.sub(r"_\s*$", "", body)
        return body.strip(" _")

    s = re.sub(r"\${1,2}([^$]+)\${1,2}", one, s)
    return re.sub(r"\s{2,}", " ", s).strip()


# The reference marks superscripts as ^^x^^ and italics as *x*. Neither belongs
# in body copy: "b^^x^^" is read as "b^x", and the emphasis markers just go.
SUP = re.compile(r"\^\^(.+?)\^\^", re.S)
ITAL = re.compile(r"(?<![\w*])\*(?!\s)([^*<>\n]{1,40}?)\*(?![\w*])")


# Pictographs sit in the reference's *field labels* ("your height 🧍"). They read
# fine in a form, but not in a meta description or a search result, where they
# push the useful words out of the visible window.
EMOJI = re.compile(
    "[\U0001F000-\U0001FAFF\U00002600-\U000027BF\U00002B00-\U00002BFF"
    "\U0001F1E6-\U0001F1FF\uFE0F\u20E3]"
)


def strip_emoji(text: str) -> str:
    """Remove pictographs and the stray spaces they leave behind."""
    out = WS.sub(" ", EMOJI.sub(" ", text or "")).strip()
    # "the score 9 ." — an emoji removed between a word and punctuation
    return re.sub(r"\s+([.,;:!?])", r"\1", out)


# Misspellings carried over from the reference's own copy. Correcting them is
# free SEO: a page title that says "conveter" matches no one's search.
TYPOS = {
    "conveter": "converter", "conveters": "converters", "convertor": "converter",
    "calulator": "calculator", "calculater": "calculator",
    "milimeter": "millimeter", "milimeters": "millimeters",
    "lenght": "length", "wieght": "weight", "heigth": "height",
    "recieve": "receive", "seperate": "separate", "occured": "occurred",
    "neccessary": "necessary", "untill": "until", "wich": "which",
    "thier": "their", "amout": "amount", "morgage": "mortgage",
    "intrest": "interest", "definately": "definitely", "accomodate": "accommodate",
}
TYPO_RE = re.compile(r"\b(" + "|".join(sorted(TYPOS, key=len, reverse=True)) + r")\b", re.IGNORECASE)


def fix_typos(text: str) -> str:
    """Correct the reference's misspellings, matching whole words only."""
    def _sub(m):
        word = m.group(0)
        fixed = TYPOS[word.lower()]
        return fixed.capitalize() if word[0].isupper() else fixed
    return TYPO_RE.sub(_sub, text)


TAG_SPLIT = re.compile(r"(<[^>]*>)")


def outside_tags(text: str, fn) -> str:
    """
    Apply a text transform to the parts of a string that are not markup.

    Operator humanisation ("/" -> "÷", "*" -> "×") used to run over the whole
    string, including the tags a label may carry, which turned `</strong>` into
    `< ÷ strong>` and shipped broken markup into the article body.
    """
    parts = TAG_SPLIT.split(text)
    for i, part in enumerate(parts):
        if i % 2 == 0:                    # even index = text, odd = a tag
            parts[i] = fn(part)
    return "".join(parts)


# Only these tags are ever written by the generator; anything else that starts
# with "<" is prose ("probability of failure (0<q<1)"), and an unescaped one makes
# the browser swallow the rest of the sentence as a bogus tag.
KNOWN_TAGS = {
    "a", "abbr", "b", "blockquote", "br", "caption", "cite", "code", "col",
    "dd", "div", "dl", "dt", "em", "figcaption", "figure", "h1", "h2", "h3",
    "h4", "h5", "h6", "hr", "i", "li", "mark", "ol", "p", "small", "span",
    "strong", "sub", "sup", "table", "tbody", "td", "tfoot", "th", "thead",
    "tr", "ul", "var", "kbd", "samp", "del", "ins", "time",
}
# a complete tag: name, attributes, closing ">", and no "<" in between
TAG_OR_TEXT = re.compile(r"<(/?)([A-Za-z][A-Za-z0-9]*)\b[^<>]*>")


def _angles(chunk: str) -> str:
    """
    Escape both angle brackets outside a tag.

    Escaping only "<" is not enough: "(0<p&lt;1)" still reads as a tag that runs
    until the next ">", which swallowed `</strong>` and left the rest of the
    article bold. Escaping ">" as well closes the door.
    """
    return chunk.replace("<", "&lt;").replace(">", "&gt;")


def escape_angles(text: str) -> str:
    """
    Escape a "<" that cannot begin one of our own tags.

    The reference's field labels contain mathematics: `(0<q<1)` shipped as raw
    markup and the browser read `<q<1)` as a `<q>` element, which swallowed the
    closing `</strong>` and mangled the sentence in every browser.
    """
    out, pos = [], 0
    for m in TAG_OR_TEXT.finditer(text):
        name = m.group(2).lower()
        if name in KNOWN_TAGS:
            out.append(_angles(text[pos:m.start()]))
            out.append(m.group(0))
            pos = m.end()
    out.append(_angles(text[pos:]))
    return "".join(out)


KNOWN_TAG_RE = re.compile(
    r"</?(?:" + "|".join(sorted(KNOWN_TAGS)) + r")\b[^>]*>", re.I)


def strip_known_tags(text: str) -> str:
    """
    Remove our own tags, and only our own.

    `TAG` (`<[^>]+>`) also ate prose: "x<y and y>z" was treated as one tag and
    deleted, leaving a sentence with a hole in it. Restricting the pattern to the
    tag names the generator can actually emit keeps the maths text intact.
    """
    return KNOWN_TAG_RE.sub(" ", text)


def clean(s) -> str:
    if not s:
        return ""
    # a label can itself be an unfilled slot ("{{payment_frequency_q.name}} payment"),
    # and sometimes the source truncated it before the closing braces
    # ("Standard deviation of the sample proportion (_{{p)"). Both go; the slot
    # never spans whitespace or markup, so nothing real is eaten with it.
    s = re.sub(r"\{\{[^{}]{0,60}\}\}", "", str(s))
    s = re.sub(r"\{\{[^{}\s<>]{0,60}", "", str(s))
    # the source marks subscripts as ==n==
    s = SUB.sub(subscript, str(s))
    s = delatex(str(s))
    s = strip_known_tags(str(s))
    s = html.unescape(html.unescape(str(s))).replace("\u00a0", " ").replace("&nbsp;", " ")
    s = WS.sub(" ", s).strip()
    s = BOLD.sub(r"<strong>\1</strong>", s)
    s = SUP.sub(r"^\1", s)
    s = re.sub(r"\*\*(.+?)\*\*", r"\1", s)
    # a bare * between two quantities is multiplication, not emphasis
    s = re.sub(r"(?<=[A-Za-z0-9)\]₀-₉])\s*\*\s*(?=[A-Za-z0-9(\[₀-₉])", " · ", s)
    s = ITAL.sub(r"\1", s)
    s = re.sub(r"^[*\s]+", "", s)          # "* Let's calculate:" -> "Let's calculate:"
    s = WS.sub(" ", s).strip()
    s = strip_emoji(fix_typos(s.replace("*", "")))
    # a slot removed from "(_{{p)" leaves "((" or "(_" behind: an opener with no
    # content reads as a typo, so the empty bracket is dropped
    s = re.sub(r"[(\[]\s*[_]?\s*$", "", s).strip()
    s = re.sub(r"[(\[]\s*[_]?\s*[)\]]", "", s).strip()
    return escape_angles(s)


def plain(s: str) -> str:
    return WS.sub(" ", TAG.sub("", s or "")).strip()


def lc(s: str) -> str:
    """lower-case a label but keep acronyms intact."""
    s = (s or "").strip()
    if re.match(r"^I(\'|’|\b)", s):
        return s  # never lower-case the pronoun
    if not s or s.isupper() or any(c.isdigit() for c in s[:3]):
        return s
    words = s.split(" ")
    if words and words[0] and not (words[0].isupper() and len(words[0]) > 1):
        words[0] = words[0][0].lower() + words[0][1:]
    return " ".join(words)


def ucfirst(s: str) -> str:
    return s[:1].upper() + s[1:] if s else s


GLUED = {"currentdate": "current date", "duedate": "due date", "startdate": "start date",
         "enddate": "end date", "birthdate": "birth date", "firstdate": "first date"}


def camel(s: str) -> str:
    s = re.sub(r"(?<=[a-z0-9])(?=[A-Z])", " ", s or "")
    s = s.replace("_", " ").replace("==", "").strip()
    return ucfirst(s)


BAD_LABELS = re.compile(r"^(of|is|to|in|on|at|the|a|an|and|or|x|y|z|p|q|n|d|r|=|-|%|per|each)$", re.I)
FRAGMENT_WORDS = set("""what which how many much of is are was were do does did to in on
at for by and or the a an x y z p q n d r per each i my your our their its this that
you your we our it he she they them value number amount""".split())


def readable(label: str) -> bool:
    t = plain(clean(label)).strip(" =:")
    if len(t) < 3 or len(t) > 60:
        return False
    if BAD_LABELS.match(t) or t.endswith("=") or t.endswith("...") or re.match(r"^[#\d\-+]", t):
        return False
    words = [w.lower().strip(".,:;?") for w in t.split()]
    if not words or words[-1] in FRAGMENT_WORDS:
        return False
    if any(w in ("is", "are", "was", "were", "do", "does", "did") for w in words):
        return False
    # at least one substantive word, and it must not end on a dangling
    # connector ("What is", "of", "per") — those are form fragments, not names
    if words[-1] in FRAGMENT_WORDS:
        return False
    if not any(len(w) >= 3 and w not in FRAGMENT_WORDS and w.isalpha() for w in words):
        return False
    return True


ARTICLES = ("the ", "a ", "an ", "your ", "my ", "its ", "their ", "our ", "this ")


# A label that starts this way is already a usable phrase ("after vaccination",
# "number of guests"), and prefixing it with "the" produced "the after
# vaccination" on 90 pages.
SELF_CONTAINED = (
    "after ", "before ", "during ", "between ", "at ", "on ", "in ", "from ",
    "per ", "with ", "without ", "by ", "for ", "to ", "up to ", "over ",
    "under ", "whether ", "number of ", "amount of ", "do ", "does ", "did ",
    "is ", "are ", "was ", "have ", "has ", "will ", "can ", "should ",
    "select ", "choose ", "enter ", "include ", "use ", "how ", "which ",
    "what ", "when ", "if ", "give ", "add ",
)


# "after vaccination", "do you smoke" — a label that is a clause, not a noun
# phrase. Inside "work out X from A and B" it reads as a sentence missing its
# object ("from after vaccination"), so it is left out of that list.
CLAUSE_START = ("after ", "before ", "during ", "whether ", "do ", "does ", "did ",
                "is ", "are ", "was ", "have ", "has ", "will ", "can ", "should ",
                "how ", "which ", "what ", "when ", "if ")


def looks_like_clause(label: str) -> bool:
    return (label or "").strip().lower().startswith(CLAUSE_START)


def with_article(label: str) -> str:
    """'list of numbers' -> 'the list of numbers', but leave 'Your age' alone."""
    t = (label or "").strip()
    if not t:
        return t
    low = t.lower()
    if low.startswith(ARTICLES) or low.startswith(SELF_CONTAINED) or t.endswith("?"):
        return lc(t)
    # "from after vaccination and the people saved" — a bare participle reads as
    # a missing object, so it keeps its own preposition-free wording
    return "the " + lc(t)


NUM_SUFFIX = re.compile(r"^(?P<base>.*?)\s*(?:#|no\.?\s*|number\s*)?(?P<n>\d{1,3})$", re.I)


# Some reference labels are bare connectives — a date range is literally two
# fields called "From" and "To". Dropped into "work out X from …" they produce
# "work out time between from the from", so they are named for what they are.
FIELD_LABEL_SUBSTITUTES = {
    "from": "start date",
    "to": "end date",
    "start": "start date",
    "end": "end date",
    "between": "start date",
}


def readable_field_name(label: str) -> str:
    """A label suitable for use as a noun in a generated sentence."""
    name = strip_qualifier(label)
    key = name.strip().lower()
    if key in FIELD_LABEL_SUBSTITUTES:
        return FIELD_LABEL_SUBSTITUTES[key]
    return name

def collapse_repeats(labels: list[str]) -> list[str]:
    """'#1 … #100' is one idea, not a hundred bullets."""
    groups: dict[str, list[str]] = {}
    order: list[str] = []
    for lab in labels:
        m = NUM_SUFFIX.match(lab.strip())
        base = (m.group("base").strip(" #.") if m else lab.strip()).lower()
        groups.setdefault(base, []).append(lab)
        if base not in order:
            order.append(base)
    out = []
    for base in order:
        members = groups[base]
        # collapsed only when the boxes really are a countable form ("#1 … #100").
        # "score 1 😒 … score 10 😍" is a rating scale, and "the score boxes
        # (numbered 1 to 8)" says less than naming the top score does.
        if len(members) >= 3 and NUM_SUFFIX.match(members[0].strip()) and (
                re.search(r"(?:#|no\.?\s*|number\s*)\s*\d", members[0], re.I)
                or re.match(r"^\W*\d+$", members[0].strip())):
            pretty = members[0].strip()
            m = NUM_SUFFIX.match(pretty)
            stem = (m.group("base").strip(" #.") if m else pretty) or "numbered entry"
            out.append(f"the {lc(stem)} boxes (numbered 1 to {len(members)})")
        else:
            out.extend(with_article(x) for x in members)
    return out


def field_readable(f: dict) -> bool:
    return not f.get("synthetic") and readable(f["label"])


def strip_qualifier(label: str) -> str:
    """Drop the "(group heading)" / "(2)" qualifier added for disambiguation."""
    return re.sub(r"\s*\([^()]*\)\s*$", "", label or "").strip() or (label or "")


def uniq(items):
    seen, out = set(), []
    for i in items:
        k = (i or "").strip().lower()
        if k and k not in seen:
            seen.add(k)
            out.append(i.strip())
    return out


def join_list(items) -> str:
    items = [i for i in items if i]
    if not items:
        return ""
    if len(items) == 1:
        return items[0]
    if len(items) == 2:
        return f"{items[0]} and {items[1]}"
    return ", ".join(items[:-1]) + f" and {items[-1]}"


def plural(n: int, one: str, many: str | None = None) -> str:
    return one if n == 1 else (many or one + "s")


def para(text: str) -> str:
    return f"<p>{text}</p>"


def ul(items) -> str:
    return "<ul>" + "".join(i if i.lstrip().startswith("<li") else f"<li>{i}</li>"
                            for i in items if i) + "</ul>"


def ol(items) -> str:
    return "<ol>" + "".join(f"<li>{i}</li>" for i in items if i) + "</ol>"


def sentences(*parts) -> str:
    return " ".join(p.strip() for p in parts if p and p.strip())


# --------------------------------------------------------------------------- #
# model extraction
# --------------------------------------------------------------------------- #

INPUTISH = {"numerical", "valueSelect", "date", "time", "datetime"}
SUPERSCRIPT = str.maketrans("0123456789-", "⁰¹²³⁴⁵⁶⁷⁸⁹⁻")


def walk_fields(rec):
    for gi, g in enumerate(rec.get("groups") or []):
        for grid, columns in g.get("m") or []:
            for col in columns or []:
                for f in col or []:
                    if f.get("t") in ("v", "i"):
                        yield gi, f


def group_title(rec, gi):
    groups = rec.get("groups") or []
    if 0 <= gi < len(groups):
        return plain(clean(groups[gi].get("title")))
    return ""


def build_model(rec, units):
    labels: dict[str, str] = {}
    fields = []
    for gi, f in walk_fields(rec):
        name = f.get("n") or ""
        raw_label = clean(f.get("l"))
        # a label is UI text, never markup: `**10^^x^^**` is emphasis in the
        # reference's authoring syntax, but every template that quotes a label
        # already bolds it, so keeping the tag produced <strong><strong>…</strong></strong>
        plain_label = TAG.sub("", raw_label).strip()
        label = GLUED.get(plain_label.lower().replace(" ", ""), plain_label) or camel(name)
        label = re.sub(r"[\s:=]+$", "", label).strip()
        if label and label[0].islower():
            label = ucfirst(label)
        if name and name not in labels:
            labels[name] = label
        fields.append({"gi": gi, "name": name, "label": label, "synthetic": plain_label == "",
                       "vt": f.get("vt"), "us": f.get("us"), "du": f.get("du"),
                       "pre": clean(f.get("pre")), "suf": clean(f.get("suf")),
                       "opts": f.get("opts") or [], "t": f.get("t")})

    # Two groups on the same page often reuse a generic label ("Of", "Amount").
    # Give each one its group heading so a reader can tell them apart.
    short_labels = dict(labels)
    seen_label: dict[str, int] = {}
    for f in fields:
        key = lc(f["label"])
        seen_label[key] = seen_label.get(key, 0) + 1
    dup_used: dict[str, int] = {}
    for f in fields:
        if seen_label[lc(f["label"])] < 2:
            continue
        title = group_title(rec, f["gi"]).rstrip("?:").strip()
        if len(title) > 46:
            title = title[:43].rsplit(" ", 1)[0] + "…"
        if title and len(title) >= 4:
            f["label"] = f'{f["label"]} ({title})'
        else:
            dup_used[f["label"]] = dup_used.get(f["label"], 0) + 1
            if dup_used[f["label"]] > 1:
                f["label"] = f'{f["label"]} ({dup_used[f["label"]]})'
        labels[f["name"]] = f["label"]
    def unit_of(f):
        key = f.get("us")
        if not key or key not in units:
            return None
        u = units[key]
        start = f.get("du") or (u.get("default") or [None])[0]
        entry = (u.get("units") or {}).get(start) or {}
        full = entry.get("f") or entry.get("n") or start
        return {"key": key, "name": u.get("name") or "", "default": start,
                "default_full": full, "count": len(u.get("units") or {})}

    eq_all = rec.get("eq") or []
    ident = re.compile(r"^[A-Za-z_][A-Za-z0-9_]*$")
    targets = []
    for entry in eq_all:
        found = [v.get("l") for v in (entry.get("var") or []) if v.get("l")]
        if not found:
            f = (entry.get("formula") or "").split("=")
            found = [side.strip() for side in (f[0], f[-1])] if len(f) >= 2 else []
        for side in found:
            if ident.match(side) and side not in targets:
                targets.append(side)
                break
    computed = {f["name"] for f in fields if f["vt"] == "dependent"} | set(targets)

    inputs = [f for f in fields if f["t"] == "v" and f["vt"] in INPUTISH and f["name"] not in computed]
    by_name = {f["name"]: f for f in fields}
    outputs = [by_name[n] for n in targets if n in by_name]
    outputs += [f for f in fields if f["vt"] == "dependent" and f not in outputs]
    primary = targets[0] if targets else None
    solve_dirs = max((len(e.get("var") or []) for e in eq_all), default=0)

    # An internal target often has no label of its own ("payment_gen"), while a
    # visible result field does ("Monthly payment"). Prefer the label a reader
    # will recognise.
    primary_label = labels.get(primary or "", camel(primary or ""))
    primary_labelled = bool(primary) and readable(primary_label) and primary in labels

    return {"labels": labels, "short_labels": short_labels, "fields": fields, "inputs": inputs, "outputs": outputs,
            "selects": [f for f in fields if f["vt"] == "valueSelect"],
            "dates": [f for f in fields if f["vt"] in ("date", "datetime", "time")],
            "numeric": [f for f in fields if f["vt"] == "numerical"],
            "with_units": [f for f in fields if unit_of(f)],
            "eq": eq_all, "primary": primary,
            "primary_label": tidy_label(primary_label),
            "primary_labelled": primary_labelled,
            "order": {f["name"]: i for i, f in enumerate(fields)},
            "solve_dirs": solve_dirs, "unit_of": unit_of}


FUNC_WORDS = {
    "getDayOfWeek": "weekday of", "abs": "the absolute value of", "sqrt": "the square root of",
    "floor": "rounded down,", "ceil": "rounded up,", "round": "rounded,", "if": "a conditional on",
    "min": "the smaller of", "max": "the larger of", "pow": "", "log": "the natural log of",
    "exp": "the exponential of", "sin": "the sine of", "cos": "the cosine of", "tan": "the tangent of",
}


def pretty_formula(formula: str, labels: dict[str, str]) -> str:
    """Turn `(weight/20) * 50` into something a reader can follow."""
    if not formula:
        return ""
    out = formula
    funcs = {}

    def keep(m):
        k = f"\x00{len(funcs)}\x00"
        funcs[k] = m.group(1)
        return k

    out = re.sub(r"pow\s*\(([^,()]+),\s*([^,()]+)\)", r"(\1 ^ \2)", out)
    out = re.sub(r"([A-Za-z_][A-Za-z0-9_]*)\s*\(", lambda m: keep(m) + "(", out)

    def sub(m):
        name = m.group(0)
        lab = labels.get(name)
        if lab:
            return lc(lab)
        return camel(name).lower() if name[:1].islower() else camel(name)

    out = re.sub(r"[A-Za-z_][A-Za-z0-9_]*", sub, out)
    for k, v in funcs.items():
        out = out.replace(k, FUNC_WORDS.get(v, camel(v)) + " " if FUNC_WORDS.get(v) else "")
    out = outside_tags(out, lambda t: (t.replace(" * ", " × ").replace("*", " × ")
                                        .replace(" / ", " ÷ ").replace("/", " ÷ ")
                                        .replace(" + ", " + ").replace(" - ", " − ")
                                        .replace(" ^ ", " ^ ")))
    return WS.sub(" ", out).strip()


def model_label(model, name: str) -> str:
    """Field label for a variable, falling back to a humanised name."""
    lab = model["labels"].get(name)
    if lab:
        return lab
    return camel(name)


def formula_lines(model) -> list[tuple[str, str, str]]:
    """(target label, readable right-hand side, machine form) per equation."""
    lines, seen = [], set()
    for entry in model["eq"]:
        formula = (entry.get("formula") or "").strip()
        if not formula:
            continue
        variants = entry.get("var") or []
        forms = []
        if variants:
            for v in variants:
                if v.get("l") and v.get("f"):
                    forms.append((v["l"], v["f"]))
            if not forms and "=" in formula:
                lhs, rhs = formula.split("=", 1)
                forms.append((lhs.strip(), rhs.strip()))
        elif "=" in formula:
            lhs, rhs = formula.split("=", 1)
            forms.append((lhs.strip(), rhs.strip()))
        else:
            forms.append(("", formula))

        # one picture per relationship: the solved-for variable, then its expression
        target, expr = forms[0]
        readable = pretty_formula(expr, model.get("short_labels") or model["labels"])
        if not readable:
            continue
        short = model.get("short_labels") or model["labels"]
        lab = (short.get(target) or model_label(model, target)) if target else ""
        key = (lab + "=" + readable).lower()
        if key in seen:
            continue
        seen.add(key)
        lines.append((lab, readable, f"{target} = {expr}".strip()))
    return lines[:6]


# --------------------------------------------------------------------------- #
# vocabulary
# --------------------------------------------------------------------------- #

CATEGORY_ANGLE = {
    "math": "a homework check, a spreadsheet build or a bit of mental arithmetic you want to confirm",
    "finance": "a budget, a loan conversation, a payslip check or a what-if before you talk to a lender",
    "physics": "a lab report, a problem set or a sanity check on a physical situation",
    "health": "an informed starting point to take to a clinician, not a diagnosis",
    "conversion": "a recipe, a shopping list, a travel plan or a form that asks for a unit you do not use",
    "everyday-life": "a practical question that turns up in daily life",
    "statistics": "an assignment, a report or a data discussion where you need a defensible number",
    "construction": "a materials order or a planning estimate you want to get roughly right first time",
    "biology": "an animal, a plant or a biological process whose scale you want to put into perspective",
    "sports": "a training session, a performance comparison or a competition result",
    "chemistry": "a bench calculation involving amounts, concentrations or reaction ratios",
    "food": "portioning, timing or nutrition",
    "ecology": "a footprint, a resource or an environmental change you want to size up",
    "other": "whatever you happen to be working on",
}

CATEGORY_SCENES = {
    "math": ["checking a homework answer before you hand it in",
             "building the same calculation into a spreadsheet and wanting a reference value",
             "settling an argument about a number with a quick, traceable result",
             "splitting a bill, a measurement or a shape problem between several people"],
    "finance": ["sizing up a purchase before you commit to it",
                "comparing two offers that quote their costs in different ways",
                "building a monthly budget and testing how one number shifts the rest",
                "preparing questions for a lender, an accountant or an adviser"],
    "physics": ["writing up a lab result and needing a quick cross-check",
                "solving a problem set where the algebra is more interesting than the arithmetic",
                "testing whether an answer is physically plausible before you trust it"],
    "health": ["preparing for an appointment so you can describe your numbers clearly",
               "tracking a measurement over time and understanding what changed",
               "deciding whether a reading is worth a second look"],
    "conversion": ["reading a recipe written in units you do not use",
                   "filling in a form that asks for imperial or metric values",
                   "checking a product listing against the measurements you work with",
                   "converting a figure someone quoted you so you can compare it"],
    "statistics": ["turning raw numbers into something you can quote",
                   "checking a result a piece of software produced",
                   "deciding how much confidence a sample really supports"],
    "construction": ["ordering material and not wanting a second trip",
                     "quoting a job where areas and quantities drive the price",
                     "checking a supplier's figure against your own measurements"],
    "biology": ["putting a biological quantity into a scale you can picture",
                "comparing two organisms, populations or processes",
                "supporting a lesson, a lecture or a field note"],
    "sports": ["planning a session around a target you already know",
               "comparing two athletes or two attempts fairly",
               "tracking progress across a training block"],
    "chemistry": ["preparing a solution and checking the numbers first",
                  "working through a stoichiometry problem",
                  "converting between the units a protocol and your bench equipment use"],
    "food": ["scaling a recipe up or down",
             "checking portions before you shop",
             "working out timing so everything finishes together"],
    "ecology": ["sizing an environmental impact in familiar units",
                "comparing two options on the same basis",
                "putting a headline figure into context"],
    "other": ["turning a rough idea into a number you can act on",
              "checking a figure someone else quoted",
              "testing how sensitive an answer is to one input"],
}

OPENERS = [
    "The {name} calculator turns {inputs} into {output}.",
    "{Primary_uc} is what the {name} calculator works out, and it gets there from {inputs}.",
    "Give the {name} calculator {inputs} and it returns {output}.",
    "Supply {inputs} and the {name} calculator solves for {output_lc}.",
]

WHY = [
    "It is built for {angle}.",
    "That makes it useful for {angle}.",
    "It suits {angle}.",
    "Think of it as a shortcut for {angle}.",
]

CLOSERS = [
    "Every field is labelled the way you would say it out loud, so you can usually fill the form from memory and only look up the numbers you genuinely do not know.",
    "The unit chips sit next to the boxes, which is where most hand-calculation mistakes start.",
    "Because the result is recalculated when you press Calculate — and on every edit after that — you can nudge one input at a time and watch how much the answer really depends on it.",
    "Nothing is submitted anywhere: the arithmetic runs in the page you are looking at.",
    "The formula is printed further down, so you can check the answer by hand if you want to.",
]

TIPS = [
    "Keep the units you enter consistent. Mixing centimetres into a field that expects metres is the single most common way to get an answer that is out by a factor of a hundred.",
    "Change one input at a time when you are exploring. Two simultaneous changes make it impossible to tell which one moved the result.",
    "Round only at the end. The calculator carries full precision internally, so re-entering a value you already rounded is the fastest way to introduce drift.",
    "If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.",
    "Write the answer down with its unit. A bare number copied into a report later is exactly where units get lost.",
    "Leave the field you want solved for empty rather than guessing at it. Filling every box tells the calculator you already know the answer.",
    "Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.",
]

# --------------------------------------------------------------------------- #
# section builders
# --------------------------------------------------------------------------- #

def section(title: str, *blocks: str) -> dict:
    return {"title": title, "html": "\n".join(b for b in blocks if b)}


def describe_field(f, model, rng) -> str:
    # the template bolds the label itself, so any markup already on it is dropped
    lab = TAG.sub("", f["label"])
    u = model["unit_of"](f)
    vt = f["vt"]
    if vt == "valueSelect":
        # A blank-labelled option is the reference's "off" state, not a choice a
        # reader can pick, so it must not be counted or quoted. Two of them (one
        # real label + one blank) are a single on/off switch in the interface.
        labels = [plain(clean(o[1])) for o in f["opts"] if len(o) > 1 and plain(clean(o[1]))]
        n = len(labels)
        if n == 1:
            only = labels[0].rstrip(" .")
            return (f"<li><strong>{lab}</strong>: a single on/off switch — tick it for "
                    f"&ldquo;{only}&rdquo;, leave it clear for the other case. It changes which "
                    f"relationship the calculator applies, not just a multiplier.</li>")
        opts = labels[:3]
        tail = f" — {n} options" if n > 1 else ""
        ex = f", such as {join_list([lc(o) for o in opts])}" if opts else ""
        return (f"<li><strong>{lab}</strong>: pick the option that matches your case{tail}{ex}. "
                f"The choice changes which relationship the calculator applies, not just a "
                f"multiplier, so it is worth reading the options carefully.</li>")
    if vt in ("date", "datetime", "time"):
        what = {"date": "a calendar date", "datetime": "a date and a time of day",
                "time": "a time of day"}[vt]
        return (f"<li><strong>{lab}</strong>: {what}. Use the picker; the answer is recalculated "
                f"the moment the date changes, and the count is done date-to-date rather than by "
                f"subtracting timestamps.</li>")
    if u:
        extra = (f" The unit chip switches it to any of the {u['count']} supported units."
                 if u["count"] > 1 else "")
        dflt = f", entered by default in {u['default_full']}" if u["default_full"] else ""
        return f"<li><strong>{lab}</strong>: a measured quantity{dflt}.{extra}</li>"
    if f.get("suf"):
        suf = plain(f["suf"])
        if suf in ("", "?", "-"):
            return f"<li><strong>{lab}</strong>: a plain number, entered directly.</li>"
        return f"<li><strong>{lab}</strong>: a number, expressed in {suf}.</li>"
    return f"<li><strong>{lab}</strong>: a plain number with no unit attached.</li>"


def field_meaning(f, model) -> str:
    """A short, original gloss on what a field stands for."""
    vt = f["vt"]
    if vt == "valueSelect":
        labels = [plain(clean(o[1])) for o in f["opts"] if len(o) > 1 and plain(clean(o[1]))]
        n = len(labels)
        if n == 1:
            return f"An on/off switch, ticked for {lc(labels[0].rstrip(' .'))}."
        if n:
            return (f"One of {n} {plural(n, 'option')}, such as {join_list([lc(o) for o in labels[:3]])}."
                    if n > 1 else f"Set to {lc(labels[0])}.")
        return "A fixed choice."
    if vt == "date":
        return "A calendar date."
    if vt == "datetime":
        return "A calendar date with a time of day."
    if vt == "time":
        return "A time of day."
    u = model["unit_of"](f)
    if u:
        return f"A measured quantity, {u['count']} {plural(u['count'], 'unit')} available."
    if f.get("suf") and plain(f["suf"]) not in ("", "?", "-"):
        return f"A number stated in {plain(f['suf'])}."
    return "A plain number, with no unit."


def output_sentence(f, model) -> str:
    lab = f["label"]
    u = model["unit_of"](f)
    if f["vt"] == "date":
        return f"<li><strong>{lab}</strong>: a calendar date.</li>"
    if f["vt"] == "datetime":
        return f"<li><strong>{lab}</strong>: a date and a time of day.</li>"
    if f["vt"] == "valueSelect":
        return f"<li><strong>{lab}</strong>: the option the calculation settles on.</li>"
    if u:
        return (f"<li><strong>{lab}</strong>: shown in {u['default_full']}, and convertible to "
                f"any of the {u['count']} units on that chip.</li>")
    return f"<li><strong>{lab}</strong>: a number, filled in as soon as the inputs allow it.</li>"


def html_escape(s: str) -> str:
    return html.escape(plain(s))


def sci(v: float) -> str:
    """Readable rendering of a conversion result."""
    if v == 0:
        return "0"
    a = abs(v)
    if a >= 1e6 or a < 1e-3:
        return f"{v:.6g}"
    if a >= 1000:
        return f"{v:,.2f}".rstrip("0").rstrip(".")
    if a >= 1:
        return f"{v:,.4f}".rstrip("0").rstrip(".")
    return f"{v:.6f}".rstrip("0").rstrip(".")


def unit_map(units, model):
    """Affine map from the first box's unit to the second box's unit."""
    fields = [f for f in model["fields"] if f.get("us") and f.get("du") and f["us"] in units]
    if len(fields) < 2:
        return None
    keys = [f["us"] for f in fields[:2]]
    if keys[0] != keys[1]:
        return None
    us = units[keys[0]]["units"]

    def affine(slug):
        expr = (us.get(slug) or {}).get("e")
        if not expr:
            return None
        body = expr.replace("^", "**")
        if not re.fullmatch(r"[0-9v+\-*/(). ]+", body):
            return None

        def ev(x):
            try:
                return float(eval(body, {"__builtins__": {}}, {"v": float(x)}))
            except Exception:
                return None

        c = ev(0)
        k = (ev(1) - c) if c is not None and ev(1) is not None else None
        if c is None or k is None or k == 0:
            return None
        return k, c

    da, db = affine(fields[0]["du"]), affine(fields[1]["du"])
    if not da or not db:
        return None
    (ka, ca), (kb, cb) = da, db
    return {
        "a": strip_qualifier(fields[0]["label"]),
        "b": strip_qualifier(fields[1]["label"]),
        "a_unit": (us.get(fields[0]["du"]) or {}).get("f") or fields[0]["du"],
        "a_sym": (us.get(fields[0]["du"]) or {}).get("n") or fields[0]["du"],
        "b_sym": (us.get(fields[1]["du"]) or {}).get("n") or fields[1]["du"],
        "b_unit": (us.get(fields[1]["du"]) or {}).get("f") or fields[1]["du"],
        # toBase(v) = (v - c) / k ; toDisplay(base) = k * base + c
        "fn": lambda x: kb * ((x - ca) / ka) + cb,
        "step": kb / ka,
        "offset": cb - (kb * ca / ka),
    }


def conversion_factor(ex):
    """unit_b per unit_a, read off the quoted example."""
    if not ex or not ex.get("inputs") or not ex.get("outputs"):
        return None
    ins = [i for i in ex["inputs"] if i.get("kind") == "number"]
    outs = [o for o in ex["outputs"] if o.get("kind") == "number"]
    if len(ins) != 1 or not outs:
        return None
    try:
        a = float(str(ins[0]["value"]).replace(",", ""))
        b = float(str(outs[0]["value"]).replace(",", ""))
    except (TypeError, ValueError):
        return None
    if a <= 0 or b <= 0:
        return None
    factor = b / a
    return factor if 1e-9 < factor < 1e9 else None


def fmt_value(v: str, unit: str) -> str:
    v = (v or "").strip()
    unit = (unit or "").strip()
    if not v:
        return ""
    return f"{v} {unit}".strip()


ODD_UNITS = ("year", "yrs", "yr", "month", "day", "hour", "minute")
SANE = [(r"height|stature|length of the (?:baby|child)", "cm", 40, 260),
        (r"height|stature", "m\b", 0.4, 2.6),
        (r"weight|mass|body", "kg", 2, 400),
        (r"weight|mass|body", "lb", 5, 900),
        (r"\bage\b", "year", 0.5, 110)]


def plausible_example(ins, outs) -> bool:
    """Reject examples whose numbers would look wrong to a reader."""
    for i in ins:
        raw = str(i.get("value", "")).replace(",", "")
        if not re.fullmatch(r"-?\d+(\.\d+)?(e[-+]?\d+)?", raw or "x"):
            continue
        v = abs(float(raw))
        unit = lc(str(i.get("unit", "")))
        if v > 1000 and any(u in unit for u in ODD_UNITS):
            return False            # a 262,980-year loan term
        if v > 5e6:
            return False
        label = lc(str(i.get("label", "")))
        for pat, unitpat, lo, hi in SANE:
            if re.search(pat, label) and re.search(unitpat, unit):
                if v and not (lo <= v <= hi):
                    return False
                break
    for o in outs:
        raw = str(o.get("value", "")).replace(",", "")
        if not re.fullmatch(r"-?\d+(\.\d+)?(e[-+]?\d+)?", raw or "x"):
            continue
        v = abs(float(raw))
        if v == 0 or v > 1e9:
            return False
        unit = lc(str(o.get("unit", "")))
        if v > 500 and any(u in unit for u in ODD_UNITS):
            return False
    return True


def worked_example(model, ex, rng) -> str | None:
    if not ex:
        return None
    ins = [i for i in (ex.get("inputs") or []) if i.get("label") and i.get("value")]
    outs = [o for o in (ex.get("outputs") or []) if o.get("label") and o.get("value")]
    if not ins or not outs or not plausible_example(ins, outs):
        return None

    shown_in = ins[:4]
    shown_out = outs[:4]
    source = ex.get("source")

    picks = []
    for i in shown_in:
        i["label"] = tidy_label(i["label"])
        if i.get("kind") == "select":
            picks.append(f"<strong>{i['label']}</strong> set to {clean(str(i['value']))}")
        else:
            picks.append(f"<strong>{i['label']}</strong> = {fmt_value(i['value'], i.get('unit', ''))}")
    results = []
    for o in shown_out:
        o["label"] = tidy_label(o["label"])
        results.append(f"<strong>{o['label']}</strong> = {fmt_value(o['value'], o.get('unit', ''))}")

    if source == "defaults":
        lead = rng.choice([
            "Open the page and it is already filled in. With the values it starts from — "
            + join_list(picks) + " — it reports " + join_list(results) + ".",
            "The form opens with a complete set of values: " + join_list(picks) + ". "
            "Straight away the calculator returns " + join_list(results) + ".",
        ])
        tail = ("Those are real numbers produced by the same engine that runs while you type, so "
                "you can change any single box and see the answer move from this starting point.")
    else:
        lead = rng.choice([
            "Take " + join_list(picks) + ". The calculator returns " + join_list(results) + ".",
            "Suppose " + join_list(picks) + ". Working through the relationship above gives "
            + join_list(results) + ".",
        ])
        tail = rng.choice([
            "The point of the example is the scale, not the particular digits: swap in your own "
            "figures and the same relationship produces your answer.",
            "Read it as a template. Every number above can be replaced with one of yours; only the "
            "relationship between them is fixed.",
        ])

    steps = ol([
        "Enter the values listed above, matching the units each box asks for.",
        "Read off the result. Any field you leave empty is the one the calculator solves for.",
        f"Sanity-check the number against the relationship: {join_list(results)} should be "
        f"roughly the size you expected from {join_list(picks[:2])}.",
    ])
    return para(lead) + para(tail) + steps


TIDY = [(r"\s+gen$", ""), (r"\s+gen\s+", " general "), (r"^eq\s+", "equivalent "),
        (r"\s+2$", ""), (r"\s+3$", "")]


def tidy_label(label: str) -> str:
    """Light cleanup of internal-looking result labels ("payment gen")."""
    # labels coming from the solved example still carry the reference's own
    # markup (Cl^^-^^, **D**), which must not reach the article
    out = clean(label).strip()
    for pattern, repl in TIDY:
        out = re.sub(pattern, repl, out, flags=re.I)
    out = re.sub(r"[\s:=]+$", "", out).strip()
    # result labels are quoted in prose and inside <strong> bullets alike, so
    # they are plain text: `**10^^x^^**` is the reference's emphasis, not ours
    out = TAG.sub("", out).strip()
    return out or TAG.sub("", label).strip()


RESULTISH = re.compile(r"\b(result|total|answer|payment|score|output|final|estimate|"
                       r"amount|value|rate|cost|price|due|deadline|date)\b", re.I)


def pick_primary(model, name: str):
    """The result a reader would name in a sentence about this page.

    Returns None when nothing qualifies — a generic phrasing ("works out the
    result") is better than naming an internal variable.
    """
    derived = {f["name"] for f in model["outputs"]}
    title_words = {w for w in re.split(r"[^a-z0-9]+", name.split("(")[0].lower()) if len(w) > 2}
    flat_title = re.sub(r"[^a-z0-9]+", " ", name.split("(")[0].lower()).strip()

    ranked = []
    for f in model["fields"]:
        if f["name"] not in derived or f["vt"] not in ("numerical", "dependent"):
            continue
        label = strip_qualifier(f["label"])
        if not field_readable(f) or not readable(label) or "(" in label:
            continue
        label_words = {w for w in re.split(r"[^a-z0-9]+", label.lower()) if len(w) > 2}
        score = 3.0 * len(title_words & label_words)
        flat = re.sub(r"[^a-z0-9]+", " ", label.lower()).strip()
        if flat == flat_title:
            score += 2.5
        elif flat_title and flat_title.startswith(flat + " "):
            score += 1.0
        if f["vt"] == "dependent":
            score += 1.0            # a read-only field is a result by design
        if RESULTISH.search(label):
            score += 0.5
        score -= len(label) / 200.0
        ranked.append((score, f, label))

    ranked.sort(key=lambda t: t[0], reverse=True)
    if not ranked or ranked[0][0] < 1.5:
        return None
    return ranked[0][1]


def is_converter(model) -> bool:
    """One equation, two variables, no arithmetic: a unit conversion."""
    eq = model["eq"]
    if len(eq) != 1:
        return False
    formula = (eq[0].get("formula") or "").strip()
    return re.fullmatch(r"[A-Za-z_]\w*\s*=\s*[A-Za-z_]\w*", formula) is not None


def related_section(model, siblings, cat_label) -> str:
    if not siblings:
        return ""
    links = [f'<a href="{s["path"]}">{s["name"]}</a>' for s in siblings]
    intro = para(
        f"If this one is part of a bigger problem, these {cat_label} calculators cover the "
        f"neighbouring steps: {join_list(links)}.")
    return intro


# --------------------------------------------------------------------------- #
# builder
# --------------------------------------------------------------------------- #

def build(rec, units, siblings, ex) -> dict:
    path = rec["path"]
    name = clean(rec.get("name")) or camel(rec.get("slug", ""))
    cat = rec.get("cat") or "other"
    rng = random.Random(f"{path}|{name}|v2")

    m = build_model(rec, units)
    primary = m["primary_label"]
    inputs = m["inputs"]
    in_labels = uniq([lc(f["label"]) for f in inputs if field_readable(f)])
    angle = CATEGORY_ANGLE.get(cat, CATEGORY_ANGLE["other"])
    scenes = CATEGORY_SCENES.get(cat, CATEGORY_SCENES["other"])

    m["primary_label"] = tidy_label(m["primary_label"])
    if not m.get("primary_labelled"):
        pick = pick_primary(m, name)
        if pick is not None:
            m["primary"] = pick["name"]
            m["primary_label"] = strip_qualifier(tidy_label(pick["label"]))
            m["primary_labelled"] = True

    primary = m["primary_label"]
    primary_field = next((f for f in m["fields"] if f["name"] == m["primary"]), None)
    if primary_field is None and not m["primary"]:
        # script-driven pages have no equation to read a target from, so fall
        # back to the first read-only result the form declares
        primary_field = next((f for f in m["fields"]
                              if f["vt"] == "dependent" and field_readable(f)), None)
        if primary_field is not None:
            m["primary"] = primary_field["name"]
            m["primary_label"] = primary_field["label"]
        primary = m["primary_label"]
    primary_readable = (bool(primary_field) and field_readable(primary_field)
                        and m.get("primary_labelled", True))
    out_phrase = lc(primary) if primary_readable else "the result"
    named_inputs = collapse_repeats([readable_field_name(f["label"]) for f in inputs[:8]
                                     if field_readable(f) and f["vt"] != "valueSelect"
                                     and not looks_like_clause(f["label"])])[:4]
    named_inputs = uniq(named_inputs)

    # ---- summary -----------------------------------------------------------
    converter = is_converter(m)
    if len(named_inputs) >= 2:
        summary = rng.choice(OPENERS).format(
            name=name,
            inputs=join_list(named_inputs),
            output=f"<strong>{out_phrase}</strong>" if primary_readable else "the answer",
            output_lc=out_phrase if primary_readable else "the answer",
            Primary_uc=ucfirst(primary) if primary_readable else "The answer",
        )
    else:
        summary = rng.choice([
            f"The {name} calculator is a free, no-sign-up {cat.replace('-', ' ')} tool. Fill in the "
            f"{len(inputs) or 'handful of'} {plural(len(inputs) or 2, 'field')} it asks for and it "
            f"works out {('**' + out_phrase + '**') if primary_readable else 'the answer'} straight "
            f"away, with the formula shown underneath.",
            f"Use the {name} calculator to work out "
            f"{out_phrase if primary_readable else 'your result'} from the "
            f"{len(inputs) or 'few'} {plural(len(inputs) or 2, 'field')} on the form: no sign-up, "
            f"no page reload, and the relationship behind it is printed below.",
            f"The {name} calculator takes the numbers you enter and reports "
            f"{('**' + out_phrase + '**') if primary_readable else 'the result'} immediately. It is "
            f"free to use, needs no account, and shows the working rather than just the answer.",
        ]).replace("**", "")
    summary = sentences(summary, rng.choice(WHY).format(angle=angle), rng.choice(CLOSERS))
    converter = is_converter(m)
    if converter:
        pair = [strip_qualifier(f["label"]) for f in m["fields"] if field_readable(f)][:2]
        a, b = (lc(re.sub(r"^(length|weight|mass|volume|area|distance|speed|time|pressure|energy) in ", "",
                         p, flags=re.I))
                for p in (pair + ["", ""])[:2])
        summary = rng.choice([
            f"The {name} converter changes a value given in {a} into {b}. Type into either box "
            f"and the other one follows, because the two are the same quantity written two "
            f"ways rather than two separate sums.",
            f"This page converts between {a} and {b}. One number goes in, the equivalent in the "
            f"other unit comes out immediately, and the factor that links them is stated below "
            f"so you can repeat the arithmetic yourself.",
            f"The {name} converter is a two-way unit swap: {a} on one side, {b} on the other. "
            f"Whatever you enter is converted through a single base unit, so one press of "
            f"Calculate gives the answer and the same factor works in either direction.",
        ])
        summary = sentences(summary, rng.choice(WHY).format(angle=angle), rng.choice(CLOSERS))
    if primary_readable:
        lit = out_phrase
        if lit.lower() in summary.lower() and f"<strong>{lit}</strong>" not in summary:
            idx = summary.lower().find(lit.lower())
            summary = summary[:idx] + f"<strong>{lit}</strong>" + summary[idx + len(lit):]

    sections = []

    # ---- 1. how it works ---------------------------------------------------
    flow = []
    in_sel = [f for f in inputs if f["vt"] == "valueSelect"]
    in_date = [f for f in inputs if f["vt"] in ("date", "datetime", "time")]
    in_num = [f for f in inputs if f["vt"] == "numerical"]
    sel_names = collapse_repeats([f["label"] for f in in_sel if field_readable(f)])
    date_names = collapse_repeats([f["label"] for f in in_date if field_readable(f)])
    num_names = collapse_repeats([f["label"] for f in in_num if field_readable(f)])
    if in_sel:
        flow.append("you choose the option that describes your case"
                    + (f" ({join_list(sel_names[:3])})" if sel_names else ""))
    if in_date:
        flow.append("you give " + (join_list(date_names[:3]) or "the dates it asks for"))
    if in_num:
        flow.append("you type in " + (join_list(num_names[:4]) or "the figures it asks for"))

    if primary_readable:
        first = (f"The {name} calculator takes the values in the form, applies the relationship "
                 f"described below and reports <strong>{out_phrase}</strong> in the results panel.")
    else:
        first = (f"The {name} calculator takes the values in the form, applies the relationships "
                 f"described below and reports every result it can derive from them.")
    body = [para(first)]
    if flow:
        body.append(para("Working from the top of the form: " + "; then ".join(flow) + "."))
    body.append(para(rng.choice([
        "There is a Calculate button. Press it once and the page works through the equation with "
        "the values you supplied, derives everything it can, and then keeps up with you as you "
        "correct a typo.",
        "Press Calculate and the page holds the relationship, tracks which boxes you filled and "
        "works out the rest; from that point on it follows every edit you make.",
        "The arithmetic runs in your browser, so nothing is submitted. Press Calculate once and "
        "the results panel fills in; it is never stale after that, because every edit re-solves "
        "it.",
    ])))
    if m["solve_dirs"] >= 2:
        body.append(para(
            "Because the equation can be rearranged for each of its variables, the page also runs "
            "backwards. Leave the box you want to know empty, fill in the rest, and it solves for "
            "the missing one instead. That is useful when you know the answer you need rather "
            "than the inputs you have."))
    sections.append(section(f"How the {name} calculator works", *body))

    # ---- 2. inputs ---------------------------------------------------------
    if inputs:
        items = [describe_field(f, m, rng) for f in inputs[:24]]
        html_in = ul(items)
        if len(inputs) > 24:
            html_in += para(
                f"The form has {len(inputs)} fields in total. The ones not listed here work the "
                f"same way: a label, a unit chip where the quantity has units, and a box that "
                f"updates the results as soon as it holds a valid number.")
        if converter:
            html_in += para(rng.choice([
                "Both boxes accept a value, so it does not matter which one you start from. "
                "Type into the box you already know and press Calculate — the number in the "
                "other box is rewritten with it, and the unit chips beside them let you move to "
                "a third and fourth unit without leaving the page.",
                "There is no direction to choose: enter the figure you have in whichever box "
                "matches its unit and read the equivalent from the other. Both fields are "
                "editable for that reason, and the chips beside them change the unit a box "
                "speaks without touching the number inside it.",
            ]))
        if m["selects"]:
            html_in += para(
                f"{len(m['selects'])} {plural(len(m['selects']), 'field')} on this form "
                f"{plural(len(m['selects']), 'is', 'are')} a choice rather than a number. Those "
                f"choices decide which version of the calculation applies, so they are worth "
                f"setting before you worry about the digits.")
        sections.append(section("What you need to enter", html_in))

    # ---- 2b. variables at a glance -----------------------------------------
    table_rows = []
    role_of = set()
    for f in inputs:
        role_of.add(f["name"])
    for f in m["outputs"]:
        role_of.add(f["name"])
    for f in m["fields"]:
        if f["t"] != "v" or not field_readable(f):
            continue
        if f["name"] not in role_of and f["vt"] != "dependent":
            continue
        u = m["unit_of"](f)
        unit = u["default_full"] if u else ("date" if f["vt"] == "date" else
                                           "choice" if f["vt"] == "valueSelect" else "—")
        role = "You supply it" if f["name"] in {i["name"] for i in inputs} else "Calculated"
        meaning = field_meaning(f, m)
        table_rows.append(
            f"<tr><td><strong>{f['label']}</strong></td><td>{meaning}</td>"
            f"<td>{unit or '—'}</td><td>{role}</td></tr>")
    if len(table_rows) >= 3:
        sections.append(section(
            "The variables, at a glance",
            para("Everything the page asks for and everything it reports, side by side. The "
                 "roles matter: a value you supply is read from the form, a calculated value is "
                 "derived from the others and cannot be set directly."),
            '<table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th>'
            '</tr></thead><tbody>' + "".join(table_rows[:24]) + "</tbody></table>" +
            (para(f"The table lists the first 24 of {len(table_rows)} fields; the rest follow the "
                  f"same pattern.") if len(table_rows) > 24 else "")))

    # ---- 3. formula --------------------------------------------------------
    lines = formula_lines(m)
    # `meters = feet` is a unit identity, not a calculation: both boxes hold the
    # same quantity and the conversion happens through the unit chips.
    identity = (len(lines) == 1
                and re.fullmatch(r"[A-Za-z_]\w*\s*=\s*[A-Za-z_]\w*", lines[0][2].strip()) is not None)
    if identity:
        lhs, rhs = [t for t in re.split(r"\s*=\s*", lines[0][2]) if t]
        lab_l = model_label(m, lhs)
        lab_r = model_label(m, rhs)
        umap_here = unit_map(units, m)
        factor_line = ""
        if umap_here:
            one = sci(umap_here["fn"](1))
            factor_line = para(
                f"Spelled out as an equation, <strong>1 {html_escape(umap_here['a_sym'])} = "
                f"{one} {html_escape(umap_here['b_sym'])}</strong>."
                + ("" if umap_here["offset"] == 0 else
                   f" The scales are not proportional, so the offset matters too: 0 "
                   f"{html_escape(umap_here['a_sym'])} = {sci(umap_here['fn'](0))} "
                   f"{html_escape(umap_here['b_sym'])}.")
                + " Everything else on this page follows from that one line.")
        sections.append(section(
            f"The formula behind the {name} calculator",
            factor_line if factor_line else "",
            para(f"This is a conversion rather than a calculation. {ucfirst(lab_l)} and "
                 f"{lc(lab_r)} describe the same quantity, so the arithmetic underneath is a "
                 f"simple identity: whatever you type in one box is converted to a common base "
                 f"unit, and the other box is rendered from that base in its own unit."),
            para("That is why changing the unit chip does not change the underlying value, only "
                 "the way it is written — and why you can enter a figure in either box and read "
                 "the answer from the other.")))
    elif lines:
        rendered = []
        for lab, readable, machine in lines:
            if lab:
                rendered.append(
                    f'<div class="formula-row"><span class="formula-lhs">{html.escape(lab)}</span>'
                    f'<span class="formula-eq">=</span>'
                    f'<span class="formula-rhs">{html.escape(html.unescape(readable))}</span></div>')
            else:
                rendered.append(f'<div class="formula-row"><span class="formula-rhs">'
                                f'{html.escape(readable)}</span></div>')
        intro = ("One relationship drives the whole page:" if len(lines) == 1
                 else "The page rests on a handful of relationships. Each one can be rearranged "
                      "for any of its variables, which is what makes the calculator work in both "
                      "directions:")
        spec = (para(intro)
                + '<div class="formula-block">' + "".join(rendered) + "</div>"
                + para("Read it as an ordinary equation. Where a word appears instead of a letter, "
                       "it is the label of one of the boxes in the form; where a function appears, "
                       "it is the usual mathematical meaning of that function."))
        sections.append(section(f"The formula behind the {name} calculator", spec))
    elif rec.get("needsJs"):
        sections.append(section(
            f"The formula behind the {name} calculator",
            para("This one is not a single closed-form equation. It is driven by a page script "
                 "that applies a set of rules — lookups, cut-offs and conditional branches — and "
                 "the numbers you see are the script's output rather than the rearrangement of "
                 "one line of algebra. The rules are what make the tool useful: a plain formula "
                 "cannot express a table of thresholds or a choice between cases."),
            para("Practically, that means you can trust the result but cannot reproduce it with a "
                 "pocket calculator. If you need to show your working, quote the inputs and the "
                 "output rather than an equation.")))

    # ---- 4. worked example -------------------------------------------------
    body_ex = worked_example(m, ex, rng)
    if body_ex:
        sections.append(section("A worked example", body_ex))

    # ---- 5. reading the result --------------------------------------------
    if m["outputs"]:
        outs = [output_sentence(f, m) for f in m["outputs"][:12]]
        tail = para(rng.choice([
            "If a number looks wrong, check three things in this order: that the units match what "
            "you had in mind, that no drop-down is still on its default, and that the value you "
            "entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the "
            "classic mistake. Those three account for almost every answer that is out by a factor.",
            "Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a "
            "drop-down left at its default, or a percentage typed as a whole number rather than a "
            "decimal will each shift the answer by a clean power of ten.",
        ]))
        sections.append(section("Reading the result", ul(outs) + tail))

    # ---- 5b. conversion table ----------------------------------------------
    umap = unit_map(units, m) if converter else None
    if umap:
        rows = []
        for mag in (1, 2, 5, 10, 25, 50, 100, 500, 1000):
            rows.append(f"<tr><td>{mag:,}</td><td>{sci(umap['fn'](mag))}</td></tr>")
        sections.append(section(
            f"Common {lc(umap['a'])} to {lc(umap['b'])} conversions",
            para((f"The table applies the same relationship the calculator uses, so the numbers "
                  f"here and in the boxes above agree to the last digit shown. Multiply a "
                  f"{lc(umap['a'])} figure by {sci(umap['step'])} to get "
                  f"{lc(umap['b'])}; divide to go the other way.")
                 if umap["offset"] == 0 else
                 (f"The two scales are linear but not proportional: an offset sits between them "
                  f"as well as a factor, which is why the table cannot be reproduced by "
                  f"multiplying alone. Read a value straight from the row, or let the calculator "
                  f"interpolate for numbers between them.")),
            f"<table><thead><tr><th>{html_escape(umap['a'])}</th>"
            f"<th>{html_escape(umap['b'])}</th></tr></thead><tbody>" + "".join(rows) +
            "</tbody></table>",
            para("Display rounding is the only thing that changes between the table and the "
                 "calculator: the underlying conversion runs at full precision.")))

    factor = conversion_factor(ex)
    if factor and converter and not umap:
        base_labels = [strip_qualifier(f["label"]) for f in m["fields"] if field_readable(f)][:2]
        if len(base_labels) == 2:
            a_lab, b_lab = base_labels
            rows = []
            for mag in (1, 2, 5, 10, 25, 50, 100, 500, 1000):
                rows.append(f"<tr><td>{mag:,}</td><td>{sci(mag * factor)}</td></tr>")
            sections.append(section(
                f"Common {lc(a_lab)} to {lc(b_lab)} conversions",
                para(f"The table below applies the same factor to the values that come up most "
                     f"often. Multiply any {lc(a_lab)} figure by {sci(factor)} to get the "
                     f"equivalent in {lc(b_lab)}; divide to go the other way."),
                "<table><thead><tr><th>" + html_escape(a_lab) + "</th><th>" +
                html_escape(b_lab) + "</th></tr></thead><tbody>" + "".join(rows) +
                "</tbody></table>",
                para("Values are rounded for readability here; the calculator itself keeps full "
                     "precision and only rounds what it shows.")))

    # ---- 6. units ----------------------------------------------------------
    if m["with_units"]:
        us = []
        for f in m["with_units"][:8]:
            u = m["unit_of"](f)
            uname = (u["name"] or u["key"]).split(" (")[0]
            start = u["default_full"] or u["default"] or ""
            us.append(f"<li><strong>{f['label']}</strong>: {uname}, opening in {start}</li>")
        sections.append(section(
            "Units and precision",
            para(rng.choice([
                "Every quantity with units carries a chip beside its box. Switching the chip does "
                "not change what you know, only how it is written: values are converted to a common "
                "internal base, the arithmetic happens there, and the answer is converted back for "
                "display. Mixing metres with feet in one calculation is therefore safe.",
                "Units are handled by conversion rather than by convention. Whatever chip you "
                "choose, the number is turned into a single base unit before the calculation and "
                "rendered back afterwards, so a form filled with a mixture of systems still gives "
                "the right answer.",
            ])),
            ul(us),
            para(rng.choice([
                "Results are rounded for display but computed at full precision, so chaining one "
                "result into the next does not accumulate error. Very large and very small numbers "
                "switch to scientific notation rather than printing a run of zeros.",
                "Display rounding is separate from calculation rounding: the digits you see are "
                "shortened, the value behind them is not. Numbers far from everyday size are shown "
                "in scientific notation so the significant digits stay readable.",
            ]))))

    # ---- 7. when to use it -------------------------------------------------
    sc = rng.sample(scenes, k=min(3, len(scenes)))
    scene_items = [f"<li>{s.capitalize() if s[:1].islower() else s}</li>" for s in sc]
    if named_inputs:
        scene_items.append(
            f"<li>Any time the same {len(named_inputs)} figures keep coming back — "
            f"{join_list(named_inputs[:3])} — and you would rather not repeat the arithmetic "
            f"by hand each time.</li>")
    sections.append(section(
        "When to use it",
        para(f"The {name} calculator earns its place in the middle of a task, not instead of one. "
             f"It is most useful when:") + ul(scene_items)))

    # ---- 8. tips -----------------------------------------------------------
    tips = rng.sample(TIPS, k=4)
    sections.append(section("Getting a reliable answer", ul(tips)))

    # ---- 9. good to know ---------------------------------------------------
    notes = []
    if m["solve_dirs"] >= 2:
        notes.append("Filling in more than one box is fine. The most recently edited field is the "
                     "one treated as known, so you can switch direction without reloading.")
    if m["selects"]:
        notes.append("Answers that depend on a drop-down reflect the option you picked, not a "
                     "range. Switching to a neighbouring option is the quickest way to see how "
                     "much that factor matters.")
    if rec.get("datasets"):
        notes.append("Some options are backed by reference tables that ship with the page, so the "
                     "values are fixed data rather than a live lookup.")
    if m["dates"]:
        notes.append("Dates are compared date to date in your own time zone, so a daylight-saving "
                     "change will not shift the count by a day.")
    if not m["eq"] and not rec.get("needsJs"):
        notes.append("If a field is empty the result waits rather than guessing: no zero is "
                     "quietly substituted in the background.")
    if ex and ex.get("missing"):
        notes.append("Fields that are still blank are exactly the ones the calculator has not yet "
                     "been given, so the results panel is a reliable map of what is missing.")
    if notes:
        sections.append(section("Good to know", ul(notes)))

    # ---- 9b. depth top-up --------------------------------------------------
    def page_words() -> int:
        return (len(plain(summary).split())
                + sum(len(plain(sec["html"]).split()) for sec in sections))

    if page_words() < 950:
        limits = []
        if m["selects"]:
            limits.append(
                f"The {len(m['selects'])} {plural(len(m['selects']), 'drop-down')} on this page "
                f"{plural(len(m['selects']), 'offers', 'offer')} a fixed list of cases. A value "
                f"that is not on the list cannot be entered, and the nearest option is not always "
                f"a good substitute.")
        if m["dates"]:
            limits.append("Dates are handled as whole calendar days in the time zone of the "
                          "browser, so a birth date or a deadline is compared date to date "
                          "rather than as a span of hours.")
        if m["with_units"]:
            limits.append("The unit chips cover the units listed on the page. A historical or "
                          "regional unit that is missing can still be used by converting it to a "
                          "listed unit first.")
        limits.append("The calculator reports what the relationship implies; it does not judge "
                      "whether the inputs themselves are sensible, so a figure that is out by a "
                      "factor of ten will produce an answer that is out by the same factor.")
        if not m["eq"]:
            limits.append("There is nothing to invert here: the result is produced in one "
                          "direction only, from the values you supply.")
        sections.append(section("Limits worth knowing",
                                para(f"Every tool draws a boundary somewhere. For the {name} "
                                     f"calculator, these are the ones that matter:"),
                                ul(limits)))

    if page_words() < 950:
        checks = []
        if m["inputs"]:
            first = strip_qualifier(lc(m["inputs"][0]["label"]))
            checks.append(f"Change one input at a time — {first} for instance — and watch "
                          f"which results move. A result that stays put does not depend on it.")
        checks.append("Try a round value you can work out in your head. If the answer matches "
                      "your mental arithmetic, the inputs are on the scale you assumed.")
        checks.append("Switch the units to the ones you normally use and confirm the numbers are "
                      "unchanged apart from their label; if they are not, a chip was on the "
                      "wrong setting." if m["with_units"] else
                      "Re-enter the same figure, press Calculate and confirm the result is "
                      "stable; a number that moves between presses is a sign that a field is "
                      "still empty.")
        sections.append(section("How to check an answer yourself", ul(checks)))

    # ---- 10. related -------------------------------------------------------
    rel = related_section(m, siblings, cat.replace("-", " "))
    if rel:
        sections.append(section("Related calculators", rel))

    # ---- FAQ ---------------------------------------------------------------
    faq = []
    if primary_readable:
        faq.append({
            "q": f"What does the {name} calculator work out?",
            "a": (f"It returns {out_phrase}"
                  + (f", derived from {join_list(named_inputs[:3])}" if named_inputs else "")
                  + ". Every field in the form feeds the same relationship: press Calculate once "
                    "and changing any of them updates the result immediately, with no page reload.")})
    faq.append({
        "q": f"What do I need to enter to use the {name} calculator?",
        "a": ("The form asks for " + (join_list(named_inputs[:5]) if named_inputs else "a few values")
              + f", which is {len(inputs)} {plural(len(inputs), 'field')} in total. Each one is "
                "labelled with what it means and, where relevant, the unit it expects. Anything "
                "you leave blank is treated as the value to solve for.")})
    if m["with_units"]:
        f = m["with_units"][0]
        u = m["unit_of"](f)
        faq.append({
            "q": f"Can I enter {lc(f['label'])} in a different unit?",
            "a": (f"Yes. {ucfirst(lc(f['label']))} opens in {u['default_full']} and the chip beside "
                  f"it offers {u['count']} {plural(u['count'], 'unit')}. The number you typed keeps "
                  f"its magnitude and only its label changes; the calculation itself happens in a "
                  f"common base unit, so mixing systems in one form is safe.")})
    if m["solve_dirs"] >= 2:
        faq.append({
            "q": "Can I use it backwards?",
            "a": ("Yes. Each variable in the relationship can be the one being solved for: fill in "
                  "the answer you are aiming at, leave the field you want empty, and the calculator "
                  "inverts the equation for you.")})
    if m["selects"]:
        faq.append({
            "q": "How much do the drop-down choices change the answer?",
            "a": (f"There {plural(len(m['selects']), 'is one choice', 'are several choices')} to make "
                  f"({len(m['selects'])} in total), and each one selects a different case rather than "
                  f"scaling the result. Switching a single option and watching the result is the "
                  f"fastest way to see how much that choice is worth.")})
    if ex and ex.get("outputs"):
        o = ex["outputs"][0]
        faq.append({
            "q": "What is a typical result?",
            "a": (f"With the values the page starts from, the calculator reports "
                  f"{tidy_label(o['label'])} = {fmt_value(o['value'], o.get('unit', ''))}. Treat that as a "
                  f"reference point rather than a recommendation: it exists so you can tell at a "
                  f"glance whether your own inputs are on the same scale.")})
    faq.append({
        "q": f"Is the {name} calculator free to use?",
        "a": ("Yes — no account, no sign-up and no limit on how many times you run it. The "
              "arithmetic happens in your browser, so the values you type are not sent anywhere.")})

    # ---- metadata ----------------------------------------------------------
    better = [n for n in named_inputs[:2] if n.strip().lower() not in
              ("from", "to", "between", "start", "end")]
    what = out_phrase if primary_readable else "your result"
    if better:
        desc = (f"{name}: work out {what} from {join_list(uniq(better))}. A free "
                f"{cat.replace('-', ' ')} calculator with the formula, units and a worked example.")
    else:
        # No readable input labels (the reference names them `baked_goods_hidden`
        # and the like). The page can still describe itself honestly — how many
        # fields it has and what comes out of it — instead of falling back to one
        # boilerplate sentence on 525 pages.
        outputs_ = [tidy_label(f["label"]) for f in m["fields"]
                    if f["vt"] in ("dependent", "answer") and field_readable(f)]
        outputs_ = uniq([o for o in outputs_ if o])[:2]
        n_in = sum(1 for f in m["fields"] if f["vt"] not in ("dependent", "answer"))
        n_out = sum(1 for f in m["fields"] if f["vt"] in ("dependent", "answer"))
        cat_words = cat.replace("-", " ")
        vals = plural(n_in, "one value", f"{n_in} values")
        res  = plural(n_out, "one result", f"{n_out} results")
        if outputs_:
            outs = join_list([lc(o) for o in outputs_])
            desc = rng.choice([
                f"{name}: work out {outs} from {vals}. A free {cat_words} calculator with the "
                f"formula and a worked example.",
                f"{name} turns {vals} into {outs}. Free {cat_words} calculator, formula and "
                f"worked example included.",
                f"{name}: fill in {vals} and read {outs} instantly — a free {cat_words} "
                f"calculator with the formula shown.",
            ])
        elif n_out > 0:
            desc = rng.choice([
                f"{name}: a {cat_words} calculator with {vals} in and {res} out, plus the "
                f"formula and a worked example.",
                f"{name} takes {vals} and returns {res} — a free {cat_words} calculator with "
                f"the formula shown.",
            ])
        else:
            # script-driven pages declare no result field; saying "0 results" would
            # be both wrong and ugly
            desc = rng.choice([
                f"{name}: a free {cat_words} calculator that walks you through {vals}, with the "
                f"formula spelled out and a worked example.",
                f"{name}: answer {vals} and press Calculate — formula and worked example "
                f"included.",
            ])

    if converter:
        pair = [strip_qualifier(f["label"]) for f in m["fields"] if field_readable(f)][:2]
        if len(pair) == 2:
            desc = (f"{name}: convert {lc(pair[0])} to {lc(pair[1])} instantly — the exact "
                    f"factor, a conversion table and no sign-up.")
    desc = WS.sub(" ", strip_emoji(desc))
    if len(desc) > 158:
        desc = desc[:155].rsplit(" ", 1)[0] + "…"

    title_variants = [
        f"{name} Calculator",
        f"{name} Calculator — Formula, Units & Example",
        f"{name} Calculator: Free, With Steps",
        f"{name} — Free Online Calculator",
    ]
    title = rng.choice(title_variants)
    if len(title) > 62:
        title = f"{name} Calculator"
    if len(title) > 62:
        title = (f"{name[:52].rsplit(' ', 1)[0]} … Calculator" if " " in name[:52]
                 else f"{name[:52]} Calculator")

    words = len(plain(summary).split()) + sum(len(plain(s["html"]).split()) for s in sections)
    words += sum(len((q["q"] + " " + q["a"]).split()) for q in faq)

    return {
        "path": path, "slug": rec.get("slug"), "cat": cat, "name": name,
        "seoTitle": title, "seoDesc": desc,
        "h1": f"{name} Calculator",
        "summary": strip_emoji(summary), "sections": sections, "faq": faq,
        "related": siblings, "words": words,
    }


# --------------------------------------------------------------------------- #
# driver
# --------------------------------------------------------------------------- #

def load_units():
    p = CALC / "units.json"
    return json.loads(p.read_text()) if p.exists() else {}


def load_records():
    seen = {}
    for f in sorted(CALC.glob("batch-*.ndjson")):
        for line in f.read_text().splitlines():
            if not line.strip():
                continue
            try:
                r = json.loads(line)
            except json.JSONDecodeError:
                continue
            seen[r["path"]] = r
    return list(seen.values())


def main():
    ap = argparse.ArgumentParser()
    ap.add_argument("--limit", type=int, default=0)
    ap.add_argument("--cat", default="")
    ap.add_argument("--force", action="store_true")
    ap.add_argument("--paths", default="", help="comma-separated paths to rebuild")
    args = ap.parse_args()

    units = load_units()
    recs = load_records()
    examples = json.loads(EXAMPLES.read_text()) if EXAMPLES.exists() else {}
    if args.cat:
        recs = [r for r in recs if r.get("cat") == args.cat]
    if args.limit:
        recs = recs[: args.limit]
    if args.paths:
        want = {p.strip() for p in args.paths.split(",") if p.strip()}
        recs = [r for r in recs if r.get("path") in want]
    print(f"records: {len(recs)}  units: {len(units)}  examples: {len(examples)}")

    # siblings for the "related calculators" section, same category
    by_cat: dict[str, list[dict]] = {}
    for r in recs:
        by_cat.setdefault(r.get("cat") or "other", []).append(
            {"path": r["path"], "name": clean(r.get("name")) or camel(r.get("slug", ""))})

    written = skipped = 0
    descs: dict[str, list[str]] = {}
    word_list = []
    for i, rec in enumerate(recs):
        cat = rec.get("cat") or "other"
        dest = OUT / cat / f"{rec.get('slug')}.json"
        if dest.exists() and not args.force:
            skipped += 1
            doc = json.loads(dest.read_text())
        else:
            pool = by_cat[cat]
            others = [s for s in pool if s["path"] != rec["path"]]
            if others:
                start = i % len(others)
                sib = [others[(start + k) % len(others)] for k in range(min(3, len(others)))]
            else:
                sib = []
            doc = build(rec, units, sib, examples.get(rec["path"]))
            dest.parent.mkdir(parents=True, exist_ok=True)
            dest.write_text(json.dumps(doc, ensure_ascii=False, indent=1))
            written += 1
        descs.setdefault(doc["seoDesc"], []).append(doc["path"])
        word_list.append(doc.get("words", 0))

    dups = {k: v for k, v in descs.items() if len(v) > 1}
    word_list.sort()
    if word_list:
        med = word_list[len(word_list) // 2]
        print(f"words  min {word_list[0]}  median {med}  max {word_list[-1]}")
    print(f"written {written}  kept {skipped}  duplicate descriptions {len(dups)}")
    for k, v in list(dups.items())[:5]:
        print("  dup:", v[:3])


if __name__ == "__main__":
    main()
