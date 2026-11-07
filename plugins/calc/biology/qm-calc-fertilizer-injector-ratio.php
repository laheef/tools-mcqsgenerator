<?php

/**
 * Fertilizer Injector Ratio Calculator
 * /biology/fertilizer-injector-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fertilizer Injector Ratio Calculator',
    'meta' => ['title' => 'Fertilizer Injector Ratio Calculator — Biology', 'description' => 'Injector ratios tell you how much stock solution to mix so that the water reaching the plants carries the intended concentration. This calculator converts…', 'h1' => 'Fertilizer Injector Ratio Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'target',
                            'label' => 'Target nitrogen in the line',
                            'type' => 'number',
                            'suffix' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '150',
                        ],
                        [
                            'name' => 'n_pct',
                            'label' => 'Nitrogen in the fertilizer',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Injector ratio',
                            'type' => 'number',
                            'suffix' => ':1',
                            'help' => '1:100 means 1 part stock to 99 parts water',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'tank',
                            'label' => 'Stock tank size',
                            'type' => 'number',
                            'suffix' => 'L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '200',
                        ],
                        [
                            'name' => 'stock_ppm',
                            'label' => 'Stock concentration',
                            'type' => 'number',
                            'suffix' => 'ppm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_litre',
                            'label' => 'Fertilizer per litre of stock',
                            'type' => 'number',
                            'suffix' => 'g/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_tank',
                            'label' => 'Fertilizer per tank',
                            'type' => 'number',
                            'suffix' => 'kg',
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
            'title' => 'Injection',
            'results' => ['stock_ppm' => 'target*ratio', 'per_litre' => 'target*ratio/n_pct/100/1000', 'per_tank' => 'target*ratio/n_pct/100/1000*tank'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Injector ratios tell you how much stock solution to mix so that the water reaching the plants carries the intended concentration. It returns stock concentration, fertilizer per litre of stock and fertilizer per tank, and the panel shows all of them at once.
        
        This calculator converts between a target ppm in the irrigation line, the injector ratio and the weight of fertilizer for a stock tank of any size.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Fertilizer Injector Ratio', 'html' => <<<'TXT'
            <p>Stock ppm = line ppm × injector ratio; grams per litre = stock ppm ÷ (%N × 10)</p>
            <figure class="calc-figure"><img src="/uploads/biology/fertilizer-injector-ratio.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Fertilizer Injector Ratio Calculator — Line concentration, injector ratio and stock weight." title="Fertilizer Injector Ratio Calculator"><figcaption>Line concentration, injector ratio and stock weight.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>target</code></td><td>desired concentration in the irrigation line</td><td>ppm</td></tr><tr><td><code>ratio</code></td><td>dilution factor of the injector</td><td>:1</td></tr><tr><td><code>%N</code></td><td>nitrogen content of the fertilizer</td><td>%</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Fertilizer Injector Ratio?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: target nitrogen in the line of <strong>150</strong> ppm, nitrogen in the fertilizer of <strong>20</strong>%, injector ratio of <strong>100</strong>:1, stock tank size of <strong>200</strong> L.</p>
            <p>Substituting them into the formula gives stock concentration of <strong>15,000</strong> ppm, fertilizer per litre of stock of <strong>0.0075</strong> g/L, fertilizer per tank of <strong>1.5</strong> kg.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>A 1:100 injector makes the stock 100 times stronger than the line, so a 150 ppm target needs 15 000 ppm in the tank.</p></li><li><p>Weigh fertilizers in grams per litre of stock, then check the electrical conductivity — it rises with concentration and is the quickest in-field check that the mix is right.</p></li><li><p>Nitrogen sources differ: calcium nitrate and ammonium nitrate carry different amounts of calcium and ammonium, which matters for pH drift in the root zone.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Confusing 1:100 with 1:99 — the difference is small for the stock strength but large for water accounting.</li><li>Mixing the stock in the irrigation line instead of the tank.</li><li>Using a fertilizer percentage as a decimal in one place and a percentage in another.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/npk-fertilizer-blend">NPK fertilizer blend</a>. <a href="/chemistry/ppm-to-molarity">ppm to molarity</a>. <a href="/biology/crop-water-requirement">Crop water requirement</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I mix 100 ppm nitrogen with 20% fertilizer at 1:100?', 'a' => '50 g per litre of stock — 100 × 100 ÷ (20 × 10).'],
            ['q' => 'Does the injector ratio affect the final EC?', 'a' => 'Yes: the line EC is set by the diluted concentration, so a stronger stock at a higher ratio can deliver the same EC.'],
            ['q' => 'What does the Fertilizer Injector Ratio actually calculate?', 'a' => <<<'TXT'
            It returns stock concentration, fertilizer per litre of stock and fertilizer per tank. Each one is derived by the formula on this page, so you can check any figure by hand.
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
