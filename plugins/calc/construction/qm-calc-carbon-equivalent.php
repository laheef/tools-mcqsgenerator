<?php

/**
 * Carbon equivalent
 * /construction/carbon-equivalent
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Carbon equivalent',
    'meta' => ['title' => 'Carbon Equivalent Calculator: Weldability of Steel', 'description' => 'Work out the carbon equivalent of a steel from its alloying elements, the number that decides how much preheat a weld needs. The formula and units are shown.', 'h1' => 'Carbon equivalent', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'carbon',
                    'label' => 'Carbon',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '0.2',
                    'help' => 'From the mill certificate',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'manganese',
                    'label' => 'Manganese',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '1.0',
                    'help' => 'Usually the largest addition',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'chromium',
                    'label' => 'Chromium',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '0.1',
                    'help' => 'Alloying',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molybdenum',
                    'label' => 'Molybdenum',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '0.0',
                    'help' => 'Alloying',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'vanadium',
                    'label' => 'Vanadium',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '0.0',
                    'help' => 'Micro-alloying',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'nickel',
                    'label' => 'Nickel',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '0.1',
                    'help' => 'Alloying',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'copper',
                    'label' => 'Copper',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '0.1',
                    'help' => 'Residual or alloying',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ce',
                    'label' => 'Carbon equivalent',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'alloy_effect',
                    'label' => 'Alloy contribution',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'margin',
                    'label' => 'Margin to 0.4',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'preheat',
                    'label' => 'Suggested preheat',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '°F',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Carbon equivalent',
            'results' => [
                'ce' => 'carbon+manganese/6+(chromium+molybdenum+vanadium)/5+(nickel+copper)/15',
                'alloy_effect' => 'manganese/6+(chromium+molybdenum+vanadium)/5+(nickel+copper)/15',
                'margin' => '0.4-carbon-manganese/6-(chromium+molybdenum+vanadium)/5-(nickel+copper)/15',
                'preheat' => 'max(0, (carbon+manganese/6+(chromium+molybdenum+vanadium)/5+(nickel+copper)/15-0.4)*500)',
                'manganese' => '(ce-carbon-(chromium+molybdenum+vanadium)/5-(nickel+copper)/15)*6',
                'nickel' => '(ce-carbon-manganese/6-(chromium+molybdenum+vanadium)/5-copper/15)*15',
                'copper' => '(ce-carbon-manganese/6-(chromium+molybdenum+vanadium)/5-nickel/15)*15',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>CE = C + Mn/6 + (Cr + Mo + V)/5 + (Ni + Cu)/15</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Carbon makes steel hard and, past a point, makes it crack when welded. The carbon equivalent rolls every other alloying element into an equivalent amount of carbon, so a single number says whether a steel welds freely or needs preheat.</p><p>The page reports <strong>carbon equivalent and alloy contribution and margin to 0.4 and suggested preheat</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Carbon equivalent</strong></td><td><code>Carbon+Manganese ÷ 6+(Chromium+Molybdenum+Vanadium) ÷ 5+(Nickel+Copper) ÷ 15</code></td></tr><tr><td><strong>Alloy contribution</strong></td><td><code>Manganese ÷ 6+(Chromium+Molybdenum+Vanadium) ÷ 5+(Nickel+Copper) ÷ 15</code></td></tr><tr><td><strong>Margin to 0.4</strong></td><td><code>0.4-Carbon-Manganese ÷ 6-(Chromium+Molybdenum+Vanadium) ÷ 5-(Nickel+Copper) ÷ 15</code></td></tr><tr><td><strong>Suggested preheat</strong></td><td><code>max(0, (Carbon+Manganese ÷ 6+(Chromium+Molybdenum+Vanadium) ÷ 5+(Nickel+Copper) ÷ 15-0.4) × 500)</code></td></tr><tr><td><strong>Manganese</strong></td><td><code>(Carbon equivalent-Carbon-(Chromium+Molybdenum+Vanadium) ÷ 5-(Nickel+Copper) ÷ 15) × 6</code></td></tr><tr><td><strong>Nickel</strong></td><td><code>(Carbon equivalent-Carbon-Manganese ÷ 6-(Chromium+Molybdenum+Vanadium) ÷ 5-Copper ÷ 15) × 15</code></td></tr><tr><td><strong>Copper</strong></td><td><code>(Carbon equivalent-Carbon-Manganese ÷ 6-(Chromium+Molybdenum+Vanadium) ÷ 5-Nickel ÷ 15) × 15</code></td></tr></tbody></table><p><p>Carbon counts in full, manganese at a sixth, chromium, molybdenum and vanadium at a fifth, and nickel and copper at a fifteenth. The result is compared with the usual threshold of four tenths of a per cent, and the suggested preheat rises with the margin above it.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs. It reports carbon equivalent and alloy contribution and margin to 0.4 and suggested preheat.</p><ul><li><strong>Carbon</strong> — in %. From the mill certificate</li><li><strong>Manganese</strong> — in %. Usually the largest addition</li><li><strong>Chromium</strong> — in %. Alloying</li><li><strong>Molybdenum</strong> — in %. Alloying</li><li><strong>Vanadium</strong> — in %. Micro-alloying</li><li><strong>Nickel</strong> — in %. Alloying</li><li><strong>Copper</strong> — in %. Residual or alloying</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Carbon equivalent</strong> — in %</li><li><strong>Alloy contribution</strong> — in %</li><li><strong>Margin to 0.4</strong> — in %</li><li><strong>Suggested preheat</strong> — in °F</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Carbon = 0.2 %, Manganese = 1 %, Chromium = 0.1 %, Molybdenum = 0 %, Vanadium = 0 %, Nickel = 0.1 %, Copper = 0.1 % — and the results panel reads:</p><ul><li><strong>Carbon equivalent</strong> = <code>Carbon+Manganese ÷ 6+(Chromium+Molybdenum+Vanadium) ÷ 5+(Nickel+Copper) ÷ 15</code> = <strong>0.4 %</strong></li><li><strong>Alloy contribution</strong> = <code>Manganese ÷ 6+(Chromium+Molybdenum+Vanadium) ÷ 5+(Nickel+Copper) ÷ 15</code> = <strong>0.2 %</strong></li><li><strong>Margin to 0.4</strong> = <code>0.4-Carbon-Manganese ÷ 6-(Chromium+Molybdenum+Vanadium) ÷ 5-(Nickel+Copper) ÷ 15</code> = <strong>1.908 × 10<sup>-17</sup> %</strong></li><li><strong>Suggested preheat</strong> = <code>max(0, (Carbon+Manganese ÷ 6+(Chromium+Molybdenum+Vanadium) ÷ 5+(Nickel+Copper) ÷ 15-0.4) × 500)</code> = <strong>0 °F</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.2+1 ÷ 6+(0.1+0+0) ÷ 5+(0.1+0.1) ÷ 15 = 0.4</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>This steel has 0.2 % of carbon but a carbon equivalent of 0.4 %. That leaves a margin of 1.908 × 10<sup>-17</sup> % to the four tenths threshold and suggests a preheat near 0 °F.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the equivalent against four tenths: below it the steel welds without preheat in thin sections, above it the risk of hydrogen cracking climbs quickly. Past six tenths the procedure needs engineering.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Carbon equivalent</th><th>Alloy contribution</th><th>Margin to 0.4</th><th>Suggested preheat</th></tr></thead><tbody><tr><td><strong>Carbon</strong> +10 %</td><td>+5 %</td><td>+0 %</td><td>−1.048 × 10<sup>17</sup> %</td><td>—</td></tr><tr><td><strong>Manganese</strong> +10 %</td><td>+4.17 %</td><td>+8.33 %</td><td>−8.734 × 10<sup>16</sup> %</td><td>—</td></tr><tr><td><strong>Chromium</strong> +10 %</td><td>+0.5 %</td><td>+1 %</td><td>−1.048 × 10<sup>16</sup> %</td><td>—</td></tr><tr><td><strong>Molybdenum</strong> +10 %</td><td>+5 %</td><td>+10 %</td><td>−1.048 × 10<sup>17</sup> %</td><td>—</td></tr><tr><td><strong>Vanadium</strong> +10 %</td><td>+5 %</td><td>+10 %</td><td>−1.048 × 10<sup>17</sup> %</td><td>—</td></tr><tr><td><strong>Nickel</strong> +10 %</td><td>+0.17 %</td><td>+0.33 %</td><td>−3.494 × 10<sup>15</sup> %</td><td>—</td></tr><tr><td><strong>Copper</strong> +10 %</td><td>+0.17 %</td><td>+0.33 %</td><td>−3.494 × 10<sup>15</sup> %</td><td>—</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Carbon</strong>: a ten per cent move there shifts the result by about 1.048 × 10<sup>17</sup> per cent. The least sensitive is <strong>Copper</strong>, at 3.494 × 10<sup>15</sup> per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Carbon = 0.3, Manganese = 1.4, the page reports <strong>Carbon equivalent</strong> = 0.567 %, <strong>Alloy contribution</strong> = 0.267 %, <strong>Margin to 0.4</strong> = -0.167 %, <strong>Suggested preheat</strong> = 83.333 °F. A higher carbon steel: past the threshold and needing preheat.</li><li>With Carbon = 0.12, Manganese = 0.6, Chromium = 0, Nickel = 0, Copper = 0, the page reports <strong>Carbon equivalent</strong> = 0.22 %, <strong>Alloy contribution</strong> = 0.1 %, <strong>Margin to 0.4</strong> = 0.18 %, <strong>Suggested preheat</strong> = 0 °F. A mild steel well under the limit.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Carbon equivalent read as carbon.</strong> They are different numbers.</li><li><strong>Elements left as fractions.</strong> The form wants per cent.</li><li><strong>Section thickness ignored.</strong> A thick section needs more preheat at the same CE.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Carbon equivalent (%), Alloy contribution (%), Margin to 0.4 (%), Suggested preheat (°F).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>All alloy contents in per cent by weight, preheat in Fahrenheit degrees.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need carbon and manganese and chromium and molybdenum and vanadium and nickel and copper. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Carbon equivalent and alloy contribution and margin to 0.4 and suggested preheat should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Carbon</strong> ×10</td><td>0.4</td><td>2.2</td><td>×5.5</td></tr><tr><td><strong>Manganese</strong> ×10</td><td>0.4</td><td>1.9</td><td>×4.75</td></tr><tr><td><strong>Chromium</strong> ×10</td><td>0.4</td><td>0.58</td><td>×1.45</td></tr><tr><td><strong>Molybdenum</strong> ×10</td><td>0.4</td><td>0.6</td><td>×1.5</td></tr><tr><td><strong>Vanadium</strong> ×10</td><td>0.4</td><td>0.6</td><td>×1.5</td></tr><tr><td><strong>Nickel</strong> ×10</td><td>0.4</td><td>0.46</td><td>×1.15</td></tr><tr><td><strong>Copper</strong> ×10</td><td>0.4</td><td>0.46</td><td>×1.15</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>One formula.</strong> Different equivalents exist for different standards.</li><li><strong>Guide only.</strong> A welding procedure is qualified by test.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Deciding on preheat.</li></li><li><li>Checking a mill certificate.</li></li><li><li>Comparing two steels for weldability.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/welding">Welding</a> <a href="/construction/bending-stress">Bending stress</a> <a href="/construction/steel-weight">Steel weight</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Carbon equivalent calculator work out?', 'a' => <<<'TXT'
            It returns carbon equivalent and alloy contribution and margin to 0.4 and suggested preheat from carbon and manganese and chromium and molybdenum and vanadium and nickel and copper. The relationship is Carbon+Manganese ÷ 6+(Chromium+Molybdenum+Vanadium) ÷ 5+(Nickel+Copper) ÷ 15.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Carbon (%), Manganese (%), Chromium (%), Molybdenum (%), Vanadium (%), Nickel (%), Copper (%). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: carbon in %; manganese in %; chromium in %; molybdenum in %; vanadium in %; nickel in %; copper in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What carbon equivalent needs preheat?', 'a' => 'Above about 0.4 per cent, depending on thickness and the process.'],
            ['q' => 'How is carbon equivalent calculated?', 'a' => 'Carbon plus manganese over six plus chromium, molybdenum and vanadium over five plus nickel and copper over fifteen.'],
        ],
        'related' => [
            ['path' => '/construction/welding', 'name' => 'Welding'],
            ['path' => '/construction/bending-stress', 'name' => 'Bending stress'],
            ['path' => '/construction/steel-weight', 'name' => 'Steel weight'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
