<?php

/**
 * Lime Requirement Calculator
 * /biology/lime-requirement
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lime Requirement Calculator',
    'meta' => ['title' => 'Lime Requirement Calculator — Formula & Results', 'description' => <<<'TXT'
    Lime raises soil pH, and the amount needed depends on how far the pH must rise and how heavy the soil is. It returns lime required, as pure CaCO₃ equivalent…
    TXT, 'h1' => 'Lime Requirement Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'ph_now',
                            'label' => 'Current pH',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5.4',
                        ],
                        [
                            'name' => 'ph_target',
                            'label' => 'Target pH',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6.5',
                        ],
                        [
                            'name' => 'texture',
                            'label' => 'Soil texture',
                            'type' => 'select',
                            'options' => [
                                'Sand' => '1',
                                'Sandy loam' => '0.6',
                                'Loam' => '0.4',
                                'Clay loam' => '0.25',
                                'Clay' => '0.18',
                            ],
                            'control' => 'SELECT',
                            'default' => 'Loam',
                        ],
                        [
                            'name' => 'buffer',
                            'label' => 'Buffer index',
                            'type' => 'number',
                            'help' => 'From a lime requirement test; lower means more lime',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6.4',
                        ],
                        [
                            'name' => 'rate',
                            'label' => 'Lime required',
                            'type' => 'number',
                            'suffix' => 't/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pure_caco3',
                            'label' => 'As pure CaCO₃ equivalent',
                            'type' => 'number',
                            'suffix' => 't/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'splits',
                            'label' => 'Application splits recommended',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ph_gain',
                            'label' => 'pH increase per tonne',
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
            'title' => 'Lime',
            'results' => ['rate' => '(ph_target-ph_now)*buffer*texture', 'pure_caco3' => '(ph_target-ph_now)*buffer*texture*0.9', 'splits' => 'max(1,ceil((ph_target-ph_now)*buffer*texture/2))', 'ph_gain' => '(ph_target-ph_now)/((ph_target-ph_now)*buffer*texture)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Lime raises soil pH, and the amount needed depends on how far the pH must rise and how heavy the soil is. It returns lime required, as pure CaCO₃ equivalent, application splits recommended and pH increase per tonne, and the panel shows all of them at once.
        
        This calculator estimates the rate from a target pH and a buffer index, and warns when the change is large enough to split over seasons.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Lime Requirement', 'html' => <<<'TXT'
            <p>Lime (t/ha) ≈ (target pH − current pH) × buffer factor × texture factor</p>
            <figure class="calc-figure"><img src="/uploads/biology/lime-requirement.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Lime Requirement Calculator — Current pH, target pH and the lime between them." title="Lime Requirement Calculator"><figcaption>Current pH, target pH and the lime between them.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>ΔpH</code></td><td>change in pH required</td><td>pH units</td></tr><tr><td><code>buffer</code></td><td>buffer index from a soil test</td><td>—</td></tr><tr><td><code>texture</code></td><td>texture factor, 1.0 for sand down to 0.18 for clay</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Lime Requirement?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: current ph of <strong>5.4</strong>, target ph of <strong>6.5</strong>, soil texture set to <strong>Loam</strong>, buffer index of <strong>6.4</strong>.</p>
            <p>Substituting them into the formula gives lime required of <strong>2.82</strong> t/ha, as pure caco₃ equivalent of <strong>2.53</strong> t/ha, application splits recommended of <strong>2</strong>, ph increase per tonne of <strong>0.3906</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Clay soils need more lime per unit of pH because they have far more exchange sites to neutralise.</p></li><li><p>Lime moves slowly — about 2.5 cm a year in the profile — so a large requirement is split over two or three seasons rather than applied at once.</p></li><li><p>Use a buffer index test where available; the texture factor alone is a rough estimate.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Applying the full rate when the requirement exceeds 4–5 t/ha.</li><li>Lime and ammonium fertilizer applied in the same operation, which loses nitrogen as ammonia.</li><li>Chasing a high pH where the crop prefers acid soil — blueberries at pH 7 will be chlorotic.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/npk-fertilizer-blend">NPK fertilizer blend</a>. <a href="/biology/field-capacity">Field capacity</a>. <a href="/biology/crop-water-requirement">Crop water requirement</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much does pH rise per tonne of lime?', 'a' => 'About 0.1–0.3 pH units on a loam; much more on sand, much less on clay.'],
            ['q' => 'Does lime replace magnesium?', 'a' => 'Dolomitic lime does; calcitic lime does not, so check the soil test for magnesium.'],
            ['q' => 'What does the Lime Requirement actually calculate?', 'a' => <<<'TXT'
            It returns lime required, as pure CaCO₃ equivalent, application splits recommended and pH increase per tonne. Each one is derived by the formula on this page, so you can check any figure by hand.
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
