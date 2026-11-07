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
    'meta' => ['title' => 'DNA concentration: Formula, Steps & Results', 'description' => 'DNA concentration turns Sample type, Extinction coefficient and Molecular weight into Conversion factor. Leave one if the sample is not diluted.Concentration…', 'h1' => 'DNA concentration Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'absorbance' => [
                'type' => 'numerical',
                'rnd' => ['standard', '3'],
            ],
            'concentration' => [
                'type' => 'numerical',
                'rnd' => ['standard', '3'],
            ],
            'conversion_factor' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'dilution_factor' => [
                'type' => 'numerical',
                'rnd' => ['standard', '3'],
                'dfl' => [
                    ['v' => '1', 'c' => null],
                    ['v' => '1', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'extinction_coefficient' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'pathlength' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '1', 'c' => null],
                    ['v' => '0.39', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'sample_type' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'UXxT0mSb4mzjOkoMvD-bV', 'c' => null],
                ],
                'ds' => 'OkJqQvamvHFliIPpIN-bz',
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'oyvX0Fktn2FzJySGFH6l3',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'sample_type',
                                    'vt' => 'valueSelect',
                                    'l' => 'Sample type',
                                    'ds' => 'OkJqQvamvHFliIPpIN-bz',
                                    'opts' => [
                                        ['UXxT0mSb4mzjOkoMvD-bV', 'Single-stranded DNA', '1'],
                                        ['08XgMYdm7Jtl2O2s6oaWj', 'Double-stranded DNA', '2'],
                                        ['W2QQr7qvwM_pqZj4YN8yj', 'RNA', '3'],
                                        ['38BNVHby_WiYHt5e6QMxz', 'Custom oligonucleotide', '4'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'extinction_coefficient',
                                    'vt' => 'numerical',
                                    'l' => 'Extinction coefficient',
                                    'suf' => 'M⁻¹ cm⁻¹',
                                    'h' => 'Sum up extinction coefficients of all nucleotides in your sequence to obtain this value.',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => 'Molecular weight',
                                    'suf' => 'g/mol',
                                    'h' => 'Add up molecular weights of all nucleotides in your sequence to obtain this value.',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'conversion_factor',
                                    'vt' => 'dependent',
                                    'l' => 'Conversion factor',
                                    'suf' => 'μg/mL',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'absorbance',
                                    'vt' => 'numerical',
                                    'l' => 'Absorbance at λmax',
                                    'h' => 'For a typical nucleotide, λmax is 260 nm, but use the highest peak indicated by spectrophotometric reading.',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'pathlength',
                                    'vt' => 'numerical',
                                    'l' => 'Pathlength',
                                    'h' => 'Spectrophotometer cuvettes are typically 1 cm (0.39 in) long, but adjust if needed.',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'dilution_factor',
                                    'vt' => 'numerical',
                                    'l' => 'Dilution factor',
                                    'h' => 'Change only if the absorbance is obtained from a diluted sample. Leave one if the sample is not diluted.',
                                ],
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'If the dilution factor is less than 1, the solution isn\'t diluted!'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'concentration',
                                    'vt' => 'numerical',
                                    'l' => 'Concentration',
                                    'h' => 'Concentration of the nucleic acid in the sample.',
                                    'us' => '21',
                                    'du' => 'ugml',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'concentration = (absorbance / pathlength) * conversion_factor * dilution_factor',
                'var' => [
                    [
                        'l' => 'pathlength',
                        'f' => 'absorbance*conversion_factor*dilution_factor/concentration',
                        'r' => ['absorbance', 'dilution_factor', 'concentration', 'conversion_factor'],
                    ],
                    [
                        'l' => 'absorbance',
                        'f' => 'concentration*pathlength/(conversion_factor*dilution_factor)',
                        'r' => ['pathlength', 'dilution_factor', 'concentration', 'conversion_factor'],
                    ],
                    [
                        'l' => 'dilution_factor',
                        'f' => 'concentration*pathlength/(absorbance*conversion_factor)',
                        'r' => ['pathlength', 'absorbance', 'concentration', 'conversion_factor'],
                    ],
                    [
                        'l' => 'concentration',
                        'f' => 'absorbance*conversion_factor*dilution_factor/pathlength',
                        'r' => ['pathlength', 'absorbance', 'dilution_factor', 'conversion_factor'],
                    ],
                    [
                        'l' => 'conversion_factor',
                        'f' => 'concentration*pathlength/(absorbance*dilution_factor)',
                        'r' => ['pathlength', 'absorbance', 'dilution_factor', 'concentration'],
                    ],
                ],
            ],
            [
                'formula' => 'conversion_factor = weight  / extinction_coefficient',
                'var' => [
                    [
                        'l' => 'extinction_coefficient',
                        'f' => 'weight/conversion_factor',
                        'r' => ['weight', 'conversion_factor'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => 'conversion_factor*extinction_coefficient',
                        'r' => ['extinction_coefficient', 'conversion_factor'],
                    ],
                    [
                        'l' => 'conversion_factor',
                        'f' => 'weight/extinction_coefficient',
                        'r' => ['extinction_coefficient', 'weight'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'OkJqQvamvHFliIPpIN-bz' => [
                'name' => 'conversion_factors_ds',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'UXxT0mSb4mzjOkoMvD-bV', 'label' => 'Single-stranded DNA', 'value' => '1'],
                    ['uid' => '08XgMYdm7Jtl2O2s6oaWj', 'label' => 'Double-stranded DNA', 'value' => '2'],
                    ['uid' => 'W2QQr7qvwM_pqZj4YN8yj', 'label' => 'RNA', 'value' => '3'],
                    ['uid' => '38BNVHby_WiYHt5e6QMxz', 'label' => 'Custom oligonucleotide', 'value' => '4'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        DNA concentration turns Sample type, Extinction coefficient and Molecular weight into Conversion factor. It is a single relationship that reads Conversion factor out of Sample type, not a table of canned results keyed by them. Units for Conversion factor default to μg/mL and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the DNA concentration calculator works', 'html' => <<<'TXT'
            <p>The DNA concentration calculator applies one relationship to 7 numbers and reports Conversion factor.</p><p>The relationship it solves reads Pathlength = Absorbance at λmax × Conversion factor × Dilution factor ÷ Concentration.</p><p>The result panel carries Conversion factor, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs.</p><ul><li><strong>Sample type</strong> — a plain number, no unit</li><li><strong>Extinction coefficient</strong> — in M⁻¹ cm⁻¹. Sum up extinction coefficients of all nucleotides in your sequence to obtain this value.</li><li><strong>Molecular weight</strong> — in g/mol. Add up molecular weights of all nucleotides in your sequence to obtain this value.</li><li><strong>Absorbance at λmax</strong> — a plain number, no unit. For a typical nucleotide, λmax is 260 nm, but use the highest peak indicated by spectrophotometric reading.</li><li><strong>Pathlength</strong> — in centimeters. Spectrophotometer cuvettes are typically 1 cm (0.39 in) long, but adjust if needed.</li><li><strong>Dilution factor</strong> — a plain number, no unit. Change only if the absorbance is obtained from a diluted sample. Leave one if the sample is not diluted.</li><li><strong>Concentration</strong> — in micrograms per milliliter. Concentration of the nucleic acid in the sample.</li></ul><p>The result box is Conversion factor in μg/mL. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Pathlength offers 31 units and opens on centimeters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Pathlength</strong> = <code>Absorbance at λmax × Conversion factor × Dilution factor ÷ Concentration</code></li><li><strong>Absorbance at λmax</strong> = <code>Concentration × Pathlength ÷ (Conversion factor × Dilution factor)</code></li><li><strong>Dilution factor</strong> = <code>Concentration × Pathlength ÷ (Absorbance at λmax × Conversion factor)</code></li><li><strong>Concentration</strong> = <code>Absorbance at λmax × Conversion factor × Dilution factor ÷ Pathlength</code></li><li><strong>Conversion factor</strong> = <code>Concentration × Pathlength ÷ (Absorbance at λmax × Dilution factor)</code></li><li><strong>Extinction coefficient</strong> = <code>Molecular weight ÷ Conversion factor</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Pathlength</strong> = <code>Absorbance at λmax × Conversion factor × Dilution factor ÷ Concentration</code> — the form to use when Absorbance at λmax, Dilution factor, Concentration and Conversion factor are the values you have.</li><li><strong>Absorbance at λmax</strong> = <code>Concentration × Pathlength ÷ (Conversion factor × Dilution factor)</code> — the form to use when Pathlength, Dilution factor, Concentration and Conversion factor are the values you have.</li><li><strong>Dilution factor</strong> = <code>Concentration × Pathlength ÷ (Absorbance at λmax × Conversion factor)</code> — the form to use when Pathlength, Absorbance at λmax, Concentration and Conversion factor are the values you have.</li><li><strong>Concentration</strong> = <code>Absorbance at λmax × Conversion factor × Dilution factor ÷ Pathlength</code> — the form to use when Pathlength, Absorbance at λmax, Dilution factor and Conversion factor are the values you have.</li><li><strong>Conversion factor</strong> = <code>Concentration × Pathlength ÷ (Absorbance at λmax × Dilution factor)</code> — the form to use when Pathlength, Absorbance at λmax, Dilution factor and Concentration are the values you have.</li><li><strong>Extinction coefficient</strong> = <code>Molecular weight ÷ Conversion factor</code> — the form to use when Molecular weight and Conversion factor are the values you have.</li><li><strong>Molecular weight</strong> = <code>Conversion factor × Extinction coefficient</code> — the form to use when Extinction coefficient and Conversion factor are the values you have.</li><li><strong>Conversion factor</strong> = <code>Molecular weight ÷ Extinction coefficient</code> — the form to use when Extinction coefficient and Molecular weight are the values you have.</li></ul><p>Any one of Pathlength, Absorbance at λmax and Dilution factor can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
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
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Conversion factor</strong> is a plain number. The value follows from Pathlength, Absorbance at λmax, Dilution factor and Concentration. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on DNA concentration actually offers.</p><ul><li><strong>centimeters</strong> — 31 units. It opens in <em>cm</em>, and the chip also carries in, m, ft, Å, nm and pm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>micrograms per milliliter</strong> — 28 units. It opens in <em>ugml</em>, and the chip also carries µg/mL, g/L, mg/L, kg/m³, lb/cu ft and g/mL. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Conversion factor follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover centimeters and micrograms per milliliter. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Sample type, Extinction coefficient and Molecular weight is what you already know and Conversion factor is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/plant-available-water">Field Capacity and Plant Available Water Calculator</a>, <a href="/biology/field-capacity">Field Capacity Calculator</a> and <a href="/biology/fish-condition-factor">Fish Condition Factor Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the DNA concentration calculator work out?', 'a' => <<<'TXT'
            Conversion factor, from Absorbance at λmax, Dilution factor, Concentration and Conversion factor. The relationship is Pathlength = Absorbance at λmax × Conversion factor × Dilution factor ÷ Concentration.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Sample type, Extinction coefficient (M⁻¹ cm⁻¹), Molecular weight (g/mol), Absorbance at λmax, Pathlength (centimeters). Fill sample_type, extinction_coefficient and weight and leave Conversion factor empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Pathlength, Absorbance at λmax, Dilution factor and Concentration blank and the page solves for that one instead — nothing has to be switched first.
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
