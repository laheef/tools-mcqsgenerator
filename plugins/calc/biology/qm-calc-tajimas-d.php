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
    Tajima's D Calculator: Tajima's D takes Segregating sites (S), Sample size (chromosomes) and Nucleotide diversity (π) and returns Tajima's D and Watterson's θ.
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
        Tajima's D takes Segregating sites (S), Sample size (chromosomes) and Nucleotide diversity (π) and returns Tajima's D and Watterson's θ. The arithmetic is the whole method: Tajima's D is worked out from Segregating sites (S) by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Tajima\'s D calculator works', 'html' => <<<'TXT'
            <p>Tajima&#039;s D answers one question from 4 numbers, and the answer is Tajima&#039;s D, Watterson&#039;s θ and Nucleotide diversity θπ.</p><p>The relationship it solves reads a₁ = ln(Sample size (chromosomes) − 1) + 0.5772 + 1 ÷ (2 × (Sample size (chromosomes) − 1)).</p><p>What comes back is Tajima&#039;s D, Watterson&#039;s θ, Nucleotide diversity θπ and a₁ — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Segregating sites (S)</strong> — a plain number, no unit. Positions that vary in the sample</li><li><strong>Sample size (chromosomes)</strong> — a plain number, no unit. Sequences compared</li><li><strong>Nucleotide diversity (π)</strong> — a plain number, no unit. Average pairwise difference per site</li><li><strong>Sequence length</strong> — in bp</li></ul><p>The result boxes are Tajima&#039;s D, Watterson&#039;s θ in per bp, Nucleotide diversity θπ in per bp, a₁, a₂, S ÷ a₁; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Segregating sites (S) = 12, Sample size (chromosomes) = 20, Nucleotide diversity (π) = 0.004 and Sequence length = 1000 bp; the answers are &lt;strong&gt;a₁&lt;/strong&gt; = 3.55, &lt;strong&gt;a₂&lt;/strong&gt; = 1.59, &lt;strong&gt;Watterson&amp;#039;s θ&lt;/strong&gt; = 0.0034 per bp, &lt;strong&gt;Nucleotide diversity θπ&lt;/strong&gt; = 0.004 per bp, &lt;strong&gt;S ÷ a₁&lt;/strong&gt; = 3.38 and &lt;strong&gt;Tajima&amp;#039;s D&lt;/strong&gt; = 0.656.</p><ul><li><strong>a₁</strong> = 3.55</li><li><strong>a₂</strong> = 1.59</li><li><strong>Watterson&#039;s θ</strong> = 0.0034 per bp</li><li><strong>Nucleotide diversity θπ</strong> = 0.004 per bp</li><li><strong>S ÷ a₁</strong> = 3.38</li><li><strong>Tajima&#039;s D</strong> = 0.656</li></ul><p>The line behind those figures is <strong>a₁</strong> = <code>ln(Sample size (chromosomes) − 1) + 0.5772 + 1 ÷ (2 × (Sample size (chromosomes) − 1))</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;a₁&lt;/strong&gt; = 3.55, &lt;strong&gt;a₂&lt;/strong&gt; = 1.59, &lt;strong&gt;Watterson&amp;#039;s θ&lt;/strong&gt; = 0.0034, &lt;strong&gt;Nucleotide diversity θπ&lt;/strong&gt; = 0.004, &lt;strong&gt;S ÷ a₁&lt;/strong&gt; = 3.38 and &lt;strong&gt;Tajima&amp;#039;s D&lt;/strong&gt; = 0.656 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Tajima&#039;s D takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>a₁</strong> = <code>ln(Sample size (chromosomes) − 1) + 0.5772 + 1 ÷ (2 × (Sample size (chromosomes) − 1))</code></li><li><strong>a₂</strong> = <code>1.6449 − 1 ÷ (Sample size (chromosomes) − 1)</code></li><li><strong>Watterson&#039;s θ</strong> = <code>Segregating sites (S) ÷ a₁ ÷ Sequence length</code></li><li><strong>Nucleotide diversity θπ</strong> = <code>Nucleotide diversity (π)</code></li><li><strong>S ÷ a₁</strong> = <code>Segregating sites (S) ÷ a₁</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of a₁, a₂ and Watterson&#039;s θ can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Segregating sites (S), from 12 to 24 — and the answers go from &lt;strong&gt;a₁&lt;/strong&gt; 3.55, &lt;strong&gt;a₂&lt;/strong&gt; 1.59, &lt;strong&gt;Watterson&amp;#039;s θ&lt;/strong&gt; 0.0034 per bp, &lt;strong&gt;Nucleotide diversity θπ&lt;/strong&gt; 0.004 per bp, &lt;strong&gt;S ÷ a₁&lt;/strong&gt; 3.38 and &lt;strong&gt;Tajima&amp;#039;s D&lt;/strong&gt; 0.656 to &lt;strong&gt;a₁&lt;/strong&gt; 3.55, &lt;strong&gt;a₂&lt;/strong&gt; 1.59, &lt;strong&gt;Watterson&amp;#039;s θ&lt;/strong&gt; 0.0068 per bp, &lt;strong&gt;Nucleotide diversity θπ&lt;/strong&gt; 0.004 per bp, &lt;strong&gt;S ÷ a₁&lt;/strong&gt; 6.76 and &lt;strong&gt;Tajima&amp;#039;s D&lt;/strong&gt; -1.58.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Tajima&#039;s D, Watterson&#039;s θ and Nucleotide diversity θπ are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Segregating sites (S) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Segregating sites (S), Sample size (chromosomes) and Nucleotide diversity (π) and the number you are missing is Tajima&#039;s D and Watterson&#039;s θ.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/od260-nucleic-acid-concentration">OD260 to Nucleic Acid Concentration Calculator</a>, <a href="/biology/od600-to-cell-density">OD600 to Cell Density Calculator</a> and <a href="/biology/genetic-odds-ratio">Odds Ratio for Genetics Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tajima\'s D calculator work out?', 'a' => <<<'TXT'
            Tajima's D, Watterson's θ, Nucleotide diversity θπ and a₁, from Sample size (chromosomes). The relationship is a₁ = ln(Sample size (chromosomes) − 1) + 0.5772 + 1 ÷ (2 × (Sample size (chromosomes) − 1)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Segregating sites (S), Sample size (chromosomes), Nucleotide diversity (π), Sequence length (bp). Enter sites, n and pi; Tajima's D is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. a₁, a₂, Watterson's θ and Nucleotide diversity θπ can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            a₁ = 3.55, a₂ = 1.59, Watterson's θ = 0.0034 per bp, Nucleotide diversity θπ = 0.004 per bp, S ÷ a₁ = 3.38 and Tajima's D = 0.656. Those are the defaults written into the form — move Segregating sites (S) and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Tajima\'s D is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Segregating sites (S) blank and the page solves for it, reporting Tajima\'s D instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Tajima\'s D at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/od260-nucleic-acid-concentration', 'name' => 'OD260 to Nucleic Acid Concentration Calculator'],
            ['path' => '/biology/od600-to-cell-density', 'name' => 'OD600 to Cell Density Calculator'],
            ['path' => '/biology/genetic-odds-ratio', 'name' => 'Odds Ratio for Genetics Calculator'],
        ],
        'authors' => [],
    ],
];
