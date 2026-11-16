<?php

/**
 * Gas
 * /everyday-life/gas
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gas',
    'meta' => ['title' => 'Gas Calculator — Free, With Worked Examples', 'description' => 'Gas works out fuel used and cost of the trip from car, trip type and fuel economy. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Gas Calculator', 'updated' => '2026-08-26'],
    'sections' => [
        [
            'title' => 'Plan a trip and fuel costs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'car',
                            'label' => 'Car',
                            'type' => 'select',
                            'options' => [
                                'Other vehicle' => '1',
                                'Ford F150' => '2',
                                'Ford Explorer' => '3',
                                'Ford Focus' => '4',
                                'Ford Ranger' => '5',
                                'Ford Taurus' => '6',
                                'Toyota Camry' => '7',
                                'Toyota Corolla' => '8',
                                'Chevrolet Malibu' => '9',
                                'Chevrolet Impala' => '10',
                                'Nissan Altima' => '11',
                                'Honda Civic' => '12',
                                'Honda Accord' => '13',
                                'Subaru Legacy' => '14',
                                'Dodge Ram' => '15',
                                'Dodge Caravan' => '16',
                                'Jeep Grand Cherokee' => '17',
                                'GMC Sierra' => '18',
                            ],
                            'dataset' => 'car',
                            'control' => 'DROPDOWN',
                            'default' => 'Ford F150',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'trip_type',
                            'label' => 'Trip type',
                            'type' => 'select',
                            'options' => ['City' => '1', 'Highway' => '2', 'Urban and Highway' => '3', 'Custom' => '0'],
                            'dataset' => 'trip_type',
                            'control' => 'DROPDOWN',
                            'default' => 'City',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'trip_type == 2', 'text' => <<<'TXT'
                                Fuel consumption of {{mpg_highway.value}} {{mpg_highway.fullUnit}}. If you can't find your car or the fuel consumption is different, select the "Other vehicle" option instead.
                                TXT],
                                ['when' => 'trip_type == 1', 'text' => <<<'TXT'
                                Fuel consumption of {{mpg_city.value}} {{mpg_city.fullUnit}}. If you can't find your car or the fuel consumption is different, select the "Other vehicle" option instead.
                                TXT],
                                ['when' => 'trip_type == 3', 'text' => <<<'TXT'
                                Fuel consumption of {{mpg_mixed.value}} {{mpg_mixed.fullUnit}}. If you can't find your car or the fuel consumption is different, select the "Other vehicle" option instead.
                                TXT],
                                ['when' => 'trip_type == 0', 'text' => 'If you can\'t find your car, select the "Other vehicle" option instead.&nbsp;'],
                            ],
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
                            'rounding' => ['omni', '0.000001'],
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
                            'rounding' => ['omni', '0.000001'],
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
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Division of payment',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'people',
                            'label' => 'Number of people',
                            'type' => 'number',
                            'rounding' => ['omni', '0.000001'],
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
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Your engine's specifications, age, and condition can affect its fuel economy, so... your mileage may vary. Select the "Other vehicle" (in the first field) to enter a custom fuel economy.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'hidden parameters',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mpg_highway',
                            'label' => 'Fuel economy',
                            'type' => 'result',
                            'unit' => '27',
                            'unit_default' => 'l100km',
                            'rounding' => ['omni', '0.001'],
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
                            'rounding' => ['omni', '0.001'],
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
                            'rounding' => ['omni', '0.001'],
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
            'results' => ['distance' => 'fuel_burnt*mpg_custom', 'mpg_custom' => 'distance/fuel_burnt', 'fuel_burnt' => 'distance/mpg_custom'],
        ],
        [
            'title' => 'cost_highway = one_way(price) * fuel_burnt_highway',
            'results' => ['fuel_burnt_highway' => 'cost_highway/(price)', 'cost_highway' => 'fuel_burnt_highway*(price)'],
        ],
        [
            'title' => 'cost_per_person_highway = cost_highway / people',
            'results' => ['cost_per_person_highway' => 'cost_highway/people', 'cost_highway' => 'cost_per_person_highway*people', 'people' => 'cost_highway/cost_per_person_highway'],
        ],
        [
            'title' => 'fuel_burnt_highway = (distance)/mpg_highway',
            'results' => ['mpg_highway' => 'distance/fuel_burnt_highway', 'distance' => 'fuel_burnt_highway*mpg_highway', 'fuel_burnt_highway' => 'distance/mpg_highway'],
        ],
        [
            'title' => 'cost_city = one_way(price)* fuel_burnt_city',
            'results' => ['fuel_burnt_city' => 'cost_city/(price)', 'cost_city' => 'fuel_burnt_city*(price)'],
        ],
        [
            'title' => 'cost_per_person_city = cost_city / people',
            'results' => ['cost_per_person_city' => 'cost_city/people', 'people' => 'cost_city/cost_per_person_city', 'cost_city' => 'cost_per_person_city*people'],
        ],
        [
            'title' => 'fuel_burnt_city= (distance)/mpg_city',
            'results' => ['distance' => 'fuel_burnt_city*mpg_city', 'fuel_burnt_city' => 'distance/mpg_city', 'mpg_city' => 'distance/fuel_burnt_city'],
        ],
        [
            'title' => 'cost_mixed = one_way(price)* fuel_burnt_mixed',
            'results' => ['fuel_burnt_mixed' => 'cost_mixed/(price)', 'cost_mixed' => 'fuel_burnt_mixed*(price)'],
        ],
        [
            'title' => 'cost_per_person_mixed = cost_mixed / people',
            'results' => ['cost_per_person_mixed' => 'cost_mixed/people', 'cost_mixed' => 'cost_per_person_mixed*people', 'people' => 'cost_mixed/cost_per_person_mixed'],
        ],
        [
            'title' => 'fuel_burnt_mixed = (distance)/mpg_mixed',
            'results' => ['mpg_mixed' => 'distance/fuel_burnt_mixed', 'fuel_burnt_mixed' => 'distance/mpg_mixed', 'distance' => 'fuel_burnt_mixed*mpg_mixed'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => 'Give the Gas calculator the fuel economy, the fuel used and the cost of the trip and it returns <strong>fuel price</strong>.',
        'sections' => [
            ['title' => 'How does the Gas calculator work?', 'html' => <<<'TXT'
            <p>The Gas calculator takes the values in the form, applies the relationship described below and reports <strong>fuel price</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the car and the trip type); then you type in the fuel economy (Plan a trip and fuel costs), the fuel used (Plan a trip and fuel costs), the cost of the trip (Plan a trip and fuel costs) and the cost of the trip (Plan a trip and fuel costs).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 18 options, such as other vehicle, ford F150 and ford Explorer. </li><li>Pick the option that matches your case — 4 options, such as city, highway and urban and Highway. </li><li>A measured quantity, entered by default in liters per 100 kilometers. The unit chip switches it to any of the 10 supported units.</li><li>A measured quantity, entered by default in liters. The unit chip switches it to any of the 40 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A plain number with no unit attached.</li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Car</strong></td><td>One of 18 options, such as other vehicle, ford F150 and ford Explorer.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Trip type</strong></td><td>One of 4 options, such as city, highway and urban and Highway.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Fuel economy (Plan a trip and fuel costs)</strong></td><td>A measured quantity, 10 units available.</td><td>liters per 100 kilometers</td><td>You supply it</td></tr><tr><td><strong>Distance</strong></td><td>A measured quantity, 34 units available.</td><td>kilometers</td><td>Calculated</td></tr><tr><td><strong>Fuel used (Plan a trip and fuel costs)</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>Calculated</td></tr><tr><td><strong>Fuel used (Plan a trip and fuel costs)</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>Calculated</td></tr><tr><td><strong>Fuel used (Plan a trip and fuel costs)</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>Calculated</td></tr><tr><td><strong>Fuel used (Plan a trip and fuel costs)</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>You supply it</td></tr><tr><td><strong>Fuel price</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Cost of the trip (Plan a trip and fuel costs)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Cost of the trip (Plan a trip and fuel costs)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Cost of the trip (Plan a trip and fuel costs)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Cost of the trip (Plan a trip and fuel costs)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Number of people</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Cost per person (Division of payment)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Cost per person (Division of payment)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Cost per person (Division of payment)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Cost per person (Division of payment)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Fuel economy (hidden parameters)</strong></td><td>A measured quantity, 10 units available.</td><td>liters per 100 kilometers</td><td>Calculated</td></tr><tr><td><strong>Fuel economy (hidden parameters)</strong></td><td>A measured quantity, 10 units available.</td><td>liters per 100 kilometers</td><td>Calculated</td></tr><tr><td><strong>Fuel economy (hidden parameters)</strong></td><td>A measured quantity, 10 units available.</td><td>liters per 100 kilometers</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Gas calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Fuel price</span><span class="formula-eq">=</span><span class="formula-rhs">cost of the trip ÷ fuel used</span></div><div class="formula-row"><span class="formula-lhs">Cost per person</span><span class="formula-eq">=</span><span class="formula-rhs">cost of the trip ÷ number of people</span></div><div class="formula-row"><span class="formula-lhs">Distance</span><span class="formula-eq">=</span><span class="formula-rhs">fuel used × fuel economy</span></div><div class="formula-row"><span class="formula-lhs">Fuel used</span><span class="formula-eq">=</span><span class="formula-rhs">cost of the trip ÷ (fuel price)</span></div><div class="formula-row"><span class="formula-lhs">Fuel economy</span><span class="formula-eq">=</span><span class="formula-rhs">distance ÷ fuel used</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in kilometers, and convertible to any of the 34 units on that chip.</li><li>Shown in liters, and convertible to any of the 40 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in liters per 100 kilometers, and convertible to any of the 10 units on that chip.</li><li>Shown in liters, and convertible to any of the 40 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in liters per 100 kilometers, and convertible to any of the 10 units on that chip.</li><li>Shown in liters, and convertible to any of the 40 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in liters per 100 kilometers, and convertible to any of the 10 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Fuel economy, opening in liters per 100 kilometers</li><li>Length, opening in kilometers</li><li>Volume, opening in liters</li><li>Volume, opening in liters</li><li>Volume, opening in liters</li><li>Volume, opening in liters</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Gas calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 3 figures keep coming back — the fuel economy, the fuel used and the cost of the trip — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/6-month">6 month</a>, <a href="/everyday-life/60-day">60 day</a> and <a href="/everyday-life/8-hour-shift">8-hour shift</a>.</p>
            TXT],
            ['title' => 'Planning with the estimate', 'html' => <<<'TXT'
            <p>Trip fuel is estimated from distance and fuel economy; multiplying the fuel volume by the price gives the cost. Select city, highway, mixed or custom economy according to the journey. City traffic and highway cruising can produce different consumption, so a route that includes both should use a representative mixed figure where possible. Enter a round-trip distance if you want the estimate for the full return journey.</p><p>Keep the fuel economy and fuel price units aligned. A consumption value in litres per 100 kilometres should be paired with a price per litre after unit conversion; miles per gallon uses a gallon convention that can be US or Imperial. Check the unit labels and the fuel price before comparing two cars. A unit mismatch can produce a plausible-looking but badly scaled cost.</p><p>The result assumes the entered economy and pump price hold for the whole trip. Traffic, hills, weather, speed, cargo, tyres and vehicle condition all affect real use. If you have measured data from your own driving, use it instead of a best-case brochure rating. Fuel prices can also change between planning and departure, so update the price if the estimate is being used for a budget.</p><p>Fuel is only one part of a journey’s cost. Tolls, parking, maintenance, depreciation, charging alternatives and accommodation are outside the calculation unless the form specifically includes them. Use the output to compare fuel scenarios, not as a guaranteed trip quote. For a fair comparison, hold distance and fuel price constant and change only the vehicle economy or route assumption.</p>
            TXT],
            ['title' => 'Checking the trip assumptions', 'html' => <<<'TXT'
            <p>Use the car’s economy for the kind of driving represented by the trip. A city figure may suit stop-and-go streets, while highway mileage may better describe steady travel; mixed driving should use a realistic blend. Select a built-in vehicle only if its economy and fuel type match your car. Otherwise, the custom value is usually the better starting point.</p><p>Fuel used is estimated from the entered distance and economy. The total fuel cost then depends on price per litre or gallon, so verify both unit selectors. A fuel price of 1.80 per litre cannot be multiplied directly by a volume in US gallons without conversion. If the journey is round-trip, include both directions in the distance or calculate the one-way cost and double it.</p><p>Real consumption changes with traffic, weather, hills, speed, load and vehicle condition. Use a range of economy values if you need a conservative budget. The output excludes tolls, parking, maintenance and other trip expenses unless explicitly listed. Update the fuel price close to departure if it matters to your estimate.</p>
            TXT],
            ['title' => 'Comparing route and vehicle scenarios', 'html' => <<<'TXT'
            <p>One way to use the results is to compare city, highway and mixed driving for the same distance and fuel price. That isolates the effect of economy from the effect of trip length. You can also compare two cars by entering their measured economy values while keeping the route unchanged. This is more meaningful than comparing totals generated with different distances or different fuel-price assumptions.</p><p>If you are planning a round trip, include the return distance; if you are estimating one direction, label the result that way. Fuel economy from a manufacturer is measured under a defined test and may not match your route. A trip with heavy traffic, steep grades, cold starts or roof cargo may use more fuel. The result is a budget estimate, not a guarantee of how far the tank will take you.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Gas calculator work out?', 'a' => 'It returns fuel price, derived from the fuel economy, the fuel used and the cost of the trip.'],
            ['q' => 'What do I need to enter to use the Gas calculator?', 'a' => 'The form asks for the fuel economy, the fuel used and the cost of the trip, which is 9 fields in total.'],
            ['q' => 'Can I enter fuel economy (Plan a trip and fuel costs) in a different unit?', 'a' => 'Yes. Fuel economy (Plan a trip and fuel costs) opens in liters per 100 kilometers and the chip beside it offers 10 units.'],
        ],
        'related' => [
            ['path' => '/everyday-life/6-month', 'name' => '6 month'],
            ['path' => '/everyday-life/60-day', 'name' => '60 day'],
            ['path' => '/everyday-life/8-hour-shift', 'name' => '8-hour shift'],
        ],
    ],
];
