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
    'meta' => ['title' => 'Osmolarity / Osmotic Pressure Calculator — Biology', 'description' => 'Osmolarity counts the particles a solute produces in solution, which is why 150 mM NaCl is 300 mOsm. It returns osmolarity, osmotic pressure and osmotic…', 'h1' => 'Osmolarity / Osmotic Pressure Calculator', 'updated' => '2026-10-29'],
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
        Osmolarity counts the particles a solute produces in solution, which is why 150 mM NaCl is 300 mOsm. It returns osmolarity, osmotic pressure and osmotic pressure, and the panel shows all of them at once.
        
        This calculator converts concentration, osmolality and osmotic pressure, and it handles the dissociation factor that makes salt and sugars behave differently.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Osmolarity / Osmotic Pressure', 'html' => <<<'TXT'
            <p>Osmolarity = M × i; π = iMRT</p>
            <figure class="calc-figure"><img src="/uploads/biology/osmolarity-osmotic-pressure.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Osmolarity / Osmotic Pressure Calculator — Concentration × particles, then the gas law, gives osmotic pressure." title="Osmolarity / Osmotic Pressure Calculator"><figcaption>Concentration × particles, then the gas law, gives osmotic pressure.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>M</code></td><td>molar concentration</td><td>mol/L</td></tr><tr><td><code>i</code></td><td>van 't Hoff factor, particles per formula unit</td><td>—</td></tr><tr><td><code>R</code></td><td>gas constant</td><td>8.314 J/mol·K</td></tr><tr><td><code>π</code></td><td>osmotic pressure</td><td>kPa</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> van 't Hoff relation; physiological ranges from standard clinical chemistry references.</p>
            TXT],
            ['title' => 'How do I use the Osmolarity / Osmotic Pressure?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: molar concentration of <strong>150</strong> mM, dissociation factor (i) of <strong>2</strong>, temperature of <strong>37</strong>°C.</p>
            <p>Substituting them into the formula gives osmolarity of <strong>300</strong> mOsm/L, osmotic pressure of <strong>773.58</strong> kPa, osmotic pressure of <strong>7.63</strong> atm.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>275 – 295 mOsm/L</td><td><strong>Isotonic</strong></td><td>plasma-like; safe for cells</td></tr><tr><td>below 275</td><td><strong>Hypotonic</strong></td><td>cells swell and can lyse</td></tr><tr><td>above 295</td><td><strong>Hypertonic</strong></td><td>cells shrink; used for cryopreservation</td></tr></tbody></table>
            <ul><li><p>Osmolarity is per litre of solution; osmolality is per kilogram of water. In dilute solutions they are the same; in plasma they differ by about 1%.</p></li><li><p>Osmotic pressure is a colligative property: it depends on particle count, not identity. That is why 150 mM NaCl and 300 mM glucose are both about 300 mOsm.</p></li><li><p>Cell culture media are formulated to 260–320 mOsm/L, and adding a drug stock can push a medium out of range if the stock is concentrated in salt.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Forgetting the dissociation factor for salts.</li><li>Entering concentration in mmol/L and reading the result as molar.</li><li>Using 8.314 with pressure in atm.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is the osmolarity of normal saline?', 'a' => '154 mM NaCl × 2 = 308 mOsm/L, close to plasma at about 290.'],
            ['q' => 'Why is osmolality used in clinical work?', 'a' => 'Because it is measured per kilogram of water, which does not change with temperature or with the volume the solute displaces.'],
            ['q' => 'What does the Osmolarity / Osmotic Pressure actually calculate?', 'a' => 'It returns osmolarity, osmotic pressure and osmotic pressure. Each one is derived by the formula on this page, so you can check any figure by hand.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
        ],
        'related' => [],
    ],
];
