<?php

/**
 * Hardy–Weinberg from the Recessive Homozygote Frequency
 * /biology/hardy-weinberg-recessive-homozygote
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hardy–Weinberg from the Recessive Homozygote Frequency',
    'meta' => ['title' => 'Hardy–Weinberg from the Recessive Homozygote', 'description' => 'Hardy–Weinberg from the Recessive Homozygote Frequency takes Frequency of the recessive phenotype and returns Recessive allele frequency (q) and Dominant…', 'h1' => 'Hardy–Weinberg from the Recessive Homozygote Frequency', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'affected',
                            'label' => 'Frequency of the recessive phenotype',
                            'type' => 'number',
                            'help' => 'q², as a decimal',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.04',
                        ],
                        [
                            'name' => 'q',
                            'label' => 'Recessive allele frequency (q)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p',
                            'label' => 'Dominant allele frequency (p)',
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
                            'name' => 'homo_dom',
                            'label' => 'Homozygous dominant frequency',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'carriers_per_case',
                            'label' => 'Carriers per affected individual',
                            'type' => 'number',
                            'suffix' => ':1',
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
            'results' => [
                'q' => 'sqrt(affected)',
                'p' => '1-sqrt(affected)',
                'hetero' => '2*(1-sqrt(affected))*sqrt(affected)',
                'homo_dom' => '(1-sqrt(affected))*(1-sqrt(affected))',
                'carriers_per_case' => '2*(1-sqrt(affected))*sqrt(affected)/affected',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Hardy–Weinberg from the Recessive Homozygote Frequency takes Frequency of the recessive phenotype and returns Recessive allele frequency (q) and Dominant allele frequency (p). It is a single relationship that reads Recessive allele frequency (q) out of Frequency of the recessive phenotype, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Hardy–Weinberg from the Recessive Homozygote Frequency calculator works', 'html' => <<<'TXT'
            <p>Hardy–Weinberg from the Recessive Homozygote Frequency answers one question from 1 number, and the answer is Recessive allele frequency (q), Dominant allele frequency (p) and Heterozygote frequency.</p><p>Written with the labels from the form, Recessive allele frequency (q) = √(Frequency of the recessive phenotype).</p><p>What comes back is Recessive allele frequency (q), Dominant allele frequency (p), Heterozygote frequency and Homozygous dominant frequency — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Frequency of the recessive phenotype</strong> — a plain number, no unit. q², as a decimal</li></ul><p>The answers come back as Recessive allele frequency (q), Dominant allele frequency (p), Heterozygote frequency, Homozygous dominant frequency, Carriers per affected individual in:1. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Frequency of the recessive phenotype = 0.04 gives &lt;strong&gt;Recessive allele frequency (q)&lt;/strong&gt; = 0.2, &lt;strong&gt;Dominant allele frequency (p)&lt;/strong&gt; = 0.8, &lt;strong&gt;Heterozygote frequency&lt;/strong&gt; = 0.32, &lt;strong&gt;Homozygous dominant frequency&lt;/strong&gt; = 0.64 and &lt;strong&gt;Carriers per affected individual&lt;/strong&gt; = 8:1.</p><ul><li><strong>Recessive allele frequency (q)</strong> = 0.2</li><li><strong>Dominant allele frequency (p)</strong> = 0.8</li><li><strong>Heterozygote frequency</strong> = 0.32</li><li><strong>Homozygous dominant frequency</strong> = 0.64</li><li><strong>Carriers per affected individual</strong> = 8:1</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Recessive allele frequency (q)</strong> = <code>√(Frequency of the recessive phenotype)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Recessive allele frequency (q)&lt;/strong&gt; = 0.2, &lt;strong&gt;Dominant allele frequency (p)&lt;/strong&gt; = 0.8, &lt;strong&gt;Heterozygote frequency&lt;/strong&gt; = 0.32, &lt;strong&gt;Homozygous dominant frequency&lt;/strong&gt; = 0.64 and &lt;strong&gt;Carriers per affected individual&lt;/strong&gt; = 8 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Recessive allele frequency (q) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Recessive allele frequency (q)</strong> = <code>√(Frequency of the recessive phenotype)</code></li><li><strong>Dominant allele frequency (p)</strong> = <code>1 − √(Frequency of the recessive phenotype)</code></li><li><strong>Heterozygote frequency</strong> = <code>2 × (1 − √(Frequency of the recessive phenotype)) × √(Frequency of the recessive phenotype)</code></li><li><strong>Homozygous dominant frequency</strong> = <code>(1 − √(Frequency of the recessive phenotype)) × (1 − √(Frequency of the recessive phenotype))</code></li><li><strong>Carriers per affected individual</strong> = <code>2 × (1 − √(Frequency of the recessive phenotype)) × √(Frequency of the recessive phenotype) ÷ Frequency of the recessive phenotype</code></li></ul><p>Any one of Recessive allele frequency (q), Dominant allele frequency (p) and Heterozygote frequency can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Frequency of the recessive phenotype from 0.04 to 0.08, leaving every other box alone. The panel moves from &lt;strong&gt;Recessive allele frequency (q)&lt;/strong&gt; 0.2, &lt;strong&gt;Dominant allele frequency (p)&lt;/strong&gt; 0.8, &lt;strong&gt;Heterozygote frequency&lt;/strong&gt; 0.32, &lt;strong&gt;Homozygous dominant frequency&lt;/strong&gt; 0.64 and &lt;strong&gt;Carriers per affected individual&lt;/strong&gt; 8:1 to &lt;strong&gt;Recessive allele frequency (q)&lt;/strong&gt; 0.2828, &lt;strong&gt;Dominant allele frequency (p)&lt;/strong&gt; 0.7172, &lt;strong&gt;Heterozygote frequency&lt;/strong&gt; 0.4057, &lt;strong&gt;Homozygous dominant frequency&lt;/strong&gt; 0.5143 and &lt;strong&gt;Carriers per affected individual&lt;/strong&gt; 5.07:1.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Recessive allele frequency (q), Dominant allele frequency (p) and Heterozygote frequency are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Frequency of the recessive phenotype is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Frequency of the recessive phenotype measured, Recessive allele frequency (q) and Dominant allele frequency (p) wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/sheep-gestation">Sheep gestation Calculator</a>, <a href="/biology/simpson-diversity-index">Simpson&#039;s Diversity Index Calculator</a> and <a href="/biology/svi-sludge-volume-index">Sludge Volume Index (SVI) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hardy–Weinberg from the Recessive Homozygote Frequency calculator work out?', 'a' => <<<'TXT'
            Recessive allele frequency (q), Dominant allele frequency (p), Heterozygote frequency and Homozygous dominant frequency, from Frequency of the recessive phenotype. The relationship is Recessive allele frequency (q) = √(Frequency of the recessive phenotype).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Frequency of the recessive phenotype. Enter affected; Recessive allele frequency (q) is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Recessive allele frequency (q), Dominant allele frequency (p), Heterozygote frequency and Homozygous dominant frequency blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Recessive allele frequency (q) = 0.2, Dominant allele frequency (p) = 0.8, Heterozygote frequency = 0.32, Homozygous dominant frequency = 0.64 and Carriers per affected individual = 8:1. The figures come from Frequency of the recessive phenotype as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Recessive allele frequency (q) is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Frequency of the recessive phenotype blank and the page solves for it, reporting Recessive allele frequency (q) instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Recessive allele frequency (q) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/sheep-gestation', 'name' => 'Sheep gestation Calculator'],
            ['path' => '/biology/simpson-diversity-index', 'name' => 'Simpson\'s Diversity Index Calculator'],
            ['path' => '/biology/svi-sludge-volume-index', 'name' => 'Sludge Volume Index (SVI) Calculator'],
        ],
        'authors' => [],
    ],
];
