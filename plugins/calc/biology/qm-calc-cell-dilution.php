<?php

/**
 * Cell dilution
 * /biology/cell-dilution
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell dilution',
    'meta' => ['title' => 'Cell dilution Calculator — Formula & Results', 'description' => '<strong>volume for suspension</strong> is what the Cell dilution calculator works out, and it gets there from the initial concentration, the final…', 'h1' => 'Cell dilution Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'concentrationInitial',
                            'label' => 'Initial concentration',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'suspensionVolume',
                            'label' => 'Volume for suspension',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'concentrationFinal',
                            'label' => 'Final concentration',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'volumeFinal',
                            'label' => 'Final volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'concentrationInitial*suspensionVolume=concentrationFinal*volumeFinal',
            'results' => ['suspensionVolume' => 'concentrationFinal*volumeFinal/concentrationInitial', 'concentrationInitial' => 'concentrationFinal*volumeFinal/suspensionVolume', 'volumeFinal' => 'concentrationInitial*suspensionVolume/concentrationFinal', 'concentrationFinal' => 'concentrationInitial*suspensionVolume/volumeFinal'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <strong>volume for suspension</strong> is what the Cell dilution calculator works out, and it gets there from the initial concentration, the final concentration and the final volume.
        TXT,
        'sections' => [
            ['title' => 'How does the Cell dilution calculator work?', 'html' => <<<'TXT'
            <p>The Cell dilution calculator takes the values in the form, applies the relationship described below and reports <strong>volume for suspension</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the initial concentration, the final concentration and the final volume.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in milliliters. The unit chip switches it to any of the 40 supported units.</li><li>A measured quantity, entered by default in milliliters. The unit chip switches it to any of the 40 supported units.</li><li>A measured quantity, entered by default in milliliters. The unit chip switches it to any of the 40 supported units.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Initial concentration</strong></td><td>A measured quantity, 40 units available.</td><td>milliliters</td><td>You supply it</td></tr><tr><td><strong>Volume for suspension</strong></td><td>A measured quantity, 40 units available.</td><td>milliliters</td><td>Calculated</td></tr><tr><td><strong>Final concentration</strong></td><td>A measured quantity, 40 units available.</td><td>milliliters</td><td>You supply it</td></tr><tr><td><strong>Final volume</strong></td><td>A measured quantity, 40 units available.</td><td>milliliters</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Cell dilution calculator', 'html' => <<<'TXT'
            <p>One relationship drives the whole page:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Volume for suspension</span><span class="formula-eq">=</span><span class="formula-rhs">final concentration × final volume ÷ initial concentration</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Initial concentration</strong> = 10 mL, <strong>Final concentration</strong> = 10 mL and <strong>Final volume</strong> = 10 mL. Working through the relationship above gives <strong>Volume for suspension</strong> = 10 mL.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Volume for suspension</strong> = 10 mL should be roughly the size you expected from <strong>Initial concentration</strong> = 10 mL and <strong>Final concentration</strong> = 10 mL.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in milliliters, and convertible to any of the 40 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Volume, opening in milliliters</li><li>Volume, opening in milliliters</li><li>Volume, opening in milliliters</li><li>Volume, opening in milliliters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Cell dilution calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 3 figures keep coming back — the initial concentration, the final concentration and the final volume — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Cell dilution calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/cell-doubling-time">Cell doubling time</a>, <a href="/biology/cephalexin-for-cats-dosage">Cephalexin for cats dosage</a> and <a href="/biology/cephalexin-for-dogs-dosage">Cephalexin for dogs dosage</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cell dilution calculator work out?', 'a' => <<<'TXT'
            It returns volume for suspension, derived from the initial concentration, the final concentration and the final volume. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Cell dilution calculator?', 'a' => <<<'TXT'
            The form asks for the initial concentration, the final concentration and the final volume, which is 3 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter initial concentration in a different unit?', 'a' => <<<'TXT'
            Yes. Initial concentration opens in milliliters and the chip beside it offers 40 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Volume for suspension = 10 mL. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Cell dilution calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/cell-doubling-time', 'name' => 'Cell doubling time'],
            ['path' => '/biology/cephalexin-for-cats-dosage', 'name' => 'Cephalexin for cats dosage'],
            ['path' => '/biology/cephalexin-for-dogs-dosage', 'name' => 'Cephalexin for dogs dosage'],
        ],
    ],
];
