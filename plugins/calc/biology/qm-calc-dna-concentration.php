<?php

/**
 * DNA concentration
 * /biology/dna-concentration
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'DNA concentration',
    'meta' => ['title' => 'DNA concentration Calculator: Units & Formula', 'description' => 'DNA concentration turns sample type and extinction coefficient into conversion factor. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'DNA concentration Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sample_type',
                            'label' => 'Sample type',
                            'type' => 'select',
                            'options' => ['Single-stranded DNA' => '1', 'Double-stranded DNA' => '2', 'RNA' => '3', 'Custom oligonucleotide' => '4'],
                            'dataset' => 'conversion_factors_ds',
                            'default' => 'Single-stranded DNA',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'extinction_coefficient',
                            'label' => 'Extinction coefficient',
                            'type' => 'number',
                            'suffix' => 'M⁻¹ cm⁻¹',
                            'help' => 'Sum up extinction coefficients of all nucleotides in your sequence to obtain this value.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Molecular weight',
                            'type' => 'number',
                            'suffix' => 'g/mol',
                            'help' => 'Add up molecular weights of all nucleotides in your sequence to obtain this value.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'conversion_factor',
                            'label' => 'Conversion factor',
                            'type' => 'result',
                            'suffix' => 'μg/mL',
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
                            'help' => 'For a typical nucleotide, λmax is 260 nm, but use the highest peak indicated by spectrophotometric reading.',
                            'rounding' => ['standard', '3'],
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
                            'help' => 'Spectrophotometer cuvettes are typically 1 cm (0.39 in) long, but adjust if needed.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['standard', '2'],
                            'defaults' => [
                                ['value' => '1', 'when' => null],
                                ['value' => '0.39', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0],
                    'fields' => [
                        [
                            'name' => 'dilution_factor',
                            'label' => 'Dilution factor',
                            'type' => 'number',
                            'help' => 'Change only if the absorbance is obtained from a diluted sample. Leave one if the sample is not diluted.',
                            'rounding' => ['standard', '3'],
                            'defaults' => [
                                ['value' => '1', 'when' => null],
                                ['value' => '1', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                        ['type' => 'note', 'text' => 'If the dilution factor is less than 1, the solution isn\'t diluted!'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'concentration',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'help' => 'Concentration of the nucleic acid in the sample.',
                            'unit' => '21',
                            'unit_default' => 'ugml',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'concentration = (absorbance / pathlength) * conversion_factor * dilution_factor',
            'results' => [
                'pathlength' => 'absorbance*conversion_factor*dilution_factor/concentration',
                'absorbance' => 'concentration*pathlength/(conversion_factor*dilution_factor)',
                'dilution_factor' => 'concentration*pathlength/(absorbance*conversion_factor)',
                'concentration' => 'absorbance*conversion_factor*dilution_factor/pathlength',
                'conversion_factor' => 'concentration*pathlength/(absorbance*dilution_factor)',
            ],
        ],
        [
            'title' => 'conversion_factor = weight  / extinction_coefficient',
            'results' => ['extinction_coefficient' => 'weight/conversion_factor', 'weight' => 'conversion_factor*extinction_coefficient', 'conversion_factor' => 'weight/extinction_coefficient'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        DNA concentration turns Sample type, Extinction coefficient and Molecular weight into Conversion factor. It is a single relationship that reads conversion factor out of sample type, not a table of canned results keyed by them. Units for Conversion factor default to μg/mL and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the DNA concentration calculator works', 'html' => <<<'TXT'
            <p>The DNA concentration calculator applies one relationship to 7 numbers and reports Conversion factor.</p><p>The relationship it solves reads Concentration = Absorbance at λmax × Conversion factor × Dilution factor ÷ Pathlength.</p><p>The result panel carries Conversion factor, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs.</p><ul><li><strong>Sample type</strong> — a plain number, no unit</li><li><strong>Extinction coefficient</strong> — in M⁻¹ cm⁻¹. Sum up extinction coefficients of all nucleotides in your sequence to obtain this value.</li><li><strong>Molecular weight</strong> — in g/mol. Add up molecular weights of all nucleotides in your sequence to obtain this value.</li><li><strong>Absorbance at λmax</strong> — a plain number, no unit. For a typical nucleotide, λmax is 260 nm, but use the highest peak indicated by spectrophotometric reading.</li><li><strong>Pathlength</strong> — in centimeters. Spectrophotometer cuvettes are typically 1 cm (0.39 in) long, but adjust if needed.</li><li><strong>Dilution factor</strong> — a plain number, no unit. Change only if the absorbance is obtained from a diluted sample. Leave one if the sample is not diluted.</li><li><strong>Concentration</strong> — in micrograms per milliliter. Concentration of the nucleic acid in the sample.</li></ul><p>The result box is Conversion factor in μg/mL. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Pathlength offers 7 units and opens on centimeters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Concentration</strong> = <code>Absorbance at λmax × Conversion factor × Dilution factor ÷ Pathlength</code></li><li><strong>Pathlength</strong> = <code>Absorbance at λmax × Conversion factor × Dilution factor ÷ Concentration</code></li><li><strong>Absorbance at λmax</strong> = <code>Concentration × Pathlength ÷ (Conversion factor × Dilution factor)</code></li><li><strong>Dilution factor</strong> = <code>Concentration × Pathlength ÷ (Absorbance at λmax × Conversion factor)</code></li><li><strong>Conversion factor</strong> = <code>Concentration × Pathlength ÷ (Absorbance at λmax × Dilution factor)</code></li><li><strong>Extinction coefficient</strong> = <code>Molecular weight ÷ Conversion factor</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Concentration</strong> = <code>Absorbance at λmax × Conversion factor × Dilution factor ÷ Pathlength</code> — the form to use when Absorbance at λmax, Conversion factor, Dilution factor and Pathlength are the values you have.</li><li><strong>Pathlength</strong> = <code>Absorbance at λmax × Conversion factor × Dilution factor ÷ Concentration</code> — the form to use when Absorbance at λmax, Conversion factor, Dilution factor and Concentration are the values you have.</li><li><strong>Absorbance at λmax</strong> = <code>Concentration × Pathlength ÷ (Conversion factor × Dilution factor)</code> — the form to use when Concentration, Pathlength, Conversion factor and Dilution factor are the values you have.</li><li><strong>Dilution factor</strong> = <code>Concentration × Pathlength ÷ (Absorbance at λmax × Conversion factor)</code> — the form to use when Concentration, Pathlength, Absorbance at λmax and Conversion factor are the values you have.</li><li><strong>Conversion factor</strong> = <code>Concentration × Pathlength ÷ (Absorbance at λmax × Dilution factor)</code> — the form to use when Concentration, Pathlength, Absorbance at λmax and Dilution factor are the values you have.</li><li><strong>Conversion factor</strong> = <code>Molecular weight ÷ Extinction coefficient</code> — the form to use when Molecular weight and Extinction coefficient are the values you have.</li><li><strong>Extinction coefficient</strong> = <code>Molecular weight ÷ Conversion factor</code> — the form to use when Molecular weight and Conversion factor are the values you have.</li><li><strong>Molecular weight</strong> = <code>Conversion factor × Extinction coefficient</code> — the form to use when Conversion factor and Extinction coefficient are the values you have.</li></ul><p>Any one of Concentration, Pathlength and Absorbance at λmax can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Pathlength and Concentration is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Conversion factor is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Sample type left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Sample type is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Extinction coefficient left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Extinction coefficient is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Sample type is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the DNA concentration form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Sample type</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Sample type is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Extinction coefficient</strong> is measured in M⁻¹ cm⁻¹. Sum up extinction coefficients of all nucleotides in your sequence to obtain this value. The page reads it when it works out Molecular weight and Conversion factor. Fill it from a measurement rather than a memory — Extinction coefficient is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Molecular weight</strong> is measured in g/mol. Add up molecular weights of all nucleotides in your sequence to obtain this value. The page reads it when it works out Extinction coefficient and Conversion factor. Fill it from a measurement rather than a memory — Molecular weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Absorbance at λmax</strong> takes a plain number with no unit attached. For a typical nucleotide, λmax is 260 nm, but use the highest peak indicated by spectrophotometric reading. The page reads it when it works out Pathlength, Dilution factor and Concentration. Fill it from a measurement rather than a memory — Absorbance at λmax is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Pathlength</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Spectrophotometer cuvettes are typically 1 cm (0.39 in) long, but adjust if needed. The page reads it when it works out Absorbance at λmax, Dilution factor and Concentration. Fill it from a measurement rather than a memory — Pathlength is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Dilution factor</strong> takes a plain number with no unit attached. Change only if the absorbance is obtained from a diluted sample. Leave one if the sample is not diluted. The page reads it when it works out Pathlength, Absorbance at λmax and Concentration. Fill it from a measurement rather than a memory — Dilution factor is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Concentration</strong> is a micrograms per milliliter quantity: the page opens it in ugml and converts anything else you pick before the formula runs. Concentration of the nucleic acid in the sample. The page reads it when it works out Pathlength, Absorbance at λmax and Dilution factor. Fill it from a measurement rather than a memory — Concentration is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Conversion factor</strong> is a plain number. The value follows from Concentration, Pathlength, Absorbance at λmax and Dilution factor. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on DNA concentration actually offers.</p><ul><li><strong>centimeters</strong> — opens in <em>cm</em>, and the chip also carries cm, m, in, ft, yd and μm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>micrograms per milliliter</strong> — opens in <em>ugml</em>, and the chip also carries µg/mL, g/L, mg/L, kg/m³, mg/mL and lb/cu yd. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Conversion factor follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover centimeters and micrograms per milliliter. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Sample type, Extinction coefficient and Molecular weight is what you already know and Conversion factor is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the DNA concentration calculator work out?', 'a' => <<<'TXT'
            Conversion factor, from Absorbance at λmax, Conversion factor, Dilution factor and Pathlength. The relationship is Concentration = Absorbance at λmax × Conversion factor × Dilution factor ÷ Pathlength.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Sample type, Extinction coefficient (M⁻¹ cm⁻¹), Molecular weight (g/mol), Absorbance at λmax, Pathlength (centimeters). Fill sample type, extinction coefficient and molecular weight and leave Conversion factor empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Concentration, Pathlength, Absorbance at λmax and Dilution factor blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Conversion factor is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Sample type blank and the page solves for it, reporting Conversion factor instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Conversion factor at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/plant-available-water', 'name' => 'Field Capacity and Plant Available Water Calculator'],
            ['path' => '/biology/field-capacity', 'name' => 'Field Capacity Calculator'],
            ['path' => '/biology/fish-condition-factor', 'name' => 'Fish Condition Factor Calculator'],
        ],
        'authors' => [],
    ],
];
