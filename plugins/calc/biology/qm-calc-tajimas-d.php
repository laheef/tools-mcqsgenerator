<?php

/**
 * Tajima's D Calculator
 * /biology/tajimas-d
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tajima\'s D Calculator',
    'meta' => ['title' => 'Tajima\'s D Calculator: Formula, Steps & Results', 'description' => <<<'TXT'
    Tajima's D compares two estimates of genetic diversity — the number of segregating sites and the average pairwise difference. It returns a₁, a₂, watterson's θ…
    TXT, 'h1' => 'Tajima\'s D Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Segregating sites (S)',
                            'type' => 'number',
                            'help' => 'Positions that vary in the sample',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'n',
                            'label' => 'Sample size (chromosomes)',
                            'type' => 'number',
                            'help' => 'Sequences compared',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'pi',
                            'label' => 'Nucleotide diversity (π)',
                            'type' => 'number',
                            'help' => 'Average pairwise difference per site',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.004',
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
                            'name' => 'd',
                            'label' => 'Tajima\'s D',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'theta_w',
                            'label' => 'Watterson\'s θ',
                            'type' => 'number',
                            'suffix' => 'per bp',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'theta_pi',
                            'label' => 'Nucleotide diversity θπ',
                            'type' => 'number',
                            'suffix' => 'per bp',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'a1',
                            'label' => 'a₁',
                            'type' => 'number',
                            'help' => 'Harmonic correction for the sample size',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'a2',
                            'label' => 'a₂',
                            'type' => 'number',
                            'help' => 'The same sum for the squares',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'scaled',
                            'label' => 'S ÷ a₁',
                            'type' => 'number',
                            'help' => 'Raw segregating-site estimate',
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
            'title' => 'Tajima',
            'results' => [
                'a1' => 'ln(n-1)+0.5772+1/(2*(n-1))',
                'a2' => '1.6449-1/(n-1)',
                'theta_w' => 'sites/a1/length',
                'theta_pi' => 'pi',
                'scaled' => 'sites/a1',
                'd' => <<<'TXT'
                (pi*length-sites/(ln(n-1)+0.5772+1/(2*(n-1))))/sqrt(((n+1)/(3*(n-1))-1/(ln(n-1)+0.5772+1/(2*(n-1))))/(ln(n-1)+0.5772+1/(2*(n-1)))*sites+((2*(n^2+n+3)/(9*n*(n-1))-(n+2)/((ln(n-1)+0.5772+1/(2*(n-1)))*n)+(1.6449-1/(n-1))/(ln(n-1)+0.5772+1/(2*(n-1)))^2)/((ln(n-1)+0.5772+1/(2*(n-1)))^2+1.6449-1/(n-1)))*sites*(sites-1))
                TXT,
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Tajima's D compares two estimates of genetic diversity — the number of segregating sites and the average pairwise difference. It returns a₁, a₂, watterson's θ and nucleotide diversity θπ, and the panel shows all of them at once.
        
        When they disagree, the population is not evolving neutrally: a negative D suggests a selective sweep or recent expansion, a positive D suggests balancing selection or structure.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Tajima\'s D', 'html' => <<<'TXT'
            <p>D = (θπ − S ÷ a₁) ÷ √(e₁S + e₂S(S−1)), with a₁ = Σ 1/i for i = 1 … n−1. θπ is the average pairwise difference; S ÷ a₁ is Watterson's estimate</p>
            <figure class="calc-figure"><img src="/uploads/biology/tajimas-d.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Tajima's D Calculator — Tajima's D across a genomic region" title="Tajima's D Calculator"><figcaption>Tajima's D across a genomic region</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>S</code></td><td>number of segregating (variable) sites</td><td>—</td></tr><tr><td><code>θπ</code></td><td>average pairwise nucleotide differences</td><td>per bp</td></tr><tr><td><code>a₁</code></td><td>1 + 1/2 + … + 1/(n−1), the harmonic number of the sample size</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Tajima\'s D?', 'html' => <<<'TXT'
            <ol><li>Count the segregating sites and the sequences in your alignment.</li><li>Enter the average pairwise differences per site and the length analysed.</li><li>A D outside ±2 is a signal worth investigating, ideally with a simulation-based test.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: segregating sites (s) of <strong>12</strong>, sample size (chromosomes) of <strong>20</strong>, nucleotide diversity (π) of <strong>0.004</strong>, sequence length of <strong>1,000</strong> bp.</p>
            <p>Substituting them into the formula gives a₁ of <strong>3.55</strong>, a₂ of <strong>1.59</strong>, watterson's θ of <strong>0.0034</strong> per bp, nucleotide diversity θπ of <strong>0.004</strong> per bp, s ÷ a₁ of <strong>3.38</strong>, tajima's d of <strong>0.656</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>D below −2</td><td><strong>Significant negative</strong></td><td>recent sweep or population expansion</td></tr><tr><td>D −2 to 2</td><td><strong>Neutral</strong></td><td>consistent with a constant-size, neutrally evolving population</td></tr><tr><td>D above 2</td><td><strong>Significant positive</strong></td><td>balancing selection, structure or a bottleneck</td></tr></tbody></table>
            <ul><li><p>The statistic is a difference of two estimates of the same quantity: under neutrality they should agree, which is why D is expected to be about zero.</p></li><li><p>The harmonic sums a₁ and a₂ are evaluated here from their asymptotic expansions, which match the exact values to about 0.1% for sample sizes between 10 and 200; the coefficients e₁ and e₂ follow Tajima's original definitions.</p></li><li><p>Significance is judged against a coalescent simulation or a standardised critical value, not against a normal distribution — D is skewed for small samples.</p></li><li><p>Window size matters: calculated across a whole chromosome, a local sweep disappears into the average.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Feeding in the number of variable sites without the sequence length, which loses the per-base scaling.</li><li>Comparing D values from windows with very different numbers of segregating sites.</li><li>Treating a significant D as proof of selection — demography produces the same signature.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does a negative Tajima\'s D mean?', 'a' => 'Fewer rare variants than expected: a selective sweep or a recent expansion has removed them.'],
            ['q' => 'Is Tajima\'s D a p-value?', 'a' => 'No. It is a test statistic; you need a simulation or a critical-value table to call significance.'],
            ['q' => 'Why do the two estimates differ?', 'a' => 'They weight rare variants differently — π includes them, S does not.'],
            ['q' => 'What does the Tajima\'s D actually calculate?', 'a' => 'It returns a₁, a₂, watterson\'s θ and nucleotide diversity θπ. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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
