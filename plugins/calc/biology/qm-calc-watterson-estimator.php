<?php

/**
 * Watterson Estimator Calculator
 * /biology/watterson-estimator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Watterson Estimator Calculator',
    'meta' => ['title' => 'Watterson Estimator Calculator — Formula & Results', 'description' => 'Enter Segregating sites, Sequence length and Number of sequences into Watterson Estimator and the answer comes back as Watterson θ (per locus) and θ per site.', 'h1' => 'Watterson Estimator Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'sites',
                            'label' => 'Segregating sites',
                            'type' => 'number',
                            'help' => 'Columns that vary',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '24',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Sequence length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'n',
                            'label' => 'Number of sequences',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'theta_w',
                            'label' => 'Watterson θ (per locus)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'theta_per_site',
                            'label' => 'θ per site',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'theta_per_kb',
                            'label' => 'Watterson θ per kb',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'a1',
                            'label' => 'Harmonic number a₁ (n − 1)',
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
            'title' => 'Diversity',
            'results' => ['a1' => 'log(max(n,2)-1)+0.5772156649+1/(2*(max(n,2)-1))-1/(12*(max(n,2)-1)*(max(n,2)-1))', 'theta_w' => 'sites/(log(max(n,2)-1)+0.5772156649+1/(2*(max(n,2)-1))-1/(12*(max(n,2)-1)*(max(n,2)-1)))', 'theta_per_site' => 'sites/(log(max(n,2)-1)+0.5772156649+1/(2*(max(n,2)-1))-1/(12*(max(n,2)-1)*(max(n,2)-1)))/length', 'theta_per_kb' => 'sites/(log(max(n,2)-1)+0.5772156649+1/(2*(max(n,2)-1))-1/(12*(max(n,2)-1)*(max(n,2)-1)))/length*1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Segregating sites, Sequence length and Number of sequences into Watterson Estimator and the answer comes back as Watterson θ (per locus) and θ per site. Nothing is looked up on this page: Watterson θ (per locus) is computed from Segregating sites and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Watterson Estimator calculator works', 'html' => <<<'TXT'
            <p>Watterson Estimator answers one question from 3 numbers, and the answer is Watterson θ (per locus), θ per site and Watterson θ per kb.</p><p>Written with the labels from the form, Harmonic number a₁ (n − 1) = ln(max(Number of sequences,2) − 1) + 0.5772156649 + 1 ÷ (2 × (max(Number of sequences,2) − 1)) − 1 ÷ (12 × (max(Number of sequences,2) − 1) × (max(Number of sequences,2) − 1)).</p><p>The answers are Watterson θ (per locus), θ per site, Watterson θ per kb and Harmonic number a₁ (n − 1); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Segregating sites</strong> — a plain number, no unit. Columns that vary</li><li><strong>Sequence length</strong> — in bp</li><li><strong>Number of sequences</strong> — a plain number, no unit</li></ul><p>The answers come back as Watterson θ (per locus), θ per site, Watterson θ per kb, Harmonic number a₁ (n − 1). </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Segregating sites = 24, Sequence length = 1000 bp and Number of sequences = 20; the answers are &lt;strong&gt;Harmonic number a₁ (n − 1)&lt;/strong&gt; = 3.55, &lt;strong&gt;Watterson θ (per locus)&lt;/strong&gt; = 6.76, &lt;strong&gt;θ per site&lt;/strong&gt; = 0.0068 and &lt;strong&gt;Watterson θ per kb&lt;/strong&gt; = 6.76.</p><ul><li><strong>Harmonic number a₁ (n − 1)</strong> = 3.55</li><li><strong>Watterson θ (per locus)</strong> = 6.76</li><li><strong>θ per site</strong> = 0.0068</li><li><strong>Watterson θ per kb</strong> = 6.76</li></ul><p>The line behind those figures is <strong>Harmonic number a₁ (n − 1)</strong> = <code>ln(max(Number of sequences,2) − 1) + 0.5772156649 + 1 ÷ (2 × (max(Number of sequences,2) − 1)) − 1 ÷ (12 × (max(Number of sequences,2) − 1) × (max(Number of sequences,2) − 1))</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Harmonic number a₁ (n − 1)&lt;/strong&gt; = 3.55, &lt;strong&gt;Watterson θ (per locus)&lt;/strong&gt; = 6.76, &lt;strong&gt;θ per site&lt;/strong&gt; = 0.0068 and &lt;strong&gt;Watterson θ per kb&lt;/strong&gt; = 6.76. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Watterson θ (per locus) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Harmonic number a₁ (n − 1)</strong> = <code>ln(max(Number of sequences,2) − 1) + 0.5772156649 + 1 ÷ (2 × (max(Number of sequences,2) − 1)) − 1 ÷ (12 × (max(Number of sequences,2) − 1) × (max(Number of sequences,2) − 1))</code></li><li><strong>Watterson θ (per locus)</strong> = <code>Segregating sites ÷ (ln(max(Number of sequences,2) − 1) + 0.5772156649 + 1 ÷ (2 × (max(Number of sequences,2) − 1)) − 1 ÷ (12 × (max(Number of sequences,2) − 1) × (max(Number of sequences,2) − 1)))</code></li><li><strong>θ per site</strong> = <code>Segregating sites ÷ (ln(max(Number of sequences,2) − 1) + 0.5772156649 + 1 ÷ (2 × (max(Number of sequences,2) − 1)) − 1 ÷ (12 × (max(Number of sequences,2) − 1) × (max(Number of sequences,2) − 1))) ÷ Sequence length</code></li><li><strong>Watterson θ per kb</strong> = <code>Segregating sites ÷ (ln(max(Number of sequences,2) − 1) + 0.5772156649 + 1 ÷ (2 × (max(Number of sequences,2) − 1)) − 1 ÷ (12 × (max(Number of sequences,2) − 1) × (max(Number of sequences,2) − 1))) ÷ Sequence length × 1000</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Harmonic number a₁ (n − 1), Watterson θ (per locus) and θ per site can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Segregating sites, from 24 to 48 — and the answers go from &lt;strong&gt;Harmonic number a₁ (n − 1)&lt;/strong&gt; 3.55, &lt;strong&gt;Watterson θ (per locus)&lt;/strong&gt; 6.76, &lt;strong&gt;θ per site&lt;/strong&gt; 0.0068 and &lt;strong&gt;Watterson θ per kb&lt;/strong&gt; 6.76 to &lt;strong&gt;Harmonic number a₁ (n − 1)&lt;/strong&gt; 3.55, &lt;strong&gt;Watterson θ (per locus)&lt;/strong&gt; 13.53, &lt;strong&gt;θ per site&lt;/strong&gt; 0.0135 and &lt;strong&gt;Watterson θ per kb&lt;/strong&gt; 13.53.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Watterson θ (per locus), θ per site and Watterson θ per kb are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Segregating sites and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Segregating sites, Sequence length and Number of sequences measured, Watterson θ (per locus) and θ per site wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/cell-dilution">Cell dilution Calculator</a>, <a href="/biology/cell-doubling-time">Cell doubling time Calculator</a> and <a href="/biology/cell-seeding-density">Cell Seeding Density Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Watterson Estimator calculator work out?', 'a' => <<<'TXT'
            Watterson θ (per locus), θ per site, Watterson θ per kb and Harmonic number a₁ (n − 1), from Number of sequences. The relationship is Harmonic number a₁ (n − 1) = ln(max(Number of sequences,2) − 1) + 0.5772156649 + 1 ÷ (2 × (max(Number of sequences,2) − 1)) − 1 ÷ (12 × (max(Number of sequences,2) − 1) × (max(Number of sequences,2) − 1)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Segregating sites, Sequence length (bp), Number of sequences. Fill sites, length and n and leave Watterson θ (per locus) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Harmonic number a₁ (n − 1), Watterson θ (per locus), θ per site and Watterson θ per kb can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Harmonic number a₁ (n − 1) = 3.55, Watterson θ (per locus) = 6.76, θ per site = 0.0068 and Watterson θ per kb = 6.76. That comes from the page's own defaults, entered in Segregating sites; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Watterson θ (per locus) is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Segregating sites left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Watterson θ (per locus) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cell-dilution', 'name' => 'Cell dilution Calculator'],
            ['path' => '/biology/cell-doubling-time', 'name' => 'Cell doubling time Calculator'],
            ['path' => '/biology/cell-seeding-density', 'name' => 'Cell Seeding Density Calculator'],
        ],
        'authors' => [],
    ],
];
