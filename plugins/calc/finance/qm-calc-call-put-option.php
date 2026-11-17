<?php

/**
 * Call put option
 * /finance/call-put-option
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Call put option',
    'meta' => ['title' => 'Call put option — Formula, Steps & Examples', 'description' => 'Call put option turns select calculator mode:, current asset price or target price and strike price into total call cost (premium) and total put cost (premium).', 'h1' => 'Call put option Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calc_option',
                            'label' => 'Select calculator mode:',
                            'type' => 'select',
                            'options' => ['Call option calculator' => '0', 'Put option calculator' => '1'],
                            'dataset' => 'calc_option',
                            'default' => 'Call option calculator',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'target_price',
                            'label' => 'Current asset price or target price',
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
                            'name' => 'strike_price',
                            'label' => 'Strike price',
                            'type' => 'number',
                            'help' => 'The price at which a call/put buyer may execute its option contract rights.',
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
                            'name' => 'price_call',
                            'label' => 'Price of the call option',
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
                            'name' => 'price_put',
                            'label' => 'Price of the put option',
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
                            'name' => 'n_option',
                            'label' => 'Number of option contracts',
                            'type' => 'number',
                            'help' => 'Remember that each option contract refers to the right over 100 shares. Thus for 4 option contracts, you are buying rights over 400 shares.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'call_premium',
                            'label' => 'Total call cost (premium)',
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
                            'name' => 'put_premium',
                            'label' => 'Total put cost (premium)',
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
                            'name' => 'call_profit',
                            'label' => 'Call potential profit',
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
                            'name' => 'call_return',
                            'label' => 'Call potential return',
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
                            'name' => 'call_target_price',
                            'label' => 'Target price of the call option',
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
                            'name' => 'put_profit',
                            'label' => 'Put potential profit',
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
                            'name' => 'put_return',
                            'label' => 'Put potential return',
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
                            'name' => 'put_target_price',
                            'label' => 'Target price put option',
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
                                ['when' => 'target_price > strike_price', 'text' => 'You are in the money! '],
                                ['when' => 'target_price == strike_price', 'text' => 'You are at the money. '],
                                ['when' => 'target_price < strike_price', 'text' => <<<'TXT'
                                You are out of the money.  If the current price remains below the strike price until expiration, the option contract cannot be executed. The owner will lose the premium.
                                TXT],
                                ['when' => 'strike_price > 0 and price_call > 0 or call_profit < 0', 'text' => 'Your breakeven asset price is {{breakeven_call.monetaryValue}}.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'target_price < strike_price', 'text' => 'You are in the money! '],
                                ['when' => 'target_price == strike_price', 'text' => 'You are at the money. '],
                                ['when' => 'target_price > strike_price', 'text' => <<<'TXT'
                                You are out of the money.  If the current price remains above the strike price until expiration, the option contract cannot be executed. The owner will lose the premium.
                                TXT],
                                ['when' => 'strike_price > 0 and price_put > 0 or put_profit < 0', 'text' => 'Your breakeven asset price is {{breakeven_put.monetaryValue}}.'],
                            ],
                        ],
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
                            'name' => 'breakeven_call',
                            'label' => 'Breakeven call',
                            'type' => 'presentation',
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
                            'name' => 'breakeven_put',
                            'label' => 'Breakeven put',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'call_target_price = target_price-strike_price',
            'results' => ['target_price' => 'call_target_price + strike_price', 'strike_price' => '-call_target_price + target_price', 'call_target_price' => '-strike_price + target_price'],
        ],
        [
            'title' => 'call_profit=(call_target_price-price_call)*n_option*100',
            'results' => ['price_call' => '-1/100*call_profit/n_option + call_target_price', 'call_profit' => '100*n_option*(call_target_price - price_call)', 'n_option' => '(1/100)*call_profit/(call_target_price - price_call)', 'call_target_price' => '(1/100)*call_profit/n_option + price_call'],
        ],
        [
            'title' => 'call_return=call_profit/(price_call*n_option*100)',
            'results' => ['price_call' => '(1/100)*call_profit/(call_return*n_option)', 'call_return' => '(1/100)*call_profit/(n_option*price_call)', 'call_profit' => '100*call_return*n_option*price_call', 'n_option' => '(1/100)*call_profit/(call_return*price_call)'],
        ],
        [
            'title' => 'put_target_price =  strike_price - target_price',
            'results' => ['put_target_price' => 'strike_price - target_price', 'target_price' => '-put_target_price + strike_price', 'strike_price' => 'put_target_price + target_price'],
        ],
        [
            'title' => 'put_profit=(put_target_price-price_put)*n_option*100',
            'results' => ['put_target_price' => 'price_put + (1/100)*put_profit/n_option', 'price_put' => 'put_target_price - 1/100*put_profit/n_option', 'put_profit' => '100*n_option*(-price_put + put_target_price)', 'n_option' => '-put_profit/(100*price_put - 100*put_target_price)'],
        ],
        [
            'title' => 'put_return=put_profit/(price_put*n_option*100)',
            'results' => ['price_put' => '(1/100)*put_profit/(n_option*put_return)', 'put_return' => '(1/100)*put_profit/(n_option*price_put)', 'put_profit' => '100*n_option*price_put*put_return', 'n_option' => '(1/100)*put_profit/(price_put*put_return)'],
        ],
        [
            'title' => 'put_premium=price_put*n_option*100',
            'results' => ['price_put' => '(1/100)*put_premium/n_option', 'put_premium' => '100*n_option*price_put', 'n_option' => '(1/100)*put_premium/price_put'],
        ],
        [
            'title' => 'call_premium = price_call*n_option*100',
            'results' => ['call_premium' => '100*n_option*price_call', 'price_call' => '(1/100)*call_premium/n_option', 'n_option' => '(1/100)*call_premium/price_call'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Call put option turns Current asset price or target price and Strike price into Price of the call option and Price of the put option. There is no hidden constant here: change price of the call option and current asset price or target price moves with it. The main result, Price of the call option, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Call put option calculator works', 'html' => <<<'TXT'
            <p>Call put option answers one question from 2 numbers, and the answer is Price of the call option, Price of the put option and Number of option contracts.</p><p>The relationship it solves reads Target price of the call option = − Strike price + Current asset price or target price.</p><p>What comes back is Price of the call option, Price of the put option, Number of option contracts and Total call cost (premium) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Current asset price or target price</strong> — in USD</li><li><strong>Strike price</strong> — in USD. The price at which a call/put buyer may execute its option contract rights.</li></ul><p>The answers come back as Price of the call option in USD, Price of the put option in USD, Number of option contracts, Total call cost (premium) in USD, Total put cost (premium) in USD, Call potential profit in USD, Call potential return in percent, Target price of the call option in USD, Put potential profit in USD, Put potential return in percent, Target price put option in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Call potential return offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Target price of the call option</strong> = <code>− Strike price + Current asset price or target price</code></li><li><strong>Current asset price or target price</strong> = <code>Target price of the call option + Strike price</code></li><li><strong>Strike price</strong> = <code>− Target price of the call option + Current asset price or target price</code></li><li><strong>Call potential profit</strong> = <code>100 × Number of option contracts × (Target price of the call option − Price of the call option)</code></li><li><strong>Price of the call option</strong> = <code>− 1 ÷ 100 × Call potential profit ÷ Number of option contracts + Target price of the call option</code></li><li><strong>Number of option contracts</strong> = <code>(1 ÷ 100) × Call potential profit ÷ (Target price of the call option − Price of the call option)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Target price of the call option</strong> = <code>− Strike price + Current asset price or target price</code> — the form to use when Strike price and Current asset price or target price are the values you have.</li><li><strong>Current asset price or target price</strong> = <code>Target price of the call option + Strike price</code> — the form to use when Target price of the call option and Strike price are the values you have.</li><li><strong>Strike price</strong> = <code>− Target price of the call option + Current asset price or target price</code> — the form to use when Target price of the call option and Current asset price or target price are the values you have.</li><li><strong>Call potential profit</strong> = <code>100 × Number of option contracts × (Target price of the call option − Price of the call option)</code> — the form to use when Number of option contracts, Target price of the call option and Price of the call option are the values you have.</li><li><strong>Price of the call option</strong> = <code>− 1 ÷ 100 × Call potential profit ÷ Number of option contracts + Target price of the call option</code> — the form to use when Call potential profit, Number of option contracts and Target price of the call option are the values you have.</li><li><strong>Number of option contracts</strong> = <code>(1 ÷ 100) × Call potential profit ÷ (Target price of the call option − Price of the call option)</code> — the form to use when Call potential profit, Target price of the call option and Price of the call option are the values you have.</li><li><strong>Target price of the call option</strong> = <code>(1 ÷ 100) × Call potential profit ÷ Number of option contracts + Price of the call option</code> — the form to use when Call potential profit, Number of option contracts and Price of the call option are the values you have.</li><li><strong>Call potential return</strong> = <code>(1 ÷ 100) × Call potential profit ÷ (Number of option contracts × Price of the call option)</code> — the form to use when Call potential profit, Number of option contracts and Price of the call option are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Target price of the call option, Current asset price or target price and Strike price can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Price of the call option, Price of the put option and Number of option contracts are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Current asset price or target price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Current asset price or target price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Strike price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Strike price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Current asset price or target price to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Current asset price or target price</strong> takes a plain number with no unit attached. Change it and Strike price, Target price of the call option and Target price put option changes with it. Have it to hand before you start: Current asset price or target price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Strike price</strong> takes a plain number with no unit attached. The price at which a call/put buyer may execute its option contract rights. Change it and Current asset price or target price, Target price of the call option and Target price put option changes with it. Have it to hand before you start: Strike price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Current asset price or target price and Strike price. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Current asset price or target price into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Price of the call option in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Price of the call option follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Current asset price or target price and Strike price is what you already know and Price of the call option and Price of the put option is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/bond-price">Bond price</a>, <a href="/finance/bond-yield">Bond yield Calculator</a> and <a href="/finance/bond-ytm">Bond YTM Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Call put option calculator work out?', 'a' => <<<'TXT'
            Price of the call option, Price of the put option, Number of option contracts and Total call cost (premium), from Strike price and Current asset price or target price. The relationship is Target price of the call option = − Strike price + Current asset price or target price.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current asset price or target price (USD), Strike price (USD). Enter current asset price or target price and strike price; Price of the call option is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Target price of the call option, Current asset price or target price, Strike price and Call potential profit can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Price of the call option is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Current asset price or target price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Price of the call option keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/bond-price', 'name' => 'Bond price'],
            ['path' => '/finance/bond-yield', 'name' => 'Bond yield Calculator'],
            ['path' => '/finance/bond-ytm', 'name' => 'Bond YTM Calculator'],
        ],
        'authors' => [],
    ],
];
