<?php

/**
 * Lead Time Calculator
 * /everyday-life/lead-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lead Time Calculator',
    'meta' => ['title' => 'Lead Time — The Last Day You Can Still Order By', 'description' => 'A fourteen-day lead time in a thirty-day month means ordering by the fourteenth: the last safe day, the days you are past it and the share of the month gone.', 'h1' => 'Lead Time Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'month_length',
                    'label' => 'Days in the month',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '30',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'today',
                    'label' => 'Today\'s date',
                    'type' => 'number',
                    'suffix' => 'day of month',
                    'default' => '18',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'lead_days',
                    'label' => 'Supplier lead time',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '14',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'buffer',
                    'label' => 'Buffer',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '2',
                    'help' => 'Two or three days covers a weekend and a late delivery. A lead time that lands on the last day has no room for either.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'order_by',
                    'label' => 'Order by',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'day',
                ],
                [
                    'name' => 'spare',
                    'label' => 'Days to spare',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'lead_share',
                    'label' => 'Lead time share of the month',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'missed',
                    'label' => 'Already too late',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yes/no',
                ],
            ],
        ],
    ],
    'formula' => ['order_by' => 'month_length - lead_days - buffer', 'spare' => 'month_length - lead_days - buffer - today', 'lead_share' => '(lead_days + buffer) / month_length * 100', 'missed' => 'if_else(month_length - lead_days - buffer - today < 0, 1, 0)'],
    'article' => [
        'intro' => <<<'TXT'
        The latest day of the month an order can go in for goods to arrive by the end of it, allowing for the supplier's lead time and a buffer, and the days you are past it.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A lead time is a deadline you cannot argue with. If the month has thirty days and the supplier needs fourteen plus a two-day buffer, the last order day is the fourteenth — and if today is the eighteenth, the order is four days late before anybody has picked up the phone.</p><p>The percentage is the useful part for planning: sixteen days of thirty is 53 per cent of the month, so half the calendar is gone before the last order window closes.</p><p>The answer is <strong>order by and days to spare and lead time share of the month and already too late</strong>, worked out from days in the month and today's date and supplier lead time and buffer. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>order_by</strong></td><td><code>Days in the month - Supplier lead time - Buffer</code></td></tr><tr><td><strong>spare</strong></td><td><code>Days in the month - Supplier lead time - Buffer - Today's date</code></td></tr><tr><td><strong>lead_share</strong></td><td><code>(Supplier lead time + Buffer) ÷ Days in the month × 100</code></td></tr><tr><td><strong>missed</strong></td><td><code>if_else(Days in the month - Supplier lead time - Buffer - Today's date < 0, 1, 0)</code></td></tr></tbody></table><p>The month length less the lead time and the buffer gives the last order day. Subtracting today gives the days to spare, negative when the window has closed, and the share is the lead and buffer over the month.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports order by and days to spare and lead time share of the month and already too late.</p><ul><li><strong>Days in the month</strong> — days.</li><li><strong>Today&#x27;s date</strong> — day of month.</li><li><strong>Supplier lead time</strong> — days.</li><li><strong>Buffer</strong> — days. Two or three days covers a weekend and a late delivery. A lead time that lands on the last day has no room for either.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Order by</strong> — day.</li><li><strong>Days to spare</strong> — days.</li><li><strong>Lead time share of the month</strong> — %.</li><li><strong>Already too late</strong> — yes/no.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put days in the month = 30 days, today's date = 18 day of month, supplier lead time = 14 days, buffer = 2 days into the form and the panel reads:</p><ul><li><strong>Order by</strong> = <code>Days in the month - Supplier lead time - Buffer</code> = <strong>14 day</strong></li><li><strong>Days to spare</strong> = <code>Days in the month - Supplier lead time - Buffer - Today's date</code> = <strong>-4 days</strong></li><li><strong>Lead time share of the month</strong> = <code>(Supplier lead time + Buffer) ÷ Days in the month × 100</code> = <strong>53.333 %</strong></li><li><strong>Already too late</strong> = <code>if_else(Days in the month - Supplier lead time - Buffer - Today's date < 0, 1, 0)</code> = <strong>1 yes/no</strong></li></ul><p>A seven-day lead time with the same buffer allows ordering by the twenty-first — a week more, and the difference between this month and next.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>30 - 14 - 2</code>, which comes to <strong>14 day</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Thirty days, fourteen of lead time and a two-day buffer: the last order day is the fourteenth. On the eighteenth that is four days late, and the lead time takes 53 per cent of the month.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Order by</th><th>Days to spare</th><th>Lead time share of the month</th><th>Already too late</th></tr></thead><tbody><tr><td><strong>Days in the month</strong> +10 %</td><td>+21.43 %</td><td>+75 %</td><td>−9.09 %</td><td>+0 %</td></tr><tr><td><strong>Today&#x27;s date</strong> +10 %</td><td>+0 %</td><td>−45 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Supplier lead time</strong> +10 %</td><td>−10 %</td><td>−35 %</td><td>+8.75 %</td><td>+0 %</td></tr><tr><td><strong>Buffer</strong> +10 %</td><td>−1.43 %</td><td>−5 %</td><td>+1.25 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Days in the month</strong>. <strong>Buffer</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Days in the month</strong> opens at 30 days</li><li><strong>Today&#x27;s date</strong> opens at 18 day of month</li><li><strong>Supplier lead time</strong> opens at 14 days</li><li><strong>Buffer</strong> opens at 2 days — Two or three days covers a weekend and a late delivery. A lead time that lands on the last day has no room for either.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Days in the month</th><th>Order by</th><th>Days to spare</th><th>Lead time share of the month</th><th>Already too late</th></tr></thead><tbody><tr><td>15 days</td><td>-1</td><td>-19</td><td>106.667</td><td>1</td></tr><tr><td>30 days</td><td>14</td><td>-4</td><td>53.333</td><td>1</td></tr><tr><td>60 days</td><td>44</td><td>26</td><td>26.667</td><td>0</td></tr><tr><td>150 days</td><td>134</td><td>116</td><td>10.667</td><td>0</td></tr><tr><td>300 days</td><td>284</td><td>266</td><td>5.333</td><td>0</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set days in the month = 30, today&#x27;s date = 10, supplier lead time = 7, buffer = 2: <strong>Order by</strong> = 21 day, <strong>Days to spare</strong> = 11 days, <strong>Lead time share of the month</strong> = 30 %, <strong>Already too late</strong> = 0 yes/no. A seven-day lead with a two-day buffer allows ordering by the twenty-first, which leaves eleven days to spare on the tenth.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Counting the arrival day twice.</strong> A fourteen-day lead ordered on the first arrives on the fifteenth, not the fourteenth. Build the buffer into the window, not into your hope.</li><li><strong>Forgetting the weekend.</strong> A lead time quoted in working days is longer in calendar days, and a Friday order adds two days nobody counts.</li></li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Within one month.</strong> A lead time longer than the month needs the previous month's calendar, and this page counts a single month from its start.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need days in the month and today's date and supplier lead time and buffer. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Order by and days to spare and lead time share of the month and already too late should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning a restock before a busy period.</li></li><li><li>Working out why last month's order arrived late.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/cycle-time">Takt time</a> <a href="/everyday-life/deadline">Deadline</a> <a href="/everyday-life/expiration-date">Expiration date</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Days in the month</strong> ×10</td><td>14</td><td>284</td><td>×20.286</td></tr><tr><td><strong>Today&#x27;s date</strong> ×10</td><td>14</td><td>14</td><td>unchanged</td></tr><tr><td><strong>Supplier lead time</strong> ×10</td><td>14</td><td>-112</td><td>×-8</td></tr><tr><td><strong>Buffer</strong> ×10</td><td>14</td><td>-4</td><td>×-0.286</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lead Time calculator work out?', 'a' => <<<'TXT'
            It returns order by and days to spare and lead time share of the month and already too late from days in the month and today's date and supplier lead time and buffer. The relationship is Days in the month - Supplier lead time - Buffer.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Days in the month (days), Today\'s date (day of month), Supplier lead time (days), Buffer (days). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: days in the month in days; today's date in day of month; supplier lead time in days; buffer in days. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Is the lead time working days or calendar days?', 'a' => 'Ask. Suppliers quote both, and a fourteen-working-day lead is nearly three calendar weeks once weekends are counted.'],
            ['q' => 'How big should the buffer be?', 'a' => 'Two or three days for domestic suppliers and a week for anything crossing a border. A buffer is cheaper than an air freight.'],
            ['q' => 'What if the lead time is longer than the month?', 'a' => 'Then the order has to go in the previous month, and the calculation starts from the date you need it rather than the end of this one.'],
        ],
        'related' => [
            ['path' => '/everyday-life/cycle-time', 'name' => 'Takt time'],
            ['path' => '/everyday-life/deadline', 'name' => 'Deadline'],
            ['path' => '/everyday-life/expiration-date', 'name' => 'Expiration date'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
