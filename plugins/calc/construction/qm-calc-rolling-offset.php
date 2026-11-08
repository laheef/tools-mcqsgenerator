<?php

/**
 * Rolling offset
 * /construction/rolling-offset
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rolling offset',
    'meta' => ['title' => 'Rolling Offset Calculator: Travel, Run and Cut Length', 'description' => 'Work out the travel and run of a rolling offset from the offset distance and the fitting angle, with the length of pipe between the two bends. Units shown.', 'h1' => 'Rolling offset', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'offset',
                    'label' => 'Offset',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'How far the pipe must shift',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'angle',
                    'label' => 'Fitting angle',
                    'type' => 'number',
                    'suffix' => '°',
                    'default' => '45',
                    'help' => 'Forty five is the common fitting',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'travel',
                    'label' => 'Travel',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'run',
                    'label' => 'Run',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'travel_ft',
                    'label' => 'Travel',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'fitting_ratio',
                    'label' => 'Travel per inch',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Rolling offset',
            'results' => [
                'travel' => 'offset/sin(angle*pi/180)',
                'run' => 'offset/tan(angle*pi/180)',
                'travel_ft' => 'offset/sin(angle*pi/180)/12',
                'fitting_ratio' => '1/sin(angle*pi/180)',
                'offset' => 'travel*sin(angle*pi/180)',
                'angle' => 'asin(offset/travel)*180/pi',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Travel = offset ÷ sin θ</strong> and <strong>run = offset ÷ tan θ</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A rolling offset is the piece of pipe that steps sideways and up at the same time. The fitter needs two numbers: how far the pipe travels along the diagonal, and how far it runs in plan, because the second one is what the cut length and the fitting take-off are measured from.</p><p>The page reports <strong>travel (in) and run and travel (ft) and travel per inch</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Travel (in)</strong></td><td><code>Offset ÷ sin(Fitting angle × pi ÷ 180)</code></td></tr><tr><td><strong>Run</strong></td><td><code>Offset ÷ tan(Fitting angle × pi ÷ 180)</code></td></tr><tr><td><strong>Travel (ft)</strong></td><td><code>Offset ÷ sin(Fitting angle × pi ÷ 180) ÷ 12</code></td></tr><tr><td><strong>Travel per inch</strong></td><td><code>1 ÷ sin(Fitting angle × pi ÷ 180)</code></td></tr><tr><td><strong>Offset</strong></td><td><code>Travel (in) × sin(Fitting angle × pi ÷ 180)</code></td></tr><tr><td><strong>Fitting angle</strong></td><td><code>asin(Offset ÷ Travel (in)) × 180 ÷ pi</code></td></tr></tbody></table><p><p>The offset is the side opposite the fitting angle, so the diagonal travel is the offset divided by the sine of the angle. The plan run is the offset divided by the tangent, which for a forty five degree fitting is simply the offset itself — the reason forty fives are the fitting of choice.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports travel (in) and run and travel (ft) and travel per inch.</p><ul><li><strong>Offset</strong> — in in. How far the pipe must shift</li><li><strong>Fitting angle</strong> — in °. Forty five is the common fitting</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Travel</strong> — in in</li><li><strong>Run</strong> — in in</li><li><strong>Travel</strong> — in ft</li><li><strong>Travel per inch</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Offset = 12 in, Fitting angle = 45 ° — and the results panel reads:</p><ul><li><strong>Travel</strong> = <code>Offset ÷ sin(Fitting angle × pi ÷ 180)</code> = <strong>16.971 in</strong></li><li><strong>Run</strong> = <code>Offset ÷ tan(Fitting angle × pi ÷ 180)</code> = <strong>12 in</strong></li><li><strong>Travel</strong> = <code>Offset ÷ sin(Fitting angle × pi ÷ 180) ÷ 12</code> = <strong>1.414 ft</strong></li><li><strong>Travel per inch</strong> = <code>1 ÷ sin(Fitting angle × pi ÷ 180)</code> = <strong>1.414</strong></li></ul><p>With the numbers written into the formula, the first result is <code>12 ÷ sin(45 × pi ÷ 180) = 16.971</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 12 in offset through a 45 ° fitting travels 16.971 in and runs 12 in in plan, which is 1.414 ft along the pipe — 1.414 of travel for every inch of offset.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the travel per inch: 1.414 for forty five degrees, 2.0 for thirty, 1.155 for sixty. A ratio outside that band means the angle is not a standard fitting.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Travel</th><th>Run</th><th>Travel</th><th>Travel per inch</th></tr></thead><tbody><tr><td><strong>Offset</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Fitting angle</strong> +10 %</td><td>−7.01 %</td><td>−14.59 %</td><td>−7.01 %</td><td>−7.01 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Fitting angle</strong>: a ten per cent move there shifts the result by about 14.6 per cent. The least sensitive is <strong>Offset</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Offset = 8, Fitting angle = 30, the page reports <strong>Travel</strong> = 16 in, <strong>Run</strong> = 13.856 in, <strong>Travel</strong> = 1.333 ft, <strong>Travel per inch</strong> = 2. A shallower angle: double the travel for the same offset.</li><li>With Offset = 18, Fitting angle = 60, the page reports <strong>Travel</strong> = 20.785 in, <strong>Run</strong> = 10.392 in, <strong>Travel</strong> = 1.732 ft, <strong>Travel per inch</strong> = 1.155. A steep offset close to the wall: a short, tight step.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Fitting angle measured from the pipe.</strong> It is the bend angle.</li><li><strong>Fitting take-off ignored.</strong> Each bend eats into the travel.</li><li><strong>Offset measured centre to centre.</strong> It is not the gap between pipes.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Travel (in), Run (in), Travel (ft), Travel per inch.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Offset and travel in inches, travel also in feet, angle in degrees.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need offset and fitting angle. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Travel (in) and run and travel (ft) and travel per inch should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Offset</strong> ×10</td><td>16.971</td><td>169.706</td><td>ten times larger</td></tr><tr><td><strong>Fitting angle</strong> ×10</td><td>16.971</td><td>12</td><td>×0.707</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Two equal bends.</strong> Unequal bends need a different triangle.</li><li><strong>No fitting allowances.</strong> Subtract the take-off before cutting.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Cutting a pipe offset.</li></li><li><li>Setting out conduit around an obstruction.</li></li><li><li>Checking a fitter's travel figure.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/pipe-volume">Pipe volume</a> <a href="/construction/angle-cut">Angle cut</a> <a href="/construction/sag">Sag</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rolling offset calculator work out?', 'a' => 'It returns travel (in) and run and travel (ft) and travel per inch from offset and fitting angle. The relationship is Offset ÷ sin(Fitting angle × pi ÷ 180).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Offset (in), Fitting angle (°). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: offset in in; fitting angle in °. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is the multiplier for a 45 degree offset?', 'a' => '1.414 — the travel is the offset times the square root of two.'],
            ['q' => 'What is the run of a rolling offset?', 'a' => 'The offset divided by the tangent of the angle, which equals the offset at forty five degrees.'],
        ],
        'related' => [
            ['path' => '/construction/pipe-volume', 'name' => 'Pipe volume'],
            ['path' => '/construction/angle-cut', 'name' => 'Angle cut'],
            ['path' => '/construction/sag', 'name' => 'Sag'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
