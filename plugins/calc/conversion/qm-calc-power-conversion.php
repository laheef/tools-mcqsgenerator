<?php

/**
 * Power Converter
 * /conversion/power-conversion
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Power Converter',
    'meta' => [
        'title' => 'Power Converter — Convert Watts into 6 Units',
        'description' => 'Type one figure in watts and read it in 6 units of power, with the factor for each written out. Both directions are on the page, with the factor written out.',
        'h1' => 'Power Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'value',
                    'label' => 'In watts',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'W',
                    'default' => '1',
                    'help' => 'The figure to convert, in watts',
                ],
                [
                    'name' => 'kw',
                    'label' => 'In kilowatts',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'kW',
                ],
                [
                    'name' => 'hp',
                    'label' => 'In horsepower',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'hp',
                ],
                [
                    'name' => 'ps',
                    'label' => 'In metric horsepower',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'PS',
                ],
                [
                    'name' => 'btuph',
                    'label' => 'In BTU per hour',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'BTU/h',
                ],
                [
                    'name' => 'mw-power',
                    'label' => 'In megawatts',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'MW',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Power Converter',
            'results' => [
                'kw' => 'value * 1000',
                'hp' => 'value * 745.699872',
                'ps' => 'value * 735.49875',
                'btuph' => 'value * 0.293071',
                'mw-power' => 'value * 1000000',
            ],
        ],
    ],
    'article' => [
        'intro' => 'One figure in watts, read out in every unit of power that the page carries.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>Most conversions are asked one at a time: how many of these in one of those. That is fine until you are looking at a specification sheet in one unit, a form asking for another, and a tape measure reading a third. This page shows the figure in 6 units at once so the one you need is already on screen.</p><p>Every reading comes from the same input and the same base unit, so the columns cannot disagree with each other. What they can do is make a mismatch obvious: a figure that looks plausible in one unit and absurd in another is usually a figure typed in the wrong one.</p><p>The page reports <strong>kilowatts, horsepower, metric horsepower, BTU per hour and megawatts</strong> from the boxes above it. The relationship is In watts × 1000. Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>kilowatts</strong></td><td><code>In watts × 1000</code></td></tr><tr><td><strong>horsepower</strong></td><td><code>In watts × 745.699872</code></td></tr><tr><td><strong>metric horsepower</strong></td><td><code>In watts × 735.49875</code></td></tr><tr><td><strong>BTU per hour</strong></td><td><code>In watts × 0.293071</code></td></tr><tr><td><strong>megawatts</strong></td><td><code>In watts × 1000000</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 1 box and the page has everything it needs. It reports kilowatts, horsepower, metric horsepower, BTU per hour and megawatts.</p><ul><li><strong>In watts</strong> — in W. The figure to convert, in watts</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>In kilowatts</strong> — in kW</li><li><strong>In horsepower</strong> — in hp</li><li><strong>In metric horsepower</strong> — in PS</li><li><strong>In BTU per hour</strong> — in BTU/h</li><li><strong>In megawatts</strong> — in MW</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — In watts = 1 W — and the results panel reads:</p><ul><li><strong>In kilowatts</strong> = <code>In watts × 1000</code> = <strong>1 000 kW</strong></li><li><strong>In horsepower</strong> = <code>In watts × 745.699872</code> = <strong>745.7 hp</strong></li><li><strong>In metric horsepower</strong> = <code>In watts × 735.49875</code> = <strong>735.499 PS</strong></li><li><strong>In BTU per hour</strong> = <code>In watts × 0.293071</code> = <strong>0.293 BTU/h</strong></li><li><strong>In megawatts</strong> = <code>In watts × 1000000</code> = <strong>1 × 10<sup>6</sup> MW</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Kilowatts, horsepower, metric horsepower, BTU per hour and megawatts should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'How much each input moves the answer',
                'html' => '<p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>kilowatts</th><th>horsepower</th><th>metric horsepower</th><th>BTU per hour</th><th>megawatts</th></tr></thead><tbody></tbody></table><p>A ten per cent nudge is used because it is the size of error a person makes when they measure roughly. Where the table shows ten per cent in and ten per cent out, the relationship is proportional in that box and the accuracy of your measurement is the accuracy of the answer.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With In watts = 0.25, the page reports <strong>kilowatts</strong> = 250, <strong>horsepower</strong> = 186.425, <strong>metric horsepower</strong> = 183.875, <strong>BTU per hour</strong> = 0.073, <strong>megawatts</strong> = 250 000.</li><li>With In watts = 4, the page reports <strong>kilowatts</strong> = 4 000, <strong>horsepower</strong> = 2 982.799, <strong>metric horsepower</strong> = 2 941.995, <strong>BTU per hour</strong> = 1.172, <strong>megawatts</strong> = 4 × 10<sup>6</sup>.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>In kilowatts</strong></td><td><code>1 × 1000</code></td><td><strong>1 000</strong></td></tr><tr><td><strong>In horsepower</strong></td><td><code>1 × 745.699872</code></td><td><strong>745.7</strong></td></tr><tr><td><strong>In metric horsepower</strong></td><td><code>1 × 735.49875</code></td><td><strong>735.499</strong></td></tr><tr><td><strong>In BTU per hour</strong></td><td><code>1 × 0.293071</code></td><td><strong>0.293</strong></td></tr><tr><td><strong>In megawatts</strong></td><td><code>1 × 1000000</code></td><td><strong>1 × 10<sup>6</sup></strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>At these values the results span 3.41214e+06 times from smallest to largest, which is the sort of page where a misplaced decimal point survives a glance and only the unit gives it away.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'The same conversion at other values',
                'html' => '<p>One row per reading, the input from a tenth of its opening value up to a thousand times it. The point of the table is the shape rather than the figures: a column that keeps its first digits as the input grows is a proportional relationship, and a column whose digits move sideways is one with an offset or a power in it.</p><table class="calc-table"><thead><tr><th>In watts</th><th>kilowatts</th><th>horsepower</th><th>metric horsepower</th><th>BTU per hour</th><th>megawatts</th></tr></thead><tbody><tr><td>0.1 W</td><td>100</td><td>74.57</td><td>73.55</td><td>0.029</td><td>100 000</td></tr><tr><td>0.5 W</td><td>500</td><td>372.85</td><td>367.749</td><td>0.147</td><td>500 000</td></tr><tr><td>1 W</td><td>1 000</td><td>745.7</td><td>735.499</td><td>0.293</td><td>1 × 10<sup>6</sup></td></tr><tr><td>2 W</td><td>2 000</td><td>1 491.4</td><td>1 470.997</td><td>0.586</td><td>2 × 10<sup>6</sup></td></tr><tr><td>5 W</td><td>5 000</td><td>3 728.499</td><td>3 677.494</td><td>1.465</td><td>5 × 10<sup>6</sup></td></tr><tr><td>10 W</td><td>10 000</td><td>7 456.999</td><td>7 354.987</td><td>2.931</td><td>1 × 10<sup>7</sup></td></tr><tr><td>100 W</td><td>100 000</td><td>74 569.987</td><td>73 549.875</td><td>29.307</td><td>1 × 10<sup>8</sup></td></tr><tr><td>1 000 W</td><td>1 × 10<sup>6</sup></td><td>745 699.872</td><td>735 498.75</td><td>293.071</td><td>1 × 10<sup>9</sup></td></tr></tbody></table><p>Nothing in that table was computed by a different route from the panel. It is the same formula, run eight times, which is why a row you can check by hand is a check on the whole page.</p>',
            ],
            [
                'title' => 'Four units, seven values',
                'html' => '<p>Four of the 6 units, at the values a person types. Each column is the same figure multiplied by one factor, so a row that looks wrong next to its neighbours is a factor typed wrongly rather than a formula that changes shape.</p><table class="calc-table"><thead><tr><th>Watts</th><th>Kilowatts</th><th>Horsepower</th><th>Metric horsepower</th><th>BTU per hour</th></tr></thead><tbody><tr><td>1 W</td><td>1 000</td><td>745.699872</td><td>735.49875</td><td>0.293071</td></tr><tr><td>2 W</td><td>2 000</td><td>1491.399743</td><td>1470.9975</td><td>0.586142</td></tr><tr><td>5 W</td><td>5 000</td><td>3728.499358</td><td>3677.49375</td><td>1.465355</td></tr><tr><td>10 W</td><td>10 000</td><td>7456.998716</td><td>7354.9875</td><td>2.930711</td></tr><tr><td>25 W</td><td>25 000</td><td>18642.49679</td><td>18387.46875</td><td>7.326777</td></tr><tr><td>50 W</td><td>50 000</td><td>37284.993579</td><td>36774.9375</td><td>14.653554</td></tr><tr><td>100 W</td><td>100 000</td><td>74569.987158</td><td>73549.875</td><td>29.307107</td></tr></tbody></table><p>The panel reports 6 readings from the single box because the units share one dimension: they are all measures of power, and the page holds every conversion factor between them. Nothing is rounded before the last step, so the figures in the table and the figures in the panel agree to the digit shown.</p><p>Converting between two of the columns directly means dividing their factors, and any route through this page gives the same answer as the direct route. That is worth testing once with a pair you know: a kilometre in metres, a kilogram in grams, an hour in seconds.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Picking the column by habit.</strong></strong> The unit you always use is not always the unit the other person meant.</li><li><strong><strong>Copying a rounded column.</strong></strong> The panel rounds for display; the table rounds the same way, so neither is a source of extra precision.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: kilowatts (kW), horsepower (hp), metric horsepower (PS), BTU per hour (BTU/h), megawatts (MW).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need in watts. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Kilowatts, horsepower, metric horsepower, BTU per hour and megawatts should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>In watts</strong> ×10</td><td>1 000</td><td>10 000</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
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
                'html' => '<ul><li><strong><strong>Specification sheets.</strong></strong> A part listed in one system and a drawing dimensioned in another.</li><li><strong><strong>Reports for two audiences.</strong></strong> The same quantity in the unit each reader expects, from one entry.</li><li><strong><strong>Sanity checks.</strong></strong> A figure that is reasonable in watts and impossible in another unit is a typing error.</li><li><strong><strong>Teaching the dimension.</strong></strong> Seeing all the units of power together makes the size of each one concrete.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the Power Converter work out?',
                'a' => 'It returns kilowatts, horsepower, metric horsepower, BTU per hour and megawatts from in watts. The relationship is In watts × 1000.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'In watts (W). The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: in watts in W. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
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
