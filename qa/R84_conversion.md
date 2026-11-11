# R84 — the conversion category, built like biology and chemistry

Three hundred and thirty harvested conversion pages became three hundred and
thirty calculator files, one per slug, generated from one unit registry and
checked the same way every other category is checked.

## What was built

| Part | What it is |
| --- | --- |
| `tools/conversion/units.py` | 186 units across 18 dimensions, each with one exact factor to its base unit |
| `tools/conversion/catalog.py` | every one of the 330 slugs classified into exactly one shape |
| `tools/conversion/gen.py` | field builders, the solver, the article builder, the PHP writer |
| `tools/conversion/make.py` | seven builders: pair, density, multi-unit, temperature, coins, number-words, script |
| `tools/conversion/specs_a.py` | 265 pages driven from the catalogue tables |
| `tools/conversion/specs_d.py` | 42 pages that need a second quantity (density, area, coefficient, rate) |
| `tools/conversion/specs_e.py` | 23 pages whose working is a script, not an equation |
| `tools/conversion/build.py` | the gate: report, or write what passes |
| `plugins/calc/conversion/` | 330 calculator files |

Shape split: **158 pairs, 28 density, 63 multi-unit, 9 temperature, 5 coins,
2 number-words, 42 calculated, 23 scripted = 330.**

Every file carries `'authored' => true`, so the widget prefills the defaults the
page was built around rather than opening empty.

## The engine change

`lib/CalcFile.php` now copies `authored` from the definition onto the compiled
record. Without it a file-based page was treated like a harvest and opened with
every box empty — the "nothing prefilled" rule exists for the reference site's
prefills, not for defaults an author chose. One line, one comment, no behaviour
change for harvested pages.

## What the checks refuse

`build.py --report` refuses a page when:

* the article is under 1,500 or over 2,500 words;
* the stored title is outside 43–53 characters (the page prints `| Onim`, so
  that is the 50–60 a search result shows);
* the description is outside 150–160 characters;
* a result has no formula behind it, or a formula reads a name that is not on
  the form;
* two pages share a title;
* a script page does not write every result it declares.

The run that produced the shipped files: **330 specs, 0 refusals.**

## Results

| Check | Result |
| --- | --- |
| `php tests/calc_files.php` (whole site) | **8,235 passed, 0 failed** |
| Category index `/conversion` | 330 links out; every page carries a breadcrumb and ~24 internal links |
| `php tests/calc_files.php conversion` | 330 files, titles 330/330 in window, descriptions 330/330, **computing 330/330**, 2,970 passed, 0 failed |
| `php -l` on all 330 files | 0 errors |
| `tools/conversion/qa.py` | 330/330 routes answer, one `<h1>`, a form, no "no formula" banner |
| `tools/conversion/js_qa.py` | 23/23 script fixtures pass |
| `tools/conversion/browser_qa.py` | 330/330 pages answer in Chromium: every result box fills and moves when an input changes |
| Article length (site counter) | min 1,502 · median 2,004 · mean 1,967 · max 2,299 |
| `/tool/sitemap.xml` | 330 conversion URLs |
| Titles | 330/330 inside 50–60 with the site suffix |
| Descriptions | 330/330 inside 150–160 |

Every page computes from the server side too: `computing: 330/330`. The last
page to get there was `/conversion/binary`, whose only box was a text box in the
first build; a decimal figure belongs in a number box, so it was rebuilt as one,
and the server-side count and the browser now both pass it.

## On the live site

Deployed from `main`; everything below was run against
`https://mcqsgenerator.com/tool`.

| Check | Result |
| --- | --- |
| All 330 routes | **330/330 return 200** |
| Titles, descriptions, `<h1>` on live | 330/330 title in window, 330/330 description in window, exactly one `<h1>` each |
| Canonicals | 330/330 point at their own `/tool/conversion/…` URL |
| Category index | 330 cards, every one linking into the category |
| Sitemap | 330 conversion `<loc>` entries |
| Script pages on live | 23/23 match their fixtures (values identical; the live display groups thousands with thin spaces and rounds to three decimals, which is the site-wide rule) |
| Real-browser sweep of every page | **330/330 answered** — every result box filled from the page's own defaults |
| Spot checks on live | acre→are 5 ac = 202.343 ares; orifice 0.5 in at 30 psi, Cd 0.62 = 25.333 gpm / 95.896 L/min; leet "Elite hacker" = "31173 h4ck3r"; 100 g carbohydrate = 400 kcal |

## Arithmetic spot checks

These were checked by hand against the page, and the fixtures in `qa.py` pin
the ones that matter:

* 1 acre = 40.4686 ares; 1 lb = 0.45359237 kg; 1 US gallon = 3.785411784 L.
* 0 °C = 32 °F; −40 °C = −40 °F; 30 dBm = 1 W.
* 7 h 45 min = 7.75 decimal hours; 60 × 120 ft = 7,200 ft² = 0.1653 acres.
* 100 mesh = 149 µm; 960 px at 96 ppi = 10 in.
* A half-inch orifice at 30 psi with Cd 0.62 passes **25.33 gpm / 95.87 L/min**.
* 300 N·m at 3,000 rpm is **94.25 kW = 126.39 hp**.
* Sydney (151.2093, −33.8688) in zone 56 is **334,368.63 E / 6,250,948.35 N**.

## Honesty decisions

* `lbs-to-pounds`, `pounds-to-lbs` and `centigrade-to-celsius` say there is
  nothing to convert rather than inventing a factor.
* `cents-to-euros` takes the exchange rate as a box; it does not claim to know
  today's.
* `ppm` states that mg/L equals ppm only in water; `ppm-to-mgl-converter` takes
  the density instead of assuming 1.
* `psi-to-gpm` asks for the orifice diameter and discharge coefficient, because
  a flow cannot be had from a pressure alone.
* `lot-size-*` take width and depth; `grams-to-calories` takes the
  macronutrient; `hardness-conversion` says the correlations are empirical.
* The 23 script pages declare `engine => 'script'`, keep `formula` empty, and
  say so in the article. No page carries a formula it does not use. Each of
  them lists the rules it applies, and its worked-example table is the page's
  own output for three inputs, captured by running the page's script through
  `tools/conversion/js_harness.js` at build time — so the numbers in the prose
  are the numbers the browser produces.

## Two engine fixes this round needed

* `lib/CalcFile.php` copies `authored` onto the compiled record, and
  `lib/Shape.php` now carries it through to the shape the widget reads. Without
  the second half the flag was set and then dropped, so a choice box the author
  had defaulted opened unselected.
* A `select` default is stored as the option *label* (what the engine matches
  on), while the arithmetic needs its *value*; `gen.SEL` and `Spec.env` are the
  two halves that translate between them, so `grams-to-calories` opens on
  carbohydrate and computes 4 kcal/g rather than waiting for a choice.

## Files

`plugins/calc/conversion/qm-calc-<slug>.php` × 330, generated by
`python3 tools/conversion/build.py --write` from the specs, and regenerated
whole rather than patched one at a time.
