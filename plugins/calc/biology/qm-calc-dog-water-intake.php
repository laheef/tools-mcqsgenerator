<?php

/**
 * Dog water intake
 * /biology/dog-water-intake
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog water intake',
    'meta' => ['title' => 'Dog water intake — Formula, Steps & Examples', 'description' => 'Dog water intake works out Daily water intake from Activity level and Weight. Daily water intake is opened in milliliters; the chip beside it switches to any…', 'h1' => 'Dog water intake Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'activity_level' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '5r5VjiJCbM29zKB6DzlfR', 'c' => null],
                ],
                'ds' => 'hdKpGTiVp2LO8NoglM9Qt',
            ],
            'water_intake' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'zWKJXHjwM60FpZjkKQbpL',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'activity_level',
                                    'vt' => 'valueSelect',
                                    'l' => 'Activity level',
                                    'ds' => 'hdKpGTiVp2LO8NoglM9Qt',
                                    'opts' => [
                                        ['bhXOIx4cY8gSxniuP66Rn', 'Low', '40'],
                                        ['5r5VjiJCbM29zKB6DzlfR', 'Medium', '50'],
                                        ['QCRQqYBrykHsyelUW1BUC', 'High ', '60'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => 'Weight',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'water_intake',
                                    'vt' => 'numerical',
                                    'l' => 'Daily water intake',
                                    'h' => 'The calculated value is approximation. It may differ based on the dog\'s health, diet and other important factors.',
                                    'us' => '20',
                                    'du' => 'ml',
                                    'oo' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, <<<'TXT'
                                        This tool is for information purposes only; water intake should always be calculated separately and double-checked by the health care provider. Consult a veterinarian.
                                        TXT],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'water_intake = weight * activity_level',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => 'water_intake/activity_level',
                        'r' => ['water_intake', 'activity_level'],
                    ],
                    [
                        'l' => 'water_intake',
                        'f' => 'activity_level*weight',
                        'r' => ['weight', 'activity_level'],
                    ],
                    [
                        'l' => 'activity_level',
                        'f' => 'water_intake/weight',
                        'r' => ['weight', 'water_intake'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'hdKpGTiVp2LO8NoglM9Qt' => [
                'name' => 'Activity level',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'bhXOIx4cY8gSxniuP66Rn', 'label' => 'Low', 'value' => '40'],
                    ['uid' => '5r5VjiJCbM29zKB6DzlfR', 'label' => 'Medium', 'value' => '50'],
                    ['uid' => 'QCRQqYBrykHsyelUW1BUC', 'label' => 'High ', 'value' => '60'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dog water intake works out Daily water intake from Activity level and Weight. Nothing is looked up on this page: Daily water intake is computed from Activity level and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Daily water intake is opened in milliliters; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Dog water intake calculator works', 'html' => <<<'TXT'
            <p>The Dog water intake calculator applies one relationship to 2 numbers and reports Daily water intake.</p><p>The relationship it solves reads Weight = Daily water intake ÷ Activity level.</p><p>The answers are Daily water intake; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Activity level</strong> — a plain number, no unit</li><li><strong>Weight</strong> — in kilograms</li></ul><p>What you get back is Daily water intake in milliliters, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Weight</strong> = <code>Daily water intake ÷ Activity level</code></li><li><strong>Daily water intake</strong> = <code>Activity level × Weight</code></li><li><strong>Activity level</strong> = <code>Daily water intake ÷ Weight</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Weight, Daily water intake and Activity level can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Weight carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Daily water intake is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Activity level is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Activity level and Weight measured, Daily water intake wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/how-big-will-my-cat-get">How big will my cat get Calculator</a>, <a href="/biology/huglin-index">Huglin Index Calculator</a> and <a href="/biology/hunting-tooth-ratio">Hunting Tooth Ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog water intake calculator work out?', 'a' => 'Daily water intake, from Daily water intake and Activity level. The relationship is Weight = Daily water intake ÷ Activity level.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Activity level, Weight (kilograms). With activity_level and weight in place, Daily water intake can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Weight, Daily water intake and Activity level can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Daily water intake is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Activity level left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Daily water intake at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/how-big-will-my-cat-get', 'name' => 'How big will my cat get Calculator'],
            ['path' => '/biology/huglin-index', 'name' => 'Huglin Index Calculator'],
            ['path' => '/biology/hunting-tooth-ratio', 'name' => 'Hunting Tooth Ratio Calculator'],
        ],
        'authors' => [],
    ],
];
