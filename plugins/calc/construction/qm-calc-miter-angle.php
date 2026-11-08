<?php

/**
 * Miter angle
 * /construction/miter-angle
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Miter angle',
    'meta' => ['title' => 'Miter Angle Calculator: Two Widths, One Joint', 'description' => 'Work out the two mitre angles where mouldings of different widths meet, from the joint angle and the face width of each piece. so unequal casings still close.', 'h1' => 'Miter angle', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'joint_angle',
                    'label' => 'Joint angle',
                    'type' => 'number',
                    'suffix' => '°',
                    'default' => '90',
                    'help' => 'The angle between the two walls',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'a_width',
                    'label' => 'Width of piece A',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '3',
                    'help' => 'The face width of the first moulding',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'b_width',
                    'label' => 'Width of piece B',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '5',
                    'help' => 'The face width of the second',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'angle_a',
                    'label' => 'Mitre on piece A',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '°',
                ],
                [
                    'name' => 'angle_b',
                    'label' => 'Mitre on piece B',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '°',
                ],
                [
                    'name' => 'difference',
                    'label' => 'Difference from 45°',
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
            'title' => 'Miter angle',
            'results' => [
                'angle_a' => 'atan(a_width*sin(rad(joint_angle))/(a_width*cos(rad(joint_angle))+b_width))*180/pi',
                'angle_b' => 'joint_angle-atan(a_width*sin(rad(joint_angle))/(a_width*cos(rad(joint_angle))+b_width))*180/pi',
                'difference' => 'abs(atan(a_width*sin(rad(joint_angle))/(a_width*cos(rad(joint_angle))+b_width))*180/pi-joint_angle/2)',
                'a_width' => 'b_width*sin(rad(joint_angle))*cos(atan(rad(angle_a)))/(cos(atan(rad(angle_a)))*sin(rad(joint_angle))-cos(rad(joint_angle))*sin(atan(rad(angle_a))))',
                'joint_angle' => 'angle_a+angle_b',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>When two mouldings of different widths meet, the mitre is not 45°. With widths a and b and a joint angle θ: <strong>angle A = atan(a sin θ ÷ (a cos θ + b))</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Mitres are cut at half the joint angle, and that is right until the two pieces are different widths. Then the cut has to be biased so that the two faces finish flush, and the angle stops being 45°. Crown moulding, window casing and skirting all hit this constantly.</p><p>The page reports <strong>mitre on piece A and mitre on piece B and difference from 45°</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Mitre on piece A</strong></td><td><code>atan(Width of piece A × sin(rad(Joint angle)) ÷ (Width of piece A × cos(rad(Joint angle))+Width of piece B)) × 180 ÷ pi</code></td></tr><tr><td><strong>Mitre on piece B</strong></td><td><code>Joint angle-atan(Width of piece A × sin(rad(Joint angle)) ÷ (Width of piece A × cos(rad(Joint angle))+Width of piece B)) × 180 ÷ pi</code></td></tr><tr><td><strong>Difference from 45°</strong></td><td><code>abs(atan(Width of piece A × sin(rad(Joint angle)) ÷ (Width of piece A × cos(rad(Joint angle))+Width of piece B)) × 180 ÷ pi-Joint angle ÷ 2)</code></td></tr><tr><td><strong>Width of piece A</strong></td><td><code>Width of piece B × sin(rad(Joint angle)) × cos(atan(rad(Mitre on piece A))) ÷ (cos(atan(rad(Mitre on piece A))) × sin(rad(Joint angle))-cos(rad(Joint angle)) × sin(atan(rad(Mitre on piece A))))</code></td></tr><tr><td><strong>Joint angle</strong></td><td><code>Mitre on piece A+Mitre on piece B</code></td></tr></tbody></table><p><p>The formula projects the two face widths onto the joint and takes the arctangent of the ratio they make. Equal widths reduce it to exactly half the joint angle, which is the 45° cut everyone learns first.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports mitre on piece A and mitre on piece B and difference from 45°.</p><ul><li><strong>Joint angle</strong> — in °. The angle between the two walls</li><li><strong>Width of piece A</strong> — in in. The face width of the first moulding</li><li><strong>Width of piece B</strong> — in in. The face width of the second</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Mitre on piece A</strong> — in °</li><li><strong>Mitre on piece B</strong> — in °</li><li><strong>Difference from 45°</strong> — in °</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Joint angle = 90 °, Width of piece A = 3 in, Width of piece B = 5 in — and the results panel reads:</p><ul><li><strong>Mitre on piece A</strong> = <code>atan(Width of piece A × sin(rad(Joint angle)) ÷ (Width of piece A × cos(rad(Joint angle))+Width of piece B)) × 180 ÷ pi</code> = <strong>30.964 °</strong></li><li><strong>Mitre on piece B</strong> = <code>Joint angle-atan(Width of piece A × sin(rad(Joint angle)) ÷ (Width of piece A × cos(rad(Joint angle))+Width of piece B)) × 180 ÷ pi</code> = <strong>59.036 °</strong></li><li><strong>Difference from 45°</strong> = <code>abs(atan(Width of piece A × sin(rad(Joint angle)) ÷ (Width of piece A × cos(rad(Joint angle))+Width of piece B)) × 180 ÷ pi-Joint angle ÷ 2)</code> = <strong>14.036 °</strong></li></ul><p>With the numbers written into the formula, the first result is <code>atan(3 × sin(rad(90)) ÷ (3 × cos(rad(90))+5)) × 180 ÷ pi = 30.964</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 90° corner between a 3 in and a 5 in moulding: piece A takes 31.0° and piece B 59.0°, a long way from 45/45. Setting the saw to 45 would leave a step at the joint roughly the difference in width times the sine of the error.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the two angles against each other: they must add to the joint angle, and the difference from 45° is the amount by which the joint is out of balance. The wider piece always takes the larger cut.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Mitre on piece A</th><th>Mitre on piece B</th><th>Difference from 45°</th></tr></thead><tbody><tr><td><strong>Joint angle</strong> +10 %</td><td>+7.17 %</td><td>+11.48 %</td><td>+16.24 %</td></tr><tr><td><strong>Width of piece A</strong> +10 %</td><td>+54.14 %</td><td>−28.39 %</td><td>−80.58 %</td></tr><tr><td><strong>Width of piece B</strong> +10 %</td><td>−7.6 %</td><td>+3.99 %</td><td>+16.77 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Width of piece A</strong>: a ten per cent move there shifts the result by about 80.6 per cent. The least sensitive is <strong>Joint angle</strong>, at 16.2 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Joint angle = 90, Width of piece A = 4, Width of piece B = 4, the page reports <strong>Mitre on piece A</strong> = 45 °, <strong>Mitre on piece B</strong> = 45 °, <strong>Difference from 45°</strong> = 0 °. Equal widths: both cuts are 45°, which is the sanity check for the formula.</li><li>With Joint angle = 135, Width of piece A = 2.5, Width of piece B = 4, the page reports <strong>Mitre on piece A</strong> = 38.377 °, <strong>Mitre on piece B</strong> = 96.623 °, <strong>Difference from 45°</strong> = 29.123 °. An obtuse corner with unequal casings — the joint that catches people who cut 22.5° blindly.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Half the joint angle assumed.</strong> True only for equal widths.</li><li><strong>Width measured on the back.</strong> It is the face width that shows in the joint.</li><li><strong>Inside and outside corners confused.</strong> The same numbers apply, but the cut is mirrored.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Mitre on piece A (°), Mitre on piece B (°), Difference from 45° (°).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The joint angle in degrees, the two widths in inches, and the mitre angles in degrees from the square cut.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need joint angle and width of piece A and width of piece B. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Mitre on piece a and mitre on piece b and difference from 45° should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Joint angle</strong> ×10</td><td>30.964</td><td>5.263 × 10<sup>-14</sup></td><td>×1.7 × 10<sup>-15</sup></td></tr><tr><td><strong>Width of piece A</strong> ×10</td><td>30.964</td><td>84.289</td><td>×2.722</td></tr><tr><td><strong>Width of piece B</strong> ×10</td><td>30.964</td><td>3.434</td><td>×0.111</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Two flat faces.</strong> A profiled moulding meeting a flat one needs the profile projected.</li><li><strong>No spring angle.</strong> Crown moulding cut in the flat also needs its own angle.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Cutting a casing joint between two widths.</li></li><li><li>Fitting skirting round an off-square corner.</li></li><li><li>Checking why a mitre did not close.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/angle-cut">Angle cut</a> <a href="/construction/wainscoting">Wainscoting</a> <a href="/construction/board-and-batten">Board and batten</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Miter angle calculator work out?', 'a' => <<<'TXT'
            It returns mitre on piece A and mitre on piece B and difference from 45° from joint angle and width of piece A and width of piece B. The relationship is atan(Width of piece A × sin(rad(Joint angle)) ÷ (Width of piece A × cos(rad(Joint angle))+Width of piece B)) × 180 ÷ pi.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Joint angle (°), Width of piece A (in), Width of piece B (in). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: joint angle in °; width of piece A in in; width of piece B in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is my mitre not closing?', 'a' => 'Either the corner is not 90°, or the two pieces are different widths and need different angles.'],
            ['q' => 'What is the mitre angle for a 135° corner?', 'a' => '67.5° on equal widths, and rather less on the wider piece if the widths differ.'],
        ],
        'related' => [
            ['path' => '/construction/angle-cut', 'name' => 'Angle cut'],
            ['path' => '/construction/wainscoting', 'name' => 'Wainscoting'],
            ['path' => '/construction/board-and-batten', 'name' => 'Board and batten'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
