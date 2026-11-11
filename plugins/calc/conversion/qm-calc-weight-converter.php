<?php

/**
 * Weight Converter
 * /conversion/weight-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Weight Converter',
    'meta' => [
        'title' => 'Weight Converter — Convert Kilograms into 9 Units',
        'description' => 'Type one figure in kilograms and read it in 9 units of weight, with the factor for each written out. Both ways. Nothing is rounded before the last step.',
        'h1' => 'Weight Converter',
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
                    'name' => 'g',
                    'label' => 'In grams',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'g',
                ],
                [
                    'name' => 'mg',
                    'label' => 'In milligrams',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'mg',
                ],
                [
                    'name' => 'ounce',
                    'label' => 'In ounces',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'oz',
                ],
                [
                    'name' => 'pound',
                    'label' => 'In pounds',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'stone',
                    'label' => 'In stone',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'st',
                ],
                [
                    'name' => 'tonne',
                    'label' => 'In tonnes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 't',
                ],
                [
                    'name' => 'ton',
                    'label' => 'In short tons',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'tn',
                ],
                [
                    'name' => 'slug',
                    'label' => 'In slugs',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'slug',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Weight Converter',
            'results' => [
                'g' => 'value * 1000',
                'mg' => 'value * 1000000',
                'ounce' => 'value * 35.273962',
                'pound' => 'value * 2.204623',
                'stone' => 'value * 0.157473',
                'tonne' => 'value * 0.001',
                'ton' => 'value * 0.00110231',
                'slug' => 'value * 0.0685218',
            ],
        ],
    ],
    'article' => [
        'intro' => 'One figure in kilograms, read out in every unit of weight that the page carries.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>Most conversions are asked one at a time: how many of these in one of those. That is fine until you are looking at a specification sheet in one unit, a form asking for another, and a tape measure reading a third. This page shows the figure in 9 units at once so the one you need is already on screen.</p><p>Every reading comes from the same input and the same base unit, so the columns cannot disagree with each other. What they can do is make a mismatch obvious: a figure that looks plausible in one unit and absurd in another is usually a figure typed in the wrong one.</p><p>The page reports <strong>grams, milligrams, ounces, pounds, stone, tonnes, short tons and slugs</strong> from the boxes above it. The relationship is In kilograms × 1000. Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>grams</strong></td><td><code>In kilograms × 1000</code></td></tr><tr><td><strong>milligrams</strong></td><td><code>In kilograms × 1000000</code></td></tr><tr><td><strong>ounces</strong></td><td><code>In kilograms × 35.273962</code></td></tr><tr><td><strong>pounds</strong></td><td><code>In kilograms × 2.204623</code></td></tr><tr><td><strong>stone</strong></td><td><code>In kilograms × 0.157473</code></td></tr><tr><td><strong>tonnes</strong></td><td><code>In kilograms × 0.001</code></td></tr><tr><td><strong>short tons</strong></td><td><code>In kilograms × 0.00110231</code></td></tr><tr><td><strong>slugs</strong></td><td><code>In kilograms × 0.0685218</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 1 box and the page has everything it needs. It reports grams, milligrams, ounces, pounds, stone, tonnes, short tons and slugs.</p><ul><li><strong>In kilograms</strong> — in kg. The figure to convert, in kilograms</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>In grams</strong> — in g</li><li><strong>In milligrams</strong> — in mg</li><li><strong>In ounces</strong> — in oz</li><li><strong>In pounds</strong> — in lb</li><li><strong>In stone</strong> — in st</li><li><strong>In tonnes</strong> — in t</li><li><strong>In short tons</strong> — in tn</li><li><strong>In slugs</strong> — in slug</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — In kilograms = 1 kg — and the results panel reads:</p><ul><li><strong>In grams</strong> = <code>In kilograms × 1000</code> = <strong>1 000 g</strong></li><li><strong>In milligrams</strong> = <code>In kilograms × 1000000</code> = <strong>1 × 10<sup>6</sup> mg</strong></li><li><strong>In ounces</strong> = <code>In kilograms × 35.273962</code> = <strong>35.274 oz</strong></li><li><strong>In pounds</strong> = <code>In kilograms × 2.204623</code> = <strong>2.205 lb</strong></li><li><strong>In stone</strong> = <code>In kilograms × 0.157473</code> = <strong>0.157 st</strong></li><li><strong>In tonnes</strong> = <code>In kilograms × 0.001</code> = <strong>0.001 t</strong></li><li><strong>In short tons</strong> = <code>In kilograms × 0.00110231</code> = <strong>0.001 tn</strong></li><li><strong>In slugs</strong> = <code>In kilograms × 0.0685218</code> = <strong>0.069 slug</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Grams, milligrams, ounces, pounds, stone, tonnes, short tons and slugs should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With In kilograms = 0.25, the page reports <strong>grams</strong> = 250, <strong>milligrams</strong> = 250 000, <strong>ounces</strong> = 8.818, <strong>pounds</strong> = 0.551, <strong>stone</strong> = 0.039, <strong>tonnes</strong> = 0.00025, <strong>short tons</strong> = 0.0002756, <strong>slugs</strong> = 0.017.</li><li>With In kilograms = 4, the page reports <strong>grams</strong> = 4 000, <strong>milligrams</strong> = 4 × 10<sup>6</sup>, <strong>ounces</strong> = 141.096, <strong>pounds</strong> = 8.818, <strong>stone</strong> = 0.63, <strong>tonnes</strong> = 0.004, <strong>short tons</strong> = 0.004, <strong>slugs</strong> = 0.274.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>In grams</strong></td><td><code>1 × 1000</code></td><td><strong>1 000</strong></td></tr><tr><td><strong>In milligrams</strong></td><td><code>1 × 1000000</code></td><td><strong>1 × 10<sup>6</sup></strong></td></tr><tr><td><strong>In ounces</strong></td><td><code>1 × 35.273962</code></td><td><strong>35.274</strong></td></tr><tr><td><strong>In pounds</strong></td><td><code>1 × 2.204623</code></td><td><strong>2.205</strong></td></tr><tr><td><strong>In stone</strong></td><td><code>1 × 0.157473</code></td><td><strong>0.157</strong></td></tr><tr><td><strong>In tonnes</strong></td><td><code>1 × 0.001</code></td><td><strong>0.001</strong></td></tr><tr><td><strong>In short tons</strong></td><td><code>1 × 0.00110231</code></td><td><strong>0.001</strong></td></tr><tr><td><strong>In slugs</strong></td><td><code>1 × 0.0685218</code></td><td><strong>0.069</strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>At these values the results span 1 000 000 000 times from smallest to largest, which is the sort of page where a misplaced decimal point survives a glance and only the unit gives it away.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'The same conversion at other values',
                'html' => '<p>One row per reading, the input from a tenth of its opening value up to a thousand times it. The point of the table is the shape rather than the figures: a column that keeps its first digits as the input grows is a proportional relationship, and a column whose digits move sideways is one with an offset or a power in it.</p><table class="calc-table"><thead><tr><th>In kilograms</th><th>grams</th><th>milligrams</th><th>ounces</th><th>pounds</th><th>stone</th><th>tonnes</th><th>short tons</th><th>slugs</th></tr></thead><tbody><tr><td>0.1 kg</td><td>100</td><td>100 000</td><td>3.527</td><td>0.22</td><td>0.016</td><td>0.0001</td><td>0.0001102</td><td>0.007</td></tr><tr><td>0.5 kg</td><td>500</td><td>500 000</td><td>17.637</td><td>1.102</td><td>0.079</td><td>0.0005</td><td>0.0005512</td><td>0.034</td></tr><tr><td>1 kg</td><td>1 000</td><td>1 × 10<sup>6</sup></td><td>35.274</td><td>2.205</td><td>0.157</td><td>0.001</td><td>0.001</td><td>0.069</td></tr><tr><td>2 kg</td><td>2 000</td><td>2 × 10<sup>6</sup></td><td>70.548</td><td>4.409</td><td>0.315</td><td>0.002</td><td>0.002</td><td>0.137</td></tr><tr><td>5 kg</td><td>5 000</td><td>5 × 10<sup>6</sup></td><td>176.37</td><td>11.023</td><td>0.787</td><td>0.005</td><td>0.006</td><td>0.343</td></tr><tr><td>10 kg</td><td>10 000</td><td>1 × 10<sup>7</sup></td><td>352.74</td><td>22.046</td><td>1.575</td><td>0.01</td><td>0.011</td><td>0.685</td></tr><tr><td>100 kg</td><td>100 000</td><td>1 × 10<sup>8</sup></td><td>3 527.396</td><td>220.462</td><td>15.747</td><td>0.1</td><td>0.11</td><td>6.852</td></tr><tr><td>1 000 kg</td><td>1 × 10<sup>6</sup></td><td>1 × 10<sup>9</sup></td><td>35 273.962</td><td>2 204.623</td><td>157.473</td><td>1</td><td>1.102</td><td>68.522</td></tr></tbody></table><p>Nothing in that table was computed by a different route from the panel. It is the same formula, run eight times, which is why a row you can check by hand is a check on the whole page.</p>',
            ],
            [
                'title' => 'Four units, seven values',
                'html' => '<p>Four of the 9 units, at the values a person types. Each column is the same figure multiplied by one factor, so a row that looks wrong next to its neighbours is a factor typed wrongly rather than a formula that changes shape.</p><table class="calc-table"><thead><tr><th>Kilograms</th><th>Grams</th><th>Milligrams</th><th>Ounces</th><th>Pounds</th></tr></thead><tbody><tr><td>1 kg</td><td>1 000</td><td>1 000 000</td><td>35.273962</td><td>2.204623</td></tr><tr><td>2 kg</td><td>2 000</td><td>2 000 000</td><td>70.547924</td><td>4.409245</td></tr><tr><td>5 kg</td><td>5 000</td><td>5 000 000</td><td>176.36981</td><td>11.023113</td></tr><tr><td>10 kg</td><td>10 000</td><td>10 000 000</td><td>352.739619</td><td>22.046226</td></tr><tr><td>25 kg</td><td>25 000</td><td>25 000 000</td><td>881.849049</td><td>55.115566</td></tr><tr><td>50 kg</td><td>50 000</td><td>50 000 000</td><td>1763.698097</td><td>110.231131</td></tr><tr><td>100 kg</td><td>100 000</td><td>100 000 000</td><td>3527.396195</td><td>220.462262</td></tr></tbody></table><p>The panel reports 9 readings from the single box because the units share one dimension: they are all measures of weight, and the page holds every conversion factor between them. Nothing is rounded before the last step, so the figures in the table and the figures in the panel agree to the digit shown.</p><p>Converting between two of the columns directly means dividing their factors, and any route through this page gives the same answer as the direct route. That is worth testing once with a pair you know: a kilometre in metres, a kilogram in grams, an hour in seconds.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Picking the column by habit.</strong></strong> The unit you always use is not always the unit the other person meant.</li><li><strong><strong>Copying a rounded column.</strong></strong> The panel rounds for display; the table rounds the same way, so neither is a source of extra precision.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: grams (g), milligrams (mg), ounces (oz), pounds (lb), stone (st), tonnes (t), short tons (tn), slugs (slug).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need in kilograms. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Grams, milligrams, ounces, pounds, stone, tonnes, short tons and slugs should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>In kilograms</strong> ×10</td><td>1 000</td><td>10 000</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
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
                'html' => '<ul><li><strong><strong>Specification sheets.</strong></strong> A part listed in one system and a drawing dimensioned in another.</li><li><strong><strong>Reports for two audiences.</strong></strong> The same quantity in the unit each reader expects, from one entry.</li><li><strong><strong>Sanity checks.</strong></strong> A figure that is reasonable in kilograms and impossible in another unit is a typing error.</li><li><strong><strong>Teaching the dimension.</strong></strong> Seeing all the units of weight together makes the size of each one concrete.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the Weight Converter work out?',
                'a' => 'It returns grams, milligrams, ounces, pounds, stone, tonnes, short tons and slugs from in kilograms. The relationship is In kilograms × 1000.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'In kilograms (kg). The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: in kilograms in kg. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
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
