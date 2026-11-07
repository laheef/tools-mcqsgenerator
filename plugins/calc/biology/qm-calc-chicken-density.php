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
    'meta' => ['title' => 'Chicken Density Calculator — Formula & Results', 'description' => <<<'TXT'
    Enter Number of birds and Usable floor area into Chicken Density and the answer comes back as Stocking density and Floor allowance. Stocking density is opened…
    TXT, 'h1' => 'Chicken Density Calculator', 'updated' => '2026-10-29'],
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
        Enter Number of birds and Usable floor area into Chicken Density and the answer comes back as Stocking density and Floor allowance. Nothing is looked up on this page: Stocking density is computed from Number of birds and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Stocking density is opened in birds/m²; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Chicken Density calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Chicken Density: it takes 2 numbers and reports Stocking density and Floor allowance.</p><p>The relationship it solves reads Stocking density = Number of birds ÷ Usable floor area.</p><p>The answers are Stocking density and Floor allowance; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Number of birds</strong> — a plain number, no unit. The flock you are housing</li><li><strong>Usable floor area</strong> — in m². Excluding feeders, drinkers and nest boxes</li></ul><p>The answers come back as Stocking density in birds/m², Floor allowance in m²/bird. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Stocking density is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Stocking density</strong> = <code>Number of birds ÷ Usable floor area</code></li><li><strong>Floor allowance</strong> = <code>Usable floor area ÷ Number of birds</code></li><li><strong>Number of birds</strong> = <code>Stocking density × Usable floor area</code></li><li><strong>Usable floor area</strong> = <code>Number of birds ÷ Stocking density</code></li></ul><p>Any one of Stocking density, Floor allowance and Number of birds can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Stocking density and Floor allowance are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Number of birds and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Number of birds and Usable floor area and the number you are missing is Stocking density and Floor allowance.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/mutation-rate">Mutation rate Calculator</a>, <a href="/biology/ndvi-calculator">NDVI (Normalised Difference Vegetation Index) Calculator</a> and <a href="/biology/net-primary-productivity">Net Primary Productivity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Chicken Density calculator work out?', 'a' => 'Stocking density and Floor allowance, from Number of birds and Usable floor area. The relationship is Stocking density = Number of birds ÷ Usable floor area.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Number of birds, Usable floor area (m²). Enter birds and area; Stocking density is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Stocking density, Floor allowance, Number of birds and Usable floor area blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Stocking density is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Number of birds left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Stocking density keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/mutation-rate', 'name' => 'Mutation rate Calculator'],
            ['path' => '/biology/ndvi-calculator', 'name' => 'NDVI (Normalised Difference Vegetation Index) Calculator'],
            ['path' => '/biology/net-primary-productivity', 'name' => 'Net Primary Productivity Calculator'],
        ],
        'authors' => [],
    ],
];
