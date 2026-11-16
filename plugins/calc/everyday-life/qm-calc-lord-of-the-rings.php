<?php

/**
 * Lord of the Rings
 * /everyday-life/lord-of-the-rings
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lord of the Rings',
    'meta' => ['title' => 'Lord of the Rings: Formula, Steps & Results', 'description' => 'Lord of the Rings takes i\'m interested in..., preferred order and i will start on and returns book1 and book2. The formula is printed in the form\'s own words.', 'h1' => 'Lord of the Rings Calculator', 'updated' => '2026-08-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Amazon's LotR series  is the talk of the town! Use this tool to prepare yourself for joining in on the discussions. Love it  or hate it , you just can't ignore it!
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'lord_of_the_rings/Gandalf_Quote.jpg'],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest',
                            'label' => 'I\'m interested in...',
                            'type' => 'select',
                            'options' => ['Books ' => '1', 'Movies ' => '2', 'Both  ' => '3'],
                            'dataset' => 'interest_vs',
                            'default' => 'Books ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'combined_order',
                            'label' => 'Preferred order',
                            'type' => 'select',
                            'options' => ['Books first' => '1', 'Movies first' => '0'],
                            'dataset' => 'combined_order_vs',
                            'default' => 'Books first',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'start_date', 'label' => 'I will start on', 'type' => 'date'],
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
                            'name' => 'reading_speed_description',
                            'label' => 'My reading speed is',
                            'type' => 'select',
                            'options' => ['Slow' => '0.25', 'Normal' => '0.5', 'Fast' => '1', 'Enter custom reading speed' => ''],
                            'dataset' => 'reading_speed_vs',
                            'default' => 'Normal',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'reading_speed',
                            'label' => 'Which translates to',
                            'type' => 'result',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_per_day',
                            'label' => 'I read for about',
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
                            'name' => 'reading_order',
                            'label' => 'Reading order',
                            'type' => 'select',
                            'options' => ['Publication order' => '1', 'Chronological order' => '2', 'LotR trilogy only' => '3', 'Hobbit + LotR trilogy' => '4'],
                            'dataset' => 'order_vs',
                            'control' => 'DROPDOWN',
                            'default' => 'Publication order',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => '(reading_order == 1 or reading_order == 2) and finishAllBy < date_today', 'text' => <<<'TXT'
                                You need {{daysNeededToReadAll.formattedValue}} days for your LotR reading experience. It means that you would have already finished it by {{finishAllBy.formattedValue}}!
                                TXT],
                                ['when' => '(reading_order == 1 or reading_order == 2) and finishAllBy == date_today', 'text' => 'You need {{daysNeededToReadAll.formattedValue}} days for your LotR reading experience. It means that you will finish it TODAY !'],
                                ['when' => '(reading_order == 1 or reading_order == 2) and finishAllBy > date_today', 'text' => 'You need {{daysNeededToReadAll.formattedValue}} days for your LotR reading experience. It means that you will finish by {{finishAllBy.formattedValue}}.'],
                                ['when' => 'reading_order == 3 and finishAllBy < date_today', 'text' => <<<'TXT'
                                You need {{daysNeededToRead3.formattedValue}} days for your LotR reading experience. It means that you would have already finished it by {{finish3By.formattedValue}}!
                                TXT],
                                ['when' => 'reading_order == 3 and finishAllBy == date_today', 'text' => 'You need {{daysNeededToRead3.formattedValue}} days for your LotR reading experience. It means that you will finish it TODAY !'],
                                ['when' => 'reading_order == 3 and finishAllBy > date_today', 'text' => 'You need {{daysNeededToRead3.formattedValue}} days for your LotR reading experience. It means that you will finish by {{finish3By.formattedValue}}.'],
                                ['when' => 'reading_order == 4 and finishAllBy < date_today', 'text' => <<<'TXT'
                                You need {{daysNeededToRead4.formattedValue}} days for your LotR reading experience. It means that you would have already finished it by {{finish4By.formattedValue}}!
                                TXT],
                                ['when' => 'reading_order == 4 and finishAllBy == date_today', 'text' => 'You need {{daysNeededToRead4.formattedValue}} days for your LotR reading experience. It means that you will finish it TODAY !'],
                                ['when' => 'reading_order == 4 and finishAllBy > date_today', 'text' => 'You need {{daysNeededToRead4.formattedValue}} days for your LotR reading experience. It means that you will finish by {{finish4By.formattedValue}}.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Movies',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'watching_style',
                            'label' => 'My watching style is...',
                            'type' => 'select',
                            'options' => ['binge-watching' => '1', 'setting time aside everyday' => '2'],
                            'dataset' => 'watching_style_vs',
                            'default' => 'binge-watching',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'watch_time_per_day',
                            'label' => 'I\'ll watch for about',
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
                            'name' => 'movie_break',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Need breaks during the marathon? ' => '1', '' => '0'],
                            'dataset' => 'breaks',
                            'control' => 'CHECKBOX',
                            'help' => 'Includes snack/bathroom breaks, but does not include sleep.',
                            'default' => 'Need breaks during the marathon? ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'watching_order',
                            'label' => 'I prefer...',
                            'type' => 'select',
                            'options' => ['Release order' => '1', 'Chronological order' => '2', 'The LotR trilogy only' => '3', 'The Hobbit trilogy only' => '4'],
                            'dataset' => 'watching_order_vs',
                            'control' => 'DROPDOWN',
                            'default' => 'Release order',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'extended',
                            'label' => 'I\'d like to watch...',
                            'type' => 'select',
                            'options' => ['extended editions' => '1', 'theatrical editions' => '2'],
                            'dataset' => 'extended_vs',
                            'help' => 'How deep are you in the LotR lore?',
                            'default' => 'extended editions',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'watching_style == 1', 'text' => 'You need {{daysNeeded.formattedValue}} day for your LotR watching experience. It means that you will finish by {{moviesfinishBy.formattedValue}}.'],
                                ['when' => 'watching_style == 2 and moviesfinishBy < date_today', 'text' => <<<'TXT'
                                You need {{daysNeeded.formattedValue}} days for your LotR watching experience. It means that you would have already finished it by {{moviesfinishBy.formattedValue}}! &nbsp;
                                TXT],
                                ['when' => 'watching_style == 2 and moviesfinishBy == date_today', 'text' => 'You need {{daysNeeded.formattedValue}} days for your LotR watching experience. It means that you will finish it TODAY !&nbsp;'],
                                ['when' => 'watching_style == 2 and moviesfinishBy > date_today', 'text' => 'You need {{daysNeeded.formattedValue}} days for your LotR watching experience. It means that you will finish by {{moviesfinishBy.formattedValue}}.&nbsp;'],
                                ['when' => 'watching_style == 1 and movie_break == 1', 'text' => 'This includes a refueling  time of {{includeBreaks.formattedValue}} minutes during the movie marathon.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Reading order',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'reading_order == 1', 'text' => <<<'TXT'
                                The Hobbit - 304 pages, {{book1.formattedValue}} days of reading. The Fellowship of the Ring - 479 pages, {{book2.formattedValue}} days of reading. The Two Towers - 415 pages, {{book3.formattedValue}} days of reading. The Return of the King - 347 pages, {{book4.formattedValue}} days of reading. The Silmarillion - 365 pages, {{book5.formattedValue}} days of reading. Unfinished Tales of Numenor and
                                TXT],
                                ['when' => 'reading_order == 2', 'text' => <<<'TXT'
                                The Silmarillion - 365 pages, {{book5.formattedValue}} days of reading. Beren and Lúthien - 288 pages, {{book8.formattedValue}} days of reading. The Children of Húrin - 320 pages, {{book7.formattedValue}} days of reading. The Fall of Gondolin - 304 pages, {{book9.formattedValue}} days of reading. Unfinished Tales of Numenor and Middle-earth - 472 pages, {{book6.formattedValue}} days of reading. Th
                                TXT],
                                ['when' => 'reading_order == 3', 'text' => <<<'TXT'
                                The Fellowship of the Ring - 479 pages, {{book2.formattedValue}} days of reading. The Two Towers - 415 pages, {{book3.formattedValue}} days of reading. The Return of the King - 347 pages, {{book4.formattedValue}} days of reading.
                                TXT],
                                ['when' => 'reading_order == 4', 'text' => <<<'TXT'
                                The Hobbit - 304 pages, {{book1.formattedValue}} days of reading. The Fellowship of the Ring - 479 pages, {{book2.formattedValue}} days of reading. The Two Towers - 415 pages, {{book3.formattedValue}} days of reading. The Return of the King - 347 pages, {{book4.formattedValue}} days of reading.
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Watching order',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/lord_of_the_rings/poster_1.jpg'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/lord_of_the_rings/poster_4.jpg'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/lord_of_the_rings/poster_2.jpg'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/lord_of_the_rings/poster_5.jpg'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/lord_of_the_rings/poster_3.jpg'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/lord_of_the_rings/poster_6.jpg'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/lord_of_the_rings/poster_4.jpg'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/lord_of_the_rings/poster_1.jpg'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/lord_of_the_rings/poster_5.jpg'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/lord_of_the_rings/poster_2.jpg'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/lord_of_the_rings/poster_6.jpg'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/lord_of_the_rings/poster_3.jpg'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Reading order',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'reading_order == 1', 'text' => <<<'TXT'
                                The Hobbit - 304 pages, {{book1.formattedValue}} days of reading. The Fellowship of the Ring - 479 pages, {{book2.formattedValue}} days of reading. The Two Towers - 415 pages, {{book3.formattedValue}} days of reading. The Return of the King - 347 pages, {{book4.formattedValue}} days of reading. The Silmarillion - 365 pages, {{book5.formattedValue}} days of reading. Unfinished Tales of Numenor and
                                TXT],
                                ['when' => 'reading_order == 2', 'text' => <<<'TXT'
                                The Silmarillion - 365 pages, {{book5.formattedValue}} days of reading. Beren and Lúthien - 288 pages, {{book8.formattedValue}} days of reading. The Children of Húrin - 320 pages, {{book7.formattedValue}} days of reading. The Fall of Gondolin - 304 pages, {{book9.formattedValue}} days of reading. Unfinished Tales of Numenor and Middle-earth - 472 pages, {{book6.formattedValue}} days of reading. Th
                                TXT],
                                ['when' => 'reading_order == 3', 'text' => <<<'TXT'
                                The Fellowship of the Ring - 479 pages, {{book2.formattedValue}} days of reading. The Two Towers - 415 pages, {{book3.formattedValue}} days of reading. The Return of the King - 347 pages, {{book4.formattedValue}} days of reading.
                                TXT],
                                ['when' => 'reading_order == 4', 'text' => <<<'TXT'
                                The Hobbit - 304 pages, {{book1.formattedValue}} days of reading. The Fellowship of the Ring - 479 pages, {{book2.formattedValue}} days of reading. The Two Towers - 415 pages, {{book3.formattedValue}} days of reading. The Return of the King - 347 pages, {{book4.formattedValue}} days of reading.
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Books detail (hidden)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'date_today', 'label' => 'Today\'s date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'book1',
                            'label' => 'Book1',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'book2',
                            'label' => 'Book2',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'book3',
                            'label' => 'Book3',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'book4',
                            'label' => 'Book4',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'book5',
                            'label' => 'Book5',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'book6',
                            'label' => 'Book6',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'book7',
                            'label' => 'Book7',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'book8',
                            'label' => 'Book8',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'book9',
                            'label' => 'Book9',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'daysNeededToReadAll',
                            'label' => 'Days needed to read',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'finishAllBy', 'label' => 'Finish by', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'daysNeededToRead3',
                            'label' => 'Days needed to read3',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'finish3By', 'label' => 'Finish3 by', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'daysNeededToRead4',
                            'label' => 'Days needed to read4',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'finish4By', 'label' => 'Finish4 by', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pages_per_day',
                            'label' => 'Pages per day',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Movies detail (hidden)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'includeBreaks',
                            'label' => 'Include breaks',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalTime',
                            'label' => 'Total time',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalMinutes',
                            'label' => 'totalMinutes',
                            'type' => 'result',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lordMinutes',
                            'label' => 'lordMinutes',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lordOnly',
                            'label' => 'lordOnly',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hobbitMinutes',
                            'label' => 'Hobbit minutes',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hobbitOnly',
                            'label' => 'Hobbit only',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'daysNeeded',
                            'label' => 'Days needed',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'moviesfinishBy', 'label' => 'Moviesfinish by', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cancelTime',
                            'label' => 'cancelTime',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'binge_watch_time',
                            'label' => 'binge_watch_time',
                            'type' => 'result',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'pages_per_day = time_per_day * reading_speed',
            'results' => ['pages_per_day' => 'reading_speed*time_per_day', 'reading_speed' => 'pages_per_day/time_per_day', 'time_per_day' => 'pages_per_day/reading_speed'],
        ],
        [
            'title' => 'book1 = 304 /pages_per_day ',
            'results' => ['pages_per_day' => '304/book1', 'book1' => '304/pages_per_day'],
        ],
        [
            'title' => 'book2 = 479 /pages_per_day ',
            'results' => ['book2' => '479/pages_per_day', 'pages_per_day' => '479/book2'],
        ],
        [
            'title' => 'book3 = 415 /pages_per_day ',
            'results' => ['pages_per_day' => '415/book3', 'book3' => '415/pages_per_day'],
        ],
        [
            'title' => 'book4 = 347 /pages_per_day ',
            'results' => ['pages_per_day' => '347/book4', 'book4' => '347/pages_per_day'],
        ],
        [
            'title' => 'book5 = 365 /pages_per_day ',
            'results' => ['pages_per_day' => '365/book5', 'book5' => '365/pages_per_day'],
        ],
        [
            'title' => 'book6 = 472 /pages_per_day ',
            'results' => ['book6' => '472/pages_per_day', 'pages_per_day' => '472/book6'],
        ],
        [
            'title' => 'book7 = 320 /pages_per_day ',
            'results' => ['pages_per_day' => '320/book7', 'book7' => '320/pages_per_day'],
        ],
        [
            'title' => 'book8 = 288 /pages_per_day ',
            'results' => ['pages_per_day' => '288/book8', 'book8' => '288/pages_per_day'],
        ],
        [
            'title' => 'book9 = 304/pages_per_day ',
            'results' => ['pages_per_day' => '304/book9', 'book9' => '304/pages_per_day'],
        ],
        [
            'title' => 'daysNeededToReadAll = ceil(3294/pages_per_day)',
            'results' => ['daysNeededToReadAll' => 'ceil(3294/pages_per_day)'],
        ],
        [
            'title' => 'daysNeededToRead3 = ceil(1241/pages_per_day)',
            'results' => ['daysNeededToRead3' => 'ceil(1241/pages_per_day)'],
        ],
        [
            'title' => 'daysNeededToRead4 = ceil(1545/pages_per_day)',
            'results' => ['daysNeededToRead4' => 'ceil(1545/pages_per_day)'],
        ],
        [
            'title' => 'finishAllBy = ceil(daysNeededToReadAll + start_date)',
            'results' => ['finishAllBy' => 'ceil(start_date + ceil(3294/pages_per_day))'],
        ],
        [
            'title' => 'finish3By = ceil(daysNeededToRead3 + start_date)',
            'results' => ['finish3By' => 'ceil(start_date + ceil(1241/pages_per_day))'],
        ],
        [
            'title' => 'finish4By = ceil(daysNeededToRead4 + start_date)',
            'results' => ['finish4By' => 'ceil(start_date + ceil(1545/pages_per_day))'],
        ],
        [
            'title' => 'includeBreaks = ((totalMinutes - (lordMinutes * lordOnly) - (hobbitMinutes * hobbitOnly)) * 15 / 240)',
            'results' => [
                'lordOnly' => '(-hobbitMinutes*hobbitOnly - 16*includeBreaks + totalMinutes)/lordMinutes',
                'hobbitOnly' => '(-16*includeBreaks - lordMinutes*lordOnly + totalMinutes)/hobbitMinutes',
                'hobbitMinutes' => '(-16*includeBreaks - lordMinutes*lordOnly + totalMinutes)/hobbitOnly',
                'lordMinutes' => '(-hobbitMinutes*hobbitOnly - 16*includeBreaks + totalMinutes)/lordOnly',
                'totalMinutes' => 'hobbitMinutes*hobbitOnly + 16*includeBreaks + lordMinutes*lordOnly',
                'includeBreaks' => '-1/16*hobbitMinutes*hobbitOnly - 1/16*lordMinutes*lordOnly + (1/16)*totalMinutes',
            ],
        ],
        [
            'title' => 'totalTime = round(totalMinutes - (lordMinutes * lordOnly)  - (hobbitMinutes * hobbitOnly) + movie_break * includeBreaks)',
            'results' => ['totalTime' => 'round(-hobbitMinutes*hobbitOnly + includeBreaks*movie_break - lordMinutes*lordOnly + totalMinutes)'],
        ],
        [
            'title' => 'daysNeeded = ceil((totalMinutes - (lordMinutes * lordOnly) - (hobbitMinutes * hobbitOnly)) /(watch_time_per_day * cancelTime + binge_watch_time))',
            'results' => ['daysNeeded' => 'ceil((-hobbitMinutes*hobbitOnly - lordMinutes*lordOnly + totalMinutes)/(binge_watch_time + cancelTime*watch_time_per_day))'],
        ],
        [
            'title' => 'moviesfinishBy = round(daysNeeded + start_date)',
            'results' => ['moviesfinishBy' => 'round(start_date + ceil((-hobbitMinutes*hobbitOnly - lordMinutes*lordOnly + totalMinutes)/(binge_watch_time + cancelTime*watch_time_per_day)))'],
        ],
    ],
    'article' => [
        'intro' => 'Supply the I read for about and the I\'ll watch for about and the Lord of the Rings calculator solves for <strong>pages per day</strong>.',
        'sections' => [
            ['title' => 'How does the Lord of the Rings calculator work?', 'html' => <<<'TXT'
            <p>The Lord of the Rings calculator takes the values in the form, applies the relationship described below and reports <strong>pages per day</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the preferred order and the reading order); then you give the today's date; then you type in the I read for about, the I'll watch for about and include breaks.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 3 options, such as books, movies and both. </li><li>Pick the option that matches your case — 2 options, such as books first and movies first. </li><li>A calendar date. Use the picker; the answer is recalculated the moment the date changes, and the count is done date-to-date rather than by subtracting timestamps.</li><li>Pick the option that matches your case — 4 options, such as slow, normal and fast. </li><li>A measured quantity, entered by default in hours. The unit chip switches it to any of the 27 supported units.</li><li>Pick the option that matches your case — 4 options, such as publication order, chronological order and lotR trilogy only. </li><li>Pick the option that matches your case — 2 options, such as binge-watching and setting time aside everyday. </li><li>A measured quantity, entered by default in hours. The unit chip switches it to any of the 27 supported units.</li><li>A single on/off switch — tick it for &ldquo;Need breaks during the marathon?&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li><li>Pick the option that matches your case — 4 options, such as release order, chronological order and the LotR trilogy only. </li><li>Pick the option that matches your case — 2 options, such as extended editions and theatrical editions. </li><li>A calendar date. Use the picker; the answer is recalculated the moment the date changes, and the count is done date-to-date rather than by subtracting timestamps.</li><li>A measured quantity, entered by default in minutes. The unit chip switches it to any of the 27 supported units.</li></ul><p>8 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Preferred order</strong></td><td>One of 2 options, such as books first and movies first.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>I read for about</strong></td><td>A measured quantity, 27 units available.</td><td>hours</td><td>You supply it</td></tr><tr><td><strong>Reading order</strong></td><td>One of 4 options, such as publication order, chronological order and lotR trilogy only.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>I'll watch for about</strong></td><td>A measured quantity, 27 units available.</td><td>hours</td><td>You supply it</td></tr><tr><td><strong>Today's date</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr><tr><td><strong>Days needed to read</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Days needed to read 3</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Days needed to read 4</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Pages per day</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Include breaks</strong></td><td>A measured quantity, 27 units available.</td><td>minutes</td><td>You supply it</td></tr><tr><td><strong>Total time</strong></td><td>A measured quantity, 27 units available.</td><td>minutes</td><td>Calculated</td></tr><tr><td><strong>Total minutes</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>Lord minutes</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Lord only</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Hobbit minutes</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Hobbit only</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Days needed</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>Cancel time</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Lord of the Rings calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Pages per day</span><span class="formula-eq">=</span><span class="formula-rhs">which translates to × I read for about</span></div><div class="formula-row"><span class="formula-lhs">Pages per day</span><span class="formula-eq">=</span><span class="formula-rhs">304 ÷ book1</span></div><div class="formula-row"><span class="formula-lhs">Book 2</span><span class="formula-eq">=</span><span class="formula-rhs">479 ÷ pages per day</span></div><div class="formula-row"><span class="formula-lhs">Pages per day</span><span class="formula-eq">=</span><span class="formula-rhs">415 ÷ book3</span></div><div class="formula-row"><span class="formula-lhs">Pages per day</span><span class="formula-eq">=</span><span class="formula-rhs">347 ÷ book4</span></div><div class="formula-row"><span class="formula-lhs">Pages per day</span><span class="formula-eq">=</span><span class="formula-rhs">365 ÷ book5</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in minutes</li><li>Time, opening in hours</li><li>Time, opening in hours</li><li>Time, opening in minutes</li><li>Time, opening in minutes</li><li>Time, opening in days</li><li>Time, opening in days</li><li>Time, opening in hours</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Lord of the Rings calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 2 figures keep coming back — the I read for about and the I'll watch for about — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/binge-watching">Quarantine binge watching</a>, <a href="/everyday-life/birth-from-death-date">Birth from death date</a> and <a href="/everyday-life/birth-year">Birth year</a>.</p>
            TXT],
            ['title' => 'A worked example with these formulas', 'html' => <<<'TXT'
            <p> Enter I&#039;m interested in... = 1, Preferred order = 1, My reading speed is = 0.5, Reading order = 1, My watching style is... = 1, I&#039;ll watch for about = 1, movie_break = 1, I prefer... = 1 and I&#039;d like to watch... = 1. The calculator returns <strong>Include breaks</strong> = 0 and <strong>Total time</strong> = 0.</p><p>The relationship behind those numbers is <strong>Pages per day</strong> = <code>reading_speed × time_per_day</code>. </p>
            TXT],
            ['title' => 'Planning with the estimate', 'html' => <<<'TXT'
            <p>Start by deciding whether the plan should include books, films or both, then select a preferred order. Publication order, chronological order and a combined order can produce different sequences and therefore different completion dates. Enter the start date and a realistic reading or watching pace. A daily time allowance should represent the time you actually expect to set aside, not every free hour in an ideal week.</p><p>Book page counts vary by edition, type size, appendices and whether companion works are included. Reading speed also changes with dialogue, maps, notes and unfamiliar names. Film runtimes are easier to measure, but pauses, credits and breaks extend an at-home session. If you plan a marathon, treat the calculated duration as screen time rather than a practical recommendation to watch continuously.</p><p>Use the estimate to build a flexible schedule. For example, compare a short weekday session with a longer weekend session, or remove an item you do not plan to include. Keep the start date fixed while changing only the daily time so the difference is easy to interpret. Missed days, rereading, bonus material and changing editions are not automatically predicted unless the form asks for them.</p><p>This tool does not declare a definitive canon or tell you which order is artistically best. It translates your selected list and pace into time. Check the titles and sequence displayed before relying on the finish date, and update the inputs if your reading or viewing plans change.</p>
            TXT],
            ['title' => 'Choosing a reading or viewing plan', 'html' => <<<'TXT'
            <p>Different orders answer different preferences. Publication order follows when works appeared; chronological order follows the story’s internal timeline; a combined order may include both books and screen adaptations. Read the option names carefully and confirm the displayed list contains only the material you intend to include. A completion date can change substantially when appendices, companion works or additional films are part of the plan.</p><p>Reading speed should reflect the edition and your own attention, not a generic average alone. Maps, songs, appendices and unfamiliar names can slow a session. For viewing, runtime does not include meal breaks or the time between films. Choose a daily allowance you can sustain and consider separate weekday and weekend schedules if the calculator permits.</p><p>Use the result as a flexible itinerary. Compare an unhurried plan with a more intensive one, and revisit the start date if you have already begun. The page does not determine the “correct” order or guarantee a particular experience; it translates your selection and pace into an approximate time commitment.</p>
            TXT],
            ['title' => 'Keeping the estimate useful', 'html' => <<<'TXT'
            <p>Set a realistic daily reading or viewing allowance, then compare the finish date with your calendar. A plan that assumes the same time every day may not reflect work, school, travel or rest days. If the calculator does not let you vary weekday and weekend sessions, treat the result as an average schedule and allow extra time for breaks and missed days.</p><p>Different editions can change page counts and include different supplementary material. Movie runtimes do not include pauses, discussion or time between films. If you have already started, adjust the remaining list or start date rather than counting completed items again. The estimate is a way to understand the time commitment, not an instruction to finish by a particular date.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lord of the Rings calculator work out?', 'a' => 'It returns pages per day, derived from the I read for about and the I\'ll watch for about.'],
            ['q' => 'What do I need to enter to use the Lord of the Rings calculator?', 'a' => 'The form asks for the I read for about and the I\'ll watch for about, which is 13 fields in total.'],
            ['q' => 'Can I enter which translates to in a different unit?', 'a' => 'Yes. Which translates to opens in minutes and the chip beside it offers 27 units.'],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => 'There are several choices to make (8 in total), and each one selects a different case rather than scaling the result.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Which translates to = 0 min.'],
        ],
        'related' => [
            ['path' => '/everyday-life/binge-watching', 'name' => 'Quarantine binge watching'],
            ['path' => '/everyday-life/birth-from-death-date', 'name' => 'Birth from death date'],
            ['path' => '/everyday-life/birth-year', 'name' => 'Birth year'],
        ],
    ],
];
