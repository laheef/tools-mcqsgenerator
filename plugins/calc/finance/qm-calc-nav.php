<?php

/**
 * Net asset value (NAV)
 * /finance/nav
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Net asset value (NAV)',
    'meta' => ['title' => 'Net asset value (NAV) — Free Online Calculator', 'description' => 'Net asset value (NAV) works out fund assets and fund liabilities and reports both. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Net asset value (NAV) Calculator', 'updated' => '2026-09-18'],
    'sections' => [
        [
            'title' => 'Fund assets',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'investment_value',
                            'label' => 'Total investments value',
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
                            'name' => 'cash',
                            'label' => 'Cash and cash equivalents',
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
                            'name' => 'accounts_receivables',
                            'label' => 'Accounts receivable',
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
                            'name' => 'fund_assets',
                            'label' => 'Fund assets',
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
            'title' => 'Fund liabilities',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'short_liabilities',
                            'label' => 'Short-term liabilities',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'long_liabilities',
                            'label' => 'Long-term liabilities',
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
                            'name' => 'fund_liabilities',
                            'label' => 'Fund liabilities',
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
            'title' => 'NAV and NAV per share',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nav',
                            'label' => 'Net asset value (NAV)',
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
                            'name' => 'number_of_shares',
                            'label' => 'Number of shares outstanding',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nav_per_share',
                            'label' => 'Net asset value per share',
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
            'title' => 'fund_assets = investment_value + cash + accounts_receivables',
            'results' => ['fund_assets' => 'accounts_receivables + cash + investment_value', 'investment_value' => '-accounts_receivables - cash + fund_assets', 'accounts_receivables' => '-cash + fund_assets - investment_value', 'cash' => '-accounts_receivables + fund_assets - investment_value'],
        ],
        [
            'title' => 'fund_liabilities = short_liabilities + long_liabilities',
            'results' => ['long_liabilities' => 'fund_liabilities - short_liabilities', 'short_liabilities' => 'fund_liabilities - long_liabilities', 'fund_liabilities' => 'long_liabilities + short_liabilities'],
        ],
        [
            'title' => 'nav = fund_assets - fund_liabilities',
            'results' => ['nav' => 'fund_assets - fund_liabilities', 'fund_liabilities' => 'fund_assets - nav', 'fund_assets' => 'fund_liabilities + nav'],
        ],
        [
            'title' => 'nav_per_share = nav / number_of_shares',
            'results' => ['nav' => 'nav_per_share*number_of_shares', 'number_of_shares' => 'nav/nav_per_share', 'nav_per_share' => 'nav/number_of_shares'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Net asset value (NAV) turns Total investments value, Cash and cash equivalents and Accounts receivable into Fund assets and Short-term liabilities. There is no hidden constant here: change fund assets and total investments value moves with it. The main result, Fund assets, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Net asset value (NAV) calculator works', 'html' => <<<'TXT'
            <p>The Net asset value (NAV) calculator applies one relationship to 3 numbers and reports Fund assets, Short-term liabilities and Long-term liabilities.</p><p>The relationship it solves reads Fund assets = Accounts receivable + Cash and cash equivalents + Total investments value.</p><p>The result panel carries Fund assets, Short-term liabilities, Long-term liabilities and Fund liabilities, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Total investments value</strong> — in USD</li><li><strong>Cash and cash equivalents</strong> — in USD</li><li><strong>Accounts receivable</strong> — in USD</li></ul><p>The result boxes are Fund assets in USD, Short-term liabilities in USD, Long-term liabilities in USD, Fund liabilities in USD, Net asset value (NAV) in USD, Number of shares outstanding, Net asset value per share in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Total investments value = 10 USD, Cash and cash equivalents = 100 USD, Accounts receivable = 1000 USD, Short-term liabilities = 10 USD, Long-term liabilities = 100 USD, Fund liabilities = 1000 USD, Net asset value (NAV) = 10 USD, Number of shares outstanding = 100 and Net asset value per share = 1000 USD — through the same formula and the panel reports <strong>Fund assets</strong> = 1110 USD.</p><ul><li><strong>Fund assets</strong> = 1110 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Fund assets</strong> = <code>Accounts receivable + Cash and cash equivalents + Total investments value</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Fund assets</strong> = 1110 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Fund assets takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Fund assets</strong> = <code>Accounts receivable + Cash and cash equivalents + Total investments value</code></li><li><strong>Total investments value</strong> = <code>− Accounts receivable − Cash and cash equivalents + Fund assets</code></li><li><strong>Accounts receivable</strong> = <code>− Cash and cash equivalents + Fund assets − Total investments value</code></li><li><strong>Cash and cash equivalents</strong> = <code>− Accounts receivable + Fund assets − Total investments value</code></li><li><strong>Fund liabilities</strong> = <code>Long-term liabilities + Short-term liabilities</code></li><li><strong>Long-term liabilities</strong> = <code>Fund liabilities − Short-term liabilities</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Fund assets</strong> = <code>Accounts receivable + Cash and cash equivalents + Total investments value</code> — the form to use when Accounts receivable, Cash and cash equivalents and Total investments value are the values you have.</li><li><strong>Total investments value</strong> = <code>− Accounts receivable − Cash and cash equivalents + Fund assets</code> — the form to use when Accounts receivable, Cash and cash equivalents and Fund assets are the values you have.</li><li><strong>Accounts receivable</strong> = <code>− Cash and cash equivalents + Fund assets − Total investments value</code> — the form to use when Cash and cash equivalents, Fund assets and Total investments value are the values you have.</li><li><strong>Cash and cash equivalents</strong> = <code>− Accounts receivable + Fund assets − Total investments value</code> — the form to use when Accounts receivable, Fund assets and Total investments value are the values you have.</li><li><strong>Fund liabilities</strong> = <code>Long-term liabilities + Short-term liabilities</code> — the form to use when Long-term liabilities and Short-term liabilities are the values you have.</li><li><strong>Long-term liabilities</strong> = <code>Fund liabilities − Short-term liabilities</code> — the form to use when Fund liabilities and Short-term liabilities are the values you have.</li><li><strong>Short-term liabilities</strong> = <code>Fund liabilities − Long-term liabilities</code> — the form to use when Fund liabilities and Long-term liabilities are the values you have.</li><li><strong>Net asset value (NAV)</strong> = <code>Fund assets − Fund liabilities</code> — the form to use when Fund assets and Fund liabilities are the values you have.</li></ul><p>Any one of Fund assets, Total investments value and Accounts receivable can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Total investments value from 10 to 20, leaving every other box alone. The panel moves from <strong>Fund assets</strong> 1110 USD to <strong>Fund assets</strong> 1120 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Fund assets, Short-term liabilities and Long-term liabilities are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Total investments value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total investments value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Cash and cash equivalents left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cash and cash equivalents is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Accounts receivable left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Accounts receivable is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Total investments value is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Net asset value (NAV) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Total investments value</strong> takes a plain number with no unit attached. Change it and Fund assets, Accounts receivable and Cash and cash equivalents changes with it. Fill it from a measurement rather than a memory — Total investments value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cash and cash equivalents</strong> takes a plain number with no unit attached. Change it and Fund assets, Total investments value and Accounts receivable changes with it. Fill it from a measurement rather than a memory — Cash and cash equivalents is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Accounts receivable</strong> takes a plain number with no unit attached. Change it and Fund assets, Total investments value and Cash and cash equivalents changes with it. Fill it from a measurement rather than a memory — Accounts receivable is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Fund assets</strong> is a plain number and the page's own defaults put it at 1110. The value follows from Accounts receivable, Cash and cash equivalents and Total investments value. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Short-term liabilities</strong> is a plain number. The value follows from Fund liabilities and Long-term liabilities. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Long-term liabilities</strong> is a plain number. The value follows from Fund liabilities and Short-term liabilities. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Fund liabilities</strong> is a plain number. The value follows from Long-term liabilities and Short-term liabilities. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Net asset value (NAV)</strong> is a plain number. The value follows from Fund assets and Fund liabilities. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Number of shares outstanding</strong> is a plain number. The value follows from Net asset value (NAV) and Net asset value per share. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Net asset value per share</strong> is a plain number. The value follows from Net asset value (NAV) and Number of shares outstanding. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Fund assets</th></tr></thead><tbody><tr><td><strong>Total investments value</strong> +10%</td><td>+0.09%</td></tr><tr><td><strong>Cash and cash equivalents</strong> +10%</td><td>+0.9%</td></tr><tr><td><strong>Accounts receivable</strong> +10%</td><td>+9.01%</td></tr><tr><td><strong>Short-term liabilities</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Long-term liabilities</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Fund liabilities</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Net asset value (NAV)</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Number of shares outstanding</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Net asset value per share</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Accounts receivable sits at the top — a ten per cent error in that box shows up as roughly 9 per cent in the answer. By contrast, Total investments value, Short-term liabilities and Long-term liabilities barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Fund assets follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Total investments value, Cash and cash equivalents and Accounts receivable are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Total investments value, Cash and cash equivalents and Accounts receivable and the number you are missing is Fund assets and Short-term liabilities.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/price-to-earnings">Price/earnings ratio</a>, <a href="/finance/private-savings">Private savings Calculator</a> and <a href="/finance/productivity">Productivity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Net asset value (NAV) calculator work out?', 'a' => <<<'TXT'
            Fund assets, Short-term liabilities, Long-term liabilities and Fund liabilities, from Accounts receivable, Cash and cash equivalents and Total investments value. The relationship is Fund assets = Accounts receivable + Cash and cash equivalents + Total investments value.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total investments value (USD), Cash and cash equivalents (USD), Accounts receivable (USD). Enter total investments value, cash and cash equivalents and accounts receivable; Fund assets is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Fund assets, Total investments value, Accounts receivable and Cash and cash equivalents blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Fund assets = 1110 USD. Those are the defaults written into the form — move Total investments value and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Fund assets is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Total investments value blank and the page solves for it, reporting Fund assets instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Fund assets at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/price-to-earnings', 'name' => 'Price/earnings ratio'],
            ['path' => '/finance/private-savings', 'name' => 'Private savings Calculator'],
            ['path' => '/finance/productivity', 'name' => 'Productivity Calculator'],
        ],
        'authors' => [],
    ],
];
