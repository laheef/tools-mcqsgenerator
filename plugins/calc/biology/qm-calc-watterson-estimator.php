<?php

/**
 * Watterson Estimator Calculator
 * /biology/watterson-estimator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Watterson Estimator Calculator',
    'meta' => ['title' => 'Watterson Estimator Calculator — Formula & Results', 'description' => <<<'TXT'
    The Watterson estimator infers the population mutation parameter θ from the number of segregating sites in a sample, with a correction for how many sequences…
    TXT, 'h1' => 'Watterson Estimator Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'sites',
                            'label' => 'Segregating sites',
                            'type' => 'number',
                            'help' => 'Columns that vary',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '24',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Sequence length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'n',
                            'label' => 'Number of sequences',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'theta_w',
                            'label' => 'Watterson θ (per locus)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'theta_per_site',
                            'label' => 'θ per site',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'theta_per_kb',
                            'label' => 'Watterson θ per kb',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'a1',
                            'label' => 'Harmonic number a₁ (n − 1)',
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
            'title' => 'Diversity',
            'results' => ['a1' => 'log(max(n,2)-1)+0.5772156649+1/(2*(max(n,2)-1))-1/(12*(max(n,2)-1)*(max(n,2)-1))', 'theta_w' => 'sites/(log(max(n,2)-1)+0.5772156649+1/(2*(max(n,2)-1))-1/(12*(max(n,2)-1)*(max(n,2)-1)))', 'theta_per_site' => 'sites/(log(max(n,2)-1)+0.5772156649+1/(2*(max(n,2)-1))-1/(12*(max(n,2)-1)*(max(n,2)-1)))/length', 'theta_per_kb' => 'sites/(log(max(n,2)-1)+0.5772156649+1/(2*(max(n,2)-1))-1/(12*(max(n,2)-1)*(max(n,2)-1)))/length*1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Watterson estimator infers the population mutation parameter θ from the number of segregating sites in a sample, with a correction for how many sequences you sequenced. It returns harmonic number a₁ (n − 1), watterson θ (per locus), θ per site and watterson θ per kb, and the panel shows all of them at once.
        
        It is the quickest way to compare diversity between samples of different sizes and to spot a population that is not at equilibrium.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Watterson Estimator', 'html' => <<<'TXT'
            <p>θ_W = S ÷ a₁, where a₁ = Σ 1/i for i = 1 … n−1</p>
            <figure class="calc-figure"><img src="/uploads/biology/watterson-estimator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Watterson Estimator Calculator — More sequences means more expected variable sites." title="Watterson Estimator Calculator"><figcaption>More sequences means more expected variable sites.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>S</code></td><td>number of segregating sites</td><td>sites</td></tr><tr><td><code>n</code></td><td>number of sequences in the sample</td><td>sequences</td></tr><tr><td><code>a₁</code></td><td>harmonic number of n − 1</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Watterson Estimator?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: segregating sites of <strong>24</strong>, sequence length of <strong>1,000</strong> bp, number of sequences of <strong>20</strong>.</p>
            <p>Substituting them into the formula gives harmonic number a₁ (n − 1) of <strong>3.55</strong>, watterson θ (per locus) of <strong>6.76</strong>, θ per site of <strong>0.0068</strong>, watterson θ per kb of <strong>6.76</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0 – 0.001</td><td><strong>Low diversity</strong></td><td>bottleneck, inbreeding or a small population</td></tr><tr><td>0.001 – 0.01</td><td><strong>Typical</strong></td><td>many outcrossing eukaryotes</td></tr><tr><td>0.01 – 0.05</td><td><strong>High</strong></td><td>large populations, viruses, bacteria</td></tr><tr><td>above 0.05</td><td><strong>Very high</strong></td><td>often a sign of recent admixture</td></tr></tbody></table>
            <ul><li><p>θ_W uses only the count of variable sites, so it is cheap to compute and stable, but it is sensitive to sample size through a₁.</p></li><li><p>Comparing θ_W with π (average pairwise difference) is the basis of Tajima's D: they agree under a standard neutral model and diverge under selection or demographic change.</p></li><li><p>The estimator assumes an infinite-sites model with no recombination within the locus. Recombining data must be split into blocks.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Forgetting the a₁ correction and dividing S by n.</li><li>Comparing θ from samples of very different sizes without noting a₁.</li><li>Applying it to a locus with recombination, which biases θ downward.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why is a₁ in the denominator?', 'a' => 'Because the expected number of segregating sites grows with the harmonic number of the sample size under the neutral coalescent.'],
            ['q' => 'Can θ_W estimate effective population size?', 'a' => 'Yes, for a neutral locus: θ = 4Nₑμ for a diploid autosome, so Nₑ = θ ÷ (4μ).'],
            ['q' => 'What does the Watterson Estimator actually calculate?', 'a' => <<<'TXT'
            It returns harmonic number a₁ (n − 1), watterson θ (per locus), θ per site and watterson θ per kb. Each one is derived by the formula on this page, so you can check any figure by hand.
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
