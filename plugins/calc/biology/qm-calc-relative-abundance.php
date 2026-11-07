<?php

/**
 * Relative Abundance Calculator
 * /biology/relative-abundance
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Relative Abundance Calculator',
    'meta' => ['title' => 'Relative Abundance Calculator — Formula & Results', 'description' => <<<'TXT'
    Relative abundance turns raw counts into the share of the community each species represents — the input every diversity index, ordination and community table…
    TXT, 'h1' => 'Relative Abundance Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Species 1',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'n2',
                            'label' => 'Species 2',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'n3',
                            'label' => 'Species 3',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'n4',
                            'label' => 'Species 4',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'n5',
                            'label' => 'Species 5',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'p1',
                            'label' => 'Species 1 relative abundance',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p2',
                            'label' => 'Species 2 relative abundance',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'n',
                            'label' => 'Community size',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'top3',
                            'label' => 'Top three species combined',
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
            'title' => 'Abundance',
            'results' => ['n' => 'n1+n2+n3+n4+n5', 'p1' => 'n1/(n1+n2+n3+n4+n5)*100', 'p2' => 'n2/(n1+n2+n3+n4+n5)*100', 'top3' => '(n1+n2+n3)/(n1+n2+n3+n4+n5)*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Relative abundance turns raw counts into the share of the community each species represents — the input every diversity index, ordination and community table starts from. It returns community size, species 1 relative abundance, species 2 relative abundance and top three species combined, and the panel shows all of them at once.
        
        This calculator gives percentages, proportions and the cumulative total.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Relative Abundance', 'html' => <<<'TXT'
            <p>pᵢ = nᵢ ÷ N × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/relative-abundance.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Relative Abundance Calculator — Counts and the share of the community each species holds." title="Relative Abundance Calculator"><figcaption>Counts and the share of the community each species holds.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>nᵢ</code></td><td>individuals of species i</td><td>individuals</td></tr><tr><td><code>N</code></td><td>total individuals</td><td>individuals</td></tr><tr><td><code>pᵢ</code></td><td>relative abundance</td><td>%</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Relative Abundance?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: species 1 of <strong>40</strong> individuals, species 2 of <strong>25</strong> individuals, species 3 of <strong>15</strong> individuals, species 4 of <strong>10</strong> individuals, species 5 of <strong>6</strong> individuals.</p>
            <p>Substituting them into the formula gives community size of <strong>96</strong> individuals, species 1 relative abundance of <strong>41.67</strong>%, species 2 relative abundance of <strong>26.04</strong>%, top three species combined of <strong>83.33</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Relative abundance makes samples of different size comparable, which absolute counts do not.</p></li><li><p>Percentages hide effort: 100% of a sample of three individuals is not the same statement as 100% of a sample of 3 000.</p></li><li><p>In sequencing data relative abundance is read out of the number of reads per taxon and is usually reported after rarefying to a common depth.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using relative abundance as if it were an absolute density.</li><li>Summing percentages from different samples.</li><li>Comparing relative abundances between studies that rarefied to different depths.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I calculate relative abundance as a proportion?', 'a' => 'Divide the count by the total without multiplying by 100 — 0.4 rather than 40%.'],
            ['q' => 'Should the percentages add to 100?', 'a' => 'They do, up to rounding; the calculator works from full precision so the small residual is only display.'],
            ['q' => 'What does the Relative Abundance actually calculate?', 'a' => <<<'TXT'
            It returns community size, species 1 relative abundance, species 2 relative abundance and top three species combined. Each one is derived by the formula on this page, so you can check any figure by hand.
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
