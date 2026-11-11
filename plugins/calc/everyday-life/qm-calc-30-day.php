<?php

/**
 * 30 Days From a Date Calculator
 * /everyday-life/30-day
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => '30 Days From a Date Calculator',
    'meta' => ['title' => '30 Days From a Date — Date, Weekday and Backwards', 'description' => 'Thirty days after a date and thirty days before it, with the weekday the later date falls on, for credit terms, notice and returns written in days. Formula.', 'h1' => '30 Days From a Date Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'date', 'label' => 'Starting date', 'type' => 'date', 'default' => '2026-10-23'],
                ['name' => 'after', 'label' => '30 days later', 'type' => 'date'],
                ['name' => 'before', 'label' => '30 days earlier', 'type' => 'date'],
                [
                    'name' => 'weekday',
                    'label' => 'Weekday 30 days later (1 is Monday)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => ['after' => 'date + 30', 'before' => 'date - 30', 'weekday' => 'mod(date + 33, 7) + 1'],
    'article' => [
        'intro' => <<<'TXT'
        The date thirty days from any starting date, the date thirty days before it, and the weekday the later one lands on. A month boundary changes nothing; the count is days.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Thirty days is the rhythm of a dozen everyday rules: a credit term, a return window, a notice period, a doctor's follow-up. The awkward part is never the arithmetic, it is the calendar. Thirty days after 31 January is in March, and thirty days after 15 March lands on 14 April, because March has thirty-one days and April has thirty.</p><p>This page works in days, not months. That is the point: a term written as thirty days is a different promise from a term written as one month, and the two drift apart four or five days every quarter.</p><p>The answer is <strong>30 days later and 30 days earlier and weekday 30 days later</strong>, worked out from starting date. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>after</strong></td><td><code>Starting date + 30</code></td></tr><tr><td><strong>before</strong></td><td><code>Starting date - 30</code></td></tr><tr><td><strong>weekday</strong></td><td><code>mod(Starting date + 33, 7) + 1</code></td></tr></tbody></table><p>The later date is the starting day number plus 30; the earlier one is the same subtraction the other way. Both are calendar days, so a month boundary costs nothing: 30 days after 15 January is a date in February whatever February's length happens to be.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill. It reports 30 days later and 30 days earlier and weekday 30 days later.</p><ul><li><strong>Starting date</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>30 days later</strong>.</li><li><strong>30 days earlier</strong>.</li><li><strong>Weekday 30 days later (1 is Monday)</strong>.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put starting date = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>30 days later</strong> = <code>Starting date + 30</code> = <strong>22 November 2026</strong></li><li><strong>30 days earlier</strong> = <code>Starting date - 30</code> = <strong>23 September 2026</strong></li><li><strong>Weekday 30 days later (1 is Monday)</strong> = <code>mod(Starting date + 33, 7) + 1</code> = <strong>7</strong></li></ul><p>Written down, a thirty-day term is safest as two dates. "Within thirty days of the invoice" is the version that gets argued about.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 749 + 30</code>, which comes to <strong>22 November 2026</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>30 days after 23 October 2026 is 22 November 2026, a Sunday, and 30 days before it is 23 September 2026. The count crosses two month boundaries and neither of them changes the answer by a day.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>30 days later</th><th>30 days earlier</th><th>Weekday 30 days later (1 is Monday)</th></tr></thead><tbody><tr><td><strong>Starting date</strong> +1 day</td><td>+1 d</td><td>+1 d</td><td>−85.71 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Starting date</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Starting date</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set starting date = 31 January 2026: <strong>30 days later</strong> = 2 March 2026, <strong>30 days earlier</strong> = 1 January 2026, <strong>Weekday 30 days later (1 is Monday)</strong> = 1. Thirty days after the last day of January lands on 2 March, because February is short: the month boundary is where a hand count goes wrong.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Reading it as one month.</strong> Thirty days after 30 January is 1 March in a non-leap year; one month after 30 January is 28 February.</li><li><strong>Counting the starting day.</strong> The span is a subtraction, so the day you start on is day zero and the thirtieth day is the answer.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Calendar days, not working days.</strong> Weekends and holidays count; the working-days page is the other count.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need starting date. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> 30 days later and 30 days earlier and weekday 30 days later should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Dating a credit invoice due in thirty days.</li></li><li><li>Setting the end of a thirty-day return window.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/add-days">Add days</a> <a href="/everyday-life/45-day">45 days from a date</a> <a href="/everyday-life/60-day">60 days from a date</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Starting date</strong> +10 days</td><td>22 November 2026</td><td>2 December 2026</td><td>+10 d</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the 30 Days From a Date calculator work out?', 'a' => 'It returns 30 days later and 30 days earlier and weekday 30 days later from starting date. The relationship is Starting date + 30.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Starting date. Everything else is computed.'],
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
            ['q' => 'Is thirty days the same as one month?', 'a' => 'Only in the months that have thirty days. Otherwise the two drift, and a contract that says both is a contract with two answers.'],
            ['q' => 'Does the starting date count as day one?', 'a' => 'No. The answer is thirty days after it, so the starting date is day zero.'],
            ['q' => 'Why show the weekday?', 'a' => 'Because a deadline that falls on a Sunday is usually moved, and the weekday is the first thing you need to know about it.'],
        ],
        'related' => [
            ['path' => '/everyday-life/add-days', 'name' => 'Add days'],
            ['path' => '/everyday-life/45-day', 'name' => '45 days from a date'],
            ['path' => '/everyday-life/60-day', 'name' => '60 days from a date'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
