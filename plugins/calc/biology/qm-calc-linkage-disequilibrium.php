<?php

/**
 * Linkage Disequilibrium Calculator
 * /biology/linkage-disequilibrium
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Linkage Disequilibrium Calculator',
    'meta' => ['title' => 'Linkage Disequilibrium Calculator — Formula & Results', 'description' => 'Linkage Disequilibrium Calculator takes frequency of allele A, Frequency of allele B and Frequency of haplotype AB and returns d′ (normalised) and r².', 'h1' => 'Linkage Disequilibrium Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'p_a',
                            'label' => 'Frequency of allele A',
                            'type' => 'number',
                            'help' => 'At the first locus',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.4',
                        ],
                        [
                            'name' => 'p_b',
                            'label' => 'Frequency of allele B',
                            'type' => 'number',
                            'help' => 'At the second locus',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.3',
                        ],
                        [
                            'name' => 'f_ab',
                            'label' => 'Frequency of haplotype AB',
                            'type' => 'number',
                            'help' => 'Observed in the sample',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.25',
                        ],
                        [
                            'name' => 'd',
                            'label' => 'D (coefficient of disequilibrium)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'd_prime',
                            'label' => 'D′ (normalised)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'r2',
                            'label' => 'r²',
                            'type' => 'number',
                            'help' => 'Above 0.8 means a good proxy marker',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'f_ab_expected',
                            'label' => 'Expected AB if independent',
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
            'title' => 'Disequilibrium',
            'results' => ['f_ab_expected' => 'p_a*p_b', 'd' => 'f_ab-p_a*p_b', 'd_prime' => '(f_ab-p_a*p_b)/if_else(f_ab-p_a*p_b>0,min(p_a*(1-p_b),(1-p_a)*p_b),min(p_a*p_b,(1-p_a)*(1-p_b)))', 'r2' => '(f_ab-p_a*p_b)^2/(p_a*(1-p_a)*p_b*(1-p_b))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Linkage Disequilibrium works out D (coefficient of disequilibrium) and D′ (normalised) from Frequency of allele A, Frequency of allele B and Frequency of haplotype AB. Nothing is looked up on this page: d (coefficient of disequilibrium) is computed from frequency of allele A and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Linkage Disequilibrium calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Linkage Disequilibrium: it takes 3 numbers and reports D (coefficient of disequilibrium), D′ (normalised) and r².</p><p>Written with the labels from the form, Expected AB if independent = Frequency of allele A × Frequency of allele B.</p><p>What comes back is D (coefficient of disequilibrium), D′ (normalised), r² and Expected AB if independent — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Frequency of allele A</strong> — a plain number, no unit. At the first locus</li><li><strong>Frequency of allele B</strong> — a plain number, no unit. At the second locus</li><li><strong>Frequency of haplotype AB</strong> — a plain number, no unit. Observed in the sample</li></ul><p>The answers come back as D (coefficient of disequilibrium), D′ (normalised), r², Expected AB if independent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Frequency of allele A = 0.4, Frequency of allele B = 0.3 and Frequency of haplotype AB = 0.25 gives <strong>Expected AB if independent</strong> = 0.12, <strong>D (coefficient of disequilibrium)</strong> = 0.13, <strong>D′ (normalised)</strong> = 0.7222 and <strong>r²</strong> = 0.3353.</p><ul><li><strong>Expected AB if independent</strong> = 0.12</li><li><strong>D (coefficient of disequilibrium)</strong> = 0.13</li><li><strong>D′ (normalised)</strong> = 0.7222</li><li><strong>r²</strong> = 0.3353</li></ul><p>That is <strong>Expected AB if independent</strong> = <code>Frequency of allele A × Frequency of allele B</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Expected AB if independent</strong> = 0.12, <strong>D (coefficient of disequilibrium)</strong> = 0.13, <strong>D′ (normalised)</strong> = 0.7222 and <strong>r²</strong> = 0.3353. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as D (coefficient of disequilibrium) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Expected AB if independent</strong> = <code>Frequency of allele A × Frequency of allele B</code></li><li><strong>D (coefficient of disequilibrium)</strong> = <code>Frequency of haplotype AB − Frequency of allele A × Frequency of allele B</code></li><li><strong>r²</strong> = <code>(Frequency of haplotype AB − Frequency of allele A × Frequency of allele B) ^ 2 ÷ (Frequency of allele A × (1 − Frequency of allele A) × Frequency of allele B × (1 − Frequency of allele B))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Expected AB if independent</strong> = <code>Frequency of allele A × Frequency of allele B</code> — the form to use when Frequency of allele A and Frequency of allele B are the values you have.</li><li><strong>D (coefficient of disequilibrium)</strong> = <code>Frequency of haplotype AB − Frequency of allele A × Frequency of allele B</code> — the form to use when Frequency of haplotype AB, Frequency of allele A and Frequency of allele B are the values you have.</li><li><strong>r²</strong> = <code>(Frequency of haplotype AB − Frequency of allele A × Frequency of allele B) ^ 2 ÷ (Frequency of allele A × (1 − Frequency of allele A) × Frequency of allele B × (1 − Frequency of allele B))</code> — the form to use when Frequency of haplotype AB, Frequency of allele A and Frequency of allele B are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Expected AB if independent, D (coefficient of disequilibrium) and D′ (normalised) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Frequency of allele A, from 0.4 to 0.8 — and the answers go from <strong>Expected AB if independent</strong> 0.12, <strong>D (coefficient of disequilibrium)</strong> 0.13, <strong>D′ (normalised)</strong> 0.7222 and <strong>r²</strong> 0.3353 to <strong>Expected AB if independent</strong> 0.24, <strong>D (coefficient of disequilibrium)</strong> 0.01, <strong>D′ (normalised)</strong> 0.1667 and <strong>r²</strong> 0.003.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> D (coefficient of disequilibrium), D′ (normalised) and r² are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Frequency of allele A left as a guess.</strong> Anything typed into Frequency of allele A is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Frequency of allele B left as a guess.</strong> Anything typed into Frequency of allele B is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Frequency of haplotype AB left as a guess.</strong> Anything typed into Frequency of haplotype AB is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Frequency of allele A and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Frequency of allele A</strong> takes a plain number with no unit attached. At the first locus. The page reads it when it works out Expected AB if independent, D (coefficient of disequilibrium) and D′ (normalised). Have it to hand before you start: Frequency of allele A is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Frequency of allele B</strong> takes a plain number with no unit attached. At the second locus. The page reads it when it works out Expected AB if independent, D (coefficient of disequilibrium) and D′ (normalised). Have it to hand before you start: Frequency of allele B is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Frequency of haplotype AB</strong> takes a plain number with no unit attached. Observed in the sample. The page reads it when it works out D (coefficient of disequilibrium), D′ (normalised) and r². Have it to hand before you start: Frequency of haplotype AB is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>D (coefficient of disequilibrium)</strong> is a plain number and the page's own defaults put it at 0.13. The value follows from Frequency of haplotype AB, Frequency of allele A and Frequency of allele B. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>D′ (normalised)</strong> is a plain number and the page's own defaults put it at 0.7222. The value follows from Frequency of haplotype AB, Frequency of allele A and Frequency of allele B. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>r²</strong> is a plain number and the page's own defaults put it at 0.3353. The value follows from Frequency of haplotype AB, Frequency of allele A and Frequency of allele B. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Expected AB if independent</strong> is a plain number and the page's own defaults put it at 0.12. The value follows from Frequency of allele A and Frequency of allele B. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Expected AB if independent</th><th>D (coefficient of disequilibrium)</th><th>D′ (normalised)</th><th>r²</th></tr></thead><tbody><tr><td><strong>Frequency of allele A</strong> +10%</td><td>+10%</td><td>-9.23%</td><td>-2.75%</td><td>-19.75%</td></tr><tr><td><strong>Frequency of allele B</strong> +10%</td><td>+10%</td><td>-9.23%</td><td>-17.48%</td><td>-21.75%</td></tr><tr><td><strong>Frequency of haplotype AB</strong> +10%</td><td>+0%</td><td>+19.23%</td><td>+19.23%</td><td>+42.16%</td></tr></tbody></table><p>The steepest column belongs to Frequency of haplotype AB: ten per cent there moves an answer by about 42.2 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Frequency of allele A = 0.2, Frequency of allele B = 0.15 and Frequency of haplotype AB = 0.125, the answer is <strong>Expected AB if independent</strong> = 0.03, <strong>D (coefficient of disequilibrium)</strong> = 0.095, <strong>D′ (normalised)</strong> = 0.7917 and <strong>r²</strong> = 0.4424.</li><li>With Frequency of allele A = 1.2, Frequency of allele B = 0.3 and Frequency of haplotype AB = 0.25, the answer is <strong>Expected AB if independent</strong> = 0.36, <strong>D (coefficient of disequilibrium)</strong> = -0.11, <strong>D′ (normalised)</strong> = 0.7857 and <strong>r²</strong> = -0.2401.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind D (coefficient of disequilibrium) is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Frequency of allele A, Frequency of allele B and Frequency of haplotype AB measured, D (coefficient of disequilibrium) and D′ (normalised) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/plants-per-hectare">Plants Per Hectare Calculator</a>, <a href="/biology/plasmid-copy-number">Plasmid Copy Number Calculator</a> and <a href="/biology/plasmid-molar-ratio">Plasmid Molar Ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Linkage Disequilibrium calculator work out?', 'a' => <<<'TXT'
            D (coefficient of disequilibrium), D′ (normalised), r² and Expected AB if independent, from Frequency of allele A and Frequency of allele B. The relationship is Expected AB if independent = Frequency of allele A × Frequency of allele B.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Frequency of allele A, Frequency of allele B, Frequency of haplotype AB. With frequency of allele A, frequency of allele B and frequency of haplotype AB in place, D (coefficient of disequilibrium) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Expected AB if independent, D (coefficient of disequilibrium), D′ (normalised) and r² can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Expected AB if independent = 0.12, D (coefficient of disequilibrium) = 0.13, D′ (normalised) = 0.7222 and r² = 0.3353. That comes from the page's own defaults, entered in Frequency of allele A; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of D (coefficient of disequilibrium) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Frequency of allele A left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. D (coefficient of disequilibrium) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/plants-per-hectare', 'name' => 'Plants Per Hectare Calculator'],
            ['path' => '/biology/plasmid-copy-number', 'name' => 'Plasmid Copy Number Calculator'],
            ['path' => '/biology/plasmid-molar-ratio', 'name' => 'Plasmid Molar Ratio Calculator'],
        ],
        'authors' => [],
    ],
];
