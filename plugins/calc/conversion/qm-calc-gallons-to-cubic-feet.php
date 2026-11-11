<?php

/**
 * US gallon to Cubic foot Converter
 * /conversion/gallons-to-cubic-feet
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'US gallon to Cubic foot Converter',
    'meta' => [
        'title' => 'US gallons to Cubic feet: 0.133681 to One, and Back',
        'description' => 'Convert US gallons to cubic feet at exactly 0.133681 cubic feet per US gallon. Type a figure and read cubic feet, the reverse rate and the same quantity in.',
        'h1' => 'US gallon to Cubic foot Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'value',
                    'label' => 'In US gallons',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'gal',
                    'default' => '1',
                    'help' => 'The figure to convert, in US gallons',
                ],
                [
                    'name' => 'result',
                    'label' => 'US gallons in cubic feet',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'base',
                    'label' => 'US gallons in litres',
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
                    'label' => 'Cubic feet per US gallon',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'ft³/gal',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'US gallon to Cubic foot Converter',
            'results' => [
                'result' => 'value * 0.133680555555556',
                'base' => 'value * 3.785411784',
                'factor' => '0.133680555555556',
            ],
        ],
    ],
    'article' => [
        'intro' => 'One US gallon is 0.133681 cubic feet, and the page computes that ratio for any figure you type rather than reading it off a table of round values.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>One US gallon is 0.133681 cubic feet, and that figure is a definition rather than a measurement, so it is exact to as many digits as you print it. The reverse is 7.480519 US gallons to the cubic foot, which is the same fact written the other way round.</p><p>Both units belong to the same dimension, so the conversion is a single multiplication. That is worth saying plainly because half the arithmetic mistakes in this area come from treating a conversion like a formula with an offset in it: there is no offset here, and twice the figure is twice the answer.</p><p>The page reports <strong>US gallons in cubic feet, US gallons in litres and cubic feet per US gallon</strong> from the boxes above it. The relationship is In US gallons × 0.133680555555556. Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>US gallons in cubic feet</strong></td><td><code>In US gallons × 0.133680555555556</code></td></tr><tr><td><strong>US gallons in litres</strong></td><td><code>In US gallons × 3.785411784</code></td></tr><tr><td><strong>Cubic feet per US gallon</strong></td><td><code>0.133680555555556</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 1 box and the page has everything it needs. It reports US gallons in cubic feet, US gallons in litres and cubic feet per US gallon.</p><ul><li><strong>In US gallons</strong> — in gal. The figure to convert, in US gallons</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>US gallons in cubic feet</strong> — in ft³</li><li><strong>US gallons in litres</strong> — in L</li><li><strong>Cubic feet per US gallon</strong> — in ft³/gal</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — In US gallons = 1 gal — and the results panel reads:</p><ul><li><strong>US gallons in cubic feet</strong> = <code>In US gallons × 0.133680555555556</code> = <strong>0.134 ft³</strong></li><li><strong>US gallons in litres</strong> = <code>In US gallons × 3.785411784</code> = <strong>3.785 L</strong></li><li><strong>Cubic feet per US gallon</strong> = <code>0.133680555555556</code> = <strong>0.134 ft³/gal</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>US gallons in cubic feet, US gallons in litres and cubic feet per US gallon should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With In US gallons = 0.25, the page reports <strong>US gallons in cubic feet</strong> = 0.033, <strong>US gallons in litres</strong> = 0.946, <strong>cubic feet per US gallon</strong> = 0.134.</li><li>With In US gallons = 4, the page reports <strong>US gallons in cubic feet</strong> = 0.535, <strong>US gallons in litres</strong> = 15.142, <strong>cubic feet per US gallon</strong> = 0.134.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>US gallons in cubic feet</strong></td><td><code>1 × 0.133680555555556</code></td><td><strong>0.134</strong></td></tr><tr><td><strong>US gallons in litres</strong></td><td><code>1 × 3.785411784</code></td><td><strong>3.785</strong></td></tr><tr><td><strong>Cubic feet per US gallon</strong></td><td><code>0.133680555555556</code></td><td><strong>0.134</strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'The same conversion at other values',
                'html' => '<p>One row per reading, the input from a tenth of its opening value up to a thousand times it. The point of the table is the shape rather than the figures: a column that keeps its first digits as the input grows is a proportional relationship, and a column whose digits move sideways is one with an offset or a power in it.</p><table class="calc-table"><thead><tr><th>In US gallons</th><th>US gallons in cubic feet</th><th>US gallons in litres</th><th>cubic feet per US gallon</th></tr></thead><tbody><tr><td>0.1 gal</td><td>0.013</td><td>0.379</td><td>0.134</td></tr><tr><td>0.5 gal</td><td>0.067</td><td>1.893</td><td>0.134</td></tr><tr><td>1 gal</td><td>0.134</td><td>3.785</td><td>0.134</td></tr><tr><td>2 gal</td><td>0.267</td><td>7.571</td><td>0.134</td></tr><tr><td>5 gal</td><td>0.668</td><td>18.927</td><td>0.134</td></tr><tr><td>10 gal</td><td>1.337</td><td>37.854</td><td>0.134</td></tr><tr><td>100 gal</td><td>13.368</td><td>378.541</td><td>0.134</td></tr><tr><td>1 000 gal</td><td>133.681</td><td>3 785.412</td><td>0.134</td></tr></tbody></table><p>Nothing in that table was computed by a different route from the panel. It is the same formula, run eight times, which is why a row you can check by hand is a check on the whole page.</p>',
            ],
            [
                'title' => 'US gallons and cubic feet side by side',
                'html' => '<p>The same conversion read the other way, for the values people actually type. Every row is 0.133681 cubic feet to the US gallon, so the two columns multiply to give the same physical quantity.</p><table class="calc-table"><thead><tr><th>Cubic feet</th><th>US gallons</th></tr></thead><tbody><tr><td>1 cubic feet</td><td>7.480519 US gallons</td></tr><tr><td>2 cubic feet</td><td>14.961039 US gallons</td></tr><tr><td>5 cubic feet</td><td>37.402597 US gallons</td></tr><tr><td>10 cubic feet</td><td>74.805195 US gallons</td></tr><tr><td>25 cubic feet</td><td>187.012987 US gallons</td></tr><tr><td>50 cubic feet</td><td>374.025974 US gallons</td></tr><tr><td>100 cubic feet</td><td>748.051948 US gallons</td></tr><tr><td>250 cubic feet</td><td>1870.12987 US gallons</td></tr><tr><td>500 cubic feet</td><td>3740.25974 US gallons</td></tr><tr><td>1 000 cubic feet</td><td>7480.519481 US gallons</td></tr></tbody></table><p>Dividing is the other direction: one cubic foot is 7.480519 US gallons, and that is the number to use when the figure you were given is already in cubic feet. The two factors are reciprocals, which is a quick check that neither was typed wrongly — multiply them and you should get one.</p><p>Precision deserves a sentence of its own. The factor 0.133681 is exact as written, but a figure typed into the box has only the digits you gave it, and the answer cannot be more precise than that. Where the small end of the range matters, work in the smaller unit: US gallons keep more significant figures for the same measurement.</p><p>One last check that costs nothing: convert a round figure you already know. A metre is 3.28 feet, a mile is 1.61 kilometres, a kilogram is 2.2 pounds. If the page disagrees with the number in your head by a factor rather than a little, the unit in the box is not the unit the label names.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Using the inverse by accident.</strong></strong> Multiplying when you should divide gives an answer out by 0.0178705, which is large enough to notice but small enough to be believed.</li><li><strong><strong>Mixing the systems mid-calculation.</strong></strong> Convert once, at the end, rather than at every step.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: US gallons in cubic feet (ft³), US gallons in litres (L), cubic feet per US gallon (ft³/gal).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need in US gallons. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> US gallons in cubic feet, US gallons in litres and cubic feet per US gallon should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>In US gallons</strong> ×10</td><td>0.134</td><td>1.337</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
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
                'html' => '<ul><li><strong><strong>Reading a label.</strong></strong> A product marked in cubic feet and a form that asks for US gallons is the commonest place this factor is needed.</li><li><strong><strong>Estimating in your own units.</strong></strong> Someone quotes a figure in cubic feet and you think in US gallons: 0.133681 is the whole of the arithmetic.</li><li><strong><strong>Checking a spreadsheet.</strong></strong> A column converted with the wrong factor is out by exactly 0.133681, which is easy to see once you know which number to expect.</li><li><strong><strong>Teaching the relationship.</strong></strong> One factor, used both ways, is easier to remember than two rules.</li><li><strong><strong>Rounding decisions.</strong></strong> 0.133681 has enough digits that a rounded version shows up in the fourth significant figure and nowhere earlier.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the US gallon to Cubic foot Converter work out?',
                'a' => 'It returns US gallons in cubic feet, US gallons in litres and cubic feet per US gallon from in US gallons. The relationship is In US gallons × 0.133680555555556.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'In US gallons (gal). The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: in US gallons in gal. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
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
