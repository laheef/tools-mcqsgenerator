# Construction — Batch 3 report (R80)

**Commit:** `ffa5ce8` "Construction batch 3: 26 volume, weight and landscape calculators" — pushed `2f010d0..ffa5ce8`, live-verified.
**Category total:** 158 planned, **78 built**.

## What was added

26 calculators in three spec files, all authored against the same framework used for
biology and chemistry (`tools/construction/lib.py` → `build.py` → one PHP file each).

| File | Calculators |
|---|---|
| `specs_c3a.py` (9) | cubic-yard, ft2-yd3, hole-volume, tank-volume, pool, round-pool-volume, pond, pipe-volume, size-to-weight-rectangular-cuboid |
| `specs_c3b.py` (8) | steel-weight, steel-plate-weight, plate-weight, metal-weight, aluminum-weight, glass-weight, log-weight, pipe-weight |
| `specs_c3c.py` (9) | road-base, rip-rap, fire-glass, round-pen, hoop-house, chicken-coop-size, trump, bowl-segment, sealant |

Each page carries: the answer in one paragraph, a full input list, every result, the formula
and each rearrangement, a worked example, a sensitivity/scenario set, pitfalls, unit notes,
limits, uses, two FAQs, and three internal links.

## Framework change: `{result}` tokens

`build_article()` in `lib.py` now substitutes `{result_key}` (and `{result_key|unit}`) inside
prose from the **solved defaults**, so a worked example can no longer drift from the formula
it describes. Unknown keys are left alone; the build refuses nothing on their account, and a
post-build scan confirms **0 leftover tokens across all 78 articles**.

## QA layers

| Layer | Result |
|---|---|
| `build.py --write` | 78 specs, **78 written, 0 refused** |
| `php tests/calc_files.php construction` | 78 files · titles 78/78 · descs 78/78 · computing 78/78 · words min 1 507 / median 1 670 · **702 passed, 0 failed** |
| `qa.py` (round trip, degenerate, literature) | **78/78 clean**, LITERATURE now **78 slugs / 78 independent hand-computed cases** |
| `browser_qa.py` (Chromium, real page + click) | **78/78 clean** |

Literature cases are worked from the geometry and the hand tables, not from the formulas —
e.g. `pipe-weight` 3.5 in OD × 0.216 wall → 7.584 lb/ft; `hoop-house` 30×14, 5 ft wall, 5 ft
rise → 1 026.14 ft² cover and 30 784.2 BTU/h; `bowl-segment` ten segments on a 5 in radius →
18° and a 3.249 in outer edge.

## Fixes made during the batch

- **cubic-yard** inverse divided by 144 instead of 12 (round-trip failure); corrected.
- **round-pen** panel length has no meaningful inverse once `ceil` is applied → `no_round_trip`.
- **steel-weight / metal-weight / fire-glass** originally used a text `select`, which the
  shared expression engine does not evaluate; replaced with a numeric **section factor**
  (0.785 round, 1.000 square, 0.866 hex) so PHP, Python and the browser all agree.
- **fire-glass** defaults re-weighted to a 2 in bed so the preview and the first screen agree
  (3.14 ft², 0.523 ft³, 52.33 lb).
- **hoop-house** cover formula had the gable-end term counted twice; the envelope is now
  side walls + two roof slopes + two gable ends (682.133 ft² at defaults).
- **Internal links:** `concrete-stairs → stairs` (the `/concrete-stair` slug does not exist in
  the catalogue) and `arch` no longer links to itself. Audit now reports **0 dangling,
  0 self-references**, with 80 forward links to pages still to be built.

## Default outputs (spot list)

