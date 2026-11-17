<?php

/**
 * Accumulated depreciation
 * /finance/accumulated-depreciation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Accumulated depreciation',
    'meta' => ['title' => 'Accumulated depreciation — Formula & Results', 'description' => 'Accumulated depreciation reports net book value and net book value sys. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Accumulated depreciation Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'accumulatedDepreciationMethod',
                            'label' => 'Accumulated depreciation method',
                            'type' => 'select',
                            'options' => ['Straight line' => '1', 'Declining balance' => '2', 'Sum of the year\'s digits' => '3', 'Units of production' => '4'],
                            'dataset' => 'accumulatedDepreciationMethod',
                            'default' => 'Straight line',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costOfAsset',
                            'label' => 'Cost of the asset',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '25000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lifeOfTheAsset',
                            'label' => 'Life of the asset or useful life',
                            'type' => 'number',
                            'help' => 'The estimated period that an asset can be expected to remain economically feasible.',
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
                        [
                            'name' => 'numberOfYears',
                            'label' => 'Number of years',
                            'type' => 'number',
                            'help' => 'Number of years that has passed since the asset was purchased.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '2', 'when' => null],
                                ['value' => '2', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salvageValue',
                            'label' => 'Salvage value',
                            'type' => 'number',
                            'help' => 'The total amount of revenue a company expects to receive for an asset at the end of it\'s useful life.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '3000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'accumulatedDepreciation',
                            'label' => 'Accumulated depreciation',
                            'type' => 'number',
                            'help' => 'The total amount of monetary value an asset loses overtime due to wear and tear.',
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
                            'name' => 'netBookValue',
                            'label' => 'Net book value',
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
                            'name' => 'currentBookValue',
                            'label' => 'Current book value',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '25000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'depreciationRate',
                            'label' => 'Depreciation rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numberOfYearsDBM',
                            'label' => 'Number of years',
                            'type' => 'number',
                            'help' => 'The period for which the accumulated depreciation is being calculated.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costOfAssetSYS',
                            'label' => 'Cost of the asset',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '25000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salvageCostSYS',
                            'label' => 'Salvage value',
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
                            'name' => 'expectedLife',
                            'label' => 'Expected life/useful life',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'requestedYear',
                            'label' => 'Requested year',
                            'type' => 'number',
                            'help' => 'The year for which you wish to calculate the accumulated depreciation.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costOfAssetUOPM',
                            'label' => 'Cost of the asset',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '25000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salvageValueUOPM',
                            'label' => 'Salvage value',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '3000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'estimatedUnitsOverLifeSpan',
                            'label' => 'Estimated units over life span',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '75000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numberOfYearsUOPM',
                            'label' => 'Number of years',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear1',
                            'label' => 'Actual units produced in year 1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '700',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear2',
                            'label' => 'Actual units produced in year 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear3',
                            'label' => 'Actual units produced in year 3',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear4',
                            'label' => 'Actual units produced in year 4',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear5',
                            'label' => 'Actual units produced in year 5',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear6',
                            'label' => 'Actual units produced in year 6',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear7',
                            'label' => 'Actual units produced in year 7',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear8',
                            'label' => 'Actual units produced in year 8',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear9',
                            'label' => 'Actual units produced in year 9',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear10',
                            'label' => 'Actual units produced in year 10',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear11',
                            'label' => 'Actual units produced in year 11',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear12',
                            'label' => 'Actual units produced in year 12',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear13',
                            'label' => 'Actual units produced in year 13',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear14',
                            'label' => 'Actual units produced in year 14',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear15',
                            'label' => 'Actual units produced in year 15',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear16',
                            'label' => 'Actual units produced in year16',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear17',
                            'label' => 'Actual units produced in year 17',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear18',
                            'label' => 'Actual units produced in year 18',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear19',
                            'label' => 'Actual units produced in year 19',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear20',
                            'label' => 'Actual units produced in year 20',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear21',
                            'label' => 'Actual units produced in year 21',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear22',
                            'label' => 'Actual units produced in year 22',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear23',
                            'label' => 'Actual units produced in year 23',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear24',
                            'label' => 'Actual units produced in year 24',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear25',
                            'label' => 'Actual units produced in year 25',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear26',
                            'label' => 'Actual units produced in year 26',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear27',
                            'label' => 'Actual units produced in year 27',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear28',
                            'label' => 'Actual units produced in year 28',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear29',
                            'label' => 'Actual units produced in year 29',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear30',
                            'label' => 'Actual units produced in year 30',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear31',
                            'label' => 'Actual units produced in year 31',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear32',
                            'label' => 'Actual units produced in year 32',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear33',
                            'label' => 'Actual units produced in year 33',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear34',
                            'label' => 'Actual units produced in year 34',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear35',
                            'label' => 'Actual units produced in year 35',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear36',
                            'label' => 'Actual units produced in year 36',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear37',
                            'label' => 'Actual units produced in year 37',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear38',
                            'label' => 'Actual units produced in year 38',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear39',
                            'label' => 'Actual units produced in year 39',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear40',
                            'label' => 'Actual units produced in year 40',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear41',
                            'label' => 'Actual units produced in year 41',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear42',
                            'label' => 'Actual units produced in year 42',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear43',
                            'label' => 'Actual units produced in year 43',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear44',
                            'label' => 'Actual units produced in year 44',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear45',
                            'label' => 'Actual units produced in year 45',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear46',
                            'label' => 'Actual units produced in year 46',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear47',
                            'label' => 'Actual units produced in year 47',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear48',
                            'label' => 'Actual units produced in year 48',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear49',
                            'label' => 'Actual units produced in year 49',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actualUnitsProducedYear50',
                            'label' => 'Actual units produced in year 50',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'numberOfYearsDBM >= 1', 'text' => 'Depreciation year 1 = {{global.currencySymbol}}{{depreciationYear1.value}}'],
                                ['when' => 'numberOfYearsDBM >= 2', 'text' => 'Depreciation year 2 = {{global.currencySymbol}}{{depreciationYear2.value}}'],
                                ['when' => 'numberOfYearsDBM >= 3', 'text' => 'Depreciation year 3 = {{global.currencySymbol}}{{depreciationYear3.value}}'],
                                ['when' => 'numberOfYearsDBM >= 4', 'text' => 'Depreciation year 4 = {{global.currencySymbol}}{{depreciationYear4.value}}'],
                                ['when' => 'numberOfYearsDBM >= 5', 'text' => 'Depreciation year 5 = {{global.currencySymbol}}{{depreciationYear5.value}}'],
                                ['when' => 'numberOfYearsDBM >= 6', 'text' => 'Depreciation year 6 = {{global.currencySymbol}}{{depreciationYear6.value}}'],
                                ['when' => 'numberOfYearsDBM >= 7', 'text' => 'Depreciation year 7 = {{global.currencySymbol}}{{depreciationYear7.value}}'],
                                ['when' => 'numberOfYearsDBM >= 8', 'text' => 'Depreciation year 8 = {{global.currencySymbol}}{{depreciationYear8.value}}'],
                                ['when' => 'numberOfYearsDBM >= 9', 'text' => 'Depreciation year 9 = {{global.currencySymbol}}{{depreciationYear9.value}}'],
                                ['when' => 'numberOfYearsDBM >= 10', 'text' => 'Depreciation year 10 = {{global.currencySymbol}}{{depreciationYear10.value}}'],
                                ['when' => 'numberOfYearsDBM >= 11', 'text' => 'Depreciation year 11 = {{global.currencySymbol}}{{depreciationYear11.value}}'],
                                ['when' => 'numberOfYearsDBM >= 12', 'text' => 'Depreciation year 12 = {{global.currencySymbol}}{{depreciationYear12.value}}'],
                                ['when' => 'numberOfYearsDBM >= 13', 'text' => 'Depreciation year 13 = {{global.currencySymbol}}{{depreciationYear13.value}}'],
                                ['when' => 'numberOfYearsDBM >= 14', 'text' => 'Depreciation year 14 = {{global.currencySymbol}}{{depreciationYear14.value}}'],
                                ['when' => 'numberOfYearsDBM >= 15', 'text' => 'Depreciation year 15 = {{global.currencySymbol}}{{depreciationYear15.value}}'],
                                ['when' => 'numberOfYearsDBM >= 16', 'text' => 'Depreciation year 16 = {{global.currencySymbol}}{{depreciationYear16.value}}'],
                                ['when' => 'numberOfYearsDBM >= 17', 'text' => 'Depreciation year 17 = {{global.currencySymbol}}{{depreciationYear17.value}}'],
                                ['when' => 'numberOfYearsDBM >= 18', 'text' => 'Depreciation year 18 = {{global.currencySymbol}}{{depreciationYear18.value}}'],
                                ['when' => 'numberOfYearsDBM >= 19', 'text' => 'Depreciation year 19 = {{global.currencySymbol}}{{depreciationYear19.value}}'],
                                ['when' => 'numberOfYearsDBM >= 20', 'text' => 'Depreciation year 20 = {{global.currencySymbol}}{{depreciationYear20.value}}'],
                                ['when' => 'numberOfYearsDBM >= 21', 'text' => 'Depreciation year 21 = {{global.currencySymbol}}{{depreciationYear21.value}}'],
                                ['when' => 'numberOfYearsDBM >= 22', 'text' => 'Depreciation year 22 = {{global.currencySymbol}}{{depreciationYear22.value}}'],
                                ['when' => 'numberOfYearsDBM >= 23', 'text' => 'Depreciation year 23 = {{global.currencySymbol}}{{depreciationYear23.value}}'],
                                ['when' => 'numberOfYearsDBM >= 24', 'text' => 'Depreciation year 24 = {{global.currencySymbol}}{{depreciationYear24.value}}'],
                                ['when' => 'numberOfYearsDBM >= 25', 'text' => 'Depreciation year 25 = {{global.currencySymbol}}{{depreciationYear25.value}}'],
                                ['when' => 'numberOfYearsDBM >= 26', 'text' => 'Depreciation year 26 = {{global.currencySymbol}}{{depreciationYear26.value}}'],
                                ['when' => 'numberOfYearsDBM >= 27', 'text' => 'Depreciation year 27 = {{global.currencySymbol}}{{depreciationYear27.value}}'],
                                ['when' => 'numberOfYearsDBM >= 28', 'text' => 'Depreciation year 28 = {{global.currencySymbol}}{{depreciationYear28.value}}'],
                                ['when' => 'numberOfYearsDBM >= 29', 'text' => 'Depreciation year 29 = {{global.currencySymbol}}{{depreciationYear29.value}}'],
                                ['when' => 'numberOfYearsDBM >= 30', 'text' => 'Depreciation year 30 = {{global.currencySymbol}}{{depreciationYear30.value}}'],
                                ['when' => 'numberOfYearsDBM >= 31', 'text' => 'Depreciation year 31 = {{global.currencySymbol}}{{depreciationYear31.value}}'],
                                ['when' => 'numberOfYearsDBM >= 32', 'text' => 'Depreciation year 32 = {{global.currencySymbol}}{{depreciationYear32.value}}'],
                                ['when' => 'numberOfYearsDBM >= 33', 'text' => 'Depreciation year 33 = {{global.currencySymbol}}{{depreciationYear33.value}}'],
                                ['when' => 'numberOfYearsDBM >= 34', 'text' => 'Depreciation year 34 = {{global.currencySymbol}}{{depreciationYear34.value}}'],
                                ['when' => 'numberOfYearsDBM >= 35', 'text' => 'Depreciation year 35 = {{global.currencySymbol}}{{depreciationYear35.value}}'],
                                ['when' => 'numberOfYearsDBM >= 36', 'text' => 'Depreciation year 36 = {{global.currencySymbol}}{{depreciationYear36.value}}'],
                                ['when' => 'numberOfYearsDBM >= 37', 'text' => 'Depreciation year 37 = {{global.currencySymbol}}{{depreciationYear37.value}}'],
                                ['when' => 'numberOfYearsDBM >= 38', 'text' => 'Depreciation year 38 = {{global.currencySymbol}}{{depreciationYear38.value}}'],
                                ['when' => 'numberOfYearsDBM >= 39', 'text' => 'Depreciation year 39 = {{global.currencySymbol}}{{depreciationYear39.value}}'],
                                ['when' => 'numberOfYearsDBM >= 40', 'text' => 'Depreciation year 40 = {{global.currencySymbol}}{{depreciationYear40.value}}'],
                                ['when' => 'numberOfYearsDBM >= 41', 'text' => 'Depreciation year 41 = {{global.currencySymbol}}{{depreciationYear41.value}}'],
                                ['when' => 'numberOfYearsDBM >= 42', 'text' => 'Depreciation year 42 = {{global.currencySymbol}}{{depreciationYear42.value}}'],
                                ['when' => 'numberOfYearsDBM >= 43', 'text' => 'Depreciation year 43 = {{global.currencySymbol}}{{depreciationYear43.value}}'],
                                ['when' => 'numberOfYearsDBM >= 44', 'text' => 'Depreciation year 44= {{global.currencySymbol}}{{depreciationYear44.value}}'],
                                ['when' => 'numberOfYearsDBM >= 45', 'text' => 'Depreciation year 45 = {{global.currencySymbol}}{{depreciationYear45.value}}'],
                                ['when' => 'numberOfYearsDBM >= 46', 'text' => 'Depreciation year 46 = {{global.currencySymbol}}{{depreciationYear46.value}}'],
                                ['when' => 'numberOfYearsDBM >= 47', 'text' => 'Depreciation year 47 = {{global.currencySymbol}}{{depreciationYear47.value}}'],
                                ['when' => 'numberOfYearsDBM >= 48', 'text' => 'Depreciation year 48 = {{global.currencySymbol}}{{depreciationYear48.value}}'],
                                ['when' => 'numberOfYearsDBM >= 49', 'text' => 'Depreciation year 49 = {{global.currencySymbol}}{{depreciationYear49.value}}'],
                                ['when' => 'numberOfYearsDBM >= 50', 'text' => 'Depreciation year 50 = {{global.currencySymbol}}{{depreciationYear50.value}}'],
                                ['when' => 'numberOfYearsDBM > 50', 'text' => <<<'TXT'
                                Years 51–{{numberOfYearsDBM_1.value}} omitted for brevity. Depreciation for final year {{numberOfYearsDBM.value}} = {{global.currencySymbol}}{{depreciationYear_final.value}}
                                TXT],
                                ['when' => null, 'text' => 'Accumulated depreciation = {{global.currencySymbol}}{{accumulatedDepreciationDBM.value}} Net book value = {{global.currencySymbol}}{{netBookValueDBM.value}}'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        The accumulated depreciation after {{requestedYear.value}}&nbsp;year(s) will be: {{accumulatedDepreciationSYS.monetaryValue}} Net book value = {{netBookValueSYS.monetaryValue}}
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        The accumulated depreciation is {{global.currencySymbol}}{{accumulatedDepreciationUOPM.value}} Net book value = {{global.currencySymbol}}{{netBookValueUOPM.value}} To get a result, please ensure the sum of the actual units produced is no more than the estimated number of units over the life span.
                        TXT],
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
                            'name' => 'numberOfYearsDBM_1',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'netBookValueSYS',
                            'label' => 'Net book value sys',
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
                            'name' => 'accumulatedDepreciationSYS',
                            'label' => 'Accumulated depreciation sys',
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
            'title' => 'accumulatedDepreciation = ((costOfAsset - salvageValue)/lifeOfTheAsset) * numberOfYears',
            'results' => [
                'accumulatedDepreciation' => 'numberOfYears*(costOfAsset - salvageValue)/lifeOfTheAsset',
                'salvageValue' => '-accumulatedDepreciation*lifeOfTheAsset/numberOfYears + costOfAsset',
                'costOfAsset' => 'accumulatedDepreciation*lifeOfTheAsset/numberOfYears + salvageValue',
                'lifeOfTheAsset' => 'numberOfYears*(costOfAsset - salvageValue)/accumulatedDepreciation',
                'numberOfYears' => 'accumulatedDepreciation*lifeOfTheAsset/(costOfAsset - salvageValue)',
            ],
        ],
        [
            'title' => 'netBookValue = costOfAsset - accumulatedDepreciation',
            'results' => ['netBookValue' => '-accumulatedDepreciation + costOfAsset', 'accumulatedDepreciation' => 'costOfAsset - netBookValue', 'costOfAsset' => 'accumulatedDepreciation + netBookValue'],
        ],
        [
            'title' => 'netBookValueSYS = get_method3(expectedLife, requestedYear, costOfAssetSYS, salvageCostSYS, 0)',
            'results' => ['netBookValueSYS' => 'get_method3(expectedLife, requestedYear, costOfAssetSYS, salvageCostSYS, 0)'],
        ],
        [
            'title' => 'accumulatedDepreciationSYS = get_method3(expectedLife, requestedYear, costOfAssetSYS, salvageCostSYS, 1)',
            'results' => ['accumulatedDepreciationSYS' => 'get_method3(expectedLife, requestedYear, costOfAssetSYS, salvageCostSYS, 1)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.onResult([],function(ctx,_ref){var numberOfYearsDBM=_ref.numberOfYearsDBM,depreciationDBM=_ref.depreciationDBM,currentBookValue=_ref.currentBookValue,depreciationRate=_ref.depreciationRate,accumulatedDepreciationMethod=_ref.accumulatedDepreciationMethod;var currentBookValueDBM=currentBookValue;var accumulatedDepreciationDBM=0;var netBookValueDBM=0;var check=numberOfYearsDBM;var depreciationPerYear=[];if(accumulatedDepreciationMethod===2){if(numberOfYearsDBM>0){for(var count=0;count<check;count++){var depreciationThisYear=currentBookValue*depreciationRate/100;depreciationPerYear.push(depreciationThisYear);accumulatedDepreciationDBM+=depreciationThisYear;currentBookValue-=depreciationThisYear}netBookValueDBM=currentBookValueDBM-accumulatedDepreciationDBM}}for(var i=0;i<numberOfYearsDBM;i++){ctx.exportValue("depreciationYear".concat(i+1),formatCurrency(depreciationPerYear[i]))}ctx.exportValue("depreciationYear_final",formatCurrency(depreciationPerYear[numberOfYearsDBM-1]));ctx.exportValue("depreciationDBM",formatCurrency(depreciationDBM));ctx.exportValue("accumulatedDepreciationDBM",formatCurrency(accumulatedDepreciationDBM));ctx.exportValue("netBookValueDBM",formatCurrency(netBookValueDBM))});omni.define("get_method3",function(expectedLife,requestedYear,costOfAssetSYS,salvageCostSYS,index){var checkSYS=0;var checkSys2=0;var checkExpectedLife=expectedLife;var countYears2;var countYears=0;var netBookValueSYS=0;var sumYears=0;var depreciationSYS=0;var accumulatedDepreciationSYS=0;var remainingLifeSpan;var costOfAssetSYS2=costOfAssetSYS;if(expectedLife>0){for(checkSYS=0;checkSYS<checkExpectedLife;checkSYS++){countYears++;sumYears=sumYears+countYears}countYears2=countYears;if(requestedYear>0){for(checkSys2=0;checkSys2<requestedYear;checkSys2++){remainingLifeSpan=countYears2;depreciationSYS=remainingLifeSpan/sumYears*(costOfAssetSYS-salvageCostSYS);accumulatedDepreciationSYS=accumulatedDepreciationSYS+depreciationSYS;countYears2--}netBookValueSYS=costOfAssetSYS2-accumulatedDepreciationSYS}}var results=[netBookValueSYS,accumulatedDepreciationSYS];return results[index]});omni.onResult(["costOfAssetUOPM","salvageValueUOPM","estimatedUnitsOverLifeSpan","numberOfYearsUOPM"],function(ctx,_ref2){var costOfAssetUOPM=_ref2.costOfAssetUOPM,salvageValueUOPM=_ref2.salvageValueUOPM,estimatedUnitsOverLifeSpan=_ref2.estimatedUnitsOverLifeSpan,numberOfYearsUOPM=_ref2.numberOfYearsUOPM,actualUnitsProducedYear1=_ref2.actualUnitsProducedYear1,actualUnitsProducedYear2=_ref2.actualUnitsProducedYear2,actualUnitsProducedYear3=_ref2.actualUnitsProducedYear3,actualUnitsProducedYear4=_ref2.actualUnitsProducedYear4,actualUnitsProducedYear5=_ref2.actualUnitsProducedYear5,actualUnitsProducedYear6=_ref2.actualUnitsProducedYear6,actualUnitsProducedYear7=_ref2.actualUnitsProducedYear7,actualUnitsProducedYear8=_ref2.actualUnitsProducedYear8,actualUnitsProducedYear9=_ref2.actualUnitsProducedYear9,actualUnitsProducedYear10=_ref2.actualUnitsProducedYear10,actualUnitsProducedYear11=_ref2.actualUnitsProducedYear11,actualUnitsProducedYear12=_ref2.actualUnitsProducedYear12,actualUnitsProducedYear13=_ref2.actualUnitsProducedYear13,actualUnitsProducedYear14=_ref2.actualUnitsProducedYear14,actualUnitsProducedYear15=_ref2.actualUnitsProducedYear15,actualUnitsProducedYear16=_ref2.actualUnitsProducedYear16,actualUnitsProducedYear17=_ref2.actualUnitsProducedYear17,actualUnitsProducedYear18=_ref2.actualUnitsProducedYear18,actualUnitsProducedYear19=_ref2.actualUnitsProducedYear19,actualUnitsProducedYear20=_ref2.actualUnitsProducedYear20,actualUnitsProducedYear21=_ref2.actualUnitsProducedYear21,actualUnitsProducedYear22=_ref2.actualUnitsProducedYear22,actualUnitsProducedYear23=_ref2.actualUnitsProducedYear23,actualUnitsProducedYear24=_ref2.actualUnitsProducedYear24,actualUnitsProducedYear25=_ref2.actualUnitsProducedYear25,actualUnitsProducedYear26=_ref2.actualUnitsProducedYear26,actualUnitsProducedYear27=_ref2.actualUnitsProducedYear27,actualUnitsProducedYear28=_ref2.actualUnitsProducedYear28,actualUnitsProducedYear29=_ref2.actualUnitsProducedYear29,actualUnitsProducedYear30=_ref2.actualUnitsProducedYear30,actualUnitsProducedYear31=_ref2.actualUnitsProducedYear31,actualUnitsProducedYear32=_ref2.actualUnitsProducedYear32,actualUnitsProducedYear33=_ref2.actualUnitsProducedYear33,actualUnitsProducedYear34=_ref2.actualUnitsProducedYear34,actualUnitsProducedYear35=_ref2.actualUnitsProducedYear35,actualUnitsProducedYear36=_ref2.actualUnitsProducedYear36,actualUnitsProducedYear37=_ref2.actualUnitsProducedYear37,actualUnitsProducedYear38=_ref2.actualUnitsProducedYear38,actualUnitsProducedYear39=_ref2.actualUnitsProducedYear39,actualUnitsProducedYear40=_ref2.actualUnitsProducedYear40,actualUnitsProducedYear41=_ref2.actualUnitsProducedYear41,actualUnitsProducedYear42=_ref2.actualUnitsProducedYear42,actualUnitsProducedYear43=_ref2.actualUnitsProducedYear43,actualUnitsProducedYear44=_ref2.actualUnitsProducedYear44,actualUnitsProducedYear45=_ref2.actualUnitsProducedYear45,actualUnitsProducedYear46=_ref2.actualUnitsProducedYear46,actualUnitsProducedYear47=_ref2.actualUnitsProducedYear47,actualUnitsProducedYear48=_ref2.actualUnitsProducedYear48,actualUnitsProducedYear49=_ref2.actualUnitsProducedYear49,actualUnitsProducedYear50=_ref2.actualUnitsProducedYear50;var actualUnitsProducedYear=[actualUnitsProducedYear1,actualUnitsProducedYear2,actualUnitsProducedYear3,actualUnitsProducedYear4,actualUnitsProducedYear5,actualUnitsProducedYear6,actualUnitsProducedYear7,actualUnitsProducedYear8,actualUnitsProducedYear9,actualUnitsProducedYear10,actualUnitsProducedYear11,actualUnitsProducedYear12,actualUnitsProducedYear13,actualUnitsProducedYear14,actualUnitsProducedYear15,actualUnitsProducedYear16,actualUnitsProducedYear17,actualUnitsProducedYear18,actualUnitsProducedYear19,actualUnitsProducedYear20,actualUnitsProducedYear21,actualUnitsProducedYear22,actualUnitsProducedYear23,actualUnitsProducedYear24,actualUnitsProducedYear25,actualUnitsProducedYear26,actualUnitsProducedYear27,actualUnitsProducedYear28,actualUnitsProducedYear29,actualUnitsProducedYear30,actualUnitsProducedYear31,actualUnitsProducedYear32,actualUnitsProducedYear33,actualUnitsProducedYear34,actualUnitsProducedYear35,actualUnitsProducedYear36,actualUnitsProducedYear37,actualUnitsProducedYear38,actualUnitsProducedYear39,actualUnitsProducedYear40,actualUnitsProducedYear41,actualUnitsProducedYear42,actualUnitsProducedYear43,actualUnitsProducedYear44,actualUnitsProducedYear45,actualUnitsProducedYear46,actualUnitsProducedYear47,actualUnitsProducedYear48,actualUnitsProducedYear49,actualUnitsProducedYear50];var accumulatedDepreciationUOPM=0;var totalUnitsProduced=0;for(var i=1;i<=numberOfYearsUOPM;i++){var unitsProduced=actualUnitsProducedYear[i-1]||0;totalUnitsProduced+=unitsProduced;var depreciation=(costOfAssetUOPM-salvageValueUOPM)/estimatedUnitsOverLifeSpan*unitsProduced;accumulatedDepreciationUOPM+=depreciation}var netBookValueUOPM=costOfAssetUOPM-accumulatedDepreciationUOPM;if(totalUnitsProduced<=estimatedUnitsOverLifeSpan){ctx.exportValue("accumulatedDepreciationUOPM",formatCurrency(accumulatedDepreciationUOPM));ctx.exportValue("netBookValueUOPM",formatCurrency(netBookValueUOPM))}else{ctx.exportValue("accumulatedDepreciationUOPM","");ctx.exportValue("netBookValueUOPM","")}});omni.define("get_check_UOP_greater",function(estimatedUnitsOverLifeSpan,actualUnitsProducedYear1,actualUnitsProducedYear2,actualUnitsProducedYear3,actualUnitsProducedYear4,actualUnitsProducedYear5,actualUnitsProducedYear6,actualUnitsProducedYear7,actualUnitsProducedYear8,actualUnitsProducedYear9,actualUnitsProducedYear10,actualUnitsProducedYear11,actualUnitsProducedYear12,actualUnitsProducedYear13,actualUnitsProducedYear14,actualUnitsProducedYear15,actualUnitsProducedYear16,actualUnitsProducedYear17,actualUnitsProducedYear18,actualUnitsProducedYear19,actualUnitsProducedYear20,actualUnitsProducedYear21,actualUnitsProducedYear22,actualUnitsProducedYear23,actualUnitsProducedYear24,actualUnitsProducedYear25,actualUnitsProducedYear26,actualUnitsProducedYear27,actualUnitsProducedYear28,actualUnitsProducedYear29,actualUnitsProducedYear30,actualUnitsProducedYear31,actualUnitsProducedYear32,actualUnitsProducedYear33,actualUnitsProducedYear34,actualUnitsProducedYear35,actualUnitsProducedYear36,actualUnitsProducedYear37,actualUnitsProducedYear38,actualUnitsProducedYear39,actualUnitsProducedYear40,actualUnitsProducedYear41,actualUnitsProducedYear42,actualUnitsProducedYear43,actualUnitsProducedYear44,actualUnitsProducedYear45,actualUnitsProducedYear46,actualUnitsProducedYear47,actualUnitsProducedYear48,actualUnitsProducedYear49,actualUnitsProducedYear50){var actualUnitsProduced=[actualUnitsProducedYear1,actualUnitsProducedYear2,actualUnitsProducedYear3,actualUnitsProducedYear4,actualUnitsProducedYear5,actualUnitsProducedYear6,actualUnitsProducedYear7,actualUnitsProducedYear8,actualUnitsProducedYear9,actualUnitsProducedYear10,actualUnitsProducedYear11,actualUnitsProducedYear12,actualUnitsProducedYear13,actualUnitsProducedYear14,actualUnitsProducedYear15,actualUnitsProducedYear16,actualUnitsProducedYear17,actualUnitsProducedYear18,actualUnitsProducedYear19,actualUnitsProducedYear20,actualUnitsProducedYear21,actualUnitsProducedYear22,actualUnitsProducedYear23,actualUnitsProducedYear24,actualUnitsProducedYear25,actualUnitsProducedYear26,actualUnitsProducedYear27,actualUnitsProducedYear28,actualUnitsProducedYear29,actualUnitsProducedYear30,actualUnitsProducedYear31,actualUnitsProducedYear32,actualUnitsProducedYear33,actualUnitsProducedYear34,actualUnitsProducedYear35,actualUnitsProducedYear36,actualUnitsProducedYear37,actualUnitsProducedYear38,actualUnitsProducedYear39,actualUnitsProducedYear40,actualUnitsProducedYear41,actualUnitsProducedYear42,actualUnitsProducedYear43,actualUnitsProducedYear44,actualUnitsProducedYear45,actualUnitsProducedYear46,actualUnitsProducedYear47,actualUnitsProducedYear48,actualUnitsProducedYear49,actualUnitsProducedYear50];var totalUOP=0;for(var i=0;i<actualUnitsProduced.length;i++){if(typeof actualUnitsProduced[i]==="number"){totalUOP+=actualUnitsProduced[i]}}var check_UOP_greater=totalUOP>estimatedUnitsOverLifeSpan?1:0;return check_UOP_greater});function formatCurrency(value){var number=parseFloat(value);return number.toLocaleString(navigator.language,{minimumFractionDigits:2,maximumFractionDigits:2})}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Accumulated depreciation works out Accumulated depreciation and Net book value from Cost of the asset, Life of the asset or useful life and Number of years. Nothing is looked up on this page: accumulated depreciation is computed from cost of the asset and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Accumulated depreciation is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Accumulated depreciation calculator works', 'html' => <<<'TXT'
            <p>The Accumulated depreciation calculator applies one relationship to 4 numbers and reports Accumulated depreciation, Net book value and Net book value sys.</p><p>The relationship it solves reads Accumulated depreciation = Number of years × (Cost of the asset − Salvage value) ÷ Life of the asset or useful life.</p><p>The result panel carries Accumulated depreciation, Net book value, Net book value sys and Accumulated depreciation sys, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Cost of the asset</strong> — in USD</li><li><strong>Life of the asset or useful life</strong> — in years. The estimated period that an asset can be expected to remain economically feasible.</li><li><strong>Number of years</strong> — in years. Number of years that has passed since the asset was purchased.</li><li><strong>Salvage value</strong> — in USD. The total amount of revenue a company expects to receive for an asset at the end of it&#039;s useful life.</li></ul><p>What you get back is Accumulated depreciation in USD, Net book value in USD, Net book value sys in USD, Accumulated depreciation sys in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Life of the asset or useful life lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Accumulated depreciation</strong> = <code>Number of years × (Cost of the asset − Salvage value) ÷ Life of the asset or useful life</code></li><li><strong>Salvage value</strong> = <code>− Accumulated depreciation × Life of the asset or useful life ÷ Number of years + Cost of the asset</code></li><li><strong>Cost of the asset</strong> = <code>Accumulated depreciation × Life of the asset or useful life ÷ Number of years + Salvage value</code></li><li><strong>Life of the asset or useful life</strong> = <code>Number of years × (Cost of the asset − Salvage value) ÷ Accumulated depreciation</code></li><li><strong>Number of years</strong> = <code>Accumulated depreciation × Life of the asset or useful life ÷ (Cost of the asset − Salvage value)</code></li><li><strong>Net book value</strong> = <code>− Accumulated depreciation + Cost of the asset</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Accumulated depreciation</strong> = <code>Number of years × (Cost of the asset − Salvage value) ÷ Life of the asset or useful life</code> — the form to use when Number of years, Cost of the asset, Salvage value and Life of the asset or useful life are the values you have.</li><li><strong>Salvage value</strong> = <code>− Accumulated depreciation × Life of the asset or useful life ÷ Number of years + Cost of the asset</code> — the form to use when Accumulated depreciation, Life of the asset or useful life, Number of years and Cost of the asset are the values you have.</li><li><strong>Cost of the asset</strong> = <code>Accumulated depreciation × Life of the asset or useful life ÷ Number of years + Salvage value</code> — the form to use when Accumulated depreciation, Life of the asset or useful life, Number of years and Salvage value are the values you have.</li><li><strong>Life of the asset or useful life</strong> = <code>Number of years × (Cost of the asset − Salvage value) ÷ Accumulated depreciation</code> — the form to use when Number of years, Cost of the asset, Salvage value and Accumulated depreciation are the values you have.</li><li><strong>Number of years</strong> = <code>Accumulated depreciation × Life of the asset or useful life ÷ (Cost of the asset − Salvage value)</code> — the form to use when Accumulated depreciation, Life of the asset or useful life, Cost of the asset and Salvage value are the values you have.</li><li><strong>Net book value</strong> = <code>− Accumulated depreciation + Cost of the asset</code> — the form to use when Accumulated depreciation and Cost of the asset are the values you have.</li><li><strong>Accumulated depreciation</strong> = <code>Cost of the asset − Net book value</code> — the form to use when Cost of the asset and Net book value are the values you have.</li><li><strong>Cost of the asset</strong> = <code>Accumulated depreciation + Net book value</code> — the form to use when Accumulated depreciation and Net book value are the values you have.</li></ul><p>Any one of Accumulated depreciation, Salvage value and Cost of the asset can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Life of the asset or useful life and Number of years carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Accumulated depreciation, Net book value and Net book value sys are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Cost of the asset left as a guess.</strong> Anything typed into Cost of the asset is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Life of the asset or useful life left as a guess.</strong> Anything typed into Life of the asset or useful life is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Cost of the asset and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Cost of the asset</strong> takes a plain number with no unit attached. It feeds Accumulated depreciation, Salvage value and Life of the asset or useful life. Have it to hand before you start: Cost of the asset is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Life of the asset or useful life</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The estimated period that an asset can be expected to remain economically feasible. It feeds Accumulated depreciation, Salvage value and Cost of the asset. Have it to hand before you start: Life of the asset or useful life is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of years</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. Number of years that has passed since the asset was purchased. It feeds Accumulated depreciation, Salvage value and Cost of the asset. Have it to hand before you start: Number of years is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Salvage value</strong> takes a plain number with no unit attached. The total amount of revenue a company expects to receive for an asset at the end of it&#039;s useful life. It feeds Accumulated depreciation, Cost of the asset and Life of the asset or useful life. Have it to hand before you start: Salvage value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Accumulated depreciation</strong> is a plain number. The value follows from Number of years, Cost of the asset, Salvage value and Life of the asset or useful life. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Net book value</strong> is a plain number. The value follows from Accumulated depreciation and Cost of the asset. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Net book value sys</strong> is a plain number. The value follows from Expected life/useful life, Requested year, Cost of the asset and Salvage value. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Accumulated depreciation sys</strong> is a plain number. The value follows from Expected life/useful life, Requested year, Cost of the asset and Salvage value. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Accumulated depreciation is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover years. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Cost of the asset, Life of the asset or useful life and Number of years is what you already know and Accumulated depreciation and Net book value is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/ebitda-multiple">EBITDA multiple</a>, <a href="/finance/economic-injury-disaster-loan">Economic Injury Disaster Loan Emergency Advance … Calculator</a> and <a href="/finance/eoq">Economic order quantity (EOQ) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Accumulated depreciation calculator work out?', 'a' => <<<'TXT'
            Accumulated depreciation, Net book value, Net book value sys and Accumulated depreciation sys, from Number of years, Cost of the asset, Salvage value and Life of the asset or useful life. The relationship is Accumulated depreciation = Number of years × (Cost of the asset − Salvage value) ÷ Life of the asset or useful life.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cost of the asset (USD), Life of the asset or useful life (years), Number of years (years), Salvage value (USD). With cost of the asset, life of the asset or useful life and number of years in place, Accumulated depreciation can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Accumulated depreciation, Salvage value, Cost of the asset and Life of the asset or useful life blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Accumulated depreciation is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Cost of the asset left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Accumulated depreciation at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/ebitda-multiple', 'name' => 'EBITDA multiple'],
            ['path' => '/finance/economic-injury-disaster-loan', 'name' => 'Economic Injury Disaster Loan Emergency Advance … Calculator'],
            ['path' => '/finance/eoq', 'name' => 'Economic order quantity (EOQ) Calculator'],
        ],
        'authors' => [],
    ],
];
