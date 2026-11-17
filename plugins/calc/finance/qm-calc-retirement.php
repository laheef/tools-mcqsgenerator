<?php

/**
 * Retirement
 * /finance/retirement
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Retirement',
    'meta' => ['title' => 'Retirement Calculator — Formula, Units & Example', 'description' => 'Retirement turns sex and current age into total savings. Each box lists the units it accepts, and the answer converts between them. The answer is shown in USD.', 'h1' => 'Retirement Calculator', 'updated' => '2026-09-01'],
    'sections' => [
        [
            'title' => 'About you',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gender',
                            'label' => 'Sex',
                            'type' => 'select',
                            'options' => ['Female' => '0', 'Male' => '1'],
                            'dataset' => 'gender',
                            'default' => 'Female',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Current_age',
                            'label' => 'Current age',
                            'type' => 'number',
                            'suffix' => 'years old',
                            'help' => 'How old are you?',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Country',
                            'label' => 'Country',
                            'type' => 'select',
                            'options' => [
                                'Albania' => '2203166658',
                                'Argentina' => '2412994423',
                                'Armenia' => '787304567',
                                'Australia' => '1019173181',
                                'Austria' => '2786339452',
                                'Belarus' => '1177218511',
                                'Belgium' => '3894766368',
                                'Bosnia and Herzegovina' => '2157092259',
                                'Brazil' => '4100579281',
                                'Bulgaria' => '1378678533',
                                'Canada' => '1430566107',
                                'Chile' => '617212634',
                                'China' => '768520064',
                                'Colombia' => '3894056974',
                                'Croatia' => '2863954610',
                                'Cuba' => '4179481812',
                                'Czech Republic' => '808603622',
                                'Denmark' => '1090236803',
                                'Egypt' => '2294417747',
                                'Estonia' => '2128769817',
                                'Finland' => '853666462',
                                'France' => '215644117',
                                'Georgia' => '761141417',
                                'Germany' => '213102807',
                                'Greece' => '3178481368',
                                'Hungary' => '3138051961',
                                'Iceland' => '2277781415',
                                'India' => '1735783178',
                                'Indonesia' => '814830780',
                                'Iran' => '3501040340',
                                'Ireland' => '1831876264',
                                'Israel' => '3899279246',
                                'Italy' => '2619695570',
                                'Japan' => '3568368630',
                                'Kazakhstan' => '1446389462',
                                'Latvia' => '3488256363',
                                'Lithuania' => '590624262',
                                'Luxembourg' => '436905950',
                                'Malaysia' => '3570986030',
                                'Mexico' => '3507421953',
                                'Moldova' => '2652389678',
                                'Morocco' => '3375427498',
                                'Nepal' => '4273764639',
                                'Netherlands' => '2703273775',
                                'New Zealand' => '1117906897',
                                'Norway' => '2155990396',
                                'Pakistan' => '3398147119',
                                'Peru' => '3485678493',
                                'Philippines' => '464566939',
                                'Poland' => '1245824606',
                                'Portugal' => '2420030196',
                                'Romania' => '3701749363',
                                'Russia' => '244358064',
                                'Saudi Arabia' => '3860373283',
                                'Serbia' => '1646806318',
                                'Singapore' => '567672185',
                                'Slovakia' => '2934109446',
                                'Slovenia' => '443643904',
                                'South Korea' => '3980812958',
                                'Spain' => '3069872995',
                                'Sri Lanka' => '3122973309',
                                'Sweden' => '2120086360',
                                'Switzerland' => '2384223752',
                                'Thailand' => '61001943',
                                'Tunisia' => '533670284',
                                'Turkey' => '2535281878',
                                'Ukraine' => '3685946395',
                                'United Arab Emirates' => '1289802680',
                                'United Kingdom' => '3559672723',
                                'United States' => '1028548964',
                                'Uzbekistan' => '2881510113',
                                'Venezuela' => '330903878',
                                'Vietnam' => '1324612602',
                                'Input custom data' => '0',
                            ],
                            'dataset' => 'value_setter_data',
                            'control' => 'DROPDOWN',
                            'help' => 'Select your country or choose \'Input custom data\' at the bottom of the list to enter different values.',
                            'default' => 'United States',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Retirement_age',
                            'label' => 'Retirement age',
                            'type' => 'result',
                            'suffix' => 'years old',
                            'help' => 'Retirement age in the country selected. To input a different value, choose \'Input custom data\' at the bottom of the country list.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Retirement_age2',
                            'label' => 'Retirement age',
                            'type' => 'result',
                            'suffix' => 'years old',
                            'help' => 'Retirement age in the country selected. To input a different value, choose \'Input custom data\' at the bottom of the country list.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Life_expectancy',
                            'label' => 'Life expectancy',
                            'type' => 'result',
                            'suffix' => 'years old',
                            'help' => 'Statistical length of life in your chosen country. To input a different value, choose \'Input custom data\' at the bottom of the country list.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Life_expectancy2',
                            'label' => 'Life expectancy',
                            'type' => 'result',
                            'suffix' => 'years old',
                            'help' => 'Statistical length of life in your chosen country. To input a different value, choose \'Input custom data\' at the bottom of the country list.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Your savings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Savings_amount',
                            'label' => 'Savings amount',
                            'type' => 'number',
                            'help' => 'The amount you wish to save regularly.',
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
                            'name' => 'Savings_sofar',
                            'label' => 'Amount already saved',
                            'type' => 'number',
                            'help' => 'The money you\'ve already set aside.',
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
                            'name' => 'Investment_rate',
                            'label' => 'Investment rate',
                            'type' => 'number',
                            'help' => 'The rate at which you will earn interest on your savings, compounded annually.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                            'default' => '7',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Total_savings',
                            'label' => 'Total savings',
                            'type' => 'number',
                            'help' => 'Money you will save from now until retirement.',
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
                            'name' => 'Total_savings2',
                            'label' => 'Total savings',
                            'type' => 'number',
                            'help' => 'Money you will save from now until retirement.',
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
            'title' => 'Your retirement money',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Retirement_fund',
                            'label' => 'Government pension',
                            'type' => 'number',
                            'help' => 'Money assistance you will get from the government once you retire.',
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
                            'name' => 'Retirement_own',
                            'label' => 'Retirement income from savings',
                            'type' => 'number',
                            'help' => 'Money you get each month from your savings.',
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
                            'name' => 'Retirement_own2',
                            'label' => 'Retirement income from savings',
                            'type' => 'number',
                            'help' => 'Money you get each month from your savings.',
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
                            'name' => 'Retirement_salary',
                            'label' => 'Total retirement income',
                            'type' => 'number',
                            'help' => 'Your total money each month upon retirement.',
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
                            'name' => 'Retirement_salary2',
                            'label' => 'Total retirement income',
                            'type' => 'number',
                            'help' => 'Your total money each month upon retirement.',
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
                            'name' => 'Monthly_income',
                            'label' => 'Cost of living',
                            'type' => 'number',
                            'help' => 'How much money do you need?',
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
                            'name' => 'Percentage',
                            'label' => 'Budget percentage',
                            'type' => 'number',
                            'help' => 'What percentage of your total retirement income is the cost of living?',
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
                            'name' => 'Percentage2',
                            'label' => 'Budget percentage',
                            'type' => 'number',
                            'help' => 'What percentage of your total retirement income is the cost of living?',
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
                            'name' => 'Money_left',
                            'label' => 'Money left',
                            'type' => 'number',
                            'help' => 'Money left after deducting the cost of living',
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
                            'name' => 'Money_left2',
                            'label' => 'Money left',
                            'type' => 'number',
                            'help' => 'Money left after deducting the cost of living',
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
            'title' => 'Hidden',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'life_expectancy_ph',
                            'label' => 'Life expectancy ph',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'retirement_age_ph',
                            'label' => 'Retirement age ph',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'retirement_age_2_ph',
                            'label' => 'Retirement age 2 ph',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'life_expectancy_2_ph',
                            'label' => 'Life expectancy 2 ph',
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
            'title' => <<<'TXT'
            Total_savings = Savings_sofar * (1+Investment_rate)^(Retirement_age - Current_age)+Savings_amount * (((1+Investment_rate)^(Retirement_age - Current_age)-1)/Investment_rate)
            TXT,
            'results' => [
                'Savings_amount' => <<<'TXT'
                Investment_rate*(Savings_sofar*pow(Investment_rate + 1, -Current_age + Retirement_age) - Total_savings)/(1 - pow(Investment_rate + 1, -Current_age + Retirement_age))
                TXT,
                'Current_age' => <<<'TXT'
                log((Investment_rate*Savings_sofar + Savings_amount)*exp(Retirement_age*log(Investment_rate + 1))/(Investment_rate*Total_savings + Savings_amount))/log(Investment_rate + 1)
                TXT,
                'Retirement_age' => <<<'TXT'
                log((Investment_rate*Total_savings + Savings_amount)*exp(Current_age*log(Investment_rate + 1))/(Investment_rate*Savings_sofar + Savings_amount))/log(Investment_rate + 1)
                TXT,
                'Total_savings' => <<<'TXT'
                (Investment_rate*Savings_sofar*pow(Investment_rate + 1, -Current_age + Retirement_age) + Savings_amount*pow(Investment_rate + 1, -Current_age + Retirement_age) - Savings_amount)/Investment_rate
                TXT,
                'Savings_sofar' => <<<'TXT'
                (Investment_rate*Total_savings*pow(Investment_rate + 1, Current_age - Retirement_age) + Savings_amount*pow(Investment_rate + 1, Current_age - Retirement_age) - Savings_amount)/Investment_rate
                TXT,
            ],
        ],
        [
            'title' => 'Retirement_salary  = Investment_rate * Total_savings / (1- (1+Investment_rate)^(Retirement_age - Life_expectancy))+ Retirement_fund',
            'results' => [
                'Retirement_fund' => <<<'TXT'
                (Investment_rate*Total_savings + Retirement_salary*pow(Investment_rate + 1, -Life_expectancy + Retirement_age) - Retirement_salary)/(pow(Investment_rate + 1, -Life_expectancy + Retirement_age) - 1)
                TXT,
                'Retirement_salary' => <<<'TXT'
                (Investment_rate*Total_savings - Retirement_fund*pow(Investment_rate + 1, -Life_expectancy + Retirement_age) + Retirement_fund)/(1 - pow(Investment_rate + 1, -Life_expectancy + Retirement_age))
                TXT,
                'Retirement_age' => <<<'TXT'
                log((Investment_rate*Total_savings + Retirement_fund - Retirement_salary)*exp(Life_expectancy*log(Investment_rate + 1))/(Retirement_fund - Retirement_salary))/log(Investment_rate + 1)
                TXT,
                'Life_expectancy' => <<<'TXT'
                log((Retirement_fund - Retirement_salary)*exp(Retirement_age*log(Investment_rate + 1))/(Investment_rate*Total_savings + Retirement_fund - Retirement_salary))/log(Investment_rate + 1)
                TXT,
                'Total_savings' => <<<'TXT'
                (Retirement_fund*pow(Investment_rate + 1, -Life_expectancy + Retirement_age) - Retirement_fund - Retirement_salary*pow(Investment_rate + 1, -Life_expectancy + Retirement_age) + Retirement_salary)/Investment_rate
                TXT,
            ],
        ],
        [
            'title' => 'Percentage = Monthly_income / Retirement_salary * 100',
            'results' => ['Monthly_income' => '(1/100)*Percentage*Retirement_salary', 'Retirement_salary' => '100*Monthly_income/Percentage', 'Percentage' => '100*Monthly_income/Retirement_salary'],
        ],
        [
            'title' => 'Money_left = Retirement_salary - Monthly_income',
            'results' => ['Monthly_income' => '-Money_left + Retirement_salary', 'Retirement_salary' => 'Money_left + Monthly_income', 'Money_left' => '-Monthly_income + Retirement_salary'],
        ],
        [
            'title' => 'Retirement_own  = Investment_rate * Total_savings / (1- (1+Investment_rate)^(Retirement_age - Life_expectancy))',
            'results' => ['Retirement_own' => '-Investment_rate*Total_savings/(pow(Investment_rate + 1, -Life_expectancy + Retirement_age) - 1)', 'Retirement_age' => 'log((-Investment_rate*Total_savings + Retirement_own)*exp(Life_expectancy*log(Investment_rate + 1))/Retirement_own)/log(Investment_rate + 1)', 'Life_expectancy' => 'log(-Retirement_own*exp(Retirement_age*log(Investment_rate + 1))/(Investment_rate*Total_savings - Retirement_own))/log(Investment_rate + 1)', 'Total_savings' => 'Retirement_own*(1 - pow(Investment_rate + 1, -Life_expectancy + Retirement_age))/Investment_rate'],
        ],
        [
            'title' => <<<'TXT'
            Total_savings2 = Savings_sofar * (1+Investment_rate)^(Retirement_age2 - Current_age)+Savings_amount * (((1+Investment_rate)^(Retirement_age2 - Current_age)-1)/Investment_rate)
            TXT,
            'results' => [
                'Total_savings2' => <<<'TXT'
                (Investment_rate*Savings_sofar*pow(Investment_rate + 1, -Current_age + Retirement_age2) + Savings_amount*pow(Investment_rate + 1, -Current_age + Retirement_age2) - Savings_amount)/Investment_rate
                TXT,
                'Savings_amount' => <<<'TXT'
                Investment_rate*(Savings_sofar*pow(Investment_rate + 1, -Current_age + Retirement_age2) - Total_savings2)/(1 - pow(Investment_rate + 1, -Current_age + Retirement_age2))
                TXT,
                'Current_age' => <<<'TXT'
                log((Investment_rate*Savings_sofar + Savings_amount)*exp(Retirement_age2*log(Investment_rate + 1))/(Investment_rate*Total_savings2 + Savings_amount))/log(Investment_rate + 1)
                TXT,
                'Retirement_age2' => <<<'TXT'
                log((Investment_rate*Total_savings2 + Savings_amount)*exp(Current_age*log(Investment_rate + 1))/(Investment_rate*Savings_sofar + Savings_amount))/log(Investment_rate + 1)
                TXT,
                'Savings_sofar' => <<<'TXT'
                (Investment_rate*Total_savings2*pow(Investment_rate + 1, Current_age - Retirement_age2) + Savings_amount*pow(Investment_rate + 1, Current_age - Retirement_age2) - Savings_amount)/Investment_rate
                TXT,
            ],
        ],
        [
            'title' => 'Retirement_salary2  = Investment_rate * Total_savings2 / (1- (1+Investment_rate)^(Retirement_age2 - Life_expectancy2))+ Retirement_fund',
            'results' => [
                'Retirement_fund' => <<<'TXT'
                (Investment_rate*Total_savings2 + Retirement_salary2*pow(Investment_rate + 1, -Life_expectancy2 + Retirement_age2) - Retirement_salary2)/(pow(Investment_rate + 1, -Life_expectancy2 + Retirement_age2) - 1)
                TXT,
                'Life_expectancy2' => <<<'TXT'
                log((Retirement_fund - Retirement_salary2)*exp(Retirement_age2*log(Investment_rate + 1))/(Investment_rate*Total_savings2 + Retirement_fund - Retirement_salary2))/log(Investment_rate + 1)
                TXT,
                'Total_savings2' => <<<'TXT'
                (Retirement_fund*pow(Investment_rate + 1, -Life_expectancy2 + Retirement_age2) - Retirement_fund - Retirement_salary2*pow(Investment_rate + 1, -Life_expectancy2 + Retirement_age2) + Retirement_salary2)/Investment_rate
                TXT,
                'Retirement_salary2' => <<<'TXT'
                (Investment_rate*Total_savings2 - Retirement_fund*pow(Investment_rate + 1, -Life_expectancy2 + Retirement_age2) + Retirement_fund)/(1 - pow(Investment_rate + 1, -Life_expectancy2 + Retirement_age2))
                TXT,
                'Retirement_age2' => <<<'TXT'
                log((Investment_rate*Total_savings2 + Retirement_fund - Retirement_salary2)*exp(Life_expectancy2*log(Investment_rate + 1))/(Retirement_fund - Retirement_salary2))/log(Investment_rate + 1)
                TXT,
            ],
        ],
        [
            'title' => 'Money_left2 = Retirement_salary2 - Monthly_income',
            'results' => ['Money_left2' => '-Monthly_income + Retirement_salary2', 'Retirement_salary2' => 'Money_left2 + Monthly_income', 'Monthly_income' => '-Money_left2 + Retirement_salary2'],
        ],
        [
            'title' => 'Retirement_own2  = Investment_rate * Total_savings2 / (1- (1+Investment_rate)^(Retirement_age2 - Life_expectancy2))',
            'results' => ['Total_savings2' => 'Retirement_own2*(1 - pow(Investment_rate + 1, -Life_expectancy2 + Retirement_age2))/Investment_rate', 'Life_expectancy2' => 'log(-Retirement_own2*exp(Retirement_age2*log(Investment_rate + 1))/(Investment_rate*Total_savings2 - Retirement_own2))/log(Investment_rate + 1)', 'Retirement_own2' => '-Investment_rate*Total_savings2/(pow(Investment_rate + 1, -Life_expectancy2 + Retirement_age2) - 1)', 'Retirement_age2' => 'log((-Investment_rate*Total_savings2 + Retirement_own2)*exp(Life_expectancy2*log(Investment_rate + 1))/Retirement_own2)/log(Investment_rate + 1)'],
        ],
        [
            'title' => 'Percentage2 = Monthly_income / Retirement_salary2 * 100',
            'results' => ['Monthly_income' => '(1/100)*Percentage2*Retirement_salary2', 'Retirement_salary2' => '100*Monthly_income/Percentage2', 'Percentage2' => '100*Monthly_income/Retirement_salary2'],
        ],
        [
            'title' => 'retirement_age_ph = Retirement_age',
            'results' => ['Retirement_age' => 'retirement_age_ph', 'retirement_age_ph' => 'Retirement_age'],
        ],
        [
            'title' => 'retirement_age_2_ph = Retirement_age2',
            'results' => ['retirement_age_2_ph' => 'Retirement_age2', 'Retirement_age2' => 'retirement_age_2_ph'],
        ],
        [
            'title' => 'life_expectancy_ph =  Life_expectancy',
            'results' => ['Life_expectancy' => 'life_expectancy_ph', 'life_expectancy_ph' => 'Life_expectancy'],
        ],
        [
            'title' => 'life_expectancy_2_ph =  Life_expectancy2',
            'results' => ['life_expectancy_2_ph' => 'Life_expectancy2', 'Life_expectancy2' => 'life_expectancy_2_ph'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Retirement turns Sex, Current age and Country into Retirement age and Retirement age. Nothing is looked up on this page: retirement age is computed from sex and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Retirement age is opened in years old; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Retirement calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Retirement: it takes 18 numbers and reports Retirement age, Retirement age and Life expectancy.</p><p>The relationship it solves reads Total savings = (Investment rate × Amount already saved × (Investment rate + 1)^(− Current age + Retirement age) + Savings amount × (Investment rate + 1)^(− Current age + Retirement age) − Savings amount) ÷ Investment rate.</p><p>What comes back is Retirement age, Retirement age, Life expectancy and Life expectancy — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 18 boxes, and nothing else.</p><ul><li><strong>Sex</strong> — a plain number, no unit</li><li><strong>Current age</strong> — in years old. How old are you?</li><li><strong>Country</strong> — a plain number, no unit. Select your country or choose &#039;Input custom data&#039; at the bottom of the list to enter different values.</li><li><strong>Savings amount</strong> — in USD. The amount you wish to save regularly.</li><li><strong>Amount already saved</strong> — in USD. The money you&#039;ve already set aside.</li><li><strong>Investment rate</strong> — in percent. The rate at which you will earn interest on your savings, compounded annually.</li><li><strong>Total savings</strong> — in USD. Money you will save from now until retirement.</li><li><strong>Total savings</strong> — in USD. Money you will save from now until retirement.</li><li><strong>Government pension</strong> — in USD. Money assistance you will get from the government once you retire.</li><li><strong>Retirement income from savings</strong> — in USD. Money you get each month from your savings.</li><li><strong>Retirement income from savings</strong> — in USD. Money you get each month from your savings.</li><li><strong>Total retirement income</strong> — in USD. Your total money each month upon retirement.</li><li><strong>Total retirement income</strong> — in USD. Your total money each month upon retirement.</li><li><strong>Cost of living</strong> — in USD. How much money do you need?</li><li><strong>Budget percentage</strong> — in percent. What percentage of your total retirement income is the cost of living?</li><li><strong>Budget percentage</strong> — in percent. What percentage of your total retirement income is the cost of living?</li><li><strong>Money left</strong> — in USD. Money left after deducting the cost of living</li><li><strong>Money left</strong> — in USD. Money left after deducting the cost of living</li></ul><p>The answers come back as Retirement age in years old, Retirement age in years old, Life expectancy in years old, Life expectancy in years old. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Sex = 0, Country = 1.029e+9 and Investment rate = 7 perc gives <strong>Retirement age ph</strong> = 0, <strong>Retirement age 2 ph</strong> = 0, <strong>Life expectancy ph</strong> = 0 and <strong>Life expectancy 2 ph</strong> = 0.</p><ul><li><strong>Retirement age ph</strong> = 0</li><li><strong>Retirement age 2 ph</strong> = 0</li><li><strong>Life expectancy ph</strong> = 0</li><li><strong>Life expectancy 2 ph</strong> = 0</li></ul><p>That is <strong>Total savings</strong> = <code>(Investment rate × Amount already saved × (Investment rate + 1)^(− Current age + Retirement age) + Savings amount × (Investment rate + 1)^(− Current age + Retirement age) − Savings amount) ÷ Investment rate</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Retirement age ph</strong> = 0, <strong>Retirement age 2 ph</strong> = 0, <strong>Life expectancy ph</strong> = 0 and <strong>Life expectancy 2 ph</strong> = 0 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Investment rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total savings</strong> = <code>(Investment rate × Amount already saved × (Investment rate + 1)^(− Current age + Retirement age) + Savings amount × (Investment rate + 1)^(− Current age + Retirement age) − Savings amount) ÷ Investment rate</code></li><li><strong>Savings amount</strong> = <code>Investment rate × (Amount already saved × (Investment rate + 1)^(− Current age + Retirement age) − Total savings) ÷ (1 − (Investment rate + 1)^(− Current age + Retirement age))</code></li><li><strong>Current age</strong> = <code>ln((Investment rate × Amount already saved + Savings amount) × e^(Retirement age × ln(Investment rate + 1)) ÷ (Investment rate × Total savings + Savings amount)) ÷ ln(Investment rate + 1)</code></li><li><strong>Retirement age</strong> = <code>ln((Investment rate × Total savings + Savings amount) × e^(Current age × ln(Investment rate + 1)) ÷ (Investment rate × Amount already saved + Savings amount)) ÷ ln(Investment rate + 1)</code></li><li><strong>Amount already saved</strong> = <code>(Investment rate × Total savings × (Investment rate + 1)^(Current age − Retirement age) + Savings amount × (Investment rate + 1)^(Current age − Retirement age) − Savings amount) ÷ Investment rate</code></li><li><strong>Total retirement income</strong> = <code>(Investment rate × Total savings − Government pension × (Investment rate + 1)^(− Life expectancy + Retirement age) + Government pension) ÷ (1 − (Investment rate + 1)^(− Life expectancy + Retirement age))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total savings</strong> = <code>(Investment rate × Amount already saved × (Investment rate + 1)^(− Current age + Retirement age) + Savings amount × (Investment rate + 1)^(− Current age + Retirement age) − Savings amount) ÷ Investment rate</code> — the form to use when Investment rate, Amount already saved, Current age and Retirement age are the values you have.</li><li><strong>Savings amount</strong> = <code>Investment rate × (Amount already saved × (Investment rate + 1)^(− Current age + Retirement age) − Total savings) ÷ (1 − (Investment rate + 1)^(− Current age + Retirement age))</code> — the form to use when Investment rate, Amount already saved, Current age and Retirement age are the values you have.</li><li><strong>Current age</strong> = <code>ln((Investment rate × Amount already saved + Savings amount) × e^(Retirement age × ln(Investment rate + 1)) ÷ (Investment rate × Total savings + Savings amount)) ÷ ln(Investment rate + 1)</code> — the form to use when Investment rate, Amount already saved, Savings amount and Retirement age are the values you have.</li><li><strong>Retirement age</strong> = <code>ln((Investment rate × Total savings + Savings amount) × e^(Current age × ln(Investment rate + 1)) ÷ (Investment rate × Amount already saved + Savings amount)) ÷ ln(Investment rate + 1)</code> — the form to use when Investment rate, Total savings, Savings amount and Current age are the values you have.</li><li><strong>Amount already saved</strong> = <code>(Investment rate × Total savings × (Investment rate + 1)^(Current age − Retirement age) + Savings amount × (Investment rate + 1)^(Current age − Retirement age) − Savings amount) ÷ Investment rate</code> — the form to use when Investment rate, Total savings, Current age and Retirement age are the values you have.</li><li><strong>Total retirement income</strong> = <code>(Investment rate × Total savings − Government pension × (Investment rate + 1)^(− Life expectancy + Retirement age) + Government pension) ÷ (1 − (Investment rate + 1)^(− Life expectancy + Retirement age))</code> — the form to use when Investment rate, Total savings, Government pension and Life expectancy are the values you have.</li><li><strong>Government pension</strong> = <code>(Investment rate × Total savings + Total retirement income × (Investment rate + 1)^(− Life expectancy + Retirement age) − Total retirement income) ÷ ((Investment rate + 1)^(− Life expectancy + Retirement age) − 1)</code> — the form to use when Investment rate, Total savings, Total retirement income and Life expectancy are the values you have.</li><li><strong>Retirement age</strong> = <code>ln((Investment rate × Total savings + Government pension − Total retirement income) × e^(Life expectancy × ln(Investment rate + 1)) ÷ (Government pension − Total retirement income)) ÷ ln(Investment rate + 1)</code> — the form to use when Investment rate, Total savings, Government pension and Total retirement income are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total savings, Savings amount and Current age can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Investment rate, Budget percentage and Budget percentage is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Retirement age, Retirement age and Life expectancy are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Sex left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Sex is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Current age left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Current age is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Sex to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Retirement age is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Sex, Current age and Country is what you already know and Retirement age and Retirement age is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/business-loan">Business loan Calculator</a>, <a href="/finance/business-valuation">Business valuation Calculator</a> and <a href="/finance/buying-power">Buying power Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Retirement is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Sex, Current age, Country and Savings amount beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Retirement calculator work out?', 'a' => <<<'TXT'
            Retirement age, Retirement age, Life expectancy and Life expectancy, from Investment rate, Amount already saved, Current age and Retirement age. The relationship is Total savings = (Investment rate × Amount already saved × (Investment rate + 1)^(− Current age + Retirement age) + Savings amount × (Investment rate + 1)^(− Current age + Retirement age) − Savings amount) ÷ Investment rate.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Sex, Current age (years old), Country, Savings amount (USD), Amount already saved (USD). Enter sex, current age and country; Retirement age is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Total savings, Savings amount, Current age and Retirement age can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Retirement age ph = 0, Retirement age 2 ph = 0, Life expectancy ph = 0 and Life expectancy 2 ph = 0. Those are the defaults written into the form — move Sex and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Retirement age is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Sex left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Retirement age at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/business-loan', 'name' => 'Business loan Calculator'],
            ['path' => '/finance/business-valuation', 'name' => 'Business valuation Calculator'],
            ['path' => '/finance/buying-power', 'name' => 'Buying power Calculator'],
        ],
        'authors' => [],
    ],
];
