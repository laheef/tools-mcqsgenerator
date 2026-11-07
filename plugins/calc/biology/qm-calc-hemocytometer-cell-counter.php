<?php

/**
 * Hemocytometer Cell Counter (cells/mL)
 * /biology/hemocytometer-cell-counter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hemocytometer Cell Counter (cells/mL)',
    'meta' => ['title' => 'Hemocytometer Cell Counter (cells/mL) Calculator', 'description' => 'A hemocytometer turns a counted number of cells into a concentration using one physical fact: each large square holds 0.1 µL. It returns cell concentration…', 'h1' => 'Hemocytometer Cell Counter (cells/mL)', 'updated' => '2026-10-29'],
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
                            'label' => 'Total cells counted',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'help' => 'Live plus dead, over all squares counted',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '320',
                        ],
                        [
                            'name' => 'squares',
                            'label' => 'Squares counted',
                            'type' => 'number',
                            'help' => 'Usually the four corner squares',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Dilution factor',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '2 for a 1:1 mix with trypan blue',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Suspension volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'help' => 'Used for the total yield',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'conc',
                            'label' => 'Cell concentration',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_ul',
                            'label' => 'Cell concentration',
                            'type' => 'number',
                            'suffix' => 'cells/µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_cells',
                            'label' => 'Total cells in the suspension',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'million',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => '×10⁶/mL',
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
            'title' => 'Concentration',
            'results' => ['conc' => 'cells_counted/squares*dilution*10000', 'per_ul' => 'cells_counted/squares*dilution*10', 'total_cells' => 'cells_counted/squares*dilution*10000*volume', 'million' => 'cells_counted/squares*dilution*10000/1000000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A hemocytometer turns a counted number of cells into a concentration using one physical fact: each large square holds 0.1 µL. It returns cell concentration, cell concentration, total cells in the suspension and concentration, and the panel shows all of them at once.
        
        This calculator averages your counts, applies the dilution factor — including the trypan blue step — and returns cells/mL, cells/µL and total cells.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Hemocytometer Cell Counter (cells/mL)', 'html' => <<<'TXT'
            <p>Cells/mL = (cells counted ÷ squares counted) × dilution factor × 10⁴</p>
            <figure class="calc-figure"><img src="/uploads/biology/hemocytometer-cell-counter.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Hemocytometer Cell Counter (cells/mL) — Counts per square, times dilution, times the chamber constant." title="Hemocytometer Cell Counter (cells/mL)"><figcaption>Counts per square, times dilution, times the chamber constant.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>cells_counted</code></td><td>cells counted across all squares</td><td>cells</td></tr><tr><td><code>squares</code></td><td>number of large squares counted</td><td>—</td></tr><tr><td><code>dilution</code></td><td>total dilution before counting</td><td>×</td></tr><tr><td><code>10⁴</code></td><td>reciprocal of the 0.1 µL volume of one large square</td><td>mL⁻¹</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> Improved Neubauer chamber geometry; the counting convention is the standard haematology one.</p>
            TXT],
            ['title' => 'How do I use the Hemocytometer Cell Counter (cells/mL)?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: total cells counted of <strong>320</strong> cells, squares counted of <strong>4</strong>, dilution factor of <strong>2</strong> ×, suspension volume of <strong>10</strong> mL.</p>
            <p>Substituting them into the formula gives cell concentration of <strong>1,600,000</strong> cells/mL, cell concentration of <strong>1,600</strong> cells/µL, total cells in the suspension of <strong>16,000,000</strong> cells, concentration of <strong>1.6</strong> ×10⁶/mL.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>20 – 200 per square</td><td><strong>Countable</strong></td><td>high enough for precision, low enough to resolve</td></tr><tr><td>below 20</td><td><strong>Too few</strong></td><td>sampling error dominates; count more squares</td></tr><tr><td>above 200</td><td><strong>Too many</strong></td><td>clumps and overlapping cells; dilute</td></tr></tbody></table>
            <ul><li><p>The 10⁴ is geometry, not a correction: 1 mm × 1 mm × 0.1 mm = 0.1 mm³ = 10⁻⁴ mL.</p></li><li><p>Count the cells touching the top and left lines and skip the bottom and right ones, so border cells are counted exactly once.</p></li><li><p>Aim for 100–200 cells per large square. Below about 20, the Poisson counting error alone is 20% or worse.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Forgetting the trypan blue dilution — the single most common cause of a concentration that is exactly half the truth.</li><li>Counting clumps as single cells without disaggregating and re-counting.</li><li>Loading the chamber without letting it fill by capillary action, which leaves an uneven distribution.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why do I multiply by 10 000?', 'a' => 'Because each large square holds 0.0001 mL, and dividing by such a small volume is the same as multiplying by 10 000.'],
            ['q' => 'How many squares should I count?', 'a' => 'Four large corner squares is standard; count more if the cells are sparse.'],
            ['q' => 'Does this work for the Fuchs–Rosenthal chamber?', 'a' => 'Not directly — that chamber is 0.2 mm deep, so the factor is 5 000 rather than 10 000.'],
            ['q' => 'What does the Hemocytometer Cell Counter (cells/mL) actually calculate?', 'a' => <<<'TXT'
            It returns cell concentration, cell concentration, total cells in the suspension and concentration. Each one is derived by the formula on this page, so you can check any figure by hand.
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
