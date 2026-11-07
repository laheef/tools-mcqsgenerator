<?php

/**
 * DNA copy number
 * /biology/dna-copy-number
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'DNA copy number',
    'meta' => ['title' => 'DNA copy number Calculator: Free, With Steps', 'description' => 'The DNA copy number calculator works out <strong>DNA copies</strong> from the DNA concentration, the template length, number of PCR cycles and the DNA copies…', 'h1' => 'DNA copy number Calculator', 'updated' => '2026-08-06'],
    'sections' => [
        [
            'title' => 'DNA copy number',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dna_concentration',
                            'label' => 'DNA concentration',
                            'type' => 'number',
                            'suffix' => 'ng/µl',
                            'help' => 'Measure the DNA concentration in ng/µl with a spectrophotometer.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'template_length',
                            'label' => 'Template length',
                            'type' => 'number',
                            'help' => 'Enter how many base-pairs your template has in total.',
                            'unit' => '271',
                            'unit_default' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'base_weight',
                            'label' => 'Base weight',
                            'type' => 'select',
                            'options' => ['ssDNA (330 Da)' => '330', 'ssRNA (340 Da)' => '340', 'dsDNA (660 Da)' => '660'],
                            'dataset' => 'base_weight',
                            'suffix' => 'dalton',
                            'help' => 'Choose between single-stranded DNA/RNA (ssDNA/ssRNA) or double-stranded DNA (dsDNA).',
                            'default' => 'dsDNA (660 Da)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dna_copies',
                            'label' => 'DNA copies',
                            'type' => 'number',
                            'suffix' => 'copies/µl',
                            'unit' => '120',
                            'unit_default' => 'x10e7',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'DNA copies per PCR cycle',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_dna_copies',
                            'label' => 'Initial DNA copies',
                            'type' => 'number',
                            'suffix' => 'copies/µl',
                            'help' => 'This is the initial amount of DNA in you sample, before PCR amplification.',
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
                            'name' => 'no_cycles',
                            'label' => 'Number of PCR cycles',
                            'type' => 'number',
                            'help' => 'Enter here, after how many PCR cycles you want to know the DNA copy number.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dna_copy_per_pcr_cycle',
                            'label' => 'DNA copies after PCR cycle(s)',
                            'type' => 'number',
                            'suffix' => 'copies/µl',
                            'help' => 'This is the amount of DNA copies after the specific rounds of PCR cycle(s).',
                            'unit' => '120',
                            'unit_default' => 'x10e7',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'dna_copies = (dna_concentration * (6.02214*10^23)) / (template_length * 10^9 * base_weight)',
            'results' => ['dna_copies' => '602214000000000*dna_concentration/(base_weight*template_length)', 'template_length' => '602214000000000*dna_concentration/(base_weight*dna_copies)', 'base_weight' => '602214000000000*dna_concentration/(dna_copies*template_length)', 'dna_concentration' => '(1/602214000000000)*base_weight*dna_copies*template_length'],
        ],
        [
            'title' => 'dna_copy_per_pcr_cycle = initial_dna_copies * 2^no_cycles',
            'results' => ['initial_dna_copies' => 'pow(2, -no_cycles)*dna_copy_per_pcr_cycle', 'dna_copy_per_pcr_cycle' => 'pow(2, no_cycles)*initial_dna_copies', 'no_cycles' => 'log(dna_copy_per_pcr_cycle/initial_dna_copies)/log(2)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The DNA copy number calculator works out <strong>DNA copies</strong> from the DNA concentration, the template length, number of PCR cycles and the DNA copies after PCR cycle.
        TXT,
        'sections' => [
            ['title' => 'How does the DNA copy number calculator work?', 'html' => <<<'TXT'
            <p>The DNA copy number calculator takes the values in the form, applies the relationship described below and reports <strong>DNA copies</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the base weight); then you type in the DNA concentration, the template length, number of PCR cycles and the DNA copies after PCR cycle(s).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A number, expressed in ng/µl.</li><li>A measured quantity, entered by default in base pairs. The unit chip switches it to any of the 2 supported units.</li><li>Pick the option that matches your case — 3 options, such as ssDNA (330 Da), ssRNA (340 Da) and dsDNA (660 Da). The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in times 10 to the 7. The unit chip switches it to any of the 69 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>DNA concentration</strong></td><td>A number stated in ng/µl.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Template length</strong></td><td>A measured quantity, 2 units available.</td><td>base pairs</td><td>You supply it</td></tr><tr><td><strong>Base weight</strong></td><td>One of 3 options, such as ssDNA (330 Da), ssRNA (340 Da) and dsDNA (660 Da).</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>DNA copies</strong></td><td>A measured quantity, 69 units available.</td><td>times 10 to the 7</td><td>Calculated</td></tr><tr><td><strong>Initial DNA copies</strong></td><td>A measured quantity, 69 units available.</td><td>times 10 to the 7</td><td>Calculated</td></tr><tr><td><strong>Number of PCR cycles</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>DNA copies after PCR cycle(s)</strong></td><td>A measured quantity, 69 units available.</td><td>times 10 to the 7</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the DNA copy number calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">DNA copies</span><span class="formula-eq">=</span><span class="formula-rhs">602214000000000 × DNA concentration ÷ (base weight × template length)</span></div><div class="formula-row"><span class="formula-lhs">Initial DNA copies</span><span class="formula-eq">=</span><span class="formula-rhs">(2 ^ -number of PCR cycles) × DNA copies after PCR cycle(s)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in times 10 to the 7, and convertible to any of the 69 units on that chip.</li><li>Shown in times 10 to the 7, and convertible to any of the 69 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>DNA, opening in base pairs</li><li>Scientific notation, opening in times 10 to the 7</li><li>Scientific notation, opening in times 10 to the 7</li><li>Scientific notation, opening in times 10 to the 7</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The DNA copy number calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 4 figures keep coming back — the DNA concentration, the template length and number of PCR cycles — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/dna-to-mrna">DNA to mRNA</a>, <a href="/biology/dog-age">Dog age</a> and <a href="/biology/dog-bmi">Dog BMI</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the DNA copy number calculator work out?', 'a' => <<<'TXT'
            It returns DNA copies, derived from the DNA concentration, the template length and number of PCR cycles. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the DNA copy number calculator?', 'a' => <<<'TXT'
            The form asks for the DNA concentration, the template length, number of PCR cycles and the DNA copies after PCR cycle, which is 5 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter template length in a different unit?', 'a' => <<<'TXT'
            Yes. Template length opens in base pairs and the chip beside it offers 2 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the DNA copy number calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/dna-to-mrna', 'name' => 'DNA to mRNA'],
            ['path' => '/biology/dog-age', 'name' => 'Dog age'],
            ['path' => '/biology/dog-bmi', 'name' => 'Dog BMI'],
        ],
    ],
];
