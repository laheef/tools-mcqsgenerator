<?php

/**
 * Oligo pmol/µL to µg/mL Converter
 * /biology/oligo-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Oligo pmol/µL to µg/mL Converter',
    'meta' => ['title' => 'Oligo pmol/µL to µg/mL Converter — Formula & Results', 'description' => 'An oligo arrives from the synthesiser in nanomoles of dry powder and is used in micromolar stocks. It returns concentration, concentration, concentration and…', 'h1' => 'Oligo pmol/µL to µg/mL Converter', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Oligo length',
                            'type' => 'number',
                            'suffix' => 'nt',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'pmol_ul',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'pmol/µL',
                            'help' => 'A 100 µM stock is 100 pmol/µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'ug_ml',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'µg/mL',
                            'help' => 'Either this or pmol/µL can be typed',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'um',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'nmol_total',
                            'label' => 'Amount in the tube',
                            'type' => 'number',
                            'suffix' => 'nmol',
                            'help' => 'Fill the volume to get the total',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'water_ul',
                            'label' => 'Water to add for a 100 µM stock',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'help' => 'From the nmol on the tube label',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tube_nmol',
                            'label' => 'Oligo amount on the label',
                            'type' => 'number',
                            'suffix' => 'nmol',
                            'help' => 'Normally printed on the synthesis sheet',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Convert',
            'results' => [
                'um' => 'pmol_ul',
                'ug_ml' => 'pmol_ul*330*length/1000',
                'pmol_ul' => 'ug_ml*1000/(330*length)',
                'nmol_total' => 'pmol_ul/1000*1',
                'water_ul' => 'tube_nmol*10',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        An oligo arrives from the synthesiser in nanomoles of dry powder and is used in micromolar stocks. It returns concentration, concentration, concentration and amount in the tube, and the panel shows all of them at once.
        
        This converter moves between pmol/µL, µg/mL and µM for a single-stranded oligo of known length, so a resuspended primer can be diluted correctly the first time.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Oligo pmol/µL to µg/mL Converter', 'html' => <<<'TXT'
            <p>µg/mL = pmol/µL × 0.33 × length. µM = pmol/µL. Water for a 100 µM stock (µL) = nmol on the label × 10</p>
            <figure class="calc-figure"><img src="/uploads/biology/oligo-converter.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Oligo pmol/µL to µg/mL Converter — µg/mL for a 100 µM oligo, by length" title="Oligo pmol/µL to µg/mL Converter"><figcaption>µg/mL for a 100 µM oligo, by length</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>330</code></td><td>g/mol per nucleotide of single-stranded DNA</td><td>g/mol</td></tr><tr><td><code>pmol/µL</code></td><td>the same number as µM</td><td>mol/L</td></tr><tr><td><code>nt</code></td><td>nucleotide</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Oligo pmol/µL to µg/mL Converter?', 'html' => <<<'TXT'
            <ol><li>Enter the primer length and the concentration you have or want.</li><li>The other units are filled in — pmol/µL, µM and µg/mL are the same quantity expressed three ways.</li><li>For a fresh tube, enter the nanomoles printed on the label to get the water volume for a 100 µM stock.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: oligo length of <strong>20</strong> nt, oligo amount on the label of <strong>25</strong> nmol.</p>
            <p>Substituting them into the formula gives concentration of <strong>100</strong> µM, concentration of <strong>660</strong> µg/mL, concentration of <strong>100</strong> pmol/µL, amount in the tube of <strong>0.1</strong> nmol, water to add for a 100 µm stock of <strong>250</strong> µL.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>100 µM</td><td><strong>Standard stock</strong></td><td>dilute 1:10 into a PCR for a 10 µM working stock</td></tr><tr><td>10 µM</td><td><strong>Working stock</strong></td><td>1 µL in a 25 µL reaction is 0.4 µM</td></tr><tr><td>under 1 µM</td><td><strong>Too dilute to freeze</strong></td><td>aliquot at 10 µM or above</td></tr></tbody></table>
            <ul><li><p>pmol/µL and µM are the same number: 1 pmol/µL is 1 µmol/L. Half of all primer-dilution mistakes come from treating them as different.</p></li><li><p>A primer arrives as a known number of nanomoles. Adding 10 µL of water per nanomole gives exactly a 100 µM stock, whatever the sequence.</p></li><li><p>The 330 g/mol per nucleotide constant is an average; a GC-rich 20-mer is a few percent heavier, which matters only for quantitative work.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Adding a round number of microlitres (say 200 µL) instead of nmol × 10, which gives an unknown concentration.</li><li>Freezing and thawing a 10 µM stock repeatedly — keep 100 µM aliquots and dilute fresh.</li><li>Using the double-stranded 660 constant for a primer, which halves the answer.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much water do I add to a 25 nmol primer?', 'a' => '250 µL for a 100 µM stock — 10 µL per nanomole.'],
            ['q' => 'Is pmol/µL the same as µM?', 'a' => 'Yes. 1 pmol/µL = 1 µmol/L = 1 µM.'],
            ['q' => 'What working concentration should I use?', 'a' => '10 µM for routine PCR; 100 µM stocks keep better at −20 °C.'],
            ['q' => 'What does the Oligo pmol/µL to µg/mL Converter actually calculate?', 'a' => <<<'TXT'
            It returns concentration, concentration, concentration and amount in the tube. Each one is derived by the formula on this page, so you can check any figure by hand.
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
