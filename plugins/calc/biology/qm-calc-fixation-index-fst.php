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
    'meta' => ['title' => 'Fixation Index (Fst) Calculator — Formula & Results', 'description' => 'Fixation Index Calculator (Fst) works out mean allele frequency and expected heterozygosity within populations and reports both. A worked example follows.', 'h1' => 'Fixation Index Calculator (Fst)', 'updated' => '2026-10-29'],
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
        Enter Allele frequency in population 1, Allele frequency in population 2 and Sample size, population 1 into Fixation Index Calculator (Fst) and the answer comes back as Mean allele frequency and Expected heterozygosity within populations. It is a single relationship that reads mean allele frequency out of allele frequency in population 1, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Fixation Index Calculator (Fst) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Fixation Index Calculator (Fst): it takes 4 numbers and reports Mean allele frequency, Expected heterozygosity within populations and Expected heterozygosity overall.</p><p>The relationship it solves reads Mean allele frequency = (Allele frequency in population 1 × Sample size, population 1 + Allele frequency in population 2 × Sample size, population 2) ÷ (Sample size, population 1 + Sample size, population 2).</p><p>The result panel carries Mean allele frequency, Expected heterozygosity within populations, Expected heterozygosity overall and Fst, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Allele frequency in population 1</strong> — a plain number, no unit. 0–1</li><li><strong>Allele frequency in population 2</strong> — a plain number, no unit. 0–1</li><li><strong>Sample size, population 1</strong> — a plain number, no unit</li><li><strong>Sample size, population 2</strong> — a plain number, no unit</li></ul><p>The result boxes are Mean allele frequency, Expected heterozygosity within populations, Expected heterozygosity overall, Fst, Migrants per generation implied by Fst in per gen; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Allele frequency in population 1 = 0.2, Allele frequency in population 2 = 0.7, Sample size, population 1 = 50 and Sample size, population 2 = 50 gives <strong>Mean allele frequency</strong> = 0.45, <strong>Expected heterozygosity within populations</strong> = 0.37, <strong>Expected heterozygosity overall</strong> = 0.495, <strong>Fst</strong> = 0.253 and <strong>Migrants per generation implied by Fst</strong> = 0.74 per gen.</p><ul><li><strong>Mean allele frequency</strong> = 0.45</li><li><strong>Expected heterozygosity within populations</strong> = 0.37</li><li><strong>Expected heterozygosity overall</strong> = 0.495</li><li><strong>Fst</strong> = 0.253</li><li><strong>Migrants per generation implied by Fst</strong> = 0.74 per gen</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Mean allele frequency</strong> = <code>(Allele frequency in population 1 × Sample size, population 1 + Allele frequency in population 2 × Sample size, population 2) ÷ (Sample size, population 1 + Sample size, population 2)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Mean allele frequency</strong> = 0.45, <strong>Expected heterozygosity within populations</strong> = 0.37, <strong>Expected heterozygosity overall</strong> = 0.495, <strong>Fst</strong> = 0.253 and <strong>Migrants per generation implied by Fst</strong> = 0.74. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Mean allele frequency is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Mean allele frequency</strong> = <code>(Allele frequency in population 1 × Sample size, population 1 + Allele frequency in population 2 × Sample size, population 2) ÷ (Sample size, population 1 + Sample size, population 2)</code></li><li><strong>Expected heterozygosity within populations</strong> = <code>(2 × Allele frequency in population 1 × (1 − Allele frequency in population 1) + 2 × Allele frequency in population 2 × (1 − Allele frequency in population 2)) ÷ 2</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Mean allele frequency</strong> = <code>(Allele frequency in population 1 × Sample size, population 1 + Allele frequency in population 2 × Sample size, population 2) ÷ (Sample size, population 1 + Sample size, population 2)</code> — the form to use when Allele frequency in population 1, Sample size, population 1, Allele frequency in population 2 and Sample size, population 2 are the values you have.</li><li><strong>Expected heterozygosity within populations</strong> = <code>(2 × Allele frequency in population 1 × (1 − Allele frequency in population 1) + 2 × Allele frequency in population 2 × (1 − Allele frequency in population 2)) ÷ 2</code> — the form to use when Allele frequency in population 1 and Allele frequency in population 2 are the values you have.</li></ul><p>Any one of Mean allele frequency, Expected heterozygosity within populations and Expected heterozygosity overall can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Allele frequency in population 1 from 0.2 to 0.4, leaving every other box alone. The panel moves from <strong>Mean allele frequency</strong> 0.45, <strong>Expected heterozygosity within populations</strong> 0.37, <strong>Expected heterozygosity overall</strong> 0.495, <strong>Fst</strong> 0.253 and <strong>Migrants per generation implied by Fst</strong> 0.74 per gen to <strong>Mean allele frequency</strong> 0.55, <strong>Expected heterozygosity within populations</strong> 0.45, <strong>Expected heterozygosity overall</strong> 0.495, <strong>Fst</strong> 0.091 and <strong>Migrants per generation implied by Fst</strong> 2.5 per gen.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Mean allele frequency, Expected heterozygosity within populations and Expected heterozygosity overall are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Allele frequency in population 1 left as a guess.</strong> Anything typed into Allele frequency in population 1 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Allele frequency in population 2 left as a guess.</strong> Anything typed into Allele frequency in population 2 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Sample size, population 1 left as a guess.</strong> Anything typed into Sample size, population 1 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Allele frequency in population 1 and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Allele frequency in population 1</strong> takes a plain number with no unit attached. It feeds Mean allele frequency, Expected heterozygosity within populations and Expected heterozygosity overall. Have it to hand before you start: Allele frequency in population 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Allele frequency in population 2</strong> takes a plain number with no unit attached. It feeds Mean allele frequency, Expected heterozygosity within populations and Expected heterozygosity overall. Have it to hand before you start: Allele frequency in population 2 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Sample size, population 1</strong> takes a plain number with no unit attached. It feeds Mean allele frequency, Expected heterozygosity overall and Fst. Have it to hand before you start: Sample size, population 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Sample size, population 2</strong> takes a plain number with no unit attached. It feeds Mean allele frequency, Expected heterozygosity overall and Fst. Have it to hand before you start: Sample size, population 2 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Mean allele frequency</strong> is a plain number and the page's own defaults put it at 0.45. It is worked out from Allele frequency in population 1, Sample size, population 1, Allele frequency in population 2 and Sample size, population 2. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Expected heterozygosity within populations</strong> is a plain number and the page's own defaults put it at 0.37. It is worked out from Allele frequency in population 1 and Allele frequency in population 2. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Expected heterozygosity overall</strong> is a plain number and the page's own defaults put it at 0.495. It is worked out from Allele frequency in population 1, Sample size, population 1, Allele frequency in population 2 and Sample size, population 2. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Fst</strong> is a plain number and the page's own defaults put it at 0.253. It is worked out from Allele frequency in population 1, Sample size, population 1, Allele frequency in population 2 and Sample size, population 2. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Migrants per generation implied by Fst</strong> is a plain number and the page's own defaults put it at 0.74. It is worked out from Allele frequency in population 1, Sample size, population 1, Allele frequency in population 2 and Sample size, population 2. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Mean allele frequency</th><th>Expected heterozygosity within populations</th><th>Expected heterozygosity overall</th><th>Fst</th><th>Migrants per generation implied by Fst</th></tr></thead><tbody><tr><td><strong>Allele frequency in population 1</strong> +10%</td><td>+2.22%</td><td>+3.14%</td><td>+0.36%</td><td>-8.17%</td><td>+11.91%</td></tr><tr><td><strong>Allele frequency in population 2</strong> +10%</td><td>+7.78%</td><td>-8.89%</td><td>+0.92%</td><td>+28.78%</td><td>-29.9%</td></tr><tr><td><strong>Sample size, population 1</strong> +10%</td><td>-2.65%</td><td>+0%</td><td>-0.54%</td><td>-1.6%</td><td>+2.18%</td></tr><tr><td><strong>Sample size, population 2</strong> +10%</td><td>+2.65%</td><td>+0%</td><td>+0.42%</td><td>+1.25%</td><td>-1.65%</td></tr></tbody></table><p>The steepest column belongs to Allele frequency in population 2: ten per cent there moves an answer by about 29.9 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Mean allele frequency is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Allele frequency in population 1, Allele frequency in population 2 and Sample size, population 1 are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
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
            Allele frequency in population 1, Allele frequency in population 2, Sample size, population 1, Sample size, population 2. With allele frequency in population 1, allele frequency in population 2 and sample size, population 1 in place, Mean allele frequency can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Mean allele frequency, Expected heterozygosity within populations, Expected heterozygosity overall and Fst blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Mean allele frequency = 0.45, Expected heterozygosity within populations = 0.37, Expected heterozygosity overall = 0.495, Fst = 0.253 and Migrants per generation implied by Fst = 0.74 per gen. That comes from the page's own defaults, entered in Allele frequency in population 1; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Mean allele frequency is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
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
