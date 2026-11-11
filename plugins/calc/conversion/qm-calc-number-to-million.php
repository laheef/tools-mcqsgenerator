<?php

/**
 * Number to Million Converter
 * /conversion/number-to-million
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Number to Million Converter',
    'meta' => [
        'title' => 'How Many Millions: Number to Million Converter',
        'description' => 'Turn a plain number into millions, thousands, lakhs and crores, with the division written out and a table that shows where the words stop matching the digits.',
        'h1' => 'Number to Million Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'value',
                    'label' => 'The number',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'default' => '1000000',
                    'help' => 'The figure to read in words',
                ],
                [
                    'name' => 'million',
                    'label' => 'In millions',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'million',
                ],
                [
                    'name' => 'thousands',
                    'label' => 'In thousands',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'thousand',
                ],
                [
                    'name' => 'lakh',
                    'label' => 'In lakhs',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'lakh',
                ],
                [
                    'name' => 'crore',
                    'label' => 'In crores',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'crore',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Number to Million Converter',
            'results' => [
                'million' => 'value / 1000000',
                'thousands' => 'value / 1000',
                'lakh' => 'value / 100000',
                'crore' => 'value / 10000000',
            ],
        ],
    ],
    'article' => [
        'intro' => 'A plain number divided by 1 000 000 is the same quantity in millions. The page reports it beside thousands, lakhs and crores so the words and the digits can be checked against each other.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>Counting words are a notation, not a unit, and they differ between English and the Indian system. One million is 1 000 000, written with no ambiguity at all, so the page works from the digits and puts the words on top.</p><p>It is worth knowing where the two systems diverge. Both agree up to a thousand. English then groups by thousands — million, billion, trillion — while the Indian system groups by hundreds after the thousand: lakh for a hundred thousand, crore for a hundred lakh. The quantities are the same; only the grouping changes.</p><p>The page reports <strong>millions, thousands, lakhs and crores</strong> from the boxes above it. The relationship is The number ÷ 1000000. Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>millions</strong></td><td><code>The number ÷ 1000000</code></td></tr><tr><td><strong>thousands</strong></td><td><code>The number ÷ 1000</code></td></tr><tr><td><strong>lakhs</strong></td><td><code>The number ÷ 100000</code></td></tr><tr><td><strong>crores</strong></td><td><code>The number ÷ 10000000</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 1 box and the page has everything it needs. It reports millions, thousands, lakhs and crores.</p><ul><li><strong>The number</strong>. The figure to read in words</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>In millions</strong> — in million</li><li><strong>In thousands</strong> — in thousand</li><li><strong>In lakhs</strong> — in lakh</li><li><strong>In crores</strong> — in crore</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — The number = 1 × 10<sup>6</sup> — and the results panel reads:</p><ul><li><strong>In millions</strong> = <code>The number ÷ 1000000</code> = <strong>1 million</strong></li><li><strong>In thousands</strong> = <code>The number ÷ 1000</code> = <strong>1 000 thousand</strong></li><li><strong>In lakhs</strong> = <code>The number ÷ 100000</code> = <strong>10 lakh</strong></li><li><strong>In crores</strong> = <code>The number ÷ 10000000</code> = <strong>0.1 crore</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Millions, thousands, lakhs and crores should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'How much each input moves the answer',
                'html' => '<p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>millions</th><th>thousands</th><th>lakhs</th><th>crores</th></tr></thead><tbody></tbody></table><p>A ten per cent nudge is used because it is the size of error a person makes when they measure roughly. Where the table shows ten per cent in and ten per cent out, the relationship is proportional in that box and the accuracy of your measurement is the accuracy of the answer.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With The number = 250 000, the page reports <strong>millions</strong> = 0.25, <strong>thousands</strong> = 250, <strong>lakhs</strong> = 2.5, <strong>crores</strong> = 0.025.</li><li>With The number = 4 × 10<sup>6</sup>, the page reports <strong>millions</strong> = 4, <strong>thousands</strong> = 4 000, <strong>lakhs</strong> = 40, <strong>crores</strong> = 0.4.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>In millions</strong></td><td><code>1 × 10&lt;sup&gt;6&lt; ÷ sup&gt; ÷ 1000000</code></td><td><strong>1</strong></td></tr><tr><td><strong>In thousands</strong></td><td><code>1 × 10&lt;sup&gt;6&lt; ÷ sup&gt; ÷ 1000</code></td><td><strong>1 000</strong></td></tr><tr><td><strong>In lakhs</strong></td><td><code>1 × 10&lt;sup&gt;6&lt; ÷ sup&gt; ÷ 100000</code></td><td><strong>10</strong></td></tr><tr><td><strong>In crores</strong></td><td><code>1 × 10&lt;sup&gt;6&lt; ÷ sup&gt; ÷ 10000000</code></td><td><strong>0.1</strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>At these values the results span 10 000 times from smallest to largest, which is the sort of page where a misplaced decimal point survives a glance and only the unit gives it away.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'The same conversion at other values',
                'html' => '<p>One row per reading, the input from a tenth of its opening value up to a thousand times it. The point of the table is the shape rather than the figures: a column that keeps its first digits as the input grows is a proportional relationship, and a column whose digits move sideways is one with an offset or a power in it.</p><table class="calc-table"><thead><tr><th>The number</th><th>millions</th><th>thousands</th><th>lakhs</th><th>crores</th></tr></thead><tbody><tr><td>100 000</td><td>0.1</td><td>100</td><td>1</td><td>0.01</td></tr><tr><td>500 000</td><td>0.5</td><td>500</td><td>5</td><td>0.05</td></tr><tr><td>1 × 10<sup>6</sup></td><td>1</td><td>1 000</td><td>10</td><td>0.1</td></tr><tr><td>2 × 10<sup>6</sup></td><td>2</td><td>2 000</td><td>20</td><td>0.2</td></tr><tr><td>5 × 10<sup>6</sup></td><td>5</td><td>5 000</td><td>50</td><td>0.5</td></tr><tr><td>1 × 10<sup>7</sup></td><td>10</td><td>10 000</td><td>100</td><td>1</td></tr><tr><td>1 × 10<sup>8</sup></td><td>100</td><td>100 000</td><td>1 000</td><td>10</td></tr><tr><td>1 × 10<sup>9</sup></td><td>1 000</td><td>1 × 10<sup>6</sup></td><td>10 000</td><td>100</td></tr></tbody></table><p>Nothing in that table was computed by a different route from the panel. It is the same formula, run eight times, which is why a row you can check by hand is a check on the whole page.</p>',
            ],
            [
                'title' => 'The same count in two systems',
                'html' => '<p>Large numbers are read in groups of three in English and in groups of two after the thousand in the Indian system, which is where lakh and crore come from. One million is 1 000 000; one crore is ten million; one lakh is a hundred thousand. The same count written in both systems is the same quantity, and the digits do not change.</p><table class="calc-table"><thead><tr><th>Number</th><th>Millions</th><th>Lakhs</th><th>Crores</th></tr></thead><tbody><tr><td>100 000</td><td>0.1</td><td>1</td><td>0.01</td></tr><tr><td>1 000 000</td><td>1</td><td>10</td><td>0.1</td></tr><tr><td>5 000 000</td><td>5</td><td>50</td><td>0.5</td></tr><tr><td>10 000 000</td><td>10</td><td>100</td><td>1</td></tr><tr><td>100 000 000</td><td>100</td><td>1 000</td><td>10</td></tr><tr><td>1 000 000 000</td><td>1 000</td><td>10 000</td><td>100</td></tr></tbody></table><p>Read the columns carefully rather than the first digits. A crore is ten million, so a figure in crores is a figure in millions divided by ten, and moving a decimal place in the wrong direction costs a factor of a hundred. Newspaper headlines mix the two systems more often than they should, which is exactly when a converter earns its place.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>A billion is not a million million here.</strong></strong> In English usage a billion is a thousand million; the long-scale billion of a million million is not what a newspaper means.</li><li><strong><strong>Lakh and million are not adjacent.</strong></strong> Ten lakh is one million; a crore is ten million.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: millions (million), thousands (thousand), lakhs (lakh), crores (crore).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need the number. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Millions, thousands, lakhs and crores should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>The number</strong> ×10</td><td>1</td><td>10</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
            ],
            [
                'title' => 'What the page does before it answers',
                'html' => '<p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box means a missing input rather than an error. Zero is accepted, but a formula that would divide by it reports no result instead of infinity. Precision is carried throughout and the three-decimal limit is applied only at the end.</p>',
            ],
            [
                'title' => 'Limits worth knowing',
                'html' => '<ul><li><strong><strong>Words are not numbers.</strong></strong> Once a figure is written in words its precision is the word, not the digits behind it.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for.</li></ul>',
            ],
            [
                'title' => 'Where this calculation comes up',
                'html' => '<ul><li><strong><strong>Cooking and dosing.</strong></strong> A recipe written in cups, a label written in millilitres and a scale that reads grams are three units in one kitchen.</li><li><strong><strong>Trade and shipping.</strong></strong> Freight is priced by weight, volume or both, and the two systems meet on the same invoice.</li><li><strong><strong>Study and exams.</strong></strong> A worked example with the units written out is worth more than a memorised factor, because it can be rebuilt.</li><li><strong><strong>Estimating before you measure.</strong></strong> A rough conversion decides whether a job is small or large before anyone fetches a tape.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the Number to Million Converter work out?',
                'a' => 'It returns millions, thousands, lakhs and crores from the number. The relationship is The number ÷ 1000000.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'The number. The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: . The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
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
