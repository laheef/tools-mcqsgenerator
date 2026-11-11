<?php

/**
 * Millilitre to US fluid ounce Converter
 * /conversion/ml-to-oz-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Millilitre to US fluid ounce Converter',
    'meta' => [
        'title' => 'Millilitres to US fluid ounces: The Exact Conversion',
        'description' => 'Convert millilitres to US fluid ounces at exactly 0.033814 US fluid ounces per millilitre. Type a figure and read US fluid ounces, the reverse rate and the.',
        'h1' => 'Millilitre to US fluid ounce Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'value',
                    'label' => 'In millilitres',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'mL',
                    'default' => '1',
                    'help' => 'The figure to convert, in millilitres',
                ],
                [
                    'name' => 'result',
                    'label' => 'Millilitres in US fluid ounces',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'fl oz',
                ],
                [
                    'name' => 'base',
                    'label' => 'Millilitres in litres',
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
                    'label' => 'US fluid ounces per millilitre',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'fl oz/mL',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Millilitre to US fluid ounce Converter',
            'results' => [
                'result' => 'value * 0.033814',
                'base' => 'value * 0.001',
                'factor' => '0.033814',
            ],
        ],
    ],
    'article' => [
        'intro' => 'One millilitre is 0.033814 US fluid ounces, and the page computes that ratio for any figure you type rather than reading it off a table of round values.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>One millilitre is 0.033814 US fluid ounces, and that figure is a definition rather than a measurement, so it is exact to as many digits as you print it. The reverse is 29.57353 millilitres to the US fluid ounce, which is the same fact written the other way round.</p><p>Both units belong to the same dimension, so the conversion is a single multiplication. That is worth saying plainly because half the arithmetic mistakes in this area come from treating a conversion like a formula with an offset in it: there is no offset here, and twice the figure is twice the answer.</p><p>The page reports <strong>millilitres in US fluid ounces, millilitres in litres and US fluid ounces per millilitre</strong> from the boxes above it. The relationship is In millilitres × 0.033814. Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Millilitres in US fluid ounces</strong></td><td><code>In millilitres × 0.033814</code></td></tr><tr><td><strong>Millilitres in litres</strong></td><td><code>In millilitres × 0.001</code></td></tr><tr><td><strong>US fluid ounces per millilitre</strong></td><td><code>0.033814</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 1 box and the page has everything it needs. It reports millilitres in US fluid ounces, millilitres in litres and US fluid ounces per millilitre.</p><ul><li><strong>In millilitres</strong> — in mL. The figure to convert, in millilitres</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Millilitres in US fluid ounces</strong> — in fl oz</li><li><strong>Millilitres in litres</strong> — in L</li><li><strong>US fluid ounces per millilitre</strong> — in fl oz/mL</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — In millilitres = 1 mL — and the results panel reads:</p><ul><li><strong>Millilitres in US fluid ounces</strong> = <code>In millilitres × 0.033814</code> = <strong>0.034 fl oz</strong></li><li><strong>Millilitres in litres</strong> = <code>In millilitres × 0.001</code> = <strong>0.001 L</strong></li><li><strong>US fluid ounces per millilitre</strong> = <code>0.033814</code> = <strong>0.034 fl oz/mL</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Millilitres in US fluid ounces, millilitres in litres and US fluid ounces per millilitre should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With In millilitres = 0.25, the page reports <strong>millilitres in US fluid ounces</strong> = 0.008, <strong>millilitres in litres</strong> = 0.00025, <strong>US fluid ounces per millilitre</strong> = 0.034.</li><li>With In millilitres = 4, the page reports <strong>millilitres in US fluid ounces</strong> = 0.135, <strong>millilitres in litres</strong> = 0.004, <strong>US fluid ounces per millilitre</strong> = 0.034.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>Millilitres in US fluid ounces</strong></td><td><code>1 × 0.033814</code></td><td><strong>0.034</strong></td></tr><tr><td><strong>Millilitres in litres</strong></td><td><code>1 × 0.001</code></td><td><strong>0.001</strong></td></tr><tr><td><strong>US fluid ounces per millilitre</strong></td><td><code>0.033814</code></td><td><strong>0.034</strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'The same conversion at other values',
                'html' => '<p>One row per reading, the input from a tenth of its opening value up to a thousand times it. The point of the table is the shape rather than the figures: a column that keeps its first digits as the input grows is a proportional relationship, and a column whose digits move sideways is one with an offset or a power in it.</p><table class="calc-table"><thead><tr><th>In millilitres</th><th>millilitres in US fluid ounces</th><th>millilitres in litres</th><th>US fluid ounces per millilitre</th></tr></thead><tbody><tr><td>0.1 mL</td><td>0.003</td><td>0.0001</td><td>0.034</td></tr><tr><td>0.5 mL</td><td>0.017</td><td>0.0005</td><td>0.034</td></tr><tr><td>1 mL</td><td>0.034</td><td>0.001</td><td>0.034</td></tr><tr><td>2 mL</td><td>0.068</td><td>0.002</td><td>0.034</td></tr><tr><td>5 mL</td><td>0.169</td><td>0.005</td><td>0.034</td></tr><tr><td>10 mL</td><td>0.338</td><td>0.01</td><td>0.034</td></tr><tr><td>100 mL</td><td>3.381</td><td>0.1</td><td>0.034</td></tr><tr><td>1 000 mL</td><td>33.814</td><td>1</td><td>0.034</td></tr></tbody></table><p>Nothing in that table was computed by a different route from the panel. It is the same formula, run eight times, which is why a row you can check by hand is a check on the whole page.</p>',
            ],
            [
                'title' => 'Millilitres and US fluid ounces side by side',
                'html' => '<p>The same conversion read the other way, for the values people actually type. Every row is 0.033814 US fluid ounces to the millilitre, so the two columns multiply to give the same physical quantity.</p><table class="calc-table"><thead><tr><th>US fluid ounces</th><th>Millilitres</th></tr></thead><tbody><tr><td>1 US fluid ounces</td><td>29.57353 millilitres</td></tr><tr><td>2 US fluid ounces</td><td>59.147059 millilitres</td></tr><tr><td>5 US fluid ounces</td><td>147.867648 millilitres</td></tr><tr><td>10 US fluid ounces</td><td>295.735296 millilitres</td></tr><tr><td>25 US fluid ounces</td><td>739.338239 millilitres</td></tr><tr><td>50 US fluid ounces</td><td>1478.676478 millilitres</td></tr><tr><td>100 US fluid ounces</td><td>2957.352956 millilitres</td></tr><tr><td>250 US fluid ounces</td><td>7393.382391 millilitres</td></tr><tr><td>500 US fluid ounces</td><td>14786.764781 millilitres</td></tr><tr><td>1 000 US fluid ounces</td><td>29573.529562 millilitres</td></tr></tbody></table><p>Dividing is the other direction: one US fluid ounce is 29.57353 millilitres, and that is the number to use when the figure you were given is already in US fluid ounces. The two factors are reciprocals, which is a quick check that neither was typed wrongly — multiply them and you should get one.</p><p>Precision deserves a sentence of its own. The factor 0.033814 is exact as written, but a figure typed into the box has only the digits you gave it, and the answer cannot be more precise than that. Where the small end of the range matters, work in the smaller unit: millilitres keep more significant figures for the same measurement.</p><p>One last check that costs nothing: convert a round figure you already know. A metre is 3.28 feet, a mile is 1.61 kilometres, a kilogram is 2.2 pounds. If the page disagrees with the number in your head by a factor rather than a little, the unit in the box is not the unit the label names.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Using the inverse by accident.</strong></strong> Multiplying when you should divide gives an answer out by 0.001143, which is large enough to notice but small enough to be believed.</li><li><strong><strong>Mixing the systems mid-calculation.</strong></strong> Convert once, at the end, rather than at every step.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: millilitres in US fluid ounces (fl oz), millilitres in litres (L), US fluid ounces per millilitre (fl oz/mL).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need in millilitres. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Millilitres in US fluid ounces, millilitres in litres and US fluid ounces per millilitre should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>In millilitres</strong> ×10</td><td>0.034</td><td>0.338</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
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
                'html' => '<ul><li><strong><strong>Reading a label.</strong></strong> A product marked in US fluid ounces and a form that asks for millilitres is the commonest place this factor is needed.</li><li><strong><strong>Estimating in your own units.</strong></strong> Someone quotes a figure in US fluid ounces and you think in millilitres: 0.033814 is the whole of the arithmetic.</li><li><strong><strong>Checking a spreadsheet.</strong></strong> A column converted with the wrong factor is out by exactly 0.033814, which is easy to see once you know which number to expect.</li><li><strong><strong>Teaching the relationship.</strong></strong> One factor, used both ways, is easier to remember than two rules.</li><li><strong><strong>Rounding decisions.</strong></strong> 0.033814 has enough digits that a rounded version shows up in the fourth significant figure and nowhere earlier.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the Millilitre to US fluid ounce Converter work out?',
                'a' => 'It returns millilitres in US fluid ounces, millilitres in litres and US fluid ounces per millilitre from in millilitres. The relationship is In millilitres × 0.033814.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'In millilitres (mL). The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: in millilitres in mL. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
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
