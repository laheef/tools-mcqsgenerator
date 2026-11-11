<?php

/**
 * Price per Pound Calculator
 * /everyday-life/price-per-pound
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Price per Pound Calculator',
    'meta' => ['title' => 'Price per Pound — Compare Two Weights Honestly', 'description' => 'One price, one weight, twice over: the cost of a pound of each and the gap between them, for meat, produce and anything sold loose. The formula is shown.', 'h1' => 'Price per Pound Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'cost_a',
                    'label' => 'Item A price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '5.49',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'lb_a',
                    'label' => 'Item A weight',
                    'type' => 'number',
                    'suffix' => 'lb',
                    'default' => '1.5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cost_b',
                    'label' => 'Item B price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '12.99',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'lb_b',
                    'label' => 'Item B weight',
                    'type' => 'number',
                    'suffix' => 'lb',
                    'default' => '4',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'unit_a',
                    'label' => 'Item A, per pound',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/lb',
                ],
                [
                    'name' => 'unit_b',
                    'label' => 'Item B, per pound',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/lb',
                ],
                [
                    'name' => 'diff',
                    'label' => 'B saves, per pound',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/lb',
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
                    'name' => 'oz_a',
                    'label' => 'Item A, per ounce',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/oz',
                ],
                [
                    'name' => 'oz_b',
                    'label' => 'Item B, per ounce',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/oz',
                ],
            ],
        ],
    ],
    'formula' => [
        'unit_a' => 'cost_a / lb_a',
        'unit_b' => 'cost_b / lb_b',
        'diff' => 'cost_a / lb_a - cost_b / lb_b',
        'pct' => '(cost_a / lb_a - cost_b / lb_b) / (cost_a / lb_a) * 100',
        'oz_a' => 'cost_a / lb_a / 16',
        'oz_b' => 'cost_b / lb_b / 16',
    ],
    'article' => [
        'intro' => 'The cost of a pound of each of two weighed items, the saving per pound, and the same figures per ounce, which is how small cuts are priced at a counter.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Meat is sold in packs that are never the round number on the label: one pound and a half at 5.49 against four pounds at 12.99. The second costs more and the question is whether it costs more per pound.</p><p>Two divisions settle it. 3.66 a pound against 3.25 is a saving of 41 cents a pound, and the pack that looked like the expensive one is the cheaper one on the only scale that compares.</p><p>The answer is <strong>item A, per pound and item B, per pound and b saves, per pound and b saves and item A, per ounce and item B, per ounce</strong>, worked out from item A price and item A weight and item B price and item B weight. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>unit_a</strong></td><td><code>Item A price ÷ Item A weight</code></td></tr><tr><td><strong>unit_b</strong></td><td><code>Item B price ÷ Item B weight</code></td></tr><tr><td><strong>diff</strong></td><td><code>Item A price ÷ Item A weight - Item B price ÷ Item B weight</code></td></tr><tr><td><strong>pct</strong></td><td><code>(Item A price ÷ Item A weight - Item B price ÷ Item B weight) ÷ (Item A price ÷ Item A weight) × 100</code></td></tr><tr><td><strong>oz_a</strong></td><td><code>Item A price ÷ Item A weight ÷ 16</code></td></tr><tr><td><strong>oz_b</strong></td><td><code>Item B price ÷ Item B weight ÷ 16</code></td></tr></tbody></table><p>Price over pounds for each item. The difference is A minus B, so a positive answer means B is the cheaper buy; the percentage puts that difference over A's own unit price. Ounces are the pound divided by sixteen.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports item A, per pound and item B, per pound and b saves, per pound and b saves and item A, per ounce and item B, per ounce.</p><ul><li><strong>Item A price</strong> — $.</li><li><strong>Item A weight</strong> — lb.</li><li><strong>Item B price</strong> — $.</li><li><strong>Item B weight</strong> — lb.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Item A, per pound</strong> — $/lb.</li><li><strong>Item B, per pound</strong> — $/lb.</li><li><strong>B saves, per pound</strong> — $/lb.</li><li><strong>B saves</strong> — %.</li><li><strong>Item A, per ounce</strong> — $/oz.</li><li><strong>Item B, per ounce</strong> — $/oz.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put item A price = 5.49 $, item A weight = 1.5 lb, item B price = 12.99 $, item B weight = 4 lb into the form and the panel reads:</p><ul><li><strong>Item A, per pound</strong> = <code>Item A price ÷ Item A weight</code> = <strong>3.66 $/lb</strong></li><li><strong>Item B, per pound</strong> = <code>Item B price ÷ Item B weight</code> = <strong>3.248 $/lb</strong></li><li><strong>B saves, per pound</strong> = <code>Item A price ÷ Item A weight - Item B price ÷ Item B weight</code> = <strong>0.413 $/lb</strong></li><li><strong>B saves</strong> = <code>(Item A price ÷ Item A weight - Item B price ÷ Item B weight) ÷ (Item A price ÷ Item A weight) × 100</code> = <strong>11.27 %</strong></li><li><strong>Item A, per ounce</strong> = <code>Item A price ÷ Item A weight ÷ 16</code> = <strong>0.229 $/oz</strong></li><li><strong>Item B, per ounce</strong> = <code>Item B price ÷ Item B weight ÷ 16</code> = <strong>0.203 $/oz</strong></li></ul><p>On a four-pound roast the eleven per cent is 1.65. That is the number to weigh against the fuel and time of cooking a bigger joint.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>5.49 ÷ 1.5</code>, which comes to <strong>3.66 $/lb</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>1.5 pounds for 5.49 is 3.66 a pound; 4 pounds for 12.99 is 3.25, a saving of 41 cents a pound or eleven point three per cent, which is 22.9 cents an ounce against 20.3.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Item A, per pound</th><th>Item B, per pound</th><th>B saves, per pound</th><th>B saves</th><th>Item A, per ounce</th><th>Item B, per ounce</th></tr></thead><tbody><tr><td><strong>Item A price</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+88.73 %</td><td>+71.57 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Item A weight</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>−80.66 %</td><td>−78.73 %</td><td>−9.09 %</td><td>+0 %</td></tr><tr><td><strong>Item B price</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>−78.73 %</td><td>−78.73 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Item B weight</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>+71.57 %</td><td>+71.57 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Item A price</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Item A price</strong> opens at 5.49 $</li><li><strong>Item A weight</strong> opens at 1.5 lb</li><li><strong>Item B price</strong> opens at 12.99 $</li><li><strong>Item B weight</strong> opens at 4 lb</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Item A price</th><th>Item A, per pound</th><th>Item B, per pound</th><th>B saves, per pound</th><th>B saves</th><th>Item A, per ounce</th><th>Item B, per ounce</th></tr></thead><tbody><tr><td>2.745 $</td><td>1.83</td><td>3.248</td><td>-1.417</td><td>-77.459</td><td>0.114</td><td>0.203</td></tr><tr><td>5.49 $</td><td>3.66</td><td>3.248</td><td>0.413</td><td>11.27</td><td>0.229</td><td>0.203</td></tr><tr><td>10.98 $</td><td>7.32</td><td>3.248</td><td>4.072</td><td>55.635</td><td>0.458</td><td>0.203</td></tr><tr><td>27.45 $</td><td>18.3</td><td>3.248</td><td>15.053</td><td>82.254</td><td>1.144</td><td>0.203</td></tr><tr><td>54.9 $</td><td>36.6</td><td>3.248</td><td>33.352</td><td>91.127</td><td>2.288</td><td>0.203</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set item A price = 5.49, item A weight = 1.5, item B price = 12.99, item B weight = 3: <strong>Item A, per pound</strong> = 3.66 $/lb, <strong>Item B, per pound</strong> = 4.33 $/lb, <strong>B saves, per pound</strong> = -0.67 $/lb, <strong>B saves</strong> = -18.306 %, <strong>Item A, per ounce</strong> = 0.229 $/oz, <strong>Item B, per ounce</strong> = 0.271 $/oz. The same 12.99 on three pounds is 4.33 a pound, which flips the answer: now the small pack is the cheaper buy.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Reading the price per pound sticker as the price.</strong> A shelf tag showing 3.25 a pound on a four-pound pack means 12.99 at the till. The two numbers are different questions.</li><li><strong>Forgetting the bone.</strong> Two cuts with the same price per pound are not the same value if one is a third bone. Weigh the meat you will eat.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Weight, not yield.</strong> Cooking loses water, and a cheaper cut can lose more of it. The page compares what you buy, not what reaches the plate.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need item A price and item A weight and item B price and item B weight. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Item a, per pound and item b, per pound and b saves, per pound and b saves and item a, per ounce and item b, per ounce should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Comparing a family pack against a single pack.</li></li><li><li>Deciding between two cuts at a butcher's counter.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/price-per-ounce">Price per ounce</a> <a href="/everyday-life/price-per-weight">Price per weight</a> <a href="/everyday-life/price-per-unit">Price per unit</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Item A price</strong> ×10</td><td>3.66</td><td>36.6</td><td>ten times larger</td></tr><tr><td><strong>Item A weight</strong> ×10</td><td>3.66</td><td>0.366</td><td>ten times smaller</td></tr><tr><td><strong>Item B price</strong> ×10</td><td>3.66</td><td>3.66</td><td>unchanged</td></tr><tr><td><strong>Item B weight</strong> ×10</td><td>3.66</td><td>3.66</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Price per Pound calculator work out?', 'a' => <<<'TXT'
            It returns item A, per pound and item B, per pound and b saves, per pound and b saves and item A, per ounce and item B, per ounce from item A price and item A weight and item B price and item B weight. The relationship is Item A price ÷ Item A weight.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Item A price ($), Item A weight (lb), Item B price ($), Item B weight (lb). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: item A price in $; item A weight in lb; item B price in $; item B weight in lb. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why is the bigger pack not always cheaper per pound?', 'a' => <<<'TXT'
            Because shops price to what people will pay, not to weight. A four-pound pack can sit above a three-pound pack per pound when the four-pound size is the one that moves slowly.
            TXT],
            ['q' => 'Should I use cooked or raw weight?', 'a' => 'Raw, every time. Cooked weight depends on how long and how hot you cook, so it cannot be compared between two shops.'],
            ['q' => 'What is a normal saving from buying the larger pack?', 'a' => 'On meat and poultry it is often between ten and thirty per cent per pound. When it is under five, the bigger pack is mostly extra freezer space.'],
        ],
        'related' => [
            ['path' => '/everyday-life/price-per-ounce', 'name' => 'Price per ounce'],
            ['path' => '/everyday-life/price-per-weight', 'name' => 'Price per weight'],
            ['path' => '/everyday-life/price-per-unit', 'name' => 'Price per unit'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
