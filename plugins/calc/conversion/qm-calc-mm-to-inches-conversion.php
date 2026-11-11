<?php

/**
 * Millimetre to Inch Converter
 * /conversion/mm-to-inches-conversion
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Millimetre to Inch Converter',
    'meta' => [
        'title' => 'Millimetres to Inches: 0.03937 to One, and Back',
        'description' => 'Convert millimetres to inches at exactly 0.03937 inches per millimetre. Type a figure and read inches, the reverse rate and the same quantity in metres.',
        'h1' => 'Millimetre to Inch Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'value',
                    'label' => 'In millimetres',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'mm',
                    'default' => '1',
                    'help' => 'The figure to convert, in millimetres',
                ],
                [
                    'name' => 'result',
                    'label' => 'Millimetres in inches',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'base',
                    'label' => 'Millimetres in metres',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'm',
                ],
                [
                    'name' => 'factor',
                    'label' => 'Inches per millimetre',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'in/mm',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Millimetre to Inch Converter',
            'results' => [
                'result' => 'value * 0.03937',
                'base' => 'value * 0.001',
                'factor' => '0.03937',
            ],
        ],
    ],
    'article' => [
        'intro' => 'One millimetre is 0.03937 inches, and the page computes that ratio for any figure you type rather than reading it off a table of round values.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>One millimetre is 0.03937 inches, and that figure is a definition rather than a measurement, so it is exact to as many digits as you print it. The reverse is 25.4 millimetres to the inch, which is the same fact written the other way round.</p><p>Both units belong to the same dimension, so the conversion is a single multiplication. That is worth saying plainly because half the arithmetic mistakes in this area come from treating a conversion like a formula with an offset in it: there is no offset here, and twice the figure is twice the answer.</p><p>The page reports <strong>millimetres in inches, millimetres in metres and inches per millimetre</strong> from the boxes above it. The relationship is In millimetres × 0.03937. Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Millimetres in inches</strong></td><td><code>In millimetres × 0.03937</code></td></tr><tr><td><strong>Millimetres in metres</strong></td><td><code>In millimetres × 0.001</code></td></tr><tr><td><strong>Inches per millimetre</strong></td><td><code>0.03937</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 1 box and the page has everything it needs. It reports millimetres in inches, millimetres in metres and inches per millimetre.</p><ul><li><strong>In millimetres</strong> — in mm. The figure to convert, in millimetres</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Millimetres in inches</strong> — in in</li><li><strong>Millimetres in metres</strong> — in m</li><li><strong>Inches per millimetre</strong> — in in/mm</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — In millimetres = 1 mm — and the results panel reads:</p><ul><li><strong>Millimetres in inches</strong> = <code>In millimetres × 0.03937</code> = <strong>0.039 in</strong></li><li><strong>Millimetres in metres</strong> = <code>In millimetres × 0.001</code> = <strong>0.001 m</strong></li><li><strong>Inches per millimetre</strong> = <code>0.03937</code> = <strong>0.039 in/mm</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Millimetres in inches, millimetres in metres and inches per millimetre should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'How much each input moves the answer',
                'html' => '<p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>millimetres in inches</th><th>millimetres in metres</th><th>inches per millimetre</th></tr></thead><tbody></tbody></table><p>A ten per cent nudge is used because it is the size of error a person makes when they measure roughly. Where the table shows ten per cent in and ten per cent out, the relationship is proportional in that box and the accuracy of your measurement is the accuracy of the answer.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With In millimetres = 0.25, the page reports <strong>millimetres in inches</strong> = 0.01, <strong>millimetres in metres</strong> = 0.00025, <strong>inches per millimetre</strong> = 0.039.</li><li>With In millimetres = 4, the page reports <strong>millimetres in inches</strong> = 0.157, <strong>millimetres in metres</strong> = 0.004, <strong>inches per millimetre</strong> = 0.039.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>Millimetres in inches</strong></td><td><code>1 × 0.03937</code></td><td><strong>0.039</strong></td></tr><tr><td><strong>Millimetres in metres</strong></td><td><code>1 × 0.001</code></td><td><strong>0.001</strong></td></tr><tr><td><strong>Inches per millimetre</strong></td><td><code>0.03937</code></td><td><strong>0.039</strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'The same conversion at other values',
                'html' => '<p>One row per reading, the input from a tenth of its opening value up to a thousand times it. The point of the table is the shape rather than the figures: a column that keeps its first digits as the input grows is a proportional relationship, and a column whose digits move sideways is one with an offset or a power in it.</p><table class="calc-table"><thead><tr><th>In millimetres</th><th>millimetres in inches</th><th>millimetres in metres</th><th>inches per millimetre</th></tr></thead><tbody><tr><td>0.1 mm</td><td>0.004</td><td>0.0001</td><td>0.039</td></tr><tr><td>0.5 mm</td><td>0.02</td><td>0.0005</td><td>0.039</td></tr><tr><td>1 mm</td><td>0.039</td><td>0.001</td><td>0.039</td></tr><tr><td>2 mm</td><td>0.079</td><td>0.002</td><td>0.039</td></tr><tr><td>5 mm</td><td>0.197</td><td>0.005</td><td>0.039</td></tr><tr><td>10 mm</td><td>0.394</td><td>0.01</td><td>0.039</td></tr><tr><td>100 mm</td><td>3.937</td><td>0.1</td><td>0.039</td></tr><tr><td>1 000 mm</td><td>39.37</td><td>1</td><td>0.039</td></tr></tbody></table><p>Nothing in that table was computed by a different route from the panel. It is the same formula, run eight times, which is why a row you can check by hand is a check on the whole page.</p>',
            ],
            [
                'title' => 'Millimetres and inches side by side',
                'html' => '<p>The same conversion read the other way, for the values people actually type. Every row is 0.03937 inches to the millimetre, so the two columns multiply to give the same physical quantity.</p><table class="calc-table"><thead><tr><th>Inches</th><th>Millimetres</th></tr></thead><tbody><tr><td>1 inches</td><td>25.4 millimetres</td></tr><tr><td>2 inches</td><td>50.8 millimetres</td></tr><tr><td>5 inches</td><td>127 millimetres</td></tr><tr><td>10 inches</td><td>254 millimetres</td></tr><tr><td>25 inches</td><td>635 millimetres</td></tr><tr><td>50 inches</td><td>1 270 millimetres</td></tr><tr><td>100 inches</td><td>2 540 millimetres</td></tr><tr><td>250 inches</td><td>6 350 millimetres</td></tr><tr><td>500 inches</td><td>12 700 millimetres</td></tr><tr><td>1 000 inches</td><td>25 400 millimetres</td></tr></tbody></table><p>Dividing is the other direction: one inch is 25.4 millimetres, and that is the number to use when the figure you were given is already in inches. The two factors are reciprocals, which is a quick check that neither was typed wrongly — multiply them and you should get one.</p><p>Precision deserves a sentence of its own. The factor 0.03937 is exact as written, but a figure typed into the box has only the digits you gave it, and the answer cannot be more precise than that. Where the small end of the range matters, work in the smaller unit: millimetres keep more significant figures for the same measurement.</p><p>One last check that costs nothing: convert a round figure you already know. A metre is 3.28 feet, a mile is 1.61 kilometres, a kilogram is 2.2 pounds. If the page disagrees with the number in your head by a factor rather than a little, the unit in the box is not the unit the label names.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Using the inverse by accident.</strong></strong> Multiplying when you should divide gives an answer out by 0.00155, which is large enough to notice but small enough to be believed.</li><li><strong><strong>Mixing the systems mid-calculation.</strong></strong> Convert once, at the end, rather than at every step.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: millimetres in inches (in), millimetres in metres (m), inches per millimetre (in/mm).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need in millimetres. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Millimetres in inches, millimetres in metres and inches per millimetre should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>In millimetres</strong> ×10</td><td>0.039</td><td>0.394</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
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
                'html' => '<ul><li><strong><strong>Reading a label.</strong></strong> A product marked in inches and a form that asks for millimetres is the commonest place this factor is needed.</li><li><strong><strong>Estimating in your own units.</strong></strong> Someone quotes a figure in inches and you think in millimetres: 0.03937 is the whole of the arithmetic.</li><li><strong><strong>Checking a spreadsheet.</strong></strong> A column converted with the wrong factor is out by exactly 0.03937, which is easy to see once you know which number to expect.</li><li><strong><strong>Teaching the relationship.</strong></strong> One factor, used both ways, is easier to remember than two rules.</li><li><strong><strong>Rounding decisions.</strong></strong> 0.03937 has enough digits that a rounded version shows up in the fourth significant figure and nowhere earlier.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the Millimetre to Inch Converter work out?',
                'a' => 'It returns millimetres in inches, millimetres in metres and inches per millimetre from in millimetres. The relationship is In millimetres × 0.03937.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'In millimetres (mm). The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: in millimetres in mm. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
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
