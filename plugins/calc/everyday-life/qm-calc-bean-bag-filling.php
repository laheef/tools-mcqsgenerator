<?php

/**
 * Bean Bag Filling Calculator
 * /everyday-life/bean-bag-filling
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bean Bag Filling Calculator',
    'meta' => ['title' => 'Bean Bag Filling — Litres of Beads for a Cover', 'description' => 'Cover dimensions and a fill level give the litres of beads a bean bag needs, the number of 100-litre bags to order and what the filling costs to buy and top up.', 'h1' => 'Bean Bag Filling Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Cover length',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '80',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Cover width',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '80',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Cover height',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '40',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fill_pct',
                    'label' => 'Fill level',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '60',
                    'help' => 'Fifty per cent is a soft bag that sinks, sixty is the usual, seventy is firm and stays where it is put.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'bag_litres',
                    'label' => 'Filling per bag',
                    'type' => 'number',
                    'suffix' => 'L',
                    'default' => '100',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price_litre',
                    'label' => 'Price per litre',
                    'type' => 'number',
                    'suffix' => '$/L',
                    'default' => '0.12',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume',
                    'label' => 'Cover volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'L',
                ],
                [
                    'name' => 'fill',
                    'label' => 'Beads needed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'L',
                ],
                [
                    'name' => 'bags',
                    'label' => 'Bags to order',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'bags',
                ],
                [
                    'name' => 'cost',
                    'label' => 'Cost of filling',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => ['volume' => 'length * width * height / 1000', 'fill' => 'length * width * height / 1000 * fill_pct / 100', 'bags' => 'ceil(length * width * height / 1000 * fill_pct / 100 / bag_litres)', 'cost' => 'length * width * height / 1000 * fill_pct / 100 * price_litre'],
    'article' => [
        'intro' => 'The volume of a bean bag cover, the beads needed to fill it to the right firmness, how many bags of filling that is, and the cost at a price per litre.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A bean bag is a box of air with beads in it, and nobody wants a box of air. An 80 by 80 by 40 centimetre cover is 256 litres, and at sixty per cent fill it takes 153.6 litres of beads — a bag and a half of the 100-litre sacks.</p><p>Order two and keep the spare for the top-up, because beads compress by ten to twenty per cent in the first month and every bean bag in a living room is half a bag short after a year.</p><p>The answer is <strong>cover volume and beads needed and bags to order and cost of filling</strong>, worked out from cover length and cover width and cover height and fill level and filling per bag and price per litre. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>volume</strong></td><td><code>Cover length × Cover width × Cover height ÷ 1000</code></td></tr><tr><td><strong>fill</strong></td><td><code>Cover length × Cover width × Cover height ÷ 1000 × Fill level ÷ 100</code></td></tr><tr><td><strong>bags</strong></td><td><code>ceil(Cover length × Cover width × Cover height ÷ 1000 × Fill level ÷ 100 ÷ Filling per bag)</code></td></tr><tr><td><strong>cost</strong></td><td><code>Cover length × Cover width × Cover height ÷ 1000 × Fill level ÷ 100 × Price per litre</code></td></tr></tbody></table><p>Length times width times height in centimetres is cubic centimetres, and a thousand of those is a litre. The fill level takes a share of that, and the bags figure rounds up because a bag is bought whole.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 6 boxes to fill. It reports cover volume and beads needed and bags to order and cost of filling.</p><ul><li><strong>Cover length</strong> — cm.</li><li><strong>Cover width</strong> — cm.</li><li><strong>Cover height</strong> — cm.</li><li><strong>Fill level</strong> — %. Fifty per cent is a soft bag that sinks, sixty is the usual, seventy is firm and stays where it is put.</li><li><strong>Filling per bag</strong> — L.</li><li><strong>Price per litre</strong> — $/L.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Cover volume</strong> — L.</li><li><strong>Beads needed</strong> — L.</li><li><strong>Bags to order</strong> — bags.</li><li><strong>Cost of filling</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put cover length = 80 cm, cover width = 80 cm, cover height = 40 cm, fill level = 60 %, filling per bag = 100 L, price per litre = 0.12 $/L into the form and the panel reads:</p><ul><li><strong>Cover volume</strong> = <code>Cover length × Cover width × Cover height ÷ 1000</code> = <strong>256 L</strong></li><li><strong>Beads needed</strong> = <code>Cover length × Cover width × Cover height ÷ 1000 × Fill level ÷ 100</code> = <strong>153.6 L</strong></li><li><strong>Bags to order</strong> = <code>ceil(Cover length × Cover width × Cover height ÷ 1000 × Fill level ÷ 100 ÷ Filling per bag)</code> = <strong>2 bags</strong></li><li><strong>Cost of filling</strong> = <code>Cover length × Cover width × Cover height ÷ 1000 × Fill level ÷ 100 × Price per litre</code> = <strong>18.432 $</strong></li></ul><p>At fifty per cent the same cover needs 128 litres and two bags still, which is why the fill level changes the comfort more than the order.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>80 × 80 × 40 ÷ 1000</code>, which comes to <strong>256 L</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>80 by 80 by 40 is 256 litres, and at sixty per cent fill that is 153.6 litres: two bags of 100, costing 18.43 at 12 cents a litre.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Cover volume</th><th>Beads needed</th><th>Bags to order</th><th>Cost of filling</th></tr></thead><tbody><tr><td><strong>Cover length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Cover width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Cover height</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Fill level</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Filling per bag</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Price per litre</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Cover length</strong>. <strong>Filling per bag</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Cover length</strong> opens at 80 cm</li><li><strong>Cover width</strong> opens at 80 cm</li><li><strong>Cover height</strong> opens at 40 cm</li><li><strong>Fill level</strong> opens at 60 % — Fifty per cent is a soft bag that sinks, sixty is the usual, seventy is firm and stays where it is put.</li><li><strong>Filling per bag</strong> opens at 100 L</li><li><strong>Price per litre</strong> opens at 0.12 $/L</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Cover length</th><th>Cover volume</th><th>Beads needed</th><th>Bags to order</th><th>Cost of filling</th></tr></thead><tbody><tr><td>40 cm</td><td>128</td><td>76.8</td><td>1</td><td>9.216</td></tr><tr><td>80 cm</td><td>256</td><td>153.6</td><td>2</td><td>18.432</td></tr><tr><td>160 cm</td><td>512</td><td>307.2</td><td>4</td><td>36.864</td></tr><tr><td>400 cm</td><td>1 280</td><td>768</td><td>8</td><td>92.16</td></tr><tr><td>800 cm</td><td>2 560</td><td>1 536</td><td>16</td><td>184.32</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set cover length = 80, cover width = 80, cover height = 40, fill level = 50, filling per bag = 100, price per litre = 0.12: <strong>Cover volume</strong> = 256 L, <strong>Beads needed</strong> = 128 L, <strong>Bags to order</strong> = 2 bags, <strong>Cost of filling</strong> = 15.36 $. At fifty per cent the cover takes 128 litres and costs 15.36 — the same two bags with 72 litres of spare.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Filling to capacity.</strong> A bean bag full to the brim is a rock. Sixty per cent is the figure that lets it mould to a person without collapsing.</li><li><strong>Forgetting the shape is not a box.</strong> Most covers are sewn to a rounded shape, so the true volume is less than length times width times height. The beads settle and the spare bag is the answer.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Rectangular cover.</strong> A teardrop bag or one with a curved back has a smaller volume for the same dimensions and needs ten to twenty per cent less filling.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need cover length and cover width and cover height and fill level and filling per bag and price per litre. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Cover volume and beads needed and bags to order and cost of filling should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Reordering beads for a flat bean bag.</li></li><li><li>Sizing a cover before buying filling for it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/helium-balloons">Helium balloons</a> <a href="/everyday-life/rug-size">Rug size</a> <a href="/everyday-life/price-per-unit">Price per unit</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Cover length</strong> ×10</td><td>256</td><td>2 560</td><td>ten times larger</td></tr><tr><td><strong>Cover width</strong> ×10</td><td>256</td><td>2 560</td><td>ten times larger</td></tr><tr><td><strong>Cover height</strong> ×10</td><td>256</td><td>2 560</td><td>ten times larger</td></tr><tr><td><strong>Fill level</strong> ×10</td><td>256</td><td>256</td><td>unchanged</td></tr><tr><td><strong>Filling per bag</strong> ×10</td><td>256</td><td>256</td><td>unchanged</td></tr><tr><td><strong>Price per litre</strong> ×10</td><td>256</td><td>256</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bean Bag Filling calculator work out?', 'a' => <<<'TXT'
            It returns cover volume and beads needed and bags to order and cost of filling from cover length and cover width and cover height and fill level and filling per bag and price per litre. The relationship is Cover length × Cover width × Cover height ÷ 1000.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Cover length (cm), Cover width (cm), Cover height (cm), Fill level (%), Filling per bag (L), Price per litre ($/L). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: cover length in cm; cover width in cm; cover height in cm; fill level in %; filling per bag in L; price per litre in $/L. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How many litres of beads does a bean bag need?', 'a' => 'Between 100 and 200 for a full-size adult bag, depending on its dimensions and how firm you like it. A child\'s bag is nearer 60.'],
            ['q' => 'Why does a bean bag go flat?', 'a' => 'The beads compress under weight and the cover stretches. Topping up ten per cent every year restores it, which is why the spare bag is not waste.'],
            ['q' => 'Are polystyrene beads sold by weight or volume?', 'a' => 'Both, and the density is about 10 to 15 grams a litre. A 100-litre bag is roughly a kilogram, so a supplier quoting kilos needs the conversion.'],
        ],
        'related' => [
            ['path' => '/everyday-life/helium-balloons', 'name' => 'Helium balloons'],
            ['path' => '/everyday-life/rug-size', 'name' => 'Rug size'],
            ['path' => '/everyday-life/price-per-unit', 'name' => 'Price per unit'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
