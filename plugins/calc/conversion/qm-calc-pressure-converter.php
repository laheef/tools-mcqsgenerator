<?php

/**
 * Pressure Converter
 * /conversion/pressure-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Pressure Converter',
    'meta' => [
        'title' => 'Pressure Converter — Every Unit on One Page',
        'description' => 'Type one figure in pascals and read it in 9 units of pressure, with the factor for each written out. Both ways. Nothing is rounded before the last step.',
        'h1' => 'Pressure Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'value',
                    'label' => 'In pascals',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'Pa',
                    'default' => '1',
                    'help' => 'The figure to convert, in pascals',
                ],
                [
                    'name' => 'kpa',
                    'label' => 'In kilopascals',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'kPa',
                ],
                [
                    'name' => 'mpa',
                    'label' => 'In megapascals',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'MPa',
                ],
                [
                    'name' => 'bar',
                    'label' => 'In bar',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'bar',
                ],
                [
                    'name' => 'psi',
                    'label' => 'In pounds per square inch',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'psi',
                ],
                [
                    'name' => 'atm',
                    'label' => 'In atmospheres',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'atm',
                ],
                [
                    'name' => 'mmhg',
                    'label' => 'In millimetres of mercury',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'mmHg',
                ],
                [
                    'name' => 'torr',
                    'label' => 'In torr',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'Torr',
                ],
                [
                    'name' => 'inh2o',
                    'label' => 'In inches of water',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'inH₂O',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Pressure Converter',
            'results' => [
                'kpa' => 'value * 1000',
                'mpa' => 'value * 1000000',
                'bar' => 'value * 100000',
                'psi' => 'value * 6894.757293',
                'atm' => 'value * 101325',
                'mmhg' => 'value * 133.322387',
                'torr' => 'value * 133.322368',
                'inh2o' => 'value * 249.08891',
            ],
        ],
    ],
    'article' => [
        'intro' => 'One figure in pascals, read out in every unit of pressure that the page carries.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>Most conversions are asked one at a time: how many of these in one of those. That is fine until you are looking at a specification sheet in one unit, a form asking for another, and a tape measure reading a third. This page shows the figure in 9 units at once so the one you need is already on screen.</p><p>Every reading comes from the same input and the same base unit, so the columns cannot disagree with each other. What they can do is make a mismatch obvious: a figure that looks plausible in one unit and absurd in another is usually a figure typed in the wrong one.</p><p>The page reports <strong>kilopascals, megapascals, bar, pounds per square inch, atmospheres, millimetres of mercury, torr and inches of water</strong> from the boxes above it. The relationship is In pascals × 1000. Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>kilopascals</strong></td><td><code>In pascals × 1000</code></td></tr><tr><td><strong>megapascals</strong></td><td><code>In pascals × 1000000</code></td></tr><tr><td><strong>bar</strong></td><td><code>In pascals × 100000</code></td></tr><tr><td><strong>pounds per square inch</strong></td><td><code>In pascals × 6894.757293</code></td></tr><tr><td><strong>atmospheres</strong></td><td><code>In pascals × 101325</code></td></tr><tr><td><strong>millimetres of mercury</strong></td><td><code>In pascals × 133.322387</code></td></tr><tr><td><strong>torr</strong></td><td><code>In pascals × 133.322368</code></td></tr><tr><td><strong>inches of water</strong></td><td><code>In pascals × 249.08891</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 1 box and the page has everything it needs. It reports kilopascals, megapascals, bar, pounds per square inch, atmospheres, millimetres of mercury, torr and inches of water.</p><ul><li><strong>In pascals</strong> — in Pa. The figure to convert, in pascals</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>In kilopascals</strong> — in kPa</li><li><strong>In megapascals</strong> — in MPa</li><li><strong>In bar</strong> — in bar</li><li><strong>In pounds per square inch</strong> — in psi</li><li><strong>In atmospheres</strong> — in atm</li><li><strong>In millimetres of mercury</strong> — in mmHg</li><li><strong>In torr</strong> — in Torr</li><li><strong>In inches of water</strong> — in inH₂O</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — In pascals = 1 Pa — and the results panel reads:</p><ul><li><strong>In kilopascals</strong> = <code>In pascals × 1000</code> = <strong>1 000 kPa</strong></li><li><strong>In megapascals</strong> = <code>In pascals × 1000000</code> = <strong>1 × 10<sup>6</sup> MPa</strong></li><li><strong>In bar</strong> = <code>In pascals × 100000</code> = <strong>100 000 bar</strong></li><li><strong>In pounds per square inch</strong> = <code>In pascals × 6894.757293</code> = <strong>6 894.757 psi</strong></li><li><strong>In atmospheres</strong> = <code>In pascals × 101325</code> = <strong>101 325 atm</strong></li><li><strong>In millimetres of mercury</strong> = <code>In pascals × 133.322387</code> = <strong>133.322 mmHg</strong></li><li><strong>In torr</strong> = <code>In pascals × 133.322368</code> = <strong>133.322 Torr</strong></li><li><strong>In inches of water</strong> = <code>In pascals × 249.08891</code> = <strong>249.089 inH₂O</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Kilopascals, megapascals, bar, pounds per square inch, atmospheres, millimetres of mercury, torr and inches of water should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'How much each input moves the answer',
                'html' => '<p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>kilopascals</th><th>megapascals</th><th>bar</th><th>pounds per square inch</th><th>atmospheres</th><th>millimetres of mercury</th><th>torr</th><th>inches of water</th></tr></thead><tbody></tbody></table><p>A ten per cent nudge is used because it is the size of error a person makes when they measure roughly. Where the table shows ten per cent in and ten per cent out, the relationship is proportional in that box and the accuracy of your measurement is the accuracy of the answer.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With In pascals = 0.25, the page reports <strong>kilopascals</strong> = 250, <strong>megapascals</strong> = 250 000, <strong>bar</strong> = 25 000, <strong>pounds per square inch</strong> = 1 723.689, <strong>atmospheres</strong> = 25 331.25, <strong>millimetres of mercury</strong> = 33.331, <strong>torr</strong> = 33.331, <strong>inches of water</strong> = 62.272.</li><li>With In pascals = 4, the page reports <strong>kilopascals</strong> = 4 000, <strong>megapascals</strong> = 4 × 10<sup>6</sup>, <strong>bar</strong> = 400 000, <strong>pounds per square inch</strong> = 27 579.029, <strong>atmospheres</strong> = 405 300, <strong>millimetres of mercury</strong> = 533.29, <strong>torr</strong> = 533.289, <strong>inches of water</strong> = 996.356.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>In kilopascals</strong></td><td><code>1 × 1000</code></td><td><strong>1 000</strong></td></tr><tr><td><strong>In megapascals</strong></td><td><code>1 × 1000000</code></td><td><strong>1 × 10<sup>6</sup></strong></td></tr><tr><td><strong>In bar</strong></td><td><code>1 × 100000</code></td><td><strong>100 000</strong></td></tr><tr><td><strong>In pounds per square inch</strong></td><td><code>1 × 6894.757293</code></td><td><strong>6 894.757</strong></td></tr><tr><td><strong>In atmospheres</strong></td><td><code>1 × 101325</code></td><td><strong>101 325</strong></td></tr><tr><td><strong>In millimetres of mercury</strong></td><td><code>1 × 133.322387</code></td><td><strong>133.322</strong></td></tr><tr><td><strong>In torr</strong></td><td><code>1 × 133.322368</code></td><td><strong>133.322</strong></td></tr><tr><td><strong>In inches of water</strong></td><td><code>1 × 249.08891</code></td><td><strong>249.089</strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>At these values the results span 7500.616851 times from smallest to largest, which is the sort of page where a misplaced decimal point survives a glance and only the unit gives it away.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'Four units, seven values',
                'html' => '<p>Four of the 9 units, at the values a person types. Each column is the same figure multiplied by one factor, so a row that looks wrong next to its neighbours is a factor typed wrongly rather than a formula that changes shape.</p><table class="calc-table"><thead><tr><th>Pascals</th><th>Kilopascals</th><th>Megapascals</th><th>Bar</th><th>Pounds per square inch</th></tr></thead><tbody><tr><td>1 Pa</td><td>1 000</td><td>1 000 000</td><td>100 000</td><td>6894.757293</td></tr><tr><td>2 Pa</td><td>2 000</td><td>2 000 000</td><td>200 000</td><td>13789.514586</td></tr><tr><td>5 Pa</td><td>5 000</td><td>5 000 000</td><td>500 000</td><td>34473.786466</td></tr><tr><td>10 Pa</td><td>10 000</td><td>10 000 000</td><td>1 000 000</td><td>68947.572932</td></tr><tr><td>25 Pa</td><td>25 000</td><td>25 000 000</td><td>2 500 000</td><td>172369</td></tr><tr><td>50 Pa</td><td>50 000</td><td>50 000 000</td><td>5 000 000</td><td>344738</td></tr><tr><td>100 Pa</td><td>100 000</td><td>100 000 000</td><td>10 000 000</td><td>689476</td></tr></tbody></table><p>The panel reports 9 readings from the single box because the units share one dimension: they are all measures of pressure, and the page holds every conversion factor between them. Nothing is rounded before the last step, so the figures in the table and the figures in the panel agree to the digit shown.</p><p>Converting between two of the columns directly means dividing their factors, and any route through this page gives the same answer as the direct route. That is worth testing once with a pair you know: a kilometre in metres, a kilogram in grams, an hour in seconds.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Picking the column by habit.</strong></strong> The unit you always use is not always the unit the other person meant.</li><li><strong><strong>Copying a rounded column.</strong></strong> The panel rounds for display; the table rounds the same way, so neither is a source of extra precision.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: kilopascals (kPa), megapascals (MPa), bar (bar), pounds per square inch (psi), atmospheres (atm), millimetres of mercury (mmHg), torr (Torr), inches of water (inH₂O).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need in pascals. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Kilopascals, megapascals, bar, pounds per square inch, atmospheres, millimetres of mercury, torr and inches of water should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>In pascals</strong> ×10</td><td>1 000</td><td>10 000</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
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
                'html' => '<ul><li><strong><strong>Specification sheets.</strong></strong> A part listed in one system and a drawing dimensioned in another.</li><li><strong><strong>Reports for two audiences.</strong></strong> The same quantity in the unit each reader expects, from one entry.</li><li><strong><strong>Sanity checks.</strong></strong> A figure that is reasonable in pascals and impossible in another unit is a typing error.</li><li><strong><strong>Teaching the dimension.</strong></strong> Seeing all the units of pressure together makes the size of each one concrete.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the Pressure Converter work out?',
                'a' => 'It returns kilopascals, megapascals, bar, pounds per square inch, atmospheres, millimetres of mercury, torr and inches of water from in pascals. The relationship is In pascals × 1000.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'In pascals (Pa). The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: in pascals in Pa. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
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
