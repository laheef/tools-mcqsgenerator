<?php

/**
 * Enzyme Activity Calculator
 * /biology/enzyme-activity-units
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Enzyme Activity Calculator',
    'meta' => ['title' => 'Enzyme Activity Calculator — Formula & Results', 'description' => <<<'TXT'
    Enzyme activity is the rate at which a preparation converts substrate, expressed in units. It returns substrate converted, activity and specific activity, and…
    TXT, 'h1' => 'Enzyme Activity Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'dabs',
                            'label' => 'Absorbance change per minute',
                            'type' => 'number',
                            'suffix' => 'AU/min',
                            'help' => 'Slope of the linear phase',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.05',
                        ],
                        [
                            'name' => 'ext',
                            'label' => 'Molar extinction coefficient',
                            'type' => 'number',
                            'suffix' => 'M⁻¹cm⁻¹',
                            'help' => '10 000–15 000 for NADH at 340 nm is 6220',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6220',
                        ],
                        [
                            'name' => 'path',
                            'label' => 'Path length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Reaction volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'protein',
                            'label' => 'Protein in the assay',
                            'type' => 'number',
                            'suffix' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.1',
                        ],
                        [
                            'name' => 'u_ml',
                            'label' => 'Activity',
                            'type' => 'number',
                            'suffix' => 'U/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'u_mg',
                            'label' => 'Specific activity',
                            'type' => 'number',
                            'suffix' => 'U/mg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rate',
                            'label' => 'Substrate converted',
                            'type' => 'number',
                            'suffix' => 'µmol/min',
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
            'title' => 'Activity',
            'results' => ['rate' => 'dabs/(ext*path)*1000000*volume/1000', 'u_ml' => 'dabs/(ext*path)*1000000*1000', 'u_mg' => 'dabs/(ext*path)*1000000*volume/protein'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enzyme activity is the rate at which a preparation converts substrate, expressed in units. It returns substrate converted, activity and specific activity, and the panel shows all of them at once.
        
        This calculator converts between absorbance change per minute, units per mL and units per mg, using the extinction coefficient of the product and the light path.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Enzyme Activity', 'html' => <<<'TXT'
            <p>Activity (µmol/min) = (ΔA/min ÷ (ε × l)) × volume; 1 U = 1 µmol/min</p>
            <figure class="calc-figure"><img src="/uploads/biology/enzyme-activity-units.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Enzyme Activity Calculator — Take the slope of the linear phase, never the plateau." title="Enzyme Activity Calculator"><figcaption>Take the slope of the linear phase, never the plateau.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>ΔA/min</code></td><td>initial rate from the linear part of the curve</td><td>AU/min</td></tr><tr><td><code>ε</code></td><td>extinction coefficient of the absorbing species</td><td>M⁻¹cm⁻¹</td></tr><tr><td><code>l</code></td><td>path length</td><td>cm</td></tr><tr><td><code>volume</code></td><td>total reaction volume</td><td>mL</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> IUBMB enzyme unit definition; ε₃₄₀ for NADH = 6220 M⁻¹cm⁻¹.</p>
            TXT],
            ['title' => 'How do I use the Enzyme Activity?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: absorbance change per minute of <strong>0.05</strong> AU/min, molar extinction coefficient of <strong>6,220</strong> M⁻¹cm⁻¹, path length of <strong>1</strong> cm, reaction volume of <strong>1</strong> mL, protein in the assay of <strong>0.1</strong> mg.</p>
            <p>Substituting them into the formula gives substrate converted of <strong>0.008</strong> µmol/min, activity of <strong>8,038.59</strong> U/mL, specific activity of <strong>80.39</strong> U/mg.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>linear phase</td><td><strong>Use this</strong></td><td>the first 10–20% of substrate conversion</td></tr><tr><td>plateau</td><td><strong>Do not use</strong></td><td>substrate depletion or product inhibition</td></tr><tr><td>lag</td><td><strong>Do not use</strong></td><td>temperature equilibration</td></tr></tbody></table>
            <ul><li><p>Only the initial linear rate is a measure of activity. Once the curve bends, you are measuring the assay, not the enzyme.</p></li><li><p>NADH and NADPH absorb at 340 nm with ε = 6220 M⁻¹cm⁻¹, which is why so many coupled assays are read at that wavelength.</p></li><li><p>Units must be quoted with temperature, pH and substrate concentration, or they are not comparable.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using the extinction coefficient of NAD⁺ instead of NADH (NAD⁺ barely absorbs at 340 nm).</li><li>Reading a plate without correcting for path length, which is much shorter than 1 cm.</li><li>Fitting the whole curve rather than the linear portion.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is 1 unit of enzyme?', 'a' => 'One micromole of substrate converted per minute under the stated conditions.'],
            ['q' => 'Why does my rate fall off?', 'a' => 'Substrate depletion, product inhibition, or enzyme instability. Measure earlier in the curve.'],
            ['q' => 'What does the Enzyme Activity actually calculate?', 'a' => 'It returns substrate converted, activity and specific activity. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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
