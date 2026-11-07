<?php

/**
 * Fixation Index Calculator (Fst)
 * /biology/fixation-index-fst
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fixation Index Calculator (Fst)',
    'meta' => ['title' => 'Fixation Index (Fst) Calculator — Formula & Results', 'description' => 'Fst measures how much of the genetic variation in a set of populations is explained by the differences between them, on a scale from zero (panmixia) to one…', 'h1' => 'Fixation Index Calculator (Fst)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'p1',
                            'label' => 'Allele frequency in population 1',
                            'type' => 'number',
                            'help' => '0–1',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.2',
                        ],
                        [
                            'name' => 'p2',
                            'label' => 'Allele frequency in population 2',
                            'type' => 'number',
                            'help' => '0–1',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.7',
                        ],
                        [
                            'name' => 'n1',
                            'label' => 'Sample size, population 1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'n2',
                            'label' => 'Sample size, population 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'p_bar',
                            'label' => 'Mean allele frequency',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hs',
                            'label' => 'Expected heterozygosity within populations',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ht',
                            'label' => 'Expected heterozygosity overall',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fst',
                            'label' => 'Fst',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'migrants',
                            'label' => 'Migrants per generation implied by Fst',
                            'type' => 'number',
                            'suffix' => 'per gen',
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
            'title' => 'Divergence',
            'results' => [
                'p_bar' => '(p1*n1+p2*n2)/(n1+n2)',
                'hs' => '(2*p1*(1-p1)+2*p2*(1-p2))/2',
                'ht' => '2*((p1*n1+p2*n2)/(n1+n2))*(1-(p1*n1+p2*n2)/(n1+n2))',
                'fst' => '(2*((p1*n1+p2*n2)/(n1+n2))*(1-(p1*n1+p2*n2)/(n1+n2))-(2*p1*(1-p1)+2*p2*(1-p2))/2)/max(0.000001,2*((p1*n1+p2*n2)/(n1+n2))*(1-(p1*n1+p2*n2)/(n1+n2)))',
                'migrants' => <<<'TXT'
                (1/max(0.000001,((2*((p1*n1+p2*n2)/(n1+n2))*(1-(p1*n1+p2*n2)/(n1+n2))-(2*p1*(1-p1)+2*p2*(1-p2))/2)/max(0.000001,2*((p1*n1+p2*n2)/(n1+n2))*(1-(p1*n1+p2*n2)/(n1+n2)))))-1)/4
                TXT,
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Fst measures how much of the genetic variation in a set of populations is explained by the differences between them, on a scale from zero (panmixia) to one (complete fixation). It returns mean allele frequency, expected heterozygosity within populations, expected heterozygosity overall and fst, and the panel shows all of them at once.
        
        This calculator takes allele frequencies from two or more populations and returns Fst, heterozygosity and the migration rate it implies.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Fixation Index (Fst)', 'html' => <<<'TXT'
            <p>Fst = (H_T − H_S) ÷ H_T; H_T = 2p̄(1 − p̄); H_S = mean of 2pᵢ(1 − pᵢ); Fst ≈ 1/(4Nm + 1)</p>
            <figure class="calc-figure"><img src="/uploads/biology/fixation-index-fst.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Fixation Index Calculator (Fst) — From freely mixing to completely fixed." title="Fixation Index Calculator (Fst)"><figcaption>From freely mixing to completely fixed.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>p̄</code></td><td>mean allele frequency across populations</td><td>0–1</td></tr><tr><td><code>H_T</code></td><td>heterozygosity expected with random mating overall</td><td>—</td></tr><tr><td><code>H_S</code></td><td>mean heterozygosity within populations</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Fixation Index (Fst)?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: allele frequency in population 1 of <strong>0.2</strong>, allele frequency in population 2 of <strong>0.7</strong>, sample size, population 1 of <strong>50</strong>, sample size, population 2 of <strong>50</strong>.</p>
            <p>Substituting them into the formula gives mean allele frequency of <strong>0.45</strong>, expected heterozygosity within populations of <strong>0.37</strong>, expected heterozygosity overall of <strong>0.495</strong>, fst of <strong>0.2525</strong>, migrants per generation implied by fst of <strong>0.74</strong> per gen.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0 – 0.05</td><td><strong>Little differentiation</strong></td><td>one interbreeding population</td></tr><tr><td>0.05 – 0.15</td><td><strong>Moderate</strong></td><td>substructure, some restricted gene flow</td></tr><tr><td>0.15 – 0.25</td><td><strong>Great</strong></td><td>distinct subpopulations</td></tr><tr><td>above 0.25</td><td><strong>Very great</strong></td><td>near-separate species-level units</td></tr></tbody></table>
            <ul><li><p>These bands are Wright's rules of thumb, and they were calibrated on protein polymorphisms. Genome-wide Fst values from SNP data are usually an order of magnitude smaller for the same biology.</p></li><li><p>Fst depends on the marker: microsatellites show more differentiation than SNPs at the same level of gene flow.</p></li><li><p>The migration estimate assumes an island model at equilibrium. A recent split looks the same as low migration, and no allele-frequency calculation can tell them apart.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Comparing Fst computed from different marker types.</li><li>Ignoring sample size, which biases Fst upward in small samples.</li><li>Reading Fst as a proportion of individuals that are migrants rather than a proportion of variation.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What Fst value indicates separate populations?', 'a' => 'Above 0.15 is conventionally \'great differentiation\', but the number only means something against the marker and the species\' baseline.'],
            ['q' => 'Can Fst be negative?', 'a' => 'Slightly, from sampling noise in small samples; the true value is bounded at zero.'],
            ['q' => 'What does the Fixation Index (Fst) actually calculate?', 'a' => <<<'TXT'
            It returns mean allele frequency, expected heterozygosity within populations, expected heterozygosity overall and fst. Each one is derived by the formula on this page, so you can check any figure by hand.
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
