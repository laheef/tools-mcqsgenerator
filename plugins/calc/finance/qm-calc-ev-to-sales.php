<?php

/**
 * EV to sales
 * /finance/ev-to-sales
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'EV to sales',
    'meta' => ['title' => 'EV to sales Calculator: Formula, Steps & Examples', 'description' => 'EV to sales turns cash and cash equivalents and market capitalization into enterprise value (EV). Results come back in USD, with any other unit a click away.', 'h1' => 'EV to sales Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => 'Enterprise value calculation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_equivalents',
                            'label' => 'Cash and cash equivalents',
                            'type' => 'number',
                            'help' => 'Cash in bank accounts or assets that can be quickly converted to cash.',
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
                            'name' => 'market_cap',
                            'label' => 'Market capitalization',
                            'type' => 'number',
                            'help' => 'The total economic value of the outstanding shares of a public company. Also called: Equity value.',
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
                            'name' => 'total_debt',
                            'label' => 'Total debt',
                            'type' => 'number',
                            'help' => 'Total outstanding debt of a company. It can be found on the balance sheet.',
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
                            'name' => 'minor_interest',
                            'label' => 'Minority interest',
                            'type' => 'number',
                            'help' => 'Ownership in subsidiary companies with a value of no more than 50% of possession. Can be found on the balance sheet.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pref_shares',
                            'label' => 'Preferred shares',
                            'type' => 'number',
                            'help' => 'Company stock dividends that have to be paid before the common stock dividends.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ev',
                            'label' => 'Enterprise value (EV)',
                            'type' => 'number',
                            'help' => 'Considered as the acquisition value of a company.',
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
            'title' => 'Sales and EV to sales ratio',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sales',
                            'label' => 'Sales (revenues)',
                            'type' => 'number',
                            'help' => 'Represent the total income generated by the sale of goods and/or services related to the business\' core operations.',
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
                            'name' => 'ev_to_sales',
                            'label' => 'EV to sales',
                            'type' => 'number',
                            'help' => 'Valuation ratio that express how many dollars the company is priced relative to 1 dollar of sales.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'ev < 0 and hasValue(ev_to_sales)', 'text' => <<<'TXT'
                                While a company with a negative enterprise value can certainly exist, it might indicate that it is severely undervalued. Check our ROCE calculator  to verify whether it can be a good investment.&nbsp;
                                TXT],
                                ['when' => 'ev_to_sales > 20', 'text' => 'Considered to be highly overvalued. But, hey! Check its revenue growth to see if that is true. Maybe you are in front of a true compounder.&nbsp;'],
                                ['when' => 'ev_to_sales > 0 and ev_to_sales < 10', 'text' => 'Considered a normal valuation range. Here, you could pick the company with the highest gross margin .&nbsp;'],
                                ['when' => 'ev_to_sales >= 10 and ev_to_sales <= 20', 'text' => 'Considered to be overvalued. Find out its fair value with our discounted cash flow calculator  so you can see whether it is true or trades at a discount.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'ev= market_cap+total_debt+pref_shares+minor_interest-cash_equivalents',
            'results' => [
                'pref_shares' => 'cash_equivalents + ev - market_cap - minor_interest - total_debt',
                'ev' => '-cash_equivalents + market_cap + minor_interest + pref_shares + total_debt',
                'market_cap' => 'cash_equivalents + ev - minor_interest - pref_shares - total_debt',
                'total_debt' => 'cash_equivalents + ev - market_cap - minor_interest - pref_shares',
                'minor_interest' => 'cash_equivalents + ev - market_cap - pref_shares - total_debt',
                'cash_equivalents' => '-ev + market_cap + minor_interest + pref_shares + total_debt',
            ],
        ],
        [
            'title' => 'ev_to_sales=ev/sales',
            'results' => ['ev_to_sales' => 'ev/sales', 'sales' => 'ev/ev_to_sales', 'ev' => 'ev_to_sales*sales'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        EV to sales takes Cash and cash equivalents, Market capitalization and Total debt and returns Enterprise value (EV) and Sales (revenues). The arithmetic is the whole method: enterprise value (EV) is worked out from cash and cash equivalents by one formula, applied once. Enterprise value (EV) comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the EV to sales calculator works', 'html' => <<<'TXT'
            <p>The EV to sales calculator applies one relationship to 5 numbers and reports Enterprise value (EV), Sales (revenues) and EV to sales.</p><p>The relationship it solves reads Enterprise value (EV) = − Cash and cash equivalents + Market capitalization + Minority interest + Preferred shares + Total debt.</p><p>The answers are Enterprise value (EV), Sales (revenues) and EV to sales; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Cash and cash equivalents</strong> — in USD. Cash in bank accounts or assets that can be quickly converted to cash.</li><li><strong>Market capitalization</strong> — in USD. The total economic value of the outstanding shares of a public company. Also called: Equity value.</li><li><strong>Total debt</strong> — in USD. Total outstanding debt of a company. It can be found on the balance sheet.</li><li><strong>Minority interest</strong> — in USD. Ownership in subsidiary companies with a value of no more than 50% of possession. Can be found on the balance sheet.</li><li><strong>Preferred shares</strong> — in USD. Company stock dividends that have to be paid before the common stock dividends.</li></ul><p>The result boxes are Enterprise value (EV) in USD, Sales (revenues) in USD, EV to sales; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Cash and cash equivalents = 10 USD, Market capitalization = 100 USD, Total debt = 1000 USD, Minority interest = 10 USD, Preferred shares = 100 USD, Sales (revenues) = 1000 USD and EV to sales = 10 — through the same formula and the panel reports <strong>Enterprise value (EV)</strong> = 1200 USD.</p><ul><li><strong>Enterprise value (EV)</strong> = 1200 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Enterprise value (EV)</strong> = <code>− Cash and cash equivalents + Market capitalization + Minority interest + Preferred shares + Total debt</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Enterprise value (EV)</strong> = 1200 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Enterprise value (EV) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Enterprise value (EV)</strong> = <code>− Cash and cash equivalents + Market capitalization + Minority interest + Preferred shares + Total debt</code></li><li><strong>Preferred shares</strong> = <code>Cash and cash equivalents + Enterprise value (EV) − Market capitalization − Minority interest − Total debt</code></li><li><strong>Market capitalization</strong> = <code>Cash and cash equivalents + Enterprise value (EV) − Minority interest − Preferred shares − Total debt</code></li><li><strong>Total debt</strong> = <code>Cash and cash equivalents + Enterprise value (EV) − Market capitalization − Minority interest − Preferred shares</code></li><li><strong>Minority interest</strong> = <code>Cash and cash equivalents + Enterprise value (EV) − Market capitalization − Preferred shares − Total debt</code></li><li><strong>Cash and cash equivalents</strong> = <code>− Enterprise value (EV) + Market capitalization + Minority interest + Preferred shares + Total debt</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Enterprise value (EV)</strong> = <code>− Cash and cash equivalents + Market capitalization + Minority interest + Preferred shares + Total debt</code> — the form to use when Cash and cash equivalents, Market capitalization, Minority interest and Preferred shares are the values you have.</li><li><strong>Preferred shares</strong> = <code>Cash and cash equivalents + Enterprise value (EV) − Market capitalization − Minority interest − Total debt</code> — the form to use when Cash and cash equivalents, Enterprise value (EV), Market capitalization and Minority interest are the values you have.</li><li><strong>Market capitalization</strong> = <code>Cash and cash equivalents + Enterprise value (EV) − Minority interest − Preferred shares − Total debt</code> — the form to use when Cash and cash equivalents, Enterprise value (EV), Minority interest and Preferred shares are the values you have.</li><li><strong>Total debt</strong> = <code>Cash and cash equivalents + Enterprise value (EV) − Market capitalization − Minority interest − Preferred shares</code> — the form to use when Cash and cash equivalents, Enterprise value (EV), Market capitalization and Minority interest are the values you have.</li><li><strong>Minority interest</strong> = <code>Cash and cash equivalents + Enterprise value (EV) − Market capitalization − Preferred shares − Total debt</code> — the form to use when Cash and cash equivalents, Enterprise value (EV), Market capitalization and Preferred shares are the values you have.</li><li><strong>Cash and cash equivalents</strong> = <code>− Enterprise value (EV) + Market capitalization + Minority interest + Preferred shares + Total debt</code> — the form to use when Enterprise value (EV), Market capitalization, Minority interest and Preferred shares are the values you have.</li><li><strong>EV to sales</strong> = <code>Enterprise value (EV) ÷ Sales (revenues)</code> — the form to use when Enterprise value (EV) and Sales (revenues) are the values you have.</li><li><strong>Sales (revenues)</strong> = <code>Enterprise value (EV) ÷ EV to sales</code> — the form to use when Enterprise value (EV) and EV to sales are the values you have.</li></ul><p>Any one of Enterprise value (EV), Preferred shares and Market capitalization can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Cash and cash equivalents, from 10 to 20 — and the answers go from <strong>Enterprise value (EV)</strong> 1200 USD to <strong>Enterprise value (EV)</strong> 1190 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Enterprise value (EV), Sales (revenues) and EV to sales are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Cash and cash equivalents left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cash and cash equivalents is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Market capitalization left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Market capitalization is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Total debt left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total debt is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Cash and cash equivalents to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the EV to sales form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Cash and cash equivalents</strong> takes a plain number with no unit attached. Cash in bank accounts or assets that can be quickly converted to cash. The page reads it when it works out Preferred shares, Enterprise value (EV) and Market capitalization. Fill it from a measurement rather than a memory — Cash and cash equivalents is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Market capitalization</strong> takes a plain number with no unit attached. The total economic value of the outstanding shares of a public company. Also called: Equity value. The page reads it when it works out Preferred shares, Enterprise value (EV) and Total debt. Fill it from a measurement rather than a memory — Market capitalization is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total debt</strong> takes a plain number with no unit attached. Total outstanding debt of a company. It can be found on the balance sheet. The page reads it when it works out Preferred shares, Enterprise value (EV) and Market capitalization. Fill it from a measurement rather than a memory — Total debt is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Minority interest</strong> takes a plain number with no unit attached. Ownership in subsidiary companies with a value of no more than 50% of possession. Can be found on the balance sheet. The page reads it when it works out Preferred shares, Enterprise value (EV) and Market capitalization. Fill it from a measurement rather than a memory — Minority interest is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Preferred shares</strong> takes a plain number with no unit attached. Company stock dividends that have to be paid before the common stock dividends. The page reads it when it works out Enterprise value (EV), Market capitalization and Total debt. Fill it from a measurement rather than a memory — Preferred shares is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Enterprise value (EV)</strong> is a plain number and the page's own defaults put it at 1200. It is computed from Cash and cash equivalents, Market capitalization, Minority interest and Preferred shares, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Sales (revenues)</strong> is a plain number. It is computed from Enterprise value (EV) and EV to sales, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>EV to sales</strong> is a plain number. It is computed from Enterprise value (EV) and Sales (revenues), so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Enterprise value (EV) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Cash and cash equivalents, Market capitalization and Total debt are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Cash and cash equivalents, Market capitalization and Total debt measured, Enterprise value (EV) and Sales (revenues) wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/jensen-alpha">Jensen&#039;s alpha Calculator</a>, <a href="/finance/jumbo-loan">Jumbo loan Calculator</a> and <a href="/finance/labor-cost">Labor cost Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the EV to sales calculator work out?', 'a' => <<<'TXT'
            Enterprise value (EV), Sales (revenues) and EV to sales, from Cash and cash equivalents, Market capitalization, Minority interest and Preferred shares. The relationship is Enterprise value (EV) = − Cash and cash equivalents + Market capitalization + Minority interest + Preferred shares + Total debt.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cash and cash equivalents (USD), Market capitalization (USD), Total debt (USD), Minority interest (USD), Preferred shares (USD). Fill cash and cash equivalents, market capitalization and total debt and leave Enterprise value (EV) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Enterprise value (EV), Preferred shares, Market capitalization and Total debt blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Enterprise value (EV) = 1200 USD. Those are the defaults written into the form — move Cash and cash equivalents and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Enterprise value (EV) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Cash and cash equivalents blank and the page solves for it, reporting Enterprise value (EV) instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Enterprise value (EV) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/jensen-alpha', 'name' => 'Jensen\'s alpha Calculator'],
            ['path' => '/finance/jumbo-loan', 'name' => 'Jumbo loan Calculator'],
            ['path' => '/finance/labor-cost', 'name' => 'Labor cost Calculator'],
        ],
        'authors' => [],
    ],
];
