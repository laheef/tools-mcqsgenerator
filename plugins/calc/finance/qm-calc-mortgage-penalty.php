<?php

/**
 * Mortgage penalty
 * /finance/mortgage-penalty
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mortgage penalty',
    'meta' => ['title' => 'Mortgage penalty — Formula, Steps & Examples', 'description' => 'Mortgage penalty turns mortgage type and prepayment type into privilege amount and total prepayment. Results come back in USD, with any other unit a click away.', 'h1' => 'Mortgage penalty Calculator', 'updated' => '2025-04-13'],
    'sections' => [
        [
            'title' => 'Mortgage prepayment details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mortgageType',
                            'label' => 'Mortgage type',
                            'type' => 'select',
                            'options' => ['Fixed rate' => '0', 'Variable rate' => '1'],
                            'dataset' => 'type',
                            'help' => 'What type of mortgage do you have?',
                            'default' => 'Fixed rate',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'prepayType',
                            'label' => 'Prepayment type',
                            'type' => 'select',
                            'options' => ['Full' => '0', 'Partial' => '1'],
                            'dataset' => 'prepayment',
                            'default' => 'Full',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'principal',
                            'label' => 'Original mortgage principal',
                            'type' => 'number',
                            'help' => 'The initial mortgage loan amount',
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
                            'name' => 'mortgageBalance',
                            'label' => 'Outstanding mortgage balance',
                            'type' => 'number',
                            'help' => 'What is outstanding balance on your mortgage loan?',
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
                            'name' => 'privilege',
                            'label' => 'Annual prepayment privilege',
                            'type' => 'number',
                            'help' => 'Indicate the prepayment privilege your are entitled to. The information is stated in your mortgage loan agreement.',
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
                            'name' => 'privilegeAmount',
                            'label' => 'Privilege amount',
                            'type' => 'number',
                            'help' => 'Amount you are allowed to prepay in a calendar year, without a prepayment penalty.',
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
                            'name' => 'prevPrepayAmount',
                            'label' => 'How much have you prepaid since January 1st of this calendar year?',
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
                            'name' => 'prepayAmount',
                            'label' => 'Prepayment amount',
                            'type' => 'number',
                            'help' => 'How much do you intend to prepay?',
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
                            'name' => 'payFrequency',
                            'label' => 'Payment frequency',
                            'type' => 'select',
                            'options' => [
                                'Weekly' => '52',
                                'Bi-weekly' => '26',
                                'Accelerated Weekly' => '48',
                                'Accelerated Bi-weekly' => '24',
                                'Monthly' => '12',
                            ],
                            'dataset' => 'pay_freq',
                            'control' => 'DROPDOWN',
                            'help' => 'How often do you make your payments?',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'currentRate',
                            'label' => 'Current mortgage rate',
                            'type' => 'number',
                            'help' => 'Current interest rate on your mortgage.',
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
                            'name' => 'postedRate',
                            'label' => 'Posted interest rate',
                            'type' => 'number',
                            'help' => 'What is the mortgage interest rate posted today? You can find this information on your mortgage provider\'s website.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'endDate', 'label' => 'Mortgage maturity date', 'type' => 'date', 'help' => 'Date your mortgage term ends.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Mortgage prepayment penalty',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalPrepay',
                            'label' => 'Total prepayment',
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
                            'name' => 'exceedPrivilege',
                            'label' => 'Amount exceeding privilege',
                            'type' => 'number',
                            'help' => 'Amount exceeding your prepayment privilege. The prepayment penalty is charged on this amount.',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'penaltyFF > 0 and mortgageType == 0 and prepayType == 0', 'text' => ' Based on the details you provided, your estimated mortgage prepayment penalty is {{penaltyFF.monetaryValue}}1.'],
                                ['when' => 'penaltyVF > 0 and mortgageType == 1 and prepayType == 0', 'text' => ' Based on the details you provided, your estimated mortgage prepayment penalty is {{penaltyVF.monetaryValue}}1.'],
                                ['when' => 'penaltyFP > 0 and mortgageType == 0 and prepayType == 1', 'text' => ' Based on the details you provided, your estimated mortgage prepayment penalty is {{penaltyFP.monetaryValue}}1.'],
                                ['when' => 'penaltyVP > 0 and mortgageType == 1 and prepayType == 1', 'text' => ' Based on the details you provided, your estimated mortgage prepayment penalty is {{penaltyVP.monetaryValue}}1.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => '1 Additional fees may apply. Please consult your mortgage provider to ascertain the exact penalty amount.'],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'penalty',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'numMonths',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'penaltyFF',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'penaltyVF',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'penaltyFP',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'penaltyVP',
                            'label' => '',
                            'type' => 'presentation',
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
            'title' => 'privilegeAmount = one_way(principal * privilege)',
            'results' => ['privilegeAmount' => '(principal*privilege)'],
        ],
        [
            'title' => 'totalPrepay = one_way(prevPrepayAmount + prepayAmount)',
            'results' => ['totalPrepay' => '(prepayAmount + prevPrepayAmount)'],
        ],
        [
            'title' => 'exceedPrivilege = one_way(totalPrepay - privilegeAmount) ',
            'results' => ['exceedPrivilege' => '(-(principal*privilege) + (prepayAmount + prevPrepayAmount))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getPenalty",function(mortgageType,prepayType,mortgageBalance,prepayAmount,prevPrepayAmount,principal,privilege,currentRate,postedRate,payFrequency,endDateNum){var millisecondsInADay=24*60*60*1000;var today=new Date;var endDate=new Date(endDateNum*millisecondsInADay);function monthDiff(d1,d2){var months=(d2.getFullYear()-d1.getFullYear())*12;months-=d1.getMonth();months+=d2.getMonth();return months<=0?0:months}var numMonths=monthDiff(today,endDate);var interestFull=mortgageBalance*(currentRate/4);var interestPartial=(prevPrepayAmount+prepayAmount-principal*privilege)*(currentRate/4);var irdFull=mortgageBalance*((currentRate-postedRate)/payFrequency)*numMonths;var irdPartial=(prevPrepayAmount+prepayAmount-principal*privilege)*((currentRate-postedRate)/payFrequency)*numMonths;var penalty;if(mortgageType===1&&prepayType===0){penalty=interestFull}else if(mortgageType===1&&prepayType===1){penalty=interestPartial}else if(mortgageType===0&&prepayType===1){penalty=Math.max(interestPartial,irdPartial)}else{penalty=Math.max(interestFull,irdFull)}return penalty});omni.define("getPenaltyFF",function(mortgageBalance,currentRate,postedRate,payFrequency,endDateNum){var millisecondsInADay=24*60*60*1000;var today=new Date;var endDate=new Date(endDateNum*millisecondsInADay);function monthDiff(d1,d2){var months=(d2.getFullYear()-d1.getFullYear())*12;months-=d1.getMonth();months+=d2.getMonth();return months<=0?0:months}var numMonths=monthDiff(today,endDate);var interestFull=mortgageBalance*(currentRate/4);var irdFull=mortgageBalance*((currentRate-postedRate)/payFrequency)*numMonths;return Math.max(interestFull,irdFull)});omni.define("getPenaltyVF",function(mortgageBalance,currentRate,endDateNum){var millisecondsInADay=24*60*60*1000;var today=new Date;var endDate=new Date(endDateNum*millisecondsInADay);function monthDiff(d1,d2){var months=(d2.getFullYear()-d1.getFullYear())*12;months-=d1.getMonth();months+=d2.getMonth();return months<=0?0:months}var numMonths=monthDiff(today,endDate);var interestFull=mortgageBalance*(currentRate/4);return interestFull});omni.define("getPenaltyFP",function(prepayAmount,prevPrepayAmount,principal,privilege,currentRate,postedRate,payFrequency,endDateNum){var millisecondsInADay=24*60*60*1000;var today=new Date;var endDate=new Date(endDateNum*millisecondsInADay);function monthDiff(d1,d2){var months=(d2.getFullYear()-d1.getFullYear())*12;months-=d1.getMonth();months+=d2.getMonth();return months<=0?0:months}var numMonths=monthDiff(today,endDate);var interestPartial=(prevPrepayAmount+prepayAmount-principal*privilege)*(currentRate/4);var irdPartial=(prevPrepayAmount+prepayAmount-principal*privilege)*((currentRate-postedRate)/payFrequency)*numMonths;return Math.max(interestPartial,irdPartial)});omni.define("getPenaltyVP",function(prepayAmount,prevPrepayAmount,principal,privilege,currentRate,endDateNum){var millisecondsInADay=24*60*60*1000;var today=new Date;var endDate=new Date(endDateNum*millisecondsInADay);function monthDiff(d1,d2){var months=(d2.getFullYear()-d1.getFullYear())*12;months-=d1.getMonth();months+=d2.getMonth();return months<=0?0:months}var numMonths=monthDiff(today,endDate);var interestPartial=(prevPrepayAmount+prepayAmount-principal*privilege)*(currentRate/4);return interestPartial});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Original mortgage principal and Annual prepayment privilege into Mortgage penalty and the answer comes back as Privilege amount and Total prepayment. Nothing is looked up on this page: privilege amount is computed from original mortgage principal and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Privilege amount is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Mortgage penalty calculator works', 'html' => <<<'TXT'
            <p>Mortgage penalty answers one question from 2 numbers, and the answer is Privilege amount, Total prepayment and Amount exceeding privilege.</p><p>Written with the labels from the form, Privilege amount = (Original mortgage principal × Annual prepayment privilege).</p><p>What comes back is Privilege amount, Total prepayment and Amount exceeding privilege — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Original mortgage principal</strong> — in USD. The initial mortgage loan amount</li><li><strong>Annual prepayment privilege</strong> — in percent. Indicate the prepayment privilege your are entitled to. The information is stated in your mortgage loan agreement.</li></ul><p>The result boxes are Privilege amount in USD, Total prepayment in USD, Amount exceeding privilege in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Mortgage type = 0, Prepayment type = 0, Original mortgage principal = 3 USD, Outstanding mortgage balance = 4 USD, Annual prepayment privilege = 5 perc, How much have you prepaid since January 1st of this calendar year? = 6 USD, Prepayment amount = 7 USD, Payment frequency = 12, Current mortgage rate = 8 perc, Posted interest rate = 9 perc, Num Months = 10 and Mortgage maturity date = Sun 1 March 2026 — through the same formula and the panel reports <strong>Privilege amount</strong> = 15 USD, <strong>Total prepayment</strong> = 13 USD and <strong>Amount exceeding privilege</strong> = -2 USD.</p><ul><li><strong>Privilege amount</strong> = 15 USD</li><li><strong>Total prepayment</strong> = 13 USD</li><li><strong>Amount exceeding privilege</strong> = -2 USD</li></ul><p>That is <strong>Privilege amount</strong> = <code>(Original mortgage principal × Annual prepayment privilege)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Privilege amount</strong> = 15, <strong>Total prepayment</strong> = 13 and <strong>Amount exceeding privilege</strong> = -2. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Annual prepayment privilege lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Privilege amount</strong> = <code>(Original mortgage principal × Annual prepayment privilege)</code></li><li><strong>Total prepayment</strong> = <code>(Prepayment amount + How much have you prepaid since January 1st of this calendar year?)</code></li><li><strong>Amount exceeding privilege</strong> = <code>( − (Original mortgage principal × Annual prepayment privilege) + (Prepayment amount + How much have you prepaid since January 1st of this calendar year?))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Privilege amount</strong> = <code>(Original mortgage principal × Annual prepayment privilege)</code> — the form to use when Original mortgage principal and Annual prepayment privilege are the values you have.</li><li><strong>Total prepayment</strong> = <code>(Prepayment amount + How much have you prepaid since January 1st of this calendar year?)</code> — the form to use when Prepayment amount and How much have you prepaid since January 1st of this calendar year? are the values you have.</li><li><strong>Amount exceeding privilege</strong> = <code>( − (Original mortgage principal × Annual prepayment privilege) + (Prepayment amount + How much have you prepaid since January 1st of this calendar year?))</code> — the form to use when Original mortgage principal, Annual prepayment privilege, Prepayment amount and How much have you prepaid since January 1st of this calendar year? are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Privilege amount, Total prepayment and Amount exceeding privilege can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Annual prepayment privilege carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Privilege amount, Total prepayment and Amount exceeding privilege are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Original mortgage principal left as a guess.</strong> Anything typed into Original mortgage principal is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Annual prepayment privilege left as a guess.</strong> Anything typed into Annual prepayment privilege is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Original mortgage principal and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Original mortgage principal</strong> takes a plain number with no unit attached. The initial mortgage loan amount. The page reads it when it works out Privilege amount and Amount exceeding privilege. Have it to hand before you start: Original mortgage principal is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Annual prepayment privilege</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Indicate the prepayment privilege your are entitled to. The information is stated in your mortgage loan agreement. The page reads it when it works out Privilege amount and Amount exceeding privilege. Have it to hand before you start: Annual prepayment privilege is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Privilege amount</strong> is a plain number and the page's own defaults put it at 15. It is computed from Original mortgage principal and Annual prepayment privilege, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total prepayment</strong> is a plain number and the page's own defaults put it at 13. It is computed from Prepayment amount and How much have you prepaid since January 1st of this calendar year?, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Amount exceeding privilege</strong> is a plain number and the page's own defaults put it at -2. It is computed from Original mortgage principal, Annual prepayment privilege, Prepayment amount and How much have you prepaid since January 1st of this calendar year?, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Privilege amount</th><th>Total prepayment</th><th>Amount exceeding privilege</th></tr></thead><tbody><tr><td><strong>Original mortgage principal</strong> +10%</td><td>+10%</td><td>+0%</td><td>-75%</td></tr><tr><td><strong>Outstanding mortgage balance</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Annual prepayment privilege</strong> +10%</td><td>+10%</td><td>+0%</td><td>-75%</td></tr><tr><td><strong>How much have you prepaid since January 1st of this calendar year?</strong> +10%</td><td>+0%</td><td>+4.62%</td><td>+30%</td></tr><tr><td><strong>Prepayment amount</strong> +10%</td><td>+0%</td><td>+5.38%</td><td>+35%</td></tr><tr><td><strong>Payment frequency</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Current mortgage rate</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Posted interest rate</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Num Months</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Mortgage maturity date</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Original mortgage principal: ten per cent there moves an answer by about 75 per cent, which is why that is the number to measure twice. By contrast, Outstanding mortgage balance, Payment frequency and Current mortgage rate barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Mortgage type = 0, Prepayment type = 0, Original mortgage principal = 1.5 USD, Outstanding mortgage balance = 2 USD, Annual prepayment privilege = 2.5 perc, How much have you prepaid since January 1st of this calendar year? = 3 USD, Prepayment amount = 3.5 USD, Payment frequency = 6, Current mortgage rate = 4 perc, Posted interest rate = 4.5 perc, Num Months = 5 and Mortgage maturity date = Fri 30 January 1998, the answer is <strong>Privilege amount</strong> = 3.75 USD, <strong>Total prepayment</strong> = 6.5 USD and <strong>Amount exceeding privilege</strong> = 2.75 USD.</li><li>With Mortgage type = 0, Prepayment type = 0, Original mortgage principal = 3 USD, Outstanding mortgage balance = 4 USD, Annual prepayment privilege = 5 perc, How much have you prepaid since January 1st of this calendar year? = 6 USD, Prepayment amount = 7 USD, Payment frequency = 12, Current mortgage rate = 8 perc, Posted interest rate = 9 perc, Num Months = 10 and Mortgage maturity date = Sun 1 March 2026, the answer is <strong>Privilege amount</strong> = 15 USD, <strong>Total prepayment</strong> = 13 USD and <strong>Amount exceeding privilege</strong> = -2 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Privilege amount is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Original mortgage principal and Annual prepayment privilege is what you already know and Privilege amount and Total prepayment is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/website-ad-revenue">Website ad revenue Calculator</a>, <a href="/finance/wedding-budget">Wedding budget Calculator</a> and <a href="/finance/week-over-week">Week over week Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mortgage penalty calculator work out?', 'a' => <<<'TXT'
            Privilege amount, Total prepayment and Amount exceeding privilege, from Original mortgage principal and Annual prepayment privilege. The relationship is Privilege amount = (Original mortgage principal × Annual prepayment privilege).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Original mortgage principal (USD), Annual prepayment privilege (percent). With original mortgage principal and annual prepayment privilege in place, Privilege amount can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Privilege amount, Total prepayment and Amount exceeding privilege can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Privilege amount = 15 USD, Total prepayment = 13 USD and Amount exceeding privilege = -2 USD. Those are the defaults written into the form — move Original mortgage principal and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Privilege amount is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Original mortgage principal left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Privilege amount keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/website-ad-revenue', 'name' => 'Website ad revenue Calculator'],
            ['path' => '/finance/wedding-budget', 'name' => 'Wedding budget Calculator'],
            ['path' => '/finance/week-over-week', 'name' => 'Week over week Calculator'],
        ],
        'authors' => [],
    ],
];
