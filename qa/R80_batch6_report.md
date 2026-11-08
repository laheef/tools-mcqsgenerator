# Construction — Batch 6 report (R80)

**Commit:** `aec39b0` "Construction batch 6: HVAC, fluids, electrical and machining (27 calculators; 158/158 complete)" — pushed to `main`, live-verified.
**Category total after this batch:** **158 of 158 — the category is complete.**

## What was added (27)

| File | Calculators |
|---|---|
| `specs_c6a.py` (9) | ac-tonnage, air-changes-per-hour, air-conditioner-room-size, boiler-size, cfm, fire-flow, furnace-size, gallons-per-minute, heat-loss |
| `specs_c6b.py` (9) | junction-box-sizing, liters-per-minute, tonnage, bending-stress, bolt-torque, carbon-equivalent, countersink-depth, k-factor, material-removal-rate |
| `specs_c6c.py` (9) | pitch-diameter, punch-force, rivet-size, spindle-speed, taper, thread, thread-pitch, true-position, welding |

## QA layers

| Layer | Result |
|---|---|
| `build.py --write` | 158 specs, **158 written, 0 refused** |
| `php tests/calc_files.php construction` | **1 422 passed, 0 failed** · titles 158/158 · descs 158/158 · computing 158/158 |
| `php tests/calc_files.php` (all categories) | **5 266 passed, 0 failed** |
| `qa.py` round trip + degenerate + literature | **158/158 clean**, LITERATURE **158 slugs / 158 hand-worked cases** |
| `browser_qa.py` batch 6 slugs | **27/27 clean** |
| `browser_qa.py` regression sample (8 pages across all six batches) | **8/8 clean** |
| Article length | min **1 507** / median **1 627** / mean **1 644** words, thin 0 |
| Link audit | 0 dangling, 0 self-links, 0 leftover tokens |

## Fixes made during the batch

- **`fire-flow` had a dimensionally wrong fourth result.** The jet velocity divided gallons per
  minute by a nozzle area in *square inches* and by 448.831, which understated the velocity by a
  factor of 144. The result was replaced with the nozzle face area, which the page can state
  honestly; the flow figures themselves were correct.
- **`tonnage` and `thread-pitch` were under the 1 500-word floor** (1 441 and 1 460). Both were
  given an extra scenario and an extra pitfall, and `tonnage` a longer *reading* paragraph; the
  pack now bottoms out at 1 507.
- **`carbon-equivalent` reused its own input name** as a result (`carbon`), which the builder
  rejects; the second result is now `alloy_effect`, the total contribution of everything except
  carbon.
- **`material-removal-rate` had a filler result** ("rate per hp" divided by one); replaced with
  removal per hour.
- **`countersink-depth` linked to `construction/thread`** without the leading slash; corrected.

## Live check

| Page | Inputs → live values |
|---|---|
| ac-tonnage | 20 × 15 ft, 25 Btu/ft², 10 % → 300 ft² · 8 250 Btu/h · 0.688 ton · $825 |
| heat-loss | 2 000 ft² at U-0.1, ΔT 50 → 10 000 Btu/h · 2.931 kW · R-10 |
| welding | ¼ in fillet, 100 in, 65 % efficiency → 0.177 in throat · 3.125 in³ · 0.886 lb · $5.454 |
| thread-pitch | 1.5 mm → 16.933 TPI · 0.059 in · 1 500 µm |

## Next

None — the category is finished. See `R80_construction_final_report.md` for the whole-category
summary.
