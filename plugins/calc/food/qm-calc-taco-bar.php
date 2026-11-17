<?php

/**
 * Taco bar
 * /food/taco-bar
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Taco bar',
    'meta' => ['title' => 'Taco bar Calculator — Formula, Units & Example', 'description' => 'Estimate taco-bar meat, cheese and toppings from the number of guests. Portions depend on appetites and side dishes, so use the totals as a shopping guide.', 'h1' => 'Taco bar Calculator', 'updated' => '2024-07-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'people',
                            'label' => 'Number of people',
                            'type' => 'number',
                            'suffix' => '#',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => ' Main ingredients',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'choice',
                            'label' => 'Select meat type:',
                            'type' => 'select',
                            'options' => [
                                'Ground beef' => '2',
                                'Chicken' => '0',
                                'Hamburger' => '1',
                                'Shrimp' => '3',
                                'Pork (Carnitas)' => '4',
                            ],
                            'dataset' => 'Meat type',
                            'control' => 'DROPDOWN',
                            'default' => 'Chicken',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hamburger1',
                            'label' => 'Meat mass',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chicken1',
                            'label' => 'Meat mass',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beef1',
                            'label' => 'Meat mass',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shrimp1',
                            'label' => 'Meat mass',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pork1',
                            'label' => 'Meat mass',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cCheese1',
                            'label' => 'Cheddar cheese',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mCheese1',
                            'label' => 'Monterey cheese',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Pick your dips',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cream1',
                            'label' => 'Sour cream',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'guacamole1',
                            'label' => 'Guacamole',
                            'type' => 'number',
                            'help' => 'Avocado-based spread.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sauce1',
                            'label' => 'Taco sauce',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salsa1',
                            'label' => 'Pico de Gallo',
                            'type' => 'number',
                            'help' => 'Tomato salsa.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Pick your vegetables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lettuce1',
                            'label' => 'Lettuce',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'onions1',
                            'label' => 'Onions',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beans1',
                            'label' => 'Beans',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'refriedBeans1',
                            'label' => 'Refried beans',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tomatoes1',
                            'label' => 'Tomatoes',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'olives1',
                            'label' => 'Olives',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pepper1',
                            'label' => 'Bell pepper',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Choose your side',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shell1',
                            'label' => 'Taco shells',
                            'type' => 'number',
                            'suffix' => '#',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tortilla1',
                            'label' => 'Tortillas',
                            'type' => 'number',
                            'suffix' => '#',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rice1',
                            'label' => 'Rice',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden_group',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'guacamole',
                            'label' => 'Guacamole',
                            'type' => 'number',
                            'help' => 'Avocado-based spread',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.800000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tortilla',
                            'label' => 'Tortilla',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.000000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shell',
                            'label' => 'Shell',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.000000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rice',
                            'label' => 'Rice',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.500000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pepper',
                            'label' => 'Pepper',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.000000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'olives',
                            'label' => 'Olives',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.800000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tomatoes',
                            'label' => 'Tomatoes',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.800000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salsa',
                            'label' => 'Salsa',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.600000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sauce',
                            'label' => 'Sauce',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.300000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beans',
                            'label' => 'Beans',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.100000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'onions',
                            'label' => 'Onions',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.900000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'refriedBeans',
                            'label' => 'Refriedbeans',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.200000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lettuce',
                            'label' => 'Lettuce',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.300000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mCheese',
                            'label' => 'Mcheese',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.750000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pork',
                            'label' => 'Pork',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cream',
                            'label' => 'Cream',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.000000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cCheese',
                            'label' => 'Ccheese',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.250000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shrimp',
                            'label' => 'Shrimp',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6.500000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chicken',
                            'label' => 'Chicken',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5.500000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beef',
                            'label' => 'Beef',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6.500000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hamburger',
                            'label' => 'Hamburger',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5.000000000000000',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'people * salsa = salsa1',
            'results' => ['people' => 'salsa1/salsa', 'salsa' => 'salsa1/people', 'salsa1' => 'people*salsa'],
        ],
        [
            'title' => 'people * beans = beans1',
            'results' => ['beans' => 'beans1/people', 'people' => 'beans1/beans', 'beans1' => 'beans*people'],
        ],
        [
            'title' => 'people * refriedBeans = refriedBeans1',
            'results' => ['people' => 'refriedBeans1/refriedBeans', 'refriedBeans1' => 'people*refriedBeans', 'refriedBeans' => 'refriedBeans1/people'],
        ],
        [
            'title' => 'people * sauce = sauce1',
            'results' => ['sauce' => 'sauce1/people', 'people' => 'sauce1/sauce', 'sauce1' => 'people*sauce'],
        ],
        [
            'title' => 'people * mCheese = mCheese1',
            'results' => ['mCheese1' => 'mCheese*people', 'mCheese' => 'mCheese1/people', 'people' => 'mCheese1/mCheese'],
        ],
        [
            'title' => 'people * cCheese = cCheese1',
            'results' => ['cCheese1' => 'cCheese*people', 'cCheese' => 'cCheese1/people', 'people' => 'cCheese1/cCheese'],
        ],
        [
            'title' => 'people * lettuce = lettuce1',
            'results' => ['lettuce' => 'lettuce1/people', 'lettuce1' => 'lettuce*people', 'people' => 'lettuce1/lettuce'],
        ],
        [
            'title' => 'people * cream = cream1',
            'results' => ['cream1' => 'cream*people', 'people' => 'cream1/cream', 'cream' => 'cream1/people'],
        ],
        [
            'title' => 'people * onions = onions1',
            'results' => ['onions' => 'onions1/people', 'onions1' => 'onions*people', 'people' => 'onions1/onions'],
        ],
        [
            'title' => 'people * tomatoes = tomatoes1',
            'results' => ['tomatoes' => 'tomatoes1/people', 'people' => 'tomatoes1/tomatoes', 'tomatoes1' => 'people*tomatoes'],
        ],
        [
            'title' => 'people * tortilla = tortilla1 ',
            'results' => ['tortilla' => 'tortilla1/people', 'tortilla1' => 'people*tortilla', 'people' => 'tortilla1/tortilla'],
        ],
        [
            'title' => 'people * shell = shell1',
            'results' => ['shell' => 'shell1/people', 'people' => 'shell1/shell', 'shell1' => 'people*shell'],
        ],
        [
            'title' => 'people * hamburger = hamburger1',
            'results' => ['hamburger1' => 'hamburger*people', 'people' => 'hamburger1/hamburger', 'hamburger' => 'hamburger1/people'],
        ],
        [
            'title' => 'people * beef = beef1',
            'results' => ['beef1' => 'beef*people', 'people' => 'beef1/beef', 'beef' => 'beef1/people'],
        ],
        [
            'title' => 'people * olives = olives1',
            'results' => ['olives' => 'olives1/people', 'olives1' => 'olives*people', 'people' => 'olives1/olives'],
        ],
        [
            'title' => 'people * pepper = pepper1',
            'results' => ['pepper1' => 'people*pepper', 'pepper' => 'pepper1/people', 'people' => 'pepper1/pepper'],
        ],
        [
            'title' => 'people * guacamole = guacamole1',
            'results' => ['guacamole1' => 'guacamole*people', 'people' => 'guacamole1/guacamole', 'guacamole' => 'guacamole1/people'],
        ],
        [
            'title' => 'people * chicken = chicken1',
            'results' => ['chicken1' => 'chicken*people', 'people' => 'chicken1/chicken', 'chicken' => 'chicken1/people'],
        ],
        [
            'title' => 'people * rice = rice1',
            'results' => ['rice1' => 'people*rice', 'people' => 'rice1/rice', 'rice' => 'rice1/people'],
        ],
        [
            'title' => 'people * shrimp = shrimp1',
            'results' => ['shrimp' => 'shrimp1/people', 'people' => 'shrimp1/shrimp', 'shrimp1' => 'people*shrimp'],
        ],
        [
            'title' => 'people * pork = pork1',
            'results' => ['pork1' => 'people*pork', 'pork' => 'pork1/people', 'people' => 'pork1/pork'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Pico de Gallo and Salsa into Taco bar and the answer comes back as Number of people and Meat mass. There is no hidden constant here: change number of people and pico de Gallo moves with it. The main result, Number of people, is reported in #.
        TXT,
        'sections' => [
            ['title' => 'How the Taco bar calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Taco bar: it takes 2 numbers and reports Number of people, Meat mass and Meat mass.</p><p>Written with the labels from the form, Number of people = Pico de Gallo ÷ Salsa.</p><p>The result panel carries Number of people, Meat mass, Meat mass and Meat mass, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Pico de Gallo</strong> — in grams. Tomato salsa.</li><li><strong>Salsa</strong> — in ounces</li></ul><p>The result boxes are Number of people in #, Meat mass in grams, Meat mass in grams, Meat mass in grams, Meat mass in grams, Meat mass in grams, Cheddar cheese in grams, Monterey cheese in grams, Sour cream in grams, Guacamole in grams, Taco sauce in grams, Lettuce in grams, Onions in grams, Beans in grams, Refried beans in grams, Tomatoes in grams, Olives in grams, Bell pepper in grams, Taco shells in #, Tortillas in #, Rice in grams, Guacamole in ounces, Tortilla, Shell, Rice in ounces, Pepper in ounces, Olives in ounces, Tomatoes in ounces, Sauce in ounces, Beans in ounces, Onions in ounces, Refriedbeans in ounces, Lettuce in ounces, Mcheese in ounces, Pork in ounces, Cream in ounces, Ccheese in ounces, Shrimp in ounces, Chicken in ounces, Beef in ounces, Hamburger in ounces; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Number of people</strong> = <code>Pico de Gallo ÷ Salsa</code></li><li><strong>Salsa</strong> = <code>Pico de Gallo ÷ Number of people</code></li><li><strong>Pico de Gallo</strong> = <code>Number of people × Salsa</code></li><li><strong>Beans</strong> = <code>Beans ÷ Number of people</code></li><li><strong>Refried beans</strong> = <code>Number of people × Refriedbeans</code></li><li><strong>Refriedbeans</strong> = <code>Refried beans ÷ Number of people</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Number of people</strong> = <code>Pico de Gallo ÷ Salsa</code> — the form to use when Pico de Gallo and Salsa are the values you have.</li><li><strong>Salsa</strong> = <code>Pico de Gallo ÷ Number of people</code> — the form to use when Pico de Gallo and Number of people are the values you have.</li><li><strong>Pico de Gallo</strong> = <code>Number of people × Salsa</code> — the form to use when Number of people and Salsa are the values you have.</li><li><strong>Beans</strong> = <code>Beans ÷ Number of people</code> — the form to use when Beans and Number of people are the values you have.</li><li><strong>Number of people</strong> = <code>Beans ÷ Beans</code> — the form to use when Beans and Beans are the values you have.</li><li><strong>Beans</strong> = <code>Beans × Number of people</code> — the form to use when Beans and Number of people are the values you have.</li><li><strong>Number of people</strong> = <code>Refried beans ÷ Refriedbeans</code> — the form to use when Refried beans and Refriedbeans are the values you have.</li><li><strong>Refried beans</strong> = <code>Number of people × Refriedbeans</code> — the form to use when Number of people and Refriedbeans are the values you have.</li></ul><p>Any one of Number of people, Salsa and Pico de Gallo can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Pico de Gallo and Salsa carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Number of people, Meat mass and Meat mass are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Pico de Gallo left as a guess.</strong> Anything typed into Pico de Gallo is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Salsa left as a guess.</strong> Anything typed into Salsa is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Convert Pico de Gallo to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Pico de Gallo</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. Tomato salsa. It feeds Number of people and Salsa. Check the field label and unit before calculating.</li><li><strong>Salsa</strong> is a ounces quantity: the page opens it in oz and converts anything else you pick before the formula runs. It feeds Number of people and Pico de Gallo. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Pico de Gallo and Salsa. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Pico de Gallo into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Number of people in # with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Number of people is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover grams. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Pico de Gallo and Salsa measured, Number of people and Meat mass wanted.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/bbq-party">BBQ party</a>, <a href="/food/how-much-ham-per-person">How much ham per person</a> and <a href="/food/wedding-alcohol">Wedding alcohol</a>.</p>
            TXT],
            ['title' => 'Limits and data handling', 'html' => <<<'TXT'
            <p>This calculator applies the relationships and assumptions shown on the page to the values entered. It cannot verify ingredient labels, measurements, equipment or conditions that are not represented in the form. Check the selected units and consult recipe, product or safety instructions where they apply.</p>
            <p>The result is a calculation, not a measurement of the food or drink. Use a scale, thermometer or product label when the real-world quantity or safety status matters.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Taco bar is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Pico de Gallo and Salsa beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. </p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Taco bar calculator work out?', 'a' => 'Number of people, Meat mass, Meat mass and Meat mass, from Pico de Gallo and Salsa. The relationship is Number of people = Pico de Gallo ÷ Salsa.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Pico de Gallo (grams), Salsa (ounces). Enter pico de Gallo and salsa; Number of people is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Number of people, Salsa, Pico de Gallo and Beans blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Number of people is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Pico de Gallo left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Number of people keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/bbq-party', 'name' => 'BBQ party'],
            ['path' => '/food/how-much-ham-per-person', 'name' => 'How much ham per person'],
            ['path' => '/food/wedding-alcohol', 'name' => 'Wedding alcohol']
        ],
    ],
];
