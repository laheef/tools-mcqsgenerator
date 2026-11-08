<?php

/**
 * Sag
 * /construction/sag
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sag',
    'meta' => ['title' => 'Sag Calculator: Cable Deflection from Tension', 'description' => 'Estimate how far a cable or wire sags at mid-span from its span, weight and tension, with the sag as a share of the span. The formula and units are shown.', 'h1' => 'Sag', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'span',
                    'label' => 'Span',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '50',
                    'help' => 'Between supports',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'weight',
                    'label' => 'Weight',
                    'type' => 'number',
                    'suffix' => 'lb/ft',
                    'default' => '0.5',
                    'help' => 'Cable plus anything hung on it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'tension',
                    'label' => 'Tension',
                    'type' => 'number',
                    'suffix' => 'lb',
                    'default' => '300',
                    'help' => 'Pulling force in the cable',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sag',
                    'label' => 'Sag at mid-span',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'sag_pct',
                    'label' => 'Sag share of span',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'cable_length',
                    'label' => 'Cable length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Sag',
            'results' => [
                'sag' => 'weight*pow(span,2)/(8*tension)',
                'sag_pct' => 'weight*pow(span,2)/(8*tension)/span*100',
                'cable_length' => 'span+8*pow(weight*pow(span,2)/(8*tension),2)/(3*span)',
                'span' => 'sqrt(8*tension*sag/weight)',
                'weight' => '8*tension*sag/pow(span,2)',
                'tension' => 'weight*pow(span,2)/(8*sag)',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Sag = weight per foot × span² ÷ (8 × tension)</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Every strung cable sags, and the sag is not a defect — it is how the cable carries its own weight. Too little sag means the tension is high and the anchors are being pulled hard; too much means a low clearance or a cable that looks slack.</p><p>The page reports <strong>sag at mid-span and sag share of span and cable length</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Sag at mid-span</strong></td><td><code>Weight × (Span)^2 ÷ (8 × Tension)</code></td></tr><tr><td><strong>Sag share of span</strong></td><td><code>Weight × (Span)^2 ÷ (8 × Tension) ÷ Span × 100</code></td></tr><tr><td><strong>Cable length</strong></td><td><code>Span+8 × pow(Weight × (Span)^2 ÷ (8 × Tension),2) ÷ (3 × Span)</code></td></tr><tr><td><strong>Span</strong></td><td><code>√(8 × Tension × Sag at mid-span ÷ Weight)</code></td></tr><tr><td><strong>Weight</strong></td><td><code>8 × Tension × Sag at mid-span ÷ (Span)^2</code></td></tr><tr><td><strong>Tension</strong></td><td><code>Weight × (Span)^2 ÷ (8 × Sag at mid-span)</code></td></tr></tbody></table><p><p>For a cable under uniform weight the profile is close to a parabola, and the mid-span sag is the weight per foot times the span squared, divided by eight times the tension. The cable length adds a small correction for the sag itself, which is why a long span needs more cable than the distance between the posts.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports sag at mid-span and sag share of span and cable length.</p><ul><li><strong>Span</strong> — in ft. Between supports</li><li><strong>Weight</strong> — in lb/ft. Cable plus anything hung on it</li><li><strong>Tension</strong> — in lb. Pulling force in the cable</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Sag at mid-span</strong> — in ft</li><li><strong>Sag share of span</strong> — in %</li><li><strong>Cable length</strong> — in ft</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Span = 50 ft, Weight = 0.5 lb/ft, Tension = 300 lb — and the results panel reads:</p><ul><li><strong>Sag at mid-span</strong> = <code>Weight × (Span)^2 ÷ (8 × Tension)</code> = <strong>0.521 ft</strong></li><li><strong>Sag share of span</strong> = <code>Weight × (Span)^2 ÷ (8 × Tension) ÷ Span × 100</code> = <strong>1.042 %</strong></li><li><strong>Cable length</strong> = <code>Span+8 × pow(Weight × (Span)^2 ÷ (8 × Tension),2) ÷ (3 × Span)</code> = <strong>50.014 ft</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.5 × pow(50,2) ÷ (8 × 300) = 0.521</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 50 ft span of 0.5 lb/ft cable at 300 lb of tension sags 0.521 ft at mid-span, which is 1.042 of the span, and takes 50.014 ft of cable.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the sag share: under two per cent looks taut, five per cent looks like a cable, ten per cent looks slack. A share over ten means either the tension is low or the cable is heavy for the span.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Sag at mid-span</th><th>Sag share of span</th><th>Cable length</th></tr></thead><tbody><tr><td><strong>Span</strong> +10 %</td><td>+21 %</td><td>+10 %</td><td>+10.01 %</td></tr><tr><td><strong>Weight</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0.01 %</td></tr><tr><td><strong>Tension</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−0.01 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Span</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Tension</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Span = 30, Tension = 600, the page reports <strong>Sag at mid-span</strong> = 0.094 ft, <strong>Sag share of span</strong> = 0.312 %, <strong>Cable length</strong> = 30.001 ft. A shorter span at double the tension: a quarter of the sag.</li><li>With Weight = 1.2, Span = 80, the page reports <strong>Sag at mid-span</strong> = 3.2 ft, <strong>Sag share of span</strong> = 4 %, <strong>Cable length</strong> = 80.341 ft. A heavy cable on a long span: the sag grows with the square.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Tension entered as safe working load.</strong> Use the actual pull.</li><li><strong>Weight of the load left out.</strong> Add anything hung on the cable.</li><li><strong>Sag measured at the anchor.</strong> Mid-span is the maximum.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Sag at mid-span (ft), Sag share of span (%), Cable length (ft).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Span in feet, weight per foot in pounds, tension in pounds, sag in feet.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need span and weight and tension. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Sag at mid-span and sag share of span and cable length should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Span</strong> ×10</td><td>0.521</td><td>52.083</td><td>×100</td></tr><tr><td><strong>Weight</strong> ×10</td><td>0.521</td><td>5.208</td><td>ten times larger</td></tr><tr><td><strong>Tension</strong> ×10</td><td>0.521</td><td>0.052</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Uniform load.</strong> A point load mid-span behaves differently.</li><li><strong>Static only.</strong> Wind and ice add load.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking clearance under a wire.</li></li><li><li>Sizing tension for a string light run.</li></li><li><li>Estimating cable length.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/bolt-circle">Bolt circle</a> <a href="/construction/rolling-offset">Rolling offset</a> <a href="/construction/vertical-curve">Vertical curve</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sag calculator work out?', 'a' => 'It returns sag at mid-span and sag share of span and cable length from span and weight and tension. The relationship is Weight × (Span)^2 ÷ (8 × Tension).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Span (ft), Weight (lb/ft), Tension (lb). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: span in ft; weight in lb/ft; tension in lb. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much does a cable sag?', 'a' => 'Weight times span squared over eight times tension — the form does it for your numbers.'],
            ['q' => 'Does more tension reduce sag?', 'a' => 'Yes, directly: double the tension and the sag halves.'],
        ],
        'related' => [
            ['path' => '/construction/bolt-circle', 'name' => 'Bolt circle'],
            ['path' => '/construction/rolling-offset', 'name' => 'Rolling offset'],
            ['path' => '/construction/vertical-curve', 'name' => 'Vertical curve'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
