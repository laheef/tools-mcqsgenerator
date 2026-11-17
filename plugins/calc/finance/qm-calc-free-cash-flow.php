<?php

/**
 * Free cash flow
 * /finance/free-cash-flow
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Free cash flow',
    'meta' => ['title' => 'Free cash flow Calculator — Formula & Results', 'description' => 'Free cash flow takes operating cash flow, capital expeditures and number of shares outstanding and returns market capitalization. The answer is shown in USD.', 'h1' => 'Free cash flow Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => 'Free cash flow calculation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'operating_cash_flow',
                            'label' => 'Operating cash flow',
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
                            'name' => 'capital_expeditures',
                            'label' => 'Capital expeditures',
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
                            'name' => 'free_cash_flow',
                            'label' => 'Free cash flow',
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
            'title' => 'Free cash flow per share',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_shares_outstanding',
                            'label' => 'Number of shares outstanding',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'free_cash_flow_per_share',
                            'label' => 'Free cash flow per share',
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
            'title' => 'Free cash flow yield',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stock_price',
                            'label' => 'Stock price',
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
                            'name' => 'market_cap',
                            'label' => 'Market capitalization',
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
                            'name' => 'free_cash_flow_yield',
                            'label' => 'Free cash flow yield',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Free cash flow margin',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'revenue',
                            'label' => 'Revenue',
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
                            'name' => 'free_cash_flow_margin',
                            'label' => 'Free cash flow margin',
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
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'place' => [0, 0, 0],
                    'fields' => [
                        ['type' => 'note', 'text' => 'While there are a lot of companies that reports negative free cash flow, not all of them are bad investments. Check our ROCE calculator to verify it.'],
                        ['type' => 'note', 'text' => 'Considered to be a great company. But, hey! Check its revenue growth to see if that is true. Maybe you are in front of a true compounder.'],
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'free_cash_flow_yield < 0.05 and free_cash_flow_yield > 0', 'text' => 'Considered to be overvalued. Find out its fair value with our discounted cash flow calculator so you can see whether is true or it trades at discount.&nbsp;'],
                                ['when' => 'free_cash_flow_yield >= 0.05 and free_cash_flow_yield <= 0.20', 'text' => 'Considered to be in the normal valuation range. You should pick the company with the highest gross margin.&nbsp;'],
                                ['when' => 'free_cash_flow_yield > 0.20', 'text' => 'Sounds like you found a great bargain. Check its EPS growth to see if the company is constantly making more money.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'operating_cash_flow-capital_expeditures=free_cash_flow',
            'results' => ['operating_cash_flow' => 'capital_expeditures + free_cash_flow', 'free_cash_flow' => '-capital_expeditures + operating_cash_flow', 'capital_expeditures' => '-free_cash_flow + operating_cash_flow'],
        ],
        [
            'title' => 'free_cash_flow_per_share=free_cash_flow/number_shares_outstanding',
            'results' => ['free_cash_flow' => 'free_cash_flow_per_share*number_shares_outstanding', 'number_shares_outstanding' => 'free_cash_flow/free_cash_flow_per_share', 'free_cash_flow_per_share' => 'free_cash_flow/number_shares_outstanding'],
        ],
        [
            'title' => 'free_cash_flow_yield=free_cash_flow_per_share/stock_price',
            'results' => ['free_cash_flow_per_share' => 'free_cash_flow_yield*stock_price', 'free_cash_flow_yield' => 'free_cash_flow_per_share/stock_price', 'stock_price' => 'free_cash_flow_per_share/free_cash_flow_yield'],
        ],
        [
            'title' => 'market_cap=stock_price*number_shares_outstanding',
            'results' => ['number_shares_outstanding' => 'market_cap/stock_price', 'market_cap' => 'number_shares_outstanding*stock_price', 'stock_price' => 'market_cap/number_shares_outstanding'],
        ],
        [
            'title' => 'free_cash_flow_yield=free_cash_flow/market_cap',
            'results' => ['free_cash_flow' => 'free_cash_flow_yield*market_cap', 'free_cash_flow_yield' => 'free_cash_flow/market_cap', 'market_cap' => 'free_cash_flow/free_cash_flow_yield'],
        ],
        [
            'title' => 'free_cash_flow_margin=free_cash_flow/revenue',
            'results' => ['free_cash_flow' => 'free_cash_flow_margin*revenue', 'revenue' => 'free_cash_flow/free_cash_flow_margin', 'free_cash_flow_margin' => 'free_cash_flow/revenue'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Free cash flow works out Operating cash flow and Capital expeditures from Free cash flow and Number of shares outstanding. There is no hidden constant here: change operating cash flow and free cash flow moves with it. The main result, Operating cash flow, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Free cash flow calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Free cash flow: it takes 2 numbers and reports Operating cash flow, Capital expeditures and Free cash flow per share.</p><p>Written with the labels from the form, Operating cash flow = Capital expeditures + Free cash flow.</p><p>What comes back is Operating cash flow, Capital expeditures, Free cash flow per share and Stock price — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Free cash flow</strong> — in USD</li><li><strong>Number of shares outstanding</strong> — a plain number, no unit</li></ul><p>The answers come back as Operating cash flow in USD, Capital expeditures in USD, Free cash flow per share in USD, Stock price in USD, Market capitalization in USD, Free cash flow yield in percent, Revenue in USD, Free cash flow margin in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Operating cash flow = 10 USD, Capital expeditures = 100 USD, Free cash flow = 1000 USD, Number of shares outstanding = 10, Stock price = 100 USD, Market capitalization = 1000 USD, Free cash flow yield = 10 perc, Revenue = 100 USD and Free cash flow margin = 1000 perc; the answers are <strong>Free cash flow per share</strong> = 100 USD.</p><ul><li><strong>Free cash flow per share</strong> = 100 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Operating cash flow</strong> = <code>Capital expeditures + Free cash flow</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Free cash flow per share</strong> = 100. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Free cash flow yield lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Operating cash flow</strong> = <code>Capital expeditures + Free cash flow</code></li><li><strong>Free cash flow</strong> = <code>− Capital expeditures + Operating cash flow</code></li><li><strong>Capital expeditures</strong> = <code>− Free cash flow + Operating cash flow</code></li><li><strong>Free cash flow per share</strong> = <code>Free cash flow ÷ Number of shares outstanding</code></li><li><strong>Number of shares outstanding</strong> = <code>Free cash flow ÷ Free cash flow per share</code></li><li><strong>Free cash flow yield</strong> = <code>Free cash flow per share ÷ Stock price</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Operating cash flow</strong> = <code>Capital expeditures + Free cash flow</code> — the form to use when Capital expeditures and Free cash flow are the values you have.</li><li><strong>Free cash flow</strong> = <code>− Capital expeditures + Operating cash flow</code> — the form to use when Capital expeditures and Operating cash flow are the values you have.</li><li><strong>Capital expeditures</strong> = <code>− Free cash flow + Operating cash flow</code> — the form to use when Free cash flow and Operating cash flow are the values you have.</li><li><strong>Free cash flow per share</strong> = <code>Free cash flow ÷ Number of shares outstanding</code> — the form to use when Free cash flow and Number of shares outstanding are the values you have.</li><li><strong>Free cash flow</strong> = <code>Free cash flow per share × Number of shares outstanding</code> — the form to use when Free cash flow per share and Number of shares outstanding are the values you have.</li><li><strong>Number of shares outstanding</strong> = <code>Free cash flow ÷ Free cash flow per share</code> — the form to use when Free cash flow and Free cash flow per share are the values you have.</li><li><strong>Free cash flow yield</strong> = <code>Free cash flow per share ÷ Stock price</code> — the form to use when Free cash flow per share and Stock price are the values you have.</li><li><strong>Free cash flow per share</strong> = <code>Free cash flow yield × Stock price</code> — the form to use when Free cash flow yield and Stock price are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Operating cash flow, Free cash flow and Capital expeditures can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Operating cash flow from 10 to 20, leaving every other box alone. The panel moves from <strong>Free cash flow per share</strong> 100 USD to <strong>Free cash flow per share</strong> 100 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Operating cash flow, Capital expeditures and Free cash flow per share are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Free cash flow left as a guess.</strong> Anything typed into Free cash flow is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Number of shares outstanding left as a guess.</strong> Anything typed into Number of shares outstanding is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Free cash flow to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Free cash flow form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Free cash flow</strong> takes a plain number with no unit attached. Change it and Operating cash flow, Capital expeditures and Number of shares outstanding changes with it. Fill it from a measurement rather than a memory — Free cash flow is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of shares outstanding</strong> takes a plain number with no unit attached. Change it and Free cash flow, Free cash flow per share and Market capitalization changes with it. Fill it from a measurement rather than a memory — Number of shares outstanding is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Operating cash flow</strong> is a plain number. It is worked out from Capital expeditures and Free cash flow. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Capital expeditures</strong> is a plain number. It is worked out from Free cash flow and Operating cash flow. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Free cash flow per share</strong> is a plain number and the page's own defaults put it at 100. It is worked out from Free cash flow and Number of shares outstanding. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Stock price</strong> is a plain number. It is worked out from Free cash flow per share and Free cash flow yield. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Market capitalization</strong> is a plain number. It is worked out from Number of shares outstanding and Stock price. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Free cash flow yield</strong> is a percent figure. It is worked out from Free cash flow per share and Stock price. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Revenue</strong> is a plain number. It is worked out from Free cash flow and Free cash flow margin. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Free cash flow margin</strong> is a percent figure. It is worked out from Free cash flow and Revenue. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Free cash flow actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Operating cash flow is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Free cash flow and Number of shares outstanding are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Free cash flow and Number of shares outstanding is what you already know and Operating cash flow and Capital expeditures is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/biweekly-pay">Biweekly pay</a>, <a href="/finance/black-friday">Black Friday Calculator</a> and <a href="/finance/black-scholes">Black Scholes Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Free cash flow calculator work out?', 'a' => <<<'TXT'
            Operating cash flow, Capital expeditures, Free cash flow per share and Stock price, from Capital expeditures and Free cash flow. The relationship is Operating cash flow = Capital expeditures + Free cash flow.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Free cash flow (USD), Number of shares outstanding. Fill free cash flow and number of shares outstanding and leave Operating cash flow empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Operating cash flow, Free cash flow, Capital expeditures and Free cash flow per share can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Free cash flow per share = 100 USD. Those are the defaults written into the form — move Free cash flow and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Operating cash flow is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Free cash flow blank and the page solves for it, reporting Operating cash flow instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Operating cash flow keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/biweekly-pay', 'name' => 'Biweekly pay'],
            ['path' => '/finance/black-friday', 'name' => 'Black Friday Calculator'],
            ['path' => '/finance/black-scholes', 'name' => 'Black Scholes Calculator'],
        ],
        'authors' => [],
    ],
];
