<?php

/**
 * Vertical curve
 * /construction/vertical-curve
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Vertical curve',
    'meta' => ['title' => 'Vertical Curve Calculator: K Value and Offset', 'description' => 'Work out the rate of change, the K value and the turning point of a vertical curve from its two grades and its length, in road or site work. Units shown.', 'h1' => 'Vertical curve', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'g1',
                    'label' => 'Entry grade',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '2',
                    'help' => 'Grade before the curve',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'g2',
                    'label' => 'Exit grade',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '-3',
                    'help' => 'Grade after it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'length',
                    'label' => 'Curve length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '500',
                    'help' => 'Along the profile',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'a_rate',
                    'label' => 'Rate of change',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'k_value',
                    'label' => 'K value',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft/%',
                ],
                [
                    'name' => 'turning_station',
                    'label' => 'Turning point',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'mid_offset',
                    'label' => 'Mid-curve offset',
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
            'title' => 'Vertical curve',
            'results' => [
                'a_rate' => 'g2-g1',
                'k_value' => 'length/abs(g2-g1)',
                'turning_station' => 'abs(g1)*length/abs(g2-g1)',
                'mid_offset' => 'abs(g2-g1)*length/800',
                'length' => 'k_value*abs(g2-g1)',
                'g1' => 'g2-a_rate',
                'g2' => 'g1+a_rate',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p><strong>A = g₂ − g₁</strong>, <strong>K = length ÷ |A|</strong>, and the turning point sits where <strong>g₁ ÷ |A|</strong> of the curve has run.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Roads and site roads change grade along a vertical curve rather than at a sharp break, because a vehicle at speed cannot follow a kink. The K value is the one number highway agencies publish: it says how much length buys one per cent of grade change.</p><p>The page reports <strong>rate of change and k value and turning point and mid-curve offset</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Rate of change</strong></td><td><code>Exit grade-Entry grade</code></td></tr><tr><td><strong>K value</strong></td><td><code>Curve length ÷ abs(Exit grade-Entry grade)</code></td></tr><tr><td><strong>Turning point</strong></td><td><code>abs(Entry grade) × Curve length ÷ abs(Exit grade-Entry grade)</code></td></tr><tr><td><strong>Mid-curve offset</strong></td><td><code>abs(Exit grade-Entry grade) × Curve length ÷ 800</code></td></tr><tr><td><strong>Curve length</strong></td><td><code>K value × abs(Exit grade-Entry grade)</code></td></tr><tr><td><strong>Entry grade</strong></td><td><code>Exit grade-Rate of change</code></td></tr><tr><td><strong>Exit grade</strong></td><td><code>Entry grade+Rate of change</code></td></tr></tbody></table><p><p>The algebraic difference of the two grades is the total change, and dividing the curve length by that change gives the K value in feet per per cent. The turning point — the crest or the sag — sits where the entry grade has been worked off, which is the entry grade divided by the total change.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports rate of change and k value and turning point and mid-curve offset.</p><ul><li><strong>Entry grade</strong> — in %. Grade before the curve</li><li><strong>Exit grade</strong> — in %. Grade after it</li><li><strong>Curve length</strong> — in ft. Along the profile</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Rate of change</strong> — in %</li><li><strong>K value</strong> — in ft/%</li><li><strong>Turning point</strong> — in ft</li><li><strong>Mid-curve offset</strong> — in ft</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Entry grade = 2 %, Exit grade = -3 %, Curve length = 500 ft — and the results panel reads:</p><ul><li><strong>Rate of change</strong> = <code>Exit grade-Entry grade</code> = <strong>-5 %</strong></li><li><strong>K value</strong> = <code>Curve length ÷ abs(Exit grade-Entry grade)</code> = <strong>100 ft/%</strong></li><li><strong>Turning point</strong> = <code>abs(Entry grade) × Curve length ÷ abs(Exit grade-Entry grade)</code> = <strong>200 ft</strong></li><li><strong>Mid-curve offset</strong> = <code>abs(Exit grade-Entry grade) × Curve length ÷ 800</code> = <strong>3.125 ft</strong></li></ul><p>With the numbers written into the formula, the first result is <code>-3-2 = -5</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A curve from 2 % to -3 % over 500 ft changes by -5 %, so K is 100 ft/%. The turning point is 200 ft into the curve and the mid-curve offset is 3.125 ft.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read K against the length: a small K on a big grade change is a tight curve that will be uncomfortable at speed. On a driveway a K under thirty is usually fine; on a public road the minimum is set by design speed.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Rate of change</th><th>K value</th><th>Turning point</th><th>Mid-curve offset</th></tr></thead><tbody><tr><td><strong>Entry grade</strong> +10 %</td><td>−4 %</td><td>−3.85 %</td><td>+5.77 %</td><td>+4 %</td></tr><tr><td><strong>Exit grade</strong> +10 %</td><td>−6 %</td><td>−5.66 %</td><td>−5.66 %</td><td>+6 %</td></tr><tr><td><strong>Curve length</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Curve length</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Entry grade</strong>, at 5.8 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Entry grade = 4, Exit grade = 4, the page reports <strong>Rate of change</strong> = 0 %, <strong>Mid-curve offset</strong> = 0 ft. Equal grades: no curve at all, and K is undefined.</li><li>With Entry grade = -2, Exit grade = 5, Curve length = 300, the page reports <strong>Rate of change</strong> = 7 %, <strong>K value</strong> = 42.857 ft/%, <strong>Turning point</strong> = 85.714 ft, <strong>Mid-curve offset</strong> = 2.625 ft. A sag curve over a shorter length: a sharper K.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Grades in feet per foot.</strong> The form takes per cent.</li><li><strong>Sign dropped.</strong> A falling grade is negative.</li><li><strong>Offset read as a height.</strong> It is the vertical distance from the tangent.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Rate of change (%), K value (ft/%), Turning point (ft), Mid-curve offset (ft).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Grades in per cent, length and station in feet, K in feet per per cent.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need entry grade and exit grade and curve length. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Rate of change and k value and turning point and mid-curve offset should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Entry grade</strong> ×10</td><td>-5</td><td>-23</td><td>×4.6</td></tr><tr><td><strong>Exit grade</strong> ×10</td><td>-5</td><td>-32</td><td>×6.4</td></tr><tr><td><strong>Curve length</strong> ×10</td><td>-5</td><td>-5</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Parabolic curve.</strong> Other profiles have other offsets.</li><li><strong>No sight distance.</strong> Stopping sight is a separate check.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Laying out a site road.</li></li><li><li>Checking a crest for drainage.</li></li><li><li>Setting out levels on a long drive.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/elevation-grade">Elevation grade</a> <a href="/construction/ramp-slope">Ramp slope</a> <a href="/construction/angle-of-depression">Angle of depression</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Vertical curve calculator work out?', 'a' => <<<'TXT'
            It returns rate of change and k value and turning point and mid-curve offset from entry grade and exit grade and curve length. The relationship is Exit grade-Entry grade.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Entry grade (%), Exit grade (%), Curve length (ft). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: entry grade in %; exit grade in %; curve length in ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is a K value in a vertical curve?', 'a' => 'The length of curve for each one per cent change of grade.'],
            ['q' => 'Where is the high point of a vertical curve?', 'a' => 'Where the grade passes through zero — the entry grade divided by the total change along the curve.'],
        ],
        'related' => [
            ['path' => '/construction/elevation-grade', 'name' => 'Elevation grade'],
            ['path' => '/construction/ramp-slope', 'name' => 'Ramp slope'],
            ['path' => '/construction/angle-of-depression', 'name' => 'Angle of depression'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
