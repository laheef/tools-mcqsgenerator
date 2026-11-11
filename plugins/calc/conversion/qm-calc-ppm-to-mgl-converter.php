<?php

/**
 * ppm to mg/L Converter
 * /conversion/ppm-to-mgl-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'ppm to mg/L Converter',
    'meta' => [
        'title' => 'ppm to mg/L Converter with the Working Shown',
        'description' => 'Milligrams per litre equals parts per million only when the density is one kilogram per litre. The page takes the density as a box so the answer is right.',
        'h1' => 'ppm to mg/L Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'ppm',
                    'label' => 'Concentration',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'ppm',
                    'default' => '500',
                ],
                [
                    'name' => 'density',
                    'label' => 'Density of the liquid',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'kg/L',
                    'default' => '1',
                    'help' => '1 for water, 0.92 for cooking oil, 1.26 for glycerine',
                ],
                [
                    'name' => 'mgl',
                    'label' => 'Milligrams per litre',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'mg/L',
                ],
                [
                    'name' => 'mgkg',
                    'label' => 'Milligrams per kilogram',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'mg/kg',
                ],
                [
                    'name' => 'percent',
                    'label' => 'As a percentage',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => '%',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'ppm to mg/L Converter',
            'results' => [
                'mgl' => 'ppm * density',
                'mgkg' => 'ppm',
                'percent' => 'ppm / 10000',
            ],
        ],
    ],
    'article' => [
        'intro' => 'Milligrams per litre equals parts per million only when the density is one kilogram per litre. The page takes the density as a box so the answer is right outside water too.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>Milligrams per litre equals parts per million only when the density is one kilogram per litre. The page takes the density as a box so the answer is right outside water too.</p><p>The page reports <strong>milligrams per litre, milligrams per kilogram and as a percentage</strong> from the boxes above it. The relationship is Concentration × Density of the liquid. Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Milligrams per litre</strong></td><td><code>Concentration × Density of the liquid</code></td></tr><tr><td><strong>Milligrams per kilogram</strong></td><td><code>Concentration</code></td></tr><tr><td><strong>As a percentage</strong></td><td><code>Concentration ÷ 10000</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 2 boxes and the page has everything it needs. It reports milligrams per litre, milligrams per kilogram and as a percentage.</p><ul><li><strong>Concentration</strong> — in ppm.</li><li><strong>Density of the liquid</strong> — in kg/L. 1 for water, 0.92 for cooking oil, 1.26 for glycerine</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Milligrams per litre</strong> — in mg/L</li><li><strong>Milligrams per kilogram</strong> — in mg/kg</li><li><strong>As a percentage</strong> — in %</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — Concentration = 500 ppm, Density of the liquid = 1 kg/L — and the results panel reads:</p><ul><li><strong>Milligrams per litre</strong> = <code>Concentration × Density of the liquid</code> = <strong>500 mg/L</strong></li><li><strong>Milligrams per kilogram</strong> = <code>Concentration</code> = <strong>500 mg/kg</strong></li><li><strong>As a percentage</strong> = <code>Concentration ÷ 10000</code> = <strong>0.05 %</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Milligrams per litre, milligrams per kilogram and as a percentage should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Concentration = 125, Density of the liquid = 0.25, the page reports <strong>milligrams per litre</strong> = 31.25, <strong>milligrams per kilogram</strong> = 125, <strong>as a percentage</strong> = 0.013.</li><li>With Concentration = 2 000, Density of the liquid = 4, the page reports <strong>milligrams per litre</strong> = 8 000, <strong>milligrams per kilogram</strong> = 2 000, <strong>as a percentage</strong> = 0.2.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>Milligrams per litre</strong></td><td><code>500 × 1</code></td><td><strong>500</strong></td></tr><tr><td><strong>Milligrams per kilogram</strong></td><td><code>500</code></td><td><strong>500</strong></td></tr><tr><td><strong>As a percentage</strong></td><td><code>500 ÷ 10000</code></td><td><strong>0.05</strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>At these values the results span 10 000 times from smallest to largest, which is the sort of page where a misplaced decimal point survives a glance and only the unit gives it away.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'The same conversion at other values',
                'html' => '<p>One row per reading, the input from a tenth of its opening value up to a thousand times it. The point of the table is the shape rather than the figures: a column that keeps its first digits as the input grows is a proportional relationship, and a column whose digits move sideways is one with an offset or a power in it.</p><table class="calc-table"><thead><tr><th>Concentration</th><th>milligrams per litre</th><th>milligrams per kilogram</th><th>as a percentage</th></tr></thead><tbody><tr><td>50 ppm</td><td>50</td><td>50</td><td>0.005</td></tr><tr><td>250 ppm</td><td>250</td><td>250</td><td>0.025</td></tr><tr><td>500 ppm</td><td>500</td><td>500</td><td>0.05</td></tr><tr><td>1 000 ppm</td><td>1 000</td><td>1 000</td><td>0.1</td></tr><tr><td>2 500 ppm</td><td>2 500</td><td>2 500</td><td>0.25</td></tr><tr><td>5 000 ppm</td><td>5 000</td><td>5 000</td><td>0.5</td></tr><tr><td>50 000 ppm</td><td>50 000</td><td>50 000</td><td>5</td></tr><tr><td>500 000 ppm</td><td>500 000</td><td>500 000</td><td>50</td></tr></tbody></table><p>Nothing in that table was computed by a different route from the panel. It is the same formula, run eight times, which is why a row you can check by hand is a check on the whole page.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Converting twice.</strong></strong> A figure already in feet converted to metres and then to feet again comes back wrong, and nothing in the display says so.</li><li><strong><strong>Using a rounded factor and a rounded answer.</strong></strong> Each rounding is small; the product of several is not. Keep precision in the middle and round only at the end.</li><li><strong><strong>Assuming both sides use the same word the same way.</strong></strong> A US gallon, an imperial gallon, a dry gallon and a metric gallon are four different volumes sharing one name.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: milligrams per litre (mg/L), milligrams per kilogram (mg/kg), as a percentage (%).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need concentration and density of the liquid. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Milligrams per litre, milligrams per kilogram and as a percentage should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Concentration</strong> ×10</td><td>500</td><td>5 000</td><td>ten times larger</td></tr><tr><td><strong>Density of the liquid</strong> ×10</td><td>500</td><td>5 000</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
            ],
            [
                'title' => 'What the page does before it answers',
                'html' => '<p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box means a missing input rather than an error. Zero is accepted, but a formula that would divide by it reports no result instead of infinity. Precision is carried throughout and the three-decimal limit is applied only at the end.</p>',
            ],
            [
                'title' => 'Limits worth knowing',
                'html' => '<ul><li><strong><strong>The factor is exact; the input is not.</strong></strong> Nothing here knows how the figure was measured, and a conversion cannot add precision that was never there.</li><li><strong><strong>Rounded display, unrounded arithmetic.</strong></strong> A figure copied from the panel has three decimals; the value behind it has more, and a chain of conversions done on copied figures drifts.</li><li><strong><strong>One dimension at a time.</strong></strong> Mass does not convert to volume without a density, and the pages that offer it ask for one rather than inventing a number.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for.</li></ul>',
            ],
            [
                'title' => 'Where this calculation comes up',
                'html' => '<ul><li><strong><strong>Cooking and dosing.</strong></strong> A recipe written in cups, a label written in millilitres and a scale that reads grams are three units in one kitchen.</li><li><strong><strong>Trade and shipping.</strong></strong> Freight is priced by weight, volume or both, and the two systems meet on the same invoice.</li><li><strong><strong>Study and exams.</strong></strong> A worked example with the units written out is worth more than a memorised factor, because it can be rebuilt.</li><li><strong><strong>Estimating before you measure.</strong></strong> A rough conversion decides whether a job is small or large before anyone fetches a tape.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the ppm to mg/L Converter work out?',
                'a' => 'It returns milligrams per litre, milligrams per kilogram and as a percentage from concentration and density of the liquid. The relationship is Concentration × Density of the liquid.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'Concentration (ppm), Density of the liquid (kg/L). The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: concentration in ppm; density of the liquid in kg/L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
            ],
            [
                'q' => 'How precise is the answer?',
                'a' => 'Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values.',
            ],
            [
                'q' => 'What happens if I leave a box empty?',
                'a' => 'The result stays blank until every input it needs holds a number. Nothing is guessed and no default is substituted behind your back.',
            ],
            [
                'q' => 'Is anything saved?',
                'a' => 'No. The arithmetic runs in the browser, nothing is submitted, and a reload starts from the values the page ships with.',
            ],
        ],
        'related' => [
            [
                'path' => '/conversion/acreage',
                'name' => 'Acreage',
            ],
            [
                'path' => '/conversion/acres-to-hectares-converter',
                'name' => 'Acres To Hectares Converter',
            ],
            [
                'path' => '/conversion/acres-to-square-feet-converter',
                'name' => 'Acres To Square Feet Converter',
            ],
        ],
        'authors' => [
            [
                'name' => 'Onim Editorial',
                'role' => 'Written and checked',
            ],
        ],
    ],
];
