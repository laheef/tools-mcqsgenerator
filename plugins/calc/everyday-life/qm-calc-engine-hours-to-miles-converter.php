<?php

/**
 * Engine Hours to Miles Converter
 * /everyday-life/engine-hours-to-miles-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Engine Hours to Miles Converter',
    'meta' => ['title' => 'Engine Hours to Miles — Wear the Odometer Missed', 'description' => 'Hours on the engine clock, an average road speed and the share spent idling give the miles those hours are worth — the figure an odometer never shows.', 'h1' => 'Engine Hours to Miles Converter', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'hours',
                    'label' => 'Engine hours',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '5000',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'speed',
                    'label' => 'Average speed when moving',
                    'type' => 'number',
                    'suffix' => 'mph',
                    'default' => '35',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'idle_share',
                    'label' => 'Share of hours idling',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '20',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'drive_hours',
                    'label' => 'Hours actually moving',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'idle_hours',
                    'label' => 'Hours idling',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'miles',
                    'label' => 'Equivalent miles',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mi',
                ],
                [
                    'name' => 'years',
                    'label' => 'At 12 000 miles a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
            ],
        ],
    ],
    'formula' => ['drive_hours' => 'hours * (1 - idle_share / 100)', 'idle_hours' => 'hours * idle_share / 100', 'miles' => 'hours * (1 - idle_share / 100) * speed', 'years' => 'hours * (1 - idle_share / 100) * speed / 12000'],
    'article' => [
        'intro' => <<<'TXT'
        How many miles of ordinary driving a number of engine hours represents, allowing for the time spent idling, so a machine's condition can be read against its clock.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>An engine hour meter counts time, not distance, and a machine that idles for half its life has run far more hours than its mileage suggests. Five thousand hours at 35 mph with a fifth of them spent idling is 140 000 miles.</p><p>That is the number to compare a used van or a tractor against. The odometer says 60 000; the hour meter says the engine has done the work of 140 000, and the price should reflect the second figure.</p><p>The answer is <strong>hours actually moving and hours idling and equivalent miles and at 12 000 miles a year</strong>, worked out from engine hours and average speed when moving and share of hours idling. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>drive_hours</strong></td><td><code>Engine hours × (1 - Share of hours idling ÷ 100)</code></td></tr><tr><td><strong>idle_hours</strong></td><td><code>Engine hours × Share of hours idling ÷ 100</code></td></tr><tr><td><strong>miles</strong></td><td><code>Engine hours × (1 - Share of hours idling ÷ 100) × Average speed when moving</code></td></tr><tr><td><strong>years</strong></td><td><code>Engine hours × (1 - Share of hours idling ÷ 100) × Average speed when moving ÷ 12000</code></td></tr></tbody></table><p>The moving share is the hours less the idle share, and miles are those hours times the average road speed. The year figure divides by 12 000, an ordinary annual distance, to put the total on a familiar scale.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports hours actually moving and hours idling and equivalent miles and at 12 000 miles a year.</p><ul><li><strong>Engine hours</strong> — h.</li><li><strong>Average speed when moving</strong> — mph.</li><li><strong>Share of hours idling</strong> — %.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Hours actually moving</strong> — h.</li><li><strong>Hours idling</strong> — h.</li><li><strong>Equivalent miles</strong> — mi.</li><li><strong>At 12 000 miles a year</strong> — years.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put engine hours = 5 000 h, average speed when moving = 35 mph, share of hours idling = 20 % into the form and the panel reads:</p><ul><li><strong>Hours actually moving</strong> = <code>Engine hours × (1 - Share of hours idling ÷ 100)</code> = <strong>4 000 h</strong></li><li><strong>Hours idling</strong> = <code>Engine hours × Share of hours idling ÷ 100</code> = <strong>1 000 h</strong></li><li><strong>Equivalent miles</strong> = <code>Engine hours × (1 - Share of hours idling ÷ 100) × Average speed when moving</code> = <strong>140 000 mi</strong></li><li><strong>At 12 000 miles a year</strong> = <code>Engine hours × (1 - Share of hours idling ÷ 100) × Average speed when moving ÷ 12000</code> = <strong>11.667 years</strong></li></ul><p>Zero idling gives 175 000 miles for the same clock, which shows how much of the answer depends on one estimate nobody records.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>5 000 × (1 - 20 ÷ 100)</code>, which comes to <strong>4 000 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>5 000 hours with 20 per cent idling is 4 000 hours moving at 35 mph, which is 140 000 miles — nearly twelve years of ordinary driving.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Hours actually moving</th><th>Hours idling</th><th>Equivalent miles</th><th>At 12 000 miles a year</th></tr></thead><tbody><tr><td><strong>Engine hours</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Average speed when moving</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Share of hours idling</strong> +10 %</td><td>−2.5 %</td><td>+10 %</td><td>−2.5 %</td><td>−2.5 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Engine hours</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Engine hours</strong> opens at 5 000 h</li><li><strong>Average speed when moving</strong> opens at 35 mph</li><li><strong>Share of hours idling</strong> opens at 20 %</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Engine hours</th><th>Hours actually moving</th><th>Hours idling</th><th>Equivalent miles</th><th>At 12 000 miles a year</th></tr></thead><tbody><tr><td>2 500 h</td><td>2 000</td><td>500</td><td>70 000</td><td>5.833</td></tr><tr><td>5 000 h</td><td>4 000</td><td>1 000</td><td>140 000</td><td>11.667</td></tr><tr><td>10 000 h</td><td>8 000</td><td>2 000</td><td>280 000</td><td>23.333</td></tr><tr><td>25 000 h</td><td>20 000</td><td>5 000</td><td>700 000</td><td>58.333</td></tr><tr><td>50 000 h</td><td>40 000</td><td>10 000</td><td>1.4 × 10<sup>6</sup></td><td>116.667</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set engine hours = 5 000, average speed when moving = 35, share of hours idling = 40: <strong>Hours actually moving</strong> = 3 000 h, <strong>Hours idling</strong> = 2 000 h, <strong>Equivalent miles</strong> = 105 000 mi, <strong>At 12 000 miles a year</strong> = 8.75 years. At 40 per cent idling the same clock is 105 000 miles: the machine has done less road work and more of its wearing out standing still.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Treating hours as miles at a fixed rate.</strong> Fifty miles an hour is a rule that suits a lorry and not a loader. Use the speed the machine actually averages.</li><li><strong>Ignoring the idle share on plant.</strong> Excavators and generators idle for most of their hours. Assuming a road average for them overstates the mileage by a factor of two or three.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One average speed.</strong> A machine that does motorway miles and yard work needs two runs of this page rather than one average.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need engine hours and average speed when moving and share of hours idling. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Hours actually moving and hours idling and equivalent miles and at 12 000 miles a year should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Reading a used van's hour meter against its odometer.</li></li><li><li>Comparing a generator's hours with a car's mileage for a service interval.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/idling-fuel-consumption">Idling fuel use</a> <a href="/everyday-life/mpg">MPG calculator</a> <a href="/everyday-life/cost-per-mile">Cost per mile</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Engine hours</strong> ×10</td><td>4 000</td><td>40 000</td><td>ten times larger</td></tr><tr><td><strong>Average speed when moving</strong> ×10</td><td>4 000</td><td>4 000</td><td>unchanged</td></tr><tr><td><strong>Share of hours idling</strong> ×10</td><td>4 000</td><td>-5 000</td><td>×-1.25</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Engine Hours to Miles Converter calculator work out?', 'a' => <<<'TXT'
            It returns hours actually moving and hours idling and equivalent miles and at 12 000 miles a year from engine hours and average speed when moving and share of hours idling. The relationship is Engine hours × (1 - Share of hours idling ÷ 100).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Engine hours (h), Average speed when moving (mph), Share of hours idling (%). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: engine hours in h; average speed when moving in mph; share of hours idling in %. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Is there a standard hours-to-miles figure?', 'a' => 'Rules of thumb run from 27 to 60 miles an hour depending on the vehicle class. None of them is a measurement, and the average speed field is the honest version.'],
            ['q' => 'Does idling wear an engine like driving?', 'a' => 'It accumulates hours on the oil and the bearings without cooling or loading the engine properly. Many fleets service on hours for exactly that reason.'],
            ['q' => 'Why do generators have hour meters?', 'a' => 'Because they never move and an odometer would be zero forever. The hour meter is the only record of use, and the service interval is set from it.'],
        ],
        'related' => [
            ['path' => '/everyday-life/idling-fuel-consumption', 'name' => 'Idling fuel use'],
            ['path' => '/everyday-life/mpg', 'name' => 'MPG calculator'],
            ['path' => '/everyday-life/cost-per-mile', 'name' => 'Cost per mile'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
