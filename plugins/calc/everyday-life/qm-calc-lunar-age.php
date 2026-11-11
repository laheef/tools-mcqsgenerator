<?php

/**
 * Lunar Age Calculator
 * /everyday-life/lunar-age
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lunar Age Calculator',
    'meta' => ['title' => 'Lunar Age — East Asian Count and the Birthday Rule', 'description' => 'The traditional East Asian age, counted from the lunar year, beside the age by birthdays, with the difference between the two spelled out. The formula is shown.', 'h1' => 'Lunar Age Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'birth', 'label' => 'Date of birth', 'type' => 'date', 'default' => '1990-05-17'],
                ['name' => 'today', 'label' => 'Today', 'type' => 'date', 'default' => '2026-10-23'],
                [
                    'name' => 'lunar_age',
                    'label' => 'Traditional age',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
                [
                    'name' => 'international_age',
                    'label' => 'Age by birthdays',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
                [
                    'name' => 'difference',
                    'label' => 'Years between the two',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
            ],
        ],
    ],
    'formula' => ['lunar_age' => 'getYear(today) - getYear(birth) + 1', 'international_age' => <<<'TXT'
    getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0))
    TXT, 'difference' => <<<'TXT'
    getYear(today) - getYear(birth) + 1 - getYear(today) + getYear(birth) + if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0))
    TXT],
    'article' => [
        'intro' => 'The traditional count that starts at one and gains a year at the lunar new year, shown against the birthday count so the gap is visible rather than assumed.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>The traditional count and the birthday count differ by one or two years, and which one it is depends on where the date sits in the year. Before the birthday the gap is two; on or after it the gap is one.</p><p>This page shows both and the gap between them, which is the number people actually want when they ask why a Korean friend insists on being two years older than the passport says.</p><p>The answer is <strong>traditional age and age by birthdays and years between the two</strong>, worked out from date of birth and today. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>lunar_age</strong></td><td><code>getYear(Today) - getYear(Date of birth) + 1</code></td></tr><tr><td><strong>international_age</strong></td><td><code>getYear(Today) - getYear(Date of birth) - if_else(getMonth(Today) < getMonth(Date of birth), 1, if_else(getMonth(Today) == getMonth(Date of birth), if_else(getDate(Today) < getDate(Date of birth), 1, 0), 0))</code></td></tr><tr><td><strong>difference</strong></td><td><code>getYear(Today) - getYear(Date of birth) + 1 - getYear(Today) + getYear(Date of birth) + if_else(getMonth(Today) < getMonth(Date of birth), 1, if_else(getMonth(Today) == getMonth(Date of birth), if_else(getDate(Today) < getDate(Date of birth), 1, 0), 0))</code></td></tr></tbody></table><p>The traditional count is the difference of the calendar years plus one. The difference line is that figure minus the birthday count, so it comes out at one or two and never anything else.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports traditional age and age by birthdays and years between the two.</p><ul><li><strong>Date of birth</strong>.</li><li><strong>Today</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Traditional age</strong> — years.</li><li><strong>Age by birthdays</strong> — years.</li><li><strong>Years between the two</strong> — years.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put date of birth = 17 May 1990, today = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>Traditional age</strong> = <code>getYear(Today) - getYear(Date of birth) + 1</code> = <strong>37 years</strong></li><li><strong>Age by birthdays</strong> = <code>getYear(Today) - getYear(Date of birth) - if_else(getMonth(Today) < getMonth(Date of birth), 1, if_else(getMonth(Today) == getMonth(Date of birth), if_else(getDate(Today) < getDate(Date of birth), 1, 0), 0))</code> = <strong>36 years</strong></li><li><strong>Years between the two</strong> = <code>getYear(Today) - getYear(Date of birth) + 1 - getYear(Today) + getYear(Date of birth) + if_else(getMonth(Today) < getMonth(Date of birth), 1, if_else(getMonth(Today) == getMonth(Date of birth), if_else(getDate(Today) < getDate(Date of birth), 1, 0), 0))</code> = <strong>1 years</strong></li></ul><p>The gap line is the quickest test of the page: it can only ever be one or two.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>getYear(20 749) - getYear(7 441) + 1</code>, which comes to <strong>37 years</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Born 17 May 1990 and read on 23 October 2026: traditional age 37, birthday age 36, a gap of one. Read in March 2026 the same person is 37 and 35, a gap of two.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Traditional age</th><th>Age by birthdays</th><th>Years between the two</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +1 day</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Today</strong> +1 day</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Date of birth</strong> opens at 17 May 1990</li><li><strong>Today</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set date of birth = 17 May 1990, today = 1 March 2026: <strong>Traditional age</strong> = 37 years, <strong>Age by birthdays</strong> = 35 years, <strong>Years between the two</strong> = 2 years. Before the birthday the gap is two, which is the case that makes the traditional count look inconsistent.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Treating the traditional count as a legal age.</strong> It is not; documents use the birthday count.</li><li><strong>Assuming the gap is fixed.</strong> It changes on the birthday, not on the new year, and the two dates are months apart.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Gregorian years.</strong> The true lunar count moves at the lunar new year, which falls between late January and late February.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need date of birth and today. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Traditional age and age by birthdays and years between the two should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Explaining the two-year gap to somebody meeting it for the first time.</li></li><li><li>Checking a form that asks for the traditional age.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/korean-age">Korean age</a> <a href="/everyday-life/age">Age calculator</a> <a href="/everyday-life/chronological-age">Chronological age</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Date of birth</strong> +10 days</td><td>37</td><td>37</td><td>unchanged</td></tr><tr><td><strong>Today</strong> +10 days</td><td>37</td><td>37</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lunar Age calculator work out?', 'a' => <<<'TXT'
            It returns traditional age and age by birthdays and years between the two from date of birth and today. The relationship is getYear(Today) - getYear(Date of birth) + 1.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Date of birth, Today. Everything else is computed.'],
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
            ['q' => 'Why is the gap sometimes two?', 'a' => 'Because the traditional count gains a year at the new year while the birthday count waits for the birthday. Between January and the birthday both apply.'],
            ['q' => 'Does this use the real lunar calendar?', 'a' => 'No. It uses the Gregorian year, which is what the common version of the rule does in everyday use.'],
            ['q' => 'Which age do documents use?', 'a' => 'The birthday count. The traditional count is social.'],
        ],
        'related' => [
            ['path' => '/everyday-life/korean-age', 'name' => 'Korean age'],
            ['path' => '/everyday-life/age', 'name' => 'Age calculator'],
            ['path' => '/everyday-life/chronological-age', 'name' => 'Chronological age'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
