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
    'meta' => ['title' => 'Dihybrid cross Punnett square — Formula & Results', 'description' => <<<'TXT'
    Dihybrid cross Punnett square turns Trait 1, Trait 2 and Trait 1 into AABB and AABb. If Trait 1 is unknown, solve for it instead of estimating it — leave it…
    TXT, 'h1' => 'Dihybrid cross Punnett square Calculator', 'updated' => '2025-02-06'],
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
        Dihybrid cross Punnett square turns Trait 1, Trait 2 and Trait 1 into AABB and AABb. There is no hidden constant here: change AABB and Trait 1 moves with it. The main result, AABB, is reported in %.
        TXT,
        'sections' => [
            ['title' => 'How the Dihybrid cross Punnett square calculator works', 'html' => <<<'TXT'
            <p>Dihybrid cross Punnett square answers one question from 4 numbers, and the answer is AABB, AABb and AAbb.</p><p>In the form&#039;s own words, AABB = get_chance_a(Trait 1, Trait 1, Trait 2, Trait 2).</p><p>What comes back is AABB, AABb, AAbb and AaBB — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Trait 1</strong> — a plain number, no unit</li><li><strong>Trait 2</strong> — a plain number, no unit</li><li><strong>Trait 1</strong> — a plain number, no unit</li><li><strong>Trait 2</strong> — a plain number, no unit</li></ul><p>What you get back is AABB in %, AABb in %, AAbb in %, AaBB in %, AaBb in %, Aabb in %, aaBB in %, aaBb in %, aabb in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: AABB takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>AABB</strong> = <code>get_chance_a(Trait 1, Trait 1, Trait 2, Trait 2)</code></li><li><strong>AABb</strong> = <code>get_chance_b(Trait 1, Trait 1, Trait 2, Trait 2)</code></li><li><strong>AAbb</strong> = <code>get_chance_c(Trait 1, Trait 1, Trait 2, Trait 2)</code></li><li><strong>AaBB</strong> = <code>get_chance_d(Trait 1, Trait 1, Trait 2, Trait 2)</code></li><li><strong>AaBb</strong> = <code>get_chance_e(Trait 1, Trait 1, Trait 2, Trait 2)</code></li><li><strong>Aabb</strong> = <code>get_chance_f(Trait 1, Trait 1, Trait 2, Trait 2)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>AABB</strong> = <code>get_chance_a(Trait 1, Trait 1, Trait 2, Trait 2)</code> — the form to use when Trait 1, Trait 2, Trait 1 and Trait 2 are the values you have.</li><li><strong>AABb</strong> = <code>get_chance_b(Trait 1, Trait 1, Trait 2, Trait 2)</code> — the form to use when Trait 1, Trait 2, Trait 1 and Trait 2 are the values you have.</li><li><strong>AAbb</strong> = <code>get_chance_c(Trait 1, Trait 1, Trait 2, Trait 2)</code> — the form to use when Trait 1, Trait 2, Trait 1 and Trait 2 are the values you have.</li><li><strong>AaBB</strong> = <code>get_chance_d(Trait 1, Trait 1, Trait 2, Trait 2)</code> — the form to use when Trait 1, Trait 2, Trait 1 and Trait 2 are the values you have.</li><li><strong>AaBb</strong> = <code>get_chance_e(Trait 1, Trait 1, Trait 2, Trait 2)</code> — the form to use when Trait 1, Trait 2, Trait 1 and Trait 2 are the values you have.</li><li><strong>Aabb</strong> = <code>get_chance_f(Trait 1, Trait 1, Trait 2, Trait 2)</code> — the form to use when Trait 1, Trait 2, Trait 1 and Trait 2 are the values you have.</li><li><strong>aaBB</strong> = <code>get_chance_g(Trait 1, Trait 1, Trait 2, Trait 2)</code> — the form to use when Trait 1, Trait 2, Trait 1 and Trait 2 are the values you have.</li><li><strong>aaBb</strong> = <code>get_chance_h(Trait 1, Trait 1, Trait 2, Trait 2)</code> — the form to use when Trait 1, Trait 2, Trait 1 and Trait 2 are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of AABB, AABb and AAbb can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with AABB, AABb and AAbb are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Trait 1 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Trait 1 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Trait 2 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Trait 2 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Trait 1 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Trait 1 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Trait 1 is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Trait 1</strong> takes a plain number with no unit attached. It feeds AABB, AABb and AAbb. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Trait 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Trait 2</strong> takes a plain number with no unit attached. It feeds AABB, AABb and AAbb. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Trait 2 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Trait 1</strong> takes a plain number with no unit attached. It feeds AABB, AABb and AAbb. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Trait 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Trait 2</strong> takes a plain number with no unit attached. It feeds AABB, AABb and AAbb. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Trait 2 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>AABB</strong> is a plain number. It is computed from Trait 1, Trait 2, Trait 1 and Trait 2, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>AABb</strong> is a plain number. It is computed from Trait 1, Trait 2, Trait 1 and Trait 2, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>AAbb</strong> is a plain number. It is computed from Trait 1, Trait 2, Trait 1 and Trait 2, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>AaBB</strong> is a plain number. It is computed from Trait 1, Trait 2, Trait 1 and Trait 2, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>AaBb</strong> is a plain number. It is computed from Trait 1, Trait 2, Trait 1 and Trait 2, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Aabb</strong> is a plain number. It is computed from Trait 1, Trait 2, Trait 1 and Trait 2, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>aaBB</strong> is a plain number. It is computed from Trait 1, Trait 2, Trait 1 and Trait 2, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>aaBb</strong> is a plain number. It is computed from Trait 1, Trait 2, Trait 1 and Trait 2, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>aabb</strong> is a plain number. It is computed from Trait 1, Trait 2, Trait 1 and Trait 2, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> AABB follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Trait 1, Trait 2 and Trait 1 are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Trait 1, Trait 2 and Trait 1 is what you already know and AABB and AABb is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/grain-bin">Grain bin Calculator</a>, <a href="/biology/grain-conversion">Grain conversion Calculator</a> and <a href="/biology/grass-seed">Grass seed Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dihybrid cross Punnett square calculator work out?', 'a' => 'AABB, AABb, AAbb and AaBB, from Trait 1, Trait 2, Trait 1 and Trait 2. The relationship is AABB = get_chance_a(Trait 1, Trait 1, Trait 2, Trait 2).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Trait 1, Trait 2, Trait 1, Trait 2. With mother_a, mother_b and father_a in place, AABB can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. AABB, AABb, AAbb and AaBB can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of AABB is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Trait 1 left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. AABB keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/grain-bin', 'name' => 'Grain bin Calculator'],
            ['path' => '/biology/grain-conversion', 'name' => 'Grain conversion Calculator'],
            ['path' => '/biology/grass-seed', 'name' => 'Grass seed Calculator'],
        ],
        'authors' => [],
    ],
];
