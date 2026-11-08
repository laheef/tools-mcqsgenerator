# Construction — Batch 2 report (R80) — back-filled

This report was written at the close of batch 4. The batch itself shipped earlier as commit
**`2f010d0`** (pushed to `main`); its own report was missed at the time, so the numbers below are
re-derived from the code and from the pack-wide QA runs done at the 104-page milestone. Nothing
here is a memory of an older run — every figure was re-executed.

**Category total after this batch:** 52 of 158 (26 → **52**).
**Batch 2 range:** slugs 27–52 — framing, roofs, stairs and trim.

## What was added (26)

| File | Calculators |
|---|---|
| `specs_c2a.py` (9) | lumber, board-foot, lumber-weight, plywood, framing, floor-joist, wood-beam-span, beam-deflection, beam-load |
| `specs_c2b.py` (9) | roof-truss, rafter-length, birdsmouth-cut, roof-pitch, roof-shingle, roofing, gambrel-roof, snow-load, door-header-size |
| `specs_c2c.py` (8) | stairs, spiral-staircase, miter-angle, angle-cut, arch, shiplap, board-and-batten, decking |

Each page is a standalone `plugins/calc/construction/qm-calc-<slug>.php` generated from its spec:
the answer in one paragraph, every input, every result, the formula and its rearrangements, a
worked example built from `{result}` tokens, scenarios, pitfalls, unit notes, limits, uses, two
FAQs and three internal links.

## QA (re-run at the 104-page milestone)

| Layer | Result |
|---|---|
| `php tests/calc_files.php construction` | **936 passed, 0 failed** across all 104 pages (titles 50–60, descriptions 150–160, results compute) |
| `qa.py` round trip + degenerate + literature | **104/104 clean**; the 26 batch-2 slugs are covered, each with a hand-worked LITERATURE case |
| `browser_qa.py` batch-2 slugs | **26/26 clean** — defaults typed, Calculate pressed, results read back and compared with an independent evaluation |
| Article length, batch 2 only | min **1 661** / median **1 951** words, 0 thin |
| Link audit | 0 self-links, 0 leftover `{tokens}`; batch-2 pages link forward to `stairs`, `roof-pitch`, `decking` and the rest of the pack |

## Default outputs

| Slug | Defaults → results |
|---|---|
| lumber | 2 × 6 in × 8 ft × 10, $3.50 → 0.667 ft³ each · 6.667 ft³ total · 80 bd ft · $280 |
| board-foot | 6 × 2 in × 8 ft × 10, $4 → 80 bd ft · 6.667 ft³ · 80 ft · $320 |
| lumber-weight | 2 × 6 × 8 ft × 10, 32 lb/ft³ → 21.333 lb each · 213.333 lb total · 96.766 kg |
| plywood | 20 × 12 ft, 4 × 8 sheets, 20 % → 240 ft² · 9 sheets · $378 |
| framing | 20 ft × 9 ft, 16 in o.c. → 18 studs · 60 ft plate · 162 ft stud linear · 97.125 bd ft |
| floor-joist | 20 × 12 ft, 16 in o.c., 2 × 10 → 11 joists · 220 ft · 254.375 bd ft · 22 hangers |
| wood-beam-span | 3.5 × 9.25 in, 1 000 psi, 300 lb/ft → S 49.911 in³ · M 49 911.458 lb·in · span 10.532 ft |
| beam-deflection | 12 ft, 300 lb/ft, E 1.6 M psi, I 120 in⁴ → 0.729 in · L/197.5 · limit 0.4 in |
| beam-load | 10 ft tributary, 15 + 40 psf, 12 ft → 55 psf · 550 lb/ft · 6 600 lb · 3 300 lb |
| roof-truss | 30 ft long, 24 ft span, 24 in o.c., 6/12, 12 in overhang → 16 trusses · 14.534 ft rafter · 6 ft peak |
| rafter-length | 12 ft run, 6 ft rise, 18 in overhang → 15.093 ft · 6/12 · 26.565° · 1.118 |
| birdsmouth-cut | 6/12, 3.5 in seat, 9.25 in rafter → 26.565° · notch 1.75 in · limit 2.312 in · 7.5 in left |
| roof-pitch | 6 rise / 12 run → 6/12 · 26.565° · 1.118 · 13.416 ft rafter on 12 ft run |
| roof-shingle | 30 × 24 ft, 6/12, 10 % → 804.984 ft² · 8.05 squares · 27 bundles · 12.075 lb nails · $1 026 |
| roofing | 1 200 ft², 10 %, 3 bundles/square → 1 320 ft² · 13.2 squares · 40 bundles · 4 rolls · $1 520 |
| gambrel-roof | 24 ft span, 4/12 then 10/12, 30 ft → 7 ft rise · 379.473 / 468.615 ft² · 848.088 ft² |
| snow-load | 30 psf ground, 1.0 / 1.1 / 1.0, 30° → 23.1 psf roof · 34 650 lb total |
| door-header-size | 4 ft opening, 300 lb/ft, 1 000 psi → M 7 200 lb·in · S 7.2 in³ · 3.513 in · 4 in nominal |
| stairs | 108 in rise, 7.5 in riser, 10 in tread → 15 risers · 7.2 in actual · 11.667 ft run · 14.735 ft stringer |
| spiral-staircase | 108 in rise, 7.2 in riser, 30° tread → 15 treads · 1.25 turns · 11.781 in walkline |
| miter-angle | 90° joint, equal widths → 30.964° / 59.036° · 14.036° difference |
| angle-cut | 6 rise / 12 run → 26.565° · mitre 63.435° · ratio 6 |
| arch | 10 ft span, 2.5 ft rise → 6.25 ft radius · 106.26° · 11.591 ft arc · 17.472 ft² |
| shiplap | 200 ft², 6 in board, 1 in overlap, 8 ft, 10 % → 5 in exposure · 66 boards · 528 ft |
| board-and-batten | 200 ft², 6 in board + 2 in batten, 16 in spacing → 55 boards · 21 battens · 608 linear ft |
| decking | 203.864 ft², 5.5 in board, ¼ in gap, 12 ft, 10 % → 39 boards · 468 ft · $546 |

## Notes

- The batch introduced the two-part framing family (span vs deflection vs load), the roof family
  (pitch → rafter → cut → shingles), and the layout/trim family (stairs, miters, arcs, boards).
  All three are reused as internal-link targets by every later batch, which is why they were
  worth doing before surfaces and costs.
- Ceiled quantities (`sheets`, `bundles`, `boards`, `trusses`) are deliberately not inverted; they
  are listed in each spec's `no_round_trip`, so `qa.py` round-trip checks stay meaningful.
