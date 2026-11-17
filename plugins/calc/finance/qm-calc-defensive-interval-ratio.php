<?php

/**
 * Defensive interval ratio
 * /finance/defensive-interval-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Defensive interval ratio',
    'meta' => ['title' => 'Defensive interval ratio — Formula & Results', 'description' => 'Defensive interval ratio works out current assets and daily cash expenditure from cash and cash equivalents, marketable securities and accounts receivable.', 'h1' => 'Defensive interval ratio Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => 'Current assets',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash',
                            'label' => 'Cash and cash equivalents',
                            'type' => 'number',
                            'help' => 'The amount of cash (and other assets that can be converted into cash in less than three months) that the company possesses.',
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
                            'name' => 'marketable_securities',
                            'label' => 'Marketable securities',
                            'type' => 'number',
                            'help' => 'Easily liquidated financial assets (such as stocks or bonds) held for short-term gains.',
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
                            'name' => 'accounts_receivable',
                            'label' => 'Accounts receivable',
                            'type' => 'number',
                            'help' => 'The amounts owed to a business by customers for goods or services provided on credit.',
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
                            'name' => 'current_assets',
                            'label' => 'Current assets',
                            'type' => 'number',
                            'help' => 'A company\'s assets which can be converted to cash in one year or less.',
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
            'title' => 'Average daily expenditure',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'operating_expenses',
                            'label' => 'Annual operating expenses',
                            'type' => 'number',
                            'help' => 'The costs incurred by a business over a year for its day-to-day operations.',
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
                            'name' => 'noncash_expenses',
                            'label' => 'Annual non-cash charges',
                            'type' => 'number',
                            'help' => 'The expenses that reduce a company\'s income but don\'t involve actual cash outflows.',
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
                            'name' => 'daily_cash_expenditure',
                            'label' => 'Daily cash expenditure',
                            'type' => 'number',
                            'help' => 'The total amount of money spent by a business on a single day for its operational activities.',
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
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'defensive_interval_ratio',
                            'label' => 'Defensive interval ratio',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'defensive_interval_ratio = current_assets / daily_cash_expenditure',
            'results' => ['defensive_interval_ratio' => 'current_assets/daily_cash_expenditure', 'current_assets' => 'daily_cash_expenditure*defensive_interval_ratio', 'daily_cash_expenditure' => 'current_assets/defensive_interval_ratio'],
        ],
        [
            'title' => 'current_assets = cash + marketable_securities + accounts_receivable',
            'results' => ['current_assets' => 'accounts_receivable + cash + marketable_securities', 'marketable_securities' => '-accounts_receivable - cash + current_assets', 'accounts_receivable' => '-cash + current_assets - marketable_securities', 'cash' => '-accounts_receivable + current_assets - marketable_securities'],
        ],
        [
            'title' => 'daily_cash_expenditure = (operating_expenses - noncash_expenses) / 365',
            'results' => ['operating_expenses' => '365*daily_cash_expenditure + noncash_expenses', 'noncash_expenses' => '-365*daily_cash_expenditure + operating_expenses', 'daily_cash_expenditure' => '-1/365*noncash_expenses + (1/365)*operating_expenses'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Defensive interval ratio takes Current assets and Daily cash expenditure and returns Cash and cash equivalents and Marketable securities. The arithmetic is the whole method: cash and cash equivalents is worked out from current assets by one formula, applied once. Cash and cash equivalents comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Defensive interval ratio calculator works', 'html' => <<<'TXT'
            <p>The Defensive interval ratio calculator applies one relationship to 2 numbers and reports Cash and cash equivalents, Marketable securities and Accounts receivable.</p><p>The relationship it solves reads Defensive interval ratio = Current assets ÷ Daily cash expenditure.</p><p>The answers are Cash and cash equivalents, Marketable securities, Accounts receivable and Annual operating expenses; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Current assets</strong> — in USD. A company&#039;s assets which can be converted to cash in one year or less.</li><li><strong>Daily cash expenditure</strong> — in USD. The total amount of money spent by a business on a single day for its operational activities.</li></ul><p>What you get back is Cash and cash equivalents in USD, Marketable securities in USD, Accounts receivable in USD, Annual operating expenses in USD, Annual non-cash charges in USD, Defensive interval ratio in days, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Cash and cash equivalents = 10 USD, Marketable securities = 100 USD, Accounts receivable = 1000 USD, Current assets = 10 USD, Annual operating expenses = 100 USD, Annual non-cash charges = 1000 USD and Daily cash expenditure = 10 USD; the answers are <strong>Defensive interval ratio</strong> = 1 days.</p><ul><li><strong>Defensive interval ratio</strong> = 1 days</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Defensive interval ratio</strong> = <code>Current assets ÷ Daily cash expenditure</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Defensive interval ratio</strong> = 1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Defensive interval ratio offers 6 units and opens on days, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Defensive interval ratio</strong> = <code>Current assets ÷ Daily cash expenditure</code></li><li><strong>Current assets</strong> = <code>Daily cash expenditure × Defensive interval ratio</code></li><li><strong>Daily cash expenditure</strong> = <code>Current assets ÷ Defensive interval ratio</code></li><li><strong>Marketable securities</strong> = <code>− Accounts receivable − Cash and cash equivalents + Current assets</code></li><li><strong>Accounts receivable</strong> = <code>− Cash and cash equivalents + Current assets − Marketable securities</code></li><li><strong>Cash and cash equivalents</strong> = <code>− Accounts receivable + Current assets − Marketable securities</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Defensive interval ratio</strong> = <code>Current assets ÷ Daily cash expenditure</code> — the form to use when Current assets and Daily cash expenditure are the values you have.</li><li><strong>Current assets</strong> = <code>Daily cash expenditure × Defensive interval ratio</code> — the form to use when Daily cash expenditure and Defensive interval ratio are the values you have.</li><li><strong>Daily cash expenditure</strong> = <code>Current assets ÷ Defensive interval ratio</code> — the form to use when Current assets and Defensive interval ratio are the values you have.</li><li><strong>Current assets</strong> = <code>Accounts receivable + Cash and cash equivalents + Marketable securities</code> — the form to use when Accounts receivable, Cash and cash equivalents and Marketable securities are the values you have.</li><li><strong>Marketable securities</strong> = <code>− Accounts receivable − Cash and cash equivalents + Current assets</code> — the form to use when Accounts receivable, Cash and cash equivalents and Current assets are the values you have.</li><li><strong>Accounts receivable</strong> = <code>− Cash and cash equivalents + Current assets − Marketable securities</code> — the form to use when Cash and cash equivalents, Current assets and Marketable securities are the values you have.</li><li><strong>Cash and cash equivalents</strong> = <code>− Accounts receivable + Current assets − Marketable securities</code> — the form to use when Accounts receivable, Current assets and Marketable securities are the values you have.</li><li><strong>Daily cash expenditure</strong> = <code>− 1 ÷ 365 × Annual non-cash charges + (1 ÷ 365) × Annual operating expenses</code> — the form to use when Annual non-cash charges and Annual operating expenses are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Defensive interval ratio, Current assets and Daily cash expenditure can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Cash and cash equivalents, from 10 to 20 — and the answers go from <strong>Defensive interval ratio</strong> 1 days to <strong>Defensive interval ratio</strong> 1 days.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Cash and cash equivalents, Marketable securities and Accounts receivable are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Current assets left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Current assets is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Daily cash expenditure left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Daily cash expenditure is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Current assets is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Current assets</strong> takes a plain number with no unit attached. A company&#039;s assets which can be converted to cash in one year or less. It feeds Defensive interval ratio, Daily cash expenditure and Marketable securities. Have it to hand before you start: Current assets is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Daily cash expenditure</strong> takes a plain number with no unit attached. The total amount of money spent by a business on a single day for its operational activities. It feeds Defensive interval ratio, Current assets and Annual operating expenses. Have it to hand before you start: Daily cash expenditure is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 6 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Cash and cash equivalents</strong> is a plain number. It is computed from Accounts receivable, Current assets and Marketable securities, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Marketable securities</strong> is a plain number. It is computed from Accounts receivable, Cash and cash equivalents and Current assets, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Accounts receivable</strong> is a plain number. It is computed from Cash and cash equivalents, Current assets and Marketable securities, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Annual operating expenses</strong> is a plain number. It is computed from Daily cash expenditure and Annual non-cash charges, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Annual non-cash charges</strong> is a plain number. It is computed from Daily cash expenditure and Annual operating expenses, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Defensive interval ratio</strong> is a days figure and the page's own defaults put it at 1 days. It is computed from Current assets and Daily cash expenditure, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>days</strong> — opens in <em>days</em>, and the chip also carries hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Cash and cash equivalents follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover days. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Current assets and Daily cash expenditure is what you already know and Cash and cash equivalents and Marketable securities is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/down-payment">Down payment</a>, <a href="/finance/dream-come-true">Dream come true Calculator</a> and <a href="/finance/dupont-analysis">DuPont analysis Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Defensive interval ratio calculator work out?', 'a' => <<<'TXT'
            Cash and cash equivalents, Marketable securities, Accounts receivable and Annual operating expenses, from Current assets and Daily cash expenditure. The relationship is Defensive interval ratio = Current assets ÷ Daily cash expenditure.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current assets (USD), Daily cash expenditure (USD). Fill current assets and daily cash expenditure and leave Cash and cash equivalents empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Defensive interval ratio, Current assets, Daily cash expenditure and Marketable securities can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Defensive interval ratio = 1 days. Those are the defaults written into the form — move Current assets and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Cash and cash equivalents is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Current assets left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Cash and cash equivalents keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/down-payment', 'name' => 'Down payment'],
            ['path' => '/finance/dream-come-true', 'name' => 'Dream come true Calculator'],
            ['path' => '/finance/dupont-analysis', 'name' => 'DuPont analysis Calculator'],
        ],
        'authors' => [],
    ],
];
