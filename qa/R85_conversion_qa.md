# Round 85 — a proper QA pass over the conversion category

This round did not add calculators. It went back over the 330 that shipped in
R84 and asked three questions the earlier round never asked properly: does every
one of them have its own file, does every one survive a visitor typing nonsense,
and does every one give the **right** number. The third question found real
faults, which are now fixed and deployed.

---

## 1. Does every conversion calculator have a separate PHP file?

**Yes. All 330. Nothing in this category is still running through the generic
widget.**

Four independent lists were compared, and the answer is the same from each:

| Source | Count |
| --- | --- |
| Inventory rows, `data/calc/batch-*.ndjson` with `cat = conversion` | 330 |
| Content pages, `data/content/conversion/*.json` | 330 |
| Separate files, `plugins/calc/conversion/qm-calc-*.php` | 330 |
| Live category index at `/tool/conversion` | 330 cards |
| Live `/tool/sitemap.xml`, conversion URLs | 330 |

Every file also names the route it serves in its own header comment, and all 330
name the route that matches their filename — a copied-and-not-edited file keeps
the old route in that line, and none does.

There is no other route into a conversion calculator: a crawl of the live
category index, `/tool/calculators` and `/tool/all-calculators` found no
`/tool/c/<id>`-style link and no conversion calculator listed outside
`/tool/conversion/<slug>`.

Reproduce it with:

```
python3 tools/conversion/inventory_qa.py --live
```

```
inventory rows (cat=conversion)   330
content JSON pages                330
separate PHP files                330

WITHOUT A SEPARATE PHP FILE: 0

all 330 files claim their own slug and /conversion/<slug> path
live category index cards         330
live sitemap conversion URLs      330
RESULT: PASS
```

---

## 2. Error handling, on every page

`tools/conversion/error_qa.py` loads each of the 330 pages in Chromium and puts
it through seven situations a visitor can create. **330/330 handled every one
cleanly.**

| Case | What the visitor does | What the page must do | Result |
| --- | --- | --- | --- |
| empty | clears every box | no answer, no `NaN`, no exception | 330/330 |
| zero | types 0 everywhere | no `NaN`, no `Infinity` | 330/330 |
| huge | types 1 000 000 000 000 everywhere | no overflow to `Infinity` in a box | 330/330 |
| negative | types −5 everywhere | no `NaN`, no crash | 330/330 |
| letters | types `abc` in a number box | the letter never lands, a note appears **under that box** | 330/330 |
| garbage | leaves `12abc` in the box (paste, autofill, drag) | either cleaned or flagged, never `NaN` | 330/330 |
| markup | types `<script>alert(1)</script>` in a text box | never executed, never injected as HTML | 330/330 |

Two details worth writing down, because they are easy to get wrong and the
harness had to be taught both:

- **The pages open blank on purpose.** The stored default is a placeholder; the
  results panel waits for a real figure. So "does it answer" has to be asked
  after typing something, not on load.
- **The validation note is cleared by the next Calculate press** where the field
  is merely empty, which is correct: nothing is wrong with an empty optional
  box. The note that matters — the one the visitor sees the instant they type a
  letter — appears at the door, before any press.

Error text is never generic: `Numbers only — this box takes digits, one decimal
point and a minus sign.` sits inside the field that refused it, and the field is
marked `aria-invalid`.

---

## 3. Are the answers right? No — and this is what the round found

R84's sweep asked "did a number appear". It never asked whether the number was
the right one. **63 of the 330 pages were answering backwards.**

### The multi-unit pages

Every page in the "one figure in, every unit out" shape carries eight constants.
They were generated as `target.factor / source.factor`, which is how many of the
*target* unit fit into one *source* unit — the reciprocal of what the page
needs.

Measured on the shipped site:

| Page | Typed | Showed | Should be |
| --- | --- | --- | --- |
| Mile Converter | 1 mile | 0.000 621 km | 1.609 344 km |
| Gallon Converter | 1 US gallon | 0.264 L | 3.785 L |
| Micrometre Converter | 1 000 µm | 10¹² m | 0.001 m |
| Light Year Converter | 1 light-year | 1.057 ×10⁻¹⁶ km | 9.461 ×10¹² km |
| Acreage | 1 acre | 0.000 247 m² | 4 046.856 m² |

All 63 were affected, 467 constants in total. The article on each page was
consistent with the formula — the table, the prose and the panel all agreed with
each other and all agreed on the wrong number — which is exactly why the page
looked healthy.

**Fix:** one line in `tools/conversion/make.py`,

```python
formula = {u.key: f"value * {num(a.factor / u.factor)}" for u in outs}
```

and the same correction in the worked table beneath it, then the whole category
was regenerated.

### A second fault, found on the way

