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
    'meta' => ['title' => 'Mutation frequency — Free Online Calculator', 'description' => 'Put number of observed mutants (m) and Number of cells in culture (N) in and read mutation frequency (μ) back. The formula is printed in the form\'s own words.', 'h1' => 'Mutation frequency Calculator', 'updated' => '2026-07-06'],
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
        Mutation frequency turns Number of observed mutants (m) and Number of cells in culture (N) into Mutation frequency (μ). There is no hidden constant here: change mutation frequency (μ) and number of observed mutants (m) moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Mutation frequency calculator works', 'html' => <<<'TXT'
            <p>Mutation frequency answers one question from 2 numbers, and the answer is Mutation frequency (μ).</p><p>Written with the labels from the form, Mutation frequency (μ) = Number of observed mutants (m) ÷ Number of cells in culture (N).</p><p>The answers are Mutation frequency (μ); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Number of observed mutants (m)</strong> — a plain number, no unit</li><li><strong>Number of cells in culture (N)</strong> — a plain number, no unit</li></ul><p>The answer comes back as Mutation frequency (μ). The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Number of observed mutants (m) = 10 and Number of cells in culture (N) = 100 gives <strong>Mutation frequency (μ)</strong> = 0.1.</p><ul><li><strong>Mutation frequency (μ)</strong> = 0.1</li></ul><p>That is <strong>Mutation frequency (μ)</strong> = <code>Number of observed mutants (m) ÷ Number of cells in culture (N)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Mutation frequency (μ)</strong> = 0.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Mutation frequency (μ) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Mutation frequency (μ)</strong> = <code>Number of observed mutants (m) ÷ Number of cells in culture (N)</code></li><li><strong>Number of observed mutants (m)</strong> = <code>Number of cells in culture (N) × Mutation frequency (μ)</code></li><li><strong>Number of cells in culture (N)</strong> = <code>Number of observed mutants (m) ÷ Mutation frequency (μ)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Mutation frequency (μ)</strong> = <code>Number of observed mutants (m) ÷ Number of cells in culture (N)</code> — the form to use when Number of observed mutants (m) and Number of cells in culture (N) are the values you have.</li><li><strong>Number of observed mutants (m)</strong> = <code>Number of cells in culture (N) × Mutation frequency (μ)</code> — the form to use when Number of cells in culture (N) and Mutation frequency (μ) are the values you have.</li><li><strong>Number of cells in culture (N)</strong> = <code>Number of observed mutants (m) ÷ Mutation frequency (μ)</code> — the form to use when Number of observed mutants (m) and Mutation frequency (μ) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Mutation frequency (μ), Number of observed mutants (m) and Number of cells in culture (N) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Number of observed mutants (m) from 10 to 20, leaving every other box alone. The panel moves from <strong>Mutation frequency (μ)</strong> 0.1 to <strong>Mutation frequency (μ)</strong> 0.2.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Mutation frequency (μ) is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Number of observed mutants (m) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of observed mutants (m) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of cells in culture (N) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of cells in culture (N) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Number of observed mutants (m) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Number of observed mutants (m)</strong> takes a plain number with no unit attached. Change it and Mutation frequency (μ) and Number of cells in culture (N) changes with it. Have it to hand before you start: Number of observed mutants (m) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of cells in culture (N)</strong> takes a plain number with no unit attached. Change it and Mutation frequency (μ) and Number of observed mutants (m) changes with it. Have it to hand before you start: Number of cells in culture (N) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Mutation frequency (μ)</strong> is a plain number and the page's own defaults put it at 0.1. The value follows from Number of observed mutants (m) and Number of cells in culture (N). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Mutation frequency (μ)</th></tr></thead><tbody><tr><td><strong>Number of observed mutants (m)</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Number of cells in culture (N)</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Number of observed mutants (m) sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Number of observed mutants (m) = 5 and Number of cells in culture (N) = 50, the answer is <strong>Mutation frequency (μ)</strong> = 0.1.</li><li>With Number of observed mutants (m) = 30 and Number of cells in culture (N) = 100, the answer is <strong>Mutation frequency (μ)</strong> = 0.3.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Number of observed mutants (m) and Number of cells in culture (N). Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Number of observed mutants (m) into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Mutation frequency (μ) with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Mutation frequency (μ) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Number of observed mutants (m) and Number of cells in culture (N) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Number of observed mutants (m) and Number of cells in culture (N) and the number you are missing is Mutation frequency (μ).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/transpiration-rate">Transpiration Rate Calculator</a>, <a href="/biology/tree-age">Tree age</a> and <a href="/biology/tree-diameter">Tree diameter Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Mutation frequency is a number to act on, so the useful question is what to do with Mutation frequency (μ) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Number of observed mutants (m) and Number of cells in culture (N) alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mutation frequency calculator work out?', 'a' => <<<'TXT'
            Mutation frequency (μ), from Number of observed mutants (m) and Number of cells in culture (N). The relationship is Mutation frequency (μ) = Number of observed mutants (m) ÷ Number of cells in culture (N).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of observed mutants (m), Number of cells in culture (N). Fill number of observed mutants (m) and number of cells in culture (N) and leave Mutation frequency (μ) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Mutation frequency (μ), Number of observed mutants (m) and Number of cells in culture (N) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Mutation frequency (μ) = 0.1. The figures come from Number of observed mutants (m) as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Mutation frequency (μ) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
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
