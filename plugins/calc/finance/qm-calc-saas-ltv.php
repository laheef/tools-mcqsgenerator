<?php

/**
 * SaaS lifetime value
 * /finance/saas-ltv
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'SaaS lifetime value',
    'meta' => ['title' => 'SaaS lifetime value: Formula, Steps & Results', 'description' => 'SaaS lifetime value works out average revenue per account (ARPA) and Customer lifetime value (LTV) from # of customers and Monthly recurring revenue (MRR).', 'h1' => 'SaaS lifetime value Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_customers',
                            'label' => '# of customers',
                            'type' => 'number',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mrr',
                            'label' => 'Monthly recurring revenue (MRR)',
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
                            'name' => 'arpa',
                            'label' => 'Average revenue per account (ARPA)',
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
                            'name' => 'arpa_checkbox',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['I don\'t know the ARPA.' => '1'],
                            'dataset' => 'arpa_checkbox',
                            'control' => 'CHECKBOX',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gross_margin',
                            'label' => 'Gross margin',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                            'default' => '100',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'churn',
                            'label' => 'Churn',
                            'type' => 'number',
                            'help' => 'The percentage of users that stop using the service each month.',
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
                            'name' => 'account_expansion',
                            'label' => 'Account expansion',
                            'type' => 'number',
                            'help' => 'Use this to simulate a monthly fixed growth of MRR per account.',
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
                            'name' => 'ltv',
                            'label' => 'Customer lifetime value (LTV)',
                            'type' => 'number',
                            'help' => 'How much you\'re going to earn on an average customer during the entire period that they\'re buying from you.',
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
            'title' => 'ltv = (0.5 * 1 / churn * (2 * arpa + account_expansion * (1 / churn - 1))) * gross_margin',
            'results' => [
                'gross_margin' => '2*pow(churn, 2)*ltv/(-account_expansion*churn + account_expansion + 2*arpa*churn)',
                'ltv' => '(1/2)*gross_margin*(account_expansion + churn*(-account_expansion + 2*arpa))/pow(churn, 2)',
                'churn' => <<<'TXT'
                (1/4)*(-gross_margin*(account_expansion - 2*arpa) + sqrt(gross_margin*(pow(account_expansion, 2)*gross_margin - 4*account_expansion*arpa*gross_margin + 8*account_expansion*ltv + 4*pow(arpa, 2)*gross_margin)))/ltv
                TXT,
                'account_expansion' => '2*churn*(arpa*gross_margin - churn*ltv)/(gross_margin*(churn - 1))',
                'arpa' => '(1/2)*account_expansion - 1/2*account_expansion/churn + churn*ltv/gross_margin',
            ],
        ],
        [
            'title' => 'mrr / num_customers = arpa',
            'results' => ['num_customers' => 'mrr/arpa', 'mrr' => 'arpa*num_customers', 'arpa' => 'mrr/num_customers'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        SaaS lifetime value turns Average revenue per account (ARPA), Gross margin and Churn into # of customers and Monthly recurring revenue (MRR). Nothing is looked up on this page: # of customers is computed from average revenue per account (ARPA) and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the SaaS lifetime value calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind SaaS lifetime value: it takes 4 numbers and reports # of customers, Monthly recurring revenue (MRR) and Customer lifetime value (LTV).</p><p>In the form&#039;s own words, Customer lifetime value (LTV) = (1 ÷ 2) × Gross margin × (Account expansion + Churn × ( − Account expansion + 2 × Average revenue per account (ARPA))) ÷ (Churn)^(2).</p><p>What comes back is # of customers, Monthly recurring revenue (MRR) and Customer lifetime value (LTV) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Average revenue per account (ARPA)</strong> — in USD</li><li><strong>Gross margin</strong> — in percent</li><li><strong>Churn</strong> — in percent. The percentage of users that stop using the service each month.</li><li><strong>Account expansion</strong> — in USD. Use this to simulate a monthly fixed growth of MRR per account.</li></ul><p>The answers come back as # of customers, Monthly recurring revenue (MRR) in USD, Customer lifetime value (LTV) in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Gross margin offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Customer lifetime value (LTV)</strong> = <code>(1 ÷ 2) × Gross margin × (Account expansion + Churn × ( − Account expansion + 2 × Average revenue per account (ARPA))) ÷ (Churn)^(2)</code></li><li><strong>Gross margin</strong> = <code>2 × (Churn)^(2) × Customer lifetime value (LTV) ÷ ( − Account expansion × Churn + Account expansion + 2 × Average revenue per account (ARPA) × Churn)</code></li><li><strong>Account expansion</strong> = <code>2 × Churn × (Average revenue per account (ARPA) × Gross margin − Churn × Customer lifetime value (LTV)) ÷ (Gross margin × (Churn − 1))</code></li><li><strong>Average revenue per account (ARPA)</strong> = <code>(1 ÷ 2) × Account expansion − 1 ÷ 2 × Account expansion ÷ Churn + Churn × Customer lifetime value (LTV) ÷ Gross margin</code></li><li><strong># of customers</strong> = <code>Monthly recurring revenue (MRR) ÷ Average revenue per account (ARPA)</code></li><li><strong>Monthly recurring revenue (MRR)</strong> = <code>Average revenue per account (ARPA) × # of customers</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Customer lifetime value (LTV)</strong> = <code>(1 ÷ 2) × Gross margin × (Account expansion + Churn × ( − Account expansion + 2 × Average revenue per account (ARPA))) ÷ (Churn)^(2)</code> — the form to use when Gross margin, Account expansion, Churn and Average revenue per account (ARPA) are the values you have.</li><li><strong>Gross margin</strong> = <code>2 × (Churn)^(2) × Customer lifetime value (LTV) ÷ ( − Account expansion × Churn + Account expansion + 2 × Average revenue per account (ARPA) × Churn)</code> — the form to use when Churn, Customer lifetime value (LTV), Account expansion and Average revenue per account (ARPA) are the values you have.</li><li><strong>Account expansion</strong> = <code>2 × Churn × (Average revenue per account (ARPA) × Gross margin − Churn × Customer lifetime value (LTV)) ÷ (Gross margin × (Churn − 1))</code> — the form to use when Churn, Average revenue per account (ARPA), Gross margin and Customer lifetime value (LTV) are the values you have.</li><li><strong>Average revenue per account (ARPA)</strong> = <code>(1 ÷ 2) × Account expansion − 1 ÷ 2 × Account expansion ÷ Churn + Churn × Customer lifetime value (LTV) ÷ Gross margin</code> — the form to use when Account expansion, Churn, Customer lifetime value (LTV) and Gross margin are the values you have.</li><li><strong># of customers</strong> = <code>Monthly recurring revenue (MRR) ÷ Average revenue per account (ARPA)</code> — the form to use when Monthly recurring revenue (MRR) and Average revenue per account (ARPA) are the values you have.</li><li><strong>Monthly recurring revenue (MRR)</strong> = <code>Average revenue per account (ARPA) × # of customers</code> — the form to use when Average revenue per account (ARPA) and # of customers are the values you have.</li><li><strong>Average revenue per account (ARPA)</strong> = <code>Monthly recurring revenue (MRR) ÷ # of customers</code> — the form to use when Monthly recurring revenue (MRR) and # of customers are the values you have.</li></ul><p>Any one of Customer lifetime value (LTV), Gross margin and Churn can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Gross margin and Churn is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with # of customers, Monthly recurring revenue (MRR) and Customer lifetime value (LTV) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Average revenue per account (ARPA) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Average revenue per account (ARPA) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Gross margin left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Gross margin is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Average revenue per account (ARPA) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Average revenue per account (ARPA)</strong> takes a plain number with no unit attached. It feeds Gross margin, Customer lifetime value (LTV) and Churn. Have it to hand before you start: Average revenue per account (ARPA) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Gross margin</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Customer lifetime value (LTV), Churn and Account expansion. Have it to hand before you start: Gross margin is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Churn</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The percentage of users that stop using the service each month. It feeds Gross margin, Customer lifetime value (LTV) and Account expansion. Have it to hand before you start: Churn is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Account expansion</strong> takes a plain number with no unit attached. Use this to simulate a monthly fixed growth of MRR per account. It feeds Gross margin, Customer lifetime value (LTV) and Churn. Have it to hand before you start: Account expansion is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong># of customers</strong> is a plain number. It is computed from Monthly recurring revenue (MRR) and Average revenue per account (ARPA), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Monthly recurring revenue (MRR)</strong> is a plain number. It is computed from Average revenue per account (ARPA) and # of customers, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Customer lifetime value (LTV)</strong> is a plain number. It is computed from Gross margin, Account expansion, Churn and Average revenue per account (ARPA), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> # of customers is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Average revenue per account (ARPA), Gross margin and Churn and the number you are missing is # of customers and Monthly recurring revenue (MRR).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/unlevered-beta">Unlevered beta Calculator</a>, <a href="/finance/unlevered-free-cash-flow">Unlevered free cash flow Calculator</a> and <a href="/finance/unpaid-work">Unpaid work</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the SaaS lifetime value calculator work out?', 'a' => <<<'TXT'
            # of customers, Monthly recurring revenue (MRR) and Customer lifetime value (LTV), from Gross margin, Account expansion, Churn and Average revenue per account (ARPA). The relationship is Customer lifetime value (LTV) = (1 ÷ 2) × Gross margin × (Account expansion + Churn × ( − Account expansion + 2 × Average revenue per account (ARPA))) ÷ (Churn)^(2).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Average revenue per account (ARPA) (USD), Gross margin (percent), Churn (percent), Account expansion (USD). Enter average revenue per account (ARPA), gross margin and churn; # of customers is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Customer lifetime value (LTV), Gross margin, Churn and Account expansion blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally # of customers is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Average revenue per account (ARPA) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. # of customers keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/unlevered-beta', 'name' => 'Unlevered beta Calculator'],
            ['path' => '/finance/unlevered-free-cash-flow', 'name' => 'Unlevered free cash flow Calculator'],
            ['path' => '/finance/unpaid-work', 'name' => 'Unpaid work'],
        ],
        'authors' => [],
    ],
];
