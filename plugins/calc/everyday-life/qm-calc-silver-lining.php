<?php

/**
 * Quarantine silver lining
 * /everyday-life/silver-lining
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Quarantine silver lining',
    'meta' => ['title' => 'Quarantine silver lining — Free Online Calculator', 'description' => <<<'TXT'
    Quarantine silver lining reports ends at, total duration, commute time (one-way) and CO₂ emissions. Results come back in mos, with any other unit a click away.
    TXT, 'h1' => 'Quarantine silver lining Calculator', 'updated' => '2026-08-28'],
    'sections' => [
        [
            'title' => 'Lockdown',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'lockdown_start', 'label' => 'Starts at', 'type' => 'date', 'default' => '1586044800000'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'lockdown_end', 'label' => 'Ends at', 'type' => 'date', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lockdown_duration',
                            'label' => ' Total duration',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'benefit_option',
                            'label' => 'I want to see its...',
                            'type' => 'select',
                            'options' => [' Ecological benefits' => '3', '⏲ Time benefits' => '1', ' Financial benefits' => '2', 'Benefits in all aspects' => '4'],
                            'dataset' => 'Benefit options',
                            'default' => ' Ecological benefits',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Pre-lockdown commute',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'vehicle',
                            'label' => 'I commute using...',
                            'type' => 'select',
                            'options' => ['a car ' => '1', 'public transport ' => '2', 'a bike  / my legs ‍‍' => '3'],
                            'dataset' => 'Vehicle type',
                            'default' => 'a car ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days_a_week',
                            'label' => 'For a frequency of...',
                            'type' => 'number',
                            'suffix' => 'times / week',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'commute_time',
                            'label' => 'Commute time (one-way)',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'distance',
                            'label' => 'Distance to workplace (one-way)',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'km',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'congestion_level_options',
                            'label' => 'Congestion level',
                            'type' => 'select',
                            'options' => [
                                'No congestion (40 km/h)' => '40.0',
                                'Slight (32 km/h)' => '32.0',
                                'Average (24 km/h)' => '24.0',
                                'Rush hour (14.4 km/h)' => '14.4',
                                'Zombie apocalypse (5.5 km/h)' => '5.5',
                                'Enter a custom average car speed' => '0',
                            ],
                            'dataset' => 'Congestion level options',
                            'control' => 'DROPDOWN',
                            'help' => 'Select the last dropdown option to enter your average car speed while commuting.',
                            'default' => 'Rush hour (14.4 km/h)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_car_speed',
                            'label' => 'Average car speed',
                            'type' => 'result',
                            'unit' => '32',
                            'unit_default' => 'kmph',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'My car',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'engine_type',
                            'label' => 'Engine type',
                            'type' => 'select',
                            'options' => ['Petrol' => '0', 'Diesel' => '1'],
                            'dataset' => 'Engine type select',
                            'default' => 'Petrol',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'engine_year',
                            'label' => 'Production year',
                            'type' => 'select',
                            'options' => [
                                '2000 or older' => '1',
                                '2001' => '2',
                                '2002' => '3',
                                '2003' => '4',
                                '2004' => '5',
                                '2005' => '6',
                                '2006' => '7',
                                '2007' => '8',
                                '2008' => '9',
                                '2009' => '10',
                                '2010' => '11',
                                '2011' => '12',
                                '2012' => '13',
                                '2013' => '14',
                                '2014' => '15',
                                '2015' => '16',
                                '2016 or newer' => '17',
                            ],
                            'control' => 'DROPDOWN',
                            'default' => '2006',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CO2',
                            'label' => 'CO==2== emissions',
                            'type' => 'number',
                            'suffix' => 'g/km',
                            'help' => 'We estimate this based on your car\'s engine and production year. Feel free to modify this value.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gas_price',
                            'label' => 'Gas price',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fuel_economy',
                            'label' => ' Fuel economy',
                            'type' => 'number',
                            'unit' => '27',
                            'unit_default' => 'l100km',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '7', 'when' => null],
                                ['value' => '33.6', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'other_car_expenses',
                            'label' => 'Other car-related expenses',
                            'type' => 'number',
                            'suffix' => '$/year',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Public transport details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ticket',
                            'label' => 'I buy...',
                            'type' => 'select',
                            'options' => ['Season tickets' => '2', 'Single fare tickets' => '1'],
                            'dataset' => 'Ticket options',
                            'default' => 'Season tickets',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ticket_price',
                            'label' => ' Ticket price',
                            'type' => 'number',
                            'suffix' => '$',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'validity',
                            'label' => ' Ticket is valid for...',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Pre-lockdown eating habits (lunches, 7-day week)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lunches_out',
                            'label' => ' Eating out',
                            'type' => 'number',
                            'suffix' => 'times / week',
                            'help' => 'Assuming the average lunch out is $12.75.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lunches_ordered_before',
                            'label' => ' Ordered food',
                            'type' => 'number',
                            'suffix' => 'times / week',
                            'help' => 'Assuming the average take away costs $10.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lunches_home_before',
                            'label' => ' Cooking at home',
                            'type' => 'number',
                            'suffix' => 'times / week',
                            'help' => 'Assuming the average lunch at home costs $6.30.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'food_before > 14', 'text' => 'Eating more than two lunches a day may be dangerous for your health  Consider changing your eating habits.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Lockdown eating habits (lunches, 7-day week)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lunches_ordered_after',
                            'label' => ' Ordered food',
                            'type' => 'number',
                            'suffix' => 'times / week',
                            'help' => 'Assuming the average take away costs $10.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lunches_home_after',
                            'label' => ' Cooking at home',
                            'type' => 'number',
                            'suffix' => 'times / week',
                            'help' => 'Assuming the average lunch at home costs $6.30.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'food_after > 14', 'text' => 'Eating more than two lunches a day may be dangerous for your health  Consider changing your eating habits.&nbsp;'],
                                ['when' => 'food_savings < 0', 'text' => <<<'TXT'
                                Oh no! It seems that you spend more money on food during the lockdown . Why don't you prepare more meals yourself at home? Take a look at the extra time you have now and try some culinary experiments &nbsp;
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Time benefits',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_savings',
                            'label' => '⌚ Time saved',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'readonly' => true,
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
                                ['when' => '(benefit_option == 1 or benefit_option == 4) and time_savings > 0', 'text' => 'During this time:'],
                                ['when' => '(benefit_option == 1 or benefit_option == 4) and time_savings > 0 and books > 1', 'text' => 'You can read {{books.formattedValue}}&nbsp;new books  (on average). Why don\'t you pick some from your favorite genres?'],
                                ['when' => '(benefit_option == 1 or benefit_option == 4) and time_savings > 0 and books == 1', 'text' => 'You can read {{books.formattedValue}}&nbsp;new book  (on average). Why don\'t you pick one from your favorite genre?'],
                                ['when' => '(benefit_option == 1 or benefit_option == 4) and time_savings > 0 and seasonsNumber > 12', 'text' => <<<'TXT'
                                You can watch every episode of The Big Bang Theory, with time to spare. Have seen them all? Check our  Binge Watching Calculator to find some alternatives!&nbsp;
                                TXT],
                                ['when' => '(benefit_option == 1 or benefit_option == 4) and time_savings > 0 and seasonsNumber < 12 and seasonsNumber > 1', 'text' => <<<'TXT'
                                You can watch {{seasonsNumber.formattedValue}}&nbsp;seasons of The Big Bang Theory. Have seen them all? Check our  Binge Watching Calculator to find some alternatives!&nbsp;
                                TXT],
                                ['when' => '(benefit_option == 1 or benefit_option == 4) and time_savings > 0 and seasonsNumber == 1', 'text' => 'You can watch a season of The Big Bang Theory. Have seen them all? Check our  Binge Watching Calculator to find some alternatives!&nbsp;'],
                                ['when' => '(benefit_option == 1 or benefit_option == 4) and time_savings > 0 and hasValue(seasonsNumber)', 'text' => 'You can do some physical exercises at home every day to maintain your weight and stay healthy!'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Financial benefits',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_savings_car',
                            'label' => ' Money saved',
                            'type' => 'number',
                            'suffix' => '$',
                            'readonly' => true,
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_savings_public_single',
                            'label' => ' Money saved',
                            'type' => 'number',
                            'suffix' => '$',
                            'readonly' => true,
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_savings_public_season',
                            'label' => ' Money saved',
                            'type' => 'number',
                            'suffix' => '$',
                            'readonly' => true,
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_savings_others',
                            'label' => ' Money saved',
                            'type' => 'number',
                            'suffix' => '$',
                            'readonly' => true,
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'vehicle == 1 and not(total_savings_car < 0) and total_savings_car > 1', 'text' => 'You just saved some bucks  and got ${{total_savings_car.formattedValue}} richer, Scrooge McDuck! &nbsp;'],
                                ['when' => 'vehicle == 2 and ticket == 1 and not(total_savings_public_single < 0) and total_savings_public_single > 1', 'text' => 'You just saved some bucks  and got ${{total_savings_public_single.formattedValue}} richer, Scrooge McDuck! &nbsp;'],
                                ['when' => 'vehicle == 2 and ticket == 2 and not(total_savings_public_season < 0) and total_savings_public_season > 1', 'text' => 'You just saved some bucks  and got ${{total_savings_public_season.formattedValue}} richer, Scrooge McDuck! &nbsp;'],
                                ['when' => 'vehicle == 3 and not(total_savings_others < 0) and total_savings_others > 1', 'text' => 'You just saved some bucks  and got ${{total_savings_others.formattedValue}} richer, Scrooge McDuck! '],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'display_breakdown_options',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Display breakdown of savings' => '1', '' => '0'],
                            'dataset' => 'Display breakdown',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'car_savings',
                            'label' => 'Car savings',
                            'type' => 'number',
                            'suffix' => '$',
                            'readonly' => true,
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'public_transport_cost_single',
                            'label' => 'Public transport savings',
                            'type' => 'number',
                            'suffix' => '$',
                            'readonly' => true,
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'public_transport_cost_season',
                            'label' => 'Public transport savings',
                            'type' => 'number',
                            'suffix' => '$',
                            'readonly' => true,
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'food_savings',
                            'label' => 'Food savings',
                            'type' => 'number',
                            'suffix' => '$',
                            'readonly' => true,
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Ecological benefits',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CO2_emission',
                            'label' => ' CO₂ emissions reduction',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'vehicle == 1 and CO2_emission > 0 and (benefit_option == 3 or benefit_option ==4)', 'text' => <<<'TXT'
                                You didn't produce {{CO2_emission.formattedValue}}&nbsp;kg of carbon dioxide, which is like planting {{trees.formattedValue}}&nbsp;trees ! That's one of the best things you can do for our planet.&nbsp;
                                TXT],
                                ['when' => 'vehicle == 2 and (benefit_option == 3 or benefit_option ==4)', 'text' => 'Reducing public transport usage helps limit the emission of carbon dioxide. You are a part of these changes!'],
                                ['when' => 'vehicle == 2 and (benefit_option == 3 or benefit_option ==4)', 'text' => <<<'TXT'
                                Did you know that New York City  cut public transit services by 25% during the COVID-19 pandemic? After {{lockdown_duration_in_months.formattedValue}}&nbsp;months it results in reducing CO2 emission by {{CO2_emission_public.formattedValue}}&nbsp;t. It really makes a change - it's like planting {{treesPublicTransport.formattedValue}}&nbsp;trees !&nbsp;
                                TXT],
                                ['when' => 'vehicle == 3 and (benefit_option == 3 or benefit_option ==4)', 'text' => 'You were already doing great in terms of ecology before the lockdown. People like you make the Earth a greener place !'],
                            ],
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
                            'name' => 'CO2_diesel',
                            'label' => 'CO==2== diesel',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CO2_petrol',
                            'label' => 'CO==2== petrol',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'NOx_diesel',
                            'label' => 'NOx diesel',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'NOx_petrol',
                            'label' => 'NOx petrol',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'NOx',
                            'label' => 'Nox',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c1',
                            'label' => 'C1',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c2',
                            'label' => 'C2',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CO2_emission_public',
                            'label' => 'C o2 emission public',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'trees',
                            'label' => ' Planted trees equivalent',
                            'type' => 'number',
                            'suffix' => 'trees',
                            'help' => 'Calculates how many trees would need to absorb your given CO2 emission.',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'treesPublicTransport',
                            'label' => 'Trees public transport',
                            'type' => 'number',
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
                            'name' => 'lockdown_duration_in_months',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_savings_in_minutes',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'books',
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
                            'name' => 'seasonsNumber',
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
                            'name' => 'food_before',
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
                            'name' => 'food_after',
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
            'title' => 'commute_time = 1000*distance / average_car_speed (distance in km; speed in m/s; result in seconds)',
            'results' => ['distance' => '(1/1000)*average_car_speed*commute_time', 'average_car_speed' => '1000*distance/commute_time', 'commute_time' => '1000*distance/average_car_speed'],
        ],
        [
            'title' => 'lockdown_duration = (lockdown_end - lockdown_start) / 1000 (convert date milliseconds to seconds)',
            'results' => ['lockdown_start' => 'lockdown_end-1000*lockdown_duration', 'lockdown_end' => '1000*lockdown_duration+lockdown_start', 'lockdown_duration' => '(lockdown_end-lockdown_start)/1000'],
        ],
        [
            'title' => 'time_savings = 2 * commute_time * days_a_week * lockdown_duration / 604800 (seconds per week)',
            'results' => ['days_a_week' => '604800*time_savings/(2*commute_time*lockdown_duration)', 'time_savings' => '(1/302400)*commute_time*days_a_week*lockdown_duration', 'commute_time' => '302400*time_savings/(days_a_week*lockdown_duration)', 'lockdown_duration' => '302400*time_savings/(commute_time*days_a_week)'],
        ],
        [
            'title' => 'car_savings =(2 * distance / 100 / 1000 / 1000 * days_a_week / 7 * fuel_economy * gas_price + other_car_expenses / 365.25) * lockdown_duration ',
            'results' => [
                'distance' => '(350000000/1461)*(1461*car_savings - 4*lockdown_duration*other_car_expenses)/(days_a_week*fuel_economy*gas_price*lockdown_duration)',
                'days_a_week' => '(350000000/1461)*(1461*car_savings - 4*lockdown_duration*other_car_expenses)/(distance*fuel_economy*gas_price*lockdown_duration)',
                'gas_price' => '(350000000/1461)*(1461*car_savings - 4*lockdown_duration*other_car_expenses)/(days_a_week*distance*fuel_economy*lockdown_duration)',
                'other_car_expenses' => '(1461/1400000000)*(350000000*car_savings - days_a_week*distance*fuel_economy*gas_price*lockdown_duration)/lockdown_duration',
                'car_savings' => '(1/511350000000)*lockdown_duration*(1461*days_a_week*distance*fuel_economy*gas_price + 1400000000*other_car_expenses)',
                'fuel_economy' => '(350000000/1461)*(1461*car_savings - 4*lockdown_duration*other_car_expenses)/(days_a_week*distance*gas_price*lockdown_duration)',
                'lockdown_duration' => '511350000000*car_savings/(1461*days_a_week*distance*fuel_economy*gas_price + 1400000000*other_car_expenses)',
            ],
        ],
        [
            'title' => 'public_transport_cost_single = ticket_price * lockdown_duration * 2 * days_a_week / 7',
            'results' => ['public_transport_cost_single' => '(2/7)*days_a_week*lockdown_duration*ticket_price', 'ticket_price' => '(7/2)*public_transport_cost_single/(days_a_week*lockdown_duration)', 'days_a_week' => '(7/2)*public_transport_cost_single/(lockdown_duration*ticket_price)', 'lockdown_duration' => '(7/2)*public_transport_cost_single/(days_a_week*ticket_price)'],
        ],
        [
            'title' => 'public_transport_cost_season = ticket_price / validity * lockdown_duration',
            'results' => ['public_transport_cost_season' => 'lockdown_duration*ticket_price/validity', 'ticket_price' => 'public_transport_cost_season*validity/lockdown_duration', 'validity' => 'lockdown_duration*ticket_price/public_transport_cost_season', 'lockdown_duration' => 'public_transport_cost_season*validity/ticket_price'],
        ],
        [
            'title' => <<<'TXT'
            food_savings = (12.75 * lunches_out + 6.3 * (lunches_home_before - lunches_home_after) + 10 * (lunches_ordered_before - lunches_ordered_after)) / 7 * lockdown_duration
            TXT,
            'results' => [
                'lunches_ordered_after' => <<<'TXT'
                (1/200)*(-140*food_savings + lockdown_duration*(-126*lunches_home_after + 126*lunches_home_before + 200*lunches_ordered_before + 255*lunches_out))/lockdown_duration
                TXT,
                'food_savings' => '(1/140)*lockdown_duration*(-126*lunches_home_after + 126*lunches_home_before - 200*lunches_ordered_after + 200*lunches_ordered_before + 255*lunches_out)',
                'lunches_ordered_before' => <<<'TXT'
                (1/200)*(140*food_savings + lockdown_duration*(126*lunches_home_after - 126*lunches_home_before + 200*lunches_ordered_after - 255*lunches_out))/lockdown_duration
                TXT,
                'lunches_home_before' => <<<'TXT'
                (1/126)*(140*food_savings + lockdown_duration*(126*lunches_home_after + 200*lunches_ordered_after - 200*lunches_ordered_before - 255*lunches_out))/lockdown_duration
                TXT,
                'lunches_out' => <<<'TXT'
                (2/255)*(70*food_savings + lockdown_duration*(63*lunches_home_after - 63*lunches_home_before + 100*lunches_ordered_after - 100*lunches_ordered_before))/lockdown_duration
                TXT,
                'lunches_home_after' => <<<'TXT'
                (1/126)*(-140*food_savings + lockdown_duration*(126*lunches_home_before - 200*lunches_ordered_after + 200*lunches_ordered_before + 255*lunches_out))/lockdown_duration
                TXT,
                'lockdown_duration' => '140*food_savings/(-126*lunches_home_after + 126*lunches_home_before - 200*lunches_ordered_after + 200*lunches_ordered_before + 255*lunches_out)',
            ],
        ],
        [
            'title' => 'total_savings_car = car_savings + food_savings',
            'results' => ['food_savings' => '-car_savings + total_savings_car', 'car_savings' => '-food_savings + total_savings_car', 'total_savings_car' => 'car_savings + food_savings'],
        ],
        [
            'title' => 'total_savings_public_single = public_transport_cost_single + food_savings',
            'results' => ['total_savings_public_single' => 'food_savings + public_transport_cost_single', 'food_savings' => '-public_transport_cost_single + total_savings_public_single', 'public_transport_cost_single' => '-food_savings + total_savings_public_single'],
        ],
        [
            'title' => 'total_savings_public_season = public_transport_cost_season + food_savings',
            'results' => ['total_savings_public_season' => 'food_savings + public_transport_cost_season', 'food_savings' => '-public_transport_cost_season + total_savings_public_season', 'public_transport_cost_season' => '-food_savings + total_savings_public_season'],
        ],
        [
            'title' => 'total_savings_others = food_savings',
            'results' => ['food_savings' => 'total_savings_others', 'total_savings_others' => 'food_savings'],
        ],
        [
            'title' => 'CO2_emission = CO2 * 2 * distance / 1e6 * days_a_week / 7 * lockdown_duration',
            'results' => [
                'CO2_emission' => '(1/3500000)*CO2*days_a_week*distance*lockdown_duration',
                'days_a_week' => '3500000*CO2_emission/(CO2*distance*lockdown_duration)',
                'distance' => '3500000*CO2_emission/(CO2*days_a_week*lockdown_duration)',
                'lockdown_duration' => '3500000*CO2_emission/(CO2*days_a_week*distance)',
                'CO2' => '3500000*CO2_emission/(days_a_week*distance*lockdown_duration)',
            ],
        ],
        [
            'title' => 'trees = CO2_emission * 365.25 / (48 * 0.453592) / lockdown_duration',
            'results' => ['CO2_emission' => '(453592/7609375)*lockdown_duration*trees', 'trees' => '(7609375/453592)*CO2_emission/lockdown_duration', 'lockdown_duration' => '(7609375/453592)*CO2_emission/trees'],
        ],
        [
            'title' => 'CO2 = c1 * CO2_diesel + (1 - c2) * CO2_petrol',
            'results' => [
                'c2' => '(-CO2 + CO2_diesel*c1 + CO2_petrol)/CO2_petrol',
                'CO2_petrol' => '(-CO2 + CO2_diesel*c1)/(c2 - 1)',
                'c1' => '(CO2 + CO2_petrol*c2 - CO2_petrol)/CO2_diesel',
                'CO2' => 'CO2_diesel*c1 - CO2_petrol*c2 + CO2_petrol',
                'CO2_diesel' => '(CO2 + CO2_petrol*c2 - CO2_petrol)/c1',
            ],
        ],
        [
            'title' => 'NOx = c1 * NOx_diesel + (1 - c2) * NOx_petrol',
            'results' => [
                'c2' => '(-NOx + NOx_diesel*c1 + NOx_petrol)/NOx_petrol',
                'c1' => '(NOx + NOx_petrol*c2 - NOx_petrol)/NOx_diesel',
                'NOx' => 'NOx_diesel*c1 - NOx_petrol*c2 + NOx_petrol',
                'NOx_diesel' => '(NOx + NOx_petrol*c2 - NOx_petrol)/c1',
                'NOx_petrol' => '(-NOx + NOx_diesel*c1)/(c2 - 1)',
            ],
        ],
        [
            'title' => 'CO2_emission_public = 600000 / 365.25 * lockdown_duration',
            'results' => ['CO2_emission_public' => '(800000/487)*lockdown_duration', 'lockdown_duration' => '(487/800000)*CO2_emission_public'],
        ],
        [
            'title' => 'treesPublicTransport = CO2_emission_public * 30.4375 * 1000 / (48 * 0.453592) / lockdown_duration',
            'results' => ['CO2_emission_public' => '(680388/951171875)*lockdown_duration*treesPublicTransport', 'treesPublicTransport' => '(951171875/680388)*CO2_emission_public/lockdown_duration', 'lockdown_duration' => '(951171875/680388)*CO2_emission_public/treesPublicTransport'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => 'Give the Quarantine silver lining calculator the total duration and the commute time and it returns <strong>distance to workplace (one-way)</strong>.',
        'sections' => [
            ['title' => 'How does the Quarantine silver lining calculator work?', 'html' => <<<'TXT'
            <p>The Quarantine silver lining calculator takes the values in the form, applies the relationship described below and reports <strong>distance to workplace (one-way)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the congestion level, the engine type and the production year); then you give the dates it asks for; then you type in the total duration, the commute time (one-way), the CO₂ emissions and the fuel economy.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A calendar date. Use the picker; the answer is recalculated the moment the date changes, and the count is done date-to-date rather than by subtracting timestamps.</li><li>A measured quantity, entered by default in months. The unit chip switches it to any of the 27 supported units.</li><li>Pick the option that matches your case — 4 options, such as ecological benefits, ⏲ Time benefits and financial benefits. </li><li>Pick the option that matches your case — 3 options, such as a car, public transport and a bike / my legs ‍ ‍. </li><li>A measured quantity, entered by default in minutes. The unit chip switches it to any of the 27 supported units.</li><li>Pick the option that matches your case — 6 options, such as no congestion (40 km/h), slight (32 km/h) and average (24 km/h). </li><li>Pick the option that matches your case — 2 options, such as petrol and diesel. </li><li>Pick the option that matches your case — 17 options, such as 2000 or older, 2001 and 2002. </li><li>A number, expressed in g/km.</li><li>A measured quantity, entered by default in liters per 100 kilometers. The unit chip switches it to any of the 10 supported units.</li><li>A number, expressed in $/year.</li><li>Pick the option that matches your case — 2 options, such as season tickets and single fare tickets. </li><li>A number, expressed in $.</li><li>A measured quantity, entered by default in days. The unit chip switches it to any of the 27 supported units.</li><li>A number, expressed in times / week.</li><li>A number, expressed in times / week.</li><li>A number, expressed in times / week.</li><li>A number, expressed in times / week.</li><li>A measured quantity, entered by default in hours / minutes. The unit chip switches it to any of the 27 supported units.</li><li>A number, expressed in $.</li><li>A single on/off switch — tick it for &ldquo;Display breakdown of savings&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li><li>A number, expressed in $.</li><li>A plain number with no unit attached.</li></ul><p>7 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Total duration</strong></td><td>A measured quantity, 27 units available.</td><td>months</td><td>You supply it</td></tr><tr><td><strong>Commute time (one-way)</strong></td><td>A measured quantity, 27 units available.</td><td>minutes</td><td>You supply it</td></tr><tr><td><strong>Distance to workplace (one-way)</strong></td><td>A measured quantity, 34 units available.</td><td>kilometers</td><td>Calculated</td></tr><tr><td><strong>Congestion level</strong></td><td>One of 6 options, such as no congestion (40 km/h), slight (32 km/h) and average (24 km/h).</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Average car speed</strong></td><td>A measured quantity, 25 units available.</td><td>kilometers per hour</td><td>Calculated</td></tr><tr><td><strong>Engine type</strong></td><td>One of 2 options, such as petrol and diesel.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Production year</strong></td><td>One of 17 options, such as 2000 or older, 2001 and 2002.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>CO₂ emissions</strong></td><td>A number stated in g/km.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Gas price</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>Calculated</td></tr><tr><td><strong>Fuel economy</strong></td><td>A measured quantity, 10 units available.</td><td>liters per 100 kilometers</td><td>You supply it</td></tr><tr><td><strong>Other car-related expenses</strong></td><td>A number stated in $/year.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Ticket price</strong></td><td>A number stated in $.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Eating out</strong></td><td>A number stated in times / week.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Ordered food (Pre-lockdown eating habits (lunches, 7-day…)</strong></td><td>A number stated in times / week.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Ordered food (Lockdown eating habits (lunches, 7-day week))</strong></td><td>A number stated in times / week.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>⌚ Time saved</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes</td><td>You supply it</td></tr><tr><td><strong>Money saved (Financial benefits)</strong></td><td>A number stated in $.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Money saved (Financial benefits)</strong></td><td>A number stated in $.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Money saved (Financial benefits)</strong></td><td>A number stated in $.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Money saved (Financial benefits)</strong></td><td>A number stated in $.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Car savings</strong></td><td>A number stated in $.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Public transport savings (Financial benefits)</strong></td><td>A number stated in $.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Public transport savings (Financial benefits)</strong></td><td>A number stated in $.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Food savings</strong></td><td>A number stated in $.</td><td>—</td><td>Calculated</td></tr></tbody></table><p>The table lists the first 24 of 33 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'The formula behind the Quarantine silver lining calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Distance to workplace (one-way)</span><span class="formula-eq">=</span><span class="formula-rhs">(5 ÷ 18) × average car speed × commute time (one-way)</span></div><div class="formula-row"><span class="formula-lhs">Starts at</span><span class="formula-eq">=</span><span class="formula-rhs">-total duration + ends at</span></div><div class="formula-row"><span class="formula-lhs">For a frequency of</span><span class="formula-eq">=</span><span class="formula-rhs">(7 ÷ 2) × ⌚ Time saved ÷ (commute time (one-way) × total duration)</span></div><div class="formula-row"><span class="formula-lhs">Distance to workplace (one-way)</span><span class="formula-eq">=</span><span class="formula-rhs">(350000000 ÷ 1461) × (1461 × car savings − 4 × total duration × other car-related expenses) ÷ (for a frequency of × fuel economy × gas price × total duration)</span></div><div class="formula-row"><span class="formula-lhs">Public transport savings</span><span class="formula-eq">=</span><span class="formula-rhs">(2 ÷ 7) × for a frequency of × total duration × ticket price</span></div><div class="formula-row"><span class="formula-lhs">Public transport savings</span><span class="formula-eq">=</span><span class="formula-rhs">total duration × ticket price ÷ ticket is valid for...</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilometers, and convertible to any of the 34 units on that chip.</li><li>A calendar date.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in liters, and convertible to any of the 40 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in months</li><li>Time, opening in minutes</li><li>Length, opening in kilometers</li><li>Speed, opening in kilometers per hour</li><li>Volume, opening in liters</li><li>Fuel economy, opening in liters per 100 kilometers</li><li>Time, opening in days</li><li>Time, opening in hours / minutes</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Quarantine silver lining calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 2 figures keep coming back — the total duration and the commute time — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/electricity-cost">Electricity cost</a>, <a href="/everyday-life/electricity-cost-single-usage">Electricity cost - single usage</a> and <a href="/everyday-life/email-alternatives">Email alternatives</a>.</p>
            TXT],
            ['title' => 'A worked example with these formulas', 'html' => <<<'TXT'
            <p> Enter I want to see its... = 3, I commute using... = 1, Congestion level = 14.4, Engine type = 0, Production year = 7, I buy... = 2 and display_breakdown_options = 0. The calculator returns <strong>CO₂ emissions</strong> = 0 g/km.</p><p>The relationship behind those numbers is <strong>Distance to workplace (one-way)</strong> = <code>(5/18) × average_car_speed × commute_time</code>. </p>
            TXT],
            ['title' => 'Detailed use notes', 'html' => <<<'TXT'
            <p>This calculator compares a period away from a normal routine with the travel, vehicle and spending inputs you provide. Set the start and end dates carefully; the duration is the foundation for annualized or total savings. Commute time and distance should be one-way if the form labels them that way, while frequency should reflect the number of days actually travelled in a typical week.</p><p>Car results depend on fuel economy, fuel price, engine information and any additional car expenses entered. Public-transport results use the selected ticket and its validity period. Food savings compare the before-and-after eating, ordering and cooking inputs. These are scenario estimates, not audited household accounts: update prices and habits rather than assuming every saved amount is cash retained.</p><p>Carbon output is also an estimate based on the chosen vehicle and usage assumptions. It does not include every lifecycle emission or every change in behavior. Use the page to understand which assumptions drive the result, then compare scenarios with one input changed at a time. A saved commute can be an opportunity, but it is not automatically a financial or environmental gain if other travel replaces it.</p>
            TXT],
            ['title' => 'Before using the estimate', 'html' => <<<'TXT'
            <p>Use the start date, end date and weekly commute frequency to make the comparison fit the period you actually mean. The commute duration and distance are labelled one-way, so a round trip contains two journeys on each commuting day. Select the transport option that matches your usual routine and check any ticket-validity period before comparing its cost with driving.</p><p>Driving estimates depend on fuel economy, fuel price, engine and other car-related expenses. Food comparisons use the before-and-after inputs for eating out, ordering and cooking at home. If these habits changed during the period, enter realistic averages rather than treating a single unusual week as typical. Money and time results are scenario totals; they do not prove that every saved amount was realized.</p><p>The emissions result reflects the selected model and vehicle assumptions, not a full lifecycle assessment. If the period was historical, compare like-for-like travel patterns and avoid attributing changes to one cause without evidence. Change one assumption at a time to see which inputs move the estimate most.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Quarantine silver lining calculator work out?', 'a' => 'It returns distance to workplace (one-way), derived from the total duration and the commute time.'],
            ['q' => 'What do I need to enter to use the Quarantine silver lining calculator?', 'a' => 'The form asks for the total duration and the commute time, which is 23 fields in total.'],
            ['q' => 'Can I enter total duration in a different unit?', 'a' => 'Yes. Total duration opens in months and the chip beside it offers 27 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Average car speed = 0 km/h.'],
        ],
        'related' => [
            ['path' => '/everyday-life/electricity-cost', 'name' => 'Electricity cost'],
            ['path' => '/everyday-life/electricity-cost-single-usage', 'name' => 'Electricity cost - single usage'],
            ['path' => '/everyday-life/email-alternatives', 'name' => 'Email alternatives'],
        ],
    ],
];
