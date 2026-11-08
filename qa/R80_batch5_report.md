# Construction — Batch 5 report (R80)

**Commit:** `da2f76d` "Construction batch 5: fences, site grades, drainage and layout (27 calculators; 131/158)" — pushed to `main`, live-verified.
**Category total after this batch:** 131 of 158.

## What was added (27)

| File | Calculators |
|---|---|
| `specs_c5a.py` (12) | fence, fence-cost, fence-estimate, fence-material, fence-picket, fence-perimeter, fence-post-depth, privacy-fence, vinyl-fence, vinyl-fence-cost, wood-fence, board-on-board-fence |
| `specs_c5b.py` (8) | elevation-grade, ramp-slope, retaining-wall, gravel-driveway, french-drain, ladder-angle, vertical-curve, angle-of-depression |
| `specs_c5c.py` (7) | baluster, spindle-spacing, sag, rolling-offset, bolt-circle, box-fill, clearance-hole |

## Two framework bugs found and fixed

1. **`{input|unit}` tokens printed the literal word "unit".** `fill()` in `lib.py` only looked up
   the unit on *result* fields, so any prose token that pointed at an input (`{g1|unit}`,
   `{length|unit}`) rendered "2 unit". It now falls back to the input's suffix. Existing pages
   that used the token with a result were unaffected; every page was rebuilt.
2. **A percentage was forced onto a 0–100 scale.** `Widget::domainRange()` read `%` on the suffix
   and clamped the input, which rejected a falling grade (`-3 %`) and left the whole page blank —
   the browser pass caught `vertical-curve` computing nothing. Fields whose label contains
   *grade*, *gradient* or *slope* are now exempt, because a grade is signed: a fall is negative.
   This is a shared framework file, so the full 559-page site was re-tested afterwards
   (`5023 passed, 0 failed` at that point).

## QA layers

| Layer | Result |
|---|---|
| `build.py --write` | 131 specs, **131 written, 0 refused** |
| `php tests/calc_files.php construction` | **1 179 passed, 0 failed** · titles 131/131 · descs 131/131 · computing 131/131 |
| `php tests/calc_files.php` (all categories) | **5 023 passed, 0 failed** |
| `qa.py` round trip + degenerate + literature | **131/131 clean**, LITERATURE **131 slugs / 131 hand-worked cases** |
| `browser_qa.py` batch 5 slugs | **27/27 clean** |
| `browser_qa.py` regression sample (12 older pages) | **12/12 clean** |
| Article length | min **1 507** / median **1 655** words, thin 0 |
| Link audit | 0 self-links, 0 leftover tokens, 6 forward links to batch-6 pages only |

## Round-trip notes

Ceiled counts have no honest inverse, so they are declared rather than faked:
`fence` (length, spacing, gap, prices), `fence-material` (length, board width, gap),
`fence-picket` (length, width, gap), `fence-post-depth` (embed ratio — the `max()` rule decides
which one governs), `vinyl-fence` (length, panel width), `vinyl-fence-cost` (length),
`wood-fence` (length, picket width, gap), `baluster` (max gap), `spindle-spacing` (margin),
`box-fill` (conductors).

## Live check

| Page | Inputs → live values |
|---|---|
| fence | 100 ft, 8 ft centres, 3 rails → 14 posts · 13 sections · 210 pickets · $693 |
| gravel-driveway | 50 × 12 ft, 4 in, 110 lb/ft³, 5 % → 7.778 yd³ · 11.55 tons · $404.25 |
| vertical-curve | +2 % to −3 % over 500 ft → −5 % · K 100 · 200 ft · 3.125 ft |
| ladder-angle | 12 ft at a 3 ft base → 75.964° · 12.369 ft · 3 ft |

The negative grade calculating on the live site is the proof the `Widget.php` fix deployed.

## Next

Batch 6 — the last 27: HVAC, fluids, electrical and machining.
