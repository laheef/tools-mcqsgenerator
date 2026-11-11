<?php

/**
 * Cleaning Cost Calculator
 * /everyday-life/cleaning-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cleaning Cost Calculator',
    'meta' => ['title' => 'Cleaning Cost — Price of a Bottle, Price of a Clean', 'description' => 'A 750 ml bottle at 4.50 with 25 ml a clean is thirty cleans at fifteen cents each. The page that turns a bottle into a cost per use. The formula is shown.', 'h1' => 'Cleaning Cost Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'bottle_price',
                    'label' => 'Bottle price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '4.5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'bottle_ml',
                    'label' => 'Bottle size',
                    'type' => 'number',
                    'suffix' => 'ml',
                    'default' => '750',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'use_ml',
                    'label' => 'Cleaner per clean',
                    'type' => 'number',
                    'suffix' => 'ml',
                    'default' => '25',
                    'help' => 'Twenty-five millilitres is about five sprays of a trigger bottle, or a capful in a bucket of water.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cleans_week',
                    'label' => 'Cleans a week',
                    'type' => 'number',
                    'suffix' => 'cleans',
                    'default' => '2',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cleans',
                    'label' => 'Cleans per bottle',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cleans',
                ],
                [
                    'name' => 'cost_clean',
                    'label' => 'Cost per clean',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'weeks',
                    'label' => 'Weeks a bottle lasts',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'weeks',
                ],
                [
                    'name' => 'cost_year',
                    'label' => 'Cost a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => ['cleans' => 'bottle_ml / use_ml', 'cost_clean' => 'bottle_price * use_ml / bottle_ml', 'weeks' => 'bottle_ml / use_ml / cleans_week', 'cost_year' => 'cleans_week * 52 * (bottle_price * use_ml / bottle_ml)'],
    'article' => [
        'intro' => 'How many cleans a bottle of cleaner contains, what each one costs, how long the bottle lasts at your routine, and what the year comes to.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A bottle of kitchen cleaner is priced as a bottle and used as a spray. Thirty cleans from 750 millilitres, at fifteen cents each, is a different way to look at the four dollars on the receipt — and it makes two brands comparable when one is concentrated and one is not.</p><p>The concentrated bottle costs more and uses a quarter of the liquid, which makes it four times cheaper per clean. That is the comparison the shelf makes impossible by pricing 750 ml and 500 ml in the same size bottle.</p><p>The answer is <strong>cleans per bottle and cost per clean and weeks a bottle lasts and cost a year</strong>, worked out from bottle price and bottle size and cleaner per clean and cleans a week. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>cleans</strong></td><td><code>Bottle size ÷ Cleaner per clean</code></td></tr><tr><td><strong>cost_clean</strong></td><td><code>Bottle price × Cleaner per clean ÷ Bottle size</code></td></tr><tr><td><strong>weeks</strong></td><td><code>Bottle size ÷ Cleaner per clean ÷ Cleans a week</code></td></tr><tr><td><strong>cost_year</strong></td><td><code>Cleans a week × 52 × (Bottle price × Cleaner per clean ÷ Bottle size)</code></td></tr></tbody></table><p>Bottle volume over the amount per clean gives the number of cleans; the price over that count gives the cost of one. Weeks divide by the cleans a week, and the year is that cost times fifty-two weeks of routine.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports cleans per bottle and cost per clean and weeks a bottle lasts and cost a year.</p><ul><li><strong>Bottle price</strong> — $.</li><li><strong>Bottle size</strong> — ml.</li><li><strong>Cleaner per clean</strong> — ml. Twenty-five millilitres is about five sprays of a trigger bottle, or a capful in a bucket of water.</li><li><strong>Cleans a week</strong> — cleans.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Cleans per bottle</strong> — cleans.</li><li><strong>Cost per clean</strong> — $.</li><li><strong>Weeks a bottle lasts</strong> — weeks.</li><li><strong>Cost a year</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put bottle price = 4.5 $, bottle size = 750 ml, cleaner per clean = 25 ml, cleans a week = 2 cleans into the form and the panel reads:</p><ul><li><strong>Cleans per bottle</strong> = <code>Bottle size ÷ Cleaner per clean</code> = <strong>30 cleans</strong></li><li><strong>Cost per clean</strong> = <code>Bottle price × Cleaner per clean ÷ Bottle size</code> = <strong>0.15 $</strong></li><li><strong>Weeks a bottle lasts</strong> = <code>Bottle size ÷ Cleaner per clean ÷ Cleans a week</code> = <strong>15 weeks</strong></li><li><strong>Cost a year</strong> = <code>Cleans a week × 52 × (Bottle price × Cleaner per clean ÷ Bottle size)</code> = <strong>15.6 $</strong></li></ul><p>A concentrated cleaner at 6 for 500 ml, diluted at 10 ml a clean, is 50 cleans at 12 cents — cheaper per clean and dearer per bottle, which is the whole point of the comparison.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>750 ÷ 25</code>, which comes to <strong>30 cleans</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>750 ml at 25 ml a clean is 30 cleans at 15 cents each. At two cleans a week a bottle lasts 15 weeks and the year costs 15.60.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Cleans per bottle</th><th>Cost per clean</th><th>Weeks a bottle lasts</th><th>Cost a year</th></tr></thead><tbody><tr><td><strong>Bottle price</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Bottle size</strong> +10 %</td><td>+10 %</td><td>−9.09 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Cleaner per clean</strong> +10 %</td><td>−9.09 %</td><td>+10 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Cleans a week</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Bottle size</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Bottle price</strong> opens at 4.5 $</li><li><strong>Bottle size</strong> opens at 750 ml</li><li><strong>Cleaner per clean</strong> opens at 25 ml — Twenty-five millilitres is about five sprays of a trigger bottle, or a capful in a bucket of water.</li><li><strong>Cleans a week</strong> opens at 2 cleans</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Bottle price</th><th>Cleans per bottle</th><th>Cost per clean</th><th>Weeks a bottle lasts</th><th>Cost a year</th></tr></thead><tbody><tr><td>2.25 $</td><td>30</td><td>0.075</td><td>15</td><td>7.8</td></tr><tr><td>4.5 $</td><td>30</td><td>0.15</td><td>15</td><td>15.6</td></tr><tr><td>9 $</td><td>30</td><td>0.3</td><td>15</td><td>31.2</td></tr><tr><td>22.5 $</td><td>30</td><td>0.75</td><td>15</td><td>78</td></tr><tr><td>45 $</td><td>30</td><td>1.5</td><td>15</td><td>156</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set bottle price = 6, bottle size = 500, cleaner per clean = 10, cleans a week = 2: <strong>Cleans per bottle</strong> = 50 cleans, <strong>Cost per clean</strong> = 0.12 $, <strong>Weeks a bottle lasts</strong> = 25 weeks, <strong>Cost a year</strong> = 12.48 $. Six dollars for 500 ml at 10 ml a clean is 50 cleans at 12 cents, so the dearer bottle costs 12.48 a year against 15.60.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Comparing bottle prices across sizes.</strong> The 750 ml and the 500 ml are not the same product and the price per clean is the only fair comparison.</li><li><strong>Using more than the label.</strong> Doubling the dose doubles the cost and usually leaves a residue that needs a second wipe. The label rate exists for a reason.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One product, one job.</strong> A cleaning cupboard has six bottles and this is one of them. Run the page for the ones you actually get through.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need bottle price and bottle size and cleaner per clean and cleans a week. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Cleans per bottle and cost per clean and weeks a bottle lasts and cost a year should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Comparing a concentrate with a ready-to-use bottle.</li></li><li><li>Working out whether a refill pouch is worth it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/toothpaste">Toothpaste</a> <a href="/everyday-life/sunscreen-amount">Sunscreen amount</a> <a href="/everyday-life/grocery">Grocery budget</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Bottle price</strong> ×10</td><td>30</td><td>30</td><td>unchanged</td></tr><tr><td><strong>Bottle size</strong> ×10</td><td>30</td><td>300</td><td>ten times larger</td></tr><tr><td><strong>Cleaner per clean</strong> ×10</td><td>30</td><td>3</td><td>ten times smaller</td></tr><tr><td><strong>Cleans a week</strong> ×10</td><td>30</td><td>30</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cleaning Cost calculator work out?', 'a' => <<<'TXT'
            It returns cleans per bottle and cost per clean and weeks a bottle lasts and cost a year from bottle price and bottle size and cleaner per clean and cleans a week. The relationship is Bottle size ÷ Cleaner per clean.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Bottle price ($), Bottle size (ml), Cleaner per clean (ml), Cleans a week (cleans). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: bottle price in $; bottle size in ml; cleaner per clean in ml; cleans a week in cleans. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How many sprays is 25 ml?', 'a' => 'About five on a standard trigger, which is a reasonable dose for a worktop. A mist bottle uses less per press and the field should come down.'],
            ['q' => 'Are refills always cheaper?', 'a' => 'Per millilitre usually, per clean only if they are the same concentration. A refill of a weaker formula can cost more per clean than the original bottle.'],
            ['q' => 'Does homemade cleaner count?', 'a' => <<<'TXT'
            Vinegar and water costs a few cents a litre and works on some surfaces. It is outside this page's arithmetic because the ingredients are sold in different units.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/toothpaste', 'name' => 'Toothpaste'],
            ['path' => '/everyday-life/sunscreen-amount', 'name' => 'Sunscreen amount'],
            ['path' => '/everyday-life/grocery', 'name' => 'Grocery budget'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
