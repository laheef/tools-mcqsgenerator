<?php

/**
 * AGI
 * /finance/agi
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'AGI',
    'meta' => ['title' => 'AGI Calculator — Free, With Worked Examples', 'description' => 'AGI works out gross income and total adjustments to income from salary, wages and tips, business / self-employment and interest, dividends, royalties, etc..', 'h1' => 'AGI Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Enter your income and deductions below, and your AGI will appear at the bottom. Use the checkboxes to show additional fields.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Gross income',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wages',
                            'label' => 'Salary, wages and tips',
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
                            'name' => 'business',
                            'label' => 'Business / self-employment',
                            'type' => 'number',
                            'help' => 'All forms of income from active work, including Farm income and loss.',
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
                            'name' => 'interest',
                            'label' => 'Interest, dividends, royalties, etc.',
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
                            'name' => 'capgains',
                            'label' => 'Capital gains and losses',
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
                            'name' => 'annuity',
                            'label' => 'Pension / Annuity / IRA distributions',
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
                            'name' => 'more_income',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show more income sources' => '1', '' => '0'],
                            'dataset' => 'more_incomeDS',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'social',
                            'label' => 'Social security benefits',
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
                            'name' => 'alimony',
                            'label' => 'Spousal support / Alimony received',
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
                            'name' => 'realestate',
                            'label' => 'Real estate/rental income and losses',
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
                            'name' => 'unemploy',
                            'label' => 'Unemployment compensation',
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
                            'name' => 'staterefunds',
                            'label' => 'Taxable state refunds',
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
                            'name' => 'awards',
                            'label' => 'Awards / prizes / winnings',
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
                            'name' => 'jury',
                            'label' => 'Jury duty fees',
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
                            'name' => 'otherincome',
                            'label' => 'Other income',
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
            'title' => 'Deductions',
            'note' => 'Insert positive values; we\'ll subtract them from your income.',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ira',
                            'label' => 'Contributions to retirement / IRAs',
                            'type' => 'number',
                            'help' => 'Except contributions to Roth accounts made with after-tax dollars.',
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
                            'name' => 'studloan',
                            'label' => 'Student loan interest',
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
                            'name' => 'educator',
                            'label' => 'Educator expenses',
                            'type' => 'number',
                            'help' => 'Expenses for classroom supplies.',
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
                            'name' => 'hsa',
                            'label' => 'Healthcare savings account (HSA) contributions',
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
                            'name' => 'healthins',
                            'label' => 'Health insurance premiums',
                            'type' => 'number',
                            'help' => 'For self-employed workers.',
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
                            'name' => 'more_deductions',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show more deductions' => '1', '' => '0'],
                            'dataset' => 'more_deductionsDS',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'retirement',
                            'label' => 'Retirement plan contributions',
                            'type' => 'number',
                            'help' => 'For self-employed workers.',
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
                            'name' => 'selfempltax',
                            'label' => 'Half of self-employment tax',
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
                            'name' => 'schtuition',
                            'label' => 'School tuition',
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
                            'name' => 'alimonypay',
                            'label' => 'Alimony paid',
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
                            'name' => 'moving',
                            'label' => 'Moving expenses',
                            'type' => 'number',
                            'help' => 'For active-duty members of the military moving due to military orders.',
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
                            'name' => 'otherdeduc',
                            'label' => 'Other deductions',
                            'type' => 'number',
                            'help' => 'Business expenses, attorney fees, etc.',
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
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'grossincome',
                            'label' => 'Gross income',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totaldeduction',
                            'label' => 'Total adjustments to income',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'agi',
                            'label' => 'Adjusted gross income',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
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
            'title' => 'grossincome = wages + business + interest + social + alimony + capgains + realestate + unemploy + staterefunds + annuity + awards + jury + otherincome',
            'results' => [
                'realestate' => '-alimony - annuity - awards - business - capgains + grossincome - interest - jury - otherincome - social - staterefunds - unemploy - wages',
                'wages' => '-alimony - annuity - awards - business - capgains + grossincome - interest - jury - otherincome - realestate - social - staterefunds - unemploy',
                'staterefunds' => '-alimony - annuity - awards - business - capgains + grossincome - interest - jury - otherincome - realestate - social - unemploy - wages',
                'business' => '-alimony - annuity - awards - capgains + grossincome - interest - jury - otherincome - realestate - social - staterefunds - unemploy - wages',
                'jury' => '-alimony - annuity - awards - business - capgains + grossincome - interest - otherincome - realestate - social - staterefunds - unemploy - wages',
                'social' => '-alimony - annuity - awards - business - capgains + grossincome - interest - jury - otherincome - realestate - staterefunds - unemploy - wages',
                'grossincome' => 'alimony + annuity + awards + business + capgains + interest + jury + otherincome + realestate + social + staterefunds + unemploy + wages',
                'awards' => '-alimony - annuity - business - capgains + grossincome - interest - jury - otherincome - realestate - social - staterefunds - unemploy - wages',
                'unemploy' => '-alimony - annuity - awards - business - capgains + grossincome - interest - jury - otherincome - realestate - social - staterefunds - wages',
                'otherincome' => '-alimony - annuity - awards - business - capgains + grossincome - interest - jury - realestate - social - staterefunds - unemploy - wages',
                'annuity' => '-alimony - awards - business - capgains + grossincome - interest - jury - otherincome - realestate - social - staterefunds - unemploy - wages',
                'capgains' => '-alimony - annuity - awards - business + grossincome - interest - jury - otherincome - realestate - social - staterefunds - unemploy - wages',
                'alimony' => '-annuity - awards - business - capgains + grossincome - interest - jury - otherincome - realestate - social - staterefunds - unemploy - wages',
                'interest' => '-alimony - annuity - awards - business - capgains + grossincome - jury - otherincome - realestate - social - staterefunds - unemploy - wages',
            ],
        ],
        [
            'title' => 'totaldeduction = educator + studloan + schtuition + ira + selfempltax + hsa + healthins + retirement + alimonypay + moving + otherdeduc',
            'results' => [
                'ira' => '-alimonypay - educator - healthins - hsa - moving - otherdeduc - retirement - schtuition - selfempltax - studloan + totaldeduction',
                'moving' => '-alimonypay - educator - healthins - hsa - ira - otherdeduc - retirement - schtuition - selfempltax - studloan + totaldeduction',
                'otherdeduc' => '-alimonypay - educator - healthins - hsa - ira - moving - retirement - schtuition - selfempltax - studloan + totaldeduction',
                'retirement' => '-alimonypay - educator - healthins - hsa - ira - moving - otherdeduc - schtuition - selfempltax - studloan + totaldeduction',
                'selfempltax' => '-alimonypay - educator - healthins - hsa - ira - moving - otherdeduc - retirement - schtuition - studloan + totaldeduction',
                'schtuition' => '-alimonypay - educator - healthins - hsa - ira - moving - otherdeduc - retirement - selfempltax - studloan + totaldeduction',
                'alimonypay' => '-educator - healthins - hsa - ira - moving - otherdeduc - retirement - schtuition - selfempltax - studloan + totaldeduction',
                'healthins' => '-alimonypay - educator - hsa - ira - moving - otherdeduc - retirement - schtuition - selfempltax - studloan + totaldeduction',
                'hsa' => '-alimonypay - educator - healthins - ira - moving - otherdeduc - retirement - schtuition - selfempltax - studloan + totaldeduction',
                'totaldeduction' => 'alimonypay + educator + healthins + hsa + ira + moving + otherdeduc + retirement + schtuition + selfempltax + studloan',
                'studloan' => '-alimonypay - educator - healthins - hsa - ira - moving - otherdeduc - retirement - schtuition - selfempltax + totaldeduction',
                'educator' => '-alimonypay - healthins - hsa - ira - moving - otherdeduc - retirement - schtuition - selfempltax - studloan + totaldeduction',
            ],
        ],
        [
            'title' => 'agi = grossincome - totaldeduction',
            'results' => ['grossincome' => 'agi + totaldeduction', 'totaldeduction' => '-agi + grossincome', 'agi' => 'grossincome - totaldeduction'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Salary, wages and tips, Business / self-employment and Interest, dividends, royalties, etc into AGI and the answer comes back as Gross income and Total adjustments to income. There is no hidden constant here: change gross income and salary, wages and tips moves with it. The main result, Gross income, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the AGI calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind AGI: it takes 24 numbers and reports Gross income, Total adjustments to income and Adjusted gross income.</p><p>What comes back is Gross income, Total adjustments to income and Adjusted gross income — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 24 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Salary, wages and tips</strong> — in USD</li><li><strong>Business / self-employment</strong> — in USD. All forms of income from active work, including Farm income and loss.</li><li><strong>Interest, dividends, royalties, etc</strong> — in USD</li><li><strong>Capital gains and losses</strong> — in USD</li><li><strong>Pension / Annuity / IRA distributions</strong> — in USD</li><li><strong>Social security benefits</strong> — in USD</li><li><strong>Spousal support / Alimony received</strong> — in USD</li><li><strong>Real estate/rental income and losses</strong> — in USD</li><li><strong>Unemployment compensation</strong> — in USD</li><li><strong>Taxable state refunds</strong> — in USD</li><li><strong>Awards / prizes / winnings</strong> — in USD</li><li><strong>Jury duty fees</strong> — in USD</li><li><strong>Other income</strong> — in USD</li><li><strong>Contributions to retirement / IRAs</strong> — in USD. Except contributions to Roth accounts made with after-tax dollars.</li><li><strong>Student loan interest</strong> — in USD</li><li><strong>Educator expenses</strong> — in USD. Expenses for classroom supplies.</li><li><strong>Healthcare savings account (HSA) contributions</strong> — in USD</li><li><strong>Health insurance premiums</strong> — in USD. For self-employed workers.</li><li><strong>Retirement plan contributions</strong> — in USD. For self-employed workers.</li><li><strong>Half of self-employment tax</strong> — in USD</li><li><strong>School tuition</strong> — in USD</li><li><strong>Alimony paid</strong> — in USD</li><li><strong>Moving expenses</strong> — in USD. For active-duty members of the military moving due to military orders.</li><li><strong>Other deductions</strong> — in USD. Business expenses, attorney fees, etc.</li></ul><p>What you get back is Gross income in USD, Total adjustments to income in USD, Adjusted gross income in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Gross income is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Adjusted gross income</strong> = <code>Gross income − Total adjustments to income</code></li><li><strong>Gross income</strong> = <code>Adjusted gross income + Total adjustments to income</code></li><li><strong>Total adjustments to income</strong> = <code>− Adjusted gross income + Gross income</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Adjusted gross income</strong> = <code>Gross income − Total adjustments to income</code> — the form to use when Gross income and Total adjustments to income are the values you have.</li><li><strong>Gross income</strong> = <code>Adjusted gross income + Total adjustments to income</code> — the form to use when Adjusted gross income and Total adjustments to income are the values you have.</li><li><strong>Total adjustments to income</strong> = <code>− Adjusted gross income + Gross income</code> — the form to use when Adjusted gross income and Gross income are the values you have.</li></ul><p>Any one of Gross income, Real estate/rental income and losses and Salary, wages and tips can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Gross income, Total adjustments to income and Adjusted gross income are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Salary, wages and tips left as a guess.</strong> Anything typed into Salary, wages and tips is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Business / self-employment left as a guess.</strong> Anything typed into Business / self-employment is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Interest, dividends, royalties, etc left as a guess.</strong> Anything typed into Interest, dividends, royalties, etc is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Salary, wages and tips and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Salary, wages and tips, Business / self-employment, Interest, dividends, royalties, etc and Capital gains and losses. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Salary, wages and tips into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Gross income in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Gross income is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Salary, wages and tips, Business / self-employment and Interest, dividends, royalties, etc are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Salary, wages and tips, Business / self-employment and Interest, dividends, royalties, etc measured, Gross income and Total adjustments to income wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/income-tax-pakistan">Income tax - Pakistan</a>, <a href="/finance/income-tax-australia">Income tax Australia Calculator</a> and <a href="/finance/income-tax-philippines">Income tax Philippines Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>Neighbouring pages resolve the parts of the same job that AGI leaves alone. Knowing which is which saves running the wrong one:</p><p>Worth opening next: <a href="/finance/income-tax-pakistan">Income tax - Pakistan</a>, <a href="/finance/income-tax-australia">Income tax Australia Calculator</a> and <a href="/finance/income-tax-philippines">Income tax Philippines Calculator</a>. They follow the same pattern as this page (form, formula, worked example, answer), so a reader who understands one understands the others.</p><p>Using the page that already answers the question you have is better than adapting this one: the formula and the units will match what you expect, and the worked example will be about your case.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from AGI is a number to act on, so the useful question is what to do with Gross income (USD), Total adjustments to income (USD) and Adjusted gross income (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Salary, wages and tips, Business / self-employment, Interest, dividends, royalties, etc and Capital gains and losses alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the AGI calculator work out?', 'a' => <<<'TXT'
            Gross income, Total adjustments to income and Adjusted gross income, from Spousal support / Alimony received, Pension / Annuity / IRA distributions, Awards / prizes / winnings and Business / self-employment.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Salary, wages and tips (USD), Business / self-employment (USD), Interest, dividends, royalties, etc (USD), Capital gains and losses (USD), Pension / Annuity / IRA distributions (USD). Enter salary, wages and tips, business / self-employment and interest, dividends, royalties, etc; Gross income is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Gross income, Real estate/rental income and losses, Salary, wages and tips and Taxable state refunds blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Gross income is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Salary, wages and tips left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Gross income at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/income-tax-pakistan', 'name' => 'Income tax - Pakistan'],
            ['path' => '/finance/income-tax-australia', 'name' => 'Income tax Australia Calculator'],
            ['path' => '/finance/income-tax-philippines', 'name' => 'Income tax Philippines Calculator'],
        ],
        'authors' => [],
    ],
];
