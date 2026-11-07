<?php

/**
 * Cephalexin for dogs dosage
 * /biology/cephalexin-for-dogs-dosage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cephalexin for dogs dosage',
    'meta' => ['title' => 'Cephalexin for dogs dosage — Formula & Results', 'description' => '<strong>amount per dose</strong> is what the Cephalexin for dogs dosage calculator works out, and it gets there from your dog\'s weight and the liquid per dose.', 'h1' => 'Cephalexin for dogs dosage Calculator', 'updated' => '2026-05-22'],
    'raw' => [
        'vars' => [
            'dailyDosage' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'dosage' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'form' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'eay-loQ4FYdoUG3X6UcYY', 'c' => null],
                ],
                'ds' => 'CXqdqraiaTqswhgEA9ZZh',
            ],
            'number' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'totalNumber' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'totalVolume' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'volume' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'F3vEgrXvPnenQUsZEjUmD',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => 'Your dog\'s weight',
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
                                    'n' => 'dosage',
                                    'vt' => 'numerical',
                                    'l' => 'Amount per dose',
                                    'us' => '22',
                                    'du' => 'mg',
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
                                    'n' => 'form',
                                    'vt' => 'valueSelect',
                                    'l' => 'Drug type',
                                    'ds' => 'CXqdqraiaTqswhgEA9ZZh',
                                    'opts' => [
                                        ['e5xeGNg1zXcjiK8CtWRxz', 'Tablets (250 mg)', '250'],
                                        ['ZikVLaNfd6c2mOUEQCKNR', 'Tablets (500 mg)', '500'],
                                        ['ZvPZKV1UpFwlkY-rt8KIa', 'Chewable tablets (75 mg)', '75'],
                                        ['eay-loQ4FYdoUG3X6UcYY', 'Chewable tablets (150 mg)', '150'],
                                        ['kMnfRUOBPDBUmpkpxnwBE', 'Chewable tablets (300 mg)', '300'],
                                        ['gaa0KQBLHJgcGGNlsujXm', 'Chewable tablets (600 mg)', '600'],
                                        ['oz7nkKp0akqmsmOshs_A8', 'Liquid (125 mg/5 mL)', '25'],
                                        ['dgCxldzA1Dr2yTC5Qvf0N', 'Liquid (250 mg/5 mL)', '50'],
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
                                    'n' => 'volume',
                                    'vt' => 'numerical',
                                    'l' => 'Liquid per dose',
                                    'us' => '20',
                                    'du' => 'ml',
                                    'oo' => 1,
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
                                    'n' => 'number',
                                    'vt' => 'numerical',
                                    'l' => '~Tablets per dose',
                                    'suf' => '#',
                                ],
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
                                        [null, 'It seems that the chosen tablets may be too strong for your dog. Please select another drug type.'],
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
                                    'n' => 'dailyDosage',
                                    'vt' => 'numerical',
                                    'l' => 'Daily dosage',
                                    'h' => 'With 2 doses per day, given every 12 hours.',
                                    'us' => '22',
                                    'du' => 'mg',
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
                                    'n' => 'totalVolume',
                                    'vt' => 'numerical',
                                    'l' => 'Total liquid',
                                    'h' => 'With 2 doses per day, administered every 12 hours.',
                                    'us' => '20',
                                    'du' => 'ml',
                                    'oo' => 1,
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
                                    'n' => 'totalNumber',
                                    'vt' => 'numerical',
                                    'l' => '~Tablets per day',
                                    'suf' => '#',
                                    'h' => 'With 2 doses per day, administered every 12 hours.',
                                ],
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
                                        [null, '📍 The calculated dosage is based on NOAH recommendations and is equal to 15 mg/kg per dose.'],
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
                'formula' => 'dosage = 15 * weight',
                'var' => [
                    [
                        'l' => 'dosage',
                        'f' => '15*weight',
                        'r' => ['weight'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => '(1/15)*dosage',
                        'r' => ['dosage'],
                    ],
                ],
            ],
            [
                'formula' => '30 * weight = dailyDosage',
                'var' => [
                    [
                        'l' => 'dailyDosage',
                        'f' => '30*weight',
                        'r' => ['weight'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => '(1/30)*dailyDosage',
                        'r' => ['dailyDosage'],
                    ],
                ],
            ],
            [
                'formula' => 'dosage/form = volume',
                'var' => [
                    [
                        'l' => 'form',
                        'f' => 'dosage/volume',
                        'r' => ['dosage', 'volume'],
                    ],
                    [
                        'l' => 'dosage',
                        'f' => 'form*volume',
                        'r' => ['form', 'volume'],
                    ],
                    [
                        'l' => 'volume',
                        'f' => 'dosage/form',
                        'r' => ['form', 'dosage'],
                    ],
                ],
            ],
            [
                'formula' => 'dailyDosage/form = totalVolume',
                'var' => [
                    [
                        'l' => 'totalVolume',
                        'f' => 'dailyDosage/form',
                        'r' => ['dailyDosage', 'form'],
                    ],
                    [
                        'l' => 'dailyDosage',
                        'f' => 'form*totalVolume',
                        'r' => ['totalVolume', 'form'],
                    ],
                    [
                        'l' => 'form',
                        'f' => 'dailyDosage/totalVolume',
                        'r' => ['totalVolume', 'dailyDosage'],
                    ],
                ],
            ],
            [
                'formula' => 'number = floor(dosage/form+0.2)',
                'var' => [
                    [
                        'l' => 'number',
                        'f' => 'floor((dosage + (1/5)*form)/form)',
                        'r' => ['dosage', 'form'],
                    ],
                ],
            ],
            [
                'formula' => 'totalNumber = one_way(2*number)',
                'var' => [
                    [
                        'l' => 'totalNumber',
                        'f' => '(2*floor((dosage + (1/5)*form)/form))',
                        'r' => ['dosage', 'form'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'CXqdqraiaTqswhgEA9ZZh' => [
                'name' => 'type',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'e5xeGNg1zXcjiK8CtWRxz', 'label' => 'Tablets (250 mg)', 'value' => '250'],
                    ['uid' => 'ZikVLaNfd6c2mOUEQCKNR', 'label' => 'Tablets (500 mg)', 'value' => '500'],
                    ['uid' => 'ZvPZKV1UpFwlkY-rt8KIa', 'label' => 'Chewable tablets (75 mg)', 'value' => '75'],
                    ['uid' => 'eay-loQ4FYdoUG3X6UcYY', 'label' => 'Chewable tablets (150 mg)', 'value' => '150'],
                    ['uid' => 'kMnfRUOBPDBUmpkpxnwBE', 'label' => 'Chewable tablets (300 mg)', 'value' => '300'],
                    ['uid' => 'gaa0KQBLHJgcGGNlsujXm', 'label' => 'Chewable tablets (600 mg)', 'value' => '600'],
                    ['uid' => 'oz7nkKp0akqmsmOshs_A8', 'label' => 'Liquid (125 mg/5 mL)', 'value' => '25'],
                    ['uid' => 'dgCxldzA1Dr2yTC5Qvf0N', 'label' => 'Liquid (250 mg/5 mL)', 'value' => '50'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => '<strong>amount per dose</strong> is what the Cephalexin for dogs dosage calculator works out, and it gets there from your dog\'s weight and the liquid per dose.',
        'sections' => [
            ['title' => 'How does the Cephalexin for dogs dosage calculator work?', 'html' => <<<'TXT'
            <p>The Cephalexin for dogs dosage calculator takes the values in the form, applies the relationship described below and reports <strong>amount per dose</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in your dog's weight and the liquid per dose.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in milliliters. The unit chip switches it to any of the 40 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Your dog's weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Amount per dose</strong></td><td>A measured quantity, 29 units available.</td><td>milligrams</td><td>Calculated</td></tr><tr><td><strong>Drug type</strong></td><td>One of 8 options, such as tablets (250 mg), tablets (500 mg) and chewable tablets (75 mg).</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Liquid per dose</strong></td><td>A measured quantity, 40 units available.</td><td>milliliters</td><td>You supply it</td></tr><tr><td><strong>~Tablets per dose</strong></td><td>A number stated in #.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Daily dosage</strong></td><td>A measured quantity, 29 units available.</td><td>milligrams</td><td>Calculated</td></tr><tr><td><strong>Total liquid</strong></td><td>A measured quantity, 40 units available.</td><td>milliliters</td><td>Calculated</td></tr><tr><td><strong>~Tablets per day</strong></td><td>A number stated in #.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Cephalexin for dogs dosage calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Amount per dose</span><span class="formula-eq">=</span><span class="formula-rhs">15 × your dog&#x27;s weight</span></div><div class="formula-row"><span class="formula-lhs">Daily dosage</span><span class="formula-eq">=</span><span class="formula-rhs">30 × your dog&#x27;s weight</span></div><div class="formula-row"><span class="formula-lhs">Drug type</span><span class="formula-eq">=</span><span class="formula-rhs">amount per dose ÷ liquid per dose</span></div><div class="formula-row"><span class="formula-lhs">Total liquid</span><span class="formula-eq">=</span><span class="formula-rhs">daily dosage ÷ drug type</span></div><div class="formula-row"><span class="formula-lhs">~Tablets per dose</span><span class="formula-eq">=</span><span class="formula-rhs">rounded down, ((amount per dose + (1 ÷ 5) × drug type) ÷ drug type)</span></div><div class="formula-row"><span class="formula-lhs">~Tablets per day</span><span class="formula-eq">=</span><span class="formula-rhs">(2 × rounded down, ((amount per dose + (1 ÷ 5) × drug type) ÷ drug type))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in milligrams, and convertible to any of the 29 units on that chip.</li><li>Shown in milligrams, and convertible to any of the 29 units on that chip.</li><li>The option the calculation settles on.</li><li>Shown in milliliters, and convertible to any of the 40 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Mass, opening in milligrams</li><li>Volume, opening in milliliters</li><li>Mass, opening in milligrams</li><li>Volume, opening in milliliters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Cephalexin for dogs dosage calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 2 figures keep coming back — your dog's weight and the liquid per dose — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Write the answer down with its unit. </li><li>Round only at the end. </li><li>Keep the units you enter consistent. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/co2-grow-room">CO₂ grow room</a>, <a href="/biology/compost">Compost</a> and <a href="/biology/corn-yield">Corn yield</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cephalexin for dogs dosage calculator work out?', 'a' => <<<'TXT'
            It returns amount per dose, derived from your dog's weight and the liquid per dose. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Cephalexin for dogs dosage calculator?', 'a' => <<<'TXT'
            The form asks for your dog's weight and the liquid per dose, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter your dog\'s weight in a different unit?', 'a' => <<<'TXT'
            Yes. Your dog's weight opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Cephalexin for dogs dosage calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/co2-grow-room', 'name' => 'CO₂ grow room'],
            ['path' => '/biology/compost', 'name' => 'Compost'],
            ['path' => '/biology/corn-yield', 'name' => 'Corn yield'],
        ],
    ],
];
