<?php

/**
 * Western Blot Protein Loading Calculator
 * /biology/western-blot-loading
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Western Blot Protein Loading Calculator',
    'meta' => ['title' => 'Western Blot Protein Loading Calculator — Biology', 'description' => <<<'TXT'
    How much lysate to load per lane, and how much of it is your protein of interest. It returns lysate volume per lane, protein needed in total, lysate needed in…
    TXT, 'h1' => 'Western Blot Protein Loading Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'conc_mg_ml',
                            'label' => 'Lysate concentration',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
                            'help' => 'From a BCA or Bradford assay',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'per_lane_ug',
                            'label' => 'Protein per lane',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'help' => '20–30 µg for a whole lysate',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'lanes',
                            'label' => 'Number of lanes',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'sample_ul',
                            'label' => 'Lysate volume per lane',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_ug',
                            'label' => 'Protein needed in total',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'help' => 'Includes the spare lanes for the ladder',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_ul',
                            'label' => 'Lysate needed in total',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'loading_ug_ul',
                            'label' => 'Final loading concentration',
                            'type' => 'number',
                            'suffix' => 'µg/µL',
                            'help' => 'After adding sample buffer',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'target_pct',
                            'label' => 'Share that is your target',
                            'type' => 'number',
                            'suffix' => 'of total',
                            'help' => '0.01 means 1% of the lysate',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.01',
                        ],
                        [
                            'name' => 'target_ng',
                            'label' => 'Target protein per lane',
                            'type' => 'number',
                            'suffix' => 'ng',
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
            'title' => 'Loading',
            'results' => [
                'sample_ul' => 'per_lane_ug/conc_mg_ml',
                'total_ug' => 'per_lane_ug*lanes',
                'total_ul' => 'total_ug/conc_mg_ml',
                'loading_ug_ul' => 'per_lane_ug/(sample_ul*1.25)',
                'target_ng' => 'per_lane_ug*target_pct*1000',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        How much lysate to load per lane, and how much of it is your protein of interest. It returns lysate volume per lane, protein needed in total, lysate needed in total and final loading concentration, and the panel shows all of them at once.
        
        It turns a protein concentration in mg/mL into the microlitres for 20 µg per lane, works out how many cells that represents, and checks that the band will be inside the linear range of the detector.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Western Blot Protein Loading', 'html' => <<<'TXT'
            <p>Lysate per lane (µL) = protein per lane (µg) ÷ concentration (mg/mL). Target mass = total protein × fraction that is the target</p>
            <figure class="calc-figure"><img src="/uploads/biology/western-blot-loading.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Western Blot Protein Loading Calculator — Lysate volume per lane from a 2 mg/mL stock" title="Western Blot Protein Loading Calculator"><figcaption>Lysate volume per lane from a 2 mg/mL stock</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>mg/mL</code></td><td>protein concentration of the lysate</td><td>g/L</td></tr><tr><td><code>µg/lane</code></td><td>total protein loaded in one well</td><td>µg</td></tr><tr><td><code>target</code></td><td>the fraction of the lysate that is the protein you are blotting</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Western Blot Protein Loading?', 'html' => <<<'TXT'
            <ol><li>Enter the concentration of each lysate from the protein assay.</li><li>Set the protein you want per lane and how many lanes you will run.</li><li>Read the volume to pipette, the total lysate needed and the mass of your target protein.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: lysate concentration of <strong>2</strong> mg/mL, protein per lane of <strong>20</strong> µg, number of lanes of <strong>10</strong>, share that is your target of <strong>0.01</strong> of total.</p>
            <p>Substituting them into the formula gives lysate volume per lane of <strong>10</strong> µL, protein needed in total of <strong>200</strong> µg, lysate needed in total of <strong>100</strong> µL, final loading concentration of <strong>1.6</strong> µg/µL, target protein per lane of <strong>200</strong> ng.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>10 – 30 µg/lane</td><td><strong>Whole lysate</strong></td><td>enough to see a moderately expressed protein</td></tr><tr><td>1 – 5 µg/lane</td><td><strong>Immunoprecipitation</strong></td><td>a purified or enriched sample</td></tr><tr><td>under 1 µg/lane</td><td><strong>Too little</strong></td><td>the signal disappears into the background</td></tr></tbody></table>
            <ul><li><p>Loading equal total protein per lane is what makes a blot quantitative. Measure every sample in the same assay, on the same plate, at the same time.</p></li><li><p>A 1 mL lysate at 2 mg/mL gives 2 mg of protein — enough for 100 lanes at 20 µg, which is why a single mini-prep covers a whole experiment.</p></li><li><p>Overloading saturates the detector: bands stop being proportional above about 40 µg of a complex lysate on a mini gel.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Loading equal volume instead of equal protein, which makes a loading control meaningless.</li><li>Boiling a membrane protein for ten minutes, which aggregates it at the top of the gel.</li><li>Comparing band intensities from a blot that was stripped and reprobed twice.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much protein should I load?', 'a' => '20–30 µg of a whole lysate per lane on a mini gel; less for a purified sample.'],
            ['q' => 'How do I load equal amounts?', 'a' => 'Divide the protein per lane by each sample\'s concentration; the volumes will differ and that is correct.'],
            ['q' => 'How many cells is 20 µg of lysate?', 'a' => 'Roughly 200 000 cells, since a mammalian cell contains about 100 pg of protein.'],
            ['q' => 'What does the Western Blot Protein Loading actually calculate?', 'a' => <<<'TXT'
            It returns lysate volume per lane, protein needed in total, lysate needed in total and final loading concentration. Each one is derived by the formula on this page, so you can check any figure by hand.
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
