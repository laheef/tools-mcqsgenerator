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
    'meta' => ['title' => 'Dihybrid Cross Calculator (9:3:3:1) — Biology', 'description' => 'A dihybrid cross follows two genes at once. It returns dominant / dominant, dominant / recessive, recessive / dominant and recessive / recessive, and the…', 'h1' => 'Dihybrid Cross Calculator (9:3:3:1)', 'updated' => '2026-10-29'],
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
        A dihybrid cross follows two genes at once. It returns dominant / dominant, dominant / recessive, recessive / dominant and recessive / recessive, and the panel shows all of them at once.
        
        With independent assortment the F2 of a double heterozygote splits 9:3:3:1, and this calculator gives those counts, the phenotype and genotype tables, and the ratio you would expect from a sample of any size.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Dihybrid Cross (9:3:3:1)', 'html' => <<<'TXT'
            <p>AaBb × AaBb → 9 A_B_: 3 A_bb: 3 aaB_: 1 aabb</p>
            <figure class="calc-figure"><img src="/uploads/biology/dihybrid-cross.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Dihybrid Cross Calculator (9:3:3:1) — The 4 × 4 Punnett square behind the 9:3:3:1 ratio." title="Dihybrid Cross Calculator (9:3:3:1)"><figcaption>The 4 × 4 Punnett square behind the 9:3:3:1 ratio.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>n</code></td><td>number of F2 offspring scored</td><td>individuals</td></tr><tr><td><code>:16</code></td><td>sixteen equally likely gamete combinations</td><td>—</td></tr><tr><td><code>recombinant</code></td><td>the two mixed phenotypes, 6/16</td><td>share</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Dihybrid Cross (9:3:3:1)?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: f2 offspring of <strong>320</strong> individuals.</p>
            <p>Substituting them into the formula gives dominant / dominant of <strong>180</strong> individuals, dominant / recessive of <strong>60</strong> individuals, recessive / dominant of <strong>60</strong> individuals, recessive / recessive of <strong>20</strong> individuals, phenotype classes of <strong>4</strong>, genotype classes of <strong>9</strong>, recombinant phenotypes of <strong>37.5</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>The 9:3:3:1 ratio requires the two genes to be on different chromosomes, or far enough apart on the same one to assort independently.</p></li><li><p>Linked genes shift the ratio toward the parental classes; measuring the departure is how recombination frequency is estimated.</p></li><li><p>Genotype rather than phenotype data splits the 9:3:3:1 into nine classes: 1:2:1:2:4:2:1:2:1.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Scoring too few offspring — with 20 plants, the 1/16 class may be absent by chance.</li><li>Pooling data across crosses with different parents.</li><li>Assuming independent assortment for two genes on the same chromosome.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why 16 combinations?', 'a' => 'Each parent makes four gamete types, and 4 × 4 = 16 equally likely fertilisations.'],
            ['q' => 'What ratio do I get if the genes are linked?', 'a' => 'More parental and fewer recombinant classes than 9:3:3:1 — the exact proportions depend on the recombination frequency.'],
            ['q' => 'How many genotypes come out of a dihybrid cross?', 'a' => 'Nine, from AABB to aabb.'],
            ['q' => 'What does the Dihybrid Cross (9:3:3:1) actually calculate?', 'a' => <<<'TXT'
            It returns dominant / dominant, dominant / recessive, recessive / dominant and recessive / recessive. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [],
    ],
];
