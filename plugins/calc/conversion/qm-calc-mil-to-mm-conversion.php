<?php

/**
 * Mil to Millimetre Converter
 * /conversion/mil-to-mm-conversion
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Mil to Millimetre Converter',
    'meta' => [
        'title' => 'Mils to Millimetres: 0.0254 to One, and Back',
        'description' => 'Convert mils to millimetres at exactly 0.0254 millimetres per mil. Type a figure and read millimetres, the reverse rate and the same quantity in metres.',
        'h1' => 'Mil to Millimetre Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'value',
                    'label' => 'In mils',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'mil',
                    'default' => '1',
                    'help' => 'The figure to convert, in mils',
                ],
                [
                    'name' => 'result',
                    'label' => 'Mils in millimetres',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'mm',
                ],
                [
                    'name' => 'base',
                    'label' => 'Mils in metres',
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
                    'label' => 'Millimetres per mil',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'mm/mil',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Mil to Millimetre Converter',
            'results' => [
                'result' => 'value * 0.0254',
                'base' => 'value * 2.54e-05',
                'factor' => '0.0254',
            ],
        ],
    ],
    'article' => [
        'intro' => 'One mil is 0.0254 millimetres, and the page computes that ratio for any figure you type rather than reading it off a table of round values.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>One mil is 0.0254 millimetres, and that figure is a definition rather than a measurement, so it is exact to as many digits as you print it. The reverse is 39.370079 mils to the millimetre, which is the same fact written the other way round.</p><p>Both units belong to the same dimension, so the conversion is a single multiplication. That is worth saying plainly because half the arithmetic mistakes in this area come from treating a conversion like a formula with an offset in it: there is no offset here, and twice the figure is twice the answer.</p><p>The page reports <strong>mils in millimetres, mils in metres and millimetres per mil</strong> from the boxes above it. The relationship is In mils × 0.0254. Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Mils in millimetres</strong></td><td><code>In mils × 0.0254</code></td></tr><tr><td><strong>Mils in metres</strong></td><td><code>In mils × 2.54e-05</code></td></tr><tr><td><strong>Millimetres per mil</strong></td><td><code>0.0254</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 1 box and the page has everything it needs. It reports mils in millimetres, mils in metres and millimetres per mil.</p><ul><li><strong>In mils</strong> — in mil. The figure to convert, in mils</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Mils in millimetres</strong> — in mm</li><li><strong>Mils in metres</strong> — in m</li><li><strong>Millimetres per mil</strong> — in mm/mil</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — In mils = 1 mil — and the results panel reads:</p><ul><li><strong>Mils in millimetres</strong> = <code>In mils × 0.0254</code> = <strong>0.025 mm</strong></li><li><strong>Mils in metres</strong> = <code>In mils × 2.54e-05</code> = <strong>2.54 × 10<sup>-5</sup> m</strong></li><li><strong>Millimetres per mil</strong> = <code>0.0254</code> = <strong>0.025 mm/mil</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Mils in millimetres, mils in metres and millimetres per mil should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With In mils = 0.25, the page reports <strong>mils in millimetres</strong> = 0.006, <strong>mils in metres</strong> = 6.35 × 10<sup>-6</sup>, <strong>millimetres per mil</strong> = 0.025.</li><li>With In mils = 4, the page reports <strong>mils in millimetres</strong> = 0.102, <strong>mils in metres</strong> = 0.0001016, <strong>millimetres per mil</strong> = 0.025.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>Mils in millimetres</strong></td><td><code>1 × 0.0254</code></td><td><strong>0.025</strong></td></tr><tr><td><strong>Mils in metres</strong></td><td><code>1 × 2.54e-05</code></td><td><strong>2.54 × 10<sup>-5</sup></strong></td></tr><tr><td><strong>Millimetres per mil</strong></td><td><code>0.0254</code></td><td><strong>0.025</strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'The same conversion at other values',
                'html' => '<p>One row per reading, the input from a tenth of its opening value up to a thousand times it. The point of the table is the shape rather than the figures: a column that keeps its first digits as the input grows is a proportional relationship, and a column whose digits move sideways is one with an offset or a power in it.</p><table class="calc-table"><thead><tr><th>In mils</th><th>mils in millimetres</th><th>mils in metres</th><th>millimetres per mil</th></tr></thead><tbody><tr><td>0.1 mil</td><td>0.003</td><td>2.54 × 10<sup>-6</sup></td><td>0.025</td></tr><tr><td>0.5 mil</td><td>0.013</td><td>1.27 × 10<sup>-5</sup></td><td>0.025</td></tr><tr><td>1 mil</td><td>0.025</td><td>2.54 × 10<sup>-5</sup></td><td>0.025</td></tr><tr><td>2 mil</td><td>0.051</td><td>5.08 × 10<sup>-5</sup></td><td>0.025</td></tr><tr><td>5 mil</td><td>0.127</td><td>0.000127</td><td>0.025</td></tr><tr><td>10 mil</td><td>0.254</td><td>0.000254</td><td>0.025</td></tr><tr><td>100 mil</td><td>2.54</td><td>0.003</td><td>0.025</td></tr><tr><td>1 000 mil</td><td>25.4</td><td>0.025</td><td>0.025</td></tr></tbody></table><p>Nothing in that table was computed by a different route from the panel. It is the same formula, run eight times, which is why a row you can check by hand is a check on the whole page.</p>',
            ],
            [
                'title' => 'Mils and millimetres side by side',
                'html' => '<p>The same conversion read the other way, for the values people actually type. Every row is 0.0254 millimetres to the mil, so the two columns multiply to give the same physical quantity.</p><table class="calc-table"><thead><tr><th>Millimetres</th><th>Mils</th></tr></thead><tbody><tr><td>1 millimetres</td><td>39.370079 mils</td></tr><tr><td>2 millimetres</td><td>78.740157 mils</td></tr><tr><td>5 millimetres</td><td>196.850394 mils</td></tr><tr><td>10 millimetres</td><td>393.700787 mils</td></tr><tr><td>25 millimetres</td><td>984.251969 mils</td></tr><tr><td>50 millimetres</td><td>1968.503937 mils</td></tr><tr><td>100 millimetres</td><td>3937.007874 mils</td></tr><tr><td>250 millimetres</td><td>9842.519685 mils</td></tr><tr><td>500 millimetres</td><td>19685.03937 mils</td></tr><tr><td>1 000 millimetres</td><td>39370.07874 mils</td></tr></tbody></table><p>Dividing is the other direction: one millimetre is 39.370079 mils, and that is the number to use when the figure you were given is already in millimetres. The two factors are reciprocals, which is a quick check that neither was typed wrongly — multiply them and you should get one.</p><p>Precision deserves a sentence of its own. The factor 0.0254 is exact as written, but a figure typed into the box has only the digits you gave it, and the answer cannot be more precise than that. Where the small end of the range matters, work in the smaller unit: mils keep more significant figures for the same measurement.</p><p>One last check that costs nothing: convert a round figure you already know. A metre is 3.28 feet, a mile is 1.61 kilometres, a kilogram is 2.2 pounds. If the page disagrees with the number in your head by a factor rather than a little, the unit in the box is not the unit the label names.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Using the inverse by accident.</strong></strong> Multiplying when you should divide gives an answer out by 0.00064516, which is large enough to notice but small enough to be believed.</li><li><strong><strong>Mixing the systems mid-calculation.</strong></strong> Convert once, at the end, rather than at every step.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: mils in millimetres (mm), mils in metres (m), millimetres per mil (mm/mil).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need in mils. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Mils in millimetres, mils in metres and millimetres per mil should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>In mils</strong> ×10</td><td>0.025</td><td>0.254</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
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
                'html' => '<ul><li><strong><strong>Reading a label.</strong></strong> A product marked in millimetres and a form that asks for mils is the commonest place this factor is needed.</li><li><strong><strong>Estimating in your own units.</strong></strong> Someone quotes a figure in millimetres and you think in mils: 0.0254 is the whole of the arithmetic.</li><li><strong><strong>Checking a spreadsheet.</strong></strong> A column converted with the wrong factor is out by exactly 0.0254, which is easy to see once you know which number to expect.</li><li><strong><strong>Teaching the relationship.</strong></strong> One factor, used both ways, is easier to remember than two rules.</li><li><strong><strong>Rounding decisions.</strong></strong> 0.0254 has enough digits that a rounded version shows up in the fourth significant figure and nowhere earlier.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the Mil to Millimetre Converter work out?',
                'a' => 'It returns mils in millimetres, mils in metres and millimetres per mil from in mils. The relationship is In mils × 0.0254.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'In mils (mil). The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: in mils in mil. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
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
