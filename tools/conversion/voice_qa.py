"""Measure the articles against the human-vs-AI cues in docs/article-voice.md.

Reinhart et al. (PNAS 2025) find participial clauses 2-5x and nominalisations
about 2.1x more frequent in model text; Culda et al. (Connection Science 2025)
find a narrower sentence-length distribution. This script counts all three
across the 330 shipped articles and refuses a page that trips the rules.
"""

from __future__ import annotations

import glob
import html
import os
import re
import statistics

HERE = os.path.dirname(os.path.abspath(__file__))
OUT = os.path.abspath(os.path.join(HERE, "..", "..", "plugins", "calc", "conversion"))

HOUSE = ["delve", "leverage", "robust", "seamless", "underscore", "crucial",
         "comprehensive", "pivotal", "utilize", "utilise", "furthermore", "moreover",
         "in today's fast-paced", "it is important to note", "navigate the",
         "unlock the", "elevate", "holistic", "myriad", "plethora"]
NOMINAL = [r"\bthe \w+tion of\b", r"\bthe \w+ment of\b", r"\b\w+isation\b",
           r"\b\w+ization\b", r"\bimplementation of\b", r"\butilisation of\b"]
PARTICIPLE_OPENER = re.compile(r"(?:^|[.!?]\s+)(Using|Having|By using|Based on|Leveraging|"
                               r"Considering|Taking|Building on)\b")


def sentences(text: str) -> list[str]:
    parts = re.split(r"(?<=[.!?])\s+", text)
    return [p.strip() for p in parts if len(p.strip().split()) >= 4]


def main() -> int:
    files = sorted(glob.glob(os.path.join(OUT, "qm-calc-*.php")))
    problems: list[tuple[str, str]] = []
    ratios: list[float] = []
    for path in files:
        slug = os.path.basename(path)[len("qm-calc-"):-4]
        raw = open(path, encoding="utf-8").read()
        # keep only the quoted strings that hold prose markup, not code
        chunks = re.findall(r"'((?:[^'\\]|\\.)*)'", raw)
        prose = [c for c in chunks if "<p>" in c or "<h2" in c or "<li>" in c]
        text = " ".join(prose)
        text = html.unescape(re.sub(r"<[^>]+>", " ", text.replace("\\'", "'")))
        low = text.lower()
        for word in HOUSE:
            if word in low:
                problems.append((slug, f"house word: {word}"))
        for pat in NOMINAL:
            hits = re.findall(pat, low)
            if len(hits) > 6:
                problems.append((slug, f"nominalisation {pat}: {len(hits)}"))
        openers = PARTICIPLE_OPENER.findall(text)
        if len(openers) > 2:
            problems.append((slug, f"{len(openers)} participial openers"))
        sents = sentences(text)
        if len(sents) > 20:
            lengths = [len(s.split()) for s in sents]
            if max(lengths) / max(1, min(lengths)) < 3:
                problems.append((slug, "sentence lengths too uniform"))
            ratios.append(max(lengths) / max(1, min(lengths)))
    print(f"{len(files)} articles checked")
    if ratios:
        print(f"sentence-length spread (longest/shortest): median {statistics.median(ratios):.1f}, "
              f"min {min(ratios):.1f}")
    print(f"{len(problems)} rules tripped")
    for slug, why in problems[:25]:
        print("  !", slug, why)
    return 1 if problems else 0


if __name__ == "__main__":
    raise SystemExit(main())
