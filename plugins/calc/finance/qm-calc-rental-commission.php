<?php

/**
 * Rental commission
 * /finance/rental-commission
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rental commission',
    'meta' => ['title' => 'Rental commission: Formula, Steps & Results', 'description' => 'Rental commission turns monthly rent and custom percentage into annual rent and ½ month (4.17%). Results come back in USD, with any other unit a click away.', 'h1' => 'Rental commission Calculator', 'updated' => '2024-02-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annual_rent',
                            'label' => 'Annual rent',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly_rent',
                            'label' => 'Monthly rent',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Commission',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'half_a_month',
                            'label' => '½ month (4.17%)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'one_month',
                            'label' => '1 month (8.33%)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'one_and_a_half_months',
                            'label' => '1½ months (12.5%)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Custom commission',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'custom_percentage',
                            'label' => 'Custom percentage',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15.000000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'custom_amount',
                            'label' => 'Custom amount',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'annual_rent = one_month * 12',
            'results' => ['one_month' => '(1/12)*annual_rent', 'annual_rent' => '12*one_month'],
        ],
        [
            'title' => 'one_and_a_half_months = one_month * 1.5',
            'results' => ['one_month' => '(2/3)*one_and_a_half_months', 'one_and_a_half_months' => '(3/2)*one_month'],
        ],
        [
            'title' => 'custom_amount = custom_percentage * annual_rent',
            'results' => ['custom_amount' => 'annual_rent*custom_percentage', 'custom_percentage' => 'custom_amount/annual_rent', 'annual_rent' => 'custom_amount/custom_percentage'],
        ],
        [
            'title' => 'half_a_month = one_month * 0.5',
            'results' => ['one_month' => '2*half_a_month', 'half_a_month' => '(1/2)*one_month'],
        ],
        [
            'title' => 'one_month = monthly_rent',
            'results' => ['one_month' => 'monthly_rent', 'monthly_rent' => 'one_month'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Rental commission takes 1 month (8.33%) and returns Annual rent and Monthly rent. It is a single relationship that reads annual rent out of 1 month (8.33%), not a table of canned results keyed by them. Units for Annual rent default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Rental commission calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Rental commission: it takes 1 number and reports Annual rent, Monthly rent and ½ month (4.17%).</p><p>The relationship it solves reads Annual rent = 12 × 1 month (8.33%).</p><p>What comes back is Annual rent, Monthly rent, ½ month (4.17%) and 1½ months (12.5%) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>1 month (8.33%)</strong> — in USD</li></ul><p>What you get back is Annual rent in USD, Monthly rent in USD, ½ month (4.17%) in USD, 1½ months (12.5%) in USD, Custom percentage in percent, Custom amount in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Annual rent = 10 USD, Monthly rent = 100 USD, ½ month (4.17%) = 1000 USD, 1½ months (12.5%) = 10 USD, Custom percentage = 15 perc and Custom amount = 1000 USD — through the same formula and the panel reports <strong>1 month (8.33%)</strong> = 0.8333 USD.</p><ul><li><strong>1 month (8.33%)</strong> = 0.8333 USD</li></ul><p>The line behind those figures is <strong>Annual rent</strong> = <code>12 × 1 month (8.33%)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>1 month (8.33%)</strong> = 0.8333 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Custom percentage offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Annual rent</strong> = <code>12 × 1 month (8.33%)</code></li><li><strong>1 month (8.33%)</strong> = <code>(1 ÷ 12) × Annual rent</code></li><li><strong>1½ months (12.5%)</strong> = <code>(3 ÷ 2) × 1 month (8.33%)</code></li><li><strong>Custom amount</strong> = <code>Annual rent × Custom percentage</code></li><li><strong>Custom percentage</strong> = <code>Custom amount ÷ Annual rent</code></li><li><strong>½ month (4.17%)</strong> = <code>(1 ÷ 2) × 1 month (8.33%)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Annual rent</strong> = <code>12 × 1 month (8.33%)</code> — the form to use when 1 month (8.33%) are the values you have.</li><li><strong>1 month (8.33%)</strong> = <code>(1 ÷ 12) × Annual rent</code> — the form to use when Annual rent are the values you have.</li><li><strong>1½ months (12.5%)</strong> = <code>(3 ÷ 2) × 1 month (8.33%)</code> — the form to use when 1 month (8.33%) are the values you have.</li><li><strong>1 month (8.33%)</strong> = <code>(2 ÷ 3) × 1½ months (12.5%)</code> — the form to use when 1½ months (12.5%) are the values you have.</li><li><strong>Custom amount</strong> = <code>Annual rent × Custom percentage</code> — the form to use when Annual rent and Custom percentage are the values you have.</li><li><strong>Custom percentage</strong> = <code>Custom amount ÷ Annual rent</code> — the form to use when Custom amount and Annual rent are the values you have.</li><li><strong>Annual rent</strong> = <code>Custom amount ÷ Custom percentage</code> — the form to use when Custom amount and Custom percentage are the values you have.</li><li><strong>½ month (4.17%)</strong> = <code>(1 ÷ 2) × 1 month (8.33%)</code> — the form to use when 1 month (8.33%) are the values you have.</li></ul><p>Any one of Annual rent, 1 month (8.33%) and 1½ months (12.5%) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Annual rent from 10 to 20, leaving every other box alone. The panel moves from <strong>1 month (8.33%)</strong> 0.8333 USD to <strong>1 month (8.33%)</strong> 1.67 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Annual rent, Monthly rent and ½ month (4.17%) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>1 month (8.33%) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If 1 month (8.33%) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If 1 month (8.33%) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>1 month (8.33%)</strong> takes a plain number with no unit attached. It feeds Annual rent, 1½ months (12.5%) and ½ month (4.17%). Have it to hand before you start: 1 month (8.33%) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 6 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Annual rent</strong> is a plain number. It is computed from 1 month (8.33%), so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Monthly rent</strong> is a plain number. It is computed from 1 month (8.33%), so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>½ month (4.17%)</strong> is a plain number. It is computed from 1 month (8.33%), so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>1½ months (12.5%)</strong> is a plain number. It is computed from 1 month (8.33%), so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Custom percentage</strong> is a percent figure. It is computed from Custom amount and Annual rent, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Custom amount</strong> is a plain number. It is computed from Annual rent and Custom percentage, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>1 month (8.33%)</th></tr></thead><tbody><tr><td><strong>Annual rent</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Monthly rent</strong> +10%</td><td>+0%</td></tr><tr><td><strong>½ month (4.17%)</strong> +10%</td><td>+0%</td></tr><tr><td><strong>1½ months (12.5%)</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Custom percentage</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Custom amount</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Annual rent sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Monthly rent, ½ month (4.17%) and 1½ months (12.5%) barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Annual rent = 5 USD, Monthly rent = 50 USD, ½ month (4.17%) = 500 USD, 1½ months (12.5%) = 5 USD, Custom percentage = 7.5 perc and Custom amount = 500 USD, the answer is <strong>1 month (8.33%)</strong> = 0.4167 USD.</li><li>With Annual rent = 30 USD, Monthly rent = 100 USD, ½ month (4.17%) = 1000 USD, 1½ months (12.5%) = 10 USD, Custom percentage = 15 perc and Custom amount = 1000 USD, the answer is <strong>1 month (8.33%)</strong> = 2.5 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Annual rent follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: 1 month (8.33%) measured, Annual rent and Monthly rent wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/price-to-book-ratio">Price to book ratio Calculator</a>, <a href="/finance/price-to-cash-flow-ratio">Price to cash flow ratio Calculator</a> and <a href="/finance/price-to-sales-ratio">Price to sales ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rental commission calculator work out?', 'a' => 'Annual rent, Monthly rent, ½ month (4.17%) and 1½ months (12.5%), from 1 month (8.33%). The relationship is Annual rent = 12 × 1 month (8.33%).'],
            ['q' => 'Which values do I need before I start?', 'a' => '1 month (8.33%) (USD). Enter 1 month (8.33%); Annual rent is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Annual rent, 1 month (8.33%), 1½ months (12.5%) and Custom amount blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => '1 month (8.33%) = 0.8333 USD. Those are the defaults written into the form — move 1 month (8.33%) and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Annual rent is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With 1 month (8.33%) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Annual rent keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/price-to-book-ratio', 'name' => 'Price to book ratio Calculator'],
            ['path' => '/finance/price-to-cash-flow-ratio', 'name' => 'Price to cash flow ratio Calculator'],
            ['path' => '/finance/price-to-sales-ratio', 'name' => 'Price to sales ratio Calculator'],
        ],
        'authors' => [],
    ],
];
