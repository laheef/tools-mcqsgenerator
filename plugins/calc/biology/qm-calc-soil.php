<?php

/**
 * Soil
 * /biology/soil
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Soil',
    'meta' => ['title' => 'Soil Calculator — Free, With Worked Examples', 'description' => 'Enter Length and Width into Soil and the answer comes back as Area and Depth. The arithmetic is the whole method: Area is worked out from Length by one…', 'h1' => 'Soil Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'How much soil do you need?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'help' => 'Length of a rectangular surface. You may enter area directly if you want.',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.000001'],
                        ],
                        [
                            'name' => 'width',
                            'label' => 'Width',
                            'type' => 'number',
                            'help' => 'Width of a rectangular surface. You may enter area directly if you want.',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Area',
                            'type' => 'number',
                            'help' => 'The area of the surface you want to fill.',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'depth',
                            'label' => 'Depth',
                            'type' => 'number',
                            'help' => 'Desired depth of soil layer.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'volume_needed',
                            'label' => 'Volume needed',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'density',
                            'label' => 'Density',
                            'type' => 'number',
                            'help' => 'Density of soil that you want to buy. This information should be written on the bag.',
                            'unit' => '21',
                            'unit_default' => 'kgm3',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight_needed',
                            'label' => 'Weight needed',
                            'type' => 'number',
                            'help' => 'Weight of soil that you need to buy to cover the desired surface.',
                            'unit' => '22',
                            'unit_default' => 't',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'How much will the soil cost you?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_per_mass',
                            'label' => 'Price per unit mass',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_per_volume',
                            'label' => 'Price per unit volume',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_cost',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'length * width = area',
            'results' => ['area' => 'length*width', 'width' => 'area/length', 'length' => 'area/width'],
        ],
        [
            'title' => 'area * depth = volume_needed',
            'results' => ['depth' => 'volume_needed/area', 'volume_needed' => 'area*depth', 'area' => 'volume_needed/depth'],
        ],
        [
            'title' => 'density = weight_needed / volume_needed',
            'results' => ['volume_needed' => 'weight_needed/density', 'weight_needed' => 'density*volume_needed', 'density' => 'weight_needed/volume_needed'],
        ],
        [
            'title' => 'weight_needed * price_per_mass = total_cost',
            'results' => ['price_per_mass' => 'total_cost/weight_needed', 'total_cost' => 'price_per_mass*weight_needed', 'weight_needed' => 'total_cost/price_per_mass'],
        ],
        [
            'title' => 'volume_needed * price_per_volume = total_cost',
            'results' => ['volume_needed' => 'total_cost/price_per_volume', 'price_per_volume' => 'total_cost/volume_needed', 'total_cost' => 'price_per_volume*volume_needed'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Length and Width into Soil and the answer comes back as Area and Depth. The arithmetic is the whole method: Area is worked out from Length by one formula, applied once. Area comes back in square meters unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Soil calculator works', 'html' => <<<'TXT'
            <p>Soil answers one question from 2 numbers, and the answer is Area, Depth and Volume needed.</p><p>In the form&#039;s own words, Area = Length × Width.</p><p>The result panel carries Area, Depth, Volume needed and Density, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Length</strong> — in meters. Length of a rectangular surface. You may enter area directly if you want.</li><li><strong>Width</strong> — in meters. Width of a rectangular surface. You may enter area directly if you want.</li></ul><p>The answers come back as Area in square meters, Depth in centimeters, Volume needed in cubic meters, Density in kilograms per cubic meter, Weight needed in metric tons, Price per unit mass in USD, Price per unit volume in USD, Total cost in USD. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Area</strong> = <code>Length × Width</code></li><li><strong>Width</strong> = <code>Area ÷ Length</code></li><li><strong>Length</strong> = <code>Area ÷ Width</code></li><li><strong>Depth</strong> = <code>Volume needed ÷ Area</code></li><li><strong>Volume needed</strong> = <code>Area × Depth</code></li><li><strong>Weight needed</strong> = <code>Density × Volume needed</code></li></ul><p>Any one of Area, Width and Length can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Length and Width carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Area, Depth and Volume needed are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Length and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Length and Width is what you already know and Area and Depth is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a>, <a href="/biology/dog-size">Dog size Calculator</a> and <a href="/biology/dog-water-intake">Dog water intake Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Soil calculator work out?', 'a' => 'Area, Depth, Volume needed and Density, from Length and Width. The relationship is Area = Length × Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (meters), Width (meters). Enter length and width; Area is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Area, Width, Length and Depth blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Area is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Length blank and the page solves for it, reporting Area instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Area keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
            ['path' => '/biology/dog-size', 'name' => 'Dog size Calculator'],
            ['path' => '/biology/dog-water-intake', 'name' => 'Dog water intake Calculator'],
        ],
        'authors' => [],
    ],
];
