<?php

/**
 * Enzyme Unit Converter (U/mg, kcat)
 * /biology/enzyme-unit-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Enzyme Unit Converter (U/mg, kcat)',
    'meta' => ['title' => 'Enzyme Unit Converter (U/mg, kcat) Calculator', 'description' => 'One unit of enzyme converts one micromole of substrate per minute; kcat is the same activity per active site per second. Free enzyme unit converter (u/mg, kca', 'h1' => 'Enzyme Unit Converter (U/mg, kcat)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'activity',
                            'label' => 'Specific activity',
                            'type' => 'number',
                            'suffix' => 'U/mg',
                            'help' => 'Micromoles per minute per milligram',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                        [
                            'name' => 'mw',
                            'label' => 'Enzyme molecular weight',
                            'type' => 'number',
                            'suffix' => 'Da',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '48000',
                        ],
                        [
                            'name' => 'kcat',
                            'label' => 'kcat (turnover number)',
                            'type' => 'number',
                            'suffix' => 's⁻¹',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'molar_activity',
                            'label' => 'Molar activity',
                            'type' => 'number',
                            'suffix' => 'min⁻¹',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ukat',
                            'label' => 'Activity in katal per mg',
                            'type' => 'number',
                            'suffix' => 'µkat/mg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'efficiency',
                            'label' => 'Catalytic efficiency (with Km)',
                            'type' => 'number',
                            'suffix' => 'M⁻¹s⁻¹',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'km',
                            'label' => 'Km',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'help' => 'Optional — used for catalytic efficiency',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '250',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Enzyme units',
            'results' => [
                'kcat' => 'activity*60000/mw',
                'molar_activity' => 'activity*60000/mw*60',
                'ukat' => 'activity/60',
                'efficiency' => 'activity*60000/mw/(km/1000000)',
                'activity' => 'kcat*mw/60000',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enzyme Unit Converter (U/mg, kcat) works out kcat (turnover number) and Molar activity from Specific activity, Enzyme molecular weight and Km. The arithmetic is the whole method: kcat (turnover number) is worked out from Specific activity by one formula, applied once. kcat (turnover number) comes back in s⁻¹ unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Enzyme Unit Converter (U/mg, kcat) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Enzyme Unit Converter (U/mg, kcat): it takes 3 numbers and reports kcat (turnover number), Molar activity and Activity in katal per mg.</p><p>In the form&#039;s own words, kcat (turnover number) = Specific activity × 60000 ÷ Enzyme molecular weight.</p><p>The answers are kcat (turnover number), Molar activity, Activity in katal per mg and Catalytic efficiency (with Km); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Specific activity</strong> — in U/mg. Micromoles per minute per milligram</li><li><strong>Enzyme molecular weight</strong> — in Da</li><li><strong>Km</strong> — in µM. Optional — used for catalytic efficiency</li></ul><p>The answers come back as kcat (turnover number) in s⁻¹, Molar activity in min⁻¹, Activity in katal per mg in µkat/mg, Catalytic efficiency (with Km) in M⁻¹s⁻¹. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as kcat (turnover number) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>kcat (turnover number)</strong> = <code>Specific activity × 60000 ÷ Enzyme molecular weight</code></li><li><strong>Molar activity</strong> = <code>Specific activity × 60000 ÷ Enzyme molecular weight × 60</code></li><li><strong>Activity in katal per mg</strong> = <code>Specific activity ÷ 60</code></li><li><strong>Catalytic efficiency (with Km)</strong> = <code>Specific activity × 60000 ÷ Enzyme molecular weight ÷ (Km ÷ 1000000)</code></li><li><strong>Specific activity</strong> = <code>kcat (turnover number) × Enzyme molecular weight ÷ 60000</code></li></ul><p>Any one of kcat (turnover number), Molar activity and Activity in katal per mg can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> kcat (turnover number), Molar activity and Activity in katal per mg are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Specific activity is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Specific activity, Enzyme molecular weight and Km and the number you are missing is kcat (turnover number) and Molar activity.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/autosomal-dominant-pedigree">Autosomal Dominant Pedigree Analyzer Calculator</a>, <a href="/biology/autosomal-recessive-risk">Autosomal Recessive Inheritance Risk Calculator</a> and <a href="/biology/bacteria-growth">Bacteria growth Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Enzyme Unit Converter (U/mg, kcat) calculator work out?', 'a' => <<<'TXT'
            kcat (turnover number), Molar activity, Activity in katal per mg and Catalytic efficiency (with Km), from Specific activity and Enzyme molecular weight. The relationship is kcat (turnover number) = Specific activity × 60000 ÷ Enzyme molecular weight.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Specific activity (U/mg), Enzyme molecular weight (Da), Km (µM). With activity, mw and km in place, kcat (turnover number) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of kcat (turnover number), Molar activity, Activity in katal per mg and Catalytic efficiency (with Km) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            kcat (turnover number) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Specific activity left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to kcat (turnover number) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/autosomal-dominant-pedigree', 'name' => 'Autosomal Dominant Pedigree Analyzer Calculator'],
            ['path' => '/biology/autosomal-recessive-risk', 'name' => 'Autosomal Recessive Inheritance Risk Calculator'],
            ['path' => '/biology/bacteria-growth', 'name' => 'Bacteria growth Calculator'],
        ],
        'authors' => [],
    ],
];
