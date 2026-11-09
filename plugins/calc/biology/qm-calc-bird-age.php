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
    'meta' => ['title' => 'Bird age Calculator: Formula, Steps & Example', 'description' => 'Enter bird species and average bird lifespan and get bird age back. Every figure is computed. Every box can be solved for, not only the one in the title.', 'h1' => 'Bird age Calculator', 'updated' => '2026-08-06'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'species',
                            'label' => 'Bird species ',
                            'type' => 'select',
                            'options' => [
                                'Parakeet (Budgie)' => '1',
                                'Cockatiel' => '2',
                                'Lovebird' => '3',
                                'Zebra finch' => '4',
                                'Canary' => '5',
                                'African grey parrot' => '6',
                                'Conure' => '7',
                                'Enter a custom average bird lifespan' => '8',
                            ],
                            'dataset' => 'Species data',
                            'control' => 'DROPDOWN',
                            'default' => 'Parakeet (Budgie)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                    ],
                    'fields' => [
                        ['type' => 'image', 'url' => 'birds/pet-bird-2.png'],
                        ['type' => 'image', 'url' => 'birds/pet-bird-7.png'],
                        ['type' => 'image', 'url' => 'birds/pet-bird-1.png'],
                        ['type' => 'image', 'url' => 'birds/pet-bird-4.png'],
                        ['type' => 'image', 'url' => 'birds/pet-bird-6.png'],
                        ['type' => 'image', 'url' => 'birds/pet-bird-3.png'],
                        ['type' => 'image', 'url' => 'birds/pet-bird-8.png'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_bird_lifespan',
                            'label' => 'Average bird lifespan',
                            'type' => 'result',
                            'suffix' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_bird_lifespan_custom',
                            'label' => 'Average bird lifespan',
                            'type' => 'number',
                            'suffix' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bird_age',
                            'label' => 'Bird age ',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bird_age_custom',
                            'label' => 'Bird age ',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'human_life_expectancy',
                            'label' => 'Human life expectancy',
                            'type' => 'number',
                            'suffix' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '72.6',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'human_life_expectancy_custom',
                            'label' => 'Human life expectancy',
                            'type' => 'number',
                            'suffix' => 'yrs',
                            'rounding' => ['omni', '0.001'],
                            'default' => '72.6',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'human_age',
                            'label' => 'Human age ',
                            'type' => 'number',
                            'help' => 'Assuming the global average life expectancy of 72.6 years.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'human_age_custom',
                            'label' => 'Human age ',
                            'type' => 'number',
                            'help' => 'Assuming the global average life expectancy of 72.6 years.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'display_more_variables',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show assumed lifespans' => '1', '' => '0'],
                            'dataset' => 'Display options',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'species == 1 and bird_age > 0', 'text' => <<<'TXT'
                                Parakeet (Budgies)'s lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. A parakeet (budgie) is physically able to breed after ~{{adult.value}} months.&nbsp;
                                TXT],
                                ['when' => 'species == 2 and bird_age > 0', 'text' => <<<'TXT'
                                Cockatiel's lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. A cockatiel is physically able to breed after ~{{adult.value}} months.&nbsp;
                                TXT],
                                ['when' => 'species == 3 and bird_age > 0', 'text' => <<<'TXT'
                                Lovebird's lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. A lovebird is physically able to breed after ~{{adult.value}} months.&nbsp;
                                TXT],
                                ['when' => 'species == 4 and bird_age > 0', 'text' => <<<'TXT'
                                Zebra finch's lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. A zebra finch is physically able to breed after ~{{adult.value}} months.&nbsp;
                                TXT],
                                ['when' => 'species == 5 and bird_age > 0', 'text' => <<<'TXT'
                                Canary's lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. A canary is physically able to breed after ~{{adult.value}} months.&nbsp;
                                TXT],
                                ['when' => 'species == 6 and bird_age > 0', 'text' => <<<'TXT'
                                African grey parrot's lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. An African grey parrot is physically able to breed after ~{{adult.value}} months.&nbsp;
                                TXT],
                                ['when' => 'species == 7 and bird_age > 0', 'text' => <<<'TXT'
                                Conure's lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. A conure is physically able to breed after ~{{adult.value}} months.&nbsp;
                                TXT],
                                ['when' => 'species == 8 and average_bird_lifespan_custom > 0 and bird_age_custom > 0', 'text' => 'Remember that this is only a rough estimate, as birds mature differently from humans.&nbsp;'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'dynamic print variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'adult',
                            'label' => 'Adult',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'timemax',
                            'label' => 'Timemax',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'timemin',
                            'label' => 'Timemin',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'bird_age = human_age*average_bird_lifespan/ human_life_expectancy',
            'results' => ['human_age' => 'bird_age*human_life_expectancy/average_bird_lifespan', 'human_life_expectancy' => 'average_bird_lifespan*human_age/bird_age', 'average_bird_lifespan' => 'bird_age*human_life_expectancy/human_age', 'bird_age' => 'average_bird_lifespan*human_age/human_life_expectancy'],
        ],
        [
            'title' => 'bird_age_custom = human_age_custom*average_bird_lifespan_custom/ human_life_expectancy_custom',
            'results' => ['average_bird_lifespan_custom' => 'bird_age_custom*human_life_expectancy_custom/human_age_custom', 'human_age_custom' => 'bird_age_custom*human_life_expectancy_custom/average_bird_lifespan_custom', 'bird_age_custom' => 'average_bird_lifespan_custom*human_age_custom/human_life_expectancy_custom', 'human_life_expectancy_custom' => 'average_bird_lifespan_custom*human_age_custom/bird_age_custom'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Bird age works out Average bird lifespan and Adult from Bird species, Bird age and Bird age. The arithmetic is the whole method: average bird lifespan is worked out from bird species by one formula, applied once. Average bird lifespan comes back in yrs unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Bird age calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Bird age: it takes 8 numbers and reports Average bird lifespan, Adult and Timemax.</p><p>The relationship it solves reads Bird age = Average bird lifespan × Human age ÷ Human life expectancy.</p><p>The result panel carries Average bird lifespan, Adult, Timemax and Timemin, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 8 boxes, and nothing else.</p><ul><li><strong>Bird species</strong> — a plain number, no unit</li><li><strong>Average bird lifespan</strong> — in yrs</li><li><strong>Bird age</strong> — in years</li><li><strong>Bird age</strong> — in years</li><li><strong>Human life expectancy</strong> — in yrs</li><li><strong>Human life expectancy</strong> — in yrs</li><li><strong>Human age</strong> — in years. Assuming the global average life expectancy of 72.6 years.</li><li><strong>Human age</strong> — in years. Assuming the global average life expectancy of 72.6 years.</li></ul><p>The result boxes are Average bird lifespan in yrs, Adult, Timemax, Timemin; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Bird age lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Bird age</strong> = <code>Average bird lifespan × Human age ÷ Human life expectancy</code></li><li><strong>Human age</strong> = <code>Bird age × Human life expectancy ÷ Average bird lifespan</code></li><li><strong>Human life expectancy</strong> = <code>Average bird lifespan × Human age ÷ Bird age</code></li><li><strong>Average bird lifespan</strong> = <code>Bird age × Human life expectancy ÷ Human age</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Bird age</strong> = <code>Average bird lifespan × Human age ÷ Human life expectancy</code> — the form to use when Average bird lifespan, Human age and Human life expectancy are the values you have.</li><li><strong>Human age</strong> = <code>Bird age × Human life expectancy ÷ Average bird lifespan</code> — the form to use when Bird age, Human life expectancy and Average bird lifespan are the values you have.</li><li><strong>Human life expectancy</strong> = <code>Average bird lifespan × Human age ÷ Bird age</code> — the form to use when Average bird lifespan, Human age and Bird age are the values you have.</li><li><strong>Average bird lifespan</strong> = <code>Bird age × Human life expectancy ÷ Human age</code> — the form to use when Bird age, Human life expectancy and Human age are the values you have.</li><li><strong>Bird age</strong> = <code>Average bird lifespan × Human age ÷ Human life expectancy</code> — the form to use when Average bird lifespan, Human age and Human life expectancy are the values you have.</li><li><strong>Average bird lifespan</strong> = <code>Bird age × Human life expectancy ÷ Human age</code> — the form to use when Bird age, Human life expectancy and Human age are the values you have.</li><li><strong>Human age</strong> = <code>Bird age × Human life expectancy ÷ Average bird lifespan</code> — the form to use when Bird age, Human life expectancy and Average bird lifespan are the values you have.</li><li><strong>Human life expectancy</strong> = <code>Average bird lifespan × Human age ÷ Bird age</code> — the form to use when Average bird lifespan, Human age and Bird age are the values you have.</li></ul><p>Any one of Bird age, Human age and Human life expectancy can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Bird age, Bird age and Human age carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Average bird lifespan, Adult and Timemax are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Bird species left as a guess.</strong> Anything typed into Bird species is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Average bird lifespan left as a guess.</strong> Anything typed into Average bird lifespan is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Bird species and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Bird species</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Bird species is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Average bird lifespan</strong> is measured in yrs. The page reads it when it works out Human age, Bird age and Human life expectancy. Have it to hand before you start: Average bird lifespan is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Bird age</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The page reads it when it works out Human age, Human life expectancy and Average bird lifespan. Have it to hand before you start: Bird age is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Bird age</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The page reads it when it works out Average bird lifespan, Human age and Human life expectancy. Have it to hand before you start: Bird age is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Human life expectancy</strong> is measured in yrs. The page reads it when it works out Human age, Average bird lifespan and Bird age. Have it to hand before you start: Human life expectancy is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Human life expectancy</strong> is measured in yrs. The page reads it when it works out Average bird lifespan, Human age and Bird age. Have it to hand before you start: Human life expectancy is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Human age</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. Assuming the global average life expectancy of 72.6 years. The page reads it when it works out Human life expectancy, Average bird lifespan and Bird age. Have it to hand before you start: Human age is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Human age</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. Assuming the global average life expectancy of 72.6 years. The page reads it when it works out Average bird lifespan, Bird age and Human life expectancy. Have it to hand before you start: Human age is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Average bird lifespan</strong> is a plain number. The value follows from Bird age, Human life expectancy and Human age. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Adult</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Timemax</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Timemin</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Average bird lifespan is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Bird species, Average bird lifespan and Bird age are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Bird species, Average bird lifespan and Bird age and the number you are missing is Average bird lifespan and Adult.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bird age calculator work out?', 'a' => <<<'TXT'
            Average bird lifespan, Adult, Timemax and Timemin, from Average bird lifespan, Human age and Human life expectancy. The relationship is Bird age = Average bird lifespan × Human age ÷ Human life expectancy.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Bird species, Average bird lifespan (yrs), Bird age (years), Bird age (years), Human life expectancy (yrs). Enter bird species, average bird lifespan and bird age; Average bird lifespan is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Bird age, Human age, Human life expectancy and Average bird lifespan blank and the page solves for that one instead — nothing has to be switched first.
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
