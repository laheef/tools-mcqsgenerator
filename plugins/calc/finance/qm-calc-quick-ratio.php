<?php

/**
 * Quick ratio
 * /finance/quick-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Quick ratio',
    'meta' => ['title' => 'Quick ratio Calculator: Formula, Steps & Examples', 'description' => 'Enter cash and cash equivalent and marketable securities and get quick ratio back. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Quick ratio Calculator', 'updated' => '2026-09-12'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_and_cash_equivalent',
                            'label' => 'Cash and cash equivalent',
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
                            'name' => 'Marketable_securities',
                            'label' => 'Marketable securities',
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
                            'name' => 'Accounts_receivable',
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
                            'name' => 'current_liabilities',
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
                            'name' => 'quick_ratio',
                            'label' => 'Quick ratio',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'quick_ratio = (cash_and_cash_equivalent + Marketable_securities + Accounts_receivable) / current_liabilities',
            'results' => [
                'current_liabilities' => '(Accounts_receivable + Marketable_securities + cash_and_cash_equivalent)/quick_ratio',
                'quick_ratio' => '(Accounts_receivable + Marketable_securities + cash_and_cash_equivalent)/current_liabilities',
                'cash_and_cash_equivalent' => '-Accounts_receivable - Marketable_securities + current_liabilities*quick_ratio',
                'Marketable_securities' => '-Accounts_receivable - cash_and_cash_equivalent + current_liabilities*quick_ratio',
                'Accounts_receivable' => '-Marketable_securities - cash_and_cash_equivalent + current_liabilities*quick_ratio',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Quick ratio takes Cash and cash equivalent, Marketable securities and Accounts receivable and returns Quick ratio. Nothing is looked up on this page: quick ratio is computed from cash and cash equivalent and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Quick ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Quick ratio: it takes 4 numbers and reports Quick ratio.</p><p>The relationship it solves reads Quick ratio = (Accounts receivable + Marketable securities + Cash and cash equivalent) ÷ Current liabilities.</p><p>The result panel carries Quick ratio, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Cash and cash equivalent</strong> — in USD</li><li><strong>Marketable securities</strong> — in USD</li><li><strong>Accounts receivable</strong> — in USD</li><li><strong>Current liabilities</strong> — in USD</li></ul><p>The answer comes back as Quick ratio. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Cash and cash equivalent = 10 USD, Marketable securities = 100 USD, Accounts receivable = 1000 USD and Current liabilities = 10 USD gives <strong>Quick ratio</strong> = 111.</p><ul><li><strong>Quick ratio</strong> = 111</li></ul><p>That is <strong>Quick ratio</strong> = <code>(Accounts receivable + Marketable securities + Cash and cash equivalent) ÷ Current liabilities</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Quick ratio</strong> = 111 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Quick ratio takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Quick ratio</strong> = <code>(Accounts receivable + Marketable securities + Cash and cash equivalent) ÷ Current liabilities</code></li><li><strong>Current liabilities</strong> = <code>(Accounts receivable + Marketable securities + Cash and cash equivalent) ÷ Quick ratio</code></li><li><strong>Cash and cash equivalent</strong> = <code>− Accounts receivable − Marketable securities + Current liabilities × Quick ratio</code></li><li><strong>Marketable securities</strong> = <code>− Accounts receivable − Cash and cash equivalent + Current liabilities × Quick ratio</code></li><li><strong>Accounts receivable</strong> = <code>− Marketable securities − Cash and cash equivalent + Current liabilities × Quick ratio</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Quick ratio</strong> = <code>(Accounts receivable + Marketable securities + Cash and cash equivalent) ÷ Current liabilities</code> — the form to use when Accounts receivable, Marketable securities, Cash and cash equivalent and Current liabilities are the values you have.</li><li><strong>Current liabilities</strong> = <code>(Accounts receivable + Marketable securities + Cash and cash equivalent) ÷ Quick ratio</code> — the form to use when Accounts receivable, Marketable securities, Cash and cash equivalent and Quick ratio are the values you have.</li><li><strong>Cash and cash equivalent</strong> = <code>− Accounts receivable − Marketable securities + Current liabilities × Quick ratio</code> — the form to use when Accounts receivable, Marketable securities, Current liabilities and Quick ratio are the values you have.</li><li><strong>Marketable securities</strong> = <code>− Accounts receivable − Cash and cash equivalent + Current liabilities × Quick ratio</code> — the form to use when Accounts receivable, Cash and cash equivalent, Current liabilities and Quick ratio are the values you have.</li><li><strong>Accounts receivable</strong> = <code>− Marketable securities − Cash and cash equivalent + Current liabilities × Quick ratio</code> — the form to use when Marketable securities, Cash and cash equivalent, Current liabilities and Quick ratio are the values you have.</li></ul><p>Any one of Quick ratio, Current liabilities and Cash and cash equivalent can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Cash and cash equivalent, from 10 to 20 — and the answers go from <strong>Quick ratio</strong> 111 to <strong>Quick ratio</strong> 112.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Quick ratio is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Cash and cash equivalent left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cash and cash equivalent is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Marketable securities left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Marketable securities is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Accounts receivable left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Accounts receivable is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Cash and cash equivalent to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Cash and cash equivalent</strong> takes a plain number with no unit attached. Change it and Current liabilities, Quick ratio and Marketable securities changes with it. Have it to hand before you start: Cash and cash equivalent is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Marketable securities</strong> takes a plain number with no unit attached. Change it and Current liabilities, Quick ratio and Cash and cash equivalent changes with it. Have it to hand before you start: Marketable securities is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Accounts receivable</strong> takes a plain number with no unit attached. Change it and Current liabilities, Quick ratio and Cash and cash equivalent changes with it. Have it to hand before you start: Accounts receivable is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Current liabilities</strong> takes a plain number with no unit attached. Change it and Quick ratio, Cash and cash equivalent and Marketable securities changes with it. Have it to hand before you start: Current liabilities is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Quick ratio</strong> is a plain number and the page's own defaults put it at 111. It is worked out from Accounts receivable, Marketable securities, Cash and cash equivalent and Current liabilities. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Quick ratio</th></tr></thead><tbody><tr><td><strong>Cash and cash equivalent</strong> +10%</td><td>+0.09%</td></tr><tr><td><strong>Marketable securities</strong> +10%</td><td>+0.9%</td></tr><tr><td><strong>Accounts receivable</strong> +10%</td><td>+9.01%</td></tr><tr><td><strong>Current liabilities</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Current liabilities sits at the top — a ten per cent error in that box shows up as roughly 9.1 per cent in the answer. By contrast, Cash and cash equivalent barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Cash and cash equivalent = 5 USD, Marketable securities = 50 USD, Accounts receivable = 500 USD and Current liabilities = 5 USD, the answer is <strong>Quick ratio</strong> = 111.</li><li>With Cash and cash equivalent = 30 USD, Marketable securities = 100 USD, Accounts receivable = 1000 USD and Current liabilities = 10 USD, the answer is <strong>Quick ratio</strong> = 113.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Quick ratio follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Cash and cash equivalent, Marketable securities and Accounts receivable and the number you are missing is Quick ratio.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/apr">APR</a>, <a href="/finance/apy">APY</a> and <a href="/finance/arm-mortgage">ARM mortgage Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Quick ratio is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Cash and cash equivalent, Marketable securities, Accounts receivable and Current liabilities beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Quick ratio calculator work out?', 'a' => <<<'TXT'
            Quick ratio, from Accounts receivable, Marketable securities, Cash and cash equivalent and Current liabilities. The relationship is Quick ratio = (Accounts receivable + Marketable securities + Cash and cash equivalent) ÷ Current liabilities.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cash and cash equivalent (USD), Marketable securities (USD), Accounts receivable (USD), Current liabilities (USD). Enter cash and cash equivalent, marketable securities and accounts receivable; Quick ratio is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Quick ratio, Current liabilities, Cash and cash equivalent and Marketable securities blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Quick ratio = 111. That comes from the page\'s own defaults, entered in Cash and cash equivalent; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Quick ratio is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Cash and cash equivalent left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Quick ratio keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/apr', 'name' => 'APR'],
            ['path' => '/finance/apy', 'name' => 'APY'],
            ['path' => '/finance/arm-mortgage', 'name' => 'ARM mortgage Calculator'],
        ],
        'authors' => [],
    ],
];
