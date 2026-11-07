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
    'meta' => ['title' => 'Vapor pressure deficit: Formula, Steps & Results', 'description' => 'The Vapor pressure deficit calculator turns the air temperature, the dry-bulb temperature and more into <strong>vp air</strong>. The Vapor pressure deficit…', 'h1' => 'Vapor pressure deficit Calculator', 'updated' => '2026-08-12'],
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
                                [
                                    't' => 'v',
                                    'n' => 'temperature_wet_bulb',
                                    'vt' => 'numerical',
                                    'l' => 'Wet-bulb temperature',
                                    'us' => '40',
                                    'du' => 'C',
                                ],
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
                                    'l' => 'VPD of air',
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
                                    'l' => 'VPD of air',
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
                                    'l' => 'VPD of air',
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
                                    'n' => 'dew_point_2',
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
    ],
    'article' => [
        'intro' => 'The Vapor pressure deficit calculator turns the air temperature, the dry-bulb temperature and more into <strong>vp air</strong>.',
        'sections' => [
            ['title' => 'How does the Vapor pressure deficit calculator work?', 'html' => <<<'TXT'
            <p>The Vapor pressure deficit calculator takes the values in the form, applies the relationship described below and reports <strong>vp air</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the calculate using (Setup) and the calculate using (Setup)); then you type in the air temperature, the dry-bulb temperature, the wet-bulb temperature and the VPD of air (Result).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as no and yes. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 3 options, such as relative humidity, dew point and wet bulb temperature. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 2 options, such as relative humidity and dew point. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in Celsius. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in Celsius. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in Celsius. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in kilopascals. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in kilopascals. The unit chip switches it to any of the 28 supported units.</li><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in kilopascals. The unit chip switches it to any of the 28 supported units.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li></ul><p>3 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Calculate using (Setup)</strong></td><td>One of 3 options, such as relative humidity, dew point and wet bulb temperature.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Calculate using (Setup)</strong></td><td>One of 2 options, such as relative humidity and dew point.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Relative humidity (Inputs)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Dew point (Inputs)</strong></td><td>A measured quantity, 28 units available.</td><td>Celsius</td><td>Calculated</td></tr><tr><td><strong>Canopy temperature</strong></td><td>A measured quantity, 28 units available.</td><td>Celsius</td><td>Calculated</td></tr><tr><td><strong>Air temperature</strong></td><td>A measured quantity, 28 units available.</td><td>Celsius</td><td>You supply it</td></tr><tr><td><strong>Dry-bulb temperature</strong></td><td>A measured quantity, 28 units available.</td><td>Celsius</td><td>You supply it</td></tr><tr><td><strong>Wet-bulb temperature</strong></td><td>A measured quantity, 28 units available.</td><td>Celsius</td><td>You supply it</td></tr><tr><td><strong>VPD of air (Result)</strong></td><td>A measured quantity, 28 units available.</td><td>kilopascals</td><td>You supply it</td></tr><tr><td><strong>VPD of air (Result)</strong></td><td>A measured quantity, 28 units available.</td><td>kilopascals</td><td>Calculated</td></tr><tr><td><strong>VPD of air (Result)</strong></td><td>A measured quantity, 28 units available.</td><td>kilopascals</td><td>Calculated</td></tr><tr><td><strong>Dew point (Result)</strong></td><td>A measured quantity, 28 units available.</td><td>Celsius</td><td>Calculated</td></tr><tr><td><strong>Relative humidity (Result)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Vapor pressure deficit (VPD) (Result)</strong></td><td>A measured quantity, 28 units available.</td><td>kilopascals</td><td>Calculated</td></tr><tr><td><strong>Vapor pressure deficit (VPD) (Result)</strong></td><td>A measured quantity, 28 units available.</td><td>kilopascals</td><td>You supply it</td></tr><tr><td><strong>Vpsat air</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Alpha</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Relative humidity from dew point</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Pressure</strong></td><td>A measured quantity, 28 units available.</td><td>kilopascals</td><td>You supply it</td></tr><tr><td><strong>Vpsat air dry bulb</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Intermediate vp air dry bulb</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Vp air</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Vp leaf</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Vp dew point</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr></tbody></table><p>The table lists the first 24 of 27 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'The formula behind the Vapor pressure deficit calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Vp air</span><span class="formula-eq">=</span><span class="formula-rhs">-vapor pressure deficit (VPD) + vp leaf</span></div><div class="formula-row"><span class="formula-lhs">Vapor pressure deficit (VPD)</span><span class="formula-eq">=</span><span class="formula-rhs">-vp dew point + vp leaf</span></div><div class="formula-row"><span class="formula-lhs">Intermediate vp leaf</span><span class="formula-eq">=</span><span class="formula-rhs">the natural log of ((50 ÷ 30539) × vp leaf)</span></div><div class="formula-row"><span class="formula-lhs">Intermediate vp leaf</span><span class="formula-eq">=</span><span class="formula-rhs">(86347 ÷ 500) × canopy temperature ÷ (10 × canopy temperature + 2373)</span></div><div class="formula-row"><span class="formula-lhs">Vp air</span><span class="formula-eq">=</span><span class="formula-rhs">(30539 ÷ 50) × relative humidity × the exponential of (intermediate vp air)</span></div><div class="formula-row"><span class="formula-lhs">Intermediate vp air</span><span class="formula-eq">=</span><span class="formula-rhs">(86347 ÷ 500) × air temperature ÷ (10 × air temperature + 2373)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Take <strong>Do you know the canopy temperature?</strong> set to No, <strong>Calculate using</strong> set to Relative humidity and <strong>Vapor pressure deficit (VPD)</strong> = 10 kPa. The calculator returns <strong>Canopy temperature</strong> = -45.6381 °C.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Canopy temperature</strong> = -45.6381 °C should be roughly the size you expected from <strong>Do you know the canopy temperature?</strong> set to No and <strong>Calculate using</strong> set to Relative humidity.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in kilopascals, and convertible to any of the 28 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in Celsius, and convertible to any of the 28 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in Celsius, and convertible to any of the 28 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in kilopascals, and convertible to any of the 28 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in Celsius, and convertible to any of the 28 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>%, opening in percent</li><li>Temperature, opening in Celsius</li><li>Temperature, opening in Celsius</li><li>Temperature, opening in Celsius</li><li>Temperature, opening in Celsius</li><li>Temperature, opening in Celsius</li><li>Pressure, opening in kilopascals</li><li>Pressure, opening in kilopascals</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Vapor pressure deficit calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 4 figures keep coming back — the air temperature, the dry-bulb temperature and the wet-bulb temperature — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/vegetable-seed">Vegetable seed</a>, <a href="/biology/vegetable-yield">Vegetable yield</a> and <a href="/biology/wastewater">Wastewater</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Vapor pressure deficit calculator work out?', 'a' => <<<'TXT'
            It returns vp air, derived from the air temperature, the dry-bulb temperature and the wet-bulb temperature. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Vapor pressure deficit calculator?', 'a' => <<<'TXT'
            The form asks for the air temperature, the dry-bulb temperature, the wet-bulb temperature and the VPD of air, which is 12 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter relative humidity (Inputs) in a different unit?', 'a' => <<<'TXT'
            Yes. Relative humidity (Inputs) opens in percent and the chip beside it offers 6 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (3 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Canopy temperature = -45.6381 °C. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Vapor pressure deficit calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/vegetable-seed', 'name' => 'Vegetable seed'],
            ['path' => '/biology/vegetable-yield', 'name' => 'Vegetable yield'],
            ['path' => '/biology/wastewater', 'name' => 'Wastewater'],
        ],
    ],
];
