<?php

/**
 * GST
 * /finance/gst
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'GST',
    'meta' => ['title' => 'GST Calculator — Free, With Worked Examples', 'description' => 'GST works out gross price. The formula is printed in the form\'s own words. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'GST Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gross',
                            'label' => 'Gross price',
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
                            'name' => 'tax',
                            'label' => 'GST',
                            'type' => 'number',
                            'help' => 'Goods and Services Tax rate',
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
                            'name' => 'tax_amount',
                            'label' => 'Tax amount',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
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
            'results' => ['gross' => 'net*(tax + 1)', 'tax' => '(gross - net)/net', 'net' => 'gross/(tax + 1)'],
        ],
        [
            'title' => 'tax_amount = tax * net',
            'results' => ['tax' => 'tax_amount/net', 'tax_amount' => 'net*tax', 'net' => 'tax_amount/tax'],
        ],
        [
            'title' => 'tax_amount = gross - net',
            'results' => ['gross' => 'net + tax_amount', 'tax_amount' => 'gross - net', 'net' => 'gross - tax_amount'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        GST turns GST and Net price into Gross price and Tax amount. There is no hidden constant here: change gross price and GST moves with it. The main result, Gross price, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the GST calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind GST: it takes 2 numbers and reports Gross price and Tax amount.</p><p>In the form&#039;s own words, Gross price = Net price × (GST + 1).</p><p>What comes back is Gross price and Tax amount — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>GST</strong> — in percent. Goods and Services Tax rate</li><li><strong>Net price</strong> — in USD</li></ul><p>What you get back is Gross price in USD, Tax amount in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, GST = 10 perc and Net price = 100 USD gives <strong>Gross price</strong> = 1100 USD and <strong>Tax amount</strong> = 1000 USD.</p><ul><li><strong>Gross price</strong> = 1100 USD</li><li><strong>Tax amount</strong> = 1000 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Gross price</strong> = <code>Net price × (GST + 1)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Gross price</strong> = 1100 and <strong>Tax amount</strong> = 1000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: GST offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Gross price</strong> = <code>Net price × (GST + 1)</code></li><li><strong>GST</strong> = <code>(Gross price − Net price) ÷ Net price</code></li><li><strong>Net price</strong> = <code>Gross price ÷ (GST + 1)</code></li><li><strong>Tax amount</strong> = <code>Net price × GST</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Gross price</strong> = <code>Net price × (GST + 1)</code> — the form to use when Net price and GST are the values you have.</li><li><strong>GST</strong> = <code>(Gross price − Net price) ÷ Net price</code> — the form to use when Gross price and Net price are the values you have.</li><li><strong>Net price</strong> = <code>Gross price ÷ (GST + 1)</code> — the form to use when Gross price and GST are the values you have.</li><li><strong>Tax amount</strong> = <code>Net price × GST</code> — the form to use when Net price and GST are the values you have.</li><li><strong>GST</strong> = <code>Tax amount ÷ Net price</code> — the form to use when Tax amount and Net price are the values you have.</li><li><strong>Net price</strong> = <code>Tax amount ÷ GST</code> — the form to use when Tax amount and GST are the values you have.</li><li><strong>Tax amount</strong> = <code>Gross price − Net price</code> — the form to use when Gross price and Net price are the values you have.</li><li><strong>Gross price</strong> = <code>Net price + Tax amount</code> — the form to use when Net price and Tax amount are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Gross price, GST and Net price can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double GST from 10 to 20, leaving every other box alone. The panel moves from <strong>Gross price</strong> 1100 USD and <strong>Tax amount</strong> 1000 USD to <strong>Gross price</strong> 2100 USD and <strong>Tax amount</strong> 2000 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside GST is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Gross price and Tax amount are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>GST left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If GST is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Net price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Net price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If GST is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>GST</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Goods and Services Tax rate. It feeds Gross price, Net price and Tax amount. Have it to hand before you start: GST is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Net price</strong> takes a plain number with no unit attached. It feeds Gross price, GST and Tax amount. Have it to hand before you start: Net price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Gross price</strong> is a plain number and the page's own defaults put it at 1100. It is worked out from Net price and GST. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Tax amount</strong> is a plain number and the page's own defaults put it at 1000. It is worked out from Net price and GST. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Gross price</th><th>Tax amount</th></tr></thead><tbody><tr><td><strong>GST</strong> +10%</td><td>+9.09%</td><td>+10%</td></tr><tr><td><strong>Net price</strong> +10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Net price sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With GST = 5 perc and Net price = 50 USD, the answer is <strong>Gross price</strong> = 300 USD and <strong>Tax amount</strong> = 250 USD.</li><li>With GST = 30 perc and Net price = 100 USD, the answer is <strong>Gross price</strong> = 3100 USD and <strong>Tax amount</strong> = 3000 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Gross price follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when GST and Net price is what you already know and Gross price and Tax amount is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/unlevered-free-cash-flow">Unlevered free cash flow Calculator</a>, <a href="/finance/unpaid-work">Unpaid work</a> and <a href="/finance/us-income-percentile">US income percentile Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the GST calculator work out?', 'a' => 'Gross price and Tax amount, from Net price and GST. The relationship is Gross price = Net price × (GST + 1).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'GST (percent), Net price (USD). Enter GST and net price; Gross price is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Gross price, GST, Net price and Tax amount can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Gross price = 1100 USD and Tax amount = 1000 USD. The figures come from GST as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Gross price is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With GST left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Gross price at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/unlevered-free-cash-flow', 'name' => 'Unlevered free cash flow Calculator'],
            ['path' => '/finance/unpaid-work', 'name' => 'Unpaid work'],
            ['path' => '/finance/us-income-percentile', 'name' => 'US income percentile Calculator'],
        ],
        'authors' => [],
    ],
];
