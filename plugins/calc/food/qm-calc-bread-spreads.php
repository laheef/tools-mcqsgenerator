<?php

/**
 * Bread spreads
 * /food/bread-spreads
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bread spreads',
    'meta' => ['title' => 'Bread spreads Calculator — Formula & Results', 'description' => 'Estimate how long a spread will last and its cost from package size, servings and price. Use as a planning guide; adjust for your guests and menu.', 'h1' => 'Bread spreads Calculator', 'updated' => '2026-08-26'],
    'sections' => [
        [
            'title' => 'Select the spread',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Products',
                            'label' => 'Product',
                            'type' => 'select',
                            'options' => [
                                'Nutella' => '3796088044',
                                'Peanut butter' => '2704073450',
                                'Nuts, almond butter' => '3652452864',
                                'Hummus' => '2781057703',
                                'Ricotta, whole milk' => '3679509695',
                                'Cottage cheese' => '2907554951',
                                'Cream cheese' => '2984706320',
                                'Fruit jam' => '4137016255',
                                'Custom' => '0',
                            ],
                            'dataset' => 'products',
                            'control' => 'DROPDOWN',
                            'default' => 'Nutella',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'density',
                            'label' => 'Density',
                            'type' => 'result',
                            'unit' => '33',
                            'unit_default' => 'gcm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Spread usage',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Slices',
                            'label' => 'Slices of bread',
                            'type' => 'number',
                            'suffix' => '/person',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Time_per_week',
                            'label' => 'Eating frequency',
                            'type' => 'number',
                            'suffix' => '/week',
                            'rounding' => ['omni', '0.000001'],
                            'default' => '7',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Teaspoons',
                            'label' => 'Teaspoons per slice',
                            'type' => 'number',
                            'help' => 'We use here US teaspoons equal to 1/3 of US tablespoon and around 4.92 ml. Metric teaspoons are almost the same.',
                            'rounding' => ['omni', '0.000001'],
                            'default' => '3',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'People',
                            'label' => 'People eating',
                            'type' => 'number',
                            'rounding' => ['omni', '0.000001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Jar_capacity',
                            'label' => 'Jar capacity',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Jar_sufficiency',
                            'label' => 'Jar lasts for',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Jar cost',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Cost_jar',
                            'label' => 'Cost of a jar',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Total_price',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'products',
                            'label' => 'Products',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Jar_sufficiency = Jar_capacity * 1000 / (Teaspoons * weight * Slices * People * Time_per_week / 7)',
            'results' => [
                'Slices' => '7000*Jar_capacity/(Jar_sufficiency*People*Teaspoons*Time_per_week*weight)',
                'Teaspoons' => '7000*Jar_capacity/(Jar_sufficiency*People*Slices*Time_per_week*weight)',
                'People' => '7000*Jar_capacity/(Jar_sufficiency*Slices*Teaspoons*Time_per_week*weight)',
                'Jar_sufficiency' => '7000*Jar_capacity/(People*Slices*Teaspoons*Time_per_week*weight)',
                'Time_per_week' => '7000*Jar_capacity/(Jar_sufficiency*People*Slices*Teaspoons*weight)',
                'Jar_capacity' => '(1/7000)*Jar_sufficiency*People*Slices*Teaspoons*Time_per_week*weight',
                'weight' => '7000*Jar_capacity/(Jar_sufficiency*People*Slices*Teaspoons*Time_per_week)',
            ],
        ],
        [
            'title' => 'Total_price = 30 / Jar_sufficiency * Cost_jar',
            'results' => ['Cost_jar' => '(1/30)*Jar_sufficiency*Total_price', 'Jar_sufficiency' => '30*Cost_jar/Total_price', 'Total_price' => '30*Cost_jar/Jar_sufficiency'],
        ],
        [
            'title' => 'products = density',
            'results' => ['density' => 'products', 'products' => 'density'],
        ],
        [
            'title' => 'weight = 5 * density',
            'results' => ['density' => '(1/5)*weight', 'weight' => '5*density'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Bread spreads takes Product, Slices of bread and Eating frequency and returns Density. There is no hidden constant here: change density and product moves with it. The main result, Density, is reported in grams per cubic centimeter.
        TXT,
        'sections' => [
            ['title' => 'How the Bread spreads calculator works', 'html' => <<<'TXT'
            <p>Bread spreads answers one question from 9 numbers, and the answer is Density.</p><p>In the form&#039;s own words, Jar lasts for = 7000 × Jar capacity ÷ (People eating × Slices of bread × Teaspoons per slice × Eating frequency × Weight).</p><p>The result panel carries Density, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 9 boxes, and nothing else.</p><ul><li><strong>Product</strong> — a plain number, no unit</li><li><strong>Slices of bread</strong> — in /person</li><li><strong>Eating frequency</strong> — in /week</li><li><strong>Teaspoons per slice</strong> — a plain number, no unit. We use here US teaspoons equal to 1/3 of US tablespoon and around 4.92 ml. Metric teaspoons are almost the same.</li><li><strong>People eating</strong> — a plain number, no unit</li><li><strong>Jar capacity</strong> — in grams</li><li><strong>Jar lasts for</strong> — in days</li><li><strong>Cost of a jar</strong> — in USD</li><li><strong>Total cost</strong> — in USD</li></ul><p>What you get back is Density in grams per cubic centimeter, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Product = 3.796e+9 gives <strong>Products</strong> = 0 and <strong>Weight</strong> = 0.</p><ul><li><strong>Products</strong> = 0</li><li><strong>Weight</strong> = 0</li></ul><p>That is <strong>Jar lasts for</strong> = <code>7000 × Jar capacity ÷ (People eating × Slices of bread × Teaspoons per slice × Eating frequency × Weight)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Products</strong> = 0 and <strong>Weight</strong> = 0 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Density offers 8 units and opens on grams per cubic centimeter, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Jar lasts for</strong> = <code>7000 × Jar capacity ÷ (People eating × Slices of bread × Teaspoons per slice × Eating frequency × Weight)</code></li><li><strong>Slices of bread</strong> = <code>7000 × Jar capacity ÷ (Jar lasts for × People eating × Teaspoons per slice × Eating frequency × Weight)</code></li><li><strong>Teaspoons per slice</strong> = <code>7000 × Jar capacity ÷ (Jar lasts for × People eating × Slices of bread × Eating frequency × Weight)</code></li><li><strong>People eating</strong> = <code>7000 × Jar capacity ÷ (Jar lasts for × Slices of bread × Teaspoons per slice × Eating frequency × Weight)</code></li><li><strong>Eating frequency</strong> = <code>7000 × Jar capacity ÷ (Jar lasts for × People eating × Slices of bread × Teaspoons per slice × Weight)</code></li><li><strong>Jar capacity</strong> = <code>(1 ÷ 7000) × Jar lasts for × People eating × Slices of bread × Teaspoons per slice × Eating frequency × Weight</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Jar lasts for</strong> = <code>7000 × Jar capacity ÷ (People eating × Slices of bread × Teaspoons per slice × Eating frequency × Weight)</code> — the form to use when Jar capacity, People eating, Slices of bread and Teaspoons per slice are the values you have.</li><li><strong>Slices of bread</strong> = <code>7000 × Jar capacity ÷ (Jar lasts for × People eating × Teaspoons per slice × Eating frequency × Weight)</code> — the form to use when Jar capacity, Jar lasts for, People eating and Teaspoons per slice are the values you have.</li><li><strong>Teaspoons per slice</strong> = <code>7000 × Jar capacity ÷ (Jar lasts for × People eating × Slices of bread × Eating frequency × Weight)</code> — the form to use when Jar capacity, Jar lasts for, People eating and Slices of bread are the values you have.</li><li><strong>People eating</strong> = <code>7000 × Jar capacity ÷ (Jar lasts for × Slices of bread × Teaspoons per slice × Eating frequency × Weight)</code> — the form to use when Jar capacity, Jar lasts for, Slices of bread and Teaspoons per slice are the values you have.</li><li><strong>Eating frequency</strong> = <code>7000 × Jar capacity ÷ (Jar lasts for × People eating × Slices of bread × Teaspoons per slice × Weight)</code> — the form to use when Jar capacity, Jar lasts for, People eating and Slices of bread are the values you have.</li><li><strong>Jar capacity</strong> = <code>(1 ÷ 7000) × Jar lasts for × People eating × Slices of bread × Teaspoons per slice × Eating frequency × Weight</code> — the form to use when Jar lasts for, People eating, Slices of bread and Teaspoons per slice are the values you have.</li><li><strong>Weight</strong> = <code>7000 × Jar capacity ÷ (Jar lasts for × People eating × Slices of bread × Teaspoons per slice × Eating frequency)</code> — the form to use when Jar capacity, Jar lasts for, People eating and Slices of bread are the values you have.</li><li><strong>Total cost</strong> = <code>30 × Cost of a jar ÷ Jar lasts for</code> — the form to use when Cost of a jar and Jar lasts for are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Jar lasts for, Slices of bread and Teaspoons per slice can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Product from 3.796e+9 to 7.592e+9, leaving every other box alone. The panel moves from <strong>Products</strong> 0 and <strong>Weight</strong> 0 to <strong>Products</strong> 0 and <strong>Weight</strong> 0.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Jar capacity and Jar lasts for is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Density is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Product left as a guess.</strong> If Product is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Slices of bread left as a guess.</strong> If Slices of bread is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> If Product is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Product</strong> takes a plain number with no unit attached. Check the field label and unit before calculating.</li><li><strong>Slices of bread</strong> is measured in /person. Change it and Teaspoons per slice, People eating and Jar lasts for changes with it. Check the field label and unit before calculating.</li><li><strong>Eating frequency</strong> is measured in /week. Change it and Slices of bread, Teaspoons per slice and People eating changes with it. Check the field label and unit before calculating.</li><li><strong>Teaspoons per slice</strong> takes a plain number with no unit attached. We use here US teaspoons equal to 1/3 of US tablespoon and around 4.92 ml. Metric teaspoons are almost the same. Change it and Slices of bread, People eating and Jar lasts for changes with it. Check the field label and unit before calculating.</li><li><strong>People eating</strong> takes a plain number with no unit attached. Change it and Slices of bread, Teaspoons per slice and Jar lasts for changes with it. Check the field label and unit before calculating.</li><li><strong>Jar capacity</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. Change it and Slices of bread, Teaspoons per slice and People eating changes with it. Check the field label and unit before calculating.</li><li><strong>Jar lasts for</strong> is a days quantity: the page opens it in days and converts anything else you pick before the formula runs. Change it and Slices of bread, Teaspoons per slice and People eating changes with it. Check the field label and unit before calculating.</li><li><strong>Cost of a jar</strong> takes a plain number with no unit attached. Change it and Jar lasts for and Total cost changes with it. Check the field label and unit before calculating.</li><li><strong>Total cost</strong> takes a plain number with no unit attached. Change it and Cost of a jar and Jar lasts for changes with it. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Density</strong> is a grams per cubic centimeter figure. It is computed from Products, so it changes the moment any of them does. </li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p> The tables, with the unit each box opens in:</p><ul><li><strong>grams per cubic centimeter</strong> — opens in <em>gcm3</em>, and the chip also carries lb/cu ft, lb/cu yd, g/cm³, g/dm³, g/L and kg/cm³. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>grams</strong> — opens in <em>g</em>, and the chip also carries g, mg, lb, oz and st. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>days</strong> — opens in <em>days</em>, and the chip also carries hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Density follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover grams per cubic centimeter, grams and days. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Product, Slices of bread and Eating frequency is what you already know and Density is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/salad-calories">Salad calories Calculator</a>, <a href="/food/self-rising-flour">Self-rising flour Calculator</a> and <a href="/food/sourdough">Sourdough Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bread spreads calculator work out?', 'a' => <<<'TXT'
            Density, from Jar capacity, People eating, Slices of bread and Teaspoons per slice. The relationship is Jar lasts for = 7000 × Jar capacity ÷ (People eating × Slices of bread × Teaspoons per slice × Eating frequency × Weight).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Product, Slices of bread (/person), Eating frequency (/week), Teaspoons per slice, People eating. Enter product, slices of bread and eating frequency; Density is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Jar lasts for, Slices of bread, Teaspoons per slice and People eating can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'Are the Bread spreads results exact?', 'a' => 'No. It estimates from the guest count and selections shown; appetite, menu, portions and serving style vary. Use the result as a planning starting point and adjust for your event.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Product left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
        ],
        'related' => [
            ['path' => '/food/butter', 'name' => 'Butter'],
            ['path' => '/food/oil-to-butter', 'name' => 'Oil to butter'],
            ['path' => '/food/garlic-converter', 'name' => 'Garlic converter']
        ],
    ],
];
