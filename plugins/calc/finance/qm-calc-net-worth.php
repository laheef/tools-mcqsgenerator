<?php

/**
 * Net worth
 * /finance/net-worth
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Net worth',
    'meta' => ['title' => 'Net worth Calculator — Formula, Units & Example', 'description' => 'Net worth works out your total asssets and your total liabilities and reports both. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Net worth Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => 'Assets',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'primary_home',
                            'label' => 'Primary home',
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
                            'name' => 'holiday_home',
                            'label' => 'Holiday home',
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
                            'name' => 'other_real_estates',
                            'label' => 'Other real estate',
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
                            'name' => 'shares',
                            'label' => 'Shares and financial investments',
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
                            'name' => 'motor_vehicles',
                            'label' => 'Motor vehicles',
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
                            'name' => 'other_assets',
                            'label' => 'Other assets',
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
                            'name' => 'savings_accounts',
                            'label' => 'Savings accounts',
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
                            'name' => 'checking_accounts',
                            'label' => 'Checking accounts',
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
                            'name' => 'other_investments',
                            'label' => 'Other investments',
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
            'title' => 'Liabilities',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mortgage',
                            'label' => 'Mortgage',
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
                            'name' => 'car_loan',
                            'label' => 'Car loan',
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
                            'name' => 'personal_loan',
                            'label' => 'Personal loan',
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
                            'name' => 'student_loan',
                            'label' => 'Student loan',
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
                            'name' => 'lease_purchase',
                            'label' => 'Lease purchase',
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
                            'name' => 'consumer_loan',
                            'label' => 'Consumer loan',
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
                            'name' => 'credit_card',
                            'label' => 'Credit card debt and bank overdraft',
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
                            'name' => 'other_debt',
                            'label' => 'Other debt',
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
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'assets',
                            'label' => 'Your total asssets',
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
                            'name' => 'liabilities',
                            'label' => 'Your total liabilities',
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
                            'name' => 'net_worth',
                            'label' => 'Your net worth',
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
            'title' => 'Compare with US average net worth',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compare_with',
                            'label' => 'Check by...',
                            'type' => 'select',
                            'options' => ['income' => '1', 'age' => '2', 'education' => '3'],
                            'dataset' => 'comparison',
                            'default' => 'income',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'selection_income',
                            'label' => 'Income',
                            'type' => 'select',
                            'options' => [
                                'up to $25,300' => '6700',
                                '$25,300 to $43,500' => '32300',
                                '$43,501 to $69,500' => '81600',
                                '$69,501 to $111,400' => '168300',
                                '$111,401 to $177,100' => '393600',
                                'Over $177,100' => '1640100',
                            ],
                            'dataset' => 'income',
                            'control' => 'DROPDOWN',
                            'default' => 'up to $25,300',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'selection_age',
                            'label' => 'Age',
                            'type' => 'select',
                            'options' => [
                                'less than 35' => '11100',
                                '35 - 44' => '59800',
                                '45 - 54' => '124200',
                                '55 - 64' => '187300',
                                '65 - 74' => '224100',
                                'older than 74' => '264800',
                            ],
                            'dataset' => 'age',
                            'control' => 'DROPDOWN',
                            'default' => 'less than 35',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'selection_education',
                            'label' => 'Education',
                            'type' => 'select',
                            'options' => ['no high school diploma' => '22800', 'high school diploma' => '67100', 'some college' => '66100', 'college degree' => '292100'],
                            'dataset' => 'education',
                            'default' => 'no high school diploma',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Your personal net worth is {{net_worth.monetaryValue}}.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'selection_income == 6700', 'text' => 'Average net worth of US population with income up to $25,300 is $6,700.&nbsp;'],
                                ['when' => 'selection_income == 32300', 'text' => 'Average net worth of US population with income from $25,300 to $43,500 is $32,300.&nbsp;'],
                                ['when' => 'selection_income == 81600', 'text' => 'Average net worth of US population with income from $43,501 to $69,500 is $81,600.&nbsp;'],
                                ['when' => 'selection_income == 168300', 'text' => 'Average net worth of US population with income from $69,501 to $111,400 is $168,300.&nbsp;'],
                                ['when' => 'selection_income == 393600', 'text' => 'Average net worth of US population with income from $111,401 to $177,100 is $393,600.&nbsp;'],
                                ['when' => 'selection_income == 1640100', 'text' => 'Average net worth of US population with income over $177,100 is $1,640,100.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'selection_education == 22800', 'text' => 'Average net worth of US population with no high school diploma is $22,800.&nbsp;'],
                                ['when' => 'selection_education == 67100', 'text' => 'Average net worth of US population with high school diploma is $67,100.&nbsp;'],
                                ['when' => 'selection_education == 66100', 'text' => 'Average net worth of US population with some college is $66,100.&nbsp;'],
                                ['when' => 'selection_education == 292100', 'text' => 'Average net worth of US population with college degree is $292,100.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'selection_age == 11100', 'text' => 'Average net worth of US population with age less than 35 is $11,100.&nbsp;'],
                                ['when' => 'selection_age == 59800', 'text' => 'Average net worth of US population with age 35 - 44 is $59,800.&nbsp;'],
                                ['when' => 'selection_age == 124200', 'text' => 'Average net worth of US population with age 45 - 54 is $124,200.&nbsp;'],
                                ['when' => 'selection_age == 187300', 'text' => 'Average net worth of US population with age 55 - 64 is $187,300.&nbsp;'],
                                ['when' => 'selection_age == 224100', 'text' => 'Average net worth of US population with age 65 - 74 is $224,100.&nbsp;'],
                                ['when' => 'selection_age == 264800', 'text' => 'Average net worth of US population with age older than 74 is $264,800.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'liabilities = (mortgage + car_loan + personal_loan + student_loan + consumer_loan + credit_card + lease_purchase + other_debt)',
            'results' => [
                'lease_purchase' => '-car_loan - consumer_loan - credit_card + liabilities - mortgage - other_debt - personal_loan - student_loan',
                'consumer_loan' => '-car_loan - credit_card - lease_purchase + liabilities - mortgage - other_debt - personal_loan - student_loan',
                'credit_card' => '-car_loan - consumer_loan - lease_purchase + liabilities - mortgage - other_debt - personal_loan - student_loan',
                'personal_loan' => '-car_loan - consumer_loan - credit_card - lease_purchase + liabilities - mortgage - other_debt - student_loan',
                'liabilities' => 'car_loan + consumer_loan + credit_card + lease_purchase + mortgage + other_debt + personal_loan + student_loan',
                'student_loan' => '-car_loan - consumer_loan - credit_card - lease_purchase + liabilities - mortgage - other_debt - personal_loan',
                'mortgage' => '-car_loan - consumer_loan - credit_card - lease_purchase + liabilities - other_debt - personal_loan - student_loan',
                'car_loan' => '-consumer_loan - credit_card - lease_purchase + liabilities - mortgage - other_debt - personal_loan - student_loan',
                'other_debt' => '-car_loan - consumer_loan - credit_card - lease_purchase + liabilities - mortgage - personal_loan - student_loan',
            ],
        ],
        [
            'title' => 'assets = primary_home + holiday_home + other_real_estates + motor_vehicles + other_assets + shares + savings_accounts + checking_accounts + other_investments',
            'results' => [
                'shares' => 'assets - checking_accounts - holiday_home - motor_vehicles - other_assets - other_investments - other_real_estates - primary_home - savings_accounts',
                'other_assets' => 'assets - checking_accounts - holiday_home - motor_vehicles - other_investments - other_real_estates - primary_home - savings_accounts - shares',
                'other_investments' => 'assets - checking_accounts - holiday_home - motor_vehicles - other_assets - other_real_estates - primary_home - savings_accounts - shares',
                'other_real_estates' => 'assets - checking_accounts - holiday_home - motor_vehicles - other_assets - other_investments - primary_home - savings_accounts - shares',
                'motor_vehicles' => 'assets - checking_accounts - holiday_home - other_assets - other_investments - other_real_estates - primary_home - savings_accounts - shares',
                'holiday_home' => 'assets - checking_accounts - motor_vehicles - other_assets - other_investments - other_real_estates - primary_home - savings_accounts - shares',
                'primary_home' => 'assets - checking_accounts - holiday_home - motor_vehicles - other_assets - other_investments - other_real_estates - savings_accounts - shares',
                'checking_accounts' => 'assets - holiday_home - motor_vehicles - other_assets - other_investments - other_real_estates - primary_home - savings_accounts - shares',
                'savings_accounts' => 'assets - checking_accounts - holiday_home - motor_vehicles - other_assets - other_investments - other_real_estates - primary_home - shares',
                'assets' => 'checking_accounts + holiday_home + motor_vehicles + other_assets + other_investments + other_real_estates + primary_home + savings_accounts + shares',
            ],
        ],
        [
            'title' => 'net_worth = assets - liabilities',
            'results' => ['assets' => 'liabilities + net_worth', 'liabilities' => 'assets - net_worth', 'net_worth' => 'assets - liabilities'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Net worth works out Primary home and Holiday home from Mortgage, Car loan and Personal loan. It is a single relationship that reads primary home out of mortgage, not a table of canned results keyed by them. Units for Primary home default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Net worth calculator works', 'html' => <<<'TXT'
            <p>Net worth answers one question from 8 numbers, and the answer is Primary home, Holiday home and Other real estate.</p><p>In the form&#039;s own words, Your total liabilities = Car loan + Consumer loan + Credit card debt and bank overdraft + Lease purchase + Mortgage + Other debt + Personal loan + Student loan.</p><p>The result panel carries Primary home, Holiday home, Other real estate and Shares and financial investments, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 8 boxes, and nothing else.</p><ul><li><strong>Mortgage</strong> — in USD</li><li><strong>Car loan</strong> — in USD</li><li><strong>Personal loan</strong> — in USD</li><li><strong>Student loan</strong> — in USD</li><li><strong>Lease purchase</strong> — in USD</li><li><strong>Consumer loan</strong> — in USD</li><li><strong>Credit card debt and bank overdraft</strong> — in USD</li><li><strong>Other debt</strong> — in USD</li></ul><p>What you get back is Primary home in USD, Holiday home in USD, Other real estate in USD, Shares and financial investments in USD, Motor vehicles in USD, Other assets in USD, Savings accounts in USD, Checking accounts in USD, Other investments in USD, Your total asssets in USD, Your total liabilities in USD, Your net worth in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Primary home is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Your total liabilities</strong> = <code>Car loan + Consumer loan + Credit card debt and bank overdraft + Lease purchase + Mortgage + Other debt + Personal loan + Student loan</code></li><li><strong>Lease purchase</strong> = <code>− Car loan − Consumer loan − Credit card debt and bank overdraft + Your total liabilities − Mortgage − Other debt − Personal loan − Student loan</code></li><li><strong>Consumer loan</strong> = <code>− Car loan − Credit card debt and bank overdraft − Lease purchase + Your total liabilities − Mortgage − Other debt − Personal loan − Student loan</code></li><li><strong>Credit card debt and bank overdraft</strong> = <code>− Car loan − Consumer loan − Lease purchase + Your total liabilities − Mortgage − Other debt − Personal loan − Student loan</code></li><li><strong>Personal loan</strong> = <code>− Car loan − Consumer loan − Credit card debt and bank overdraft − Lease purchase + Your total liabilities − Mortgage − Other debt − Student loan</code></li><li><strong>Student loan</strong> = <code>− Car loan − Consumer loan − Credit card debt and bank overdraft − Lease purchase + Your total liabilities − Mortgage − Other debt − Personal loan</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Your total liabilities</strong> = <code>Car loan + Consumer loan + Credit card debt and bank overdraft + Lease purchase + Mortgage + Other debt + Personal loan + Student loan</code> — the form to use when Car loan, Consumer loan, Credit card debt and bank overdraft and Lease purchase are the values you have.</li><li><strong>Lease purchase</strong> = <code>− Car loan − Consumer loan − Credit card debt and bank overdraft + Your total liabilities − Mortgage − Other debt − Personal loan − Student loan</code> — the form to use when Car loan, Consumer loan, Credit card debt and bank overdraft and Your total liabilities are the values you have.</li><li><strong>Consumer loan</strong> = <code>− Car loan − Credit card debt and bank overdraft − Lease purchase + Your total liabilities − Mortgage − Other debt − Personal loan − Student loan</code> — the form to use when Car loan, Credit card debt and bank overdraft, Lease purchase and Your total liabilities are the values you have.</li><li><strong>Credit card debt and bank overdraft</strong> = <code>− Car loan − Consumer loan − Lease purchase + Your total liabilities − Mortgage − Other debt − Personal loan − Student loan</code> — the form to use when Car loan, Consumer loan, Lease purchase and Your total liabilities are the values you have.</li><li><strong>Personal loan</strong> = <code>− Car loan − Consumer loan − Credit card debt and bank overdraft − Lease purchase + Your total liabilities − Mortgage − Other debt − Student loan</code> — the form to use when Car loan, Consumer loan, Credit card debt and bank overdraft and Lease purchase are the values you have.</li><li><strong>Student loan</strong> = <code>− Car loan − Consumer loan − Credit card debt and bank overdraft − Lease purchase + Your total liabilities − Mortgage − Other debt − Personal loan</code> — the form to use when Car loan, Consumer loan, Credit card debt and bank overdraft and Lease purchase are the values you have.</li><li><strong>Mortgage</strong> = <code>− Car loan − Consumer loan − Credit card debt and bank overdraft − Lease purchase + Your total liabilities − Other debt − Personal loan − Student loan</code> — the form to use when Car loan, Consumer loan, Credit card debt and bank overdraft and Lease purchase are the values you have.</li><li><strong>Car loan</strong> = <code>− Consumer loan − Credit card debt and bank overdraft − Lease purchase + Your total liabilities − Mortgage − Other debt − Personal loan − Student loan</code> — the form to use when Consumer loan, Credit card debt and bank overdraft, Lease purchase and Your total liabilities are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Your total liabilities, Lease purchase and Consumer loan can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Primary home, Holiday home and Other real estate are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Mortgage left as a guess.</strong> Anything typed into Mortgage is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Car loan left as a guess.</strong> Anything typed into Car loan is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Personal loan left as a guess.</strong> Anything typed into Personal loan is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Mortgage to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Mortgage</strong> takes a plain number with no unit attached. The page reads it when it works out Lease purchase, Consumer loan and Credit card debt and bank overdraft. Have it to hand before you start: Mortgage is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Car loan</strong> takes a plain number with no unit attached. The page reads it when it works out Lease purchase, Consumer loan and Credit card debt and bank overdraft. Have it to hand before you start: Car loan is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Personal loan</strong> takes a plain number with no unit attached. The page reads it when it works out Lease purchase, Consumer loan and Credit card debt and bank overdraft. Have it to hand before you start: Personal loan is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Student loan</strong> takes a plain number with no unit attached. The page reads it when it works out Lease purchase, Consumer loan and Credit card debt and bank overdraft. Have it to hand before you start: Student loan is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Lease purchase</strong> takes a plain number with no unit attached. The page reads it when it works out Consumer loan, Credit card debt and bank overdraft and Personal loan. Have it to hand before you start: Lease purchase is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Consumer loan</strong> takes a plain number with no unit attached. The page reads it when it works out Lease purchase, Credit card debt and bank overdraft and Personal loan. Have it to hand before you start: Consumer loan is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Credit card debt and bank overdraft</strong> takes a plain number with no unit attached. The page reads it when it works out Lease purchase, Consumer loan and Personal loan. Have it to hand before you start: Credit card debt and bank overdraft is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Other debt</strong> takes a plain number with no unit attached. The page reads it when it works out Lease purchase, Consumer loan and Credit card debt and bank overdraft. Have it to hand before you start: Other debt is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Primary home is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Mortgage, Car loan and Personal loan is what you already know and Primary home and Holiday home is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/mpc">Marginal propensity to consume</a>, <a href="/finance/marginal-revenue">Marginal revenue Calculator</a> and <a href="/finance/markdown">Markdown Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Net worth calculator work out?', 'a' => <<<'TXT'
            Primary home, Holiday home, Other real estate and Shares and financial investments, from Car loan, Consumer loan, Credit card debt and bank overdraft and Lease purchase. The relationship is Your total liabilities = Car loan + Consumer loan + Credit card debt and bank overdraft + Lease purchase + Mortgage + Other debt + Personal loan + Student loan.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Mortgage (USD), Car loan (USD), Personal loan (USD), Student loan (USD), Lease purchase (USD). Fill mortgage, car loan and personal loan and leave Primary home empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Your total liabilities, Lease purchase, Consumer loan and Credit card debt and bank overdraft can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Primary home is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Mortgage left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Primary home keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/mpc', 'name' => 'Marginal propensity to consume'],
            ['path' => '/finance/marginal-revenue', 'name' => 'Marginal revenue Calculator'],
            ['path' => '/finance/markdown', 'name' => 'Markdown Calculator'],
        ],
        'authors' => [],
    ],
];
