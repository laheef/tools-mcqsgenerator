<?php

/**
 * TV Alternatives Calculator
 * /everyday-life/tv-alternatives
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'TV Alternatives Calculator',
    'meta' => ['title' => 'TV Alternatives — What Three Hours a Night Buys', 'description' => 'Three hours of television a night is 45 days a year. This page turns the habit into books, working weeks and whole days, without telling you what to do about.', 'h1' => 'TV Alternatives Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'hours_day',
                    'label' => 'Television a day',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '3',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'days_week',
                    'label' => 'Days a week',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '7',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours_book',
                    'label' => 'Hours for one book',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '8',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours_week_work',
                    'label' => 'Length of a working week',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '40',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours_year',
                    'label' => 'Hours a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'days',
                    'label' => 'Whole days',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'books',
                    'label' => 'Books not read',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'books',
                ],
                [
                    'name' => 'working_weeks',
                    'label' => 'Working weeks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'weeks',
                ],
            ],
        ],
    ],
    'formula' => ['hours_year' => 'hours_day * days_week * 52', 'days' => 'hours_day * days_week * 52 / 24', 'books' => 'hours_day * days_week * 52 / hours_book', 'working_weeks' => 'hours_day * days_week * 52 / hours_week_work'],
    'article' => [
        'intro' => 'The hours a television habit takes in a year, and the same hours stated as books at an average length, as forty-hour working weeks, and as whole days.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Three hours a night is not an outrageous amount and it is 1 092 hours a year: forty-five and a half whole days, 136 books at eight hours each, or twenty-seven working weeks.</p><p>Those four figures are the same number in different units, and the page does not rank them. Television is rest for a lot of people and the eight-hour book is not the only alternative; the point is that the choice is being made every night without the arithmetic attached.</p><p>The answer is <strong>hours a year and whole days and books not read and working weeks</strong>, worked out from television a day and days a week and hours for one book and length of a working week. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>hours_year</strong></td><td><code>Television a day × Days a week × 52</code></td></tr><tr><td><strong>days</strong></td><td><code>Television a day × Days a week × 52 ÷ 24</code></td></tr><tr><td><strong>books</strong></td><td><code>Television a day × Days a week × 52 ÷ Hours for one book</code></td></tr><tr><td><strong>working_weeks</strong></td><td><code>Television a day × Days a week × 52 ÷ Length of a working week</code></td></tr></tbody></table><p>Hours a day times days a week times 52 gives the year. Dividing by 24 gives whole days, by the length of a book gives books, and by the working week gives the weeks of work it equals.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports hours a year and whole days and books not read and working weeks.</p><ul><li><strong>Television a day</strong> — h.</li><li><strong>Days a week</strong> — days.</li><li><strong>Hours for one book</strong> — h.</li><li><strong>Length of a working week</strong> — h.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Hours a year</strong> — h.</li><li><strong>Whole days</strong> — days.</li><li><strong>Books not read</strong> — books.</li><li><strong>Working weeks</strong> — weeks.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put television a day = 3 h, days a week = 7 days, hours for one book = 8 h, length of a working week = 40 h into the form and the panel reads:</p><ul><li><strong>Hours a year</strong> = <code>Television a day × Days a week × 52</code> = <strong>1 092 h</strong></li><li><strong>Whole days</strong> = <code>Television a day × Days a week × 52 ÷ 24</code> = <strong>45.5 days</strong></li><li><strong>Books not read</strong> = <code>Television a day × Days a week × 52 ÷ Hours for one book</code> = <strong>136.5 books</strong></li><li><strong>Working weeks</strong> = <code>Television a day × Days a week × 52 ÷ Length of a working week</code> = <strong>27.3 weeks</strong></li></ul><p>Two hours a night is 728 hours — 30 days and 91 books. Half an hour less a night is fifteen whole days a year.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>3 × 7 × 52</code>, which comes to <strong>1 092 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Three hours a night, seven nights a week, is 1 092 hours: 45.5 days, 136.5 books and 27.3 working weeks.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Hours a year</th><th>Whole days</th><th>Books not read</th><th>Working weeks</th></tr></thead><tbody><tr><td><strong>Television a day</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Days a week</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Hours for one book</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td></tr><tr><td><strong>Length of a working week</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Television a day</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Television a day</strong> opens at 3 h</li><li><strong>Days a week</strong> opens at 7 days</li><li><strong>Hours for one book</strong> opens at 8 h</li><li><strong>Length of a working week</strong> opens at 40 h</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Television a day</th><th>Hours a year</th><th>Whole days</th><th>Books not read</th><th>Working weeks</th></tr></thead><tbody><tr><td>1.5 h</td><td>546</td><td>22.75</td><td>68.25</td><td>13.65</td></tr><tr><td>3 h</td><td>1 092</td><td>45.5</td><td>136.5</td><td>27.3</td></tr><tr><td>6 h</td><td>2 184</td><td>91</td><td>273</td><td>54.6</td></tr><tr><td>15 h</td><td>5 460</td><td>227.5</td><td>682.5</td><td>136.5</td></tr><tr><td>30 h</td><td>10 920</td><td>455</td><td>1 365</td><td>273</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set television a day = 2, days a week = 7, hours for one book = 8, length of a working week = 40: <strong>Hours a year</strong> = 728 h, <strong>Whole days</strong> = 30.333 days, <strong>Books not read</strong> = 91 books, <strong>Working weeks</strong> = 18.2 weeks. Two hours a night is 728 hours, 30.3 days, 91 books and 18.2 working weeks — fifteen days less than the three-hour habit.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Treating the figure as a target.</strong> The hours are not spare capacity waiting to be used productively; some of them are how people recover from a day that is already full.</li><li><strong>Assuming every hour is displaced.</strong> Watching while cooking or ironing is not three hours of lost time, and a fair comparison would account for the overlap.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One habit, one year.</strong> Seasonality is real — winter viewing is double summer in most households — and the average hides it.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need television a day and days a week and hours for one book and length of a working week. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Hours a year and whole days and books not read and working weeks should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Deciding whether to cancel a subscription that fills the habit.</li></li><li><li>Comparing a nightly routine with a different one on the same hours.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/binge-watching">Binge-watching</a> <a href="/everyday-life/podcasts">Podcast time</a> <a href="/everyday-life/30-min">30-minute blocks</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Television a day</strong> ×10</td><td>1 092</td><td>10 920</td><td>ten times larger</td></tr><tr><td><strong>Days a week</strong> ×10</td><td>1 092</td><td>10 920</td><td>ten times larger</td></tr><tr><td><strong>Hours for one book</strong> ×10</td><td>1 092</td><td>1 092</td><td>unchanged</td></tr><tr><td><strong>Length of a working week</strong> ×10</td><td>1 092</td><td>1 092</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the TV Alternatives calculator work out?', 'a' => <<<'TXT'
            It returns hours a year and whole days and books not read and working weeks from television a day and days a week and hours for one book and length of a working week. The relationship is Television a day × Days a week × 52.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Television a day (h), Days a week (days), Hours for one book (h), Length of a working week (h). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: television a day in h; days a week in days; hours for one book in h; length of a working week in h. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Is three hours a night normal?', 'a' => 'It is close to the average for adults in countries that measure it, and averages hide a lot: many people watch one hour and a minority watch six.'],
            ['q' => 'Is reading really the alternative?', 'a' => 'For some people, and not as a moral claim. The page uses a book because it is a unit everyone recognises, in the same way a salary is quoted per year.'],
            ['q' => 'Why 52 weeks rather than 48?', 'a' => 'Because a habit with a holiday in it is still a habit for most of the year. Use the days-a-week field down to five if weekends genuinely look different.'],
        ],
        'related' => [
            ['path' => '/everyday-life/binge-watching', 'name' => 'Binge-watching'],
            ['path' => '/everyday-life/podcasts', 'name' => 'Podcast time'],
            ['path' => '/everyday-life/30-min', 'name' => '30-minute blocks'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
