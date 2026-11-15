<?php

/**
 * Vacation Countdown Calculator
 * /everyday-life/vacation-countdown
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Vacation Countdown Calculator',
    'meta' => ['title' => 'Vacation Countdown — Days Until Your Trip — Free Tool', 'description' => 'Count the days and weeks from a reference date to the first day of a vacation, then see equivalent hours. Set both dates explicitly for a countdown you can.', 'h1' => 'Vacation Countdown Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'today', 'label' => 'Count from', 'type' => 'date', 'default' => '2026-10-23'],
                ['name' => 'event_date', 'label' => 'Target date', 'type' => 'date', 'default' => '2026-12-25'],
                [
                    'name' => 'days',
                    'label' => 'Days remaining',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'weeks',
                    'label' => 'Complete weeks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'weeks',
                ],
                [
                    'name' => 'extra_days',
                    'label' => 'Days after full weeks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
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
    'formula' => ['days' => 'event_date - today', 'weeks' => 'floor((event_date - today) / 7)', 'extra_days' => '(event_date - today) - 7 * floor((event_date - today) / 7)', 'hours' => '(event_date - today) * 24'],
    'article' => [
        'intro' => 'A trip countdown is easier to trust when it says which day it starts from. Enter the date you are counting from and the first day of the vacation.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            A trip countdown is easier to trust when it says which day it starts from. Enter the date you are counting from and the first day of the vacation.<p>The answer is <strong>days remaining and complete weeks and days after full weeks and equivalent hours</strong>, worked out from count from and target date. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>days</strong></td><td><code>Target date - Count from</code></td></tr><tr><td><strong>weeks</strong></td><td><code>floor((Target date - Count from) ÷ 7)</code></td></tr><tr><td><strong>extra_days</strong></td><td><code>(Target date - Count from) - 7 × floor((Target date - Count from) ÷ 7)</code></td></tr><tr><td><strong>hours</strong></td><td><code>(Target date - Count from) × 24</code></td></tr></tbody></table><p>Subtract the count-from date from the vacation date. Convert the same difference into weeks and 24-hour day equivalents.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports days remaining and complete weeks and days after full weeks and equivalent hours.</p><ul><li><strong>Count from</strong>.</li><li><strong>Target date</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Days remaining</strong> — days.</li><li><strong>Complete weeks</strong> — weeks.</li><li><strong>Days after full weeks</strong> — days.</li><li><strong>Equivalent hours</strong> — hours.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put count from = 23 October 2026, target date = 25 December 2026 into the form and the panel reads:</p><ul><li><strong>Days remaining</strong> = <code>Target date - Count from</code> = <strong>63 days</strong></li><li><strong>Complete weeks</strong> = <code>floor((Target date - Count from) ÷ 7)</code> = <strong>9 weeks</strong></li><li><strong>Days after full weeks</strong> = <code>(Target date - Count from) - 7 × floor((Target date - Count from) ÷ 7)</code> = <strong>0 days</strong></li><li><strong>Equivalent hours</strong> = <code>(Target date - Count from) × 24</code> = <strong>1 512 hours</strong></li></ul><p>This page counts calendar dates only. It does not include flight departure times, hotel check-in, travel across time zones, or the day you return unless you enter that as the target. A holiday from 25 December through 2 January can be described as eight nights or nine named dates; choose the endpoint that answers your question. The calculator does not check tickets, weather or travel advisories. Its job is the date difference, not the trip itself. Once plans change, update the target date and keep the reference date visible when sharing the number.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 812 - 20 749</code>, which comes to <strong>63 days</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A vacation beginning on 25 December 2026 is 63 days after 23 October: exactly nine weeks and 1,512 equivalent hours.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Days remaining</th><th>Complete weeks</th><th>Days after full weeks</th><th>Equivalent hours</th></tr></thead><tbody><tr><td><strong>Count from</strong> +1 day</td><td>−1.59 %</td><td>−11.11 %</td><td>—</td><td>−1.59 %</td></tr><tr><td><strong>Target date</strong> +1 day</td><td>+1.59 %</td><td>+0 %</td><td>—</td><td>+1.59 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Count from</strong>. <strong>Target date</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Count from</strong> opens at 23 October 2026</li><li><strong>Target date</strong> opens at 25 December 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
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
            This page counts calendar dates only. It does not include flight departure times, hotel check-in, travel across time zones, or the day you return unless you enter that as the target. A holiday from 25 December through 2 January can be described as eight nights or nine named dates; choose the endpoint that answers your question. The calculator does not check tickets, weather or travel advisories. Its job is the date difference, not the trip itself. Once plans change, update the target date and keep the reference date visible when sharing the number.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need count from and target date. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Days remaining and complete weeks and days after full weeks and equivalent hours should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning a date or recurring activity with the stated assumptions.</li></li><li><li>Comparing the result with a calendar or record before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/date-countdown">Date countdown</a> <a href="/everyday-life/time-until">Time until</a> <a href="/everyday-life/calendar-countdown">Calendar countdown</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Count from</strong> +10 days</td><td>63</td><td>53</td><td>×0.841</td></tr><tr><td><strong>Target date</strong> +10 days</td><td>63</td><td>73</td><td>×1.159</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Vacation Countdown calculator work out?', 'a' => <<<'TXT'
            It returns days remaining and complete weeks and days after full weeks and equivalent hours from count from and target date. The relationship is Target date - Count from.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Count from, Target date. Everything else is computed.'],
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
            ['q' => 'Is the return date included?', 'a' => 'Only if you set the target to the return date; the page compares the two dates entered.'],
            ['q' => 'Does it count nights?', 'a' => 'No. It reports elapsed calendar days, which often corresponds to nights for a stay.'],
            ['q' => 'Does it update by itself?', 'a' => 'No. Set a new reference date to refresh a saved calculation.'],
            ['q' => 'Does it include travel time zones?', 'a' => 'No. It is date-only arithmetic.'],
        ],
        'related' => [
            ['path' => '/everyday-life/date-countdown', 'name' => 'Date countdown'],
            ['path' => '/everyday-life/time-until', 'name' => 'Time until'],
            ['path' => '/everyday-life/calendar-countdown', 'name' => 'Calendar countdown'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
