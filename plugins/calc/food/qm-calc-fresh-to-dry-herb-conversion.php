<?php

/**
 * Fresh to dry herb conversion
 * /food/fresh-to-dry-herb-conversion
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fresh to dry herb conversion',
    'meta' => ['title' => 'Fresh to dry herb conversion — Free Online Calculator', 'description' => 'Convert fresh herb quantities to dried equivalents for a recipe. Choose the herb and amount, then adjust to taste because potency, freshness and cut size vary.', 'h1' => 'Fresh to dry herb conversion Calculator', 'updated' => '2026-08-04'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'conversion_value',
                            'label' => 'Choose your herb:',
                            'type' => 'select',
                            'options' => [
                                'Basil' => '2',
                                'Bay leaf' => '1',
                                'Chervil' => '3',
                                'Chili pepper' => '1',
                                'Chives' => '1',
                                'Cilantro' => '3',
                                'Cinnamon' => '1',
                                'Cumin' => '4.5',
                                'Dill' => '3',
                                'Fennel fronds' => '3',
                                'Garlic (large)' => '1',
                                'Garlic (small)' => '1',
                                'Ginger' => '1',
                                'Lemon grass' => '1',
                                'Lovage' => '1',
                                'Marjoram' => '3',
                                'Mint' => '3',
                                'Onion' => '1',
                                'Oregano' => '3',
                                'Parsley' => '2',
                                'Rosemary' => '3',
                                'Sage' => '2',
                                'Sorrel' => '2',
                                'Star anise' => '1',
                                'Tarragon' => '3',
                                'Thyme' => '3',
                                'Vanilla' => '1',
                            ],
                            'dataset' => 'Herbs_DS',
                            'control' => 'DROPDOWN',
                            'default' => 'Basil',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result_fresh_tsp',
                            'label' => 'Fresh basil (finely chopped)',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tsp',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result_dry_tsp',
                            'label' => 'Dried basil',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tsp',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result_ground_tsp',
                            'label' => 'Ground basil',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tsp',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result_fresh_bayleaf',
                            'label' => 'Fresh bay leaf',
                            'type' => 'number',
                            'suffix' => 'leaves',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result_dry_bayleaf',
                            'label' => 'Dried bay leaf',
                            'type' => 'number',
                            'suffix' => 'leaves',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result_fresh',
                            'label' => 'Fresh chili pepper (medium)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result_dry',
                            'label' => 'Ground chili pepper (flakes)',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tsp',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result_ground',
                            'label' => 'Dried chili pepper (powder)',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tsp',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result_fresh_tbsp',
                            'label' => 'Fresh chives',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tbsp',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result_dry_tbsp',
                            'label' => 'Dried chives',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tsp',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result_ground_tbsp',
                            'label' => 'Ground ginger',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tsp',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result_fresh_vanilla',
                            'label' => 'Fresh vanilla (bean)',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result_dry_vanilla',
                            'label' => 'Dried vanilla (extract)',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tsp',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result_ground_vanilla',
                            'label' => 'Ground vanilla',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tsp',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result_fresh_cumin',
                            'label' => 'Fresh cumin (whole seed)',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tbsp',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result_ground_cumin',
                            'label' => 'Ground cumin',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tbsp',
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
                                ['when' => 'conversion_value == 1', 'text' => 'Reference conversion Basil → 2 tsp fresh = 1 tsp dried = 1/3 tsp ground'],
                                ['when' => 'conversion_value == 2', 'text' => 'Reference conversion Bay leaf → 1 fresh leaf = 2 dried leaves'],
                                ['when' => 'conversion_value == 3', 'text' => 'Reference conversion Chervil → 3 tsp fresh = 1 tsp dried'],
                                ['when' => 'conversion_value == 4', 'text' => 'Reference conversion Chili pepper → 1 fresh (medium size) = 1/2 tsp flakes = 1/4&nbsp;tsp powder'],
                                ['when' => 'conversion_value == 5', 'text' => 'Reference conversion Chives → 1 tbsp fresh = 1 tsp dried'],
                                ['when' => 'conversion_value == 6', 'text' => 'Reference conversion Cilantro → 3 tsp fresh = 1 tsp dried'],
                                ['when' => 'conversion_value == 7', 'text' => 'Reference conversion Cinnamon → 1 stick = 1/2 tsp ground'],
                                ['when' => 'conversion_value == 8', 'text' => 'Reference conversion Cumin → 4.5 tbsp (whole seeds) = 3 tbsp ground'],
                                ['when' => 'conversion_value == 9', 'text' => 'Reference conversion Dill → 3 tsp fresh = 1 tsp dried'],
                                ['when' => 'conversion_value == 10', 'text' => 'Reference conversion Fennel fronds → 3 tsp fresh = 1 tsp dried'],
                                ['when' => 'conversion_value == 11', 'text' => 'Reference conversion Garlic (large) → 1 fresh clove = 1 1/2 tsp minced = 1/4&nbsp;tsp powder'],
                                ['when' => 'conversion_value == 12', 'text' => 'Reference conversion Garlic (small) → 1 fresh clove = 1/2 tsp minced = 1/8&nbsp;tsp powder'],
                                ['when' => 'conversion_value == 13', 'text' => 'Reference conversion Ginger → 1 tbsp fresh = 1/4 tsp ground'],
                                ['when' => 'conversion_value == 14', 'text' => 'Reference conversion Lemon grass → 1 tbsp fresh = 1 tsp dried = 1/4&nbsp;tsp powder'],
                                ['when' => 'conversion_value == 15', 'text' => 'Reference conversion Lovage → 1 tbsp fresh = 1 tsp dried'],
                                ['when' => 'conversion_value == 16', 'text' => 'Reference conversion Marjoram → 3 tsp fresh = 1 tsp dried'],
                                ['when' => 'conversion_value == 17', 'text' => 'Reference conversion Mint → 3 tsp fresh = 1 tsp dried'],
                                ['when' => 'conversion_value == 18', 'text' => 'Reference conversion Onion → 1 fresh (medium size) = 3 tsp powder'],
                                ['when' => 'conversion_value == 19', 'text' => 'Reference conversion Oregano → 3 tsp fresh = 1 tsp dried = 1/3&nbsp;tsp ground'],
                                ['when' => 'conversion_value == 20', 'text' => 'Reference conversion Parsley → 2 tsp fresh = 1 tsp dried'],
                                ['when' => 'conversion_value == 21', 'text' => 'Reference conversion Rosemary → 3 tsp fresh = 1 tsp dried = 1/2&nbsp;tsp ground'],
                                ['when' => 'conversion_value == 22', 'text' => 'Reference conversion Sage → 2 tsp fresh = 1 tsp dried = 1/3&nbsp;tsp ground'],
                                ['when' => 'conversion_value == 23', 'text' => 'Reference conversion Sorrel → 2 tsp fresh = 1 tsp dried'],
                                ['when' => 'conversion_value == 24', 'text' => 'Reference conversion Star anise → 1 star fresh = 1/2&nbsp;tsp anise seed = 3/4&nbsp;tsp ground'],
                                ['when' => 'conversion_value == 25', 'text' => 'Reference conversion Tarragon → 3 tsp fresh = 1 tsp dried'],
                                ['when' => 'conversion_value == 26', 'text' => 'Reference conversion Thyme → 3 tsp fresh = 1 tsp dried = 1/3&nbsp;tsp ground'],
                                ['when' => 'conversion_value == 27', 'text' => 'Reference conversion Vanilla → 1-inch bean = 1 tsp extract = 1/2&nbsp;tsp ground'],
                                ['when' => '(conversion_value == 1 or conversion_value == 19 or conversion_value == 21 or conversion_value == 22 or conversion_value == 26) and result_fresh_tsp > 0', 'text' => <<<'TXT'
                                Your conversion → {{result_fresh_tsp.formattedValue}} {{result_fresh_tsp.unit}} fresh = {{result_dry_tsp.formattedValue}} {{result_dry_tsp.unit}} dried = {{result_ground_tsp.formattedValue}}&nbsp;{{result_ground_tsp.unit}} ground
                                TXT],
                                ['when' => <<<'TXT'
                                (conversion_value == 3 or conversion_value == 6 or conversion_value == 9 or conversion_value == 10 or conversion_value == 16 or conversion_value == 17 or conversion_value == 20 or conversion_value == 23 or conversion_value == 25) and result_fresh_tsp > 0
                                TXT, 'text' => 'Your conversion → {{result_fresh_tsp.formattedValue}} {{result_fresh_tsp.unit}} fresh = {{result_dry_tsp.formattedValue}}&nbsp;{{result_dry_tsp.unit}} dried'],
                                ['when' => 'conversion_value == 2 and result_fresh_bayleaf > 0', 'text' => 'Your conversion → {{result_fresh_bayleaf.formattedValue}} fresh leaf(.ves) = {{result_dry_bayleaf.formattedValue}} dried leaf(.ves)'],
                                ['when' => 'conversion_value == 4 and result_fresh > 0', 'text' => <<<'TXT'
                                Your conversion → {{result_fresh.formattedValue}} fresh chilli pepper = {{result_dry.formattedValue}} {{result_dry.unit}} dried = {{result_ground.formattedValue}}&nbsp;{{result_ground.unit}} ground
                                TXT],
                                ['when' => 'conversion_value == 7 and result_fresh > 0', 'text' => 'Your conversion → {{result_fresh.formattedValue}} stick = {{result_ground.formattedValue}}&nbsp;{{result_ground.unit}} ground'],
                                ['when' => 'conversion_value == 18 and result_fresh > 0', 'text' => 'Your conversion → {{result_fresh.formattedValue}} fresh onion(s) = {{result_ground.formattedValue}}&nbsp;{{result_ground.unit}} ground'],
                                ['when' => 'conversion_value == 14 and result_fresh_tbsp > 0', 'text' => <<<'TXT'
                                Your conversion → {{result_fresh_tbsp.formattedValue}} {{result_fresh_tbsp.unit}} fresh = {{result_dry_tbsp.formattedValue}} {{result_dry_tbsp.unit}} dried = {{result_ground_tbsp.formattedValue}}&nbsp;{{result_ground_tbsp.unit}} ground
                                TXT],
                                ['when' => ' (conversion_value == 15 or conversion_value == 5) and result_fresh_tbsp > 0', 'text' => <<<'TXT'
                                Your conversion → {{result_fresh_tbsp.formattedValue}} {{result_fresh_tbsp.unit}} fresh = {{result_dry_tbsp.formattedValue}}&nbsp;{{result_dry_tbsp.unit}} dried
                                TXT],
                                ['when' => 'conversion_value == 13 and result_fresh_tbsp > 0', 'text' => <<<'TXT'
                                Your conversion → {{result_fresh_tbsp.formattedValue}} {{result_fresh_tbsp.unit}} fresh = {{result_ground_tbsp.formattedValue}}&nbsp;{{result_ground_tbsp.unit}} ground
                                TXT],
                                ['when' => 'conversion_value == 8 and result_fresh_cumin > 0', 'text' => <<<'TXT'
                                Your conversion → {{result_fresh_cumin.formattedValue}} {{result_fresh_cumin.unit}} fresh = {{result_ground_cumin.formattedValue}}&nbsp;{{result_ground_cumin.unit}} ground
                                TXT],
                                ['when' => 'conversion_value == 27 and result_fresh_vanilla > 0', 'text' => <<<'TXT'
                                Your conversion → {{result_fresh_vanilla.formattedValue}} {{result_fresh_vanilla.unit}} fresh = {{result_dry_vanilla.formattedValue}} {{result_dry_vanilla.unit}} dried = {{result_ground_vanilla.formattedValue}}&nbsp;{{result_ground_vanilla.unit}} ground
                                TXT],
                                ['when' => '(conversion_value == 11 or conversion_value == 12) and result_fresh  > 0', 'text' => <<<'TXT'
                                Your conversion → {{result_fresh.formattedValue}} fresh clove(s) = {{result_dry.formattedValue}} {{result_dry.unit}} dried = {{result_ground.formattedValue}}&nbsp;{{result_ground.unit}} ground
                                TXT],
                                ['when' => 'conversion_value == 24 and result_fresh > 0', 'text' => <<<'TXT'
                                Your conversion → {{result_fresh.formattedValue}} fresh star anise(s) = {{result_dry.formattedValue}} {{result_dry.unit}} dried (seeds) = {{result_ground.formattedValue}}&nbsp;{{result_ground.unit}} ground
                                TXT],
                            ],
                        ],
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
                            'name' => 'dry',
                            'label' => 'Dry',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fresh',
                            'label' => 'Fresh',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ground',
                            'label' => 'Ground',
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
            'title' => 'result_dry_tsp = result_fresh_tsp * (dry / fresh)',
            'results' => ['result_fresh_tsp' => 'fresh*result_dry_tsp/dry', 'dry' => 'fresh*result_dry_tsp/result_fresh_tsp', 'fresh' => 'dry*result_fresh_tsp/result_dry_tsp', 'result_dry_tsp' => 'dry*result_fresh_tsp/fresh'],
        ],
        [
            'title' => 'result_ground_tsp = result_fresh_tsp * (ground / fresh)',
            'results' => ['result_ground_tsp' => 'ground*result_fresh_tsp/fresh', 'result_fresh_tsp' => 'fresh*result_ground_tsp/ground', 'ground' => 'fresh*result_ground_tsp/result_fresh_tsp', 'fresh' => 'ground*result_fresh_tsp/result_ground_tsp'],
        ],
        [
            'title' => 'result_dry_tbsp = result_fresh_tbsp * (dry / fresh)',
            'results' => ['result_dry_tbsp' => 'dry*result_fresh_tbsp/fresh', 'result_fresh_tbsp' => 'fresh*result_dry_tbsp/dry', 'dry' => 'fresh*result_dry_tbsp/result_fresh_tbsp', 'fresh' => 'dry*result_fresh_tbsp/result_dry_tbsp'],
        ],
        [
            'title' => 'result_ground_tbsp = result_fresh_tbsp * (ground / fresh)',
            'results' => ['result_fresh_tbsp' => 'fresh*result_ground_tbsp/ground', 'ground' => 'fresh*result_ground_tbsp/result_fresh_tbsp', 'result_ground_tbsp' => 'ground*result_fresh_tbsp/fresh', 'fresh' => 'ground*result_fresh_tbsp/result_ground_tbsp'],
        ],
        [
            'title' => 'result_fresh_bayleaf = result_dry_bayleaf * (fresh / dry)',
            'results' => ['result_dry_bayleaf' => 'dry*result_fresh_bayleaf/fresh', 'result_fresh_bayleaf' => 'fresh*result_dry_bayleaf/dry', 'dry' => 'fresh*result_dry_bayleaf/result_fresh_bayleaf', 'fresh' => 'dry*result_fresh_bayleaf/result_dry_bayleaf'],
        ],
        [
            'title' => 'result_ground = result_fresh * (ground / fresh)',
            'results' => ['result_fresh' => 'fresh*result_ground/ground', 'ground' => 'fresh*result_ground/result_fresh', 'result_ground' => 'ground*result_fresh/fresh', 'fresh' => 'ground*result_fresh/result_ground'],
        ],
        [
            'title' => 'result_dry = result_fresh * (dry / fresh)',
            'results' => ['result_dry' => 'dry*result_fresh/fresh', 'dry' => 'fresh*result_dry/result_fresh', 'fresh' => 'dry*result_fresh/result_dry', 'result_fresh' => 'fresh*result_dry/dry'],
        ],
        [
            'title' => 'result_ground_vanilla = result_fresh_vanilla * (ground / fresh)',
            'results' => ['result_fresh_vanilla' => 'fresh*result_ground_vanilla/ground', 'result_ground_vanilla' => 'ground*result_fresh_vanilla/fresh', 'ground' => 'fresh*result_ground_vanilla/result_fresh_vanilla', 'fresh' => 'ground*result_fresh_vanilla/result_ground_vanilla'],
        ],
        [
            'title' => 'result_dry_vanilla = result_fresh_vanilla * (dry / fresh)',
            'results' => ['result_fresh_vanilla' => 'fresh*result_dry_vanilla/dry', 'result_dry_vanilla' => 'dry*result_fresh_vanilla/fresh', 'dry' => 'fresh*result_dry_vanilla/result_fresh_vanilla', 'fresh' => 'dry*result_fresh_vanilla/result_dry_vanilla'],
        ],
        [
            'title' => 'result_fresh_cumin = result_ground_cumin * (fresh / ground)',
            'results' => ['result_ground_cumin' => 'ground*result_fresh_cumin/fresh', 'ground' => 'fresh*result_ground_cumin/result_fresh_cumin', 'result_fresh_cumin' => 'fresh*result_ground_cumin/ground', 'fresh' => 'ground*result_fresh_cumin/result_ground_cumin'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Fresh to dry herb conversion works out Dried basil and Ground basil from Fresh basil (finely chopped). There is no hidden constant here: change dried basil and fresh basil (finely chopped) moves with it. The main result, Dried basil, is reported in teaspoons (5 ml).
        TXT,
        'sections' => [
            ['title' => 'How the Fresh to dry herb conversion calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Fresh to dry herb conversion: it takes 1 number and reports Dried basil, Ground basil and Fresh bay leaf.</p><p>In the form&#039;s own words, Dried basil = Dry × Fresh basil (finely chopped) ÷ Fresh.</p><p>The result panel carries Dried basil, Ground basil, Fresh bay leaf and Dried bay leaf, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Fresh basil (finely chopped)</strong> — in teaspoons (5 ml)</li></ul><p>The result boxes are Dried basil in teaspoons (5 ml), Ground basil in teaspoons (5 ml), Fresh bay leaf in leaves, Dried bay leaf in leaves, Fresh chili pepper (medium), Ground chili pepper (flakes) in teaspoons (5 ml), Dried chili pepper (powder) in teaspoons (5 ml), Fresh chives in tablespoons (15 ml), Dried chives in teaspoons (5 ml), Ground ginger in teaspoons (5 ml), Fresh vanilla (bean) in centimeters, Dried vanilla (extract) in teaspoons (5 ml), Ground vanilla in teaspoons (5 ml), Fresh cumin (whole seed) in tablespoons (15 ml), Ground cumin in tablespoons (15 ml), Dry, Fresh, Ground; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Dried basil</strong> = <code>Dry × Fresh basil (finely chopped) ÷ Fresh</code></li><li><strong>Fresh basil (finely chopped)</strong> = <code>Fresh × Dried basil ÷ Dry</code></li><li><strong>Dry</strong> = <code>Fresh × Dried basil ÷ Fresh basil (finely chopped)</code></li><li><strong>Fresh</strong> = <code>Dry × Fresh basil (finely chopped) ÷ Dried basil</code></li><li><strong>Ground basil</strong> = <code>Ground × Fresh basil (finely chopped) ÷ Fresh</code></li><li><strong>Ground</strong> = <code>Fresh × Ground basil ÷ Fresh basil (finely chopped)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Dried basil</strong> = <code>Dry × Fresh basil (finely chopped) ÷ Fresh</code> — the form to use when Dry, Fresh basil (finely chopped) and Fresh are the values you have.</li><li><strong>Fresh basil (finely chopped)</strong> = <code>Fresh × Dried basil ÷ Dry</code> — the form to use when Fresh, Dried basil and Dry are the values you have.</li><li><strong>Dry</strong> = <code>Fresh × Dried basil ÷ Fresh basil (finely chopped)</code> — the form to use when Fresh, Dried basil and Fresh basil (finely chopped) are the values you have.</li><li><strong>Fresh</strong> = <code>Dry × Fresh basil (finely chopped) ÷ Dried basil</code> — the form to use when Dry, Fresh basil (finely chopped) and Dried basil are the values you have.</li><li><strong>Ground basil</strong> = <code>Ground × Fresh basil (finely chopped) ÷ Fresh</code> — the form to use when Ground, Fresh basil (finely chopped) and Fresh are the values you have.</li><li><strong>Fresh basil (finely chopped)</strong> = <code>Fresh × Ground basil ÷ Ground</code> — the form to use when Fresh, Ground basil and Ground are the values you have.</li><li><strong>Ground</strong> = <code>Fresh × Ground basil ÷ Fresh basil (finely chopped)</code> — the form to use when Fresh, Ground basil and Fresh basil (finely chopped) are the values you have.</li><li><strong>Fresh</strong> = <code>Ground × Fresh basil (finely chopped) ÷ Ground basil</code> — the form to use when Ground, Fresh basil (finely chopped) and Ground basil are the values you have.</li></ul><p>Any one of Dried basil, Fresh basil (finely chopped) and Dry can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Fresh basil (finely chopped) carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Dried basil, Ground basil and Fresh bay leaf are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Fresh basil (finely chopped) left as a guess.</strong> Anything typed into Fresh basil (finely chopped) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Convert Fresh basil (finely chopped) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Fresh to dry herb conversion form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Fresh basil (finely chopped)</strong> is a teaspoons (5 ml) quantity: the page opens it in tsp and converts anything else you pick before the formula runs. It feeds Dry, Fresh and Dried basil. Fill it from a measurement rather than a memory — Fresh basil (finely chopped) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Fresh basil (finely chopped) ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Fresh basil (finely chopped) — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Dried basil in tsp against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Dried basil is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are teaspoons (5 ml) and centimeters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Fresh basil (finely chopped) are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Fresh basil (finely chopped) is what you already know and Dried basil and Ground basil is what you need — the reverse of that situation is what the rearranged form is for.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/garlic-converter">Garlic converter</a>, <a href="/food/grams-to-tsp">Grams to teaspoons</a> and <a href="/food/cooking-measurement">Cooking measurement</a>.</p>
            TXT],
            ['title' => 'Limits and data handling', 'html' => <<<'TXT'
            <p>This calculator applies the relationships and assumptions shown on the page to the values entered. It cannot verify ingredient labels, measurements, equipment or conditions that are not represented in the form. Check the selected units and consult recipe, product or safety instructions where they apply.</p>
            <p>The result is a calculation, not a measurement of the food or drink. Use a scale, thermometer or product label when the real-world quantity or safety status matters.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Fresh to dry herb conversion is a number to act on, so the useful question is what to do with Dried basil (tsp), Ground basil (tsp) and Fresh bay leaf (leaves) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> Write down Fresh basil (finely chopped) alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. </p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fresh to dry herb conversion calculator work out?', 'a' => <<<'TXT'
            Dried basil, Ground basil, Fresh bay leaf and Dried bay leaf, from Dry, Fresh basil (finely chopped) and Fresh. The relationship is Dried basil = Dry × Fresh basil (finely chopped) ÷ Fresh.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Fresh basil (finely chopped) (teaspoons (5 ml)). With fresh basil (finely chopped) in place, Dried basil can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Dried basil, Fresh basil (finely chopped), Dry and Fresh blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Dried basil is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Fresh basil (finely chopped) blank and the page solves for it, reporting Dried basil instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Dried basil at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/food/garlic-converter', 'name' => 'Garlic converter'],
            ['path' => '/food/grams-to-tsp', 'name' => 'Grams to teaspoons'],
            ['path' => '/food/cooking-measurement', 'name' => 'Cooking measurement']
        ],
    ],
];
