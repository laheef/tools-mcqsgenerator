<?php

/**
 * The Witcher
 * /everyday-life/witcher
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'The Witcher',
    'meta' => ['title' => 'The Witcher Calculator: Formula, Steps & Examples', 'description' => 'The Witcher works out reading days and reading finish date and reports both. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'The Witcher Calculator', 'updated' => '2026-08-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'whatYouWannaDo',
                            'label' => 'I\'m interested in...',
                            'type' => 'select',
                            'options' => ['books' => '1', 'games' => '2', 'books and games' => '3', 'TV series ' => '4'],
                            'dataset' => 'Interest options',
                            'control' => 'DROPDOWN',
                            'default' => 'books',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'readingAndGameOrder',
                            'label' => 'I want to go for...',
                            'type' => 'select',
                            'options' => ['the optimal experience' => '1', 'books first' => '2', 'games first' => '3'],
                            'dataset' => 'Books and game order',
                            'default' => 'the optimal experience',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'startDate', 'label' => 'I will start on...', 'type' => 'date'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Books',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'readingSpeedOptions',
                            'label' => 'Reading speed',
                            'type' => 'select',
                            'options' => ['Slow (1/4 of a page per min)' => '1', 'Normal (1/2 of a page per min)' => '2', 'Fast (1 page per minute)' => '3', 'Enter a custom reading speed' => '0'],
                            'dataset' => 'Reading speed options',
                            'default' => 'Normal (1/2 of a page per min)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'readingSpeed',
                            'label' => 'You can read up to...',
                            'type' => 'result',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'readingTimePerDay',
                            'label' => 'How much time do you read?',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'orderOfReading',
                            'label' => 'Order of reading',
                            'type' => 'select',
                            'options' => ['Publication order' => '1', 'Chronological order' => '2', 'Short stories only' => '3', 'The Witcher saga only' => '4'],
                            'dataset' => 'Order options',
                            'default' => 'Publication order',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Games',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'playStyle',
                            'label' => 'Your play style',
                            'type' => 'select',
                            'options' => ['Main story only' => '1', 'Balanced' => '2', 'Completist' => '3', 'Speed run' => '4'],
                            'dataset' => 'Play style',
                            'control' => 'DROPDOWN',
                            'default' => 'Balanced',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'expansions',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['You want to include expansion packs' => '1', '' => '0'],
                            'dataset' => 'Expansions options',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gameTimePerDay',
                            'label' => 'Gaming time',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'TV series',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'episodesPerDay',
                            'label' => 'I will watch...',
                            'type' => 'number',
                            'help' => 'One episode is approximately an hour long.',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Vesemir',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Include "Nightmare of the Wolf"' => '1', '' => '0'],
                            'dataset' => 'Nightmare of the Wolf options',
                            'control' => 'CHECKBOX',
                            'help' => '"Nightmare of the Wolf" is an animated spin-off movie about Vesemir, Geralt\'s mentor. It is available on Netflix.',
                            'default' => 'Include "Nightmare of the Wolf"',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Recommended order',
            'note' => '',
            'blocks' => [],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'readingDays1',
                            'label' => 'Reading days1',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'r1',
                            'label' => 'R1',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'readingDays2',
                            'label' => 'Reading days2',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'r2',
                            'label' => 'R2',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'readingDays3',
                            'label' => 'Reading days3',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'r3',
                            'label' => 'R3',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'readingDays4',
                            'label' => 'Reading days4',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'r4',
                            'label' => 'R4',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'readingDays5',
                            'label' => 'Reading days5',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'r5',
                            'label' => 'R5',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'readingDays6',
                            'label' => 'Reading days6',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'r6',
                            'label' => 'R6',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'readingDays7',
                            'label' => 'Reading days7',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'r7',
                            'label' => 'R7',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'readingDays8',
                            'label' => 'Reading days8',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'r8',
                            'label' => 'R8',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'readingDaysTotal',
                            'label' => 'Reading days total',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        ['name' => 'readingFinishDate', 'label' => 'Reading finish date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 4,
                    'place' => [0, 1, 2, 3],
                    'fields' => [
                        [
                            'name' => 'p1',
                            'label' => 'P1',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p2',
                            'label' => 'P2',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p3',
                            'label' => 'P3',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p4',
                            'label' => 'P4',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'gameHours1',
                            'label' => 'Game hours1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gameDays1',
                            'label' => 'Game days1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'gameHours2',
                            'label' => 'Game hours2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gameDays2',
                            'label' => 'Game days2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'gameHours3',
                            'label' => 'Game hours3',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gameDays3',
                            'label' => 'Game days3',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'gameHours4',
                            'label' => 'Game hours4',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gameDays4',
                            'label' => 'Game days4',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'gameHours5',
                            'label' => 'Game hours5',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gameDays5',
                            'label' => 'Game days5',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'gameDaysTotal',
                            'label' => 'Game days total',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        ['name' => 'gameFinishDate', 'label' => 'Game finish date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'readingAndGameDaysTotal',
                            'label' => 'Reading and game days total',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        ['name' => 'bothFinishDate', 'label' => 'Both finish date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'seriesDays',
                            'label' => 'Series days',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        ['name' => 'seriesFinishDate', 'label' => 'Series finish date', 'type' => 'date'],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'rD1',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rH1',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'rD2',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rH2',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'rD3',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rH3',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'rD4',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rH4',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'rD5',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rH5',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'rD6',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rH6',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'rD7',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rH7',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'rD8',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rH8',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'readingDaysTotal',
                            'label' => 'Reading days',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'readingFinishDate', 'label' => 'Reading finish date', 'type' => 'date', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gameDaysTotal',
                            'label' => 'Gaming days',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'gameFinishDate', 'label' => 'Game finish date', 'type' => 'date', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'readingAndGameDaysTotal',
                            'label' => 'Reading and gaming days',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'bothFinishDate', 'label' => 'Combined finish date', 'type' => 'date', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'seriesDays',
                            'label' => 'Series days',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'seriesFinishDate', 'label' => 'Series finish date', 'type' => 'date', 'readonly' => true],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'seriesDays = ceil((8 + Vesemir) / episodesPerDay)',
            'results' => ['seriesDays' => 'ceil((Vesemir + 8)/episodesPerDay)'],
        ],
        [
            'title' => 'seriesFinishDate = one_way(startDate + ceil((8 + Vesemir) / episodesPerDay))',
            'results' => ['seriesFinishDate' => '(startDate + ceil((Vesemir + 8)/episodesPerDay))'],
        ],
        [
            'title' => 'readingDays1 = one_way(288 / (readingSpeed * readingTimePerDay))',
            'results' => ['readingDays1' => '(288/(readingSpeed*readingTimePerDay))'],
        ],
        [
            'title' => 'readingDays2 = one_way(366 / (readingSpeed * readingTimePerDay))',
            'results' => ['readingDays2' => '(366/(readingSpeed*readingTimePerDay))'],
        ],
        [
            'title' => 'readingDays3 = one_way(385 / (readingSpeed * readingTimePerDay))',
            'results' => ['readingDays3' => '(385/(readingSpeed*readingTimePerDay))'],
        ],
        [
            'title' => 'readingDays4 = one_way(324 / (readingSpeed * readingTimePerDay))',
            'results' => ['readingDays4' => '(324/(readingSpeed*readingTimePerDay))'],
        ],
        [
            'title' => 'readingDays5 = one_way(337 / (readingSpeed * readingTimePerDay))',
            'results' => ['readingDays5' => '(337/(readingSpeed*readingTimePerDay))'],
        ],
        [
            'title' => 'readingDays6 = one_way(378 / (readingSpeed * readingTimePerDay))',
            'results' => ['readingDays6' => '(378/(readingSpeed*readingTimePerDay))'],
        ],
        [
            'title' => 'readingDays7 = one_way(439 / (readingSpeed * readingTimePerDay))',
            'results' => ['readingDays7' => '(439/(readingSpeed*readingTimePerDay))'],
        ],
        [
            'title' => 'readingDays8 = one_way(540 / (readingSpeed * readingTimePerDay))',
            'results' => ['readingDays8' => '(540/(readingSpeed*readingTimePerDay))'],
        ],
        [
            'title' => 'readingDaysTotal = one_way(ceil((288*r1 + 366*r2 + 385*r3 + 324*r4 + 337*r5 + 378*r6 + 439*r7 + 540*r8) / (readingSpeed * readingTimePerDay)))',
            'results' => ['readingDaysTotal' => '(ceil((288*r1 + 366*r2 + 385*r3 + 324*r4 + 337*r5 + 378*r6 + 439*r7 + 540*r8)/(readingSpeed*readingTimePerDay)))'],
        ],
        [
            'title' => 'readingFinishDate = one_way(startDate + ceil((288*r1 + 366*r2 + 385*r3 + 324*r4 + 337*r5 + 378*r6 + 439*r7 + 540*r8) / (readingSpeed * readingTimePerDay)))',
            'results' => ['readingFinishDate' => '(startDate + ceil((288*r1 + 366*r2 + 385*r3 + 324*r4 + 337*r5 + 378*r6 + 439*r7 + 540*r8)/(readingSpeed*readingTimePerDay)))'],
        ],
        [
            'title' => 'gameHours1 = one_way(35.5*p1 + 46*p2 + 64.5*p3 + 24.5*p4)',
            'results' => ['gameHours1' => '((71/2)*p1 + 46*p2 + (129/2)*p3 + (49/2)*p4)'],
        ],
        [
            'title' => 'gameHours2 = one_way(24*p1 + 34*p2 + 54*p3 + 16*p4)',
            'results' => ['gameHours2' => '(24*p1 + 34*p2 + 54*p3 + 16*p4)'],
        ],
        [
            'title' => 'gameHours3 = one_way(51*p1 + 103*p2 + 174*p3 + 21*p4)',
            'results' => ['gameHours3' => '(51*p1 + 103*p2 + 174*p3 + 21*p4)'],
        ],
        [
            'title' => 'gameHours4 = one_way(10*p1 + 14*p2 + 19*p3 + 10*p4)',
            'results' => ['gameHours4' => '(10*p1 + 14*p2 + 19*p3 + 10*p4)'],
        ],
        [
            'title' => 'gameHours5 = one_way(15*p1 + 28*p2 + 41*p3 + 15*p4)',
            'results' => ['gameHours5' => '(15*p1 + 28*p2 + 41*p3 + 15*p4)'],
        ],
        [
            'title' => 'gameDays1 = ceil((35.5*p1 + 46*p2 + 64.5*p3 + 24.5*p4) / gameTimePerDay)',
            'results' => ['gameDays1' => 'ceil((1/2)*(71*p1 + 92*p2 + 129*p3 + 49*p4)/gameTimePerDay)'],
        ],
        [
            'title' => 'gameDays2 = ceil((24*p1 + 34*p2 + 54*p3 + 16*p4) / gameTimePerDay)',
            'results' => ['gameDays2' => 'ceil(2*(12*p1 + 17*p2 + 27*p3 + 8*p4)/gameTimePerDay)'],
        ],
        [
            'title' => 'gameDays3 = ceil((51*p1 + 103*p2 + 174*p3 + 21*p4) / gameTimePerDay)',
            'results' => ['gameDays3' => 'ceil((51*p1 + 103*p2 + 174*p3 + 21*p4)/gameTimePerDay)'],
        ],
        [
            'title' => 'gameDays4 = ceil((10*p1 + 14*p2 + 19*p3 + 10*p4) / gameTimePerDay)',
            'results' => ['gameDays4' => 'ceil((10*p1 + 14*p2 + 19*p3 + 10*p4)/gameTimePerDay)'],
        ],
        [
            'title' => 'gameDays5 = ceil((15*p1 + 28*p2 + 41*p3 + 15*p4) / gameTimePerDay)',
            'results' => ['gameDays5' => 'ceil((15*p1 + 28*p2 + 41*p3 + 15*p4)/gameTimePerDay)'],
        ],
        [
            'title' => 'gameDaysTotal = ceil((110.5*p1 + 183*p2 + 292.5*p3 + 61.5*p4 + (25*p1 + 42*p2 + 60*p3 + 25*p4) * expansions) / gameTimePerDay)',
            'results' => ['gameDaysTotal' => 'ceil((1/2)*(50*expansions*p1 + 84*expansions*p2 + 120*expansions*p3 + 50*expansions*p4 + 221*p1 + 366*p2 + 585*p3 + 123*p4)/gameTimePerDay)'],
        ],
        [
            'title' => 'gameFinishDate = one_way(startDate + ceil((110.5*p1 + 183*p2 + 292.5*p3 + 61.5*p4 + (25*p1 + 42*p2 + 60*p3 + 25*p4) * expansions) / gameTimePerDay))',
            'results' => ['gameFinishDate' => '(startDate + ceil((1/2)*(50*expansions*p1 + 84*expansions*p2 + 120*expansions*p3 + 50*expansions*p4 + 221*p1 + 366*p2 + 585*p3 + 123*p4)/gameTimePerDay))'],
        ],
        [
            'title' => <<<'TXT'
            readingAndGameDaysTotal = ceil((288*r1 + 366*r2 + 385*r3 + 324*r4 + 337*r5 + 378*r6 + 439*r7 + 540*r8) / (readingSpeed * readingTimePerDay)) + ceil((110.5*p1 + 183*p2 + 292.5*p3 + 61.5*p4 + (25*p1 + 42*p2 + 60*p3 + 25*p4) * expansions) / gameTimePerDay)
            TXT,
            'results' => ['readingAndGameDaysTotal' => <<<'TXT'
            ceil((1/2)*(50*expansions*p1 + 84*expansions*p2 + 120*expansions*p3 + 50*expansions*p4 + 221*p1 + 366*p2 + 585*p3 + 123*p4)/gameTimePerDay) + ceil((288*r1 + 366*r2 + 385*r3 + 324*r4 + 337*r5 + 378*r6 + 439*r7 + 540*r8)/(readingSpeed*readingTimePerDay))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            bothFinishDate = one_way(startDate + ceil((288*r1 + 366*r2 + 385*r3 + 324*r4 + 337*r5 + 378*r6 + 439*r7 + 540*r8) / (readingSpeed * readingTimePerDay)) + ceil((110.5*p1 + 183*p2 + 292.5*p3 + 61.5*p4 + (25*p1 + 42*p2 + 60*p3 + 25*p4) * expansions) / gameTimePerDay))
            TXT,
            'results' => ['bothFinishDate' => <<<'TXT'
            (startDate + ceil((1/2)*(50*expansions*p1 + 84*expansions*p2 + 120*expansions*p3 + 50*expansions*p4 + 221*p1 + 366*p2 + 585*p3 + 123*p4)/gameTimePerDay) + ceil((288*r1 + 366*r2 + 385*r3 + 324*r4 + 337*r5 + 378*r6 + 439*r7 + 540*r8)/(readingSpeed*readingTimePerDay)))
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    /*
     * Shared helpers for the hand-written repairs in data/calc/supplement/.
     *
     * Every supplement script is evaluated in its own closed scope, so anything the
     * repairs have in common has to travel with each one. Supplement::apply()
     * prepends this file to every page script it merges.
     */

    /**
     * The numbers in one free-text box: "1, 2, 3", "1 2 3", "1;2;3" or one per line.
     *
     * A statistics page that asked for fifty separate boxes now asks for one, and
     * the visitor types a list the way they would in a spreadsheet cell. Anything
     * that is not a number is ignored rather than turned into NaN — a stray comma
     * or an accidental letter must not poison the whole set.
     */
    function snumlist(text) {
      if (typeof text !== 'string' || text.trim() === '') return [];
      var out = [];
      text.split(/[\s,;]+/).forEach(function (piece) {
        if (piece === '') return;
        var n = Number(piece.replace(/(\d),(?=\d{3}\b)/g, '$1'));
        if (isFinite(n)) out.push(n);
      });
      return out;
    }

    /** Median of an already sorted array of numbers. */
    function smedian(sorted) {
      var n = sorted.length;
      if (!n) return NaN;
      var mid = Math.floor(n / 2);
      return n % 2 ? sorted[mid] : (sorted[mid - 1] + sorted[mid]) / 2;
    }

    /** The numbers a visitor actually typed, in field order, skipping blanks. */
    function snumbers(values, pattern, limit) {
      var out = [];
      for (var i = 1; i <= limit; i++) {
        var key = pattern.replace('%d', i);
        var raw = values[key];
        if (raw === undefined || raw === null || raw === '') continue;
        var n = Number(raw);
        if (!isFinite(n)) continue;
        out.push({ key: key, n: n });
      }
      return out;
    }

    /** A plain number, no trailing zeros, at most `d` decimals. */
    function snum(n, d) {
      if (!isFinite(n)) return '—';
      var v = Number(n.toFixed(d === undefined ? 4 : d));
      return String(v);
    }

    /** Round to `d` decimals but keep it a number. */
    function sround(n, d) {
      var f = Math.pow(10, d === undefined ? 2 : d);
      return Math.round(n * f) / f;
    }

    /** Greatest common divisor of two whole numbers. */
    function sgcd(x, y) {
      x = Math.abs(Math.round(x));
      y = Math.abs(Math.round(y));
      return y === 0 ? x : sgcd(y, x % y);
    }

    /** "10" / "1/3" — a fraction reduced to lowest terms. */
    function sfrac(part, whole) {
      if (!whole) return '—';
      var a = Math.round(part), b = Math.round(whole);
      var g = sgcd(a, b) || 1;
      if (g > 1) { a = a / g; b = b / g; }
      return b === 1 ? String(a) : a + '/' + b;
    }

    /** Minimal escape for text that came out of the definition or a label. */
    function sesc(s) {
      return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }

    /**
     * A table from a header list and rows of cells. Cells are printed as they are
     * given, so a caller can pass a pre-formatted string.
     */
    function stable(head, rows, foot) {
      var html = '<table><thead><tr>';
      head.forEach(function (h) { html += '<th>' + h + '</th>'; });
      html += '</tr></thead><tbody>';
      rows.forEach(function (r) {
        html += '<tr>';
        r.forEach(function (c) { html += '<td>' + c + '</td>'; });
        html += '</tr>';
      });
      if (foot) {
        html += '<tr>';
        foot.forEach(function (c) { html += '<th>' + c + '</th>'; });
        html += '</tr>';
      }
      return html + '</tbody></table>';
    }

    /** Turn a list of [label, value] pairs into "A: 3, B: 4" style prose. */
    function slist(pairs) {
      return pairs.map(function (p) { return p[0] + ': ' + p[1]; }).join(', ');
    }

    /**
     * Tidy a value a page script published.
     *
     * The harvested scripts speak the reference site's front-end dialect: `==2==`
     * for a subscript, `**bold**`, `<br>` between lines, and often a trailing
     * comma or a dangling colon left where a second half of a sentence used to
     * follow. Our panel prints the string as plain text, so those markers would
     * land on screen as punctuation soup. This turns them into something readable
     * without changing the value itself.
     */
    function sclean(value) {
      var s = value === null || value === undefined ? '' : String(value);
      var sub = {'0': '₀', '1': '₁', '2': '₂', '3': '₃', '4': '₄',
                 '5': '₅', '6': '₆', '7': '₇', '8': '₈', '9': '₉'};
      s = s.replace(/==(\d+)==/g, function (all, d) {
        return d.split('').map(function (c) { return sub[c] || c; }).join('');
      });
      /* the same convention for superscripts: "^^+^^" is a charge, "^^2^^" an index */
      var sup = {'0': '⁰', '1': '¹', '2': '²', '3': '³', '4': '⁴',
                 '5': '⁵', '6': '⁶', '7': '⁷', '8': '⁸', '9': '⁹',
                 '+': '⁺', '-': '⁻'};
      s = s.replace(/\^\^([0-9+-]+)\^\^/g, function (all, d) {
        return d.split('').map(function (c) { return sup[c] || c; }).join('');
      });
      s = s.replace(/\*\*(.+?)\*\*/g, '$1');
      s = s.replace(/<br\s*\/?>/gi, ' ');
      s = s.replace(/<\/(p|div|li)>/gi, ' ');
      s = s.replace(/<[^>]+>/g, '');
      s = s.replace(/&nbsp;/g, ' ').replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&amp;/g, '&');
      /* invisible characters the reference used as "this line is blank": an Arabic
         letter mark, a zero-width space, a byte-order mark. They render as nothing
         and would otherwise keep an empty row looking filled. */
      s = s.replace(/[\u061C\u200B\u200C\u200D\uFEFF\u00AD]/g, '');
      s = s.replace(/\s+/g, ' ').trim();
      s = s.replace(/[,;:\-–—]\s*$/, '').trim();
      return s;
    }

    /**
     * Turn a drop-down option's id back into its label.
     *
     * Several harvested scripts publish `ctx.getRawInput("…")` of a select, which
     * is the option's uid (`z3nTqAbVhlMSz-B46c7Xk`) and not the words the visitor
     * picked. The uid is in the page markup as an option value or a radio value,
     * so the label is one lookup away.
     */
    function sdelabel(value) {
      if (typeof value !== 'string' || !/[A-Za-z0-9_-]{20,28}/.test(value)) { return value; }
      var one = function (id) {
        if (!/^[A-Za-z0-9_-]{20,28}$/.test(id)) { return id; }
        var el = document.querySelector('[value="' + id + '"]');
        if (!el) { return id; }
        if (el.tagName === 'OPTION') { return (el.textContent || '').trim() || id; }
        var lab = el.closest ? el.closest('label') : null;
        return lab ? ((lab.textContent || '').trim() || id) : id;
      };
      /* a published value can be several ids joined by commas ("Possibilities,
         MD4, NTLM"), so map each piece rather than the whole string */
      return value.split(/\s*,\s*/).map(one).join(', ');
    }

    omni.onResult([], function (ctx, values) {
      var mode = Number(values.whatYouWannaDo);
      var derived = [];
      for (var i = 1; i <= 8; i++) derived.push('readingDays' + i);
      for (var j = 1; j <= 5; j++) {
        derived.push('gameHours' + j, 'gameDays' + j);
      }
      derived.push('readingDaysTotal', 'readingFinishDate', 'gameDaysTotal',
        'gameFinishDate', 'readingAndGameDaysTotal', 'bothFinishDate',
        'seriesDays', 'seriesFinishDate');
      derived.forEach(function (name) { ctx.exportValue(name, null); });

      var start = Number(values.startDate);
      function finish(name, days) {
        if (isFinite(start) && start > 0) {
          ctx.exportValue(name, start + days * 86400000);
        }
      }
      function daysForBooks() {
        var rate = Number(values.readingSpeedOptions);
        var pagesPerMinute = { 1: 0.25, 2: 0.5, 3: 1 }[rate];
        if (rate === 0) {
          var custom = Number(values.readingSpeed);
          if (custom > 0) {
            pagesPerMinute = custom;
            ctx.addHtml('<p class="calc-note">Custom rate is interpreted as pages per minute; its unit selector is ignored.</p>');
          }
        }
        var minutesPerDay = Number(values.readingTimePerDay);
        var minuteFactors = { sec: 1 / 60, min: 1, hrs: 60, days: 1440,
          wk: 10080, wks: 10080, mos: 43829.1, yrs: 525949.2 };
        minutesPerDay *= minuteFactors[ctx.getUnit('readingTimePerDay')] || 1;
        var order = Number(values.orderOfReading);
        var pages = order === 3 ? 288 + 385
          : order === 4 ? 324 + 337 + 378 + 439 + 540
          : 288 + 366 + 385 + 324 + 337 + 378 + 439 + 540;
        if (!(pagesPerMinute > 0 && minutesPerDay > 0 && pages > 0)) return null;
        return Math.ceil(pages / (pagesPerMinute * minutesPerDay));
      }
      function gamePlan() {
        var style = Math.round(Number(values.playStyle));
        var hoursByStyle = {
          1: [35.5, 24, 51, 10, 15],
          2: [46, 34, 103, 14, 28],
          3: [64.5, 54, 174, 19, 41],
          4: [24.5, 16, 21, 10, 15]
        }[style];
        var hoursPerDay = Number(values.gameTimePerDay);
        var hourFactors = { sec: 1 / 3600, min: 1 / 60, hrs: 1, days: 24,
          wk: 168, wks: 168, mos: 730.485, yrs: 8765.82 };
        hoursPerDay *= hourFactors[ctx.getUnit('gameTimePerDay')] || 1;
        if (!hoursByStyle || !(hoursPerDay > 0)) return null;
        var includeExpansions = Number(values.expansions) === 1;
        var totalHours = hoursByStyle[0] + hoursByStyle[1] + hoursByStyle[2];
        for (var k = 0; k < 5; k++) {
          var gameHours = k < 3 || includeExpansions ? hoursByStyle[k] : null;
          if (gameHours === null) {
            ctx.exportValue('gameHours' + (k + 1), null);
            ctx.exportValue('gameDays' + (k + 1), null);
            continue;
          }
          ctx.exportValue('gameHours' + (k + 1), gameHours);
          var gameDays = Math.ceil(gameHours / hoursPerDay);
          ctx.exportValue('gameDays' + (k + 1), gameDays);
          if (k >= 3) totalHours += gameHours;
        }
        return Math.ceil(totalHours / hoursPerDay);
      }

      if (mode === 1 || mode === 3) {
        var readingDays = daysForBooks();
        if (readingDays !== null) {
          if (mode === 1) {
            ctx.exportValue('readingDaysTotal', readingDays);
            finish('readingFinishDate', readingDays);
          } else {
            ctx.exportValue('readingDaysTotal', readingDays);
          }
        }
      }
      if (mode === 2 || mode === 3) {
        var gamingDays = gamePlan();
        if (gamingDays !== null) {
          if (mode === 2) {
            ctx.exportValue('gameDaysTotal', gamingDays);
            finish('gameFinishDate', gamingDays);
          } else {
            ctx.exportValue('gameDaysTotal', gamingDays);
          }
        }
      }
      if (mode === 3 && readingDays !== null && gamingDays !== null) {
        var combinedDays = readingDays + gamingDays;
        ctx.exportValue('readingAndGameDaysTotal', combinedDays);
        finish('bothFinishDate', combinedDays);
      }
      if (mode === 4) {
        var episodesPerDay = Number(values.episodesPerDay);
        var extra = Number(values.Vesemir) === 1 ? 1 : 0;
        if (episodesPerDay > 0) {
          var series = Math.ceil((8 + extra) / episodesPerDay);
          ctx.exportValue('seriesDays', series);
          finish('seriesFinishDate', series);
        }
      }
    });
    TXT,
    'showIf' => [
        'readingSpeedOptions' => 'whatYouWannaDo == 1 or whatYouWannaDo == 3',
        'readingSpeed' => 'readingSpeedOptions == 0',
        'readingTimePerDay' => 'whatYouWannaDo == 1 or whatYouWannaDo == 3',
        'orderOfReading' => 'whatYouWannaDo == 1 or whatYouWannaDo == 3',
        'readingAndGameOrder' => 'whatYouWannaDo == 3',
        'playStyle' => 'whatYouWannaDo == 2 or whatYouWannaDo == 3',
        'expansions' => 'whatYouWannaDo == 2 or whatYouWannaDo == 3',
        'gameTimePerDay' => 'whatYouWannaDo == 2 or whatYouWannaDo == 3',
        'episodesPerDay' => 'whatYouWannaDo == 4',
        'Vesemir' => 'whatYouWannaDo == 4',
    ],
    'article' => [
        'intro' => 'The Witcher calculator takes the numbers you enter and reports <strong>series days</strong> immediately.',
        'sections' => [
            ['title' => 'How does the The Witcher calculator work?', 'html' => <<<'TXT'
            <p>The Witcher calculator takes the values in the form, applies the relationship described below and reports <strong>series days</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the reading speed, the order of reading and your play style); then you give the dates it asks for; then you type in the gaming time.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 4 options, such as books, games and books and games. </li><li>Pick the option that matches your case — 3 options, such as the optimal experience, books first and games first. </li><li>A calendar date. Use the picker; the answer is recalculated the moment the date changes, and the count is done date-to-date rather than by subtracting timestamps.</li><li>Pick the option that matches your case — 4 options, such as slow (1/4 of a page per min), normal (1/2 of a page per min) and fast (1 page per minute). </li><li>A measured quantity, entered by default in hours. The unit chip switches it to any of the 27 supported units.</li><li>Pick the option that matches your case — 4 options, such as publication order, chronological order and short stories only. </li><li>Pick the option that matches your case — 4 options, such as main story only, balanced and completist. </li><li>A single on/off switch — tick it for &ldquo;You want to include expansion packs&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li><li>A measured quantity, entered by default in hours. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in days. The unit chip switches it to any of the 27 supported units.</li><li>A single on/off switch — tick it for &ldquo;Include "Nightmare of the Wolf"&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li></ul><p>7 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Reading speed</strong></td><td>One of 4 options, such as slow (1/4 of a page per min), normal (1/2 of a page per min) and fast (1 page per minute).</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Order of reading</strong></td><td>One of 4 options, such as publication order, chronological order and short stories only.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Your play style</strong></td><td>One of 4 options, such as main story only, balanced and completist.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Gaming time</strong></td><td>A measured quantity, 27 units available.</td><td>hours</td><td>You supply it</td></tr><tr><td><strong>Reading days 1</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>Reading days 2</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>Reading days 3</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>Reading days 4</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>Reading days 5</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>Reading days 6</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>Reading days 7</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>Reading days 8</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>Reading days total</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Reading finish date</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Game hours 1</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Game days 1</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Game hours 2</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Game days 2</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Game hours 3</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Game days 3</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Game hours 4</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Game days 4</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Game hours 5</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Game days 5</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table><p>The table lists the first 24 of 30 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'The formula behind the The Witcher calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Series days</span><span class="formula-eq">=</span><span class="formula-rhs">rounded up, ((vesemir + 8) ÷ I will watch)</span></div><div class="formula-row"><span class="formula-lhs">Series finish date</span><span class="formula-eq">=</span><span class="formula-rhs">(I will start on + rounded up, ((vesemir + 8) ÷ I will watch))</span></div><div class="formula-row"><span class="formula-lhs">Reading days 1</span><span class="formula-eq">=</span><span class="formula-rhs">(288 ÷ (you can read up to... × how much time do you read?))</span></div><div class="formula-row"><span class="formula-lhs">Reading days 2</span><span class="formula-eq">=</span><span class="formula-rhs">(366 ÷ (you can read up to... × how much time do you read?))</span></div><div class="formula-row"><span class="formula-lhs">Reading days 3</span><span class="formula-eq">=</span><span class="formula-rhs">(385 ÷ (you can read up to... × how much time do you read?))</span></div><div class="formula-row"><span class="formula-lhs">Reading days 4</span><span class="formula-eq">=</span><span class="formula-rhs">(324 ÷ (you can read up to... × how much time do you read?))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in days, and convertible to any of the 27 units on that chip.</li><li>A calendar date.</li><li>Shown in days, and convertible to any of the 27 units on that chip.</li><li>Shown in days, and convertible to any of the 27 units on that chip.</li><li>Shown in days, and convertible to any of the 27 units on that chip.</li><li>Shown in days, and convertible to any of the 27 units on that chip.</li><li>Shown in days, and convertible to any of the 27 units on that chip.</li><li>Shown in days, and convertible to any of the 27 units on that chip.</li><li>Shown in days, and convertible to any of the 27 units on that chip.</li><li>Shown in days, and convertible to any of the 27 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A calendar date.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in hours</li><li>Time, opening in hours</li><li>Time, opening in hours</li><li>Time, opening in days</li><li>Time, opening in days</li><li>Time, opening in days</li><li>Time, opening in days</li><li>Time, opening in days</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Witcher calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/leap-year">Leap year</a>, <a href="/everyday-life/led-savings">LED savings</a> and <a href="/everyday-life/lighting">Lighting</a>.</p>
            TXT],
            ['title' => 'A worked example with these formulas', 'html' => <<<'TXT'
            <p> Enter I&#039;m interested in... = 1, I want to go for... = 1, Reading speed = 2, How much time do you read? = 1, Order of reading = 1, Your play style = 2, expansions = 0, Gaming time = 2, I will watch... = 1 and Vesemir = 1. The calculator returns <strong>Gaming days</strong> = 0 and <strong>Series days</strong> = 6.718e+1.</p><p>The relationship behind those numbers is <strong>Series days</strong> = <code>ceil((Vesemir + 8)/episodesPerDay)</code>. </p>
            TXT],
            ['title' => 'Planning with the estimate', 'html' => <<<'TXT'
            <p>Choose the activity and order that match the experience you want before entering a pace. The Witcher page can combine books, games or episodes, and the selected order affects which material is included and when each item is placed in the plan. A start date and daily reading or viewing time turn that list into an estimated finish date. If you are interested only in a subset, choose the matching option rather than assuming every title is included.</p><p>Reading speed is an average, not a fixed personal trait. Technical notes, dialogue, unfamiliar names and interruptions change pace; a pages-per-minute value measured on one chapter may not fit every book. For games, the time depends heavily on side quests, difficulty and exploration. Episode runtime is more stable, but breaks and recaps still add time. Use the result as a flexible itinerary, not a deadline.</p><p>To make the timeline more realistic, compare a few scenarios: a shorter daily session, a weekend-only schedule or a faster/slower reading pace. Change one setting at a time so it is clear what moves the finish date. The calculator does not know about holidays, missed days, new releases or how much of a game you choose to complete. Revisit the inputs when your routine changes, and treat any estimated finish date as conditional on maintaining that routine.</p><p>If your chosen order differs from a publication or chronological order, use the label that best describes it and check the included items. Adaptations and editions can vary in chapter structure and page count. The page’s time estimate is therefore a planning aid based on its own list and your pace, not an official reading prescription or a claim that one order is the only correct way to experience the series.</p>
            TXT],
            ['title' => 'Making the schedule realistic', 'html' => <<<'TXT'
            <p>A finish date is only meaningful if the chosen reading speed and daily time are sustainable. A pages-per-minute value varies with font size, translation, dialogue, notes and how often you pause. If you do not know your pace, time a representative chapter and use that average. Then compare a weekday routine with a lighter week that includes missed sessions.</p><p>The page may combine reading with games or episodes, each of which has different time assumptions. A completion estimate for a game can vary dramatically with side quests and exploration, while a book estimate depends on the edition and whether supplemental material is included. Confirm the selected interest and order options, then treat the results as a conditional plan rather than a promise.</p><p>Use the date as a checkpoint: if the planned finish slips, update the daily time or remove items you no longer intend to complete. The tool does not account for holidays, interruptions, new releases or changes in preference. A flexible schedule is more useful than forcing a plan that no longer matches how you want to experience the series.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the The Witcher calculator?', 'a' => 'The form asks for a few values, which is 11 fields in total.'],
            ['q' => 'Can I enter you can read up to... in a different unit?', 'a' => 'Yes. You can read up to opens in hours and the chip beside it offers 27 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports You can read up to = 0 hrs.'],
        ],
        'related' => [
            ['path' => '/everyday-life/leap-year', 'name' => 'Leap year'],
            ['path' => '/everyday-life/led-savings', 'name' => 'LED savings'],
            ['path' => '/everyday-life/lighting', 'name' => 'Lighting'],
        ],
    ],
];
