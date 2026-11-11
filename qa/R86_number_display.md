# Round 86 — what a result reads like

R85 closed with a deliberate exception: the results panel printed at most three
decimals, so a conversion answering in a small number lost the digits that
matter. One inch read `0.025 m`. A kilometre in miles read `0.621`. The fourth
figure was computed, stored in the solver and then thrown away at the last step.

This round fixes it, in the one place where the display is decided.

---

## The old rule, and why it was there

The harvested rounding asks for a step of `0.0001` on most pages, and the panel
used to honour it: `3.3333`, `0.1837`, `1.66668`. A flat cap of three made the
panel easier to scan and stopped the same page disagreeing with itself when a
number was rounded in the box but not in the row beside it. For a figure of one
and above that is still the right call — nobody needs a fourth decimal on 22.86.

It was the wrong call below one, where the leading zeros are not precision but
scale:

| Page | Typed | Old reading | Now |
| --- | --- | --- | --- |
| Inches to Metres | 1 in | `0.025 m` | **`0.0254 m`** |
| Kilometres to Miles | 1 km | `0.621 mi` | **`0.6214 mi`** |
| Pounds to Kilograms | 1 lb | `0.454 kg` | **`0.4536 kg`** |
| Grams to Ounces | 1 g | `0.035 oz` | **`0.03527 oz`** |
| Litres to Gallons | 1 L | `0.264 gal` | **`0.2642 gal`** |

---

## The new rule

Three sentences, applied in `assets/js/calc.js` (`formatNumber`, `plainNumber`)
and mirrored in `lib/Widget.php` and `lib/Format.php` so that the box, the
results row and the sentence inside the article print the same digits:

1. **One and above** — at most **three decimals**, unchanged. `22.8571` reads
   `22.857`; `1.609 344` reads `1.609`.
2. **Below one** — **four significant figures**, never more than six decimals.
   Twelve decimals are not offered and four are not dropped.
3. **Below a thousandth** — `×10ⁿ` with four figures in the mantissa:
   `6.214 ×10⁻⁴`, `1.000 ×10⁻⁹`.

A `standard` precision — an author's explicit decimal count — is left exactly as
written. Only `omni` rounding, where the precision is a step and the cap was the
only thing standing between the reader and the fourth figure, gets the wider
treatment.

The rounding itself is unchanged. `0.0001` is still the step; the change is how
much of the correctly rounded number is printed.

---

## Where it lives

| File | Function | Change |
| --- | --- | --- |
| `assets/js/calc.js` | `smallDecimals()`, `formatNumber()`, `plainNumber()` | four figures below one; the mantissa of `×10ⁿ` fixed at four figures |
| `lib/Widget.php` | `plainNumber()`, `sciText()` | the same rule and the same scientific text, so a server-rendered box and a solved one agree |
| `lib/Format.php` | `number()` | the same rule for numbers interpolated into a sentence |
| `config.php` | `ASSET_VERSION` | `1.2.74` → `1.2.75`, so browsers fetch the new script |

`docs/calc-files.md` now carries the rule under **What a result reads like**, so
the next calculator written inherits it rather than rediscovering it.

---

## Verified

| Check | Result |
| --- | --- |
| `php tests/solver.php` | **76 passed, 0 failed** — five new cases pin `0.0254`, `0.6214`, `0.4536`, `0.9144` and `6.214 ×10^-4` |
| `php tests/calc_files.php conversion` | 2,970 passed, 0 failed (computing 330/330) |
| `php tests/calc_files.php` (whole site) | 8,236 passed, 0 failed |
| `qa.py` · `js_qa.py` · `browser_qa.py` · `error_qa.py` | 330/330 · 23/23 · 330/330 · 330/330 |
| `answer_qa.py` | 263-page static audit **0 wrong**; 90 numbers **0 wrong**; **9 exact readings 0 wrong** |
| `voice_qa.py` · `inventory_qa.py` | 0 rules tripped · PASS |

The nine exact readings are new and are the point of the round: they compare the
*string* in the box, not a tolerance.

```
inch-to-meter            1 in  -> 0.0254
mil-to-mm-conversion     1 mil -> 0.0254
kilometers-to-miles      1 km  -> 0.6214
lbs-to-kg-converter      1 lb  -> 0.4536
g-to-oz                  1 g   -> 0.03527
l-to-gal                 1 L   -> 0.2642
mile-conversion          1 mi  -> 1.609     (unchanged above one)
micrometer-conversion    1 µm  -> 1.000 ×10^-6, 0.001
meters-to-feet           3 m   -> 9.843
```

---

## One thing that changed on the way, and was already wrong

`Widget::plainNumber()` says in its own docblock that it must match
`plainNumber()` in `calc.js` **exactly**, and it did not: the JS capped at three
decimals, the PHP did not. The server renders those boxes blank, so nobody saw
the disagreement — but the next server-rendered box would have shown `22.8571`
where the page's own script shows `22.857`. Both now apply the same rule.

A stale expectation in `tests/solver.php` was also found and corrected while
running the suite: it asked for a result called `area_rec` on
`construction--square-footage`, a name that page no longer has (it reports
`area_ft2`, `area_yd2`, `area_m2`, `cost`). The test had been quietly failing on
`main` and the calculator was fine. It now checks `area_ft2 = 40` and
`area_yd2 = 40/9` for a 5 × 4 ft job over two rooms.

---

## What did not change

* The rounding step each page declares.
* The rule above one — three decimals, as before.
* The article tables, which already carried six significant figures.
* Anything the visitor types: their text is never reformatted.

A figure the visitor can copy out of a result box is now the figure they typed
in, converted, to four significant digits — which is as much as a conversion
between two defined units can honestly offer without pretending the input was
exact.
