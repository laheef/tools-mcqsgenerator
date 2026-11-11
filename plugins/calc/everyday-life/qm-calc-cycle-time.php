<?php

/**
 * Takt Time Calculator
 * /everyday-life/cycle-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Takt Time Calculator',
    'meta' => ['title' => 'Takt Time — The Pace Demand Sets for a Line', 'description' => 'Four hundred and eighty minutes of production against 240 units is two minutes a unit: takt time, the pace demand sets, and what that asks of an hour.', 'h1' => 'Takt Time Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'minutes',
                    'label' => 'Available minutes',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '480',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'demand',
                    'label' => 'Units needed',
                    'type' => 'number',
                    'suffix' => 'units',
                    'default' => '240',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'people',
                    'label' => 'People on the line',
                    'type' => 'number',
                    'suffix' => 'people',
                    'default' => '1',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'takt',
                    'label' => 'Takt time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min/unit',
                ],
                [
                    'name' => 'takt_s',
                    'label' => 'Takt time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 's/unit',
                ],
                [
                    'name' => 'units_hour',
                    'label' => 'Units an hour',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'units',
                ],
                [
                    'name' => 'labour',
                    'label' => 'Labour minutes a unit',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min/unit',
                ],
            ],
        ],
    ],
    'formula' => ['takt' => 'minutes / demand', 'takt_s' => 'minutes / demand * 60', 'units_hour' => '60 / (minutes / demand)', 'labour' => 'minutes / demand * people'],
    'article' => [
        'intro' => 'The takt time a demand rate sets, in minutes and seconds a unit, with the units an hour and the capacity a shift delivers at that pace.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Takt time is the beat demand sets: the available time divided by the units wanted. Four hundred and eighty minutes for 240 units is one every two minutes, whether or not the line can do it.</p><p>It is a target rather than a measure. If the real cycle time is longer than the takt, the shortfall is capacity; if it is shorter, the line is waiting. Either way the number is what the plan implies, and the plan is the thing that can change.</p><p>The answer is <strong>takt time and takt time and units an hour and labour minutes a unit</strong>, worked out from available minutes and units needed and people on the line. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>takt</strong></td><td><code>Available minutes ÷ Units needed</code></td></tr><tr><td><strong>takt_s</strong></td><td><code>Available minutes ÷ Units needed × 60</code></td></tr><tr><td><strong>units_hour</strong></td><td><code>60 ÷ (Available minutes ÷ Units needed)</code></td></tr><tr><td><strong>labour</strong></td><td><code>Available minutes ÷ Units needed × People on the line</code></td></tr></tbody></table><p>Available minutes over units gives minutes a unit, times sixty for seconds, and sixty over that gives units an hour. Labour content is the takt times the people working on the unit at once.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports takt time and takt time and units an hour and labour minutes a unit.</p><ul><li><strong>Available minutes</strong> — min.</li><li><strong>Units needed</strong> — units.</li><li><strong>People on the line</strong> — people.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Takt time</strong> — min/unit.</li><li><strong>Takt time</strong> — s/unit.</li><li><strong>Units an hour</strong> — units.</li><li><strong>Labour minutes a unit</strong> — min/unit.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put available minutes = 480 min, units needed = 240 units, people on the line = 1 people into the form and the panel reads:</p><ul><li><strong>Takt time</strong> = <code>Available minutes ÷ Units needed</code> = <strong>2 min/unit</strong></li><li><strong>Takt time</strong> = <code>Available minutes ÷ Units needed × 60</code> = <strong>120 s/unit</strong></li><li><strong>Units an hour</strong> = <code>60 ÷ (Available minutes ÷ Units needed)</code> = <strong>30 units</strong></li><li><strong>Labour minutes a unit</strong> = <code>Available minutes ÷ Units needed × People on the line</code> = <strong>2 min/unit</strong></li></ul><p>At 300 units the takt falls to 1.6 minutes and the hour needs 37.5 units — a quarter more output from the same shift, which is where overtime comes from.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>480 ÷ 240</code>, which comes to <strong>2 min/unit</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>480 minutes for 240 units is a takt of 2 minutes or 120 seconds, which is 30 units an hour, with two labour minutes per unit for a single operator.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Takt time</th><th>Takt time</th><th>Units an hour</th><th>Labour minutes a unit</th></tr></thead><tbody><tr><td><strong>Available minutes</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Units needed</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>People on the line</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Available minutes</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Available minutes</strong> opens at 480 min</li><li><strong>Units needed</strong> opens at 240 units</li><li><strong>People on the line</strong> opens at 1 people</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Available minutes</th><th>Takt time</th><th>Takt time</th><th>Units an hour</th><th>Labour minutes a unit</th></tr></thead><tbody><tr><td>240 min</td><td>1</td><td>60</td><td>60</td><td>1</td></tr><tr><td>480 min</td><td>2</td><td>120</td><td>30</td><td>2</td></tr><tr><td>960 min</td><td>4</td><td>240</td><td>15</td><td>4</td></tr><tr><td>2 400 min</td><td>10</td><td>600</td><td>6</td><td>10</td></tr><tr><td>4 800 min</td><td>20</td><td>1 200</td><td>3</td><td>20</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set available minutes = 480, units needed = 300, people on the line = 2: <strong>Takt time</strong> = 1.6 min/unit, <strong>Takt time</strong> = 96 s/unit, <strong>Units an hour</strong> = 37.5 units, <strong>Labour minutes a unit</strong> = 3.2 min/unit. Three hundred units is a 1.6-minute takt, 37.5 an hour and 3.2 labour minutes a unit with two people — the same shift asked for a quarter more.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using the scheduled shift instead of available time.</strong> Breaks, changeovers and planned maintenance come off first, or the takt is optimistic and the line is late by design.</li><li><strong>Confusing takt with cycle time.</strong> Takt is what demand asks for, cycle time is what the process delivers. The gap between them is the decision.</li></li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One product, one demand.</strong> A mixed line needs a weighted takt, and this page takes a single average.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need available minutes and units needed and people on the line. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Takt time and takt time and units an hour and labour minutes a unit should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Setting a line pace before a week's production.</li></li><li><li>Working out whether a shift can meet an order at all.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/working-days">Working days</a> <a href="/everyday-life/lead-time">Lead time</a> <a href="/everyday-life/deadline">Deadline</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Available minutes</strong> ×10</td><td>2</td><td>20</td><td>ten times larger</td></tr><tr><td><strong>Units needed</strong> ×10</td><td>2</td><td>0.2</td><td>ten times smaller</td></tr><tr><td><strong>People on the line</strong> ×10</td><td>2</td><td>2</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Takt Time calculator work out?', 'a' => <<<'TXT'
            It returns takt time and takt time and units an hour and labour minutes a unit from available minutes and units needed and people on the line. The relationship is Available minutes ÷ Units needed.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Available minutes (min), Units needed (units), People on the line (people). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: available minutes in min; units needed in units; people on the line in people. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What is the difference between takt and cycle time?', 'a' => 'Takt is the pace required by demand; cycle time is the pace the process achieves. Takt is a target, cycle time is a measurement.'],
            ['q' => 'Should breaks come off the available time?', 'a' => 'Yes, along with changeovers and planned stops. Only the time the line can actually run counts toward takt.'],
            ['q' => 'What if takt is shorter than the cycle time?', 'a' => 'Then capacity is short and the gap has to be closed with people, equipment or a longer window. The takt number does not create capacity.'],
        ],
        'related' => [
            ['path' => '/everyday-life/working-days', 'name' => 'Working days'],
            ['path' => '/everyday-life/lead-time', 'name' => 'Lead time'],
            ['path' => '/everyday-life/deadline', 'name' => 'Deadline'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
