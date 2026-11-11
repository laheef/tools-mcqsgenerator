<?php

/**
 * Turbo Size Calculator
 * /everyday-life/turbo-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Turbo Size Calculator',
    'meta' => ['title' => 'Turbo Size — Airflow from Displacement and Boost', 'description' => 'Displacement, rpm, volumetric efficiency and boost give the airflow a turbo has to supply, in cubic feet a minute and pounds a minute, and the pressure ratio.', 'h1' => 'Turbo Size Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'cid',
                    'label' => 'Displacement',
                    'type' => 'number',
                    'suffix' => 'cu in',
                    'default' => '122',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rpm',
                    'label' => 'Engine speed',
                    'type' => 'number',
                    'suffix' => 'rpm',
                    'default' => '6000',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 've',
                    'label' => 'Volumetric efficiency',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '90',
                    'help' => 'Ninety per cent is a modern four-valve head at peak power; 80 is an older two-valve and 100 is a race engine.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'boost',
                    'label' => 'Boost',
                    'type' => 'number',
                    'suffix' => 'psi',
                    'default' => '7.35',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pr',
                    'label' => 'Pressure ratio',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ratio',
                ],
                [
                    'name' => 'cfm',
                    'label' => 'Airflow',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cfm',
                ],
                [
                    'name' => 'lbs',
                    'label' => 'Airflow',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb/min',
                ],
                [
                    'name' => 'na_cfm',
                    'label' => 'Airflow without boost',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cfm',
                ],
            ],
        ],
    ],
    'formula' => ['pr' => '(boost + 14.7) / 14.7', 'cfm' => 'cid * rpm / 2 * (ve / 100) / 1728 * (boost + 14.7) / 14.7', 'lbs' => 'cid * rpm / 2 * (ve / 100) / 1728 * (boost + 14.7) / 14.7 * 0.076', 'na_cfm' => 'cid * rpm / 2 * (ve / 100) / 1728'],
    'article' => [
        'intro' => 'The airflow an engine needs at a given speed and boost, the pressure ratio the turbo runs at, and the same airflow without boost for comparison.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A four-stroke engine inhales its displacement once every two revolutions, so airflow is displacement times half the rpm, adjusted for how well the head fills and multiplied by the pressure ratio the turbo creates.</p><p>A 122 cubic inch engine at 6 000 rpm and 90 per cent volumetric efficiency wants 190 cubic feet a minute on its own. At 7.35 pounds of boost the pressure ratio is 1.5, so the turbo has to move 286 — which is 21.7 pounds of air a minute, and roughly where a modern small turbo sits at full chat.</p><p>The answer is <strong>pressure ratio and airflow and airflow and airflow without boost</strong>, worked out from displacement and engine speed and volumetric efficiency and boost. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>pr</strong></td><td><code>(Boost + 14.7) ÷ 14.7</code></td></tr><tr><td><strong>cfm</strong></td><td><code>Displacement × Engine speed ÷ 2 × (Volumetric efficiency ÷ 100) ÷ 1728 × (Boost + 14.7) ÷ 14.7</code></td></tr><tr><td><strong>lbs</strong></td><td><code>Displacement × Engine speed ÷ 2 × (Volumetric efficiency ÷ 100) ÷ 1728 × (Boost + 14.7) ÷ 14.7 × 0.076</code></td></tr><tr><td><strong>na_cfm</strong></td><td><code>Displacement × Engine speed ÷ 2 × (Volumetric efficiency ÷ 100) ÷ 1728</code></td></tr></tbody></table><p>Displacement times half the rpm over 1 728 converts to cubic feet a minute; the volumetric efficiency scales it and the pressure ratio multiplies it. Pounds a minute is that volume times the 0.076 pounds a cubic foot air weighs at sea level.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports pressure ratio and airflow and airflow and airflow without boost.</p><ul><li><strong>Displacement</strong> — cu in.</li><li><strong>Engine speed</strong> — rpm.</li><li><strong>Volumetric efficiency</strong> — %. Ninety per cent is a modern four-valve head at peak power; 80 is an older two-valve and 100 is a race engine.</li><li><strong>Boost</strong> — psi.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Pressure ratio</strong> — ratio.</li><li><strong>Airflow</strong> — cfm.</li><li><strong>Airflow</strong> — lb/min.</li><li><strong>Airflow without boost</strong> — cfm.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put displacement = 122 cu in, engine speed = 6 000 rpm, volumetric efficiency = 90 %, boost = 7.35 psi into the form and the panel reads:</p><ul><li><strong>Pressure ratio</strong> = <code>(Boost + 14.7) ÷ 14.7</code> = <strong>1.5 ratio</strong></li><li><strong>Airflow</strong> = <code>Displacement × Engine speed ÷ 2 × (Volumetric efficiency ÷ 100) ÷ 1728 × (Boost + 14.7) ÷ 14.7</code> = <strong>285.937 cfm</strong></li><li><strong>Airflow</strong> = <code>Displacement × Engine speed ÷ 2 × (Volumetric efficiency ÷ 100) ÷ 1728 × (Boost + 14.7) ÷ 14.7 × 0.076</code> = <strong>21.731 lb/min</strong></li><li><strong>Airflow without boost</strong> = <code>Displacement × Engine speed ÷ 2 × (Volumetric efficiency ÷ 100) ÷ 1728</code> = <strong>190.625 cfm</strong></li></ul><p>Fourteen pounds of boost doubles the pressure ratio to 1.95 and asks for 372 cfm — half as much air again for a pressure that is twice atmospheric.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>(7.35 + 14.7) ÷ 14.7</code>, which comes to <strong>1.5 ratio</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>122 cubic inches at 6 000 rpm and 90 per cent fills 190.6 cfm unboosted. At 7.35 psi the ratio is 1.5, so the turbo moves 286 cfm or 21.7 pounds a minute.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Pressure ratio</th><th>Airflow</th><th>Airflow</th><th>Airflow without boost</th></tr></thead><tbody><tr><td><strong>Displacement</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Engine speed</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Volumetric efficiency</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Boost</strong> +10 %</td><td>+3.33 %</td><td>+3.33 %</td><td>+3.33 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Displacement</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Displacement</strong> opens at 122 cu in</li><li><strong>Engine speed</strong> opens at 6 000 rpm</li><li><strong>Volumetric efficiency</strong> opens at 90 % — Ninety per cent is a modern four-valve head at peak power; 80 is an older two-valve and 100 is a race engine.</li><li><strong>Boost</strong> opens at 7.35 psi</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Displacement</th><th>Pressure ratio</th><th>Airflow</th><th>Airflow</th><th>Airflow without boost</th></tr></thead><tbody><tr><td>61 cu in</td><td>1.5</td><td>142.969</td><td>10.866</td><td>95.312</td></tr><tr><td>122 cu in</td><td>1.5</td><td>285.937</td><td>21.731</td><td>190.625</td></tr><tr><td>244 cu in</td><td>1.5</td><td>571.875</td><td>43.462</td><td>381.25</td></tr><tr><td>610 cu in</td><td>1.5</td><td>1 429.687</td><td>108.656</td><td>953.125</td></tr><tr><td>1 220 cu in</td><td>1.5</td><td>2 859.375</td><td>217.312</td><td>1 906.25</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set displacement = 122, engine speed = 6 000, volumetric efficiency = 90, boost = 14: <strong>Pressure ratio</strong> = 1.952 ratio, <strong>Airflow</strong> = 372.173 cfm, <strong>Airflow</strong> = 28.285 lb/min, <strong>Airflow without boost</strong> = 190.625 cfm. Fourteen psi is a ratio of 1.95 and 372 cfm — 28.3 pounds a minute, which is a bigger turbo and a stronger intercooler.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Comparing cfm without the pressure ratio.</strong> A big turbo at low boost and a small one at high boost can move the same air, and only one of them will be efficient.</li><li><strong>Assuming volumetric efficiency is one number.</strong> It falls with rpm and rises with boost. Ninety per cent is a peak-power figure, not a constant.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Steady state.</strong> The number is the airflow at one rpm. A turbo chart has to cover the whole range, from surge at low flow to choke at high.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need displacement and engine speed and volumetric efficiency and boost. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Pressure ratio and airflow and airflow and airflow without boost should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Choosing a turbo frame before buying.</li></li><li><li>Checking whether an intercooler is required at a given boost.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/horsepower">Horsepower</a> <a href="/everyday-life/compression-ratio">Compression ratio</a> <a href="/everyday-life/brake-specific-fuel-consumption">Brake-specific fuel</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Displacement</strong> ×10</td><td>1.5</td><td>1.5</td><td>unchanged</td></tr><tr><td><strong>Engine speed</strong> ×10</td><td>1.5</td><td>1.5</td><td>unchanged</td></tr><tr><td><strong>Volumetric efficiency</strong> ×10</td><td>1.5</td><td>1.5</td><td>unchanged</td></tr><tr><td><strong>Boost</strong> ×10</td><td>1.5</td><td>6</td><td>×4</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Turbo Size calculator work out?', 'a' => <<<'TXT'
            It returns pressure ratio and airflow and airflow and airflow without boost from displacement and engine speed and volumetric efficiency and boost. The relationship is (Boost + 14.7) ÷ 14.7.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Displacement (cu in), Engine speed (rpm), Volumetric efficiency (%), Boost (psi). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: displacement in cu in; engine speed in rpm; volumetric efficiency in %; boost in psi. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why half the rpm?', 'a' => <<<'TXT'
            A four-stroke takes two revolutions per cycle, so a 6 000 rpm engine breathes 3 000 times a minute. The division by two is the whole difference from a two-stroke.
            TXT],
            ['q' => 'What is pressure ratio?', 'a' => 'Absolute pressure after the compressor over absolute pressure before it. Seven pounds of boost on 14.7 psi of atmosphere is 22.05 over 14.7, or 1.5.'],
            ['q' => 'Is 0.076 pounds per cubic foot right?', 'a' => 'At sea level and 15 degrees, yes. Hot air is thinner, which is why an intercooler buys power — it puts the density back.'],
        ],
        'related' => [
            ['path' => '/everyday-life/horsepower', 'name' => 'Horsepower'],
            ['path' => '/everyday-life/compression-ratio', 'name' => 'Compression ratio'],
            ['path' => '/everyday-life/brake-specific-fuel-consumption', 'name' => 'Brake-specific fuel'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
