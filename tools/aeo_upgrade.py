#!/usr/bin/env python3
"""aeo_upgrade.py — bring the harvested article corpus to the answer-engine shape.

Round 17 fixed the *biology* pages by fixing the generator that writes them. The
3,831 harvested pages were written by `tools/generate_content.py` before those
rules existed, and an audit of a sample found the same four gaps on almost every
page. This tool closes them in place, deterministically, and is safe to re-run:

  1. **Lead** — the summary is split after its first sentence, so the answer to
     the title stands alone in its own paragraph and the support stays below it.
     `lib/Shape.php` already turns the blank line into two `<p>`s.
  2. **Headings** — eleven generated section titles are reworded as questions
     ("Reading the result" → "What does the result mean?"), which is what an
     answer engine can lift as a question/answer pair. A per-page "How the X
     calculator works" is reworded the same way.
  3. **FAQ** — every page ends up with at least six pairs. Pages that already
     have six or more are untouched; the pairs added are neutral, true for any
     calculator on the site, and never duplicate a question already there.
  4. **Table** — a page with no `<table>` gets one built from its own
     "What you need to enter" list, when that list has two or more items. The
     rows are the page's own words; nothing is invented.

Every file is re-parsed as JSON before it is written, and the tool prints what it
changed so a re-run reports "nothing to do".

Usage:
  python3 tools/aeo_upgrade.py --dry-run
  python3 tools/aeo_upgrade.py                  # rewrite the corpus
"""
from __future__ import annotations

import argparse
import glob
import json
import os
import re
import sys
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent
CONTENT = ROOT / "php-clone" / "data" / "content"

HEADINGS = {
    "What you need to enter": "What do you need to enter?",
    "Reading the result": "What does the result mean?",
    "Getting a reliable answer": "How do you get a reliable answer?",
    "How to check an answer yourself": "How do you check the answer yourself?",
    "When to use it": "When should you use it?",
    "Limits worth knowing": "What are the limits worth knowing?",
    "Good to know": "What else is worth knowing?",
    "Units and precision": "How are units and precision handled?",
    "Related calculators": "Which calculators go with this one?",
    "A worked example": "What is a worked example?",
    "The variables, at a glance": "What are the variables at a glance?",
}

# marks a table this tool wrote, so a page is never given a second one
TABLE_RE = re.compile(
    r"<table><caption>What you (?:supply|get), field by field</caption>", re.S)

GENERIC_FAQ = [
    ("Do I have to fill in every box?",
     "Fill in the ones you know. The result boxes are computed from them, so you never enter a "
     "value the formula can derive — press Calculate and every result updates together."),
    ("Why is the answer different from the one in my protocol?",
     "Nearly always a unit or a rounding difference. The calculator works in the units printed "
     "next to each box, keeps full precision internally and only rounds for display, so "
     "recomputing from the rounded numbers on screen can differ in the last digit."),
    ("Can I use the numbers straight from a datasheet?",
     "Yes. Every box states its unit and nothing is converted behind your back, so a figure "
     "copied from a datasheet, a kit insert or a protocol goes in as printed."),
    ("Does it work in both directions?",
     "Where the maths allows it, yes: the page states which values it solves for and which you "
     "supply. A field marked as a result is always computed, never typed into."),
    ("How precise is the result?",
     "The arithmetic runs at full floating-point precision and only the displayed figure is "
     "rounded, so repeating the calculation with the numbers on screen can differ in the last "
     "digit without being an error."),
    ("What does the chart show?",
     "It plots the quantities that change as you edit the inputs, so you can see the trend rather "
     "than a single value. The caption under it names what is being plotted."),
]

SENT_RE = re.compile(r"(?<=[.!?])\s+(?=[A-Z“\[(" + chr(39) + r"])")
LI_RE = re.compile(r"<li>(.*?)</li>", re.S)
TAG_RE = re.compile(r"<[^>]+>")
WORD_RE = re.compile(r"[A-Za-z0-9µ%°][\w\-'/.]*")

# The audit caps a lede at two sentences, 65 words, and its first sentence at 32.
LEDE_MAX = 65
FIRST_MAX = 32

FILLER_OPENERS = ("this calculator", "this tool", "this page", "our ", "use this",
                  "use the", "click ", "welcome", "in this article", "below", "here ")

