# R87 — Is the answer right?

The question this round was not "does the page respond" but **"is the number on
screen, after Calculate, the correct number"**. Every conversion page in the
category was checked against an answer worked out independently of the page, and
three pages were giving a wrong figure. All three are fixed, live, and re-checked.

## What was checked

| Group | Pages | How the expected answer was produced |
| --- | --- | --- |
| Pair conversions (mi → km, kg → lb, …) | 158 | unit factors re-typed from the definitions into the harness, three inputs each |
| One-unit-in-many pages (mile → 9 units, …) | 63 | same re-typed factors, one input driving every column |
| Density pages | 28 | factor table × the density typed into the second box |
| Temperature | 9 | Kelvin as the pivot, hand-written |
| Money | 5 | coins per dollar, written out |
| Scale (number → million, billion) | 2 | powers of ten |
| Formula pages (Ohm's law, dBm, torque, mesh, ppm, …) | 42 | each worked by hand from the physics and typed into the harness with its inputs |
| Script pages (roman, bases, HSL→RGB, gematria, UTM, epoch, …) | 23 | re-implemented in Python and compared character by character |
| **Total** | **330** | |

Each unit page is driven at **1, 7.5 and 1234.5** — three magnitudes, so a factor
slip of ten, a hundred or a thousand cannot hide behind a plausible-looking
number. A reading passes only if it is within **half of the last digit the page
actually shows**, parsed through the `×10ⁿ` form as well. A blank box, a
non-number, or a number carrying the wrong unit fails. Below one, a reading with
fewer than three digits fails even when it is inside its own rounding — `0.025`
is inside the rounding of `0.0254`, and still throws the answer away.

Every output box on every page is covered by an expectation: the run reports
**0 pages with an unchecked output**, so no answer was skipped to make the
number look good.

## Result

```
330/330 pages give the right answer (3464 individual answers compared)
article tables: 5507 cells compared, 0 wrong
outputs not covered by an expectation: 0 pages
```

That is 3 464 panel readings and 5 507 numbers printed in the article tables,
all compared against values the pages did not supply.

**On the live site.** The browser run above is against the working tree. Two
further checks were made against `https://mcqsgenerator.com/tool`:

- `tools/conversion/deployed_qa.py` fetches all 330 pages from the live host and
  from the tested tree, pulls the `calc-definition` JSON out of both, and
  compares the formulas, field defaults and rounding rules: **330/330 identical,
  no mismatch** — the deploy is serving the arithmetic that was tested.
- A 33-page browser sample on the live host (every script page type, a wide
  slice of the formula pages, the pair, density, temperature, money and scale
  pages): **135 answers, 0 wrong**.

## The three pages that were wrong

### 1. Mile converter — a constant written with too few figures (195 pages)

| Input | On screen before | Correct |
| --- | --- | --- |
| 7.5 mi → cm | 1 207 005 | **1 207 008** |
| 1234.5 mi → cm | 198 673 023 | **198 673 517** |

The factor was being written into the formula with the prose formatter, which
keeps six significant figures: `160934` instead of `160934.4`. At one mile the
error is under half a centimetre and the display hides it; at 7.5 miles it is
three centimetres and shows.

The fix is `numf()` in `tools/conversion/gen.py`: a formula constant is written
at fifteen significant figures, while prose keeps its six. 195 of the 330 pages
had a constant rewritten; the pair tables now read `1 × 160934.4` and the panel
returns 160 934.4 cm for one mile.

### 2. Scale conversion — a factor of ten on the metres line

| Input | On screen before | Correct |
| --- | --- | --- |
| 10 cm on a 1:50 000 map → metres | 500 | **5 000** |

The centimetre-to-metre step was divided by 1000 instead of 100
(`tools/conversion/specs_d.py`). The kilometres line on the same page was
right, which is exactly the kind of disagreement a reader is expected to notice
and should not have had to.

### 3. The four-unit table in the article — 160934 instead of 160 934.4

The table under "Four units, seven values" was printed with the prose formatter,
so a mile read `160934` cm there while the panel read `160 934.4`. The cells now
use the panel's formatter and the table's own promise — that its figures agree
with the panel to the digit shown — is true.

## What was fixed in the harness, not the site

Recording these because a QA that quietly bends to pass is worth nothing:

- `×10` readings were parsed without their exponent at first, which failed
  correct scientific-notation answers (mile → nanometres).
- Five wrong expectations of mine were found and corrected before they were
  allowed to accuse the site: the lb/gal density factor, cubic feet in a ccf
  (100 ft³, not 0.3048³), the coin counts, the `changed` count of "Hello World"
  (2, not 8), and a box named `in` that the page calls `inches`.
- `--host` was accepted and then never assigned for a while, so a run labelled
  "production" was in fact reading localhost. The runs quoted above are from
  after that was fixed; the production statement therefore rests on the
  definition comparison and the 33-page live sample, both re-run afterwards.

## The rest of the gates

```
php tests/calc_files.php conversion   2 970 passed, 0 failed
php tests/solver.php                     76 passed, 0 failed
php tests/groups.php                     71 passed, 0 failed
php tests/toolkit.php                    40 passed, 0 failed
python3 tools/conversion/inventory_qa.py        RESULT: PASS
python3 tools/conversion/answer_qa.py           0 wrong (90 numbers + 9 exact readings)
```

## What this report does not claim

- Formula and script pages are checked at one hand-worked scenario each. A
  second scenario would catch a formula that is right at one input and wrong at
  another; the unit pages do carry three. If a further tightening is wanted,
  that is the next step, not something already proven here.
- Zero, negative and very large inputs are not part of this round. What the
  pages do with a blank box or a letter is the R85 error-handling report.
- The article prose is checked only where it prints numbers in a table; a
  sentence that describes a rule in words is not machine-checked.

## Re-running it

```bash
# working tree, needs the PHP built-in server on :8099
PHP_CLI_SERVER_WORKERS=6 php -S 0.0.0.0:8099 router.php &
python3 tools/conversion/correctness_qa.py --workers 4 --tables

# is the live site serving the tested formulas?
python3 tools/conversion/deployed_qa.py

# a sample of pages in a real browser against production
python3 tools/conversion/correctness_qa.py \
  --host https://mcqsgenerator.com/tool --workers 3 --tables \
  --slugs mile-conversion,scale-conversion,roman-numerals,gematria
```

`qa/R87_correctness.json` holds the per-page result and the output coverage;
`qa/R87_deployed.json` holds the live/local comparison.
