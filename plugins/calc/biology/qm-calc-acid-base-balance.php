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
    'meta' => ['title' => 'Acid–Base Balance Calculator (ABG) — Biology', 'description' => 'An arterial blood gas reports pH, CO₂ and bicarbonate, and the acid–base balance comes from comparing them. It returns anion gap, albumin-corrected gap…', 'h1' => 'Acid–Base Balance Calculator (ABG)', 'updated' => '2026-10-29'],
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
        An arterial blood gas reports pH, CO₂ and bicarbonate, and the acid–base balance comes from comparing them. It returns anion gap, albumin-corrected gap, expected PaCO₂ (Winter's formula) and base excess estimate, and the panel shows all of them at once.
        
        This calculator gives the anion gap, the respiratory compensation expected for a metabolic acidosis, and flags the classic mixed disorders.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Acid–Base Balance (ABG)', 'html' => <<<'TXT'
            <p>Anion gap = Na⁺ − Cl⁻ − HCO₃⁻; Winter's formula: expected PaCO₂ = 1.5 × HCO₃⁻ + 8</p>
            <figure class="calc-figure"><img src="/uploads/biology/acid-base-balance.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Acid–Base Balance Calculator (ABG) — Measured CO₂ against what Winter's formula predicts." title="Acid–Base Balance Calculator (ABG)"><figcaption>Measured CO₂ against what Winter's formula predicts.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>AG</code></td><td>anion gap</td><td>mmol/L</td></tr><tr><td><code>PaCO₂</code></td><td>arterial carbon dioxide tension</td><td>mmHg</td></tr><tr><td><code>HCO₃⁻</code></td><td>bicarbonate</td><td>mmol/L</td></tr><tr><td><code>BE</code></td><td>base excess</td><td>mmol/L</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> Winter's formula and the albumin correction for the anion gap are standard bedside acid–base rules.</p>
            TXT],
            ['title' => 'How do I use the Acid–Base Balance (ABG)?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: ph of <strong>7.32</strong>, paco₂ of <strong>28</strong> mmHg, bicarbonate of <strong>14</strong> mmol/L, sodium of <strong>140</strong> mmol/L, chloride of <strong>105</strong> mmol/L, albumin of <strong>40</strong> g/L.</p>
            <p>Substituting them into the formula gives anion gap of <strong>21</strong> mmol/L, albumin-corrected gap of <strong>111</strong> mmol/L, expected paco₂ (winter's formula) of <strong>29</strong> mmHg, base excess estimate of <strong>-10.38</strong> mmol/L, measured minus winter-predicted paco2 of <strong>-1</strong> mmHg.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>AG 8 – 12</td><td><strong>Normal</strong></td><td>no unmeasured anion accumulation</td></tr><tr><td>AG 12 – 20</td><td><strong>Raised</strong></td><td>ketoacidosis, lactate, renal failure</td></tr><tr><td>AG above 20</td><td><strong>High</strong></td><td>a large unmeasured anion load</td></tr></tbody></table>
            <ul><li><p>Winter's formula predicts the CO₂ a metabolic acidosis should produce: a measured CO₂ above the predicted range means a coexisting respiratory acidosis, below it a respiratory alkalosis.</p></li><li><p>The anion gap falls by about 2.5 mmol/L for every 10 g/L of albumin below normal, so a 'normal' gap in a hypoalbuminaemic patient may be a raised gap.</p></li><li><p>Base excess is the metabolically interesting number because it is independent of the respiratory component.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Interpreting pH without checking whether the CO₂ and bicarbonate changes are in the same direction.</li><li>Ignoring albumin when the anion gap is normal.</li><li>Using venous values for oxygenation calculations.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a normal anion gap?', 'a' => 'About 8–12 mmol/L, higher if the laboratory measures chloride by a different method.'],
            ['q' => 'How do I recognise a mixed disorder?', 'a' => 'When the measured CO₂ or bicarbonate does not match the compensation the primary disorder should produce.'],
            ['q' => 'What does the Acid–Base Balance (ABG) actually calculate?', 'a' => <<<'TXT'
            It returns anion gap, albumin-corrected gap, expected PaCO₂ (Winter's formula) and base excess estimate. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
        ],
        'related' => [],
    ],
];
