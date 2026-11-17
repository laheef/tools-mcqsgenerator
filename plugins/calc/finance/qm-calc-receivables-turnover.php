<?php

/**
 * Receivables turnover
 * /finance/receivables-turnover
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Receivables turnover',
    'meta' => ['title' => 'Receivables turnover Calculator: Free, With Steps', 'description' => 'Enter net credit sales, accounts opening and accounts closing and Receivables turnover returns average accounts receivables. Any box can be the unknown.', 'h1' => 'Receivables turnover Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_credit_sales',
                            'label' => 'Net credit sales',
                            'type' => 'number',
                            'help' => 'Net credit sales is the revenue from goods or services sold on credit on a given day.',
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
                            'name' => 'accounts_opening',
                            'label' => 'Accounts opening',
                            'type' => 'number',
                            'help' => 'Accounts opening is the amount of outstanding receivables at the start of the day.',
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
                            'name' => 'accounts_closing',
                            'label' => 'Accounts closing',
                            'type' => 'number',
                            'help' => 'Accounts closing is the amount of outstanding receivables at the end of the day.',
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
                            'name' => 'average_accounts_receivables',
                            'label' => 'Average accounts receivables',
                            'type' => 'number',
                            'help' => 'Average accounts receivables is the money from previous credit sales that the business has yet receive from customers.',
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
                            'name' => 'receivables_turnover_ratio',
                            'label' => 'Receivables turnover ratio',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            Receivables turnover ratio is a measure of how effective the company is at providing credit to its customers and how efficiently it gets paid back on a given day.
                            TXT,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'receivables_turnover_ratio = net_credit_sales / average_accounts_receivables',
            'results' => ['average_accounts_receivables' => 'net_credit_sales/receivables_turnover_ratio', 'net_credit_sales' => 'average_accounts_receivables*receivables_turnover_ratio', 'receivables_turnover_ratio' => 'net_credit_sales/average_accounts_receivables'],
        ],
        [
            'title' => 'average_accounts_receivables = (accounts_opening + accounts_closing) / 2',
            'results' => ['average_accounts_receivables' => '(1/2)*accounts_closing + (1/2)*accounts_opening', 'accounts_closing' => '-accounts_opening + 2*average_accounts_receivables', 'accounts_opening' => '-accounts_closing + 2*average_accounts_receivables'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Receivables turnover turns Net credit sales and Average accounts receivables into Accounts opening and Accounts closing. Nothing is looked up on this page: accounts opening is computed from net credit sales and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Accounts opening is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Receivables turnover calculator works', 'html' => <<<'TXT'
            <p>The Receivables turnover calculator applies one relationship to 2 numbers and reports Accounts opening, Accounts closing and Receivables turnover ratio.</p><p>In the form&#039;s own words, Receivables turnover ratio = Net credit sales ÷ Average accounts receivables.</p><p>The result panel carries Accounts opening, Accounts closing and Receivables turnover ratio, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Net credit sales</strong> — in USD. Net credit sales is the revenue from goods or services sold on credit on a given day.</li><li><strong>Average accounts receivables</strong> — in USD. Average accounts receivables is the money from previous credit sales that the business has yet receive from customers.</li></ul><p>What you get back is Accounts opening in USD, Accounts closing in USD, Receivables turnover ratio, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Net credit sales = 10 USD, Accounts opening = 100 USD, Accounts closing = 1000 USD and Receivables turnover ratio = 10 gives <strong>Average accounts receivables</strong> = 1 USD.</p><ul><li><strong>Average accounts receivables</strong> = 1 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Receivables turnover ratio</strong> = <code>Net credit sales ÷ Average accounts receivables</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Average accounts receivables</strong> = 1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Accounts opening takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Receivables turnover ratio</strong> = <code>Net credit sales ÷ Average accounts receivables</code></li><li><strong>Average accounts receivables</strong> = <code>Net credit sales ÷ Receivables turnover ratio</code></li><li><strong>Net credit sales</strong> = <code>Average accounts receivables × Receivables turnover ratio</code></li><li><strong>Accounts closing</strong> = <code>− Accounts opening + 2 × Average accounts receivables</code></li><li><strong>Accounts opening</strong> = <code>− Accounts closing + 2 × Average accounts receivables</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Receivables turnover ratio</strong> = <code>Net credit sales ÷ Average accounts receivables</code> — the form to use when Net credit sales and Average accounts receivables are the values you have.</li><li><strong>Average accounts receivables</strong> = <code>Net credit sales ÷ Receivables turnover ratio</code> — the form to use when Net credit sales and Receivables turnover ratio are the values you have.</li><li><strong>Net credit sales</strong> = <code>Average accounts receivables × Receivables turnover ratio</code> — the form to use when Average accounts receivables and Receivables turnover ratio are the values you have.</li><li><strong>Average accounts receivables</strong> = <code>(1 ÷ 2) × Accounts closing + (1 ÷ 2) × Accounts opening</code> — the form to use when Accounts closing and Accounts opening are the values you have.</li><li><strong>Accounts closing</strong> = <code>− Accounts opening + 2 × Average accounts receivables</code> — the form to use when Accounts opening and Average accounts receivables are the values you have.</li><li><strong>Accounts opening</strong> = <code>− Accounts closing + 2 × Average accounts receivables</code> — the form to use when Accounts closing and Average accounts receivables are the values you have.</li></ul><p>Any one of Receivables turnover ratio, Average accounts receivables and Net credit sales can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Net credit sales, from 10 to 20 — and the answers go from <strong>Average accounts receivables</strong> 1 USD to <strong>Average accounts receivables</strong> 2 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Accounts opening, Accounts closing and Receivables turnover ratio are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Net credit sales left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Net credit sales is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Average accounts receivables left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Average accounts receivables is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Net credit sales is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Net credit sales</strong> takes a plain number with no unit attached. Net credit sales is the revenue from goods or services sold on credit on a given day. Change it and Average accounts receivables and Receivables turnover ratio changes with it. Have it to hand before you start: Net credit sales is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Average accounts receivables</strong> takes a plain number with no unit attached. Average accounts receivables is the money from previous credit sales that the business has yet receive from customers. Change it and Net credit sales, Receivables turnover ratio and Accounts closing changes with it. Have it to hand before you start: Average accounts receivables is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Accounts opening</strong> is a plain number. It is worked out from Accounts closing and Average accounts receivables. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Accounts closing</strong> is a plain number. It is worked out from Accounts opening and Average accounts receivables. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Receivables turnover ratio</strong> is a plain number. It is worked out from Net credit sales and Average accounts receivables. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Average accounts receivables</th></tr></thead><tbody><tr><td><strong>Net credit sales</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Accounts opening</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Accounts closing</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Receivables turnover ratio</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Net credit sales sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Accounts opening and Accounts closing barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Net credit sales = 5 USD, Accounts opening = 50 USD, Accounts closing = 500 USD and Receivables turnover ratio = 5, the answer is <strong>Average accounts receivables</strong> = 1 USD.</li><li>With Net credit sales = 30 USD, Accounts opening = 100 USD, Accounts closing = 1000 USD and Receivables turnover ratio = 10, the answer is <strong>Average accounts receivables</strong> = 3 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Accounts opening follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Net credit sales and Average accounts receivables are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Net credit sales and Average accounts receivables and the number you are missing is Accounts opening and Accounts closing.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/future-value">Future value</a>, <a href="/finance/futures-contract">Futures contract Calculator</a> and <a href="/finance/gdp-deflator">GDP deflator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Receivables turnover calculator work out?', 'a' => <<<'TXT'
            Accounts opening, Accounts closing and Receivables turnover ratio, from Net credit sales and Average accounts receivables. The relationship is Receivables turnover ratio = Net credit sales ÷ Average accounts receivables.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Net credit sales (USD), Average accounts receivables (USD). With net credit sales and average accounts receivables in place, Accounts opening can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Receivables turnover ratio, Average accounts receivables, Net credit sales and Accounts closing blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Average accounts receivables = 1 USD. That comes from the page\'s own defaults, entered in Net credit sales; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Accounts opening is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Net credit sales left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Accounts opening keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/future-value', 'name' => 'Future value'],
            ['path' => '/finance/futures-contract', 'name' => 'Futures contract Calculator'],
            ['path' => '/finance/gdp-deflator', 'name' => 'GDP deflator'],
        ],
        'authors' => [],
    ],
];
