<?php

/**
 * Hardy–Weinberg from the Recessive Allele Frequency
 * /biology/hardy-weinberg-recessive-allele
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hardy–Weinberg from the Recessive Allele Frequency',
    'meta' => ['title' => 'Hardy–Weinberg from the Recessive Allele Frequency', 'description' => 'If you already know q, the recessive allele\'s frequency, the rest follows directly: p is 1 − q, and the genotype frequencies are p², 2pq and q².', 'h1' => 'Hardy–Weinberg from the Recessive Allele Frequency', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'q',
                            'label' => 'Recessive allele frequency (q)',
                            'type' => 'number',
                            'help' => 'Between 0 and 1',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.2',
                        ],
                        [
                            'name' => 'p',
                            'label' => 'Dominant allele frequency (p)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'aa',
                            'label' => 'AA frequency',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ab',
                            'label' => 'Aa frequency (carriers)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bb',
                            'label' => 'aa frequency (affected)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'carrier_ratio',
                            'label' => 'Carriers per affected individual',
                            'type' => 'number',
                            'suffix' => ':1',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pct',
                            'label' => 'Affected share of the population',
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
                'p' => '1-q',
                'aa' => '(1-q)*(1-q)',
                'ab' => '2*(1-q)*q',
                'bb' => 'q*q',
                'carrier_ratio' => '2*(1-q)*q/(q*q)',
                'pct' => 'q*q*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        If you already know q, the recessive allele's frequency, the rest follows directly: p is 1 − q, and the genotype frequencies are p², 2pq and q². It returns dominant allele frequency (p), AA frequency, aa frequency (carriers) and aa frequency (affected), and the panel shows all of them at once.
        
        This calculator spells out the three genotypes, the carrier rate and the ratio of carriers to affected individuals.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Hardy–Weinberg from the Recessive Allele Frequency', 'html' => <<<'TXT'
            <p>p = 1 − q; AA = p²; Aa = 2pq; aa = q²</p>
            <figure class="calc-figure"><img src="/uploads/biology/hardy-weinberg-recessive-allele.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Hardy–Weinberg from the Recessive Allele Frequency — Carrier frequency peaks at q = 0.5 and stays high as q falls." title="Hardy–Weinberg from the Recessive Allele Frequency"><figcaption>Carrier frequency peaks at q = 0.5 and stays high as q falls.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>q</code></td><td>recessive allele frequency</td><td>0–1</td></tr><tr><td><code>p</code></td><td>dominant allele frequency</td><td>0–1</td></tr><tr><td><code>2pq</code></td><td>heterozygote frequency</td><td>0–1</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Hardy–Weinberg from the Recessive Allele Frequency?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: recessive allele frequency (q) of <strong>0.2</strong>.</p>
            <p>Substituting them into the formula gives dominant allele frequency (p) of <strong>0.8</strong>, aa frequency of <strong>0.64</strong>, aa frequency (carriers) of <strong>0.32</strong>, aa frequency (affected) of <strong>0.04</strong>, carriers per affected individual of <strong>8</strong>:1, affected share of the population of <strong>4</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>The ratio of carriers to affected people is 2p/q, which shows how sharply carriers outnumber patients as q falls.</p></li><li><p>These are expected frequencies for a large randomly mating population, not counts for a particular family.</p></li><li><p>For a sex-linked trait the arithmetic differs: males carry one X, so their frequency of the recessive phenotype equals q rather than q².</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using q² for an X-linked recessive trait in males.</li><li>Rounding p and q so that they no longer sum to exactly 1 before squaring.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Is the carrier frequency 2pq or q?', 'a' => '2pq — the heterozygote frequency. q alone is the allele frequency.'],
            ['q' => 'What if q is 0.5?', 'a' => 'Then p is 0.5 too and the three genotype frequencies are 0.25, 0.5 and 0.25.'],
            ['q' => 'What does the Hardy–Weinberg from the Recessive Allele Frequency actually calculate?', 'a' => <<<'TXT'
            It returns dominant allele frequency (p), AA frequency, aa frequency (carriers) and aa frequency (affected). Each one is derived by the formula on this page, so you can check any figure by hand.
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
