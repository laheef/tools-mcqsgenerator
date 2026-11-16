<?php

/**
 * Shoelace length
 * /everyday-life/shoelace-length
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Shoelace length',
    'meta' => ['title' => 'Shoelace length Calculator — Formula, Units & Example', 'description' => 'Shoelace length turns pattern and eyelet pairs into total shoelace length. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Shoelace length Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pattern',
                            'label' => 'Pattern',
                            'type' => 'select',
                            'options' => [
                                'Basic criss-cross' => '1',
                                'Criss-cross helix' => '2',
                                'Over under' => '3',
                                'Straight bar' => '4',
                                'Sawtooth' => '5',
                                'Train track' => '6',
                                'Starburst' => '7',
                            ],
                            'dataset' => 'patterns',
                            'control' => 'DROPDOWN',
                            'help' => 'Some of the most famous shoelace lacing patterns around.',
                            'default' => 'Basic criss-cross',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'shoelaces/pattern1.png'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_eyelet_pairs',
                            'label' => 'Eyelet pairs',
                            'type' => 'select',
                            'options' => [
                                '3 pairs' => '3',
                                '4 pairs' => '4',
                                '5 pairs' => '5',
                                '6 pairs' => '6',
                                '7 pairs' => '7',
                                '8 pairs' => '8',
                                '9 pairs' => '9',
                            ],
                            'dataset' => 'eyelet pair count',
                            'control' => 'DROPDOWN',
                            'help' => 'Number of pair of eyelets your shoe has that you want to use in the pattern.',
                            'default' => '6 pairs',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hSpacing',
                            'label' => 'Horizontal spacing',
                            'type' => 'number',
                            'help' => 'Center-to-center distance between the left and right eyelets.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'vSpacing',
                            'label' => 'Vertical spacing',
                            'type' => 'number',
                            'help' => 'Center-to-center distance between two eyelets on the same side of the shoe.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ends',
                            'label' => 'Free-end length',
                            'type' => 'number',
                            'help' => 'Length of the rest of the shoelace from the last eyelet it passed through.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total',
                            'label' => 'Total shoelace length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total123',
                            'label' => 'Shoelace length without ends',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total4',
                            'label' => 'Shoelace length without ends',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total5',
                            'label' => 'Shoelace length without ends',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total6',
                            'label' => 'Shoelace length without ends',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total7',
                            'label' => 'Shoelace length without ends',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'sb4',
                            'label' => 'Sb4',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'sb5',
                            'label' => 'Sb5',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'sb6',
                            'label' => 'Sb6',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'sb7',
                            'label' => 'Sb7',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'sb8',
                            'label' => 'Sb8',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'sb9',
                            'label' => 'Sb9',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'm123',
                            'label' => 'M123',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'm4',
                            'label' => 'M4',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'm5',
                            'label' => 'M5',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'm6',
                            'label' => 'M6',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'm7',
                            'label' => 'M7',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'total123 = hSpacing + sqrt(hSpacing ^ 2 + vSpacing ^ 2) * 2 * (number_of_eyelet_pairs - 1)',
            'results' => ['hSpacing' => <<<'TXT'
            (2*number_of_eyelet_pairs*sqrt(-4*pow(number_of_eyelet_pairs, 2)*pow(vSpacing, 2) + 8*number_of_eyelet_pairs*pow(vSpacing, 2) + pow(total123, 2) - 3*pow(vSpacing, 2)) - total123 - 2*sqrt(-4*pow(number_of_eyelet_pairs, 2)*pow(vSpacing, 2) + 8*number_of_eyelet_pairs*pow(vSpacing, 2) + pow(total123, 2) - 3*pow(vSpacing, 2)))/(4*pow(number_of_eyelet_pairs, 2) - 8*number_of_eyelet_pairs + 3)
            TXT, 'vSpacing' => <<<'TXT'
            (1/2)*sqrt(-(2*hSpacing*(number_of_eyelet_pairs - 1) - hSpacing + total123)*(2*hSpacing*(number_of_eyelet_pairs - 1) + hSpacing - total123)/pow(number_of_eyelet_pairs - 1, 2))
            TXT, 'number_of_eyelet_pairs' => '(1/2)*(-hSpacing + total123 + 2*sqrt(pow(hSpacing, 2) + pow(vSpacing, 2)))/sqrt(pow(hSpacing, 2) + pow(vSpacing, 2))', 'total123' => 'hSpacing + 2*number_of_eyelet_pairs*sqrt(pow(hSpacing, 2) + pow(vSpacing, 2)) - 2*sqrt(pow(hSpacing, 2) + pow(vSpacing, 2))'],
        ],
        [
            'title' => 'total4 = (number_of_eyelet_pairs - 1 + mod(number_of_eyelet_pairs,2)) * hSpacing + 2 * (number_of_eyelet_pairs - 1) * vSpacing',
            'results' => ['total4' => 'hSpacing*number_of_eyelet_pairs + hSpacing*mod(number_of_eyelet_pairs, 2) - hSpacing + 2*number_of_eyelet_pairs*vSpacing - 2*vSpacing', 'hSpacing' => '(-2*number_of_eyelet_pairs*vSpacing + total4 + 2*vSpacing)/(number_of_eyelet_pairs + mod(number_of_eyelet_pairs, 2) - 1)', 'vSpacing' => '(1/2)*(-hSpacing*number_of_eyelet_pairs - hSpacing*mod(number_of_eyelet_pairs, 2) + hSpacing + total4)/(number_of_eyelet_pairs - 1)'],
        ],
        [
            'title' => 'total5 = (number_of_eyelet_pairs - 1) * hSpacing + 2 * vSpacing + (number_of_eyelet_pairs - 2) * sqrt(hSpacing ^ 2 + (2 * vSpacing) ^ 2)',
            'results' => ['hSpacing' => <<<'TXT'
            ((number_of_eyelet_pairs - 2)*sqrt(8*number_of_eyelet_pairs*pow(vSpacing, 2) + pow(total5, 2) - 4*total5*vSpacing - 8*pow(vSpacing, 2)) + (number_of_eyelet_pairs - 1)*(total5 - 2*vSpacing))/(2*number_of_eyelet_pairs - 3)
            TXT, 'total5' => <<<'TXT'
            hSpacing*number_of_eyelet_pairs - hSpacing + number_of_eyelet_pairs*sqrt(pow(hSpacing, 2) + 4*pow(vSpacing, 2)) + 2*vSpacing - 2*sqrt(pow(hSpacing, 2) + 4*pow(vSpacing, 2))
            TXT, 'vSpacing' => <<<'TXT'
            (1/2)*((number_of_eyelet_pairs - 3)*(number_of_eyelet_pairs - 2)*(number_of_eyelet_pairs - 1)*sqrt(2*pow(hSpacing, 2)*number_of_eyelet_pairs - 2*pow(hSpacing, 2) - 2*hSpacing*number_of_eyelet_pairs*total5 + 2*hSpacing*total5 + pow(total5, 2)) - (pow(number_of_eyelet_pairs, 2) - 4*number_of_eyelet_pairs + 3)*(-hSpacing*number_of_eyelet_pairs + hSpacing + total5))/((number_of_eyelet_pairs - 3)*(number_of_eyelet_pairs - 1)*(pow(number_of_eyelet_pairs, 2) - 4*number_of_eyelet_pairs + 3))
            TXT, 'number_of_eyelet_pairs' => '(hSpacing + total5 - 2*vSpacing + 2*sqrt(pow(hSpacing, 2) + 4*pow(vSpacing, 2)))/(hSpacing + sqrt(pow(hSpacing, 2) + 4*pow(vSpacing, 2)))'],
        ],
        [
            'title' => 'total6 = (2 * (number_of_eyelet_pairs - 1) - 1) * hSpacing + (2 * ( number_of_eyelet_pairs - 1)) * vSpacing',
            'results' => ['number_of_eyelet_pairs' => '((3/2)*hSpacing + (1/2)*total6 + vSpacing)/(hSpacing + vSpacing)', 'vSpacing' => '(1/2)*(-2*hSpacing*number_of_eyelet_pairs + 3*hSpacing + total6)/(number_of_eyelet_pairs - 1)', 'total6' => '2*hSpacing*number_of_eyelet_pairs - 3*hSpacing + 2*number_of_eyelet_pairs*vSpacing - 2*vSpacing', 'hSpacing' => '(-2*number_of_eyelet_pairs*vSpacing + total6 + 2*vSpacing)/(2*number_of_eyelet_pairs - 3)'],
        ],
        [
            'title' => <<<'TXT'
            total7 = hSpacing + 2*(vSpacing*(1+sb4+sb6+sb8) + sqrt(hSpacing^2+(2*vSpacing)^2) + (sqrt(hSpacing^2+(4*vSpacing)^2))*sb5 + (sqrt(hSpacing^2+(6*vSpacing)^2))*sb7 + (sqrt(hSpacing^2+(8* vSpacing)^2))*sb9)
            TXT,
            'results' => [
                'sb7' => <<<'TXT'
                (-1/2*hSpacing - sb4*vSpacing - sb5*sqrt(pow(hSpacing, 2) + 16*pow(vSpacing, 2)) - sb6*vSpacing - sb8*vSpacing - sb9*sqrt(pow(hSpacing, 2) + 64*pow(vSpacing, 2)) + (1/2)*total7 - vSpacing - sqrt(pow(hSpacing, 2) + 4*pow(vSpacing, 2)))/sqrt(pow(hSpacing, 2) + 36*pow(vSpacing, 2))
                TXT,
                'total7' => <<<'TXT'
                hSpacing + 2*sb4*vSpacing + 2*sb5*sqrt(pow(hSpacing, 2) + 16*pow(vSpacing, 2)) + 2*sb6*vSpacing + 2*sb7*sqrt(pow(hSpacing, 2) + 36*pow(vSpacing, 2)) + 2*sb8*vSpacing + 2*sb9*sqrt(pow(hSpacing, 2) + 64*pow(vSpacing, 2)) + 2*vSpacing + 2*sqrt(pow(hSpacing, 2) + 4*pow(vSpacing, 2))
                TXT,
                'sb6' => <<<'TXT'
                (-1/2*hSpacing - sb5*sqrt(pow(hSpacing, 2) + 16*pow(vSpacing, 2)) - sb7*sqrt(pow(hSpacing, 2) + 36*pow(vSpacing, 2)) - sb9*sqrt(pow(hSpacing, 2) + 64*pow(vSpacing, 2)) + (1/2)*total7 - vSpacing*(sb4 + sb8 + 1) - sqrt(pow(hSpacing, 2) + 4*pow(vSpacing, 2)))/vSpacing
                TXT,
                'sb9' => <<<'TXT'
                (-1/2*hSpacing - sb4*vSpacing - sb5*sqrt(pow(hSpacing, 2) + 16*pow(vSpacing, 2)) - sb6*vSpacing - sb7*sqrt(pow(hSpacing, 2) + 36*pow(vSpacing, 2)) - sb8*vSpacing + (1/2)*total7 - vSpacing - sqrt(pow(hSpacing, 2) + 4*pow(vSpacing, 2)))/sqrt(pow(hSpacing, 2) + 64*pow(vSpacing, 2))
                TXT,
                'sb4' => <<<'TXT'
                (-1/2*hSpacing - sb5*sqrt(pow(hSpacing, 2) + 16*pow(vSpacing, 2)) - sb7*sqrt(pow(hSpacing, 2) + 36*pow(vSpacing, 2)) - sb9*sqrt(pow(hSpacing, 2) + 64*pow(vSpacing, 2)) + (1/2)*total7 - vSpacing*(sb6 + sb8 + 1) - sqrt(pow(hSpacing, 2) + 4*pow(vSpacing, 2)))/vSpacing
                TXT,
                'sb8' => <<<'TXT'
                (-1/2*hSpacing - sb5*sqrt(pow(hSpacing, 2) + 16*pow(vSpacing, 2)) - sb7*sqrt(pow(hSpacing, 2) + 36*pow(vSpacing, 2)) - sb9*sqrt(pow(hSpacing, 2) + 64*pow(vSpacing, 2)) + (1/2)*total7 - vSpacing*(sb4 + sb6 + 1) - sqrt(pow(hSpacing, 2) + 4*pow(vSpacing, 2)))/vSpacing
                TXT,
                'sb5' => <<<'TXT'
                (-1/2*hSpacing - sb4*vSpacing - sb6*vSpacing - sb7*sqrt(pow(hSpacing, 2) + 36*pow(vSpacing, 2)) - sb8*vSpacing - sb9*sqrt(pow(hSpacing, 2) + 64*pow(vSpacing, 2)) + (1/2)*total7 - vSpacing - sqrt(pow(hSpacing, 2) + 4*pow(vSpacing, 2)))/sqrt(pow(hSpacing, 2) + 16*pow(vSpacing, 2))
                TXT,
            ],
        ],
        [
            'title' => 'total = total123*(m123) + total4*m4 + total5*m5 + total6*m6 + total7*m7 + 2 * ends',
            'results' => [
                'm6' => '(-2*ends - m123*total123 - m4*total4 - m5*total5 - m7*total7 + total)/total6',
                'total' => '2*ends + m123*total123 + m4*total4 + m5*total5 + m6*total6 + m7*total7',
                'total7' => '(-2*ends - m123*total123 - m4*total4 - m5*total5 - m6*total6 + total)/m7',
                'total4' => '(-2*ends - m123*total123 - m5*total5 - m6*total6 - m7*total7 + total)/m4',
                'm4' => '(-2*ends - m123*total123 - m5*total5 - m6*total6 - m7*total7 + total)/total4',
                'm123' => '(-2*ends - m4*total4 - m5*total5 - m6*total6 - m7*total7 + total)/total123',
                'm5' => '(-2*ends - m123*total123 - m4*total4 - m6*total6 - m7*total7 + total)/total5',
                'total5' => '(-2*ends - m123*total123 - m4*total4 - m6*total6 - m7*total7 + total)/m5',
                'total6' => '(-2*ends - m123*total123 - m4*total4 - m5*total5 - m7*total7 + total)/m6',
                'total123' => '(-2*ends - m4*total4 - m5*total5 - m6*total6 - m7*total7 + total)/m123',
                'm7' => '(-2*ends - m123*total123 - m4*total4 - m5*total5 - m6*total6 + total)/total7',
                'ends' => '-1/2*m123*total123 - 1/2*m4*total4 - 1/2*m5*total5 - 1/2*m6*total6 - 1/2*m7*total7 + (1/2)*total',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Supply the vertical spacing, the free-end length, the total shoelace length and the shoelace length without ends and the Shoelace length calculator solves for <strong>horizontal spacing</strong>.
        TXT,
        'sections' => [
            ['title' => 'How does the Shoelace length calculator work?', 'html' => <<<'TXT'
            <p>The Shoelace length calculator takes the values in the form, applies the relationship described below and reports <strong>horizontal spacing</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the pattern); then you type in the vertical spacing, the free-end length, the total shoelace length and the shoelace length without ends (Hidden variables).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 7 options, such as basic criss-cross, criss-cross helix and over under. </li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Pattern</strong></td><td>One of 7 options, such as basic criss-cross, criss-cross helix and over under.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Eyelet pairs</strong></td><td>One of 7 options, such as 3 pairs, 4 pairs and 5 pairs.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Horizontal spacing</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Vertical spacing</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Free-end length</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Total shoelace length</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Shoelace length without ends (Hidden variables)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Shoelace length without ends (Hidden variables)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Shoelace length without ends (Hidden variables)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Shoelace length without ends (Hidden variables)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Shoelace length without ends (Hidden variables)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Shoelace length calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Horizontal spacing</span><span class="formula-eq">=</span><span class="formula-rhs">(2 × eyelet pairs × the square root of (-4 × (eyelet pairs ^ 2) × (vertical spacing ^ 2) + 8 × eyelet pairs × (vertical spacing ^ 2) + (shoelace length without ends ^ 2) − 3 × (vertical spacing ^ 2)) − shoelace length without ends − 2 × the square root of (-4 × (eyelet pairs ^ 2) × (vertical spacing ^ 2) + 8 × eyelet pairs × (vertical spacing ^ 2) + (shoelace length without ends ^ 2) − 3 × (vertical spacing ^ 2))) ÷ (4 × (eyelet pairs ^ 2) − 8 × eyelet pairs + 3)</span></div><div class="formula-row"><span class="formula-lhs">Shoelace length without ends</span><span class="formula-eq">=</span><span class="formula-rhs">horizontal spacing × eyelet pairs + horizontal spacing × (eyelet pairs, 2) − horizontal spacing + 2 × eyelet pairs × vertical spacing − 2 × vertical spacing</span></div><div class="formula-row"><span class="formula-lhs">Horizontal spacing</span><span class="formula-eq">=</span><span class="formula-rhs">((eyelet pairs − 2) × the square root of (8 × eyelet pairs × (vertical spacing ^ 2) + (shoelace length without ends ^ 2) − 4 × shoelace length without ends × vertical spacing − 8 × (vertical spacing ^ 2)) + (eyelet pairs − 1) × (shoelace length without ends − 2 × vertical spacing)) ÷ (2 × eyelet pairs − 3)</span></div><div class="formula-row"><span class="formula-lhs">Eyelet pairs</span><span class="formula-eq">=</span><span class="formula-rhs">((3 ÷ 2) × horizontal spacing + (1 ÷ 2) × shoelace length without ends + vertical spacing) ÷ (horizontal spacing + vertical spacing)</span></div><div class="formula-row"><span class="formula-lhs">Sb7</span><span class="formula-eq">=</span><span class="formula-rhs">(-1 ÷ 2 × horizontal spacing − Sb4 × vertical spacing − Sb5 × the square root of ((horizontal spacing ^ 2) + 16 × (vertical spacing ^ 2)) − Sb6 × vertical spacing − Sb8 × vertical spacing − Sb9 × the square root of ((horizontal spacing ^ 2) + 64 × (vertical spacing ^ 2)) + (1 ÷ 2) × shoelace length without ends − vertical spacing − the square root of ((horizontal spacing ^ 2) + 4 × (vertical spacing ^ 2))) ÷ the square root of ((horizontal spacing ^ 2) + 36 × (vertical spacing ^ 2))</span></div><div class="formula-row"><span class="formula-lhs">M6</span><span class="formula-eq">=</span><span class="formula-rhs">(-2 × free-end length − M123 × shoelace length without ends − M4 × shoelace length without ends − M5 × shoelace length without ends − M7 × shoelace length without ends + total shoelace length) ÷ shoelace length without ends</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>The option the calculation settles on.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Shoelace length calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 4 figures keep coming back — the vertical spacing, the free-end length and the total shoelace length — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/dress-size">Dress size</a>, <a href="/everyday-life/drive-time">Drive time</a> and <a href="/everyday-life/elapsed-time">Elapsed time</a>.</p>
            TXT],
            ['title' => 'A worked example with these formulas', 'html' => <<<'TXT'
            <p> Enter Pattern = 1. The calculator returns <strong>Eyelet pairs</strong> = 6.</p><p>The relationship behind those numbers is <strong>Horizontal spacing</strong> = <code>(2 × number_of_eyelet_pairs × √(-4 × number_of_eyelet_pairs^2 × vSpacing^2 + 8 × number_of_eyelet_pairs × vSpacing^2 + total123^2 - 3 × vSpacing^2) - total123 - 2 × √(-4 × number_of_eyelet_pairs^2 × vSpacing^2 + 8 × number_of_eyelet_pairs × vSpacing^2 + total123^2 - 3 × vSpacing^2))/(4 × number_of_eyelet_pairs^2 - 8 × number_of_eyelet_pairs + 3)</code>. </p>
            TXT],
            ['title' => 'Planning with the estimate', 'html' => <<<'TXT'
            <p>The required lace length depends on the lacing pattern, number of eyelet pairs, spacing between eyelets and the free ends you want for tying. Enter the pattern that most closely matches the shoe and use the measured horizontal and vertical spacing rather than guessing from the shoe’s outside width. The calculator can show lengths for several eyelet counts so a pair of shoes with different layouts can be compared.</p><p>The free-end allowance matters: a lace that reaches the top eyelets may still be too short to tie comfortably. Longer bows, double knots or a preferred wrapping style require extra length. If you are replacing an existing lace, measure it from tip to tip and compare that length with the estimate. The old lace is a useful check, although it may have stretched or been selected for a different tying style.</p><p>Eyelet spacing can vary by shoe size and manufacturer, and decorative lacing may use more material than a simple criss-cross pattern. A calculator’s geometric estimate does not account for every route around the tongue or friction at each eyelet. When between standard lace lengths, the longer option is often easier to adjust, provided the ends will not drag or create a safety hazard.</p><p>Use the result as a starting point for shopping, then verify the product’s actual length and tip-to-tip measurement. A mismatch between inches and centimetres is an easy source of error. The model estimates lace path from the chosen pattern; it does not know the shoe’s construction unless those measurements are entered.</p>
            TXT],
            ['title' => 'Fit, tying style and replacement length', 'html' => <<<'TXT'
            <p>Two shoes with the same number of eyelet pairs can need different laces because their eyelets are spaced differently and the lacing pattern uses a different path. Measure horizontal and vertical spacing between the eyelets on the actual shoe. A pattern that crosses diagonally uses more lace than a route that runs mostly straight up the shoe, and extra eyelet pairs add more path length.</p><p>The free-end length determines how much lace remains for a bow or knot after the shoe is laced. If you like large bows, double knots or wrapping the lace around the ankle, allow more length than a short standard tie. The calculator’s pattern-specific outputs help compare these choices, but the actual tongue shape and friction at eyelets can change how much lace is comfortable.</p><p>When replacing an existing lace, measure it tip to tip and compare with the proposed length. Consider whether the old lace was too short or too long, and whether you will use the same pattern. If the result lies between retail lengths, choose based on the desired free ends and the shoe’s eyelet layout. Avoid excessive tails that can drag, snag or create a trip hazard.</p>
            TXT],
            ['title' => 'Checking the estimate against the shoe', 'html' => <<<'TXT'
            <p>After measuring the shoe, compare the predicted total with the lace currently installed. If the calculator suggests a much shorter or longer lace, verify that you counted eyelet pairs rather than individual holes and used the intended pattern. Check that spacing is measured between matching eyelets on opposite sides, not from the toe to the top of the shoe.</p><p>Different lacing styles can change the path length even on the same shoe. The result is most useful as a comparison between patterns or a starting length for replacement; trying the lace in the actual shoe is the final fit test. Convert the selected length to the unit used by the retailer before purchasing.</p>
            TXT],
            ['title' => 'A final fit check', 'html' => <<<'TXT'
            <p>Before trimming or tying a new lace permanently, lace both shoes and try the bow you normally use. Check that the shoe can open enough to put on comfortably and that the remaining ends are manageable. The same lace may feel different in a high-top, a boot or a shoe with a padded tongue. Keep the estimate as a guide and let the real fit decide.</p><p>For a replacement pair, compare both shoes; asymmetric eyelet layouts or different wear can affect the needed length.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Shoelace length calculator work out?', 'a' => 'It returns horizontal spacing, derived from the vertical spacing, the free-end length and the total shoelace length.'],
            ['q' => 'What do I need to enter to use the Shoelace length calculator?', 'a' => 'The form asks for the vertical spacing, the free-end length, the total shoelace length and the shoelace length without ends, which is 7 fields in total.'],
            ['q' => 'Can I enter horizontal spacing in a different unit?', 'a' => 'Yes. Horizontal spacing opens in centimeters and the chip beside it offers 34 units.'],
        ],
        'related' => [
            ['path' => '/everyday-life/dress-size', 'name' => 'Dress size'],
            ['path' => '/everyday-life/drive-time', 'name' => 'Drive time'],
            ['path' => '/everyday-life/elapsed-time', 'name' => 'Elapsed time'],
        ],
    ],
];
