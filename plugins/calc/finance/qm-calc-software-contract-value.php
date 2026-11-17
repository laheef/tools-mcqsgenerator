<?php

/**
 * Software contract value
 * /finance/software-contract-value
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Software contract value',
    'meta' => ['title' => 'Software contract value — Formula & Results', 'description' => 'Software contract value turns retail price and seats into discount amount. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Software contract value Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => 'Pricing inputs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'retail_price',
                            'label' => 'Retail price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'seats',
                            'label' => 'Seats',
                            'type' => 'number',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discount',
                            'label' => 'Discount',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discount_amount',
                            'label' => 'Discount amount',
                            'type' => 'number',
                            'help' => 'If the discount is a specific amount, like $50, just use this field.',
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
                            'name' => 'contract_length',
                            'label' => 'Contract duration',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Software contract costs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discounted_price',
                            'label' => 'Discounted price',
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
                            'name' => 'monthly_cost',
                            'label' => 'Monthly cost',
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
                            'name' => 'annual_cost',
                            'label' => 'Annual cost',
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
                            'name' => 'contract_value',
                            'label' => 'Contract value',
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
            'title' => 'discounted_price = retail_price * (1 - discount)',
            'results' => ['retail_price' => '-discounted_price/(discount - 1)', 'discounted_price' => 'retail_price*(1 - discount)', 'discount' => '(-discounted_price + retail_price)/retail_price'],
        ],
        [
            'title' => 'monthly_cost = seats * discounted_price',
            'results' => ['monthly_cost' => 'discounted_price*seats', 'discounted_price' => 'monthly_cost/seats', 'seats' => 'monthly_cost/discounted_price'],
        ],
        [
            'title' => 'discount_amount = discount * retail_price',
            'results' => ['retail_price' => 'discount_amount/discount', 'discount_amount' => 'discount*retail_price', 'discount' => 'discount_amount/retail_price'],
        ],
        [
            'title' => 'annual_cost = monthly_cost * 12',
            'results' => ['annual_cost' => '12*monthly_cost', 'monthly_cost' => '(1/12)*annual_cost'],
        ],
        [
            'title' => 'contract_value = contract_length * monthly_cost',
            'results' => ['monthly_cost' => 'contract_value/contract_length', 'contract_value' => 'contract_length*monthly_cost', 'contract_length' => 'contract_value/monthly_cost'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Software contract value takes Retail price and Discount and returns Seats and Discount amount. Nothing is looked up on this page: seats is computed from retail price and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Software contract value calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Software contract value: it takes 2 numbers and reports Seats, Discount amount and Contract duration.</p><p>Written with the labels from the form, Discounted price = Retail price × (1 − Discount).</p><p>The answers are Seats, Discount amount, Contract duration and Discounted price; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Retail price</strong> — in USD</li><li><strong>Discount</strong> — in percent</li></ul><p>The result boxes are Seats, Discount amount in USD, Contract duration in years / months, Discounted price in USD, Monthly cost in USD, Annual cost in USD, Contract value in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Retail price = 10 USD, Seats = 100, Discount = 1000 perc, Discount amount = 10 USD, Contract duration = 100 yrsmos, Monthly cost = 1000 USD, Annual cost = 10 USD and Contract value = 100 USD gives <strong>Discounted price</strong> = -9990 USD.</p><ul><li><strong>Discounted price</strong> = -9990 USD</li></ul><p>The line behind those figures is <strong>Discounted price</strong> = <code>Retail price × (1 − Discount)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Discounted price</strong> = -9990 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Contract duration offers 9 units and opens on years / months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Discounted price</strong> = <code>Retail price × (1 − Discount)</code></li><li><strong>Retail price</strong> = <code>− Discounted price ÷ (Discount − 1)</code></li><li><strong>Discount</strong> = <code>( − Discounted price + Retail price) ÷ Retail price</code></li><li><strong>Monthly cost</strong> = <code>Discounted price × Seats</code></li><li><strong>Seats</strong> = <code>Monthly cost ÷ Discounted price</code></li><li><strong>Discount amount</strong> = <code>Discount × Retail price</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Discounted price</strong> = <code>Retail price × (1 − Discount)</code> — the form to use when Retail price and Discount are the values you have.</li><li><strong>Retail price</strong> = <code>− Discounted price ÷ (Discount − 1)</code> — the form to use when Discounted price and Discount are the values you have.</li><li><strong>Discount</strong> = <code>( − Discounted price + Retail price) ÷ Retail price</code> — the form to use when Discounted price and Retail price are the values you have.</li><li><strong>Monthly cost</strong> = <code>Discounted price × Seats</code> — the form to use when Discounted price and Seats are the values you have.</li><li><strong>Discounted price</strong> = <code>Monthly cost ÷ Seats</code> — the form to use when Monthly cost and Seats are the values you have.</li><li><strong>Seats</strong> = <code>Monthly cost ÷ Discounted price</code> — the form to use when Monthly cost and Discounted price are the values you have.</li><li><strong>Discount amount</strong> = <code>Discount × Retail price</code> — the form to use when Discount and Retail price are the values you have.</li><li><strong>Retail price</strong> = <code>Discount amount ÷ Discount</code> — the form to use when Discount amount and Discount are the values you have.</li></ul><p>Any one of Discounted price, Retail price and Discount can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Retail price, from 10 to 20 — and the answers go from <strong>Discounted price</strong> -9990 USD to <strong>Discounted price</strong> -19980 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Discount is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Seats, Discount amount and Contract duration are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Retail price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Retail price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Discount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Discount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Retail price is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Retail price</strong> takes a plain number with no unit attached. The page reads it when it works out Discounted price, Discount and Discount amount. Have it to hand before you start: Retail price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Discount</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Retail price, Discounted price and Discount amount. Have it to hand before you start: Discount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Seats</strong> is a plain number. It is computed from Monthly cost and Discounted price, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Discount amount</strong> is a plain number. It is computed from Discount and Retail price, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Contract duration</strong> is a years / months figure. It is computed from Contract value and Monthly cost, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Discounted price</strong> is a plain number and the page's own defaults put it at -9990. It is computed from Retail price and Discount, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Monthly cost</strong> is a plain number. It is computed from Discounted price and Seats, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Annual cost</strong> is a plain number. It is computed from Monthly cost, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Contract value</strong> is a plain number. It is computed from Contract duration and Monthly cost, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Discounted price</th></tr></thead><tbody><tr><td><strong>Retail price</strong> +10%</td><td>-10%</td></tr><tr><td><strong>Seats</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Discount</strong> +10%</td><td>-10.01%</td></tr><tr><td><strong>Discount amount</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Contract duration</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Monthly cost</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Annual cost</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Contract value</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Discount sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Seats, Discount amount and Contract duration barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Seats follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are years / months and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Retail price and Discount are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Retail price and Discount measured, Seats and Discount amount wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/net-worth">Net worth Calculator</a>, <a href="/finance/new-jersey-sales-tax">New Jersey sales tax</a> and <a href="/finance/new-york-overtime">New York overtime</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Software contract value calculator work out?', 'a' => <<<'TXT'
            Seats, Discount amount, Contract duration and Discounted price, from Retail price and Discount. The relationship is Discounted price = Retail price × (1 − Discount).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Retail price (USD), Discount (percent). Enter retail price and discount; Seats is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Discounted price, Retail price, Discount and Monthly cost blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Discounted price = -9990 USD. Those are the defaults written into the form — move Retail price and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Seats is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Retail price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Seats keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/net-worth', 'name' => 'Net worth Calculator'],
            ['path' => '/finance/new-jersey-sales-tax', 'name' => 'New Jersey sales tax'],
            ['path' => '/finance/new-york-overtime', 'name' => 'New York overtime'],
        ],
        'authors' => [],
    ],
];
