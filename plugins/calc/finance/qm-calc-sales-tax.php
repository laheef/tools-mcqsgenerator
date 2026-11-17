<?php

/**
 * Sales tax
 * /finance/sales-tax
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sales tax',
    'meta' => ['title' => 'Sales tax Calculator: Formula, Steps & Examples', 'description' => 'Sales tax works out gross price and tax amount and reports both. Every figure is computed. Results come back in USD, with any other unit a click away.', 'h1' => 'Sales tax Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax',
                            'label' => 'Sales tax',
                            'type' => 'number',
                            'help' => 'The sales tax that the government charges on the retail price of a product.',
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
                            'name' => 'net',
                            'label' => 'Net price',
                            'type' => 'number',
                            'help' => 'The price of the product before the sales tax is applied.',
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
                            'name' => 'gross',
                            'label' => 'Gross price',
                            'type' => 'number',
                            'help' => 'The price of the product after the sales tax is applied.',
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
                            'name' => 'tax_amount',
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
            'title' => 'gross = net + net * tax',
            'results' => ['tax' => '(gross - net)/net', 'net' => 'gross/(tax + 1)', 'gross' => 'net*(tax + 1)'],
        ],
        [
            'title' => 'tax_amount = tax * net',
            'results' => ['tax' => 'tax_amount/net', 'net' => 'tax_amount/tax', 'tax_amount' => 'net*tax'],
        ],
        [
            'title' => 'tax_amount = gross - net',
            'results' => ['net' => 'gross - tax_amount', 'gross' => 'net + tax_amount', 'tax_amount' => 'gross - net'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Sales tax takes Sales tax and Net price and returns Gross price and Tax amount. The arithmetic is the whole method: gross price is worked out from sales tax by one formula, applied once. Gross price comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Sales tax calculator works', 'html' => <<<'TXT'
            <p>Sales tax answers one question from 2 numbers, and the answer is Gross price and Tax amount.</p><p>The relationship it solves reads Gross price = Net price × (Sales tax + 1).</p><p>The answers are Gross price and Tax amount; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Sales tax</strong> — in percent. The sales tax that the government charges on the retail price of a product.</li><li><strong>Net price</strong> — in USD. The price of the product before the sales tax is applied.</li></ul><p>What you get back is Gross price in USD, Tax amount in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Sales tax = 10 perc and Net price = 100 USD — through the same formula and the panel reports <strong>Gross price</strong> = 1100 USD and <strong>Tax amount</strong> = 1000 USD.</p><ul><li><strong>Gross price</strong> = 1100 USD</li><li><strong>Tax amount</strong> = 1000 USD</li></ul><p>The line behind those figures is <strong>Gross price</strong> = <code>Net price × (Sales tax + 1)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Gross price</strong> = 1100 and <strong>Tax amount</strong> = 1000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Sales tax offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Gross price</strong> = <code>Net price × (Sales tax + 1)</code></li><li><strong>Sales tax</strong> = <code>(Gross price − Net price) ÷ Net price</code></li><li><strong>Net price</strong> = <code>Gross price ÷ (Sales tax + 1)</code></li><li><strong>Tax amount</strong> = <code>Net price × Sales tax</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Gross price</strong> = <code>Net price × (Sales tax + 1)</code> — the form to use when Net price and Sales tax are the values you have.</li><li><strong>Sales tax</strong> = <code>(Gross price − Net price) ÷ Net price</code> — the form to use when Gross price and Net price are the values you have.</li><li><strong>Net price</strong> = <code>Gross price ÷ (Sales tax + 1)</code> — the form to use when Gross price and Sales tax are the values you have.</li><li><strong>Tax amount</strong> = <code>Net price × Sales tax</code> — the form to use when Net price and Sales tax are the values you have.</li><li><strong>Sales tax</strong> = <code>Tax amount ÷ Net price</code> — the form to use when Tax amount and Net price are the values you have.</li><li><strong>Net price</strong> = <code>Tax amount ÷ Sales tax</code> — the form to use when Tax amount and Sales tax are the values you have.</li><li><strong>Tax amount</strong> = <code>Gross price − Net price</code> — the form to use when Gross price and Net price are the values you have.</li><li><strong>Net price</strong> = <code>Gross price − Tax amount</code> — the form to use when Gross price and Tax amount are the values you have.</li></ul><p>Any one of Gross price, Sales tax and Net price can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Sales tax, from 10 to 20 — and the answers go from <strong>Gross price</strong> 1100 USD and <strong>Tax amount</strong> 1000 USD to <strong>Gross price</strong> 2100 USD and <strong>Tax amount</strong> 2000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Sales tax is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Gross price and Tax amount are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Sales tax left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Sales tax is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Net price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Net price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Sales tax and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Sales tax form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Sales tax</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The sales tax that the government charges on the retail price of a product. The page reads it when it works out Net price, Gross price and Tax amount. Fill it from a measurement rather than a memory — Sales tax is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Net price</strong> takes a plain number with no unit attached. The price of the product before the sales tax is applied. The page reads it when it works out Sales tax, Gross price and Tax amount. Fill it from a measurement rather than a memory — Net price is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Gross price</strong> is a plain number and the page's own defaults put it at 1100. It is computed from Net price and Sales tax, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Tax amount</strong> is a plain number and the page's own defaults put it at 1000. It is computed from Net price and Sales tax, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Gross price</th><th>Tax amount</th></tr></thead><tbody><tr><td><strong>Sales tax</strong> +10%</td><td>+9.09%</td><td>+10%</td></tr><tr><td><strong>Net price</strong> +10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Net price sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Sales tax = 5 perc and Net price = 50 USD and the page reports <strong>Gross price</strong> = 300 USD and <strong>Tax amount</strong> = 250 USD.</li><li>Feed in Sales tax = 30 perc and Net price = 100 USD and the page reports <strong>Gross price</strong> = 3100 USD and <strong>Tax amount</strong> = 3000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Sales tax actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Gross price follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Sales tax and Net price are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Sales tax and Net price and the number you are missing is Gross price and Tax amount.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/parking-ratio">Parking ratio Calculator</a>, <a href="/finance/partially-amortized-loan">Partially amortized loan</a> and <a href="/finance/pay-raise">Pay raise Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sales tax calculator work out?', 'a' => 'Gross price and Tax amount, from Net price and Sales tax. The relationship is Gross price = Net price × (Sales tax + 1).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Sales tax (percent), Net price (USD). Fill sales tax and net price and leave Gross price empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Gross price, Sales tax, Net price and Tax amount blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Gross price = 1100 USD and Tax amount = 1000 USD. The figures come from Sales tax as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Gross price is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Sales tax blank and the page solves for it, reporting Gross price instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Gross price keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/parking-ratio', 'name' => 'Parking ratio Calculator'],
            ['path' => '/finance/partially-amortized-loan', 'name' => 'Partially amortized loan'],
            ['path' => '/finance/pay-raise', 'name' => 'Pay raise Calculator'],
        ],
        'authors' => [],
    ],
];
