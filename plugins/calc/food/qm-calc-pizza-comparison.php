<?php

/**
 * Pizza comparison
 * /food/pizza-comparison
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pizza comparison',
    'meta' => ['title' => 'Pizza comparison — Formula, Steps & Examples', 'description' => 'Compare pizza sizes, prices and value using diameter, price and serving details. Check units and follow the recipe or package directions.', 'h1' => 'Pizza comparison Calculator', 'updated' => '2026-07-28'],
    'sections' => [
        [
            'title' => 'Smaller pizza',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pizza1_diameter',
                            'label' => 'Diameter',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'No_pizza1',
                            'label' => 'Number of pizzas',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'Price_pizza1',
                            'label' => 'Price per pizza',
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
                            'name' => 'Pizza1_totalprice',
                            'label' => 'Total price',
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
        [
            'title' => 'Larger pizza',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pizza2_diameter',
                            'label' => 'Diameter',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'No_pizza2',
                            'label' => 'Number of pizzas',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'Price_pizza2',
                            'label' => 'Price',
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
                            'name' => 'Pizza2_totalprice',
                            'label' => 'Total price',
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
        [
            'title' => 'Savings ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Price_difference',
                            'label' => 'Price difference',
                            'type' => 'number',
                            'help' => 'Difference between the price of one or more larger pizzas and one or more smaller pizzas.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Area comparison',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Pizza1_area',
                            'label' => 'Area of a small pizza',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'cm2',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Total1',
                            'label' => 'Total area of the small pizzas',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'cm2',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Pizza2_area',
                            'label' => 'Area of a large pizza',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'cm2',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Total2',
                            'label' => 'Total area of the large pizzas',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'cm2',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Area_percent',
                            'label' => 'Area difference',
                            'type' => 'number',
                            'help' => 'How much different the area of a larger pizza is when compared to the area of another or combination of smaller ones.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Pizza1_area = (pizza1_diameter/2) ^ 2 * pi',
            'results' => ['Pizza1_area' => '(1/4)*PI*pow(pizza1_diameter, 2)', 'pizza1_diameter' => '2*sqrt(Pizza1_area)/sqrt(PI)'],
        ],
        [
            'title' => 'Pizza2_area = (pizza2_diameter/2) ^ 2  * 3.14159265',
            'results' => ['pizza2_diameter' => '(4000/20943951)*sqrt(34906585)*sqrt(Pizza2_area)', 'Pizza2_area' => '(62831853/80000000)*pow(pizza2_diameter, 2)'],
        ],
        [
            'title' => 'Total1 = No_pizza1 * Pizza1_area',
            'results' => ['Pizza1_area' => 'Total1/No_pizza1', 'Total1' => 'No_pizza1*Pizza1_area', 'No_pizza1' => 'Total1/Pizza1_area'],
        ],
        [
            'title' => 'Total2 = No_pizza2 * Pizza2_area',
            'results' => ['No_pizza2' => 'Total2/Pizza2_area', 'Total2' => 'No_pizza2*Pizza2_area', 'Pizza2_area' => 'Total2/No_pizza2'],
        ],
        [
            'title' => 'Area_percent = Total2 / Total1',
            'results' => ['Area_percent' => 'Total2/Total1', 'Total1' => 'Total2/Area_percent', 'Total2' => 'Area_percent*Total1'],
        ],
        [
            'title' => 'Pizza1_totalprice = No_pizza1 * Price_pizza1',
            'results' => ['Price_pizza1' => 'Pizza1_totalprice/No_pizza1', 'Pizza1_totalprice' => 'No_pizza1*Price_pizza1', 'No_pizza1' => 'Pizza1_totalprice/Price_pizza1'],
        ],
        [
            'title' => 'Pizza2_totalprice = No_pizza2 * Price_pizza2',
            'results' => ['No_pizza2' => 'Pizza2_totalprice/Price_pizza2', 'Pizza2_totalprice' => 'No_pizza2*Price_pizza2', 'Price_pizza2' => 'Pizza2_totalprice/No_pizza2'],
        ],
        [
            'title' => 'Price_difference = Pizza2_totalprice / Pizza1_totalprice',
            'results' => ['Pizza1_totalprice' => 'Pizza2_totalprice/Price_difference', 'Pizza2_totalprice' => 'Pizza1_totalprice*Price_difference', 'Price_difference' => 'Pizza2_totalprice/Pizza1_totalprice'],
        ],
    ],
    'article' => [
        'intro' => 'Pizza comparison works in both directions, between number of pizzas and price per pizza.',
        'sections' => [
            ['title' => 'How the Pizza comparison calculator works', 'html' => <<<'TXT'
            <p>The Pizza comparison calculator applies one relationship to 1 number and reports Number of pizzas, Price per pizza and Total price.</p><p>Written with the labels from the form, Area of a small pizza = (1 ÷ 4) × PI × (Diameter)^(2).</p><p>The answers are Number of pizzas, Price per pizza, Total price and Diameter; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Diameter</strong> — in centimeters</li></ul><p>What you get back is Number of pizzas, Price per pizza in USD, Total price in USD, Diameter in centimeters, Number of pizzas, Price in USD, Total price in USD, Price difference in percent, Area of a small pizza in square centimeters, Total area of the small pizzas in square centimeters, Area of a large pizza in square centimeters, Total area of the large pizzas in square centimeters, Area difference in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Diameter = 10 cm, Number of pizzas = 2, Price per pizza = 1000 USD, Total price = 10 USD, Diameter = 100 cm, Number of pizzas = 1, Price = 10 USD, Total price = 100 USD, Price difference = 1000 perc, Total area of the small pizzas = 10 cm2, Area of a large pizza = 100 cm2, Total area of the large pizzas = 1000 cm2 and Area difference = 10 perc gives <strong>Area of a small pizza</strong> = 78.54 cm2.</p><ul><li><strong>Area of a small pizza</strong> = 78.54 cm2</li></ul><p>The line behind those figures is <strong>Area of a small pizza</strong> = <code>(1 ÷ 4) × PI × (Diameter)^(2)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Area of a small pizza</strong> = 78.54 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Diameter offers 7 units and opens on centimeters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Area of a small pizza</strong> = <code>(1 ÷ 4) × PI × (Diameter)^(2)</code></li><li><strong>Diameter</strong> = <code>2 × √(Area of a small pizza) ÷ √(PI)</code></li><li><strong>Area of a large pizza</strong> = <code>(62831853 ÷ 80000000) × (Diameter)^(2)</code></li><li><strong>Total area of the small pizzas</strong> = <code>Number of pizzas × Area of a small pizza</code></li><li><strong>Number of pizzas</strong> = <code>Total area of the small pizzas ÷ Area of a small pizza</code></li><li><strong>Total area of the large pizzas</strong> = <code>Number of pizzas × Area of a large pizza</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Area of a small pizza</strong> = <code>(1 ÷ 4) × PI × (Diameter)^(2)</code> — the form to use when Diameter are the values you have.</li><li><strong>Diameter</strong> = <code>2 × √(Area of a small pizza) ÷ √(PI)</code> — the form to use when Area of a small pizza are the values you have.</li><li><strong>Area of a large pizza</strong> = <code>(62831853 ÷ 80000000) × (Diameter)^(2)</code> — the form to use when Diameter are the values you have.</li><li><strong>Diameter</strong> = <code>(4000 ÷ 20943951) × √(34906585) × √(Area of a large pizza)</code> — the form to use when Area of a large pizza are the values you have.</li><li><strong>Total area of the small pizzas</strong> = <code>Number of pizzas × Area of a small pizza</code> — the form to use when Number of pizzas and Area of a small pizza are the values you have.</li><li><strong>Area of a small pizza</strong> = <code>Total area of the small pizzas ÷ Number of pizzas</code> — the form to use when Total area of the small pizzas and Number of pizzas are the values you have.</li><li><strong>Number of pizzas</strong> = <code>Total area of the small pizzas ÷ Area of a small pizza</code> — the form to use when Total area of the small pizzas and Area of a small pizza are the values you have.</li><li><strong>Total area of the large pizzas</strong> = <code>Number of pizzas × Area of a large pizza</code> — the form to use when Number of pizzas and Area of a large pizza are the values you have.</li></ul><p>Any one of Area of a small pizza, Diameter and Area of a large pizza can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Diameter, from 10 to 20 — and the answers go from <strong>Area of a small pizza</strong> 78.54 cm2 to <strong>Area of a small pizza</strong> 314 cm2.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Diameter is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Number of pizzas, Price per pizza and Total price are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Diameter left as a guess.</strong> If Diameter is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Diameter and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Diameter</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. The page reads it when it works out Area of a small pizza. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>Number of pizzas</strong> is a plain number. The value follows from Total area of the small pizzas and Area of a small pizza. </li><li><strong>Price per pizza</strong> is a plain number. The value follows from Total price and Number of pizzas. </li><li><strong>Total price</strong> is a plain number. The value follows from Number of pizzas and Price per pizza. </li><li><strong>Diameter</strong> is a centimeters figure. The value follows from Area of a large pizza. </li><li><strong>Number of pizzas</strong> is a plain number. The value follows from Total area of the large pizzas and Area of a large pizza. </li><li><strong>Price</strong> is a plain number. The value follows from Total price and Number of pizzas. </li><li><strong>Total price</strong> is a plain number. The value follows from Number of pizzas and Price. </li><li><strong>Price difference</strong> is a percent figure. The value follows from Total price and Total price. </li><li><strong>Area of a small pizza</strong> is a square centimeters figure and the page's own defaults put it at 78.54 cm2. The value follows from Diameter. </li><li><strong>Total area of the small pizzas</strong> is a square centimeters figure. The value follows from Number of pizzas and Area of a small pizza. </li><li><strong>Area of a large pizza</strong> is a square centimeters figure. The value follows from Diameter. </li><li><strong>Total area of the large pizzas</strong> is a square centimeters figure. The value follows from Number of pizzas and Area of a large pizza. </li><li><strong>Area difference</strong> is a percent figure. The value follows from Total area of the large pizzas and Total area of the small pizzas. </li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Number of pizzas is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are centimeters, percent and square centimeters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Diameter are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Diameter measured, Number of pizzas and Price per pizza wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/thanksgiving">Thanksgiving</a>, <a href="/food/turkey-cooking-time">Turkey cooking time Calculator</a> and <a href="/food/turkey-defrost">Turkey defrost time</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pizza comparison calculator work out?', 'a' => 'Number of pizzas, Price per pizza, Total price and Diameter, from Diameter. The relationship is Area of a small pizza = (1 ÷ 4) × PI × (Diameter)^(2).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Diameter (centimeters). Enter diameter; Number of pizzas is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Area of a small pizza, Diameter, Area of a large pizza and Diameter blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'Are the Pizza comparison results exact?', 'a' => 'It uses the values and assumptions represented in the form. Real ingredients and conditions can vary, so check units and follow the recipe, product label or safety instructions that apply.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Number of pizzas is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Diameter left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Number of pizzas keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/perfect-pizza', 'name' => 'Pizza baking'],
            ['path' => '/food/pizza', 'name' => 'Pizza size'],
            ['path' => '/food/pizza-party', 'name' => 'Pizza party']
        ],
    ],
];
