<?php

/**
 * Every Second Calculator
 * /everyday-life/every-second
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Every Second Calculator',
    'meta' => ['title' => 'Every Second — What a Rate per Second Becomes', 'description' => 'One thing a second is 3 600 an hour and 7.5 million in a working year. This page multiplies any rate per second out to a working day, a month and a year.', 'h1' => 'Every Second Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'rate',
                    'label' => 'Rate per second',
                    'type' => 'number',
                    'suffix' => 'per s',
                    'default' => '1',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours_day',
                    'label' => 'Hours a day',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '8',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'per_minute',
                    'label' => 'Per minute',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'units',
                ],
                [
                    'name' => 'per_hour',
                    'label' => 'Per hour',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'units',
                ],
                [
                    'name' => 'per_day',
                    'label' => 'Per working day',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'units',
                ],
                [
                    'name' => 'per_month',
                    'label' => 'Per month',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'units',
                ],
                [
                    'name' => 'per_year',
                    'label' => 'Per working year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'units',
                ],
            ],
        ],
    ],
    'formula' => [
        'per_minute' => 'rate * 60',
        'per_hour' => 'rate * 3600',
        'per_day' => 'rate * 3600 * hours_day',
        'per_month' => 'rate * 3600 * hours_day * 21.7',
        'per_year' => 'rate * 3600 * hours_day * 260',
    ],
    'article' => [
        'intro' => <<<'TXT'
        A rate per second multiplied out to a minute, an hour, a working day, a month and a year, so a small-sounding figure can be judged at the size it actually reaches.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A second is the unit that hides scale. A cent a second sounds like nothing and is 36 an hour — a wage. One click a second is 28 800 in an eight-hour day and 7.5 million in a working year of 260 days.</p><p>The page multiplies by the number of seconds in an hour, a working day, an average working month of 21.7 days and a working year of 260, which are the figures payroll and performance work in.</p><p>The answer is <strong>per minute and per hour and per working day and per month and per working year</strong>, worked out from rate per second and hours a day. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>per_minute</strong></td><td><code>Rate per second × 60</code></td></tr><tr><td><strong>per_hour</strong></td><td><code>Rate per second × 3600</code></td></tr><tr><td><strong>per_day</strong></td><td><code>Rate per second × 3600 × Hours a day</code></td></tr><tr><td><strong>per_month</strong></td><td><code>Rate per second × 3600 × Hours a day × 21.7</code></td></tr><tr><td><strong>per_year</strong></td><td><code>Rate per second × 3600 × Hours a day × 260</code></td></tr></tbody></table><p>The rate times sixty, then 3 600 for an hour. The day multiplies by the hours worked; the month uses 21.7 working days and the year 260, which are the averages of a five-day week with public holidays removed.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports per minute and per hour and per working day and per month and per working year.</p><ul><li><strong>Rate per second</strong> — per s.</li><li><strong>Hours a day</strong> — h.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Per minute</strong> — units.</li><li><strong>Per hour</strong> — units.</li><li><strong>Per working day</strong> — units.</li><li><strong>Per month</strong> — units.</li><li><strong>Per working year</strong> — units.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put rate per second = 1 per s, hours a day = 8 h into the form and the panel reads:</p><ul><li><strong>Per minute</strong> = <code>Rate per second × 60</code> = <strong>60 units</strong></li><li><strong>Per hour</strong> = <code>Rate per second × 3600</code> = <strong>3 600 units</strong></li><li><strong>Per working day</strong> = <code>Rate per second × 3600 × Hours a day</code> = <strong>28 800 units</strong></li><li><strong>Per month</strong> = <code>Rate per second × 3600 × Hours a day × 21.7</code> = <strong>624 960 units</strong></li><li><strong>Per working year</strong> = <code>Rate per second × 3600 × Hours a day × 260</code> = <strong>7.488 × 10<sup>6</sup> units</strong></li></ul><p>A cent a second is 28.80 an hour and 59 904 a year in the same eight-hour day, which is a job rather than a rounding error.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>One unit a second for eight hours a day is 60 a minute, 3 600 an hour, 28 800 a day, 624 960 a month and 7 488 000 in a working year.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Per minute</th><th>Per hour</th><th>Per working day</th><th>Per month</th><th>Per working year</th></tr></thead><tbody><tr><td><strong>Rate per second</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Hours a day</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Rate per second</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Rate per second</strong> opens at 1 per s</li><li><strong>Hours a day</strong> opens at 8 h</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Rate per second</th><th>Per minute</th><th>Per hour</th><th>Per working day</th><th>Per month</th><th>Per working year</th></tr></thead><tbody><tr><td>0.5 per s</td><td>30</td><td>1 800</td><td>14 400</td><td>312 480</td><td>3.744 × 10<sup>6</sup></td></tr><tr><td>1 per s</td><td>60</td><td>3 600</td><td>28 800</td><td>624 960</td><td>7.488 × 10<sup>6</sup></td></tr><tr><td>2 per s</td><td>120</td><td>7 200</td><td>57 600</td><td>1.25 × 10<sup>6</sup></td><td>1.498 × 10<sup>7</sup></td></tr><tr><td>5 per s</td><td>300</td><td>18 000</td><td>144 000</td><td>3.125 × 10<sup>6</sup></td><td>3.744 × 10<sup>7</sup></td></tr><tr><td>10 per s</td><td>600</td><td>36 000</td><td>288 000</td><td>6.25 × 10<sup>6</sup></td><td>7.488 × 10<sup>7</sup></td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set rate per second = 0.01, hours a day = 8: <strong>Per minute</strong> = 0.6 units, <strong>Per hour</strong> = 36 units, <strong>Per working day</strong> = 288 units, <strong>Per month</strong> = 6 249.6 units, <strong>Per working year</strong> = 74 880 units. A cent a second is 28.80 an hour and 59 904 a working year — the same order as a salary, which is exactly the trap.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Scaling a second to a year with 365 days.</strong> Nobody works every day. The 260-day year is the one that matches a salary, and using 365 flatters the figure by forty per cent.</li><li><strong>Assuming the rate holds.</strong> A rate per second is an average. A traffic figure that peaks at 1 000 a second does not average 1 000, and the page is for averages.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One rate, no ramp.</strong> Startup, teardown and the hour after lunch are not modelled. The figure is a capacity, not a guarantee.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need rate per second and hours a day. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Per minute and per hour and per working day and per month and per working year should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Judging a per-second billing rate against a salary.</li></li><li><li>Turning a impressive-sounding throughput into a day's work.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/30-min">30-minute blocks</a> <a href="/everyday-life/cost-per-minute">Cost per minute</a> <a href="/everyday-life/tv-alternatives">TV alternatives</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Rate per second</strong> ×10</td><td>60</td><td>600</td><td>ten times larger</td></tr><tr><td><strong>Hours a day</strong> ×10</td><td>60</td><td>60</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Every Second calculator work out?', 'a' => <<<'TXT'
            It returns per minute and per hour and per working day and per month and per working year from rate per second and hours a day. The relationship is Rate per second × 60.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Rate per second (per s), Hours a day (h). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: rate per second in per s; hours a day in h. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How many seconds are in a working year?', 'a' => '7.5 million at eight hours a day over 260 days. A calendar year of 365 days is 31.5 million, and the difference is the point of the page.'],
            ['q' => 'Why 21.7 days in a month?', 'a' => 'Because 260 working days divided by twelve is 21.67. A month with 22 working days is the ordinary case and the average is what a yearly figure divides by.'],
            ['q' => 'What if the rate is a fraction of a unit?', 'a' => 'Type it as a decimal. A cent a second is 0.01 in the rate box, and every answer comes out in the same unit you typed.'],
        ],
        'related' => [
            ['path' => '/everyday-life/30-min', 'name' => '30-minute blocks'],
            ['path' => '/everyday-life/cost-per-minute', 'name' => 'Cost per minute'],
            ['path' => '/everyday-life/tv-alternatives', 'name' => 'TV alternatives'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
