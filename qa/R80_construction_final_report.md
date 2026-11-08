# Construction — category complete (R80 final report)

**All 158 construction calculators are built, tested and live.**
`https://mcqsgenerator.com/tool/construction` reports **158 calculators**, and every one of the
158 URLs returns HTTP 200.

## Ship state

| Commit | Scope | Running total |
|---|---|---|
| early R80 | construction 1–26 (framing) | 26 |
| `2f010d0` | batch 2 — framing, roofs, stairs, trim | 52 |
| `ffa5ce8` | batch 3 — volume, weight, landscape | 78 |
| `c67a736` | batch 4a — paint, paper, tile, carpet, stain | 87 |
| `297f663` | batch 4b — paving, drywall, siding, areas | 96 |
| `c64bba0` | batch 4c — areas, FAR, metal roof, shed, insulation | 104 |
| `76c6db0` | QA reports (batches 2 and 4, back-filled) | 104 |
| `da2f76d` | batch 5 — fences, site grades, drainage, layout | 131 |
| `aec39b0` | batch 6 — HVAC, fluids, electrical, machining | **158** |

Every page is a standalone file, `plugins/calc/construction/qm-calc-<slug>.php`, generated from
a spec in `tools/construction/specs_*.py` — the same pipeline used for biology (320) and
chemistry (108).

## Final verification

| Layer | Result |
|---|---|
| `build.py --write` | **158 specs, 158 written, 0 refused** |
| `php tests/calc_files.php construction` | **1 422 passed, 0 failed** — titles in window 158/158, descriptions 158/158, every page computes 158/158 |
| `php tests/calc_files.php` (all 559 pages) | **5 266 passed, 0 failed** |
| `qa.py` (round trip, degenerate inputs, literature) | **158/158 clean**, **158 independently worked LITERATURE cases** |
| `browser_qa.py` (Chromium: type the page's own values, click Calculate, read the boxes back) | **158/158 across the six batches** (26 + 26 + 26 + 26 + 27 + 27) |
| Article length | min **1 507** / median **1 627** / mean **1 644** words; 0 thin |
| Link audit | **0** dangling internal links, **0** self-links, **0** unfilled tokens |
| Live crawl | **158/158 HTTP 200** on `mcqsgenerator.com/tool/construction/<slug>` |

Live spot-checks with Playwright reproduced the local engine to three decimals on every batch;
the last batch's checks are in `R80_batch6_report.md`.

## What each page carries

One calculator per file: the answer in a paragraph, every input with its unit, every result,
the formula and each rearrangement that has a meaningful inverse, a worked example built from
`{result}` tokens so prose cannot drift from the maths, two or three scenarios, pitfalls, unit
notes, limits, uses, two FAQs, and three internal links. Titles sit in the 50–60 character
window with the brand, descriptions in 150–160, one H1, canonical, structured data, and no
deprecated rich-result markup.

## Framework work that came out of the category

- **`lib.fill()`**: `{input|unit}` tokens now resolve an input's unit instead of printing the
  word "unit" (found by reading a built page in batch 5).
- **`lib/Widget.php`**: percentage inputs labelled *grade*, *gradient* or *slope* are no longer
  clamped to 0–100, because a falling grade is negative (found by the browser pass on
  `vertical-curve`).
- **`snapInt` / `ceil` handling** kept ceiled quantities out of round-trip claims rather than
  inventing inverses for them.
- **`no_round_trip`** is now used deliberately across the fencing, paving and layout pages, so
  the round-trip test keeps testing what actually inverts.

## Coverage

158 of 158 in the catalogue, across framing, roofs, stairs, trim, volume, weight, landscape,
surfaces, finishes, paving, drywall, siding, areas, planning ratios, roofs, insulation, fencing,
site grades, drainage, layout, HVAC, fluids, electrical and machining. None were dropped and
none were left as placeholders.

## Known gaps (nothing that blocks a user)

- The WordPress front site's `/tools/` listing is a separate property from the app and currently
  renders a PHP error page; the app's own category page (`/tool/construction`) is correct and
  shows 158. That page was already outside the calculator work.
- Two forward links written in earlier batches now resolve; the audit reports zero dangling.
