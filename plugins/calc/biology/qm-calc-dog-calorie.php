<?php

/**
 * Dog calorie
 * /biology/dog-calorie
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog calorie',
    'meta' => ['title' => 'Dog calorie Calculator: Formula, Steps & Example', 'description' => 'Dog calorie works out your dog needs and your dog should eat and reports both. Nothing is stored between visits: the boxes are the only place your numbers live.', 'h1' => 'Dog calorie Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => 'How many calories does my dog need?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'act',
                            'label' => 'Activity',
                            'type' => 'select',
                            'options' => ['Low (including senior): <1h/day' => '0', 'Moderate (low intensity): 1-3h/day' => '1', 'Moderate (high intensity): 3-6h/day' => '2', 'High (working dogs): 3-6h/day' => '3'],
                            'control' => 'DROPDOWN',
                            'help' => <<<'TXT'
                            Choose the level of activity your dog typically gets. Check the "How to use" paragraph of the text for more detail if you're unsure what kind of activity your dog gets!
                            TXT,
                            'default' => 'Moderate (low intensity): 1-3h/day',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'act == 0', 'text' => 'Characterized as less than 1 hour of low-intensity activity per day, for example, walking on a leash. It also applies to elderly dogs.'],
                                ['when' => 'act == 1', 'text' => 'This is the most common type. It means 1−3 hours a day of low-intensity activity, such as walking on a leash.'],
                                ['when' => 'act == 2', 'text' => '3−6 hours a day of high-intensity activity, such as unleashed walks with considerate amounts of running, games, playing with other dogs, etc.'],
                                ['when' => 'act == 3', 'text' => '3−6 hours of work per day, such as sheepdogs.'],
                            ],
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
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calorieLow',
                            'label' => 'Your dog needs',
                            'type' => 'number',
                            'unit' => '44',
                            'unit_default' => 'kcal',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calorieModLow',
                            'label' => 'Your dog needs',
                            'type' => 'number',
                            'unit' => '44',
                            'unit_default' => 'kcal',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calorieModHigh',
                            'label' => 'Your dog needs',
                            'type' => 'number',
                            'unit' => '44',
                            'unit_default' => 'kcal',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calorieHigh',
                            'label' => 'Your dog needs',
                            'type' => 'number',
                            'unit' => '44',
                            'unit_default' => 'kcal',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Do you also want to calculate the...',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'extra',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['amount of food?' => '55', '' => '66'],
                            'dataset' => 'Amount of food?',
                            'control' => 'CHECKBOX',
                            'help' => 'Select "Yes" here if you want to calculate the amount of food required based on its caloric content.',
                            'default' => 'amount of food?',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'extra2',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['calorie content of a specific food?' => '55', '' => '66'],
                            'dataset' => 'Calorie content of specific food?',
                            'control' => 'CHECKBOX',
                            'help' => 'Pick "Yes" here if you want to manually calculate the metabolic energy in a specific food.',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'How much food is that?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'energyContent',
                            'label' => 'Energy content in food',
                            'type' => 'number',
                            'suffix' => 'kcal/100g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'foodLow',
                            'label' => 'Your dog should eat',
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
                            'name' => 'foodModLow',
                            'label' => 'Your dog should eat',
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
                            'name' => 'foodModHigh',
                            'label' => 'Your dog should eat',
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
                            'name' => 'foodHigh',
                            'label' => 'Your dog should eat',
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
                            'name' => 'days',
                            'label' => 'How many days do you need food for?',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'daysLow',
                            'label' => 'Amount of food for given the number of days:',
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
                            'name' => 'daysModLow',
                            'label' => 'Amount of food for given the number of days:',
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
                            'name' => 'daysModHigh',
                            'label' => 'Amount of food for given the number of days:',
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
                            'name' => 'daysHigh',
                            'label' => 'Amount of food for given the number of days:',
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
            'title' => 'How caloric is my dog\'s food?',
            'note' => <<<'TXT'
            If you're unsure of the precise caloric content of your dog's food, use this part of the dog calorie calculator to figure it out based on the information about its specific components, which is always provided on the food's packaging. Below, you will see how much of each component is in a typical example of dog food. Feel free to change the values according to the brand you use.
            TXT,
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dry_matter',
                            'label' => 'Dry matter',
                            'type' => 'number',
                            'help' => 'What would stay if you evaporated all the water from your dog\'s food.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '90',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'crude_protein',
                            'label' => 'Crude protein',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'crude_ash',
                            'label' => 'Crude ash',
                            'type' => 'number',
                            'help' => 'Although it sounds scary, "crude ash" actually means all the essential minerals.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'crude_fat',
                            'label' => 'Crude fat',
                            'type' => 'number',
                            'help' => 'Total amount of fats in your dog\'s food.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'crude_fiber',
                            'label' => 'Crude fiber',
                            'type' => 'number',
                            'help' => 'Fiber, the indigestible part of the food, is crucial for the digestive system\'s health.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '16',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caloricContent100gr',
                            'label' => 'Caloric content of food',
                            'type' => 'number',
                            'suffix' => 'kcal/100g',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'digestible_energy',
                            'label' => 'Digestible energy',
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
                            'name' => 'BNW',
                            'label' => 'Bnw',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gross_energy',
                            'label' => 'Gross energy',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0],
                    'fields' => [
                        [
                            'name' => 'wspStrEB',
                            'label' => 'Wspstreb',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dry_pulse_fiber',
                            'label' => 'Dry Pulse Fiber',
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
            'title' => 'calorieLow = 95 * weight^0.75',
            'results' => ['calorieLow' => '95*pow(weight, 3/4)', 'weight' => '(1/9025)*pow(95, 2/3)*pow(calorieLow, 4/3)'],
        ],
        [
            'title' => 'calorieModLow = 110 * weight^0.75',
            'results' => ['weight' => '(1/12100)*pow(110, 2/3)*pow(calorieModLow, 4/3)', 'calorieModLow' => '110*pow(weight, 3/4)'],
        ],
        [
            'title' => 'calorieModHigh = 125 * weight^0.75',
            'results' => ['weight' => '(1/625)*pow(calorieModHigh, 4/3)', 'calorieModHigh' => '125*pow(weight, 3/4)'],
        ],
        [
            'title' => 'calorieHigh = 175 * weight^0.75',
            'results' => ['calorieHigh' => '175*pow(weight, 3/4)', 'weight' => '(1/6125)*cbrt(245)*pow(calorieHigh, 4/3)'],
        ],
        [
            'title' => 'foodLow = (calorieLow * 100) / energyContent',
            'results' => ['calorieLow' => '(1/100)*energyContent*foodLow', 'energyContent' => '100*calorieLow/foodLow', 'foodLow' => '100*calorieLow/energyContent'],
        ],
        [
            'title' => 'foodModLow = (calorieModLow * 100) / energyContent',
            'results' => ['foodModLow' => '100*calorieModLow/energyContent', 'energyContent' => '100*calorieModLow/foodModLow', 'calorieModLow' => '(1/100)*energyContent*foodModLow'],
        ],
        [
            'title' => 'foodModHigh = (calorieModHigh * 100) / energyContent',
            'results' => ['energyContent' => '100*calorieModHigh/foodModHigh', 'calorieModHigh' => '(1/100)*energyContent*foodModHigh', 'foodModHigh' => '100*calorieModHigh/energyContent'],
        ],
        [
            'title' => 'foodHigh = (calorieHigh * 100) / energyContent',
            'results' => ['foodHigh' => '100*calorieHigh/energyContent', 'calorieHigh' => '(1/100)*energyContent*foodHigh', 'energyContent' => '100*calorieHigh/foodHigh'],
        ],
        [
            'title' => 'gross_energy = (crude_protein * 5.70) + (crude_fat * 9.40) + (4.10* (crude_fiber +BNW))',
            'results' => [
                'BNW' => '-94/41*crude_fat - crude_fiber - 57/41*crude_protein + (10/41)*gross_energy',
                'crude_fat' => '-41/94*BNW - 41/94*crude_fiber - 57/94*crude_protein + (5/47)*gross_energy',
                'crude_protein' => '-41/57*BNW - 94/57*crude_fat - 41/57*crude_fiber + (10/57)*gross_energy',
                'gross_energy' => '(41/10)*BNW + (47/5)*crude_fat + (41/10)*crude_fiber + (57/10)*crude_protein',
                'crude_fiber' => '-BNW - 94/41*crude_fat - 57/41*crude_protein + (10/41)*gross_energy',
            ],
        ],
        [
            'title' => 'BNW = dry_matter - crude_ash - crude_protein - crude_fat - crude_fiber',
            'results' => [
                'crude_ash' => '-BNW - crude_fat - crude_fiber - crude_protein + dry_matter',
                'BNW' => '-crude_ash - crude_fat - crude_fiber - crude_protein + dry_matter',
                'crude_fat' => '-BNW - crude_ash - crude_fiber - crude_protein + dry_matter',
                'crude_protein' => '-BNW - crude_ash - crude_fat - crude_fiber + dry_matter',
                'dry_matter' => 'BNW + crude_ash + crude_fat + crude_fiber + crude_protein',
                'crude_fiber' => '-BNW - crude_ash - crude_fat - crude_protein + dry_matter',
            ],
        ],
        [
            'title' => 'wspStrEB = 91.2 - (1.43 * dry_pulse_fiber)',
            'results' => ['wspStrEB' => '456/5 - 143/100*dry_pulse_fiber', 'dry_pulse_fiber' => '9120/143 - 100/143*wspStrEB'],
        ],
        [
            'title' => 'dry_pulse_fiber = 100 * crude_fiber / dry_matter',
            'results' => ['crude_fiber' => '(1/100)*dry_matter*dry_pulse_fiber', 'dry_matter' => '100*crude_fiber/dry_pulse_fiber', 'dry_pulse_fiber' => '100*crude_fiber/dry_matter'],
        ],
        [
            'title' => 'digestible_energy = gross_energy * wspStrEB / 100',
            'results' => ['gross_energy' => '100*digestible_energy/wspStrEB', 'wspStrEB' => '100*digestible_energy/gross_energy', 'digestible_energy' => '(1/100)*gross_energy*wspStrEB'],
        ],
        [
            'title' => 'caloricContent100gr = digestible_energy - (1.04 * crude_protein)',
            'results' => ['crude_protein' => '-25/26*caloricContent100gr + (25/26)*digestible_energy', 'caloricContent100gr' => '-26/25*crude_protein + digestible_energy', 'digestible_energy' => 'caloricContent100gr + (26/25)*crude_protein'],
        ],
        [
            'title' => 'daysModLow = foodModLow * days',
            'results' => ['foodModLow' => 'daysModLow/days', 'daysModLow' => 'days*foodModLow', 'days' => 'daysModLow/foodModLow'],
        ],
        [
            'title' => 'daysLow = foodLow * days',
            'results' => ['daysLow' => 'days*foodLow', 'foodLow' => 'daysLow/days', 'days' => 'daysLow/foodLow'],
        ],
        [
            'title' => 'daysModHigh = foodModHigh * days',
            'results' => ['days' => 'daysModHigh/foodModHigh', 'daysModHigh' => 'days*foodModHigh', 'foodModHigh' => 'daysModHigh/days'],
        ],
        [
            'title' => 'daysHigh = foodHigh * days',
            'results' => ['foodHigh' => 'daysHigh/days', 'days' => 'daysHigh/foodHigh', 'daysHigh' => 'days*foodHigh'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Dog calorie works out Your dog needs and Your dog needs from Weight. It is a single relationship that reads your dog needs out of weight, not a table of canned results keyed by them. Units for Your dog needs default to kilocalories and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Dog calorie calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Dog calorie: it takes 1 number and reports Your dog needs, Your dog needs and Your dog needs.</p><p>In the form&#039;s own words, Your dog needs = 95 × (Weight)^(3 ÷ 4).</p><p>What comes back is Your dog needs, Your dog needs, Your dog needs and Your dog needs — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Weight</strong> — in kilograms</li></ul><p>The answers come back as Your dog needs in kilocalories, Your dog needs in kilocalories, Your dog needs in kilocalories, Your dog needs in kilocalories, Energy content in food in kcal/100g, Your dog should eat in grams, Your dog should eat in grams, Your dog should eat in grams, Your dog should eat in grams, How many days do you need food for?, Amount of food for given the number of days in grams, Amount of food for given the number of days in grams, Amount of food for given the number of days in grams, Amount of food for given the number of days in grams, Dry matter in grams, Crude protein in grams, Crude ash in grams, Crude fat in grams, Crude fiber in grams, Caloric content of food in kcal/100g, Digestible energy in grams, Bnw, Gross energy, Wspstreb, Dry Pulse Fiber in grams. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Your dog needs lists 8 options and opens on kilocalories. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Your dog needs</strong> = <code>95 × (Weight)^(3 ÷ 4)</code></li><li><strong>Weight</strong> = <code>(1 ÷ 9025) × (95)^(2 ÷ 3) × (Your dog needs)^(4 ÷ 3)</code></li><li><strong>Your dog should eat</strong> = <code>100 × Your dog needs ÷ Energy content in food</code></li><li><strong>Energy content in food</strong> = <code>100 × Your dog needs ÷ Your dog should eat</code></li><li><strong>Gross energy</strong> = <code>(41 ÷ 10) × Bnw + (47 ÷ 5) × Crude fat + (41 ÷ 10) × Crude fiber + (57 ÷ 10) × Crude protein</code></li><li><strong>Bnw</strong> = <code>− 94 ÷ 41 × Crude fat − Crude fiber − 57 ÷ 41 × Crude protein + (10 ÷ 41) × Gross energy</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Your dog needs</strong> = <code>95 × (Weight)^(3 ÷ 4)</code> — the form to use when Weight are the values you have.</li><li><strong>Weight</strong> = <code>(1 ÷ 9025) × (95)^(2 ÷ 3) × (Your dog needs)^(4 ÷ 3)</code> — the form to use when Your dog needs are the values you have.</li><li><strong>Your dog needs</strong> = <code>110 × (Weight)^(3 ÷ 4)</code> — the form to use when Weight are the values you have.</li><li><strong>Weight</strong> = <code>(1 ÷ 12100) × (110)^(2 ÷ 3) × (Your dog needs)^(4 ÷ 3)</code> — the form to use when Your dog needs are the values you have.</li><li><strong>Your dog needs</strong> = <code>125 × (Weight)^(3 ÷ 4)</code> — the form to use when Weight are the values you have.</li><li><strong>Weight</strong> = <code>(1 ÷ 625) × (Your dog needs)^(4 ÷ 3)</code> — the form to use when Your dog needs are the values you have.</li><li><strong>Your dog needs</strong> = <code>175 × (Weight)^(3 ÷ 4)</code> — the form to use when Weight are the values you have.</li><li><strong>Weight</strong> = <code>(1 ÷ 6125) × cbrt(245) × (Your dog needs)^(4 ÷ 3)</code> — the form to use when Your dog needs are the values you have.</li></ul><p>Any one of Your dog needs, Weight and Your dog needs can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Weight carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Your dog needs, Your dog needs and Your dog needs are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Weight left as a guess.</strong> Anything typed into Weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Weight to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. The page reads it when it works out Your dog needs, Your dog needs and Your dog needs. Have it to hand before you start: Weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Weight. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Weight into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Your dog needs in kcal with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Your dog needs is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover kilocalories and grams. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Weight and the number you are missing is Your dog needs and Your dog needs.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dna-molarity-calculator">DNA Molarity Calculator</a>, <a href="/biology/dna-molarity-from-mass">DNA Molarity from Mass or A260 Calculator</a> and <a href="/biology/dna-molecular-weight-calculator">DNA Molecular Weight Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Dog calorie is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Weight beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog calorie calculator work out?', 'a' => 'Your dog needs, Your dog needs, Your dog needs and Your dog needs, from Weight. The relationship is Your dog needs = 95 × (Weight)^(3 ÷ 4).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Weight (kilograms). Enter weight; Your dog needs is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Your dog needs, Weight, Your dog needs and Your dog needs blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Your dog needs is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Your dog needs keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dna-molarity-calculator', 'name' => 'DNA Molarity Calculator'],
            ['path' => '/biology/dna-molarity-from-mass', 'name' => 'DNA Molarity from Mass or A260 Calculator'],
            ['path' => '/biology/dna-molecular-weight-calculator', 'name' => 'DNA Molecular Weight Calculator'],
        ],
    ],
];
