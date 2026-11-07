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
    'meta' => ['title' => 'Osmolarity / Osmotic Pressure Calculator — Biology', 'description' => 'Osmolarity / Osmotic Pressure Calculator takes molar concentration, dissociation factor (i) and temperature and returns osmolarity and osmotic pressure.', 'h1' => 'Osmolarity / Osmotic Pressure Calculator', 'updated' => '2026-10-29'],
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
        Enter Molar concentration, Dissociation factor (i) and Temperature into Osmolarity / Osmotic Pressure and the answer comes back as Osmolarity and Osmotic pressure. Nothing is looked up on this page: osmolarity is computed from molar concentration and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Osmolarity is opened in mOsm/L; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Osmolarity / Osmotic Pressure calculator works', 'html' => <<<'TXT'
            <p>The Osmolarity / Osmotic Pressure calculator applies one relationship to 3 numbers and reports Osmolarity, Osmotic pressure and Osmotic pressure.</p><p>Written with the labels from the form, Osmolarity = Molar concentration × Dissociation factor (i).</p><p>The answers are Osmolarity, Osmotic pressure and Osmotic pressure; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Molar concentration</strong> — in mM. Total solute molarity</li><li><strong>Dissociation factor (i)</strong> — a plain number, no unit. 2 for NaCl, 1 for glucose, 1.8 for a weak electrolyte</li><li><strong>Temperature</strong> — in °C</li></ul><p>The result boxes are Osmolarity in mOsm/L, Osmotic pressure in kPa, Osmotic pressure in atm; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Molar concentration = 150 mM, Dissociation factor (i) = 2 and Temperature = 37 °C; the answers are <strong>Osmolarity</strong> = 300 mOsm/L, <strong>Osmotic pressure</strong> = 774 kPa and <strong>Osmotic pressure</strong> = 7.63 atm.</p><ul><li><strong>Osmolarity</strong> = 300 mOsm/L</li><li><strong>Osmotic pressure</strong> = 774 kPa</li><li><strong>Osmotic pressure</strong> = 7.63 atm</li></ul><p>That is <strong>Osmolarity</strong> = <code>Molar concentration × Dissociation factor (i)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Osmolarity</strong> = 300, <strong>Osmotic pressure</strong> = 774 and <strong>Osmotic pressure</strong> = 7.63. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Osmolarity is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Osmolarity</strong> = <code>Molar concentration × Dissociation factor (i)</code></li><li><strong>Osmotic pressure</strong> = <code>Molar concentration × Dissociation factor (i) × 8.314 × (Temperature + 273.15) ÷ 1000</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Osmolarity</strong> = <code>Molar concentration × Dissociation factor (i)</code> — the form to use when Molar concentration and Dissociation factor (i) are the values you have.</li><li><strong>Osmotic pressure</strong> = <code>Molar concentration × Dissociation factor (i) × 8.314 × (Temperature + 273.15) ÷ 1000</code> — the form to use when Molar concentration, Dissociation factor (i) and Temperature are the values you have.</li><li><strong>Osmotic pressure</strong> = <code>Molar concentration × Dissociation factor (i) × 0.082057 × (Temperature + 273.15) ÷ 1000</code> — the form to use when Molar concentration, Dissociation factor (i) and Temperature are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Osmolarity, Osmotic pressure and Osmotic pressure can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Molar concentration, from 150 to 300 — and the answers go from <strong>Osmolarity</strong> 300 mOsm/L, <strong>Osmotic pressure</strong> 774 kPa and <strong>Osmotic pressure</strong> 7.63 atm to <strong>Osmolarity</strong> 600 mOsm/L, <strong>Osmotic pressure</strong> 1547 kPa and <strong>Osmotic pressure</strong> 15.27 atm.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Osmolarity, Osmotic pressure and Osmotic pressure are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Molar concentration left as a guess.</strong> Anything typed into Molar concentration is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Dissociation factor (i) left as a guess.</strong> Anything typed into Dissociation factor (i) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Temperature left as a guess.</strong> Anything typed into Temperature is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Molar concentration is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Molar concentration</strong> is measured in mM. Total solute molarity. Change it and Osmolarity, Osmotic pressure and Osmotic pressure changes with it. Have it to hand before you start: Molar concentration is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Dissociation factor (i)</strong> takes a plain number with no unit attached. 2 for NaCl, 1 for glucose, 1.8 for a weak electrolyte. Change it and Osmolarity, Osmotic pressure and Osmotic pressure changes with it. Have it to hand before you start: Dissociation factor (i) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Temperature</strong> is measured in °C. Change it and Osmotic pressure and Osmotic pressure changes with it. Have it to hand before you start: Temperature is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Osmolarity</strong> is a plain number and the page's own defaults put it at 300. It is computed from Molar concentration and Dissociation factor (i), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Osmotic pressure</strong> is a plain number and the page's own defaults put it at 774. It is computed from Molar concentration, Dissociation factor (i) and Temperature, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Osmotic pressure</strong> is a plain number and the page's own defaults put it at 7.63. It is computed from Molar concentration, Dissociation factor (i) and Temperature, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Osmolarity</th><th>Osmotic pressure</th><th>Osmotic pressure</th></tr></thead><tbody><tr><td><strong>Molar concentration</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Dissociation factor (i)</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Temperature</strong> +10%</td><td>+0%</td><td>+1.19%</td><td>+1.19%</td></tr></tbody></table><p>The steepest column belongs to Molar concentration: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Molar concentration = 75 mM, Dissociation factor (i) = 1 and Temperature = 18.5 °C, the answer is <strong>Osmolarity</strong> = 75 mOsm/L, <strong>Osmotic pressure</strong> = 182 kPa and <strong>Osmotic pressure</strong> = 1.79 atm.</li><li>With Molar concentration = 450 mM, Dissociation factor (i) = 2 and Temperature = 37 °C, the answer is <strong>Osmolarity</strong> = 900 mOsm/L, <strong>Osmotic pressure</strong> = 2321 kPa and <strong>Osmotic pressure</strong> = 22.9 atm.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Osmolarity is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Molar concentration, Dissociation factor (i) and Temperature are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Molar concentration, Dissociation factor (i) and Temperature and the number you are missing is Osmolarity and Osmotic pressure.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/dog-pregnancy">Dog pregnancy Calculator</a>, <a href="/biology/dog-quality-of-life">Dog quality of life</a> and <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Osmolarity / Osmotic Pressure is a number to act on, so the useful question is what to do with Osmolarity (mOsm/L), Osmotic pressure (kPa) and Osmotic pressure (atm) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Molar concentration, Dissociation factor (i) and Temperature alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Osmolarity / Osmotic Pressure calculator work out?', 'a' => <<<'TXT'
            Osmolarity, Osmotic pressure and Osmotic pressure, from Molar concentration and Dissociation factor (i). The relationship is Osmolarity = Molar concentration × Dissociation factor (i).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Molar concentration (mM), Dissociation factor (i), Temperature (°C). Fill molar concentration, dissociation factor (i) and temperature and leave Osmolarity empty if you would rather have that one solved instead.
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
