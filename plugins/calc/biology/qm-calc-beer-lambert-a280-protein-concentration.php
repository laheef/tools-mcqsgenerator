<?php

/**
 * Beer-Lambert A280 Protein Concentration
 * /biology/beer-lambert-a280-protein-concentration
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Beer-Lambert A280 Protein Concentration',
    'meta' => ['title' => 'Beer-Lambert A280 Protein Concentration Calculator', 'description' => 'Beer-Lambert A280 Protein Concentration turns Absorbance at 280 nm, Extinction coefficient and Molecular weight into Protein concentration and Protein…', 'h1' => 'Beer-Lambert A280 Protein Concentration', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'a280',
                            'label' => 'Absorbance at 280 nm',
                            'type' => 'number',
                            'help' => 'Blanked against buffer',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.85',
                        ],
                        [
                            'name' => 'ext',
                            'label' => 'Extinction coefficient',
                            'type' => 'number',
                            'suffix' => 'M⁻¹cm⁻¹',
                            'help' => 'From the sequence, or 1.0 for 1 mg/mL = 1 AU',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '43824',
                        ],
                        [
                            'name' => 'mw',
                            'label' => 'Molecular weight',
                            'type' => 'number',
                            'suffix' => 'Da',
                            'help' => 'Used when the coefficient is molar',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '55000',
                        ],
                        [
                            'name' => 'path',
                            'label' => 'Path length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => '1 cm cuvette, or the drop path of a NanoDrop',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'conc_mg',
                            'label' => 'Protein concentration',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'conc_um',
                            'label' => 'Protein concentration',
                            'type' => 'number',
                            'suffix' => 'µM',
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
            'results' => ['conc_mg' => 'a280*mw/(ext*path)', 'conc_um' => 'a280/(ext*path)*1000000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Beer-Lambert A280 Protein Concentration turns Absorbance at 280 nm, Extinction coefficient and Molecular weight into Protein concentration and Protein concentration. There is no hidden constant here: change Protein concentration and Absorbance at 280 nm moves with it. The main result, Protein concentration, is reported in mg/mL.
        TXT,
        'sections' => [
            ['title' => 'How the Beer-Lambert A280 Protein Concentration calculator works', 'html' => <<<'TXT'
            <p>The Beer-Lambert A280 Protein Concentration calculator applies one relationship to 4 numbers and reports Protein concentration and Protein concentration.</p><p>Written with the labels from the form, Protein concentration = Absorbance at 280 nm × Molecular weight ÷ (Extinction coefficient × Path length).</p><p>The answers are Protein concentration and Protein concentration; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Absorbance at 280 nm</strong> — a plain number, no unit. Blanked against buffer</li><li><strong>Extinction coefficient</strong> — in M⁻¹cm⁻¹. From the sequence, or 1.0 for 1 mg/mL = 1 AU</li><li><strong>Molecular weight</strong> — in Da. Used when the coefficient is molar</li><li><strong>Path length</strong> — in cm. 1 cm cuvette, or the drop path of a NanoDrop</li></ul><p>The result boxes are Protein concentration in mg/mL, Protein concentration in µM; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Absorbance at 280 nm = 0.85, Extinction coefficient = 43824 M⁻¹cm⁻¹, Molecular weight = 55000 Da and Path length = 1 cm; the answers are &lt;strong&gt;Protein concentration&lt;/strong&gt; = 1.07 mg/mL and &lt;strong&gt;Protein concentration&lt;/strong&gt; = 19.4 µM.</p><ul><li><strong>Protein concentration</strong> = 1.07 mg/mL</li><li><strong>Protein concentration</strong> = 19.4 µM</li></ul><p>That is <strong>Protein concentration</strong> = <code>Absorbance at 280 nm × Molecular weight ÷ (Extinction coefficient × Path length)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Protein concentration&lt;/strong&gt; = 1.07 and &lt;strong&gt;Protein concentration&lt;/strong&gt; = 19.4 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Protein concentration takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Protein concentration</strong> = <code>Absorbance at 280 nm × Molecular weight ÷ (Extinction coefficient × Path length)</code></li></ul><p>Any one of Protein concentration and Protein concentration can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Absorbance at 280 nm from 0.85 to 1.7, leaving every other box alone. The panel moves from &lt;strong&gt;Protein concentration&lt;/strong&gt; 1.07 mg/mL and &lt;strong&gt;Protein concentration&lt;/strong&gt; 19.4 µM to &lt;strong&gt;Protein concentration&lt;/strong&gt; 2.13 mg/mL and &lt;strong&gt;Protein concentration&lt;/strong&gt; 38.79 µM.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Protein concentration and Protein concentration are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Absorbance at 280 nm to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Absorbance at 280 nm, Extinction coefficient and Molecular weight and the number you are missing is Protein concentration and Protein concentration.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/farm-pond-fish-stocking">Farm Pond Fish Stocking Calculator</a>, <a href="/biology/feed-conversion-ratio">Feed Conversion Ratio Calculator</a> and <a href="/biology/fcr">Feed conversion ratio</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Beer-Lambert A280 Protein Concentration calculator work out?', 'a' => <<<'TXT'
            Protein concentration and Protein concentration, from Absorbance at 280 nm, Molecular weight, Extinction coefficient and Path length. The relationship is Protein concentration = Absorbance at 280 nm × Molecular weight ÷ (Extinction coefficient × Path length).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Absorbance at 280 nm, Extinction coefficient (M⁻¹cm⁻¹), Molecular weight (Da), Path length (cm). Enter a280, ext and mw; Protein concentration is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Protein concentration and Protein concentration blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Protein concentration = 1.07 mg/mL and Protein concentration = 19.4 µM. The figures come from Absorbance at 280 nm as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Protein concentration is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Absorbance at 280 nm blank and the page solves for it, reporting Protein concentration instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Protein concentration at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/farm-pond-fish-stocking', 'name' => 'Farm Pond Fish Stocking Calculator'],
            ['path' => '/biology/feed-conversion-ratio', 'name' => 'Feed Conversion Ratio Calculator'],
            ['path' => '/biology/fcr', 'name' => 'Feed conversion ratio'],
        ],
        'authors' => [],
    ],
];
