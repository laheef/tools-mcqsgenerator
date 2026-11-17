<?php

/**
 * LTV (Loan to Value)
 * /finance/ltv
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'LTV (Loan to Value)',
    'meta' => ['title' => 'LTV (Loan to Value) Calculator: Free, With Steps', 'description' => 'LTV (Loan to Value) turns down payment and loan amount into purchase price. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'LTV (Loan to Value) Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'purchase_price',
                            'label' => 'Purchase price',
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
                            'name' => 'down_payment',
                            'label' => 'Down payment',
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
                            'name' => 'loan',
                            'label' => 'Loan amount',
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
                            'name' => 'ltv',
                            'label' => 'LTV (loan to value)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'purchase_price = down_payment + loan',
            'results' => ['purchase_price' => 'down_payment + loan', 'loan' => '-down_payment + purchase_price', 'down_payment' => '-loan + purchase_price'],
        ],
        [
            'title' => 'ltv = loan / purchase_price',
            'results' => ['ltv' => 'loan/purchase_price', 'purchase_price' => 'loan/ltv', 'loan' => 'ltv*purchase_price'],
        ],
        [
            'title' => 'ltv = 1 - down_payment/purchase_price',
            'results' => ['ltv' => '(-down_payment + purchase_price)/purchase_price', 'purchase_price' => '-down_payment/(ltv - 1)', 'down_payment' => 'purchase_price*(1 - ltv)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Down payment and Loan amount into LTV (Loan to Value) and the answer comes back as Purchase price and LTV (loan to value). Nothing is looked up on this page: purchase price is computed from down payment and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Purchase price is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the LTV (Loan to Value) calculator works', 'html' => <<<'TXT'
            <p>The LTV (Loan to Value) calculator applies one relationship to 2 numbers and reports Purchase price and LTV (loan to value).</p><p>In the form&#039;s own words, Purchase price = Down payment + Loan amount.</p><p>The result panel carries Purchase price and LTV (loan to value), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Down payment</strong> — in USD</li><li><strong>Loan amount</strong> — in USD</li></ul><p>The result boxes are Purchase price in USD, LTV (loan to value) in percent; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Down payment = 10 USD and Loan amount = 100 USD — through the same formula and the panel reports <strong>Purchase price</strong> = 110 USD and <strong>LTV (loan to value)</strong> = 0.9091 perc.</p><ul><li><strong>Purchase price</strong> = 110 USD</li><li><strong>LTV (loan to value)</strong> = 0.9091 perc</li></ul><p>The line behind those figures is <strong>Purchase price</strong> = <code>Down payment + Loan amount</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Purchase price</strong> = 110 and <strong>LTV (loan to value)</strong> = 0.9091. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on LTV (loan to value) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Purchase price</strong> = <code>Down payment + Loan amount</code></li><li><strong>Loan amount</strong> = <code>− Down payment + Purchase price</code></li><li><strong>Down payment</strong> = <code>− Loan amount + Purchase price</code></li><li><strong>LTV (loan to value)</strong> = <code>Loan amount ÷ Purchase price</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Purchase price</strong> = <code>Down payment + Loan amount</code> — the form to use when Down payment and Loan amount are the values you have.</li><li><strong>Loan amount</strong> = <code>− Down payment + Purchase price</code> — the form to use when Down payment and Purchase price are the values you have.</li><li><strong>Down payment</strong> = <code>− Loan amount + Purchase price</code> — the form to use when Loan amount and Purchase price are the values you have.</li><li><strong>LTV (loan to value)</strong> = <code>Loan amount ÷ Purchase price</code> — the form to use when Loan amount and Purchase price are the values you have.</li><li><strong>Purchase price</strong> = <code>Loan amount ÷ LTV (loan to value)</code> — the form to use when Loan amount and LTV (loan to value) are the values you have.</li><li><strong>Loan amount</strong> = <code>LTV (loan to value) × Purchase price</code> — the form to use when LTV (loan to value) and Purchase price are the values you have.</li><li><strong>LTV (loan to value)</strong> = <code>( − Down payment + Purchase price) ÷ Purchase price</code> — the form to use when Down payment and Purchase price are the values you have.</li><li><strong>Purchase price</strong> = <code>− Down payment ÷ (LTV (loan to value) − 1)</code> — the form to use when Down payment and LTV (loan to value) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Purchase price, Loan amount and Down payment can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Down payment, from 10 to 20 — and the answers go from <strong>Purchase price</strong> 110 USD and <strong>LTV (loan to value)</strong> 0.9091 perc to <strong>Purchase price</strong> 120 USD and <strong>LTV (loan to value)</strong> 0.8333 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Purchase price and LTV (loan to value) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Down payment left as a guess.</strong> Anything typed into Down payment is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Loan amount left as a guess.</strong> Anything typed into Loan amount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Down payment and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Down payment</strong> takes a plain number with no unit attached. The page reads it when it works out Purchase price, Loan amount and LTV (loan to value). Have it to hand before you start: Down payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Loan amount</strong> takes a plain number with no unit attached. The page reads it when it works out Purchase price, Down payment and LTV (loan to value). Have it to hand before you start: Loan amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Purchase price</strong> is a plain number and the page's own defaults put it at 110. It is worked out from Down payment and Loan amount. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>LTV (loan to value)</strong> is a percent figure and the page's own defaults put it at 0.9091 perc. It is worked out from Loan amount and Purchase price. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Purchase price</th><th>LTV (loan to value)</th></tr></thead><tbody><tr><td><strong>Down payment</strong> +10%</td><td>+0.91%</td><td>-0.9%</td></tr><tr><td><strong>Loan amount</strong> +10%</td><td>+9.09%</td><td>+0.83%</td></tr></tbody></table><p>The steepest column belongs to Loan amount: ten per cent there moves an answer by about 9.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Down payment = 5 USD and Loan amount = 50 USD, the answer is <strong>Purchase price</strong> = 55 USD and <strong>LTV (loan to value)</strong> = 0.9091 perc.</li><li>With Down payment = 30 USD and Loan amount = 100 USD, the answer is <strong>Purchase price</strong> = 130 USD and <strong>LTV (loan to value)</strong> = 0.7692 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Purchase price is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Down payment and Loan amount are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Down payment and Loan amount measured, Purchase price and LTV (loan to value) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/revenue">Revenue Calculator</a>, <a href="/finance/revenue-growth">Revenue growth Calculator</a> and <a href="/finance/revenue-per-employee">Revenue per employee</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the LTV (Loan to Value) calculator work out?', 'a' => 'Purchase price and LTV (loan to value), from Down payment and Loan amount. The relationship is Purchase price = Down payment + Loan amount.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Down payment (USD), Loan amount (USD). Fill down payment and loan amount and leave Purchase price empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Purchase price, Loan amount, Down payment and LTV (loan to value) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Purchase price = 110 USD and LTV (loan to value) = 0.9091 perc. The figures come from Down payment as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Purchase price is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Down payment left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Purchase price keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/revenue', 'name' => 'Revenue Calculator'],
            ['path' => '/finance/revenue-growth', 'name' => 'Revenue growth Calculator'],
            ['path' => '/finance/revenue-per-employee', 'name' => 'Revenue per employee'],
        ],
        'authors' => [],
    ],
];
