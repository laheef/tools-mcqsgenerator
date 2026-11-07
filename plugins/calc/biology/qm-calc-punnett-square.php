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
    'meta' => ['title' => 'Punnett square Calculator — Formula & Results', 'description' => 'The Punnett square calculator takes the numbers you enter and reports <strong>chance for Aa</strong> immediately. The results leave the screen the moment you…', 'h1' => 'Punnett square Calculator', 'updated' => '2026-07-31'],
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
        The Punnett square calculator takes the numbers you enter and reports <strong>chance for Aa</strong> immediately. 
        
         The results leave the screen the moment you edit a field; press Calculate and they come back updated, so a single changed input shows its own effect.
        TXT,
        'sections' => [
            ['title' => 'How does the Punnett square calculator work?', 'html' => <<<'TXT'
            <p>The Punnett square calculator takes the values in the form, applies the relationship described below and reports <strong>chance for Aa</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the mother's genotype and the father's genotype).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 3 options, such as AA, aa and aa. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 3 options, such as AA, aa and aa. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Mother's genotype</strong></td><td>One of 3 options, such as AA, aa and aa.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Father's genotype</strong></td><td>One of 3 options, such as AA, aa and aa.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Chance for AA</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Chance for Aa</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Chance for aa</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Punnett square calculator', 'html' => <<<'TXT'
            <p>One relationship drives the whole page:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Chance for Aa</span><span class="formula-eq">=</span><span class="formula-rhs">(mother&#x27;s genotype, father&#x27;s genotype)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>%, opening in percent</li><li>%, opening in percent</li><li>%, opening in percent</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Punnett square calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Punnett square calculator, these are the ones that matter:</p>
            <ul><li>The 2 drop-downs on this page offer a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — mother's genotype for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/qpcr-efficiency">qPCR efficiency</a>, <a href="/biology/rabbit-cage-size">Rabbit cage size</a> and <a href="/biology/rabbit-color">Rabbit color</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Punnett square calculator work out?', 'a' => <<<'TXT'
            It returns chance for Aa. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Punnett square calculator?', 'a' => <<<'TXT'
            The form asks for a few values, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter chance for AA in a different unit?', 'a' => <<<'TXT'
            Yes. Chance for AA opens in percent and the chip beside it offers 6 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (2 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Punnett square calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/qpcr-efficiency', 'name' => 'qPCR efficiency'],
            ['path' => '/biology/rabbit-cage-size', 'name' => 'Rabbit cage size'],
            ['path' => '/biology/rabbit-color', 'name' => 'Rabbit color'],
        ],
    ],
];
