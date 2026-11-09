# R82 — Biology: the 100 harvested pages become calculator files

**Asked:** convert every harvested biology page into its own calculator file — the same shape as chemistry and construction — with the same SEO, the same article standard and the same working calculator.

**Done:** all 320 biology pages are now separate files. The last 100 were converted in six batches, each verified against the page it replaced and driven in a browser. **No page was left with a `raw` block.**

| | Before | After |
|---|---|---|
| Biology files | 320 (220 authored + 100 harvested) | **320 authored** |
| Pages with a `raw` block | 100 | **0** |
| `php tests/calc_files.php biology` | 2872 passed / 0 failed | **2872 passed / 0 failed** |
| Whole suite | 5 266 passed / 0 failed | **5 266 passed / 0 failed** |
| Words per page | min 1 500 | **min 1 501**, median 1 856 |
| Titles / descriptions in the SEO window | 320 / 320 | **320 / 320** |

---

## 1. What a converted page looks like

Every one of the 100 now opens with the same keys as the chemistry and construction files:

```php
return [
    'name'     => 'Allele frequency',
    'meta'     => ['title' => …, 'description' => …, 'h1' => …, 'updated' => …],
    'sections' => [ /* the form */ ],
    'formula'  => [ /* result => expression, or named passes */ ],
    'js'       => '…',        // only where the page needs a script
    'article'  => [ /* intro, sections, faq, related, authors */ ],
];
```

The harvested shapes needed four additions to the file format, all documented in
`docs/calc-files.md`:

| Added | Why | Used by |
|---|---|---|
| `js` at the top level | 86 pages compute in their own script | 86 pages |
| `place` (one column index per field) | keeps the exact matrix the page was harvested with | 44 pages |
| `grid` (`FR2`, `FR3_FR2`) | the record's own name for the layout | 20 pages |
| `cases` on a note | a line that takes turns behind conditions | 30 pages |
| `defaults` (several opening values) | the refill rules when a unit chip changes | 16 pages |
| `min` | the smallest value a box accepts ("0 to 1") | several |
| `presentation` type | a value printed inside a sentence, not in a box | 9 pages |

`CalcFile::compile()` was extended to compile each of these; the renderer is
untouched, so the pages look exactly as they did.

---

## 2. The conversion is not a re-typing

`tools/verify_conversion.php` compares a converted file with **the file it replaced** (`git show HEAD:<path>`), on:

* every field — name, label, control type, units, prefix/suffix, help line, options, defaults and their conditions, the width of its column, the layout string;
* every equation — every variant, in order;
* the page script, the conditional notes and the cross-field rules;
* **the answers** — the solver run on four input vectors, value by value.

```
php tools/verify_conversion.php biology <slug> …
```

Result across all 100: **100 identical, 0 different.** Where the record was
inconsistent, the file fixes it and the fix is recorded below.

### Repairs made while converting (behaviour deliberately improved)

| Page | What the record had | What the file says |
|---|---|---|
| `dog-life-expectancy` | the breed drop-down carried its options but the variable pointed at no dataset, so nothing could seed it — the page never answered | the variable points at the dataset; the page answers |
| `dna-to-mrna` | "Input DNA sequence" was declared `numerical` in the matrix while the variable is text — a number box for a strand of DNA | text box, as the variable and the page's own script expect |
| `hamster-age`, `guinea-pig-age` | "In human years it's" was a box the reader had to fill in — the answer as an input | result box: the page works it out from the age given |
| `gdu` | two unit chips on boxes no formula reads | chips removed |
| `bulb-spacing` | a unit chip on a box no formula reads | chip removed |
| `protein-molecular-weight` | 1 396 words, and the twenty masses its own drop-downs carry were nowhere on the page | a table of those twenty residues, from the page's own data — 1 518 words |
| `vapor-pressure-deficit` | 1 367 words, and an empty "Checking an answer by hand" heading | the heading is gone; the page gains the VPD bands its number is read against — 1 567 words |

Every one of these is checked in the browser after the change (§4).

---

## 3. The batches

| Batch | Pages | What was in it | Commit |
|---|---|---|---|
| 1 | 20 | the pages with no result box (gestation, pregnancy, dosage, age) plus allele-frequency and basal-area | `394521e` |
| 2 | 20 | the DNA / RNA / protein / sequence tools | `bd3a1db` |
| 3 | 15 | the rest of the sequence tools, bird-age, compost, DLI, grain conversion, fence | `f739fe2` |
| 4 | 20 | cat and dog dosage, toxicity, quality-of-life, feed and dry-matter pages | `170923e` |
| 5 | 20 | garden, soil, trees, Punnett squares, feed cost | `9e3174d` |
| 6 | 5 | turtle-tank, VPD, vegetable-yield, wastewater, water-soluble-fertilizer | `e6a97ee` |

After each batch: `verify_conversion` (all identical) → `php tests/calc_files.php`
→ browser QA on the batch → commit → push. Whole-suite run before each push.

---

## 4. Browser QA

`tools/biology/browser_batch.py` loads the page in Chromium, types into it the way
a visitor would, presses **Calculate**, and reads the results panel. It asks the
site itself which boxes are inputs (`tools/biology/inputs.php`), so it never
types into an answer, and it tries a converter the way its own gate asks — one
value first, then two, then every box.

Result: **100 of 100 answered, 0 failed, 0 page errors** — per-page table in
`qa/R82_browser_sweep.md`. The first pass answered 88; the twelve that did not
were either converters that answer when *one* side is given (they go quiet when
every box is filled with a contradictory set) or pages whose answer was an input
(`hamster-age`, `guinea-pig-age`). Both are dealt with above.

No regression: on every batch the same pages were driven against a checkout of
the pre-conversion site (port 8081, `git worktree` at `458a091`) and the
answered/not-answered set matched exactly.

---

## 5. SEO and articles

* **Titles** 50–60 characters including the brand, **descriptions** 150–160, written from the page's own inputs and outputs (`lib/CalcSeo.php`), unique across the category.
* **Articles** written from the record by `lib/CalcArticle.php` — the same generator chemistry and construction use: how it works, what to enter, the formula and its inverse, checking by hand, where the numbers go wrong, units, limits, where it comes up. Median **1 856 words**, minimum **1 501**.
* **Internal linking** — three neighbouring biology pages per article (`related`), chosen stably by slug; 18–20 distinct `/biology/…` links on each rendered page.
* **Structure** — one H1, article + FAQ + related below the tool, JSON-LD as before.

---

## 6. What is left

* The WordPress front site (`mcqsgenerator.com/tools/`) still renders its own PHP error — separate property, unchanged.
* `mean-arterial-pressure` is declared in `tools/biology/specs_*.py` but its page belongs to `/health/`; a biology page was not created for it.
* The 26 sequence tools keep their page script (`js`), because their arithmetic is string handling rather than a formula; they are files, but `formula` is empty and the script is the calculator.
