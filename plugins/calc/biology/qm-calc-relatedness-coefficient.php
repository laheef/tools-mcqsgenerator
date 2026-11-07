<?php

/**
 * Relatedness Coefficient Calculator
 * /biology/relatedness-coefficient
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Relatedness Coefficient Calculator',
    'meta' => ['title' => 'Relatedness Coefficient Calculator — Biology', 'description' => 'The coefficient of relationship is the share of alleles two individuals have in common by descent: 50% for a parent and child, 25% for half-siblings, 12.5%…', 'h1' => 'Relatedness Coefficient Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'n1',
                            'label' => 'Meioses from individual 1',
                            'type' => 'number',
                            'help' => 'Steps up to the common ancestor',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'n2',
                            'label' => 'Meioses from individual 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'paths',
                            'label' => 'Paths through common ancestors',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'r',
                            'label' => 'Coefficient of relationship',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cm',
                            'label' => 'Expected shared DNA',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'shared_dna',
                            'label' => 'Shared DNA share',
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
            'title' => 'Relatedness',
            'results' => ['r' => 'pow(0.5,n1+n2)*paths*100', 'cm' => 'pow(0.5,n1+n2)*paths*6800', 'shared_dna' => 'pow(0.5,n1+n2)*paths*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The coefficient of relationship is the share of alleles two individuals have in common by descent: 50% for a parent and child, 25% for half-siblings, 12.5% for first cousins. It returns coefficient of relationship, expected shared DNA and shared DNA share, and the panel shows all of them at once.
        
        This calculator gives it for a pedigree distance and the expected shared DNA in centimorgans.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Relatedness Coefficient', 'html' => <<<'TXT'
            <p>r = Σ (½)^(n₁ + n₂), summed over common ancestors</p>
            <figure class="calc-figure"><img src="/uploads/biology/relatedness-coefficient.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Relatedness Coefficient Calculator — Relatedness by pedigree distance, from parent to third cousin." title="Relatedness Coefficient Calculator"><figcaption>Relatedness by pedigree distance, from parent to third cousin.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>n₁, n₂</code></td><td>meioses separating each individual from the shared ancestor</td><td>meioses</td></tr><tr><td><code>r</code></td><td>coefficient of relationship</td><td>%</td></tr><tr><td><code>cM</code></td><td>expected shared centimorgans, using 6 800 cM per genome</td><td>cM</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Relatedness Coefficient?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: meioses from individual 1 of <strong>2</strong>, meioses from individual 2 of <strong>2</strong>, paths through common ancestors of <strong>1</strong>.</p>
            <p>Substituting them into the formula gives coefficient of relationship of <strong>6.25</strong>%, expected shared dna of <strong>425</strong> cM, shared dna share of <strong>6.25</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>50%</td><td><strong>Parent–child, full siblings</strong></td><td>about 3 400 cM shared</td></tr><tr><td>25%</td><td><strong>Half-siblings, grandparent, aunt/uncle</strong></td><td>about 1 700 cM</td></tr><tr><td>12.5%</td><td><strong>First cousins</strong></td><td>about 850 cM</td></tr><tr><td>0.4%</td><td><strong>Third cousins</strong></td><td>at the edge of what consumer tests can resolve</td></tr></tbody></table>
            <ul><li><p>The relationship coefficient is twice the inbreeding coefficient of their offspring: full siblings are 50% related, so their offspring have F = 25%.</p></li><li><p>Expected shared centimorgans assume 6 800 cM per genome and uniform recombination; real sharing has a standard deviation of several hundred cM.</p></li><li><p>Consanguinity in the pedigree multiplies paths, which is why double first cousins are as related as half-siblings.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Counting meioses to the ancestor for one side and to the individual for the other.</li><li>Reporting shared DNA as identical by descent when some of it is merely identical by state.</li><li>Assuming a genetic test result must match the pedigree exactly.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How related are first cousins?', 'a' => '12.5%, sharing about 850 cM on average.'],
            ['q' => 'Why do siblings share 50% on average but not exactly?', 'a' => 'Because they inherit random halves of their parents\' chromosomes; the observed value varies around 50%.'],
            ['q' => 'What does the Relatedness Coefficient actually calculate?', 'a' => <<<'TXT'
            It returns coefficient of relationship, expected shared DNA and shared DNA share. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
        ],
        'related' => [],
    ],
];
