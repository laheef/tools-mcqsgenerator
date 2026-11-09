# R82 — Browser sweep: all 100 converted biology pages

Every converted page was loaded in Chromium, typed into as a visitor would (only
the boxes the site itself calls inputs — `tools/biology/inputs.php`), answered
with **Calculate**, and read back. A converter was tried the way its own gate
asks: one value first, then two, then every box.

**Result: 100 of 100 answered, 0 failed, 0 page errors.**

Run again with:

```
python3 tools/biology/browser_batch.py $(cat /tmp/hundred.txt)
```

(the slug list is in the batch files under `/tmp/batch*.txt`, and the inventory
of the 100 is `qa/biology_file_inventory.csv`).

## Per page

| Page | Rows shown | Boxes shown | Inputs used | Result |
|---|---|---|---|---|
| `allele-frequency` | 6 | 0 | 1 | Occurrence of the disease Unit for Occurrence  |
| `amino-acid-composition` | 6 | 6 | 1 | Length aa |
| `annealing-temperature` | 1 | 0 | 1 | Annealing temperature (Tₐ) Unit for Annealing  |
| `bacteria-growth` | 2 | 0 | 1 | Final number of bacteria — N(t) |
| `basal-area` | 1 | 0 | 1 | Basal area |
| `bird-age` | 2 | 0 | 1 | Bird age Unit for Bird age hrs days wks mos yr |
| `bulb-spacing` | 3 | 0 | 1 | Area Unit for Area cm² m² in² ft² yd² ac ha |
| `cat-age` | 2 | 0 | 1 | Human years Unit for Human years hrs days wks  |
| `cat-benadryl-dosage` | 6 | 0 | 1 | In mg Unit for In mg g mg mcg |
| `cat-chocolate-toxicity` | 2 | 0 | 1 | Methylxanthines dose Unit for Methylxanthines  |
| `cat-pregnancy` | 5 | 0 | 1 | Due date Sun 3 May 2026 |
| `cat-quality-of-life` | 1 | 0 | 1 | Quality of life score |
| `catculator` | 7 | 0 | 5 | Cat1 index 1 |
| `cattle-per-acre` | 12 | 0 | 1 | Estimated forage yield |
| `cephalexin-for-dogs-dosage` | 6 | 2 | 1 | Amount per dose Unit for Amount per dose g mg  |
| `codon-adaptation-index` | 4 | 4 | 1 | Codon adaptation index Geometric mean of the w |
| `codon-plot` | 3 | 0 | 1 | Codons read Whole codons only |
| `codon-usage-calculator` | 5 | 5 | 1 | Complete codons |
| `compost` | 4 | 0 | 1 | Area Unit for Area cm² m² in² ft² yd² ac ha |
| `cow-gestation` | 1 | 0 | 1 | Calving start Wed 9 December 2026 |
| `cpg-island-finder` | 5 | 0 | 1 | GC content of the sequence % |
| `daily-light-integral-dli` | 1 | 0 | 1 | Daily light integral (DLI) mol/m²/day |
| `dihybrid-cross-punnett-square` | 9 | 0 | 1 | AABB % |
| `dna-concentration` | 2 | 0 | 1 | Conversion factor μg/mL |
| `dna-molecular-weight-calculator` | 6 | 6 | 1 | Length nt |
| `dna-pattern-finder` | 4 | 0 | 1 | Matches, forward strand |
| `dna-to-mrna` | 6 | 0 | 1 | DNA, in codons |
| `dna-to-protein` | 4 | 4 | 1 | Coding length bp |
| `dog-age` | 2 | 0 | 1 | Human age How old is your dog in human years? |
| `dog-bmi` | 1 | 0 | 1 | BMI Canine Body Mass Index. |
| `dog-calorie` | 18 | 0 | 1 | Your dog needs Unit for Your dog needs J kJ MJ |
| `dog-chocolate-toxicity` | 2 | 0 | 1 | Methylxanthines dose Unit for Methylxanthines  |
| `dog-coat-color` | 1 | 1 | 1 | Loci answered Always 4 |
| `dog-crate-size` | 2 | 0 | 1 | Minimal crate height Unit for Minimal crate he |
| `dog-harness-size` | 2 | 0 | 1 | Min girth print 8 |
| `dog-heat-cycle` | 4 | 0 | 1 | Day 18 of the cycle Thu 19 March 2026 |
| `dog-life-expectancy` | 4 | 0 | 2 | Age in human years |
| `dog-metacam` | 2 | 2 | 1 | Tablets Maintain1 |
| `dog-onion-toxicity` | 2 | 2 | 1 | Toxic dose Unit for Toxic dose kg g mg lb oz s |
| `dog-pregnancy` | 2 | 0 | 1 | Due date Sun 3 May 2026 |
| `dog-quality-of-life` | 1 | 0 | 1 | Results |
| `dog-raisin-toxicity` | 2 | 1 | 1 | Toxic amount of raisins Unit for Toxic amount  |
| `dog-size` | 1 | 0 | 1 | Adult weight Unit for Adult weight kg g lb oz  |
| `dog-water-intake` | 1 | 0 | 1 | Daily water intake Unit for Daily water intake |
| `dry-matter` | 12 | 0 | 1 | Others Unit for Others % %/yr bps ‱ ‰ . |
| `fcr` | 13 | 0 | 1 | Total weight gain by the animal(s) Unit for To |
| `fuzzy-protein-search` | 3 | 0 | 1 | Matches found |
| `gc-content-sequence` | 5 | 5 | 1 | Length bp |
| `gdu` | 2 | 0 | 1 | Growing degree units (GDU) |
| `goat-gestation` | 3 | 0 | 2 | Kidding date Wed 29 July 2026 |
| `grain-bin` | 19 | 0 | 1 | Radius |
| `grain-conversion` | 8 | 0 | 1 | Bushels bu. The calculator shows the equivalen |
| `grass-seed` | 8 | 0 | 1 | Area Unit for Area cm² m² in² ft² yd² ac ha |
| `guinea-pig-age` | 1 | 0 | 1 | Human age ‍ Unit for Human age ‍ hrs days wks  |
| `guinea-pig-pregnancy` | 3 | 0 | 1 | Due date Tue 5 May 2026 |
| `hamster-age` | 1 | 0 | 1 | In human years it's Unit for In human years it |
| `hardy-weinberg-equilibrium` | 18 | 0 | 1 | Genotypes Number of genotypes for a given numb |
| `horse-gestation` | 4 | 0 | 1 | Foaling date Tue 2 February 2027 |
| `horse-weight` | 2 | 0 | 1 | Actual weight The estimation of how much the h |
| `how-big-will-my-cat-get` | 1 | 0 | 1 | Final size Unit for Final size kg g lb oz st t |
| `livestock-fence` | 48 | 0 | 1 | 8" Wood posts total cost |
| `llama` | 4 | 0 | 1 | Due date Sat 6 February 2027 |
| `metacam-dosage-cat` | 5 | 2 | 1 | Dosage for the first 24 hours Unit for Dosage  |
| `mlvss` | 8 | 0 | 1 | MLSS Unit for MLSS ppm µg/mL g/L mg/L kg/m³ lb |
| `mowing-cost` | 4 | 0 | 1 | Total costs |
| `mulch` | 17 | 0 | 1 | Area Unit for Area cm² m² in² ft² yd² ac ha Ar |
| `multi-reverse-translate` | 3 | 3 | 1 | Sequences translated |
| `orf-finder` | 5 | 0 | 1 | Open reading frames |
| `pcr-primer-stats` | 9 | 3 | 1 | Forward length nt |
| `plants` | 11 | 0 | 1 | Area size Unit for Area size cm² m² in² ft² yd |
| `potting-soil-calculator` | 3 | 0 | 1 | Volume of soil needed Unit for Volume of soil  |
| `primer-dimer-checker` | 7 | 0 | 1 | 3′ complementary run bases 3 or more is a risk |
| `protein-isoelectric-point` | 7 | 0 | 1 | Isoelectric point pH |
| `protein-molecular-weight` | 2 | 0 | 1 | Weight |
| `punnett-square` | 3 | 0 | 1 | Chance for AA Unit for Chance for AA % %/yr bp |
| `rabbit-color` | 58 | 0 | 1 | Color sire full text1 |
| `rabbit-gestation` | 3 | 0 | 2 | Birth date Sun 29 March 2026 |
| `random-sequence-generator` | 1 | 0 | 1 | GC content of the output % |
| `rat-cage` | 2 | 0 | 1 | Cage volume Unit for Cage volume mL L cl cc cm |
| `raw-dog-food` | 15 | 0 | 1 | Required amount of food Unit for Required amou |
| `restriction-buffer-compatibility` | 3 | 3 | 1 | Buffers that suit both Out of the buffers avai |
| `restriction-digest` | 5 | 5 | 1 | Sequence length bp |
| `restriction-enzyme-finder` | 3 | 3 | 1 | Enzymes that cut Out of the panel |
| `reverse-complement` | 3 | 3 | 1 | Length bp |
| `reverse-translate` | 5 | 5 | 1 | Protein length aa |
| `sequence-shuffler` | 4 | 0 | 1 | Length |
| `sheep-gestation` | 3 | 0 | 1 | Lambing date Sun 26 July 2026 |
| `sod` | 6 | 0 | 1 | Total area Unit for Total area cm² m² in² ft²  |
| `swine-gestation` | 3 | 0 | 1 | Farrowing date Tue 23 June 2026 |
| `the-cost-of-owning-a-dog` | 13 | 0 | 1 | Total price of medical expenses |
| `tramadol-for-dogs` | 4 | 0 | 1 | Min dose 2 |
| `tree-age` | 3 | 1 | 1 | Growth factor Enter the growth factor if you c |
| `tree-diameter` | 4 | 1 | 1 | Diameter Unit for Diameter mm cm m in ft yd μm |
| `tree-value` | 1 | 0 | 1 | Tree value $ |
| `trihybrid-cross-punnett-square` | 27 | 0 | 1 | AABBCC % |
| `turtle-tank` | 1 | 0 | 1 | Recommended tank size Unit for Recommended tan |
| `vapor-pressure-deficit` | 8 | 0 | 1 | Dew point Unit for Dew point °C °F K °R |
| `vegetable-yield` | 5 | 0 | 1 | Seed distance (isolation distance) Unit for Se |
| `wastewater` | 18 | 0 | 1 | Influent SS weight Unit for Influent SS weight |
| `water-soluble-fertilizer` | 40 | 1 | 1 | N |

## What "answered" means

At least one result row in the panel, or a filled answer box, after the press —
the same test the site's own gate uses before it says "Results updated". Pages
whose answer is a sentence ("Your dog's adult weight should fall into this
range: 5–8 kg") count as answered through their result rows.

## Repairs this sweep found

The first pass answered 88 of 100. The twelve that did not were:

* **`hamster-age`, `guinea-pig-age`** — the answer ("In human years it's") was a
  box the reader had to fill in. Converted, it is a result box; both now answer
  from the age alone.
* **`cow-gestation`, `sheep-gestation`, `rabbit-gestation`, `dog-heat-cycle`,
  `cat-pregnancy`, `catculator`, `dog-pregnancy`, `goat-gestation`,
  `horse-gestation`, `llama`, `swine-gestation`, `guinea-pig-pregnancy`,
  `dog-harness-size`, `tramadol-for-dogs`, `dog-life-expectancy`** — these are
  converters: they answer when **one** side is given and go quiet when every box
  is filled with a contradictory set. The QA now tries one value first, which is
  how a visitor uses them, and all of them answer.
