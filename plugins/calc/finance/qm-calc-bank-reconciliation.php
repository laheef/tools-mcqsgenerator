<?php

/**
 * Bank reconciliation
 * /finance/bank-reconciliation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bank reconciliation',
    'meta' => ['title' => 'Bank reconciliation: Formula, Steps & Results', 'description' => 'Bank reconciliation takes cash book balance, automatic bank payments and bank charges and returns adjusted ending balance and unreconciled difference.', 'h1' => 'Bank reconciliation Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => 'Adjustments to cashbook',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cashBookBalance',
                            'label' => 'Cash book balance',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.01'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'automaticBankPayments',
                            'label' => 'Automatic bank payments',
                            'type' => 'number',
                            'help' => 'Routine payments made through the bank.',
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
                            'name' => 'bankCharges',
                            'label' => 'Bank charges',
                            'type' => 'number',
                            'help' => 'Fees charged for transactions processed by the bank.',
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
                            'name' => 'nSFCheques',
                            'label' => 'NSF cheques',
                            'type' => 'number',
                            'help' => 'Bad or dishonored cheques.',
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
                            'name' => 'interestEarned',
                            'label' => 'Interest earned',
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
                            'name' => 'receivable',
                            'label' => 'Receivable',
                            'type' => 'number',
                            'help' => 'Monies owed to the company that has been paid directly to the bank.',
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
                            'name' => 'cbAdjustedEndingBalance',
                            'label' => 'Adjusted ending balance',
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
            'title' => 'Adjustments to bank statements',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bankBalance',
                            'label' => 'Bank balance',
                            'type' => 'number',
                            'help' => 'Balance on statement.',
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
                            'name' => 'depositInTransit',
                            'label' => 'Deposit in transit',
                            'type' => 'number',
                            'help' => 'Money received but not yet recorded on the bank statement.',
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
                            'name' => 'outstandingCheques',
                            'label' => 'Unpresented cheques',
                            'type' => 'number',
                            'help' => 'Cheques issued to persons/businesses but which have not been cashed by the recipients.',
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
                            'name' => 'adjustedEndingBalanceBank',
                            'label' => 'Adjusted ending balance',
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
                        ['type' => 'note', 'text' => 'When your bank reconciliation is complete, your unreconciled difference must be 0.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'unreconciledDifference',
                            'label' => 'Unreconciled difference',
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
            'title' => 'cbAdjustedEndingBalance = cashBookBalance + receivable - automaticBankPayments - bankCharges - nSFCheques + interestEarned',
            'results' => [
                'cashBookBalance' => 'automaticBankPayments + bankCharges + cbAdjustedEndingBalance - interestEarned + nSFCheques - receivable',
                'bankCharges' => '-automaticBankPayments + cashBookBalance - cbAdjustedEndingBalance + interestEarned - nSFCheques + receivable',
                'cbAdjustedEndingBalance' => '-automaticBankPayments - bankCharges + cashBookBalance + interestEarned - nSFCheques + receivable',
                'nSFCheques' => '-automaticBankPayments - bankCharges + cashBookBalance - cbAdjustedEndingBalance + interestEarned + receivable',
                'interestEarned' => 'automaticBankPayments + bankCharges - cashBookBalance + cbAdjustedEndingBalance + nSFCheques - receivable',
                'receivable' => 'automaticBankPayments + bankCharges - cashBookBalance + cbAdjustedEndingBalance - interestEarned + nSFCheques',
                'automaticBankPayments' => '-bankCharges + cashBookBalance - cbAdjustedEndingBalance + interestEarned - nSFCheques + receivable',
            ],
        ],
        [
            'title' => 'adjustedEndingBalanceBank = bankBalance + depositInTransit - outstandingCheques',
            'results' => ['adjustedEndingBalanceBank' => 'bankBalance + depositInTransit - outstandingCheques', 'outstandingCheques' => '-adjustedEndingBalanceBank + bankBalance + depositInTransit', 'bankBalance' => 'adjustedEndingBalanceBank - depositInTransit + outstandingCheques', 'depositInTransit' => 'adjustedEndingBalanceBank - bankBalance + outstandingCheques'],
        ],
        [
            'title' => 'unreconciledDifference = abs(adjustedEndingBalanceBank - cbAdjustedEndingBalance)',
            'results' => ['unreconciledDifference' => 'abs(adjustedEndingBalanceBank - cbAdjustedEndingBalance)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Bank reconciliation takes Cash book balance, Automatic bank payments and Bank charges and returns Adjusted ending balance and Bank balance. There is no hidden constant here: change adjusted ending balance and cash book balance moves with it. The main result, Adjusted ending balance, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Bank reconciliation calculator works', 'html' => <<<'TXT'
            <p>Bank reconciliation answers one question from 6 numbers, and the answer is Adjusted ending balance, Bank balance and Deposit in transit.</p><p>In the form&#039;s own words, Adjusted ending balance = − Automatic bank payments − Bank charges + Cash book balance + Interest earned − NSF cheques + Receivable.</p><p>What comes back is Adjusted ending balance, Bank balance, Deposit in transit and Unpresented cheques — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs.</p><ul><li><strong>Cash book balance</strong> — in USD</li><li><strong>Automatic bank payments</strong> — in USD. Routine payments made through the bank.</li><li><strong>Bank charges</strong> — in USD. Fees charged for transactions processed by the bank.</li><li><strong>NSF cheques</strong> — in USD. Bad or dishonored cheques.</li><li><strong>Interest earned</strong> — in USD</li><li><strong>Receivable</strong> — in USD. Monies owed to the company that has been paid directly to the bank.</li></ul><p>The answers come back as Adjusted ending balance in USD, Bank balance in USD, Deposit in transit in USD, Unpresented cheques in USD, Adjusted ending balance in USD, Unreconciled difference in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Cash book balance = 10 USD, Automatic bank payments = 100 USD, Bank charges = 1000 USD, NSF cheques = 10 USD, Interest earned = 100 USD, Receivable = 1000 USD, Bank balance = 10 USD, Deposit in transit = 100 USD, Unpresented cheques = 1000 USD, Adjusted ending balance = 10 USD and Unreconciled difference = 100 USD; the answers are <strong>Adjusted ending balance</strong> = 0 USD.</p><ul><li><strong>Adjusted ending balance</strong> = 0 USD</li></ul><p>The line behind those figures is <strong>Adjusted ending balance</strong> = <code>− Automatic bank payments − Bank charges + Cash book balance + Interest earned − NSF cheques + Receivable</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Adjusted ending balance</strong> = 0 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Adjusted ending balance takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Adjusted ending balance</strong> = <code>− Automatic bank payments − Bank charges + Cash book balance + Interest earned − NSF cheques + Receivable</code></li><li><strong>Cash book balance</strong> = <code>Automatic bank payments + Bank charges + Adjusted ending balance − Interest earned + NSF cheques − Receivable</code></li><li><strong>Bank charges</strong> = <code>− Automatic bank payments + Cash book balance − Adjusted ending balance + Interest earned − NSF cheques + Receivable</code></li><li><strong>NSF cheques</strong> = <code>− Automatic bank payments − Bank charges + Cash book balance − Adjusted ending balance + Interest earned + Receivable</code></li><li><strong>Interest earned</strong> = <code>Automatic bank payments + Bank charges − Cash book balance + Adjusted ending balance + NSF cheques − Receivable</code></li><li><strong>Receivable</strong> = <code>Automatic bank payments + Bank charges − Cash book balance + Adjusted ending balance − Interest earned + NSF cheques</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Adjusted ending balance</strong> = <code>− Automatic bank payments − Bank charges + Cash book balance + Interest earned − NSF cheques + Receivable</code> — the form to use when Automatic bank payments, Bank charges, Cash book balance and Interest earned are the values you have.</li><li><strong>Cash book balance</strong> = <code>Automatic bank payments + Bank charges + Adjusted ending balance − Interest earned + NSF cheques − Receivable</code> — the form to use when Automatic bank payments, Bank charges, Adjusted ending balance and Interest earned are the values you have.</li><li><strong>Bank charges</strong> = <code>− Automatic bank payments + Cash book balance − Adjusted ending balance + Interest earned − NSF cheques + Receivable</code> — the form to use when Automatic bank payments, Cash book balance, Adjusted ending balance and Interest earned are the values you have.</li><li><strong>NSF cheques</strong> = <code>− Automatic bank payments − Bank charges + Cash book balance − Adjusted ending balance + Interest earned + Receivable</code> — the form to use when Automatic bank payments, Bank charges, Cash book balance and Adjusted ending balance are the values you have.</li><li><strong>Interest earned</strong> = <code>Automatic bank payments + Bank charges − Cash book balance + Adjusted ending balance + NSF cheques − Receivable</code> — the form to use when Automatic bank payments, Bank charges, Cash book balance and Adjusted ending balance are the values you have.</li><li><strong>Receivable</strong> = <code>Automatic bank payments + Bank charges − Cash book balance + Adjusted ending balance − Interest earned + NSF cheques</code> — the form to use when Automatic bank payments, Bank charges, Cash book balance and Adjusted ending balance are the values you have.</li><li><strong>Automatic bank payments</strong> = <code>− Bank charges + Cash book balance − Adjusted ending balance + Interest earned − NSF cheques + Receivable</code> — the form to use when Bank charges, Cash book balance, Adjusted ending balance and Interest earned are the values you have.</li><li><strong>Adjusted ending balance</strong> = <code>Bank balance + Deposit in transit − Unpresented cheques</code> — the form to use when Bank balance, Deposit in transit and Unpresented cheques are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Adjusted ending balance, Cash book balance and Bank charges can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Cash book balance from 10 to 20, leaving every other box alone. The panel moves from <strong>Adjusted ending balance</strong> 0 USD to <strong>Adjusted ending balance</strong> 10 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Adjusted ending balance, Bank balance and Deposit in transit are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Cash book balance left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cash book balance is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Automatic bank payments left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Automatic bank payments is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Bank charges left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Bank charges is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Cash book balance to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Cash book balance</strong> takes a plain number with no unit attached. Change it and Bank charges, Adjusted ending balance and NSF cheques changes with it. Have it to hand before you start: Cash book balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Automatic bank payments</strong> takes a plain number with no unit attached. Routine payments made through the bank. Change it and Cash book balance, Bank charges and Adjusted ending balance changes with it. Have it to hand before you start: Automatic bank payments is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Bank charges</strong> takes a plain number with no unit attached. Fees charged for transactions processed by the bank. Change it and Cash book balance, Adjusted ending balance and NSF cheques changes with it. Have it to hand before you start: Bank charges is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>NSF cheques</strong> takes a plain number with no unit attached. Bad or dishonored cheques. Change it and Cash book balance, Bank charges and Adjusted ending balance changes with it. Have it to hand before you start: NSF cheques is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest earned</strong> takes a plain number with no unit attached. Change it and Cash book balance, Bank charges and Adjusted ending balance changes with it. Have it to hand before you start: Interest earned is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Receivable</strong> takes a plain number with no unit attached. Monies owed to the company that has been paid directly to the bank. Change it and Cash book balance, Bank charges and Adjusted ending balance changes with it. Have it to hand before you start: Receivable is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Adjusted ending balance follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Cash book balance, Automatic bank payments and Bank charges measured, Adjusted ending balance and Bank balance wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/double-discount">Double discount Calculator</a>, <a href="/finance/down-payment">Down payment</a> and <a href="/finance/dream-come-true">Dream come true Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bank reconciliation calculator work out?', 'a' => <<<'TXT'
            Adjusted ending balance, Bank balance, Deposit in transit and Unpresented cheques, from Automatic bank payments, Bank charges, Cash book balance and Interest earned. The relationship is Adjusted ending balance = − Automatic bank payments − Bank charges + Cash book balance + Interest earned − NSF cheques + Receivable.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cash book balance (USD), Automatic bank payments (USD), Bank charges (USD), NSF cheques (USD), Interest earned (USD). With cash book balance, automatic bank payments and bank charges in place, Adjusted ending balance can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Adjusted ending balance, Cash book balance, Bank charges and NSF cheques can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Adjusted ending balance = 0 USD. That comes from the page\'s own defaults, entered in Cash book balance; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Adjusted ending balance is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Cash book balance left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Adjusted ending balance keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/double-discount', 'name' => 'Double discount Calculator'],
            ['path' => '/finance/down-payment', 'name' => 'Down payment'],
            ['path' => '/finance/dream-come-true', 'name' => 'Dream come true Calculator'],
        ],
        'authors' => [],
    ],
];
