<?php

/**
 * Chicken Density Calculator
 * /biology/chicken-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Chicken Density Calculator',
    'meta' => ['title' => 'Chicken Density Calculator — Formula & Results', 'description' => 'Chicken density is the number of birds divided by the usable floor area, in birds per m². It returns stocking density, floor allowance, number of birds and…', 'h1' => 'Chicken Density Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'birds',
                            'label' => 'Number of birds',
                            'type' => 'number',
                            'help' => 'The flock you are housing',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Usable floor area',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'help' => 'Excluding feeders, drinkers and nest boxes',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Stocking density',
                            'type' => 'number',
                            'suffix' => 'birds/m²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_bird',
                            'label' => 'Floor allowance',
                            'type' => 'number',
                            'suffix' => 'm²/bird',
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
            'title' => 'Density',
            'results' => ['density' => 'birds/area', 'per_bird' => 'area/birds', 'birds' => 'density*area', 'area' => 'birds/density'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Chicken density is the number of birds divided by the usable floor area, in birds per m². It returns stocking density, floor allowance, number of birds and usable floor area, and the panel shows all of them at once.
        
        Flip it and you get the floor allowance per bird, the figure welfare standards and coop plans are written in.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Chicken Density', 'html' => <<<'TXT'
            <p>Density (birds/m²) = number of birds ÷ usable floor area (m²)</p>
            <figure class="calc-figure"><img src="/uploads/biology/chicken-density.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Chicken Density Calculator — Birds over floor area gives the density, and the allowance is its reciprocal." title="Chicken Density Calculator"><figcaption>Birds over floor area gives the density, and the allowance is its reciprocal.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>birds</code></td><td>number of birds in the house</td><td>birds</td></tr><tr><td><code>area</code></td><td>usable floor area</td><td>m²</td></tr><tr><td><code>density</code></td><td>birds per square metre</td><td>birds/m²</td></tr><tr><td><code>per_bird</code></td><td>floor each bird has to itself</td><td>m²/bird</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Chicken Density?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Substituting them into the formula gives stocking density of <strong>4</strong> birds/m², floor allowance of <strong>0.25</strong> m²/bird, number of birds of <strong>60</strong>, usable floor area of <strong>15</strong> m².</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>up to 7</td><td><strong>Free range / organic</strong></td><td>typical outdoor or low-density indoor systems</td></tr><tr><td>7 – 9</td><td><strong>Barn</strong></td><td>indoor floor systems with litter</td></tr><tr><td>9 – 12</td><td><strong>Higher-density indoor</strong></td><td>permitted in some schemes with enrichment</td></tr></tbody></table>
            <ul><li><p>Count usable floor, not the footprint of the building: feeders, drinkers, nest boxes and service aisles do not count as space the birds can use.</p></li><li><p>Density and allowance are reciprocals — 6 birds/m² is exactly 0.167 m²/bird — so a plan that quotes one and not the other is only half specified.</p></li><li><p>Ventilation, not floor area, becomes the limiting factor above about 9 birds/m² in a naturally ventilated shed.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Using the shed footprint instead of the usable floor.</li><li>Forgetting that birds are moved or thinned: a plan for 10 birds/m² at placement becomes 12 or more at depletion unless birds leave.</li><li>Mixing metric and imperial floor areas.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a good chicken density?', 'a' => <<<'TXT'
            For backyard flocks, 1–2 m² per bird of run plus 0.3 m² of coop is the usual guidance. Commercial indoor systems run between 7 and 12 birds/m² depending on the standard.
            TXT],
            ['q' => 'Does the calculator account for outdoor run?', 'a' => 'It measures whatever area you give it. Use the indoor floor for housing density and the run area separately if you are checking free-range requirements.'],
            ['q' => 'What does the Chicken Density actually calculate?', 'a' => <<<'TXT'
            It returns stocking density, floor allowance, number of birds and usable floor area. Each one is derived by the formula on this page, so you can check any figure by hand.
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
