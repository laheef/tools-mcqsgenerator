<?php

/**
 * Dihybrid cross Punnett square
 * /biology/dihybrid-cross-punnett-square
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dihybrid cross Punnett square',
    'meta' => ['title' => 'Dihybrid cross Punnett square — Formula & Results', 'description' => 'The Dihybrid cross Punnett square calculator returns <strong>AABB</strong> from the 4 fields on the form. Press Calculate for the answer; change a value and…', 'h1' => 'Dihybrid cross Punnett square Calculator', 'updated' => '2025-02-06'],
    'raw' => [
        'vars' => [
            'father_a' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'WXtB5UGj9rt9keiUSwVdq', 'c' => null],
                ],
                'ds' => 'E9wSfUp609ZBKnaYO2jiJ',
            ],
            'father_b' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'Kg6Tw9Km81SUffJ6V-IO0', 'c' => null],
                ],
                'ds' => 'BMAaA5v-w0oHC9qDXaw8v',
            ],
            'mother_a' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'WXtB5UGj9rt9keiUSwVdq', 'c' => null],
                ],
                'ds' => 'E9wSfUp609ZBKnaYO2jiJ',
            ],
            'mother_b' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'Kg6Tw9Km81SUffJ6V-IO0', 'c' => null],
                ],
                'ds' => 'BMAaA5v-w0oHC9qDXaw8v',
            ],
            'result_AABB' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'result_AABb' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'result_AAbb' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'result_AaBB' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'result_AaBb' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'result_Aabb' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'result_aaBB' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'result_aaBb' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'result_aabb' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => '0bGT5MF6PSFJssT4L557y',
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
                                        [null, 'A, B — Dominant alleles a, b — Recessive alleles'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'FUMgQY1piX8D9QvIsl7d5',
                'title' => 'Mother\'s traits',
                'desc' => '',
                'm' => [
                    [
                        'FR1_FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mother_a',
                                    'vt' => 'valueSelect',
                                    'l' => 'Trait 1',
                                    'ds' => 'E9wSfUp609ZBKnaYO2jiJ',
                                    'opts' => [
                                        ['1oYHsF5CAaeeRd4JKybwU', 'AA', '0'],
                                        ['WXtB5UGj9rt9keiUSwVdq', 'Aa', '1'],
                                        ['k8xyEm9006bQ-gN7nB88Z', 'aa', '2'],
                                    ],
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mother_b',
                                    'vt' => 'valueSelect',
                                    'l' => 'Trait 2',
                                    'ds' => 'BMAaA5v-w0oHC9qDXaw8v',
                                    'opts' => [
                                        ['h122H7KA_cGBqW7GVxf4W', 'BB', '0'],
                                        ['Kg6Tw9Km81SUffJ6V-IO0', 'Bb', '1'],
                                        ['-mms5HLSrASIiHGEj2MdJ', 'bb', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'eqdRGyHVcEeGJ8gr6BzX_',
                'title' => 'Father\'s traits',
                'desc' => '',
                'm' => [
                    [
                        'FR1_FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'father_a',
                                    'vt' => 'valueSelect',
                                    'l' => 'Trait 1',
                                    'ds' => 'E9wSfUp609ZBKnaYO2jiJ',
                                    'opts' => [
                                        ['1oYHsF5CAaeeRd4JKybwU', 'AA', '0'],
                                        ['WXtB5UGj9rt9keiUSwVdq', 'Aa', '1'],
                                        ['k8xyEm9006bQ-gN7nB88Z', 'aa', '2'],
                                    ],
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'father_b',
                                    'vt' => 'valueSelect',
                                    'l' => 'Trait 2',
                                    'ds' => 'BMAaA5v-w0oHC9qDXaw8v',
                                    'opts' => [
                                        ['h122H7KA_cGBqW7GVxf4W', 'BB', '0'],
                                        ['Kg6Tw9Km81SUffJ6V-IO0', 'Bb', '1'],
                                        ['-mms5HLSrASIiHGEj2MdJ', 'bb', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'yDJLI-o91U8LYvARxb8k7',
                'title' => 'Resulting probabilities (%)',
                'desc' => '',
                'm' => [
                    [
                        'FR1_FR1_FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'result_AABB',
                                    'vt' => 'numerical',
                                    'l' => 'AABB',
                                    'suf' => '%',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'result_AABb',
                                    'vt' => 'numerical',
                                    'l' => 'AABb',
                                    'suf' => '%',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'result_AAbb',
                                    'vt' => 'numerical',
                                    'l' => 'AAbb',
                                    'suf' => '%',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1_FR1_FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'result_AaBB',
                                    'vt' => 'numerical',
                                    'l' => 'AaBB',
                                    'suf' => '%',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'result_AaBb',
                                    'vt' => 'numerical',
                                    'l' => 'AaBb',
                                    'suf' => '%',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'result_Aabb',
                                    'vt' => 'numerical',
                                    'l' => 'Aabb',
                                    'suf' => '%',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1_FR1_FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'result_aaBB',
                                    'vt' => 'numerical',
                                    'l' => 'aaBB',
                                    'suf' => '%',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'result_aaBb',
                                    'vt' => 'numerical',
                                    'l' => 'aaBb',
                                    'suf' => '%',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'result_aabb',
                                    'vt' => 'numerical',
                                    'l' => 'aabb',
                                    'suf' => '%',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'LIT97Z-ltKl3QT3qXmN_d',
                'title' => 'Punnett square',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Try out the smaller Punnett square calculator!'],
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
                'formula' => 'result_AABB = get_chance_a(mother_a, father_a, mother_b, father_b)',
                'var' => [
                    [
                        'l' => 'result_AABB',
                        'f' => 'get_chance_a(mother_a, father_a, mother_b, father_b)',
                        'r' => ['father_a', 'father_b', 'mother_a', 'mother_b'],
                    ],
                ],
            ],
            [
                'formula' => 'result_AABb = get_chance_b(mother_a, father_a, mother_b, father_b)',
                'var' => [
                    [
                        'l' => 'result_AABb',
                        'f' => 'get_chance_b(mother_a, father_a, mother_b, father_b)',
                        'r' => ['father_a', 'father_b', 'mother_a', 'mother_b'],
                    ],
                ],
            ],
            [
                'formula' => 'result_AAbb = get_chance_c(mother_a, father_a, mother_b, father_b)',
                'var' => [
                    [
                        'l' => 'result_AAbb',
                        'f' => 'get_chance_c(mother_a, father_a, mother_b, father_b)',
                        'r' => ['father_a', 'father_b', 'mother_a', 'mother_b'],
                    ],
                ],
            ],
            [
                'formula' => 'result_AaBB = get_chance_d(mother_a, father_a, mother_b, father_b)',
                'var' => [
                    [
                        'l' => 'result_AaBB',
                        'f' => 'get_chance_d(mother_a, father_a, mother_b, father_b)',
                        'r' => ['father_a', 'father_b', 'mother_a', 'mother_b'],
                    ],
                ],
            ],
            [
                'formula' => 'result_AaBb = get_chance_e(mother_a, father_a, mother_b, father_b)',
                'var' => [
                    [
                        'l' => 'result_AaBb',
                        'f' => 'get_chance_e(mother_a, father_a, mother_b, father_b)',
                        'r' => ['father_a', 'father_b', 'mother_a', 'mother_b'],
                    ],
                ],
            ],
            [
                'formula' => 'result_Aabb = get_chance_f(mother_a, father_a, mother_b, father_b)',
                'var' => [
                    [
                        'l' => 'result_Aabb',
                        'f' => 'get_chance_f(mother_a, father_a, mother_b, father_b)',
                        'r' => ['father_a', 'father_b', 'mother_a', 'mother_b'],
                    ],
                ],
            ],
            [
                'formula' => 'result_aaBB = get_chance_g(mother_a, father_a, mother_b, father_b)',
                'var' => [
                    [
                        'l' => 'result_aaBB',
                        'f' => 'get_chance_g(mother_a, father_a, mother_b, father_b)',
                        'r' => ['father_a', 'father_b', 'mother_a', 'mother_b'],
                    ],
                ],
            ],
            [
                'formula' => 'result_aaBb = get_chance_h(mother_a, father_a, mother_b, father_b)',
                'var' => [
                    [
                        'l' => 'result_aaBb',
                        'f' => 'get_chance_h(mother_a, father_a, mother_b, father_b)',
                        'r' => ['father_a', 'father_b', 'mother_a', 'mother_b'],
                    ],
                ],
            ],
            [
                'formula' => 'result_aabb = get_chance_i(mother_a, father_a, mother_b, father_b)',
                'var' => [
                    [
                        'l' => 'result_aabb',
                        'f' => 'get_chance_i(mother_a, father_a, mother_b, father_b)',
                        'r' => ['father_a', 'father_b', 'mother_a', 'mother_b'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'E9wSfUp609ZBKnaYO2jiJ' => [
                'name' => 'Allel type A',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '1oYHsF5CAaeeRd4JKybwU', 'label' => 'AA', 'value' => '0'],
                    ['uid' => 'WXtB5UGj9rt9keiUSwVdq', 'label' => 'Aa', 'value' => '1'],
                    ['uid' => 'k8xyEm9006bQ-gN7nB88Z', 'label' => 'aa', 'value' => '2'],
                ],
            ],
            'BMAaA5v-w0oHC9qDXaw8v' => [
                'name' => 'Allel type B',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'h122H7KA_cGBqW7GVxf4W', 'label' => 'BB', 'value' => '0'],
                    ['uid' => 'Kg6Tw9Km81SUffJ6V-IO0', 'label' => 'Bb', 'value' => '1'],
                    ['uid' => '-mms5HLSrASIiHGEj2MdJ', 'label' => 'bb', 'value' => '2'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";var tablResults=[0,0,0,0,0,0,0,0,0];omni.define("get_chance_a",function(mother1,father1,mother2,father2){return get_tablResults(mother1,father1,mother2,father2,0)*100});omni.define("get_chance_b",function(mother1,father1,mother2,father2){return get_tablResults(mother1,father1,mother2,father2,1)*100});omni.define("get_chance_c",function(mother1,father1,mother2,father2){return get_tablResults(mother1,father1,mother2,father2,2)*100});omni.define("get_chance_d",function(mother1,father1,mother2,father2){return get_tablResults(mother1,father1,mother2,father2,3)*100});omni.define("get_chance_e",function(mother1,father1,mother2,father2){return get_tablResults(mother1,father1,mother2,father2,4)*100});omni.define("get_chance_f",function(mother1,father1,mother2,father2){return get_tablResults(mother1,father1,mother2,father2,5)*100});omni.define("get_chance_g",function(mother1,father1,mother2,father2){return get_tablResults(mother1,father1,mother2,father2,6)*100});omni.define("get_chance_h",function(mother1,father1,mother2,father2){return get_tablResults(mother1,father1,mother2,father2,7)*100});omni.define("get_chance_i",function(mother1,father1,mother2,father2){return get_tablResults(mother1,father1,mother2,father2,8)*100});function get_tablResults(mother1,father1,mother2,father2,idx){var tablMother=[0,0];var tablFather=[0,0];tablMother[0]=mother1;tablMother[1]=mother2;tablFather[0]=father1;tablFather[1]=father2;var tablProp=[[[1,0.5,0],[0.5,0.25,0],[0,0,0]],[[0,0.5,1],[0.5,0.5,0.5],[1,0.5,0]],[[0,0,0],[0,0.25,0.5],[0,0.5,1]]];for(var i=0;i<3;i++){for(var j=0;j<3;j++){tablResults[3*i+j]=tablProp[i][tablMother[0]][tablFather[0]]*tablProp[j][tablMother[1]][tablFather[1]]}}return tablResults[idx]}//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Dihybrid cross Punnett square calculator returns <strong>AABB</strong> from the 4 fields on the form. 
        
         Press Calculate for the answer; change a value and it steps off screen until you press again, so each edit can be judged on its own.
        TXT,
        'sections' => [
            ['title' => 'How does the Dihybrid cross Punnett square calculator work?', 'html' => <<<'TXT'
            <p>The Dihybrid cross Punnett square calculator takes the values in the form, applies the relationship described below and reports <strong>AABB</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the trait 1 (Mother's traits), the trait 2 (Mother's traits) and the trait 1 (Father's traits)).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 3 options, such as AA, aa and aa. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 3 options, such as BB, bb and bb. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 3 options, such as AA, aa and aa. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 3 options, such as BB, bb and bb. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li></ul><p>4 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Trait 1 (Mother's traits)</strong></td><td>One of 3 options, such as AA, aa and aa.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Trait 2 (Mother's traits)</strong></td><td>One of 3 options, such as BB, bb and bb.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Trait 1 (Father's traits)</strong></td><td>One of 3 options, such as AA, aa and aa.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Trait 2 (Father's traits)</strong></td><td>One of 3 options, such as BB, bb and bb.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>AABB</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>AABb</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>AAbb</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Aa bb (Resulting probabilities (%))</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Aa bb (Resulting probabilities (%))</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Aabb (Resulting probabilities (%))</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Aa bb (Resulting probabilities (%))</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Aa bb (Resulting probabilities (%))</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Aabb (Resulting probabilities (%))</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Dihybrid cross Punnett square calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Keep the units you enter consistent. </li><li>Round only at the end. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/dna-concentration">DNA concentration</a>, <a href="/biology/dna-copy-number">DNA copy number</a> and <a href="/biology/dna-to-mrna">DNA to mRNA</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dihybrid cross Punnett square calculator work out?', 'a' => <<<'TXT'
            It returns AABB. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Dihybrid cross Punnett square calculator?', 'a' => <<<'TXT'
            The form asks for a few values, which is 4 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (4 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Dihybrid cross Punnett square calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. The calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/dna-concentration', 'name' => 'DNA concentration'],
            ['path' => '/biology/dna-copy-number', 'name' => 'DNA copy number'],
            ['path' => '/biology/dna-to-mrna', 'name' => 'DNA to mRNA'],
        ],
    ],
];
