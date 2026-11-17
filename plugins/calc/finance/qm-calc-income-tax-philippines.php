<?php

/**
 * Income tax Philippines
 * /finance/income-tax-philippines
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Income tax Philippines',
    'meta' => ['title' => 'Income tax Philippines: Formula, Steps & Results', 'description' => 'Income tax Philippines turns employment status and monthly income into SSS and PhilHealth. Every box can be solved for, not only the one in the title.', 'h1' => 'Income tax Philippines Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Salary overview',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employmentStatus',
                            'label' => 'Employment status',
                            'type' => 'select',
                            'options' => ['Employed' => '1', 'Self-employed' => '0'],
                            'defaults' => [
                                ['value' => 'Employed', 'when' => null],
                                ['value' => 'Employed', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthlyIncome',
                            'label' => 'Monthly income',
                            'type' => 'number',
                            'prefix' => '₱',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Contributions for employed individuals',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'SSS',
                            'label' => 'SSS',
                            'type' => 'number',
                            'prefix' => '₱',
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
                            'name' => 'PhilHealth',
                            'label' => 'PhilHealth',
                            'type' => 'number',
                            'prefix' => '₱',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PagIBIG',
                            'label' => 'PagIBIG',
                            'type' => 'number',
                            'prefix' => '₱',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalContributions',
                            'label' => 'Total contributions',
                            'type' => 'number',
                            'prefix' => '₱',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Contributions for self-employed individuals',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'SSSselfEmployed',
                            'label' => 'SSS',
                            'type' => 'number',
                            'prefix' => '₱',
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
                            'name' => 'PhilHealthSelfEmployed',
                            'label' => 'PhilHealth',
                            'type' => 'number',
                            'prefix' => '₱',
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
                            'name' => 'PagIBIGSelfEmployed',
                            'label' => 'PagIBIG',
                            'type' => 'number',
                            'prefix' => '₱',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalContributionsSelfEmployed',
                            'label' => 'Total contributions',
                            'type' => 'number',
                            'prefix' => '₱',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Deductions and tax expenses',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'taxableIncome',
                            'label' => 'Taxable income',
                            'type' => 'number',
                            'prefix' => '₱',
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
                            'name' => 'withholdingTax',
                            'label' => 'Withholding tax',
                            'type' => 'number',
                            'prefix' => '₱',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'netPayAfterTax',
                            'label' => 'Net pay after tax',
                            'type' => 'number',
                            'prefix' => '₱',
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
                            'name' => 'totalDeductions',
                            'label' => 'Total deductions',
                            'type' => 'number',
                            'prefix' => '₱',
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
                            'name' => 'netPayAfterDeductions',
                            'label' => 'Net pay after deductions',
                            'type' => 'number',
                            'prefix' => '₱',
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
                            'name' => 'taxableIncomeSelfEmployed',
                            'label' => 'Taxable income',
                            'type' => 'number',
                            'prefix' => '₱',
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
                            'name' => 'withholdingTaxSelfEmployed',
                            'label' => 'Withholding tax',
                            'type' => 'number',
                            'prefix' => '₱',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'netPayAfterTaxSelfEmployed',
                            'label' => 'Net pay after tax',
                            'type' => 'number',
                            'prefix' => '₱',
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
                            'name' => 'totalDeductionsSelfEmployed',
                            'label' => 'Total deductions self employed',
                            'type' => 'number',
                            'prefix' => '₱',
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
                            'name' => 'netPayAfterDeductionsSelfEmployed',
                            'label' => 'Net pay after deductions self employed',
                            'type' => 'number',
                            'prefix' => '₱',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables',
            'note' => 'Used to update the tool in the future easily',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year',
                            'label' => 'Year',
                            'type' => 'select',
                            'options' => [
                                '2021' => '1',
                                '2022' => '2',
                                '2023' => '3',
                                '2024' => '4',
                                '2025' => '5',
                            ],
                            'dataset' => 'Year data',
                            'control' => 'DROPDOWN',
                            'default' => '2024',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employeeMSCpercentage',
                            'label' => 'Employee MSC percentage',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'individualMSCpercentage',
                            'label' => 'Individual MSC percentage',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maxMonthlyPremium',
                            'label' => 'Max monthly premium',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'premiumRate',
                            'label' => 'Premium rate',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'boundary',
                            'label' => 'Boundary',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'SSS = MSC(monthlyIncome) * employeeMSCpercentage',
            'results' => ['employeeMSCpercentage' => 'SSS/MSC(monthlyIncome)', 'SSS' => 'employeeMSCpercentage*MSC(monthlyIncome)'],
        ],
        [
            'title' => 'SSSselfEmployed = MSC(monthlyIncome) * individualMSCpercentage + get_EC(monthlyIncome)',
            'results' => ['SSSselfEmployed' => 'individualMSCpercentage*MSC(monthlyIncome) + get_EC(monthlyIncome)', 'individualMSCpercentage' => '(SSSselfEmployed - get_EC(monthlyIncome))/MSC(monthlyIncome)'],
        ],
        [
            'title' => <<<'TXT'
            PhilHealth = ((monthlyIncome * premiumRate) * (2 - get_PhilHealth(monthlyIncome)) + maxMonthlyPremium * abs(1 - get_PhilHealth(monthlyIncome)) * ceil(get_PhilHealth(monthlyIncome) / 10000) + (premiumRate * 10000) * (1 - ceil(get_PhilHealth(monthlyIncome) / 10000))) / 2
            TXT,
            'results' => ['PhilHealth' => <<<'TXT'
            (1/2)*maxMonthlyPremium*ceil((1/10000)*get_PhilHealth(monthlyIncome))*abs(get_PhilHealth(monthlyIncome) - 1) - 1/2*monthlyIncome*premiumRate*get_PhilHealth(monthlyIncome) + monthlyIncome*premiumRate - 5000*premiumRate*ceil((1/10000)*get_PhilHealth(monthlyIncome)) + 5000*premiumRate
            TXT, 'premiumRate' => <<<'TXT'
            (-2*PhilHealth + maxMonthlyPremium*ceil((1/10000)*get_PhilHealth(monthlyIncome))*abs(get_PhilHealth(monthlyIncome) - 1))/(monthlyIncome*get_PhilHealth(monthlyIncome) - 2*monthlyIncome + 10000*ceil((1/10000)*get_PhilHealth(monthlyIncome)) - 10000)
            TXT, 'maxMonthlyPremium' => <<<'TXT'
            (2*PhilHealth + monthlyIncome*premiumRate*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate + 10000*premiumRate*ceil((1/10000)*get_PhilHealth(monthlyIncome)) - 10000*premiumRate)/(ceil((1/10000)*get_PhilHealth(monthlyIncome))*abs(get_PhilHealth(monthlyIncome) - 1))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            PhilHealthSelfEmployed = ((monthlyIncome * premiumRate) * (2 - get_PhilHealth(monthlyIncome)) + maxMonthlyPremium * abs(1 - get_PhilHealthSelfEmployed(monthlyIncome)) * ceil(get_PhilHealthSelfEmployed(monthlyIncome) / 10000) + (premiumRate * 10000) * (1 - ceil(get_PhilHealthSelfEmployed(monthlyIncome) / 10000)))
            TXT,
            'results' => ['PhilHealthSelfEmployed' => <<<'TXT'
            maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) - monthlyIncome*premiumRate*get_PhilHealth(monthlyIncome) + 2*monthlyIncome*premiumRate - 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + 10000*premiumRate
            TXT, 'premiumRate' => <<<'TXT'
            (-PhilHealthSelfEmployed + maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1))/(monthlyIncome*get_PhilHealth(monthlyIncome) - 2*monthlyIncome + 10000*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000)
            TXT, 'maxMonthlyPremium' => <<<'TXT'
            (PhilHealthSelfEmployed + monthlyIncome*premiumRate*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate)/(ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            PagIBIG = monthlyIncome * get_PagIBIG(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))
            TXT,
            'results' => ['PagIBIG' => <<<'TXT'
            -monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIG(monthlyIncome) + monthlyIncome*get_PagIBIG(monthlyIncome) + 100*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            PagIBIGSelfEmployed = (monthlyIncome * get_PagIBIGSelfEmployed(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + (monthlyIncome * get_PagIBIGEmployer(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000)))
            TXT,
            'results' => ['PagIBIGSelfEmployed' => <<<'TXT'
            -monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            totalContributions = SSS + PhilHealth + (monthlyIncome * get_PagIBIG(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000)))
            TXT,
            'results' => ['totalContributions' => <<<'TXT'
            PhilHealth + SSS - monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIG(monthlyIncome) + monthlyIncome*get_PagIBIG(monthlyIncome) + 100*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)
            TXT, 'SSS' => <<<'TXT'
            -PhilHealth + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIG(monthlyIncome) - monthlyIncome*get_PagIBIG(monthlyIncome) + totalContributions - 100*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)
            TXT, 'PhilHealth' => <<<'TXT'
            -SSS + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIG(monthlyIncome) - monthlyIncome*get_PagIBIG(monthlyIncome) + totalContributions - 100*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            totalContributionsSelfEmployed = ((MSC(monthlyIncome) * individualMSCpercentage + get_EC(monthlyIncome)))+ ((((monthlyIncome * premiumRate) * (2 - get_PhilHealth(monthlyIncome)) + maxMonthlyPremium * abs(1 - get_PhilHealthSelfEmployed(monthlyIncome))) * ceil(get_PhilHealthSelfEmployed(monthlyIncome) / 10000) + (premiumRate * 10000) * (1 - ceil(get_PhilHealthSelfEmployed(monthlyIncome) / 10000))))+ ((monthlyIncome * get_PagIBIGSelfEmployed(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + (monthlyIncome * get_PagIBIGEmployer(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))))
            TXT,
            'results' => ['maxMonthlyPremium' => <<<'TXT'
            (-individualMSCpercentage*MSC(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + premiumRate*(monthlyIncome*get_PhilHealth(monthlyIncome) - 2*monthlyIncome + 10000)*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate + totalContributionsSelfEmployed - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome))/(ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1))
            TXT, 'totalContributionsSelfEmployed' => <<<'TXT'
            individualMSCpercentage*MSC(monthlyIncome) + maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) - monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) + 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) - 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + 10000*premiumRate + 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) + get_EC(monthlyIncome)
            TXT, 'premiumRate' => <<<'TXT'
            (individualMSCpercentage*MSC(monthlyIncome) + maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) - monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) - totalContributionsSelfEmployed + 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) + get_EC(monthlyIncome))/(monthlyIncome*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + 10000*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000)
            TXT, 'individualMSCpercentage' => <<<'TXT'
            (-maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate + totalContributionsSelfEmployed - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome))/MSC(monthlyIncome)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            taxableIncome = monthlyIncome - ((MSC(monthlyIncome) * employeeMSCpercentage) + ((((monthlyIncome * premiumRate) * (2 - get_PhilHealth(monthlyIncome)) + maxMonthlyPremium * abs(1 - get_PhilHealth(monthlyIncome))) * ceil(get_PhilHealth(monthlyIncome) / 10000) + (premiumRate * 10000) * (1 - ceil(get_PhilHealth(monthlyIncome) / 10000))) / 2) + (monthlyIncome * get_PagIBIG(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))))
            TXT,
            'results' => ['maxMonthlyPremium' => <<<'TXT'
            (-2*employeeMSCpercentage*MSC(monthlyIncome) + 2*monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIG(monthlyIncome) - 2*monthlyIncome*get_PagIBIG(monthlyIncome) + 2*monthlyIncome + premiumRate*(monthlyIncome*get_PhilHealth(monthlyIncome) - 2*monthlyIncome + 10000)*ceil((1/10000)*get_PhilHealth(monthlyIncome)) - 10000*premiumRate - 2*taxableIncome - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome))/(ceil((1/10000)*get_PhilHealth(monthlyIncome))*abs(get_PhilHealth(monthlyIncome) - 1))
            TXT, 'premiumRate' => <<<'TXT'
            (2*employeeMSCpercentage*MSC(monthlyIncome) + maxMonthlyPremium*ceil((1/10000)*get_PhilHealth(monthlyIncome))*abs(get_PhilHealth(monthlyIncome) - 1) - 2*monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIG(monthlyIncome) + 2*monthlyIncome*get_PagIBIG(monthlyIncome) - 2*monthlyIncome + 2*taxableIncome + 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome))/(monthlyIncome*ceil((1/10000)*get_PhilHealth(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*ceil((1/10000)*get_PhilHealth(monthlyIncome)) + 10000*ceil((1/10000)*get_PhilHealth(monthlyIncome)) - 10000)
            TXT, 'employeeMSCpercentage' => <<<'TXT'
            (-1/2*maxMonthlyPremium*ceil((1/10000)*get_PhilHealth(monthlyIncome))*abs(get_PhilHealth(monthlyIncome) - 1) + (1/2)*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealth(monthlyIncome))*get_PhilHealth(monthlyIncome) - monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealth(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIG(monthlyIncome) - monthlyIncome*get_PagIBIG(monthlyIncome) + monthlyIncome + 5000*premiumRate*ceil((1/10000)*get_PhilHealth(monthlyIncome)) - 5000*premiumRate - taxableIncome - 100*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome))/MSC(monthlyIncome)
            TXT, 'taxableIncome' => <<<'TXT'
            -employeeMSCpercentage*MSC(monthlyIncome) - 1/2*maxMonthlyPremium*ceil((1/10000)*get_PhilHealth(monthlyIncome))*abs(get_PhilHealth(monthlyIncome) - 1) + (1/2)*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealth(monthlyIncome))*get_PhilHealth(monthlyIncome) - monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealth(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIG(monthlyIncome) - monthlyIncome*get_PagIBIG(monthlyIncome) + monthlyIncome + 5000*premiumRate*ceil((1/10000)*get_PhilHealth(monthlyIncome)) - 5000*premiumRate - 100*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            taxableIncomeSelfEmployed = monthlyIncome - (((MSC(monthlyIncome) * individualMSCpercentage + get_EC(monthlyIncome)))+ ((((monthlyIncome * premiumRate) * (2 - get_PhilHealth(monthlyIncome)) + maxMonthlyPremium * abs(1 - get_PhilHealthSelfEmployed(monthlyIncome))) * ceil(get_PhilHealthSelfEmployed(monthlyIncome) / 10000) + (premiumRate * 10000) * (1 - ceil(get_PhilHealthSelfEmployed(monthlyIncome) / 10000))))+ ((monthlyIncome * get_PagIBIGSelfEmployed(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + (monthlyIncome * get_PagIBIGEmployer(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000)))))
            TXT,
            'results' => ['maxMonthlyPremium' => <<<'TXT'
            (-individualMSCpercentage*MSC(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + premiumRate*(monthlyIncome*get_PhilHealth(monthlyIncome) - 2*monthlyIncome + 10000)*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - taxableIncomeSelfEmployed - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome))/(ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1))
            TXT, 'premiumRate' => <<<'TXT'
            (individualMSCpercentage*MSC(monthlyIncome) + maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) - monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome + taxableIncomeSelfEmployed + 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) + get_EC(monthlyIncome))/(monthlyIncome*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + 10000*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000)
            TXT, 'taxableIncomeSelfEmployed' => <<<'TXT'
            -individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)
            TXT, 'individualMSCpercentage' => <<<'TXT'
            (-maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - taxableIncomeSelfEmployed - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome))/MSC(monthlyIncome)
            TXT],
        ],
        [
            'title' => 'withholdingTax = get_fixedTax(taxableIncome) + (taxableIncome - get_overCompensationLimit(taxableIncome)) * get_taxRate(taxableIncome)',
            'results' => ['withholdingTax' => 'taxableIncome*get_taxRate(taxableIncome) + get_fixedTax(taxableIncome) - get_overCompensationLimit(taxableIncome)*get_taxRate(taxableIncome)'],
        ],
        [
            'title' => <<<'TXT'
            withholdingTaxSelfEmployed = get_fixedTaxSelfEmployed(taxableIncomeSelfEmployed) + ((taxableIncomeSelfEmployed) -  get_overCompensationLimitSelfEmployed(taxableIncomeSelfEmployed)) * get_taxRateSelfEmployed(taxableIncomeSelfEmployed)
            TXT,
            'results' => ['withholdingTaxSelfEmployed' => <<<'TXT'
            taxableIncomeSelfEmployed*get_taxRateSelfEmployed(taxableIncomeSelfEmployed) + get_fixedTaxSelfEmployed(taxableIncomeSelfEmployed) - get_overCompensationLimitSelfEmployed(taxableIncomeSelfEmployed)*get_taxRateSelfEmployed(taxableIncomeSelfEmployed)
            TXT],
        ],
        [
            'title' => 'netPayAfterTax = monthlyIncome - (get_fixedTax(taxableIncome) + (taxableIncome - get_overCompensationLimit(taxableIncome)) * get_taxRate(taxableIncome))',
            'results' => ['netPayAfterTax' => 'monthlyIncome - taxableIncome*get_taxRate(taxableIncome) - get_fixedTax(taxableIncome) + get_overCompensationLimit(taxableIncome)*get_taxRate(taxableIncome)', 'monthlyIncome' => 'netPayAfterTax + taxableIncome*get_taxRate(taxableIncome) + get_fixedTax(taxableIncome) - get_overCompensationLimit(taxableIncome)*get_taxRate(taxableIncome)'],
        ],
        [
            'title' => <<<'TXT'
            netPayAfterTaxSelfEmployed = monthlyIncome - (get_fixedTaxSelfEmployed(taxableIncomeSelfEmployed) + ((taxableIncomeSelfEmployed) -  get_overCompensationLimitSelfEmployed(taxableIncomeSelfEmployed)) * get_taxRateSelfEmployed(taxableIncomeSelfEmployed))
            TXT,
            'results' => ['monthlyIncome' => <<<'TXT'
            netPayAfterTaxSelfEmployed + taxableIncomeSelfEmployed*get_taxRateSelfEmployed(taxableIncomeSelfEmployed) + get_fixedTaxSelfEmployed(taxableIncomeSelfEmployed) - get_overCompensationLimitSelfEmployed(taxableIncomeSelfEmployed)*get_taxRateSelfEmployed(taxableIncomeSelfEmployed)
            TXT, 'netPayAfterTaxSelfEmployed' => <<<'TXT'
            monthlyIncome - taxableIncomeSelfEmployed*get_taxRateSelfEmployed(taxableIncomeSelfEmployed) - get_fixedTaxSelfEmployed(taxableIncomeSelfEmployed) + get_overCompensationLimitSelfEmployed(taxableIncomeSelfEmployed)*get_taxRateSelfEmployed(taxableIncomeSelfEmployed)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            totalDeductions = SSS + PhilHealth + (monthlyIncome * get_PagIBIG(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + (get_fixedTax(taxableIncome) + (taxableIncome - get_overCompensationLimit(taxableIncome)) * get_taxRate(taxableIncome))
            TXT,
            'results' => ['PhilHealth' => <<<'TXT'
            -SSS + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIG(monthlyIncome) - monthlyIncome*get_PagIBIG(monthlyIncome) - taxableIncome*get_taxRate(taxableIncome) + totalDeductions - 100*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_fixedTax(taxableIncome) + get_overCompensationLimit(taxableIncome)*get_taxRate(taxableIncome)
            TXT, 'SSS' => <<<'TXT'
            -PhilHealth + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIG(monthlyIncome) - monthlyIncome*get_PagIBIG(monthlyIncome) - taxableIncome*get_taxRate(taxableIncome) + totalDeductions - 100*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_fixedTax(taxableIncome) + get_overCompensationLimit(taxableIncome)*get_taxRate(taxableIncome)
            TXT, 'totalDeductions' => <<<'TXT'
            PhilHealth + SSS - monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIG(monthlyIncome) + monthlyIncome*get_PagIBIG(monthlyIncome) + taxableIncome*get_taxRate(taxableIncome) + 100*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) + get_fixedTax(taxableIncome) - get_overCompensationLimit(taxableIncome)*get_taxRate(taxableIncome)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            totalDeductionsSelfEmployed = SSSselfEmployed + PhilHealthSelfEmployed + ((monthlyIncome * get_PagIBIGSelfEmployed(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + (monthlyIncome * get_PagIBIGEmployer(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000)))) + (get_fixedTaxSelfEmployed((monthlyIncome - (((MSC(monthlyIncome) * individualMSCpercentage + get_EC(monthlyIncome)))+ ((((monthlyIncome * premiumRate) * (2 - get_PhilHealth(monthlyIncome)) + maxMonthlyPremium * abs(1 - get_PhilHealthSelfEmployed(monthlyIncome))) * ceil(get_PhilHealthSelfEmployed(monthlyIncome) / 10000) + (premiumRate * 10000) * (1 - ceil(get_PhilHealthSelfEmployed(monthlyIncome) / 10000))))+ ((monthlyIncome * get_PagIBIGSelfEmployed(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + (monthlyIncome * get_PagIBIGEmployer(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))))))) + (((monthlyIncome - (((MSC(monthlyIncome) * individualMSCpercentage + get_EC(monthlyIncome)))+ ((((monthlyIncome * premiumRate) * (2 - get_PhilHealth(monthlyIncome)) + maxMonthlyPremium * abs(1 - get_PhilHealthSelfEmployed(monthlyIncome))) * ceil(get_PhilHealthSelfEmployed(monthlyIncome) / 10000) + (premiumRate * 10000) * (1 - ceil(get_PhilHealthSelfEmployed(monthlyIncome) / 10000))))+ ((monthlyIncome * get_PagIBIGSelfEmployed(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + (monthlyIncome * get_PagIBIGEmployer(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))))))) -  get_overCompensationLimitSelfEmployed((monthlyIncome - (((MSC(monthlyIncome) * individualMSCpercentage + get_EC(monthlyIncome)))+ ((((monthlyIncome * premiumRate) * (2 - get_PhilHealth(monthlyIncome)) + maxMonthlyPremium * abs(1 - get_PhilHealthSelfEmployed(monthlyIncome))) * ceil(get_PhilHealthSelfEmployed(monthlyIncome) / 10000) + (premiumRate * 10000) * (1 - ceil(get_PhilHealthSelfEmployed(monthlyIncome) / 10000))))+ ((monthlyIncome * get_PagIBIGSelfEmployed(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + (monthlyIncome * get_PagIBIGEmployer(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000)))))))) * get_taxRateSelfEmployed((monthlyIncome - (((MSC(monthlyIncome) * individualMSCpercentage + get_EC(monthlyIncome)))+ ((((monthlyIncome * premiumRate) * (2 - get_PhilHealth(monthlyIncome)) + maxMonthlyPremium * abs(1 - get_PhilHealthSelfEmployed(monthlyIncome))) * ceil(get_PhilHealthSelfEmployed(monthlyIncome) / 10000) + (premiumRate * 10000) * (1 - ceil(get_PhilHealthSelfEmployed(monthlyIncome) / 10000))))+ ((monthlyIncome * get_PagIBIGSelfEmployed(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + (monthlyIncome * get_PagIBIGEmployer(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))))))))
            TXT,
            'results' => ['totalDeductionsSelfEmployed' => <<<'TXT'
            PhilHealthSelfEmployed + SSSselfEmployed - individualMSCpercentage*MSC(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - 10000*premiumRate*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + get_fixedTaxSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - get_overCompensationLimitSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome))*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome))
            TXT, 'SSSselfEmployed' => <<<'TXT'
            -PhilHealthSelfEmployed + individualMSCpercentage*MSC(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) - monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome*get_PagIBIGEmployer(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + 10000*premiumRate*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + totalDeductionsSelfEmployed + 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) + get_EC(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - get_fixedTaxSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + get_overCompensationLimitSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome))*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome))
            TXT, 'PhilHealthSelfEmployed' => <<<'TXT'
            -SSSselfEmployed + individualMSCpercentage*MSC(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) - monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome*get_PagIBIGEmployer(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + 10000*premiumRate*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + totalDeductionsSelfEmployed + 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) + get_EC(monthlyIncome)*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) - get_fixedTaxSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome)) + get_overCompensationLimitSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome))*get_taxRateSelfEmployed(-individualMSCpercentage*MSC(monthlyIncome) - maxMonthlyPremium*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*abs(get_PhilHealthSelfEmployed(monthlyIncome) - 1) + monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome))*get_PhilHealth(monthlyIncome) - 2*monthlyIncome*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome + 10000*premiumRate*ceil((1/10000)*get_PhilHealthSelfEmployed(monthlyIncome)) - 10000*premiumRate - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_EC(monthlyIncome))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            netPayAfterDeductions = monthlyIncome - (SSS + PhilHealth + (monthlyIncome * get_PagIBIG(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + (get_fixedTax(taxableIncome) + (taxableIncome - get_overCompensationLimit(taxableIncome)) * get_taxRate(taxableIncome)))
            TXT,
            'results' => ['netPayAfterDeductions' => <<<'TXT'
            -PhilHealth - SSS + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIG(monthlyIncome) - monthlyIncome*get_PagIBIG(monthlyIncome) + monthlyIncome - taxableIncome*get_taxRate(taxableIncome) - 100*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_fixedTax(taxableIncome) + get_overCompensationLimit(taxableIncome)*get_taxRate(taxableIncome)
            TXT, 'PhilHealth' => <<<'TXT'
            -SSS + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIG(monthlyIncome) - monthlyIncome*get_PagIBIG(monthlyIncome) + monthlyIncome - netPayAfterDeductions - taxableIncome*get_taxRate(taxableIncome) - 100*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_fixedTax(taxableIncome) + get_overCompensationLimit(taxableIncome)*get_taxRate(taxableIncome)
            TXT, 'SSS' => <<<'TXT'
            -PhilHealth + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIG(monthlyIncome) - monthlyIncome*get_PagIBIG(monthlyIncome) + monthlyIncome - netPayAfterDeductions - taxableIncome*get_taxRate(taxableIncome) - 100*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_fixedTax(taxableIncome) + get_overCompensationLimit(taxableIncome)*get_taxRate(taxableIncome)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            netPayAfterDeductionsSelfEmployed = monthlyIncome - (SSSselfEmployed + PhilHealthSelfEmployed + ((monthlyIncome * get_PagIBIGSelfEmployed(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + (monthlyIncome * get_PagIBIGEmployer(monthlyIncome) * (1 - ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000))) + 100 * ceil(floor(monthlyIncome / 5000.00001) / (monthlyIncome * 1000000000)))) + (get_fixedTaxSelfEmployed(taxableIncomeSelfEmployed) + ((taxableIncomeSelfEmployed) -  get_overCompensationLimitSelfEmployed(taxableIncomeSelfEmployed)) * get_taxRateSelfEmployed(taxableIncomeSelfEmployed)))
            TXT,
            'results' => ['netPayAfterDeductionsSelfEmployed' => <<<'TXT'
            -PhilHealthSelfEmployed - SSSselfEmployed + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome - taxableIncomeSelfEmployed*get_taxRateSelfEmployed(taxableIncomeSelfEmployed) - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_fixedTaxSelfEmployed(taxableIncomeSelfEmployed) + get_overCompensationLimitSelfEmployed(taxableIncomeSelfEmployed)*get_taxRateSelfEmployed(taxableIncomeSelfEmployed)
            TXT, 'SSSselfEmployed' => <<<'TXT'
            -PhilHealthSelfEmployed + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome - netPayAfterDeductionsSelfEmployed - taxableIncomeSelfEmployed*get_taxRateSelfEmployed(taxableIncomeSelfEmployed) - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_fixedTaxSelfEmployed(taxableIncomeSelfEmployed) + get_overCompensationLimitSelfEmployed(taxableIncomeSelfEmployed)*get_taxRateSelfEmployed(taxableIncomeSelfEmployed)
            TXT, 'PhilHealthSelfEmployed' => <<<'TXT'
            -SSSselfEmployed + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGEmployer(monthlyIncome) + monthlyIncome*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome)*get_PagIBIGSelfEmployed(monthlyIncome) - monthlyIncome*get_PagIBIGEmployer(monthlyIncome) - monthlyIncome*get_PagIBIGSelfEmployed(monthlyIncome) + monthlyIncome - netPayAfterDeductionsSelfEmployed - taxableIncomeSelfEmployed*get_taxRateSelfEmployed(taxableIncomeSelfEmployed) - 200*ceil((1/1000000000)*floor((100000/500000001)*monthlyIncome)/monthlyIncome) - get_fixedTaxSelfEmployed(taxableIncomeSelfEmployed) + get_overCompensationLimitSelfEmployed(taxableIncomeSelfEmployed)*get_taxRateSelfEmployed(taxableIncomeSelfEmployed)
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("MSC",function(monthlyIncome){if(monthlyIncome<4250){return 4000}else if(monthlyIncome>=4250&&monthlyIncome<4750){return 4500}else if(monthlyIncome>=4750&&monthlyIncome<5250){return 5000}else if(monthlyIncome>=5250&&monthlyIncome<5750){return 5500}else if(monthlyIncome>=5750&&monthlyIncome<6250){return 6000}else if(monthlyIncome>=6250&&monthlyIncome<6750){return 6500}else if(monthlyIncome>=6750&&monthlyIncome<7250){return 7000}else if(monthlyIncome>=7250&&monthlyIncome<7750){return 7500}else if(monthlyIncome>=7750&&monthlyIncome<8250){return 8000}else if(monthlyIncome>=8250&&monthlyIncome<8750){return 8500}else if(monthlyIncome>=8750&&monthlyIncome<9250){return 9000}else if(monthlyIncome>=9250&&monthlyIncome<9750){return 9500}else if(monthlyIncome>=9750&&monthlyIncome<10250){return 10000}else if(monthlyIncome>=10250&&monthlyIncome<10750){return 10500}else if(monthlyIncome>=10750&&monthlyIncome<11250){return 11000}else if(monthlyIncome>=11250&&monthlyIncome<11750){return 11500}else if(monthlyIncome>=11750&&monthlyIncome<12250){return 12000}else if(monthlyIncome>=12250&&monthlyIncome<12750){return 12500}else if(monthlyIncome>=12750&&monthlyIncome<13250){return 13000}else if(monthlyIncome>=13250&&monthlyIncome<13750){return 13500}else if(monthlyIncome>=13750&&monthlyIncome<14250){return 14000}else if(monthlyIncome>=14250&&monthlyIncome<14750){return 14500}else if(monthlyIncome>=14750&&monthlyIncome<15250){return 15000}else if(monthlyIncome>=15250&&monthlyIncome<15750){return 15500}else if(monthlyIncome>=15750&&monthlyIncome<16250){return 16000}else if(monthlyIncome>=16250&&monthlyIncome<16750){return 16500}else if(monthlyIncome>=16750&&monthlyIncome<17250){return 17000}else if(monthlyIncome>=17250&&monthlyIncome<17750){return 17500}else if(monthlyIncome>=17750&&monthlyIncome<18250){return 18000}else if(monthlyIncome>=18250&&monthlyIncome<18750){return 18500}else if(monthlyIncome>=18750&&monthlyIncome<19250){return 19000}else if(monthlyIncome>=19250&&monthlyIncome<19750){return 19500}else if(monthlyIncome>=19750&&monthlyIncome<20250){return 20000}else if(monthlyIncome>=20250&&monthlyIncome<20750){return 20500}else if(monthlyIncome>=20750&&monthlyIncome<21250){return 21000}else if(monthlyIncome>=21250&&monthlyIncome<21750){return 21500}else if(monthlyIncome>=21750&&monthlyIncome<22250){return 22000}else if(monthlyIncome>=22250&&monthlyIncome<22750){return 22500}else if(monthlyIncome>=22750&&monthlyIncome<23250){return 23000}else if(monthlyIncome>=23250&&monthlyIncome<23750){return 23500}else if(monthlyIncome>=23750&&monthlyIncome<24250){return 24000}else if(monthlyIncome>=24250&&monthlyIncome<24750){return 24500}else if(monthlyIncome>=24750&&monthlyIncome<25250){return 25000}else if(monthlyIncome>=25250&&monthlyIncome<25750){return 25500}else if(monthlyIncome>=25750&&monthlyIncome<26250){return 26000}else if(monthlyIncome>=26250&&monthlyIncome<26750){return 26500}else if(monthlyIncome>=26750&&monthlyIncome<27250){return 27000}else if(monthlyIncome>=27250&&monthlyIncome<27750){return 27500}else if(monthlyIncome>=27750&&monthlyIncome<28250){return 28000}else if(monthlyIncome>=28250&&monthlyIncome<28750){return 28500}else if(monthlyIncome>=28750&&monthlyIncome<29250){return 29000}else if(monthlyIncome>=29250&&monthlyIncome<29750){return 29500}else if(monthlyIncome>=29750){return 30000}});omni.define("get_EC",function(monthlyIncome){if(monthlyIncome<14750){return 10}else if(monthlyIncome>=14750){return 30}});omni.define("get_PhilHealth",function(monthlyIncome){if(monthlyIncome>=100&&monthlyIncome<=10000){return 0}else if(monthlyIncome>10000&&monthlyIncome<90000){return 1}else if(monthlyIncome>=90000){return 2}});omni.define("get_PhilHealthSelfEmployed",function(monthlyIncome){if(monthlyIncome>=100&&monthlyIncome<=10000){return 0}else if(monthlyIncome>10000&&monthlyIncome<90000){return 1}else if(monthlyIncome>=90000){return 2}});omni.define("get_PagIBIG",function(monthlyIncome){if(monthlyIncome>=100&&monthlyIncome<=1500){return 0.01}else if(monthlyIncome>=1500){return 0.02}});omni.define("get_PagIBIGSelfEmployed",function(monthlyIncome){if(monthlyIncome>=100&&monthlyIncome<=1500){return 0.01}else if(monthlyIncome>=1500){return 0.02}});omni.define("get_PagIBIGEmployer",function(monthlyIncome){if(monthlyIncome>=100&&monthlyIncome<=1500){return 0.02}else if(monthlyIncome>=1500){return 0.02}});omni.define("get_fixedTax",function(taxableIncome){if(taxableIncome>=100&&taxableIncome<=20833){return 0}else if(taxableIncome>20833&&taxableIncome<=33332){return 0}else if(taxableIncome>33332&&taxableIncome<=66666){return 1875}else if(taxableIncome>66666&&taxableIncome<=166666){return 8541.8}else if(taxableIncome>166666&&taxableIncome<=666666){return 33541.8}else if(taxableIncome>666666){return 183541.8}});omni.define("get_overCompensationLimit",function(taxableIncome){if(taxableIncome>=100&&taxableIncome<=20833){return 0}else if(taxableIncome>20833&&taxableIncome<=33332){return 20833}else if(taxableIncome>33332&&taxableIncome<=66666){return 33333}else if(taxableIncome>66666&&taxableIncome<=166666){return 66667}else if(taxableIncome>166666&&taxableIncome<=666666){return 166667}else if(taxableIncome>666666){return 666667}});omni.define("get_taxRate",function(taxableIncome){if(taxableIncome>=100&&taxableIncome<=20833){return 0}else if(taxableIncome>20833&&taxableIncome<=33332){return 0.15}else if(taxableIncome>33332&&taxableIncome<=66666){return 0.2}else if(taxableIncome>66666&&taxableIncome<=166666){return 0.25}else if(taxableIncome>166666&&taxableIncome<=666666){return 0.3}else if(taxableIncome>666666){return 0.35}});omni.define("get_fixedTaxSelfEmployed",function(taxableIncomeSelfEmployed){if(taxableIncomeSelfEmployed>=100&&taxableIncomeSelfEmployed<=20833){return 0}else if(taxableIncomeSelfEmployed>20833&&taxableIncomeSelfEmployed<=33332){return 0}else if(taxableIncomeSelfEmployed>33332&&taxableIncomeSelfEmployed<=66666){return 1875}else if(taxableIncomeSelfEmployed>66666&&taxableIncomeSelfEmployed<=166666){return 8541.8}else if(taxableIncomeSelfEmployed>166666&&taxableIncomeSelfEmployed<=666666){return 33541.8}else if(taxableIncomeSelfEmployed>666666){return 183541.8}});omni.define("get_overCompensationLimitSelfEmployed",function(taxableIncomeSelfEmployed){if(taxableIncomeSelfEmployed>=100&&taxableIncomeSelfEmployed<=20833){return 0}else if(taxableIncomeSelfEmployed>20833&&taxableIncomeSelfEmployed<=33332){return 20833}else if(taxableIncomeSelfEmployed>33332&&taxableIncomeSelfEmployed<=66666){return 33333}else if(taxableIncomeSelfEmployed>66666&&taxableIncomeSelfEmployed<=166666){return 66667}else if(taxableIncomeSelfEmployed>166666&&taxableIncomeSelfEmployed<=666666){return 166667}else if(taxableIncomeSelfEmployed>666666){return 666667}});omni.define("get_taxRateSelfEmployed",function(taxableIncomeSelfEmployed){if(taxableIncomeSelfEmployed>=100&&taxableIncomeSelfEmployed<=20833){return 0}else if(taxableIncomeSelfEmployed>20833&&taxableIncomeSelfEmployed<=33332){return 0.15}else if(taxableIncomeSelfEmployed>33332&&taxableIncomeSelfEmployed<=66666){return 0.2}else if(taxableIncomeSelfEmployed>66666&&taxableIncomeSelfEmployed<=166666){return 0.25}else if(taxableIncomeSelfEmployed>166666&&taxableIncomeSelfEmployed<=666666){return 0.3}else if(taxableIncomeSelfEmployed>666666){return 0.35}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Employment status, Monthly income and PagIBIG into Income tax Philippines and the answer comes back as SSS and PhilHealth. There is no hidden constant here: change SSS and employment status moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Income tax Philippines calculator works', 'html' => <<<'TXT'
            <p>Income tax Philippines answers one question from 6 numbers, and the answer is SSS, PhilHealth and Total contributions.</p><p>In the form&#039;s own words, SSS = Employee MSC percentage × MSC(Monthly income).</p><p>The answers are SSS, PhilHealth, Total contributions and SSS; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 6 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Employment status</strong> — a plain number, no unit</li><li><strong>Monthly income</strong> — a plain number, no unit</li><li><strong>PagIBIG</strong> — a plain number, no unit</li><li><strong>PagIBIG</strong> — a plain number, no unit</li><li><strong>Withholding tax</strong> — a plain number, no unit</li><li><strong>Withholding tax</strong> — a plain number, no unit</li></ul><p>The answers come back as SSS, PhilHealth, Total contributions, SSS, PhilHealth, Total contributions, Taxable income, Net pay after tax, Total deductions, Net pay after deductions, Taxable income, Net pay after tax, Total deductions self employed, Net pay after deductions self employed. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Employment status = 1 — through the same formula and the panel reports <strong>Year</strong> = 4.</p><ul><li><strong>Year</strong> = 4</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>SSS</strong> = <code>Employee MSC percentage × MSC(Monthly income)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Year</strong> = 4. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as SSS is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>SSS</strong> = <code>Employee MSC percentage × MSC(Monthly income)</code></li><li><strong>Employee MSC percentage</strong> = <code>SSS ÷ MSC(Monthly income)</code></li><li><strong>Individual MSC percentage</strong> = <code>(SSS − get_EC(Monthly income)) ÷ MSC(Monthly income)</code></li><li><strong>Withholding tax</strong> = <code>Taxable income × get_taxRate(Taxable income) + get_fixedTax(Taxable income) − get_overCompensationLimit(Taxable income) × get_taxRate(Taxable income)</code></li><li><strong>Net pay after tax</strong> = <code>Monthly income − Taxable income × get_taxRate(Taxable income) − get_fixedTax(Taxable income) + get_overCompensationLimit(Taxable income) × get_taxRate(Taxable income)</code></li><li><strong>Monthly income</strong> = <code>Net pay after tax + Taxable income × get_taxRate(Taxable income) + get_fixedTax(Taxable income) − get_overCompensationLimit(Taxable income) × get_taxRate(Taxable income)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>SSS</strong> = <code>Employee MSC percentage × MSC(Monthly income)</code> — the form to use when Employee MSC percentage and Monthly income are the values you have.</li><li><strong>Employee MSC percentage</strong> = <code>SSS ÷ MSC(Monthly income)</code> — the form to use when SSS and Monthly income are the values you have.</li><li><strong>SSS</strong> = <code>Individual MSC percentage × MSC(Monthly income) + get_EC(Monthly income)</code> — the form to use when Individual MSC percentage and Monthly income are the values you have.</li><li><strong>Individual MSC percentage</strong> = <code>(SSS − get_EC(Monthly income)) ÷ MSC(Monthly income)</code> — the form to use when SSS and Monthly income are the values you have.</li><li><strong>Withholding tax</strong> = <code>Taxable income × get_taxRate(Taxable income) + get_fixedTax(Taxable income) − get_overCompensationLimit(Taxable income) × get_taxRate(Taxable income)</code> — the form to use when Taxable income are the values you have.</li><li><strong>Withholding tax</strong> = <code>Taxable income × get_taxRateSelfEmployed(Taxable income) + get_fixedTaxSelfEmployed(Taxable income) − get_overCompensationLimitSelfEmployed(Taxable income) × get_taxRateSelfEmployed(Taxable income)</code> — the form to use when Taxable income are the values you have.</li><li><strong>Net pay after tax</strong> = <code>Monthly income − Taxable income × get_taxRate(Taxable income) − get_fixedTax(Taxable income) + get_overCompensationLimit(Taxable income) × get_taxRate(Taxable income)</code> — the form to use when Monthly income and Taxable income are the values you have.</li><li><strong>Monthly income</strong> = <code>Net pay after tax + Taxable income × get_taxRate(Taxable income) + get_fixedTax(Taxable income) − get_overCompensationLimit(Taxable income) × get_taxRate(Taxable income)</code> — the form to use when Net pay after tax and Taxable income are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of SSS, Employee MSC percentage and SSS can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Employment status from 1 to 2, leaving every other box alone. The panel moves from <strong>Year</strong> 4 to <strong>Year</strong> 4.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> SSS, PhilHealth and Total contributions are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Employment status left as a guess.</strong> Anything typed into Employment status is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Monthly income left as a guess.</strong> Anything typed into Monthly income is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>PagIBIG left as a guess.</strong> Anything typed into PagIBIG is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Employment status and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Income tax Philippines form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Employment status</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Employment status is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Monthly income</strong> takes a plain number with no unit attached. The page reads it when it works out Employee MSC percentage, SSS and SSS. Fill it from a measurement rather than a memory — Monthly income is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>PagIBIG</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — PagIBIG is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>PagIBIG</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — PagIBIG is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Withholding tax</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Withholding tax is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Withholding tax</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Withholding tax is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Employment status, Monthly income, PagIBIG and PagIBIG ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Employment status — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check SSS against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind SSS is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Employment status, Monthly income and PagIBIG are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Employment status, Monthly income and PagIBIG measured, SSS and PhilHealth wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/va-loan">VA loan Calculator</a>, <a href="/finance/var">Value at risk (VaR)</a> and <a href="/finance/variable-annuity">Variable annuity Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Income tax Philippines is a number to act on, so the useful question is what to do with SSS, PhilHealth and Total contributions once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Employment status, Monthly income, PagIBIG and PagIBIG alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Income tax Philippines calculator work out?', 'a' => <<<'TXT'
            SSS, PhilHealth, Total contributions and SSS, from Employee MSC percentage and Monthly income. The relationship is SSS = Employee MSC percentage × MSC(Monthly income).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Employment status, Monthly income, PagIBIG, PagIBIG, Withholding tax. Fill employment status, monthly income and pagIBIG and leave SSS empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. SSS, Employee MSC percentage, SSS and Individual MSC percentage can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Year = 4. That comes from the page\'s own defaults, entered in Employment status; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            SSS is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Employment status blank and the page solves for it, reporting SSS instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to SSS at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/va-loan', 'name' => 'VA loan Calculator'],
            ['path' => '/finance/var', 'name' => 'Value at risk (VaR)'],
            ['path' => '/finance/variable-annuity', 'name' => 'Variable annuity Calculator'],
        ],
        'authors' => [],
    ],
];
