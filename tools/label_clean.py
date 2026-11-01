#!/usr/bin/env python3
"""label_clean.py — remove harvest junk from the field labels of the 3,831 definitions.

The definitions in `data/calc/*.ndjson` were captured from the source site, and a few
hundred labels still carry the source page's own plumbing rather than words meant for
a reader. The worst of them reach the screen: the currency converter prints

    From currency ()

because the label was `**From currency** ({{from_currency.fullUnit}})` and nothing
ever replaced that token. Others are quieter: a leading `↳` on a sub-allowance, a
markdown asterisk around a word, `I want to...` with the dots the source used as an
affordance, and `Bin too long eq`, which is an internal variable name.

The pass is mechanical and reversible by rule (it never invents a field name):

  1. `{{field.fullUnit}}`  → the field's own default unit (`du`), else dropped
  2. `**bold**` / `*em*`   → the words, keeping `Y*` and `U*` variable names intact
  3. leading `↳ `          → removed
  4. trailing `...` / `…`  → removed
  5. `Insert your a`       → `Value of a`
  6. `Please enter your X` → `X`
  7. `Bin too long eq`     → `Binary too long to display`

Article prose quotes these labels, so the same substitutions are applied to the
generated content in `data/content/**`. A byte-offset manifest indexes the NDJSON, so
this tool rebuilds it (`tools/build_manifest.py`) after a real run.

  python3 tools/label_clean.py            # report only
  python3 tools/label_clean.py --apply    # rewrite, then rebuild the manifest
"""
from __future__ import annotations

import argparse
import glob
import json
import re
import subprocess
import sys
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent
CALC = ROOT / "php-clone" / "data" / "calc"
CONTENT = ROOT / "php-clone" / "data" / "content"

TOKEN_RE = re.compile(r"\s*\{\{([^}]+)\}\}")
BOLD_RE = re.compile(r"\*\*(.+?)\*\*")
EM_RE = re.compile(r"(?<![\w(])\*([^*\s][^*]*?)\*(?![\w)])")
ARROW_RE = re.compile(r"^[\s\u21b3\u2192>»]+\s*")
DOTS_RE = re.compile(r"(?:\s*(?:\.\.\.|…))+\s*$")
# Words a label should not end on. The source wrote "Calculate using...", "Sort by...",
# "I want to..."; dropping the dots left those hanging, so they take a colon — which
# is what the dots were doing. Single letters ("Coefficient a") are names, not prompts.
DANGLING = {"to", "by", "using", "the", "of", "in", "from", "with", "for", "on", "at",
            "is", "that", "this", "your", "my", "and", "or", "include", "per", "between"}
DANGLING_RE = re.compile(r"\b(" + "|".join(sorted(DANGLING)) + r")$", re.I)
INSERT_RE = re.compile(r"^insert your\s+(.+)$", re.I)
PLEASE_RE = re.compile(r"^please enter your\s+(.+)$", re.I)
EQ_RE = re.compile(r"^(.*?)\s*\btoo long eq\b\s*$", re.I)
# A page-level variable name printed where a field name belongs. The source
# generator kept the identifier as the label, so the form said "Days diff" and
# the article said "returns <strong>years diff</strong>".
DIFF_RE = re.compile(r"^(?P<stem>[A-Za-z][A-Za-z ]*?)\s+diff$", re.I)
# "Number1" / "Output label2" / "Check if octal3": a placeholder with its
# counter welded on. Only these stems — a label like "C1" is notation.
PLACEHOLDER_RE = re.compile(
    r"^(?P<stem>number|input|output|result|select|option|payment|symbol|limits?|limit"
    r"|value|check if [a-z ]+|row|column|table|method|mode|unit)(?P<n>\d+[a-z]?)$", re.I)
# Misspellings the harvested source carried, each seen on the page it appears on.
SPELLINGS = {
    "quinox": "equinox",
    "perecentage": "percentage",
    "mulitiplier": "multiplier",
    "pathlength": "path length",
    "notfullpipe": "not full pipe",
}


