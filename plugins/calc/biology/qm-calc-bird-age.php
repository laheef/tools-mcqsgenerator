<?php

/**
 * Bird age
 * /biology/bird-age
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bird age',
    'meta' => ['title' => 'Bird age Calculator: Formula, Steps & Examples', 'description' => <<<'TXT'
    Bird age works out Average bird lifespan and Adult from Bird species, Average bird lifespan and Bird age 🐦. The arithmetic is the whole method: Average bird…
    TXT, 'h1' => 'Bird age Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'adult' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'average_bird_lifespan' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'average_bird_lifespan_custom' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'bird_age' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'bird_age_custom' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'display_more_variables' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'lLL8BQ-Y2sGJr91bqO3K4', 'c' => null],
                ],
                'ds' => 'Uq1BlLb8fPNQL-aBL8uM7',
            ],
            'human_age' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'human_age_custom' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'human_life_expectancy' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '72.6', 'c' => null],
                ],
            ],
            'human_life_expectancy_custom' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
                'dfl' => [
                    ['v' => '72.6', 'c' => null],
                ],
            ],
            'species' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'GZO7tQa99pxvUrBmDYztF', 'c' => null],
                ],
                'ds' => 'RDc_xGGzE_t4kIikdchrU',
            ],
            'timemax' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'timemin' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'OC-yXyj-s66jq3qE0Ql_8',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'species',
                                    'vt' => 'valueSelect',
                                    'l' => 'Bird species ',
                                    'ds' => 'RDc_xGGzE_t4kIikdchrU',
                                    'opts' => [
                                        ['GZO7tQa99pxvUrBmDYztF', 'Parakeet (Budgie)', '1'],
                                        ['cugOSUM2gotIAXr8DPA3c', 'Cockatiel', '2'],
                                        ['GzErRgCCtQogsedKxi3w6', 'Lovebird', '3'],
                                        ['I3qIabAlLCNZQaBAREnnt', 'Zebra finch', '4'],
                                        ['Xj7FjtIn8UW6Ic86B-A-S', 'Canary', '5'],
                                        ['xWqUe86_E1M8CwxcFgJzs', 'African grey parrot', '6'],
                                        ['jnEsllk4ISS5tR92FJxhb', 'Conure', '7'],
                                        ['Ef1B-aFaUDcYAjEvaakv8', 'Enter a custom average bird lifespan', '8'],
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
                                    't' => 'i',
                                    'u' => ['birds/pet-bird-2.png'],
                                ],
                                [
                                    't' => 'i',
                                    'u' => ['birds/pet-bird-7.png'],
                                ],
                                [
                                    't' => 'i',
                                    'u' => ['birds/pet-bird-1.png'],
                                ],
                                [
                                    't' => 'i',
                                    'u' => ['birds/pet-bird-4.png'],
                                ],
                                [
                                    't' => 'i',
                                    'u' => ['birds/pet-bird-6.png'],
                                ],
                                [
                                    't' => 'i',
                                    'u' => ['birds/pet-bird-3.png'],
                                ],
                                [
                                    't' => 'i',
                                    'u' => ['birds/pet-bird-8.png'],
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
                                    'n' => 'average_bird_lifespan',
                                    'vt' => 'dependent',
                                    'l' => 'Average bird lifespan',
                                    'suf' => 'yrs',
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
                                    'n' => 'average_bird_lifespan_custom',
                                    'vt' => 'numerical',
                                    'l' => 'Average bird lifespan',
                                    'suf' => 'yrs',
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
                                    'n' => 'bird_age',
                                    'vt' => 'numerical',
                                    'l' => 'Bird age 🐦',
                                    'us' => '19',
                                    'du' => 'yrs',
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
                                    'n' => 'bird_age_custom',
                                    'vt' => 'numerical',
                                    'l' => 'Bird age 🐦',
                                    'us' => '19',
                                    'du' => 'yrs',
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
                                    'n' => 'human_life_expectancy',
                                    'vt' => 'numerical',
                                    'l' => 'Human life expectancy',
                                    'suf' => 'yrs',
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
                                    'n' => 'human_life_expectancy_custom',
                                    'vt' => 'numerical',
                                    'l' => 'Human life expectancy',
                                    'suf' => 'yrs',
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
                                    'n' => 'human_age',
                                    'vt' => 'numerical',
                                    'l' => 'Human age 🚶',
                                    'h' => 'Assuming the global average life expectancy of 72.6 years.',
                                    'us' => '19',
                                    'du' => 'yrs',
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
                                    'n' => 'human_age_custom',
                                    'vt' => 'numerical',
                                    'l' => 'Human age 🚶',
                                    'h' => 'Assuming the global average life expectancy of 72.6 years.',
                                    'us' => '19',
                                    'du' => 'yrs',
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
                                    'n' => 'display_more_variables',
                                    'vt' => 'valueSelect',
                                    'l' => '',
                                    'ds' => 'Uq1BlLb8fPNQL-aBL8uM7',
                                    'opts' => [
                                        ['R57zBHWJ0KgKkvzSg2sgh', 'Show assumed lifespans', '1'],
                                        ['lLL8BQ-Y2sGJr91bqO3K4', '', '0'],
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
                                    't' => 'x',
                                    'c' => [
                                        ['species == 1 and bird_age > 0', <<<'TXT'
                                        Parakeet (Budgies)'s lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. A parakeet (budgie) is physically able to breed after ~{{adult.value}} months.&nbsp;
                                        TXT],
                                        ['species == 2 and bird_age > 0', <<<'TXT'
                                        Cockatiel's lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. A cockatiel is physically able to breed after ~{{adult.value}} months.&nbsp;
                                        TXT],
                                        ['species == 3 and bird_age > 0', <<<'TXT'
                                        Lovebird's lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. A lovebird is physically able to breed after ~{{adult.value}} months.&nbsp;
                                        TXT],
                                        ['species == 4 and bird_age > 0', <<<'TXT'
                                        Zebra finch's lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. A zebra finch is physically able to breed after ~{{adult.value}} months.&nbsp;
                                        TXT],
                                        ['species == 5 and bird_age > 0', <<<'TXT'
                                        Canary's lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. A canary is physically able to breed after ~{{adult.value}} months.&nbsp;
                                        TXT],
                                        ['species == 6 and bird_age > 0', <<<'TXT'
                                        African grey parrot's lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. An African grey parrot is physically able to breed after ~{{adult.value}} months.&nbsp;
                                        TXT],
                                        ['species == 7 and bird_age > 0', <<<'TXT'
                                        Conure's lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. A conure is physically able to breed after ~{{adult.value}} months.&nbsp;
                                        TXT],
                                        ['species == 8 and average_bird_lifespan_custom > 0 and bird_age_custom > 0', 'Remember that this is only a rough estimate, as birds mature differently from humans.&nbsp;'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '7JQo3exOJa_fqrkUvkLJY',
                'title' => 'dynamic print variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'adult', 'vt' => 'dependent', 'l' => 'Adult'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'timemax', 'vt' => 'dependent', 'l' => 'Timemax'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'timemin', 'vt' => 'dependent', 'l' => 'Timemin'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'bird_age = human_age*average_bird_lifespan/ human_life_expectancy',
                'var' => [
                    [
                        'l' => 'human_age',
                        'f' => 'bird_age*human_life_expectancy/average_bird_lifespan',
                        'r' => ['human_life_expectancy', 'average_bird_lifespan', 'bird_age'],
                    ],
                    [
                        'l' => 'human_life_expectancy',
                        'f' => 'average_bird_lifespan*human_age/bird_age',
                        'r' => ['human_age', 'average_bird_lifespan', 'bird_age'],
                    ],
                    [
                        'l' => 'average_bird_lifespan',
                        'f' => 'bird_age*human_life_expectancy/human_age',
                        'r' => ['human_age', 'human_life_expectancy', 'bird_age'],
                    ],
                    [
                        'l' => 'bird_age',
                        'f' => 'average_bird_lifespan*human_age/human_life_expectancy',
                        'r' => ['human_age', 'human_life_expectancy', 'average_bird_lifespan'],
                    ],
                ],
            ],
            [
                'formula' => 'bird_age_custom = human_age_custom*average_bird_lifespan_custom/ human_life_expectancy_custom',
                'var' => [
                    [
                        'l' => 'average_bird_lifespan_custom',
                        'f' => 'bird_age_custom*human_life_expectancy_custom/human_age_custom',
                        'r' => ['human_age_custom', 'bird_age_custom', 'human_life_expectancy_custom'],
                    ],
                    [
                        'l' => 'human_age_custom',
                        'f' => 'bird_age_custom*human_life_expectancy_custom/average_bird_lifespan_custom',
                        'r' => ['average_bird_lifespan_custom', 'bird_age_custom', 'human_life_expectancy_custom'],
                    ],
                    [
                        'l' => 'bird_age_custom',
                        'f' => 'average_bird_lifespan_custom*human_age_custom/human_life_expectancy_custom',
                        'r' => ['average_bird_lifespan_custom', 'human_age_custom', 'human_life_expectancy_custom'],
                    ],
                    [
                        'l' => 'human_life_expectancy_custom',
                        'f' => 'average_bird_lifespan_custom*human_age_custom/bird_age_custom',
                        'r' => ['average_bird_lifespan_custom', 'human_age_custom', 'bird_age_custom'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'RDc_xGGzE_t4kIikdchrU' => [
                'name' => 'Species data',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'GZO7tQa99pxvUrBmDYztF', 'label' => 'Parakeet (Budgie)', 'value' => '1'],
                    ['uid' => 'cugOSUM2gotIAXr8DPA3c', 'label' => 'Cockatiel', 'value' => '2'],
                    ['uid' => 'GzErRgCCtQogsedKxi3w6', 'label' => 'Lovebird', 'value' => '3'],
                    ['uid' => 'I3qIabAlLCNZQaBAREnnt', 'label' => 'Zebra finch', 'value' => '4'],
                    ['uid' => 'Xj7FjtIn8UW6Ic86B-A-S', 'label' => 'Canary', 'value' => '5'],
                    ['uid' => 'xWqUe86_E1M8CwxcFgJzs', 'label' => 'African grey parrot', 'value' => '6'],
                    ['uid' => 'jnEsllk4ISS5tR92FJxhb', 'label' => 'Conure', 'value' => '7'],
                    ['uid' => 'Ef1B-aFaUDcYAjEvaakv8', 'label' => 'Enter a custom average bird lifespan', 'value' => '8'],
                ],
            ],
            'Uq1BlLb8fPNQL-aBL8uM7' => [
                'name' => 'Display options',
                'uiType' => 'CHECKBOX',
                'options' => [
                    ['uid' => 'R57zBHWJ0KgKkvzSg2sgh', 'label' => 'Show assumed lifespans', 'value' => '1'],
                    ['uid' => 'lLL8BQ-Y2sGJr91bqO3K4', 'label' => '', 'value' => '0'],
                ],
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Bird age works out Average bird lifespan and Adult from Bird species, Average bird lifespan and Bird age 🐦. The arithmetic is the whole method: Average bird lifespan is worked out from Bird species by one formula, applied once. Average bird lifespan comes back in yrs unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Bird age calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Bird age: it takes 9 numbers and reports Average bird lifespan, Adult and Timemax.</p><p>The relationship it solves reads Human age 🚶 = Bird age 🐦 × Human life expectancy ÷ Average bird lifespan.</p><p>The result panel carries Average bird lifespan, Adult, Timemax and Timemin, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 9 boxes, and nothing else.</p><ul><li><strong>Bird species</strong> — a plain number, no unit</li><li><strong>Average bird lifespan</strong> — in yrs</li><li><strong>Bird age 🐦</strong> — in years</li><li><strong>Bird age 🐦</strong> — in years</li><li><strong>Human life expectancy</strong> — in yrs</li><li><strong>Human life expectancy</strong> — in yrs</li><li><strong>Human age 🚶</strong> — in years. Assuming the global average life expectancy of 72.6 years.</li><li><strong>Human age 🚶</strong> — in years. Assuming the global average life expectancy of 72.6 years.</li><li><strong>display_more_variables</strong> — a plain number, no unit</li></ul><p>The result boxes are Average bird lifespan in yrs, Adult, Timemax, Timemin; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Human age 🚶</strong> = <code>Bird age 🐦 × Human life expectancy ÷ Average bird lifespan</code></li><li><strong>Human life expectancy</strong> = <code>Average bird lifespan × Human age 🚶 ÷ Bird age 🐦</code></li><li><strong>Average bird lifespan</strong> = <code>Bird age 🐦 × Human life expectancy ÷ Human age 🚶</code></li><li><strong>Bird age 🐦</strong> = <code>Average bird lifespan × Human age 🚶 ÷ Human life expectancy</code></li></ul><p>Any one of Human age 🚶, Human life expectancy and Average bird lifespan can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Bird age 🐦, Bird age 🐦 and Human age 🚶 carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Average bird lifespan, Adult and Timemax are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Bird species and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Bird species, Average bird lifespan and Bird age 🐦 and the number you are missing is Average bird lifespan and Adult.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/osmolarity-osmotic-pressure">Osmolarity / Osmotic Pressure Calculator</a>, <a href="/biology/pasture-stocking-rate">Pasture Stocking Rate Calculator</a> and <a href="/biology/pcr-annealing-temperature">PCR Annealing Temperature Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bird age calculator work out?', 'a' => <<<'TXT'
            Average bird lifespan, Adult, Timemax and Timemin, from Human life expectancy, Average bird lifespan and Bird age 🐦. The relationship is Human age 🚶 = Bird age 🐦 × Human life expectancy ÷ Average bird lifespan.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Bird species, Average bird lifespan (yrs), Bird age 🐦 (years), Bird age 🐦 (years), Human life expectancy (yrs). Enter species, average_bird_lifespan_custom and bird_age; Average bird lifespan is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Human age 🚶, Human life expectancy, Average bird lifespan and Bird age 🐦 blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Average bird lifespan is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Bird species left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Average bird lifespan keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/osmolarity-osmotic-pressure', 'name' => 'Osmolarity / Osmotic Pressure Calculator'],
            ['path' => '/biology/pasture-stocking-rate', 'name' => 'Pasture Stocking Rate Calculator'],
            ['path' => '/biology/pcr-annealing-temperature', 'name' => 'PCR Annealing Temperature Calculator'],
        ],
        'authors' => [],
    ],
];
