<?php

/**
 * 45 Days From a Date Calculator
 * /everyday-life/45-day
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => '45 Days From a Date Calculator',
    'meta' => ['title' => '45 Days From a Date — Date, Weekday and Six Weeks', 'description' => 'The date forty-five days after any day, the date forty-five days before it and the weekday it lands on, for notice periods and six-week deadlines. Formula.', 'h1' => '45 Days From a Date Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'date', 'label' => 'Starting date', 'type' => 'date', 'default' => '2026-10-23'],
                ['name' => 'after', 'label' => '45 days later', 'type' => 'date'],
                ['name' => 'before', 'label' => '45 days earlier', 'type' => 'date'],
                [
                    'name' => 'weekday',
                    'label' => 'Weekday 45 days later (1 is Monday)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => ['after' => 'date + 45', 'before' => 'date - 45', 'weekday' => 'mod(date + 48, 7) + 1'],
    'article' => [
        'intro' => <<<'TXT'
        Forty-five days forward and back from a date. Six weeks and three days, which is why a notice period is often written this way: it is long enough to be a real period and short enough to be enforceable.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Forty-five days is six weeks and three days, and that half week is the whole reason the number appears in contracts. A period written in weeks always lands on the same weekday; forty-five days drifts by three every time, so the deadline moves through the calendar and nobody can claim it was chosen to suit one side.</p><p>Used in tenancy notice, in some employment notice periods and in construction payment rules, the count has to be exact to the day. This page gives the date both ways round and the weekday it falls on.</p><p>The answer is <strong>45 days later and 45 days earlier and weekday 45 days later</strong>, worked out from starting date. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>after</strong></td><td><code>Starting date + 45</code></td></tr><tr><td><strong>before</strong></td><td><code>Starting date - 45</code></td></tr><tr><td><strong>weekday</strong></td><td><code>mod(Starting date + 48, 7) + 1</code></td></tr></tbody></table><p>The later date is the starting day number plus 45; the earlier one is the same subtraction the other way. Both are calendar days, so a month boundary costs nothing: 45 days after 15 January is a date in February whatever February's length happens to be.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill. It reports 45 days later and 45 days earlier and weekday 45 days later.</p><ul><li><strong>Starting date</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>45 days later</strong>.</li><li><strong>45 days earlier</strong>.</li><li><strong>Weekday 45 days later (1 is Monday)</strong>.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put starting date = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>45 days later</strong> = <code>Starting date + 45</code> = <strong>7 December 2026</strong></li><li><strong>45 days earlier</strong> = <code>Starting date - 45</code> = <strong>8 September 2026</strong></li><li><strong>Weekday 45 days later (1 is Monday)</strong> = <code>mod(Starting date + 48, 7) + 1</code> = <strong>1</strong></li></ul><p>If a notice period has to expire on a weekday, start counting from the receiving date and check the weekday line before you send anything.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 749 + 45</code>, which comes to <strong>7 December 2026</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>45 days after 23 October 2026 is 7 December 2026, a Monday; 45 days before it is 8 September 2026. The forward count crosses the end of the year only if you start in November.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>45 days later</th><th>45 days earlier</th><th>Weekday 45 days later (1 is Monday)</th></tr></thead><tbody><tr><td><strong>Starting date</strong> +1 day</td><td>+1 d</td><td>+1 d</td><td>+100 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Starting date</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Starting date</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set starting date = 1 December 2026: <strong>45 days later</strong> = 15 January 2027, <strong>45 days earlier</strong> = 17 October 2026, <strong>Weekday 45 days later (1 is Monday)</strong> = 5. 45 days after 1 December is 15 January, so the count runs over the new year and the year in the answer is not the year you started in.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Confusing it with six weeks.</strong> Forty-five days is three days longer. From a Monday, six weeks lands on a Monday and forty-five days lands on a Thursday.</li><li><strong>Counting the day of service.</strong> Most rules exclude it; the page treats the starting date as day zero, which matches the usual reading.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Calendar days throughout.</strong> A period that pauses for holidays is a different rule and needs a calendar, not this page.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need starting date. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> 45 days later and 45 days earlier and weekday 45 days later should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Dating the expiry of a forty-five day notice period.</li></li><li><li>Checking a six-week deadline written as a day count.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/30-day">30 days from a date</a> <a href="/everyday-life/60-day">60 days from a date</a> <a href="/everyday-life/add-days">Add days</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Starting date</strong> +10 days</td><td>7 December 2026</td><td>17 December 2026</td><td>+10 d</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the 45 Days From a Date calculator work out?', 'a' => 'It returns 45 days later and 45 days earlier and weekday 45 days later from starting date. The relationship is Starting date + 45.'],
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
            ['q' => 'Is forty-five days six weeks?', 'a' => 'No, it is six weeks and three days. If a rule says six weeks, forty-five days is three days too long.'],
            ['q' => 'Why does the holiday period matter?', 'a' => 'Because calendar days keep counting through it. Only a rule that names working days stops at weekends.'],
            ['q' => 'Can I count backwards for a reminder date?', 'a' => 'Yes. The earlier date line is the same calculation in reverse, which is how a diary reminder is set.'],
        ],
        'related' => [
            ['path' => '/everyday-life/30-day', 'name' => '30 days from a date'],
            ['path' => '/everyday-life/60-day', 'name' => '60 days from a date'],
            ['path' => '/everyday-life/add-days', 'name' => 'Add days'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
