<?php

/**
 * Catculator
 * /biology/catculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Catculator',
    'meta' => ['title' => 'Catculator Calculator: Formula, Steps & Examples', 'description' => 'The Catculator calculator takes the numbers you enter and reports <strong>cat1 index</strong> immediately. The panel waits for the button.', 'h1' => 'Catculator Calculator', 'updated' => '2025-02-18'],
    'raw' => [
        'vars' => [
            'agreeableCat' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'cat1Index' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'cat2Index' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'domCat' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'extrovertCat' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'q1' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => '2765'],
            'q2' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => '2766'],
            'q3' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => '2767'],
            'q4' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => '2768'],
            'q5' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => '2769'],
            'shyCat' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'unpredictableCat' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'Z8yi7j36XtcT-44ne-jrO',
                'title' => 'Affection',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'q1',
                                    'vt' => 'valueSelect',
                                    'l' => 'How do you show affection? ❤️',
                                    'ds' => '2765',
                                    'opts' => [
                                        ['lJWeekENQgFc-pfIGWiPT', 'By ignoring people', '1'],
                                        ['X0BgS3yeL_UOeKl9LdZH-', 'Depends on my mood', '2'],
                                        ['9v477QFD_qGRTX0qpIq-L', 'I don’t do it often, or by running away', '3'],
                                        ['5cVTO60WArsJ85TwjCGEz', 'Running up, giving a hug, jumping around all excited', '4'],
                                        ['muQbD1pdIxn6oYGQF8MzV', 'Whatever the other person looks like they want', '5'],
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
                                    't' => 'i',
                                    'u' => ['/cats/cat-q1-1.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q1-2.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q1-3.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q1-4.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q1-5.gif'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '5sDu21QSIWbOAr070_lZG',
                'title' => 'Sleeping habits',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'q2',
                                    'vt' => 'valueSelect',
                                    'l' => 'What’s your ideal bed? 🛏️',
                                    'ds' => '2766',
                                    'opts' => [
                                        ['TSs68ffnHFk7ZsNWJ9bGS', 'Wherever I like, preferably somebody’s bed', '1'],
                                        ['dQJEwlvRP46v04dJSe7iH', 'I can sleep anywhere', '2'],
                                        ['l39RjQn4hYTFAsxtNXBQn', 'Only in my bed, a safe place', '3'],
                                        ['qhWzE8SxJjr_oa__SqJjY', 'Sleep?', '4'],
                                        ['9umIC9HbsT5P9Z_9Myx8o', 'You can have my bed, I\'ll take the sofa, it\'s okay', '5'],
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
                                    't' => 'i',
                                    'u' => ['/cats/cat-q2-1.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q2-2.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q2-3.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q2-4.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q2-5.gif'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'dp6SqiGGilT6XYWXAPhMs',
                'title' => 'Food',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'q3',
                                    'vt' => 'valueSelect',
                                    'l' => 'What do you like to eat? 🥫',
                                    'ds' => '2767',
                                    'opts' => [
                                        ['q6w41ge_aO7awmZVWZhxB', 'Whatever’s on someone else\'s plate', '1'],
                                        ['_MOe_2K86CBP-XCNQ45DT', 'Whatever\'s in the fridge, I like strange combinations', '2'],
                                        ['GqLYGh7fZvjeOfjrxSmft', 'The same thing every day', '3'],
                                        ['MP6YR8gdt68pzaa2oQSnO', 'I like to eat out', '4'],
                                        ['YZGE0qMQgNuO2JG6L4ruB', 'Whatever\'s put in front of me, I wouldn\'t want to offend', '5'],
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
                                    't' => 'i',
                                    'u' => ['/cats/cat-q3-1.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q3-2.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q3-3.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q3-4.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q3-5.gif'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'N8bHhuYjRbwAQ04Qb2nzi',
                'title' => 'Drinking behavior&nbsp;',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'q4',
                                    'vt' => 'valueSelect',
                                    'l' => 'What do you do when you’re drunk? 🍷',
                                    'ds' => '2768',
                                    'opts' => [
                                        ['OHlajtTIXY7_VJ1wjYB7c', 'Puke on someone’s doormat', '1'],
                                        ['KlFauWTI_Ao8bfUr2KTbS', 'Eat and drink even more', '2'],
                                        ['7rfg_CNv0b8MiKfh1MX2N', 'I’m never drunk', '3'],
                                        ['DeWDup20_frlne8DXEG5a', 'Screaming in the middle of the night', '4'],
                                        ['dDgRok45h6AWSctwfMxev', 'Socialize, telling my friends I love them', '5'],
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
                                    't' => 'i',
                                    'u' => ['/cats/cat-q4-1.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q4-2.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q4-3.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q4-4.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q4-5.gif'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'MTSlV_zEGMjVgCP1AoWDs',
                'title' => 'Vacations',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'q5',
                                    'vt' => 'valueSelect',
                                    'l' => 'What would you do on vacation? 🌴',
                                    'ds' => '2769',
                                    'opts' => [
                                        ['3MPH3gpoxYdhEVPWbnUFK', 'Take A LOT of selfies', '1'],
                                        ['fvrnaSd6MLCrg2CW9lCZJ', 'Extreme sports!', '2'],
                                        ['ebjZu7XSvKtAT1I-jXDtZ', 'Holidays make me anxious', '3'],
                                        ['OhtvCzhCLscN4SYnqHom4', 'Try new things', '4'],
                                        ['CQvHul2ipLnS3WWFo-hyd', 'Party with my friends', '5'],
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
                                    't' => 'i',
                                    'u' => ['/cats/cat-q5-1.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q5-2.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q5-3.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q5-4.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-q5-5.gif'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '53T_rGuTP2numK365o0ff',
                'title' => 'Result',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        ['cat1Index == 0', 'You\'re not a specific type of cat! Truly speaking, we can\'t say anything about how catsome you are. Maybe you\'re a doggo? 🐕&nbsp;'],
                                        ['cat1Index == 1 and cat2Index == 0', 'Hey, you\'re a dominant cat.&nbsp;'],
                                        ['cat1Index == 2 and cat2Index == 0', 'Hey, you\'re an unpredictable cat.&nbsp;'],
                                        ['cat1Index == 3 and cat2Index == 0', 'Hey, you\'re a shy cat.&nbsp;'],
                                        ['cat1Index == 4 and cat2Index == 0', 'Hey, you\'re an extroverted cat.&nbsp;'],
                                        ['cat1Index == 5 and cat2Index == 0', 'Hey, you\'re an agreeable cat.&nbsp;'],
                                        ['cat1Index == 1 and cat2Index == 0.5', 'Hey, you\'re a dominant cat, but the difference between other cat types is quite small.&nbsp;'],
                                        ['cat1Index == 2 and cat2Index == 0.5', 'Hey, you\'re an unpredictable cat, but the difference between other cat types is quite small.&nbsp;'],
                                        ['cat1Index == 3 and cat2Index == 0.5', 'Hey, you\'re a shy cat, but the difference between other cat types is quite small.&nbsp;'],
                                        ['cat1Index == 4 and cat2Index == 0.5', 'Hey, you\'re an extroverted cat, but the difference between other cat types is quite small.&nbsp;'],
                                        ['cat1Index == 5 and cat2Index == 0.5', 'Hey, you\'re an agreeable cat, but the difference between other cat types is quite small.&nbsp;'],
                                        ['cat1Index == 1 and cat2Index == 2', '"It\'s a tie! You\'re partly a dominant cat and partly an unpredictable cat.&nbsp;'],
                                        ['cat1Index == 1 and cat2Index == 3', '"It\'s a tie! You\'re partly a dominant cat and partly a shy cat.&nbsp;'],
                                        ['cat1Index == 1 and cat2Index == 4', '"It\'s a tie! You\'re partly a dominant cat and partly an extroverted cat.&nbsp;'],
                                        ['cat1Index == 1 and cat2Index == 5', '"It\'s a tie! You\'re partly a dominant cat and partly an agreeable cat.&nbsp;'],
                                        ['cat1Index == 2 and cat2Index == 3', '"It\'s a tie! You\'re partly an unpredictable cat and partly a shy cat.&nbsp;'],
                                        ['cat1Index == 2 and cat2Index == 4', '"It\'s a tie! You\'re partly an unpredictable cat and partly an extroverted cat.&nbsp;'],
                                        ['cat1Index == 2 and cat2Index == 5', '"It\'s a tie! You\'re partly an unpredictable cat and partly an agreeable cat.&nbsp;'],
                                        ['cat1Index == 3 and cat2Index == 4', '"It\'s a tie! You\'re partly a shy cat and partly an extroverted cat.&nbsp;'],
                                        ['cat1Index == 3 and cat2Index == 5', '"It\'s a tie! You\'re partly a shy cat and partly an agreeable cat.&nbsp;'],
                                        ['cat1Index == 4 and cat2Index == 5', '"It\'s a tie! You\'re partly an extroverted cat and partly an agreeable cat.'],
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
                                    't' => 'i',
                                    'u' => ['/cats/doggo.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-final-1.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-final-2.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-final-3.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-final-4.gif'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/cats/cat-final-5.gif'],
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
                                        [null, 'What traits do you have?'],
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
                                        ['cat1Index == 1', 'Wants what other people have Your words have weight People want to get on your good side&nbsp;'],
                                        ['cat1Index == 2 or cat2Index == 2', 'Creative Huge payoff for new ideas Keeps life interesting&nbsp;'],
                                        ['cat1Index == 3 or cat2Index == 3', 'More self-aware Strong need to help others Emotional depth&nbsp;'],
                                        ['cat1Index == 4 or cat2Index == 4', 'Conversation comes easily Life and soul of the party Happier overall&nbsp;'],
                                        ['cat1Index == 5 or cat2Index == 5', 'Passionate about people Forms strong bonds Respectful'],
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
                                        ['cat1Index == 1', 'Can walk over people Might not be well liked Constant struggle to stay on top&nbsp;'],
                                        ['cat1Index == 2 or cat2Index == 2', 'Some new ideas come with high risk Disrupted routine May worry the people around you&nbsp;'],
                                        ['cat1Index == 3 or cat2Index == 3', 'Harsher self-criticism Potential anxiety Risk of mood disorders&nbsp;'],
                                        ['cat1Index == 4 or cat2Index == 4', 'Easily bored Struggles to be alone Can talk over others&nbsp;'],
                                        ['cat1Index == 5 or cat2Index == 5', 'Passive Conflict avoider Can get hurt by others&nbsp;'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '9w_PWHwmUYwQ_JVPdmEJ8',
                'title' => 'Hidden variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'cat1Index', 'vt' => 'numerical', 'l' => 'Cat1 index'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'cat2Index', 'vt' => 'numerical', 'l' => 'Cat2 index'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'domCat', 'vt' => 'numerical', 'l' => 'Dom cat'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'agreeableCat', 'vt' => 'numerical', 'l' => 'Agreeable cat'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'extrovertCat', 'vt' => 'numerical', 'l' => 'Extrovert cat'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'shyCat', 'vt' => 'numerical', 'l' => 'Shy cat'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'unpredictableCat', 'vt' => 'numerical', 'l' => 'Unpredictable cat'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'cat1Index = getCatType(q1, q2, q3, q4 ,q5)',
                'var' => [
                    [
                        'l' => 'cat1Index',
                        'f' => 'getCatType(q1, q2, q3, q4, q5)',
                        'r' => [
                            'q1',
                            'q2',
                            'q3',
                            'q4',
                            'q5',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'cat2Index = getCat2Type(cat1Index)',
                'var' => [
                    [
                        'l' => 'cat2Index',
                        'f' => 'getCat2Type(getCatType(q1, q2, q3, q4, q5))',
                        'r' => [
                            'q1',
                            'q2',
                            'q3',
                            'q4',
                            'q5',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'domCat = getDomCat(cat1Index)',
                'var' => [
                    [
                        'l' => 'domCat',
                        'f' => 'getDomCat(getCatType(q1, q2, q3, q4, q5))',
                        'r' => [
                            'q1',
                            'q2',
                            'q3',
                            'q4',
                            'q5',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'unpredictableCat = getUnpredictableCat(cat1Index)',
                'var' => [
                    [
                        'l' => 'unpredictableCat',
                        'f' => 'getUnpredictableCat(getCatType(q1, q2, q3, q4, q5))',
                        'r' => [
                            'q1',
                            'q2',
                            'q3',
                            'q4',
                            'q5',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'shyCat = getShyCat(cat1Index)',
                'var' => [
                    [
                        'l' => 'shyCat',
                        'f' => 'getShyCat(getCatType(q1, q2, q3, q4, q5))',
                        'r' => [
                            'q1',
                            'q2',
                            'q3',
                            'q4',
                            'q5',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'extrovertCat = getExtrovertCat(cat1Index)',
                'var' => [
                    [
                        'l' => 'extrovertCat',
                        'f' => 'getExtrovertCat(getCatType(q1, q2, q3, q4, q5))',
                        'r' => [
                            'q1',
                            'q2',
                            'q3',
                            'q4',
                            'q5',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'agreeableCat = getAgreeableCat(cat1Index)',
                'var' => [
                    [
                        'l' => 'agreeableCat',
                        'f' => 'getAgreeableCat(getCatType(q1, q2, q3, q4, q5))',
                        'r' => [
                            'q1',
                            'q2',
                            'q3',
                            'q4',
                            'q5',
                        ],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '2765' => [
                'name' => 'question1',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'lJWeekENQgFc-pfIGWiPT', 'label' => 'By ignoring people', 'value' => '1'],
                    ['uid' => 'X0BgS3yeL_UOeKl9LdZH-', 'label' => 'Depends on my mood', 'value' => '2'],
                    ['uid' => '9v477QFD_qGRTX0qpIq-L', 'label' => 'I don’t do it often, or by running away', 'value' => '3'],
                    ['uid' => '5cVTO60WArsJ85TwjCGEz', 'label' => 'Running up, giving a hug, jumping around all excited', 'value' => '4'],
                    ['uid' => 'muQbD1pdIxn6oYGQF8MzV', 'label' => 'Whatever the other person looks like they want', 'value' => '5'],
                ],
            ],
            '2766' => [
                'name' => 'question2',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'TSs68ffnHFk7ZsNWJ9bGS', 'label' => 'Wherever I like, preferably somebody’s bed', 'value' => '1'],
                    ['uid' => 'dQJEwlvRP46v04dJSe7iH', 'label' => 'I can sleep anywhere', 'value' => '2'],
                    ['uid' => 'l39RjQn4hYTFAsxtNXBQn', 'label' => 'Only in my bed, a safe place', 'value' => '3'],
                    ['uid' => 'qhWzE8SxJjr_oa__SqJjY', 'label' => 'Sleep?', 'value' => '4'],
                    ['uid' => '9umIC9HbsT5P9Z_9Myx8o', 'label' => 'You can have my bed, I\'ll take the sofa, it\'s okay', 'value' => '5'],
                ],
            ],
            '2767' => [
                'name' => 'question3',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'q6w41ge_aO7awmZVWZhxB', 'label' => 'Whatever’s on someone else\'s plate', 'value' => '1'],
                    ['uid' => '_MOe_2K86CBP-XCNQ45DT', 'label' => 'Whatever\'s in the fridge, I like strange combinations', 'value' => '2'],
                    ['uid' => 'GqLYGh7fZvjeOfjrxSmft', 'label' => 'The same thing every day', 'value' => '3'],
                    ['uid' => 'MP6YR8gdt68pzaa2oQSnO', 'label' => 'I like to eat out', 'value' => '4'],
                    ['uid' => 'YZGE0qMQgNuO2JG6L4ruB', 'label' => 'Whatever\'s put in front of me, I wouldn\'t want to offend', 'value' => '5'],
                ],
            ],
            '2768' => [
                'name' => 'question4',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'OHlajtTIXY7_VJ1wjYB7c', 'label' => 'Puke on someone’s doormat', 'value' => '1'],
                    ['uid' => 'KlFauWTI_Ao8bfUr2KTbS', 'label' => 'Eat and drink even more', 'value' => '2'],
                    ['uid' => '7rfg_CNv0b8MiKfh1MX2N', 'label' => 'I’m never drunk', 'value' => '3'],
                    ['uid' => 'DeWDup20_frlne8DXEG5a', 'label' => 'Screaming in the middle of the night', 'value' => '4'],
                    ['uid' => 'dDgRok45h6AWSctwfMxev', 'label' => 'Socialize, telling my friends I love them', 'value' => '5'],
                ],
            ],
            '2769' => [
                'name' => 'question5',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => '3MPH3gpoxYdhEVPWbnUFK', 'label' => 'Take A LOT of selfies', 'value' => '1'],
                    ['uid' => 'fvrnaSd6MLCrg2CW9lCZJ', 'label' => 'Extreme sports!', 'value' => '2'],
                    ['uid' => 'ebjZu7XSvKtAT1I-jXDtZ', 'label' => 'Holidays make me anxious', 'value' => '3'],
                    ['uid' => 'OhtvCzhCLscN4SYnqHom4', 'label' => 'Try new things', 'value' => '4'],
                    ['uid' => 'CQvHul2ipLnS3WWFo-hyd', 'label' => 'Party with my friends', 'value' => '5'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";var catTypes=[1,2,3,4,5];var k;var domCat=0;var unpredictableCat=0;var shyCat=0;var extrovertCat=0;var agreeableCat=0;omni.define("getCatType",function(q1,q2,q3,q4,q5){var catGenes=[q1,q2,q3,q4,q5];domCat=0;unpredictableCat=0;shyCat=0;extrovertCat=0;agreeableCat=0;for(var g=0;g<catGenes.length;g++){var catGene=catGenes[g];switch(catGene){case 1:domCat+=1;break;case 2:unpredictableCat+=1;break;case 3:shyCat+=1;break;case 4:extrovertCat+=1;break;case 5:agreeableCat+=1;break}}var counts=[0,0,0,0,0];if(q1!==undefined){counts[q1-1]++}if(q2!==undefined){counts[q2-1]++}if(q3!==undefined){counts[q3-1]++}if(q4!==undefined){counts[q4-1]++}if(q5!==undefined){counts[q5-1]++}var countVariables=counts.reduce(function(a,b){return a*b},1);if(countVariables!=1){var j=counts.indexOf(Math.max.apply(Math,counts));var freq={};for(var i=0;i<counts.length;i++){var num=counts[i];freq[num]=freq[num]?freq[num]+1:1}if(freq[3]==undefined&&freq[2]==1){k=0.5;return catTypes[j]}else if(freq[2]==2){counts[j]=0;k=counts.indexOf(Math.max.apply(Math,counts));return catTypes[j]}else{return catTypes[j]}}else{return 0}});omni.define("getCat2Type",function(value){if(value&&k>=1&&k<=5){return catTypes[k]}else if(k){return k}else{return 0}});omni.define("getDomCat",function(value){if(value||!value){return domCat*20}});omni.define("getUnpredictableCat",function(value){if(value||!value){return unpredictableCat*20}});omni.define("getShyCat",function(value){if(value||!value){return shyCat*20}});omni.define("getExtrovertCat",function(value){if(value||!value){return extrovertCat*20}});omni.define("getAgreeableCat",function(value){if(value||!value){return agreeableCat*20}});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Catculator calculator takes the numbers you enter and reports <strong>cat1 index</strong> immediately. 
        
         The panel waits for the button. Edit a field, press Calculate, and compare — one input at a time is enough to see what drives the answer.
        TXT,
        'sections' => [
            ['title' => 'How does the Catculator calculator work?', 'html' => <<<'TXT'
            <p>The Catculator calculator takes the values in the form, applies the relationship described below and reports <strong>cat1 index</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (what’s your ideal bed?).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 5 options, such as by ignoring people, depends on my mood and I don’t do it often, or by running away. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 5 options, such as wherever I like, preferably somebody’s bed, I can sleep anywhere and only in my bed, a safe place. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 5 options, such as whatever’s on someone else's plate, whatever's in the fridge, I like strange combinations and the same thing every day. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 5 options, such as puke on someone’s doormat, eat and drink even more and I’m never drunk. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 5 options, such as take A LOT of selfies, extreme sports! and holidays make me anxious. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li></ul><p>5 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>What’s your ideal bed?</strong></td><td>One of 5 options, such as wherever I like, preferably somebody’s bed, I can sleep anywhere and only in my bed, a safe place.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Cat 1 index</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Cat 2 index</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Dom cat</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Agreeable cat</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Extrovert cat</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Shy cat</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Unpredictable cat</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Catculator calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Cat 1 index</span><span class="formula-eq">=</span><span class="formula-rhs">(how do you show affection?, what’s your ideal bed?, what do you like to eat?, what do you do when you’re drunk?, what would you do on vacation?)</span></div><div class="formula-row"><span class="formula-lhs">Cat 2 index</span><span class="formula-eq">=</span><span class="formula-rhs">((how do you show affection?, what’s your ideal bed?, what do you like to eat?, what do you do when you’re drunk?, what would you do on vacation?))</span></div><div class="formula-row"><span class="formula-lhs">Dom cat</span><span class="formula-eq">=</span><span class="formula-rhs">((how do you show affection?, what’s your ideal bed?, what do you like to eat?, what do you do when you’re drunk?, what would you do on vacation?))</span></div><div class="formula-row"><span class="formula-lhs">Unpredictable cat</span><span class="formula-eq">=</span><span class="formula-rhs">((how do you show affection?, what’s your ideal bed?, what do you like to eat?, what do you do when you’re drunk?, what would you do on vacation?))</span></div><div class="formula-row"><span class="formula-lhs">Shy cat</span><span class="formula-eq">=</span><span class="formula-rhs">((how do you show affection?, what’s your ideal bed?, what do you like to eat?, what do you do when you’re drunk?, what would you do on vacation?))</span></div><div class="formula-row"><span class="formula-lhs">Extrovert cat</span><span class="formula-eq">=</span><span class="formula-rhs">((how do you show affection?, what’s your ideal bed?, what do you like to eat?, what do you do when you’re drunk?, what would you do on vacation?))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Catculator calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Keep the units you enter consistent. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/cattle-per-acre">Cattle per acre</a>, <a href="/biology/cell-dilution">Cell dilution</a> and <a href="/biology/cell-doubling-time">Cell doubling time</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Catculator calculator work out?', 'a' => <<<'TXT'
            It returns cat1 index. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Catculator calculator?', 'a' => <<<'TXT'
            The form asks for a few values, which is 5 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (5 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Catculator calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. The calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/cattle-per-acre', 'name' => 'Cattle per acre'],
            ['path' => '/biology/cell-dilution', 'name' => 'Cell dilution'],
            ['path' => '/biology/cell-doubling-time', 'name' => 'Cell doubling time'],
        ],
    ],
];
