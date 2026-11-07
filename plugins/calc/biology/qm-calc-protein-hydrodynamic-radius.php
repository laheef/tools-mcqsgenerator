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
    'meta' => ['title' => 'Protein Hydrodynamic Radius Calculator — Biology', 'description' => 'Protein Hydrodynamic Radius works out Hydrodynamic radius and Diffusion coefficient from Molecular weight, Fold and Solvent viscosity. The answer typed back in.', 'h1' => 'Protein Hydrodynamic Radius Calculator', 'updated' => '2026-10-29'],
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
        Protein Hydrodynamic Radius works out Hydrodynamic radius and Diffusion coefficient from Molecular weight, Fold and Solvent viscosity. The arithmetic is the whole method: Hydrodynamic radius is worked out from Molecular weight by one formula, applied once. Hydrodynamic radius comes back in nm unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Protein Hydrodynamic Radius calculator works', 'html' => <<<'TXT'
            <p>The Protein Hydrodynamic Radius calculator applies one relationship to 4 numbers and reports Hydrodynamic radius, Diffusion coefficient and Relative elution volume (SEC).</p><p>In the form&#039;s own words, Hydrodynamic radius = if_else(Fold==1, 0.066 × (Molecular weight)^(0.333), 0.192 × (Molecular weight)^(0.5)).</p><p>The result panel carries Hydrodynamic radius, Diffusion coefficient and Relative elution volume (SEC), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Molecular weight</strong> — in Da</li><li><strong>Fold</strong> — a plain number, no unit</li><li><strong>Solvent viscosity</strong> — in cP. Water at 25 °C = 0.89 cP</li><li><strong>Temperature</strong> — in °C</li></ul><p>The answers come back as Hydrodynamic radius in nm, Diffusion coefficient in µm²/s, Relative elution volume (SEC) in Ve/V0. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Molecular weight = 55000 Da, Fold = 1, Solvent viscosity = 0.89 cP and Temperature = 25 °C; the answers are &lt;strong&gt;Hydrodynamic radius&lt;/strong&gt; = 2.5 nm, &lt;strong&gt;Diffusion coefficient&lt;/strong&gt; = 98.07 µm²/s and &lt;strong&gt;Relative elution volume (SEC)&lt;/strong&gt; = 1.35 Ve/V0.</p><ul><li><strong>Hydrodynamic radius</strong> = 2.5 nm</li><li><strong>Diffusion coefficient</strong> = 98.07 µm²/s</li><li><strong>Relative elution volume (SEC)</strong> = 1.35 Ve/V0</li></ul><p>That is <strong>Hydrodynamic radius</strong> = <code>if_else(Fold==1, 0.066 × (Molecular weight)^(0.333), 0.192 × (Molecular weight)^(0.5))</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Hydrodynamic radius&lt;/strong&gt; = 2.5, &lt;strong&gt;Diffusion coefficient&lt;/strong&gt; = 98.07 and &lt;strong&gt;Relative elution volume (SEC)&lt;/strong&gt; = 1.35. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Hydrodynamic radius is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Hydrodynamic radius</strong> = <code>if_else(Fold==1, 0.066 × (Molecular weight)^(0.333), 0.192 × (Molecular weight)^(0.5))</code></li><li><strong>Diffusion coefficient</strong> = <code>0.0000000000000000000000138 × (Temperature + 273.15) ÷ (6 × 3.14159265358979 × Solvent viscosity × 0.001 × (0.066 × (Molecular weight)^(0.333) × 0.000000001)) × 1000000000000</code></li><li><strong>Relative elution volume (SEC)</strong> = <code>1 + 0.35 × (0.066 × (Molecular weight)^(0.333) ÷ 2.5)^(3)</code></li></ul><p>Any one of Hydrodynamic radius, Diffusion coefficient and Relative elution volume (SEC) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Molecular weight, from 55000 to 110000 — and the answers go from &lt;strong&gt;Hydrodynamic radius&lt;/strong&gt; 2.5 nm, &lt;strong&gt;Diffusion coefficient&lt;/strong&gt; 98.07 µm²/s and &lt;strong&gt;Relative elution volume (SEC)&lt;/strong&gt; 1.35 Ve/V0 to &lt;strong&gt;Hydrodynamic radius&lt;/strong&gt; 3.15 nm, &lt;strong&gt;Diffusion coefficient&lt;/strong&gt; 77.86 µm²/s and &lt;strong&gt;Relative elution volume (SEC)&lt;/strong&gt; 1.7 Ve/V0.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Hydrodynamic radius, Diffusion coefficient and Relative elution volume (SEC) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Molecular weight to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Molecular weight, Fold and Solvent viscosity is what you already know and Hydrodynamic radius and Diffusion coefficient is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/tree-leaves">Leaves on tree Calculator</a>, <a href="/biology/ligation-calculator">Ligation Calculator</a> and <a href="/biology/ligation-molar-ratio">Ligation Molar Ratio (Insert: Vector) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Protein Hydrodynamic Radius calculator work out?', 'a' => <<<'TXT'
            Hydrodynamic radius, Diffusion coefficient and Relative elution volume (SEC), from Fold and Molecular weight. The relationship is Hydrodynamic radius = if_else(Fold==1, 0.066 × (Molecular weight)^(0.333), 0.192 × (Molecular weight)^(0.5)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Molecular weight (Da), Fold, Solvent viscosity (cP), Temperature (°C). Enter mw, shape and viscosity; Hydrodynamic radius is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Hydrodynamic radius, Diffusion coefficient and Relative elution volume (SEC) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Hydrodynamic radius = 2.5 nm, Diffusion coefficient = 98.07 µm²/s and Relative elution volume (SEC) = 1.35 Ve/V0. That comes from the page's own defaults, entered in Molecular weight; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Hydrodynamic radius is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Molecular weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Hydrodynamic radius keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/tree-leaves', 'name' => 'Leaves on tree Calculator'],
            ['path' => '/biology/ligation-calculator', 'name' => 'Ligation Calculator'],
            ['path' => '/biology/ligation-molar-ratio', 'name' => 'Ligation Molar Ratio (Insert : Vector) Calculator'],
        ],
        'authors' => [],
    ],
];
