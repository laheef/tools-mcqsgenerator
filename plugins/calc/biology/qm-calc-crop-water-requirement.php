<?php

/**
 * Crop Water Requirement Calculator (ETc)
 * /biology/crop-water-requirement
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Crop Water Requirement Calculator (ETc)',
    'meta' => ['title' => 'Crop Water Requirement Calculator (ETc) — Biology', 'description' => 'A crop\'s water use is the reference evapotranspiration multiplied by a crop coefficient: ETc = Kc × ETo. It returns crop water use, seasonal use (120 days)…', 'h1' => 'Crop Water Requirement Calculator (ETc)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'eto',
                            'label' => 'Reference evapotranspiration (ETo)',
                            'type' => 'number',
                            'suffix' => 'mm/day',
                            'help' => 'From a weather station or FAO-56',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5.4',
                        ],
                        [
                            'name' => 'kc',
                            'label' => 'Crop coefficient (Kc)',
                            'type' => 'number',
                            'help' => '1.05 is a typical mid-season value',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.05',
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Area',
                            'type' => 'number',
                            'suffix' => 'ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'efficiency',
                            'label' => 'Irrigation efficiency',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Drip 90%, sprinkler 75%, furrow 60%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '80',
                        ],
                        [
                            'name' => 'etc',
                            'label' => 'Crop water use',
                            'type' => 'number',
                            'suffix' => 'mm/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'season',
                            'label' => 'Seasonal use (120 days)',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Volume to apply per hectare',
                            'type' => 'number',
                            'suffix' => 'm³/ha/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hours',
                            'label' => 'Hours a 10 m³/h system must run',
                            'type' => 'number',
                            'suffix' => 'h',
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
            'title' => 'Water use',
            'results' => ['etc' => 'eto*kc', 'season' => 'eto*kc*120', 'volume' => 'eto*kc*10/(efficiency/100)', 'hours' => 'eto*kc*10/(efficiency/100)/area/10'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A crop's water use is the reference evapotranspiration multiplied by a crop coefficient: ETc = Kc × ETo. It returns crop water use, seasonal use (120 days), volume to apply per hectare and hours a 10 m³/h system must run, and the panel shows all of them at once.
        
        This calculator gives daily and seasonal water use per hectare, the irrigation volume and how long a system must run to deliver it.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Crop Water Requirement (ETc)', 'html' => <<<'TXT'
            <p>ETc = Kc × ETo; volume (m³/ha) = ETc (mm) × 10 ÷ efficiency</p>
            <figure class="calc-figure"><img src="/uploads/biology/crop-water-requirement.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Crop Water Requirement Calculator (ETc) — Reference ET, the crop coefficient, and the water it implies." title="Crop Water Requirement Calculator (ETc)"><figcaption>Reference ET, the crop coefficient, and the water it implies.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>ETo</code></td><td>reference evapotranspiration</td><td>mm/day</td></tr><tr><td><code>Kc</code></td><td>crop coefficient for the growth stage</td><td>—</td></tr><tr><td><code>ETc</code></td><td>crop evapotranspiration</td><td>mm/day</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Crop Water Requirement (ETc)?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: reference evapotranspiration (eto) of <strong>5.4</strong> mm/day, crop coefficient (kc) of <strong>1.05</strong>, area of <strong>1</strong> ha, irrigation efficiency of <strong>80</strong>%.</p>
            <p>Substituting them into the formula gives crop water use of <strong>5.67</strong> mm/day, seasonal use (120 days) of <strong>680.4</strong> mm, volume to apply per hectare of <strong>70.88</strong> m³/ha/day, hours a 10 m³/h system must run of <strong>7.09</strong> h.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>One millimetre over one hectare is 10 m³ of water — the conversion that makes irrigation arithmetic easy.</p></li><li><p>Kc changes through the season: about 0.3 at emergence, 1.0–1.2 at mid-season, and falling as the crop senesces.</p></li><li><p>Irrigation efficiency divides the requirement: 80% efficiency means a fifth of the water never reaches the root zone.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Using a single Kc for the whole season.</li><li>Treating mm as litres per square metre — they are numerically equal, which is a help, not a licence to mix the units.</li><li>Ignoring rainfall, which reduces the irrigation requirement.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a typical Kc?', 'a' => '0.3 for bare soil, 0.7 for early growth, 1.0–1.2 at full canopy, 0.5 at senescence.'],
            ['q' => 'How much water is 5 mm/day per hectare?', 'a' => '50 m³ per hectare per day.'],
            ['q' => 'What does the Crop Water Requirement (ETc) actually calculate?', 'a' => <<<'TXT'
            It returns crop water use, seasonal use (120 days), volume to apply per hectare and hours a 10 m³/h system must run. Each one is derived by the formula on this page, so you can check any figure by hand.
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
