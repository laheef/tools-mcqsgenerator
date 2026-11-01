#!/usr/bin/env python3
"""prose_check.py — machine-generated prose that a reader would trip over.

`aeo.py` checks the *shape* of an article (a lead that names the subject, a
question heading, a table, an FAQ). It does not read the sentences. That gap let
two families of broken English survive on harvested pages, both of them visible
in the summary, which is the text the card, the meta description and the search
result all reuse:

  1. **A field label dropped into a sentence without being read.**
     "The Day counter calculator works out the answer, and it gets there from
     the from and the time between." The generator lowercased the labels `From`
     and `Time between` and joined them with "and the".

  2. **A variable identifier printed as if it were a phrase.**
     "The Days until Fall calculator returns <strong>autumnal quinox</strong>"
     (`autumnal_quinox`), "reports <strong>years diff</strong>"
     (`years_diff`), "returns <strong>days christmas</strong>".

Both are checkable without a dictionary, which is what makes them worth a
suite: the identifier is *on the page's own definition*, so the test is not
"does this look like English" but "is this token a variable name".

Usage:
  python3 tools/prose_check.py                  # every page
  python3 tools/prose_check.py --category math
  python3 tools/prose_check.py --slug 120-day --verbose
  python3 tools/prose_check.py --json /tmp/prose.json
"""
from __future__ import annotations

import argparse
import glob
import json
import re
import sys
from collections import Counter
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent
CALC = ROOT / "php-clone" / "data" / "calc"
CONTENT = ROOT / "php-clone" / "data" / "content"

BOLD_RE = re.compile(r"<strong>(.*?)</strong>", re.S)
TAG_RE = re.compile(r"<[^>]+>")
WORD_RE = re.compile(r"[A-Za-z][A-Za-z'’\-]+")

# A word repeated across a two-word window: "from the from", "the the".
DUP_WORD_RE = re.compile(r"\b(\w{3,})\s+\1\b")   # same case: "brown Brown" is two names
# A label used as a noun phrase: "the from and the time between", "the years".
# "the length and the width" is English; "the from and the time between" is a
# field label the generator dropped into the sentence. Only the connectives that
# are never nouns are flagged.
# Case matters: the label is `From`, so "the From date" is the fix, not the bug.
CONNECTIVE_RE = re.compile(
    r"\bthe (from|to|until)\b(?! (?:date|time|field|value|form|page|calculator))")
# A placeholder the source generator never turned into words: Number1, Limits2,
# Result4a, Select1, Payment2. `[a-z]?` allows the trailing letter of 4a/4b.
# Only a curated set: "Holiday 1", "Unit 2" and "Symbol 2" are real field names,
# "Output label1" and "Number3" are the generator's counters left in place.
PLACEHOLDER_RE = re.compile(
    r"^(?:output label|output|input|result|option|select|value|number|row|column"
    r"|limit|limits|check if [a-z ]+|method|mode)\s?\d+[a-z]?$", re.I)
# Tokens that only ever appear because an identifier was printed as prose. Each
# one was confirmed by hand on the page it appears on; the list is short on
# purpose, because a rule that guesses at "does this look English" flags
# notation (FBMI, 2pq) and notation is correct.
ID_FRAGMENT_WORDS = {"diff", "dif", "vals", "quinox", "truea", "pathlength",
                     "mulitiplier", "perecentage", "notfullpipe", "cb", "cred", "oce"}


def load_identifiers() -> dict[str, set[str]]:
    """path -> every variable name on that page's definition, raw and spaced."""
    ids: dict[str, set[str]] = {}
    for shard in sorted(glob.glob(str(CALC / "batch-*.ndjson"))):
        for line in open(shard, encoding="utf-8"):
            if not line.strip():
                continue
            doc = json.loads(line)
            names: set[str] = set()

            def walk(node) -> None:
                if isinstance(node, dict):
                    n = node.get("n")
                    if isinstance(n, str) and n:
                        names.add(n)
                    for value in node.values():
                        walk(value)
                elif isinstance(node, list):
                    for value in node:
                        walk(value)

            walk(doc.get("groups"))
            walk(doc.get("vars"))
            ids[doc["path"]] = names
    return ids


def corpus_vocabulary() -> set[str]:
    """Every word used in ordinary (non-bold, non-identifier) article prose.

    A label token that appears in none of it is a candidate; used with the
    identifier test below, which is what keeps the rule precise.
    """
    vocab: set[str] = set()
    for path in glob.glob(str(CONTENT / "**" / "*.json"), recursive=True):
        doc = json.loads(Path(path).read_text(encoding="utf-8"))
        text = " ".join([doc.get("summary") or ""] +
                        [s.get("html", "") for s in doc.get("sections") or [] if isinstance(s, dict)])
        text = BOLD_RE.sub(" ", TAG_RE.sub(" ", text))
        vocab |= {w.lower() for w in WORD_RE.findall(text)}
    return vocab


def prose_of(doc: dict) -> str:
    return " ".join([doc.get("summary") or ""] +
                    [s.get("html", "") for s in doc.get("sections") or [] if isinstance(s, dict)])


