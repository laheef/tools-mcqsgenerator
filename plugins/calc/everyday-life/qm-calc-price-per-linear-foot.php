<?php

/**
 * Price per Linear Foot Calculator
 * /everyday-life/price-per-linear-foot
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Price per Linear Foot Calculator',
    'meta' => ['title' => 'Price per Linear Foot — Compare Timber and Trim', 'description' => 'Two lengths at two prices: the cost of a foot of each, what the difference comes to on the length you actually need, and which to order. The formula is shown.', 'h1' => 'Price per Linear Foot Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'len_a',
                    'label' => 'Material A length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cost_a',
                    'label' => 'Material A price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '24',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'len_b',
                    'label' => 'Material B length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cost_b',
                    'label' => 'Material B price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '34',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'run',
                    'label' => 'Length you need',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '20',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'unit_a',
                    'label' => 'Material A, per foot',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/ft',
                ],
                [
                    'name' => 'unit_b',
                    'label' => 'Material B, per foot',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/ft',
                ],
                [
                    'name' => 'diff',
                    'label' => 'B saves, per foot',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/ft',
                ],
                [
                    'name' => 'run_a',
                    'label' => 'A, for your run',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'run_b',
                    'label' => 'B, for your run',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'run_diff',
                    'label' => 'Saved on the run',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        'unit_a' => 'cost_a / len_a',
        'unit_b' => 'cost_b / len_b',
        'diff' => 'cost_a / len_a - cost_b / len_b',
        'run_a' => 'cost_a / len_a * run',
        'run_b' => 'cost_b / len_b * run',
        'run_diff' => '(cost_a / len_a - cost_b / len_b) * run',
    ],
    'article' => [
        'intro' => 'The price of one linear foot of each material and, more usefully, what a run of a given length costs in each, which is the number that goes into a quote.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Timber, skirting and trim are quoted by the length of the shortest piece the yard will sell you, and those lengths change with the profile. An eight-foot length at 24 and a twelve-foot length at 34 do not compare until both are turned into a price per foot.</p><p>The second half of the page is the part worth using: type the run you need, twenty feet of skirting, and the two prices become 60 and 56.67. Now the choice is a number you can spend.</p><p>The answer is <strong>material A, per foot and material B, per foot and b saves, per foot and a, for your run and b, for your run and saved on the run</strong>, worked out from material A length and material A price and material B length and material B price and length you need. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>unit_a</strong></td><td><code>Material A price ÷ Material A length</code></td></tr><tr><td><strong>unit_b</strong></td><td><code>Material B price ÷ Material B length</code></td></tr><tr><td><strong>diff</strong></td><td><code>Material A price ÷ Material A length - Material B price ÷ Material B length</code></td></tr><tr><td><strong>run_a</strong></td><td><code>Material A price ÷ Material A length × Length you need</code></td></tr><tr><td><strong>run_b</strong></td><td><code>Material B price ÷ Material B length × Length you need</code></td></tr><tr><td><strong>run_diff</strong></td><td><code>(Material A price ÷ Material A length - Material B price ÷ Material B length) × Length you need</code></td></tr></tbody></table><p>Price over length for the foot price. The run cost is that foot price multiplied by the run, so the answer carries the same rounding as the per-foot figure rather than a fresh division.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill. It reports material A, per foot and material B, per foot and b saves, per foot and a, for your run and b, for your run and saved on the run.</p><ul><li><strong>Material A length</strong> — ft.</li><li><strong>Material A price</strong> — $.</li><li><strong>Material B length</strong> — ft.</li><li><strong>Material B price</strong> — $.</li><li><strong>Length you need</strong> — ft.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Material A, per foot</strong> — $/ft.</li><li><strong>Material B, per foot</strong> — $/ft.</li><li><strong>B saves, per foot</strong> — $/ft.</li><li><strong>A, for your run</strong> — $.</li><li><strong>B, for your run</strong> — $.</li><li><strong>Saved on the run</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put material A length = 8 ft, material A price = 24 $, material B length = 12 ft, material B price = 34 $, length you need = 20 ft into the form and the panel reads:</p><ul><li><strong>Material A, per foot</strong> = <code>Material A price ÷ Material A length</code> = <strong>3 $/ft</strong></li><li><strong>Material B, per foot</strong> = <code>Material B price ÷ Material B length</code> = <strong>2.833 $/ft</strong></li><li><strong>B saves, per foot</strong> = <code>Material A price ÷ Material A length - Material B price ÷ Material B length</code> = <strong>0.167 $/ft</strong></li><li><strong>A, for your run</strong> = <code>Material A price ÷ Material A length × Length you need</code> = <strong>60 $</strong></li><li><strong>B, for your run</strong> = <code>Material B price ÷ Material B length × Length you need</code> = <strong>56.667 $</strong></li><li><strong>Saved on the run</strong> = <code>(Material A price ÷ Material A length - Material B price ÷ Material B length) × Length you need</code> = <strong>3.333 $</strong></li></ul><p>The run cost assumes the lengths can be cut without waste. A run of twenty feet from twelve-foot lengths leaves four feet, and that offcut is the real difference between the two materials.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>24 ÷ 8</code>, which comes to <strong>3 $/ft</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Eight feet for 24 is 3.00 a foot; twelve feet for 34 is 2.83. On a twenty-foot run that is 60 against 56.67, a saving of 3.33, and the difference per foot is 16.7 cents.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Material A, per foot</th><th>Material B, per foot</th><th>B saves, per foot</th><th>A, for your run</th><th>B, for your run</th><th>Saved on the run</th></tr></thead><tbody><tr><td><strong>Material A length</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>−163.64 %</td><td>−9.09 %</td><td>+0 %</td><td>−163.64 %</td></tr><tr><td><strong>Material A price</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+180 %</td><td>+10 %</td><td>+0 %</td><td>+180 %</td></tr><tr><td><strong>Material B length</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>+154.55 %</td><td>+0 %</td><td>−9.09 %</td><td>+154.55 %</td></tr><tr><td><strong>Material B price</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>−170 %</td><td>+0 %</td><td>+10 %</td><td>−170 %</td></tr><tr><td><strong>Length you need</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Material A price</strong>. <strong>Length you need</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Material A length</strong> opens at 8 ft</li><li><strong>Material A price</strong> opens at 24 $</li><li><strong>Material B length</strong> opens at 12 ft</li><li><strong>Material B price</strong> opens at 34 $</li><li><strong>Length you need</strong> opens at 20 ft</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Material A length</th><th>Material A, per foot</th><th>Material B, per foot</th><th>B saves, per foot</th><th>A, for your run</th><th>B, for your run</th><th>Saved on the run</th></tr></thead><tbody><tr><td>4 ft</td><td>6</td><td>2.833</td><td>3.167</td><td>120</td><td>56.667</td><td>63.333</td></tr><tr><td>8 ft</td><td>3</td><td>2.833</td><td>0.167</td><td>60</td><td>56.667</td><td>3.333</td></tr><tr><td>16 ft</td><td>1.5</td><td>2.833</td><td>-1.333</td><td>30</td><td>56.667</td><td>-26.667</td></tr><tr><td>40 ft</td><td>0.6</td><td>2.833</td><td>-2.233</td><td>12</td><td>56.667</td><td>-44.667</td></tr><tr><td>80 ft</td><td>0.3</td><td>2.833</td><td>-2.533</td><td>6</td><td>56.667</td><td>-50.667</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set material A length = 8, material A price = 24, material B length = 12, material B price = 42, length you need = 20: <strong>Material A, per foot</strong> = 3 $/ft, <strong>Material B, per foot</strong> = 3.5 $/ft, <strong>B saves, per foot</strong> = -0.5 $/ft, <strong>A, for your run</strong> = 60 $, <strong>B, for your run</strong> = 70 $, <strong>Saved on the run</strong> = -10 $. At 3.50 a foot the twelve-foot length is no longer the cheap one: the run costs 70 against 60.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Buying to the run exactly.</strong> Boards are cut square and joints eat an inch each. Order one length more than the arithmetic says, then work out whether it was needed.</li><li><strong>Comparing a short length with a long one as if the offcut is free.</strong> The offcut has the same price per foot as the board it came from. It is only free if you have a use for it.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Linear measure only.</strong> A wider board at the same price per foot is better value per square foot, and that is a different division. Use the price per square inch page for sheet goods.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need material A length and material A price and material B length and material B price and length you need. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Material a, per foot and material b, per foot and b saves, per foot and a, for your run and b, for your run and saved on the run should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Skirting, architrave and picture rail.</li></li><li><li>Fencing rails and decking boards, where lengths of 8, 10 and 12 feet are stocked side by side.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/price-per-square-inch">Price per square inch</a> <a href="/everyday-life/price-per-acre">Price per acre</a> <a href="/everyday-life/price-per-unit">Price per unit</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Material A length</strong> ×10</td><td>3</td><td>0.3</td><td>ten times smaller</td></tr><tr><td><strong>Material A price</strong> ×10</td><td>3</td><td>30</td><td>ten times larger</td></tr><tr><td><strong>Material B length</strong> ×10</td><td>3</td><td>3</td><td>unchanged</td></tr><tr><td><strong>Material B price</strong> ×10</td><td>3</td><td>3</td><td>unchanged</td></tr><tr><td><strong>Length you need</strong> ×10</td><td>3</td><td>3</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Price per Linear Foot calculator work out?', 'a' => <<<'TXT'
            It returns material A, per foot and material B, per foot and b saves, per foot and a, for your run and b, for your run and saved on the run from material A length and material A price and material B length and material B price and length you need. The relationship is Material A price ÷ Material A length.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Material A length (ft), Material A price ($), Material B length (ft), Material B price ($), Length you need (ft). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: material A length in ft; material A price in $; material B length in ft; material B price in $; length you need in ft. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What is a linear foot?', 'a' => 'Twelve inches along one edge, ignoring width and thickness. A 1 by 6 board and a 1 by 12 board can both be sold by the linear foot at different prices.'],
            ['q' => 'Why is a twelve-foot length rarely twelve feet?', 'a' => 'Because it is planed. Dressed timber loses an eighth or a quarter of an inch on each face, and the stated length is nominal on some stock.'],
            ['q' => 'Should I price in the offcut?', 'a' => 'Only if you have a job for it. A run of twenty feet from twelve-foot boards leaves four feet of waste, which is a third of a board gone.'],
        ],
        'related' => [
            ['path' => '/everyday-life/price-per-square-inch', 'name' => 'Price per square inch'],
            ['path' => '/everyday-life/price-per-acre', 'name' => 'Price per acre'],
            ['path' => '/everyday-life/price-per-unit', 'name' => 'Price per unit'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
