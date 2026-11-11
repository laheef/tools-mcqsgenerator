<?php

/**
 * Cubic Feet Converter
 * /conversion/cubic-feet
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Cubic Feet Converter',
    'meta' => [
        'title' => 'Cubic Feet Converter — Every Unit on One Page',
        'description' => 'Type one figure in cubic feet and read it in 9 units of volume, with the factor for each written out. Both ways. Nothing is rounded before the last step.',
        'h1' => 'Cubic Feet Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'value',
                    'label' => 'In cubic feet',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'ft³',
                    'default' => '1',
                    'help' => 'The figure to convert, in cubic feet',
                ],
                [
                    'name' => 'l',
                    'label' => 'In litres',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'L',
                ],
                [
                    'name' => 'ml',
                    'label' => 'In millilitres',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'mL',
                ],
                [
                    'name' => 'tsp',
                    'label' => 'In teaspoons',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'tsp',
                ],
                [
                    'name' => 'tbsp',
                    'label' => 'In tablespoons',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'tbsp',
                ],
                [
                    'name' => 'floz',
                    'label' => 'In US fluid ounces',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'fl oz',
                ],
                [
                    'name' => 'cup',
                    'label' => 'In US cups',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'cup',
                ],
                [
                    'name' => 'pint',
                    'label' => 'In US pints',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'pt-liquid',
                ],
                [
                    'name' => 'quart',
                    'label' => 'In US quarts',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'qt',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Cubic Feet Converter',
            'results' => [
                'l' => 'value * 28.316846592',
                'ml' => 'value * 28316.846592',
                'tsp' => 'value * 5745.03896103896',
                'tbsp' => 'value * 1915.01298701299',
                'floz' => 'value * 957.506493506494',
                'cup' => 'value * 119.688311688312',
                'pint' => 'value * 59.8441558441558',
                'quart' => 'value * 29.9220779220779',
            ],
        ],
    ],
    'article' => [
        'intro' => 'One figure in cubic feet, read out in every unit of volume that the page carries.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>Most conversions are asked one at a time: how many of these in one of those. That is fine until you are looking at a specification sheet in one unit, a form asking for another, and a tape measure reading a third. This page shows the figure in 9 units at once so the one you need is already on screen.</p><p>Every reading comes from the same input and the same base unit, so the columns cannot disagree with each other. What they can do is make a mismatch obvious: a figure that looks plausible in one unit and absurd in another is usually a figure typed in the wrong one.</p><p>The page reports <strong>litres, millilitres, teaspoons, tablespoons, US fluid ounces, US cups, US pints and US quarts</strong> from the boxes above it. The relationship is In cubic feet × 28.316846592. Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>litres</strong></td><td><code>In cubic feet × 28.316846592</code></td></tr><tr><td><strong>millilitres</strong></td><td><code>In cubic feet × 28316.846592</code></td></tr><tr><td><strong>teaspoons</strong></td><td><code>In cubic feet × 5745.03896103896</code></td></tr><tr><td><strong>tablespoons</strong></td><td><code>In cubic feet × 1915.01298701299</code></td></tr><tr><td><strong>US fluid ounces</strong></td><td><code>In cubic feet × 957.506493506494</code></td></tr><tr><td><strong>US cups</strong></td><td><code>In cubic feet × 119.688311688312</code></td></tr><tr><td><strong>US pints</strong></td><td><code>In cubic feet × 59.8441558441558</code></td></tr><tr><td><strong>US quarts</strong></td><td><code>In cubic feet × 29.9220779220779</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 1 box and the page has everything it needs. It reports litres, millilitres, teaspoons, tablespoons, US fluid ounces, US cups, US pints and US quarts.</p><ul><li><strong>In cubic feet</strong> — in ft³. The figure to convert, in cubic feet</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>In litres</strong> — in L</li><li><strong>In millilitres</strong> — in mL</li><li><strong>In teaspoons</strong> — in tsp</li><li><strong>In tablespoons</strong> — in tbsp</li><li><strong>In US fluid ounces</strong> — in fl oz</li><li><strong>In US cups</strong> — in cup</li><li><strong>In US pints</strong> — in pt-liquid</li><li><strong>In US quarts</strong> — in qt</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — In cubic feet = 1 ft³ — and the results panel reads:</p><ul><li><strong>In litres</strong> = <code>In cubic feet × 28.316846592</code> = <strong>28.317 L</strong></li><li><strong>In millilitres</strong> = <code>In cubic feet × 28316.846592</code> = <strong>28 316.847 mL</strong></li><li><strong>In teaspoons</strong> = <code>In cubic feet × 5745.03896103896</code> = <strong>5 745.039 tsp</strong></li><li><strong>In tablespoons</strong> = <code>In cubic feet × 1915.01298701299</code> = <strong>1 915.013 tbsp</strong></li><li><strong>In US fluid ounces</strong> = <code>In cubic feet × 957.506493506494</code> = <strong>957.506 fl oz</strong></li><li><strong>In US cups</strong> = <code>In cubic feet × 119.688311688312</code> = <strong>119.688 cup</strong></li><li><strong>In US pints</strong> = <code>In cubic feet × 59.8441558441558</code> = <strong>59.844 pt-liquid</strong></li><li><strong>In US quarts</strong> = <code>In cubic feet × 29.9220779220779</code> = <strong>29.922 qt</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Litres, millilitres, teaspoons, tablespoons, US fluid ounces, US cups, US pints and US quarts should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With In cubic feet = 0.25, the page reports <strong>litres</strong> = 7.079, <strong>millilitres</strong> = 7 079.212, <strong>teaspoons</strong> = 1 436.26, <strong>tablespoons</strong> = 478.753, <strong>US fluid ounces</strong> = 239.377, <strong>US cups</strong> = 29.922, <strong>US pints</strong> = 14.961, <strong>US quarts</strong> = 7.481.</li><li>With In cubic feet = 4, the page reports <strong>litres</strong> = 113.267, <strong>millilitres</strong> = 113 267.386, <strong>teaspoons</strong> = 22 980.156, <strong>tablespoons</strong> = 7 660.052, <strong>US fluid ounces</strong> = 3 830.026, <strong>US cups</strong> = 478.753, <strong>US pints</strong> = 239.377, <strong>US quarts</strong> = 119.688.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>In litres</strong></td><td><code>1 × 28.316846592</code></td><td><strong>28.317</strong></td></tr><tr><td><strong>In millilitres</strong></td><td><code>1 × 28316.846592</code></td><td><strong>28 316.847</strong></td></tr><tr><td><strong>In teaspoons</strong></td><td><code>1 × 5745.03896103896</code></td><td><strong>5 745.039</strong></td></tr><tr><td><strong>In tablespoons</strong></td><td><code>1 × 1915.01298701299</code></td><td><strong>1 915.013</strong></td></tr><tr><td><strong>In US fluid ounces</strong></td><td><code>1 × 957.506493506494</code></td><td><strong>957.506</strong></td></tr><tr><td><strong>In US cups</strong></td><td><code>1 × 119.688311688312</code></td><td><strong>119.688</strong></td></tr><tr><td><strong>In US pints</strong></td><td><code>1 × 59.8441558441558</code></td><td><strong>59.844</strong></td></tr><tr><td><strong>In US quarts</strong></td><td><code>1 × 29.9220779220779</code></td><td><strong>29.922</strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'The same conversion at other values',
                'html' => '<p>One row per reading, the input from a tenth of its opening value up to a thousand times it. The point of the table is the shape rather than the figures: a column that keeps its first digits as the input grows is a proportional relationship, and a column whose digits move sideways is one with an offset or a power in it.</p><table class="calc-table"><thead><tr><th>In cubic feet</th><th>litres</th><th>millilitres</th><th>teaspoons</th><th>tablespoons</th><th>US fluid ounces</th><th>US cups</th><th>US pints</th><th>US quarts</th></tr></thead><tbody><tr><td>0.1 ft³</td><td>2.832</td><td>2 831.685</td><td>574.504</td><td>191.501</td><td>95.751</td><td>11.969</td><td>5.984</td><td>2.992</td></tr><tr><td>0.5 ft³</td><td>14.158</td><td>14 158.423</td><td>2 872.519</td><td>957.506</td><td>478.753</td><td>59.844</td><td>29.922</td><td>14.961</td></tr><tr><td>1 ft³</td><td>28.317</td><td>28 316.847</td><td>5 745.039</td><td>1 915.013</td><td>957.506</td><td>119.688</td><td>59.844</td><td>29.922</td></tr><tr><td>2 ft³</td><td>56.634</td><td>56 633.693</td><td>11 490.078</td><td>3 830.026</td><td>1 915.013</td><td>239.377</td><td>119.688</td><td>59.844</td></tr><tr><td>5 ft³</td><td>141.584</td><td>141 584.233</td><td>28 725.195</td><td>9 575.065</td><td>4 787.532</td><td>598.442</td><td>299.221</td><td>149.61</td></tr><tr><td>10 ft³</td><td>283.168</td><td>283 168.466</td><td>57 450.39</td><td>19 150.13</td><td>9 575.065</td><td>1 196.883</td><td>598.442</td><td>299.221</td></tr><tr><td>100 ft³</td><td>2 831.685</td><td>2.832 × 10<sup>6</sup></td><td>574 503.896</td><td>191 501.299</td><td>95 750.649</td><td>11 968.831</td><td>5 984.416</td><td>2 992.208</td></tr><tr><td>1 000 ft³</td><td>28 316.847</td><td>2.832 × 10<sup>7</sup></td><td>5.745 × 10<sup>6</sup></td><td>1.915 × 10<sup>6</sup></td><td>957 506.494</td><td>119 688.312</td><td>59 844.156</td><td>29 922.078</td></tr></tbody></table><p>Nothing in that table was computed by a different route from the panel. It is the same formula, run eight times, which is why a row you can check by hand is a check on the whole page.</p>',
            ],
            [
                'title' => 'Four units, seven values',
                'html' => '<p>Four of the 9 units, at the values a person types. Each column is the same figure multiplied by one factor, so a row that looks wrong next to its neighbours is a factor typed wrongly rather than a formula that changes shape.</p><table class="calc-table"><thead><tr><th>Cubic feet</th><th>Litres</th><th>Millilitres</th><th>Teaspoons</th><th>Tablespoons</th></tr></thead><tbody><tr><td>1 ft³</td><td>28.316847</td><td>28316.846592</td><td>5745.038961</td><td>1915.012987</td></tr><tr><td>2 ft³</td><td>56.633693</td><td>56633.693184</td><td>11490.077922</td><td>3830.025974</td></tr><tr><td>5 ft³</td><td>141.584233</td><td>141584</td><td>28725.194805</td><td>9575.064935</td></tr><tr><td>10 ft³</td><td>283.168466</td><td>283168</td><td>57450.38961</td><td>19150.12987</td></tr><tr><td>25 ft³</td><td>707.921165</td><td>707921</td><td>143626</td><td>47875.324675</td></tr><tr><td>50 ft³</td><td>1415.84233</td><td>1.41584e+06</td><td>287252</td><td>95750.649351</td></tr><tr><td>100 ft³</td><td>2831.684659</td><td>2.83168e+06</td><td>574504</td><td>191501</td></tr></tbody></table><p>The panel reports 9 readings from the single box because the units share one dimension: they are all measures of volume, and the page holds every conversion factor between them. Nothing is rounded before the last step, so the figures in the table and the figures in the panel agree to the digit shown.</p><p>Converting between two of the columns directly means dividing their factors, and any route through this page gives the same answer as the direct route. That is worth testing once with a pair you know: a kilometre in metres, a kilogram in grams, an hour in seconds.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Picking the column by habit.</strong></strong> The unit you always use is not always the unit the other person meant.</li><li><strong><strong>Copying a rounded column.</strong></strong> The panel rounds for display; the table rounds the same way, so neither is a source of extra precision.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: litres (L), millilitres (mL), teaspoons (tsp), tablespoons (tbsp), US fluid ounces (fl oz), US cups (cup), US pints (pt-liquid), US quarts (qt).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need in cubic feet. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Litres, millilitres, teaspoons, tablespoons, US fluid ounces, US cups, US pints and US quarts should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>In cubic feet</strong> ×10</td><td>28.317</td><td>283.168</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
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
                'html' => '<ul><li><strong><strong>Specification sheets.</strong></strong> A part listed in one system and a drawing dimensioned in another.</li><li><strong><strong>Reports for two audiences.</strong></strong> The same quantity in the unit each reader expects, from one entry.</li><li><strong><strong>Sanity checks.</strong></strong> A figure that is reasonable in cubic feet and impossible in another unit is a typing error.</li><li><strong><strong>Teaching the dimension.</strong></strong> Seeing all the units of volume together makes the size of each one concrete.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the Cubic Feet Converter work out?',
                'a' => 'It returns litres, millilitres, teaspoons, tablespoons, US fluid ounces, US cups, US pints and US quarts from in cubic feet. The relationship is In cubic feet × 28.316846592.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'In cubic feet (ft³). The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: in cubic feet in ft³. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
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
