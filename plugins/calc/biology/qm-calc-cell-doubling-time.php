<?php

/**
 * Cell doubling time
 * /biology/cell-doubling-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell doubling time',
    'meta' => ['title' => 'Cell doubling time: Formula, Steps & Results', 'description' => 'Give the Cell doubling time calculator the final reference parameter, the time duration and the growth rate and it returns <strong>initial reference…', 'h1' => 'Cell doubling time Calculator', 'updated' => '2024-07-30'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_concentration',
                            'label' => 'Initial reference parameter',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            This parameter should be related to cell growth. For example, it could be cell number, concentration, or confluency. You should measure the same parameter at the beginning and end of the experiment.
                            TXT,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_concentration',
                            'label' => 'Final reference parameter',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time',
                            'label' => 'Time duration',
                            'type' => 'number',
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
                            'name' => 'growth_rate',
                            'label' => 'Growth rate',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'doubling_time',
                            'label' => 'Doubling time',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrsmin',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'growth_rate = log(final_concentration/initial_concentration)/time',
            'results' => ['initial_concentration' => 'final_concentration*exp(-growth_rate*time)', 'time' => 'log(final_concentration/initial_concentration)/growth_rate', 'final_concentration' => 'initial_concentration*exp(growth_rate*time)', 'growth_rate' => 'log(final_concentration/initial_concentration)/time'],
        ],
        [
            'title' => 'doubling_time = log(2)/growth_rate ',
            'results' => ['doubling_time' => 'log(2)/growth_rate', 'growth_rate' => 'log(2)/doubling_time'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Give the Cell doubling time calculator the final reference parameter, the time duration and the growth rate and it returns <strong>initial reference parameter</strong>.
        TXT,
        'sections' => [
            ['title' => 'How does the Cell doubling time calculator work?', 'html' => <<<'TXT'
            <p>The Cell doubling time calculator takes the values in the form, applies the relationship described below and reports <strong>initial reference parameter</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the final reference parameter, the time duration and the growth rate.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in hours. </li><li>A measured quantity, entered by default in hours. </li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Initial reference parameter</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Final reference parameter</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Time duration</strong></td><td>A measured quantity, 27 units available.</td><td>hours</td><td>You supply it</td></tr><tr><td><strong>Growth rate</strong></td><td>A measured quantity, 27 units available.</td><td>hours</td><td>You supply it</td></tr><tr><td><strong>Doubling time</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Cell doubling time calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Initial reference parameter</span><span class="formula-eq">=</span><span class="formula-rhs">final reference parameter × the exponential of (-growth rate × time duration)</span></div><div class="formula-row"><span class="formula-lhs">Doubling time</span><span class="formula-eq">=</span><span class="formula-rhs">the natural log of (2) ÷ growth rate</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in hours / minutes, and convertible to any of the 27 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in hours</li><li>Time, opening in hours</li><li>Time, opening in hours / minutes</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Cell doubling time calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 3 figures keep coming back — the final reference parameter, the time duration and the growth rate — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Keep the units you enter consistent. </li><li>Round only at the end. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Cell doubling time calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/cephalexin-for-cats-dosage">Cephalexin for cats dosage</a>, <a href="/biology/cephalexin-for-dogs-dosage">Cephalexin for dogs dosage</a> and <a href="/biology/co2-grow-room">CO₂ grow room</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cell doubling time calculator work out?', 'a' => <<<'TXT'
            It returns initial reference parameter, derived from the final reference parameter, the time duration and the growth rate. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Cell doubling time calculator?', 'a' => <<<'TXT'
            The form asks for the final reference parameter, the time duration and the growth rate, which is 3 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter time duration in a different unit?', 'a' => <<<'TXT'
            Yes. Time duration opens in hours and the chip beside it offers 27 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Cell doubling time calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/cephalexin-for-cats-dosage', 'name' => 'Cephalexin for cats dosage'],
            ['path' => '/biology/cephalexin-for-dogs-dosage', 'name' => 'Cephalexin for dogs dosage'],
            ['path' => '/biology/co2-grow-room', 'name' => 'CO₂ grow room'],
        ],
    ],
];
