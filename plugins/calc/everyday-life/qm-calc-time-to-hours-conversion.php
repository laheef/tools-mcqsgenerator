<?php

/**
 * Time to Hours Calculator
 * /everyday-life/time-to-hours-conversion
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Time to Hours Calculator',
    'meta' => ['title' => 'Time to Hours — A Shift in Decimals with Pay', 'description' => 'Six hours fifty minutes becomes 6.83 decimal hours and 157.17 of pay at 23 an hour, with the shift length in minutes and a whole week of the same shift priced.', 'h1' => 'Time to Hours Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'hours',
                    'label' => 'Hours',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '6',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Minutes',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '50',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rate',
                    'label' => 'Hourly rate',
                    'type' => 'number',
                    'suffix' => '$/h',
                    'default' => '23',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'days_week',
                    'label' => 'Days a week',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'decimal',
                    'label' => 'Decimal hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'pay',
                    'label' => 'Pay for the shift',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'week_pay',
                    'label' => 'Pay for the week',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'total_min',
                    'label' => 'Minutes worked',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
            ],
        ],
    ],
    'formula' => ['decimal' => 'hours + minutes / 60', 'pay' => '(hours + minutes / 60) * rate', 'week_pay' => '(hours + minutes / 60) * rate * days_week', 'total_min' => 'hours * 60 + minutes'],
    'article' => [
        'intro' => 'A shift written in hours and minutes turned into decimal hours, priced at an hourly rate, and averaged over a working week.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Six hours fifty is 6.8333 in decimals, and a payroll sheet that reads 6.50 pays for six and a half hours — twenty minutes short, every day, for as long as nobody checks.</p><p>The multiplication is trivial and the conversion is where the money goes. At 23 an hour the shift is 157.17, and the twenty minutes nobody claimed is 7.67 a day.</p><p>The answer is <strong>decimal hours and pay for the shift and pay for the week and minutes worked</strong>, worked out from hours and minutes and hourly rate and days a week. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>decimal</strong></td><td><code>Hours + Minutes ÷ 60</code></td></tr><tr><td><strong>pay</strong></td><td><code>(Hours + Minutes ÷ 60) × Hourly rate</code></td></tr><tr><td><strong>week_pay</strong></td><td><code>(Hours + Minutes ÷ 60) × Hourly rate × Days a week</code></td></tr><tr><td><strong>total_min</strong></td><td><code>Hours × 60 + Minutes</code></td></tr></tbody></table><p>Hours plus minutes over sixty gives decimal hours. Times the rate gives the shift, times the days a week the week, and the minutes are the duration in a single unit.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports decimal hours and pay for the shift and pay for the week and minutes worked.</p><ul><li><strong>Hours</strong> — h.</li><li><strong>Minutes</strong> — min.</li><li><strong>Hourly rate</strong> — $/h.</li><li><strong>Days a week</strong> — days.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Decimal hours</strong> — h.</li><li><strong>Pay for the shift</strong> — $.</li><li><strong>Pay for the week</strong> — $.</li><li><strong>Minutes worked</strong> — min.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put hours = 6 h, minutes = 50 min, hourly rate = 23 $/h, days a week = 5 days into the form and the panel reads:</p><ul><li><strong>Decimal hours</strong> = <code>Hours + Minutes ÷ 60</code> = <strong>6.833 h</strong></li><li><strong>Pay for the shift</strong> = <code>(Hours + Minutes ÷ 60) × Hourly rate</code> = <strong>157.167 $</strong></li><li><strong>Pay for the week</strong> = <code>(Hours + Minutes ÷ 60) × Hourly rate × Days a week</code> = <strong>785.833 $</strong></li><li><strong>Minutes worked</strong> = <code>Hours × 60 + Minutes</code> = <strong>410 min</strong></li></ul><p>Six and a half hours reads 6.50 and pays 149.50: the same twenty minutes is 7.67 a shift and 38 a week.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>6 + 50 ÷ 60</code>, which comes to <strong>6.833 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Six hours fifty minutes is 6.83 decimal hours, 157.17 a shift and 785.83 for five days — 410 minutes a shift.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Decimal hours</th><th>Pay for the shift</th><th>Pay for the week</th><th>Minutes worked</th></tr></thead><tbody><tr><td><strong>Hours</strong> +10 %</td><td>+8.78 %</td><td>+8.78 %</td><td>+8.78 %</td><td>+8.78 %</td></tr><tr><td><strong>Minutes</strong> +10 %</td><td>+1.22 %</td><td>+1.22 %</td><td>+1.22 %</td><td>+1.22 %</td></tr><tr><td><strong>Hourly rate</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Days a week</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Hourly rate</strong>. <strong>Minutes</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Hours</strong> opens at 6 h</li><li><strong>Minutes</strong> opens at 50 min</li><li><strong>Hourly rate</strong> opens at 23 $/h</li><li><strong>Days a week</strong> opens at 5 days</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Hours</th><th>Decimal hours</th><th>Pay for the shift</th><th>Pay for the week</th><th>Minutes worked</th></tr></thead><tbody><tr><td>3 h</td><td>3.833</td><td>88.167</td><td>440.833</td><td>230</td></tr><tr><td>6 h</td><td>6.833</td><td>157.167</td><td>785.833</td><td>410</td></tr><tr><td>12 h</td><td>12.833</td><td>295.167</td><td>1 475.833</td><td>770</td></tr><tr><td>30 h</td><td>30.833</td><td>709.167</td><td>3 545.833</td><td>1 850</td></tr><tr><td>60 h</td><td>60.833</td><td>1 399.167</td><td>6 995.833</td><td>3 650</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set hours = 6, minutes = 30, hourly rate = 23, days a week = 5: <strong>Decimal hours</strong> = 6.5 h, <strong>Pay for the shift</strong> = 149.5 $, <strong>Pay for the week</strong> = 747.5 $, <strong>Minutes worked</strong> = 390 min. Six and a half hours is 6.50 decimal hours and 149.50 a shift: twenty minutes a day less than the same shift at six fifty.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Entering minutes as hundredths.</strong> Fifty minutes is 0.83, not 0.50. It is the single most common payroll error and it always pays less than the truth.</li><li><strong>Rounding the rate instead of the hours.</strong> Convert and multiply, then round to the cent. Rounding 6.8333 to 6.83 first loses a few cents a shift, which is a few dollars a year.</li></li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>A regular shift.</strong> The week multiplies one shift by the days. Different shifts each day need each one converted and then added.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need hours and minutes and hourly rate and days a week. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Decimal hours and pay for the shift and pay for the week and minutes worked should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Converting a shift for a payroll submission.</li></li><li><li>Quoting an hourly job from its length.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/time-card">Time card</a> <a href="/everyday-life/time-to-decimal">Time to decimal</a> <a href="/everyday-life/decimal-time-conversion">Decimal time conversion</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Hours</strong> ×10</td><td>6.833</td><td>60.833</td><td>×8.902</td></tr><tr><td><strong>Minutes</strong> ×10</td><td>6.833</td><td>14.333</td><td>×2.098</td></tr><tr><td><strong>Hourly rate</strong> ×10</td><td>6.833</td><td>6.833</td><td>unchanged</td></tr><tr><td><strong>Days a week</strong> ×10</td><td>6.833</td><td>6.833</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Time to Hours calculator work out?', 'a' => <<<'TXT'
            It returns decimal hours and pay for the shift and pay for the week and minutes worked from hours and minutes and hourly rate and days a week. The relationship is Hours + Minutes ÷ 60.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Hours (h), Minutes (min), Hourly rate ($/h), Days a week (days). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: hours in h; minutes in min; hourly rate in $/h; days a week in days. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What is 6 hours 50 minutes in decimal hours?', 'a' => '6.83. The fifty minutes are five-sixths of an hour, which is 0.8333.'],
            ['q' => 'Do employers round the minutes?', 'a' => 'Many round to the nearest quarter of an hour. That is a policy, not a conversion — the decimal figure is what the policy then rounds.'],
            ['q' => 'Does a break come off before the conversion?', 'a' => 'Yes. Subtract the unpaid break first, then convert, or the pay includes time that was not worked.'],
        ],
        'related' => [
            ['path' => '/everyday-life/time-card', 'name' => 'Time card'],
            ['path' => '/everyday-life/time-to-decimal', 'name' => 'Time to decimal'],
            ['path' => '/everyday-life/decimal-time-conversion', 'name' => 'Decimal time conversion'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
