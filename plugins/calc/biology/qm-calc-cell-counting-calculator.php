<?php

/**
 * Cell Counting Calculator
 * /biology/cell-counting-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell Counting Calculator',
    'meta' => ['title' => 'Cell Counting Calculator — Formula & Results', 'description' => 'Cell counting turns a haemocytometer count, a dilution and a suspension volume into cells per mL. It returns concentration, total cells available, volume to…', 'h1' => 'Cell Counting Calculator', 'updated' => '2026-10-29'],
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
                            'default' => '340',
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
                            'name' => 'volume',
                            'label' => 'Suspension volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'target',
                            'label' => 'Cells needed',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'help' => 'For the next flask or plate',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2000000',
                        ],
                        [
                            'name' => 'conc',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total cells available',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'take',
                            'label' => 'Volume to take',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'vessels',
                            'label' => 'Wells at 100 000 per well',
                            'type' => 'number',
                            'suffix' => 'wells',
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
            'title' => 'Counting',
            'results' => ['conc' => 'cells_counted/squares*dilution*10000', 'total' => 'cells_counted/squares*dilution*10000*volume', 'take' => 'target/(cells_counted/squares*dilution*10000)', 'vessels' => 'cells_counted/squares*dilution*10000*volume/100000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cell counting turns a haemocytometer count, a dilution and a suspension volume into cells per mL. It returns concentration, total cells available, volume to take and wells at 100 000 per well, and the panel shows all of them at once.
        
        It also returns the total cells in the suspension and the volume to take for a target number of cells.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Cell Counting', 'html' => <<<'TXT'
            <p>Cells/mL = (count ÷ squares) × dilution × 10⁴; volume to take = cells needed ÷ cells/mL</p>
            <figure class="calc-figure"><img src="/uploads/biology/cell-counting-calculator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Cell Counting Calculator — Count, dilution and volume give concentration and yield." title="Cell Counting Calculator"><figcaption>Count, dilution and volume give concentration and yield.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>cells_counted</code></td><td>cells counted</td><td>cells</td></tr><tr><td><code>squares</code></td><td>large squares counted</td><td>—</td></tr><tr><td><code>conc</code></td><td>cell density</td><td>cells/mL</td></tr><tr><td><code>take</code></td><td>volume of suspension to pipette</td><td>mL</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Cell Counting?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: cells counted of <strong>340</strong> cells, squares counted of <strong>4</strong>, dilution factor of <strong>1</strong> ×, suspension volume of <strong>12</strong> mL, cells needed of <strong>2,000,000</strong> cells.</p>
            <p>Substituting them into the formula gives concentration of <strong>850,000</strong> cells/mL, total cells available of <strong>10,200,000</strong> cells, volume to take of <strong>2.35</strong> mL, wells at 100 000 per well of <strong>102</strong> wells.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Count twice, from two separate loadings, and average: the difference between loadings is a better error estimate than any single count.</p></li><li><p>Take the volume with a pipette that is appropriate for it — 20 µL out of 12 mL carries a much larger relative error than 2 mL.</p></li><li><p>If the count varies by more than 15% between loadings, the suspension is not homogeneous: triturate and start again.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Using the average of counts taken from the same loading as if they were independent.</li><li>Forgetting that the dilution factor applies to every downstream number.</li><li>Seeding by volume rather than by cell number, which drifts as the culture grows.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/hemocytometer-cell-counter">Hemocytometer counter</a>. <a href="/biology/cell-seeding-density">Cell seeding density</a>. <a href="/biology/cell-doubling-time">Cell doubling time</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How precise is a haemocytometer count?', 'a' => 'About 10–15% between operators when 100–200 cells are counted per square.'],
            ['q' => 'Should I count before or after dilution?', 'a' => 'Count after all dilutions and record the total factor; that is what the calculation needs.'],
            ['q' => 'What does the Cell Counting actually calculate?', 'a' => <<<'TXT'
            It returns concentration, total cells available, volume to take and wells at 100 000 per well. Each one is derived by the formula on this page, so you can check any figure by hand.
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
