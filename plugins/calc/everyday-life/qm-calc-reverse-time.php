<?php

/**
 * Reverse Time Calculator
 * /everyday-life/reverse-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Reverse Time Calculator',
    'meta' => ['title' => 'Reverse Time — Convert an Interval to a Rate', 'description' => 'Turn a repeat interval into a frequency per second, hour, day, week, month and year. Choose the interval unit; month and year outputs use stated average.', 'h1' => 'Reverse Time Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'interval',
                    'label' => 'One event every',
                    'type' => 'number',
                    'default' => '2',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'unit_days',
                    'label' => 'Interval unit',
                    'type' => 'select',
                    'options' => [
                        'Seconds' => 1.1574074074074073E-5,
                        'Minutes' => 0.0006944444444444445,
                        'Hours' => 0.041666666666666664,
                        'Days' => 1,
                        'Weeks' => 7,
                        'Months (average)' => 30.436875,
                        'Years (average)' => 365.2425,
                    ],
                    'control' => 'SELECT',
                    'default' => 'Days',
                ],
                [
                    'name' => 'per_second',
                    'label' => 'Events per second',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'events/s',
                ],
                [
                    'name' => 'per_hour',
                    'label' => 'Events per hour',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'events/h',
                ],
                [
                    'name' => 'per_day',
                    'label' => 'Events per day',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'events/day',
                ],
                [
                    'name' => 'per_week',
                    'label' => 'Events per week',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'events/week',
                ],
                [
                    'name' => 'per_month',
                    'label' => 'Events per average month',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'events/month',
                ],
                [
                    'name' => 'per_year',
                    'label' => 'Events per average year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'events/year',
                ],
                [
                    'name' => 'seconds_between',
                    'label' => 'Seconds between events',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 's',
                ],
            ],
        ],
    ],
    'formula' => [
        'per_second' => '1 / (interval * unit_days * 86400)',
        'per_hour' => '3600 / (interval * unit_days * 86400)',
        'per_day' => '1 / (interval * unit_days)',
        'per_week' => '7 / (interval * unit_days)',
        'per_month' => '30.436875 / (interval * unit_days)',
        'per_year' => '365.2425 / (interval * unit_days)',
        'seconds_between' => 'interval * unit_days * 86400',
    ],
    'article' => [
        'intro' => 'If something happens once every few days or weeks, its rate per day or year is the reciprocal interval. Enter the interval and its unit to compare scales.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            A rate can be phrased either as events per unit of time or as a time gap between events. The reciprocal connects those readings. This page accepts the gap and changes it into rates at several scales, useful when a small interval is hard to picture over a week or year.<p>The answer is <strong>events per second and events per hour and events per day and events per week and events per average month and events per average year and seconds between events</strong>, worked out from one event every and interval unit. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>per_second</strong></td><td><code>1 ÷ (One event every × Interval unit × 86400)</code></td></tr><tr><td><strong>per_hour</strong></td><td><code>3600 ÷ (One event every × Interval unit × 86400)</code></td></tr><tr><td><strong>per_day</strong></td><td><code>1 ÷ (One event every × Interval unit)</code></td></tr><tr><td><strong>per_week</strong></td><td><code>7 ÷ (One event every × Interval unit)</code></td></tr><tr><td><strong>per_month</strong></td><td><code>30.436875 ÷ (One event every × Interval unit)</code></td></tr><tr><td><strong>per_year</strong></td><td><code>365.2425 ÷ (One event every × Interval unit)</code></td></tr><tr><td><strong>seconds_between</strong></td><td><code>One event every × Interval unit × 86400</code></td></tr></tbody></table><p>Convert the selected interval to days, then divide the chosen period length by that interval. Seconds between events is the interval in days times 86,400.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports events per second and events per hour and events per day and events per week and events per average month and events per average year and seconds between events.</p><ul><li><strong>One event every</strong>.</li><li><strong>Interval unit</strong>. A choice: Seconds, Minutes, Hours, Days, Weeks, Months (average), Years (average).</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Events per second</strong> — events/s.</li><li><strong>Events per hour</strong> — events/h.</li><li><strong>Events per day</strong> — events/day.</li><li><strong>Events per week</strong> — events/week.</li><li><strong>Events per average month</strong> — events/month.</li><li><strong>Events per average year</strong> — events/year.</li><li><strong>Seconds between events</strong> — s.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put one event every = 2, interval unit = 1 into the form and the panel reads:</p><ul><li><strong>Events per second</strong> = <code>1 ÷ (One event every × Interval unit × 86400)</code> = <strong>5.787 × 10<sup>-6</sup> events/s</strong></li><li><strong>Events per hour</strong> = <code>3600 ÷ (One event every × Interval unit × 86400)</code> = <strong>0.021 events/h</strong></li><li><strong>Events per day</strong> = <code>1 ÷ (One event every × Interval unit)</code> = <strong>0.5 events/day</strong></li><li><strong>Events per week</strong> = <code>7 ÷ (One event every × Interval unit)</code> = <strong>3.5 events/week</strong></li><li><strong>Events per average month</strong> = <code>30.436875 ÷ (One event every × Interval unit)</code> = <strong>15.218 events/month</strong></li><li><strong>Events per average year</strong> = <code>365.2425 ÷ (One event every × Interval unit)</code> = <strong>182.621 events/year</strong></li><li><strong>Seconds between events</strong> = <code>One event every × Interval unit × 86400</code> = <strong>172 800 s</strong></li></ul><p>Rates per month and year are averages, not calendar schedules. The month uses 30.436875 days and the year 365.2425 days. If events occur on particular calendar dates, actual counts depend on the months and leap years crossed. The interval field must be positive; zero has no reciprocal. Repeating events can also be irregular in real life, and the page assumes the gap stays constant. The output is a mathematical rate, not a forecast of when a sporadic event will occur.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>One event every two days is 0.5 per day, 3.5 per week and about 182.621 events per average year. The same interval is 172,800 seconds. A 30-minute interval is two events an hour and 48 a day.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Events per second</th><th>Events per hour</th><th>Events per day</th><th>Events per week</th><th>Events per average month</th><th>Events per average year</th><th>Seconds between events</th></tr></thead><tbody><tr><td><strong>One event every</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Interval unit</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>One event every</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>One event every</strong> opens at 2</li><li><strong>Interval unit</strong> opens at 1</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>One event every</th><th>Events per second</th><th>Events per hour</th><th>Events per day</th><th>Events per week</th><th>Events per average month</th><th>Events per average year</th><th>Seconds between events</th></tr></thead><tbody><tr><td>1</td><td>1.157 × 10<sup>-5</sup></td><td>0.042</td><td>1</td><td>7</td><td>30.437</td><td>365.243</td><td>86 400</td></tr><tr><td>2</td><td>5.787 × 10<sup>-6</sup></td><td>0.021</td><td>0.5</td><td>3.5</td><td>15.218</td><td>182.621</td><td>172 800</td></tr><tr><td>4</td><td>2.894 × 10<sup>-6</sup></td><td>0.01</td><td>0.25</td><td>1.75</td><td>7.609</td><td>91.311</td><td>345 600</td></tr><tr><td>10</td><td>1.157 × 10<sup>-6</sup></td><td>0.004</td><td>0.1</td><td>0.7</td><td>3.044</td><td>36.524</td><td>864 000</td></tr><tr><td>20</td><td>5.787 × 10<sup>-7</sup></td><td>0.002</td><td>0.05</td><td>0.35</td><td>1.522</td><td>18.262</td><td>1.728 × 10<sup>6</sup></td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => '<ul></ul>'],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Changing the period without changing its unit.</strong> A weekly figure and a yearly figure are comparable only after the number of weeks in the year is stated.</li><li><strong>Treating an estimate as a live clock.</strong> The page calculates from the dates and rates entered; it does not watch the calendar or update a deadline in real time.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Inputs define the result.</strong> The page does not fetch calendars, prices or personal records from another service.</li></li><li><li><strong>Local rules can differ.</strong> Holidays, leap years, time zones and contract definitions may change how a real deadline is counted.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'The assumptions behind the estimate', 'html' => <<<'TXT'
            Rates per month and year are averages, not calendar schedules. The month uses 30.436875 days and the year 365.2425 days. If events occur on particular calendar dates, actual counts depend on the months and leap years crossed. The interval field must be positive; zero has no reciprocal. Repeating events can also be irregular in real life, and the page assumes the gap stays constant. The output is a mathematical rate, not a forecast of when a sporadic event will occur.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need one event every and interval unit. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Events per second and events per hour and events per day and events per week and events per average month and events per average year and seconds between events should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning a date or recurring activity with the stated assumptions.</li></li><li><li>Comparing the result with a calendar or record before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/time-between-dates">Time between dates</a> <a href="/everyday-life/days-between-dates">Days between dates</a> <a href="/everyday-life/hour-countdown">Hour countdown</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>One event every</strong> ×10</td><td>5.787 × 10<sup>-6</sup></td><td>5.787 × 10<sup>-7</sup></td><td>ten times smaller</td></tr><tr><td><strong>Interval unit</strong> ×10</td><td>5.787 × 10<sup>-6</sup></td><td>5.787 × 10<sup>-7</sup></td><td>ten times smaller</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Reverse Time calculator work out?', 'a' => <<<'TXT'
            It returns events per second and events per hour and events per day and events per week and events per average month and events per average year and seconds between events from one event every and interval unit. The relationship is 1 ÷ (One event every × Interval unit × 86400).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'One event every, Interval unit. Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: . The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why does it say 0.5 events per day?', 'a' => 'An event every two days averages half an event per day.'],
            ['q' => 'Are months exact?', 'a' => 'No. The monthly result uses a 30.436875-day average month.'],
            ['q' => 'What happens for a zero interval?', 'a' => 'A zero gap has no defined reciprocal; enter a positive interval.'],
            ['q' => 'Does it predict an event date?', 'a' => 'No. It converts a repeated interval to rates.'],
        ],
        'related' => [
            ['path' => '/everyday-life/time-between-dates', 'name' => 'Time between dates'],
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
            ['path' => '/everyday-life/hour-countdown', 'name' => 'Hour countdown'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
