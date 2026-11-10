# R83 — the 26 script pages are calculators again

The twenty-six sequence tools in `plugins/calc/biology/` carry a page script
instead of a formula: their working is a string transformation, not arithmetic.
That is correct and stays. What was wrong was everything around it.

## What was wrong

| Problem | Pages | Detail |
| --- | --- | --- |
| Typable boxes that the script overwrote | 24 | 107 number boxes were inputs to look at and results in fact. The script wrote into them on every press. |
| Result boxes nothing produced | 1 (`rabbit-color`) | 58 label-less result boxes harvested from the source page, exported by nothing, shown as empty rows. |
| Controls nothing read | 1 (`rabbit-color`) | 62 colour drop-downs and 5 display switches that no part of the script ever asked for. |
| Choice fields handed the script an opaque id | 15 pages, 27 call sites | `ctx.getRawInput('topology')` returns `o-a1ff4d8500b4`, so `/circular/` never matched and every page ran its default branch. A circular digest of a one-site plasmid reported two fragments. |
| Results that were not results | 3 | `dog-coat-color` exported the constant 4 ("Loci answered — always 4"); `dog-life-expectancy` exported the stage index 2 instead of the word; `rabbit-color` exported the top class's chance under the label "Most likely colour class". |
| Articles describing a different page | 26 | Boilerplate from the formula builder: "takes 3 numbers", "Alphabet — a plain number, no unit", "type a past answer into a result box to solve backwards". |

## What changed

* **`engine` is declared.** All 26 files carry `'engine' => 'script'` and an
  `engine_note` saying what the script does. `formula` stays empty, truthfully.
* **`lib/CalcFile.php` enforces the promise.** A `script` file is refused when
  the script is absent, when a `result` field has no `exportValue` behind it, or
  when a box the visitor can fill is never read by the script.
* **107 boxes became results.** Every field the script writes is now
  `type => 'result'` and renders read-only.
* **Dead furniture removed.** 58 orphan result boxes and the 67 controls the
  script never read are gone from `rabbit-color`, which is now the form it
  actually computes from: five loci per parent and eight probabilities back.
* **`ctx.getChoice(name)` added** to `assets/js/calc.js`; 27 call sites moved to
  it. Choice-dependent branches now follow the visitor's selection.
* **Page fixes:** `dog-coat-color` reports the coat phrase; `dog-life-expectancy`
  reports "Young adult"; `dna-to-protein` reports the longest ORF's coding
  length and residue count instead of the paste length; `random-sequence-generator`
  no longer offers a protein output whose only result is a GC percentage;
  `restriction-digest` finds the enzyme from its label.
* **The 26 articles rebuilt** by `tools/biology/build_script_articles.php` from
  the form plus two real Chromium runs per page. 1,529–2,196 words, titles
  50–60 characters, descriptions 150–160; the builder refuses anything else.

## Evidence

```
php tests/calc_files.php                 5266 passed, 0 failed
browser sweep, 26 pages                  26 answered, 0 did not  (values read from the boxes)
article builder                          26 pages, all ≥ 1,500 words, titles and descriptions in range
```

The browser harness itself was wrong before this round: it read
`innerText` from the result rows, where the number lives in an `input`, so a
panel of empty boxes counted as answered. It now reads the values, and only a
page with no result box at all can be answered by its sentences.

`tools/verify_conversion.php` reports these 26 pages as differing from their
harvested records in vars, groups and js. That is the point of the round: those
differences are the fixes above, not drift.

## After the sweep

The sweep found two more things and both are fixed in the follow-up commit:

* **The result boxes were still typable.** A `result` field is a `dependent`
  variable, and the template only renders those read-only when the field is
  marked output-only. `compile()` now marks every dependent field of a
  *script-engine* page that way, so the panel's boxes are read-only on all 26
  pages and the form no longer offers a second place to type them. Formula pages
  are deliberately untouched: they still solve backwards when a result is typed
  in.
* **The harness accepted an empty panel.** It read the text of each result row,
  where the number lives in a child `input`, so a stack of empty boxes counted
  as an answer. It now reads the value inside the box, and a page that answers
  through prose alone has to report `state=shown` with no empty box left behind.

Live check after the deploy: `/tool/biology/reverse-complement` returns
`length 39 · gc 56.41 · tm 70.8`, all three read-only; six pages re-run through
the live harness answered 6 of 6.
