<?php

/**
 * Centrifuge RCF to RPM Converter
 * /biology/centrifuge-rcf-rpm
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Centrifuge RCF to RPM Converter',
    'meta' => ['title' => 'Centrifuge RCF to RPM Converter — Formula & Results', 'description' => 'RCF and RPM are the same centrifuge force in different units: RPM depends on the rotor, RCF does not. It returns relative centrifugal force, speed for 10 000…', 'h1' => 'Centrifuge RCF to RPM Converter', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'radius',
                            'label' => 'Rotor radius',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Measure to the bottom of the tube, not the top',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8.5',
                        ],
                        [
                            'name' => 'rpm',
                            'label' => 'Speed',
                            'type' => 'number',
                            'suffix' => 'rpm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4000',
                        ],
                        [
                            'name' => 'rcf',
                            'label' => 'Relative centrifugal force',
                            'type' => 'number',
                            'suffix' => '× g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rpm_needed',
                            'label' => 'Speed for 10 000 × g',
                            'type' => 'number',
                            'suffix' => 'rpm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_minute',
                            'label' => 'Distance travelled per minute',
                            'type' => 'number',
                            'suffix' => 'km',
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
            'title' => 'Centrifuge',
            'results' => ['rcf' => '1.118*pow(10,-5)*radius*rpm*rpm', 'rpm_needed' => 'sqrt(10000/(1.118*pow(10,-5)*radius))', 'per_minute' => '2*pi*radius/100000*rpm'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        RCF and RPM are the same centrifuge force in different units: RPM depends on the rotor, RCF does not. It returns relative centrifugal force, speed for 10 000 × g and distance travelled per minute, and the panel shows all of them at once.
        
        This converter goes between the two using the rotor radius, so a protocol written for someone else's centrifuge can be run on yours.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Centrifuge RCF to RPM Converter', 'html' => <<<'TXT'
            <p>RCF = 1.118 × 10⁻⁵ × r × (rpm)², with r in centimetres and RCF in multiples of g</p>
            <figure class="calc-figure"><img src="/uploads/biology/centrifuge-rcf-rpm.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Centrifuge RCF to RPM Converter — Force rises with the square of the speed." title="Centrifuge RCF to RPM Converter"><figcaption>Force rises with the square of the speed.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>r</code></td><td>rotor radius (centre to tube bottom)</td><td>cm</td></tr><tr><td><code>rpm</code></td><td>revolutions per minute</td><td>rpm</td></tr><tr><td><code>RCF</code></td><td>relative centrifugal force</td><td>× g</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Centrifuge RCF to RPM Converter?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: rotor radius of <strong>8.5</strong> cm, speed of <strong>4,000</strong> rpm.</p>
            <p>Substituting them into the formula gives relative centrifugal force of <strong>1,520.48</strong> × g, speed for 10 000 × g of <strong>10,258.16</strong> rpm, distance travelled per minute of <strong>2.14</strong> km.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 500 × g</td><td><strong>Gentle pelleting</strong></td><td>cells, nuclei, large precipitates</td></tr><tr><td>1 000 – 5 000 × g</td><td><strong>Standard</strong></td><td>bacteria, mitochondria</td></tr><tr><td>10 000 – 20 000 × g</td><td><strong>High</strong></td><td>cell debris, protein precipitates</td></tr><tr><td>above 100 000 × g</td><td><strong>Ultracentrifuge</strong></td><td>ribosomes, viruses, density gradients</td></tr></tbody></table>
            <ul><li><p>RCF scales with the square of the speed and linearly with the radius, so a rotor with a 17 cm radius needs far fewer rpm than a small benchtop one to reach the same force.</p></li><li><p>Radius is measured horizontally from the spindle axis to the bottom of the tube when the rotor is in its running position, not the top of the tube.</p></li><li><p>Because force varies along the tube, only the maximum radius (the pellet end) is used for pelleting steps; for gradients, use the average radius.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Measuring the radius from the rotor edge instead of the spindle axis.</li><li>Copying rpm from a protocol run on a different rotor.</li><li>Assuming the same rpm always means the same force across a swinging-bucket and a fixed-angle rotor.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I convert 10 000 × g to rpm?', 'a' => 'rpm = √(RCF ÷ (1.118 × 10⁻⁵ × r)). For an 8.5 cm radius, about 10 260 rpm.'],
            ['q' => 'Is RCF the same as g?', 'a' => 'RCF is the force expressed as multiples of Earth\'s gravity, so 10 000 × g means ten thousand times gravity.'],
            ['q' => 'What does the Centrifuge RCF to RPM Converter actually calculate?', 'a' => <<<'TXT'
            It returns relative centrifugal force, speed for 10 000 × g and distance travelled per minute. Each one is derived by the formula on this page, so you can check any figure by hand.
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
