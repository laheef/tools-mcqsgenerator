<?php

/**
 * Slack Time Calculator
 * /everyday-life/slack-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Slack Time Calculator',
    'meta' => ['title' => 'Slack Time — Date Window Between Two Starts', 'description' => 'Measure the calendar slack between an earliest possible start and a latest acceptable start. Read the same window in days, weeks and equivalent hours for.', 'h1' => 'Slack Time Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'earliest', 'label' => 'Earliest possible start', 'type' => 'date', 'default' => '2026-10-23'],
                ['name' => 'latest', 'label' => 'Latest acceptable start', 'type' => 'date', 'default' => '2026-10-30'],
                [
                    'name' => 'days',
                    'label' => 'Slack window',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'weeks',
                    'label' => 'Weeks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'weeks',
                ],
                [
                    'name' => 'hours',
                    'label' => 'Equivalent hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'hours',
                ],
            ],
        ],
    ],
    'formula' => ['days' => 'latest - earliest', 'weeks' => '(latest - earliest) / 7', 'hours' => '(latest - earliest) * 24'],
    'article' => [
        'intro' => 'Project slack is the room between two dates: the earliest a task can start and the latest it can start without moving a later milestone.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            Slack is not spare time in every sense. In a schedule, it is the delay available before a downstream date is affected. The useful quantity is the gap between the earliest workable start and the latest start that still protects the milestone.<p>The answer is <strong>slack window and weeks and equivalent hours</strong>, worked out from earliest possible start and latest acceptable start. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>days</strong></td><td><code>Latest acceptable start - Earliest possible start</code></td></tr><tr><td><strong>weeks</strong></td><td><code>(Latest acceptable start - Earliest possible start) ÷ 7</code></td></tr><tr><td><strong>hours</strong></td><td><code>(Latest acceptable start - Earliest possible start) × 24</code></td></tr></tbody></table><p>Subtract the earliest start from the latest acceptable start. Weeks and hours are conversions of that date difference; no holidays or work calendars are removed.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports slack window and weeks and equivalent hours.</p><ul><li><strong>Earliest possible start</strong>.</li><li><strong>Latest acceptable start</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Slack window</strong> — days.</li><li><strong>Weeks</strong> — weeks.</li><li><strong>Equivalent hours</strong> — hours.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put earliest possible start = 23 October 2026, latest acceptable start = 30 October 2026 into the form and the panel reads:</p><ul><li><strong>Slack window</strong> = <code>Latest acceptable start - Earliest possible start</code> = <strong>7 days</strong></li><li><strong>Weeks</strong> = <code>(Latest acceptable start - Earliest possible start) ÷ 7</code> = <strong>1 weeks</strong></li><li><strong>Equivalent hours</strong> = <code>(Latest acceptable start - Earliest possible start) × 24</code> = <strong>168 hours</strong></li></ul><p>This simple slack value is a calendar-day window, not a critical-path network analysis. Dependencies, task durations, resource availability and working-day calendars can all change project float. If a project counts only business days, use those dates with a working-day calculation instead. The result can be negative when the latest date is earlier than the earliest; that signals the window has already been exceeded under the two dates entered. Keep the milestone assumption beside the number when reporting it, because a gap alone does not state what work it protects.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 756 - 20 749</code>, which comes to <strong>7 days</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>An earliest start of 23 October and latest acceptable start of 30 October leave seven calendar days, exactly one week or 168 equivalent hours. Moving the latest date to 1 November gives nine days.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Slack window</th><th>Weeks</th><th>Equivalent hours</th></tr></thead><tbody><tr><td><strong>Earliest possible start</strong> +1 day</td><td>−14.29 %</td><td>−14.29 %</td><td>−14.29 %</td></tr><tr><td><strong>Latest acceptable start</strong> +1 day</td><td>+14.29 %</td><td>+14.29 %</td><td>+14.29 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Earliest possible start</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Earliest possible start</strong> opens at 23 October 2026</li><li><strong>Latest acceptable start</strong> opens at 30 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => '<ul></ul>'],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Changing the period without changing its unit.</strong> A weekly figure and a yearly figure are comparable only after the number of weeks in the year is stated.</li><li><strong>Treating an estimate as a live clock.</strong> The page calculates from the dates and rates entered; it does not watch the calendar or update a deadline in real time.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Inputs define the result.</strong> The page does not fetch calendars, prices or personal records from another service.</li></li><li><li><strong>Local rules can differ.</strong> Holidays, leap years, time zones and contract definitions may change how a real deadline is counted.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'The assumptions behind the estimate', 'html' => <<<'TXT'
            This simple slack value is a calendar-day window, not a critical-path network analysis. Dependencies, task durations, resource availability and working-day calendars can all change project float. If a project counts only business days, use those dates with a working-day calculation instead. The result can be negative when the latest date is earlier than the earliest; that signals the window has already been exceeded under the two dates entered. Keep the milestone assumption beside the number when reporting it, because a gap alone does not state what work it protects.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need earliest possible start and latest acceptable start. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Slack window and weeks and equivalent hours should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning a date or recurring activity with the stated assumptions.</li></li><li><li>Comparing the result with a calendar or record before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/working-days">Working days</a> <a href="/everyday-life/deadline">Deadline calculator</a> <a href="/everyday-life/calendar">Calendar calculator</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Earliest possible start</strong> +10 days</td><td>7</td><td>-3</td><td>×-0.429</td></tr><tr><td><strong>Latest acceptable start</strong> +10 days</td><td>7</td><td>17</td><td>×2.429</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Slack Time calculator work out?', 'a' => <<<'TXT'
            It returns slack window and weeks and equivalent hours from earliest possible start and latest acceptable start. The relationship is Latest acceptable start - Earliest possible start.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Earliest possible start, Latest acceptable start. Everything else is computed.'],
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
            ['q' => 'Is slack the same as task duration?', 'a' => 'No. It is the gap between two possible start dates.'],
            ['q' => 'Are weekends counted?', 'a' => 'Yes. These are calendar days, not business days.'],
            ['q' => 'Can slack be negative?', 'a' => 'Yes. A negative result means the latest date precedes the earliest date.'],
            ['q' => 'Does this calculate a critical path?', 'a' => 'No. It compares only the two dates supplied.'],
        ],
        'related' => [
            ['path' => '/everyday-life/working-days', 'name' => 'Working days'],
            ['path' => '/everyday-life/deadline', 'name' => 'Deadline calculator'],
            ['path' => '/everyday-life/calendar', 'name' => 'Calendar calculator'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
