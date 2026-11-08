"""
QA for the chemistry pack.

Every calculator is checked four ways against the site's own engine:

  1. the page's values, compared with an independent Python evaluation;
  2. 200 random input sets, spread over three orders of magnitude either side;
  3. a round trip — each input solved from the results it produces;
  4. degenerate inputs (zeros, blanks) must not produce infinities or fatals;
  5. values worked out by hand from the chemistry, not from the formulas.

    python3 tools/chemistry/qa.py            # everything written so far
    python3 tools/chemistry/qa.py mole,ph    # just these
"""

from __future__ import annotations

import json
import math
import os
import random
import subprocess
import sys

sys.path.insert(0, os.path.dirname(__file__))

from lib import Spec, solve  # noqa: E402
import build  # noqa: E402

SITE = os.path.dirname(os.path.dirname(os.path.dirname(os.path.abspath(__file__))))
TOL = 1e-7

# Values worked out by hand from the chemistry, not from the formulas: if one of
# these moves, an expression has changed meaning.
LITERATURE: dict[str, list[tuple[dict, dict, float]]] = {
    "mole": [({"mass": 36.46, "molar_mass": 36.46}, {"moles": 1.0, "particles": 6.02214076e23}, 1e-9)],
    "molar-mass": [({"mass": 5.85, "moles": 0.1}, {"molar_mass": 58.5}, 1e-9)],
    "molecular-weight": [({"mass": 20, "moles": 0.25}, {"mw_da": 80.0, "mw_kda": 0.08}, 1e-9)],
    "grams-to-moles": [({"mass": 100, "molar_mass": 18.015}, {"moles": 5.551}, 1e-3),
                       ({"mass": 58.44, "molar_mass": 58.44}, {"millimoles": 1000.0}, 1e-9)],
    "moles-to-atoms": [({"moles": 0.5, "atoms_per_unit": 2}, {"atoms": 6.02214076e23}, 1e-9)],
    "avogadro": [({"particles": 6.02214076e23, "moles": 1}, {"avogadro": 6.02214076e23}, 1e-9)],
    "concentration": [({"mass_solute": 9, "volume": 1, "molar_mass": 58.44}, {"molarity": 0.15399}, 1e-4)],
    "molarity": [({"moles": 0.5, "volume": 0.25}, {"molarity": 2.0, "millimolarity": 2000.0}, 1e-9)],
    "molality": [({"moles": 1, "solvent_mass_g": 1000}, {"molality": 1.0}, 1e-9),
                 ({"moles": 0.05844, "solvent_mass_g": 1000}, {"molality": 0.05844}, 1e-9)],
    "normality": [({"molarity": 1, "n_factor": 2, "volume": 1}, {"normality": 2.0, "equivalents": 2.0}, 1e-9),
                  ({"molarity": 0.02, "n_factor": 5, "volume": 0.25}, {"normality": 0.1, "equivalents": 0.025}, 1e-9)],
    "mole-fraction": [({"n1": 2, "n2": 6}, {"x1": 0.25, "x2": 0.75}, 1e-9)],
    "mass-percent": [({"mass_solute": 5, "mass_solution": 100}, {"percent": 5.0, "g_per_kg": 50.0}, 1e-9),
                     ({"mass_solute": 35, "mass_solution": 1000}, {"percent": 3.5}, 1e-9)],
    "percent-solution": [({"mass_solute": 0.9, "volume": 100}, {"percent_wv": 0.9, "g_per_l": 9.0}, 1e-9)],
    "mass-concentration-to-molar-concentration": [({"mass_conc": 10, "molar_mass": 58.44}, {"molarity": 0.17112}, 1e-4)],
    "percentage-concentration-to-molarity": [({"percent": 37, "density": 1.19, "molar_mass": 36.46}, {"molarity": 12.08}, 1e-2),
                                             ({"percent": 98, "density": 1.84, "molar_mass": 98.079}, {"molarity": 18.4}, 1e-1)],
    "ppm-to-molarity": [({"ppm": 1000, "molar_mass": 58.44}, {"molarity": 0.017112, "mg_per_l": 1000.0}, 1e-4)],
    "dilution-factor": [({"initial_volume": 1, "final_volume": 10}, {"dilution_factor": 10.0, "diluent_volume": 9.0,
                                                                   "fraction_remaining": 0.1}, 1e-9)],
    "solution-dilution": [({"c1": 2, "v1": 50, "v2": 500}, {"c2": 0.2, "diluent_volume": 450.0}, 1e-9),
                          ({"c1": 1, "v1": 1, "v2": 1000}, {"c2": 0.001}, 1e-12)],
}