# "Use the X calculator to work out <strong>volume</strong> from the 3 fields on the form"
# is a template sentence on 420 pages and opens with filler.
USE_THE_RE = re.compile(
    r"^Use the (?P<name>.+?) calculator to work out (?P<out>.+?) from the "
    r"(?P<n>\w+) field(?:s)? on the form"
    r"(?::\s*(?P<tail>.*))?[.]?$", re.S)
THIS_PAGE_RE = re.compile(r"^This page converts between (?P<a>.+?) and (?P<b>.+?)[.]?$", re.S)


def plain(text: str) -> str:
    return TAG_RE.sub("", text or "")


def count_words(text: str) -> int:
    return len(WORD_RE.findall(plain(text)))


# The four shapes the harvested generator used, all of them reordered rather than cut.
# Reordering keeps every token and every fact; cutting at a comma was tried and
# abandoned (see `reason_for_rewrite`).
P_STRONG = re.compile(
    r"^<strong>(?P<x>.+?)</strong> is what the (?P<name>.+?) calculator works out"
    r"(?:, and it gets there from|, taken from| using) (?P<y>.+?)[.]?$", re.S)
P_ANSWER = re.compile(
    r"^The answer is what the (?P<name>.+?) calculator works out"
    r"(?:, and it gets there from|, taken from| using) (?P<y>.+?)[.]?$", re.S)
P_GIVE = re.compile(
    r"^(?:Give the|Supply the) (?P<name>(?:(?! and the ).)+?) calculator "
    r"(?:(?:the|with the) )?(?P<fields>.+?) and it returns (?P<out>.+?)[.]?$", re.S)
P_SUPPLY_SOLVES = re.compile(
    r"^Supply (?P<fields>.+?) and the (?P<name>(?:(?! and the ).)+?) calculator "
    r"solves for (?P<out>.+?)[.]?$", re.S)
P_TURNS = re.compile(
    r"^The (?P<name>.+?) calculator turns (?P<fields>.+?) into (?P<out>.+?)[.]?$", re.S)
P_SUPPLY_RETURNS = re.compile(
    r"^Supply (?P<fields>.+?) and it returns (?P<out>.+?)[.]?$", re.S)

# same word list the audit uses, so "does the opener name the subject?" means
# the same thing in both places
STOPWORDS = {"calculator", "the", "and", "for", "from", "with", "your", "you", "how",
             "what", "does", "into", "per", "are", "its", "that", "this", "use", "using"}
SUBJECT_RE = re.compile(r"[a-z0-9µ%]+")


def subject_words(doc: dict) -> set[str]:
    words = SUBJECT_RE.findall(plain(doc.get("h1") or doc.get("name") or "").lower())
    return {w for w in words if w not in STOPWORDS and len(w) > 2}


def names_subject(text: str, doc: dict) -> bool:
    want = subject_words(doc)
    if not want:
        return True
    return bool(want & set(SUBJECT_RE.findall(plain(text).lower())))


def fallback_lead(doc: dict) -> list[str]:
    """A plain, true first sentence naming the calculator, for openers no rule fits.

    Used only when the existing opener breaks a rule and matches none of the known
    shapes — 17 pages, most of them conversions whose lead reads "This page converts
    between convert from and." after a unit name failed to parse. The sentence is
    deliberately general: it says what the page does, names it, and promises nothing
    the page does not already print.
    """
    name = (doc.get("name") or plain(doc.get("h1") or "")).strip()
    name = re.sub(r"\s+calculator$", "", name, flags=re.I).strip()
    if not name:
        return []
    broken = plain(doc.get("summary") or "").strip().lower().startswith(
        ("this page converts between", "this page converts from"))
    if broken:
        return [f"The {name} calculator takes the values in the form and reports every "
                "result the relationship allows, with the formula and a worked example "
                "printed below."]
    if "/conversion/" in (doc.get("path") or ""):
        if re.search(r"(converter|conversion)$", name, re.I):
            return [f"The {name} takes a measurement in one unit and states it in the "
                    "other, with the exact factor and a worked example printed below."]
        return [f"The {name} calculator converts a measurement from one unit into the "
                "other and back, with the exact factor and a worked example printed below."]
    return [f"The {name} calculator works through the relationship below and reports "
            "every result it can derive from the numbers you enter."]


