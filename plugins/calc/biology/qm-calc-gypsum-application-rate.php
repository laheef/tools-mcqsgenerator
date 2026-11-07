<?php

/**
 * Gypsum Application Rate Calculator
 * /biology/gypsum-application-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gypsum Application Rate Calculator',
    'meta' => ['title' => 'Gypsum Application Rate Calculator — Biology', 'description' => 'Gypsum (calcium sulfate) adds calcium without raising pH, and it improves the structure of sodic clay soils. It returns gypsum rate, gypsum needed and 25 kg…', 'h1' => 'Gypsum Application Rate Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'area_ha',
                            'label' => 'Area',
                            'type' => 'number',
                            'suffix' => 'ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'texture',
                            'label' => 'Soil texture',
                            'type' => 'select',
                            'options' => ['Sand' => '1.5', 'Loam' => '3', 'Clay' => '5'],
                            'help' => 'Sets the tonnes per hectare for a one-unit pH-neutral treatment',
                            'default' => 'Loam',
                        ],
                        [
                            'name' => 'esp',
                            'label' => 'Exchangeable sodium percentage',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Above 15% the soil is sodic',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'esp_target',
                            'label' => 'Target ESP',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Below 7% is considered non-sodic',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'rate_tha',
                            'label' => 'Gypsum rate',
                            'type' => 'number',
                            'suffix' => 't/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_t',
                            'label' => 'Gypsum needed',
                            'type' => 'number',
                            'suffix' => 't',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bags_25kg',
                            'label' => '25 kg bags',
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
            'title' => 'Rate',
            'results' => ['rate_tha' => 'texture*(esp-esp_target)/10', 'total_t' => 'area_ha*texture*(esp-esp_target)/10', 'bags_25kg' => 'area_ha*texture*(esp-esp_target)/10*40'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Gypsum (calcium sulfate) adds calcium without raising pH, and it improves the structure of sodic clay soils. It returns gypsum rate, gypsum needed and 25 kg bags, and the panel shows all of them at once.
        
        The rate depends on the soil's exchangeable sodium and its clay content — typically 0.5–2 tonnes per acre, or 1–5 tonnes per hectare.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Gypsum Application Rate', 'html' => <<<'TXT'
            <p>Gypsum (t/ha) = texture factor × (ESP − target ESP) ÷ 10, where the texture factor is 1.5 for sand, 3 for loam and 5 for clay</p>
            <figure class="calc-figure"><img src="/uploads/biology/gypsum-application-rate.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Gypsum Application Rate Calculator — Gypsum rate (t/ha) for a loam at different ESP" title="Gypsum Application Rate Calculator"><figcaption>Gypsum rate (t/ha) for a loam at different ESP</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>ESP</code></td><td>exchangeable sodium percentage, the share of cation sites holding sodium</td><td>%</td></tr><tr><td><code>gypsum</code></td><td>calcium sulfate dihydrate, CaSO₄·2H₂O</td><td>—</td></tr><tr><td><code>t/ha</code></td><td>tonnes per hectare</td><td>t/ha</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Gypsum Application Rate?', 'html' => <<<'TXT'
            <ol><li>Enter the area and the soil texture.</li><li>Enter the exchangeable sodium percentage from a soil test and the level you are aiming for.</li><li>Read the rate in tonnes per hectare, the total and the number of bags.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: area of <strong>1</strong> ha, soil texture set to <strong>3.0</strong>, exchangeable sodium percentage of <strong>15</strong>%, target esp of <strong>5</strong>%.</p>
            <p>Substituting them into the formula gives gypsum rate of <strong>3</strong> t/ha, gypsum needed of <strong>3</strong> t, 25 kg bags of <strong>120</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>under 1 t/ha</td><td><strong>Light</strong></td><td>a maintenance application on a slightly sodic soil</td></tr><tr><td>1 – 3 t/ha</td><td><strong>Standard</strong></td><td>the usual correction for a loam at 15% ESP</td></tr><tr><td>over 5 t/ha</td><td><strong>Heavy</strong></td><td>split across two seasons and follow with leaching water</td></tr></tbody></table>
            <ul><li><p>Gypsum supplies calcium and sulfur but does not change pH. If the soil is also acid, lime is the amendment you want, not gypsum.</p></li><li><p>Gypsum works by exchanging calcium for sodium on the clay, and the displaced sodium then needs water to leach away. Without drainage and leaching, the sodium stays.</p></li><li><p>It is also the standard cure for clay dispersion and for subsoil acidity at depth, where lime cannot be incorporated.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Applying gypsum to raise pH — it does not, and the mistake costs a season.</li><li>Spreading the full rate in one pass on a heavy clay with no drainage.</li><li>Ignoring the sodium: gypsum on a non-sodic soil does little for structure.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much gypsum per hectare?', 'a' => '1–3 t/ha for a loam at 15% ESP; up to 5 t/ha for a sodic clay.'],
            ['q' => 'Does gypsum lower pH?', 'a' => 'No. It is pH-neutral; use elemental sulfur or aluminium sulfate to acidify.'],
            ['q' => 'Can I apply gypsum with fertiliser?', 'a' => 'Yes, but not mixed with ammonium sulfate or superphosphate in the same hopper.'],
            ['q' => 'What does the Gypsum Application Rate actually calculate?', 'a' => 'It returns gypsum rate, gypsum needed and 25 kg bags. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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
