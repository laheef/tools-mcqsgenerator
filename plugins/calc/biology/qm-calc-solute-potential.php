<?php

/**
 * Solute Potential Calculator
 * /biology/solute-potential
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Solute Potential Calculator',
    'meta' => ['title' => 'Solute Potential Calculator — Formula & Results', 'description' => 'Solute Potential takes Solute concentration, Temperature and Ionisation factor (i) and returns Solute potential and Solute potential. The answer typed back in.', 'h1' => 'Solute Potential Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Solute concentration',
                            'type' => 'number',
                            'suffix' => 'mol/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.2',
                        ],
                        [
                            'name' => 'temp',
                            'label' => 'Temperature',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'i',
                            'label' => 'Ionisation factor (i)',
                            'type' => 'number',
                            'help' => '2 for NaCl, 1 for sucrose',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'psi',
                            'label' => 'Solute potential',
                            'type' => 'number',
                            'suffix' => 'MPa',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bar',
                            'label' => 'Solute potential',
                            'type' => 'number',
                            'suffix' => 'bar',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'molarity_mmol',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'mmol/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'equiv_nacl',
                            'label' => 'Equivalent NaCl concentration',
                            'type' => 'number',
                            'suffix' => 'mmol/L',
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
            'title' => 'Potential',
            'results' => ['psi' => '0-i*conc*8.314*(temp+273.15)/1000000', 'bar' => '0-i*conc*8.314*(temp+273.15)/100000', 'molarity_mmol' => 'conc*1000', 'equiv_nacl' => 'conc/i*1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Solute Potential takes Solute concentration, Temperature and Ionisation factor (i) and returns Solute potential and Solute potential. It is a single relationship that reads Solute potential out of Solute concentration, not a table of canned results keyed by them. Units for Solute potential default to MPa and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Solute Potential calculator works', 'html' => <<<'TXT'
            <p>The Solute Potential calculator applies one relationship to 3 numbers and reports Solute potential, Solute potential and Concentration.</p><p>In the form&#039;s own words, Solute potential = 0 − Ionisation factor (i) × Solute concentration × 8.314 × (Temperature + 273.15) ÷ 1000000.</p><p>The answers are Solute potential, Solute potential, Concentration and Equivalent NaCl concentration; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Solute concentration</strong> — in mol/L</li><li><strong>Temperature</strong> — in °C</li><li><strong>Ionisation factor (i)</strong> — a plain number, no unit. 2 for NaCl, 1 for sucrose</li></ul><p>What you get back is Solute potential in MPa, Solute potential in bar, Concentration in mmol/L, Equivalent NaCl concentration in mmol/L, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Solute concentration = 0.2 mol/L, Temperature = 25 °C and Ionisation factor (i) = 1 — through the same formula and the panel reports &lt;strong&gt;Solute potential&lt;/strong&gt; = -4.958e-4 MPa, &lt;strong&gt;Solute potential&lt;/strong&gt; = -0.005 bar, &lt;strong&gt;Concentration&lt;/strong&gt; = 200 mmol/L and &lt;strong&gt;Equivalent NaCl concentration&lt;/strong&gt; = 200 mmol/L.</p><ul><li><strong>Solute potential</strong> = -4.958e-4 MPa</li><li><strong>Solute potential</strong> = -0.005 bar</li><li><strong>Concentration</strong> = 200 mmol/L</li><li><strong>Equivalent NaCl concentration</strong> = 200 mmol/L</li></ul><p>That is <strong>Solute potential</strong> = <code>0 − Ionisation factor (i) × Solute concentration × 8.314 × (Temperature + 273.15) ÷ 1000000</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Solute potential&lt;/strong&gt; = -4.958e-4, &lt;strong&gt;Solute potential&lt;/strong&gt; = -0.005, &lt;strong&gt;Concentration&lt;/strong&gt; = 200 and &lt;strong&gt;Equivalent NaCl concentration&lt;/strong&gt; = 200 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Solute potential takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Solute potential</strong> = <code>0 − Ionisation factor (i) × Solute concentration × 8.314 × (Temperature + 273.15) ÷ 1000000</code></li><li><strong>Concentration</strong> = <code>Solute concentration × 1000</code></li><li><strong>Equivalent NaCl concentration</strong> = <code>Solute concentration ÷ Ionisation factor (i) × 1000</code></li></ul><p>Any one of Solute potential, Solute potential and Concentration can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Solute concentration from 0.2 to 0.4, leaving every other box alone. The panel moves from &lt;strong&gt;Solute potential&lt;/strong&gt; -4.958e-4 MPa, &lt;strong&gt;Solute potential&lt;/strong&gt; -0.005 bar, &lt;strong&gt;Concentration&lt;/strong&gt; 200 mmol/L and &lt;strong&gt;Equivalent NaCl concentration&lt;/strong&gt; 200 mmol/L to &lt;strong&gt;Solute potential&lt;/strong&gt; -9.915e-4 MPa, &lt;strong&gt;Solute potential&lt;/strong&gt; -0.0099 bar, &lt;strong&gt;Concentration&lt;/strong&gt; 400 mmol/L and &lt;strong&gt;Equivalent NaCl concentration&lt;/strong&gt; 400 mmol/L.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Solute potential, Solute potential and Concentration are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Solute concentration is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Solute concentration, Temperature and Ionisation factor (i) is what you already know and Solute potential and Solute potential is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/atp-cellular-respiration-energy-yield">ATP / Cellular Respiration Energy Yield Calculator</a>, <a href="/biology/autosomal-dominant-pedigree">Autosomal Dominant Pedigree Analyzer Calculator</a> and <a href="/biology/autosomal-recessive-risk">Autosomal Recessive Inheritance Risk Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Solute Potential calculator work out?', 'a' => <<<'TXT'
            Solute potential, Solute potential, Concentration and Equivalent NaCl concentration, from Ionisation factor (i), Solute concentration and Temperature. The relationship is Solute potential = 0 − Ionisation factor (i) × Solute concentration × 8.314 × (Temperature + 273.15) ÷ 1000000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Solute concentration (mol/L), Temperature (°C), Ionisation factor (i). Enter conc, temp and i; Solute potential is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Solute potential, Solute potential, Concentration and Equivalent NaCl concentration blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Solute potential = -4.958e-4 MPa, Solute potential = -0.005 bar, Concentration = 200 mmol/L and Equivalent NaCl concentration = 200 mmol/L. Those are the defaults written into the form — move Solute concentration and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Solute potential is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Solute concentration blank and the page solves for it, reporting Solute potential instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Solute potential keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/atp-cellular-respiration-energy-yield', 'name' => 'ATP / Cellular Respiration Energy Yield Calculator'],
            ['path' => '/biology/autosomal-dominant-pedigree', 'name' => 'Autosomal Dominant Pedigree Analyzer Calculator'],
            ['path' => '/biology/autosomal-recessive-risk', 'name' => 'Autosomal Recessive Inheritance Risk Calculator'],
        ],
        'authors' => [],
    ],
];
