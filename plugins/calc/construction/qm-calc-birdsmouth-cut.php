<?php

/**
 * Birdsmouth cut
 * /construction/birdsmouth-cut
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Birdsmouth cut',
    'meta' => ['title' => 'Birdsmouth Cut Calculator: Notch Depth and Seat', 'description' => 'Work out the birdsmouth a rafter needs at the wall plate from the pitch and the seat cut, and check the notch against the quarter-depth rule. in one cut.', 'h1' => 'Birdsmouth cut', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'pitch',
                    'label' => 'Roof pitch',
                    'type' => 'number',
                    'suffix' => 'x/12',
                    'default' => '6',
                    'help' => 'Rise per 12 of run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'seat_cut',
                    'label' => 'Seat cut length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '3.5',
                    'help' => 'Along the plate — usually the plate width',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rafter_depth',
                    'label' => 'Rafter depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '9.25',
                    'help' => 'Actual depth of the rafter',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'roof_angle',
                    'label' => 'Roof angle',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '°',
                ],
                [
                    'name' => 'notch_depth',
                    'label' => 'Notch depth',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'notch_limit',
                    'label' => 'Quarter-depth limit',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'remaining_depth',
                    'label' => 'Rafter left below the notch',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Birdsmouth cut',
            'results' => [
                'roof_angle' => 'atan(pitch/12)*180/pi',
                'notch_depth' => 'seat_cut*pitch/12',
                'notch_limit' => 'rafter_depth/4',
                'remaining_depth' => 'rafter_depth-seat_cut*pitch/12',
                'pitch' => 'notch_depth*12/seat_cut',
                'seat_cut' => 'notch_depth*12/pitch',
                'rafter_depth' => 'notch_limit*4',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The birdsmouth is a seat cut along the plate and a plumb cut up the rafter. At a roof angle θ, <strong>notch depth = seat cut × tan θ</strong>, and the rule is to keep it inside a quarter of the rafter's depth.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The birdsmouth is where a rafter meets the wall, and it is also where rafters get weakened. Cut too deep and the remaining timber carries the whole roof on a thin strip; cut too shallow and the rafter sits proud of the plate. The quarter-depth rule is the trade's answer.</p><p>The page reports <strong>roof angle and notch depth and quarter-depth limit and rafter left below the notch</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Roof angle</strong></td><td><code>atan(Roof pitch ÷ 12) × 180 ÷ pi</code></td></tr><tr><td><strong>Notch depth</strong></td><td><code>Seat cut length × Roof pitch ÷ 12</code></td></tr><tr><td><strong>Quarter-depth limit</strong></td><td><code>Rafter depth ÷ 4</code></td></tr><tr><td><strong>Rafter left below the notch</strong></td><td><code>Rafter depth-Seat cut length × Roof pitch ÷ 12</code></td></tr><tr><td><strong>Roof pitch</strong></td><td><code>Notch depth × 12 ÷ Seat cut length</code></td></tr><tr><td><strong>Seat cut length</strong></td><td><code>Notch depth × 12 ÷ Roof pitch</code></td></tr><tr><td><strong>Rafter depth</strong></td><td><code>Quarter-depth limit × 4</code></td></tr></tbody></table><p><p>The seat cut is horizontal and the plumb cut vertical, so the notch is a right triangle with the roof's own angle at the top. The tangent of that angle is the pitch over twelve, which is why the arithmetic is one multiplication.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports roof angle and notch depth and quarter-depth limit and rafter left below the notch.</p><ul><li><strong>Roof pitch</strong> — in x/12. Rise per 12 of run</li><li><strong>Seat cut length</strong> — in in. Along the plate — usually the plate width</li><li><strong>Rafter depth</strong> — in in. Actual depth of the rafter</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Roof angle</strong> — in °</li><li><strong>Notch depth</strong> — in in</li><li><strong>Quarter-depth limit</strong> — in in</li><li><strong>Rafter left below the notch</strong> — in in</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Roof pitch = 6 x/12, Seat cut length = 3.5 in, Rafter depth = 9.25 in — and the results panel reads:</p><ul><li><strong>Roof angle</strong> = <code>atan(Roof pitch ÷ 12) × 180 ÷ pi</code> = <strong>26.565 °</strong></li><li><strong>Notch depth</strong> = <code>Seat cut length × Roof pitch ÷ 12</code> = <strong>1.75 in</strong></li><li><strong>Quarter-depth limit</strong> = <code>Rafter depth ÷ 4</code> = <strong>2.312 in</strong></li><li><strong>Rafter left below the notch</strong> = <code>Rafter depth-Seat cut length × Roof pitch ÷ 12</code> = <strong>7.5 in</strong></li></ul><p>With the numbers written into the formula, the first result is <code>atan(6 ÷ 12) × 180 ÷ pi = 26.565</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 6/12 roof at 26.6° with a 3½ in seat cut: tan 26.6° is 0.5, so the notch is 1.75 in deep. On a 2 × 10 that leaves 7.5 in of timber — comfortably inside the 2.31 in quarter-depth limit.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the notch against the limit: when the notch depth passes a quarter of the rafter, the answer is a deeper rafter or a shorter seat cut, not a smaller birdsmouth. Steep roofs reach the limit at a much shorter seat than shallow ones.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Roof angle</th><th>Notch depth</th><th>Quarter-depth limit</th><th>Rafter left below the notch</th></tr></thead><tbody><tr><td><strong>Roof pitch</strong> +10 %</td><td>+8.45 %</td><td>+10 %</td><td>+0 %</td><td>−2.33 %</td></tr><tr><td><strong>Seat cut length</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>−2.33 %</td></tr><tr><td><strong>Rafter depth</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+12.33 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Rafter depth</strong>: a ten per cent move there shifts the result by about 12.3 per cent. The least sensitive is <strong>Seat cut length</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Roof pitch = 12, Seat cut length = 3.5, Rafter depth = 7.25, the page reports <strong>Roof angle</strong> = 45 °, <strong>Notch depth</strong> = 3.5 in, <strong>Quarter-depth limit</strong> = 1.812 in, <strong>Rafter left below the notch</strong> = 3.75 in. A 12/12 roof: the notch takes half the seat cut in depth, which is why chunky rafters are specified on steep pitches.</li><li>With Roof pitch = 3, Seat cut length = 5.5, Rafter depth = 5.5, the page reports <strong>Roof angle</strong> = 14.036 °, <strong>Notch depth</strong> = 1.375 in, <strong>Quarter-depth limit</strong> = 1.375 in, <strong>Rafter left below the notch</strong> = 4.125 in. A shallow roof over a 2 × 6 plate: a long seat and a shallow notch.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Seat cut taken as the rafter width.</strong> It follows the plate, and a 2 × 6 plate wants a deeper seat than a 2 × 4.</li><li><strong>The plumb cut forgotten.</strong> The birdsmouth is two cuts; the depth here is the vertical one.</li><li><strong>Notch measured from the wrong face.</strong> Depth comes off the top edge, which is the tension side on a simple span.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Roof angle (°), Notch depth (in), Quarter-depth limit (in), Rafter left below the notch (in).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Pitch as rise per 12, seat and depth in inches, the angle in degrees — and the limit is a quarter of the rafter's depth in the same inches.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need roof pitch and seat cut length and rafter depth. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Roof angle and notch depth and quarter-depth limit and rafter left below the notch should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Roof pitch</strong> ×10</td><td>26.565</td><td>78.69</td><td>×2.962</td></tr><tr><td><strong>Seat cut length</strong> ×10</td><td>26.565</td><td>26.565</td><td>unchanged</td></tr><tr><td><strong>Rafter depth</strong> ×10</td><td>26.565</td><td>26.565</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Rule of thumb.</strong> Engineered rafters have their own notching limits.</li><li><strong>One cut.</strong> The tail end and any splice are separate cuts.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Laying out a birdsmouth before cutting.</li></li><li><li>Checking a steep pitch against the rafter depth.</li></li><li><li>Teaching the quarter-depth rule.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/rafter-length">Rafter length</a> <a href="/construction/roof-pitch">Roof pitch</a> <a href="/construction/roof-truss">Roof truss</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Birdsmouth cut calculator work out?', 'a' => <<<'TXT'
            It returns roof angle and notch depth and quarter-depth limit and rafter left below the notch from roof pitch and seat cut length and rafter depth. The relationship is atan(Roof pitch ÷ 12) × 180 ÷ pi.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Roof pitch (x/12), Seat cut length (in), Rafter depth (in). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: roof pitch in x/12; seat cut length in in; rafter depth in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How deep should a birdsmouth be?', 'a' => 'No more than a quarter of the rafter\'s depth — 2.31 in on a 2 × 10, 1.8 in on a 2 × 8.'],
            ['q' => 'What angle is a birdsmouth cut at?', 'a' => 'The seat is level and the plumb cut is vertical, so the notch angle is the roof\'s own pitch angle.'],
        ],
        'related' => [
            ['path' => '/construction/rafter-length', 'name' => 'Rafter length'],
            ['path' => '/construction/roof-pitch', 'name' => 'Roof pitch'],
            ['path' => '/construction/roof-truss', 'name' => 'Roof truss'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
