<?php

/**
 * Funds from operation (FFO)
 * /finance/ffo
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Funds from operation (FFO)',
    'meta' => ['title' => 'Funds from operation (FFO) — Formula & Results', 'description' => 'Enter net income and depreciation and amortization and get Funds from operation (FFO) back. Every box can be solved for, not only the one in the title.', 'h1' => 'Funds from operation (FFO) Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => '',
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
                            'name' => 'Depreciation_amortization',
                            'label' => 'Depreciation and amortization',
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
                            'name' => 'gains_property_sales',
                            'label' => 'Gains from property sales',
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
                            'name' => 'loss_property_sales',
                            'label' => 'Losses from property sales',
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
                            'name' => 'interest_income',
                            'label' => 'Interest income',
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
                            'name' => 'FFO',
                            'label' => 'Funds from operation (FFO)',
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
            'title' => 'FFO = net_income + Depreciation_amortization + loss_property_sales - gains_property_sales - interest_income',
            'results' => [
                'interest_income' => 'Depreciation_amortization - FFO - gains_property_sales + loss_property_sales + net_income',
                'loss_property_sales' => '-Depreciation_amortization + FFO + gains_property_sales + interest_income - net_income',
                'FFO' => 'Depreciation_amortization - gains_property_sales - interest_income + loss_property_sales + net_income',
                'gains_property_sales' => 'Depreciation_amortization - FFO - interest_income + loss_property_sales + net_income',
                'Depreciation_amortization' => 'FFO + gains_property_sales + interest_income - loss_property_sales - net_income',
                'net_income' => '-Depreciation_amortization + FFO + gains_property_sales + interest_income - loss_property_sales',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Funds from operation (FFO) turns Net income, Depreciation and amortization and Gains from property sales into Funds from operation (FFO). The arithmetic is the whole method: funds from operation (FFO) is worked out from net income by one formula, applied once. Funds from operation (FFO) comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Funds from operation (FFO) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Funds from operation (FFO): it takes 5 numbers and reports Funds from operation (FFO).</p><p>The relationship it solves reads Funds from operation (FFO) = Depreciation and amortization − Gains from property sales − Interest income + Losses from property sales + Net income.</p><p>The answers are Funds from operation (FFO); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Net income</strong> — in USD</li><li><strong>Depreciation and amortization</strong> — in USD</li><li><strong>Gains from property sales</strong> — in USD</li><li><strong>Losses from property sales</strong> — in USD</li><li><strong>Interest income</strong> — in USD</li></ul><p>What you get back is Funds from operation (FFO) in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Net income = 10 USD, Depreciation and amortization = 100 USD, Gains from property sales = 1000 USD, Losses from property sales = 10 USD and Interest income = 100 USD — through the same formula and the panel reports <strong>Funds from operation (FFO)</strong> = -980 USD.</p><ul><li><strong>Funds from operation (FFO)</strong> = -980 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Funds from operation (FFO)</strong> = <code>Depreciation and amortization − Gains from property sales − Interest income + Losses from property sales + Net income</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Funds from operation (FFO)</strong> = -980 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Funds from operation (FFO) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Funds from operation (FFO)</strong> = <code>Depreciation and amortization − Gains from property sales − Interest income + Losses from property sales + Net income</code></li><li><strong>Interest income</strong> = <code>Depreciation and amortization − Funds from operation (FFO) − Gains from property sales + Losses from property sales + Net income</code></li><li><strong>Losses from property sales</strong> = <code>− Depreciation and amortization + Funds from operation (FFO) + Gains from property sales + Interest income − Net income</code></li><li><strong>Gains from property sales</strong> = <code>Depreciation and amortization − Funds from operation (FFO) − Interest income + Losses from property sales + Net income</code></li><li><strong>Depreciation and amortization</strong> = <code>Funds from operation (FFO) + Gains from property sales + Interest income − Losses from property sales − Net income</code></li><li><strong>Net income</strong> = <code>− Depreciation and amortization + Funds from operation (FFO) + Gains from property sales + Interest income − Losses from property sales</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Funds from operation (FFO)</strong> = <code>Depreciation and amortization − Gains from property sales − Interest income + Losses from property sales + Net income</code> — the form to use when Depreciation and amortization, Gains from property sales, Interest income and Losses from property sales are the values you have.</li><li><strong>Interest income</strong> = <code>Depreciation and amortization − Funds from operation (FFO) − Gains from property sales + Losses from property sales + Net income</code> — the form to use when Depreciation and amortization, Funds from operation (FFO), Gains from property sales and Losses from property sales are the values you have.</li><li><strong>Losses from property sales</strong> = <code>− Depreciation and amortization + Funds from operation (FFO) + Gains from property sales + Interest income − Net income</code> — the form to use when Depreciation and amortization, Funds from operation (FFO), Gains from property sales and Interest income are the values you have.</li><li><strong>Gains from property sales</strong> = <code>Depreciation and amortization − Funds from operation (FFO) − Interest income + Losses from property sales + Net income</code> — the form to use when Depreciation and amortization, Funds from operation (FFO), Interest income and Losses from property sales are the values you have.</li><li><strong>Depreciation and amortization</strong> = <code>Funds from operation (FFO) + Gains from property sales + Interest income − Losses from property sales − Net income</code> — the form to use when Funds from operation (FFO), Gains from property sales, Interest income and Losses from property sales are the values you have.</li><li><strong>Net income</strong> = <code>− Depreciation and amortization + Funds from operation (FFO) + Gains from property sales + Interest income − Losses from property sales</code> — the form to use when Depreciation and amortization, Funds from operation (FFO), Gains from property sales and Interest income are the values you have.</li></ul><p>Any one of Funds from operation (FFO), Interest income and Losses from property sales can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Net income, from 10 to 20 — and the answers go from <strong>Funds from operation (FFO)</strong> -980 USD to <strong>Funds from operation (FFO)</strong> -970 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Funds from operation (FFO) is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Net income left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Net income is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Depreciation and amortization left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Depreciation and amortization is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Gains from property sales left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Gains from property sales is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Net income to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Funds from operation (FFO) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Net income</strong> takes a plain number with no unit attached. Change it and Interest income, Losses from property sales and Funds from operation (FFO) changes with it. Fill it from a measurement rather than a memory — Net income is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Depreciation and amortization</strong> takes a plain number with no unit attached. Change it and Interest income, Losses from property sales and Funds from operation (FFO) changes with it. Fill it from a measurement rather than a memory — Depreciation and amortization is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Gains from property sales</strong> takes a plain number with no unit attached. Change it and Interest income, Losses from property sales and Funds from operation (FFO) changes with it. Fill it from a measurement rather than a memory — Gains from property sales is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Losses from property sales</strong> takes a plain number with no unit attached. Change it and Interest income, Funds from operation (FFO) and Gains from property sales changes with it. Fill it from a measurement rather than a memory — Losses from property sales is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest income</strong> takes a plain number with no unit attached. Change it and Losses from property sales, Funds from operation (FFO) and Gains from property sales changes with it. Fill it from a measurement rather than a memory — Interest income is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Funds from operation (FFO)</strong> is a plain number and the page's own defaults put it at -980. The value follows from Depreciation and amortization, Gains from property sales, Interest income and Losses from property sales. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Funds from operation (FFO)</th></tr></thead><tbody><tr><td><strong>Net income</strong> +10%</td><td>+0.1%</td></tr><tr><td><strong>Depreciation and amortization</strong> +10%</td><td>+1.02%</td></tr><tr><td><strong>Gains from property sales</strong> +10%</td><td>-10.2%</td></tr><tr><td><strong>Losses from property sales</strong> +10%</td><td>+0.1%</td></tr><tr><td><strong>Interest income</strong> +10%</td><td>-1.02%</td></tr></tbody></table><p>Ranked by leverage, Gains from property sales sits at the top — a ten per cent error in that box shows up as roughly 10.2 per cent in the answer. By contrast, Net income and Losses from property sales barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Net income = 5 USD, Depreciation and amortization = 50 USD, Gains from property sales = 500 USD, Losses from property sales = 5 USD and Interest income = 50 USD and the page reports <strong>Funds from operation (FFO)</strong> = -490 USD.</li><li>Feed in Net income = 30 USD, Depreciation and amortization = 100 USD, Gains from property sales = 1000 USD, Losses from property sales = 10 USD and Interest income = 100 USD and the page reports <strong>Funds from operation (FFO)</strong> = -960 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Funds from operation (FFO) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Net income, Depreciation and amortization and Gains from property sales are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Net income, Depreciation and amortization and Gains from property sales and the number you are missing is Funds from operation (FFO).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/ebitda-multiple">EBITDA multiple</a>, <a href="/finance/economic-injury-disaster-loan">Economic Injury Disaster Loan Emergency Advance … Calculator</a> and <a href="/finance/eoq">Economic order quantity (EOQ) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Funds from operation (FFO) calculator work out?', 'a' => <<<'TXT'
            Funds from operation (FFO), from Depreciation and amortization, Gains from property sales, Interest income and Losses from property sales. The relationship is Funds from operation (FFO) = Depreciation and amortization − Gains from property sales − Interest income + Losses from property sales + Net income.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Net income (USD), Depreciation and amortization (USD), Gains from property sales (USD), Losses from property sales (USD), Interest income (USD). Fill net income, depreciation and amortization and gains from property sales and leave Funds from operation (FFO) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Funds from operation (FFO), Interest income, Losses from property sales and Gains from property sales blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Funds from operation (FFO) = -980 USD. Those are the defaults written into the form — move Net income and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Funds from operation (FFO) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Net income blank and the page solves for it, reporting Funds from operation (FFO) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Funds from operation (FFO) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/ebitda-multiple', 'name' => 'EBITDA multiple'],
            ['path' => '/finance/economic-injury-disaster-loan', 'name' => 'Economic Injury Disaster Loan Emergency Advance … Calculator'],
            ['path' => '/finance/eoq', 'name' => 'Economic order quantity (EOQ) Calculator'],
        ],
        'authors' => [],
    ],
];
