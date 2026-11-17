<?php

/**
 * Lottery annuity
 * /finance/lottery-annuity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lottery annuity',
    'meta' => ['title' => 'Lottery annuity Calculator — Formula, Units & Example', 'description' => 'Lottery annuity reports federal tax over the whole payout and state tax over the whole payout. Every box can be solved for, not only the one in the title.', 'h1' => 'Lottery annuity Calculator', 'updated' => '2026-07-13'],
    'raw' => [
        'vars' => [
            'federalOrCustom1' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'filingStatus' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'jwK-X9J-3HO2A7dH-bOIN', 'c' => null],
                ],
                'ds' => 'Pi0hyT0uT1R0FgC9B73Cg',
            ],
            'filingStatusValue' => [
                'type' => 'presentation',
                'rnd' => ['omni', '0.0001'],
            ],
            'netPayout' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'payoutIncrease' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '5', 'c' => null],
                ],
            ],
            'returnRate' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '0', 'c' => null],
                ],
            ],
            'state' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'i3Zhj8TDqz0aaO3OhwEJh', 'c' => null],
                ],
                'ds' => '8Hep-YiB9ZS8z_stezESl',
            ],
            'stateOrCustom2' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'stateTax' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'stateTaxValue' => [
                'type' => 'presentation',
                'rnd' => ['omni', '0.0001'],
            ],
            'taxMode' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'AvWYRoP0KcaUmGwCHWOV3', 'c' => null],
                ],
                'ds' => 'QPw25EsUZ3KdMmADiYSR6',
            ],
            'taxRate' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '0', 'c' => null],
                ],
            ],
            'taxRate2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '0', 'c' => null],
                ],
            ],
            'winnings' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '1000000', 'c' => null],
                ],
            ],
            'years' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '30', 'c' => null],
                ],
            ],
        ],
        'groups' => [
            [
                'uid' => 'Pmh0Q4VykJEociMSmbj-9',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'winnings',
                                    'vt' => 'numerical',
                                    'l' => 'How much did you win?',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'years',
                                    'vt' => 'numerical',
                                    'l' => 'Number of years',
                                    'us' => '19',
                                    'du' => 'yrs',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'payoutIncrease',
                                    'vt' => 'numerical',
                                    'l' => 'Percentage increase of payout',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'returnRate',
                                    'vt' => 'numerical',
                                    'l' => 'Rate of return',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'taxMode',
                                    'vt' => 'valueSelect',
                                    'l' => 'Tax treatment',
                                    'ds' => 'QPw25EsUZ3KdMmADiYSR6',
                                    'opts' => [
                                        ['AvWYRoP0KcaUmGwCHWOV3', 'Without tax', '0'],
                                        ['TfkGuuHx0Int8rbmTlpVP', 'US taxes', '1'],
                                        ['AYZ888KTmBQ2b6oPbzeQ8', 'Customized tax rate', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'filingStatus',
                                    'vt' => 'valueSelect',
                                    'l' => 'Federal filing status',
                                    'h' => 'Set your filing status to determine the federal tax in the relevant tax brackets.',
                                    'ds' => 'Pi0hyT0uT1R0FgC9B73Cg',
                                    'opts' => [
                                        ['jwK-X9J-3HO2A7dH-bOIN', 'Single', '1'],
                                        ['ZPHdN-Gy7WRmlvfd3XubM', 'Married filing jointly', '2'],
                                        ['4hmCOwqlwKELWc42y7dxP', 'Married filing separately', '3'],
                                        ['ENUuF6Ic7JyFpjGk_ia6j', 'Heads of household', '4'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'state',
                                    'vt' => 'valueSelect',
                                    'l' => 'Where do you live?',
                                    'h' => 'The state tax is determined according to your residence.&nbsp;',
                                    'ds' => '8Hep-YiB9ZS8z_stezESl',
                                    'opts' => [
                                        ['Zqc3jp4l0R0Bn6F5CAo-y', 'Alabama', '1'],
                                        ['qUd9k-DBnQKW6pofg_KBj', 'Alaska', '2'],
                                        ['i3Zhj8TDqz0aaO3OhwEJh', 'Arizona', '3'],
                                        ['lcYX37FQYaBfZKCKv0q62', 'Arkansas', '4'],
                                        ['X0G2hDo3I-wsG9EdeWnlm', 'California', '5'],
                                        ['Gu4tnSmctcgdmdaCp7vRt', 'Colorado', '6'],
                                        ['4zg3Avq1vDJfxdXCGJySC', 'Connecticut', '7'],
                                        ['VOtU3JCb4f4YJkFs5wk0P', 'Delaware', '8'],
                                        ['M0Qh98ATG6M1g6sEu5SJf', 'Florida', '9'],
                                        ['eGSAFhN6VTviZnp-WXqEB', 'Georgia', '10'],
                                        ['GuYwKT9rglPKIDMYkIOJ0', 'Hawaii', '11'],
                                        ['LBp9fmXfvlSKekJkKVbBa', 'Idaho', '12'],
                                        ['MhVNf66cZWTTK9xBpxlbZ', 'Illinois', '13'],
                                        ['IGDUGB_x7bphAQwro95Ra', 'Indiana', '14'],
                                        ['vH7RVGSgr-qdfamzO-k4N', 'Iowa', '15'],
                                        ['qzgv6l6eGtWhcpDmIYj6S', 'Kansas', '16'],
                                        ['gd6GMuOvn8K4BKYgoPrXl', 'Kentucky', '17'],
                                        ['XUpgLByGiRHEaCN7pcr1t', 'Louisiana', '18'],
                                        ['DYvkOzH1ihetowuTdbDX9', 'Maine', '19'],
                                        ['O3V1nf-VYr3EzEFMGaMxo', 'Maryland', '20'],
                                        ['mMQlLt4MhUMnPxTpNQGex', 'Massachusetts', '21'],
                                        ['sUNdOYKDxA5ZphDjArQKt', 'Michigan', '22'],
                                        ['kENaY5-DMHpR2RqR2KrvW', 'Minnesota', '23'],
                                        ['8zckuDjfFFVhca8zfQHNR', 'Mississippi', '24'],
                                        ['rjXYSTmGiP1NTpCu48B1z', 'Missouri', '25'],
                                        ['S1hYw9YPFRhLcn4fRjRXk', 'Montana', '26'],
                                        ['cobKDbRxXZCRCwygCv2u4', 'Nebraska', '27'],
                                        ['9aCyG0MoVTOdrT31ic9An', 'Nevada', '28'],
                                        ['ctLB2IONIblg5T7uqIqC-', 'New Hampshire', '29'],
                                        ['4BlZLrxTckBASedNzyohF', 'New Jersey', '30'],
                                        ['buouA0RYN1Zm5RtxsKkTX', 'New Mexico', '31'],
                                        ['ZbGt8X9g5BuIJ3ZC8JDZE', 'New York', '32'],
                                        ['0n76UonZQlsJOxnRDCosC', 'North Carolina', '33'],
                                        ['Z9shctlmkdNoelW2rXPIJ', 'North Dakota', '34'],
                                        ['HELVvzdublZHqnK-OhdXt', 'Ohio', '35'],
                                        ['xTU0RUjKimOsK2OZ2qcND', 'Oklahoma', '36'],
                                        ['dUtMLnZ7t1LYz4NW87lQt', 'Oregon', '37'],
                                        ['yXWVD9OvtWR7uk7H31U_I', 'Pennsylvania', '38'],
                                        ['yuMCTSj1FydZdG-IkEKIt', 'Rhode Island', '39'],
                                        ['xZlsgC4VJt4mK6JpCSF1l', 'South Carolina', '40'],
                                        ['8SHCmwmJub9RQ-DDiDK2o', 'South Dakota', '41'],
                                        ['C5BZ9qLhgwKvpqMz3NZGP', 'Tennessee', '42'],
                                        ['8kyghG9aypTsgkqIlpKdT', 'Texas', '43'],
                                        ['fZBkas30xQgTwK1fwSFCd', 'Utah', '44'],
                                        ['suRbTQTLxYI-eEqc7ijl9', 'Vermont', '45'],
                                        ['yi1DoeT9KiLcUVCN0e8pl', 'Virginia', '46'],
                                        ['gHnjYqd-8NRXdieVhyvZF', 'Washington', '47'],
                                        ['u416iedU8PrqWiC4u_1xc', 'West Virginia', '48'],
                                        ['4VNbCb8spt4CBklmWNVWe', 'Wisconsin', '49'],
                                        ['YMIyo6WTda9Jaq4YXWN9U', 'Wyoming', '50'],
                                        ['DxgACpBLiAWBYCg_C12Oc', 'Washington, D.C.', '51'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'stateTax',
                                    'vt' => 'dependent',
                                    'l' => 'State tax rate',
                                    'suf' => '%',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'taxRate',
                                    'vt' => 'numerical',
                                    'l' => 'Tax rate I.',
                                    'h' => 'Optional tax rate applied to the annuity payout.',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'taxRate2',
                                    'vt' => 'numerical',
                                    'l' => 'Tax rate II.',
                                    'h' => 'Optional tax rate applied to the annuity payout.',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'RdLPQYGmjrGiaW_tvObVR',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'federalOrCustom1',
                                    'vt' => 'numerical',
                                    'l' => 'Federal or custom1',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'stateOrCustom2',
                                    'vt' => 'numerical',
                                    'l' => 'State or custom2',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'netPayout',
                                    'vt' => 'numerical',
                                    'l' => 'Net payout',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'filingStatusValue', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'stateTaxValue', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'supp-outputs',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'federalOrCustom1',
                                    'vt' => 'numerical',
                                    'l' => 'Federal tax over the whole payout',
                                    'oo' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'stateOrCustom2',
                                    'vt' => 'numerical',
                                    'l' => 'State tax over the whole payout',
                                    'oo' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'netPayout',
                                    'vt' => 'numerical',
                                    'l' => 'What you keep, after tax',
                                    'oo' => 1,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'federalOrCustom1 = getFederalOrCustom1(…)',
                'var' => [
                    [
                        'l' => 'federalOrCustom1',
                        'f' => 'getFederalOrCustom1(winnings, years/31557600, payoutIncrease, returnRate, taxMode, filingStatus, stateTax, taxRate, taxRate2)',
                        'r' => [
                            'winnings',
                            'years',
                            'payoutIncrease',
                            'returnRate',
                            'taxMode',
                            'filingStatus',
                            'stateTax',
                            'taxRate',
                            'taxRate2',
                        ],
                    ],
                    [
                        'l' => 'federalOrCustom1',
                        'f' => 'getFederalOrCustom1(winnings, years/31557600, payoutIncrease, returnRate, taxMode, filingStatus, 0, taxRate, taxRate2)',
                        'r' => [
                            'winnings',
                            'years',
                            'payoutIncrease',
                            'returnRate',
                            'taxMode',
                            'filingStatus',
                            'taxRate',
                            'taxRate2',
                        ],
                    ],
                    [
                        'l' => 'federalOrCustom1',
                        'f' => 'getFederalOrCustom1(winnings, years/31557600, payoutIncrease, returnRate, taxMode, filingStatus, stateTax, 0, 0)',
                        'r' => [
                            'winnings',
                            'years',
                            'payoutIncrease',
                            'returnRate',
                            'taxMode',
                            'filingStatus',
                            'stateTax',
                        ],
                    ],
                    [
                        'l' => 'federalOrCustom1',
                        'f' => 'getFederalOrCustom1(winnings, years/31557600, payoutIncrease, returnRate, taxMode, filingStatus, 0, 0, 0)',
                        'r' => [
                            'winnings',
                            'years',
                            'payoutIncrease',
                            'returnRate',
                            'taxMode',
                            'filingStatus',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'stateOrCustom2 = getStateOrCustom2(taxMode)',
                'var' => [
                    [
                        'l' => 'stateOrCustom2',
                        'f' => 'getStateOrCustom2(taxMode)',
                        'r' => ['taxMode'],
                    ],
                ],
            ],
            [
                'formula' => 'netPayout = getNetPayout(taxMode)',
                'var' => [
                    [
                        'l' => 'netPayout',
                        'f' => 'getNetPayout(taxMode)',
                        'r' => ['taxMode', 'federalOrCustom1'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'QPw25EsUZ3KdMmADiYSR6' => [
                'name' => 'Tax mode',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'AvWYRoP0KcaUmGwCHWOV3', 'label' => 'Without tax', 'value' => '0'],
                    ['uid' => 'TfkGuuHx0Int8rbmTlpVP', 'label' => 'US taxes', 'value' => '1'],
                    ['uid' => 'AYZ888KTmBQ2b6oPbzeQ8', 'label' => 'Customized tax rate', 'value' => '2'],
                ],
            ],
            'Pi0hyT0uT1R0FgC9B73Cg' => [
                'name' => 'Federal filing status',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'jwK-X9J-3HO2A7dH-bOIN', 'label' => 'Single', 'value' => '1'],
                    ['uid' => 'ZPHdN-Gy7WRmlvfd3XubM', 'label' => 'Married filing jointly', 'value' => '2'],
                    ['uid' => '4hmCOwqlwKELWc42y7dxP', 'label' => 'Married filing separately', 'value' => '3'],
                    ['uid' => 'ENUuF6Ic7JyFpjGk_ia6j', 'label' => 'Heads of household', 'value' => '4'],
                ],
            ],
            '8Hep-YiB9ZS8z_stezESl' => [
                'name' => 'Where do you live?',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'Zqc3jp4l0R0Bn6F5CAo-y', 'label' => 'Alabama', 'value' => '1'],
                    ['uid' => 'qUd9k-DBnQKW6pofg_KBj', 'label' => 'Alaska', 'value' => '2'],
                    ['uid' => 'i3Zhj8TDqz0aaO3OhwEJh', 'label' => 'Arizona', 'value' => '3'],
                    ['uid' => 'lcYX37FQYaBfZKCKv0q62', 'label' => 'Arkansas', 'value' => '4'],
                    ['uid' => 'X0G2hDo3I-wsG9EdeWnlm', 'label' => 'California', 'value' => '5'],
                    ['uid' => 'Gu4tnSmctcgdmdaCp7vRt', 'label' => 'Colorado', 'value' => '6'],
                    ['uid' => '4zg3Avq1vDJfxdXCGJySC', 'label' => 'Connecticut', 'value' => '7'],
                    ['uid' => 'VOtU3JCb4f4YJkFs5wk0P', 'label' => 'Delaware', 'value' => '8'],
                    ['uid' => 'M0Qh98ATG6M1g6sEu5SJf', 'label' => 'Florida', 'value' => '9'],
                    ['uid' => 'eGSAFhN6VTviZnp-WXqEB', 'label' => 'Georgia', 'value' => '10'],
                    ['uid' => 'GuYwKT9rglPKIDMYkIOJ0', 'label' => 'Hawaii', 'value' => '11'],
                    ['uid' => 'LBp9fmXfvlSKekJkKVbBa', 'label' => 'Idaho', 'value' => '12'],
                    ['uid' => 'MhVNf66cZWTTK9xBpxlbZ', 'label' => 'Illinois', 'value' => '13'],
                    ['uid' => 'IGDUGB_x7bphAQwro95Ra', 'label' => 'Indiana', 'value' => '14'],
                    ['uid' => 'vH7RVGSgr-qdfamzO-k4N', 'label' => 'Iowa', 'value' => '15'],
                    ['uid' => 'qzgv6l6eGtWhcpDmIYj6S', 'label' => 'Kansas', 'value' => '16'],
                    ['uid' => 'gd6GMuOvn8K4BKYgoPrXl', 'label' => 'Kentucky', 'value' => '17'],
                    ['uid' => 'XUpgLByGiRHEaCN7pcr1t', 'label' => 'Louisiana', 'value' => '18'],
                    ['uid' => 'DYvkOzH1ihetowuTdbDX9', 'label' => 'Maine', 'value' => '19'],
                    ['uid' => 'O3V1nf-VYr3EzEFMGaMxo', 'label' => 'Maryland', 'value' => '20'],
                    ['uid' => 'mMQlLt4MhUMnPxTpNQGex', 'label' => 'Massachusetts', 'value' => '21'],
                    ['uid' => 'sUNdOYKDxA5ZphDjArQKt', 'label' => 'Michigan', 'value' => '22'],
                    ['uid' => 'kENaY5-DMHpR2RqR2KrvW', 'label' => 'Minnesota', 'value' => '23'],
                    ['uid' => '8zckuDjfFFVhca8zfQHNR', 'label' => 'Mississippi', 'value' => '24'],
                    ['uid' => 'rjXYSTmGiP1NTpCu48B1z', 'label' => 'Missouri', 'value' => '25'],
                    ['uid' => 'S1hYw9YPFRhLcn4fRjRXk', 'label' => 'Montana', 'value' => '26'],
                    ['uid' => 'cobKDbRxXZCRCwygCv2u4', 'label' => 'Nebraska', 'value' => '27'],
                    ['uid' => '9aCyG0MoVTOdrT31ic9An', 'label' => 'Nevada', 'value' => '28'],
                    ['uid' => 'ctLB2IONIblg5T7uqIqC-', 'label' => 'New Hampshire', 'value' => '29'],
                    ['uid' => '4BlZLrxTckBASedNzyohF', 'label' => 'New Jersey', 'value' => '30'],
                    ['uid' => 'buouA0RYN1Zm5RtxsKkTX', 'label' => 'New Mexico', 'value' => '31'],
                    ['uid' => 'ZbGt8X9g5BuIJ3ZC8JDZE', 'label' => 'New York', 'value' => '32'],
                    ['uid' => '0n76UonZQlsJOxnRDCosC', 'label' => 'North Carolina', 'value' => '33'],
                    ['uid' => 'Z9shctlmkdNoelW2rXPIJ', 'label' => 'North Dakota', 'value' => '34'],
                    ['uid' => 'HELVvzdublZHqnK-OhdXt', 'label' => 'Ohio', 'value' => '35'],
                    ['uid' => 'xTU0RUjKimOsK2OZ2qcND', 'label' => 'Oklahoma', 'value' => '36'],
                    ['uid' => 'dUtMLnZ7t1LYz4NW87lQt', 'label' => 'Oregon', 'value' => '37'],
                    ['uid' => 'yXWVD9OvtWR7uk7H31U_I', 'label' => 'Pennsylvania', 'value' => '38'],
                    ['uid' => 'yuMCTSj1FydZdG-IkEKIt', 'label' => 'Rhode Island', 'value' => '39'],
                    ['uid' => 'xZlsgC4VJt4mK6JpCSF1l', 'label' => 'South Carolina', 'value' => '40'],
                    ['uid' => '8SHCmwmJub9RQ-DDiDK2o', 'label' => 'South Dakota', 'value' => '41'],
                    ['uid' => 'C5BZ9qLhgwKvpqMz3NZGP', 'label' => 'Tennessee', 'value' => '42'],
                    ['uid' => '8kyghG9aypTsgkqIlpKdT', 'label' => 'Texas', 'value' => '43'],
                    ['uid' => 'fZBkas30xQgTwK1fwSFCd', 'label' => 'Utah', 'value' => '44'],
                    ['uid' => 'suRbTQTLxYI-eEqc7ijl9', 'label' => 'Vermont', 'value' => '45'],
                    ['uid' => 'yi1DoeT9KiLcUVCN0e8pl', 'label' => 'Virginia', 'value' => '46'],
                    ['uid' => 'gHnjYqd-8NRXdieVhyvZF', 'label' => 'Washington', 'value' => '47'],
                    ['uid' => 'u416iedU8PrqWiC4u_1xc', 'label' => 'West Virginia', 'value' => '48'],
                    ['uid' => '4VNbCb8spt4CBklmWNVWe', 'label' => 'Wisconsin', 'value' => '49'],
                    ['uid' => 'YMIyo6WTda9Jaq4YXWN9U', 'label' => 'Wyoming', 'value' => '50'],
                    ['uid' => 'DxgACpBLiAWBYCg_C12Oc', 'label' => 'Washington, D.C.', 'value' => '51'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";var outTableResultCopy=[];var VarSub=2;var VarTime=1;var VarType=0;var m=1;var q=1;var g_p=0.05;var FinBal=0;var PerPay=8000;omni.define("getFederalOrCustom1",function(winnings,years,payoutIncrease,returnRate,taxMode,filingStatus,stateTax,taxRate,taxRate2){var g=0.05;var InDep=Number(winnings);var t=Number(years);g=Number(payoutIncrease);var r=Number(returnRate);var VarMode=Number(taxMode);var VarStat=Number(filingStatus);var VarTax=Number(stateTax);var TaxRate=Number(taxRate);var TaxRate2=Number(taxRate2);if(VarMode==0){VarTax=0}VarTax=VarTax/100;if(VarMode==2){VarTax=TaxRate2}var periods=0;if(VarTime==1){periods=q*t}var eq_p=getPerEqRate(q,m,r);if(VarSub==2){PerPay=getPayOut(InDep,FinBal,periods,q,eq_p,g_p,g,VarType)}var k=12;var perChart=periods*k;var outMonth1=[];var outYear1=[];var yearChart=0;var i;var DepBal=0;var iDep=0;var InBal=0;var TotBal=0;var TotBalOpen=0;var TotIntMonth=0;var YearDep=0;var DepBalOpen=0;var InBalOpen=0;var dep_pow=0;var dep_powOpen=0;var TotCashFlow=0;var TotReturn=0;var TotTaxFed=0;var TotTaxFed_24=0;var TotTaxState=0;var g_month=getMonthlyGrowthRate(g);var TaxAmFed_24=0;var TaxAmFed=0;var TaxAmState=0;var NetPayOut=0;for(i=0;i<=perChart;i++){if(i>0){dep_pow=i/12*q;if(q<=12){dep_powOpen=(i-k)/12*q}else{dep_powOpen=(i-1)/12*q}InBal=InDep*Math.pow(1+eq_p,dep_pow);InBalOpen=InDep*Math.pow(1+eq_p,dep_powOpen);DepBal=getBal(PerPay,dep_pow,q,eq_p,g_p,g,VarType);DepBalOpen=getBal(PerPay,dep_powOpen,q,eq_p,g_p,g,VarType);TotBal=InBal+DepBal;TotBalOpen=InBalOpen+DepBalOpen;if(i%k==0&&q<=12){iDep=PerPay*Math.pow(1+g_month,i-k);TotIntMonth=TotBal-TotBalOpen-iDep}if(i%k!==0&&q<=12){iDep=0;TotIntMonth=0}if(i%12==1){YearDep=0}if(i%12==0){yearChart=1}else{yearChart=0}YearDep+=-iDep;if(VarMode==1){TaxAmFed_24=YearDep*0.24}else{TaxAmFed_24=0}if(VarMode==1){TaxAmFed=getTaxFed(YearDep,VarStat)-TaxAmFed_24}else if(VarMode==2){TaxAmFed=YearDep*TaxRate}else if(VarMode==3){TaxAmFed=0}TaxAmState=-iDep*VarTax;NetPayOut=-iDep-(TaxAmFed+TaxAmFed_24+TaxAmState);TotReturn+=TotIntMonth;TotCashFlow+=NetPayOut;TotTaxFed_24+=TaxAmFed_24;TotTaxFed+=TaxAmFed;TotTaxState+=TaxAmState;outMonth1.push([i,TotBalOpen,-iDep,TotIntMonth,TotBal,TotCashFlow,TotReturn]);if(yearChart==1){outYear1.push([i/12,Math.round(YearDep),Math.round(TaxAmFed+TaxAmFed_24),Math.round(TaxAmState),Math.round(NetPayOut)])}}}var outTableResult=[];outTableResult.push([InDep],[TotTaxFed_24+TotTaxFed],[TotTaxState],[TotCashFlow]);outTableResultCopy=outTableResult;if(VarMode==1||VarMode==2){return Number(outTableResult[1])}});omni.define("getStateOrCustom2",function(taxMode){if(taxMode){return Number(outTableResultCopy[2])}});omni.define("getNetPayout",function(taxMode){if(taxMode){return Number(outTableResultCopy[3])}});function getBal(PerPay,periods,q,eq_p,g_p,g,VarType){var DepBal;if(g_p!==eq_p&&q!==1){DepBal=PerPay*(Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p)}else if(g!==eq_p&&q==1){DepBal=PerPay*(Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g)}else if(g_p==eq_p){DepBal=PerPay*periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*VarType)}return DepBal}function getPayOut(InDep,FinBal,periods,q,eq_p,g_p,g,VarType){var _perPay;var PrincBal=InDep*Math.pow(1+eq_p,periods);var DepBal=FinBal-PrincBal;if(g!==eq_p&&q==1){_perPay=DepBal/((Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g))}else if(g_p==eq_p){_perPay=DepBal/(periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*VarType))}return _perPay}function getPerEqRate(q,_m,r){var ex=Math.exp(1);var base;if(_m==0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq_p=mathjs.round(mathjs.pow(base,power)-1,10);return eq_p}function getMonthlyGrowthRate(g){var Max_iterations=50000;var Min_precision=1e-10;var g_month=g/12;var oldG;var newG=g_month;var iteration=0;do{oldG=newG;var dividend_g=Math.pow(1+newG,12)-(g+1);var divisor_g=12*Math.pow(g+1,11);newG=newG-dividend_g/divisor_g;++iteration}while(Math.abs(oldG-newG)>Min_precision&&iteration<=Max_iterations);return newG}function getTaxFed(Inc,VarStat){var Brack1;var Brack2;var Brack3;var Brack4;var Brack5;var Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=12400;var UnmarBrack2=50400;var UnmarBrack3=105700;var UnmarBrack4=201775;var UnmarBrack5=256225;var UnmarBrack6=640600;var MarJointBrack1=24800;var MarJointBrack2=100800;var MarJointBrack3=211400;var MarJointBrack4=403500;var MarJointBrack5=512450;var MarJointBrack6=768700;var MarSepBrack1=12400;var MarSepBrack2=50400;var MarSepBrack3=105700;var MarSepBrack4=201775;var MarSepBrack5=256225;var MarSepBrack6=384350;var HeadBrack1=17700;var HeadBrack2=67450;var HeadBrack3=105700;var HeadBrack4=201775;var HeadBrack5=256200;var HeadBrack6=640600;var TaxFed;if(VarStat==1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat==2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat==3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat==4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Lottery annuity works out State tax rate and Federal tax over the whole payout from How much did you win?, Number of years and Percentage increase of payout. Nothing is looked up on this page: state tax rate is computed from how much did you win? and the other boxes, so an unusual pair of values gives an honest answer rather than an error. State tax rate is opened in %; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Lottery annuity calculator works', 'html' => <<<'TXT'
            <p>Lottery annuity answers one question from 12 numbers, and the answer is State tax rate, Federal tax over the whole payout and State tax over the whole payout.</p><p>In the form&#039;s own words, Federal tax over the whole payout = getFederalOrCustom1(How much did you win?, Number of years ÷ 31557600, Percentage increase of payout, Rate of return, Tax treatment, Federal filing status, State tax rate, Tax rate I., Tax rate II.).</p><p>What comes back is State tax rate, Federal tax over the whole payout, State tax over the whole payout and What you keep, after tax — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 12 boxes, and nothing else.</p><ul><li><strong>How much did you win?</strong> — in USD</li><li><strong>Number of years</strong> — in years</li><li><strong>Percentage increase of payout</strong> — in percent</li><li><strong>Rate of return</strong> — in percent</li><li><strong>Tax treatment</strong> — a plain number, no unit</li><li><strong>Federal filing status</strong> — a plain number, no unit. Set your filing status to determine the federal tax in the relevant tax brackets.</li><li><strong>Where do you live?</strong> — a plain number, no unit. The state tax is determined according to your residence.&amp;nbsp;</li><li><strong>Tax rate I</strong> — in percent. Optional tax rate applied to the annuity payout.</li><li><strong>Tax rate II</strong> — in percent. Optional tax rate applied to the annuity payout.</li><li><strong>Federal tax over the whole payout</strong> — a plain number, no unit</li><li><strong>State tax over the whole payout</strong> — a plain number, no unit</li><li><strong>What you keep, after tax</strong> — a plain number, no unit</li></ul><p>The result boxes are State tax rate in %, Federal tax over the whole payout, State tax over the whole payout, What you keep, after tax; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Number of years lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Federal tax over the whole payout</strong> = <code>getFederalOrCustom1(How much did you win?, Number of years ÷ 31557600, Percentage increase of payout, Rate of return, Tax treatment, Federal filing status, State tax rate, Tax rate I., Tax rate II.)</code></li><li><strong>State tax over the whole payout</strong> = <code>getStateOrCustom2(Tax treatment)</code></li><li><strong>What you keep, after tax</strong> = <code>getNetPayout(Tax treatment)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Federal tax over the whole payout</strong> = <code>getFederalOrCustom1(How much did you win?, Number of years ÷ 31557600, Percentage increase of payout, Rate of return, Tax treatment, Federal filing status, State tax rate, Tax rate I., Tax rate II.)</code> — the form to use when How much did you win?, Number of years, Percentage increase of payout and Rate of return are the values you have.</li><li><strong>Federal tax over the whole payout</strong> = <code>getFederalOrCustom1(How much did you win?, Number of years ÷ 31557600, Percentage increase of payout, Rate of return, Tax treatment, Federal filing status, 0, Tax rate I., Tax rate II.)</code> — the form to use when How much did you win?, Number of years, Percentage increase of payout and Rate of return are the values you have.</li><li><strong>Federal tax over the whole payout</strong> = <code>getFederalOrCustom1(How much did you win?, Number of years ÷ 31557600, Percentage increase of payout, Rate of return, Tax treatment, Federal filing status, State tax rate, 0, 0)</code> — the form to use when How much did you win?, Number of years, Percentage increase of payout and Rate of return are the values you have.</li><li><strong>Federal tax over the whole payout</strong> = <code>getFederalOrCustom1(How much did you win?, Number of years ÷ 31557600, Percentage increase of payout, Rate of return, Tax treatment, Federal filing status, 0, 0, 0)</code> — the form to use when How much did you win?, Number of years, Percentage increase of payout and Rate of return are the values you have.</li><li><strong>State tax over the whole payout</strong> = <code>getStateOrCustom2(Tax treatment)</code> — the form to use when Tax treatment are the values you have.</li><li><strong>What you keep, after tax</strong> = <code>getNetPayout(Tax treatment)</code> — the form to use when Tax treatment and Federal tax over the whole payout are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Federal tax over the whole payout, State tax over the whole payout and What you keep, after tax can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Number of years, Percentage increase of payout and Rate of return carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> State tax rate, Federal tax over the whole payout and State tax over the whole payout are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>How much did you win? left as a guess.</strong> Anything typed into How much did you win? is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Number of years left as a guess.</strong> Anything typed into Number of years is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If How much did you win? is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Lottery annuity form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>How much did you win?</strong> takes a plain number with no unit attached. It feeds Federal tax over the whole payout. Fill it from a measurement rather than a memory — How much did you win? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of years</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. It feeds Federal tax over the whole payout. Fill it from a measurement rather than a memory — Number of years is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Percentage increase of payout</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Federal tax over the whole payout. Fill it from a measurement rather than a memory — Percentage increase of payout is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Rate of return</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Federal tax over the whole payout. Fill it from a measurement rather than a memory — Rate of return is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Tax treatment</strong> takes a plain number with no unit attached. It feeds Federal tax over the whole payout, State tax over the whole payout and What you keep, after tax. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Tax treatment is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Federal filing status</strong> takes a plain number with no unit attached. Set your filing status to determine the federal tax in the relevant tax brackets. It feeds Federal tax over the whole payout. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Federal filing status is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Where do you live?</strong> takes a plain number with no unit attached. The state tax is determined according to your residence.&amp;nbsp;. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Where do you live? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Tax rate I</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Optional tax rate applied to the annuity payout. It feeds Federal tax over the whole payout. Fill it from a measurement rather than a memory — Tax rate I is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Tax rate II</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Optional tax rate applied to the annuity payout. It feeds Federal tax over the whole payout. Fill it from a measurement rather than a memory — Tax rate II is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Federal tax over the whole payout</strong> takes a plain number with no unit attached. It feeds What you keep, after tax. Fill it from a measurement rather than a memory — Federal tax over the whole payout is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>State tax over the whole payout</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — State tax over the whole payout is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>What you keep, after tax</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — What you keep, after tax is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind State tax rate is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover years and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: How much did you win?, Number of years and Percentage increase of payout measured, State tax rate and Federal tax over the whole payout wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/net-operating-income">Net operating income Calculator</a>, <a href="/finance/net-operating-working-capital">Net operating working capital</a> and <a href="/finance/net-profit-margin">Net profit margin Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lottery annuity calculator work out?', 'a' => <<<'TXT'
            State tax rate, Federal tax over the whole payout, State tax over the whole payout and What you keep, after tax, from How much did you win?, Number of years, Percentage increase of payout and Rate of return. The relationship is Federal tax over the whole payout = getFederalOrCustom1(How much did you win?, Number of years ÷ 31557600, Percentage increase of payout, Rate of return, Tax treatment, Federal filing status, State tax rate, Tax rate I., Tax rate II.).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            How much did you win? (USD), Number of years (years), Percentage increase of payout (percent), Rate of return (percent), Tax treatment. Fill how much did you win?, number of years and percentage increase of payout and leave State tax rate empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Federal tax over the whole payout, State tax over the whole payout and What you keep, after tax can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            State tax rate is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave How much did you win? blank and the page solves for it, reporting State tax rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of State tax rate keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/net-operating-income', 'name' => 'Net operating income Calculator'],
            ['path' => '/finance/net-operating-working-capital', 'name' => 'Net operating working capital'],
            ['path' => '/finance/net-profit-margin', 'name' => 'Net profit margin Calculator'],
        ],
        'authors' => [],
    ],
];
