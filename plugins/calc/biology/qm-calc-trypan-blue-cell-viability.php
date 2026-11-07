<?php

/**
 * Trypan Blue Cell Viability Calculator
 * /biology/trypan-blue-cell-viability
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Trypan Blue Cell Viability Calculator',
    'meta' => ['title' => 'Trypan Blue Cell Viability Calculator — Biology', 'description' => 'Trypan blue viability is live cells divided by live plus dead cells, as a percentage. It returns viability, live cell concentration and live cells in 10 mL…', 'h1' => 'Trypan Blue Cell Viability Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'live',
                            'label' => 'Live cells counted',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '280',
                        ],
                        [
                            'name' => 'dead',
                            'label' => 'Dead cells counted',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'squares',
                            'label' => 'Squares counted',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Dilution factor',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => 'Includes the trypan blue mix',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'viability',
                            'label' => 'Viability',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'live_conc',
                            'label' => 'Live cell concentration',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_live',
                            'label' => 'Live cells in 10 mL',
                            'type' => 'number',
                            'suffix' => 'cells',
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
            'title' => 'Viability',
            'results' => ['viability' => 'live/(live+dead)*100', 'live_conc' => 'live/squares*dilution*10000', 'total_live' => 'live/squares*dilution*10000*10'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Trypan blue viability is live cells divided by live plus dead cells, as a percentage. It returns viability, live cell concentration and live cells in 10 mL, and the panel shows all of them at once.
        
        The same count, corrected for the squares counted and the dilution, gives the live cell concentration and the live cells in a fixed volume.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Trypan Blue Cell Viability', 'html' => <<<'TXT'
            <p>Viability (%) = live ÷ (live + dead) × 100; live cells/mL = (live ÷ squares) × dilution × 10⁴</p>
            <figure class="calc-figure"><img src="/uploads/biology/trypan-blue-cell-viability.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Trypan Blue Cell Viability Calculator — Live and dead counts give the percentage and the density." title="Trypan Blue Cell Viability Calculator"><figcaption>Live and dead counts give the percentage and the density.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>live</code></td><td>unstained, refractile cells</td><td>cells</td></tr><tr><td><code>dead</code></td><td>blue-stained cells</td><td>cells</td></tr><tr><td><code>dilution</code></td><td>total dilution including the dye</td><td>×</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Trypan Blue Cell Viability?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: live cells counted of <strong>280</strong> cells, dead cells counted of <strong>40</strong> cells, squares counted of <strong>4</strong>, dilution factor of <strong>2</strong> ×.</p>
            <p>Substituting them into the formula gives viability of <strong>87.5</strong>%, live cell concentration of <strong>1,400,000</strong> cells/mL, live cells in 10 ml of <strong>14,000,000</strong> cells.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>above 95%</td><td><strong>Healthy</strong></td><td>typical of a log-phase culture</td></tr><tr><td>85 – 95%</td><td><strong>Acceptable</strong></td><td>fine for most assays</td></tr><tr><td>below 85%</td><td><strong>Poor</strong></td><td>check handling, medium and time since harvest</td></tr></tbody></table>
            <ul><li><p>Count within five minutes of adding the dye: longer and live cells start taking it up.</p></li><li><p>Viability by dye exclusion overestimates health — a stressed cell that still excludes dye counts as live. Pair it with growth or an ATP assay for anything critical.</p></li><li><p>Report live-cell density, not total, whenever you seed a plate: dead cells do not divide.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Forgetting the dye dilution in the concentration calculation.</li><li>Counting too few cells, which makes the percentage jump by several points per cell.</li><li>Leaving the haemocytometer to dry between samples, which concentrates the cells.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why do my live cells look blue?', 'a' => 'They have been in the dye too long, or the suspension is acidic. Recount within five minutes.'],
            ['q' => 'Is trypan blue toxic to cells?', 'a' => 'It is excluded by intact membranes but is cytotoxic over time, so count before plating.'],
            ['q' => 'What does the Trypan Blue Cell Viability actually calculate?', 'a' => 'It returns viability, live cell concentration and live cells in 10 mL. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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
