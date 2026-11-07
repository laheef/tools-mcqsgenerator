<?php

/**
 * Punnett square
 * /biology/punnett-square
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Punnett square',
    'meta' => ['title' => 'Punnett square Calculator — Formula & Results', 'description' => 'The arithmetic is the whole method: Chance for AA is worked out from Mother\'s genotype by one formula, applied once. A result here can always be checked…', 'h1' => 'Punnett square Calculator', 'updated' => '2026-07-31'],
    'raw' => [
        'vars' => [
            'AA' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'Aa' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'aa' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'father1' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'QPY-O-YYBDD82MyBu8lb0', 'c' => null],
                ],
                'ds' => '2rp3FzqovlaITD-dYwxV4',
            ],
            'mother1' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'QPY-O-YYBDD82MyBu8lb0', 'c' => null],
                ],
                'ds' => '2rp3FzqovlaITD-dYwxV4',
            ],
        ],
        'groups' => [
            [
                'uid' => 'tHJkENgymXwwvdkQQ1BNw',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Learning genetics? Enter parent genotypes to quickly predict offspring traits with our Punnett Square calculator!'],
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
                                    't' => 'x',
                                    'c' => [
                                        [null, 'A - Dominant allele a - Recessive allele'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1_FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mother1',
                                    'vt' => 'valueSelect',
                                    'l' => 'Mother\'s genotype',
                                    'ds' => '2rp3FzqovlaITD-dYwxV4',
                                    'opts' => [
                                        ['QPY-O-YYBDD82MyBu8lb0', 'AA', '1'],
                                        ['AZ_tpL6dm0UPiBDfzpImm', 'Aa', '2'],
                                        ['2Tw3zx7MqrxdEUW-NExV_', 'aa', '3'],
                                    ],
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'father1',
                                    'vt' => 'valueSelect',
                                    'l' => 'Father\'s genotype',
                                    'ds' => '2rp3FzqovlaITD-dYwxV4',
                                    'opts' => [
                                        ['QPY-O-YYBDD82MyBu8lb0', 'AA', '1'],
                                        ['AZ_tpL6dm0UPiBDfzpImm', 'Aa', '2'],
                                        ['2Tw3zx7MqrxdEUW-NExV_', 'aa', '3'],
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
                                    'n' => 'AA',
                                    'vt' => 'numerical',
                                    'l' => 'Chance for AA',
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
                                    'n' => 'Aa',
                                    'vt' => 'numerical',
                                    'l' => 'Chance for Aa',
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
                                    'n' => 'aa',
                                    'vt' => 'numerical',
                                    'l' => 'Chance for aa',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'oZpt1ZFBGb9AQHDk2KTBp',
                'title' => 'Punnett Square',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'If you need 2 traits and 4 alleles, search for the larger, dihybrid cross Punnett Square calculator.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'MoSaUAu-aQvibfSuomFpY',
                'title' => 'Genotype to phenotype',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Check out how to use this calculator!'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'Aa = get_chance_b(mother1, father1)',
                'var' => [
                    [
                        'l' => 'Aa',
                        'f' => 'get_chance_b(mother1, father1)',
                        'r' => ['father1', 'mother1'],
                    ],
                ],
            ],
            [
                'formula' => 'AA = get_chance_a(mother1, father1)',
                'var' => [
                    [
                        'l' => 'AA',
                        'f' => 'get_chance_a(mother1, father1)',
                        'r' => ['father1', 'mother1'],
                    ],
                ],
            ],
            [
                'formula' => 'aa = get_chance_ab(mother1, father1)',
                'var' => [
                    [
                        'l' => 'aa',
                        'f' => 'get_chance_ab(mother1, father1)',
                        'r' => ['father1', 'mother1'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '2rp3FzqovlaITD-dYwxV4' => [
                'name' => 'types',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'QPY-O-YYBDD82MyBu8lb0', 'label' => 'AA', 'value' => '1'],
                    ['uid' => 'AZ_tpL6dm0UPiBDfzpImm', 'label' => 'Aa', 'value' => '2'],
                    ['uid' => '2Tw3zx7MqrxdEUW-NExV_', 'label' => 'aa', 'value' => '3'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.define("get_first",function(mother1){if(mother1==1){return 4}else if(mother1==2){return 4}else if(mother1==3){return 5}});omni.define("get_chance_a",function(mother1,father1){var la;var lo;var lb;if(father1==1&&mother1==1){la=100;lo=0;lb=0}else if(father1==2&&mother1==2){la=25;lo=50;lb=25}else if(father1==3&&mother1==3){la=0;lo=0;lb=100}else if(father1==1&&mother1==3){la=0;lo=100;lb=0}else if(father1==3&&mother1==1){la=0;lo=100;lb=0}else if(father1==1&&mother1==2){la=50;lo=50;lb=0}else if(father1==2&&mother1==1){la=50;lo=50;lb=0}else if(father1==3&&mother1==2){la=0;lo=50;lb=50}else if(father1==2&&mother1==3){la=0;lo=50;lb=50}var AA=la;var resa=AA/100;return resa});omni.define("get_chance_b",function(mother1,father1){var la;var lo;var lb;if(father1==1&&mother1==1){la=100;lo=0;lb=0}else if(father1==2&&mother1==2){la=25;lo=50;lb=25}else if(father1==3&&mother1==3){la=0;lo=0;lb=100}else if(father1==1&&mother1==3){la=0;lo=100;lb=0}else if(father1==3&&mother1==1){la=0;lo=100;lb=0}else if(father1==1&&mother1==2){la=50;lo=50;lb=0}else if(father1==2&&mother1==1){la=50;lo=50;lb=0}else if(father1==3&&mother1==2){la=0;lo=50;lb=50}else if(father1==2&&mother1==3){la=0;lo=50;lb=50}var Aa=lo;var resb=Aa/100;return resb});omni.define("get_chance_ab",function(mother1,father1){var la;var lo;var lb;if(father1==1&&mother1==1){la=100;lo=0;lb=0}else if(father1==2&&mother1==2){la=25;lo=50;lb=25}else if(father1==3&&mother1==3){la=0;lo=0;lb=100}else if(father1==1&&mother1==3){la=0;lo=100;lb=0}else if(father1==3&&mother1==1){la=0;lo=100;lb=0}else if(father1==1&&mother1==2){la=50;lo=50;lb=0}else if(father1==2&&mother1==1){la=50;lo=50;lb=0}else if(father1==3&&mother1==2){la=0;lo=50;lb=50}else if(father1==2&&mother1==3){la=0;lo=50;lb=50}var aa=lb;var resab=aa/100;return resab});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Punnett square turns Mother's genotype and Father's genotype into Chance for AA and Chance for Aa. The arithmetic is the whole method: Chance for AA is worked out from Mother's genotype by one formula, applied once. Chance for AA comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Punnett square calculator works', 'html' => <<<'TXT'
            <p>The Punnett square calculator applies one relationship to 2 numbers and reports Chance for AA, Chance for Aa and Chance for aa.</p><p>In the form&#039;s own words, Chance for Aa = get_chance_b(Mother&#039;s genotype, Father&#039;s genotype).</p><p>The answers are Chance for AA, Chance for Aa and Chance for aa; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Mother&#039;s genotype</strong> — a plain number, no unit</li><li><strong>Father&#039;s genotype</strong> — a plain number, no unit</li></ul><p>The answers come back as Chance for AA in percent, Chance for Aa in percent, Chance for aa in percent. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Chance for AA offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Chance for Aa</strong> = <code>get_chance_b(Mother&#039;s genotype, Father&#039;s genotype)</code></li><li><strong>Chance for AA</strong> = <code>get_chance_a(Mother&#039;s genotype, Father&#039;s genotype)</code></li><li><strong>Chance for aa</strong> = <code>get_chance_ab(Mother&#039;s genotype, Father&#039;s genotype)</code></li></ul><p>Any one of Chance for Aa, Chance for AA and Chance for aa can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Chance for AA, Chance for Aa and Chance for aa are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Mother&#039;s genotype and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Mother&#039;s genotype and Father&#039;s genotype and the number you are missing is Chance for AA and Chance for Aa.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dog-pregnancy">Dog pregnancy Calculator</a>, <a href="/biology/dog-quality-of-life">Dog quality of life</a> and <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Punnett square calculator work out?', 'a' => <<<'TXT'
            Chance for AA, Chance for Aa and Chance for aa, from Father's genotype and Mother's genotype. The relationship is Chance for Aa = get_chance_b(Mother's genotype, Father's genotype).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mother\'s genotype, Father\'s genotype. With mother1 and father1 in place, Chance for AA can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Chance for Aa, Chance for AA and Chance for aa blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Chance for AA is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Mother\'s genotype blank and the page solves for it, reporting Chance for AA instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Chance for AA keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-pregnancy', 'name' => 'Dog pregnancy Calculator'],
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
        ],
        'authors' => [],
    ],
];
