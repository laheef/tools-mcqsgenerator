<?php

/**
 * Pizza party
 * /food/pizza-party
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pizza party',
    'meta' => ['title' => 'Pizza party Calculator: Formula, Steps & Examples', 'description' => 'Estimate pizza sizes, slices and quantities for a party from the guest count and serving preferences. Use as a planning guide; adjust for your guests and menu.', 'h1' => 'Pizza party Calculator', 'updated' => '2026-07-28'],
    'sections' => [
        [
            'title' => 'Your party size',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'no_of_people',
                            'label' => 'People at the party',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kcal_per_person',
                            'label' => 'We are...',
                            'type' => 'select',
                            'options' => ['moderately hungry' => '750', 'hungry' => '1000', 'starving' => '1250'],
                            'dataset' => 'how hungry',
                            'default' => 'hungry',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Your pizza of choice',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pizza_size',
                            'label' => 'Size',
                            'type' => 'select',
                            'options' => ['small (10")' => '10', 'medium (12")' => '12', 'large (14")' => '14', 'extra large (16")' => '16'],
                            'dataset' => 'pizza size',
                            'control' => 'DROPDOWN',
                            'default' => 'small (10")',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pizza_diameter',
                            'label' => 'Pizza diameter',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pieces_per_pizza',
                            'label' => 'Slices per pizza',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'crust',
                            'label' => 'Crust',
                            'type' => 'select',
                            'options' => ['Thin' => '1', 'Classic' => '0'],
                            'default' => 'Classic',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pizza_type',
                            'label' => 'Type',
                            'type' => 'select',
                            'options' => [
                                'Veggie pizza' => '16.96',
                                'Cheese pizza' => '18.40',
                                'Pepperoni pizza' => '19.82',
                                'Bacon and cheese pizza' => '21.23',
                                'A little bit of everything' => '20.52',
                            ],
                            'dataset' => 'Pizza type',
                            'control' => 'DROPDOWN',
                            'default' => 'Cheese pizza',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kcal_per_piece',
                            'label' => 'Calories per slice',
                            'type' => 'number',
                            'suffix' => 'kcal',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_of_one_pizza',
                            'label' => 'Price',
                            'type' => 'number',
                            'suffix' => '/pizza',
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
            'title' => 'Your pizza order',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'no_of_pizzas',
                            'label' => 'You should order',
                            'type' => 'number',
                            'suffix' => 'pizzas',
                            'help' => 'We round this number up, so you won\'t run out of pizzas!',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pieces_per_person',
                            'label' => 'Slices per person',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'end_kcal_per_person',
                            'label' => 'Each person will eat...',
                            'type' => 'number',
                            'suffix' => 'kcal',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_cost',
                            'label' => 'Total cost',
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
                            'name' => 'cost_per_person',
                            'label' => 'Cost per person',
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
            'title' => 'no_of_pizzas = one_way (ceil(kcal_per_person * no_of_people / (kcal_per_piece*pieces_per_pizza ) ))',
            'results' => ['no_of_pizzas' => '(ceil(kcal_per_person*no_of_people/(pieces_per_pizza*calories(crust, pizza_type, pizza_diameter, pieces_per_pizza))))'],
        ],
        [
            'title' => 'pieces_per_person = one_way(no_of_pizzas *pieces_per_pizza / no_of_people)',
            'results' => ['pieces_per_person' => '(pieces_per_pizza*(ceil(kcal_per_person*no_of_people/(pieces_per_pizza*calories(crust, pizza_type, pizza_diameter, pieces_per_pizza))))/no_of_people)'],
        ],
        [
            'title' => 'total_cost = one_way (price_of_one_pizza * no_of_pizzas )',
            'results' => ['total_cost' => '(price_of_one_pizza*(ceil(kcal_per_person*no_of_people/(pieces_per_pizza*calories(crust, pizza_type, pizza_diameter, pieces_per_pizza)))))'],
        ],
        [
            'title' => 'cost_per_person = one_way (total_cost /no_of_people)',
            'results' => ['cost_per_person' => '((price_of_one_pizza*(ceil(kcal_per_person*no_of_people/(pieces_per_pizza*calories(crust, pizza_type, pizza_diameter, pieces_per_pizza)))))/no_of_people)'],
        ],
        [
            'title' => 'kcal_per_piece = calories (crust, pizza_type,pizza_diameter,pieces_per_pizza)',
            'results' => ['kcal_per_piece' => 'calories(crust, pizza_type, pizza_diameter, pieces_per_pizza)'],
        ],
        [
            'title' => 'end_kcal_per_person = one_way(kcal_per_piece * pieces_per_person )',
            'results' => ['end_kcal_per_person' => <<<'TXT'
            (calories(crust, pizza_type, pizza_diameter, pieces_per_pizza)*(pieces_per_pizza*(ceil(kcal_per_person*no_of_people/(pieces_per_pizza*calories(crust, pizza_type, pizza_diameter, pieces_per_pizza))))/no_of_people))
            TXT],
        ],
        [
            'title' => 'pizza_size=pizza_diameter',
            'results' => ['pizza_diameter' => 'pizza_size', 'pizza_size' => 'pizza_diameter'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var thin_crust_calories={16.96:12.04,18.4:12.74,19.82:14.15,20.52:14.86,21.23:15.57};omni.define("calories",function(crust,pizza_type,pizza_diameter,pieces_per_pizza){var crust_calories=crust===0?pizza_type:thin_crust_calories[pizza_type];var calories_per_piece=crust_calories*0.75*pizza_diameter*pizza_diameter*Math.PI/4/pieces_per_pizza;return calories_per_piece});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Pizza party takes People at the party, We are… and Size and returns Pizza diameter. Nothing is looked up on this page: pizza diameter is computed from people at the party and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Pizza diameter is opened in centimeters; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Pizza party calculator works', 'html' => <<<'TXT'
            <p>The Pizza party calculator applies one relationship to 13 numbers and reports Pizza diameter.</p><p>Written with the labels from the form, You should order = (ceil(We are... × People at the party ÷ (Slices per pizza × calories(Crust, Type, Pizza diameter, Slices per pizza)))).</p><p>What comes back is Pizza diameter — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 13 boxes, and nothing else.</p><ul><li><strong>People at the party</strong> — a plain number, no unit</li><li><strong>We are…</strong> — a plain number, no unit</li><li><strong>Size</strong> — a plain number, no unit</li><li><strong>Slices per pizza</strong> — a plain number, no unit</li><li><strong>Crust</strong> — a plain number, no unit</li><li><strong>Type</strong> — a plain number, no unit</li><li><strong>Calories per slice</strong> — in kcal</li><li><strong>Price</strong> — in /pizza</li><li><strong>You should order</strong> — in pizzas. We round this number up, so you won&#039;t run out of pizzas!</li><li><strong>Slices per person</strong> — a plain number, no unit</li><li><strong>Each person will eat…</strong> — in kcal</li><li><strong>Total cost</strong> — in USD</li><li><strong>Cost per person</strong> — in USD</li></ul><p>The result box is Pizza diameter in centimeters. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, People at the party = 3, We are… = 1000, Slices per pizza = 8, Crust = 0, Type = 18.4 and Price = 5 /pizza; the answers are <strong>Size</strong> = 10 and <strong>Pizza diameter</strong> = 10 cm.</p><ul><li><strong>Size</strong> = 10</li><li><strong>Pizza diameter</strong> = 10 cm</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>You should order</strong> = <code>(ceil(We are... × People at the party ÷ (Slices per pizza × calories(Crust, Type, Pizza diameter, Slices per pizza))))</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Size</strong> = 10 and <strong>Pizza diameter</strong> = 10 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Pizza diameter offers 7 units and opens on centimeters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>You should order</strong> = <code>(ceil(We are... × People at the party ÷ (Slices per pizza × calories(Crust, Type, Pizza diameter, Slices per pizza))))</code></li><li><strong>Slices per person</strong> = <code>(Slices per pizza × (ceil(We are... × People at the party ÷ (Slices per pizza × calories(Crust, Type, Pizza diameter, Slices per pizza)))) ÷ People at the party)</code></li><li><strong>Total cost</strong> = <code>(Price × (ceil(We are... × People at the party ÷ (Slices per pizza × calories(Crust, Type, Pizza diameter, Slices per pizza)))))</code></li><li><strong>Cost per person</strong> = <code>((Price × (ceil(We are... × People at the party ÷ (Slices per pizza × calories(Crust, Type, Pizza diameter, Slices per pizza))))) ÷ People at the party)</code></li><li><strong>Calories per slice</strong> = <code>calories(Crust, Type, Pizza diameter, Slices per pizza)</code></li><li><strong>Each person will eat…</strong> = <code>(calories(Crust, Type, Pizza diameter, Slices per pizza) × (Slices per pizza × (ceil(We are... × People at the party ÷ (Slices per pizza × calories(Crust, Type, Pizza diameter, Slices per pizza)))) ÷ People at the party))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>You should order</strong> = <code>(ceil(We are... × People at the party ÷ (Slices per pizza × calories(Crust, Type, Pizza diameter, Slices per pizza))))</code> — the form to use when We are…, People at the party, Slices per pizza and Crust are the values you have.</li><li><strong>Slices per person</strong> = <code>(Slices per pizza × (ceil(We are... × People at the party ÷ (Slices per pizza × calories(Crust, Type, Pizza diameter, Slices per pizza)))) ÷ People at the party)</code> — the form to use when Slices per pizza, We are…, People at the party and Crust are the values you have.</li><li><strong>Total cost</strong> = <code>(Price × (ceil(We are... × People at the party ÷ (Slices per pizza × calories(Crust, Type, Pizza diameter, Slices per pizza)))))</code> — the form to use when Price, We are…, People at the party and Slices per pizza are the values you have.</li><li><strong>Cost per person</strong> = <code>((Price × (ceil(We are... × People at the party ÷ (Slices per pizza × calories(Crust, Type, Pizza diameter, Slices per pizza))))) ÷ People at the party)</code> — the form to use when Price, We are…, People at the party and Slices per pizza are the values you have.</li><li><strong>Calories per slice</strong> = <code>calories(Crust, Type, Pizza diameter, Slices per pizza)</code> — the form to use when Crust, Type, Pizza diameter and Slices per pizza are the values you have.</li><li><strong>Each person will eat…</strong> = <code>(calories(Crust, Type, Pizza diameter, Slices per pizza) × (Slices per pizza × (ceil(We are... × People at the party ÷ (Slices per pizza × calories(Crust, Type, Pizza diameter, Slices per pizza)))) ÷ People at the party))</code> — the form to use when Crust, Type, Pizza diameter and Slices per pizza are the values you have.</li><li><strong>Size</strong> = <code>Pizza diameter</code> — the form to use when Pizza diameter are the values you have.</li><li><strong>Pizza diameter</strong> = <code>Size</code> — the form to use when Size are the values you have.</li></ul><p>Any one of You should order, Slices per person and Total cost can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — People at the party, from 3 to 6 — and the answers go from <strong>Size</strong> 10 and <strong>Pizza diameter</strong> 10 cm to <strong>Size</strong> 10 and <strong>Pizza diameter</strong> 10 cm.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Pizza diameter is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>People at the party left as a guess.</strong> If People at the party is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>We are… left as a guess.</strong> If We are… is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Size left as a guess.</strong> If Size is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> If People at the party is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Pizza party form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>People at the party</strong> takes a plain number with no unit attached. It feeds You should order, Slices per person and Total cost. Fill it from a measurement rather than a memory — People at the party is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>We are…</strong> takes a plain number with no unit attached. It feeds You should order, Slices per person and Total cost. Fill it from a measurement rather than a memory — We are… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Size</strong> takes a plain number with no unit attached. It feeds Pizza diameter. Fill it from a measurement rather than a memory — Size is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Slices per pizza</strong> takes a plain number with no unit attached. It feeds You should order, Slices per person and Total cost. Fill it from a measurement rather than a memory — Slices per pizza is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Crust</strong> takes a plain number with no unit attached. It feeds You should order, Slices per person and Total cost. Fill it from a measurement rather than a memory — Crust is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Type</strong> takes a plain number with no unit attached. It feeds You should order, Slices per person and Total cost. Fill it from a measurement rather than a memory — Type is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Calories per slice</strong> is measured in kcal. Fill it from a measurement rather than a memory — Calories per slice is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Price</strong> is measured in /pizza. It feeds Total cost and Cost per person. Fill it from a measurement rather than a memory — Price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>You should order</strong> is measured in pizzas. We round this number up, so you won&#039;t run out of pizzas!. Fill it from a measurement rather than a memory — You should order is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Slices per person</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Slices per person is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Each person will eat…</strong> is measured in kcal. Fill it from a measurement rather than a memory — Each person will eat… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total cost</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Total cost is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cost per person</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Cost per person is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Pizza diameter follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover centimeters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: People at the party, We are… and Size measured, Pizza diameter wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/butter">Butter Calculator</a>, <a href="/food/cake-pans">Cake pan Calculator</a> and <a href="/food/cake-pricing">Cake pricing Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pizza party calculator work out?', 'a' => <<<'TXT'
            Pizza diameter, from We are…, People at the party, Slices per pizza and Crust. The relationship is You should order = (ceil(We are... × People at the party ÷ (Slices per pizza × calories(Crust, Type, Pizza diameter, Slices per pizza)))).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            People at the party, We are…, Size, Slices per pizza, Crust. Fill people at the party, we are… and size and leave Pizza diameter empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of You should order, Slices per person, Total cost and Cost per person blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'Are the Pizza party results exact?', 'a' => 'No. It estimates from the guest count and selections shown; appetite, menu, portions and serving style vary. Use the result as a planning starting point and adjust for your event.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Pizza diameter is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave People at the party blank and the page solves for it, reporting Pizza diameter instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Pizza diameter keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/bbq-party', 'name' => 'BBQ party'],
            ['path' => '/food/taco-bar', 'name' => 'Taco bar'],
            ['path' => '/food/wedding-alcohol', 'name' => 'Wedding alcohol']
        ],
    ],
];
