<?php

/**
 * Price per Ounce Calculator
 * /everyday-life/price-per-ounce
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Price per Ounce Calculator',
    'meta' => ['title' => 'Price per Ounce — Which Pack Is Actually Cheaper', 'description' => 'Two packs, two prices, two weights: the price of an ounce of each and the gap between them, so the shelf comparison stops being a guess. The formula is shown.', 'h1' => 'Price per Ounce Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'cost_a',
                    'label' => 'Pack A price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '4.99',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'oz_a',
                    'label' => 'Pack A weight',
                    'type' => 'number',
                    'suffix' => 'oz',
                    'default' => '12',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cost_b',
                    'label' => 'Pack B price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '8.49',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'oz_b',
                    'label' => 'Pack B weight',
                    'type' => 'number',
                    'suffix' => 'oz',
                    'default' => '24',
                    'help' => 'The net weight, not the gross. A box that weighs 26 ounces with 2 ounces of cardboard holds 24.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'unit_a',
                    'label' => 'Pack A, per ounce',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/oz',
                ],
                [
                    'name' => 'unit_b',
                    'label' => 'Pack B, per ounce',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/oz',
                ],
                [
                    'name' => 'diff',
                    'label' => 'B saves, per ounce',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/oz',
                ],
                [
                    'name' => 'pct',
                    'label' => 'B saves',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'pound_a',
                    'label' => 'Pack A, per pound',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/lb',
                ],
                [
                    'name' => 'pound_b',
                    'label' => 'Pack B, per pound',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/lb',
                ],
            ],
        ],
    ],
    'formula' => [
        'unit_a' => 'cost_a / oz_a',
        'unit_b' => 'cost_b / oz_b',
        'diff' => 'cost_a / oz_a - cost_b / oz_b',
        'pct' => '(cost_a / oz_a - cost_b / oz_b) / (cost_a / oz_a) * 100',
        'pound_a' => 'cost_a / oz_a * 16',
        'pound_b' => 'cost_b / oz_b * 16',
    ],
    'article' => [
        'intro' => 'The price of one ounce of each of two packs, the difference per ounce, and the same two figures per pound, which is the unit most American labels use.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A shelf holds the same coffee in a twelve-ounce bag at 4.99 and a twenty-four-ounce bag at 8.49, and the big bag is not quite half the price of the small one per ounce. It is close, and close is where people buy the wrong side of the comparison and never find out.</p><p>Divide price by ounces and the two packs sit on the same line. Four and a half cents a gram is a sentence that means something in a shop; "the big one looks better value" is a mood.</p><p>The answer is <strong>pack A, per ounce and pack B, per ounce and b saves, per ounce and b saves and pack A, per pound and pack B, per pound</strong>, worked out from pack A price and pack A weight and pack B price and pack B weight. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>unit_a</strong></td><td><code>Pack A price ÷ Pack A weight</code></td></tr><tr><td><strong>unit_b</strong></td><td><code>Pack B price ÷ Pack B weight</code></td></tr><tr><td><strong>diff</strong></td><td><code>Pack A price ÷ Pack A weight - Pack B price ÷ Pack B weight</code></td></tr><tr><td><strong>pct</strong></td><td><code>(Pack A price ÷ Pack A weight - Pack B price ÷ Pack B weight) ÷ (Pack A price ÷ Pack A weight) × 100</code></td></tr><tr><td><strong>pound_a</strong></td><td><code>Pack A price ÷ Pack A weight × 16</code></td></tr><tr><td><strong>pound_b</strong></td><td><code>Pack B price ÷ Pack B weight × 16</code></td></tr></tbody></table><p>Price divided by net weight, twice. The difference is one taken from the other, and the percentage is that difference over the dearer pack's own unit price, so the answer reads as the share of the shelf price you stop paying.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports pack A, per ounce and pack B, per ounce and b saves, per ounce and b saves and pack A, per pound and pack B, per pound.</p><ul><li><strong>Pack A price</strong> — $.</li><li><strong>Pack A weight</strong> — oz.</li><li><strong>Pack B price</strong> — $.</li><li><strong>Pack B weight</strong> — oz. The net weight, not the gross. A box that weighs 26 ounces with 2 ounces of cardboard holds 24.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Pack A, per ounce</strong> — $/oz.</li><li><strong>Pack B, per ounce</strong> — $/oz.</li><li><strong>B saves, per ounce</strong> — $/oz.</li><li><strong>B saves</strong> — %.</li><li><strong>Pack A, per pound</strong> — $/lb.</li><li><strong>Pack B, per pound</strong> — $/lb.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put pack A price = 4.99 $, pack A weight = 12 oz, pack B price = 8.49 $, pack B weight = 24 oz into the form and the panel reads:</p><ul><li><strong>Pack A, per ounce</strong> = <code>Pack A price ÷ Pack A weight</code> = <strong>0.416 $/oz</strong></li><li><strong>Pack B, per ounce</strong> = <code>Pack B price ÷ Pack B weight</code> = <strong>0.354 $/oz</strong></li><li><strong>B saves, per ounce</strong> = <code>Pack A price ÷ Pack A weight - Pack B price ÷ Pack B weight</code> = <strong>0.062 $/oz</strong></li><li><strong>B saves</strong> = <code>(Pack A price ÷ Pack A weight - Pack B price ÷ Pack B weight) ÷ (Pack A price ÷ Pack A weight) × 100</code> = <strong>14.93 %</strong></li><li><strong>Pack A, per pound</strong> = <code>Pack A price ÷ Pack A weight × 16</code> = <strong>6.653 $/lb</strong></li><li><strong>Pack B, per pound</strong> = <code>Pack B price ÷ Pack B weight × 16</code> = <strong>5.66 $/lb</strong></li></ul><p>A negative difference means the second pack is dearer per ounce. The page will not stop you putting the more expensive box in the B slot, and the sign is how you notice.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>4.99 ÷ 12</code>, which comes to <strong>0.416 $/oz</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Twelve ounces for 4.99 is 41.6 cents an ounce; twenty-four ounces for 8.49 is 35.4 cents, so the larger bag saves 6.2 cents an ounce, or fourteen point nine per cent, and both figures multiply up to 6.65 and 5.66 a pound.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Pack A, per ounce</th><th>Pack B, per ounce</th><th>B saves, per ounce</th><th>B saves</th><th>Pack A, per pound</th><th>Pack B, per pound</th></tr></thead><tbody><tr><td><strong>Pack A price</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+66.98 %</td><td>+51.8 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Pack A weight</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>−60.89 %</td><td>−56.98 %</td><td>−9.09 %</td><td>+0 %</td></tr><tr><td><strong>Pack B price</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>−56.98 %</td><td>−56.98 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Pack B weight</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>+51.8 %</td><td>+51.8 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Pack A price</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Pack A price</strong> opens at 4.99 $</li><li><strong>Pack A weight</strong> opens at 12 oz</li><li><strong>Pack B price</strong> opens at 8.49 $</li><li><strong>Pack B weight</strong> opens at 24 oz — The net weight, not the gross. A box that weighs 26 ounces with 2 ounces of cardboard holds 24.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Pack A price</th><th>Pack A, per ounce</th><th>Pack B, per ounce</th><th>B saves, per ounce</th><th>B saves</th><th>Pack A, per pound</th><th>Pack B, per pound</th></tr></thead><tbody><tr><td>2.495 $</td><td>0.208</td><td>0.354</td><td>-0.146</td><td>-70.14</td><td>3.327</td><td>5.66</td></tr><tr><td>4.99 $</td><td>0.416</td><td>0.354</td><td>0.062</td><td>14.93</td><td>6.653</td><td>5.66</td></tr><tr><td>9.98 $</td><td>0.832</td><td>0.354</td><td>0.478</td><td>57.465</td><td>13.307</td><td>5.66</td></tr><tr><td>24.95 $</td><td>2.079</td><td>0.354</td><td>1.725</td><td>82.986</td><td>33.267</td><td>5.66</td></tr><tr><td>49.9 $</td><td>4.158</td><td>0.354</td><td>3.805</td><td>91.493</td><td>66.533</td><td>5.66</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set pack A price = 3.99, pack A weight = 8, pack B price = 8.49, pack B weight = 24: <strong>Pack A, per ounce</strong> = 0.499 $/oz, <strong>Pack B, per ounce</strong> = 0.354 $/oz, <strong>B saves, per ounce</strong> = 0.145 $/oz, <strong>B saves</strong> = 29.073 %, <strong>Pack A, per pound</strong> = 7.98 $/lb, <strong>Pack B, per pound</strong> = 5.66 $/lb. An eight-ounce bag at 3.99 is 49.9 cents an ounce, so the saving on the large pack grows to 14.5 cents an ounce, or twenty-nine per cent.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Comparing the shelf price.</strong> A bigger box costs more and is cheaper. The two facts are not in conflict, and only one of them is the one you are shopping for.</li><li><strong>Using the gross weight.</strong> The box, the tray and the plastic add ounces that nobody eats. The net weight is printed in small type beside the gross.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Packaging waste is not priced.</strong> A 24-ounce bag uses less plastic per ounce, and this page leaves that out because it is not on the price label.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need pack A price and pack A weight and pack B price and pack B weight. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Pack a, per ounce and pack b, per ounce and b saves, per ounce and b saves and pack a, per pound and pack b, per pound should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Coffee, cereal and pasta, where the pack sizes switch between 12 and 24 ounces.</li></li><li><li>Spices, where the small jar is almost never the cheap one per ounce.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/price-per-pound">Price per pound</a> <a href="/everyday-life/price-per-weight">Price per weight</a> <a href="/everyday-life/price-per-unit">Price per unit</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Pack A price</strong> ×10</td><td>0.416</td><td>4.158</td><td>ten times larger</td></tr><tr><td><strong>Pack A weight</strong> ×10</td><td>0.416</td><td>0.042</td><td>ten times smaller</td></tr><tr><td><strong>Pack B price</strong> ×10</td><td>0.416</td><td>0.416</td><td>unchanged</td></tr><tr><td><strong>Pack B weight</strong> ×10</td><td>0.416</td><td>0.416</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Price per Ounce calculator work out?', 'a' => <<<'TXT'
            It returns pack A, per ounce and pack B, per ounce and b saves, per ounce and b saves and pack A, per pound and pack B, per pound from pack A price and pack A weight and pack B price and pack B weight. The relationship is Pack A price ÷ Pack A weight.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Pack A price ($), Pack A weight (oz), Pack B price ($), Pack B weight (oz). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: pack A price in $; pack A weight in oz; pack B price in $; pack B weight in oz. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Which pack is cheaper per ounce when both prices end in .99?', 'a' => <<<'TXT'
            The one with the lower price divided by its ounces, which is rarely the one with the lower price. The trailing 99 is a pricing habit and carries no information about value.
            TXT],
            ['q' => 'Why show the price per pound as well?', 'a' => <<<'TXT'
            Because meat, cheese and dry goods in the United States are labelled per pound, and sixteen ounces make a pound. The two numbers are the same fact in the two units the shop uses.
            TXT],
            ['q' => 'Does the difference matter on small packs?', 'a' => 'On a six-dollar purchase the gap is often under fifty cents. Multiply by the number of packs bought in a year and the same gap turns into a monthly line.'],
        ],
        'related' => [
            ['path' => '/everyday-life/price-per-pound', 'name' => 'Price per pound'],
            ['path' => '/everyday-life/price-per-weight', 'name' => 'Price per weight'],
            ['path' => '/everyday-life/price-per-unit', 'name' => 'Price per unit'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
