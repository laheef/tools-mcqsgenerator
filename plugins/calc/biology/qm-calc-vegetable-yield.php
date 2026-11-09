<?php

/**
 * Vegetable yield
 * /biology/vegetable-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Vegetable yield',
    'meta' => ['title' => 'Vegetable yield Calculator: Units & Formula', 'description' => 'Vegetable yield works out seed distance (isolation distance) from choose crop. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Vegetable yield Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'crop_type',
                            'label' => 'Choose crop',
                            'type' => 'select',
                            'options' => [
                                'Artichoke' => '1',
                                'Beans  ' => '2',
                                'Beets  ' => '3',
                                'Broccoli  ' => '4',
                                'Brussel Sprouts' => '5',
                                'Cabbage  ' => '6',
                                'Carrots  ' => '7',
                                'Cauliflower  ' => '8',
                                'Celery  ' => '9',
                                'Chard  ' => '10',
                                'Collards  ' => '11',
                                'Corn  ' => '12',
                                'Cucumbers  ' => '13',
                                'Eggplant  ' => '14',
                                'Garlic  ' => '15',
                                'Kale  ' => '16',
                                'Kohlrabi  ' => '17',
                                'Leek  ' => '18',
                                'Lettuce  ' => '19',
                                'Melons  ' => '20',
                                'Okra  ' => '21',
                                'Onions  ' => '22',
                                'Peas  ' => '23',
                                'Peppers  ' => '24',
                                'Potatoes  ' => '25',
                                'Pumpkins  ' => '26',
                                'Radish  ' => '27',
                                'Spinach  ' => '28',
                                'Squash  ' => '29',
                                'Tomatoes  ' => '30',
                                'Turnips  ' => '31',
                                'Watermelons  ' => '32',
                            ],
                            'dataset' => 'veggie',
                            'control' => 'DROPDOWN',
                            'default' => 'Artichoke',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'length_of_row',
                            'label' => 'Length of rows',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'no_of_rows',
                            'label' => 'Number of rows',
                            'type' => 'number',
                            'suffix' => 'row(s)',
                            'rounding' => ['standard', '0'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yield_rate',
                            'label' => 'Yield rate',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'seed_distance_copy',
                            'label' => 'Seed distance (isolation distance)',
                            'type' => 'number',
                            'help' => 'Minimum distance required between seeds.',
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
                            'name' => 'seed_distance',
                            'label' => 'Seed distance',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'expected_yield',
                            'label' => 'Expected yield',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Farm/garden dimensions',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'garden_length',
                            'label' => 'Required length',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'garden_width',
                            'label' => 'Required width',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'garden_area',
                            'label' => 'Required area',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'expected_yield = length_of_row * one_way(no_of_rows) * one_way(yield_rate)',
            'results' => ['expected_yield' => 'length_of_row*(no_of_rows)*(yield_rate)', 'length_of_row' => 'expected_yield/((no_of_rows)*(yield_rate))'],
        ],
        [
            'title' => 'seed_distance_copy = one_way(seed_distance)',
            'results' => ['seed_distance_copy' => '(seed_distance)'],
        ],
        [
            'title' => 'garden_length = one_way(length_of_row + 3 + 2*seed_distance / 12)',
            'results' => ['garden_length' => '(length_of_row + (1/6)*seed_distance + 3)'],
        ],
        [
            'title' => 'garden_width = one_way(((no_of_rows + 1) * seed_distance / 12) + (no_of_rows - 1) * 1.5)',
            'results' => ['garden_width' => '((1/12)*no_of_rows*seed_distance + (3/2)*no_of_rows + (1/12)*seed_distance - 3/2)'],
        ],
        [
            'title' => 'garden_area = one_way(garden_length * garden_width)',
            'results' => ['garden_area' => '((length_of_row + (1/6)*seed_distance + 3)*((1/12)*no_of_rows*seed_distance + (3/2)*no_of_rows + (1/12)*seed_distance - 3/2))'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Vegetable yield turns Choose crop, Length of rows and Number of rows into Yield rate and Seed distance. It is a single relationship that reads yield rate out of choose crop, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Vegetable yield calculator works', 'html' => <<<'TXT'
            <p>The Vegetable yield calculator applies one relationship to 8 numbers and reports Yield rate and Seed distance.</p><p>The relationship it solves reads Expected yield = Length of rows × (Number of rows) × (Yield rate).</p><p>The answers are Yield rate and Seed distance; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 8 boxes and the page has everything it needs.</p><ul><li><strong>Choose crop</strong> — a plain number, no unit</li><li><strong>Length of rows</strong> — in meters</li><li><strong>Number of rows</strong> — in row(s)</li><li><strong>Seed distance (isolation distance)</strong> — in centimeters. Minimum distance required between seeds.</li><li><strong>Expected yield</strong> — in kilograms</li><li><strong>Required length</strong> — a plain number, no unit</li><li><strong>Required width</strong> — a plain number, no unit</li><li><strong>Required area</strong> — a plain number, no unit</li></ul><p>The result boxes are Yield rate, Seed distance; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Choose crop = 1 and Number of rows = 1 row(s); the answers are <strong>Seed distance (isolation distance)</strong> = 0 cm and <strong>Required width</strong> = 0.</p><ul><li><strong>Seed distance (isolation distance)</strong> = 0 cm</li><li><strong>Required width</strong> = 0</li></ul><p>That is <strong>Expected yield</strong> = <code>Length of rows × (Number of rows) × (Yield rate)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Seed distance (isolation distance)</strong> = 0 and <strong>Required width</strong> = 0 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Length of rows offers 9 units and opens on meters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Expected yield</strong> = <code>Length of rows × (Number of rows) × (Yield rate)</code></li><li><strong>Length of rows</strong> = <code>Expected yield ÷ ((Number of rows) × (Yield rate))</code></li><li><strong>Seed distance (isolation distance)</strong> = <code>(Seed distance)</code></li><li><strong>Required length</strong> = <code>(Length of rows + (1 ÷ 6) × Seed distance + 3)</code></li><li><strong>Required width</strong> = <code>((1 ÷ 12) × Number of rows × Seed distance + (3 ÷ 2) × Number of rows + (1 ÷ 12) × Seed distance − 3 ÷ 2)</code></li><li><strong>Required area</strong> = <code>((Length of rows + (1 ÷ 6) × Seed distance + 3) × ((1 ÷ 12) × Number of rows × Seed distance + (3 ÷ 2) × Number of rows + (1 ÷ 12) × Seed distance − 3 ÷ 2))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Expected yield</strong> = <code>Length of rows × (Number of rows) × (Yield rate)</code> — the form to use when Length of rows, Number of rows and Yield rate are the values you have.</li><li><strong>Length of rows</strong> = <code>Expected yield ÷ ((Number of rows) × (Yield rate))</code> — the form to use when Expected yield, Number of rows and Yield rate are the values you have.</li><li><strong>Seed distance (isolation distance)</strong> = <code>(Seed distance)</code> — the form to use when Seed distance are the values you have.</li><li><strong>Required length</strong> = <code>(Length of rows + (1 ÷ 6) × Seed distance + 3)</code> — the form to use when Length of rows and Seed distance are the values you have.</li><li><strong>Required width</strong> = <code>((1 ÷ 12) × Number of rows × Seed distance + (3 ÷ 2) × Number of rows + (1 ÷ 12) × Seed distance − 3 ÷ 2)</code> — the form to use when Number of rows and Seed distance are the values you have.</li><li><strong>Required area</strong> = <code>((Length of rows + (1 ÷ 6) × Seed distance + 3) × ((1 ÷ 12) × Number of rows × Seed distance + (3 ÷ 2) × Number of rows + (1 ÷ 12) × Seed distance − 3 ÷ 2))</code> — the form to use when Length of rows, Seed distance and Number of rows are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Expected yield, Length of rows and Seed distance (isolation distance) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Choose crop from 1 to 2, leaving every other box alone. The panel moves from <strong>Seed distance (isolation distance)</strong> 0 cm and <strong>Required width</strong> 0 to <strong>Seed distance (isolation distance)</strong> 0 cm and <strong>Required width</strong> 0.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Length of rows, Seed distance (isolation distance) and Expected yield is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Yield rate and Seed distance are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Choose crop left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Choose crop is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Length of rows left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Length of rows is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Choose crop and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Choose crop</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Choose crop is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Length of rows</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. It feeds Expected yield, Required length and Required area. Have it to hand before you start: Length of rows is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of rows</strong> is measured in row(s). It feeds Expected yield, Length of rows and Required width. Have it to hand before you start: Number of rows is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Seed distance (isolation distance)</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Minimum distance required between seeds. Have it to hand before you start: Seed distance (isolation distance) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Expected yield</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. It feeds Length of rows. Have it to hand before you start: Expected yield is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Required length</strong> takes a plain number with no unit attached. Have it to hand before you start: Required length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Required width</strong> takes a plain number with no unit attached. Have it to hand before you start: Required width is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Required area</strong> takes a plain number with no unit attached. Have it to hand before you start: Required area is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Yield rate</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Seed distance</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Seed distance (isolation distance)</th><th>Required width</th></tr></thead><tbody><tr><td><strong>Choose crop</strong> +10%</td><td>—</td><td>—</td></tr><tr><td><strong>Number of rows</strong> +10%</td><td>—</td><td>—</td></tr></tbody></table><p>Ranked by leverage, Choose crop sits at the top — a ten per cent error in that box shows up as roughly 0 per cent in the answer. By contrast, Choose crop and Number of rows barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Choose crop = 0.5 and Number of rows = 0.5 row(s), the answer is <strong>Seed distance (isolation distance)</strong> = 0 cm and <strong>Required width</strong> = -0.75.</li><li>With Choose crop = 3 and Number of rows = 1 row(s), the answer is <strong>Seed distance (isolation distance)</strong> = 0 cm and <strong>Required width</strong> = 0.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>meters</strong> — opens in <em>m</em>, and the chip also carries cm, m, km, in, ft and yd. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>kilograms</strong> — opens in <em>kg</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Yield rate follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are meters and kilograms and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Choose crop, Length of rows and Number of rows are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Choose crop, Length of rows and Number of rows measured, Yield rate and Seed distance wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Vegetable yield calculator work out?', 'a' => <<<'TXT'
            Yield rate and Seed distance, from Length of rows, Number of rows and Yield rate. The relationship is Expected yield = Length of rows × (Number of rows) × (Yield rate).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Choose crop, Length of rows (meters), Number of rows (row(s)), Seed distance (isolation distance) (centimeters), Expected yield (kilograms). Enter choose crop, length of rows and number of rows; Yield rate is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Expected yield, Length of rows, Seed distance (isolation distance) and Required length can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Seed distance (isolation distance) = 0 cm and Required width = 0. Those are the defaults written into the form — move Choose crop and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Yield rate is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Choose crop left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Yield rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/protein-gravy-calculator', 'name' => 'Protein GRAVY (Hydropathy) Calculator'],
            ['path' => '/biology/protein-hydrodynamic-radius', 'name' => 'Protein Hydrodynamic Radius Calculator'],
            ['path' => '/biology/protein-isoelectric-point', 'name' => 'Protein Isoelectric Point Calculator'],
        ],
        'authors' => [],
    ],
];
