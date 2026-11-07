<?php

/**
 * Linkage Disequilibrium Calculator
 * /biology/linkage-disequilibrium
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Linkage Disequilibrium Calculator',
    'meta' => ['title' => 'Linkage Disequilibrium Calculator — Formula & Results', 'description' => 'Linkage Disequilibrium works out D (coefficient of disequilibrium) and D′ (normalised) from Frequency of allele A, Frequency of allele B and Frequency of…', 'h1' => 'Linkage Disequilibrium Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'p_a',
                            'label' => 'Frequency of allele A',
                            'type' => 'number',
                            'help' => 'At the first locus',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.4',
                        ],
                        [
                            'name' => 'p_b',
                            'label' => 'Frequency of allele B',
                            'type' => 'number',
                            'help' => 'At the second locus',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.3',
                        ],
                        [
                            'name' => 'f_ab',
                            'label' => 'Frequency of haplotype AB',
                            'type' => 'number',
                            'help' => 'Observed in the sample',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.25',
                        ],
                        [
                            'name' => 'd',
                            'label' => 'D (coefficient of disequilibrium)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'd_prime',
                            'label' => 'D′ (normalised)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'r2',
                            'label' => 'r²',
                            'type' => 'number',
                            'help' => 'Above 0.8 means a good proxy marker',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'f_ab_expected',
                            'label' => 'Expected AB if independent',
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
            'title' => 'Disequilibrium',
            'results' => ['f_ab_expected' => 'p_a*p_b', 'd' => 'f_ab-p_a*p_b', 'd_prime' => '(f_ab-p_a*p_b)/if_else(f_ab-p_a*p_b>0,min(p_a*(1-p_b),(1-p_a)*p_b),min(p_a*p_b,(1-p_a)*(1-p_b)))', 'r2' => '(f_ab-p_a*p_b)^2/(p_a*(1-p_a)*p_b*(1-p_b))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Linkage Disequilibrium works out D (coefficient of disequilibrium) and D′ (normalised) from Frequency of allele A, Frequency of allele B and Frequency of haplotype AB. Nothing is looked up on this page: D (coefficient of disequilibrium) is computed from Frequency of allele A and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Linkage Disequilibrium calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Linkage Disequilibrium: it takes 3 numbers and reports D (coefficient of disequilibrium), D′ (normalised) and r².</p><p>Written with the labels from the form, Expected AB if independent = Frequency of allele A × Frequency of allele B.</p><p>What comes back is D (coefficient of disequilibrium), D′ (normalised), r² and Expected AB if independent — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Frequency of allele A</strong> — a plain number, no unit. At the first locus</li><li><strong>Frequency of allele B</strong> — a plain number, no unit. At the second locus</li><li><strong>Frequency of haplotype AB</strong> — a plain number, no unit. Observed in the sample</li></ul><p>The answers come back as D (coefficient of disequilibrium), D′ (normalised), r², Expected AB if independent. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Frequency of allele A = 0.4, Frequency of allele B = 0.3 and Frequency of haplotype AB = 0.25 gives &lt;strong&gt;Expected AB if independent&lt;/strong&gt; = 0.12, &lt;strong&gt;D (coefficient of disequilibrium)&lt;/strong&gt; = 0.13, &lt;strong&gt;D′ (normalised)&lt;/strong&gt; = 0.7222 and &lt;strong&gt;r²&lt;/strong&gt; = 0.3353.</p><ul><li><strong>Expected AB if independent</strong> = 0.12</li><li><strong>D (coefficient of disequilibrium)</strong> = 0.13</li><li><strong>D′ (normalised)</strong> = 0.7222</li><li><strong>r²</strong> = 0.3353</li></ul><p>That is <strong>Expected AB if independent</strong> = <code>Frequency of allele A × Frequency of allele B</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Expected AB if independent&lt;/strong&gt; = 0.12, &lt;strong&gt;D (coefficient of disequilibrium)&lt;/strong&gt; = 0.13, &lt;strong&gt;D′ (normalised)&lt;/strong&gt; = 0.7222 and &lt;strong&gt;r²&lt;/strong&gt; = 0.3353. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as D (coefficient of disequilibrium) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Expected AB if independent</strong> = <code>Frequency of allele A × Frequency of allele B</code></li><li><strong>D (coefficient of disequilibrium)</strong> = <code>Frequency of haplotype AB − Frequency of allele A × Frequency of allele B</code></li><li><strong>r²</strong> = <code>(Frequency of haplotype AB − Frequency of allele A × Frequency of allele B) ^ 2 ÷ (Frequency of allele A × (1 − Frequency of allele A) × Frequency of allele B × (1 − Frequency of allele B))</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Expected AB if independent, D (coefficient of disequilibrium) and D′ (normalised) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Frequency of allele A, from 0.4 to 0.8 — and the answers go from &lt;strong&gt;Expected AB if independent&lt;/strong&gt; 0.12, &lt;strong&gt;D (coefficient of disequilibrium)&lt;/strong&gt; 0.13, &lt;strong&gt;D′ (normalised)&lt;/strong&gt; 0.7222 and &lt;strong&gt;r²&lt;/strong&gt; 0.3353 to &lt;strong&gt;Expected AB if independent&lt;/strong&gt; 0.24, &lt;strong&gt;D (coefficient of disequilibrium)&lt;/strong&gt; 0.01, &lt;strong&gt;D′ (normalised)&lt;/strong&gt; 0.1667 and &lt;strong&gt;r²&lt;/strong&gt; 0.003.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> D (coefficient of disequilibrium), D′ (normalised) and r² are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Frequency of allele A and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Frequency of allele A, Frequency of allele B and Frequency of haplotype AB measured, D (coefficient of disequilibrium) and D′ (normalised) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/plants-per-hectare">Plants Per Hectare Calculator</a>, <a href="/biology/plasmid-copy-number">Plasmid Copy Number Calculator</a> and <a href="/biology/plasmid-molar-ratio">Plasmid Molar Ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Linkage Disequilibrium calculator work out?', 'a' => <<<'TXT'
            D (coefficient of disequilibrium), D′ (normalised), r² and Expected AB if independent, from Frequency of allele A and Frequency of allele B. The relationship is Expected AB if independent = Frequency of allele A × Frequency of allele B.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Frequency of allele A, Frequency of allele B, Frequency of haplotype AB. With p_a, p_b and f_ab in place, D (coefficient of disequilibrium) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Expected AB if independent, D (coefficient of disequilibrium), D′ (normalised) and r² can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Expected AB if independent = 0.12, D (coefficient of disequilibrium) = 0.13, D′ (normalised) = 0.7222 and r² = 0.3353. That comes from the page's own defaults, entered in Frequency of allele A; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of D (coefficient of disequilibrium) is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Frequency of allele A left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. D (coefficient of disequilibrium) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/plants-per-hectare', 'name' => 'Plants Per Hectare Calculator'],
            ['path' => '/biology/plasmid-copy-number', 'name' => 'Plasmid Copy Number Calculator'],
            ['path' => '/biology/plasmid-molar-ratio', 'name' => 'Plasmid Molar Ratio Calculator'],
        ],
        'authors' => [],
    ],
];