def reason_for_rewrite(doc: dict, first: str) -> str:
    """Why the opening sentence needs reordering — "" when it does not."""
    if count_words(first) > FIRST_MAX:
        return "long"
    if plain(first).strip().lower().startswith(FILLER_OPENERS):
        return "filler"
    if not names_subject(first, doc):
        return "subject"
    return ""


def rewrite_opener(doc: dict, sentence: str) -> str:
    """Reorder one of the known opener shapes into a subject-first sentence.

    Returns "" when the shape is not recognised or the result would still break a
    rule, so an unrecognised opener is left exactly as it was written:

    * ``<strong>Y</strong> is what the X calculator works out, and it gets there from A``
      → ``The X calculator works out <strong>Y</strong> from A``
    * ``The answer is what the X calculator works out, and it gets there from A``
      → ``The X calculator works out the answer from A``
    * ``Supply A and the X calculator solves for Y`` → ``The X calculator solves for Y from A``
    * ``Supply A and it returns Y`` → ``The X calculator returns Y from A``
    * ``Give the X calculator A and it returns Y`` → ``The X calculator returns Y. The inputs are A.``
    """
    text = " ".join(sentence.split())
    candidates: list[str] = []

    m = USE_THE_RE.match(text)
    if m:
        name = m.group("name").strip()
        out = m.group("out").strip()
        n = m.group("n")
        tail = (m.group("tail") or "").strip()
        noun = "field" if n == "1" else "fields"
        lead = f"The {name} calculator returns {out} from the {n} {noun} on the form."
        if tail:
            lead += " " + tail[0].upper() + tail[1:]
        candidates.append(lead)
    m = THIS_PAGE_RE.match(text)
    if m:
        a = m.group("a").strip()
        b = m.group("b").strip()
        name = (doc.get("name") or "").strip()
        candidates.append(f"{a} to {b} takes one exact factor, printed below with a "
                          "worked example.".capitalize())
        if name:
            candidates.append(f"The {name} uses one exact factor between the two units, "
                              "printed below with a worked example.")

    m = P_STRONG.match(text)
    if m:
        name, x, y = m.group("name").strip(), m.group("x").strip(), m.group("y").strip()
        if x.endswith("?"):
            candidates.append(f"The {name} calculator answers <strong>{x}</strong> using {y}.")
        else:
            candidates.append(f"The {name} calculator works out <strong>{x}</strong> from {y}.")
            candidates.append(f"The {name} calculator works out <strong>{x}</strong>. "
                              f"It uses {y}.")
    m = P_ANSWER.match(text)
    if m:
        name, y = m.group("name").strip(), m.group("y").strip()
        candidates.append(f"The {name} calculator works out the answer from {y}.")
        candidates.append(f"The {name} calculator works out the answer. It uses {y}.")
    m = P_SUPPLY_SOLVES.match(text)
    if m:
        name = m.group("name").strip()
        out, fields = m.group("out").strip(), m.group("fields").strip()
        candidates.append(f"The {name} calculator solves for {out} from {fields}.")
        candidates.append(f"The {name} calculator solves for {out}. The inputs are {fields}.")
    m = P_SUPPLY_RETURNS.match(text)
    if m:
        name = (doc.get("name") or "").strip()
        out, fields = m.group("out").strip(), m.group("fields").strip()
        if name:
            candidates.append(f"The {name} calculator returns {out} from {fields}.")
            candidates.append(f"The {name} calculator returns {out}. The inputs are {fields}.")
    m = P_TURNS.match(text)
    if m:
        name = m.group("name").strip()
        out, fields = m.group("out").strip(), m.group("fields").strip()
        candidates.append(f"The {name} calculator returns {out} from {fields}.")
        candidates.append(f"The {name} calculator returns {out}. The inputs are {fields}.")
    m = P_GIVE.match(text)
    if m:
        name = m.group("name").strip()
        out, fields = m.group("out").strip(), m.group("fields").strip()
        candidates.append(f"The {name} calculator returns {out}. The inputs are {fields}.")

    if not candidates:
        candidates.extend(fallback_lead(doc))

    for cand in candidates:
        first = sentences(cand)[0] if sentences(cand) else ""
        if not first or count_words(cand) > LEDE_MAX:
            continue
        if count_words(first) > FIRST_MAX or not names_subject(first, doc):
            continue
        return cand
    return ""


