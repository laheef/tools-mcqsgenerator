<?php

/**
 * Cost of equity
 * /finance/cost-of-equity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cost of equity',
    'meta' => ['title' => 'Cost of equity Calculator — Formula & Results', 'description' => 'Enter does the company pay a dividend? and dividend per share and get cost of equity back. Every box can be solved for, not only the one in the title.', 'h1' => 'Cost of equity Calculator', 'updated' => '2024-06-23'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pay_dividend',
                            'label' => 'Does the company pay a dividend?',
                            'type' => 'select',
                            'options' => ['Yes' => '0', 'No' => '1'],
                            'dataset' => 'pay_dividend',
                            'default' => 'Yes',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dividend_per_share',
                            'label' => 'Dividend per share',
                            'type' => 'number',
                            'help' => 'Amount of dividend per one share that will be paid next year.',
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
                            'name' => 'current_market_value',
                            'label' => 'Current share price',
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
                            'name' => 'dividend_growth_rate',
                            'label' => 'Growth rate of dividend',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Percentage change between the current and past value of the dividend.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'risk_free_ror',
                            'label' => 'Risk free rate of return',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Return from investing in a zero risk asset.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'market_ror',
                            'label' => 'Market rate of return',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'The average return from the stock market.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beta_co',
                            'label' => 'Beta',
                            'type' => 'number',
                            'help' => 'Volatility of an individual stock in comparison to the unsystematic risk of the entire market.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost_of_equity_1',
                            'label' => 'Cost of equity',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost_of_equity_2',
                            'label' => 'Cost of equity',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'cost_of_equity_1=risk_free_ror+beta_co*(market_ror-risk_free_ror)',
            'results' => ['beta_co' => '(cost_of_equity_1 - risk_free_ror)/(market_ror - risk_free_ror)', 'risk_free_ror' => '(beta_co*market_ror - cost_of_equity_1)/(beta_co - 1)', 'market_ror' => '(beta_co*risk_free_ror + cost_of_equity_1 - risk_free_ror)/beta_co', 'cost_of_equity_1' => 'beta_co*market_ror - beta_co*risk_free_ror + risk_free_ror'],
        ],
        [
            'title' => 'cost_of_equity_2=(dividend_per_share / current_market_value)*100 + dividend_growth_rate',
            'results' => ['current_market_value' => '100*dividend_per_share/(cost_of_equity_2 - dividend_growth_rate)', 'dividend_growth_rate' => 'cost_of_equity_2 - 100*dividend_per_share/current_market_value', 'cost_of_equity_2' => 'dividend_growth_rate + 100*dividend_per_share/current_market_value', 'dividend_per_share' => '(1/100)*current_market_value*(cost_of_equity_2 - dividend_growth_rate)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Cost of equity takes Does the company pay a dividend?, Dividend per share and Current share price and returns Cost of equity and Cost of equity. The arithmetic is the whole method: cost of equity is worked out from does the company pay a dividend? by one formula, applied once. Cost of equity comes back in % unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Cost of equity calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cost of equity: it takes 7 numbers and reports Cost of equity and Cost of equity.</p><p>In the form&#039;s own words, Cost of equity = Beta × Market rate of return − Beta × Risk free rate of return + Risk free rate of return.</p><p>The result panel carries Cost of equity and Cost of equity, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs.</p><ul><li><strong>Does the company pay a dividend?</strong> — a plain number, no unit</li><li><strong>Dividend per share</strong> — in USD. Amount of dividend per one share that will be paid next year.</li><li><strong>Current share price</strong> — in USD</li><li><strong>Growth rate of dividend</strong> — in %. Percentage change between the current and past value of the dividend.</li><li><strong>Risk free rate of return</strong> — in %. Return from investing in a zero risk asset.</li><li><strong>Market rate of return</strong> — in %. The average return from the stock market.</li><li><strong>Beta</strong> — a plain number, no unit. Volatility of an individual stock in comparison to the unsystematic risk of the entire market.</li></ul><p>The result boxes are Cost of equity in %, Cost of equity in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Cost of equity takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Cost of equity</strong> = <code>Beta × Market rate of return − Beta × Risk free rate of return + Risk free rate of return</code></li><li><strong>Beta</strong> = <code>(Cost of equity − Risk free rate of return) ÷ (Market rate of return − Risk free rate of return)</code></li><li><strong>Risk free rate of return</strong> = <code>(Beta × Market rate of return − Cost of equity) ÷ (Beta − 1)</code></li><li><strong>Market rate of return</strong> = <code>(Beta × Risk free rate of return + Cost of equity − Risk free rate of return) ÷ Beta</code></li><li><strong>Current share price</strong> = <code>100 × Dividend per share ÷ (Cost of equity − Growth rate of dividend)</code></li><li><strong>Growth rate of dividend</strong> = <code>Cost of equity − 100 × Dividend per share ÷ Current share price</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Cost of equity</strong> = <code>Beta × Market rate of return − Beta × Risk free rate of return + Risk free rate of return</code> — the form to use when Beta, Market rate of return and Risk free rate of return are the values you have.</li><li><strong>Beta</strong> = <code>(Cost of equity − Risk free rate of return) ÷ (Market rate of return − Risk free rate of return)</code> — the form to use when Cost of equity, Risk free rate of return and Market rate of return are the values you have.</li><li><strong>Risk free rate of return</strong> = <code>(Beta × Market rate of return − Cost of equity) ÷ (Beta − 1)</code> — the form to use when Beta, Market rate of return and Cost of equity are the values you have.</li><li><strong>Market rate of return</strong> = <code>(Beta × Risk free rate of return + Cost of equity − Risk free rate of return) ÷ Beta</code> — the form to use when Beta, Risk free rate of return and Cost of equity are the values you have.</li><li><strong>Cost of equity</strong> = <code>Growth rate of dividend + 100 × Dividend per share ÷ Current share price</code> — the form to use when Growth rate of dividend, Dividend per share and Current share price are the values you have.</li><li><strong>Current share price</strong> = <code>100 × Dividend per share ÷ (Cost of equity − Growth rate of dividend)</code> — the form to use when Dividend per share, Cost of equity and Growth rate of dividend are the values you have.</li><li><strong>Growth rate of dividend</strong> = <code>Cost of equity − 100 × Dividend per share ÷ Current share price</code> — the form to use when Cost of equity, Dividend per share and Current share price are the values you have.</li><li><strong>Dividend per share</strong> = <code>(1 ÷ 100) × Current share price × (Cost of equity − Growth rate of dividend)</code> — the form to use when Current share price, Cost of equity and Growth rate of dividend are the values you have.</li></ul><p>Any one of Cost of equity, Beta and Risk free rate of return can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Cost of equity and Cost of equity are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Does the company pay a dividend? left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Does the company pay a dividend? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Dividend per share left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Dividend per share is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Current share price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Current share price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Does the company pay a dividend? to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Does the company pay a dividend?</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Does the company pay a dividend? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Dividend per share</strong> takes a plain number with no unit attached. Amount of dividend per one share that will be paid next year. Change it and Current share price, Growth rate of dividend and Cost of equity changes with it. Have it to hand before you start: Dividend per share is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Current share price</strong> takes a plain number with no unit attached. Change it and Growth rate of dividend, Cost of equity and Dividend per share changes with it. Have it to hand before you start: Current share price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Growth rate of dividend</strong> is measured in %. Percentage change between the current and past value of the dividend. Change it and Current share price, Cost of equity and Dividend per share changes with it. Have it to hand before you start: Growth rate of dividend is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Risk free rate of return</strong> is measured in %. Return from investing in a zero risk asset. Change it and Beta, Market rate of return and Cost of equity changes with it. Have it to hand before you start: Risk free rate of return is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Market rate of return</strong> is measured in %. The average return from the stock market. Change it and Beta, Risk free rate of return and Cost of equity changes with it. Have it to hand before you start: Market rate of return is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Beta</strong> takes a plain number with no unit attached. Volatility of an individual stock in comparison to the unsystematic risk of the entire market. Change it and Risk free rate of return, Market rate of return and Cost of equity changes with it. Have it to hand before you start: Beta is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Cost of equity</strong> is a plain number. It is worked out from Beta, Market rate of return and Risk free rate of return. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Cost of equity</strong> is a plain number. It is worked out from Growth rate of dividend, Dividend per share and Current share price. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Cost of equity follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Does the company pay a dividend?, Dividend per share and Current share price measured, Cost of equity and Cost of equity wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/cyber-monday">Cyber Monday Calculator</a>, <a href="/finance/dart-rate">Dart rate Calculator</a> and <a href="/finance/days-sales-outstanding">Day sales outstanding (DSO) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cost of equity calculator work out?', 'a' => <<<'TXT'
            Cost of equity and Cost of equity, from Beta, Market rate of return and Risk free rate of return. The relationship is Cost of equity = Beta × Market rate of return − Beta × Risk free rate of return + Risk free rate of return.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Does the company pay a dividend?, Dividend per share (USD), Current share price (USD), Growth rate of dividend (%), Risk free rate of return (%). Fill does the company pay a dividend?, dividend per share and current share price and leave Cost of equity empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Cost of equity, Beta, Risk free rate of return and Market rate of return blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Cost of equity is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Does the company pay a dividend? left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Cost of equity at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/cyber-monday', 'name' => 'Cyber Monday Calculator'],
            ['path' => '/finance/dart-rate', 'name' => 'Dart rate Calculator'],
            ['path' => '/finance/days-sales-outstanding', 'name' => 'Day sales outstanding (DSO) Calculator'],
        ],
        'authors' => [],
    ],
];
