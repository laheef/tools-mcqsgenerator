<?php

/**
 * Joules to Volts Converter
 * /conversion/joules-to-volts
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Joules to Volts Converter',
    'meta' => [
        'title' => 'Joules to Volts Converter with the Working Shown',
        'description' => 'A capacitor stores energy as charge held apart at a voltage. Given the energy and the capacitance, the voltage is the square root of twice the energy over the.',
        'h1' => 'Joules to Volts Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'energy',
                    'label' => 'Energy stored',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'J',
                    'default' => '1',
                ],
                [
                    'name' => 'capacitance',
                    'label' => 'Capacitance',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'F',
                    'default' => '0.001',
                    'help' => '1 000 µF is 0.001 F',
                ],
                [
                    'name' => 'volts',
                    'label' => 'Voltage',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'V',
                ],
                [
                    'name' => 'charge',
                    'label' => 'Charge on the plates',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'C',
                ],
                [
                    'name' => 'microfarad',
                    'label' => 'The capacitance in microfarads',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'µF',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Joules to Volts Converter',
            'results' => [
                'volts' => 'sqrt(2 * energy / capacitance)',
                'charge' => 'capacitance * sqrt(2 * energy / capacitance)',
                'microfarad' => 'capacitance * 1000000',
            ],
        ],
    ],
    'article' => [
        'intro' => 'A capacitor stores energy as charge held apart at a voltage. Given the energy and the capacitance, the voltage is the square root of twice the energy over the capacitance.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>Energy in a capacitor is half the capacitance times the square of the voltage. Turned round, the voltage is the square root of twice the energy divided by the capacitance, which is why the answer grows with the square root: four times the energy is only twice the voltage.</p><p>The page reports <strong>voltage, charge on the plates and the capacitance in microfarads</strong> from the boxes above it. The relationship is sqrt(2 × Energy stored ÷ Capacitance). Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Voltage</strong></td><td><code>sqrt(2 × Energy stored ÷ Capacitance)</code></td></tr><tr><td><strong>Charge on the plates</strong></td><td><code>Capacitance × sqrt(2 × Energy stored ÷ Capacitance)</code></td></tr><tr><td><strong>The capacitance in microfarads</strong></td><td><code>Capacitance × 1000000</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 2 boxes and the page has everything it needs. It reports voltage, charge on the plates and the capacitance in microfarads.</p><ul><li><strong>Energy stored</strong> — in J.</li><li><strong>Capacitance</strong> — in F. 1 000 µF is 0.001 F</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Voltage</strong> — in V</li><li><strong>Charge on the plates</strong> — in C</li><li><strong>The capacitance in microfarads</strong> — in µF</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — Energy stored = 1 J, Capacitance = 0.001 F — and the results panel reads:</p><ul><li><strong>Voltage</strong> = <code>sqrt(2 × Energy stored ÷ Capacitance)</code> = <strong>44.721 V</strong></li><li><strong>Charge on the plates</strong> = <code>Capacitance × sqrt(2 × Energy stored ÷ Capacitance)</code> = <strong>0.045 C</strong></li><li><strong>The capacitance in microfarads</strong> = <code>Capacitance × 1000000</code> = <strong>1 000 µF</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Voltage, charge on the plates and the capacitance in microfarads should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Energy stored = 0.25, Capacitance = 0.00025, the page reports <strong>voltage</strong> = 44.721, <strong>charge on the plates</strong> = 0.011, <strong>the capacitance in microfarads</strong> = 250.</li><li>With Energy stored = 4, Capacitance = 0.004, the page reports <strong>voltage</strong> = 44.721, <strong>charge on the plates</strong> = 0.179, <strong>the capacitance in microfarads</strong> = 4 000.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>Voltage</strong></td><td><code>sqrt(2 × 1 ÷ 0.001)</code></td><td><strong>44.721</strong></td></tr><tr><td><strong>Charge on the plates</strong></td><td><code>0.001 × sqrt(2 × 1 ÷ 0.001)</code></td><td><strong>0.045</strong></td></tr><tr><td><strong>The capacitance in microfarads</strong></td><td><code>0.001 × 1000000</code></td><td><strong>1 000</strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>At these values the results span 22360.679775 times from smallest to largest, which is the sort of page where a misplaced decimal point survives a glance and only the unit gives it away.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'The same conversion at other values',
                'html' => '<p>One row per reading, the input from a tenth of its opening value up to a thousand times it. The point of the table is the shape rather than the figures: a column that keeps its first digits as the input grows is a proportional relationship, and a column whose digits move sideways is one with an offset or a power in it.</p><table class="calc-table"><thead><tr><th>Energy stored</th><th>voltage</th><th>charge on the plates</th><th>the capacitance in microfarads</th></tr></thead><tbody><tr><td>0.1 J</td><td>14.142</td><td>0.014</td><td>1 000</td></tr><tr><td>0.5 J</td><td>31.623</td><td>0.032</td><td>1 000</td></tr><tr><td>1 J</td><td>44.721</td><td>0.045</td><td>1 000</td></tr><tr><td>2 J</td><td>63.246</td><td>0.063</td><td>1 000</td></tr><tr><td>5 J</td><td>100</td><td>0.1</td><td>1 000</td></tr><tr><td>10 J</td><td>141.421</td><td>0.141</td><td>1 000</td></tr><tr><td>100 J</td><td>447.214</td><td>0.447</td><td>1 000</td></tr><tr><td>1 000 J</td><td>1 414.214</td><td>1.414</td><td>1 000</td></tr></tbody></table><p>Nothing in that table was computed by a different route from the panel. It is the same formula, run eight times, which is why a row you can check by hand is a check on the whole page.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Converting twice.</strong></strong> A figure already in feet converted to metres and then to feet again comes back wrong, and nothing in the display says so.</li><li><strong><strong>Using a rounded factor and a rounded answer.</strong></strong> Each rounding is small; the product of several is not. Keep precision in the middle and round only at the end.</li><li><strong><strong>Assuming both sides use the same word the same way.</strong></strong> A US gallon, an imperial gallon, a dry gallon and a metric gallon are four different volumes sharing one name.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: voltage (V), charge on the plates (C), the capacitance in microfarads (µF).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need energy stored and capacitance. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Voltage, charge on the plates and the capacitance in microfarads should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Energy stored</strong> ×10</td><td>44.721</td><td>141.421</td><td>×3.162278</td></tr><tr><td><strong>Capacitance</strong> ×10</td><td>44.721</td><td>14.142</td><td>×0.316228</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
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
                'html' => '<ul><li><strong><strong>Cooking and dosing.</strong></strong> A recipe written in cups, a label written in millilitres and a scale that reads grams are three units in one kitchen.</li><li><strong><strong>Trade and shipping.</strong></strong> Freight is priced by weight, volume or both, and the two systems meet on the same invoice.</li><li><strong><strong>Study and exams.</strong></strong> A worked example with the units written out is worth more than a memorised factor, because it can be rebuilt.</li><li><strong><strong>Estimating before you measure.</strong></strong> A rough conversion decides whether a job is small or large before anyone fetches a tape.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the Joules to Volts Converter work out?',
                'a' => 'It returns voltage, charge on the plates and the capacitance in microfarads from energy stored and capacitance. The relationship is sqrt(2 × Energy stored ÷ Capacitance).',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'Energy stored (J), Capacitance (F). The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: energy stored in J; capacitance in F. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
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
