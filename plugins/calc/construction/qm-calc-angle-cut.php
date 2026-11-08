<?php

/**
 * Angle cut
 * /construction/angle-cut
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Angle cut',
    'meta' => ['title' => 'Angle Cut Calculator: Slope, Mitre and Bevel', 'description' => 'Turn a rise and a run into a slope angle, the mitre that cuts it and the bevel that matches, with the pitch expressed as rise per 12. for a mitre saw setup.', 'h1' => 'Angle cut', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'rise',
                    'label' => 'Rise',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '6',
                    'help' => 'How far it climbs',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'run',
                    'label' => 'Run',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'How far it travels',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'angle',
                    'label' => 'Slope angle',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '°',
                ],
                [
                    'name' => 'mitre',
                    'label' => 'Mitre from square',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '°',
                ],
                [
                    'name' => 'ratio',
                    'label' => 'Rise per 12',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'x/12',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Angle cut',
            'results' => [
                'angle' => 'atan(rise/run)*180/pi',
                'mitre' => '90-atan(rise/run)*180/pi',
                'ratio' => 'rise/run*12',
                'rise' => 'run*tan(rad(angle))',
                'run' => 'rise/tan(rad(angle))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A slope is an angle before it is a pair of saw settings: <strong>angle = atan(rise ÷ run)</strong>, the mitre is measured from the square cut, and the bevel from the face.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Every angle cut is two numbers on a saw: how far the table turns and how far the blade tilts. Getting from a rise and a run to those numbers is the step that most off-cuts come from — especially on a mitre saw that measures its scales from a different zero.</p><p>The page reports <strong>slope angle and mitre from square and rise per 12</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Slope angle</strong></td><td><code>atan(Rise ÷ Run) × 180 ÷ pi</code></td></tr><tr><td><strong>Mitre from square</strong></td><td><code>90-atan(Rise ÷ Run) × 180 ÷ pi</code></td></tr><tr><td><strong>Rise per 12</strong></td><td><code>Rise ÷ Run × 12</code></td></tr><tr><td><strong>Rise</strong></td><td><code>Run × tan(rad(Slope angle))</code></td></tr><tr><td><strong>Run</strong></td><td><code>Rise ÷ tan(rad(Slope angle))</code></td></tr></tbody></table><p><p>The slope angle is the arctangent of rise over run. The mitre is its complement, because a mitre saw's 0° is a square cut across the timber, not a horizontal line.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports slope angle and mitre from square and rise per 12.</p><ul><li><strong>Rise</strong> — in in. How far it climbs</li><li><strong>Run</strong> — in in. How far it travels</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Slope angle</strong> — in °</li><li><strong>Mitre from square</strong> — in °</li><li><strong>Rise per 12</strong> — in x/12</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Rise = 6 in, Run = 12 in — and the results panel reads:</p><ul><li><strong>Slope angle</strong> = <code>atan(Rise ÷ Run) × 180 ÷ pi</code> = <strong>26.565 °</strong></li><li><strong>Mitre from square</strong> = <code>90-atan(Rise ÷ Run) × 180 ÷ pi</code> = <strong>63.435 °</strong></li><li><strong>Rise per 12</strong> = <code>Rise ÷ Run × 12</code> = <strong>6 x/12</strong></li></ul><p>With the numbers written into the formula, the first result is <code>atan(6 ÷ 12) × 180 ÷ pi = 26.565</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A rise of 6 in over a run of 12 in is 26.6° of slope, a mitre of 63.4° from square and a ratio of 6 in 12 — the same slope a 6/12 roof has.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the mitre against the saw: most mitre saws stop at 45° either way, so anything past that has to be cut from the other face or with the work turned. That is a constraint on the setup, not on the angle.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Slope angle</th><th>Mitre from square</th><th>Rise per 12</th></tr></thead><tbody><tr><td><strong>Rise</strong> +10 %</td><td>+8.45 %</td><td>−3.54 %</td><td>+10 %</td></tr><tr><td><strong>Run</strong> +10 %</td><td>−7.98 %</td><td>+3.34 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Rise</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Run</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Rise = 12, Run = 12, the page reports <strong>Slope angle</strong> = 45 °, <strong>Mitre from square</strong> = 45 °, <strong>Rise per 12</strong> = 12 x/12. A 45° slope — the one angle every saw is built around.</li><li>With Rise = 3, Run = 16, the page reports <strong>Slope angle</strong> = 10.62 °, <strong>Mitre from square</strong> = 79.38 °, <strong>Rise per 12</strong> = 2.25 x/12. A shallow ramp or a handrail: 10.6° of slope, a mitre of 79.4°.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Rise and run swapped.</strong> The angle changes to its complement, which is a very different cut.</li><li><strong>Degrees read off the wrong scale.</strong> A mitre saw's bevel scale may read from vertical.</li><li><strong>Slope and mitre confused.</strong> They add to 90°, so one is never the other.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Slope angle (°), Mitre from square (°), Rise per 12 (x/12).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Rise and run in the same unit — inches or millimetres — the angles in degrees, and the ratio as rise per 12 of run.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need rise and run. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Slope angle and mitre from square and rise per 12 should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Rise</strong> ×10</td><td>26.565</td><td>78.69</td><td>×2.962</td></tr><tr><td><strong>Run</strong> ×10</td><td>26.565</td><td>2.862</td><td>×0.108</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>One straight cut.</strong> Compound cuts need both angles at once.</li><li><strong>No kerf allowance.</strong> The blade's width is the saw's business.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Setting a mitre saw for a sloped rail.</li></li><li><li>Converting a roof pitch to an angle.</li></li><li><li>Cutting a ramp's end.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/miter-angle">Mitre angle</a> <a href="/construction/roof-pitch">Roof pitch</a> <a href="/construction/ramp-slope">Ramp slope</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Angle cut calculator work out?', 'a' => 'It returns slope angle and mitre from square and rise per 12 from rise and run. The relationship is atan(Rise ÷ Run) × 180 ÷ pi.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Rise (in), Run (in). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: rise in in; run in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I convert a 6/12 pitch to degrees?', 'a' => 'Arctangent of 6/12 is 26.57°.'],
            ['q' => 'What is the difference between a mitre and a bevel?', 'a' => 'A mitre turns the work in the horizontal plane; a bevel tilts the blade. The two angles complement each other.'],
        ],
        'related' => [
            ['path' => '/construction/miter-angle', 'name' => 'Mitre angle'],
            ['path' => '/construction/roof-pitch', 'name' => 'Roof pitch'],
            ['path' => '/construction/ramp-slope', 'name' => 'Ramp slope'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
