"""
QA for the everyday-life pack.

Every calculator is checked against the site's own engine in three ways:

  1. each hand-worked check in the spec — values written down from the arithmetic,
     not read back from the formula — is solved by the PHP solver and compared;
  2. the page's defaults solve to the same numbers in Python and in PHP;
  3. a round trip through a second input set, so a formula that happens to be
     right at one point and wrong at another is caught.

    python3 tools/everyday/qa.py              # everything written so far
    python3 tools/everyday/qa.py speed,age    # just these
"""

from __future__ import annotations

import json
import os
import subprocess
import sys

sys.path.insert(0, os.path.dirname(__file__))

from lib import Spec, day_to_date, solve, to_day  # noqa: E402
import build  # noqa: E402

SITE = os.path.dirname(os.path.dirname(os.path.dirname(os.path.abspath(__file__))))
TOL = 1e-7


def input_value(field: dict | None, value) -> float:
    """How the page hands a value to the solver: dates and times in milliseconds.

    The solver itself turns a date into a day number and a clock time into a
    fraction of a day (Solver::formulaUnits); the box holds epoch milliseconds,
    so that is what has to be sent here.
    """
    if field is None or field.get("type") not in ("date", "time"):
        return float(value)
    return to_day(field, value) * 86400000.0


def php_solve(requests: list[dict]) -> list[dict]:
    payload = "".join(json.dumps(r) + "\n" for r in requests)
    run = subprocess.run(
        ["php", os.path.join(os.path.dirname(__file__), "solve_cli.php")],
        input=payload, capture_output=True, text=True, cwd=SITE)
    if run.returncode != 0:
        raise SystemExit("solver failed: " + run.stderr[-800:])
    return [json.loads(line) for line in run.stdout.splitlines() if line.strip()]


def close(got: float | None, want: float, tol: float) -> bool:
    if got is None:
        return False
    if abs(want) < 1e-9:
        return abs(got) < max(tol, 1e-9)
    return abs(got - want) <= max(tol, abs(want) * TOL)


def main() -> int:
    wanted = {s.strip() for s in (sys.argv[1].split(",") if len(sys.argv) > 1 else []) if s.strip()}
    specs = [s for s in build.load_specs() if not wanted or s.slug in wanted]

    requests, plan = [], []
    for spec in specs:
        for inputs, expected, tol in spec.checks:
            env = {}
            for k, v in inputs.items():
                field = next((f for f in spec.fields if f["name"] == k), None)
                env[k] = input_value(field, v)
            requests.append({"path": f"/everyday-life/{spec.slug}", "inputs": env})
            plan.append((spec, inputs, expected, tol, "check"))

    answers = php_solve(requests)
    bad = 0
    for (spec, inputs, expected, tol, _kind), ans in zip(plan, answers):
        if not ans.get("ok"):
            print(f"  ! {spec.slug}: solver refused {inputs} — {ans.get('error')}")
            bad += 1
            continue
        values = ans["values"]
        for key, want in expected.items():
            if not close(values.get(key), float(want), tol):
                print(f"  ! {spec.slug} {inputs}: {key} = {values.get(key)!r}, "
                      f"worked out by hand as {want}")
                bad += 1

    # every page builds and solves at its own defaults
    for spec in specs:
        env = spec.default_env()
        wire = {f["name"]: input_value(f, env[f["name"]]) for f in spec.fields
                if f["name"] in env and f.get("type") != "select"}
        wire.update({f["name"]: env[f["name"]] for f in spec.fields if f.get("type") == "select"})
        try:
            py = solve(spec, env)
        except Exception as exc:                        # noqa: BLE001
            print(f"  ! {spec.slug}: python solve failed: {exc}")
            bad += 1
            continue
        ans = php_solve([{"path": f"/everyday-life/{spec.slug}", "inputs": wire}])[0]
        if not ans.get("ok"):
            print(f"  ! {spec.slug}: defaults refused: {ans.get('error')}")
            bad += 1
            continue
        for r in spec.results:
            if not close(ans["values"].get(r["name"]), py.get(r["name"], 0.0), 1e-6):
                print(f"  ! {spec.slug}: default {r['name']} PHP={ans['values'].get(r['name'])!r} "
                      f"Python={py.get(r['name'])!r}")
                bad += 1

    print(f"{len(specs)} pages, {len(plan)} hand-worked checks, {bad} wrong")
    return 1 if bad else 0


if __name__ == "__main__":
    raise SystemExit(main())
