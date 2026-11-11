<?php

/**
 * Appliance Depreciation Calculator
 * /everyday-life/appliance-depreciation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Appliance Depreciation Calculator',
    'meta' => ['title' => 'Appliance Depreciation — What It Is Worth Now', 'description' => 'What a household appliance is worth after a few years, by straight-line depreciation over the life its type normally lasts, with the yearly loss alongside.', 'h1' => 'Appliance Depreciation Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'cost',
                    'label' => 'What it cost to replace',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '800',
                    'help' => 'A new one of the same size and class, not what you paid for it.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'age',
                    'label' => 'Age in years',
                    'type' => 'number',
                    'suffix' => 'years',
                    'default' => '3',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'life',
                    'label' => 'How long this type normally lasts',
                    'type' => 'select',
                    'options' => [
                        'Washing machine, 10 years' => 10,
                        'Dishwasher, 9 years' => 9,
                        'Fridge freezer, 14 years' => 14,
                        'Oven, 15 years' => 15,
                        'Boiler, 12 years' => 12,
                        'TV, 7 years' => 7,
                    ],
                    'control' => 'SELECT',
                    'default' => 'Washing machine, 10 years',
                ],
                [
                    'name' => 'value',
                    'label' => 'Worth now',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'lost',
                    'label' => 'Value used up',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'per_year',
                    'label' => 'Lost each year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => ['value' => 'max(cost * (1 - age / life), 0)', 'lost' => 'cost - max(cost * (1 - age / life), 0)', 'per_year' => 'cost / life'],
    'article' => [
        'intro' => <<<'TXT'
        Replacement cost, age and an expected life, turned into today's value. Straight line: the same amount lost every year, which is how insurers and second-hand buyers think.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>An appliance loses value on a straight line: a tenth a year for a washers that lasts ten years, whether or not it got much use in the second. That is not how a shop prices a trade-in, but it is how an insurer settles a claim and how a buyer of second-hand white goods thinks.</p><p>The page takes the cost of replacing the item, its age, and the life its type normally gives, and returns the value left. Past the expected life the value is capped at zero rather than going negative, because an old machine is not a debt.</p><p>The answer is <strong>worth now and value used up and lost each year</strong>, worked out from what it cost to replace and age in years and how long this type normally lasts. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>value</strong></td><td><code>max(What it cost to replace × (1 - Age in years ÷ How long this type normally lasts), 0)</code></td></tr><tr><td><strong>lost</strong></td><td><code>What it cost to replace - max(What it cost to replace × (1 - Age in years ÷ How long this type normally lasts), 0)</code></td></tr><tr><td><strong>per_year</strong></td><td><code>What it cost to replace ÷ How long this type normally lasts</code></td></tr></tbody></table><p>Cost times one minus the fraction of life used gives the value, floored at zero. The used-up figure is the same subtraction the other way round, and the yearly line is the cost divided by the life.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports worth now and value used up and lost each year.</p><ul><li><strong>What it cost to replace</strong> — $. A new one of the same size and class, not what you paid for it.</li><li><strong>Age in years</strong> — years.</li><li><strong>How long this type normally lasts</strong>. A choice: Washing machine, 10 years, Dishwasher, 9 years, Fridge freezer, 14 years, Oven, 15 years, Boiler, 12 years, TV, 7 years.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Worth now</strong> — $.</li><li><strong>Value used up</strong> — $.</li><li><strong>Lost each year</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put what it cost to replace = 800 $, age in years = 3 years, how long this type normally lasts = 10 into the form and the panel reads:</p><ul><li><strong>Worth now</strong> = <code>max(What it cost to replace × (1 - Age in years ÷ How long this type normally lasts), 0)</code> = <strong>560 $</strong></li><li><strong>Value used up</strong> = <code>What it cost to replace - max(What it cost to replace × (1 - Age in years ÷ How long this type normally lasts), 0)</code> = <strong>240 $</strong></li><li><strong>Lost each year</strong> = <code>What it cost to replace ÷ How long this type normally lasts</code> = <strong>80 $</strong></li></ul><p>Age past the life gives zero, which is the honest answer and the one an insurer gives a machine that has outlived its class.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>max(800 × (1 - 3 ÷ 10), 0)</code>, which comes to <strong>560 $</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>An 800 dollar washing machine at three years old with a ten-year life is worth 560: 240 used up, at 80 a year.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Worth now</th><th>Value used up</th><th>Lost each year</th></tr></thead><tbody><tr><td><strong>What it cost to replace</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Age in years</strong> +10 %</td><td>−4.29 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>How long this type normally lasts</strong> +10 %</td><td>+3.9 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>What it cost to replace</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>What it cost to replace</strong> opens at 800 $ — A new one of the same size and class, not what you paid for it.</li><li><strong>Age in years</strong> opens at 3 years</li><li><strong>How long this type normally lasts</strong> opens at 10</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>What it cost to replace</th><th>Worth now</th><th>Value used up</th><th>Lost each year</th></tr></thead><tbody><tr><td>400 $</td><td>280</td><td>120</td><td>40</td></tr><tr><td>800 $</td><td>560</td><td>240</td><td>80</td></tr><tr><td>1 600 $</td><td>1 120</td><td>480</td><td>160</td></tr><tr><td>4 000 $</td><td>2 800</td><td>1 200</td><td>400</td></tr><tr><td>8 000 $</td><td>5 600</td><td>2 400</td><td>800</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set what it cost to replace = 800, age in years = 12, how long this type normally lasts = 10: <strong>Worth now</strong> = 0 $, <strong>Value used up</strong> = 800 $, <strong>Lost each year</strong> = 80 $. A machine older than its expected life is worth nothing on this method, which is the case that catches people out.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using the purchase price.</strong> A replacement of the same size today is the figure that matters, and it may be higher or lower.</li><li><strong>Assuming appliances last their nominal life.</strong> A cheap machine often lasts half as long, and a good one twice.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Straight line only.</strong> Real second-hand prices fall faster in the first year, so the value here is generous at the start.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need what it cost to replace and age in years and how long this type normally lasts. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Worth now and value used up and lost each year should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Deciding whether a repair is worth it.</li></li><li><li>Settling a claim on a damaged appliance.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/appliance-wattage">Appliance wattage</a> <a href="/everyday-life/electricity-cost">Electricity cost</a> <a href="/everyday-life/price-per-unit">Price per unit</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>What it cost to replace</strong> ×10</td><td>560</td><td>5 600</td><td>ten times larger</td></tr><tr><td><strong>Age in years</strong> ×10</td><td>560</td><td>0</td><td>×0</td></tr><tr><td><strong>How long this type normally lasts</strong> ×10</td><td>560</td><td>776</td><td>×1.386</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Appliance Depreciation calculator work out?', 'a' => <<<'TXT'
            It returns worth now and value used up and lost each year from what it cost to replace and age in years and how long this type normally lasts. The relationship is max(What it cost to replace × (1 - Age in years ÷ How long this type normally lasts), 0).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'What it cost to replace ($), Age in years (years), How long this type normally lasts. Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: what it cost to replace in $; age in years in years. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why straight line rather than declining balance?', 'a' => 'Because it is the method a claim and a second-hand price both approximate, and it is the one a person can check in their head.'],
            ['q' => 'Does a repair reset the clock?', 'a' => 'No, but it can extend the practical life. Keep the nominal life and note the repair separately.'],
            ['q' => 'What about a very new appliance?', 'a' => 'Straight line overstates its value: the first year is the steepest fall in the market, whatever the arithmetic says.'],
        ],
        'related' => [
            ['path' => '/everyday-life/appliance-wattage', 'name' => 'Appliance wattage'],
            ['path' => '/everyday-life/electricity-cost', 'name' => 'Electricity cost'],
            ['path' => '/everyday-life/price-per-unit', 'name' => 'Price per unit'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
