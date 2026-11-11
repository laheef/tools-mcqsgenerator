<?php

/**
 * Kelvin to Fahrenheit Converter
 * /conversion/kelvin-to-fahrenheit
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Kelvin to Fahrenheit Converter',
    'meta' => [
        'title' => 'Kelvin to Fahrenheit Converter: Celsius, Fahrenheit',
        'description' => 'Convert Kelvin to Celsius, Fahrenheit, Kelvin and Rankine with the offsets written out, a worked example and a table that crosses the freezing and boiling.',
        'h1' => 'Kelvin to Fahrenheit Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'value',
                    'label' => 'Temperature in Kelvin',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'K',
                    'default' => '20',
                    'help' => 'The reading to convert, in Kelvin',
                ],
                [
                    'name' => 'celsius',
                    'label' => 'In Celsius',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => '°C',
                ],
                [
                    'name' => 'fahrenheit',
                    'label' => 'In Fahrenheit',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => '°F',
                ],
                [
                    'name' => 'kelvin',
                    'label' => 'In Kelvin',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'K',
                ],
                [
                    'name' => 'rankine',
                    'label' => 'In Rankine',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => '°R',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Kelvin to Fahrenheit Converter',
            'results' => [
                'celsius' => 'value - 273.15',
                'fahrenheit' => '(value - 273.15) * 9 / 5 + 32',
                'kelvin' => 'value',
                'rankine' => '(celsius + 273.15) * 9 / 5',
            ],
        ],
    ],
    'article' => [
        'intro' => 'Temperature is the one conversion in this category with an offset in it, so the page writes the formula out and shows all four scales at once.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>A temperature is a position on a scale, not a quantity of something, and that is why this page has four results where the length converters have one. Celsius and Fahrenheit put their zero in different places and make their degrees different sizes, so converting needs a shift as well as a factor.</p><p>Kelvin starts at absolute zero, which makes it the scale to use in any calculation that multiplies or divides by temperature. Rankine is the same idea on Fahrenheit-sized degrees, and it survives in a few engineering tables.</p><p>The page reports <strong>celsius, fahrenheit, kelvin and rankine</strong> from the boxes above it. The relationship is Temperature in Kelvin - 273.15. Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Celsius</strong></td><td><code>Temperature in Kelvin - 273.15</code></td></tr><tr><td><strong>Fahrenheit</strong></td><td><code>(Temperature in Kelvin - 273.15) × 9 ÷ 5 + 32</code></td></tr><tr><td><strong>Kelvin</strong></td><td><code>Temperature in Kelvin</code></td></tr><tr><td><strong>Rankine</strong></td><td><code>(Celsius + 273.15) × 9 ÷ 5</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 1 box and the page has everything it needs. It reports celsius, fahrenheit, kelvin and rankine.</p><ul><li><strong>Temperature in Kelvin</strong> — in K. The reading to convert, in Kelvin</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>In Celsius</strong> — in °C</li><li><strong>In Fahrenheit</strong> — in °F</li><li><strong>In Kelvin</strong> — in K</li><li><strong>In Rankine</strong> — in °R</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — Temperature in Kelvin = 20 K — and the results panel reads:</p><ul><li><strong>In Celsius</strong> = <code>Temperature in Kelvin - 273.15</code> = <strong>-253.15 °C</strong></li><li><strong>In Fahrenheit</strong> = <code>(Temperature in Kelvin - 273.15) × 9 ÷ 5 + 32</code> = <strong>-423.67 °F</strong></li><li><strong>In Kelvin</strong> = <code>Temperature in Kelvin</code> = <strong>20 K</strong></li><li><strong>In Rankine</strong> = <code>(Celsius + 273.15) × 9 ÷ 5</code> = <strong>36 °R</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Celsius, fahrenheit, kelvin and rankine should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Temperature in Kelvin = 5, the page reports <strong>celsius</strong> = -268.15, <strong>fahrenheit</strong> = -450.67, <strong>kelvin</strong> = 5, <strong>rankine</strong> = 9.</li><li>With Temperature in Kelvin = 80, the page reports <strong>celsius</strong> = -193.15, <strong>fahrenheit</strong> = -315.67, <strong>kelvin</strong> = 80, <strong>rankine</strong> = 144.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>In Celsius</strong></td><td><code>20 - 273.15</code></td><td><strong>-253.15</strong></td></tr><tr><td><strong>In Fahrenheit</strong></td><td><code>(20 - 273.15) × 9 ÷ 5 + 32</code></td><td><strong>-423.67</strong></td></tr><tr><td><strong>In Kelvin</strong></td><td><code>20</code></td><td><strong>20</strong></td></tr><tr><td><strong>In Rankine</strong></td><td><code>(-253.15 + 273.15) × 9 ÷ 5</code></td><td><strong>36</strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'The same conversion at other values',
                'html' => '<p>One row per reading, the input from a tenth of its opening value up to a thousand times it. The point of the table is the shape rather than the figures: a column that keeps its first digits as the input grows is a proportional relationship, and a column whose digits move sideways is one with an offset or a power in it.</p><table class="calc-table"><thead><tr><th>Temperature in Kelvin</th><th>celsius</th><th>fahrenheit</th><th>kelvin</th><th>rankine</th></tr></thead><tbody><tr><td>2 K</td><td>-271.15</td><td>-456.07</td><td>2</td><td>3.6</td></tr><tr><td>10 K</td><td>-263.15</td><td>-441.67</td><td>10</td><td>18</td></tr><tr><td>20 K</td><td>-253.15</td><td>-423.67</td><td>20</td><td>36</td></tr><tr><td>40 K</td><td>-233.15</td><td>-387.67</td><td>40</td><td>72</td></tr><tr><td>100 K</td><td>-173.15</td><td>-279.67</td><td>100</td><td>180</td></tr><tr><td>200 K</td><td>-73.15</td><td>-99.67</td><td>200</td><td>360</td></tr><tr><td>2 000 K</td><td>1 726.85</td><td>3 140.33</td><td>2 000</td><td>3 600</td></tr><tr><td>20 000 K</td><td>19 726.85</td><td>35 540.33</td><td>20 000</td><td>36 000</td></tr></tbody></table><p>Nothing in that table was computed by a different route from the panel. It is the same formula, run eight times, which is why a row you can check by hand is a check on the whole page.</p>',
            ],
            [
                'title' => 'Four scales, seven readings',
                'html' => '<p>The four scales are two decisions made twice: where zero sits, and how big a degree is. Celsius and Kelvin share a degree size and differ by an offset; Fahrenheit and Rankine share a degree size and differ by an offset; Celsius and Fahrenheit differ in both. That is why two of the four conversions are a subtraction and the other two are a multiplication.</p><table class="calc-table"><thead><tr><th>°C</th><th>°F</th><th>K</th><th>°R</th></tr></thead><tbody><tr><td>-40</td><td>-40</td><td>233.15</td><td>419.67</td></tr><tr><td>0</td><td>32</td><td>273.15</td><td>491.67</td></tr><tr><td>10</td><td>50</td><td>283.15</td><td>509.67</td></tr><tr><td>20</td><td>68</td><td>293.15</td><td>527.67</td></tr><tr><td>37</td><td>98.6</td><td>310.15</td><td>558.27</td></tr><tr><td>100</td><td>212</td><td>373.15</td><td>671.67</td></tr><tr><td>200</td><td>392</td><td>473.15</td><td>851.67</td></tr></tbody></table><p>Two rows are worth memorising. At −40 the Celsius and Fahrenheit readings meet, which is the only temperature where the two numbers are the same. At 0 °C water freezes and at 100 °C it boils at one atmosphere, which gives the two fixed points the Fahrenheit scale was later pegged to.</p><p>A conversion with an offset is not proportional, so doubling a temperature does not double the reading in another scale. 20 °C is 68 °F; 40 °C is 104 °F, not 136. Treat temperature as a position on a scale rather than as a quantity, and the arithmetic stops being surprising.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Doubling a temperature.</strong></strong> 20 °C doubled is 40 °C, not 40 °F or 68 °F; the scale has an offset and a ratio does not survive it.</li><li><strong><strong>Using °C where K belongs.</strong></strong> Gas laws and thermodynamic formulas need kelvin, and the answer is wrong by the ratio of the temperatures, not by the offset.</li><li><strong><strong>Rounding the offset.</strong></strong> 273.15 is not 273; the 0.15 K is 0.27 °F, which matters in a calibration.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: celsius (°C), fahrenheit (°F), kelvin (K), rankine (°R).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need temperature in Kelvin. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Celsius, fahrenheit, kelvin and rankine should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Temperature in Kelvin</strong> ×10</td><td>-253.15</td><td>-73.15</td><td>×0.288959</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
            ],
            [
                'title' => 'What the page does before it answers',
                'html' => '<p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box means a missing input rather than an error. Zero is accepted, but a formula that would divide by it reports no result instead of infinity. Precision is carried throughout and the three-decimal limit is applied only at the end.</p>',
            ],
            [
                'title' => 'Limits worth knowing',
                'html' => '<ul><li><strong><strong>Below absolute zero there is no reading.</strong></strong> The formula will produce a number, but a negative kelvin is not a temperature.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for.</li></ul>',
            ],
            [
                'title' => 'Where this calculation comes up',
                'html' => '<ul><li><strong><strong>Cooking and dosing.</strong></strong> A recipe written in cups, a label written in millilitres and a scale that reads grams are three units in one kitchen.</li><li><strong><strong>Trade and shipping.</strong></strong> Freight is priced by weight, volume or both, and the two systems meet on the same invoice.</li><li><strong><strong>Study and exams.</strong></strong> A worked example with the units written out is worth more than a memorised factor, because it can be rebuilt.</li><li><strong><strong>Estimating before you measure.</strong></strong> A rough conversion decides whether a job is small or large before anyone fetches a tape.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the Kelvin to Fahrenheit Converter work out?',
                'a' => 'It returns celsius, fahrenheit, kelvin and rankine from temperature in Kelvin. The relationship is Temperature in Kelvin - 273.15.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'Temperature in Kelvin (K). The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: temperature in Kelvin in K. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
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
