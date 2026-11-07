<?php

/**
 * Mutation frequency
 * /biology/mutation-frequency
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mutation frequency',
    'meta' => ['title' => 'Mutation frequency — Free Online Calculator', 'description' => 'Give the Mutation frequency calculator number of observed mutants and number of cells in culture and it returns <strong>mutation frequency (μ)</strong>.', 'h1' => 'Mutation frequency Calculator', 'updated' => '2026-07-06'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mutants',
                            'label' => 'Number of observed mutants (m)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cellCulture',
                            'label' => 'Number of cells in culture (N)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mutationFrequency',
                            'label' => 'Mutation frequency (μ)',
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
            'title' => 'mutationFrequency = mutants / cellCulture',
            'results' => ['mutationFrequency' => 'mutants/cellCulture', 'mutants' => 'cellCulture*mutationFrequency', 'cellCulture' => 'mutants/mutationFrequency'],
        ],
    ],
    'article' => [
        'intro' => 'Give the Mutation frequency calculator number of observed mutants and number of cells in culture and it returns <strong>mutation frequency (μ)</strong>.',
        'sections' => [
            ['title' => 'How does the Mutation frequency calculator work?', 'html' => <<<'TXT'
            <p>The Mutation frequency calculator takes the values in the form, applies the relationship described below and reports <strong>mutation frequency (μ)</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in number of observed mutants (m) and number of cells in culture (N).</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Number of observed mutants (m)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Number of cells in culture (N)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Mutation frequency (μ)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Mutation frequency calculator', 'html' => <<<'TXT'
            <p>One relationship drives the whole page:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Mutation frequency (μ)</span><span class="formula-eq">=</span><span class="formula-rhs">number of observed mutants (m) ÷ number of cells in culture (N)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Number of observed mutants (m)</strong> = 10 and <strong>Number of cells in culture (N)</strong> = 10. Working through the relationship above gives <strong>Mutation frequency (μ)</strong> = 1.</p><p>Read it as a template. Every number above can be replaced with one of yours; only the relationship between them is fixed.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Mutation frequency (μ)</strong> = 1 should be roughly the size you expected from <strong>Number of observed mutants (m)</strong> = 10 and <strong>Number of cells in culture (N)</strong> = 10.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Mutation frequency calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 2 figures keep coming back — number of observed mutants and number of cells in culture — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Mutation frequency calculator, these are the ones that matter:</p>
            <ul><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — number of observed mutants for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/mutation-rate">Mutation rate</a>, <a href="/biology/omega-3-for-dogs">Omega-3 for dogs</a> and <a href="/biology/pet-sitter-rates">Pet sitter rates</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mutation frequency calculator work out?', 'a' => <<<'TXT'
            It returns mutation frequency (μ), derived from number of observed mutants and number of cells in culture. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Mutation frequency calculator?', 'a' => <<<'TXT'
            The form asks for number of observed mutants and number of cells in culture, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Mutation frequency (μ) = 1. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Mutation frequency calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/mutation-rate', 'name' => 'Mutation rate'],
            ['path' => '/biology/omega-3-for-dogs', 'name' => 'Omega-3 for dogs'],
            ['path' => '/biology/pet-sitter-rates', 'name' => 'Pet sitter rates'],
        ],
    ],
];
