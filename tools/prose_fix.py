#!/usr/bin/env python3
"""prose_fix.py — repair the sentences the harvest generator left broken.

`tools/prose_check.py` finds three families of damage in `data/content/**`. This
script fixes two of them and then re-checks. It never invents a fact: every
replacement either states what the widget actually does today, or quotes a field
label that is on the page's own form.

  1. **An identifier instead of a field name.** The generator wrote the variable
     name into the sentence — "returns <strong>years diff</strong>", "Output
     label1", "pathlength" — while the form itself shows "Years difference",
     "Output label 1", "Path length". The label on the definition wins.

  2. **A claim that the page updates live.** 734 pages carried

         Because the result is recalculated when you press Calculate — and on
         every edit after that — you can nudge one input at a time…

     which stopped being true when the Calculate button started gating results:
     an edit now takes the panel off screen until Calculate is pressed again.
     The replacement says what happens now, and is varied per page so the
     catalogue does not read as one paragraph repeated 734 times.

  3. **A field label dropped into a sentence as a noun.** Twelve date
     calculators opened with "Supply the from and the time between and the 180
     day calculator solves for the answer." The labels are `From` and `Time
     between`; the sentence is rebuilt around them.

  python3 tools/prose_fix.py            # report what would change
  python3 tools/prose_fix.py --apply    # write, then rebuild the offset manifest
"""
from __future__ import annotations

import argparse
import glob
import json
import re
import subprocess
import sys
import importlib.util
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent
CALC = ROOT / "php-clone" / "data" / "calc"
CONTENT = ROOT / "php-clone" / "data" / "content"

def _load_prose_check():
    spec = importlib.util.spec_from_file_location("prose_check", Path(__file__).with_name("prose_check.py"))
    module = importlib.util.module_from_spec(spec)
    spec.loader.exec_module(module)
    return module


prose_check = _load_prose_check()

LIVE_CLAIM = (
    "Because the result is recalculated when you press Calculate — and on every edit after that — "
    "you can nudge one input at a time and watch how much the answer really depends on it."
)
# Every variant is true of the current widget: an edit takes the results off the
# screen, and pressing Calculate brings them back updated.
LIVE_VARIANTS = [
    "Change one value and the results step aside until you press Calculate again, which is what "
    "makes it easy to see how much the answer really depends on that one input.",
    "The results leave the screen the moment you edit a field; press Calculate and they come back "
    "updated, so a single changed input shows its own effect.",
    "Editing anything puts the results away until the next press of Calculate — change one value at "
    "a time and the updated answer tells you what that value was worth.",
    "Nothing repaints underneath you: edit a field, press Calculate, and the new answer appears. "
    "That is how you find out which input the result is sensitive to.",
    "Press Calculate for the answer; change a value and it steps off screen until you press again, "
    "so each edit can be judged on its own.",
    "The panel waits for the button. Edit a field, press Calculate, and compare — one input at a "
    "time is enough to see what drives the answer.",
]

