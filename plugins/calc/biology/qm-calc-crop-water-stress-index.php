<?php

/**
 * Crop Water Stress Index Calculator
 * /biology/crop-water-stress-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Crop Water Stress Index Calculator',
    'meta' => ['title' => 'Crop Water Stress Index Calculator — Biology', 'description' => <<<'TXT'
    The crop water stress index compares a canopy temperature with the wet and dry reference surfaces around it: 0 means a well-watered crop transpiring freely, 1…
    TXT, 'h1' => 'Crop Water Stress Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'tc',
                            'label' => 'Canopy temperature',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '28.5',
                        ],
                        [
                            'name' => 'twet',
                            'label' => 'Wet reference temperature',
                            'type' => 'number',
                            'suffix' => '°C',
                            'help' => 'A fully transpiring surface',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '22',
                        ],
                        [
                            'name' => 'tdry',
                            'label' => 'Dry reference temperature',
                            'type' => 'number',
                            'suffix' => '°C',
                            'help' => 'A non-transpiring surface',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '36',
                        ],
                        [
                            'name' => 'cswi',
                            'label' => 'Crop water stress index',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'depletion',
                            'label' => 'Estimated root-zone depletion',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'stress',
                            'label' => 'Stress class',
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
            'title' => 'Stress',
            'results' => ['cswi' => '(tc-twet)/(tdry-twet)', 'depletion' => '(tc-twet)/(tdry-twet)*100', 'stress' => '(tc-twet)/(tdry-twet)*3'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The crop water stress index compares a canopy temperature with the wet and dry reference surfaces around it: 0 means a well-watered crop transpiring freely, 1 means a fully closed stomata. It returns crop water stress index, estimated root-zone depletion and stress class, and the panel shows all of them at once.
        
        It is the standard way to turn a thermal image into an irrigation decision.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Crop Water Stress Index', 'html' => <<<'TXT'
            <p>CWSI = (T_c − T_wet) ÷ (T_dry − T_wet)</p>
            <figure class="calc-figure"><img src="/uploads/biology/crop-water-stress-index.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Crop Water Stress Index Calculator — Canopy temperature between the wet and dry references." title="Crop Water Stress Index Calculator"><figcaption>Canopy temperature between the wet and dry references.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>T_c</code></td><td>canopy temperature</td><td>°C</td></tr><tr><td><code>T_wet</code></td><td>temperature of a well-watered reference surface</td><td>°C</td></tr><tr><td><code>T_dry</code></td><td>temperature of a dry, non-transpiring surface</td><td>°C</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Crop Water Stress Index?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: canopy temperature of <strong>28.5</strong>°C, wet reference temperature of <strong>22</strong>°C, dry reference temperature of <strong>36</strong>°C.</p>
            <p>Substituting them into the formula gives crop water stress index of <strong>0.4643</strong>, estimated root-zone depletion of <strong>46.43</strong>%, stress class of <strong>1.39</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0 – 0.2</td><td><strong>No stress</strong></td><td>transpiring freely; irrigate on schedule</td></tr><tr><td>0.2 – 0.4</td><td><strong>Mild stress</strong></td><td>the usual trigger for scheduling</td></tr><tr><td>0.4 – 0.7</td><td><strong>Moderate stress</strong></td><td>yield is beginning to be affected</td></tr><tr><td>above 0.7</td><td><strong>Severe stress</strong></td><td>stomata closed; growth has stopped</td></tr></tbody></table>
            <ul><li><p>The wet and dry references can be measured (wet and dry paper discs beside the canopy) or computed from air temperature and humidity.</p></li><li><p>Thermal readings need to be taken near solar noon, from a nadir angle, with the canopy filling the field of view.</p></li><li><p>CWSI rises before visible wilting, which is the point: it gives a day or two of warning.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Measuring the canopy from an oblique angle, which mixes in soil temperature.</li><li>Using air temperature as the wet reference — a transpiring surface is usually cooler.</li><li>Comparing CWSI between days with very different vapour pressure deficits.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/crop-water-requirement">Crop water requirement</a>. <a href="/biology/stomatal-density">Stomatal density</a>. <a href="/biology/transpiration-rate">Transpiration rate</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What CWSI should trigger irrigation?', 'a' => 'Most scheduling programmes use 0.3–0.4 as the threshold; sensitive crops prefer the lower end.'],
            ['q' => 'Can CWSI be negative?', 'a' => 'Yes — a canopy cooler than the wet reference means unusually high transpiration, often after irrigation.'],
            ['q' => 'What does the Crop Water Stress Index actually calculate?', 'a' => <<<'TXT'
            It returns crop water stress index, estimated root-zone depletion and stress class. Each one is derived by the formula on this page, so you can check any figure by hand.
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
