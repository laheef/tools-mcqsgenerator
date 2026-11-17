<?php

/**
 * Paypal fee
 * /finance/paypal-fee
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Paypal fee',
    'meta' => ['title' => 'Paypal fee Calculator: Formula, Steps & Examples', 'description' => 'Paypal fee turns transaction type, sender currency and your currency into variable fee (micro) and estimated mid-market rate. Every figure is computed.', 'h1' => 'Paypal fee Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The calculator was created using the PayPal fee structure as of 2022 and may not reflect recent changes.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Transaction details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'priceCategory',
                            'label' => 'Transaction type',
                            'type' => 'select',
                            'options' => ['Standard online transaction' => '0', 'Micropayment' => '1'],
                            'dataset' => 'pricecategoryVS',
                            'help' => 'What rate is applied to your PayPal fee?',
                            'default' => 'Standard online transaction',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'senderCurrency',
                            'label' => 'Sender currency',
                            'type' => 'select',
                            'options' => [
                                'U.S. Dollar (USD)' => '200',
                                'U.K. Pounds Sterling (GBP)' => '201',
                                'Euro (EUR)' => '202',
                                'Canadian Dollar (CAD)' => '203',
                                'Australian Dollar (AUD)' => '204',
                                'Brazilian Real (BRL)' => '205',
                                'Czech Koruna (CZK)' => '206',
                                'Danish Krone (DKK)' => '207',
                                'Hong Kong Dollar (HKD)' => '208',
                                'Hungarian Forint (HUF)' => '209',
                                'Israeli Shekel (ILS)' => '210',
                                'Japanese Yen (JPY)' => '211',
                                'Malaysian Ringgit (MYR)' => '212',
                                'Mexican Peso (MXN)' => '213',
                                'New Zealand Dollar (NZD)' => '214',
                                'Norwegian Krone (NOK)' => '215',
                                'Philippine Peso (PHP)' => '216',
                                'Polish Zloty (PLN)' => '217',
                                'Russian Ruble (RUB)' => '218',
                                'Swedish Krona (SEK)' => '219',
                                'Singapore Dollar (SGD)' => '220',
                                'Swiss Franc (CHF)' => '221',
                                'Taiwan New Dollar (TWD)' => '222',
                                'Thai Baht (THB)' => '223',
                            ],
                            'dataset' => 'feeCurrencyVS',
                            'control' => 'DROPDOWN',
                            'help' => 'Currency you are being paid in.',
                            'default' => 'U.S. Dollar (USD)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'feeCurrency',
                            'label' => 'Your currency',
                            'type' => 'select',
                            'options' => [
                                'U.S. Dollar (USD)' => '200',
                                'U.K. Pounds Sterling (GBP)' => '201',
                                'Euro (EUR)' => '202',
                                'Canadian Dollar (CAD)' => '203',
                                'Australian Dollar (AUD)' => '204',
                                'Brazilian Real (BRL)' => '205',
                                'Czech Koruna (CZK)' => '206',
                                'Danish Krone (DKK)' => '207',
                                'Hong Kong Dollar (HKD)' => '208',
                                'Hungarian Forint (HUF)' => '209',
                                'Israeli Shekel (ILS)' => '210',
                                'Japanese Yen (JPY)' => '211',
                                'Malaysian Ringgit (MYR)' => '212',
                                'Mexican Peso (MXN)' => '213',
                                'New Zealand Dollar (NZD)' => '214',
                                'Norwegian Krone (NOK)' => '215',
                                'Philippine Peso (PHP)' => '216',
                                'Polish Zloty (PLN)' => '217',
                                'Russian Ruble (RUB)' => '218',
                                'Swedish Krona (SEK)' => '219',
                                'Singapore Dollar (SGD)' => '220',
                                'Swiss Franc (CHF)' => '221',
                                'Taiwan New Dollar (TWD)' => '222',
                                'Thai Baht (THB)' => '223',
                            ],
                            'dataset' => 'feeCurrencyVS',
                            'control' => 'DROPDOWN',
                            'help' => 'Currency your PayPal account or linked bank account is denominated in.',
                            'default' => 'U.S. Dollar (USD)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amount',
                            'label' => 'Amount being sent',
                            'type' => 'number',
                            'help' => 'Amount you are sending or expecting.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The Standard payment rate may charge fewer fees.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fix_fee',
                            'label' => 'Fixed fee',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fixmicro_fee',
                            'label' => 'Fixed fee (micro)',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'var_fee',
                            'label' => 'Variable fee',
                            'type' => 'result',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'varmicro_fee',
                            'label' => 'Variable fee (micro)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'decideExchangeRate',
                            'label' => 'Exchange rate to use',
                            'type' => 'select',
                            'options' => ['Estimated exchange rate' => '0', 'Custom' => '1'],
                            'dataset' => 'decideexchangeVS',
                            'help' => 'Use the estimated exchange rate or provide your own exchange rate according to current date.',
                            'default' => 'Estimated exchange rate',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'exchangeRate',
                            'label' => 'Estimated mid-market rate',
                            'type' => 'number',
                            'help' => 'Mid-market rate (last updated January 22, 2021).',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'exchangeRateCustom',
                            'label' => 'Mid-market rate',
                            'type' => 'number',
                            'help' => 'Provide the current mid-market rate.',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'paypalRate',
                            'label' => 'Estimated PayPal rate',
                            'type' => 'number',
                            'help' => 'Estimated PayPal\'s exchange rate based on the Mid-market rate.',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'paypalRateCustom',
                            'label' => 'Estimated PayPal rate',
                            'type' => 'number',
                            'help' => 'Estimated PayPal\'s exchange rate based on the Mid-market rate.',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amountInterTrans',
                            'label' => 'Amount after conversion',
                            'type' => 'number',
                            'help' => 'Amount in your currency before fees.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amountInterTransCustom',
                            'label' => 'Amount after conversion',
                            'type' => 'number',
                            'help' => 'Amount in your currency before fees.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'curConvertFee',
                            'label' => 'Currency Conversion fee',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interTransFee',
                            'label' => 'International Transfer fee',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.5',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Result',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'All values are shown in the currency selected in the Your currency field above.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'paypalFee',
                            'label' => 'PayPal fee',
                            'type' => 'number',
                            'help' => 'Total amount that goes to PayPal as fee for this transaction.',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'youReceive',
                            'label' => 'You receive',
                            'type' => 'number',
                            'help' => 'Amount you receive in your local currency.',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'paypalFeeMicro',
                            'label' => 'PayPal fee',
                            'type' => 'number',
                            'help' => 'Total amount that goes to PayPal as fee for this transaction.',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'youReceiveMicro',
                            'label' => 'You receive',
                            'type' => 'number',
                            'help' => 'Amount you receive in your local currency.',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'paypalFeeInterTrans',
                            'label' => 'PayPal fee',
                            'type' => 'number',
                            'help' => 'Total amount that goes to PayPal as fee for this transaction (including the FX gap).',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'paypalFeeInterTransCustom',
                            'label' => 'PayPal fee',
                            'type' => 'number',
                            'help' => 'Total amount that goes to PayPal as fee for this transaction (including the FX gap).',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'youReceiveInterTrans',
                            'label' => 'You receive',
                            'type' => 'number',
                            'help' => 'Amount you receive in your local currency.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'youReceiveInterTransCustom',
                            'label' => 'You receive',
                            'type' => 'number',
                            'help' => 'Amount you receive in your local currency.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'paypalFeeMicroInterTrans',
                            'label' => 'PayPal fee',
                            'type' => 'number',
                            'help' => 'Total amount that goes to PayPal as fee for this transaction (including the FX gap).',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'paypalFeeMicroInterTransCustom',
                            'label' => 'PayPal fee',
                            'type' => 'number',
                            'help' => 'Total amount that goes to PayPal as fee for this transaction (including the FX gap).',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'youReceiveMicroInterTrans',
                            'label' => 'You receive',
                            'type' => 'number',
                            'help' => 'Amount you receive in your local currency.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'youReceiveMicroInterTransCustom',
                            'label' => 'You receive',
                            'type' => 'number',
                            'help' => 'Amount you receive in your local currency.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'priceCategory == 0', 'text' => 'If you are sent {{feeCurrency.name}} from abroad, you will receive {{youReceiveAbroad.formattedValue}}&nbsp;{{feeCurrency.name}}.'],
                                ['when' => 'priceCategory == 1', 'text' => 'If you are sent {{feeCurrency.name}} from abroad, you will receive {{youReceiveMicroAbroad.formattedValue}}&nbsp;{{feeCurrency.name}}.'],
                            ],
                        ],
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
                            'name' => 'youReceiveMicroAbroad',
                            'label' => 'You receive micro abroad',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'youReceiveAbroad',
                            'label' => 'You receive abroad',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'youReceive = amount - (amount * var_fee/100) - fix_fee',
            'results' => ['amount' => '100*(-fix_fee - youReceive)/(var_fee - 100)', 'fix_fee' => '-1/100*amount*var_fee + amount - youReceive', 'var_fee' => '100*(amount - fix_fee - youReceive)/amount', 'youReceive' => '-1/100*amount*var_fee + amount - fix_fee'],
        ],
        [
            'title' => 'youReceiveAbroad = amount - (amount * var_fee/100) - fix_fee - (amount * interTransFee)',
            'results' => [
                'youReceiveAbroad' => '-amount*interTransFee - 1/100*amount*var_fee + amount - fix_fee',
                'amount' => '100*(-fix_fee - youReceiveAbroad)/(100*interTransFee + var_fee - 100)',
                'interTransFee' => '((1/100)*amount*(100 - var_fee) - fix_fee - youReceiveAbroad)/amount',
                'fix_fee' => '-amount*interTransFee - 1/100*amount*var_fee + amount - youReceiveAbroad',
                'var_fee' => '100*(amount*(1 - interTransFee) - fix_fee - youReceiveAbroad)/amount',
            ],
        ],
        [
            'title' => 'varmicro_fee = checkVarMicroFee(senderCurrency, feeCurrency)',
            'results' => ['varmicro_fee' => 'checkVarMicroFee(senderCurrency, feeCurrency)'],
        ],
        [
            'title' => 'youReceiveMicro = amount - (amount * one_way(varmicro_fee/100)) - fixmicro_fee',
            'results' => ['amount' => '(-fixmicro_fee - youReceiveMicro)/(((1/100)*checkVarMicroFee(senderCurrency, feeCurrency)) - 1)', 'youReceiveMicro' => '-amount*((1/100)*checkVarMicroFee(senderCurrency, feeCurrency)) + amount - fixmicro_fee', 'fixmicro_fee' => '-amount*((1/100)*checkVarMicroFee(senderCurrency, feeCurrency)) + amount - youReceiveMicro'],
        ],
        [
            'title' => <<<'TXT'
            youReceiveMicroInterTrans = amountInterTrans - (amountInterTrans * one_way(varmicro_fee/100)) - fixmicro_fee - (amountInterTrans * interTransFee) - (amountInterTrans * curConvertFee)
            TXT,
            'results' => [
                'youReceiveMicroInterTrans' => <<<'TXT'
                -amountInterTrans*curConvertFee - amountInterTrans*interTransFee - amountInterTrans*((1/100)*checkVarMicroFee(senderCurrency, feeCurrency)) + amountInterTrans - fixmicro_fee
                TXT,
                'fixmicro_fee' => <<<'TXT'
                -amountInterTrans*curConvertFee - amountInterTrans*interTransFee - amountInterTrans*((1/100)*checkVarMicroFee(senderCurrency, feeCurrency)) + amountInterTrans - youReceiveMicroInterTrans
                TXT,
                'interTransFee' => '(amountInterTrans*(-curConvertFee - ((1/100)*checkVarMicroFee(senderCurrency, feeCurrency)) + 1) - fixmicro_fee - youReceiveMicroInterTrans)/amountInterTrans',
                'curConvertFee' => '(amountInterTrans*(-interTransFee - ((1/100)*checkVarMicroFee(senderCurrency, feeCurrency)) + 1) - fixmicro_fee - youReceiveMicroInterTrans)/amountInterTrans',
                'amountInterTrans' => '(-fixmicro_fee - youReceiveMicroInterTrans)/(curConvertFee + interTransFee + ((1/100)*checkVarMicroFee(senderCurrency, feeCurrency)) - 1)',
            ],
        ],
        [
            'title' => <<<'TXT'
            youReceiveMicroInterTransCustom = amountInterTransCustom - (amountInterTransCustom * one_way(varmicro_fee/100)) - fixmicro_fee - (amountInterTransCustom * interTransFee) - (amountInterTransCustom * curConvertFee)
            TXT,
            'results' => [
                'fixmicro_fee' => <<<'TXT'
                -amountInterTransCustom*curConvertFee - amountInterTransCustom*interTransFee - amountInterTransCustom*((1/100)*checkVarMicroFee(senderCurrency, feeCurrency)) + amountInterTransCustom - youReceiveMicroInterTransCustom
                TXT,
                'amountInterTransCustom' => '(-fixmicro_fee - youReceiveMicroInterTransCustom)/(curConvertFee + interTransFee + ((1/100)*checkVarMicroFee(senderCurrency, feeCurrency)) - 1)',
                'interTransFee' => <<<'TXT'
                (amountInterTransCustom*(-curConvertFee - ((1/100)*checkVarMicroFee(senderCurrency, feeCurrency)) + 1) - fixmicro_fee - youReceiveMicroInterTransCustom)/amountInterTransCustom
                TXT,
                'youReceiveMicroInterTransCustom' => <<<'TXT'
                -amountInterTransCustom*curConvertFee - amountInterTransCustom*interTransFee - amountInterTransCustom*((1/100)*checkVarMicroFee(senderCurrency, feeCurrency)) + amountInterTransCustom - fixmicro_fee
                TXT,
                'curConvertFee' => <<<'TXT'
                (amountInterTransCustom*(-interTransFee - ((1/100)*checkVarMicroFee(senderCurrency, feeCurrency)) + 1) - fixmicro_fee - youReceiveMicroInterTransCustom)/amountInterTransCustom
                TXT,
            ],
        ],
        [
            'title' => 'youReceiveMicroAbroad = amount - (amount * one_way(varmicro_fee/100)) - fixmicro_fee - (amount * interTransFee)',
            'results' => ['fixmicro_fee' => '-amount*interTransFee - amount*((1/100)*checkVarMicroFee(senderCurrency, feeCurrency)) + amount - youReceiveMicroAbroad', 'interTransFee' => '(amount*(1 - ((1/100)*checkVarMicroFee(senderCurrency, feeCurrency))) - fixmicro_fee - youReceiveMicroAbroad)/amount', 'amount' => '(-fixmicro_fee - youReceiveMicroAbroad)/(interTransFee + ((1/100)*checkVarMicroFee(senderCurrency, feeCurrency)) - 1)', 'youReceiveMicroAbroad' => '-amount*interTransFee - amount*((1/100)*checkVarMicroFee(senderCurrency, feeCurrency)) + amount - fixmicro_fee'],
        ],
        [
            'title' => 'paypalFee = amount - youReceive',
            'results' => ['paypalFee' => 'amount - youReceive', 'amount' => 'paypalFee + youReceive', 'youReceive' => 'amount - paypalFee'],
        ],
        [
            'title' => 'paypalFeeInterTrans = amountInterTrans - youReceiveInterTrans',
            'results' => ['amountInterTrans' => 'paypalFeeInterTrans + youReceiveInterTrans', 'youReceiveInterTrans' => 'amountInterTrans - paypalFeeInterTrans', 'paypalFeeInterTrans' => 'amountInterTrans - youReceiveInterTrans'],
        ],
        [
            'title' => 'paypalFeeInterTransCustom = amountInterTransCustom - youReceiveInterTransCustom',
            'results' => ['youReceiveInterTransCustom' => 'amountInterTransCustom - paypalFeeInterTransCustom', 'amountInterTransCustom' => 'paypalFeeInterTransCustom + youReceiveInterTransCustom', 'paypalFeeInterTransCustom' => 'amountInterTransCustom - youReceiveInterTransCustom'],
        ],
        [
            'title' => 'paypalFeeMicro = amount - youReceiveMicro',
            'results' => ['amount' => 'paypalFeeMicro + youReceiveMicro', 'paypalFeeMicro' => 'amount - youReceiveMicro', 'youReceiveMicro' => 'amount - paypalFeeMicro'],
        ],
        [
            'title' => 'paypalFeeMicroInterTrans = amountInterTrans - youReceiveMicroInterTrans',
            'results' => ['amountInterTrans' => 'paypalFeeMicroInterTrans + youReceiveMicroInterTrans', 'youReceiveMicroInterTrans' => 'amountInterTrans - paypalFeeMicroInterTrans', 'paypalFeeMicroInterTrans' => 'amountInterTrans - youReceiveMicroInterTrans'],
        ],
        [
            'title' => 'paypalFeeMicroInterTransCustom = amountInterTransCustom - youReceiveMicroInterTransCustom',
            'results' => ['paypalFeeMicroInterTransCustom' => 'amountInterTransCustom - youReceiveMicroInterTransCustom', 'amountInterTransCustom' => 'paypalFeeMicroInterTransCustom + youReceiveMicroInterTransCustom', 'youReceiveMicroInterTransCustom' => 'amountInterTransCustom - paypalFeeMicroInterTransCustom'],
        ],
        [
            'title' => 'exchangeRate = lookupExchangeRate(senderCurrency, feeCurrency)',
            'results' => ['exchangeRate' => 'lookupExchangeRate(senderCurrency, feeCurrency)'],
        ],
        [
            'title' => 'amountInterTrans = amount * one_way(paypalRate) ',
            'results' => ['amount' => 'amountInterTrans/(((39/40)*lookupExchangeRate(senderCurrency, feeCurrency)))', 'amountInterTrans' => 'amount*(((39/40)*lookupExchangeRate(senderCurrency, feeCurrency)))'],
        ],
        [
            'title' => 'amountInterTransCustom = amount * one_way(paypalRateCustom)',
            'results' => ['amountInterTransCustom' => 'amount*(((39/40)*exchangeRateCustom))', 'amount' => 'amountInterTransCustom/(((39/40)*exchangeRateCustom))'],
        ],
        [
            'title' => 'youReceiveInterTrans = amountInterTrans - (amountInterTrans * var_fee/100) - fix_fee - (amountInterTrans * interTransFee) - (amountInterTrans * curConvertFee)',
            'results' => [
                'youReceiveInterTrans' => '-amountInterTrans*curConvertFee - amountInterTrans*interTransFee - 1/100*amountInterTrans*var_fee + amountInterTrans - fix_fee',
                'interTransFee' => '-curConvertFee - 1/100*var_fee + 1 - fix_fee/amountInterTrans - youReceiveInterTrans/amountInterTrans',
                'fix_fee' => '-amountInterTrans*curConvertFee - amountInterTrans*interTransFee - 1/100*amountInterTrans*var_fee + amountInterTrans - youReceiveInterTrans',
                'var_fee' => '100*(amountInterTrans*(-curConvertFee - interTransFee + 1) - fix_fee - youReceiveInterTrans)/amountInterTrans',
                'curConvertFee' => '-interTransFee - 1/100*var_fee + 1 - fix_fee/amountInterTrans - youReceiveInterTrans/amountInterTrans',
                'amountInterTrans' => '100*(-fix_fee - youReceiveInterTrans)/(100*curConvertFee + 100*interTransFee + var_fee - 100)',
            ],
        ],
        [
            'title' => <<<'TXT'
            youReceiveInterTransCustom = amountInterTransCustom - (amountInterTransCustom * var_fee/100) - fix_fee - (amountInterTransCustom * interTransFee) - (amountInterTransCustom * curConvertFee)
            TXT,
            'results' => [
                'curConvertFee' => '-interTransFee - 1/100*var_fee + 1 - fix_fee/amountInterTransCustom - youReceiveInterTransCustom/amountInterTransCustom',
                'amountInterTransCustom' => '100*(-fix_fee - youReceiveInterTransCustom)/(100*curConvertFee + 100*interTransFee + var_fee - 100)',
                'interTransFee' => '-curConvertFee - 1/100*var_fee + 1 - fix_fee/amountInterTransCustom - youReceiveInterTransCustom/amountInterTransCustom',
                'fix_fee' => <<<'TXT'
                -amountInterTransCustom*curConvertFee - amountInterTransCustom*interTransFee - 1/100*amountInterTransCustom*var_fee + amountInterTransCustom - youReceiveInterTransCustom
                TXT,
                'var_fee' => '100*(amountInterTransCustom*(-curConvertFee - interTransFee + 1) - fix_fee - youReceiveInterTransCustom)/amountInterTransCustom',
                'youReceiveInterTransCustom' => '-amountInterTransCustom*curConvertFee - amountInterTransCustom*interTransFee - 1/100*amountInterTransCustom*var_fee + amountInterTransCustom - fix_fee',
            ],
        ],
        [
            'title' => 'paypalRate = one_way(exchangeRate * 0.975)',
            'results' => ['paypalRate' => '((39/40)*lookupExchangeRate(senderCurrency, feeCurrency))'],
        ],
        [
            'title' => 'paypalRateCustom = one_way(exchangeRateCustom * 0.975)',
            'results' => ['paypalRateCustom' => '((39/40)*exchangeRateCustom)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("checkVarMicroFee",function(senderCurrency,feeCurrency){if(senderCurrency===feeCurrency){return 5}else{return 6}});omni.define("lookupExchangeRate",function(senderCurrency,feeCurrency){if(senderCurrency<200||senderCurrency>223){return null}if(feeCurrency<200||feeCurrency>223){return null}var exchangeRate={send200:{receive200:1,receive201:0.7305,receive202:0.8218,receive203:1.2727,receive204:1.2957,receive205:5.4666,receive206:21.433,receive207:6.1115,receive208:7.7519,receive209:293.64,receive210:3.2704,receive211:103.77,receive212:4.0415,receive213:19.963,receive214:1.3912,receive215:8.4998,receive216:47.37,receive217:3.7268,receive218:75.15,receive219:8.2958,receive220:1.3283,receive221:0.8852,receive222:27.952,receive223:29.96},send201:{receive200:1.3684,receive201:1,receive202:1.1245,receive203:1.7416,receive204:1.7734,receive205:7.4805,receive206:21.433,receive207:6.1115,receive208:10.6077,receive209:401.82,receive210:4.4745,receive211:142,receive212:5.5304,receive213:27.3174,receive214:1.9037,receive215:11.6311,receive216:47.37,receive217:5.0998,receive218:102.825,receive219:11.352,receive220:1.8176,receive221:1.2113,receive222:38.2495,receive223:40.997},send202:{receive200:1.217,receive201:0.8888,receive202:1,receive203:1.5485,receive204:1.5764,receive205:6.6512,receive206:26.078,receive207:7.4359,receive208:9.4317,receive209:357.27,receive210:3.9805,receive211:126.26,receive212:4.9173,receive213:24.289,receive214:1.6927,receive215:10.3417,receive216:57.6558,receive217:4.5344,receive218:91.435,receive219:10.0935,receive220:1.6161,receive221:1.077,receive222:34.0092,receive223:36.4523},send203:{receive200:0.7849,receive201:0.5737,receive202:0.6449,receive203:1,receive204:1.0177,receive205:4.2918,receive206:16.8423,receive207:4.7982,receive208:6.0885,receive209:230.645,receive210:2.5701,receive211:81.4537,receive212:3.17401,receive213:15.6798,receive214:1.0919,receive215:6.6714,receive216:37.7486,receive217:2.9275,receive218:59.0172,receive219:6.5135,receive220:1.0431,receive221:0.6948,receive222:21.9752,receive223:23.5536},send204:{receive200:0.7716,receive201:0.5637,receive202:0.6341,receive203:0.982,receive204:1,receive205:4.218,receive206:16.5377,receive207:4.7156,receive208:5.9814,receive209:226.5726,receive210:2.5231,receive211:80.07,receive212:3.1184,receive213:15.4035,receive214:1.0735,receive215:6.5584,receive216:36.5453,receive217:2.8756,receive218:57.9857,receive219:6.401,receive220:1.0249,receive221:0.683,receive222:21.5678,receive223:23.12},send205:{receive200:0.1886,receive201:0.1378,receive202:0.1549,receive203:0.2401,receive204:0.2444,receive205:1,receive206:4.0462,receive207:1.1526,receive208:1.4617,receive209:55.4146,receive210:0.6167,receive211:19.5652,receive212:0.7536,receive213:3.7647,receive214:0.2626,receive215:1.6016,receive216:8.9322,receive217:0.7032,receive218:13.7809,receive219:1.5646,receive220:0.2506,receive221:0.1669,receive222:5.1924,receive223:5.6525},send206:{receive200:0.0466,receive201:0.034,receive202:0.0383,receive203:0.0594,receive204:0.0604,receive205:0.2549,receive206:1,receive207:0.2849,receive208:0.3615,receive209:13.6958,receive210:0.1527,receive211:4.8384,receive212:0.1885,receive213:0.9314,receive214:0.0648,receive215:0.9396,receive216:2.2427,receive217:0.1739,receive218:3.5036,receive219:0.3869,receive220:0.0619,receive221:0.0413,receive222:1.306,receive223:1.3985},send207:{receive200:0.1636,receive201:0.1196,receive202:0.1344,receive203:0.2083,receive204:0.2121,receive205:0.8945,receive206:3.5089,receive207:1,receive208:1.2683,receive209:48.0572,receive210:0.5359,receive211:16.9777,receive212:0.6616,receive213:3.2682,receive214:0.2276,receive215:1.3904,receive216:7.8695,receive217:0.61,receive218:12.2936,receive219:1.3575,receive220:0.2174,receive221:0.1448,receive222:4.5826,receive223:4.907},send208:{receive200:0.1289,receive201:0.0943,receive202:0.1059,receive203:0.1642,receive204:0.1672,receive205:0.7053,receive206:2.7666,receive207:0.78845,receive208:1,receive209:37.8906,receive210:0.4225,receive211:13.3859,receive212:0.5216,receive213:2.5767,receive214:0.1794,receive215:1.0962,receive216:6.2047,receive217:0.4809,receive218:9.6927,receive219:1.0703,receive220:0.1714,receive221:0.1142,receive222:3.6132,receive223:3.8689},send209:{receive200:0.0034,receive201:0.0025,receive202:0.028,receive203:0.0043,receive204:0.0044,receive205:0.0186,receive206:0.073,receive207:0.0208,receive208:0.0264,receive209:1,receive210:0.0112,receive211:0.3533,receive212:0.0137,receive213:0.068,receive214:0.0047,receive215:0.0289,receive216:0.1637,receive217:0.0127,receive218:0.2558,receive219:0.0282,receive220:0.0045,receive221:0.003,receive222:0.0953,receive223:0.1021},send210:{receive200:0.3051,receive201:0.223,receive202:0.2507,receive203:0.3884,receive204:0.3955,receive205:1.6684,receive206:6.5445,receive207:1.8651,receive208:2.3655,receive209:89.6342,receive210:1,receive211:31.6656,receive212:1.2339,receive213:6.0956,receive214:0.4245,receive215:2.5932,receive216:14.6776,receive217:1.1377,receive218:22.9289,receive219:2.5318,receive220:0.40544,receive221:0.2701,receive222:8.5473,receive223:9.1522},send211:{receive200:0.0096,receive201:0.007,receive202:0.0079,receive203:0.0122,receive204:0.0125,receive205:0.0526,receive206:0.2066,receive207:0.0589,receive208:0.0747,receive209:2.8306,receive210:0.0315,receive211:1,receive212:0.0389,receive213:0.1924,receive214:0.0134,receive215:0.0818,receive216:0.4635,receive217:0.0359,receive218:0.724,receive219:0.0799,receive220:0.0128,receive221:0.0085,receive222:0.2699,receive223:0.289},send212:{receive200:0.2472,receive201:0.1807,receive202:0.2031,receive203:0.3147,receive204:0.3206,receive205:1.3521,receive206:5.3038,receive207:1.5115,receive208:1.9171,receive209:72.6419,receive210:0.8103,receive211:25.6629,receive212:1,receive213:4.9401,receive214:0.3441,receive215:2.1016,receive216:11.8952,receive217:0.922,receive218:18.5823,receive219:2.0519,receive220:0.3285,receive221:0.2189,receive222:6.927,receive223:7.4173},send213:{receive200:0.0501,receive201:0.0365,receive202:0.0411,receive203:0.0637,receive204:0.0648,receive205:0.2737,receive206:1.0736,receive207:0.3059,receive208:0.3881,receive209:14.7045,receive210:0.164,receive211:5.1948,receive212:0.2024,receive213:1,receive214:0.0696,receive215:0.4254,receive216:2.4078,receive217:0.1866,receive218:3.7615,receive219:0.4153,receive220:0.0665,receive221:0.0443,receive222:1.4022,receive223:1.5014},send214:{receive200:0.7186,receive201:0.5252,receive202:0.5904,receive203:0.9147,receive204:0.9316,receive205:3.9294,receive206:15.4134,receive207:4.3921,receive208:5.5712,receive209:211.1016,receive210:2.355,receive211:74.5781,receive212:2.9061,receive213:14.3562,receive214:1,receive215:6.1075,receive216:34.5683,receive217:2.6796,receive218:54.0013,receive219:5.9629,receive220:0.9549,receive221:0.6362,receive222:20.1304,receive223:21.5551},send215:{receive200:0.1176,receive201:0.0859,receive202:0.0966,receive203:0.1497,receive204:0.1525,receive205:0.6433,receive206:2.5236,receive207:0.7189,receive208:0.9121,receive209:34.5639,receive210:0.3855,receive211:12.2107,receive212:0.4758,receive213:2.3505,receive214:0.1637,receive215:1,receive216:5.6599,receive217:0.4387,receive218:8.8416,receive219:0.9763,receive220:0.1563,receive221:0.1041,receive222:3.2959,receive223:3.5292},send216:{receive200:0.0207,receive201:0.0151,receive202:0.0171,receive203:0.0264,receive204:0.0269,receive205:0.1136,receive206:0.4458,receive207:0.1271,receive208:0.1611,receive209:6.1068,receive210:0.0681,receive211:2.1574,receive212:0.0841,receive213:0.4144,receive214:0.0289,receive215:0.1766,receive216:1,receive217:0.0775,receive218:1.5621,receive219:0.1724,receive220:0.0276,receive221:0.0184,receive222:0.5823,receive223:0.6234},send217:{receive200:0.2681,receive201:0.1959,receive202:0.2203,receive203:0.3413,receive204:0.3476,receive205:1.4661,receive206:5.7521,receive207:1.6381,receive208:2.0787,receive209:78.7749,receive210:0.8785,receive211:27.8272,receive212:1.0843,receive213:5.3502,receive214:0.3731,receive215:2.2788,receive216:12.8984,receive217:1,receive218:20.1492,receive219:2.2249,receive220:0.3562,receive221:0.2374,receive222:7.5106,receive223:8.0411},send218:{receive200:0.0133,receive201:0.0097,receive202:0.0109,receive203:0.0169,receive204:0.0172,receive205:0.0727,receive206:0.2855,receive207:0.0813,receive208:0.1031,receive209:3.9098,receive210:0.0436,receive211:1.3811,receive212:0.0538,receive213:0.2655,receive214:0.0185,receive215:0.1131,receive216:0.6401,receive217:0.0496,receive218:1,receive219:0.1104,receive220:0.0176,receive221:0.0117,receive222:0.3725,receive223:0.399},send219:{receive200:0.1205,receive201:0.0881,receive202:0.099,receive203:0.1533,receive204:0.1561,receive205:0.6589,receive206:2.5858,receive207:0.7362,receive208:0.9342,receive209:35.4084,receive210:0.3949,receive211:12.5071,receive212:0.4873,receive213:2.4047,receive214:0.1676,receive215:1.0242,receive216:5.7973,receive217:0.4494,receive218:9.0561,receive219:1,receive220:0.1601,receive221:0.1067,receive222:3.3742,receive223:3.6136},send220:{receive200:0.7525,receive201:0.55,receive202:0.6183,receive203:0.9577,receive204:0.9751,receive205:4.1148,receive206:16.1487,receive207:4.5973,receive208:5.8343,receive209:221.1134,receive210:2.4663,receive211:78.1024,receive212:3.0434,receive213:15.0166,receive214:1.0468,receive215:6.3911,receive216:36.2021,receive217:2.8069,receive218:56.5528,receive219:6.2446,receive220:1,receive221:0.6663,receive222:21.0712,receive223:22.5656},send221:{receive200:1.1293,receive201:0.8253,receive202:0.9278,receive203:1.4368,receive204:1.4629,receive205:6.1746,receive206:24.2321,receive207:6.8993,receive208:8.7545,receive209:331.8096,receive210:3.7015,receive211:117.1948,receive212:4.5668,receive213:22.5355,receive214:1.571,receive215:9.5726,receive216:54.3239,receive217:4.2123,receive218:84.8608,receive219:9.3704,receive220:1.5005,receive221:1,receive222:31.6205,receive223:33.8614},send222:{receive200:0.0357,receive201:0.0261,receive202:0.0293,receive203:0.0454,receive204:0.0463,receive205:0.1952,receive206:0.7663,receive207:0.2182,receive208:0.2768,receive209:10.4934,receive210:0.117,receive211:3.7062,receive212:0.1444,receive213:0.7126,receive214:0.0496,receive215:0.3027,receive216:1.7179,receive217:0.1332,receive218:2.6837,receive219:0.2963,receive220:0.0474,receive221:0.0316,receive222:1,receive223:1.0708},send223:{receive200:0.0333,receive201:0.0243,receive202:0.0274,receive203:0.0424,receive204:0.0432,receive205:0.1823,receive206:0.7157,receive207:0.2038,receive208:0.2585,receive209:9.799,receive210:0.1092,receive211:3.461,receive212:0.1348,receive213:0.6657,receive214:0.0463,receive215:0.2825,receive216:1.6042,receive217:0.1244,receive218:2.5061,receive219:0.2767,receive220:0.0443,receive221:0.0295,receive222:0.9338,receive223:1}};return exchangeRate["send"+senderCurrency]["receive"+feeCurrency]});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Transaction type, Sender currency and Your currency into Paypal fee and the answer comes back as Fixed fee and Fixed fee (micro). It is a single relationship that reads fixed fee out of transaction type, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Paypal fee calculator works', 'html' => <<<'TXT'
            <p>Paypal fee answers one question from 26 numbers, and the answer is Fixed fee, Fixed fee (micro) and Variable fee.</p><p>The relationship it solves reads You receive = − 1 ÷ 100 × Amount being sent × Variable fee + Amount being sent − Fixed fee.</p><p>What comes back is Fixed fee, Fixed fee (micro) and Variable fee — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 26 boxes and the page has everything it needs.</p><ul><li><strong>Transaction type</strong> — a plain number, no unit. What rate is applied to your PayPal fee?</li><li><strong>Sender currency</strong> — a plain number, no unit. Currency you are being paid in.</li><li><strong>Your currency</strong> — a plain number, no unit. Currency your PayPal account or linked bank account is denominated in.</li><li><strong>Amount being sent</strong> — a plain number, no unit. Amount you are sending or expecting.</li><li><strong>Variable fee (micro)</strong> — in %</li><li><strong>Exchange rate to use</strong> — a plain number, no unit. Use the estimated exchange rate or provide your own exchange rate according to current date.</li><li><strong>Estimated mid-market rate</strong> — a plain number, no unit. Mid-market rate (last updated January 22, 2021).</li><li><strong>Mid-market rate</strong> — a plain number, no unit. Provide the current mid-market rate.</li><li><strong>Estimated PayPal rate</strong> — a plain number, no unit. Estimated PayPal&#039;s exchange rate based on the Mid-market rate.</li><li><strong>Estimated PayPal rate</strong> — a plain number, no unit. Estimated PayPal&#039;s exchange rate based on the Mid-market rate.</li><li><strong>Amount after conversion</strong> — a plain number, no unit. Amount in your currency before fees.</li><li><strong>Amount after conversion</strong> — a plain number, no unit. Amount in your currency before fees.</li><li><strong>Currency Conversion fee</strong> — in percent</li><li><strong>International Transfer fee</strong> — in percent</li><li><strong>PayPal fee</strong> — a plain number, no unit. Total amount that goes to PayPal as fee for this transaction.</li><li><strong>You receive</strong> — a plain number, no unit. Amount you receive in your local currency.</li><li><strong>PayPal fee</strong> — a plain number, no unit. Total amount that goes to PayPal as fee for this transaction.</li><li><strong>You receive</strong> — a plain number, no unit. Amount you receive in your local currency.</li><li><strong>PayPal fee</strong> — a plain number, no unit. Total amount that goes to PayPal as fee for this transaction (including the FX gap).</li><li><strong>PayPal fee</strong> — a plain number, no unit. Total amount that goes to PayPal as fee for this transaction (including the FX gap).</li><li><strong>You receive</strong> — a plain number, no unit. Amount you receive in your local currency.</li><li><strong>You receive</strong> — a plain number, no unit. Amount you receive in your local currency.</li><li><strong>PayPal fee</strong> — a plain number, no unit. Total amount that goes to PayPal as fee for this transaction (including the FX gap).</li><li><strong>PayPal fee</strong> — a plain number, no unit. Total amount that goes to PayPal as fee for this transaction (including the FX gap).</li><li><strong>You receive</strong> — a plain number, no unit. Amount you receive in your local currency.</li><li><strong>You receive</strong> — a plain number, no unit. Amount you receive in your local currency.</li></ul><p>The answers come back as Fixed fee, Fixed fee (micro), Variable fee in %. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Transaction type = 0, Sender currency = 200, Your currency = 200, Exchange rate to use = 0 and Mid-market rate = 3; the answers are <strong>Estimated PayPal rate</strong> = 2.93.</p><ul><li><strong>Estimated PayPal rate</strong> = 2.93</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>You receive</strong> = <code>− 1 ÷ 100 × Amount being sent × Variable fee + Amount being sent − Fixed fee</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Estimated PayPal rate</strong> = 2.93. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Currency Conversion fee lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>You receive</strong> = <code>− 1 ÷ 100 × Amount being sent × Variable fee + Amount being sent − Fixed fee</code></li><li><strong>Amount being sent</strong> = <code>100 × ( − Fixed fee − You receive) ÷ (Variable fee − 100)</code></li><li><strong>Fixed fee</strong> = <code>− 1 ÷ 100 × Amount being sent × Variable fee + Amount being sent − You receive</code></li><li><strong>Variable fee</strong> = <code>100 × (Amount being sent − Fixed fee − You receive) ÷ Amount being sent</code></li><li><strong>You receive abroad</strong> = <code>− Amount being sent × International Transfer fee − 1 ÷ 100 × Amount being sent × Variable fee + Amount being sent − Fixed fee</code></li><li><strong>International Transfer fee</strong> = <code>((1 ÷ 100) × Amount being sent × (100 − Variable fee) − Fixed fee − You receive abroad) ÷ Amount being sent</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>You receive</strong> = <code>− 1 ÷ 100 × Amount being sent × Variable fee + Amount being sent − Fixed fee</code> — the form to use when Amount being sent, Variable fee and Fixed fee are the values you have.</li><li><strong>Amount being sent</strong> = <code>100 × ( − Fixed fee − You receive) ÷ (Variable fee − 100)</code> — the form to use when Fixed fee, You receive and Variable fee are the values you have.</li><li><strong>Fixed fee</strong> = <code>− 1 ÷ 100 × Amount being sent × Variable fee + Amount being sent − You receive</code> — the form to use when Amount being sent, Variable fee and You receive are the values you have.</li><li><strong>Variable fee</strong> = <code>100 × (Amount being sent − Fixed fee − You receive) ÷ Amount being sent</code> — the form to use when Amount being sent, Fixed fee and You receive are the values you have.</li><li><strong>You receive abroad</strong> = <code>− Amount being sent × International Transfer fee − 1 ÷ 100 × Amount being sent × Variable fee + Amount being sent − Fixed fee</code> — the form to use when Amount being sent, International Transfer fee, Variable fee and Fixed fee are the values you have.</li><li><strong>Amount being sent</strong> = <code>100 × ( − Fixed fee − You receive abroad) ÷ (100 × International Transfer fee + Variable fee − 100)</code> — the form to use when Fixed fee, You receive abroad, International Transfer fee and Variable fee are the values you have.</li><li><strong>International Transfer fee</strong> = <code>((1 ÷ 100) × Amount being sent × (100 − Variable fee) − Fixed fee − You receive abroad) ÷ Amount being sent</code> — the form to use when Amount being sent, Variable fee, Fixed fee and You receive abroad are the values you have.</li><li><strong>Fixed fee</strong> = <code>− Amount being sent × International Transfer fee − 1 ÷ 100 × Amount being sent × Variable fee + Amount being sent − You receive abroad</code> — the form to use when Amount being sent, International Transfer fee, Variable fee and You receive abroad are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of You receive, Amount being sent and Fixed fee can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Currency Conversion fee and International Transfer fee carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Fixed fee, Fixed fee (micro) and Variable fee are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Transaction type left as a guess.</strong> Anything typed into Transaction type is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Sender currency left as a guess.</strong> Anything typed into Sender currency is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Transaction type to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Transaction type, Sender currency, Your currency and Amount being sent. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Transaction type into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Fixed fee with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Fixed fee is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Transaction type, Sender currency and Your currency are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Transaction type, Sender currency and Your currency is what you already know and Fixed fee and Fixed fee (micro) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/portfolio-beta">Portfolio beta Calculator</a>, <a href="/finance/post-judgment-interest">Post judgment interest Calculator</a> and <a href="/finance/post-office-monthly-income-scheme">Post Office Monthly Income Scheme</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Paypal fee calculator work out?', 'a' => <<<'TXT'
            Fixed fee, Fixed fee (micro) and Variable fee, from Amount being sent, Variable fee and Fixed fee. The relationship is You receive = − 1 ÷ 100 × Amount being sent × Variable fee + Amount being sent − Fixed fee.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Transaction type, Sender currency, Your currency, Amount being sent, Variable fee (micro) (%). Enter transaction type, sender currency and your currency; Fixed fee is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. You receive, Amount being sent, Fixed fee and Variable fee can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Estimated PayPal rate = 2.93. That comes from the page\'s own defaults, entered in Transaction type; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Fixed fee is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Transaction type left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Fixed fee keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/portfolio-beta', 'name' => 'Portfolio beta Calculator'],
            ['path' => '/finance/post-judgment-interest', 'name' => 'Post judgment interest Calculator'],
            ['path' => '/finance/post-office-monthly-income-scheme', 'name' => 'Post Office Monthly Income Scheme'],
        ],
        'authors' => [],
    ],
];
