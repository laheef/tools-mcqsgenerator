<?php

/**
 * Trump tariff
 * /finance/trump-tariff
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Trump tariff',
    'meta' => ['title' => 'Trump tariff Calculator — Formula, Units & Example', 'description' => 'Trump tariff turns product categories and other product categories into potential price with reciprocal tariffs. The formula is printed in the form\'s own words.', 'h1' => 'Trump tariff Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'product_type',
                            'label' => 'Product categories',
                            'type' => 'select',
                            'options' => [
                                'Popular products' => '3',
                                'Automobiles & auto parts' => '1',
                                'Electronics' => '4',
                                'Clothing and apparel' => '2',
                                'Other' => '0',
                            ],
                            'dataset' => 'products',
                            'default' => 'Popular products',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'other_goods',
                            'label' => 'Other product categories',
                            'type' => 'select',
                            'options' => ['Food & beverages' => '4', 'Children\'s goods (e.g., diapers, wet wipes)' => '2', 'Other goods' => '0'],
                            'dataset' => 'other goods',
                            'default' => 'Food & beverages',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'popular_products',
                            'label' => 'First, choose a product',
                            'type' => 'select',
                            'options' => [
                                'iPhone 16 (China)' => '1',
                                'iPhone 16 (India)' => '2',
                                'Samsung S95D 55" TV (Mexico)' => '3',
                                'Playstation 5 (China)' => '4',
                                'DJI Mini 4 PRO drone (China)' => '5',
                                'Barbie (China)' => '13',
                                'Volvo XC60 (China)' => '6',
                                'Hyundai Sonata (South Korea)' => '7',
                                'Toyota Tacoma (Mexico)' => '8',
                                'Nvidia GeForce RTX 5090 (China)' => '9',
                                'Mionetto Prosecco Brut 750ml wine (EU)' => '10',
                                'Moet Chandon Imperial Rose 750ml champagne (EU)' => '11',
                                'Illy Whole Bean Coffee 4.4 oz can (EU)' => '12',
                                'Temu / Shein product' => '14',
                            ],
                            'dataset' => 'popular products',
                            'control' => 'DROPDOWN',
                            'help' => 'Country of origin is in brackets.',
                            'default' => 'iPhone 16 (China)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'country',
                            'label' => 'Country of origin',
                            'type' => 'select',
                            'options' => [
                                'Mexico' => '0.25',
                                'Canada' => '0.25',
                                'China' => '1.25',
                                'European Union' => '0.1',
                                'Switzerland' => '0.1',
                                'Vietnam' => '0.1',
                                'Japan' => '0.1',
                                'Taiwan' => '0.1',
                                'South Korea' => '0.1',
                                'United Kingdom' => '0.1',
                                'India' => '0.1',
                                'Thailand' => '0.1',
                                'Malaysia' => '0.1',
                                'Australia' => '0.1',
                                'Singapore' => '0.1',
                                'Brazil' => '0.1',
                                'Indonesia' => '0.1',
                                'Israel' => '0.1',
                                'Philippines' => '0.1',
                                'Pakistan' => '0.1',
                                'Bangladesh' => '0.1',
                                'Cambodia' => '0.1',
                            ],
                            'dataset' => 'Country',
                            'control' => 'DROPDOWN',
                            'default' => 'China',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'country_car',
                            'label' => 'Country of origin',
                            'type' => 'select',
                            'options' => [
                                'Mexico' => '0.25',
                                'Canada' => '0.25',
                                'Japan' => '0.25',
                                'South Korea' => '0.25',
                                'European Union' => '0.25',
                                'China' => '1.25',
                            ],
                            'dataset' => 'car_tariff_increase',
                            'control' => 'DROPDOWN',
                            'default' => 'Mexico',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tariff_rate',
                            'label' => 'Additional Trump tariff',
                            'type' => 'result',
                            'prefix' => '\\+',
                            'help' => 'Increase in US import tariffs compared to March 2025.',
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
                            'name' => 'car_tariff_rate',
                            'label' => 'Additional Trump tariff',
                            'type' => 'result',
                            'prefix' => '\\+',
                            'help' => 'Increase in US import tariffs compared to March 2025.',
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
                            'name' => 'pop_tariff_rate',
                            'label' => 'Additional Trump tariff',
                            'type' => 'result',
                            'prefix' => '\\+',
                            'help' => 'Increase in US import tariffs compared to March 2025.',
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
                            'name' => 'clothes_tariff_rate',
                            'label' => 'Additional Trump tariff',
                            'type' => 'result',
                            'prefix' => '\\+',
                            'help' => 'Increase in US import tariffs compared to March 2025.',
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
                            'name' => 'electronics_tariff_rate',
                            'label' => 'Electronics tariff rate',
                            'type' => 'result',
                            'prefix' => '\\+',
                            'help' => 'Increase in US import tariffs compared to March 2025.',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'product_type == 0', 'text' => <<<'TXT'
                                The typical tariff of {{base_tariff_rate.formattedValue}}% in March 2025 has increased by {{tariff_rate.formattedValue}}% points to a total tariff of {{new_tariff.formattedValue}}%.
                                TXT],
                                ['when' => 'product_type == 1', 'text' => <<<'TXT'
                                The tariff of {{car_base_tariff_rate.formattedValue}}% in March 2025 has increased by {{car_tariff_rate.formattedValue}}% points to a total tariff of {{new_car_tariff.formattedValue}}%.
                                TXT],
                                ['when' => 'product_type == 3 and 2 < popular_products < 14', 'text' => <<<'TXT'
                                The tariff of {{pop_base_tariff_rate.formattedValue}}% in March 2025 has increased by {{pop_tariff_rate.formattedValue}}% points to a total tariff of {{new_pop_tariff.formattedValue}}%.
                                TXT],
                                ['when' => 'product_type == 2', 'text' => <<<'TXT'
                                The tariff of {{clothes_base_tariff_rate.formattedValue}}% in March 2025 has increased by {{clothes_tariff_rate.formattedValue}}% points to a total tariff of {{new_clothes_tariff.formattedValue}}%.
                                TXT],
                                ['when' => 'product_type == 4', 'text' => <<<'TXT'
                                The tariff of {{electronics_base_tariff_rate.formattedValue}}% in March 2025 has increased by {{electronics_tariff_rate.formattedValue}}% points to a total tariff of {{new_electronics_tariff.formattedValue}}%.
                                TXT],
                                ['when' => 'product_type == 3 and popular_products == 3', 'text' => 'TVs remain tariff-free under the United States–Mexico–Canada Agreement (USMCA).'],
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
                                ['when' => '(product_type == 3 and popular_products == 8) or (product_type == 1 and isIn(country_car, 1, 2)) or (isIn(product_type, 0, 2, 4) and isIn(country, 1, 2))', 'text' => 'If the importer successfully claims a zero-rate tariff under the US-Mexico-Canada Agreement (USMCA), there may be no additional tariff.'],
                                ['when' => 'product_type == 3 and popular_products == 3', 'text' => 'TVs remain tariff-free under the United States–Mexico–Canada Agreement (USMCA).'],
                                ['when' => 'product_type == 3 and isIn(popular_products, 1, 2)', 'text' => 'Good news! Smartphones are now exempt from Trump\'s additional reciprocal tariffs. As you were.'],
                                ['when' => 'product_type == 4', 'text' => 'Great news! Smartphones, computers, chips, solar cells, and memory cards are now exempted from Trump\'s additional reciprocal tariffs. Phew!'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The higher reciprocal rate has been paused until July 8, 2025. In the meantime, the additional 10% baseline tariff applies.&nbsp;'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'who_pays_cbox',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['100% of the tariff costs is passed on to you (uncheck to adjust)' => '1', '' => '0'],
                            'dataset' => 'who pays cbox',
                            'control' => 'CHECKBOX',
                            'default' => '100% of the tariff costs is passed on to you (uncheck to adjust)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'who_pays',
                            'label' => 'Percentage of tariffs passed on to you, the consumer',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '{{popular_products.name}}',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'old_pop_price',
                            'label' => 'Current price',
                            'type' => 'result',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'old_pop_price_custom',
                            'label' => 'Current price',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'custom_price_option',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Enter a custom price' => '1', '' => '0'],
                            'dataset' => 'custom price cb',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'new_pop_price',
                            'label' => 'Potential price with reciprocal tariffs',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'new_pop_price_custom',
                            'label' => 'Potential price with reciprocal tariffs',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        On May 2, 2025, new rules for packages valued under $800 come into force. There will be a tariff of 90% or $75, whichever is greater. Use this part of the calculator to see how your orders from Temu and Shein will be affected.
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'temu_old_price',
                            'label' => 'Price',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'temu_new_price',
                            'label' => 'Price including import taxes',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
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
                            'name' => 'old_price',
                            'label' => 'Product\'s current price',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'new_price',
                            'label' => 'Product\'s potential price with reciprocal tariffs',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'car_old_price',
                            'label' => 'Car\'s current price',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'car_new_price',
                            'label' => 'Car\'s potential price with reciprocal tariffs',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'clothes_old_price',
                            'label' => 'Clothing\'s current price',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'clothes_new_price',
                            'label' => 'Clothing\'s potential price with reciprocal tariffs',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'electronics_old_price',
                            'label' => 'Electrical item\'s current price',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'electronics_new_price',
                            'label' => 'Electrical item\'s potential price with reciprocal tariffs',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
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
                        ['type' => 'note', 'text' => <<<'TXT'
                        Disclaimer Potential new prices after President Trump's reciprocal tariffs come into effect are for illustrative purposes only, and the actual price you end up paying may be different. While we will do our best to keep this calculator up to date with what is a very fluid situation, there may be times when it doesn't reflect the latest situation.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'hidden',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'base_tariff_rate',
                            'label' => 'Base tariff rate',
                            'type' => 'result',
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
                            'name' => 'car_base_tariff_rate',
                            'label' => 'Car base tariff rate',
                            'type' => 'result',
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
                            'name' => 'pop_base_tariff_rate',
                            'label' => 'Pop base tariff rate',
                            'type' => 'result',
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
                            'name' => 'clothes_base_tariff_rate',
                            'label' => 'Clothes base tariff rate',
                            'type' => 'result',
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
                            'name' => 'electronics_base_tariff_rate',
                            'label' => 'Electronics base tariff rate',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
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
                            'name' => 'new_tariff',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'new_car_tariff',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'new_pop_tariff',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'new_clothes_tariff',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'new_electronics_tariff',
                            'label' => '',
                            'type' => 'presentation',
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
            'title' => <<<'TXT'
            new_price = old_price * (((1 + base_tariff_rate * if_else(who_pays_cbox < 1, who_pays, 1) + tariff_rate * if_else(who_pays_cbox < 1, who_pays, 1)) / (1 + base_tariff_rate * if_else(who_pays_cbox < 1, who_pays, 1))))
            TXT,
            'results' => ['new_price' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               old_price*(base_tariff_rate*(who_pays) + tariff_rate*(who_pays) + 1)/(base_tariff_rate*(who_pays) + 1)
            )
            : (
               old_price*(base_tariff_rate*(1) + tariff_rate*(1) + 1)/(base_tariff_rate*(1) + 1)
            ))
            TXT, 'tariff_rate' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               (base_tariff_rate*(new_price - old_price)*(who_pays) + new_price - old_price)/(old_price*(who_pays))
            )
            : (
               (base_tariff_rate*(new_price - old_price)*(1) + new_price - old_price)/(old_price*(1))
            ))
            TXT, 'old_price' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               new_price*(base_tariff_rate*(who_pays) + 1)/(base_tariff_rate*(who_pays) + tariff_rate*(who_pays) + 1)
            )
            : (
               new_price*(base_tariff_rate*(1) + 1)/(base_tariff_rate*(1) + tariff_rate*(1) + 1)
            ))
            TXT, 'base_tariff_rate' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               (-new_price + old_price*tariff_rate*(who_pays) + old_price)/((new_price - old_price)*(who_pays))
            )
            : (
               (-new_price + old_price*tariff_rate*(1) + old_price)/((new_price - old_price)*(1))
            ))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            car_new_price = car_old_price * (((1 + car_base_tariff_rate * if_else(who_pays_cbox < 1, who_pays, 1) + car_tariff_rate * if_else(who_pays_cbox < 1, who_pays, 1)) / (1 + car_base_tariff_rate * if_else(who_pays_cbox < 1, who_pays, 1))))
            TXT,
            'results' => ['car_new_price' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               car_old_price*(car_base_tariff_rate*(who_pays) + car_tariff_rate*(who_pays) + 1)/(car_base_tariff_rate*(who_pays) + 1)
            )
            : (
               car_old_price*(car_base_tariff_rate*(1) + car_tariff_rate*(1) + 1)/(car_base_tariff_rate*(1) + 1)
            ))
            TXT, 'car_base_tariff_rate' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               (-car_new_price + car_old_price*car_tariff_rate*(who_pays) + car_old_price)/((car_new_price - car_old_price)*(who_pays))
            )
            : (
               (-car_new_price + car_old_price*car_tariff_rate*(1) + car_old_price)/((car_new_price - car_old_price)*(1))
            ))
            TXT, 'car_tariff_rate' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               (car_base_tariff_rate*(car_new_price - car_old_price)*(who_pays) + car_new_price - car_old_price)/(car_old_price*(who_pays))
            )
            : (
               (car_base_tariff_rate*(car_new_price - car_old_price)*(1) + car_new_price - car_old_price)/(car_old_price*(1))
            ))
            TXT, 'car_old_price' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               car_new_price*(car_base_tariff_rate*(who_pays) + 1)/(car_base_tariff_rate*(who_pays) + car_tariff_rate*(who_pays) + 1)
            )
            : (
               car_new_price*(car_base_tariff_rate*(1) + 1)/(car_base_tariff_rate*(1) + car_tariff_rate*(1) + 1)
            ))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            new_pop_price = old_pop_price * (((1 + pop_base_tariff_rate * who_pays + pop_tariff_rate * if_else(who_pays_cbox < 1, who_pays, 1)) / (1 + pop_base_tariff_rate * if_else(who_pays_cbox < 1, who_pays, 1))))
            TXT,
            'results' => ['pop_tariff_rate' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               (new_pop_price*pop_base_tariff_rate*(who_pays) + new_pop_price - old_pop_price*pop_base_tariff_rate*who_pays - old_pop_price)/(old_pop_price*(who_pays))
            )
            : (
               (new_pop_price*pop_base_tariff_rate*(1) + new_pop_price - old_pop_price*pop_base_tariff_rate*who_pays - old_pop_price)/(old_pop_price*(1))
            ))
            TXT, 'old_pop_price' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               new_pop_price*(pop_base_tariff_rate*(who_pays) + 1)/(pop_base_tariff_rate*who_pays + pop_tariff_rate*(who_pays) + 1)
            )
            : (
               new_pop_price*(pop_base_tariff_rate*(1) + 1)/(pop_base_tariff_rate*who_pays + pop_tariff_rate*(1) + 1)
            ))
            TXT, 'pop_base_tariff_rate' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               (-new_pop_price + old_pop_price*pop_tariff_rate*(who_pays) + old_pop_price)/(new_pop_price*(who_pays) - old_pop_price*who_pays)
            )
            : (
               (-new_pop_price + old_pop_price*pop_tariff_rate*(1) + old_pop_price)/(new_pop_price*(1) - old_pop_price*who_pays)
            ))
            TXT, 'new_pop_price' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               old_pop_price*(pop_base_tariff_rate*who_pays + pop_tariff_rate*(who_pays) + 1)/(pop_base_tariff_rate*(who_pays) + 1)
            )
            : (
               old_pop_price*(pop_base_tariff_rate*who_pays + pop_tariff_rate*(1) + 1)/(pop_base_tariff_rate*(1) + 1)
            ))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            new_pop_price_custom = old_pop_price_custom * (((1 + pop_base_tariff_rate * if_else(who_pays_cbox < 1, who_pays, 1) + pop_tariff_rate * if_else(who_pays_cbox < 1, who_pays, 1)) / (1 +  pop_base_tariff_rate * if_else(who_pays_cbox < 1, who_pays, 1))))
            TXT,
            'results' => ['pop_tariff_rate' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               (new_pop_price_custom - old_pop_price_custom + pop_base_tariff_rate*(new_pop_price_custom - old_pop_price_custom)*(who_pays))/(old_pop_price_custom*(who_pays))
            )
            : (
               (new_pop_price_custom - old_pop_price_custom + pop_base_tariff_rate*(new_pop_price_custom - old_pop_price_custom)*(1))/(old_pop_price_custom*(1))
            ))
            TXT, 'pop_base_tariff_rate' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               (-new_pop_price_custom + old_pop_price_custom*pop_tariff_rate*(who_pays) + old_pop_price_custom)/((new_pop_price_custom - old_pop_price_custom)*(who_pays))
            )
            : (
               (-new_pop_price_custom + old_pop_price_custom*pop_tariff_rate*(1) + old_pop_price_custom)/((new_pop_price_custom - old_pop_price_custom)*(1))
            ))
            TXT, 'new_pop_price_custom' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               old_pop_price_custom*(pop_base_tariff_rate*(who_pays) + pop_tariff_rate*(who_pays) + 1)/(pop_base_tariff_rate*(who_pays) + 1)
            )
            : (
               old_pop_price_custom*(pop_base_tariff_rate*(1) + pop_tariff_rate*(1) + 1)/(pop_base_tariff_rate*(1) + 1)
            ))
            TXT, 'old_pop_price_custom' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               new_pop_price_custom*(pop_base_tariff_rate*(who_pays) + 1)/(pop_base_tariff_rate*(who_pays) + pop_tariff_rate*(who_pays) + 1)
            )
            : (
               new_pop_price_custom*(pop_base_tariff_rate*(1) + 1)/(pop_base_tariff_rate*(1) + pop_tariff_rate*(1) + 1)
            ))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            clothes_new_price = clothes_old_price * (((1 + clothes_base_tariff_rate * if_else(who_pays_cbox < 1, who_pays, 1) + clothes_tariff_rate * if_else(who_pays_cbox < 1, who_pays, 1)) / (1 + clothes_base_tariff_rate * if_else(who_pays_cbox < 1, who_pays, 1))))
            TXT,
            'results' => ['clothes_old_price' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               clothes_new_price*(clothes_base_tariff_rate*(who_pays) + 1)/(clothes_base_tariff_rate*(who_pays) + clothes_tariff_rate*(who_pays) + 1)
            )
            : (
               clothes_new_price*(clothes_base_tariff_rate*(1) + 1)/(clothes_base_tariff_rate*(1) + clothes_tariff_rate*(1) + 1)
            ))
            TXT, 'clothes_base_tariff_rate' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               (-clothes_new_price + clothes_old_price*clothes_tariff_rate*(who_pays) + clothes_old_price)/((clothes_new_price - clothes_old_price)*(who_pays))
            )
            : (
               (-clothes_new_price + clothes_old_price*clothes_tariff_rate*(1) + clothes_old_price)/((clothes_new_price - clothes_old_price)*(1))
            ))
            TXT, 'clothes_new_price' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               clothes_old_price*(clothes_base_tariff_rate*(who_pays) + clothes_tariff_rate*(who_pays) + 1)/(clothes_base_tariff_rate*(who_pays) + 1)
            )
            : (
               clothes_old_price*(clothes_base_tariff_rate*(1) + clothes_tariff_rate*(1) + 1)/(clothes_base_tariff_rate*(1) + 1)
            ))
            TXT, 'clothes_tariff_rate' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               (clothes_base_tariff_rate*(clothes_new_price - clothes_old_price)*(who_pays) + clothes_new_price - clothes_old_price)/(clothes_old_price*(who_pays))
            )
            : (
               (clothes_base_tariff_rate*(clothes_new_price - clothes_old_price)*(1) + clothes_new_price - clothes_old_price)/(clothes_old_price*(1))
            ))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            electronics_new_price = electronics_old_price * (((1 + electronics_base_tariff_rate * if_else(who_pays_cbox < 1, who_pays, 1) + electronics_tariff_rate * if_else(who_pays_cbox < 1, who_pays, 1)) / (1 + electronics_base_tariff_rate * if_else(who_pays_cbox < 1, who_pays, 1))))
            TXT,
            'results' => ['electronics_new_price' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               electronics_old_price*(electronics_base_tariff_rate*(who_pays) + electronics_tariff_rate*(who_pays) + 1)/(electronics_base_tariff_rate*(who_pays) + 1)
            )
            : (
               electronics_old_price*(electronics_base_tariff_rate*(1) + electronics_tariff_rate*(1) + 1)/(electronics_base_tariff_rate*(1) + 1)
            ))
            TXT, 'electronics_tariff_rate' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               (electronics_base_tariff_rate*(electronics_new_price - electronics_old_price)*(who_pays) + electronics_new_price - electronics_old_price)/(electronics_old_price*(who_pays))
            )
            : (
               (electronics_base_tariff_rate*(electronics_new_price - electronics_old_price)*(1) + electronics_new_price - electronics_old_price)/(electronics_old_price*(1))
            ))
            TXT, 'electronics_old_price' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               electronics_new_price*(electronics_base_tariff_rate*(who_pays) + 1)/(electronics_base_tariff_rate*(who_pays) + electronics_tariff_rate*(who_pays) + 1)
            )
            : (
               electronics_new_price*(electronics_base_tariff_rate*(1) + 1)/(electronics_base_tariff_rate*(1) + electronics_tariff_rate*(1) + 1)
            ))
            TXT, 'electronics_base_tariff_rate' => <<<'TXT'
            ((who_pays_cbox < 1) ? (
               (-electronics_new_price + electronics_old_price*electronics_tariff_rate*(who_pays) + electronics_old_price)/((electronics_new_price - electronics_old_price)*(who_pays))
            )
            : (
               (-electronics_new_price + electronics_old_price*electronics_tariff_rate*(1) + electronics_old_price)/((electronics_new_price - electronics_old_price)*(1))
            ))
            TXT],
        ],
        [
            'title' => 'temu_new_price = if_else(temu_old_price < 83.33, temu_old_price + 75, temu_old_price * 1.9)',
            'results' => ['temu_new_price' => <<<'TXT'
            (((temu_old_price < 8333/100) ? (
               temu_old_price + 75
            )
            : (
               (19/10)*temu_old_price
            )))
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Trump tariff works out Additional Trump tariff and Additional Trump tariff from Product categories, Other product categories and First, choose a product. There is no hidden constant here: change additional Trump tariff and product categories moves with it. The main result, Additional Trump tariff, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Trump tariff calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Trump tariff: it takes 19 numbers and reports Additional Trump tariff, Additional Trump tariff and Additional Trump tariff.</p><p>The result panel carries Additional Trump tariff, Additional Trump tariff, Additional Trump tariff and Additional Trump tariff, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 19 boxes and the page has everything it needs.</p><ul><li><strong>Product categories</strong> — a plain number, no unit</li><li><strong>Other product categories</strong> — a plain number, no unit</li><li><strong>First, choose a product</strong> — a plain number, no unit. Country of origin is in brackets.</li><li><strong>Country of origin</strong> — a plain number, no unit</li><li><strong>Country of origin</strong> — a plain number, no unit</li><li><strong>Percentage of tariffs passed on to you, the consumer</strong> — in percent</li><li><strong>Current price</strong> — a plain number, no unit</li><li><strong>Potential price with reciprocal tariffs</strong> — a plain number, no unit</li><li><strong>Potential price with reciprocal tariffs</strong> — a plain number, no unit</li><li><strong>Price</strong> — a plain number, no unit</li><li><strong>Price including import taxes</strong> — a plain number, no unit</li><li><strong>Product&#039;s current price</strong> — a plain number, no unit</li><li><strong>Product&#039;s potential price with reciprocal tariffs</strong> — a plain number, no unit</li><li><strong>Car&#039;s current price</strong> — a plain number, no unit</li><li><strong>Car&#039;s potential price with reciprocal tariffs</strong> — a plain number, no unit</li><li><strong>Clothing&#039;s current price</strong> — a plain number, no unit</li><li><strong>Clothing&#039;s potential price with reciprocal tariffs</strong> — a plain number, no unit</li><li><strong>Electrical item&#039;s current price</strong> — a plain number, no unit</li><li><strong>Electrical item&#039;s potential price with reciprocal tariffs</strong> — a plain number, no unit</li></ul><p>The result boxes are Additional Trump tariff in percent, Additional Trump tariff in percent, Additional Trump tariff in percent, Additional Trump tariff in percent, Electronics tariff rate in percent, Current price; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Product categories = 3, Other product categories = 4, First, choose a product = 1, Country of origin = 1.25, Country of origin = 0.25, Who pays cbox = 1, Percentage of tariffs passed on to you, the consumer = 100 perc, Custom price option = 0 and Price = 4; the answers are <strong>Potential price with reciprocal tariffs</strong> = 0 and <strong>Price including import taxes</strong> = 79.</p><ul><li><strong>Potential price with reciprocal tariffs</strong> = 0</li><li><strong>Price including import taxes</strong> = 79</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Potential price with reciprocal tariffs</strong> = 0 and <strong>Price including import taxes</strong> = 79. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Additional Trump tariff lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Price including import taxes</strong> = <code>(((Price &lt; 8333 ÷ 100) ? ( Price + 75 ) : ( (19 ÷ 10) × Price )))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Price including import taxes</strong> = <code>(((Price &lt; 8333 ÷ 100) ? ( Price + 75 ) : ( (19 ÷ 10) × Price )))</code> — the form to use when Price are the values you have.</li></ul><p>Any one of Product&#039;s potential price with reciprocal tariffs, Additional Trump tariff and Product&#039;s current price can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Product categories from 3 to 6, leaving every other box alone. The panel moves from <strong>Potential price with reciprocal tariffs</strong> 0 and <strong>Price including import taxes</strong> 79 to <strong>Potential price with reciprocal tariffs</strong> 0 and <strong>Price including import taxes</strong> 79.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Percentage of tariffs passed on to you, the consumer carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Additional Trump tariff, Additional Trump tariff and Additional Trump tariff are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Product categories left as a guess.</strong> Anything typed into Product categories is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Other product categories left as a guess.</strong> Anything typed into Other product categories is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Product categories and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Product categories, Other product categories, First, choose a product and Country of origin ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Product categories — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Additional Trump tariff in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Additional Trump tariff is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Product categories, Other product categories and First, choose a product measured, Additional Trump tariff and Additional Trump tariff wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/roa">ROA (return on assets)</a>, <a href="/finance/roas">ROAS Calculator</a> and <a href="/finance/roi">ROI Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Trump tariff is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>A criterion for choosing between these pages: Trump tariff answers a different question from the one above, even where the two share a sentence of explanation.</p><p>The nearest are <a href="/finance/roa">ROA (return on assets)</a>, <a href="/finance/roas">ROAS Calculator</a> and <a href="/finance/roi">ROI Calculator</a>. Each takes its own inputs and reports its own answer, and none of them shares a stored value with this page — open two in separate tabs and they will not interfere.</p><p>If the value you need is not the one reported here but a step before or after it, one of those pages probably reports it directly rather than making you convert by hand.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Trump tariff is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Product categories, Other product categories, First, choose a product and Country of origin beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Trump tariff calculator work out?', 'a' => <<<'TXT'
            Additional Trump tariff, Additional Trump tariff, Additional Trump tariff and Additional Trump tariff, from Who pays cbox, Product's current price, Base tariff rate and Percentage of tariffs passed on to you, the consumer.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Product categories, Other product categories, First, choose a product, Country of origin, Country of origin. With product categories, other product categories and first, choose a product in place, Additional Trump tariff can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Product's potential price with reciprocal tariffs, Additional Trump tariff, Product's current price and Base tariff rate blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Potential price with reciprocal tariffs = 0 and Price including import taxes = 79. Those are the defaults written into the form — move Product categories and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Additional Trump tariff is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Product categories blank and the page solves for it, reporting Additional Trump tariff instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Additional Trump tariff at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/roa', 'name' => 'ROA (return on assets)'],
            ['path' => '/finance/roas', 'name' => 'ROAS Calculator'],
            ['path' => '/finance/roi', 'name' => 'ROI Calculator'],
        ],
        'authors' => [],
    ],
];
