<?php

/**
 * PSI to GPM Converter
 * /conversion/psi-to-gpm
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'PSI to GPM Converter',
    'meta' => [
        'title' => 'PSI to GPM Converter — Convert with the Formula Shown',
        'description' => 'Flow through an orifice depends on the pressure behind it, the size of the hole and how cleanly the fluid leaves it. The page solves that relationship rather.',
        'h1' => 'PSI to GPM Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'psi',
                    'label' => 'Pressure drop across the orifice',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'psi',
                    'default' => '30',
                ],
                [
                    'name' => 'diameter',
                    'label' => 'Orifice diameter',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'in',
                    'default' => '0.5',
                ],
                [
                    'name' => 'cd',
                    'label' => 'Discharge coefficient',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'default' => '0.62',
                    'help' => '0.62 for a sharp-edged hole, 0.8 to 0.98 for a rounded one',
                ],
                [
                    'name' => 'gpm',
                    'label' => 'Flow',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'gpm',
                ],
                [
                    'name' => 'lpm',
                    'label' => 'Flow in litres per minute',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'L/min',
                ],
                [
                    'name' => 'velocity',
                    'label' => 'Jet velocity',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'ft/s',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'PSI to GPM Converter',
            'results' => [
                'velocity' => 'sqrt(2 * 32.174 * (psi * 2.30908))',
                'gpm' => 'cd * 3.141592653589793 * pow(diameter / 12, 2) / 4 * sqrt(2 * 32.174 * (psi * 2.30908)) * 448.831',
                'lpm' => 'cd * 3.141592653589793 * pow(diameter / 12, 2) / 4 * sqrt(2 * 32.174 * (psi * 2.30908)) * 448.831 * 3.785411784',
            ],
        ],
    ],
    'article' => [
        'intro' => 'Flow through an orifice depends on the pressure behind it, the size of the hole and how cleanly the fluid leaves it. The page solves that relationship rather than quoting a single factor.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>The head behind one psi of water is 2.309 feet, and a jet leaving an orifice turns that head into speed: the square root of twice gravity times the head. Multiply speed by the area of the hole and by a discharge coefficient that accounts for the contraction of the jet, and the result is a flow.</p><p>The coefficient matters more than people expect. A sharp-edged hole passes about 62 per cent of the theoretical flow; a well-rounded entrance passes 97 per cent. Change that box by a third and the answer changes by a third, which is why the page asks for it instead of quietly picking one.</p><p>The page reports <strong>flow, flow in litres per minute and jet velocity</strong> from the boxes above it. The relationship is sqrt(2 × 32.174 × (Pressure drop across the orifice × 2.30908)). Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Jet velocity</strong></td><td><code>sqrt(2 × 32.174 × (Pressure drop across the orifice × 2.30908))</code></td></tr><tr><td><strong>Flow</strong></td><td><code>Discharge coefficient × 3.141592653589793 × pow(Orifice diameter ÷ 12, 2) ÷ 4 × sqrt(2 × 32.174 × (Pressure drop across the orifice × 2.30908)) × 448.831</code></td></tr><tr><td><strong>Flow in litres per minute</strong></td><td><code>Discharge coefficient × 3.141592653589793 × pow(Orifice diameter ÷ 12, 2) ÷ 4 × sqrt(2 × 32.174 × (Pressure drop across the orifice × 2.30908)) × 448.831 × 3.785411784</code></td></tr></tbody></table><p>Nothing is applied twice. The factor you see is the ratio of two definitions, so once a figure is in the base unit of its dimension the rest is multiplication or division by a number written on the page. That is why the same factor works at any size, and why a conversion of one or of a million gives the same ratio.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 3 boxes and the page has everything it needs. It reports flow, flow in litres per minute and jet velocity.</p><ul><li><strong>Pressure drop across the orifice</strong> — in psi.</li><li><strong>Orifice diameter</strong> — in in.</li><li><strong>Discharge coefficient</strong>. 0.62 for a sharp-edged hole, 0.8 to 0.98 for a rounded one</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Flow</strong> — in gpm</li><li><strong>Flow in litres per minute</strong> — in L/min</li><li><strong>Jet velocity</strong> — in ft/s</li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — Pressure drop across the orifice = 30 psi, Orifice diameter = 0.5 in, Discharge coefficient = 0.62 — and the results panel reads:</p><ul><li><strong>Flow</strong> = <code>Discharge coefficient × 3.141592653589793 × pow(Orifice diameter ÷ 12, 2) ÷ 4 × sqrt(2 × 32.174 × (Pressure drop across the orifice × 2.30908)) × 448.831</code> = <strong>25.333 gpm</strong></li><li><strong>Flow in litres per minute</strong> = <code>Discharge coefficient × 3.141592653589793 × pow(Orifice diameter ÷ 12, 2) ÷ 4 × sqrt(2 × 32.174 × (Pressure drop across the orifice × 2.30908)) × 448.831 × 3.785411784</code> = <strong>95.896 L/min</strong></li><li><strong>Jet velocity</strong> = <code>sqrt(2 × 32.174 × (Pressure drop across the orifice × 2.30908))</code> = <strong>66.765 ft/s</strong></li></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Flow, flow in litres per minute and jet velocity should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Pressure drop across the orifice = 7.5, Orifice diameter = 0.125, Discharge coefficient = 0.155, the page reports <strong>flow</strong> = 0.198, <strong>flow in litres per minute</strong> = 0.749, <strong>jet velocity</strong> = 33.382.</li><li>With Pressure drop across the orifice = 120, Orifice diameter = 2, Discharge coefficient = 2.48, the page reports <strong>flow</strong> = 3 242.646, <strong>flow in litres per minute</strong> = 12 274.751, <strong>jet velocity</strong> = 133.53.</li></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'The arithmetic, line by line',
                'html' => '<p>The same working with the numbers written in place of the names. Nothing is applied between the two columns that the formula table above does not show.</p><table class="calc-table"><thead><tr><th>Result</th><th>With the values in</th><th>Answer</th></tr></thead><tbody><tr><td><strong>Flow</strong></td><td><code>0.62 × 3.141592653589793 × pow(0.5 ÷ 12, 2) ÷ 4 × sqrt(2 × 32.174 × (30 × 2.30908)) × 448.831</code></td><td><strong>25.333</strong></td></tr><tr><td><strong>Flow in litres per minute</strong></td><td><code>0.62 × 3.141592653589793 × pow(0.5 ÷ 12, 2) ÷ 4 × sqrt(2 × 32.174 × (30 × 2.30908)) × 448.831 × 3.785411784</code></td><td><strong>95.896</strong></td></tr><tr><td><strong>Jet velocity</strong></td><td><code>sqrt(2 × 32.174 × (30 × 2.30908))</code></td><td><strong>66.765</strong></td></tr></tbody></table><p>Read the middle column against the formula table if a figure surprises you: the two should differ only in that the names have been replaced.</p><p>Doing the arithmetic by hand once, at the values the page opens with, is the quickest way to find out whether you understand the relationship or have simply learned to trust the panel. Where the hand answer and the panel disagree, the middle column shows which input you used differently.</p>',
            ],
            [
                'title' => 'The same conversion at other values',
                'html' => '<p>One row per reading, the input from a tenth of its opening value up to a thousand times it. The point of the table is the shape rather than the figures: a column that keeps its first digits as the input grows is a proportional relationship, and a column whose digits move sideways is one with an offset or a power in it.</p><table class="calc-table"><thead><tr><th>Pressure drop across the orifice</th><th>flow</th><th>flow in litres per minute</th><th>jet velocity</th></tr></thead><tbody><tr><td>3 psi</td><td>8.011</td><td>30.325</td><td>21.113</td></tr><tr><td>15 psi</td><td>17.913</td><td>67.809</td><td>47.21</td></tr><tr><td>30 psi</td><td>25.333</td><td>95.896</td><td>66.765</td></tr><tr><td>60 psi</td><td>35.827</td><td>135.618</td><td>94.42</td></tr><tr><td>150 psi</td><td>56.647</td><td>214.431</td><td>149.291</td></tr><tr><td>300 psi</td><td>80.111</td><td>303.251</td><td>211.129</td></tr><tr><td>3 000 psi</td><td>253.332</td><td>958.965</td><td>667.648</td></tr><tr><td>30 000 psi</td><td>801.105</td><td>3 032.513</td><td>2 111.289</td></tr></tbody></table><p>Nothing in that table was computed by a different route from the panel. It is the same formula, run eight times, which is why a row you can check by hand is a check on the whole page.</p>',
            ],
            [
                'title' => 'The same orifice at four pressures',
                'html' => '<p>The square-root in the formula is the reason doubling the pressure does not double the flow. Four times the pressure buys twice the flow, and that is the whole reason a bigger pump is not always the answer to a tired shower.</p><table class="calc-table"><thead><tr><th>Pressure (psi)</th><th>Flow (gpm)</th><th>Flow (L/min)</th></tr></thead><tbody><tr><td>10</td><td>14.63</td><td>55.37</td></tr><tr><td>30</td><td>25.33</td><td>95.87</td></tr><tr><td>60</td><td>35.82</td><td>135.60</td></tr><tr><td>120</td><td>50.66</td><td>191.74</td></tr></tbody></table><p>Those figures are for a half-inch sharp-edged orifice with a coefficient of 0.62, which is the page\'s opening case.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Converting twice.</strong></strong> A figure already in feet converted to metres and then to feet again comes back wrong, and nothing in the display says so.</li><li><strong><strong>Using a rounded factor and a rounded answer.</strong></strong> Each rounding is small; the product of several is not. Keep precision in the middle and round only at the end.</li><li><strong><strong>Assuming both sides use the same word the same way.</strong></strong> A US gallon, an imperial gallon, a dry gallon and a metric gallon are four different volumes sharing one name.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: flow (gpm), flow in litres per minute (L/min), jet velocity (ft/s).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need pressure drop across the orifice, orifice diameter and discharge coefficient. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Flow, flow in litres per minute and jet velocity should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Pressure drop across the orifice</strong> ×10</td><td>25.333</td><td>80.111</td><td>×3.162278</td></tr><tr><td><strong>Orifice diameter</strong> ×10</td><td>25.333</td><td>2 533.317</td><td>×100</td></tr><tr><td><strong>Discharge coefficient</strong> ×10</td><td>25.333</td><td>253.332</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
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
                'q' => 'What does the PSI to GPM Converter work out?',
                'a' => 'It returns flow, flow in litres per minute and jet velocity from pressure drop across the orifice, orifice diameter and discharge coefficient. The relationship is sqrt(2 × 32.174 × (Pressure drop across the orifice × 2.30908)).',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'Pressure drop across the orifice (psi), Orifice diameter (in), Discharge coefficient. The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: pressure drop across the orifice in psi; orifice diameter in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
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
