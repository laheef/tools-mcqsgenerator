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
    'meta' => ['title' => 'Protein concentration: Formula, Steps & Results', 'description' => 'Protein concentration works out concentration from protein, extinction coefficient and molecular weight. The formula is printed in the form\'s own words.', 'h1' => 'Protein concentration Calculator', 'updated' => '2026-08-06'],
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
        Enter Protein, Absorbance at λmax and Pathlength into Protein concentration and the answer comes back as Extinction coefficient and Molecular weight. It is a single relationship that reads extinction coefficient out of protein, not a table of canned results keyed by them. Units for Extinction coefficient default to M⁻¹ cm⁻¹ and can be changed on the answer itself.
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
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Dilution factor</strong> = <code>Concentration × Extinction coefficient × Pathlength ÷ (Absorbance at λmax × Molecular weight)</code></li><li><strong>Concentration</strong> = <code>Absorbance at λmax × Dilution factor × Molecular weight ÷ (Extinction coefficient × Pathlength)</code></li><li><strong>Extinction coefficient</strong> = <code>Absorbance at λmax × Dilution factor × Molecular weight ÷ (Concentration × Pathlength)</code></li><li><strong>Pathlength</strong> = <code>Absorbance at λmax × Dilution factor × Molecular weight ÷ (Concentration × Extinction coefficient)</code></li><li><strong>Molecular weight</strong> = <code>Concentration × Extinction coefficient × Pathlength ÷ (Absorbance at λmax × Dilution factor)</code></li><li><strong>Absorbance at λmax</strong> = <code>Concentration × Extinction coefficient × Pathlength ÷ (Dilution factor × Molecular weight)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Dilution factor</strong> = <code>Concentration × Extinction coefficient × Pathlength ÷ (Absorbance at λmax × Molecular weight)</code> — the form to use when Concentration, Extinction coefficient, Pathlength and Absorbance at λmax are the values you have.</li><li><strong>Concentration</strong> = <code>Absorbance at λmax × Dilution factor × Molecular weight ÷ (Extinction coefficient × Pathlength)</code> — the form to use when Absorbance at λmax, Dilution factor, Molecular weight and Extinction coefficient are the values you have.</li><li><strong>Extinction coefficient</strong> = <code>Absorbance at λmax × Dilution factor × Molecular weight ÷ (Concentration × Pathlength)</code> — the form to use when Absorbance at λmax, Dilution factor, Molecular weight and Concentration are the values you have.</li><li><strong>Pathlength</strong> = <code>Absorbance at λmax × Dilution factor × Molecular weight ÷ (Concentration × Extinction coefficient)</code> — the form to use when Absorbance at λmax, Dilution factor, Molecular weight and Concentration are the values you have.</li><li><strong>Molecular weight</strong> = <code>Concentration × Extinction coefficient × Pathlength ÷ (Absorbance at λmax × Dilution factor)</code> — the form to use when Concentration, Extinction coefficient, Pathlength and Absorbance at λmax are the values you have.</li><li><strong>Absorbance at λmax</strong> = <code>Concentration × Extinction coefficient × Pathlength ÷ (Dilution factor × Molecular weight)</code> — the form to use when Concentration, Extinction coefficient, Pathlength and Dilution factor are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Dilution factor, Concentration and Extinction coefficient can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Extinction coefficient, Molecular weight and Concentration are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Protein left as a guess.</strong> Anything typed into Protein is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Absorbance at λmax left as a guess.</strong> Anything typed into Absorbance at λmax is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Pathlength left as a guess.</strong> Anything typed into Pathlength is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Protein is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Protein concentration form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Protein</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Protein is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Absorbance at λmax</strong> is measured in nm. Use the maximum absorbance (i.e. highest peak). For protein, λmax is typically 280 nm. It feeds Dilution factor, Concentration and Extinction coefficient. Fill it from a measurement rather than a memory — Absorbance at λmax is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Pathlength</strong> is measured in cm. It feeds Dilution factor, Concentration and Extinction coefficient. Fill it from a measurement rather than a memory — Pathlength is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Dilution factor</strong> takes a plain number with no unit attached. The factor 1 equals the stock sample. If you measure the absorbance with a diluted sample, enter for example 5 for a 1:5 dilution.&amp;nbsp;. It feeds Concentration, Extinction coefficient and Pathlength. Fill it from a measurement rather than a memory — Dilution factor is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Extinction coefficient</strong> is a plain number. It is computed from Absorbance at λmax, Dilution factor, Molecular weight and Concentration, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Molecular weight</strong> is a plain number. It is computed from Concentration, Extinction coefficient, Pathlength and Absorbance at λmax, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Concentration</strong> is a plain number. It is computed from Absorbance at λmax, Dilution factor, Molecular weight and Extinction coefficient, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Protein, Absorbance at λmax, Pathlength and Dilution factor ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Protein — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Extinction coefficient in M⁻¹ cm⁻¹ against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Extinction coefficient is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
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
            Protein, Absorbance at λmax (nm), Pathlength (cm), Dilution factor. With protein, absorbance at λmax and pathlength in place, Extinction coefficient can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Dilution factor, Concentration, Extinction coefficient and Pathlength can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Extinction coefficient is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
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
