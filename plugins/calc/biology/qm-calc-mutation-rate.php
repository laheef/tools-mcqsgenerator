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
    'meta' => ['title' => 'Mutation rate Calculator — Formula & Results', 'description' => 'Mutation rate works out mutation rate (μ) and mutation rate and reports both. Enter detect mutation rate by and mutant offspring (x); the answer follows.', 'h1' => 'Mutation rate Calculator', 'updated' => '2026-09-28'],
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
        Mutation rate turns Mutant offspring (x) and Total offspring (N) into Mutation rate (μ) and Number of observed mutants (x). There is no hidden constant here: change mutation rate (μ) and mutant offspring (x) moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Mutation rate calculator works', 'html' => <<<'TXT'
            <p>The Mutation rate calculator applies one relationship to 2 numbers and reports Mutation rate (μ), Number of observed mutants (x) and Total generations (g).</p><p>Written with the labels from the form, Mutation rate (μ) = (1 ÷ 2) × Mutant offspring (x) ÷ Total offspring (N).</p><p>What comes back is Mutation rate (μ), Number of observed mutants (x), Total generations (g) and Size of sequenced DNA (b) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Mutant offspring (x)</strong> — a plain number, no unit. Offspring showing the trait whose parents are both unaffected.</li><li><strong>Total offspring (N)</strong> — a plain number, no unit. Total number of births in the studied population.</li></ul><p>The answers come back as Mutation rate (μ), Number of observed mutants (x), Total generations (g), Size of sequenced DNA (b), Mutation rate (μ), Total cells, Zero mutant fraction, Mutation rate. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Mutation rate (μ) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Mutation rate (μ)</strong> = <code>(1 ÷ 2) × Mutant offspring (x) ÷ Total offspring (N)</code></li><li><strong>Mutant offspring (x)</strong> = <code>2 × Mutation rate (μ) × Total offspring (N)</code></li><li><strong>Total offspring (N)</strong> = <code>(1 ÷ 2) × Mutant offspring (x) ÷ Mutation rate (μ)</code></li><li><strong>Total generations (g)</strong> = <code>Number of observed mutants (x) ÷ (Mutation rate (μ) × Size of sequenced DNA (b))</code></li><li><strong>Size of sequenced DNA (b)</strong> = <code>Number of observed mutants (x) ÷ (Total generations (g) × Mutation rate (μ))</code></li><li><strong>Number of observed mutants (x)</strong> = <code>Total generations (g) × Mutation rate (μ) × Size of sequenced DNA (b)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Mutation rate (μ)</strong> = <code>(1 ÷ 2) × Mutant offspring (x) ÷ Total offspring (N)</code> — the form to use when Mutant offspring (x) and Total offspring (N) are the values you have.</li><li><strong>Mutant offspring (x)</strong> = <code>2 × Mutation rate (μ) × Total offspring (N)</code> — the form to use when Mutation rate (μ) and Total offspring (N) are the values you have.</li><li><strong>Total offspring (N)</strong> = <code>(1 ÷ 2) × Mutant offspring (x) ÷ Mutation rate (μ)</code> — the form to use when Mutant offspring (x) and Mutation rate (μ) are the values you have.</li><li><strong>Mutation rate (μ)</strong> = <code>Number of observed mutants (x) ÷ (Total generations (g) × Size of sequenced DNA (b))</code> — the form to use when Number of observed mutants (x), Total generations (g) and Size of sequenced DNA (b) are the values you have.</li><li><strong>Total generations (g)</strong> = <code>Number of observed mutants (x) ÷ (Mutation rate (μ) × Size of sequenced DNA (b))</code> — the form to use when Number of observed mutants (x), Mutation rate (μ) and Size of sequenced DNA (b) are the values you have.</li><li><strong>Size of sequenced DNA (b)</strong> = <code>Number of observed mutants (x) ÷ (Total generations (g) × Mutation rate (μ))</code> — the form to use when Number of observed mutants (x), Total generations (g) and Mutation rate (μ) are the values you have.</li><li><strong>Number of observed mutants (x)</strong> = <code>Total generations (g) × Mutation rate (μ) × Size of sequenced DNA (b)</code> — the form to use when Total generations (g), Mutation rate (μ) and Size of sequenced DNA (b) are the values you have.</li><li><strong>Mutation rate</strong> = <code>− ln(Zero mutant fraction) ÷ Total cells</code> — the form to use when Zero mutant fraction and Total cells are the values you have.</li></ul><p>Any one of Mutation rate (μ), Mutant offspring (x) and Total offspring (N) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Mutation rate (μ), Number of observed mutants (x) and Total generations (g) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Mutant offspring (x) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Mutant offspring (x) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Total offspring (N) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total offspring (N) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Mutant offspring (x) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Mutation rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Mutant offspring (x)</strong> takes a plain number with no unit attached. Offspring showing the trait whose parents are both unaffected. Change it and Total offspring (N) and Mutation rate (μ) changes with it. Fill it from a measurement rather than a memory — Mutant offspring (x) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total offspring (N)</strong> takes a plain number with no unit attached. Total number of births in the studied population. Change it and Mutant offspring (x) and Mutation rate (μ) changes with it. Fill it from a measurement rather than a memory — Total offspring (N) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 8 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Mutation rate (μ)</strong> is a plain number. It is computed from Mutant offspring (x) and Total offspring (N), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Number of observed mutants (x)</strong> is a plain number. It is computed from Total generations (g), Mutation rate (μ) and Size of sequenced DNA (b), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total generations (g)</strong> is a plain number. It is computed from Number of observed mutants (x), Mutation rate (μ) and Size of sequenced DNA (b), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Size of sequenced DNA (b)</strong> is a plain number. It is computed from Number of observed mutants (x), Total generations (g) and Mutation rate (μ), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Mutation rate (μ)</strong> is a plain number. It is computed from Number of observed mutants (x), Total generations (g) and Size of sequenced DNA (b), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total cells</strong> is a plain number. It is computed from Zero mutant fraction and Mutation rate, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Zero mutant fraction</strong> is a plain number. It is computed from Mutation rate and Total cells, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Mutation rate</strong> is a plain number. It is computed from Zero mutant fraction and Total cells, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Mutation rate (μ) is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Mutant offspring (x) and Total offspring (N) and the number you are missing is Mutation rate (μ) and Number of observed mutants (x).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/fish-oil-dosage-for-cats">Fish oil dosage for cats Calculator</a>, <a href="/biology/fish-per-liter">Fish Per Liter Calculator</a> and <a href="/biology/fish-tank-stocking">Fish Tank Stocking Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mutation rate calculator work out?', 'a' => <<<'TXT'
            Mutation rate (μ), Number of observed mutants (x), Total generations (g) and Size of sequenced DNA (b), from Mutant offspring (x) and Total offspring (N). The relationship is Mutation rate (μ) = (1 ÷ 2) × Mutant offspring (x) ÷ Total offspring (N).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Mutant offspring (x), Total offspring (N). Fill mutant offspring (x) and total offspring (N) and leave Mutation rate (μ) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Mutation rate (μ), Mutant offspring (x), Total offspring (N) and Mutation rate (μ) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Mutation rate (μ) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Mutant offspring (x) blank and the page solves for it, reporting Mutation rate (μ) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Mutation rate (μ) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/fish-oil-dosage-for-cats', 'name' => 'Fish oil dosage for cats Calculator'],
            ['path' => '/biology/fish-per-liter', 'name' => 'Fish Per Liter Calculator'],
            ['path' => '/biology/fish-tank-stocking', 'name' => 'Fish Tank Stocking Calculator'],
        ],
        'authors' => [],
    ],
];
