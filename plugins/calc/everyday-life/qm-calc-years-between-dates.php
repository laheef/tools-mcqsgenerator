<?php

/**
 * Years Between Dates
 * /everyday-life/years-between-dates
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Years Between Dates',
    'meta' => ['title' => 'Years Between Two Dates — Decimal Years — Free Tool', 'description' => 'The number of years between two dates, as a decimal and as whole years with the days left over, for anniversaries, service records and ages. Formula shown.', 'h1' => 'Years Between Dates', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'start', 'label' => 'From', 'type' => 'date', 'default' => '1990-05-17'],
                ['name' => 'end', 'label' => 'To', 'type' => 'date', 'default' => '2026-10-23'],
                [
                    'name' => 'years',
                    'label' => 'Years',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
                [
                    'name' => 'whole',
                    'label' => 'Whole years',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
                [
                    'name' => 'days',
                    'label' => 'Days after the last whole year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'total_days',
                    'label' => 'Days in total',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
            ],
        ],
    ],
    'formula' => ['years' => '(end - start) / 365.2425', 'whole' => 'floor((end - start) / 365.2425)', 'days' => 'end - start - floor((end - start) / 365.2425) * 365.2425', 'total_days' => 'end - start'],
    'article' => [
        'intro' => 'A span of days becomes years by dividing by the average year. The page also returns whole years and the leftover days, which is the form people quote.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Thirty-six years and five months is easier to check than 13 308 days, and both describe the same span. The page returns three forms so the one you need is already on screen.</p><p>Where this number earns its keep is a service record. A reference letter says “six years”; the appointment letter is dated 19 April 2019 and the leaving date is 2 May 2025. The decimal gives 6.04 and the whole years give six, and the days left over are what turns a rounded-off sentence into a figure a pension administrator will accept without asking for the dates.</p><p>The answer is <strong>years and whole years and days after the last whole year and days in total</strong>, worked out from from and to. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>years</strong></td><td><code>(To - From) ÷ 365.2425</code></td></tr><tr><td><strong>whole</strong></td><td><code>floor((To - From) ÷ 365.2425)</code></td></tr><tr><td><strong>days</strong></td><td><code>To - From - floor((To - From) ÷ 365.2425) × 365.2425</code></td></tr><tr><td><strong>total_days</strong></td><td><code>To - From</code></td></tr></tbody></table><p>365.242 5 is the mean Gregorian year. Dividing by 365 instead would drift by a day every fourth year, which is the whole reason for the extra 0.2425.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports years and whole years and days after the last whole year and days in total.</p><ul><li><strong>From</strong>.</li><li><strong>To</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Years</strong> — years.</li><li><strong>Whole years</strong> — years.</li><li><strong>Days after the last whole year</strong> — days.</li><li><strong>Days in total</strong> — days.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put from = 17 May 1990, to = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>Years</strong> = <code>(To - From) ÷ 365.2425</code> = <strong>36.436 years</strong></li><li><strong>Whole years</strong> = <code>floor((To - From) ÷ 365.2425)</code> = <strong>36 years</strong></li><li><strong>Days after the last whole year</strong> = <code>To - From - floor((To - From) ÷ 365.2425) × 365.2425</code> = <strong>159.27 days</strong></li><li><strong>Days in total</strong> = <code>To - From</code> = <strong>13 308 days</strong></li></ul><p>A span that ends before the birthday gives one year fewer in the whole count, which is the difference between an age and a decimal span.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>(20 749 - 7 441) ÷ 365.2425</code>, which comes to <strong>36.436 years</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>17 May 1990 to 23 October 2026 is 13 308 days, or 36.44 years, which is 36 whole years and 159 days. Quote the whole years and days; use the decimal only to compare two spans.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Years</th><th>Whole years</th><th>Days after the last whole year</th><th>Days in total</th></tr></thead><tbody><tr><td><strong>From</strong> +1 day</td><td>−0.01 %</td><td>+0 %</td><td>−0.63 %</td><td>−0.01 %</td></tr><tr><td><strong>To</strong> +1 day</td><td>+0.01 %</td><td>+0 %</td><td>+0.63 %</td><td>+0.01 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>From</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>From</strong> opens at 17 May 1990</li><li><strong>To</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set from = 1 January 2000, to = 1 January 2001: <strong>Years</strong> = 1.002 years, <strong>Whole years</strong> = 1 years, <strong>Days after the last whole year</strong> = 0.757 days, <strong>Days in total</strong> = 366 days. A leap year: 366 days, and 1.0021 in the decimal.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Treating the decimal as an age.</strong> An age counts birthdays, not average years.</li><li><strong>Rounding the whole years up.</strong> The floor is deliberate: a span of 364 days is zero whole years.</li><li><strong>Counting leap days by hand.</strong> Four leap years in a sixteen-year span add four days; dividing by 365 rather than 365.2425 turns those four days into a decimal that disagrees with the calendar.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No calendar walk.</strong> The count is days divided by an average year, not a step through anniversaries.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need from and to. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Years and whole years and days after the last whole year and days in total should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Length of service.</li></li><li><li>The span between two historical dates.</li></li><li><li>A warranty that runs for a fixed number of years from the purchase date.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/days-between-dates">Days between dates</a> <a href="/everyday-life/age">Age calculator</a> <a href="/everyday-life/anniversary">Anniversary</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>From</strong> +10 days</td><td>36.436</td><td>36.409</td><td>unchanged</td></tr><tr><td><strong>To</strong> +10 days</td><td>36.436</td><td>36.463</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Years Between Dates calculator work out?', 'a' => 'It returns years and whole years and days after the last whole year and days in total from from and to. The relationship is (To - From) ÷ 365.2425.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'From, To. Everything else is computed.'],
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
            ['q' => 'Is this the same as an age?', 'a' => 'No. An age counts whole birthdays, while this counts elapsed days over an average year. They agree on the birthday itself.'],
            ['q' => 'Why does the day remainder look odd?', 'a' => 'Because it is measured from an average year, not from the last anniversary. The age page is the one that counts anniversaries.'],
        ],
        'related' => [
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
            ['path' => '/everyday-life/age', 'name' => 'Age calculator'],
            ['path' => '/everyday-life/anniversary', 'name' => 'Anniversary'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
