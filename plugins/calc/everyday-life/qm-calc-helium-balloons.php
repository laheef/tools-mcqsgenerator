<?php

/**
 * Helium Balloons Calculator
 * /everyday-life/helium-balloons
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Helium Balloons Calculator',
    'meta' => ['title' => 'Helium Balloons — How Many an 11-inch Party Gets', 'description' => 'A tank\'s capacity in cubic feet, a balloon\'s volume and an allowance for what is lost inflating: how many balloons a tank fills and the cost of each one.', 'h1' => 'Helium Balloons Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'tank_cuft',
                    'label' => 'Tank capacity',
                    'type' => 'number',
                    'suffix' => 'cu ft',
                    'default' => '14.9',
                    'help' => 'The small disposable tanks are 8.9 cubic feet, the medium ones 14.9 and a cylinder nearer 55.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'balloon_cuft',
                    'label' => 'Gas in one balloon',
                    'type' => 'number',
                    'suffix' => 'cu ft',
                    'default' => '0.5',
                    'help' => 'An 11-inch latex balloon holds about half a cubic foot; a 9-inch one a quarter.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste_pct',
                    'label' => 'Lost inflating',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Filling, tying and the last balloon that will not float all take gas. Ten per cent is ordinary.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'tank_price',
                    'label' => 'Tank price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '40',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'usable',
                    'label' => 'Gas you can use',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cu ft',
                ],
                [
                    'name' => 'balloons',
                    'label' => 'Balloons',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'balloons',
                ],
                [
                    'name' => 'cost_balloon',
                    'label' => 'Cost per balloon',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'per_cuft',
                    'label' => 'Balloons per cubic foot',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'balloons',
                ],
            ],
        ],
    ],
    'formula' => ['usable' => 'tank_cuft * (1 - waste_pct / 100)', 'balloons' => 'tank_cuft * (1 - waste_pct / 100) / balloon_cuft', 'cost_balloon' => 'tank_price / (tank_cuft * (1 - waste_pct / 100) / balloon_cuft)', 'per_cuft' => '1 / balloon_cuft'],
    'article' => [
        'intro' => 'How many balloons a helium tank fills, allowing for what is lost inflating, and the cost of each balloon once the tank is paid for.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A tank is sold in cubic feet and a balloon in inches, and the two never meet on the label. An 11-inch balloon holds about half a cubic foot, so a 14.9 cubic foot tank has 29.8 balloons in it before anything is lost.</p><p>Ten per cent goes on filling and tying, which leaves 26.8 — the figure to plan a party with, and one to three balloons short of what people expect.</p><p>The answer is <strong>gas you can use and balloons and cost per balloon and balloons per cubic foot</strong>, worked out from tank capacity and gas in one balloon and lost inflating and tank price. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>usable</strong></td><td><code>Tank capacity × (1 - Lost inflating ÷ 100)</code></td></tr><tr><td><strong>balloons</strong></td><td><code>Tank capacity × (1 - Lost inflating ÷ 100) ÷ Gas in one balloon</code></td></tr><tr><td><strong>cost_balloon</strong></td><td><code>Tank price ÷ (Tank capacity × (1 - Lost inflating ÷ 100) ÷ Gas in one balloon)</code></td></tr><tr><td><strong>per_cuft</strong></td><td><code>1 ÷ Gas in one balloon</code></td></tr></tbody></table><p>Tank capacity less the waste share gives usable gas; divided by the volume of one balloon gives the count. The cost per balloon is the tank price over that count, and the per-cubic-foot figure is the reciprocal of the balloon volume.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports gas you can use and balloons and cost per balloon and balloons per cubic foot.</p><ul><li><strong>Tank capacity</strong> — cu ft. The small disposable tanks are 8.9 cubic feet, the medium ones 14.9 and a cylinder nearer 55.</li><li><strong>Gas in one balloon</strong> — cu ft. An 11-inch latex balloon holds about half a cubic foot; a 9-inch one a quarter.</li><li><strong>Lost inflating</strong> — %. Filling, tying and the last balloon that will not float all take gas. Ten per cent is ordinary.</li><li><strong>Tank price</strong> — $.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Gas you can use</strong> — cu ft.</li><li><strong>Balloons</strong> — balloons.</li><li><strong>Cost per balloon</strong> — $.</li><li><strong>Balloons per cubic foot</strong> — balloons.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put tank capacity = 14.9 cu ft, gas in one balloon = 0.5 cu ft, lost inflating = 10 %, tank price = 40 $ into the form and the panel reads:</p><ul><li><strong>Gas you can use</strong> = <code>Tank capacity × (1 - Lost inflating ÷ 100)</code> = <strong>13.41 cu ft</strong></li><li><strong>Balloons</strong> = <code>Tank capacity × (1 - Lost inflating ÷ 100) ÷ Gas in one balloon</code> = <strong>26.82 balloons</strong></li><li><strong>Cost per balloon</strong> = <code>Tank price ÷ (Tank capacity × (1 - Lost inflating ÷ 100) ÷ Gas in one balloon)</code> = <strong>1.491 $</strong></li><li><strong>Balloons per cubic foot</strong> = <code>1 ÷ Gas in one balloon</code> = <strong>2 balloons</strong></li></ul><p>Nine-inch balloons take a quarter of a cubic foot, so the same tank fills 53.6 of them — twice the count and half the presence.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>14.9 × (1 - 10 ÷ 100)</code>, which comes to <strong>13.41 cu ft</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>14.9 cubic feet less ten per cent is 13.41 usable, which at half a cubic foot a balloon is 26.8 balloons and 1.49 each.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Gas you can use</th><th>Balloons</th><th>Cost per balloon</th><th>Balloons per cubic foot</th></tr></thead><tbody><tr><td><strong>Tank capacity</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td><td>+0 %</td></tr><tr><td><strong>Gas in one balloon</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Lost inflating</strong> +10 %</td><td>−1.11 %</td><td>−1.11 %</td><td>+1.12 %</td><td>+0 %</td></tr><tr><td><strong>Tank price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Gas in one balloon</strong>. <strong>Lost inflating</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Tank capacity</strong> opens at 14.9 cu ft — The small disposable tanks are 8.9 cubic feet, the medium ones 14.9 and a cylinder nearer 55.</li><li><strong>Gas in one balloon</strong> opens at 0.5 cu ft — An 11-inch latex balloon holds about half a cubic foot; a 9-inch one a quarter.</li><li><strong>Lost inflating</strong> opens at 10 % — Filling, tying and the last balloon that will not float all take gas. Ten per cent is ordinary.</li><li><strong>Tank price</strong> opens at 40 $</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Tank capacity</th><th>Gas you can use</th><th>Balloons</th><th>Cost per balloon</th><th>Balloons per cubic foot</th></tr></thead><tbody><tr><td>7.45 cu ft</td><td>6.705</td><td>13.41</td><td>2.983</td><td>2</td></tr><tr><td>14.9 cu ft</td><td>13.41</td><td>26.82</td><td>1.491</td><td>2</td></tr><tr><td>29.8 cu ft</td><td>26.82</td><td>53.64</td><td>0.746</td><td>2</td></tr><tr><td>74.5 cu ft</td><td>67.05</td><td>134.1</td><td>0.298</td><td>2</td></tr><tr><td>149 cu ft</td><td>134.1</td><td>268.2</td><td>0.149</td><td>2</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set tank capacity = 14.9, gas in one balloon = 0.25, lost inflating = 10, tank price = 40: <strong>Gas you can use</strong> = 13.41 cu ft, <strong>Balloons</strong> = 53.64 balloons, <strong>Cost per balloon</strong> = 0.746 $, <strong>Balloons per cubic foot</strong> = 4 balloons. At a quarter of a cubic foot a balloon the same tank fills 53.6 nine-inch balloons at 75 cents each.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using the tank's nominal capacity.</strong> A tank is filled to a pressure and the last of the gas comes out slowly. Ten per cent lost is optimistic on a cold day.</li><li><strong>Forgetting the helium in the balloons you abandon.</strong> Half-inflated balloons and a knot that slips are waste the percentage absorbs, not the arithmetic.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Latex, room temperature.</strong> Foil balloons hold far more gas for their size and float for weeks; helium also expands in the sun and contracts in the cold, so a cold morning shrinks every balloon.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need tank capacity and gas in one balloon and lost inflating and tank price. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Gas you can use and balloons and cost per balloon and balloons per cubic foot should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Buying the right tank for a party of a known size.</li></li><li><li>Comparing the cost per balloon with a shop's inflated price.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/balloon-arch">Balloon arch</a> <a href="/everyday-life/bean-bag-filling">Bean bag filling</a> <a href="/everyday-life/price-per-unit">Price per unit</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Tank capacity</strong> ×10</td><td>13.41</td><td>134.1</td><td>ten times larger</td></tr><tr><td><strong>Gas in one balloon</strong> ×10</td><td>13.41</td><td>13.41</td><td>unchanged</td></tr><tr><td><strong>Lost inflating</strong> ×10</td><td>13.41</td><td>0</td><td>×0</td></tr><tr><td><strong>Tank price</strong> ×10</td><td>13.41</td><td>13.41</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Helium Balloons calculator work out?', 'a' => <<<'TXT'
            It returns gas you can use and balloons and cost per balloon and balloons per cubic foot from tank capacity and gas in one balloon and lost inflating and tank price. The relationship is Tank capacity × (1 - Lost inflating ÷ 100).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Tank capacity (cu ft), Gas in one balloon (cu ft), Lost inflating (%), Tank price ($). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: tank capacity in cu ft; gas in one balloon in cu ft; lost inflating in %; tank price in $. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How many balloons does a small tank fill?', 'a' => 'The 8.9 cubic foot disposable tanks fill about 30 eleven-inch balloons without an allowance, and 27 with one. That is a small party.'],
            ['q' => 'How much helium is in an 11-inch balloon?', 'a' => 'About 0.5 cubic feet, because a sphere of 11 inches across has a volume of roughly 0.4 cubic feet and the balloon stretches a little beyond round.'],
            ['q' => 'Do foil balloons use more helium?', 'a' => 'More per balloon and far less per day of float, because they do not leak through the material. A foil balloon is the cheaper helium per hour of decoration.'],
        ],
        'related' => [
            ['path' => '/everyday-life/balloon-arch', 'name' => 'Balloon arch'],
            ['path' => '/everyday-life/bean-bag-filling', 'name' => 'Bean bag filling'],
            ['path' => '/everyday-life/price-per-unit', 'name' => 'Price per unit'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
