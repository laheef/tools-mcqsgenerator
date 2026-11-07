<?php

/**
 * Cattle per acre
 * /biology/cattle-per-acre
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cattle per acre',
    'meta' => ['title' => 'Cattle per acre Calculator — Formula, Units & Example', 'description' => 'The Cattle per acre calculator turns the pasture area, the estimated forage yield and the utilization rate into <strong>estimated forage yield</strong>.', 'h1' => 'Cattle per acre Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'animal_unit_equivalent' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'area' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'cattle_per_area' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'cattle_per_area_custom' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'cattle_type' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '1nCIeaMQcMhT2AKbPDh05', 'c' => null],
                ],
                'ds' => 'p23Mu0GyWZ1hHeLL8NRaC',
            ],
            'forage_available' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'forage_available_custom' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'forage_production_aum' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'forage_production_aum_custom' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'forage_production_custom' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'forage_production_lb' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'lb_to_aum_ratio' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '415', 'c' => null],
                    ['v' => '915', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'pasture_condition' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'i9XrMbspwGd3j6ZAXWXOJ', 'c' => null],
                ],
                'ds' => 'N_YBFNh2eikisIvSEJQd9',
            ],
            'pasture_yes_no' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'r2mka17os17QNTCyOOCGR', 'c' => null],
                ],
                'ds' => 'EIyBRu8yePDDECGg_EB8d',
            ],
            'precipitation_zone' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ydFLbmKUN2DOMNaWYsu1J', 'c' => null],
                ],
                'ds' => 'bu7cSWkLHbRDzwH7qF6OX',
            ],
            'total_animal_units_month' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_animal_units_month_custom' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_cattle' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'total_cattle_custom' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'total_forage' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_forage_custom' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'utilization_rate' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '50', 'c' => null],
                ],
            ],
        ],
        'groups' => [
            [
                'uid' => 'JeLLWnEnmHIL2PkiJUqNp',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'cattle_type',
                                    'vt' => 'valueSelect',
                                    'l' => 'Cattle type',
                                    'ds' => 'p23Mu0GyWZ1hHeLL8NRaC',
                                    'opts' => [
                                        ['1nCIeaMQcMhT2AKbPDh05', 'Cow, 1000 lbs with calf to 4 months', '1'],
                                        ['DY_u5XQp9BpVOGcdErHV8', 'Cow, 1300 lbs with calf to 4 months', '1.3'],
                                        ['P_vSe7OgXE5tYjQ3HKmjF', 'Cow, 1400 lbs with calf to 4 months', '1.4'],
                                        ['17VQZqtbJvyBdEuh6RMCa', 'Cow, 1500 lbs with calf to 4 months', '1.5'],
                                        ['PwxYRbdX43EWbCTmr3iRb', 'Yearling steer', '0.85'],
                                        ['T6ZsuAaOIyHdZ9OCda36l', 'Heifers, 700 lbs', '0.8'],
                                        ['5wSvNRK-EAdQNRjQAZZ3e', 'Bulls, mature (1700 lbs)', '1.7'],
                                        ['Gw2CbzxvNQX4aDkcpuLwh', 'Custom', ''],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'animal_unit_equivalent', 'vt' => 'dependent', 'l' => 'Animal unit equivalent'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'area',
                                    'vt' => 'numerical',
                                    'l' => 'Pasture area',
                                    'us' => '28',
                                    'du' => 'acre',
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
                                    'n' => 'pasture_yes_no',
                                    'vt' => 'valueSelect',
                                    'l' => 'Do you know the forage production of your field?',
                                    'ds' => 'EIyBRu8yePDDECGg_EB8d',
                                    'opts' => [
                                        ['r2mka17os17QNTCyOOCGR', 'No, estimate it for me.', '0'],
                                        ['HHp9pc_-Dac-oc8EUCZ5F', 'Yes, I\'ll enter it myself.', '1'],
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
                                    'n' => 'precipitation_zone',
                                    'vt' => 'valueSelect',
                                    'l' => 'Annual precipitation',
                                    'ds' => 'bu7cSWkLHbRDzwH7qF6OX',
                                    'opts' => [
                                        ['05iUFk9jDIpbQDGQVg2L8', '250-350 mm', '0'],
                                        ['ydFLbmKUN2DOMNaWYsu1J', '350-450 mm', '1'],
                                        ['GUZYSk95quQ_a1ssvQ9_G', '450-550 mm', '2'],
                                        ['v11uSWAa2E70sBJY8joND', '550-650 mm', '3'],
                                        ['jy98cm-A4hbC-pDS3lI6X', 'Irrigation', '4'],
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
                                    'n' => 'pasture_condition',
                                    'vt' => 'valueSelect',
                                    'l' => 'Pasture condition',
                                    'ds' => 'N_YBFNh2eikisIvSEJQd9',
                                    'opts' => [
                                        ['mS6LBGPwpsD35HaalHw-2', 'Excellent', '0'],
                                        ['i9XrMbspwGd3j6ZAXWXOJ', 'Good', '1'],
                                        ['oaZEiqCdBefuEgUIynt9r', 'Fair', '2'],
                                        ['0wX1rB8zOC0JS6Zh9Kzui', 'Poor', '3'],
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
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Check the table in the "Tame pasture condition classes explanations" section of the article for more detailed explanation.'],
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
                                    'n' => 'forage_production_lb',
                                    'vt' => 'numerical',
                                    'l' => 'Estimated forage yield',
                                    'us' => '22',
                                    'du' => 'kg',
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
                                    'n' => 'forage_production_custom',
                                    'vt' => 'numerical',
                                    'l' => 'Estimated forage yield',
                                    'us' => '22',
                                    'du' => 'kg',
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
                                    'n' => 'lb_to_aum_ratio',
                                    'vt' => 'numerical',
                                    'l' => 'AUM conversion ratio',
                                    'h' => 'According to NRCS, 1 AUM equals 915 lb. Other sources give the values between 760 and 930 lb.',
                                    'us' => '22',
                                    'du' => 'kg',
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
                                    'n' => 'forage_production_aum',
                                    'vt' => 'numerical',
                                    'l' => 'Estimated forage yield',
                                    'us' => '28',
                                    'du' => 'acre',
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
                                    'n' => 'forage_production_aum_custom',
                                    'vt' => 'numerical',
                                    'l' => 'Estimated forage yield',
                                    'us' => '28',
                                    'du' => 'acre',
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
                                    'n' => 'utilization_rate',
                                    'vt' => 'numerical',
                                    'l' => 'Utilization rate',
                                    'h' => 'The utilization rate for native pastures is usually 25-50%. The tame pasture utilization rate varies between 50-75%.&nbsp;',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'UwZdJ8Ct2Kc-P5wh7toj3',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'forage_available',
                                    'vt' => 'numerical',
                                    'l' => 'Monthly forage available',
                                    'h' => 'The amount of forage that can be yielded concerning the utilization rate.',
                                    'us' => '22',
                                    'du' => 'kg',
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
                                    'n' => 'forage_available_custom',
                                    'vt' => 'numerical',
                                    'l' => 'Monthly forage available',
                                    'h' => 'The amount of forage that can be yielded concerning the utilization rate.',
                                    'us' => '22',
                                    'du' => 'kg',
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
                                    'n' => 'total_forage',
                                    'vt' => 'numerical',
                                    'l' => 'Total forage available',
                                    'us' => '22',
                                    'du' => 'kg',
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
                                    'n' => 'total_forage_custom',
                                    'vt' => 'numerical',
                                    'l' => 'Total forage available',
                                    'us' => '22',
                                    'du' => 'kg',
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
                                    'n' => 'total_animal_units_month',
                                    'vt' => 'numerical',
                                    'l' => 'Total forage available',
                                    'suf' => 'AUM',
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
                                    'n' => 'total_animal_units_month_custom',
                                    'vt' => 'numerical',
                                    'l' => 'Total forage available',
                                    'suf' => 'AUM',
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
                                    'n' => 'total_cattle',
                                    'vt' => 'numerical',
                                    'l' => 'Total cattle number',
                                    'h' => 'Interpreted as a single head of cattle, or a cow and calf pair, depending on the chosen option.',
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
                                    'n' => 'total_cattle_custom',
                                    'vt' => 'numerical',
                                    'l' => 'Total cattle number',
                                    'h' => 'Interpreted as a single head of cattle, or a cow and calf pair, depending on the chosen option.',
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
                                    'n' => 'cattle_per_area',
                                    'vt' => 'numerical',
                                    'l' => 'Cattle per area unit',
                                    'us' => '28',
                                    'du' => 'acre',
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
                                    'n' => 'cattle_per_area_custom',
                                    'vt' => 'numerical',
                                    'l' => 'Cattle per area unit',
                                    'us' => '28',
                                    'du' => 'acre',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'forage_production_lb = getForageProductionLb(precipitation_zone, pasture_condition)',
                'var' => [
                    [
                        'l' => 'forage_production_lb',
                        'f' => 'getForageProductionLb(precipitation_zone, pasture_condition)',
                        'r' => ['pasture_condition', 'precipitation_zone'],
                    ],
                ],
            ],
            [
                'formula' => 'forage_production_aum = getForageProductionAum(precipitation_zone, pasture_condition)',
                'var' => [
                    [
                        'l' => 'forage_production_aum',
                        'f' => 'getForageProductionAum(precipitation_zone, pasture_condition)',
                        'r' => ['pasture_condition', 'precipitation_zone'],
                    ],
                ],
            ],
            [
                'formula' => 'forage_available = getForageOutput(precipitation_zone, pasture_condition, utilization_rate)',
                'var' => [
                    [
                        'l' => 'forage_available',
                        'f' => 'getForageOutput(precipitation_zone, pasture_condition, utilization_rate)',
                        'r' => ['pasture_condition', 'precipitation_zone', 'utilization_rate'],
                    ],
                ],
            ],
            [
                'formula' => 'forage_available_custom = forage_production_custom * utilization_rate',
                'var' => [
                    [
                        'l' => 'forage_available_custom',
                        'f' => 'forage_production_custom*utilization_rate',
                        'r' => ['forage_production_custom', 'utilization_rate'],
                    ],
                    [
                        'l' => 'forage_production_custom',
                        'f' => 'forage_available_custom/utilization_rate',
                        'r' => ['forage_available_custom', 'utilization_rate'],
                    ],
                    [
                        'l' => 'utilization_rate',
                        'f' => 'forage_available_custom/forage_production_custom',
                        'r' => ['forage_available_custom', 'forage_production_custom'],
                    ],
                ],
            ],
            [
                'formula' => 'forage_production_aum_custom = forage_production_custom / lb_to_aum_ratio',
                'var' => [
                    [
                        'l' => 'lb_to_aum_ratio',
                        'f' => 'forage_production_custom/forage_production_aum_custom',
                        'r' => ['forage_production_aum_custom', 'forage_production_custom'],
                    ],
                    [
                        'l' => 'forage_production_aum_custom',
                        'f' => 'forage_production_custom/lb_to_aum_ratio',
                        'r' => ['lb_to_aum_ratio', 'forage_production_custom'],
                    ],
                    [
                        'l' => 'forage_production_custom',
                        'f' => 'forage_production_aum_custom*lb_to_aum_ratio',
                        'r' => ['lb_to_aum_ratio', 'forage_production_aum_custom'],
                    ],
                ],
            ],
            [
                'formula' => 'total_forage = getTotalForage(precipitation_zone, pasture_condition, utilization_rate, area)',
                'var' => [
                    [
                        'l' => 'total_forage',
                        'f' => 'getTotalForage(precipitation_zone, pasture_condition, utilization_rate, area)',
                        'r' => ['area', 'pasture_condition', 'precipitation_zone', 'utilization_rate'],
                    ],
                ],
            ],
            [
                'formula' => 'total_forage_custom = forage_available_custom * area',
                'var' => [
                    [
                        'l' => 'forage_available_custom',
                        'f' => 'total_forage_custom/area',
                        'r' => ['total_forage_custom', 'area'],
                    ],
                    [
                        'l' => 'total_forage_custom',
                        'f' => 'area*forage_available_custom',
                        'r' => ['forage_available_custom', 'area'],
                    ],
                    [
                        'l' => 'area',
                        'f' => 'total_forage_custom/forage_available_custom',
                        'r' => ['forage_available_custom', 'total_forage_custom'],
                    ],
                ],
            ],
            [
                'formula' => 'total_animal_units_month = getTotalForageAum(precipitation_zone, pasture_condition, utilization_rate, area, lb_to_aum_ratio)',
                'var' => [
                    [
                        'l' => 'total_animal_units_month',
                        'f' => 'getTotalForageAum(precipitation_zone, pasture_condition, utilization_rate, area, lb_to_aum_ratio)',
                        'r' => [
                            'area',
                            'lb_to_aum_ratio',
                            'pasture_condition',
                            'precipitation_zone',
                            'utilization_rate',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'total_animal_units_month_custom = total_forage_custom / lb_to_aum_ratio ',
                'var' => [
                    [
                        'l' => 'lb_to_aum_ratio',
                        'f' => 'total_forage_custom/total_animal_units_month_custom',
                        'r' => ['total_animal_units_month_custom', 'total_forage_custom'],
                    ],
                    [
                        'l' => 'total_animal_units_month_custom',
                        'f' => 'total_forage_custom/lb_to_aum_ratio',
                        'r' => ['lb_to_aum_ratio', 'total_forage_custom'],
                    ],
                    [
                        'l' => 'total_forage_custom',
                        'f' => 'lb_to_aum_ratio*total_animal_units_month_custom',
                        'r' => ['lb_to_aum_ratio', 'total_animal_units_month_custom'],
                    ],
                ],
            ],
            [
                'formula' => 'total_cattle = getTotalCattle(precipitation_zone, pasture_condition, utilization_rate, area, lb_to_aum_ratio, animal_unit_equivalent)',
                'var' => [
                    [
                        'l' => 'total_cattle',
                        'f' => 'getTotalCattle(precipitation_zone, pasture_condition, utilization_rate, area, lb_to_aum_ratio, animal_unit_equivalent)',
                        'r' => [
                            'animal_unit_equivalent',
                            'area',
                            'lb_to_aum_ratio',
                            'pasture_condition',
                            'precipitation_zone',
                            'utilization_rate',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'total_cattle_custom = total_animal_units_month_custom / animal_unit_equivalent',
                'var' => [
                    [
                        'l' => 'animal_unit_equivalent',
                        'f' => 'total_animal_units_month_custom/total_cattle_custom',
                        'r' => ['total_animal_units_month_custom', 'total_cattle_custom'],
                    ],
                    [
                        'l' => 'total_animal_units_month_custom',
                        'f' => 'animal_unit_equivalent*total_cattle_custom',
                        'r' => ['animal_unit_equivalent', 'total_cattle_custom'],
                    ],
                    [
                        'l' => 'total_cattle_custom',
                        'f' => 'total_animal_units_month_custom/animal_unit_equivalent',
                        'r' => ['animal_unit_equivalent', 'total_animal_units_month_custom'],
                    ],
                ],
            ],
            [
                'formula' => 'cattle_per_area = getCattlePerArea(precipitation_zone, pasture_condition, utilization_rate, lb_to_aum_ratio, animal_unit_equivalent)',
                'var' => [
                    [
                        'l' => 'cattle_per_area',
                        'f' => 'getCattlePerArea(precipitation_zone, pasture_condition, utilization_rate, lb_to_aum_ratio, animal_unit_equivalent)',
                        'r' => [
                            'animal_unit_equivalent',
                            'lb_to_aum_ratio',
                            'pasture_condition',
                            'precipitation_zone',
                            'utilization_rate',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'total_cattle_custom = cattle_per_area_custom * area',
                'var' => [
                    [
                        'l' => 'cattle_per_area_custom',
                        'f' => 'total_cattle_custom/area',
                        'r' => ['total_cattle_custom', 'area'],
                    ],
                    [
                        'l' => 'total_cattle_custom',
                        'f' => 'area*cattle_per_area_custom',
                        'r' => ['cattle_per_area_custom', 'area'],
                    ],
                    [
                        'l' => 'area',
                        'f' => 'total_cattle_custom/cattle_per_area_custom',
                        'r' => ['cattle_per_area_custom', 'total_cattle_custom'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'N_YBFNh2eikisIvSEJQd9' => [
                'name' => 'pastureCondition',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'mS6LBGPwpsD35HaalHw-2', 'label' => 'Excellent', 'value' => '0'],
                    ['uid' => 'i9XrMbspwGd3j6ZAXWXOJ', 'label' => 'Good', 'value' => '1'],
                    ['uid' => 'oaZEiqCdBefuEgUIynt9r', 'label' => 'Fair', 'value' => '2'],
                    ['uid' => '0wX1rB8zOC0JS6Zh9Kzui', 'label' => 'Poor', 'value' => '3'],
                ],
            ],
            'bu7cSWkLHbRDzwH7qF6OX' => [
                'name' => 'precipitationZone',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '05iUFk9jDIpbQDGQVg2L8', 'label' => '250-350 mm', 'value' => '0'],
                    ['uid' => 'ydFLbmKUN2DOMNaWYsu1J', 'label' => '350-450 mm', 'value' => '1'],
                    ['uid' => 'GUZYSk95quQ_a1ssvQ9_G', 'label' => '450-550 mm', 'value' => '2'],
                    ['uid' => 'v11uSWAa2E70sBJY8joND', 'label' => '550-650 mm', 'value' => '3'],
                    ['uid' => 'jy98cm-A4hbC-pDS3lI6X', 'label' => 'Irrigation', 'value' => '4'],
                ],
            ],
            'EIyBRu8yePDDECGg_EB8d' => [
                'name' => 'pastureYesNo',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'r2mka17os17QNTCyOOCGR', 'label' => 'No, estimate it for me.', 'value' => '0'],
                    ['uid' => 'HHp9pc_-Dac-oc8EUCZ5F', 'label' => 'Yes, I\'ll enter it myself.', 'value' => '1'],
                ],
            ],
            'p23Mu0GyWZ1hHeLL8NRaC' => [
                'name' => 'animalUnitEquivalent',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => '1nCIeaMQcMhT2AKbPDh05', 'label' => 'Cow, 1000 lbs with calf to 4 months', 'value' => '1'],
                    ['uid' => 'DY_u5XQp9BpVOGcdErHV8', 'label' => 'Cow, 1300 lbs with calf to 4 months', 'value' => '1.3'],
                    ['uid' => 'P_vSe7OgXE5tYjQ3HKmjF', 'label' => 'Cow, 1400 lbs with calf to 4 months', 'value' => '1.4'],
                    ['uid' => '17VQZqtbJvyBdEuh6RMCa', 'label' => 'Cow, 1500 lbs with calf to 4 months', 'value' => '1.5'],
                    ['uid' => 'PwxYRbdX43EWbCTmr3iRb', 'label' => 'Yearling steer', 'value' => '0.85'],
                    ['uid' => 'T6ZsuAaOIyHdZ9OCda36l', 'label' => 'Heifers, 700 lbs', 'value' => '0.8'],
                    ['uid' => '5wSvNRK-EAdQNRjQAZZ3e', 'label' => 'Bulls, mature (1700 lbs)', 'value' => '1.7'],
                    ['uid' => 'Gw2CbzxvNQX4aDkcpuLwh', 'label' => 'Custom', 'value' => ''],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";var forageProductionAumDATA=[[0.75,0.5,0.4,0.25],[1.25,0.8,0.6,0.4],[2,1.4,1.1,0.7],[3.3,2.2,1.6,1.1],[7.5,5,3.75,2.5]];var forageProductionLbDATA=[[700,460,370,230],[1150,740,550,370],[1850,1300,1000,650],[3000,2000,1500,1000],[6900,5150,3500,2300]];omni.define("getForageProductionLb",function(precipitation,pastureCondition){return forageProductionLbDATA[precipitation][pastureCondition]});omni.define("getForageProductionAum",function(precipitation,pastureCondition){return forageProductionAumDATA[precipitation][pastureCondition]});omni.define("getForageOutput",function(precipitation,pastureCondition,utilizationRate){return forageProductionLbDATA[precipitation][pastureCondition]*utilizationRate});omni.define("getTotalForage",function(precipitation,pastureCondition,utilizationRate,area){return forageProductionLbDATA[precipitation][pastureCondition]*utilizationRate*area});omni.define("getTotalForageAum",function(precipitation,pastureCondition,utilizationRate,area,lbToAumRatio){return forageProductionLbDATA[precipitation][pastureCondition]*utilizationRate*area/lbToAumRatio});omni.define("getTotalCattle",function(precipitation,pastureCondition,utilizationRate,area,lbToAumRatio,animalUnitEquivalent){return forageProductionLbDATA[precipitation][pastureCondition]*utilizationRate*area/(lbToAumRatio*animalUnitEquivalent)});omni.define("getCattlePerArea",function(precipitation,pastureCondition,utilizationRate,lbToAumRatio,animalUnitEquivalent){return forageProductionLbDATA[precipitation][pastureCondition]*utilizationRate/(lbToAumRatio*animalUnitEquivalent)});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => 'The Cattle per acre calculator turns the pasture area, the estimated forage yield and the utilization rate into <strong>estimated forage yield</strong>.',
        'sections' => [
            ['title' => 'How does the Cattle per acre calculator work?', 'html' => <<<'TXT'
            <p>The Cattle per acre calculator takes the values in the form, applies the relationship described below and reports <strong>estimated forage yield</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the cattle type, the annual precipitation and the pasture condition); then you type in the pasture area, the estimated forage yield (2), the estimated forage yield (4) and the utilization rate.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 8 options, such as cow, 1000 lbs with calf to 4 months, cow, 1300 lbs with calf to 4 months and cow, 1400 lbs with calf to 4 months. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in acres. The unit chip switches it to any of the 24 supported units.</li><li>Pick the option that matches your case — 2 options, such as no, estimate it for me. and yes, I'll enter it myself.. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 5 options, such as 250-350 mm, 350-450 mm and 450-550 mm. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 4 options, such as excellent, good and fair. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in acres. The unit chip switches it to any of the 24 supported units.</li><li>A measured quantity, entered by default in percent. The unit chip switches it to any of the 6 supported units.</li><li>A plain number with no unit attached.</li></ul><p>4 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Cattle type</strong></td><td>One of 8 options, such as cow, 1000 lbs with calf to 4 months, cow, 1300 lbs with calf to 4 months and cow, 1400 lbs with calf to 4 months.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Animal unit equivalent</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Pasture area</strong></td><td>A measured quantity, 24 units available.</td><td>acres</td><td>You supply it</td></tr><tr><td><strong>Annual precipitation</strong></td><td>One of 5 options, such as 250-350 mm, 350-450 mm and 450-550 mm.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Pasture condition</strong></td><td>One of 4 options, such as excellent, good and fair.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Estimated forage yield</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Estimated forage yield (2)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>AUM conversion ratio</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Estimated forage yield (3)</strong></td><td>A measured quantity, 24 units available.</td><td>acres</td><td>Calculated</td></tr><tr><td><strong>Estimated forage yield (4)</strong></td><td>A measured quantity, 24 units available.</td><td>acres</td><td>You supply it</td></tr><tr><td><strong>Utilization rate</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Monthly forage available (Results)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Monthly forage available (Results)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Total forage available (Results)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Total forage available (Results)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Total forage available (Results)</strong></td><td>A number stated in AUM.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Total forage available (Results)</strong></td><td>A number stated in AUM.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Total cattle number (Results)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Total cattle number (Results)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Cattle per area unit (Results)</strong></td><td>A measured quantity, 24 units available.</td><td>acres</td><td>Calculated</td></tr><tr><td><strong>Cattle per area unit (Results)</strong></td><td>A measured quantity, 24 units available.</td><td>acres</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Cattle per acre calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Estimated forage yield</span><span class="formula-eq">=</span><span class="formula-rhs">(annual precipitation, pasture condition)</span></div><div class="formula-row"><span class="formula-lhs">Monthly forage available</span><span class="formula-eq">=</span><span class="formula-rhs">(annual precipitation, pasture condition, utilization rate)</span></div><div class="formula-row"><span class="formula-lhs">Monthly forage available</span><span class="formula-eq">=</span><span class="formula-rhs">estimated forage yield × utilization rate</span></div><div class="formula-row"><span class="formula-lhs">AUM conversion ratio</span><span class="formula-eq">=</span><span class="formula-rhs">estimated forage yield ÷ estimated forage yield</span></div><div class="formula-row"><span class="formula-lhs">Total forage available</span><span class="formula-eq">=</span><span class="formula-rhs">(annual precipitation, pasture condition, utilization rate, pasture area)</span></div><div class="formula-row"><span class="formula-lhs">Monthly forage available</span><span class="formula-eq">=</span><span class="formula-rhs">total forage available ÷ pasture area</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in acres, and convertible to any of the 24 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in acres, and convertible to any of the 24 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Area, opening in acres</li><li>Mass, opening in kilograms</li><li>Mass, opening in kilograms</li><li>Mass, opening in kilograms</li><li>Area, opening in acres</li><li>Area, opening in acres</li><li>%, opening in percent</li><li>Mass, opening in kilograms</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Cattle per acre calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 3 figures keep coming back — the pasture area, the estimated forage yield and the utilization rate — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Keep the units you enter consistent. </li><li>Round only at the end. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/cell-dilution">Cell dilution</a>, <a href="/biology/cell-doubling-time">Cell doubling time</a> and <a href="/biology/cephalexin-for-cats-dosage">Cephalexin for cats dosage</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cattle per acre calculator work out?', 'a' => <<<'TXT'
            It returns estimated forage yield, derived from the pasture area, the estimated forage yield and the utilization rate. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Cattle per acre calculator?', 'a' => <<<'TXT'
            The form asks for the pasture area, the estimated forage yield and the utilization rate, which is 9 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter pasture area in a different unit?', 'a' => <<<'TXT'
            Yes. Pasture area opens in acres and the chip beside it offers 24 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (4 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Animal unit equivalent = 0. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Cattle per acre calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/cell-dilution', 'name' => 'Cell dilution'],
            ['path' => '/biology/cell-doubling-time', 'name' => 'Cell doubling time'],
            ['path' => '/biology/cephalexin-for-cats-dosage', 'name' => 'Cephalexin for cats dosage'],
        ],
    ],
];
