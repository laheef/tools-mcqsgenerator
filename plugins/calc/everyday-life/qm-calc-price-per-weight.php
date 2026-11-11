<?php

/**
 * Price per Weight Calculator
 * /everyday-life/price-per-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Price per Weight Calculator',
    'meta' => ['title' => 'Price per Weight — Grams, Kilos and the Real Deal', 'description' => 'Two packs weighed in grams or kilos: the cost of a gram, a hundred grams and a kilo of each, so metric shelf labels finally compare. The formula is shown.', 'h1' => 'Price per Weight Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'cost_a',
                    'label' => 'Pack A price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '3.29',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'g_a',
                    'label' => 'Pack A weight',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '250',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cost_b',
                    'label' => 'Pack B price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '5.49',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'g_b',
                    'label' => 'Pack B weight',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '500',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'per_g_a',
                    'label' => 'Pack A, per gram',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/g',
                ],
                [
                    'name' => 'per_g_b',
                    'label' => 'Pack B, per gram',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/g',
                ],
                [
                    'name' => 'per_100_a',
                    'label' => 'Pack A, per 100 g',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'per_100_b',
                    'label' => 'Pack B, per 100 g',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'per_kg_a',
                    'label' => 'Pack A, per kilo',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/kg',
                ],
                [
                    'name' => 'per_kg_b',
                    'label' => 'Pack B, per kilo',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/kg',
                ],
                [
                    'name' => 'pct',
                    'label' => 'B saves',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
            ],
        ],
    ],
    'formula' => [
        'per_g_a' => 'cost_a / g_a',
        'per_g_b' => 'cost_b / g_b',
        'per_100_a' => 'cost_a / g_a * 100',
        'per_100_b' => 'cost_b / g_b * 100',
        'per_kg_a' => 'cost_a / g_a * 1000',
        'per_kg_b' => 'cost_b / g_b * 1000',
        'pct' => '(cost_a / g_a - cost_b / g_b) / (cost_a / g_a) * 100',
    ],
    'article' => [
        'intro' => 'The cost of one gram, one hundred grams and one kilogram of each of two packs, plus the percentage the second saves, all from the two weights on the labels.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Metric labels put the weight in grams and the price in dollars, and the two do not meet anywhere convenient. A 250-gram pack at 3.29 against a 500-gram pack at 5.49 is a comparison nobody does in their head at a shelf.</p><p>Per hundred grams is the number most European shops print, and it is the right one: 1.32 against 1.10, so the larger pack saves sixteen and a half per cent. Per kilo is the same fact for a bulk buyer.</p><p>The answer is <strong>pack A, per gram and pack B, per gram and pack A, per 100 g and pack B, per 100 g and pack A, per kilo and pack B, per kilo and b saves</strong>, worked out from pack A price and pack A weight and pack B price and pack B weight. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>per_g_a</strong></td><td><code>Pack A price ÷ Pack A weight</code></td></tr><tr><td><strong>per_g_b</strong></td><td><code>Pack B price ÷ Pack B weight</code></td></tr><tr><td><strong>per_100_a</strong></td><td><code>Pack A price ÷ Pack A weight × 100</code></td></tr><tr><td><strong>per_100_b</strong></td><td><code>Pack B price ÷ Pack B weight × 100</code></td></tr><tr><td><strong>per_kg_a</strong></td><td><code>Pack A price ÷ Pack A weight × 1000</code></td></tr><tr><td><strong>per_kg_b</strong></td><td><code>Pack B price ÷ Pack B weight × 1000</code></td></tr><tr><td><strong>pct</strong></td><td><code>(Pack A price ÷ Pack A weight - Pack B price ÷ Pack B weight) ÷ (Pack A price ÷ Pack A weight) × 100</code></td></tr></tbody></table><p>Price over grams, then multiplied by 100 and by 1 000. Multiplying the unit price rather than dividing the price again keeps the three figures consistent with each other to the last digit.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports pack A, per gram and pack B, per gram and pack A, per 100 g and pack B, per 100 g and pack A, per kilo and pack B, per kilo and b saves.</p><ul><li><strong>Pack A price</strong> — $.</li><li><strong>Pack A weight</strong> — g.</li><li><strong>Pack B price</strong> — $.</li><li><strong>Pack B weight</strong> — g.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Pack A, per gram</strong> — $/g.</li><li><strong>Pack B, per gram</strong> — $/g.</li><li><strong>Pack A, per 100 g</strong> — $.</li><li><strong>Pack B, per 100 g</strong> — $.</li><li><strong>Pack A, per kilo</strong> — $/kg.</li><li><strong>Pack B, per kilo</strong> — $/kg.</li><li><strong>B saves</strong> — %.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put pack A price = 3.29 $, pack A weight = 250 g, pack B price = 5.49 $, pack B weight = 500 g into the form and the panel reads:</p><ul><li><strong>Pack A, per gram</strong> = <code>Pack A price ÷ Pack A weight</code> = <strong>0.013 $/g</strong></li><li><strong>Pack B, per gram</strong> = <code>Pack B price ÷ Pack B weight</code> = <strong>0.011 $/g</strong></li><li><strong>Pack A, per 100 g</strong> = <code>Pack A price ÷ Pack A weight × 100</code> = <strong>1.316 $</strong></li><li><strong>Pack B, per 100 g</strong> = <code>Pack B price ÷ Pack B weight × 100</code> = <strong>1.098 $</strong></li><li><strong>Pack A, per kilo</strong> = <code>Pack A price ÷ Pack A weight × 1000</code> = <strong>13.16 $/kg</strong></li><li><strong>Pack B, per kilo</strong> = <code>Pack B price ÷ Pack B weight × 1000</code> = <strong>10.98 $/kg</strong></li><li><strong>B saves</strong> = <code>(Pack A price ÷ Pack A weight - Pack B price ÷ Pack B weight) ÷ (Pack A price ÷ Pack A weight) × 100</code> = <strong>16.565 %</strong></li></ul><p>A percentage under five on a staple you buy weekly still adds up over a year. Above twenty, the cheap option is usually a different product in the same kind of bag.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>3.29 ÷ 250</code>, which comes to <strong>0.013 $/g</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>250 grams at 3.29 is 1.32 per 100 grams and 13.16 a kilo; 500 grams at 5.49 is 1.10 per 100 grams and 10.98 a kilo, so B is 16.6 per cent cheaper by weight.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Pack A, per gram</th><th>Pack B, per gram</th><th>Pack A, per 100 g</th><th>Pack B, per 100 g</th><th>Pack A, per kilo</th><th>Pack B, per kilo</th><th>B saves</th></tr></thead><tbody><tr><td><strong>Pack A price</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+45.79 %</td></tr><tr><td><strong>Pack A weight</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td><td>−50.37 %</td></tr><tr><td><strong>Pack B price</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>−50.37 %</td></tr><tr><td><strong>Pack B weight</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td><td>−9.09 %</td><td>+45.79 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Pack B price</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Pack A price</strong> opens at 3.29 $</li><li><strong>Pack A weight</strong> opens at 250 g</li><li><strong>Pack B price</strong> opens at 5.49 $</li><li><strong>Pack B weight</strong> opens at 500 g</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Pack A price</th><th>Pack A, per gram</th><th>Pack B, per gram</th><th>Pack A, per 100 g</th><th>Pack B, per 100 g</th><th>Pack A, per kilo</th><th>Pack B, per kilo</th><th>B saves</th></tr></thead><tbody><tr><td>1.645 $</td><td>0.007</td><td>0.011</td><td>0.658</td><td>1.098</td><td>6.58</td><td>10.98</td><td>-66.869</td></tr><tr><td>3.29 $</td><td>0.013</td><td>0.011</td><td>1.316</td><td>1.098</td><td>13.16</td><td>10.98</td><td>16.565</td></tr><tr><td>6.58 $</td><td>0.026</td><td>0.011</td><td>2.632</td><td>1.098</td><td>26.32</td><td>10.98</td><td>58.283</td></tr><tr><td>16.45 $</td><td>0.066</td><td>0.011</td><td>6.58</td><td>1.098</td><td>65.8</td><td>10.98</td><td>83.313</td></tr><tr><td>32.9 $</td><td>0.132</td><td>0.011</td><td>13.16</td><td>1.098</td><td>131.6</td><td>10.98</td><td>91.657</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set pack A price = 3.29, pack A weight = 250, pack B price = 6.99, pack B weight = 500: <strong>Pack A, per gram</strong> = 0.013 $/g, <strong>Pack B, per gram</strong> = 0.014 $/g, <strong>Pack A, per 100 g</strong> = 1.316 $, <strong>Pack B, per 100 g</strong> = 1.398 $, <strong>Pack A, per kilo</strong> = 13.16 $/kg, <strong>Pack B, per kilo</strong> = 13.98 $/kg, <strong>B saves</strong> = -6.231 %. At 6.99 the larger pack is 1.40 per 100 grams against 1.32, so the small pack is the cheaper one and the percentage turns negative.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Mixing grams with ounces.</strong> An ounce is 28.35 grams, so a sixteen-ounce pack is 454 grams and not 16. Convert before comparing.</li><li><strong>Trusting the pack size in the name.</strong> A "family pack" can hold less than two standard packs. The grams on the front are the fact; the words are marketing.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Net weight only.</strong> A pack with a lot of packaging weighs more than it contains, and only the net figure is used here.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need pack A price and pack A weight and pack B price and pack B weight. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Pack a, per gram and pack b, per gram and pack a, per 100 g and pack b, per 100 g and pack a, per kilo and pack b, per kilo and b saves should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Comparing two sizes of the same staple on a metric label.</li></li><li><li>Checking a bulk bag against the standard pack before ordering online.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/price-per-ounce">Price per ounce</a> <a href="/everyday-life/price-per-pound">Price per pound</a> <a href="/everyday-life/price-per-unit">Price per unit</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Pack A price</strong> ×10</td><td>0.013</td><td>0.132</td><td>ten times larger</td></tr><tr><td><strong>Pack A weight</strong> ×10</td><td>0.013</td><td>0.001</td><td>ten times smaller</td></tr><tr><td><strong>Pack B price</strong> ×10</td><td>0.013</td><td>0.013</td><td>unchanged</td></tr><tr><td><strong>Pack B weight</strong> ×10</td><td>0.013</td><td>0.013</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Price per Weight calculator work out?', 'a' => <<<'TXT'
            It returns pack A, per gram and pack B, per gram and pack A, per 100 g and pack B, per 100 g and pack A, per kilo and pack B, per kilo and b saves from pack A price and pack A weight and pack B price and pack B weight. The relationship is Pack A price ÷ Pack A weight.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Pack A price ($), Pack A weight (g), Pack B price ($), Pack B weight (g). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: pack A price in $; pack A weight in g; pack B price in $; pack B weight in g. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why show per hundred grams rather than per gram?', 'a' => <<<'TXT'
            Because per gram is a number with three zeros in front of it — 0.0132 — and nobody compares those. Per hundred grams lands on a scale that a shelf label can print.
            TXT],
            ['q' => 'Is per kilo the same as per 100 grams times ten?', 'a' => 'Exactly the same, and the page computes it that way, so the two lines can never disagree.'],
            ['q' => 'What if the packs are in ounces?', 'a' => 'Multiply ounces by 28.35 to get grams, or use the price per ounce page, which does the same division in the imperial unit.'],
        ],
        'related' => [
            ['path' => '/everyday-life/price-per-ounce', 'name' => 'Price per ounce'],
            ['path' => '/everyday-life/price-per-pound', 'name' => 'Price per pound'],
            ['path' => '/everyday-life/price-per-unit', 'name' => 'Price per unit'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
