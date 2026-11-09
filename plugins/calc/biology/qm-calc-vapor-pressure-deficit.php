<?php

/**
 * Vapor pressure deficit
 * /biology/vapor-pressure-deficit
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Vapor pressure deficit',
    'meta' => ['title' => 'Vapor pressure deficit Calculator: Steps & Units', 'description' => 'Vapor pressure deficit works out dew point from do you know the canopy temperature? and calculate using.... The formula is printed in the form\'s own words.', 'h1' => 'Vapor pressure deficit Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => 'Setup',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'canopyVS',
                            'label' => 'Do you know the canopy temperature?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'isCanopyTempKnown',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calculate_without_canopy',
                            'label' => 'Calculate using...',
                            'type' => 'select',
                            'options' => ['Relative humidity' => '0', 'Dew point' => '1', 'Wet bulb temperature' => '2'],
                            'dataset' => 'canopyWithoutTemp',
                            'default' => 'Relative humidity',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calculate_with_canopy',
                            'label' => 'Calculate using...',
                            'type' => 'select',
                            'options' => ['Relative humidity' => '0', 'Dew point' => '1'],
                            'dataset' => 'canopyWithTemp',
                            'default' => 'Relative humidity',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Inputs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'relative_humidity',
                            'label' => 'Relative humidity',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dew_point',
                            'label' => 'Dew point',
                            'type' => 'number',
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
                            'name' => 'temperature_leaf',
                            'label' => 'Canopy temperature',
                            'type' => 'number',
                            'help' => 'You can use an infrared sensor aimed at the canopy to measure canopy temperature.',
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
                            'name' => 'temperature_air',
                            'label' => 'Air temperature',
                            'type' => 'number',
                            'help' => 'This is the same as the dry bulb temperature.',
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
                            'name' => 'temperature_dry_bulb',
                            'label' => 'Dry-bulb temperature',
                            'type' => 'number',
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
                            'name' => 'temperature_wet_bulb',
                            'label' => 'Wet-bulb temperature',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Result',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VPD_air_from_RH',
                            'label' => 'VPD of air, from relative humidity',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            This is the difference between the vapor pressure of the current air and that of saturated air. It approximates the crop-to-air VPD when a plant's temperature is close to the air temperature.
                            TXT,
                            'unit' => '46',
                            'unit_default' => 'kPa',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VPD_air_from_dew_point',
                            'label' => 'VPD of air, from dew point',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            This is the difference between the vapor pressure of the current air and that of saturated air. When applied to plants, it assumes the canopy temperature = air temperature.
                            TXT,
                            'unit' => '46',
                            'unit_default' => 'kPa',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VPD_air_from_wet_bulb',
                            'label' => 'VPD of air, from the wet bulb',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            This is the difference between the vapor pressure of the current air and that of saturated air. When applied to plants, it assumes the canopy temperature = air temperature.
                            TXT,
                            'unit' => '46',
                            'unit_default' => 'kPa',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dew_point_2',
                            'label' => 'Dew point',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'RH_from_wet_bulb',
                            'label' => 'Relative humidity',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VPD_from_dew_point',
                            'label' => 'Vapor pressure deficit (VPD)',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'kPa',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VPD',
                            'label' => 'Vapor pressure deficit (VPD)',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'kPa',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden Variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VPsat_air',
                            'label' => 'Vpsat air',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'alpha',
                            'label' => 'Alpha',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'relative_humidity_from_dew_point',
                            'label' => 'Relative humidity from dew point',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pressure',
                            'label' => 'Pressure',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'kPa',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '101.325',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VPsat_air_dry_bulb',
                            'label' => 'Vpsat air dry bulb',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'intermediate_VP_air_dry_bulb',
                            'label' => 'Intermediate vp air dry bulb',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VP_air',
                            'label' => 'Vp air',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VP_leaf',
                            'label' => 'Vp leaf',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VP_dew_point',
                            'label' => 'Vp dew point',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'intermediate_VP_air',
                            'label' => 'Intermediate vp air',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'intermediate_VP_leaf',
                            'label' => 'Intermediate vp leaf',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'intermediate_dew_point',
                            'label' => 'Intermediate dew point',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'VPD = VP_leaf - VP_air',
            'results' => ['VP_air' => '-VPD + VP_leaf', 'VPD' => '-VP_air + VP_leaf', 'VP_leaf' => 'VPD + VP_air'],
        ],
        [
            'title' => 'VPD_from_dew_point = VP_leaf - VP_dew_point',
            'results' => ['VPD_from_dew_point' => '-VP_dew_point + VP_leaf', 'VP_dew_point' => '-VPD_from_dew_point + VP_leaf', 'VP_leaf' => 'VPD_from_dew_point + VP_dew_point'],
        ],
        [
            'title' => 'intermediate_VP_leaf = ln(VP_leaf/(1000*0.61078))',
            'results' => ['intermediate_VP_leaf' => 'log((50/30539)*VP_leaf)', 'VP_leaf' => '(30539/50)*exp(intermediate_VP_leaf)'],
        ],
        [
            'title' => 'intermediate_VP_leaf = (17.2694 * temperature_leaf) / (temperature_leaf + 237.3)',
            'results' => ['intermediate_VP_leaf' => '(86347/500)*temperature_leaf/(10*temperature_leaf + 2373)', 'temperature_leaf' => '-1186500*intermediate_VP_leaf/(5000*intermediate_VP_leaf - 86347)'],
        ],
        [
            'title' => 'intermediate_VP_air = ln(VP_air/(1000 * 0.61078 * (relative_humidity)))',
            'results' => ['VP_air' => '(30539/50)*relative_humidity*exp(intermediate_VP_air)', 'relative_humidity' => '(50/30539)*VP_air*exp(-intermediate_VP_air)', 'intermediate_VP_air' => 'log((50/30539)*VP_air/relative_humidity)'],
        ],
        [
            'title' => 'intermediate_VP_air = (17.2694 * temperature_air) / (temperature_air + 237.3)',
            'results' => ['intermediate_VP_air' => '(86347/500)*temperature_air/(10*temperature_air + 2373)', 'temperature_air' => '-1186500*intermediate_VP_air/(5000*intermediate_VP_air - 86347)'],
        ],
        [
            'title' => 'intermediate_dew_point = ln(VP_dew_point/(1000*0.61078))',
            'results' => ['intermediate_dew_point' => 'log((50/30539)*VP_dew_point)', 'VP_dew_point' => '(30539/50)*exp(intermediate_dew_point)'],
        ],
        [
            'title' => 'intermediate_dew_point =  (17.2694 * dew_point) / (dew_point + 237.3)',
            'results' => ['dew_point' => '-1186500*intermediate_dew_point/(5000*intermediate_dew_point - 86347)', 'intermediate_dew_point' => '(86347/500)*dew_point/(10*dew_point + 2373)'],
        ],
        [
            'title' => 'VPD_air_from_RH = VPsat_air * (1 - relative_humidity)',
            'results' => ['VPsat_air' => '-VPD_air_from_RH/(relative_humidity - 1)', 'VPD_air_from_RH' => 'VPsat_air*(1 - relative_humidity)', 'relative_humidity' => '(-VPD_air_from_RH + VPsat_air)/VPsat_air'],
        ],
        [
            'title' => 'VPD_air_from_dew_point = VPsat_air - VP_dew_point',
            'results' => ['VPD_air_from_dew_point' => '-VP_dew_point + VPsat_air', 'VPsat_air' => 'VPD_air_from_dew_point + VP_dew_point', 'VP_dew_point' => '-VPD_air_from_dew_point + VPsat_air'],
        ],
        [
            'title' => 'intermediate_VP_air = ln(VPsat_air/(1000 * 0.61078))',
            'results' => ['VPsat_air' => '(30539/50)*exp(intermediate_VP_air)', 'intermediate_VP_air' => 'log((50/30539)*VPsat_air)'],
        ],
        [
            'title' => 'alpha= log(relative_humidity_from_dew_point) + 17.62 * temperature_air / (243.12 + temperature_air)',
            'results' => ['alpha' => '(1/2)*(50*temperature_air*log(relative_humidity_from_dew_point) + 881*temperature_air + 12156*log(relative_humidity_from_dew_point))/(25*temperature_air + 6078)', 'temperature_air' => '12156*(alpha - log(relative_humidity_from_dew_point))/(-50*alpha + 50*log(relative_humidity_from_dew_point) + 881)'],
        ],
        [
            'title' => 'dew_point = 243.12 * alpha/ (17.62 - alpha)',
            'results' => ['alpha' => '(881/2)*dew_point/(25*dew_point + 6078)', 'dew_point' => '-12156*alpha/(50*alpha - 881)'],
        ],
        [
            'title' => 'dew_point_2 = dew_point_from_wet_bulb(temperature_dry_bulb,temperature_wet_bulb, pressure, VPsat_air_dry_bulb)',
            'results' => ['dew_point_2' => 'dew_point_from_wet_bulb(temperature_dry_bulb, temperature_wet_bulb, pressure, VPsat_air_dry_bulb)'],
        ],
        [
            'title' => 'VPD_air_from_wet_bulb = VPD_from_dew_point_wet_bulb(dew_point_2, VPsat_air_dry_bulb)',
            'results' => ['VPD_air_from_wet_bulb' => 'VPD_from_dew_point_wet_bulb(dew_point_from_wet_bulb(temperature_dry_bulb, temperature_wet_bulb, pressure, VPsat_air_dry_bulb), VPsat_air_dry_bulb)'],
        ],
        [
            'title' => 'RH_from_wet_bulb = RH_from_dew_point(dew_point_2, VPsat_air_dry_bulb)',
            'results' => ['RH_from_wet_bulb' => 'RH_from_dew_point(dew_point_from_wet_bulb(temperature_dry_bulb, temperature_wet_bulb, pressure, VPsat_air_dry_bulb), VPsat_air_dry_bulb)'],
        ],
        [
            'title' => 'intermediate_VP_air_dry_bulb = (17.2694 * temperature_dry_bulb) / (temperature_dry_bulb + 237.3)',
            'results' => ['intermediate_VP_air_dry_bulb' => '(86347/500)*temperature_dry_bulb/(10*temperature_dry_bulb + 2373)', 'temperature_dry_bulb' => '-1186500*intermediate_VP_air_dry_bulb/(5000*intermediate_VP_air_dry_bulb - 86347)'],
        ],
        [
            'title' => 'intermediate_VP_air_dry_bulb = ln(VPsat_air_dry_bulb/(1000 * 0.61078))',
            'results' => ['VPsat_air_dry_bulb' => '(30539/50)*exp(intermediate_VP_air_dry_bulb)', 'intermediate_VP_air_dry_bulb' => 'log((50/30539)*VPsat_air_dry_bulb)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("dew_point_from_wet_bulb",function(_temperature_air,_temperature_wet_bulb,_pressure){var temp_air=_temperature_air;var temp_wet_bulb=_temperature_wet_bulb;var pressure=_pressure/1000;var rw=622/(1.631*pressure*Math.exp(-17.67*temp_wet_bulb/(temp_wet_bulb+243.5))-1);var r=(rw-0.40224*(temp_air-temp_wet_bulb))/1000;var eps=0.622;var e_o=0.6113;var e_v=r*pressure/(r+eps);var tDewpoint=1/(1/273.15-1.844*Math.pow(10,-4)*Math.log(e_v/e_o));return tDewpoint-273.15});omni.define("RH_from_dew_point",function(dew_point,VPsat_air){var vP_air=0.6113*mathjs.exp(5423*(1/273.15-1/(dew_point+273.15)));var rH=vP_air/(VPsat_air/1000);return rH});omni.define("VPD_from_dew_point_wet_bulb",function(dew_point,VPsat_air){var vP_air=0.6113*Math.exp(5423*(1/273.15-1/(dew_point+273.15)));var vPD=VPsat_air-vP_air*1000;if(isNaN(vPD)==0){return vPD}else{return-Infinity}});//# sourceURL=customJs.js
    TXT,
    'checks' => [
        ['a' => 'temperature_wet_bulb', 'op' => '<=', 'b' => 'temperature_dry_bulb', 'msg' => 'The wet bulb cannot read above the dry bulb — evaporation cools a wet bulb, so it is always the same temperature or lower.'],
        ['a' => 'dew_point', 'op' => '<=', 'b' => 'temperature_air', 'msg' => 'The dew point cannot sit above the air temperature — that would put the relative humidity over 100 %.'],
    ],
    'article' => [
        'intro' => 'Vapor pressure deficit works out Relative humidity and Dew point. Units for Relative humidity default to percent and can be changed on the answer itself.',
        'sections' => [
            ['title' => 'How the Vapor pressure deficit calculator works', 'html' => <<<'TXT'
            <p>The Vapor pressure deficit calculator applies one relationship to the value already on the page and reports Relative humidity, Dew point and Canopy temperature.</p><p>In the form&#039;s own words, Vapor pressure deficit (VPD) = − Vp air + Vp leaf.</p><p>What comes back is Relative humidity, Dew point, Canopy temperature and Air temperature — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Do you know the canopy temperature? = 0, Calculate using… = 0, Calculate using… = 0 and Wet-bulb temperature = 3 — through the same formula and the panel reports <strong>Pressure</strong> = 101325.</p><ul><li><strong>Pressure</strong> = 101325</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Vapor pressure deficit (VPD)</strong> = <code>− Vp air + Vp leaf</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Pressure</strong> = 101325. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Relative humidity lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Vapor pressure deficit (VPD)</strong> = <code>− Vp air + Vp leaf</code></li><li><strong>Vp air</strong> = <code>− Vapor pressure deficit (VPD) + Vp leaf</code></li><li><strong>Vp leaf</strong> = <code>Vapor pressure deficit (VPD) + Vp air</code></li><li><strong>Vp dew point</strong> = <code>− Vapor pressure deficit (VPD) + Vp leaf</code></li><li><strong>Intermediate vp leaf</strong> = <code>ln((50 ÷ 30539) × Vp leaf)</code></li><li><strong>Canopy temperature</strong> = <code>− 1186500 × Intermediate vp leaf ÷ (5000 × Intermediate vp leaf − 86347)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Vapor pressure deficit (VPD)</strong> = <code>− Vp air + Vp leaf</code> — the form to use when Vp air and Vp leaf are the values you have.</li><li><strong>Vp air</strong> = <code>− Vapor pressure deficit (VPD) + Vp leaf</code> — the form to use when Vapor pressure deficit (VPD) and Vp leaf are the values you have.</li><li><strong>Vp leaf</strong> = <code>Vapor pressure deficit (VPD) + Vp air</code> — the form to use when Vapor pressure deficit (VPD) and Vp air are the values you have.</li><li><strong>Vapor pressure deficit (VPD)</strong> = <code>− Vp dew point + Vp leaf</code> — the form to use when Vp dew point and Vp leaf are the values you have.</li><li><strong>Vp dew point</strong> = <code>− Vapor pressure deficit (VPD) + Vp leaf</code> — the form to use when Vapor pressure deficit (VPD) and Vp leaf are the values you have.</li><li><strong>Vp leaf</strong> = <code>Vapor pressure deficit (VPD) + Vp dew point</code> — the form to use when Vapor pressure deficit (VPD) and Vp dew point are the values you have.</li><li><strong>Intermediate vp leaf</strong> = <code>ln((50 ÷ 30539) × Vp leaf)</code> — the form to use when Vp leaf are the values you have.</li><li><strong>Vp leaf</strong> = <code>(30539 ÷ 50) × e^(Intermediate vp leaf)</code> — the form to use when Intermediate vp leaf are the values you have.</li></ul><p>Any one of Vapor pressure deficit (VPD), Vp air and Vp leaf can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Relative humidity, Dew point and Canopy temperature are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If the measured values is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Enter them and press Calculate.</strong> Type the values into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Relative humidity in perc with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Relative humidity is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent, Celsius and kilopascals and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes the values you enter are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => '<p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>'],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Vapor pressure deficit is a number to act on, so the useful question is what to do with Relative humidity (perc), Dew point (C) and Canopy temperature (C) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down the values you used alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
            ['title' => 'What the number means, in bands', 'html' => <<<'TXT'
            <p>The number on its own says less than the band it falls into. These are the ranges growers and greenhouse controllers work to, for a leaf temperature close to air temperature:</p>
            <ul><li><strong>Below 0.4 kPa</strong> — the air is close to saturation. Stomata stay open but transpiration is slow, leaf surfaces stay wet for hours, and fungal problems (botrytis, downy mildew) get their opening.</li><li><strong>0.4 to 0.8 kPa</strong> — the range most cuttings, seedlings and transplants are kept in while roots are still forming.</li><li><strong>0.8 to 1.2 kPa</strong> — active vegetative growth: water and nutrients move quickly, and the plant can keep up with the demand.</li><li><strong>1.2 to 1.6 kPa</strong> — the upper end of comfortable for flowering and fruiting crops in good light.</li><li><strong>Above 2.0 kPa</strong> — the air is pulling harder than the roots can supply. Stomata close in the middle of the day, growth stops and leaf edges scorch.</li></ul>
            <p>Move along the list in one direction only. Raising temperature at fixed humidity raises the deficit; raising humidity at fixed temperature lowers it. The page reports the deficit, not a verdict, so read it with the crop, the light level and the time of day in hand — a 1.4 kPa afternoon in full sun is not the same event as 1.4 kPa at night.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Vapor pressure deficit calculator work out?', 'a' => <<<'TXT'
            Relative humidity, Dew point, Canopy temperature and Air temperature, from Vp air and Vp leaf. The relationship is Vapor pressure deficit (VPD) = − Vp air + Vp leaf.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Vapor pressure deficit (VPD), Vp air, Vp leaf and Vapor pressure deficit (VPD) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Pressure = 101325. Those are the defaults written into the form — move the value already on the page and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Relative humidity is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With the value already on the page left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Relative humidity keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/hardy-weinberg-recessive-homozygote', 'name' => 'Hardy–Weinberg from the Recessive Homozygote Frequency Calcula'],
            ['path' => '/biology/hatch-rate', 'name' => 'Hatch Rate Calculator'],
            ['path' => '/biology/height-to-finger-length', 'name' => 'Height to Finger Length Calculator'],
        ],
        'authors' => [],
    ],
];
