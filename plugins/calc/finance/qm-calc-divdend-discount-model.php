<?php

/**
 * Dividend discount model
 * /finance/divdend-discount-model
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dividend discount model',
    'meta' => ['title' => 'Dividend discount model — Free Online Calculator', 'description' => 'Dividend discount model turns dividend payout ratio and return on equity into expected growth rate. Results come back in perc, with any other unit a click away.', 'h1' => 'Dividend discount model Calculator', 'updated' => '2024-07-08'],
    'sections' => [
        [
            'title' => 'Expected growth rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dividend_payout',
                            'label' => 'Dividend payout ratio',
                            'type' => 'number',
                            'help' => 'Percentage of a company\'s earnings paid to shareholders as dividends.',
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
                            'name' => 'return_on_equity',
                            'label' => 'Return on equity',
                            'type' => 'number',
                            'help' => 'Percentage of net income returned as a percentage of shareholders\' equity.',
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
                            'name' => 'expected_growth_rate',
                            'label' => 'Expected growth rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Expected dividend',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dividend_per_share',
                            'label' => 'Dividend per share',
                            'type' => 'number',
                            'help' => 'Total dividends paid divided by number of outstanding shares.',
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
                            'name' => 'expected_dividend',
                            'label' => 'Expected dividend',
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
            'title' => 'Cost of equity',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'risk_free_rate',
                            'label' => 'Risk-free rate',
                            'type' => 'number',
                            'help' => 'Return on an investment with no risk of financial loss.',
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
                            'name' => 'market_risk_premium',
                            'label' => 'Market risk premium',
                            'type' => 'number',
                            'help' => 'Extra return investors expect from holding a risky market portfolio instead of risk-free assets.',
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
                            'name' => 'betaa',
                            'label' => 'Beta',
                            'type' => 'number',
                            'help' => 'Measure of a stock\'s volatility relative to the overall market.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost_of_equity',
                            'label' => 'Cost of equity',
                            'type' => 'number',
                            'help' => 'Return a company must offer investors to compensate for the risk of investing in its equity.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'DDM stock value',
            'note' => 'This is the stock value calculated based on the Dividend Discount Model.',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stock_value',
                            'label' => 'Stock value',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.001'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'stock_value = expected_dividend / (cost_of_equity - expected_growth_rate) * 100 ',
            'results' => ['cost_of_equity' => '100*expected_dividend/stock_value + expected_growth_rate', 'stock_value' => '100*expected_dividend/(cost_of_equity - expected_growth_rate)', 'expected_dividend' => '(1/100)*stock_value*(cost_of_equity - expected_growth_rate)', 'expected_growth_rate' => 'cost_of_equity - 100*expected_dividend/stock_value'],
        ],
        [
            'title' => 'expected_growth_rate = (100 - dividend_payout) * return_on_equity / 100',
            'results' => ['dividend_payout' => '-100*expected_growth_rate/return_on_equity + 100', 'return_on_equity' => '-100*expected_growth_rate/(dividend_payout - 100)', 'expected_growth_rate' => '(1/100)*return_on_equity*(100 - dividend_payout)'],
        ],
        [
            'title' => 'expected_dividend = dividend_per_share * (1 + expected_growth_rate /100)',
            'results' => ['expected_dividend' => '(1/100)*dividend_per_share*(expected_growth_rate + 100)', 'dividend_per_share' => '100*expected_dividend/(expected_growth_rate + 100)', 'expected_growth_rate' => '-100 + 100*expected_dividend/dividend_per_share'],
        ],
        [
            'title' => 'cost_of_equity = risk_free_rate + betaa * market_risk_premium',
            'results' => ['cost_of_equity' => 'betaa*market_risk_premium + risk_free_rate', 'betaa' => '(cost_of_equity - risk_free_rate)/market_risk_premium', 'risk_free_rate' => '-betaa*market_risk_premium + cost_of_equity', 'market_risk_premium' => '(cost_of_equity - risk_free_rate)/betaa'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dividend discount model takes Expected growth rate, Expected dividend and Cost of equity and returns Dividend payout ratio and Return on equity. Nothing is looked up on this page: dividend payout ratio is computed from expected growth rate and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Dividend payout ratio is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Dividend discount model calculator works', 'html' => <<<'TXT'
            <p>Dividend discount model answers one question from 3 numbers, and the answer is Dividend payout ratio, Return on equity and Dividend per share.</p><p>Written with the labels from the form, Stock value = 100 × Expected dividend ÷ (Cost of equity − Expected growth rate).</p><p>The result panel carries Dividend payout ratio, Return on equity, Dividend per share and Risk-free rate, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Expected growth rate</strong> — in percent</li><li><strong>Expected dividend</strong> — in USD</li><li><strong>Cost of equity</strong> — in percent. Return a company must offer investors to compensate for the risk of investing in its equity.</li></ul><p>The answers come back as Dividend payout ratio in percent, Return on equity in percent, Dividend per share in USD, Risk-free rate in percent, Market risk premium in percent, Beta, Stock value in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Dividend payout ratio = 10 perc, Return on equity = 100 perc, Expected growth rate = 1000 perc, Dividend per share = 10 USD, Expected dividend = 100 USD, Risk-free rate = 1000 perc, Market risk premium = 10 perc, Beta = 100 and Stock value = 1000 USD; the answers are <strong>Cost of equity</strong> = 1010 perc.</p><ul><li><strong>Cost of equity</strong> = 1010 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Stock value</strong> = <code>100 × Expected dividend ÷ (Cost of equity − Expected growth rate)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Cost of equity</strong> = 1010 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Dividend payout ratio offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Stock value</strong> = <code>100 × Expected dividend ÷ (Cost of equity − Expected growth rate)</code></li><li><strong>Cost of equity</strong> = <code>100 × Expected dividend ÷ Stock value + Expected growth rate</code></li><li><strong>Expected dividend</strong> = <code>(1 ÷ 100) × Stock value × (Cost of equity − Expected growth rate)</code></li><li><strong>Expected growth rate</strong> = <code>Cost of equity − 100 × Expected dividend ÷ Stock value</code></li><li><strong>Dividend payout ratio</strong> = <code>− 100 × Expected growth rate ÷ Return on equity + 100</code></li><li><strong>Return on equity</strong> = <code>− 100 × Expected growth rate ÷ (Dividend payout ratio − 100)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Stock value</strong> = <code>100 × Expected dividend ÷ (Cost of equity − Expected growth rate)</code> — the form to use when Expected dividend, Cost of equity and Expected growth rate are the values you have.</li><li><strong>Cost of equity</strong> = <code>100 × Expected dividend ÷ Stock value + Expected growth rate</code> — the form to use when Expected dividend, Stock value and Expected growth rate are the values you have.</li><li><strong>Expected dividend</strong> = <code>(1 ÷ 100) × Stock value × (Cost of equity − Expected growth rate)</code> — the form to use when Stock value, Cost of equity and Expected growth rate are the values you have.</li><li><strong>Expected growth rate</strong> = <code>Cost of equity − 100 × Expected dividend ÷ Stock value</code> — the form to use when Cost of equity, Expected dividend and Stock value are the values you have.</li><li><strong>Expected growth rate</strong> = <code>(1 ÷ 100) × Return on equity × (100 − Dividend payout ratio)</code> — the form to use when Return on equity and Dividend payout ratio are the values you have.</li><li><strong>Dividend payout ratio</strong> = <code>− 100 × Expected growth rate ÷ Return on equity + 100</code> — the form to use when Expected growth rate and Return on equity are the values you have.</li><li><strong>Return on equity</strong> = <code>− 100 × Expected growth rate ÷ (Dividend payout ratio − 100)</code> — the form to use when Expected growth rate and Dividend payout ratio are the values you have.</li><li><strong>Expected dividend</strong> = <code>(1 ÷ 100) × Dividend per share × (Expected growth rate + 100)</code> — the form to use when Dividend per share and Expected growth rate are the values you have.</li></ul><p>Any one of Stock value, Cost of equity and Expected dividend can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Dividend payout ratio, from 10 to 20 — and the answers go from <strong>Cost of equity</strong> 1010 perc to <strong>Cost of equity</strong> 1010 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Expected growth rate and Cost of equity is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Dividend payout ratio, Return on equity and Dividend per share are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Expected growth rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Expected growth rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Expected dividend left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Expected dividend is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Expected growth rate is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Expected growth rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Cost of equity, Stock value and Expected dividend. Have it to hand before you start: Expected growth rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Expected dividend</strong> takes a plain number with no unit attached. The page reads it when it works out Cost of equity, Stock value and Expected growth rate. Have it to hand before you start: Expected dividend is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Cost of equity</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Return a company must offer investors to compensate for the risk of investing in its equity. The page reads it when it works out Stock value, Expected dividend and Expected growth rate. Have it to hand before you start: Cost of equity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Dividend payout ratio</strong> is a percent figure. The value follows from Expected growth rate and Return on equity. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Return on equity</strong> is a percent figure. The value follows from Expected growth rate and Dividend payout ratio. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Dividend per share</strong> is a plain number. The value follows from Expected dividend and Expected growth rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Risk-free rate</strong> is a percent figure. The value follows from Beta, Market risk premium and Cost of equity. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Market risk premium</strong> is a percent figure. The value follows from Cost of equity, Risk-free rate and Beta. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Beta</strong> is a plain number. The value follows from Cost of equity, Risk-free rate and Market risk premium. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Stock value</strong> is a plain number. The value follows from Expected dividend, Cost of equity and Expected growth rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Dividend payout ratio follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Expected growth rate, Expected dividend and Cost of equity are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Expected growth rate, Expected dividend and Cost of equity measured, Dividend payout ratio and Return on equity wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/burndown-chart">Burndown chart Calculator</a>, <a href="/finance/business-budget">Business budget Calculator</a> and <a href="/finance/business-loan">Business loan Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dividend discount model calculator work out?', 'a' => <<<'TXT'
            Dividend payout ratio, Return on equity, Dividend per share and Risk-free rate, from Expected dividend, Cost of equity and Expected growth rate. The relationship is Stock value = 100 × Expected dividend ÷ (Cost of equity − Expected growth rate).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Expected growth rate (percent), Expected dividend (USD), Cost of equity (percent). With expected growth rate, expected dividend and cost of equity in place, Dividend payout ratio can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Stock value, Cost of equity, Expected dividend and Expected growth rate blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Cost of equity = 1010 perc. The figures come from Expected growth rate as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Dividend payout ratio is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Expected growth rate left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Dividend payout ratio at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/burndown-chart', 'name' => 'Burndown chart Calculator'],
            ['path' => '/finance/business-budget', 'name' => 'Business budget Calculator'],
            ['path' => '/finance/business-loan', 'name' => 'Business loan Calculator'],
        ],
        'authors' => [],
    ],
];
