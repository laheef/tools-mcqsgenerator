<?php

/**
 * A/R days
 * /finance/ar-days
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'A/R days',
    'meta' => ['title' => 'A/R days Calculator: Formula, Steps & Examples', 'description' => 'Enter accounts receivable and net credit sales and get A/R days back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'A/R days Calculator', 'updated' => '2026-06-11'],
    'sections' => [
        [
            'title' => 'A/R days calculator',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'AccountsReceivable',
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
                            'name' => 'TotalCreditSales',
                            'label' => 'Net credit sales',
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
                            'name' => 'NumberOfDays',
                            'label' => 'Number of days in the period',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '365',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ArDays',
                            'label' => 'A/R days',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Average balance calculation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'BeginningAccountsReceivable',
                            'label' => 'Beginning accounts receivable',
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
                            'name' => 'EndingAccountsReceivable',
                            'label' => 'Ending accounts receivable',
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
                            'name' => 'AverageAccountsReceivable',
                            'label' => 'Average accounts receivable',
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
                            'name' => 'TotalCreditSales2',
                            'label' => 'Net credit sales',
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
                            'name' => 'NumberOfDays2',
                            'label' => 'Number of days in the period',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '365',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ArDays2',
                            'label' => 'A/R days',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'ArDays = (AccountsReceivable / TotalCreditSales) * NumberOfDays',
            'results' => ['AccountsReceivable' => 'ArDays*TotalCreditSales/NumberOfDays', 'NumberOfDays' => 'ArDays*TotalCreditSales/AccountsReceivable', 'TotalCreditSales' => 'AccountsReceivable*NumberOfDays/ArDays', 'ArDays' => 'AccountsReceivable*NumberOfDays/TotalCreditSales'],
        ],
        [
            'title' => 'AverageAccountsReceivable = (BeginningAccountsReceivable + EndingAccountsReceivable) / 2',
            'results' => ['BeginningAccountsReceivable' => '2*AverageAccountsReceivable - EndingAccountsReceivable', 'EndingAccountsReceivable' => '2*AverageAccountsReceivable - BeginningAccountsReceivable', 'AverageAccountsReceivable' => '(1/2)*BeginningAccountsReceivable + (1/2)*EndingAccountsReceivable'],
        ],
        [
            'title' => 'ArDays2 = ((BeginningAccountsReceivable + EndingAccountsReceivable) / (2 * TotalCreditSales2)) * NumberOfDays2',
            'results' => [
                'TotalCreditSales2' => '(1/2)*NumberOfDays2*(BeginningAccountsReceivable + EndingAccountsReceivable)/ArDays2',
                'EndingAccountsReceivable' => '2*ArDays2*TotalCreditSales2/NumberOfDays2 - BeginningAccountsReceivable',
                'NumberOfDays2' => '2*ArDays2*TotalCreditSales2/(BeginningAccountsReceivable + EndingAccountsReceivable)',
                'ArDays2' => '(1/2)*NumberOfDays2*(BeginningAccountsReceivable + EndingAccountsReceivable)/TotalCreditSales2',
                'BeginningAccountsReceivable' => '2*ArDays2*TotalCreditSales2/NumberOfDays2 - EndingAccountsReceivable',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A/R days takes Accounts receivable and returns A/R days and Beginning accounts receivable. The arithmetic is the whole method: a/R days is worked out from accounts receivable by one formula, applied once. A/R days comes back in days unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the A/R days calculator works', 'html' => <<<'TXT'
            <p>The A/R days calculator applies one relationship to 3 numbers and reports A/R days, Beginning accounts receivable and Ending accounts receivable.</p><p>Written with the labels from the form, A/R days = Accounts receivable × Number of days in the period ÷ Net credit sales.</p><p>The result panel carries A/R days, Beginning accounts receivable, Ending accounts receivable and Average accounts receivable, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Accounts receivable</strong> — in USD</li><li><strong>Net credit sales</strong> — in USD</li><li><strong>Number of days in the period</strong> — in days</li></ul><p>The result boxes are A/R days in days, Beginning accounts receivable in USD, Ending accounts receivable in USD, Average accounts receivable in USD, Net credit sales in USD, Number of days in the period in days, A/R days in days; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Accounts receivable = 10 USD, Net credit sales = 100 USD, Number of days in the period = 365 days, Beginning accounts receivable = 10 USD, Ending accounts receivable = 100 USD, Average accounts receivable = 1000 USD, Net credit sales = 10 USD, Number of days in the period = 365 days and A/R days = 1000 days; the answers are <strong>A/R days</strong> = 36.5 days.</p><ul><li><strong>A/R days</strong> = 36.5 days</li></ul><p>That is <strong>A/R days</strong> = <code>Accounts receivable × Number of days in the period ÷ Net credit sales</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>A/R days</strong> = 36.5 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: A/R days takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>A/R days</strong> = <code>Accounts receivable × Number of days in the period ÷ Net credit sales</code></li><li><strong>Accounts receivable</strong> = <code>A/R days × Net credit sales ÷ Number of days in the period</code></li><li><strong>Number of days in the period</strong> = <code>A/R days × Net credit sales ÷ Accounts receivable</code></li><li><strong>Net credit sales</strong> = <code>Accounts receivable × Number of days in the period ÷ A/R days</code></li><li><strong>Average accounts receivable</strong> = <code>(1 ÷ 2) × Beginning accounts receivable + (1 ÷ 2) × Ending accounts receivable</code></li><li><strong>Beginning accounts receivable</strong> = <code>2 × Average accounts receivable − Ending accounts receivable</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>A/R days</strong> = <code>Accounts receivable × Number of days in the period ÷ Net credit sales</code> — the form to use when Accounts receivable, Number of days in the period and Net credit sales are the values you have.</li><li><strong>Accounts receivable</strong> = <code>A/R days × Net credit sales ÷ Number of days in the period</code> — the form to use when A/R days, Net credit sales and Number of days in the period are the values you have.</li><li><strong>Number of days in the period</strong> = <code>A/R days × Net credit sales ÷ Accounts receivable</code> — the form to use when A/R days, Net credit sales and Accounts receivable are the values you have.</li><li><strong>Net credit sales</strong> = <code>Accounts receivable × Number of days in the period ÷ A/R days</code> — the form to use when Accounts receivable, Number of days in the period and A/R days are the values you have.</li><li><strong>Average accounts receivable</strong> = <code>(1 ÷ 2) × Beginning accounts receivable + (1 ÷ 2) × Ending accounts receivable</code> — the form to use when Beginning accounts receivable and Ending accounts receivable are the values you have.</li><li><strong>Beginning accounts receivable</strong> = <code>2 × Average accounts receivable − Ending accounts receivable</code> — the form to use when Average accounts receivable and Ending accounts receivable are the values you have.</li><li><strong>Ending accounts receivable</strong> = <code>2 × Average accounts receivable − Beginning accounts receivable</code> — the form to use when Average accounts receivable and Beginning accounts receivable are the values you have.</li><li><strong>A/R days</strong> = <code>(1 ÷ 2) × Number of days in the period × (Beginning accounts receivable + Ending accounts receivable) ÷ Net credit sales</code> — the form to use when Number of days in the period, Beginning accounts receivable, Ending accounts receivable and Net credit sales are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of A/R days, Accounts receivable and Number of days in the period can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Accounts receivable, from 10 to 20 — and the answers go from <strong>A/R days</strong> 36.5 days to <strong>A/R days</strong> 73 days.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with A/R days, Beginning accounts receivable and Ending accounts receivable are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Accounts receivable left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Accounts receivable is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Net credit sales left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Net credit sales is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of days in the period left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of days in the period is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Accounts receivable to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Accounts receivable</strong> takes a plain number with no unit attached. Change it and Number of days in the period, Net credit sales and A/R days changes with it. Have it to hand before you start: Accounts receivable is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Net credit sales</strong> takes a plain number with no unit attached. Change it and Accounts receivable, Number of days in the period and A/R days changes with it. Have it to hand before you start: Net credit sales is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of days in the period</strong> is measured in days. Change it and Accounts receivable, Net credit sales and A/R days changes with it. Have it to hand before you start: Number of days in the period is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 7 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>A/R days</strong> is a plain number and the page's own defaults put it at 36.5. It is worked out from Accounts receivable, Number of days in the period and Net credit sales. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Beginning accounts receivable</strong> is a plain number. It is worked out from Average accounts receivable and Ending accounts receivable. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Ending accounts receivable</strong> is a plain number. It is worked out from Average accounts receivable and Beginning accounts receivable. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Average accounts receivable</strong> is a plain number. It is worked out from Beginning accounts receivable and Ending accounts receivable. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Net credit sales</strong> is a plain number. It is worked out from Number of days in the period, Beginning accounts receivable, Ending accounts receivable and A/R days. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Number of days in the period</strong> is a plain number. It is worked out from A/R days, Net credit sales, Beginning accounts receivable and Ending accounts receivable. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>A/R days</strong> is a plain number. It is worked out from Number of days in the period, Beginning accounts receivable, Ending accounts receivable and Net credit sales. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> A/R days follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Accounts receivable, Net credit sales and Number of days in the period measured, A/R days and Beginning accounts receivable wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/effective-annual-yield">Effective annual yield</a>, <a href="/finance/effective-corporate-tax-rate">Effective corporate tax rate Calculator</a> and <a href="/finance/effective-duration">Effective duration</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the A/R days calculator work out?', 'a' => <<<'TXT'
            A/R days, Beginning accounts receivable, Ending accounts receivable and Average accounts receivable, from Accounts receivable, Number of days in the period and Net credit sales. The relationship is A/R days = Accounts receivable × Number of days in the period ÷ Net credit sales.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Accounts receivable (USD), Net credit sales (USD), Number of days in the period (days). With accounts receivable, net credit sales and number of days in the period in place, A/R days can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. A/R days, Accounts receivable, Number of days in the period and Net credit sales can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'A/R days = 36.5 days. That comes from the page\'s own defaults, entered in Accounts receivable; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            A/R days is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Accounts receivable left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. A/R days keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/effective-annual-yield', 'name' => 'Effective annual yield'],
            ['path' => '/finance/effective-corporate-tax-rate', 'name' => 'Effective corporate tax rate Calculator'],
            ['path' => '/finance/effective-duration', 'name' => 'Effective duration'],
        ],
        'authors' => [],
    ],
];
