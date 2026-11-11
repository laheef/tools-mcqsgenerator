<?php

/**
 * Cost per Minute Calculator
 * /everyday-life/cost-per-minute
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cost per Minute Calculator',
    'meta' => ['title' => 'Cost per Minute — What an Hourly Rate Really Buys', 'description' => 'An hourly rate divided into minutes: the cost of a quarter of an hour, the cost of a meeting in the calendar, and the annual value of the same minute.', 'h1' => 'Cost per Minute Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'rate',
                    'label' => 'Hourly rate',
                    'type' => 'number',
                    'suffix' => '$/h',
                    'default' => '45',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Time to cost',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '90',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'per_minute',
                    'label' => 'Cost per minute',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/min',
                ],
                [
                    'name' => 'per_second',
                    'label' => 'Cost per second',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/s',
                ],
                [
                    'name' => 'cost',
                    'label' => 'Cost of the time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'year',
                    'label' => 'Working year at 40 h a week',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => ['per_minute' => 'rate / 60', 'per_second' => 'rate / 3600', 'cost' => 'rate / 60 * minutes', 'year' => 'rate * 40 * 52'],
    'article' => [
        'intro' => 'What a minute of a given hourly rate costs, from a quarter of an hour to a full day, and what the same rate is worth over a working year.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>An hourly rate hides how often the hour is not the unit. Fifteen minutes is a quarter of it, a four-hour workshop is four of it, and a meeting that runs over by ten minutes has cost a sixth of an hour at the rate on the invoice.</p><p>At 45 an hour a minute is 75 cents. That is the number to hold in mind when someone asks for "a quick call": ten minutes is 7.50, and a fortnight of quick calls is a day of work.</p><p>The answer is <strong>cost per minute and cost per second and cost of the time and working year at 40 h a week</strong>, worked out from hourly rate and time to cost. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>per_minute</strong></td><td><code>Hourly rate ÷ 60</code></td></tr><tr><td><strong>per_second</strong></td><td><code>Hourly rate ÷ 3600</code></td></tr><tr><td><strong>cost</strong></td><td><code>Hourly rate ÷ 60 × Time to cost</code></td></tr><tr><td><strong>year</strong></td><td><code>Hourly rate × 40 × 52</code></td></tr></tbody></table><p>The rate over sixty gives a minute, over 3 600 a second. Times the minutes gives the cost of a slot, and the yearly figure is the rate times forty hours times fifty-two weeks.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports cost per minute and cost per second and cost of the time and working year at 40 h a week.</p><ul><li><strong>Hourly rate</strong> — $/h.</li><li><strong>Time to cost</strong> — min.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Cost per minute</strong> — $/min.</li><li><strong>Cost per second</strong> — $/s.</li><li><strong>Cost of the time</strong> — $.</li><li><strong>Working year at 40 h a week</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put hourly rate = 45 $/h, time to cost = 90 min into the form and the panel reads:</p><ul><li><strong>Cost per minute</strong> = <code>Hourly rate ÷ 60</code> = <strong>0.75 $/min</strong></li><li><strong>Cost per second</strong> = <code>Hourly rate ÷ 3600</code> = <strong>0.013 $/s</strong></li><li><strong>Cost of the time</strong> = <code>Hourly rate ÷ 60 × Time to cost</code> = <strong>67.5 $</strong></li><li><strong>Working year at 40 h a week</strong> = <code>Hourly rate × 40 × 52</code> = <strong>93 600 $</strong></li></ul><p>The yearly figure is gross pay, not take-home: it says what the time sells for, and taxes and holidays come out of it afterwards.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>45 an hour is 75 cents a minute and 1.25 cents a second. Ninety minutes costs 67.50, and the rate is worth 93 600 over a full working year.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Cost per minute</th><th>Cost per second</th><th>Cost of the time</th><th>Working year at 40 h a week</th></tr></thead><tbody><tr><td><strong>Hourly rate</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Time to cost</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Time to cost</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Hourly rate</strong> opens at 45 $/h</li><li><strong>Time to cost</strong> opens at 90 min</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Hourly rate</th><th>Cost per minute</th><th>Cost per second</th><th>Cost of the time</th><th>Working year at 40 h a week</th></tr></thead><tbody><tr><td>22.5 $/h</td><td>0.375</td><td>0.006</td><td>33.75</td><td>46 800</td></tr><tr><td>45 $/h</td><td>0.75</td><td>0.013</td><td>67.5</td><td>93 600</td></tr><tr><td>90 $/h</td><td>1.5</td><td>0.025</td><td>135</td><td>187 200</td></tr><tr><td>225 $/h</td><td>3.75</td><td>0.062</td><td>337.5</td><td>468 000</td></tr><tr><td>450 $/h</td><td>7.5</td><td>0.125</td><td>675</td><td>936 000</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set hourly rate = 120, time to cost = 45: <strong>Cost per minute</strong> = 2 $/min, <strong>Cost per second</strong> = 0.033 $/s, <strong>Cost of the time</strong> = 90 $, <strong>Working year at 40 h a week</strong> = 249 600 $. At 120 an hour a minute is 2 dollars, so a three-quarter-hour call costs 90 — the same as a fortnight of the 45-dollar rate on the phone.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Comparing a rate with a salary.</strong> Forty-five an hour is 93 600 a year only if the weeks are all worked. A freelancer with holidays, admin and no work in January is nearer 70 per cent of that.</li><li><strong>Charging in hours when the work is in minutes.</strong> A fifteen-minute consultation billed as an hour is a discount nobody records, and a hundred of them is two weeks of unpaid time.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No overhead.</strong> The rate covers the person, not the office, the software or the time spent finding the next client.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need hourly rate and time to cost. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Cost per minute and cost per second and cost of the time and working year at 40 h a week should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Costing a meeting before agreeing to it.</li></li><li><li>Working out whether a small job is worth taking.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/meeting-cost">Meeting cost</a> <a href="/everyday-life/every-second">Every second</a> <a href="/everyday-life/30-min">30-minute blocks</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Hourly rate</strong> ×10</td><td>0.75</td><td>7.5</td><td>ten times larger</td></tr><tr><td><strong>Time to cost</strong> ×10</td><td>0.75</td><td>0.75</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cost per Minute calculator work out?', 'a' => <<<'TXT'
            It returns cost per minute and cost per second and cost of the time and working year at 40 h a week from hourly rate and time to cost. The relationship is Hourly rate ÷ 60.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Hourly rate ($/h), Time to cost (min). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: hourly rate in $/h; time to cost in min. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why divide by 3 600 for a second?', 'a' => 'Because an hour has 3 600 seconds. It is a unit that only matters when something is billed per second — cloud computing, advertising, phone lines.'],
            ['q' => 'Is a minute the right unit for a meeting?', 'a' => 'For a meeting that overruns, yes. The overrun is where the cost appears, and ten minutes at four people\'s rates is where the money goes.'],
            ['q' => 'Does the yearly figure include holiday?', 'a' => 'No. It is fifty-two forty-hour weeks, which nobody works. Multiply by 46 weeks for a realistic figure with holidays and sick days.'],
        ],
        'related' => [
            ['path' => '/everyday-life/meeting-cost', 'name' => 'Meeting cost'],
            ['path' => '/everyday-life/every-second', 'name' => 'Every second'],
            ['path' => '/everyday-life/30-min', 'name' => '30-minute blocks'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
