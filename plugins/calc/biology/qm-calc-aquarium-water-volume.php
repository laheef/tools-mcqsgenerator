<?php

/**
 * Aquarium Water Volume Calculator
 * /biology/aquarium-water-volume
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Aquarium Water Volume Calculator',
    'meta' => ['title' => 'Aquarium Water Volume Calculator — Formula & Results', 'description' => 'Tank capacity is quoted as a nominal volume, but the water you actually hold is less once glass, substrate and decoration are accounted for.', 'h1' => 'Aquarium Water Volume Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'shape',
                            'label' => 'Shape',
                            'type' => 'select',
                            'options' => ['Rectangular' => '1', 'Bow-front' => '0.85', 'Cylinder' => '0.785'],
                            'default' => 'Rectangular',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '90',
                        ],
                        [
                            'name' => 'width',
                            'label' => 'Width or diameter',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '45',
                        ],
                        [
                            'name' => 'height',
                            'label' => 'Water height',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '45',
                        ],
                        [
                            'name' => 'substrate',
                            'label' => 'Substrate depth',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Displaces water and must be subtracted',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'litres',
                            'label' => 'Gross volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'net',
                            'label' => 'True water volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gallons',
                            'label' => 'True volume',
                            'type' => 'number',
                            'suffix' => 'US gal',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'weight',
                            'label' => 'Weight of the water',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'turnover',
                            'label' => 'Filter turnover needed (5x per hour)',
                            'type' => 'number',
                            'suffix' => 'L/h',
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
            'title' => 'Tank',
            'results' => [
                'litres' => 'length*width*height*shape/1000',
                'net' => 'length*width*height*shape/1000-length*width*substrate/1000',
                'gallons' => '(length*width*height*shape/1000-length*width*substrate/1000)/3.785',
                'weight' => 'length*width*height*shape/1000-length*width*substrate/1000',
                'turnover' => '(length*width*height*shape/1000-length*width*substrate/1000)*5',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Tank capacity is quoted as a nominal volume, but the water you actually hold is less once glass, substrate and decoration are accounted for. It returns gross volume, true water volume, true volume and weight of the water, and the panel shows all of them at once.
        
        This calculator returns gross and true volume, the weight of the water and the heater and filter turnover the tank needs.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Aquarium Water Volume', 'html' => <<<'TXT'
            <p>Volume (L) = length × width × height ÷ 1 000; subtract length × width × substrate depth</p>
            <figure class="calc-figure"><img src="/uploads/biology/aquarium-water-volume.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Aquarium Water Volume Calculator — Length, width, height — then subtract what the gravel takes." title="Aquarium Water Volume Calculator"><figcaption>Length, width, height — then subtract what the gravel takes.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>L, W, H</code></td><td>internal dimensions</td><td>cm</td></tr><tr><td><code>substrate</code></td><td>gravel or sand depth</td><td>cm</td></tr><tr><td><code>1 L</code></td><td>1 000 cm³ of water, 1 kg</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Aquarium Water Volume?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: shape set to <strong>1.0</strong>, length of <strong>90</strong> cm, width or diameter of <strong>45</strong> cm, water height of <strong>45</strong> cm, substrate depth of <strong>5</strong> cm.</p>
            <p>Substituting them into the formula gives gross volume of <strong>182.25</strong> L, true water volume of <strong>162</strong> L, true volume of <strong>42.8</strong> US gal, weight of the water of <strong>162</strong> kg, filter turnover needed (5x per hour) of <strong>810</strong> L/h.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 20 L</td><td><strong>Nano</strong></td><td>very little buffering; small changes matter</td></tr><tr><td>20 – 60 L</td><td><strong>Small</strong></td><td>easy to maintain, few fish</td></tr><tr><td>60 – 200 L</td><td><strong>Community</strong></td><td>stable, forgiving of mistakes</td></tr><tr><td>above 200 L</td><td><strong>Large</strong></td><td>stable but heavy: check the floor loading</td></tr></tbody></table>
            <ul><li><p>Tanks are sold by external dimensions. A '90 cm' tank usually holds about 90 cm internally, but the glass thickness and the fill line cost another few litres.</p></li><li><p>Water weighs one kilogram per litre, so a 200 L tank is a quarter of a tonne before glass, substrate and cabinet — worth checking against a floor joist span.</p></li><li><p>The old rule of five turnovers per hour suits most freshwater community tanks; marine and cichlid setups want ten or more.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Using external dimensions and filling to the brim in the calculation.</li><li>Forgetting that substrate and rock displace water, which is most of the error in a heavily decorated tank.</li><li>Treating US gallons and imperial gallons as the same — they differ by 20%.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/fish-tank-stocking">Fish tank stocking</a>. <a href="/biology/ideal-fish-tank-size">Ideal tank size</a>. <a href="/biology/fish-per-liter">Fish per litre</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many litres is a 90 × 45 × 45 cm tank?', 'a' => '182 L gross, and about 162 L with 5 cm of substrate.'],
            ['q' => 'How much does a 200 L tank weigh?', 'a' => 'About 200 kg of water, plus 40–60 kg of glass and stand, plus substrate.'],
            ['q' => 'What does the Aquarium Water Volume actually calculate?', 'a' => <<<'TXT'
            It returns gross volume, true water volume, true volume and weight of the water. Each one is derived by the formula on this page, so you can check any figure by hand.
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
