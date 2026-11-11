<?php

/**
 * Price per Round Calculator
 * /everyday-life/price-per-round
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Price per Round Calculator',
    'meta' => ['title' => 'Price per Round — Ammunition Cost That Adds Up', 'description' => 'Two boxes, two counts: the cost of a single round in dollars and in cents, the saving per round, and what a whole two-hundred-round range session costs.', 'h1' => 'Price per Round Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'rounds_a',
                    'label' => 'Box A rounds',
                    'type' => 'number',
                    'suffix' => 'rounds',
                    'default' => '50',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cost_a',
                    'label' => 'Box A price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '24.99',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rounds_b',
                    'label' => 'Box B rounds',
                    'type' => 'number',
                    'suffix' => 'rounds',
                    'default' => '200',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cost_b',
                    'label' => 'Box B price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '89.99',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'session',
                    'label' => 'Rounds in a session',
                    'type' => 'number',
                    'suffix' => 'rounds',
                    'default' => '200',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'unit_a',
                    'label' => 'Box A, per round',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'unit_b',
                    'label' => 'Box B, per round',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'cents_a',
                    'label' => 'Box A, cents a round',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '¢',
                ],
                [
                    'name' => 'cents_b',
                    'label' => 'Box B, cents a round',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '¢',
                ],
                [
                    'name' => 'diff',
                    'label' => 'B saves, per round',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'session_a',
                    'label' => 'A, for your session',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'session_b',
                    'label' => 'B, for your session',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        'unit_a' => 'cost_a / rounds_a',
        'unit_b' => 'cost_b / rounds_b',
        'cents_a' => 'cost_a / rounds_a * 100',
        'cents_b' => 'cost_b / rounds_b * 100',
        'diff' => 'cost_a / rounds_a - cost_b / rounds_b',
        'session_a' => 'cost_a / rounds_a * session',
        'session_b' => 'cost_b / rounds_b * session',
    ],
    'article' => [
        'intro' => <<<'TXT'
        The price of one round from each of two boxes, the saving per round, and what a session of a given size costs in each, because a cent a round is real money at 200.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Ammunition is priced per box and shot by the round, and the box counts shift with the cartridge: fifty, a hundred, two hundred. A box at 24.99 looks dearer than one at 89.99 until both are divided by their counts.</p><p>Fifty rounds for 24.99 is 49.98 cents a round; two hundred for 89.99 is 45.00. Four cents is nothing in a shop and 10 in a two-hundred-round session, which is the number to take to the counter.</p><p>The answer is <strong>box A, per round and box B, per round and box A, cents a round and box B, cents a round and b saves, per round and a, for your session and b, for your session</strong>, worked out from box A rounds and box A price and box B rounds and box B price and rounds in a session. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>unit_a</strong></td><td><code>Box A price ÷ Box A rounds</code></td></tr><tr><td><strong>unit_b</strong></td><td><code>Box B price ÷ Box B rounds</code></td></tr><tr><td><strong>cents_a</strong></td><td><code>Box A price ÷ Box A rounds × 100</code></td></tr><tr><td><strong>cents_b</strong></td><td><code>Box B price ÷ Box B rounds × 100</code></td></tr><tr><td><strong>diff</strong></td><td><code>Box A price ÷ Box A rounds - Box B price ÷ Box B rounds</code></td></tr><tr><td><strong>session_a</strong></td><td><code>Box A price ÷ Box A rounds × Rounds in a session</code></td></tr><tr><td><strong>session_b</strong></td><td><code>Box B price ÷ Box B rounds × Rounds in a session</code></td></tr></tbody></table><p>Price over rounds gives dollars per round; multiplying by a hundred gives cents, which is the figure shooters quote. The session costs are the per-round price multiplied out, so they inherit its rounding.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill. It reports box A, per round and box B, per round and box A, cents a round and box B, cents a round and b saves, per round and a, for your session and b, for your session.</p><ul><li><strong>Box A rounds</strong> — rounds.</li><li><strong>Box A price</strong> — $.</li><li><strong>Box B rounds</strong> — rounds.</li><li><strong>Box B price</strong> — $.</li><li><strong>Rounds in a session</strong> — rounds.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Box A, per round</strong> — $.</li><li><strong>Box B, per round</strong> — $.</li><li><strong>Box A, cents a round</strong> — ¢.</li><li><strong>Box B, cents a round</strong> — ¢.</li><li><strong>B saves, per round</strong> — $.</li><li><strong>A, for your session</strong> — $.</li><li><strong>B, for your session</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put box A rounds = 50 rounds, box A price = 24.99 $, box B rounds = 200 rounds, box B price = 89.99 $, rounds in a session = 200 rounds into the form and the panel reads:</p><ul><li><strong>Box A, per round</strong> = <code>Box A price ÷ Box A rounds</code> = <strong>0.5 $</strong></li><li><strong>Box B, per round</strong> = <code>Box B price ÷ Box B rounds</code> = <strong>0.45 $</strong></li><li><strong>Box A, cents a round</strong> = <code>Box A price ÷ Box A rounds × 100</code> = <strong>49.98 ¢</strong></li><li><strong>Box B, cents a round</strong> = <code>Box B price ÷ Box B rounds × 100</code> = <strong>44.995 ¢</strong></li><li><strong>B saves, per round</strong> = <code>Box A price ÷ Box A rounds - Box B price ÷ Box B rounds</code> = <strong>0.05 $</strong></li><li><strong>A, for your session</strong> = <code>Box A price ÷ Box A rounds × Rounds in a session</code> = <strong>99.96 $</strong></li><li><strong>B, for your session</strong> = <code>Box B price ÷ Box B rounds × Rounds in a session</code> = <strong>89.99 $</strong></li></ul><p>The larger box is not automatically the cheaper one. Bulk packs sometimes carry a handling premium, and a negative difference here is your cue to buy two small boxes.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>24.99 ÷ 50</code>, which comes to <strong>0.5 $</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>50 rounds at 24.99 is 49.98 cents; 200 at 89.99 is 45.00 cents, a saving of 4.99 cents a round, or 9.97 in a 200-round session: 99.96 against 89.99.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Box A, per round</th><th>Box B, per round</th><th>Box A, cents a round</th><th>Box B, cents a round</th><th>B saves, per round</th><th>A, for your session</th><th>B, for your session</th></tr></thead><tbody><tr><td><strong>Box A rounds</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td><td>−91.15 %</td><td>−9.09 %</td><td>+0 %</td></tr><tr><td><strong>Box A price</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+100.26 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Box B rounds</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td><td>−9.09 %</td><td>+82.06 %</td><td>+0 %</td><td>−9.09 %</td></tr><tr><td><strong>Box B price</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>−90.26 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Rounds in a session</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Box A price</strong>. <strong>Rounds in a session</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Box A rounds</strong> opens at 50 rounds</li><li><strong>Box A price</strong> opens at 24.99 $</li><li><strong>Box B rounds</strong> opens at 200 rounds</li><li><strong>Box B price</strong> opens at 89.99 $</li><li><strong>Rounds in a session</strong> opens at 200 rounds</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Box A rounds</th><th>Box A, per round</th><th>Box B, per round</th><th>Box A, cents a round</th><th>Box B, cents a round</th><th>B saves, per round</th><th>A, for your session</th><th>B, for your session</th></tr></thead><tbody><tr><td>25 rounds</td><td>1</td><td>0.45</td><td>99.96</td><td>44.995</td><td>0.55</td><td>199.92</td><td>89.99</td></tr><tr><td>50 rounds</td><td>0.5</td><td>0.45</td><td>49.98</td><td>44.995</td><td>0.05</td><td>99.96</td><td>89.99</td></tr><tr><td>100 rounds</td><td>0.25</td><td>0.45</td><td>24.99</td><td>44.995</td><td>-0.2</td><td>49.98</td><td>89.99</td></tr><tr><td>250 rounds</td><td>0.1</td><td>0.45</td><td>9.996</td><td>44.995</td><td>-0.35</td><td>19.992</td><td>89.99</td></tr><tr><td>500 rounds</td><td>0.05</td><td>0.45</td><td>4.998</td><td>44.995</td><td>-0.4</td><td>9.996</td><td>89.99</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set box A rounds = 20, box A price = 12.99, box B rounds = 200, box B price = 89.99, rounds in a session = 200: <strong>Box A, per round</strong> = 0.649 $, <strong>Box B, per round</strong> = 0.45 $, <strong>Box A, cents a round</strong> = 64.95 ¢, <strong>Box B, cents a round</strong> = 44.995 ¢, <strong>B saves, per round</strong> = 0.2 $, <strong>A, for your session</strong> = 129.9 $, <strong>B, for your session</strong> = 89.99 $. A twenty-round box at 12.99 is 64.95 cents a round, so the bulk pack saves 19.96 cents and 39.93 across a session.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Comparing a box of fifty with a box of twenty.</strong> The smaller box is often a premium load sold for hunting, where the same cartridge in a bulk pack is plinking ammunition. Check the load, not only the count.</li><li><strong>Forgetting tax and shipping.</strong> Two boxes from different sellers are not comparable once one adds a shipping charge and the other does not.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Ammunition only, and only the sticker price.</strong> Reloading costs depend on powder and primers and are a different sum.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need box A rounds and box A price and box B rounds and box B price and rounds in a session. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Box a, per round and box b, per round and box a, cents a round and box b, cents a round and b saves, per round and a, for your session and b, for your session should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Deciding between a fifty-round box and a bulk pack.</li></li><li><li>Working out what a range trip costs before you go.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/price-per-unit">Price per unit</a> <a href="/everyday-life/price-per-ounce">Price per ounce</a> <a href="/everyday-life/price-per-weight">Price per weight</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Box A rounds</strong> ×10</td><td>0.5</td><td>0.05</td><td>ten times smaller</td></tr><tr><td><strong>Box A price</strong> ×10</td><td>0.5</td><td>4.998</td><td>ten times larger</td></tr><tr><td><strong>Box B rounds</strong> ×10</td><td>0.5</td><td>0.5</td><td>unchanged</td></tr><tr><td><strong>Box B price</strong> ×10</td><td>0.5</td><td>0.5</td><td>unchanged</td></tr><tr><td><strong>Rounds in a session</strong> ×10</td><td>0.5</td><td>0.5</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Price per Round calculator work out?', 'a' => <<<'TXT'
            It returns box A, per round and box B, per round and box A, cents a round and box B, cents a round and b saves, per round and a, for your session and b, for your session from box A rounds and box A price and box B rounds and box B price and rounds in a session. The relationship is Box A price ÷ Box A rounds.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Box A rounds (rounds), Box A price ($), Box B rounds (rounds), Box B price ($), Rounds in a session (rounds). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: box A rounds in rounds; box A price in $; box B rounds in rounds; box B price in $; rounds in a session in rounds. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why quote cents rather than dollars per round?', 'a' => <<<'TXT'
            Because dollars per round arrives as 0.45 or 0.4499, and a trailing decimal hides the difference that matters. Cents per round is how the price is discussed and how the saving is noticed.
            TXT],
            ['q' => 'Is the cheapest round per round the right buy?', 'a' => <<<'TXT'
            For practice, usually. For anything where the load matters — hunting, a semi-automatic that is fussy about pressure — the cheaper round can cost more in functioning.
            TXT],
            ['q' => 'Does the box size change the price per round much?', 'a' => <<<'TXT'
            Between a fifty and a two-hundred box it is often five to fifteen per cent. Below fifty rounds the premium is steeper, because the packaging is a larger share of the cost.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/price-per-unit', 'name' => 'Price per unit'],
            ['path' => '/everyday-life/price-per-ounce', 'name' => 'Price per ounce'],
            ['path' => '/everyday-life/price-per-weight', 'name' => 'Price per weight'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
