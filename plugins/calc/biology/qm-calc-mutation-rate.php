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
    'meta' => ['title' => 'Mutation rate Calculator — Formula & Results', 'description' => 'Mutation rate turns Total offspring (N) and Mutation rate (μ) into Mutant offspring (x) and Number of observed mutants (x). Total number of births in the…', 'h1' => 'Mutation rate Calculator', 'updated' => '2026-09-28'],
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
        Mutation rate turns Total offspring (N) and Mutation rate (μ) into Mutant offspring (x) and Number of observed mutants (x). There is no hidden constant here: change Mutant offspring (x) and Total offspring (N) moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Mutation rate calculator works', 'html' => <<<'TXT'
            <p>The Mutation rate calculator applies one relationship to 2 numbers and reports Mutant offspring (x), Number of observed mutants (x) and Total generations (g).</p><p>Written with the labels from the form, Mutant offspring (x) = 2 × Mutation rate (μ) × Total offspring (N).</p><p>What comes back is Mutant offspring (x), Number of observed mutants (x), Total generations (g) and Size of sequenced DNA (b) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Total offspring (N)</strong> — a plain number, no unit. Total number of births in the studied population.</li><li><strong>Mutation rate (μ)</strong> — a plain number, no unit</li></ul><p>The answers come back as Mutant offspring (x), Number of observed mutants (x), Total generations (g), Size of sequenced DNA (b), Mutation rate (μ), Total cells, Zero mutant fraction, Mutation rate. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Mutant offspring (x) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Mutant offspring (x)</strong> = <code>2 × Mutation rate (μ) × Total offspring (N)</code></li><li><strong>Total offspring (N)</strong> = <code>(1 ÷ 2) × Mutant offspring (x) ÷ Mutation rate (μ)</code></li><li><strong>Mutation rate (μ)</strong> = <code>(1 ÷ 2) × Mutant offspring (x) ÷ Total offspring (N)</code></li><li><strong>Total generations (g)</strong> = <code>Number of observed mutants (x) ÷ (Mutation rate (μ) × Size of sequenced DNA (b))</code></li><li><strong>Size of sequenced DNA (b)</strong> = <code>Number of observed mutants (x) ÷ (Total generations (g) × Mutation rate (μ))</code></li><li><strong>Number of observed mutants (x)</strong> = <code>Total generations (g) × Mutation rate (μ) × Size of sequenced DNA (b)</code></li></ul><p>Any one of Mutant offspring (x), Total offspring (N) and Mutation rate (μ) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Mutant offspring (x), Number of observed mutants (x) and Total generations (g) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Total offspring (N) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Total offspring (N) and Mutation rate (μ) and the number you are missing is Mutant offspring (x) and Number of observed mutants (x).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/fish-oil-dosage-for-cats">Fish oil dosage for cats Calculator</a>, <a href="/biology/fish-per-liter">Fish Per Liter Calculator</a> and <a href="/biology/fish-tank-stocking">Fish Tank Stocking Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mutation rate calculator work out?', 'a' => <<<'TXT'
            Mutant offspring (x), Number of observed mutants (x), Total generations (g) and Size of sequenced DNA (b), from Mutation rate (μ) and Total offspring (N). The relationship is Mutant offspring (x) = 2 × Mutation rate (μ) × Total offspring (N).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total offspring (N), Mutation rate (μ). Fill totalOffsprings and mutationRate1 and leave Mutant offspring (x) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Mutant offspring (x), Total offspring (N), Mutation rate (μ) and Mutation rate (μ) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Mutant offspring (x) is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Total offspring (N) blank and the page solves for it, reporting Mutant offspring (x) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Mutant offspring (x) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/fish-oil-dosage-for-cats', 'name' => 'Fish oil dosage for cats Calculator'],
            ['path' => '/biology/fish-per-liter', 'name' => 'Fish Per Liter Calculator'],
            ['path' => '/biology/fish-tank-stocking', 'name' => 'Fish Tank Stocking Calculator'],
        ],
        'authors' => [],
    ],
];
