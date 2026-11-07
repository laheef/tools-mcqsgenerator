<?php

/**
 * Photosynthesis Rate Calculator
 * /biology/photosynthesis-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Photosynthesis Rate Calculator',
    'meta' => ['title' => 'Photosynthesis Rate Calculator — Formula & Results', 'description' => 'Photosynthesis rate is the carbon fixed per unit leaf area per unit time. It returns carbon fixed, rate, daily carbon gain at this rate and dry matter…', 'h1' => 'Photosynthesis Rate Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'a',
                            'label' => 'Net assimilation rate',
                            'type' => 'number',
                            'suffix' => 'µmol CO₂/m²/s',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Leaf area',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.02',
                        ],
                        [
                            'name' => 'minutes',
                            'label' => 'Measurement period',
                            'type' => 'number',
                            'suffix' => 'min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'umol',
                            'label' => 'Carbon fixed',
                            'type' => 'number',
                            'suffix' => 'µmol CO₂',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mg_dm2_h',
                            'label' => 'Rate',
                            'type' => 'number',
                            'suffix' => 'mg CO₂/dm²/h',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'g_m2_day',
                            'label' => 'Daily carbon gain at this rate',
                            'type' => 'number',
                            'suffix' => 'g C/m²/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'biomass',
                            'label' => 'Dry matter equivalent per day',
                            'type' => 'number',
                            'suffix' => 'g/m²/day',
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
            'results' => ['umol' => 'a*area*minutes*60', 'mg_dm2_h' => 'a*1.584', 'g_m2_day' => 'a*0.012*86400/1000000*12', 'biomass' => 'a*0.012*86400/1000000*12*2.2'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Photosynthesis rate is the carbon fixed per unit leaf area per unit time. It returns carbon fixed, rate, daily carbon gain at this rate and dry matter equivalent per day, and the panel shows all of them at once.
        
        This calculator converts between the ways it is reported — µmol CO₂ per m² per second, mg CO₂ per dm² per hour and grams of dry matter — so measurements from a gas analyser can be compared with growth data.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Photosynthesis Rate', 'html' => <<<'TXT'
            <p>1 µmol CO₂/m²/s ≈ 1.584 mg CO₂/dm²/h</p>
            <figure class="calc-figure"><img src="/uploads/biology/photosynthesis-rate.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Photosynthesis Rate Calculator — Leaf-level assimilation scaled to carbon and dry matter." title="Photosynthesis Rate Calculator"><figcaption>Leaf-level assimilation scaled to carbon and dry matter.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>A</code></td><td>net assimilation rate</td><td>µmol CO₂/m²/s</td></tr><tr><td><code>44</code></td><td>molar mass of CO₂, g/mol</td><td>g/mol</td></tr><tr><td><code>12</code></td><td>molar mass of carbon</td><td>g/mol</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Photosynthesis Rate?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: net assimilation rate of <strong>12</strong> µmol CO₂/m²/s, leaf area of <strong>0.02</strong> m², measurement period of <strong>10</strong> min.</p>
            <p>Substituting them into the formula gives carbon fixed of <strong>144</strong> µmol CO₂, rate of <strong>19.01</strong> mg CO₂/dm²/h, daily carbon gain at this rate of <strong>0.1493</strong> g C/m²/day, dry matter equivalent per day of <strong>0.3285</strong> g/m²/day.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Net assimilation is photosynthesis minus leaf respiration; gross photosynthesis is higher, and the difference is largest in shade leaves.</p></li><li><p>The 1.584 factor converts µmol CO₂ m⁻² s⁻¹ to mg CO₂ dm⁻² h⁻¹ and is worth remembering — it is 44 ÷ 1 000 × 36.</p></li><li><p>Extrapolating a leaf-level rate to a canopy overstates it, because lower leaves are shaded and older.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Comparing a net rate with a gross rate.</li><li>Extrapolating a mid-morning measurement across a whole day.</li><li>Using leaf area measured flat when the leaf was held at an angle.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/net-primary-productivity">Net primary productivity</a>. <a href="/biology/transpiration-rate">Transpiration rate</a>. <a href="/biology/stomatal-density">Stomatal density</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a typical photosynthesis rate?', 'a' => '10–25 µmol CO₂/m²/s for healthy C3 crop leaves in full sun; C4 grasses can exceed 40.'],
            ['q' => 'Why is the rate lower at midday?', 'a' => 'Stomatal closure under high vapour pressure deficit and photorespiration both reduce it.'],
            ['q' => 'What does the Photosynthesis Rate actually calculate?', 'a' => <<<'TXT'
            It returns carbon fixed, rate, daily carbon gain at this rate and dry matter equivalent per day. Each one is derived by the formula on this page, so you can check any figure by hand.
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
