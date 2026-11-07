<?php

/**
 * Fixation Index Calculator (Fst)
 * /biology/fixation-index-fst
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fixation Index Calculator (Fst)',
    'meta' => ['title' => 'Fixation Index (Fst) Calculator — Formula & Results', 'description' => 'Enter Allele frequency in population 1, Allele frequency in population 2 and Sample size, population 1 into Fixation Index Calculator (Fst) and the answer…', 'h1' => 'Fixation Index Calculator (Fst)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'p1',
                            'label' => 'Allele frequency in population 1',
                            'type' => 'number',
                            'help' => '0–1',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.2',
                        ],
                        [
                            'name' => 'p2',
                            'label' => 'Allele frequency in population 2',
                            'type' => 'number',
                            'help' => '0–1',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.7',
                        ],
                        [
                            'name' => 'n1',
                            'label' => 'Sample size, population 1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'n2',
                            'label' => 'Sample size, population 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'p_bar',
                            'label' => 'Mean allele frequency',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hs',
                            'label' => 'Expected heterozygosity within populations',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ht',
                            'label' => 'Expected heterozygosity overall',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fst',
                            'label' => 'Fst',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'migrants',
                            'label' => 'Migrants per generation implied by Fst',
                            'type' => 'number',
                            'suffix' => 'per gen',
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
            'title' => 'Divergence',
            'results' => [
                'p_bar' => '(p1*n1+p2*n2)/(n1+n2)',
                'hs' => '(2*p1*(1-p1)+2*p2*(1-p2))/2',
                'ht' => '2*((p1*n1+p2*n2)/(n1+n2))*(1-(p1*n1+p2*n2)/(n1+n2))',
                'fst' => '(2*((p1*n1+p2*n2)/(n1+n2))*(1-(p1*n1+p2*n2)/(n1+n2))-(2*p1*(1-p1)+2*p2*(1-p2))/2)/max(0.000001,2*((p1*n1+p2*n2)/(n1+n2))*(1-(p1*n1+p2*n2)/(n1+n2)))',
                'migrants' => <<<'TXT'
                (1/max(0.000001,((2*((p1*n1+p2*n2)/(n1+n2))*(1-(p1*n1+p2*n2)/(n1+n2))-(2*p1*(1-p1)+2*p2*(1-p2))/2)/max(0.000001,2*((p1*n1+p2*n2)/(n1+n2))*(1-(p1*n1+p2*n2)/(n1+n2)))))-1)/4
                TXT,
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Allele frequency in population 1, Allele frequency in population 2 and Sample size, population 1 into Fixation Index Calculator (Fst) and the answer comes back as Mean allele frequency and Expected heterozygosity within populations. It is a single relationship that reads Mean allele frequency out of Allele frequency in population 1, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Fixation Index Calculator (Fst) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Fixation Index Calculator (Fst): it takes 4 numbers and reports Mean allele frequency, Expected heterozygosity within populations and Expected heterozygosity overall.</p><p>The relationship it solves reads Mean allele frequency = (Allele frequency in population 1 × Sample size, population 1 + Allele frequency in population 2 × Sample size, population 2) ÷ (Sample size, population 1 + Sample size, population 2).</p><p>The result panel carries Mean allele frequency, Expected heterozygosity within populations, Expected heterozygosity overall and Fst, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Allele frequency in population 1</strong> — a plain number, no unit. 0–1</li><li><strong>Allele frequency in population 2</strong> — a plain number, no unit. 0–1</li><li><strong>Sample size, population 1</strong> — a plain number, no unit</li><li><strong>Sample size, population 2</strong> — a plain number, no unit</li></ul><p>The result boxes are Mean allele frequency, Expected heterozygosity within populations, Expected heterozygosity overall, Fst, Migrants per generation implied by Fst in per gen; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Allele frequency in population 1 = 0.2, Allele frequency in population 2 = 0.7, Sample size, population 1 = 50 and Sample size, population 2 = 50 gives &lt;strong&gt;Mean allele frequency&lt;/strong&gt; = 0.45, &lt;strong&gt;Expected heterozygosity within populations&lt;/strong&gt; = 0.37, &lt;strong&gt;Expected heterozygosity overall&lt;/strong&gt; = 0.495, &lt;strong&gt;Fst&lt;/strong&gt; = 0.2525 and &lt;strong&gt;Migrants per generation implied by Fst&lt;/strong&gt; = 0.74 per gen.</p><ul><li><strong>Mean allele frequency</strong> = 0.45</li><li><strong>Expected heterozygosity within populations</strong> = 0.37</li><li><strong>Expected heterozygosity overall</strong> = 0.495</li><li><strong>Fst</strong> = 0.2525</li><li><strong>Migrants per generation implied by Fst</strong> = 0.74 per gen</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Mean allele frequency</strong> = <code>(Allele frequency in population 1 × Sample size, population 1 + Allele frequency in population 2 × Sample size, population 2) ÷ (Sample size, population 1 + Sample size, population 2)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Mean allele frequency&lt;/strong&gt; = 0.45, &lt;strong&gt;Expected heterozygosity within populations&lt;/strong&gt; = 0.37, &lt;strong&gt;Expected heterozygosity overall&lt;/strong&gt; = 0.495, &lt;strong&gt;Fst&lt;/strong&gt; = 0.2525 and &lt;strong&gt;Migrants per generation implied by Fst&lt;/strong&gt; = 0.74. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Mean allele frequency is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Mean allele frequency</strong> = <code>(Allele frequency in population 1 × Sample size, population 1 + Allele frequency in population 2 × Sample size, population 2) ÷ (Sample size, population 1 + Sample size, population 2)</code></li><li><strong>Expected heterozygosity within populations</strong> = <code>(2 × Allele frequency in population 1 × (1 − Allele frequency in population 1) + 2 × Allele frequency in population 2 × (1 − Allele frequency in population 2)) ÷ 2</code></li></ul><p>Any one of Mean allele frequency, Expected heterozygosity within populations and Expected heterozygosity overall can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Allele frequency in population 1 from 0.2 to 0.4, leaving every other box alone. The panel moves from &lt;strong&gt;Mean allele frequency&lt;/strong&gt; 0.45, &lt;strong&gt;Expected heterozygosity within populations&lt;/strong&gt; 0.37, &lt;strong&gt;Expected heterozygosity overall&lt;/strong&gt; 0.495, &lt;strong&gt;Fst&lt;/strong&gt; 0.2525 and &lt;strong&gt;Migrants per generation implied by Fst&lt;/strong&gt; 0.74 per gen to &lt;strong&gt;Mean allele frequency&lt;/strong&gt; 0.55, &lt;strong&gt;Expected heterozygosity within populations&lt;/strong&gt; 0.45, &lt;strong&gt;Expected heterozygosity overall&lt;/strong&gt; 0.495, &lt;strong&gt;Fst&lt;/strong&gt; 0.0909 and &lt;strong&gt;Migrants per generation implied by Fst&lt;/strong&gt; 2.5 per gen.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Mean allele frequency, Expected heterozygosity within populations and Expected heterozygosity overall are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Allele frequency in population 1 and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Allele frequency in population 1, Allele frequency in population 2 and Sample size, population 1 and the number you are missing is Mean allele frequency and Expected heterozygosity within populations.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/hardy-weinberg-equilibrium">Hardy-Weinberg equilibrium Calculator</a>, <a href="/biology/hardy-weinberg-dominant-allele">Hardy–Weinberg from the Dominant Allele Frequency Calculator</a> and <a href="/biology/hardy-weinberg-dominant-homozygote">Hardy–Weinberg from the Dominant Homozygote Frequency Calculat</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fixation Index Calculator (Fst) calculator work out?', 'a' => <<<'TXT'
            Mean allele frequency, Expected heterozygosity within populations, Expected heterozygosity overall and Fst, from Allele frequency in population 1, Sample size, population 1, Allele frequency in population 2 and Sample size, population 2. The relationship is Mean allele frequency = (Allele frequency in population 1 × Sample size, population 1 + Allele frequency in population 2 × Sample size, population 2) ÷ (Sample size, population 1 + Sample size, population 2).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Allele frequency in population 1, Allele frequency in population 2, Sample size, population 1, Sample size, population 2. With p1, p2 and n1 in place, Mean allele frequency can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Mean allele frequency, Expected heterozygosity within populations, Expected heterozygosity overall and Fst blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Mean allele frequency = 0.45, Expected heterozygosity within populations = 0.37, Expected heterozygosity overall = 0.495, Fst = 0.2525 and Migrants per generation implied by Fst = 0.74 per gen. That comes from the page's own defaults, entered in Allele frequency in population 1; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Mean allele frequency is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Allele frequency in population 1 left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Mean allele frequency keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/hardy-weinberg-equilibrium', 'name' => 'Hardy-Weinberg equilibrium Calculator'],
            ['path' => '/biology/hardy-weinberg-dominant-allele', 'name' => 'Hardy–Weinberg from the Dominant Allele Frequency Calculator'],
            ['path' => '/biology/hardy-weinberg-dominant-homozygote', 'name' => 'Hardy–Weinberg from the Dominant Homozygote Frequency Calculat'],
        ],
        'authors' => [],
    ],
];
