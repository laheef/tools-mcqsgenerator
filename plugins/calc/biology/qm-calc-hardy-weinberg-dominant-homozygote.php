<?php

/**
 * Hardy–Weinberg from the Dominant Homozygote Frequency
 * /biology/hardy-weinberg-dominant-homozygote
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hardy–Weinberg from the Dominant Homozygote Frequency',
    'meta' => ['title' => 'Hardy–Weinberg from the Dominant Homozygote Frequency', 'description' => <<<'TXT'
    Hardy–Weinberg from the Dominant Homozygote Frequency turns homozygous dominant frequency (p²) into dominant allele frequency (p). Any box can be the unknown.
    TXT, 'h1' => 'Hardy–Weinberg from the Dominant Homozygote Frequency', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'homo_dom',
                            'label' => 'Homozygous dominant frequency (p²)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.49',
                        ],
                        [
                            'name' => 'p',
                            'label' => 'Dominant allele frequency (p)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'q',
                            'label' => 'Recessive allele frequency (q)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hetero',
                            'label' => 'Heterozygote frequency',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'affected',
                            'label' => 'Recessive homozygote frequency',
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
            'title' => 'Alleles',
            'results' => ['p' => 'sqrt(homo_dom)', 'q' => '1-sqrt(homo_dom)', 'hetero' => '2*sqrt(homo_dom)*(1-sqrt(homo_dom))', 'affected' => '(1-sqrt(homo_dom))*(1-sqrt(homo_dom))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Hardy–Weinberg from the Dominant Homozygote Frequency works out Dominant allele frequency (p) and Recessive allele frequency (q) from Homozygous dominant frequency (p²). Nothing is looked up on this page: dominant allele frequency (p) is computed from homozygous dominant frequency (p²) and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Hardy–Weinberg from the Dominant Homozygote Frequency calculator works', 'html' => <<<'TXT'
            <p>Hardy–Weinberg from the Dominant Homozygote Frequency answers one question from 1 number, and the answer is Dominant allele frequency (p), Recessive allele frequency (q) and Heterozygote frequency.</p><p>In the form&#039;s own words, Dominant allele frequency (p) = √(Homozygous dominant frequency (p²)).</p><p>What comes back is Dominant allele frequency (p), Recessive allele frequency (q), Heterozygote frequency and Recessive homozygote frequency — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Homozygous dominant frequency (p²)</strong> — a plain number, no unit</li></ul><p>The result boxes are Dominant allele frequency (p), Recessive allele frequency (q), Heterozygote frequency, Recessive homozygote frequency; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Homozygous dominant frequency (p²) = 0.49 — through the same formula and the panel reports <strong>Dominant allele frequency (p)</strong> = 0.7, <strong>Recessive allele frequency (q)</strong> = 0.3, <strong>Heterozygote frequency</strong> = 0.42 and <strong>Recessive homozygote frequency</strong> = 0.09.</p><ul><li><strong>Dominant allele frequency (p)</strong> = 0.7</li><li><strong>Recessive allele frequency (q)</strong> = 0.3</li><li><strong>Heterozygote frequency</strong> = 0.42</li><li><strong>Recessive homozygote frequency</strong> = 0.09</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Dominant allele frequency (p)</strong> = <code>√(Homozygous dominant frequency (p²))</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Dominant allele frequency (p)</strong> = 0.7, <strong>Recessive allele frequency (q)</strong> = 0.3, <strong>Heterozygote frequency</strong> = 0.42 and <strong>Recessive homozygote frequency</strong> = 0.09. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Dominant allele frequency (p) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Dominant allele frequency (p)</strong> = <code>√(Homozygous dominant frequency (p²))</code></li><li><strong>Recessive allele frequency (q)</strong> = <code>1 − √(Homozygous dominant frequency (p²))</code></li><li><strong>Heterozygote frequency</strong> = <code>2 × √(Homozygous dominant frequency (p²)) × (1 − √(Homozygous dominant frequency (p²)))</code></li><li><strong>Recessive homozygote frequency</strong> = <code>(1 − √(Homozygous dominant frequency (p²))) × (1 − √(Homozygous dominant frequency (p²)))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Dominant allele frequency (p)</strong> = <code>√(Homozygous dominant frequency (p²))</code> — the form to use when Homozygous dominant frequency (p²) are the values you have.</li><li><strong>Recessive allele frequency (q)</strong> = <code>1 − √(Homozygous dominant frequency (p²))</code> — the form to use when Homozygous dominant frequency (p²) are the values you have.</li><li><strong>Heterozygote frequency</strong> = <code>2 × √(Homozygous dominant frequency (p²)) × (1 − √(Homozygous dominant frequency (p²)))</code> — the form to use when Homozygous dominant frequency (p²) are the values you have.</li><li><strong>Recessive homozygote frequency</strong> = <code>(1 − √(Homozygous dominant frequency (p²))) × (1 − √(Homozygous dominant frequency (p²)))</code> — the form to use when Homozygous dominant frequency (p²) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Dominant allele frequency (p), Recessive allele frequency (q) and Heterozygote frequency can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Homozygous dominant frequency (p²), from 0.49 to 0.98 — and the answers go from <strong>Dominant allele frequency (p)</strong> 0.7, <strong>Recessive allele frequency (q)</strong> 0.3, <strong>Heterozygote frequency</strong> 0.42 and <strong>Recessive homozygote frequency</strong> 0.09 to <strong>Dominant allele frequency (p)</strong> 0.9899, <strong>Recessive allele frequency (q)</strong> 0.0101, <strong>Heterozygote frequency</strong> 0.0199 and <strong>Recessive homozygote frequency</strong> 1.010e-4.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Dominant allele frequency (p), Recessive allele frequency (q) and Heterozygote frequency are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Homozygous dominant frequency (p²) left as a guess.</strong> Anything typed into Homozygous dominant frequency (p²) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Homozygous dominant frequency (p²) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Homozygous dominant frequency (p²)</strong> takes a plain number with no unit attached. Change it and Dominant allele frequency (p), Recessive allele frequency (q) and Heterozygote frequency changes with it. Have it to hand before you start: Homozygous dominant frequency (p²) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Dominant allele frequency (p)</strong> is a plain number and the page's own defaults put it at 0.7. It is worked out from Homozygous dominant frequency (p²). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Recessive allele frequency (q)</strong> is a plain number and the page's own defaults put it at 0.3. It is worked out from Homozygous dominant frequency (p²). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Heterozygote frequency</strong> is a plain number and the page's own defaults put it at 0.42. It is worked out from Homozygous dominant frequency (p²). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Recessive homozygote frequency</strong> is a plain number and the page's own defaults put it at 0.09. It is worked out from Homozygous dominant frequency (p²). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Dominant allele frequency (p)</th><th>Recessive allele frequency (q)</th><th>Heterozygote frequency</th><th>Recessive homozygote frequency</th></tr></thead><tbody><tr><td><strong>Homozygous dominant frequency (p²)</strong> +10%</td><td>+4.88%</td><td>-11.39%</td><td>-7.06%</td><td>-21.48%</td></tr></tbody></table><p>The steepest column belongs to Homozygous dominant frequency (p²): ten per cent there moves an answer by about 21.5 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Homozygous dominant frequency (p²) = 0.245, the answer is <strong>Dominant allele frequency (p)</strong> = 0.495, <strong>Recessive allele frequency (q)</strong> = 0.505, <strong>Heterozygote frequency</strong> = 0.4999 and <strong>Recessive homozygote frequency</strong> = 0.2551.</li><li>With Homozygous dominant frequency (p²) = 1.47, the answer is <strong>Dominant allele frequency (p)</strong> = 1.21, <strong>Recessive allele frequency (q)</strong> = -0.2124, <strong>Heterozygote frequency</strong> = -0.5151 and <strong>Recessive homozygote frequency</strong> = 0.0451.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Dominant allele frequency (p) is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Homozygous dominant frequency (p²) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Homozygous dominant frequency (p²) and the number you are missing is Dominant allele frequency (p) and Recessive allele frequency (q).</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/mark-recapture">Mark-Recapture Population Calculator</a>, <a href="/biology/mark-recapture-population">Mark–Recapture Population (Lincoln–Petersen) Calculator</a> and <a href="/biology/mass-molarity-conversion">Mass to Molarity Converter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hardy–Weinberg from the Dominant Homozygote Frequency calculator work out?', 'a' => <<<'TXT'
            Dominant allele frequency (p), Recessive allele frequency (q), Heterozygote frequency and Recessive homozygote frequency, from Homozygous dominant frequency (p²). The relationship is Dominant allele frequency (p) = √(Homozygous dominant frequency (p²)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Homozygous dominant frequency (p²). Fill homozygous dominant frequency (p²) and leave Dominant allele frequency (p) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Dominant allele frequency (p), Recessive allele frequency (q), Heterozygote frequency and Recessive homozygote frequency can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Dominant allele frequency (p) = 0.7, Recessive allele frequency (q) = 0.3, Heterozygote frequency = 0.42 and Recessive homozygote frequency = 0.09. The figures come from Homozygous dominant frequency (p²) as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Dominant allele frequency (p) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Homozygous dominant frequency (p²) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Dominant allele frequency (p) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/mark-recapture', 'name' => 'Mark-Recapture Population Calculator'],
            ['path' => '/biology/mark-recapture-population', 'name' => 'Mark–Recapture Population (Lincoln–Petersen) Calculator'],
            ['path' => '/biology/mass-molarity-conversion', 'name' => 'Mass to Molarity Converter Calculator'],
        ],
        'authors' => [],
    ],
];
