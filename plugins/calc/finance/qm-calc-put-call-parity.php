<?php

/**
 * Put-call parity
 * /finance/put-call-parity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Put-call parity',
    'meta' => ['title' => 'Put-call parity Calculator: Free, With Steps', 'description' => 'Put-call parity works out present value of strike price from european call option price, european put option price and spot price of the underlying asset.', 'h1' => 'Put-call parity Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Pull-call parity',
            'note' => 'This calculator will calculate the 4th value after you enter 3 out of 4 values.',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'call_option_price',
                            'label' => 'European call option price',
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
                            'name' => 'put_option_price',
                            'label' => 'European put option price',
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
                            'name' => 'strike_price_present_value',
                            'label' => 'Present value of strike price',
                            'type' => 'number',
                            'help' => 'If you don\'t know the present value of the strike price, open up the second part of the calculator below to find it.',
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
                            'name' => 'spot_price',
                            'label' => 'Spot price of the underlying asset',
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
            'title' => 'Calculate present value of strike price',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'strike_price',
                            'label' => 'Strike price of the options',
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
                            'name' => 'years_to_expiry',
                            'label' => 'Year(s) to expiry',
                            'type' => 'number',
                            'suffix' => 'year(s)',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'risk_free_rate',
                            'label' => 'Risk-free rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'call_option_price + strike_price_present_value = spot_price + put_option_price',
            'results' => ['call_option_price' => 'put_option_price + spot_price - strike_price_present_value', 'put_option_price' => 'call_option_price - spot_price + strike_price_present_value', 'strike_price_present_value' => '-call_option_price + put_option_price + spot_price', 'spot_price' => 'call_option_price - put_option_price + strike_price_present_value'],
        ],
        [
            'title' => 'strike_price_present_value = strike_price / ((1 + risk_free_rate) ^ years_to_expiry)',
            'results' => ['years_to_expiry' => 'log(strike_price/strike_price_present_value)/log(risk_free_rate + 1)', 'strike_price_present_value' => 'strike_price*pow(risk_free_rate + 1, -years_to_expiry)', 'strike_price' => 'strike_price_present_value*pow(risk_free_rate + 1, years_to_expiry)', 'risk_free_rate' => 'pow(strike_price/strike_price_present_value, 1/years_to_expiry) - 1'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Put-call parity takes Strike price of the options, Year(s) to expiry and Risk-free rate and returns European call option price and European put option price. Nothing is looked up on this page: european call option price is computed from strike price of the options and the other boxes, so an unusual pair of values gives an honest answer rather than an error. European call option price is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Put-call parity calculator works', 'html' => <<<'TXT'
            <p>Put-call parity answers one question from 3 numbers, and the answer is European call option price, European put option price and Present value of strike price.</p><p>Written with the labels from the form, European call option price = European put option price + Spot price of the underlying asset − Present value of strike price.</p><p>The answers are European call option price, European put option price, Present value of strike price and Spot price of the underlying asset; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Strike price of the options</strong> — in USD</li><li><strong>Year(s) to expiry</strong> — in year(s)</li><li><strong>Risk-free rate</strong> — in percent</li></ul><p>What you get back is European call option price in USD, European put option price in USD, Present value of strike price in USD, Spot price of the underlying asset in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, European call option price = 10 USD, European put option price = 100 USD, Spot price of the underlying asset = 1000 USD, Strike price of the options = 10 USD, Year(s) to expiry = 100 year(s) and Risk-free rate = 1000 perc; the answers are <strong>Present value of strike price</strong> = 1090 USD.</p><ul><li><strong>Present value of strike price</strong> = 1090 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>European call option price</strong> = <code>European put option price + Spot price of the underlying asset − Present value of strike price</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Present value of strike price</strong> = 1090 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Risk-free rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>European call option price</strong> = <code>European put option price + Spot price of the underlying asset − Present value of strike price</code></li><li><strong>European put option price</strong> = <code>European call option price − Spot price of the underlying asset + Present value of strike price</code></li><li><strong>Present value of strike price</strong> = <code>− European call option price + European put option price + Spot price of the underlying asset</code></li><li><strong>Spot price of the underlying asset</strong> = <code>European call option price − European put option price + Present value of strike price</code></li><li><strong>Year(s) to expiry</strong> = <code>ln(Strike price of the options ÷ Present value of strike price) ÷ ln(Risk-free rate + 1)</code></li><li><strong>Strike price of the options</strong> = <code>Present value of strike price × (Risk-free rate + 1)^(Year(s) to expiry)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>European call option price</strong> = <code>European put option price + Spot price of the underlying asset − Present value of strike price</code> — the form to use when European put option price, Spot price of the underlying asset and Present value of strike price are the values you have.</li><li><strong>European put option price</strong> = <code>European call option price − Spot price of the underlying asset + Present value of strike price</code> — the form to use when European call option price, Spot price of the underlying asset and Present value of strike price are the values you have.</li><li><strong>Present value of strike price</strong> = <code>− European call option price + European put option price + Spot price of the underlying asset</code> — the form to use when European call option price, European put option price and Spot price of the underlying asset are the values you have.</li><li><strong>Spot price of the underlying asset</strong> = <code>European call option price − European put option price + Present value of strike price</code> — the form to use when European call option price, European put option price and Present value of strike price are the values you have.</li><li><strong>Present value of strike price</strong> = <code>Strike price of the options × (Risk-free rate + 1)^(− Year(s) to expiry)</code> — the form to use when Strike price of the options, Risk-free rate and Year(s) to expiry are the values you have.</li><li><strong>Year(s) to expiry</strong> = <code>ln(Strike price of the options ÷ Present value of strike price) ÷ ln(Risk-free rate + 1)</code> — the form to use when Strike price of the options, Present value of strike price and Risk-free rate are the values you have.</li><li><strong>Strike price of the options</strong> = <code>Present value of strike price × (Risk-free rate + 1)^(Year(s) to expiry)</code> — the form to use when Present value of strike price, Risk-free rate and Year(s) to expiry are the values you have.</li><li><strong>Risk-free rate</strong> = <code>(Strike price of the options ÷ Present value of strike price)^(1 ÷ Year(s) to expiry) − 1</code> — the form to use when Strike price of the options, Present value of strike price and Year(s) to expiry are the values you have.</li></ul><p>Any one of European call option price, European put option price and Present value of strike price can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — European call option price, from 10 to 20 — and the answers go from <strong>Present value of strike price</strong> 1090 USD to <strong>Present value of strike price</strong> 1080 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Risk-free rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with European call option price, European put option price and Present value of strike price are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Strike price of the options left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Strike price of the options is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Year(s) to expiry left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Year(s) to expiry is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Strike price of the options to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Put-call parity form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Strike price of the options</strong> takes a plain number with no unit attached. It feeds Year(s) to expiry, Present value of strike price and Risk-free rate. Fill it from a measurement rather than a memory — Strike price of the options is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year(s) to expiry</strong> is measured in year(s). It feeds Present value of strike price, Strike price of the options and Risk-free rate. Fill it from a measurement rather than a memory — Year(s) to expiry is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Risk-free rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Year(s) to expiry, Present value of strike price and Strike price of the options. Fill it from a measurement rather than a memory — Risk-free rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>European call option price</strong> is a plain number. The value follows from European put option price, Spot price of the underlying asset and Present value of strike price. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>European put option price</strong> is a plain number. The value follows from European call option price, Spot price of the underlying asset and Present value of strike price. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Present value of strike price</strong> is a plain number and the page's own defaults put it at 1090. The value follows from European call option price, European put option price and Spot price of the underlying asset. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Spot price of the underlying asset</strong> is a plain number. The value follows from European call option price, European put option price and Present value of strike price. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> European call option price is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Strike price of the options, Year(s) to expiry and Risk-free rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Strike price of the options, Year(s) to expiry and Risk-free rate is what you already know and European call option price and European put option price is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/loan-interest">Loan interest Calculator</a>, <a href="/finance/loan-payment">Loan payment Calculator</a> and <a href="/finance/loan-repayment">Loan repayment Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Put-call parity calculator work out?', 'a' => <<<'TXT'
            European call option price, European put option price, Present value of strike price and Spot price of the underlying asset, from European put option price, Spot price of the underlying asset and Present value of strike price. The relationship is European call option price = European put option price + Spot price of the underlying asset − Present value of strike price.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Strike price of the options (USD), Year(s) to expiry (year(s)), Risk-free rate (percent). Fill strike price of the options, year(s) to expiry and risk-free rate and leave European call option price empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of European call option price, European put option price, Present value of strike price and Spot price of the underlying asset blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Present value of strike price = 1090 USD. The figures come from Strike price of the options as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            European call option price is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Strike price of the options blank and the page solves for it, reporting European call option price instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of European call option price keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/loan-interest', 'name' => 'Loan interest Calculator'],
            ['path' => '/finance/loan-payment', 'name' => 'Loan payment Calculator'],
            ['path' => '/finance/loan-repayment', 'name' => 'Loan repayment Calculator'],
        ],
        'authors' => [],
    ],
];