class Engine:
    """One PHP process, many requests."""

    def __init__(self) -> None:
        self.proc = subprocess.Popen(
            ["php", os.path.join(os.path.dirname(__file__), "solve_cli.php")],
            stdin=subprocess.PIPE, stdout=subprocess.PIPE, text=True, cwd=SITE)

    def ask(self, path: str, inputs: dict[str, float]) -> dict:
        assert self.proc.stdin and self.proc.stdout
        self.proc.stdin.write(json.dumps({"path": path, "inputs": inputs}) + "\n")
        self.proc.stdin.flush()
        return json.loads(self.proc.stdout.readline())

    def close(self) -> None:
        if self.proc.stdin:
            self.proc.stdin.close()
        self.proc.wait(timeout=20)


def close_enough(a: float | None, b: float | None) -> bool:
    if a is None or b is None:
        return a is b
    if math.isnan(a) or math.isnan(b):
        return False
    scale = max(1.0, abs(a), abs(b))
    return abs(a - b) / scale <= TOL


def check_literature(spec: Spec, engine: Engine) -> list[str]:
    problems: list[str] = []
    for inputs, expected, tol in LITERATURE.get(spec.slug, []):
        got = engine.ask(f"/chemistry/{spec.slug}", inputs)
        if not got.get("ok"):
            problems.append(f"literature: engine refused {inputs}")
            continue
        for key, want in expected.items():
            have = got["values"].get(key)
            if have is None or abs(have - want) > max(tol, abs(want) * 1e-9):
                problems.append(f"literature {inputs}: {key} = {have!r}, expected {want!r}")
    return problems


def check_spec(spec: Spec, engine: Engine, rng: random.Random) -> list[str]:
    problems: list[str] = []
    path = f"/chemistry/{spec.slug}"
    env = spec.default_env()
    numeric = [f for f in spec.fields if f.get("type") not in ("select", "note")]

    # 1. the page's own values
    mine = solve(spec, env)
    got = engine.ask(path, env)
    if not got.get("ok"):
        return [f"engine refused the defaults: {got.get('error')}"]
    for r in spec.results:
        if not close_enough(mine.get(r["name"]), got["values"].get(r["name"])):
            problems.append(f"default: {r['name']} python {mine.get(r['name'])!r} "
                            f"vs php {got['values'].get(r['name'])!r}")

    # 2. random input sets
    for _ in range(200):
        values = {}
        for f in numeric:
            base = env.get(f["name"], 1.0)
            lo, hi = max(1e-9, base / 1000), base * 1000
            values[f["name"]] = math.exp(rng.uniform(math.log(lo), math.log(hi)))
        mine = solve(spec, values)
        got = engine.ask(path, values)
        if not got.get("ok"):
            problems.append(f"random: engine refused: {got.get('error')}")
            break
        bad = None
        for r in spec.results:
            if not close_enough(mine.get(r["name"]), got["values"].get(r["name"])):
                bad = (f"random {values}: {r['name']} python {mine.get(r['name'])!r} "
                       f"vs php {got['values'].get(r['name'])!r}")
                break
        if bad:
            problems.append(bad)
            break

    # 3. round trip: leave one input out, give the results, expect that input back
    mine = solve(spec, env)
    for f in numeric:
        key = f["name"]
        want = env[key]
        inputs = dict(env)
        inputs.pop(key, None)
        inputs.update({r["name"]: mine[r["name"]] for r in spec.results if r["name"] in mine})
        got = engine.ask(path, inputs)
        if not got.get("ok"):
            problems.append(f"round trip {key}: engine refused")
            continue
        back = got["values"].get(key)
        if not close_enough(want, back):
            problems.append(f"round trip {key}: started at {want!r}, came back as {back!r}")

    # 4. degenerate inputs
    for f in numeric:
        inputs = dict(env)
        inputs[f["name"]] = 0.0
        got = engine.ask(path, inputs)
        if got.get("ok"):
            for k, v in got["values"].items():
                if v is not None and (math.isinf(v) or math.isnan(v)):
                    problems.append(f"zero {f['name']}: {k} became {v}")
                    break
    got = engine.ask(path, {})
    if not got.get("ok"):
        problems.append("blank form: engine refused")

    return problems


def main() -> int:
    only = sys.argv[1] if len(sys.argv) > 1 else ""
    specs = build.load_specs(only)
    engine = Engine()
    rng = random.Random(20261023)
    failed = 0
    for spec in specs:
        problems = check_spec(spec, engine, rng) + check_literature(spec, engine)
        if problems:
            failed += 1
            print(f"  ✗ {spec.slug}")
            for p in problems[:6]:
                print(f"      {p}")
        else:
            print(f"  ✓ {spec.slug}")
    engine.close()
    print(f"\n{len(specs) - failed}/{len(specs)} calculators clean")
    return 1 if failed else 0


if __name__ == "__main__":
    raise SystemExit(main())
