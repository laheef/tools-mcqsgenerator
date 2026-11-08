<?php

/**
 * Ladder angle
 * /construction/ladder-angle
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Ladder angle',
    'meta' => ['title' => 'Ladder Angle Calculator: Safety, Base and Length', 'description' => 'Find the angle a ladder makes with the ground from its height and base, the length of the ladder it needs and the safe base distance. The formula is shown.', 'h1' => 'Ladder angle', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'height',
                    'label' => 'Height to the wall',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Where the ladder touches',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'base',
                    'label' => 'Base out from wall',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '3',
                    'help' => 'Foot of the ladder',
                    'rounding' => ['omni', '0.0001'],
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
                    'name' => 'ladder_length',
                    'label' => 'Ladder length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'ratio',
                    'label' => 'Height to base',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'safe_base',
                    'label' => 'Safe base',
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
            'title' => 'Ladder angle',
            'results' => [
                'angle' => 'atan(height/base)*180/pi',
                'ladder_length' => 'sqrt(pow(height,2)+pow(base,2))',
                'ratio' => 'height/base',
                'safe_base' => 'height/4',
                'base' => 'height/tan(angle*pi/180)',
                'height' => 'base*tan(angle*pi/180)',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Angle = arctan(height ÷ base)</strong>, and the safe rule is a base of one quarter of the height.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A ladder is a lever, and the angle at its foot decides whether it stays up. Too vertical and it tips backwards over the wall; too shallow and the feet slide out. The rule every fire service teaches is one out for every four up, which is about seventy six degrees.</p><p>The page reports <strong>angle and ladder length and height to base and safe base</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Angle</strong></td><td><code>atan(Height to the wall ÷ Base out from wall) × 180 ÷ pi</code></td></tr><tr><td><strong>Ladder length</strong></td><td><code>√((Height to the wall)^2+(Base out from wall)^2)</code></td></tr><tr><td><strong>Height to base</strong></td><td><code>Height to the wall ÷ Base out from wall</code></td></tr><tr><td><strong>Safe base</strong></td><td><code>Height to the wall ÷ 4</code></td></tr><tr><td><strong>Base out from wall</strong></td><td><code>Height to the wall ÷ tan(Angle × pi ÷ 180)</code></td></tr><tr><td><strong>Height to the wall</strong></td><td><code>Base out from wall × tan(Angle × pi ÷ 180)</code></td></tr></tbody></table><p><p>Height over base is the tangent of the angle at the ground, so the inverse tangent gives the angle in degrees. The ladder length is the hypotenuse of the same triangle and has to be at least as long as that, before any allowance for reaching past the wall.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports angle and ladder length and height to base and safe base.</p><ul><li><strong>Height to the wall</strong> — in ft. Where the ladder touches</li><li><strong>Base out from wall</strong> — in ft. Foot of the ladder</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Angle</strong> — in °</li><li><strong>Ladder length</strong> — in ft</li><li><strong>Height to base</strong></li><li><strong>Safe base</strong> — in ft</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Height to the wall = 12 ft, Base out from wall = 3 ft — and the results panel reads:</p><ul><li><strong>Angle</strong> = <code>atan(Height to the wall ÷ Base out from wall) × 180 ÷ pi</code> = <strong>75.964 °</strong></li><li><strong>Ladder length</strong> = <code>√((Height to the wall)^2+(Base out from wall)^2)</code> = <strong>12.369 ft</strong></li><li><strong>Height to base</strong> = <code>Height to the wall ÷ Base out from wall</code> = <strong>4</strong></li><li><strong>Safe base</strong> = <code>Height to the wall ÷ 4</code> = <strong>3 ft</strong></li></ul><p>With the numbers written into the formula, the first result is <code>atan(12 ÷ 3) × 180 ÷ pi = 75.964</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 12 ft wall with the feet 3 ft out is 4 to one, which is 75.964 °. A ladder touching the wall takes 12.369 ft, and the safe base for this height is 3 ft.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the angle: between seventy and eighty degrees is the safe band, and one in four sits at seventy six. Below sixty five degrees the feet will slide; above eighty five the ladder is better described as a very long stick.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Angle</th><th>Ladder length</th><th>Height to base</th><th>Safe base</th></tr></thead><tbody><tr><td><strong>Height to the wall</strong> +10 %</td><td>+1.62 %</td><td>+9.44 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Base out from wall</strong> +10 %</td><td>−1.76 %</td><td>+0.62 %</td><td>−9.09 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Height to the wall</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Base out from wall</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Height to the wall = 20, Base out from wall = 4, the page reports <strong>Angle</strong> = 78.69 °, <strong>Ladder length</strong> = 20.396 ft, <strong>Height to base</strong> = 5, <strong>Safe base</strong> = 5 ft. The rule of four at a two storey height.</li><li>With Height to the wall = 10, Base out from wall = 5, the page reports <strong>Angle</strong> = 63.435 °, <strong>Ladder length</strong> = 11.18 ft, <strong>Height to base</strong> = 2, <strong>Safe base</strong> = 2.5 ft. A base of half the height: far too shallow and unsafe.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Base measured from the wall's face at the top.</strong> Use the foot.</li><li><strong>Ladder exactly the length needed.</strong> Leave a few rungs above the wall.</li><li><strong>Soft ground.</strong> Feet sink and the angle shallows.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Angle (°), Ladder length (ft), Height to base, Safe base (ft).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Heights and base in feet, the angle in degrees, the ratio as height to base.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need height to the wall and base out from wall. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Angle and ladder length and height to base and safe base should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Height to the wall</strong> ×10</td><td>75.964</td><td>88.568</td><td>×1.166</td></tr><tr><td><strong>Base out from wall</strong> ×10</td><td>75.964</td><td>21.801</td><td>×0.287</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Plain ladder geometry.</strong> No wind or footing strength.</li><li><strong>Not a working-at-height plan.</strong> Use the manufacturer's rules.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Setting a ladder against a wall.</li></li><li><li>Choosing a ladder length.</li></li><li><li>Checking a roofer's setup.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/ramp-slope">Ramp slope</a> <a href="/construction/angle-of-depression">Angle of depression</a> <a href="/construction/elevation-grade">Elevation grade</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Ladder angle calculator work out?', 'a' => <<<'TXT'
            It returns angle and ladder length and height to base and safe base from height to the wall and base out from wall. The relationship is atan(Height to the wall ÷ Base out from wall) × 180 ÷ pi.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Height to the wall (ft), Base out from wall (ft). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: height to the wall in ft; base out from wall in ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is the correct ladder angle?', 'a' => 'About seventy five degrees, which is a base of one quarter of the height.'],
            ['q' => 'How long a ladder do I need for 12 feet?', 'a' => 'At least 12.4 feet to the contact point, plus enough to reach past it.'],
        ],
        'related' => [
            ['path' => '/construction/ramp-slope', 'name' => 'Ramp slope'],
            ['path' => '/construction/angle-of-depression', 'name' => 'Angle of depression'],
            ['path' => '/construction/elevation-grade', 'name' => 'Elevation grade'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
