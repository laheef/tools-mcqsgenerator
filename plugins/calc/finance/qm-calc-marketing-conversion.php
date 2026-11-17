<?php

/**
 * Online marketing conversion
 * /finance/marketing-conversion
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Online marketing conversion',
    'meta' => ['title' => 'Online marketing conversion — Formula & Results', 'description' => 'Online marketing conversion works out click-through-rate (CTR) from impressions. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Online marketing conversion Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Conversions',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'impressions',
                            'label' => 'Impressions',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CTR',
                            'label' => 'Click-through-rate (CTR)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'clicks',
                            'label' => 'Visits',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'clicks_conversion',
                            'label' => 'Visits to leads',
                            'type' => 'number',
                            'help' => 'A percentage of visits that convert to leads.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'leads',
                            'label' => 'Leads',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'leads_conversion',
                            'label' => 'Leads to customers',
                            'type' => 'number',
                            'help' => 'A percentage of leads that convert to actual sales.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'customers',
                            'label' => 'Customers',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Costs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost',
                            'label' => 'Total cost',
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
                            'name' => 'eCPM',
                            'label' => 'Cost per mille or thousand (CPM)',
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
                            'name' => 'CPC',
                            'label' => 'Cost per click (CPC)',
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
                            'name' => 'cost_per_lead',
                            'label' => 'Cost per lead',
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
                            'name' => 'cost_per_customer',
                            'label' => 'Cost per customer',
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
            'title' => 'Revenue',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'revenue',
                            'label' => 'Revenue',
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
                            'name' => 'roi',
                            'label' => 'Return on investment (ROI)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'revenue_per_click',
                            'label' => 'Revenue per click',
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
                            'name' => 'revenue_per_lead',
                            'label' => 'Revenue per lead',
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
                            'name' => 'revenue_per_customer',
                            'label' => 'Revenue per customer',
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
            'title' => 'Lifetime value (LTV)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'no_of_orders',
                            'label' => 'No. of orders per customer',
                            'type' => 'number',
                            'help' => 'How many orders did the customer make over the whole time of doing business with you?',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'customer_ltv',
                            'label' => 'Customer LTV',
                            'type' => 'number',
                            'help' => 'How much did a customer spend over the whole time of doing business with you?',
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
                            'name' => 'total_revenue',
                            'label' => 'Total revenue',
                            'type' => 'number',
                            'help' => 'Lifetime value of all customers.',
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
            'title' => 'cost / (impressions / 1000) = eCPM',
            'results' => ['impressions' => '1000*cost/eCPM', 'cost' => '(1/1000)*eCPM*impressions', 'eCPM' => '1000*cost/impressions'],
        ],
        [
            'title' => 'cost / clicks = CPC',
            'results' => ['clicks' => 'cost/CPC', 'cost' => 'CPC*clicks', 'CPC' => 'cost/clicks'],
        ],
        [
            'title' => 'CTR = clicks / impressions',
            'results' => ['clicks' => 'CTR*impressions', 'impressions' => 'clicks/CTR', 'CTR' => 'clicks/impressions'],
        ],
        [
            'title' => 'clicks * clicks_conversion = leads',
            'results' => ['clicks' => 'leads/clicks_conversion', 'clicks_conversion' => 'leads/clicks', 'leads' => 'clicks*clicks_conversion'],
        ],
        [
            'title' => 'cost_per_customer = cost / customers',
            'results' => ['customers' => 'cost/cost_per_customer', 'cost_per_customer' => 'cost/customers', 'cost' => 'cost_per_customer*customers'],
        ],
        [
            'title' => 'leads * leads_conversion = customers',
            'results' => ['customers' => 'leads*leads_conversion', 'leads_conversion' => 'customers/leads', 'leads' => 'customers/leads_conversion'],
        ],
        [
            'title' => 'cost_per_lead = cost / leads',
            'results' => ['leads' => 'cost/cost_per_lead', 'cost_per_lead' => 'cost/leads', 'cost' => 'cost_per_lead*leads'],
        ],
        [
            'title' => 'roi = (revenue - cost) / cost',
            'results' => ['roi' => '(-cost + revenue)/cost', 'cost' => 'revenue/(roi + 1)', 'revenue' => 'cost*(roi + 1)'],
        ],
        [
            'title' => 'revenue_per_click = revenue / clicks',
            'results' => ['clicks' => 'revenue/revenue_per_click', 'revenue' => 'clicks*revenue_per_click', 'revenue_per_click' => 'revenue/clicks'],
        ],
        [
            'title' => 'revenue_per_lead = revenue / leads',
            'results' => ['revenue_per_lead' => 'revenue/leads', 'leads' => 'revenue/revenue_per_lead', 'revenue' => 'leads*revenue_per_lead'],
        ],
        [
            'title' => 'revenue_per_customer = revenue / customers',
            'results' => ['revenue_per_customer' => 'revenue/customers', 'customers' => 'revenue/revenue_per_customer', 'revenue' => 'customers*revenue_per_customer'],
        ],
        [
            'title' => 'revenue_per_customer * no_of_orders = customer_ltv',
            'results' => ['revenue_per_customer' => 'customer_ltv/no_of_orders', 'customer_ltv' => 'no_of_orders*revenue_per_customer', 'no_of_orders' => 'customer_ltv/revenue_per_customer'],
        ],
        [
            'title' => 'customer_ltv * customers = total_revenue',
            'results' => ['customer_ltv' => 'total_revenue/customers', 'customers' => 'total_revenue/customer_ltv', 'total_revenue' => 'customer_ltv*customers'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Online marketing conversion works out Click-through-rate (CTR) and Visits to leads from Impressions and Visits. There is no hidden constant here: change click-through-rate (CTR) and impressions moves with it. The main result, Click-through-rate (CTR), is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Online marketing conversion calculator works', 'html' => <<<'TXT'
            <p>The Online marketing conversion calculator applies one relationship to 2 numbers and reports Click-through-rate (CTR), Visits to leads and Leads.</p><p>The relationship it solves reads Impressions = 1000 × Total cost ÷ Cost per mille or thousand (CPM).</p><p>The result panel carries Click-through-rate (CTR), Visits to leads, Leads and Leads to customers, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Impressions</strong> — a plain number, no unit</li><li><strong>Visits</strong> — a plain number, no unit</li></ul><p>The result boxes are Click-through-rate (CTR) in percent, Visits to leads in percent, Leads, Leads to customers in percent, Customers, Total cost in USD, Cost per mille or thousand (CPM) in USD, Cost per click (CPC) in USD, Cost per lead in USD, Cost per customer in USD, Revenue in USD, Return on investment (ROI) in percent, Revenue per click in USD, Revenue per lead in USD, Revenue per customer in USD, No. of orders per customer, Customer LTV in USD, Total revenue in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Impressions = 10, Visits = 100, Visits to leads = 1000 perc, Leads = 10, Leads to customers = 100 perc, Customers = 1000, Total cost = 10 USD, Cost per mille or thousand (CPM) = 100 USD, Cost per click (CPC) = 1000 USD, Cost per lead = 10 USD, Cost per customer = 100 USD, Revenue = 1000 USD, Return on investment (ROI) = 10 perc, Revenue per click = 100 USD, Revenue per lead = 1000 USD, Revenue per customer = 10 USD, No. of orders per customer = 100, Customer LTV = 1000 USD and Total revenue = 10 USD gives <strong>Click-through-rate (CTR)</strong> = 10 perc.</p><ul><li><strong>Click-through-rate (CTR)</strong> = 10 perc</li></ul><p>That is <strong>Impressions</strong> = <code>1000 × Total cost ÷ Cost per mille or thousand (CPM)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Click-through-rate (CTR)</strong> = 10. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Click-through-rate (CTR) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Impressions</strong> = <code>1000 × Total cost ÷ Cost per mille or thousand (CPM)</code></li><li><strong>Total cost</strong> = <code>(1 ÷ 1000) × Cost per mille or thousand (CPM) × Impressions</code></li><li><strong>Cost per mille or thousand (CPM)</strong> = <code>1000 × Total cost ÷ Impressions</code></li><li><strong>Visits</strong> = <code>Total cost ÷ Cost per click (CPC)</code></li><li><strong>Cost per click (CPC)</strong> = <code>Total cost ÷ Visits</code></li><li><strong>Click-through-rate (CTR)</strong> = <code>Visits ÷ Impressions</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Impressions</strong> = <code>1000 × Total cost ÷ Cost per mille or thousand (CPM)</code> — the form to use when Total cost and Cost per mille or thousand (CPM) are the values you have.</li><li><strong>Total cost</strong> = <code>(1 ÷ 1000) × Cost per mille or thousand (CPM) × Impressions</code> — the form to use when Cost per mille or thousand (CPM) and Impressions are the values you have.</li><li><strong>Cost per mille or thousand (CPM)</strong> = <code>1000 × Total cost ÷ Impressions</code> — the form to use when Total cost and Impressions are the values you have.</li><li><strong>Visits</strong> = <code>Total cost ÷ Cost per click (CPC)</code> — the form to use when Total cost and Cost per click (CPC) are the values you have.</li><li><strong>Total cost</strong> = <code>Cost per click (CPC) × Visits</code> — the form to use when Cost per click (CPC) and Visits are the values you have.</li><li><strong>Cost per click (CPC)</strong> = <code>Total cost ÷ Visits</code> — the form to use when Total cost and Visits are the values you have.</li><li><strong>Click-through-rate (CTR)</strong> = <code>Visits ÷ Impressions</code> — the form to use when Visits and Impressions are the values you have.</li><li><strong>Visits</strong> = <code>Click-through-rate (CTR) × Impressions</code> — the form to use when Click-through-rate (CTR) and Impressions are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Impressions, Total cost and Cost per mille or thousand (CPM) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Impressions from 10 to 20, leaving every other box alone. The panel moves from <strong>Click-through-rate (CTR)</strong> 10 perc to <strong>Click-through-rate (CTR)</strong> 5 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Click-through-rate (CTR), Visits to leads and Leads are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Impressions left as a guess.</strong> Anything typed into Impressions is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Visits left as a guess.</strong> Anything typed into Visits is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Impressions to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Impressions</strong> takes a plain number with no unit attached. It feeds Total cost, Cost per mille or thousand (CPM) and Visits. Have it to hand before you start: Impressions is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Visits</strong> takes a plain number with no unit attached. It feeds Total cost, Cost per click (CPC) and Impressions. Have it to hand before you start: Visits is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Impressions and Visits. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Impressions into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Click-through-rate (CTR) in perc with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Click-through-rate (CTR) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Impressions and Visits are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Impressions and Visits measured, Click-through-rate (CTR) and Visits to leads wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/investment-fees">Investment fees Calculator</a>, <a href="/finance/ira">IRA Calculator</a> and <a href="/finance/internal-rate-of-return">IRR Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Online marketing conversion calculator work out?', 'a' => <<<'TXT'
            Click-through-rate (CTR), Visits to leads, Leads and Leads to customers, from Total cost and Cost per mille or thousand (CPM). The relationship is Impressions = 1000 × Total cost ÷ Cost per mille or thousand (CPM).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Impressions, Visits. Enter impressions and visits; Click-through-rate (CTR) is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Impressions, Total cost, Cost per mille or thousand (CPM) and Visits can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Click-through-rate (CTR) = 10 perc. That comes from the page\'s own defaults, entered in Impressions; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Click-through-rate (CTR) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Impressions left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Click-through-rate (CTR) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/investment-fees', 'name' => 'Investment fees Calculator'],
            ['path' => '/finance/ira', 'name' => 'IRA Calculator'],
            ['path' => '/finance/internal-rate-of-return', 'name' => 'IRR Calculator'],
        ],
        'authors' => [],
    ],
];
