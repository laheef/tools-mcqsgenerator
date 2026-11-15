<?php

/**
 * TikTok Time Alternatives Calculator
 * /everyday-life/tiktok-time-alternatives
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'TikTok Time Alternatives Calculator',
    'meta' => ['title' => 'TikTok Time — Hours Reclaimed by Cutting Back', 'description' => 'Estimate hours spent at a daily TikTok average over several years and how many could be reclaimed by reducing that time. The alternative is a time conversion.', 'h1' => 'TikTok Time Alternatives Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'minutes_day',
                    'label' => 'Minutes per day now',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '90',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cut_percent',
                    'label' => 'Daily time reduction',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '50',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'years',
                    'label' => 'Years measured',
                    'type' => 'number',
                    'suffix' => 'years',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'book_hours',
                    'label' => 'Hours per book',
                    'type' => 'number',
                    'suffix' => 'h/book',
                    'default' => '6',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'current_hours',
                    'label' => 'Hours at current average',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'reclaimed_hours',
                    'label' => 'Hours freed by reduction',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'reclaimed_days',
                    'label' => 'Equivalent full days freed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'books',
                    'label' => 'Book-time equivalents',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'books',
                ],
            ],
        ],
    ],
    'formula' => ['current_hours' => 'minutes_day * 365 * years / 60', 'reclaimed_hours' => 'minutes_day * cut_percent / 100 * 365 * years / 60', 'reclaimed_days' => 'minutes_day * cut_percent / 100 * 365 * years / 1440', 'books' => 'minutes_day * cut_percent / 100 * 365 * years / 60 / book_hours'],
    'article' => [
        'intro' => 'A daily minutes estimate can be translated into total hours across years. A reduction field then shows the time difference if the daily average changes.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            The alternative to a screen-time estimate is not automatically productive work. Still, a percentage reduction gives a concrete comparison: it shows how many hours would be freed if a daily habit changed by that amount over the chosen period.<p>The answer is <strong>hours at current average and hours freed by reduction and equivalent full days freed and book-time equivalents</strong>, worked out from minutes per day now and daily time reduction and years measured and hours per book. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>current_hours</strong></td><td><code>Minutes per day now × 365 × Years measured ÷ 60</code></td></tr><tr><td><strong>reclaimed_hours</strong></td><td><code>Minutes per day now × Daily time reduction ÷ 100 × 365 × Years measured ÷ 60</code></td></tr><tr><td><strong>reclaimed_days</strong></td><td><code>Minutes per day now × Daily time reduction ÷ 100 × 365 × Years measured ÷ 1440</code></td></tr><tr><td><strong>books</strong></td><td><code>Minutes per day now × Daily time reduction ÷ 100 × 365 × Years measured ÷ 60 ÷ Hours per book</code></td></tr></tbody></table><p>Current hours use daily minutes times 365 days per year. Reclaimed time multiplies that total by the reduction percentage; days and book blocks are conversions of the reclaimed hours.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports hours at current average and hours freed by reduction and equivalent full days freed and book-time equivalents.</p><ul><li><strong>Minutes per day now</strong> — min.</li><li><strong>Daily time reduction</strong> — %.</li><li><strong>Years measured</strong> — years.</li><li><strong>Hours per book</strong> — h/book.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Hours at current average</strong> — h.</li><li><strong>Hours freed by reduction</strong> — h.</li><li><strong>Equivalent full days freed</strong> — days.</li><li><strong>Book-time equivalents</strong> — books.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put minutes per day now = 90 min, daily time reduction = 50 %, years measured = 5 years, hours per book = 6 h/book into the form and the panel reads:</p><ul><li><strong>Hours at current average</strong> = <code>Minutes per day now × 365 × Years measured ÷ 60</code> = <strong>2 737.5 h</strong></li><li><strong>Hours freed by reduction</strong> = <code>Minutes per day now × Daily time reduction ÷ 100 × 365 × Years measured ÷ 60</code> = <strong>1 368.75 h</strong></li><li><strong>Equivalent full days freed</strong> = <code>Minutes per day now × Daily time reduction ÷ 100 × 365 × Years measured ÷ 1440</code> = <strong>57.031 days</strong></li><li><strong>Book-time equivalents</strong> = <code>Minutes per day now × Daily time reduction ÷ 100 × 365 × Years measured ÷ 60 ÷ Hours per book</code> = <strong>228.125 books</strong></li></ul><p>The reduction is a scenario, not a forecast. The calculation assumes the change happens immediately and holds for every day of the selected period. It uses a 365-day year and ignores leap days. The comparison in books is not a promise that someone will read that many books; it only expresses the same number of hours using the chosen book duration. Use a device's screen-time report for a better baseline, and treat a small sample as an estimate. The page neither reads device data nor tells you what an appropriate daily limit should be.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>90 × 365 × 5 ÷ 60</code>, which comes to <strong>2 737.5 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Ninety minutes a day for five years is 2,737.5 hours at the same average. Cutting that time in half would free 1,368.75 hours, a little over 57 full days or 228 six-hour book blocks.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Hours at current average</th><th>Hours freed by reduction</th><th>Equivalent full days freed</th><th>Book-time equivalents</th></tr></thead><tbody><tr><td><strong>Minutes per day now</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Daily time reduction</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Years measured</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Hours per book</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Minutes per day now</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Minutes per day now</strong> opens at 90 min</li><li><strong>Daily time reduction</strong> opens at 50 %</li><li><strong>Years measured</strong> opens at 5 years</li><li><strong>Hours per book</strong> opens at 6 h/book</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Minutes per day now</th><th>Hours at current average</th><th>Hours freed by reduction</th><th>Equivalent full days freed</th><th>Book-time equivalents</th></tr></thead><tbody><tr><td>45 min</td><td>1 368.75</td><td>684.375</td><td>28.516</td><td>114.062</td></tr><tr><td>90 min</td><td>2 737.5</td><td>1 368.75</td><td>57.031</td><td>228.125</td></tr><tr><td>180 min</td><td>5 475</td><td>2 737.5</td><td>114.062</td><td>456.25</td></tr><tr><td>450 min</td><td>13 687.5</td><td>6 843.75</td><td>285.156</td><td>1 140.625</td></tr><tr><td>900 min</td><td>27 375</td><td>13 687.5</td><td>570.312</td><td>2 281.25</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
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
            The reduction is a scenario, not a forecast. The calculation assumes the change happens immediately and holds for every day of the selected period. It uses a 365-day year and ignores leap days. The comparison in books is not a promise that someone will read that many books; it only expresses the same number of hours using the chosen book duration. Use a device's screen-time report for a better baseline, and treat a small sample as an estimate. The page neither reads device data nor tells you what an appropriate daily limit should be.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need minutes per day now and daily time reduction and years measured and hours per book. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Hours at current average and hours freed by reduction and equivalent full days freed and book-time equivalents should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning a date or recurring activity with the stated assumptions.</li></li><li><li>Comparing the result with a calendar or record before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/social-media-time-alternatives">Social media time</a> <a href="/everyday-life/email-alternatives">Email time</a> <a href="/everyday-life/reading-time">Reading time</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Minutes per day now</strong> ×10</td><td>2 737.5</td><td>27 375</td><td>ten times larger</td></tr><tr><td><strong>Daily time reduction</strong> ×10</td><td>2 737.5</td><td>2 737.5</td><td>unchanged</td></tr><tr><td><strong>Years measured</strong> ×10</td><td>2 737.5</td><td>27 375</td><td>ten times larger</td></tr><tr><td><strong>Hours per book</strong> ×10</td><td>2 737.5</td><td>2 737.5</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the TikTok Time Alternatives calculator work out?', 'a' => <<<'TXT'
            It returns hours at current average and hours freed by reduction and equivalent full days freed and book-time equivalents from minutes per day now and daily time reduction and years measured and hours per book. The relationship is Minutes per day now × 365 × Years measured ÷ 60.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Minutes per day now (min), Daily time reduction (%), Years measured (years), Hours per book (h/book). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: minutes per day now in min; daily time reduction in %; years measured in years; hours per book in h/book. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Does this track my TikTok use?', 'a' => 'No. It uses the daily minutes you enter.'],
            ['q' => 'What does reclaimed time mean?', 'a' => 'It is the arithmetic difference under the reduction scenario, not a prediction of how the time will be spent.'],
            ['q' => 'Are books actually completed?', 'a' => 'No. Book values are time equivalents only.'],
            ['q' => 'Does it use a leap year?', 'a' => 'No. The horizon uses 365 days per year.'],
        ],
        'related' => [
            ['path' => '/everyday-life/social-media-time-alternatives', 'name' => 'Social media time'],
            ['path' => '/everyday-life/email-alternatives', 'name' => 'Email time'],
            ['path' => '/everyday-life/reading-time', 'name' => 'Reading time'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
