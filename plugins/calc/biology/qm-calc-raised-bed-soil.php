<?php

/**
 * Raised bed soil
 * /biology/raised-bed-soil
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Raised bed soil',
    'meta' => ['title' => 'Raised bed soil Calculator: Free, With Steps', 'description' => '<strong>how many raised beds?</strong> is what the Raised bed soil calculator works out, and it gets there from the length, the width, the depth and the…', 'h1' => 'Raised bed soil Calculator', 'updated' => '2026-06-17'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'mcm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'width',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'mcm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'depth',
                            'label' => 'Depth',
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
                            'name' => 'quantity',
                            'label' => 'How many raised beds?',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'soil_rect',
                            'label' => 'Volume of soil needed',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Soil mix recipe (optional)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'recipe',
                            'label' => 'Soil mix',
                            'type' => 'select',
                            'options' => ['60% topsoil - 30% compost - 10% aeration' => '0.6', '40% topsoil - 40% compost -20% aeration' => '0.4', '33% compost - 33% peat/coir - 33% aeration' => '0.3333', 'Custom mix' => ''],
                            'dataset' => 'soil_recipe',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'topsoil_perc',
                            'label' => 'Topsoil percentage',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compost_perc',
                            'label' => 'Compost percentage',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'others_perc',
                            'label' => 'Other ingredient percentage',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'topsoil',
                            'label' => 'Topsoil',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compost',
                            'label' => 'Compost',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'others',
                            'label' => 'Others',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'soil_rect =  quantity * depth * length * width',
            'results' => [
                'quantity' => 'soil_rect/(depth*length*width)',
                'length' => 'soil_rect/(depth*quantity*width)',
                'soil_rect' => 'depth*length*quantity*width',
                'depth' => 'soil_rect/(length*quantity*width)',
                'width' => 'soil_rect/(depth*length*quantity)',
            ],
        ],
        [
            'title' => 'topsoil = soil_rect *topsoil_perc',
            'results' => ['topsoil_perc' => 'topsoil/soil_rect', 'topsoil' => 'soil_rect*topsoil_perc', 'soil_rect' => 'topsoil/topsoil_perc'],
        ],
        [
            'title' => 'compost = soil_rect *compost_perc',
            'results' => ['compost' => 'compost_perc*soil_rect', 'soil_rect' => 'compost/compost_perc', 'compost_perc' => 'compost/soil_rect'],
        ],
        [
            'title' => 'others = soil_rect *others_perc',
            'results' => ['others' => 'others_perc*soil_rect', 'soil_rect' => 'others/others_perc', 'others_perc' => 'others/soil_rect'],
        ],
        [
            'title' => 'topsoil_perc + compost_perc +  others_perc = 1',
            'results' => ['topsoil_perc' => '-compost_perc - others_perc + 1', 'compost_perc' => '-others_perc - topsoil_perc + 1', 'others_perc' => '-compost_perc - topsoil_perc + 1'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <strong>how many raised beds?</strong> is what the Raised bed soil calculator works out, and it gets there from the length, the width, the depth and the volume of soil needed.
        TXT,
        'sections' => [
            ['title' => 'How does the Raised bed soil calculator work?', 'html' => <<<'TXT'
            <p>The Raised bed soil calculator takes the values in the form, applies the relationship described below and reports <strong>how many raised beds?</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the soil mix); then you type in the length, the width, the depth and the volume of soil needed.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in meters / centimeters. The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in meters / centimeters. The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in cubic meters. The unit chip switches it to any of the 40 supported units.</li><li>Pick the option that matches your case — 4 options, such as 60% topsoil - 30% compost - 10% aeration, 40% topsoil - 40% compost -20% aeration and 33% compost - 33% peat/coir - 33% aeration. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in cubic meters. The unit chip switches it to any of the 40 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Length</strong></td><td>A measured quantity, 34 units available.</td><td>meters / centimeters</td><td>You supply it</td></tr><tr><td><strong>Width</strong></td><td>A measured quantity, 34 units available.</td><td>meters / centimeters</td><td>You supply it</td></tr><tr><td><strong>Depth</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>How many raised beds?</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Volume of soil needed</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>You supply it</td></tr><tr><td><strong>Soil mix</strong></td><td>One of 4 options, such as 60% topsoil - 30% compost - 10% aeration, 40% topsoil - 40% compost -20% aeration and 33% compost - 33% peat/coir - 33% aeration.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Topsoil percentage</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Compost percentage</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Other ingredient percentage</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Topsoil</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>You supply it</td></tr><tr><td><strong>Compost</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>Calculated</td></tr><tr><td><strong>Others</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Raised bed soil calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">How many raised beds?</span><span class="formula-eq">=</span><span class="formula-rhs">volume of soil needed ÷ (depth × length × width)</span></div><div class="formula-row"><span class="formula-lhs">Topsoil percentage</span><span class="formula-eq">=</span><span class="formula-rhs">topsoil ÷ volume of soil needed</span></div><div class="formula-row"><span class="formula-lhs">Compost</span><span class="formula-eq">=</span><span class="formula-rhs">compost percentage × volume of soil needed</span></div><div class="formula-row"><span class="formula-lhs">Others</span><span class="formula-eq">=</span><span class="formula-rhs">other ingredient percentage × volume of soil needed</span></div><div class="formula-row"><span class="formula-lhs">Topsoil percentage</span><span class="formula-eq">=</span><span class="formula-rhs">-compost percentage − other ingredient percentage + 1</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in cubic meters, and convertible to any of the 40 units on that chip.</li><li>Shown in cubic meters, and convertible to any of the 40 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in meters / centimeters</li><li>Length, opening in meters / centimeters</li><li>Length, opening in centimeters</li><li>Volume, opening in cubic meters</li><li>%, opening in percent</li><li>%, opening in percent</li><li>%, opening in percent</li><li>Volume, opening in cubic meters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Raised bed soil calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 4 figures keep coming back — the length, the width and the depth — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/rat-cage">Rat cage</a>, <a href="/biology/raw-dog-food">Raw dog food</a> and <a href="/biology/sheep-gestation">Sheep gestation</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Raised bed soil calculator work out?', 'a' => <<<'TXT'
            It returns how many raised beds?, derived from the length, the width and the depth. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Raised bed soil calculator?', 'a' => <<<'TXT'
            The form asks for the length, the width, the depth and the volume of soil needed, which is 6 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter length in a different unit?', 'a' => <<<'TXT'
            Yes. Length opens in meters / centimeters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Topsoil percentage = 0 %. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Raised bed soil calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/rat-cage', 'name' => 'Rat cage'],
            ['path' => '/biology/raw-dog-food', 'name' => 'Raw dog food'],
            ['path' => '/biology/sheep-gestation', 'name' => 'Sheep gestation'],
        ],
    ],
];
