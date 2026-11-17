<?php

/**
 * Discount
 * /finance/discount
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Discount',
    'meta' => ['title' => 'Discount Calculator: Formula, Steps & Examples', 'description' => 'Discount reports you pay..., you\'re saving..., one item costs on average and percentage savings. Results come back in USD, with any other unit a click away.', 'h1' => 'Discount Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'deal',
                            'label' => 'What type of discount?',
                            'type' => 'select',
                            'options' => [
                                '% off' => '0',
                                '% off on 2nd product' => '4',
                                '% off on 3rd product' => '5',
                                'Fixed amount off' => '9',
                                '2 for 1' => '1',
                                '3 for 2' => '2',
                                '4 for 3' => '3',
                                'Double discount' => '6',
                                'Triple discount' => '7',
                                'On multiple units' => '8',
                            ],
                            'dataset' => 'deal new',
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
                                ['when' => 'deal == 2', 'text' => 'Remember that such deals make sense only if you really want to buy three products.'],
                                ['when' => 'deal == 3', 'text' => 'Remember that in this case, the maximum saving is 25%. Only go for it if you really need those four products.'],
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
                            'name' => 'discount_dol',
                            'label' => 'Discount',
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
                            'name' => 'discount',
                            'label' => 'Discount',
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
                            'name' => 'discount1',
                            'label' => 'Discount',
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
                            'name' => 'discount2',
                            'label' => '2nd discount',
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
                            'name' => 'discount3',
                            'label' => '3rd discount',
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
                            'name' => 'product1',
                            'label' => 'Product 1',
                            'type' => 'result',
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
                            'type' => 'result',
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
                            'type' => 'result',
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
                            'type' => 'result',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'If the products are not the same price, the cheapest item&nbsp;'],
                                ['when' => 'deal == 1 or deal == 2 or deal == 3', 'text' => 'is discounted.'],
                                ['when' => 'deal == 4 or deal == 5', 'text' => 'is free.'],
                            ],
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
                    'columns' => 2,
                    'grid' => 'FR3_FR2',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'tax_included',
                            'label' => 'Tax included?',
                            'type' => 'select',
                            'options' => ['Yes' => '0', 'No' => '1'],
                            'dataset' => 'if_tax',
                            'help' => 'Tax will be calculated on the final price. Different tax rules may apply to different deals and they may vary across states.',
                            'default' => 'Yes',
                        ],
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
            ],
        ],
        [
            'title' => 'After discount',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_new',
                            'label' => 'You pay...',
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
                            'name' => 'savings_simple',
                            'label' => 'You\'re saving...',
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
                            'name' => 'spent_multiple_products',
                            'label' => 'You pay...',
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
                            'name' => 'average_multiple_products',
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
                            'name' => 'savings_multiple_products',
                            'label' => 'You\'re saving...',
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
                            'name' => 'percentage_multiple_products',
                            'label' => 'Percentage savings',
                            'type' => 'number',
                            'help' => 'Percentage of the total standard price for all products.',
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
                            'name' => 'spent_multiple_discounts',
                            'label' => 'You pay...',
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
                            'name' => 'savings_multiple_discounts',
                            'label' => 'You\'re saving...',
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
                            'name' => 'spent_multiple_units',
                            'label' => 'You pay...',
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
                            'name' => 'savings_multiple_units',
                            'label' => 'You\'re saving...',
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
                            'name' => 'percentage_multiple_units',
                            'label' => 'Percentage savings',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'deal == 6', 'text' => 'The effective discount is {{effective_discount.value}}%, not {{sum_discount.value}}% ({{discount1.value}}% + {{discount2.value}}%).'],
                                ['when' => 'deal == 7 and hasValue(discount3)', 'text' => <<<'TXT'
                                {{discount1.value}}% + {{discount2.value}}% + {{discount3.value}}% deal means that the effective discount is {{effective_discount.value}}%, not {{sum_discount.value}}%.
                                TXT],
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
                                ['when' => 'savings_multiple_units < 0', 'text' => 'Your "discount" is not a deal at all — you\'ll pay more than the standard price!'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The old version, the simple discount calculator , is also available.'],
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
                            'name' => 'effective_discount',
                            'label' => 'Effective discount',
                            'type' => 'presentation',
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
                            'name' => 'sum_discount',
                            'label' => 'Sum discount',
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
                            'name' => 'are_discounts_different',
                            'label' => 'Are discounts different',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_multiplier',
                            'label' => 'Tax multiplier',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'no_products',
                            'label' => 'No products',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'smallest_price',
                            'label' => 'Smallest price',
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
            'title' => 'tax_multiplier = sales_tax * tax_included+1',
            'results' => ['tax_included' => '(tax_multiplier - 1)/sales_tax', 'tax_multiplier' => 'sales_tax*tax_included + 1', 'sales_tax' => '(tax_multiplier - 1)/tax_included'],
        ],
        [
            'title' => 'savings_simple = tax_multiplier * price_old * discount',
            'results' => ['savings_simple' => 'discount*price_old*tax_multiplier', 'tax_multiplier' => 'savings_simple/(discount*price_old)', 'discount' => 'savings_simple/(price_old*tax_multiplier)', 'price_old' => 'savings_simple/(discount*tax_multiplier)'],
        ],
        [
            'title' => 'savings_simple = tax_multiplier * discount_dol',
            'results' => ['tax_multiplier' => 'savings_simple/discount_dol', 'discount_dol' => 'savings_simple/tax_multiplier', 'savings_simple' => 'discount_dol*tax_multiplier'],
        ],
        [
            'title' => 'savings_simple = price_old - price_new',
            'results' => ['price_new' => 'price_old - savings_simple', 'savings_simple' => '-price_new + price_old', 'price_old' => 'price_new + savings_simple'],
        ],
        [
            'title' => 'price_new = tax_multiplier * price_old * (1 - discount)',
            'results' => ['price_new' => 'price_old*tax_multiplier*(1 - discount)', 'tax_multiplier' => '-price_new/(price_old*(discount - 1))', 'discount' => '-price_new/(price_old*tax_multiplier) + 1', 'price_old' => '-price_new/(tax_multiplier*(discount - 1))'],
        ],
        [
            'title' => 'price_new = tax_multiplier * (price_old - discount_dol)',
            'results' => ['price_new' => 'tax_multiplier*(-discount_dol + price_old)', 'tax_multiplier' => '-price_new/(discount_dol - price_old)', 'discount_dol' => '-price_new/tax_multiplier + price_old', 'price_old' => 'discount_dol + price_new/tax_multiplier'],
        ],
        [
            'title' => 'discount_dol = price_old * discount',
            'results' => ['discount' => 'discount_dol/price_old', 'discount_dol' => 'discount*price_old', 'price_old' => 'discount_dol/discount'],
        ],
        [
            'title' => 'smallest_price = customMin(product1, product2, product3, product4, no_products)',
            'results' => ['smallest_price' => 'customMin(product1, product2, product3, product4, no_products)'],
        ],
        [
            'title' => 'spent_multiple_products = tax_multiplier * (product1 + product2 + product3 + product4 - discount1 * one_way(smallest_price))',
            'results' => [
                'discount1' => <<<'TXT'
                (-spent_multiple_products + tax_multiplier*(product1 + product2 + product3 + product4))/(tax_multiplier*(customMin(product1, product2, product3, product4, no_products)))
                TXT,
                'product4' => 'discount1*(customMin(product1, product2, product3, product4, no_products)) - product1 - product2 - product3 + spent_multiple_products/tax_multiplier',
                'product1' => 'discount1*(customMin(product1, product2, product3, product4, no_products)) - product2 - product3 - product4 + spent_multiple_products/tax_multiplier',
                'spent_multiple_products' => 'tax_multiplier*(-discount1*(customMin(product1, product2, product3, product4, no_products)) + product1 + product2 + product3 + product4)',
                'product2' => 'discount1*(customMin(product1, product2, product3, product4, no_products)) - product1 - product3 - product4 + spent_multiple_products/tax_multiplier',
                'tax_multiplier' => 'spent_multiple_products/(-discount1*(customMin(product1, product2, product3, product4, no_products)) + product1 + product2 + product3 + product4)',
                'product3' => 'discount1*(customMin(product1, product2, product3, product4, no_products)) - product1 - product2 - product4 + spent_multiple_products/tax_multiplier',
            ],
        ],
        [
            'title' => 'average_multiple_products =  spent_multiple_products / no_products',
            'results' => ['average_multiple_products' => 'spent_multiple_products/no_products', 'no_products' => 'spent_multiple_products/average_multiple_products', 'spent_multiple_products' => 'average_multiple_products*no_products'],
        ],
        [
            'title' => 'average_multiple_products =  tax_multiplier * (product1 + product2 + product3 + product4 - discount1 * one_way(smallest_price)) / no_products',
            'results' => [
                'discount1' => <<<'TXT'
                (-average_multiple_products*no_products + tax_multiplier*(product1 + product2 + product3 + product4))/(tax_multiplier*(customMin(product1, product2, product3, product4, no_products)))
                TXT,
                'no_products' => <<<'TXT'
                tax_multiplier*(-discount1*(customMin(product1, product2, product3, product4, no_products)) + product1 + product2 + product3 + product4)/average_multiple_products
                TXT,
                'product4' => <<<'TXT'
                average_multiple_products*no_products/tax_multiplier + discount1*(customMin(product1, product2, product3, product4, no_products)) - product1 - product2 - product3
                TXT,
                'product1' => <<<'TXT'
                average_multiple_products*no_products/tax_multiplier + discount1*(customMin(product1, product2, product3, product4, no_products)) - product2 - product3 - product4
                TXT,
                'product2' => <<<'TXT'
                average_multiple_products*no_products/tax_multiplier + discount1*(customMin(product1, product2, product3, product4, no_products)) - product1 - product3 - product4
                TXT,
                'average_multiple_products' => 'tax_multiplier*(-discount1*(customMin(product1, product2, product3, product4, no_products)) + product1 + product2 + product3 + product4)/no_products',
                'tax_multiplier' => 'average_multiple_products*no_products/(-discount1*(customMin(product1, product2, product3, product4, no_products)) + product1 + product2 + product3 + product4)',
                'product3' => <<<'TXT'
                average_multiple_products*no_products/tax_multiplier + discount1*(customMin(product1, product2, product3, product4, no_products)) - product1 - product2 - product4
                TXT,
            ],
        ],
        [
            'title' => 'savings_multiple_products = tax_multiplier * discount1 * one_way(smallest_price)',
            'results' => ['savings_multiple_products' => 'discount1*tax_multiplier*(customMin(product1, product2, product3, product4, no_products))', 'tax_multiplier' => 'savings_multiple_products/(discount1*(customMin(product1, product2, product3, product4, no_products)))', 'discount1' => 'savings_multiple_products/(tax_multiplier*(customMin(product1, product2, product3, product4, no_products)))'],
        ],
        [
            'title' => 'percentage_multiple_products = savings_multiple_products / (tax_multiplier * (product1 + product2 + product3 + product4))',
            'results' => [
                'product4' => '-product1 - product2 - product3 + savings_multiple_products/(percentage_multiple_products*tax_multiplier)',
                'product1' => '-product2 - product3 - product4 + savings_multiple_products/(percentage_multiple_products*tax_multiplier)',
                'percentage_multiple_products' => 'savings_multiple_products/(tax_multiplier*(product1 + product2 + product3 + product4))',
                'product2' => '-product1 - product3 - product4 + savings_multiple_products/(percentage_multiple_products*tax_multiplier)',
                'savings_multiple_products' => 'percentage_multiple_products*tax_multiplier*(product1 + product2 + product3 + product4)',
                'tax_multiplier' => 'savings_multiple_products/(percentage_multiple_products*(product1 + product2 + product3 + product4))',
                'product3' => '-product1 - product2 - product4 + savings_multiple_products/(percentage_multiple_products*tax_multiplier)',
            ],
        ],
        [
            'title' => 'percentage_multiple_products = discount1 * one_way(smallest_price) / (product1 + product2 + product3 + product4)',
            'results' => [
                'discount1' => 'percentage_multiple_products*(product1 + product2 + product3 + product4)/(customMin(product1, product2, product3, product4, no_products))',
                'product4' => 'discount1*(customMin(product1, product2, product3, product4, no_products))/percentage_multiple_products - product1 - product2 - product3',
                'product1' => 'discount1*(customMin(product1, product2, product3, product4, no_products))/percentage_multiple_products - product2 - product3 - product4',
                'percentage_multiple_products' => 'discount1*(customMin(product1, product2, product3, product4, no_products))/(product1 + product2 + product3 + product4)',
                'product2' => 'discount1*(customMin(product1, product2, product3, product4, no_products))/percentage_multiple_products - product1 - product3 - product4',
                'product3' => 'discount1*(customMin(product1, product2, product3, product4, no_products))/percentage_multiple_products - product1 - product2 - product4',
            ],
        ],
        [
            'title' => 'spent_multiple_discounts = tax_multiplier * (price_old - price_old * discount1) * (1 - discount2) * (1 - discount3)',
            'results' => [
                'discount2' => <<<'TXT'
                (discount1*discount3*price_old*tax_multiplier - discount1*price_old*tax_multiplier - discount3*price_old*tax_multiplier + price_old*tax_multiplier - spent_multiple_discounts)/(price_old*tax_multiplier*(discount1*discount3 - discount1 - discount3 + 1))
                TXT,
                'spent_multiple_discounts' => <<<'TXT'
                price_old*tax_multiplier*(-discount1*discount2*discount3 + discount1*discount2 + discount1*discount3 - discount1 + discount2*discount3 - discount2 - discount3 + 1)
                TXT,
                'discount3' => <<<'TXT'
                (discount1*discount2*price_old*tax_multiplier - discount1*price_old*tax_multiplier - discount2*price_old*tax_multiplier + price_old*tax_multiplier - spent_multiple_discounts)/(price_old*tax_multiplier*(discount1*discount2 - discount1 - discount2 + 1))
                TXT,
                'discount1' => <<<'TXT'
                (discount2*discount3*price_old*tax_multiplier - discount2*price_old*tax_multiplier - discount3*price_old*tax_multiplier + price_old*tax_multiplier - spent_multiple_discounts)/(price_old*tax_multiplier*(discount2*discount3 - discount2 - discount3 + 1))
                TXT,
                'price_old' => <<<'TXT'
                -spent_multiple_discounts/(tax_multiplier*(discount1*discount2*discount3 - discount1*discount2 - discount1*discount3 + discount1 - discount2*discount3 + discount2 + discount3 - 1))
                TXT,
                'tax_multiplier' => <<<'TXT'
                -spent_multiple_discounts/(price_old*(discount1*discount2*discount3 - discount1*discount2 - discount1*discount3 + discount1 - discount2*discount3 + discount2 + discount3 - 1))
                TXT,
            ],
        ],
        [
            'title' => 'savings_multiple_discounts = tax_multiplier * price_old - spent_multiple_discounts',
            'results' => ['savings_multiple_discounts' => 'price_old*tax_multiplier - spent_multiple_discounts', 'spent_multiple_discounts' => 'price_old*tax_multiplier - savings_multiple_discounts', 'tax_multiplier' => '(savings_multiple_discounts + spent_multiple_discounts)/price_old', 'price_old' => '(savings_multiple_discounts + spent_multiple_discounts)/tax_multiplier'],
        ],
        [
            'title' => 'spent_multiple_units = tax_multiplier * fixed_price',
            'results' => ['tax_multiplier' => 'spent_multiple_units/fixed_price', 'fixed_price' => 'spent_multiple_units/tax_multiplier', 'spent_multiple_units' => 'fixed_price*tax_multiplier'],
        ],
        [
            'title' => 'savings_multiple_units = tax_multiplier * (unit_price* n_units - fixed_price)',
            'results' => [
                'unit_price' => '(fixed_price*tax_multiplier + savings_multiple_units)/(n_units*tax_multiplier)',
                'fixed_price' => 'n_units*unit_price - savings_multiple_units/tax_multiplier',
                'n_units' => '(fixed_price*tax_multiplier + savings_multiple_units)/(tax_multiplier*unit_price)',
                'savings_multiple_units' => 'tax_multiplier*(-fixed_price + n_units*unit_price)',
                'tax_multiplier' => '-savings_multiple_units/(fixed_price - n_units*unit_price)',
            ],
        ],
        [
            'title' => 'percentage_multiple_units = savings_multiple_units / (tax_multiplier * unit_price* n_units)',
            'results' => [
                'unit_price' => 'savings_multiple_units/(n_units*percentage_multiple_units*tax_multiplier)',
                'percentage_multiple_units' => 'savings_multiple_units/(n_units*tax_multiplier*unit_price)',
                'n_units' => 'savings_multiple_units/(percentage_multiple_units*tax_multiplier*unit_price)',
                'savings_multiple_units' => 'n_units*percentage_multiple_units*tax_multiplier*unit_price',
                'tax_multiplier' => 'savings_multiple_units/(n_units*percentage_multiple_units*unit_price)',
            ],
        ],
        [
            'title' => 'percentage_multiple_units = (unit_price* n_units - fixed_price) / (unit_price* n_units)',
            'results' => ['unit_price' => '-fixed_price/(n_units*(percentage_multiple_units - 1))', 'fixed_price' => 'n_units*unit_price*(1 - percentage_multiple_units)', 'percentage_multiple_units' => '-fixed_price/(n_units*unit_price) + 1', 'n_units' => '-fixed_price/(unit_price*(percentage_multiple_units - 1))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("customMin",function(product1,product2,product3,product4,no_products){if(no_products==4){return Math.min(product1,product2,product3,product4)}else if(no_products==3){return Math.min(product1,product2,product3)}else if(no_products==2){return Math.min(product1,product2)}else{return product1}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Discount turns What type of discount?, Original price and 2nd discount into Discount and 3rd discount. Nothing is looked up on this page: discount is computed from what type of discount? and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Discount is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Discount calculator works', 'html' => <<<'TXT'
            <p>Discount answers one question from 26 numbers, and the answer is Discount, 3rd discount and Product 1.</p><p>The relationship it solves reads Tax multiplier = Sales tax × Tax included? + 1.</p><p>The answers are Discount, 3rd discount, Product 1 and Product 2; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 26 boxes, and nothing else.</p><ul><li><strong>What type of discount?</strong> — a plain number, no unit</li><li><strong>Original price</strong> — in USD</li><li><strong>Discount</strong> — in USD</li><li><strong>Discount</strong> — in percent</li><li><strong>2nd discount</strong> — in percent</li><li><strong>Number of products</strong> — a plain number, no unit</li><li><strong>Standard unit price</strong> — in USD</li><li><strong>Offered fixed price for multiple units</strong> — in USD</li><li><strong>Tax included?</strong> — a plain number, no unit. Tax will be calculated on the final price. Different tax rules may apply to different deals and they may vary across states.</li><li><strong>Sales tax</strong> — in percent</li><li><strong>You pay…</strong> — in USD</li><li><strong>You&#039;re saving…</strong> — in USD</li><li><strong>You pay…</strong> — in USD</li><li><strong>One item costs on average</strong> — in USD</li><li><strong>You&#039;re saving…</strong> — in USD</li><li><strong>Percentage savings</strong> — in percent. Percentage of the total standard price for all products.</li><li><strong>You pay…</strong> — in USD</li><li><strong>You&#039;re saving…</strong> — in USD</li><li><strong>You pay…</strong> — in USD</li><li><strong>You&#039;re saving…</strong> — in USD</li><li><strong>Percentage savings</strong> — in percent</li><li><strong>Effective discount</strong> — in percent</li><li><strong>Sum discount</strong> — in percent</li><li><strong>Are discounts different</strong> — a plain number, no unit</li><li><strong>Tax multiplier</strong> — a plain number, no unit</li><li><strong>Smallest price</strong> — a plain number, no unit</li></ul><p>The answers come back as Discount in percent, 3rd discount in percent, Product 1 in USD, Product 2 in USD, Product 3 in USD, Product 4 in USD, No products. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, What type of discount? = 0 gives <strong>Tax included?</strong> = 0 and <strong>Smallest price</strong> = 0.</p><ul><li><strong>Tax included?</strong> = 0</li><li><strong>Smallest price</strong> = 0</li></ul><p>The line behind those figures is <strong>Tax multiplier</strong> = <code>Sales tax × Tax included? + 1</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Tax included?</strong> = 0 and <strong>Smallest price</strong> = 0 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Discount offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Tax multiplier</strong> = <code>Sales tax × Tax included? + 1</code></li><li><strong>Tax included?</strong> = <code>(Tax multiplier − 1) ÷ Sales tax</code></li><li><strong>Sales tax</strong> = <code>(Tax multiplier − 1) ÷ Tax included?</code></li><li><strong>You&#039;re saving…</strong> = <code>Discount × Original price × Tax multiplier</code></li><li><strong>Discount</strong> = <code>You&#039;re saving... ÷ (Original price × Tax multiplier)</code></li><li><strong>Original price</strong> = <code>You&#039;re saving... ÷ (Discount × Tax multiplier)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Tax multiplier</strong> = <code>Sales tax × Tax included? + 1</code> — the form to use when Sales tax and Tax included? are the values you have.</li><li><strong>Tax included?</strong> = <code>(Tax multiplier − 1) ÷ Sales tax</code> — the form to use when Tax multiplier and Sales tax are the values you have.</li><li><strong>Sales tax</strong> = <code>(Tax multiplier − 1) ÷ Tax included?</code> — the form to use when Tax multiplier and Tax included? are the values you have.</li><li><strong>You&#039;re saving…</strong> = <code>Discount × Original price × Tax multiplier</code> — the form to use when Discount, Original price and Tax multiplier are the values you have.</li><li><strong>Tax multiplier</strong> = <code>You&#039;re saving... ÷ (Discount × Original price)</code> — the form to use when You&#039;re saving…, Discount and Original price are the values you have.</li><li><strong>Discount</strong> = <code>You&#039;re saving... ÷ (Original price × Tax multiplier)</code> — the form to use when You&#039;re saving…, Original price and Tax multiplier are the values you have.</li><li><strong>Original price</strong> = <code>You&#039;re saving... ÷ (Discount × Tax multiplier)</code> — the form to use when You&#039;re saving…, Discount and Tax multiplier are the values you have.</li><li><strong>You&#039;re saving…</strong> = <code>Discount × Tax multiplier</code> — the form to use when Discount and Tax multiplier are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Tax multiplier, Tax included? and Sales tax can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Discount, 2nd discount and Sales tax is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Discount, 3rd discount and Product 1 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>What type of discount? left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If What type of discount? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Original price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Original price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If What type of discount? is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need What type of discount?, Original price, Discount and Discount. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type What type of discount? into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Discount in perc with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Discount follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: What type of discount?, Original price and Discount measured, Discount and 3rd discount wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/dream-come-true">Dream come true Calculator</a>, <a href="/finance/dupont-analysis">DuPont analysis Calculator</a> and <a href="/finance/ear">EAR Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Discount is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put What type of discount?, Original price, Discount and Discount beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Discount calculator work out?', 'a' => 'Discount, 3rd discount, Product 1 and Product 2, from Sales tax and Tax included?. The relationship is Tax multiplier = Sales tax × Tax included? + 1.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            What type of discount?, Original price (USD), Discount (USD), Discount (percent), 2nd discount (percent). Fill what type of discount?, original price and discount and leave Discount empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Tax multiplier, Tax included?, Sales tax and You're saving… can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Tax included? = 0 and Smallest price = 0. The figures come from What type of discount? as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Discount is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With What type of discount? left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Discount keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/dream-come-true', 'name' => 'Dream come true Calculator'],
            ['path' => '/finance/dupont-analysis', 'name' => 'DuPont analysis Calculator'],
            ['path' => '/finance/ear', 'name' => 'EAR Calculator'],
        ],
        'authors' => [],
    ],
];
