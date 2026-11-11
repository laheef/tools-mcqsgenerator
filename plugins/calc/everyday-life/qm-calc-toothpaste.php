<?php

/**
 * Toothpaste Calculator
 * /everyday-life/toothpaste
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Toothpaste Calculator',
    'meta' => ['title' => 'Toothpaste — Brushes a Tube and Cost per Brush', 'description' => 'A pea of paste is about 0.75 ml, so a 100 ml tube is 133 brushes: the arithmetic of how long a tube lasts and what a brush actually costs. The formula is shown.', 'h1' => 'Toothpaste Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'tube_ml',
                    'label' => 'Tube size',
                    'type' => 'number',
                    'suffix' => 'ml',
                    'default' => '100',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'use_ml',
                    'label' => 'Paste per brush',
                    'type' => 'number',
                    'suffix' => 'ml',
                    'default' => '0.75',
                    'help' => 'A pea-sized amount is about 0.75 ml. A full brush-length ribbon is nearer 1.5, and twice the cost.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Tube price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '3.5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'brushes_day',
                    'label' => 'Brushes a day',
                    'type' => 'number',
                    'suffix' => 'brushes',
                    'default' => '2',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'brushes',
                    'label' => 'Brushes a tube',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'brushes',
                ],
                [
                    'name' => 'cost_brush',
                    'label' => 'Cost per brush',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'days',
                    'label' => 'Days a tube lasts',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
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
    'formula' => ['brushes' => 'tube_ml / use_ml', 'cost_brush' => 'price * use_ml / tube_ml', 'days' => 'tube_ml / use_ml / brushes_day', 'cost_year' => 'price * 365 / (tube_ml / use_ml / brushes_day)'],
    'article' => [
        'intro' => 'How many brushes a tube of toothpaste contains, what each one costs, how many days the tube lasts at your brushing habit, and the yearly bill.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Dentists recommend a pea-sized amount, which is about three-quarters of a millilitre. A 100 ml tube therefore holds 133 brushes, and at two a day that is sixty-seven days of brushing for 3.50 — under three cents a brush.</p><p>The ribbon along the brush that advertising shows is twice the volume, and it halves the number of brushes in the tube. Nothing about the cleaning changes; the paste on the brush is mostly there for the fluoride and the taste.</p><p>The answer is <strong>brushes a tube and cost per brush and days a tube lasts and cost a year</strong>, worked out from tube size and paste per brush and tube price and brushes a day. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>brushes</strong></td><td><code>Tube size ÷ Paste per brush</code></td></tr><tr><td><strong>cost_brush</strong></td><td><code>Tube price × Paste per brush ÷ Tube size</code></td></tr><tr><td><strong>days</strong></td><td><code>Tube size ÷ Paste per brush ÷ Brushes a day</code></td></tr><tr><td><strong>cost_year</strong></td><td><code>Tube price × 365 ÷ (Tube size ÷ Paste per brush ÷ Brushes a day)</code></td></tr></tbody></table><p>Tube volume over the amount per brush gives the brushes. The cost per brush is the tube price divided by that count, and the year is 365 divided by the days a tube lasts.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports brushes a tube and cost per brush and days a tube lasts and cost a year.</p><ul><li><strong>Tube size</strong> — ml.</li><li><strong>Paste per brush</strong> — ml. A pea-sized amount is about 0.75 ml. A full brush-length ribbon is nearer 1.5, and twice the cost.</li><li><strong>Tube price</strong> — $.</li><li><strong>Brushes a day</strong> — brushes.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Brushes a tube</strong> — brushes.</li><li><strong>Cost per brush</strong> — $.</li><li><strong>Days a tube lasts</strong> — days.</li><li><strong>Cost a year</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put tube size = 100 ml, paste per brush = 0.75 ml, tube price = 3.5 $, brushes a day = 2 brushes into the form and the panel reads:</p><ul><li><strong>Brushes a tube</strong> = <code>Tube size ÷ Paste per brush</code> = <strong>133.333 brushes</strong></li><li><strong>Cost per brush</strong> = <code>Tube price × Paste per brush ÷ Tube size</code> = <strong>0.026 $</strong></li><li><strong>Days a tube lasts</strong> = <code>Tube size ÷ Paste per brush ÷ Brushes a day</code> = <strong>66.667 days</strong></li><li><strong>Cost a year</strong> = <code>Tube price × 365 ÷ (Tube size ÷ Paste per brush ÷ Brushes a day)</code> = <strong>19.162 $</strong></li></ul><p>A 1.5 ml ribbon halves the count to 67 brushes and doubles the yearly cost to 38.32. The tube is the same size either way.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>100 ÷ 0.75</code>, which comes to <strong>133.333 brushes</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>100 ml at 0.75 ml a brush is 133 brushes, 2.6 cents each. Two brushes a day makes a tube last 66.7 days, and the year costs 19.16.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Brushes a tube</th><th>Cost per brush</th><th>Days a tube lasts</th><th>Cost a year</th></tr></thead><tbody><tr><td><strong>Tube size</strong> +10 %</td><td>+10 %</td><td>−9.09 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Paste per brush</strong> +10 %</td><td>−9.09 %</td><td>+10 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Tube price</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Brushes a day</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Paste per brush</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Tube size</strong> opens at 100 ml</li><li><strong>Paste per brush</strong> opens at 0.75 ml — A pea-sized amount is about 0.75 ml. A full brush-length ribbon is nearer 1.5, and twice the cost.</li><li><strong>Tube price</strong> opens at 3.5 $</li><li><strong>Brushes a day</strong> opens at 2 brushes</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Tube size</th><th>Brushes a tube</th><th>Cost per brush</th><th>Days a tube lasts</th><th>Cost a year</th></tr></thead><tbody><tr><td>50 ml</td><td>66.667</td><td>0.052</td><td>33.333</td><td>38.325</td></tr><tr><td>100 ml</td><td>133.333</td><td>0.026</td><td>66.667</td><td>19.162</td></tr><tr><td>200 ml</td><td>266.667</td><td>0.013</td><td>133.333</td><td>9.581</td></tr><tr><td>500 ml</td><td>666.667</td><td>0.005</td><td>333.333</td><td>3.833</td></tr><tr><td>1 000 ml</td><td>1 333.333</td><td>0.003</td><td>666.667</td><td>1.916</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set tube size = 100, paste per brush = 1.5, tube price = 3.5, brushes a day = 2: <strong>Brushes a tube</strong> = 66.667 brushes, <strong>Cost per brush</strong> = 0.052 $, <strong>Days a tube lasts</strong> = 33.333 days, <strong>Cost a year</strong> = 38.325 $. At 1.5 ml a brush the tube holds 66 brushes, lasts 33 days and costs 38.32 a year — twice the paste for the same tube.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Measuring by the ribbon.</strong> The length of paste in an advert is a sales device. A pea is the clinical dose and it is what the fluoride calculation assumes.</li><li><strong>Comparing tubes by price alone.</strong> A 75 ml tube at 2.50 is 3.3 cents a ml and a 100 ml at 3.50 is 3.5 — the smaller one is slightly cheaper and holds less, which is exactly the comparison the shelf avoids.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Paste only.</strong> Brushes, floss and mouthwash are separate lines, and a family of four multiplies this figure by whatever each of them uses.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need tube size and paste per brush and tube price and brushes a day. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Brushes a tube and cost per brush and days a tube lasts and cost a year should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Working out how long a tube lasts before a trip.</li></li><li><li>Comparing two tube sizes honestly.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/sunscreen-amount">Sunscreen amount</a> <a href="/everyday-life/price-per-ounce">Price per ounce</a> <a href="/everyday-life/cleaning-cost">Cleaning cost</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Tube size</strong> ×10</td><td>133.333</td><td>1 333.333</td><td>ten times larger</td></tr><tr><td><strong>Paste per brush</strong> ×10</td><td>133.333</td><td>13.333</td><td>ten times smaller</td></tr><tr><td><strong>Tube price</strong> ×10</td><td>133.333</td><td>133.333</td><td>unchanged</td></tr><tr><td><strong>Brushes a day</strong> ×10</td><td>133.333</td><td>133.333</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Toothpaste calculator work out?', 'a' => <<<'TXT'
            It returns brushes a tube and cost per brush and days a tube lasts and cost a year from tube size and paste per brush and tube price and brushes a day. The relationship is Tube size ÷ Paste per brush.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Tube size (ml), Paste per brush (ml), Tube price ($), Brushes a day (brushes). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: tube size in ml; paste per brush in ml; tube price in $; brushes a day in brushes. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How much toothpaste should I use?', 'a' => <<<'TXT'
            A pea for an adult and a smear for a child under three. The fluoride matters more than the volume, and the recommendation is about the dose rather than stinginess.
            TXT],
            ['q' => 'How long does a 100 ml tube last?', 'a' => 'About two months for one person brushing twice a day at a pea per brush, which is the figure most dental practices quote.'],
            ['q' => 'Is the cost per brush worth calculating?', 'a' => 'At three cents it is not a budget item. The calculation is interesting because it settles the tube-size argument, not because the money matters.'],
        ],
        'related' => [
            ['path' => '/everyday-life/sunscreen-amount', 'name' => 'Sunscreen amount'],
            ['path' => '/everyday-life/price-per-ounce', 'name' => 'Price per ounce'],
            ['path' => '/everyday-life/cleaning-cost', 'name' => 'Cleaning cost'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
