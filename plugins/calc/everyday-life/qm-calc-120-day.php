<?php

/**
 * 120 Days From a Date Calculator
 * /everyday-life/120-day
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => '120 Days From a Date Calculator',
    'meta' => ['title' => '120 Days From a Date — Date, Weekday and Four Months', 'description' => 'The date 120 days after and before any day, with the weekday it lands on, for four-month terms, extension windows and project milestones. Formula shown.', 'h1' => '120 Days From a Date Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'date', 'label' => 'Starting date', 'type' => 'date', 'default' => '2026-10-23'],
                ['name' => 'after', 'label' => '120 days later', 'type' => 'date'],
                ['name' => 'before', 'label' => '120 days earlier', 'type' => 'date'],
                [
                    'name' => 'weekday',
                    'label' => 'Weekday 120 days later (1 is Monday)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => ['after' => 'date + 120', 'before' => 'date - 120', 'weekday' => 'mod(date + 123, 7) + 1'],
    'article' => [
        'intro' => 'Four months\' worth of days in both directions. Used where a rule wants a third of a year without the calendar deciding which third.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>One hundred and twenty days is the number behind a good deal of paperwork: an application window, an extension notice, a milestone in a schedule, a retention period. It is also the point where people stop counting on fingers and start guessing, which is where a deadline quietly moves by a week.</p><p>The page gives both directions. Forwards is when something expires; backwards is when it must have started in order to expire now, which is the question that actually comes up in an audit.</p><p>The answer is <strong>120 days later and 120 days earlier and weekday 120 days later</strong>, worked out from starting date. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>after</strong></td><td><code>Starting date + 120</code></td></tr><tr><td><strong>before</strong></td><td><code>Starting date - 120</code></td></tr><tr><td><strong>weekday</strong></td><td><code>mod(Starting date + 123, 7) + 1</code></td></tr></tbody></table><p>The later date is the starting day number plus 120; the earlier one is the same subtraction the other way. Both are calendar days, so a month boundary costs nothing: 120 days after 15 January is a date in February whatever February's length happens to be.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill. It reports 120 days later and 120 days earlier and weekday 120 days later.</p><ul><li><strong>Starting date</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>120 days later</strong>.</li><li><strong>120 days earlier</strong>.</li><li><strong>Weekday 120 days later (1 is Monday)</strong>.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put starting date = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>120 days later</strong> = <code>Starting date + 120</code> = <strong>20 February 2027</strong></li><li><strong>120 days earlier</strong> = <code>Starting date - 120</code> = <strong>25 June 2026</strong></li><li><strong>Weekday 120 days later (1 is Monday)</strong> = <code>mod(Starting date + 123, 7) + 1</code> = <strong>6</strong></li></ul><p>A Saturday landing is worth noticing: an extension clause that says "120 days" without saying what happens at a weekend leaves the last three days in doubt.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 749 + 120</code>, which comes to <strong>20 February 2027</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>120 days after 23 October 2026 is 20 February 2027, a Saturday, and 120 days before it is 25 June 2026. Four calendar months would be 23 February, three days later.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>120 days later</th><th>120 days earlier</th><th>Weekday 120 days later (1 is Monday)</th></tr></thead><tbody><tr><td><strong>Starting date</strong> +1 day</td><td>+1 d</td><td>+1 d</td><td>+16.67 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Starting date</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Starting date</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set starting date = 28 February 2026: <strong>120 days later</strong> = 28 June 2026, <strong>120 days earlier</strong> = 31 October 2025, <strong>Weekday 120 days later (1 is Monday)</strong> = 7. 120 days after the last day of February is 28 June, which is the check that the count does not stumble over the short month.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Assuming four months.</strong> The gap grows by a day for every month that has thirty rather than thirty-one.</li><li><strong>Counting from the wrong event.</strong> An extension window usually runs from notice given, not from the original deadline.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Days only.</strong> A term written as "four calendar months" is the six-month page's neighbour and clamps at month ends.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need starting date. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> 120 days later and 120 days earlier and weekday 120 days later should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Dating the end of a four-month extension window.</li></li><li><li>Working out when a 120-day process must have begun.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/90-day">90 days from a date</a> <a href="/everyday-life/180-day">180 days from a date</a> <a href="/everyday-life/6-month">Six months from a date</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Starting date</strong> +10 days</td><td>20 February 2027</td><td>2 March 2027</td><td>+10 d</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the 120 Days From a Date calculator work out?', 'a' => 'It returns 120 days later and 120 days earlier and weekday 120 days later from starting date. The relationship is Starting date + 120.'],
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
            ['q' => 'Is 120 days the same as four months?', 'a' => 'No. Four calendar months is 120 to 123 days, depending on which months they are.'],
            ['q' => 'Why does the weekday matter?', 'a' => 'Because a deadline that falls on a weekend often moves by rule, and you need the weekday to know whether that applies.'],
            ['q' => 'Can I use it for a project milestone?', 'a' => 'Yes. Type the start date and read the later date; the day count is the same whether the span is contractual or personal.'],
        ],
        'related' => [
            ['path' => '/everyday-life/90-day', 'name' => '90 days from a date'],
            ['path' => '/everyday-life/180-day', 'name' => '180 days from a date'],
            ['path' => '/everyday-life/6-month', 'name' => 'Six months from a date'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
