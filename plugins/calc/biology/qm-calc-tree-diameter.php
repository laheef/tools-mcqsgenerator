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
    'meta' => ['title' => 'Tree diameter Calculator: Formula & Example', 'description' => 'Tree diameter turns circumference and average bark thickness into diameter under-bark. Nothing is stored between visits, and the working stays on the page.', 'h1' => 'Tree diameter Calculator', 'updated' => '2026-09-28'],
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
        Enter Circumference into Tree diameter and the answer comes back as Diameter and Average bark thickness. The arithmetic is the whole method: diameter is worked out from circumference by one formula, applied once. Diameter comes back in centimeters unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Tree diameter calculator works', 'html' => <<<'TXT'
            <p>Tree diameter answers one question from 1 number, and the answer is Diameter, Average bark thickness and Diameter under-bark.</p><p>The relationship it solves reads Diameter = Circumference ÷ PI.</p><p>The result panel carries Diameter, Average bark thickness, Diameter under-bark and 1st stem circumference, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Circumference</strong> — in centimeters. Enter the circumference of the trunk at diameter at breast height (DBH). Generally, we measure DBH at 1.35 m or 4.5 ft from the highest point of the ground at the tree&#039;s base.</li></ul><p>What you get back is Diameter in centimeters, Average bark thickness in centimeters, Diameter under-bark in centimeters, 1st stem circumference in centimeters, 2nd stem circumference in centimeters, 3rd stem circumference in centimeters, 4th stem circumference in centimeters, 5th stem circumference in centimeters, 6th stem circumference in centimeters, Diameter in centimeters, Diameter under-bark in centimeters, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Diameter lists 7 options and opens on centimeters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Diameter</strong> = <code>Circumference ÷ PI</code></li><li><strong>Circumference</strong> = <code>PI × Diameter</code></li><li><strong>Diameter under-bark</strong> = <code>− 2 × Average bark thickness + Diameter</code></li><li><strong>Average bark thickness</strong> = <code>(1 ÷ 2) × Diameter − 1 ÷ 2 × Diameter under-bark</code></li><li><strong>5th stem circumference</strong> = <code>√( − (1st stem circumference)^(2) − (2nd stem circumference)^(2) − (3rd stem circumference)^(2) − (4th stem circumference)^(2) − (6th stem circumference)^(2) + (PI)^(2) × (Diameter)^(2))</code></li><li><strong>3rd stem circumference</strong> = <code>√( − (1st stem circumference)^(2) − (2nd stem circumference)^(2) − (4th stem circumference)^(2) − (5th stem circumference)^(2) − (6th stem circumference)^(2) + (PI)^(2) × (Diameter)^(2))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Diameter</strong> = <code>Circumference ÷ PI</code> — the form to use when Circumference are the values you have.</li><li><strong>Circumference</strong> = <code>PI × Diameter</code> — the form to use when Diameter are the values you have.</li><li><strong>Diameter under-bark</strong> = <code>− 2 × Average bark thickness + Diameter</code> — the form to use when Diameter and Average bark thickness are the values you have.</li><li><strong>Diameter</strong> = <code>2 × Average bark thickness + Diameter under-bark</code> — the form to use when Average bark thickness and Diameter under-bark are the values you have.</li><li><strong>Average bark thickness</strong> = <code>(1 ÷ 2) × Diameter − 1 ÷ 2 × Diameter under-bark</code> — the form to use when Diameter and Diameter under-bark are the values you have.</li><li><strong>Diameter</strong> = <code>√((1st stem circumference)^(2) + (2nd stem circumference)^(2) + (3rd stem circumference)^(2) + (4th stem circumference)^(2) + (5th stem circumference)^(2) + (6th stem circumference)^(2)) ÷ PI</code> — the form to use when 5th stem circumference, 3rd stem circumference, 2nd stem circumference and 6th stem circumference are the values you have.</li><li><strong>5th stem circumference</strong> = <code>√( − (1st stem circumference)^(2) − (2nd stem circumference)^(2) − (3rd stem circumference)^(2) − (4th stem circumference)^(2) − (6th stem circumference)^(2) + (PI)^(2) × (Diameter)^(2))</code> — the form to use when 3rd stem circumference, 2nd stem circumference, 6th stem circumference and Diameter are the values you have.</li><li><strong>3rd stem circumference</strong> = <code>√( − (1st stem circumference)^(2) − (2nd stem circumference)^(2) − (4th stem circumference)^(2) − (5th stem circumference)^(2) − (6th stem circumference)^(2) + (PI)^(2) × (Diameter)^(2))</code> — the form to use when 5th stem circumference, 2nd stem circumference, 6th stem circumference and Diameter are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Diameter, Circumference and Diameter under-bark can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Circumference carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Diameter, Average bark thickness and Diameter under-bark are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Circumference left as a guess.</strong> Anything typed into Circumference is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Circumference and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Tree diameter form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Circumference</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Enter the circumference of the trunk at diameter at breast height (DBH). Generally, we measure DBH at 1.35 m or 4.5 ft from the highest point of the ground at the tree&#039;s base. It feeds Diameter. Fill it from a measurement rather than a memory — Circumference is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Diameter</strong> is a centimeters figure. It is computed from Circumference, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Average bark thickness</strong> is a centimeters figure. It is computed from Diameter and Diameter under-bark, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Diameter under-bark</strong> is a centimeters figure. It is computed from Diameter and Average bark thickness, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>1st stem circumference</strong> is a centimeters figure. It is computed from 5th stem circumference, 3rd stem circumference, 2nd stem circumference and 6th stem circumference, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>2nd stem circumference</strong> is a centimeters figure. It is computed from 5th stem circumference, 3rd stem circumference, 6th stem circumference and Diameter, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>3rd stem circumference</strong> is a centimeters figure. It is computed from 5th stem circumference, 2nd stem circumference, 6th stem circumference and Diameter, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>4th stem circumference</strong> is a centimeters figure. It is computed from 5th stem circumference, 3rd stem circumference, 2nd stem circumference and 6th stem circumference, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>5th stem circumference</strong> is a centimeters figure. It is computed from 3rd stem circumference, 2nd stem circumference, 6th stem circumference and Diameter, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>6th stem circumference</strong> is a centimeters figure. It is computed from 5th stem circumference, 3rd stem circumference, 2nd stem circumference and Diameter, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Diameter</strong> is a centimeters figure. It is computed from 5th stem circumference, 3rd stem circumference, 2nd stem circumference and 6th stem circumference, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Diameter under-bark</strong> is a centimeters figure. It is computed from Average bark thickness and 1st stem circumference, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Tree diameter actually offers.</p><ul><li><strong>centimeters</strong> — opens in <em>cm</em>, and the chip also carries cm, m, in, ft, yd and μm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Diameter is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are centimeters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Circumference are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Circumference measured, Diameter and Average bark thickness wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/vine-density">Vine Density Calculator</a>, <a href="/biology/wastewater">Wastewater Calculator</a> and <a href="/biology/water-potential">Water potential Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tree diameter calculator work out?', 'a' => 'Diameter, Average bark thickness, Diameter under-bark and 1st stem circumference, from Circumference. The relationship is Diameter = Circumference ÷ PI.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Circumference (centimeters). With circumference in place, Diameter can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Diameter, Circumference, Diameter under-bark and Average bark thickness can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Diameter is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
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
