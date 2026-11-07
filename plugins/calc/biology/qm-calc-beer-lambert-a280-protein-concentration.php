<?php

/**
 * Beer-Lambert A280 Protein Concentration
 * /biology/beer-lambert-a280-protein-concentration
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Beer-Lambert A280 Protein Concentration',
    'meta' => ['title' => 'Beer-Lambert A280 Protein Concentration Calculator', 'description' => 'A280 is the fastest protein measurement there is: no reagents, no standard curve, and you get the sample back. It returns protein concentration and protein…', 'h1' => 'Beer-Lambert A280 Protein Concentration', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'a280',
                            'label' => 'Absorbance at 280 nm',
                            'type' => 'number',
                            'help' => 'Blanked against buffer',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.85',
                        ],
                        [
                            'name' => 'ext',
                            'label' => 'Extinction coefficient',
                            'type' => 'number',
                            'suffix' => 'M⁻¹cm⁻¹',
                            'help' => 'From the sequence, or 1.0 for 1 mg/mL = 1 AU',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '43824',
                        ],
                        [
                            'name' => 'mw',
                            'label' => 'Molecular weight',
                            'type' => 'number',
                            'suffix' => 'Da',
                            'help' => 'Used when the coefficient is molar',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '55000',
                        ],
                        [
                            'name' => 'path',
                            'label' => 'Path length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => '1 cm cuvette, or the drop path of a NanoDrop',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'conc_mg',
                            'label' => 'Protein concentration',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'conc_um',
                            'label' => 'Protein concentration',
                            'type' => 'number',
                            'suffix' => 'µM',
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
            'results' => ['conc_mg' => 'a280*mw/(ext*path)', 'conc_um' => 'a280/(ext*path)*1000000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A280 is the fastest protein measurement there is: no reagents, no standard curve, and you get the sample back. It returns protein concentration and protein concentration, and the panel shows all of them at once.
        
        This calculator applies the Beer–Lambert law with an extinction coefficient to turn an absorbance into mg/mL.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Beer-Lambert A280 Protein Concentration', 'html' => <<<'TXT'
            <p>A = ε × c × l, so c (M) = A ÷ (ε × l); c (mg/mL) = c (M) × molecular weight</p>
            <figure class="calc-figure"><img src="/uploads/biology/beer-lambert-a280-protein-concentration.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Beer-Lambert A280 Protein Concentration — Absorbance, coefficient and path length give concentration." title="Beer-Lambert A280 Protein Concentration"><figcaption>Absorbance, coefficient and path length give concentration.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>A₂₈₀</code></td><td>absorbance at 280 nm</td><td>AU</td></tr><tr><td><code>ε</code></td><td>molar extinction coefficient</td><td>M⁻¹cm⁻¹</td></tr><tr><td><code>l</code></td><td>path length</td><td>cm</td></tr><tr><td><code>MW</code></td><td>molecular weight</td><td>Da</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> Beer–Lambert law; extinction coefficients from the ExPASy ProtParam convention.</p>
            TXT],
            ['title' => 'How do I use the Beer-Lambert A280 Protein Concentration?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: absorbance at 280 nm of <strong>0.85</strong>, extinction coefficient of <strong>43,824</strong> M⁻¹cm⁻¹, molecular weight of <strong>55,000</strong> Da, path length of <strong>1</strong> cm.</p>
            <p>Substituting them into the formula gives protein concentration of <strong>1.07</strong> mg/mL, protein concentration of <strong>19.4</strong> µM.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1 AU ≈ 1 mg/mL</td><td><strong>Rule of thumb</strong></td><td>true only for proteins with ε ≈ MW</td></tr><tr><td>0.1 – 1.5 AU</td><td><strong>Reliable</strong></td><td>the linear range of most spectrophotometers</td></tr><tr><td>above 1.5</td><td><strong>Too concentrated</strong></td><td>dilute; the detector is saturating</td></tr></tbody></table>
            <ul><li><p>The rule that 1 mg/mL gives 1 AU at 280 nm is exactly true only when ε equals the molecular weight, which holds for a typical IgG and for few other proteins.</p></li><li><p>Nucleic acid contamination inflates A280 badly. Read A260 as well: a 260/280 ratio above 0.7 means the reading is mostly DNA or RNA.</p></li><li><p>For a 1 cm cuvette the path is 1; for a NanoDrop-style instrument it is 0.1–0.05 cm, which the instrument corrects for internally.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Using a molar coefficient with the mg/mL formula (or the reverse) — the answer is out by a factor of the molecular weight.</li><li>Ignoring nucleic acid contamination.</li><li>Forgetting to blank against the actual buffer, which may absorb at 280 nm itself.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I get the extinction coefficient without a spectrophotometer?', 'a' => 'Compute it from the sequence: 5500 × Trp + 1490 × Tyr + 125 × cystines, the ProtParam rule. The protein extinction coefficient calculator does that for you.'],
            ['q' => 'Why is my A280 higher than expected?', 'a' => 'Usually DNA, RNA or a buffer component such as DTT absorbing at 280 nm. Check the 260/280 ratio.'],
            ['q' => 'What does the Beer-Lambert A280 Protein Concentration actually calculate?', 'a' => 'It returns protein concentration and protein concentration. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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
