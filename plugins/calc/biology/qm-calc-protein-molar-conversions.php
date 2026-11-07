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
    'meta' => ['title' => 'Protein Molar Conversions — Formula & Results', 'description' => 'Enter Molecular weight and Mass concentration into Protein Molar Conversions and the answer comes back as Molar concentration and Molar concentration.', 'h1' => 'Protein Molar Conversions', 'updated' => '2026-10-29'],
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
        Enter Molecular weight and Mass concentration into Protein Molar Conversions and the answer comes back as Molar concentration and Molar concentration. It is a single relationship that reads Molar concentration out of Molecular weight, not a table of canned results keyed by them. Units for Molar concentration default to µM and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Protein Molar Conversions calculator works', 'html' => <<<'TXT'
            <p>The Protein Molar Conversions calculator applies one relationship to 2 numbers and reports Molar concentration, Molar concentration and Amount per mL.</p><p>In the form&#039;s own words, Molar concentration = Mass concentration ÷ Molecular weight × 1000000.</p><p>What comes back is Molar concentration, Molar concentration, Amount per mL and Mass in 1 mL — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Molecular weight</strong> — in Da. g/mol</li><li><strong>Mass concentration</strong> — in mg/mL</li></ul><p>The answers come back as Molar concentration in µM, Molar concentration in nM, Amount per mL in nmol/mL, Mass in 1 mL in mg. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Molar concentration is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Molar concentration</strong> = <code>Mass concentration ÷ Molecular weight × 1000000</code></li><li><strong>Amount per mL</strong> = <code>Mass concentration ÷ Molecular weight × 1000000</code></li><li><strong>Mass in 1 mL</strong> = <code>Mass concentration × 1</code></li><li><strong>Mass concentration</strong> = <code>Molar concentration × Molecular weight ÷ 1000000</code></li></ul><p>Any one of Molar concentration, Molar concentration and Amount per mL can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Molar concentration, Molar concentration and Amount per mL are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Molecular weight to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Molecular weight and Mass concentration and the number you are missing is Molar concentration and Molar concentration.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/pcr-master-mix-calculator">PCR Master Mix Calculator</a>, <a href="/biology/pcr-primer-stats">PCR Primer Stats Calculator</a> and <a href="/biology/pedigree-probability">Pedigree Probability Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Protein Molar Conversions calculator work out?', 'a' => <<<'TXT'
            Molar concentration, Molar concentration, Amount per mL and Mass in 1 mL, from Mass concentration and Molecular weight. The relationship is Molar concentration = Mass concentration ÷ Molecular weight × 1000000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Molecular weight (Da), Mass concentration (mg/mL). Fill mw and mg_ml and leave Molar concentration empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Molar concentration, Molar concentration, Amount per mL and Mass in 1 mL blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Molar concentration is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Molecular weight blank and the page solves for it, reporting Molar concentration instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Molar concentration keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/pcr-master-mix-calculator', 'name' => 'PCR Master Mix Calculator'],
            ['path' => '/biology/pcr-primer-stats', 'name' => 'PCR Primer Stats Calculator'],
            ['path' => '/biology/pedigree-probability', 'name' => 'Pedigree Probability Calculator'],
        ],
        'authors' => [],
    ],
];
