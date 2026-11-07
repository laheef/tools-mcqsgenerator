<?php

/**
 * Mass to Molarity Converter
 * /biology/mass-molarity-conversion
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mass to Molarity Converter',
    'meta' => ['title' => 'Mass to Molarity Converter — Formula & Results', 'description' => 'Enter Molecular weight, Mass and Volume into Mass to Molarity and the answer comes back as Concentration and Concentration. The typical use is one direction…', 'h1' => 'Mass to Molarity Converter', 'updated' => '2026-10-29'],
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
                            'suffix' => 'g/mol',
                            'help' => 'Also called molar mass or relative molecular mass',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'mass_mg',
                            'label' => 'Mass',
                            'type' => 'number',
                            'suffix' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'volume_ml',
                            'label' => 'Volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'conc_mm',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'conc_mg_ml',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'moles_umol',
                            'label' => 'Amount of substance',
                            'type' => 'number',
                            'suffix' => 'µmol',
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
            'title' => 'Convert',
            'results' => ['moles_umol' => 'mass_mg*1000/mw', 'mass_mg' => 'moles_umol*mw/1000', 'conc_mm' => 'moles_umol/volume_ml', 'conc_mg_ml' => 'mass_mg/volume_ml'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Molecular weight, Mass and Volume into Mass to Molarity and the answer comes back as Concentration and Concentration. It is a single relationship that reads Concentration out of Molecular weight, not a table of canned results keyed by them. Units for Concentration default to mM and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Mass to Molarity calculator works', 'html' => <<<'TXT'
            <p>Mass to Molarity answers one question from 3 numbers, and the answer is Concentration, Concentration and Amount of substance.</p><p>Written with the labels from the form, Amount of substance = Mass × 1000 ÷ Molecular weight.</p><p>The result panel carries Concentration, Concentration and Amount of substance, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Molecular weight</strong> — in g/mol. Also called molar mass or relative molecular mass</li><li><strong>Mass</strong> — in mg</li><li><strong>Volume</strong> — in mL</li></ul><p>The result boxes are Concentration in mM, Concentration in mg/mL, Amount of substance in µmol; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Concentration is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Amount of substance</strong> = <code>Mass × 1000 ÷ Molecular weight</code></li><li><strong>Mass</strong> = <code>Amount of substance × Molecular weight ÷ 1000</code></li><li><strong>Concentration</strong> = <code>Amount of substance ÷ Volume</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Amount of substance, Mass and Concentration can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Concentration, Concentration and Amount of substance are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Molecular weight to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Molecular weight, Mass and Volume measured, Concentration and Concentration wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/hardy-weinberg-recessive-allele">Hardy–Weinberg from the Recessive Allele Frequency Calculator</a>, <a href="/biology/hardy-weinberg-recessive-homozygote">Hardy–Weinberg from the Recessive Homozygote Frequency Calcula</a> and <a href="/biology/hatch-rate">Hatch Rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mass to Molarity calculator work out?', 'a' => <<<'TXT'
            Concentration, Concentration and Amount of substance, from Mass and Molecular weight. The relationship is Amount of substance = Mass × 1000 ÷ Molecular weight.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Molecular weight (g/mol), Mass (mg), Volume (mL). Enter mw, mass_mg and volume_ml; Concentration is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Amount of substance, Mass, Concentration and Concentration can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Concentration is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Molecular weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Concentration keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/hardy-weinberg-recessive-allele', 'name' => 'Hardy–Weinberg from the Recessive Allele Frequency Calculator'],
            ['path' => '/biology/hardy-weinberg-recessive-homozygote', 'name' => 'Hardy–Weinberg from the Recessive Homozygote Frequency Calcula'],
            ['path' => '/biology/hatch-rate', 'name' => 'Hatch Rate Calculator'],
        ],
        'authors' => [],
    ],
];
