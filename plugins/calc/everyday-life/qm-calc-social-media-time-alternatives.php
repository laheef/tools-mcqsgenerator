<?php

/**
 * Social Media Time Calculator
 * /everyday-life/social-media-time-alternatives
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Social Media Time Calculator',
    'meta' => ['title' => 'Social Media Time — Hours Across the Years Estimated', 'description' => 'Translate daily social-media minutes into multi-year hours and equivalent full days, then compare the total with reading time. Set the years and daily average.', 'h1' => 'Social Media Time Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'minutes_day',
                    'label' => 'Minutes per day',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '150',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'years',
                    'label' => 'Years at this average',
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
                    'name' => 'hours',
                    'label' => 'Hours over period',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'days',
                    'label' => 'Equivalent full days',
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
                [
                    'name' => 'minutes',
                    'label' => 'Total minutes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
            ],
        ],
    ],
    'formula' => ['hours' => 'minutes_day * 365 * years / 60', 'days' => 'minutes_day * 365 * years / 1440', 'books' => 'minutes_day * 365 * years / 60 / book_hours', 'minutes' => 'minutes_day * 365 * years'],
    'article' => [
        'intro' => <<<'TXT'
        Daily screen time is easier to interpret over a longer span. Enter a daily average and a number of years to see the total hours and an optional reading comparison.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            A daily average looks small because it resets every morning. Multiplying it by 365 and then by years reveals the cumulative hours. The comparison is a prompt for reflection, not a claim that every minute would otherwise become reading or work.<p>The answer is <strong>hours over period and equivalent full days and book-time equivalents and total minutes</strong>, worked out from minutes per day and years at this average and hours per book. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>hours</strong></td><td><code>Minutes per day × 365 × Years at this average ÷ 60</code></td></tr><tr><td><strong>days</strong></td><td><code>Minutes per day × 365 × Years at this average ÷ 1440</code></td></tr><tr><td><strong>books</strong></td><td><code>Minutes per day × 365 × Years at this average ÷ 60 ÷ Hours per book</code></td></tr><tr><td><strong>minutes</strong></td><td><code>Minutes per day × 365 × Years at this average</code></td></tr></tbody></table><p>Daily minutes times 365 times years gives total minutes. Divide by 60 for hours, by 1,440 for full days, or by the entered book duration for equivalent reading blocks.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports hours over period and equivalent full days and book-time equivalents and total minutes.</p><ul><li><strong>Minutes per day</strong> — min.</li><li><strong>Years at this average</strong> — years.</li><li><strong>Hours per book</strong> — h/book.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Hours over period</strong> — h.</li><li><strong>Equivalent full days</strong> — days.</li><li><strong>Book-time equivalents</strong> — books.</li><li><strong>Total minutes</strong> — min.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put minutes per day = 150 min, years at this average = 5 years, hours per book = 6 h/book into the form and the panel reads:</p><ul><li><strong>Hours over period</strong> = <code>Minutes per day × 365 × Years at this average ÷ 60</code> = <strong>4 562.5 h</strong></li><li><strong>Equivalent full days</strong> = <code>Minutes per day × 365 × Years at this average ÷ 1440</code> = <strong>190.104 days</strong></li><li><strong>Book-time equivalents</strong> = <code>Minutes per day × 365 × Years at this average ÷ 60 ÷ Hours per book</code> = <strong>760.417 books</strong></li><li><strong>Total minutes</strong> = <code>Minutes per day × 365 × Years at this average</code> = <strong>273 750 min</strong></li></ul><p>This estimate holds the daily average constant and uses 365 days in every year. A leap day, changing habits, holidays and time spent on multiple devices are not modelled. The book comparison is a time equivalence only; reading speed and book length vary. If you want a more representative figure, use a screen-time report averaged across several ordinary weeks rather than a single unusual day. The calculator does not store or inspect device activity.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>150 × 365 × 5 ÷ 60</code>, which comes to <strong>4 562.5 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Two and a half hours per day for five years is 4,562.5 hours, or about 190 full days. If a book takes six hours, that is roughly 760 book-length blocks of time.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Hours over period</th><th>Equivalent full days</th><th>Book-time equivalents</th><th>Total minutes</th></tr></thead><tbody><tr><td><strong>Minutes per day</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Years at this average</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Hours per book</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Minutes per day</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Minutes per day</strong> opens at 150 min</li><li><strong>Years at this average</strong> opens at 5 years</li><li><strong>Hours per book</strong> opens at 6 h/book</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Minutes per day</th><th>Hours over period</th><th>Equivalent full days</th><th>Book-time equivalents</th><th>Total minutes</th></tr></thead><tbody><tr><td>75 min</td><td>2 281.25</td><td>95.052</td><td>380.208</td><td>136 875</td></tr><tr><td>150 min</td><td>4 562.5</td><td>190.104</td><td>760.417</td><td>273 750</td></tr><tr><td>300 min</td><td>9 125</td><td>380.208</td><td>1 520.833</td><td>547 500</td></tr><tr><td>750 min</td><td>22 812.5</td><td>950.521</td><td>3 802.083</td><td>1.369 × 10<sup>6</sup></td></tr><tr><td>1 500 min</td><td>45 625</td><td>1 901.042</td><td>7 604.167</td><td>2.738 × 10<sup>6</sup></td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
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
            This estimate holds the daily average constant and uses 365 days in every year. A leap day, changing habits, holidays and time spent on multiple devices are not modelled. The book comparison is a time equivalence only; reading speed and book length vary. If you want a more representative figure, use a screen-time report averaged across several ordinary weeks rather than a single unusual day. The calculator does not store or inspect device activity.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need minutes per day and years at this average and hours per book. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Hours over period and equivalent full days and book-time equivalents and total minutes should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning a date or recurring activity with the stated assumptions.</li></li><li><li>Comparing the result with a calendar or record before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/tiktok-time-alternatives">TikTok time alternatives</a> <a href="/everyday-life/email-alternatives">Email time</a> <a href="/everyday-life/reading-time">Reading time</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Minutes per day</strong> ×10</td><td>4 562.5</td><td>45 625</td><td>ten times larger</td></tr><tr><td><strong>Years at this average</strong> ×10</td><td>4 562.5</td><td>45 625</td><td>ten times larger</td></tr><tr><td><strong>Hours per book</strong> ×10</td><td>4 562.5</td><td>4 562.5</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Social Media Time calculator work out?', 'a' => <<<'TXT'
            It returns hours over period and equivalent full days and book-time equivalents and total minutes from minutes per day and years at this average and hours per book. The relationship is Minutes per day × 365 × Years at this average ÷ 60.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Minutes per day (min), Years at this average (years), Hours per book (h/book). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: minutes per day in min; years at this average in years; hours per book in h/book. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Does it use actual phone data?', 'a' => 'No. Enter an average from your own tracking if you want a measured estimate.'],
            ['q' => 'Are leap days included?', 'a' => 'The estimate uses 365 days per year, so a leap day is not added.'],
            ['q' => 'Are book equivalents literal?', 'a' => 'No. They are total hours divided by the comparison hours per book.'],
            ['q' => 'Does it make a recommendation?', 'a' => 'No. It converts the time value you enter.'],
        ],
        'related' => [
            ['path' => '/everyday-life/tiktok-time-alternatives', 'name' => 'TikTok time alternatives'],
            ['path' => '/everyday-life/email-alternatives', 'name' => 'Email time'],
            ['path' => '/everyday-life/reading-time', 'name' => 'Reading time'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
