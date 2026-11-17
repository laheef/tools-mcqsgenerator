<?php

/**
 * APR
 * /finance/apr
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'APR',
    'meta' => ['title' => 'APR Calculator — Free, With Worked Examples', 'description' => 'APR works out effective Annual Rate (EAR) from loan amount and interest rate. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'APR Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Input the parameters of your loan to find out the annual percentage rate (APR) using our calculator. You can choose different payment and compounding frequencies, and other eventual fees.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Loan specification',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Loan_amount',
                            'label' => 'Loan amount',
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
                            'name' => 'interestRate',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Periods',
                            'label' => 'Loan term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PaymentFrequency',
                            'label' => 'Payment',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1.000000000000000',
                                'Semi-annually' => '2.000000000000000',
                                'Quarterly' => '4.000000000000000',
                                'Monthly' => '12.000000000000000',
                                'Weekly' => '52.177500000000000',
                                'Bi-weekly' => '26.088750000000000',
                                'Daily' => '365.242000000000000',
                            ],
                            'dataset' => 'Frequency',
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CompFreq',
                            'label' => 'Compounding',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1.000000000000000',
                                'Semi-annually' => '2.000000000000000',
                                'Quarterly' => '4.000000000000000',
                                'Monthly' => '12.000000000000000',
                                'Weekly' => '52.177500000000000',
                                'Bi-weekly' => '26.088750000000000',
                                'Daily' => '365.242000000000000',
                            ],
                            'dataset' => 'Frequency',
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Fee_financial',
                            'label' => 'Fees rolled into loan',
                            'type' => 'number',
                            'help' => 'Fees paid during the term of the loan.',
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
                            'name' => 'Fee_prepaid',
                            'label' => 'Fees paid separately',
                            'type' => 'number',
                            'help' => 'Fees payable up front before or at the time the loan is consummated.',
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
            'title' => 'Main results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'EAR',
                            'label' => 'Effective Annual Rate (EAR)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'APR',
                            'label' => 'Annual Percentage Rate (APR)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'APR_effective',
                            'label' => 'Effective APR',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Additional results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Payment',
                            'label' => 'Installment',
                            'type' => 'number',
                            'help' => 'The amount to be paid for each payment period.',
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
                            'name' => 'Charges_financial',
                            'label' => 'Total finance charge',
                            'type' => 'number',
                            'help' => 'The total amount of money you pay to use the credit, i.e. the total cost of borrowing.',
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
                            'name' => 'Principal',
                            'label' => 'Principal',
                            'type' => 'number',
                            'help' => 'The total amount of money being lent, including fees rolled into the loan.',
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
                            'name' => 'numberOfPmnt',
                            'label' => 'Number of periods',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'APR_guess',
                            'label' => 'Approximate APR',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Interest_total',
                            'label' => 'Total interest payment',
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
                            'name' => 'Financial_fee_total',
                            'label' => 'Total additional fees',
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
                            'name' => 'Payment_total',
                            'label' => 'Total payments',
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
                            'name' => 'Equivalent_rate',
                            'label' => 'Equivalent rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PeriodicEqRate',
                            'label' => 'Periodic equivalent rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'APR_eq',
                            'label' => 'Equivalent APR',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Equivalent_rate = one_way(PaymentFrequency * ((1 + interestRate / CompFreq) ^ (CompFreq / PaymentFrequency) - 1))',
            'results' => ['Equivalent_rate' => '(PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))'],
        ],
        [
            'title' => 'Payment = one_way(((Loan_amount + Fee_financial) * PeriodicEqRate * (1 + PeriodicEqRate) ^ numberOfPmnt) / ((1 + PeriodicEqRate) ^ numberOfPmnt - 1))',
            'results' => ['Payment' => <<<'TXT'
            ((Fee_financial + Loan_amount)*pow(((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency) + 1, (PaymentFrequency*Periods))*((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency)/(pow(((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency) + 1, (PaymentFrequency*Periods)) - 1))
            TXT],
        ],
        [
            'title' => 'PeriodicEqRate = one_way(Equivalent_rate / PaymentFrequency)',
            'results' => ['PeriodicEqRate' => '((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency)'],
        ],
        [
            'title' => 'numberOfPmnt = one_way(PaymentFrequency * Periods)',
            'results' => ['numberOfPmnt' => '(PaymentFrequency*Periods)'],
        ],
        [
            'title' => 'Payment_total = one_way(Payment * numberOfPmnt + Fee_prepaid)',
            'results' => ['Payment_total' => <<<'TXT'
            (Fee_prepaid + (PaymentFrequency*Periods)*((Fee_financial + Loan_amount)*pow(((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency) + 1, (PaymentFrequency*Periods))*((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency)/(pow(((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency) + 1, (PaymentFrequency*Periods)) - 1)))
            TXT],
        ],
        [
            'title' => 'Charges_financial = one_way(Payment_total - Loan_amount)',
            'results' => ['Charges_financial' => <<<'TXT'
            (-Loan_amount + (Fee_prepaid + (PaymentFrequency*Periods)*((Fee_financial + Loan_amount)*pow(((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency) + 1, (PaymentFrequency*Periods))*((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency)/(pow(((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency) + 1, (PaymentFrequency*Periods)) - 1))))
            TXT],
        ],
        [
            'title' => 'Interest_total = one_way(Payment_total - Loan_amount - Fee_financial - Fee_prepaid)',
            'results' => ['Interest_total' => <<<'TXT'
            (-Fee_financial - Fee_prepaid - Loan_amount + (Fee_prepaid + (PaymentFrequency*Periods)*((Fee_financial + Loan_amount)*pow(((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency) + 1, (PaymentFrequency*Periods))*((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency)/(pow(((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency) + 1, (PaymentFrequency*Periods)) - 1))))
            TXT],
        ],
        [
            'title' => 'EAR = one_way((1 + interestRate / CompFreq) ^ CompFreq - 1)',
            'results' => ['EAR' => '(pow((CompFreq + interestRate)/CompFreq, CompFreq) - 1)'],
        ],
        [
            'title' => 'Financial_fee_total = one_way(Fee_financial + Fee_prepaid)',
            'results' => ['Financial_fee_total' => '(Fee_financial + Fee_prepaid)'],
        ],
        [
            'title' => 'APR_guess = one_way((2 * PaymentFrequency * Charges_financial) / (Loan_amount * (numberOfPmnt + 1)))',
            'results' => ['APR_guess' => <<<'TXT'
            (2*PaymentFrequency*(-Loan_amount + (Fee_prepaid + (PaymentFrequency*Periods)*((Fee_financial + Loan_amount)*pow(((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency) + 1, (PaymentFrequency*Periods))*((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency)/(pow(((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency) + 1, (PaymentFrequency*Periods)) - 1))))/(Loan_amount*((PaymentFrequency*Periods) + 1)))
            TXT],
        ],
        [
            'title' => 'Principal = one_way(Loan_amount + Fee_financial)',
            'results' => ['Principal' => '(Fee_financial + Loan_amount)'],
        ],
        [
            'title' => 'APR = getAPR(CompFreq, PaymentFrequency, APR_eq)',
            'results' => ['APR' => <<<'TXT'
            getAPR(CompFreq, PaymentFrequency, getAPR_eq(((Fee_financial + Loan_amount)*pow(((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency) + 1, (PaymentFrequency*Periods))*((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency)/(pow(((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency) + 1, (PaymentFrequency*Periods)) - 1)), PaymentFrequency, (PaymentFrequency*Periods), Loan_amount, Fee_prepaid))
            TXT],
        ],
        [
            'title' => 'APR_effective = getAPR_effective(CompFreq, APR)',
            'results' => ['APR_effective' => <<<'TXT'
            getAPR_effective(CompFreq, getAPR(CompFreq, PaymentFrequency, getAPR_eq(((Fee_financial + Loan_amount)*pow(((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency) + 1, (PaymentFrequency*Periods))*((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency)/(pow(((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency) + 1, (PaymentFrequency*Periods)) - 1)), PaymentFrequency, (PaymentFrequency*Periods), Loan_amount, Fee_prepaid)))
            TXT],
        ],
        [
            'title' => 'APR_eq = getAPR_eq(Payment, PaymentFrequency, numberOfPmnt , Loan_amount , Fee_prepaid)',
            'results' => ['APR_eq' => <<<'TXT'
            getAPR_eq(((Fee_financial + Loan_amount)*pow(((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency) + 1, (PaymentFrequency*Periods))*((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency)/(pow(((PaymentFrequency*(pow((CompFreq + interestRate)/CompFreq, CompFreq/PaymentFrequency) - 1))/PaymentFrequency) + 1, (PaymentFrequency*Periods)) - 1)), PaymentFrequency, (PaymentFrequency*Periods), Loan_amount, Fee_prepaid)
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var MAX_ITERATIONS=128;var MIN_PRECISION=1e-7;omni.define("getAPR",function(CompFreq,PaymentFrequency,APR_eq){var APR=CompFreq*(Math.pow((PaymentFrequency+APR_eq)/PaymentFrequency,PaymentFrequency/CompFreq)-1);return APR});omni.define("getAPR_effective",function(CompFreq,APR){var APR_effective=Math.pow(1+APR/CompFreq,CompFreq)-1;return APR_effective});omni.define("getAPR_eq",function(Payment,paymentFrequency,numberOfPmnt,Loan_amount,Fee_prepaid){var APR_eq=getAPR_eq(Payment,paymentFrequency,numberOfPmnt,Loan_amount,Fee_prepaid);return APR_eq*paymentFrequency;function getAPR_eq(Payment,paymentFrequency,numberOfPmnt,Loan_amount,Fee_prepaid){var guess=Payment/Loan_amount*paymentFrequency;var oldI;var newI=guess;var iteration=0;do{oldI=newI;var dividend=Payment-Payment*Math.pow(1+newI,-numberOfPmnt)-newI*(Loan_amount-Fee_prepaid);var divisor=Payment*numberOfPmnt*Math.pow(1+newI,-numberOfPmnt-1)-(Loan_amount-Fee_prepaid);newI=newI-dividend/divisor;++iteration}while(Math.abs(oldI-newI)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);return newI}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        APR works out Effective Annual Rate (EAR) and Annual Percentage Rate (APR) from Interest rate, Payment and Compounding. The arithmetic is the whole method: effective Annual Rate (EAR) is worked out from interest rate by one formula, applied once. Effective Annual Rate (EAR) comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the APR calculator works', 'html' => <<<'TXT'
            <p>The APR calculator applies one relationship to 3 numbers and reports Effective Annual Rate (EAR), Annual Percentage Rate (APR) and Effective APR.</p><p>In the form&#039;s own words, Equivalent rate = (Payment × (((Compounding + Interest rate) ÷ Compounding)^(Compounding ÷ Payment) − 1)).</p><p>The result panel carries Effective Annual Rate (EAR), Annual Percentage Rate (APR), Effective APR and Installment, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Interest rate</strong> — in percent</li><li><strong>Payment</strong> — a plain number, no unit</li><li><strong>Compounding</strong> — a plain number, no unit</li></ul><p>What you get back is Effective Annual Rate (EAR) in percent, Annual Percentage Rate (APR) in percent, Effective APR in percent, Installment in USD, Total finance charge in USD, Principal in USD, Number of periods, Approximate APR in percent, Total interest payment in USD, Total additional fees in USD, Total payments in USD, Equivalent rate in percent, Periodic equivalent rate in percent, Equivalent APR in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Loan amount = 3 USD, Interest rate = 4 perc, Loan term = 5 yrsmos, Payment = 12, Compounding = 12, Fees rolled into loan = 6 USD and Fees paid separately = 7 USD — through the same formula and the panel reports <strong>Equivalent rate</strong> = 4 perc, <strong>Installment</strong> = 3 USD, <strong>Periodic equivalent rate</strong> = 0.3333 perc, <strong>Number of periods</strong> = 60, <strong>Total payments</strong> = 187 USD, <strong>Total finance charge</strong> = 184 USD, <strong>Total interest payment</strong> = 171 USD, <strong>Effective Annual Rate (EAR)</strong> = 30.57 perc, <strong>Total additional fees</strong> = 13 USD, <strong>Approximate APR</strong> = 24.13 perc and <strong>Principal</strong> = 9 USD.</p><ul><li><strong>Equivalent rate</strong> = 4 perc</li><li><strong>Installment</strong> = 3 USD</li><li><strong>Periodic equivalent rate</strong> = 0.3333 perc</li><li><strong>Number of periods</strong> = 60</li><li><strong>Total payments</strong> = 187 USD</li><li><strong>Total finance charge</strong> = 184 USD</li><li><strong>Total interest payment</strong> = 171 USD</li><li><strong>Effective Annual Rate (EAR)</strong> = 30.57 perc</li><li><strong>Total additional fees</strong> = 13 USD</li><li><strong>Approximate APR</strong> = 24.13 perc</li><li><strong>Principal</strong> = 9 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Equivalent rate</strong> = <code>(Payment × (((Compounding + Interest rate) ÷ Compounding)^(Compounding ÷ Payment) − 1))</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Equivalent rate</strong> = 4, <strong>Installment</strong> = 3, <strong>Periodic equivalent rate</strong> = 0.3333, <strong>Number of periods</strong> = 60, <strong>Total payments</strong> = 187, <strong>Total finance charge</strong> = 184, <strong>Total interest payment</strong> = 171, <strong>Effective Annual Rate (EAR)</strong> = 30.57, <strong>Total additional fees</strong> = 13, <strong>Approximate APR</strong> = 24.13 and <strong>Principal</strong> = 9. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Effective Annual Rate (EAR) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Equivalent rate</strong> = <code>(Payment × (((Compounding + Interest rate) ÷ Compounding)^(Compounding ÷ Payment) − 1))</code></li><li><strong>Periodic equivalent rate</strong> = <code>((Payment × (((Compounding + Interest rate) ÷ Compounding)^(Compounding ÷ Payment) − 1)) ÷ Payment)</code></li><li><strong>Number of periods</strong> = <code>(Payment × Loan term)</code></li><li><strong>Effective Annual Rate (EAR)</strong> = <code>(((Compounding + Interest rate) ÷ Compounding)^(Compounding) − 1)</code></li><li><strong>Total additional fees</strong> = <code>(Fees rolled into loan + Fees paid separately)</code></li><li><strong>Principal</strong> = <code>(Fees rolled into loan + Loan amount)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Equivalent rate</strong> = <code>(Payment × (((Compounding + Interest rate) ÷ Compounding)^(Compounding ÷ Payment) − 1))</code> — the form to use when Payment, Compounding and Interest rate are the values you have.</li><li><strong>Periodic equivalent rate</strong> = <code>((Payment × (((Compounding + Interest rate) ÷ Compounding)^(Compounding ÷ Payment) − 1)) ÷ Payment)</code> — the form to use when Payment, Compounding and Interest rate are the values you have.</li><li><strong>Number of periods</strong> = <code>(Payment × Loan term)</code> — the form to use when Payment and Loan term are the values you have.</li><li><strong>Effective Annual Rate (EAR)</strong> = <code>(((Compounding + Interest rate) ÷ Compounding)^(Compounding) − 1)</code> — the form to use when Compounding and Interest rate are the values you have.</li><li><strong>Total additional fees</strong> = <code>(Fees rolled into loan + Fees paid separately)</code> — the form to use when Fees rolled into loan and Fees paid separately are the values you have.</li><li><strong>Principal</strong> = <code>(Fees rolled into loan + Loan amount)</code> — the form to use when Fees rolled into loan and Loan amount are the values you have.</li></ul><p>Any one of Equivalent rate, Installment and Periodic equivalent rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Loan amount, from 3 to 6 — and the answers go from <strong>Equivalent rate</strong> 4 perc, <strong>Installment</strong> 3 USD, <strong>Periodic equivalent rate</strong> 0.3333 perc, <strong>Number of periods</strong> 60, <strong>Total payments</strong> 187 USD, <strong>Total finance charge</strong> 184 USD, <strong>Total interest payment</strong> 171 USD, <strong>Effective Annual Rate (EAR)</strong> 30.57 perc, <strong>Total additional fees</strong> 13 USD, <strong>Approximate APR</strong> 24.13 perc and <strong>Principal</strong> 9 USD to <strong>Equivalent rate</strong> 4 perc, <strong>Installment</strong> 4 USD, <strong>Periodic equivalent rate</strong> 0.3333 perc, <strong>Number of periods</strong> 60, <strong>Total payments</strong> 247 USD, <strong>Total finance charge</strong> 241 USD, <strong>Total interest payment</strong> 228 USD, <strong>Effective Annual Rate (EAR)</strong> 30.57 perc, <strong>Total additional fees</strong> 13 USD, <strong>Approximate APR</strong> 15.8 perc and <strong>Principal</strong> 12 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Interest rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Effective Annual Rate (EAR), Annual Percentage Rate (APR) and Effective APR are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Interest rate left as a guess.</strong> Anything typed into Interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Payment left as a guess.</strong> Anything typed into Payment is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Interest rate is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Equivalent rate, Installment and Periodic equivalent rate changes with it. Have it to hand before you start: Interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Payment</strong> takes a plain number with no unit attached. Change it and Equivalent rate, Installment and Periodic equivalent rate changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Compounding</strong> takes a plain number with no unit attached. Change it and Equivalent rate, Installment and Periodic equivalent rate changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Compounding is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Interest rate, Payment and Compounding. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Interest rate into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Effective Annual Rate (EAR) in perc with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Effective Annual Rate (EAR) is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Interest rate, Payment and Compounding are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Interest rate, Payment and Compounding measured, Effective Annual Rate (EAR) and Annual Percentage Rate (APR) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/lifo-for-inventories">LIFO for inventories Calculator</a>, <a href="/finance/liquid-net-worth">Liquid net worth Calculator</a> and <a href="/finance/lcr">Liquidity coverage ratio (LCR)</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the APR calculator work out?', 'a' => <<<'TXT'
            Effective Annual Rate (EAR), Annual Percentage Rate (APR), Effective APR and Installment, from Payment, Compounding and Interest rate. The relationship is Equivalent rate = (Payment × (((Compounding + Interest rate) ÷ Compounding)^(Compounding ÷ Payment) − 1)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Interest rate (percent), Payment, Compounding. With interest rate, payment and compounding in place, Effective Annual Rate (EAR) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Equivalent rate, Installment, Periodic equivalent rate and Number of periods blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Equivalent rate = 4 perc, Installment = 3 USD, Periodic equivalent rate = 0.3333 perc, Number of periods = 60, Total payments = 187 USD, Total finance charge = 184 USD, Total interest payment = 171 USD, Effective Annual Rate (EAR) = 30.57 perc, Total additional fees = 13 USD, Approximate APR = 24.13 perc and Principal = 9 USD. That comes from the page's own defaults, entered in Interest rate; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Effective Annual Rate (EAR) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Interest rate left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Effective Annual Rate (EAR) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/lifo-for-inventories', 'name' => 'LIFO for inventories Calculator'],
            ['path' => '/finance/liquid-net-worth', 'name' => 'Liquid net worth Calculator'],
            ['path' => '/finance/lcr', 'name' => 'Liquidity coverage ratio (LCR)'],
        ],
        'authors' => [],
    ],
];