TAIL_PAREN_RE = re.compile(r"^(?P<stem>.*?)\s*\(\s*\{\{[^}]+\}\}\s*\)\s*$")
TAIL_TOKEN_RE = re.compile(r"^(?P<stem>.*?)\s*\{\{[^}]+\}\}\s*$")
MID_TOKEN_RE = re.compile(r"^(?P<stem>.*?)\s*\{\{[^}]+\}\}\s*(?P<rest>\(.*\))\s*$")


# Identifiers that survived as labels. The panel shows them and the generated
# article quotes them, so "cycle1" reads as "Cycle 1" in both places — one source
# of truth, fixed once. Only a label that *is* an identifier is touched: the
# notation a truth table needs ("C1", "R2", "T5") is left exactly as it is.
ABBREVIATIONS = {
    "yrs": "years", "yr": "year", "mins": "minutes", "secs": "seconds",
    "hrs": "hours", "temp": "temperature", "conc": "concentration",
    "vol": "volume", "wt": "weight", "ht": "height", "len": "length",
    "dia": "diameter", "qty": "quantity", "pct": "percent", "num": "number",
    "avg": "average", "lab": "laboratory", "bio": "biological",
}
CAMEL_RE = re.compile(r"(?<=[a-z])(?=[A-Z])")
DIGIT_RE = re.compile(r"(?<=[A-Za-z])(?=\d)")
NOTATION_RE = re.compile(r"^[A-Za-z]{1,2}\d+$")


GLUED_DIGIT_RE = re.compile(r"[A-Za-z]\d")


def looks_like_identifier(label: str) -> bool:
    """True for `cycle1`, `nextCycle2`, `time_yrs2`, `Output label1`.

    False for ordinary words and for notation ("C1", "R2", "Holiday 1"), which
    is either correct as written or already spaced.
    """
    text = label.strip().rstrip(": ")
    if not text or NOTATION_RE.match(text):
        return False
    glued = GLUED_DIGIT_RE.search(text)
    if " " in text:
        # a multi-word label is only an identifier when a digit is welded to a
        # word: "Output label1" yes, "Holiday 1" no
        return bool(glued) and len(re.sub(r"[^A-Za-z]", "", text)) >= 3
    if "_" in text or CAMEL_RE.search(text) or glued:
        return len(re.sub(r"[^A-Za-z]", "", text)) >= 3
    return False


def humanise_identifier(label: str) -> str:
    text = label.strip().rstrip(": ")
    text = text.replace("_", " ")
    text = CAMEL_RE.sub(" ", text)
    text = DIGIT_RE.sub(" ", text)
    words = [ABBREVIATIONS.get(w.lower(), w.lower()) for w in text.split()]
    # an acronym keeps its capitals ("FBMI"); an ordinary word does not
    words = [w.upper() if w.isupper() and len(w) > 1 and w not in ABBREVIATIONS.values() else w
             for w in words]
    text = re.sub(r"\s{2,}", " ", " ".join(words)).strip()
    if text and text[0].islower():
        text = text[0].upper() + text[1:]
    return text



