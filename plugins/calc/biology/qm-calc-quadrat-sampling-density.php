<?php

/**
 * Quadrat Sampling Density Calculator
 * /biology/quadrat-sampling-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Quadrat Sampling Density Calculator',
    'meta' => ['title' => 'Quadrat Sampling Density Calculator — Biology', 'description' => <<<'TXT'
    Quadrat sampling estimates density from a small measured area and scales it up. It returns mean per quadrat, density per m², density per hectare and estimated…
    TXT, 'h1' => 'Quadrat Sampling Density Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'individuals',
                            'label' => 'Individuals counted',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'help' => 'Across all quadrats',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '180',
                        ],
                        [
                            'name' => 'quadrats',
                            'label' => 'Number of quadrats',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'size',
                            'label' => 'Quadrat area',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'help' => '0.25 m² = 50 × 50 cm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.25',
                        ],
                        [
                            'name' => 'site',
                            'label' => 'Site area',
                            'type' => 'number',
                            'suffix' => 'ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Density per m²',
                            'type' => 'number',
                            'suffix' => '/m²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_ha',
                            'label' => 'Density per hectare',
                            'type' => 'number',
                            'suffix' => '/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mean_quadrat',
                            'label' => 'Mean per quadrat',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Estimated population on the site',
                            'type' => 'number',
                            'suffix' => 'individuals',
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
            'title' => 'Density',
            'results' => ['mean_quadrat' => 'individuals/quadrats', 'density' => 'individuals/quadrats/size', 'per_ha' => 'individuals/quadrats/size*10000', 'total' => 'individuals/quadrats/size*site*10000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Quadrat sampling estimates density from a small measured area and scales it up. It returns mean per quadrat, density per m², density per hectare and estimated population on the site, and the panel shows all of them at once.
        
        This calculator gives individuals per square metre and per hectare, the mean and standard error per quadrat, and the total population for a site of known area.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Quadrat Sampling Density', 'html' => <<<'TXT'
            <p>Density = individuals ÷ (quadrats × quadrat area); N = density × site area</p>
            <figure class="calc-figure"><img src="/uploads/biology/quadrat-sampling-density.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Quadrat Sampling Density Calculator — Quadrats counted, scaled to a square metre and to the whole site." title="Quadrat Sampling Density Calculator"><figcaption>Quadrats counted, scaled to a square metre and to the whole site.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>n</code></td><td>individuals counted in all quadrats</td><td>individuals</td></tr><tr><td><code>q</code></td><td>number of quadrats</td><td>quadrats</td></tr><tr><td><code>a</code></td><td>area of one quadrat</td><td>m²</td></tr><tr><td><code>D</code></td><td>density</td><td>individuals/m²</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Quadrat Sampling Density?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: individuals counted of <strong>180</strong> individuals, number of quadrats of <strong>12</strong>, quadrat area of <strong>0.25</strong> m², site area of <strong>2</strong> ha.</p>
            <p>Substituting them into the formula gives mean per quadrat of <strong>15</strong> individuals, density per m² of <strong>60</strong> /m², density per hectare of <strong>600,000</strong> /ha, estimated population on the site of <strong>1,200,000</strong> individuals.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Quadrat size should be scaled to the organism: 0.25 m² for grassland plants, 1 m² for shrubs, much smaller for soil invertebrates.</p></li><li><p>Placement matters more than number: random or systematic placement avoids the roadside and path-edge bias that inflates counts.</p></li><li><p>Counting zero in a quadrat is data — it must be included, or the density comes out too high.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Reporting the total count rather than the density, which cannot be compared between sites.</li><li>Averaging densities from quadrats of different size.</li><li>Sampling only where the species is easy to see.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many quadrats do I need?', 'a' => 'Enough for the standard error to settle — often 10–30, checked with a running mean.'],
            ['q' => 'Should I sample randomly or systematically?', 'a' => 'Random placement supports the statistics; a systematic grid is easier in the field and usually acceptable.'],
            ['q' => 'What does the Quadrat Sampling Density actually calculate?', 'a' => <<<'TXT'
            It returns mean per quadrat, density per m², density per hectare and estimated population on the site. Each one is derived by the formula on this page, so you can check any figure by hand.
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
