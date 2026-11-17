<?php

/**
 * Healthy coffee
 * /food/healthy-coffee
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Healthy coffee',
    'meta' => ['title' => 'Healthy coffee Calculator: Free, With Steps', 'description' => 'Compare coffee intake with the calculator’s stated caffeine assumptions and serving sizes. Check serving sizes and labels before relying on the estimate.', 'h1' => 'Healthy coffee Calculator', 'updated' => '2026-07-28'],
    'raw' => [
        'vars' => [
            'addon1_score' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'j-60xsx2tKnsCAdMVBicC', 'c' => null],
                ],
                'ds' => '4l8Ovq8Kv_p-8yU4QjHEd',
            ],
            'addon2_score' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'x8PnZeS8uMELvzzxUFw8K', 'c' => null],
                ],
                'ds' => 'zIzASKwsoLdsrvYAwL8tk',
            ],
            'brewing_options' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'brewing_score' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'gEhJnyTTIRgiFR2VJzQW-', 'c' => null],
                ],
                'ds' => 'pglw638JF-Sp9LelxW8ER',
            ],
            'brewing_score_instant' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'fo0PLy1Rmb4WTgQOfUayy', 'c' => null],
                ],
                'ds' => 'WiqyESq8JFyecdxemZRoR',
            ],
            'cups_options' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'cups_score' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'C7CD-ynmhsjneDIypO2yM', 'c' => null],
                ],
                'ds' => 'q1C07Py9uy1M8q9Jk2rGn',
            ],
            'roast_options' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'roast_score' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'UE00tK9B3aaAkf_rGeOS7', 'c' => null],
                ],
                'ds' => 'OWUicpwgNqzO4rtG-99Ld',
            ],
            'total_score' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'VGT0zm_4Z5HQ8dcvohEzZ',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'This tool allows you to calculate how healthy your daily coffee habits are '],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'tlxiAI5gYxu-00KP_E2uX',
                'title' => 'Your coffee habits',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'cups_score',
                                    'vt' => 'valueSelect',
                                    'l' => 'How many cups fuel you?',
                                    'ds' => 'q1C07Py9uy1M8q9Jk2rGn',
                                    'opts' => [
                                        ['C7CD-ynmhsjneDIypO2yM', '1 per day', '40'],
                                        ['PQuvEMEsUzZ6j_zU40Zfc', '2-3 per day', '50'],
                                        ['Ow4tE5M7sp7chjkSsriXW', '4-5 per day', '40'],
                                        ['8j0B8JsMxeJtg0Dol_24q', '6+ per day', '20'],
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
                                    'n' => 'roast_score',
                                    'vt' => 'valueSelect',
                                    'l' => 'Your bean and roast type is...',
                                    'ds' => 'OWUicpwgNqzO4rtG-99Ld',
                                    'opts' => [
                                        ['UE00tK9B3aaAkf_rGeOS7', 'Generic ground beans', '25'],
                                        ['qcDySGeFV_CO2-_N0ggOO', 'Instant coffee', '15'],
                                        ['PqLAlKX2b6G0Y9KjX_wBf', 'Arabica dark roast', '25'],
                                        ['YHWPtf7eYUMTD1dg5sVdF', 'Arabica medium roast', '30'],
                                        ['N7X_RH7zNOoYwPR3pzLw7', 'Arabica light roast', '20'],
                                        ['LPaoM6P2TvyaA2aiXp1uz', 'Robusta dark roast', '20'],
                                        ['U-7Xbxt3Ca6Sj5_deoKg2', 'Robusta medium roast', '30'],
                                        ['Kw7OEDHoo5A5OBUBaraiF', 'Robusta light roast', '25'],
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
                                    'n' => 'brewing_score',
                                    'vt' => 'valueSelect',
                                    'l' => 'What\'s your brew?',
                                    'ds' => 'pglw638JF-Sp9LelxW8ER',
                                    'opts' => [
                                        ['gEhJnyTTIRgiFR2VJzQW-', 'Drip', '15'],
                                        ['pitLsdGJZmPfKYPjty9C5', 'Espresso machine', '10'],
                                        ['92LE-3MdCTiNrsZIH-Ve_', 'Simple infusion', '10'],
                                        ['_9hacDLn_v2GsOp5oXVGo', 'French press', '10'],
                                        ['E5SFZfxTceTkeHqi9l0Qn', 'Aeropress', '20'],
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
                                    'n' => 'brewing_score_instant',
                                    'vt' => 'valueSelect',
                                    'l' => 'What\'s your brew?',
                                    'h' => 'Simple infusion is the only possible brewing method for instant coffee.',
                                    'ds' => 'WiqyESq8JFyecdxemZRoR',
                                    'opts' => [
                                        ['fo0PLy1Rmb4WTgQOfUayy', 'Simple infusion', '10'],
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
                                    'n' => 'addon1_score',
                                    'vt' => 'valueSelect',
                                    'l' => 'Do you add milk or creamer?',
                                    'ds' => '4l8Ovq8Kv_p-8yU4QjHEd',
                                    'opts' => [
                                        ['j-60xsx2tKnsCAdMVBicC', 'No', '0'],
                                        ['kdps1ioxRVvqBp0VzgEyu', 'Yes, cow\'s milk', '-15'],
                                        ['U-7hELBs_cjOAoVCxXlv_', 'Yes, plant-based milk', '-10'],
                                        ['oHrvADIxcbBkRZkoqAdUE', 'Yes, cream', '-30'],
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
                                    'n' => 'addon2_score',
                                    'vt' => 'valueSelect',
                                    'l' => 'Do you add sugar or syrup?',
                                    'ds' => 'zIzASKwsoLdsrvYAwL8tk',
                                    'opts' => [
                                        ['x8PnZeS8uMELvzzxUFw8K', 'None for me', '0'],
                                        ['quGDHHaCZHeIePgE7iX4m', 'A teaspoon is enough', '-15'],
                                        ['Z1VhVXZwyBXFEwcX3g_y2', 'I want 2 or more teaspoons', '-30'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'YSx6CQpNNQVoHSB-rSieC',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'total_score',
                                    'vt' => 'numerical',
                                    'l' => 'Coffee score',
                                    'suf' => '/100',
                                    'oo' => 1,
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
                                        [null, 'Something went wrong. Please check the inputs or reload the calculator.'],
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
                                        ['total_score >= -200 and total_score <= 0', <<<'TXT'
                                         Your coffee-drinking habits are not healthy, and you should improve them. It is okay to have treats from time to time (life is to be enjoyed ), but let's try to make our daily coffees healthier so that we can live longer and our treats will feel sweeter!  Here are some helpful pointers:
                                        TXT],
                                        ['total_score > 0 and total_score < 15', <<<'TXT'
                                        Ouch! ‍ Those are the least healthy choices. Please enjoy sporadically to decrease your risk of diabetes, stroke, and other possible health issues. Here is how you can do better! 
                                        TXT],
                                        ['total_score >= 15 and total_score < 55', <<<'TXT'
                                        Hum... you could do worse... but you can also do better! Here is how you can improve your score to obtain more of the protective effects against diseases such as diabetes, cancer, and heart disease ‍:
                                        TXT],
                                        ['total_score >= 55 and total_score < 70', <<<'TXT'
                                        That is not bad!  You are on the right track. Here is how you can benefit more from the protective effects against diseases such as diabetes, cancer, and cardiovascular diseases :
                                        TXT],
                                        ['total_score >= 70 and total_score < 90', <<<'TXT'
                                        What a great result! You seem to like your coffee healthy   Here is how you can make it even more effective against adverse health effects, such as cardiovascular diseases and diabetes:
                                        TXT],
                                        ['total_score >= 90 and total_score <= 100', 'Those are the healthiest of choices you could make  Here is why you have a good shot at counteracting cancer, diabetes, stroke, etc., with your coffee habits:'],
                                        ['cups_options == 1', <<<'TXT'
                                        Coffee amount: Your caffeine intake is within a healthy range. Add 1 or 2 more cups to your daily intake to get more of coffee's antidiabetic and cardioprotective effects! &nbsp;
                                        TXT],
                                        ['cups_options == 2', 'Coffee amount: Just the perfect amount of coffee health-wise. Well done, you have a lower risk for cardiovascular diseases! &nbsp;'],
                                        ['cups_options == 3', <<<'TXT'
                                        Coffee amount: Your caffeine intake is within the healthy upper range, but reduce your daily intake by 1 or 2 cups to get the maximum health benefits protecting from adverse health conditions, such as diabetes and stroke &nbsp;
                                        TXT],
                                        ['cups_options == 4', 'Coffee amount: Your caffeine intake is above the recommended range and increases your risk for cardiovascular diseases ‍&nbsp;'],
                                        ['roast_options == 1', <<<'TXT'
                                        Beans and roast: This roast and type combination is a healthy choice, as you maintain the maximum antioxidant content at the lower caffeine concentration of dark roasts. Enjoy! &nbsp;
                                        TXT],
                                        ['roast_options == 2', 'Beans and roast: The arabica medium roast is an excellent choice, as it has a healthy balance between antioxidant and caffeine levels! &nbsp;'],
                                        ['roast_options == 3', 'Beans and roast: Consider Robusta light roast for more antioxidants or switching to darker Arabica roasts &nbsp;'],
                                        ['roast_options == 4', 'Beans and roast: Consider switching to Arabica if you prefer dark roasted beans; it has more antioxidants &nbsp;'],
                                        ['roast_options == 5', 'Beans and roast: Great choice! Consider switching to Arabica medium roast for an extra load of antioxidants &nbsp;'],
                                        ['roast_options == 6', <<<'TXT'
                                        Beans and roast: This roast and type combination is a healthy choice; you can get more antioxidants from light Robusta roasts than from Arabica light roasts. Enjoy! &nbsp;
                                        TXT],
                                        ['roast_options == 7', 'Beans and roast: The least healthy option. Consider switching to ground coffee to reduce the exposure to toxic acrylamide &nbsp;'],
                                        ['roast_options == 8', <<<'TXT'
                                        Beans and roast: Ground coffee is a fantastic option If you want to learn which bean and roast type will improve your score, play around with the other options and become a more conscious coffee drinker. &nbsp;
                                        TXT],
                                        ['roast_options != 7 and brewing_options == 1', 'Brewing method: The healthiest brewing method, conserving the most antioxidants and minerals. It\'s also easy to carry and use on the go! &nbsp;'],
                                        ['roast_options != 7 and brewing_options == 2', 'Brewing method: A staple coffee brewing method, conserving many of the antioxidants and minerals present in coffee! &nbsp;'],
                                        ['roast_options == 7 or brewing_options >= 3', <<<'TXT'
                                        Brewing method: More of the anti-inflammatory coffee oils are preserved with these methods, but if you worry about cholesterol, you better switch to filtered coffee. &nbsp;
                                        TXT],
                                        ['addon1_score == -15', 'Milk/Creamer: Milk can impede the absorption of polyphenols and adds additional calories to your coffee &nbsp;'],
                                        ['addon1_score == -10', 'Milk/Creamer: Plant-based milk used for coffee is usually sweetened and thus contributes to the calorie count &nbsp;'],
                                        ['addon1_score == -30', 'Milk/Creamer: Cream adds a significant amount of unhealthy fat and sugar to your beverage &nbsp;'],
                                        ['addon1_score == 0', 'Milk/Creamer: Black coffee is the healthiest. Your coffee habits counteract the development of diabetes, cancer, and cardiovascular issues &nbsp;'],
                                        ['addon2_score == -15', 'Sugar/Syrup: Added sugar will counteract the beneficial effects of coffee on your blood sugar levels'],
                                        ['addon2_score == 0', 'Sugar/Syrup: No sugar is the healthiest way to have your coffee, as it beneficially regulates your blood sugar levels. You\'re sweet enough anyway! '],
                                        ['addon2_score == -30', 'Sugar/Syrup: Added sugar will counteract the beneficial effects of coffee on your blood sugar levels; the more, the worse'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '2Hckee_wH-Z7YCvsGVmvt',
                'title' => 'Hidden',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'cups_options', 'vt' => 'dependent', 'l' => 'How many cups fuel you?'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'roast_options', 'vt' => 'dependent', 'l' => 'Roast options'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'brewing_options', 'vt' => 'dependent', 'l' => 'Brewing options'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => <<<'TXT'
                total_score = cups_score + roast_score + if_else(roast_score > 15, brewing_score, brewing_score_instant) + roundToInteger(0.75*cups_options*(addon1_score + addon2_score))
                TXT,
                'var' => [
                    [
                        'l' => 'total_score',
                        'f' => <<<'TXT'
                        ((roast_score > 15) ? (
                           cups_score + roast_score + roundToInteger((3/4)*cups_options*(addon1_score + addon2_score)) + (brewing_score)
                        )
                        : (
                           cups_score + roast_score + roundToInteger((3/4)*cups_options*(addon1_score + addon2_score)) + (brewing_score_instant)
                        ))
                        TXT,
                        'r' => [
                            'cups_score',
                            'roast_score',
                            'addon1_score',
                            'addon2_score',
                            'brewing_score',
                            'brewing_score_instant',
                            'cups_options',
                        ],
                    ],
                    [
                        'l' => 'cups_score',
                        'f' => <<<'TXT'
                        ((roast_score > 15) ? (
                           -roast_score + total_score - roundToInteger((3/4)*cups_options*(addon1_score + addon2_score)) - (brewing_score)
                        )
                        : (
                           -roast_score + total_score - roundToInteger((3/4)*cups_options*(addon1_score + addon2_score)) - (brewing_score_instant)
                        ))
                        TXT,
                        'r' => [
                            'total_score',
                            'roast_score',
                            'addon1_score',
                            'addon2_score',
                            'brewing_score',
                            'brewing_score_instant',
                            'cups_options',
                        ],
                    ],
                    [
                        'l' => 'roast_score',
                        'f' => <<<'TXT'
                        ((cups_score - total_score + roundToInteger((3/4)*cups_options*(addon1_score + addon2_score)) + (brewing_score_instant) >= -15) ? (
                           -cups_score + total_score - roundToInteger((3/4)*cups_options*(addon1_score + addon2_score)) - (brewing_score_instant)
                        )
                        : (
                           nan
                        ))
                        TXT,
                        'r' => [
                            'total_score',
                            'cups_score',
                            'addon1_score',
                            'addon2_score',
                            'brewing_score',
                            'brewing_score_instant',
                            'cups_options',
                        ],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'q1C07Py9uy1M8q9Jk2rGn' => [
                'name' => 'cups_options_VS',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'C7CD-ynmhsjneDIypO2yM', 'label' => '1 per day', 'value' => '40'],
                    ['uid' => 'PQuvEMEsUzZ6j_zU40Zfc', 'label' => '2-3 per day', 'value' => '50'],
                    ['uid' => 'Ow4tE5M7sp7chjkSsriXW', 'label' => '4-5 per day', 'value' => '40'],
                    ['uid' => '8j0B8JsMxeJtg0Dol_24q', 'label' => '6+ per day', 'value' => '20'],
                ],
            ],
            'OWUicpwgNqzO4rtG-99Ld' => [
                'name' => 'roast_options_VS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'UE00tK9B3aaAkf_rGeOS7', 'label' => 'Generic ground beans', 'value' => '25'],
                    ['uid' => 'qcDySGeFV_CO2-_N0ggOO', 'label' => 'Instant coffee', 'value' => '15'],
                    ['uid' => 'PqLAlKX2b6G0Y9KjX_wBf', 'label' => 'Arabica dark roast', 'value' => '25'],
                    ['uid' => 'YHWPtf7eYUMTD1dg5sVdF', 'label' => 'Arabica medium roast', 'value' => '30'],
                    ['uid' => 'N7X_RH7zNOoYwPR3pzLw7', 'label' => 'Arabica light roast', 'value' => '20'],
                    ['uid' => 'LPaoM6P2TvyaA2aiXp1uz', 'label' => 'Robusta dark roast', 'value' => '20'],
                    ['uid' => 'U-7Xbxt3Ca6Sj5_deoKg2', 'label' => 'Robusta medium roast', 'value' => '30'],
                    ['uid' => 'Kw7OEDHoo5A5OBUBaraiF', 'label' => 'Robusta light roast', 'value' => '25'],
                ],
            ],
            'pglw638JF-Sp9LelxW8ER' => [
                'name' => 'brewing_options_VS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'gEhJnyTTIRgiFR2VJzQW-', 'label' => 'Drip', 'value' => '15'],
                    ['uid' => 'pitLsdGJZmPfKYPjty9C5', 'label' => 'Espresso machine', 'value' => '10'],
                    ['uid' => '92LE-3MdCTiNrsZIH-Ve_', 'label' => 'Simple infusion', 'value' => '10'],
                    ['uid' => '_9hacDLn_v2GsOp5oXVGo', 'label' => 'French press', 'value' => '10'],
                    ['uid' => 'E5SFZfxTceTkeHqi9l0Qn', 'label' => 'Aeropress', 'value' => '20'],
                ],
            ],
            'WiqyESq8JFyecdxemZRoR' => [
                'name' => 'brewing_instant_VS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'fo0PLy1Rmb4WTgQOfUayy', 'label' => 'Simple infusion', 'value' => '10'],
                ],
            ],
            '4l8Ovq8Kv_p-8yU4QjHEd' => [
                'name' => 'addon1_options_VS',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'j-60xsx2tKnsCAdMVBicC', 'label' => 'No', 'value' => '0'],
                    ['uid' => 'kdps1ioxRVvqBp0VzgEyu', 'label' => 'Yes, cow\'s milk', 'value' => '-15'],
                    ['uid' => 'U-7hELBs_cjOAoVCxXlv_', 'label' => 'Yes, plant-based milk', 'value' => '-10'],
                    ['uid' => 'oHrvADIxcbBkRZkoqAdUE', 'label' => 'Yes, cream', 'value' => '-30'],
                ],
            ],
            'zIzASKwsoLdsrvYAwL8tk' => [
                'name' => 'addon2_options_VS',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'x8PnZeS8uMELvzzxUFw8K', 'label' => 'None for me', 'value' => '0'],
                    ['uid' => 'quGDHHaCZHeIePgE7iX4m', 'label' => 'A teaspoon is enough', 'value' => '-15'],
                    ['uid' => 'Z1VhVXZwyBXFEwcX3g_y2', 'label' => 'I want 2 or more teaspoons', 'value' => '-30'],
                ],
            ],
        ],
        'js' => '"use strict";omni.define("roundToInteger",function(x){if(x%1==-0.5){return Math.floor(x)}return Math.round(x)});//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Healthy coffee turns How many cups fuel you?, Your bean and roast type is… and What's your brew? into Coffee score. There is no hidden constant here: change coffee score and how many cups fuel you? moves with it. The main result, Coffee score, is reported in /100.
        TXT,
        'sections' => [
            ['title' => 'How the Healthy coffee calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Healthy coffee: it takes 6 numbers and reports Coffee score.</p><p>What comes back is Coffee score — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs.</p><ul><li><strong>How many cups fuel you?</strong> — a plain number, no unit</li><li><strong>Your bean and roast type is…</strong> — a plain number, no unit</li><li><strong>What&#039;s your brew?</strong> — a plain number, no unit</li><li><strong>What&#039;s your brew?</strong> — a plain number, no unit. Simple infusion is the only possible brewing method for instant coffee.</li><li><strong>Do you add milk or creamer?</strong> — a plain number, no unit</li><li><strong>Do you add sugar or syrup?</strong> — a plain number, no unit</li></ul><p>The answer comes back as Coffee score in /100. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, What&amp;#039;s your brew? = 15, What&amp;#039;s your brew? = 10, Do you add milk or creamer? = 0 and Do you add sugar or syrup? = 0; the answers are <strong>How many cups fuel you?</strong> = 40, <strong>Your bean and roast type is…</strong> = 25 and <strong>Coffee score</strong> = 80 /100.</p><ul><li><strong>How many cups fuel you?</strong> = 40</li><li><strong>Your bean and roast type is…</strong> = 25</li><li><strong>Coffee score</strong> = 80 /100</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>How many cups fuel you?</strong> = 40, <strong>Your bean and roast type is...</strong> = 25 and <strong>Coffee score</strong> = 80 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Coffee score takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><p>Because the equation is written once per variable, the page works in either direction: any one of Coffee score, How many cups fuel you? and Your bean and roast type is… can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double What&#039;s your brew? from 15 to 30, leaving every other box alone. The panel moves from <strong>How many cups fuel you?</strong> 40, <strong>Your bean and roast type is...</strong> 25 and <strong>Coffee score</strong> 80 /100 to <strong>How many cups fuel you?</strong> 40, <strong>Your bean and roast type is...</strong> 25 and <strong>Coffee score</strong> 95 /100.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Coffee score is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>How many cups fuel you? left as a guess.</strong> If How many cups fuel you? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Your bean and roast type is… left as a guess.</strong> If Your bean and roast type is… is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>What&#039;s your brew? left as a guess.</strong> If What&amp;#039;s your brew? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> If How many cups fuel you? is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>How many cups fuel you?</strong> takes a plain number with no unit attached. Change it and Coffee score and Your bean and roast type is… changes with it. Check the field label and unit before calculating.</li><li><strong>Your bean and roast type is…</strong> takes a plain number with no unit attached. Change it and Coffee score and How many cups fuel you? changes with it. Check the field label and unit before calculating.</li><li><strong>What&#039;s your brew?</strong> takes a plain number with no unit attached. Change it and Coffee score, How many cups fuel you? and Your bean and roast type is… changes with it. Check the field label and unit before calculating.</li><li><strong>What&#039;s your brew?</strong> takes a plain number with no unit attached. Simple infusion is the only possible brewing method for instant coffee. Change it and Coffee score, How many cups fuel you? and Your bean and roast type is… changes with it. Check the field label and unit before calculating.</li><li><strong>Do you add milk or creamer?</strong> takes a plain number with no unit attached. Change it and Coffee score, How many cups fuel you? and Your bean and roast type is… changes with it. Check the field label and unit before calculating.</li><li><strong>Do you add sugar or syrup?</strong> takes a plain number with no unit attached. Change it and Coffee score, How many cups fuel you? and Your bean and roast type is… changes with it. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Coffee score</strong> is a plain number and the page's own defaults put it at 80. It is worked out from How many cups fuel you?, Your bean and roast type is…, Do you add milk or creamer? and Do you add sugar or syrup?. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>How many cups fuel you?</th><th>Your bean and roast type is…</th><th>Coffee score</th></tr></thead><tbody><tr><td><strong>What&#039;s your brew?</strong> +10%</td><td>+0%</td><td>+0%</td><td>+1.88%</td></tr><tr><td><strong>What&#039;s your brew?</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, What&#039;s your brew? sits at the top — a ten per cent error in that box shows up as roughly 1.9 per cent in the answer. By contrast, What&#039;s your brew? barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. </p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With What&#039;s your brew? = 7.5, What&#039;s your brew? = 5, Do you add milk or creamer? = 0 and Do you add sugar or syrup? = 0, the answer is <strong>How many cups fuel you?</strong> = 40, <strong>Your bean and roast type is…</strong> = 25 and <strong>Coffee score</strong> = 72.5 /100.</li><li>With What&#039;s your brew? = 45, What&#039;s your brew? = 10, Do you add milk or creamer? = 0 and Do you add sugar or syrup? = 0, the answer is <strong>How many cups fuel you?</strong> = 40, <strong>Your bean and roast type is…</strong> = 25 and <strong>Coffee score</strong> = 110 /100.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Coffee score follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: How many cups fuel you?, Your bean and roast type is… and What&#039;s your brew? measured, Coffee score wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/coffee">Coffee</a>, <a href="/food/coffee-kick">Coffee kick</a> and <a href="/food/coffee-footprint">Coffee footprint</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Healthy coffee calculator work out?', 'a' => 'Coffee score, from How many cups fuel you?, Your bean and roast type is…, Do you add milk or creamer? and Do you add sugar or syrup?.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            How many cups fuel you?, Your bean and roast type is…, What's your brew?, What's your brew?, Do you add milk or creamer?. Fill how many cups fuel you?, your bean and roast type is… and what's your brew? and leave Coffee score empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Coffee score, How many cups fuel you? and Your bean and roast type is… can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'Are the Healthy coffee results exact?', 'a' => 'No. Nutrition and caffeine vary with brands, recipes, preparation and serving size. Use the product label for a closer estimate; this calculator is not individualized health advice.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Coffee score is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With How many cups fuel you? left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Coffee score at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/food/coffee', 'name' => 'Coffee'],
            ['path' => '/food/coffee-kick', 'name' => 'Coffee kick'],
            ['path' => '/food/coffee-footprint', 'name' => 'Coffee footprint']
        ],
    ],
];
