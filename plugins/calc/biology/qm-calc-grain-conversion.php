<?php

/**
 * Grain conversion
 * /biology/grain-conversion
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Grain conversion',
    'meta' => ['title' => 'Grain conversion — Formula, Steps & Examples', 'description' => 'Give the Grain conversion calculator the bushels, the price total and the price per and it returns the answer. The Grain conversion calculator takes the…', 'h1' => 'Grain conversion Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'Amount' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'Amount2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'Bushels' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'Bushels2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'Grain' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'HLuioBrpXSL3iTZADp3tl', 'c' => null],
                ],
                'ds' => 'yQnBv9qHYLnVs_v72yja6',
            ],
            'Grain2' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '8aAxBMDxIaop1eDINyGtI', 'c' => null],
                ],
                'ds' => 'yQnBv9qHYLnVs_v72yja6',
            ],
            'PricePerBushel' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'PricePerBushel2' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'PricePerUnit' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'PricePerUnit2' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'PriceTotal' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'PriceTotal2' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'absolut' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'difference' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'price' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => 'qtm5iZgNZzptO-zEbaXT9'],
        ],
        'groups' => [
            [
                'uid' => 'ivVjOslCp6imDOYL14gat',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'Grain',
                                    'vt' => 'valueSelect',
                                    'l' => 'Agricultural commodity',
                                    'ds' => 'yQnBv9qHYLnVs_v72yja6',
                                    'opts' => [
                                        ['-Bo7QdikwQ1L3Hu32Cc5b', 'Alfalfa seed', '27.2'],
                                        ['LCARt2j5o0I9Jr6xbOgws', 'Barley', '21.8'],
                                        ['vKCqRL-yDNoRhhxK12OKi', 'Beans, Lima (dry)', '25.4'],
                                        ['T0NX-OkSkBc9wAE1ybHtW', 'Beans, Other (dry)', '27.2'],
                                        ['ci7UVUMku4XQkJ0NZYkSs', 'Bluegrass seed', '10'],
                                        ['5hAA3jHotnBOgbAh_LyqQ', 'Broomcorn seed', '21.3'],
                                        ['sl36gzcvc48J98ihHOpgh', 'Buckwheat', '21.8'],
                                        ['unUPW6wFsLnSkKGVlgOcJ', 'Castor beans', '18.6'],
                                        ['Rd4KSD2jp9V4YrWOedoL-', 'Clover seed', '27.2'],
                                        ['HLuioBrpXSL3iTZADp3tl', 'Corn, Ear (husked)', '31.8'],
                                        ['mNUZfOFariw0MYTy9sjd0', 'Corn, Shelled', '25.4'],
                                        ['U1mHAS8PVI-jicVgR2OBB', 'Corn Meal', '22.7'],
                                        ['BWx_ojQl_XpGSEdhR8xrC', 'Cottonseed', '14.5'],
                                        ['OHyQHkhgYZIm45nsoyyEs', 'Cowpeas', '27.2'],
                                        ['CdoPOOqKHNEP9rwhiFu1v', 'Flaxseed', '25.4'],
                                        ['Bn8P8C3GUFhiH39GWxJLH', 'Hempseed', '20'],
                                        ['WvdoLiVStMYftXUESTSOG', 'Hickory nuts', '22.7'],
                                        ['ebgrz7ZwUFWBUE_Fb6RWJ', 'Hungarian millet seed', '22.2'],
                                        ['MPcY1M1ri1ZtBU0H4urak', 'Kapok seed', '17'],
                                        ['QQC8JcFGvel8m3bf2Erj_', 'Lentils', '27.2'],
                                        ['_QFTHJnJAqzgyK5lug9qC', 'Malt', '15.4'],
                                        ['1-snjGtMF-lgY75sMNHtr', 'Meadow fescue seed', '10.9'],
                                        ['wihfbIyQJE1BPeBMGOv70', 'Millet', '22.2'],
                                        ['nWKKfDXbfklfn1uvqmWfZ', 'Mustard seed', '26.7'],
                                        ['4Y26XVUG-I8m2RUU4tDPH', 'Oats', '14.5'],
                                        ['TtkmrZXpGALwJPA0jB7Ax', 'Onion sets', '13.6'],
                                        ['Jxa_GsoT-kVoEBAku311T', 'Orchardgrass seed', '6.4'],
                                        ['PUDKJDNso8D25li0RN-E2', 'Parsnips', '22.7'],
                                        ['VTHLE0nMrGg8qHdStNwOd', 'Peanuts, unshelled, Virginia type', '7.7'],
                                        ['0aRSqh1AsDephOD2NimOK', 'Peanuts, unshelled, Runners, southeastern', '9.5'],
                                        ['rz9RNmPvilOGtSjBGrRV9', 'Peanuts, unshelled, Spanish', '11.3'],
                                        ['DFjLKHVY5eRZXoAkr44MU', 'Peas, green, unshelled', '13.1'],
                                        ['1m99vKAXBua_exoayNMW7', 'Peas, green, dry', '27.2'],
                                        ['J45IDTL1StQIU7uVeWh-E', 'Perilla seed', '17.4'],
                                        ['TzkKILm5ANCdLq9mNue8D', 'Popcorn, on ear', '31.8'],
                                        ['A1Uvu1sM9-ecOraFVaOuG', 'Popcorn, shelled', '25.4'],
                                        ['yiDGUZ6npzr97lm5diq_E', 'Poppy seed', '20.9'],
                                        ['hah0qVSiAHL8RFmYLUhaB', 'Rapeseed', '25'],
                                        ['9bHYNLSduKhrFZjqzt3qY', 'Redtop seed', '25'],
                                        ['HIMT5-RPKjjdftAybs1qW', 'Rice', '20.4'],
                                        ['t2aW9tR9pd7_bN6u_reQf', 'Rye', '25.4'],
                                        ['Xt4Uj2qddgJiog615uwxe', 'Sesame seed', '20.9'],
                                        ['GBbS5NmDMwzvhrFn0wRU_', 'Sorgo seed', '22.7'],
                                        ['a2jbIb-dqbYxzkSeGzfkV', 'Sorghum grain', '25.4'],
                                        ['q1JKhxOaGLoGE8hQiHbj0', 'Soybeans', '27.2'],
                                        ['JSfSV_70PoOSvg1082Lrs', 'Spelt', '18.1'],
                                        ['M5IIdKAFlC2qbHZHlguuf', 'Spinach', '11.3'],
                                        ['VGanpiYhxXDoLZ08r51fF', 'Sudangrass seed ', '18.1'],
                                        ['EJe9i-Z51bofyoq5YeqRB', 'Sunflower seed', '12.7'],
                                        ['9pR8Jpb-Rd_3gEQHYXml7', 'Timothy seed', '20.4'],
                                        ['5b1s-2qHd1SCkQxL4CNww', 'Velvetbeans (hulled)', '27.2'],
                                        ['L8t0eIjih_I_V5weh5hck', 'Vetch', '27.2'],
                                        ['8aAxBMDxIaop1eDINyGtI', 'Wheat', '27.2'],
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
                                    'n' => 'Amount',
                                    'vt' => 'numerical',
                                    'l' => 'Amount',
                                    'us' => '22',
                                    'du' => 't',
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
                                    'n' => 'Bushels',
                                    'vt' => 'numerical',
                                    'l' => 'Bushels',
                                    'suf' => 'bu.',
                                    'h' => 'The calculator shows the equivalent amount in bushels',
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
                                    'n' => 'price',
                                    'vt' => 'valueSelect',
                                    'l' => '',
                                    'ds' => 'qtm5iZgNZzptO-zEbaXT9',
                                    'opts' => [
                                        ['JBC9TwGNWJy3WSWZ_1Tj3', 'Calculate price per unit', '1'],
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
                                    'n' => 'PricePerUnit',
                                    'vt' => 'numerical',
                                    'l' => 'Price per {{PricePerUnit.fullUnit}}',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'PricePerBushel',
                                    'vt' => 'numerical',
                                    'l' => 'Price per bushel',
                                    'suf' => '/ bu.',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'PriceTotal',
                                    'vt' => 'numerical',
                                    'l' => 'Price total',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'hGH2grm-XX8Nyoyz7MPah',
                'title' => 'Second commodity',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'Grain2',
                                    'vt' => 'valueSelect',
                                    'l' => 'Agricultural commodity',
                                    'ds' => 'yQnBv9qHYLnVs_v72yja6',
                                    'opts' => [
                                        ['-Bo7QdikwQ1L3Hu32Cc5b', 'Alfalfa seed', '27.2'],
                                        ['LCARt2j5o0I9Jr6xbOgws', 'Barley', '21.8'],
                                        ['vKCqRL-yDNoRhhxK12OKi', 'Beans, Lima (dry)', '25.4'],
                                        ['T0NX-OkSkBc9wAE1ybHtW', 'Beans, Other (dry)', '27.2'],
                                        ['ci7UVUMku4XQkJ0NZYkSs', 'Bluegrass seed', '10'],
                                        ['5hAA3jHotnBOgbAh_LyqQ', 'Broomcorn seed', '21.3'],
                                        ['sl36gzcvc48J98ihHOpgh', 'Buckwheat', '21.8'],
                                        ['unUPW6wFsLnSkKGVlgOcJ', 'Castor beans', '18.6'],
                                        ['Rd4KSD2jp9V4YrWOedoL-', 'Clover seed', '27.2'],
                                        ['HLuioBrpXSL3iTZADp3tl', 'Corn, Ear (husked)', '31.8'],
                                        ['mNUZfOFariw0MYTy9sjd0', 'Corn, Shelled', '25.4'],
                                        ['U1mHAS8PVI-jicVgR2OBB', 'Corn Meal', '22.7'],
                                        ['BWx_ojQl_XpGSEdhR8xrC', 'Cottonseed', '14.5'],
                                        ['OHyQHkhgYZIm45nsoyyEs', 'Cowpeas', '27.2'],
                                        ['CdoPOOqKHNEP9rwhiFu1v', 'Flaxseed', '25.4'],
                                        ['Bn8P8C3GUFhiH39GWxJLH', 'Hempseed', '20'],
                                        ['WvdoLiVStMYftXUESTSOG', 'Hickory nuts', '22.7'],
                                        ['ebgrz7ZwUFWBUE_Fb6RWJ', 'Hungarian millet seed', '22.2'],
                                        ['MPcY1M1ri1ZtBU0H4urak', 'Kapok seed', '17'],
                                        ['QQC8JcFGvel8m3bf2Erj_', 'Lentils', '27.2'],
                                        ['_QFTHJnJAqzgyK5lug9qC', 'Malt', '15.4'],
                                        ['1-snjGtMF-lgY75sMNHtr', 'Meadow fescue seed', '10.9'],
                                        ['wihfbIyQJE1BPeBMGOv70', 'Millet', '22.2'],
                                        ['nWKKfDXbfklfn1uvqmWfZ', 'Mustard seed', '26.7'],
                                        ['4Y26XVUG-I8m2RUU4tDPH', 'Oats', '14.5'],
                                        ['TtkmrZXpGALwJPA0jB7Ax', 'Onion sets', '13.6'],
                                        ['Jxa_GsoT-kVoEBAku311T', 'Orchardgrass seed', '6.4'],
                                        ['PUDKJDNso8D25li0RN-E2', 'Parsnips', '22.7'],
                                        ['VTHLE0nMrGg8qHdStNwOd', 'Peanuts, unshelled, Virginia type', '7.7'],
                                        ['0aRSqh1AsDephOD2NimOK', 'Peanuts, unshelled, Runners, southeastern', '9.5'],
                                        ['rz9RNmPvilOGtSjBGrRV9', 'Peanuts, unshelled, Spanish', '11.3'],
                                        ['DFjLKHVY5eRZXoAkr44MU', 'Peas, green, unshelled', '13.1'],
                                        ['1m99vKAXBua_exoayNMW7', 'Peas, green, dry', '27.2'],
                                        ['J45IDTL1StQIU7uVeWh-E', 'Perilla seed', '17.4'],
                                        ['TzkKILm5ANCdLq9mNue8D', 'Popcorn, on ear', '31.8'],
                                        ['A1Uvu1sM9-ecOraFVaOuG', 'Popcorn, shelled', '25.4'],
                                        ['yiDGUZ6npzr97lm5diq_E', 'Poppy seed', '20.9'],
                                        ['hah0qVSiAHL8RFmYLUhaB', 'Rapeseed', '25'],
                                        ['9bHYNLSduKhrFZjqzt3qY', 'Redtop seed', '25'],
                                        ['HIMT5-RPKjjdftAybs1qW', 'Rice', '20.4'],
                                        ['t2aW9tR9pd7_bN6u_reQf', 'Rye', '25.4'],
                                        ['Xt4Uj2qddgJiog615uwxe', 'Sesame seed', '20.9'],
                                        ['GBbS5NmDMwzvhrFn0wRU_', 'Sorgo seed', '22.7'],
                                        ['a2jbIb-dqbYxzkSeGzfkV', 'Sorghum grain', '25.4'],
                                        ['q1JKhxOaGLoGE8hQiHbj0', 'Soybeans', '27.2'],
                                        ['JSfSV_70PoOSvg1082Lrs', 'Spelt', '18.1'],
                                        ['M5IIdKAFlC2qbHZHlguuf', 'Spinach', '11.3'],
                                        ['VGanpiYhxXDoLZ08r51fF', 'Sudangrass seed ', '18.1'],
                                        ['EJe9i-Z51bofyoq5YeqRB', 'Sunflower seed', '12.7'],
                                        ['9pR8Jpb-Rd_3gEQHYXml7', 'Timothy seed', '20.4'],
                                        ['5b1s-2qHd1SCkQxL4CNww', 'Velvetbeans (hulled)', '27.2'],
                                        ['L8t0eIjih_I_V5weh5hck', 'Vetch', '27.2'],
                                        ['8aAxBMDxIaop1eDINyGtI', 'Wheat', '27.2'],
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
                                    'n' => 'Amount2',
                                    'vt' => 'numerical',
                                    'l' => 'Amount',
                                    'us' => '22',
                                    'du' => 't',
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
                                    'n' => 'Bushels2',
                                    'vt' => 'numerical',
                                    'l' => 'Bushels',
                                    'suf' => 'bu.',
                                    'h' => 'The calculator shows the equivalent amount in bushels',
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
                                    'n' => 'PricePerUnit2',
                                    'vt' => 'numerical',
                                    'l' => 'Price per {{PricePerUnit2.fullUnit}}',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'PricePerBushel2',
                                    'vt' => 'numerical',
                                    'l' => 'Price per bushel',
                                    'suf' => '/ bu.',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'PriceTotal2',
                                    'vt' => 'numerical',
                                    'l' => 'Price total',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                        ['difference > 0', 'Price per bushel of first commodity is {{difference.monetaryValue}} higher than price per bushel of second commodity.&nbsp;'],
                                        ['difference < 0', 'Price per bushel of second commodity is {{absolut.monetaryValue}} higher than price per bushel of first commodity.&nbsp;'],
                                        ['difference == 0', 'Price per bushel of first commodity is equal to the price per bushel of second commodity.&nbsp;'],
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
                                    'n' => 'difference',
                                    'vt' => 'numerical',
                                    'l' => 'Difference',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'absolut',
                                    'vt' => 'numerical',
                                    'l' => 'Absolut',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'Amount/Grain=Bushels',
                'var' => [
                    [
                        'l' => 'Amount',
                        'f' => 'Bushels*Grain',
                        'r' => ['Bushels', 'Grain'],
                    ],
                    [
                        'l' => 'Bushels',
                        'f' => 'Amount/Grain',
                        'r' => ['Amount', 'Grain'],
                    ],
                    [
                        'l' => 'Grain',
                        'f' => 'Amount/Bushels',
                        'r' => ['Amount', 'Bushels'],
                    ],
                ],
            ],
            [
                'formula' => 'PriceTotal/Bushels=PricePerBushel',
                'var' => [
                    [
                        'l' => 'PricePerBushel',
                        'f' => 'PriceTotal/Bushels',
                        'r' => ['PriceTotal', 'Bushels'],
                    ],
                    [
                        'l' => 'PriceTotal',
                        'f' => 'Bushels*PricePerBushel',
                        'r' => ['PricePerBushel', 'Bushels'],
                    ],
                    [
                        'l' => 'Bushels',
                        'f' => 'PriceTotal/PricePerBushel',
                        'r' => ['PricePerBushel', 'PriceTotal'],
                    ],
                ],
            ],
            [
                'formula' => 'PricePerUnit*Amount=PriceTotal',
                'var' => [
                    [
                        'l' => 'PricePerUnit',
                        'f' => 'PriceTotal/Amount',
                        'r' => ['Amount', 'PriceTotal'],
                    ],
                    [
                        'l' => 'Amount',
                        'f' => 'PriceTotal/PricePerUnit',
                        'r' => ['PricePerUnit', 'PriceTotal'],
                    ],
                    [
                        'l' => 'PriceTotal',
                        'f' => 'Amount*PricePerUnit',
                        'r' => ['PricePerUnit', 'Amount'],
                    ],
                ],
            ],
            [
                'formula' => 'Amount2/Grain2=Bushels2',
                'var' => [
                    [
                        'l' => 'Amount2',
                        'f' => 'Bushels2*Grain2',
                        'r' => ['Bushels2', 'Grain2'],
                    ],
                    [
                        'l' => 'Bushels2',
                        'f' => 'Amount2/Grain2',
                        'r' => ['Amount2', 'Grain2'],
                    ],
                    [
                        'l' => 'Grain2',
                        'f' => 'Amount2/Bushels2',
                        'r' => ['Amount2', 'Bushels2'],
                    ],
                ],
            ],
            [
                'formula' => 'PriceTotal2/Bushels2=PricePerBushel2',
                'var' => [
                    [
                        'l' => 'PricePerBushel2',
                        'f' => 'PriceTotal2/Bushels2',
                        'r' => ['Bushels2', 'PriceTotal2'],
                    ],
                    [
                        'l' => 'Bushels2',
                        'f' => 'PriceTotal2/PricePerBushel2',
                        'r' => ['PricePerBushel2', 'PriceTotal2'],
                    ],
                    [
                        'l' => 'PriceTotal2',
                        'f' => 'Bushels2*PricePerBushel2',
                        'r' => ['PricePerBushel2', 'Bushels2'],
                    ],
                ],
            ],
            [
                'formula' => 'PricePerUnit2*Amount2=PriceTotal2',
                'var' => [
                    [
                        'l' => 'Amount2',
                        'f' => 'PriceTotal2/PricePerUnit2',
                        'r' => ['PriceTotal2', 'PricePerUnit2'],
                    ],
                    [
                        'l' => 'PriceTotal2',
                        'f' => 'Amount2*PricePerUnit2',
                        'r' => ['Amount2', 'PricePerUnit2'],
                    ],
                    [
                        'l' => 'PricePerUnit2',
                        'f' => 'PriceTotal2/Amount2',
                        'r' => ['Amount2', 'PriceTotal2'],
                    ],
                ],
            ],
            [
                'formula' => 'PricePerBushel-PricePerBushel2=difference',
                'var' => [
                    [
                        'l' => 'PricePerBushel',
                        'f' => 'PricePerBushel2 + difference',
                        'r' => ['difference', 'PricePerBushel2'],
                    ],
                    [
                        'l' => 'difference',
                        'f' => 'PricePerBushel - PricePerBushel2',
                        'r' => ['PricePerBushel', 'PricePerBushel2'],
                    ],
                    [
                        'l' => 'PricePerBushel2',
                        'f' => 'PricePerBushel - difference',
                        'r' => ['PricePerBushel', 'difference'],
                    ],
                ],
            ],
            [
                'formula' => 'absolut=abs(difference)',
                'var' => [
                    [
                        'l' => 'absolut',
                        'f' => 'abs(difference)',
                        'r' => ['difference'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'yQnBv9qHYLnVs_v72yja6' => [
                'name' => 'Commodities',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => '-Bo7QdikwQ1L3Hu32Cc5b', 'label' => 'Alfalfa seed', 'value' => '27.2'],
                    ['uid' => 'LCARt2j5o0I9Jr6xbOgws', 'label' => 'Barley', 'value' => '21.8'],
                    ['uid' => 'vKCqRL-yDNoRhhxK12OKi', 'label' => 'Beans, Lima (dry)', 'value' => '25.4'],
                    ['uid' => 'T0NX-OkSkBc9wAE1ybHtW', 'label' => 'Beans, Other (dry)', 'value' => '27.2'],
                    ['uid' => 'ci7UVUMku4XQkJ0NZYkSs', 'label' => 'Bluegrass seed', 'value' => '10'],
                    ['uid' => '5hAA3jHotnBOgbAh_LyqQ', 'label' => 'Broomcorn seed', 'value' => '21.3'],
                    ['uid' => 'sl36gzcvc48J98ihHOpgh', 'label' => 'Buckwheat', 'value' => '21.8'],
                    ['uid' => 'unUPW6wFsLnSkKGVlgOcJ', 'label' => 'Castor beans', 'value' => '18.6'],
                    ['uid' => 'Rd4KSD2jp9V4YrWOedoL-', 'label' => 'Clover seed', 'value' => '27.2'],
                    ['uid' => 'HLuioBrpXSL3iTZADp3tl', 'label' => 'Corn, Ear (husked)', 'value' => '31.8'],
                    ['uid' => 'mNUZfOFariw0MYTy9sjd0', 'label' => 'Corn, Shelled', 'value' => '25.4'],
                    ['uid' => 'U1mHAS8PVI-jicVgR2OBB', 'label' => 'Corn Meal', 'value' => '22.7'],
                    ['uid' => 'BWx_ojQl_XpGSEdhR8xrC', 'label' => 'Cottonseed', 'value' => '14.5'],
                    ['uid' => 'OHyQHkhgYZIm45nsoyyEs', 'label' => 'Cowpeas', 'value' => '27.2'],
                    ['uid' => 'CdoPOOqKHNEP9rwhiFu1v', 'label' => 'Flaxseed', 'value' => '25.4'],
                    ['uid' => 'Bn8P8C3GUFhiH39GWxJLH', 'label' => 'Hempseed', 'value' => '20'],
                    ['uid' => 'WvdoLiVStMYftXUESTSOG', 'label' => 'Hickory nuts', 'value' => '22.7'],
                    ['uid' => 'ebgrz7ZwUFWBUE_Fb6RWJ', 'label' => 'Hungarian millet seed', 'value' => '22.2'],
                    ['uid' => 'MPcY1M1ri1ZtBU0H4urak', 'label' => 'Kapok seed', 'value' => '17'],
                    ['uid' => 'QQC8JcFGvel8m3bf2Erj_', 'label' => 'Lentils', 'value' => '27.2'],
                    ['uid' => '_QFTHJnJAqzgyK5lug9qC', 'label' => 'Malt', 'value' => '15.4'],
                    ['uid' => '1-snjGtMF-lgY75sMNHtr', 'label' => 'Meadow fescue seed', 'value' => '10.9'],
                    ['uid' => 'wihfbIyQJE1BPeBMGOv70', 'label' => 'Millet', 'value' => '22.2'],
                    ['uid' => 'nWKKfDXbfklfn1uvqmWfZ', 'label' => 'Mustard seed', 'value' => '26.7'],
                    ['uid' => '4Y26XVUG-I8m2RUU4tDPH', 'label' => 'Oats', 'value' => '14.5'],
                    ['uid' => 'TtkmrZXpGALwJPA0jB7Ax', 'label' => 'Onion sets', 'value' => '13.6'],
                    ['uid' => 'Jxa_GsoT-kVoEBAku311T', 'label' => 'Orchardgrass seed', 'value' => '6.4'],
                    ['uid' => 'PUDKJDNso8D25li0RN-E2', 'label' => 'Parsnips', 'value' => '22.7'],
                    ['uid' => 'VTHLE0nMrGg8qHdStNwOd', 'label' => 'Peanuts, unshelled, Virginia type', 'value' => '7.7'],
                    ['uid' => '0aRSqh1AsDephOD2NimOK', 'label' => 'Peanuts, unshelled, Runners, southeastern', 'value' => '9.5'],
                    ['uid' => 'rz9RNmPvilOGtSjBGrRV9', 'label' => 'Peanuts, unshelled, Spanish', 'value' => '11.3'],
                    ['uid' => 'DFjLKHVY5eRZXoAkr44MU', 'label' => 'Peas, green, unshelled', 'value' => '13.1'],
                    ['uid' => '1m99vKAXBua_exoayNMW7', 'label' => 'Peas, green, dry', 'value' => '27.2'],
                    ['uid' => 'J45IDTL1StQIU7uVeWh-E', 'label' => 'Perilla seed', 'value' => '17.4'],
                    ['uid' => 'TzkKILm5ANCdLq9mNue8D', 'label' => 'Popcorn, on ear', 'value' => '31.8'],
                    ['uid' => 'A1Uvu1sM9-ecOraFVaOuG', 'label' => 'Popcorn, shelled', 'value' => '25.4'],
                    ['uid' => 'yiDGUZ6npzr97lm5diq_E', 'label' => 'Poppy seed', 'value' => '20.9'],
                    ['uid' => 'hah0qVSiAHL8RFmYLUhaB', 'label' => 'Rapeseed', 'value' => '25'],
                    ['uid' => '9bHYNLSduKhrFZjqzt3qY', 'label' => 'Redtop seed', 'value' => '25'],
                    ['uid' => 'HIMT5-RPKjjdftAybs1qW', 'label' => 'Rice', 'value' => '20.4'],
                    ['uid' => 't2aW9tR9pd7_bN6u_reQf', 'label' => 'Rye', 'value' => '25.4'],
                    ['uid' => 'Xt4Uj2qddgJiog615uwxe', 'label' => 'Sesame seed', 'value' => '20.9'],
                    ['uid' => 'GBbS5NmDMwzvhrFn0wRU_', 'label' => 'Sorgo seed', 'value' => '22.7'],
                    ['uid' => 'a2jbIb-dqbYxzkSeGzfkV', 'label' => 'Sorghum grain', 'value' => '25.4'],
                    ['uid' => 'q1JKhxOaGLoGE8hQiHbj0', 'label' => 'Soybeans', 'value' => '27.2'],
                    ['uid' => 'JSfSV_70PoOSvg1082Lrs', 'label' => 'Spelt', 'value' => '18.1'],
                    ['uid' => 'M5IIdKAFlC2qbHZHlguuf', 'label' => 'Spinach', 'value' => '11.3'],
                    ['uid' => 'VGanpiYhxXDoLZ08r51fF', 'label' => 'Sudangrass seed ', 'value' => '18.1'],
                    ['uid' => 'EJe9i-Z51bofyoq5YeqRB', 'label' => 'Sunflower seed', 'value' => '12.7'],
                    ['uid' => '9pR8Jpb-Rd_3gEQHYXml7', 'label' => 'Timothy seed', 'value' => '20.4'],
                    ['uid' => '5b1s-2qHd1SCkQxL4CNww', 'label' => 'Velvetbeans (hulled)', 'value' => '27.2'],
                    ['uid' => 'L8t0eIjih_I_V5weh5hck', 'label' => 'Vetch', 'value' => '27.2'],
                    ['uid' => '8aAxBMDxIaop1eDINyGtI', 'label' => 'Wheat', 'value' => '27.2'],
                ],
            ],
            'qtm5iZgNZzptO-zEbaXT9' => [
                'name' => 'second',
                'uiType' => 'CHECKBOX',
                'options' => [
                    ['uid' => 'JBC9TwGNWJy3WSWZ_1Tj3', 'label' => 'Calculate price per unit', 'value' => '1'],
                ],
            ],
        ],
    ],
    'article' => [
        'intro' => 'Give the Grain conversion calculator the bushels, the price total and the price per and it returns the answer.',
        'sections' => [
            ['title' => 'How does the Grain conversion calculator work?', 'html' => <<<'TXT'
            <p>The Grain conversion calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the agricultural commodity and the agricultural commodity (Second commodity)); then you type in the bushels, the price total, the bushels (Second commodity) and the price per (Second commodity).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 53 options, such as alfalfa seed, barley and beans, Lima (dry). The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A number, expressed in bu..</li><li>A single on/off switch — tick it for &ldquo;Calculate price per unit&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>Pick the option that matches your case — 53 options, such as alfalfa seed, barley and beans, Lima (dry). The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A number, expressed in bu..</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li></ul><p>3 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Agricultural commodity</strong></td><td>One of 53 options, such as alfalfa seed, barley and beans, Lima (dry).</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Bushels</strong></td><td>A number stated in bu..</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Price per bushel</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Price total</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Agricultural commodity (Second commodity)</strong></td><td>One of 53 options, such as alfalfa seed, barley and beans, Lima (dry).</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Bushels (Second commodity)</strong></td><td>A number stated in bu..</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Price per (Second commodity)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Price per bushel (Second commodity)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Price total (Second commodity)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Difference</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Absolut</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Grain conversion calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Amount</span><span class="formula-eq">=</span><span class="formula-rhs">bushels × agricultural commodity</span></div><div class="formula-row"><span class="formula-lhs">Price per bushel</span><span class="formula-eq">=</span><span class="formula-rhs">price total ÷ bushels</span></div><div class="formula-row"><span class="formula-lhs">Price per</span><span class="formula-eq">=</span><span class="formula-rhs">price total ÷ amount</span></div><div class="formula-row"><span class="formula-lhs">Amount</span><span class="formula-eq">=</span><span class="formula-rhs">price total ÷ price per</span></div><div class="formula-row"><span class="formula-lhs">Price per bushel</span><span class="formula-eq">=</span><span class="formula-rhs">price per bushel + difference</span></div><div class="formula-row"><span class="formula-lhs">Absolut</span><span class="formula-eq">=</span><span class="formula-rhs">the absolute value of (difference)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in metric tons, and convertible to any of the 29 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in metric tons, and convertible to any of the 29 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in metric tons</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Mass, opening in metric tons</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Grain conversion calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 3 figures keep coming back — the bushels, the price total and the price per — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/grass-seed">Grass seed</a>, <a href="/biology/guinea-pig-age">Guinea pig years to human years</a> and <a href="/biology/guinea-pig-pregnancy">Guinea pig pregnancy</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the Grain conversion calculator?', 'a' => <<<'TXT'
            The form asks for the bushels, the price total and the price per, which is 7 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter amount in a different unit?', 'a' => <<<'TXT'
            Yes. Amount opens in metric tons and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (3 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Grain conversion calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/grass-seed', 'name' => 'Grass seed'],
            ['path' => '/biology/guinea-pig-age', 'name' => 'Guinea pig years to human years'],
            ['path' => '/biology/guinea-pig-pregnancy', 'name' => 'Guinea pig pregnancy'],
        ],
    ],
];
