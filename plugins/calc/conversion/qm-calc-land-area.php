<?php

/**
 * Land Area Converter
 * /conversion/land-area
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Land Area Converter',
    'meta' => [
        'title' => 'Land Area Converter — Every Unit on One Page',
        'description' => 'Type one figure in acres and read it in 9 units of area, with the factor for each written out. Both directions are on the page, with the factor written out.',
        'h1' => 'Land Area Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'value',
                    'label' => 'In acres',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'ac',
                    'default' => '1',
                    'help' => 'The figure to convert, in acres',
                ],
                [
                    'name' => 'm2',
                    'label' => 'In square metres',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'm²',
                ],
                [
                    'name' => 'square-foot',
                    'label' => 'In square feet',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'square-yard',
                    'label' => 'In square yards',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'yd²',
                ],
                [
                    'name' => 'km2',
                    'label' => 'In square kilometres',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'km²',
                ],
                [
                    'name' => 'hectare',
                    'label' => 'In hectares',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'ha',
                ],
                [
                    'name' => 'square-mile',
                    'label' => 'In square miles',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'mi²',
                ],
                [
                    'name' => 'square-inch',
                    'label' => 'In square inches',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'in²',
                ],
                [
                    'name' => 'cm2',
                    'label' => 'In square centimetres',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'cm²',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Land Area Converter',
            'results' => [
                'm2' => 'value * 4046.8564224',
                'square-foot' => 'value * 43560',
                'square-yard' => 'value * 4840',
                'km2' => 'value * 0.0040468564224',
                'hectare' => 'value * 0.40468564224',
                'square-mile' => 'value * 0.0015625',
                'square-inch' => 'value * 6272640',
                'cm2' => 'value * 40468564.224',
            ],
        ],
    ],
    'article' => [
        'intro' => 'One figure in acres, read out in every unit of area that the page carries.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>Most conversions are asked one at a time: how many of these in one of those. That is fine until you are looking at a specification sheet in one unit, a form asking for another, and a tape measure reading a third. This page shows the figure in 9 units at once so the one you need is already on screen.</p><p>Every reading comes from the same input and the same base unit, so the columns cannot disagree with each other. What they can do is make a mismatch obvious: a figure that looks plausible in one unit and absurd in another is usually a figure typed in the wrong one.</p><p>The page reports <strong>square metres, square feet, square yards, square kilometres, hectares, square miles, square inches and square centimetres</strong> from the boxes above it. The relationship is In acres × 4046.8564224. Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>square metres</strong></td><td><code>In acres × 4046.8564224</code></td></tr><tr><td><strong>square feet</strong></td><td><code>In acres × 43560</code></td></tr><tr><td><strong>square yards</strong></td><td><code>In acres × 4840</code></td></tr><tr><td><strong>square kilometres</strong></td><td><code>In acres × 0.0040468564224</code></td></tr><tr><td><strong>hectares</strong></td><td><code>In acres × 0.40468564224</code></td></tr><tr><td><strong>square miles</strong></td><td><code>In acres × 0.0015625</code></td></tr><tr><td><strong>square inches</strong></td><td><code>In acres × 6272640</code></td></tr><tr><td><strong>square centimetres</strong></td><td><code>In acres × 40468564.224</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 1 box and the page has everything it needs. It reports square metres, square feet, square yards, square kilometres, hectares, square miles, square inches and square centimetres.</p><ul><li><strong>In acres</strong> — in ac. The figure to convert, in acres</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>In square metres</strong> — in m²</li><li><strong>In square feet</strong> — in ft²</li><li><strong>In square yards</strong> — in yd²</li><li><strong>In square kilometres</strong> — in km²</li><li><strong>In hectares</strong> — in ha</li><li><strong>In square miles</strong> — in mi²</li><li><strong>In square inches</strong> — in in²</li><li><strong>In square centimetres</strong> — in cm²</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — In acres = 1 ac — and the results panel reads:</p><ul><li><strong>In square metres</strong> = <code>In acres × 4046.8564224</code> = <strong>4 046.856 m²</strong></li><li><strong>In square feet</strong> = <code>In acres × 43560</code> = <strong>43 560 ft²</strong></li><li><strong>In square yards</strong> = <code>In acres × 4840</code> = <strong>4 840 yd²</strong></li><li><strong>In square kilometres</strong> = <code>In acres × 0.0040468564224</code> = <strong>0.004 km²</strong></li><li><strong>In hectares</strong> = <code>In acres × 0.40468564224</code> = <strong>0.405 ha</strong></li><li><strong>In square miles</strong> = <code>In acres × 0.0015625</code> = <strong>0.002 mi²</strong></li><li><strong>In square inches</strong> = <code>In acres × 6272640</code> = <strong>6.273 × 10<sup>6</sup> in²</strong></li><li><strong>In square centimetres</strong> = <code>In acres × 40468564.224</code> = <strong>4.047 × 10<sup>7</sup> cm²</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Square metres, square feet, square yards, square kilometres, hectares, square miles, square inches and square centimetres should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With In acres = 0.25, the page reports <strong>square metres</strong> = 1 011.714, <strong>square feet</strong> = 10 890, <strong>square yards</strong> = 1 210, <strong>square kilometres</strong> = 0.001, <strong>hectares</strong> = 0.101, <strong>square miles</strong> = 0.0003906, <strong>square inches</strong> = 1.568 × 10<sup>6</sup>, <strong>square centimetres</strong> = 1.012 × 10<sup>7</sup>.</li><li>With In acres = 4, the page reports <strong>square metres</strong> = 16 187.426, <strong>square feet</strong> = 174 240, <strong>square yards</strong> = 19 360, <strong>square kilometres</strong> = 0.016, <strong>hectares</strong> = 1.619, <strong>square miles</strong> = 0.006, <strong>square inches</strong> = 2.509 × 10<sup>7</sup>, <strong>square centimetres</strong> = 1.619 × 10<sup>8</sup>.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>In square metres</strong></td><td><code>1 × 4046.8564224</code></td><td><strong>4 046.856</strong></td></tr><tr><td><strong>In square feet</strong></td><td><code>1 × 43560</code></td><td><strong>43 560</strong></td></tr><tr><td><strong>In square yards</strong></td><td><code>1 × 4840</code></td><td><strong>4 840</strong></td></tr><tr><td><strong>In square kilometres</strong></td><td><code>1 × 0.0040468564224</code></td><td><strong>0.004</strong></td></tr><tr><td><strong>In hectares</strong></td><td><code>1 × 0.40468564224</code></td><td><strong>0.405</strong></td></tr><tr><td><strong>In square miles</strong></td><td><code>1 × 0.0015625</code></td><td><strong>0.002</strong></td></tr><tr><td><strong>In square inches</strong></td><td><code>1 × 6272640</code></td><td><strong>6.273 × 10<sup>6</sup></strong></td></tr><tr><td><strong>In square centimetres</strong></td><td><code>1 × 40468564.224</code></td><td><strong>4.047 × 10<sup>7</sup></strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>At these values the results span 2.58999e+10 times from smallest to largest, which is the sort of page where a misplaced decimal point survives a glance and only the unit gives it away.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'The same conversion at other values',
                'html' => '<p>One row per reading, the input from a tenth of its opening value up to a thousand times it. The point of the table is the shape rather than the figures: a column that keeps its first digits as the input grows is a proportional relationship, and a column whose digits move sideways is one with an offset or a power in it.</p><table class="calc-table"><thead><tr><th>In acres</th><th>square metres</th><th>square feet</th><th>square yards</th><th>square kilometres</th><th>hectares</th><th>square miles</th><th>square inches</th><th>square centimetres</th></tr></thead><tbody><tr><td>0.1 ac</td><td>404.686</td><td>4 356</td><td>484</td><td>0.0004047</td><td>0.04</td><td>0.0001563</td><td>627 264</td><td>4.047 × 10<sup>6</sup></td></tr><tr><td>0.5 ac</td><td>2 023.428</td><td>21 780</td><td>2 420</td><td>0.002</td><td>0.202</td><td>0.0007813</td><td>3.136 × 10<sup>6</sup></td><td>2.023 × 10<sup>7</sup></td></tr><tr><td>1 ac</td><td>4 046.856</td><td>43 560</td><td>4 840</td><td>0.004</td><td>0.405</td><td>0.002</td><td>6.273 × 10<sup>6</sup></td><td>4.047 × 10<sup>7</sup></td></tr><tr><td>2 ac</td><td>8 093.713</td><td>87 120</td><td>9 680</td><td>0.008</td><td>0.809</td><td>0.003</td><td>1.255 × 10<sup>7</sup></td><td>8.094 × 10<sup>7</sup></td></tr><tr><td>5 ac</td><td>20 234.282</td><td>217 800</td><td>24 200</td><td>0.02</td><td>2.023</td><td>0.008</td><td>3.136 × 10<sup>7</sup></td><td>2.023 × 10<sup>8</sup></td></tr><tr><td>10 ac</td><td>40 468.564</td><td>435 600</td><td>48 400</td><td>0.04</td><td>4.047</td><td>0.016</td><td>6.273 × 10<sup>7</sup></td><td>4.047 × 10<sup>8</sup></td></tr><tr><td>100 ac</td><td>404 685.642</td><td>4.356 × 10<sup>6</sup></td><td>484 000</td><td>0.405</td><td>40.469</td><td>0.156</td><td>6.273 × 10<sup>8</sup></td><td>4.047 × 10<sup>9</sup></td></tr><tr><td>1 000 ac</td><td>4.047 × 10<sup>6</sup></td><td>4.356 × 10<sup>7</sup></td><td>4.84 × 10<sup>6</sup></td><td>4.047</td><td>404.686</td><td>1.562</td><td>6.273 × 10<sup>9</sup></td><td>4.047 × 10<sup>10</sup></td></tr></tbody></table><p>Nothing in that table was computed by a different route from the panel. It is the same formula, run eight times, which is why a row you can check by hand is a check on the whole page.</p>',
            ],
            [
                'title' => 'Four units, seven values',
                'html' => '<p>Four of the 9 units, at the values a person types. Each column is the same figure multiplied by one factor, so a row that looks wrong next to its neighbours is a factor typed wrongly rather than a formula that changes shape.</p><table class="calc-table"><thead><tr><th>Acres</th><th>Square metres</th><th>Square feet</th><th>Square yards</th><th>Square kilometres</th></tr></thead><tbody><tr><td>1 ac</td><td>4046.856422</td><td>43 560</td><td>4 840</td><td>0.00404686</td></tr><tr><td>2 ac</td><td>8093.712845</td><td>87 120</td><td>9 680</td><td>0.00809371</td></tr><tr><td>5 ac</td><td>20234.282112</td><td>217 800</td><td>24 200</td><td>0.0202343</td></tr><tr><td>10 ac</td><td>40468.564224</td><td>435 600</td><td>48 400</td><td>0.0404686</td></tr><tr><td>25 ac</td><td>101171</td><td>1 089 000</td><td>121 000</td><td>0.101171</td></tr><tr><td>50 ac</td><td>202343</td><td>2 178 000</td><td>242 000</td><td>0.202343</td></tr><tr><td>100 ac</td><td>404686</td><td>4 356 000</td><td>484 000</td><td>0.404686</td></tr></tbody></table><p>The panel reports 9 readings from the single box because the units share one dimension: they are all measures of area, and the page holds every conversion factor between them. Nothing is rounded before the last step, so the figures in the table and the figures in the panel agree to the digit shown.</p><p>Converting between two of the columns directly means dividing their factors, and any route through this page gives the same answer as the direct route. That is worth testing once with a pair you know: a kilometre in metres, a kilogram in grams, an hour in seconds.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Picking the column by habit.</strong></strong> The unit you always use is not always the unit the other person meant.</li><li><strong><strong>Copying a rounded column.</strong></strong> The panel rounds for display; the table rounds the same way, so neither is a source of extra precision.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: square metres (m²), square feet (ft²), square yards (yd²), square kilometres (km²), hectares (ha), square miles (mi²), square inches (in²), square centimetres (cm²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need in acres. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Square metres, square feet, square yards, square kilometres, hectares, square miles, square inches and square centimetres should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>In acres</strong> ×10</td><td>4 046.856</td><td>40 468.564</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
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
                'html' => '<ul><li><strong><strong>Specification sheets.</strong></strong> A part listed in one system and a drawing dimensioned in another.</li><li><strong><strong>Reports for two audiences.</strong></strong> The same quantity in the unit each reader expects, from one entry.</li><li><strong><strong>Sanity checks.</strong></strong> A figure that is reasonable in acres and impossible in another unit is a typing error.</li><li><strong><strong>Teaching the dimension.</strong></strong> Seeing all the units of area together makes the size of each one concrete.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the Land Area Converter work out?',
                'a' => 'It returns square metres, square feet, square yards, square kilometres, hectares, square miles, square inches and square centimetres from in acres. The relationship is In acres × 4046.8564224.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'In acres (ac). The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: in acres in ac. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
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
