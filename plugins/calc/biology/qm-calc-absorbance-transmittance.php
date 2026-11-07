<?php

/**
 * Absorbance to Transmittance Converter
 * /biology/absorbance-transmittance
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Absorbance to Transmittance Converter',
    'meta' => ['title' => 'Absorbance to Transmittance Converter Calculator', 'description' => 'Absorbance and transmittance are two ways of writing the same measurement, related by a base-ten logarithm. It returns transmittance, transmittance…', 'h1' => 'Absorbance to Transmittance Converter', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'absorbance',
                            'label' => 'Absorbance',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                        [
                            'name' => 'extinction',
                            'label' => 'Extinction coefficient',
                            'type' => 'number',
                            'suffix' => 'per mg/mL',
                            'help' => 'Use 1 for a plain conversion',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.0',
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
                            'name' => 'transmittance',
                            'label' => 'Transmittance',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'percent',
                            'label' => 'Transmittance',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'concentration',
                            'label' => 'Concentration from Beer–Lambert',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'lost',
                            'label' => 'Fraction of light lost',
                            'type' => 'number',
                            'suffix' => '%',
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
            'title' => 'Optics',
            'results' => ['transmittance' => 'pow(10,-absorbance)', 'percent' => 'pow(10,-absorbance)*100', 'concentration' => 'absorbance/(extinction*path)', 'lost' => '(1-pow(10,-absorbance))*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Absorbance and transmittance are two ways of writing the same measurement, related by a base-ten logarithm. It returns transmittance, transmittance, concentration from Beer–Lambert and fraction of light lost, and the panel shows all of them at once.
        
        This converter goes both ways, adds percent transmission and the concentration the reading implies at a chosen extinction coefficient.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Absorbance to Transmittance Converter', 'html' => <<<'TXT'
            <p>A = −log₁₀(T) = 2 − log₁₀(%T); T = 10^(−A); A = ε·c·l</p>
            <figure class="calc-figure"><img src="/uploads/biology/absorbance-transmittance.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Absorbance to Transmittance Converter — A logarithmic scale from full transmission to darkness." title="Absorbance to Transmittance Converter"><figcaption>A logarithmic scale from full transmission to darkness.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>A</code></td><td>absorbance (optical density)</td><td>—</td></tr><tr><td><code>T</code></td><td>transmittance as a fraction</td><td>—</td></tr><tr><td><code>ε</code></td><td>extinction coefficient</td><td>per mg/mL</td></tr><tr><td><code>l</code></td><td>path length</td><td>cm</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Absorbance to Transmittance Converter?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: absorbance of <strong>0.5</strong>, extinction coefficient of <strong>1</strong> per mg/mL, path length of <strong>1</strong> cm.</p>
            <p>Substituting them into the formula gives transmittance of <strong>0.3162</strong>, transmittance of <strong>31.62</strong>%, concentration from beer–lambert of <strong>0.5</strong> mg/mL, fraction of light lost of <strong>68.38</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0 – 0.1</td><td><strong>Very dilute</strong></td><td>poor signal-to-noise on most instruments</td></tr><tr><td>0.1 – 1.0</td><td><strong>Reliable</strong></td><td>the linear window of a spectrophotometer</td></tr><tr><td>1.0 – 1.5</td><td><strong>High</strong></td><td>stray light starts to bend the curve</td></tr><tr><td>above 2.0</td><td><strong>Unreliable</strong></td><td>dilute the sample and multiply the result</td></tr></tbody></table>
            <ul><li><p>An absorbance of 1.0 means 10% of the light got through; 2.0 means 1%. This is why a doubling of absorbance corresponds to ten times less light, not half.</p></li><li><p>Instruments quote linear range up to about 1.0–1.5 A, above which stray light makes the reading saturate. Always dilute and multiply.</p></li><li><p>Transmittance is sometimes quoted as a percentage in older methods; 50% T is 0.301 A, not 0.5 A.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Treating absorbance as linear in transmittance: doubling A does not halve T.</li><li>Using a cuvette with the wrong path length and forgetting to scale c.</li><li>Forgetting the blank, which shifts every reading by its own absorbance.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is an absorbance of 2 in transmittance?', 'a' => '1% transmittance, or 0.01 as a fraction.'],
            ['q' => 'Why does my reading stop increasing when I add more sample?', 'a' => 'The instrument has reached the top of its linear range and stray light now dominates.'],
            ['q' => 'What does the Absorbance to Transmittance Converter actually calculate?', 'a' => <<<'TXT'
            It returns transmittance, transmittance, concentration from Beer–Lambert and fraction of light lost. Each one is derived by the formula on this page, so you can check any figure by hand.
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
