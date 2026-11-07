<?php

/**
 * Enzyme Unit Converter (U/mg, kcat)
 * /biology/enzyme-unit-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Enzyme Unit Converter (U/mg, kcat)',
    'meta' => ['title' => 'Enzyme Unit Converter (U/mg, kcat) Calculator', 'description' => 'One unit of enzyme converts one micromole of substrate per minute; kcat is the same activity per active site per second. It returns kcat (turnover number)…', 'h1' => 'Enzyme Unit Converter (U/mg, kcat)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'activity',
                            'label' => 'Specific activity',
                            'type' => 'number',
                            'suffix' => 'U/mg',
                            'help' => 'Micromoles per minute per milligram',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                        [
                            'name' => 'mw',
                            'label' => 'Enzyme molecular weight',
                            'type' => 'number',
                            'suffix' => 'Da',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '48000',
                        ],
                        [
                            'name' => 'kcat',
                            'label' => 'kcat (turnover number)',
                            'type' => 'number',
                            'suffix' => 's⁻¹',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'molar_activity',
                            'label' => 'Molar activity',
                            'type' => 'number',
                            'suffix' => 'min⁻¹',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ukat',
                            'label' => 'Activity in katal per mg',
                            'type' => 'number',
                            'suffix' => 'µkat/mg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'efficiency',
                            'label' => 'Catalytic efficiency (with Km)',
                            'type' => 'number',
                            'suffix' => 'M⁻¹s⁻¹',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'km',
                            'label' => 'Km',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'help' => 'Optional — used for catalytic efficiency',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '250',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Enzyme units',
            'results' => [
                'kcat' => 'activity*60000/mw',
                'molar_activity' => 'activity*60000/mw*60',
                'ukat' => 'activity/60',
                'efficiency' => 'activity*60000/mw/(km/1000000)',
                'activity' => 'kcat*mw/60000',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        One unit of enzyme converts one micromole of substrate per minute; kcat is the same activity per active site per second. It returns kcat (turnover number), molar activity, activity in katal per mg and catalytic efficiency (with Km), and the panel shows all of them at once.
        
        This calculator converts between specific activity (U/mg), molar activity, kcat and turnover number, which is how enzyme datasheets and papers are compared.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Enzyme Unit Converter (U/mg, kcat)', 'html' => <<<'TXT'
            <p>kcat (s⁻¹) = specific activity (U/mg) × 60 000 ÷ molecular weight (Da)</p>
            <figure class="calc-figure"><img src="/uploads/biology/enzyme-unit-converter.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Enzyme Unit Converter (U/mg, kcat) — Specific activity and molecular weight give the turnover number." title="Enzyme Unit Converter (U/mg, kcat)"><figcaption>Specific activity and molecular weight give the turnover number.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>specific activity</code></td><td>µmol substrate per minute per mg enzyme</td><td>U/mg</td></tr><tr><td><code>MW</code></td><td>molecular weight of the enzyme subunit</td><td>Da</td></tr><tr><td><code>kcat</code></td><td>substrate molecules converted per active site per second</td><td>s⁻¹</td></tr><tr><td><code>Km</code></td><td>Michaelis constant</td><td>µM</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Enzyme Unit Converter (U/mg, kcat)?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: enzyme molecular weight of <strong>48,000</strong> Da, km of <strong>250</strong> µM.</p>
            <p>Substituting them into the formula gives kcat (turnover number) of <strong>150</strong> s⁻¹, molar activity of <strong>9,000</strong> min⁻¹, activity in katal per mg of <strong>2</strong> µkat/mg, catalytic efficiency (with km) of <strong>600,000</strong> M⁻¹s⁻¹, specific activity of <strong>120</strong> U/mg.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1 – 10 s⁻¹</td><td><strong>Slow</strong></td><td>typical of many metabolic enzymes</td></tr><tr><td>10 – 1000 s⁻¹</td><td><strong>Efficient</strong></td><td>the usual range for well-characterised enzymes</td></tr><tr><td>above 10⁵ s⁻¹</td><td><strong>Diffusion-limited</strong></td><td>catalase, acetylcholinesterase territory</td></tr></tbody></table>
            <ul><li><p>kcat assumes one active site per subunit. For a dimer with two active sites, divide the molar activity by two.</p></li><li><p>Catalytic efficiency is kcat/Km and approaches a diffusion limit of about 10⁸–10⁹ M⁻¹s⁻¹; values near that mean the enzyme is as fast as substrate arrival allows.</p></li><li><p>The 1 U = 1 µmol/min definition is the IUBMB one; 1 katal = 1 mol/s = 6 × 10⁷ U.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Using the molecular weight of the whole multimer when the activity is quoted per subunit.</li><li>Confusing U/mg (specific activity) with U/mL (volumetric activity) — the second says nothing about purity.</li><li>Converting at 25 °C and comparing with a kcat measured at 37 °C.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is the difference between kcat and specific activity?', 'a' => 'Specific activity is per milligram of protein; kcat is per molecule of enzyme per second. The molecular weight links them.'],
            ['q' => 'How do I go from U/mL to kcat?', 'a' => 'Convert U/mL to U/mg using the protein concentration, then use the formula on this page.'],
            ['q' => 'What does the Enzyme Unit Converter (U/mg, kcat) actually calculate?', 'a' => <<<'TXT'
            It returns kcat (turnover number), molar activity, activity in katal per mg and catalytic efficiency (with Km). Each one is derived by the formula on this page, so you can check any figure by hand.
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
