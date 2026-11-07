<?php

/**
 * Sørensen Similarity Index Calculator
 * /biology/sorensen-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sørensen Similarity Index Calculator',
    'meta' => ['title' => 'Sørensen Similarity Index Calculator — Biology', 'description' => 'The Sørensen index compares the species lists of two sites: it is twice the number of shared species divided by the total number of species records in both.', 'h1' => 'Sørensen Similarity Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'a',
                            'label' => 'Species only at site A',
                            'type' => 'number',
                            'suffix' => 'species',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'b',
                            'label' => 'Species only at site B',
                            'type' => 'number',
                            'suffix' => 'species',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'c',
                            'label' => 'Species at both sites',
                            'type' => 'number',
                            'suffix' => 'species',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'sorensen',
                            'label' => 'Sørensen similarity',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'jaccard',
                            'label' => 'Jaccard similarity',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dissimilarity',
                            'label' => 'Sørensen dissimilarity',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'beta',
                            'label' => 'Beta diversity (Sørensen)',
                            'type' => 'number',
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
            'title' => 'Similarity',
            'results' => ['sorensen' => '2*c/(2*c+a+b)', 'jaccard' => 'c/(a+b+c)', 'dissimilarity' => '(1-2*c/(2*c+a+b))*100', 'beta' => '(a+b)/(2*c+a+b)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Sørensen index compares the species lists of two sites: it is twice the number of shared species divided by the total number of species records in both. It returns sørensen similarity, jaccard similarity, sørensen dissimilarity and beta diversity (Sørensen), and the panel shows all of them at once.
        
        It runs from 0 (nothing in common) to 1 (identical communities) and is the standard beta-diversity measure.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Sørensen Similarity Index', 'html' => <<<'TXT'
            <p>Sørensen = 2C ÷ (A + B), where A + C and B + C are the two species totals</p>
            <figure class="calc-figure"><img src="/uploads/biology/sorensen-index.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Sørensen Similarity Index Calculator — Shared and unique species between two sites." title="Sørensen Similarity Index Calculator"><figcaption>Shared and unique species between two sites.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>C</code></td><td>species present at both sites</td><td>species</td></tr><tr><td><code>A</code></td><td>species only at the first site</td><td>species</td></tr><tr><td><code>B</code></td><td>species only at the second site</td><td>species</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Sørensen Similarity Index?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: species only at site a of <strong>12</strong> species, species only at site b of <strong>8</strong> species, species at both sites of <strong>20</strong> species.</p>
            <p>Substituting them into the formula gives sørensen similarity of <strong>0.6667</strong>, jaccard similarity of <strong>0.5</strong>, sørensen dissimilarity of <strong>33.33</strong>%, beta diversity (sørensen) of <strong>0.3333</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 0.25</td><td><strong>Very different</strong></td><td>the sites share few species</td></tr><tr><td>0.25 – 0.6</td><td><strong>Moderate overlap</strong></td><td>some shared core, many local species</td></tr><tr><td>above 0.6</td><td><strong>Similar</strong></td><td>the two communities largely coincide</td></tr></tbody></table>
            <ul><li><p>Sørensen is the same as the Dice coefficient on presence–absence data; Jaccard is always lower because it divides by the union rather than the average.</p></li><li><p>The index ignores abundance: one shared rare species counts as much as a shared dominant.</p></li><li><p>Sørensen dissimilarity, 1 − similarity, plus the species turnover between sites is beta diversity, which measures how much communities change across a landscape.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using total species per site instead of the shared and unique counts.</li><li>Comparing sites sampled with different effort, which inflates the unique lists.</li><li>Reporting Jaccard and calling it Sørensen, which overstates dissimilarity.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Are Sørensen and Dice the same?', 'a' => 'Yes on presence–absence data — the arithmetic is identical.'],
            ['q' => 'Why is Sørensen preferred to Jaccard in ecology?', 'a' => 'It is less sensitive to the total number of species, so it compares samples of different richness more fairly.'],
            ['q' => 'What does the Sørensen Similarity Index actually calculate?', 'a' => <<<'TXT'
            It returns sørensen similarity, jaccard similarity, sørensen dissimilarity and beta diversity (Sørensen). Each one is derived by the formula on this page, so you can check any figure by hand.
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
