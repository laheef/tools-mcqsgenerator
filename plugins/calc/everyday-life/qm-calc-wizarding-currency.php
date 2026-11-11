<?php

/**
 * Wizarding Currency Calculator
 * /everyday-life/wizarding-currency
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Wizarding Currency Calculator',
    'meta' => ['title' => 'Wizarding Currency — Galleons, Sickles and Knuts', 'description' => 'Seventeen Sickles to a Galleon and twenty-nine Knuts to a Sickle: the conversion, the coin count and what a purse is worth in pounds at a stated rate.', 'h1' => 'Wizarding Currency Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'galleons',
                    'label' => 'Galleons',
                    'type' => 'number',
                    'suffix' => 'G',
                    'default' => '10',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rate',
                    'label' => 'Pounds per Galleon',
                    'type' => 'number',
                    'suffix' => '£',
                    'default' => '4.93',
                    'help' => 'There is no official rate. Five pounds a Galleon is the figure most calculations use, and the films\' prop budget suggests something similar.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sickles',
                    'label' => 'Extra Sickles',
                    'type' => 'number',
                    'suffix' => 'S',
                    'default' => '0',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'knuts',
                    'label' => 'Extra Knuts',
                    'type' => 'number',
                    'suffix' => 'K',
                    'default' => '0',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'total_sickles',
                    'label' => 'Sickles in all',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'S',
                ],
                [
                    'name' => 'total_knuts',
                    'label' => 'Knuts in all',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'K',
                ],
                [
                    'name' => 'pounds',
                    'label' => 'Worth in pounds',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '£',
                ],
                [
                    'name' => 'coins',
                    'label' => 'Coins in the purse',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'coins',
                ],
            ],
        ],
    ],
    'formula' => ['total_sickles' => 'galleons * 17 + sickles', 'total_knuts' => '(galleons * 17 + sickles) * 29 + knuts', 'pounds' => 'galleons * rate + sickles * rate / 17 + knuts * rate / 493', 'coins' => 'galleons + sickles + knuts'],
    'article' => [
        'intro' => 'A purse of Galleons converted into Sickles and Knuts, the total number of coins, and what the gold is worth in ordinary money at a rate you choose.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Wizarding money is a base-seventeen system wearing a base-twenty-nine underneath: seventeen Sickles to a Galleon, twenty-nine Knuts to a Sickle, and therefore 493 Knuts to a Galleon.</p><p>That is why the coins are hard to add up and why a purse of ten Galleons is 170 Sickles or 4 930 Knuts. Converting to pounds needs a rate that does not exist, so the page takes yours: at 4.93 a Galleon, ten is 49.30.</p><p>The answer is <strong>sickles in all and knuts in all and worth in pounds and coins in the purse</strong>, worked out from galleons and pounds per Galleon and extra Sickles and extra Knuts. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>total_sickles</strong></td><td><code>Galleons × 17 + Extra Sickles</code></td></tr><tr><td><strong>total_knuts</strong></td><td><code>(Galleons × 17 + Extra Sickles) × 29 + Extra Knuts</code></td></tr><tr><td><strong>pounds</strong></td><td><code>Galleons × Pounds per Galleon + Extra Sickles × Pounds per Galleon ÷ 17 + Extra Knuts × Pounds per Galleon ÷ 493</code></td></tr><tr><td><strong>coins</strong></td><td><code>Galleons + Extra Sickles + Extra Knuts</code></td></tr></tbody></table><p>Galleons times seventeen plus Sickles gives Sickles; times twenty-nine again gives Knuts. Pounds use the same rates in reverse on the chosen Galleon price, and the coin count is simply how many pieces of metal are in the purse.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports sickles in all and knuts in all and worth in pounds and coins in the purse.</p><ul><li><strong>Galleons</strong> — G.</li><li><strong>Pounds per Galleon</strong> — £. There is no official rate. Five pounds a Galleon is the figure most calculations use, and the films&#x27; prop budget suggests something similar.</li><li><strong>Extra Sickles</strong> — S.</li><li><strong>Extra Knuts</strong> — K.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Sickles in all</strong> — S.</li><li><strong>Knuts in all</strong> — K.</li><li><strong>Worth in pounds</strong> — £.</li><li><strong>Coins in the purse</strong> — coins.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put galleons = 10 G, pounds per Galleon = 4.93 £, extra Sickles = 0 S, extra Knuts = 0 K into the form and the panel reads:</p><ul><li><strong>Sickles in all</strong> = <code>Galleons × 17 + Extra Sickles</code> = <strong>170 S</strong></li><li><strong>Knuts in all</strong> = <code>(Galleons × 17 + Extra Sickles) × 29 + Extra Knuts</code> = <strong>4 930 K</strong></li><li><strong>Worth in pounds</strong> = <code>Galleons × Pounds per Galleon + Extra Sickles × Pounds per Galleon ÷ 17 + Extra Knuts × Pounds per Galleon ÷ 493</code> = <strong>49.3 £</strong></li><li><strong>Coins in the purse</strong> = <code>Galleons + Extra Sickles + Extra Knuts</code> = <strong>10 coins</strong></li></ul><p>A Sickle is a seventeenth of a Galleon, about 29 pence, and a Knut is about a penny. Which makes a Butterbeer at two Sickles a bargain and a Firebolt absurd.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>10 × 17 + 0</code>, which comes to <strong>170 S</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Ten Galleons is 170 Sickles and 4 930 Knuts — ten coins in the purse if nothing is changed up, and 49.30 in pounds at 4.93.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Sickles in all</th><th>Knuts in all</th><th>Worth in pounds</th><th>Coins in the purse</th></tr></thead><tbody><tr><td><strong>Galleons</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Pounds per Galleon</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Extra Sickles</strong> +10 %</td><td>+0.06 %</td><td>+0.06 %</td><td>+0.06 %</td><td>+1 %</td></tr><tr><td><strong>Extra Knuts</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+1 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Pounds per Galleon</strong>. <strong>Extra Knuts</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Galleons</strong> opens at 10 G</li><li><strong>Pounds per Galleon</strong> opens at 4.93 £ — There is no official rate. Five pounds a Galleon is the figure most calculations use, and the films&#x27; prop budget suggests something similar.</li><li><strong>Extra Sickles</strong> opens at 0 S</li><li><strong>Extra Knuts</strong> opens at 0 K</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Galleons</th><th>Sickles in all</th><th>Knuts in all</th><th>Worth in pounds</th><th>Coins in the purse</th></tr></thead><tbody><tr><td>5 G</td><td>85</td><td>2 465</td><td>24.65</td><td>5</td></tr><tr><td>10 G</td><td>170</td><td>4 930</td><td>49.3</td><td>10</td></tr><tr><td>20 G</td><td>340</td><td>9 860</td><td>98.6</td><td>20</td></tr><tr><td>50 G</td><td>850</td><td>24 650</td><td>246.5</td><td>50</td></tr><tr><td>100 G</td><td>1 700</td><td>49 300</td><td>493</td><td>100</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set galleons = 10, pounds per Galleon = 5, extra Sickles = 3, extra Knuts = 12: <strong>Sickles in all</strong> = 173 S, <strong>Knuts in all</strong> = 5 029 K, <strong>Worth in pounds</strong> = 51.004 £, <strong>Coins in the purse</strong> = 25 coins. Ten Galleons, three Sickles and twelve Knuts is 173 Sickles or 5 029 Knuts, twenty-five coins, and 51.00 in pounds at five to the Galleon.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using decimals of a Galleon.</strong> There is no such thing as 0.6 Galleons in change; the coins are seventeen and twenty-nine, which is the whole joke about wizards and arithmetic.</li><li><strong>Trusting a fixed exchange rate.</strong> Every published figure is an estimate from the books' prices. Change the rate box and every answer moves with it.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Coins only.</strong> Vault balances, interest at Gringotts and the relative value of goblin-made silver are outside a currency converter.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need galleons and pounds per Galleon and extra Sickles and extra Knuts. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Sickles in all and knuts in all and worth in pounds and coins in the purse should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Costing a Harry Potter party in Galleons and back.</li></li><li><li>Settling an argument about what a Sickle is worth.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/money-weight">Money weight</a> <a href="/everyday-life/price-per-unit">Price per unit</a> <a href="/everyday-life/tickets">Concert tickets</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Galleons</strong> ×10</td><td>170</td><td>1 700</td><td>ten times larger</td></tr><tr><td><strong>Pounds per Galleon</strong> ×10</td><td>170</td><td>170</td><td>unchanged</td></tr><tr><td><strong>Extra Sickles</strong> ×10</td><td>170</td><td>171</td><td>×1.006</td></tr><tr><td><strong>Extra Knuts</strong> ×10</td><td>170</td><td>170</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Wizarding Currency calculator work out?', 'a' => <<<'TXT'
            It returns sickles in all and knuts in all and worth in pounds and coins in the purse from galleons and pounds per Galleon and extra Sickles and extra Knuts. The relationship is Galleons × 17 + Extra Sickles.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Galleons (G), Pounds per Galleon (£), Extra Sickles (S), Extra Knuts (K). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: galleons in G; pounds per Galleon in £; extra Sickles in S; extra Knuts in K. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How many Knuts are in a Galleon?', 'a' => '493: seventeen Sickles at twenty-nine Knuts each. It is a prime times a prime, which is why the arithmetic is unpleasant by design.'],
            ['q' => 'What is a Galleon worth?', 'a' => 'About five pounds is the usual estimate, derived from the price of a wand and a Butterbeer in the books. Nothing official exists.'],
            ['q' => 'Why seventeen and twenty-nine?', 'a' => <<<'TXT'
            Because Rowling wanted a system that felt foreign and old, and pre-decimal British money was itself twelve and twenty. The primes make mental arithmetic hard on purpose.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/money-weight', 'name' => 'Money weight'],
            ['path' => '/everyday-life/price-per-unit', 'name' => 'Price per unit'],
            ['path' => '/everyday-life/tickets', 'name' => 'Concert tickets'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
