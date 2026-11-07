<?php

/**
 * Vegetable seed
 * /biology/vegetable-seed
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Vegetable seed',
    'meta' => ['title' => 'Vegetable seed Calculator — Formula & Results', 'description' => 'Vegetable seed: Enter Type of seed, Length of row and No. of rows into Vegetable seed and the answer comes back as Seed distance and Seedling distance.', 'h1' => 'Vegetable seed Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => 'Spacing for seeds',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'seedType',
                            'label' => 'Type of seed',
                            'type' => 'select',
                            'options' => [
                                'Beans/Chard/Garlic' => '4',
                                'Beets/Carrots/Cauliflower/Turnips' => '2',
                                'Broccoli/Cabbage' => '9',
                                'Brussel sprouts/Melons/Watermelons' => '12',
                                'Collards/Corn/Kale/Kohlrabi' => '8',
                                'Okra/Squash/Potatoes' => '8.0000000001',
                                'Cucumbers' => '10',
                                'Gourds/Pumpkins' => '18',
                                'Leek/Onions/Spinach' => '3',
                                'Lettuce' => '6',
                                'Peas/Radish' => '1',
                                'Peppers/Celery/Eggplant' => '0',
                                'Artichoke' => '0.25',
                                'Tomatoes' => '0.5',
                                'Enter custom seed distance' => '',
                            ],
                            'dataset' => 'seed',
                            'control' => 'DROPDOWN',
                            'default' => 'Cucumbers',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lengthOfRow',
                            'label' => 'Length of row',
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
                            'name' => 'noOfRows',
                            'label' => 'No. of rows',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'seedDistance',
                            'label' => 'Seed distance',
                            'type' => 'result',
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
                            'name' => 'noOfSeeds',
                            'label' => 'No. of seeds ',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'These seeds require very little spacing for germination. They may be sown by simply sprinkling the seeds on the earth for adequate spacing.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Spacing for seedlings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'seedlingType',
                            'label' => 'Seedling type',
                            'type' => 'select',
                            'options' => [
                                'Artichoke' => '48',
                                'Beans/Carrots' => '4',
                                'Beets' => '3',
                                'Peas' => '1',
                                'Garlic' => '6',
                                'Cucumbers/Corn/Broccoli/Cauliflower' => '12',
                                'Kale/Kohlrabi/Collards' => '12.000000000001',
                                'Brussel sprouts/Eggplant/Melons' => '18',
                                'Cabbage' => '15',
                                'Celery/Lettuce' => '8',
                                'Chard' => '6',
                                'Gourds/Pumpkins/Tomatoes' => '24',
                                'Leek' => '4',
                                'Okra/Peppers/Squash/Potatoes' => '12',
                                'Onions/Spinach' => '6',
                                'Turnips' => '4',
                                'Radish' => '2',
                                'Watermelons' => '18',
                                'Enter custom seedling distance' => '',
                            ],
                            'dataset' => 'seedlingType',
                            'control' => 'DROPDOWN',
                            'default' => 'Cucumbers/Corn/Broccoli/Cauliflower',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lengthOfRow1',
                            'label' => 'Length of row',
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
                            'name' => 'noOfRows1',
                            'label' => 'No. of rows',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'seedlingDistance',
                            'label' => 'Seedling distance',
                            'type' => 'result',
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
                            'name' => 'noOfSeedlings',
                            'label' => 'No. of seedlings',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'noOfSeeds = floor(lengthOfRow/seedDistance) * noOfRows',
            'results' => ['noOfSeeds' => 'noOfRows*floor(lengthOfRow/seedDistance)', 'noOfRows' => 'noOfSeeds/floor(lengthOfRow/seedDistance)'],
        ],
        [
            'title' => 'noOfSeedlings = floor(lengthOfRow1/seedlingDistance) * noOfRows1',
            'results' => ['noOfRows1' => 'noOfSeedlings/floor(lengthOfRow1/seedlingDistance)', 'noOfSeedlings' => 'noOfRows1*floor(lengthOfRow1/seedlingDistance)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Type of seed, Length of row and No. of rows into Vegetable seed and the answer comes back as Seed distance and Seedling distance. There is no hidden constant here: change Seed distance and Type of seed moves with it. The main result, Seed distance, is reported in centimeters.
        TXT,
        'sections' => [
            ['title' => 'How the Vegetable seed calculator works', 'html' => <<<'TXT'
            <p>Vegetable seed answers one question from 8 numbers, and the answer is Seed distance and Seedling distance.</p><p>In the form&#039;s own words, No. of seeds = No. of rows × floor(Length of row ÷ Seed distance).</p><p>The answers are Seed distance and Seedling distance; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 8 boxes, and nothing else.</p><ul><li><strong>Type of seed</strong> — a plain number, no unit</li><li><strong>Length of row</strong> — in centimeters</li><li><strong>No. of rows</strong> — a plain number, no unit</li><li><strong>No. of seeds</strong> — a plain number, no unit</li><li><strong>Seedling type</strong> — a plain number, no unit</li><li><strong>Length of row</strong> — in centimeters</li><li><strong>No. of rows</strong> — a plain number, no unit</li><li><strong>No. of seedlings</strong> — a plain number, no unit</li></ul><p>The result boxes are Seed distance in centimeters, Seedling distance in centimeters; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>No. of seeds</strong> = <code>No. of rows × floor(Length of row ÷ Seed distance)</code></li><li><strong>No. of rows</strong> = <code>No. of seeds ÷ floor(Length of row ÷ Seed distance)</code></li><li><strong>No. of seedlings</strong> = <code>No. of rows × floor(Length of row ÷ Seedling distance)</code></li></ul><p>Any one of No. of seeds, No. of rows and No. of rows can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Length of row and Length of row carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Seed distance and Seedling distance are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Type of seed and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Type of seed, Length of row and No. of rows and the number you are missing is Seed distance and Seedling distance.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/crop-water-stress-index">Crop Water Stress Index Calculator</a>, <a href="/biology/daily-light-integral-dli">Daily light integral (DLI) Calculator</a> and <a href="/biology/days-to-maturity">Days to Maturity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Vegetable seed calculator work out?', 'a' => <<<'TXT'
            Seed distance and Seedling distance, from No. of rows, Length of row and Seed distance. The relationship is No. of seeds = No. of rows × floor(Length of row ÷ Seed distance).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Type of seed, Length of row (centimeters), No. of rows, No. of seeds, Seedling type. Enter seedType, lengthOfRow and noOfRows; Seed distance is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of No. of seeds, No. of rows, No. of rows and No. of seedlings blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Seed distance is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Type of seed blank and the page solves for it, reporting Seed distance instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Seed distance keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/crop-water-stress-index', 'name' => 'Crop Water Stress Index Calculator'],
            ['path' => '/biology/daily-light-integral-dli', 'name' => 'Daily light integral (DLI) Calculator'],
            ['path' => '/biology/days-to-maturity', 'name' => 'Days to Maturity Calculator'],
        ],
        'authors' => [],
    ],
];
