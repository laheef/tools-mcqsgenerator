<?php

/**
 * Tire Size Calculator
 * /everyday-life/tire-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tire Size Calculator',
    'meta' => ['title' => 'Tire Size — Sidewall, Diameter and Revs per Mile', 'description' => 'A 225/45 R17 read out loud: sidewall height, overall diameter, circumference and the revolutions a mile, which is what the speedometer is calibrated against.', 'h1' => 'Tire Size Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'width',
                    'label' => 'Section width',
                    'type' => 'number',
                    'suffix' => 'mm',
                    'default' => '225',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'aspect',
                    'label' => 'Aspect ratio',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '45',
                    'help' => 'The sidewall as a percentage of the width, not a millimetre figure. 45 means 45 per cent of 225 mm.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rim',
                    'label' => 'Rim diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '17',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sidewall_mm',
                    'label' => 'Sidewall height',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mm',
                ],
                [
                    'name' => 'sidewall_in',
                    'label' => 'Sidewall height',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'diameter',
                    'label' => 'Overall diameter',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'circumference',
                    'label' => 'Circumference',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'revs_mile',
                    'label' => 'Revolutions per mile',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'rev/mi',
                ],
            ],
        ],
    ],
    'formula' => [
        'sidewall_mm' => 'width * aspect / 100',
        'sidewall_in' => 'width * aspect / 100 / 25.4',
        'diameter' => 'rim + 2 * width * aspect / 100 / 25.4',
        'circumference' => 'pi * (rim + 2 * width * aspect / 100 / 25.4)',
        'revs_mile' => '63360 / (pi * (rim + 2 * width * aspect / 100 / 25.4))',
    ],
    'article' => [
        'intro' => 'What the numbers on a tyre sidewall mean in inches: section width, sidewall height, overall diameter, circumference and revolutions per mile.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>225/45 R17 is three measurements in one line. 225 millimetres is the width across the tread, 45 is the sidewall as a percentage of that width, and 17 inches is the rim. Nothing on the tyre says how tall the whole wheel is, and that is the number that changes your speedometer.</p><p>45 per cent of 225 is 101 millimetres, about four inches. Two sidewalls plus a 17-inch rim is 24.97 inches tall, and the tyre turns 808 times a mile. Fit a different overall diameter and the car thinks it is going faster or slower than it is.</p><p>The answer is <strong>sidewall height and sidewall height and overall diameter and circumference and revolutions per mile</strong>, worked out from section width and aspect ratio and rim diameter. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>sidewall_mm</strong></td><td><code>Section width × Aspect ratio ÷ 100</code></td></tr><tr><td><strong>sidewall_in</strong></td><td><code>Section width × Aspect ratio ÷ 100 ÷ 25.4</code></td></tr><tr><td><strong>diameter</strong></td><td><code>Rim diameter + 2 × Section width × Aspect ratio ÷ 100 ÷ 25.4</code></td></tr><tr><td><strong>circumference</strong></td><td><code>pi × (Rim diameter + 2 × Section width × Aspect ratio ÷ 100 ÷ 25.4)</code></td></tr><tr><td><strong>revs_mile</strong></td><td><code>63360 ÷ (pi × (Rim diameter + 2 × Section width × Aspect ratio ÷ 100 ÷ 25.4))</code></td></tr></tbody></table><p>Width times the aspect percentage gives the sidewall in millimetres, divided by 25.4 for inches. Diameter is the rim plus two sidewalls; circumference is pi times that, and revs per mile is 63 360 inches over the circumference.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports sidewall height and sidewall height and overall diameter and circumference and revolutions per mile.</p><ul><li><strong>Section width</strong> — mm.</li><li><strong>Aspect ratio</strong> — %. The sidewall as a percentage of the width, not a millimetre figure. 45 means 45 per cent of 225 mm.</li><li><strong>Rim diameter</strong> — in.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Sidewall height</strong> — mm.</li><li><strong>Sidewall height</strong> — in.</li><li><strong>Overall diameter</strong> — in.</li><li><strong>Circumference</strong> — in.</li><li><strong>Revolutions per mile</strong> — rev/mi.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put section width = 225 mm, aspect ratio = 45 %, rim diameter = 17 in into the form and the panel reads:</p><ul><li><strong>Sidewall height</strong> = <code>Section width × Aspect ratio ÷ 100</code> = <strong>101.25 mm</strong></li><li><strong>Sidewall height</strong> = <code>Section width × Aspect ratio ÷ 100 ÷ 25.4</code> = <strong>3.986 in</strong></li><li><strong>Overall diameter</strong> = <code>Rim diameter + 2 × Section width × Aspect ratio ÷ 100 ÷ 25.4</code> = <strong>24.972 in</strong></li><li><strong>Circumference</strong> = <code>pi × (Rim diameter + 2 × Section width × Aspect ratio ÷ 100 ÷ 25.4)</code> = <strong>78.453 in</strong></li><li><strong>Revolutions per mile</strong> = <code>63360 ÷ (pi × (Rim diameter + 2 × Section width × Aspect ratio ÷ 100 ÷ 25.4))</code> = <strong>807.615 rev/mi</strong></li></ul><p>A 225/50 R17 is 25.86 inches tall, which is nearly four per cent more than the 45 — and four per cent is the difference between an accurate speedometer and one that reads four miles an hour slow at seventy.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>225 × 45 ÷ 100</code>, which comes to <strong>101.25 mm</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>225/45 R17 has a 101.25 mm sidewall, 3.99 inches. The wheel is 24.97 inches across, 78.45 inches round, and turns 807.6 times a mile.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Sidewall height</th><th>Sidewall height</th><th>Overall diameter</th><th>Circumference</th><th>Revolutions per mile</th></tr></thead><tbody><tr><td><strong>Section width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+3.19 %</td><td>+3.19 %</td><td>−3.09 %</td></tr><tr><td><strong>Aspect ratio</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+3.19 %</td><td>+3.19 %</td><td>−3.09 %</td></tr><tr><td><strong>Rim diameter</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+6.81 %</td><td>+6.81 %</td><td>−6.37 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Section width</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Section width</strong> opens at 225 mm</li><li><strong>Aspect ratio</strong> opens at 45 % — The sidewall as a percentage of the width, not a millimetre figure. 45 means 45 per cent of 225 mm.</li><li><strong>Rim diameter</strong> opens at 17 in</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Section width</th><th>Sidewall height</th><th>Sidewall height</th><th>Overall diameter</th><th>Circumference</th><th>Revolutions per mile</th></tr></thead><tbody><tr><td>112.5 mm</td><td>50.625</td><td>1.993</td><td>20.986</td><td>65.93</td><td>961.017</td></tr><tr><td>225 mm</td><td>101.25</td><td>3.986</td><td>24.972</td><td>78.453</td><td>807.615</td></tr><tr><td>450 mm</td><td>202.5</td><td>7.972</td><td>32.945</td><td>103.499</td><td>612.177</td></tr><tr><td>1 125 mm</td><td>506.25</td><td>19.931</td><td>56.862</td><td>178.638</td><td>354.684</td></tr><tr><td>2 250 mm</td><td>1 012.5</td><td>39.862</td><td>96.724</td><td>303.869</td><td>208.511</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set section width = 225, aspect ratio = 50, rim diameter = 17: <strong>Sidewall height</strong> = 112.5 mm, <strong>Sidewall height</strong> = 4.429 in, <strong>Overall diameter</strong> = 25.858 in, <strong>Circumference</strong> = 81.236 in, <strong>Revolutions per mile</strong> = 779.948 rev/mi. 225/50 R17 is 25.86 inches across, 3.6 per cent larger in diameter than the 45 profile, and turns 779.9 times a mile rather than 807.6.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Reading the aspect as millimetres.</strong> 45 is a percentage. A 45 on a 225 tyre is 101 mm and a 45 on a 275 tyre is 124 mm, and both are called 45.</li><li><strong>Changing width without changing aspect.</strong> Going to 245/45 keeps the label similar and makes the wheel an inch taller, which costs acceleration and puts the odometer out.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Nominal sizes.</strong> Real tyres vary by a few millimetres between brands, and a worn tyre is smaller than a new one of the same size.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need section width and aspect ratio and rim diameter. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Sidewall height and sidewall height and overall diameter and circumference and revolutions per mile should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking whether a plus-one wheel change keeps the overall diameter.</li></li><li><li>Working out why the speedometer reads high after a tyre change.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/wheel-offset">Wheel offset</a> <a href="/everyday-life/mpg">MPG calculator</a> <a href="/everyday-life/horsepower">Horsepower</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Section width</strong> ×10</td><td>101.25</td><td>1 012.5</td><td>ten times larger</td></tr><tr><td><strong>Aspect ratio</strong> ×10</td><td>101.25</td><td>1 012.5</td><td>ten times larger</td></tr><tr><td><strong>Rim diameter</strong> ×10</td><td>101.25</td><td>101.25</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tire Size calculator work out?', 'a' => <<<'TXT'
            It returns sidewall height and sidewall height and overall diameter and circumference and revolutions per mile from section width and aspect ratio and rim diameter. The relationship is Section width × Aspect ratio ÷ 100.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Section width (mm), Aspect ratio (%), Rim diameter (in). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: section width in mm; aspect ratio in %; rim diameter in in. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What does the R in 225/45 R17 mean?', 'a' => 'Radial construction. Almost every car tyre sold today is radial, and the letter has been on the sidewall since the 1970s as a leftover.'],
            ['q' => 'How much can the overall diameter change?', 'a' => <<<'TXT'
            Within three per cent is the usual rule for keeping the speedometer and the electronics happy. Above that, ABS and gearbox sensors start to disagree with the wheels.
            TXT],
            ['q' => 'Why does revs per mile matter?', 'a' => 'The odometer counts revolutions, so a tyre with the wrong circumference makes every mile on the dash the wrong length — and resale value follows the odometer.'],
        ],
        'related' => [
            ['path' => '/everyday-life/wheel-offset', 'name' => 'Wheel offset'],
            ['path' => '/everyday-life/mpg', 'name' => 'MPG calculator'],
            ['path' => '/everyday-life/horsepower', 'name' => 'Horsepower'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
