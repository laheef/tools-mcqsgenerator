"""
QA for the construction pack.

Every calculator is checked four ways against the site's own engine:

  1. the page's values, compared with an independent Python evaluation;
  2. 200 random input sets, spread over three orders of magnitude either side;
  3. a round trip — each input solved from the results it produces;
  4. degenerate inputs (zeros, blanks) must not produce infinities or fatals;
  5. values worked out by hand from the construction practice, not from the formulas.

    python3 tools/construction/qa.py            # everything written so far
    python3 tools/construction/qa.py mole,ph    # just these
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
    # Worked out by hand from construction practice, not from these formulas.
    "brick": [
        ({'wall_length': 8, 'wall_height': 10, 'brick_length': 7.625, 'brick_height': 2.25, 'joint': 0.375, 'waste': 5},
         {"bricks": 549, "bricks_with_waste": 576}, 0.02),
    ],
    "concrete-slab": [
        ({'length': 10, 'width': 10, 'thickness': 4, 'waste': 0},
         {"volume_ft3": 33.3333, "volume_yd3": 1.2346, "bags_80lb": 56}, 0.02),
    ],
    "concrete-block": [
        ({'wall_length': 20, 'wall_height': 8, 'block_length': 16, 'block_height': 8, 'joint': 0.375, 'waste': 5},
         {"blocks": 169, "blocks_with_waste": 177, "courses": 12}, 0.02),
    ],
    "concrete-block-fill": [
        ({'blocks': 100, 'core_volume': 500, 'waste': 0},
         {"grout_ft3": 28.9352, "grout_yd3": 1.0717, "bags_80lb": 65}, 0.02),
    ],
    "concrete-column": [
        ({'diameter': 12, 'height': 10, 'count': 1, 'waste': 0},
         {"volume_each": 7.854, "volume_total": 0.2909, "bags_80lb": 14, "form_area": 31.4159}, 0.02),
    ],
    "concrete-cylinder": [
        ({'diameter': 6, 'height': 12, 'count': 1, 'density': 150},
         {"volume_each": 0.1963, "weight_each": 29.4524}, 0.02),
    ],
    "concrete-stairs": [
        ({'steps': 5, 'rise': 7, 'run': 10, 'width': 3, 'landing': 0, 'waist': 6, 'waste': 0},
         {"total_rise": 35, "footprint": 12.5, "flight_length": 5.0861, "volume_ft3": 11.2749, "volume_yd3": 0.4176}, 0.02),
    ],
    "concrete-tube": [
        ({'diameter': 8, 'depth': 24, 'count': 1, 'waste': 0},
         {"concrete_each": 0.6981, "bags_80lb": 2}, 0.02),
    ],
    "concrete-weight": [
        ({'volume': 1, 'density': 150},
         {"weight_lb": 4050, "weight_tons": 2.025, "weight_kg": 1837.0491}, 0.02),
    ],
    "cement": [
        ({'volume': 27, 'cement_parts': 1, 'sand_parts': 2, 'aggregate_parts': 3, 'waste': 0},
         {"cement_ft3": 4.5, "sand_ft3": 9.0, "aggregate_ft3": 13.5, "cement_bags": 5}, 0.02),
    ],
    "mortar": [
        ({'wall_area': 100, 'joint': 0.375, 'unit_depth': 8, 'waste': 0},
         {"mortar_ft3": 2.9851, "bags_80lb": 5}, 0.02),
    ],
    "grout": [
        ({'area': 100, 'tile_length': 12, 'tile_width': 12, 'joint_width': 3, 'joint_depth': 8, 'density': 1.6},
         {"joint_length": 200, "grout_litres": 1.463, "grout_kg": 2.3409}, 0.02),
    ],
    "thinset": [
        ({'area': 200, 'coverage': 10, 'coats': 1, 'waste': 5},
         {"bags": 21, "weight": 1050}, 0.02),
    ],
    "rebar": [
        ({'length': 10, 'width': 10, 'spacing': 12, 'bar_size': 4},
         {"bars_length": 11, "bars_width": 11, "total_length": 220, "weight": 146.96}, 0.02),
    ],
    "sonotube": [
        ({'diameter': 10, 'height': 4, 'waste': 0},
         {"volume_ft3": 2.1817, "bags_80lb": 4, "tube_area": 10.472}, 0.02),
    ],
    "post-hole-concrete": [
        ({'hole_diameter': 12, 'hole_depth': 3, 'post_size': 4, 'posts': 1, 'waste': 0},
         {"concrete_each": 2.0229, "post_displacement": 0.3333}, 0.02),
    ],
    "concrete-driveway-cost": [
        ({'length': 20, 'width': 10, 'thickness': 4, 'price': 150, 'labor': 5},
         {"area": 200, "volume_yd3": 2.4691, "concrete_cost": 370.3704, "labor_cost": 1000, "total_cost": 1370.3704, "cost_per_ft2": 6.8519}, 0.02),
    ],
    "gravel": [
        ({'length': 10, 'width': 10, 'depth': 3, 'density': 1.4, 'waste': 0},
         {"area": 100, "volume_ft3": 25, "volume_yd3": 0.9259, "tons": 1.2963}, 0.02),
    ],
    "crushed-stone": [
        ({'length': 10, 'width': 10, 'depth': 4, 'compaction': 20, 'density': 1.4},
         {"area": 100, "compacted_volume": 1.2346, "loose_volume": 1.5432, "tons": 2.1605}, 0.02),
    ],
    "sand": [
        ({'length': 10, 'width': 10, 'depth': 1, 'density': 1.35, 'waste': 0},
         {"volume_ft3": 8.3333, "volume_yd3": 0.3086, "tons": 0.4167, "bags_60lb": 17}, 0.02),
    ],
    "stone": [
        ({'length': 10, 'height': 2, 'thickness': 12, 'density': 1.5, 'waste': 0},
         {"volume_yd3": 0.7407, "tons": 1.1111, "truckloads": 2}, 0.02),
    ],
    "rock": [
        ({'area': 100, 'stone_size': 12, 'depth': 3, 'density': 1.5, 'waste': 0},
         {"stones": 100, "volume_yd3": 0.9259, "tons": 1.3889}, 0.02),
    ],
    "river-rock": [
        ({'length': 10, 'width': 4, 'depth': 3, 'density': 1.3, 'waste': 0},
         {"area": 40, "volume_yd3": 0.3704, "tons": 0.4815, "coverage_per_ton": 83.0769}, 0.02),
    ],
    "pea-gravel": [
        ({'length': 10, 'width': 3, 'depth': 2, 'density': 1.25, 'waste': 0},
         {"area": 30, "volume_yd3": 0.1852, "tons": 0.2315, "bags_50lb": 10}, 0.02),
    ],
    "landscape-rock": [
        ({'area': 100, 'depth': 3, 'density': 1.4, 'price': 50, 'waste': 0},
         {"volume_yd3": 0.9259, "tons": 1.2963, "cost": 64.8148, "cost_per_ft2": 0.6481}, 0.02),
    ],
    "limestone": [
        ({'length': 10, 'width': 10, 'depth': 4, 'density': 1.5, 'price': 40},
         {"volume_yd3": 1.2346, "tons": 1.8519, "cost": 74.0741}, 0.02),
    ],
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
        got = engine.ask(f"/construction/{spec.slug}", inputs)
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
    path = f"/construction/{spec.slug}"
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
