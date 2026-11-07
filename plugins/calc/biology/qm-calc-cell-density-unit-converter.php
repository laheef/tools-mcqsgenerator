<?php

/**
 * Cell Density Unit Converter
 * /biology/cell-density-unit-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell Density Unit Converter',
    'meta' => ['title' => 'Cell Density Unit Converter — Formula & Results', 'description' => 'Enter Cell concentration into Cell Density Unit and the answer comes back as Cells per mL and Cells per µL. The arithmetic is the whole method: Cells per mL…', 'h1' => 'Cell Density Unit Converter', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'value',
                            'label' => 'Cell concentration',
                            'type' => 'number',
                            'suffix' => '×10⁶/mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.5',
                        ],
                        [
                            'name' => 'per_ml',
                            'label' => 'Cells per mL',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_ul',
                            'label' => 'Cells per µL',
                            'type' => 'number',
                            'suffix' => 'cells/µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'million',
                            'label' => 'Millions per mL',
                            'type' => 'number',
                            'suffix' => '×10⁶/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_l',
                            'label' => 'Cells per litre',
                            'type' => 'number',
                            'suffix' => 'cells/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'log_value',
                            'label' => 'log₁₀(cells/mL)',
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
            'title' => 'Conversion',
            'results' => [
                'per_ml' => 'value*1000000',
                'per_ul' => 'value*1000',
                'million' => 'value',
                'per_l' => 'value*1000000000',
                'log_value' => 'log10(value*1000000)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Cell concentration into Cell Density Unit and the answer comes back as Cells per mL and Cells per µL. The arithmetic is the whole method: Cells per mL is worked out from Cell concentration by one formula, applied once. Cells per mL comes back in cells/mL unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Cell Density Unit calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cell Density Unit: it takes 1 number and reports Cells per mL, Cells per µL and Millions per mL.</p><p>Written with the labels from the form, Cells per mL = Cell concentration × 1000000.</p><p>The answers are Cells per mL, Cells per µL, Millions per mL and Cells per litre; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Cell concentration</strong> — in ×10⁶/mL</li></ul><p>The result boxes are Cells per mL in cells/mL, Cells per µL in cells/µL, Millions per mL in ×10⁶/mL, Cells per litre in cells/L, log₁₀(cells/mL); they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Cell concentration = 1.5 ×10⁶/mL — through the same formula and the panel reports &lt;strong&gt;Cells per mL&lt;/strong&gt; = 1.500e+6 cells/mL, &lt;strong&gt;Cells per µL&lt;/strong&gt; = 1500 cells/µL, &lt;strong&gt;Millions per mL&lt;/strong&gt; = 1.5 ×10⁶/mL, &lt;strong&gt;Cells per litre&lt;/strong&gt; = 1.500e+9 cells/L and &lt;strong&gt;log₁₀(cells/mL)&lt;/strong&gt; = 6.18.</p><ul><li><strong>Cells per mL</strong> = 1.500e+6 cells/mL</li><li><strong>Cells per µL</strong> = 1500 cells/µL</li><li><strong>Millions per mL</strong> = 1.5 ×10⁶/mL</li><li><strong>Cells per litre</strong> = 1.500e+9 cells/L</li><li><strong>log₁₀(cells/mL)</strong> = 6.18</li></ul><p>That is <strong>Cells per mL</strong> = <code>Cell concentration × 1000000</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Cells per mL&lt;/strong&gt; = 1.500e+6, &lt;strong&gt;Cells per µL&lt;/strong&gt; = 1500, &lt;strong&gt;Millions per mL&lt;/strong&gt; = 1.5, &lt;strong&gt;Cells per litre&lt;/strong&gt; = 1.500e+9 and &lt;strong&gt;log₁₀(cells/mL)&lt;/strong&gt; = 6.18. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Cells per mL is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Cells per mL</strong> = <code>Cell concentration × 1000000</code></li><li><strong>Cells per µL</strong> = <code>Cell concentration × 1000</code></li><li><strong>Millions per mL</strong> = <code>Cell concentration</code></li><li><strong>Cells per litre</strong> = <code>Cell concentration × 1000000000</code></li><li><strong>log₁₀(cells/mL)</strong> = <code>log₁₀(Cell concentration × 1000000)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Cells per mL, Cells per µL and Millions per mL can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Cell concentration, from 1.5 to 3 — and the answers go from &lt;strong&gt;Cells per mL&lt;/strong&gt; 1.500e+6 cells/mL, &lt;strong&gt;Cells per µL&lt;/strong&gt; 1500 cells/µL, &lt;strong&gt;Millions per mL&lt;/strong&gt; 1.5 ×10⁶/mL, &lt;strong&gt;Cells per litre&lt;/strong&gt; 1.500e+9 cells/L and &lt;strong&gt;log₁₀(cells/mL)&lt;/strong&gt; 6.18 to &lt;strong&gt;Cells per mL&lt;/strong&gt; 3.000e+6 cells/mL, &lt;strong&gt;Cells per µL&lt;/strong&gt; 3000 cells/µL, &lt;strong&gt;Millions per mL&lt;/strong&gt; 3 ×10⁶/mL, &lt;strong&gt;Cells per litre&lt;/strong&gt; 3.000e+9 cells/L and &lt;strong&gt;log₁₀(cells/mL)&lt;/strong&gt; 6.48.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Cells per mL, Cells per µL and Millions per mL are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Cell concentration is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Cell concentration and the number you are missing is Cells per mL and Cells per µL.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/bird-age">Bird age</a>, <a href="/biology/bod-load">BOD Load Calculator</a> and <a href="/biology/bone-length-to-body-height">Bone Length to Body Height Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cell Density Unit calculator work out?', 'a' => 'Cells per mL, Cells per µL, Millions per mL and Cells per litre, from Cell concentration. The relationship is Cells per mL = Cell concentration × 1000000.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Cell concentration (×10⁶/mL). Enter value; Cells per mL is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Cells per mL, Cells per µL, Millions per mL and Cells per litre can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Cells per mL = 1.500e+6 cells/mL, Cells per µL = 1500 cells/µL, Millions per mL = 1.5 ×10⁶/mL, Cells per litre = 1.500e+9 cells/L and log₁₀(cells/mL) = 6.18. That comes from the page's own defaults, entered in Cell concentration; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Cells per mL is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Cell concentration left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Cells per mL keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/bird-age', 'name' => 'Bird age'],
            ['path' => '/biology/bod-load', 'name' => 'BOD Load Calculator'],
            ['path' => '/biology/bone-length-to-body-height', 'name' => 'Bone Length to Body Height Calculator'],
        ],
        'authors' => [],
    ],
];
