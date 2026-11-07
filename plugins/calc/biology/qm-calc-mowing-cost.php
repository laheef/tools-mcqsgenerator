<?php

/**
 * Lawn mowing
 * /biology/mowing-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lawn mowing',
    'meta' => ['title' => 'Lawn mowing Calculator — Formula, Units & Example', 'description' => 'Lawn mowing works out Mowing price and Area to mow from Mower speed, Expected mowing productivity and Your mower can mow. Mowing price is opened in USD; the…', 'h1' => 'Lawn mowing Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'area' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'costArea' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'costBy' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'AubDDMa_oQ07qWEMpWW--', 'c' => null],
                ],
                'ds' => '1955',
            ],
            'costHour' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'errorMargin' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '80', 'c' => null],
                ],
            ],
            'hours' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mowArea' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mowSpeed' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mowWidth' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mowingEff' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mowingTime' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'pricePerArea' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'pricePerHour' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'whatCalculate' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'yFJwJ7LmApv9lL7m8MTms', 'c' => null],
                ],
                'ds' => '1953',
            ],
        ],
        'groups' => [
            [
                'uid' => 'Qv1SNWrVfhiECF600NDwI',
                'title' => 'Select mowing calculation',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'whatCalculate',
                                    'vt' => 'valueSelect',
                                    'l' => 'I want to find the...',
                                    'ds' => '1953',
                                    'opts' => [
                                        ['yFJwJ7LmApv9lL7m8MTms', 'Lawn mowing cost', '1'],
                                        ['8qFDJrXZ5ics53kdfam0N', 'Mower efficiency and time', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'NfqjNd6dYmliJ3v2YS9tY',
                'title' => 'Mowing cost',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'costBy',
                                    'vt' => 'valueSelect',
                                    'l' => 'The company charges...',
                                    'ds' => '1955',
                                    'opts' => [
                                        ['AubDDMa_oQ07qWEMpWW--', 'Per area', '11'],
                                        ['50Ab_D4meoMV_fI8BFuJX', 'Per hour', '22'],
                                    ],
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
                                    'n' => 'pricePerArea',
                                    'vt' => 'numerical',
                                    'l' => 'Mowing price',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'area',
                                    'vt' => 'numerical',
                                    'l' => 'Area to mow',
                                    'us' => '28',
                                    'du' => 'hectare',
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
                                    'n' => 'costArea',
                                    'vt' => 'numerical',
                                    'l' => 'Total costs',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'pricePerHour',
                                    'vt' => 'numerical',
                                    'l' => 'Mowing price',
                                    'suf' => '/h',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'hours', 'vt' => 'numerical', 'l' => 'Hours of work'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'costHour',
                                    'vt' => 'numerical',
                                    'l' => 'Total costs',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'sj6S6l820Jrv13ZwWq7GT',
                'title' => 'Mower efficiency',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mowSpeed',
                                    'vt' => 'numerical',
                                    'l' => 'Mower speed',
                                    'h' => 'At what speed does your mower move at when mowing?',
                                    'us' => '32',
                                    'du' => 'kmph',
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
                                    'n' => 'mowWidth',
                                    'vt' => 'numerical',
                                    'l' => 'Mower width',
                                    'h' => 'How wide is your mower\'s deck?',
                                    'us' => '4',
                                    'du' => 'cm',
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
                                    'n' => 'errorMargin',
                                    'vt' => 'numerical',
                                    'l' => 'Expected mowing productivity',
                                    'h' => <<<'TXT'
                                    Becuase of overlap, trimming, differences in grass durability, etc., mowing is rarely a 100% successful. Typically, a mower gets about 80-90% of the grass cut perfectly.
                                    TXT,
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
                                    'n' => 'mowingEff',
                                    'vt' => 'numerical',
                                    'l' => 'Your mower can mow',
                                    'us' => '28',
                                    'du' => 'hectare',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'sMGf6DBAnaMhnfQzo79hk',
                'title' => 'Mowing time',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mowArea',
                                    'vt' => 'numerical',
                                    'l' => 'If you have',
                                    'us' => '28',
                                    'du' => 'hectare',
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
                                    'n' => 'mowingTime',
                                    'vt' => 'numerical',
                                    'l' => 'mowing should take',
                                    'h' => 'Estimated mowing time.',
                                    'us' => '19',
                                    'du' => 'hrsmin',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'mowingEff = mowSpeed * mowWidth * errorMargin',
                'var' => [
                    [
                        'l' => 'mowWidth',
                        'f' => 'mowingEff/(errorMargin*mowSpeed)',
                        'r' => ['mowingEff', 'mowSpeed', 'errorMargin'],
                    ],
                    [
                        'l' => 'mowingEff',
                        'f' => 'errorMargin*mowSpeed*mowWidth',
                        'r' => ['mowWidth', 'mowSpeed', 'errorMargin'],
                    ],
                    [
                        'l' => 'mowSpeed',
                        'f' => 'mowingEff/(errorMargin*mowWidth)',
                        'r' => ['mowWidth', 'mowingEff', 'errorMargin'],
                    ],
                    [
                        'l' => 'errorMargin',
                        'f' => 'mowingEff/(mowSpeed*mowWidth)',
                        'r' => ['mowWidth', 'mowingEff', 'mowSpeed'],
                    ],
                ],
            ],
            [
                'formula' => 'costArea = pricePerArea * area',
                'var' => [
                    [
                        'l' => 'pricePerArea',
                        'f' => 'costArea/area',
                        'r' => ['costArea', 'area'],
                    ],
                    [
                        'l' => 'costArea',
                        'f' => 'area*pricePerArea',
                        'r' => ['pricePerArea', 'area'],
                    ],
                    [
                        'l' => 'area',
                        'f' => 'costArea/pricePerArea',
                        'r' => ['pricePerArea', 'costArea'],
                    ],
                ],
            ],
            [
                'formula' => 'costHour = pricePerHour * hours',
                'var' => [
                    [
                        'l' => 'costHour',
                        'f' => 'hours*pricePerHour',
                        'r' => ['hours', 'pricePerHour'],
                    ],
                    [
                        'l' => 'hours',
                        'f' => 'costHour/pricePerHour',
                        'r' => ['costHour', 'pricePerHour'],
                    ],
                    [
                        'l' => 'pricePerHour',
                        'f' => 'costHour/hours',
                        'r' => ['costHour', 'hours'],
                    ],
                ],
            ],
            [
                'formula' => 'mowingTime = mowArea / mowingEff',
                'var' => [
                    [
                        'l' => 'mowArea',
                        'f' => 'mowingEff*mowingTime',
                        'r' => ['mowingEff', 'mowingTime'],
                    ],
                    [
                        'l' => 'mowingEff',
                        'f' => 'mowArea/mowingTime',
                        'r' => ['mowArea', 'mowingTime'],
                    ],
                    [
                        'l' => 'mowingTime',
                        'f' => 'mowArea/mowingEff',
                        'r' => ['mowArea', 'mowingEff'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '1953' => [
                'name' => 'what to do',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'yFJwJ7LmApv9lL7m8MTms', 'label' => 'Lawn mowing cost', 'value' => '1'],
                    ['uid' => '8qFDJrXZ5ics53kdfam0N', 'label' => 'Mower efficiency and time', 'value' => '2'],
                ],
            ],
            '1955' => [
                'name' => 'charge type',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'AubDDMa_oQ07qWEMpWW--', 'label' => 'Per area', 'value' => '11'],
                    ['uid' => '50Ab_D4meoMV_fI8BFuJX', 'label' => 'Per hour', 'value' => '22'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Lawn mowing works out Mowing price and Area to mow from Mower speed, Expected mowing productivity and Your mower can mow. Nothing is looked up on this page: Mowing price is computed from Mower speed and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Mowing price is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Lawn mowing calculator works', 'html' => <<<'TXT'
            <p>Lawn mowing answers one question from 3 numbers, and the answer is Mowing price, Area to mow and Total costs.</p><p>The relationship it solves reads Mower width = Your mower can mow ÷ (Expected mowing productivity × Mower speed).</p><p>The result panel carries Mowing price, Area to mow, Total costs and Mowing price, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Mower speed</strong> — in kilometers per hour. At what speed does your mower move at when mowing?</li><li><strong>Expected mowing productivity</strong> — in percent. Becuase of overlap, trimming, differences in grass durability, etc., mowing is rarely a 100% successful. Typically, a mower gets about 80-90% of the grass cut perfectly.</li><li><strong>Your mower can mow</strong> — in hectares</li></ul><p>The result boxes are Mowing price in USD, Area to mow in hectares, Total costs in USD, Mowing price in /h, Hours of work, Total costs in USD, Mower width in centimeters, If you have in hectares, mowing should take in hours / minutes; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Mower width</strong> = <code>Your mower can mow ÷ (Expected mowing productivity × Mower speed)</code></li><li><strong>Your mower can mow</strong> = <code>Expected mowing productivity × Mower speed × Mower width</code></li><li><strong>Mower speed</strong> = <code>Your mower can mow ÷ (Expected mowing productivity × Mower width)</code></li><li><strong>Expected mowing productivity</strong> = <code>Your mower can mow ÷ (Mower speed × Mower width)</code></li><li><strong>Mowing price</strong> = <code>Total costs ÷ Area to mow</code></li><li><strong>Total costs</strong> = <code>Area to mow × Mowing price</code></li></ul><p>Any one of Mower width, Your mower can mow and Mower speed can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Mower speed, Expected mowing productivity and Your mower can mow carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Mowing price, Area to mow and Total costs are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Mower speed is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Mower speed, Expected mowing productivity and Your mower can mow is what you already know and Mowing price and Area to mow is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dog-quality-of-life">Dog quality of life</a>, <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a> and <a href="/biology/dog-size">Dog size Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lawn mowing calculator work out?', 'a' => <<<'TXT'
            Mowing price, Area to mow, Total costs and Mowing price, from Your mower can mow, Mower speed and Expected mowing productivity. The relationship is Mower width = Your mower can mow ÷ (Expected mowing productivity × Mower speed).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Mower speed (kilometers per hour), Expected mowing productivity (percent), Your mower can mow (hectares). With mowSpeed, errorMargin and mowingEff in place, Mowing price can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Mower width, Your mower can mow, Mower speed and Expected mowing productivity blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Mowing price is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Mower speed left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Mowing price keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
            ['path' => '/biology/dog-size', 'name' => 'Dog size Calculator'],
        ],
        'authors' => [],
    ],
];
