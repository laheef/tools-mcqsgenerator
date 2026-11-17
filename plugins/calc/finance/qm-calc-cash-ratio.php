<?php

/**
 * Cash ratio
 * /finance/cash-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cash ratio',
    'meta' => ['title' => 'Cash ratio Calculator: Formula, Steps & Examples', 'description' => 'Cash ratio takes current liabilities and returns cash and cash equivalents. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Cash ratio Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_eq',
                            'label' => ' Cash and cash equivalents',
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
                            'name' => 'cur_lia',
                            'label' => 'Current liabilities',
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
                            'name' => 'cash_ratio',
                            'label' => 'Cash ratio',
                            'type' => 'number',
                            'suffix' => 'x',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Calculate cash and cash equivalents',
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
                            'name' => 'deposit',
                            'label' => 'Demand deposit',
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
                            'name' => 'saving_acc',
                            'label' => 'Saving account',
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
                            'name' => 'market_fund',
                            'label' => 'Money market fund',
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
                            'name' => 't_bill',
                            'label' => 'Treasury bills',
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
            'title' => 'cash_ratio = cash_eq / cur_lia',
            'results' => ['cash_eq' => 'cash_ratio*cur_lia', 'cash_ratio' => 'cash_eq/cur_lia', 'cur_lia' => 'cash_eq/cash_ratio'],
        ],
        [
            'title' => 'cash_eq = cash + deposit + market_fund + saving_acc + t_bill ',
            'results' => [
                'cash_eq' => 'cash + deposit + market_fund + saving_acc + t_bill',
                'cash' => 'cash_eq - deposit - market_fund - saving_acc - t_bill',
                'saving_acc' => '-cash + cash_eq - deposit - market_fund - t_bill',
                'market_fund' => '-cash + cash_eq - deposit - saving_acc - t_bill',
                't_bill' => '-cash + cash_eq - deposit - market_fund - saving_acc',
                'deposit' => '-cash + cash_eq - market_fund - saving_acc - t_bill',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Cash and cash equivalents and Current liabilities into Cash ratio and the answer comes back as Cash ratio and Cash. There is no hidden constant here: change cash ratio and cash and cash equivalents moves with it. The main result, Cash ratio, is reported in x.
        TXT,
        'sections' => [
            ['title' => 'How the Cash ratio calculator works', 'html' => <<<'TXT'
            <p>Cash ratio answers one question from 2 numbers, and the answer is Cash ratio, Cash and Demand deposit.</p><p>In the form&#039;s own words, Cash ratio = Cash and cash equivalents ÷ Current liabilities.</p><p>The answers are Cash ratio, Cash, Demand deposit and Saving account; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Cash and cash equivalents</strong> — in USD</li><li><strong>Current liabilities</strong> — in USD</li></ul><p>The answers come back as Cash ratio in x, Cash in USD, Demand deposit in USD, Saving account in USD, Money market fund in USD, Treasury bills in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Current liabilities = 10 USD, Cash ratio = 100 x, Cash = 1000 USD, Demand deposit = 10 USD, Saving account = 100 USD, Money market fund = 1000 USD and Treasury bills = 10 USD gives <strong>Cash and cash equivalents</strong> = 1000 USD.</p><ul><li><strong>Cash and cash equivalents</strong> = 1000 USD</li></ul><p>The line behind those figures is <strong>Cash ratio</strong> = <code>Cash and cash equivalents ÷ Current liabilities</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Cash and cash equivalents</strong> = 1000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Cash ratio is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Cash ratio</strong> = <code>Cash and cash equivalents ÷ Current liabilities</code></li><li><strong>Cash and cash equivalents</strong> = <code>Cash ratio × Current liabilities</code></li><li><strong>Current liabilities</strong> = <code>Cash and cash equivalents ÷ Cash ratio</code></li><li><strong>Cash</strong> = <code>Cash and cash equivalents − Demand deposit − Money market fund − Saving account − Treasury bills</code></li><li><strong>Saving account</strong> = <code>− Cash + Cash and cash equivalents − Demand deposit − Money market fund − Treasury bills</code></li><li><strong>Money market fund</strong> = <code>− Cash + Cash and cash equivalents − Demand deposit − Saving account − Treasury bills</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Cash ratio</strong> = <code>Cash and cash equivalents ÷ Current liabilities</code> — the form to use when Cash and cash equivalents and Current liabilities are the values you have.</li><li><strong>Cash and cash equivalents</strong> = <code>Cash ratio × Current liabilities</code> — the form to use when Cash ratio and Current liabilities are the values you have.</li><li><strong>Current liabilities</strong> = <code>Cash and cash equivalents ÷ Cash ratio</code> — the form to use when Cash and cash equivalents and Cash ratio are the values you have.</li><li><strong>Cash and cash equivalents</strong> = <code>Cash + Demand deposit + Money market fund + Saving account + Treasury bills</code> — the form to use when Cash, Demand deposit, Money market fund and Saving account are the values you have.</li><li><strong>Cash</strong> = <code>Cash and cash equivalents − Demand deposit − Money market fund − Saving account − Treasury bills</code> — the form to use when Cash and cash equivalents, Demand deposit, Money market fund and Saving account are the values you have.</li><li><strong>Saving account</strong> = <code>− Cash + Cash and cash equivalents − Demand deposit − Money market fund − Treasury bills</code> — the form to use when Cash, Cash and cash equivalents, Demand deposit and Money market fund are the values you have.</li><li><strong>Money market fund</strong> = <code>− Cash + Cash and cash equivalents − Demand deposit − Saving account − Treasury bills</code> — the form to use when Cash, Cash and cash equivalents, Demand deposit and Saving account are the values you have.</li><li><strong>Treasury bills</strong> = <code>− Cash + Cash and cash equivalents − Demand deposit − Money market fund − Saving account</code> — the form to use when Cash, Cash and cash equivalents, Demand deposit and Money market fund are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Cash ratio, Cash and cash equivalents and Current liabilities can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Current liabilities from 10 to 20, leaving every other box alone. The panel moves from <strong>Cash and cash equivalents</strong> 1000 USD to <strong>Cash and cash equivalents</strong> 2000 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Cash ratio, Cash and Demand deposit are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Cash and cash equivalents left as a guess.</strong> Anything typed into Cash and cash equivalents is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Current liabilities left as a guess.</strong> Anything typed into Current liabilities is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Cash and cash equivalents is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Cash and cash equivalents</strong> takes a plain number with no unit attached. It feeds Cash ratio, Current liabilities and Cash. Have it to hand before you start: Cash and cash equivalents is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Current liabilities</strong> takes a plain number with no unit attached. It feeds Cash and cash equivalents and Cash ratio. Have it to hand before you start: Current liabilities is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Cash ratio</strong> is a plain number. The value follows from Cash and cash equivalents and Current liabilities. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Cash</strong> is a plain number. The value follows from Cash and cash equivalents, Demand deposit, Money market fund and Saving account. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Demand deposit</strong> is a plain number. The value follows from Cash, Cash and cash equivalents, Money market fund and Saving account. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Saving account</strong> is a plain number. The value follows from Cash, Cash and cash equivalents, Demand deposit and Money market fund. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Money market fund</strong> is a plain number. The value follows from Cash, Cash and cash equivalents, Demand deposit and Saving account. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Treasury bills</strong> is a plain number. The value follows from Cash, Cash and cash equivalents, Demand deposit and Money market fund. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Cash and cash equivalents</th></tr></thead><tbody><tr><td><strong>Current liabilities</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Cash ratio</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Cash</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Demand deposit</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Saving account</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Money market fund</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Treasury bills</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Cash ratio: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Cash, Demand deposit and Saving account barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Current liabilities = 5 USD, Cash ratio = 50 x, Cash = 500 USD, Demand deposit = 5 USD, Saving account = 50 USD, Money market fund = 500 USD and Treasury bills = 5 USD, the answer is <strong>Cash and cash equivalents</strong> = 250 USD.</li><li>With Current liabilities = 30 USD, Cash ratio = 100 x, Cash = 1000 USD, Demand deposit = 10 USD, Saving account = 100 USD, Money market fund = 1000 USD and Treasury bills = 10 USD, the answer is <strong>Cash and cash equivalents</strong> = 3000 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Cash ratio is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Cash and cash equivalents and Current liabilities are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Cash and cash equivalents and Current liabilities is what you already know and Cash ratio and Cash is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/youtube-money">YouTube money Calculator</a>, <a href="/finance/zakat">Zakat Calculator</a> and <a href="/finance/12-hour-shift">12 hour shift</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cash ratio calculator work out?', 'a' => <<<'TXT'
            Cash ratio, Cash, Demand deposit and Saving account, from Cash and cash equivalents and Current liabilities. The relationship is Cash ratio = Cash and cash equivalents ÷ Current liabilities.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cash and cash equivalents (USD), Current liabilities (USD). Enter cash and cash equivalents and current liabilities; Cash ratio is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Cash ratio, Cash and cash equivalents, Current liabilities and Cash can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Cash and cash equivalents = 1000 USD. That comes from the page's own defaults, entered in Cash and cash equivalents; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Cash ratio is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Cash and cash equivalents left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Cash ratio keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/youtube-money', 'name' => 'YouTube money Calculator'],
            ['path' => '/finance/zakat', 'name' => 'Zakat Calculator'],
            ['path' => '/finance/12-hour-shift', 'name' => '12 hour shift'],
        ],
        'authors' => [],
    ],
];
