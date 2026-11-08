# Construction — UI, form and copy audit (R80 close-out)

**Commits:** `e6c983a` · `5e34445` · `78d2412`, all pushed to `main` and live-verified.
**Scope:** the whole construction pack (158 pages), plus the two framework files it shares with
chemistry and biology, and the 192 biology pages the same wording had reached.

## What this round did

The 158 construction calculators were already built and live. This round was the UI half of the
brief — error handling, result-box behaviour, form layout, and whether the page copy tells the
truth about what the page does. Three defects were found; all three are fixed and verified.

### 1. The articles claimed you could type into result boxes — you cannot

Every generated article said the result boxes accept a value and that the page then "solves for
whichever box is empty". The boxes are `readonly` and the arithmetic always runs forwards from
the inputs, so the sentence was simply wrong, and it appeared in three places per page plus the
FAQ.

The prose now says what the page does:

- *"Every input needs a value before the page can answer … the result boxes are read-only and are
  recomputed from the inputs, so the page always works forwards. To go the other way, the table
  above gives the rearrangement for each unknown."*
- The pitfall, the step-by-step list and the "Can I use it backwards?" FAQ were rewritten to match.

Fixed at the generator (`tools/construction/lib.py`, `tools/chemistry/lib.py`) and rebuilt, so the
correction is permanent rather than patched into the files:

| Category | Pages rebuilt | How |
|---|---|---|
| construction | 158 | generator |
| chemistry | 108 | generator |
| biology | 192 | direct edit — those pages are harvested, not generated |

Of the 320 biology pages, **128 keep the sentence because on those pages it is true** — the boxes
really are editable and the page really does solve backwards (checked live on `dog-age`,
`plant-population`, `corn-yield`, `water-potential`: 0 read-only fields each). Only the 192 pages
with `readonly` result boxes were corrected.

### 2. Two-column forms were badly unbalanced

`CalcFile::compile()` dealt **all** fields across the columns, including result boxes — which are
moved out of the form into the results panel at runtime. On the fence page that left 7 inputs in
the left column and **one** in the right (the screenshot is in `qa/shots/r80/`). Result boxes are
now excluded from the split and appended to the last column, so the inputs balance:

| Page | Before | After |
|---|---|---|
| fence (8 inputs) | 7 + 1 | **4 + 4** |
| paint (10 inputs) | 9 + 1 | **5 + 5** |
| taper (3 inputs) | 2 + 1 | 2 + 1 (correct — ceil split) |

`templates/calculator.php` still renders the result placeholders, so nothing about the results
panel changed. The fix is in the shared compiler, so chemistry gained it too; biology uses the
harvested path and is untouched.

### 3. Reverse-solving from a result box is not a feature, and the copy no longer implies it

Confirmed by driving the pages: a result box cannot be typed into, so "fill in the answer and
leave an input blank" never worked. The formula table on each page still lists every
rearrangement, which is what a reader actually needs, and the article now points at it.

## New QA tool

`tools/construction/ui_qa.py` — a per-page browser audit that checks, on a real Chromium page:

1. **letters refused** — types `abc` into the first input and requires the box to stay empty **and**
   a visible message to appear under that field;
2. **defaults compute** — fills the page's own defaults, presses Calculate, and requires every
   result box to be non-empty;
3. **precision** — no result prints more than three decimals, no `NaN`, no `Infinity`, no stray
   "unit";
4. **layout** — the tool column is `position: sticky` and has no inner scrollbar;
5. **console** — zero errors and zero page errors.

Result: **158/158 construction pages clean**, 25–50 pages per run in four batches.

## Verification after the changes

| Layer | Result |
|---|---|
| `build.py --write` (construction) | 158 specs, **158 written, 0 refused** |
| `build.py --write` (chemistry) | 108 specs, **108 written, 0 refused** |
| `php tests/calc_files.php construction` | **1 422 passed, 0 failed** |
| `php tests/calc_files.php` (all 586) | **5 266 passed, 0 failed** |
| `qa.py` construction / chemistry | **158/158** and **108/108 clean** |
| `browser_qa.py` sample after the rebuild | construction 6/6, chemistry 1/1, biology sampled live |
| `ui_qa.py` | **158/158 clean** |
| Live check | `fence` and `bending-stress` re-measured on production: columns 4 + 4 and 2 + 1 |

## Still open (not started, and not part of this category)

- The WordPress front site's `/tools/` page renders a PHP error; the app's own pages
  (`/all-tools`, `/all-calculators`, `/construction`, `/tool/construction`) are correct.
- `/all-tools/construction` returns 404 — the category listing for tools lives at
  `/construction`, and the app's own `/tool/construction` shows all 158.