def segments(text: str) -> list[str]:
    """Visible text, split at tag boundaries.

    A repeat that spans a tag is two headings or two table cells that happen to
    share a word — a Punnett square full of "A A", a column headed "Depth" after
    a row ending in "depth". Only a repeat *inside* one run of text is prose.
    """
    return [TAG_RE.sub("", part) for part in re.split(r"<[^>]+>", text)]


def junk_label_reason(label: str, ids: set[str], vocab: set[str],
                      spaced_ids=None, raw_ids=None, id_tokens=None) -> str:
    """Why a bolded label reads as an identifier, or "" when it reads fine."""
    spaced_ids = spaced_ids if spaced_ids is not None else {i.lower().replace("_", " ") for i in ids}
    raw_ids = raw_ids if raw_ids is not None else {i.lower() for i in ids}
    id_tokens = id_tokens if id_tokens is not None else {
        t for i in raw_ids for t in re.split(r"[_\-]", i) if t}
    low = label.lower().strip().rstrip(":")
    if low not in spaced_ids and low not in raw_ids:
        return ""
    tokens = [w.lower() for w in WORD_RE.findall(low)]
    joined = low.replace(" ", "")
    # 1. a fragment of a snake_case identifier ("years_diff" -> "years diff")
    strange = [w for w in tokens if w in id_tokens and w in ID_FRAGMENT_WORDS]
    # 2. a misspelling the corpus uses nowhere else
    strange += [w for w in tokens if w not in vocab and w in ID_FRAGMENT_WORDS]
    # 3. an identifier printed with no space in it at all ("pathlength")
    if joined in raw_ids and " " not in low and len(low) > 6 and low not in vocab:
        strange.append(low)
    # 4. a numbered placeholder standing in for a field name
    if PLACEHOLDER_RE.match(joined) and joined not in vocab \
            and len(re.sub(r"[^a-z]", "", joined)) > 3:
        strange.append(joined)
    return ", ".join(sorted(set(strange)))


def inspect(path: str, doc: dict, ids: set[str], vocab: set[str]) -> list[str]:
    problems: list[str] = []
    text = prose_of(doc)
    plain = TAG_RE.sub(" ", text)
    spaced_ids = {i.lower().replace("_", " ") for i in ids}
    raw_ids = {i.lower() for i in ids}
    id_tokens = {t for i in raw_ids for t in re.split(r"[_\-]", i) if t}

    for seg in segments(text):
        for m in DUP_WORD_RE.finditer(seg):
            word = m.group(1)
            # legitimate English ("that that", "had had") and proper nouns
            # (a table of allele names: "Brown Brown")
            if word.lower() in {"that", "had", "is", "was"}:
                continue
            if word[0].isupper():
                continue
            if word.lower() not in vocab:
                continue
            problems.append(f"a word repeats: “…{m.group(0)}…”")

    for m in CONNECTIVE_RE.finditer(plain):
        phrase = " ".join(m.group(0).split())
        problems.append(f"a bare label reads as a noun: “…{phrase}…”")

    seen: set[str] = set()
    for m in BOLD_RE.finditer(text):
        label = TAG_RE.sub("", m.group(1)).strip()
        low = label.lower()
        if low in seen:
            continue
        reason = junk_label_reason(label, ids, vocab, spaced_ids, raw_ids, id_tokens)
        if reason:
            seen.add(low)
            problems.append(f"a variable name is printed as a phrase: <strong>{label}</strong> "
                            f"({reason})")
    return problems


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--category", default="")
    ap.add_argument("--slug", default="")
    ap.add_argument("--verbose", action="store_true")
    ap.add_argument("--json", default="")
    ap.add_argument("--strict", action="store_true")
    args = ap.parse_args()

    ids = load_identifiers()
    vocab = corpus_vocabulary()

    flagged: list[dict] = []
    pages = 0
    for path in sorted(glob.glob(str(CONTENT / "**" / "*.json"), recursive=True)):
        doc = json.loads(Path(path).read_text(encoding="utf-8"))
        page = doc.get("path") or ""
        if args.category and f"/{args.category}/" not in page:
            continue
        if args.slug and args.slug not in page:
            continue
        pages += 1
        problems = inspect(page, doc, ids.get(page, set()), vocab)
        if problems:
            flagged.append({"path": page, "problems": problems})

    kinds = Counter()
    for row in flagged:
        for p in row["problems"]:
            kinds[p.split(":")[0].split("…")[0].strip()] += 1

    print(f"pages read            : {pages}")
    print(f"pages with problems   : {len(flagged)}")
    for kind, n in kinds.most_common():
        print(f"  {n:5d}  {kind}")
    if args.verbose or args.slug:
        for row in flagged[:60]:
            print(f"\n  {row['path']}")
            for p in row["problems"][:4]:
                print(f"     - {p}")
    if args.json:
        Path(args.json).write_text(json.dumps(flagged, indent=1), encoding="utf-8")
        print(f"\ndetail -> {args.json}")
    return 1 if (args.strict and flagged) else 0


if __name__ == "__main__":
    sys.exit(main())
