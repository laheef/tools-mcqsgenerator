<?php

/**
 * Hardy–Weinberg from the Dominant Allele Frequency
 * /biology/hardy-weinberg-dominant-allele
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hardy–Weinberg from the Dominant Allele Frequency',
    'meta' => ['title' => 'Hardy–Weinberg from the Dominant Allele Frequency', 'description' => 'Hardy–Weinberg from the Dominant Allele Frequency takes Dominant allele frequency (p) and Sample size and returns Recessive allele frequency (q) and AA…', 'h1' => 'Hardy–Weinberg from the Dominant Allele Frequency', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'p',
                            'label' => 'Dominant allele frequency (p)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.8',
                        ],
                        [
                            'name' => 'n',
                            'label' => 'Sample size',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'q',
                            'label' => 'Recessive allele frequency (q)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'aa',
                            'label' => 'AA individuals expected',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ab',
                            'label' => 'Aa individuals expected',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bb',
                            'label' => 'aa individuals expected',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'carrier_pct',
                            'label' => 'Carriers',
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
                'q' => '1-p',
                'aa' => 'p*p*n',
                'ab' => '2*p*(1-p)*n',
                'bb' => '(1-p)*(1-p)*n',
                'carrier_pct' => '2*p*(1-p)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Hardy–Weinberg from the Dominant Allele Frequency takes Dominant allele frequency (p) and Sample size and returns Recessive allele frequency (q) and AA individuals expected. There is no hidden constant here: change Recessive allele frequency (q) and Dominant allele frequency (p) moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Hardy–Weinberg from the Dominant Allele Frequency calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Hardy–Weinberg from the Dominant Allele Frequency: it takes 2 numbers and reports Recessive allele frequency (q), AA individuals expected and Aa individuals expected.</p><p>The relationship it solves reads Recessive allele frequency (q) = 1 − Dominant allele frequency (p).</p><p>The result panel carries Recessive allele frequency (q), AA individuals expected, Aa individuals expected and aa individuals expected, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Dominant allele frequency (p)</strong> — a plain number, no unit</li><li><strong>Sample size</strong> — in individuals</li></ul><p>The answers come back as Recessive allele frequency (q), AA individuals expected in individuals, Aa individuals expected in individuals, aa individuals expected in individuals, Carriers in %. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Dominant allele frequency (p) = 0.8 and Sample size = 500 individuals; the answers are &lt;strong&gt;Recessive allele frequency (q)&lt;/strong&gt; = 0.2, &lt;strong&gt;AA individuals expected&lt;/strong&gt; = 320 individuals, &lt;strong&gt;Aa individuals expected&lt;/strong&gt; = 160 individuals, &lt;strong&gt;aa individuals expected&lt;/strong&gt; = 20 individuals and &lt;strong&gt;Carriers&lt;/strong&gt; = 32 %.</p><ul><li><strong>Recessive allele frequency (q)</strong> = 0.2</li><li><strong>AA individuals expected</strong> = 320 individuals</li><li><strong>Aa individuals expected</strong> = 160 individuals</li><li><strong>aa individuals expected</strong> = 20 individuals</li><li><strong>Carriers</strong> = 32 %</li></ul><p>That is <strong>Recessive allele frequency (q)</strong> = <code>1 − Dominant allele frequency (p)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Recessive allele frequency (q)&lt;/strong&gt; = 0.2, &lt;strong&gt;AA individuals expected&lt;/strong&gt; = 320, &lt;strong&gt;Aa individuals expected&lt;/strong&gt; = 160, &lt;strong&gt;aa individuals expected&lt;/strong&gt; = 20 and &lt;strong&gt;Carriers&lt;/strong&gt; = 32 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Recessive allele frequency (q) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Recessive allele frequency (q)</strong> = <code>1 − Dominant allele frequency (p)</code></li><li><strong>AA individuals expected</strong> = <code>Dominant allele frequency (p) × Dominant allele frequency (p) × Sample size</code></li><li><strong>Aa individuals expected</strong> = <code>2 × Dominant allele frequency (p) × (1 − Dominant allele frequency (p)) × Sample size</code></li><li><strong>aa individuals expected</strong> = <code>(1 − Dominant allele frequency (p)) × (1 − Dominant allele frequency (p)) × Sample size</code></li><li><strong>Carriers</strong> = <code>2 × Dominant allele frequency (p) × (1 − Dominant allele frequency (p)) × 100</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Recessive allele frequency (q), AA individuals expected and Aa individuals expected can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Dominant allele frequency (p) from 0.8 to 1.6, leaving every other box alone. The panel moves from &lt;strong&gt;Recessive allele frequency (q)&lt;/strong&gt; 0.2, &lt;strong&gt;AA individuals expected&lt;/strong&gt; 320 individuals, &lt;strong&gt;Aa individuals expected&lt;/strong&gt; 160 individuals, &lt;strong&gt;aa individuals expected&lt;/strong&gt; 20 individuals and &lt;strong&gt;Carriers&lt;/strong&gt; 32 % to &lt;strong&gt;Recessive allele frequency (q)&lt;/strong&gt; -0.6, &lt;strong&gt;AA individuals expected&lt;/strong&gt; 1280 individuals, &lt;strong&gt;Aa individuals expected&lt;/strong&gt; -960 individuals, &lt;strong&gt;aa individuals expected&lt;/strong&gt; 180 individuals and &lt;strong&gt;Carriers&lt;/strong&gt; -192 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Recessive allele frequency (q), AA individuals expected and Aa individuals expected are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Dominant allele frequency (p) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Dominant allele frequency (p) and Sample size is what you already know and Recessive allele frequency (q) and AA individuals expected is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/autosomal-dominant-pedigree">Autosomal Dominant Pedigree Analyzer Calculator</a>, <a href="/biology/autosomal-recessive-risk">Autosomal Recessive Inheritance Risk Calculator</a> and <a href="/biology/bacteria-growth">Bacteria growth Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hardy–Weinberg from the Dominant Allele Frequency calculator work out?', 'a' => <<<'TXT'
            Recessive allele frequency (q), AA individuals expected, Aa individuals expected and aa individuals expected, from Dominant allele frequency (p). The relationship is Recessive allele frequency (q) = 1 − Dominant allele frequency (p).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Dominant allele frequency (p), Sample size (individuals). Enter p and n; Recessive allele frequency (q) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Recessive allele frequency (q), AA individuals expected, Aa individuals expected and aa individuals expected can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Recessive allele frequency (q) = 0.2, AA individuals expected = 320 individuals, Aa individuals expected = 160 individuals, aa individuals expected = 20 individuals and Carriers = 32 %. That comes from the page's own defaults, entered in Dominant allele frequency (p); change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Recessive allele frequency (q) is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Dominant allele frequency (p) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Recessive allele frequency (q) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/autosomal-dominant-pedigree', 'name' => 'Autosomal Dominant Pedigree Analyzer Calculator'],
            ['path' => '/biology/autosomal-recessive-risk', 'name' => 'Autosomal Recessive Inheritance Risk Calculator'],
            ['path' => '/biology/bacteria-growth', 'name' => 'Bacteria growth Calculator'],
        ],
        'authors' => [],
    ],
];
