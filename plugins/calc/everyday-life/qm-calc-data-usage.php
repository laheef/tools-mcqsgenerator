<?php

/**
 * Data Usage Calculator
 * /everyday-life/data-usage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Data Usage Calculator',
    'meta' => ['title' => 'Data Usage — Streaming Hours into Gigabytes', 'description' => 'Two hours a day at 3 GB an hour is 183 GB a month: what a streaming habit costs in data, and how many hours a thousand-gigabyte allowance really lasts.', 'h1' => 'Data Usage Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'hours_day',
                    'label' => 'Hours a day',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '2',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mb_hour',
                    'label' => 'Data an hour',
                    'type' => 'number',
                    'suffix' => 'MB/h',
                    'default' => '3000',
                    'help' => 'Standard definition is about 1 000 MB an hour, HD about 3 000 and 4K about 7 000.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cap',
                    'label' => 'Monthly allowance',
                    'type' => 'number',
                    'suffix' => 'GB',
                    'default' => '1000',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gb_day',
                    'label' => 'Data a day',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'GB',
                ],
                [
                    'name' => 'gb_month',
                    'label' => 'Data a month',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'GB',
                ],
                [
                    'name' => 'gb_year',
                    'label' => 'Data a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'GB',
                ],
                [
                    'name' => 'hours_cap',
                    'label' => 'Hours an allowance lasts',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
            ],
        ],
    ],
    'formula' => ['gb_day' => 'hours_day * mb_hour / 1000', 'gb_month' => 'hours_day * mb_hour / 1000 * 30.4375', 'gb_year' => 'hours_day * mb_hour / 1000 * 365', 'hours_cap' => 'cap * 1000 / mb_hour'],
    'article' => [
        'intro' => 'The data a streaming habit consumes a day, a month and a year, and how many hours a monthly allowance lasts at your resolution.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Streaming is the largest line in most household data and the least visible: it arrives in hours and the allowance is in gigabytes. Three gigabytes an hour at two hours a day is six a day and 183 a month.</p><p>A thousand-gigabyte allowance is 333 hours at HD, which sounds enormous and is less than six months of two hours a night. At 4K the same allowance is 143 hours, and that is where a household suddenly notices a cap.</p><p>The answer is <strong>data a day and data a month and data a year and hours an allowance lasts</strong>, worked out from hours a day and data an hour and monthly allowance. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>gb_day</strong></td><td><code>Hours a day × Data an hour ÷ 1000</code></td></tr><tr><td><strong>gb_month</strong></td><td><code>Hours a day × Data an hour ÷ 1000 × 30.4375</code></td></tr><tr><td><strong>gb_year</strong></td><td><code>Hours a day × Data an hour ÷ 1000 × 365</code></td></tr><tr><td><strong>hours_cap</strong></td><td><code>Monthly allowance × 1000 ÷ Data an hour</code></td></tr></tbody></table><p>Megabytes an hour times hours gives megabytes a day, divided by a thousand for gigabytes. The month uses 30.44 days and the year 365, and the allowance in hours is the cap over the hourly rate.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports data a day and data a month and data a year and hours an allowance lasts.</p><ul><li><strong>Hours a day</strong> — h.</li><li><strong>Data an hour</strong> — MB/h. Standard definition is about 1 000 MB an hour, HD about 3 000 and 4K about 7 000.</li><li><strong>Monthly allowance</strong> — GB.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Data a day</strong> — GB.</li><li><strong>Data a month</strong> — GB.</li><li><strong>Data a year</strong> — GB.</li><li><strong>Hours an allowance lasts</strong> — h.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put hours a day = 2 h, data an hour = 3 000 MB/h, monthly allowance = 1 000 GB into the form and the panel reads:</p><ul><li><strong>Data a day</strong> = <code>Hours a day × Data an hour ÷ 1000</code> = <strong>6 GB</strong></li><li><strong>Data a month</strong> = <code>Hours a day × Data an hour ÷ 1000 × 30.4375</code> = <strong>182.625 GB</strong></li><li><strong>Data a year</strong> = <code>Hours a day × Data an hour ÷ 1000 × 365</code> = <strong>2 190 GB</strong></li><li><strong>Hours an allowance lasts</strong> = <code>Monthly allowance × 1000 ÷ Data an hour</code> = <strong>333.333 h</strong></li></ul><p>Four hours a day doubles everything to 365 GB a month, which is a third of the allowance spent on one screen in one room.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>2 × 3 000 ÷ 1000</code>, which comes to <strong>6 GB</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Two hours at 3 000 MB an hour is 6 GB a day, 182.6 GB a month and 2 190 GB a year. A 1 000 GB allowance lasts 333 hours.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Data a day</th><th>Data a month</th><th>Data a year</th><th>Hours an allowance lasts</th></tr></thead><tbody><tr><td><strong>Hours a day</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Data an hour</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Monthly allowance</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Monthly allowance</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Hours a day</strong> opens at 2 h</li><li><strong>Data an hour</strong> opens at 3 000 MB/h — Standard definition is about 1 000 MB an hour, HD about 3 000 and 4K about 7 000.</li><li><strong>Monthly allowance</strong> opens at 1 000 GB</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Hours a day</th><th>Data a day</th><th>Data a month</th><th>Data a year</th><th>Hours an allowance lasts</th></tr></thead><tbody><tr><td>1 h</td><td>3</td><td>91.312</td><td>1 095</td><td>333.333</td></tr><tr><td>2 h</td><td>6</td><td>182.625</td><td>2 190</td><td>333.333</td></tr><tr><td>4 h</td><td>12</td><td>365.25</td><td>4 380</td><td>333.333</td></tr><tr><td>10 h</td><td>30</td><td>913.125</td><td>10 950</td><td>333.333</td></tr><tr><td>20 h</td><td>60</td><td>1 826.25</td><td>21 900</td><td>333.333</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set hours a day = 4, data an hour = 3 000, monthly allowance = 1 000: <strong>Data a day</strong> = 12 GB, <strong>Data a month</strong> = 365.25 GB, <strong>Data a year</strong> = 4 380 GB, <strong>Hours an allowance lasts</strong> = 333.333 h. Four hours a day is 12 GB a day and 365 GB a month, so the allowance lasts 166 hours — five weeks of the habit rather than five months.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Comparing a cap with a plan's speed.</strong> The cap is a volume and the speed is a rate. A fast connection reaches the cap sooner, not later.</li><li><strong>Forgetting that the household shares it.</strong> Two screens streaming at once is two streams' worth of data at the same time, and the total is what the cap counts.</li></li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Streaming only.</strong> Downloads, updates, cloud backup and video calls are separate lines, and on a working-from-home connection they often exceed the television.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need hours a day and data an hour and monthly allowance. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Data a day and data a month and data a year and hours an allowance lasts should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Choosing between a capped and an unlimited plan.</li></li><li><li>Working out why a data allowance runs out in the third week.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/tv-series-duration">Series duration</a> <a href="/everyday-life/binge-watching">Binge-watching</a> <a href="/everyday-life/every-second">Every second</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Hours a day</strong> ×10</td><td>6</td><td>60</td><td>ten times larger</td></tr><tr><td><strong>Data an hour</strong> ×10</td><td>6</td><td>60</td><td>ten times larger</td></tr><tr><td><strong>Monthly allowance</strong> ×10</td><td>6</td><td>6</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Data Usage calculator work out?', 'a' => <<<'TXT'
            It returns data a day and data a month and data a year and hours an allowance lasts from hours a day and data an hour and monthly allowance. The relationship is Hours a day × Data an hour ÷ 1000.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Hours a day (h), Data an hour (MB/h), Monthly allowance (GB). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: hours a day in h; data an hour in MB/h; monthly allowance in GB. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How much data does an hour of streaming use?', 'a' => 'About 1 GB in standard definition, 3 GB in HD and 7 GB in 4K, depending on the service and how much the picture moves.'],
            ['q' => 'Does watching on a phone use less?', 'a' => 'The screen does not decide it; the resolution does. A phone streaming HD uses the same as a television streaming HD.'],
            ['q' => 'Is a 1 TB cap unlimited?', 'a' => <<<'TXT'
            For most households, no — a family watching in 4K can pass a terabyte in a couple of months. The number sounds large because it is measured in a different unit from the habit.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/tv-series-duration', 'name' => 'Series duration'],
            ['path' => '/everyday-life/binge-watching', 'name' => 'Binge-watching'],
            ['path' => '/everyday-life/every-second', 'name' => 'Every second'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
