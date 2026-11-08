<?php

/**
 * Air changes per hour
 * /construction/air-changes-per-hour
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Air changes per hour',
    'meta' => ['title' => 'Air Changes per Hour Calculator: Room Volume and CFM', 'description' => 'Work out how many air changes an hour a room gets from its volume and the airflow through it, with the air moved per hour and per minute. Units shown.', 'h1' => 'Air changes per hour', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Room length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '15',
                    'help' => 'One side',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Room width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'The other',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Room height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'Floor to ceiling',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cfm',
                    'label' => 'Airflow',
                    'type' => 'number',
                    'suffix' => 'cfm',
                    'default' => '200',
                    'help' => 'Through the room',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_ft3',
                    'label' => 'Room volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'air_per_hour',
                    'label' => 'Air moved per hour',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³/h',
                ],
                [
                    'name' => 'ach',
                    'label' => 'Air changes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ACH',
                ],
                [
                    'name' => 'minutes_per_change',
                    'label' => 'Minutes per change',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Air changes per hour',
            'results' => [
                'volume_ft3' => 'length*width*height',
                'air_per_hour' => 'cfm*60',
                'ach' => 'cfm*60/(length*width*height)',
                'minutes_per_change' => 'length*width*height/(cfm*60)*60',
                'cfm' => 'ach*length*width*height/60',
                'length' => 'volume_ft3/(width*height)',
                'height' => 'volume_ft3/(length*width)',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Air changes per hour = cfm × 60 ÷ room volume</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Air changes per hour is the one number that compares ventilation between rooms of different size. A bathroom fan and a whole-house system move very different volumes, but if both give six air changes an hour the air in each room is replaced at the same rate.</p><p>The page reports <strong>room volume and air moved per hour and air changes and minutes per change</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Room volume</strong></td><td><code>Room length × Room width × Room height</code></td></tr><tr><td><strong>Air moved per hour</strong></td><td><code>Airflow × 60</code></td></tr><tr><td><strong>Air changes</strong></td><td><code>Airflow × 60 ÷ (Room length × Room width × Room height)</code></td></tr><tr><td><strong>Minutes per change</strong></td><td><code>Room length × Room width × Room height ÷ (Airflow × 60) × 60</code></td></tr><tr><td><strong>Airflow</strong></td><td><code>Air changes × Room length × Room width × Room height ÷ 60</code></td></tr><tr><td><strong>Room length</strong></td><td><code>Room volume ÷ (Room width × Room height)</code></td></tr><tr><td><strong>Room height</strong></td><td><code>Room volume ÷ (Room length × Room width)</code></td></tr></tbody></table><p><p>The room volume is length times width times height in feet. The airflow in cubic feet per minute, multiplied by sixty, is the volume moved in an hour, and dividing that by the room volume gives the changes. Its reciprocal, times sixty, is how many minutes one change takes.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports room volume and air moved per hour and air changes and minutes per change.</p><ul><li><strong>Room length</strong> — in ft. One side</li><li><strong>Room width</strong> — in ft. The other</li><li><strong>Room height</strong> — in ft. Floor to ceiling</li><li><strong>Airflow</strong> — in cfm. Through the room</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Room volume</strong> — in ft³</li><li><strong>Air moved per hour</strong> — in ft³/h</li><li><strong>Air changes</strong> — in ACH</li><li><strong>Minutes per change</strong> — in min</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Room length = 15 ft, Room width = 12 ft, Room height = 8 ft, Airflow = 200 cfm — and the results panel reads:</p><ul><li><strong>Room volume</strong> = <code>Room length × Room width × Room height</code> = <strong>1 440 ft³</strong></li><li><strong>Air moved per hour</strong> = <code>Airflow × 60</code> = <strong>12 000 ft³/h</strong></li><li><strong>Air changes</strong> = <code>Airflow × 60 ÷ (Room length × Room width × Room height)</code> = <strong>8.333 ACH</strong></li><li><strong>Minutes per change</strong> = <code>Room length × Room width × Room height ÷ (Airflow × 60) × 60</code> = <strong>7.2 min</strong></li></ul><p>With the numbers written into the formula, the first result is <code>15 × 12 × 8 = 1 440</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 15 ft by 12 ft room with a 8 ft ceiling holds 1 440 ft³. At 200 cfm the air moves 12 000 ft³/h an hour, which is 8.333 air changes — one every 7.2 min.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the number against the room type: four to six changes suits a bedroom, six to eight a kitchen, and ten or more a bathroom or a workshop with dust. Below two the room will feel stale whatever the temperature.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Room volume</th><th>Air moved per hour</th><th>Air changes</th><th>Minutes per change</th></tr></thead><tbody><tr><td><strong>Room length</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Room width</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Room height</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Airflow</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Airflow</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Room length</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Airflow = 50, Room length = 8, Room width = 5, Room height = 8, the page reports <strong>Room volume</strong> = 320 ft³, <strong>Air moved per hour</strong> = 3 000 ft³/h, <strong>Air changes</strong> = 9.375 ACH, <strong>Minutes per change</strong> = 6.4 min. A small bathroom fan: a high change rate in a tiny volume.</li><li>With Airflow = 2 000, Room length = 40, Room width = 30, Room height = 10, the page reports <strong>Room volume</strong> = 12 000 ft³, <strong>Air moved per hour</strong> = 120 000 ft³/h, <strong>Air changes</strong> = 10 ACH, <strong>Minutes per change</strong> = 6 min. A workshop with an extractor: fewer changes in a large volume.</li><li>With Airflow = 100, Room length = 20, Room width = 20, Room height = 8, the page reports <strong>Room volume</strong> = 3 200 ft³, <strong>Air moved per hour</strong> = 6 000 ft³/h, <strong>Air changes</strong> = 1.875 ACH, <strong>Minutes per change</strong> = 32 min. A large room with a small fan: barely two changes an hour.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Volume in square feet.</strong> Height has to be included.</li><li><strong>Fan rating taken as delivered airflow.</strong> Ducts lose a share.</li><li><strong>Changes assumed to be fresh air.</strong> Recirculation is not ventilation.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Room volume (ft³), Air moved per hour (ft³/h), Air changes (ACH), Minutes per change (min).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Room dimensions in feet, volume in cubic feet, airflow in cfm, changes per hour.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need room length and room width and room height and airflow. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Room volume and air moved per hour and air changes and minutes per change should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Room length</strong> ×10</td><td>1 440</td><td>14 400</td><td>ten times larger</td></tr><tr><td><strong>Room width</strong> ×10</td><td>1 440</td><td>14 400</td><td>ten times larger</td></tr><tr><td><strong>Room height</strong> ×10</td><td>1 440</td><td>14 400</td><td>ten times larger</td></tr><tr><td><strong>Airflow</strong> ×10</td><td>1 440</td><td>1 440</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>One well-mixed room.</strong> A room with a closed door behaves differently.</li><li><strong>No duct design.</strong> Pressure loss is a separate calculation.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a bathroom fan.</li></li><li><li>Sizing ventilation for a workshop.</li></li><li><li>Comparing rooms of different size.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/cfm">CFM</a> <a href="/construction/heat-loss">Heat loss</a> <a href="/construction/ac-tonnage">AC tonnage</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Air changes per hour calculator work out?', 'a' => <<<'TXT'
            It returns room volume and air moved per hour and air changes and minutes per change from room length and room width and room height and airflow. The relationship is Room length × Room width × Room height.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Room length (ft), Room width (ft), Room height (ft), Airflow (cfm). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: room length in ft; room width in ft; room height in ft; airflow in cfm. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is a good air changes per hour rate?', 'a' => 'Four to six for living space, more for kitchens, bathrooms and workshops.'],
            ['q' => 'How do I convert cfm to air changes?', 'a' => 'Multiply the cfm by sixty and divide by the room volume in cubic feet.'],
        ],
        'related' => [
            ['path' => '/construction/cfm', 'name' => 'CFM'],
            ['path' => '/construction/heat-loss', 'name' => 'Heat loss'],
            ['path' => '/construction/ac-tonnage', 'name' => 'AC tonnage'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
