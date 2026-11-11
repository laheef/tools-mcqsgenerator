<?php

/**
 * Horsepower Calculator
 * /everyday-life/horsepower
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Horsepower Calculator',
    'meta' => ['title' => 'Horsepower — Torque Times RPM over 5,252 — Free Tool', 'description' => 'Torque at a given engine speed gives horsepower and kilowatts, with the same torque in newton metres and the power per litre that makes engines comparable.', 'h1' => 'Horsepower Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'torque',
                    'label' => 'Torque',
                    'type' => 'number',
                    'suffix' => 'lb-ft',
                    'default' => '300',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rpm',
                    'label' => 'Engine speed',
                    'type' => 'number',
                    'suffix' => 'rpm',
                    'default' => '4000',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'displacement',
                    'label' => 'Engine size',
                    'type' => 'number',
                    'suffix' => 'L',
                    'default' => '2',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hp',
                    'label' => 'Horsepower',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'hp',
                ],
                [
                    'name' => 'kw',
                    'label' => 'Power',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kW',
                ],
                [
                    'name' => 'torque_nm',
                    'label' => 'Torque',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'Nm',
                ],
                [
                    'name' => 'hp_litre',
                    'label' => 'Power per litre',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'hp/L',
                ],
            ],
        ],
    ],
    'formula' => ['hp' => 'torque * rpm / 5252', 'kw' => 'torque * rpm / 5252 * 0.7457', 'torque_nm' => 'torque * 1.35582', 'hp_litre' => 'torque * rpm / 5252 / displacement'],
    'article' => [
        'intro' => 'Horsepower from torque and rpm, the same figure in kilowatts, the torque converted to newton metres, and the power per litre that makes engines comparable.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Horsepower is torque doing work at a speed, and the constant is 5 252 because one horsepower is 550 foot-pounds a second and a revolution is 2π radians. Three hundred pound-feet at 4 000 rpm is 228 horsepower.</p><p>That is why a diesel and a petrol engine with the same torque make different power: the diesel peaks at 2 000 rpm, the petrol at 5 000, and the same torque at more than twice the speed is more than twice the power.</p><p>The answer is <strong>horsepower and power and torque and power per litre</strong>, worked out from torque and engine speed and engine size. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>hp</strong></td><td><code>Torque × Engine speed ÷ 5252</code></td></tr><tr><td><strong>kw</strong></td><td><code>Torque × Engine speed ÷ 5252 × 0.7457</code></td></tr><tr><td><strong>torque_nm</strong></td><td><code>Torque × 1.35582</code></td></tr><tr><td><strong>hp_litre</strong></td><td><code>Torque × Engine speed ÷ 5252 ÷ Engine size</code></td></tr></tbody></table><p>Torque times rpm over 5 252 gives horsepower; times 0.7457 gives kilowatts. Newton metres are pound-feet times 1.35582, and specific output is the power divided by the displacement, which is how a 2-litre and a 5-litre engine can be compared at all.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports horsepower and power and torque and power per litre.</p><ul><li><strong>Torque</strong> — lb-ft.</li><li><strong>Engine speed</strong> — rpm.</li><li><strong>Engine size</strong> — L.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Horsepower</strong> — hp.</li><li><strong>Power</strong> — kW.</li><li><strong>Torque</strong> — Nm.</li><li><strong>Power per litre</strong> — hp/L.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put torque = 300 lb-ft, engine speed = 4 000 rpm, engine size = 2 L into the form and the panel reads:</p><ul><li><strong>Horsepower</strong> = <code>Torque × Engine speed ÷ 5252</code> = <strong>228.484 hp</strong></li><li><strong>Power</strong> = <code>Torque × Engine speed ÷ 5252 × 0.7457</code> = <strong>170.381 kW</strong></li><li><strong>Torque</strong> = <code>Torque × 1.35582</code> = <strong>406.746 Nm</strong></li><li><strong>Power per litre</strong> = <code>Torque × Engine speed ÷ 5252 ÷ Engine size</code> = <strong>114.242 hp/L</strong></li></ul><p>The same torque at 2 000 rpm is 114 hp. Nothing about the engine changed except the speed at which the figure is read.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>300 × 4 000 ÷ 5252</code>, which comes to <strong>228.484 hp</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>300 lb-ft at 4 000 rpm is 228.5 hp, 170.4 kW and 406.7 Nm, which in a two-litre engine is 114 hp per litre — a modern turbo four.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Horsepower</th><th>Power</th><th>Torque</th><th>Power per litre</th></tr></thead><tbody><tr><td><strong>Torque</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Engine speed</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Engine size</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Torque</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Torque</strong> opens at 300 lb-ft</li><li><strong>Engine speed</strong> opens at 4 000 rpm</li><li><strong>Engine size</strong> opens at 2 L</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Torque</th><th>Horsepower</th><th>Power</th><th>Torque</th><th>Power per litre</th></tr></thead><tbody><tr><td>150 lb-ft</td><td>114.242</td><td>85.19</td><td>203.373</td><td>57.121</td></tr><tr><td>300 lb-ft</td><td>228.484</td><td>170.381</td><td>406.746</td><td>114.242</td></tr><tr><td>600 lb-ft</td><td>456.969</td><td>340.762</td><td>813.492</td><td>228.484</td></tr><tr><td>1 500 lb-ft</td><td>1 142.422</td><td>851.904</td><td>2 033.73</td><td>571.211</td></tr><tr><td>3 000 lb-ft</td><td>2 284.844</td><td>1 703.808</td><td>4 067.46</td><td>1 142.422</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set torque = 300, engine speed = 2 000, engine size = 2: <strong>Horsepower</strong> = 114.242 hp, <strong>Power</strong> = 85.19 kW, <strong>Torque</strong> = 406.746 Nm, <strong>Power per litre</strong> = 57.121 hp/L. At 2 000 rpm the same torque is 114.2 hp and 85.2 kW: torque is a force, power is a rate, and only the second one depends on speed.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Quoting peak torque as if it were constant.</strong> An engine makes that figure over a band of a few hundred rpm. Horsepower at the redline is lower because torque has fallen away.</li><li><strong>Converting with 5 252 rounded.</strong> The exact constant is 5 252.11, which matters only at the fourth digit. Below that, the engine's own tolerances are wider.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Crank figures.</strong> Manufacturer numbers are at the flywheel. A rolling road measures at the wheels, and the loss through the drivetrain is ten to twenty per cent.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need torque and engine speed and engine size. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Horsepower and power and torque and power per litre should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking a dyno sheet's arithmetic.</li></li><li><li>Comparing two engines of different size on power per litre.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/0-60">0 to 60 time</a> <a href="/everyday-life/gvwr">GVWR</a> <a href="/everyday-life/tire-size">Tyre size</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Torque</strong> ×10</td><td>228.484</td><td>2 284.844</td><td>ten times larger</td></tr><tr><td><strong>Engine speed</strong> ×10</td><td>228.484</td><td>2 284.844</td><td>ten times larger</td></tr><tr><td><strong>Engine size</strong> ×10</td><td>228.484</td><td>228.484</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Horsepower calculator work out?', 'a' => 'It returns horsepower and power and torque and power per litre from torque and engine speed and engine size. The relationship is Torque × Engine speed ÷ 5252.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Torque (lb-ft), Engine speed (rpm), Engine size (L). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: torque in lb-ft; engine speed in rpm; engine size in L. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why is horsepower torque times rpm divided by 5 252?', 'a' => <<<'TXT'
            Because power is torque times angular speed, and the units — pound-feet, revolutions a minute, 550 foot-pounds a second — work out to that constant when you convert.
            TXT],
            ['q' => 'Which matters more, torque or power?', 'a' => 'Torque is what you feel pulling away; power is what keeps you accelerating. A heavy car with little power but a lot of low torque feels strong and is slow.'],
            ['q' => 'Is hp per litre a fair comparison?', 'a' => 'Between engines of the same era and fuel, yes. Between a 1970 V8 and a modern turbo four it flatters the modern engine, which is the point of quoting it.'],
        ],
        'related' => [
            ['path' => '/everyday-life/0-60', 'name' => '0 to 60 time'],
            ['path' => '/everyday-life/gvwr', 'name' => 'GVWR'],
            ['path' => '/everyday-life/tire-size', 'name' => 'Tyre size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
