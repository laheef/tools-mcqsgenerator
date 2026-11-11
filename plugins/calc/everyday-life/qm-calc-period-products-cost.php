<?php

/**
 * Period Products Cost Calculator
 * /everyday-life/period-products-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Period Products Cost Calculator',
    'meta' => ['title' => 'Period Products — Cost a Cycle and a Year — Free Tool', 'description' => 'Products a cycle, the price of one and the cycles in a year: the annual cost of period products, which almost nobody has ever added up. The formula is shown.', 'h1' => 'Period Products Cost Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'products_cycle',
                    'label' => 'Products a cycle',
                    'type' => 'number',
                    'suffix' => 'products',
                    'default' => '20',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price_each',
                    'label' => 'Price per product',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '0.25',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cycles',
                    'label' => 'Cycles a year',
                    'type' => 'number',
                    'suffix' => 'cycles',
                    'default' => '13',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cost_cycle',
                    'label' => 'Cost a cycle',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'products_year',
                    'label' => 'Products a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'products',
                ],
                [
                    'name' => 'cost_year',
                    'label' => 'Cost a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'cost_month',
                    'label' => 'Cost a month',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'cost_decade',
                    'label' => 'Cost over ten years',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        'cost_cycle' => 'products_cycle * price_each',
        'products_year' => 'products_cycle * cycles',
        'cost_year' => 'products_cycle * cycles * price_each',
        'cost_month' => 'products_cycle * cycles * price_each / 12',
        'cost_decade' => 'products_cycle * cycles * price_each * 10',
    ],
    'article' => [
        'intro' => 'The products used in a cycle, the cost of a cycle, and what the same habit costs over a year and a decade, from two numbers on a supermarket receipt.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Thirteen cycles a year at twenty products a cycle is 260 products, and at twenty-five cents each that is 65 a year. It is not a large number and it is a number that has never appeared on a budget, because the spending arrives in small amounts four days a month.</p><p>The decade figure is the one that changes the argument about a reusable product. A cup or a pair of period pants costs 25 to 40 and lasts years, which is the same money in a different shape.</p><p>The answer is <strong>cost a cycle and products a year and cost a year and cost a month and cost over ten years</strong>, worked out from products a cycle and price per product and cycles a year. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>cost_cycle</strong></td><td><code>Products a cycle × Price per product</code></td></tr><tr><td><strong>products_year</strong></td><td><code>Products a cycle × Cycles a year</code></td></tr><tr><td><strong>cost_year</strong></td><td><code>Products a cycle × Cycles a year × Price per product</code></td></tr><tr><td><strong>cost_month</strong></td><td><code>Products a cycle × Cycles a year × Price per product ÷ 12</code></td></tr><tr><td><strong>cost_decade</strong></td><td><code>Products a cycle × Cycles a year × Price per product × 10</code></td></tr></tbody></table><p>Products a cycle times the price gives a cycle's cost. Times the cycles gives the year, a twelfth of that is the month, and ten times it is the decade, all with no compounding because the price is assumed steady.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports cost a cycle and products a year and cost a year and cost a month and cost over ten years.</p><ul><li><strong>Products a cycle</strong> — products.</li><li><strong>Price per product</strong> — $.</li><li><strong>Cycles a year</strong> — cycles.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Cost a cycle</strong> — $.</li><li><strong>Products a year</strong> — products.</li><li><strong>Cost a year</strong> — $.</li><li><strong>Cost a month</strong> — $.</li><li><strong>Cost over ten years</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put products a cycle = 20 products, price per product = 0.25 $, cycles a year = 13 cycles into the form and the panel reads:</p><ul><li><strong>Cost a cycle</strong> = <code>Products a cycle × Price per product</code> = <strong>5 $</strong></li><li><strong>Products a year</strong> = <code>Products a cycle × Cycles a year</code> = <strong>260 products</strong></li><li><strong>Cost a year</strong> = <code>Products a cycle × Cycles a year × Price per product</code> = <strong>65 $</strong></li><li><strong>Cost a month</strong> = <code>Products a cycle × Cycles a year × Price per product ÷ 12</code> = <strong>5.417 $</strong></li><li><strong>Cost over ten years</strong> = <code>Products a cycle × Cycles a year × Price per product × 10</code> = <strong>650 $</strong></li></ul><p>At 35 cents a product the year is 91 and the decade 910, which is where a reusable product starts to pay for itself inside three years.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 × 0.25</code>, which comes to <strong>5 $</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Twenty products a cycle at 25 cents is 5 a cycle, 260 products a year, 65 a year, 5.42 a month and 650 over ten years.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Cost a cycle</th><th>Products a year</th><th>Cost a year</th><th>Cost a month</th><th>Cost over ten years</th></tr></thead><tbody><tr><td><strong>Products a cycle</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Price per product</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Cycles a year</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Products a cycle</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Products a cycle</strong> opens at 20 products</li><li><strong>Price per product</strong> opens at 0.25 $</li><li><strong>Cycles a year</strong> opens at 13 cycles</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Products a cycle</th><th>Cost a cycle</th><th>Products a year</th><th>Cost a year</th><th>Cost a month</th><th>Cost over ten years</th></tr></thead><tbody><tr><td>10 products</td><td>2.5</td><td>130</td><td>32.5</td><td>2.708</td><td>325</td></tr><tr><td>20 products</td><td>5</td><td>260</td><td>65</td><td>5.417</td><td>650</td></tr><tr><td>40 products</td><td>10</td><td>520</td><td>130</td><td>10.833</td><td>1 300</td></tr><tr><td>100 products</td><td>25</td><td>1 300</td><td>325</td><td>27.083</td><td>3 250</td></tr><tr><td>200 products</td><td>50</td><td>2 600</td><td>650</td><td>54.167</td><td>6 500</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set products a cycle = 20, price per product = 0.35, cycles a year = 13: <strong>Cost a cycle</strong> = 7 $, <strong>Products a year</strong> = 260 products, <strong>Cost a year</strong> = 91 $, <strong>Cost a month</strong> = 7.583 $, <strong>Cost over ten years</strong> = 910 $. At 35 cents the year is 91 and the decade 910, so a 30-dollar cup has paid for itself in four months of the difference.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Counting only tampons or only pads.</strong> Most people use both and the mix changes with the cycle. The field takes a total, so add them before typing.</li><li><strong>Assuming the price is steady.</strong> Ten years of the same product at a price that tracks inflation is more than ten times today's figure, and the difference is exactly the tax a reusable product avoids.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Products only.</strong> Pain relief, hot water bottles and the laundry of an accident all add to the real cost and are not in this figure.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need products a cycle and price per product and cycles a year. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Cost a cycle and products a year and cost a year and cost a month and cost over ten years should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Working out whether a reusable product pays for itself.</li></li><li><li>Putting a line in a household budget that is usually invisible.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/diaper">Nappy cost</a> <a href="/everyday-life/grocery">Grocery budget</a> <a href="/everyday-life/price-per-unit">Price per unit</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Products a cycle</strong> ×10</td><td>5</td><td>50</td><td>ten times larger</td></tr><tr><td><strong>Price per product</strong> ×10</td><td>5</td><td>50</td><td>ten times larger</td></tr><tr><td><strong>Cycles a year</strong> ×10</td><td>5</td><td>5</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Period Products Cost calculator work out?', 'a' => <<<'TXT'
            It returns cost a cycle and products a year and cost a year and cost a month and cost over ten years from products a cycle and price per product and cycles a year. The relationship is Products a cycle × Price per product.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Products a cycle (products), Price per product ($), Cycles a year (cycles). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: products a cycle in products; price per product in $; cycles a year in cycles. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How many products is a cycle?', 'a' => 'Between 15 and 25 for most people, depending on flow and product. Twenty is a working average, and the page takes your own figure.'],
            ['q' => 'Is the decade figure realistic?', 'a' => 'It assumes a steady price and a steady habit. Both change, and the order of magnitude is right, which is what a decision about a reusable product needs.'],
            ['q' => 'Do tampons cost more than pads?', 'a' => 'Usually a little more per unit and fewer are used per cycle. The total is close, which is why the field asks for the mix rather than the product.'],
        ],
        'related' => [
            ['path' => '/everyday-life/diaper', 'name' => 'Nappy cost'],
            ['path' => '/everyday-life/grocery', 'name' => 'Grocery budget'],
            ['path' => '/everyday-life/price-per-unit', 'name' => 'Price per unit'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
