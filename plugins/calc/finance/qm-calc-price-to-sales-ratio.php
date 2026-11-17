<?php

/**
 * Price to sales ratio
 * /finance/price-to-sales-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Price to sales ratio',
    'meta' => ['title' => 'Price to sales ratio Calculator: Free, With Steps', 'description' => 'Enter sales, number of shares outstanding and price per share and Price to sales ratio returns sales per share. The formula is printed in the form\'s own words.', 'h1' => 'Price to sales ratio Calculator', 'updated' => '2024-10-08'],
    'sections' => [
        [
            'title' => 'Revenue per share',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'revenue',
                            'label' => 'Sales',
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
                            'name' => 'number_of_share',
                            'label' => 'Number of shares outstanding',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'revenue_per_share',
                            'label' => 'Sales per share',
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
            'title' => 'Price to sales ratio',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_per_share',
                            'label' => 'Price per share',
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
                            'name' => 'ps_ratio',
                            'label' => 'Price to sales ratio',
                            'type' => 'number',
                            'suffix' => 'x',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'revenue_per_share = revenue / number_of_share',
            'results' => ['number_of_share' => 'revenue/revenue_per_share', 'revenue_per_share' => 'revenue/number_of_share', 'revenue' => 'number_of_share*revenue_per_share'],
        ],
        [
            'title' => 'ps_ratio = price_per_share / revenue_per_share',
            'results' => ['ps_ratio' => 'price_per_share/revenue_per_share', 'revenue_per_share' => 'price_per_share/ps_ratio', 'price_per_share' => 'ps_ratio*revenue_per_share'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Sales and Number of shares outstanding into Price to sales ratio and the answer comes back as Sales per share and Price per share. Nothing is looked up on this page: sales per share is computed from sales and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Sales per share is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Price to sales ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Price to sales ratio: it takes 2 numbers and reports Sales per share, Price per share and Price to sales ratio.</p><p>The relationship it solves reads Sales per share = Sales ÷ Number of shares outstanding.</p><p>What comes back is Sales per share, Price per share and Price to sales ratio — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Sales</strong> — in USD</li><li><strong>Number of shares outstanding</strong> — a plain number, no unit</li></ul><p>What you get back is Sales per share in USD, Price per share in USD, Price to sales ratio in x, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Sales = 10 USD, Number of shares outstanding = 100, Price per share = 1000 USD and Price to sales ratio = 10 x — through the same formula and the panel reports <strong>Sales per share</strong> = 0.1 USD.</p><ul><li><strong>Sales per share</strong> = 0.1 USD</li></ul><p>That is <strong>Sales per share</strong> = <code>Sales ÷ Number of shares outstanding</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Sales per share</strong> = 0.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Sales per share is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Sales per share</strong> = <code>Sales ÷ Number of shares outstanding</code></li><li><strong>Number of shares outstanding</strong> = <code>Sales ÷ Sales per share</code></li><li><strong>Sales</strong> = <code>Number of shares outstanding × Sales per share</code></li><li><strong>Price to sales ratio</strong> = <code>Price per share ÷ Sales per share</code></li><li><strong>Price per share</strong> = <code>Price to sales ratio × Sales per share</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Sales per share</strong> = <code>Sales ÷ Number of shares outstanding</code> — the form to use when Sales and Number of shares outstanding are the values you have.</li><li><strong>Number of shares outstanding</strong> = <code>Sales ÷ Sales per share</code> — the form to use when Sales and Sales per share are the values you have.</li><li><strong>Sales</strong> = <code>Number of shares outstanding × Sales per share</code> — the form to use when Number of shares outstanding and Sales per share are the values you have.</li><li><strong>Price to sales ratio</strong> = <code>Price per share ÷ Sales per share</code> — the form to use when Price per share and Sales per share are the values you have.</li><li><strong>Sales per share</strong> = <code>Price per share ÷ Price to sales ratio</code> — the form to use when Price per share and Price to sales ratio are the values you have.</li><li><strong>Price per share</strong> = <code>Price to sales ratio × Sales per share</code> — the form to use when Price to sales ratio and Sales per share are the values you have.</li></ul><p>Any one of Sales per share, Number of shares outstanding and Sales can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Sales, from 10 to 20 — and the answers go from <strong>Sales per share</strong> 0.1 USD to <strong>Sales per share</strong> 0.2 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Sales per share, Price per share and Price to sales ratio are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Sales left as a guess.</strong> Anything typed into Sales is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Number of shares outstanding left as a guess.</strong> Anything typed into Number of shares outstanding is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Sales is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Price to sales ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Sales</strong> takes a plain number with no unit attached. Change it and Number of shares outstanding and Sales per share changes with it. Fill it from a measurement rather than a memory — Sales is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of shares outstanding</strong> takes a plain number with no unit attached. Change it and Sales per share and Sales changes with it. Fill it from a measurement rather than a memory — Number of shares outstanding is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Sales per share</strong> is a plain number and the page's own defaults put it at 0.1. It is computed from Sales and Number of shares outstanding, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Price per share</strong> is a plain number. It is computed from Price to sales ratio and Sales per share, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Price to sales ratio</strong> is a plain number. It is computed from Price per share and Sales per share, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Sales per share</th></tr></thead><tbody><tr><td><strong>Sales</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Number of shares outstanding</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Price per share</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Price to sales ratio</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Sales: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Price per share and Price to sales ratio barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Sales = 5 USD, Number of shares outstanding = 50, Price per share = 500 USD and Price to sales ratio = 5 x and the page reports <strong>Sales per share</strong> = 0.1 USD.</li><li>Feed in Sales = 30 USD, Number of shares outstanding = 100, Price per share = 1000 USD and Price to sales ratio = 10 x and the page reports <strong>Sales per share</strong> = 0.3 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Sales per share is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Sales and Number of shares outstanding are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Sales and Number of shares outstanding measured, Sales per share and Price per share wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/debt-to-asset">Debt to asset ratio Calculator</a>, <a href="/finance/debt-to-equity">Debt to equity Calculator</a> and <a href="/finance/dti">Debt to income ratio</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Price to sales ratio calculator work out?', 'a' => <<<'TXT'
            Sales per share, Price per share and Price to sales ratio, from Sales and Number of shares outstanding. The relationship is Sales per share = Sales ÷ Number of shares outstanding.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Sales (USD), Number of shares outstanding. Fill sales and number of shares outstanding and leave Sales per share empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Sales per share, Number of shares outstanding, Sales and Price to sales ratio blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Sales per share = 0.1 USD. The figures come from Sales as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Sales per share is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Sales blank and the page solves for it, reporting Sales per share instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Sales per share at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/debt-to-asset', 'name' => 'Debt to asset ratio Calculator'],
            ['path' => '/finance/debt-to-equity', 'name' => 'Debt to equity Calculator'],
            ['path' => '/finance/dti', 'name' => 'Debt to income ratio'],
        ],
        'authors' => [],
    ],
];
