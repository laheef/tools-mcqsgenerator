<?php

/**
 * Buffer pH Calculator (Henderson–Hasselbalch)
 * /biology/henderson-hasselbalch-buffer
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Buffer pH Calculator (Henderson–Hasselbalch)',
    'meta' => ['title' => 'Buffer pH Calculator (Henderson–Hasselbalch)', 'description' => <<<'TXT'
    The pH of a buffer depends on the ratio of its conjugate base to its acid, not on how concentrated it is: pH = pKa + log₁₀([A⁻]/[HA]). It returns base ÷ acid…
    TXT, 'h1' => 'Buffer pH Calculator (Henderson–Hasselbalch)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'pka',
                            'label' => 'pKa of the buffer',
                            'type' => 'number',
                            'help' => 'Phosphate 7.2, Tris 8.06, HEPES 7.55 at 25 °C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7.2',
                        ],
                        [
                            'name' => 'ph',
                            'label' => 'Target pH',
                            'type' => 'number',
                            'suffix' => 'pH',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7.4',
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Base ÷ acid ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'acid_pct',
                            'label' => 'Acid share',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'base_pct',
                            'label' => 'Base share',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'delta',
                            'label' => 'pH − pKa',
                            'type' => 'number',
                            'suffix' => 'pH',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_mm',
                            'label' => 'Total buffer concentration',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'help' => 'Optional',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'acid_mm',
                            'label' => 'Concentration of the acid form',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'base_mm',
                            'label' => 'Concentration of the base form',
                            'type' => 'number',
                            'suffix' => 'mM',
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
            'title' => 'Ratio',
            'results' => ['ratio' => '10^(ph-pka)', 'ph' => 'pka+log10(ratio)', 'delta' => 'ph-pka'],
        ],
        [
            'title' => 'Mixture',
            'results' => ['acid_pct' => '100/(1+10^(ph-pka))', 'base_pct' => '100*10^(ph-pka)/(1+10^(ph-pka))', 'acid_mm' => 'total_mm/(1+10^(ph-pka))', 'base_mm' => 'total_mm*10^(ph-pka)/(1+10^(ph-pka))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The pH of a buffer depends on the ratio of its conjugate base to its acid, not on how concentrated it is: pH = pKa + log₁₀([A⁻]/[HA]). It returns base ÷ acid ratio, target pH, pH − pKa and acid share, and the panel shows all of them at once.
        
        This calculator gives the ratio for a target pH, the pH for a ratio you already have, and the ionic strength the mixture contributes.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Buffer pH (Henderson–Hasselbalch)', 'html' => <<<'TXT'
            <p>pH = pKa + log₁₀([A⁻] ÷ [HA]). Base share = 10^(pH−pKa) ÷ (1 + 10^(pH−pKa)) × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/henderson-hasselbalch-buffer.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Buffer pH Calculator (Henderson–Hasselbalch) — Base share against pH around the pKa" title="Buffer pH Calculator (Henderson–Hasselbalch)"><figcaption>Base share against pH around the pKa</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>pKa</code></td><td>negative log of the acid dissociation constant</td><td>—</td></tr><tr><td><code>[A⁻]</code></td><td>concentration of the deprotonated form</td><td>M</td></tr><tr><td><code>[HA]</code></td><td>concentration of the protonated form</td><td>M</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Buffer pH (Henderson–Hasselbalch)?', 'html' => <<<'TXT'
            <ol><li>Enter the pKa of the buffer you are making (phosphate 7.2, HEPES 7.55, Tris 8.06).</li><li>Enter the pH you need. The ratio and the share of each form follow.</li><li>If you know the total concentration, the amount of acid and base form is filled in too.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: pka of the buffer of <strong>7.2</strong>, total buffer concentration of <strong>50</strong> mM.</p>
            <p>Substituting them into the formula gives base ÷ acid ratio of <strong>1.58</strong>, target ph of <strong>7.4</strong> pH, ph − pka of <strong>0.2</strong> pH, acid share of <strong>38.69</strong>%, base share of <strong>61.31</strong>%, concentration of the acid form of <strong>19.34</strong> mM, concentration of the base form of <strong>30.66</strong> mM.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>pH = pKa</td><td><strong>50 / 50</strong></td><td>maximum buffer capacity, minimum pH drift on dilution</td></tr><tr><td>within ±1 of pKa</td><td><strong>Useful buffer</strong></td><td>capacity is still good</td></tr><tr><td>more than 1 unit away</td><td><strong>Poor buffer</strong></td><td>almost all of it is one form; pick another buffer</td></tr></tbody></table>
            <ul><li><p>Buffer capacity is highest at pH = pKa, where the two forms are equal. A buffer is only worth using within about one pH unit of its pKa.</p></li><li><p>pKa depends on temperature: Tris drops about 0.03 pH units per °C, which is why a Tris buffer made at 25 °C reads about 7.8 in a cold room at 4 °C.</p></li><li><p>This equation ignores activity coefficients. At 100 mM and above, real pH drifts by a few tenths from the calculated value — measure it.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Confusing the ratio of the two forms with the ratio of stock volumes — a 1 M stock of each is the only case where they are the same.</li><li>Making a buffer at a pH far from the pKa and expecting it to hold.</li><li>Forgetting that adding HCl or NaOH changes the volume and therefore the final concentration.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What ratio gives pH = pKa?', 'a' => 'Exactly 1:1 of base to acid.'],
            ['q' => 'How much can I dilute a buffer before the pH changes?', 'a' => 'Dilution does not change the ratio, so pH holds; capacity falls, which matters once you add acid or base.'],
            ['q' => 'Why is my measured pH different from the calculation?', 'a' => 'Temperature, ionic strength and activity coefficients all shift it; calibrate at the temperature you will use.'],
            ['q' => 'What does the Buffer pH (Henderson–Hasselbalch) actually calculate?', 'a' => 'It returns base ÷ acid ratio, target pH, pH − pKa and acid share. Each one is derived by the formula on this page, so you can check any figure by hand.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [],
    ],
];
