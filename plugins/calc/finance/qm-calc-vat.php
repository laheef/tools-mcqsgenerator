<?php

/**
 * VAT
 * /finance/vat
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'VAT',
    'meta' => ['title' => 'VAT Calculator — Free, With Worked Examples', 'description' => 'VAT reports gross price, tax amount and net price. Every figure is computed. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'VAT Calculator', 'updated' => '2026-03-19'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amount',
                            'label' => 'Amount',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'vat_tax',
                            'label' => 'VAT rate',
                            'type' => 'number',
                            'help' => 'The value added tax (VAT) that a government charges on goods and services. Only paid by the final consumer of the product.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'add_exclude_VAT',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Add VAT' => '0', 'Exclude VAT' => '1'],
                            'dataset' => 'exclude or add',
                            'default' => 'Add VAT',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Result',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gross_price',
                            'label' => 'Gross price',
                            'type' => 'number',
                            'help' => 'The price of the product after VAT is applied.',
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
                            'name' => 'tax_amount_gross',
                            'label' => 'Tax amount',
                            'type' => 'number',
                            'help' => 'How much of the gross price should be paid as tax.',
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
                            'name' => 'net_price',
                            'label' => 'Net price',
                            'type' => 'number',
                            'help' => 'The price of the product before VAT is applied.',
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
                            'name' => 'tax_amount_net',
                            'label' => 'Tax amount',
                            'type' => 'number',
                            'help' => 'How much of the gross price should be paid as tax.',
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
            'title' => 'gross_price = amount * (1 + vat_tax)',
            'results' => ['amount' => 'gross_price/(vat_tax + 1)', 'gross_price' => 'amount*(vat_tax + 1)', 'vat_tax' => '(-amount + gross_price)/amount'],
        ],
        [
            'title' => 'net_price = amount / (1 + vat_tax)',
            'results' => ['amount' => 'net_price*(vat_tax + 1)', 'net_price' => 'amount/(vat_tax + 1)', 'vat_tax' => '(amount - net_price)/net_price'],
        ],
        [
            'title' => 'tax_amount_gross = vat_tax * amount',
            'results' => ['tax_amount_gross' => 'amount*vat_tax', 'amount' => 'tax_amount_gross/vat_tax', 'vat_tax' => 'tax_amount_gross/amount'],
        ],
        [
            'title' => 'tax_amount_gross = gross_price - amount',
            'results' => ['tax_amount_gross' => '-amount + gross_price', 'amount' => 'gross_price - tax_amount_gross', 'gross_price' => 'amount + tax_amount_gross'],
        ],
        [
            'title' => 'tax_amount_net = vat_tax * net_price',
            'results' => ['tax_amount_net' => 'net_price*vat_tax', 'net_price' => 'tax_amount_net/vat_tax', 'vat_tax' => 'tax_amount_net/net_price'],
        ],
        [
            'title' => 'tax_amount_net = amount - net_price',
            'results' => ['tax_amount_net' => 'amount - net_price', 'amount' => 'net_price + tax_amount_net', 'net_price' => 'amount - tax_amount_net'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        VAT turns Amount and VAT rate into Gross price and Tax amount. The arithmetic is the whole method: gross price is worked out from amount by one formula, applied once. Gross price comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the VAT calculator works', 'html' => <<<'TXT'
            <p>VAT answers one question from 2 numbers, and the answer is Gross price, Tax amount and Net price.</p><p>The relationship it solves reads Gross price = Amount × (VAT rate + 1).</p><p>The answers are Gross price, Tax amount, Net price and Tax amount; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Amount</strong> — in USD</li><li><strong>VAT rate</strong> — in percent. The value added tax (VAT) that a government charges on goods and services. Only paid by the final consumer of the product.</li></ul><p>The result boxes are Gross price in USD, Tax amount in USD, Net price in USD, Tax amount in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: VAT rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Gross price</strong> = <code>Amount × (VAT rate + 1)</code></li><li><strong>Amount</strong> = <code>Gross price ÷ (VAT rate + 1)</code></li><li><strong>VAT rate</strong> = <code>( − Amount + Gross price) ÷ Amount</code></li><li><strong>Net price</strong> = <code>Amount ÷ (VAT rate + 1)</code></li><li><strong>Tax amount</strong> = <code>Amount × VAT rate</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Gross price</strong> = <code>Amount × (VAT rate + 1)</code> — the form to use when Amount and VAT rate are the values you have.</li><li><strong>Amount</strong> = <code>Gross price ÷ (VAT rate + 1)</code> — the form to use when Gross price and VAT rate are the values you have.</li><li><strong>VAT rate</strong> = <code>( − Amount + Gross price) ÷ Amount</code> — the form to use when Amount and Gross price are the values you have.</li><li><strong>Net price</strong> = <code>Amount ÷ (VAT rate + 1)</code> — the form to use when Amount and VAT rate are the values you have.</li><li><strong>Amount</strong> = <code>Net price × (VAT rate + 1)</code> — the form to use when Net price and VAT rate are the values you have.</li><li><strong>VAT rate</strong> = <code>(Amount − Net price) ÷ Net price</code> — the form to use when Amount and Net price are the values you have.</li><li><strong>Tax amount</strong> = <code>Amount × VAT rate</code> — the form to use when Amount and VAT rate are the values you have.</li><li><strong>Amount</strong> = <code>Tax amount ÷ VAT rate</code> — the form to use when Tax amount and VAT rate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Gross price, Amount and VAT rate can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside VAT rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Gross price, Tax amount and Net price are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>VAT rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If VAT rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Amount to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Amount</strong> takes a plain number with no unit attached. Change it and Gross price, VAT rate and Net price changes with it. Have it to hand before you start: Amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>VAT rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The value added tax (VAT) that a government charges on goods and services. Only paid by the final consumer of the product. Change it and Amount, Gross price and Net price changes with it. Have it to hand before you start: VAT rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Gross price</strong> is a plain number. It is computed from Amount and VAT rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Tax amount</strong> is a plain number. It is computed from Amount and VAT rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Net price</strong> is a plain number. It is computed from Amount and VAT rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Tax amount</strong> is a plain number. It is computed from Net price and VAT rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Gross price follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Amount and VAT rate and the number you are missing is Gross price and Tax amount.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/bill-rate">Bill rate Calculator</a>, <a href="/finance/billable-hours">Billable hours Calculator</a> and <a href="/finance/bitcoin-etf">Bitcoin ETF Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what VAT is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Amount and VAT rate beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the VAT calculator work out?', 'a' => 'Gross price, Tax amount, Net price and Tax amount, from Amount and VAT rate. The relationship is Gross price = Amount × (VAT rate + 1).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Amount (USD), VAT rate (percent). With amount and VAT rate in place, Gross price can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Gross price, Amount, VAT rate and Net price can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Gross price is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Amount left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Gross price keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/bill-rate', 'name' => 'Bill rate Calculator'],
            ['path' => '/finance/billable-hours', 'name' => 'Billable hours Calculator'],
            ['path' => '/finance/bitcoin-etf', 'name' => 'Bitcoin ETF Calculator'],
        ],
        'authors' => [],
    ],
];
