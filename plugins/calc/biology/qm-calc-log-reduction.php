<?php

/**
 * Log Reduction
 * /biology/log-reduction
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Log Reduction',
    'meta' => ['title' => 'Log Reduction Calculator — Formula & Results', 'description' => <<<'TXT'
    The Log Reduction calculator returns <strong>Percentage reduction</strong> from the 2 fields on the form. The Log Reduction calculator takes the values in the…
    TXT, 'h1' => 'Log Reduction Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_CFU',
                            'label' => 'Initial CFU amount',
                            'type' => 'number',
                            'help' => 'Amount of Colony Forming Units in sample before treatment.',
                            'unit' => '120',
                            'unit_default' => 'x10e7',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_CFU',
                            'label' => 'Final CFU amount',
                            'type' => 'number',
                            'help' => 'Amount of Colony Forming Units in sample after treatment.',
                            'unit' => '120',
                            'unit_default' => 'x10e5',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'log_reduction',
                            'label' => 'Log reduction',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'perecentage_reduction',
                            'label' => 'Perecentage reduction',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.00001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'log_reduction = log(initial_CFU/final_CFU)/log(10)',
            'results' => ['final_CFU' => 'initial_CFU*exp(-log_reduction*log(10))', 'log_reduction' => 'log(initial_CFU/final_CFU)/log(10)', 'initial_CFU' => 'final_CFU*exp(log_reduction*log(10))'],
        ],
        [
            'title' => 'perecentage_reduction = (initial_CFU - final_CFU)/initial_CFU',
            'results' => ['final_CFU' => 'initial_CFU*(1 - perecentage_reduction)', 'perecentage_reduction' => '(-final_CFU + initial_CFU)/initial_CFU', 'initial_CFU' => '-final_CFU/(perecentage_reduction - 1)'],
        ],
    ],
    'article' => [
        'intro' => 'The Log Reduction calculator returns <strong>Percentage reduction</strong> from the 2 fields on the form.',
        'sections' => [
            ['title' => 'How does the Log Reduction calculator work?', 'html' => <<<'TXT'
            <p>The Log Reduction calculator takes the values in the form, applies the relationship described below and reports <strong>Percentage reduction</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the log reduction.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <table><caption>What you supply, field by field</caption><thead><tr><th>Field</th><th>Units and meaning</th></tr></thead><tbody><tr><td>Initial CFU amount</td><td>a measured quantity, entered by default in times 10 to the 7. The unit chip switches it to any of the 69 supported units.</td></tr><tr><td>Log reduction</td><td>a plain number with no unit attached.</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Log Reduction calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Final CFU amount</span><span class="formula-eq">=</span><span class="formula-rhs">initial CFU amount × the exponential of (-log reduction × the natural log of (10))</span></div><div class="formula-row"><span class="formula-lhs">Final CFU amount</span><span class="formula-eq">=</span><span class="formula-rhs">initial CFU amount × (1 − perecentage reduction)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in times 10 to the 5, and convertible to any of the 69 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Scientific notation, opening in times 10 to the 7</li><li>Scientific notation, opening in times 10 to the 5</li><li>%, opening in percent</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Log Reduction calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 1 figures keep coming back — the log reduction — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Round only at the end. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Log Reduction calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — initial CFU amount for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/metacam-dosage-cat">Metacam dosage for cats</a>, <a href="/biology/mlvss">Mixed liquor volatile suspended solids</a> and <a href="/biology/mowing-cost">Lawn mowing</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Log Reduction calculator work out?', 'a' => <<<'TXT'
            It returns perecentage reduction, derived from the log reduction. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Log Reduction calculator?', 'a' => <<<'TXT'
            The form asks for the log reduction, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter initial CFU amount in a different unit?', 'a' => <<<'TXT'
            Yes. Initial CFU amount opens in times 10 to the 7 and the chip beside it offers 69 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Log Reduction calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/metacam-dosage-cat', 'name' => 'Metacam dosage for cats'],
            ['path' => '/biology/mlvss', 'name' => 'Mixed liquor volatile suspended solids'],
            ['path' => '/biology/mowing-cost', 'name' => 'Lawn mowing'],
        ],
    ],
];
