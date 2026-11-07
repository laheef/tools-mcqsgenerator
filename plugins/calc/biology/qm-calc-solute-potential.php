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
    'meta' => ['title' => 'Solute Potential Calculator — Formula & Results', 'description' => 'Solute potential is the osmotic component of water potential: dissolved solutes lower it, pulling water in. It returns solute potential, solute potential…', 'h1' => 'Solute Potential Calculator', 'updated' => '2026-10-29'],
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
        Solute potential is the osmotic component of water potential: dissolved solutes lower it, pulling water in. It returns solute potential, solute potential, concentration and equivalent NaCl concentration, and the panel shows all of them at once.
        
        This calculator applies the van 't Hoff relation to give solute potential from concentration and temperature, and compares it with pure water at zero.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Solute Potential', 'html' => <<<'TXT'
            <p>Ψ_s = −i × C × R × T</p>
            <figure class="calc-figure"><img src="/uploads/biology/solute-potential.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Solute Potential Calculator — Concentration lowering the water potential below zero." title="Solute Potential Calculator"><figcaption>Concentration lowering the water potential below zero.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>i</code></td><td>number of particles the solute dissociates into</td><td>—</td></tr><tr><td><code>C</code></td><td>concentration</td><td>mol/L</td></tr><tr><td><code>R</code></td><td>gas constant, 8.314</td><td>J/mol/K</td></tr><tr><td><code>T</code></td><td>absolute temperature</td><td>K</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Solute Potential?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: solute concentration of <strong>0.2</strong> mol/L, temperature of <strong>25</strong>°C, ionisation factor (i) of <strong>1</strong>.</p>
            <p>Substituting them into the formula gives solute potential of <strong>-4.96e-04</strong> MPa, solute potential of <strong>-0.005</strong> bar, concentration of <strong>200</strong> mmol/L, equivalent nacl concentration of <strong>200</strong> mmol/L.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0 MPa</td><td><strong>Pure water</strong></td><td>the maximum water potential</td></tr><tr><td>−0.1 to −0.5 MPa</td><td><strong>Typical plant cell</strong></td><td>most mesophytes at full turgor</td></tr><tr><td>−1 to −2 MPa</td><td><strong>Stressed or saline</strong></td><td>growth slows and stomata close</td></tr><tr><td>below −2 MPa</td><td><strong>Severe</strong></td><td>halophytes only; most crops die</td></tr></tbody></table>
            <ul><li><p>Solute potential is always negative or zero: solutes can only lower water potential, never raise it.</p></li><li><p>The ionisation factor doubles the effect of sodium chloride, which is why seawater at about 1 mol/L NaCl gives roughly −4.5 MPa.</p></li><li><p>Water potential also has a pressure component, so a turgid cell's total potential can be near zero even though its solute potential is strongly negative.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Forgetting i for a salt, which halves the apparent osmotic effect.</li><li>Using degrees Celsius in the gas constant term.</li><li>Reporting solute potential as positive because only the magnitude was calculated.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/osmolarity-osmotic-pressure">Osmolarity and osmotic pressure</a>. <a href="/biology/water-potential">Water potential</a>. <a href="/biology/plant-available-water">Plant available water</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why is solute potential negative?', 'a' => 'Because pure water at atmospheric pressure is defined as zero, and solutes always reduce the free energy of water.'],
            ['q' => 'What is the solute potential of 0.1 M sucrose at 20 °C?', 'a' => 'About −0.24 MPa.'],
            ['q' => 'What does the Solute Potential actually calculate?', 'a' => <<<'TXT'
            It returns solute potential, solute potential, concentration and equivalent NaCl concentration. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
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
