<?php

/**
 * Roof pitch
 * /construction/roof-pitch
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Roof pitch',
    'meta' => ['title' => 'Roof Pitch Calculator: Rise per Run and Angle', 'description' => 'Convert between rise and run, the x/12 pitch, the roof angle in degrees and the slope multiplier that turns a plan area into roof area for estimating.', 'h1' => 'Roof pitch', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'rise',
                    'label' => 'Rise',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '6',
                    'help' => 'Vertical height of the roof',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'run',
                    'label' => 'Run',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Horizontal distance it rises over',
                    'rounding' => ['omni', '0.0001'],
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
                    'label' => 'Angle',
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
                [
                    'name' => 'rafter',
                    'label' => 'Rafter length',
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
            'title' => 'Roof pitch',
            'results' => [
                'pitch' => 'rise/run*12',
                'angle' => 'atan(rise/run)*180/pi',
                'multiplier' => 'sqrt(pow(rise,2)+pow(run,2))/run',
                'rafter' => 'sqrt(pow(rise,2)+pow(run,2))',
                'rise' => 'run*pitch/12',
                'run' => 'rise*12/pitch',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p>Roof pitch is rise over run, quoted as rise per twelve: <strong>pitch = rise ÷ run × 12</strong>, and the angle is <strong>atan(rise ÷ run)</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Pitch is the number a roof is described by, and three trades use three different versions of it: the roofer says 6/12, the engineer says 26.6 degrees, and the estimator uses the 1.118 multiplier to turn plan area into roofing. This page is the conversion between all three.</p><p>The page reports <strong>pitch and angle and slope multiplier and rafter length</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Pitch</strong></td><td><code>Rise ÷ Run × 12</code></td></tr><tr><td><strong>Angle</strong></td><td><code>atan(Rise ÷ Run) × 180 ÷ pi</code></td></tr><tr><td><strong>Slope multiplier</strong></td><td><code>√((Rise)^2+(Run)^2) ÷ Run</code></td></tr><tr><td><strong>Rafter length</strong></td><td><code>√((Rise)^2+(Run)^2)</code></td></tr><tr><td><strong>Rise</strong></td><td><code>Run × Pitch ÷ 12</code></td></tr><tr><td><strong>Run</strong></td><td><code>Rise × 12 ÷ Pitch</code></td></tr></tbody></table><p><p>The tangent of the roof angle is the rise over the run, so the angle is the arctangent of the same ratio that gives the pitch. The multiplier is the rafter divided by the run — the hypotenuse of the unit right triangle.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports pitch and angle and slope multiplier and rafter length.</p><ul><li><strong>Rise</strong> — in ft. Vertical height of the roof</li><li><strong>Run</strong> — in ft. Horizontal distance it rises over</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Pitch</strong> — in x/12</li><li><strong>Angle</strong> — in °</li><li><strong>Slope multiplier</strong></li><li><strong>Rafter length</strong> — in ft</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Rise = 6 ft, Run = 12 ft — and the results panel reads:</p><ul><li><strong>Pitch</strong> = <code>Rise ÷ Run × 12</code> = <strong>6 x/12</strong></li><li><strong>Angle</strong> = <code>atan(Rise ÷ Run) × 180 ÷ pi</code> = <strong>26.565 °</strong></li><li><strong>Slope multiplier</strong> = <code>√((Rise)^2+(Run)^2) ÷ Run</code> = <strong>1.118</strong></li><li><strong>Rafter length</strong> = <code>√((Rise)^2+(Run)^2)</code> = <strong>13.416 ft</strong></li></ul><p>With the numbers written into the formula, the first result is <code>6 ÷ 12 × 12 = 6</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 6 ft rise over a 12 ft run is a 6/12 pitch, 26.57°, with a multiplier of 1.118 — so 1 200 ft² of plan becomes 1 342 ft² of roofing. The rafter itself is 13.42 ft.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the pitch against the roofing material: below 2/12 most shingles are out, below 4/12 they need a double underlayment, and above 8/12 the roof is not safely walkable. The multiplier tells you how much more material the steepness costs.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Pitch</th><th>Angle</th><th>Slope multiplier</th><th>Rafter length</th></tr></thead><tbody><tr><td><strong>Rise</strong> +10 %</td><td>+10 %</td><td>+8.45 %</td><td>+2.08 %</td><td>+2.08 %</td></tr><tr><td><strong>Run</strong> +10 %</td><td>−9.09 %</td><td>−7.98 %</td><td>−1.75 %</td><td>+8.07 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Rise</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Run</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Rise = 4, Run = 12, the page reports <strong>Pitch</strong> = 4 x/12, <strong>Angle</strong> = 18.435 °, <strong>Slope multiplier</strong> = 1.054, <strong>Rafter length</strong> = 12.649 ft. A 4/12 roof — the shallow end of normal shingle work, at 18.4°.</li><li>With Rise = 12, Run = 12, the page reports <strong>Pitch</strong> = 12 x/12, <strong>Angle</strong> = 45 °, <strong>Slope multiplier</strong> = 1.414, <strong>Rafter length</strong> = 16.971 ft. A 12/12 roof at 45°, where the multiplier costs more than a third extra material.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Pitch quoted as a percentage.</strong> A 50 per cent slope is 6/12, not 50/12.</li><li><strong>Run taken as the full span.</strong> The run is half the building width on a gable.</li><li><strong>Angle and pitch confused in a table.</strong> 6/12 is not 6 degrees.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Pitch (x/12), Angle (°), Slope multiplier, Rafter length (ft).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Rise and run in feet, the pitch as inches of rise per 12 in of run, the angle in degrees and the multiplier as a plain factor.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need rise and run. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Pitch and angle and slope multiplier and rafter length should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Rise</strong> ×10</td><td>6</td><td>60</td><td>ten times larger</td></tr><tr><td><strong>Run</strong> ×10</td><td>6</td><td>0.6</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A straight slope.</strong> A curved or gambrel roof has a pitch per section.</li><li><strong>Geometry only.</strong> Minimum pitch for a material is its own rule.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Converting a pitch to an angle.</li></li><li><li>Working out roof area from plan area.</li></li><li><li>Checking a pitch against a material's minimum.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/rafter-length">Rafter length</a> <a href="/construction/roof-shingle">Roof shingle</a> <a href="/construction/roof-truss">Roof truss</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Roof pitch calculator work out?', 'a' => 'It returns pitch and angle and slope multiplier and rafter length from rise and run. The relationship is Rise ÷ Run × 12.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Rise (ft), Run (ft). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: rise in ft; run in ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What angle is a 6/12 pitch?', 'a' => '26.57 degrees — the arctangent of 0.5.'],
            ['q' => 'How do I convert plan area to roof area?', 'a' => 'Multiply by the slope multiplier: 1.118 at 6/12, 1.25 at 9/12, 1.414 at 12/12.'],
        ],
        'related' => [
            ['path' => '/construction/rafter-length', 'name' => 'Rafter length'],
            ['path' => '/construction/roof-shingle', 'name' => 'Roof shingle'],
            ['path' => '/construction/roof-truss', 'name' => 'Roof truss'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
