<?php

/**
 * Compression Ratio Calculator
 * /everyday-life/compression-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Compression Ratio Calculator',
    'meta' => ['title' => 'Compression Ratio — Swept Volume over Clearance', 'description' => 'Bore, stroke and chamber volume give the swept volume and the compression ratio: the one figure that decides what fuel an engine wants. The formula is shown.', 'h1' => 'Compression Ratio Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'bore',
                    'label' => 'Bore',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '4',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'stroke',
                    'label' => 'Stroke',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '3.48',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'chamber',
                    'label' => 'Chamber volume',
                    'type' => 'number',
                    'suffix' => 'cc',
                    'default' => '64',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gasket',
                    'label' => 'Gasket volume',
                    'type' => 'number',
                    'suffix' => 'cc',
                    'default' => '8',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'dish',
                    'label' => 'Piston dish or dome',
                    'type' => 'number',
                    'suffix' => 'cc',
                    'default' => '0',
                    'help' => 'A dish adds volume and lowers the ratio; a dome subtracts and raises it. Enter the dish as a positive number and a dome as a negative one.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'swept_ci',
                    'label' => 'Swept volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cu in',
                ],
                [
                    'name' => 'swept_cc',
                    'label' => 'Swept volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cc',
                ],
                [
                    'name' => 'clearance',
                    'label' => 'Clearance volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cc',
                ],
                [
                    'name' => 'ratio',
                    'label' => 'Compression ratio',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => ':1',
                ],
            ],
        ],
    ],
    'formula' => ['swept_ci' => 'pi / 4 * bore * bore * stroke', 'swept_cc' => 'pi / 4 * bore * bore * stroke * 16.387064', 'clearance' => 'chamber + gasket + dish', 'ratio' => '(pi / 4 * bore * bore * stroke * 16.387064 + chamber + gasket + dish) / (chamber + gasket + dish)'],
    'article' => [
        'intro' => 'The swept volume of one cylinder from its bore and stroke, the clearance volume from the chamber and gasket, and the compression ratio between them.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Compression ratio is swept volume plus clearance volume, divided by clearance volume. A 4-inch bore and a 3.48-inch stroke sweep 43.7 cubic inches, which is 716.6 cc.</p><p>With 72 cc of clearance — a 64 cc chamber and an 8 cc gasket — the ratio is 10.95 to one. Take a millimetre off the head, lose 6 cc, and the same engine is 11.9, which is a different fuel and a different ignition curve.</p><p>The answer is <strong>swept volume and swept volume and clearance volume and compression ratio</strong>, worked out from bore and stroke and chamber volume and gasket volume and piston dish or dome. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>swept_ci</strong></td><td><code>pi ÷ 4 × Bore × Bore × Stroke</code></td></tr><tr><td><strong>swept_cc</strong></td><td><code>pi ÷ 4 × Bore × Bore × Stroke × 16.387064</code></td></tr><tr><td><strong>clearance</strong></td><td><code>Chamber volume + Gasket volume + Piston dish or dome</code></td></tr><tr><td><strong>ratio</strong></td><td><code>(pi ÷ 4 × Bore × Bore × Stroke × 16.387064 + Chamber volume + Gasket volume + Piston dish or dome) ÷ (Chamber volume + Gasket volume + Piston dish or dome)</code></td></tr></tbody></table><p>Pi over four times bore squared times stroke gives the swept volume, multiplied by 16.387 to turn cubic inches into cubic centimetres. Clearance is chamber plus gasket plus dish, and the ratio adds the two and divides by the clearance.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill. It reports swept volume and swept volume and clearance volume and compression ratio.</p><ul><li><strong>Bore</strong> — in.</li><li><strong>Stroke</strong> — in.</li><li><strong>Chamber volume</strong> — cc.</li><li><strong>Gasket volume</strong> — cc.</li><li><strong>Piston dish or dome</strong> — cc. A dish adds volume and lowers the ratio; a dome subtracts and raises it. Enter the dish as a positive number and a dome as a negative one.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Swept volume</strong> — cu in.</li><li><strong>Swept volume</strong> — cc.</li><li><strong>Clearance volume</strong> — cc.</li><li><strong>Compression ratio</strong> — :1.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put bore = 4 in, stroke = 3.48 in, chamber volume = 64 cc, gasket volume = 8 cc, piston dish or dome = 0 cc into the form and the panel reads:</p><ul><li><strong>Swept volume</strong> = <code>pi ÷ 4 × Bore × Bore × Stroke</code> = <strong>43.731 cu in</strong></li><li><strong>Swept volume</strong> = <code>pi ÷ 4 × Bore × Bore × Stroke × 16.387064</code> = <strong>716.622 cc</strong></li><li><strong>Clearance volume</strong> = <code>Chamber volume + Gasket volume + Piston dish or dome</code> = <strong>72 cc</strong></li><li><strong>Compression ratio</strong> = <code>(pi ÷ 4 × Bore × Bore × Stroke × 16.387064 + Chamber volume + Gasket volume + Piston dish or dome) ÷ (Chamber volume + Gasket volume + Piston dish or dome)</code> = <strong>10.953 :1</strong></li></ul><p>A 10 cc dish drops the same engine to 9.7 to one, which is the usual way a forced-induction build lowers its ratio without changing the pistons' bore.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>pi ÷ 4 × 4 × 4 × 3.48</code>, which comes to <strong>43.731 cu in</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>4 by 3.48 inches sweeps 43.73 cubic inches or 716.6 cc. With 72 cc of clearance the ratio is 10.95 to one.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Swept volume</th><th>Swept volume</th><th>Clearance volume</th><th>Compression ratio</th></tr></thead><tbody><tr><td><strong>Bore</strong> +10 %</td><td>+21 %</td><td>+21 %</td><td>+0 %</td><td>+19.08 %</td></tr><tr><td><strong>Stroke</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+9.09 %</td></tr><tr><td><strong>Chamber volume</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+8.89 %</td><td>−7.42 %</td></tr><tr><td><strong>Gasket volume</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+1.11 %</td><td>−1 %</td></tr><tr><td><strong>Piston dish or dome</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0.14 %</td><td>−0.13 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Bore</strong>. <strong>Piston dish or dome</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Bore</strong> opens at 4 in</li><li><strong>Stroke</strong> opens at 3.48 in</li><li><strong>Chamber volume</strong> opens at 64 cc</li><li><strong>Gasket volume</strong> opens at 8 cc</li><li><strong>Piston dish or dome</strong> opens at 0 cc — A dish adds volume and lowers the ratio; a dome subtracts and raises it. Enter the dish as a positive number and a dome as a negative one.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Bore</th><th>Swept volume</th><th>Swept volume</th><th>Clearance volume</th><th>Compression ratio</th></tr></thead><tbody><tr><td>2 in</td><td>10.933</td><td>179.156</td><td>72</td><td>3.488</td></tr><tr><td>4 in</td><td>43.731</td><td>716.622</td><td>72</td><td>10.953</td></tr><tr><td>8 in</td><td>174.924</td><td>2 866.489</td><td>72</td><td>40.812</td></tr><tr><td>20 in</td><td>1 093.274</td><td>17 915.555</td><td>72</td><td>249.827</td></tr><tr><td>40 in</td><td>4 373.097</td><td>71 662.22</td><td>72</td><td>996.309</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set bore = 4, stroke = 3.48, chamber volume = 64, gasket volume = 8, piston dish or dome = 10: <strong>Swept volume</strong> = 43.731 cu in, <strong>Swept volume</strong> = 716.622 cc, <strong>Clearance volume</strong> = 82 cc, <strong>Compression ratio</strong> = 9.739 :1. A 10 cc dish takes the clearance to 82 and the ratio to 9.74 — the same engine, deliberately lower for boost.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Forgetting the gasket.</strong> Eight cubic centimetres is a tenth of the clearance volume and worth about a full point of ratio on a small engine.</li><li><strong>Assuming the chamber volume on the head.</strong> Valve reliefs, plug depth and a decked block all change it. The chamber has to be measured with liquid, not read off a specification.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One cylinder.</strong> The ratio is per cylinder, and a worn engine has a different ratio in each. This is the blueprint figure.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need bore and stroke and chamber volume and gasket volume and piston dish or dome. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Swept volume and swept volume and clearance volume and compression ratio should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking a ratio before choosing a camshaft.</li></li><li><li>Working out what a head skim will do to the ratio.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/compression-ratio-to-psi">Cranking pressure</a> <a href="/everyday-life/horsepower">Horsepower</a> <a href="/everyday-life/turbo-size">Turbo size</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Bore</strong> ×10</td><td>43.731</td><td>4 373.097</td><td>×100</td></tr><tr><td><strong>Stroke</strong> ×10</td><td>43.731</td><td>437.31</td><td>ten times larger</td></tr><tr><td><strong>Chamber volume</strong> ×10</td><td>43.731</td><td>43.731</td><td>unchanged</td></tr><tr><td><strong>Gasket volume</strong> ×10</td><td>43.731</td><td>43.731</td><td>unchanged</td></tr><tr><td><strong>Piston dish or dome</strong> ×10</td><td>43.731</td><td>43.731</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Compression Ratio calculator work out?', 'a' => <<<'TXT'
            It returns swept volume and swept volume and clearance volume and compression ratio from bore and stroke and chamber volume and gasket volume and piston dish or dome. The relationship is pi ÷ 4 × Bore × Bore × Stroke.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Bore (in), Stroke (in), Chamber volume (cc), Gasket volume (cc), Piston dish or dome (cc). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: bore in in; stroke in in; chamber volume in cc; gasket volume in cc; piston dish or dome in cc. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What is a normal compression ratio?', 'a' => 'Between 9 and 11 to one for a modern petrol engine, 15 to 18 for a diesel. Above 11 needs high-octane fuel or direct injection.'],
            ['q' => 'Does a higher ratio always make more power?', 'a' => 'More thermal efficiency, yes, up to the point where knock forces the ignition back and the gain disappears.'],
            ['q' => 'Why measure the chamber instead of trusting the spec?', 'a' => 'Because heads are machined, valves are replaced and pistons differ. A burette and a plate of glass give the real number in ten minutes.'],
        ],
        'related' => [
            ['path' => '/everyday-life/compression-ratio-to-psi', 'name' => 'Cranking pressure'],
            ['path' => '/everyday-life/horsepower', 'name' => 'Horsepower'],
            ['path' => '/everyday-life/turbo-size', 'name' => 'Turbo size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
