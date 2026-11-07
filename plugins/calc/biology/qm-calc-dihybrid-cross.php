<?php

/**
 * Dihybrid Cross Calculator (9:3:3:1)
 * /biology/dihybrid-cross
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dihybrid Cross Calculator (9:3:3:1)',
    'meta' => ['title' => 'Dihybrid Cross Calculator (9:3:3:1) — Biology', 'description' => 'Dihybrid Cross Calculator (9:3:3:1) reports dominant / dominant, dominant / recessive, recessive / dominant and recessive / recessive. Every figure is computed.', 'h1' => 'Dihybrid Cross Calculator (9:3:3:1)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'n',
                            'label' => 'F2 offspring',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '320',
                        ],
                        [
                            'name' => 'dom_dom',
                            'label' => 'Dominant / dominant',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dom_rec',
                            'label' => 'Dominant / recessive',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rec_dom',
                            'label' => 'Recessive / dominant',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rec_rec',
                            'label' => 'Recessive / recessive',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pheno_classes',
                            'label' => 'Phenotype classes',
                            'type' => 'number',
                            'help' => '4',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'geno_classes',
                            'label' => 'Genotype classes',
                            'type' => 'number',
                            'help' => '9',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'recomb',
                            'label' => 'Recombinant phenotypes',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'F2 ratio',
            'results' => [
                'dom_dom' => 'n*9/16',
                'dom_rec' => 'n*3/16',
                'rec_dom' => 'n*3/16',
                'rec_rec' => 'n*1/16',
                'pheno_classes' => '4',
                'geno_classes' => '9',
                'recomb' => '6/16*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dihybrid Cross Calculator (9:3:3:1) turns F2 offspring into Dominant / dominant and Dominant / recessive. Nothing is looked up on this page: dominant / dominant is computed from f2 offspring and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Dominant / dominant is opened in individuals; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Dihybrid Cross Calculator (9:3:3:1) calculator works', 'html' => <<<'TXT'
            <p>The Dihybrid Cross Calculator (9:3:3:1) calculator applies one relationship to 1 number and reports Dominant / dominant, Dominant / recessive and Recessive / dominant.</p><p>The relationship it solves reads Dominant / dominant = F2 offspring × 9 ÷ 16.</p><p>The answers are Dominant / dominant, Dominant / recessive, Recessive / dominant and Recessive / recessive; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>F2 offspring</strong> — in individuals</li></ul><p>The result boxes are Dominant / dominant in individuals, Dominant / recessive in individuals, Recessive / dominant in individuals, Recessive / recessive in individuals, Phenotype classes, Genotype classes, Recombinant phenotypes in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, F2 offspring = 320 individuals gives <strong>Dominant / dominant</strong> = 180 individuals, <strong>Dominant / recessive</strong> = 60 individuals, <strong>Recessive / dominant</strong> = 60 individuals, <strong>Recessive / recessive</strong> = 20 individuals, <strong>Phenotype classes</strong> = 4, <strong>Genotype classes</strong> = 9 and <strong>Recombinant phenotypes</strong> = 37.5 %.</p><ul><li><strong>Dominant / dominant</strong> = 180 individuals</li><li><strong>Dominant / recessive</strong> = 60 individuals</li><li><strong>Recessive / dominant</strong> = 60 individuals</li><li><strong>Recessive / recessive</strong> = 20 individuals</li><li><strong>Phenotype classes</strong> = 4</li><li><strong>Genotype classes</strong> = 9</li><li><strong>Recombinant phenotypes</strong> = 37.5 %</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Dominant / dominant</strong> = <code>F2 offspring × 9 ÷ 16</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Dominant / dominant</strong> = 180, <strong>Dominant / recessive</strong> = 60, <strong>Recessive / dominant</strong> = 60, <strong>Recessive / recessive</strong> = 20, <strong>Phenotype classes</strong> = 4, <strong>Genotype classes</strong> = 9 and <strong>Recombinant phenotypes</strong> = 37.5 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Dominant / dominant takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Dominant / dominant</strong> = <code>F2 offspring × 9 ÷ 16</code></li><li><strong>Dominant / recessive</strong> = <code>F2 offspring × 3 ÷ 16</code></li><li><strong>Recessive / dominant</strong> = <code>F2 offspring × 3 ÷ 16</code></li><li><strong>Recessive / recessive</strong> = <code>F2 offspring × 1 ÷ 16</code></li><li><strong>Phenotype classes</strong> = <code>4</code></li><li><strong>Genotype classes</strong> = <code>9</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Dominant / dominant</strong> = <code>F2 offspring × 9 ÷ 16</code> — the form to use when F2 offspring are the values you have.</li><li><strong>Dominant / recessive</strong> = <code>F2 offspring × 3 ÷ 16</code> — the form to use when F2 offspring are the values you have.</li><li><strong>Recessive / dominant</strong> = <code>F2 offspring × 3 ÷ 16</code> — the form to use when F2 offspring are the values you have.</li><li><strong>Recessive / recessive</strong> = <code>F2 offspring × 1 ÷ 16</code> — the form to use when F2 offspring are the values you have.</li><li><strong>Phenotype classes</strong> = <code>4</code> — the form to use when the other values are known.</li><li><strong>Genotype classes</strong> = <code>9</code> — the form to use when the other values are known.</li><li><strong>Recombinant phenotypes</strong> = <code>6 ÷ 16 × 100</code> — the form to use when the other values are known.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Dominant / dominant, Dominant / recessive and Recessive / dominant can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — F2 offspring, from 320 to 640 — and the answers go from <strong>Dominant / dominant</strong> 180 individuals, <strong>Dominant / recessive</strong> 60 individuals, <strong>Recessive / dominant</strong> 60 individuals, <strong>Recessive / recessive</strong> 20 individuals, <strong>Phenotype classes</strong> 4, <strong>Genotype classes</strong> 9 and <strong>Recombinant phenotypes</strong> 37.5 % to <strong>Dominant / dominant</strong> 360 individuals, <strong>Dominant / recessive</strong> 120 individuals, <strong>Recessive / dominant</strong> 120 individuals, <strong>Recessive / recessive</strong> 40 individuals, <strong>Phenotype classes</strong> 4, <strong>Genotype classes</strong> 9 and <strong>Recombinant phenotypes</strong> 37.5 %.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Dominant / dominant, Dominant / recessive and Recessive / dominant are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>F2 offspring left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If F2 offspring is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If F2 offspring is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>F2 offspring</strong> is measured in individuals. It feeds Dominant / dominant, Dominant / recessive and Recessive / dominant. Have it to hand before you start: F2 offspring is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 7 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Dominant / dominant</strong> is a plain number and the page's own defaults put it at 180. It is worked out from F2 offspring. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Dominant / recessive</strong> is a plain number and the page's own defaults put it at 60. It is worked out from F2 offspring. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Recessive / dominant</strong> is a plain number and the page's own defaults put it at 60. It is worked out from F2 offspring. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Recessive / recessive</strong> is a plain number and the page's own defaults put it at 20. It is worked out from F2 offspring. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Phenotype classes</strong> is a plain number and the page's own defaults put it at 4. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Genotype classes</strong> is a plain number and the page's own defaults put it at 9. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Recombinant phenotypes</strong> is a plain number and the page's own defaults put it at 37.5. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Dominant / dominant</th><th>Dominant / recessive</th><th>Recessive / dominant</th><th>Recessive / recessive</th><th>Phenotype classes</th><th>Genotype classes</th><th>Recombinant phenotypes</th></tr></thead><tbody><tr><td><strong>F2 offspring</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, F2 offspring sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With F2 offspring = 160 individuals, the answer is <strong>Dominant / dominant</strong> = 90 individuals, <strong>Dominant / recessive</strong> = 30 individuals, <strong>Recessive / dominant</strong> = 30 individuals, <strong>Recessive / recessive</strong> = 10 individuals, <strong>Phenotype classes</strong> = 4, <strong>Genotype classes</strong> = 9 and <strong>Recombinant phenotypes</strong> = 37.5 %.</li><li>With F2 offspring = 960 individuals, the answer is <strong>Dominant / dominant</strong> = 540 individuals, <strong>Dominant / recessive</strong> = 180 individuals, <strong>Recessive / dominant</strong> = 180 individuals, <strong>Recessive / recessive</strong> = 60 individuals, <strong>Phenotype classes</strong> = 4, <strong>Genotype classes</strong> = 9 and <strong>Recombinant phenotypes</strong> = 37.5 %.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Dominant / dominant follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are F2 offspring and the number you are missing is Dominant / dominant and Dominant / recessive.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/vapor-pressure-deficit">Vapor pressure deficit Calculator</a>, <a href="/biology/vegetable-seed">Vegetable seed</a> and <a href="/biology/vegetable-yield">Vegetable yield</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dihybrid Cross Calculator (9:3:3:1) calculator work out?', 'a' => <<<'TXT'
            Dominant / dominant, Dominant / recessive, Recessive / dominant and Recessive / recessive, from F2 offspring. The relationship is Dominant / dominant = F2 offspring × 9 ÷ 16.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'F2 offspring (individuals). Fill f2 offspring and leave Dominant / dominant empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Dominant / dominant, Dominant / recessive, Recessive / dominant and Recessive / recessive can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Dominant / dominant = 180 individuals, Dominant / recessive = 60 individuals, Recessive / dominant = 60 individuals, Recessive / recessive = 20 individuals, Phenotype classes = 4, Genotype classes = 9 and Recombinant phenotypes = 37.5 %. The figures come from F2 offspring as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Dominant / dominant is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With F2 offspring left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Dominant / dominant at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/vapor-pressure-deficit', 'name' => 'Vapor pressure deficit Calculator'],
            ['path' => '/biology/vegetable-seed', 'name' => 'Vegetable seed'],
            ['path' => '/biology/vegetable-yield', 'name' => 'Vegetable yield'],
        ],
        'authors' => [],
    ],
];
