<?php

/**
 * Pizza baking
 * /food/perfect-pizza
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pizza baking',
    'meta' => ['title' => 'Pizza baking Calculator — Formula & Results', 'description' => 'Estimate pizza-dough or baking inputs from the selected surface and temperature settings. Check units and follow the recipe or package directions.', 'h1' => 'Pizza baking Calculator', 'updated' => '2024-07-20'],
    'sections' => [
        [
            'title' => 'Oven',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'oven_type',
                            'label' => 'Baking surface',
                            'type' => 'select',
                            'options' => ['Stone (brick)' => '0.86', 'Metal (steel)' => '18', 'Custom' => ''],
                            'dataset' => 'ovens',
                            'control' => 'DROPDOWN',
                            'default' => 'Metal (steel)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'oven_temperature',
                            'label' => 'Temperature',
                            'type' => 'number',
                            'help' => 'Preheated oven temperature.',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '230', 'when' => null],
                                ['value' => '446', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Oven details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'thermal_conductivity',
                            'label' => 'Oven thermal conductivity',
                            'type' => 'result',
                            'suffix' => 'W / (m·K)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'temp_conductivity',
                            'label' => 'Oven temperature conductivity',
                            'type' => 'result',
                            'suffix' => 'm²/s',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nu_21',
                            'label' => 'Oven v₂₁ coefficient',
                            'type' => 'result',
                            'help' => 'See paper in the text for more information.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Dough',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dough_origin',
                            'label' => 'Dough\'s origin',
                            'type' => 'select',
                            'options' => ['Room temperature' => '1', 'Fridge' => '2', 'Custom' => '3'],
                            'dataset' => 'dough_temperature',
                            'default' => 'Room temperature',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dough_temperature',
                            'label' => 'Dough\'s temperature',
                            'type' => 'result',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'thickness',
                            'label' => 'Pizza thickness',
                            'type' => 'number',
                            'help' => 'The thickness of the dough and the toppings before baking.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Dough details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rho_dough',
                            'label' => 'Dough density',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'gcm3',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '0.7', 'when' => null],
                                ['value' => '0.4', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_dough',
                            'label' => 'Dough heat capacity',
                            'type' => 'number',
                            'suffix' => 'J/(kg·K)',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2250',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'alpha',
                            'label' => 'α coefficient',
                            'type' => 'number',
                            'help' => 'The percentage of water that evaporates during baking.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Baking results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'heating_time',
                            'label' => 'Heating time',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'minsec',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bottom_temp',
                            'label' => 'Pizza bottom temperature',
                            'type' => 'number',
                            'help' => 'Temperature of boundary layer between bottom of the pizza and oven resulting from thermal diffusion only.',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        According to the pizzaiolos from Rome, the optimal temperature for Roman pizza is 330&nbsp;°C (626&nbsp;°F) when baked in a brick oven. For electric ovens with steel surfaces, it should be about 230&nbsp;°C (446&nbsp;°F). The calculator provides viable results for the typical Margherita pizza with tomatoes and mozzarella. In other cases, the more water-rich the toppings, the longer the baking time
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'HIDDEN',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rho_water',
                            'label' => 'Water density',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'gcm3',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.998000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sigma',
                            'label' => 'Boltzmann constant',
                            'type' => 'number',
                            'suffix' => 'W/(m² K⁴)',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.000000056700000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a',
                            'label' => 'a',
                            'type' => 'number',
                            'suffix' => 'W/cm²',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'b',
                            'label' => 'b',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c',
                            'label' => 'c',
                            'type' => 'number',
                            'suffix' => 'J/cm²',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c1',
                            'label' => 'c1',
                            'type' => 'number',
                            'suffix' => 'J/cm²',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c2',
                            'label' => 'c2',
                            'type' => 'number',
                            'suffix' => 'J/cm²',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'T_b',
                            'label' => 'Boiling temperature of water',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100.000000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'L',
                            'label' => 'Latent heat',
                            'type' => 'number',
                            'suffix' => 'J/g',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2264.760000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cc',
                            'label' => 'Cc',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'a * heating_time + b * sqrt(heating_time) = c',
            'results' => ['c' => 'a*heating_time + b*sqrt(heating_time)', 'heating_time' => '(1/2)*(2*a*c + pow(b, 2) + b*sqrt(4*a*c + pow(b, 2)))/pow(a, 2)', 'b' => '(-a*heating_time + c)/sqrt(heating_time)', 'a' => '-b/sqrt(heating_time) + c/heating_time'],
        ],
        [
            'title' => 'b = 2 * thermal_conductivity * (oven_temperature - bottom_temp) / sqrt(pi * temp_conductivity)  / 10000',
            'results' => [
                'bottom_temp' => '-5000*sqrt(PI)*b*sqrt(temp_conductivity)/thermal_conductivity + oven_temperature',
                'thermal_conductivity' => '-5000*sqrt(PI)*b*sqrt(temp_conductivity)/(bottom_temp - oven_temperature)',
                'temp_conductivity' => '(1/25000000)*pow(thermal_conductivity, 2)*pow(bottom_temp - oven_temperature, 2)/(PI*pow(b, 2))',
                'b' => '(1/5000)*thermal_conductivity*(-bottom_temp + oven_temperature)/(sqrt(PI)*sqrt(temp_conductivity))',
                'oven_temperature' => '5000*sqrt(PI)*b*sqrt(temp_conductivity)/thermal_conductivity + bottom_temp',
            ],
        ],
        [
            'title' => 'c1 =  c_dough * rho_dough * (T_b - dough_temperature) * thickness / 1000',
            'results' => [
                'c1' => '(1/1000)*c_dough*rho_dough*thickness*(T_b - dough_temperature)',
                'T_b' => '1000*c1/(c_dough*rho_dough*thickness) + dough_temperature',
                'thickness' => '1000*c1/(c_dough*rho_dough*(T_b - dough_temperature))',
                'dough_temperature' => 'T_b - 1000*c1/(c_dough*rho_dough*thickness)',
                'rho_dough' => '1000*c1/(c_dough*thickness*(T_b - dough_temperature))',
                'c_dough' => '1000*c1/(rho_dough*thickness*(T_b - dough_temperature))',
            ],
        ],
        [
            'title' => 'c2 = alpha * L * rho_water * thickness',
            'results' => [
                'alpha' => 'c2/(L*rho_water*thickness)',
                'thickness' => 'c2/(L*alpha*rho_water)',
                'rho_water' => 'c2/(L*alpha*thickness)',
                'c2' => 'L*alpha*rho_water*thickness',
                'L' => 'c2/(alpha*rho_water*thickness)',
            ],
        ],
        [
            'title' => 'c = c1 + c2',
            'results' => ['c' => 'c1 + c2', 'c2' => 'c - c1', 'c1' => 'c - c2'],
        ],
        [
            'title' => 'bottom_temp = (oven_temperature + nu_21*dough_temperature)/(1 + nu_21)',
            'results' => ['nu_21' => '(-bottom_temp + oven_temperature)/(bottom_temp - dough_temperature)', 'dough_temperature' => '(bottom_temp*nu_21 + bottom_temp - oven_temperature)/nu_21', 'bottom_temp' => '(dough_temperature*nu_21 + oven_temperature)/(nu_21 + 1)', 'oven_temperature' => 'bottom_temp*nu_21 + bottom_temp - dough_temperature*nu_21'],
        ],
        [
            'title' => 'a = sigma * (oven_temperature^4 - T_b^4) / 10000',
            'results' => ['a' => '(1/10000)*sigma*(-pow(T_b, 4) + pow(oven_temperature, 4))', 'sigma' => '-10000*a/(pow(T_b, 4) - pow(oven_temperature, 4))', 'T_b' => 'pow(-10000*a/sigma + pow(oven_temperature, 4), 1/4)', 'oven_temperature' => 'pow(pow(T_b, 4) + 10000*a/sigma, 1/4)'],
        ],
        [
            'title' => 'heating_time = (b^2 + 2*a*c - b*sqrt(b^2 + 4*a*c))/(2 * a^2)',
            'results' => ['c' => 'a*heating_time + b*sqrt(heating_time)', 'heating_time' => '(a*c + (1/2)*b*(b - sqrt(4*a*c + pow(b, 2))))/pow(a, 2)', 'b' => '(a*heating_time - c)*sqrt(1/heating_time)', 'a' => '(b*sqrt(pow(heating_time, 3)) + c*heating_time)/pow(heating_time, 2)'],
        ],
        [
            'title' => 'dough_origin=cc',
            'results' => ['cc' => 'dough_origin', 'dough_origin' => 'cc'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Pizza baking turns Baking surface, Temperature and Dough's origin into Oven thermal conductivity and Oven temperature conductivity. Nothing is looked up on this page: oven thermal conductivity is computed from baking surface and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Oven thermal conductivity is opened in W / (m·K); the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Pizza baking calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Pizza baking: it takes 9 numbers and reports Oven thermal conductivity, Oven temperature conductivity and Oven v₂₁ coefficient.</p><p>In the form&#039;s own words, c = a × Heating time + b × √(Heating time).</p><p>The answers are Oven thermal conductivity, Oven temperature conductivity, Oven v₂₁ coefficient and Dough&#039;s temperature; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 9 boxes and the page has everything it needs.</p><ul><li><strong>Baking surface</strong> — a plain number, no unit</li><li><strong>Temperature</strong> — in Celsius. Preheated oven temperature.</li><li><strong>Dough&#039;s origin</strong> — a plain number, no unit</li><li><strong>Pizza thickness</strong> — in centimeters. The thickness of the dough and the toppings before baking.</li><li><strong>Dough density</strong> — in grams per cubic centimeter</li><li><strong>Dough heat capacity</strong> — in J/(kg·K)</li><li><strong>α coefficient</strong> — in percent. The percentage of water that evaporates during baking.</li><li><strong>Heating time</strong> — in minutes / seconds</li><li><strong>Pizza bottom temperature</strong> — in Celsius. Temperature of boundary layer between bottom of the pizza and oven resulting from thermal diffusion only.</li></ul><p>The result boxes are Oven thermal conductivity in W / (m·K), Oven temperature conductivity in m²/s, Oven v₂₁ coefficient, Dough&#039;s temperature in Celsius; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Baking surface = 18 — through the same formula and the panel reports <strong>Dough&amp;#039;s origin</strong> = 1, <strong>Water density</strong> = 998, <strong>Boltzmann constant</strong> = 5.670e-8, <strong>Boiling temperature of water</strong> = 100, <strong>Latent heat</strong> = 2265 and <strong>Cc</strong> = 1.</p><ul><li><strong>Dough&#039;s origin</strong> = 1</li><li><strong>Water density</strong> = 998</li><li><strong>Boltzmann constant</strong> = 5.670e-8</li><li><strong>Boiling temperature of water</strong> = 100</li><li><strong>Latent heat</strong> = 2265</li><li><strong>Cc</strong> = 1</li></ul><p>The line behind those figures is <strong>c</strong> = <code>a × Heating time + b × √(Heating time)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Dough&amp;#039;s origin</strong> = 1, <strong>Water density</strong> = 998, <strong>Boltzmann constant</strong> = 5.670e-8, <strong>Boiling temperature of water</strong> = 100, <strong>Latent heat</strong> = 2265 and <strong>Cc</strong> = 1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Dough&#039;s temperature offers 4 units and opens on Celsius, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>c</strong> = <code>a × Heating time + b × √(Heating time)</code></li><li><strong>Heating time</strong> = <code>(1 ÷ 2) × (2 × a × c + (b)^(2) + b × √(4 × a × c + (b)^(2))) ÷ (a)^(2)</code></li><li><strong>b</strong> = <code>( − a × Heating time + c) ÷ √(Heating time)</code></li><li><strong>a</strong> = <code>− b ÷ √(Heating time) + c ÷ Heating time</code></li><li><strong>Pizza bottom temperature</strong> = <code>− 5000 × √(PI) × b × √(Oven temperature conductivity) ÷ Oven thermal conductivity + Temperature</code></li><li><strong>Oven thermal conductivity</strong> = <code>− 5000 × √(PI) × b × √(Oven temperature conductivity) ÷ (Pizza bottom temperature − Temperature)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>c</strong> = <code>a × Heating time + b × √(Heating time)</code> — the form to use when a, Heating time and b are the values you have.</li><li><strong>Heating time</strong> = <code>(1 ÷ 2) × (2 × a × c + (b)^(2) + b × √(4 × a × c + (b)^(2))) ÷ (a)^(2)</code> — the form to use when a, c and b are the values you have.</li><li><strong>b</strong> = <code>( − a × Heating time + c) ÷ √(Heating time)</code> — the form to use when a, Heating time and c are the values you have.</li><li><strong>a</strong> = <code>− b ÷ √(Heating time) + c ÷ Heating time</code> — the form to use when b, Heating time and c are the values you have.</li><li><strong>b</strong> = <code>(1 ÷ 5000) × Oven thermal conductivity × ( − Pizza bottom temperature + Temperature) ÷ (√(PI) × √(Oven temperature conductivity))</code> — the form to use when Oven thermal conductivity, Pizza bottom temperature, Temperature and Oven temperature conductivity are the values you have.</li><li><strong>Pizza bottom temperature</strong> = <code>− 5000 × √(PI) × b × √(Oven temperature conductivity) ÷ Oven thermal conductivity + Temperature</code> — the form to use when b, Oven temperature conductivity, Oven thermal conductivity and Temperature are the values you have.</li><li><strong>Oven thermal conductivity</strong> = <code>− 5000 × √(PI) × b × √(Oven temperature conductivity) ÷ (Pizza bottom temperature − Temperature)</code> — the form to use when b, Oven temperature conductivity, Pizza bottom temperature and Temperature are the values you have.</li><li><strong>Oven temperature conductivity</strong> = <code>(1 ÷ 25000000) × (Oven thermal conductivity)^(2) × (Pizza bottom temperature − Temperature)^(2) ÷ (PI × (b)^(2))</code> — the form to use when Oven thermal conductivity, Pizza bottom temperature, Temperature and b are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of c, Heating time and b can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Baking surface, from 18 to 36 — and the answers go from <strong>Dough&amp;#039;s origin</strong> 1, <strong>Water density</strong> 998, <strong>Boltzmann constant</strong> 5.670e-8, <strong>Boiling temperature of water</strong> 100, <strong>Latent heat</strong> 2265 and <strong>Cc</strong> 1 to <strong>Dough&amp;#039;s origin</strong> 1, <strong>Water density</strong> 998, <strong>Boltzmann constant</strong> 5.670e-8, <strong>Boiling temperature of water</strong> 100, <strong>Latent heat</strong> 2265 and <strong>Cc</strong> 1.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Temperature, Pizza thickness and Dough density is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Oven thermal conductivity, Oven temperature conductivity and Oven v₂₁ coefficient are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Baking surface left as a guess.</strong> If Baking surface is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Temperature left as a guess.</strong> If Temperature is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> If Baking surface is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Baking surface</strong> takes a plain number with no unit attached. Check the field label and unit before calculating.</li><li><strong>Temperature</strong> is a celsius quantity: the page opens it in C and converts anything else you pick before the formula runs. Preheated oven temperature. The page reads it when it works out Pizza bottom temperature, Oven thermal conductivity and Oven temperature conductivity. Check the field label and unit before calculating.</li><li><strong>Dough&#039;s origin</strong> takes a plain number with no unit attached. The page reads it when it works out Cc. Check the field label and unit before calculating.</li><li><strong>Pizza thickness</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. The thickness of the dough and the toppings before baking. The page reads it when it works out c1, Boiling temperature of water and Dough's temperature. Check the field label and unit before calculating.</li><li><strong>Dough density</strong> is a grams per cubic centimeter quantity: the page opens it in gcm3 and converts anything else you pick before the formula runs. The page reads it when it works out c1, Boiling temperature of water and Pizza thickness. Check the field label and unit before calculating.</li><li><strong>Dough heat capacity</strong> is measured in J/(kg·K). The page reads it when it works out c1, Boiling temperature of water and Pizza thickness. Check the field label and unit before calculating.</li><li><strong>α coefficient</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The percentage of water that evaporates during baking. The page reads it when it works out Pizza thickness, Water density and c2. Check the field label and unit before calculating.</li><li><strong>Heating time</strong> is a minutes / seconds quantity: the page opens it in minsec and converts anything else you pick before the formula runs. The page reads it when it works out c, b and a. Check the field label and unit before calculating.</li><li><strong>Pizza bottom temperature</strong> is a celsius quantity: the page opens it in C and converts anything else you pick before the formula runs. Temperature of boundary layer between bottom of the pizza and oven resulting from thermal diffusion only. The page reads it when it works out Oven thermal conductivity, Oven temperature conductivity and b. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Oven thermal conductivity is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover Celsius, centimeters and grams per cubic centimeter. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Baking surface, Temperature and Dough&#039;s origin measured, Oven thermal conductivity and Oven temperature conductivity wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/pizza">Pizza size</a>, <a href="/food/pizza-comparison">Pizza comparison</a> and <a href="/food/bakers-percentage">Baker&#x27;s percentage</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pizza baking calculator work out?', 'a' => <<<'TXT'
            Oven thermal conductivity, Oven temperature conductivity, Oven v₂₁ coefficient and Dough's temperature, from a, Heating time and b. The relationship is c = a × Heating time + b × √(Heating time).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Baking surface, Temperature (Celsius), Dough's origin, Pizza thickness (centimeters), Dough density (grams per cubic centimeter). With baking surface, temperature and dough's origin in place, Oven thermal conductivity can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. c, Heating time, b and a can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'Are the Pizza baking results exact?', 'a' => 'It uses the values and assumptions represented in the form. Real ingredients and conditions can vary, so check units and follow the recipe, product label or safety instructions that apply.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Oven thermal conductivity is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Baking surface left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Oven thermal conductivity at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/food/pizza', 'name' => 'Pizza size'],
            ['path' => '/food/pizza-comparison', 'name' => 'Pizza comparison'],
            ['path' => '/food/bakers-percentage', 'name' => 'Baker\'s percentage']
        ],
    ],
];
