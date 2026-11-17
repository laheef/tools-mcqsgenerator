<?php

/**
 * Zakat
 * /finance/zakat
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Zakat',
    'meta' => ['title' => 'Zakat Calculator: Formula, Steps & Examples', 'description' => 'Zakat turns nisab and rate per tola into your nisab value and your net worth. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Zakat Calculator', 'updated' => '2026-09-02'],
    'sections' => [
        [
            'title' => 'Find nisab in your region',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nisabSelect',
                            'label' => 'Nisab',
                            'type' => 'select',
                            'options' => ['Gold: 7.5 tolas or 87.48 grams ' => '7.5', 'Silver: 52.5 tolas or 612.36 grams' => '52.5', 'Enter custom nisab value' => ''],
                            'default' => 'Gold: 7.5 tolas or 87.48 grams ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tolaRate',
                            'label' => 'Rate per tola',
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
                        ['type' => 'note', 'text' => 'Check the updated rates of gold and silver.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nisabTotal',
                            'label' => 'Your nisab value',
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
                            'name' => 'nisab',
                            'label' => 'Your nisab value',
                            'type' => 'result',
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
            'title' => 'Cash',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bank',
                            'label' => 'Cash in the bank',
                            'type' => 'number',
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
                            'name' => 'hand',
                            'label' => 'Cash in hand',
                            'type' => 'number',
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
                            'name' => 'loansGiven',
                            'label' => 'Loans given out ',
                            'type' => 'number',
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
                            'name' => 'future',
                            'label' => 'Cash for future',
                            'type' => 'number',
                            'help' => 'Cash for future plans like traveling and tours.',
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
                            'name' => 'investments',
                            'label' => 'Investments',
                            'type' => 'number',
                            'help' => 'Investments, savings bonds or certificates, and pensions.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Liabilities',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loansTaken',
                            'label' => 'Loans taken',
                            'type' => 'number',
                            'help' => 'Money borrowed as cash or goods.&nbsp;',
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
                            'name' => 'wages',
                            'label' => 'Wages',
                            'type' => 'number',
                            'help' => 'Wages to pay employees.',
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
                            'name' => 'bills',
                            'label' => 'Payable bills',
                            'type' => 'number',
                            'help' => 'Utility bills, taxes and rents.&nbsp;',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Valuables and tradable goods',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'silver',
                            'label' => 'Silver',
                            'type' => 'number',
                            'help' => 'Current value of the silver you have as an asset.&nbsp;',
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
                            'name' => 'gold',
                            'label' => 'Gold',
                            'type' => 'number',
                            'help' => 'Current value of the gold you have as an asset.&nbsp;',
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
                            'name' => 'stock',
                            'label' => 'Value of stock',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results&nbsp;',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'netWorth',
                            'label' => 'Your net worth',
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
                        ['type' => 'note', 'text' => 'Since your net worth is less than the nisab, you do not qualify to pay Zakat.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'zakat',
                            'label' => 'Zakat payable',
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
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash',
                            'label' => 'Cash: ',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'liabilities',
                            'label' => 'Liabilities',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'valuables',
                            'label' => 'Valuables',
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
            'title' => 'zakat = netWorth*0.025 ',
            'results' => ['zakat' => '(1/40)*netWorth', 'netWorth' => '40*zakat'],
        ],
        [
            'title' => 'netWorth = cash + valuables + stock - liabilities',
            'results' => [
                'stock' => '-cash + liabilities + netWorth - valuables',
                'netWorth' => 'cash - liabilities + stock + valuables',
                'liabilities' => 'cash - netWorth + stock + valuables',
                'valuables' => '-cash + liabilities + netWorth - stock',
                'cash' => 'liabilities + netWorth - stock - valuables',
            ],
        ],
        [
            'title' => 'cash = bank + hand + future + loansGiven + investments',
            'results' => [
                'investments' => '-bank + cash - future - hand - loansGiven',
                'hand' => '-bank + cash - future - investments - loansGiven',
                'loansGiven' => '-bank + cash - future - hand - investments',
                'future' => '-bank + cash - hand - investments - loansGiven',
                'bank' => 'cash - future - hand - investments - loansGiven',
                'cash' => 'bank + future + hand + investments + loansGiven',
            ],
        ],
        [
            'title' => 'liabilities = loansTaken + wages + bills ',
            'results' => ['bills' => 'liabilities - loansTaken - wages', 'loansTaken' => '-bills + liabilities - wages', 'wages' => '-bills + liabilities - loansTaken', 'liabilities' => 'bills + loansTaken + wages'],
        ],
        [
            'title' => 'valuables = gold + silver ',
            'results' => ['valuables' => 'gold + silver', 'gold' => '-silver + valuables', 'silver' => '-gold + valuables'],
        ],
        [
            'title' => 'nisabTotal= nisab * tolaRate',
            'results' => ['tolaRate' => 'nisabTotal/nisab', 'nisab' => 'nisabTotal/tolaRate', 'nisabTotal' => 'nisab*tolaRate'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Nisab, Rate per tola and Cash in the bank into Zakat and the answer comes back as Your nisab value. The arithmetic is the whole method: your nisab value is worked out from nisab by one formula, applied once. Your nisab value comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Zakat calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Zakat: it takes 16 numbers and reports Your nisab value.</p><p>Written with the labels from the form, Zakat payable = (1 ÷ 40) × Your net worth.</p><p>The result panel carries Your nisab value, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 16 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Nisab</strong> — a plain number, no unit</li><li><strong>Rate per tola</strong> — in USD</li><li><strong>Your nisab value</strong> — in USD</li><li><strong>Cash in the bank</strong> — in USD</li><li><strong>Cash in hand</strong> — in USD</li><li><strong>Loans given out</strong> — in USD</li><li><strong>Cash for future</strong> — in USD. Cash for future plans like traveling and tours.</li><li><strong>Investments</strong> — in USD. Investments, savings bonds or certificates, and pensions.</li><li><strong>Loans taken</strong> — in USD. Money borrowed as cash or goods.&amp;nbsp;</li><li><strong>Wages</strong> — in USD. Wages to pay employees.</li><li><strong>Payable bills</strong> — in USD. Utility bills, taxes and rents.&amp;nbsp;</li><li><strong>Silver</strong> — in USD. Current value of the silver you have as an asset.&amp;nbsp;</li><li><strong>Gold</strong> — in USD. Current value of the gold you have as an asset.&amp;nbsp;</li><li><strong>Value of stock</strong> — in USD</li><li><strong>Your net worth</strong> — in USD</li><li><strong>Zakat payable</strong> — in USD</li></ul><p>The result box is Your nisab value in USD. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Your nisab value is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Zakat payable</strong> = <code>(1 ÷ 40) × Your net worth</code></li><li><strong>Your net worth</strong> = <code>40 × Zakat payable</code></li><li><strong>Value of stock</strong> = <code>− Cash: + Liabilities + Your net worth − Valuables</code></li><li><strong>Liabilities</strong> = <code>Cash: − Your net worth + Value of stock + Valuables</code></li><li><strong>Valuables</strong> = <code>− Cash: + Liabilities + Your net worth − Value of stock</code></li><li><strong>Cash</strong> = <code>Liabilities + Your net worth − Value of stock − Valuables</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Zakat payable</strong> = <code>(1 ÷ 40) × Your net worth</code> — the form to use when Your net worth are the values you have.</li><li><strong>Your net worth</strong> = <code>40 × Zakat payable</code> — the form to use when Zakat payable are the values you have.</li><li><strong>Your net worth</strong> = <code>Cash: − Liabilities + Value of stock + Valuables</code> — the form to use when Cash, Liabilities, Value of stock and Valuables are the values you have.</li><li><strong>Value of stock</strong> = <code>− Cash: + Liabilities + Your net worth − Valuables</code> — the form to use when Cash, Liabilities, Your net worth and Valuables are the values you have.</li><li><strong>Liabilities</strong> = <code>Cash: − Your net worth + Value of stock + Valuables</code> — the form to use when Cash, Your net worth, Value of stock and Valuables are the values you have.</li><li><strong>Valuables</strong> = <code>− Cash: + Liabilities + Your net worth − Value of stock</code> — the form to use when Cash, Liabilities, Your net worth and Value of stock are the values you have.</li><li><strong>Cash</strong> = <code>Liabilities + Your net worth − Value of stock − Valuables</code> — the form to use when Liabilities, Your net worth, Value of stock and Valuables are the values you have.</li><li><strong>Cash</strong> = <code>Cash in the bank + Cash for future + Cash in hand + Investments + Loans given out</code> — the form to use when Cash in the bank, Cash for future, Cash in hand and Investments are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Zakat payable, Your net worth and Value of stock can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Your nisab value is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Nisab left as a guess.</strong> Anything typed into Nisab is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Rate per tola left as a guess.</strong> Anything typed into Rate per tola is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Your nisab value left as a guess.</strong> Anything typed into Your nisab value is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Nisab and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Nisab</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Nisab is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Rate per tola</strong> takes a plain number with no unit attached. It feeds Your nisab value and Your nisab value. Have it to hand before you start: Rate per tola is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Your nisab value</strong> takes a plain number with no unit attached. It feeds Rate per tola and Your nisab value. Have it to hand before you start: Your nisab value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Cash in the bank</strong> takes a plain number with no unit attached. It feeds Investments, Cash in hand and Loans given out. Have it to hand before you start: Cash in the bank is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Cash in hand</strong> takes a plain number with no unit attached. It feeds Investments, Loans given out and Cash for future. Have it to hand before you start: Cash in hand is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Loans given out</strong> takes a plain number with no unit attached. It feeds Investments, Cash in hand and Cash for future. Have it to hand before you start: Loans given out is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Cash for future</strong> takes a plain number with no unit attached. Cash for future plans like traveling and tours. It feeds Investments, Cash in hand and Loans given out. Have it to hand before you start: Cash for future is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Investments</strong> takes a plain number with no unit attached. Investments, savings bonds or certificates, and pensions. It feeds Cash in hand, Loans given out and Cash for future. Have it to hand before you start: Investments is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Loans taken</strong> takes a plain number with no unit attached. Money borrowed as cash or goods.&amp;nbsp;. It feeds Payable bills, Wages and Liabilities. Have it to hand before you start: Loans taken is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Wages</strong> takes a plain number with no unit attached. Wages to pay employees. It feeds Payable bills, Loans taken and Liabilities. Have it to hand before you start: Wages is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Payable bills</strong> takes a plain number with no unit attached. Utility bills, taxes and rents.&amp;nbsp;. It feeds Loans taken, Wages and Liabilities. Have it to hand before you start: Payable bills is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Silver</strong> takes a plain number with no unit attached. Current value of the silver you have as an asset.&amp;nbsp;. It feeds Valuables and Gold. Have it to hand before you start: Silver is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Gold</strong> takes a plain number with no unit attached. Current value of the gold you have as an asset.&amp;nbsp;. It feeds Valuables and Silver. Have it to hand before you start: Gold is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Value of stock</strong> takes a plain number with no unit attached. It feeds Your net worth, Liabilities and Valuables. Have it to hand before you start: Value of stock is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Your net worth</strong> takes a plain number with no unit attached. It feeds Zakat payable, Value of stock and Liabilities. Have it to hand before you start: Your net worth is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Zakat payable</strong> takes a plain number with no unit attached. It feeds Your net worth. Have it to hand before you start: Zakat payable is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Your nisab value</strong> is a plain number. It is worked out from Your nisab value and Rate per tola. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Your nisab value is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Nisab, Rate per tola and Your nisab value are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Nisab, Rate per tola and Your nisab value measured, Your nisab value wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/taxable-equivalent-yield">Taxable equivalent yield Calculator</a>, <a href="/finance/taylor-rule">Taylor rule Calculator</a> and <a href="/finance/tds-interest">TDS interest Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Zakat calculator work out?', 'a' => 'Your nisab value, from Your net worth. The relationship is Zakat payable = (1 ÷ 40) × Your net worth.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Nisab, Rate per tola (USD), Your nisab value (USD), Cash in the bank (USD), Cash in hand (USD). Fill nisab, rate per tola and your nisab value and leave Your nisab value empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Zakat payable, Your net worth, Value of stock and Liabilities can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Your nisab value is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Nisab left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Your nisab value keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/taxable-equivalent-yield', 'name' => 'Taxable equivalent yield Calculator'],
            ['path' => '/finance/taylor-rule', 'name' => 'Taylor rule Calculator'],
            ['path' => '/finance/tds-interest', 'name' => 'TDS interest Calculator'],
        ],
        'authors' => [],
    ],
];
