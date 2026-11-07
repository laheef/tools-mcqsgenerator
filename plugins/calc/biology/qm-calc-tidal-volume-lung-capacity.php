<?php

/**
 * Tidal Volume and Lung Capacity Calculator
 * /biology/tidal-volume-lung-capacity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tidal Volume and Lung Capacity Calculator',
    'meta' => ['title' => 'Tidal Volume and Lung Capacity Calculator — Biology', 'description' => 'Tidal volume is the air moved in one quiet breath, about 6–8 mL per kilogram of ideal body weight. It returns ideal body weight, tidal volume, minute…', 'h1' => 'Tidal Volume and Lung Capacity Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'height',
                            'label' => 'Height',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '175',
                        ],
                        [
                            'name' => 'rate',
                            'label' => 'Respiratory rate',
                            'type' => 'number',
                            'suffix' => 'breaths/min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '14',
                        ],
                        [
                            'name' => 'per_kg',
                            'label' => 'Tidal volume per kg ideal body weight',
                            'type' => 'number',
                            'suffix' => 'mL/kg',
                            'help' => '6–8 is the usual target',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7',
                        ],
                        [
                            'name' => 'ibw',
                            'label' => 'Ideal body weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'vt',
                            'label' => 'Tidal volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'minute',
                            'label' => 'Minute ventilation',
                            'type' => 'number',
                            'suffix' => 'L/min',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dead_space',
                            'label' => 'Anatomical dead space',
                            'type' => 'number',
                            'suffix' => 'mL',
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
            'title' => 'Volumes',
            'results' => ['ibw' => '50+0.91*(height-152.4)', 'vt' => '(50+0.91*(height-152.4))*per_kg', 'minute' => '(50+0.91*(height-152.4))*per_kg*rate/1000', 'dead_space' => '(50+0.91*(height-152.4))*2.2'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Tidal volume is the air moved in one quiet breath, about 6–8 mL per kilogram of ideal body weight. It returns ideal body weight, tidal volume, minute ventilation and anatomical dead space, and the panel shows all of them at once.
        
        This calculator predicts it from height and sex, adds the standard lung volumes and converts to minute ventilation for a given respiratory rate.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Tidal Volume and Lung Capacity', 'html' => <<<'TXT'
            <p>IBW (kg) = 50 + 0.91 × (height − 152.4); V_T = 7 mL/kg IBW; V_E = V_T × rate</p>
            <figure class="calc-figure"><img src="/uploads/biology/tidal-volume-lung-capacity.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Tidal Volume and Lung Capacity Calculator — Tidal volume, respiratory rate and the minute volume they produce." title="Tidal Volume and Lung Capacity Calculator"><figcaption>Tidal volume, respiratory rate and the minute volume they produce.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>IBW</code></td><td>ideal body weight</td><td>kg</td></tr><tr><td><code>V_T</code></td><td>tidal volume</td><td>mL</td></tr><tr><td><code>V_E</code></td><td>minute ventilation</td><td>L/min</td></tr><tr><td><code>V_D</code></td><td>anatomical dead space, about 2.2 mL/kg IBW</td><td>mL</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Tidal Volume and Lung Capacity?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: height of <strong>175</strong> cm, respiratory rate of <strong>14</strong> breaths/min, tidal volume per kg ideal body weight of <strong>7</strong> mL/kg.</p>
            <p>Substituting them into the formula gives ideal body weight of <strong>70.57</strong> kg, tidal volume of <strong>493.96</strong> mL, minute ventilation of <strong>6.92</strong> L/min, anatomical dead space of <strong>155.25</strong> mL.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>4 – 6 mL/kg IBW</td><td><strong>Lung-protective</strong></td><td>the target in ARDS ventilation</td></tr><tr><td>6 – 8 mL/kg IBW</td><td><strong>Standard</strong></td><td>normal adult ventilation</td></tr><tr><td>above 10 mL/kg IBW</td><td><strong>Large</strong></td><td>risk of volutrauma in injured lungs</td></tr></tbody></table>
            <ul><li><p>Tidal volume is set from ideal body weight, not actual weight, because lung size scales with height rather than with fat mass.</p></li><li><p>Minute ventilation is tidal volume times respiratory rate — a small fast breath ventilates the same as a large slow one, but not the same alveoli.</p></li><li><p>Vital capacity predictions are ±20%, and the gender difference in the reference equation is about 0.6 L.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Using actual body weight in an obese patient, which gives dangerously large tidal volumes.</li><li>Confusing tidal volume with minute volume.</li><li>Entering height in inches in a centimetre field.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why use ideal body weight?', 'a' => 'Because lung volume follows height; using actual weight in obesity over-ventilates the patient.'],
            ['q' => 'What is a normal tidal volume?', 'a' => 'About 500 mL for an adult man and 400 mL for an adult woman at rest.'],
            ['q' => 'What does the Tidal Volume and Lung Capacity actually calculate?', 'a' => <<<'TXT'
            It returns ideal body weight, tidal volume, minute ventilation and anatomical dead space. Each one is derived by the formula on this page, so you can check any figure by hand.
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
