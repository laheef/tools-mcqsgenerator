<?php

/**
 * Protein Hydrodynamic Radius Calculator
 * /biology/protein-hydrodynamic-radius
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Protein Hydrodynamic Radius Calculator',
    'meta' => ['title' => 'Protein Hydrodynamic Radius Calculator — Biology', 'description' => 'The hydrodynamic radius is the effective size a protein presents to the solvent — what size-exclusion chromatography and dynamic light scattering actually…', 'h1' => 'Protein Hydrodynamic Radius Calculator', 'updated' => '2026-10-29'],
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
                            'suffix' => 'Da',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '55000',
                        ],
                        [
                            'name' => 'shape',
                            'label' => 'Fold',
                            'type' => 'select',
                            'options' => ['Globular' => '1', 'Disordered / coil' => '2'],
                            'default' => 'Globular',
                        ],
                        [
                            'name' => 'viscosity',
                            'label' => 'Solvent viscosity',
                            'type' => 'number',
                            'suffix' => 'cP',
                            'help' => 'Water at 25 °C = 0.89 cP',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.89',
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
                            'name' => 'rh',
                            'label' => 'Hydrodynamic radius',
                            'type' => 'number',
                            'suffix' => 'nm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'd',
                            'label' => 'Diffusion coefficient',
                            'type' => 'number',
                            'suffix' => 'µm²/s',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 've',
                            'label' => 'Relative elution volume (SEC)',
                            'type' => 'number',
                            'suffix' => 'Ve/V0',
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
            'title' => 'Size',
            'results' => ['rh' => 'if_else(shape==1, 0.066*pow(mw,0.333), 0.192*pow(mw,0.5))', 'd' => '0.0000000000000000000000138*(temp+273.15)/(6*3.14159265358979*viscosity*0.001*(0.066*pow(mw,0.333)*0.000000001))*1000000000000', 've' => '1+0.35*pow(0.066*pow(mw,0.333)/2.5,3)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The hydrodynamic radius is the effective size a protein presents to the solvent — what size-exclusion chromatography and dynamic light scattering actually measure. It returns hydrodynamic radius, diffusion coefficient and relative elution volume (SEC), and the panel shows all of them at once.
        
        This calculator estimates it from molecular weight, and converts between radius, diffusion coefficient and elution behaviour for globular and disordered proteins.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Protein Hydrodynamic Radius', 'html' => <<<'TXT'
            <p>Globular: Rh ≈ 0.066 × MW^⅓ nm; D = kT ÷ (6πηR)</p>
            <figure class="calc-figure"><img src="/uploads/biology/protein-hydrodynamic-radius.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Protein Hydrodynamic Radius Calculator — Mass and fold give a radius, and the radius gives the diffusion coefficient." title="Protein Hydrodynamic Radius Calculator"><figcaption>Mass and fold give a radius, and the radius gives the diffusion coefficient.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>MW</code></td><td>molecular weight</td><td>Da</td></tr><tr><td><code>Rh</code></td><td>hydrodynamic radius</td><td>nm</td></tr><tr><td><code>η</code></td><td>solvent viscosity</td><td>Pa·s</td></tr><tr><td><code>D</code></td><td>translational diffusion coefficient</td><td>µm²/s</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Protein Hydrodynamic Radius?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: molecular weight of <strong>55,000</strong> Da, fold set to <strong>1.0</strong>, solvent viscosity of <strong>0.89</strong> cP, temperature of <strong>25</strong>°C.</p>
            <p>Substituting them into the formula gives hydrodynamic radius of <strong>2.5</strong> nm, diffusion coefficient of <strong>98.07</strong> µm²/s, relative elution volume (sec) of <strong>1.35</strong> Ve/V0.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1 – 3 nm</td><td><strong>Small globular</strong></td><td>lysozyme, cytochrome c</td></tr><tr><td>3 – 6 nm</td><td><strong>Typical globular</strong></td><td>BSA, IgG fragments</td></tr><tr><td>above 8 nm</td><td><strong>Large or disordered</strong></td><td>multimers, complexes, IDPs</td></tr></tbody></table>
            <ul><li><p>A disordered protein of the same molecular weight is two to three times larger than a globular one; the difference is what makes SEC a shape measurement, not just a mass one.</p></li><li><p>The Stokes–Einstein relation assumes a sphere, which is why a radius derived this way is 'hydrodynamic' rather than geometric.</p></li><li><p>Glycosylation adds mass without adding much radius per dalton, so heavily modified proteins sit below the globular line.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Using viscosity in poise where Pa·s is needed (a factor of 10).</li><li>Treating the estimate as a measurement: DLS gives the real number.</li><li>Comparing Rh across temperatures without correcting the viscosity of water.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a normal hydrodynamic radius for a 50 kDa protein?', 'a' => 'About 3 nm if globular, 6–8 nm if partly disordered.'],
            ['q' => 'Why does my SEC elution suggest a much larger protein?', 'a' => 'Because SEC separates by size, and an elongated or disordered protein behaves like a larger sphere.'],
            ['q' => 'What does the Protein Hydrodynamic Radius actually calculate?', 'a' => <<<'TXT'
            It returns hydrodynamic radius, diffusion coefficient and relative elution volume (SEC). Each one is derived by the formula on this page, so you can check any figure by hand.
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
