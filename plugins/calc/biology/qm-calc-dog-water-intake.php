<?php

/**
 * Dog water intake
 * /biology/dog-water-intake
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog water intake',
    'meta' => ['title' => 'Dog water intake — Formula, Steps & Examples', 'description' => 'The Dog water intake calculator takes the numbers you enter and reports <strong>weight</strong> immediately. The Dog water intake calculator takes the values…', 'h1' => 'Dog water intake Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'activity_level' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '5r5VjiJCbM29zKB6DzlfR', 'c' => null],
                ],
                'ds' => 'hdKpGTiVp2LO8NoglM9Qt',
            ],
            'water_intake' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'zWKJXHjwM60FpZjkKQbpL',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'activity_level',
                                    'vt' => 'valueSelect',
                                    'l' => 'Activity level',
                                    'ds' => 'hdKpGTiVp2LO8NoglM9Qt',
                                    'opts' => [
                                        ['bhXOIx4cY8gSxniuP66Rn', 'Low', '40'],
                                        ['5r5VjiJCbM29zKB6DzlfR', 'Medium', '50'],
                                        ['QCRQqYBrykHsyelUW1BUC', 'High ', '60'],
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
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => 'Weight',
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
                                    'n' => 'water_intake',
                                    'vt' => 'numerical',
                                    'l' => 'Daily water intake',
                                    'h' => 'The calculated value is approximation. It may differ based on the dog\'s health, diet and other important factors.',
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
                                    't' => 'x',
                                    'c' => [
                                        [null, <<<'TXT'
                                        This tool is for information purposes only; water intake should always be calculated separately and double-checked by the health care provider. Consult a veterinarian.
                                        TXT],
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
                'formula' => 'water_intake = weight * activity_level',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => 'water_intake/activity_level',
                        'r' => ['water_intake', 'activity_level'],
                    ],
                    [
                        'l' => 'water_intake',
                        'f' => 'activity_level*weight',
                        'r' => ['weight', 'activity_level'],
                    ],
                    [
                        'l' => 'activity_level',
                        'f' => 'water_intake/weight',
                        'r' => ['weight', 'water_intake'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'hdKpGTiVp2LO8NoglM9Qt' => [
                'name' => 'Activity level',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'bhXOIx4cY8gSxniuP66Rn', 'label' => 'Low', 'value' => '40'],
                    ['uid' => '5r5VjiJCbM29zKB6DzlfR', 'label' => 'Medium', 'value' => '50'],
                    ['uid' => 'QCRQqYBrykHsyelUW1BUC', 'label' => 'High ', 'value' => '60'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => 'The Dog water intake calculator takes the numbers you enter and reports <strong>weight</strong> immediately.',
        'sections' => [
            ['title' => 'How does the Dog water intake calculator work?', 'html' => <<<'TXT'
            <p>The Dog water intake calculator takes the values in the form, applies the relationship described below and reports <strong>weight</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the activity level); then you type in the daily water intake.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 3 options, such as low, medium and high. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in milliliters. The unit chip switches it to any of the 40 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Activity level</strong></td><td>One of 3 options, such as low, medium and high.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Daily water intake</strong></td><td>A measured quantity, 40 units available.</td><td>milliliters</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Activity level</strong> set to Medium and <strong>Weight</strong> = 10 kg. Working through the relationship above gives <strong>Daily water intake</strong> = 10 mL.</p><p>Read it as a template. Every number above can be replaced with one of yours; only the relationship between them is fixed.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Daily water intake</strong> = 10 mL should be roughly the size you expected from <strong>Activity level</strong> set to Medium and <strong>Weight</strong> = 10 kg.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Volume, opening in milliliters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Dog water intake calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 1 figures keep coming back — the daily water intake — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Dog water intake calculator, these are the ones that matter:</p>
            <ul><li>The 1 drop-down on this page offers a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/dry-matter">Dry matter</a>, <a href="/biology/fcr">Feed conversion ratio</a> and <a href="/biology/fertilizer">Fertilizer</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog water intake calculator work out?', 'a' => <<<'TXT'
            It returns weight, derived from the daily water intake. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Dog water intake calculator?', 'a' => <<<'TXT'
            The form asks for the daily water intake, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter weight in a different unit?', 'a' => <<<'TXT'
            Yes. Weight opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Daily water intake = 10 mL. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Dog water intake calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/dry-matter', 'name' => 'Dry matter'],
            ['path' => '/biology/fcr', 'name' => 'Feed conversion ratio'],
            ['path' => '/biology/fertilizer', 'name' => 'Fertilizer'],
        ],
    ],
];
