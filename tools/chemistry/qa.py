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
    "ph": [({"h_conc": 1e-7}, {"ph": 7.0, "poh": 7.0, "oh_conc": 1e-7}, 1e-12),
           ({"h_conc": 1e-3}, {"ph": 3.0, "poh": 11.0}, 1e-9)],
    "hydrogen-ion-concentration": [({"ph": 7.4}, {"h_conc": 3.98e-8, "oh_conc": 2.51e-7}, 1e-8),
                                   ({"ph": 2}, {"h_conc": 1e-2}, 1e-12)],
    "pka": [({"ka": 1.8e-5}, {"pka": 4.7447, "pkb": 9.2553}, 1e-4),
            ({"ka": 1.0}, {"pka": 0.0, "kb": 1e-14}, 1e-12)],
    "buffer-ph": [({"pka": 4.76, "base_conc": 0.1, "acid_conc": 0.1}, {"ph": 4.76, "ratio": 1.0}, 1e-9),
                  ({"pka": 4.76, "base_conc": 0.2, "acid_conc": 0.1}, {"ph": 5.061}, 1e-4)],
    "henderson-hasselbalch": [({"ph": 4.76, "base_conc": 0.1, "acid_conc": 0.1}, {"pka": 4.76}, 1e-9)],
    "titration": [({"c1": 0.1, "v1": 25, "n1": 1, "v2": 25, "n2": 1}, {"c2": 0.1, "moles_titrant": 2.5}, 1e-9),
                  ({"c1": 0.1, "v1": 20, "n1": 2, "v2": 25, "n2": 1}, {"c2": 0.04, "moles_analyte": 1.0}, 1e-9)],
    "neutralization": [({"acid_conc": 1, "acid_volume": 0.25, "acid_equivalents": 2,
                        "base_equivalents": 1, "base_molar_mass": 40}, {"base_mass": 20.0, "equivalents": 0.5}, 1e-9)],
    "buffer-capacity": [({"moles_added": 0.01, "ph_change": 0.05, "volume": 1}, {"capacity": 0.2}, 1e-9)],
    "equilibrium-constant": [({"product_conc": 0.8, "product_coeff": 1, "reactant_conc": 0.2,
                               "reactant_coeff": 1, "temperature": 298.15},
                              {"k": 4.0, "gibbs_standard": -3.436}, 1e-3)],
    "kp": [({"kc": 4, "temperature": 298.15, "delta_n": 0}, {"kp": 4.0, "kp_over_kc": 1.0}, 1e-9),
           ({"kc": 1, "temperature": 500, "delta_n": 1}, {"kp": 41.03}, 1e-2)],
    "reaction-quotient": [({"product_conc": 0.1, "reactant_conc": 0.5, "k": 4, "temperature": 298.15},
                           {"q": 0.2, "delta_g": -7.426}, 1e-3)],
    "gibbs-energy": [({"enthalpy": -92.2, "entropy": -198.7, "temperature": 298.15},
                      {"delta_g": -32.96, "t_switch": 464.02}, 2e-2)],
    "entropy": [({"heat": 40700, "temperature": 373.15, "moles": 1}, {"delta_s_molar": 109.07}, 1e-2)],
    "nernst-equation": [({"e0": 1.1, "n": 2, "q": 1, "temperature": 298.15}, {"e": 1.1, "slope_mv": 29.58}, 1e-2),
                        ({"e0": 1.1, "n": 2, "q": 10, "temperature": 298.15}, {"e": 1.0704}, 1e-3)],
    "electromotive-force": [({"cathode": 0.34, "anode": -0.76, "n": 2},
                             {"emf": 1.1, "delta_g": -212.27}, 1e-2)],
    "freezing-point-depression": [({"kf": 1.86, "molality": 1, "van_t_hoff": 2, "pure_fp": 0},
                                   {"delta_tf": 3.72, "solution_fp": -3.72}, 1e-9)],
    "boiling-point-elevation": [({"kb": 0.512, "molality": 1, "van_t_hoff": 2, "pure_bp": 100},
                                 {"delta_tb": 1.024, "solution_bp": 101.024}, 1e-9)],
    "osmotic-pressure": [({"van_t_hoff": 2, "molarity": 0.154, "temperature": 310.15},
                          {"pressure_kpa": 794.3, "osmolarity": 0.308}, 2e-1)],
    "raoults-law": [({"mole_fraction": 0.3, "pure_pressure": 2.34}, {"partial_pressure": 0.702}, 1e-9)],
    "partial-pressure": [({"mole_fraction": 0.21, "total_pressure": 101.3}, {"partial_pressure": 21.273}, 1e-2)],
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
            if f.get("_bounds"):
                lo_b, hi_b = f["_bounds"]
                values[f["name"]] = rng.uniform(lo_b, hi_b)
                continue
            if base == 0:
                values[f["name"]] = rng.choice([-1.0, 1.0]) * 10 ** rng.uniform(-1, 1)
                continue
            sign = 1.0 if base > 0 else -1.0
            mag = abs(base)
            values[f["name"]] = sign * math.exp(rng.uniform(math.log(mag / 1000), math.log(mag * 1000)))
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
    formulas = spec.all_formulas()
    for f in numeric:
        key = f["name"]
        if key not in formulas or key in spec.no_round_trip:   # no usable inverse
            continue
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
