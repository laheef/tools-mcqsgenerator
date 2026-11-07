<?php

/**
 * Transpiration Rate Calculator
 * /biology/transpiration-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Transpiration Rate Calculator',
    'meta' => ['title' => 'Transpiration Rate Calculator — Formula & Results', 'description' => <<<'TXT'
    Transpiration Rate works out Transpiration rate and Daily water use per m² of leaf from Mass lost, Leaf area and Duration. The arithmetic is the whole method…
    TXT, 'h1' => 'Transpiration Rate Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'mass',
                            'label' => 'Mass lost',
                            'type' => 'number',
                            'suffix' => 'g',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.4',
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Leaf area',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.015',
                        ],
                        [
                            'name' => 'minutes',
                            'label' => 'Duration',
                            'type' => 'number',
                            'suffix' => 'min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'rate',
                            'label' => 'Transpiration rate',
                            'type' => 'number',
                            'suffix' => 'g/m²/h',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_day',
                            'label' => 'Daily water use per m² of leaf',
                            'type' => 'number',
                            'suffix' => 'L/m²/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mmol',
                            'label' => 'Molar rate',
                            'type' => 'number',
                            'suffix' => 'mmol/m²/s',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'conductance',
                            'label' => 'Approximate stomatal conductance',
                            'type' => 'number',
                            'suffix' => 'mol/m²/s',
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
            'title' => 'Water loss',
            'results' => ['rate' => 'mass/area/(minutes/60)', 'per_day' => 'mass/area/(minutes/60)*12/1000', 'mmol' => 'mass/area/(minutes/60)/18/3.6', 'conductance' => 'mass/area/(minutes/60)/18/3.6/44'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Transpiration Rate works out Transpiration rate and Daily water use per m² of leaf from Mass lost, Leaf area and Duration. The arithmetic is the whole method: Transpiration rate is worked out from Mass lost by one formula, applied once. Transpiration rate comes back in g/m²/h unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Transpiration Rate calculator works', 'html' => <<<'TXT'
            <p>Transpiration Rate answers one question from 3 numbers, and the answer is Transpiration rate, Daily water use per m² of leaf and Molar rate.</p><p>In the form&#039;s own words, Transpiration rate = Mass lost ÷ Leaf area ÷ (Duration ÷ 60).</p><p>The result panel carries Transpiration rate, Daily water use per m² of leaf, Molar rate and Approximate stomatal conductance, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Mass lost</strong> — in g</li><li><strong>Leaf area</strong> — in m²</li><li><strong>Duration</strong> — in min</li></ul><p>The answers come back as Transpiration rate in g/m²/h, Daily water use per m² of leaf in L/m²/day, Molar rate in mmol/m²/s, Approximate stomatal conductance in mol/m²/s. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Mass lost = 2.4 g, Leaf area = 0.015 m² and Duration = 30 min; the answers are &lt;strong&gt;Transpiration rate&lt;/strong&gt; = 320 g/m²/h, &lt;strong&gt;Daily water use per m² of leaf&lt;/strong&gt; = 3.84 L/m²/day, &lt;strong&gt;Molar rate&lt;/strong&gt; = 4.94 mmol/m²/s and &lt;strong&gt;Approximate stomatal conductance&lt;/strong&gt; = 0.1122 mol/m²/s.</p><ul><li><strong>Transpiration rate</strong> = 320 g/m²/h</li><li><strong>Daily water use per m² of leaf</strong> = 3.84 L/m²/day</li><li><strong>Molar rate</strong> = 4.94 mmol/m²/s</li><li><strong>Approximate stomatal conductance</strong> = 0.1122 mol/m²/s</li></ul><p>The line behind those figures is <strong>Transpiration rate</strong> = <code>Mass lost ÷ Leaf area ÷ (Duration ÷ 60)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Transpiration rate&lt;/strong&gt; = 320, &lt;strong&gt;Daily water use per m² of leaf&lt;/strong&gt; = 3.84, &lt;strong&gt;Molar rate&lt;/strong&gt; = 4.94 and &lt;strong&gt;Approximate stomatal conductance&lt;/strong&gt; = 0.1122. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Transpiration rate is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Transpiration rate</strong> = <code>Mass lost ÷ Leaf area ÷ (Duration ÷ 60)</code></li><li><strong>Daily water use per m² of leaf</strong> = <code>Mass lost ÷ Leaf area ÷ (Duration ÷ 60) × 12 ÷ 1000</code></li><li><strong>Molar rate</strong> = <code>Mass lost ÷ Leaf area ÷ (Duration ÷ 60) ÷ 18 ÷ 3.6</code></li><li><strong>Approximate stomatal conductance</strong> = <code>Mass lost ÷ Leaf area ÷ (Duration ÷ 60) ÷ 18 ÷ 3.6 ÷ 44</code></li></ul><p>Any one of Transpiration rate, Daily water use per m² of leaf and Molar rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Mass lost, from 2.4 to 4.8 — and the answers go from &lt;strong&gt;Transpiration rate&lt;/strong&gt; 320 g/m²/h, &lt;strong&gt;Daily water use per m² of leaf&lt;/strong&gt; 3.84 L/m²/day, &lt;strong&gt;Molar rate&lt;/strong&gt; 4.94 mmol/m²/s and &lt;strong&gt;Approximate stomatal conductance&lt;/strong&gt; 0.1122 mol/m²/s to &lt;strong&gt;Transpiration rate&lt;/strong&gt; 640 g/m²/h, &lt;strong&gt;Daily water use per m² of leaf&lt;/strong&gt; 7.68 L/m²/day, &lt;strong&gt;Molar rate&lt;/strong&gt; 9.88 mmol/m²/s and &lt;strong&gt;Approximate stomatal conductance&lt;/strong&gt; 0.2245 mol/m²/s.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Transpiration rate, Daily water use per m² of leaf and Molar rate are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Mass lost and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Mass lost, Leaf area and Duration and the number you are missing is Transpiration rate and Daily water use per m² of leaf.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/vapor-pressure-deficit">Vapor pressure deficit Calculator</a>, <a href="/biology/vegetable-seed">Vegetable seed</a> and <a href="/biology/vegetable-yield">Vegetable yield</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Transpiration Rate calculator work out?', 'a' => <<<'TXT'
            Transpiration rate, Daily water use per m² of leaf, Molar rate and Approximate stomatal conductance, from Mass lost, Leaf area and Duration. The relationship is Transpiration rate = Mass lost ÷ Leaf area ÷ (Duration ÷ 60).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mass lost (g), Leaf area (m²), Duration (min). Fill mass, area and minutes and leave Transpiration rate empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Transpiration rate, Daily water use per m² of leaf, Molar rate and Approximate stomatal conductance blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Transpiration rate = 320 g/m²/h, Daily water use per m² of leaf = 3.84 L/m²/day, Molar rate = 4.94 mmol/m²/s and Approximate stomatal conductance = 0.1122 mol/m²/s. Those are the defaults written into the form — move Mass lost and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Transpiration rate is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Mass lost blank and the page solves for it, reporting Transpiration rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Transpiration rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/vapor-pressure-deficit', 'name' => 'Vapor pressure deficit Calculator'],
            ['path' => '/biology/vegetable-seed', 'name' => 'Vegetable seed'],
            ['path' => '/biology/vegetable-yield', 'name' => 'Vegetable yield'],
        ],
        'authors' => [],
    ],
];
