<?php

/**
 * Carpooling
 * /everyday-life/carpooling
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Carpooling',
    'meta' => ['title' => 'Carpooling Calculator: Formula, Steps & Examples', 'description' => 'Carpooling takes trip type, car and fuel economy and returns fuel used and cost of the trip. Results come back in liters, with any other unit a click away.', 'h1' => 'Carpooling Calculator', 'updated' => '2026-08-26'],
    'sections' => [
        [
            'title' => 'Trip cost calculation',
            'note' => 'Please select the trip type, your car model , and enter distance to cover along with current fuel price',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'trip_type',
                            'label' => 'Trip type',
                            'type' => 'select',
                            'options' => ['City' => '1', 'Highway' => '2', 'Urban and highway' => '3', 'Custom' => '0'],
                            'dataset' => 'trip_type',
                            'default' => 'City',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'car',
                            'label' => 'Car',
                            'type' => 'select',
                            'options' => [
                                'Other vehicle' => '0',
                                'Ford F150' => '19',
                                'Ford Explorer' => '1',
                                'Ford Focus' => '2',
                                'Ford Ranger' => '3',
                                'Ford Taurus' => '4',
                                'Toyota Camry' => '5',
                                'Toyota Corolla' => '6',
                                'Toyota Rav 4 Hybrid' => '7',
                                'Chevrolet Malibu' => '8',
                                'Chevrolet Impala' => '9',
                                'Nissan Altima' => '10',
                                'Honda Civic' => '11',
                                'Honda Accord' => '12',
                                'Subaru Impreza' => '13',
                                'Subaru Legacy' => '14',
                                'Dodge Ram' => '15',
                                'Dodge Caravan' => '16',
                                'Jeep Grand Cherokee' => '17',
                                'GMC Sierra' => '18',
                            ],
                            'dataset' => 'car',
                            'control' => 'DROPDOWN',
                            'default' => 'Jeep Grand Cherokee',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mpg_city',
                            'label' => 'Fuel economy',
                            'type' => 'result',
                            'unit' => '27',
                            'unit_default' => 'l100km',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mpg_highway',
                            'label' => 'Fuel economy',
                            'type' => 'result',
                            'unit' => '27',
                            'unit_default' => 'l100km',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mpg_mixed',
                            'label' => 'Fuel economy',
                            'type' => 'result',
                            'unit' => '27',
                            'unit_default' => 'l100km',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mpg_custom',
                            'label' => 'Fuel economy',
                            'type' => 'number',
                            'unit' => '27',
                            'unit_default' => 'l100km',
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
                                ['when' => 'trip_type == 1 and car < 0', 'text' => 'Fuel consumption of {{mpg_city.formattedValue}} {{mpg_city.fullUnit}}.'],
                                ['when' => 'trip_type == 2 and car < 0', 'text' => 'Fuel consumption of {{mpg_highway.formattedValue}} {{mpg_highway.fullUnit}}.'],
                                ['when' => 'trip_type == 3 and car < 0', 'text' => 'Fuel consumption of {{mpg_mixed.formattedValue}} {{mpg_mixed.fullUnit}}.'],
                                ['when' => 'car != 0', 'text' => 'If you can\'t find your car or the fuel consumption is different, select Other vehicle option instead.'],
                            ],
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
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fuel_burnt_city',
                            'label' => 'Fuel used',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fuel_burnt_highway',
                            'label' => 'Fuel used',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fuel_burnt_mixed',
                            'label' => 'Fuel used',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fuel_burnt',
                            'label' => 'Fuel used',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => 'Fuel price',
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
                            'name' => 'cost_city',
                            'label' => 'Cost of the trip',
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
                            'name' => 'cost_highway',
                            'label' => 'Cost of the trip',
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
                            'name' => 'cost_mixed',
                            'label' => 'Cost of the trip',
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
                            'name' => 'cost',
                            'label' => 'Cost of the trip',
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
                        ['type' => 'note', 'text' => 'The specifications, age and condition of your engine can affect its fuel economy, so... your mileage may vary.'],
                    ],
                ],
            ],
        ],
        [
            'title' => '‍‍ Carpooling division of payment',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'people',
                            'label' => 'Number of people',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost_per_person_city',
                            'label' => 'Cost per person',
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
                            'name' => 'cost_per_person_highway',
                            'label' => 'Cost per person',
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
                            'name' => 'cost_per_person_mixed',
                            'label' => 'Cost per person',
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
        [
            'title' => '  Carpooling footprint',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gas_diesel',
                            'label' => 'Fuel type',
                            'type' => 'select',
                            'options' => ['Gasoline' => '8.9', 'Diesel' => '10.2'],
                            'dataset' => 'gas_diesel',
                            'default' => 'Gasoline',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'netco2_city',
                            'label' => 'Net CO₂ ',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'netco2_highway',
                            'label' => 'Net CO₂',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'netco2_mixed',
                            'label' => 'Net CO₂',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'netco2_custom',
                            'label' => 'Net CO₂',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => <<<'TXT'
                                 Your trip will produce approximately {{netco2_city.formattedValue}} {{netco2_city.fullUnit}} of CO2. That's equivalent to the CO2 emission of:  Roughly {{city_google.formattedValue}} Google searches;  Around {{city_phone.formattedValue}} phone(s) fully charged everyday during a year.
                                TXT],
                                ['when' => 'city_co2_trees > 0', 'text' => ' The total CO2 emission of your trip will be absorbed by {{city_co2_trees.formattedValue}} trees in a year.'],
                                ['when' => 'people > 1', 'text' => '‍‍ Carpooling Effect:  If everybody traveled independently, there would be around {{city_indie.formattedValue}} {{netco2_city.unit}} of CO2 produced.'],
                                ['when' => 'people > 1 and city_co2_trees > 0', 'text' => ' In that case {{city_trees.formattedValue}} tree(s) would be required at full work during year.'],
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
                                ['when' => null, 'text' => <<<'TXT'
                                 Your trip will produce approximately {{netco2_highway.formattedValue}} {{netco2_highway.fullUnit}} of CO2. That's equivalent to the CO2 emission of:  Around {{highway_google.formattedValue}} Google searches;  Roughly {{highway_phone.formattedValue}} phone(s) fully charged everyday during a year.
                                TXT],
                                ['when' => 'highway_co2_trees > 0', 'text' => ' The total CO2 emission of your trip will be absorbed by {{highway_co2_trees.formattedValue}} trees in a year.'],
                                ['when' => 'people > 1', 'text' => '‍‍ Carpooling Effect:  If everybody traveled independently, there would be around {{highway_indie.formattedValue}} {{netco2_highway.unit}} of CO2 produced.'],
                                ['when' => 'people > 1 and highway_co2_trees > 0', 'text' => ' In that case {{highway_trees.formattedValue}} tree(s) would be required at full work during year.'],
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
                                ['when' => null, 'text' => <<<'TXT'
                                 Your trip will produce approximately {{netco2_mixed.formattedValue}} {{netco2_mixed.fullUnit}} of CO2. That's equivalent to the CO2 emission of:  Around {{mixed_google.formattedValue}} Google searches;  Roughly {{mixed_phone.formattedValue}} phone(s) fully charged everyday during a year.
                                TXT],
                                ['when' => 'mixed_co2_trees > 0', 'text' => ' The total CO2 emission of your trip will be absorbed by {{mixed_co2_trees.formattedValue}} trees in a year.'],
                                ['when' => 'people > 1', 'text' => '‍‍ Carpooling Effect:  If everybody traveled independently, there would be around {{mixed_indie.formattedValue}} {{netco2_mixed.unit}} of CO2 produced.'],
                                ['when' => 'people > 1 and mixed_co2_trees > 0', 'text' => ' In that case {{mixed_trees.formattedValue}} tree(s) would be required at full work during year.'],
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
                                ['when' => null, 'text' => <<<'TXT'
                                 Your trip will produce approximately {{netco2_custom.formattedValue}} {{netco2_custom.fullUnit}} of CO2. That's equivalent to the CO2 emission of:  Around {{custom_google.formattedValue}} Google searches;  Roughly {{custom_phone.formattedValue}} phone(s) fully charged everyday during a year.
                                TXT],
                                ['when' => 'custom_co2_trees > 0', 'text' => ' The total CO2 emission of your trip will be absorbed by {{custom_co2_trees.formattedValue}} trees in a year.'],
                                ['when' => 'people > 1', 'text' => '‍‍ Carpooling Effect:  If everybody traveled independently, there would be around {{custom_indie.formattedValue}} {{netco2_custom.unit}} of CO2 produced.'],
                                ['when' => 'people > 1 and custom_co2_trees > 0', 'text' => ' In that case {{custom_trees.formattedValue}} tree(s) would be required at full work during year.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => ' eBike savings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eBikeEff',
                            'label' => 'Electrical bike efficiency',
                            'type' => 'number',
                            'help' => 'How many watts-hour your e-Bike needs per kilometer or mile?',
                            'unit' => '4',
                            'unit_default' => 'km',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '0.01243', 'when' => null],
                                ['value' => '0.02', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'energyCost',
                            'label' => 'Energy cost',
                            'type' => 'number',
                            'suffix' => ' / kWh',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0.1042',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costEbike',
                            'label' => 'Electricity cost if e-Bike is used',
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
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'city_google',
                            'label' => 'City google',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'city_phone',
                            'label' => 'City phone',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'city_co2_trees',
                            'label' => 'City co2 trees',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'city_indie',
                            'label' => 'City indie',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'city_trees',
                            'label' => 'City trees',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'highway_google',
                            'label' => 'Highway google',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'highway_phone',
                            'label' => 'Highway phone',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'highway_co2_trees',
                            'label' => 'Highway co2 trees',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'highway_indie',
                            'label' => 'Highway indie',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'highway_trees',
                            'label' => 'Highway trees',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mixed_google',
                            'label' => 'Mixed google',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mixed_phone',
                            'label' => 'Mixed phone',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mixed_co2_trees',
                            'label' => 'Mixed co2 trees',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mixed_indie',
                            'label' => 'Mixed indie',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mixed_trees',
                            'label' => 'Mixed trees',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'custom_google',
                            'label' => 'Custom google',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'custom_phone',
                            'label' => 'Custom phone',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'custom_co2_trees',
                            'label' => 'Custom co2 trees',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'custom_indie',
                            'label' => 'Custom indie',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'custom_trees',
                            'label' => 'Custom trees',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'cost = price * fuel_burnt',
            'results' => ['price' => 'cost/fuel_burnt', 'fuel_burnt' => 'cost/price', 'cost' => 'fuel_burnt*price'],
        ],
        [
            'title' => 'cost_per_person = cost / people',
            'results' => ['cost_per_person' => 'cost/people', 'cost' => 'cost_per_person*people', 'people' => 'cost/cost_per_person'],
        ],
        [
            'title' => 'fuel_burnt = distance/mpg_custom',
            'results' => ['mpg_custom' => 'distance/fuel_burnt', 'fuel_burnt' => 'distance/mpg_custom', 'distance' => 'fuel_burnt*mpg_custom'],
        ],
        [
            'title' => 'cost_highway = one_way(price) * fuel_burnt_highway',
            'results' => ['cost_highway' => 'fuel_burnt_highway*(price)', 'fuel_burnt_highway' => 'cost_highway/(price)'],
        ],
        [
            'title' => 'cost_per_person_highway = cost_highway / people',
            'results' => ['people' => 'cost_highway/cost_per_person_highway', 'cost_per_person_highway' => 'cost_highway/people', 'cost_highway' => 'cost_per_person_highway*people'],
        ],
        [
            'title' => 'fuel_burnt_highway = (distance)/mpg_highway',
            'results' => ['mpg_highway' => 'distance/fuel_burnt_highway', 'distance' => 'fuel_burnt_highway*mpg_highway', 'fuel_burnt_highway' => 'distance/mpg_highway'],
        ],
        [
            'title' => 'cost_city = one_way(price)* fuel_burnt_city',
            'results' => ['cost_city' => 'fuel_burnt_city*(price)', 'fuel_burnt_city' => 'cost_city/(price)'],
        ],
        [
            'title' => 'cost_per_person_city = cost_city / people',
            'results' => ['cost_city' => 'cost_per_person_city*people', 'people' => 'cost_city/cost_per_person_city', 'cost_per_person_city' => 'cost_city/people'],
        ],
        [
            'title' => 'fuel_burnt_city= (distance)/mpg_city',
            'results' => ['fuel_burnt_city' => 'distance/mpg_city', 'mpg_city' => 'distance/fuel_burnt_city', 'distance' => 'fuel_burnt_city*mpg_city'],
        ],
        [
            'title' => 'cost_mixed = one_way(price)* fuel_burnt_mixed',
            'results' => ['cost_mixed' => 'fuel_burnt_mixed*(price)', 'fuel_burnt_mixed' => 'cost_mixed/(price)'],
        ],
        [
            'title' => 'cost_per_person_mixed = cost_mixed / people',
            'results' => ['cost_mixed' => 'cost_per_person_mixed*people', 'cost_per_person_mixed' => 'cost_mixed/people', 'people' => 'cost_mixed/cost_per_person_mixed'],
        ],
        [
            'title' => 'fuel_burnt_mixed = (distance)/mpg_mixed',
            'results' => ['mpg_mixed' => 'distance/fuel_burnt_mixed', 'distance' => 'fuel_burnt_mixed*mpg_mixed', 'fuel_burnt_mixed' => 'distance/mpg_mixed'],
        ],
        [
            'title' => 'netco2_city = fuel_burnt_city*gas_diesel',
            'results' => ['fuel_burnt_city' => 'netco2_city/gas_diesel', 'gas_diesel' => 'netco2_city/fuel_burnt_city', 'netco2_city' => 'fuel_burnt_city*gas_diesel'],
        ],
        [
            'title' => 'netco2_highway = fuel_burnt_highway*gas_diesel',
            'results' => ['gas_diesel' => 'netco2_highway/fuel_burnt_highway', 'netco2_highway' => 'fuel_burnt_highway*gas_diesel', 'fuel_burnt_highway' => 'netco2_highway/gas_diesel'],
        ],
        [
            'title' => 'netco2_mixed = fuel_burnt_mixed*gas_diesel',
            'results' => ['gas_diesel' => 'netco2_mixed/fuel_burnt_mixed', 'netco2_mixed' => 'fuel_burnt_mixed*gas_diesel', 'fuel_burnt_mixed' => 'netco2_mixed/gas_diesel'],
        ],
        [
            'title' => 'netco2_custom =fuel_burnt*gas_diesel',
            'results' => ['gas_diesel' => 'netco2_custom/fuel_burnt', 'fuel_burnt' => 'netco2_custom/gas_diesel', 'netco2_custom' => 'fuel_burnt*gas_diesel'],
        ],
        [
            'title' => 'costEbike = distance*energyCost*eBikeEff/0.000621371192',
            'results' => ['energyCost' => '(77671399/125000000000)*costEbike/(distance*eBikeEff)', 'distance' => '(77671399/125000000000)*costEbike/(eBikeEff*energyCost)', 'costEbike' => '(125000000000/77671399)*distance*eBikeEff*energyCost', 'eBikeEff' => '(77671399/125000000000)*costEbike/(distance*energyCost)'],
        ],
    ],
    'article' => [
        'intro' => 'The Carpooling calculator turns the distance, the fuel used and the cost of the trip into <strong>fuel price</strong>.',
        'sections' => [
            ['title' => 'How does the Carpooling calculator work?', 'html' => <<<'TXT'
            <p>The Carpooling calculator takes the values in the form, applies the relationship described below and reports <strong>fuel price</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the trip type and the car); then you type in the distance, the fuel used (Trip cost calculation), the fuel used (Trip cost calculation) and the cost of the trip (Trip cost calculation).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 4 options, such as city, highway and urban and highway. </li><li>Pick the option that matches your case — 20 options, such as other vehicle, ford F150 and ford Explorer. </li><li>A measured quantity, entered by default in kilometers. </li><li>A measured quantity, entered by default in liters. The unit chip switches it to any of the 40 supported units.</li><li>A measured quantity, entered by default in liters. The unit chip switches it to any of the 40 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in kilograms. The unit chip switches it to any of the 29 supported units.</li><li>A measured quantity, entered by default in kilograms. The unit chip switches it to any of the 29 supported units.</li><li>A measured quantity, entered by default in kilometers. </li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li></ul><p>3 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Trip type</strong></td><td>One of 4 options, such as city, highway and urban and highway.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Car</strong></td><td>One of 20 options, such as other vehicle, ford F150 and ford Explorer.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Fuel economy (Trip cost calculation)</strong></td><td>A measured quantity, 10 units available.</td><td>liters per 100 kilometers</td><td>Calculated</td></tr><tr><td><strong>Fuel economy (Trip cost calculation)</strong></td><td>A measured quantity, 10 units available.</td><td>liters per 100 kilometers</td><td>Calculated</td></tr><tr><td><strong>Fuel economy (Trip cost calculation)</strong></td><td>A measured quantity, 10 units available.</td><td>liters per 100 kilometers</td><td>Calculated</td></tr><tr><td><strong>Fuel economy (Trip cost calculation)</strong></td><td>A measured quantity, 10 units available.</td><td>liters per 100 kilometers</td><td>Calculated</td></tr><tr><td><strong>Distance</strong></td><td>A measured quantity, 34 units available.</td><td>kilometers</td><td>You supply it</td></tr><tr><td><strong>Fuel used (Trip cost calculation)</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>Calculated</td></tr><tr><td><strong>Fuel used (Trip cost calculation)</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>You supply it</td></tr><tr><td><strong>Fuel used (Trip cost calculation)</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>You supply it</td></tr><tr><td><strong>Fuel used (Trip cost calculation)</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>Calculated</td></tr><tr><td><strong>Fuel price</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Cost of the trip (Trip cost calculation)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Cost of the trip (Trip cost calculation)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Cost of the trip (Trip cost calculation)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Cost of the trip (Trip cost calculation)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Number of people</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Cost per person (‍ ‍ Carpooling division of payment)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Cost per person (‍ ‍ Carpooling division of payment)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Cost per person (‍ ‍ Carpooling division of payment)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Cost per person (‍ ‍ Carpooling division of payment)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Fuel type</strong></td><td>One of 2 options, such as gasoline and diesel.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Net CO₂ (Carpooling footprint)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Net CO₂ (Carpooling footprint)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr></tbody></table><p>The table lists the first 24 of 28 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'The formula behind the Carpooling calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Fuel price</span><span class="formula-eq">=</span><span class="formula-rhs">cost of the trip ÷ fuel used</span></div><div class="formula-row"><span class="formula-lhs">Cost per person</span><span class="formula-eq">=</span><span class="formula-rhs">cost of the trip ÷ number of people</span></div><div class="formula-row"><span class="formula-lhs">Fuel economy</span><span class="formula-eq">=</span><span class="formula-rhs">distance ÷ fuel used</span></div><div class="formula-row"><span class="formula-lhs">Cost of the trip</span><span class="formula-eq">=</span><span class="formula-rhs">fuel used × (fuel price)</span></div><div class="formula-row"><span class="formula-lhs">Number of people</span><span class="formula-eq">=</span><span class="formula-rhs">cost of the trip ÷ cost per person</span></div><div class="formula-row"><span class="formula-lhs">Cost of the trip</span><span class="formula-eq">=</span><span class="formula-rhs">cost per person × number of people</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in liters per 100 kilometers, and convertible to any of the 10 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in liters per 100 kilometers, and convertible to any of the 10 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in liters, and convertible to any of the 40 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in liters per 100 kilometers, and convertible to any of the 10 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Fuel economy, opening in liters per 100 kilometers</li><li>Fuel economy, opening in liters per 100 kilometers</li><li>Fuel economy, opening in liters per 100 kilometers</li><li>Fuel economy, opening in liters per 100 kilometers</li><li>Length, opening in kilometers</li><li>Volume, opening in liters</li><li>Volume, opening in liters</li><li>Volume, opening in liters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Carpooling calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 3 figures keep coming back — the distance, the fuel used and the cost of the trip — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/social-media-ban-impact">Social media ban impact</a>, <a href="/everyday-life/social-media-time-alternatives">Social Media Time Alternatives</a> and <a href="/everyday-life/sock-size">Sock size</a>.</p>
            TXT],
            ['title' => 'A worked example with these formulas', 'html' => <<<'TXT'
            <p> Enter Trip type = 1 and Car = 17. The calculator returns <strong>Fuel type</strong> = 8.9.</p><p>The relationship behind those numbers is <strong>Fuel price</strong> = <code>cost/fuel_burnt</code>. </p>
            TXT],
            ['title' => 'Detailed use notes', 'html' => <<<'TXT'
            <p>Choose the trip type and vehicle or custom fuel-economy option that best matches the journey. Enter the trip distance once in the selected direction and verify whether the result assumes a one-way or round trip. Fuel used is calculated from distance and economy; multiplying by the fuel price gives the vehicle’s total trip fuel cost. If the route includes both city and highway driving, use the mixed figure where available rather than assuming the best-case rate.</p><p>The per-person result divides the shared cost across the number of people entered. Confirm that the count includes the driver if the group is splitting costs among everyone in the car. This is a simple equal-share estimate: it does not account for different pickup distances, detours, parking, tolls or an agreement where the driver pays a different share.</p><p>Fuel economy and emissions depend on the vehicle, load, route and driving conditions. A custom value can make the estimate more representative if you have reliable trip data. The CO₂ output is a model-based estimate, not a full lifecycle footprint. Use it to compare a consistent solo-trip and shared-trip scenario; do not treat it as a guaranteed saving if carpooling changes the route or adds travel.</p>
            TXT],
            ['title' => 'Before using the estimate', 'html' => <<<'TXT'
            <p>Choose the trip type and the fuel-economy value that best matches the route. City, highway and mixed driving can produce different fuel use, so use a realistic figure for the journey rather than selecting the most favorable value. Enter the distance consistently as one-way or round-trip according to the form, and check the fuel-price unit before interpreting total cost.</p><p>The per-person estimate divides the trip cost by the group size. Count everyone who shares the expense, including the driver if that is how your group plans to split it. Equal division is only one arrangement: a pickup detour, different starting points or an agreement that the driver pays less can change the fair share. The calculator does not include tolls, parking or vehicle wear unless the form explicitly asks for them.</p><p>Fuel use and CO₂ estimates depend on the selected vehicle, fuel type, economy and distance. A custom economy figure based on actual trips can improve the estimate, but emissions factors are simplified and do not represent a complete lifecycle footprint. Compare a solo journey with the same shared route; if carpooling adds distance, include that change rather than assuming the original route remains identical.</p>
            TXT],
            ['title' => 'How to compare shared costs', 'html' => <<<'TXT'
            <p>For a transparent split, write down the assumptions before comparing the per-person figure: who rides, whether the driver is included, how far the car travels to pick everyone up, and whether fuel price is the only shared cost. A route with a detour can use more fuel than the direct-trip estimate. Agree on the split with the group rather than treating equal division as a rule.</p><p>To compare carpooling with separate cars, calculate each scenario using its own distance and occupancy. Sharing seats reduces per-person fuel cost only when the vehicle’s total cost is divided across the riders; the fuel burnt by the vehicle itself does not fall in direct proportion to passenger count.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Carpooling calculator work out?', 'a' => 'It returns fuel price, derived from the distance, the fuel used and the cost of the trip.'],
            ['q' => 'What do I need to enter to use the Carpooling calculator?', 'a' => 'The form asks for the distance, the fuel used and the cost of the trip, which is 11 fields in total.'],
            ['q' => 'Can I enter fuel economy (Trip cost calculation) in a different unit?', 'a' => 'Yes. Fuel economy (Trip cost calculation) opens in liters per 100 kilometers and the chip beside it offers 10 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Fuel economy = 0 L/100 km.'],
        ],
        'related' => [
            ['path' => '/everyday-life/social-media-ban-impact', 'name' => 'Social media ban impact'],
            ['path' => '/everyday-life/social-media-time-alternatives', 'name' => 'Social Media Time Alternatives'],
            ['path' => '/everyday-life/sock-size', 'name' => 'Sock size'],
        ],
    ],
];
