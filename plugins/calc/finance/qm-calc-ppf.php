<?php

/**
 * PPF (India)
 * /finance/ppf
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'PPF (India)',
    'meta' => ['title' => 'PPF (India) Calculator — Formula, Units & Example', 'description' => 'PPF (India) works out inflation final and final balance final and reports both. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'PPF (India) Calculator', 'updated' => '2025-04-22'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Subject',
                            'label' => 'I\'d like to know the...',
                            'type' => 'select',
                            'options' => ['final balance' => '2', 'deposit payment' => '3'],
                            'dataset' => 'formula',
                            'default' => 'final balance',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'PPF inputs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PerPay',
                            'label' => 'Deposit payment',
                            'type' => 'number',
                            'prefix' => 'Rs.',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '500',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PayFreq',
                            'label' => 'Deposit frequency',
                            'type' => 'select',
                            'options' => ['Yearly' => '1', 'Semi-annually' => '2', 'Quarterly' => '4', 'Monthly' => '12'],
                            'dataset' => 'payfreq',
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FinalBalance',
                            'label' => 'Your goal',
                            'type' => 'number',
                            'prefix' => 'Rs.',
                            'help' => 'In today\'s purchasing power.',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '100000',
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
                            'help' => 'Annual nominal interest rate.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7.1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tenure',
                            'label' => 'Tenure',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'StartDate', 'label' => 'Start date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inflation',
                            'label' => 'Inflation rate',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The annual rate of inflation. Note, that you can set a negative value if you expect a fall in the general price level during the set interval, representing deflationary pressures.
                            TXT,
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'inflation == 0', 'text' => 'Your initial investment will become ${{tableBalance.formattedValue}} at the end of the term.'],
                                ['when' => 'inflation != 0 ', 'text' => <<<'TXT'
                                Your initial investment will become {{global.currencySymbol}}{{tableBalance.formattedValue}} at the end of the term, which will have the purchasing power of {{global.currencySymbol}}{{inflationFinal.formattedValue}} after adjusting for inflation.
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'You can deposit ${{inflationDeposit.formattedValue}} at the beginning of each month to reach the final balance.'],
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
                            'name' => 'FlowType',
                            'label' => 'Flow type',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InDep',
                            'label' => 'Opening balance',
                            'type' => 'number',
                            'help' => 'The present value of your investment.',
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
                            'name' => 'Type',
                            'label' => 'When?',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Timing',
                            'label' => 'Timing',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CompFreq',
                            'label' => 'Compounding frequency',
                            'type' => 'number',
                            'help' => 'The frequency interest is added to the principal balance of your savings, or, in other words, how often the earned return or interest is reinvested.&nbsp;',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'EndDate', 'label' => 'Date to reach your goal', 'type' => 'date', 'help' => 'Note, that if the number of periods between the day you start saving and the date of your goal is fractional, the number of periods is rounded up.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annualGrowth',
                            'label' => 'Annual growth rate',
                            'type' => 'number',
                            'help' => 'The percentage growth rate of your additional periodic contribution over a year.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'periodicGrowth',
                            'label' => 'Periodic growth rate',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The percentage growth rate of your periodic contributions. Note, that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the regularity of your additional deposit.
                            TXT,
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
                            'name' => 'frequency',
                            'label' => 'How often?',
                            'type' => 'select',
                            'options' => ['Yearly' => '1', 'Semi-annually' => '2', 'Quarterly' => '4', 'Monthly' => '12'],
                            'dataset' => 'payfreq',
                            'control' => 'DROPDOWN',
                            'help' => 'The frequency of your contribution.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Calculations displayed in the final balance table',
            'note' => 'Hidden because the result is in the table.&nbsp;',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inflationFinal',
                            'label' => 'Inflation final',
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
                            'name' => 'finalBalanceFinal',
                            'label' => 'Final balance final',
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
                            'name' => 'tableBalance',
                            'label' => 'Table balance',
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
                            'name' => 'totalDeposit2',
                            'label' => 'Total deposit',
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
                            'name' => 'totalReturn2',
                            'label' => 'Total return',
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
                            'name' => 'numberDeposits',
                            'label' => 'Number deposits',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'endTerm', 'label' => 'End term', 'type' => 'date'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Calculations displayed in the deposit payments table',
            'note' => 'Hidden because the result is in the table.&nbsp;',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalBalanceDeposit',
                            'label' => 'Final balance',
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
                            'name' => 'depositBalance',
                            'label' => 'Deposit balance',
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
                            'name' => 'totalDeposit3',
                            'label' => 'Total deposit3',
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
                            'name' => 'totalReturn3',
                            'label' => 'Total return3',
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
                            'name' => 'inflationDeposit',
                            'label' => 'Inflation deposit',
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
            'title' => 'annualGrowth + 1 = (1 + periodicGrowth) ^ frequency',
            'results' => ['frequency' => 'log(annualGrowth + 1)/log(periodicGrowth + 1)', 'periodicGrowth' => 'pow(annualGrowth + 1, 1/frequency) - 1', 'annualGrowth' => 'pow(periodicGrowth + 1, frequency) - 1'],
        ],
        [
            'title' => 'finalBalanceFinal= FinalBalance / (1+inflation) ^ tenure',
            'results' => ['inflation' => 'pow(FinalBalance/finalBalanceFinal, 1/tenure) - 1', 'finalBalanceFinal' => 'FinalBalance*pow(inflation + 1, -tenure)', 'tenure' => 'log(FinalBalance/finalBalanceFinal)/log(inflation + 1)', 'FinalBalance' => 'finalBalanceFinal*pow(inflation + 1, tenure)'],
        ],
        [
            'title' => 'tableBalance = getTableBalance(PerPay, PayFreq, interestRate, tenure, periodicGrowth, FinalBalance, Subject)',
            'results' => ['tableBalance' => 'getTableBalance(PerPay, PayFreq, interestRate, tenure, periodicGrowth, FinalBalance, Subject)'],
        ],
        [
            'title' => 'inflationFinal = one_way(tableBalance / (1+inflation) ^ tenure)',
            'results' => ['inflationFinal' => '(pow(inflation + 1, -tenure)*getTableBalance(PerPay, PayFreq, interestRate, tenure, periodicGrowth, FinalBalance, Subject))'],
        ],
        [
            'title' => 'totalDeposit2 = PerPay * PayFreq * tenure',
            'results' => ['tenure' => 'totalDeposit2/(PayFreq*PerPay)', 'PayFreq' => 'totalDeposit2/(PerPay*tenure)', 'totalDeposit2' => 'PayFreq*PerPay*tenure', 'PerPay' => 'totalDeposit2/(PayFreq*tenure)'],
        ],
        [
            'title' => 'totalReturn2 = one_way (tableBalance - totalDeposit2)',
            'results' => ['totalReturn2' => '(-totalDeposit2 + getTableBalance(PerPay, PayFreq, interestRate, tenure, periodicGrowth, FinalBalance, Subject))'],
        ],
        [
            'title' => 'numberDeposits = PayFreq * tenure',
            'results' => ['numberDeposits' => 'PayFreq*tenure', 'PayFreq' => 'numberDeposits/tenure', 'tenure' => 'numberDeposits/PayFreq'],
        ],
        [
            'title' => 'endTerm = StartDate + (tenure*365.2425)',
            'results' => ['tenure' => '-400/146097*StartDate + (400/146097)*endTerm', 'endTerm' => 'StartDate + (146097/400)*tenure', 'StartDate' => 'endTerm - 146097/400*tenure'],
        ],
        [
            'title' => 'depositBalance = getDepositPayment (PayFreq, interestRate, tenure, periodicGrowth, FinalBalance)',
            'results' => ['depositBalance' => 'getDepositPayment(PayFreq, interestRate, tenure, periodicGrowth, FinalBalance)'],
        ],
        [
            'title' => 'inflationDeposit = one_way (depositBalance * (1 + inflation) ^ tenure)',
            'results' => ['inflationDeposit' => '(pow(inflation + 1, tenure)*getDepositPayment(PayFreq, interestRate, tenure, periodicGrowth, FinalBalance))'],
        ],
        [
            'title' => 'totalDeposit3 = one_way (inflationDeposit * PayFreq * tenure)',
            'results' => ['totalDeposit3' => '(PayFreq*tenure*(pow(inflation + 1, tenure)*getDepositPayment(PayFreq, interestRate, tenure, periodicGrowth, FinalBalance)))'],
        ],
        [
            'title' => 'totalReturn3 = one_way (finalBalanceDeposit - totalDeposit3)',
            'results' => ['totalReturn3' => '(finalBalanceDeposit - (PayFreq*tenure*(pow(inflation + 1, tenure)*getDepositPayment(PayFreq, interestRate, tenure, periodicGrowth, FinalBalance))))'],
        ],
        [
            'title' => 'finalBalanceDeposit = FinalBalance * (1 + inflation) ^ tenure',
            'results' => ['inflation' => 'pow(finalBalanceDeposit/FinalBalance, 1/tenure) - 1', 'tenure' => 'log(finalBalanceDeposit/FinalBalance)/log(inflation + 1)', 'FinalBalance' => 'finalBalanceDeposit*pow(inflation + 1, -tenure)', 'finalBalanceDeposit' => 'FinalBalance*pow(inflation + 1, tenure)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getTableBalance",function(_PerPay,PayFreq,r,t,g_p,_FinBal){var PerPay=Number(_PerPay);var q=Number(PayFreq);var periods=q*t;var VarType=1;var g=0;var InDep=0;var eq_p=getPerEqRate(q,1,r);var FinBal=Number(_FinBal);var DepBal=getBal(PerPay,periods,q,eq_p,g_p,g,VarType);var FinPrincBal=getFV(InDep,eq_p,periods);FinBal=FinPrincBal+DepBal;return FinBal});omni.define("getDepositPayment",function(PayFreq,r,t,g_p,_FinBal){var q=Number(PayFreq);var periods=q*t;var VarType=1;var g=0;var InDep=0;var eq_p=getPerEqRate(q,1,r);var FinBal=Number(_FinBal);var PerPay=getPerPay(InDep,FinBal,periods,q,eq_p,g_p,g,VarType);return PerPay});function getBal(PerPay,periods,q,eq_p,g_p,g,VarType){var DepBal;if(g_p!==eq_p&&q!==1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g)}else if(g_p===eq_p){DepBal=PerPay*periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType)}return DepBal}function getFV(InBal,eq_p,periods){var FinPrincBal=InBal*mathjs.pow(1+eq_p,periods);return FinPrincBal}function getPerEqRate(q,m,r){var ex=Math.exp(1);var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq_p=mathjs.round(mathjs.pow(base,power)-1,10);return eq_p}function getPerPay(InBal,FinBal,periods,q,eq_p,g_p,g,VarType){var PerPay;var PrincBal=InBal*mathjs.pow(1+eq_p,periods);var DepBal=FinBal-PrincBal;if(g_p!==eq_p&&q!==1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p))}else if(g!==eq_p&&q===1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g))}else if(g_p===eq_p){PerPay=DepBal/(periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType))}return PerPay}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        PPF (India) turns Your goal, Tenure and Inflation rate into Deposit payment and Deposit frequency. It is a single relationship that reads deposit payment out of your goal, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the PPF (India) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind PPF (India): it takes 3 numbers and reports Deposit payment, Deposit frequency and Start date.</p><p>In the form&#039;s own words, How often? = ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1).</p><p>The result panel carries Deposit payment, Deposit frequency, Start date and Annual growth rate, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Your goal</strong> — a plain number, no unit. In today&#039;s purchasing power.</li><li><strong>Tenure</strong> — in years</li><li><strong>Inflation rate</strong> — in percent. The annual rate of inflation. Note, that you can set a negative value if you expect a fall in the general price level during the set interval, representing deflationary pressures.</li></ul><p>The result boxes are Deposit payment, Deposit frequency, Start date, Annual growth rate, Periodic growth rate, How often?, Inflation final in USD, Final balance final in USD, Table balance in USD, Total deposit in USD, Total return in USD, Number deposits, End term, Final balance in USD, Deposit balance in USD, Total deposit3 in USD, Total return3 in USD, Inflation deposit in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, I&amp;#039;d like to know the… = 2 and Interest rate = 7.1 perc gives <strong>Deposit frequency</strong> = 12, <strong>Opening balance</strong> = 0, <strong>Annual growth rate</strong> = 0, <strong>How often?</strong> = 12 and <strong>Periodic growth rate</strong> = 0.</p><ul><li><strong>Deposit frequency</strong> = 12</li><li><strong>Opening balance</strong> = 0</li><li><strong>Annual growth rate</strong> = 0</li><li><strong>How often?</strong> = 12</li><li><strong>Periodic growth rate</strong> = 0</li></ul><p>The line behind those figures is <strong>How often?</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Deposit frequency</strong> = 12, <strong>Opening balance</strong> = 0, <strong>Annual growth rate</strong> = 0, <strong>How often?</strong> = 12 and <strong>Periodic growth rate</strong> = 0 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Interest rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>How often?</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code></li><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ How often?) − 1</code></li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(How often?) − 1</code></li><li><strong>Final balance final</strong> = <code>Your goal × (Inflation rate + 1)^(− Tenure)</code></li><li><strong>Inflation rate</strong> = <code>(Your goal ÷ Final balance final)^(1 ÷ Tenure) − 1</code></li><li><strong>Tenure</strong> = <code>ln(Your goal ÷ Final balance final) ÷ ln(Inflation rate + 1)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>How often?</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code> — the form to use when Annual growth rate and Periodic growth rate are the values you have.</li><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ How often?) − 1</code> — the form to use when Annual growth rate and How often? are the values you have.</li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(How often?) − 1</code> — the form to use when Periodic growth rate and How often? are the values you have.</li><li><strong>Final balance final</strong> = <code>Your goal × (Inflation rate + 1)^(− Tenure)</code> — the form to use when Your goal, Inflation rate and Tenure are the values you have.</li><li><strong>Inflation rate</strong> = <code>(Your goal ÷ Final balance final)^(1 ÷ Tenure) − 1</code> — the form to use when Your goal, Final balance final and Tenure are the values you have.</li><li><strong>Tenure</strong> = <code>ln(Your goal ÷ Final balance final) ÷ ln(Inflation rate + 1)</code> — the form to use when Your goal, Final balance final and Inflation rate are the values you have.</li><li><strong>Your goal</strong> = <code>Final balance final × (Inflation rate + 1)^(Tenure)</code> — the form to use when Final balance final, Inflation rate and Tenure are the values you have.</li><li><strong>Table balance</strong> = <code>getTableBalance(Deposit payment, Deposit frequency, Interest rate, Tenure, Periodic growth rate, Your goal, I&#039;d like to know the...)</code> — the form to use when Deposit payment, Deposit frequency, Interest rate and Tenure are the values you have.</li></ul><p>Any one of How often?, Periodic growth rate and Annual growth rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double I&#039;d like to know the... from 2 to 4, leaving every other box alone. The panel moves from <strong>Deposit frequency</strong> 12, <strong>Opening balance</strong> 0, <strong>Annual growth rate</strong> 0, <strong>How often?</strong> 12 and <strong>Periodic growth rate</strong> 0 to <strong>Deposit frequency</strong> 12, <strong>Opening balance</strong> 0, <strong>Annual growth rate</strong> 0, <strong>How often?</strong> 12 and <strong>Periodic growth rate</strong> 0.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Tenure and Inflation rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Deposit payment, Deposit frequency and Start date are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Your goal left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Your goal is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Tenure left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Tenure is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Your goal and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Your goal</strong> takes a plain number with no unit attached. In today&#039;s purchasing power. The page reads it when it works out Inflation rate, Final balance final and Tenure. Have it to hand before you start: Your goal is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Tenure</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The page reads it when it works out Inflation rate, Final balance final and Your goal. Have it to hand before you start: Tenure is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Inflation rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The annual rate of inflation. Note, that you can set a negative value if you expect a fall in the general price level during the set interval, representing deflationary pressures. The page reads it when it works out Final balance final, Tenure and Your goal. Have it to hand before you start: Inflation rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Deposit payment is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are years and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Your goal, Tenure and Inflation rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Your goal, Tenure and Inflation rate measured, Deposit payment and Deposit frequency wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/customer-retention-rate">Customer retention rate</a>, <a href="/finance/cyber-monday">Cyber Monday Calculator</a> and <a href="/finance/dart-rate">Dart rate Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from PPF (India) is a number to act on, so the useful question is what to do with Deposit payment, Deposit frequency and Start date once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Your goal, Tenure and Inflation rate alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the PPF (India) calculator work out?', 'a' => <<<'TXT'
            Deposit payment, Deposit frequency, Start date and Annual growth rate, from Annual growth rate and Periodic growth rate. The relationship is How often? = ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Your goal, Tenure (years), Inflation rate (percent). Enter your goal, tenure and inflation rate; Deposit payment is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of How often?, Periodic growth rate, Annual growth rate and Final balance final blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Deposit frequency = 12, Opening balance = 0, Annual growth rate = 0, How often? = 12 and Periodic growth rate = 0. The figures come from Your goal as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Deposit payment is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Your goal left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Deposit payment keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/customer-retention-rate', 'name' => 'Customer retention rate'],
            ['path' => '/finance/cyber-monday', 'name' => 'Cyber Monday Calculator'],
            ['path' => '/finance/dart-rate', 'name' => 'Dart rate Calculator'],
        ],
        'authors' => [],
    ],
];
