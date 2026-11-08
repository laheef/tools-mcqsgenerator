<?php

/**
 * Stairs
 * /construction/stairs
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Stairs',
    'meta' => ['title' => 'Stairs Calculator: Risers, Run and Stringer', 'description' => 'Work out the risers, the actual riser height, the total run, the stringer length and the stair angle for a flight, from the floor-to-floor rise. in one go.', 'h1' => 'Stairs', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'total_rise',
                    'label' => 'Floor-to-floor rise',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '108',
                    'help' => 'Finished floor to finished floor',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'riser',
                    'label' => 'Maximum riser height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '7.5',
                    'help' => '7¾ is the usual code maximum',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'tread',
                    'label' => 'Tread depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '10',
                    'help' => '10 in minimum, 11 more comfortable',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Stair width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '3.5',
                    'help' => 'Clear width for the calculation of the stringer',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'risers',
                    'label' => 'Risers',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'riser_actual',
                    'label' => 'Actual riser height',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'total_run',
                    'label' => 'Total run',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'stringer',
                    'label' => 'Stringer length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'angle',
                    'label' => 'Stair angle',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '°',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Stairs',
            'results' => [
                'risers' => 'ceil(total_rise/riser)',
                'riser_actual' => 'total_rise/ceil(total_rise/riser)',
                'total_run' => '(ceil(total_rise/riser)-1)*tread/12',
                'stringer' => 'sqrt(pow((ceil(total_rise/riser)-1)*tread/12,2)+pow(total_rise/12,2))',
                'angle' => 'atan(total_rise/((ceil(total_rise/riser)-1)*tread))*180/pi',
                'tread' => 'total_run*12/(ceil(total_rise/riser)-1)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Stairs are set out from the total rise: <strong>risers = total rise ÷ riser height</strong>, rounded up, and <strong>run = (risers − 1) × tread depth</strong> because the top step is the floor.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A stair is the one part of a house where the numbers are not allowed to drift: every riser in a flight has to be within ⅜ in of the others, or the stair becomes a trip hazard. The calculation starts from the total rise, because that is the only dimension that is truly fixed.</p><p>The page reports <strong>risers and actual riser height and total run and stringer length and stair angle</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Risers</strong></td><td><code>ceil(Floor-to-floor rise ÷ Maximum riser height)</code></td></tr><tr><td><strong>Actual riser height</strong></td><td><code>Floor-to-floor rise ÷ ceil(Floor-to-floor rise ÷ Maximum riser height)</code></td></tr><tr><td><strong>Total run</strong></td><td><code>(ceil(Floor-to-floor rise ÷ Maximum riser height)-1) × Tread depth ÷ 12</code></td></tr><tr><td><strong>Stringer length</strong></td><td><code>√(pow((ceil(Floor-to-floor rise ÷ Maximum riser height)-1) × Tread depth ÷ 12,2)+(Floor-to-floor rise ÷ 12)^2)</code></td></tr><tr><td><strong>Stair angle</strong></td><td><code>atan(Floor-to-floor rise ÷ ((ceil(Floor-to-floor rise ÷ Maximum riser height)-1) × Tread depth)) × 180 ÷ pi</code></td></tr><tr><td><strong>Tread depth</strong></td><td><code>Total run × 12 ÷ (ceil(Floor-to-floor rise ÷ Maximum riser height)-1)</code></td></tr></tbody></table><p><p>Dividing the total rise by the maximum riser gives a number of risers that is almost never whole, so it is rounded up and the riser height is recalculated from it — that is the actual riser the stair will have. The run counts one fewer tread, because the top riser lands on the floor.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports risers and actual riser height and total run and stringer length and stair angle.</p><ul><li><strong>Floor-to-floor rise</strong> — in in. Finished floor to finished floor</li><li><strong>Maximum riser height</strong> — in in. 7¾ is the usual code maximum</li><li><strong>Tread depth</strong> — in in. 10 in minimum, 11 more comfortable</li><li><strong>Stair width</strong> — in ft. Clear width for the calculation of the stringer</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Risers</strong></li><li><strong>Actual riser height</strong> — in in</li><li><strong>Total run</strong> — in ft</li><li><strong>Stringer length</strong> — in ft</li><li><strong>Stair angle</strong> — in °</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Floor-to-floor rise = 108 in, Maximum riser height = 7.5 in, Tread depth = 10 in, Stair width = 3.5 ft — and the results panel reads:</p><ul><li><strong>Risers</strong> = <code>ceil(Floor-to-floor rise ÷ Maximum riser height)</code> = <strong>15</strong></li><li><strong>Actual riser height</strong> = <code>Floor-to-floor rise ÷ ceil(Floor-to-floor rise ÷ Maximum riser height)</code> = <strong>7.2 in</strong></li><li><strong>Total run</strong> = <code>(ceil(Floor-to-floor rise ÷ Maximum riser height)-1) × Tread depth ÷ 12</code> = <strong>11.667 ft</strong></li><li><strong>Stringer length</strong> = <code>√(pow((ceil(Floor-to-floor rise ÷ Maximum riser height)-1) × Tread depth ÷ 12,2)+(Floor-to-floor rise ÷ 12)^2)</code> = <strong>14.735 ft</strong></li><li><strong>Stair angle</strong> = <code>atan(Floor-to-floor rise ÷ ((ceil(Floor-to-floor rise ÷ Maximum riser height)-1) × Tread depth)) × 180 ÷ pi</code> = <strong>37.648 °</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil(108 ÷ 7.5) = 15</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 108 in floor-to-floor rise with a 7½ in maximum: 14.4 rounds to 15 risers, so each is 7.2 in. Fourteen treads at 10 in make a 11.67 ft run, and the stringer along the slope is 14.7 ft.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the actual riser against the code: 4 to 7¾ in, all equal. The angle is a useful cross-check too — domestic stairs land between 30 and 38 degrees, and anything outside that is either a ships ladder or uncomfortably shallow.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Risers</th><th>Actual riser height</th><th>Total run</th><th>Stringer length</th><th>Stair angle</th></tr></thead><tbody><tr><td><strong>Floor-to-floor rise</strong> +10 %</td><td>+6.67 %</td><td>+3.13 %</td><td>+7.14 %</td><td>+8.22 %</td><td>+1.94 %</td></tr><tr><td><strong>Maximum riser height</strong> +10 %</td><td>−6.67 %</td><td>+7.14 %</td><td>−7.14 %</td><td>−4.42 %</td><td>+5.5 %</td></tr><tr><td><strong>Tread depth</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+6.38 %</td><td>−6.92 %</td></tr><tr><td><strong>Stair width</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Tread depth</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Stair width</strong>, at 0 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Floor-to-floor rise = 96, Maximum riser height = 7.5, Tread depth = 11, Stair width = 3, the page reports <strong>Risers</strong> = 13, <strong>Actual riser height</strong> = 7.385 in, <strong>Total run</strong> = 11 ft, <strong>Stringer length</strong> = 13.601 ft, <strong>Stair angle</strong> = 36.027 °. A basement stair with a shorter rise and a deeper tread — a gentler flight.</li><li>With Floor-to-floor rise = 120, Maximum riser height = 7.75, Tread depth = 10, Stair width = 4, the page reports <strong>Risers</strong> = 16, <strong>Actual riser height</strong> = 7.5 in, <strong>Total run</strong> = 12.5 ft, <strong>Stringer length</strong> = 16.008 ft, <strong>Stair angle</strong> = 38.66 °. A full storey at the code maximum riser: the flight that just fits in the plan.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Rise measured to the subfloor.</strong> It is finished floor to finished floor, including the flooring above and below.</li><li><strong>Riser height left as the maximum.</strong> The actual riser is the total rise divided by the number of risers.</li><li><strong>Treads counted equal to risers.</strong> The top riser lands on the floor, so there is one fewer tread.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Risers, Actual riser height (in), Total run (ft), Stringer length (ft), Stair angle (°).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Rise and tread in inches, width in feet, the run and stringer in feet and the stair angle in degrees.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need floor-to-floor rise and maximum riser height and tread depth and stair width. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Risers and actual riser height and total run and stringer length and stair angle should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Floor-to-floor rise</strong> ×10</td><td>15</td><td>144</td><td>×9.6</td></tr><tr><td><strong>Maximum riser height</strong> ×10</td><td>15</td><td>2</td><td>×0.133</td></tr><tr><td><strong>Tread depth</strong> ×10</td><td>15</td><td>15</td><td>unchanged</td></tr><tr><td><strong>Stair width</strong> ×10</td><td>15</td><td>15</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A straight flight.</strong> Winders, landings and spirals are set out differently.</li><li><strong>Headroom not checked.</strong> The opening above the stair is a separate calculation.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Laying out a stair before cutting stringers.</li></li><li><li>Checking a rise against the code.</li></li><li><li>Sizing a stairwell opening.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/concrete-stairs">Concrete stairs</a> <a href="/construction/spiral-staircase">Spiral staircase</a> <a href="/construction/ramp-slope">Ramp slope</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Stairs calculator work out?', 'a' => <<<'TXT'
            It returns risers and actual riser height and total run and stringer length and stair angle from floor-to-floor rise and maximum riser height and tread depth and stair width. The relationship is ceil(Floor-to-floor rise ÷ Maximum riser height).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Floor-to-floor rise (in), Maximum riser height (in), Tread depth (in), Stair width (ft). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: floor-to-floor rise in in; maximum riser height in in; tread depth in in; stair width in ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do you calculate the number of risers?', 'a' => 'Divide the total rise by the maximum riser height and round up; then divide again to get the actual riser.'],
            ['q' => 'How many treads for 15 risers?', 'a' => 'Fourteen — the top riser lands on the upper floor.'],
        ],
        'related' => [
            ['path' => '/construction/concrete-stairs', 'name' => 'Concrete stairs'],
            ['path' => '/construction/spiral-staircase', 'name' => 'Spiral staircase'],
            ['path' => '/construction/ramp-slope', 'name' => 'Ramp slope'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
