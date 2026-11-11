<?php

/**
 * Kilogram to Millilitre Converter
 * /conversion/kg-to-ml
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Kilogram to Millilitre Converter',
    'meta' => [
        'title' => 'Kilograms to Millilitres: Mass, Volume and Density',
        'description' => 'Convert kilograms to millilitres with the density as an input, because mass and volume only meet through it. Type the figure, the density, and read both sides.',
        'h1' => 'Kilogram to Millilitre Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'value',
                    'label' => 'In kilograms',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'kg',
                    'default' => '1',
                    'help' => 'The figure to convert, in kilograms',
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'kg/m³',
                    'default' => '1000',
                    'help' => 'Water is 1000, cooking oil about 920, honey about 1420',
                ],
                [
                    'name' => 'result',
                    'label' => 'Kilograms in millilitres',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'mL',
                ],
                [
                    'name' => 'litres',
                    'label' => 'The same quantity in litres',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'L',
                ],
                [
                    'name' => 'kilograms',
                    'label' => 'The same quantity in kilograms',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'kg',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Kilogram to Millilitre Converter',
            'results' => [
                'result' => 'value * 1 / density * 1000 / 0.001',
                'litres' => 'value * 1 / density * 1000',
                'kilograms' => 'value * 1',
            ],
        ],
    ],
    'article' => [
        'intro' => 'Mass and volume only meet through density, so this page takes the density as a box rather than assuming one. One kilogram of water is one litre; one kilogram of honey is about 0.7 litres.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>A mass is not a volume and no factor turns one into the other. What bridges them is density, the mass of a fixed volume of the stuff you actually have, so this page asks for it instead of assuming water.</p><p>The assumption is the dangerous part of every online converter that silently uses one gram per millilitre. It is right for water, close for milk, and wrong by a factor of two for flour that has been scooped rather than sieved. Making the density a visible input means the answer carries the assumption with it.</p><p>The page reports <strong>kilograms in millilitres, the same quantity in litres and the same quantity in kilograms</strong> from the boxes above it. The relationship is In kilograms × 1 ÷ Density × 1000 ÷ 0.001. Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Kilograms in millilitres</strong></td><td><code>In kilograms × 1 ÷ Density × 1000 ÷ 0.001</code></td></tr><tr><td><strong>The same quantity in litres</strong></td><td><code>In kilograms × 1 ÷ Density × 1000</code></td></tr><tr><td><strong>The same quantity in kilograms</strong></td><td><code>In kilograms × 1</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 2 boxes and the page has everything it needs. It reports kilograms in millilitres, the same quantity in litres and the same quantity in kilograms.</p><ul><li><strong>In kilograms</strong> — in kg. The figure to convert, in kilograms</li><li><strong>Density</strong> — in kg/m³. Water is 1000, cooking oil about 920, honey about 1420</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Kilograms in millilitres</strong> — in mL</li><li><strong>The same quantity in litres</strong> — in L</li><li><strong>The same quantity in kilograms</strong> — in kg</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — In kilograms = 1 kg, Density = 1 000 kg/m³ — and the results panel reads:</p><ul><li><strong>Kilograms in millilitres</strong> = <code>In kilograms × 1 ÷ Density × 1000 ÷ 0.001</code> = <strong>1 000 mL</strong></li><li><strong>The same quantity in litres</strong> = <code>In kilograms × 1 ÷ Density × 1000</code> = <strong>1 L</strong></li><li><strong>The same quantity in kilograms</strong> = <code>In kilograms × 1</code> = <strong>1 kg</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Kilograms in millilitres, the same quantity in litres and the same quantity in kilograms should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With In kilograms = 0.25, Density = 250, the page reports <strong>kilograms in millilitres</strong> = 1 000, <strong>the same quantity in litres</strong> = 1, <strong>the same quantity in kilograms</strong> = 0.25.</li><li>With In kilograms = 4, Density = 4 000, the page reports <strong>kilograms in millilitres</strong> = 1 000, <strong>the same quantity in litres</strong> = 1, <strong>the same quantity in kilograms</strong> = 4.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>Kilograms in millilitres</strong></td><td><code>1 × 1 ÷ 1 000 × 1000 ÷ 0.001</code></td><td><strong>1 000</strong></td></tr><tr><td><strong>The same quantity in litres</strong></td><td><code>1 × 1 ÷ 1 000 × 1000</code></td><td><strong>1</strong></td></tr><tr><td><strong>The same quantity in kilograms</strong></td><td><code>1 × 1</code></td><td><strong>1</strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'The same conversion at other values',
                'html' => '<p>One row per reading, the input from a tenth of its opening value up to a thousand times it. The point of the table is the shape rather than the figures: a column that keeps its first digits as the input grows is a proportional relationship, and a column whose digits move sideways is one with an offset or a power in it.</p><table class="calc-table"><thead><tr><th>In kilograms</th><th>kilograms in millilitres</th><th>the same quantity in litres</th><th>the same quantity in kilograms</th></tr></thead><tbody><tr><td>0.1 kg</td><td>100</td><td>0.1</td><td>0.1</td></tr><tr><td>0.5 kg</td><td>500</td><td>0.5</td><td>0.5</td></tr><tr><td>1 kg</td><td>1 000</td><td>1</td><td>1</td></tr><tr><td>2 kg</td><td>2 000</td><td>2</td><td>2</td></tr><tr><td>5 kg</td><td>5 000</td><td>5</td><td>5</td></tr><tr><td>10 kg</td><td>10 000</td><td>10</td><td>10</td></tr><tr><td>100 kg</td><td>100 000</td><td>100</td><td>100</td></tr><tr><td>1 000 kg</td><td>1 × 10<sup>6</sup></td><td>1 000</td><td>1 000</td></tr></tbody></table><p>Nothing in that table was computed by a different route from the panel. It is the same formula, run eight times, which is why a row you can check by hand is a check on the whole page.</p>',
            ],
            [
                'title' => 'The same volume at three densities',
                'html' => '<p>Density is the number that turns a volume into a mass, and it is not a constant: water is 1 000 kg/m³, cooking oil about 920, honey about 1 420, and a bag of flour sits near 590 because it is mostly air. The table below holds the volume fixed and moves the density, which is what changes between one substance and the next.</p><table class="calc-table"><thead><tr><th>Volume (L)</th><th>500 kg/m³</th><th>1 000 kg/m³</th><th>1 500 kg/m³</th></tr></thead><tbody><tr><td>1 litres</td><td>0.5</td><td>1</td><td>1.5</td></tr><tr><td>5 litres</td><td>2.5</td><td>5</td><td>7.5</td></tr><tr><td>10 litres</td><td>5</td><td>10</td><td>15</td></tr><tr><td>50 litres</td><td>25</td><td>50</td><td>75</td></tr><tr><td>100 litres</td><td>50</td><td>100</td><td>150</td></tr><tr><td>500 litres</td><td>250</td><td>500</td><td>750</td></tr><tr><td>1 000 litres</td><td>500</td><td>1 000</td><td>1 500</td></tr></tbody></table><p>Read it across for one substance at three volumes, or down for three substances at one volume. The second column is the water line: a litre of water is a kilogram, and that coincidence is why the two systems feel interchangeable in a kitchen and are not.</p><p>Where the density comes from matters more than the arithmetic. A figure taken from a table is a room-temperature figure for a pure substance; what you are measuring may be colder, wetter, packed differently or simply a different material with the same name. If the answer matters, weigh a known volume and use that density rather than a textbook one.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Using a textbook density for a real substance.</strong></strong> Flour, sugar and sand all change density with how they are packed.</li><li><strong><strong>Confusing kg/m³ with g/cm³.</strong></strong> Water is 1 000 kg/m³ and 1 g/cm³ at the same time; entering 1 where 1000 belongs gives an answer a thousand times out.</li><li><strong><strong>Forgetting that temperature moves density.</strong></strong> Water gains about one per cent between 20 °C and 4 °C, which is small until the quantity is large.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: kilograms in millilitres (mL), the same quantity in litres (L), the same quantity in kilograms (kg).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need in kilograms and density. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Kilograms in millilitres, the same quantity in litres and the same quantity in kilograms should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>In kilograms</strong> ×10</td><td>1 000</td><td>10 000</td><td>ten times larger</td></tr><tr><td><strong>Density</strong> ×10</td><td>1 000</td><td>100</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
            ],
            [
                'title' => 'What the page does before it answers',
                'html' => '<p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box means a missing input rather than an error. Zero is accepted, but a formula that would divide by it reports no result instead of infinity. Precision is carried throughout and the three-decimal limit is applied only at the end.</p>',
            ],
            [
                'title' => 'Limits worth knowing',
                'html' => '<ul><li><strong><strong>One substance, one density.</strong></strong> A mixture does not have a single density unless it is well mixed.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for.</li></ul>',
            ],
            [
                'title' => 'Where this calculation comes up',
                'html' => '<ul><li><strong><strong>Cooking and dosing.</strong></strong> A recipe written in cups, a label written in millilitres and a scale that reads grams are three units in one kitchen.</li><li><strong><strong>Trade and shipping.</strong></strong> Freight is priced by weight, volume or both, and the two systems meet on the same invoice.</li><li><strong><strong>Study and exams.</strong></strong> A worked example with the units written out is worth more than a memorised factor, because it can be rebuilt.</li><li><strong><strong>Estimating before you measure.</strong></strong> A rough conversion decides whether a job is small or large before anyone fetches a tape.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the Kilogram to Millilitre Converter work out?',
                'a' => 'It returns kilograms in millilitres, the same quantity in litres and the same quantity in kilograms from in kilograms and density. The relationship is In kilograms × 1 ÷ Density × 1000 ÷ 0.001.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'In kilograms (kg), Density (kg/m³). The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: in kilograms in kg; density in kg/m³. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
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
