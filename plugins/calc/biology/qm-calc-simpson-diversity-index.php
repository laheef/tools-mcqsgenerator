<?php

/**
 * Simpson's Diversity Index Calculator
 * /biology/simpson-diversity-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Simpson\'s Diversity Index Calculator',
    'meta' => ['title' => 'Simpson\'s Diversity Index Calculator — Biology', 'description' => 'Simpson\'s index measures how likely it is that two individuals picked at random from a community belong to the same species — so a high value means a…', 'h1' => 'Simpson\'s Diversity Index Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Individuals of species 1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'n2',
                            'label' => 'Individuals of species 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'n3',
                            'label' => 'Individuals of species 3',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'n4',
                            'label' => 'Individuals of species 4',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'n5',
                            'label' => 'Individuals of species 5',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'd',
                            'label' => 'Simpson\'s index (D)',
                            'type' => 'number',
                            'help' => 'Probability two random individuals are the same species',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'diversity',
                            'label' => 'Simpson\'s diversity (1 − D)',
                            'type' => 'number',
                            'help' => 'Higher means more diverse',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'reciprocal',
                            'label' => 'Reciprocal index (1 ÷ D)',
                            'type' => 'number',
                            'help' => 'Effective number of species',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'evenness',
                            'label' => 'Evenness',
                            'type' => 'number',
                            'help' => '1 means every species is equally common',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'richness',
                            'label' => 'Species richness',
                            'type' => 'number',
                            'help' => 'Species with at least one individual',
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
            'title' => 'Index',
            'results' => [
                'richness' => 'if_else(n1>0,1,0)+if_else(n2>0,1,0)+if_else(n3>0,1,0)+if_else(n4>0,1,0)+if_else(n5>0,1,0)',
                'd' => '(n1*(n1-1)+n2*(n2-1)+n3*(n3-1)+n4*(n4-1)+n5*(n5-1))/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1))',
                'diversity' => '1-(n1*(n1-1)+n2*(n2-1)+n3*(n3-1)+n4*(n4-1)+n5*(n5-1))/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1))',
                'reciprocal' => '1/((n1*(n1-1)+n2*(n2-1)+n3*(n3-1)+n4*(n4-1)+n5*(n5-1))/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1)))',
                'evenness' => <<<'TXT'
                (1/((n1*(n1-1)+n2*(n2-1)+n3*(n3-1)+n4*(n4-1)+n5*(n5-1))/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1))))/(if_else(n1>0,1,0)+if_else(n2>0,1,0)+if_else(n3>0,1,0)+if_else(n4>0,1,0)+if_else(n5>0,1,0))
                TXT,
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Simpson's index measures how likely it is that two individuals picked at random from a community belong to the same species — so a high value means a low-diversity community. It returns species richness, simpson's index (D), simpson's diversity (1 − D) and reciprocal index (1 ÷ D), and the panel shows all of them at once.
        
        It is the standard index for dominance, and the one to use when a few species dominate the sample.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Simpson\'s Diversity Index', 'html' => <<<'TXT'
            <p>D = Σ nᵢ(nᵢ − 1) ÷ [N(N − 1)]. Diversity = 1 − D. Reciprocal index = 1 ÷ D, the effective number of species</p>
            <figure class="calc-figure"><img src="/uploads/biology/simpson-diversity-index.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Simpson's Diversity Index Calculator — Simpson's diversity in three communities" title="Simpson's Diversity Index Calculator"><figcaption>Simpson's diversity in three communities</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>nᵢ</code></td><td>number of individuals of species i</td><td>individuals</td></tr><tr><td><code>N</code></td><td>total individuals across all species</td><td>individuals</td></tr><tr><td><code>D</code></td><td>probability that two random individuals are the same species</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Simpson\'s Diversity Index?', 'html' => <<<'TXT'
            <ol><li>Count the individuals of each species in your sample (up to five species).</li><li>The index, the diversity, the reciprocal index and the evenness are all calculated.</li><li>Read 1 − D or 1/D for a number that rises with diversity.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: individuals of species 1 of <strong>40</strong>, individuals of species 2 of <strong>25</strong>, individuals of species 3 of <strong>15</strong>, individuals of species 4 of <strong>12</strong>, individuals of species 5 of <strong>8</strong>.</p>
            <p>Substituting them into the formula gives species richness of <strong>5</strong>, simpson's index (d) of <strong>0.2584</strong>, simpson's diversity (1 − d) of <strong>0.7416</strong>, reciprocal index (1 ÷ d) of <strong>3.87</strong>, evenness of <strong>0.774</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>D above 0.6</td><td><strong>Low diversity</strong></td><td>one or two species dominate</td></tr><tr><td>D 0.3 – 0.6</td><td><strong>Moderate</strong></td><td>a few common species with several rare ones</td></tr><tr><td>D below 0.2</td><td><strong>High diversity</strong></td><td>individuals are spread evenly across many species</td></tr></tbody></table>
            <ul><li><p>Two forms exist: the finite-sample form used here (n(n−1)/N(N−1)) and the simpler Σp² for an infinite population. They agree closely once samples are large.</p></li><li><p>Simpson's index is dominated by the commonest species, which is why it is called a dominance index. Shannon's index weights rare species more heavily.</p></li><li><p>The reciprocal 1/D is the most interpretable number: it is the effective number of equally common species that would give the same diversity.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Reporting D where 1 − D was meant, which inverts the meaning of the answer.</li><li>Using percentages as counts — the formula needs individuals.</li><li>Comparing samples of very different size without rarefying them first.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Is a higher Simpson\'s index more diverse?', 'a' => 'No. D is the probability of picking two of the same species, so higher D means lower diversity; use 1 − D or 1/D.'],
            ['q' => 'What is the difference from Shannon?', 'a' => 'Shannon is more sensitive to rare species; Simpson to dominant ones.'],
            ['q' => 'What does a reciprocal index of 4 mean?', 'a' => 'The community behaves like one with four equally common species.'],
            ['q' => 'What does the Simpson\'s Diversity Index actually calculate?', 'a' => <<<'TXT'
            It returns species richness, simpson's index (D), simpson's diversity (1 − D) and reciprocal index (1 ÷ D). Each one is derived by the formula on this page, so you can check any figure by hand.
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
