# R81 — Biology: which pages are separate calculator files

**Question asked:** *"check which of the pages are the separate files of the biology — i.e. the ones that are not harvested, or proper calculator pages like the chemistry."*

**Answer, in one line:** of the **320** biology pages, **220 are separate calculator files** written in exactly the chemistry/construction format, and **100 are still harvested catalogue records** (a `raw` block carrying the original site's form definition).

| | Files | What the file contains | Editable by hand? |
|---|---|---|---|
| **Separate calculator files** | **220** | `name, meta, sections, formula, article` | Yes — form, formulas, article, SEO in one file |
| ↳ built from a Python spec | 188 | same keys, written by `tools/biology/build.py` | Yes — or change the spec and rebuild |
| ↳ written straight into the file | 32 | same keys, no spec | Yes |
| **Harvested records** | **100** | `name, meta, raw, article` | Only by patching the compiled record |
| ↳ equations in PHP | 14 | `raw.eq` | |
| ↳ equations + page JavaScript | 60 | `raw.eq` + `raw.js` | |
| ↳ page JavaScript only | 26 | `raw.js` (no equations) | |

Chemistry (108) and construction (158) are **100 % in the first row** — every file opens with `name, meta, sections, formula, article`. Biology's 220 match that byte for byte in structure; its 100 harvested pages are the only ones on the site still in the old shape.

Measured today: `php tests/calc_files.php biology` → **320 files, 2872 passed, 0 failed**; titles 320/320 and descriptions 320/320 in the SEO window.

---

## 1. What "separate file" actually means

A separate file is one PHP array you can read and edit end to end:

```php
return [
    'name'     => 'Corn yield',
    'meta'     => ['title' => …, 'description' => …, 'h1' => …, 'updated' => …],
    'sections' => [ /* the form: groups, labels, units, defaults, columns */ ],
    'formula'  => [ 'bushels' => 'kernels * ears * 0.0114' ],   // result => expression
    'article'  => [ /* intro, sections, faq, related, authors */ ],
];
```

A harvested record is the catalogue row itself, carried verbatim because the shorthand cannot express it (date pickers, several defaults for one variable, conditional notes, columns of unequal height, custom JavaScript):

```php
return [
    'name'    => 'Amino Acid Composition Calculator',
    'meta'    => [ … ],
    'raw'     => ['vars' => […], 'groups' => […], 'eq' => […], 'datasets' => […], 'js' => '…'],
    'article' => [ … ],
];
```

Nothing about the *page* is different — same layout, same article, same results panel. What differs is the **form definition**: a `sections` block is written in the site's own vocabulary; a `raw` block is machine output from the harvest, so a label, a unit or a formula can only be changed by editing the compiled record (or by rewriting the page).

---

## 2. The 100 harvested pages

### 2a. Equations only — 14

Plain formula pages that the exporter could not fold into the shorthand.

```
annealing-temperature      dog-size                 livestock-fence        rabbit-gestation
bird-age                   gdu                      metacam-dosage-cat     swine-gestation
compost                    grain-conversion         hardy-weinberg-equilibrium
daily-light-integral-dli   dog-heat-cycle           guinea-pig-pregnancy
```

### 2b. Equations plus page JavaScript — 60

The formula is in PHP, but the page also ships JavaScript (lookup tables, dependent dropdowns, date arithmetic, unit switching).

```
allele-frequency           cephalexin-for-dogs-dosage  grass-seed            protein-molecular-weight
bacteria-growth            cow-gestation               guinea-pig-age        punnett-square
basal-area                 dihybrid-cross-punnett-square  hamster-age        rat-cage
bulb-spacing               dna-concentration           horse-gestation       raw-dog-food
cat-age                    dog-age                     horse-weight          sheep-gestation
cat-benadryl-dosage        dog-bmi                     how-big-will-my-cat-get  sod
cat-chocolate-toxicity     dog-calorie                 llama                 the-cost-of-owning-a-dog
cat-pregnancy              dog-chocolate-toxicity      mlvss                 tramadol-for-dogs
cat-quality-of-life        dog-crate-size              mowing-cost           tree-age
catculator                 dog-harness-size            mulch                 tree-diameter
cattle-per-acre            dog-metacam                 plants                tree-value
                           dog-onion-toxicity          potting-soil-calculator  trihybrid-cross-punnett-square
                           dog-pregnancy               turtle-tank
                           dog-quality-of-life         vapor-pressure-deficit
                           dog-raisin-toxicity         vegetable-yield
                           dog-water-intake            wastewater
                           dry-matter                  water-soluble-fertilizer
                           fcr
                           goat-gestation
                           grain-bin
```

### 2c. JavaScript only, no equations — 26

The DNA / protein / sequence tools. Everything happens in `raw.js` (`omni.define(...)` handlers); there is no PHP equation to read.

```
amino-acid-composition     dna-to-protein              protein-isoelectric-point
codon-adaptation-index     dog-coat-color              rabbit-color
codon-plot                 dog-life-expectancy         random-sequence-generator
codon-usage-calculator     fuzzy-protein-search        restriction-buffer-compatibility
cpg-island-finder          gc-content-sequence         restriction-digest
dna-molecular-weight-calculator  multi-reverse-translate  restriction-enzyme-finder
dna-pattern-finder         orf-finder                  reverse-complement
dna-to-mrna                pcr-primer-stats            reverse-translate
                           primer-dimer-checker        sequence-shuffler
```

---

## 3. The 32 separate files written by hand (no spec)

These are real calculator files in the same format, but there is no Python spec behind them, so a rebuild has to go through the file:

```
acres-per-hour            animal-mortality-rate       benadryl-dosage-for-dogs
cat-bmi                   cat-calorie                 cell-dilution
cell-doubling-time        cephalexin-for-cats-dosage  co2-grow-room
corn-yield                cricket-chirp-thermometer   dna-copy-number
dog-food                  fertilizer                  fish-oil-dosage-for-cats
ligation                  log-reduction               mutation-frequency
mutation-rate             omega-3-for-dogs            pet-sitter-rates
pine-straw                protein-concentration       qpcr-efficiency
rabbit-cage-size          raised-bed-soil             soil
tree-height               tree-leaves                 tree-spacing
vegetable-seed            water-potential
```

The other 188 are produced by `tools/biology/specs_a.py … specs_p.py` (16 files, 213 specs in total — one of them, `mean-arterial-pressure`, belongs to the health category and has no biology page).

---

## 4. Where the harvested 100 fall short

These are the pages that would be rewritten first, measured rather than assumed.

**18 have no result box at all.** The answer is either a box the reader can type into or a sentence with the number dropped in — the thing that should be a read-only result of the calculation:

```
cat-benadryl-dosage  cat-pregnancy   catculator      cow-gestation
dog-harness-size     dog-heat-cycle  dog-life-expectancy  dog-pregnancy
goat-gestation       guinea-pig-age  guinea-pig-pregnancy  hamster-age
horse-gestation      llama           rabbit-gestation      sheep-gestation
swine-gestation      tramadol-for-dogs
```

**3 produce no answer in a browser drive.** A real Chrome session, real typing, Calculate pressed:

| Page | Result |
|---|---|
| `hamster-age` | nothing appears — the second box ("In human years it's") is an *input*, so the page waits for the reader to supply the answer |
| `sheep-gestation` | the Calculate gate never opens |
| `dog-life-expectancy` | results panel stays empty |

The other **97 / 100** all answer when driven with real values. Four pages that failed the first pass worked once typed into properly (`tramadol-for-dogs`, `dog-harness-size`, `cow-gestation`, `rabbit-gestation`) — but `cow-gestation` and `rabbit-gestation` print rows like *"First-time calver? –54"* and *"Rabbit Type 3"*, which is harvest debris rather than a result line.

**Copy is thinner.** Median article length: **2 080 words** on the 188 spec-built files, **2 083** on the 32 hand-written, against **1 901** and **1 978** on the harvested ones. FAQ blocks: 7 median vs 5–6. No page is under 1 500 words and none is missing an article, so this is polish, not a gap.

---

## 5. Method

* Every file in `plugins/calc/biology/qm-calc-*.php` was parsed with `require` inside PHP and its top-level keys recorded — `sections` ⇒ separate file, `raw` ⇒ harvested record. 320 files, no exceptions, no file with both.
* Slugs were matched against the 213 slugs declared in `tools/biology/specs_*.py` to separate the builder's output from the hand-written files.
* `raw` records were inspected for `eq`, `datasets` and `js` to split the harvested set by how the page computes.
* Browser pass: a headless Chromium loaded all 100 harvested pages, filled every visible field, pressed **Calculate**, and read `.calc-results`; the 7 that came back empty were re-driven with real typing.
* Full test suite on the same tree: `php tests/calc_files.php biology` → 320 files, **2872 passed / 0 failed**.

Per-page data — class, equations, JS size, output boxes, words, FAQ, updated date, browser rows — is in **`qa/biology_file_inventory.csv`** (320 rows).

---

## 6. What converting them would take

The 100 divide cleanly into four batches of 25, and each batch is the same job chemistry and construction already went through:

1. read the harvested record, write a `sections` form + `formula` map that reproduces every answer;
2. carry the article across, add the worked example from the page's own formulas;
3. run `tests/calc_files.php biology`, the biology solver checks, `browser_qa`, and a live spot-check;
4. push, report, next batch.

Order that gives the most for the least: the **18 with no result box** first (they are the pages a reader can currently get stuck on), then the 26 sequence tools, then the remaining 56.

No file was changed in this pass — it is an inventory, not an edit.
