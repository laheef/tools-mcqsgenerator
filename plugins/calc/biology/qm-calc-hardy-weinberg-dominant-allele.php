<?php

/**
 * Hardy–Weinberg from the Dominant Allele Frequency
 * /biology/hardy-weinberg-dominant-allele
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hardy–Weinberg from the Dominant Allele Frequency',
    'meta' => ['title' => 'Hardy–Weinberg from the Dominant Allele Frequency', 'description' => 'Given p, the dominant allele\'s frequency, every genotype frequency follows from p + q = 1. It returns recessive allele frequency (q), AA individuals expected…', 'h1' => 'Hardy–Weinberg from the Dominant Allele Frequency', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'p',
                            'label' => 'Dominant allele frequency (p)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.8',
                        ],
                        [
                            'name' => 'n',
                            'label' => 'Sample size',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'q',
                            'label' => 'Recessive allele frequency (q)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'aa',
                            'label' => 'AA individuals expected',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ab',
                            'label' => 'Aa individuals expected',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bb',
                            'label' => 'aa individuals expected',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'carrier_pct',
                            'label' => 'Carriers',
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
            'title' => 'Genotypes',
            'results' => [
                'q' => '1-p',
                'aa' => 'p*p*n',
                'ab' => '2*p*(1-p)*n',
                'bb' => '(1-p)*(1-p)*n',
                'carrier_pct' => '2*p*(1-p)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Given p, the dominant allele's frequency, every genotype frequency follows from p + q = 1. It returns recessive allele frequency (q), AA individuals expected, aa individuals expected and aa individuals expected, and the panel shows all of them at once.
        
        This calculator is the fastest route from an allele count to the expected genotype table, and it also reports how many individuals of each class a sample of a given size should contain.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Hardy–Weinberg from the Dominant Allele Frequency', 'html' => <<<'TXT'
            <p>q = 1 − p; AA = p²n; Aa = 2pqn; aa = q²n</p>
            <figure class="calc-figure"><img src="/uploads/biology/hardy-weinberg-dominant-allele.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Hardy–Weinberg from the Dominant Allele Frequency — Expected counts of the three genotypes in the sample." title="Hardy–Weinberg from the Dominant Allele Frequency"><figcaption>Expected counts of the three genotypes in the sample.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>p</code></td><td>dominant allele frequency</td><td>0–1</td></tr><tr><td><code>n</code></td><td>number of individuals sampled</td><td>individuals</td></tr><tr><td><code>2pqn</code></td><td>expected heterozygote count</td><td>individuals</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Hardy–Weinberg from the Dominant Allele Frequency?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: dominant allele frequency (p) of <strong>0.8</strong>, sample size of <strong>500</strong> individuals.</p>
            <p>Substituting them into the formula gives recessive allele frequency (q) of <strong>0.2</strong>, aa individuals expected of <strong>320</strong> individuals, aa individuals expected of <strong>160</strong> individuals, aa individuals expected of <strong>20</strong> individuals, carriers of <strong>32</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Expected counts are rarely whole numbers; do not round them before a chi-square test, because the rounding error accumulates.</p></li><li><p>With small samples, drift alone can move genotype frequencies a long way from p², 2pq, q², so the test has little power.</p></li><li><p>Allele frequencies estimated from a sample carry their own uncertainty, roughly √(p(1−p)/2n) per allele.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Multiplying by a percentage sample size instead of a count.</li><li>Treating the expected heterozygote count as a prediction for one family rather than for a population.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I count alleles in a sample of n individuals?', 'a' => 'There are 2n alleles at an autosomal locus, so p is the number of dominant alleles divided by 2n.'],
            ['q' => 'Why is 2pq multiplied by n?', 'a' => 'Because 2pq is a frequency; multiplying by the number of individuals turns it into an expected count.'],
            ['q' => 'What does the Hardy–Weinberg from the Dominant Allele Frequency actually calculate?', 'a' => <<<'TXT'
            It returns recessive allele frequency (q), AA individuals expected, aa individuals expected and aa individuals expected. Each one is derived by the formula on this page, so you can check any figure by hand.
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
