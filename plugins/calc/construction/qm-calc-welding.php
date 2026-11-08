<?php

/**
 * Welding
 * /construction/welding
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Welding',
    'meta' => ['title' => 'Welding Calculator: Fillet Volume, Weight and Cost', 'description' => 'Work out the weld metal in a fillet run: throat, volume, deposited weight, the electrode it needs and the cost at a price per pound. The formula is shown.', 'h1' => 'Welding', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'leg',
                    'label' => 'Fillet leg',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.25',
                    'help' => 'Both legs equal',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'length',
                    'label' => 'Weld length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '100',
                    'help' => 'Total run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'efficiency',
                    'label' => 'Deposition efficiency',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '65',
                    'help' => 'Electrode to weld metal',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Electrode price',
                    'type' => 'number',
                    'suffix' => '$/lb',
                    'default' => '4',
                    'help' => 'Per pound of electrode',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'throat',
                    'label' => 'Throat',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'volume',
                    'label' => 'Weld volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in³',
                ],
                [
                    'name' => 'weight',
                    'label' => 'Deposited weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'electrode',
                    'label' => 'Electrode needed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'cost',
                    'label' => 'Cost',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Welding',
            'results' => [
                'throat' => '0.7071*leg',
                'volume' => 'pow(leg,2)/2*length',
                'weight' => 'pow(leg,2)/2*length*0.2836',
                'electrode' => 'pow(leg,2)/2*length*0.2836/(efficiency/100)',
                'cost' => 'pow(leg,2)/2*length*0.2836/(efficiency/100)*price',
                'leg' => 'sqrt(2*volume/length)',
                'length' => '2*volume/pow(leg,2)',
                'price' => 'cost/electrode',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Throat = 0.707 × leg</strong>; <strong>volume = leg² ÷ 2 × length</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Weld metal is bought, stored and paid for by weight, while a drawing gives a leg length and a run. Turning one into the other is what an estimate needs, and the deposition efficiency is the bridge: not all the electrode reaches the joint.</p><p>The page reports <strong>throat and weld volume and deposited weight and electrode needed and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Throat</strong></td><td><code>0.7071 × Fillet leg</code></td></tr><tr><td><strong>Weld volume</strong></td><td><code>(Fillet leg)^2 ÷ 2 × Weld length</code></td></tr><tr><td><strong>Deposited weight</strong></td><td><code>(Fillet leg)^2 ÷ 2 × Weld length × 0.2836</code></td></tr><tr><td><strong>Electrode needed</strong></td><td><code>(Fillet leg)^2 ÷ 2 × Weld length × 0.2836 ÷ (Deposition efficiency ÷ 100)</code></td></tr><tr><td><strong>Cost</strong></td><td><code>(Fillet leg)^2 ÷ 2 × Weld length × 0.2836 ÷ (Deposition efficiency ÷ 100) × Electrode price</code></td></tr><tr><td><strong>Fillet leg</strong></td><td><code>√(2 × Weld volume ÷ Weld length)</code></td></tr><tr><td><strong>Weld length</strong></td><td><code>2 × Weld volume ÷ (Fillet leg)^2</code></td></tr><tr><td><strong>Electrode price</strong></td><td><code>Cost ÷ Electrode needed</code></td></tr></tbody></table><p><p>A fillet weld has a triangular cross-section, so its area is half the square of the leg, and the throat is the leg times the sine of forty five degrees. The volume is that area along the run, the weight uses steel's 0.2836 pounds per cubic inch, and the electrode is the deposited weight divided by the efficiency.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports throat and weld volume and deposited weight and electrode needed and cost.</p><ul><li><strong>Fillet leg</strong> — in in. Both legs equal</li><li><strong>Weld length</strong> — in in. Total run</li><li><strong>Deposition efficiency</strong> — in %. Electrode to weld metal</li><li><strong>Electrode price</strong> — in $/lb. Per pound of electrode</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Throat</strong> — in in</li><li><strong>Weld volume</strong> — in in³</li><li><strong>Deposited weight</strong> — in lb</li><li><strong>Electrode needed</strong> — in lb</li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Fillet leg = 0.25 in, Weld length = 100 in, Deposition efficiency = 65 %, Electrode price = 4 $/lb — and the results panel reads:</p><ul><li><strong>Throat</strong> = <code>0.7071 × Fillet leg</code> = <strong>0.177 in</strong></li><li><strong>Weld volume</strong> = <code>(Fillet leg)^2 ÷ 2 × Weld length</code> = <strong>3.125 in³</strong></li><li><strong>Deposited weight</strong> = <code>(Fillet leg)^2 ÷ 2 × Weld length × 0.2836</code> = <strong>0.886 lb</strong></li><li><strong>Electrode needed</strong> = <code>(Fillet leg)^2 ÷ 2 × Weld length × 0.2836 ÷ (Deposition efficiency ÷ 100)</code> = <strong>1.363 lb</strong></li><li><strong>Cost</strong> = <code>(Fillet leg)^2 ÷ 2 × Weld length × 0.2836 ÷ (Deposition efficiency ÷ 100) × Electrode price</code> = <strong>5.454 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.7071 × 0.25 = 0.177</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 0.25 in fillet 100 in long has a 0.177 in throat and 3.125 in³ of weld metal, weighing 0.886 lb. At 65 % efficiency that is 1.363 lb of electrode, costing 5.454.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the electrode against the deposit: a third more electrode than weld metal is normal. Much more means the efficiency has been set for a process that is not stick welding.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Throat</th><th>Weld volume</th><th>Deposited weight</th><th>Electrode needed</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Fillet leg</strong> +10 %</td><td>+10 %</td><td>+21 %</td><td>+21 %</td><td>+21 %</td><td>+21 %</td></tr><tr><td><strong>Weld length</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Deposition efficiency</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Electrode price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Fillet leg</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Deposition efficiency</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Fillet leg = 0.375, Weld length = 200, the page reports <strong>Throat</strong> = 0.265 in, <strong>Weld volume</strong> = 14.062 in³, <strong>Deposited weight</strong> = 3.988 lb, <strong>Electrode needed</strong> = 6.136 lb, <strong>Cost</strong> = 24.542 $. A heavier fillet over a longer run: the weight climbs with the square of the leg.</li><li>With Fillet leg = 0.125, Deposition efficiency = 90, Electrode price = 6, the page reports <strong>Throat</strong> = 0.088 in, <strong>Weld volume</strong> = 0.781 in³, <strong>Deposited weight</strong> = 0.222 lb, <strong>Electrode needed</strong> = 0.246 lb, <strong>Cost</strong> = 1.477 $. A light wire-fed run with a high efficiency.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Leg used as throat.</strong> The throat is 0.707 of the leg.</li><li><strong>Efficiency assumed at 100.</strong> Stick welding wastes a third.</li><li><strong>Waste and stubs left out.</strong> They are already in the efficiency.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Throat (in), Weld volume (in³), Deposited weight (lb), Electrode needed (lb), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Leg and length in inches, volume in cubic inches, weight and electrode in pounds, efficiency in per cent.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need fillet leg and weld length and deposition efficiency and electrode price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Throat and weld volume and deposited weight and electrode needed and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Fillet leg</strong> ×10</td><td>0.177</td><td>1.768</td><td>ten times larger</td></tr><tr><td><strong>Weld length</strong> ×10</td><td>0.177</td><td>0.177</td><td>unchanged</td></tr><tr><td><strong>Deposition efficiency</strong> ×10</td><td>0.177</td><td>0.177</td><td>unchanged</td></tr><tr><td><strong>Electrode price</strong> ×10</td><td>0.177</td><td>0.177</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Equal legs.</strong> An unequal fillet needs its own areas.</li><li><strong>No distortion or preparation.</strong> Those change the real cost.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Estimating electrode for a job.</li></li><li><li>Pricing weld metal per foot.</li></li><li><li>Comparing a stick and a wire process.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/carbon-equivalent">Carbon equivalent</a> <a href="/construction/steel-weight">Steel weight</a> <a href="/construction/bending-stress">Bending stress</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Welding calculator work out?', 'a' => <<<'TXT'
            It returns throat and weld volume and deposited weight and electrode needed and cost from fillet leg and weld length and deposition efficiency and electrode price. The relationship is 0.7071 × Fillet leg.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Fillet leg (in), Weld length (in), Deposition efficiency (%), Electrode price ($/lb). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: fillet leg in in; weld length in in; deposition efficiency in %; electrode price in $/lb. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much weld metal is in a fillet?', 'a' => 'Half the leg squared, times the length of the run.'],
            ['q' => 'How much electrode for 100 feet of quarter inch fillet?', 'a' => 'About four pounds of deposited metal, and about six pounds of stick electrode.'],
        ],
        'related' => [
            ['path' => '/construction/carbon-equivalent', 'name' => 'Carbon equivalent'],
            ['path' => '/construction/steel-weight', 'name' => 'Steel weight'],
            ['path' => '/construction/bending-stress', 'name' => 'Bending stress'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
