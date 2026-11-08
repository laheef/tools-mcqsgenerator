<?php

/**
 * Bolt circle
 * /construction/bolt-circle
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bolt circle',
    'meta' => ['title' => 'Bolt Circle Calculator: Chord, Arc and Coordinates', 'description' => 'Lay out holes on a bolt circle: the chord between adjacent holes, the arc spacing, the radius and the coordinates of the first hole. The formula is shown.', 'h1' => 'Bolt circle', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'diameter',
                    'label' => 'Bolt circle diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'Across the circle of holes',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'holes',
                    'label' => 'Number of holes',
                    'type' => 'number',
                    'default' => '8',
                    'help' => 'Equally spaced',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'start_angle',
                    'label' => 'Start angle',
                    'type' => 'number',
                    'suffix' => '°',
                    'default' => '0',
                    'help' => 'From the positive X axis',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'radius',
                    'label' => 'Radius',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'chord',
                    'label' => 'Chord',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'arc_spacing',
                    'label' => 'Arc spacing',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'x_first',
                    'label' => 'First hole X',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'y_first',
                    'label' => 'First hole Y',
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
            'title' => 'Bolt circle',
            'results' => [
                'radius' => 'diameter/2',
                'chord' => 'diameter*sin(pi/holes)',
                'arc_spacing' => 'pi*diameter/holes',
                'x_first' => 'diameter/2*cos(start_angle*pi/180)',
                'y_first' => 'diameter/2*sin(start_angle*pi/180)',
                'diameter' => '2*radius',
                'holes' => 'pi*diameter/arc_spacing',
                'start_angle' => 'atan(y_first/x_first)*180/pi',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Chord = D × sin(π ÷ n)</strong>; <strong>arc = π × D ÷ n</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A flange, a wheel hub and a cover plate are all drilled on a bolt circle, and the layout number that matters is the chord — the straight distance between neighbouring holes — because that is what a pair of dividers or a mill table is set to.</p><p>The page reports <strong>radius and chord and arc spacing and first hole X and first hole Y</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Radius</strong></td><td><code>Bolt circle diameter ÷ 2</code></td></tr><tr><td><strong>Chord</strong></td><td><code>Bolt circle diameter × sin(pi ÷ Number of holes)</code></td></tr><tr><td><strong>Arc spacing</strong></td><td><code>pi × Bolt circle diameter ÷ Number of holes</code></td></tr><tr><td><strong>First hole X</strong></td><td><code>Bolt circle diameter ÷ 2 × cos(Start angle × pi ÷ 180)</code></td></tr><tr><td><strong>First hole Y</strong></td><td><code>Bolt circle diameter ÷ 2 × sin(Start angle × pi ÷ 180)</code></td></tr><tr><td><strong>Bolt circle diameter</strong></td><td><code>2 × Radius</code></td></tr><tr><td><strong>Number of holes</strong></td><td><code>pi × Bolt circle diameter ÷ Arc spacing</code></td></tr><tr><td><strong>Start angle</strong></td><td><code>atan(First hole Y ÷ First hole X) × 180 ÷ pi</code></td></tr></tbody></table><p><p>Each hole subtends an angle of pi divided by the number of holes at the centre, so the chord is the diameter times the sine of that half-angle, and the arc along the circle is the circumference divided by the hole count. The first hole's position is the radius resolved onto the two axes.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports radius and chord and arc spacing and first hole X and first hole Y.</p><ul><li><strong>Bolt circle diameter</strong> — in in. Across the circle of holes</li><li><strong>Number of holes</strong>. Equally spaced</li><li><strong>Start angle</strong> — in °. From the positive X axis</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Radius</strong> — in in</li><li><strong>Chord</strong> — in in</li><li><strong>Arc spacing</strong> — in in</li><li><strong>First hole X</strong> — in in</li><li><strong>First hole Y</strong> — in in</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Bolt circle diameter = 12 in, Number of holes = 8, Start angle = 0 ° — and the results panel reads:</p><ul><li><strong>Radius</strong> = <code>Bolt circle diameter ÷ 2</code> = <strong>6 in</strong></li><li><strong>Chord</strong> = <code>Bolt circle diameter × sin(pi ÷ Number of holes)</code> = <strong>4.592 in</strong></li><li><strong>Arc spacing</strong> = <code>pi × Bolt circle diameter ÷ Number of holes</code> = <strong>4.712 in</strong></li><li><strong>First hole X</strong> = <code>Bolt circle diameter ÷ 2 × cos(Start angle × pi ÷ 180)</code> = <strong>6 in</strong></li><li><strong>First hole Y</strong> = <code>Bolt circle diameter ÷ 2 × sin(Start angle × pi ÷ 180)</code> = <strong>0 in</strong></li></ul><p>With the numbers written into the formula, the first result is <code>12 ÷ 2 = 6</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>8 holes on a 12 in circle sit 6 in from the centre, 4.592 in apart on the chord and 4.712 in apart along the arc. The first hole, at 0 °, is at X 6 in and Y 0 in.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the chord against the arc: the chord is always a little shorter, and the gap between them shrinks as the hole count rises. A chord equal to the arc means the hole count is far too high for the diameter.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Radius</th><th>Chord</th><th>Arc spacing</th><th>First hole X</th><th>First hole Y</th></tr></thead><tbody><tr><td><strong>Bolt circle diameter</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>—</td></tr><tr><td><strong>Number of holes</strong> +10 %</td><td>+0 %</td><td>−8.68 %</td><td>−9.09 %</td><td>+0 %</td><td>—</td></tr><tr><td><strong>Start angle</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−0.0001523 %</td><td>—</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Bolt circle diameter</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Start angle</strong>, at 0.0001523 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Bolt circle diameter = 6, Number of holes = 4, Start angle = 45, the page reports <strong>Radius</strong> = 3 in, <strong>Chord</strong> = 4.243 in, <strong>Arc spacing</strong> = 4.712 in, <strong>First hole X</strong> = 2.121 in, <strong>First hole Y</strong> = 2.121 in. Four holes at forty five degrees: a square pattern rotated.</li><li>With Bolt circle diameter = 20, Number of holes = 12, Start angle = 15, the page reports <strong>Radius</strong> = 10 in, <strong>Chord</strong> = 5.176 in, <strong>Arc spacing</strong> = 5.236 in, <strong>First hole X</strong> = 9.659 in, <strong>First hole Y</strong> = 2.588 in. A large flange with twelve holes.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Chord used as arc.</strong> They differ, and the error grows with fewer holes.</li><li><strong>Start angle measured from the wrong axis.</strong> Zero is the positive X.</li><li><strong>Diameter entered as radius.</strong> A factor of two throughout.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Radius (in), Chord (in), Arc spacing (in), First hole X (in), First hole Y (in).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Diameter, chord and arc in inches, angle in degrees, coordinates in inches.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need bolt circle diameter and number of holes and start angle. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Radius and chord and arc spacing and first hole x and first hole y should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Bolt circle diameter</strong> ×10</td><td>6</td><td>60</td><td>ten times larger</td></tr><tr><td><strong>Number of holes</strong> ×10</td><td>6</td><td>6</td><td>unchanged</td></tr><tr><td><strong>Start angle</strong> ×10</td><td>6</td><td>6</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Equal spacing.</strong> Unequal hole patterns are laid out individually.</li><li><strong>True position.</strong> Tolerances are a separate calculation.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Marking out a flange.</li></li><li><li>Setting a rotary table.</li></li><li><li>Checking a drawing's chord dimension.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/bolt-torque">Bolt torque</a> <a href="/construction/pitch-diameter">Pitch diameter</a> <a href="/construction/sag">Sag</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bolt circle calculator work out?', 'a' => <<<'TXT'
            It returns radius and chord and arc spacing and first hole X and first hole Y from bolt circle diameter and number of holes and start angle. The relationship is Bolt circle diameter ÷ 2.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Bolt circle diameter (in), Number of holes, Start angle (°). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: bolt circle diameter in in; start angle in °. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do you calculate a bolt circle?', 'a' => 'Divide the circle into equal angles — 360 over the hole count — and use the sine of half that angle for the chord.'],
            ['q' => 'What is the chord for 8 holes on a 12 inch circle?', 'a' => 'About 4.59 inches, against an arc spacing of 4.71.'],
        ],
        'related' => [
            ['path' => '/construction/bolt-torque', 'name' => 'Bolt torque'],
            ['path' => '/construction/pitch-diameter', 'name' => 'Pitch diameter'],
            ['path' => '/construction/sag', 'name' => 'Sag'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
