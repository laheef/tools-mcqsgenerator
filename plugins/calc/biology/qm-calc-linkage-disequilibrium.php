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
    'meta' => ['title' => 'Linkage Disequilibrium Calculator — Formula & Results', 'description' => 'Linkage disequilibrium measures whether two alleles are inherited together more often than chance. It returns expected AB if independent, D (coefficient of…', 'h1' => 'Linkage Disequilibrium Calculator', 'updated' => '2026-10-29'],
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
        Linkage disequilibrium measures whether two alleles are inherited together more often than chance. It returns expected AB if independent, D (coefficient of disequilibrium), D′ (normalised) and r², and the panel shows all of them at once.
        
        From the frequency of the four haplotypes you get D, the normalised D′ and r² — the number that decides whether a genetic marker can stand in for the causal variant next to it.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Linkage Disequilibrium', 'html' => <<<'TXT'
            <p>D = f(AB) − p_A·p_B. D′ = D ÷ D_max. r² = D² ÷ [p_A(1−p_A)·p_B(1−p_B)]</p>
            <figure class="calc-figure"><img src="/uploads/biology/linkage-disequilibrium.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Linkage Disequilibrium Calculator — r² decays with distance between loci" title="Linkage Disequilibrium Calculator"><figcaption>r² decays with distance between loci</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>D</code></td><td>deviation of the observed haplotype frequency from independence</td><td>—</td></tr><tr><td><code>D′</code></td><td>D scaled to its maximum, −1 to 1</td><td>—</td></tr><tr><td><code>r²</code></td><td>the squared correlation between the two loci</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Linkage Disequilibrium?', 'html' => <<<'TXT'
            <ol><li>Enter the frequency of each allele and the observed frequency of the AB haplotype.</li><li>D, D′ and r² are calculated together with the independent expectation.</li><li>Use r² to judge whether one locus is a usable proxy for the other.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: frequency of allele a of <strong>0.4</strong>, frequency of allele b of <strong>0.3</strong>, frequency of haplotype ab of <strong>0.25</strong>.</p>
            <p>Substituting them into the formula gives expected ab if independent of <strong>0.12</strong>, d (coefficient of disequilibrium) of <strong>0.13</strong>, d′ (normalised) of <strong>0.7222</strong>, r² of <strong>0.3353</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>r² above 0.8</td><td><strong>Strong LD</strong></td><td>one locus predicts the other; a tag SNP will do</td></tr><tr><td>r² 0.3 – 0.8</td><td><strong>Moderate</strong></td><td>some information is shared</td></tr><tr><td>r² below 0.3</td><td><strong>Weak</strong></td><td>the loci behave almost independently</td></tr></tbody></table>
            <ul><li><p>D depends on allele frequencies, so it cannot be compared between studies. D′ and r² are normalised and can.</p></li><li><p>Recombination erodes LD each generation by a factor of (1 − c), so tightly linked loci keep it far longer — that is the basis of association mapping.</p></li><li><p>r² is the statistic for marker selection: an r² of 0.8 means the tag SNP explains 80% of the variance at the causal site.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Entering the haplotype count instead of its frequency.</li><li>Reading D′ as a correlation — it can be 1 with almost no correlation when one allele is rare.</li><li>Ignoring population structure, which creates LD between unlinked loci.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a good r² for a tag SNP?', 'a' => '0.8 or above is the usual threshold for a marker to stand in for the causal variant.'],
            ['q' => 'Can D be negative?', 'a' => 'Yes — that means the two alleles are found together less often than chance predicts.'],
            ['q' => 'Why is D′ high while r² is low?', 'a' => 'When one allele is rare, D′ saturates while r², which accounts for allele frequency, stays low.'],
            ['q' => 'What does the Linkage Disequilibrium actually calculate?', 'a' => <<<'TXT'
            It returns expected AB if independent, D (coefficient of disequilibrium), D′ (normalised) and r². Each one is derived by the formula on this page, so you can check any figure by hand.
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
