<?php

/**
 * Grass seed
 * /biology/grass-seed
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Grass seed',
    'meta' => ['title' => 'Grass seed Calculator: Formula, Steps & Examples', 'description' => '<strong>length</strong> is what the Grass seed calculator works out, and it gets there from the width, the area, the radius and a axis. Working from the top…', 'h1' => 'Grass seed Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'a_axis' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_circle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_elipsis' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_rectangle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_triangle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'areashape' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'iwGwVtLZWaw7WOAJKokAP', 'c' => null],
                ],
                'ds' => '840',
            ],
            'b_axis' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'base' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'height' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'radius' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'seed_coverage_rate' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '2.5', 'c' => null],
                    ['v' => '10', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'seeds_circle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'seeds_elipsis' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'seeds_rectangle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'seeds_triangle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'width' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'jUqZlk8i1WKu1pd8uUcTD',
                'title' => 'Lawn area',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'areashape',
                                    'vt' => 'valueSelect',
                                    'l' => 'Lawn shape',
                                    'ds' => '840',
                                    'opts' => [
                                        ['iwGwVtLZWaw7WOAJKokAP', 'Rectangle', '0'],
                                        ['NDgKgOih0C1ObJEW2W-Sy', 'Circle', '1'],
                                        ['X1AsDt6JU1e1ePWERLgDr', 'Ellipsis', '2'],
                                        ['2hu8Uvv5_qrQlGXkN3t8N', 'Triangle', '3'],
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
                                    'n' => 'width',
                                    'vt' => 'numerical',
                                    'l' => 'Width',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'length',
                                    'vt' => 'numerical',
                                    'l' => 'Length',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'area_rectangle',
                                    'vt' => 'numerical',
                                    'l' => 'Area',
                                    'us' => '28',
                                    'du' => 'm2',
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
                                    'n' => 'radius',
                                    'vt' => 'numerical',
                                    'l' => 'Radius',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'area_circle',
                                    'vt' => 'numerical',
                                    'l' => 'Area',
                                    'us' => '28',
                                    'du' => 'm2',
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
                                    'n' => 'a_axis',
                                    'vt' => 'numerical',
                                    'l' => 'A axis',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'b_axis',
                                    'vt' => 'numerical',
                                    'l' => 'B axis',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'area_elipsis',
                                    'vt' => 'numerical',
                                    'l' => 'Area',
                                    'us' => '28',
                                    'du' => 'm2',
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
                                    'n' => 'base',
                                    'vt' => 'numerical',
                                    'l' => 'Base',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'height',
                                    'vt' => 'numerical',
                                    'l' => 'Height',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'area_triangle',
                                    'vt' => 'numerical',
                                    'l' => 'Area',
                                    'us' => '28',
                                    'du' => 'm2',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'ioUzkJiismVEx9-RlYImh',
                'title' => 'Seeds',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'seed_coverage_rate',
                                    'vt' => 'numerical',
                                    'l' => 'Coverage rate',
                                    'h' => <<<'TXT'
                                    Each type of grass has a different coverage rate. They are usually given in kg/1000m² in the metric system, or lbs/1000ft² in the imperial system. To find out the coverage rate of your grass, look at the seed packaging.
                                    TXT,
                                    'us' => '344',
                                    'du' => 'kg1000m2',
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
                                    'n' => 'seeds_rectangle',
                                    'vt' => 'numerical',
                                    'l' => 'Seeds',
                                    'us' => '22',
                                    'du' => 'kg',
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
                                    'n' => 'seeds_circle',
                                    'vt' => 'numerical',
                                    'l' => 'Seeds',
                                    'us' => '22',
                                    'du' => 'kg',
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
                                    'n' => 'seeds_elipsis',
                                    'vt' => 'numerical',
                                    'l' => 'Seeds',
                                    'us' => '22',
                                    'du' => 'kg',
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
                                    'n' => 'seeds_triangle',
                                    'vt' => 'numerical',
                                    'l' => 'Seeds',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'area_rectangle = width * length',
                'var' => [
                    [
                        'l' => 'length',
                        'f' => 'area_rectangle/width',
                        'r' => ['area_rectangle', 'width'],
                    ],
                    [
                        'l' => 'area_rectangle',
                        'f' => 'length*width',
                        'r' => ['length', 'width'],
                    ],
                    [
                        'l' => 'width',
                        'f' => 'area_rectangle/length',
                        'r' => ['length', 'area_rectangle'],
                    ],
                ],
            ],
            [
                'formula' => 'area_circle = pi * radius^2',
                'var' => [
                    [
                        'l' => 'area_circle',
                        'f' => 'PI*pow(radius, 2)',
                        'r' => ['radius'],
                    ],
                    [
                        'l' => 'radius',
                        'f' => 'sqrt(area_circle)/sqrt(PI)',
                        'r' => ['area_circle'],
                    ],
                ],
            ],
            [
                'formula' => 'area_elipsis = a_axis * b_axis * pi',
                'var' => [
                    [
                        'l' => 'b_axis',
                        'f' => 'area_elipsis/(PI*a_axis)',
                        'r' => ['a_axis', 'area_elipsis'],
                    ],
                    [
                        'l' => 'a_axis',
                        'f' => 'area_elipsis/(PI*b_axis)',
                        'r' => ['b_axis', 'area_elipsis'],
                    ],
                    [
                        'l' => 'area_elipsis',
                        'f' => 'PI*a_axis*b_axis',
                        'r' => ['b_axis', 'a_axis'],
                    ],
                ],
            ],
            [
                'formula' => 'area_triangle = (1/2) * base * height',
                'var' => [
                    [
                        'l' => 'area_triangle',
                        'f' => '(1/2)*base*height',
                        'r' => ['base', 'height'],
                    ],
                    [
                        'l' => 'base',
                        'f' => '2*area_triangle/height',
                        'r' => ['area_triangle', 'height'],
                    ],
                    [
                        'l' => 'height',
                        'f' => '2*area_triangle/base',
                        'r' => ['area_triangle', 'base'],
                    ],
                ],
            ],
            [
                'formula' => 'seeds_rectangle = seed_coverage_rate * area_rectangle / 1000',
                'var' => [
                    [
                        'l' => 'seeds_rectangle',
                        'f' => '(1/1000)*area_rectangle*seed_coverage_rate',
                        'r' => ['area_rectangle', 'seed_coverage_rate'],
                    ],
                    [
                        'l' => 'area_rectangle',
                        'f' => '1000*seeds_rectangle/seed_coverage_rate',
                        'r' => ['seeds_rectangle', 'seed_coverage_rate'],
                    ],
                    [
                        'l' => 'seed_coverage_rate',
                        'f' => '1000*seeds_rectangle/area_rectangle',
                        'r' => ['seeds_rectangle', 'area_rectangle'],
                    ],
                ],
            ],
            [
                'formula' => 'seeds_circle = seed_coverage_rate * area_circle / 1000',
                'var' => [
                    [
                        'l' => 'seed_coverage_rate',
                        'f' => '1000*seeds_circle/area_circle',
                        'r' => ['area_circle', 'seeds_circle'],
                    ],
                    [
                        'l' => 'area_circle',
                        'f' => '1000*seeds_circle/seed_coverage_rate',
                        'r' => ['seed_coverage_rate', 'seeds_circle'],
                    ],
                    [
                        'l' => 'seeds_circle',
                        'f' => '(1/1000)*area_circle*seed_coverage_rate',
                        'r' => ['seed_coverage_rate', 'area_circle'],
                    ],
                ],
            ],
            [
                'formula' => 'seeds_elipsis = seed_coverage_rate * area_elipsis / 1000',
                'var' => [
                    [
                        'l' => 'seed_coverage_rate',
                        'f' => '1000*seeds_elipsis/area_elipsis',
                        'r' => ['area_elipsis', 'seeds_elipsis'],
                    ],
                    [
                        'l' => 'area_elipsis',
                        'f' => '1000*seeds_elipsis/seed_coverage_rate',
                        'r' => ['seed_coverage_rate', 'seeds_elipsis'],
                    ],
                    [
                        'l' => 'seeds_elipsis',
                        'f' => '(1/1000)*area_elipsis*seed_coverage_rate',
                        'r' => ['seed_coverage_rate', 'area_elipsis'],
                    ],
                ],
            ],
            [
                'formula' => 'seeds_triangle = seed_coverage_rate * area_triangle / 1000',
                'var' => [
                    [
                        'l' => 'area_triangle',
                        'f' => '1000*seeds_triangle/seed_coverage_rate',
                        'r' => ['seed_coverage_rate', 'seeds_triangle'],
                    ],
                    [
                        'l' => 'seed_coverage_rate',
                        'f' => '1000*seeds_triangle/area_triangle',
                        'r' => ['area_triangle', 'seeds_triangle'],
                    ],
                    [
                        'l' => 'seeds_triangle',
                        'f' => '(1/1000)*area_triangle*seed_coverage_rate',
                        'r' => ['area_triangle', 'seed_coverage_rate'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '840' => [
                'name' => 'Area Shape',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'iwGwVtLZWaw7WOAJKokAP', 'label' => 'Rectangle', 'value' => '0'],
                    ['uid' => 'NDgKgOih0C1ObJEW2W-Sy', 'label' => 'Circle', 'value' => '1'],
                    ['uid' => 'X1AsDt6JU1e1ePWERLgDr', 'label' => 'Ellipsis', 'value' => '2'],
                    ['uid' => '2hu8Uvv5_qrQlGXkN3t8N', 'label' => 'Triangle', 'value' => '3'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => '<strong>length</strong> is what the Grass seed calculator works out, and it gets there from the width, the area, the radius and a axis.',
        'sections' => [
            ['title' => 'How does the Grass seed calculator work?', 'html' => <<<'TXT'
            <p>The Grass seed calculator takes the values in the form, applies the relationship described below and reports <strong>length</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the lawn shape); then you type in the width, the area (Lawn area), the radius and a axis.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 4 options, such as rectangle, circle and ellipsis. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in square meters. The unit chip switches it to any of the 24 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Lawn shape</strong></td><td>One of 4 options, such as rectangle, circle and ellipsis.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Width</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Length</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Area (Lawn area)</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>You supply it</td></tr><tr><td><strong>Radius</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Area (Lawn area)</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>Calculated</td></tr><tr><td><strong>A axis</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>B axis</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Area (Lawn area)</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>Calculated</td></tr><tr><td><strong>Base</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Height</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Area (Lawn area)</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>Calculated</td></tr><tr><td><strong>Coverage rate</strong></td><td>A measured quantity, 11 units available.</td><td>kilograms per thousand square meters</td><td>Calculated</td></tr><tr><td><strong>Seeds (Seeds)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Seeds (Seeds)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Seeds (Seeds)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Seeds (Seeds)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Grass seed calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Length</span><span class="formula-eq">=</span><span class="formula-rhs">area ÷ width</span></div><div class="formula-row"><span class="formula-lhs">Area</span><span class="formula-eq">=</span><span class="formula-rhs">PI × (radius ^ 2)</span></div><div class="formula-row"><span class="formula-lhs">B axis</span><span class="formula-eq">=</span><span class="formula-rhs">area ÷ (PI × a axis)</span></div><div class="formula-row"><span class="formula-lhs">Area</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 2) × base × height</span></div><div class="formula-row"><span class="formula-lhs">Seeds</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 1000) × area × coverage rate</span></div><div class="formula-row"><span class="formula-lhs">Coverage rate</span><span class="formula-eq">=</span><span class="formula-rhs">1000 × seeds ÷ area</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in square meters, and convertible to any of the 24 units on that chip.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in square meters, and convertible to any of the 24 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in kilograms per thousand square meters, and convertible to any of the 11 units on that chip.</li><li>Shown in square meters, and convertible to any of the 24 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Area, opening in square meters</li><li>Length, opening in meters</li><li>Area, opening in square meters</li><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Area, opening in square meters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Grass seed calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 4 figures keep coming back — the width, the area and the radius — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Write the answer down with its unit. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/guinea-pig-age">Guinea pig years to human years</a>, <a href="/biology/guinea-pig-pregnancy">Guinea pig pregnancy</a> and <a href="/biology/hamster-age">Hamster age</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Grass seed calculator work out?', 'a' => <<<'TXT'
            It returns length, derived from the width, the area and the radius. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Grass seed calculator?', 'a' => <<<'TXT'
            The form asks for the width, the area, the radius and a axis, which is 9 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter width in a different unit?', 'a' => <<<'TXT'
            Yes. Width opens in meters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Grass seed calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/guinea-pig-age', 'name' => 'Guinea pig years to human years'],
            ['path' => '/biology/guinea-pig-pregnancy', 'name' => 'Guinea pig pregnancy'],
            ['path' => '/biology/hamster-age', 'name' => 'Hamster age'],
        ],
    ],
];
