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
    'meta' => ['title' => 'Protein concentration: Formula, Steps & Results', 'description' => 'Supply the absorbance at λmax, the pathlength and the concentration and the Protein concentration calculator solves for <strong>dilution factor</strong>.', 'h1' => 'Protein concentration Calculator', 'updated' => '2026-08-06'],
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
        'intro' => 'Supply the absorbance at λmax, the pathlength and the concentration and the Protein concentration calculator solves for <strong>dilution factor</strong>.',
        'sections' => [
            ['title' => 'How does the Protein concentration calculator work?', 'html' => <<<'TXT'
            <p>The Protein concentration calculator takes the values in the form, applies the relationship described below and reports <strong>dilution factor</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the protein); then you type in the absorbance at λmax, the pathlength and the concentration.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 15 options, such as aldose, APC - Allophycocyanin and ATP. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A number, expressed in nm.</li><li>A number, expressed in cm.</li><li>A number, expressed in mg/mL.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Protein</strong></td><td>One of 15 options, such as aldose, APC - Allophycocyanin and ATP.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Extinction coefficient</strong></td><td>A number stated in M⁻¹ cm⁻¹.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Molecular weight</strong></td><td>A number stated in g/mol.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Absorbance at λmax</strong></td><td>A number stated in nm.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Path length</strong></td><td>A number stated in cm.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Dilution factor</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Concentration</strong></td><td>A number stated in mg/mL.</td><td>—</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Protein concentration calculator', 'html' => <<<'TXT'
            <p>One relationship drives the whole page:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Dilution factor</span><span class="formula-eq">=</span><span class="formula-rhs">concentration × extinction coefficient × pathlength ÷ (absorbance at λmax × molecular weight)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Protein concentration calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 3 figures keep coming back — the absorbance at λmax, the pathlength and the concentration — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Round only at the end. </li><li>Write the answer down with its unit. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Protein concentration calculator, these are the ones that matter:</p>
            <ul><li>The 1 drop-down on this page offers a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — protein for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/protein-molecular-weight">Protein molecular weight</a>, <a href="/biology/punnett-square">Punnett square</a> and <a href="/biology/qpcr-efficiency">qPCR efficiency</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Protein concentration calculator work out?', 'a' => <<<'TXT'
            It returns dilution factor, derived from the absorbance at λmax, the pathlength and the concentration. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Protein concentration calculator?', 'a' => <<<'TXT'
            The form asks for the absorbance at λmax, the pathlength and the concentration, which is 4 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Extinction coefficient = 0. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Protein concentration calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/protein-molecular-weight', 'name' => 'Protein molecular weight'],
            ['path' => '/biology/punnett-square', 'name' => 'Punnett square'],
            ['path' => '/biology/qpcr-efficiency', 'name' => 'qPCR efficiency'],
        ],
    ],
];
