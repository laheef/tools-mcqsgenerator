<?php

/**
 * Land Equivalent Ratio Calculator
 * /biology/land-equivalent-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Land Equivalent Ratio Calculator',
    'meta' => ['title' => 'Land Equivalent Ratio Calculator — Formula & Results', 'description' => 'The land equivalent ratio answers the only question that matters about intercropping: would two crops be better grown separately? It returns crop 1 partial…', 'h1' => 'Land Equivalent Ratio Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'y1i',
                            'label' => 'Crop 1 yield, intercropped',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3200',
                        ],
                        [
                            'name' => 'y1s',
                            'label' => 'Crop 1 yield, sole crop',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5000',
                        ],
                        [
                            'name' => 'y2i',
                            'label' => 'Crop 2 yield, intercropped',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1800',
                        ],
                        [
                            'name' => 'y2s',
                            'label' => 'Crop 2 yield, sole crop',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2500',
                        ],
                        [
                            'name' => 'ler',
                            'label' => 'Land equivalent ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'partial1',
                            'label' => 'Crop 1 partial ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'partial2',
                            'label' => 'Crop 2 partial ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'advantage',
                            'label' => 'Land saved',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'The share of land the mixture saves',
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
            'title' => 'LER',
            'results' => ['partial1' => 'y1i/y1s', 'partial2' => 'y2i/y2s', 'ler' => 'y1i/y1s+y2i/y2s', 'advantage' => '(y1i/y1s+y2i/y2s-1)*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The land equivalent ratio answers the only question that matters about intercropping: would two crops be better grown separately? It returns crop 1 partial ratio, crop 2 partial ratio, land equivalent ratio and land saved, and the panel shows all of them at once.
        
        LER is the sum, over every crop in the mixture, of its intercrop yield divided by its sole-crop yield. Above 1.0 the mixture wins, below 1.0 it loses.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Land Equivalent Ratio', 'html' => <<<'TXT'
            <p>LER = (Y₁ᵢ ÷ Y₁ₛ) + (Y₂ᵢ ÷ Y₂ₛ). Land saved (%) = (LER − 1) × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/land-equivalent-ratio.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Land Equivalent Ratio Calculator — Partial land equivalent ratios in a cereal–legume intercrop" title="Land Equivalent Ratio Calculator"><figcaption>Partial land equivalent ratios in a cereal–legume intercrop</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>Yᵢ</code></td><td>yield of a crop in the intercrop</td><td>kg/ha</td></tr><tr><td><code>Yₛ</code></td><td>yield of the same crop as a sole crop</td><td>kg/ha</td></tr><tr><td><code>LER</code></td><td>land equivalent ratio, the land the mixture replaces</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Land Equivalent Ratio?', 'html' => <<<'TXT'
            <ol><li>Enter the yield of each crop grown in the mixture.</li><li>Enter the yield of each crop grown alone, under the same management.</li><li>Compare the total with 1.0; above it, the mixture is using land more efficiently.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: crop 1 yield, intercropped of <strong>3,200</strong> kg/ha, crop 1 yield, sole crop of <strong>5,000</strong> kg/ha, crop 2 yield, intercropped of <strong>1,800</strong> kg/ha, crop 2 yield, sole crop of <strong>2,500</strong> kg/ha.</p>
            <p>Substituting them into the formula gives crop 1 partial ratio of <strong>0.64</strong>, crop 2 partial ratio of <strong>0.72</strong>, land equivalent ratio of <strong>1.36</strong>, land saved of <strong>36</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>LER above 1.2</td><td><strong>Strong advantage</strong></td><td>the mixture is worth the extra management</td></tr><tr><td>LER 1.0 – 1.2</td><td><strong>Small advantage</strong></td><td>possible, but check the economics and the labour</td></tr><tr><td>LER below 1.0</td><td><strong>Disadvantage</strong></td><td>grow the crops separately</td></tr></tbody></table>
            <ul><li><p>An LER of 1.25 means the same total yield could only be produced from 1.25 ha of sole crops — so the mixture saves a quarter of the land.</p></li><li><p>Compare like with like: the sole-crop yields must come from the same season, soil and management. Book values from another year will give a meaningless ratio.</p></li><li><p>LER is a yield measure, not an economic one. A mixture that wins on land can still lose on labour, harvest timing and the price of the smaller crop.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Adding yields in tonnes without dividing by the sole-crop yields, which ignores that the two crops are not comparable.</li><li>Using a sole-crop yield from an unfertilised plot to flatter the intercrop.</li><li>Reporting LER without saying which season and site the sole-crop reference came from.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What LER is worth intercropping?', 'a' => 'Above 1.1 to justify the extra management; the best cereal–legume systems reach 1.2–1.4.'],
            ['q' => 'What does LER 1.0 mean?', 'a' => 'The mixture produces exactly as much as the same land split between the two sole crops — no advantage.'],
            ['q' => 'Can LER exceed 2?', 'a' => 'In theory each crop could yield its sole-crop yield in half the land, but real systems rarely pass 1.5.'],
            ['q' => 'What does the Land Equivalent Ratio actually calculate?', 'a' => <<<'TXT'
            It returns crop 1 partial ratio, crop 2 partial ratio, land equivalent ratio and land saved. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
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