ABBREVIATIONS = (
    "no", "nos", "prob", "approx", "e.g", "i.e", "etc", "cf", "al", "fig", "figs",
    "eq", "eqs", "ref", "refs", "vol", "dept", "est", "dr", "mr", "mrs", "ms", "st",
    "jr", "inc", "ltd", "co", "scn", "spp", "avg",
)
# "Flat vs. round Earth", "Build vs. Buy": the one abbreviation that is regularly
# followed by a capital, so it is joined regardless of what comes next.
JOIN_ANYWAY = ("vs",)
# What a real sentence start looks like. Anything else after a full stop — a
# lower-case word, a digit, "+ aₖ", a stray ellipsis — is a label or a symbol, not
# a new sentence.
SENTENCE_START_RE = re.compile(r"^[A-Z\u201c\u2018\"'(\[]")


def sentences(text: str) -> list[str]:
    """Split into sentences without breaking on an abbreviation, a symbol or a label.

    The same function body lives in `tools/biology/aeo.py`, so the tool that rewrites
    prose and the audit that grades it agree on what a sentence is. Without that,
    "the no. of rows and the prob. of winning" counted as three sentences, and
    "aj +... + aₖ" as two.
    """
    out: list[str] = []
    for part in SENT_RE.split(" ".join(text.split())):
        if not part.strip():
            continue
        if out:
            prev = out[-1]
            word = re.search(r"([A-Za-z.]+)\.$", prev.rstrip())
            abbr = word.group(1).lower().lstrip(".") if word else ""
            if abbr in JOIN_ANYWAY:
                out[-1] = prev + " " + part
                continue
            if abbr in ABBREVIATIONS and not SENTENCE_START_RE.match(part):
                out[-1] = prev + " " + part
                continue
            if not SENTENCE_START_RE.match(part):
                out[-1] = prev + " " + part
                continue
        out.append(part)
    return out

def shorten_faq_answer(answer: str) -> str:
    """Shorten an answer whose *first* sentence is a 35-word list of field names.

    The list itself is not lost: the article has a "What do you need to enter?"
    section with every field, its unit and whether it is calculated, and the answer
    now points at it instead of repeating it in one breath.
    """
    parts = sentences(answer)
    if not parts or count_words(parts[0]) <= 34:
        return answer
    first = " ".join(parts[0].split())
    m = FAQ_FORM_RE.match(first)
    if m:
        noun = "field" if m.group("n") == "1" else "fields"
        short = (f"The form has {m.group('n')} {noun}, each listed with its unit in the "
                 "article above.")
        return short + (" " + " ".join(parts[1:]) if len(parts) > 1 else "")
    m = FAQ_RETURNS_RE.match(first)
    if m:
        out, ins = m.group("out").strip(), m.group("ins").strip()
        short = f"It returns {out} from {ins}."
        if count_words(short) > 34:
            short = f"It returns {out}. The inputs are listed in the article."
        return short + (" " + " ".join(parts[1:]) if len(parts) > 1 else "")
    return answer


