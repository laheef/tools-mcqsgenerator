<?php

/**
 * Pet sitter rates
 * /biology/pet-sitter-rates
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pet sitter rates',
    'meta' => ['title' => 'Pet sitter rates — Formula, Steps & Examples', 'description' => 'The Pet sitter rates calculator turns the number of hours pet sitting, the days of care and the pet sitting rate into <strong>pet sitting cost</strong>.', 'h1' => 'Pet sitter rates Calculator', 'updated' => '2024-07-12'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hours_sitting',
                            'label' => 'The number of hours pet sitting',
                            'type' => 'number',
                            'help' => 'Hours pet sitting per day.',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days_of_care',
                            'label' => 'Days of care',
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
                            'name' => 'pet_sitting_cost',
                            'label' => 'Pet sitting cost',
                            'type' => 'number',
                            'help' => 'Total cost for the period.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pet_sitting_rate',
                            'label' => 'Pet sitting rate',
                            'type' => 'number',
                            'suffix' => '/h',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'pet_sitting_cost = hours_sitting * days_of_care * pet_sitting_rate',
            'results' => ['pet_sitting_cost' => 'days_of_care*hours_sitting*pet_sitting_rate', 'pet_sitting_rate' => 'pet_sitting_cost/(days_of_care*hours_sitting)', 'hours_sitting' => 'pet_sitting_cost/(days_of_care*pet_sitting_rate)', 'days_of_care' => 'pet_sitting_cost/(hours_sitting*pet_sitting_rate)'],
        ],
    ],
    'article' => [
        'intro' => 'The Pet sitter rates calculator turns the number of hours pet sitting, the days of care and the pet sitting rate into <strong>pet sitting cost</strong>.',
        'sections' => [
            ['title' => 'How does the Pet sitter rates calculator work?', 'html' => <<<'TXT'
            <p>The Pet sitter rates calculator takes the values in the form, applies the relationship described below and reports <strong>pet sitting cost</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the number of hours pet sitting, the days of care and the pet sitting rate.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in hours. </li><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>The number of hours pet sitting</strong></td><td>A measured quantity, 27 units available.</td><td>hours</td><td>You supply it</td></tr><tr><td><strong>Days of care</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Pet sitting cost</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Pet sitting rate</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Pet sitter rates calculator', 'html' => <<<'TXT'
            <p>One relationship drives the whole page:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Pet sitting cost</span><span class="formula-eq">=</span><span class="formula-rhs">days of care × the number of hours pet sitting × pet sitting rate</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in hours</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Pet sitter rates calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 3 figures keep coming back — the number of hours pet sitting, the days of care and the pet sitting rate — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Keep the units you enter consistent. </li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Pet sitter rates calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — the number of hours pet sitting for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/pine-straw">Pine straw</a>, <a href="/biology/plant-population">Plant population</a> and <a href="/biology/plants">Plant spacing</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pet sitter rates calculator work out?', 'a' => <<<'TXT'
            It returns pet sitting cost, derived from the number of hours pet sitting, the days of care and the pet sitting rate. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Pet sitter rates calculator?', 'a' => <<<'TXT'
            The form asks for the number of hours pet sitting, the days of care and the pet sitting rate, which is 3 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter the number of hours pet sitting in a different unit?', 'a' => <<<'TXT'
            Yes. The number of hours pet sitting opens in hours and the chip beside it offers 27 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Pet sitter rates calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/pine-straw', 'name' => 'Pine straw'],
            ['path' => '/biology/plant-population', 'name' => 'Plant population'],
            ['path' => '/biology/plants', 'name' => 'Plant spacing'],
        ],
    ],
];
