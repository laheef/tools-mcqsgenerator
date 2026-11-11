<?php

/**
 * Kilogram per square centimetre to Pound per square inch Converter
 * /conversion/kg-cm2-to-psi-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Kilogram per square centimetre to Pound per square inch Converter',
    'meta' => [
        'title' => 'Kilograms per square centimetre to Pounds per square',
        'description' => 'Convert kilograms per square centimetre to pounds per square inch at exactly 14.223343 pounds per square inch per kilogram per square centimetre. Type a.',
        'h1' => 'Kilogram per square centimetre to Pound per square inch Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'value',
                    'label' => 'In kilograms per square centimetre',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'kgf/cm²',
                    'default' => '1',
                    'help' => 'The figure to convert, in kilograms per square centimetre',
                ],
                [
                    'name' => 'result',
                    'label' => 'Kilograms per square centimetre in pounds per square inch',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'psi',
                ],
                [
                    'name' => 'base',
                    'label' => 'Kilograms per square centimetre in pascals',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'Pa',
                ],
                [
                    'name' => 'factor',
                    'label' => 'Pounds per square inch per kilogram per square centimetre',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'psi/kgf/cm²',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Kilogram per square centimetre to Pound per square inch Converter',
            'results' => [
                'result' => 'value * 14.223343',
                'base' => 'value * 98066.5',
                'factor' => '14.223343',
            ],
        ],
    ],
    'article' => [
        'intro' => 'One kilogram per square centimetre is 14.223343 pounds per square inch, and the page computes that ratio for any figure you type rather than reading it off a table of round values.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>One kilogram per square centimetre is 14.223343 pounds per square inch, and that figure is a definition rather than a measurement, so it is exact to as many digits as you print it. The reverse is 0.070307 kilograms per square centimetre to the pound per square inch, which is the same fact written the other way round.</p><p>Both units belong to the same dimension, so the conversion is a single multiplication. That is worth saying plainly because half the arithmetic mistakes in this area come from treating a conversion like a formula with an offset in it: there is no offset here, and twice the figure is twice the answer.</p><p>The page reports <strong>kilograms per square centimetre in pounds per square inch, kilograms per square centimetre in pascals and pounds per square inch per kilogram per square centimetre</strong> from the boxes above it. The relationship is In kilograms per square centimetre × 14.223343. Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Kilograms per square centimetre in pounds per square inch</strong></td><td><code>In kilograms per square centimetre × 14.223343</code></td></tr><tr><td><strong>Kilograms per square centimetre in pascals</strong></td><td><code>In kilograms per square centimetre × 98066.5</code></td></tr><tr><td><strong>Pounds per square inch per kilogram per square centimetre</strong></td><td><code>14.223343</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 1 box and the page has everything it needs. It reports kilograms per square centimetre in pounds per square inch, kilograms per square centimetre in pascals and pounds per square inch per kilogram per square centimetre.</p><ul><li><strong>In kilograms per square centimetre</strong> — in kgf/cm². The figure to convert, in kilograms per square centimetre</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Kilograms per square centimetre in pounds per square inch</strong> — in psi</li><li><strong>Kilograms per square centimetre in pascals</strong> — in Pa</li><li><strong>Pounds per square inch per kilogram per square centimetre</strong> — in psi/kgf/cm²</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — In kilograms per square centimetre = 1 kgf/cm² — and the results panel reads:</p><ul><li><strong>Kilograms per square centimetre in pounds per square inch</strong> = <code>In kilograms per square centimetre × 14.223343</code> = <strong>14.223 psi</strong></li><li><strong>Kilograms per square centimetre in pascals</strong> = <code>In kilograms per square centimetre × 98066.5</code> = <strong>98 066.5 Pa</strong></li><li><strong>Pounds per square inch per kilogram per square centimetre</strong> = <code>14.223343</code> = <strong>14.223 psi/kgf/cm²</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Kilograms per square centimetre in pounds per square inch, kilograms per square centimetre in pascals and pounds per square inch per kilogram per square centimetre should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'How much each input moves the answer',
                'html' => '<p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>kilograms per square centimetre in pounds per square inch</th><th>kilograms per square centimetre in pascals</th><th>pounds per square inch per kilogram per square centimetre</th></tr></thead><tbody></tbody></table><p>A ten per cent nudge is used because it is the size of error a person makes when they measure roughly. Where the table shows ten per cent in and ten per cent out, the relationship is proportional in that box and the accuracy of your measurement is the accuracy of the answer.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With In kilograms per square centimetre = 0.25, the page reports <strong>kilograms per square centimetre in pounds per square inch</strong> = 3.556, <strong>kilograms per square centimetre in pascals</strong> = 24 516.625, <strong>pounds per square inch per kilogram per square centimetre</strong> = 14.223.</li><li>With In kilograms per square centimetre = 4, the page reports <strong>kilograms per square centimetre in pounds per square inch</strong> = 56.893, <strong>kilograms per square centimetre in pascals</strong> = 392 266, <strong>pounds per square inch per kilogram per square centimetre</strong> = 14.223.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>Kilograms per square centimetre in pounds per square inch</strong></td><td><code>1 × 14.223343</code></td><td><strong>14.223</strong></td></tr><tr><td><strong>Kilograms per square centimetre in pascals</strong></td><td><code>1 × 98066.5</code></td><td><strong>98 066.5</strong></td></tr><tr><td><strong>Pounds per square inch per kilogram per square centimetre</strong></td><td><code>14.223343</code></td><td><strong>14.223</strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>At these values the results span 6894.757442 times from smallest to largest, which is the sort of page where a misplaced decimal point survives a glance and only the unit gives it away.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'Kilograms per square centimetre and pounds per square inch side by side',
                'html' => '<p>The same conversion read the other way, for the values people actually type. Every row is 14.223343 pounds per square inch to the kilogram per square centimetre, so the two columns multiply to give the same physical quantity.</p><table class="calc-table"><thead><tr><th>Pounds per square inch</th><th>Kilograms per square centimetre</th></tr></thead><tbody><tr><td>1 pounds per square inch</td><td>0.070307 kilograms per square centimetre</td></tr><tr><td>2 pounds per square inch</td><td>0.140614 kilograms per square centimetre</td></tr><tr><td>5 pounds per square inch</td><td>0.351535 kilograms per square centimetre</td></tr><tr><td>10 pounds per square inch</td><td>0.70307 kilograms per square centimetre</td></tr><tr><td>25 pounds per square inch</td><td>1.757674 kilograms per square centimetre</td></tr><tr><td>50 pounds per square inch</td><td>3.515348 kilograms per square centimetre</td></tr><tr><td>100 pounds per square inch</td><td>7.030696 kilograms per square centimetre</td></tr><tr><td>250 pounds per square inch</td><td>17.576739 kilograms per square centimetre</td></tr><tr><td>500 pounds per square inch</td><td>35.153479 kilograms per square centimetre</td></tr><tr><td>1 000 pounds per square inch</td><td>70.306958 kilograms per square centimetre</td></tr></tbody></table><p>Dividing is the other direction: one pound per square inch is 0.070307 kilograms per square centimetre, and that is the number to use when the figure you were given is already in pounds per square inch. The two factors are reciprocals, which is a quick check that neither was typed wrongly — multiply them and you should get one.</p><p>Precision deserves a sentence of its own. The factor 14.223343 is exact as written, but a figure typed into the box has only the digits you gave it, and the answer cannot be more precise than that. Where the small end of the range matters, work in the smaller unit: pounds per square inch keep more significant figures for the same measurement.</p><p>One last check that costs nothing: convert a round figure you already know. A metre is 3.28 feet, a mile is 1.61 kilometres, a kilogram is 2.2 pounds. If the page disagrees with the number in your head by a factor rather than a little, the unit in the box is not the unit the label names.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Using the inverse by accident.</strong></strong> Multiplying when you should divide gives an answer out by 202.303495, which is large enough to notice but small enough to be believed.</li><li><strong><strong>Mixing the systems mid-calculation.</strong></strong> Convert once, at the end, rather than at every step.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: kilograms per square centimetre in pounds per square inch (psi), kilograms per square centimetre in pascals (Pa), pounds per square inch per kilogram per square centimetre (psi/kgf/cm²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need in kilograms per square centimetre. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Kilograms per square centimetre in pounds per square inch, kilograms per square centimetre in pascals and pounds per square inch per kilogram per square centimetre should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>In kilograms per square centimetre</strong> ×10</td><td>14.223</td><td>142.233</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
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
                'html' => '<ul><li><strong><strong>Reading a label.</strong></strong> A product marked in pounds per square inch and a form that asks for kilograms per square centimetre is the commonest place this factor is needed.</li><li><strong><strong>Estimating in your own units.</strong></strong> Someone quotes a figure in pounds per square inch and you think in kilograms per square centimetre: 14.223343 is the whole of the arithmetic.</li><li><strong><strong>Checking a spreadsheet.</strong></strong> A column converted with the wrong factor is out by exactly 14.223343, which is easy to see once you know which number to expect.</li><li><strong><strong>Teaching the relationship.</strong></strong> One factor, used both ways, is easier to remember than two rules.</li><li><strong><strong>Rounding decisions.</strong></strong> 14.223343 has enough digits that a rounded version shows up in the fourth significant figure and nowhere earlier.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the Kilogram per square centimetre to Pound per square inch Converter work out?',
                'a' => 'It returns kilograms per square centimetre in pounds per square inch, kilograms per square centimetre in pascals and pounds per square inch per kilogram per square centimetre from in kilograms per square centimetre. The relationship is In kilograms per square centimetre × 14.223343.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'In kilograms per square centimetre (kgf/cm²). The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: in kilograms per square centimetre in kgf/cm². The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
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
