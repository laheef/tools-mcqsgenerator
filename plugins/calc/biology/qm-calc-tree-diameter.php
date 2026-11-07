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
    'meta' => ['title' => 'Tree diameter Calculator — Formula & Results', 'description' => 'The Tree diameter calculator turns the circumference, the diameter under-bark (Bark details (single)) and the diameter into <strong>diameter (Single-stemmed…', 'h1' => 'Tree diameter Calculator', 'updated' => '2026-09-28'],
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
        The Tree diameter calculator turns the circumference, the diameter under-bark (Bark details (single)) and the diameter into <strong>diameter (Single-stemmed tree)</strong>.
        TXT,
        'sections' => [
            ['title' => 'How does the Tree diameter calculator work?', 'html' => <<<'TXT'
            <p>The Tree diameter calculator takes the values in the form, applies the relationship described below and reports <strong>diameter (Single-stemmed tree)</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the circumference, the diameter under-bark (Bark details (single)), the diameter (Multi-stemmed tree) and the average bark thickness (Bark details (multi)).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Circumference</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Diameter (Single-stemmed tree)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Average bark thickness (Bark details (single))</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Diameter under-bark (Bark details (single))</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Diameter (Multi-stemmed tree)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Average bark thickness (Bark details (multi))</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Diameter under-bark (Bark details (multi))</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Tree diameter calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Diameter</span><span class="formula-eq">=</span><span class="formula-rhs">circumference ÷ PI</span></div><div class="formula-row"><span class="formula-lhs">Diameter</span><span class="formula-eq">=</span><span class="formula-rhs">2 × average bark thickness + diameter under-bark</span></div><div class="formula-row"><span class="formula-lhs">5th stem circumference</span><span class="formula-eq">=</span><span class="formula-rhs">the square root of (-(1st stem circumference ^ 2) − (2nd stem circumference ^ 2) − (3rd stem circumference ^ 2) − (4th stem circumference ^ 2) − (6th stem circumference ^ 2) + (PI ^ 2) × (diameter ^ 2))</span></div><div class="formula-row"><span class="formula-lhs">Diameter under-bark</span><span class="formula-eq">=</span><span class="formula-rhs">(1st stem circumference, average bark thickness)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Take <strong>Circumference</strong> = 30 cm, <strong>1st stem circumference</strong> = 0 cm, <strong>2nd stem circumference</strong> = 0 cm and <strong>3rd stem circumference</strong> = 0 cm. The calculator returns <strong>Diameter</strong> = 9.549 cm.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Diameter</strong> = 9.549 cm should be roughly the size you expected from <strong>Circumference</strong> = 30 cm and <strong>1st stem circumference</strong> = 0 cm.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Tree diameter calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 3 figures keep coming back — the circumference, the diameter under-bark (Bark details (single)) and the diameter — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Round only at the end. </li><li>Keep the units you enter consistent. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/tree-height">Tree height</a>, <a href="/biology/tree-leaves">Leaves on tree</a> and <a href="/biology/tree-spacing">Tree spacing</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tree diameter calculator work out?', 'a' => <<<'TXT'
            It returns diameter (Single-stemmed tree), derived from the circumference, the diameter under-bark (Bark details (single)) and the diameter. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Tree diameter calculator?', 'a' => <<<'TXT'
            The form asks for the circumference, the diameter under-bark (Bark details (single)) and the diameter, which is 9 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter circumference in a different unit?', 'a' => <<<'TXT'
            Yes. Circumference opens in centimeters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Diameter = 9.549 cm. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Tree diameter calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/tree-height', 'name' => 'Tree height'],
            ['path' => '/biology/tree-leaves', 'name' => 'Leaves on tree'],
            ['path' => '/biology/tree-spacing', 'name' => 'Tree spacing'],
        ],
    ],
];
