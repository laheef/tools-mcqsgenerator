<?php

/**
 * Trihybrid cross Punnett square
 * /biology/trihybrid-cross-punnett-square
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Trihybrid cross Punnett square',
    'meta' => ['title' => 'Trihybrid cross Punnett square: Steps & Units', 'description' => 'Trihybrid cross Punnett square works out AABBCC and AABBCc and reports both. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Trihybrid cross Punnett square Calculator', 'updated' => '2025-02-06'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'A, B, C — Dominant alleles a, b, c — Recessive alleles'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Mother\'s traits',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'mother1',
                            'label' => 'Trait 1',
                            'type' => 'select',
                            'options' => ['AA' => '0', 'Aa' => '1', 'aa' => '2'],
                            'dataset' => 'Trait A DS',
                            'default' => 'Aa',
                        ],
                        [
                            'name' => 'mother2',
                            'label' => 'Trait 2',
                            'type' => 'select',
                            'options' => ['BB' => '0', 'Bb' => '1', 'bb' => '2'],
                            'dataset' => 'Trait B DS',
                            'default' => 'Bb',
                        ],
                        [
                            'name' => 'mother3',
                            'label' => 'Trait 3',
                            'type' => 'select',
                            'options' => ['CC' => '0', 'Cc' => '1', 'cc' => '2'],
                            'dataset' => 'Trait C DS',
                            'default' => 'Cc',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Father\'s traits',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'father1',
                            'label' => 'Trait 1',
                            'type' => 'select',
                            'options' => ['AA' => '0', 'Aa' => '1', 'aa' => '2'],
                            'dataset' => 'Trait A DS',
                            'default' => 'Aa',
                        ],
                        [
                            'name' => 'father2',
                            'label' => 'Trait 2',
                            'type' => 'select',
                            'options' => ['BB' => '0', 'Bb' => '1', 'bb' => '2'],
                            'dataset' => 'Trait B DS',
                            'default' => 'Bb',
                        ],
                        [
                            'name' => 'father3',
                            'label' => 'Trait 3',
                            'type' => 'select',
                            'options' => ['CC' => '0', 'Cc' => '1', 'cc' => '2'],
                            'dataset' => 'Trait C DS',
                            'default' => 'Cc',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Offspring genotype frequency',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'AABBCC',
                            'label' => 'AABBCC',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'AABBCc',
                            'label' => 'AABBCc',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'AABBcc',
                            'label' => 'AABBcc',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'AABbCC',
                            'label' => 'AABbCC',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'AABbCc',
                            'label' => 'AABbCc',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'AABbcc',
                            'label' => 'AABbcc',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'AAbbCC',
                            'label' => 'AAbbCC',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'AAbbCc',
                            'label' => 'AAbbCc',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'AAbbcc',
                            'label' => 'AAbbcc',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'AaBBCC',
                            'label' => 'AaBBCC',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'AaBBCc',
                            'label' => 'AaBBCc',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'AaBBcc',
                            'label' => 'AaBBcc',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'AaBbCC',
                            'label' => 'AaBbCC',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'AaBbCc',
                            'label' => 'AaBbCc',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'AaBbcc',
                            'label' => 'AaBbcc',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'AabbCC',
                            'label' => 'AabbCC',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'AabbCc',
                            'label' => 'AabbCc',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'Aabbcc',
                            'label' => 'Aabbcc',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'aaBBCC',
                            'label' => 'aaBBCC',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'aaBBCc',
                            'label' => 'aaBBCc',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'aaBBcc',
                            'label' => 'aaBBcc',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'aaBbCC',
                            'label' => 'aaBbCC',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'aaBbCc',
                            'label' => 'aaBbCc',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'aaBbcc',
                            'label' => 'aaBbcc',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'aabbCC',
                            'label' => 'aabbCC',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'aabbCc',
                            'label' => 'aabbCc',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'aabbcc',
                            'label' => 'aabbcc',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Punnett square',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Try out the regular Punnett square calculator or the dihybrid cross version!&nbsp;'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'AABBCC = get_chance_a(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['AABBCC' => 'get_chance_a(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'AABbCC = get_chance_b(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['AABbCC' => 'get_chance_b(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'AaBbCC = get_chance_c(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['AaBbCC' => 'get_chance_c(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'AaBBCC = get_chance_d(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['AaBBCC' => 'get_chance_d(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'AabbCC = get_chance_e(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['AabbCC' => 'get_chance_e(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'AAbbCC = get_chance_f(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['AAbbCC' => 'get_chance_f(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'aaBbCC = get_chance_g(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['aaBbCC' => 'get_chance_g(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'aaBBCC = get_chance_h(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['aaBBCC' => 'get_chance_h(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'aabbCC = get_chance_i(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['aabbCC' => 'get_chance_i(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'AABBcc = get_chance_j(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['AABBcc' => 'get_chance_j(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'AABbcc = get_chance_k(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['AABbcc' => 'get_chance_k(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'AaBbcc = get_chance_l(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['AaBbcc' => 'get_chance_l(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'AaBBcc = get_chance_m(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['AaBBcc' => 'get_chance_m(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'Aabbcc = get_chance_n(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['Aabbcc' => 'get_chance_n(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'AAbbcc = get_chance_o(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['AAbbcc' => 'get_chance_o(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'aaBbcc = get_chance_p(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['aaBbcc' => 'get_chance_p(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'aaBBcc = get_chance_r(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['aaBBcc' => 'get_chance_r(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'aabbcc = get_chance_s(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['aabbcc' => 'get_chance_s(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'AABBCc = get_chance_t(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['AABBCc' => 'get_chance_t(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'AABbCc = get_chance_w(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['AABbCc' => 'get_chance_w(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'AaBbCc = get_chance_u(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['AaBbCc' => 'get_chance_u(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'AaBBCc = get_chance_y(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['AaBBCc' => 'get_chance_y(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'AabbCc = get_chance_x(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['AabbCc' => 'get_chance_x(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'AAbbCc = get_chance_z(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['AAbbCc' => 'get_chance_z(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'aaBbCc = get_chance_zz(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['aaBbCc' => 'get_chance_zz(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'aaBBCc = get_chance_zzz(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['aaBBCc' => 'get_chance_zzz(mother1, father1, mother2, father2, mother3, father3)'],
        ],
        [
            'title' => 'aabbCc = get_chance_zzzz(mother1, father1, mother2, father2, mother3, father3)',
            'results' => ['aabbCc' => 'get_chance_zzzz(mother1, father1, mother2, father2, mother3, father3)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";function get_chance(sequence,mother1,father1,mother2,father2,mother3,father3){var mother_a=mother1==0?"AA":mother1==1?"Aa":"aa";var mother_b=mother2==0?"BB":mother2==1?"Bb":"bb";var mother_c=mother3==0?"CC":mother3==1?"Cc":"cc";var father_a=father1==0?"AA":father1==1?"Aa":"aa";var father_b=father2==0?"BB":father2==1?"Bb":"bb";var father_c=father3==0?"CC":father3==1?"Cc":"cc";var combinationsMother=getAllCombinations(mother_a,mother_b,mother_c);var combinationsFather=getAllCombinations(father_a,father_b,father_c);var parentsCombined=combineParents(combinationsMother,combinationsFather);var parentsCombined2=cleanOutput(parentsCombined);var probability=getProbabilityOfEach(parentsCombined2);var temp=0;for(var i=0;i<parentsCombined2.length;i++){for(var j=0;j<parentsCombined2[i].length;j++){if(parentsCombined2[i][j]===sequence){temp=probability[i][j]}else if(parentsCombined2[i][j]===null){temp=0}}}return temp}omni.define("get_chance_a",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("AABBCC",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_b",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("AABbCC",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_c",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("AaBbCC",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_d",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("AaBBCC",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_e",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("AabbCC",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_f",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("AAbbCC",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_g",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("aaBbCC",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_h",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("aaBBCC",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_i",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("aabbCC",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_j",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("AABBcc",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_k",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("AABbcc",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_l",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("AaBbcc",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_m",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("AaBBcc",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_n",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("Aabbcc",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_o",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("AAbbcc",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_p",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("aaBbcc",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_r",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("aaBBcc",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_s",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("aabbcc",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_t",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("AABBCc",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_w",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("AABbCc",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_u",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("AaBbCc",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_y",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("AaBBCc",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_x",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("AabbCc",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_z",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("AAbbCc",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_zz",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("aaBbCc",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_zzz",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("aaBBCc",mother1,father1,mother2,father2,mother3,father3)});omni.define("get_chance_zzzz",function(mother1,father1,mother2,father2,mother3,father3){return get_chance("aabbCc",mother1,father1,mother2,father2,mother3,father3)});function getAllCombinations(trait1,trait2,trait3){var allCombinations=[];for(var a=0;a<trait1.length;a++){for(var b=0;b<trait1.length;b++){for(var c=0;c<trait1.length;c++){allCombinations.push(trait1[a]+trait2[b]+trait3[c])}}}return allCombinations}function combineParents(father,mother){var parentsCombined=[];var tempArray=[];for(var a=0;a<mother.length;a++){for(var b=0;b<father.length;b++){tempArray.push(mother[a]+father[b])}}for(var i=0;i<tempArray.length;i++){parentsCombined.push(tempArray.splice(0,8))}return parentsCombined}function getProbabilityOfEach(combinations){var probabilityOfCombination=[];var tempArray=[];for(var i=0;i<combinations.length;i++){for(var j=0;j<combinations[i].length;j++){tempArray.push(getOccurrence(combinations,combinations[i][j])/64*100)}}for(var k=0;k<tempArray.length;k++){probabilityOfCombination.push(tempArray.splice(0,8))}return probabilityOfCombination}function caseSensitiveSort(firstElement,secondElement){var x=firstElement.toLowerCase(),y=secondElement.toLowerCase();if(x<y){return-1}if(y<x){return 1}if(firstElement<secondElement){return-1}if(secondElement<firstElement){return 1}return 0}function cleanOutput(rawData){var tempArray=[];var fixedData=[];for(var i=0;i<rawData.length;i++){for(var j=0;j<rawData[i].length;j++){tempArray.push(rawData[i][j].split("").sort(caseSensitiveSort).join(""))}}for(var k=0;k<tempArray.length;k++){fixedData.push(tempArray.splice(0,8))}return fixedData}function getOccurrence(array,value){var count=0;for(var i=0;i<array.length;i++){for(var j=0;j<array[i].length;j++){if(array[i][j]===value){count++}}}return count}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Trihybrid cross Punnett square takes Trait 1, Trait 2 and Trait 3 and returns AABBCC and AABBCc. There is no hidden constant here: change AABBCC and trait 1 moves with it. The main result, AABBCC, is reported in %.
        TXT,
        'sections' => [
            ['title' => 'How the Trihybrid cross Punnett square calculator works', 'html' => <<<'TXT'
            <p>The Trihybrid cross Punnett square calculator applies one relationship to 6 numbers and reports AABBCC, AABBCc and AABBcc.</p><p>Written with the labels from the form, AABBCC = get_chance_a(Trait 1, Trait 1, Trait 2, Trait 2, Trait 3, Trait 3).</p><p>What comes back is AABBCC, AABBCc, AABBcc and AABbCC — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs.</p><ul><li><strong>Trait 1</strong> — a plain number, no unit</li><li><strong>Trait 2</strong> — a plain number, no unit</li><li><strong>Trait 3</strong> — a plain number, no unit</li><li><strong>Trait 1</strong> — a plain number, no unit</li><li><strong>Trait 2</strong> — a plain number, no unit</li><li><strong>Trait 3</strong> — a plain number, no unit</li></ul><p>The result boxes are AABBCC in %, AABBCc in %, AABBcc in %, AABbCC in %, AABbCc in %, AABbcc in %, AAbbCC in %, AAbbCc in %, AAbbcc in %, AaBBCC in %, AaBBCc in %, AaBBcc in %, AaBbCC in %, AaBbCc in %, AaBbcc in %, AabbCC in %, AabbCc in %, Aabbcc in %, aaBBCC in %, aaBBCc in %, aaBBcc in %, aaBbCC in %, aaBbCc in %, aaBbcc in %, aabbCC in %, aabbCc in %, aabbcc in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: AABBCC takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>AABBCC</strong> = <code>get_chance_a(Trait 1, Trait 1, Trait 2, Trait 2, Trait 3, Trait 3)</code></li><li><strong>AABbCC</strong> = <code>get_chance_b(Trait 1, Trait 1, Trait 2, Trait 2, Trait 3, Trait 3)</code></li><li><strong>AaBbCC</strong> = <code>get_chance_c(Trait 1, Trait 1, Trait 2, Trait 2, Trait 3, Trait 3)</code></li><li><strong>AaBBCC</strong> = <code>get_chance_d(Trait 1, Trait 1, Trait 2, Trait 2, Trait 3, Trait 3)</code></li><li><strong>AabbCC</strong> = <code>get_chance_e(Trait 1, Trait 1, Trait 2, Trait 2, Trait 3, Trait 3)</code></li><li><strong>AAbbCC</strong> = <code>get_chance_f(Trait 1, Trait 1, Trait 2, Trait 2, Trait 3, Trait 3)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>AABBCC</strong> = <code>get_chance_a(Trait 1, Trait 1, Trait 2, Trait 2, Trait 3, Trait 3)</code> — the form to use when Trait 1, Trait 1, Trait 2 and Trait 2 are the values you have.</li><li><strong>AABbCC</strong> = <code>get_chance_b(Trait 1, Trait 1, Trait 2, Trait 2, Trait 3, Trait 3)</code> — the form to use when Trait 1, Trait 1, Trait 2 and Trait 2 are the values you have.</li><li><strong>AaBbCC</strong> = <code>get_chance_c(Trait 1, Trait 1, Trait 2, Trait 2, Trait 3, Trait 3)</code> — the form to use when Trait 1, Trait 1, Trait 2 and Trait 2 are the values you have.</li><li><strong>AaBBCC</strong> = <code>get_chance_d(Trait 1, Trait 1, Trait 2, Trait 2, Trait 3, Trait 3)</code> — the form to use when Trait 1, Trait 1, Trait 2 and Trait 2 are the values you have.</li><li><strong>AabbCC</strong> = <code>get_chance_e(Trait 1, Trait 1, Trait 2, Trait 2, Trait 3, Trait 3)</code> — the form to use when Trait 1, Trait 1, Trait 2 and Trait 2 are the values you have.</li><li><strong>AAbbCC</strong> = <code>get_chance_f(Trait 1, Trait 1, Trait 2, Trait 2, Trait 3, Trait 3)</code> — the form to use when Trait 1, Trait 1, Trait 2 and Trait 2 are the values you have.</li><li><strong>aaBbCC</strong> = <code>get_chance_g(Trait 1, Trait 1, Trait 2, Trait 2, Trait 3, Trait 3)</code> — the form to use when Trait 1, Trait 1, Trait 2 and Trait 2 are the values you have.</li><li><strong>aaBBCC</strong> = <code>get_chance_h(Trait 1, Trait 1, Trait 2, Trait 2, Trait 3, Trait 3)</code> — the form to use when Trait 1, Trait 1, Trait 2 and Trait 2 are the values you have.</li></ul><p>Any one of AABBCC, AABbCC and AaBbCC can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with AABBCC, AABBCc and AABBcc are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Trait 1 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Trait 1 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Trait 2 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Trait 2 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Trait 3 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Trait 3 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Trait 1 and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Trait 1</strong> takes a plain number with no unit attached. It feeds AABBCC, AABbCC and AaBbCC. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Trait 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Trait 2</strong> takes a plain number with no unit attached. It feeds AABBCC, AABbCC and AaBbCC. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Trait 2 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Trait 3</strong> takes a plain number with no unit attached. It feeds AABBCC, AABbCC and AaBbCC. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Trait 3 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Trait 1</strong> takes a plain number with no unit attached. It feeds AABBCC, AABbCC and AaBbCC. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Trait 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Trait 2</strong> takes a plain number with no unit attached. It feeds AABBCC, AABbCC and AaBbCC. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Trait 2 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Trait 3</strong> takes a plain number with no unit attached. It feeds AABBCC, AABbCC and AaBbCC. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Trait 3 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Trait 1, Trait 2, Trait 3 and Trait 1. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Trait 1 into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare AABBCC in % with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> AABBCC follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Trait 1, Trait 2 and Trait 3 are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Trait 1, Trait 2 and Trait 3 is what you already know and AABBCC and AABBCc is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Trihybrid cross Punnett square calculator work out?', 'a' => <<<'TXT'
            AABBCC, AABBCc, AABBcc and AABbCC, from Trait 1, Trait 1, Trait 2 and Trait 2. The relationship is AABBCC = get_chance_a(Trait 1, Trait 1, Trait 2, Trait 2, Trait 3, Trait 3).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Trait 1, Trait 2, Trait 3, Trait 1, Trait 2. With trait 1, trait 2 and trait 3 in place, AABBCC can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of AABBCC, AABbCC, AaBbCC and AaBBCC blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            AABBCC is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Trait 1 left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of AABBCC keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/cephalexin-for-dogs-dosage', 'name' => 'Cephalexin for dogs dosage Calculator'],
            ['path' => '/biology/cephalic-index', 'name' => 'Cephalic Index Calculator'],
            ['path' => '/biology/cfu-g-calculator', 'name' => 'CFU/g Calculator'],
        ],
        'authors' => [],
    ],
];
