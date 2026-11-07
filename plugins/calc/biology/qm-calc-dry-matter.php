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
    'meta' => ['title' => 'Dry matter Calculator: Formula, Steps & Examples', 'description' => '<strong>dry matter protein0</strong> is what the Dry matter calculator works out, and it gets there from the protein, the fiber, the others and the final…', 'h1' => 'Dry matter Calculator', 'updated' => '2026-08-06'],
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
                'formula' => 'dryMatterProtein0 =  wetMatterProtein0*100/(100-moisture0) ',
                'var' => [
                    [
                        'l' => 'dryMatterProtein0',
                        'f' => '-100*wetMatterProtein0/(moisture0 - 100)',
                        'r' => ['moisture0', 'wetMatterProtein0'],
                    ],
                    [
                        'l' => 'moisture0',
                        'f' => '100 - 100*wetMatterProtein0/dryMatterProtein0',
                        'r' => ['dryMatterProtein0', 'wetMatterProtein0'],
                    ],
                    [
                        'l' => 'wetMatterProtein0',
                        'f' => '(1/100)*dryMatterProtein0*(100 - moisture0)',
                        'r' => ['dryMatterProtein0', 'moisture0'],
                    ],
                ],
            ],
            [
                'formula' => 'dryMatterFat0 = wetMatterFat0*100/(100-moisture0)',
                'var' => [
                    [
                        'l' => 'wetMatterFat0',
                        'f' => '(1/100)*dryMatterFat0*(100 - moisture0)',
                        'r' => ['dryMatterFat0', 'moisture0'],
                    ],
                    [
                        'l' => 'dryMatterFat0',
                        'f' => '-100*wetMatterFat0/(moisture0 - 100)',
                        'r' => ['wetMatterFat0', 'moisture0'],
                    ],
                    [
                        'l' => 'moisture0',
                        'f' => '100 - 100*wetMatterFat0/dryMatterFat0',
                        'r' => ['wetMatterFat0', 'dryMatterFat0'],
                    ],
                ],
            ],
            [
                'formula' => 'dryMatterFiber0 = wetMatterFiber0*100/(100-moisture0)',
                'var' => [
                    [
                        'l' => 'dryMatterFiber0',
                        'f' => '-100*wetMatterFiber0/(moisture0 - 100)',
                        'r' => ['moisture0', 'wetMatterFiber0'],
                    ],
                    [
                        'l' => 'moisture0',
                        'f' => '100 - 100*wetMatterFiber0/dryMatterFiber0',
                        'r' => ['dryMatterFiber0', 'wetMatterFiber0'],
                    ],
                    [
                        'l' => 'wetMatterFiber0',
                        'f' => '(1/100)*dryMatterFiber0*(100 - moisture0)',
                        'r' => ['dryMatterFiber0', 'moisture0'],
                    ],
                ],
            ],
            [
                'formula' => 'dryMatterOthers0 = wetMatterOthers0*100/(100-moisture0)',
                'var' => [
                    [
                        'l' => 'dryMatterOthers0',
                        'f' => '-100*wetMatterOthers0/(moisture0 - 100)',
                        'r' => ['wetMatterOthers0', 'moisture0'],
                    ],
                    [
                        'l' => 'wetMatterOthers0',
                        'f' => '(1/100)*dryMatterOthers0*(100 - moisture0)',
                        'r' => ['dryMatterOthers0', 'moisture0'],
                    ],
                    [
                        'l' => 'moisture0',
                        'f' => '100 - 100*wetMatterOthers0/dryMatterOthers0',
                        'r' => ['dryMatterOthers0', 'wetMatterOthers0'],
                    ],
                ],
            ],
            [
                'formula' => 'wetMatterOthers0 = 100 - (wetMatterProtein0 + wetMatterFat0 + wetMatterFiber0 + moisture0)',
                'var' => [
                    [
                        'l' => 'moisture0',
                        'f' => '-wetMatterFat0 - wetMatterFiber0 - wetMatterOthers0 - wetMatterProtein0 + 100',
                        'r' => ['wetMatterOthers0', 'wetMatterFiber0', 'wetMatterProtein0', 'wetMatterFat0'],
                    ],
                    [
                        'l' => 'wetMatterOthers0',
                        'f' => '-moisture0 - wetMatterFat0 - wetMatterFiber0 - wetMatterProtein0 + 100',
                        'r' => ['moisture0', 'wetMatterFiber0', 'wetMatterProtein0', 'wetMatterFat0'],
                    ],
                    [
                        'l' => 'wetMatterFiber0',
                        'f' => '-moisture0 - wetMatterFat0 - wetMatterOthers0 - wetMatterProtein0 + 100',
                        'r' => ['moisture0', 'wetMatterOthers0', 'wetMatterProtein0', 'wetMatterFat0'],
                    ],
                    [
                        'l' => 'wetMatterProtein0',
                        'f' => '-moisture0 - wetMatterFat0 - wetMatterFiber0 - wetMatterOthers0 + 100',
                        'r' => ['moisture0', 'wetMatterOthers0', 'wetMatterFiber0', 'wetMatterFat0'],
                    ],
                    [
                        'l' => 'wetMatterFat0',
                        'f' => '-moisture0 - wetMatterFiber0 - wetMatterOthers0 - wetMatterProtein0 + 100',
                        'r' => ['moisture0', 'wetMatterOthers0', 'wetMatterFiber0', 'wetMatterProtein0'],
                    ],
                ],
            ],
            [
                'formula' => 'finalTotal0 =  dryMatterProtein0 + dryMatterFat0 + dryMatterFiber0 + dryMatterOthers0',
                'var' => [
                    [
                        'l' => 'dryMatterFat0',
                        'f' => '-dryMatterFiber0 - dryMatterOthers0 - dryMatterProtein0 + finalTotal0',
                        'r' => ['finalTotal0', 'dryMatterOthers0', 'dryMatterFiber0', 'dryMatterProtein0'],
                    ],
                    [
                        'l' => 'finalTotal0',
                        'f' => 'dryMatterFat0 + dryMatterFiber0 + dryMatterOthers0 + dryMatterProtein0',
                        'r' => ['dryMatterFat0', 'dryMatterOthers0', 'dryMatterFiber0', 'dryMatterProtein0'],
                    ],
                    [
                        'l' => 'dryMatterOthers0',
                        'f' => '-dryMatterFat0 - dryMatterFiber0 - dryMatterProtein0 + finalTotal0',
                        'r' => ['dryMatterFat0', 'finalTotal0', 'dryMatterFiber0', 'dryMatterProtein0'],
                    ],
                    [
                        'l' => 'dryMatterFiber0',
                        'f' => '-dryMatterFat0 - dryMatterOthers0 - dryMatterProtein0 + finalTotal0',
                        'r' => ['dryMatterFat0', 'finalTotal0', 'dryMatterOthers0', 'dryMatterProtein0'],
                    ],
                    [
                        'l' => 'dryMatterProtein0',
                        'f' => '-dryMatterFat0 - dryMatterFiber0 - dryMatterOthers0 + finalTotal0',
                        'r' => ['dryMatterFat0', 'finalTotal0', 'dryMatterOthers0', 'dryMatterFiber0'],
                    ],
                ],
            ],
            [
                'formula' => 'dryMatterProtein1 =  wetMatterProtein1*100/(100-moisture1) ',
                'var' => [
                    [
                        'l' => 'moisture1',
                        'f' => '100 - 100*wetMatterProtein1/dryMatterProtein1',
                        'r' => ['dryMatterProtein1', 'wetMatterProtein1'],
                    ],
                    [
                        'l' => 'dryMatterProtein1',
                        'f' => '-100*wetMatterProtein1/(moisture1 - 100)',
                        'r' => ['moisture1', 'wetMatterProtein1'],
                    ],
                    [
                        'l' => 'wetMatterProtein1',
                        'f' => '(1/100)*dryMatterProtein1*(100 - moisture1)',
                        'r' => ['moisture1', 'dryMatterProtein1'],
                    ],
                ],
            ],
            [
                'formula' => 'dryMatterFat1 = wetMatterFat1*100/(100-moisture1)',
                'var' => [
                    [
                        'l' => 'moisture1',
                        'f' => '100 - 100*wetMatterFat1/dryMatterFat1',
                        'r' => ['wetMatterFat1', 'dryMatterFat1'],
                    ],
                    [
                        'l' => 'wetMatterFat1',
                        'f' => '(1/100)*dryMatterFat1*(100 - moisture1)',
                        'r' => ['moisture1', 'dryMatterFat1'],
                    ],
                    [
                        'l' => 'dryMatterFat1',
                        'f' => '-100*wetMatterFat1/(moisture1 - 100)',
                        'r' => ['moisture1', 'wetMatterFat1'],
                    ],
                ],
            ],
            [
                'formula' => 'dryMatterFiber1 = wetMatterFiber1*100/(100-moisture1)',
                'var' => [
                    [
                        'l' => 'moisture1',
                        'f' => '100 - 100*wetMatterFiber1/dryMatterFiber1',
                        'r' => ['wetMatterFiber1', 'dryMatterFiber1'],
                    ],
                    [
                        'l' => 'wetMatterFiber1',
                        'f' => '(1/100)*dryMatterFiber1*(100 - moisture1)',
                        'r' => ['moisture1', 'dryMatterFiber1'],
                    ],
                    [
                        'l' => 'dryMatterFiber1',
                        'f' => '-100*wetMatterFiber1/(moisture1 - 100)',
                        'r' => ['moisture1', 'wetMatterFiber1'],
                    ],
                ],
            ],
            [
                'formula' => 'dryMatterOthers1 = wetMatterOthers1*100/(100-moisture1)',
                'var' => [
                    [
                        'l' => 'moisture1',
                        'f' => '100 - 100*wetMatterOthers1/dryMatterOthers1',
                        'r' => ['wetMatterOthers1', 'dryMatterOthers1'],
                    ],
                    [
                        'l' => 'wetMatterOthers1',
                        'f' => '(1/100)*dryMatterOthers1*(100 - moisture1)',
                        'r' => ['moisture1', 'dryMatterOthers1'],
                    ],
                    [
                        'l' => 'dryMatterOthers1',
                        'f' => '-100*wetMatterOthers1/(moisture1 - 100)',
                        'r' => ['moisture1', 'wetMatterOthers1'],
                    ],
                ],
            ],
            [
                'formula' => 'wetMatterOthers1 = 100 - (wetMatterProtein1 + wetMatterFat1 + wetMatterFiber1 + moisture1)',
                'var' => [
                    [
                        'l' => 'moisture1',
                        'f' => '-wetMatterFat1 - wetMatterFiber1 - wetMatterOthers1 - wetMatterProtein1 + 100',
                        'r' => ['wetMatterOthers1', 'wetMatterProtein1', 'wetMatterFiber1', 'wetMatterFat1'],
                    ],
                    [
                        'l' => 'wetMatterOthers1',
                        'f' => '-moisture1 - wetMatterFat1 - wetMatterFiber1 - wetMatterProtein1 + 100',
                        'r' => ['moisture1', 'wetMatterProtein1', 'wetMatterFiber1', 'wetMatterFat1'],
                    ],
                    [
                        'l' => 'wetMatterProtein1',
                        'f' => '-moisture1 - wetMatterFat1 - wetMatterFiber1 - wetMatterOthers1 + 100',
                        'r' => ['moisture1', 'wetMatterOthers1', 'wetMatterFiber1', 'wetMatterFat1'],
                    ],
                    [
                        'l' => 'wetMatterFiber1',
                        'f' => '-moisture1 - wetMatterFat1 - wetMatterOthers1 - wetMatterProtein1 + 100',
                        'r' => ['moisture1', 'wetMatterOthers1', 'wetMatterProtein1', 'wetMatterFat1'],
                    ],
                    [
                        'l' => 'wetMatterFat1',
                        'f' => '-moisture1 - wetMatterFiber1 - wetMatterOthers1 - wetMatterProtein1 + 100',
                        'r' => ['moisture1', 'wetMatterOthers1', 'wetMatterProtein1', 'wetMatterFiber1'],
                    ],
                ],
            ],
            [
                'formula' => 'finalTotal1 =  dryMatterProtein1 + dryMatterFat1 + dryMatterFiber1',
                'var' => [
                    [
                        'l' => 'dryMatterProtein1',
                        'f' => '-dryMatterFat1 - dryMatterFiber1 + finalTotal1',
                        'r' => ['dryMatterFiber1', 'dryMatterFat1', 'finalTotal1'],
                    ],
                    [
                        'l' => 'dryMatterFiber1',
                        'f' => '-dryMatterFat1 - dryMatterProtein1 + finalTotal1',
                        'r' => ['dryMatterProtein1', 'dryMatterFat1', 'finalTotal1'],
                    ],
                    [
                        'l' => 'dryMatterFat1',
                        'f' => '-dryMatterFiber1 - dryMatterProtein1 + finalTotal1',
                        'r' => ['dryMatterProtein1', 'dryMatterFiber1', 'finalTotal1'],
                    ],
                    [
                        'l' => 'finalTotal1',
                        'f' => 'dryMatterFat1 + dryMatterFiber1 + dryMatterProtein1',
                        'r' => ['dryMatterProtein1', 'dryMatterFiber1', 'dryMatterFat1'],
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
        <strong>dry matter protein0</strong> is what the Dry matter calculator works out, and it gets there from the protein, the fiber, the others and the final total0.
        TXT,
        'sections' => [
            ['title' => 'How does the Dry matter calculator work?', 'html' => <<<'TXT'
            <p>The Dry matter calculator takes the values in the form, applies the relationship described below and reports <strong>dry matter protein0</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case; then you type in the protein (Guaranteed analysis - Product 1), the fiber (Guaranteed analysis - Product 1), the others (Guaranteed analysis - Product 1) and the final total0.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as check a product and compare 2 products. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in percent. The unit chip switches it to any of the 6 supported units.</li><li>A measured quantity, entered by default in percent. The unit chip switches it to any of the 6 supported units.</li><li>A measured quantity, entered by default in percent. The unit chip switches it to any of the 6 supported units.</li><li>A measured quantity, entered by default in percent. The unit chip switches it to any of the 6 supported units.</li><li>A measured quantity, entered by default in percent. The unit chip switches it to any of the 6 supported units.</li><li>A measured quantity, entered by default in percent. The unit chip switches it to any of the 6 supported units.</li><li>A measured quantity, entered by default in percent. The unit chip switches it to any of the 6 supported units.</li><li>A measured quantity, entered by default in percent. The unit chip switches it to any of the 6 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Protein (Guaranteed analysis - Product 1)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Fat (Guaranteed analysis - Product 1)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Fiber (Guaranteed analysis - Product 1)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Moisture (Guaranteed analysis - Product 1)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Others (Guaranteed analysis - Product 1)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Protein (Guaranteed analysis - Product 2)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Fat (Guaranteed analysis - Product 2)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Fiber (Guaranteed analysis - Product 2)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Moisture (Guaranteed analysis - Product 2)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Others (Guaranteed analysis - Product 2)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Dry matter fat 0</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Dry matter protein 0</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Dry matter fiber 0</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Dry matter others 0</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Final total 0</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Dry matter protein 1</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Dry matter fat 1</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Dry matter fiber 1</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Dry matter others 1</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Final total 1</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Dry matter calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Dry matter protein 0</span><span class="formula-eq">=</span><span class="formula-rhs">-100 × protein ÷ (moisture − 100)</span></div><div class="formula-row"><span class="formula-lhs">Fat</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 100) × dry matter fat0 × (100 − moisture)</span></div><div class="formula-row"><span class="formula-lhs">Dry matter fiber 0</span><span class="formula-eq">=</span><span class="formula-rhs">-100 × fiber ÷ (moisture − 100)</span></div><div class="formula-row"><span class="formula-lhs">Dry matter others 0</span><span class="formula-eq">=</span><span class="formula-rhs">-100 × others ÷ (moisture − 100)</span></div><div class="formula-row"><span class="formula-lhs">Moisture</span><span class="formula-eq">=</span><span class="formula-rhs">-fat − fiber − others − protein + 100</span></div><div class="formula-row"><span class="formula-lhs">Dry matter fat 0</span><span class="formula-eq">=</span><span class="formula-rhs">-dry matter fiber0 − dry matter others0 − dry matter protein0 + final total0</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>I want to</strong> set to check a product, <strong>Protein</strong> = 10 % and <strong>Moisture</strong> = 10 %. Working through the relationship above gives <strong>Dry matter protein 0</strong> = 10 %.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Dry matter protein 0</strong> = 10 % should be roughly the size you expected from <strong>I want to</strong> set to check a product and <strong>Protein</strong> = 10 %.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>%, opening in percent</li><li>%, opening in percent</li><li>%, opening in percent</li><li>%, opening in percent</li><li>%, opening in percent</li><li>%, opening in percent</li><li>%, opening in percent</li><li>%, opening in percent</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Dry matter calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 4 figures keep coming back — the protein, the fiber and the others — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Round only at the end. </li><li>Keep the units you enter consistent. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/fcr">Feed conversion ratio</a>, <a href="/biology/fertilizer">Fertilizer</a> and <a href="/biology/fish-oil-dosage-for-cats">Fish oil dosage for cats</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dry matter calculator work out?', 'a' => <<<'TXT'
            It returns dry matter protein0, derived from the protein, the fiber and the others. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Dry matter calculator?', 'a' => <<<'TXT'
            The form asks for the protein, the fiber, the others and the final total0, which is 9 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter protein (Guaranteed analysis - Product 1) in a different unit?', 'a' => <<<'TXT'
            Yes. Protein (Guaranteed analysis - Product 1) opens in percent and the chip beside it offers 6 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Dry matter protein 0 = 10 %. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Dry matter calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/fcr', 'name' => 'Feed conversion ratio'],
            ['path' => '/biology/fertilizer', 'name' => 'Fertilizer'],
            ['path' => '/biology/fish-oil-dosage-for-cats', 'name' => 'Fish oil dosage for cats'],
        ],
    ],
];
