<?php

/**
 * Speedometer Gear Calculator
 * /everyday-life/speedometer-gear
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Speedometer Gear Calculator',
    'meta' => ['title' => 'Speedometer Gear — Teeth for the Tyre You Fitted', 'description' => 'Drive gear teeth, axle ratio and tyre revolutions give the driven gear a speedometer needs, and the percentage of error left if you buy the nearest whole tooth.', 'h1' => 'Speedometer Gear Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'drive',
                    'label' => 'Drive gear teeth',
                    'type' => 'number',
                    'suffix' => 'teeth',
                    'default' => '7',
                    'help' => 'Counted on the output shaft, or given in the manual. Seven and eight are common.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'axle',
                    'label' => 'Axle ratio',
                    'type' => 'number',
                    'suffix' => 'x',
                    'default' => '3.55',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'revs',
                    'label' => 'Tyre revolutions per mile',
                    'type' => 'number',
                    'suffix' => 'rev/mi',
                    'default' => '800',
                    'help' => 'The tyre size page gives this: a 26-inch tyre turns about 808 times a mile.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'standard',
                    'label' => 'Speedometer calibration',
                    'type' => 'number',
                    'suffix' => 'rev/mi',
                    'default' => '1000',
                    'help' => 'Most mechanical speedometers are calibrated at 1 000 revolutions a mile, which is why the constant is in the formula.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'teeth',
                    'label' => 'Teeth needed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'teeth',
                ],
                [
                    'name' => 'nearest',
                    'label' => 'Nearest whole gear',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'teeth',
                ],
                [
                    'name' => 'error',
                    'label' => 'Error with that gear',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'corrected',
                    'label' => 'Revs per mile that gear expects',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'rev/mi',
                ],
            ],
        ],
    ],
    'formula' => ['teeth' => 'drive * axle * revs / standard', 'nearest' => 'round(drive * axle * revs / standard)', 'error' => '(round(drive * axle * revs / standard) - drive * axle * revs / standard) / (drive * axle * revs / standard) * 100', 'corrected' => 'round(drive * axle * revs / standard) * standard / (drive * axle)'],
    'article' => [
        'intro' => 'The speedometer gear teeth a gearbox needs for a given axle and tyre, the nearest gear that exists, and the percentage error that leaves on the dial.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A mechanical speedometer is a drag cup driven by a cable, and the cable turns off a pair of gears in the gearbox. Change the axle or the tyre and the cable turns at the wrong rate, which is why the dial reads high after a lift kit.</p><p>The driven gear is the drive teeth times the axle ratio times the tyre's revolutions per mile, over the speedometer's own calibration: seven times 3.55 times 800 over a thousand is 19.88, so a 20-tooth gear is the one to buy.</p><p>The answer is <strong>teeth needed and nearest whole gear and error with that gear and revs per mile that gear expects</strong>, worked out from drive gear teeth and axle ratio and tyre revolutions per mile and speedometer calibration. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>teeth</strong></td><td><code>Drive gear teeth × Axle ratio × Tyre revolutions per mile ÷ Speedometer calibration</code></td></tr><tr><td><strong>nearest</strong></td><td><code>round(Drive gear teeth × Axle ratio × Tyre revolutions per mile ÷ Speedometer calibration)</code></td></tr><tr><td><strong>error</strong></td><td><code>(round(Drive gear teeth × Axle ratio × Tyre revolutions per mile ÷ Speedometer calibration) - Drive gear teeth × Axle ratio × Tyre revolutions per mile ÷ Speedometer calibration) ÷ (Drive gear teeth × Axle ratio × Tyre revolutions per mile ÷ Speedometer calibration) × 100</code></td></tr><tr><td><strong>corrected</strong></td><td><code>round(Drive gear teeth × Axle ratio × Tyre revolutions per mile ÷ Speedometer calibration) × Speedometer calibration ÷ (Drive gear teeth × Axle ratio)</code></td></tr></tbody></table><p>Drive teeth times axle ratio times tyre revs, over the calibration. The nearest whole tooth is rounded, and the error is that rounding as a share of the ideal.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports teeth needed and nearest whole gear and error with that gear and revs per mile that gear expects.</p><ul><li><strong>Drive gear teeth</strong> — teeth. Counted on the output shaft, or given in the manual. Seven and eight are common.</li><li><strong>Axle ratio</strong> — x.</li><li><strong>Tyre revolutions per mile</strong> — rev/mi. The tyre size page gives this: a 26-inch tyre turns about 808 times a mile.</li><li><strong>Speedometer calibration</strong> — rev/mi. Most mechanical speedometers are calibrated at 1 000 revolutions a mile, which is why the constant is in the formula.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Teeth needed</strong> — teeth.</li><li><strong>Nearest whole gear</strong> — teeth.</li><li><strong>Error with that gear</strong> — %.</li><li><strong>Revs per mile that gear expects</strong> — rev/mi.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put drive gear teeth = 7 teeth, axle ratio = 3.55 x, tyre revolutions per mile = 800 rev/mi, speedometer calibration = 1 000 rev/mi into the form and the panel reads:</p><ul><li><strong>Teeth needed</strong> = <code>Drive gear teeth × Axle ratio × Tyre revolutions per mile ÷ Speedometer calibration</code> = <strong>19.88 teeth</strong></li><li><strong>Nearest whole gear</strong> = <code>round(Drive gear teeth × Axle ratio × Tyre revolutions per mile ÷ Speedometer calibration)</code> = <strong>20 teeth</strong></li><li><strong>Error with that gear</strong> = <code>(round(Drive gear teeth × Axle ratio × Tyre revolutions per mile ÷ Speedometer calibration) - Drive gear teeth × Axle ratio × Tyre revolutions per mile ÷ Speedometer calibration) ÷ (Drive gear teeth × Axle ratio × Tyre revolutions per mile ÷ Speedometer calibration) × 100</code> = <strong>0.604 %</strong></li><li><strong>Revs per mile that gear expects</strong> = <code>round(Drive gear teeth × Axle ratio × Tyre revolutions per mile ÷ Speedometer calibration) × Speedometer calibration ÷ (Drive gear teeth × Axle ratio)</code> = <strong>804.829 rev/mi</strong></li></ul><p>Going to a 4.10 axle takes the ideal to 22.96, so a 23-tooth gear is nearly exact. The same tyre, a different gear, one tooth of difference.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>7 × 3.55 × 800 ÷ 1 000</code>, which comes to <strong>19.88 teeth</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Seven drive teeth, a 3.55 axle and 800 revs a mile call for 19.88 teeth. A 20-tooth gear leaves 0.6 per cent of error — about a third of a mile an hour at 60.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Teeth needed</th><th>Nearest whole gear</th><th>Error with that gear</th><th>Revs per mile that gear expects</th></tr></thead><tbody><tr><td><strong>Drive gear teeth</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+2.759 × 10<sup>-13</sup> %</td><td>−1.413 × 10<sup>-14</sup> %</td></tr><tr><td><strong>Axle ratio</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+2.759 × 10<sup>-13</sup> %</td><td>−1.413 × 10<sup>-14</sup> %</td></tr><tr><td><strong>Tyre revolutions per mile</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+2.759 × 10<sup>-13</sup> %</td><td>+10 %</td></tr><tr><td><strong>Speedometer calibration</strong> +10 %</td><td>−9.09 %</td><td>−10 %</td><td>−166.67 %</td><td>−1 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Speedometer calibration</strong>. <strong>Tyre revolutions per mile</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Drive gear teeth</strong> opens at 7 teeth — Counted on the output shaft, or given in the manual. Seven and eight are common.</li><li><strong>Axle ratio</strong> opens at 3.55 x</li><li><strong>Tyre revolutions per mile</strong> opens at 800 rev/mi — The tyre size page gives this: a 26-inch tyre turns about 808 times a mile.</li><li><strong>Speedometer calibration</strong> opens at 1 000 rev/mi — Most mechanical speedometers are calibrated at 1 000 revolutions a mile, which is why the constant is in the formula.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Drive gear teeth</th><th>Teeth needed</th><th>Nearest whole gear</th><th>Error with that gear</th><th>Revs per mile that gear expects</th></tr></thead><tbody><tr><td>3.5 teeth</td><td>9.94</td><td>10</td><td>0.604</td><td>804.829</td></tr><tr><td>7 teeth</td><td>19.88</td><td>20</td><td>0.604</td><td>804.829</td></tr><tr><td>14 teeth</td><td>39.76</td><td>40</td><td>0.604</td><td>804.829</td></tr><tr><td>35 teeth</td><td>99.4</td><td>99</td><td>-0.402</td><td>796.781</td></tr><tr><td>70 teeth</td><td>198.8</td><td>199</td><td>0.101</td><td>800.805</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set drive gear teeth = 7, axle ratio = 4.1, tyre revolutions per mile = 800, speedometer calibration = 1 000: <strong>Teeth needed</strong> = 22.96 teeth, <strong>Nearest whole gear</strong> = 23 teeth, <strong>Error with that gear</strong> = 0.174 %, <strong>Revs per mile that gear expects</strong> = 801.394 rev/mi. A 4.10 axle calls for 22.96 teeth, so a 23-tooth gear is within 0.2 per cent — the closest a whole tooth gets.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Buying before counting the tyre.</strong> Revs per mile depends on the loaded radius, not the catalogue diameter. A taller tyre needs fewer teeth.</li><li><strong>Assuming every speedometer is calibrated the same.</strong> A thousand revolutions a mile is the common standard and not the only one; check the instrument before ordering.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Mechanical speedometers.</strong> A modern car with an electronic sender takes the correction in software, and no gear will fix it.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need drive gear teeth and axle ratio and tyre revolutions per mile and speedometer calibration. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Teeth needed and nearest whole gear and error with that gear and revs per mile that gear expects should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Correcting the dial after a differential change.</li></li><li><li>Checking a gearbox swap before the first drive.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/rpm">RPM calculator</a> <a href="/everyday-life/tire-size">Tyre size</a> <a href="/everyday-life/wheel-offset">Wheel offset</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Drive gear teeth</strong> ×10</td><td>19.88</td><td>198.8</td><td>ten times larger</td></tr><tr><td><strong>Axle ratio</strong> ×10</td><td>19.88</td><td>198.8</td><td>ten times larger</td></tr><tr><td><strong>Tyre revolutions per mile</strong> ×10</td><td>19.88</td><td>198.8</td><td>ten times larger</td></tr><tr><td><strong>Speedometer calibration</strong> ×10</td><td>19.88</td><td>1.988</td><td>ten times smaller</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Speedometer Gear calculator work out?', 'a' => <<<'TXT'
            It returns teeth needed and nearest whole gear and error with that gear and revs per mile that gear expects from drive gear teeth and axle ratio and tyre revolutions per mile and speedometer calibration. The relationship is Drive gear teeth × Axle ratio × Tyre revolutions per mile ÷ Speedometer calibration.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Drive gear teeth (teeth), Axle ratio (x), Tyre revolutions per mile (rev/mi), Speedometer calibration (rev/mi). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: drive gear teeth in teeth; axle ratio in x; tyre revolutions per mile in rev/mi; speedometer calibration in rev/mi. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How do I know how many teeth my gear has?', 'a' => <<<'TXT'
            The drive gear is inside the tailshaft housing and the driven gear is the plastic one under the speed sensor. Count the driven gear's teeth, and take the drive from the manual.
            TXT],
            ['q' => 'Which way does the dial go wrong?', 'a' => 'A taller tyre or a numerically lower axle makes the cable turn slower for the same speed, so the dial under-reads and the odometer under-counts.'],
            ['q' => 'Can I fix it with a ratio adapter?', 'a' => 'Yes, for gearboxes where the tooth count is not available. An adapter changes the cable speed by a fixed percentage and avoids taking the housing apart.'],
        ],
        'related' => [
            ['path' => '/everyday-life/rpm', 'name' => 'RPM calculator'],
            ['path' => '/everyday-life/tire-size', 'name' => 'Tyre size'],
            ['path' => '/everyday-life/wheel-offset', 'name' => 'Wheel offset'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
