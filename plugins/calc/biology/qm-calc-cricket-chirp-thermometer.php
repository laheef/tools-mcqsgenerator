<?php

/**
 * Crickets chirping thermometer
 * /biology/cricket-chirp-thermometer
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Crickets chirping thermometer',
    'meta' => ['title' => 'Crickets chirping thermometer — Formula & Results', 'description' => 'The Crickets chirping thermometer calculator is a free, no-sign-up biology tool. Fill in the 2 fields it asks for and it works out… Fill in the 2 fields it…', 'h1' => 'Crickets chirping thermometer Calculator', 'updated' => '2025-12-18'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'formula',
                            'label' => 'Formula',
                            'type' => 'select',
                            'options' => ['Basic' => '0', 'Field cricket' => '1', 'Snowy tree cricket' => '2', 'Common true katydid' => '3'],
                            'dataset' => 'formula',
                            'default' => 'Basic',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chirps_per_min',
                            'label' => 'Cricket chirps',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'fifteen',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'temperature',
                            'label' => 'Temperature',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'temperature2',
                            'label' => 'Temperature',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'temperature3',
                            'label' => 'Temperature',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Crickets don\'t chirp below 50 °F (10 °C).'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'temperature = 50 +  (chirps_per_min - 40)/4 ',
            'results' => ['temperature' => '(1/4)*chirps_per_min + 40', 'chirps_per_min' => '4*temperature - 160'],
        ],
        [
            'title' => 'temperature2 = 50 +  (chirps_per_min - 92)/4.7 ',
            'results' => ['temperature2' => '(10/47)*chirps_per_min + 1430/47', 'chirps_per_min' => '(47/10)*temperature2 - 143'],
        ],
        [
            'title' => 'temperature3 = 60 +  (chirps_per_min - 19)/3',
            'results' => ['temperature3' => '(1/3)*chirps_per_min + 161/3', 'chirps_per_min' => '3*temperature3 - 161'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Crickets chirping thermometer calculator is a free, no-sign-up biology tool. Fill in the 2 fields it asks for and it works out <strong>temperature</strong> straight away, with the formula shown underneath.
        TXT,
        'sections' => [
            ['title' => 'How does the Crickets chirping thermometer calculator work?', 'html' => <<<'TXT'
            <p>The Crickets chirping thermometer calculator takes the values in the form, applies the relationship described below and reports <strong>temperature</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the formula); then you type in the cricket chirps.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 4 options, such as basic, field cricket and snowy tree cricket. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in fifteen seconds. </li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Formula</strong></td><td>One of 4 options, such as basic, field cricket and snowy tree cricket.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Cricket chirps</strong></td><td>A measured quantity, 27 units available.</td><td>fifteen seconds</td><td>You supply it</td></tr><tr><td><strong>Temperature</strong></td><td>A measured quantity, 28 units available.</td><td>Celsius</td><td>Calculated</td></tr><tr><td><strong>Temperature (2)</strong></td><td>A measured quantity, 28 units available.</td><td>Celsius</td><td>Calculated</td></tr><tr><td><strong>Temperature (3)</strong></td><td>A measured quantity, 28 units available.</td><td>Celsius</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Crickets chirping thermometer calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Temperature</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 4) × cricket chirps + 40</span></div><div class="formula-row"><span class="formula-lhs">Temperature</span><span class="formula-eq">=</span><span class="formula-rhs">(10 ÷ 47) × cricket chirps + 1430 ÷ 47</span></div><div class="formula-row"><span class="formula-lhs">Temperature</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 3) × cricket chirps + 161 ÷ 3</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in Celsius, and convertible to any of the 28 units on that chip.</li><li>Shown in Celsius, and convertible to any of the 28 units on that chip.</li><li>Shown in Celsius, and convertible to any of the 28 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in fifteen seconds</li><li>Temperature, opening in Celsius</li><li>Temperature, opening in Celsius</li><li>Temperature, opening in Celsius</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Crickets chirping thermometer calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 1 figures keep coming back — the cricket chirps — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Round only at the end. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/daily-light-integral-dli">Daily light integral (DLI)</a>, <a href="/biology/dihybrid-cross-punnett-square">Dihybrid cross Punnett square</a> and <a href="/biology/dna-concentration">DNA concentration</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Crickets chirping thermometer calculator work out?', 'a' => <<<'TXT'
            It returns temperature, derived from the cricket chirps. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Crickets chirping thermometer calculator?', 'a' => <<<'TXT'
            The form asks for the cricket chirps, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter cricket chirps in a different unit?', 'a' => <<<'TXT'
            Yes. Cricket chirps opens in fifteen seconds and the chip beside it offers 27 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Crickets chirping thermometer calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/daily-light-integral-dli', 'name' => 'Daily light integral (DLI)'],
            ['path' => '/biology/dihybrid-cross-punnett-square', 'name' => 'Dihybrid cross Punnett square'],
            ['path' => '/biology/dna-concentration', 'name' => 'DNA concentration'],
        ],
    ],
];
