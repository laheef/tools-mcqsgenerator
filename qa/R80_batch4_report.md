# Construction — Batch 4 report (R80)

**Commits:** `c67a736` (4a, 87 pages) · `297f663` (4b, 96 pages) · `c64bba0` (4c, 104 pages), all pushed to `main`.
**Category total:** 158 planned, **104 built** (28 → 52 → 78 → **104**).
**Batch 4 range:** slugs 79–104 — surfaces, finishes, areas and cost estimators.

## What was added (26)

| File | Calculators |
|---|---|
| `specs_c4a.py` (9) | paint, wallpaper, tile, carpet, flooring, stair-carpet, deck-stain, fence-stain, epoxy |
| `specs_c4b.py` (9) | asphalt, paver, paver-sand, drywall, siding, vinyl-siding, wainscoting, square-footage, wall-square-footage |
| `specs_c4c.py` (8) | square-meter, square-yard, square-yards, floor-area-ratio, metal-roof-cost, diy-shed-cost, insulation, gallons-per-square-foot |

Same framework as biology and chemistry: `tools/construction/specs_c4*.py` → `build.py --write` →
one `plugins/calc/construction/qm-calc-<slug>.php` per calculator, article + SEO + internal links
generated from the spec, no hand-edited page bodies.

## QA layers

| Layer | Result |
|---|---|
| `build.py --write` | 104 specs, **104 written, 0 refused** |
| `php tests/calc_files.php construction` | **936 passed, 0 failed** (titles, descriptions, results computing) |
| `qa.py` round trip + degenerate + literature | **104/104 clean**, LITERATURE **104 slugs / 104 hand-worked cases** |
| `browser_qa.py` (Chromium, real page + Calculate click) | batch 4: **26/26 clean**; batch 2 re-run: **26/26 clean** |
| Article length | words min **1 507** / median **1 667** / mean **1 670**; thin (<300): **0** |
| Link audit | **0** self-links, **0** leftover `{tokens}`; forward links to batch 5–6 pages only |

## Fixes made during the batch

- **stair-carpet** description was 149 characters and the build refused it; rewritten to 156.
  Its `per_step`, `run`, `area_ft2` and `cost` also round-tripped as `None` on the first pass and
  the `steps` inverse did not invert (ceiled input) — cleared once the formulas were rebuilt;
  `steps` is not inverted.
- **wainscoting** `panel_area` had a mangled expression (`wal*0+1`); corrected to the panel
  rectangle, and `panels` moved to `no_round_trip` because the panel count is a ceiled input.
- **paver** inverse produced a joint width from a ceiled paver count and **paver-sand** the same
  from its bag count → both inverses dropped and listed in `no_round_trip` (`joint`, `density`).
- **drywall** `sheet_area` was a fixed constant (`"0"` inverse) → dropped from round trip.
- **diy-shed-cost** `roof_area` carried a redundant `…*0+0` prefix and three `"0"` inverses
  (`slab_price`, `wall_price`, `roof_price`); the formula now uses the pitch length once with the
  overhang, and all three prices invert from the total cost. Only `overhang` stays in
  `no_round_trip`.
- **paver prose was wrong, not the formula:** the article claimed ~2.8 blocks per square foot for
  a 4 × 8 block. With the ⅛ in joint the module is 8.125 × 4.125 in = 0.23275 ft², i.e. **4.53
  per ft²**, so a 100 ft² patio is ~473 blocks. The `why`, `reading` and the FAQ were rewritten to
  match (the calculator never changed).
- **diy-shed-cost** linked to `/construction/shed-cost`, which is not a catalogue slug; retargeted
  to `/construction/square-footage`.
- **Forward links** to `fence`, `fence-perimeter`, `fence-post-depth`, `gravel-driveway`,
  `heat-loss`, `ramp-slope`, `ladder-angle` and `retaining-wall` stay as written — every one of
  those slugs is in the 158-calculator catalogue and resolves when batches 5–6 ship.

## Default outputs