# The twelve date calculators whose opener names raw labels. Each gets its own
# sentence, built from the labels the form actually shows.
OPENER_FIXES = {
    "/everyday-life/100-day": (
        "The 100 day calculator counts the distance between two dates — the From date and the "
        "Time between — and reports it in the unit you pick.",
        "Give the 100 day calculator the From date and the Time between it should measure, and it "
        "reports the answer in days, weeks or months.",
        "Working from a start date and the Time between, the 100 day calculator answers a question "
        "that comes up whenever something is planned 100 days out.",
    ),
    "/everyday-life/180-day": (
        "Supply the From date and the Time between you want measured and the 180 day calculator "
        "returns the answer, in whichever unit the chips are set to.",
        "The 180 day calculator takes a start date and the Time between it should cover, then "
        "reports the result with the counting rule spelled out below.",
        "Two fields drive it — the From date and the Time between — and the 180 day calculator "
        "turns them into a single number of days.",
    ),
    "/everyday-life/30-day": (
        "Supply the From date and the Time between and the 30 day calculator works out the answer, "
        "counting the way the checkbox tells it to.",
        "The 30 day calculator measures the gap between the From date and the Time between you "
        "enter, and can include the end date if you tick the box.",
        "Give it a start date and the Time between, and the 30 day calculator reports the answer "
        "with the end-date rule shown underneath.",
    ),
    "/everyday-life/60-day": (
        "Give the 60 day calculator the Time between and the From date it should start from, and it "
        "returns the answer in the unit you choose.",
        "The 60 day calculator turns a From date plus a Time between into one figure, and prints "
        "the counting rule it used.",
        "Set the From date, set the Time between, and the 60 day calculator reports how many days "
        "that actually is.",
    ),
    "/everyday-life/90-day": (
        "Give the 90 day calculator the From date and the Time between and it returns the answer, "
        "with the arithmetic printed further down the page.",
        "The 90 day calculator works from a start date and the Time between you supply, so you can "
        "check the count by hand afterwards.",
        "A From date and a Time between are all the 90 day calculator asks for; the rest is "
        "arithmetic it shows its working for.",
    ),
    "/everyday-life/add-days": (
        "Supply the From date and the Time between and the Add days calculator returns the date "
        "that lands at the end of it.",
        "The Add days calculator moves forward from the From date by the Time between you enter and "
        "names the day it lands on.",
        "Give it a From date and a Time between and the Add days calculator tells you which date "
        "falls that many days later.",
    ),
    "/everyday-life/day-counter": (
        "The Day counter calculator counts from the From date across the Time between you set, and "
        "reports the total in days.",
        "Give the Day counter calculator a From date and a Time between and it answers with the "
        "count, end date included or not as you choose.",
        "The Day counter calculator needs the From date and the Time between; everything else — the "
        "count, the end date, the working — it prints below.",
    ),
    "/everyday-life/days-between-dates": (
        "Supply the From date and the Time between and the Days between dates calculator solves for "
        "the answer, in days, weeks or months.",
        "The Days between dates calculator measures the span between the From date and the Time "
        "between you enter, and prints the formula it used.",
        "Two dates and one rule: the Days between dates calculator takes the From date and the Time "
        "between, then reports the gap.",
    ),
    "/everyday-life/months-between-dates": (
        "The Months between two dates calculator counts from the From date across the Months "
        "between, and reports the answer in whole months.",
        "Supply the From date and the Months between and the Months between two dates calculator "
        "works out how many months that comes to.",
        "Give the Months between two dates calculator a From date and the Months between it should "
        "cover, and it answers with the count.",
    ),
    "/everyday-life/number-days": (
        "The Number of days calculator counts from the From date across the Time between, and "
        "reports the total with the counting rule stated below.",
        "Supply the From date and the Time between and the Number of days calculator works out the "
        "answer, with or without the end date.",
        "Give the Number of days calculator the From date and the Time between and it returns the "
        "count in whichever unit you pick.",
    ),
    "/everyday-life/time-between-dates": (
        "Give the Time between dates calculator the From date and the Time between and it returns "
        "the answer in days, hours or minutes.",
        "The Time between dates calculator measures the span between the From date and the Time "
        "between you supply, and shows the arithmetic underneath.",
        "Set the From date, set the Time between, and the Time between dates calculator reports the "
        "gap.",
    ),
    "/everyday-life/years-between-dates": (
        "Give the Years between two dates calculator the From date and the Years between, and it "
        "returns the span in whole years.",
        "The Years between two dates calculator counts whole years from the From date across the "
        "Years between, and prints the result underneath.",
        "Supply the From date and the Years between and the Years between two dates calculator "
        "reports the number of years that covers.",
    ),
}

# The damage is a *lower-case* "the from": the label was `From`, so a correct
# sentence says "the From date". Matching case-insensitively made this pass
# rewrite its own output on every run.
BROKEN_OPENER_RE = re.compile(
    r"^[^.]*\bthe from\b(?! date)[^.]*?\.(?:\s|$)")


def load_labels() -> dict[str, dict[str, str]]:
    """path -> {variable name: the label the form shows}."""
    out: dict[str, dict[str, str]] = {}
    for shard in sorted(glob.glob(str(CALC / "batch-*.ndjson"))):
        for line in open(shard, encoding="utf-8"):
            if not line.strip():
                continue
            doc = json.loads(line)
            names: dict[str, str] = {}

            def walk(node) -> None:
                if isinstance(node, dict):
                    n, l = node.get("n"), node.get("l")
                    if isinstance(n, str) and n and isinstance(l, str) and l.strip():
                        names.setdefault(n, l.strip())
                    for value in node.values():
                        walk(value)
                elif isinstance(node, list):
                    for value in node:
                        walk(value)

            walk(doc.get("groups"))
            walk(doc.get("vars"))
            out[doc["path"]] = names
    return out


