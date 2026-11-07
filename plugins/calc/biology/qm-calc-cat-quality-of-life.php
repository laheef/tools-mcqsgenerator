<?php

/**
 * Cat quality of life
 * /biology/cat-quality-of-life
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cat quality of life',
    'meta' => ['title' => 'Cat quality of life: Formula, Steps & Results', 'description' => 'The Cat quality of life calculator returns <strong>quality of life score</strong> from the 7 fields on the form. The Cat quality of life calculator takes the…', 'h1' => 'Cat quality of life Calculator', 'updated' => '2026-07-23'],
    'raw' => [
        'vars' => [
            'days' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'SS2XgPaqlNvwlBBURKTMS', 'c' => null],
                ],
                'ds' => 'wt1ODljx_oIWh6OA__HbM',
            ],
            'happiness' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'SS2XgPaqlNvwlBBURKTMS', 'c' => null],
                ],
                'ds' => 'wt1ODljx_oIWh6OA__HbM',
            ],
            'hunger' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'SS2XgPaqlNvwlBBURKTMS', 'c' => null],
                ],
                'ds' => 'wt1ODljx_oIWh6OA__HbM',
            ],
            'hurt' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'SS2XgPaqlNvwlBBURKTMS', 'c' => null],
                ],
                'ds' => 'wt1ODljx_oIWh6OA__HbM',
            ],
            'hydration' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'SS2XgPaqlNvwlBBURKTMS', 'c' => null],
                ],
                'ds' => 'wt1ODljx_oIWh6OA__HbM',
            ],
            'hygiene' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'SS2XgPaqlNvwlBBURKTMS', 'c' => null],
                ],
                'ds' => 'wt1ODljx_oIWh6OA__HbM',
            ],
            'mobility' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'SS2XgPaqlNvwlBBURKTMS', 'c' => null],
                ],
                'ds' => 'wt1ODljx_oIWh6OA__HbM',
            ],
            'sum_total' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => '3KRMsZt-2najZwJzKUt9j',
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
                                        [null, <<<'TXT'
                                        You can use this Quality of Life (QOL) Scale to determine your beloved cat's quality of life, and assess whether to proceed with hospice care or to consider euthanasia. For each item below, score your pet on a scale of 1 to 10, where 1 is unacceptable and 10 is excellent.
                                        TXT],
                                    ],
                                ],
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'To learn more about the scale and each item, see the "How is quality of life measured for cats?" section in the article.'],
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
                                    'n' => 'hurt',
                                    'vt' => 'valueSelect',
                                    'l' => 'Hurt  ',
                                    'h' => 'Is your cat\'s pain under adequate control?',
                                    'ds' => 'wt1ODljx_oIWh6OA__HbM',
                                    'opts' => [
                                        ['u6A6KohvHvINpKMr6aoXD', '1', '1'],
                                        ['QOA9k6O82M9MAPYLe82jY', '2', '2'],
                                        ['crawt8292GWtS4FGAoM-F', '3', '3'],
                                        ['xr2oj07lPMfKatR5YELky', '4', '4'],
                                        ['TFKpHh2rPxA5rotwuuWt2', '5', '5'],
                                        ['3dYDPOgAYGSumWQAmvWiP', '6', '6'],
                                        ['puH7C6lyFAkn1w5yXy7Zv', '7', '7'],
                                        ['6KhqfKTRq5WEFBhxELurv', '8', '8'],
                                        ['wmkUplOaY-3uDoQdbWG5U', '9', '9'],
                                        ['SS2XgPaqlNvwlBBURKTMS', '10', '10'],
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
                                    'n' => 'hunger',
                                    'vt' => 'valueSelect',
                                    'l' => 'Hunger  ',
                                    'h' => 'Is your cat eating enough? Do you need to hand-feed them?',
                                    'ds' => 'wt1ODljx_oIWh6OA__HbM',
                                    'opts' => [
                                        ['u6A6KohvHvINpKMr6aoXD', '1', '1'],
                                        ['QOA9k6O82M9MAPYLe82jY', '2', '2'],
                                        ['crawt8292GWtS4FGAoM-F', '3', '3'],
                                        ['xr2oj07lPMfKatR5YELky', '4', '4'],
                                        ['TFKpHh2rPxA5rotwuuWt2', '5', '5'],
                                        ['3dYDPOgAYGSumWQAmvWiP', '6', '6'],
                                        ['puH7C6lyFAkn1w5yXy7Zv', '7', '7'],
                                        ['6KhqfKTRq5WEFBhxELurv', '8', '8'],
                                        ['wmkUplOaY-3uDoQdbWG5U', '9', '9'],
                                        ['SS2XgPaqlNvwlBBURKTMS', '10', '10'],
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
                                    'n' => 'hydration',
                                    'vt' => 'valueSelect',
                                    'l' => 'Hydration ',
                                    'h' => 'Is your cat hydrated? Do they need subcutaneous fluids to stay hydrated?',
                                    'ds' => 'wt1ODljx_oIWh6OA__HbM',
                                    'opts' => [
                                        ['u6A6KohvHvINpKMr6aoXD', '1', '1'],
                                        ['QOA9k6O82M9MAPYLe82jY', '2', '2'],
                                        ['crawt8292GWtS4FGAoM-F', '3', '3'],
                                        ['xr2oj07lPMfKatR5YELky', '4', '4'],
                                        ['TFKpHh2rPxA5rotwuuWt2', '5', '5'],
                                        ['3dYDPOgAYGSumWQAmvWiP', '6', '6'],
                                        ['puH7C6lyFAkn1w5yXy7Zv', '7', '7'],
                                        ['6KhqfKTRq5WEFBhxELurv', '8', '8'],
                                        ['wmkUplOaY-3uDoQdbWG5U', '9', '9'],
                                        ['SS2XgPaqlNvwlBBURKTMS', '10', '10'],
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
                                    'n' => 'hygiene',
                                    'vt' => 'valueSelect',
                                    'l' => 'Hygiene  ',
                                    'h' => 'Does your cat need to be cleaned, especially after elimination?',
                                    'ds' => 'wt1ODljx_oIWh6OA__HbM',
                                    'opts' => [
                                        ['u6A6KohvHvINpKMr6aoXD', '1', '1'],
                                        ['QOA9k6O82M9MAPYLe82jY', '2', '2'],
                                        ['crawt8292GWtS4FGAoM-F', '3', '3'],
                                        ['xr2oj07lPMfKatR5YELky', '4', '4'],
                                        ['TFKpHh2rPxA5rotwuuWt2', '5', '5'],
                                        ['3dYDPOgAYGSumWQAmvWiP', '6', '6'],
                                        ['puH7C6lyFAkn1w5yXy7Zv', '7', '7'],
                                        ['6KhqfKTRq5WEFBhxELurv', '8', '8'],
                                        ['wmkUplOaY-3uDoQdbWG5U', '9', '9'],
                                        ['SS2XgPaqlNvwlBBURKTMS', '10', '10'],
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
                                    'n' => 'happiness',
                                    'vt' => 'valueSelect',
                                    'l' => 'Happiness ',
                                    'h' => 'Does your cat express joy and show other emotional signs?',
                                    'ds' => 'wt1ODljx_oIWh6OA__HbM',
                                    'opts' => [
                                        ['u6A6KohvHvINpKMr6aoXD', '1', '1'],
                                        ['QOA9k6O82M9MAPYLe82jY', '2', '2'],
                                        ['crawt8292GWtS4FGAoM-F', '3', '3'],
                                        ['xr2oj07lPMfKatR5YELky', '4', '4'],
                                        ['TFKpHh2rPxA5rotwuuWt2', '5', '5'],
                                        ['3dYDPOgAYGSumWQAmvWiP', '6', '6'],
                                        ['puH7C6lyFAkn1w5yXy7Zv', '7', '7'],
                                        ['6KhqfKTRq5WEFBhxELurv', '8', '8'],
                                        ['wmkUplOaY-3uDoQdbWG5U', '9', '9'],
                                        ['SS2XgPaqlNvwlBBURKTMS', '10', '10'],
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
                                    'n' => 'mobility',
                                    'vt' => 'valueSelect',
                                    'l' => 'Mobility ',
                                    'h' => 'Can your cat get up without assistance? Do they regularly want to go for a walk?',
                                    'ds' => 'wt1ODljx_oIWh6OA__HbM',
                                    'opts' => [
                                        ['u6A6KohvHvINpKMr6aoXD', '1', '1'],
                                        ['QOA9k6O82M9MAPYLe82jY', '2', '2'],
                                        ['crawt8292GWtS4FGAoM-F', '3', '3'],
                                        ['xr2oj07lPMfKatR5YELky', '4', '4'],
                                        ['TFKpHh2rPxA5rotwuuWt2', '5', '5'],
                                        ['3dYDPOgAYGSumWQAmvWiP', '6', '6'],
                                        ['puH7C6lyFAkn1w5yXy7Zv', '7', '7'],
                                        ['6KhqfKTRq5WEFBhxELurv', '8', '8'],
                                        ['wmkUplOaY-3uDoQdbWG5U', '9', '9'],
                                        ['SS2XgPaqlNvwlBBURKTMS', '10', '10'],
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
                                    'n' => 'days',
                                    'vt' => 'valueSelect',
                                    'l' => 'More good days than bad',
                                    'h' => 'Do your cat\'s good days outnumber their bad days?&nbsp;',
                                    'ds' => 'wt1ODljx_oIWh6OA__HbM',
                                    'opts' => [
                                        ['u6A6KohvHvINpKMr6aoXD', '1', '1'],
                                        ['QOA9k6O82M9MAPYLe82jY', '2', '2'],
                                        ['crawt8292GWtS4FGAoM-F', '3', '3'],
                                        ['xr2oj07lPMfKatR5YELky', '4', '4'],
                                        ['TFKpHh2rPxA5rotwuuWt2', '5', '5'],
                                        ['3dYDPOgAYGSumWQAmvWiP', '6', '6'],
                                        ['puH7C6lyFAkn1w5yXy7Zv', '7', '7'],
                                        ['6KhqfKTRq5WEFBhxELurv', '8', '8'],
                                        ['wmkUplOaY-3uDoQdbWG5U', '9', '9'],
                                        ['SS2XgPaqlNvwlBBURKTMS', '10', '10'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'sum_total', 'vt' => 'numerical', 'l' => 'Quality of life score'],
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
                                        ['sum_total <= 35', <<<'TXT'
                                        According to your score, your cat has an unaccaptable quality of life and shouldn't continue with hospice care. This score could serve as a starting point for you to further explore your cat's quality of life with the help of your veterinarian.
                                        TXT],
                                        ['sum_total > 35 and sum_total < 70', 'Your score of {{sum_total.formattedValue}} points indicates an acceptable quality of life for your cat, and that they can continue with hospice care.'],
                                        ['sum_total == 70', 'Your score of {{sum_total.formattedValue}} points is an excellent (purrfect) result! You can confidently continue with cat hospice care 🐈'],
                                        [null, '❗ This tool should not replace the professional recommendation of a veterinarian.'],
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
                'formula' => 'sum_total = one_way(hurt + hunger + hydration + hygiene + happiness + mobility + days)',
                'var' => [
                    [
                        'l' => 'sum_total',
                        'f' => '(days + happiness + hunger + hurt + hydration + hygiene + mobility)',
                        'r' => [
                            'days',
                            'happiness',
                            'hunger',
                            'hurt',
                            'hydration',
                            'hygiene',
                            'mobility',
                        ],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'wt1ODljx_oIWh6OA__HbM' => [
                'name' => 'Scale',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'u6A6KohvHvINpKMr6aoXD', 'label' => '1', 'value' => '1'],
                    ['uid' => 'QOA9k6O82M9MAPYLe82jY', 'label' => '2', 'value' => '2'],
                    ['uid' => 'crawt8292GWtS4FGAoM-F', 'label' => '3', 'value' => '3'],
                    ['uid' => 'xr2oj07lPMfKatR5YELky', 'label' => '4', 'value' => '4'],
                    ['uid' => 'TFKpHh2rPxA5rotwuuWt2', 'label' => '5', 'value' => '5'],
                    ['uid' => '3dYDPOgAYGSumWQAmvWiP', 'label' => '6', 'value' => '6'],
                    ['uid' => 'puH7C6lyFAkn1w5yXy7Zv', 'label' => '7', 'value' => '7'],
                    ['uid' => '6KhqfKTRq5WEFBhxELurv', 'label' => '8', 'value' => '8'],
                    ['uid' => 'wmkUplOaY-3uDoQdbWG5U', 'label' => '9', 'value' => '9'],
                    ['uid' => 'SS2XgPaqlNvwlBBURKTMS', 'label' => '10', 'value' => '10'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => 'The Cat quality of life calculator returns <strong>quality of life score</strong> from the 7 fields on the form.',
        'sections' => [
            ['title' => 'How does the Cat quality of life calculator work?', 'html' => <<<'TXT'
            <p>The Cat quality of life calculator takes the values in the form, applies the relationship described below and reports <strong>quality of life score</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the hurt, the hunger and the hydration).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 10 options, such as 1, 2 and 3. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 10 options, such as 1, 2 and 3. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 10 options, such as 1, 2 and 3. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 10 options, such as 1, 2 and 3. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 10 options, such as 1, 2 and 3. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 10 options, such as 1, 2 and 3. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 10 options, such as 1, 2 and 3. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li></ul><p>7 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Hurt</strong></td><td>One of 10 options, such as 1, 2 and 3.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Hunger</strong></td><td>One of 10 options, such as 1, 2 and 3.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Hydration</strong></td><td>One of 10 options, such as 1, 2 and 3.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Hygiene</strong></td><td>One of 10 options, such as 1, 2 and 3.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Happiness</strong></td><td>One of 10 options, such as 1, 2 and 3.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Mobility</strong></td><td>One of 10 options, such as 1, 2 and 3.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>More good days than bad</strong></td><td>One of 10 options, such as 1, 2 and 3.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Quality of life score</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Cat quality of life calculator', 'html' => <<<'TXT'
            <p>One relationship drives the whole page:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Quality of life score</span><span class="formula-eq">=</span><span class="formula-rhs">(more good days than bad + happiness + hunger + hurt + hydration + hygiene + mobility)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>The form opens with a complete set of values: <strong>Hurt</strong> set to 10, <strong>Hunger</strong> set to 10, <strong>Hydration</strong> set to 10 and <strong>Hygiene</strong> set to 10. Straight away the calculator returns <strong>Quality of life score</strong> = 70.</p><p>Those are real numbers produced by the same engine that runs when you press Calculate, so you can change any single box afterwards and watch the answer move from this starting point.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Quality of life score</strong> = 70 should be roughly the size you expected from <strong>Hurt</strong> set to 10 and <strong>Hunger</strong> set to 10.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Cat quality of life calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Round only at the end. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Write the answer down with its unit. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/catculator">Catculator</a>, <a href="/biology/cattle-per-acre">Cattle per acre</a> and <a href="/biology/cell-dilution">Cell dilution</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat quality of life calculator work out?', 'a' => <<<'TXT'
            It returns quality of life score. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Cat quality of life calculator?', 'a' => <<<'TXT'
            The form asks for a few values, which is 7 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (7 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Quality of life score = 70. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Cat quality of life calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/catculator', 'name' => 'Catculator'],
            ['path' => '/biology/cattle-per-acre', 'name' => 'Cattle per acre'],
            ['path' => '/biology/cell-dilution', 'name' => 'Cell dilution'],
        ],
    ],
];
