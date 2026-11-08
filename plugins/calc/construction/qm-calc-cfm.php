<?php

/**
 * CFM
 * /construction/cfm
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CFM',
    'meta' => ['title' => 'CFM Calculator: Airflow from Duct Size and Velocity', 'description' => 'Work out the cubic feet per minute moving through a rectangular duct from its width, height and the air velocity, with the area it passes through. Units shown.', 'h1' => 'CFM', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'duct_width',
                    'label' => 'Duct width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'Inside dimension',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'duct_height',
                    'label' => 'Duct height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '8',
                    'help' => 'Inside dimension',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'velocity',
                    'label' => 'Air velocity',
                    'type' => 'number',
                    'suffix' => 'ft/min',
                    'default' => '800',
                    'help' => 'Face velocity in the duct',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area_ft2',
                    'label' => 'Duct area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'cfm',
                    'label' => 'Airflow',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cfm',
                ],
                [
                    'name' => 'm3h',
                    'label' => 'Airflow',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm³/h',
                ],
                [
                    'name' => 'velocity_fps',
                    'label' => 'Velocity',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft/s',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'CFM',
            'results' => [
                'area_ft2' => 'duct_width*duct_height/144',
                'cfm' => 'duct_width*duct_height/144*velocity',
                'm3h' => 'duct_width*duct_height/144*velocity*1.69901',
                'velocity_fps' => 'velocity/60',
                'duct_width' => 'area_ft2*144/duct_height',
                'duct_height' => 'area_ft2*144/duct_width',
                'velocity' => 'cfm/area_ft2',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>CFM = duct area in ft² × velocity in ft/min</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Airflow is a volume, not a speed, and a duct only carries a volume because it has an area. That is why the same fan moves far more air through a short wide duct than a long narrow one, and why sizing a duct is really a question about velocity.</p><p>The page reports <strong>duct area and airflow (cfm) and airflow (m³/h) and velocity</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Duct area</strong></td><td><code>Duct width × Duct height ÷ 144</code></td></tr><tr><td><strong>Airflow (cfm)</strong></td><td><code>Duct width × Duct height ÷ 144 × Air velocity</code></td></tr><tr><td><strong>Airflow (m³ per h)</strong></td><td><code>Duct width × Duct height ÷ 144 × Air velocity × 1.69901</code></td></tr><tr><td><strong>Velocity</strong></td><td><code>Air velocity ÷ 60</code></td></tr><tr><td><strong>Duct width</strong></td><td><code>Duct area × 144 ÷ Duct height</code></td></tr><tr><td><strong>Duct height</strong></td><td><code>Duct area × 144 ÷ Duct width</code></td></tr><tr><td><strong>Air velocity</strong></td><td><code>Airflow (cfm) ÷ Duct area</code></td></tr></tbody></table><p><p>The width and height in inches are divided by a hundred and forty four to give square feet, then multiplied by the velocity in feet per minute. Multiply by 1.699 to reach cubic metres an hour, and divide by sixty for feet per second.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports duct area and airflow (cfm) and airflow (m³/h) and velocity.</p><ul><li><strong>Duct width</strong> — in in. Inside dimension</li><li><strong>Duct height</strong> — in in. Inside dimension</li><li><strong>Air velocity</strong> — in ft/min. Face velocity in the duct</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Duct area</strong> — in ft²</li><li><strong>Airflow</strong> — in cfm</li><li><strong>Airflow</strong> — in m³/h</li><li><strong>Velocity</strong> — in ft/s</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Duct width = 12 in, Duct height = 8 in, Air velocity = 800 ft/min — and the results panel reads:</p><ul><li><strong>Duct area</strong> = <code>Duct width × Duct height ÷ 144</code> = <strong>0.667 ft²</strong></li><li><strong>Airflow</strong> = <code>Duct width × Duct height ÷ 144 × Air velocity</code> = <strong>533.333 cfm</strong></li><li><strong>Airflow</strong> = <code>Duct width × Duct height ÷ 144 × Air velocity × 1.69901</code> = <strong>906.139 m³/h</strong></li><li><strong>Velocity</strong> = <code>Air velocity ÷ 60</code> = <strong>13.333 ft/s</strong></li></ul><p>With the numbers written into the formula, the first result is <code>12 × 8 ÷ 144 = 0.667</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 12 in by 8 in duct has 0.667 ft² of face. At 800 ft/min it carries 533.333 cfm, which is 906.139 m³/h or a velocity of 13.333 ft/s.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the velocity: below six hundred feet per minute a supply duct is quiet, eight hundred is normal, and above twelve hundred the noise becomes noticeable in a bedroom. High velocity in a small duct is how whistling systems happen.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Duct area</th><th>Airflow</th><th>Airflow</th><th>Velocity</th></tr></thead><tbody><tr><td><strong>Duct width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Duct height</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Air velocity</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Duct width</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Air velocity</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Duct width = 20, Duct height = 8, Air velocity = 600, the page reports <strong>Duct area</strong> = 1.111 ft², <strong>Airflow</strong> = 666.667 cfm, <strong>Airflow</strong> = 1 132.673 m³/h, <strong>Velocity</strong> = 10 ft/s. A wide shallow duct at low velocity: quiet and low loss.</li><li>With Duct width = 6, Duct height = 6, Air velocity = 1 200, the page reports <strong>Duct area</strong> = 0.25 ft², <strong>Airflow</strong> = 300 cfm, <strong>Airflow</strong> = 509.703 m³/h, <strong>Velocity</strong> = 20 ft/s. A small branch at high velocity: noisy but space saving.</li><li>With Duct width = 24, Duct height = 12, Air velocity = 500, the page reports <strong>Duct area</strong> = 2 ft², <strong>Airflow</strong> = 1 000 cfm, <strong>Airflow</strong> = 1 699.01 m³/h, <strong>Velocity</strong> = 8.333 ft/s. A main trunk at low velocity: quiet and cheap to run.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Round duct treated as square.</strong> Use the circular area.</li><li><strong>Outside dimensions used.</strong> Insulation is not air.</li><li><strong>Velocity in feet per second.</strong> The form wants feet per minute.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Duct area (ft²), Airflow (cfm), Airflow (m³/h), Velocity (ft/s).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Duct dimensions in inches, area in square feet, airflow in cfm and cubic metres per hour, velocity in feet per minute and per second.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need duct width and duct height and air velocity. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Duct area and airflow (cfm) and airflow (m³/h) and velocity should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Duct width</strong> ×10</td><td>0.667</td><td>6.667</td><td>ten times larger</td></tr><tr><td><strong>Duct height</strong> ×10</td><td>0.667</td><td>6.667</td><td>ten times larger</td></tr><tr><td><strong>Air velocity</strong> ×10</td><td>0.667</td><td>0.667</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Average velocity.</strong> A real duct has a velocity profile.</li><li><strong>No pressure loss.</strong> Friction is a separate calculation.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing a supply or return duct.</li></li><li><li>Checking a fan's delivered airflow.</li></li><li><li>Converting cfm to metric units.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/air-changes-per-hour">Air changes per hour</a> <a href="/construction/gallons-per-minute">Gallons per minute</a> <a href="/construction/furnace-size">Furnace size</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the CFM calculator work out?', 'a' => <<<'TXT'
            It returns duct area and airflow (cfm) and airflow (m³/h) and velocity from duct width and duct height and air velocity. The relationship is Duct width × Duct height ÷ 144.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Duct width (in), Duct height (in), Air velocity (ft/min). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: duct width in in; duct height in in; air velocity in ft/min. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I calculate cfm from duct size?', 'a' => 'Multiply the face area in square feet by the velocity in feet per minute.'],
            ['q' => 'What velocity should a duct run at?', 'a' => 'Six to eight hundred feet per minute for quiet residential supply air.'],
        ],
        'related' => [
            ['path' => '/construction/air-changes-per-hour', 'name' => 'Air changes per hour'],
            ['path' => '/construction/gallons-per-minute', 'name' => 'Gallons per minute'],
            ['path' => '/construction/furnace-size', 'name' => 'Furnace size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
