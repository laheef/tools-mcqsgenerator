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
    'meta' => ['title' => 'Bacterial Concentration Calculator — Biology', 'description' => 'Bacterial concentration can come from a plate count, an OD reading or a dilution series, and the three disagree. It returns cells per mL (from OD), log₁�….', 'h1' => 'Bacterial Concentration Calculator', 'updated' => '2026-10-29'],
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
        Bacterial concentration can come from a plate count, an OD reading or a dilution series, and the three disagree. It returns cells per mL (from OD), log₁₀ CFU/mL and cells per CFU, and the panel shows all of them at once.
        
        This calculator converts between them and reports the concentration in cells/mL, CFU/mL and log units, with the doubling time it implies.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Bacterial Concentration', 'html' => <<<'TXT'
            <p>Cells/mL ≈ OD600 × (cells/mL per OD unit); log₁₀ CFU/mL = log₁₀(CFU/mL)</p>
            <figure class="calc-figure"><img src="/uploads/biology/bacterial-concentration-calculator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Bacterial Concentration Calculator — Plate count against the OD estimate, side by side." title="Bacterial Concentration Calculator"><figcaption>Plate count against the OD estimate, side by side.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>CFU/mL</code></td><td>colony-forming units from a plate</td><td>CFU/mL</td></tr><tr><td><code>OD600</code></td><td>absorbance of the culture</td><td>AU</td></tr><tr><td><code>ratio</code></td><td>how many cells make up one colony — the clumping factor</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Bacterial Concentration?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: cfu per ml of <strong>5,000,000</strong> CFU/mL, od600 of <strong>0.6</strong>, cells per ml per od unit of <strong>800,000,000</strong> cells/mL.</p>
            <p>Substituting them into the formula gives cells per ml (from od) of <strong>480,000,000</strong> cells/mL, log₁₀ cfu/ml of <strong>6.7</strong>, cells per cfu of <strong>96</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Cells per CFU is usually 1–3 for well-dispersed cultures and much higher for clumping strains; it is the size of the gap between the two methods.</p></li><li><p>Both methods count dead cells differently: OD600 counts everything, plating counts only what can grow.</p></li><li><p>For a standard curve, calibrate OD against CFU for your own strain, medium and spectrophotometer once, and reuse the factor.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Comparing OD-derived cell counts with CFU directly and reporting a discrepancy as a result.</li><li>Using the E. coli factor for a Gram-positive organism.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/cfu-ml-calculator">CFU/mL</a>. <a href="/biology/od600-to-cell-density">OD600 to cell density</a>. <a href="/biology/bacterial-growth-curve">Bacterial growth curve</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which number should I report?', 'a' => 'Both, with the method: OD-based cells/mL for mass, CFU/mL for viable count.'],
            ['q' => 'Why do they differ by a factor of two?', 'a' => 'Clumping, dead cells and chains of cells. For streptococci the gap can be tenfold.'],
            ['q' => 'What does the Bacterial Concentration actually calculate?', 'a' => 'It returns cells per mL (from OD), log₁₀ CFU/mL and cells per CFU. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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
