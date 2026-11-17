<?php

/**
 * RMD
 * /finance/rmd
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'RMD',
    'meta' => ['title' => 'RMD Calculator — Free, With Worked Examples', 'description' => 'RMD works out life expectancy factor from is spouse more than 10 years younger and the sole beneficiary of IRA? and your age. Every figure is computed.', 'h1' => 'RMD Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spouse',
                            'label' => 'Is spouse more than 10 years younger and the sole beneficiary of IRA?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'spouse',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'age',
                            'label' => 'Your age',
                            'type' => 'select',
                            'options' => [
                                '70' => '70',
                                '71' => '71',
                                '72' => '72',
                                '73' => '73',
                                '74' => '74',
                                '75' => '75',
                                '76' => '76',
                                '77' => '77',
                                '78' => '78',
                                '79' => '79',
                                '80' => '80',
                                '81' => '81',
                                '82' => '82',
                                '83' => '83',
                                '84' => '84',
                                '85' => '85',
                                '86' => '86',
                                '87' => '87',
                                '88' => '88',
                                '89' => '89',
                                '90' => '90',
                                '91' => '91',
                                '92' => '92',
                                '93' => '93',
                                '94' => '94',
                                '95' => '95',
                                '96' => '96',
                                '97' => '97',
                                '98' => '98',
                                '99' => '99',
                                '100' => '100',
                                '101' => '101',
                                '102' => '102',
                                '103' => '103',
                                '104' => '104',
                                '105' => '105',
                                '106' => '106',
                                '107' => '107',
                                '108' => '108',
                                '109' => '109',
                                '110' => '110',
                                '111' => '111',
                                '112' => '112',
                                '113' => '113',
                                '114' => '114',
                                '115 and older' => '115',
                            ],
                            'dataset' => 'age',
                            'control' => 'DROPDOWN',
                            'default' => '72',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'age_joint',
                            'label' => 'Your age',
                            'type' => 'select',
                            'options' => [
                                '70' => '70',
                                '71' => '71',
                                '72' => '72',
                                '73' => '73',
                                '74' => '74',
                                '75' => '75',
                                '76' => '76',
                                '77' => '77',
                                '78' => '78',
                                '79' => '79',
                                '80' => '80',
                            ],
                            'dataset' => 'age_joint',
                            'control' => 'DROPDOWN',
                            'default' => '72',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spouseage',
                            'label' => 'Spouse age',
                            'type' => 'select',
                            'options' => [
                                '40' => '40',
                                '41' => '41',
                                '42' => '42',
                                '43' => '43',
                                '44' => '44',
                                '45' => '45',
                                '46' => '46',
                                '47' => '47',
                                '48' => '48',
                                '49' => '49',
                                '50' => '50',
                                '51' => '51',
                                '52' => '52',
                                '53' => '53',
                                '54' => '54',
                                '55' => '55',
                                '56' => '56',
                                '57' => '57',
                                '58' => '58',
                                '59' => '59',
                                '60' => '60',
                                '61' => '61',
                                '62' => '62',
                                '63' => '63',
                                '64' => '64',
                                '65' => '65',
                                '66' => '66',
                                '67' => '67',
                                '68' => '68',
                                '69' => '69',
                                '70' => '70',
                            ],
                            'dataset' => 'spouse_age',
                            'control' => 'DROPDOWN',
                            'default' => '40',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lifefactor',
                            'label' => 'Life expectancy factor',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lifefactor_joint',
                            'label' => 'Life expectancy factor',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'balance',
                            'label' => 'Account Balance as of Dec 31',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rmd',
                            'label' => 'Required minimum distribution (RMD)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rmd_joint',
                            'label' => 'Required minimum distribution (RMD)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'lifefactor == 0', 'text' => <<<'TXT'
                                The minimum life expectancy factor is 1.0 and the age difference between spouses ***must be at least 10 years**. It appears your option is not applicable to theUniform Lifetime Table. You can check your life expectancy factor, published on the (IRS website)[https://www.irs.gov/publications/p590b#en_US_2019_publink1000231238 target=_blank].
                                TXT],
                                ['when' => 'lifefactor_joint == 0', 'text' => <<<'TXT'
                                The minimum life expectancy factor is 1.0 and the age difference between spouses ***must be at least 10 years**. It appears your option is not applicable to theJoint Life and Last Survivor Expectancy Table. You can check your life expectancy factor, published on the (IRS website)[https://www.irs.gov/publications/p590b#en_US_2019_publink1000231238 target=_blank].
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'rmd = (balance / lifefactor)',
            'results' => ['lifefactor' => 'balance/rmd', 'balance' => 'lifefactor*rmd', 'rmd' => 'balance/lifefactor'],
        ],
        [
            'title' => 'lifefactor_joint = lookupLifeFactor(spouseage, age_joint)',
            'results' => ['lifefactor_joint' => 'lookupLifeFactor(spouseage, age_joint)'],
        ],
        [
            'title' => 'rmd_joint = one_way(balance / lifefactor_joint)',
            'results' => ['rmd_joint' => '(balance/lookupLifeFactor(spouseage, age_joint))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("lookupLifeFactor",function(spouseage,age_joint){var jointLifeFactor={age70:{spAge40:44,spAge41:43.1,spAge42:42.2,spAge43:41.3,spAge44:40.3,spAge45:39.4,spAge46:38.6,spAge47:37.7,spAge48:36.8,spAge49:35.9,spAge50:35.1,spAge51:34.3,spAge52:33.4,spAge53:32.6,spAge54:31.8,spAge55:31.1,spAge56:30.3,spAge57:29.5,spAge58:28.8,spAge59:28.1,spAge60:27.4,spAge61:0,spAge62:0,spAge63:0,spAge64:0,spAge65:0,spAge66:0,spAge67:0,spAge68:0,spAge69:0,spAge70:0},age71:{spAge40:44,spAge41:43,spAge42:42.1,spAge43:41.2,spAge44:40.3,spAge45:39.4,spAge46:38.5,spAge47:37.6,spAge48:36.7,spAge49:35.9,spAge50:35,spAge51:34.2,spAge52:33.3,spAge53:32.5,spAge54:31.7,spAge55:30.9,spAge56:30.1,spAge57:29.4,spAge58:28.6,spAge59:27.9,spAge60:27.2,spAge61:26.5,spAge62:0,spAge63:0,spAge64:0,spAge65:0,spAge66:0,spAge67:0,spAge68:0,spAge69:0,spAge70:0},age72:{spAge40:43.9,spAge41:43,spAge42:42.1,spAge43:41.1,spAge44:40.2,spAge45:39.3,spAge46:38.4,spAge47:37.5,spAge48:36.6,spAge49:35.8,spAge50:34.9,spAge51:34.1,spAge52:33.2,spAge53:32.4,spAge54:31.6,spAge55:30.8,spAge56:30,spAge57:29.2,spAge58:28.4,spAge59:27.7,spAge60:27,spAge61:26.3,spAge62:25.6,spAge63:0,spAge64:0,spAge65:0,spAge66:0,spAge67:0,spAge68:0,spAge69:0,spAge70:0},age73:{spAge40:43.9,spAge41:43,spAge42:42,spAge43:41.1,spAge44:40.2,spAge45:39.3,spAge46:38.4,spAge47:37.5,spAge48:36.6,spAge49:35.7,spAge50:34.8,spAge51:34,spAge52:33.1,spAge53:32.3,spAge54:31.5,spAge55:30.6,spAge56:29.8,spAge57:29.1,spAge58:28.3,spAge59:27.5,spAge60:26.8,spAge61:26.1,spAge62:25.4,spAge63:24.7,spAge64:0,spAge65:0,spAge66:0,spAge67:0,spAge68:0,spAge69:0,spAge70:0},age74:{spAge40:43.9,spAge41:42.9,spAge42:42,spAge43:41.1,spAge44:40.1,spAge45:39.2,spAge46:38.3,spAge47:37.4,spAge48:36.5,spAge49:35.6,spAge50:34.8,spAge51:33.9,spAge52:33,spAge53:32.2,spAge54:31.4,spAge55:30.5,spAge56:29.7,spAge57:28.9,spAge58:28.1,spAge59:27.4,spAge60:26.6,spAge61:25.9,spAge62:25.2,spAge63:24.5,spAge64:23.8,spAge65:0,spAge66:0,spAge67:0,spAge68:0,spAge69:0,spAge70:0},age75:{spAge40:43.8,spAge41:42.9,spAge42:42,spAge43:41,spAge44:40.1,spAge45:39.2,spAge46:38.3,spAge47:37.4,spAge48:36.5,spAge49:35.6,spAge50:34.7,spAge51:33.8,spAge52:33,spAge53:32.1,spAge54:31.3,spAge55:30.4,spAge56:29.6,spAge57:28.8,spAge58:28,spAge59:27.2,spAge60:26.5,spAge61:25.7,spAge62:25,spAge63:24.3,spAge64:23.6,spAge65:22.9,spAge66:0,spAge67:0,spAge68:0,spAge69:0,spAge70:0},age76:{spAge40:43.8,spAge41:42.9,spAge42:41.9,spAge43:41,spAge44:40.1,spAge45:39.1,spAge46:38.2,spAge47:37.3,spAge48:36.4,spAge49:35.5,spAge50:34.6,spAge51:33.8,spAge52:32.9,spAge53:32,spAge54:31.2,spAge55:30.3,spAge56:29.5,spAge57:28.7,spAge58:27.9,spAge59:27.1,spAge60:26.3,spAge61:25.6,spAge62:24.8,spAge63:24.1,spAge64:23.4,spAge65:22.7,spAge66:22,spAge67:0,spAge68:0,spAge69:0,spAge70:0},age77:{spAge40:43.8,spAge41:42.9,spAge42:41.9,spAge43:41,spAge44:40,spAge45:39.1,spAge46:38.2,spAge47:37.3,spAge48:36.4,spAge49:35.5,spAge50:34.6,spAge51:33.7,spAge52:32.8,spAge53:32,spAge54:31.1,spAge55:30.3,spAge56:29.4,spAge57:28.6,spAge58:27.8,spAge59:27,spAge60:26.2,spAge61:25.4,spAge62:24.7,spAge63:23.9,spAge64:23.2,spAge65:22.5,spAge66:21.8,spAge67:21.2,spAge68:0,spAge69:0,spAge70:0},age78:{spAge40:43.8,spAge41:42.8,spAge42:41.9,spAge43:40.9,spAge44:40,spAge45:39.1,spAge46:38.2,spAge47:37.2,spAge48:36.3,spAge49:35.4,spAge50:34.5,spAge51:33.6,spAge52:32.8,spAge53:31.9,spAge54:31,spAge55:30.2,spAge56:29.3,spAge57:28.5,spAge58:27.7,spAge59:26.9,spAge60:26.1,spAge61:25.3,spAge62:24.6,spAge63:23.8,spAge64:23.1,spAge65:22.4,spAge66:21.7,spAge67:21,spAge68:20.3,spAge69:0,spAge70:0},age79:{spAge40:43.8,spAge41:42.8,spAge42:41.9,spAge43:40.9,spAge44:40,spAge45:39.1,spAge46:38.1,spAge47:37.2,spAge48:36.3,spAge49:35.4,spAge50:34.5,spAge51:33.6,spAge52:32.7,spAge53:31.8,spAge54:31,spAge55:30.1,spAge56:29.3,spAge57:28.4,spAge58:27.6,spAge59:26.8,spAge60:26,spAge61:25.2,spAge62:24.4,spAge63:23.7,spAge64:22.9,spAge65:22.2,spAge66:21.5,spAge67:20.8,spAge68:20.1,spAge69:19.5,spAge70:0},age80:{spAge40:43.7,spAge41:42.8,spAge42:41.8,spAge43:40.9,spAge44:40,spAge45:39,spAge46:38.1,spAge47:37.2,spAge48:36.3,spAge49:35.4,spAge50:34.5,spAge51:33.6,spAge52:32.7,spAge53:31.8,spAge54:30.9,spAge55:30.1,spAge56:29.2,spAge57:28.4,spAge58:27.5,spAge59:26.7,spAge60:25.9,spAge61:25.1,spAge62:24.3,spAge63:23.6,spAge64:22.8,spAge65:22.1,spAge66:21.3,spAge67:20.6,spAge68:20,spAge69:19.3,spAge70:18.7}};return jointLifeFactor["age"+age_joint]["spAge"+spouseage]});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Is spouse more than 10 years younger and the sole beneficiary of IRA?, Your age and Your age into RMD and the answer comes back as Life expectancy factor. There is no hidden constant here: change life expectancy factor and is spouse more than 10 years younger and the sole beneficiary of IRA? moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the RMD calculator works', 'html' => <<<'TXT'
            <p>RMD answers one question from 8 numbers, and the answer is Life expectancy factor.</p><p>Written with the labels from the form, Required minimum distribution (RMD) = Account Balance as of Dec 31 ÷ Life expectancy factor.</p><p>What comes back is Life expectancy factor — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 8 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Is spouse more than 10 years younger and the sole beneficiary of IRA?</strong> — a plain number, no unit</li><li><strong>Your age</strong> — a plain number, no unit</li><li><strong>Your age</strong> — a plain number, no unit</li><li><strong>Spouse age</strong> — a plain number, no unit</li><li><strong>Life expectancy factor</strong> — a plain number, no unit</li><li><strong>Account Balance as of Dec 31</strong> — in USD</li><li><strong>Required minimum distribution (RMD)</strong> — in USD</li><li><strong>Required minimum distribution (RMD)</strong> — in USD</li></ul><p>The result box is Life expectancy factor. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Life expectancy factor is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Required minimum distribution (RMD)</strong> = <code>Account Balance as of Dec 31 ÷ Life expectancy factor</code></li><li><strong>Life expectancy factor</strong> = <code>Account Balance as of Dec 31 ÷ Required minimum distribution (RMD)</code></li><li><strong>Account Balance as of Dec 31</strong> = <code>Life expectancy factor × Required minimum distribution (RMD)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Required minimum distribution (RMD)</strong> = <code>Account Balance as of Dec 31 ÷ Life expectancy factor</code> — the form to use when Account Balance as of Dec 31 and Life expectancy factor are the values you have.</li><li><strong>Life expectancy factor</strong> = <code>Account Balance as of Dec 31 ÷ Required minimum distribution (RMD)</code> — the form to use when Account Balance as of Dec 31 and Required minimum distribution (RMD) are the values you have.</li><li><strong>Account Balance as of Dec 31</strong> = <code>Life expectancy factor × Required minimum distribution (RMD)</code> — the form to use when Life expectancy factor and Required minimum distribution (RMD) are the values you have.</li><li><strong>Life expectancy factor</strong> = <code>lookupLifeFactor(Spouse age, Your age)</code> — the form to use when Spouse age and Your age are the values you have.</li><li><strong>Required minimum distribution (RMD)</strong> = <code>(Account Balance as of Dec 31 ÷ lookupLifeFactor(Spouse age, Your age))</code> — the form to use when Account Balance as of Dec 31, Spouse age and Your age are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Required minimum distribution (RMD), Life expectancy factor and Account Balance as of Dec 31 can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Life expectancy factor is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Is spouse more than 10 years younger and the sole beneficiary of IRA? left as a guess.</strong> Anything typed into Is spouse more than 10 years younger and the sole beneficiary of IRA? is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Your age left as a guess.</strong> Anything typed into Your age is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Your age left as a guess.</strong> Anything typed into Your age is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Is spouse more than 10 years younger and the sole beneficiary of IRA? is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Is spouse more than 10 years younger and the sole beneficiary of IRA?</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Is spouse more than 10 years younger and the sole beneficiary of IRA? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Your age</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Your age is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Your age</strong> takes a plain number with no unit attached. The page reads it when it works out Life expectancy factor and Required minimum distribution (RMD). It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Your age is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Spouse age</strong> takes a plain number with no unit attached. The page reads it when it works out Life expectancy factor and Required minimum distribution (RMD). It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Spouse age is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Life expectancy factor</strong> takes a plain number with no unit attached. Have it to hand before you start: Life expectancy factor is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Account Balance as of Dec 31</strong> takes a plain number with no unit attached. The page reads it when it works out Life expectancy factor, Required minimum distribution (RMD) and Required minimum distribution (RMD). Have it to hand before you start: Account Balance as of Dec 31 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Required minimum distribution (RMD)</strong> takes a plain number with no unit attached. The page reads it when it works out Life expectancy factor and Account Balance as of Dec 31. Have it to hand before you start: Required minimum distribution (RMD) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Required minimum distribution (RMD)</strong> takes a plain number with no unit attached. Have it to hand before you start: Required minimum distribution (RMD) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Life expectancy factor</strong> is a plain number. It is computed from Account Balance as of Dec 31 and Required minimum distribution (RMD), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Life expectancy factor is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Is spouse more than 10 years younger and the sole beneficiary of IRA?, Your age and Your age are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Is spouse more than 10 years younger and the sole beneficiary of IRA?, Your age and Your age is what you already know and Life expectancy factor is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/margin-of-safety">Margin of safety Calculator</a>, <a href="/finance/margin-discount">Margin with discount Calculator</a> and <a href="/finance/marginal-cost">Marginal cost</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from RMD is a number to act on, so the useful question is what to do with Life expectancy factor once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Is spouse more than 10 years younger and the sole beneficiary of IRA?, Your age, Your age and Spouse age alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the RMD calculator work out?', 'a' => <<<'TXT'
            Life expectancy factor, from Account Balance as of Dec 31 and Life expectancy factor. The relationship is Required minimum distribution (RMD) = Account Balance as of Dec 31 ÷ Life expectancy factor.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Is spouse more than 10 years younger and the sole beneficiary of IRA?, Your age, Your age, Spouse age, Life expectancy factor. Enter is spouse more than 10 years younger and the sole beneficiary of IRA?, your age and your age; Life expectancy factor is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Required minimum distribution (RMD), Life expectancy factor, Account Balance as of Dec 31 and Life expectancy factor can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Life expectancy factor is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Is spouse more than 10 years younger and the sole beneficiary of IRA? left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Life expectancy factor keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/margin-of-safety', 'name' => 'Margin of safety Calculator'],
            ['path' => '/finance/margin-discount', 'name' => 'Margin with discount Calculator'],
            ['path' => '/finance/marginal-cost', 'name' => 'Marginal cost'],
        ],
        'authors' => [],
    ],
];
