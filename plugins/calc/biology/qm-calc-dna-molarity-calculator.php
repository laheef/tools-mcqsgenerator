<?php

/**
 * DNA Molarity Calculator
 * /biology/dna-molarity-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'DNA Molarity Calculator',
    'meta' => ['title' => 'DNA Molarity Calculator — Formula & Results', 'description' => 'DNA Molarity turns Length, Concentration and Volume into Total mass and Amount. A result box can be typed into, and doing so changes the question rather than…', 'h1' => 'DNA Molarity Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'help' => 'Fragment or genome length',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'conc_ng_ul',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'ng/µL',
                            'help' => 'What a nanodrop or a Qubit reports',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'volume_ul',
                            'label' => 'Volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'factor',
                            'label' => 'Molecule (A₂₆₀ factor)',
                            'type' => 'select',
                            'options' => ['Double-stranded DNA — 50' => '50', 'Single-stranded DNA — 33' => '33', 'RNA — 40' => '40'],
                            'help' => 'µg/mL per absorbance unit',
                            'default' => 'Double-stranded DNA — 50',
                        ],
                        [
                            'name' => 'mw_per_bp',
                            'label' => 'Molar mass per base',
                            'type' => 'number',
                            'suffix' => 'g/mol',
                            'help' => '660 dsDNA per bp, 330 ssDNA, 340 RNA',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '660',
                        ],
                        [
                            'name' => 'mass_ng',
                            'label' => 'Total mass',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pmol',
                            'label' => 'Amount',
                            'type' => 'number',
                            'suffix' => 'pmol',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'molarity',
                            'label' => 'Molarity',
                            'type' => 'number',
                            'suffix' => 'nM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'copies',
                            'label' => 'Molecules',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'a260',
                            'label' => 'A₂₆₀ equivalent',
                            'type' => 'number',
                            'suffix' => 'A',
                            'help' => 'For a 1 cm path',
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
            'title' => 'Mass',
            'results' => ['mass_ng' => 'conc_ng_ul*volume_ul', 'conc_ng_ul' => 'mass_ng/volume_ul', 'a260' => 'conc_ng_ul/factor'],
        ],
        [
            'title' => 'Amount',
            'results' => ['pmol' => 'mass_ng*1000/(mw_per_bp*length)', 'mass_ng' => 'pmol*mw_per_bp*length/1000', 'molarity' => 'pmol/volume_ul*1000', 'copies' => 'pmol*602214076000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        DNA Molarity turns Length, Concentration and Volume into Total mass and Amount. There is no hidden constant here: change Total mass and Length moves with it. The main result, Total mass, is reported in ng.
        TXT,
        'sections' => [
            ['title' => 'How the DNA Molarity calculator works', 'html' => <<<'TXT'
            <p>The DNA Molarity calculator applies one relationship to 5 numbers and reports Total mass, Amount and Molarity.</p><p>Written with the labels from the form, Total mass = Concentration × Volume.</p><p>The answers are Total mass, Amount, Molarity and Molecules; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Length</strong> — in bp. Fragment or genome length</li><li><strong>Concentration</strong> — in ng/µL. What a nanodrop or a Qubit reports</li><li><strong>Volume</strong> — in µL</li><li><strong>Molecule (A₂₆₀ factor)</strong> — a plain number, no unit. µg/mL per absorbance unit</li><li><strong>Molar mass per base</strong> — in g/mol. 660 dsDNA per bp, 330 ssDNA, 340 RNA</li></ul><p>What you get back is Total mass in ng, Amount in pmol, Molarity in nM, Molecules, A₂₆₀ equivalent in A, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: Total mass takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total mass</strong> = <code>Concentration × Volume</code></li><li><strong>Concentration</strong> = <code>Total mass ÷ Volume</code></li><li><strong>A₂₆₀ equivalent</strong> = <code>Concentration ÷ Molecule (A₂₆₀ factor)</code></li><li><strong>Amount</strong> = <code>Total mass × 1000 ÷ (Molar mass per base × Length)</code></li><li><strong>Molarity</strong> = <code>Amount ÷ Volume × 1000</code></li><li><strong>Molecules</strong> = <code>Amount × 602214076000</code></li></ul><p>Any one of Total mass, Concentration and A₂₆₀ equivalent can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total mass, Amount and Molarity are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Length and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Length, Concentration and Volume is what you already know and Total mass and Amount is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/hardy-weinberg-equilibrium">Hardy-Weinberg equilibrium Calculator</a>, <a href="/biology/hardy-weinberg-dominant-allele">Hardy–Weinberg from the Dominant Allele Frequency Calculator</a> and <a href="/biology/hardy-weinberg-dominant-homozygote">Hardy–Weinberg from the Dominant Homozygote Frequency Calculat</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the DNA Molarity calculator work out?', 'a' => 'Total mass, Amount, Molarity and Molecules, from Concentration and Volume. The relationship is Total mass = Concentration × Volume.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Length (bp), Concentration (ng/µL), Volume (µL), Molecule (A₂₆₀ factor), Molar mass per base (g/mol). With length, conc_ng_ul and volume_ul in place, Total mass can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total mass, Concentration, A₂₆₀ equivalent and Amount blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Total mass is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Length blank and the page solves for it, reporting Total mass instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Total mass at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/hardy-weinberg-equilibrium', 'name' => 'Hardy-Weinberg equilibrium Calculator'],
            ['path' => '/biology/hardy-weinberg-dominant-allele', 'name' => 'Hardy–Weinberg from the Dominant Allele Frequency Calculator'],
            ['path' => '/biology/hardy-weinberg-dominant-homozygote', 'name' => 'Hardy–Weinberg from the Dominant Homozygote Frequency Calculat'],
        ],
        'authors' => [],
    ],
];
