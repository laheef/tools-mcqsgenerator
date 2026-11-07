<?php

/**
 * Lineweaver-Burk Plot / Km & Vmax Calculator
 * /biology/lineweaver-burk-plot
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lineweaver-Burk Plot / Km & Vmax Calculator',
    'meta' => ['title' => 'Lineweaver-Burk Plot / Km & Vmax Calculator', 'description' => 'The Lineweaver–Burk plot linearises Michaelis–Menten kinetics: 1/v against 1/[S] gives a straight line whose intercepts are 1/Vmax and −1/Km.', 'h1' => 'Lineweaver-Burk Plot / Km & Vmax Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 's1',
                            'label' => 'Substrate concentration 1',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                        [
                            'name' => 'v1',
                            'label' => 'Initial velocity 1',
                            'type' => 'number',
                            'suffix' => 'µmol/min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.35',
                        ],
                        [
                            'name' => 's2',
                            'label' => 'Substrate concentration 2',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'v2',
                            'label' => 'Initial velocity 2',
                            'type' => 'number',
                            'suffix' => 'µmol/min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.62',
                        ],
                        [
                            'name' => 'vmax',
                            'label' => 'Vmax',
                            'type' => 'number',
                            'suffix' => 'µmol/min',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'km',
                            'label' => 'Km',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'kcat_km',
                            'label' => 'Vmax/Km',
                            'type' => 'number',
                            'suffix' => 'µmol/min/mM',
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
            'title' => 'Kinetics',
            'results' => ['vmax' => '1/((1/v1)-(((1/v2)-(1/v1))/((1/s2)-(1/s1)))*(1/s1))', 'km' => '(((1/v2)-(1/v1))/((1/s2)-(1/s1)))/((1/v1)-(((1/v2)-(1/v1))/((1/s2)-(1/s1)))*(1/s1))', 'kcat_km' => '1/((1/v1)-(((1/v2)-(1/v1))/((1/s2)-(1/s1)))*(1/s1))/((((1/v2)-(1/v1))/((1/s2)-(1/s1)))/((1/v1)-(((1/v2)-(1/v1))/((1/s2)-(1/s1)))*(1/s1)))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Lineweaver–Burk plot linearises Michaelis–Menten kinetics: 1/v against 1/[S] gives a straight line whose intercepts are 1/Vmax and −1/Km. It returns vmax, km and vmax/Km, and the panel shows all of them at once.
        
        Enter two substrate/velocity pairs and the calculator returns Vmax, Km and catalytic efficiency.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Lineweaver-Burk Plot / Km & Vmax', 'html' => <<<'TXT'
            <p>1/v = (Km/Vmax)(1/[S]) + 1/Vmax</p>
            <figure class="calc-figure"><img src="/uploads/biology/lineweaver-burk-plot.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Lineweaver-Burk Plot / Km &amp; Vmax Calculator — The double-reciprocal line: x-intercept −1/Km, y-intercept 1/Vmax." title="Lineweaver-Burk Plot / Km &amp; Vmax Calculator"><figcaption>The double-reciprocal line: x-intercept −1/Km, y-intercept 1/Vmax.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>*S*</code></td><td>substrate concentration</td><td>mM</td></tr><tr><td><code>v</code></td><td>initial velocity</td><td>µmol/min</td></tr><tr><td><code>Vmax</code></td><td>velocity at saturating substrate</td><td>µmol/min</td></tr><tr><td><code>Km</code></td><td>substrate concentration at half Vmax</td><td>mM</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> Lineweaver & Burk (1934); the cautions on the double-reciprocal fit follow Dowd & Riggs (1965).</p>
            TXT],
            ['title' => 'How do I use the Lineweaver-Burk Plot / Km & Vmax?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: substrate concentration 1 of <strong>0.5</strong> mM, initial velocity 1 of <strong>0.35</strong> µmol/min, substrate concentration 2 of <strong>2</strong> mM, initial velocity 2 of <strong>0.62</strong> µmol/min.</p>
            <p>Substituting them into the formula gives vmax of <strong>0.8346</strong> µmol/min, km of <strong>0.6923</strong> mM, vmax/km of <strong>1.21</strong> µmol/min/mM.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>With two points, Vmax and Km are exact for a linear fit but very sensitive to a single bad measurement; four to six points from 0.2 to 5 × Km is the practical minimum.</p></li><li><p>The double-reciprocal plot weights the lowest substrate points most heavily, which is its well-known weakness. A non-linear fit to the same data is more reliable.</p></li><li><p>Km is an operational constant: it changes with pH, temperature and the second substrate.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using substrate concentrations in different units on one line.</li><li>Including points where the rate has already plateaued.</li><li>Reading Km off the y-intercept instead of the x-intercept (which is −1/Km).</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does a high Km mean?', 'a' => 'Low affinity: more substrate is needed to reach half of Vmax.'],
            ['q' => 'How many points do I need?', 'a' => 'At least four, spread geometrically from about 0.2 to 5 × Km.'],
            ['q' => 'What does the Lineweaver-Burk Plot / Km & Vmax actually calculate?', 'a' => 'It returns vmax, km and vmax/Km. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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