# Labels that are shorthand a reader cannot decode, with the expansion each one
# needs. These are per page because the same abbreviation means different things
# on different pages, and they are written out by hand rather than guessed: the
# army fitness events behind MDL/SPT/HRP/LTK/SDC/PLK/TMR are the standard ACFT
# event names, and "pmt"/"bal"/"img" are payment, balance and imaginary part.
PAGE_LABEL_FIXES = {
    "/health/acft": {
        "Dif 60 mdl": "Difference to the deadlift threshold",
        "Dif 60 spt": "Difference to the standing-throw threshold",
        "Dif 60 hrp": "Difference to the push-up threshold",
        "Dif 60 ltk": "Difference to the leg-tuck threshold",
        "Minutes sdc dif": "Sprint-drag-carry difference (minutes)",
        "Seconds sdc dif": "Sprint-drag-carry difference (seconds)",
        "Minutes plk dif": "Plank difference (minutes)",
        "Seconds plk dif": "Plank difference (seconds)",
        "Minutes tmr dif": "Two-mile run difference (minutes)",
        "Seconds tmr dif": "Two-mile run difference (seconds)",
    },
    "/health/apft": {
        "Dif maxp": "Push-up difference",
        "Dif maxr": "Sit-up difference",
        "Dif maxs": "Score difference",
        "Difolt": "Difference from the older test",
    },
    "/finance/balloon-payment": {
        "Pmt loan dif": "Difference in loan payments",
        "Pmt bal dif": "Difference in balances",
    },
    "/finance/fica-tax": {"Fica dif": "Difference in FICA tax"},
    # The harvested definition names this variable `truea` and gives no help
    # text; the page's own formula is the only description of it ("1 ÷ occurrence
    # of the disease"), so the label states what the page knows and no more.
    "/biology/allele-frequency": {"Truea": "Calculated ratio"},
    "/math/complex-number": {
        "Diff real 2": "Difference (real part)",
        "Diff img 2": "Difference (imaginary part)",
    },
}

def clean_label(label: str, default_unit: str = "", page: str = "") -> str:
    """Apply the rules to one label.

    A `{{field.fullUnit}}` token used to render as an empty pair of brackets — the
    currency converter still said "From currency ()". Where the field carries a
    default unit (`du`), the token becomes that unit, in brackets if it stood inside
    brackets; otherwise it is dropped. No unit name is ever invented.
    """
    if page in PAGE_LABEL_FIXES and label.strip() in PAGE_LABEL_FIXES[page]:
        return PAGE_LABEL_FIXES[page][label.strip()]
    text = label
    if "{{" in text:
        if default_unit:
            m = TAIL_PAREN_RE.match(text)
            if m:
                text = f"{m.group('stem').rstrip()} ({default_unit})"
            else:
                m = MID_TOKEN_RE.match(text)
                if m:
                    text = f"{m.group('stem').rstrip()} {default_unit} {m.group('rest')}"
                else:
                    m = TAIL_TOKEN_RE.match(text)
                    text = f"{m.group('stem').rstrip()} {default_unit}" if m else text
        # a bracket holding a token (and at most a unit symbol) disappears whole:
        # "({{swim_length.formattedValue}} m)" is not information, it is plumbing
        def bracket(m: re.Match[str]) -> str:
            rest = m.group(1).strip()
            if not rest:
                return f" ({default_unit})" if default_unit else ""
            return ""
        text = re.sub(r"\(\s*\{\{[^}]+\}\}\s*([^)]*)\)", bracket, text)
        text = TOKEN_RE.sub("", text)
        text = re.sub(r"\(\s*\)", "", text)
        text = re.sub(r"\s+([,.;:])", r"\1", text)
    text = BOLD_RE.sub(r"\1", text)
    text = EM_RE.sub(r"\1", text)
    if ARROW_RE.match(text):
        text = ARROW_RE.sub("", text)
    m = EQ_RE.match(text)
    if m:
        stem = m.group(1).strip() or "Value"
        text = f"{stem} (too long to display)"
    m = INSERT_RE.match(text)
    if m:
        text = f"Value of {m.group(1).strip()}"
    m = PLEASE_RE.match(text)
    if m:
        text = m.group(1).strip()
        text = text[0].upper() + text[1:] if text else text
    m = DIFF_RE.match(text)
    if m:
        text = f"{m.group('stem').strip().capitalize()} difference"
    m = PLACEHOLDER_RE.match(text)
    if m:
        text = f"{m.group('stem')} {m.group('n')}"
    for wrong, right in SPELLINGS.items():
        if wrong in text.lower():
            text = re.sub(wrong, right, text, flags=re.I)
            text = text[0].upper() + text[1:] if text else text
    if DOTS_RE.search(text):
        # The source used "..." as a "choose something" affordance on a select.
        # Dropping it outright left 1,029 labels hanging on a preposition
        # ("Calculate using", "I want to", "Sort by") — the dots were doing the
        # work of a colon, so that is what they become.
        text = DOTS_RE.sub("", text).rstrip()
        if text and text[-1] not in ":.?!":
            text += ":"
    text = re.sub(r"[ \t]{2,}", " ", text).strip()
    if looks_like_identifier(text):
        text = humanise_identifier(text)
    if text and text[-1] not in ":.?!," and DANGLING_RE.search(text) and " " in text:
        text += ":"
    return text