| Slug | Defaults → results |
|---|---|
| cubic-yard | 10 × 10 ft × 4 in → 33.333 ft³ · 1.235 yd³ · 0.944 m³ |
| ft2-yd3 | 100 ft², 4 in, 10 % → 36.667 ft³ · 1.358 yd³ · 62 bags |
| hole-volume | 12 in × 36 in → 2.356 ft³ · 0.087 yd³ · 17.626 gal |
| tank-volume | 4 × 2 × 1.5 ft → 12 ft³ · 89.766 gal · 339.802 L |
| pool | 24 × 12 ft, 3→6 ft → 4.5 ft avg · 1 296 ft³ · 9 694.754 gal |
| pond | 20 × 12 ft, 4 ft, 0.6 → 2.4 ft avg · 576 ft³ · 4 308.78 gal · 0.013 acre-ft |
| pipe-volume | 2 in bore × 100 ft → 2.182 ft³ · 16.32 gal · 0.163 gal/ft |
| steel-weight | 1 in round × 20 ft → 0.785 in² · 53.43 lb |
| steel-plate-weight | 48 × 24 × ¼ in → 8 ft² · 81.677 lb · 10.21 lb/ft² |
| metal-weight | 2 in round × 12 in → 3.14 in² · 10.686 lb |
| glass-weight | 36 × 48 × ¼ in → 12 ft² · 39.744 lb · 3.312 lb/ft² |
| log-weight | 12 in × 8 ft, 0.7, 40 lb/ft³ → 4.398 ft³ · 175.929 lb |
| pipe-weight | 2.375 OD × 0.154 × 21 ft → 2.067 ID · 3.657 lb/ft · 76.794 lb |
| road-base | 100 × 10 ft × 6 in, 20 %, 120 lb/ft³ → 22.222 yd³ · 36 tons · $900 |
| rip-rap | 8 ft/s, 0.86, 500 ft², 1.5 ft → 16.137 in rock · 27.778 yd³ · 61.875 tons |
| fire-glass | 24 in round, 2 in, 100 lb/ft³ → 3.14 ft² · 0.523 ft³ · 52.333 lb |
| round-pen | 50 ft, 12 ft panels → 157.08 ft · 14 panels · $2 520 |
| hoop-house | 24 × 12, 4 ft wall, 4 ft rise → 682.133 ft² · 1 728 ft³ · 24 556.785 BTU/h |
| chicken-coop-size | 6 + 2 bantams → 7.34 birds · 29.36 ft² coop · 73.4 ft² run |
| bowl-segment | 12 segments, 6 in radius → 15° · 3.215 / 2.412 in · 4.22 in³ |
| sealant | 60 ft × ⅜ × ¼ in, 310 mL → 1 106.129 mL · 4 tubes · $48 |

## Live check (after the push)

Playwright against `https://mcqsgenerator.com/tool/construction/<slug>`, full input set on each page:

| Page | Live values |
|---|---|
| pipe-weight (3.5 OD, 0.216 wall, 21 ft) | ID 3.068 · 7.584 lb/ft · 159.263 lb |
| road-base (80 × 12 ft, 8 in, 15 %, 110 lb/ft³, $30) | 27.259 yd³ · 40.48 tons · $1 214.4 |
| sealant (40 ft, ½ × ⅜ in, 600 mL, 10 %, $20) | 1 474.839 mL · 3 tubes · $60 |
| steel-weight (1.5 in square, 10 ft, 2 bars) | 2.25 in² · 153.144 lb |
| hoop-house (30 × 14, 5 ft wall, 5 ft rise, 25 °F) | 1 026.14 ft² · 30 784.185 BTU/h |

Zero console errors on all five.

## Next

Batch 4 — 26 surface-and-finish calculators (paint, wallpaper, tile, carpet, flooring, stair-carpet,
deck-stain, fence-stain, epoxy, asphalt, paver, paver-sand, drywall, siding, vinyl-siding, wainscoting,
square-footage, wall-square-footage, square-meter, square-yard, square-yards, floor-area-ratio,
metal-roof-cost, diy-shed-cost, insulation, gallons-per-square-foot).
