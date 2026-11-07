<?php

/**
 * Inbreeding Coefficient Calculator (COI)
 * /biology/inbreeding-coefficient
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Inbreeding Coefficient Calculator (COI)',
    'meta' => ['title' => 'Inbreeding Coefficient Calculator (COI) — Biology', 'description' => 'The coefficient of inbreeding is the probability that two alleles at a locus in one individual are identical by descent. It returns inbreeding coefficient…', 'h1' => 'Inbreeding Coefficient Calculator (COI)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'paths',
                            'label' => 'Independent ancestral paths',
                            'type' => 'number',
                            'help' => 'Count of distinct loops through a common ancestor',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'n1',
                            'label' => 'Generations on the sire\'s side',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'n2',
                            'label' => 'Generations on the dam\'s side',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'f',
                            'label' => 'Inbreeding coefficient',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hetero',
                            'label' => 'Heterozygosity retained',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'related',
                            'label' => 'Relationship coefficient',
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
            'title' => 'Inbreeding',
            'results' => ['f' => 'pow(0.5,n1+n2+1)*paths*100', 'hetero' => '(1-pow(0.5,n1+n2+1)*paths)*100', 'related' => 'pow(0.5,n1+n2)*paths*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The coefficient of inbreeding is the probability that two alleles at a locus in one individual are identical by descent. It returns inbreeding coefficient, heterozygosity retained and relationship coefficient, and the panel shows all of them at once.
        
        This calculator estimates it from an ancestral path and shows the expected loss of heterozygosity, which is what actually matters for a breeding programme.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Inbreeding Coefficient (COI)', 'html' => <<<'TXT'
            <p>F = Σ (½)^(n₁ + n₂ + 1), summed over independent paths to a common ancestor</p>
            <figure class="calc-figure"><img src="/uploads/biology/inbreeding-coefficient.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Inbreeding Coefficient Calculator (COI) — Two paths up the pedigree and the probability they carry the same allele." title="Inbreeding Coefficient Calculator (COI)"><figcaption>Two paths up the pedigree and the probability they carry the same allele.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>n₁, n₂</code></td><td>generations from each parent to the shared ancestor</td><td>generations</td></tr><tr><td><code>F</code></td><td>coefficient of inbreeding</td><td>%</td></tr><tr><td><code>½^(n+1)</code></td><td>the probability the same allele travelled down both paths</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Inbreeding Coefficient (COI)?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: independent ancestral paths of <strong>1</strong>, generations on the sire's side of <strong>2</strong>, generations on the dam's side of <strong>2</strong>.</p>
            <p>Substituting them into the formula gives inbreeding coefficient of <strong>3.12</strong>%, heterozygosity retained of <strong>96.88</strong>%, relationship coefficient of <strong>6.25</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>F below 6.25%</td><td><strong>Low</strong></td><td>mating of second cousins or more distant relatives</td></tr><tr><td>6.25 – 12.5%</td><td><strong>Moderate</strong></td><td>first cousins are 6.25%, uncle–niece 12.5%</td></tr><tr><td>above 25%</td><td><strong>High</strong></td><td>parent–offspring or full siblings; inbreeding depression is likely</td></tr></tbody></table>
            <ul><li><p>F measures identity by descent, not homozygosity: a population may be homozygous for a reason other than inbreeding.</p></li><li><p>Each 1% of inbreeding coefficient removes about 1% of expected heterozygosity, which is the quantity that predicts inbreeding depression in fitness traits.</p></li><li><p>Pedigree F values are expectations; realised inbreeding from genome data differs because recombination is uneven.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Counting the same ancestral path twice.</li><li>Mixing species: the same pedigree gives the same F, but the fitness consequences differ enormously.</li><li>Treating F as a percentage of the genome that is homozygous.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/relatedness-coefficient">Relatedness coefficient</a>. <a href="/biology/hardy-weinberg-equilibrium">Hardy–Weinberg equilibrium</a>. <a href="/biology/autosomal-recessive-risk">Recessive inheritance risk</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is F for a mating of full siblings?', 'a' => '25% for their offspring, from two paths through the shared parents.'],
            ['q' => 'Does inbreeding cause mutations?', 'a' => 'No — it makes existing recessive alleles homozygous, which exposes them.'],
            ['q' => 'What does the Inbreeding Coefficient (COI) actually calculate?', 'a' => <<<'TXT'
            It returns inbreeding coefficient, heterozygosity retained and relationship coefficient. Each one is derived by the formula on this page, so you can check any figure by hand.
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
