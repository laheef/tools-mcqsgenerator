"""
Build the everyday-life calculator files from the specs.

    python3 tools/everyday/build.py --report
    python3 tools/everyday/build.py --write [--only=slug,slug]
"""

from __future__ import annotations

import argparse
import glob
import importlib.util
import json
import os
import subprocess
import sys
import tempfile

sys.path.insert(0, os.path.dirname(__file__))

from lib import Spec, build_def, words, solve, fit_title, fit_desc  # noqa: E402

HERE = os.path.dirname(os.path.abspath(__file__))
SITE = os.path.dirname(os.path.dirname(HERE))


def load_specs(only: str = "") -> list[Spec]:
    specs: list[Spec] = []
    for path in sorted(glob.glob(os.path.join(HERE, "specs_*.py"))):
        name = os.path.basename(path)[:-3]
        mod_spec = importlib.util.spec_from_file_location(name, path)
        module = importlib.util.module_from_spec(mod_spec)
        mod_spec.loader.exec_module(module)
        specs.extend(getattr(module, "SPECS", []))
    if only:
        wanted = {s.strip() for s in only.split(",") if s.strip()}
        specs = [s for s in specs if s.slug in wanted]
    return specs


def check(spec: Spec) -> list[str]:
    problems: list[str] = []
    title_len = len(fit_title(spec.title)) + 7      # " | Onim"
    if not 50 <= title_len <= 60:
        problems.append(f"title {title_len} chars (want 50-60 with brand)")
    if not 150 <= len(fit_desc(spec.desc)) <= 160:
        problems.append(f"description {len(fit_desc(spec.desc))} chars (want 150-160)")
    if not spec.fields:
        problems.append("no inputs")
    if not spec.results:
        problems.append("no results")
    keys = {f["name"] for f in spec.fields} | {r["name"] for r in spec.results}
    for key in spec.formula:
        if key not in keys:
            problems.append(f"formula for unknown field {key}")
    env = spec.default_env()
    numeric = [f for f in spec.fields
               if f.get("type") not in ("select", "note") and f not in spec.results]
    if len(env) < len(numeric):
        missing = [f["name"] for f in numeric if f["name"] not in env]
        problems.append(f"no default for {missing}")
    try:
        out = solve(spec, env)
    except Exception as exc:                 # noqa: BLE001
        problems.append(f"maths: {exc}")
        return problems
    for r in spec.results:
        if r["name"] not in out:
            problems.append(f"result {r['name']} does not compute from the defaults")
    if not spec.checks:
        problems.append("no hand-worked check")
    return problems


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--write", action="store_true")
    ap.add_argument("--only", default="")
    ap.add_argument("--report", action="store_true")
    args = ap.parse_args()

    specs = load_specs(args.only)
    print(f"{len(specs)} specs")

    titles: dict[str, str] = {}
    bad = 0
    for spec in specs:
        problems = check(spec)
        fitted = fit_title(spec.title).lower()
        if fitted in titles:
            problems.append(f"title shared with {titles[fitted]}")
        titles[fitted] = spec.slug
        if problems:
            bad += 1
            print(f"  ! {spec.slug}: " + "; ".join(problems))
            continue
        defn = build_def(spec)
        w = words(defn)
        if w < 1500:
            print(f"  ~ {spec.slug}: {w} words (thin)")
        if not args.write:
            if args.report:
                print(f"  ✓ {spec.slug} {w}w")
            continue
        with tempfile.NamedTemporaryFile("w", suffix=".json", delete=False) as fh:
            json.dump(defn, fh, ensure_ascii=False)
            tmp = fh.name
        run = subprocess.run(
            ["php", os.path.join(HERE, "write_calc_file.php"), tmp],
            capture_output=True, text=True, cwd=SITE)
        os.unlink(tmp)
        if run.returncode != 0:
            bad += 1
            print(f"  ! {spec.slug}: {(run.stderr or run.stdout).strip()}")
        elif args.report:
            print("  ✓", spec.slug, f"{w}w")

    if args.write:
        print(f"{len(specs) - bad} written, {bad} refused")
    return 1 if bad else 0


if __name__ == "__main__":
    raise SystemExit(main())
