<?php

/**
 * Hardy–Weinberg from the Recessive Allele Frequency
 * /biology/hardy-weinberg-recessive-allele
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hardy–Weinberg from the Recessive Allele Frequency',
    'meta' => ['title' => 'Hardy–Weinberg from the Recessive Allele Frequency', 'description' => <<<'TXT'
    If you already know q, the recessive allele's frequency, the rest follows directly: p is 1 − q, and the genotype frequencies are p², 2pq and q². Free hardy–we
    TXT, 'h1' => 'Hardy–Weinberg from the Recessive Allele Frequency', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'q',
                            'label' => 'Recessive allele frequency (q)',
                            'type' => 'number',
                            'help' => 'Between 0 and 1',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.2',
                        ],
                        [
                            'name' => 'p',
                            'label' => 'Dominant allele frequency (p)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'aa',
                            'label' => 'AA frequency',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ab',
                            'label' => 'Aa frequency (carriers)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bb',
                            'label' => 'aa frequency (affected)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'carrier_ratio',
                            'label' => 'Carriers per affected individual',
                            'type' => 'number',
                            'suffix' => ':1',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pct',
                            'label' => 'Affected share of the population',
                            'type' => 'number',
                            'suffix' => '%',
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
            'title' => 'Genotypes',
            'results' => [
                'p' => '1-q',
                'aa' => '(1-q)*(1-q)',
                'ab' => '2*(1-q)*q',
                'bb' => 'q*q',
                'carrier_ratio' => '2*(1-q)*q/(q*q)',
                'pct' => 'q*q*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Hardy–Weinberg from the Recessive Allele Frequency works out Dominant allele frequency (p) and AA frequency from Recessive allele frequency (q). The arithmetic is the whole method: Dominant allele frequency (p) is worked out from Recessive allele frequency (q) by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Hardy–Weinberg from the Recessive Allele Frequency calculator works', 'html' => <<<'TXT'
            <p>Hardy–Weinberg from the Recessive Allele Frequency answers one question from 1 number, and the answer is Dominant allele frequency (p), AA frequency and Aa frequency (carriers).</p><p>Written with the labels from the form, Dominant allele frequency (p) = 1 − Recessive allele frequency (q).</p><p>The result panel carries Dominant allele frequency (p), AA frequency, Aa frequency (carriers) and aa frequency (affected), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Recessive allele frequency (q)</strong> — a plain number, no unit. Between 0 and 1</li></ul><p>What you get back is Dominant allele frequency (p), AA frequency, Aa frequency (carriers), aa frequency (affected), Carriers per affected individual in:1, Affected share of the population in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Recessive allele frequency (q) = 0.2 — through the same formula and the panel reports &lt;strong&gt;Dominant allele frequency (p)&lt;/strong&gt; = 0.8, &lt;strong&gt;AA frequency&lt;/strong&gt; = 0.64, &lt;strong&gt;Aa frequency (carriers)&lt;/strong&gt; = 0.32, &lt;strong&gt;aa frequency (affected)&lt;/strong&gt; = 0.04, &lt;strong&gt;Carriers per affected individual&lt;/strong&gt; = 8:1 and &lt;strong&gt;Affected share of the population&lt;/strong&gt; = 4 %.</p><ul><li><strong>Dominant allele frequency (p)</strong> = 0.8</li><li><strong>AA frequency</strong> = 0.64</li><li><strong>Aa frequency (carriers)</strong> = 0.32</li><li><strong>aa frequency (affected)</strong> = 0.04</li><li><strong>Carriers per affected individual</strong> = 8:1</li><li><strong>Affected share of the population</strong> = 4 %</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Dominant allele frequency (p)</strong> = <code>1 − Recessive allele frequency (q)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Dominant allele frequency (p)&lt;/strong&gt; = 0.8, &lt;strong&gt;AA frequency&lt;/strong&gt; = 0.64, &lt;strong&gt;Aa frequency (carriers)&lt;/strong&gt; = 0.32, &lt;strong&gt;aa frequency (affected)&lt;/strong&gt; = 0.04, &lt;strong&gt;Carriers per affected individual&lt;/strong&gt; = 8 and &lt;strong&gt;Affected share of the population&lt;/strong&gt; = 4. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Dominant allele frequency (p) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Dominant allele frequency (p)</strong> = <code>1 − Recessive allele frequency (q)</code></li><li><strong>AA frequency</strong> = <code>(1 − Recessive allele frequency (q)) × (1 − Recessive allele frequency (q))</code></li><li><strong>Aa frequency (carriers)</strong> = <code>2 × (1 − Recessive allele frequency (q)) × Recessive allele frequency (q)</code></li><li><strong>aa frequency (affected)</strong> = <code>Recessive allele frequency (q) × Recessive allele frequency (q)</code></li><li><strong>Carriers per affected individual</strong> = <code>2 × (1 − Recessive allele frequency (q)) × Recessive allele frequency (q) ÷ (Recessive allele frequency (q) × Recessive allele frequency (q))</code></li><li><strong>Affected share of the population</strong> = <code>Recessive allele frequency (q) × Recessive allele frequency (q) × 100</code></li></ul><p>Any one of Dominant allele frequency (p), AA frequency and Aa frequency (carriers) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Recessive allele frequency (q), from 0.2 to 0.4 — and the answers go from &lt;strong&gt;Dominant allele frequency (p)&lt;/strong&gt; 0.8, &lt;strong&gt;AA frequency&lt;/strong&gt; 0.64, &lt;strong&gt;Aa frequency (carriers)&lt;/strong&gt; 0.32, &lt;strong&gt;aa frequency (affected)&lt;/strong&gt; 0.04, &lt;strong&gt;Carriers per affected individual&lt;/strong&gt; 8:1 and &lt;strong&gt;Affected share of the population&lt;/strong&gt; 4 % to &lt;strong&gt;Dominant allele frequency (p)&lt;/strong&gt; 0.6, &lt;strong&gt;AA frequency&lt;/strong&gt; 0.36, &lt;strong&gt;Aa frequency (carriers)&lt;/strong&gt; 0.48, &lt;strong&gt;aa frequency (affected)&lt;/strong&gt; 0.16, &lt;strong&gt;Carriers per affected individual&lt;/strong&gt; 3:1 and &lt;strong&gt;Affected share of the population&lt;/strong&gt; 16 %.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Dominant allele frequency (p), AA frequency and Aa frequency (carriers) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Recessive allele frequency (q) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Recessive allele frequency (q) is what you already know and Dominant allele frequency (p) and AA frequency is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/punnett-square">Punnett square Calculator</a>, <a href="/biology/puppy-adult-weight-predictor">Puppy Adult Weight Predictor Calculator</a> and <a href="/biology/q10-temperature-coefficient">Q10 Temperature Coefficient Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hardy–Weinberg from the Recessive Allele Frequency calculator work out?', 'a' => <<<'TXT'
            Dominant allele frequency (p), AA frequency, Aa frequency (carriers) and aa frequency (affected), from Recessive allele frequency (q). The relationship is Dominant allele frequency (p) = 1 − Recessive allele frequency (q).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Recessive allele frequency (q). Fill q and leave Dominant allele frequency (p) empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Dominant allele frequency (p), AA frequency, Aa frequency (carriers) and aa frequency (affected) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Dominant allele frequency (p) = 0.8, AA frequency = 0.64, Aa frequency (carriers) = 0.32, aa frequency (affected) = 0.04, Carriers per affected individual = 8:1 and Affected share of the population = 4 %. That comes from the page's own defaults, entered in Recessive allele frequency (q); change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Dominant allele frequency (p) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Recessive allele frequency (q) blank and the page solves for it, reporting Dominant allele frequency (p) instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Dominant allele frequency (p) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/punnett-square', 'name' => 'Punnett square Calculator'],
            ['path' => '/biology/puppy-adult-weight-predictor', 'name' => 'Puppy Adult Weight Predictor Calculator'],
            ['path' => '/biology/q10-temperature-coefficient', 'name' => 'Q10 Temperature Coefficient Calculator'],
        ],
        'authors' => [],
    ],
];
