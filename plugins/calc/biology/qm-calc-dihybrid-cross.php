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
    'meta' => ['title' => 'Dihybrid Cross Calculator (9:3:3:1) — Biology', 'description' => 'Dihybrid Cross Calculator (9:3:3:1) turns F2 offspring into Dominant / dominant and Dominant / recessive. Dominant / dominant is opened in individuals; the…', 'h1' => 'Dihybrid Cross Calculator (9:3:3:1)', 'updated' => '2026-10-29'],
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
        Dihybrid Cross Calculator (9:3:3:1) turns F2 offspring into Dominant / dominant and Dominant / recessive. Nothing is looked up on this page: Dominant / dominant is computed from F2 offspring and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Dominant / dominant is opened in individuals; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Dihybrid Cross Calculator (9:3:3:1) calculator works', 'html' => <<<'TXT'
            <p>The Dihybrid Cross Calculator (9:3:3:1) calculator applies one relationship to 1 number and reports Dominant / dominant, Dominant / recessive and Recessive / dominant.</p><p>The relationship it solves reads Dominant / dominant = F2 offspring × 9 ÷ 16.</p><p>The answers are Dominant / dominant, Dominant / recessive, Recessive / dominant and Recessive / recessive; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>F2 offspring</strong> — in individuals</li></ul><p>The result boxes are Dominant / dominant in individuals, Dominant / recessive in individuals, Recessive / dominant in individuals, Recessive / recessive in individuals, Phenotype classes, Genotype classes, Recombinant phenotypes in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, F2 offspring = 320 individuals gives &lt;strong&gt;Dominant / dominant&lt;/strong&gt; = 180 individuals, &lt;strong&gt;Dominant / recessive&lt;/strong&gt; = 60 individuals, &lt;strong&gt;Recessive / dominant&lt;/strong&gt; = 60 individuals, &lt;strong&gt;Recessive / recessive&lt;/strong&gt; = 20 individuals, &lt;strong&gt;Phenotype classes&lt;/strong&gt; = 4, &lt;strong&gt;Genotype classes&lt;/strong&gt; = 9 and &lt;strong&gt;Recombinant phenotypes&lt;/strong&gt; = 37.5 %.</p><ul><li><strong>Dominant / dominant</strong> = 180 individuals</li><li><strong>Dominant / recessive</strong> = 60 individuals</li><li><strong>Recessive / dominant</strong> = 60 individuals</li><li><strong>Recessive / recessive</strong> = 20 individuals</li><li><strong>Phenotype classes</strong> = 4</li><li><strong>Genotype classes</strong> = 9</li><li><strong>Recombinant phenotypes</strong> = 37.5 %</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Dominant / dominant</strong> = <code>F2 offspring × 9 ÷ 16</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Dominant / dominant&lt;/strong&gt; = 180, &lt;strong&gt;Dominant / recessive&lt;/strong&gt; = 60, &lt;strong&gt;Recessive / dominant&lt;/strong&gt; = 60, &lt;strong&gt;Recessive / recessive&lt;/strong&gt; = 20, &lt;strong&gt;Phenotype classes&lt;/strong&gt; = 4, &lt;strong&gt;Genotype classes&lt;/strong&gt; = 9 and &lt;strong&gt;Recombinant phenotypes&lt;/strong&gt; = 37.5 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Dominant / dominant takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Dominant / dominant</strong> = <code>F2 offspring × 9 ÷ 16</code></li><li><strong>Dominant / recessive</strong> = <code>F2 offspring × 3 ÷ 16</code></li><li><strong>Recessive / dominant</strong> = <code>F2 offspring × 3 ÷ 16</code></li><li><strong>Recessive / recessive</strong> = <code>F2 offspring × 1 ÷ 16</code></li><li><strong>Phenotype classes</strong> = <code>4</code></li><li><strong>Genotype classes</strong> = <code>9</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Dominant / dominant, Dominant / recessive and Recessive / dominant can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — F2 offspring, from 320 to 640 — and the answers go from &lt;strong&gt;Dominant / dominant&lt;/strong&gt; 180 individuals, &lt;strong&gt;Dominant / recessive&lt;/strong&gt; 60 individuals, &lt;strong&gt;Recessive / dominant&lt;/strong&gt; 60 individuals, &lt;strong&gt;Recessive / recessive&lt;/strong&gt; 20 individuals, &lt;strong&gt;Phenotype classes&lt;/strong&gt; 4, &lt;strong&gt;Genotype classes&lt;/strong&gt; 9 and &lt;strong&gt;Recombinant phenotypes&lt;/strong&gt; 37.5 % to &lt;strong&gt;Dominant / dominant&lt;/strong&gt; 360 individuals, &lt;strong&gt;Dominant / recessive&lt;/strong&gt; 120 individuals, &lt;strong&gt;Recessive / dominant&lt;/strong&gt; 120 individuals, &lt;strong&gt;Recessive / recessive&lt;/strong&gt; 40 individuals, &lt;strong&gt;Phenotype classes&lt;/strong&gt; 4, &lt;strong&gt;Genotype classes&lt;/strong&gt; 9 and &lt;strong&gt;Recombinant phenotypes&lt;/strong&gt; 37.5 %.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Dominant / dominant, Dominant / recessive and Recessive / dominant are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If F2 offspring is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are F2 offspring and the number you are missing is Dominant / dominant and Dominant / recessive.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/vapor-pressure-deficit">Vapor pressure deficit Calculator</a>, <a href="/biology/vegetable-seed">Vegetable seed</a> and <a href="/biology/vegetable-yield">Vegetable yield</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dihybrid Cross Calculator (9:3:3:1) calculator work out?', 'a' => <<<'TXT'
            Dominant / dominant, Dominant / recessive, Recessive / dominant and Recessive / recessive, from F2 offspring. The relationship is Dominant / dominant = F2 offspring × 9 ÷ 16.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'F2 offspring (individuals). Fill n and leave Dominant / dominant empty if you would rather have that one solved instead.'],
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
