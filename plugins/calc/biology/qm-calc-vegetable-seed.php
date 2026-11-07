<?php

/**
 * Vegetable seed
 * /biology/vegetable-seed
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Vegetable seed',
    'meta' => ['title' => 'Vegetable seed Calculator — Formula & Results', 'description' => 'Supply the length of row, the no. of rows and the no. of seedlings and the Vegetable seed calculator solves for <strong>no. of seeds</strong>.', 'h1' => 'Vegetable seed Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => 'Spacing for seeds',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'seedType',
                            'label' => 'Type of seed',
                            'type' => 'select',
                            'options' => [
                                'Beans/Chard/Garlic' => '4',
                                'Beets/Carrots/Cauliflower/Turnips' => '2',
                                'Broccoli/Cabbage' => '9',
                                'Brussel sprouts/Melons/Watermelons' => '12',
                                'Collards/Corn/Kale/Kohlrabi' => '8',
                                'Okra/Squash/Potatoes' => '8.0000000001',
                                'Cucumbers' => '10',
                                'Gourds/Pumpkins' => '18',
                                'Leek/Onions/Spinach' => '3',
                                'Lettuce' => '6',
                                'Peas/Radish' => '1',
                                'Peppers/Celery/Eggplant' => '0',
                                'Artichoke' => '0.25',
                                'Tomatoes' => '0.5',
                                'Enter custom seed distance' => '',
                            ],
                            'dataset' => 'seed',
                            'control' => 'DROPDOWN',
                            'default' => 'Cucumbers',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lengthOfRow',
                            'label' => 'Length of row',
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
                            'name' => 'noOfRows',
                            'label' => 'No. of rows',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'seedDistance',
                            'label' => 'Seed distance',
                            'type' => 'result',
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
                            'name' => 'noOfSeeds',
                            'label' => 'No. of seeds ',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'These seeds require very little spacing for germination. They may be sown by simply sprinkling the seeds on the earth for adequate spacing.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Spacing for seedlings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'seedlingType',
                            'label' => 'Seedling type',
                            'type' => 'select',
                            'options' => [
                                'Artichoke' => '48',
                                'Beans/Carrots' => '4',
                                'Beets' => '3',
                                'Peas' => '1',
                                'Garlic' => '6',
                                'Cucumbers/Corn/Broccoli/Cauliflower' => '12',
                                'Kale/Kohlrabi/Collards' => '12.000000000001',
                                'Brussel sprouts/Eggplant/Melons' => '18',
                                'Cabbage' => '15',
                                'Celery/Lettuce' => '8',
                                'Chard' => '6',
                                'Gourds/Pumpkins/Tomatoes' => '24',
                                'Leek' => '4',
                                'Okra/Peppers/Squash/Potatoes' => '12',
                                'Onions/Spinach' => '6',
                                'Turnips' => '4',
                                'Radish' => '2',
                                'Watermelons' => '18',
                                'Enter custom seedling distance' => '',
                            ],
                            'dataset' => 'seedlingType',
                            'control' => 'DROPDOWN',
                            'default' => 'Cucumbers/Corn/Broccoli/Cauliflower',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lengthOfRow1',
                            'label' => 'Length of row',
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
                            'name' => 'noOfRows1',
                            'label' => 'No. of rows',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'seedlingDistance',
                            'label' => 'Seedling distance',
                            'type' => 'result',
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
                            'name' => 'noOfSeedlings',
                            'label' => 'No. of seedlings',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'noOfSeeds = floor(lengthOfRow/seedDistance) * noOfRows',
            'results' => ['noOfSeeds' => 'noOfRows*floor(lengthOfRow/seedDistance)', 'noOfRows' => 'noOfSeeds/floor(lengthOfRow/seedDistance)'],
        ],
        [
            'title' => 'noOfSeedlings = floor(lengthOfRow1/seedlingDistance) * noOfRows1',
            'results' => ['noOfRows1' => 'noOfSeedlings/floor(lengthOfRow1/seedlingDistance)', 'noOfSeedlings' => 'noOfRows1*floor(lengthOfRow1/seedlingDistance)'],
        ],
    ],
    'article' => [
        'intro' => 'Supply the length of row, the no. of rows and the no. of seedlings and the Vegetable seed calculator solves for <strong>no. of seeds</strong>.',
        'sections' => [
            ['title' => 'How does the Vegetable seed calculator work?', 'html' => <<<'TXT'
            <p>The Vegetable seed calculator takes the values in the form, applies the relationship described below and reports <strong>no. of seeds</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the type of seed and the seedling type); then you type in the length of row (Spacing for seeds), the no. of rows (Spacing for seeds), the length of row (Spacing for seedlings) and the no. of seedlings.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 15 options, such as beans/Chard/Garlic, beets/Carrots/Cauliflower/Turnips and broccoli/Cabbage. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A plain number with no unit attached.</li><li>Pick the option that matches your case — 19 options, such as artichoke, beans/Carrots and beets. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A plain number with no unit attached.</li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Type of seed</strong></td><td>One of 15 options, such as beans/Chard/Garlic, beets/Carrots/Cauliflower/Turnips and broccoli/Cabbage.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Length of row (Spacing for seeds)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>No. of rows (Spacing for seeds)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Seed distance</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>No. of seeds</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Seedling type</strong></td><td>One of 19 options, such as artichoke, beans/Carrots and beets.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Length of row (Spacing for seedlings)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>No. of rows (Spacing for seedlings)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Seedling distance</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>No. of seedlings</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Vegetable seed calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">No. of seeds</span><span class="formula-eq">=</span><span class="formula-rhs">no. of rows × rounded down, (length of row ÷ seed distance)</span></div><div class="formula-row"><span class="formula-lhs">No. of rows</span><span class="formula-eq">=</span><span class="formula-rhs">no. of seedlings ÷ rounded down, (length of row ÷ seedling distance)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Vegetable seed calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 3 figures keep coming back — the length of row, the no. of rows and the no. of seedlings — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Round only at the end. </li><li>Keep the units you enter consistent. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/vegetable-yield">Vegetable yield</a>, <a href="/biology/wastewater">Wastewater</a> and <a href="/biology/water-potential">Water potential</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Vegetable seed calculator work out?', 'a' => <<<'TXT'
            It returns no. of seeds, derived from the length of row, the no. of rows and the no. of seedlings. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Vegetable seed calculator?', 'a' => <<<'TXT'
            The form asks for the length of row, the no. of rows and the no. of seedlings, which is 6 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter length of row (Spacing for seeds) in a different unit?', 'a' => <<<'TXT'
            Yes. Length of row (Spacing for seeds) opens in centimeters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (2 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Seed distance = 0 cm. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Vegetable seed calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/vegetable-yield', 'name' => 'Vegetable yield'],
            ['path' => '/biology/wastewater', 'name' => 'Wastewater'],
            ['path' => '/biology/water-potential', 'name' => 'Water potential'],
        ],
    ],
];
