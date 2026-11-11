<?php

/**
 * Money Weight Calculator
 * /everyday-life/money-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Money Weight Calculator',
    'meta' => ['title' => 'Money Weight — What a Stack of Banknotes Weighs', 'description' => 'A US banknote weighs one gram whatever its value, so a thousand dollars is fifty grams and a million is ten kilos. The page that makes the weight real.', 'h1' => 'Money Weight Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'bills',
                    'label' => 'Banknotes',
                    'type' => 'number',
                    'suffix' => 'bills',
                    'default' => '100',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'denom',
                    'label' => 'Value of one',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '20',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'grams_each',
                    'label' => 'Weight of one',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '1',
                    'help' => 'Every US note weighs one gram, from the one to the hundred. Euro notes range from 0.65 to 1.1 grams.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'value',
                    'label' => 'Value of the stack',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'grams',
                    'label' => 'Weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
                [
                    'name' => 'kg',
                    'label' => 'Weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kg',
                ],
                [
                    'name' => 'pounds',
                    'label' => 'Weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
            ],
        ],
    ],
    'formula' => ['value' => 'bills * denom', 'grams' => 'bills * grams_each', 'kg' => 'bills * grams_each / 1000', 'pounds' => 'bills * grams_each / 453.592 * 1000 / 1000'],
    'article' => [
        'intro' => 'The weight of a number of banknotes in grams, kilograms and pounds, and the value they carry, from the denomination and the count.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A US banknote weighs a gram whatever number is printed on it, so the value of a stack and its weight are two separate multiplications. A hundred twenties is 2 000 and 100 grams; a million dollars in twenties is 50 000 notes and fifty kilos.</p><p>That is why the film briefcase is a lie in both directions: a million in hundreds is ten kilos, which is a heavy shopping bag, and a million in ones is a tonne, which is a pallet.</p><p>The answer is <strong>value of the stack and weight and weight and weight</strong>, worked out from banknotes and value of one and weight of one. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>value</strong></td><td><code>Banknotes × Value of one</code></td></tr><tr><td><strong>grams</strong></td><td><code>Banknotes × Weight of one</code></td></tr><tr><td><strong>kg</strong></td><td><code>Banknotes × Weight of one ÷ 1000</code></td></tr><tr><td><strong>pounds</strong></td><td><code>Banknotes × Weight of one ÷ 453.592 × 1000 ÷ 1000</code></td></tr></tbody></table><p>Bills times the denomination gives the value; bills times the weight of one gives grams, and the kilogram and pound figures convert from that with 453.59 grams to the pound.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports value of the stack and weight and weight and weight.</p><ul><li><strong>Banknotes</strong> — bills.</li><li><strong>Value of one</strong> — $.</li><li><strong>Weight of one</strong> — g. Every US note weighs one gram, from the one to the hundred. Euro notes range from 0.65 to 1.1 grams.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Value of the stack</strong> — $.</li><li><strong>Weight</strong> — g.</li><li><strong>Weight</strong> — kg.</li><li><strong>Weight</strong> — lb.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put banknotes = 100 bills, value of one = 20 $, weight of one = 1 g into the form and the panel reads:</p><ul><li><strong>Value of the stack</strong> = <code>Banknotes × Value of one</code> = <strong>2 000 $</strong></li><li><strong>Weight</strong> = <code>Banknotes × Weight of one</code> = <strong>100 g</strong></li><li><strong>Weight</strong> = <code>Banknotes × Weight of one ÷ 1000</code> = <strong>0.1 kg</strong></li><li><strong>Weight</strong> = <code>Banknotes × Weight of one ÷ 453.592 × 1000 ÷ 1000</code> = <strong>0.22 lb</strong></li></ul><p>A million in hundreds is 10 000 notes and ten kilos, which one person can carry. The denomination changes the weight by a factor of five without changing the value at all.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>100 × 20</code>, which comes to <strong>2 000 $</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>100 twenties is 2 000 and 100 grams — 0.1 kilograms or 0.22 pounds. A million in twenties is 50 000 notes and 50 kilograms.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Value of the stack</th><th>Weight</th><th>Weight</th><th>Weight</th></tr></thead><tbody><tr><td><strong>Banknotes</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Value of one</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Weight of one</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Banknotes</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Banknotes</strong> opens at 100 bills</li><li><strong>Value of one</strong> opens at 20 $</li><li><strong>Weight of one</strong> opens at 1 g — Every US note weighs one gram, from the one to the hundred. Euro notes range from 0.65 to 1.1 grams.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Banknotes</th><th>Value of the stack</th><th>Weight</th><th>Weight</th><th>Weight</th></tr></thead><tbody><tr><td>50 bills</td><td>1 000</td><td>50</td><td>0.05</td><td>0.11</td></tr><tr><td>100 bills</td><td>2 000</td><td>100</td><td>0.1</td><td>0.22</td></tr><tr><td>200 bills</td><td>4 000</td><td>200</td><td>0.2</td><td>0.441</td></tr><tr><td>500 bills</td><td>10 000</td><td>500</td><td>0.5</td><td>1.102</td></tr><tr><td>1 000 bills</td><td>20 000</td><td>1 000</td><td>1</td><td>2.205</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set banknotes = 1 000, value of one = 20, weight of one = 1: <strong>Value of the stack</strong> = 20 000 $, <strong>Weight</strong> = 1 000 g, <strong>Weight</strong> = 1 kg, <strong>Weight</strong> = 2.205 lb. A thousand twenties is 20 000 and a kilogram — 2.2 pounds, which is about a bag of sugar.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Assuming the note's value affects its weight.</strong> It does not, in dollars. In coins it very much does, and a bag of pennies is the classic example.</li><li><strong>Forgetting the wrapping.</strong> A strap of a hundred notes adds a paper band, and a hundred straps is a box. The arithmetic here is the paper only.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need banknotes and value of one and weight of one. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Value of the stack and weight and weight and weight should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Settling the film-briefcase argument.</li></li><li><li>Working out postage on a stack of notes or a collection of coupons.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/paper-weight">Paper weight</a> <a href="/everyday-life/price-per-ounce">Price per ounce</a> <a href="/everyday-life/grocery">Grocery budget</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Banknotes</strong> ×10</td><td>2 000</td><td>20 000</td><td>ten times larger</td></tr><tr><td><strong>Value of one</strong> ×10</td><td>2 000</td><td>20 000</td><td>ten times larger</td></tr><tr><td><strong>Weight of one</strong> ×10</td><td>2 000</td><td>2 000</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Money Weight calculator work out?', 'a' => 'It returns value of the stack and weight and weight and weight from banknotes and value of one and weight of one. The relationship is Banknotes × Value of one.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Banknotes (bills), Value of one ($), Weight of one (g). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: banknotes in bills; value of one in $; weight of one in g. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Does a 100-dollar bill weigh more than a 1-dollar bill?', 'a' => 'No. US currency is printed on the same paper stock and every note is one gram. The value is ink, not weight.'],
            ['q' => 'How much does a million dollars weigh?', 'a' => 'Ten kilos in hundreds, fifty in twenties and a tonne in ones. The note weighs a gram whatever it says.'],
            ['q' => 'What about coins?', 'a' => 'They follow metal, so a dollar of pennies weighs about 250 grams and a dollar of quarters about 23. That is why coin jars are heavier than they look.'],
        ],
        'related' => [
            ['path' => '/everyday-life/paper-weight', 'name' => 'Paper weight'],
            ['path' => '/everyday-life/price-per-ounce', 'name' => 'Price per ounce'],
            ['path' => '/everyday-life/grocery', 'name' => 'Grocery budget'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