def walk_labels(node, out: list[dict]) -> None:
    if isinstance(node, dict):
        if isinstance(node.get("l"), str):
            out.append(node)
        for value in node.values():
            walk_labels(value, out)
    elif isinstance(node, list):
        for value in node:
            walk_labels(value, out)


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--apply", action="store_true")
    args = ap.parse_args()

    changed_pairs: dict[str, str] = {}
    labels_seen = labels_changed = shards_changed = 0

    for path in sorted(glob.glob(str(CALC / "batch-*.ndjson"))):
        lines = Path(path).read_text(encoding="utf-8").splitlines()
        out_lines: list[str] = []
        shard_changed = False
        for line in lines:
            if not line.strip():
                out_lines.append(line)
                continue
            doc = json.loads(line)
            holders: list[dict] = []
            walk_labels(doc.get("groups"), holders)
            for holder in holders:
                labels_seen += 1
                before = holder["l"]
                after = clean_label(before, holder.get("du") or "", doc.get("path") or "")
                if not after and before.strip():
                    # the label was nothing but a template token: fall back to the
                    # variable's own name, prettified ("var1" -> "Variable 1")
                    stem = re.sub(r"([a-z])(\d)", r"\1 \2", holder.get("n") or "").strip()
                    after = f"Value {stem}" if stem else before.strip()
                if after and after != before:
                    holder["l"] = after
                    labels_changed += 1
                    changed_pairs[before] = after
                    shard_changed = True
            out_lines.append(json.dumps(doc, ensure_ascii=False) if shard_changed else line)
        if shard_changed:
            shards_changed += 1
            if args.apply:
                Path(path).write_text("\n".join(out_lines) + "\n", encoding="utf-8")

    print(f"labels examined : {labels_seen}")
    print(f"labels changed  : {labels_changed}  ({len(changed_pairs)} distinct)")
    print(f"shards touched  : {shards_changed}")
    for before, after in list(changed_pairs.items())[:12]:
        print(f"   {before!r} -> {after!r}")

    # Article prose quotes the same labels, so keep it in step — but only where the
    # change is more than whitespace. Substituting a whitespace-only pair ('Price '
    # -> 'Price') into prose would delete the space after every occurrence of the
    # word and weld it to the next one.
    # A label that only gained a colon must not be substituted into prose: "I want to"
    # appears inside ordinary sentences, and "I want to:" there is a typo, not a fix.
    prose_pairs = {
        before.strip(): after.strip()
        for before, after in changed_pairs.items()
        if before.strip() and before.strip() != after.strip() and after.strip()
        and after.strip() != before.strip() + ":"
    }
    content_files = 0
    for path in glob.glob(str(CONTENT / "**" / "*.json"), recursive=True):
        raw = Path(path).read_text(encoding="utf-8")
        new = raw
        for before, after in prose_pairs.items():
            if before in new:
                new = new.replace(before, after)
        if new != raw:
            content_files += 1
            if args.apply:
                json.loads(new)
                Path(path).write_text(new, encoding="utf-8")
    print(f"prose pairs     : {len(prose_pairs)} (non-whitespace label changes)")
    print(f"content files   : {content_files} would change")

    if args.apply:
        print("\nrebuilding the offset manifest …")
        subprocess.run([sys.executable, str(ROOT / "tools" / "build_manifest.py")], check=False)
    else:
        print("\n(dry run — pass --apply to write, then the manifest is rebuilt)")
    return 0


if __name__ == "__main__":
    sys.exit(main())
