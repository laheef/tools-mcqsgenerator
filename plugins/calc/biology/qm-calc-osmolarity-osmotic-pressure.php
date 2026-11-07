<?php

/**
 * Osmolarity / Osmotic Pressure Calculator
 * /biology/osmolarity-osmotic-pressure
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Osmolarity / Osmotic Pressure Calculator',
    'meta' => ['title' => 'Osmolarity / Osmotic Pressure Calculator — Biology', 'description' => 'Enter Molar concentration, Dissociation factor (i) and Temperature into Osmolarity / Osmotic Pressure and the answer comes back as Osmolarity and Osmotic…', 'h1' => 'Osmolarity / Osmotic Pressure Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'conc',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'help' => 'Total solute molarity',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '150',
                        ],
                        [
                            'name' => 'i',
                            'label' => 'Dissociation factor (i)',
                            'type' => 'number',
                            'help' => '2 for NaCl, 1 for glucose, 1.8 for a weak electrolyte',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'temp',
                            'label' => 'Temperature',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '37',
                        ],
                        [
                            'name' => 'osmolarity',
                            'label' => 'Osmolarity',
                            'type' => 'number',
                            'suffix' => 'mOsm/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pressure',
                            'label' => 'Osmotic pressure',
                            'type' => 'number',
                            'suffix' => 'kPa',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'atm',
                            'label' => 'Osmotic pressure',
                            'type' => 'number',
                            'suffix' => 'atm',
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
            'title' => 'Osmotic pressure',
            'results' => ['osmolarity' => 'conc*i', 'pressure' => 'conc*i*8.314*(temp+273.15)/1000', 'atm' => 'conc*i*0.082057*(temp+273.15)/1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Molar concentration, Dissociation factor (i) and Temperature into Osmolarity / Osmotic Pressure and the answer comes back as Osmolarity and Osmotic pressure. Nothing is looked up on this page: Osmolarity is computed from Molar concentration and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Osmolarity is opened in mOsm/L; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Osmolarity / Osmotic Pressure calculator works', 'html' => <<<'TXT'
            <p>The Osmolarity / Osmotic Pressure calculator applies one relationship to 3 numbers and reports Osmolarity, Osmotic pressure and Osmotic pressure.</p><p>Written with the labels from the form, Osmolarity = Molar concentration × Dissociation factor (i).</p><p>The answers are Osmolarity, Osmotic pressure and Osmotic pressure; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Molar concentration</strong> — in mM. Total solute molarity</li><li><strong>Dissociation factor (i)</strong> — a plain number, no unit. 2 for NaCl, 1 for glucose, 1.8 for a weak electrolyte</li><li><strong>Temperature</strong> — in °C</li></ul><p>The result boxes are Osmolarity in mOsm/L, Osmotic pressure in kPa, Osmotic pressure in atm; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Molar concentration = 150 mM, Dissociation factor (i) = 2 and Temperature = 37 °C; the answers are &lt;strong&gt;Osmolarity&lt;/strong&gt; = 300 mOsm/L, &lt;strong&gt;Osmotic pressure&lt;/strong&gt; = 774 kPa and &lt;strong&gt;Osmotic pressure&lt;/strong&gt; = 7.63 atm.</p><ul><li><strong>Osmolarity</strong> = 300 mOsm/L</li><li><strong>Osmotic pressure</strong> = 774 kPa</li><li><strong>Osmotic pressure</strong> = 7.63 atm</li></ul><p>That is <strong>Osmolarity</strong> = <code>Molar concentration × Dissociation factor (i)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Osmolarity&lt;/strong&gt; = 300, &lt;strong&gt;Osmotic pressure&lt;/strong&gt; = 774 and &lt;strong&gt;Osmotic pressure&lt;/strong&gt; = 7.63. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Osmolarity is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Osmolarity</strong> = <code>Molar concentration × Dissociation factor (i)</code></li><li><strong>Osmotic pressure</strong> = <code>Molar concentration × Dissociation factor (i) × 8.314 × (Temperature + 273.15) ÷ 1000</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Osmolarity, Osmotic pressure and Osmotic pressure can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Molar concentration, from 150 to 300 — and the answers go from &lt;strong&gt;Osmolarity&lt;/strong&gt; 300 mOsm/L, &lt;strong&gt;Osmotic pressure&lt;/strong&gt; 774 kPa and &lt;strong&gt;Osmotic pressure&lt;/strong&gt; 7.63 atm to &lt;strong&gt;Osmolarity&lt;/strong&gt; 600 mOsm/L, &lt;strong&gt;Osmotic pressure&lt;/strong&gt; 1547 kPa and &lt;strong&gt;Osmotic pressure&lt;/strong&gt; 15.27 atm.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Osmolarity, Osmotic pressure and Osmotic pressure are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Molar concentration is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Molar concentration, Dissociation factor (i) and Temperature and the number you are missing is Osmolarity and Osmotic pressure.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/dog-pregnancy">Dog pregnancy Calculator</a>, <a href="/biology/dog-quality-of-life">Dog quality of life</a> and <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Osmolarity / Osmotic Pressure calculator work out?', 'a' => <<<'TXT'
            Osmolarity, Osmotic pressure and Osmotic pressure, from Molar concentration and Dissociation factor (i). The relationship is Osmolarity = Molar concentration × Dissociation factor (i).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Molar concentration (mM), Dissociation factor (i), Temperature (°C). Fill conc, i and temp and leave Osmolarity empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Osmolarity, Osmotic pressure and Osmotic pressure can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Osmolarity = 300 mOsm/L, Osmotic pressure = 774 kPa and Osmotic pressure = 7.63 atm. The figures come from Molar concentration as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Osmolarity is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Molar concentration left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Osmolarity at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/dog-pregnancy', 'name' => 'Dog pregnancy Calculator'],
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
        ],
        'authors' => [],
    ],
];
