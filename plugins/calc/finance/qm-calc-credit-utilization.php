<?php

/**
 * Credit utilization
 * /finance/credit-utilization
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Credit utilization',
    'meta' => ['title' => 'Credit utilization: Formula, Steps & Results', 'description' => 'Credit utilization works out outstanding balance from money used and credit limit. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Credit utilization Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Credit line 1',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'balance0',
                            'label' => 'Money used',
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
                            'name' => 'credit0',
                            'label' => 'Credit limit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Credit line 2',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'balance1',
                            'label' => 'Money used',
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
                            'name' => 'credit1',
                            'label' => 'Credit limit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Credit line 3',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'balance2',
                            'label' => 'Money used',
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
                            'name' => 'credit2',
                            'label' => 'Credit limit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Credit line 4',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'balance3',
                            'label' => 'Money used',
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
                            'name' => 'credit3',
                            'label' => 'Credit limit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Credit line 5',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'balance4',
                            'label' => 'Money used',
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
                            'name' => 'credit4',
                            'label' => 'Credit limit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Credit limit 6',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'balance5',
                            'label' => 'Money used',
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
                            'name' => 'credit5',
                            'label' => 'Credit limit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Credit line 7',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'balance6',
                            'label' => 'Money used',
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
                            'name' => 'credit6',
                            'label' => 'Credit limit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Credit line 8',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'balance7',
                            'label' => 'Money used',
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
                            'name' => 'credit7',
                            'label' => 'Credit limit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Credit line 9',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'balance8',
                            'label' => 'Money used',
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
                            'name' => 'credit8',
                            'label' => 'Credit limit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Credit line 10',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'balance9',
                            'label' => 'Money used',
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
                            'name' => 'credit9',
                            'label' => 'Credit limit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Summary',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Outstanding balance: {{global.currencySymbol}}{{outstandingBalance1.formattedValue}} Total credit: {{global.currencySymbol}}{{totalCredit1.formattedValue}} Remaining credit: {{global.currencySymbol}}{{remainingCredit1.formattedValue}} Credit utilization: {{credUtilization1.formattedValue}}% Rating: {{rating.value}}
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'outstandingBalance',
                            'label' => 'Outstanding balance',
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
                            'name' => 'output',
                            'label' => 'Output',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalCredit',
                            'label' => 'Total credit',
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
                            'name' => 'remainingCredit',
                            'label' => 'Remaining credit',
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
                            'name' => 'credUtilization',
                            'label' => 'Credit utilization',
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
                            'name' => 'rating_excellent',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Excellent ' => '1',
                                'Good ' => '2',
                                'Fair ' => '3',
                                'Poor ' => '4',
                                'Very poor ' => '5',
                            ],
                            'dataset' => 'ratings',
                            'control' => 'DROPDOWN',
                            'default' => 'Excellent ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rating_good',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Excellent ' => '1',
                                'Good ' => '2',
                                'Fair ' => '3',
                                'Poor ' => '4',
                                'Very poor ' => '5',
                            ],
                            'dataset' => 'ratings',
                            'control' => 'DROPDOWN',
                            'default' => 'Good ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rating_fair',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Excellent ' => '1',
                                'Good ' => '2',
                                'Fair ' => '3',
                                'Poor ' => '4',
                                'Very poor ' => '5',
                            ],
                            'dataset' => 'ratings',
                            'control' => 'DROPDOWN',
                            'default' => 'Fair ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rating_poor',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Excellent ' => '1',
                                'Good ' => '2',
                                'Fair ' => '3',
                                'Poor ' => '4',
                                'Very poor ' => '5',
                            ],
                            'dataset' => 'ratings',
                            'control' => 'DROPDOWN',
                            'default' => 'Poor ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rating_very_poor',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Excellent ' => '1',
                                'Good ' => '2',
                                'Fair ' => '3',
                                'Poor ' => '4',
                                'Very poor ' => '5',
                            ],
                            'dataset' => 'ratings',
                            'control' => 'DROPDOWN',
                            'default' => 'Very poor ',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'credUtilization = outstandingBalance / totalCredit',
            'results' => ['outstandingBalance' => 'credUtilization*totalCredit', 'credUtilization' => 'outstandingBalance/totalCredit', 'totalCredit' => 'outstandingBalance/credUtilization'],
        ],
        [
            'title' => 'totalCredit =  credit0 + credit1 + credit2 + credit3 + credit4 + credit5 + credit6 + credit7 + credit8 + credit9',
            'results' => [
                'credit3' => '-credit0 - credit1 - credit2 - credit4 - credit5 - credit6 - credit7 - credit8 - credit9 + totalCredit',
                'credit1' => '-credit0 - credit2 - credit3 - credit4 - credit5 - credit6 - credit7 - credit8 - credit9 + totalCredit',
                'credit5' => '-credit0 - credit1 - credit2 - credit3 - credit4 - credit6 - credit7 - credit8 - credit9 + totalCredit',
                'credit0' => '-credit1 - credit2 - credit3 - credit4 - credit5 - credit6 - credit7 - credit8 - credit9 + totalCredit',
                'credit4' => '-credit0 - credit1 - credit2 - credit3 - credit5 - credit6 - credit7 - credit8 - credit9 + totalCredit',
                'credit2' => '-credit0 - credit1 - credit3 - credit4 - credit5 - credit6 - credit7 - credit8 - credit9 + totalCredit',
                'credit9' => '-credit0 - credit1 - credit2 - credit3 - credit4 - credit5 - credit6 - credit7 - credit8 + totalCredit',
                'credit8' => '-credit0 - credit1 - credit2 - credit3 - credit4 - credit5 - credit6 - credit7 - credit9 + totalCredit',
                'credit6' => '-credit0 - credit1 - credit2 - credit3 - credit4 - credit5 - credit7 - credit8 - credit9 + totalCredit',
                'credit7' => '-credit0 - credit1 - credit2 - credit3 - credit4 - credit5 - credit6 - credit8 - credit9 + totalCredit',
                'totalCredit' => 'credit0 + credit1 + credit2 + credit3 + credit4 + credit5 + credit6 + credit7 + credit8 + credit9',
            ],
        ],
        [
            'title' => 'outstandingBalance = balance0 + balance1 + balance2 + balance3 + balance4 + balance5 + balance6 + balance7 + balance8 + balance9',
            'results' => [
                'balance7' => '-balance0 - balance1 - balance2 - balance3 - balance4 - balance5 - balance6 - balance8 - balance9 + outstandingBalance',
                'outstandingBalance' => 'balance0 + balance1 + balance2 + balance3 + balance4 + balance5 + balance6 + balance7 + balance8 + balance9',
                'balance6' => '-balance0 - balance1 - balance2 - balance3 - balance4 - balance5 - balance7 - balance8 - balance9 + outstandingBalance',
                'balance1' => '-balance0 - balance2 - balance3 - balance4 - balance5 - balance6 - balance7 - balance8 - balance9 + outstandingBalance',
                'balance5' => '-balance0 - balance1 - balance2 - balance3 - balance4 - balance6 - balance7 - balance8 - balance9 + outstandingBalance',
                'balance9' => '-balance0 - balance1 - balance2 - balance3 - balance4 - balance5 - balance6 - balance7 - balance8 + outstandingBalance',
                'balance8' => '-balance0 - balance1 - balance2 - balance3 - balance4 - balance5 - balance6 - balance7 - balance9 + outstandingBalance',
                'balance4' => '-balance0 - balance1 - balance2 - balance3 - balance5 - balance6 - balance7 - balance8 - balance9 + outstandingBalance',
                'balance2' => '-balance0 - balance1 - balance3 - balance4 - balance5 - balance6 - balance7 - balance8 - balance9 + outstandingBalance',
                'balance0' => '-balance1 - balance2 - balance3 - balance4 - balance5 - balance6 - balance7 - balance8 - balance9 + outstandingBalance',
                'balance3' => '-balance0 - balance1 - balance2 - balance4 - balance5 - balance6 - balance7 - balance8 - balance9 + outstandingBalance',
            ],
        ],
        [
            'title' => 'remainingCredit = totalCredit - outstandingBalance',
            'results' => ['remainingCredit' => '-outstandingBalance + totalCredit', 'outstandingBalance' => '-remainingCredit + totalCredit', 'totalCredit' => 'outstandingBalance + remainingCredit'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.onResult([],function(ctx,values){var totalCredit=0;var totalBalance=0;ctx.exportValue("outstandingBalance1","");ctx.exportValue("totalCredit1","");ctx.exportValue("remainingCredit1","");ctx.exportValue("credUtilization1","");ctx.exportValue("rating","");for(var i=0;i<10;i++){var currentCredit=values["credit"+i];var currentBalance=values["balance"+i];if(currentCredit&&currentBalance){if(currentBalance>currentCredit||currentBalance<0||currentCredit<0){return}if(currentCredit){totalCredit+=currentCredit}if(currentBalance){totalBalance+=currentBalance}}}var credUtilization=mathjs.round(100*totalBalance/totalCredit,2);ctx.exportValue("outstandingBalance1",formatCurrency(totalBalance));ctx.exportValue("totalCredit1",formatCurrency(totalCredit));ctx.exportValue("remainingCredit1",formatCurrency(totalCredit-totalBalance));ctx.exportValue("credUtilization1",credUtilization);if(credUtilization<=10){ctx.exportValue("rating",ctx.getRawInput("rating_excellent"))}else if(credUtilization<=30){ctx.exportValue("rating",ctx.getRawInput("rating_good"))}else if(credUtilization<=50){ctx.exportValue("rating",ctx.getRawInput("rating_fair"))}else if(credUtilization<=75){ctx.exportValue("rating",ctx.getRawInput("rating_poor"))}else{ctx.exportValue("rating",ctx.getRawInput("rating_very_poor"))}});function formatCurrency(value){var number=parseFloat(value);return number.toLocaleString(navigator.language,{minimumFractionDigits:2,maximumFractionDigits:2})}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Credit utilization takes Outstanding balance and Total credit and returns Money used and Credit limit. Nothing is looked up on this page: money used is computed from outstanding balance and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Money used is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Credit utilization calculator works', 'html' => <<<'TXT'
            <p>The Credit utilization calculator applies one relationship to 2 numbers and reports Money used, Credit limit and Money used.</p><p>The relationship it solves reads Credit utilization = Outstanding balance ÷ Total credit.</p><p>The answers are Money used, Credit limit, Money used and Credit limit; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Outstanding balance</strong> — in USD</li><li><strong>Total credit</strong> — in USD</li></ul><p>What you get back is Money used in USD, Credit limit in USD, Money used in USD, Credit limit in USD, Money used in USD, Credit limit in USD, Money used in USD, Credit limit in USD, Money used in USD, Credit limit in USD, Money used in USD, Credit limit in USD, Money used in USD, Credit limit in USD, Money used in USD, Credit limit in USD, Money used in USD, Credit limit in USD, Money used in USD, Credit limit in USD, Remaining credit in USD, Credit utilization in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Credit utilization offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Credit utilization</strong> = <code>Outstanding balance ÷ Total credit</code></li><li><strong>Outstanding balance</strong> = <code>Credit utilization × Total credit</code></li><li><strong>Total credit</strong> = <code>Outstanding balance ÷ Credit utilization</code></li><li><strong>Credit limit</strong> = <code>− Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit + Total credit</code></li><li><strong>Money used</strong> = <code>− Money used − Money used − Money used − Money used − Money used − Money used − Money used − Money used − Money used + Outstanding balance</code></li><li><strong>Remaining credit</strong> = <code>− Outstanding balance + Total credit</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Credit utilization</strong> = <code>Outstanding balance ÷ Total credit</code> — the form to use when Outstanding balance and Total credit are the values you have.</li><li><strong>Outstanding balance</strong> = <code>Credit utilization × Total credit</code> — the form to use when Credit utilization and Total credit are the values you have.</li><li><strong>Total credit</strong> = <code>Outstanding balance ÷ Credit utilization</code> — the form to use when Outstanding balance and Credit utilization are the values you have.</li><li><strong>Total credit</strong> = <code>Credit limit + Credit limit + Credit limit + Credit limit + Credit limit + Credit limit + Credit limit + Credit limit + Credit limit + Credit limit</code> — the form to use when Credit limit, Credit limit, Credit limit and Credit limit are the values you have.</li><li><strong>Credit limit</strong> = <code>− Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit + Total credit</code> — the form to use when Credit limit, Credit limit, Credit limit and Credit limit are the values you have.</li><li><strong>Credit limit</strong> = <code>− Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit + Total credit</code> — the form to use when Credit limit, Credit limit, Credit limit and Credit limit are the values you have.</li><li><strong>Credit limit</strong> = <code>− Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit + Total credit</code> — the form to use when Credit limit, Credit limit, Credit limit and Credit limit are the values you have.</li><li><strong>Credit limit</strong> = <code>− Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit − Credit limit + Total credit</code> — the form to use when Credit limit, Credit limit, Credit limit and Credit limit are the values you have.</li></ul><p>Any one of Credit utilization, Outstanding balance and Total credit can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Money used, Credit limit and Money used are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Outstanding balance left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Outstanding balance is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Total credit left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total credit is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Outstanding balance to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Outstanding balance</strong> takes a plain number with no unit attached. The page reads it when it works out Credit utilization, Total credit and Money used. Have it to hand before you start: Outstanding balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total credit</strong> takes a plain number with no unit attached. The page reads it when it works out Outstanding balance, Credit utilization and Credit limit. Have it to hand before you start: Total credit is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Outstanding balance and Total credit. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Outstanding balance into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Money used in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Money used follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Outstanding balance and Total credit is what you already know and Money used and Credit limit is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/quick-ratio">Quick ratio</a>, <a href="/finance/rate-of-pay">Rate of pay</a> and <a href="/finance/rate-of-return">Rate of return Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Credit utilization calculator work out?', 'a' => <<<'TXT'
            Money used, Credit limit, Money used and Credit limit, from Outstanding balance and Total credit. The relationship is Credit utilization = Outstanding balance ÷ Total credit.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Outstanding balance (USD), Total credit (USD). Fill outstanding balance and total credit and leave Money used empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Credit utilization, Outstanding balance, Total credit and Credit limit blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Money used is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Outstanding balance left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Money used at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/quick-ratio', 'name' => 'Quick ratio'],
            ['path' => '/finance/rate-of-pay', 'name' => 'Rate of pay'],
            ['path' => '/finance/rate-of-return', 'name' => 'Rate of return Calculator'],
        ],
        'authors' => [],
    ],
];
