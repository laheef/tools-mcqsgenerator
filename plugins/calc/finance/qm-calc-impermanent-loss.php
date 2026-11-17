<?php

/**
 * Impermanent loss
 * /finance/impermanent-loss
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Impermanent loss',
    'meta' => ['title' => 'Impermanent loss — Formula, Steps & Examples', 'description' => 'Impermanent loss works out weight from asset weights (A/B) and initial deposit. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Impermanent loss Calculator', 'updated' => '2026-08-13'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'W_A',
                            'label' => 'Asset weights (A/B)',
                            'type' => 'select',
                            'options' => ['50/50' => '.5', '80/20' => '.8', '95/5' => '.95', 'Custom' => '0'],
                            'dataset' => 'W_A',
                            'control' => 'DROPDOWN',
                            'default' => '50/50',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InitialDeposit',
                            'label' => 'Initial deposit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'CustomWeight',
                            'label' => 'Weight',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'CustomWeight2',
                            'label' => 'Weight',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'InitialA',
                            'label' => 'Initial price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'InitialB',
                            'label' => 'Initial price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'FutureA',
                            'label' => 'Future price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'FutureB',
                            'label' => 'Future price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'AmountA',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'help' => 'The amount of each token automatically calculated to split your initial deposit according to your selected asset weights.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'AmountB',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'IL',
                            'label' => 'Impermanent loss',
                            'type' => 'number',
                            'help' => 'The percentage of potential profit lost purely due to the price ratio changing between the two assets after your deposit.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'HODL',
                            'label' => 'Value if held (HODL)',
                            'type' => 'number',
                            'help' => 'The total fiat value your original tokens would be worth today if you had kept them in your wallet instead of providing liquidity.',
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
                            'name' => 'Pool',
                            'label' => 'Value in pool',
                            'type' => 'number',
                            'help' => 'The actual total fiat value of your current position inside the liquidity pool after impermanent loss is factored in.',
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
                            'name' => 'Loss',
                            'label' => 'Net loss vs. holding',
                            'type' => 'number',
                            'help' => 'The exact fiat difference between the current value of your pool position and what your original assets would be worth if you had simply held them.',
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
            'title' => 'Hidden',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InitialRatio',
                            'label' => 'Initial ratio',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FutureRatio',
                            'label' => 'Future ratio',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Change',
                            'label' => 'Change',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'W_B',
                            'label' => 'W b',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'True_W_A',
                            'label' => 'True w a',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'InitialRatio = InitialA / InitialB',
            'results' => ['InitialRatio' => 'InitialA/InitialB', 'InitialB' => 'InitialA/InitialRatio', 'InitialA' => 'InitialB*InitialRatio'],
        ],
        [
            'title' => 'FutureRatio = FutureA / FutureB',
            'results' => ['FutureB' => 'FutureA/FutureRatio', 'FutureRatio' => 'FutureA/FutureB', 'FutureA' => 'FutureB*FutureRatio'],
        ],
        [
            'title' => 'Change = FutureRatio / InitialRatio',
            'results' => ['Change' => 'FutureRatio/InitialRatio', 'InitialRatio' => 'FutureRatio/Change', 'FutureRatio' => 'Change*InitialRatio'],
        ],
        [
            'title' => 'IL = ( (Change ^ True_W_A) / ( (True_W_A * Change) + W_B ) ) - 1',
            'results' => ['W_B' => '(-Change*IL*True_W_A - Change*True_W_A + pow(Change, True_W_A))/(IL + 1)', 'IL' => '(-Change*True_W_A + pow(Change, True_W_A) - W_B)/(Change*True_W_A + W_B)'],
        ],
        [
            'title' => 'AmountA = (InitialDeposit * True_W_A) / InitialA',
            'results' => ['InitialDeposit' => 'AmountA*InitialA/True_W_A', 'True_W_A' => 'AmountA*InitialA/InitialDeposit', 'AmountA' => 'InitialDeposit*True_W_A/InitialA', 'InitialA' => 'InitialDeposit*True_W_A/AmountA'],
        ],
        [
            'title' => 'AmountB = (InitialDeposit * W_B) / InitialB',
            'results' => ['InitialDeposit' => 'AmountB*InitialB/W_B', 'W_B' => 'AmountB*InitialB/InitialDeposit', 'InitialB' => 'InitialDeposit*W_B/AmountB', 'AmountB' => 'InitialDeposit*W_B/InitialB'],
        ],
        [
            'title' => 'HODL = (AmountA * FutureA) + (AmountB * FutureB)',
            'results' => [
                'AmountA' => '(-AmountB*FutureB + HODL)/FutureA',
                'FutureB' => '(-AmountA*FutureA + HODL)/AmountB',
                'FutureA' => '(-AmountB*FutureB + HODL)/AmountA',
                'AmountB' => '(-AmountA*FutureA + HODL)/FutureB',
                'HODL' => 'AmountA*FutureA + AmountB*FutureB',
            ],
        ],
        [
            'title' => 'Pool = HODL * (1+IL)',
            'results' => ['HODL' => 'Pool/(IL + 1)', 'IL' => '(-HODL + Pool)/HODL', 'Pool' => 'HODL*(IL + 1)'],
        ],
        [
            'title' => 'Loss = Pool - HODL',
            'results' => ['Loss' => '-HODL + Pool', 'HODL' => '-Loss + Pool', 'Pool' => 'HODL + Loss'],
        ],
        [
            'title' => 'True_W_A = W_A + (CustomWeight / 100)',
            'results' => ['W_A' => '-1/100*CustomWeight + True_W_A', 'True_W_A' => '(1/100)*CustomWeight + W_A', 'CustomWeight' => '100*True_W_A - 100*W_A'],
        ],
        [
            'title' => 'W_B = 1 - True_W_A',
            'results' => ['W_B' => '1 - True_W_A', 'True_W_A' => '1 - W_B'],
        ],
        [
            'title' => 'CustomWeight2 = 100 - CustomWeight',
            'results' => ['CustomWeight2' => '100 - CustomWeight', 'CustomWeight' => '100 - CustomWeight2'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Impermanent loss turns Asset weights (A/B), Initial deposit and Initial price into Weight. The arithmetic is the whole method: weight is worked out from asset weights (A/B) by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Impermanent loss calculator works', 'html' => <<<'TXT'
            <p>The Impermanent loss calculator applies one relationship to 13 numbers and reports Weight.</p><p>The relationship it solves reads Initial ratio = Initial price ÷ Initial price.</p><p>The answers are Weight; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 13 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Asset weights (A/B)</strong> — a plain number, no unit</li><li><strong>Initial deposit</strong> — in USD</li><li><strong>Weight</strong> — a plain number, no unit</li><li><strong>Initial price</strong> — in USD</li><li><strong>Initial price</strong> — in USD</li><li><strong>Future price</strong> — in USD</li><li><strong>Future price</strong> — in USD</li><li><strong>Quantity</strong> — a plain number, no unit. The amount of each token automatically calculated to split your initial deposit according to your selected asset weights.</li><li><strong>Quantity</strong> — a plain number, no unit</li><li><strong>Impermanent loss</strong> — in percent. The percentage of potential profit lost purely due to the price ratio changing between the two assets after your deposit.</li><li><strong>Value if held (HODL)</strong> — in USD. The total fiat value your original tokens would be worth today if you had kept them in your wallet instead of providing liquidity.</li><li><strong>Value in pool</strong> — in USD. The actual total fiat value of your current position inside the liquidity pool after impermanent loss is factored in.</li><li><strong>Net loss vs. holding</strong> — in USD. The exact fiat difference between the current value of your pool position and what your original assets would be worth if you had simply held them.</li></ul><p>The answer comes back as Weight. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Asset weights (A/B) = 0.5, Initial deposit = 10 USD, Weight = 100, Initial price = 1000 USD, Initial price = 10 USD, Future price = 100 USD, Future price = 1000 USD, Quantity = 10, Impermanent loss = 100 perc, Value if held (HODL) = 1000 USD, Value in pool = 10 USD and Net loss vs. holding = 100 USD; the answers are <strong>Initial ratio</strong> = 100, <strong>Future ratio</strong> = 0.1, <strong>Change</strong> = 0.001, <strong>W b</strong> = 10, <strong>Quantity</strong> = -90, <strong>True w a</strong> = 1.5 and <strong>Weight</strong> = 0.</p><ul><li><strong>Initial ratio</strong> = 100</li><li><strong>Future ratio</strong> = 0.1</li><li><strong>Change</strong> = 0.001</li><li><strong>W b</strong> = 10</li><li><strong>Quantity</strong> = -90</li><li><strong>True w a</strong> = 1.5</li><li><strong>Weight</strong> = 0</li></ul><p>The line behind those figures is <strong>Initial ratio</strong> = <code>Initial price ÷ Initial price</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Initial ratio</strong> = 100, <strong>Future ratio</strong> = 0.1, <strong>Change</strong> = 0.001, <strong>W b</strong> = 10, <strong>Quantity</strong> = -90, <strong>True w a</strong> = 1.5 and <strong>Weight</strong> = 0 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Impermanent loss offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Initial ratio</strong> = <code>Initial price ÷ Initial price</code></li><li><strong>Initial price</strong> = <code>Initial price ÷ Initial ratio</code></li><li><strong>Future ratio</strong> = <code>Future price ÷ Future price</code></li><li><strong>Future price</strong> = <code>Future price ÷ Future ratio</code></li><li><strong>Change</strong> = <code>Future ratio ÷ Initial ratio</code></li><li><strong>Impermanent loss</strong> = <code>( − Change × True w a + (Change)^(True w a) − W b) ÷ (Change × True w a + W b)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Initial ratio</strong> = <code>Initial price ÷ Initial price</code> — the form to use when Initial price and Initial price are the values you have.</li><li><strong>Initial price</strong> = <code>Initial price ÷ Initial ratio</code> — the form to use when Initial price and Initial ratio are the values you have.</li><li><strong>Initial price</strong> = <code>Initial price × Initial ratio</code> — the form to use when Initial price and Initial ratio are the values you have.</li><li><strong>Future ratio</strong> = <code>Future price ÷ Future price</code> — the form to use when Future price and Future price are the values you have.</li><li><strong>Future price</strong> = <code>Future price ÷ Future ratio</code> — the form to use when Future price and Future ratio are the values you have.</li><li><strong>Future price</strong> = <code>Future price × Future ratio</code> — the form to use when Future price and Future ratio are the values you have.</li><li><strong>Change</strong> = <code>Future ratio ÷ Initial ratio</code> — the form to use when Future ratio and Initial ratio are the values you have.</li><li><strong>Initial ratio</strong> = <code>Future ratio ÷ Change</code> — the form to use when Future ratio and Change are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Initial ratio, Initial price and Initial price can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Asset weights (A/B), from 0.5 to 1 — and the answers go from <strong>Initial ratio</strong> 100, <strong>Future ratio</strong> 0.1, <strong>Change</strong> 0.001, <strong>W b</strong> 10, <strong>Quantity</strong> -90, <strong>True w a</strong> 1.5 and <strong>Weight</strong> 0 to <strong>Initial ratio</strong> 100, <strong>Future ratio</strong> 0.1, <strong>Change</strong> 0.001, <strong>W b</strong> 10, <strong>Quantity</strong> -90, <strong>True w a</strong> 2 and <strong>Weight</strong> 0.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Impermanent loss is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Weight is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Asset weights (A/B) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Asset weights (A/B) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Initial deposit left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Initial deposit is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Asset weights (A/B) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Asset weights (A/B)</strong> takes a plain number with no unit attached. The page reads it when it works out True w a and Weight. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Asset weights (A/B) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Initial deposit</strong> takes a plain number with no unit attached. The page reads it when it works out True w a, Quantity and Initial price. Have it to hand before you start: Initial deposit is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Weight</strong> takes a plain number with no unit attached. The page reads it when it works out Asset weights (A/B), True w a and Weight. Have it to hand before you start: Weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Initial price</strong> takes a plain number with no unit attached. The page reads it when it works out Initial ratio, Initial price and Initial deposit. Have it to hand before you start: Initial price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Initial price</strong> takes a plain number with no unit attached. The page reads it when it works out Initial ratio, Initial price and Initial deposit. Have it to hand before you start: Initial price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Future price</strong> takes a plain number with no unit attached. The page reads it when it works out Future price, Future ratio and Quantity. Have it to hand before you start: Future price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Future price</strong> takes a plain number with no unit attached. The page reads it when it works out Future ratio, Future price and Quantity. Have it to hand before you start: Future price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Quantity</strong> takes a plain number with no unit attached. The amount of each token automatically calculated to split your initial deposit according to your selected asset weights. The page reads it when it works out Initial deposit, True w a and Initial price. Have it to hand before you start: Quantity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Quantity</strong> takes a plain number with no unit attached. The page reads it when it works out Initial deposit, W b and Initial price. Have it to hand before you start: Quantity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Impermanent loss</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The percentage of potential profit lost purely due to the price ratio changing between the two assets after your deposit. The page reads it when it works out W b, Value if held (HODL) and Value in pool. Have it to hand before you start: Impermanent loss is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Value if held (HODL)</strong> takes a plain number with no unit attached. The total fiat value your original tokens would be worth today if you had kept them in your wallet instead of providing liquidity. The page reads it when it works out Quantity, Future price and Future price. Have it to hand before you start: Value if held (HODL) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Value in pool</strong> takes a plain number with no unit attached. The actual total fiat value of your current position inside the liquidity pool after impermanent loss is factored in. The page reads it when it works out Value if held (HODL), Impermanent loss and Net loss vs. holding. Have it to hand before you start: Value in pool is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Net loss vs. holding</strong> takes a plain number with no unit attached. The exact fiat difference between the current value of your pool position and what your original assets would be worth if you had simply held them. The page reads it when it works out Value if held (HODL) and Value in pool. Have it to hand before you start: Net loss vs. holding is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Weight is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Asset weights (A/B), Initial deposit and Weight are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Asset weights (A/B), Initial deposit and Weight measured, Weight wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/mileage-reimbursement">Mileage reimbursement Calculator</a>, <a href="/finance/millionaire">Millionaire Calculator</a> and <a href="/finance/modified-irr">MIRR Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Impermanent loss calculator work out?', 'a' => 'Weight, from Initial price and Initial price. The relationship is Initial ratio = Initial price ÷ Initial price.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Asset weights (A/B), Initial deposit (USD), Weight, Initial price (USD), Initial price (USD). Enter asset weights (A/B), initial deposit and weight; Weight is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Initial ratio, Initial price, Initial price and Future ratio can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Initial ratio = 100, Future ratio = 0.1, Change = 0.001, W b = 10, Quantity = -90, True w a = 1.5 and Weight = 0. The figures come from Asset weights (A/B) as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Weight is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Asset weights (A/B) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Weight at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/mileage-reimbursement', 'name' => 'Mileage reimbursement Calculator'],
            ['path' => '/finance/millionaire', 'name' => 'Millionaire Calculator'],
            ['path' => '/finance/modified-irr', 'name' => 'MIRR Calculator'],
        ],
        'authors' => [],
    ],
];
