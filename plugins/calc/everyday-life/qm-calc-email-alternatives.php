<?php

/**
 * Email Time Calculator
 * /everyday-life/email-alternatives
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Email Time Calculator',
    'meta' => ['title' => 'Email Time — Work Hours and Other Uses — Free Tool', 'description' => 'Turn daily minutes spent on email into annual and multi-year hours, days and reading-book equivalents. Enter workdays and working weeks rather than assuming.', 'h1' => 'Email Time Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'minutes_day',
                    'label' => 'Minutes on email per workday',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '120',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'days_week',
                    'label' => 'Workdays per week',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'weeks_year',
                    'label' => 'Working weeks per year',
                    'type' => 'number',
                    'suffix' => 'weeks',
                    'default' => '48',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'years',
                    'label' => 'Years measured',
                    'type' => 'number',
                    'suffix' => 'years',
                    'default' => '10',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'book_hours',
                    'label' => 'Hours to read one book',
                    'type' => 'number',
                    'suffix' => 'h/book',
                    'default' => '6',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'annual_hours',
                    'label' => 'Email hours per year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'total_hours',
                    'label' => 'Email hours over period',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'total_days',
                    'label' => 'Equivalent full days',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'books',
                    'label' => 'Six-hour book equivalents',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'books',
                ],
            ],
        ],
    ],
    'formula' => ['annual_hours' => 'minutes_day / 60 * days_week * weeks_year', 'total_hours' => 'minutes_day / 60 * days_week * weeks_year * years', 'total_days' => 'minutes_day / 60 * days_week * weeks_year * years / 24', 'books' => 'minutes_day / 60 * days_week * weeks_year * years / book_hours'],
    'article' => [
        'intro' => 'A few minutes in an inbox can add up across a work year. This page converts daily email time into longer totals and a couple of concrete comparisons.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            An inbox is usually measured in interruptions, not hours. Multiplying minutes by working days makes the time visible across a year, then across a longer horizon. The book comparison is only a unit conversion, but it gives the total a scale most people recognize.<p>The answer is <strong>email hours per year and email hours over period and equivalent full days and six-hour book equivalents</strong>, worked out from minutes on email per workday and workdays per week and working weeks per year and years measured and hours to read one book. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>annual_hours</strong></td><td><code>Minutes on email per workday ÷ 60 × Workdays per week × Working weeks per year</code></td></tr><tr><td><strong>total_hours</strong></td><td><code>Minutes on email per workday ÷ 60 × Workdays per week × Working weeks per year × Years measured</code></td></tr><tr><td><strong>total_days</strong></td><td><code>Minutes on email per workday ÷ 60 × Workdays per week × Working weeks per year × Years measured ÷ 24</code></td></tr><tr><td><strong>books</strong></td><td><code>Minutes on email per workday ÷ 60 × Workdays per week × Working weeks per year × Years measured ÷ Hours to read one book</code></td></tr></tbody></table><p>Convert daily minutes to hours, multiply by workdays and working weeks, then extend across years. Divide the result by 24 for days or by the entered reading time for book equivalents.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill. It reports email hours per year and email hours over period and equivalent full days and six-hour book equivalents.</p><ul><li><strong>Minutes on email per workday</strong> — min.</li><li><strong>Workdays per week</strong> — days.</li><li><strong>Working weeks per year</strong> — weeks.</li><li><strong>Years measured</strong> — years.</li><li><strong>Hours to read one book</strong> — h/book.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Email hours per year</strong> — h.</li><li><strong>Email hours over period</strong> — h.</li><li><strong>Equivalent full days</strong> — days.</li><li><strong>Six-hour book equivalents</strong> — books.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put minutes on email per workday = 120 min, workdays per week = 5 days, working weeks per year = 48 weeks, years measured = 10 years, hours to read one book = 6 h/book into the form and the panel reads:</p><ul><li><strong>Email hours per year</strong> = <code>Minutes on email per workday ÷ 60 × Workdays per week × Working weeks per year</code> = <strong>480 h</strong></li><li><strong>Email hours over period</strong> = <code>Minutes on email per workday ÷ 60 × Workdays per week × Working weeks per year × Years measured</code> = <strong>4 800 h</strong></li><li><strong>Equivalent full days</strong> = <code>Minutes on email per workday ÷ 60 × Workdays per week × Working weeks per year × Years measured ÷ 24</code> = <strong>200 days</strong></li><li><strong>Six-hour book equivalents</strong> = <code>Minutes on email per workday ÷ 60 × Workdays per week × Working weeks per year × Years measured ÷ Hours to read one book</code> = <strong>800 books</strong></li></ul><p>The model assumes the same email time on each workday and no email on non-workdays. Real schedules include busy periods, leave, weekends and meetings that shift the average. The book comparison is illustrative; books vary widely in length and reading speed. This page does not claim that all inbox time could be removed or converted into leisure. If a time audit gives a different average, use that measured value. Changing workdays or weeks can move the total more than changing the comparison unit, so state those assumptions when sharing the result.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>120 ÷ 60 × 5 × 48</code>, which comes to <strong>480 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Two hours of email on each of five workdays for 48 weeks is 480 hours a year. Over ten years that is 4,800 hours, or 200 full days; at six hours per book, the same time is 800 reading sessions of that size.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Email hours per year</th><th>Email hours over period</th><th>Equivalent full days</th><th>Six-hour book equivalents</th></tr></thead><tbody><tr><td><strong>Minutes on email per workday</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Workdays per week</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Working weeks per year</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Years measured</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Hours to read one book</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Minutes on email per workday</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Minutes on email per workday</strong> opens at 120 min</li><li><strong>Workdays per week</strong> opens at 5 days</li><li><strong>Working weeks per year</strong> opens at 48 weeks</li><li><strong>Years measured</strong> opens at 10 years</li><li><strong>Hours to read one book</strong> opens at 6 h/book</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Minutes on email per workday</th><th>Email hours per year</th><th>Email hours over period</th><th>Equivalent full days</th><th>Six-hour book equivalents</th></tr></thead><tbody><tr><td>60 min</td><td>240</td><td>2 400</td><td>100</td><td>400</td></tr><tr><td>120 min</td><td>480</td><td>4 800</td><td>200</td><td>800</td></tr><tr><td>240 min</td><td>960</td><td>9 600</td><td>400</td><td>1 600</td></tr><tr><td>600 min</td><td>2 400</td><td>24 000</td><td>1 000</td><td>4 000</td></tr><tr><td>1 200 min</td><td>4 800</td><td>48 000</td><td>2 000</td><td>8 000</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
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
            The model assumes the same email time on each workday and no email on non-workdays. Real schedules include busy periods, leave, weekends and meetings that shift the average. The book comparison is illustrative; books vary widely in length and reading speed. This page does not claim that all inbox time could be removed or converted into leisure. If a time audit gives a different average, use that measured value. Changing workdays or weeks can move the total more than changing the comparison unit, so state those assumptions when sharing the result.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need minutes on email per workday and workdays per week and working weeks per year and years measured and hours to read one book. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Email hours per year and email hours over period and equivalent full days and six-hour book equivalents should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning a date or recurring activity with the stated assumptions.</li></li><li><li>Comparing the result with a calendar or record before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/reading-time">Reading time</a> <a href="/everyday-life/meeting-cost">Meeting cost</a> <a href="/everyday-life/social-media-time-alternatives">Social media time alternatives</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Minutes on email per workday</strong> ×10</td><td>480</td><td>4 800</td><td>ten times larger</td></tr><tr><td><strong>Workdays per week</strong> ×10</td><td>480</td><td>4 800</td><td>ten times larger</td></tr><tr><td><strong>Working weeks per year</strong> ×10</td><td>480</td><td>4 800</td><td>ten times larger</td></tr><tr><td><strong>Years measured</strong> ×10</td><td>480</td><td>480</td><td>unchanged</td></tr><tr><td><strong>Hours to read one book</strong> ×10</td><td>480</td><td>480</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Email Time calculator work out?', 'a' => <<<'TXT'
            It returns email hours per year and email hours over period and equivalent full days and six-hour book equivalents from minutes on email per workday and workdays per week and working weeks per year and years measured and hours to read one book. The relationship is Minutes on email per workday ÷ 60 × Workdays per week × Working weeks per year.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => <<<'TXT'
            Minutes on email per workday (min), Workdays per week (days), Working weeks per year (weeks), Years measured (years), Hours to read one book (h/book). Everything else is computed.
            TXT],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: minutes on email per workday in min; workdays per week in days; working weeks per year in weeks; years measured in years; hours to read one book in h/book. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Does this count weekend email?', 'a' => 'Only if you include weekend days in the workdays field.'],
            ['q' => 'Why ask how long a book takes?', 'a' => 'It converts the total hours into an optional comparison, not a promise of books finished.'],
            ['q' => 'Does it assume the same routine for ten years?', 'a' => 'Yes. The horizon multiplies the entered weekly pattern unchanged.'],
            ['q' => 'Can it tell me how much time I can recover?', 'a' => 'No. It measures the time entered; it does not judge which messages are necessary.'],
        ],
        'related' => [
            ['path' => '/everyday-life/reading-time', 'name' => 'Reading time'],
            ['path' => '/everyday-life/meeting-cost', 'name' => 'Meeting cost'],
            ['path' => '/everyday-life/social-media-time-alternatives', 'name' => 'Social media time alternatives'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
