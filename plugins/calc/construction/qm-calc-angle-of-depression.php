<?php

/**
 * Angle of depression
 * /construction/angle-of-depression
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Angle of depression',
    'meta' => ['title' => 'Angle of Depression Calculator: Sight Line and Slope', 'description' => 'Find the angle of depression from a height and a horizontal distance, with the straight line of sight and the same slope as a percentage. Units shown.', 'h1' => 'Angle of depression', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'height',
                    'label' => 'Height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '20',
                    'help' => 'Eye or instrument above the target',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'distance',
                    'label' => 'Horizontal distance',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '50',
                    'help' => 'Level distance to the target',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'angle',
                    'label' => 'Angle of depression',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '°',
                ],
                [
                    'name' => 'slope_pct',
                    'label' => 'Slope',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'line_of_sight',
                    'label' => 'Line of sight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'horizon_ratio',
                    'label' => 'Drop per 100 ft',
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
            'title' => 'Angle of depression',
            'results' => [
                'angle' => 'atan(height/distance)*180/pi',
                'slope_pct' => 'height/distance*100',
                'line_of_sight' => 'sqrt(pow(height,2)+pow(distance,2))',
                'horizon_ratio' => 'height/distance*100',
                'distance' => 'height/tan(angle*pi/180)',
                'height' => 'distance*tan(angle*pi/180)',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Angle = arctan(height ÷ distance)</strong>, measured down from the horizontal.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The angle of depression is what a surveyor, a drone pilot or a roofer measures when looking down at something: the angle between the horizontal and the line of sight. It is the mirror image of the angle of elevation and uses exactly the same triangle.</p><p>The page reports <strong>angle of depression and slope and line of sight and drop per 100 ft</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Angle of depression</strong></td><td><code>atan(Height ÷ Horizontal distance) × 180 ÷ pi</code></td></tr><tr><td><strong>Slope</strong></td><td><code>Height ÷ Horizontal distance × 100</code></td></tr><tr><td><strong>Line of sight</strong></td><td><code>√((Height)^2+(Horizontal distance)^2)</code></td></tr><tr><td><strong>Drop per 100 ft</strong></td><td><code>Height ÷ Horizontal distance × 100</code></td></tr><tr><td><strong>Horizontal distance</strong></td><td><code>Height ÷ tan(Angle of depression × pi ÷ 180)</code></td></tr><tr><td><strong>Height</strong></td><td><code>Horizontal distance × tan(Angle of depression × pi ÷ 180)</code></td></tr></tbody></table><p><p>Height over horizontal distance is the tangent of the angle, so the inverse tangent gives the answer. The line of sight is the hypotenuse, and the slope in per cent is the same ratio times a hundred, which is why a twenty per cent slope and an eleven degree depression describe the same line.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports angle of depression and slope and line of sight and drop per 100 ft.</p><ul><li><strong>Height</strong> — in ft. Eye or instrument above the target</li><li><strong>Horizontal distance</strong> — in ft. Level distance to the target</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Angle of depression</strong> — in °</li><li><strong>Slope</strong> — in %</li><li><strong>Line of sight</strong> — in ft</li><li><strong>Drop per 100 ft</strong> — in ft</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Height = 20 ft, Horizontal distance = 50 ft — and the results panel reads:</p><ul><li><strong>Angle of depression</strong> = <code>atan(Height ÷ Horizontal distance) × 180 ÷ pi</code> = <strong>21.801 °</strong></li><li><strong>Slope</strong> = <code>Height ÷ Horizontal distance × 100</code> = <strong>40 %</strong></li><li><strong>Line of sight</strong> = <code>√((Height)^2+(Horizontal distance)^2)</code> = <strong>53.852 ft</strong></li><li><strong>Drop per 100 ft</strong> = <code>Height ÷ Horizontal distance × 100</code> = <strong>40 ft</strong></li></ul><p>With the numbers written into the formula, the first result is <code>atan(20 ÷ 50) × 180 ÷ pi = 21.801</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>From 20 ft up, a target 50 ft away lies at 21.801 ° below the horizontal, on a line of sight 53.852 ft long. The same line is a 40 % slope.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the angle against the slope: forty five degrees is a hundred per cent, and every ten per cent of slope is about five and three quarter degrees. A large angle with a small slope means the height and distance have been swapped.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Angle of depression</th><th>Slope</th><th>Line of sight</th><th>Drop per 100 ft</th></tr></thead><tbody><tr><td><strong>Height</strong> +10 %</td><td>+8.94 %</td><td>+10 %</td><td>+1.44 %</td><td>+10 %</td></tr><tr><td><strong>Horizontal distance</strong> +10 %</td><td>−8.34 %</td><td>−9.09 %</td><td>+8.68 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Height</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Horizontal distance</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Height = 6, Horizontal distance = 60, the page reports <strong>Angle of depression</strong> = 5.711 °, <strong>Slope</strong> = 10 %, <strong>Line of sight</strong> = 60.299 ft, <strong>Drop per 100 ft</strong> = 10 ft. Eye height looking down a long drive: a shallow angle.</li><li>With Height = 30, Horizontal distance = 30, the page reports <strong>Angle of depression</strong> = 45 °, <strong>Slope</strong> = 100 %, <strong>Line of sight</strong> = 42.426 ft, <strong>Drop per 100 ft</strong> = 100 ft. Equal height and distance: forty five degrees exactly.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Distance measured along the ground slope.</strong> Use the horizontal.</li><li><strong>Angle measured from the vertical.</strong> Depression is from the horizontal.</li><li><strong>Height to the wrong point.</strong> Use the instrument, not the ground.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Angle of depression (°), Slope (%), Line of sight (ft), Drop per 100 ft (ft).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Height and distance in feet, the angle in degrees, slope in per cent.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need height and horizontal distance. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Angle of depression and slope and line of sight and drop per 100 ft should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Height</strong> ×10</td><td>21.801</td><td>75.964</td><td>×3.484</td></tr><tr><td><strong>Horizontal distance</strong> ×10</td><td>21.801</td><td>2.291</td><td>×0.105</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Flat earth.</strong> Very long sights need curvature correction.</li><li><strong>No refraction.</strong> Surveying instruments correct for it separately.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Setting out a sight line.</li></li><li><li>Checking a drainage fall on site.</li></li><li><li>Working out a drone camera angle.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/elevation-grade">Elevation grade</a> <a href="/construction/ladder-angle">Ladder angle</a> <a href="/construction/ramp-slope">Ramp slope</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Angle of depression calculator work out?', 'a' => <<<'TXT'
            It returns angle of depression and slope and line of sight and drop per 100 ft from height and horizontal distance. The relationship is atan(Height ÷ Horizontal distance) × 180 ÷ pi.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Height (ft), Horizontal distance (ft). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: height in ft; horizontal distance in ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is the difference between elevation and depression?', 'a' => 'Elevation is measured up from the horizontal, depression down; the triangle is the same.'],
            ['q' => 'What angle is a 20 per cent slope?', 'a' => 'About eleven and a third degrees, since the tangent of the angle is 0.2.'],
        ],
        'related' => [
            ['path' => '/construction/elevation-grade', 'name' => 'Elevation grade'],
            ['path' => '/construction/ladder-angle', 'name' => 'Ladder angle'],
            ['path' => '/construction/ramp-slope', 'name' => 'Ramp slope'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
