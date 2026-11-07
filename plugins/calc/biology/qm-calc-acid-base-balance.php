<?php

/**
 * Acid–Base Balance Calculator (ABG)
 * /biology/acid-base-balance
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Acid–Base Balance Calculator (ABG)',
    'meta' => ['title' => 'Acid–Base Balance Calculator (ABG) — Biology', 'description' => <<<'TXT'
    Acid–Base Balance Calculator (ABG) works out Anion gap and Albumin-corrected gap from pH, PaCO₂ and Bicarbonate. Anion gap, Albumin-corrected gap, Expected…
    TXT, 'h1' => 'Acid–Base Balance Calculator (ABG)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'ph',
                            'label' => 'pH',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7.32',
                        ],
                        [
                            'name' => 'paco2',
                            'label' => 'PaCO₂',
                            'type' => 'number',
                            'suffix' => 'mmHg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '28',
                        ],
                        [
                            'name' => 'hco3',
                            'label' => 'Bicarbonate',
                            'type' => 'number',
                            'suffix' => 'mmol/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '14',
                        ],
                        [
                            'name' => 'na',
                            'label' => 'Sodium',
                            'type' => 'number',
                            'suffix' => 'mmol/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '140',
                        ],
                        [
                            'name' => 'cl',
                            'label' => 'Chloride',
                            'type' => 'number',
                            'suffix' => 'mmol/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '105',
                        ],
                        [
                            'name' => 'albumin',
                            'label' => 'Albumin',
                            'type' => 'number',
                            'suffix' => 'g/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'gap',
                            'label' => 'Anion gap',
                            'type' => 'number',
                            'suffix' => 'mmol/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gap_corrected',
                            'label' => 'Albumin-corrected gap',
                            'type' => 'number',
                            'suffix' => 'mmol/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'expected_co2',
                            'label' => 'Expected PaCO₂ (Winter\'s formula)',
                            'type' => 'number',
                            'suffix' => 'mmHg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'base_excess',
                            'label' => 'Base excess estimate',
                            'type' => 'number',
                            'suffix' => 'mmol/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'co2_gap',
                            'label' => 'Measured minus Winter-predicted PaCO2',
                            'type' => 'number',
                            'suffix' => 'mmHg',
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
            'title' => 'Acid–base',
            'results' => [
                'gap' => 'na-cl-hco3',
                'gap_corrected' => 'na-cl-hco3+2.5*(40-albumin/10)',
                'expected_co2' => '1.5*hco3+8',
                'base_excess' => '0.93*(hco3-24)+13.5*(ph-7.4)',
                'co2_gap' => 'paco2-(1.5*hco3+8)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Acid–Base Balance Calculator (ABG) works out Anion gap and Albumin-corrected gap from pH, PaCO₂ and Bicarbonate. Nothing is looked up on this page: Anion gap is computed from pH and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Anion gap is opened in mmol/L; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Acid–Base Balance Calculator (ABG) calculator works', 'html' => <<<'TXT'
            <p>Acid–Base Balance Calculator (ABG) answers one question from 6 numbers, and the answer is Anion gap, Albumin-corrected gap and Expected PaCO₂ (Winter&#039;s formula).</p><p>Written with the labels from the form, Anion gap = Sodium − Chloride − Bicarbonate.</p><p>What comes back is Anion gap, Albumin-corrected gap, Expected PaCO₂ (Winter&#039;s formula) and Base excess estimate — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 6 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>pH</strong> — a plain number, no unit</li><li><strong>PaCO₂</strong> — in mmHg</li><li><strong>Bicarbonate</strong> — in mmol/L</li><li><strong>Sodium</strong> — in mmol/L</li><li><strong>Chloride</strong> — in mmol/L</li><li><strong>Albumin</strong> — in g/L</li></ul><p>The result boxes are Anion gap in mmol/L, Albumin-corrected gap in mmol/L, Expected PaCO₂ (Winter&#039;s formula) in mmHg, Base excess estimate in mmol/L, Measured minus Winter-predicted PaCO2 in mmHg; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — pH = 7.32, PaCO₂ = 28 mmHg, Bicarbonate = 14 mmol/L, Sodium = 140 mmol/L, Chloride = 105 mmol/L and Albumin = 40 g/L — through the same formula and the panel reports &lt;strong&gt;Anion gap&lt;/strong&gt; = 21 mmol/L, &lt;strong&gt;Albumin-corrected gap&lt;/strong&gt; = 111 mmol/L, &lt;strong&gt;Expected PaCO₂ (Winter&amp;#039;s formula)&lt;/strong&gt; = 29 mmHg, &lt;strong&gt;Base excess estimate&lt;/strong&gt; = -10.38 mmol/L and &lt;strong&gt;Measured minus Winter-predicted PaCO2&lt;/strong&gt; = -1 mmHg.</p><ul><li><strong>Anion gap</strong> = 21 mmol/L</li><li><strong>Albumin-corrected gap</strong> = 111 mmol/L</li><li><strong>Expected PaCO₂ (Winter&#039;s formula)</strong> = 29 mmHg</li><li><strong>Base excess estimate</strong> = -10.38 mmol/L</li><li><strong>Measured minus Winter-predicted PaCO2</strong> = -1 mmHg</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Anion gap</strong> = <code>Sodium − Chloride − Bicarbonate</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Anion gap&lt;/strong&gt; = 21, &lt;strong&gt;Albumin-corrected gap&lt;/strong&gt; = 111, &lt;strong&gt;Expected PaCO₂ (Winter&amp;#039;s formula)&lt;/strong&gt; = 29, &lt;strong&gt;Base excess estimate&lt;/strong&gt; = -10.38 and &lt;strong&gt;Measured minus Winter-predicted PaCO2&lt;/strong&gt; = -1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Anion gap is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Anion gap</strong> = <code>Sodium − Chloride − Bicarbonate</code></li><li><strong>Albumin-corrected gap</strong> = <code>Sodium − Chloride − Bicarbonate + 2.5 × (40 − Albumin ÷ 10)</code></li><li><strong>Expected PaCO₂ (Winter&#039;s formula)</strong> = <code>1.5 × Bicarbonate + 8</code></li><li><strong>Base excess estimate</strong> = <code>0.93 × (Bicarbonate − 24) + 13.5 × (pH − 7.4)</code></li><li><strong>Measured minus Winter-predicted PaCO2</strong> = <code>PaCO₂ − (1.5 × Bicarbonate + 8)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Anion gap, Albumin-corrected gap and Expected PaCO₂ (Winter&#039;s formula) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — pH, from 7.32 to 14.64 — and the answers go from &lt;strong&gt;Anion gap&lt;/strong&gt; 21 mmol/L, &lt;strong&gt;Albumin-corrected gap&lt;/strong&gt; 111 mmol/L, &lt;strong&gt;Expected PaCO₂ (Winter&amp;#039;s formula)&lt;/strong&gt; 29 mmHg, &lt;strong&gt;Base excess estimate&lt;/strong&gt; -10.38 mmol/L and &lt;strong&gt;Measured minus Winter-predicted PaCO2&lt;/strong&gt; -1 mmHg to &lt;strong&gt;Anion gap&lt;/strong&gt; 21 mmol/L, &lt;strong&gt;Albumin-corrected gap&lt;/strong&gt; 111 mmol/L, &lt;strong&gt;Expected PaCO₂ (Winter&amp;#039;s formula)&lt;/strong&gt; 29 mmHg, &lt;strong&gt;Base excess estimate&lt;/strong&gt; 88.44 mmol/L and &lt;strong&gt;Measured minus Winter-predicted PaCO2&lt;/strong&gt; -1 mmHg.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Anion gap, Albumin-corrected gap and Expected PaCO₂ (Winter&#039;s formula) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in pH and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are pH, PaCO₂ and Bicarbonate and the number you are missing is Anion gap and Albumin-corrected gap.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/heritability-coefficient">Heritability Coefficient Calculator</a>, <a href="/biology/horse-gestation">Horse gestation Calculator</a> and <a href="/biology/horse-weight">Horse weight Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Acid–Base Balance Calculator (ABG) calculator work out?', 'a' => <<<'TXT'
            Anion gap, Albumin-corrected gap, Expected PaCO₂ (Winter's formula) and Base excess estimate, from Sodium, Chloride and Bicarbonate. The relationship is Anion gap = Sodium − Chloride − Bicarbonate.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            pH, PaCO₂ (mmHg), Bicarbonate (mmol/L), Sodium (mmol/L), Chloride (mmol/L). Fill ph, paco2 and hco3 and leave Anion gap empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Anion gap, Albumin-corrected gap, Expected PaCO₂ (Winter's formula) and Base excess estimate can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Anion gap = 21 mmol/L, Albumin-corrected gap = 111 mmol/L, Expected PaCO₂ (Winter's formula) = 29 mmHg, Base excess estimate = -10.38 mmol/L and Measured minus Winter-predicted PaCO2 = -1 mmHg. The figures come from pH as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Anion gap is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With pH left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Anion gap keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/heritability-coefficient', 'name' => 'Heritability Coefficient Calculator'],
            ['path' => '/biology/horse-gestation', 'name' => 'Horse gestation Calculator'],
            ['path' => '/biology/horse-weight', 'name' => 'Horse weight Calculator'],
        ],
        'authors' => [],
    ],
];
