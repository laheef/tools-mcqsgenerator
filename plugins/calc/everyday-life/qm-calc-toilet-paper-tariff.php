<?php

/**
 * Toilet Paper Price Calculator
 * /everyday-life/toilet-paper-tariff
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Toilet Paper Price Calculator',
    'meta' => ['title' => 'Toilet Paper Price — Cost per 100 Sheets — Free Tool', 'description' => 'Two packs, two roll counts and two sheet counts reduced to one number: the cost of a hundred sheets, which is the only comparison the shelf label never gives.', 'h1' => 'Toilet Paper Price Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'price_a',
                    'label' => 'Pack A price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '8.99',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rolls_a',
                    'label' => 'Pack A rolls',
                    'type' => 'number',
                    'suffix' => 'rolls',
                    'default' => '12',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sheets_a',
                    'label' => 'Sheets a roll',
                    'type' => 'number',
                    'suffix' => 'sheets',
                    'default' => '200',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price_b',
                    'label' => 'Pack B price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '6.49',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rolls_b',
                    'label' => 'Pack B rolls',
                    'type' => 'number',
                    'suffix' => 'rolls',
                    'default' => '12',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sheets_b',
                    'label' => 'Sheets a roll',
                    'type' => 'number',
                    'suffix' => 'sheets',
                    'default' => '150',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sheets_total_a',
                    'label' => 'Pack A sheets',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'sheets',
                ],
                [
                    'name' => 'sheets_total_b',
                    'label' => 'Pack B sheets',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'sheets',
                ],
                [
                    'name' => 'per100_a',
                    'label' => 'Pack A, per 100 sheets',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'per100_b',
                    'label' => 'Pack B, per 100 sheets',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'diff',
                    'label' => 'A costs more, per 100',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'pct',
                    'label' => 'A is dearer',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
            ],
        ],
    ],
    'formula' => [
        'sheets_total_a' => 'rolls_a * sheets_a',
        'sheets_total_b' => 'rolls_b * sheets_b',
        'per100_a' => 'price_a / (rolls_a * sheets_a) * 100',
        'per100_b' => 'price_b / (rolls_b * sheets_b) * 100',
        'diff' => 'price_a / (rolls_a * sheets_a) * 100 - price_b / (rolls_b * sheets_b) * 100',
        'pct' => '(price_a / (rolls_a * sheets_a) - price_b / (rolls_b * sheets_b)) / (price_a / (rolls_a * sheets_a)) * 100',
    ],
    'article' => [
        'intro' => 'The cost of a hundred sheets in each of two packs, the difference, and the percentage the dearer pack costs more, once rolls and sheets are multiplied out.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Toilet paper is sold by the pack and used by the sheet, and the two pack sizes on a shelf are almost never the same in both. Twelve rolls of two hundred sheets is 2 400; twelve rolls of a hundred and fifty is 1 800 — a quarter less paper in an identical-looking pack.</p><p>Cost per hundred sheets is 37.5 cents against 36.1, so the pack that looks the same and costs 2.50 more is only four per cent dearer rather than thirty-nine. That is the comparison the label avoids.</p><p>The answer is <strong>pack A sheets and pack B sheets and pack A, per 100 sheets and pack B, per 100 sheets and a costs more, per 100 and a is dearer</strong>, worked out from pack A price and pack A rolls and sheets a roll and pack B price and pack B rolls and sheets a roll. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>sheets_total_a</strong></td><td><code>Pack A rolls × Sheets a roll</code></td></tr><tr><td><strong>sheets_total_b</strong></td><td><code>Pack B rolls × Sheets a roll</code></td></tr><tr><td><strong>per100_a</strong></td><td><code>Pack A price ÷ (Pack A rolls × Sheets a roll) × 100</code></td></tr><tr><td><strong>per100_b</strong></td><td><code>Pack B price ÷ (Pack B rolls × Sheets a roll) × 100</code></td></tr><tr><td><strong>diff</strong></td><td><code>Pack A price ÷ (Pack A rolls × Sheets a roll) × 100 - Pack B price ÷ (Pack B rolls × Sheets a roll) × 100</code></td></tr><tr><td><strong>pct</strong></td><td><code>(Pack A price ÷ (Pack A rolls × Sheets a roll) - Pack B price ÷ (Pack B rolls × Sheets a roll)) ÷ (Pack A price ÷ (Pack A rolls × Sheets a roll)) × 100</code></td></tr></tbody></table><p>Rolls times sheets gives the paper in a pack; the price over that, times a hundred, gives the unit price. The percentage is the difference over A's own unit price, so it reads as how much dearer A is than B.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 6 boxes to fill. It reports pack A sheets and pack B sheets and pack A, per 100 sheets and pack B, per 100 sheets and a costs more, per 100 and a is dearer.</p><ul><li><strong>Pack A price</strong> — $.</li><li><strong>Pack A rolls</strong> — rolls.</li><li><strong>Sheets a roll</strong> — sheets.</li><li><strong>Pack B price</strong> — $.</li><li><strong>Pack B rolls</strong> — rolls.</li><li><strong>Sheets a roll</strong> — sheets.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Pack A sheets</strong> — sheets.</li><li><strong>Pack B sheets</strong> — sheets.</li><li><strong>Pack A, per 100 sheets</strong> — $.</li><li><strong>Pack B, per 100 sheets</strong> — $.</li><li><strong>A costs more, per 100</strong> — $.</li><li><strong>A is dearer</strong> — %.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put pack A price = 8.99 $, pack A rolls = 12 rolls, sheets a roll = 200 sheets, pack B price = 6.49 $, pack B rolls = 12 rolls, sheets a roll = 150 sheets into the form and the panel reads:</p><ul><li><strong>Pack A sheets</strong> = <code>Pack A rolls × Sheets a roll</code> = <strong>2 400 sheets</strong></li><li><strong>Pack B sheets</strong> = <code>Pack B rolls × Sheets a roll</code> = <strong>1 800 sheets</strong></li><li><strong>Pack A, per 100 sheets</strong> = <code>Pack A price ÷ (Pack A rolls × Sheets a roll) × 100</code> = <strong>0.375 $</strong></li><li><strong>Pack B, per 100 sheets</strong> = <code>Pack B price ÷ (Pack B rolls × Sheets a roll) × 100</code> = <strong>0.361 $</strong></li><li><strong>A costs more, per 100</strong> = <code>Pack A price ÷ (Pack A rolls × Sheets a roll) × 100 - Pack B price ÷ (Pack B rolls × Sheets a roll) × 100</code> = <strong>0.014 $</strong></li><li><strong>A is dearer</strong> = <code>(Pack A price ÷ (Pack A rolls × Sheets a roll) - Pack B price ÷ (Pack B rolls × Sheets a roll)) ÷ (Pack A price ÷ (Pack A rolls × Sheets a roll)) × 100</code> = <strong>3.745 %</strong></li></ul><p>The roll count is the marketing and the sheet count is the product. A pack of "double rolls" with the same total sheets is a repackaging, not a saving.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>12 × 200</code>, which comes to <strong>2 400 sheets</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>12 rolls of 200 is 2 400 sheets for 8.99, which is 37.5 cents a hundred. 12 rolls of 150 is 1 800 sheets for 6.49, which is 36.1 cents — so the dearer pack is only 3.7 per cent dearer per sheet.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Pack A sheets</th><th>Pack B sheets</th><th>Pack A, per 100 sheets</th><th>Pack B, per 100 sheets</th><th>A costs more, per 100</th><th>A is dearer</th></tr></thead><tbody><tr><td><strong>Pack A price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+267.03 %</td><td>+233.66 %</td></tr><tr><td><strong>Pack A rolls</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td><td>−242.75 %</td><td>−257.03 %</td></tr><tr><td><strong>Sheets a roll</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td><td>−242.75 %</td><td>−257.03 %</td></tr><tr><td><strong>Pack B price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>−257.03 %</td><td>−257.03 %</td></tr><tr><td><strong>Pack B rolls</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>−9.09 %</td><td>+233.66 %</td><td>+233.66 %</td></tr><tr><td><strong>Sheets a roll</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>−9.09 %</td><td>+233.66 %</td><td>+233.66 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Pack A price</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Pack A price</strong> opens at 8.99 $</li><li><strong>Pack A rolls</strong> opens at 12 rolls</li><li><strong>Sheets a roll</strong> opens at 200 sheets</li><li><strong>Pack B price</strong> opens at 6.49 $</li><li><strong>Pack B rolls</strong> opens at 12 rolls</li><li><strong>Sheets a roll</strong> opens at 150 sheets</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Pack A price</th><th>Pack A sheets</th><th>Pack B sheets</th><th>Pack A, per 100 sheets</th><th>Pack B, per 100 sheets</th><th>A costs more, per 100</th><th>A is dearer</th></tr></thead><tbody><tr><td>4.495 $</td><td>2 400</td><td>1 800</td><td>0.187</td><td>0.361</td><td>-0.173</td><td>-92.51</td></tr><tr><td>8.99 $</td><td>2 400</td><td>1 800</td><td>0.375</td><td>0.361</td><td>0.014</td><td>3.745</td></tr><tr><td>17.98 $</td><td>2 400</td><td>1 800</td><td>0.749</td><td>0.361</td><td>0.389</td><td>51.872</td></tr><tr><td>44.95 $</td><td>2 400</td><td>1 800</td><td>1.873</td><td>0.361</td><td>1.512</td><td>80.749</td></tr><tr><td>89.9 $</td><td>2 400</td><td>1 800</td><td>3.746</td><td>0.361</td><td>3.385</td><td>90.374</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set pack A price = 8.99, pack A rolls = 12, sheets a roll = 200, pack B price = 5.99, pack B rolls = 12, sheets a roll = 150: <strong>Pack A sheets</strong> = 2 400 sheets, <strong>Pack B sheets</strong> = 1 800 sheets, <strong>Pack A, per 100 sheets</strong> = 0.375 $, <strong>Pack B, per 100 sheets</strong> = 0.333 $, <strong>A costs more, per 100</strong> = 0.042 $, <strong>A is dearer</strong> = 11.161 %. At 5.99 the smaller pack is 33.3 cents a hundred, so the difference widens to 4.2 cents and A is eleven per cent dearer.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Comparing by roll count.</strong> A jumbo roll can hold twice the sheets of a standard one, and two packs of twelve can differ by 600 sheets.</li><li><strong>Ignoring the sheet size.</strong> A sheet is about 10 by 10 centimetres and the plies differ. Two hundred large three-ply sheets and two hundred small two-ply ones are not the same paper.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Count, not quality.</strong> Sheets differ in size, ply and strength, and the arithmetic cannot see any of it. It answers the pack question, not the product question.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need pack A price and pack A rolls and sheets a roll and pack B price and pack B rolls and sheets a roll. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Pack a sheets and pack b sheets and pack a, per 100 sheets and pack b, per 100 sheets and a costs more, per 100 and a is dearer should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Choosing between two packs on the same shelf.</li></li><li><li>Checking whether a bulk pack is a discount or a repackaging.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/price-per-ounce">Price per ounce</a> <a href="/everyday-life/price-per-unit">Price per unit</a> <a href="/everyday-life/paper-thickness">Paper thickness</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Pack A price</strong> ×10</td><td>2 400</td><td>2 400</td><td>unchanged</td></tr><tr><td><strong>Pack A rolls</strong> ×10</td><td>2 400</td><td>24 000</td><td>ten times larger</td></tr><tr><td><strong>Sheets a roll</strong> ×10</td><td>2 400</td><td>24 000</td><td>ten times larger</td></tr><tr><td><strong>Pack B price</strong> ×10</td><td>2 400</td><td>2 400</td><td>unchanged</td></tr><tr><td><strong>Pack B rolls</strong> ×10</td><td>2 400</td><td>2 400</td><td>unchanged</td></tr><tr><td><strong>Sheets a roll</strong> ×10</td><td>2 400</td><td>2 400</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Toilet Paper Price calculator work out?', 'a' => <<<'TXT'
            It returns pack A sheets and pack B sheets and pack A, per 100 sheets and pack B, per 100 sheets and a costs more, per 100 and a is dearer from pack A price and pack A rolls and sheets a roll and pack B price and pack B rolls and sheets a roll. The relationship is Pack A rolls × Sheets a roll.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Pack A price ($), Pack A rolls (rolls), Sheets a roll (sheets), Pack B price ($), Pack B rolls (rolls), Sheets a roll (sheets). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: pack A price in $; pack A rolls in rolls; sheets a roll in sheets; pack B price in $; pack B rolls in rolls; sheets a roll in sheets. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What is a good price per 100 sheets?', 'a' => <<<'TXT'
            Around 30 to 45 cents in a US supermarket at ordinary prices and under 30 on a good promotion. The absolute number moves with the brand more than with the maths.
            TXT],
            ['q' => 'Do double rolls count as two rolls?', 'a' => 'No. A double roll is a longer roll, and the pack still says twelve. Only the sheet count per roll tells you what is inside.'],
            ['q' => 'Should I compare by weight?', 'a' => 'If the pack gives a weight, yes — it captures size and ply. Most packs do not, which is why the sheet count is the fallback.'],
        ],
        'related' => [
            ['path' => '/everyday-life/price-per-ounce', 'name' => 'Price per ounce'],
            ['path' => '/everyday-life/price-per-unit', 'name' => 'Price per unit'],
            ['path' => '/everyday-life/paper-thickness', 'name' => 'Paper thickness'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
