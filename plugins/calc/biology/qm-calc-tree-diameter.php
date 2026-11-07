<?php

/**
 * Tree diameter
 * /biology/tree-diameter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tree diameter',
    'meta' => ['title' => 'Tree diameter Calculator — Formula & Results', 'description' => 'Enter Circumference into Tree diameter and the answer comes back as Diameter and Average bark thickness. The arithmetic is the whole method: Diameter is…', 'h1' => 'Tree diameter Calculator', 'updated' => '2026-09-28'],
    'raw' => [
        'vars' => [
            'bark_thickness' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'bark_thickness_multi' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'circumference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'circumference1' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
                'dfl' => [
                    ['v' => '0', 'c' => null],
                    ['v' => '0', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'circumference2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
                'dfl' => [
                    ['v' => '0', 'c' => null],
                    ['v' => '0', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'circumference3' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
                'dfl' => [
                    ['v' => '0', 'c' => null],
                    ['v' => '0', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'circumference4' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
                'dfl' => [
                    ['v' => '0', 'c' => null],
                    ['v' => '0', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'circumference5' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
                'dfl' => [
                    ['v' => '0', 'c' => null],
                    ['v' => '0', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'circumference6' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
                'dfl' => [
                    ['v' => '0', 'c' => null],
                    ['v' => '0', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'diameter' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'diameter_excluding_bark' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'diameter_ms' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'diameter_ms_excluding_bark' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'GWNBjfpV1X4HqYQgtFDy_',
                'title' => 'Single-stemmed tree',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'circumference',
                                    'vt' => 'numerical',
                                    'l' => 'Circumference',
                                    'h' => <<<'TXT'
                                    Enter the circumference of the trunk at diameter at breast height (DBH). Generally, we measure DBH at 1.35 m or 4.5 ft from the highest point of the ground at the tree's base.
                                    TXT,
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
                                    'n' => 'diameter',
                                    'vt' => 'numerical',
                                    'l' => 'Diameter',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '_K5c_qI1Day24Aeu1tUUH',
                'title' => 'Bark details (single)',
                'desc' => 'Bark thickness and diameter for single-stemmed trees.',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'bark_thickness',
                                    'vt' => 'numerical',
                                    'l' => 'Average bark thickness',
                                    'h' => 'Enter the average thickness of the bark.',
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
                                    'n' => 'diameter_excluding_bark',
                                    'vt' => 'numerical',
                                    'l' => 'Diameter under-bark',
                                    'h' => 'Diameter of the wood inside the bark.',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'Ju7SZv9ztdxbGeVbaLsX8',
                'title' => 'Multi-stemmed tree',
                'desc' => 'Leave zero if you have fewer stems.',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'circumference1',
                                    'vt' => 'numerical',
                                    'l' => '1st stem circumference',
                                    'h' => 'Enter the circumference of the largest stem.',
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
                                    'n' => 'circumference2',
                                    'vt' => 'numerical',
                                    'l' => '2nd stem circumference',
                                    'h' => 'Enter the circumference of the second largest stem.',
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
                                    'n' => 'circumference3',
                                    'vt' => 'numerical',
                                    'l' => '3rd stem circumference',
                                    'h' => 'Enter the circumference of the third largest stem.',
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
                                    'n' => 'circumference4',
                                    'vt' => 'numerical',
                                    'l' => '4th stem circumference',
                                    'h' => 'Enter the circumference of the fourth largest stem.',
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
                                    'n' => 'circumference5',
                                    'vt' => 'numerical',
                                    'l' => '5th stem circumference',
                                    'h' => 'Enter the circumference of the fifth largest stem.',
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
                                    'n' => 'circumference6',
                                    'vt' => 'numerical',
                                    'l' => '6th stem circumference',
                                    'h' => 'Enter the circumference of the sixth largest stem.',
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
                                    'n' => 'diameter_ms',
                                    'vt' => 'numerical',
                                    'l' => 'Diameter',
                                    'h' => 'Diameter of the trunk outside the bark.',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'OcFrQVJ83W0vfLuclZhrC',
                'title' => 'Bark details (multi)',
                'desc' => 'Bark thickness and diameter for multi-stemmed trees.',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'bark_thickness_multi',
                                    'vt' => 'numerical',
                                    'l' => 'Average bark thickness',
                                    'h' => 'Enter the average bark thickness.',
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
                                    'n' => 'diameter_ms_excluding_bark',
                                    'vt' => 'numerical',
                                    'l' => 'Diameter under-bark',
                                    'h' => 'Diameter of the trunk inside the bark.',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'diameter = circumference / pi',
                'var' => [
                    [
                        'l' => 'diameter',
                        'f' => 'circumference/PI',
                        'r' => ['circumference'],
                    ],
                    [
                        'l' => 'circumference',
                        'f' => 'PI*diameter',
                        'r' => ['diameter'],
                    ],
                ],
            ],
            [
                'formula' => 'diameter_excluding_bark = diameter - (2 * bark_thickness)',
                'var' => [
                    [
                        'l' => 'diameter',
                        'f' => '2*bark_thickness + diameter_excluding_bark',
                        'r' => ['bark_thickness', 'diameter_excluding_bark'],
                    ],
                    [
                        'l' => 'bark_thickness',
                        'f' => '(1/2)*diameter - 1/2*diameter_excluding_bark',
                        'r' => ['diameter', 'diameter_excluding_bark'],
                    ],
                    [
                        'l' => 'diameter_excluding_bark',
                        'f' => '-2*bark_thickness + diameter',
                        'r' => ['diameter', 'bark_thickness'],
                    ],
                ],
            ],
            [
                'formula' => <<<'TXT'
                diameter_ms = sqrt((circumference1/pi)^2 + (circumference2/pi)^2 + (circumference3/pi)^2 + (circumference4/pi)^2 + (circumference5/pi)^2 + (circumference6/pi)^2)
                TXT,
                'var' => [
                    [
                        'l' => 'circumference5',
                        'f' => <<<'TXT'
                        sqrt(-pow(circumference1, 2) - pow(circumference2, 2) - pow(circumference3, 2) - pow(circumference4, 2) - pow(circumference6, 2) + pow(PI, 2)*pow(diameter_ms, 2))
                        TXT,
                        'r' => [
                            'circumference3',
                            'circumference2',
                            'circumference6',
                            'diameter_ms',
                            'circumference4',
                            'circumference1',
                        ],
                    ],
                    [
                        'l' => 'circumference3',
                        'f' => <<<'TXT'
                        sqrt(-pow(circumference1, 2) - pow(circumference2, 2) - pow(circumference4, 2) - pow(circumference5, 2) - pow(circumference6, 2) + pow(PI, 2)*pow(diameter_ms, 2))
                        TXT,
                        'r' => [
                            'circumference5',
                            'circumference2',
                            'circumference6',
                            'diameter_ms',
                            'circumference4',
                            'circumference1',
                        ],
                    ],
                    [
                        'l' => 'circumference2',
                        'f' => <<<'TXT'
                        sqrt(-pow(circumference1, 2) - pow(circumference3, 2) - pow(circumference4, 2) - pow(circumference5, 2) - pow(circumference6, 2) + pow(PI, 2)*pow(diameter_ms, 2))
                        TXT,
                        'r' => [
                            'circumference5',
                            'circumference3',
                            'circumference6',
                            'diameter_ms',
                            'circumference4',
                            'circumference1',
                        ],
                    ],
                    [
                        'l' => 'circumference6',
                        'f' => <<<'TXT'
                        sqrt(-pow(circumference1, 2) - pow(circumference2, 2) - pow(circumference3, 2) - pow(circumference4, 2) - pow(circumference5, 2) + pow(PI, 2)*pow(diameter_ms, 2))
                        TXT,
                        'r' => [
                            'circumference5',
                            'circumference3',
                            'circumference2',
                            'diameter_ms',
                            'circumference4',
                            'circumference1',
                        ],
                    ],
                    [
                        'l' => 'diameter_ms',
                        'f' => 'sqrt(pow(circumference1, 2) + pow(circumference2, 2) + pow(circumference3, 2) + pow(circumference4, 2) + pow(circumference5, 2) + pow(circumference6, 2))/PI',
                        'r' => [
                            'circumference5',
                            'circumference3',
                            'circumference2',
                            'circumference6',
                            'circumference4',
                            'circumference1',
                        ],
                    ],
                    [
                        'l' => 'circumference4',
                        'f' => <<<'TXT'
                        sqrt(-pow(circumference1, 2) - pow(circumference2, 2) - pow(circumference3, 2) - pow(circumference5, 2) - pow(circumference6, 2) + pow(PI, 2)*pow(diameter_ms, 2))
                        TXT,
                        'r' => [
                            'circumference5',
                            'circumference3',
                            'circumference2',
                            'circumference6',
                            'diameter_ms',
                            'circumference1',
                        ],
                    ],
                    [
                        'l' => 'circumference1',
                        'f' => <<<'TXT'
                        sqrt(-pow(circumference2, 2) - pow(circumference3, 2) - pow(circumference4, 2) - pow(circumference5, 2) - pow(circumference6, 2) + pow(PI, 2)*pow(diameter_ms, 2))
                        TXT,
                        'r' => [
                            'circumference5',
                            'circumference3',
                            'circumference2',
                            'circumference6',
                            'diameter_ms',
                            'circumference4',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'diameter_ms_excluding_bark = zeroOrOne(circumference1, bark_thickness_multi)',
                'var' => [
                    [
                        'l' => 'diameter_ms_excluding_bark',
                        'f' => 'zeroOrOne(circumference1, bark_thickness_multi)',
                        'r' => ['bark_thickness_multi', 'circumference1'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";omni.define("zeroOrOne",function(c,bt){if(c===0||c/(2*Math.PI)<bt){return 0}else{return c/Math.PI-2*bt}});//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Circumference into Tree diameter and the answer comes back as Diameter and Average bark thickness. The arithmetic is the whole method: Diameter is worked out from Circumference by one formula, applied once. Diameter comes back in centimeters unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Tree diameter calculator works', 'html' => <<<'TXT'
            <p>Tree diameter answers one question from 1 number, and the answer is Diameter, Average bark thickness and Diameter under-bark.</p><p>The relationship it solves reads Diameter = Circumference ÷ PI.</p><p>The result panel carries Diameter, Average bark thickness, Diameter under-bark and 1st stem circumference, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Circumference</strong> — in centimeters. Enter the circumference of the trunk at diameter at breast height (DBH). Generally, we measure DBH at 1.35 m or 4.5 ft from the highest point of the ground at the tree&#039;s base.</li></ul><p>What you get back is Diameter in centimeters, Average bark thickness in centimeters, Diameter under-bark in centimeters, 1st stem circumference in centimeters, 2nd stem circumference in centimeters, 3rd stem circumference in centimeters, 4th stem circumference in centimeters, 5th stem circumference in centimeters, 6th stem circumference in centimeters, Diameter in centimeters, Diameter under-bark in centimeters, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Diameter</strong> = <code>Circumference ÷ PI</code></li><li><strong>Circumference</strong> = <code>PI × Diameter</code></li><li><strong>Average bark thickness</strong> = <code>(1 ÷ 2) × Diameter − 1 ÷ 2 × Diameter under-bark</code></li><li><strong>Diameter under-bark</strong> = <code>− 2 × Average bark thickness + Diameter</code></li><li><strong>5th stem circumference</strong> = <code>√( − (1st stem circumference)^(2) − (2nd stem circumference)^(2) − (3rd stem circumference)^(2) − (4th stem circumference)^(2) − (6th stem circumference)^(2) + (PI)^(2) × (Diameter)^(2))</code></li><li><strong>3rd stem circumference</strong> = <code>√( − (1st stem circumference)^(2) − (2nd stem circumference)^(2) − (4th stem circumference)^(2) − (5th stem circumference)^(2) − (6th stem circumference)^(2) + (PI)^(2) × (Diameter)^(2))</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Diameter, Circumference and Average bark thickness can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Circumference carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Diameter, Average bark thickness and Diameter under-bark are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Circumference and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Circumference measured, Diameter and Average bark thickness wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/vine-density">Vine Density Calculator</a>, <a href="/biology/wastewater">Wastewater Calculator</a> and <a href="/biology/water-potential">Water potential Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tree diameter calculator work out?', 'a' => 'Diameter, Average bark thickness, Diameter under-bark and 1st stem circumference, from Circumference. The relationship is Diameter = Circumference ÷ PI.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Circumference (centimeters). With circumference in place, Diameter can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Diameter, Circumference, Average bark thickness and Diameter under-bark can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Diameter is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Circumference blank and the page solves for it, reporting Diameter instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Diameter keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/vine-density', 'name' => 'Vine Density Calculator'],
            ['path' => '/biology/wastewater', 'name' => 'Wastewater Calculator'],
            ['path' => '/biology/water-potential', 'name' => 'Water potential Calculator'],
        ],
        'authors' => [],
    ],
];
