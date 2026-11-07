<?php

/**
 * Sludge Volume Index Calculator (SVI)
 * /biology/svi-sludge-volume-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sludge Volume Index Calculator (SVI)',
    'meta' => ['title' => 'Sludge Volume Index Calculator (SVI) — Biology', 'description' => <<<'TXT'
    Sludge volume index is the volume one gram of sludge occupies after thirty minutes of settling, and it is the fastest signal that an activated-sludge plant is…
    TXT, 'h1' => 'Sludge Volume Index Calculator (SVI)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'settled',
                            'label' => 'Settled sludge volume after 30 min',
                            'type' => 'number',
                            'suffix' => 'mL/L',
                            'help' => 'Read from the cone',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '280',
                        ],
                        [
                            'name' => 'mlss',
                            'label' => 'MLSS',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3000',
                        ],
                        [
                            'name' => 'flow',
                            'label' => 'Influent flow',
                            'type' => 'number',
                            'suffix' => 'm³/day',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'return_mlss',
                            'label' => 'Return sludge MLSS',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8000',
                        ],
                        [
                            'name' => 'svi',
                            'label' => 'Sludge volume index',
                            'type' => 'number',
                            'suffix' => 'mL/g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'sdi',
                            'label' => 'Sludge density index',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'return_ratio',
                            'label' => 'Return sludge ratio',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'return_flow',
                            'label' => 'Return sludge flow',
                            'type' => 'number',
                            'suffix' => 'm³/day',
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
            'title' => 'Sludge',
            'results' => ['svi' => 'settled/mlss*1000', 'sdi' => '100/(settled/mlss*1000)', 'return_ratio' => 'mlss/(return_mlss-mlss)*100', 'return_flow' => 'flow*mlss/(return_mlss-mlss)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Sludge volume index is the volume one gram of sludge occupies after thirty minutes of settling, and it is the fastest signal that an activated-sludge plant is about to bulk. It returns sludge volume index, sludge density index, return sludge ratio and return sludge flow, and the panel shows all of them at once.
        
        This calculator returns SVI, the sludge density index and the return-sludge ratio the clarifier needs.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Sludge Volume Index (SVI)', 'html' => <<<'TXT'
            <p>SVI = settled volume (mL/L) × 1 000 ÷ MLSS (mg/L); RAS ratio = MLSS ÷ (RAS MLSS − MLSS)</p>
            <figure class="calc-figure"><img src="/uploads/biology/svi-sludge-volume-index.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Sludge Volume Index Calculator (SVI) — Settling quality on one dial from dense to bulking." title="Sludge Volume Index Calculator (SVI)"><figcaption>Settling quality on one dial from dense to bulking.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>SV₃₀</code></td><td>settled sludge volume in 30 minutes</td><td>mL/L</td></tr><tr><td><code>MLSS</code></td><td>mixed liquor suspended solids</td><td>mg/L</td></tr><tr><td><code>SVI</code></td><td>sludge volume index</td><td>mL/g</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Sludge Volume Index (SVI)?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: settled sludge volume after 30 min of <strong>280</strong> mL/L, mlss of <strong>3,000</strong> mg/L, influent flow of <strong>500</strong> m³/day, return sludge mlss of <strong>8,000</strong> mg/L.</p>
            <p>Substituting them into the formula gives sludge volume index of <strong>93.33</strong> mL/g, sludge density index of <strong>1.07</strong>, return sludge ratio of <strong>60</strong>%, return sludge flow of <strong>300</strong> m³/day.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 80</td><td><strong>Dense, well settling</strong></td><td>excellent sludge; check for pin floc</td></tr><tr><td>80 – 150</td><td><strong>Normal</strong></td><td>typical healthy activated sludge</td></tr><tr><td>150 – 250</td><td><strong>Poor settling</strong></td><td>investigate loading, aeration and nutrients</td></tr><tr><td>above 250</td><td><strong>Bulking</strong></td><td>filamentous outbreak; the clarifier will lose solids</td></tr></tbody></table>
            <ul><li><p>SVI is a ratio, so it rises both when sludge settles badly and when the MLSS reading is too low — always check the MLSS measurement before blaming filaments.</p></li><li><p>Sludge density index is simply 100 ÷ SVI, a measure of how many grams one litre of settled sludge contains.</p></li><li><p>The return-sludge ratio follows from a mass balance on the clarifier: solids leaving in the return must equal solids arriving from the aeration tank.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Reading the settled volume from a stirred or disturbed cylinder.</li><li>Measuring MLSS from a sample taken at the wrong point in the tank.</li><li>Raising the return rate to fight bulking without checking whether the clarifier can take the hydraulic load.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a normal SVI?', 'a' => 'About 100–150 mL/g for conventional activated sludge; below 80 suits membrane and oxidation-ditch plants.'],
            ['q' => 'What causes a high SVI?', 'a' => 'Filamentous bacteria, low dissolved oxygen, nutrient deficiency (often phosphorus) or a sudden organic load.'],
            ['q' => 'What does the Sludge Volume Index (SVI) actually calculate?', 'a' => <<<'TXT'
            It returns sludge volume index, sludge density index, return sludge ratio and return sludge flow. Each one is derived by the formula on this page, so you can check any figure by hand.
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
