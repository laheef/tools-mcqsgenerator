<?php

/**
 * Net operating working capital
 * /finance/net-operating-working-capital
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Net operating working capital',
    'meta' => ['title' => 'Net operating working capital — Formula & Results', 'description' => 'Net operating working capital turns cash and accounts receivable into current operating assets. Results come back in USD, with any other unit a click away.', 'h1' => 'Net operating working capital Calculator', 'updated' => '2026-09-19'],
    'sections' => [
        [
            'title' => 'Current operating assets',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash',
                            'label' => 'Cash',
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
                            'name' => 'accounts_receivable',
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
                            'name' => 'inventories',
                            'label' => 'Inventories',
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
                            'name' => 'current_operating_assets',
                            'label' => 'Current operating assets',
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
            'title' => 'Current operating liabilities',
            'note' => '',
            'blocks' => [
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
                            'name' => 'accrued_expenses',
                            'label' => 'Accrued expenses',
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
                            'name' => 'current_operating_liabilities',
                            'label' => 'Current operating liabilities',
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
            'title' => 'Net operating working capital',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nowc',
                            'label' => 'NOWC',
                            'type' => 'number',
                            'help' => 'Net operating working capital.',
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
            'title' => 'nowc = current_operating_assets - current_operating_liabilities',
            'results' => ['current_operating_liabilities' => 'current_operating_assets - nowc', 'nowc' => 'current_operating_assets - current_operating_liabilities', 'current_operating_assets' => 'current_operating_liabilities + nowc'],
        ],
        [
            'title' => 'current_operating_assets = cash + accounts_receivable + inventories',
            'results' => ['accounts_receivable' => '-cash + current_operating_assets - inventories', 'inventories' => '-accounts_receivable - cash + current_operating_assets', 'cash' => '-accounts_receivable + current_operating_assets - inventories', 'current_operating_assets' => 'accounts_receivable + cash + inventories'],
        ],
        [
            'title' => 'current_operating_liabilities = accounts_payable + accrued_expenses',
            'results' => ['current_operating_liabilities' => 'accounts_payable + accrued_expenses', 'accrued_expenses' => '-accounts_payable + current_operating_liabilities', 'accounts_payable' => '-accrued_expenses + current_operating_liabilities'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Current operating assets and Current operating liabilities into Net operating working capital and the answer comes back as Cash and Accounts receivable. It is a single relationship that reads cash out of current operating assets, not a table of canned results keyed by them. Units for Cash default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Net operating working capital calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Net operating working capital: it takes 2 numbers and reports Cash, Accounts receivable and Inventories.</p><p>In the form&#039;s own words, NOWC = Current operating assets − Current operating liabilities.</p><p>What comes back is Cash, Accounts receivable, Inventories and Accounts payable — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Current operating assets</strong> — in USD</li><li><strong>Current operating liabilities</strong> — in USD</li></ul><p>The result boxes are Cash in USD, Accounts receivable in USD, Inventories in USD, Accounts payable in USD, Accrued expenses in USD, NOWC in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Cash = 10 USD, Accounts receivable = 100 USD, Inventories = 1000 USD, Current operating assets = 10 USD, Accounts payable = 100 USD, Accrued expenses = 1000 USD and NOWC = 10 USD; the answers are <strong>Current operating liabilities</strong> = 0 USD.</p><ul><li><strong>Current operating liabilities</strong> = 0 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>NOWC</strong> = <code>Current operating assets − Current operating liabilities</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Current operating liabilities</strong> = 0. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Cash is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>NOWC</strong> = <code>Current operating assets − Current operating liabilities</code></li><li><strong>Current operating liabilities</strong> = <code>Current operating assets − NOWC</code></li><li><strong>Current operating assets</strong> = <code>Current operating liabilities + NOWC</code></li><li><strong>Accounts receivable</strong> = <code>− Cash + Current operating assets − Inventories</code></li><li><strong>Inventories</strong> = <code>− Accounts receivable − Cash + Current operating assets</code></li><li><strong>Cash</strong> = <code>− Accounts receivable + Current operating assets − Inventories</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>NOWC</strong> = <code>Current operating assets − Current operating liabilities</code> — the form to use when Current operating assets and Current operating liabilities are the values you have.</li><li><strong>Current operating liabilities</strong> = <code>Current operating assets − NOWC</code> — the form to use when Current operating assets and NOWC are the values you have.</li><li><strong>Current operating assets</strong> = <code>Current operating liabilities + NOWC</code> — the form to use when Current operating liabilities and NOWC are the values you have.</li><li><strong>Current operating assets</strong> = <code>Accounts receivable + Cash + Inventories</code> — the form to use when Accounts receivable, Cash and Inventories are the values you have.</li><li><strong>Accounts receivable</strong> = <code>− Cash + Current operating assets − Inventories</code> — the form to use when Cash, Current operating assets and Inventories are the values you have.</li><li><strong>Inventories</strong> = <code>− Accounts receivable − Cash + Current operating assets</code> — the form to use when Accounts receivable, Cash and Current operating assets are the values you have.</li><li><strong>Cash</strong> = <code>− Accounts receivable + Current operating assets − Inventories</code> — the form to use when Accounts receivable, Current operating assets and Inventories are the values you have.</li><li><strong>Current operating liabilities</strong> = <code>Accounts payable + Accrued expenses</code> — the form to use when Accounts payable and Accrued expenses are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of NOWC, Current operating liabilities and Current operating assets can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Cash from 10 to 20, leaving every other box alone. The panel moves from <strong>Current operating liabilities</strong> 0 USD to <strong>Current operating liabilities</strong> 0 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Cash, Accounts receivable and Inventories are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Current operating assets left as a guess.</strong> Anything typed into Current operating assets is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Current operating liabilities left as a guess.</strong> Anything typed into Current operating liabilities is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Current operating assets to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Net operating working capital form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Current operating assets</strong> takes a plain number with no unit attached. Change it and Current operating liabilities, NOWC and Accounts receivable changes with it. Fill it from a measurement rather than a memory — Current operating assets is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Current operating liabilities</strong> takes a plain number with no unit attached. Change it and NOWC, Current operating assets and Accrued expenses changes with it. Fill it from a measurement rather than a memory — Current operating liabilities is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 6 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Cash</strong> is a plain number. It is computed from Accounts receivable, Current operating assets and Inventories, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Accounts receivable</strong> is a plain number. It is computed from Cash, Current operating assets and Inventories, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Inventories</strong> is a plain number. It is computed from Accounts receivable, Cash and Current operating assets, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Accounts payable</strong> is a plain number. It is computed from Accrued expenses and Current operating liabilities, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Accrued expenses</strong> is a plain number. It is computed from Accounts payable and Current operating liabilities, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>NOWC</strong> is a plain number. It is computed from Current operating assets and Current operating liabilities, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Current operating liabilities</th></tr></thead><tbody><tr><td><strong>Cash</strong> +10%</td><td>—</td></tr><tr><td><strong>Accounts receivable</strong> +10%</td><td>—</td></tr><tr><td><strong>Inventories</strong> +10%</td><td>—</td></tr><tr><td><strong>Current operating assets</strong> +10%</td><td>—</td></tr><tr><td><strong>Accounts payable</strong> +10%</td><td>—</td></tr><tr><td><strong>Accrued expenses</strong> +10%</td><td>—</td></tr><tr><td><strong>NOWC</strong> +10%</td><td>—</td></tr></tbody></table><p>The steepest column belongs to Cash: ten per cent there moves an answer by about 0 per cent, which is why that is the number to measure twice. By contrast, Cash, Accounts receivable and Inventories barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Cash = 5 USD, Accounts receivable = 50 USD, Inventories = 500 USD, Current operating assets = 5 USD, Accounts payable = 50 USD, Accrued expenses = 500 USD and NOWC = 5 USD and the page reports <strong>Current operating liabilities</strong> = 0 USD.</li><li>Feed in Cash = 30 USD, Accounts receivable = 100 USD, Inventories = 1000 USD, Current operating assets = 10 USD, Accounts payable = 100 USD, Accrued expenses = 1000 USD and NOWC = 10 USD and the page reports <strong>Current operating liabilities</strong> = 0 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Cash is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Current operating assets and Current operating liabilities is what you already know and Cash and Accounts receivable is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/carried-interest">Carried interest Calculator</a>, <a href="/finance/carry-trade">Carry trade Calculator</a> and <a href="/finance/cash-act-2020">CASH Act of 2020</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Net operating working capital calculator work out?', 'a' => <<<'TXT'
            Cash, Accounts receivable, Inventories and Accounts payable, from Current operating assets and Current operating liabilities. The relationship is NOWC = Current operating assets − Current operating liabilities.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current operating assets (USD), Current operating liabilities (USD). Fill current operating assets and current operating liabilities and leave Cash empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. NOWC, Current operating liabilities, Current operating assets and Accounts receivable can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Current operating liabilities = 0 USD. That comes from the page's own defaults, entered in Current operating assets; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Cash is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Current operating assets blank and the page solves for it, reporting Cash instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Cash keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/carried-interest', 'name' => 'Carried interest Calculator'],
            ['path' => '/finance/carry-trade', 'name' => 'Carry trade Calculator'],
            ['path' => '/finance/cash-act-2020', 'name' => 'CASH Act of 2020'],
        ],
        'authors' => [],
    ],
];
