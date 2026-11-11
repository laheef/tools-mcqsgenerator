"""Report on every conversion spec, then write the files.

    python3 build.py --report          # check everything, write nothing
    python3 build.py --write           # write every spec that passes
    python3 build.py --only=slug ...   # one page at a time
"""

from __future__ import annotations

import glob
import importlib
import os
import re
import sys

HERE = os.path.dirname(os.path.abspath(__file__))
sys.path.insert(0, HERE)

from gen import (OUT, TITLE_TAILS, T_MAX, T_MIN, build_article, render_file,  # noqa: E402
                 write_file)


def load_specs(only: list[str] | None = None) -> list:
    specs = []
    for path in sorted(glob.glob(os.path.join(HERE, "specs_*.py"))):
        name = os.path.basename(path)[:-3]
        mod = importlib.import_module(name)
        mod = importlib.reload(mod)
        specs.extend(getattr(mod, "SPECS", []))
    if only:
        specs = [s for s in specs if s.slug in only]
    return specs


def words_of(html_text: str) -> int:
    text = re.sub(r"<[^>]+>", " ", str(html_text))
    return sum(1 for tok in text.split() if re.search(r"[A-Za-z0-9]", tok))


def check(spec) -> list[str]:
    problems: list[str] = []
    art = build_article(spec)
    words = sum(words_of(b["html"]) for b in art["sections"]) + words_of(art["intro"])
    if words < 1500:
        problems.append(f"article short: {words} words")
    if words > 2500:
        problems.append(f"article long: {words} words")
    if not (T_MIN <= len(spec.title) <= T_MAX):
        problems.append(f"title {len(spec.title)} characters: {spec.title}")
    if not (150 <= len(spec.desc) <= 160):
        problems.append(f"description {len(spec.desc)} characters")
    if not spec.fields:
        problems.append("no inputs")
    if not spec.results:
        problems.append("no results")
    if spec.engine != "script":
        if not spec.formula:
            problems.append("no formula")
        solved = set(build_article(spec) and _solved(spec))
        missing = [r["name"] for r in spec.results if r["name"] not in solved]
        if missing:
            problems.append("results that never solve: " + ", ".join(missing))
        for name, expr in spec.formula.items():
            for dep in re.findall(r"[A-Za-z_][A-Za-z0-9_]*", str(expr)):
                if dep in {f["name"] for f in spec.fields} | set(spec.formula):
                    continue
                if dep in {"sqrt", "log", "log10", "exp", "abs", "round", "min", "max",
                           "pow", "floor", "ceil", "pi", "e", "sin", "cos", "tan", "atan"}:
                    continue
                problems.append(f"formula {name} reads unknown {dep}")
    else:
        for r in spec.results:
            if f'"{r["name"]}"' not in spec.js:
                problems.append(f"script never writes {r['name']}")
    return problems


def _solved(spec) -> set[str]:
    from gen import solve
    return set(solve(spec, spec.env()))


def main(argv: list[str]) -> int:
    write = "--write" in argv
    only = [a.split("=", 1)[1] for a in argv if a.startswith("--only=")]
    only = [s for chunk in only for s in chunk.split(",") if s]
    specs = load_specs(only or None)
    print(f"{len(specs)} specs")

    seen_titles: dict[str, str] = {}
    refusals = 0
    written = 0
    for spec in specs:
        if spec.title in seen_titles:
            stem = spec.name
            fixed = ""
            for tail in TITLE_TAILS:
                cand = stem + tail
                if T_MIN <= len(cand) <= T_MAX and cand not in seen_titles:
                    fixed = cand
                    break
            if fixed:
                spec.title = fixed
        problems = check(spec)
        if spec.title in seen_titles:
            problems.append(f"title shared with {seen_titles[spec.title]}")
        seen_titles.setdefault(spec.title, spec.slug)
        if problems:
            refusals += 1
            for p in problems:
                print(f"  ! {spec.slug}: {p}")
            continue
        if write:
            path = write_file(spec)
            written += 1
    if write:
        print(f"{written} written, {refusals} refused")
        print(f"into {OUT}")
    else:
        print(f"{refusals} refused")
    return 0


if __name__ == "__main__":
    raise SystemExit(main(sys.argv[1:]))
