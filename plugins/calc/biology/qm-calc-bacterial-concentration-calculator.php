<?php

/**
 * Bacterial Concentration Calculator
 * /biology/bacterial-concentration-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bacterial Concentration Calculator',
    'meta' => ['title' => 'Bacterial Concentration Calculator — Biology', 'description' => <<<'TXT'
    Bacterial Concentration works out Cells per mL (from OD) and log₁₀ CFU/mL from CFU per mL, OD600 and Cells per mL per OD unit. There is no hidden constant…
    TXT, 'h1' => 'Bacterial Concentration Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'cfu_ml',
                            'label' => 'CFU per mL',
                            'type' => 'number',
                            'suffix' => 'CFU/mL',
                            'help' => 'From a plate count',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5000000',
                        ],
                        [
                            'name' => 'od',
                            'label' => 'OD600',
                            'type' => 'number',
                            'help' => 'Optional cross-check',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.6',
                        ],
                        [
                            'name' => 'factor',
                            'label' => 'Cells per mL per OD unit',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '800000000.0',
                        ],
                        [
                            'name' => 'cells',
                            'label' => 'Cells per mL (from OD)',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'log_cfu',
                            'label' => 'log₁₀ CFU/mL',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Cells per CFU',
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
            'title' => 'Concentration',
            'results' => ['cells' => 'od*factor', 'log_cfu' => 'log10(cfu_ml)', 'ratio' => 'od*factor/cfu_ml'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Bacterial Concentration works out Cells per mL (from OD) and log₁₀ CFU/mL from CFU per mL, OD600 and Cells per mL per OD unit. There is no hidden constant here: change Cells per mL (from OD) and CFU per mL moves with it. The main result, Cells per mL (from OD), is reported in cells/mL.
        TXT,
        'sections' => [
            ['title' => 'How the Bacterial Concentration calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Bacterial Concentration: it takes 3 numbers and reports Cells per mL (from OD), log₁₀ CFU/mL and Cells per CFU.</p><p>Written with the labels from the form, Cells per mL (from OD) = OD600 × Cells per mL per OD unit.</p><p>What comes back is Cells per mL (from OD), log₁₀ CFU/mL and Cells per CFU — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>CFU per mL</strong> — in CFU/mL. From a plate count</li><li><strong>OD600</strong> — a plain number, no unit. Optional cross-check</li><li><strong>Cells per mL per OD unit</strong> — in cells/mL</li></ul><p>What you get back is Cells per mL (from OD) in cells/mL, log₁₀ CFU/mL, Cells per CFU, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, CFU per mL = 5.000e+6 CFU/mL, OD600 = 0.6 and Cells per mL per OD unit = 8.000e+8 cells/mL gives &lt;strong&gt;Cells per mL (from OD)&lt;/strong&gt; = 4.800e+8 cells/mL, &lt;strong&gt;log₁₀ CFU/mL&lt;/strong&gt; = 6.7 and &lt;strong&gt;Cells per CFU&lt;/strong&gt; = 96.</p><ul><li><strong>Cells per mL (from OD)</strong> = 4.800e+8 cells/mL</li><li><strong>log₁₀ CFU/mL</strong> = 6.7</li><li><strong>Cells per CFU</strong> = 96</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Cells per mL (from OD)</strong> = <code>OD600 × Cells per mL per OD unit</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Cells per mL (from OD)&lt;/strong&gt; = 4.800e+8, &lt;strong&gt;log₁₀ CFU/mL&lt;/strong&gt; = 6.7 and &lt;strong&gt;Cells per CFU&lt;/strong&gt; = 96. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Cells per mL (from OD) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Cells per mL (from OD)</strong> = <code>OD600 × Cells per mL per OD unit</code></li><li><strong>log₁₀ CFU/mL</strong> = <code>log₁₀(CFU per mL)</code></li><li><strong>Cells per CFU</strong> = <code>OD600 × Cells per mL per OD unit ÷ CFU per mL</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Cells per mL (from OD), log₁₀ CFU/mL and Cells per CFU can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double CFU per mL from 5.000e+6 to 1.000e+7, leaving every other box alone. The panel moves from &lt;strong&gt;Cells per mL (from OD)&lt;/strong&gt; 4.800e+8 cells/mL, &lt;strong&gt;log₁₀ CFU/mL&lt;/strong&gt; 6.7 and &lt;strong&gt;Cells per CFU&lt;/strong&gt; 96 to &lt;strong&gt;Cells per mL (from OD)&lt;/strong&gt; 4.800e+8 cells/mL, &lt;strong&gt;log₁₀ CFU/mL&lt;/strong&gt; 7 and &lt;strong&gt;Cells per CFU&lt;/strong&gt; 48.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Cells per mL (from OD), log₁₀ CFU/mL and Cells per CFU are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If CFU per mL is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are CFU per mL, OD600 and Cells per mL per OD unit and the number you are missing is Cells per mL (from OD) and log₁₀ CFU/mL.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/hunting-tooth-ratio">Hunting Tooth Ratio Calculator</a>, <a href="/biology/ideal-fish-tank-size">Ideal Fish Tank Size Calculator</a> and <a href="/biology/in-vivo-formulation">In Vivo Formulation Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bacterial Concentration calculator work out?', 'a' => <<<'TXT'
            Cells per mL (from OD), log₁₀ CFU/mL and Cells per CFU, from OD600 and Cells per mL per OD unit. The relationship is Cells per mL (from OD) = OD600 × Cells per mL per OD unit.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            CFU per mL (CFU/mL), OD600, Cells per mL per OD unit (cells/mL). With cfu_ml, od and factor in place, Cells per mL (from OD) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Cells per mL (from OD), log₁₀ CFU/mL and Cells per CFU can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Cells per mL (from OD) = 4.800e+8 cells/mL, log₁₀ CFU/mL = 6.7 and Cells per CFU = 96. Those are the defaults written into the form — move CFU per mL and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Cells per mL (from OD) is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave CFU per mL blank and the page solves for it, reporting Cells per mL (from OD) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Cells per mL (from OD) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/hunting-tooth-ratio', 'name' => 'Hunting Tooth Ratio Calculator'],
            ['path' => '/biology/ideal-fish-tank-size', 'name' => 'Ideal Fish Tank Size Calculator'],
            ['path' => '/biology/in-vivo-formulation', 'name' => 'In Vivo Formulation Calculator'],
        ],
        'authors' => [],
    ],
];
