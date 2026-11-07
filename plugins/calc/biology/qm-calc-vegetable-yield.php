<?php

/**
 * Vegetable yield
 * /biology/vegetable-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Vegetable yield',
    'meta' => ['title' => 'Vegetable yield — Formula, Steps & Examples', 'description' => 'Supply the length of rows and number of rows and the Vegetable yield calculator solves for <strong>expected yield</strong>. The Vegetable yield calculator…', 'h1' => 'Vegetable yield Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'crop_type' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'dmr6H0rRnP-2U2oBamh9P', 'c' => null],
                ],
                'ds' => 'vXPXr8v6wnVw4SW94NSox',
            ],
            'expected_yield' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'garden_area' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'garden_length' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'garden_width' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'length_of_row' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'no_of_rows' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
                'dfl' => [
                    ['v' => '1', 'c' => null],
                ],
            ],
            'seed_distance' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'seed_distance_copy' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'yield_rate' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => '9fmzWjP-EHGlNDBeurk4X',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'crop_type',
                                    'vt' => 'valueSelect',
                                    'l' => 'Choose crop',
                                    'ds' => 'vXPXr8v6wnVw4SW94NSox',
                                    'opts' => [
                                        ['dmr6H0rRnP-2U2oBamh9P', 'Artichoke', '1'],
                                        ['-X3oXW_Y2arAm23x9oiSY', 'Beans  ', '2'],
                                        ['2Sl_mtuxLYo8FCEDP9GUg', 'Beets  ', '3'],
                                        ['p6wAixbSdsjE3wlCGY799', 'Broccoli  ', '4'],
                                        ['gREyfE_S-XvFEd4beSZC5', 'Brussel Sprouts', '5'],
                                        ['BankNF_jOwRd-cCJ2Ei9Q', 'Cabbage  ', '6'],
                                        ['BNbqIIgvIe13sXK0KmIUu', 'Carrots  ', '7'],
                                        ['pwWhOeKdOrZtgbnzyBXAr', 'Cauliflower  ', '8'],
                                        ['DWDuAlD1m9Az0p3WJ-WEF', 'Celery  ', '9'],
                                        ['VhGJDe36bWKwhrL86tC7f', 'Chard  ', '10'],
                                        ['i4YybqAcHYg22T1Rr2goD', 'Collards  ', '11'],
                                        ['lHA-bY59U4b56UIqJwSWn', 'Corn  ', '12'],
                                        ['4BVgZKjEHtNYgLIVeDIuh', 'Cucumbers  ', '13'],
                                        ['e_MxuLDu49P3bJreSJEOL', 'Eggplant  ', '14'],
                                        ['KJnaXHpB5Akpf6d4_okWM', 'Garlic  ', '15'],
                                        ['f6d_MmKRhtC2WWqScGK_3', 'Kale  ', '16'],
                                        ['Je8bcfJM-2lrCIxIMGYWC', 'Kohlrabi  ', '17'],
                                        ['ACgtHmk2DyecAfS_8B3b7', 'Leek  ', '18'],
                                        ['qg1aZMlY_o7Aa1LBserTR', 'Lettuce  ', '19'],
                                        ['dXJDOjLk4LFNTqH26k8hT', 'Melons  ', '20'],
                                        ['tnXniILBhg6F3_gaae1Lm', 'Okra  ', '21'],
                                        ['vV8jtYSYRXZHqKHHCdHMB', 'Onions  ', '22'],
                                        ['9tYr2FuSeRW-7G-ppJ8V2', 'Peas  ', '23'],
                                        ['5DVkTTdu636FjOzeZ0feX', 'Peppers  ', '24'],
                                        ['ckOm_9hPcVstT06yXkc2O', 'Potatoes  ', '25'],
                                        ['do2ZSVm6M3URjgTnldiLf', 'Pumpkins  ', '26'],
                                        ['wln9D19SX1nS-Dkeu728y', 'Radish  ', '27'],
                                        ['zS8FZkkcvbl2-7l586JqC', 'Spinach  ', '28'],
                                        ['bCjwWrtAZQhDT-_15cWUR', 'Squash  ', '29'],
                                        ['0CdGFBRgeT5Ig1AWDvtiC', 'Tomatoes  ', '30'],
                                        ['KkVeuD5YRJAyIbjCmPtFz', 'Turnips  ', '31'],
                                        ['u-6mWLhcEHX4OkWyXNqWc', 'Watermelons  ', '32'],
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
                                    'n' => 'length_of_row',
                                    'vt' => 'numerical',
                                    'l' => 'Length of rows',
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
                                    'n' => 'no_of_rows',
                                    'vt' => 'numerical',
                                    'l' => 'Number of rows',
                                    'suf' => 'row(s)',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'yield_rate', 'vt' => 'dependent', 'l' => 'Yield rate'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'seed_distance_copy',
                                    'vt' => 'numerical',
                                    'l' => 'Seed distance (isolation distance)',
                                    'h' => 'Minimum distance required between seeds.',
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
                                ['t' => 'v', 'n' => 'seed_distance', 'vt' => 'dependent', 'l' => 'Seed distance'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'expected_yield',
                                    'vt' => 'numerical',
                                    'l' => 'Expected yield',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'wiCh3d5VNl81sMbDBtofO',
                'title' => 'Farm/garden dimensions',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'garden_length',
                                    'vt' => 'numerical',
                                    'l' => 'Required length',
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
                                    'n' => 'garden_width',
                                    'vt' => 'numerical',
                                    'l' => 'Required width',
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
                                    'n' => 'garden_area',
                                    'vt' => 'numerical',
                                    'l' => 'Required area',
                                    'us' => '28',
                                    'du' => 'm2',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'expected_yield = length_of_row * one_way(no_of_rows) * one_way(yield_rate)',
                'var' => [
                    [
                        'l' => 'expected_yield',
                        'f' => 'length_of_row*(no_of_rows)*(yield_rate)',
                        'r' => ['length_of_row', 'no_of_rows', 'yield_rate'],
                    ],
                    [
                        'l' => 'length_of_row',
                        'f' => 'expected_yield/((no_of_rows)*(yield_rate))',
                        'r' => ['expected_yield', 'no_of_rows', 'yield_rate'],
                    ],
                ],
            ],
            [
                'formula' => 'seed_distance_copy = one_way(seed_distance)',
                'var' => [
                    [
                        'l' => 'seed_distance_copy',
                        'f' => '(seed_distance)',
                        'r' => ['seed_distance'],
                    ],
                ],
            ],
            [
                'formula' => 'garden_length = one_way(length_of_row + 3 + 2*seed_distance / 12)',
                'var' => [
                    [
                        'l' => 'garden_length',
                        'f' => '(length_of_row + (1/6)*seed_distance + 3)',
                        'r' => ['length_of_row', 'seed_distance'],
                    ],
                ],
            ],
            [
                'formula' => 'garden_width = one_way(((no_of_rows + 1) * seed_distance / 12) + (no_of_rows - 1) * 1.5)',
                'var' => [
                    [
                        'l' => 'garden_width',
                        'f' => '((1/12)*no_of_rows*seed_distance + (3/2)*no_of_rows + (1/12)*seed_distance - 3/2)',
                        'r' => ['no_of_rows', 'seed_distance'],
                    ],
                ],
            ],
            [
                'formula' => 'garden_area = one_way(garden_length * garden_width)',
                'var' => [
                    [
                        'l' => 'garden_area',
                        'f' => '((length_of_row + (1/6)*seed_distance + 3)*((1/12)*no_of_rows*seed_distance + (3/2)*no_of_rows + (1/12)*seed_distance - 3/2))',
                        'r' => ['length_of_row', 'no_of_rows', 'seed_distance'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'vXPXr8v6wnVw4SW94NSox' => [
                'name' => 'veggie',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'dmr6H0rRnP-2U2oBamh9P', 'label' => 'Artichoke', 'value' => '1'],
                    ['uid' => '-X3oXW_Y2arAm23x9oiSY', 'label' => 'Beans  ', 'value' => '2'],
                    ['uid' => '2Sl_mtuxLYo8FCEDP9GUg', 'label' => 'Beets  ', 'value' => '3'],
                    ['uid' => 'p6wAixbSdsjE3wlCGY799', 'label' => 'Broccoli  ', 'value' => '4'],
                    ['uid' => 'gREyfE_S-XvFEd4beSZC5', 'label' => 'Brussel Sprouts', 'value' => '5'],
                    ['uid' => 'BankNF_jOwRd-cCJ2Ei9Q', 'label' => 'Cabbage  ', 'value' => '6'],
                    ['uid' => 'BNbqIIgvIe13sXK0KmIUu', 'label' => 'Carrots  ', 'value' => '7'],
                    ['uid' => 'pwWhOeKdOrZtgbnzyBXAr', 'label' => 'Cauliflower  ', 'value' => '8'],
                    ['uid' => 'DWDuAlD1m9Az0p3WJ-WEF', 'label' => 'Celery  ', 'value' => '9'],
                    ['uid' => 'VhGJDe36bWKwhrL86tC7f', 'label' => 'Chard  ', 'value' => '10'],
                    ['uid' => 'i4YybqAcHYg22T1Rr2goD', 'label' => 'Collards  ', 'value' => '11'],
                    ['uid' => 'lHA-bY59U4b56UIqJwSWn', 'label' => 'Corn  ', 'value' => '12'],
                    ['uid' => '4BVgZKjEHtNYgLIVeDIuh', 'label' => 'Cucumbers  ', 'value' => '13'],
                    ['uid' => 'e_MxuLDu49P3bJreSJEOL', 'label' => 'Eggplant  ', 'value' => '14'],
                    ['uid' => 'KJnaXHpB5Akpf6d4_okWM', 'label' => 'Garlic  ', 'value' => '15'],
                    ['uid' => 'f6d_MmKRhtC2WWqScGK_3', 'label' => 'Kale  ', 'value' => '16'],
                    ['uid' => 'Je8bcfJM-2lrCIxIMGYWC', 'label' => 'Kohlrabi  ', 'value' => '17'],
                    ['uid' => 'ACgtHmk2DyecAfS_8B3b7', 'label' => 'Leek  ', 'value' => '18'],
                    ['uid' => 'qg1aZMlY_o7Aa1LBserTR', 'label' => 'Lettuce  ', 'value' => '19'],
                    ['uid' => 'dXJDOjLk4LFNTqH26k8hT', 'label' => 'Melons  ', 'value' => '20'],
                    ['uid' => 'tnXniILBhg6F3_gaae1Lm', 'label' => 'Okra  ', 'value' => '21'],
                    ['uid' => 'vV8jtYSYRXZHqKHHCdHMB', 'label' => 'Onions  ', 'value' => '22'],
                    ['uid' => '9tYr2FuSeRW-7G-ppJ8V2', 'label' => 'Peas  ', 'value' => '23'],
                    ['uid' => '5DVkTTdu636FjOzeZ0feX', 'label' => 'Peppers  ', 'value' => '24'],
                    ['uid' => 'ckOm_9hPcVstT06yXkc2O', 'label' => 'Potatoes  ', 'value' => '25'],
                    ['uid' => 'do2ZSVm6M3URjgTnldiLf', 'label' => 'Pumpkins  ', 'value' => '26'],
                    ['uid' => 'wln9D19SX1nS-Dkeu728y', 'label' => 'Radish  ', 'value' => '27'],
                    ['uid' => 'zS8FZkkcvbl2-7l586JqC', 'label' => 'Spinach  ', 'value' => '28'],
                    ['uid' => 'bCjwWrtAZQhDT-_15cWUR', 'label' => 'Squash  ', 'value' => '29'],
                    ['uid' => '0CdGFBRgeT5Ig1AWDvtiC', 'label' => 'Tomatoes  ', 'value' => '30'],
                    ['uid' => 'KkVeuD5YRJAyIbjCmPtFz', 'label' => 'Turnips  ', 'value' => '31'],
                    ['uid' => 'u-6mWLhcEHX4OkWyXNqWc', 'label' => 'Watermelons  ', 'value' => '32'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => 'Supply the length of rows and number of rows and the Vegetable yield calculator solves for <strong>expected yield</strong>.',
        'sections' => [
            ['title' => 'How does the Vegetable yield calculator work?', 'html' => <<<'TXT'
            <p>The Vegetable yield calculator takes the values in the form, applies the relationship described below and reports <strong>expected yield</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (choose crop); then you type in the length of rows and number of rows.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 32 options, such as artichoke, beans and beets. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A number, expressed in row(s).</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Choose crop</strong></td><td>One of 32 options, such as artichoke, beans and beets.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Length of rows</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Number of rows</strong></td><td>A number stated in row(s).</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Yield rate</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Seed distance (isolation distance)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Seed distance</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Expected yield</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Required length</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Required width</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Required area</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Vegetable yield calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Expected yield</span><span class="formula-eq">=</span><span class="formula-rhs">length of rows × (number of rows) × (yield rate)</span></div><div class="formula-row"><span class="formula-lhs">Seed distance (isolation distance)</span><span class="formula-eq">=</span><span class="formula-rhs">(seed distance)</span></div><div class="formula-row"><span class="formula-lhs">Required length</span><span class="formula-eq">=</span><span class="formula-rhs">(length of rows + (1 ÷ 6) × seed distance + 3)</span></div><div class="formula-row"><span class="formula-lhs">Required width</span><span class="formula-eq">=</span><span class="formula-rhs">((1 ÷ 12) × number of rows × seed distance + (3 ÷ 2) × number of rows + (1 ÷ 12) × seed distance − 3 ÷ 2)</span></div><div class="formula-row"><span class="formula-lhs">Required area</span><span class="formula-eq">=</span><span class="formula-rhs">((length of rows + (1 ÷ 6) × seed distance + 3) × ((1 ÷ 12) × number of rows × seed distance + (3 ÷ 2) × number of rows + (1 ÷ 12) × seed distance − 3 ÷ 2))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in square meters, and convertible to any of the 24 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in meters</li><li>Length, opening in centimeters</li><li>Mass, opening in kilograms</li><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Area, opening in square meters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Vegetable yield calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 2 figures keep coming back — the length of rows and number of rows — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Round only at the end. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/wastewater">Wastewater</a>, <a href="/biology/water-potential">Water potential</a> and <a href="/biology/water-soluble-fertilizer">Water soluble fertilizer</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Vegetable yield calculator work out?', 'a' => <<<'TXT'
            It returns expected yield, derived from the length of rows and number of rows. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Vegetable yield calculator?', 'a' => <<<'TXT'
            The form asks for the length of rows and number of rows, which is 3 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter length of rows in a different unit?', 'a' => <<<'TXT'
            Yes. Length of rows opens in meters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Yield rate = 0. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Vegetable yield calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/wastewater', 'name' => 'Wastewater'],
            ['path' => '/biology/water-potential', 'name' => 'Water potential'],
            ['path' => '/biology/water-soluble-fertilizer', 'name' => 'Water soluble fertilizer'],
        ],
    ],
];
