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
    'meta' => ['title' => 'Hardy–Weinberg from the Dominant Homozygote Frequency', 'description' => 'Hardy–Weinberg from the Dominant Homozygote Frequency works out Dominant allele frequency (p) and Recessive allele frequency (q) from Homozygous dominant…', 'h1' => 'Hardy–Weinberg from the Dominant Homozygote Frequency', 'updated' => '2026-10-29'],
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
        Hardy–Weinberg from the Dominant Homozygote Frequency works out Dominant allele frequency (p) and Recessive allele frequency (q) from Homozygous dominant frequency (p²). Nothing is looked up on this page: Dominant allele frequency (p) is computed from Homozygous dominant frequency (p²) and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Hardy–Weinberg from the Dominant Homozygote Frequency calculator works', 'html' => <<<'TXT'
            <p>Hardy–Weinberg from the Dominant Homozygote Frequency answers one question from 1 number, and the answer is Dominant allele frequency (p), Recessive allele frequency (q) and Heterozygote frequency.</p><p>In the form&#039;s own words, Dominant allele frequency (p) = √(Homozygous dominant frequency (p²)).</p><p>What comes back is Dominant allele frequency (p), Recessive allele frequency (q), Heterozygote frequency and Recessive homozygote frequency — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Homozygous dominant frequency (p²)</strong> — a plain number, no unit</li></ul><p>The result boxes are Dominant allele frequency (p), Recessive allele frequency (q), Heterozygote frequency, Recessive homozygote frequency; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Homozygous dominant frequency (p²) = 0.49 — through the same formula and the panel reports &lt;strong&gt;Dominant allele frequency (p)&lt;/strong&gt; = 0.7, &lt;strong&gt;Recessive allele frequency (q)&lt;/strong&gt; = 0.3, &lt;strong&gt;Heterozygote frequency&lt;/strong&gt; = 0.42 and &lt;strong&gt;Recessive homozygote frequency&lt;/strong&gt; = 0.09.</p><ul><li><strong>Dominant allele frequency (p)</strong> = 0.7</li><li><strong>Recessive allele frequency (q)</strong> = 0.3</li><li><strong>Heterozygote frequency</strong> = 0.42</li><li><strong>Recessive homozygote frequency</strong> = 0.09</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Dominant allele frequency (p)</strong> = <code>√(Homozygous dominant frequency (p²))</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Dominant allele frequency (p)&lt;/strong&gt; = 0.7, &lt;strong&gt;Recessive allele frequency (q)&lt;/strong&gt; = 0.3, &lt;strong&gt;Heterozygote frequency&lt;/strong&gt; = 0.42 and &lt;strong&gt;Recessive homozygote frequency&lt;/strong&gt; = 0.09. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Dominant allele frequency (p) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Dominant allele frequency (p)</strong> = <code>√(Homozygous dominant frequency (p²))</code></li><li><strong>Recessive allele frequency (q)</strong> = <code>1 − √(Homozygous dominant frequency (p²))</code></li><li><strong>Heterozygote frequency</strong> = <code>2 × √(Homozygous dominant frequency (p²)) × (1 − √(Homozygous dominant frequency (p²)))</code></li><li><strong>Recessive homozygote frequency</strong> = <code>(1 − √(Homozygous dominant frequency (p²))) × (1 − √(Homozygous dominant frequency (p²)))</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Dominant allele frequency (p), Recessive allele frequency (q) and Heterozygote frequency can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Homozygous dominant frequency (p²), from 0.49 to 0.98 — and the answers go from &lt;strong&gt;Dominant allele frequency (p)&lt;/strong&gt; 0.7, &lt;strong&gt;Recessive allele frequency (q)&lt;/strong&gt; 0.3, &lt;strong&gt;Heterozygote frequency&lt;/strong&gt; 0.42 and &lt;strong&gt;Recessive homozygote frequency&lt;/strong&gt; 0.09 to &lt;strong&gt;Dominant allele frequency (p)&lt;/strong&gt; 0.9899, &lt;strong&gt;Recessive allele frequency (q)&lt;/strong&gt; 0.0101, &lt;strong&gt;Heterozygote frequency&lt;/strong&gt; 0.0199 and &lt;strong&gt;Recessive homozygote frequency&lt;/strong&gt; 1.010e-4.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Dominant allele frequency (p), Recessive allele frequency (q) and Heterozygote frequency are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Homozygous dominant frequency (p²) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Homozygous dominant frequency (p²) and the number you are missing is Dominant allele frequency (p) and Recessive allele frequency (q).</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/mark-recapture">Mark-Recapture Population Calculator</a>, <a href="/biology/mark-recapture-population">Mark–Recapture Population (Lincoln–Petersen) Calculator</a> and <a href="/biology/mass-molarity-conversion">Mass to Molarity Converter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hardy–Weinberg from the Dominant Homozygote Frequency calculator work out?', 'a' => <<<'TXT'
            Dominant allele frequency (p), Recessive allele frequency (q), Heterozygote frequency and Recessive homozygote frequency, from Homozygous dominant frequency (p²). The relationship is Dominant allele frequency (p) = √(Homozygous dominant frequency (p²)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Homozygous dominant frequency (p²). Fill homo_dom and leave Dominant allele frequency (p) empty if you would rather have that one solved instead.'],
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