def id_like(name: str) -> bool:
    """A variable name that cannot be mistaken for an ordinary English word.

    `years_diff` and `output_label1` yes; `area` and `weight` no — those are
    ordinary words and rewriting them in prose would break the grammar.
    """
    spaced = name.replace("_", " ")
    if re.search(r"\d", spaced):
        return True
    if ("_" in name) and re.search(r"\b(diff|eq|val|vals|cred|cb|oce)\b", spaced):
        return True
    if " " not in spaced and len(spaced) > 8 and not re.search(r"[aeiou]{2}", spaced):
        return True
    return False


EMOJI_RE = re.compile("[\\U0001F000-\\U0001FAFF\\u2600-\\u27BF\\u2B00-\\u2BFF\\uFE0F]")


def clean_label(label: str) -> str:
    """A label as it belongs in a sentence.

    Two things come off. The icon the form shows next to it, and the trailing
    colon that `label_clean` adds to a label ending on a preposition, because on
    a form "Time between:" is a prompt but in a sentence "works out <strong>Time
    between:</strong> straight away" is a typo.
    """
    text = re.sub(r"\s{2,}", " ", EMOJI_RE.sub("", label)).strip()
    return text.rstrip(": ").strip()


def fix_text(text: str, labels: dict[str, str], variant: int,
             junk_labels: dict[str, str] | None = None) -> str:
    if LIVE_CLAIM in text:
        text = text.replace(LIVE_CLAIM, LIVE_VARIANTS[variant % len(LIVE_VARIANTS)])

    # A bullet that reads "<strong>Dif 60 mdl</strong>: a plain number with no
    # unit attached." says nothing in its bold half. The description is the
    # useful part, so the identifier prefix goes and the sentence keeps standing.
    def unbold(match: re.Match) -> str:
        label = match.group(1)
        if not junk_labels or junk_labels.get(label.strip().lower()):
            tail = match.group(2)
            return "<li>" + (tail[0].upper() + tail[1:] if tail else tail)
        return match.group(0)

    if junk_labels is not None:
        text = re.sub(r"<li><strong>([^<]+)</strong>:\s*([^<]*)", unbold, text)
        # three placeholder fields often carried the same one-line description;
        # once the identifier prefix is gone that is the same sentence three
        # times, so the repeats collapse.
        before = None
        while before != text:
            before = text
            text = re.sub(r"(<li>[^<]{4,80}</li>)\s*<li>\1</li>", r"\1", text)

    # A generator run that counted past its field list: "turns the time 1, the
    # time 2, the time 3 and the time 4 into the answer" when the form has
    # twenty. Cut back to the first two, which the page does have.
    def trim_list(match: re.Match) -> str:
        head, items, tail = match.group(1), match.group(2), match.group(3)
        parts = [i.strip() for i in re.split(r",\s*and\s+|,\s*|\s+and\s+", items) if i.strip()]
        parts = [i for i in parts if i.lower().startswith(("the ", "a ", "an "))]
        parts = [i.strip() for i in re.split(r",\s*and\s+|,\s*|\s+and\s+", items) if i.strip()]
        base = re.sub(r"\s*\d+$", "", parts[0]).strip()
        if len(parts) > 2 and len({re.sub(r"\s*\d+$", "", x).strip() for x in parts}) == 1:
            return f"{head}{parts[0]} and {parts[1]}{tail}"
        if len(parts) > 3:
            return f"{head}" + ", ".join(parts[:2]) + f" and more{tail}"
        return match.group(0)

    text = re.sub(r"(turns )(.{8,160}?)( into | to )", trim_list, text)

    # The date calculators' first field is labelled `From`. A sentence that
    # quotes the label without saying what it is reads as a typo: "you give the
    # from; then you type in the time between". On the form it is a date.
    text = re.sub(r"\bthe from\b(?! date| the)", "the From date", text)

    # Two template fragments that both ended with "converter" / "calculator"
    # produced "the Acres to hectares converter converter changes a value" and
    # "the Plasma osmolality calculator calculator works out". Collapsing the
    # repeat is exact: the word is already there, twice.
    text = re.sub(r"\b(converter|calculator)\s+\1\b", r"\1", text, flags=re.I)
    text = re.sub(r"\bconverter calculator\b", "converter", text, flags=re.I)
    text = re.sub(r"\b([A-Za-z]{2,})\s+\1\b", r"\1", text)
    # "2 options, such as and and or" — a list joined with "and" where the items
    # were themselves "and" and "or".
    text = re.sub(r"such as and and or", "such as and, or", text)

    # a bolded label that kept its form-side colon
    text = re.sub(r"<strong>([^<:]+?):</strong>", r"<strong>\1</strong>", text)

    for name, raw_label in labels.items():
        label = clean_label(raw_label)
        if not label:
            continue
        spaced = name.replace("_", " ")
        if label.lower() == spaced.lower():
            continue
        # Only a *bolded* run is a label slot in this prose — "returns
        # <strong>years diff</strong>". Replacing bare words was tried and
        # abandoned: "the absorbance at λmax" became "the Absorbance at λmax at
        # λmax", and "antibonding electrons" became "Antibonding electrons
        # electrons". The bold tag is what makes the intent unambiguous.
        pattern = re.compile(r"(<strong>\s*)" + re.escape(spaced) + r"(\s*</strong>)", re.I)
        text = pattern.sub(lambda m, lab=label: m.group(1) + lab + m.group(2), text)
        # A name that carries a digit cannot be an ordinary word, so it is safe
        # to fix wherever it stands ("Output label1").
        if re.search(r"\d", spaced) and id_like(name):
            pattern = re.compile(r"(?<![\w>-])" + re.escape(spaced) + r"(?![\w<])", re.I)
            text = pattern.sub(lambda m, lab=label: lab, text)
    return text


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--apply", action="store_true")
    args = ap.parse_args()

    labels_by_path = load_labels()
    all_ids = prose_check.load_identifiers()
    corpus_vocab = prose_check.corpus_vocabulary()
    files_changed = 0
    live_fixed = 0
    openers_fixed = 0
    ids_fixed = 0

    for path in sorted(glob.glob(str(CONTENT / "**" / "*.json"), recursive=True)):
        raw = Path(path).read_text(encoding="utf-8")
        doc = json.loads(raw)
        page = doc.get("path") or ""
        labels = labels_by_path.get(page, {})
        ids = prose_check.load_identifiers().get(page, set()) if False else all_ids.get(page, set())
        vocab = corpus_vocab
        junk: dict[str, str] = {}
        for label in set(labels.values()):
            reason = prose_check.junk_label_reason(label, ids, vocab)
            if reason:
                junk[label.strip().lower()] = reason
        variant = sum(ord(c) for c in page)
        summary = doc.get("summary") or ""
        new_summary = fix_text(summary, labels, variant, junk)

        if page in OPENER_FIXES and BROKEN_OPENER_RE.match(new_summary):
            options = OPENER_FIXES[page]
            new_summary = BROKEN_OPENER_RE.sub(
                options[variant % len(options)] + " ", new_summary, count=1)
            openers_fixed += 1

        if new_summary != summary:
            if LIVE_CLAIM in summary:
                live_fixed += 1
            if any(i in summary for i in ()):
                ids_fixed += 1
            doc["summary"] = new_summary

        for section in doc.get("sections") or []:
            if not isinstance(section, dict):
                continue
            html = section.get("html") or ""
            fixed = fix_text(html, labels, variant, junk)
            if fixed != html:
                if LIVE_CLAIM in html:
                    live_fixed += 1
                section["html"] = fixed

        out = json.dumps(doc, ensure_ascii=False, indent=2) + "\n"
        if out != raw:
            files_changed += 1
            if args.apply:
                Path(path).write_text(out, encoding="utf-8")

    print(f"content files changed : {files_changed}")
    print(f"live-update claims    : {live_fixed}")
    print(f"broken openers        : {openers_fixed}")
    if args.apply:
        print("\nrebuilding the offset manifest …")
        subprocess.run([sys.executable, str(ROOT / "tools" / "build_manifest.py")], check=False)
    else:
        print("\n(dry run — pass --apply to write)")
    return 0


if __name__ == "__main__":
    sys.exit(main())
