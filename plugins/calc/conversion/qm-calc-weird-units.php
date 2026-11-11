<?php

/**
 * Weird Units Converter
 * /conversion/weird-units
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Weird Units Converter',
    'meta' => [
        'title' => 'Weird Units Converter — Every Unit on One Page',
        'description' => 'Type one figure in metres and read it in 9 units of length, with the factor for each written out. Both directions are on the page, with the factor written out.',
        'h1' => 'Weird Units Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'value',
                    'label' => 'In metres',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'm',
                    'default' => '1',
                    'help' => 'The figure to convert, in metres',
                ],
                [
                    'name' => 'fathom',
                    'label' => 'In fathoms',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'ftm',
                ],
                [
                    'name' => 'rod',
                    'label' => 'In rods',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'rd',
                ],
                [
                    'name' => 'hand',
                    'label' => 'In hands',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'chain',
                    'label' => 'In chains',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'ch',
                ],
                [
                    'name' => 'furlong',
                    'label' => 'In furlongs',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'fur',
                ],
                [
                    'name' => 'league',
                    'label' => 'In leagues',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'lea',
                ],
                [
                    'name' => 'angstrom',
                    'label' => 'In angstroms',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'Å',
                ],
                [
                    'name' => 'astronomical-unit',
                    'label' => 'In astronomical units',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'AU',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Weird Units Converter',
            'results' => [
                'fathom' => 'value * 1.8288',
                'rod' => 'value * 5.0292',
                'hand' => 'value * 0.1016',
                'chain' => 'value * 20.1168',
                'furlong' => 'value * 201.168',
                'league' => 'value * 4828.032',
                'angstrom' => 'value * 1e-10',
                'astronomical-unit' => 'value * 149597870700',
            ],
        ],
    ],
    'article' => [
        'intro' => 'One figure in metres, read out in every unit of length that the page carries.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>Most conversions are asked one at a time: how many of these in one of those. That is fine until you are looking at a specification sheet in one unit, a form asking for another, and a tape measure reading a third. This page shows the figure in 9 units at once so the one you need is already on screen.</p><p>Every reading comes from the same input and the same base unit, so the columns cannot disagree with each other. What they can do is make a mismatch obvious: a figure that looks plausible in one unit and absurd in another is usually a figure typed in the wrong one.</p><p>The page reports <strong>fathoms, rods, hands, chains, furlongs, leagues, angstroms and astronomical units</strong> from the boxes above it. The relationship is In metres × 1.8288. Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>fathoms</strong></td><td><code>In metres × 1.8288</code></td></tr><tr><td><strong>rods</strong></td><td><code>In metres × 5.0292</code></td></tr><tr><td><strong>hands</strong></td><td><code>In metres × 0.1016</code></td></tr><tr><td><strong>chains</strong></td><td><code>In metres × 20.1168</code></td></tr><tr><td><strong>furlongs</strong></td><td><code>In metres × 201.168</code></td></tr><tr><td><strong>leagues</strong></td><td><code>In metres × 4828.032</code></td></tr><tr><td><strong>angstroms</strong></td><td><code>In metres × 1e-10</code></td></tr><tr><td><strong>astronomical units</strong></td><td><code>In metres × 149597870700</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 1 box and the page has everything it needs. It reports fathoms, rods, hands, chains, furlongs, leagues, angstroms and astronomical units.</p><ul><li><strong>In metres</strong> — in m. The figure to convert, in metres</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>In fathoms</strong> — in ftm</li><li><strong>In rods</strong> — in rd</li><li><strong>In hands</strong> — in h</li><li><strong>In chains</strong> — in ch</li><li><strong>In furlongs</strong> — in fur</li><li><strong>In leagues</strong> — in lea</li><li><strong>In angstroms</strong> — in Å</li><li><strong>In astronomical units</strong> — in AU</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — In metres = 1 m — and the results panel reads:</p><ul><li><strong>In fathoms</strong> = <code>In metres × 1.8288</code> = <strong>1.829 ftm</strong></li><li><strong>In rods</strong> = <code>In metres × 5.0292</code> = <strong>5.029 rd</strong></li><li><strong>In hands</strong> = <code>In metres × 0.1016</code> = <strong>0.102 h</strong></li><li><strong>In chains</strong> = <code>In metres × 20.1168</code> = <strong>20.117 ch</strong></li><li><strong>In furlongs</strong> = <code>In metres × 201.168</code> = <strong>201.168 fur</strong></li><li><strong>In leagues</strong> = <code>In metres × 4828.032</code> = <strong>4 828.032 lea</strong></li><li><strong>In angstroms</strong> = <code>In metres × 1e-10</code> = <strong>1 × 10<sup>-10</sup> Å</strong></li><li><strong>In astronomical units</strong> = <code>In metres × 149597870700</code> = <strong>1.496 × 10<sup>11</sup> AU</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Fathoms, rods, hands, chains, furlongs, leagues, angstroms and astronomical units should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With In metres = 0.25, the page reports <strong>fathoms</strong> = 0.457, <strong>rods</strong> = 1.257, <strong>hands</strong> = 0.025, <strong>chains</strong> = 5.029, <strong>furlongs</strong> = 50.292, <strong>leagues</strong> = 1 207.008, <strong>angstroms</strong> = 2.5 × 10<sup>-11</sup>, <strong>astronomical units</strong> = 3.74 × 10<sup>10</sup>.</li><li>With In metres = 4, the page reports <strong>fathoms</strong> = 7.315, <strong>rods</strong> = 20.117, <strong>hands</strong> = 0.406, <strong>chains</strong> = 80.467, <strong>furlongs</strong> = 804.672, <strong>leagues</strong> = 19 312.128, <strong>angstroms</strong> = 4 × 10<sup>-10</sup>, <strong>astronomical units</strong> = 5.984 × 10<sup>11</sup>.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>In fathoms</strong></td><td><code>1 × 1.8288</code></td><td><strong>1.829</strong></td></tr><tr><td><strong>In rods</strong></td><td><code>1 × 5.0292</code></td><td><strong>5.029</strong></td></tr><tr><td><strong>In hands</strong></td><td><code>1 × 0.1016</code></td><td><strong>0.102</strong></td></tr><tr><td><strong>In chains</strong></td><td><code>1 × 20.1168</code></td><td><strong>20.117</strong></td></tr><tr><td><strong>In furlongs</strong></td><td><code>1 × 201.168</code></td><td><strong>201.168</strong></td></tr><tr><td><strong>In leagues</strong></td><td><code>1 × 4828.032</code></td><td><strong>4 828.032</strong></td></tr><tr><td><strong>In angstroms</strong></td><td><code>1 × 1e-10</code></td><td><strong>1 × 10<sup>-10</sup></strong></td></tr><tr><td><strong>In astronomical units</strong></td><td><code>1 × 149597870700</code></td><td><strong>1.496 × 10<sup>11</sup></strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>At these values the results span 1.49598e+21 times from smallest to largest, which is the sort of page where a misplaced decimal point survives a glance and only the unit gives it away.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'The same conversion at other values',
                'html' => '<p>One row per reading, the input from a tenth of its opening value up to a thousand times it. The point of the table is the shape rather than the figures: a column that keeps its first digits as the input grows is a proportional relationship, and a column whose digits move sideways is one with an offset or a power in it.</p><table class="calc-table"><thead><tr><th>In metres</th><th>fathoms</th><th>rods</th><th>hands</th><th>chains</th><th>furlongs</th><th>leagues</th><th>angstroms</th><th>astronomical units</th></tr></thead><tbody><tr><td>0.1 m</td><td>0.183</td><td>0.503</td><td>0.01</td><td>2.012</td><td>20.117</td><td>482.803</td><td>1 × 10<sup>-11</sup></td><td>1.496 × 10<sup>10</sup></td></tr><tr><td>0.5 m</td><td>0.914</td><td>2.515</td><td>0.051</td><td>10.058</td><td>100.584</td><td>2 414.016</td><td>5 × 10<sup>-11</sup></td><td>7.48 × 10<sup>10</sup></td></tr><tr><td>1 m</td><td>1.829</td><td>5.029</td><td>0.102</td><td>20.117</td><td>201.168</td><td>4 828.032</td><td>1 × 10<sup>-10</sup></td><td>1.496 × 10<sup>11</sup></td></tr><tr><td>2 m</td><td>3.658</td><td>10.058</td><td>0.203</td><td>40.234</td><td>402.336</td><td>9 656.064</td><td>2 × 10<sup>-10</sup></td><td>2.992 × 10<sup>11</sup></td></tr><tr><td>5 m</td><td>9.144</td><td>25.146</td><td>0.508</td><td>100.584</td><td>1 005.84</td><td>24 140.16</td><td>5 × 10<sup>-10</sup></td><td>7.48 × 10<sup>11</sup></td></tr><tr><td>10 m</td><td>18.288</td><td>50.292</td><td>1.016</td><td>201.168</td><td>2 011.68</td><td>48 280.32</td><td>1 × 10<sup>-9</sup></td><td>1.496 × 10<sup>12</sup></td></tr><tr><td>100 m</td><td>182.88</td><td>502.92</td><td>10.16</td><td>2 011.68</td><td>20 116.8</td><td>482 803.2</td><td>1 × 10<sup>-8</sup></td><td>1.496 × 10<sup>13</sup></td></tr><tr><td>1 000 m</td><td>1 828.8</td><td>5 029.2</td><td>101.6</td><td>20 116.8</td><td>201 168</td><td>4.828 × 10<sup>6</sup></td><td>1 × 10<sup>-7</sup></td><td>1.496 × 10<sup>14</sup></td></tr></tbody></table><p>Nothing in that table was computed by a different route from the panel. It is the same formula, run eight times, which is why a row you can check by hand is a check on the whole page.</p>',
            ],
            [
                'title' => 'Four units, seven values',
                'html' => '<p>Four of the 9 units, at the values a person types. Each column is the same figure multiplied by one factor, so a row that looks wrong next to its neighbours is a factor typed wrongly rather than a formula that changes shape.</p><table class="calc-table"><thead><tr><th>Metres</th><th>Fathoms</th><th>Rods</th><th>Hands</th><th>Chains</th></tr></thead><tbody><tr><td>1 m</td><td>1.8288</td><td>5.0292</td><td>0.1016</td><td>20.1168</td></tr><tr><td>2 m</td><td>3.6576</td><td>10.0584</td><td>0.2032</td><td>40.2336</td></tr><tr><td>5 m</td><td>9.144</td><td>25.146</td><td>0.508</td><td>100.584</td></tr><tr><td>10 m</td><td>18.288</td><td>50.292</td><td>1.016</td><td>201.168</td></tr><tr><td>25 m</td><td>45.72</td><td>125.73</td><td>2.54</td><td>502.92</td></tr><tr><td>50 m</td><td>91.44</td><td>251.46</td><td>5.08</td><td>1005.84</td></tr><tr><td>100 m</td><td>182.88</td><td>502.92</td><td>10.16</td><td>2011.68</td></tr></tbody></table><p>The panel reports 9 readings from the single box because the units share one dimension: they are all measures of length, and the page holds every conversion factor between them. Nothing is rounded before the last step, so the figures in the table and the figures in the panel agree to the digit shown.</p><p>Converting between two of the columns directly means dividing their factors, and any route through this page gives the same answer as the direct route. That is worth testing once with a pair you know: a kilometre in metres, a kilogram in grams, an hour in seconds.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Picking the column by habit.</strong></strong> The unit you always use is not always the unit the other person meant.</li><li><strong><strong>Copying a rounded column.</strong></strong> The panel rounds for display; the table rounds the same way, so neither is a source of extra precision.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: fathoms (ftm), rods (rd), hands (h), chains (ch), furlongs (fur), leagues (lea), angstroms (Å), astronomical units (AU).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need in metres. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Fathoms, rods, hands, chains, furlongs, leagues, angstroms and astronomical units should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>In metres</strong> ×10</td><td>1.829</td><td>18.288</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
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
                'html' => '<ul><li><strong><strong>Specification sheets.</strong></strong> A part listed in one system and a drawing dimensioned in another.</li><li><strong><strong>Reports for two audiences.</strong></strong> The same quantity in the unit each reader expects, from one entry.</li><li><strong><strong>Sanity checks.</strong></strong> A figure that is reasonable in metres and impossible in another unit is a typing error.</li><li><strong><strong>Teaching the dimension.</strong></strong> Seeing all the units of length together makes the size of each one concrete.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the Weird Units Converter work out?',
                'a' => 'It returns fathoms, rods, hands, chains, furlongs, leagues, angstroms and astronomical units from in metres. The relationship is In metres × 1.8288.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'In metres (m). The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: in metres in m. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
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
