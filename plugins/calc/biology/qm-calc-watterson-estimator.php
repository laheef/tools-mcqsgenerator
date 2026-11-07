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
    Watterson Estimator Calculator reports watterson θ (per locus), θ per site, watterson θ per kb and harmonic number a₁ (n − 1). Any box can be the unknown.
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
        Enter Segregating sites, Sequence length and Number of sequences into Watterson Estimator and the answer comes back as Watterson θ (per locus) and θ per site. Nothing is looked up on this page: watterson θ (per locus) is computed from segregating sites and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Watterson Estimator calculator works', 'html' => <<<'TXT'
            <p>Watterson Estimator answers one question from 3 numbers, and the answer is Watterson θ (per locus), θ per site and Watterson θ per kb.</p><p>Written with the labels from the form, Harmonic number a₁ (n − 1) = ln(max(Number of sequences,2) − 1) + 0.577 + 1 ÷ (2 × (max(Number of sequences,2) − 1)) − 1 ÷ (12 × (max(Number of sequences,2) − 1) × (max(Number of sequences,2) − 1)).</p><p>The answers are Watterson θ (per locus), θ per site, Watterson θ per kb and Harmonic number a₁ (n − 1); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Segregating sites</strong> — a plain number, no unit. Columns that vary</li><li><strong>Sequence length</strong> — in bp</li><li><strong>Number of sequences</strong> — a plain number, no unit</li></ul><p>The answers come back as Watterson θ (per locus), θ per site, Watterson θ per kb, Harmonic number a₁ (n − 1). Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Segregating sites = 24, Sequence length = 1000 bp and Number of sequences = 20; the answers are <strong>Harmonic number a₁ (n − 1)</strong> = 3.55, <strong>Watterson θ (per locus)</strong> = 6.76, <strong>θ per site</strong> = 0.007 and <strong>Watterson θ per kb</strong> = 6.76.</p><ul><li><strong>Harmonic number a₁ (n − 1)</strong> = 3.55</li><li><strong>Watterson θ (per locus)</strong> = 6.76</li><li><strong>θ per site</strong> = 0.007</li><li><strong>Watterson θ per kb</strong> = 6.76</li></ul><p>The line behind those figures is <strong>Harmonic number a₁ (n − 1)</strong> = <code>ln(max(Number of sequences,2) − 1) + 0.577 + 1 ÷ (2 × (max(Number of sequences,2) − 1)) − 1 ÷ (12 × (max(Number of sequences,2) − 1) × (max(Number of sequences,2) − 1))</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Harmonic number a₁ (n − 1)</strong> = 3.55, <strong>Watterson θ (per locus)</strong> = 6.76, <strong>θ per site</strong> = 0.007 and <strong>Watterson θ per kb</strong> = 6.76. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Watterson θ (per locus) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Harmonic number a₁ (n − 1)</strong> = <code>ln(max(Number of sequences,2) − 1) + 0.577 + 1 ÷ (2 × (max(Number of sequences,2) − 1)) − 1 ÷ (12 × (max(Number of sequences,2) − 1) × (max(Number of sequences,2) − 1))</code></li><li><strong>Watterson θ (per locus)</strong> = <code>Segregating sites ÷ (ln(max(Number of sequences,2) − 1) + 0.577 + 1 ÷ (2 × (max(Number of sequences,2) − 1)) − 1 ÷ (12 × (max(Number of sequences,2) − 1) × (max(Number of sequences,2) − 1)))</code></li><li><strong>θ per site</strong> = <code>Segregating sites ÷ (ln(max(Number of sequences,2) − 1) + 0.577 + 1 ÷ (2 × (max(Number of sequences,2) − 1)) − 1 ÷ (12 × (max(Number of sequences,2) − 1) × (max(Number of sequences,2) − 1))) ÷ Sequence length</code></li><li><strong>Watterson θ per kb</strong> = <code>Segregating sites ÷ (ln(max(Number of sequences,2) − 1) + 0.577 + 1 ÷ (2 × (max(Number of sequences,2) − 1)) − 1 ÷ (12 × (max(Number of sequences,2) − 1) × (max(Number of sequences,2) − 1))) ÷ Sequence length × 1000</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Harmonic number a₁ (n − 1)</strong> = <code>ln(max(Number of sequences,2) − 1) + 0.577 + 1 ÷ (2 × (max(Number of sequences,2) − 1)) − 1 ÷ (12 × (max(Number of sequences,2) − 1) × (max(Number of sequences,2) − 1))</code> — the form to use when Number of sequences are the values you have.</li><li><strong>Watterson θ (per locus)</strong> = <code>Segregating sites ÷ (ln(max(Number of sequences,2) − 1) + 0.577 + 1 ÷ (2 × (max(Number of sequences,2) − 1)) − 1 ÷ (12 × (max(Number of sequences,2) − 1) × (max(Number of sequences,2) − 1)))</code> — the form to use when Segregating sites and Number of sequences are the values you have.</li><li><strong>θ per site</strong> = <code>Segregating sites ÷ (ln(max(Number of sequences,2) − 1) + 0.577 + 1 ÷ (2 × (max(Number of sequences,2) − 1)) − 1 ÷ (12 × (max(Number of sequences,2) − 1) × (max(Number of sequences,2) − 1))) ÷ Sequence length</code> — the form to use when Segregating sites, Number of sequences and Sequence length are the values you have.</li><li><strong>Watterson θ per kb</strong> = <code>Segregating sites ÷ (ln(max(Number of sequences,2) − 1) + 0.577 + 1 ÷ (2 × (max(Number of sequences,2) − 1)) − 1 ÷ (12 × (max(Number of sequences,2) − 1) × (max(Number of sequences,2) − 1))) ÷ Sequence length × 1000</code> — the form to use when Segregating sites, Number of sequences and Sequence length are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Harmonic number a₁ (n − 1), Watterson θ (per locus) and θ per site can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Segregating sites, from 24 to 48 — and the answers go from <strong>Harmonic number a₁ (n − 1)</strong> 3.55, <strong>Watterson θ (per locus)</strong> 6.76, <strong>θ per site</strong> 0.007 and <strong>Watterson θ per kb</strong> 6.76 to <strong>Harmonic number a₁ (n − 1)</strong> 3.55, <strong>Watterson θ (per locus)</strong> 13.53, <strong>θ per site</strong> 0.013 and <strong>Watterson θ per kb</strong> 13.53.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Watterson θ (per locus), θ per site and Watterson θ per kb are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Segregating sites left as a guess.</strong> Anything typed into Segregating sites is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Sequence length left as a guess.</strong> Anything typed into Sequence length is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Number of sequences left as a guess.</strong> Anything typed into Number of sequences is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Segregating sites and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Segregating sites</strong> takes a plain number with no unit attached. Columns that vary. The page reads it when it works out Watterson θ (per locus), θ per site and Watterson θ per kb. Have it to hand before you start: Segregating sites is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Sequence length</strong> is measured in bp. The page reads it when it works out θ per site and Watterson θ per kb. Have it to hand before you start: Sequence length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of sequences</strong> takes a plain number with no unit attached. The page reads it when it works out Harmonic number a₁ (n − 1), Watterson θ (per locus) and θ per site. Have it to hand before you start: Number of sequences is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Watterson θ (per locus)</strong> is a plain number and the page's own defaults put it at 6.76. It is worked out from Segregating sites and Number of sequences. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>θ per site</strong> is a plain number and the page's own defaults put it at 0.007. It is worked out from Segregating sites, Number of sequences and Sequence length. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Watterson θ per kb</strong> is a plain number and the page's own defaults put it at 6.76. It is worked out from Segregating sites, Number of sequences and Sequence length. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Harmonic number a₁ (n − 1)</strong> is a plain number and the page's own defaults put it at 3.55. It is worked out from Number of sequences. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Harmonic number a₁ (n − 1)</th><th>Watterson θ (per locus)</th><th>θ per site</th><th>Watterson θ per kb</th></tr></thead><tbody><tr><td><strong>Segregating sites</strong> +10%</td><td>+0%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Sequence length</strong> +10%</td><td>+0%</td><td>+0%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>Number of sequences</strong> +10%</td><td>+2.75%</td><td>-2.68%</td><td>-2.68%</td><td>-2.68%</td></tr></tbody></table><p>The steepest column belongs to Segregating sites: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Segregating sites = 12, Sequence length = 500 bp and Number of sequences = 10, the answer is <strong>Harmonic number a₁ (n − 1)</strong> = 2.83, <strong>Watterson θ (per locus)</strong> = 4.24, <strong>θ per site</strong> = 0.009 and <strong>Watterson θ per kb</strong> = 8.48.</li><li>With Segregating sites = 72, Sequence length = 1000 bp and Number of sequences = 20, the answer is <strong>Harmonic number a₁ (n − 1)</strong> = 3.55, <strong>Watterson θ (per locus)</strong> = 20.29, <strong>θ per site</strong> = 0.02 and <strong>Watterson θ per kb</strong> = 20.29.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Watterson θ (per locus) is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Segregating sites, Sequence length and Number of sequences are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Segregating sites, Sequence length and Number of sequences measured, Watterson θ (per locus) and θ per site wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/cell-dilution">Cell dilution Calculator</a>, <a href="/biology/cell-doubling-time">Cell doubling time Calculator</a> and <a href="/biology/cell-seeding-density">Cell Seeding Density Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Watterson Estimator calculator work out?', 'a' => <<<'TXT'
            Watterson θ (per locus), θ per site, Watterson θ per kb and Harmonic number a₁ (n − 1), from Number of sequences. The relationship is Harmonic number a₁ (n − 1) = ln(max(Number of sequences,2) − 1) + 0.577 + 1 ÷ (2 × (max(Number of sequences,2) − 1)) − 1 ÷ (12 × (max(Number of sequences,2) − 1) × (max(Number of sequences,2) − 1)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Segregating sites, Sequence length (bp), Number of sequences. Fill segregating sites, sequence length and number of sequences and leave Watterson θ (per locus) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Harmonic number a₁ (n − 1), Watterson θ (per locus), θ per site and Watterson θ per kb can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Harmonic number a₁ (n − 1) = 3.55, Watterson θ (per locus) = 6.76, θ per site = 0.007 and Watterson θ per kb = 6.76. That comes from the page's own defaults, entered in Segregating sites; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Watterson θ (per locus) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Segregating sites left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Watterson θ (per locus) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cell-dilution', 'name' => 'Cell dilution Calculator'],
            ['path' => '/biology/cell-doubling-time', 'name' => 'Cell doubling time Calculator'],
            ['path' => '/biology/cell-seeding-density', 'name' => 'Cell Seeding Density Calculator'],
        ],
        'authors' => [],
    ],
];
