<?php

/**
 * Cooking measurement
 * /food/cooking-measurement
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cooking measurement',
    'meta' => ['title' => 'Cooking measurement Calculator: Free, With Steps', 'description' => 'Convert cooking measures between volume and weight using ingredient density. Check the ingredient, packing and units before using the result.', 'h1' => 'Cooking measurement Calculator', 'updated' => '2026-08-04'],
    'raw' => [
        'vars' => [
            'd2' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'd3' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'd4' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'd5' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'density' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'flour' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'hSDPFcIfLhBTphBW8VZ12', 'c' => null],
                ],
                'ds' => '85Cu6KPQTv1oGZqXYzkE9',
            ],
            'ingredients' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'aUMnoBka_qKwb-fNovOD5', 'c' => null],
                ],
                'ds' => 'ZGpVD_pQdASNuBxGe3nFC',
            ],
            'more' => [
                'type' => 'dependent',
                'defaults' => [
                    ['value' => '0'],
                ],
            ],
            'nuts' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '-NS99zVHsdRPdR91J1ssa', 'c' => null],
                ],
                'ds' => 'KvgV7WLf83Z9xkfyaId0V',
            ],
            'oil' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'kc7vLJ4lxCYdogO-ltHMg', 'c' => null],
                ],
                'ds' => 'NZqpyA2uSy1akvDAjTOyJ',
            ],
            'sugar' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'vn3JwjjdV4fyF0pHWu4Ge', 'c' => null],
                ],
                'ds' => 'kKZrX_chnbcSBr2haRFsn',
            ],
            'volume' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'volume1' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'volume2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'volume3' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'volume4' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'volume5' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'volume_salt' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'weight1' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'weight2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'weight3' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'weight_4' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'weight_butter' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
        ],
        'groups' => [
            [
                'uid' => '167lSZ3OkGkdIIuxFNQ2X',
                'title' => 'Select an ingredient',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'density',
                                    'vt' => 'dependent',
                                    'l' => 'Density',
                                    'h' => 'To input a custom density, select the last option from the ingredient dropdown.',
                                    'us' => '21',
                                    'du' => 'kgm3',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'xR0Tlf0FtSM2vBUBnKS3l',
                'title' => 'Weight units',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => 'Grams',
                                    'us' => '22',
                                    'du' => 'g',
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
                                    'n' => 'weight_4',
                                    'vt' => 'numerical',
                                    'l' => 'Decagrams',
                                    'us' => '22',
                                    'du' => 'dag',
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
                                    'n' => 'weight1',
                                    'vt' => 'numerical',
                                    'l' => 'Kilograms',
                                    'us' => '22',
                                    'du' => 'kg',
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
                                    'n' => 'weight2',
                                    'vt' => 'numerical',
                                    'l' => 'Ounces',
                                    'us' => '22',
                                    'du' => 'oz',
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
                                    'n' => 'weight3',
                                    'vt' => 'numerical',
                                    'l' => 'Pounds',
                                    'us' => '22',
                                    'du' => 'lb',
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
                                    'n' => 'weight_butter',
                                    'vt' => 'numerical',
                                    'l' => 'Butter weight',
                                    'us' => '22',
                                    'du' => 'sticks',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'FPuXy2CPqdcDgR9ptjND2',
                'title' => 'Volume units',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'volume', 'vt' => 'numerical', 'l' => 'Milliliters'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'volume_salt',
                                    'vt' => 'numerical',
                                    'l' => 'Salt volume',
                                    'us' => '122',
                                    'du' => 'pinch',
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
                                    'n' => 'volume1',
                                    'vt' => 'numerical',
                                    'l' => 'Cups',
                                    'us' => '122',
                                    'du' => 'uscups',
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
                                    'n' => 'volume4',
                                    'vt' => 'numerical',
                                    'l' => 'Fluid ounces',
                                    'us' => '122',
                                    'du' => 'fl-oz',
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
                                    'n' => 'volume2',
                                    'vt' => 'numerical',
                                    'l' => 'Teaspoons',
                                    'us' => '122',
                                    'du' => 'tsp',
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
                                    'n' => 'volume3',
                                    'vt' => 'numerical',
                                    'l' => 'Tablespoons',
                                    'us' => '122',
                                    'du' => 'tbsp',
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
                                    'n' => 'volume5',
                                    'vt' => 'numerical',
                                    'l' => 'Other volume units',
                                    'us' => '122',
                                    'du' => 'liters',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'weight = volume * (get_density(density, more, d2, d3, d4, d5)/1000/1000)',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => '(1/1000000)*volume*get_density(density, more, d2, d3, d4, d5)',
                        'r' => [
                            'volume',
                            'd2',
                            'd3',
                            'd4',
                            'd5',
                            'density',
                            'more',
                        ],
                    ],
                    [
                        'l' => 'volume',
                        'f' => '1000000*weight/get_density(density, more, d2, d3, d4, d5)',
                        'r' => [
                            'weight',
                            'd2',
                            'd3',
                            'd4',
                            'd5',
                            'density',
                            'more',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'weight1 = weight',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => 'weight1',
                        'r' => ['weight1'],
                    ],
                    [
                        'l' => 'weight1',
                        'f' => 'weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'weight2 = weight',
                'var' => [
                    [
                        'l' => 'weight2',
                        'f' => 'weight',
                        'r' => ['weight'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => 'weight2',
                        'r' => ['weight2'],
                    ],
                ],
            ],
            [
                'formula' => 'weight3 = weight',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => 'weight3',
                        'r' => ['weight3'],
                    ],
                    [
                        'l' => 'weight3',
                        'f' => 'weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'weight_butter = weight',
                'var' => [
                    [
                        'l' => 'weight_butter',
                        'f' => 'weight',
                        'r' => ['weight'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => 'weight_butter',
                        'r' => ['weight_butter'],
                    ],
                ],
            ],
            [
                'formula' => 'weight_4 = weight',
                'var' => [
                    [
                        'l' => 'weight_4',
                        'f' => 'weight',
                        'r' => ['weight'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => 'weight_4',
                        'r' => ['weight_4'],
                    ],
                ],
            ],
            [
                'formula' => 'volume1 = volume',
                'var' => [
                    [
                        'l' => 'volume1',
                        'f' => 'volume',
                        'r' => ['volume'],
                    ],
                    [
                        'l' => 'volume',
                        'f' => 'volume1',
                        'r' => ['volume1'],
                    ],
                ],
            ],
            [
                'formula' => 'volume2 = volume',
                'var' => [
                    [
                        'l' => 'volume',
                        'f' => 'volume2',
                        'r' => ['volume2'],
                    ],
                    [
                        'l' => 'volume2',
                        'f' => 'volume',
                        'r' => ['volume'],
                    ],
                ],
            ],
            [
                'formula' => 'volume3 = volume',
                'var' => [
                    [
                        'l' => 'volume3',
                        'f' => 'volume',
                        'r' => ['volume'],
                    ],
                    [
                        'l' => 'volume',
                        'f' => 'volume3',
                        'r' => ['volume3'],
                    ],
                ],
            ],
            [
                'formula' => 'volume4 = volume',
                'var' => [
                    [
                        'l' => 'volume',
                        'f' => 'volume4',
                        'r' => ['volume4'],
                    ],
                    [
                        'l' => 'volume4',
                        'f' => 'volume',
                        'r' => ['volume'],
                    ],
                ],
            ],
            [
                'formula' => 'volume_salt = volume',
                'var' => [
                    [
                        'l' => 'volume',
                        'f' => 'volume_salt',
                        'r' => ['volume_salt'],
                    ],
                    [
                        'l' => 'volume_salt',
                        'f' => 'volume',
                        'r' => ['volume'],
                    ],
                ],
            ],
            [
                'formula' => 'volume5 = volume',
                'var' => [
                    [
                        'l' => 'volume5',
                        'f' => 'volume',
                        'r' => ['volume'],
                    ],
                    [
                        'l' => 'volume',
                        'f' => 'volume5',
                        'r' => ['volume5'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'ZGpVD_pQdASNuBxGe3nFC' => [
                'name' => 'ingredients_mainDS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'aUMnoBka_qKwb-fNovOD5', 'label' => 'Water', 'value' => '1000'],
                    ['uid' => 'jIyfx7EaVTn1aCU0KToZB', 'label' => 'Milk', 'value' => '1030'],
                    ['uid' => 'G4ppw4_e_QX98M2Sv_A8H', 'label' => 'Flour', 'value' => '600'],
                    ['uid' => 'jmpWQ177kpXuQwzmxCKG3', 'label' => 'Sugar', 'value' => '845'],
                    ['uid' => 'foollJCA8r9DGGGZnX2gk', 'label' => 'Salt', 'value' => '1217'],
                    ['uid' => 'MLbiHmlFwbnncxw2eQE2B', 'label' => 'Honey', 'value' => '1420'],
                    ['uid' => 'hetbovgGoDaMJPolPn_Mh', 'label' => 'Butter', 'value' => '959'],
                    ['uid' => '035VC5T6XFgZUJwDsEvVm', 'label' => 'Oil', 'value' => '880'],
                    ['uid' => 'WRbDhhlVYiGHlUZMGw_IN', 'label' => 'Nuts and seeds', 'value' => '520'],
                    ['uid' => 'eOm2aCs26BTFNGiMyVDn5', 'label' => 'Cacao', 'value' => '520'],
                    ['uid' => 'v595sAsc7Jyp3jhhgW9pF', 'label' => 'Rice (raw)', 'value' => '850'],
                    ['uid' => 'op9Y49_nSZOYcP0UxI6-B', 'label' => 'Oats', 'value' => '410'],
                    ['uid' => 'HeSEIMycjk3xljoAUg9Uv', 'label' => 'Jam', 'value' => '1330'],
                    ['uid' => 'mC3MIg_oPev-uhtb7YOXq', 'label' => 'Nutella', 'value' => '1260'],
                    ['uid' => '_e8MOOGvgLl4ILEjMLvK-', 'label' => 'Maple syrup', 'value' => '1320'],
                    ['uid' => '3c-Xzp7ZGxqLy5Pe2-y7G', 'label' => 'Cream 38% fat', 'value' => '984'],
                    ['uid' => 'CPUsr0QYu7MzdJgXZbv2d', 'label' => 'Cream 13% fat', 'value' => '1013'],
                    ['uid' => '0u3ETBUi8o9d60cHGmycT', 'label' => 'Custom', 'value' => ''],
                ],
            ],
            '85Cu6KPQTv1oGZqXYzkE9' => [
                'name' => 'flour_typeDS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'oq_aCe0bMEHAmk022NNx3', 'label' => 'Buckwheat', 'value' => '660'],
                    ['uid' => 'jBGRIarwOKyQuRTFBKM4W', 'label' => 'Barley', 'value' => '610'],
                    ['uid' => 'gIc32tlTdRbnTmOSEj2kK', 'label' => 'Corn', 'value' => '550'],
                    ['uid' => 'Bf_6onx-K2JjG6Jlmq6Gt', 'label' => 'Rye', 'value' => '670'],
                    ['uid' => 'hSDPFcIfLhBTphBW8VZ12', 'label' => 'Wheat (all purpose)', 'value' => '600'],
                    ['uid' => 'GZhGpoKzQsE6f8xqL4ZmL', 'label' => 'Soy', 'value' => '680'],
                    ['uid' => 'coD3Wy0Vsa-c1t9OeLEO8', 'label' => 'Corn starch', 'value' => '650'],
                    ['uid' => 'twMBmJqzkJDNvBsaf2-e0', 'label' => 'Potato starch', 'value' => '720'],
                ],
            ],
            'kKZrX_chnbcSBr2haRFsn' => [
                'name' => 'sugar_typeDS',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'vn3JwjjdV4fyF0pHWu4Ge', 'label' => 'Granulated sugar', 'value' => '845'],
                    ['uid' => 'JKi0GhdkGEGNes8BLebRm', 'label' => 'Powder sugar', 'value' => '560'],
                    ['uid' => 'URZ8AAOGtZLZtkyd0QEhS', 'label' => 'Brown sugar', 'value' => '800'],
                ],
            ],
            'NZqpyA2uSy1akvDAjTOyJ' => [
                'name' => 'oil_typeDS',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'kc7vLJ4lxCYdogO-ltHMg', 'label' => 'Cooking oil', 'value' => '880'],
                    ['uid' => 'xZ-GVaHXMZedsktdz6eao', 'label' => 'Olive oil', 'value' => '918'],
                    ['uid' => 'zReBaWZV-VJoaA4OD-L0p', 'label' => 'Sunflower oil', 'value' => '960'],
                    ['uid' => 'OFb-AphkBeuSr3vj4BBs7', 'label' => 'Vegetable oil', 'value' => '890'],
                ],
            ],
            'KvgV7WLf83Z9xkfyaId0V' => [
                'name' => 'nuts_typeDS',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '0QR5WjJWXhdSbr-mU6-vh', 'label' => 'Almonds, ground', 'value' => '440'],
                    ['uid' => '-NS99zVHsdRPdR91J1ssa', 'label' => 'Walnuts, hazelnuts, grounded', 'value' => '520'],
                    ['uid' => 'kcn1Q8Rc8nZoUvLpDmqrq', 'label' => 'Sesame', 'value' => '640'],
                    ['uid' => '_NarEoWHk4UxCIqfw0lQg', 'label' => 'Sunflower seeds', 'value' => '620'],
                    ['uid' => 'yTIzoy81Yt8gyWaud4ipi', 'label' => 'Peanuts, shelled', 'value' => '690'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.define("get_density",function(_density,_more,_d2,_d3,_d4,_d5){if(_more===0||_more===6||_more===7){return _density}if(_more===2){return _d2}if(_more===3){return _d3}if(_more===4){return _d4}if(_more===5){return _d5}});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cooking measurement turns Grams, Decagrams and Kilograms into Density. There is no hidden constant here: change density and grams moves with it. The main result, Density, is reported in kilograms per cubic meter.
        TXT,
        'sections' => [
            ['title' => 'How the Cooking measurement calculator works', 'html' => <<<'TXT'
            <p>Cooking measurement answers one question from 13 numbers, and the answer is Density.</p><p>In the form&#039;s own words, Grams = (1 ÷ 1000000) × Milliliters × get_density(Density, More, D 2, D 3, D 4, D 5).</p><p>What comes back is Density — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 13 boxes and the page has everything it needs.</p><ul><li><strong>Grams</strong> — in grams</li><li><strong>Decagrams</strong> — in decagrams</li><li><strong>Kilograms</strong> — in kilograms</li><li><strong>Ounces</strong> — in ounces</li><li><strong>Pounds</strong> — in pounds</li><li><strong>Butter weight</strong> — in sticks of butter (half-cup)</li><li><strong>Milliliters</strong> — in milliliters</li><li><strong>Salt volume</strong> — in pinches (1/16 of teaspoon)</li><li><strong>Cups</strong> — in US customary cups (236.59 ml)</li><li><strong>Fluid ounces</strong> — in fluid ounces (US)</li><li><strong>Teaspoons</strong> — in teaspoons (5 ml)</li><li><strong>Tablespoons</strong> — in tablespoons (15 ml)</li><li><strong>Other volume units</strong> — in liters</li></ul><p>What you get back is Density in kilograms per cubic meter, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Decagrams = 10 dag, Kilograms = 100 kg, Ounces = 1000 oz, Pounds = 10 lb, Butter weight = 100 sticks, Milliliters = 1000 ml, Salt volume = 10 pinch, Cups = 100 uscups, Fluid ounces = 1000 fl-oz, Teaspoons = 10 tsp, Tablespoons = 100 tbsp and Other volume units = 1000 liters — through the same formula and the panel reports <strong>Flour</strong> = 600, <strong>Ingredients</strong> = 1000, <strong>Nuts</strong> = 520, <strong>Oil</strong> = 880, <strong>Sugar</strong> = 845 and <strong>Grams</strong> = 100 g.</p><ul><li><strong>Flour</strong> = 600</li><li><strong>Ingredients</strong> = 1000</li><li><strong>Nuts</strong> = 520</li><li><strong>Oil</strong> = 880</li><li><strong>Sugar</strong> = 845</li><li><strong>Grams</strong> = 100 g</li></ul><p>The line behind those figures is <strong>Grams</strong> = <code>(1 ÷ 1000000) × Milliliters × get_density(Density, More, D 2, D 3, D 4, D 5)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Flour</strong> = 600, <strong>Ingredients</strong> = 1000, <strong>Nuts</strong> = 520, <strong>Oil</strong> = 880, <strong>Sugar</strong> = 845 and <strong>Grams</strong> = 100 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Density offers 21 units and opens on kilograms per cubic meter, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Grams</strong> = <code>(1 ÷ 1000000) × Milliliters × get_density(Density, More, D 2, D 3, D 4, D 5)</code></li><li><strong>Milliliters</strong> = <code>1000000 × Grams ÷ get_density(Density, More, D 2, D 3, D 4, D 5)</code></li><li><strong>Kilograms</strong> = <code>Grams</code></li><li><strong>Ounces</strong> = <code>Grams</code></li><li><strong>Pounds</strong> = <code>Grams</code></li><li><strong>Butter weight</strong> = <code>Grams</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Grams</strong> = <code>(1 ÷ 1000000) × Milliliters × get_density(Density, More, D 2, D 3, D 4, D 5)</code> — the form to use when Milliliters, D 2, D 3 and D 4 are the values you have.</li><li><strong>Milliliters</strong> = <code>1000000 × Grams ÷ get_density(Density, More, D 2, D 3, D 4, D 5)</code> — the form to use when Grams, D 2, D 3 and D 4 are the values you have.</li><li><strong>Kilograms</strong> = <code>Grams</code> — the form to use when Grams are the values you have.</li><li><strong>Grams</strong> = <code>Kilograms</code> — the form to use when Kilograms are the values you have.</li><li><strong>Ounces</strong> = <code>Grams</code> — the form to use when Grams are the values you have.</li><li><strong>Grams</strong> = <code>Ounces</code> — the form to use when Ounces are the values you have.</li><li><strong>Pounds</strong> = <code>Grams</code> — the form to use when Grams are the values you have.</li><li><strong>Grams</strong> = <code>Pounds</code> — the form to use when Pounds are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Grams, Milliliters and Kilograms can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Decagrams from 10 to 20, leaving every other box alone. The panel moves from <strong>Flour</strong> 600, <strong>Ingredients</strong> 1000, <strong>Nuts</strong> 520, <strong>Oil</strong> 880, <strong>Sugar</strong> 845 and <strong>Grams</strong> 100 g to <strong>Flour</strong> 600, <strong>Ingredients</strong> 1000, <strong>Nuts</strong> 520, <strong>Oil</strong> 880, <strong>Sugar</strong> 845 and <strong>Grams</strong> 100 g.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Grams, Decagrams and Kilograms is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Density is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Grams left as a guess.</strong> If Grams is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Decagrams left as a guess.</strong> If Decagrams is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Grams and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cooking measurement form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Grams</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. Change it and Milliliters, Kilograms and Ounces changes with it. Fill it from a measurement rather than a memory — Grams is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Decagrams</strong> is a decagrams quantity: the page opens it in dag and converts anything else you pick before the formula runs. Change it and Grams changes with it. Fill it from a measurement rather than a memory — Decagrams is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Kilograms</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. Change it and Grams changes with it. Fill it from a measurement rather than a memory — Kilograms is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Ounces</strong> is a ounces quantity: the page opens it in oz and converts anything else you pick before the formula runs. Change it and Grams changes with it. Fill it from a measurement rather than a memory — Ounces is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Pounds</strong> is a pounds quantity: the page opens it in lb and converts anything else you pick before the formula runs. Change it and Grams changes with it. Fill it from a measurement rather than a memory — Pounds is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Butter weight</strong> is a sticks of butter (half-cup) quantity: the page opens it in sticks and converts anything else you pick before the formula runs. Change it and Grams changes with it. Fill it from a measurement rather than a memory — Butter weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Milliliters</strong> is a milliliters quantity: the page opens it in ml and converts anything else you pick before the formula runs. Change it and Grams, Cups and Teaspoons changes with it. Fill it from a measurement rather than a memory — Milliliters is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Salt volume</strong> is a pinches (1/16 of teaspoon) quantity: the page opens it in pinch and converts anything else you pick before the formula runs. Change it and Milliliters changes with it. Fill it from a measurement rather than a memory — Salt volume is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cups</strong> is a us customary cups (236.59 ml) quantity: the page opens it in uscups and converts anything else you pick before the formula runs. Change it and Milliliters changes with it. Fill it from a measurement rather than a memory — Cups is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Fluid ounces</strong> is a fluid ounces (us) quantity: the page opens it in fl-oz and converts anything else you pick before the formula runs. Change it and Milliliters changes with it. Fill it from a measurement rather than a memory — Fluid ounces is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Teaspoons</strong> is a teaspoons (5 ml) quantity: the page opens it in tsp and converts anything else you pick before the formula runs. Change it and Milliliters changes with it. Fill it from a measurement rather than a memory — Teaspoons is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Tablespoons</strong> is a tablespoons (15 ml) quantity: the page opens it in tbsp and converts anything else you pick before the formula runs. Change it and Milliliters changes with it. Fill it from a measurement rather than a memory — Tablespoons is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Other volume units</strong> is a liters quantity: the page opens it in liters and converts anything else you pick before the formula runs. Change it and Milliliters changes with it. Fill it from a measurement rather than a memory — Other volume units is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Density</strong> is a kilograms per cubic meter figure. </li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Density follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover kilograms per cubic meter, grams and milliliters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Grams, Decagrams and Kilograms measured, Density wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/ham-cooking">Ham cooking time Calculator</a>, <a href="/food/healthy-coffee">Healthy coffee Calculator</a> and <a href="/food/how-much-ham-per-person">How much ham per person Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cooking measurement calculator work out?', 'a' => 'Density, from Milliliters, D 2, D 3 and D 4. The relationship is Grams = (1 ÷ 1000000) × Milliliters × get_density(Density, More, D 2, D 3, D 4, D 5).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Grams (grams), Decagrams (decagrams), Kilograms (kilograms), Ounces (ounces), Pounds (pounds). Fill grams, decagrams and kilograms and leave Density empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Grams, Milliliters, Kilograms and Ounces can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'Are the Cooking measurement results exact?', 'a' => 'The arithmetic follows the selected ingredient and units, but density, packing and product size can vary. Check the ingredient match and weigh it when a recipe needs precision.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Density is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Grams blank and the page solves for it, reporting Density instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Density keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/grams-to-cups', 'name' => 'Grams to cups'],
            ['path' => '/food/ml-to-grams', 'name' => 'ml to grams'],
            ['path' => '/food/oil-to-butter', 'name' => 'Oil to butter']
        ],
    ],
];
