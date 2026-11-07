<?php

/**
 * Vine Density Calculator
 * /biology/vine-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Vine Density Calculator',
    'meta' => ['title' => 'Vine Density Calculator — Formula & Results', 'description' => <<<'TXT'
    Vine density — vines per hectare — is set by row spacing and vine spacing, and it drives competition, fruit exposure and yield per vine. It returns vines per…
    TXT, 'h1' => 'Vine Density Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'row_spacing',
                            'label' => 'Row spacing',
                            'type' => 'number',
                            'suffix' => 'm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.5',
                        ],
                        [
                            'name' => 'vine_spacing',
                            'label' => 'Vine spacing',
                            'type' => 'number',
                            'suffix' => 'm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.2',
                        ],
                        [
                            'name' => 'yield_tha',
                            'label' => 'Target yield',
                            'type' => 'number',
                            'suffix' => 't/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'bunches',
                            'label' => 'Bunches per vine',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '24',
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Vines per hectare',
                            'type' => 'number',
                            'suffix' => 'vines/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_row',
                            'label' => 'Vines per 100 m of row',
                            'type' => 'number',
                            'suffix' => 'vines',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'kg_vine',
                            'label' => 'Yield per vine',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'g_bunch',
                            'label' => 'Grams per bunch',
                            'type' => 'number',
                            'suffix' => 'g',
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
            'title' => 'Vines',
            'results' => ['density' => '10000/(row_spacing*vine_spacing)', 'per_row' => '100/vine_spacing', 'kg_vine' => 'yield_tha*1000/(10000/(row_spacing*vine_spacing))', 'g_bunch' => 'yield_tha*1000/(10000/(row_spacing*vine_spacing))/bunches*1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Vine density — vines per hectare — is set by row spacing and vine spacing, and it drives competition, fruit exposure and yield per vine. It returns vines per hectare, vines per 100 m of row, yield per vine and grams per bunch, and the panel shows all of them at once.
        
        This calculator gives density, vines per row, and the yield per vine that a target tonnes-per-hectare implies.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Vine Density', 'html' => <<<'TXT'
            <p>Vines/ha = 10 000 ÷ (row spacing × vine spacing); kg per vine = yield ÷ density</p>
            <figure class="calc-figure"><img src="/uploads/biology/vine-density.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Vine Density Calculator — Row and vine spacing in a vineyard block." title="Vine Density Calculator"><figcaption>Row and vine spacing in a vineyard block.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>row spacing</code></td><td>distance between rows</td><td>m</td></tr><tr><td><code>vine spacing</code></td><td>distance between vines in the row</td><td>m</td></tr><tr><td><code>density</code></td><td>vines per hectare</td><td>vines/ha</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Vine Density?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: row spacing of <strong>2.5</strong> m, vine spacing of <strong>1.2</strong> m, target yield of <strong>8</strong> t/ha, bunches per vine of <strong>24</strong>.</p>
            <p>Substituting them into the formula gives vines per hectare of <strong>3,333.33</strong> vines/ha, vines per 100 m of row of <strong>83.33</strong> vines, yield per vine of <strong>2.4</strong> kg, grams per bunch of <strong>100</strong> g.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 3 000</td><td><strong>Low density</strong></td><td>bush vines, old-vine plots, dry-grown</td></tr><tr><td>3 000 – 6 000</td><td><strong>Typical</strong></td><td>most modern trellised vineyards</td></tr><tr><td>above 7 000</td><td><strong>High density</strong></td><td>cool-climate quality plantings</td></tr></tbody></table>
            <ul><li><p>Doubling density roughly halves the yield per vine for the same tonnes per hectare, which changes fruit composition as much as it changes tonnage.</p></li><li><p>Row spacing also has to fit the tractor: 2.0–2.5 m is common because machinery sets a floor.</p></li><li><p>Bunch weight is the least stable variable in the chain — it moves by 30% between seasons.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Using feet for spacing in a metre-based formula.</li><li>Setting density from yield targets alone, ignoring vine vigour and water supply.</li><li>Confusing tonnes per hectare with tonnes per acre (1 t/ac ≈ 2.47 t/ha).</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/plant-population">Plant population</a>. <a href="/biology/growing-degree-days">Growing degree days</a>. <a href="/biology/huglin-index">Huglin index</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many vines per hectare at 2.5 × 1.2 m?', 'a' => 'About 3 333 vines.'],
            ['q' => 'Does higher density give better wine?', 'a' => 'It can improve competition and fruit exposure, but only where water and nutrition allow it.'],
            ['q' => 'What does the Vine Density actually calculate?', 'a' => <<<'TXT'
            It returns vines per hectare, vines per 100 m of row, yield per vine and grams per bunch. Each one is derived by the formula on this page, so you can check any figure by hand.
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
