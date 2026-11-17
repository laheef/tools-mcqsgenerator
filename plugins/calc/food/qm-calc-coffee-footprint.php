<?php

/**
 * Coffee footprint
 * /food/coffee-footprint
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Coffee footprint',
    'meta' => ['title' => 'Coffee footprint Calculator: Free, With Steps', 'description' => 'Compare the estimated footprint of coffee choices such as espresso and latte from serving details. Values vary by recipe and serving; check product labels.', 'h1' => 'Coffee footprint Calculator', 'updated' => '2026-07-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => ' This tool allows you to calculate your coffee\'s impact on the world!'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'question',
                            'label' => 'I want to know',
                            'type' => 'select',
                            'options' => ['my actual coffee footprint' => '0', 'how to drink sustainably' => '1'],
                            'dataset' => 'quest',
                            'default' => 'my actual coffee footprint',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'My actual coffee consumption ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'espresso1',
                            'label' => 'Espresso',
                            'type' => 'number',
                            'help' => '1 cup = 2 oz/ 59 mL',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'espresso_vol',
                            'label' => 'Espresso volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'latte1',
                            'label' => 'Caffe latte',
                            'type' => 'number',
                            'help' => '1 cup = 8 oz/ 236 mL (dairy milk included)',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'latte_vol',
                            'label' => 'Latte volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cappuccino1',
                            'label' => 'Cappuccino',
                            'type' => 'number',
                            'help' => '1 cup = 6 oz/ 177 mL (dairy milk included)',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cappuccino_vol',
                            'label' => 'Cappuccino volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flat1',
                            'label' => 'Flat white',
                            'type' => 'number',
                            'help' => '1 cup = 6 oz/ 177 mL (dairy milk included)',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flat_vol',
                            'label' => 'Flat white volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'americano1',
                            'label' => 'Americano',
                            'type' => 'number',
                            'help' => '1 cup = 8 oz/ 236 mL',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'americano_vol',
                            'label' => 'Americano volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'expanded',
                            'label' => 'Would you like to see more options?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes!' => '1'],
                            'dataset' => 'usable',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'filter1',
                            'label' => 'Filter coffee',
                            'type' => 'number',
                            'help' => '1 cup = 8 oz/ 236 mL',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'filter_vol',
                            'label' => 'Filter coffee volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'can1',
                            'label' => 'Canned coffee',
                            'type' => 'number',
                            'help' => '1 cup = 6.4 oz/ 190 mL',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'can_vol',
                            'label' => 'Canned coffee volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'drip1',
                            'label' => 'Drip',
                            'type' => 'number',
                            'help' => '1 cup = 8 oz/ 236 mL',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'drip_vol',
                            'label' => 'Drip volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'instant1',
                            'label' => 'Instant coffee',
                            'type' => 'number',
                            'help' => '1 cup = 8 oz/ 236 mL',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'instant_vol',
                            'label' => 'Instant coffee volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'press1',
                            'label' => 'French press',
                            'type' => 'number',
                            'help' => '1 cup = 8 oz/ 236 mL',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'press_vol',
                            'label' => 'French press volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coffee_volume',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Change coffee volume' => '1', '' => '0'],
                            'dataset' => 'change_coffee_vol',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'What would you like to change? ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'reusableCup',
                            'label' => 'Use only reusable cups?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes!' => '1'],
                            'dataset' => 'usable',
                            'help' => 'Production of single-use cups creates tons of CO₂ and loads of unnecessary waste.&nbsp;',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'milk',
                            'label' => 'Consider your milk use?',
                            'type' => 'select',
                            'options' => ['Dairy milk ' => '0', 'Non-dairy milk ' => '1', 'No milk ' => '2'],
                            'dataset' => 'milk',
                            'help' => 'Animal milk is a major source of CO₂ production.',
                            'default' => 'Dairy milk ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sustainable',
                            'label' => 'Buy sustainable coffee?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes!' => '1'],
                            'dataset' => 'usable',
                            'help' => 'Sustainable coffee is grown in a way that conserves nature - look for the sustainability logo on your coffee label.&nbsp;',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cannedCO',
                            'label' => 'Drink less canned coffee?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes!' => '1'],
                            'dataset' => 'usable',
                            'help' => 'A single can\'s production results in 103 g of CO₂, constituting almost 50% of your coffee\'s footprint!&nbsp;',
                            'default' => 'No',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Your footprint',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_1',
                            'label' => 'My coffee footprint in a...',
                            'type' => 'select',
                            'options' => ['week' => '1', 'month' => '4.4352', 'year' => '52'],
                            'dataset' => 'time_span',
                            'control' => 'DROPDOWN',
                            'default' => 'month',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_2',
                            'label' => 'Calculate my results for a...',
                            'type' => 'select',
                            'options' => ['week' => '1', 'month' => '4.4352', 'year' => '52'],
                            'dataset' => 'time_span',
                            'control' => 'DROPDOWN',
                            'default' => 'month',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'caffeine > 0', 'text' => ' {{caffeine.formattedValue}}&nbsp;{{caffeine.unit}} of caffeine consumed.'],
                                ['when' => 'water > 0', 'text' => ' {{water.formattedValue}}&nbsp;{{water.unit}} of water used.'],
                                ['when' => 'water > 0 and water_people > 1', 'text' => 'That\'s how much water {{water_people.formattedValue}} people drink in a year!'],
                                ['when' => 'CO2 > 0', 'text' => ' {{CO2.formattedValue}}&nbsp;{{CO2.unit}} CO2eq produced.'],
                                ['when' => 'CO2 > 0 and trees > 0', 'text' => ' ~{{trees.formattedValue}}&nbsp;trees are needed to absorb your CO2 emissions.'],
                                ['when' => 'CO2 > 0 and  trees <= 0 and trees1 > 0', 'text' => ' ~{{trees1.formattedValue}}&nbsp;trees are needed to absorb your CO2 emissions over a time_name.'],
                                ['when' => 'CO2 > 0', 'text' => <<<'TXT'
                                This amount of CO2eq is also equivalent to:  {{smartphones.formattedValue}}&nbsp;smartphones charged.  {{gasoline.formattedValue}}&nbsp;{{water.unit}} of gasoline consumed.  {{distance.formattedValue}}&nbsp;{{distance.unit}} by an average passenger vehicle.
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'change > 0', 'text' => 'Thanks to all your sacrifices, you managed to save:  {{change.formattedValue}}&nbsp;{{change.unit}} CO2eq'],
                                ['when' => 'trees2 > 0', 'text' => '~ this means {{trees2.formattedValue}} fewer trees are needed to absorb your CO2 emissions over a {{time_2.name}}.'],
                                ['when' => 'change > 0', 'text' => 'The amount of CO2eq you saved is also equivalent to:  {{smartphones2.formattedValue}} smartphones charged.'],
                                ['when' => 'change > 0 and gasoline2 > 0', 'text' => ' {{gasoline2.formattedValue}} {{gasoline2.fullUnit}} of gasoline consumed.&nbsp;'],
                                ['when' => 'change > 0', 'text' => ' {{distance2.formattedValue}} {{distance2.unit}} by an average passenger vehicle.&nbsp;'],
                                ['when' => 'change > 0 and cups > 0 and reusableCup == 1 and cups == 1', 'text' => ' You managed to save {{cups.formattedValue}} single use cup.'],
                                ['when' => 'change > 0 and cups > 0 and reusableCup == 1 and cups > 1', 'text' => ' You managed to save {{cups.formattedValue}} single use cups.&nbsp;'],
                                ['when' => 'reusableCup == 0 and milk == 0 and cannedCO == 0 and sustainable == 0', 'text' => ' Hey, you haven\'t made any changes yet! Let\'s get going and save the world—one coffee at a time!'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                         To maximally lower your CO2 footprint, try: • Making your coffee at home, • Using reusable cups, • Leaving out straws, • Drinking coffee with without milk... • ...or with vegan milk, • Omitting canned coffees, • Choosing sustainable &amp; fair trade products.
                        TXT],
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
                            'name' => 'CO2',
                            'label' => 'CO==2==',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Landuse',
                            'label' => 'Landuse',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water',
                            'label' => 'Water',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'change',
                            'label' => 'Change',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caffeine',
                            'label' => 'Total caffeine',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coffeeNumber',
                            'label' => 'Coffee number',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'changeReusableCups',
                            'label' => 'Change reusable cups',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'distance',
                            'label' => 'Distance',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'km',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gasoline',
                            'label' => 'Gasoline',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'screens',
                            'label' => 'Screens',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'smartphones',
                            'label' => 'Smartphones',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'trees',
                            'label' => 'Trees',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gasoline2',
                            'label' => 'Gasoline2',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'smartphones2',
                            'label' => 'Smartphones2',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'trees2',
                            'label' => 'Trees2',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'distance2',
                            'label' => 'Distance2',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'km',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cups',
                            'label' => 'Cups',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
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
                            'name' => 'water_yearly',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water_people',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'trees1',
                            'label' => '',
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
            'title' => 'Landuse =  time_1*0.13*(espresso1+cappuccino1 +latte1+ flat1+americano1+ filter1 +drip1 + instant1+ press1+can1)',
            'results' => [
                'latte1' => '(100/13)*Landuse/time_1 - americano1 - can1 - cappuccino1 - drip1 - espresso1 - filter1 - flat1 - instant1 - press1',
                'filter1' => '(100/13)*Landuse/time_1 - americano1 - can1 - cappuccino1 - drip1 - espresso1 - flat1 - instant1 - latte1 - press1',
                'time_1' => '(100/13)*Landuse/(americano1 + can1 + cappuccino1 + drip1 + espresso1 + filter1 + flat1 + instant1 + latte1 + press1)',
                'drip1' => '(100/13)*Landuse/time_1 - americano1 - can1 - cappuccino1 - espresso1 - filter1 - flat1 - instant1 - latte1 - press1',
                'instant1' => '(100/13)*Landuse/time_1 - americano1 - can1 - cappuccino1 - drip1 - espresso1 - filter1 - flat1 - latte1 - press1',
                'Landuse' => '(13/100)*time_1*(americano1 + can1 + cappuccino1 + drip1 + espresso1 + filter1 + flat1 + instant1 + latte1 + press1)',
                'cappuccino1' => '(100/13)*Landuse/time_1 - americano1 - can1 - drip1 - espresso1 - filter1 - flat1 - instant1 - latte1 - press1',
                'americano1' => '(100/13)*Landuse/time_1 - can1 - cappuccino1 - drip1 - espresso1 - filter1 - flat1 - instant1 - latte1 - press1',
                'press1' => '(100/13)*Landuse/time_1 - americano1 - can1 - cappuccino1 - drip1 - espresso1 - filter1 - flat1 - instant1 - latte1',
                'can1' => '(100/13)*Landuse/time_1 - americano1 - cappuccino1 - drip1 - espresso1 - filter1 - flat1 - instant1 - latte1 - press1',
                'espresso1' => '(100/13)*Landuse/time_1 - americano1 - can1 - cappuccino1 - drip1 - filter1 - flat1 - instant1 - latte1 - press1',
                'flat1' => '(100/13)*Landuse/time_1 - americano1 - can1 - cappuccino1 - drip1 - espresso1 - filter1 - instant1 - latte1 - press1',
            ],
        ],
        [
            'title' => 'distance = 1.60934*2.48*CO2',
            'results' => ['CO2' => '(625000/2494477)*distance', 'distance' => '(2494477/625000)*CO2'],
        ],
        [
            'title' => 'distance2 = 1.60934*2.48*change',
            'results' => ['change' => '(625000/2494477)*distance2', 'distance2' => '(2494477/625000)*change'],
        ],
        [
            'title' => <<<'TXT'
            caffeine = time_1*(2.57*espresso_vol +0.67*latte_vol + 1.03*cappuccino_vol + 0.81*flat_vol + 0.67*americano_vol+ 0.42*filter_vol + 0.74*can_vol+ 0.41*drip_vol+ 0.3*instant_vol + 0.47*press_vol)
            TXT,
            'results' => [
                'filter_vol' => <<<'TXT'
                (1/42)*(100*caffeine - time_1*(67*americano_vol + 74*can_vol + 103*cappuccino_vol + 41*drip_vol + 257*espresso_vol + 81*flat_vol + 30*instant_vol + 67*latte_vol + 47*press_vol))/time_1
                TXT,
                'flat_vol' => <<<'TXT'
                (1/81)*(100*caffeine - time_1*(67*americano_vol + 74*can_vol + 103*cappuccino_vol + 41*drip_vol + 257*espresso_vol + 42*filter_vol + 30*instant_vol + 67*latte_vol + 47*press_vol))/time_1
                TXT,
                'latte_vol' => <<<'TXT'
                (1/67)*(100*caffeine - time_1*(67*americano_vol + 74*can_vol + 103*cappuccino_vol + 41*drip_vol + 257*espresso_vol + 42*filter_vol + 81*flat_vol + 30*instant_vol + 47*press_vol))/time_1
                TXT,
                'time_1' => <<<'TXT'
                100*caffeine/(67*americano_vol + 74*can_vol + 103*cappuccino_vol + 41*drip_vol + 257*espresso_vol + 42*filter_vol + 81*flat_vol + 30*instant_vol + 67*latte_vol + 47*press_vol)
                TXT,
                'drip_vol' => <<<'TXT'
                (1/41)*(100*caffeine - time_1*(67*americano_vol + 74*can_vol + 103*cappuccino_vol + 257*espresso_vol + 42*filter_vol + 81*flat_vol + 30*instant_vol + 67*latte_vol + 47*press_vol))/time_1
                TXT,
                'americano_vol' => <<<'TXT'
                (1/67)*(100*caffeine - time_1*(74*can_vol + 103*cappuccino_vol + 41*drip_vol + 257*espresso_vol + 42*filter_vol + 81*flat_vol + 30*instant_vol + 67*latte_vol + 47*press_vol))/time_1
                TXT,
                'instant_vol' => <<<'TXT'
                (1/30)*(100*caffeine - time_1*(67*americano_vol + 74*can_vol + 103*cappuccino_vol + 41*drip_vol + 257*espresso_vol + 42*filter_vol + 81*flat_vol + 67*latte_vol + 47*press_vol))/time_1
                TXT,
                'cappuccino_vol' => <<<'TXT'
                (1/103)*(100*caffeine - time_1*(67*americano_vol + 74*can_vol + 41*drip_vol + 257*espresso_vol + 42*filter_vol + 81*flat_vol + 30*instant_vol + 67*latte_vol + 47*press_vol))/time_1
                TXT,
                'caffeine' => <<<'TXT'
                (1/100)*time_1*(67*americano_vol + 74*can_vol + 103*cappuccino_vol + 41*drip_vol + 257*espresso_vol + 42*filter_vol + 81*flat_vol + 30*instant_vol + 67*latte_vol + 47*press_vol)
                TXT,
                'can_vol' => <<<'TXT'
                (1/74)*(100*caffeine - time_1*(67*americano_vol + 103*cappuccino_vol + 41*drip_vol + 257*espresso_vol + 42*filter_vol + 81*flat_vol + 30*instant_vol + 67*latte_vol + 47*press_vol))/time_1
                TXT,
                'espresso_vol' => <<<'TXT'
                (1/257)*(100*caffeine - time_1*(67*americano_vol + 74*can_vol + 103*cappuccino_vol + 41*drip_vol + 42*filter_vol + 81*flat_vol + 30*instant_vol + 67*latte_vol + 47*press_vol))/time_1
                TXT,
                'press_vol' => <<<'TXT'
                (1/47)*(100*caffeine - time_1*(67*americano_vol + 74*can_vol + 103*cappuccino_vol + 41*drip_vol + 257*espresso_vol + 42*filter_vol + 81*flat_vol + 30*instant_vol + 67*latte_vol))/time_1
                TXT,
            ],
        ],
        [
            'title' => 'espresso_vol = espresso1 *59',
            'results' => ['espresso1' => '(1/59)*espresso_vol', 'espresso_vol' => '59*espresso1'],
        ],
        [
            'title' => 'latte_vol = latte1*236',
            'results' => ['latte1' => '(1/236)*latte_vol', 'latte_vol' => '236*latte1'],
        ],
        [
            'title' => 'cappuccino_vol = cappuccino1*177',
            'results' => ['cappuccino1' => '(1/177)*cappuccino_vol', 'cappuccino_vol' => '177*cappuccino1'],
        ],
        [
            'title' => 'flat_vol= flat1*177',
            'results' => ['flat_vol' => '177*flat1', 'flat1' => '(1/177)*flat_vol'],
        ],
        [
            'title' => 'americano_vol = americano1*236',
            'results' => ['americano1' => '(1/236)*americano_vol', 'americano_vol' => '236*americano1'],
        ],
        [
            'title' => 'filter_vol = filter1 * 236',
            'results' => ['filter_vol' => '236*filter1', 'filter1' => '(1/236)*filter_vol'],
        ],
        [
            'title' => 'can_vol = can1 * 190',
            'results' => ['can1' => '(1/190)*can_vol', 'can_vol' => '190*can1'],
        ],
        [
            'title' => 'drip_vol = drip1 * 236',
            'results' => ['drip_vol' => '236*drip1', 'drip1' => '(1/236)*drip_vol'],
        ],
        [
            'title' => 'instant_vol = instant1 * 236',
            'results' => ['instant1' => '(1/236)*instant_vol', 'instant_vol' => '236*instant1'],
        ],
        [
            'title' => 'press_vol = press1 * 236',
            'results' => ['press_vol' => '236*press1', 'press1' => '(1/236)*press_vol'],
        ],
        [
            'title' => 'time_1=time_2',
            'results' => ['time_2' => 'time_1', 'time_1' => 'time_2'],
        ],
        [
            'title' => 'water = time_1* 140*(espresso1+cappuccino1 +latte1+ flat1+americano1+ filter1 +drip1 + instant1+ press1+can1) ',
            'results' => [
                'latte1' => '-americano1 - can1 - cappuccino1 - drip1 - espresso1 - filter1 - flat1 - instant1 - press1 + (1/140)*water/time_1',
                'filter1' => '-americano1 - can1 - cappuccino1 - drip1 - espresso1 - flat1 - instant1 - latte1 - press1 + (1/140)*water/time_1',
                'time_1' => '(1/140)*water/(americano1 + can1 + cappuccino1 + drip1 + espresso1 + filter1 + flat1 + instant1 + latte1 + press1)',
                'drip1' => '-americano1 - can1 - cappuccino1 - espresso1 - filter1 - flat1 - instant1 - latte1 - press1 + (1/140)*water/time_1',
                'instant1' => '-americano1 - can1 - cappuccino1 - drip1 - espresso1 - filter1 - flat1 - latte1 - press1 + (1/140)*water/time_1',
                'cappuccino1' => '-americano1 - can1 - drip1 - espresso1 - filter1 - flat1 - instant1 - latte1 - press1 + (1/140)*water/time_1',
                'americano1' => '-can1 - cappuccino1 - drip1 - espresso1 - filter1 - flat1 - instant1 - latte1 - press1 + (1/140)*water/time_1',
                'water' => '140*time_1*(americano1 + can1 + cappuccino1 + drip1 + espresso1 + filter1 + flat1 + instant1 + latte1 + press1)',
                'press1' => '-americano1 - can1 - cappuccino1 - drip1 - espresso1 - filter1 - flat1 - instant1 - latte1 + (1/140)*water/time_1',
                'can1' => '-americano1 - cappuccino1 - drip1 - espresso1 - filter1 - flat1 - instant1 - latte1 - press1 + (1/140)*water/time_1',
                'espresso1' => '-americano1 - can1 - cappuccino1 - drip1 - filter1 - flat1 - instant1 - latte1 - press1 + (1/140)*water/time_1',
                'flat1' => '-americano1 - can1 - cappuccino1 - drip1 - espresso1 - filter1 - instant1 - latte1 - press1 + (1/140)*water/time_1',
            ],
        ],
        [
            'title' => 'coffeeNumber = espresso1 + latte1+cappuccino1+flat1+americano1+filter1+can1+drip1+instant1+press1',
            'results' => [
                'latte1' => '-americano1 - can1 - cappuccino1 + coffeeNumber - drip1 - espresso1 - filter1 - flat1 - instant1 - press1',
                'filter1' => '-americano1 - can1 - cappuccino1 + coffeeNumber - drip1 - espresso1 - flat1 - instant1 - latte1 - press1',
                'coffeeNumber' => 'americano1 + can1 + cappuccino1 + drip1 + espresso1 + filter1 + flat1 + instant1 + latte1 + press1',
                'drip1' => '-americano1 - can1 - cappuccino1 + coffeeNumber - espresso1 - filter1 - flat1 - instant1 - latte1 - press1',
                'instant1' => '-americano1 - can1 - cappuccino1 + coffeeNumber - drip1 - espresso1 - filter1 - flat1 - latte1 - press1',
                'cappuccino1' => '-americano1 - can1 + coffeeNumber - drip1 - espresso1 - filter1 - flat1 - instant1 - latte1 - press1',
                'americano1' => '-can1 - cappuccino1 + coffeeNumber - drip1 - espresso1 - filter1 - flat1 - instant1 - latte1 - press1',
                'press1' => '-americano1 - can1 - cappuccino1 + coffeeNumber - drip1 - espresso1 - filter1 - flat1 - instant1 - latte1',
                'can1' => '-americano1 - cappuccino1 + coffeeNumber - drip1 - espresso1 - filter1 - flat1 - instant1 - latte1 - press1',
                'espresso1' => '-americano1 - can1 - cappuccino1 + coffeeNumber - drip1 - filter1 - flat1 - instant1 - latte1 - press1',
                'flat1' => '-americano1 - can1 - cappuccino1 + coffeeNumber - drip1 - espresso1 - filter1 - instant1 - latte1 - press1',
            ],
        ],
        [
            'title' => <<<'TXT'
            CO2 =  time_1*0.001*(1.6*(espresso_vol ) + 1.02*(latte_vol ) + 1.19*(cappuccino_vol)+ 0.93*(flat_vol) + 0.22*(americano_vol)+0.32*(filter_vol)+1.2*(can_vol)+0.38*(drip_vol)+0.22*(instant_vol)+0.26*(press_vol))
            TXT,
            'results' => [
                'filter_vol' => <<<'TXT'
                (1/32)*(100000*CO2 - time_1*(22*americano_vol + 120*can_vol + 119*cappuccino_vol + 38*drip_vol + 160*espresso_vol + 93*flat_vol + 22*instant_vol + 102*latte_vol + 26*press_vol))/time_1
                TXT,
                'flat_vol' => <<<'TXT'
                (1/93)*(100000*CO2 - time_1*(22*americano_vol + 120*can_vol + 119*cappuccino_vol + 38*drip_vol + 160*espresso_vol + 32*filter_vol + 22*instant_vol + 102*latte_vol + 26*press_vol))/time_1
                TXT,
                'latte_vol' => <<<'TXT'
                (1/102)*(100000*CO2 - time_1*(22*americano_vol + 120*can_vol + 119*cappuccino_vol + 38*drip_vol + 160*espresso_vol + 32*filter_vol + 93*flat_vol + 22*instant_vol + 26*press_vol))/time_1
                TXT,
                'time_1' => <<<'TXT'
                100000*CO2/(22*americano_vol + 120*can_vol + 119*cappuccino_vol + 38*drip_vol + 160*espresso_vol + 32*filter_vol + 93*flat_vol + 22*instant_vol + 102*latte_vol + 26*press_vol)
                TXT,
                'drip_vol' => <<<'TXT'
                (1/38)*(100000*CO2 - time_1*(22*americano_vol + 120*can_vol + 119*cappuccino_vol + 160*espresso_vol + 32*filter_vol + 93*flat_vol + 22*instant_vol + 102*latte_vol + 26*press_vol))/time_1
                TXT,
                'americano_vol' => <<<'TXT'
                (1/22)*(100000*CO2 - time_1*(120*can_vol + 119*cappuccino_vol + 38*drip_vol + 160*espresso_vol + 32*filter_vol + 93*flat_vol + 22*instant_vol + 102*latte_vol + 26*press_vol))/time_1
                TXT,
                'CO2' => <<<'TXT'
                (1/100000)*time_1*(22*americano_vol + 120*can_vol + 119*cappuccino_vol + 38*drip_vol + 160*espresso_vol + 32*filter_vol + 93*flat_vol + 22*instant_vol + 102*latte_vol + 26*press_vol)
                TXT,
                'instant_vol' => <<<'TXT'
                (1/22)*(100000*CO2 - time_1*(22*americano_vol + 120*can_vol + 119*cappuccino_vol + 38*drip_vol + 160*espresso_vol + 32*filter_vol + 93*flat_vol + 102*latte_vol + 26*press_vol))/time_1
                TXT,
                'cappuccino_vol' => <<<'TXT'
                (1/119)*(100000*CO2 - time_1*(22*americano_vol + 120*can_vol + 38*drip_vol + 160*espresso_vol + 32*filter_vol + 93*flat_vol + 22*instant_vol + 102*latte_vol + 26*press_vol))/time_1
                TXT,
                'can_vol' => <<<'TXT'
                (1/120)*(100000*CO2 - time_1*(22*americano_vol + 119*cappuccino_vol + 38*drip_vol + 160*espresso_vol + 32*filter_vol + 93*flat_vol + 22*instant_vol + 102*latte_vol + 26*press_vol))/time_1
                TXT,
                'espresso_vol' => <<<'TXT'
                (1/160)*(100000*CO2 - time_1*(22*americano_vol + 120*can_vol + 119*cappuccino_vol + 38*drip_vol + 32*filter_vol + 93*flat_vol + 22*instant_vol + 102*latte_vol + 26*press_vol))/time_1
                TXT,
                'press_vol' => <<<'TXT'
                (1/26)*(100000*CO2 - time_1*(22*americano_vol + 120*can_vol + 119*cappuccino_vol + 38*drip_vol + 160*espresso_vol + 32*filter_vol + 93*flat_vol + 22*instant_vol + 102*latte_vol))/time_1
                TXT,
            ],
        ],
        [
            'title' => <<<'TXT'
            change =  time_2*0.001*((can1 * 103 * cannedCO) + get_capp(cappuccino_vol, sustainable, milk) + (0.8 *espresso_vol * 1.6*sustainable+(reusableCup * 1.25))+ get_flat(flat_vol, sustainable, milk)+ get_latte(latte_vol, latte1, sustainable, milk)+  (0.8 *americano_vol * 0.22*sustainable)+ (0.8 *filter_vol * 0.32*sustainable)+  (0.8 *drip_vol * 0.38*sustainable)+ (0.8 *instant_vol * 0.22*sustainable)+ (0.8 *press_vol * 0.26*sustainable)+changeReusableCups)
            TXT,
            'results' => [
                'changeReusableCups' => <<<'TXT'
                (1/500)*(500000*change - time_2*(88*americano_vol*sustainable + 51500*can1*cannedCO + 152*drip_vol*sustainable + 640*espresso_vol*sustainable + 128*filter_vol*sustainable + 88*instant_vol*sustainable + 104*press_vol*sustainable + 625*reusableCup + 500*get_capp(cappuccino_vol, sustainable, milk) + 500*get_flat(flat_vol, sustainable, milk) + 500*get_latte(latte_vol, latte1, sustainable, milk)))/time_2
                TXT,
                'time_2' => <<<'TXT'
                500000*change/(88*americano_vol*sustainable + 51500*can1*cannedCO + 500*changeReusableCups + 152*drip_vol*sustainable + 640*espresso_vol*sustainable + 128*filter_vol*sustainable + 88*instant_vol*sustainable + 104*press_vol*sustainable + 625*reusableCup + 500*get_capp(cappuccino_vol, sustainable, milk) + 500*get_flat(flat_vol, sustainable, milk) + 500*get_latte(latte_vol, latte1, sustainable, milk))
                TXT,
                'reusableCup' => <<<'TXT'
                (4/625)*(125000*change - time_2*(22*americano_vol*sustainable + 12875*can1*cannedCO + 125*changeReusableCups + 38*drip_vol*sustainable + 160*espresso_vol*sustainable + 32*filter_vol*sustainable + 22*instant_vol*sustainable + 26*press_vol*sustainable + 125*get_capp(cappuccino_vol, sustainable, milk) + 125*get_flat(flat_vol, sustainable, milk) + 125*get_latte(latte_vol, latte1, sustainable, milk)))/time_2
                TXT,
                'filter_vol' => <<<'TXT'
                (1/128)*(500000*change - 8*sustainable*time_2*(11*americano_vol + 19*drip_vol + 80*espresso_vol + 11*instant_vol + 13*press_vol) - 125*time_2*(412*can1*cannedCO + 4*changeReusableCups + 5*reusableCup + 4*get_capp(cappuccino_vol, sustainable, milk) + 4*get_flat(flat_vol, sustainable, milk) + 4*get_latte(latte_vol, latte1, sustainable, milk)))/(sustainable*time_2)
                TXT,
                'change' => <<<'TXT'
                (1/500000)*time_2*(88*americano_vol*sustainable + 51500*can1*cannedCO + 500*changeReusableCups + 152*drip_vol*sustainable + 640*espresso_vol*sustainable + 128*filter_vol*sustainable + 88*instant_vol*sustainable + 104*press_vol*sustainable + 625*reusableCup + 500*get_capp(cappuccino_vol, sustainable, milk) + 500*get_flat(flat_vol, sustainable, milk) + 500*get_latte(latte_vol, latte1, sustainable, milk))
                TXT,
                'americano_vol' => <<<'TXT'
                (1/88)*(500000*change - 8*sustainable*time_2*(19*drip_vol + 80*espresso_vol + 16*filter_vol + 11*instant_vol + 13*press_vol) - 125*time_2*(412*can1*cannedCO + 4*changeReusableCups + 5*reusableCup + 4*get_capp(cappuccino_vol, sustainable, milk) + 4*get_flat(flat_vol, sustainable, milk) + 4*get_latte(latte_vol, latte1, sustainable, milk)))/(sustainable*time_2)
                TXT,
                'drip_vol' => <<<'TXT'
                (1/152)*(500000*change - 8*sustainable*time_2*(11*americano_vol + 80*espresso_vol + 16*filter_vol + 11*instant_vol + 13*press_vol) - 125*time_2*(412*can1*cannedCO + 4*changeReusableCups + 5*reusableCup + 4*get_capp(cappuccino_vol, sustainable, milk) + 4*get_flat(flat_vol, sustainable, milk) + 4*get_latte(latte_vol, latte1, sustainable, milk)))/(sustainable*time_2)
                TXT,
                'instant_vol' => <<<'TXT'
                (1/88)*(500000*change - 8*sustainable*time_2*(11*americano_vol + 19*drip_vol + 80*espresso_vol + 16*filter_vol + 13*press_vol) - 125*time_2*(412*can1*cannedCO + 4*changeReusableCups + 5*reusableCup + 4*get_capp(cappuccino_vol, sustainable, milk) + 4*get_flat(flat_vol, sustainable, milk) + 4*get_latte(latte_vol, latte1, sustainable, milk)))/(sustainable*time_2)
                TXT,
                'cannedCO' => <<<'TXT'
                (1/51500)*(500000*change - time_2*(88*americano_vol*sustainable + 500*changeReusableCups + 152*drip_vol*sustainable + 640*espresso_vol*sustainable + 128*filter_vol*sustainable + 88*instant_vol*sustainable + 104*press_vol*sustainable + 625*reusableCup + 500*get_capp(cappuccino_vol, sustainable, milk) + 500*get_flat(flat_vol, sustainable, milk) + 500*get_latte(latte_vol, latte1, sustainable, milk)))/(can1*time_2)
                TXT,
                'can1' => <<<'TXT'
                (1/51500)*(500000*change - time_2*(88*americano_vol*sustainable + 500*changeReusableCups + 152*drip_vol*sustainable + 640*espresso_vol*sustainable + 128*filter_vol*sustainable + 88*instant_vol*sustainable + 104*press_vol*sustainable + 625*reusableCup + 500*get_capp(cappuccino_vol, sustainable, milk) + 500*get_flat(flat_vol, sustainable, milk) + 500*get_latte(latte_vol, latte1, sustainable, milk)))/(cannedCO*time_2)
                TXT,
                'espresso_vol' => <<<'TXT'
                (1/640)*(500000*change - 8*sustainable*time_2*(11*americano_vol + 19*drip_vol + 16*filter_vol + 11*instant_vol + 13*press_vol) - 125*time_2*(412*can1*cannedCO + 4*changeReusableCups + 5*reusableCup + 4*get_capp(cappuccino_vol, sustainable, milk) + 4*get_flat(flat_vol, sustainable, milk) + 4*get_latte(latte_vol, latte1, sustainable, milk)))/(sustainable*time_2)
                TXT,
                'press_vol' => <<<'TXT'
                (1/104)*(500000*change - 8*sustainable*time_2*(11*americano_vol + 19*drip_vol + 80*espresso_vol + 16*filter_vol + 11*instant_vol) - 125*time_2*(412*can1*cannedCO + 4*changeReusableCups + 5*reusableCup + 4*get_capp(cappuccino_vol, sustainable, milk) + 4*get_flat(flat_vol, sustainable, milk) + 4*get_latte(latte_vol, latte1, sustainable, milk)))/(sustainable*time_2)
                TXT,
            ],
        ],
        [
            'title' => <<<'TXT'
            changeReusableCups = (espresso_vol*1.6*0.25*reusableCup)+(latte_vol*1.02*reusableCup*0.05)+ (cappuccino_vol*1.19*reusableCup*0.05)+(flat_vol*0.93*reusableCup*0.05)+(americano_vol*0.22*reusableCup*0.20)+(filter_vol*0.32*reusableCup*0.04)+(drip_vol*0.38*reusableCup*0.1)+(instant_vol*0.22*reusableCup*0.05)+(press_vol*0.26*reusableCup*0.01)
            TXT,
            'results' => [
                'filter_vol' => <<<'TXT'
                (1/128)*(10000*changeReusableCups - reusableCup*(440*americano_vol + 595*cappuccino_vol + 380*drip_vol + 4000*espresso_vol + 465*flat_vol + 110*instant_vol + 510*latte_vol + 26*press_vol))/reusableCup
                TXT,
                'flat_vol' => <<<'TXT'
                (1/465)*(10000*changeReusableCups - reusableCup*(440*americano_vol + 595*cappuccino_vol + 380*drip_vol + 4000*espresso_vol + 128*filter_vol + 110*instant_vol + 510*latte_vol + 26*press_vol))/reusableCup
                TXT,
                'latte_vol' => <<<'TXT'
                (1/510)*(10000*changeReusableCups - reusableCup*(440*americano_vol + 595*cappuccino_vol + 380*drip_vol + 4000*espresso_vol + 128*filter_vol + 465*flat_vol + 110*instant_vol + 26*press_vol))/reusableCup
                TXT,
                'reusableCup' => <<<'TXT'
                10000*changeReusableCups/(440*americano_vol + 595*cappuccino_vol + 380*drip_vol + 4000*espresso_vol + 128*filter_vol + 465*flat_vol + 110*instant_vol + 510*latte_vol + 26*press_vol)
                TXT,
                'americano_vol' => <<<'TXT'
                (1/440)*(10000*changeReusableCups - reusableCup*(595*cappuccino_vol + 380*drip_vol + 4000*espresso_vol + 128*filter_vol + 465*flat_vol + 110*instant_vol + 510*latte_vol + 26*press_vol))/reusableCup
                TXT,
                'drip_vol' => <<<'TXT'
                (1/380)*(10000*changeReusableCups - reusableCup*(440*americano_vol + 595*cappuccino_vol + 4000*espresso_vol + 128*filter_vol + 465*flat_vol + 110*instant_vol + 510*latte_vol + 26*press_vol))/reusableCup
                TXT,
                'instant_vol' => <<<'TXT'
                (1/110)*(10000*changeReusableCups - reusableCup*(440*americano_vol + 595*cappuccino_vol + 380*drip_vol + 4000*espresso_vol + 128*filter_vol + 465*flat_vol + 510*latte_vol + 26*press_vol))/reusableCup
                TXT,
                'cappuccino_vol' => <<<'TXT'
                (1/595)*(10000*changeReusableCups - reusableCup*(440*americano_vol + 380*drip_vol + 4000*espresso_vol + 128*filter_vol + 465*flat_vol + 110*instant_vol + 510*latte_vol + 26*press_vol))/reusableCup
                TXT,
                'changeReusableCups' => <<<'TXT'
                (1/10000)*reusableCup*(440*americano_vol + 595*cappuccino_vol + 380*drip_vol + 4000*espresso_vol + 128*filter_vol + 465*flat_vol + 110*instant_vol + 510*latte_vol + 26*press_vol)
                TXT,
                'espresso_vol' => <<<'TXT'
                (1/4000)*(10000*changeReusableCups - reusableCup*(440*americano_vol + 595*cappuccino_vol + 380*drip_vol + 128*filter_vol + 465*flat_vol + 110*instant_vol + 510*latte_vol + 26*press_vol))/reusableCup
                TXT,
                'press_vol' => <<<'TXT'
                (1/26)*(10000*changeReusableCups - reusableCup*(440*americano_vol + 595*cappuccino_vol + 380*drip_vol + 4000*espresso_vol + 128*filter_vol + 465*flat_vol + 110*instant_vol + 510*latte_vol))/reusableCup
                TXT,
            ],
        ],
        [
            'title' => 'trees = CO2/ (48*0.453592) /(time_1/52)',
            'results' => ['CO2' => '(170097/406250)*time_1*trees', 'trees' => '(406250/170097)*CO2/time_1', 'time_1' => '(406250/170097)*CO2/trees'],
        ],
        [
            'title' => 'gasoline = CO2/(8.887/ 3.785)',
            'results' => ['CO2' => '(8887/3785)*gasoline', 'gasoline' => '(3785/8887)*CO2'],
        ],
        [
            'title' => 'smartphones = 128*CO2',
            'results' => ['CO2' => '(1/128)*smartphones', 'smartphones' => '128*CO2'],
        ],
        [
            'title' => 'screens = Landuse/0.065',
            'results' => ['screens' => '(200/13)*Landuse', 'Landuse' => '(13/200)*screens'],
        ],
        [
            'title' => 'trees2 = change/ (48*0.453592) /(time_2/52)',
            'results' => ['trees2' => '(406250/170097)*change/time_2', 'time_2' => '(406250/170097)*change/trees2', 'change' => '(170097/406250)*time_2*trees2'],
        ],
        [
            'title' => 'gasoline2 = change/(8.887/ 3.785)',
            'results' => ['gasoline2' => '(3785/8887)*change', 'change' => '(8887/3785)*gasoline2'],
        ],
        [
            'title' => 'smartphones2 = 128*change',
            'results' => ['change' => '(1/128)*smartphones2', 'smartphones2' => '128*change'],
        ],
        [
            'title' => 'cups = time_2*(espresso1+cappuccino1 +latte1+ flat1+americano1+ filter1 +drip1 + instant1+ press1)',
            'results' => [
                'time_2' => 'cups/(americano1 + cappuccino1 + drip1 + espresso1 + filter1 + flat1 + instant1 + latte1 + press1)',
                'latte1' => '-americano1 - cappuccino1 + cups/time_2 - drip1 - espresso1 - filter1 - flat1 - instant1 - press1',
                'filter1' => '-americano1 - cappuccino1 + cups/time_2 - drip1 - espresso1 - flat1 - instant1 - latte1 - press1',
                'drip1' => '-americano1 - cappuccino1 + cups/time_2 - espresso1 - filter1 - flat1 - instant1 - latte1 - press1',
                'instant1' => '-americano1 - cappuccino1 + cups/time_2 - drip1 - espresso1 - filter1 - flat1 - latte1 - press1',
                'cappuccino1' => '-americano1 + cups/time_2 - drip1 - espresso1 - filter1 - flat1 - instant1 - latte1 - press1',
                'americano1' => '-cappuccino1 + cups/time_2 - drip1 - espresso1 - filter1 - flat1 - instant1 - latte1 - press1',
                'cups' => 'time_2*(americano1 + cappuccino1 + drip1 + espresso1 + filter1 + flat1 + instant1 + latte1 + press1)',
                'press1' => '-americano1 - cappuccino1 + cups/time_2 - drip1 - espresso1 - filter1 - flat1 - instant1 - latte1',
                'espresso1' => '-americano1 - cappuccino1 + cups/time_2 - drip1 - filter1 - flat1 - instant1 - latte1 - press1',
                'flat1' => '-americano1 - cappuccino1 + cups/time_2 - drip1 - espresso1 - filter1 - instant1 - latte1 - press1',
            ],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_rounded_value",function(value_to_round,decimal_places){var rounded_value=Number(parseFloat(value_to_round).toFixed(decimal_places));return rounded_value});omni.define("get_capp",function(ps1,sustainable,milk){var result;if(milk===0&&sustainable===0){result=0}else if(milk===0&&sustainable===1){result=0.5*ps1*1.19}else if(milk===1&&sustainable===1){result=ps1*0.66*1.19}else if(milk===2&&sustainable===1){result=ps1*1.19-ps1*0.82*0.22}else if(milk===1&&sustainable===0){result=ps1*0.49*1.19}else if(milk===2&&sustainable===0){result=ps1*0.97}return round_to(result,2)});omni.define("get_flat",function(ls1,sustainable,milk){var result;if(milk===0&&sustainable===0){result=0}else if(milk===0&&sustainable===1){result=0.625*ls1*0.93}else if(milk===1&&sustainable===1){result=ls1*0.75*0.93}else if(milk===2&&sustainable===1){result=ls1*0.93-ls1*0.82*0.22}else if(milk===1&&sustainable===0){result=ls1*0.25*0.93}else if(milk===2&&sustainable===0){result=ls1*0.71}return round_to(result,2)});omni.define("get_latte",function(bs1,latte1,sustainable,milk){var result;if(milk===0&&sustainable===0){result=0}else if(milk===0&&sustainable===1){result=0.4*bs1*1.02}else if(milk===1&&sustainable===1){result=bs1*0.73*1.02}else if(milk===2&&sustainable===1){result=bs1*1.02-latte1*30*1.6*0.82}else if(milk===1&&sustainable===0){result=bs1*0.49}else if(milk===2&&sustainable===0){result=bs1*1.02-latte1*30*1.6}return round_to(result,2)});function round_to(n,k){var factor=Math.pow(10,k+1);var n_=Math.round(Math.round(n*factor)/10);return n_/(factor/10)}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Coffee footprint works out Espresso volume and Latte volume from Espresso, Caffe latte and Cappuccino. It is a single relationship that reads espresso volume out of espresso, not a table of canned results keyed by them. Units for Espresso volume default to milliliters and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Coffee footprint calculator works', 'html' => <<<'TXT'
            <p>Coffee footprint answers one question from 11 numbers, and the answer is Espresso volume, Latte volume and Cappuccino volume.</p><p>In the form&#039;s own words, Landuse = (13 ÷ 100) × My coffee footprint in a... × (Americano + Canned coffee + Cappuccino + Drip + Espresso + Filter coffee + Flat white + Instant coffee + Caffe latte + French press).</p><p>The result panel carries Espresso volume, Latte volume, Cappuccino volume and Flat white volume, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 11 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Espresso</strong> — in weeks. 1 cup = 2 oz/ 59 mL</li><li><strong>Caffe latte</strong> — in weeks. 1 cup = 8 oz/ 236 mL (dairy milk included)</li><li><strong>Cappuccino</strong> — in weeks. 1 cup = 6 oz/ 177 mL (dairy milk included)</li><li><strong>Flat white</strong> — in weeks. 1 cup = 6 oz/ 177 mL (dairy milk included)</li><li><strong>Americano</strong> — in weeks. 1 cup = 8 oz/ 236 mL</li><li><strong>Filter coffee</strong> — in weeks. 1 cup = 8 oz/ 236 mL</li><li><strong>Canned coffee</strong> — in weeks. 1 cup = 6.4 oz/ 190 mL</li><li><strong>Drip</strong> — in weeks. 1 cup = 8 oz/ 236 mL</li><li><strong>Instant coffee</strong> — in weeks. 1 cup = 8 oz/ 236 mL</li><li><strong>French press</strong> — in weeks. 1 cup = 8 oz/ 236 mL</li><li><strong>My coffee footprint in a…</strong> — a plain number, no unit</li></ul><p>The result boxes are Espresso volume in milliliters, Latte volume in milliliters, Cappuccino volume in milliliters, Flat white volume in milliliters, Americano volume in milliliters, Filter coffee volume in milliliters, Canned coffee volume in milliliters, Drip volume in cubic meters, Instant coffee volume in cubic meters, French press volume in milliliters, Use only reusable cups?, Drink less canned coffee?, Calculate my results for a…, CO₂, Landuse, Water, Change, Total caffeine, Coffee number, Change reusable cups, Distance, Gasoline, Screens, Smartphones, Trees, Gasoline2, Smartphones2, Trees2, Distance2, Cups; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, I want to know = 0, Would you like to see more options? = 0, Coffee volume = 0, Consider your milk use? = 0 and Buy sustainable coffee? = 0 gives <strong>Use only reusable cups?</strong> = 0, <strong>Drink less canned coffee?</strong> = 0, <strong>My coffee footprint in a…</strong> = 4.44 and <strong>Calculate my results for a…</strong> = 4.44.</p><ul><li><strong>Use only reusable cups?</strong> = 0</li><li><strong>Drink less canned coffee?</strong> = 0</li><li><strong>My coffee footprint in a…</strong> = 4.44</li><li><strong>Calculate my results for a…</strong> = 4.44</li></ul><p>The line behind those figures is <strong>Landuse</strong> = <code>(13 ÷ 100) × My coffee footprint in a... × (Americano + Canned coffee + Cappuccino + Drip + Espresso + Filter coffee + Flat white + Instant coffee + Caffe latte + French press)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Use only reusable cups?</strong> = 0, <strong>Drink less canned coffee?</strong> = 0, <strong>My coffee footprint in a...</strong> = 4.44 and <strong>Calculate my results for a...</strong> = 4.44. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Espresso volume lists 16 options and opens on milliliters. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Landuse</strong> = <code>(13 ÷ 100) × My coffee footprint in a... × (Americano + Canned coffee + Cappuccino + Drip + Espresso + Filter coffee + Flat white + Instant coffee + Caffe latte + French press)</code></li><li><strong>Caffe latte</strong> = <code>(100 ÷ 13) × Landuse ÷ My coffee footprint in a... − Americano − Canned coffee − Cappuccino − Drip − Espresso − Filter coffee − Flat white − Instant coffee − French press</code></li><li><strong>Filter coffee</strong> = <code>(100 ÷ 13) × Landuse ÷ My coffee footprint in a... − Americano − Canned coffee − Cappuccino − Drip − Espresso − Flat white − Instant coffee − Caffe latte − French press</code></li><li><strong>My coffee footprint in a…</strong> = <code>(100 ÷ 13) × Landuse ÷ (Americano + Canned coffee + Cappuccino + Drip + Espresso + Filter coffee + Flat white + Instant coffee + Caffe latte + French press)</code></li><li><strong>Drip</strong> = <code>(100 ÷ 13) × Landuse ÷ My coffee footprint in a... − Americano − Canned coffee − Cappuccino − Espresso − Filter coffee − Flat white − Instant coffee − Caffe latte − French press</code></li><li><strong>Instant coffee</strong> = <code>(100 ÷ 13) × Landuse ÷ My coffee footprint in a... − Americano − Canned coffee − Cappuccino − Drip − Espresso − Filter coffee − Flat white − Caffe latte − French press</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Landuse</strong> = <code>(13 ÷ 100) × My coffee footprint in a... × (Americano + Canned coffee + Cappuccino + Drip + Espresso + Filter coffee + Flat white + Instant coffee + Caffe latte + French press)</code> — the form to use when My coffee footprint in a…, Americano, Canned coffee and Cappuccino are the values you have.</li><li><strong>Caffe latte</strong> = <code>(100 ÷ 13) × Landuse ÷ My coffee footprint in a... − Americano − Canned coffee − Cappuccino − Drip − Espresso − Filter coffee − Flat white − Instant coffee − French press</code> — the form to use when Landuse, My coffee footprint in a…, Americano and Canned coffee are the values you have.</li><li><strong>Filter coffee</strong> = <code>(100 ÷ 13) × Landuse ÷ My coffee footprint in a... − Americano − Canned coffee − Cappuccino − Drip − Espresso − Flat white − Instant coffee − Caffe latte − French press</code> — the form to use when Landuse, My coffee footprint in a…, Americano and Canned coffee are the values you have.</li><li><strong>My coffee footprint in a…</strong> = <code>(100 ÷ 13) × Landuse ÷ (Americano + Canned coffee + Cappuccino + Drip + Espresso + Filter coffee + Flat white + Instant coffee + Caffe latte + French press)</code> — the form to use when Landuse, Americano, Canned coffee and Cappuccino are the values you have.</li><li><strong>Drip</strong> = <code>(100 ÷ 13) × Landuse ÷ My coffee footprint in a... − Americano − Canned coffee − Cappuccino − Espresso − Filter coffee − Flat white − Instant coffee − Caffe latte − French press</code> — the form to use when Landuse, My coffee footprint in a…, Americano and Canned coffee are the values you have.</li><li><strong>Instant coffee</strong> = <code>(100 ÷ 13) × Landuse ÷ My coffee footprint in a... − Americano − Canned coffee − Cappuccino − Drip − Espresso − Filter coffee − Flat white − Caffe latte − French press</code> — the form to use when Landuse, My coffee footprint in a…, Americano and Canned coffee are the values you have.</li><li><strong>Cappuccino</strong> = <code>(100 ÷ 13) × Landuse ÷ My coffee footprint in a... − Americano − Canned coffee − Drip − Espresso − Filter coffee − Flat white − Instant coffee − Caffe latte − French press</code> — the form to use when Landuse, My coffee footprint in a…, Americano and Canned coffee are the values you have.</li><li><strong>Americano</strong> = <code>(100 ÷ 13) × Landuse ÷ My coffee footprint in a... − Canned coffee − Cappuccino − Drip − Espresso − Filter coffee − Flat white − Instant coffee − Caffe latte − French press</code> — the form to use when Landuse, My coffee footprint in a…, Canned coffee and Cappuccino are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Landuse, Caffe latte and Filter coffee can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Espresso, Caffe latte and Cappuccino carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Espresso volume, Latte volume and Cappuccino volume are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Espresso left as a guess.</strong> Anything typed into Espresso is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Caffe latte left as a guess.</strong> Anything typed into Caffe latte is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Espresso and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Espresso, Caffe latte, Cappuccino and Flat white ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Espresso — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Espresso volume in ml against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Espresso volume is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover milliliters and weeks. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Espresso, Caffe latte and Cappuccino measured, Espresso volume and Latte volume wanted.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/healthy-coffee">Healthy coffee</a>, <a href="/food/coffee-kick">Coffee kick</a> and <a href="/food/coffee">Coffee</a>.</p>
            TXT],
            ['title' => 'Limits and data handling', 'html' => <<<'TXT'
            <p>This calculator applies the relationships and assumptions shown on the page to the values entered. It cannot verify ingredient labels, measurements, equipment or conditions that are not represented in the form. Check the selected units and consult recipe, product or safety instructions where they apply.</p>
            <p>The result is a calculation, not a measurement of the food or drink. Use a scale, thermometer or product label when the real-world quantity or safety status matters.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Coffee footprint calculator work out?', 'a' => <<<'TXT'
            Espresso volume, Latte volume, Cappuccino volume and Flat white volume, from My coffee footprint in a…, Americano, Canned coffee and Cappuccino. The relationship is Landuse = (13 ÷ 100) × My coffee footprint in a... × (Americano + Canned coffee + Cappuccino + Drip + Espresso + Filter coffee + Flat white + Instant coffee + Caffe latte + French press).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Espresso (weeks), Caffe latte (weeks), Cappuccino (weeks), Flat white (weeks), Americano (weeks). Enter espresso, caffe latte and cappuccino; Espresso volume is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Landuse, Caffe latte, Filter coffee and My coffee footprint in a… can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'Are the Coffee footprint results exact?', 'a' => 'No. Nutrition and caffeine vary with brands, recipes, preparation and serving size. Use the product label for a closer estimate; this calculator is not individualized health advice.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Espresso volume is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Espresso blank and the page solves for it, reporting Espresso volume instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Espresso volume at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/food/healthy-coffee', 'name' => 'Healthy coffee'],
            ['path' => '/food/coffee-kick', 'name' => 'Coffee kick'],
            ['path' => '/food/coffee', 'name' => 'Coffee']
        ],
    ],
];
