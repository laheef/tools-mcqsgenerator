<?php

/**
 * Hardy–Weinberg from the Heterozygote Frequency
 * /biology/hardy-weinberg-heterozygote
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hardy–Weinberg from the Heterozygote Frequency',
    'meta' => ['title' => 'Hardy–Weinberg from the Heterozygote Frequency', 'description' => 'Heterozygote frequency 2pq is a quadratic in q, so it has two solutions — a fact that bites anyone converting a carrier rate back into an allele frequency.', 'h1' => 'Hardy–Weinberg from the Heterozygote Frequency', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'hetero',
                            'label' => 'Heterozygote frequency (2pq)',
                            'type' => 'number',
                            'help' => 'Between 0 and 0.5',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.42',
                        ],
                        [
                            'name' => 'q_low',
                            'label' => 'q (lower root)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'q_high',
                            'label' => 'q (upper root)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p_low',
                            'label' => 'p for the lower root',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'homo_low',
                            'label' => 'Homozygote frequency, lower root',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'max_note',
                            'label' => 'Maximum possible 2pq',
                            'type' => 'number',
                            'help' => '0.5',
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
            'title' => 'Roots',
            'results' => [
                'q_low' => '(1-sqrt(1-2*hetero))/2',
                'q_high' => '(1+sqrt(1-2*hetero))/2',
                'p_low' => '1-(1-sqrt(1-2*hetero))/2',
                'homo_low' => 'pow(1-(1-sqrt(1-2*hetero))/2,2)+pow((1-sqrt(1-2*hetero))/2,2)',
                'max_note' => '0.5',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Heterozygote frequency 2pq is a quadratic in q, so it has two solutions — a fact that bites anyone converting a carrier rate back into an allele frequency. It returns q (lower root), q (upper root), p for the lower root and homozygote frequency, lower root, and the panel shows all of them at once.
        
        This calculator solves both branches and reports which one applies to your population.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Hardy–Weinberg from the Heterozygote Frequency', 'html' => <<<'TXT'
            <p>2q² − 2q + h = 0, so q = [1 ± √(1 − 2h)] ÷ 2</p>
            <figure class="calc-figure"><img src="/uploads/biology/hardy-weinberg-heterozygote.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Hardy–Weinberg from the Heterozygote Frequency — 2pq peaks at 0.5 and gives two allele frequencies for every value below it." title="Hardy–Weinberg from the Heterozygote Frequency"><figcaption>2pq peaks at 0.5 and gives two allele frequencies for every value below it.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>h</code></td><td>observed heterozygote frequency</td><td>0–0.5</td></tr><tr><td><code>q</code></td><td>recessive allele frequency</td><td>0–1</td></tr><tr><td><code>1 − 2h</code></td><td>the discriminant; negative means no solution</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Hardy–Weinberg from the Heterozygote Frequency?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: heterozygote frequency (2pq) of <strong>0.42</strong>.</p>
            <p>Substituting them into the formula gives q (lower root) of <strong>0.3</strong>, q (upper root) of <strong>0.7</strong>, p for the lower root of <strong>0.7</strong>, homozygote frequency, lower root of <strong>0.58</strong>, maximum possible 2pq of <strong>0.5</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>2pq never exceeds 0.5, so a reported heterozygote frequency above 50% cannot come from a two-allele locus at equilibrium — check the data before trusting the roots.</p></li><li><p>The two roots are mirror images: q and 1 − q give the same heterozygote frequency, so the data alone cannot tell you which allele is common.</p></li><li><p>Real populations often have fewer heterozygotes than 2pq predicts (a Wahlund effect from population structure), which is one reason the observed value may be the more useful input.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Entering 42 for 42% instead of 0.42.</li><li>Taking the lower root without checking which allele is the rare one.</li><li>Using this inversion when the locus has more than two alleles.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>Most real jobs need two or three of these together:</p><p><a href="/biology/hardy-weinberg-equilibrium">Hardy–Weinberg equilibrium</a>. <a href="/biology/hardy-weinberg-recessive-homozygote">Hardy–Weinberg from q²</a>. <a href="/biology/hardy-weinberg-dominant-homozygote">Hardy–Weinberg from p²</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Can 2pq be greater than 0.5?', 'a' => 'No — its maximum is 0.5 at p = q = 0.5. A larger value means the population is not at equilibrium or the data are wrong.'],
            ['q' => 'Why are there two answers?', 'a' => 'Because 2q(1 − q) is symmetric about q = 0.5; both allele frequencies produce the same heterozygote share.'],
            ['q' => 'What does the Hardy–Weinberg from the Heterozygote Frequency actually calculate?', 'a' => <<<'TXT'
            It returns q (lower root), q (upper root), p for the lower root and homozygote frequency, lower root. Each one is derived by the formula on this page, so you can check any figure by hand.
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
