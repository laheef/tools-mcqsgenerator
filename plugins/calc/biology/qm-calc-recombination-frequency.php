<?php

/**
 * Recombination Frequency Calculator
 * /biology/recombination-frequency
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Recombination Frequency Calculator',
    'meta' => ['title' => 'Recombination Frequency Calculator — Biology', 'description' => 'Recombination frequency is the share of offspring with a reshuffled combination of two loci. It returns recombination frequency, map distance, parental…', 'h1' => 'Recombination Frequency Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'recombinant',
                            'label' => 'Recombinant offspring',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '84',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total offspring',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '400',
                        ],
                        [
                            'name' => 'rf',
                            'label' => 'Recombination frequency',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cm',
                            'label' => 'Map distance',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'parental',
                            'label' => 'Parental offspring',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Recombinant : parental',
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
            'title' => 'Recombination',
            'results' => ['rf' => 'recombinant/total*100', 'cm' => 'recombinant/total*100', 'parental' => 'total-recombinant', 'ratio' => 'recombinant/(total-recombinant)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Recombination frequency is the share of offspring with a reshuffled combination of two loci. It returns recombination frequency, map distance, parental offspring and recombinant: parental, and the panel shows all of them at once.
        
        It is both the map distance in centimorgans and the experimental quantity a three-point cross measures, so this calculator converts between counts, percentage, map units and the testcross classes that produced them.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Recombination Frequency', 'html' => <<<'TXT'
            <p>RF (%) = recombinant offspring ÷ total offspring × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/recombination-frequency.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Recombination Frequency Calculator — Recombinant offspring as a share of the total, in percent and cM." title="Recombination Frequency Calculator"><figcaption>Recombinant offspring as a share of the total, in percent and cM.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>recombinant</code></td><td>offspring with a new allele combination</td><td>individuals</td></tr><tr><td><code>total</code></td><td>all offspring scored</td><td>individuals</td></tr><tr><td><code>RF</code></td><td>recombination frequency, equal to map units in cM</td><td>%</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Recombination Frequency?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: recombinant offspring of <strong>84</strong> individuals, total offspring of <strong>400</strong> individuals.</p>
            <p>Substituting them into the formula gives recombination frequency of <strong>21</strong>%, map distance of <strong>21</strong> cM, parental offspring of <strong>316</strong> individuals, recombinant: parental of <strong>0.2658</strong>:1.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 50%</td><td><strong>Linked</strong></td><td>the loci are on the same chromosome</td></tr><tr><td>about 50%</td><td><strong>Independent</strong></td><td>unlinked, or so far apart they assort freely</td></tr><tr><td>near 0%</td><td><strong>Tightly linked</strong></td><td>very few crossovers between the loci</td></tr></tbody></table>
            <ul><li><p>Only a testcross (one parent homozygous recessive) exposes the recombinant classes directly; in an F2 cross the recombinants are masked by dominance.</p></li><li><p>Small samples give noisy estimates: with 100 offspring, one recombinant is a whole percentage point.</p></li><li><p>A single recombination frequency cannot be greater than 50%, which is why long intervals are measured as sums of short ones.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Scoring an F2 instead of a testcross and expecting the recombinants to be visible.</li><li>Adding frequencies from overlapping intervals.</li><li>Forgetting that in a three-point cross each double crossover is counted twice.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/centimorgan-to-percentage">Centimorgan to percentage</a>. <a href="/biology/genetic-map-distance">Genetic linkage distance</a>. <a href="/biology/dihybrid-cross">Dihybrid cross</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is the difference between recombination frequency and map distance?', 'a' => 'They are numerically equal below about 10 cM; beyond that map distance uses a mapping function to correct for unseen double crossovers.'],
            ['q' => 'What does 50% recombination mean?', 'a' => 'The loci assort independently — either they are on different chromosomes or far enough apart on the same one.'],
            ['q' => 'What does the Recombination Frequency actually calculate?', 'a' => <<<'TXT'
            It returns recombination frequency, map distance, parental offspring and recombinant : parental. Each one is derived by the formula on this page, so you can check any figure by hand.
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