| Slug | Defaults → results |
|---|---|
| paint | 12 × 10 ft, 8 ft, 2 doors, 2 windows, 2 coats, 350 ft²/gal → wall 352 · net 280 · 1.6 gal · 2 cans · $76 |
| wallpaper | 12 × 10 ft, 20.5 in × 33 ft roll → perimeter 44 · strips 26 · 4 per roll · 7 rolls · $315 |
| tile | 10 × 10 ft, 12 in tile, ⅛ in gap, 10 % → 1.021 ft² per tile · 87 tiles · 9 boxes · $378 |
| carpet | 15 × 12 ft, 10 % → 180 ft² · 20 yd² · 22 yd² ordered · $396 |
| flooring | 14 × 11 ft, 10 %, 20 ft²/box → 154 ft² · 169.4 ordered · 8 boxes · $464 |
| stair-carpet | 14 steps, 7.5 in rise, 10 in tread, 1 in nosing → 18.5 in per step · 60.125 ft² · $231.48 |
| deck-stain | 16 × 12 ft, 40 ft rail, 3 ft, 2 coats → 449.5 ft² · 3.596 gal · $180 |
| fence-stain | 100 ft × 6 ft, 2 faces, 2 coats → 1 200 ft² · 12 gal · 12 cans · $504 |
| epoxy | 20 × 20 ft, 2 coats, 250 ft²/kit, 10 % → 880 ft² coated · 4 kits · $480 |
| asphalt | 10 × 10 ft, 3 in, 145 lb/ft³, 5 % → 4.667 yd³ · 9.135 tons · $1 096.2 |
| paver | 16 × 12 ft, 4 × 8 block, ⅛ in joint, 10 % → 0.233 ft²/block · 908 pavers · $1 271.2 |
| paver-sand | 100 ft², 1 in, 100 lb/ft³, 10 % → 18.333 ft³ · 0.917 tons · 37 bags · $222 |
| drywall | 14 × 12 ft, 8 ft, 10 % → 448 ft² · 16 sheets · 44.8 lb mud · 224 ft tape · $256 |
| siding | 40 ft × 9 ft, 4 windows, 10 % → 279 ft² net · 3.069 squares · $982.08 |
| vinyl-siding | 40 ft × 9 ft, 60 ft² openings → 360 ft² · 50 panels · 158 ft trim · $1 095 |
| wainscoting | 10 ft wall, 4 panels, 4 in stile → 24 in panel · 20.833 ft² · 2 ft stile run |
| square-footage | 12 × 10 ft, 3 rooms, $1.5 → 120 ft² · 13.333 yd² · 11.148 m² · $540 |
| wall-square-footage | 14 × 12 ft, 9 ft, 2 doors, 3 windows → perimeter 52 · 468 gross · 87 openings · 381 net |
| square-meter | 5 × 4 m, 1, $22 → 20 m² · 215.278 ft² · perimeter 18 · $440 |
| square-yard | 15 × 12 ft → 20 yd² · 180 ft² · perimeter 54 · $400 |
| square-yards | 200 ft², 10 %, $20 → 22.222 yd² · 18.581 m² · 24.444 ordered · $440 |
| floor-area-ratio | 8 000 ft² plot, 2 000 ft² footprint, 2 floors → 4 000 · FAR 0.5 · coverage 0.25 · open 0.5 |
| metal-roof-cost | 40 × 24 ft, 6/12, 36 in panels, 10 %, $90 → 1 073.313 ft² · 33 panels · $2 805 |
| diy-shed-cost | 8 × 10 ft, 7 ft wall, 2 ft rise, 1 ft overhang → 252 ft² wall · 139.943 ft² roof · $4 503.66 |
| insulation | 1 000 ft², 12 in, R-3.7/in, 40 ft²/bag → R-44.4 · 1 200 ft³ · 30 bags · $540 |
| gallons-per-square-foot | 10 × 8 ft, 6 in deep → 40 ft³ · 299.221 gal · 3.74 gal/ft² |

## Live check (after the push)

Playwright against `https://mcqsgenerator.com/tool/construction/<slug>`:

| Page | Live values |
|---|---|
| square-meter (6 × 4 m, $25) | 24 m² · 258.334 ft² · perimeter 20 · $600 |
| floor-area-ratio (10 000 / 2 500 / 3 floors / 5 000 open) | 7 500 · FAR 0.75 · coverage 0.25 · open 0.5 |
| metal-roof-cost (40 × 24, 6/12, 36 in, 10 %, $90) | 1.118 · 1 073.313 ft² · 33 panels · $2 970 |
| insulation (1 000 ft², 12 in, R-3.7/in, 40 ft²/bag, $18) | R-44.4 · 1 000 ft³ · 25 bags · $450 |

All four return HTTP 200 with the live titles (`Square Meter Calculator: Area in m² and ft² | Onim`,
`Floor Area Ratio Calculator: FAR and Coverage | Onim`, `Metal Roof Cost Calculator: Panels and
Price | Onim`, `Insulation Calculator: R-Value and Bags Tool | Onim`), and the numbers match the
local engine run to three decimals.

## Next

Batch 5 — 26 fence, grade and layout calculators (`fence` … `sag`). Batch 6 closes the category
at 158. Batch 2 report is back-filled alongside this one.
