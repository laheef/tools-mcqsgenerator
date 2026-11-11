<?php

/**
 * Price per Unit Calculator
 * /everyday-life/price-per-unit
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Price per Unit Calculator',
    'meta' => ['title' => 'Price per Unit — Three Packs, One Winner — Free Tool', 'description' => 'Three packs, three prices and three counts: the cost of a single unit in each, the cheapest of the three, and how wide the spread runs. The formula is shown.', 'h1' => 'Price per Unit Calculator', 'updated' => '2026-10-23'],
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
                    'name' => 'qty_a',
                    'label' => 'Pack A count',
                    'type' => 'number',
                    'suffix' => 'items',
                    'default' => '6',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cost_b',
                    'label' => 'Pack B price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '8.99',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'qty_b',
                    'label' => 'Pack B count',
                    'type' => 'number',
                    'suffix' => 'items',
                    'default' => '12',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cost_c',
                    'label' => 'Pack C price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '15.99',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'qty_c',
                    'label' => 'Pack C count',
                    'type' => 'number',
                    'suffix' => 'items',
                    'default' => '24',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'unit_a',
                    'label' => 'Pack A, per item',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'unit_b',
                    'label' => 'Pack B, per item',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'unit_c',
                    'label' => 'Pack C, per item',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'best',
                    'label' => 'Cheapest per item',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'spread',
                    'label' => 'Dearest minus cheapest',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'spread_pct',
                    'label' => 'Spread',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
            ],
        ],
    ],
    'formula' => [
        'unit_a' => 'cost_a / qty_a',
        'unit_b' => 'cost_b / qty_b',
        'unit_c' => 'cost_c / qty_c',
        'best' => 'min(cost_a / qty_a, cost_b / qty_b, cost_c / qty_c)',
        'spread' => 'max(cost_a / qty_a, cost_b / qty_b, cost_c / qty_c) - min(cost_a / qty_a, cost_b / qty_b, cost_c / qty_c)',
        'spread_pct' => <<<'TXT'
        (max(cost_a / qty_a, cost_b / qty_b, cost_c / qty_c) - min(cost_a / qty_a, cost_b / qty_b, cost_c / qty_c)) / max(cost_a / qty_a, cost_b / qty_b, cost_c / qty_c) * 100
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        The cost of one item in each of three multibuys, which of the three is cheapest per unit, and the gap between the best and the worst, which is the money a bad choice costs.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Supermarkets price the same item at 4.99 for six, 8.99 for twelve and 15.99 for twenty-four, and the middle size is often the worst value. That is not an accident: it is the size the shopper reaches for without doing the division.</p><p>Three divisions put the packs in order — 0.832, 0.749, 0.666 — and the gap between best and worst is 0.166 an item, twenty per cent. On a weekly shop that is the difference between the sizes you think you are choosing between.</p><p>The answer is <strong>pack A, per item and pack B, per item and pack C, per item and cheapest per item and dearest minus cheapest and spread</strong>, worked out from pack A price and pack A count and pack B price and pack B count and pack C price and pack C count. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>unit_a</strong></td><td><code>Pack A price ÷ Pack A count</code></td></tr><tr><td><strong>unit_b</strong></td><td><code>Pack B price ÷ Pack B count</code></td></tr><tr><td><strong>unit_c</strong></td><td><code>Pack C price ÷ Pack C count</code></td></tr><tr><td><strong>best</strong></td><td><code>min(Pack A price ÷ Pack A count, Pack B price ÷ Pack B count, Pack C price ÷ Pack C count)</code></td></tr><tr><td><strong>spread</strong></td><td><code>max(Pack A price ÷ Pack A count, Pack B price ÷ Pack B count, Pack C price ÷ Pack C count) - min(Pack A price ÷ Pack A count, Pack B price ÷ Pack B count, Pack C price ÷ Pack C count)</code></td></tr><tr><td><strong>spread_pct</strong></td><td><code>(max(Pack A price ÷ Pack A count, Pack B price ÷ Pack B count, Pack C price ÷ Pack C count) - min(Pack A price ÷ Pack A count, Pack B price ÷ Pack B count, Pack C price ÷ Pack C count)) ÷ max(Pack A price ÷ Pack A count, Pack B price ÷ Pack B count, Pack C price ÷ Pack C count) × 100</code></td></tr></tbody></table><p>Each pack's price over its count. The best line is the smallest of the three and the spread is the largest minus the smallest, so the answer is the penalty for picking the wrong pack rather than a comparison against an average.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 6 boxes to fill. It reports pack A, per item and pack B, per item and pack C, per item and cheapest per item and dearest minus cheapest and spread.</p><ul><li><strong>Pack A price</strong> — $.</li><li><strong>Pack A count</strong> — items.</li><li><strong>Pack B price</strong> — $.</li><li><strong>Pack B count</strong> — items.</li><li><strong>Pack C price</strong> — $.</li><li><strong>Pack C count</strong> — items.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Pack A, per item</strong> — $.</li><li><strong>Pack B, per item</strong> — $.</li><li><strong>Pack C, per item</strong> — $.</li><li><strong>Cheapest per item</strong> — $.</li><li><strong>Dearest minus cheapest</strong> — $.</li><li><strong>Spread</strong> — %.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put pack A price = 4.99 $, pack A count = 6 items, pack B price = 8.99 $, pack B count = 12 items, pack C price = 15.99 $, pack C count = 24 items into the form and the panel reads:</p><ul><li><strong>Pack A, per item</strong> = <code>Pack A price ÷ Pack A count</code> = <strong>0.832 $</strong></li><li><strong>Pack B, per item</strong> = <code>Pack B price ÷ Pack B count</code> = <strong>0.749 $</strong></li><li><strong>Pack C, per item</strong> = <code>Pack C price ÷ Pack C count</code> = <strong>0.666 $</strong></li><li><strong>Cheapest per item</strong> = <code>min(Pack A price ÷ Pack A count, Pack B price ÷ Pack B count, Pack C price ÷ Pack C count)</code> = <strong>0.666 $</strong></li><li><strong>Dearest minus cheapest</strong> = <code>max(Pack A price ÷ Pack A count, Pack B price ÷ Pack B count, Pack C price ÷ Pack C count) - min(Pack A price ÷ Pack A count, Pack B price ÷ Pack B count, Pack C price ÷ Pack C count)</code> = <strong>0.165 $</strong></li><li><strong>Spread</strong> = <code>(max(Pack A price ÷ Pack A count, Pack B price ÷ Pack B count, Pack C price ÷ Pack C count) - min(Pack A price ÷ Pack A count, Pack B price ÷ Pack B count, Pack C price ÷ Pack C count)) ÷ max(Pack A price ÷ Pack A count, Pack B price ÷ Pack B count, Pack C price ÷ Pack C count) × 100</code> = <strong>19.89 %</strong></li></ul><p>The count must be the count you use. Twenty-four bars at 15.99 is a good price per bar and a bad price if twelve of them go stale.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>4.99 ÷ 6</code>, which comes to <strong>0.832 $</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Six for 4.99 is 83.2 cents an item, twelve for 8.99 is 74.9 and twenty-four for 15.99 is 66.6. The spread is 16.5 cents an item, twenty per cent of the dearest pack.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Pack A, per item</th><th>Pack B, per item</th><th>Pack C, per item</th><th>Cheapest per item</th><th>Dearest minus cheapest</th><th>Spread</th></tr></thead><tbody><tr><td><strong>Pack A price</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+50.28 %</td><td>+36.62 %</td></tr><tr><td><strong>Pack A count</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−45.71 %</td><td>−40.28 %</td></tr><tr><td><strong>Pack B price</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Pack B count</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Pack C price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>−40.28 %</td><td>−40.28 %</td></tr><tr><td><strong>Pack C count</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+36.62 %</td><td>+36.62 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Pack A price</strong>. <strong>Pack B count</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Pack A price</strong> opens at 4.99 $</li><li><strong>Pack A count</strong> opens at 6 items</li><li><strong>Pack B price</strong> opens at 8.99 $</li><li><strong>Pack B count</strong> opens at 12 items</li><li><strong>Pack C price</strong> opens at 15.99 $</li><li><strong>Pack C count</strong> opens at 24 items</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Pack A price</th><th>Pack A, per item</th><th>Pack B, per item</th><th>Pack C, per item</th><th>Cheapest per item</th><th>Dearest minus cheapest</th><th>Spread</th></tr></thead><tbody><tr><td>2.495 $</td><td>0.416</td><td>0.749</td><td>0.666</td><td>0.416</td><td>0.333</td><td>44.494</td></tr><tr><td>4.99 $</td><td>0.832</td><td>0.749</td><td>0.666</td><td>0.666</td><td>0.165</td><td>19.89</td></tr><tr><td>9.98 $</td><td>1.663</td><td>0.749</td><td>0.666</td><td>0.666</td><td>0.997</td><td>59.945</td></tr><tr><td>24.95 $</td><td>4.158</td><td>0.749</td><td>0.666</td><td>0.666</td><td>3.492</td><td>83.978</td></tr><tr><td>49.9 $</td><td>8.317</td><td>0.749</td><td>0.666</td><td>0.666</td><td>7.65</td><td>91.989</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set pack A price = 4.99, pack A count = 6, pack B price = 7.99, pack B count = 12, pack C price = 15.99, pack C count = 24: <strong>Pack A, per item</strong> = 0.832 $, <strong>Pack B, per item</strong> = 0.666 $, <strong>Pack C, per item</strong> = 0.666 $, <strong>Cheapest per item</strong> = 0.666 $, <strong>Dearest minus cheapest</strong> = 0.166 $, <strong>Spread</strong> = 19.94 %. With the middle pack on promotion at 7.99 the best price drops to 66.6 cents an item, a shade under the bulk pack, and the spread stays at 16.6 cents.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Comparing multipacks of different products.</strong> Six smaller bars and twenty-four larger ones are two different products, and the per-item figure is meaningless across them. Compare grams with the weight page.</li><li><strong>Assumed monotony.</strong> Bulk sizes can be worse value than the middle one when a promotion runs on the middle one. The page will tell you, provided you enter the promoted price.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Three packs.</strong> A fourth size needs a second run with the worst of the three replaced.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need pack A price and pack A count and pack B price and pack B count and pack C price and pack C count. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Pack a, per item and pack b, per item and pack c, per item and cheapest per item and dearest minus cheapest and spread should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Choosing between three sizes of the same household staple.</li></li><li><li>Checking whether a bulk pack is a discount or a mirage.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/price-per-ounce">Price per ounce</a> <a href="/everyday-life/price-per-weight">Price per weight</a> <a href="/everyday-life/price-per-round">Price per round</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Pack A price</strong> ×10</td><td>0.832</td><td>8.317</td><td>ten times larger</td></tr><tr><td><strong>Pack A count</strong> ×10</td><td>0.832</td><td>0.083</td><td>ten times smaller</td></tr><tr><td><strong>Pack B price</strong> ×10</td><td>0.832</td><td>0.832</td><td>unchanged</td></tr><tr><td><strong>Pack B count</strong> ×10</td><td>0.832</td><td>0.832</td><td>unchanged</td></tr><tr><td><strong>Pack C price</strong> ×10</td><td>0.832</td><td>0.832</td><td>unchanged</td></tr><tr><td><strong>Pack C count</strong> ×10</td><td>0.832</td><td>0.832</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Price per Unit calculator work out?', 'a' => <<<'TXT'
            It returns pack A, per item and pack B, per item and pack C, per item and cheapest per item and dearest minus cheapest and spread from pack A price and pack A count and pack B price and pack B count and pack C price and pack C count. The relationship is Pack A price ÷ Pack A count.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Pack A price ($), Pack A count (items), Pack B price ($), Pack B count (items), Pack C price ($), Pack C count (items). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: pack A price in $; pack A count in items; pack B price in $; pack B count in items; pack C price in $; pack C count in items. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Is the largest pack always the cheapest per unit?', 'a' => <<<'TXT'
            No. It is cheaper most of the time on staples, and it is beaten often enough — by promotions, by pack sizes that are not proportional — that the division is worth twenty seconds.
            TXT],
            ['q' => 'What if the packs hold different weights?', 'a' => 'Then items per pack is the wrong count. Enter the grams as the count, or use the price per weight page, which compares the actual quantity.'],
            ['q' => 'Does the spread percentage mean anything?', 'a' => <<<'TXT'
            It is the share of the dearest price you stop paying by buying the cheapest. On cleaning products and pet food it runs from ten to forty per cent, which is worth knowing before you fill a cupboard.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/price-per-ounce', 'name' => 'Price per ounce'],
            ['path' => '/everyday-life/price-per-weight', 'name' => 'Price per weight'],
            ['path' => '/everyday-life/price-per-round', 'name' => 'Price per round'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
