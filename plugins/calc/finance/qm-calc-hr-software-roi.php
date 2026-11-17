<?php

/**
 * HR software ROI
 * /finance/hr-software-roi
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'HR software ROI',
    'meta' => ['title' => 'HR software ROI Calculator — Formula, Units & Example', 'description' => 'HR software ROI turns period and license or subscription? into total cost of software and set up costs. The formula is printed in the form\'s own words.', 'h1' => 'HR software ROI Calculator', 'updated' => '2026-09-21'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        The simple version of the software ROI calculator allows you to enter the total of your investment and benefits. It then calculates the total software ROI. However, if you have a breakdown of your spending and wish to enter an itemized list, tick the check box below. Doing so also allows you to calculate the annual software ROI for a period of your choosing.
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'advanced_mode',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show an itemized breakdown of costs and benefits' => '1'],
                            'dataset' => 'advanced_mode',
                            'control' => 'CHECKBOX',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'period',
                            'label' => 'Period',
                            'type' => 'select',
                            'options' => [
                                'One year' => '1',
                                'Two years' => '2',
                                'Three years' => '3',
                                'Four years' => '4',
                                'Five years' => '5',
                                'Six years' => '6',
                                'Seven years' => '7',
                                'Eight years' => '8',
                                'Nine years' => '9',
                                'Ten years' => '10',
                            ],
                            'dataset' => 'period',
                            'control' => 'DROPDOWN',
                            'default' => 'Three years',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'A breakdown of the costs attributed to the actual software',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'licenseOrSubscription',
                            'label' => 'License or subscription?',
                            'type' => 'select',
                            'options' => ['License' => '0', 'Subscription' => '1'],
                            'dataset' => 'licenseOrSubscription',
                            'default' => 'License',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'licenseFee',
                            'label' => 'License fee',
                            'type' => 'number',
                            'help' => 'This is a one time payment.',
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
                            'name' => 'subscriptionFee',
                            'label' => 'Subscription fee',
                            'type' => 'number',
                            'help' => 'This is a recurring payment that is made monthly or yearly.',
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
                            'name' => 'dataStorageCost',
                            'label' => 'Data storage cost',
                            'type' => 'number',
                            'help' => 'This a recurring fee that is usually paid on a monthly basis.',
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
                            'name' => 'dataStorageCost1',
                            'label' => 'Data storage cost',
                            'type' => 'number',
                            'help' => 'This a recurring fee that is usually paid on a monthly basis.',
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
                            'name' => 'supportServices',
                            'label' => 'Support services',
                            'type' => 'number',
                            'help' => 'A maintenance fee that is usually paid for technical long term support.&nbsp;',
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
                            'name' => 'supportServices1',
                            'label' => 'Support services',
                            'type' => 'number',
                            'help' => 'A maintenance fee that is usually paid for technical long term support.&nbsp;',
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
                            'name' => 'costOfSoftware',
                            'label' => 'Total cost of software',
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
                            'name' => 'costOfSoftware1',
                            'label' => 'Total cost of software',
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
            'title' => 'Breakdown of the cost to set up the software',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dataImport',
                            'label' => 'Data import',
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
                            'name' => 'softwareConfiguration',
                            'label' => 'Software configuration',
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
                            'name' => 'trainingCosts',
                            'label' => 'Training costs',
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
                            'name' => 'setUpCosts',
                            'label' => 'Set up costs',
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
            'title' => 'Benefits',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'noOfEmployees',
                            'label' => 'No. of employees',
                            'type' => 'number',
                            'help' => 'The number of employees that will use the software.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'averageCostPerEmployee',
                            'label' => 'Average cost per employee',
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
                            'name' => 'timeSaved',
                            'label' => 'Time saved',
                            'type' => 'number',
                            'help' => 'The percentage of time the employees will save by using the software.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'increasedProductivity',
                            'label' => 'Increased productivity',
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
                            'name' => 'increasedProductivityFinal',
                            'label' => 'Increased productivity final',
                            'type' => 'number',
                            'help' => 'Over the period in question.',
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
            'title' => 'Reduced customer defection',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'noOfCustomers',
                            'label' => 'No. of customers',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costToAcquire',
                            'label' => 'Cost to acquire',
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
                            'name' => 'churnRate',
                            'label' => 'Churn rate',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'decreasedChurnRate',
                            'label' => 'Decreased churn rate',
                            'type' => 'number',
                            'help' => 'A negative number means an increased churn rate of that percent.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'decreasedCustomerChurnRateBenefit',
                            'label' => 'Benefit ',
                            'type' => 'number',
                            'help' => 'Benefit gained from the decreased churn rate.',
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
                            'name' => 'decreasedCustomerChurnRateBenefit1',
                            'label' => 'Benefit from decreased customer churn rate',
                            'type' => 'number',
                            'help' => 'Over the period in question.',
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
            'title' => 'Costs attached to old hardware that is being replaced',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hardwareCosts',
                            'label' => 'Hardware costs',
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
                            'name' => 'softwareCost',
                            'label' => 'Software cost',
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
                            'name' => 'maintainanceFee',
                            'label' => 'Maintainance fee',
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
                            'name' => 'hardwareAndSoftwareCost',
                            'label' => 'Hardware and software cost',
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
                            'name' => 'totalHardwareAndSoftwareCost',
                            'label' => 'Total hardware and software cost',
                            'type' => 'number',
                            'help' => 'Over the period in question.',
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
            'title' => 'Benefit from increased profit margin',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annualSales',
                            'label' => 'Annual sales',
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
                            'name' => 'profitMargin',
                            'label' => 'Profit margin',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'increasedProfitMargin',
                            'label' => 'Increased profit margin',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'increasedProfit',
                            'label' => 'Increased profit',
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
                            'name' => 'totalIncreasedProfit',
                            'label' => 'Total increased profit',
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
                            'name' => 'otherBenefits',
                            'label' => 'Other benefits',
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
            'title' => 'The software ROI for the period',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costOfInvestment',
                            'label' => 'Cost of investment',
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
                            'name' => 'costOfInvestment1',
                            'label' => 'Cost of investment',
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
                            'name' => 'benefitOfInvestment',
                            'label' => 'Benefit of investment',
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
                            'name' => 'softwareROI',
                            'label' => 'Software roi',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'softwareROI1',
                            'label' => 'Software ROI',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'averageAnnualROI',
                            'label' => 'Average annual ROI',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'averageAnnualROI1',
                            'label' => 'Average annual ROI',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'costOfSoftware = (subscriptionFee*period) + (dataStorageCost* period) + (supportServices * period) ',
            'results' => [
                'costOfSoftware' => 'period*(dataStorageCost + subscriptionFee + supportServices)',
                'dataStorageCost' => 'costOfSoftware/period - subscriptionFee - supportServices',
                'supportServices' => 'costOfSoftware/period - dataStorageCost - subscriptionFee',
                'subscriptionFee' => 'costOfSoftware/period - dataStorageCost - supportServices',
                'period' => 'costOfSoftware/(dataStorageCost + subscriptionFee + supportServices)',
            ],
        ],
        [
            'title' => 'costOfSoftware1 =  (dataStorageCost1 * period) + (supportServices1*period) + licenseFee',
            'results' => [
                'costOfSoftware1' => 'dataStorageCost1*period + licenseFee + period*supportServices1',
                'licenseFee' => 'costOfSoftware1 - dataStorageCost1*period - period*supportServices1',
                'period' => '(costOfSoftware1 - licenseFee)/(dataStorageCost1 + supportServices1)',
                'dataStorageCost1' => '(costOfSoftware1 - licenseFee - period*supportServices1)/period',
                'supportServices1' => '(costOfSoftware1 - dataStorageCost1*period - licenseFee)/period',
            ],
        ],
        [
            'title' => 'setUpCosts = dataImport + softwareConfiguration + trainingCosts ',
            'results' => ['softwareConfiguration' => '-dataImport + setUpCosts - trainingCosts', 'trainingCosts' => '-dataImport + setUpCosts - softwareConfiguration', 'setUpCosts' => 'dataImport + softwareConfiguration + trainingCosts', 'dataImport' => 'setUpCosts - softwareConfiguration - trainingCosts'],
        ],
        [
            'title' => 'costOfInvestment = costOfSoftware + setUpCosts',
            'results' => ['costOfSoftware' => 'costOfInvestment - setUpCosts', 'setUpCosts' => 'costOfInvestment - costOfSoftware', 'costOfInvestment' => 'costOfSoftware + setUpCosts'],
        ],
        [
            'title' => 'costOfInvestment1 = costOfSoftware1 + setUpCosts',
            'results' => ['costOfInvestment1' => 'costOfSoftware1 + setUpCosts', 'costOfSoftware1' => 'costOfInvestment1 - setUpCosts', 'setUpCosts' => 'costOfInvestment1 - costOfSoftware1'],
        ],
        [
            'title' => 'increasedProductivity = noOfEmployees * averageCostPerEmployee * timeSaved/100',
            'results' => ['averageCostPerEmployee' => '100*increasedProductivity/(noOfEmployees*timeSaved)', 'increasedProductivity' => '(1/100)*averageCostPerEmployee*noOfEmployees*timeSaved', 'timeSaved' => '100*increasedProductivity/(averageCostPerEmployee*noOfEmployees)', 'noOfEmployees' => '100*increasedProductivity/(averageCostPerEmployee*timeSaved)'],
        ],
        [
            'title' => 'increasedProductivityFinal = period * increasedProductivity',
            'results' => ['increasedProductivity' => 'increasedProductivityFinal/period', 'period' => 'increasedProductivityFinal/increasedProductivity', 'increasedProductivityFinal' => 'increasedProductivity*period'],
        ],
        [
            'title' => 'decreasedCustomerChurnRateBenefit = (noOfCustomers * costToAcquire * churnRate/100) * decreasedChurnRate/100',
            'results' => [
                'churnRate' => '10000*decreasedCustomerChurnRateBenefit/(costToAcquire*decreasedChurnRate*noOfCustomers)',
                'costToAcquire' => '10000*decreasedCustomerChurnRateBenefit/(churnRate*decreasedChurnRate*noOfCustomers)',
                'decreasedCustomerChurnRateBenefit' => '(1/10000)*churnRate*costToAcquire*decreasedChurnRate*noOfCustomers',
                'noOfCustomers' => '10000*decreasedCustomerChurnRateBenefit/(churnRate*costToAcquire*decreasedChurnRate)',
                'decreasedChurnRate' => '10000*decreasedCustomerChurnRateBenefit/(churnRate*costToAcquire*noOfCustomers)',
            ],
        ],
        [
            'title' => 'decreasedCustomerChurnRateBenefit1 = decreasedCustomerChurnRateBenefit* period',
            'results' => ['decreasedCustomerChurnRateBenefit1' => 'decreasedCustomerChurnRateBenefit*period', 'decreasedCustomerChurnRateBenefit' => 'decreasedCustomerChurnRateBenefit1/period', 'period' => 'decreasedCustomerChurnRateBenefit1/decreasedCustomerChurnRateBenefit'],
        ],
        [
            'title' => 'hardwareAndSoftwareCost = hardwareCosts + softwareCost + maintainanceFee',
            'results' => ['hardwareCosts' => 'hardwareAndSoftwareCost - maintainanceFee - softwareCost', 'maintainanceFee' => 'hardwareAndSoftwareCost - hardwareCosts - softwareCost', 'hardwareAndSoftwareCost' => 'hardwareCosts + maintainanceFee + softwareCost', 'softwareCost' => 'hardwareAndSoftwareCost - hardwareCosts - maintainanceFee'],
        ],
        [
            'title' => 'totalHardwareAndSoftwareCost = hardwareAndSoftwareCost * period',
            'results' => ['totalHardwareAndSoftwareCost' => 'hardwareAndSoftwareCost*period', 'period' => 'totalHardwareAndSoftwareCost/hardwareAndSoftwareCost', 'hardwareAndSoftwareCost' => 'totalHardwareAndSoftwareCost/period'],
        ],
        [
            'title' => 'increasedProfit = (annualSales * profitMargin/100) * increasedProfitMargin/100',
            'results' => ['profitMargin' => '10000*increasedProfit/(annualSales*increasedProfitMargin)', 'annualSales' => '10000*increasedProfit/(increasedProfitMargin*profitMargin)', 'increasedProfitMargin' => '10000*increasedProfit/(annualSales*profitMargin)', 'increasedProfit' => '(1/10000)*annualSales*increasedProfitMargin*profitMargin'],
        ],
        [
            'title' => 'totalIncreasedProfit = increasedProfit * period',
            'results' => ['totalIncreasedProfit' => 'increasedProfit*period', 'period' => 'totalIncreasedProfit/increasedProfit', 'increasedProfit' => 'totalIncreasedProfit/period'],
        ],
        [
            'title' => <<<'TXT'
            benefitOfInvestment = totalHardwareAndSoftwareCost + decreasedCustomerChurnRateBenefit1 +  increasedProductivityFinal+ (otherBenefits * period) + totalIncreasedProfit
            TXT,
            'results' => [
                'totalHardwareAndSoftwareCost' => 'benefitOfInvestment - decreasedCustomerChurnRateBenefit1 - increasedProductivityFinal - otherBenefits*period - totalIncreasedProfit',
                'otherBenefits' => '(benefitOfInvestment - decreasedCustomerChurnRateBenefit1 - increasedProductivityFinal - totalHardwareAndSoftwareCost - totalIncreasedProfit)/period',
                'totalIncreasedProfit' => 'benefitOfInvestment - decreasedCustomerChurnRateBenefit1 - increasedProductivityFinal - otherBenefits*period - totalHardwareAndSoftwareCost',
                'period' => '(benefitOfInvestment - decreasedCustomerChurnRateBenefit1 - increasedProductivityFinal - totalHardwareAndSoftwareCost - totalIncreasedProfit)/otherBenefits',
                'increasedProductivityFinal' => 'benefitOfInvestment - decreasedCustomerChurnRateBenefit1 - otherBenefits*period - totalHardwareAndSoftwareCost - totalIncreasedProfit',
                'decreasedCustomerChurnRateBenefit1' => 'benefitOfInvestment - increasedProductivityFinal - otherBenefits*period - totalHardwareAndSoftwareCost - totalIncreasedProfit',
                'benefitOfInvestment' => 'decreasedCustomerChurnRateBenefit1 + increasedProductivityFinal + otherBenefits*period + totalHardwareAndSoftwareCost + totalIncreasedProfit',
            ],
        ],
        [
            'title' => 'softwareROI = ((benefitOfInvestment - costOfInvestment)/costOfInvestment)*100 ',
            'results' => ['softwareROI' => '100*benefitOfInvestment/costOfInvestment - 100', 'costOfInvestment' => '100*benefitOfInvestment/(softwareROI + 100)', 'benefitOfInvestment' => '(1/100)*costOfInvestment*(softwareROI + 100)'],
        ],
        [
            'title' => 'softwareROI1 = ((benefitOfInvestment - costOfInvestment1)/costOfInvestment1)*100 ',
            'results' => ['costOfInvestment1' => '100*benefitOfInvestment/(softwareROI1 + 100)', 'softwareROI1' => '100*benefitOfInvestment/costOfInvestment1 - 100', 'benefitOfInvestment' => '(1/100)*costOfInvestment1*(softwareROI1 + 100)'],
        ],
        [
            'title' => 'averageAnnualROI = softwareROI/period',
            'results' => ['averageAnnualROI' => 'softwareROI/period', 'softwareROI' => 'averageAnnualROI*period', 'period' => 'softwareROI/averageAnnualROI'],
        ],
        [
            'title' => 'averageAnnualROI1 = softwareROI1/period',
            'results' => ['averageAnnualROI1' => 'softwareROI1/period', 'softwareROI1' => 'averageAnnualROI1*period', 'period' => 'softwareROI1/averageAnnualROI1'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        HR software ROI works out License fee and Data storage cost from Period and Subscription fee. It is a single relationship that reads license fee out of period, not a table of canned results keyed by them. Units for License fee default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the HR software ROI calculator works', 'html' => <<<'TXT'
            <p>HR software ROI answers one question from 4 numbers, and the answer is License fee, Data storage cost and Support services.</p><p>In the form&#039;s own words, Total cost of software = Period × (Data storage cost + Subscription fee + Support services).</p><p>What comes back is License fee, Data storage cost, Support services and Total cost of software — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Period</strong> — a plain number, no unit</li><li><strong>Subscription fee</strong> — in USD. This is a recurring payment that is made monthly or yearly.</li><li><strong>Data storage cost</strong> — in USD. This a recurring fee that is usually paid on a monthly basis.</li><li><strong>Support services</strong> — in USD. A maintenance fee that is usually paid for technical long term support.&amp;nbsp;</li></ul><p>The answers come back as License fee in USD, Data storage cost in USD, Support services in USD, Total cost of software in USD, Total cost of software in USD, Data import in USD, Software configuration in USD, Training costs in USD, Set up costs in USD, No. of employees, Average cost per employee in USD, Time saved in years, Increased productivity in USD, Increased productivity final in USD, No. of customers, Cost to acquire in USD, Churn rate in years, Decreased churn rate in years, Benefit in USD, Benefit from decreased customer churn rate in USD, Hardware costs in USD, Software cost in USD, Maintainance fee in USD, Hardware and software cost in USD, Total hardware and software cost in USD, Annual sales in USD, Profit margin in years, Increased profit margin in years, Increased profit in USD, Total increased profit in USD, Other benefits in USD, Cost of investment in USD, Cost of investment in USD, Benefit of investment in USD, Software roi in %, Software ROI in %, Average annual ROI in %, Average annual ROI in %. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, License or subscription? = 0; the answers are <strong>Period</strong> = 3.</p><ul><li><strong>Period</strong> = 3</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Total cost of software</strong> = <code>Period × (Data storage cost + Subscription fee + Support services)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Period</strong> = 3. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Time saved lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total cost of software</strong> = <code>Period × (Data storage cost + Subscription fee + Support services)</code></li><li><strong>Data storage cost</strong> = <code>Total cost of software ÷ Period − Subscription fee − Support services</code></li><li><strong>Support services</strong> = <code>Total cost of software ÷ Period − Data storage cost − Subscription fee</code></li><li><strong>Subscription fee</strong> = <code>Total cost of software ÷ Period − Data storage cost − Support services</code></li><li><strong>Period</strong> = <code>Total cost of software ÷ (Data storage cost + Subscription fee + Support services)</code></li><li><strong>License fee</strong> = <code>Total cost of software − Data storage cost × Period − Period × Support services</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total cost of software</strong> = <code>Period × (Data storage cost + Subscription fee + Support services)</code> — the form to use when Period, Data storage cost, Subscription fee and Support services are the values you have.</li><li><strong>Data storage cost</strong> = <code>Total cost of software ÷ Period − Subscription fee − Support services</code> — the form to use when Total cost of software, Period, Subscription fee and Support services are the values you have.</li><li><strong>Support services</strong> = <code>Total cost of software ÷ Period − Data storage cost − Subscription fee</code> — the form to use when Total cost of software, Period, Data storage cost and Subscription fee are the values you have.</li><li><strong>Subscription fee</strong> = <code>Total cost of software ÷ Period − Data storage cost − Support services</code> — the form to use when Total cost of software, Period, Data storage cost and Support services are the values you have.</li><li><strong>Period</strong> = <code>Total cost of software ÷ (Data storage cost + Subscription fee + Support services)</code> — the form to use when Total cost of software, Data storage cost, Subscription fee and Support services are the values you have.</li><li><strong>Total cost of software</strong> = <code>Data storage cost × Period + License fee + Period × Support services</code> — the form to use when Data storage cost, Period, License fee and Support services are the values you have.</li><li><strong>License fee</strong> = <code>Total cost of software − Data storage cost × Period − Period × Support services</code> — the form to use when Total cost of software, Data storage cost, Period and Support services are the values you have.</li><li><strong>Period</strong> = <code>(Total cost of software − License fee) ÷ (Data storage cost + Support services)</code> — the form to use when Total cost of software, License fee, Data storage cost and Support services are the values you have.</li></ul><p>Any one of Total cost of software, Data storage cost and Support services can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> License fee, Data storage cost and Support services are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Period left as a guess.</strong> Anything typed into Period is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Subscription fee left as a guess.</strong> Anything typed into Subscription fee is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Data storage cost left as a guess.</strong> Anything typed into Data storage cost is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Period to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the HR software ROI form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Period</strong> takes a plain number with no unit attached. Change it and Total cost of software, Data storage cost and Support services changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Period is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Subscription fee</strong> takes a plain number with no unit attached. This is a recurring payment that is made monthly or yearly. Change it and Total cost of software, Data storage cost and Support services changes with it. Fill it from a measurement rather than a memory — Subscription fee is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Data storage cost</strong> takes a plain number with no unit attached. This a recurring fee that is usually paid on a monthly basis. Change it and Total cost of software, Support services and Subscription fee changes with it. Fill it from a measurement rather than a memory — Data storage cost is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Support services</strong> takes a plain number with no unit attached. A maintenance fee that is usually paid for technical long term support.&amp;nbsp;. Change it and Total cost of software, Data storage cost and Subscription fee changes with it. Fill it from a measurement rather than a memory — Support services is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind License fee is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Period, Subscription fee and Data storage cost are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Period, Subscription fee and Data storage cost is what you already know and License fee and Data storage cost is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/dart-rate">Dart rate Calculator</a>, <a href="/finance/days-sales-outstanding">Day sales outstanding (DSO) Calculator</a> and <a href="/finance/days-inventory-outstanding">Days inventory outstanding (DIO) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the HR software ROI calculator work out?', 'a' => <<<'TXT'
            License fee, Data storage cost, Support services and Total cost of software, from Period, Data storage cost, Subscription fee and Support services. The relationship is Total cost of software = Period × (Data storage cost + Subscription fee + Support services).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Period, Subscription fee (USD), Data storage cost (USD), Support services (USD). Enter period, subscription fee and data storage cost; License fee is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total cost of software, Data storage cost, Support services and Subscription fee blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Period = 3. That comes from the page\'s own defaults, entered in Period; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally License fee is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Period blank and the page solves for it, reporting License fee instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. License fee keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/dart-rate', 'name' => 'Dart rate Calculator'],
            ['path' => '/finance/days-sales-outstanding', 'name' => 'Day sales outstanding (DSO) Calculator'],
            ['path' => '/finance/days-inventory-outstanding', 'name' => 'Days inventory outstanding (DIO) Calculator'],
        ],
        'authors' => [],
    ],
];
