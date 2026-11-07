<?php

/**
 * NDVI Calculator (Normalised Difference Vegetation Index)
 * /biology/ndvi-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'NDVI Calculator (Normalised Difference Vegetation Index)',
    'meta' => ['title' => 'NDVI Calculator (Normalised Difference Vegetation', 'description' => 'NDVI compares near-infrared with red reflectance: healthy vegetation reflects strongly in the near-infrared and absorbs red. It returns NDVI, EVI…', 'h1' => 'NDVI Calculator (Normalised Difference Vegetation Index)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'nir',
                            'label' => 'Near-infrared reflectance',
                            'type' => 'number',
                            'help' => '0 to 1',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.42',
                        ],
                        [
                            'name' => 'red',
                            'label' => 'Red reflectance',
                            'type' => 'number',
                            'help' => '0 to 1',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.08',
                        ],
                        [
                            'name' => 'ndvi',
                            'label' => 'NDVI',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'evi',
                            'label' => 'EVI approximation',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cover',
                            'label' => 'Estimated fractional cover',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'class_no',
                            'label' => 'Surface class (0 water … 6 very dense)',
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
            'title' => 'Vegetation',
            'results' => ['ndvi' => '(nir-red)/(nir+red)', 'evi' => '2.5*(nir-red)/(nir+6*red+1)', 'cover' => 'pow(max(0,(nir-red)/(nir+red)),0.6)*100', 'class_no' => <<<'TXT'
            if_else((nir+red)==0,-1,if_else((nir-red)/(nir+red)<0,0,if_else((nir-red)/(nir+red)<0.1,1,if_else((nir-red)/(nir+red)<0.2,2,if_else((nir-red)/(nir+red)<0.4,3,if_else((nir-red)/(nir+red)<0.6,4,if_else((nir-red)/(nir+red)<0.8,5,6)))))))
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        NDVI compares near-infrared with red reflectance: healthy vegetation reflects strongly in the near-infrared and absorbs red. It returns NDVI, EVI approximation, estimated fractional cover and surface class (0 water … 6 very dense), and the panel shows all of them at once.
        
        The result runs from −1 to +1 and is the most widely used satellite index of vegetation vigour.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the NDVI (Normalised Difference Vegetation Index)', 'html' => <<<'TXT'
            <p>NDVI = (NIR − Red) ÷ (NIR + Red)</p>
            <figure class="calc-figure"><img src="/uploads/biology/ndvi-calculator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: NDVI Calculator (Normalised Difference Vegetation Index) — Where the index falls between soil and dense canopy." title="NDVI Calculator (Normalised Difference Vegetation Index)"><figcaption>Where the index falls between soil and dense canopy.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>NIR</code></td><td>near-infrared reflectance</td><td>0–1</td></tr><tr><td><code>Red</code></td><td>red reflectance</td><td>0–1</td></tr><tr><td><code>NDVI</code></td><td>normalised difference vegetation index</td><td>−1 to 1</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the NDVI (Normalised Difference Vegetation Index)?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: near-infrared reflectance of <strong>0.42</strong>, red reflectance of <strong>0.08</strong>.</p>
            <p>Substituting them into the formula gives ndvi of <strong>0.68</strong>, evi approximation of <strong>0.4474</strong>, estimated fractional cover of <strong>79.34</strong>%, surface class (0 water … 6 very dense) of <strong>5</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>−1 to 0 (class 0)</td><td><strong>Water, snow, cloud</strong></td><td>no vegetation signal</td></tr><tr><td>0 – 0.1 (class 1)</td><td><strong>Barren</strong></td><td>rock, sand, built-up</td></tr><tr><td>0.1 – 0.2 (class 2)</td><td><strong>Sparse</strong></td><td>bare soil with scattered plants</td></tr><tr><td>0.2 – 0.4 (class 3)</td><td><strong>Shrub and early crop</strong></td><td>dry grassland</td></tr><tr><td>0.4 – 0.6 (class 4)</td><td><strong>Moderate canopy</strong></td><td>growing crop</td></tr><tr><td>0.6 – 0.8 (class 5)</td><td><strong>Dense</strong></td><td>closed canopy at peak season</td></tr><tr><td>0.8 – 1 (class 6)</td><td><strong>Very dense</strong></td><td>rainforest or irrigated crop at full cover</td></tr></tbody></table>
            <ul><li><p>NDVI saturates in dense canopies: above a leaf area index of about 3 it stops rising, which is why EVI was developed.</p></li><li><p>Atmospheric haze and thin cloud lower NDVI without changing the ground; compositing several dates reduces that.</p></li><li><p>Values are only comparable when computed from the same sensor and the same processing baseline — an NDVI from Landsat and one from Sentinel-2 need harmonising.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Mixing reflectance scaled 0–255 with reflectance scaled 0–1.</li><li>Comparing a growing-season maximum with an off-season image.</li><li>Reading NDVI as biomass in a saturated canopy.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a good NDVI?', 'a' => '0.6–0.8 for healthy dense crops; below 0.3 suggests bare soil or severe stress.'],
            ['q' => 'Why is NDVI negative over water?', 'a' => 'Water absorbs near-infrared much more strongly than red, so NIR − Red goes negative.'],
            ['q' => 'What does the NDVI (Normalised Difference Vegetation Index) actually calculate?', 'a' => <<<'TXT'
            It returns NDVI, EVI approximation, estimated fractional cover and surface class (0 water … 6 very dense). Each one is derived by the formula on this page, so you can check any figure by hand.
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
