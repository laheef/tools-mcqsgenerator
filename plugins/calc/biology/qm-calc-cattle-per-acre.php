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
    'meta' => ['title' => 'Cattle per acre Calculator — Formula, Units & Example', 'description' => 'Cattle per acre reports estimated forage yield and monthly forage available. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Cattle per acre Calculator', 'updated' => '2026-08-06'],
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
                                ['t' => 'v', 'n' => 'forage_production_lb', 'vt' => 'numerical', 'l' => 'Estimated forage yield'],
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
                                ['t' => 'v', 'n' => 'total_forage', 'vt' => 'numerical', 'l' => 'Total forage available'],
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
        'intro' => <<<'TXT'
        Cattle per acre works out Animal unit equivalent from Cattle type, Pasture area and Do you know the forage production of your field?. The arithmetic is the whole method: animal unit equivalent is worked out from cattle type by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Cattle per acre calculator works', 'html' => <<<'TXT'
            <p>The Cattle per acre calculator applies one relationship to 21 numbers and reports Animal unit equivalent.</p><p>In the form&#039;s own words, Estimated forage yield = getForageProductionLb(Annual precipitation, Pasture condition).</p><p>The answers are Animal unit equivalent; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 21 boxes, and nothing else.</p><ul><li><strong>Cattle type</strong> — a plain number, no unit</li><li><strong>Pasture area</strong> — in acres</li><li><strong>Do you know the forage production of your field?</strong> — a plain number, no unit</li><li><strong>Annual precipitation</strong> — a plain number, no unit</li><li><strong>Pasture condition</strong> — a plain number, no unit</li><li><strong>Estimated forage yield</strong> — in kilograms</li><li><strong>Estimated forage yield</strong> — in kilograms</li><li><strong>AUM conversion ratio</strong> — in kilograms. According to NRCS, 1 AUM equals 915 lb. Other sources give the values between 760 and 930 lb.</li><li><strong>Estimated forage yield</strong> — in acres</li><li><strong>Estimated forage yield</strong> — in acres</li><li><strong>Utilization rate</strong> — in percent. The utilization rate for native pastures is usually 25-50%. The tame pasture utilization rate varies between 50-75%.&amp;nbsp;</li><li><strong>Monthly forage available</strong> — in kilograms. The amount of forage that can be yielded concerning the utilization rate.</li><li><strong>Monthly forage available</strong> — in kilograms. The amount of forage that can be yielded concerning the utilization rate.</li><li><strong>Total forage available</strong> — in kilograms</li><li><strong>Total forage available</strong> — in kilograms</li><li><strong>Total forage available</strong> — in AUM</li><li><strong>Total forage available</strong> — in AUM</li><li><strong>Total cattle number</strong> — a plain number, no unit. Interpreted as a single head of cattle, or a cow and calf pair, depending on the chosen option.</li><li><strong>Total cattle number</strong> — a plain number, no unit. Interpreted as a single head of cattle, or a cow and calf pair, depending on the chosen option.</li><li><strong>Cattle per area unit</strong> — in acres</li><li><strong>Cattle per area unit</strong> — in acres</li></ul><p>What you get back is Animal unit equivalent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Pasture area lists 24 options and opens on acres. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Estimated forage yield</strong> = <code>getForageProductionLb(Annual precipitation, Pasture condition)</code></li><li><strong>Monthly forage available</strong> = <code>getForageOutput(Annual precipitation, Pasture condition, Utilization rate)</code></li><li><strong>Utilization rate</strong> = <code>Monthly forage available ÷ Estimated forage yield</code></li><li><strong>AUM conversion ratio</strong> = <code>Estimated forage yield ÷ Estimated forage yield</code></li><li><strong>Total forage available</strong> = <code>getTotalForage(Annual precipitation, Pasture condition, Utilization rate, Pasture area)</code></li><li><strong>Pasture area</strong> = <code>Total forage available ÷ Monthly forage available</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Estimated forage yield</strong> = <code>getForageProductionLb(Annual precipitation, Pasture condition)</code> — the form to use when Pasture condition and Annual precipitation are the values you have.</li><li><strong>Estimated forage yield</strong> = <code>getForageProductionAum(Annual precipitation, Pasture condition)</code> — the form to use when Pasture condition and Annual precipitation are the values you have.</li><li><strong>Monthly forage available</strong> = <code>getForageOutput(Annual precipitation, Pasture condition, Utilization rate)</code> — the form to use when Pasture condition, Annual precipitation and Utilization rate are the values you have.</li><li><strong>Monthly forage available</strong> = <code>Estimated forage yield × Utilization rate</code> — the form to use when Estimated forage yield and Utilization rate are the values you have.</li><li><strong>Estimated forage yield</strong> = <code>Monthly forage available ÷ Utilization rate</code> — the form to use when Monthly forage available and Utilization rate are the values you have.</li><li><strong>Utilization rate</strong> = <code>Monthly forage available ÷ Estimated forage yield</code> — the form to use when Monthly forage available and Estimated forage yield are the values you have.</li><li><strong>AUM conversion ratio</strong> = <code>Estimated forage yield ÷ Estimated forage yield</code> — the form to use when Estimated forage yield and Estimated forage yield are the values you have.</li><li><strong>Estimated forage yield</strong> = <code>Estimated forage yield ÷ AUM conversion ratio</code> — the form to use when AUM conversion ratio and Estimated forage yield are the values you have.</li></ul><p>Any one of Estimated forage yield, Estimated forage yield and Monthly forage available can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Pasture area, Estimated forage yield and Estimated forage yield carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Animal unit equivalent is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Cattle type left as a guess.</strong> Anything typed into Cattle type is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Pasture area left as a guess.</strong> Anything typed into Pasture area is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Cattle type to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Cattle type, Pasture area, Do you know the forage production of your field? and Annual precipitation ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Cattle type — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Animal unit equivalent against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Animal unit equivalent is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover acres, kilograms and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Cattle type, Pasture area and Do you know the forage production of your field? and the number you are missing is Animal unit equivalent.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/base-pair-to-kda">Base Pair to kDa Calculator</a>, <a href="/biology/bca-assay-calculator">BCA Assay (standard curve) Calculator</a> and <a href="/biology/beer-lambert-a280-protein-concentration">Beer-Lambert A280 Protein Concentration Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Cattle per acre is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Cattle per acre is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Cattle type, Pasture area, Do you know the forage production of your field? and Annual precipitation beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cattle per acre calculator work out?', 'a' => <<<'TXT'
            Animal unit equivalent, from Pasture condition and Annual precipitation. The relationship is Estimated forage yield = getForageProductionLb(Annual precipitation, Pasture condition).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cattle type, Pasture area (acres), Do you know the forage production of your field?, Annual precipitation, Pasture condition. Enter cattle type, pasture area and do you know the forage production of your field?; Animal unit equivalent is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Estimated forage yield, Estimated forage yield, Monthly forage available and Monthly forage available blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Animal unit equivalent is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Cattle type blank and the page solves for it, reporting Animal unit equivalent instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Animal unit equivalent keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/base-pair-to-kda', 'name' => 'Base Pair to kDa Calculator'],
            ['path' => '/biology/bca-assay-calculator', 'name' => 'BCA Assay (standard curve) Calculator'],
            ['path' => '/biology/beer-lambert-a280-protein-concentration', 'name' => 'Beer-Lambert A280 Protein Concentration Calculator'],
        ],
        'authors' => [],
    ],
];
