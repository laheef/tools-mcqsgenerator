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
    'meta' => ['title' => 'Acid–Base Balance Calculator (ABG) — Biology', 'description' => 'Acid–Base Balance Calculator (ABG) turns pH and PaCO₂ into anion gap and albumin-corrected gap. Every box can be solved for, not only the one in the title.', 'h1' => 'Acid–Base Balance Calculator (ABG)', 'updated' => '2026-10-29'],
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
        Acid–Base Balance Calculator (ABG) works out Anion gap and Albumin-corrected gap from pH, PaCO₂ and Bicarbonate. Nothing is looked up on this page: anion gap is computed from pH and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Anion gap is opened in mmol/L; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Acid–Base Balance Calculator (ABG) calculator works', 'html' => <<<'TXT'
            <p>Acid–Base Balance Calculator (ABG) answers one question from 6 numbers, and the answer is Anion gap, Albumin-corrected gap and Expected PaCO₂ (Winter&#039;s formula).</p><p>Written with the labels from the form, Anion gap = Sodium − Chloride − Bicarbonate.</p><p>What comes back is Anion gap, Albumin-corrected gap, Expected PaCO₂ (Winter&#039;s formula) and Base excess estimate — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 6 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>pH</strong> — a plain number, no unit</li><li><strong>PaCO₂</strong> — in mmHg</li><li><strong>Bicarbonate</strong> — in mmol/L</li><li><strong>Sodium</strong> — in mmol/L</li><li><strong>Chloride</strong> — in mmol/L</li><li><strong>Albumin</strong> — in g/L</li></ul><p>The result boxes are Anion gap in mmol/L, Albumin-corrected gap in mmol/L, Expected PaCO₂ (Winter&#039;s formula) in mmHg, Base excess estimate in mmol/L, Measured minus Winter-predicted PaCO2 in mmHg; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — pH = 7.32, PaCO₂ = 28 mmHg, Bicarbonate = 14 mmol/L, Sodium = 140 mmol/L, Chloride = 105 mmol/L and Albumin = 40 g/L — through the same formula and the panel reports <strong>Anion gap</strong> = 21 mmol/L, <strong>Albumin-corrected gap</strong> = 111 mmol/L, <strong>Expected PaCO₂ (Winter&amp;#039;s formula)</strong> = 29 mmHg, <strong>Base excess estimate</strong> = -10.38 mmol/L and <strong>Measured minus Winter-predicted PaCO2</strong> = -1 mmHg.</p><ul><li><strong>Anion gap</strong> = 21 mmol/L</li><li><strong>Albumin-corrected gap</strong> = 111 mmol/L</li><li><strong>Expected PaCO₂ (Winter&#039;s formula)</strong> = 29 mmHg</li><li><strong>Base excess estimate</strong> = -10.38 mmol/L</li><li><strong>Measured minus Winter-predicted PaCO2</strong> = -1 mmHg</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Anion gap</strong> = <code>Sodium − Chloride − Bicarbonate</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Anion gap</strong> = 21, <strong>Albumin-corrected gap</strong> = 111, <strong>Expected PaCO₂ (Winter&amp;#039;s formula)</strong> = 29, <strong>Base excess estimate</strong> = -10.38 and <strong>Measured minus Winter-predicted PaCO2</strong> = -1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Anion gap is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Anion gap</strong> = <code>Sodium − Chloride − Bicarbonate</code></li><li><strong>Albumin-corrected gap</strong> = <code>Sodium − Chloride − Bicarbonate + 2.5 × (40 − Albumin ÷ 10)</code></li><li><strong>Expected PaCO₂ (Winter&#039;s formula)</strong> = <code>1.5 × Bicarbonate + 8</code></li><li><strong>Base excess estimate</strong> = <code>0.93 × (Bicarbonate − 24) + 13.5 × (pH − 7.4)</code></li><li><strong>Measured minus Winter-predicted PaCO2</strong> = <code>PaCO₂ − (1.5 × Bicarbonate + 8)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Anion gap</strong> = <code>Sodium − Chloride − Bicarbonate</code> — the form to use when Sodium, Chloride and Bicarbonate are the values you have.</li><li><strong>Albumin-corrected gap</strong> = <code>Sodium − Chloride − Bicarbonate + 2.5 × (40 − Albumin ÷ 10)</code> — the form to use when Sodium, Chloride, Bicarbonate and Albumin are the values you have.</li><li><strong>Expected PaCO₂ (Winter&#039;s formula)</strong> = <code>1.5 × Bicarbonate + 8</code> — the form to use when Bicarbonate are the values you have.</li><li><strong>Base excess estimate</strong> = <code>0.93 × (Bicarbonate − 24) + 13.5 × (pH − 7.4)</code> — the form to use when Bicarbonate and pH are the values you have.</li><li><strong>Measured minus Winter-predicted PaCO2</strong> = <code>PaCO₂ − (1.5 × Bicarbonate + 8)</code> — the form to use when PaCO₂ and Bicarbonate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Anion gap, Albumin-corrected gap and Expected PaCO₂ (Winter&#039;s formula) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — pH, from 7.32 to 14.64 — and the answers go from <strong>Anion gap</strong> 21 mmol/L, <strong>Albumin-corrected gap</strong> 111 mmol/L, <strong>Expected PaCO₂ (Winter&amp;#039;s formula)</strong> 29 mmHg, <strong>Base excess estimate</strong> -10.38 mmol/L and <strong>Measured minus Winter-predicted PaCO2</strong> -1 mmHg to <strong>Anion gap</strong> 21 mmol/L, <strong>Albumin-corrected gap</strong> 111 mmol/L, <strong>Expected PaCO₂ (Winter&amp;#039;s formula)</strong> 29 mmHg, <strong>Base excess estimate</strong> 88.44 mmol/L and <strong>Measured minus Winter-predicted PaCO2</strong> -1 mmHg.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Anion gap, Albumin-corrected gap and Expected PaCO₂ (Winter&#039;s formula) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>pH left as a guess.</strong> Anything typed into pH is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>PaCO₂ left as a guess.</strong> Anything typed into PaCO₂ is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Bicarbonate left as a guess.</strong> Anything typed into Bicarbonate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in pH and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>pH</strong> takes a plain number with no unit attached. The page reads it when it works out Base excess estimate. Have it to hand before you start: pH is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>PaCO₂</strong> is measured in mmHg. The page reads it when it works out Measured minus Winter-predicted PaCO2. Have it to hand before you start: PaCO₂ is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Bicarbonate</strong> is measured in mmol/L. The page reads it when it works out Anion gap, Albumin-corrected gap and Expected PaCO₂ (Winter's formula). Have it to hand before you start: Bicarbonate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Sodium</strong> is measured in mmol/L. The page reads it when it works out Anion gap and Albumin-corrected gap. Have it to hand before you start: Sodium is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Chloride</strong> is measured in mmol/L. The page reads it when it works out Anion gap and Albumin-corrected gap. Have it to hand before you start: Chloride is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Albumin</strong> is measured in g/L. The page reads it when it works out Albumin-corrected gap. Have it to hand before you start: Albumin is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Anion gap</strong> is a plain number and the page's own defaults put it at 21. It is worked out from Sodium, Chloride and Bicarbonate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Albumin-corrected gap</strong> is a plain number and the page's own defaults put it at 111. It is worked out from Sodium, Chloride, Bicarbonate and Albumin. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Expected PaCO₂ (Winter&#039;s formula)</strong> is a plain number and the page's own defaults put it at 29. It is worked out from Bicarbonate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Base excess estimate</strong> is a plain number and the page's own defaults put it at -10.38. It is worked out from Bicarbonate and pH. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Measured minus Winter-predicted PaCO2</strong> is a plain number and the page's own defaults put it at -1. It is worked out from PaCO₂ and Bicarbonate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Anion gap</th><th>Albumin-corrected gap</th><th>Expected PaCO₂ (Winter&#039;s formula)</th><th>Base excess estimate</th><th>Measured minus Winter-predicted PaCO2</th></tr></thead><tbody><tr><td><strong>pH</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+95.2%</td><td>+0%</td></tr><tr><td><strong>PaCO₂</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+280%</td></tr><tr><td><strong>Bicarbonate</strong> +10%</td><td>-6.67%</td><td>-1.26%</td><td>+7.24%</td><td>+12.54%</td><td>-210%</td></tr><tr><td><strong>Sodium</strong> +10%</td><td>+66.67%</td><td>+12.61%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Chloride</strong> +10%</td><td>-50%</td><td>-9.46%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Albumin</strong> +10%</td><td>+0%</td><td>-0.9%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to PaCO₂: ten per cent there moves an answer by about 280 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With pH = 3.66, PaCO₂ = 14 mmHg, Bicarbonate = 7 mmol/L, Sodium = 70 mmol/L, Chloride = 52.5 mmol/L and Albumin = 20 g/L, the answer is <strong>Anion gap</strong> = 10.5 mmol/L, <strong>Albumin-corrected gap</strong> = 106 mmol/L, <strong>Expected PaCO₂ (Winter&#039;s formula)</strong> = 18.5 mmHg, <strong>Base excess estimate</strong> = -66.3 mmol/L and <strong>Measured minus Winter-predicted PaCO2</strong> = -4.5 mmHg.</li><li>With pH = 21.96, PaCO₂ = 28 mmHg, Bicarbonate = 14 mmol/L, Sodium = 140 mmol/L, Chloride = 105 mmol/L and Albumin = 40 g/L, the answer is <strong>Anion gap</strong> = 21 mmol/L, <strong>Albumin-corrected gap</strong> = 111 mmol/L, <strong>Expected PaCO₂ (Winter&#039;s formula)</strong> = 29 mmHg, <strong>Base excess estimate</strong> = 187 mmol/L and <strong>Measured minus Winter-predicted PaCO2</strong> = -1 mmHg.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Anion gap is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes pH, PaCO₂ and Bicarbonate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
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
            pH, PaCO₂ (mmHg), Bicarbonate (mmol/L), Sodium (mmol/L), Chloride (mmol/L). Fill pH, paCO₂ and bicarbonate and leave Anion gap empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Anion gap, Albumin-corrected gap, Expected PaCO₂ (Winter's formula) and Base excess estimate can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Anion gap = 21 mmol/L, Albumin-corrected gap = 111 mmol/L, Expected PaCO₂ (Winter's formula) = 29 mmHg, Base excess estimate = -10.38 mmol/L and Measured minus Winter-predicted PaCO2 = -1 mmHg. The figures come from pH as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Anion gap is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
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
