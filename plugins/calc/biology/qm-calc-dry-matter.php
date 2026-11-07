<?php

/**
 * Dry matter
 * /biology/dry-matter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dry matter',
    'meta' => ['title' => 'Dry matter Calculator: Formula, Steps & Examples', 'description' => 'Dry matter turns i want to..., protein and fat into others and final total0. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Dry matter Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'compareOption' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'tieX8RyYIZZ1MV9CjETnv', 'c' => null],
                    ['v' => 'tieX8RyYIZZ1MV9CjETnv', 'c' => 'userUsesImperialUnits()'],
                ],
                'ds' => 'dDVjxG-B81feSrAjtIqs8',
            ],
            'dryMatterFat0' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'dryMatterFat1' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'dryMatterFiber0' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'dryMatterFiber1' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'dryMatterOthers0' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'dryMatterOthers1' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'dryMatterProtein0' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'dryMatterProtein1' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'finalTotal0' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'finalTotal1' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'moisture0' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'moisture1' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'wetMatterFat0' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'wetMatterFat1' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'wetMatterFiber0' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'wetMatterFiber1' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'wetMatterOthers0' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'wetMatterOthers1' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'wetMatterProtein0' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'wetMatterProtein1' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => '2_pER1K4CML2-OaySd1HZ',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'compareOption',
                                    'vt' => 'valueSelect',
                                    'l' => 'I want to...',
                                    'ds' => 'dDVjxG-B81feSrAjtIqs8',
                                    'opts' => [
                                        ['tieX8RyYIZZ1MV9CjETnv', 'check a product', '1'],
                                        ['7H2YX9KACEU0nz39ixXHs', 'compare 2 products', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '7j3PFgVSlVfIh1_RDZiE1',
                'title' => 'Guaranteed analysis - Product 1',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'wetMatterProtein0',
                                    'vt' => 'numerical',
                                    'l' => 'Protein',
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
                                    'n' => 'wetMatterFat0',
                                    'vt' => 'numerical',
                                    'l' => 'Fat',
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
                                    'n' => 'wetMatterFiber0',
                                    'vt' => 'numerical',
                                    'l' => 'Fiber',
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
                                    'n' => 'moisture0',
                                    'vt' => 'numerical',
                                    'l' => 'Moisture',
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
                                    'n' => 'wetMatterOthers0',
                                    'vt' => 'numerical',
                                    'l' => 'Others',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'OjlPrHGIFgcenwZ-Pusl2',
                'title' => 'Guaranteed analysis - Product 2',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'wetMatterProtein1',
                                    'vt' => 'numerical',
                                    'l' => 'Protein',
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
                                    'n' => 'wetMatterFat1',
                                    'vt' => 'numerical',
                                    'l' => 'Fat',
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
                                    'n' => 'wetMatterFiber1',
                                    'vt' => 'numerical',
                                    'l' => 'Fiber',
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
                                    'n' => 'moisture1',
                                    'vt' => 'numerical',
                                    'l' => 'Moisture',
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
                                    'n' => 'wetMatterOthers1',
                                    'vt' => 'numerical',
                                    'l' => 'Others',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'CbvbyKJxDoDjTTF2nvxQN',
                'title' => 'Always hidden variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'dryMatterFat0',
                                    'vt' => 'numerical',
                                    'l' => 'Dry matter fat0',
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
                                    'n' => 'dryMatterProtein0',
                                    'vt' => 'numerical',
                                    'l' => 'Dry matter protein0',
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
                                    'n' => 'dryMatterFiber0',
                                    'vt' => 'numerical',
                                    'l' => 'Dry matter fiber0',
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
                                    'n' => 'dryMatterOthers0',
                                    'vt' => 'numerical',
                                    'l' => 'Dry matter others0',
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
                                    'n' => 'finalTotal0',
                                    'vt' => 'numerical',
                                    'l' => 'Final total0',
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
                                    'n' => 'dryMatterProtein1',
                                    'vt' => 'numerical',
                                    'l' => 'Dry matter protein1',
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
                                    'n' => 'dryMatterFat1',
                                    'vt' => 'numerical',
                                    'l' => 'Dry matter fat1',
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
                                    'n' => 'dryMatterFiber1',
                                    'vt' => 'numerical',
                                    'l' => 'Dry matter fiber1',
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
                                    'n' => 'dryMatterOthers1',
                                    'vt' => 'numerical',
                                    'l' => 'Dry matter others1',
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
                                    'n' => 'finalTotal1',
                                    'vt' => 'numerical',
                                    'l' => 'Final total1',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'dryMatterProtein0 = wetMatterProtein0/(1-moisture0)',
                'var' => [
                    [
                        'l' => 'dryMatterProtein0',
                        'f' => 'wetMatterProtein0/(1-moisture0)',
                        'r' => ['wetMatterProtein0', 'moisture0'],
                    ],
                    [
                        'l' => 'wetMatterProtein0',
                        'f' => 'dryMatterProtein0*(1-moisture0)',
                        'r' => ['dryMatterProtein0', 'moisture0'],
                    ],
                    [
                        'l' => 'moisture0',
                        'f' => '1 - wetMatterProtein0/dryMatterProtein0',
                        'r' => ['dryMatterProtein0', 'wetMatterProtein0'],
                    ],
                ],
            ],
            [
                'formula' => 'dryMatterFat0 = wetMatterFat0/(1-moisture0)',
                'var' => [
                    [
                        'l' => 'dryMatterFat0',
                        'f' => 'wetMatterFat0/(1-moisture0)',
                        'r' => ['wetMatterFat0', 'moisture0'],
                    ],
                    [
                        'l' => 'wetMatterFat0',
                        'f' => 'dryMatterFat0*(1-moisture0)',
                        'r' => ['dryMatterFat0', 'moisture0'],
                    ],
                    [
                        'l' => 'moisture0',
                        'f' => '1 - wetMatterFat0/dryMatterFat0',
                        'r' => ['dryMatterFat0', 'wetMatterFat0'],
                    ],
                ],
            ],
            [
                'formula' => 'dryMatterFiber0 = wetMatterFiber0/(1-moisture0)',
                'var' => [
                    [
                        'l' => 'dryMatterFiber0',
                        'f' => 'wetMatterFiber0/(1-moisture0)',
                        'r' => ['wetMatterFiber0', 'moisture0'],
                    ],
                    [
                        'l' => 'wetMatterFiber0',
                        'f' => 'dryMatterFiber0*(1-moisture0)',
                        'r' => ['dryMatterFiber0', 'moisture0'],
                    ],
                    [
                        'l' => 'moisture0',
                        'f' => '1 - wetMatterFiber0/dryMatterFiber0',
                        'r' => ['dryMatterFiber0', 'wetMatterFiber0'],
                    ],
                ],
            ],
            [
                'formula' => 'dryMatterOthers0 = wetMatterOthers0/(1-moisture0)',
                'var' => [
                    [
                        'l' => 'dryMatterOthers0',
                        'f' => 'wetMatterOthers0/(1-moisture0)',
                        'r' => ['wetMatterOthers0', 'moisture0'],
                    ],
                    [
                        'l' => 'wetMatterOthers0',
                        'f' => 'dryMatterOthers0*(1-moisture0)',
                        'r' => ['dryMatterOthers0', 'moisture0'],
                    ],
                    [
                        'l' => 'moisture0',
                        'f' => '1 - wetMatterOthers0/dryMatterOthers0',
                        'r' => ['dryMatterOthers0', 'wetMatterOthers0'],
                    ],
                ],
            ],
            [
                'formula' => 'wetMatterOthers0 = 1 - (wetMatterProtein0 + wetMatterFat0 + wetMatterFiber0 + moisture0)',
                'var' => [
                    [
                        'l' => 'moisture0',
                        'f' => '-wetMatterProtein0 - wetMatterFat0 - wetMatterFiber0 - wetMatterOthers0 + 1',
                        'r' => ['wetMatterProtein0', 'wetMatterFat0', 'wetMatterFiber0', 'wetMatterOthers0'],
                    ],
                    [
                        'l' => 'wetMatterOthers0',
                        'f' => '-wetMatterProtein0 - wetMatterFat0 - wetMatterFiber0 - moisture0 + 1',
                        'r' => ['wetMatterProtein0', 'wetMatterFat0', 'wetMatterFiber0', 'moisture0'],
                    ],
                    [
                        'l' => 'wetMatterFiber0',
                        'f' => 'wetMatterProtein0 - wetMatterFat0 - wetMatterOthers0 - moisture0 + 1',
                        'r' => ['wetMatterProtein0', 'wetMatterFat0', 'wetMatterOthers0', 'moisture0'],
                    ],
                    [
                        'l' => 'wetMatterProtein0',
                        'f' => 'wetMatterFat0 - wetMatterFiber0 - wetMatterOthers0 - moisture0 + 1',
                        'r' => ['wetMatterFat0', 'wetMatterFiber0', 'wetMatterOthers0', 'moisture0'],
                    ],
                    [
                        'l' => 'wetMatterFat0',
                        'f' => 'wetMatterProtein0 - wetMatterFiber0 - wetMatterOthers0 - moisture0 + 1',
                        'r' => ['wetMatterProtein0', 'wetMatterFiber0', 'wetMatterOthers0', 'moisture0'],
                    ],
                ],
            ],
            [
                'formula' => 'finalTotal0 =  dryMatterProtein0 + dryMatterFat0 + dryMatterFiber0 + dryMatterOthers0',
                'var' => [
                    [
                        'l' => 'dryMatterFat0',
                        'f' => '-dryMatterProtein0 - dryMatterFiber0 - dryMatterOthers0 + finalTotal0',
                        'r' => ['dryMatterProtein0', 'dryMatterFiber0', 'dryMatterOthers0', 'finalTotal0'],
                    ],
                    [
                        'l' => 'finalTotal0',
                        'f' => 'dryMatterProtein0 + dryMatterFat0 + dryMatterFiber0 + dryMatterOthers0',
                        'r' => ['dryMatterProtein0', 'dryMatterFat0', 'dryMatterFiber0', 'dryMatterOthers0'],
                    ],
                    [
                        'l' => 'dryMatterOthers0',
                        'f' => '-dryMatterProtein0 - dryMatterFat0 - dryMatterFiber0 + finalTotal0',
                        'r' => ['dryMatterProtein0', 'dryMatterFat0', 'dryMatterFiber0', 'finalTotal0'],
                    ],
                    [
                        'l' => 'dryMatterFiber0',
                        'f' => '-dryMatterProtein0 - dryMatterFat0 - dryMatterOthers0 + finalTotal0',
                        'r' => ['dryMatterProtein0', 'dryMatterFat0', 'dryMatterOthers0', 'finalTotal0'],
                    ],
                    [
                        'l' => 'dryMatterProtein0',
                        'f' => '-dryMatterFat0 - dryMatterFiber0 - dryMatterOthers0 + finalTotal0',
                        'r' => ['dryMatterFat0', 'dryMatterFiber0', 'dryMatterOthers0', 'finalTotal0'],
                    ],
                ],
            ],
            [
                'formula' => 'dryMatterProtein1 = wetMatterProtein1/(1-moisture1)',
                'var' => [
                    [
                        'l' => 'dryMatterProtein1',
                        'f' => 'wetMatterProtein1/(1-moisture1)',
                        'r' => ['wetMatterProtein1', 'moisture1'],
                    ],
                    [
                        'l' => 'wetMatterProtein1',
                        'f' => 'dryMatterProtein1*(1-moisture1)',
                        'r' => ['dryMatterProtein1', 'moisture1'],
                    ],
                    [
                        'l' => 'moisture1',
                        'f' => '1 - wetMatterProtein1/dryMatterProtein1',
                        'r' => ['dryMatterProtein1', 'wetMatterProtein1'],
                    ],
                ],
            ],
            [
                'formula' => 'dryMatterFat1 = wetMatterFat1/(1-moisture1)',
                'var' => [
                    [
                        'l' => 'dryMatterFat1',
                        'f' => 'wetMatterFat1/(1-moisture1)',
                        'r' => ['wetMatterFat1', 'moisture1'],
                    ],
                    [
                        'l' => 'wetMatterFat1',
                        'f' => 'dryMatterFat1*(1-moisture1)',
                        'r' => ['dryMatterFat1', 'moisture1'],
                    ],
                    [
                        'l' => 'moisture1',
                        'f' => '1 - wetMatterFat1/dryMatterFat1',
                        'r' => ['dryMatterFat1', 'wetMatterFat1'],
                    ],
                ],
            ],
            [
                'formula' => 'dryMatterFiber1 = wetMatterFiber1/(1-moisture1)',
                'var' => [
                    [
                        'l' => 'dryMatterFiber1',
                        'f' => 'wetMatterFiber1/(1-moisture1)',
                        'r' => ['wetMatterFiber1', 'moisture1'],
                    ],
                    [
                        'l' => 'wetMatterFiber1',
                        'f' => 'dryMatterFiber1*(1-moisture1)',
                        'r' => ['dryMatterFiber1', 'moisture1'],
                    ],
                    [
                        'l' => 'moisture1',
                        'f' => '1 - wetMatterFiber1/dryMatterFiber1',
                        'r' => ['dryMatterFiber1', 'wetMatterFiber1'],
                    ],
                ],
            ],
            [
                'formula' => 'dryMatterOthers1 = wetMatterOthers1/(1-moisture1)',
                'var' => [
                    [
                        'l' => 'dryMatterOthers1',
                        'f' => 'wetMatterOthers1/(1-moisture1)',
                        'r' => ['wetMatterOthers1', 'moisture1'],
                    ],
                    [
                        'l' => 'wetMatterOthers1',
                        'f' => 'dryMatterOthers1*(1-moisture1)',
                        'r' => ['dryMatterOthers1', 'moisture1'],
                    ],
                    [
                        'l' => 'moisture1',
                        'f' => '1 - wetMatterOthers1/dryMatterOthers1',
                        'r' => ['dryMatterOthers1', 'wetMatterOthers1'],
                    ],
                ],
            ],
            [
                'formula' => 'wetMatterOthers1 = 1 - (wetMatterProtein1 + wetMatterFat1 + wetMatterFiber1 + moisture1)',
                'var' => [
                    [
                        'l' => 'moisture1',
                        'f' => '-wetMatterProtein1 - wetMatterFat1 - wetMatterFiber1 - wetMatterOthers1 + 1',
                        'r' => ['wetMatterProtein1', 'wetMatterFat1', 'wetMatterFiber1', 'wetMatterOthers1'],
                    ],
                    [
                        'l' => 'wetMatterOthers1',
                        'f' => '-wetMatterProtein1 - wetMatterFat1 - wetMatterFiber1 - moisture1 + 1',
                        'r' => ['wetMatterProtein1', 'wetMatterFat1', 'wetMatterFiber1', 'moisture1'],
                    ],
                    [
                        'l' => 'wetMatterFiber1',
                        'f' => 'wetMatterProtein1 - wetMatterFat1 - wetMatterOthers1 - moisture1 + 1',
                        'r' => ['wetMatterProtein1', 'wetMatterFat1', 'wetMatterOthers1', 'moisture1'],
                    ],
                    [
                        'l' => 'wetMatterProtein1',
                        'f' => 'wetMatterFat1 - wetMatterFiber1 - wetMatterOthers1 - moisture1 + 1',
                        'r' => ['wetMatterFat1', 'wetMatterFiber1', 'wetMatterOthers1', 'moisture1'],
                    ],
                    [
                        'l' => 'wetMatterFat1',
                        'f' => 'wetMatterProtein1 - wetMatterFiber1 - wetMatterOthers1 - moisture1 + 1',
                        'r' => ['wetMatterProtein1', 'wetMatterFiber1', 'wetMatterOthers1', 'moisture1'],
                    ],
                ],
            ],
            [
                'formula' => 'finalTotal1 =  dryMatterProtein1 + dryMatterFat1 + dryMatterFiber1 + dryMatterOthers1',
                'var' => [
                    [
                        'l' => 'dryMatterFat1',
                        'f' => '-dryMatterProtein1 - dryMatterFiber1 - dryMatterOthers1 + finalTotal1',
                        'r' => ['dryMatterProtein1', 'dryMatterFiber1', 'dryMatterOthers1', 'finalTotal1'],
                    ],
                    [
                        'l' => 'finalTotal1',
                        'f' => 'dryMatterProtein1 + dryMatterFat1 + dryMatterFiber1 + dryMatterOthers1',
                        'r' => ['dryMatterProtein1', 'dryMatterFat1', 'dryMatterFiber1', 'dryMatterOthers1'],
                    ],
                    [
                        'l' => 'dryMatterOthers1',
                        'f' => '-dryMatterProtein1 - dryMatterFat1 - dryMatterFiber1 + finalTotal1',
                        'r' => ['dryMatterProtein1', 'dryMatterFat1', 'dryMatterFiber1', 'finalTotal1'],
                    ],
                    [
                        'l' => 'dryMatterFiber1',
                        'f' => '-dryMatterProtein1 - dryMatterFat1 - dryMatterOthers1 + finalTotal1',
                        'r' => ['dryMatterProtein1', 'dryMatterFat1', 'dryMatterOthers1', 'finalTotal1'],
                    ],
                    [
                        'l' => 'dryMatterProtein1',
                        'f' => '-dryMatterFat1 - dryMatterFiber1 - dryMatterOthers1 + finalTotal1',
                        'r' => ['dryMatterFat1', 'dryMatterFiber1', 'dryMatterOthers1', 'finalTotal1'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'dDVjxG-B81feSrAjtIqs8' => [
                'name' => 'compare option',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'tieX8RyYIZZ1MV9CjETnv', 'label' => 'check a product', 'value' => '1'],
                    ['uid' => '7H2YX9KACEU0nz39ixXHs', 'label' => 'compare 2 products', 'value' => '2'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dry matter reads one of fat and fiber from the other, so either can be the value you fill in. Fat comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Dry matter calculator works', 'html' => <<<'TXT'
            <p>The Dry matter calculator applies one relationship to 2 numbers and reports Fat, Fiber and Others.</p><p>Written with the labels from the form, Dry matter protein0 = − 100 × Protein ÷ (Moisture − 100).</p><p>What comes back is Fat, Fiber, Others and Protein — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Protein</strong> — in percent</li><li><strong>Moisture</strong> — in percent</li></ul><p>What you get back is Fat in percent, Fiber in percent, Others in percent, Protein in percent, Fat in percent, Fiber in percent, Moisture in percent, Others in percent, Dry matter fat0 in percent, Dry matter protein0 in percent, Dry matter fiber0 in percent, Dry matter others0 in percent, Final total0 in percent, Dry matter protein1 in percent, Dry matter fat1 in percent, Dry matter fiber1 in percent, Dry matter others1 in percent, Final total1 in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Fat offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Dry matter protein0</strong> = <code>− 100 × Protein ÷ (Moisture − 100)</code></li><li><strong>Moisture</strong> = <code>100 − 100 × Protein ÷ Dry matter protein0</code></li><li><strong>Protein</strong> = <code>(1 ÷ 100) × Dry matter protein0 × (100 − Moisture)</code></li><li><strong>Dry matter fat0</strong> = <code>− 100 × Fat ÷ (Moisture − 100)</code></li><li><strong>Fat</strong> = <code>(1 ÷ 100) × Dry matter fat0 × (100 − Moisture)</code></li><li><strong>Dry matter fiber0</strong> = <code>− 100 × Fiber ÷ (Moisture − 100)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Dry matter protein0</strong> = <code>− 100 × Protein ÷ (Moisture − 100)</code> — the form to use when Moisture and Protein are the values you have.</li><li><strong>Moisture</strong> = <code>100 − 100 × Protein ÷ Dry matter protein0</code> — the form to use when Dry matter protein0 and Protein are the values you have.</li><li><strong>Protein</strong> = <code>(1 ÷ 100) × Dry matter protein0 × (100 − Moisture)</code> — the form to use when Dry matter protein0 and Moisture are the values you have.</li><li><strong>Dry matter fat0</strong> = <code>− 100 × Fat ÷ (Moisture − 100)</code> — the form to use when Fat and Moisture are the values you have.</li><li><strong>Fat</strong> = <code>(1 ÷ 100) × Dry matter fat0 × (100 − Moisture)</code> — the form to use when Dry matter fat0 and Moisture are the values you have.</li><li><strong>Moisture</strong> = <code>100 − 100 × Fat ÷ Dry matter fat0</code> — the form to use when Fat and Dry matter fat0 are the values you have.</li><li><strong>Dry matter fiber0</strong> = <code>− 100 × Fiber ÷ (Moisture − 100)</code> — the form to use when Moisture and Fiber are the values you have.</li><li><strong>Moisture</strong> = <code>100 − 100 × Fiber ÷ Dry matter fiber0</code> — the form to use when Dry matter fiber0 and Fiber are the values you have.</li></ul><p>Any one of Dry matter protein0, Moisture and Protein can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Protein and Moisture is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Fat, Fiber and Others are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Protein left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Protein is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Moisture left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Moisture is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Protein to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Dry matter form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Protein</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Dry matter protein0, Moisture and Others changes with it. Fill it from a measurement rather than a memory — Protein is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Moisture</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Dry matter protein0, Protein and Fat changes with it. Fill it from a measurement rather than a memory — Moisture is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Protein and Moisture ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Protein — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Fat in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Fat follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Protein and Moisture are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Protein and Moisture is what you already know and Fat and Fiber is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/maximum-sustainable-yield">Maximum Sustainable Yield Calculator</a>, <a href="/biology/medullary-index">Medullary Index Calculator</a> and <a href="/biology/metacam-dosage-cat">Metacam dosage for cats</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Dry matter is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Dry matter is a number to act on, so the useful question is what to do with Fat (perc), Fiber (perc) and Others (perc) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Protein and Moisture alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dry matter calculator work out?', 'a' => 'Fat, Fiber, Others and Protein, from Moisture and Protein. The relationship is Dry matter protein0 = − 100 × Protein ÷ (Moisture − 100).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Protein (percent), Moisture (percent). With protein and moisture in place, Fat can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Dry matter protein0, Moisture, Protein and Dry matter fat0 blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Fat is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Protein blank and the page solves for it, reporting Fat instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Fat keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/maximum-sustainable-yield', 'name' => 'Maximum Sustainable Yield Calculator'],
            ['path' => '/biology/medullary-index', 'name' => 'Medullary Index Calculator'],
            ['path' => '/biology/metacam-dosage-cat', 'name' => 'Metacam dosage for cats'],
        ],
        'authors' => [],
    ],
];