`num()` wrote anything smaller than one with six *decimal places*. For a factor
like 0.000621371 that keeps three significant digits, so even after the
direction was fixed a mile would have lost its kilometre in the seventh digit.
Anything below one is now written with six *significant* figures.

### A third fault

`kelvin-to-fahrenheit` was named, titled and `<h1>`'d **"Kelvin to Celsius
Converter"** — the naming rule guessed the target from the first word of the
slug. It is now named from both halves of the slug. All 330 pages were checked:
name and `<h1>` agree everywhere, and every one of the 158 two-unit pages names
both of its units.

---

## 4. How correctness is now proven

`tools/conversion/answer_qa.py`, two independent passes.

**Pass 1 — static, 263 pages.** Every constant in every shipped file is
recomputed from the unit definitions and compared. Nothing is taken on trust
from the page being checked.

| Shape | Pages | Checked |
| --- | --- | --- |
| two-unit pair | 158 | result constant = `a.factor / b.factor`; base constant = `a.factor` |
| multi-unit | 63 | all 8 constants per page |
| mass ↔ volume with density | 28 | the whole expression, at 1 kg/L |
| temperature | 9 | four readings × four probe values, against Kelvin |
| coins | 5 | one division per page |

**Pass 2 — browser, 90 hand-checked conversions.** Values that are exact by
treaty or definition, not copied from this project: the international inch at
25.4 mm, the pound at 0.453 592 37 kg, the US gallon at 3.785 411 784 L, the acre
at 4 046.856 422 4 m², one atmosphere at 101 325 Pa, 760 torr = 1 atm, 30 dBm =
1 W, 300 N·m at 3 000 rpm = 94.25 kW = 126.39 hp, Sydney at UTM 56S
334 368.63 / 6 250 948.35.

```
static formula audit: 158 pair + 63 multi + 28 density + 9 temperature + 5 money = 263 pages
  0 wrong

browser anchors: 90 hand-checked conversions
  0 wrong

RESULT: PASS
```

Run against production as well, not only the local server:

```
python3 tools/conversion/answer_qa.py --host https://mcqsgenerator.com/tool
```

Same result: **0 wrong**.

### What is not covered by a static rule, and why that is acceptable

67 pages have a formula with a constant of its own rather than a unit ratio: the
2 round-number pages, 42 mixed calculators (`pixels-to-inches`,
`torque-to-horsepower`, `psi-to-gpm` …) and the 23 script pages. A static rule
cannot invent the right constant for those, so they are covered by 24 of the 90
browser anchors, by `js_qa.py` (23/23 fixtures executed through the page's own
JavaScript), and by the all-page browser sweep below.

---

## 5. Everything else, re-run after the fix

| Check | Result |
| --- | --- |
| `php tests/calc_files.php conversion` | **2,970 passed, 0 failed** — titles 330/330, descriptions 330/330, computing 330/330 |
| `php tests/calc_files.php` (whole site) | **8,236 passed, 0 failed** |
| Article length, site counter | min 1,502 · median 2,005 · max 2,299 |
| `qa.py` | 330/330 pages answer |
| `js_qa.py` | 23/23 script fixtures |
| `browser_qa.py` | 330/330 pages answer and move when an input changes |
| `error_qa.py` | 330/330 handled all seven cases |
| `voice_qa.py` | 0 house words, 0 uniform-rhythm pages, 330 checked |
| `inventory_qa.py --live` | 330 = 330 = 330 = 330 |

### On production, after deployment

| Check | Result |
| --- | --- |
| Every page loaded in a real browser, a value typed, a number read | **330/330** |
| The 90 hand-checked conversions | **90/90** |
| Spot checks after the fix | 1 mile = 1.609 km · 1 gal = 3.785 L · 1 000 µm = 0.001 m · 1 ly = 9 460 730 000 000 km · 273.15 K = 32 °F · 1 acre = 4 046.856 m² |

---

## 6. One thing left as it is, deliberately

The results panel prints **at most three decimals** (`MAX_DECIMALS` in
`assets/js/calc.js`). For a conversion whose answer is smaller than that, the
third decimal is all you see: one inch reads `0.025 m`, and the fourth digit is
below what any box prints. Values under a thousandth switch to scientific
notation, so nothing is ever rounded to a bare `0`.

This is the site-wide rule and it was left alone. It is worth knowing when
reading a small conversion, and worth revisiting only if the rule itself
changes.

---

## 7. The honest lesson

R84 ended with "330/330 pages answered in a real browser" — true, and not
enough. Answering is not the same as answering correctly, and a page whose
formula, table and prose all agree can still be confidently backwards. The
instrument that would have caught it is the static audit: recompute every
constant from the definitions instead of asking the page whether it feels well.

That instrument is now part of the category, along with the error-handling
matrix and the file inventory, and each takes minutes to re-run.
