# Round 80 — Construction, batch 1

**26 of 158 built, verified and live.** Theme: brick, concrete, mortar and aggregate quantities.

## What shipped

| Group | Calculators |
| --- | --- |
| Masonry units | brick, concrete-block, concrete-block-fill |
| Concrete volume | concrete-slab, concrete-column, concrete-cylinder, concrete-stairs, concrete-tube, sonotube, post-hole-concrete, concrete-weight |
| Mixes and adhesives | cement, mortar, grout, thinset |
| Steel | rebar |
| Aggregates | gravel, crushed-stone, sand, stone, rock, river-rock, pea-gravel, landscape-rock, limestone |
| Cost | concrete-driveway-cost |

Each page: one PHP file under `plugins/calc/construction/`, a 1,500–2,500-word article, formula table with every rearrangement, 6 generic + 2 page FAQs, three related links, title 50–60 with `| Onim`, description 150–160.

## Bugs the QA layers found and fixed

1. **`ceil()` and floating-point noise — a site-wide fix.** `100 × 1.1 ÷ 10` evaluates to `11.000000000000002`, so eleven bags of thinset printed as twelve. `ceil` and `floor` now snap within 1e-9 of an integer in **both** `lib/Expr.php` and `assets/js/calc.js` (asset version 1.2.74). This affected every existing calculator, not just construction — the same trap sat in chemistry and biology wherever a bag count landed exactly on an integer.
2. **Concrete stairs were missing the waist slab.** The first draft sized only the step wedges — about a fifth of a real pour. The page now models the sloped waist slab (Pythagoras on the total run and rise) and the landing, which is the volume an estimator is actually buying.
3. **Concrete slab ignored its own waste box** in the volume formulas while applying it to the bag count, so the yardage and the bags disagreed.
4. **Concrete grout density constant was wrong by an order of magnitude** in the joint-volume conversion.
5. **45 prose figures were recomputed** against the formulas — scenario notes, worked examples and coverage claims that had been hand-derived at authoring time. Everything a reader can check on the page now matches the numbers the page prints.
6. **Mor­tar page now says what it assumes** — a fully bedded joint, which overstates face-shell bedded hollow block by about three times, with the site rule of thumb (2½ bags per hundred 8 in blocks) stated alongside.

## Evidence

| Layer | Result |
| --- | --- |
| `python tools/construction/build.py --write` | 26 specs, 26 written, 0 refused |
| `php tests/calc_files.php construction` | **234 passed, 0 failed** — titles 26/26, descriptions 26/26, computing 26/26, articles min 1 568 / median 1 728 words |
| `python tools/construction/qa.py` | **26/26 clean** — Python vs PHP agreement on defaults, 200 random input sets each, round trips, degenerate inputs, 26 hand-worked literature cases |
| `python tools/construction/browser_qa.py` | **26/26 pages clean in Chromium** — real typing, real clicks, no console errors |
| Live | `/tool/construction/{brick,concrete-stairs,mortar,gravel,sand}` all 200; typed values on production match — sand 0.679 yd³ / 18.333 ft³ / 0.917 t / 37 bags, thinset 11 bags / 550 lb |
| Regression | chemistry 972 passed, biology 2 872 passed — 3 844 assertions, 0 failed |

## Commits

- `ebc424e` Construction batch 1: 26 calculators
- `1d3182d` Round to integer counts without floating-point noise

## Next

Batch 2 — lumber, board feet, plywood, framing, joists, beams, roof pitch, rafters, shingles, stairs and angle geometry. Then batches 3–6 plus the seven slugs not yet in a batch (`board-on-board-fence`, `bowl-segment`, `box-fill`, `gravel-driveway`, `junction-box-sizing`, `sealant`, `tonnage`) to 158.
