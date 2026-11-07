<?php

/**
 * Mass to Molarity Converter
 * /biology/mass-molarity-conversion
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mass to Molarity Converter',
    'meta' => ['title' => 'Mass to Molarity Converter — Formula & Results', 'description' => 'Mass to molarity conversion needs one number: the molecular weight of the substance. It returns amount of substance, mass, concentration and concentration…', 'h1' => 'Mass to Molarity Converter', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'mw',
                            'label' => 'Molecular weight',
                            'type' => 'number',
                            'suffix' => 'g/mol',
                            'help' => 'Also called molar mass or relative molecular mass',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'mass_mg',
                            'label' => 'Mass',
                            'type' => 'number',
                            'suffix' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'volume_ml',
                            'label' => 'Volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'conc_mm',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'conc_mg_ml',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'moles_umol',
                            'label' => 'Amount of substance',
                            'type' => 'number',
                            'suffix' => 'µmol',
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
            'title' => 'Convert',
            'results' => ['moles_umol' => 'mass_mg*1000/mw', 'mass_mg' => 'moles_umol*mw/1000', 'conc_mm' => 'moles_umol/volume_ml', 'conc_mg_ml' => 'mass_mg/volume_ml'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Mass to molarity conversion needs one number: the molecular weight of the substance. It returns amount of substance, mass, concentration and concentration, and the panel shows all of them at once.
        
        It is the calculation behind every stock solution: 1 mg of a 500 g/mol compound in 1 mL is 2 mM, and the same arithmetic converts the other way when a protocol asks for a molar concentration and the balance gives you mass.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Mass to Molarity Converter', 'html' => <<<'TXT'
            <p>µmol = mg × 1000 ÷ MW. mM = µmol ÷ volume (mL). mg/mL = mg ÷ volume (mL)</p>
            <figure class="calc-figure"><img src="/uploads/biology/mass-molarity-conversion.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Mass to Molarity Converter — mM from 1 mg in 1 mL, by molecular weight" title="Mass to Molarity Converter"><figcaption>mM from 1 mg in 1 mL, by molecular weight</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>MW</code></td><td>molecular weight in g/mol</td><td>g/mol</td></tr><tr><td><code>mM</code></td><td>millimole per litre, the same as µmol per mL</td><td>mol/L</td></tr><tr><td><code>µmol</code></td><td>micromole, 10⁻⁶ mol</td><td>mol</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Mass to Molarity Converter?', 'html' => <<<'TXT'
            <ol><li>Enter the molecular weight of the exact salt form you are weighing.</li><li>Enter the mass in milligrams and the volume it is dissolved in.</li><li>Read the concentration in mM and mg/mL, or type a target concentration to solve the mass.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: molecular weight of <strong>500</strong> g/mol, volume of <strong>1</strong> mL.</p>
            <p>Substituting them into the formula gives amount of substance of <strong>2</strong> µmol, mass of <strong>1</strong> mg, concentration of <strong>2</strong> mM, concentration of <strong>1</strong> mg/mL.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1 – 100 mM</td><td><strong>Typical stock</strong></td><td>dissolves easily and pipettes accurately</td></tr><tr><td>100 mM – 1 M</td><td><strong>Concentrated stock</strong></td><td>check solubility before making it up</td></tr><tr><td>under 1 mM</td><td><strong>Working dilution</strong></td><td>easy to lose to adsorption on plastic</td></tr></tbody></table>
            <ul><li><p>A millimolar solution contains one micromole per millilitre, which is why 1 mg of a 500 g/mol compound in 1 mL is 2 mM — no extra factor of 1000 is needed.</p></li><li><p>Molecular weight must include the salt form. A drug as a hydrochloride salt weighs more than its free base, and dosing errors often come from mixing the two.</p></li><li><p>Water of crystallisation counts too: CuSO₄·5H₂O is 249.7 g/mol, not 159.6.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Using the free-base molecular weight for a salt, which over-concentrates the solution by up to 20%.</li><li>Adding solvent to the final volume instead of dissolving and then making up to volume.</li><li>Confusing mM with µmol/mL — they are numerically the same, which is why the two are easily mixed up in a protocol.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I make a 10 mM stock of a 300 g/mol compound?', 'a' => 'Dissolve 3 mg in 1 mL: 3 mg ÷ 300 g/mol = 10 µmol, and 10 µmol/mL is 10 mM.'],
            ['q' => 'Does the salt form matter?', 'a' => 'Yes — always use the molecular weight of the exact form in the bottle, salt and hydration included.'],
            ['q' => 'What is the difference between molarity and molality?', 'a' => 'Molarity is per litre of solution, molality per kilogram of solvent; they differ by a few percent in water.'],
            ['q' => 'What does the Mass to Molarity Converter actually calculate?', 'a' => 'It returns amount of substance, mass, concentration and concentration. Each one is derived by the formula on this page, so you can check any figure by hand.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [],
    ],
];
