<?php

/**
 * Working Days Calculator
 * /everyday-life/working-days
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Working Days Calculator',
    'meta' => ['title' => 'Working Days in a Month — Counting the Weekdays', 'description' => 'How many weekdays a month contains, from its length and the weekday it starts on, with the weekend days and the count at a four-day week shown beside it.', 'h1' => 'Working Days Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'days',
                    'label' => 'Days in the month',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '30',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'start',
                    'label' => 'First day is',
                    'type' => 'number',
                    'suffix' => 'weekday',
                    'default' => '3',
                    'help' => 'Numbered Monday 1 to Sunday 7. A calendar will tell you which the first of the month is.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'work_week',
                    'label' => 'Short week, days a week',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '4',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'weekdays',
                    'label' => 'Working days',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'weekdays',
                ],
                [
                    'name' => 'weekend',
                    'label' => 'Weekend days',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'weekend days',
                ],
                [
                    'name' => 'four_day',
                    'label' => 'At a four-day week',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'weeks',
                    'label' => 'Full weeks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'weeks',
                ],
            ],
        ],
    ],
    'formula' => ['weekdays' => <<<'TXT'
    floor(days / 7) * 5 + if_else(mod(days, 7) > 0, if_else(mod(start - 1, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 1, if_else(mod(start, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 2, if_else(mod(start + 1, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 3, if_else(mod(start + 2, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 4, if_else(mod(start + 3, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 5, if_else(mod(start + 4, 7) < 5, 1, 0), 0)
    TXT, 'weekend' => <<<'TXT'
    days - (floor(days / 7) * 5 + if_else(mod(days, 7) > 0, if_else(mod(start - 1, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 1, if_else(mod(start, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 2, if_else(mod(start + 1, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 3, if_else(mod(start + 2, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 4, if_else(mod(start + 3, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 5, if_else(mod(start + 4, 7) < 5, 1, 0), 0))
    TXT, 'four_day' => 'floor(days / 7) * work_week', 'weeks' => 'days / 7'],
    'article' => [
        'intro' => 'How many weekdays a month contains, from its length and the weekday it begins on, with the weekend days and the count at a four-day week.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A month is four weeks and two or three days, and those days decide whether it has twenty or twenty-three working days. Thirty days starting on a Wednesday has twenty-two weekdays; thirty starting on a Saturday has twenty.</p><p>The formula counts whole weeks at five each and then adds the weekdays in the remainder, which is why the weekday the month starts on matters as much as its length. February is the awkward one: twenty-eight days is exactly four weeks, so every February has twenty weekdays whatever day it starts on.</p><p>The answer is <strong>working days and weekend days and at a four-day week and full weeks</strong>, worked out from days in the month and first day is and short week, days a week. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>weekdays</strong></td><td><code>floor(Days in the month ÷ 7) × 5 + if_else(mod(Days in the month, 7) > 0, if_else(mod(First day is - 1, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 1, if_else(mod(First day is, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 2, if_else(mod(First day is + 1, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 3, if_else(mod(First day is + 2, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 4, if_else(mod(First day is + 3, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 5, if_else(mod(First day is + 4, 7) < 5, 1, 0), 0)</code></td></tr><tr><td><strong>weekend</strong></td><td><code>Days in the month - (floor(Days in the month ÷ 7) × 5 + if_else(mod(Days in the month, 7) > 0, if_else(mod(First day is - 1, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 1, if_else(mod(First day is, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 2, if_else(mod(First day is + 1, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 3, if_else(mod(First day is + 2, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 4, if_else(mod(First day is + 3, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 5, if_else(mod(First day is + 4, 7) < 5, 1, 0), 0))</code></td></tr><tr><td><strong>four_day</strong></td><td><code>floor(Days in the month ÷ 7) × Short week, days a week</code></td></tr><tr><td><strong>weeks</strong></td><td><code>Days in the month ÷ 7</code></td></tr></tbody></table><p>Whole weeks give five weekdays each; the remainder of up to six days is tested one at a time against the starting weekday. Weekends are the month less the weekdays.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports working days and weekend days and at a four-day week and full weeks.</p><ul><li><strong>Days in the month</strong> — days.</li><li><strong>First day is</strong> — weekday. Numbered Monday 1 to Sunday 7. A calendar will tell you which the first of the month is.</li><li><strong>Short week, days a week</strong> — days.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Working days</strong> — weekdays.</li><li><strong>Weekend days</strong> — weekend days.</li><li><strong>At a four-day week</strong> — days.</li><li><strong>Full weeks</strong> — weeks.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put days in the month = 30 days, first day is = 3 weekday, short week, days a week = 4 days into the form and the panel reads:</p><ul><li><strong>Working days</strong> = <code>floor(Days in the month ÷ 7) × 5 + if_else(mod(Days in the month, 7) > 0, if_else(mod(First day is - 1, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 1, if_else(mod(First day is, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 2, if_else(mod(First day is + 1, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 3, if_else(mod(First day is + 2, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 4, if_else(mod(First day is + 3, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 5, if_else(mod(First day is + 4, 7) < 5, 1, 0), 0)</code> = <strong>22 weekdays</strong></li><li><strong>Weekend days</strong> = <code>Days in the month - (floor(Days in the month ÷ 7) × 5 + if_else(mod(Days in the month, 7) > 0, if_else(mod(First day is - 1, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 1, if_else(mod(First day is, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 2, if_else(mod(First day is + 1, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 3, if_else(mod(First day is + 2, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 4, if_else(mod(First day is + 3, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 5, if_else(mod(First day is + 4, 7) < 5, 1, 0), 0))</code> = <strong>8 weekend days</strong></li><li><strong>At a four-day week</strong> = <code>floor(Days in the month ÷ 7) × Short week, days a week</code> = <strong>16 days</strong></li><li><strong>Full weeks</strong> = <code>Days in the month ÷ 7</code> = <strong>4.286 weeks</strong></li></ul><p>The same thirty days starting on a Saturday is twenty weekdays — two fewer, which is two days of pay, invoicing or shipping.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>floor(30 ÷ 7) × 5 + if_else(mod(30, 7) > 0, if_else(mod(3 - 1, 7) < 5, 1, 0), 0) + if_else(mod(30, 7) > 1, if_else(mod(3, 7) < 5, 1, 0), 0) + if_else(mod(30, 7) > 2, if_else(mod(3 + 1, 7) < 5, 1, 0), 0) + if_else(mod(30, 7) > 3, if_else(mod(3 + 2, 7) < 5, 1, 0), 0) + if_else(mod(30, 7) > 4, if_else(mod(3 + 3, 7) < 5, 1, 0), 0) + if_else(mod(30, 7) > 5, if_else(mod(3 + 4, 7) < 5, 1, 0), 0)</code>, which comes to <strong>22 weekdays</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Thirty days starting on a Wednesday is twenty-two weekdays and eight weekend days, four full weeks, and sixteen days at a four-day week.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Working days</th><th>Weekend days</th><th>At a four-day week</th><th>Full weeks</th></tr></thead><tbody><tr><td><strong>Days in the month</strong> +10 %</td><td>+4.55 %</td><td>+25 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>First day is</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Short week, days a week</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Days in the month</strong>. <strong>First day is</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Days in the month</strong> opens at 30 days</li><li><strong>First day is</strong> opens at 3 weekday — Numbered Monday 1 to Sunday 7. A calendar will tell you which the first of the month is.</li><li><strong>Short week, days a week</strong> opens at 4 days</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Days in the month</th><th>Working days</th><th>Weekend days</th><th>At a four-day week</th><th>Full weeks</th></tr></thead><tbody><tr><td>15 days</td><td>11</td><td>4</td><td>8</td><td>2.143</td></tr><tr><td>30 days</td><td>22</td><td>8</td><td>16</td><td>4.286</td></tr><tr><td>60 days</td><td>43</td><td>17</td><td>32</td><td>8.571</td></tr><tr><td>150 days</td><td>108</td><td>42</td><td>84</td><td>21.429</td></tr><tr><td>300 days</td><td>214</td><td>86</td><td>168</td><td>42.857</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set days in the month = 30, first day is = 6, short week, days a week = 5: <strong>Working days</strong> = 20 weekdays, <strong>Weekend days</strong> = 10 weekend days, <strong>At a four-day week</strong> = 20 days, <strong>Full weeks</strong> = 4.286 weeks. The same thirty days starting on a Saturday has twenty weekdays — two fewer for the same calendar length.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Assuming twenty-one.</strong> A month has between twenty and twenty-three weekdays, and the spread is a tenth of a working month.</li><li><strong>Forgetting public holidays.</strong> They are weekdays by this count and days off in practice. Subtract them by hand.</li></li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Five-day week.</strong> The weekday count is Monday to Friday. Shift patterns and seven-day operations need a different count.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need days in the month and first day is and short week, days a week. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Working days and weekend days and at a four-day week and full weeks should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Pricing a month of work or a month of rent.</li></li><li><li>Checking a schedule against the days that actually exist.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/time-card">Time card</a> <a href="/everyday-life/8-hour-shift">Eight-hour shift</a> <a href="/everyday-life/business-days">Business days</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Days in the month</strong> ×10</td><td>22</td><td>214</td><td>×9.727</td></tr><tr><td><strong>First day is</strong> ×10</td><td>22</td><td>22</td><td>unchanged</td></tr><tr><td><strong>Short week, days a week</strong> ×10</td><td>22</td><td>22</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Working Days calculator work out?', 'a' => <<<'TXT'
            It returns working days and weekend days and at a four-day week and full weeks from days in the month and first day is and short week, days a week. The relationship is floor(Days in the month ÷ 7) × 5 + if_else(mod(Days in the month, 7) > 0, if_else(mod(First day is - 1, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 1, if_else(mod(First day is, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 2, if_else(mod(First day is + 1, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 3, if_else(mod(First day is + 2, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 4, if_else(mod(First day is + 3, 7) < 5, 1, 0), 0) + if_else(mod(Days in the month, 7) > 5, if_else(mod(First day is + 4, 7) < 5, 1, 0), 0).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Days in the month (days), First day is (weekday), Short week, days a week (days). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: days in the month in days; first day is in weekday; short week, days a week in days. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How many working days are in a year?', 'a' => 'About 260 at five days a week, from 365 less 104 weekend days and a handful of public holidays.'],
            ['q' => 'Why does February always have twenty?', 'a' => 'Because twenty-eight days is exactly four weeks, so every weekday appears four times and Monday to Friday total twenty.'],
            ['q' => 'Does this count public holidays?', 'a' => 'No. Saturday and Sunday are the only exclusions, and holidays vary by country and by year.'],
        ],
        'related' => [
            ['path' => '/everyday-life/time-card', 'name' => 'Time card'],
            ['path' => '/everyday-life/8-hour-shift', 'name' => 'Eight-hour shift'],
            ['path' => '/everyday-life/business-days', 'name' => 'Business days'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
