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
    'meta' => ['title' => 'Protein Hydrodynamic Radius Calculator: Steps & Units', 'description' => 'Protein Hydrodynamic Radius Calculator turns molecular weight, fold and solvent viscosity into diffusion coefficient and Relative elution volume (SEC).', 'h1' => 'Protein Hydrodynamic Radius Calculator', 'updated' => '2026-10-29'],
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
        Protein Hydrodynamic Radius works out Hydrodynamic radius and Diffusion coefficient from Molecular weight, Fold and Solvent viscosity. The arithmetic is the whole method: hydrodynamic radius is worked out from molecular weight by one formula, applied once. Hydrodynamic radius comes back in nm unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Protein Hydrodynamic Radius calculator works', 'html' => <<<'TXT'
            <p>The Protein Hydrodynamic Radius calculator applies one relationship to 4 numbers and reports Hydrodynamic radius, Diffusion coefficient and Relative elution volume (SEC).</p><p>In the form&#039;s own words, Hydrodynamic radius = if_else(Fold==1, 0.066 × (Molecular weight)^(0.333), 0.192 × (Molecular weight)^(0.5)).</p><p>The result panel carries Hydrodynamic radius, Diffusion coefficient and Relative elution volume (SEC), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Molecular weight</strong> — in Da</li><li><strong>Fold</strong> — a plain number, no unit</li><li><strong>Solvent viscosity</strong> — in cP. Water at 25 °C = 0.89 cP</li><li><strong>Temperature</strong> — in °C</li></ul><p>The answers come back as Hydrodynamic radius in nm, Diffusion coefficient in µm²/s, Relative elution volume (SEC) in Ve/V0. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Molecular weight = 55000 Da, Fold = 1, Solvent viscosity = 0.89 cP and Temperature = 25 °C; the answers are <strong>Hydrodynamic radius</strong> = 2.5 nm, <strong>Diffusion coefficient</strong> = 98.07 µm²/s and <strong>Relative elution volume (SEC)</strong> = 1.35 Ve/V0.</p><ul><li><strong>Hydrodynamic radius</strong> = 2.5 nm</li><li><strong>Diffusion coefficient</strong> = 98.07 µm²/s</li><li><strong>Relative elution volume (SEC)</strong> = 1.35 Ve/V0</li></ul><p>That is <strong>Hydrodynamic radius</strong> = <code>if_else(Fold==1, 0.066 × (Molecular weight)^(0.333), 0.192 × (Molecular weight)^(0.5))</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Hydrodynamic radius</strong> = 2.5, <strong>Diffusion coefficient</strong> = 98.07 and <strong>Relative elution volume (SEC)</strong> = 1.35. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Hydrodynamic radius is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Hydrodynamic radius</strong> = <code>if_else(Fold==1, 0.066 × (Molecular weight)^(0.333), 0.192 × (Molecular weight)^(0.5))</code></li><li><strong>Diffusion coefficient</strong> = <code>0.0000000000000000000000138 × (Temperature + 273.15) ÷ (6 × 3.14159265358979 × Solvent viscosity × 0.001 × (0.066 × (Molecular weight)^(0.333) × 0.000000001)) × 1000000000000</code></li><li><strong>Relative elution volume (SEC)</strong> = <code>1 + 0.35 × (0.066 × (Molecular weight)^(0.333) ÷ 2.5)^(3)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Hydrodynamic radius</strong> = <code>if_else(Fold==1, 0.066 × (Molecular weight)^(0.333), 0.192 × (Molecular weight)^(0.5))</code> — the form to use when Fold and Molecular weight are the values you have.</li><li><strong>Diffusion coefficient</strong> = <code>0.0000000000000000000000138 × (Temperature + 273.15) ÷ (6 × 3.14159265358979 × Solvent viscosity × 0.001 × (0.066 × (Molecular weight)^(0.333) × 0.000000001)) × 1000000000000</code> — the form to use when Temperature, Solvent viscosity and Molecular weight are the values you have.</li><li><strong>Relative elution volume (SEC)</strong> = <code>1 + 0.35 × (0.066 × (Molecular weight)^(0.333) ÷ 2.5)^(3)</code> — the form to use when Molecular weight are the values you have.</li></ul><p>Any one of Hydrodynamic radius, Diffusion coefficient and Relative elution volume (SEC) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Molecular weight, from 55000 to 110000 — and the answers go from <strong>Hydrodynamic radius</strong> 2.5 nm, <strong>Diffusion coefficient</strong> 98.07 µm²/s and <strong>Relative elution volume (SEC)</strong> 1.35 Ve/V0 to <strong>Hydrodynamic radius</strong> 3.15 nm, <strong>Diffusion coefficient</strong> 77.86 µm²/s and <strong>Relative elution volume (SEC)</strong> 1.7 Ve/V0.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Hydrodynamic radius, Diffusion coefficient and Relative elution volume (SEC) are results: they are worked out from the boxes above and cannot be typed into, so a past answer has to be entered as one of the inputs instead.</li><li><strong>Molecular weight left as a guess.</strong> Anything typed into Molecular weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Fold left as a guess.</strong> Anything typed into Fold is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Solvent viscosity left as a guess.</strong> Anything typed into Solvent viscosity is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Molecular weight to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Molecular weight</strong> is measured in Da. It feeds Hydrodynamic radius, Diffusion coefficient and Relative elution volume (SEC). Have it to hand before you start: Molecular weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Fold</strong> takes a plain number with no unit attached. It feeds Hydrodynamic radius. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Fold is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Solvent viscosity</strong> is measured in cP. Water at 25 °C = 0.89 cP. It feeds Diffusion coefficient. Have it to hand before you start: Solvent viscosity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Temperature</strong> is measured in °C. It feeds Diffusion coefficient. Have it to hand before you start: Temperature is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Hydrodynamic radius</strong> is a plain number and the page's own defaults put it at 2.5. The value follows from Fold and Molecular weight. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Diffusion coefficient</strong> is a plain number and the page's own defaults put it at 98.07. The value follows from Temperature, Solvent viscosity and Molecular weight. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Relative elution volume (SEC)</strong> is a plain number and the page's own defaults put it at 1.35. The value follows from Molecular weight. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Hydrodynamic radius</th><th>Diffusion coefficient</th><th>Relative elution volume (SEC)</th></tr></thead><tbody><tr><td><strong>Molecular weight</strong> +10%</td><td>+3.22%</td><td>-3.12%</td><td>+2.59%</td></tr><tr><td><strong>Fold</strong> +10%</td><td>+1701%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Solvent viscosity</strong> +10%</td><td>+0%</td><td>-9.09%</td><td>+0%</td></tr><tr><td><strong>Temperature</strong> +10%</td><td>+0%</td><td>+0.84%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Fold: ten per cent there moves an answer by about 1701 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Molecular weight = 27500 Da, Fold = 0.5, Solvent viscosity = 0.445 cP and Temperature = 12.5 °C, the answer is <strong>Hydrodynamic radius</strong> = 31.84 nm, <strong>Diffusion coefficient</strong> = 237 µm²/s and <strong>Relative elution volume (SEC)</strong> = 1.18 Ve/V0.</li><li>With Molecular weight = 165000 Da, Fold = 1, Solvent viscosity = 0.89 cP and Temperature = 25 °C, the answer is <strong>Hydrodynamic radius</strong> = 3.61 nm, <strong>Diffusion coefficient</strong> = 68.02 µm²/s and <strong>Relative elution volume (SEC)</strong> = 2.05 Ve/V0.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Hydrodynamic radius is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Molecular weight, Fold and Solvent viscosity is what you already know and Hydrodynamic radius and Diffusion coefficient is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/tree-leaves">Leaves on tree Calculator</a>, <a href="/biology/ligation-calculator">Ligation Calculator</a> and <a href="/biology/ligation-molar-ratio">Ligation Molar Ratio (Insert : Vector) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Protein Hydrodynamic Radius calculator work out?', 'a' => <<<'TXT'
            Hydrodynamic radius, Diffusion coefficient and Relative elution volume (SEC), from Fold and Molecular weight. The relationship is Hydrodynamic radius = if_else(Fold==1, 0.066 × (Molecular weight)^(0.333), 0.192 × (Molecular weight)^(0.5)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Molecular weight (Da), Fold, Solvent viscosity (cP), Temperature (°C). Enter molecular weight, fold and solvent viscosity; Hydrodynamic radius is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Hydrodynamic radius, Diffusion coefficient and Relative elution volume (SEC) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Hydrodynamic radius = 2.5 nm, Diffusion coefficient = 98.07 µm²/s and Relative elution volume (SEC) = 1.35 Ve/V0. That comes from the page's own defaults, entered in Molecular weight; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Hydrodynamic radius is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
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
