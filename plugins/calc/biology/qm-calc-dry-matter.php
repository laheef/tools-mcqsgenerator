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
    'meta' => ['title' => 'Dry matter Calculator: Formula, Steps & Examples', 'description' => 'Dry matter takes Protein and Moisture and returns Fat and Fiber. With wetMatterProtein0 and moisture0 in place, Fat can stay blank and the page will work it…', 'h1' => 'Dry matter Calculator', 'updated' => '2026-08-06'],
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
        Dry matter takes Protein and Moisture and returns Fat and Fiber. The arithmetic is the whole method: Fat is worked out from Protein by one formula, applied once. Fat comes back in percent unless you switch the unit chip beside the box.
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
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Dry matter protein0</strong> = <code>− 100 × Protein ÷ (Moisture − 100)</code></li><li><strong>Moisture</strong> = <code>100 − 100 × Protein ÷ Dry matter protein0</code></li><li><strong>Protein</strong> = <code>(1 ÷ 100) × Dry matter protein0 × (100 − Moisture)</code></li><li><strong>Fat</strong> = <code>(1 ÷ 100) × Dry matter fat0 × (100 − Moisture)</code></li><li><strong>Dry matter fat0</strong> = <code>− 100 × Fat ÷ (Moisture − 100)</code></li><li><strong>Dry matter fiber0</strong> = <code>− 100 × Fiber ÷ (Moisture − 100)</code></li></ul><p>Any one of Dry matter protein0, Moisture and Protein can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Protein and Moisture is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Fat, Fiber and Others are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Protein to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Protein and Moisture is what you already know and Fat and Fiber is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/maximum-sustainable-yield">Maximum Sustainable Yield Calculator</a>, <a href="/biology/medullary-index">Medullary Index Calculator</a> and <a href="/biology/metacam-dosage-cat">Metacam dosage for cats</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dry matter calculator work out?', 'a' => 'Fat, Fiber, Others and Protein, from Moisture and Protein. The relationship is Dry matter protein0 = − 100 × Protein ÷ (Moisture − 100).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Protein (percent), Moisture (percent). With wetMatterProtein0 and moisture0 in place, Fat can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Dry matter protein0, Moisture, Protein and Fat blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Fat is not rounded at all; the figure you read is formatted for legibility.'],
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
