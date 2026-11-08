<?php

/**
 * Fence picket
 * /construction/fence-picket
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fence picket',
    'meta' => ['title' => 'Fence Picket Calculator: Count, Spacing and Cost', 'description' => 'Count the pickets a run needs from the picket width and the gap, see what share of the fence is closed, and price the lot at a cost each. Units shown.', 'h1' => 'Fence picket', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Fence length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '100',
                    'help' => 'Straight run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'picket_width',
                    'label' => 'Picket width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '5.5',
                    'help' => 'Face width',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gap',
                    'label' => 'Gap between pickets',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.25',
                    'help' => 'Daylight between pickets',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price per picket',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '2.5',
                    'help' => 'Each picket',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pickets',
                    'label' => 'Pickets',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'exposure',
                    'label' => 'Pitch',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'coverage',
                    'label' => 'Closed share',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
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
            'title' => 'Fence picket',
            'results' => [
                'pickets' => 'ceil(length*12/(picket_width+gap))+1',
                'exposure' => 'picket_width+gap',
                'coverage' => 'picket_width/(picket_width+gap)*100',
                'cost' => '(ceil(length*12/(picket_width+gap))+1)*price',
                'length' => '(pickets-1)*(picket_width+gap)/12',
                'gap' => 'length*12/(pickets-1)-picket_width',
                'picket_width' => 'length*12/(pickets-1)-gap',
                'price' => 'cost/pickets',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Pickets = run in inches ÷ (picket width + gap) + 1</strong>, and the closed share is <strong>width ÷ (width + gap)</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Picket spacing is the whole character of a fence. Tight pickets give privacy, wide gaps give airflow and light, and either way the count has to be right before the order goes in, because pickets are sold in bundles rather than singly.</p><p>The page reports <strong>pickets and pitch and closed share and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Pickets</strong></td><td><code>ceil(Fence length × 12 ÷ (Picket width+Gap between pickets))+1</code></td></tr><tr><td><strong>Pitch</strong></td><td><code>Picket width+Gap between pickets</code></td></tr><tr><td><strong>Closed share</strong></td><td><code>Picket width ÷ (Picket width+Gap between pickets) × 100</code></td></tr><tr><td><strong>Cost</strong></td><td><code>(ceil(Fence length × 12 ÷ (Picket width+Gap between pickets))+1) × Price per picket</code></td></tr><tr><td><strong>Fence length</strong></td><td><code>(Pickets-1) × (Picket width+Gap between pickets) ÷ 12</code></td></tr><tr><td><strong>Gap between pickets</strong></td><td><code>Fence length × 12 ÷ (Pickets-1)-Picket width</code></td></tr><tr><td><strong>Picket width</strong></td><td><code>Fence length × 12 ÷ (Pickets-1)-Gap between pickets</code></td></tr><tr><td><strong>Price per picket</strong></td><td><code>Cost ÷ Pickets</code></td></tr></tbody></table><p><p>One picket plus one gap is the pitch — the distance from the face of one picket to the face of the next. The run in inches divided by the pitch gives the number of pitches, and the closing picket adds one. The closed share is simply how much of the pitch the picket itself covers.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports pickets and pitch and closed share and cost.</p><ul><li><strong>Fence length</strong> — in ft. Straight run</li><li><strong>Picket width</strong> — in in. Face width</li><li><strong>Gap between pickets</strong> — in in. Daylight between pickets</li><li><strong>Price per picket</strong> — in $. Each picket</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Pickets</strong></li><li><strong>Pitch</strong> — in in</li><li><strong>Closed share</strong> — in %</li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Fence length = 100 ft, Picket width = 5.5 in, Gap between pickets = 0.25 in, Price per picket = 2.5 $ — and the results panel reads:</p><ul><li><strong>Pickets</strong> = <code>ceil(Fence length × 12 ÷ (Picket width+Gap between pickets))+1</code> = <strong>210</strong></li><li><strong>Pitch</strong> = <code>Picket width+Gap between pickets</code> = <strong>5.75 in</strong></li><li><strong>Closed share</strong> = <code>Picket width ÷ (Picket width+Gap between pickets) × 100</code> = <strong>95.652 %</strong></li><li><strong>Cost</strong> = <code>(ceil(Fence length × 12 ÷ (Picket width+Gap between pickets))+1) × Price per picket</code> = <strong>525 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil(100 × 12 ÷ (5.5+0.25))+1 = 210</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>100.146 ft at a 5.75 in pitch needs 210 pickets and leaves 95.652 of the fence closed. At the price on the form that is 525.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the closed share: ninety five per cent is a privacy fence, seventy per cent is a picket fence you can see through. Anything under half means the gaps are wider than the pickets and the fence is decorative.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Pickets</th><th>Pitch</th><th>Closed share</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Fence length</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Picket width</strong> +10 %</td><td>−8.57 %</td><td>+9.57 %</td><td>+0.4 %</td><td>−8.57 %</td></tr><tr><td><strong>Gap between pickets</strong> +10 %</td><td>−0.48 %</td><td>+0.43 %</td><td>−0.43 %</td><td>−0.48 %</td></tr><tr><td><strong>Price per picket</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Fence length</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Gap between pickets</strong>, at 0.5 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Gap between pickets = 2, Picket width = 3.5, the page reports <strong>Pickets</strong> = 220, <strong>Pitch</strong> = 5.5 in, <strong>Closed share</strong> = 63.636 %, <strong>Cost</strong> = 550 $. A classic front-yard picket fence with wide daylight.</li><li>With Gap between pickets = 0.125, Fence length = 60, the page reports <strong>Pickets</strong> = 129, <strong>Pitch</strong> = 5.625 in, <strong>Closed share</strong> = 97.778 %, <strong>Cost</strong> = 322.5 $. Almost closed: privacy on a short run.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Gap in feet.</strong> The form wants inches.</li><li><strong>Forgetting the closing picket.</strong> A run always takes one more.</li><li><strong>Bundles assumed to be single pickets.</strong> Check the pack size.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Pickets, Pitch (in), Closed share (%), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Run in feet, picket width and gap in inches, pitch and coverage as shown.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need fence length and picket width and gap between pickets and price per picket. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Pickets and pitch and closed share and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Fence length</strong> ×10</td><td>210</td><td>2 091</td><td>×9.957</td></tr><tr><td><strong>Picket width</strong> ×10</td><td>210</td><td>23</td><td>×0.11</td></tr><tr><td><strong>Gap between pickets</strong> ×10</td><td>210</td><td>151</td><td>×0.719</td></tr><tr><td><strong>Price per picket</strong> ×10</td><td>210</td><td>210</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Equal gaps.</strong> A rake or a slope changes the count.</li><li><strong>No rails or posts.</strong> The fence calculator covers those.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Setting out picket spacing.</li></li><li><li>Choosing between privacy and airflow.</li></li><li><li>Pricing a picket order.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/privacy-fence">Privacy fence</a> <a href="/construction/board-on-board-fence">Board on board fence</a> <a href="/construction/fence">Fence</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fence picket calculator work out?', 'a' => <<<'TXT'
            It returns pickets and pitch and closed share and cost from fence length and picket width and gap between pickets and price per picket. The relationship is ceil(Fence length × 12 ÷ (Picket width+Gap between pickets))+1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Fence length (ft), Picket width (in), Gap between pickets (in), Price per picket ($). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: fence length in ft; picket width in in; gap between pickets in in; price per picket in $. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I work out picket spacing?', 'a' => 'Divide the run in inches by the pitch you want — picket plus gap — then add the closing picket.'],
            ['q' => 'How many pickets for 100 feet?', 'a' => 'Two hundred and ten at five and a half inches with a quarter inch gap.'],
        ],
        'related' => [
            ['path' => '/construction/privacy-fence', 'name' => 'Privacy fence'],
            ['path' => '/construction/board-on-board-fence', 'name' => 'Board on board fence'],
            ['path' => '/construction/fence', 'name' => 'Fence'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
