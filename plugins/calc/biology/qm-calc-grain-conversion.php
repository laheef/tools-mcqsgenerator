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
    'meta' => ['title' => 'Grain conversion — Formula, Steps & Examples', 'description' => 'Grain conversion turns agricultural commodity, amount and Price per {{PricePerUnit.fullUnit}} into bushels and price per bushel. A worked example follows.', 'h1' => 'Grain conversion Calculator', 'updated' => '2026-08-12'],
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
        'intro' => <<<'TXT'
        Grain conversion works in both directions, between amount and price per {{PricePerUnit.fullUnit}}. Amount comes back in metric tons unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Grain conversion calculator works', 'html' => <<<'TXT'
            <p>Grain conversion answers one question from 2 numbers, and the answer is Amount, Price per {{PricePerUnit.fullUnit}} and Price per bushel.</p><p>Written with the labels from the form, Amount = Bushels × Agricultural commodity.</p><p>The result panel carries Amount, Price per {{PricePerUnit.fullUnit}}, Price per bushel and Price total, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Agricultural commodity</strong> — a plain number, no unit</li><li><strong>Bushels</strong> — in bu.. The calculator shows the equivalent amount in bushels</li></ul><p>The answers come back as Amount in metric tons, Price per {{PricePerUnit.fullUnit}} in USD, Price per bushel in / bu., Price total in USD, Agricultural commodity, Amount in metric tons, Bushels in bu., Price per {{PricePerUnit2.fullUnit}} in USD, Price per bushel in / bu., Price total in USD, Difference in USD, Absolut in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Amount lists 27 options and opens on metric tons. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Amount</strong> = <code>Bushels × Agricultural commodity</code></li><li><strong>Bushels</strong> = <code>Amount ÷ Agricultural commodity</code></li><li><strong>Agricultural commodity</strong> = <code>Amount ÷ Bushels</code></li><li><strong>Price per bushel</strong> = <code>Price total ÷ Bushels</code></li><li><strong>Price total</strong> = <code>Bushels × Price per bushel</code></li><li><strong>Price per {{PricePerUnit.fullUnit}}</strong> = <code>Price total ÷ Amount</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Amount</strong> = <code>Bushels × Agricultural commodity</code> — the form to use when Bushels and Agricultural commodity are the values you have.</li><li><strong>Bushels</strong> = <code>Amount ÷ Agricultural commodity</code> — the form to use when Amount and Agricultural commodity are the values you have.</li><li><strong>Agricultural commodity</strong> = <code>Amount ÷ Bushels</code> — the form to use when Amount and Bushels are the values you have.</li><li><strong>Price per bushel</strong> = <code>Price total ÷ Bushels</code> — the form to use when Price total and Bushels are the values you have.</li><li><strong>Price total</strong> = <code>Bushels × Price per bushel</code> — the form to use when Price per bushel and Bushels are the values you have.</li><li><strong>Bushels</strong> = <code>Price total ÷ Price per bushel</code> — the form to use when Price per bushel and Price total are the values you have.</li><li><strong>Price per {{PricePerUnit.fullUnit}}</strong> = <code>Price total ÷ Amount</code> — the form to use when Amount and Price total are the values you have.</li><li><strong>Amount</strong> = <code>Price total ÷ Price per {{PricePerUnit.fullUnit}}</code> — the form to use when Price per {{PricePerUnit.fullUnit}} and Price total are the values you have.</li></ul><p>Any one of Amount, Bushels and Agricultural commodity can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Amount, Price per {{PricePerUnit.fullUnit}} and Price per bushel are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Agricultural commodity left as a guess.</strong> Anything typed into Agricultural commodity is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Bushels left as a guess.</strong> Anything typed into Bushels is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Agricultural commodity and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Grain conversion form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Agricultural commodity</strong> takes a plain number with no unit attached. The page reads it when it works out Amount and Bushels. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Agricultural commodity is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Bushels</strong> is measured in bu.. The calculator shows the equivalent amount in bushels. The page reads it when it works out Amount, Agricultural commodity and Price per bushel. Fill it from a measurement rather than a memory — Bushels is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Amount</strong> is a metric tons figure. The value follows from Bushels and Agricultural commodity. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Price per {{PricePerUnit.fullUnit}}</strong> is a plain number. The value follows from Amount and Price total. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Price per bushel</strong> is a plain number. The value follows from Price total and Bushels. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Price total</strong> is a plain number. The value follows from Price per bushel and Bushels. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Agricultural commodity</strong> is a plain number. The value follows from Amount and Bushels. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Amount</strong> is a metric tons figure. The value follows from Bushels and Agricultural commodity. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Bushels</strong> is a plain number. The value follows from Amount and Agricultural commodity. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Price per {{PricePerUnit2.fullUnit}}</strong> is a plain number. The value follows from Amount and Price total. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Price per bushel</strong> is a plain number. The value follows from Bushels and Price total. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Price total</strong> is a plain number. The value follows from Price per bushel and Bushels. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Difference</strong> is a plain number. The value follows from Price per bushel and Price per bushel. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Absolut</strong> is a plain number. The value follows from Difference. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Grain conversion actually offers.</p><ul><li><strong>metric tons</strong> — 27 units. It opens in <em>t</em>, and the chip also carries lb, mg, g, oz, t and ng. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Amount is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are metric tons and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Agricultural commodity and Bushels are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Agricultural commodity and Bushels and the number you are missing is Amount and Price per {{PricePerUnit.fullUnit}}.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/fish-per-liter">Fish Per Liter Calculator</a>, <a href="/biology/fish-tank-stocking">Fish Tank Stocking Calculator</a> and <a href="/biology/fixation-index-fst">Fixation Index (Fst) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Grain conversion calculator work out?', 'a' => <<<'TXT'
            Amount, Price per {{PricePerUnit.fullUnit}}, Price per bushel and Price total, from Bushels and Agricultural commodity. The relationship is Amount = Bushels × Agricultural commodity.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Agricultural commodity, Bushels (bu.). Enter agricultural commodity and bushels; Amount is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Amount, Bushels, Agricultural commodity and Price per bushel blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Amount is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Agricultural commodity blank and the page solves for it, reporting Amount instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Amount keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/fish-per-liter', 'name' => 'Fish Per Liter Calculator'],
            ['path' => '/biology/fish-tank-stocking', 'name' => 'Fish Tank Stocking Calculator'],
            ['path' => '/biology/fixation-index-fst', 'name' => 'Fixation Index (Fst) Calculator'],
        ],
        'authors' => [],
    ],
];
