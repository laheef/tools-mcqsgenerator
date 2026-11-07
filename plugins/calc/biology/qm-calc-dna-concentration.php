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
    'meta' => ['title' => 'DNA concentration: Formula, Steps & Results', 'description' => 'Supply the molecular weight, the absorbance at λmax, the dilution factor and the concentration and the DNA concentration calculator solves for <strong>Path…', 'h1' => 'DNA concentration Calculator', 'updated' => '2026-08-10'],
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
        Supply the molecular weight, the absorbance at λmax, the dilution factor and the concentration and the DNA concentration calculator solves for <strong>Path length</strong>.
        TXT,
        'sections' => [
            ['title' => 'How does the DNA concentration calculator work?', 'html' => <<<'TXT'
            <p>The DNA concentration calculator takes the values in the form, applies the relationship described below and reports <strong>Path length</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the sample type); then you type in the molecular weight, the absorbance at λmax, the dilution factor and the concentration.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 4 options, such as single-stranded DNA, double-stranded DNA and RNA. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A number, expressed in g/mol.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in micrograms per milliliter. The unit chip switches it to any of the 28 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Sample type</strong></td><td>One of 4 options, such as single-stranded DNA, double-stranded DNA and RNA.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Extinction coefficient</strong></td><td>A number stated in M⁻¹ cm⁻¹.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Molecular weight</strong></td><td>A number stated in g/mol.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Conversion factor</strong></td><td>A number stated in μg/mL.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Absorbance at λmax</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Path length</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Dilution factor</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Concentration</strong></td><td>A measured quantity, 28 units available.</td><td>micrograms per milliliter</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the DNA concentration calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Path length</span><span class="formula-eq">=</span><span class="formula-rhs">absorbance at λmax × conversion factor × dilution factor ÷ concentration</span></div><div class="formula-row"><span class="formula-lhs">Extinction coefficient</span><span class="formula-eq">=</span><span class="formula-rhs">molecular weight ÷ conversion factor</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Density, opening in micrograms per milliliter</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The DNA concentration calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 4 figures keep coming back — the molecular weight, the absorbance at λmax and the dilution factor — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/dna-copy-number">DNA copy number</a>, <a href="/biology/dna-to-mrna">DNA to mRNA</a> and <a href="/biology/dog-age">Dog age</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the DNA concentration calculator work out?', 'a' => <<<'TXT'
            It returns pathlength, derived from the molecular weight, the absorbance at λmax and the dilution factor. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the DNA concentration calculator?', 'a' => <<<'TXT'
            The form asks for the molecular weight, the absorbance at λmax, the dilution factor and the concentration, which is 5 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter pathlength in a different unit?', 'a' => <<<'TXT'
            Yes. Path length opens in centimeters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Conversion factor = 0. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the DNA concentration calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/dna-copy-number', 'name' => 'DNA copy number'],
            ['path' => '/biology/dna-to-mrna', 'name' => 'DNA to mRNA'],
            ['path' => '/biology/dog-age', 'name' => 'Dog age'],
        ],
    ],
];
