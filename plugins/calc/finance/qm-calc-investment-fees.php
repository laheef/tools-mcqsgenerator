<?php

/**
 * Investment fees
 * /finance/investment-fees
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Investment fees',
    'meta' => ['title' => 'Investment fees Calculator — Formula, Units & Example', 'description' => 'Investment fees works out invested amount from initial investment amount. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Investment fees Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => 'Invested amount',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ini_inv',
                            'label' => 'Initial investment amount',
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
                            'name' => 'sales_load',
                            'label' => 'Sales load',
                            'type' => 'number',
                            'help' => 'Fees charged by mutual fund companies or brokers when an investor buys or sells mutual fund shares.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inv_amt',
                            'label' => 'Invested amount',
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
            'title' => 'Effective return',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ann_return',
                            'label' => 'Annual return',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'op_exp',
                            'label' => 'Annual operating fees',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eff_return',
                            'label' => 'Effective return',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Fund value before redemption',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n',
                            'label' => 'Investment duration',
                            'type' => 'number',
                            'suffix' => 'year(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'to_cost',
                            'label' => 'Turnover cost',
                            'type' => 'number',
                            'help' => 'Costs incurred when buying and selling securities within a portfolio.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fv_bef_redep',
                            'label' => 'Fund value before redemption',
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
            'title' => 'Final fund value',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'redep_rate',
                            'label' => 'Redemption fees',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fv_aft_redep',
                            'label' => 'Final fund value',
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
            'title' => 'Fund value without fees',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_fees',
                            'label' => 'Total fees',
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
                            'name' => 'fv_no_fees',
                            'label' => 'Fund value without fees',
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
            'title' => 'inv_amt = ini_inv * (1 - sales_load)',
            'results' => ['ini_inv' => '-inv_amt/(sales_load - 1)', 'inv_amt' => 'ini_inv*(1 - sales_load)', 'sales_load' => '(ini_inv - inv_amt)/ini_inv'],
        ],
        [
            'title' => 'eff_return = ann_return - op_exp',
            'results' => ['ann_return' => 'eff_return + op_exp', 'op_exp' => 'ann_return - eff_return', 'eff_return' => 'ann_return - op_exp'],
        ],
        [
            'title' => 'fv_bef_redep = inv_amt * (1 + eff_return) ^ n - (inv_amt * to_cost)',
            'results' => [
                'n' => 'log(fv_bef_redep/inv_amt + to_cost)/log(eff_return + 1)',
                'to_cost' => '-fv_bef_redep/inv_amt + pow(eff_return + 1, n)',
                'fv_bef_redep' => 'inv_amt*(-to_cost + pow(eff_return + 1, n))',
                'inv_amt' => 'fv_bef_redep/(-to_cost + pow(eff_return + 1, n))',
                'eff_return' => 'pow(fv_bef_redep/inv_amt + to_cost, 1/n) - 1',
            ],
        ],
        [
            'title' => 'fv_aft_redep = fv_bef_redep * (1 - redep_rate)',
            'results' => ['redep_rate' => '(-fv_aft_redep + fv_bef_redep)/fv_bef_redep', 'fv_aft_redep' => 'fv_bef_redep*(1 - redep_rate)', 'fv_bef_redep' => '-fv_aft_redep/(redep_rate - 1)'],
        ],
        [
            'title' => 'fv_no_fees = ini_inv * (1 + ann_return) ^ n',
            'results' => ['n' => 'log(fv_no_fees/ini_inv)/log(ann_return + 1)', 'fv_no_fees' => 'ini_inv*pow(ann_return + 1, n)', 'ann_return' => 'pow(fv_no_fees/ini_inv, 1/n) - 1', 'ini_inv' => 'fv_no_fees*pow(ann_return + 1, -n)'],
        ],
        [
            'title' => 'total_fees = fv_no_fees - fv_aft_redep',
            'results' => ['fv_no_fees' => 'fv_aft_redep + total_fees', 'total_fees' => '-fv_aft_redep + fv_no_fees', 'fv_aft_redep' => 'fv_no_fees - total_fees'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Investment fees turns Initial investment amount and Sales load into Invested amount and Annual return. The arithmetic is the whole method: invested amount is worked out from initial investment amount by one formula, applied once. Invested amount comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Investment fees calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Investment fees: it takes 2 numbers and reports Invested amount, Annual return and Annual operating fees.</p><p>Written with the labels from the form, Invested amount = Initial investment amount × (1 − Sales load).</p><p>The answers are Invested amount, Annual return, Annual operating fees and Effective return; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Initial investment amount</strong> — in USD</li><li><strong>Sales load</strong> — in percent. Fees charged by mutual fund companies or brokers when an investor buys or sells mutual fund shares.</li></ul><p>The result boxes are Invested amount in USD, Annual return in percent, Annual operating fees in percent, Effective return in percent, Investment duration in year(s), Turnover cost in percent, Fund value before redemption in USD, Redemption fees in percent, Final fund value in USD, Total fees in USD, Fund value without fees in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Initial investment amount = 10 USD, Sales load = 100 perc, Annual return = 1000 perc, Annual operating fees = 10 perc, Effective return = 100 perc, Investment duration = 1000 year(s), Turnover cost = 10 perc, Fund value before redemption = 100 USD, Redemption fees = 1000 perc, Final fund value = 10 USD, Total fees = 100 USD and Fund value without fees = 1000 USD — through the same formula and the panel reports <strong>Invested amount</strong> = -990 USD.</p><ul><li><strong>Invested amount</strong> = -990 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Invested amount</strong> = <code>Initial investment amount × (1 − Sales load)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Invested amount</strong> = -990 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Annual return offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Invested amount</strong> = <code>Initial investment amount × (1 − Sales load)</code></li><li><strong>Initial investment amount</strong> = <code>− Invested amount ÷ (Sales load − 1)</code></li><li><strong>Sales load</strong> = <code>(Initial investment amount − Invested amount) ÷ Initial investment amount</code></li><li><strong>Effective return</strong> = <code>Annual return − Annual operating fees</code></li><li><strong>Annual return</strong> = <code>Effective return + Annual operating fees</code></li><li><strong>Annual operating fees</strong> = <code>Annual return − Effective return</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Invested amount</strong> = <code>Initial investment amount × (1 − Sales load)</code> — the form to use when Initial investment amount and Sales load are the values you have.</li><li><strong>Initial investment amount</strong> = <code>− Invested amount ÷ (Sales load − 1)</code> — the form to use when Invested amount and Sales load are the values you have.</li><li><strong>Sales load</strong> = <code>(Initial investment amount − Invested amount) ÷ Initial investment amount</code> — the form to use when Initial investment amount and Invested amount are the values you have.</li><li><strong>Effective return</strong> = <code>Annual return − Annual operating fees</code> — the form to use when Annual return and Annual operating fees are the values you have.</li><li><strong>Annual return</strong> = <code>Effective return + Annual operating fees</code> — the form to use when Effective return and Annual operating fees are the values you have.</li><li><strong>Annual operating fees</strong> = <code>Annual return − Effective return</code> — the form to use when Annual return and Effective return are the values you have.</li><li><strong>Fund value before redemption</strong> = <code>Invested amount × ( − Turnover cost + (Effective return + 1)^(Investment duration))</code> — the form to use when Invested amount, Turnover cost, Effective return and Investment duration are the values you have.</li><li><strong>Investment duration</strong> = <code>ln(Fund value before redemption ÷ Invested amount + Turnover cost) ÷ ln(Effective return + 1)</code> — the form to use when Fund value before redemption, Invested amount, Turnover cost and Effective return are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Invested amount, Initial investment amount and Sales load can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Initial investment amount, from 10 to 20 — and the answers go from <strong>Invested amount</strong> -990 USD to <strong>Invested amount</strong> -1980 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Sales load is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Invested amount, Annual return and Annual operating fees are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Initial investment amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Initial investment amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Sales load left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Sales load is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Initial investment amount and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Investment fees form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Initial investment amount</strong> takes a plain number with no unit attached. It feeds Invested amount, Sales load and Investment duration. Fill it from a measurement rather than a memory — Initial investment amount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Sales load</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Fees charged by mutual fund companies or brokers when an investor buys or sells mutual fund shares. It feeds Initial investment amount and Invested amount. Fill it from a measurement rather than a memory — Sales load is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Invested amount</strong> is a plain number and the page's own defaults put it at -990. It is worked out from Initial investment amount and Sales load. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Annual return</strong> is a percent figure. It is worked out from Effective return and Annual operating fees. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Annual operating fees</strong> is a percent figure. It is worked out from Annual return and Effective return. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Effective return</strong> is a percent figure. It is worked out from Annual return and Annual operating fees. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Investment duration</strong> is a plain number. It is worked out from Fund value before redemption, Invested amount, Turnover cost and Effective return. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Turnover cost</strong> is a percent figure. It is worked out from Fund value before redemption, Invested amount, Effective return and Investment duration. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Fund value before redemption</strong> is a plain number. It is worked out from Invested amount, Turnover cost, Effective return and Investment duration. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Redemption fees</strong> is a percent figure. It is worked out from Final fund value and Fund value before redemption. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Final fund value</strong> is a plain number. It is worked out from Fund value before redemption and Redemption fees. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total fees</strong> is a plain number. It is worked out from Final fund value and Fund value without fees. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Fund value without fees</strong> is a plain number. It is worked out from Initial investment amount, Annual return and Investment duration. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Invested amount is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Initial investment amount and Sales load are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Initial investment amount and Sales load measured, Invested amount and Annual return wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/ira">IRA Calculator</a>, <a href="/finance/internal-rate-of-return">IRR Calculator</a> and <a href="/finance/jensen-alpha">Jensen&#039;s alpha Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Investment fees calculator work out?', 'a' => <<<'TXT'
            Invested amount, Annual return, Annual operating fees and Effective return, from Initial investment amount and Sales load. The relationship is Invested amount = Initial investment amount × (1 − Sales load).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial investment amount (USD), Sales load (percent). Enter initial investment amount and sales load; Invested amount is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Invested amount, Initial investment amount, Sales load and Effective return can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Invested amount = -990 USD. The figures come from Initial investment amount as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Invested amount is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Initial investment amount blank and the page solves for it, reporting Invested amount instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Invested amount keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/ira', 'name' => 'IRA Calculator'],
            ['path' => '/finance/internal-rate-of-return', 'name' => 'IRR Calculator'],
            ['path' => '/finance/jensen-alpha', 'name' => 'Jensen\'s alpha Calculator'],
        ],
        'authors' => [],
    ],
];