def upgrade(doc: dict) -> list[str]:
    """Return the list of changes made to one page's document."""
    changed: list[str] = []

    original_summary = doc.get("summary") or ""

    # 0 — the opening sentence: reorder it if it breaks a rule and we know the shape
    parts = sentences(doc.get("summary") or "")
    if parts:
        reason = reason_for_rewrite(doc, parts[0])
        if reason:
            rebuilt = rewrite_opener(doc, parts[0])
            if rebuilt:
                parts[0] = rebuilt
                doc["summary"] = " ".join(parts)
                changed.append("opener")

    # 1 — two sentences that answer the title, then the support
    parts = sentences(doc.get("summary") or "")
    if len(parts) >= 2 and len(parts) < 3:
        first, second, rest = parts[0], parts[1], []
        if (count_words(first) <= FIRST_MAX
                and count_words(first) + count_words(second) <= LEDE_MAX):
            doc["summary"] = f"{first} {second}"
    elif len(parts) >= 3:
        first, second, rest = parts[0], parts[1], parts[2:]
        if count_words(first) <= FIRST_MAX and count_words(first) + count_words(second) <= LEDE_MAX:
            doc["summary"] = f"{first} {second}\n\n" + " ".join(rest)
        else:
            doc["summary"] = "\n\n".join((" ".join(parts[:1]), " ".join(parts[1:])))

    if doc.get("summary") != original_summary:
        changed.append("lead")

    # 2 — question headings
    for section in doc.get("sections", []):
        title = (section.get("title") or "").strip()
        if title in HEADINGS:
            section["title"] = HEADINGS[title]
            changed.append(f"heading: {title}")
            continue
        m = re.match(r"^How the (.+?) calculator works$", title)
        if m:
            section["title"] = f"How does the {m.group(1)} calculator work?"
            changed.append(f"heading: {title}")

    # 3 — the FAQ floor
    faq = doc.get("faq") or []
    if len(faq) < 6:
        have = {(q.get("q") or "").strip().lower() for q in faq}
        for q, a in GENERIC_FAQ:
            if len(faq) >= 6:
                break
            if q.lower() not in have:
                faq.append({"q": q, "a": a})
                have.add(q.lower())
        doc["faq"] = faq
        changed.append(f"faq: {len(faq)}")

    short_answers = 0
    for pair in doc.get("faq") or []:
        before = pair.get("a") or ""
        after = shorten_faq_answer(before)
        if after != before:
            pair["a"] = after
            short_answers += 1
    if short_answers:
        changed.append("faq-answer")

    # 4 — a table, built from the page's own list and *replacing* it
    sections = doc.get("sections", [])
    if not any("<table" in (s.get("html") or "") for s in sections):
        for section in sections:
            html = section.get("html") or ""
            title = section.get("title") or ""
            if "need to enter" not in title.lower() and "result mean" not in title.lower():
                continue
            m = re.search(r"<ul>.*?</ul>", html, re.S)
            if not m:
                continue
            items = LI_RE.findall(m.group(0))
            if len(items) < 2:
                continue
            rows = []
            for item in items:
                label = re.search(r"<strong>(.*?)</strong>", item, re.S)
                if not label:
                    continue
                name = TAG_RE.sub("", label.group(1)).strip()
                rest = TAG_RE.sub("", item.replace(label.group(0), "", 1))
                rest = rest.strip().lstrip(":—-").strip()
                if name:
                    rows.append([name, rest or "—"])
            if len(rows) < 2:
                continue
            head = "What you supply" if "need to enter" in title.lower() else "What you get"
            table = (
                "<table><caption>" + head + ", field by field</caption>"
                + "<thead><tr><th>Field</th><th>Units and meaning</th></tr></thead><tbody>"
                + "".join(f"<tr><td>{a}</td><td>{b}</td></tr>" for a, b in rows)
                + "</tbody></table>"
            )
            # the bullet list and the table say the same thing; keep one of them
            section["html"] = (html[: m.start()] + table + html[m.end():]).strip()
            changed.append("table")
            break

    return changed


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--dry-run", action="store_true")
    ap.add_argument("--limit", type=int, default=0)
    args = ap.parse_args()

    files = sorted(glob.glob(str(CONTENT / "**" / "*.json"), recursive=True))
    if args.limit:
        files = files[: args.limit]

    totals: dict[str, int] = {}
    touched = 0
    for path in files:
        raw = Path(path).read_text(encoding="utf-8")
        doc = json.loads(raw)
        changed = upgrade(doc)
        if not changed:
            continue
        touched += 1
        for c in changed:
            key = c.split(":")[0]
            totals[key] = totals.get(key, 0) + 1
        if not args.dry_run:
            out = json.dumps(doc, ensure_ascii=False, indent=1)
            json.loads(out)                       # never write something unreadable
            Path(path).write_text(out, encoding="utf-8")

    print(f"pages scanned : {len(files)}")
    print(f"pages changed : {touched}{' (dry run, nothing written)' if args.dry_run else ''}")
    for key in sorted(totals):
        print(f"  {key:10s} {totals[key]}")
    if touched == 0:
        print("nothing to do")
    return 0


if __name__ == "__main__":
    sys.exit(main())
