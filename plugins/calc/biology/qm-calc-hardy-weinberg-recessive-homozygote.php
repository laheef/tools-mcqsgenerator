<?php

/**
 * Hardy–Weinberg from the Recessive Homozygote Frequency
 * /biology/hardy-weinberg-recessive-homozygote
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hardy–Weinberg from the Recessive Homozygote Frequency',
    'meta' => ['title' => 'Hardy–Weinberg from the Recessive Homozygote', 'description' => <<<'TXT'
    The recessive phenotype frequency is q², so the allele frequency is its square root. It returns recessive allele frequency (q), dominant allele frequency (p)…
    TXT, 'h1' => 'Hardy–Weinberg from the Recessive Homozygote Frequency', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'affected',
                            'label' => 'Frequency of the recessive phenotype',
                            'type' => 'number',
                            'help' => 'q², as a decimal',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.04',
                        ],
                        [
                            'name' => 'q',
                            'label' => 'Recessive allele frequency (q)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p',
                            'label' => 'Dominant allele frequency (p)',
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
                            'name' => 'homo_dom',
                            'label' => 'Homozygous dominant frequency',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'carriers_per_case',
                            'label' => 'Carriers per affected individual',
                            'type' => 'number',
                            'suffix' => ':1',
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
            'results' => [
                'q' => 'sqrt(affected)',
                'p' => '1-sqrt(affected)',
                'hetero' => '2*(1-sqrt(affected))*sqrt(affected)',
                'homo_dom' => '(1-sqrt(affected))*(1-sqrt(affected))',
                'carriers_per_case' => '2*(1-sqrt(affected))*sqrt(affected)/affected',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The recessive phenotype frequency is q², so the allele frequency is its square root. It returns recessive allele frequency (q), dominant allele frequency (p), heterozygote frequency and homozygous dominant frequency, and the panel shows all of them at once.
        
        This calculator carries it through to every genotype frequency and the carrier rate.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Hardy–Weinberg from the Recessive Homozygote Frequency', 'html' => <<<'TXT'
            <p>q = √(q²); p = 1 − q; Aa = 2pq</p>
            <figure class="calc-figure"><img src="/uploads/biology/hardy-weinberg-recessive-homozygote.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Hardy–Weinberg from the Recessive Homozygote Frequency — From the visible phenotype back to the allele frequency." title="Hardy–Weinberg from the Recessive Homozygote Frequency"><figcaption>From the visible phenotype back to the allele frequency.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>q²</code></td><td>frequency of the recessive phenotype</td><td>0–1</td></tr><tr><td><code>q</code></td><td>recessive allele frequency</td><td>0–1</td></tr><tr><td><code>2pq</code></td><td>carrier frequency</td><td>0–1</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Hardy–Weinberg from the Recessive Homozygote Frequency?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: frequency of the recessive phenotype of <strong>0.04</strong>.</p>
            <p>Substituting them into the formula gives recessive allele frequency (q) of <strong>0.2</strong>, dominant allele frequency (p) of <strong>0.8</strong>, heterozygote frequency of <strong>0.32</strong>, homozygous dominant frequency of <strong>0.64</strong>, carriers per affected individual of <strong>8</strong>:1.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>This square root is only valid when the recessive phenotype is fully penetrant and every affected individual really is a homozygote.</p></li><li><p>At low frequencies the square root is numerically sensitive: 0.0001 and 0.0004 give q of 0.01 and 0.02, a doubling, so record the observed frequency with care.</p></li><li><p>For a dominant trait the same arithmetic cannot recover the allele frequency from phenotypes, because homozygotes and heterozygotes look identical.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Taking the square root of a percentage (0.4%) instead of a proportion (0.004).</li><li>Assuming the trait is at equilibrium when it is under strong selection.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why is the allele frequency the square root of the affected frequency?', 'a' => 'Because an affected individual must inherit a recessive allele from both parents, and the two draws are independent: q × q = q².'],
            ['q' => 'What if 4% of a population is affected?', 'a' => 'q = 0.2, p = 0.8, and 32% of the population are carriers.'],
            ['q' => 'What does the Hardy–Weinberg from the Recessive Homozygote Frequency actually calculate?', 'a' => <<<'TXT'
            It returns recessive allele frequency (q), dominant allele frequency (p), heterozygote frequency and homozygous dominant frequency. Each one is derived by the formula on this page, so you can check any figure by hand.
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
