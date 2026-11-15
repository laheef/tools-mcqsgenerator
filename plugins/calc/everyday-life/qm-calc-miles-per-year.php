<?php

/**
 * Miles per Year Calculator
 * /everyday-life/miles-per-year
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Miles per Year Calculator',
    'meta' => ['title' => 'Miles per Year — Annual Driving Distance — Free Tool', 'description' => 'Estimate annual driving distance from miles per driving day, days driven each week and driving weeks per year. Weekly, monthly and five-year totals use those.', 'h1' => 'Miles per Year Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'miles_day',
                    'label' => 'Miles per driving day',
                    'type' => 'number',
                    'suffix' => 'mi',
                    'default' => '32',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'days_week',
                    'label' => 'Driving days per week',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'weeks_year',
                    'label' => 'Driving weeks per year',
                    'type' => 'number',
                    'suffix' => 'weeks',
                    'default' => '50',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'weekly',
                    'label' => 'Miles per week',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mi',
                ],
                [
                    'name' => 'annual',
                    'label' => 'Miles per year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mi',
                ],
                [
                    'name' => 'monthly',
                    'label' => 'Average miles per month',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mi',
                ],
                [
                    'name' => 'five_year',
                    'label' => 'Miles over five years',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mi',
                ],
            ],
        ],
    ],
    'formula' => ['weekly' => 'miles_day * days_week', 'annual' => 'miles_day * days_week * weeks_year', 'monthly' => 'miles_day * days_week * weeks_year / 12', 'five_year' => 'miles_day * days_week * weeks_year * 5'],
    'article' => [
        'intro' => 'A daily commute or regular trip can be expanded into a year once the number of driving days and active weeks is stated.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            Annual mileage is a habit multiplied by a calendar. A number per day is not a year until the days driven and the weeks off are accounted for. This page keeps both inputs visible instead of assuming the car moves every day of all 52 weeks.<p>The answer is <strong>miles per week and miles per year and average miles per month and miles over five years</strong>, worked out from miles per driving day and driving days per week and driving weeks per year. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>weekly</strong></td><td><code>Miles per driving day × Driving days per week</code></td></tr><tr><td><strong>annual</strong></td><td><code>Miles per driving day × Driving days per week × Driving weeks per year</code></td></tr><tr><td><strong>monthly</strong></td><td><code>Miles per driving day × Driving days per week × Driving weeks per year ÷ 12</code></td></tr><tr><td><strong>five_year</strong></td><td><code>Miles per driving day × Driving days per week × Driving weeks per year × 5</code></td></tr></tbody></table><p>Multiply miles per driving day by driving days per week for the weekly distance. Multiply again by driving weeks per year for the annual total; monthly is that total divided by twelve.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports miles per week and miles per year and average miles per month and miles over five years.</p><ul><li><strong>Miles per driving day</strong> — mi.</li><li><strong>Driving days per week</strong> — days.</li><li><strong>Driving weeks per year</strong> — weeks.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Miles per week</strong> — mi.</li><li><strong>Miles per year</strong> — mi.</li><li><strong>Average miles per month</strong> — mi.</li><li><strong>Miles over five years</strong> — mi.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put miles per driving day = 32 mi, driving days per week = 5 days, driving weeks per year = 50 weeks into the form and the panel reads:</p><ul><li><strong>Miles per week</strong> = <code>Miles per driving day × Driving days per week</code> = <strong>160 mi</strong></li><li><strong>Miles per year</strong> = <code>Miles per driving day × Driving days per week × Driving weeks per year</code> = <strong>8 000 mi</strong></li><li><strong>Average miles per month</strong> = <code>Miles per driving day × Driving days per week × Driving weeks per year ÷ 12</code> = <strong>666.667 mi</strong></li><li><strong>Miles over five years</strong> = <code>Miles per driving day × Driving days per week × Driving weeks per year × 5</code> = <strong>40 000 mi</strong></li></ul><p>The result is a planning estimate. Holidays, vacations, remote-work days, extra trips and changes in route all move actual mileage. The monthly result is an even average, not a prediction for each month. Use the number from an odometer log or insurer statement when an official estimate is required. The five-year total assumes the pattern stays unchanged throughout the period; it does not account for a vehicle replacement or a change of job. The miles-per-driving-day field should already include the distance driven on that day, including return trips if relevant.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>32 × 5</code>, which comes to <strong>160 mi</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Thirty-two miles on five driving days for 50 weeks gives 160 miles a week and 8,000 a year. Spread evenly across 12 months, that is 666.667 miles per month; five years at the same pace is 40,000 miles.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Miles per week</th><th>Miles per year</th><th>Average miles per month</th><th>Miles over five years</th></tr></thead><tbody><tr><td><strong>Miles per driving day</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Driving days per week</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Driving weeks per year</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Driving weeks per year</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Miles per driving day</strong> opens at 32 mi</li><li><strong>Driving days per week</strong> opens at 5 days</li><li><strong>Driving weeks per year</strong> opens at 50 weeks</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Miles per driving day</th><th>Miles per week</th><th>Miles per year</th><th>Average miles per month</th><th>Miles over five years</th></tr></thead><tbody><tr><td>16 mi</td><td>80</td><td>4 000</td><td>333.333</td><td>20 000</td></tr><tr><td>32 mi</td><td>160</td><td>8 000</td><td>666.667</td><td>40 000</td></tr><tr><td>64 mi</td><td>320</td><td>16 000</td><td>1 333.333</td><td>80 000</td></tr><tr><td>160 mi</td><td>800</td><td>40 000</td><td>3 333.333</td><td>200 000</td></tr><tr><td>320 mi</td><td>1 600</td><td>80 000</td><td>6 666.667</td><td>400 000</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
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
            The result is a planning estimate. Holidays, vacations, remote-work days, extra trips and changes in route all move actual mileage. The monthly result is an even average, not a prediction for each month. Use the number from an odometer log or insurer statement when an official estimate is required. The five-year total assumes the pattern stays unchanged throughout the period; it does not account for a vehicle replacement or a change of job. The miles-per-driving-day field should already include the distance driven on that day, including return trips if relevant.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need miles per driving day and driving days per week and driving weeks per year. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Miles per week and miles per year and average miles per month and miles over five years should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning a date or recurring activity with the stated assumptions.</li></li><li><li>Comparing the result with a calendar or record before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/fuel-mileage">Fuel mileage</a> <a href="/everyday-life/fuel-distance">Fuel distance</a> <a href="/everyday-life/commute">Commute calculator</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Miles per driving day</strong> ×10</td><td>160</td><td>1 600</td><td>ten times larger</td></tr><tr><td><strong>Driving days per week</strong> ×10</td><td>160</td><td>1 600</td><td>ten times larger</td></tr><tr><td><strong>Driving weeks per year</strong> ×10</td><td>160</td><td>160</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Miles per Year calculator work out?', 'a' => <<<'TXT'
            It returns miles per week and miles per year and average miles per month and miles over five years from miles per driving day and driving days per week and driving weeks per year. The relationship is Miles per driving day × Driving days per week.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Miles per driving day (mi), Driving days per week (days), Driving weeks per year (weeks). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: miles per driving day in mi; driving days per week in days; driving weeks per year in weeks. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Does it assume 52 driving weeks?', 'a' => 'No. Enter the weeks you expect to drive; the default leaves two weeks out.'],
            ['q' => 'Is monthly mileage exact?', 'a' => 'No. It is the annual estimate divided evenly across 12 months.'],
            ['q' => 'Should daily miles include the return trip?', 'a' => 'Yes, use the total distance driven on each driving day.'],
            ['q' => 'Does this read an odometer?', 'a' => 'No. It only uses the values entered.'],
        ],
        'related' => [
            ['path' => '/everyday-life/fuel-mileage', 'name' => 'Fuel mileage'],
            ['path' => '/everyday-life/fuel-distance', 'name' => 'Fuel distance'],
            ['path' => '/everyday-life/commute', 'name' => 'Commute calculator'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
