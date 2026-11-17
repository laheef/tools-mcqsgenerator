<?php

/**
 * Cyber Monday
 * /finance/cyber-monday
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cyber Monday',
    'meta' => ['title' => 'Cyber Monday Calculator — Formula & Results', 'description' => 'Cyber Monday reports discounted product price and including shipping. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Cyber Monday Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => 'What\'s the deal?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Get yourself prepared for the incoming Cyber Monday discounts! Use this tool to check how much you actually save on the deals. '],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'deal',
                            'label' => 'What type of deal?',
                            'type' => 'select',
                            'options' => [
                                '% off' => '0',
                                '% off on 2nd product' => '4',
                                '% off on 3rd product' => '5',
                                '2 for 1' => '1',
                                '3 for 2' => '2',
                                '4 for 3' => '3',
                                'Double discount' => '6',
                                'Triple discount' => '7',
                                'Discount on multiple units' => '8',
                            ],
                            'dataset' => 'Deal options',
                            'control' => 'DROPDOWN',
                            'default' => '% off',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'deal==1 or deal==2 or deal ==3', 'text' => 'If the products are not the same price, the cheapest item is free.&nbsp;'],
                                ['when' => 'deal==4 or deal==5', 'text' => 'If the products are not the same price, the cheapest item is discounted.&nbsp;'],
                                ['when' => 'deal==2', 'text' => 'Remember that such deals make sense only if you really want to buy three products.&nbsp;'],
                                ['when' => 'deal==3', 'text' => 'Remember that in this case, the maximum savings are 25%. Only go for it if you really need those four products.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'original_price',
                            'label' => 'Original price',
                            'type' => 'number',
                            'help' => 'Make sure it\'s not unrealistically high - compare with other retailers!',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.01'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discount_deal0',
                            'label' => 'Discount',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discount_second',
                            'label' => 'Discount',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discount_third',
                            'label' => 'Discount',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discount1',
                            'label' => '1st discount',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discount2',
                            'label' => '2nd discount',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discount3',
                            'label' => '3rd discount',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'product1',
                            'label' => 'Product 1 price',
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
                            'name' => 'product2',
                            'label' => 'Product 2  price',
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
                            'name' => 'product3',
                            'label' => 'Product 3 price',
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
                            'name' => 'product4',
                            'label' => 'Product 4 price',
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
                            'name' => 'n_units',
                            'label' => 'Number of products',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'unit_price',
                            'label' => 'Standard unit price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.01'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fixed_price',
                            'label' => 'Offered fixed price for multiple units',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.01'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_included',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Tax is included in the price' => '0', '' => '1'],
                            'dataset' => 'Tax inclusion options',
                            'control' => 'CHECKBOX',
                            'help' => 'Tax will be calculated on the final price. Different tax rules may apply to different deals and they may vary across states.',
                            'default' => 'Tax is included in the price',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Tax will be calculated on the final price. Different tax rules may apply to different deals, and they may vary across states.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sales_tax',
                            'label' => 'Sales tax',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shipping',
                            'label' => 'Shipping cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.01'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'not(hasValue(shipping))', 'text' => 'If shipping is free, please enter 0 for the shipping cost.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Your deal',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_new',
                            'label' => 'Discounted product price',
                            'type' => 'number',
                            'help' => 'The price excluding shipping (or with free shipping).',
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
                            'name' => 'price_new_ship',
                            'label' => 'Including shipping',
                            'type' => 'number',
                            'help' => 'The discounted price plus shipping costs.',
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
                            'name' => 'spent1',
                            'label' => 'Discounted product price',
                            'type' => 'number',
                            'help' => 'The price excluding shipping (or with free shipping).',
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
                            'name' => 'spent1_ship',
                            'label' => 'Including shipping',
                            'type' => 'number',
                            'help' => 'The discounted price plus shipping costs.',
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
                            'name' => 'savings1_av',
                            'label' => 'One item costs on average',
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
                            'name' => 'savings1',
                            'label' => 'You\'re saving',
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
                            'name' => 'savings1_p',
                            'label' => 'Total saving percentage',
                            'type' => 'number',
                            'help' => 'The amount you\'re saving in terms of the percentage of the total standard price for the 2 products.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spent2',
                            'label' => 'Discounted product price',
                            'type' => 'number',
                            'help' => 'The price excluding shipping (or with free shipping).',
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
                            'name' => 'spent2_ship',
                            'label' => 'Including shipping',
                            'type' => 'number',
                            'help' => 'The discounted price plus shipping costs.',
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
                            'name' => 'savings2_av',
                            'label' => 'One item costs on average',
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
                            'name' => 'savings2',
                            'label' => 'You\'re saving',
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
                            'name' => 'savings2_p',
                            'label' => 'Total saving percentage',
                            'type' => 'number',
                            'help' => 'The amount you\'re saving in terms of the percentage of the total standard price for the 3 products.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'savings0',
                            'label' => 'You\'re saving',
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
                            'name' => 'spent3',
                            'label' => 'Discounted product price',
                            'type' => 'number',
                            'help' => 'The price excluding shipping (or with free shipping).',
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
                            'name' => 'spent3_ship',
                            'label' => 'Including shipping',
                            'type' => 'number',
                            'help' => 'The discounted price plus shipping costs.',
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
                            'name' => 'savings3_av',
                            'label' => 'One item costs on average',
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
                            'name' => 'savings3',
                            'label' => 'You\'re saving',
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
                            'name' => 'savings3_p',
                            'label' => 'Total saving percentage',
                            'type' => 'number',
                            'help' => 'The amount you\'re saving in terms of the percentage of the total standard price for the 4 products.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spent4',
                            'label' => 'Discounted product price',
                            'type' => 'number',
                            'help' => 'The price excluding shipping (or with free shipping).',
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
                            'name' => 'spent4_ship',
                            'label' => 'Including shipping',
                            'type' => 'number',
                            'help' => 'The discounted price plus shipping costs.',
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
                            'name' => 'savings4_av',
                            'label' => 'One item costs on average',
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
                            'name' => 'savings4',
                            'label' => 'You\'re saving',
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
                            'name' => 'savings4_p',
                            'label' => 'Total saving percentage',
                            'type' => 'number',
                            'help' => 'The amount you\'re saving in terms of the percentage of the total standard price for the 2 products.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spent5',
                            'label' => 'Discounted product price',
                            'type' => 'number',
                            'help' => 'The price excluding shipping (or with free shipping).',
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
                            'name' => 'spent5_ship',
                            'label' => 'Including shipping',
                            'type' => 'number',
                            'help' => 'The discounted price plus shipping costs.',
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
                            'name' => 'savings5_av',
                            'label' => 'One item costs on average',
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
                            'name' => 'savings5',
                            'label' => 'You\'re saving',
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
                            'name' => 'savings5_p',
                            'label' => 'Total saving percentage',
                            'type' => 'number',
                            'help' => 'The amount you\'re saving in terms of the percentage of the total standard price for the 3 products.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spent6',
                            'label' => 'Discounted product price',
                            'type' => 'number',
                            'help' => 'The price excluding shipping (or with free shipping).',
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
                            'name' => 'spent6_ship',
                            'label' => 'Including shipping',
                            'type' => 'number',
                            'help' => 'The discounted price plus shipping costs.',
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
                            'name' => 'savings6',
                            'label' => 'You\'re saving',
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
                            'name' => 'spent7',
                            'label' => 'Discounted product price',
                            'type' => 'number',
                            'help' => 'The price excluding shipping (or with free shipping).',
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
                            'name' => 'spent7_ship',
                            'label' => 'Including shipping',
                            'type' => 'number',
                            'help' => 'The discounted price plus shipping costs.',
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
                            'name' => 'savings7',
                            'label' => 'You\'re saving',
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
                            'name' => 'spent8',
                            'label' => 'Discounted product price',
                            'type' => 'number',
                            'help' => 'The price excluding shipping (or with free shipping).',
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
                            'name' => 'spent8_ship',
                            'label' => 'Including shipping',
                            'type' => 'number',
                            'help' => 'The discounted price plus shipping costs.',
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
                            'name' => 'savings8',
                            'label' => 'You\'re saving',
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
                            'name' => 'savings8_p',
                            'label' => 'Total saving percentage',
                            'type' => 'number',
                            'help' => 'The amount you\'re saving in terms of the percentage of the total standard price.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => '(discount_deal0>0.8 and deal==0) or  (savings6_p>0.8 and deal==6) or  (savings7_p>0.8 and deal==7) or  (savings8_p>0.8 and deal==8)', 'text' => 'Looks like it\'s a real bargain!!! &nbsp;'],
                                ['when' => <<<'TXT'
                                (discount_deal0>0.6 and discount_deal0<=0.8 and deal==0) or  (savings6_p>0.6 and savings6_p<=0.8 and deal==6) or  (savings7_p>0.6 and savings7_p<=0.8 and deal==7) or  (savings8_p>0.6 and savings8_p<=0.8 and deal==8)
                                TXT, 'text' => 'That sounds like a great deal!&nbsp;'],
                                ['when' => <<<'TXT'
                                (discount_deal0>0.4 and discount_deal0<=0.6 and deal==0) or  (savings6_p>0.4 and savings6_p<=0.6 and deal==6) or  (savings7_p>0.4 and savings7_p<=0.6 and deal==7) or  (savings8_p>0.4 and savings8_p<=0.6 and deal==8)
                                TXT, 'text' => 'It looks like you\'ve found quite a good bargain!&nbsp;'],
                                ['when' => <<<'TXT'
                                (discount_deal0>0.2 and discount_deal0<=0.4 and deal==0) or (savings6_p>0.2 and savings6_p<=0.4 and deal==6) or  (savings7_p>0.2 and savings7_p<=0.4 and deal==7) or  (savings8_p>0.2 and savings8_p<=0.4 and deal==8)
                                TXT, 'text' => 'That offer is worth considering!&nbsp;'],
                                ['when' => <<<'TXT'
                                (discount_deal0>0.1 and discount_deal0<=0.2 and deal==0) or  (savings6_p>0.1 and savings6_p<=0.2 and deal==6) or  (savings7_p>0.1 and savings7_p<=0.2 and deal==7) or  (savings8_p>0.1 and savings8_p<=0.2 and deal==8)
                                TXT, 'text' => 'Meh. Should you even bother with such an offer?&nbsp;'],
                                ['when' => <<<'TXT'
                                (discount_deal0>0.03 and discount_deal0<=0.1 and deal==0) or  (savings6_p>0.03 and savings6_p<=0.1 and deal==6) or  (savings7_p>0.03 and savings7_p<=0.1 and deal==7) or  (savings8_p>0.03 and savings8_p<=0.1 and deal==8)
                                TXT, 'text' => 'Savings will be insubstantial unless you\'re buying a car, a villa, or even a yacht.&nbsp;'],
                                ['when' => <<<'TXT'
                                (discount_deal0>=0 and discount_deal0<=0.03 and deal==0) or  (savings6_p>=0 and savings6_p<=0.03 and deal==6) or  (savings7_p>=0 and savings7_p<=0.03 and deal==7) or  (savings8_p>=0 and savings8_p<=0.03 and deal==8)
                                TXT, 'text' => 'Oh, really? This deal\'s not worth the time.&nbsp;'],
                                ['when' => '(discount_deal0<0 and deal==0) or (savings6_p<0 and deal==6) or (savings7_p<0 and deal==7) or (savings8_p<0 and deal==8)', 'text' => 'You\'ve got duped, man!&nbsp;'],
                                ['when' => <<<'TXT'
                                (savings1_p==0.50 and deal==1) or (savings2_p==1/3 and deal==2) or (savings3_p==0.25 and deal==3) or (savings4_p==0.50 and deal==4) or (savings5_p==1/3 and deal==5)
                                TXT, 'text' => 'That\'s the greatest savings you can get for this kind of deal.&nbsp;'],
                                ['when' => <<<'TXT'
                                (savings1_p>0.40 and savings1_p!=0.50 and deal==1) or (savings2_p>0.30 and savings2_p!=1/3 and deal==2) or (savings3_p>0.23 and savings3_p!=0.25 and deal==3) or (savings4_p>0.23 and savings4_p!=0.50 and deal==4) or (savings5_p>0.23 and savings5_p!=1/3 and deal==5)
                                TXT, 'text' => 'That sounds like a great deal!&nbsp;'],
                                ['when' => <<<'TXT'
                                (savings1_p >0.20 and savings1_p <= 0.40 and deal==1) or (savings2_p >0.20 and savings2_p <=0.30 and deal==2) or (savings3_p >0.16 and savings3_p <=0.23 and deal==3) or (savings4_p >0.16 and savings4_p <=0.23 and deal==4) or (savings5_p >0.16 and savings5_p <=0.23 and deal==5)
                                TXT, 'text' => 'Not bad! Consider buying items with similar prices to save even more.&nbsp;'],
                                ['when' => <<<'TXT'
                                (savings1_p >0.10 and savings1_p <=0.20 and deal==1) or (savings2_p >0.10 and savings2_p <=0.20 and deal==2) or (savings3_p >0.10 and savings3_p <=0.16 and deal==3) or (savings4_p >0.10 and savings4_p <=0.16 and deal==4) or (savings5_p >0.10 and savings5_p <=0.16 and deal==5)
                                TXT, 'text' => 'Your savings look insubstantial in terms of percentages. This kind of deal exists because of Cyber Monday—do you even need it?&nbsp;'],
                                ['when' => <<<'TXT'
                                (savings1_p >0 and savings1_p <=0.10 and deal==1) or (savings2_p >0 and savings2_p <=0.10 and deal==2) or (savings3_p >0 and savings3_p <=0.10 and deal==3) or (savings4_p >0 and savings4_p <=0.10 and deal==4) or (savings5_p >0 and savings5_p <=0.10 and deal==5)
                                TXT, 'text' => 'Well, that doesn\'t look like a great deal at all.&nbsp;'],
                                ['when' => 'deal==6 and savings6_p_print!=savings6_p_false_print', 'text' => <<<'TXT'
                                The effective discount is {{savings6_p_print.formattedValue}}%, not {{savings6_p_false_print.formattedValue}}% ({{discount1.formattedValue}}% + {{discount2.formattedValue}}%).&nbsp;
                                TXT],
                                ['when' => 'deal==7 and savings7_p_print!=savings7_p_false_print', 'text' => <<<'TXT'
                                {{discount1.formattedValue}}% + {{discount2.formattedValue}}% + {{discount3.formattedValue}}% deal means that the effective discount is {{savings7_p_print.formattedValue}}%, not {{savings7_p_false_print.formattedValue}}%.&nbsp;
                                TXT],
                                ['when' => 'deal==1 or deal==2 or deal==3 or deal==4 or deal==5 or deal==6 or deal==7 or (deal==8 and savings8>=0)', 'text' => 'Instead of paying&nbsp;'],
                                ['when' => 'deal==1', 'text' => '{{deal1_total.monetaryValue}}, you\'d pay&nbsp;'],
                                ['when' => 'deal==2', 'text' => '{{deal2_total.monetaryValue}}, you\'d pay&nbsp;'],
                                ['when' => 'deal==3', 'text' => '{{deal3_total.monetaryValue}}, you\'d pay&nbsp;'],
                                ['when' => 'deal==4', 'text' => '{{deal4_total.monetaryValue}}, you\'d pay&nbsp;'],
                                ['when' => 'deal==5', 'text' => '{{deal5_total.monetaryValue}}, you\'d pay&nbsp;'],
                                ['when' => 'deal==6', 'text' => '{{deal6_total.monetaryValue}}, you\'d pay&nbsp;'],
                                ['when' => 'deal==7', 'text' => '{{deal7_total.monetaryValue}}, you\'d pay&nbsp;'],
                                ['when' => 'deal==8 and savings8>=0', 'text' => '{{deal8_total.monetaryValue}}, you\'d pay&nbsp;'],
                                ['when' => 'deal==1', 'text' => '{{spent1_ship.monetaryValue}}, and&nbsp;'],
                                ['when' => 'deal==2', 'text' => '{{spent2_ship.monetaryValue}}, and&nbsp;'],
                                ['when' => 'deal==3', 'text' => '{{spent3_ship.monetaryValue}}, and&nbsp;'],
                                ['when' => 'deal==4', 'text' => '{{spent4_ship.monetaryValue}}, and&nbsp;'],
                                ['when' => 'deal==5', 'text' => '{{spent5_ship.monetaryValue}}, and&nbsp;'],
                                ['when' => 'deal==6', 'text' => '{{spent6_ship.monetaryValue}}, and&nbsp;'],
                                ['when' => 'deal==7', 'text' => '{{spent7_ship.monetaryValue}}, and&nbsp;'],
                                ['when' => 'deal==8 and savings8>=0', 'text' => '{{spent8_ship.monetaryValue}}, and&nbsp;'],
                                ['when' => 'deal==1', 'text' => '{{savings1.monetaryValue}} would stay in your pocket.&nbsp;'],
                                ['when' => 'deal==2', 'text' => '{{savings2.monetaryValue}} would stay in your pocket.&nbsp;'],
                                ['when' => 'deal==3', 'text' => '{{savings3.monetaryValue}} would stay in your pocket.&nbsp;'],
                                ['when' => 'deal==4', 'text' => '{{savings4.monetaryValue}} would stay in your pocket.&nbsp;'],
                                ['when' => 'deal==5', 'text' => '{{savings5.monetaryValue}} would stay in your pocket.&nbsp;'],
                                ['when' => 'deal==6', 'text' => '{{savings6.monetaryValue}} would stay in your pocket.&nbsp;'],
                                ['when' => 'deal==7', 'text' => '{{savings7.monetaryValue}} would stay in your pocket.&nbsp;'],
                                ['when' => 'deal==8 and savings8>=0', 'text' => '{{savings8.monetaryValue}} would stay in your pocket.&nbsp;'],
                                ['when' => 'deal==1 and savings1>=20 and savings1_p<=0.20', 'text' => 'But on the other hand, {{savings1.monetaryValue}} isn\'t nothing!&nbsp;'],
                                ['when' => 'deal==2 and savings2>=20 and savings2_p<=0.20', 'text' => 'But on the other hand, {{savings2.monetaryValue}} isn\'t nothing!&nbsp;'],
                                ['when' => 'deal==3 and savings3>=20 and savings3_p<=0.20', 'text' => 'But on the other hand, {{savings3.monetaryValue}} isn\'t nothing!&nbsp;'],
                                ['when' => 'deal==4 and savings4>=20 and savings4_p<=0.20', 'text' => 'But on the other hand, {{savings4.monetaryValue}} isn\'t nothing!&nbsp;'],
                                ['when' => 'deal==5 and savings5>=20 and savings5_p<=0.20', 'text' => 'But on the other hand, {{savings5.monetaryValue}} isn\'t nothing!&nbsp;'],
                                ['when' => 'deal==8 and savings8<0', 'text' => <<<'TXT'
                                Instead of paying {{deal8_total.monetaryValue}}, you'd pay {{spent8_ship.monetaryValue}}. That's not a deal! You're paying {{negated_savings8.monetaryValue}} more than buying those products separately!
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'cyber-monday/deals-min.gif'],
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
                            'name' => 'additional_tax',
                            'label' => 'A',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'deal1_total',
                            'label' => 'Deal1 total',
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
                            'name' => 'deal2_total',
                            'label' => 'Deal2 total',
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
                            'name' => 'deal3_total',
                            'label' => 'Deal3 total',
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
                            'name' => 'deal4_total',
                            'label' => 'Deal4 total',
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
                            'name' => 'deal5_total',
                            'label' => 'Deal5 total',
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
                            'name' => 'deal6_total',
                            'label' => 'Deal6 total',
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
                            'name' => 'deal7_total',
                            'label' => 'Deal7 total',
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
                            'name' => 'deal8_total',
                            'label' => 'Deal8 total',
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
                            'name' => 'savings6_p',
                            'label' => 'Savings6 p',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'savings6_p_print',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'savings6_p_false_print',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'savings7_p',
                            'label' => 'Savings7 p',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'savings7_p_print',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'savings7_p_false_print',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'negated_savings8',
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
            'title' => 'additional_tax = sales_tax * tax_included+1',
            'results' => ['sales_tax' => '(additional_tax - 1)/tax_included', 'tax_included' => '(additional_tax - 1)/sales_tax', 'additional_tax' => 'sales_tax*tax_included + 1'],
        ],
        [
            'title' => 'savings0 = additional_tax * (original_price * discount_deal0)',
            'results' => ['savings0' => 'additional_tax*discount_deal0*original_price', 'additional_tax' => 'savings0/(discount_deal0*original_price)', 'original_price' => 'savings0/(additional_tax*discount_deal0)', 'discount_deal0' => 'savings0/(additional_tax*original_price)'],
        ],
        [
            'title' => 'price_new = additional_tax * (original_price - original_price * discount_deal0)',
            'results' => ['price_new' => 'additional_tax*original_price*(1 - discount_deal0)', 'additional_tax' => '-price_new/(original_price*(discount_deal0 - 1))', 'original_price' => '-price_new/(additional_tax*(discount_deal0 - 1))', 'discount_deal0' => '1 - price_new/(additional_tax*original_price)'],
        ],
        [
            'title' => 'savings3 = additional_tax * min(product1,product2,product3,product4)',
            'results' => ['additional_tax' => 'savings3/min(product1, product2, product3, product4)', 'savings3' => 'additional_tax*min(product1, product2, product3, product4)'],
        ],
        [
            'title' => 'spent3 = additional_tax * ((product1 + product2 + product3 + product4) -  min(product1,product2,product3,product4))',
            'results' => ['additional_tax' => 'spent3/(product1 + product2 + product3 + product4 - min(product1, product2, product3, product4))', 'spent3' => 'additional_tax*(product1 + product2 + product3 + product4 - min(product1, product2, product3, product4))'],
        ],
        [
            'title' => 'savings3_av =  spent3 / 4',
            'results' => ['savings3_av' => '(1/4)*spent3', 'spent3' => '4*savings3_av'],
        ],
        [
            'title' => 'savings3_p = savings3 / (additional_tax * (product1 + product2 + product3 +product4) + shipping)',
            'results' => [
                'product4' => '-product1 - product2 - product3 + savings3/(additional_tax*savings3_p) - shipping/additional_tax',
                'shipping' => '(-additional_tax*savings3_p*(product1 + product2 + product3 + product4) + savings3)/savings3_p',
                'savings3_p' => 'savings3/(additional_tax*product1 + additional_tax*product2 + additional_tax*product3 + additional_tax*product4 + shipping)',
                'additional_tax' => '(savings3 - savings3_p*shipping)/(savings3_p*(product1 + product2 + product3 + product4))',
                'product3' => '-product1 - product2 - product4 + savings3/(additional_tax*savings3_p) - shipping/additional_tax',
                'product1' => '-product2 - product3 - product4 + savings3/(additional_tax*savings3_p) - shipping/additional_tax',
                'savings3' => 'savings3_p*(additional_tax*product1 + additional_tax*product2 + additional_tax*product3 + additional_tax*product4 + shipping)',
                'product2' => '-product1 - product3 - product4 + savings3/(additional_tax*savings3_p) - shipping/additional_tax',
            ],
        ],
        [
            'title' => 'spent4 = additional_tax * (product1 + product2 - discount_second * min(product1,product2) )',
            'results' => ['discount_second' => '(additional_tax*(product1 + product2) - spent4)/(additional_tax*min(product1, product2))', 'additional_tax' => 'spent4/(-discount_second*min(product1, product2) + product1 + product2)', 'spent4' => 'additional_tax*(-discount_second*min(product1, product2) + product1 + product2)'],
        ],
        [
            'title' => 'savings4_av =  spent4 / 2',
            'results' => ['spent4' => '2*savings4_av', 'savings4_av' => '(1/2)*spent4'],
        ],
        [
            'title' => 'savings4 = additional_tax * discount_second * min(product1,product2)',
            'results' => ['savings4' => 'additional_tax*discount_second*min(product1, product2)', 'discount_second' => 'savings4/(additional_tax*min(product1, product2))', 'additional_tax' => 'savings4/(discount_second*min(product1, product2))'],
        ],
        [
            'title' => 'savings4_p = savings4 / (additional_tax * (product1 + product2) + shipping)',
            'results' => [
                'savings4' => 'savings4_p*(additional_tax*product1 + additional_tax*product2 + shipping)',
                'shipping' => '(-additional_tax*savings4_p*(product1 + product2) + savings4)/savings4_p',
                'additional_tax' => '(savings4 - savings4_p*shipping)/(savings4_p*(product1 + product2))',
                'product1' => '-product2 + savings4/(additional_tax*savings4_p) - shipping/additional_tax',
                'savings4_p' => 'savings4/(additional_tax*product1 + additional_tax*product2 + shipping)',
                'product2' => '-product1 + savings4/(additional_tax*savings4_p) - shipping/additional_tax',
            ],
        ],
        [
            'title' => 'spent5 = additional_tax * (product1 + product2 + product3 - discount_third * min(product1,product2,product3) )',
            'results' => ['additional_tax' => 'spent5/(-discount_third*min(product1, product2, product3) + product1 + product2 + product3)', 'discount_third' => '(additional_tax*(product1 + product2 + product3) - spent5)/(additional_tax*min(product1, product2, product3))', 'spent5' => 'additional_tax*(-discount_third*min(product1, product2, product3) + product1 + product2 + product3)'],
        ],
        [
            'title' => 'savings5_av =  spent5 / 3',
            'results' => ['spent5' => '3*savings5_av', 'savings5_av' => '(1/3)*spent5'],
        ],
        [
            'title' => 'savings5 = additional_tax * discount_third * min(product1,product2,product3)',
            'results' => ['additional_tax' => 'savings5/(discount_third*min(product1, product2, product3))', 'discount_third' => 'savings5/(additional_tax*min(product1, product2, product3))', 'savings5' => 'additional_tax*discount_third*min(product1, product2, product3)'],
        ],
        [
            'title' => 'savings5_p = savings5 / (additional_tax * (product1 + product2 + product3) + shipping)',
            'results' => [
                'shipping' => '(-additional_tax*savings5_p*(product1 + product2 + product3) + savings5)/savings5_p',
                'additional_tax' => '(savings5 - savings5_p*shipping)/(savings5_p*(product1 + product2 + product3))',
                'product3' => '-product1 - product2 + savings5/(additional_tax*savings5_p) - shipping/additional_tax',
                'savings5_p' => 'savings5/(additional_tax*product1 + additional_tax*product2 + additional_tax*product3 + shipping)',
                'product1' => '-product2 - product3 + savings5/(additional_tax*savings5_p) - shipping/additional_tax',
                'savings5' => 'savings5_p*(additional_tax*product1 + additional_tax*product2 + additional_tax*product3 + shipping)',
                'product2' => '-product1 - product3 + savings5/(additional_tax*savings5_p) - shipping/additional_tax',
            ],
        ],
        [
            'title' => 'spent6 = additional_tax * (original_price - original_price * discount1 - (original_price - original_price * discount1)* discount2)',
            'results' => [
                'additional_tax' => 'spent6/(original_price*(discount1*discount2 - discount1 - discount2 + 1))',
                'spent6' => 'additional_tax*original_price*(discount1*discount2 - discount1 - discount2 + 1)',
                'discount1' => '(additional_tax*discount2*original_price - additional_tax*original_price + spent6)/(additional_tax*original_price*(discount2 - 1))',
                'original_price' => 'spent6/(additional_tax*(discount1*discount2 - discount1 - discount2 + 1))',
                'discount2' => '(additional_tax*discount1*original_price - additional_tax*original_price + spent6)/(additional_tax*original_price*(discount1 - 1))',
            ],
        ],
        [
            'title' => 'savings6 = additional_tax * (original_price - spent6)',
            'results' => ['savings6' => 'additional_tax*(original_price - spent6)', 'original_price' => 'spent6 + savings6/additional_tax', 'additional_tax' => 'savings6/(original_price - spent6)', 'spent6' => 'original_price - savings6/additional_tax'],
        ],
        [
            'title' => 'spent7 = additional_tax * (original_price - original_price * discount1) * (1 - discount2) * (1 - discount3)',
            'results' => [
                'additional_tax' => <<<'TXT'
                -spent7/(original_price*(discount1*discount2*discount3 - discount1*discount2 - discount1*discount3 + discount1 - discount2*discount3 + discount2 + discount3 - 1))
                TXT,
                'original_price' => <<<'TXT'
                -spent7/(additional_tax*(discount1*discount2*discount3 - discount1*discount2 - discount1*discount3 + discount1 - discount2*discount3 + discount2 + discount3 - 1))
                TXT,
                'discount1' => <<<'TXT'
                (additional_tax*discount2*discount3*original_price - additional_tax*discount2*original_price - additional_tax*discount3*original_price + additional_tax*original_price - spent7)/(additional_tax*original_price*(discount2*discount3 - discount2 - discount3 + 1))
                TXT,
                'spent7' => <<<'TXT'
                additional_tax*original_price*(-discount1*discount2*discount3 + discount1*discount2 + discount1*discount3 - discount1 + discount2*discount3 - discount2 - discount3 + 1)
                TXT,
                'discount2' => <<<'TXT'
                (additional_tax*discount1*discount3*original_price - additional_tax*discount1*original_price - additional_tax*discount3*original_price + additional_tax*original_price - spent7)/(additional_tax*original_price*(discount1*discount3 - discount1 - discount3 + 1))
                TXT,
                'discount3' => <<<'TXT'
                (additional_tax*discount1*discount2*original_price - additional_tax*discount1*original_price - additional_tax*discount2*original_price + additional_tax*original_price - spent7)/(additional_tax*original_price*(discount1*discount2 - discount1 - discount2 + 1))
                TXT,
            ],
        ],
        [
            'title' => 'savings7 = additional_tax * (original_price - spent7)',
            'results' => ['spent7' => 'original_price - savings7/additional_tax', 'additional_tax' => 'savings7/(original_price - spent7)', 'original_price' => 'spent7 + savings7/additional_tax', 'savings7' => 'additional_tax*(original_price - spent7)'],
        ],
        [
            'title' => 'spent8 = additional_tax * (fixed_price)',
            'results' => ['additional_tax' => 'spent8/fixed_price', 'fixed_price' => 'spent8/additional_tax', 'spent8' => 'additional_tax*fixed_price'],
        ],
        [
            'title' => 'savings8 = additional_tax * (unit_price* n_units - fixed_price)',
            'results' => [
                'unit_price' => '(additional_tax*fixed_price + savings8)/(additional_tax*n_units)',
                'additional_tax' => '-savings8/(fixed_price - n_units*unit_price)',
                'fixed_price' => 'n_units*unit_price - savings8/additional_tax',
                'savings8' => 'additional_tax*(-fixed_price + n_units*unit_price)',
                'n_units' => '(additional_tax*fixed_price + savings8)/(additional_tax*unit_price)',
            ],
        ],
        [
            'title' => 'savings8_p = savings8 / (additional_tax * unit_price* n_units + shipping)',
            'results' => [
                'unit_price' => '(savings8 - savings8_p*shipping)/(additional_tax*n_units*savings8_p)',
                'shipping' => '-additional_tax*n_units*unit_price + savings8/savings8_p',
                'additional_tax' => '(savings8 - savings8_p*shipping)/(n_units*savings8_p*unit_price)',
                'savings8_p' => 'savings8/(additional_tax*n_units*unit_price + shipping)',
                'savings8' => 'savings8_p*(additional_tax*n_units*unit_price + shipping)',
                'n_units' => '(savings8 - savings8_p*shipping)/(additional_tax*savings8_p*unit_price)',
            ],
        ],
        [
            'title' => 'savings1 = additional_tax * (product1+ product2) - spent1',
            'results' => [
                'additional_tax' => '(savings1 + spent1)/(product1 + product2)',
                'product1' => '(-additional_tax*product2 + savings1 + spent1)/additional_tax',
                'savings1' => 'additional_tax*product1 + additional_tax*product2 - spent1',
                'spent1' => 'additional_tax*product1 + additional_tax*product2 - savings1',
                'product2' => '(-additional_tax*product1 + savings1 + spent1)/additional_tax',
            ],
        ],
        [
            'title' => 'spent1 = additional_tax * (max(product1,product2) )',
            'results' => ['spent1' => 'additional_tax*max(product1, product2)', 'additional_tax' => 'spent1/max(product1, product2)'],
        ],
        [
            'title' => 'savings1_av = spent1 / 2',
            'results' => ['spent1' => '2*savings1_av', 'savings1_av' => '(1/2)*spent1'],
        ],
        [
            'title' => 'savings1_p = savings1 / (additional_tax * (product1 + product2) + shipping)',
            'results' => [
                'shipping' => '(-additional_tax*savings1_p*(product1 + product2) + savings1)/savings1_p',
                'additional_tax' => '(savings1 - savings1_p*shipping)/(savings1_p*(product1 + product2))',
                'savings1_p' => 'savings1/(additional_tax*product1 + additional_tax*product2 + shipping)',
                'product1' => '-product2 + savings1/(additional_tax*savings1_p) - shipping/additional_tax',
                'savings1' => 'savings1_p*(additional_tax*product1 + additional_tax*product2 + shipping)',
                'product2' => '-product1 + savings1/(additional_tax*savings1_p) - shipping/additional_tax',
            ],
        ],
        [
            'title' => 'savings2 = additional_tax * min(product1,product2,product3)',
            'results' => ['additional_tax' => 'savings2/min(product1, product2, product3)', 'savings2' => 'additional_tax*min(product1, product2, product3)'],
        ],
        [
            'title' => 'spent2 = additional_tax * ((product1 + product2 + product3) -  min(product1,product2,product3))',
            'results' => ['spent2' => 'additional_tax*(product1 + product2 + product3 - min(product1, product2, product3))', 'additional_tax' => 'spent2/(product1 + product2 + product3 - min(product1, product2, product3))'],
        ],
        [
            'title' => 'savings2_av =  spent2 / (deal+1)',
            'results' => ['spent2' => 'savings2_av*(deal + 1)', 'savings2_av' => 'spent2/(deal + 1)', 'deal' => '(-savings2_av + spent2)/savings2_av'],
        ],
        [
            'title' => 'savings2_p = savings2 / (additional_tax * (product1 + product2 + product3) + shipping)',
            'results' => [
                'shipping' => '(-additional_tax*savings2_p*(product1 + product2 + product3) + savings2)/savings2_p',
                'additional_tax' => '(savings2 - savings2_p*shipping)/(savings2_p*(product1 + product2 + product3))',
                'product3' => '-product1 - product2 + savings2/(additional_tax*savings2_p) - shipping/additional_tax',
                'product1' => '-product2 - product3 + savings2/(additional_tax*savings2_p) - shipping/additional_tax',
                'savings2' => 'savings2_p*(additional_tax*product1 + additional_tax*product2 + additional_tax*product3 + shipping)',
                'savings2_p' => 'savings2/(additional_tax*product1 + additional_tax*product2 + additional_tax*product3 + shipping)',
                'product2' => '-product1 - product3 + savings2/(additional_tax*savings2_p) - shipping/additional_tax',
            ],
        ],
        [
            'title' => 'price_new_ship = price_new + shipping',
            'results' => ['price_new' => 'price_new_ship - shipping', 'shipping' => '-price_new + price_new_ship', 'price_new_ship' => 'price_new + shipping'],
        ],
        [
            'title' => 'spent1_ship = spent1 + shipping',
            'results' => ['spent1_ship' => 'shipping + spent1', 'shipping' => '-spent1 + spent1_ship', 'spent1' => '-shipping + spent1_ship'],
        ],
        [
            'title' => 'spent2_ship = spent2 + shipping',
            'results' => ['spent2' => '-shipping + spent2_ship', 'shipping' => '-spent2 + spent2_ship', 'spent2_ship' => 'shipping + spent2'],
        ],
        [
            'title' => 'spent3_ship = spent3 + shipping',
            'results' => ['spent3_ship' => 'shipping + spent3', 'shipping' => '-spent3 + spent3_ship', 'spent3' => '-shipping + spent3_ship'],
        ],
        [
            'title' => 'spent4_ship = spent4 + shipping',
            'results' => ['spent4' => '-shipping + spent4_ship', 'shipping' => '-spent4 + spent4_ship', 'spent4_ship' => 'shipping + spent4'],
        ],
        [
            'title' => 'spent5_ship = spent5 + shipping',
            'results' => ['spent5' => '-shipping + spent5_ship', 'shipping' => '-spent5 + spent5_ship', 'spent5_ship' => 'shipping + spent5'],
        ],
        [
            'title' => 'spent6_ship = spent6 + shipping',
            'results' => ['shipping' => '-spent6 + spent6_ship', 'spent6' => '-shipping + spent6_ship', 'spent6_ship' => 'shipping + spent6'],
        ],
        [
            'title' => 'spent7_ship = spent7 + shipping',
            'results' => ['spent7_ship' => 'shipping + spent7', 'shipping' => '-spent7 + spent7_ship', 'spent7' => '-shipping + spent7_ship'],
        ],
        [
            'title' => 'spent8_ship = spent8 + shipping',
            'results' => ['shipping' => '-spent8 + spent8_ship', 'spent8_ship' => 'shipping + spent8', 'spent8' => '-shipping + spent8_ship'],
        ],
        [
            'title' => 'savings6_p = discount1 + (1 - discount1) * discount2',
            'results' => ['discount1' => '(discount2 - savings6_p)/(discount2 - 1)', 'savings6_p' => '-discount1*discount2 + discount1 + discount2', 'discount2' => '(discount1 - savings6_p)/(discount1 - 1)'],
        ],
        [
            'title' => 'savings7_p = discount1 + (1 - discount1) * discount2 + (1 - (discount1 + (1 - discount1) * discount2)) * discount3',
            'results' => ['discount2' => '(discount1*discount3 - discount1 - discount3 + savings7_p)/(discount1*discount3 - discount1 - discount3 + 1)', 'discount1' => '(discount2*discount3 - discount2 - discount3 + savings7_p)/(discount2*discount3 - discount2 - discount3 + 1)', 'savings7_p' => 'discount1*discount2*discount3 - discount1*discount2 - discount1*discount3 + discount1 - discount2*discount3 + discount2 + discount3', 'discount3' => '(discount1*discount2 - discount1 - discount2 + savings7_p)/(discount1*discount2 - discount1 - discount2 + 1)'],
        ],
        [
            'title' => 'deal1_total = spent1_ship + savings1',
            'results' => ['spent1_ship' => 'deal1_total - savings1', 'deal1_total' => 'savings1 + spent1_ship', 'savings1' => 'deal1_total - spent1_ship'],
        ],
        [
            'title' => 'deal2_total = spent2_ship + savings2',
            'results' => ['savings2' => 'deal2_total - spent2_ship', 'spent2_ship' => 'deal2_total - savings2', 'deal2_total' => 'savings2 + spent2_ship'],
        ],
        [
            'title' => 'deal3_total = spent3_ship + savings3',
            'results' => ['spent3_ship' => 'deal3_total - savings3', 'deal3_total' => 'savings3 + spent3_ship', 'savings3' => 'deal3_total - spent3_ship'],
        ],
        [
            'title' => 'deal4_total = spent4_ship + savings4',
            'results' => ['savings4' => 'deal4_total - spent4_ship', 'deal4_total' => 'savings4 + spent4_ship', 'spent4_ship' => 'deal4_total - savings4'],
        ],
        [
            'title' => 'deal5_total = spent5_ship + savings5',
            'results' => ['deal5_total' => 'savings5 + spent5_ship', 'spent5_ship' => 'deal5_total - savings5', 'savings5' => 'deal5_total - spent5_ship'],
        ],
        [
            'title' => 'deal6_total = spent6_ship + savings6',
            'results' => ['savings6' => 'deal6_total - spent6_ship', 'deal6_total' => 'savings6 + spent6_ship', 'spent6_ship' => 'deal6_total - savings6'],
        ],
        [
            'title' => 'deal7_total = spent7_ship + savings7',
            'results' => ['spent7_ship' => 'deal7_total - savings7', 'deal7_total' => 'savings7 + spent7_ship', 'savings7' => 'deal7_total - spent7_ship'],
        ],
        [
            'title' => 'deal8_total = spent8_ship + savings8',
            'results' => ['savings8' => 'deal8_total - spent8_ship', 'deal8_total' => 'savings8 + spent8_ship', 'spent8_ship' => 'deal8_total - savings8'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Cyber Monday turns Sales tax into What type of deal? and Original price. The arithmetic is the whole method: what type of deal? is worked out from sales tax by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Cyber Monday calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cyber Monday: it takes 1 number and reports What type of deal?, Original price and Discount.</p><p>In the form&#039;s own words, A = Sales tax × Tax included + 1.</p><p>What comes back is What type of deal?, Original price, Discount and Discount — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Sales tax</strong> — in percent</li></ul><p>What you get back is What type of deal?, Original price in USD, Discount in percent, Discount in percent, Discount in percent, 1st discount in percent, 2nd discount in percent, 3rd discount in percent, Product 1 price in USD, Product 2 price in USD, Product 3 price in USD, Product 4 price in USD, Number of products, Standard unit price in USD, Offered fixed price for multiple units in USD, Shipping cost in USD, Discounted product price in USD, Including shipping in USD, Discounted product price in USD, Including shipping in USD, One item costs on average in USD, You&#039;re saving in USD, Total saving percentage in percent, Discounted product price in USD, Including shipping in USD, One item costs on average in USD, You&#039;re saving in USD, Total saving percentage in percent, You&#039;re saving in USD, Discounted product price in USD, Including shipping in USD, One item costs on average in USD, You&#039;re saving in USD, Total saving percentage in percent, Discounted product price in USD, Including shipping in USD, One item costs on average in USD, You&#039;re saving in USD, Total saving percentage in percent, Discounted product price in USD, Including shipping in USD, One item costs on average in USD, You&#039;re saving in USD, Total saving percentage in percent, Discounted product price in USD, Including shipping in USD, You&#039;re saving in USD, Discounted product price in USD, Including shipping in USD, You&#039;re saving in USD, Discounted product price in USD, Including shipping in USD, You&#039;re saving in USD, Total saving percentage in percent, A, Deal1 total in USD, Deal2 total in USD, Deal3 total in USD, Deal4 total in USD, Deal5 total in USD, Deal6 total in USD, Deal7 total in USD, Deal8 total in USD, Savings6 p, Savings7 p, Tax included, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Discount offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>A</strong> = <code>Sales tax × Tax included + 1</code></li><li><strong>Sales tax</strong> = <code>(A − 1) ÷ Tax included</code></li><li><strong>Tax included</strong> = <code>(A − 1) ÷ Sales tax</code></li><li><strong>You&#039;re saving</strong> = <code>A × Discount × Original price</code></li><li><strong>Original price</strong> = <code>You&#039;re saving ÷ (A × Discount)</code></li><li><strong>Discount</strong> = <code>You&#039;re saving ÷ (A × Original price)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>A</strong> = <code>Sales tax × Tax included + 1</code> — the form to use when Sales tax and Tax included are the values you have.</li><li><strong>Sales tax</strong> = <code>(A − 1) ÷ Tax included</code> — the form to use when A and Tax included are the values you have.</li><li><strong>Tax included</strong> = <code>(A − 1) ÷ Sales tax</code> — the form to use when A and Sales tax are the values you have.</li><li><strong>You&#039;re saving</strong> = <code>A × Discount × Original price</code> — the form to use when A, Discount and Original price are the values you have.</li><li><strong>A</strong> = <code>You&#039;re saving ÷ (Discount × Original price)</code> — the form to use when You&#039;re saving, Discount and Original price are the values you have.</li><li><strong>Original price</strong> = <code>You&#039;re saving ÷ (A × Discount)</code> — the form to use when You&#039;re saving, A and Discount are the values you have.</li><li><strong>Discount</strong> = <code>You&#039;re saving ÷ (A × Original price)</code> — the form to use when You&#039;re saving, A and Original price are the values you have.</li><li><strong>Discounted product price</strong> = <code>A × Original price × (1 − Discount)</code> — the form to use when A, Original price and Discount are the values you have.</li></ul><p>Any one of A, Sales tax and Tax included can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Sales tax is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with What type of deal?, Original price and Discount are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Sales tax left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Sales tax is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Sales tax to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cyber Monday form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Sales tax</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Tax included and A changes with it. Fill it from a measurement rather than a memory — Sales tax is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Sales tax ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Sales tax — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check What type of deal? against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> What type of deal? follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Sales tax is what you already know and What type of deal? and Original price is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/debt-to-asset">Debt to asset ratio Calculator</a>, <a href="/finance/debt-to-equity">Debt to equity Calculator</a> and <a href="/finance/dti">Debt to income ratio</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Cyber Monday is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cyber Monday calculator work out?', 'a' => 'What type of deal?, Original price, Discount and Discount, from Sales tax and Tax included. The relationship is A = Sales tax × Tax included + 1.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Sales tax (percent). Fill sales tax and leave What type of deal? empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of A, Sales tax, Tax included and You\'re saving blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            What type of deal? is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Sales tax blank and the page solves for it, reporting What type of deal? instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. What type of deal? keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/debt-to-asset', 'name' => 'Debt to asset ratio Calculator'],
            ['path' => '/finance/debt-to-equity', 'name' => 'Debt to equity Calculator'],
            ['path' => '/finance/dti', 'name' => 'Debt to income ratio'],
        ],
        'authors' => [],
    ],
];
