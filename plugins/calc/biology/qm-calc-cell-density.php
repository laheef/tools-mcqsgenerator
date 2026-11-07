<?php

/**
 * Cell Density Calculator
 * /biology/cell-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell Density Calculator',
    'meta' => ['title' => 'Cell Density Calculator — Formula & Results', 'description' => 'Cell density is cells per millilitre of culture, and it decides when to split, how to seed and whether a culture is in log phase. It returns cell density…', 'h1' => 'Cell Density Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'cells_counted',
                            'label' => 'Cells counted',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '300',
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
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Growth area',
                            'type' => 'number',
                            'suffix' => 'cm²',
                            'help' => 'T25 = 25, T75 = 75, 6-well ≈ 9.6 per well',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Cell density',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_cm2',
                            'label' => 'Density per area',
                            'type' => 'number',
                            'suffix' => 'cells/cm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'od',
                            'label' => 'OD600',
                            'type' => 'number',
                            'help' => 'For bacterial cultures only',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.6',
                        ],
                        [
                            'name' => 'od_cells',
                            'label' => 'Cells/mL from OD600',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
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
            'results' => ['density' => 'cells_counted/squares*dilution*10000', 'per_cm2' => 'cells_counted/squares*dilution*10000/area', 'od_cells' => 'od*800000000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cell density is cells per millilitre of culture, and it decides when to split, how to seed and whether a culture is in log phase. It returns cell density, density per area and cells/mL from OD600, and the panel shows all of them at once.
        
        This calculator converts counts, haemocytometer readings and OD600 values into cells/mL and cells/cm².
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Cell Density', 'html' => <<<'TXT'
            <p>Cells/mL = (count ÷ squares) × dilution × 10⁴; for E. coli, 1 OD600 ≈ 8 × 10⁸ cells/mL</p>
            <figure class="calc-figure"><img src="/uploads/biology/cell-density.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Cell Density Calculator — Counts, dilution and growth area give density per mL and per cm²." title="Cell Density Calculator"><figcaption>Counts, dilution and growth area give density per mL and per cm².</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>cells_counted</code></td><td>cells counted</td><td>cells</td></tr><tr><td><code>dilution</code></td><td>dilution before counting</td><td>×</td></tr><tr><td><code>OD600</code></td><td>optical density at 600 nm</td><td>AU</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Cell Density?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: cells counted of <strong>300</strong> cells, squares counted of <strong>4</strong>, dilution factor of <strong>1</strong> ×, growth area of <strong>25</strong> cm², od600 of <strong>0.6</strong>.</p>
            <p>Substituting them into the formula gives cell density of <strong>750,000</strong> cells/mL, density per area of <strong>30,000</strong> cells/cm², cells/ml from od600 of <strong>480,000,000</strong> cells/mL.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0.6 – 1.0 ×10⁶/mL</td><td><strong>Low</strong></td><td>sparse; split less or seed more</td></tr><tr><td>1 – 5 ×10⁶/mL</td><td><strong>Log phase</strong></td><td>healthy adherent culture ready to passage</td></tr><tr><td>above 10⁷/mL</td><td><strong>Confluent / stationary</strong></td><td>split now</td></tr></tbody></table>
            <ul><li><p>The OD600 conversion is species-specific: 8 × 10⁸ cells/mL per OD unit is a working figure for E. coli, and yeast is roughly 3 × 10⁷.</p></li><li><p>Adherent cultures are usually quoted per cm², suspension cultures per mL; the growth area box converts between them.</p></li><li><p>Confluence is a visual estimate; density is the measurement. They disagree most in heterogeneous cultures.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Using OD600 for eukaryotic cells, where it means almost nothing.</li><li>Reading OD600 above 1.0 without diluting, where the relationship stops being linear.</li><li>Quoting cells/mL for an adherent culture without the area.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/hemocytometer-cell-counter">Hemocytometer counter</a>. <a href="/biology/od600-to-cell-density">OD600 to cell density</a>. <a href="/biology/cell-seeding-density">Cell seeding density</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a normal cell density for a T75 flask?', 'a' => 'About 1–2 × 10⁶ cells/mL at 80% confluence, or roughly 8 × 10⁴ cells/cm².'],
            ['q' => 'Why is my OD600 reading not linear?', 'a' => 'Above about 1.0 the detector saturates; dilute tenfold and multiply.'],
            ['q' => 'What does the Cell Density actually calculate?', 'a' => 'It returns cell density, density per area and cells/mL from OD600. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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
