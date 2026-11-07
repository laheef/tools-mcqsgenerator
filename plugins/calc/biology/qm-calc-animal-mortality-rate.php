<?php

/**
 * Animal mortality rate
 * /biology/animal-mortality-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Animal mortality rate',
    'meta' => ['title' => 'Animal mortality rate — Free Online Calculator', 'description' => 'Animal mortality rate turns Opening stock, Number of newborns and Number of animals sold into Available stock and Mortality rate. A result box can be typed…', 'h1' => 'Animal mortality rate Calculator', 'updated' => '2026-08-06'],
    'sections' => [
        [
            'title' => 'Mortality rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'opening_stock',
                            'label' => 'Opening stock',
                            'type' => 'number',
                            'help' => 'Number of animals you started the growing cycle with.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_newborns',
                            'label' => 'Number of newborns',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'available_stock',
                            'label' => 'Available stock',
                            'type' => 'number',
                            'help' => 'Total number of animals during the growing cycle.',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_animals_sold',
                            'label' => 'Number of animals sold',
                            'type' => 'number',
                            'help' => 'Number of animals sold during the growing cycle.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'closing_stock',
                            'label' => 'Closing stock',
                            'type' => 'number',
                            'help' => 'Number of animals you ended the growing cycle with.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_deaths',
                            'label' => 'Number of deaths',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mortality_rate',
                            'label' => 'Mortality rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cumulative_mortality',
                            'label' => 'Cumulative mortality',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Disease mortality rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_disease_cases',
                            'label' => 'Number of disease cases',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_deaths_from_disease',
                            'label' => 'Number of deaths from disease',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'case_mortality',
                            'label' => 'Case mortality',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'number_of_deaths = ((opening_stock + number_of_newborns) - number_of_animals_sold) - closing_stock',
            'results' => [
                'number_of_deaths' => '-closing_stock - number_of_animals_sold + number_of_newborns + opening_stock',
                'number_of_animals_sold' => '-closing_stock - number_of_deaths + number_of_newborns + opening_stock',
                'opening_stock' => 'closing_stock + number_of_animals_sold + number_of_deaths - number_of_newborns',
                'number_of_newborns' => 'closing_stock + number_of_animals_sold + number_of_deaths - opening_stock',
                'closing_stock' => '-number_of_animals_sold - number_of_deaths + number_of_newborns + opening_stock',
            ],
        ],
        [
            'title' => 'mortality_rate = number_of_deaths / (opening_stock + number_of_newborns)',
            'results' => ['opening_stock' => '-number_of_newborns + number_of_deaths/mortality_rate', 'number_of_newborns' => '-opening_stock + number_of_deaths/mortality_rate', 'number_of_deaths' => 'mortality_rate*(number_of_newborns + opening_stock)', 'mortality_rate' => 'number_of_deaths/(number_of_newborns + opening_stock)'],
        ],
        [
            'title' => 'cumulative_mortality = number_of_deaths / closing_stock',
            'results' => ['closing_stock' => 'number_of_deaths/cumulative_mortality', 'number_of_deaths' => 'closing_stock*cumulative_mortality', 'cumulative_mortality' => 'number_of_deaths/closing_stock'],
        ],
        [
            'title' => 'case_mortality = number_of_deaths_from_disease / number_of_disease_cases',
            'results' => ['case_mortality' => 'number_of_deaths_from_disease/number_of_disease_cases', 'number_of_disease_cases' => 'number_of_deaths_from_disease/case_mortality', 'number_of_deaths_from_disease' => 'case_mortality*number_of_disease_cases'],
        ],
        [
            'title' => 'available_stock = opening_stock + number_of_newborns',
            'results' => ['number_of_newborns' => 'available_stock - opening_stock', 'opening_stock' => 'available_stock - number_of_newborns', 'available_stock' => 'number_of_newborns + opening_stock'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Animal mortality rate turns Opening stock, Number of newborns and Number of animals sold into Available stock and Mortality rate. There is no hidden constant here: change Available stock and Opening stock moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Animal mortality rate calculator works', 'html' => <<<'TXT'
            <p>Animal mortality rate answers one question from 8 numbers, and the answer is Available stock, Mortality rate and Cumulative mortality.</p><p>Written with the labels from the form, Number of deaths = − Closing stock − Number of animals sold + Number of newborns + Opening stock.</p><p>What comes back is Available stock, Mortality rate and Cumulative mortality — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 8 boxes and the page has everything it needs.</p><ul><li><strong>Opening stock</strong> — a plain number, no unit. Number of animals you started the growing cycle with.</li><li><strong>Number of newborns</strong> — a plain number, no unit</li><li><strong>Number of animals sold</strong> — a plain number, no unit. Number of animals sold during the growing cycle.</li><li><strong>Closing stock</strong> — a plain number, no unit. Number of animals you ended the growing cycle with.</li><li><strong>Number of deaths</strong> — a plain number, no unit</li><li><strong>Number of disease cases</strong> — a plain number, no unit</li><li><strong>Number of deaths from disease</strong> — a plain number, no unit</li><li><strong>Case mortality</strong> — in percent</li></ul><p>What you get back is Available stock, Mortality rate in percent, Cumulative mortality, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Mortality rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Number of deaths</strong> = <code>− Closing stock − Number of animals sold + Number of newborns + Opening stock</code></li><li><strong>Number of animals sold</strong> = <code>− Closing stock − Number of deaths + Number of newborns + Opening stock</code></li><li><strong>Opening stock</strong> = <code>Closing stock + Number of animals sold + Number of deaths − Number of newborns</code></li><li><strong>Number of newborns</strong> = <code>Closing stock + Number of animals sold + Number of deaths − Opening stock</code></li><li><strong>Closing stock</strong> = <code>− Number of animals sold − Number of deaths + Number of newborns + Opening stock</code></li><li><strong>Mortality rate</strong> = <code>Number of deaths ÷ (Number of newborns + Opening stock)</code></li></ul><p>Any one of Number of deaths, Number of animals sold and Opening stock can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Case mortality is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Available stock, Mortality rate and Cumulative mortality are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Opening stock to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Opening stock, Number of newborns and Number of animals sold is what you already know and Available stock and Mortality rate is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/chicken-years-to-human-years">Chicken Years to Human Years Calculator</a>, <a href="/biology/coding-capacity-of-dna">Coding Capacity of DNA Calculator</a> and <a href="/biology/codon-adaptation-index">Codon Adaptation Index Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Animal mortality rate calculator work out?', 'a' => <<<'TXT'
            Available stock, Mortality rate and Cumulative mortality, from Closing stock, Number of animals sold, Number of newborns and Opening stock. The relationship is Number of deaths = − Closing stock − Number of animals sold + Number of newborns + Opening stock.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Opening stock, Number of newborns, Number of animals sold, Closing stock, Number of deaths. Enter opening_stock, number_of_newborns and number_of_animals_sold; Available stock is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Number of deaths, Number of animals sold, Opening stock and Number of newborns blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Available stock is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Opening stock blank and the page solves for it, reporting Available stock instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Available stock keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/chicken-years-to-human-years', 'name' => 'Chicken Years to Human Years Calculator'],
            ['path' => '/biology/coding-capacity-of-dna', 'name' => 'Coding Capacity of DNA Calculator'],
            ['path' => '/biology/codon-adaptation-index', 'name' => 'Codon Adaptation Index Calculator'],
        ],
        'authors' => [],
    ],
];
