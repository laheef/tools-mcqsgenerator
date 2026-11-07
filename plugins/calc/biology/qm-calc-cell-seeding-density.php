<?php

/**
 * Cell Seeding Density Calculator
 * /biology/cell-seeding-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell Seeding Density Calculator',
    'meta' => ['title' => 'Cell Seeding Density Calculator — Formula & Results', 'description' => 'Seeding density is the number of cells per unit area or volume you start a culture with. It returns cells per vessel, suspension to pipette per vessel, cells…', 'h1' => 'Cell Seeding Density Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'conc',
                            'label' => 'Stock concentration',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'help' => 'From your count',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1500000',
                        ],
                        [
                            'name' => 'target',
                            'label' => 'Target density',
                            'type' => 'number',
                            'suffix' => 'cells/cm²',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20000',
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Growth area per vessel',
                            'type' => 'number',
                            'suffix' => 'cm²',
                            'help' => 'T25 = 25, T75 = 75, 6-well = 9.6',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'vessels',
                            'label' => 'Number of vessels',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'medium',
                            'label' => 'Final volume per vessel',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'per_vessel',
                            'label' => 'Cells per vessel',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Suspension to pipette per vessel',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_cells',
                            'label' => 'Cells needed in total',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'medium_add',
                            'label' => 'Medium to add per vessel',
                            'type' => 'number',
                            'suffix' => 'mL',
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
            'title' => 'Seeding',
            'results' => ['per_vessel' => 'target*area', 'volume' => 'target*area/conc', 'total_cells' => 'target*area*vessels', 'medium_add' => 'medium-target*area/conc'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Seeding density is the number of cells per unit area or volume you start a culture with. It returns cells per vessel, suspension to pipette per vessel, cells needed in total and medium to add per vessel, and the panel shows all of them at once.
        
        Get it wrong and the experiment either takes a week to reach confluence or is confluent the next morning. This calculator turns a target density into the volume of suspension to pipette and the medium to add.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Cell Seeding Density', 'html' => <<<'TXT'
            <p>Cells per vessel = target density × growth area; volume = cells per vessel ÷ stock concentration</p>
            <figure class="calc-figure"><img src="/uploads/biology/cell-seeding-density.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Cell Seeding Density Calculator — Target density × area gives cells; divide by stock concentration for the volume." title="Cell Seeding Density Calculator"><figcaption>Target density × area gives cells; divide by stock concentration for the volume.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>target</code></td><td>cells per cm² you want to start with</td><td>cells/cm²</td></tr><tr><td><code>area</code></td><td>growth area of one flask or well</td><td>cm²</td></tr><tr><td><code>conc</code></td><td>stock concentration</td><td>cells/mL</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Cell Seeding Density?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: stock concentration of <strong>1,500,000</strong> cells/mL, target density of <strong>20,000</strong> cells/cm², growth area per vessel of <strong>25</strong> cm², number of vessels of <strong>1</strong>, final volume per vessel of <strong>5</strong> mL.</p>
            <p>Substituting them into the formula gives cells per vessel of <strong>500,000</strong> cells, suspension to pipette per vessel of <strong>0.3333</strong> mL, cells needed in total of <strong>500,000</strong> cells, medium to add per vessel of <strong>4.67</strong> mL.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>5 000 – 20 000 /cm²</td><td><strong>Sparse</strong></td><td>cloning, single-cell work</td></tr><tr><td>20 000 – 50 000 /cm²</td><td><strong>Standard</strong></td><td>routine passage of most lines</td></tr><tr><td>above 50 000 /cm²</td><td><strong>Dense</strong></td><td>fast experiments, or a line that needs contact</td></tr></tbody></table>
            <ul><li><p>Seeding density sets the time to confluence: doubling the density roughly halves it, which is often easier than changing the medium.</p></li><li><p>Growth area is the number that matters for adherent cells; the flask volume is just what fits over it.</p></li><li><p>For a first passage of a new line, seed two densities and keep the one that looks right on day two.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using the flask's nominal volume instead of its growth area.</li><li>Forgetting that the medium added dilutes the density — you seed cells into the final volume.</li><li>Seeding dead cells: always work from the live-cell count, not the total.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many cells should I seed in a 6-well plate?', 'a' => 'A well is about 9.6 cm², so 20 000 cells/cm² is roughly 190 000 cells per well.'],
            ['q' => 'Does seeding density affect the experiment?', 'a' => 'It changes growth rate, confluency timing and sometimes differentiation, so keep it constant across arms.'],
            ['q' => 'What does the Cell Seeding Density actually calculate?', 'a' => <<<'TXT'
            It returns cells per vessel, suspension to pipette per vessel, cells needed in total and medium to add per vessel. Each one is derived by the formula on this page, so you can check any figure by hand.
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
