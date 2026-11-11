<?php

/**
 * RPM Calculator
 * /everyday-life/rpm
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'RPM Calculator',
    'meta' => ['title' => 'RPM Calculator — Road Speed to Engine Speed', 'description' => 'Road speed, tyre diameter and gearing turned into engine rpm, with wheel rpm and the speed a given rpm reaches — the three numbers a gearing change is judged.', 'h1' => 'RPM Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'speed',
                    'label' => 'Road speed',
                    'type' => 'number',
                    'suffix' => 'mph',
                    'default' => '60',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'tire',
                    'label' => 'Tyre diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '26',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gear',
                    'label' => 'Gearbox ratio',
                    'type' => 'number',
                    'suffix' => 'x',
                    'default' => '1',
                    'help' => 'First is 3 to 4, fourth or fifth is usually 1.0, and an overdrive is below 1.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'axle',
                    'label' => 'Final drive ratio',
                    'type' => 'number',
                    'suffix' => 'x',
                    'default' => '3.55',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'target',
                    'label' => 'Rpm to check',
                    'type' => 'number',
                    'suffix' => 'rpm',
                    'default' => '6000',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rpm',
                    'label' => 'Engine speed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'rpm',
                ],
                [
                    'name' => 'wheel',
                    'label' => 'Wheel speed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'rpm',
                ],
                [
                    'name' => 'speed_at',
                    'label' => 'Speed at that rpm',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mph',
                ],
            ],
        ],
    ],
    'formula' => ['rpm' => 'speed * gear * axle * 336 / tire', 'wheel' => 'speed * 336 / tire', 'speed_at' => 'target * tire / (gear * axle * 336)'],
    'article' => [
        'intro' => 'The engine speed a car turns at a given road speed, the wheel speed underneath it, and the road speed a chosen rpm produces in the same gear.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A wheel of a known diameter covers a known distance per turn, so road speed is a wheel speed and engine speed is that multiplied by the gearing. The constant 336 is what remains after converting miles an hour into revolutions a minute.</p><p>Sixty miles an hour on 26-inch tyres with a 3.55 axle in direct gear is 2 753 rpm, and the wheels are turning at 775. Change the axle to 4.10 and the same road speed is 3 179 rpm — a quarter more noise for a quarter more pull.</p><p>The answer is <strong>engine speed and wheel speed and speed at that rpm</strong>, worked out from road speed and tyre diameter and gearbox ratio and final drive ratio and rpm to check. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>rpm</strong></td><td><code>Road speed × Gearbox ratio × Final drive ratio × 336 ÷ Tyre diameter</code></td></tr><tr><td><strong>wheel</strong></td><td><code>Road speed × 336 ÷ Tyre diameter</code></td></tr><tr><td><strong>speed_at</strong></td><td><code>Rpm to check × Tyre diameter ÷ (Gearbox ratio × Final drive ratio × 336)</code></td></tr></tbody></table><p>Speed times the gearbox ratio times the axle ratio times 336, divided by the tyre diameter. Wheel speed leaves the gearing out, and the speed at a target rpm is the same relation solved the other way.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill. It reports engine speed and wheel speed and speed at that rpm.</p><ul><li><strong>Road speed</strong> — mph.</li><li><strong>Tyre diameter</strong> — in.</li><li><strong>Gearbox ratio</strong> — x. First is 3 to 4, fourth or fifth is usually 1.0, and an overdrive is below 1.</li><li><strong>Final drive ratio</strong> — x.</li><li><strong>Rpm to check</strong> — rpm.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Engine speed</strong> — rpm.</li><li><strong>Wheel speed</strong> — rpm.</li><li><strong>Speed at that rpm</strong> — mph.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put road speed = 60 mph, tyre diameter = 26 in, gearbox ratio = 1 x, final drive ratio = 3.55 x, rpm to check = 6 000 rpm into the form and the panel reads:</p><ul><li><strong>Engine speed</strong> = <code>Road speed × Gearbox ratio × Final drive ratio × 336 ÷ Tyre diameter</code> = <strong>2 752.615 rpm</strong></li><li><strong>Wheel speed</strong> = <code>Road speed × 336 ÷ Tyre diameter</code> = <strong>775.385 rpm</strong></li><li><strong>Speed at that rpm</strong> = <code>Rpm to check × Tyre diameter ÷ (Gearbox ratio × Final drive ratio × 336)</code> = <strong>130.785 mph</strong></li></ul><p>The diameter matters more than people expect: a 24-inch tyre at the same speed is 2 982 rpm, which is most of a gear change's worth of revs.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>60 × 1 × 3.55 × 336 ÷ 26</code>, which comes to <strong>2 752.615 rpm</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>60 mph on a 26-inch tyre with a 3.55 axle is 2 753 rpm and 775 at the wheels. At 6 000 rpm the same car is doing 131 mph in that gear.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Engine speed</th><th>Wheel speed</th><th>Speed at that rpm</th></tr></thead><tbody><tr><td><strong>Road speed</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Tyre diameter</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Gearbox ratio</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>−9.09 %</td></tr><tr><td><strong>Final drive ratio</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>−9.09 %</td></tr><tr><td><strong>Rpm to check</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Rpm to check</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Road speed</strong> opens at 60 mph</li><li><strong>Tyre diameter</strong> opens at 26 in</li><li><strong>Gearbox ratio</strong> opens at 1 x — First is 3 to 4, fourth or fifth is usually 1.0, and an overdrive is below 1.</li><li><strong>Final drive ratio</strong> opens at 3.55 x</li><li><strong>Rpm to check</strong> opens at 6 000 rpm</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Road speed</th><th>Engine speed</th><th>Wheel speed</th><th>Speed at that rpm</th></tr></thead><tbody><tr><td>30 mph</td><td>1 376.308</td><td>387.692</td><td>130.785</td></tr><tr><td>60 mph</td><td>2 752.615</td><td>775.385</td><td>130.785</td></tr><tr><td>120 mph</td><td>5 505.231</td><td>1 550.769</td><td>130.785</td></tr><tr><td>300 mph</td><td>13 763.077</td><td>3 876.923</td><td>130.785</td></tr><tr><td>600 mph</td><td>27 526.154</td><td>7 753.846</td><td>130.785</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set road speed = 60, tyre diameter = 26, gearbox ratio = 1, final drive ratio = 4.1, rpm to check = 6 000: <strong>Engine speed</strong> = 3 179.077 rpm, <strong>Wheel speed</strong> = 775.385 rpm, <strong>Speed at that rpm</strong> = 113.24 mph. A 4.10 axle at 60 mph is 3 179 rpm and 6 000 rpm arrives at 113 mph — quicker off the line and louder on the motorway.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using the nominal tyre size.</strong> A 225/45 R17 is 24.97 inches new and smaller worn, and the rpm rises as the tread goes. Use the measured diameter.</li><li><strong>Forgetting the converter.</strong> An automatic with a slipping converter turns more rpm than the gearing says at low speed. The formula is exact only when the converter is locked.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One gear, one axle.</strong> A car with a lock-up converter and a slipping clutch is outside the arithmetic at the ends of the range.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need road speed and tyre diameter and gearbox ratio and final drive ratio and rpm to check. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Engine speed and wheel speed and speed at that rpm should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Working out the revs at cruising speed before a gear change.</li></li><li><li>Checking whether a tyre size change will make the engine drone.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/tire-size">Tyre size</a> <a href="/everyday-life/speedometer-gear">Speedometer gear</a> <a href="/everyday-life/mpg">MPG calculator</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Road speed</strong> ×10</td><td>2 752.615</td><td>27 526.154</td><td>ten times larger</td></tr><tr><td><strong>Tyre diameter</strong> ×10</td><td>2 752.615</td><td>275.262</td><td>ten times smaller</td></tr><tr><td><strong>Gearbox ratio</strong> ×10</td><td>2 752.615</td><td>27 526.154</td><td>ten times larger</td></tr><tr><td><strong>Final drive ratio</strong> ×10</td><td>2 752.615</td><td>27 526.154</td><td>ten times larger</td></tr><tr><td><strong>Rpm to check</strong> ×10</td><td>2 752.615</td><td>2 752.615</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the RPM calculator work out?', 'a' => <<<'TXT'
            It returns engine speed and wheel speed and speed at that rpm from road speed and tyre diameter and gearbox ratio and final drive ratio and rpm to check. The relationship is Road speed × Gearbox ratio × Final drive ratio × 336 ÷ Tyre diameter.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Road speed (mph), Tyre diameter (in), Gearbox ratio (x), Final drive ratio (x), Rpm to check (rpm). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: road speed in mph; tyre diameter in in; gearbox ratio in x; final drive ratio in x; rpm to check in rpm. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Where does 336 come from?', 'a' => 'It converts miles an hour and inches into revolutions a minute: 60 minutes, 5 280 feet and 12 inches, divided by pi, give 336 to three figures.'],
            ['q' => 'Why is wheel speed useful?', 'a' => 'Because it tells you what the brakes and bearings are doing, and it is the figure a dyno measures at the rollers before the gearing.'],
            ['q' => 'Does tyre wear change the answer?', 'a' => <<<'TXT'
            A tyre worn from 8 mm to 2 mm of tread loses about 12 mm of diameter, which is half a per cent of the rpm. Small, and larger than most people's speedometer error.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/tire-size', 'name' => 'Tyre size'],
            ['path' => '/everyday-life/speedometer-gear', 'name' => 'Speedometer gear'],
            ['path' => '/everyday-life/mpg', 'name' => 'MPG calculator'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
