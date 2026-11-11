<?php

/**
 * Energy Converter
 * /conversion/energy-conversion
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Energy Converter',
    'meta' => [
        'title' => 'Energy Converter — Convert Joules into 9 Units',
        'description' => 'Type one figure in joules and read it in 9 units of energy, with the factor for each written out. Both directions are on the page, with the factor written out.',
        'h1' => 'Energy Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'value',
                    'label' => 'In joules',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'J',
                    'default' => '1',
                    'help' => 'The figure to convert, in joules',
                ],
                [
                    'name' => 'kj',
                    'label' => 'In kilojoules',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'kJ',
                ],
                [
                    'name' => 'cal',
                    'label' => 'In calories',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'cal',
                ],
                [
                    'name' => 'kcal',
                    'label' => 'In kilocalories',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'kcal',
                ],
                [
                    'name' => 'wh',
                    'label' => 'In watt-hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'Wh',
                ],
                [
                    'name' => 'kwh',
                    'label' => 'In kilowatt-hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'kWh',
                ],
                [
                    'name' => 'btu',
                    'label' => 'In British thermal units',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'BTU',
                ],
                [
                    'name' => 'therm',
                    'label' => 'In therms',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'thm',
                ],
                [
                    'name' => 'ftlb',
                    'label' => 'In foot-pounds',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'ft·lb',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Energy Converter',
            'results' => [
                'kj' => 'value * 0.001',
                'cal' => 'value * 0.239005736137667',
                'kcal' => 'value * 0.000239005736137667',
                'wh' => 'value * 0.000277777777777778',
                'kwh' => 'value * 2.77777777777778e-07',
                'btu' => 'value * 0.000947817120313317',
                'therm' => 'value * 9.48043427973349e-09',
                'ftlb' => 'value * 0.737562149277265',
            ],
        ],
    ],
    'article' => [
        'intro' => 'One figure in joules, read out in every unit of energy that the page carries.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>Most conversions are asked one at a time: how many of these in one of those. That is fine until you are looking at a specification sheet in one unit, a form asking for another, and a tape measure reading a third. This page shows the figure in 9 units at once so the one you need is already on screen.</p><p>Every reading comes from the same input and the same base unit, so the columns cannot disagree with each other. What they can do is make a mismatch obvious: a figure that looks plausible in one unit and absurd in another is usually a figure typed in the wrong one.</p><p>The page reports <strong>kilojoules, calories, kilocalories, watt-hours, kilowatt-hours, british thermal units, therms and foot-pounds</strong> from the boxes above it. The relationship is In joules × 0.001. Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>kilojoules</strong></td><td><code>In joules × 0.001</code></td></tr><tr><td><strong>calories</strong></td><td><code>In joules × 0.239005736137667</code></td></tr><tr><td><strong>kilocalories</strong></td><td><code>In joules × 0.000239005736137667</code></td></tr><tr><td><strong>watt-hours</strong></td><td><code>In joules × 0.000277777777777778</code></td></tr><tr><td><strong>kilowatt-hours</strong></td><td><code>In joules × 2.77777777777778e-07</code></td></tr><tr><td><strong>British thermal units</strong></td><td><code>In joules × 0.000947817120313317</code></td></tr><tr><td><strong>therms</strong></td><td><code>In joules × 9.48043427973349e-09</code></td></tr><tr><td><strong>foot-pounds</strong></td><td><code>In joules × 0.737562149277265</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 1 box and the page has everything it needs. It reports kilojoules, calories, kilocalories, watt-hours, kilowatt-hours, british thermal units, therms and foot-pounds.</p><ul><li><strong>In joules</strong> — in J. The figure to convert, in joules</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>In kilojoules</strong> — in kJ</li><li><strong>In calories</strong> — in cal</li><li><strong>In kilocalories</strong> — in kcal</li><li><strong>In watt-hours</strong> — in Wh</li><li><strong>In kilowatt-hours</strong> — in kWh</li><li><strong>In British thermal units</strong> — in BTU</li><li><strong>In therms</strong> — in thm</li><li><strong>In foot-pounds</strong> — in ft·lb</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — In joules = 1 J — and the results panel reads:</p><ul><li><strong>In kilojoules</strong> = <code>In joules × 0.001</code> = <strong>0.001 kJ</strong></li><li><strong>In calories</strong> = <code>In joules × 0.239005736137667</code> = <strong>0.239 cal</strong></li><li><strong>In kilocalories</strong> = <code>In joules × 0.000239005736137667</code> = <strong>0.000239 kcal</strong></li><li><strong>In watt-hours</strong> = <code>In joules × 0.000277777777777778</code> = <strong>0.0002778 Wh</strong></li><li><strong>In kilowatt-hours</strong> = <code>In joules × 2.77777777777778e-07</code> = <strong>2.778 × 10<sup>-7</sup> kWh</strong></li><li><strong>In British thermal units</strong> = <code>In joules × 0.000947817120313317</code> = <strong>0.0009478 BTU</strong></li><li><strong>In therms</strong> = <code>In joules × 9.48043427973349e-09</code> = <strong>9.48 × 10<sup>-9</sup> thm</strong></li><li><strong>In foot-pounds</strong> = <code>In joules × 0.737562149277265</code> = <strong>0.738 ft·lb</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Kilojoules, calories, kilocalories, watt-hours, kilowatt-hours, british thermal units, therms and foot-pounds should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With In joules = 0.25, the page reports <strong>kilojoules</strong> = 0.00025, <strong>calories</strong> = 0.06, <strong>kilocalories</strong> = 5.975 × 10<sup>-5</sup>, <strong>watt-hours</strong> = 6.944 × 10<sup>-5</sup>, <strong>kilowatt-hours</strong> = 6.944 × 10<sup>-8</sup>, <strong>british thermal units</strong> = 0.000237, <strong>therms</strong> = 2.37 × 10<sup>-9</sup>, <strong>foot-pounds</strong> = 0.184.</li><li>With In joules = 4, the page reports <strong>kilojoules</strong> = 0.004, <strong>calories</strong> = 0.956, <strong>kilocalories</strong> = 0.000956, <strong>watt-hours</strong> = 0.001, <strong>kilowatt-hours</strong> = 1.111 × 10<sup>-6</sup>, <strong>british thermal units</strong> = 0.004, <strong>therms</strong> = 3.792 × 10<sup>-8</sup>, <strong>foot-pounds</strong> = 2.95.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>In kilojoules</strong></td><td><code>1 × 0.001</code></td><td><strong>0.001</strong></td></tr><tr><td><strong>In calories</strong></td><td><code>1 × 0.239005736137667</code></td><td><strong>0.239</strong></td></tr><tr><td><strong>In kilocalories</strong></td><td><code>1 × 0.000239005736137667</code></td><td><strong>0.000239</strong></td></tr><tr><td><strong>In watt-hours</strong></td><td><code>1 × 0.000277777777777778</code></td><td><strong>0.0002778</strong></td></tr><tr><td><strong>In kilowatt-hours</strong></td><td><code>1 × 2.77777777777778e-07</code></td><td><strong>2.778 × 10<sup>-7</sup></strong></td></tr><tr><td><strong>In British thermal units</strong></td><td><code>1 × 0.000947817120313317</code></td><td><strong>0.0009478</strong></td></tr><tr><td><strong>In therms</strong></td><td><code>1 × 9.48043427973349e-09</code></td><td><strong>9.48 × 10<sup>-9</sup></strong></td></tr><tr><td><strong>In foot-pounds</strong></td><td><code>1 × 0.737562149277265</code></td><td><strong>0.738</strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>At these values the results span 7.77984e+07 times from smallest to largest, which is the sort of page where a misplaced decimal point survives a glance and only the unit gives it away.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'The same conversion at other values',
                'html' => '<p>One row per reading, the input from a tenth of its opening value up to a thousand times it. The point of the table is the shape rather than the figures: a column that keeps its first digits as the input grows is a proportional relationship, and a column whose digits move sideways is one with an offset or a power in it.</p><table class="calc-table"><thead><tr><th>In joules</th><th>kilojoules</th><th>calories</th><th>kilocalories</th><th>watt-hours</th><th>kilowatt-hours</th><th>british thermal units</th><th>therms</th><th>foot-pounds</th></tr></thead><tbody><tr><td>0.1 J</td><td>0.0001</td><td>0.024</td><td>2.39 × 10<sup>-5</sup></td><td>2.778 × 10<sup>-5</sup></td><td>2.778 × 10<sup>-8</sup></td><td>9.478 × 10<sup>-5</sup></td><td>9.48 × 10<sup>-10</sup></td><td>0.074</td></tr><tr><td>0.5 J</td><td>0.0005</td><td>0.12</td><td>0.0001195</td><td>0.0001389</td><td>1.389 × 10<sup>-7</sup></td><td>0.0004739</td><td>4.74 × 10<sup>-9</sup></td><td>0.369</td></tr><tr><td>1 J</td><td>0.001</td><td>0.239</td><td>0.000239</td><td>0.0002778</td><td>2.778 × 10<sup>-7</sup></td><td>0.0009478</td><td>9.48 × 10<sup>-9</sup></td><td>0.738</td></tr><tr><td>2 J</td><td>0.002</td><td>0.478</td><td>0.000478</td><td>0.0005556</td><td>5.556 × 10<sup>-7</sup></td><td>0.002</td><td>1.896 × 10<sup>-8</sup></td><td>1.475</td></tr><tr><td>5 J</td><td>0.005</td><td>1.195</td><td>0.001</td><td>0.001</td><td>1.389 × 10<sup>-6</sup></td><td>0.005</td><td>4.74 × 10<sup>-8</sup></td><td>3.688</td></tr><tr><td>10 J</td><td>0.01</td><td>2.39</td><td>0.002</td><td>0.003</td><td>2.778 × 10<sup>-6</sup></td><td>0.009</td><td>9.48 × 10<sup>-8</sup></td><td>7.376</td></tr><tr><td>100 J</td><td>0.1</td><td>23.901</td><td>0.024</td><td>0.028</td><td>2.778 × 10<sup>-5</sup></td><td>0.095</td><td>9.48 × 10<sup>-7</sup></td><td>73.756</td></tr><tr><td>1 000 J</td><td>1</td><td>239.006</td><td>0.239</td><td>0.278</td><td>0.0002778</td><td>0.948</td><td>9.48 × 10<sup>-6</sup></td><td>737.562</td></tr></tbody></table><p>Nothing in that table was computed by a different route from the panel. It is the same formula, run eight times, which is why a row you can check by hand is a check on the whole page.</p>',
            ],
            [
                'title' => 'Four units, seven values',
                'html' => '<p>Four of the 9 units, at the values a person types. Each column is the same figure multiplied by one factor, so a row that looks wrong next to its neighbours is a factor typed wrongly rather than a formula that changes shape.</p><table class="calc-table"><thead><tr><th>Joules</th><th>Kilojoules</th><th>Calories</th><th>Kilocalories</th><th>Watt-hours</th></tr></thead><tbody><tr><td>1 J</td><td>0.001</td><td>0.239</td><td>0.000239</td><td>0.0002778</td></tr><tr><td>2 J</td><td>0.002</td><td>0.478</td><td>0.000478</td><td>0.0005556</td></tr><tr><td>5 J</td><td>0.005</td><td>1.195</td><td>0.001</td><td>0.001</td></tr><tr><td>10 J</td><td>0.01</td><td>2.39</td><td>0.002</td><td>0.003</td></tr><tr><td>25 J</td><td>0.025</td><td>5.975</td><td>0.006</td><td>0.007</td></tr><tr><td>50 J</td><td>0.05</td><td>11.95</td><td>0.012</td><td>0.014</td></tr><tr><td>100 J</td><td>0.1</td><td>23.901</td><td>0.024</td><td>0.028</td></tr></tbody></table><p>The panel reports 9 readings from the single box because the units share one dimension: they are all measures of energy, and the page holds every conversion factor between them. Nothing is rounded before the last step, so the figures in the table and the figures in the panel agree to the digit shown.</p><p>Converting between two of the columns directly means dividing their factors, and any route through this page gives the same answer as the direct route. That is worth testing once with a pair you know: a kilometre in metres, a kilogram in grams, an hour in seconds.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Picking the column by habit.</strong></strong> The unit you always use is not always the unit the other person meant.</li><li><strong><strong>Copying a rounded column.</strong></strong> The panel rounds for display; the table rounds the same way, so neither is a source of extra precision.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: kilojoules (kJ), calories (cal), kilocalories (kcal), watt-hours (Wh), kilowatt-hours (kWh), british thermal units (BTU), therms (thm), foot-pounds (ft·lb).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need in joules. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Kilojoules, calories, kilocalories, watt-hours, kilowatt-hours, british thermal units, therms and foot-pounds should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>In joules</strong> ×10</td><td>0.001</td><td>0.01</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
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
                'html' => '<ul><li><strong><strong>Specification sheets.</strong></strong> A part listed in one system and a drawing dimensioned in another.</li><li><strong><strong>Reports for two audiences.</strong></strong> The same quantity in the unit each reader expects, from one entry.</li><li><strong><strong>Sanity checks.</strong></strong> A figure that is reasonable in joules and impossible in another unit is a typing error.</li><li><strong><strong>Teaching the dimension.</strong></strong> Seeing all the units of energy together makes the size of each one concrete.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the Energy Converter work out?',
                'a' => 'It returns kilojoules, calories, kilocalories, watt-hours, kilowatt-hours, british thermal units, therms and foot-pounds from in joules. The relationship is In joules × 0.001.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'In joules (J). The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: in joules in J. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
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
