<?php

/**
 * Millilitre to Teaspoon Converter
 * /conversion/ml-tsp-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Millilitre to Teaspoon Converter',
    'meta' => [
        'title' => 'Millilitres to Teaspoons: 0.202884 to One, and Back',
        'description' => 'Convert millilitres to teaspoons at exactly 0.202884 teaspoons per millilitre. Type a figure and read teaspoons, the reverse rate and the same quantity in.',
        'h1' => 'Millilitre to Teaspoon Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'value',
                    'label' => 'In millilitres',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'mL',
                    'default' => '1',
                    'help' => 'The figure to convert, in millilitres',
                ],
                [
                    'name' => 'result',
                    'label' => 'Millilitres in teaspoons',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'tsp',
                ],
                [
                    'name' => 'base',
                    'label' => 'Millilitres in litres',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'L',
                ],
                [
                    'name' => 'factor',
                    'label' => 'Teaspoons per millilitre',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'tsp/mL',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Millilitre to Teaspoon Converter',
            'results' => [
                'result' => 'value * 0.202884',
                'base' => 'value * 0.001',
                'factor' => '0.202884',
            ],
        ],
    ],
    'article' => [
        'intro' => 'One millilitre is 0.202884 teaspoons, and the page computes that ratio for any figure you type rather than reading it off a table of round values.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>One millilitre is 0.202884 teaspoons, and that figure is a definition rather than a measurement, so it is exact to as many digits as you print it. The reverse is 4.928922 millilitres to the teaspoon, which is the same fact written the other way round.</p><p>Both units belong to the same dimension, so the conversion is a single multiplication. That is worth saying plainly because half the arithmetic mistakes in this area come from treating a conversion like a formula with an offset in it: there is no offset here, and twice the figure is twice the answer.</p><p>The page reports <strong>millilitres in teaspoons, millilitres in litres and teaspoons per millilitre</strong> from the boxes above it. The relationship is In millilitres × 0.202884. Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Millilitres in teaspoons</strong></td><td><code>In millilitres × 0.202884</code></td></tr><tr><td><strong>Millilitres in litres</strong></td><td><code>In millilitres × 0.001</code></td></tr><tr><td><strong>Teaspoons per millilitre</strong></td><td><code>0.202884</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 1 box and the page has everything it needs. It reports millilitres in teaspoons, millilitres in litres and teaspoons per millilitre.</p><ul><li><strong>In millilitres</strong> — in mL. The figure to convert, in millilitres</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Millilitres in teaspoons</strong> — in tsp</li><li><strong>Millilitres in litres</strong> — in L</li><li><strong>Teaspoons per millilitre</strong> — in tsp/mL</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — In millilitres = 1 mL — and the results panel reads:</p><ul><li><strong>Millilitres in teaspoons</strong> = <code>In millilitres × 0.202884</code> = <strong>0.203 tsp</strong></li><li><strong>Millilitres in litres</strong> = <code>In millilitres × 0.001</code> = <strong>0.001 L</strong></li><li><strong>Teaspoons per millilitre</strong> = <code>0.202884</code> = <strong>0.203 tsp/mL</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Millilitres in teaspoons, millilitres in litres and teaspoons per millilitre should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'How much each input moves the answer',
                'html' => '<p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>millilitres in teaspoons</th><th>millilitres in litres</th><th>teaspoons per millilitre</th></tr></thead><tbody></tbody></table><p>A ten per cent nudge is used because it is the size of error a person makes when they measure roughly. Where the table shows ten per cent in and ten per cent out, the relationship is proportional in that box and the accuracy of your measurement is the accuracy of the answer.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With In millilitres = 0.25, the page reports <strong>millilitres in teaspoons</strong> = 0.051, <strong>millilitres in litres</strong> = 0.00025, <strong>teaspoons per millilitre</strong> = 0.203.</li><li>With In millilitres = 4, the page reports <strong>millilitres in teaspoons</strong> = 0.812, <strong>millilitres in litres</strong> = 0.004, <strong>teaspoons per millilitre</strong> = 0.203.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>Millilitres in teaspoons</strong></td><td><code>1 × 0.202884</code></td><td><strong>0.203</strong></td></tr><tr><td><strong>Millilitres in litres</strong></td><td><code>1 × 0.001</code></td><td><strong>0.001</strong></td></tr><tr><td><strong>Teaspoons per millilitre</strong></td><td><code>0.202884</code></td><td><strong>0.203</strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'The same conversion at other values',
                'html' => '<p>One row per reading, the input from a tenth of its opening value up to a thousand times it. The point of the table is the shape rather than the figures: a column that keeps its first digits as the input grows is a proportional relationship, and a column whose digits move sideways is one with an offset or a power in it.</p><table class="calc-table"><thead><tr><th>In millilitres</th><th>millilitres in teaspoons</th><th>millilitres in litres</th><th>teaspoons per millilitre</th></tr></thead><tbody><tr><td>0.1 mL</td><td>0.02</td><td>0.0001</td><td>0.203</td></tr><tr><td>0.5 mL</td><td>0.101</td><td>0.0005</td><td>0.203</td></tr><tr><td>1 mL</td><td>0.203</td><td>0.001</td><td>0.203</td></tr><tr><td>2 mL</td><td>0.406</td><td>0.002</td><td>0.203</td></tr><tr><td>5 mL</td><td>1.014</td><td>0.005</td><td>0.203</td></tr><tr><td>10 mL</td><td>2.029</td><td>0.01</td><td>0.203</td></tr><tr><td>100 mL</td><td>20.288</td><td>0.1</td><td>0.203</td></tr><tr><td>1 000 mL</td><td>202.884</td><td>1</td><td>0.203</td></tr></tbody></table><p>Nothing in that table was computed by a different route from the panel. It is the same formula, run eight times, which is why a row you can check by hand is a check on the whole page.</p>',
            ],
            [
                'title' => 'Millilitres and teaspoons side by side',
                'html' => '<p>The same conversion read the other way, for the values people actually type. Every row is 0.202884 teaspoons to the millilitre, so the two columns multiply to give the same physical quantity.</p><table class="calc-table"><thead><tr><th>Teaspoons</th><th>Millilitres</th></tr></thead><tbody><tr><td>1 teaspoons</td><td>4.928922 millilitres</td></tr><tr><td>2 teaspoons</td><td>9.857843 millilitres</td></tr><tr><td>5 teaspoons</td><td>24.644608 millilitres</td></tr><tr><td>10 teaspoons</td><td>49.289216 millilitres</td></tr><tr><td>25 teaspoons</td><td>123.22304 millilitres</td></tr><tr><td>50 teaspoons</td><td>246.44608 millilitres</td></tr><tr><td>100 teaspoons</td><td>492.892159 millilitres</td></tr><tr><td>250 teaspoons</td><td>1232.230398 millilitres</td></tr><tr><td>500 teaspoons</td><td>2464.460797 millilitres</td></tr><tr><td>1 000 teaspoons</td><td>4928.921594 millilitres</td></tr></tbody></table><p>Dividing is the other direction: one teaspoon is 4.928922 millilitres, and that is the number to use when the figure you were given is already in teaspoons. The two factors are reciprocals, which is a quick check that neither was typed wrongly — multiply them and you should get one.</p><p>Precision deserves a sentence of its own. The factor 0.202884 is exact as written, but a figure typed into the box has only the digits you gave it, and the answer cannot be more precise than that. Where the small end of the range matters, work in the smaller unit: millilitres keep more significant figures for the same measurement.</p><p>One last check that costs nothing: convert a round figure you already know. A metre is 3.28 feet, a mile is 1.61 kilometres, a kilogram is 2.2 pounds. If the page disagrees with the number in your head by a factor rather than a little, the unit in the box is not the unit the label names.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Using the inverse by accident.</strong></strong> Multiplying when you should divide gives an answer out by 0.041162, which is large enough to notice but small enough to be believed.</li><li><strong><strong>Mixing the systems mid-calculation.</strong></strong> Convert once, at the end, rather than at every step.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: millilitres in teaspoons (tsp), millilitres in litres (L), teaspoons per millilitre (tsp/mL).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need in millilitres. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Millilitres in teaspoons, millilitres in litres and teaspoons per millilitre should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>In millilitres</strong> ×10</td><td>0.203</td><td>2.029</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
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
                'html' => '<ul><li><strong><strong>Reading a label.</strong></strong> A product marked in teaspoons and a form that asks for millilitres is the commonest place this factor is needed.</li><li><strong><strong>Estimating in your own units.</strong></strong> Someone quotes a figure in teaspoons and you think in millilitres: 0.202884 is the whole of the arithmetic.</li><li><strong><strong>Checking a spreadsheet.</strong></strong> A column converted with the wrong factor is out by exactly 0.202884, which is easy to see once you know which number to expect.</li><li><strong><strong>Teaching the relationship.</strong></strong> One factor, used both ways, is easier to remember than two rules.</li><li><strong><strong>Rounding decisions.</strong></strong> 0.202884 has enough digits that a rounded version shows up in the fourth significant figure and nowhere earlier.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the Millilitre to Teaspoon Converter work out?',
                'a' => 'It returns millilitres in teaspoons, millilitres in litres and teaspoons per millilitre from in millilitres. The relationship is In millilitres × 0.202884.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'In millilitres (mL). The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: in millilitres in mL. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
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
