<?php

/**
 * Acres per hour
 * /biology/acres-per-hour
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Acres per hour',
    'meta' => ['title' => 'Acres per hour Calculator — Formula & Results', 'description' => 'Acres per hour works out Tool\'s width and Speed from Plot area and Time to complete. It is a rough estimation as the plot may have different shapes.The…', 'h1' => 'Acres per hour Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tool_width',
                            'label' => 'Tool\'s width',
                            'type' => 'number',
                            'help' => 'Width of your mower, plow, seeder, etc.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'speed',
                            'label' => 'Speed',
                            'type' => 'number',
                            'unit' => '32',
                            'unit_default' => 'kmph',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area_per_hour',
                            'label' => 'Area per hour',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'hectare',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Mowing time',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Plot area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'hectare',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time',
                            'label' => 'Time to complete',
                            'type' => 'number',
                            'help' => 'The time to complete for chosen plot area. It is a rough estimation as the plot may have different shapes.',
                            'unit' => '19',
                            'unit_default' => 'hrsmin',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Overlapping area',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'overlap',
                            'label' => 'Overlap',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'time = area / (area_per_hour/3600)',
            'results' => ['area_per_hour' => '3600*area/time', 'area' => '(1/3600)*area_per_hour*time', 'time' => '3600*area/area_per_hour'],
        ],
        [
            'title' => 'area_per_hour = speed * tool_width * (1 - overlap) * 3600',
            'results' => ['speed' => '-1/3600*area_per_hour/(tool_width*(overlap - 1))', 'overlap' => '-1/3600*area_per_hour/(speed*tool_width) + 1', 'area_per_hour' => '3600*speed*tool_width*(1 - overlap)', 'tool_width' => '-1/3600*area_per_hour/(speed*(overlap - 1))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Acres per hour works out Tool's width and Speed from Plot area and Time to complete. Nothing is looked up on this page: Tool's width is computed from Plot area and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Tool's width is opened in centimeters; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Acres per hour calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Acres per hour: it takes 2 numbers and reports Tool&#039;s width, Speed and Area per hour.</p><p>In the form&#039;s own words, Area per hour = 3600 × Plot area ÷ Time to complete.</p><p>The result panel carries Tool&#039;s width, Speed, Area per hour and Overlap, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Plot area</strong> — in hectares</li><li><strong>Time to complete</strong> — in hours / minutes. The time to complete for chosen plot area. It is a rough estimation as the plot may have different shapes.</li></ul><p>The answers come back as Tool&#039;s width in centimeters, Speed in kilometers per hour, Area per hour in hectares, Overlap in percent. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Area per hour</strong> = <code>3600 × Plot area ÷ Time to complete</code></li><li><strong>Plot area</strong> = <code>(1 ÷ 3600) × Area per hour × Time to complete</code></li><li><strong>Time to complete</strong> = <code>3600 × Plot area ÷ Area per hour</code></li><li><strong>Speed</strong> = <code>− 1 ÷ 3600 × Area per hour ÷ (Tool&#039;s width × (Overlap − 1))</code></li><li><strong>Overlap</strong> = <code>− 1 ÷ 3600 × Area per hour ÷ (Speed × Tool&#039;s width) + 1</code></li><li><strong>Tool&#039;s width</strong> = <code>− 1 ÷ 3600 × Area per hour ÷ (Speed × (Overlap − 1))</code></li></ul><p>Any one of Area per hour, Plot area and Time to complete can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Plot area and Time to complete carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Tool&#039;s width, Speed and Area per hour are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Plot area and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Plot area and Time to complete is what you already know and Tool&#039;s width and Speed is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/animal-mortality-rate">Animal mortality rate</a>, <a href="/biology/annealing-temperature">Annealing temperature Calculator</a> and <a href="/biology/aquarium-water-volume">Aquarium Water Volume Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Acres per hour calculator work out?', 'a' => 'Tool\'s width, Speed, Area per hour and Overlap, from Plot area and Time to complete. The relationship is Area per hour = 3600 × Plot area ÷ Time to complete.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Plot area (hectares), Time to complete (hours / minutes). Enter area and time; Tool\'s width is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Area per hour, Plot area, Time to complete and Speed blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Tool\'s width is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Plot area left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Tool\'s width keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/animal-mortality-rate', 'name' => 'Animal mortality rate'],
            ['path' => '/biology/annealing-temperature', 'name' => 'Annealing temperature Calculator'],
            ['path' => '/biology/aquarium-water-volume', 'name' => 'Aquarium Water Volume Calculator'],
        ],
        'authors' => [],
    ],
];
