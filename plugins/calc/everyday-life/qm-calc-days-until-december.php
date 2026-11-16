<?php

/**
 * Days Until December Calculator
 * /everyday-life/days-until-december
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Days Until December Calculator',
    'meta' => ['title' => 'Days Until December — Count to 1 December — Free Tool', 'description' => 'Count calendar days until the next 1 December from any date. The target rolls to the following year after 1 December, with weeks and hours shown for scale.', 'h1' => 'Days Until December Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'today', 'label' => 'Count from', 'type' => 'date', 'default' => '2026-11-30'],
                ['name' => 'next_december', 'label' => 'Next 1 December', 'type' => 'date'],
                [
                    'name' => 'days',
                    'label' => 'Days until December',
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
    'formula' => ['next_december' => 'dateAtYearsOld(20788, getYear(today) - 2026 + if_else(dateAtYearsOld(20788, getYear(today) - 2026) <= today, 1, 0))', 'days' => 'dateAtYearsOld(20788, getYear(today) - 2026 + if_else(dateAtYearsOld(20788, getYear(today) - 2026) <= today, 1, 0)) - today', 'weeks' => '(dateAtYearsOld(20788, getYear(today) - 2026 + if_else(dateAtYearsOld(20788, getYear(today) - 2026) <= today, 1, 0)) - today) / 7', 'hours' => '(dateAtYearsOld(20788, getYear(today) - 2026 + if_else(dateAtYearsOld(20788, getYear(today) - 2026) <= today, 1, 0)) - today) * 24'],
    'article' => [
        'intro' => 'The target is fixed at 1 December. Enter a date and the page selects the next occurrence, whether December is still ahead or has already begun.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            A seasonal countdown needs a rule for the target day. This page means the next 1 December, not the start of the current month if that date has passed. The roll-forward is deliberate: on 30 November the answer is one day; on 1 December it points to the following year's first day of December.<p>The answer is <strong>next 1 December and days until December and weeks and equivalent hours</strong>, worked out from count from. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>next_december</strong></td><td><code>dateAtYearsOld(20788, getYear(Count from) - 2026 + if_else(dateAtYearsOld(20788, getYear(Count from) - 2026) <= Count from, 1, 0))</code></td></tr><tr><td><strong>days</strong></td><td><code>dateAtYearsOld(20788, getYear(Count from) - 2026 + if_else(dateAtYearsOld(20788, getYear(Count from) - 2026) <= Count from, 1, 0)) - Count from</code></td></tr><tr><td><strong>weeks</strong></td><td><code>(dateAtYearsOld(20788, getYear(Count from) - 2026 + if_else(dateAtYearsOld(20788, getYear(Count from) - 2026) <= Count from, 1, 0)) - Count from) ÷ 7</code></td></tr><tr><td><strong>hours</strong></td><td><code>(dateAtYearsOld(20788, getYear(Count from) - 2026 + if_else(dateAtYearsOld(20788, getYear(Count from) - 2026) <= Count from, 1, 0)) - Count from) × 24</code></td></tr></tbody></table><p>The calculator builds 1 December in the input year, compares it with the selected date, and advances one year if that target is today or earlier. It then subtracts the reference day number.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill. It reports next 1 December and days until December and weeks and equivalent hours.</p><ul><li><strong>Count from</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Next 1 December</strong>.</li><li><strong>Days until December</strong> — days.</li><li><strong>Weeks</strong> — weeks.</li><li><strong>Equivalent hours</strong> — hours.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put count from = 30 November 2026 into the form and the panel reads:</p><ul><li><strong>Next 1 December</strong> = <code>dateAtYearsOld(20788, getYear(Count from) - 2026 + if_else(dateAtYearsOld(20788, getYear(Count from) - 2026) <= Count from, 1, 0))</code> = <strong>1 December 2026</strong></li><li><strong>Days until December</strong> = <code>dateAtYearsOld(20788, getYear(Count from) - 2026 + if_else(dateAtYearsOld(20788, getYear(Count from) - 2026) <= Count from, 1, 0)) - Count from</code> = <strong>1 days</strong></li><li><strong>Weeks</strong> = <code>(dateAtYearsOld(20788, getYear(Count from) - 2026 + if_else(dateAtYearsOld(20788, getYear(Count from) - 2026) <= Count from, 1, 0)) - Count from) ÷ 7</code> = <strong>0.143 weeks</strong></li><li><strong>Equivalent hours</strong> = <code>(dateAtYearsOld(20788, getYear(Count from) - 2026 + if_else(dateAtYearsOld(20788, getYear(Count from) - 2026) <= Count from, 1, 0)) - Count from) × 24</code> = <strong>24 hours</strong></li></ul><p>The exact-target rule matters. A countdown normally means the next occurrence strictly after the reference day, so selecting 1 December does not return zero; it returns the next year's event. If you need a countdown that treats today as the event day, change that convention explicitly. The hour line is a date-based 24-hour equivalent. It does not know the event's local start time, location or time zone. The target is a calendar marker, not a promise that a seasonal event, holiday or business closure follows the same date in every country.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>dateAtYearsOld(20788, getYear(20 787) - 2026 + if_else(dateAtYearsOld(20788, getYear(20 787) - 2026) <= 20 787, 1, 0))</code>, which comes to <strong>1 December 2026</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>From 30 November 2026, the next 1 December is one day away, or 24 equivalent hours. On 1 December itself, the next occurrence is 1 December 2027, 365 days later.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Next 1 December</th><th>Days until December</th><th>Weeks</th><th>Equivalent hours</th></tr></thead><tbody><tr><td><strong>Count from</strong> +1 day</td><td>+365 d</td><td>+36 400 %</td><td>+36 400 %</td><td>+36 400 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Count from</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Count from</strong> opens at 30 November 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => '<ul></ul>'],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Mixing elapsed days with inclusive dates.</strong> Subtracting dates gives the distance between them. Counting both endpoints adds one, which is right for a list of dates and wrong for nights away.</li><li><strong>Assuming a month is thirty days.</strong> Month lengths vary, and an anniversary can land on the last day of a shorter month.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Calendar dates, not local clock hours.</strong> Daylight-saving changes and time zones do not alter a date-only result.</li></li><li><li><strong>Named conventions matter.</strong> If a contract, school or workplace defines its own first and last day, use that wording rather than guessing.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'The calendar detail behind this answer', 'html' => <<<'TXT'
            The exact-target rule matters. A countdown normally means the next occurrence strictly after the reference day, so selecting 1 December does not return zero; it returns the next year's event. If you need a countdown that treats today as the event day, change that convention explicitly. The hour line is a date-based 24-hour equivalent. It does not know the event's local start time, location or time zone. The target is a calendar marker, not a promise that a seasonal event, holiday or business closure follows the same date in every country.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need count from. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Next 1 december and days until december and weeks and equivalent hours should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking an event or filing date against a calendar.</li></li><li><li>Comparing a result with a paper diary before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/days-until-june">Days until June</a> <a href="/everyday-life/date-countdown">Date countdown</a> <a href="/everyday-life/calendar">Calendar calculator</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Count from</strong> +10 days</td><td>1 December 2026</td><td>1 December 2027</td><td>+365 d</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
            ['title' => 'Practical assumptions and checks', 'html' => <<<'TXT'
            <p>This countdown targets the next December 1 after the reference date. If the selected date is already December 1 or later, the next target rolls into the following year; check the target year shown in the result so the page does not appear to count backward unexpectedly. The weeks and hours are equivalent scales derived from the calendar-day interval.</p><p>A date-only countdown does not specify what time on December 1 an event begins, and its hour conversion may assume full 24-hour days. For travel or a deadline with a specific time zone, use a date-and-time countdown and confirm the local time. If you are counting to a school or work event, verify the actual calendar date because schedules can vary by year.</p>
            TXT],
            ['title' => 'Detailed use notes', 'html' => <<<'TXT'
            <p>The target is the next December 1 relative to the date entered. Before December 1, the target is in the current year; on or after that date, the next occurrence is in the following year. Check the displayed target year and weekday when the answer seems longer than expected. This recurring-date logic makes the tool useful for annual events as well as a one-off countdown.</p><p>The day count is calendar-based. Weeks are a grouping of days, and hours are usually a 24-hour-per-day equivalent rather than a live measurement to a particular moment. If an event begins at a specific local time, include that time and zone in your planning. A school, travel or legal deadline may use a different endpoint or holiday rule, which the calculator does not infer.</p>
            TXT],
            ['title' => 'Before using the estimate', 'html' => <<<'TXT'
            <p>December 1 is a date target, not a period of 12 months from today. A reference date late in the year can be only a few days before the target, while a date just after December 1 points to the next year. For planning, compare the generated date with your calendar and make sure the result refers to the year you intend. This is especially helpful when you use the same countdown each year.</p><p>If you are counting to an event on December 1, add its start time and location separately. Hours converted from days do not identify a live moment, and local daylight-saving rules can affect actual elapsed time. The calculator does not know whether an event is a public holiday or whether a business deadline moves to the next working day.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Days Until December calculator work out?', 'a' => <<<'TXT'
            It returns next 1 December and days until December and weeks and equivalent hours from count from. The relationship is dateAtYearsOld(20788, getYear(Count from) - 2026 + if_else(dateAtYearsOld(20788, getYear(Count from) - 2026) <= Count from, 1, 0)).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Count from. Everything else is computed.'],
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
            ['q' => 'Does it count to this December or next December?', 'a' => 'It uses the next 1 December strictly after the date entered.'],
            ['q' => 'What happens on 1 December?', 'a' => 'The target rolls to 1 December the following year.'],
            ['q' => 'Is December 1 the start of the month?', 'a' => 'Yes, that is the fixed target date used here.'],
            ['q' => 'Are hours timezone-aware?', 'a' => 'No. They are 24 times the calendar-day distance.'],
        ],
        'related' => [
            ['path' => '/everyday-life/days-until-june', 'name' => 'Days until June'],
            ['path' => '/everyday-life/date-countdown', 'name' => 'Date countdown'],
            ['path' => '/everyday-life/calendar', 'name' => 'Calendar calculator'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
