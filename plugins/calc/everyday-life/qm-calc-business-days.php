<?php

/**
 * Business Days Calculator
 * /everyday-life/business-days
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Business Days Calculator',
    'meta' => ['title' => 'Business Days Between Dates — Weekdays Only', 'description' => 'Working days between two dates, with the weekend days counted separately and an option to include the last date, for delivery estimates and payment terms.', 'h1' => 'Business Days Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'date1', 'label' => 'From', 'type' => 'date', 'default' => '2026-01-01'],
                ['name' => 'date2', 'label' => 'To', 'type' => 'date', 'default' => '2026-01-15'],
                [
                    'name' => 'include_end',
                    'label' => 'Count the last date as a working day?',
                    'type' => 'select',
                    'options' => ['Yes, include it' => 1, 'No, stop the day before' => 0],
                    'control' => 'SELECT',
                    'default' => 'Yes, include it',
                ],
                [
                    'name' => 'business_days',
                    'label' => 'Business days',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'weekend_days',
                    'label' => 'Weekend days inside the span',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'total_days',
                    'label' => 'Days counted in all',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
            ],
        ],
    ],
    'formula' => ['total_days' => 'date2 - date1 + include_end', 'weekend_days' => 'floor(((date2 - date1 + include_end) - mod(5 - mod(date1 + 3, 7), 7) + 6) / 7) + floor(((date2 - date1 + include_end) - mod(6 - mod(date1 + 3, 7), 7) + 6) / 7)', 'business_days' => <<<'TXT'
    (date2 - date1 + include_end) - floor(((date2 - date1 + include_end) - mod(5 - mod(date1 + 3, 7), 7) + 6) / 7) - floor(((date2 - date1 + include_end) - mod(6 - mod(date1 + 3, 7), 7) + 6) / 7)
    TXT],
    'article' => [
        'intro' => 'The weekdays between two dates, Monday to Friday, with the Saturdays and Sundays taken out and shown so the subtraction can be checked.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>"Five working days" is not five days. A courier quoting it, a bank clearing a payment and a payroll department all mean Monday to Friday, which is five days in a normal week and seven if the span crosses a weekend.</p><p>This page counts the weekdays in a span and shows the weekend days beside them. The weekend figure is not decoration: it is how you check the weekday count without trusting it, because the two must add up to the total.</p><p>The answer is <strong>business days and weekend days inside the span and days counted in all</strong>, worked out from from and to and count the last date as a working day?. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>total_days</strong></td><td><code>To - From + Count the last date as a working day?</code></td></tr><tr><td><strong>weekend_days</strong></td><td><code>floor(((To - From + Count the last date as a working day?) - mod(5 - mod(From + 3, 7), 7) + 6) ÷ 7) + floor(((To - From + Count the last date as a working day?) - mod(6 - mod(From + 3, 7), 7) + 6) ÷ 7)</code></td></tr><tr><td><strong>business_days</strong></td><td><code>(To - From + Count the last date as a working day?) - floor(((To - From + Count the last date as a working day?) - mod(5 - mod(From + 3, 7), 7) + 6) ÷ 7) - floor(((To - From + Count the last date as a working day?) - mod(6 - mod(From + 3, 7), 7) + 6) ÷ 7)</code></td></tr></tbody></table><p>A span of days from a known weekday contains a whole number of each weekday that depends on how many times seven divides it. Counting the Saturdays and Sundays that way costs two floors, and subtracting them from the span leaves Monday to Friday.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports business days and weekend days inside the span and days counted in all.</p><ul><li><strong>From</strong>.</li><li><strong>To</strong>.</li><li><strong>Count the last date as a working day?</strong>. A choice: Yes, include it, No, stop the day before.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Business days</strong> — days.</li><li><strong>Weekend days inside the span</strong> — days.</li><li><strong>Days counted in all</strong> — days.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put from = 1 January 2026, to = 15 January 2026, count the last date as a working day? = 1 into the form and the panel reads:</p><ul><li><strong>Business days</strong> = <code>(To - From + Count the last date as a working day?) - floor(((To - From + Count the last date as a working day?) - mod(5 - mod(From + 3, 7), 7) + 6) ÷ 7) - floor(((To - From + Count the last date as a working day?) - mod(6 - mod(From + 3, 7), 7) + 6) ÷ 7)</code> = <strong>11 days</strong></li><li><strong>Weekend days inside the span</strong> = <code>floor(((To - From + Count the last date as a working day?) - mod(5 - mod(From + 3, 7), 7) + 6) ÷ 7) + floor(((To - From + Count the last date as a working day?) - mod(6 - mod(From + 3, 7), 7) + 6) ÷ 7)</code> = <strong>4 days</strong></li><li><strong>Days counted in all</strong> = <code>To - From + Count the last date as a working day?</code> = <strong>15 days</strong></li></ul><p>Public holidays are not weekends and this page does not know them, so a bank holiday inside the span has to be subtracted by hand.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>(20 468 - 20 454 + 1) - floor(((20 468 - 20 454 + 1) - mod(5 - mod(20 454 + 3, 7), 7) + 6) ÷ 7) - floor(((20 468 - 20 454 + 1) - mod(6 - mod(20 454 + 3, 7), 7) + 6) ÷ 7)</code>, which comes to <strong>11 days</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>1 to 15 January 2026 counted with the last date included is 15 days, of which four are weekend days: 11 business days. Drop the last date and it is 14 days, 4 weekend days and 10 business days.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Business days</th><th>Weekend days inside the span</th><th>Days counted in all</th></tr></thead><tbody><tr><td><strong>From</strong> +1 day</td><td>−9.09 %</td><td>+0 %</td><td>−6.67 %</td></tr><tr><td><strong>To</strong> +1 day</td><td>+9.09 %</td><td>+0 %</td><td>+6.67 %</td></tr><tr><td><strong>Count the last date as a working day?</strong> +10 %</td><td>+0.91 %</td><td>+0 %</td><td>+0.67 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>From</strong>. <strong>Count the last date as a working day?</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>From</strong> opens at 1 January 2026</li><li><strong>To</strong> opens at 15 January 2026</li><li><strong>Count the last date as a working day?</strong> opens at 1</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set from = 21 December 2026, to = 28 December 2026, count the last date as a working day? = 1: <strong>Business days</strong> = 6 days, <strong>Weekend days inside the span</strong> = 2 days, <strong>Days counted in all</strong> = 8 days. A week over Christmas is 8 days and 2 weekend days, giving 6 business days unless the holidays themselves are taken out.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using it for bank holidays.</strong> A holiday falls on a weekday and stays in the count, which is why a delivery estimate always slips at Christmas.</li><li><strong>Leaving the last-date option on by default.</strong> The option exists because both conventions are in use; check which one your rule means.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No holiday calendar.</strong> Only Saturday and Sunday are excluded.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need from and to and count the last date as a working day?. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Business days and weekend days inside the span and days counted in all should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking a five-working-day delivery estimate.</li></li><li><li>Counting payable days in a payment term.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/days-between-dates">Days between dates</a> <a href="/everyday-life/day-counter">Day counter</a> <a href="/everyday-life/week">Week calculator</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>From</strong> +10 days</td><td>11</td><td>3</td><td>×0.273</td></tr><tr><td><strong>To</strong> +10 days</td><td>11</td><td>17</td><td>×1.545</td></tr><tr><td><strong>Count the last date as a working day?</strong> ×10</td><td>11</td><td>17</td><td>×1.545</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Business Days calculator work out?', 'a' => <<<'TXT'
            It returns business days and weekend days inside the span and days counted in all from from and to and count the last date as a working day?. The relationship is To - From + Count the last date as a working day?.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'From, To, Count the last date as a working day?. Everything else is computed.'],
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
            ['q' => 'Does it know about public holidays?', 'a' => 'No. Only Saturday and Sunday are excluded, which is the definition of a working day in most rules before the holiday list is applied.'],
            ['q' => 'Why does the total differ by one?', 'a' => 'Because of the include option. Counting the last date as a working day adds exactly one day to every figure on the page.'],
            ['q' => 'Can the answer be zero?', 'a' => 'Yes. A Saturday to a Sunday with the last date excluded is a span of one day and no working days, which is the correct answer.'],
            ['q' => 'What if I put the dates the wrong way round?', 'a' => 'The span comes back negative, and the weekday counts with it. That is the page telling you the From date is the later one rather than quietly returning a zero.'],
        ],
        'related' => [
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
            ['path' => '/everyday-life/day-counter', 'name' => 'Day counter'],
            ['path' => '/everyday-life/week', 'name' => 'Week calculator'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
