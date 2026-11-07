<?php

/**
 * Mutation rate
 * /biology/mutation-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mutation rate',
    'meta' => ['title' => 'Mutation rate Calculator — Formula & Results', 'description' => 'Supply the total offspring, the mutation rate and number of observed mutants and the Mutation rate calculator solves for <strong>mutant offspring (x)</strong>.', 'h1' => 'Mutation rate Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'method',
                            'label' => 'Detect mutation rate by:',
                            'type' => 'select',
                            'options' => ['Per-locus phenotypic method' => '1', 'Per-site genomic method' => '2', 'Per-division fluctuation method' => '3'],
                            'dataset' => 'method',
                            'default' => 'Per-locus phenotypic method',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => 'Per Locus Phenotypic Method',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mutantOffsprings',
                            'label' => 'Mutant offspring (x)',
                            'type' => 'number',
                            'help' => 'Offspring showing the trait whose parents are both unaffected.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalOffsprings',
                            'label' => 'Total offspring (N)',
                            'type' => 'number',
                            'help' => 'Total number of births in the studied population.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mutationRate1',
                            'label' => 'Mutation rate (μ)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => 'Per Site Genomic Method',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mutants',
                            'label' => 'Number of observed mutants (x)',
                            'type' => 'number',
                            'help' => 'Total number of new mutations found across all lines.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'generations',
                            'label' => 'Total generations (g)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sequenceSize',
                            'label' => 'Size of sequenced DNA (b)',
                            'type' => 'number',
                            'help' => 'Number of sites where mutations could be reliably detected, not the full genome size.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mutationRate2',
                            'label' => 'Mutation rate (μ)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => 'Fluctuation Test Method',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalCells',
                            'label' => 'Total cells',
                            'type' => 'number',
                            'help' => 'Number of parallel cultures in the experiment.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'zeroMutants',
                            'label' => 'Zero mutant fraction',
                            'type' => 'number',
                            'help' => 'Fraction of cultures without mutants.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mutationRate3',
                            'label' => 'Mutation rate',
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
            'title' => 'mutationRate1 = mutantOffsprings / (2 * totalOffsprings)',
            'results' => ['mutantOffsprings' => '2*mutationRate1*totalOffsprings', 'totalOffsprings' => '(1/2)*mutantOffsprings/mutationRate1', 'mutationRate1' => '(1/2)*mutantOffsprings/totalOffsprings'],
        ],
        [
            'title' => 'mutationRate2 = mutants / (generations * sequenceSize)',
            'results' => ['mutationRate2' => 'mutants/(generations*sequenceSize)', 'generations' => 'mutants/(mutationRate2*sequenceSize)', 'sequenceSize' => 'mutants/(generations*mutationRate2)', 'mutants' => 'generations*mutationRate2*sequenceSize'],
        ],
        [
            'title' => 'mutationRate3 = -ln(zeroMutants) / totalCells',
            'results' => ['totalCells' => '-log(zeroMutants)/mutationRate3', 'mutationRate3' => '-log(zeroMutants)/totalCells', 'zeroMutants' => 'exp(-mutationRate3*totalCells)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Supply the total offspring, the mutation rate and number of observed mutants and the Mutation rate calculator solves for <strong>mutant offspring (x)</strong>. 
        
        Nothing repaints underneath you: edit a field, press Calculate, and the new answer appears. That is how you find out which input the result is sensitive to.
        TXT,
        'sections' => [
            ['title' => 'How does the Mutation rate calculator work?', 'html' => <<<'TXT'
            <p>The Mutation rate calculator takes the values in the form, applies the relationship described below and reports <strong>mutant offspring (x)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case; then you type in the total offspring (N), the mutation rate (μ), number of observed mutants (x) and the total generations (g).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 3 options, such as per-locus phenotypic method, per-site genomic method and per-division fluctuation method. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Mutant offspring (x)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Total offspring (N)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Mutation rate (μ)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Number of observed mutants (x)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Total generations (g)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Size of sequenced DNA (b)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Mutation rate (μ) (2)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Total cells</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Zero mutant fraction</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Mutation rate</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Mutation rate calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Mutant offspring (x)</span><span class="formula-eq">=</span><span class="formula-rhs">2 × mutation rate (μ) × total offspring (N)</span></div><div class="formula-row"><span class="formula-lhs">Mutation rate (μ)</span><span class="formula-eq">=</span><span class="formula-rhs">number of observed mutants (x) ÷ (total generations (g) × size of sequenced DNA (b))</span></div><div class="formula-row"><span class="formula-lhs">Total cells</span><span class="formula-eq">=</span><span class="formula-rhs">-the natural log of (zero mutant fraction) ÷ mutation rate</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Detect mutation rate by</strong> set to Per-locus phenotypic method, <strong>Total offspring (N)</strong> = 10 and <strong>Mutation rate (μ)</strong> = 10. Working through the relationship above gives <strong>Mutant offspring (x)</strong> = 200.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Mutant offspring (x)</strong> = 200 should be roughly the size you expected from <strong>Detect mutation rate by</strong> set to Per-locus phenotypic method and <strong>Total offspring (N)</strong> = 10.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Mutation rate calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 3 figures keep coming back — the total offspring, the mutation rate and number of observed mutants — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>Round only at the end. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/omega-3-for-dogs">Omega-3 for dogs</a>, <a href="/biology/pet-sitter-rates">Pet sitter rates</a> and <a href="/biology/pine-straw">Pine straw</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mutation rate calculator work out?', 'a' => <<<'TXT'
            It returns mutant offspring (x), derived from the total offspring, the mutation rate and number of observed mutants. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Mutation rate calculator?', 'a' => <<<'TXT'
            The form asks for the total offspring, the mutation rate and number of observed mutants, which is 8 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Mutant offspring (x) = 200. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Mutation rate calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/omega-3-for-dogs', 'name' => 'Omega-3 for dogs'],
            ['path' => '/biology/pet-sitter-rates', 'name' => 'Pet sitter rates'],
            ['path' => '/biology/pine-straw', 'name' => 'Pine straw'],
        ],
    ],
];
