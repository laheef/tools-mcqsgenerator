<?php

/**
 * Olga Tokarczuk books
 * /everyday-life/olga-tokarczuk-books
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Olga Tokarczuk books',
    'meta' => ['title' => 'Olga Tokarczuk books: Formula, Steps & Results', 'description' => 'Olga Tokarczuk books works out end date from i have… and start date. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Olga Tokarczuk books Calculator', 'updated' => '2025-10-06'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Literary Nobel Prize winner Olga Tokarczuk's The Books of Jacob is finally out in English. If you want to catch up on her works, this calculator will let you plan your reading
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'reading_mode_VS',
                            'label' => 'I have…',
                            'type' => 'select',
                            'options' => ['plenty of time — I\'ll read everything!' => '0', 'little time — I\'ll read a few books.' => '1'],
                            'dataset' => 'mode',
                            'default' => 'little time — I\'ll read a few books.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'start_date', 'label' => 'Start date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_time',
                            'label' => 'Total time',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'end_date_limited', 'label' => 'End date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'reading_speed_description_VS',
                            'label' => 'My reading speed is…',
                            'type' => 'select',
                            'options' => ['slow' => '0.25', 'average' => '0.5', 'fast' => '1'],
                            'dataset' => 'tempo',
                            'default' => 'average',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'reading_speed',
                            'label' => ' which means I can read...',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_per_day',
                            'label' => 'I usually read ',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'end_date', 'label' => 'You will finish by…', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'book_order_VS',
                            'label' => 'Order',
                            'type' => 'select',
                            'options' => [
                                'Chronologically' => '1',
                                'By length, from shortest' => '2',
                                'By length, from longest' => '3',
                                'By rating, from highest' => '4',
                                'By rating, from lowest' => '5',
                            ],
                            'dataset' => 'order',
                            'default' => 'By rating, from highest',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'reading_speed = reading_speed_description_VS',
            'results' => ['reading_speed' => 'reading_speed_description_VS', 'reading_speed_description_VS' => 'reading_speed'],
        ],
        [
            'title' => 'end_date = 4338 /( time_per_day * reading_speed) + start_date',
            'results' => ['end_date' => 'start_date + 4338/(reading_speed*time_per_day)', 'reading_speed' => '4338/(time_per_day*(end_date - start_date))', 'time_per_day' => '4338/(reading_speed*(end_date - start_date))', 'start_date' => 'end_date - 4338/(reading_speed*time_per_day)'],
        ],
        [
            'title' => 'end_date_limited = start_date + total_time',
            'results' => ['total_time' => 'end_date_limited - start_date', 'end_date_limited' => 'start_date + total_time', 'start_date' => 'end_date_limited - total_time'],
        ],
    ],
    'article' => [
        'intro' => 'Supply the start date, the end date and the I usually read and the Olga Tokarczuk books calculator solves for the answer.',
        'sections' => [
            ['title' => 'How does the Olga Tokarczuk books calculator work?', 'html' => <<<'TXT'
            <p>The Olga Tokarczuk books calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you choose the option that describes your case (my reading speed is… and the order); then you give the start date and the end date; then you type in the I usually read.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as plenty of time — I'll read everything! and little time — I'll read a few books.. </li><li>A calendar date. Use the picker; the answer is recalculated the moment the date changes, and the count is done date-to-date rather than by subtracting timestamps.</li><li>A calendar date. Use the picker; the answer is recalculated the moment the date changes, and the count is done date-to-date rather than by subtracting timestamps.</li><li>Pick the option that matches your case — 3 options, such as slow, average and fast. </li><li>A measured quantity, entered by default in hours. The unit chip switches it to any of the 27 supported units.</li><li>Pick the option that matches your case — 5 options, such as chronologically, by length, from shortest and by length, from longest. </li></ul><p>3 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Start date</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr><tr><td><strong>Total time</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>You will finish by</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr><tr><td><strong>My reading speed is</strong></td><td>One of 3 options, such as slow, average and fast.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>I usually read</strong></td><td>A measured quantity, 27 units available.</td><td>hours</td><td>You supply it</td></tr><tr><td><strong>You will finish by</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Order</strong></td><td>One of 5 options, such as chronologically, by length, from shortest and by length, from longest.</td><td>choice</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Olga Tokarczuk books calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Which means I can read...</span><span class="formula-eq">=</span><span class="formula-rhs">my reading speed is…</span></div><div class="formula-row"><span class="formula-lhs">You will finish by</span><span class="formula-eq">=</span><span class="formula-rhs">start date + 4338 ÷ (which means I can read × I usually read)</span></div><div class="formula-row"><span class="formula-lhs">Total time</span><span class="formula-eq">=</span><span class="formula-rhs">end date − start date</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Open the page and it is already filled in. With the values it starts from — <strong>I have</strong> set to little time — I'll read a few books., <strong>Total time</strong> = 360 days, <strong>My reading speed is</strong> set to average and <strong>I usually read</strong> = 1 hrs — it reports <strong>which means I can read</strong> = 0.0001 min.</p><p>Those are real numbers produced by the same engine that runs when you press Calculate, so you can change any single box afterwards and watch the answer move from this starting point.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>which means I can read</strong> = 0.0001 min should be roughly the size you expected from <strong>I have</strong> set to little time — I'll read a few books. and <strong>Total time</strong> = 360 days.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in minutes, and convertible to any of the 27 units on that chip.</li><li>A calendar date.</li><li>Shown in days, and convertible to any of the 27 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in days</li><li>Time, opening in minutes</li><li>Time, opening in hours</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Olga Tokarczuk books calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 3 figures keep coming back — the start date, the end date and the I usually read — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/clock-duration">Clock duration</a>, <a href="/everyday-life/cm-to-mm-ring-size-converter">cm to mm ring size converter</a> and <a href="/everyday-life/cm-to-ring-size-converter">cm to ring size converter</a>.</p>
            TXT],
            ['title' => 'Planning a reading pace, not promising a finish date', 'html' => <<<'TXT'
            <p>This page turns a reading plan into a rough schedule using a start date, a target or time allowance, a reading-speed choice, hours spent reading and an ordering preference. It is a planning tool, not an official bibliography or a publisher’s reading guide. The result depends on the calculator’s built-in assumptions about the amount of material and the selected pace; it cannot know which edition or translation you own, how long its pages are, or whether you plan to read every title included by the page.</p>
            <p>Begin by deciding what “finish” means for your plan. You may want to read a chosen subset, follow a chronological order, or simply set a personal reading window. Select the option closest to that intention, then enter dates that make sense for your calendar. If you are solving for a finish date, use the date input and reading-time fields consistently; if you already have a deadline, compare that date with the estimate rather than treating it as a guarantee.</p>
            <p>The reading-speed selector is a broad assumption. Actual pace varies by language, translation, page layout, font size, familiarity with the subject and whether you pause to take notes. A dense passage read carefully may take much longer than a familiar one. To make the estimate personal, track a few real reading sessions and use the observed pace as a better planning basis where the form allows it. Keep the daily reading-time entry realistic: a plan that assumes uninterrupted time every day may not survive work, travel, illness or simply wanting a day off.</p>
            <p>Dates should be treated as calendar dates, not as promises that every day in the interval will be available for reading. Weekends, holidays and personal commitments can reduce the number of practical sessions. If your schedule is irregular, include a buffer or run a conservative scenario with fewer reading hours. Changing one input at a time—available time, pace or start date—makes it easier to see which assumption has the largest effect on the result.</p>
            <p>Use the order control as an organizational preference, not a claim that one sequence is authoritative. If you have a specific edition or list in mind, compare the calculator’s order with the contents page or publisher information for that edition. Translations and collected editions may arrange works differently, and page counts can vary. The tool does not verify availability, publication order, completeness or the exact contents of a particular book.</p>
            <p>A useful plan leaves room to revise. After the first week or two, compare the estimate with the pages or sessions you actually completed. If you are consistently reading more slowly, update the pace or extend the date instead of turning the difference into a source of pressure. If you are reading for pleasure, the date is simply a helpful milestone. Keep the selected assumptions alongside the output so you can tell later why the estimate changed.</p>
            <p>Use the answer as a starting point for organizing a reading project, perhaps alongside a library due date or a personal goal. It is not a judgment of reading ability, and it does not establish how long any individual will take. The most useful schedule is the one that fits your real routine and still leaves time to enjoy the books.</p>
            TXT],
            ['title' => 'Turn the output into a flexible reading plan', 'html' => <<<'TXT'
            <p>A practical way to use the result is to compare it with a short trial period. Read for the number of sessions you realistically expect in a normal week, then compare your actual pace with the estimate. If a week is unusually busy or unusually free, do not let it define the whole plan; use a few weeks to find a steadier average. Update the time-per-day assumption and recalculate when your routine changes.</p><p>It can also help to divide a long plan into milestones: choose a first checkpoint date, review progress, and then revise the remaining schedule. The calculator estimates a broad end point from its inputs; milestones make it easier to adjust without pretending that reading time is perfectly uniform.</p>
            TXT],
            ['title' => 'Use a finish date as a checkpoint', 'html' => <<<'TXT'
            <p>If the projected date is inconvenient, adjust the reading time or pace assumptions and compare a second scenario. Treat the date as a checkpoint to revisit, not a deadline that must override your enjoyment or other commitments.</p>
            TXT],
            ['title' => 'Keep the plan personal', 'html' => <<<'TXT'
            <p>Some readers pause to reread, take notes or discuss a book; others read in shorter sessions. The model cannot account for those habits, so use your own trial pace and adjust the schedule to leave room for the kind of reading you want.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the Olga Tokarczuk books calculator?', 'a' => 'The form asks for the start date, the end date and the I usually read, which is 6 fields in total.'],
            ['q' => 'Can I enter total time in a different unit?', 'a' => 'Yes. Total time opens in days and the chip beside it offers 27 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports which means I can read = 0.0001 min.'],
        ],
        'related' => [
            ['path' => '/everyday-life/clock-duration', 'name' => 'Clock duration'],
            ['path' => '/everyday-life/cm-to-mm-ring-size-converter', 'name' => 'cm to mm ring size converter'],
            ['path' => '/everyday-life/cm-to-ring-size-converter', 'name' => 'cm to ring size converter'],
        ],
    ],
];
