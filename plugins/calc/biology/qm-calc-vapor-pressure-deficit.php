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
    'meta' => ['title' => 'Vapor pressure deficit Calculator: Steps & Units', 'description' => 'Vapor pressure deficit takes canopy temperature with relative humidity, dew point or wet bulb and returns VPD and dew point. Whichever humidity figure you have.', 'h1' => 'Vapor pressure deficit Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'RH_from_wet_bulb' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'VPD' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'VPD_air_from_RH' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'VPD_air_from_dew_point' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'VPD_air_from_wet_bulb' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'VPD_from_dew_point' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'VP_air' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'VP_dew_point' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'VP_leaf' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'VPsat_air' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'VPsat_air_dry_bulb' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'alpha' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'calculate_with_canopy' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '44SrUmpp6bal0R3GFVR6h', 'c' => null],
                ],
                'ds' => 'jvjBMOh5Hx_8iJErDJasj',
            ],
            'calculate_without_canopy' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'Y5HHvWB2CTzDz-d3V2UyB', 'c' => null],
                ],
                'ds' => 'UiBn67MRSqkCret-F5Hi6',
            ],
            'canopyVS' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'BGGt4-wgIaM9aQpI26kJ4', 'c' => null],
                ],
                'ds' => 'ArZbZiE4_byOzIwXXKsuk',
            ],
            'dew_point' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'dew_point_2' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
            ],
            'intermediate_VP_air' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'intermediate_VP_air_dry_bulb' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'intermediate_VP_leaf' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'intermediate_dew_point' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'pressure' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '101.325', 'c' => null],
                ],
            ],
            'relative_humidity' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'relative_humidity_from_dew_point' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'temperature_air' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'temperature_dry_bulb' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'temperature_leaf' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'temperature_wet_bulb' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'r23OebTPQYJ2nsok2icg0',
                'title' => 'Setup',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'canopyVS',
                                    'vt' => 'valueSelect',
                                    'l' => 'Do you know the canopy temperature?',
                                    'ds' => 'ArZbZiE4_byOzIwXXKsuk',
                                    'opts' => [
                                        ['BGGt4-wgIaM9aQpI26kJ4', 'No', '0'],
                                        ['bO01Dv_UfMB_LXgJHB2C_', 'Yes', '1'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'calculate_without_canopy',
                                    'vt' => 'valueSelect',
                                    'l' => 'Calculate using...',
                                    'ds' => 'UiBn67MRSqkCret-F5Hi6',
                                    'opts' => [
                                        ['Y5HHvWB2CTzDz-d3V2UyB', 'Relative humidity', '0'],
                                        ['Adgr0kTP5UopcjAPmbAB9', 'Dew point', '1'],
                                        ['R9ZvtdRwr16St_OlCR4hu', 'Wet bulb temperature', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'calculate_with_canopy',
                                    'vt' => 'valueSelect',
                                    'l' => 'Calculate using...',
                                    'ds' => 'jvjBMOh5Hx_8iJErDJasj',
                                    'opts' => [
                                        ['44SrUmpp6bal0R3GFVR6h', 'Relative humidity', '0'],
                                        ['e_AK3Q6uthFqUPQNappwM', 'Dew point', '1'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'ZCXiCy7URORSo483QclQf',
                'title' => 'Inputs',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'relative_humidity',
                                    'vt' => 'numerical',
                                    'l' => 'Relative humidity',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'dew_point',
                                    'vt' => 'numerical',
                                    'l' => 'Dew point',
                                    'us' => '40',
                                    'du' => 'C',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'temperature_leaf',
                                    'vt' => 'numerical',
                                    'l' => 'Canopy temperature',
                                    'h' => 'You can use an infrared sensor aimed at the canopy to measure canopy temperature.',
                                    'us' => '40',
                                    'du' => 'C',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'temperature_air',
                                    'vt' => 'numerical',
                                    'l' => 'Air temperature',
                                    'h' => 'This is the same as the dry bulb temperature.',
                                    'us' => '40',
                                    'du' => 'C',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'temperature_dry_bulb',
                                    'vt' => 'numerical',
                                    'l' => 'Dry-bulb temperature',
                                    'us' => '40',
                                    'du' => 'C',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'temperature_wet_bulb', 'vt' => 'numerical', 'l' => 'Wet-bulb temperature'],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '07qbc4TzMEyxhJIEzzIr7',
                'title' => 'Result',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'VPD_air_from_RH',
                                    'vt' => 'numerical',
                                    'l' => 'VPD of air, from relative humidity',
                                    'h' => <<<'TXT'
                                    This is the difference between the vapor pressure of the current air and that of saturated air. It approximates the crop-to-air VPD when a plant's temperature is close to the air temperature.
                                    TXT,
                                    'us' => '46',
                                    'du' => 'kPa',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'VPD_air_from_dew_point',
                                    'vt' => 'numerical',
                                    'l' => 'VPD of air, from dew point',
                                    'h' => <<<'TXT'
                                    This is the difference between the vapor pressure of the current air and that of saturated air. When applied to plants, it assumes the canopy temperature = air temperature.
                                    TXT,
                                    'us' => '46',
                                    'du' => 'kPa',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'VPD_air_from_wet_bulb',
                                    'vt' => 'numerical',
                                    'l' => 'VPD of air, from the wet bulb',
                                    'h' => <<<'TXT'
                                    This is the difference between the vapor pressure of the current air and that of saturated air. When applied to plants, it assumes the canopy temperature = air temperature.
                                    TXT,
                                    'us' => '46',
                                    'du' => 'kPa',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'dew_point_2', 'vt' => 'numerical', 'l' => 'Dew point'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'RH_from_wet_bulb',
                                    'vt' => 'numerical',
                                    'l' => 'Relative humidity',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'VPD_from_dew_point',
                                    'vt' => 'numerical',
                                    'l' => 'Vapor pressure deficit (VPD)',
                                    'us' => '46',
                                    'du' => 'kPa',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'VPD',
                                    'vt' => 'numerical',
                                    'l' => 'Vapor pressure deficit (VPD)',
                                    'us' => '46',
                                    'du' => 'kPa',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '-dxaeBkOdreCek3_ZtXtR',
                'title' => 'Hidden Variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'VPsat_air', 'vt' => 'numerical', 'l' => 'Vpsat air'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'alpha', 'vt' => 'numerical', 'l' => 'Alpha'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'relative_humidity_from_dew_point', 'vt' => 'numerical', 'l' => 'Relative humidity from dew point'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'pressure',
                                    'vt' => 'numerical',
                                    'l' => 'Pressure',
                                    'us' => '46',
                                    'du' => 'kPa',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'VPsat_air_dry_bulb', 'vt' => 'numerical', 'l' => 'Vpsat air dry bulb'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'intermediate_VP_air_dry_bulb', 'vt' => 'numerical', 'l' => 'Intermediate vp air dry bulb'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'VP_air', 'vt' => 'numerical', 'l' => 'Vp air'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'VP_leaf', 'vt' => 'numerical', 'l' => 'Vp leaf'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'VP_dew_point', 'vt' => 'numerical', 'l' => 'Vp dew point'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'intermediate_VP_air', 'vt' => 'numerical', 'l' => 'Intermediate vp air'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'intermediate_VP_leaf', 'vt' => 'numerical', 'l' => 'Intermediate vp leaf'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'intermediate_dew_point', 'vt' => 'numerical', 'l' => 'Intermediate dew point'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'VPD = VP_leaf - VP_air',
                'var' => [
                    [
                        'l' => 'VP_air',
                        'f' => '-VPD + VP_leaf',
                        'r' => ['VPD', 'VP_leaf'],
                    ],
                    [
                        'l' => 'VPD',
                        'f' => '-VP_air + VP_leaf',
                        'r' => ['VP_air', 'VP_leaf'],
                    ],
                    [
                        'l' => 'VP_leaf',
                        'f' => 'VPD + VP_air',
                        'r' => ['VP_air', 'VPD'],
                    ],
                ],
            ],
            [
                'formula' => 'VPD_from_dew_point = VP_leaf - VP_dew_point',
                'var' => [
                    [
                        'l' => 'VPD_from_dew_point',
                        'f' => '-VP_dew_point + VP_leaf',
                        'r' => ['VP_dew_point', 'VP_leaf'],
                    ],
                    [
                        'l' => 'VP_dew_point',
                        'f' => '-VPD_from_dew_point + VP_leaf',
                        'r' => ['VPD_from_dew_point', 'VP_leaf'],
                    ],
                    [
                        'l' => 'VP_leaf',
                        'f' => 'VPD_from_dew_point + VP_dew_point',
                        'r' => ['VPD_from_dew_point', 'VP_dew_point'],
                    ],
                ],
            ],
            [
                'formula' => 'intermediate_VP_leaf = ln(VP_leaf/(1000*0.61078))',
                'var' => [
                    [
                        'l' => 'intermediate_VP_leaf',
                        'f' => 'log((50/30539)*VP_leaf)',
                        'r' => ['VP_leaf'],
                    ],
                    [
                        'l' => 'VP_leaf',
                        'f' => '(30539/50)*exp(intermediate_VP_leaf)',
                        'r' => ['intermediate_VP_leaf'],
                    ],
                ],
            ],
            [
                'formula' => 'intermediate_VP_leaf = (17.2694 * temperature_leaf) / (temperature_leaf + 237.3)',
                'var' => [
                    [
                        'l' => 'intermediate_VP_leaf',
                        'f' => '(86347/500)*temperature_leaf/(10*temperature_leaf + 2373)',
                        'r' => ['temperature_leaf'],
                    ],
                    [
                        'l' => 'temperature_leaf',
                        'f' => '-1186500*intermediate_VP_leaf/(5000*intermediate_VP_leaf - 86347)',
                        'r' => ['intermediate_VP_leaf'],
                    ],
                ],
            ],
            [
                'formula' => 'intermediate_VP_air = ln(VP_air/(1000 * 0.61078 * (relative_humidity)))',
                'var' => [
                    [
                        'l' => 'VP_air',
                        'f' => '(30539/50)*relative_humidity*exp(intermediate_VP_air)',
                        'r' => ['relative_humidity', 'intermediate_VP_air'],
                    ],
                    [
                        'l' => 'relative_humidity',
                        'f' => '(50/30539)*VP_air*exp(-intermediate_VP_air)',
                        'r' => ['VP_air', 'intermediate_VP_air'],
                    ],
                    [
                        'l' => 'intermediate_VP_air',
                        'f' => 'log((50/30539)*VP_air/relative_humidity)',
                        'r' => ['VP_air', 'relative_humidity'],
                    ],
                ],
            ],
            [
                'formula' => 'intermediate_VP_air = (17.2694 * temperature_air) / (temperature_air + 237.3)',
                'var' => [
                    [
                        'l' => 'intermediate_VP_air',
                        'f' => '(86347/500)*temperature_air/(10*temperature_air + 2373)',
                        'r' => ['temperature_air'],
                    ],
                    [
                        'l' => 'temperature_air',
                        'f' => '-1186500*intermediate_VP_air/(5000*intermediate_VP_air - 86347)',
                        'r' => ['intermediate_VP_air'],
                    ],
                ],
            ],
            [
                'formula' => 'intermediate_dew_point = ln(VP_dew_point/(1000*0.61078))',
                'var' => [
                    [
                        'l' => 'intermediate_dew_point',
                        'f' => 'log((50/30539)*VP_dew_point)',
                        'r' => ['VP_dew_point'],
                    ],
                    [
                        'l' => 'VP_dew_point',
                        'f' => '(30539/50)*exp(intermediate_dew_point)',
                        'r' => ['intermediate_dew_point'],
                    ],
                ],
            ],
            [
                'formula' => 'intermediate_dew_point =  (17.2694 * dew_point) / (dew_point + 237.3)',
                'var' => [
                    [
                        'l' => 'dew_point',
                        'f' => '-1186500*intermediate_dew_point/(5000*intermediate_dew_point - 86347)',
                        'r' => ['intermediate_dew_point'],
                    ],
                    [
                        'l' => 'intermediate_dew_point',
                        'f' => '(86347/500)*dew_point/(10*dew_point + 2373)',
                        'r' => ['dew_point'],
                    ],
                ],
            ],
            [
                'formula' => 'VPD_air_from_RH = VPsat_air * (1 - relative_humidity)',
                'var' => [
                    [
                        'l' => 'VPsat_air',
                        'f' => '-VPD_air_from_RH/(relative_humidity - 1)',
                        'r' => ['VPD_air_from_RH', 'relative_humidity'],
                    ],
                    [
                        'l' => 'VPD_air_from_RH',
                        'f' => 'VPsat_air*(1 - relative_humidity)',
                        'r' => ['VPsat_air', 'relative_humidity'],
                    ],
                    [
                        'l' => 'relative_humidity',
                        'f' => '(-VPD_air_from_RH + VPsat_air)/VPsat_air',
                        'r' => ['VPsat_air', 'VPD_air_from_RH'],
                    ],
                ],
            ],
            [
                'formula' => 'VPD_air_from_dew_point = VPsat_air - VP_dew_point',
                'var' => [
                    [
                        'l' => 'VPD_air_from_dew_point',
                        'f' => '-VP_dew_point + VPsat_air',
                        'r' => ['VPsat_air', 'VP_dew_point'],
                    ],
                    [
                        'l' => 'VPsat_air',
                        'f' => 'VPD_air_from_dew_point + VP_dew_point',
                        'r' => ['VPD_air_from_dew_point', 'VP_dew_point'],
                    ],
                    [
                        'l' => 'VP_dew_point',
                        'f' => '-VPD_air_from_dew_point + VPsat_air',
                        'r' => ['VPD_air_from_dew_point', 'VPsat_air'],
                    ],
                ],
            ],
            [
                'formula' => 'intermediate_VP_air = ln(VPsat_air/(1000 * 0.61078))',
                'var' => [
                    [
                        'l' => 'VPsat_air',
                        'f' => '(30539/50)*exp(intermediate_VP_air)',
                        'r' => ['intermediate_VP_air'],
                    ],
                    [
                        'l' => 'intermediate_VP_air',
                        'f' => 'log((50/30539)*VPsat_air)',
                        'r' => ['VPsat_air'],
                    ],
                ],
            ],
            [
                'formula' => 'alpha= log(relative_humidity_from_dew_point) + 17.62 * temperature_air / (243.12 + temperature_air)',
                'var' => [
                    [
                        'l' => 'alpha',
                        'f' => '(1/2)*(50*temperature_air*log(relative_humidity_from_dew_point) + 881*temperature_air + 12156*log(relative_humidity_from_dew_point))/(25*temperature_air + 6078)',
                        'r' => ['temperature_air', 'relative_humidity_from_dew_point'],
                    ],
                    [
                        'l' => 'temperature_air',
                        'f' => '12156*(alpha - log(relative_humidity_from_dew_point))/(-50*alpha + 50*log(relative_humidity_from_dew_point) + 881)',
                        'r' => ['alpha', 'relative_humidity_from_dew_point'],
                    ],
                ],
            ],
            [
                'formula' => 'dew_point = 243.12 * alpha/ (17.62 - alpha)',
                'var' => [
                    [
                        'l' => 'alpha',
                        'f' => '(881/2)*dew_point/(25*dew_point + 6078)',
                        'r' => ['dew_point'],
                    ],
                    [
                        'l' => 'dew_point',
                        'f' => '-12156*alpha/(50*alpha - 881)',
                        'r' => ['alpha'],
                    ],
                ],
            ],
            [
                'formula' => 'dew_point_2 = dew_point_from_wet_bulb(temperature_dry_bulb,temperature_wet_bulb, pressure, VPsat_air_dry_bulb)',
                'var' => [
                    [
                        'l' => 'dew_point_2',
                        'f' => 'dew_point_from_wet_bulb(temperature_dry_bulb, temperature_wet_bulb, pressure, VPsat_air_dry_bulb)',
                        'r' => ['VPsat_air_dry_bulb', 'pressure', 'temperature_dry_bulb', 'temperature_wet_bulb'],
                    ],
                ],
            ],
            [
                'formula' => 'VPD_air_from_wet_bulb = VPD_from_dew_point_wet_bulb(dew_point_2, VPsat_air_dry_bulb)',
                'var' => [
                    [
                        'l' => 'VPD_air_from_wet_bulb',
                        'f' => 'VPD_from_dew_point_wet_bulb(dew_point_from_wet_bulb(temperature_dry_bulb, temperature_wet_bulb, pressure, VPsat_air_dry_bulb), VPsat_air_dry_bulb)',
                        'r' => ['VPsat_air_dry_bulb', 'pressure', 'temperature_dry_bulb', 'temperature_wet_bulb'],
                    ],
                ],
            ],
            [
                'formula' => 'RH_from_wet_bulb = RH_from_dew_point(dew_point_2, VPsat_air_dry_bulb)',
                'var' => [
                    [
                        'l' => 'RH_from_wet_bulb',
                        'f' => 'RH_from_dew_point(dew_point_from_wet_bulb(temperature_dry_bulb, temperature_wet_bulb, pressure, VPsat_air_dry_bulb), VPsat_air_dry_bulb)',
                        'r' => ['VPsat_air_dry_bulb', 'pressure', 'temperature_dry_bulb', 'temperature_wet_bulb'],
                    ],
                ],
            ],
            [
                'formula' => 'intermediate_VP_air_dry_bulb = (17.2694 * temperature_dry_bulb) / (temperature_dry_bulb + 237.3)',
                'var' => [
                    [
                        'l' => 'intermediate_VP_air_dry_bulb',
                        'f' => '(86347/500)*temperature_dry_bulb/(10*temperature_dry_bulb + 2373)',
                        'r' => ['temperature_dry_bulb'],
                    ],
                    [
                        'l' => 'temperature_dry_bulb',
                        'f' => '-1186500*intermediate_VP_air_dry_bulb/(5000*intermediate_VP_air_dry_bulb - 86347)',
                        'r' => ['intermediate_VP_air_dry_bulb'],
                    ],
                ],
            ],
            [
                'formula' => 'intermediate_VP_air_dry_bulb = ln(VPsat_air_dry_bulb/(1000 * 0.61078))',
                'var' => [
                    [
                        'l' => 'VPsat_air_dry_bulb',
                        'f' => '(30539/50)*exp(intermediate_VP_air_dry_bulb)',
                        'r' => ['intermediate_VP_air_dry_bulb'],
                    ],
                    [
                        'l' => 'intermediate_VP_air_dry_bulb',
                        'f' => 'log((50/30539)*VPsat_air_dry_bulb)',
                        'r' => ['VPsat_air_dry_bulb'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'ArZbZiE4_byOzIwXXKsuk' => [
                'name' => 'isCanopyTempKnown',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'BGGt4-wgIaM9aQpI26kJ4', 'label' => 'No', 'value' => '0'],
                    ['uid' => 'bO01Dv_UfMB_LXgJHB2C_', 'label' => 'Yes', 'value' => '1'],
                ],
            ],
            'UiBn67MRSqkCret-F5Hi6' => [
                'name' => 'canopyWithoutTemp',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'Y5HHvWB2CTzDz-d3V2UyB', 'label' => 'Relative humidity', 'value' => '0'],
                    ['uid' => 'Adgr0kTP5UopcjAPmbAB9', 'label' => 'Dew point', 'value' => '1'],
                    ['uid' => 'R9ZvtdRwr16St_OlCR4hu', 'label' => 'Wet bulb temperature', 'value' => '2'],
                ],
            ],
            'jvjBMOh5Hx_8iJErDJasj' => [
                'name' => 'canopyWithTemp',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '44SrUmpp6bal0R3GFVR6h', 'label' => 'Relative humidity', 'value' => '0'],
                    ['uid' => 'e_AK3Q6uthFqUPQNappwM', 'label' => 'Dew point', 'value' => '1'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.define("dew_point_from_wet_bulb",function(_temperature_air,_temperature_wet_bulb,_pressure){var temp_air=_temperature_air;var temp_wet_bulb=_temperature_wet_bulb;var pressure=_pressure/1000;var rw=622/(1.631*pressure*Math.exp(-17.67*temp_wet_bulb/(temp_wet_bulb+243.5))-1);var r=(rw-0.40224*(temp_air-temp_wet_bulb))/1000;var eps=0.622;var e_o=0.6113;var e_v=r*pressure/(r+eps);var tDewpoint=1/(1/273.15-1.844*Math.pow(10,-4)*Math.log(e_v/e_o));return tDewpoint-273.15});omni.define("RH_from_dew_point",function(dew_point,VPsat_air){var vP_air=0.6113*mathjs.exp(5423*(1/273.15-1/(dew_point+273.15)));var rH=vP_air/(VPsat_air/1000);return rH});omni.define("VPD_from_dew_point_wet_bulb",function(dew_point,VPsat_air){var vP_air=0.6113*Math.exp(5423*(1/273.15-1/(dew_point+273.15)));var vPD=VPsat_air-vP_air*1000;if(isNaN(vPD)==0){return vPD}else{return-Infinity}});//# sourceURL=customJs.js
        TXT,
        'checks' => [
            ['a' => 'temperature_wet_bulb', 'op' => '<=', 'b' => 'temperature_dry_bulb', 'msg' => 'The wet bulb cannot read above the dry bulb — evaporation cools a wet bulb, so it is always the same temperature or lower.'],
            ['a' => 'dew_point', 'op' => '<=', 'b' => 'temperature_air', 'msg' => 'The dew point cannot sit above the air temperature — that would put the relative humidity over 100 %.'],
        ],
    ],
    'article' => [
        'intro' => 'Vapor pressure deficit works out Relative humidity and Dew point. Units for Relative humidity default to percent and can be changed on the answer itself.',
        'sections' => [
            ['title' => 'How the Vapor pressure deficit calculator works', 'html' => <<<'TXT'
            <p>The Vapor pressure deficit calculator applies one relationship to the value already on the page and reports Relative humidity, Dew point and Canopy temperature.</p><p>In the form&#039;s own words, Vapor pressure deficit (VPD) = − Vp air + Vp leaf.</p><p>What comes back is Relative humidity, Dew point, Canopy temperature and Air temperature — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Do you know the canopy temperature? = 0, Calculate using… = 0, Calculate using… = 0 and Wet-bulb temperature = 3 C — through the same formula and the panel reports <strong>Pressure</strong> = 101325.</p><ul><li><strong>Pressure</strong> = 101325</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Vapor pressure deficit (VPD)</strong> = <code>− Vp air + Vp leaf</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Pressure</strong> = 101325. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Relative humidity lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Vapor pressure deficit (VPD)</strong> = <code>− Vp air + Vp leaf</code></li><li><strong>Vp air</strong> = <code>− Vapor pressure deficit (VPD) + Vp leaf</code></li><li><strong>Vp leaf</strong> = <code>Vapor pressure deficit (VPD) + Vp air</code></li><li><strong>Vp dew point</strong> = <code>− Vapor pressure deficit (VPD) + Vp leaf</code></li><li><strong>Intermediate vp leaf</strong> = <code>ln((50 ÷ 30539) × Vp leaf)</code></li><li><strong>Canopy temperature</strong> = <code>− 1186500 × Intermediate vp leaf ÷ (5000 × Intermediate vp leaf − 86347)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Vapor pressure deficit (VPD)</strong> = <code>− Vp air + Vp leaf</code> — the form to use when Vp air and Vp leaf are the values you have.</li><li><strong>Vp air</strong> = <code>− Vapor pressure deficit (VPD) + Vp leaf</code> — the form to use when Vapor pressure deficit (VPD) and Vp leaf are the values you have.</li><li><strong>Vp leaf</strong> = <code>Vapor pressure deficit (VPD) + Vp air</code> — the form to use when Vp air and Vapor pressure deficit (VPD) are the values you have.</li><li><strong>Vapor pressure deficit (VPD)</strong> = <code>− Vp dew point + Vp leaf</code> — the form to use when Vp dew point and Vp leaf are the values you have.</li><li><strong>Vp dew point</strong> = <code>− Vapor pressure deficit (VPD) + Vp leaf</code> — the form to use when Vapor pressure deficit (VPD) and Vp leaf are the values you have.</li><li><strong>Vp leaf</strong> = <code>Vapor pressure deficit (VPD) + Vp dew point</code> — the form to use when Vapor pressure deficit (VPD) and Vp dew point are the values you have.</li><li><strong>Intermediate vp leaf</strong> = <code>ln((50 ÷ 30539) × Vp leaf)</code> — the form to use when Vp leaf are the values you have.</li><li><strong>Vp leaf</strong> = <code>(30539 ÷ 50) × e^(Intermediate vp leaf)</code> — the form to use when Intermediate vp leaf are the values you have.</li></ul><p>Any one of Vapor pressure deficit (VPD), Vp air and Vp leaf can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => ''],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Relative humidity, Dew point and Canopy temperature are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If the measured values is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Enter them and press Calculate.</strong> Type the values into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Relative humidity in perc with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Relative humidity is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent, Celsius and kilopascals and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes the values you enter are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/hardy-weinberg-recessive-homozygote">Hardy–Weinberg from the Recessive Homozygote Frequency Calcula</a>, <a href="/biology/hatch-rate">Hatch Rate Calculator</a> and <a href="/biology/height-to-finger-length">Height to Finger Length Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>Neighbouring pages resolve the parts of the same job that Vapor pressure deficit leaves alone. Knowing which is which saves running the wrong one:</p><p>Worth opening next: <a href="/biology/hardy-weinberg-recessive-homozygote">Hardy–Weinberg from the Recessive Homozygote Frequency Calcula</a>, <a href="/biology/hatch-rate">Hatch Rate Calculator</a> and <a href="/biology/height-to-finger-length">Height to Finger Length Calculator</a>. They follow the same pattern as this page (form, formula, worked example, answer), so a reader who understands one understands the others.</p><p>Using the page that already answers the question you have is better than adapting this one: the formula and the units will match what you expect, and the worked example will be about your case.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Vapor pressure deficit is a number to act on, so the useful question is what to do with Relative humidity (perc), Dew point (C) and Canopy temperature (C) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down the values you used alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
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
