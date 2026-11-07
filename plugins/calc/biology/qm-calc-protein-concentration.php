<?php

/**
 * Protein concentration
 * /biology/protein-concentration
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Protein concentration',
    'meta' => ['title' => 'Protein concentration: Formula, Steps & Results', 'description' => 'Enter Protein, Absorbance at λmax and Pathlength into Protein concentration and the answer comes back as Extinction coefficient and Molecular weight.', 'h1' => 'Protein concentration Calculator', 'updated' => '2026-08-06'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'protein',
                            'label' => 'Protein',
                            'type' => 'select',
                            'options' => [
                                'Aldose' => '34380',
                                'APC - Allophycocyanin' => '700000',
                                'ATP' => '15400',
                                'BSA – Bovine Serum Albumin' => '43824',
                                'Cysteine (CYS)' => '120',
                                'IgG – Immunoglobin G' => '210000',
                                'Insulin' => '6335',
                                'Lysozyme' => '37901',
                                'PE - Phycoerythrin' => '1960000',
                                'Phenylalanine (PHE)' => '200',
                                'RNAse A' => '9440',
                                'Streptavidin' => '176000',
                                'Tryptophan (TRP)' => '5690',
                                'Tyrosine (TYR)' => '1280',
                                'Custom protein' => '',
                            ],
                            'dataset' => 'protein',
                            'control' => 'DROPDOWN',
                            'default' => 'IgG – Immunoglobin G',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'extinction_coef',
                            'label' => 'Extinction coefficient',
                            'type' => 'result',
                            'suffix' => 'M⁻¹ cm⁻¹',
                            'help' => 'Extinction coefficient depends on the temperature and wavelength. You can calculate it with the Beer–Lambert law.&nbsp;',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'molecular_weight',
                            'label' => 'Molecular weight',
                            'type' => 'result',
                            'suffix' => 'g/mol',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'absorbance',
                            'label' => 'Absorbance at λmax',
                            'type' => 'number',
                            'suffix' => 'nm',
                            'help' => 'Use the maximum absorbance (i.e. highest peak). For protein, λmax is typically 280 nm.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pathlength',
                            'label' => 'Pathlength',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dilution_factor',
                            'label' => 'Dilution factor',
                            'type' => 'number',
                            'help' => 'The factor 1 equals the stock sample. If you measure the absorbance with a diluted sample, enter for example 5 for a 1:5 dilution.&nbsp;',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'concentration',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'concentration = (absorbance / (extinction_coef * pathlength)) * molecular_weight * dilution_factor',
            'results' => [
                'dilution_factor' => 'concentration*extinction_coef*pathlength/(absorbance*molecular_weight)',
                'concentration' => 'absorbance*dilution_factor*molecular_weight/(extinction_coef*pathlength)',
                'extinction_coef' => 'absorbance*dilution_factor*molecular_weight/(concentration*pathlength)',
                'pathlength' => 'absorbance*dilution_factor*molecular_weight/(concentration*extinction_coef)',
                'molecular_weight' => 'concentration*extinction_coef*pathlength/(absorbance*dilution_factor)',
                'absorbance' => 'concentration*extinction_coef*pathlength/(dilution_factor*molecular_weight)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Protein, Absorbance at λmax and Pathlength into Protein concentration and the answer comes back as Extinction coefficient and Molecular weight. It is a single relationship that reads Extinction coefficient out of Protein, not a table of canned results keyed by them. Units for Extinction coefficient default to M⁻¹ cm⁻¹ and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Protein concentration calculator works', 'html' => <<<'TXT'
            <p>The Protein concentration calculator applies one relationship to 4 numbers and reports Extinction coefficient, Molecular weight and Concentration.</p><p>In the form&#039;s own words, Dilution factor = Concentration × Extinction coefficient × Pathlength ÷ (Absorbance at λmax × Molecular weight).</p><p>The result panel carries Extinction coefficient, Molecular weight and Concentration, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Protein</strong> — a plain number, no unit</li><li><strong>Absorbance at λmax</strong> — in nm. Use the maximum absorbance (i.e. highest peak). For protein, λmax is typically 280 nm.</li><li><strong>Pathlength</strong> — in cm</li><li><strong>Dilution factor</strong> — a plain number, no unit. The factor 1 equals the stock sample. If you measure the absorbance with a diluted sample, enter for example 5 for a 1:5 dilution.&amp;nbsp;</li></ul><p>The result boxes are Extinction coefficient in M⁻¹ cm⁻¹, Molecular weight in g/mol, Concentration in mg/mL; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Extinction coefficient is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Dilution factor</strong> = <code>Concentration × Extinction coefficient × Pathlength ÷ (Absorbance at λmax × Molecular weight)</code></li><li><strong>Concentration</strong> = <code>Absorbance at λmax × Dilution factor × Molecular weight ÷ (Extinction coefficient × Pathlength)</code></li><li><strong>Extinction coefficient</strong> = <code>Absorbance at λmax × Dilution factor × Molecular weight ÷ (Concentration × Pathlength)</code></li><li><strong>Pathlength</strong> = <code>Absorbance at λmax × Dilution factor × Molecular weight ÷ (Concentration × Extinction coefficient)</code></li><li><strong>Molecular weight</strong> = <code>Concentration × Extinction coefficient × Pathlength ÷ (Absorbance at λmax × Dilution factor)</code></li><li><strong>Absorbance at λmax</strong> = <code>Concentration × Extinction coefficient × Pathlength ÷ (Dilution factor × Molecular weight)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Dilution factor, Concentration and Extinction coefficient can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Extinction coefficient, Molecular weight and Concentration are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Protein is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Protein, Absorbance at λmax and Pathlength and the number you are missing is Extinction coefficient and Molecular weight.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/basal-area">Basal area Calculator</a>, <a href="/biology/basal-metabolic-rate">Basal Metabolic Rate (Mifflin–St Jeor) Calculator</a> and <a href="/biology/base-pair-to-dalton">Base Pair to Dalton Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Protein concentration calculator work out?', 'a' => <<<'TXT'
            Extinction coefficient, Molecular weight and Concentration, from Concentration, Extinction coefficient, Pathlength and Absorbance at λmax. The relationship is Dilution factor = Concentration × Extinction coefficient × Pathlength ÷ (Absorbance at λmax × Molecular weight).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Protein, Absorbance at λmax (nm), Pathlength (cm), Dilution factor. With protein, absorbance and pathlength in place, Extinction coefficient can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Dilution factor, Concentration, Extinction coefficient and Pathlength can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Extinction coefficient is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Protein blank and the page solves for it, reporting Extinction coefficient instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Extinction coefficient at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/basal-area', 'name' => 'Basal area Calculator'],
            ['path' => '/biology/basal-metabolic-rate', 'name' => 'Basal Metabolic Rate (Mifflin–St Jeor) Calculator'],
            ['path' => '/biology/base-pair-to-dalton', 'name' => 'Base Pair to Dalton Calculator'],
        ],
        'authors' => [],
    ],
];
