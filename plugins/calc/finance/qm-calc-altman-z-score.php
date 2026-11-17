<?php

/**
 * Altman Z-Score
 * /finance/altman-z-score
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Altman Z-Score',
    'meta' => ['title' => 'Altman Z-Score Calculator — Formula, Units & Example', 'description' => 'Altman Z-Score works out net working capital from accounts receivable and inventory. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Altman Z-Score Calculator', 'updated' => '2026-09-12'],
    'sections' => [
        [
            'title' => 'Net working capital calculation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'account_receivables',
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
                            'name' => 'inventory',
                            'label' => 'Inventory',
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
                            'name' => 'accounts_payable',
                            'label' => 'Accounts payable',
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
                            'name' => 'net_working_capital_2',
                            'label' => 'Net working capital',
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
            'title' => 'Market value of equity calculation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_shares',
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
                            'name' => 'share_price',
                            'label' => 'Share price',
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
                            'name' => 'market_value_equity_2',
                            'label' => 'Market value equity',
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
            'title' => 'Retained earnings calculation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_income',
                            'label' => 'Net income',
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
                            'name' => 'dividend_per_share',
                            'label' => 'Dividend per share',
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
                            'name' => 'retained_earnings_2',
                            'label' => 'Retained earnings',
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
            'title' => 'Altman Z-Score',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sales',
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
                            'name' => 'ebit',
                            'label' => 'Earnings before interest and tax (EBIT)',
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
                            'name' => 'total_assets',
                            'label' => 'Total assets',
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
                            'name' => 'total_liabilities',
                            'label' => 'Total liabilities',
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
                            'name' => 'net_working_capital',
                            'label' => 'Net working capital',
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
                            'name' => 'market_value_equity',
                            'label' => 'Market value of equity',
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
                            'name' => 'retained_earnings',
                            'label' => 'Retained earnings',
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
                            'name' => 'altman_z',
                            'label' => 'Altman Z-Score',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'altman_z < 1.81', 'text' => 'The Altman z-score is {{altman_z.formattedValue}}, which is below 1.81. The company is likely to default! &nbsp;'],
                                ['when' => 'altman_z >= 1.81 and altman_z < 3', 'text' => 'The Altman z-score is {{altman_z.formattedValue}}, which is between 1.81 and 3.The evidence is not clear, and further analysis is required! &nbsp;'],
                                ['when' => 'altman_z >= 3', 'text' => 'The Altman z-score is {{altman_z.formattedValue}}, which is above or equal to 3. The company is in good shape. The probability of default is low. '],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => <<<'TXT'
            altman_z = 1.2 * (net_working_capital / total_assets) + 1.4 * (retained_earnings / total_assets) + 3.3 * (ebit / total_assets) + 0.6 * (market_value_equity / total_liabilities) + (sales / total_assets)
            TXT,
            'results' => [
                'market_value_equity' => '(1/6)*total_liabilities*(10*altman_z*total_assets - 33*ebit - 12*net_working_capital - 14*retained_earnings - 10*sales)/total_assets',
                'retained_earnings' => '(1/14)*(-6*market_value_equity*total_assets + total_liabilities*(10*altman_z*total_assets - 33*ebit - 12*net_working_capital - 10*sales))/total_liabilities',
                'total_liabilities' => '6*market_value_equity*total_assets/(10*altman_z*total_assets - 33*ebit - 12*net_working_capital - 14*retained_earnings - 10*sales)',
                'sales' => <<<'TXT'
                (1/10)*(-6*market_value_equity*total_assets + total_liabilities*(10*altman_z*total_assets - 33*ebit - 12*net_working_capital - 14*retained_earnings))/total_liabilities
                TXT,
                'net_working_capital' => '(1/12)*(-6*market_value_equity*total_assets + total_liabilities*(10*altman_z*total_assets - 33*ebit - 14*retained_earnings - 10*sales))/total_liabilities',
                'total_assets' => '(1/2)*total_liabilities*(33*ebit + 12*net_working_capital + 14*retained_earnings + 10*sales)/(5*altman_z*total_liabilities - 3*market_value_equity)',
                'altman_z' => <<<'TXT'
                (1/10)*(6*market_value_equity*total_assets + total_liabilities*(33*ebit + 12*net_working_capital + 14*retained_earnings + 10*sales))/(total_assets*total_liabilities)
                TXT,
                'ebit' => <<<'TXT'
                (2/33)*(-3*market_value_equity*total_assets + total_liabilities*(5*altman_z*total_assets - 6*net_working_capital - 7*retained_earnings - 5*sales))/total_liabilities
                TXT,
            ],
        ],
        [
            'title' => 'net_working_capital = account_receivables + inventory - accounts_payable',
            'results' => ['accounts_payable' => 'account_receivables + inventory - net_working_capital', 'account_receivables' => 'accounts_payable - inventory + net_working_capital', 'inventory' => '-account_receivables + accounts_payable + net_working_capital', 'net_working_capital' => 'account_receivables - accounts_payable + inventory'],
        ],
        [
            'title' => 'market_value_equity = num_shares * share_price',
            'results' => ['num_shares' => 'market_value_equity/share_price', 'market_value_equity' => 'num_shares*share_price', 'share_price' => 'market_value_equity/num_shares'],
        ],
        [
            'title' => 'retained_earnings = net_income - dividend_per_share * num_shares',
            'results' => ['net_income' => 'dividend_per_share*num_shares + retained_earnings', 'dividend_per_share' => '(net_income - retained_earnings)/num_shares', 'num_shares' => '(net_income - retained_earnings)/dividend_per_share', 'retained_earnings' => '-dividend_per_share*num_shares + net_income'],
        ],
        [
            'title' => 'net_working_capital_2 = one_way(net_working_capital)',
            'results' => ['net_working_capital_2' => '(net_working_capital)'],
        ],
        [
            'title' => 'market_value_equity_2 = one_way(market_value_equity)',
            'results' => ['market_value_equity_2' => '(market_value_equity)'],
        ],
        [
            'title' => 'retained_earnings_2 = one_way(retained_earnings)',
            'results' => ['retained_earnings_2' => '(retained_earnings)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Altman Z-Score works out Accounts receivable and Inventory from Sales, Earnings before interest and tax (EBIT) and Total assets. It is a single relationship that reads accounts receivable out of sales, not a table of canned results keyed by them. Units for Accounts receivable default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Altman Z-Score calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Altman Z-Score: it takes 7 numbers and reports Accounts receivable, Inventory and Accounts payable.</p><p>In the form&#039;s own words, Altman Z-Score = (1 ÷ 10) × (6 × Market value of equity × Total assets + Total liabilities × (33 × Earnings before interest and tax (EBIT) + 12 × Net working capital + 14 × Retained earnings + 10 × Sales)) ÷ (Total assets × Total liabilities).</p><p>The answers are Accounts receivable, Inventory, Accounts payable and Net working capital; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 7 boxes, and nothing else.</p><ul><li><strong>Sales</strong> — in USD</li><li><strong>Earnings before interest and tax (EBIT)</strong> — in USD</li><li><strong>Total assets</strong> — in USD</li><li><strong>Total liabilities</strong> — in USD</li><li><strong>Net working capital</strong> — in USD</li><li><strong>Market value of equity</strong> — in USD</li><li><strong>Retained earnings</strong> — in USD</li></ul><p>What you get back is Accounts receivable in USD, Inventory in USD, Accounts payable in USD, Net working capital in USD, Number of shares outstanding, Share price in USD, Market value equity in USD, Net income in USD, Dividend per share in USD, Retained earnings in USD, Altman Z-Score, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Accounts receivable = 10 USD, Inventory = 100 USD, Accounts payable = 1000 USD, Net working capital = 10 USD, Number of shares outstanding = 100, Share price = 1000 USD, Market value equity = 10 USD, Net income = 100 USD, Dividend per share = 1000 USD, Retained earnings = 10 USD, Sales = 100 USD, Earnings before interest and tax (EBIT) = 1000 USD, Total assets = 10 USD, Total liabilities = 100 USD, Net working capital = 1000 USD, Retained earnings = 10 USD and Altman Z-Score = 100; the answers are <strong>Market value of equity</strong> = -60233 USD.</p><ul><li><strong>Market value of equity</strong> = -60233 USD</li></ul><p>The line behind those figures is <strong>Altman Z-Score</strong> = <code>(1 ÷ 10) × (6 × Market value of equity × Total assets + Total liabilities × (33 × Earnings before interest and tax (EBIT) + 12 × Net working capital + 14 × Retained earnings + 10 × Sales)) ÷ (Total assets × Total liabilities)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Market value of equity</strong> = -60233. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Accounts receivable is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Altman Z-Score</strong> = <code>(1 ÷ 10) × (6 × Market value of equity × Total assets + Total liabilities × (33 × Earnings before interest and tax (EBIT) + 12 × Net working capital + 14 × Retained earnings + 10 × Sales)) ÷ (Total assets × Total liabilities)</code></li><li><strong>Market value of equity</strong> = <code>(1 ÷ 6) × Total liabilities × (10 × Altman Z-Score × Total assets − 33 × Earnings before interest and tax (EBIT) − 12 × Net working capital − 14 × Retained earnings − 10 × Sales) ÷ Total assets</code></li><li><strong>Total liabilities</strong> = <code>6 × Market value of equity × Total assets ÷ (10 × Altman Z-Score × Total assets − 33 × Earnings before interest and tax (EBIT) − 12 × Net working capital − 14 × Retained earnings − 10 × Sales)</code></li><li><strong>Net working capital</strong> = <code>(1 ÷ 12) × ( − 6 × Market value of equity × Total assets + Total liabilities × (10 × Altman Z-Score × Total assets − 33 × Earnings before interest and tax (EBIT) − 14 × Retained earnings − 10 × Sales)) ÷ Total liabilities</code></li><li><strong>Total assets</strong> = <code>(1 ÷ 2) × Total liabilities × (33 × Earnings before interest and tax (EBIT) + 12 × Net working capital + 14 × Retained earnings + 10 × Sales) ÷ (5 × Altman Z-Score × Total liabilities − 3 × Market value of equity)</code></li><li><strong>Earnings before interest and tax (EBIT)</strong> = <code>(2 ÷ 33) × ( − 3 × Market value of equity × Total assets + Total liabilities × (5 × Altman Z-Score × Total assets − 6 × Net working capital − 7 × Retained earnings − 5 × Sales)) ÷ Total liabilities</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Altman Z-Score</strong> = <code>(1 ÷ 10) × (6 × Market value of equity × Total assets + Total liabilities × (33 × Earnings before interest and tax (EBIT) + 12 × Net working capital + 14 × Retained earnings + 10 × Sales)) ÷ (Total assets × Total liabilities)</code> — the form to use when Market value of equity, Total assets, Total liabilities and Earnings before interest and tax (EBIT) are the values you have.</li><li><strong>Market value of equity</strong> = <code>(1 ÷ 6) × Total liabilities × (10 × Altman Z-Score × Total assets − 33 × Earnings before interest and tax (EBIT) − 12 × Net working capital − 14 × Retained earnings − 10 × Sales) ÷ Total assets</code> — the form to use when Total liabilities, Altman Z-Score, Total assets and Earnings before interest and tax (EBIT) are the values you have.</li><li><strong>Total liabilities</strong> = <code>6 × Market value of equity × Total assets ÷ (10 × Altman Z-Score × Total assets − 33 × Earnings before interest and tax (EBIT) − 12 × Net working capital − 14 × Retained earnings − 10 × Sales)</code> — the form to use when Market value of equity, Total assets, Altman Z-Score and Earnings before interest and tax (EBIT) are the values you have.</li><li><strong>Net working capital</strong> = <code>(1 ÷ 12) × ( − 6 × Market value of equity × Total assets + Total liabilities × (10 × Altman Z-Score × Total assets − 33 × Earnings before interest and tax (EBIT) − 14 × Retained earnings − 10 × Sales)) ÷ Total liabilities</code> — the form to use when Market value of equity, Total assets, Total liabilities and Altman Z-Score are the values you have.</li><li><strong>Total assets</strong> = <code>(1 ÷ 2) × Total liabilities × (33 × Earnings before interest and tax (EBIT) + 12 × Net working capital + 14 × Retained earnings + 10 × Sales) ÷ (5 × Altman Z-Score × Total liabilities − 3 × Market value of equity)</code> — the form to use when Total liabilities, Earnings before interest and tax (EBIT), Net working capital and Retained earnings are the values you have.</li><li><strong>Earnings before interest and tax (EBIT)</strong> = <code>(2 ÷ 33) × ( − 3 × Market value of equity × Total assets + Total liabilities × (5 × Altman Z-Score × Total assets − 6 × Net working capital − 7 × Retained earnings − 5 × Sales)) ÷ Total liabilities</code> — the form to use when Market value of equity, Total assets, Total liabilities and Altman Z-Score are the values you have.</li><li><strong>Net working capital</strong> = <code>Accounts receivable − Accounts payable + Inventory</code> — the form to use when Accounts receivable, Accounts payable and Inventory are the values you have.</li><li><strong>Accounts payable</strong> = <code>Accounts receivable + Inventory − Net working capital</code> — the form to use when Accounts receivable, Inventory and Net working capital are the values you have.</li></ul><p>Any one of Altman Z-Score, Market value of equity and Retained earnings can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Accounts receivable from 10 to 20, leaving every other box alone. The panel moves from <strong>Market value of equity</strong> -60233 USD to <strong>Market value of equity</strong> -60233 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Accounts receivable, Inventory and Accounts payable are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Sales left as a guess.</strong> Anything typed into Sales is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Earnings before interest and tax (EBIT) left as a guess.</strong> Anything typed into Earnings before interest and tax (EBIT) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Total assets left as a guess.</strong> Anything typed into Total assets is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Sales and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Sales</strong> takes a plain number with no unit attached. It feeds Market value of equity, Retained earnings and Total liabilities. Have it to hand before you start: Sales is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Earnings before interest and tax (EBIT)</strong> takes a plain number with no unit attached. It feeds Market value of equity, Retained earnings and Total liabilities. Have it to hand before you start: Earnings before interest and tax (EBIT) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total assets</strong> takes a plain number with no unit attached. It feeds Market value of equity, Retained earnings and Total liabilities. Have it to hand before you start: Total assets is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total liabilities</strong> takes a plain number with no unit attached. It feeds Market value of equity, Retained earnings and Sales. Have it to hand before you start: Total liabilities is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Net working capital</strong> takes a plain number with no unit attached. It feeds Market value of equity, Retained earnings and Total liabilities. Have it to hand before you start: Net working capital is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Market value of equity</strong> takes a plain number with no unit attached. It feeds Retained earnings, Total liabilities and Sales. Have it to hand before you start: Market value of equity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Retained earnings</strong> takes a plain number with no unit attached. It feeds Market value of equity, Total liabilities and Sales. Have it to hand before you start: Retained earnings is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Accounts receivable is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Sales, Earnings before interest and tax (EBIT) and Total assets are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Sales, Earnings before interest and tax (EBIT) and Total assets measured, Accounts receivable and Inventory wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/loan-payment">Loan payment Calculator</a>, <a href="/finance/loan-repayment">Loan repayment Calculator</a> and <a href="/finance/long-term-care">Long term care</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Altman Z-Score calculator work out?', 'a' => <<<'TXT'
            Accounts receivable, Inventory, Accounts payable and Net working capital, from Market value of equity, Total assets, Total liabilities and Earnings before interest and tax (EBIT). The relationship is Altman Z-Score = (1 ÷ 10) × (6 × Market value of equity × Total assets + Total liabilities × (33 × Earnings before interest and tax (EBIT) + 12 × Net working capital + 14 × Retained earnings + 10 × Sales)) ÷ (Total assets × Total liabilities).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Sales (USD), Earnings before interest and tax (EBIT) (USD), Total assets (USD), Total liabilities (USD), Net working capital (USD). With sales, earnings before interest and tax (EBIT) and total assets in place, Accounts receivable can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Altman Z-Score, Market value of equity, Retained earnings and Total liabilities blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Market value of equity = -60233 USD. Those are the defaults written into the form — move Sales and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Accounts receivable is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Sales left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Accounts receivable at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/loan-payment', 'name' => 'Loan payment Calculator'],
            ['path' => '/finance/loan-repayment', 'name' => 'Loan repayment Calculator'],
            ['path' => '/finance/long-term-care', 'name' => 'Long term care'],
        ],
        'authors' => [],
    ],
];
