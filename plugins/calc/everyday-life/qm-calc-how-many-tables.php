<?php

/**
 * How many tables
 * /everyday-life/how-many-tables
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'How many tables',
    'meta' => ['title' => 'How many tables — Formula, Steps & Examples', 'description' => 'How many tables works out number of seats at one table from i want to know.... Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'How many tables Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calcOption',
                            'label' => 'I want to know...',
                            'type' => 'select',
                            'options' => ['How many people I can seat at my table' => '0', 'How many tables do I need' => '1'],
                            'dataset' => 'calc_option',
                            'default' => 'How many people I can seat at my table',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tableShape',
                            'label' => 'Table shape',
                            'type' => 'select',
                            'options' => ['Rectangular' => '1', 'Round' => '0'],
                            'dataset' => 'table_shape',
                            'default' => 'Rectangular',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'geometry/area/rectangle.svg'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'tableShape == 0', 'text' => 'One seat requires around 70&nbsp;cm at the round table.&nbsp;'],
                                ['when' => 'tableShape == 1', 'text' => 'Table\'s width (a) should be at least 80&nbsp;cm to sit comfortably on both sides.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'width',
                            'label' => 'Space for one person at the table',
                            'type' => 'number',
                            'help' => 'Typical value for one person should be around 60&nbsp;cm.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '60', 'when' => null],
                                ['value' => '23.62', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'arc',
                            'label' => 'Space for one person at the table',
                            'type' => 'number',
                            'help' => 'Arc length for one person. Typical value for one person should be around 70&nbsp;cm.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '70', 'when' => null],
                                ['value' => '27.56', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Length (b)',
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
                            'name' => 'radius',
                            'label' => 'Radius (r)',
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
                            'name' => 'numGuest',
                            'label' => 'Total number of guests',
                            'type' => 'number',
                            'help' => 'How many people do you want to sit at the table?',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numPeople',
                            'label' => 'Number of seats at one table',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numPeopleRound',
                            'label' => 'Number of seats at one table',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tableCounter',
                            'label' => 'How many tables I need',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tableCounterRound',
                            'label' => 'How many tables I need',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'tableShape == 0 and radius >= 70 and calcOption != 0', 'text' => 'One table can sit {{numPeopleRound.formattedValue}} people.&nbsp;'],
                                ['when' => 'tableShape == 1 and length >= 0.6 and calcOption == 0', 'text' => <<<'TXT'
                                You may sit up to {{numPeople.formattedValue}} people together on both sides and up to {{numPeopleMax.formattedValue}} if they will sit at the head of the table.
                                TXT],
                            ],
                        ],
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
                            'name' => 'numPeopleMax',
                            'label' => 'Num people max',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'numPeople = (floor(length/width))*2',
            'results' => ['numPeople' => '2*floor(length/width)'],
        ],
        [
            'title' => 'numPeopleRound = floor(2*pi*radius/arc)',
            'results' => ['numPeopleRound' => 'floor(2*PI*radius/arc)'],
        ],
        [
            'title' => 'tableCounter = one_way(ceil(numGuest / numPeople))',
            'results' => ['tableCounter' => '(ceil((1/2)*numGuest/floor(length/width)))'],
        ],
        [
            'title' => 'tableCounterRound = one_way(ceil(numGuest / numPeopleRound))',
            'results' => ['tableCounterRound' => '(ceil(numGuest/floor(2*PI*radius/arc)))'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => 'The How many tables calculator works out <strong>number of seats at one table</strong> from the space for one person at the table, the length and the radius.',
        'sections' => [
            ['title' => 'How does the How many tables calculator work?', 'html' => <<<'TXT'
            <p>The How many tables calculator takes the values in the form, applies the relationship described below and reports <strong>number of seats at one table</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the table shape); then you type in the space for one person at the table, the space for one person at the table (2), the length (b) and the radius (r).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as how many people I can seat at my table and how many tables do I need. </li><li>Pick the option that matches your case — 2 options, such as rectangular and round. </li><li>A plain number with no unit attached.</li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Table shape</strong></td><td>One of 2 options, such as rectangular and round.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Space for one person at the table</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Space for one person at the table (2)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Length (b)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Radius (r)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Total number of guests</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Number of seats at one table</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Number of seats at one table (2)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>How many tables I need</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>How many tables I need (2)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the How many tables calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Number of seats at one table</span><span class="formula-eq">=</span><span class="formula-rhs">2 × rounded down, (length (b) ÷ space for one person at the table)</span></div><div class="formula-row"><span class="formula-lhs">Number of seats at one table</span><span class="formula-eq">=</span><span class="formula-rhs">rounded down, (2 × PI × radius (r) ÷ space for one person at the table)</span></div><div class="formula-row"><span class="formula-lhs">How many tables I need</span><span class="formula-eq">=</span><span class="formula-rhs">(rounded up, ((1 ÷ 2) × total number of guests ÷ rounded down, (length (b) ÷ space for one person at the table)))</span></div><div class="formula-row"><span class="formula-lhs">How many tables I need</span><span class="formula-eq">=</span><span class="formula-rhs">(rounded up, (total number of guests ÷ rounded down, (2 × PI × radius (r) ÷ space for one person at the table)))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>I want to know</strong> set to How many people I can seat at my table, <strong>Table shape</strong> set to Rectangular, <strong>Space for one person at the table</strong> = 30 cm and <strong>Length (b)</strong> = 30 cm. Working through the relationship above gives <strong>Number of seats at one table</strong> = 2 and <strong>How many tables I need</strong> = 5.</p><p>Read it as a template. Every number above can be replaced with one of yours; only the relationship between them is fixed.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Number of seats at one table</strong> = 2 and <strong>How many tables I need</strong> = 5 should be roughly the size you expected from <strong>I want to know</strong> set to How many people I can seat at my table and <strong>Table shape</strong> set to Rectangular.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The How many tables calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 3 figures keep coming back — the space for one person at the table, the length and the radius — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/baby-age">Baby age</a>, <a href="/everyday-life/back-to-school">Back to school</a> and <a href="/everyday-life/bag">Bag</a>.</p>
            TXT],
            ['title' => 'Planning seating around the table shape', 'html' => <<<'TXT'
            <p>Start with the shape and the meaning of the two modes in the form: one mode estimates how many people fit at a table, while the other works from a required number of tables. The result depends on the space allocated to each person and the table’s dimensions. Treat it as a seating-layout estimate, not a final floor plan. Real chairs, table legs, service access and circulation paths all consume space that a simple perimeter or area calculation may not represent.</p>
            <p>Measure the tabletop dimensions, not the distance between chair backs. For a rectangular table, length and the available side or end positions influence how many seats can be placed. For a round table, radius describes the table itself; confirm whether the form asks for radius rather than diameter before entering a tape-measure value. Entering the diameter into a radius field doubles that dimension and can substantially distort the estimate.</p>
            <p>The space-per-person input is a planning choice. A compact setting for a short meal differs from a comfortable layout with wider chairs, place settings and room to serve food. If the event includes mobility devices, child seats, broad chairs or guests who need extra elbow room, increase the allowance and plan an accessible route. Do not use a maximum theoretical seat count if it would block exits or make it difficult for guests to move safely.</p>
            <p>After calculating, sketch the room at scale or tape out the table footprint on the floor. Add chair pull-back space on each occupied side and a clear route to doors, food stations and restrooms. Several smaller tables may use a room differently from one large table even when the total seat count is similar. Venues also set fire-code and accessibility requirements that the calculator cannot assess, so follow the venue’s approved plan.</p>
            <p>For a practical estimate, run at least two scenarios: a comfortable spacing and a tighter-but-acceptable arrangement. Compare the results with the furniture you actually have, including table legs and chair widths. Round down when the answer is near a whole seat and check that seats can be reached without guests climbing over one another. If the calculator estimates a number of tables, remember that table sizes and room layout may make the calculated count impossible to arrange efficiently.</p>
            <p>Use this result as an early planning tool for a dinner, meeting or event. Confirm the final layout with the venue or event coordinator, particularly when there are aisle, service or accessibility requirements. The most useful seating count is the one that can be set up comfortably and safely in the real room, not simply the largest number returned by a formula.</p>
            TXT],
            ['title' => 'Check the layout before confirming a count', 'html' => <<<'TXT'
            <p>Mark doors, columns, buffet lines and fixed furniture on the room sketch before arranging tables. A mathematically sufficient number of seats may not fit once those obstacles and walking paths are included. If you have a mix of table shapes, calculate each group separately and add the usable seats, rather than treating all tables as identical. Leave a buffer for guests who need extra room and for staff carrying food or equipment.</p><p>Confirm table dimensions with the supplier; rental tables described by the same name can vary slightly. A small dimension change can alter a close-to-capacity layout.</p>
            TXT],
            ['title' => 'Include chairs and service space', 'html' => <<<'TXT'
            <p>Seat count is only one part of a workable arrangement. Check the chair width and how far each chair needs to slide out; a table that fits on paper may leave no room for guests to sit down. Add separate space for a server to pass, a wheelchair turning area where needed and a clear route to exits. Verify the venue’s safety requirements instead of relying on a generic floor-area estimate.</p><p>If you are planning a meal, consider plate size, shared dishes and serving style. Guests need more table edge for a family-style meal than for a short meeting with notebooks. When in doubt, choose the more generous spacing scenario and confirm the final arrangement with the venue or rental supplier.</p>
            TXT],
            ['title' => 'Round the estimate to a usable arrangement', 'html' => <<<'TXT'
            <p>Convert a fractional estimate into a layout you can actually set: seats are whole places, and a small reduction may be sensible if it improves access. If the room has fixed furniture, calculate the usable area after those obstacles are removed. Revisit the count when guest numbers or table dimensions change rather than assuming the earlier plan still fits.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the How many tables calculator work out?', 'a' => 'It returns number of seats at one table, derived from the space for one person at the table, the length and the radius.'],
            ['q' => 'What do I need to enter to use the How many tables calculator?', 'a' => 'The form asks for the space for one person at the table, the length and the radius, which is 7 fields in total.'],
            ['q' => 'Can I enter space for one person at the table in a different unit?', 'a' => 'Yes. Space for one person at the table opens in centimeters and the chip beside it offers 34 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Number of seats at one table = 2.'],
        ],
        'related' => [
            ['path' => '/everyday-life/baby-age', 'name' => 'Baby age'],
            ['path' => '/everyday-life/back-to-school', 'name' => 'Back to school'],
            ['path' => '/everyday-life/bag', 'name' => 'Bag'],
        ],
    ],
];
