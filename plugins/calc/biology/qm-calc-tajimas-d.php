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
    'meta' => ['title' => 'Tajima\'s D Calculator: Formula, Steps & Example', 'description' => 'Tajima\'s D Calculator turns segregating sites (S) and sample size (chromosomes) into tajima\'s D. Free to use, with the working shown beside the answer.', 'h1' => 'Tajima\'s D Calculator', 'updated' => '2026-10-29'],
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
        Tajima's D takes Segregating sites (S), Sample size (chromosomes) and Nucleotide diversity (π) and returns Tajima's D and Watterson's θ. The arithmetic is the whole method: tajima's D is worked out from segregating sites (S) by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Tajima\'s D calculator works', 'html' => <<<'TXT'
            <p>Tajima&#039;s D answers one question from 4 numbers, and the answer is Tajima&#039;s D, Watterson&#039;s θ and Nucleotide diversity θπ.</p><p>The relationship it solves reads a₁ = ln(Sample size (chromosomes) − 1) + 0.5772 + 1 ÷ (2 × (Sample size (chromosomes) − 1)).</p><p>What comes back is Tajima&#039;s D, Watterson&#039;s θ, Nucleotide diversity θπ and a₁ — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Segregating sites (S)</strong> — a plain number, no unit. Positions that vary in the sample</li><li><strong>Sample size (chromosomes)</strong> — a plain number, no unit. Sequences compared</li><li><strong>Nucleotide diversity (π)</strong> — a plain number, no unit. Average pairwise difference per site</li><li><strong>Sequence length</strong> — in bp</li></ul><p>The result boxes are Tajima&#039;s D, Watterson&#039;s θ in per bp, Nucleotide diversity θπ in per bp, a₁, a₂, S ÷ a₁; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Segregating sites (S) = 12, Sample size (chromosomes) = 20, Nucleotide diversity (π) = 0.004 and Sequence length = 1000 bp; the answers are <strong>a₁</strong> = 3.55, <strong>a₂</strong> = 1.59, <strong>Watterson&amp;#039;s θ</strong> = 0.0034 per bp, <strong>Nucleotide diversity θπ</strong> = 0.004 per bp, <strong>S ÷ a₁</strong> = 3.38 and <strong>Tajima&amp;#039;s D</strong> = 0.656.</p><ul><li><strong>a₁</strong> = 3.55</li><li><strong>a₂</strong> = 1.59</li><li><strong>Watterson&#039;s θ</strong> = 0.0034 per bp</li><li><strong>Nucleotide diversity θπ</strong> = 0.004 per bp</li><li><strong>S ÷ a₁</strong> = 3.38</li><li><strong>Tajima&#039;s D</strong> = 0.656</li></ul><p>The line behind those figures is <strong>a₁</strong> = <code>ln(Sample size (chromosomes) − 1) + 0.5772 + 1 ÷ (2 × (Sample size (chromosomes) − 1))</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>a₁</strong> = 3.55, <strong>a₂</strong> = 1.59, <strong>Watterson&amp;#039;s θ</strong> = 0.0034, <strong>Nucleotide diversity θπ</strong> = 0.004, <strong>S ÷ a₁</strong> = 3.38 and <strong>Tajima&amp;#039;s D</strong> = 0.656 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Tajima&#039;s D takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>a₁</strong> = <code>ln(Sample size (chromosomes) − 1) + 0.5772 + 1 ÷ (2 × (Sample size (chromosomes) − 1))</code></li><li><strong>a₂</strong> = <code>1.6449 − 1 ÷ (Sample size (chromosomes) − 1)</code></li><li><strong>Watterson&#039;s θ</strong> = <code>Segregating sites (S) ÷ a₁ ÷ Sequence length</code></li><li><strong>Nucleotide diversity θπ</strong> = <code>Nucleotide diversity (π)</code></li><li><strong>S ÷ a₁</strong> = <code>Segregating sites (S) ÷ a₁</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>a₁</strong> = <code>ln(Sample size (chromosomes) − 1) + 0.5772 + 1 ÷ (2 × (Sample size (chromosomes) − 1))</code> — the form to use when Sample size (chromosomes) are the values you have.</li><li><strong>a₂</strong> = <code>1.6449 − 1 ÷ (Sample size (chromosomes) − 1)</code> — the form to use when Sample size (chromosomes) are the values you have.</li><li><strong>Watterson&#039;s θ</strong> = <code>Segregating sites (S) ÷ a₁ ÷ Sequence length</code> — the form to use when Segregating sites (S), a₁ and Sequence length are the values you have.</li><li><strong>Nucleotide diversity θπ</strong> = <code>Nucleotide diversity (π)</code> — the form to use when the other values are known.</li><li><strong>S ÷ a₁</strong> = <code>Segregating sites (S) ÷ a₁</code> — the form to use when Segregating sites (S) and a₁ are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of a₁, a₂ and Watterson&#039;s θ can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Segregating sites (S), from 12 to 24 — and the answers go from <strong>a₁</strong> 3.55, <strong>a₂</strong> 1.59, <strong>Watterson&amp;#039;s θ</strong> 0.0034 per bp, <strong>Nucleotide diversity θπ</strong> 0.004 per bp, <strong>S ÷ a₁</strong> 3.38 and <strong>Tajima&amp;#039;s D</strong> 0.656 to <strong>a₁</strong> 3.55, <strong>a₂</strong> 1.59, <strong>Watterson&amp;#039;s θ</strong> 0.0068 per bp, <strong>Nucleotide diversity θπ</strong> 0.004 per bp, <strong>S ÷ a₁</strong> 6.76 and <strong>Tajima&amp;#039;s D</strong> -1.58.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box cannot be typed into: the results are worked out from the inputs above, and a past answer has to be entered as one of those inputs instead.</li><li><strong>Segregating sites (S) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Segregating sites (S) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Sample size (chromosomes) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Sample size (chromosomes) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Nucleotide diversity (π) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Nucleotide diversity (π) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Segregating sites (S) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Tajima&#039;s D form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Segregating sites (S)</strong> takes a plain number with no unit attached. Positions that vary in the sample. The page reads it when it works out Watterson's θ, S ÷ a₁ and Tajima's D. Fill it from a measurement rather than a memory — Segregating sites (S) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Sample size (chromosomes)</strong> takes a plain number with no unit attached. Sequences compared. The page reads it when it works out a₁, a₂ and Tajima's D. Fill it from a measurement rather than a memory — Sample size (chromosomes) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Nucleotide diversity (π)</strong> takes a plain number with no unit attached. Average pairwise difference per site. Fill it from a measurement rather than a memory — Nucleotide diversity (π) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Sequence length</strong> is measured in bp. The page reads it when it works out Watterson's θ and Tajima's D. Fill it from a measurement rather than a memory — Sequence length is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 6 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Tajima&#039;s D</strong> is a plain number and the page's own defaults put it at 0.656. The value follows from Sequence length, Segregating sites (S) and Sample size (chromosomes). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Watterson&#039;s θ</strong> is a plain number and the page's own defaults put it at 0.0034. The value follows from Segregating sites (S), a₁ and Sequence length. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Nucleotide diversity θπ</strong> is a plain number and the page's own defaults put it at 0.004. The page computes it from the form as a whole rather than from one line of the formula. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>a₁</strong> is a plain number and the page's own defaults put it at 3.55. The value follows from Sample size (chromosomes). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>a₂</strong> is a plain number and the page's own defaults put it at 1.59. The value follows from Sample size (chromosomes). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>S ÷ a₁</strong> is a plain number and the page's own defaults put it at 3.38. The value follows from Segregating sites (S) and a₁. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>a₁</th><th>a₂</th><th>Watterson&#039;s θ</th><th>Nucleotide diversity θπ</th><th>S ÷ a₁</th><th>Tajima&#039;s D</th></tr></thead><tbody><tr><td><strong>Segregating sites (S)</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>+0%</td><td>+10%</td><td>-58.35%</td></tr><tr><td><strong>Sample size (chromosomes)</strong> +10%</td><td>+2.75%</td><td>+0.31%</td><td>-2.68%</td><td>+0%</td><td>-2.68%</td><td>+14.97%</td></tr><tr><td><strong>Nucleotide diversity (π)</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>+0%</td><td>+64.75%</td></tr><tr><td><strong>Sequence length</strong> +10%</td><td>+0%</td><td>+0%</td><td>-9.09%</td><td>+0%</td><td>+0%</td><td>+64.75%</td></tr></tbody></table><p>Ranked by leverage, Nucleotide diversity (π) sits at the top — a ten per cent error in that box shows up as roughly 64.7 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Segregating sites (S) = 6, Sample size (chromosomes) = 10, Nucleotide diversity (π) = 0.002 and Sequence length = 500 bp and the page reports <strong>a₁</strong> = 2.83, <strong>a₂</strong> = 1.53, <strong>Watterson&#039;s θ</strong> = 0.0042 per bp, <strong>Nucleotide diversity θπ</strong> = 0.002 per bp, <strong>S ÷ a₁</strong> = 2.12 and <strong>Tajima&#039;s D</strong> = -2.19.</li><li>Feed in Segregating sites (S) = 36, Sample size (chromosomes) = 20, Nucleotide diversity (π) = 0.004 and Sequence length = 1000 bp and the page reports <strong>a₁</strong> = 3.55, <strong>a₂</strong> = 1.59, <strong>Watterson&#039;s θ</strong> = 0.0101 per bp, <strong>Nucleotide diversity θπ</strong> = 0.004 per bp, <strong>S ÷ a₁</strong> = 10.15 and <strong>Tajima&#039;s D</strong> = -2.4.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Tajima&#039;s D is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
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
            Segregating sites (S), Sample size (chromosomes), Nucleotide diversity (π), Sequence length (bp). Enter segregating sites (S), sample size (chromosomes) and nucleotide diversity (π); Tajima's D is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. a₁, a₂, Watterson's θ and Nucleotide diversity θπ can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            a₁ = 3.55, a₂ = 1.59, Watterson's θ = 0.0034 per bp, Nucleotide diversity θπ = 0.004 per bp, S ÷ a₁ = 3.38 and Tajima's D = 0.656. Those are the defaults written into the form — move Segregating sites (S) and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Tajima's D is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
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
