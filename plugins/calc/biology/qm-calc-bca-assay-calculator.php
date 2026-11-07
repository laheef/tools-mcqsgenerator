<?php

/**
 * BCA Assay Calculator (standard curve)
 * /biology/bca-assay-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'BCA Assay Calculator (standard curve)',
    'meta' => ['title' => 'BCA Assay Calculator (standard curve) — Biology', 'description' => 'The BCA assay returns a colour, not a concentration: you read absorbance, put it on a standard curve and interpolate. Free bca assay (standard curve) calculat', 'h1' => 'BCA Assay Calculator (standard curve)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'a562',
                            'label' => 'Sample absorbance',
                            'type' => 'number',
                            'help' => 'Read at 562 nm, blank subtracted',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.62',
                        ],
                        [
                            'name' => 'slope',
                            'label' => 'Standard curve slope',
                            'type' => 'number',
                            'suffix' => 'per mg/mL',
                            'help' => 'Absorbance units per mg/mL of protein',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.35',
                        ],
                        [
                            'name' => 'intercept',
                            'label' => 'Standard curve intercept',
                            'type' => 'number',
                            'help' => 'Absorbance at zero protein',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.02',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Sample dilution factor',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '2 for a 1:1 dilution with buffer',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'conc',
                            'label' => 'Protein concentration',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
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
            'results' => ['conc' => '(a562-intercept)/slope*dilution', 'a562' => 'conc*slope/dilution+intercept'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        BCA Assay Calculator (standard curve) takes Sample absorbance, Standard curve slope and Standard curve intercept and returns Protein concentration. Nothing is looked up on this page: Protein concentration is computed from Sample absorbance and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Protein concentration is opened in mg/mL; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the BCA Assay Calculator (standard curve) calculator works', 'html' => <<<'TXT'
            <p>The BCA Assay Calculator (standard curve) calculator applies one relationship to 4 numbers and reports Protein concentration.</p><p>The relationship it solves reads Protein concentration = (Sample absorbance − Standard curve intercept) ÷ Standard curve slope × Sample dilution factor.</p><p>What comes back is Protein concentration — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Sample absorbance</strong> — a plain number, no unit. Read at 562 nm, blank subtracted</li><li><strong>Standard curve slope</strong> — in per mg/mL. Absorbance units per mg/mL of protein</li><li><strong>Standard curve intercept</strong> — a plain number, no unit. Absorbance at zero protein</li><li><strong>Sample dilution factor</strong> — in ×. 2 for a 1:1 dilution with buffer</li></ul><p>The result box is Protein concentration in mg/mL. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Protein concentration takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Protein concentration</strong> = <code>(Sample absorbance − Standard curve intercept) ÷ Standard curve slope × Sample dilution factor</code></li><li><strong>Sample absorbance</strong> = <code>Protein concentration × Standard curve slope ÷ Sample dilution factor + Standard curve intercept</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Protein concentration and Sample absorbance can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Protein concentration is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Sample absorbance to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Sample absorbance, Standard curve slope and Standard curve intercept and the number you are missing is Protein concentration.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/od600-to-cell-density">OD600 to Cell Density Calculator</a>, <a href="/biology/genetic-odds-ratio">Odds Ratio for Genetics Calculator</a> and <a href="/biology/oligo-converter">Oligo pmol/µL to µg/mL Converter Calculator — Formula &amp; Result</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the BCA Assay Calculator (standard curve) calculator work out?', 'a' => <<<'TXT'
            Protein concentration, from Sample absorbance, Standard curve intercept, Standard curve slope and Sample dilution factor. The relationship is Protein concentration = (Sample absorbance − Standard curve intercept) ÷ Standard curve slope × Sample dilution factor.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Sample absorbance, Standard curve slope (per mg/mL), Standard curve intercept, Sample dilution factor (×). With a562, slope and intercept in place, Protein concentration can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Protein concentration and Sample absorbance can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Protein concentration is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Sample absorbance blank and the page solves for it, reporting Protein concentration instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Protein concentration keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/od600-to-cell-density', 'name' => 'OD600 to Cell Density Calculator'],
            ['path' => '/biology/genetic-odds-ratio', 'name' => 'Odds Ratio for Genetics Calculator'],
            ['path' => '/biology/oligo-converter', 'name' => 'Oligo pmol/µL to µg/mL Converter Calculator — Formula & Result'],
        ],
        'authors' => [],
    ],
];
