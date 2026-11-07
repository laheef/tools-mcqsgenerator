<?php

/**
 * Fish Density Calculator
 * /biology/fish-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fish Density Calculator',
    'meta' => ['title' => 'Fish Density Calculator — Formula & Results', 'description' => 'Fish Density works out Fish per litre and Litres per fish from Number of fish, Water volume and Average fish weight. It is a single relationship that reads…', 'h1' => 'Fish Density Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'fish',
                            'label' => 'Number of fish',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Water volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'help' => 'Net water volume, not the tank\'s outside size',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '200',
                        ],
                        [
                            'name' => 'weight',
                            'label' => 'Average fish weight',
                            'type' => 'number',
                            'suffix' => 'g',
                            'help' => 'Optional: adds a biomass figure',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Fish per litre',
                            'type' => 'number',
                            'suffix' => 'fish/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_fish',
                            'label' => 'Litres per fish',
                            'type' => 'number',
                            'suffix' => 'L/fish',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'biomass',
                            'label' => 'Biomass density',
                            'type' => 'number',
                            'suffix' => 'g/L',
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
            'results' => [
                'density' => 'fish/volume',
                'per_fish' => 'volume/fish',
                'biomass' => 'fish*weight/volume',
                'fish' => 'density*volume',
                'volume' => 'fish/density',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Fish Density works out Fish per litre and Litres per fish from Number of fish, Water volume and Average fish weight. It is a single relationship that reads Fish per litre out of Number of fish, not a table of canned results keyed by them. Units for Fish per litre default to fish/L and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Fish Density calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Fish Density: it takes 3 numbers and reports Fish per litre, Litres per fish and Biomass density.</p><p>The relationship it solves reads Fish per litre = Number of fish ÷ Water volume.</p><p>What comes back is Fish per litre, Litres per fish and Biomass density — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Number of fish</strong> — a plain number, no unit</li><li><strong>Water volume</strong> — in L. Net water volume, not the tank&#039;s outside size</li><li><strong>Average fish weight</strong> — in g. Optional: adds a biomass figure</li></ul><p>What you get back is Fish per litre in fish/L, Litres per fish in L/fish, Biomass density in g/L, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Fish per litre is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Fish per litre</strong> = <code>Number of fish ÷ Water volume</code></li><li><strong>Litres per fish</strong> = <code>Water volume ÷ Number of fish</code></li><li><strong>Biomass density</strong> = <code>Number of fish × Average fish weight ÷ Water volume</code></li><li><strong>Number of fish</strong> = <code>Fish per litre × Water volume</code></li><li><strong>Water volume</strong> = <code>Number of fish ÷ Fish per litre</code></li></ul><p>Any one of Fish per litre, Litres per fish and Biomass density can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Fish per litre, Litres per fish and Biomass density are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Number of fish and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Number of fish, Water volume and Average fish weight and the number you are missing is Fish per litre and Litres per fish.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/hamster-age">Hamster age Calculator</a>, <a href="/biology/hardy-weinberg-equilibrium">Hardy-Weinberg equilibrium Calculator</a> and <a href="/biology/hardy-weinberg-dominant-allele">Hardy–Weinberg from the Dominant Allele Frequency Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fish Density calculator work out?', 'a' => 'Fish per litre, Litres per fish and Biomass density, from Number of fish and Water volume. The relationship is Fish per litre = Number of fish ÷ Water volume.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Number of fish, Water volume (L), Average fish weight (g). With fish, volume and weight in place, Fish per litre can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Fish per litre, Litres per fish, Biomass density and Number of fish blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Fish per litre is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Number of fish left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Fish per litre at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/hamster-age', 'name' => 'Hamster age Calculator'],
            ['path' => '/biology/hardy-weinberg-equilibrium', 'name' => 'Hardy-Weinberg equilibrium Calculator'],
            ['path' => '/biology/hardy-weinberg-dominant-allele', 'name' => 'Hardy–Weinberg from the Dominant Allele Frequency Calculator'],
        ],
        'authors' => [],
    ],
];
