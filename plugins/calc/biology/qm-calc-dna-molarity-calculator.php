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
    'meta' => ['title' => 'DNA Molarity Calculator: Units and Formulas', 'description' => 'DNA Molarity Calculator works out total mass and amount from length, concentration and volume. Leave length empty and the page will solve for it instead.', 'h1' => 'DNA Molarity Calculator', 'updated' => '2026-10-29'],
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
        DNA Molarity turns Length, Concentration and Volume into Total mass and Amount. There is no hidden constant here: change total mass and length moves with it. The main result, Total mass, is reported in ng.
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
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total mass</strong> = <code>Concentration × Volume</code></li><li><strong>Concentration</strong> = <code>Total mass ÷ Volume</code></li><li><strong>A₂₆₀ equivalent</strong> = <code>Concentration ÷ Molecule (A₂₆₀ factor)</code></li><li><strong>Amount</strong> = <code>Total mass × 1000 ÷ (Molar mass per base × Length)</code></li><li><strong>Molarity</strong> = <code>Amount ÷ Volume × 1000</code></li><li><strong>Molecules</strong> = <code>Amount × 602214076000</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total mass</strong> = <code>Concentration × Volume</code> — the form to use when Concentration and Volume are the values you have.</li><li><strong>Concentration</strong> = <code>Total mass ÷ Volume</code> — the form to use when Total mass and Volume are the values you have.</li><li><strong>A₂₆₀ equivalent</strong> = <code>Concentration ÷ Molecule (A₂₆₀ factor)</code> — the form to use when Concentration and Molecule (A₂₆₀ factor) are the values you have.</li><li><strong>Amount</strong> = <code>Total mass × 1000 ÷ (Molar mass per base × Length)</code> — the form to use when Total mass, Molar mass per base and Length are the values you have.</li><li><strong>Total mass</strong> = <code>Amount × Molar mass per base × Length ÷ 1000</code> — the form to use when Amount, Molar mass per base and Length are the values you have.</li><li><strong>Molarity</strong> = <code>Amount ÷ Volume × 1000</code> — the form to use when Amount and Volume are the values you have.</li><li><strong>Molecules</strong> = <code>Amount × 602214076000</code> — the form to use when Amount are the values you have.</li></ul><p>Any one of Total mass, Concentration and A₂₆₀ equivalent can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total mass, Amount and Molarity are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Concentration left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Concentration is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Volume left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Volume is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Length and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the DNA Molarity form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Length</strong> is measured in bp. Fragment or genome length. It feeds Amount and Total mass. Fill it from a measurement rather than a memory — Length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Concentration</strong> is measured in ng/µL. What a nanodrop or a Qubit reports. It feeds Total mass and A₂₆₀ equivalent. Fill it from a measurement rather than a memory — Concentration is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Volume</strong> is measured in µL. It feeds Total mass, Concentration and Molarity. Fill it from a measurement rather than a memory — Volume is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Molecule (A₂₆₀ factor)</strong> takes a plain number with no unit attached. µg/mL per absorbance unit. It feeds A₂₆₀ equivalent. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Molecule (A₂₆₀ factor) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Molar mass per base</strong> is measured in g/mol. 660 dsDNA per bp, 330 ssDNA, 340 RNA. It feeds Amount and Total mass. Fill it from a measurement rather than a memory — Molar mass per base is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Total mass</strong> is a plain number. The value follows from Concentration and Volume. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Amount</strong> is a plain number. The value follows from Total mass, Molar mass per base and Length. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Molarity</strong> is a plain number. The value follows from Amount and Volume. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Molecules</strong> is a plain number. The value follows from Amount. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>A₂₆₀ equivalent</strong> is a plain number. The value follows from Concentration and Molecule (A₂₆₀ factor). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Length, Concentration, Volume and Molecule (A₂₆₀ factor) ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Length — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Total mass in ng against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Total mass follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Length, Concentration and Volume are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Length, Concentration and Volume is what you already know and Total mass and Amount is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/hardy-weinberg-equilibrium">Hardy-Weinberg equilibrium Calculator</a>, <a href="/biology/hardy-weinberg-dominant-allele">Hardy–Weinberg from the Dominant Allele Frequency Calculator</a> and <a href="/biology/hardy-weinberg-dominant-homozygote">Hardy–Weinberg from the Dominant Homozygote Frequency Calculat</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the DNA Molarity calculator work out?', 'a' => 'Total mass, Amount, Molarity and Molecules, from Concentration and Volume. The relationship is Total mass = Concentration × Volume.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Length (bp), Concentration (ng/µL), Volume (µL), Molecule (A₂₆₀ factor), Molar mass per base (g/mol). With length, concentration and volume in place, Total mass can stay blank and the page will work it out.
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
