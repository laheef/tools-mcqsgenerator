"""Every input box must actually move at least one output.

The panel's custom calculators let a spec ship a field that no formula reads — the
page then shows a control that does nothing. build.py validates that the formulas
*run*; this checks that they *mean something*.

For each spec, each input field is perturbed (numbers scaled, selects stepped to
another option, checkboxes flipped) and at least one output has to change. Fields
that legitimately feed nothing are declared in INTENTIONAL with a reason.

    python3 tools/biology/sensitivity.py            # all specs
    python3 tools/biology/sensitivity.py --slugs a,b
    python3 tools/biology/sensitivity.py --verbose
"""
from __future__ import annotations

import argparse
import sys

import build
import lib

# key (or "slug:key") -> why the input may be ignored by every formula
INTENTIONAL: dict[str, str] = {}


def collect(spec, values):
    """Run the direction graph to a fixed point, like the page script does."""
    out: dict[str, float] = {}
    for _ in range(4):
        for direction in spec.dirs:
            lhs = direction["l"]
            try:
                out[lhs] = lib.evaluate(direction["f"], {**values, **out})
            except Exception:
                continue
    return out


def defaults(spec):
    values = {}
    for f in spec.fields:
        dv = str(f.get("default_value", f.get("default", ""))).strip()
        if dv == "":
            continue
        try:
            values[f["key"]] = float(dv)
        except ValueError:
            pass
    values.update(spec.example or {})
    return values


def variants(field, current):
    """Candidate alternative values for one input."""
    if field.get("type") == "text":
        return []
    if field.get("type") == "select":
        vals = [float(o[2]) for o in field["options"]]
        return [v for v in vals if abs(v - current) > 1e-12][:3]
    if field.get("type") == "checkbox":
        return [1.0 - current]
    return [current * 1.37 + (0.5 if current == 0 else 0.0), current * 0.61]


def high_scenario(spec, base):
    """Every input pushed away from the defaults, for the second sensitivity pass."""
    out = dict(base)
    for f in spec.fields:
        key = f["key"]
        if f.get("output") or key not in out:
            continue
        if f.get("type") == "select":
            out[key] = float(f["options"][-1][2])
        elif f.get("type") == "checkbox":
            out[key] = 1.0
        elif out[key] == 0:
            out[key] = 5.0
        else:
            out[key] = out[key] * 2.5
    return out


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--slugs", default="")
    ap.add_argument("--verbose", action="store_true")
    args = ap.parse_args()
    only = {s.strip() for s in args.slugs.split(",") if s.strip()}

    specs = build.load_specs()
    problems = 0
    checked = 0
    for spec in specs:
        if only and spec.slug not in only:
            continue
        checked += 1
        if spec.script and not spec.dirs:
            # Script-driven calculators compute in the browser, so the Python
            # mirror has nothing to run. What can be checked here is that the
            # script registers a hook and can publish into at least one output.
            outs = [f["key"] for f in spec.fields if f.get("output")]
            if "onResult" not in spec.script or not outs:
                print(f"  ! {spec.slug}: script-only, but no hook or no output field")
                problems += 1
            continue
        base_values = defaults(spec)
        base = collect(spec, base_values)
        outputs = [k for k in base if k not in base_values]
        if not outputs:
            print(f"  ! {spec.slug}: no output produced from the defaults")
            problems += 1
            continue
        for f in spec.fields:
            key = f["key"]
            if f.get("output") or f.get("type") == "text" or key not in base_values:
                continue
            if key in INTENTIONAL or f"{spec.slug}:{key}" in INTENTIONAL:
                continue
            # An input can legitimately sit inert at the default values (a cut-off that
            # only bites on hot days, an override that needs its tick box).  So try the
            # defaults first, then a high scenario where every other input is pushed up.
            moved = False
            for scenario in (base_values, high_scenario(spec, base_values)):
                for alt in variants(f, scenario[key]):
                    trial = collect(spec, {**scenario, key: alt})
                    ref = collect(spec, scenario)
                    for o in outputs:
                        a, b = ref.get(o), trial.get(o)
                        if a is None or b is None:
                            continue
                        if abs(a - b) > max(1e-9, abs(a) * 1e-6):
                            moved = True
                            break
                    if moved:
                        break
                if moved:
                    break
            if not moved:
                print(f"  ! {spec.slug}: input '{key}' ({f['label']}) changes nothing")
                problems += 1
            elif args.verbose:
                print(f"  ok {spec.slug}: {key}")
    print(f"checked {checked} specs, {problems} problems")
    return 1 if problems else 0


if __name__ == "__main__":
    sys.exit(main())
