<?php

/**
 * Protein Molar Conversions
 * /biology/protein-molar-conversions
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Protein Molar Conversions',
    'meta' => ['title' => 'Protein Molar Conversions — Formula & Results', 'description' => 'Protein concentrations get quoted in mg/mL, µM and nmol depending on who is asking. It returns molar concentration, molar concentration, amount per mL and…', 'h1' => 'Protein Molar Conversions', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'mw',
                            'label' => 'Molecular weight',
                            'type' => 'number',
                            'suffix' => 'Da',
                            'help' => 'g/mol',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '55000',
                        ],
                        [
                            'name' => 'mg_ml',
                            'label' => 'Mass concentration',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'um',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'nm',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'suffix' => 'nM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'nmol_ml',
                            'label' => 'Amount per mL',
                            'type' => 'number',
                            'suffix' => 'nmol/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mg_total',
                            'label' => 'Mass in 1 mL',
                            'type' => 'number',
                            'suffix' => 'mg',
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
            'title' => 'Conversion',
            'results' => [
                'um' => 'mg_ml/mw*1000000',
                'nm' => 'mg_ml/mw*1000000000',
                'nmol_ml' => 'mg_ml/mw*1000000',
                'mg_total' => 'mg_ml*1',
                'mg_ml' => 'um*mw/1000000',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Protein concentrations get quoted in mg/mL, µM and nmol depending on who is asking. It returns molar concentration, molar concentration, amount per mL and mass in 1 mL, and the panel shows all of them at once.
        
        This calculator converts between mass concentration, molarity and amount using the molecular weight, so a protocol written in µM can be carried out from a stock measured in mg/mL.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Protein Molar Conversions', 'html' => <<<'TXT'
            <p>Molarity (M) = mass concentration (g/L) ÷ molecular weight (g/mol)</p>
            <figure class="calc-figure"><img src="/uploads/biology/protein-molar-conversions.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Protein Molar Conversions — Mass concentration and molecular weight give molarity." title="Protein Molar Conversions"><figcaption>Mass concentration and molecular weight give molarity.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>MW</code></td><td>molecular weight</td><td>Da = g/mol</td></tr><tr><td><code>c</code></td><td>mass concentration</td><td>mg/mL</td></tr><tr><td><code>M</code></td><td>molar concentration</td><td>µM</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Protein Molar Conversions?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: molecular weight of <strong>55,000</strong> Da.</p>
            <p>Substituting them into the formula gives molar concentration of <strong>36.36</strong> µM, molar concentration of <strong>36,363.64</strong> nM, amount per ml of <strong>36.36</strong> nmol/mL, mass in 1 ml of <strong>2</strong> mg, mass concentration of <strong>2</strong> mg/mL.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>1 mg/mL of a 55 kDa protein is 18.2 µM; the same mass of a 5.5 kDa peptide is 182 µM. Molarity is where small proteins and peptides differ enormously from large ones.</p></li><li><p>Molecular weight in daltons is numerically the same as g/mol, which is why the unit conversion is so easy to get wrong by a factor of 1000.</p></li><li><p>For a protein complex, use the molecular weight of the whole assembly.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using the molecular weight in kDa and forgetting the ×1000.</li><li>Converting a concentration of a protein solution that also contains carrier protein or BSA.</li><li>Quoting molarity for a heterogeneous sample such as a cell lysate, where it has no meaning.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I convert µg/mL to µM?', 'a' => 'Divide by the molecular weight in Da and multiply by 1000: 100 µg/mL of a 50 kDa protein is 2 µM.'],
            ['q' => 'Why does 1 mg/mL give different molarities for different proteins?', 'a' => 'Because molarity counts molecules, and heavier molecules are fewer per milligram.'],
            ['q' => 'What does the Protein Molar Conversions actually calculate?', 'a' => <<<'TXT'
            It returns molar concentration, molar concentration, amount per mL and mass in 1 mL. Each one is derived by the formula on this page, so you can check any figure by hand.
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
