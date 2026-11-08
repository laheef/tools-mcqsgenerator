<?php

/**
 * Rafter length
 * /construction/rafter-length
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rafter length',
    'meta' => ['title' => 'Rafter Length Calculator: Run, Rise and Overhang', 'description' => 'Work out a common rafter\'s length from its run, rise and overhang, with the pitch, the roof angle and the slope multiplier beside it. with the overhang added.', 'h1' => 'Rafter length', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'run',
                    'label' => 'Run',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Half the span, wall to ridge line',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rise',
                    'label' => 'Rise',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '6',
                    'help' => 'Wall top to ridge',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'overhang',
                    'label' => 'Overhang',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '18',
                    'help' => 'Beyond the wall, along the slope',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rafter',
                    'label' => 'Rafter length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'pitch',
                    'label' => 'Pitch',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'x/12',
                ],
                [
                    'name' => 'angle',
                    'label' => 'Roof angle',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '°',
                ],
                [
                    'name' => 'multiplier',
                    'label' => 'Slope multiplier',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Rafter length',
            'results' => [
                'rafter' => 'sqrt(pow(run,2)+pow(rise,2))+overhang/12*sqrt(1+pow(rise/run,2))',
                'pitch' => 'rise/run*12',
                'angle' => 'atan(rise/run)*180/pi',
                'multiplier' => 'sqrt(pow(run,2)+pow(rise,2))/run',
                'overhang' => '(rafter-sqrt(pow(run,2)+pow(rise,2)))*12/sqrt(1+pow(rise/run,2))',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p>A rafter is the hypotenuse of its run and rise: <strong>rafter = √(run² + rise²)</strong>, plus the overhang measured along the same slope.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The rafter is the one length on a roof that is easy to get wrong and expensive to get wrong: too short and the fascia line is wrong, too long and the eaves are ragged. It is a right triangle with the overhang stuck on the end of the hypotenuse.</p><p>The page reports <strong>rafter length and pitch and roof angle and slope multiplier</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Rafter length</strong></td><td><code>√((Run)^2+(Rise)^2)+Overhang ÷ 12 × √(1+(Rise ÷ Run)^2)</code></td></tr><tr><td><strong>Pitch</strong></td><td><code>Rise ÷ Run × 12</code></td></tr><tr><td><strong>Roof angle</strong></td><td><code>atan(Rise ÷ Run) × 180 ÷ pi</code></td></tr><tr><td><strong>Slope multiplier</strong></td><td><code>√((Run)^2+(Rise)^2) ÷ Run</code></td></tr><tr><td><strong>Overhang</strong></td><td><code>(Rafter length-√((Run)^2+(Rise)^2)) × 12 ÷ √(1+(Rise ÷ Run)^2)</code></td></tr></tbody></table><p><p>The pitch as x/12 is the rise divided by the run, times twelve. The angle is the arctangent of the same ratio, and the slope multiplier is how much longer the rafter is than its horizontal run — the number that turns a plan area into a roof area.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports rafter length and pitch and roof angle and slope multiplier.</p><ul><li><strong>Run</strong> — in ft. Half the span, wall to ridge line</li><li><strong>Rise</strong> — in ft. Wall top to ridge</li><li><strong>Overhang</strong> — in in. Beyond the wall, along the slope</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Rafter length</strong> — in ft</li><li><strong>Pitch</strong> — in x/12</li><li><strong>Roof angle</strong> — in °</li><li><strong>Slope multiplier</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Run = 12 ft, Rise = 6 ft, Overhang = 18 in — and the results panel reads:</p><ul><li><strong>Rafter length</strong> = <code>√((Run)^2+(Rise)^2)+Overhang ÷ 12 × √(1+(Rise ÷ Run)^2)</code> = <strong>15.093 ft</strong></li><li><strong>Pitch</strong> = <code>Rise ÷ Run × 12</code> = <strong>6 x/12</strong></li><li><strong>Roof angle</strong> = <code>atan(Rise ÷ Run) × 180 ÷ pi</code> = <strong>26.565 °</strong></li><li><strong>Slope multiplier</strong> = <code>√((Run)^2+(Rise)^2) ÷ Run</code> = <strong>1.118</strong></li></ul><p>With the numbers written into the formula, the first result is <code>sqrt(pow(12,2)+pow(6,2))+18 ÷ 12 × sqrt(1+pow(6 ÷ 12,2)) = 15.093</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 12 ft run rising 6 ft is a 6/12 pitch at 26.6°, and the rafter is 13.42 ft before the overhang. Eighteen inches of overhang adds 1.68 ft along the slope, so the cut length is 15.1 ft.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the multiplier against the pitch: 1.00 is a flat roof, 1.12 at 6/12, 1.41 at 12/12. It is also the factor that converts a footprint area to a roof area, so the two boxes agree.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Rafter length</th><th>Pitch</th><th>Roof angle</th><th>Slope multiplier</th></tr></thead><tbody><tr><td><strong>Run</strong> +10 %</td><td>+6.98 %</td><td>−9.09 %</td><td>−7.98 %</td><td>−1.75 %</td></tr><tr><td><strong>Rise</strong> +10 %</td><td>+2.08 %</td><td>+10 %</td><td>+8.45 %</td><td>+2.08 %</td></tr><tr><td><strong>Overhang</strong> +10 %</td><td>+1.11 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Rise</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Overhang</strong>, at 1.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Run = 16, Rise = 16, Overhang = 12, the page reports <strong>Rafter length</strong> = 24.042 ft, <strong>Pitch</strong> = 12 x/12, <strong>Roof angle</strong> = 45 °, <strong>Slope multiplier</strong> = 1.414. A 12/12 roof — as steep as a walkable shingle roof gets, and a rafter 1.41 times its run.</li><li>With Run = 10, Rise = 2.5, Overhang = 24, the page reports <strong>Rafter length</strong> = 12.369 ft, <strong>Pitch</strong> = 3 x/12, <strong>Roof angle</strong> = 14.036 °, <strong>Slope multiplier</strong> = 1.031. A shallow porch roof, where the overhang is a larger share of the rafter than the rise is.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Run entered as the full span.</strong> The run is half the span, wall to ridge.</li><li><strong>Overhang measured horizontally.</strong> It is measured along the rafter, which is longer.</li><li><strong>Birdsmouth ignored.</strong> The seat cut removes a little length at the wall end.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Rafter length (ft), Pitch (x/12), Roof angle (°), Slope multiplier.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Run, rise and rafter in feet, the overhang in inches and the angle in degrees; the pitch is quoted as rise per 12 in the way carpenters say it.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need run and rise and overhang. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Rafter length and pitch and roof angle and slope multiplier should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Run</strong> ×10</td><td>15.093</td><td>121.652</td><td>×8.06</td></tr><tr><td><strong>Rise</strong> ×10</td><td>15.093</td><td>68.837</td><td>×4.561</td></tr><tr><td><strong>Overhang</strong> ×10</td><td>15.093</td><td>30.187</td><td>×2</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Common rafters.</strong> Hip and valley rafters have their own geometry.</li><li><strong>No ridge deduction.</strong> Subtract half the ridge thickness for the finished length.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Cutting common rafters.</li></li><li><li>Converting plan area to roof area.</li></li><li><li>Checking a pitch against a rise.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/roof-pitch">Roof pitch</a> <a href="/construction/roof-truss">Roof truss</a> <a href="/construction/birdsmouth-cut">Birdsmouth cut</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rafter length calculator work out?', 'a' => <<<'TXT'
            It returns rafter length and pitch and roof angle and slope multiplier from run and rise and overhang. The relationship is √((Run)^2+(Rise)^2)+Overhang ÷ 12 × √(1+(Rise ÷ Run)^2).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Run (ft), Rise (ft), Overhang (in). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: run in ft; rise in ft; overhang in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How long is a rafter for a 12 ft run at 6/12?', 'a' => '13.42 ft before the overhang, 15.1 ft with 18 in of eave.'],
            ['q' => 'What is the slope multiplier?', 'a' => 'The rafter length divided by its run — 1.118 at 6/12 — used to turn plan area into roof area.'],
        ],
        'related' => [
            ['path' => '/construction/roof-pitch', 'name' => 'Roof pitch'],
            ['path' => '/construction/roof-truss', 'name' => 'Roof truss'],
            ['path' => '/construction/birdsmouth-cut', 'name' => 'Birdsmouth cut'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
