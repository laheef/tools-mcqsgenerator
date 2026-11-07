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
    'meta' => ['title' => 'Mutation frequency — Free Online Calculator', 'description' => 'Mutation frequency turns Number of observed mutants (m) and Number of cells in culture (N) into Mutation frequency (μ). There is no hidden constant here…', 'h1' => 'Mutation frequency Calculator', 'updated' => '2026-07-06'],
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
        'intro' => <<<'TXT'
        Mutation frequency turns Number of observed mutants (m) and Number of cells in culture (N) into Mutation frequency (μ). There is no hidden constant here: change Mutation frequency (μ) and Number of observed mutants (m) moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Mutation frequency calculator works', 'html' => <<<'TXT'
            <p>Mutation frequency answers one question from 2 numbers, and the answer is Mutation frequency (μ).</p><p>Written with the labels from the form, Mutation frequency (μ) = Number of observed mutants (m) ÷ Number of cells in culture (N).</p><p>The answers are Mutation frequency (μ); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Number of observed mutants (m)</strong> — a plain number, no unit</li><li><strong>Number of cells in culture (N)</strong> — a plain number, no unit</li></ul><p>The answer comes back as Mutation frequency (μ). </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Number of observed mutants (m) = 10 and Number of cells in culture (N) = 100 gives &lt;strong&gt;Mutation frequency (μ)&lt;/strong&gt; = 0.1.</p><ul><li><strong>Mutation frequency (μ)</strong> = 0.1</li></ul><p>That is <strong>Mutation frequency (μ)</strong> = <code>Number of observed mutants (m) ÷ Number of cells in culture (N)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Mutation frequency (μ)&lt;/strong&gt; = 0.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Mutation frequency (μ) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Mutation frequency (μ)</strong> = <code>Number of observed mutants (m) ÷ Number of cells in culture (N)</code></li><li><strong>Number of observed mutants (m)</strong> = <code>Number of cells in culture (N) × Mutation frequency (μ)</code></li><li><strong>Number of cells in culture (N)</strong> = <code>Number of observed mutants (m) ÷ Mutation frequency (μ)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Mutation frequency (μ), Number of observed mutants (m) and Number of cells in culture (N) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Number of observed mutants (m) from 10 to 20, leaving every other box alone. The panel moves from &lt;strong&gt;Mutation frequency (μ)&lt;/strong&gt; 0.1 to &lt;strong&gt;Mutation frequency (μ)&lt;/strong&gt; 0.2.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Mutation frequency (μ) is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Number of observed mutants (m) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Number of observed mutants (m) and Number of cells in culture (N) and the number you are missing is Mutation frequency (μ).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/transpiration-rate">Transpiration Rate Calculator</a>, <a href="/biology/tree-age">Tree age</a> and <a href="/biology/tree-diameter">Tree diameter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mutation frequency calculator work out?', 'a' => <<<'TXT'
            Mutation frequency (μ), from Number of observed mutants (m) and Number of cells in culture (N). The relationship is Mutation frequency (μ) = Number of observed mutants (m) ÷ Number of cells in culture (N).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of observed mutants (m), Number of cells in culture (N). Fill mutants and cellCulture and leave Mutation frequency (μ) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Mutation frequency (μ), Number of observed mutants (m) and Number of cells in culture (N) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Mutation frequency (μ) = 0.1. The figures come from Number of observed mutants (m) as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Mutation frequency (μ) is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Number of observed mutants (m) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Mutation frequency (μ) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/transpiration-rate', 'name' => 'Transpiration Rate Calculator'],
            ['path' => '/biology/tree-age', 'name' => 'Tree age'],
            ['path' => '/biology/tree-diameter', 'name' => 'Tree diameter Calculator'],
        ],
        'authors' => [],
    ],
];
