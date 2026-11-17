<?php

/**
 * Rent split
 * /finance/rent-split
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rent split',
    'meta' => ['title' => 'Rent split Calculator — Formula, Units & Example', 'description' => 'Rent split reports total area, share of the rent and each person in this room pays. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Rent split Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => 'Rent details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_rent',
                            'label' => 'Total rent',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_area',
                            'label' => 'Total area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'ft2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_rooms',
                            'label' => 'Number of bedrooms',
                            'type' => 'select',
                            'options' => ['One' => '1', 'Two' => '2', 'Three' => '3'],
                            'dataset' => 'no rooms',
                            'default' => 'One',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area_room_1',
                            'label' => 'Floor space – Bedrooom 1',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '10', 'when' => null],
                                ['value' => '100', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area_room_2',
                            'label' => 'Floor space – Bedrooom 2',
                            'type' => 'result',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area_room_3',
                            'label' => 'Floor space – Bedrooom 3',
                            'type' => 'result',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Bedroom 1',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_persons_room_1',
                            'label' => 'Number of people',
                            'type' => 'number',
                            'suffix' => 'person(s)',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'This room owes {{rent_due_room_1.monetaryValue}} in rent.&nbsp;'],
                                ['when' => 'num_persons_room_1 > 1', 'text' => 'Each person in this room should pay {{rent_due_per_person_1.monetaryValue}}.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Bedroom 2',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_persons_room_2',
                            'label' => 'Number of people',
                            'type' => 'number',
                            'suffix' => 'person(s)',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'This room owes {{rent_due_room_2.monetaryValue}} in rent.&nbsp;'],
                                ['when' => 'num_persons_room_2 > 1', 'text' => 'Each person in this room should pay {{rent_due_per_person_2.monetaryValue}}.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Bedroom 3',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_persons_room_3',
                            'label' => 'Number of people',
                            'type' => 'number',
                            'suffix' => 'person(s)',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'This room owes {{rent_due_room_3.monetaryValue}} in rent.&nbsp;'],
                                ['when' => 'num_persons_room_3 > 1', 'text' => 'Each person in this room should pay {{rent_due_per_person_3.monetaryValue}}.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '[hidden]',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rent_due_room_1',
                            'label' => 'Share of the rent',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rent_due_per_person_1',
                            'label' => 'Each person in this room pays',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rent_due_room_2',
                            'label' => 'Share of the rent',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rent_due_per_person_2',
                            'label' => 'Each person in this room pays',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rent_due_room_3',
                            'label' => 'Share of the rent',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rent_due_per_person_3',
                            'label' => 'Each person in this room pays',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'rent_due_room_1 = one_way(area_room_1 / total_area * total_rent)',
            'results' => ['rent_due_room_1' => '(area_room_1*total_rent/(area_room_1 + area_room_2 + area_room_3))'],
        ],
        [
            'title' => 'rent_due_per_person_1 = one_way(rent_due_room_1 / num_persons_room_1)',
            'results' => ['rent_due_per_person_1' => '((area_room_1*total_rent/(area_room_1 + area_room_2 + area_room_3))/num_persons_room_1)'],
        ],
        [
            'title' => 'rent_due_room_2 = one_way(area_room_2 / total_area * total_rent)',
            'results' => ['rent_due_room_2' => '(area_room_2*total_rent/(area_room_1 + area_room_2 + area_room_3))'],
        ],
        [
            'title' => 'rent_due_per_person_2 = one_way(rent_due_room_2 / num_persons_room_2)',
            'results' => ['rent_due_per_person_2' => '((area_room_2*total_rent/(area_room_1 + area_room_2 + area_room_3))/num_persons_room_2)'],
        ],
        [
            'title' => 'rent_due_room_3 = one_way(area_room_3 / total_area * total_rent)',
            'results' => ['rent_due_room_3' => '(area_room_3*total_rent/(area_room_1 + area_room_2 + area_room_3))'],
        ],
        [
            'title' => 'rent_due_per_person_3 = one_way(rent_due_room_3 / num_persons_room_3)',
            'results' => ['rent_due_per_person_3' => '((area_room_3*total_rent/(area_room_1 + area_room_2 + area_room_3))/num_persons_room_3)'],
        ],
        [
            'title' => 'total_area =  one_way(area_room_1 + area_room_2 + area_room_3)',
            'results' => ['total_area' => '(area_room_1 + area_room_2 + area_room_3)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Rent split turns Total rent, Total area and Number of bedrooms into Floor space – Bedrooom 2 and Floor space – Bedrooom 3. It is a single relationship that reads floor space – Bedrooom 2 out of total rent, not a table of canned results keyed by them. Units for Floor space – Bedrooom 2 default to square meters and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Rent split calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Rent split: it takes 13 numbers and reports Floor space – Bedrooom 2 and Floor space – Bedrooom 3.</p><p>The relationship it solves reads Share of the rent = (Floor space – Bedrooom 1 × Total rent ÷ (Floor space – Bedrooom 1 + Floor space – Bedrooom 2 + Floor space – Bedrooom 3)).</p><p>What comes back is Floor space – Bedrooom 2 and Floor space – Bedrooom 3 — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 13 boxes and the page has everything it needs.</p><ul><li><strong>Total rent</strong> — in USD</li><li><strong>Total area</strong> — in square feet</li><li><strong>Number of bedrooms</strong> — a plain number, no unit</li><li><strong>Floor space – Bedrooom 1</strong> — in square meters</li><li><strong>Number of people</strong> — in person(s)</li><li><strong>Number of people</strong> — in person(s)</li><li><strong>Number of people</strong> — in person(s)</li><li><strong>Share of the rent</strong> — in USD</li><li><strong>Each person in this room pays</strong> — in USD</li><li><strong>Share of the rent</strong> — in USD</li><li><strong>Each person in this room pays</strong> — in USD</li><li><strong>Share of the rent</strong> — in USD</li><li><strong>Each person in this room pays</strong> — in USD</li></ul><p>What you get back is Floor space – Bedrooom 2 in square meters, Floor space – Bedrooom 3 in square meters, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Total rent = 3 USD, Number of bedrooms = 1, Floor space – Bedrooom 1 = 10 m2, Number of people = 1 person(s), Number of people = 1 person(s) and Number of people = 1 person(s); the answers are <strong>Share of the rent</strong> = 3 USD, <strong>Each person in this room pays</strong> = 3 USD, <strong>Share of the rent</strong> = 0 USD, <strong>Each person in this room pays</strong> = 0 USD, <strong>Share of the rent</strong> = 0 USD, <strong>Each person in this room pays</strong> = 0 USD and <strong>Total area</strong> = 10 ft2.</p><ul><li><strong>Share of the rent</strong> = 3 USD</li><li><strong>Each person in this room pays</strong> = 3 USD</li><li><strong>Share of the rent</strong> = 0 USD</li><li><strong>Each person in this room pays</strong> = 0 USD</li><li><strong>Share of the rent</strong> = 0 USD</li><li><strong>Each person in this room pays</strong> = 0 USD</li><li><strong>Total area</strong> = 10 ft2</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Share of the rent</strong> = <code>(Floor space – Bedrooom 1 × Total rent ÷ (Floor space – Bedrooom 1 + Floor space – Bedrooom 2 + Floor space – Bedrooom 3))</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Share of the rent</strong> = 3, <strong>Each person in this room pays</strong> = 3, <strong>Share of the rent</strong> = 0, <strong>Each person in this room pays</strong> = 0, <strong>Share of the rent</strong> = 0, <strong>Each person in this room pays</strong> = 0 and <strong>Total area</strong> = 10 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Floor space – Bedrooom 2 offers 7 units and opens on square meters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Share of the rent</strong> = <code>(Floor space – Bedrooom 1 × Total rent ÷ (Floor space – Bedrooom 1 + Floor space – Bedrooom 2 + Floor space – Bedrooom 3))</code></li><li><strong>Each person in this room pays</strong> = <code>((Floor space – Bedrooom 1 × Total rent ÷ (Floor space – Bedrooom 1 + Floor space – Bedrooom 2 + Floor space – Bedrooom 3)) ÷ Number of people)</code></li><li><strong>Total area</strong> = <code>(Floor space – Bedrooom 1 + Floor space – Bedrooom 2 + Floor space – Bedrooom 3)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Share of the rent</strong> = <code>(Floor space – Bedrooom 1 × Total rent ÷ (Floor space – Bedrooom 1 + Floor space – Bedrooom 2 + Floor space – Bedrooom 3))</code> — the form to use when Floor space – Bedrooom 1, Total rent, Floor space – Bedrooom 2 and Floor space – Bedrooom 3 are the values you have.</li><li><strong>Each person in this room pays</strong> = <code>((Floor space – Bedrooom 1 × Total rent ÷ (Floor space – Bedrooom 1 + Floor space – Bedrooom 2 + Floor space – Bedrooom 3)) ÷ Number of people)</code> — the form to use when Floor space – Bedrooom 1, Total rent, Floor space – Bedrooom 2 and Floor space – Bedrooom 3 are the values you have.</li><li><strong>Share of the rent</strong> = <code>(Floor space – Bedrooom 2 × Total rent ÷ (Floor space – Bedrooom 1 + Floor space – Bedrooom 2 + Floor space – Bedrooom 3))</code> — the form to use when Floor space – Bedrooom 2, Total rent, Floor space – Bedrooom 1 and Floor space – Bedrooom 3 are the values you have.</li><li><strong>Each person in this room pays</strong> = <code>((Floor space – Bedrooom 2 × Total rent ÷ (Floor space – Bedrooom 1 + Floor space – Bedrooom 2 + Floor space – Bedrooom 3)) ÷ Number of people)</code> — the form to use when Floor space – Bedrooom 2, Total rent, Floor space – Bedrooom 1 and Floor space – Bedrooom 3 are the values you have.</li><li><strong>Share of the rent</strong> = <code>(Floor space – Bedrooom 3 × Total rent ÷ (Floor space – Bedrooom 1 + Floor space – Bedrooom 2 + Floor space – Bedrooom 3))</code> — the form to use when Floor space – Bedrooom 3, Total rent, Floor space – Bedrooom 1 and Floor space – Bedrooom 2 are the values you have.</li><li><strong>Each person in this room pays</strong> = <code>((Floor space – Bedrooom 3 × Total rent ÷ (Floor space – Bedrooom 1 + Floor space – Bedrooom 2 + Floor space – Bedrooom 3)) ÷ Number of people)</code> — the form to use when Floor space – Bedrooom 3, Total rent, Floor space – Bedrooom 1 and Floor space – Bedrooom 2 are the values you have.</li><li><strong>Total area</strong> = <code>(Floor space – Bedrooom 1 + Floor space – Bedrooom 2 + Floor space – Bedrooom 3)</code> — the form to use when Floor space – Bedrooom 1, Floor space – Bedrooom 2 and Floor space – Bedrooom 3 are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Share of the rent, Each person in this room pays and Share of the rent can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Total rent from 3 to 6, leaving every other box alone. The panel moves from <strong>Share of the rent</strong> 3 USD, <strong>Each person in this room pays</strong> 3 USD, <strong>Share of the rent</strong> 0 USD, <strong>Each person in this room pays</strong> 0 USD, <strong>Share of the rent</strong> 0 USD, <strong>Each person in this room pays</strong> 0 USD and <strong>Total area</strong> 10 ft2 to <strong>Share of the rent</strong> 6 USD, <strong>Each person in this room pays</strong> 6 USD, <strong>Share of the rent</strong> 0 USD, <strong>Each person in this room pays</strong> 0 USD, <strong>Share of the rent</strong> 0 USD, <strong>Each person in this room pays</strong> 0 USD and <strong>Total area</strong> 10 ft2.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Total area and Floor space – Bedrooom 1 is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Floor space – Bedrooom 2 and Floor space – Bedrooom 3 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Total rent left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total rent is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Total area left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total area is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Total rent to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Total rent, Total area, Number of bedrooms and Floor space – Bedrooom 1. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Total rent into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Floor space – Bedrooom 2 in m2 with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Floor space – Bedrooom 2 follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover square meters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Total rent, Total area and Number of bedrooms and the number you are missing is Floor space – Bedrooom 2 and Floor space – Bedrooom 3.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/net-worth">Net worth Calculator</a>, <a href="/finance/new-jersey-sales-tax">New Jersey sales tax</a> and <a href="/finance/new-york-overtime">New York overtime</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rent split calculator work out?', 'a' => <<<'TXT'
            Floor space – Bedrooom 2 and Floor space – Bedrooom 3, from Floor space – Bedrooom 1, Total rent, Floor space – Bedrooom 2 and Floor space – Bedrooom 3. The relationship is Share of the rent = (Floor space – Bedrooom 1 × Total rent ÷ (Floor space – Bedrooom 1 + Floor space – Bedrooom 2 + Floor space – Bedrooom 3)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total rent (USD), Total area (square feet), Number of bedrooms, Floor space – Bedrooom 1 (square meters), Number of people (person(s)). With total rent, total area and number of bedrooms in place, Floor space – Bedrooom 2 can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Share of the rent, Each person in this room pays, Share of the rent and Each person in this room pays can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Share of the rent = 3 USD, Each person in this room pays = 3 USD, Share of the rent = 0 USD, Each person in this room pays = 0 USD, Share of the rent = 0 USD, Each person in this room pays = 0 USD and Total area = 10 ft2. The figures come from Total rent as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Floor space – Bedrooom 2 is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Total rent left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Floor space – Bedrooom 2 keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/net-worth', 'name' => 'Net worth Calculator'],
            ['path' => '/finance/new-jersey-sales-tax', 'name' => 'New Jersey sales tax'],
            ['path' => '/finance/new-york-overtime', 'name' => 'New York overtime'],
        ],
        'authors' => [],
    ],
];
