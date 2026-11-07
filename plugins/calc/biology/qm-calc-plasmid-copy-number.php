<?php

/**
 * Plasmid Copy Number Calculator
 * /biology/plasmid-copy-number
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Plasmid Copy Number Calculator',
    'meta' => ['title' => 'Plasmid Copy Number Calculator — Formula & Results', 'description' => 'Copy number is how many plasmids each cell carries, and it decides how much a culture yields and how strongly a gene is expressed. It returns cells harvested…', 'h1' => 'Plasmid Copy Number Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'yield_ug',
                            'label' => 'Plasmid yield',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'help' => 'From a miniprep of known culture volume',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'plasmid_kb',
                            'label' => 'Plasmid size',
                            'type' => 'number',
                            'suffix' => 'kb',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'culture_ml',
                            'label' => 'Culture volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                        [
                            'name' => 'od',
                            'label' => 'Culture OD600',
                            'type' => 'number',
                            'help' => 'At harvest',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'copy_number',
                            'label' => 'Plasmids per cell',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cells_total',
                            'label' => 'Cells harvested',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'plasmid_pmol',
                            'label' => 'Plasmid recovered',
                            'type' => 'number',
                            'suffix' => 'pmol',
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
            'title' => 'Copy number',
            'results' => ['cells_total' => 'culture_ml*od*800000000', 'plasmid_pmol' => 'yield_ug*1000000/(plasmid_kb*1000*660)', 'copy_number' => 'yield_ug*0.000001/(plasmid_kb*1000*660)*602200000000000000000000/(culture_ml*od*800000000)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Copy number is how many plasmids each cell carries, and it decides how much a culture yields and how strongly a gene is expressed. It returns cells harvested, plasmid recovered and plasmids per cell, and the panel shows all of them at once.
        
        This calculator derives it from a miniprep yield, the plasmid size and the number of cells harvested.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Plasmid Copy Number', 'html' => <<<'TXT'
            <p>Copy number = plasmids recovered ÷ cells harvested</p>
            <figure class="calc-figure"><img src="/uploads/biology/plasmid-copy-number.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Plasmid Copy Number Calculator — Yield per cell decides the copy number class." title="Plasmid Copy Number Calculator"><figcaption>Yield per cell decides the copy number class.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>yield</code></td><td>plasmid mass from the prep</td><td>µg</td></tr><tr><td><code>plasmid size</code></td><td>length in kb</td><td>kb</td></tr><tr><td><code>cells</code></td><td>culture volume × OD600 × 8×10⁸</td><td>cells</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Plasmid Copy Number?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: plasmid yield of <strong>8</strong> µg, plasmid size of <strong>5</strong> kb, culture volume of <strong>3</strong> mL, culture od600 of <strong>2</strong>.</p>
            <p>Substituting them into the formula gives cells harvested of <strong>4,800,000,000</strong>, plasmid recovered of <strong>2.42</strong> pmol, plasmids per cell of <strong>304.14</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1 – 20</td><td><strong>Low copy</strong></td><td>pBR322-style, stringent replication</td></tr><tr><td>20 – 100</td><td><strong>Medium copy</strong></td><td>pUC relatives with a weakened origin</td></tr><tr><td>above 100</td><td><strong>High copy</strong></td><td>pUC19 and pET-style plasmids, relaxed replication</td></tr></tbody></table>
            <ul><li><p>Culture OD600 × 8 × 10⁸ cells/mL is a working estimate for E. coli; the answer moves with the strain and the medium, so compare copy numbers measured the same way.</p></li><li><p>Copy number rises with chloramphenicol amplification in relaxed plasmids and falls with large inserts, which are a replication burden.</p></li><li><p>A miniprep yield is not a purity measurement: contaminating genomic DNA and RNA inflate the apparent copy number.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Forgetting that the harvested culture volume sets the cell number.</li><li>Using the insert size instead of the whole plasmid length.</li><li>Comparing a maxiprep yield per litre with a miniprep yield per millilitre.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a normal plasmid copy number?', 'a' => 'About 15–20 for pBR322 and 500–700 for pUC-based high-copy plasmids.'],
            ['q' => 'Why is my measured copy number low?', 'a' => 'Large inserts, a low-copy origin, or growth at 37 °C to stationary phase, which reduces plasmid yield per cell.'],
            ['q' => 'What does the Plasmid Copy Number actually calculate?', 'a' => 'It returns cells harvested, plasmid recovered and plasmids per cell. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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
