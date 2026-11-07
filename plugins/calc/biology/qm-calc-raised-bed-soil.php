<?php

/**
 * Raised bed soil
 * /biology/raised-bed-soil
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Raised bed soil',
    'meta' => ['title' => 'Raised bed soil Calculator: Free, With Steps', 'description' => 'Raised bed soil takes Length, Width and Depth and returns Topsoil percentage and Compost percentage. Topsoil percentage is opened in percent; the chip beside…', 'h1' => 'Raised bed soil Calculator', 'updated' => '2026-06-17'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'mcm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'width',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'mcm',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'quantity',
                            'label' => 'How many raised beds?',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'soil_rect',
                            'label' => 'Volume of soil needed',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Soil mix recipe (optional)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'recipe',
                            'label' => 'Soil mix',
                            'type' => 'select',
                            'options' => ['60% topsoil - 30% compost - 10% aeration' => '0.6', '40% topsoil - 40% compost -20% aeration' => '0.4', '33% compost - 33% peat/coir - 33% aeration' => '0.3333', 'Custom mix' => ''],
                            'dataset' => 'soil_recipe',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'topsoil_perc',
                            'label' => 'Topsoil percentage',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compost_perc',
                            'label' => 'Compost percentage',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'others_perc',
                            'label' => 'Other ingredient percentage',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'topsoil',
                            'label' => 'Topsoil',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compost',
                            'label' => 'Compost',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'others',
                            'label' => 'Others',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'soil_rect =  quantity * depth * length * width',
            'results' => [
                'quantity' => 'soil_rect/(depth*length*width)',
                'length' => 'soil_rect/(depth*quantity*width)',
                'soil_rect' => 'depth*length*quantity*width',
                'depth' => 'soil_rect/(length*quantity*width)',
                'width' => 'soil_rect/(depth*length*quantity)',
            ],
        ],
        [
            'title' => 'topsoil = soil_rect *topsoil_perc',
            'results' => ['topsoil_perc' => 'topsoil/soil_rect', 'topsoil' => 'soil_rect*topsoil_perc', 'soil_rect' => 'topsoil/topsoil_perc'],
        ],
        [
            'title' => 'compost = soil_rect *compost_perc',
            'results' => ['compost' => 'compost_perc*soil_rect', 'soil_rect' => 'compost/compost_perc', 'compost_perc' => 'compost/soil_rect'],
        ],
        [
            'title' => 'others = soil_rect *others_perc',
            'results' => ['others' => 'others_perc*soil_rect', 'soil_rect' => 'others/others_perc', 'others_perc' => 'others/soil_rect'],
        ],
        [
            'title' => 'topsoil_perc + compost_perc +  others_perc = 1',
            'results' => ['topsoil_perc' => '-compost_perc - others_perc + 1', 'compost_perc' => '-others_perc - topsoil_perc + 1', 'others_perc' => '-compost_perc - topsoil_perc + 1'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Raised bed soil takes Length, Width and Depth and returns Topsoil percentage and Compost percentage. Nothing is looked up on this page: Topsoil percentage is computed from Length and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Topsoil percentage is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Raised bed soil calculator works', 'html' => <<<'TXT'
            <p>The Raised bed soil calculator applies one relationship to 9 numbers and reports Topsoil percentage, Compost percentage and Other ingredient percentage.</p><p>In the form&#039;s own words, How many raised beds? = Volume of soil needed ÷ (Depth × Length × Width).</p><p>The result panel carries Topsoil percentage, Compost percentage and Other ingredient percentage, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 9 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Length</strong> — in meters / centimeters</li><li><strong>Width</strong> — in meters / centimeters</li><li><strong>Depth</strong> — in centimeters</li><li><strong>How many raised beds?</strong> — a plain number, no unit</li><li><strong>Volume of soil needed</strong> — in cubic meters</li><li><strong>Soil mix</strong> — a plain number, no unit</li><li><strong>Topsoil</strong> — in cubic meters</li><li><strong>Compost</strong> — in cubic meters</li><li><strong>Others</strong> — in cubic meters</li></ul><p>The answers come back as Topsoil percentage in percent, Compost percentage in percent, Other ingredient percentage in percent. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Topsoil percentage offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>How many raised beds?</strong> = <code>Volume of soil needed ÷ (Depth × Length × Width)</code></li><li><strong>Length</strong> = <code>Volume of soil needed ÷ (Depth × How many raised beds? × Width)</code></li><li><strong>Volume of soil needed</strong> = <code>Depth × Length × How many raised beds? × Width</code></li><li><strong>Depth</strong> = <code>Volume of soil needed ÷ (Length × How many raised beds? × Width)</code></li><li><strong>Width</strong> = <code>Volume of soil needed ÷ (Depth × Length × How many raised beds?)</code></li><li><strong>Topsoil percentage</strong> = <code>Topsoil ÷ Volume of soil needed</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of How many raised beds?, Length and Volume of soil needed can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Length, Width and Depth is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Topsoil percentage, Compost percentage and Other ingredient percentage are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Length to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Length, Width and Depth is what you already know and Topsoil percentage and Compost percentage is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/farm-pond-fish-stocking">Farm Pond Fish Stocking Calculator</a>, <a href="/biology/feed-conversion-ratio">Feed Conversion Ratio Calculator</a> and <a href="/biology/fcr">Feed conversion ratio</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Raised bed soil calculator work out?', 'a' => <<<'TXT'
            Topsoil percentage, Compost percentage and Other ingredient percentage, from Volume of soil needed, Depth, Length and Width. The relationship is How many raised beds? = Volume of soil needed ÷ (Depth × Length × Width).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Length (meters / centimeters), Width (meters / centimeters), Depth (centimeters), How many raised beds?, Volume of soil needed (cubic meters). Fill length, width and depth and leave Topsoil percentage empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. How many raised beds?, Length, Volume of soil needed and Depth can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Topsoil percentage is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Length blank and the page solves for it, reporting Topsoil percentage instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Topsoil percentage keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/farm-pond-fish-stocking', 'name' => 'Farm Pond Fish Stocking Calculator'],
            ['path' => '/biology/feed-conversion-ratio', 'name' => 'Feed Conversion Ratio Calculator'],
            ['path' => '/biology/fcr', 'name' => 'Feed conversion ratio'],
        ],
        'authors' => [],
    ],
];
