<?php

/**
 * Hardy–Weinberg from the Dominant Homozygote Frequency
 * /biology/hardy-weinberg-dominant-homozygote
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hardy–Weinberg from the Dominant Homozygote Frequency',
    'meta' => ['title' => 'Hardy–Weinberg from the Dominant Homozygote Frequency', 'description' => <<<'TXT'
    Homozygous dominant frequency is p². It returns dominant allele frequency (p), recessive allele frequency (q), heterozygote frequency and recessive homozygote…
    TXT, 'h1' => 'Hardy–Weinberg from the Dominant Homozygote Frequency', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'homo_dom',
                            'label' => 'Homozygous dominant frequency (p²)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.49',
                        ],
                        [
                            'name' => 'p',
                            'label' => 'Dominant allele frequency (p)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'q',
                            'label' => 'Recessive allele frequency (q)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hetero',
                            'label' => 'Heterozygote frequency',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'affected',
                            'label' => 'Recessive homozygote frequency',
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
            'title' => 'Alleles',
            'results' => ['p' => 'sqrt(homo_dom)', 'q' => '1-sqrt(homo_dom)', 'hetero' => '2*sqrt(homo_dom)*(1-sqrt(homo_dom))', 'affected' => '(1-sqrt(homo_dom))*(1-sqrt(homo_dom))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Homozygous dominant frequency is p². It returns dominant allele frequency (p), recessive allele frequency (q), heterozygote frequency and recessive homozygote frequency, and the panel shows all of them at once.
        
        Unless you have genotype-level data — sequencing, a codominant marker, a biochemical test — you cannot see this class, so it is usually used the other way round: to predict how many homozygotes a population should contain.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Hardy–Weinberg from the Dominant Homozygote Frequency', 'html' => <<<'TXT'
            <p>p = √(p²); q = 1 − p; 2pq = 2p(1 − p)</p>
            <figure class="calc-figure"><img src="/uploads/biology/hardy-weinberg-dominant-homozygote.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Hardy–Weinberg from the Dominant Homozygote Frequency — p² back to p, then q, then the heterozygotes." title="Hardy–Weinberg from the Dominant Homozygote Frequency"><figcaption>p² back to p, then q, then the heterozygotes.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>p²</code></td><td>homozygous dominant frequency</td><td>0–1</td></tr><tr><td><code>p</code></td><td>dominant allele frequency</td><td>0–1</td></tr><tr><td><code>q</code></td><td>recessive allele frequency</td><td>0–1</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Hardy–Weinberg from the Dominant Homozygote Frequency?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: homozygous dominant frequency (p²) of <strong>0.49</strong>.</p>
            <p>Substituting them into the formula gives dominant allele frequency (p) of <strong>0.7</strong>, recessive allele frequency (q) of <strong>0.3</strong>, heterozygote frequency of <strong>0.42</strong>, recessive homozygote frequency of <strong>0.09</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>This direction needs genotype data, not phenotypes: a dominant phenotype pools AA and Aa and hides the split.</p></li><li><p>Codominant markers such as microsatellites or SNP arrays give p² directly, which is why population studies use them.</p></li><li><p>The square root is exact only at equilibrium; selection and drift both distort it.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Using the dominant phenotype frequency as if it were p².</li><li>Forgetting that the three genotype frequencies must sum to 1.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/hardy-weinberg-equilibrium">Hardy–Weinberg equilibrium</a>. <a href="/biology/hardy-weinberg-recessive-homozygote">Hardy–Weinberg from q²</a>. <a href="/biology/allele-frequency">Allele frequency</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is p if 49% of a population is AA?', 'a' => 'p = 0.7, so q = 0.3 and 42% should be heterozygotes.'],
            ['q' => 'Can I get p from a dominant phenotype?', 'a' => 'Not without extra information — that is why recessive traits are the classical tool for estimating allele frequencies.'],
            ['q' => 'What does the Hardy–Weinberg from the Dominant Homozygote Frequency actually calculate?', 'a' => <<<'TXT'
            It returns dominant allele frequency (p), recessive allele frequency (q), heterozygote frequency and recessive homozygote frequency. Each one is derived by the formula on this page, so you can check any figure by hand.
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
