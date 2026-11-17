<?php

/**
 * Biden's Tax Plan
 * /finance/biden-tax-plan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Biden\'s Tax Plan',
    'meta' => ['title' => 'Biden\'s Tax Plan — Formula, Steps & Examples', 'description' => 'Biden\'s Tax Plan works out your income tax under the current tax plan from your age. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Biden\'s Tax Plan Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Tax Information',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        President Biden proposed a new tax plan to help fund the American Families Plan. Check how your income tax will change and whether you can expect additional tax refunds!
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'age',
                            'label' => 'Your age',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annual_income',
                            'label' => 'Annual income (AGI)',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'filling_status',
                            'label' => 'Filing status',
                            'type' => 'select',
                            'options' => ['Single' => '0', 'Married' => '1', 'Head of household' => '2'],
                            'dataset' => 'filing status',
                            'default' => 'Single',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kidsSmall',
                            'label' => 'Children below 6 years of age',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kidsBig',
                            'label' => 'Children between 6 and 17',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dependents',
                            'label' => 'Number of dependents',
                            'type' => 'number',
                            'help' => 'To see who qualifies as a dependent, please refer to the FAQ section',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Income tax',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'incomeTaxPaid',
                            'label' => 'Your income tax under the current tax plan',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'incomeTaxPaidBiden',
                            'label' => 'Your income tax paid under Biden\'s tax plan',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Effective tax rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eff_tax_rate',
                            'label' => 'Effective tax rate under the current tax plan',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eff_tax_rate_Biden',
                            'label' => 'Effective tax rate under Biden\'s tax plan',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'incomeTaxPaid == incomeTaxPaidBiden and hasValue(incomeTaxPaidBiden)', 'text' => 'Nothing happened! You will not need to pay more tax under the new tax plan. '],
                                ['when' => 'incomeTaxPaid != incomeTaxPaidBiden and hasValue(incomeTaxPaidBiden)', 'text' => 'Under the new tax plan, you will need to pay ${{taxDifference.formattedValue}} more in taxes.  Your taxes will be used to fund Biden\'s stimulus programs.'],
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
                                ['when' => null, 'text' => ' Additionally, you\'re eligible for up to:&nbsp;'],
                                ['when' => 'childTax > 0 and childTax <= childTaxOld', 'text' => '{{$childTax.formattedValue}} of child tax credit.&nbsp;'],
                                ['when' => 'childTax > 0 and childTax > childTaxOld', 'text' => '${{childTax.formattedValue}} of child tax credit (${{childTaxDiff.formattedValue}} more than under last year\'s legislation).&nbsp;'],
                                ['when' => 'childDependentCredit != 0', 'text' => <<<'TXT'
                                ${{childDependentCredit.formattedValue}} of child and dependent care credit (${{childDependentCreditDiff.formattedValue}} more than under the current legislation).&nbsp;
                                TXT],
                                ['when' => 'theEITC != 0', 'text' => '${{theEITC.formattedValue}} of earned income tax credit (EITC).'],
                            ],
                        ],
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
                            'name' => 'kids',
                            'label' => 'Kids',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
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
                            'name' => 'taxDifference',
                            'label' => 'Tax difference',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'childDependentCredit',
                            'label' => 'Child dependent credit',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'theEITC',
                            'label' => 'The eitc',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'childTax',
                            'label' => 'Child tax',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'childTaxOld',
                            'label' => 'Child tax old',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'childTaxDiff',
                            'label' => 'Child tax diff',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'childDependentCreditDiff',
                            'label' => 'Child dependent credit diff',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'incomeTaxPaid = taxBracketFunction(annual_income, filling_status) ',
            'results' => ['incomeTaxPaid' => 'taxBracketFunction(annual_income, filling_status)'],
        ],
        [
            'title' => 'incomeTaxPaidBiden = taxBracketFunctionBiden(annual_income, filling_status)',
            'results' => ['incomeTaxPaidBiden' => 'taxBracketFunctionBiden(annual_income, filling_status)'],
        ],
        [
            'title' => 'eff_tax_rate = effTaxRate(annual_income, incomeTaxPaid)',
            'results' => ['eff_tax_rate' => 'effTaxRate(annual_income, taxBracketFunction(annual_income, filling_status))'],
        ],
        [
            'title' => 'eff_tax_rate_Biden = effTaxRate(annual_income, incomeTaxPaidBiden)',
            'results' => ['eff_tax_rate_Biden' => 'effTaxRate(annual_income, taxBracketFunctionBiden(annual_income, filling_status))'],
        ],
        [
            'title' => 'kids = kidsSmall + kidsBig',
            'results' => ['kids' => 'kidsBig + kidsSmall', 'kidsSmall' => 'kids - kidsBig', 'kidsBig' => 'kids - kidsSmall'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("taxBracketFunction",function(annual_income,filling_status){var std_deduction=0;if(filling_status===0){std_deduction=12550}else if(filling_status===1){std_deduction=25100}else{std_deduction=18800}var adj_annual_income=annual_income-std_deduction;if(filling_status===0){if(adj_annual_income<=9950){return Math.max(0,0.1*adj_annual_income)}else if(adj_annual_income<=40525){return 9950*0.1+(adj_annual_income-9950)*0.12}else if(adj_annual_income<=86375){return 9950*0.1+(40525-9950)*0.12+(adj_annual_income-40525)*0.22}else if(adj_annual_income<=164925){return 9950*0.1+(40525-9950)*0.12+(86375-40525)*0.22+(adj_annual_income-86375)*0.24}else if(adj_annual_income<=209425){return 9950*0.1+(40525-9950)*0.12+(86375-40525)*0.22+(164925-86375)*0.24+(adj_annual_income-164925)*0.32}else if(adj_annual_income<=523600){return 9950*0.1+(40525-9950)*0.12+(86375-40525)*0.22+(164925-86375)*0.24+(209425-164925)*0.32+(adj_annual_income-209425)*0.35}else{return 9950*0.1+(40525-9950)*0.12+(86375-40525)*0.22+(164925-86375)*0.24+(209425-164925)*0.32+(523600-209425)*0.35+(annual_income-523600)*0.37}}else if(filling_status===1){if(adj_annual_income<=19900){return Math.max(0,0.1*adj_annual_income)}else if(adj_annual_income<=81050){return 19900*0.1+(adj_annual_income-19900)*0.12}else if(adj_annual_income<=172750){return 19900*0.1+(81050-19900)*0.12+(adj_annual_income-81050)*0.22}else if(adj_annual_income<=329850){return 19900*0.1+(81050-19900)*0.12+(172750-81050)*0.22+(adj_annual_income-172750)*0.24}else if(adj_annual_income<=418850){return 19900*0.1+(81050-19900)*0.12+(172750-81050)*0.22+(329850-172750)*0.24+(adj_annual_income-329850)*0.32}else if(adj_annual_income<=628300){return 19900*0.1+(81050-19900)*0.12+(172750-81050)*0.22+(329850-172750)*0.24+(418850-329850)*0.32+(adj_annual_income-418850)*0.35}else{return 19900*0.1+(81050-19900)*0.12+(172750-81050)*0.22+(329850-172750)*0.24+(418850-329850)*0.32+(628300-418850)*0.35+(adj_annual_income-628300)*0.37}}else{if(adj_annual_income<=14200){return Math.max(0,0.1*adj_annual_income)}else if(adj_annual_income<=54200){return 14200*0.1+(adj_annual_income-14200)*0.12}else if(adj_annual_income<=86350){return 14200*0.1+(54200-14200)*0.12+(adj_annual_income-54200)*0.22}else if(adj_annual_income<=164900){return 14200*0.1+(54200-14200)*0.12+(86350-54200)*0.22+(adj_annual_income-86350)*0.24}else if(adj_annual_income<=209400){return 14200*0.1+(54200-14200)*0.12+(86350-54200)*0.22+(164900-86350)*0.24+(adj_annual_income-164900)*0.32}else if(adj_annual_income<=523600){return 14200*0.1+(54200-14200)*0.12+(86350-54200)*0.22+(164900-86350)*0.24+(209400-164900)*0.32+(adj_annual_income-209400)*0.35}else{return 14200*0.1+(54200-14200)*0.12+(86350-54200)*0.22+(164900-86350)*0.24+(209400-164900)*0.32+(523600-209400)*0.35+(adj_annual_income-523600)*0.37}}});omni.define("taxBracketFunctionBiden",function(annual_income,filling_status){var std_deduction=0;if(filling_status===0){std_deduction=12550}else if(filling_status===1){std_deduction=25100}else{std_deduction=18800}var adj_annual_income=annual_income-std_deduction;if(filling_status===0){if(adj_annual_income<=9950){return Math.max(0,0.1*adj_annual_income)}else if(adj_annual_income<=40525){return 9950*0.1+(adj_annual_income-9950)*0.12}else if(adj_annual_income<=86375){return 9950*0.1+(40525-9950)*0.12+(adj_annual_income-40525)*0.22}else if(adj_annual_income<=164925){return 9950*0.1+(40525-9950)*0.12+(86375-40525)*0.22+(adj_annual_income-86375)*0.24}else if(adj_annual_income<=209425){return 9950*0.1+(40525-9950)*0.12+(86375-40525)*0.22+(164925-86375)*0.24+(adj_annual_income-164925)*0.32}else if(adj_annual_income<=400000){return 9950*0.1+(40525-9950)*0.12+(86375-40525)*0.22+(164925-86375)*0.24+(209425-164925)*0.32+(adj_annual_income-209425)*0.35}else{return 9950*0.1+(40525-9950)*0.12+(86375-40525)*0.22+(164925-86375)*0.24+(209425-164925)*0.32+(400000-209425)*0.35+(adj_annual_income-400000)*0.396}}else if(filling_status===1){if(adj_annual_income<=19900){return Math.max(0,0.1*adj_annual_income)}else if(adj_annual_income<=81050){return 19900*0.1+(adj_annual_income-19900)*0.12}else if(adj_annual_income<=172750){return 19900*0.1+(81050-19900)*0.12+(adj_annual_income-81050)*0.22}else if(adj_annual_income<=329850){return 19900*0.1+(81050-19900)*0.12+(172750-81050)*0.22+(adj_annual_income-172750)*0.24}else if(adj_annual_income<=400000){return 19900*0.1+(81050-19900)*0.12+(172750-81050)*0.22+(329850-172750)*0.24+(adj_annual_income-329850)*0.32}else{return 19900*0.1+(81050-19900)*0.12+(172750-81050)*0.22+(329850-172750)*0.24+(400000-329850)*0.32+(adj_annual_income-400000)*0.396}}else{if(adj_annual_income<=14200){return Math.max(0,0.1*adj_annual_income)}else if(adj_annual_income<=54200){return 14200*0.1+(adj_annual_income-14200)*0.12}else if(adj_annual_income<=86350){return 14200*0.1+(54200-14200)*0.12+(adj_annual_income-54200)*0.22}else if(adj_annual_income<=164900){return 14200*0.1+(54200-14200)*0.12+(86350-54200)*0.22+(adj_annual_income-86350)*0.24}else if(adj_annual_income<=209400){return 14200*0.1+(54200-14200)*0.12+(86350-54200)*0.22+(164900-86350)*0.24+(annual_income-164900)*0.32}else if(adj_annual_income<=400000){return 14200*0.1+(54200-14200)*0.12+(86350-54200)*0.22+(164900-86350)*0.24+(209400-164900)*0.32+(adj_annual_income-209400)*0.35}else{return 14200*0.1+(54200-14200)*0.12+(86350-54200)*0.22+(164900-86350)*0.24+(209400-164900)*0.32+(400000-209400)*0.35+(adj_annual_income-400000)*0.396}}});omni.define("getChildDependent",function(dependents){return Math.min(16000,8000*dependents)});omni.define("getChildTax",function(status,income,kidsSmall,kidsBig){var result=0;if(status===0){if(income<=75000){result=result+3600*kidsSmall+3000*kidsBig}else if(income<200000){result=result+3600*kidsSmall+3000*kidsBig;result=Math.max(2000*(kidsBig+kidsSmall),result-0.05*(income-75000))}}else if(status===1){if(income<=150000){result=result+3600*kidsSmall+3000*kidsBig}else if(income<400000){result=result+3600*kidsSmall+3000*kidsBig;result=Math.max(2000*(kidsBig+kidsSmall),result-0.05*(income-150000))}}else if(status===2){if(income<=112500){result=result+3600*kidsSmall+3000*kidsBig}else if(income<200000){result=result+3600*kidsSmall+3000*kidsBig;result=Math.max(2000*(kidsBig+kidsSmall),result-0.05*(income-112500))}}return result});omni.define("getEITC",function(status,income,kids){if(status===1){if(kids===0&&income<=21920){return 543}else if(kids===1&&income<=48108){return 3618}else if(kids===2&&income<=53865){return 5980}else if(kids>=3&&income<=57414){return 6728}else{return 0}}else{if(kids===0&&income<=15980){return 543}else if(kids===1&&income<=42158){return 3618}else if(kids===2&&income<=47915){return 5980}else if(kids>=3&&income<=51464){return 6728}else{return 0}}});omni.define("effTaxRate",function(annual_income,incomeTaxPaid){return incomeTaxPaid/annual_income});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Annual income (AGI) and Filing status into Biden's Tax Plan and the answer comes back as Children below 6 years of age and Children between 6 and 17. It is a single relationship that reads children below 6 years of age out of annual income (AGI), not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Biden\'s Tax Plan calculator works', 'html' => <<<'TXT'
            <p>Biden&#039;s Tax Plan answers one question from 2 numbers, and the answer is Children below 6 years of age, Children between 6 and 17 and Your income tax under the current tax plan.</p><p>Written with the labels from the form, Your income tax under the current tax plan = taxBracketFunction(Annual income (AGI), Filing status).</p><p>The answers are Children below 6 years of age, Children between 6 and 17, Your income tax under the current tax plan and Your income tax paid under Biden&#039;s tax plan; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Annual income (AGI)</strong> — a plain number, no unit</li><li><strong>Filing status</strong> — a plain number, no unit</li></ul><p>The result boxes are Children below 6 years of age, Children between 6 and 17, Your income tax under the current tax plan, Your income tax paid under Biden&#039;s tax plan, Effective tax rate under the current tax plan in percent, Effective tax rate under Biden&#039;s tax plan in percent, Kids; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Effective tax rate under the current tax plan lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Your income tax under the current tax plan</strong> = <code>taxBracketFunction(Annual income (AGI), Filing status)</code></li><li><strong>Your income tax paid under Biden&#039;s tax plan</strong> = <code>taxBracketFunctionBiden(Annual income (AGI), Filing status)</code></li><li><strong>Effective tax rate under the current tax plan</strong> = <code>effTaxRate(Annual income (AGI), taxBracketFunction(Annual income (AGI), Filing status))</code></li><li><strong>Effective tax rate under Biden&#039;s tax plan</strong> = <code>effTaxRate(Annual income (AGI), taxBracketFunctionBiden(Annual income (AGI), Filing status))</code></li><li><strong>Kids</strong> = <code>Children between 6 and 17 + Children below 6 years of age</code></li><li><strong>Children below 6 years of age</strong> = <code>Kids − Children between 6 and 17</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Your income tax under the current tax plan</strong> = <code>taxBracketFunction(Annual income (AGI), Filing status)</code> — the form to use when Annual income (AGI) and Filing status are the values you have.</li><li><strong>Your income tax paid under Biden&#039;s tax plan</strong> = <code>taxBracketFunctionBiden(Annual income (AGI), Filing status)</code> — the form to use when Annual income (AGI) and Filing status are the values you have.</li><li><strong>Effective tax rate under the current tax plan</strong> = <code>effTaxRate(Annual income (AGI), taxBracketFunction(Annual income (AGI), Filing status))</code> — the form to use when Annual income (AGI) and Filing status are the values you have.</li><li><strong>Effective tax rate under Biden&#039;s tax plan</strong> = <code>effTaxRate(Annual income (AGI), taxBracketFunctionBiden(Annual income (AGI), Filing status))</code> — the form to use when Annual income (AGI) and Filing status are the values you have.</li><li><strong>Kids</strong> = <code>Children between 6 and 17 + Children below 6 years of age</code> — the form to use when Children between 6 and 17 and Children below 6 years of age are the values you have.</li><li><strong>Children below 6 years of age</strong> = <code>Kids − Children between 6 and 17</code> — the form to use when Kids and Children between 6 and 17 are the values you have.</li><li><strong>Children between 6 and 17</strong> = <code>Kids − Children below 6 years of age</code> — the form to use when Kids and Children below 6 years of age are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Your income tax under the current tax plan, Your income tax paid under Biden&#039;s tax plan and Effective tax rate under the current tax plan can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Children below 6 years of age, Children between 6 and 17 and Your income tax under the current tax plan are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Annual income (AGI) left as a guess.</strong> Anything typed into Annual income (AGI) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Filing status left as a guess.</strong> Anything typed into Filing status is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Annual income (AGI) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Biden&#039;s Tax Plan form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Annual income (AGI)</strong> takes a plain number with no unit attached. The page reads it when it works out Your income tax under the current tax plan, Your income tax paid under Biden's tax plan and Effective tax rate under the current tax plan. Fill it from a measurement rather than a memory — Annual income (AGI) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Filing status</strong> takes a plain number with no unit attached. The page reads it when it works out Your income tax under the current tax plan, Your income tax paid under Biden's tax plan and Effective tax rate under the current tax plan. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Filing status is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Children below 6 years of age</strong> is a plain number. It is worked out from Kids and Children between 6 and 17. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Children between 6 and 17</strong> is a plain number. It is worked out from Kids and Children below 6 years of age. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Your income tax under the current tax plan</strong> is a plain number. It is worked out from Annual income (AGI) and Filing status. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Your income tax paid under Biden&#039;s tax plan</strong> is a plain number. It is worked out from Annual income (AGI) and Filing status. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Effective tax rate under the current tax plan</strong> is a percent figure. It is worked out from Annual income (AGI) and Filing status. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Effective tax rate under Biden&#039;s tax plan</strong> is a percent figure. It is worked out from Annual income (AGI) and Filing status. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Kids</strong> is a plain number. It is worked out from Children between 6 and 17 and Children below 6 years of age. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Biden&#039;s Tax Plan actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Children below 6 years of age is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Annual income (AGI) and Filing status are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Annual income (AGI) and Filing status and the number you are missing is Children below 6 years of age and Children between 6 and 17.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/price-to-earnings">Price/earnings ratio</a>, <a href="/finance/private-savings">Private savings Calculator</a> and <a href="/finance/productivity">Productivity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Biden\'s Tax Plan calculator work out?', 'a' => <<<'TXT'
            Children below 6 years of age, Children between 6 and 17, Your income tax under the current tax plan and Your income tax paid under Biden's tax plan, from Annual income (AGI) and Filing status. The relationship is Your income tax under the current tax plan = taxBracketFunction(Annual income (AGI), Filing status).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Annual income (AGI), Filing status. With annual income (AGI) and filing status in place, Children below 6 years of age can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Your income tax under the current tax plan, Your income tax paid under Biden's tax plan, Effective tax rate under the current tax plan and Effective tax rate under Biden's tax plan can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Children below 6 years of age is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Annual income (AGI) blank and the page solves for it, reporting Children below 6 years of age instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Children below 6 years of age at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/price-to-earnings', 'name' => 'Price/earnings ratio'],
            ['path' => '/finance/private-savings', 'name' => 'Private savings Calculator'],
            ['path' => '/finance/productivity', 'name' => 'Productivity Calculator'],
        ],
        'authors' => [],
    ],
];
