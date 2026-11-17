<?php

/**
 * Black Friday
 * /finance/black-friday
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Black Friday',
    'meta' => ['title' => 'Black Friday Calculator — Formula & Results', 'description' => 'Black Friday works out you pay and including shipping and reports both. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Black Friday Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Get yourself prepared for the incoming Black Friday discounts! Use this tool to check how much you actually save on the deals. '],
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
                            'dataset' => 'deal',
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
                                ['when' => '(deal > 0.5 and deal <= 3) or deal == 6', 'text' => 'If the products are not the same price, the cheapest item is free.'],
                                ['when' => 'deal > 3 and deal < 6', 'text' => 'If the products are not the same price, the cheapest item is discounted.'],
                                ['when' => 'deal == 2', 'text' => 'Remember that such deals make sense only if you really want to buy three products.'],
                                ['when' => 'deal == 3', 'text' => 'Remember that in this case the maximum saving is 25%. Only go for it if you really need those four products.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_old',
                            'label' => 'Original price',
                            'type' => 'number',
                            'help' => 'Make sure it\'s not unrealistically high - compare with other retailers!',
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
                            'name' => 'discount',
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
                            'name' => 'p_second',
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
                            'name' => 'p_third',
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
                            'label' => 'Product 1',
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
                            'label' => 'Product 2',
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
                            'label' => 'Product 3',
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
                            'label' => 'Product 4',
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
                            'rounding' => ['standard', '2'],
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
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_included',
                            'label' => 'Is tax included in price?',
                            'type' => 'select',
                            'options' => ['Yes' => '0', 'No' => '1'],
                            'dataset' => 'if_tax',
                            'help' => 'Tax will be calculated on the final price. Different tax rules may apply to different deals and they may vary across states.',
                            'default' => 'Yes',
                        ],
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
                            'label' => 'Shipping',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
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
                            'label' => 'You pay',
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
                            'name' => 'spent1',
                            'label' => 'You pay',
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
                            'label' => 'of standard price for 2',
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
                            'name' => 'spent2',
                            'label' => 'You pay',
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
                            'label' => 'of standard price for 3',
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
                            'name' => 'spent3',
                            'label' => 'You pay',
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
                            'label' => 'of standard price for 4',
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
                            'name' => 'spent4',
                            'label' => 'You pay',
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
                            'label' => 'of standard price for 2',
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
                            'name' => 'spent5',
                            'label' => 'You pay',
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
                            'label' => 'of standard price for 3',
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
                            'name' => 'spent6',
                            'label' => 'You pay',
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
                            'label' => 'You pay',
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
                            'label' => 'You pay',
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
                            'label' => 'of standard price',
                            'type' => 'number',
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
                                ['when' => 'discount >= 0 and discount <= 0.03', 'text' => 'Oh, really? This deal\'s not worth the time.'],
                                ['when' => 'discount > 0.03 and discount <= 0.10', 'text' => 'Savings will be insubstantial unless you\'re buying a car. Or a villa. Or even a yacht.'],
                                ['when' => 'discount > 0.10 and discount <= 0.20', 'text' => 'Meh. Does it make sense to leave your bed for such an offer?'],
                                ['when' => 'discount > 0.20 and discount <= 0.40', 'text' => 'That offer is worth considering!'],
                                ['when' => 'discount > 0.40 and discount <= 0.60', 'text' => 'It looks like you\'ve found quite a good bargain!'],
                                ['when' => 'discount > 0.60 and discount <= 0.80', 'text' => 'That sounds like a great deal!'],
                                ['when' => 'discount > 0.80', 'text' => 'Looks like it\'s a real bargain!!! '],
                                ['when' => 'deal == 6 and effective_discount_2 != discount12', 'text' => <<<'TXT'
                                The effective discount is {{effective_discount_2.formattedValue}}%, not {{discount12.formattedValue}}% ({{discount1.formattedValue}}% + {{discount2.formattedValue}}%).
                                TXT],
                                ['when' => 'deal == 7 and effective_discount_3 != discount123', 'text' => <<<'TXT'
                                The effective discount is {{effective_discount_3.formattedValue}}%, not {{discount123.formattedValue}}% ({{discount1.formattedValue}}% + {{discount2.formattedValue}}% + {{discount3.formattedValue}}%).
                                TXT],
                                ['when' => 'deal == 6', 'text' => 'Instead of paying {{total_old_6.monetaryValue}}, you\'d pay {{spent6_ship.monetaryValue}}, and {{savings6.monetaryValue}} would stay in your pocket.'],
                                ['when' => 'deal == 7', 'text' => 'Instead of paying {{total_old_7.monetaryValue}}, you\'d pay {{spent7_ship.monetaryValue}}, and {{savings7.monetaryValue}} would stay in your pocket.'],
                                ['when' => 'deal == 8', 'text' => 'Instead of paying {{total_old_8.monetaryValue}}, you\'d pay {{spent8_ship.monetaryValue}}, and {{savings8.monetaryValue}} would stay in your pocket.'],
                                ['when' => 'deal == 8 and savings8_p < 0', 'text' => <<<'TXT'
                                Instead of paying {{total_old_8.monetaryValue}}, you'd pay {{spent8_ship.monetaryValue}}, and {{savings8.monetaryValue}} would stay in your pocket. That's not a deal! You're paying {{neg_savings_8.monetaryValue}} more than buying those products separately!
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'black-friday/really-min.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => <<<'TXT'
                                (deal == 1 and savings1_p == 0.5) or (deal == 2 and savings2_p == 1/3) or (deal == 3 and savings3_p == 0.25) or (deal == 4 and savings4_p == 0.5) or (deal == 5 and savings5_p == 1/3)
                                TXT, 'text' => '**That\'s the greatest savings you can get for this kind of the deal. **&nbsp;'],
                                ['when' => <<<'TXT'
                                (deal == 1 and savings1_p != 0.5 and savings1_p > 0.4) or (deal == 2 and savings2_p != 1/3 and savings2_p > 0.3) or (deal == 3 and savings3_p != 0.25 and savings3_p > 0.23) or (deal == 4 and savings4_p != 0.5 and savings4_p > 0.23) or (deal == 5 and savings5_p != 1/3 and savings5_p > 0.23)
                                TXT, 'text' => '**That sounds like a great deal! **&nbsp;'],
                                ['when' => <<<'TXT'
                                (deal == 1 and savings1_p > 0.2 and savings1_p <= 0.4) or (deal == 2 and savings2_p > 0.2 and savings2_p <= 0.3) or (deal == 3 and savings3_p > 0.16 and savings3_p <= 0.23) or (deal == 4 and savings4_p > 0.16 and savings4_p <= 0.23) or (deal == 5 and savings5_p > 0.16 and savings5_p <= 0.23)
                                TXT, 'text' => 'Not bad! Consider buying items with similar prices to save even more.&nbsp;'],
                                ['when' => <<<'TXT'
                                (deal == 1 and savings1_p > 0.1 and savings1_p <= 0.2) or (deal == 2 and savings2_p > 0.1 and savings2_p <= 0.2) or (deal == 3 and savings3_p > 0.1 and savings3_p <= 0.16) or (deal == 4 and savings4_p > 0.1 and savings4_p <= 0.16) or (deal == 5 and savings5_p > 0.1 and savings5_p <= 0.16)
                                TXT, 'text' => 'In terms of percentages, your savings look insubstantial. These kind of deals exist out of Black Friday — do you even need it?&nbsp;'],
                                ['when' => <<<'TXT'
                                (deal == 1 and savings1_p > 0 and savings1_p <= 0.1) or (deal == 2 and savings2_p > 0 and savings2_p <= 0.1) or (deal == 3 and savings3_p > 0 and savings3_p <= 0.1) or (deal == 4 and savings4_p > 0 and savings4_p <= 0.1) or (deal == 5 and savings5_p > 0 and savings5_p <= 0.1)
                                TXT, 'text' => 'Well, that doesn\'t look like a great deal at all.&nbsp;'],
                                ['when' => 'deal == 1', 'text' => 'Instead of paying {{total_old_1.monetaryValue}}, you\'d pay {{spent1_ship.monetaryValue}}, and {{savings1.monetaryValue}} would stay in your pocket.&nbsp;'],
                                ['when' => 'deal == 2', 'text' => 'Instead of paying {{total_old_2.monetaryValue}}, you\'d pay {{spent2_ship.monetaryValue}}, and {{savings2.monetaryValue}} would stay in your pocket.&nbsp;'],
                                ['when' => 'deal == 3', 'text' => 'Instead of paying {{total_old_3.monetaryValue}}, you\'d pay {{spent3_ship.monetaryValue}}, and {{savings3.monetaryValue}} would stay in your pocket.&nbsp;'],
                                ['when' => 'deal == 4', 'text' => 'Instead of paying {{total_old_4.monetaryValue}}, you\'d pay {{spent4_ship.monetaryValue}}, and {{savings4.monetaryValue}} would stay in your pocket.&nbsp;'],
                                ['when' => 'deal == 5', 'text' => 'Instead of paying {{total_old_5.monetaryValue}}, you\'d pay {{spent5_ship.monetaryValue}}, and {{savings5.monetaryValue}} would stay in your pocket.&nbsp;'],
                                ['when' => 'deal == 1 and savings1 >= 20 and savings1_p <= 0.20', 'text' => 'But on the other hand, {{savings1.monetaryValue}} isn\'t nothing!'],
                                ['when' => 'deal == 2 and savings2 >= 20 and savings2_p <= 0.20', 'text' => 'But on the other hand, {{savings2.monetaryValue}} isn\'t nothing!'],
                                ['when' => 'deal == 3 and savings3 >= 20 and savings3_p <= 0.20', 'text' => 'But on the other hand, {{savings3.monetaryValue}} isn\'t nothing!'],
                                ['when' => 'deal == 4 and savings4 >= 20 and savings4_p <= 0.20', 'text' => 'But on the other hand, {{savings4.monetaryValue}} isn\'t nothing!'],
                                ['when' => 'deal == 5 and savings5 >= 20 and savings5_p <= 0.20', 'text' => 'But on the other hand, {{savings5.monetaryValue}} isn\'t nothing!'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'black-friday/bestie-min.gif'],
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
                            'name' => 'a_var',
                            'label' => 'A',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discount12',
                            'label' => 'Discount12',
                            'type' => 'presentation',
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
                            'name' => 'effective_discount_2',
                            'label' => 'Effective discount 2',
                            'type' => 'presentation',
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
                            'name' => 'discount123',
                            'label' => 'Discount123',
                            'type' => 'presentation',
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
                            'name' => 'effective_discount_3',
                            'label' => 'Effective discount 3',
                            'type' => 'presentation',
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
                            'name' => 'total_old_6',
                            'label' => 'Total old 6',
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
                            'name' => 'total_old_7',
                            'label' => 'Total old 7',
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
                            'name' => 'total_old_8',
                            'label' => 'Total old 8',
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
                            'name' => 'neg_savings_8',
                            'label' => 'Neg savings 8',
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
                            'name' => 'total_old_1',
                            'label' => 'Total old 1',
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
                            'name' => 'total_old_2',
                            'label' => 'Total old 2',
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
                            'name' => 'total_old_3',
                            'label' => 'Total old 3',
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
                            'name' => 'total_old_4',
                            'label' => 'Total old 4',
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
                            'name' => 'total_old_5',
                            'label' => 'Total old 5',
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
            'title' => 'a_var = sales_tax * tax_included + 1',
            'results' => ['sales_tax' => '(a_var - 1)/tax_included', 'a_var' => 'sales_tax*tax_included + 1', 'tax_included' => '(a_var - 1)/sales_tax'],
        ],
        [
            'title' => 'savings0 = a_var * (price_old * discount)',
            'results' => ['discount' => 'savings0/(a_var*price_old)', 'savings0' => 'a_var*discount*price_old', 'a_var' => 'savings0/(discount*price_old)', 'price_old' => 'savings0/(a_var*discount)'],
        ],
        [
            'title' => 'price_new = a_var * (price_old - price_old * discount)',
            'results' => ['discount' => '1 - price_new/(a_var*price_old)', 'price_new' => 'a_var*price_old*(1 - discount)', 'a_var' => '-price_new/(price_old*(discount - 1))', 'price_old' => '-price_new/(a_var*(discount - 1))'],
        ],
        [
            'title' => 'savings3 = a_var * min(product1,product2,product3,product4)',
            'results' => ['savings3' => 'a_var*min(product1, product2, product3, product4)', 'a_var' => 'savings3/min(product1, product2, product3, product4)'],
        ],
        [
            'title' => 'spent3 = a_var * ((product1 + product2 + product3 + product4) -  min(product1,product2,product3,product4))',
            'results' => ['spent3' => 'a_var*(product1 + product2 + product3 + product4 - min(product1, product2, product3, product4))', 'a_var' => 'spent3/(product1 + product2 + product3 + product4 - min(product1, product2, product3, product4))'],
        ],
        [
            'title' => 'savings3_av =  spent3 / 4',
            'results' => ['spent3' => '4*savings3_av', 'savings3_av' => '(1/4)*spent3'],
        ],
        [
            'title' => 'savings3_p = savings3 / (a_var * (product1 + product2 + product3 + product4) + shipping)',
            'results' => [
                'product1' => '-product2 - product3 - product4 + savings3/(a_var*savings3_p) - shipping/a_var',
                'product4' => '-product1 - product2 - product3 + savings3/(a_var*savings3_p) - shipping/a_var',
                'savings3' => 'savings3_p*(a_var*product1 + a_var*product2 + a_var*product3 + a_var*product4 + shipping)',
                'product2' => '-product1 - product3 - product4 + savings3/(a_var*savings3_p) - shipping/a_var',
                'product3' => '-product1 - product2 - product4 + savings3/(a_var*savings3_p) - shipping/a_var',
                'a_var' => '(savings3 - savings3_p*shipping)/(savings3_p*(product1 + product2 + product3 + product4))',
                'shipping' => '(-a_var*savings3_p*(product1 + product2 + product3 + product4) + savings3)/savings3_p',
                'savings3_p' => 'savings3/(a_var*product1 + a_var*product2 + a_var*product3 + a_var*product4 + shipping)',
            ],
        ],
        [
            'title' => 'spent4 = a_var * (product1 + product2 - p_second * min(product1,product2) )',
            'results' => ['p_second' => '(a_var*(product1 + product2) - spent4)/(a_var*min(product1, product2))', 'spent4' => 'a_var*(-p_second*min(product1, product2) + product1 + product2)', 'a_var' => 'spent4/(-p_second*min(product1, product2) + product1 + product2)'],
        ],
        [
            'title' => 'savings4_av =  spent4 / 2',
            'results' => ['spent4' => '2*savings4_av', 'savings4_av' => '(1/2)*spent4'],
        ],
        [
            'title' => 'savings4 = a_var * p_second * min(product1,product2)',
            'results' => ['p_second' => 'savings4/(a_var*min(product1, product2))', 'savings4' => 'a_var*p_second*min(product1, product2)', 'a_var' => 'savings4/(p_second*min(product1, product2))'],
        ],
        [
            'title' => 'savings4_p = savings4 / (a_var * (product1 + product2) + shipping)',
            'results' => [
                'product1' => '-product2 + savings4/(a_var*savings4_p) - shipping/a_var',
                'savings4_p' => 'savings4/(a_var*product1 + a_var*product2 + shipping)',
                'product2' => '-product1 + savings4/(a_var*savings4_p) - shipping/a_var',
                'savings4' => 'savings4_p*(a_var*product1 + a_var*product2 + shipping)',
                'a_var' => '(savings4 - savings4_p*shipping)/(savings4_p*(product1 + product2))',
                'shipping' => '(-a_var*savings4_p*(product1 + product2) + savings4)/savings4_p',
            ],
        ],
        [
            'title' => 'spent5 = a_var * (product1 + product2 + product3 - p_third * min(product1,product2,product3) )',
            'results' => ['p_third' => '(a_var*(product1 + product2 + product3) - spent5)/(a_var*min(product1, product2, product3))', 'a_var' => 'spent5/(-p_third*min(product1, product2, product3) + product1 + product2 + product3)', 'spent5' => 'a_var*(-p_third*min(product1, product2, product3) + product1 + product2 + product3)'],
        ],
        [
            'title' => 'savings5_av =  spent5 / 3',
            'results' => ['savings5_av' => '(1/3)*spent5', 'spent5' => '3*savings5_av'],
        ],
        [
            'title' => 'savings5 = a_var * p_third * min(product1,product2,product3)',
            'results' => ['savings5' => 'a_var*p_third*min(product1, product2, product3)', 'p_third' => 'savings5/(a_var*min(product1, product2, product3))', 'a_var' => 'savings5/(p_third*min(product1, product2, product3))'],
        ],
        [
            'title' => 'savings5_p = savings5 / (a_var * (product1 + product2  + product3) + shipping)',
            'results' => [
                'product1' => '-product2 - product3 + savings5/(a_var*savings5_p) - shipping/a_var',
                'product2' => '-product1 - product3 + savings5/(a_var*savings5_p) - shipping/a_var',
                'savings5_p' => 'savings5/(a_var*product1 + a_var*product2 + a_var*product3 + shipping)',
                'product3' => '-product1 - product2 + savings5/(a_var*savings5_p) - shipping/a_var',
                'savings5' => 'savings5_p*(a_var*product1 + a_var*product2 + a_var*product3 + shipping)',
                'a_var' => '(savings5 - savings5_p*shipping)/(savings5_p*(product1 + product2 + product3))',
                'shipping' => '(-a_var*savings5_p*(product1 + product2 + product3) + savings5)/savings5_p',
            ],
        ],
        [
            'title' => 'spent6 = a_var * (price_old - price_old * discount1 - (price_old - price_old * discount1)* discount2)',
            'results' => [
                'discount1' => '(a_var*discount2*price_old - a_var*price_old + spent6)/(a_var*price_old*(discount2 - 1))',
                'spent6' => 'a_var*price_old*(discount1*discount2 - discount1 - discount2 + 1)',
                'discount2' => '(a_var*discount1*price_old - a_var*price_old + spent6)/(a_var*price_old*(discount1 - 1))',
                'a_var' => 'spent6/(price_old*(discount1*discount2 - discount1 - discount2 + 1))',
                'price_old' => 'spent6/(a_var*(discount1*discount2 - discount1 - discount2 + 1))',
            ],
        ],
        [
            'title' => 'savings6 = a_var * (price_old - spent6)',
            'results' => ['spent6' => 'price_old - savings6/a_var', 'savings6' => 'a_var*(price_old - spent6)', 'a_var' => 'savings6/(price_old - spent6)', 'price_old' => 'spent6 + savings6/a_var'],
        ],
        [
            'title' => 'spent7 = a_var * (price_old - price_old * discount1) * (1 - discount2) * (1 - discount3)',
            'results' => [
                'discount1' => <<<'TXT'
                (a_var*discount2*discount3*price_old - a_var*discount2*price_old - a_var*discount3*price_old + a_var*price_old - spent7)/(a_var*price_old*(discount2*discount3 - discount2 - discount3 + 1))
                TXT,
                'spent7' => 'a_var*price_old*(-discount1*discount2*discount3 + discount1*discount2 + discount1*discount3 - discount1 + discount2*discount3 - discount2 - discount3 + 1)',
                'discount2' => <<<'TXT'
                (a_var*discount1*discount3*price_old - a_var*discount1*price_old - a_var*discount3*price_old + a_var*price_old - spent7)/(a_var*price_old*(discount1*discount3 - discount1 - discount3 + 1))
                TXT,
                'discount3' => <<<'TXT'
                (a_var*discount1*discount2*price_old - a_var*discount1*price_old - a_var*discount2*price_old + a_var*price_old - spent7)/(a_var*price_old*(discount1*discount2 - discount1 - discount2 + 1))
                TXT,
                'a_var' => '-spent7/(price_old*(discount1*discount2*discount3 - discount1*discount2 - discount1*discount3 + discount1 - discount2*discount3 + discount2 + discount3 - 1))',
                'price_old' => '-spent7/(a_var*(discount1*discount2*discount3 - discount1*discount2 - discount1*discount3 + discount1 - discount2*discount3 + discount2 + discount3 - 1))',
            ],
        ],
        [
            'title' => 'savings7 = a_var * (price_old - spent7)',
            'results' => ['savings7' => 'a_var*(price_old - spent7)', 'a_var' => 'savings7/(price_old - spent7)', 'price_old' => 'spent7 + savings7/a_var', 'spent7' => 'price_old - savings7/a_var'],
        ],
        [
            'title' => 'spent8 = a_var * (fixed_price)',
            'results' => ['spent8' => 'a_var*fixed_price', 'fixed_price' => 'spent8/a_var', 'a_var' => 'spent8/fixed_price'],
        ],
        [
            'title' => 'savings8 = a_var * (unit_price* n_units - fixed_price)',
            'results' => [
                'n_units' => '(a_var*fixed_price + savings8)/(a_var*unit_price)',
                'savings8' => 'a_var*(-fixed_price + n_units*unit_price)',
                'fixed_price' => 'n_units*unit_price - savings8/a_var',
                'a_var' => '-savings8/(fixed_price - n_units*unit_price)',
                'unit_price' => '(a_var*fixed_price + savings8)/(a_var*n_units)',
            ],
        ],
        [
            'title' => 'savings8_p = savings8 / (a_var * unit_price*  n_units + shipping)',
            'results' => [
                'n_units' => '(savings8 - savings8_p*shipping)/(a_var*savings8_p*unit_price)',
                'savings8' => 'savings8_p*(a_var*n_units*unit_price + shipping)',
                'shipping' => '-a_var*n_units*unit_price + savings8/savings8_p',
                'a_var' => '(savings8 - savings8_p*shipping)/(n_units*savings8_p*unit_price)',
                'unit_price' => '(savings8 - savings8_p*shipping)/(a_var*n_units*savings8_p)',
                'savings8_p' => 'savings8/(a_var*n_units*unit_price + shipping)',
            ],
        ],
        [
            'title' => 'savings1 = a_var * (product1+ product2) - spent1',
            'results' => [
                'product1' => '(-a_var*product2 + savings1 + spent1)/a_var',
                'savings1' => 'a_var*product1 + a_var*product2 - spent1',
                'product2' => '(-a_var*product1 + savings1 + spent1)/a_var',
                'spent1' => 'a_var*product1 + a_var*product2 - savings1',
                'a_var' => '(savings1 + spent1)/(product1 + product2)',
            ],
        ],
        [
            'title' => 'spent1 = a_var * (max(product1,product2) )',
            'results' => ['a_var' => 'spent1/max(product1, product2)', 'spent1' => 'a_var*max(product1, product2)'],
        ],
        [
            'title' => 'savings1_av = spent1 / 2',
            'results' => ['savings1_av' => '(1/2)*spent1', 'spent1' => '2*savings1_av'],
        ],
        [
            'title' => 'savings1_p = savings1 / (a_var * (product1 + product2) + shipping)',
            'results' => [
                'product1' => '-product2 + savings1/(a_var*savings1_p) - shipping/a_var',
                'savings1_p' => 'savings1/(a_var*product1 + a_var*product2 + shipping)',
                'savings1' => 'savings1_p*(a_var*product1 + a_var*product2 + shipping)',
                'product2' => '-product1 + savings1/(a_var*savings1_p) - shipping/a_var',
                'a_var' => '(savings1 - savings1_p*shipping)/(savings1_p*(product1 + product2))',
                'shipping' => '(-a_var*savings1_p*(product1 + product2) + savings1)/savings1_p',
            ],
        ],
        [
            'title' => 'savings2 = a_var * min(product1,product2,product3)',
            'results' => ['savings2' => 'a_var*min(product1, product2, product3)', 'a_var' => 'savings2/min(product1, product2, product3)'],
        ],
        [
            'title' => 'spent2 = a_var * ((product1 + product2 + product3) -  min(product1,product2,product3))',
            'results' => ['spent2' => 'a_var*(product1 + product2 + product3 - min(product1, product2, product3))', 'a_var' => 'spent2/(product1 + product2 + product3 - min(product1, product2, product3))'],
        ],
        [
            'title' => 'savings2_av =  spent2 / (deal+1)',
            'results' => ['deal' => '(-savings2_av + spent2)/savings2_av', 'savings2_av' => 'spent2/(deal + 1)', 'spent2' => 'savings2_av*(deal + 1)'],
        ],
        [
            'title' => 'savings2_p = savings2 / (a_var * (product1 + product2 + product3) + shipping)',
            'results' => [
                'product1' => '-product2 - product3 + savings2/(a_var*savings2_p) - shipping/a_var',
                'product2' => '-product1 - product3 + savings2/(a_var*savings2_p) - shipping/a_var',
                'product3' => '-product1 - product2 + savings2/(a_var*savings2_p) - shipping/a_var',
                'savings2' => 'savings2_p*(a_var*product1 + a_var*product2 + a_var*product3 + shipping)',
                'a_var' => '(savings2 - savings2_p*shipping)/(savings2_p*(product1 + product2 + product3))',
                'shipping' => '(-a_var*savings2_p*(product1 + product2 + product3) + savings2)/savings2_p',
                'savings2_p' => 'savings2/(a_var*product1 + a_var*product2 + a_var*product3 + shipping)',
            ],
        ],
        [
            'title' => 'price_new_ship = price_new + shipping',
            'results' => ['shipping' => '-price_new + price_new_ship', 'price_new_ship' => 'price_new + shipping', 'price_new' => 'price_new_ship - shipping'],
        ],
        [
            'title' => 'spent1_ship = spent1 + shipping',
            'results' => ['spent1_ship' => 'shipping + spent1', 'shipping' => '-spent1 + spent1_ship', 'spent1' => '-shipping + spent1_ship'],
        ],
        [
            'title' => 'spent2_ship = spent2 + shipping',
            'results' => ['spent2_ship' => 'shipping + spent2', 'shipping' => '-spent2 + spent2_ship', 'spent2' => '-shipping + spent2_ship'],
        ],
        [
            'title' => 'spent3_ship = spent3 + shipping',
            'results' => ['spent3' => '-shipping + spent3_ship', 'spent3_ship' => 'shipping + spent3', 'shipping' => '-spent3 + spent3_ship'],
        ],
        [
            'title' => 'spent4_ship = spent4 + shipping',
            'results' => ['spent4' => '-shipping + spent4_ship', 'shipping' => '-spent4 + spent4_ship', 'spent4_ship' => 'shipping + spent4'],
        ],
        [
            'title' => 'spent5_ship = spent5 + shipping',
            'results' => ['spent5_ship' => 'shipping + spent5', 'shipping' => '-spent5 + spent5_ship', 'spent5' => '-shipping + spent5_ship'],
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
            'results' => ['spent8_ship' => 'shipping + spent8', 'spent8' => '-shipping + spent8_ship', 'shipping' => '-spent8 + spent8_ship'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Black Friday works out What type of deal? and Original price from Is tax included in price? and Sales tax. There is no hidden constant here: change what type of deal? and is tax included in price? moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Black Friday calculator works', 'html' => <<<'TXT'
            <p>Black Friday answers one question from 2 numbers, and the answer is What type of deal?, Original price and Discount.</p><p>Written with the labels from the form, A = Sales tax × Is tax included in price? + 1.</p><p>The result panel carries What type of deal?, Original price, Discount and Discount, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Is tax included in price?</strong> — a plain number, no unit. Tax will be calculated on the final price. Different tax rules may apply to different deals and they may vary across states.</li><li><strong>Sales tax</strong> — in percent</li></ul><p>The result boxes are What type of deal?, Original price in USD, Discount in percent, Discount in percent, Discount in percent, 1st discount in percent, 2nd discount in percent, 3rd discount in percent, Product 1 in USD, Product 2 in USD, Product 3 in USD, Product 4 in USD, Number of products, Standard unit price in USD, Offered fixed price for multiple units in USD, Shipping in USD, You pay in USD, Including shipping in USD, You&#039;re saving in USD, You pay in USD, Including shipping in USD, One item costs on average in USD, You&#039;re saving in USD, of standard price for 2 in percent, You pay in USD, Including shipping in USD, One item costs on average in USD, You&#039;re saving in USD, of standard price for 3 in percent, You pay in USD, Including shipping in USD, One item costs on average in USD, You&#039;re saving in USD, of standard price for 4 in percent, You pay in USD, Including shipping in USD, One item costs on average in USD, You&#039;re saving in USD, of standard price for 2 in percent, You pay in USD, Including shipping in USD, One item costs on average in USD, You&#039;re saving in USD, of standard price for 3 in percent, You pay in USD, Including shipping in USD, You&#039;re saving in USD, You pay in USD, Including shipping in USD, You&#039;re saving in USD, You pay in USD, Including shipping in USD, You&#039;re saving in USD, of standard price in percent, A; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Discount lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>A</strong> = <code>Sales tax × Is tax included in price? + 1</code></li><li><strong>Sales tax</strong> = <code>(A − 1) ÷ Is tax included in price?</code></li><li><strong>Is tax included in price?</strong> = <code>(A − 1) ÷ Sales tax</code></li><li><strong>You&#039;re saving</strong> = <code>A × Discount × Original price</code></li><li><strong>Discount</strong> = <code>You&#039;re saving ÷ (A × Original price)</code></li><li><strong>Original price</strong> = <code>You&#039;re saving ÷ (A × Discount)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>A</strong> = <code>Sales tax × Is tax included in price? + 1</code> — the form to use when Sales tax and Is tax included in price? are the values you have.</li><li><strong>Sales tax</strong> = <code>(A − 1) ÷ Is tax included in price?</code> — the form to use when A and Is tax included in price? are the values you have.</li><li><strong>Is tax included in price?</strong> = <code>(A − 1) ÷ Sales tax</code> — the form to use when A and Sales tax are the values you have.</li><li><strong>You&#039;re saving</strong> = <code>A × Discount × Original price</code> — the form to use when A, Discount and Original price are the values you have.</li><li><strong>Discount</strong> = <code>You&#039;re saving ÷ (A × Original price)</code> — the form to use when You&#039;re saving, A and Original price are the values you have.</li><li><strong>A</strong> = <code>You&#039;re saving ÷ (Discount × Original price)</code> — the form to use when You&#039;re saving, Discount and Original price are the values you have.</li><li><strong>Original price</strong> = <code>You&#039;re saving ÷ (A × Discount)</code> — the form to use when You&#039;re saving, A and Discount are the values you have.</li><li><strong>You pay</strong> = <code>A × Original price × (1 − Discount)</code> — the form to use when A, Original price and Discount are the values you have.</li></ul><p>Any one of A, Sales tax and Is tax included in price? can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Sales tax carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> What type of deal?, Original price and Discount are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Is tax included in price? left as a guess.</strong> Anything typed into Is tax included in price? is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Sales tax left as a guess.</strong> Anything typed into Sales tax is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Is tax included in price? to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Black Friday form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Is tax included in price?</strong> takes a plain number with no unit attached. Tax will be calculated on the final price. Different tax rules may apply to different deals and they may vary across states. It feeds Sales tax and A. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Is tax included in price? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Sales tax</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds A and Is tax included in price?. Fill it from a measurement rather than a memory — Sales tax is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Is tax included in price? and Sales tax ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Is tax included in price? — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check What type of deal? against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind What type of deal? is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Is tax included in price? and Sales tax are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Is tax included in price? and Sales tax and the number you are missing is What type of deal? and Original price.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/sales">Sales</a>, <a href="/finance/savings-goal">Savings goal Calculator</a> and <a href="/finance/savings-interest-rate">Savings interest rate Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Black Friday is a number to act on, so the useful question is what to do with What type of deal?, Original price (USD) and Discount (perc) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Is tax included in price? and Sales tax alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Black Friday calculator work out?', 'a' => <<<'TXT'
            What type of deal?, Original price, Discount and Discount, from Sales tax and Is tax included in price?. The relationship is A = Sales tax × Is tax included in price? + 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Is tax included in price?, Sales tax (percent). With is tax included in price? and sales tax in place, What type of deal? can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of A, Sales tax, Is tax included in price? and You're saving blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally What type of deal? is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Is tax included in price? blank and the page solves for it, reporting What type of deal? instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. What type of deal? keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/sales', 'name' => 'Sales'],
            ['path' => '/finance/savings-goal', 'name' => 'Savings goal Calculator'],
            ['path' => '/finance/savings-interest-rate', 'name' => 'Savings interest rate Calculator'],
        ],
        'authors' => [],
    ],
];
