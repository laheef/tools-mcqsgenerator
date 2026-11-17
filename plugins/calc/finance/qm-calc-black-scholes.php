<?php

/**
 * Black Scholes
 * /finance/black-scholes
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Black Scholes',
    'meta' => ['title' => 'Black Scholes Calculator — Formula & Results', 'description' => 'Black Scholes works out d1 and d2 from current stock price and strike price. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Black Scholes Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Stock option details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stock_price',
                            'label' => 'Current stock price',
                            'type' => 'number',
                            'help' => 'Spot price.',
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
                            'name' => 'time_to_maturity',
                            'label' => 'Time to maturity',
                            'type' => 'number',
                            'help' => 'Time until expiration of the options contract.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dividend_yield',
                            'label' => 'Dividend yield',
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
                            'name' => 'volatility',
                            'label' => 'Volatility',
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
                            'name' => 'RF_interest_rate',
                            'label' => 'Risk-free interest rate',
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
                            'name' => 'd1',
                            'label' => 'D1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'd2',
                            'label' => 'D2',
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
                            'name' => 'call_option_price',
                            'label' => 'Call option price',
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
                            'label' => 'Put option price',
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
                            'name' => 'N_d1',
                            'label' => 'N d1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'N_d2',
                            'label' => 'N d2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'N_d3',
                            'label' => 'N d3',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'N_d4',
                            'label' => 'N d4',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'confidence_leveld1',
                            'label' => 'Confidence leveld1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'confidence_leveld2',
                            'label' => 'Confidence leveld2',
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
            'title' => 'd1 = (ln(stock_price/strike_price) + (RF_interest_rate - dividend_yield + (volatility^2/2))*time_to_maturity)/(volatility*sqrt(time_to_maturity))',
            'results' => [
                'RF_interest_rate' => 'd1*volatility/sqrt(time_to_maturity) + dividend_yield - 1/2*pow(volatility, 2) - log(stock_price/strike_price)/time_to_maturity',
                'dividend_yield' => 'RF_interest_rate - d1*volatility/sqrt(time_to_maturity) + (1/2)*pow(volatility, 2) + log(stock_price/strike_price)/time_to_maturity',
                'stock_price' => <<<'TXT'
                strike_price*exp(-RF_interest_rate*time_to_maturity + d1*sqrt(time_to_maturity)*volatility + dividend_yield*time_to_maturity - 1/2*time_to_maturity*pow(volatility, 2))
                TXT,
                'd1' => <<<'TXT'
                ((1/2)*time_to_maturity*pow(volatility, 2) + time_to_maturity*(RF_interest_rate - dividend_yield) + log(stock_price/strike_price))/(sqrt(time_to_maturity)*volatility)
                TXT,
                'volatility' => <<<'TXT'
                (d1*time_to_maturity + sqrt(time_to_maturity)*sqrt(time_to_maturity*(-2*RF_interest_rate*time_to_maturity + pow(d1, 2) + 2*dividend_yield*time_to_maturity - 2*log(stock_price/strike_price))))/pow(time_to_maturity, 3/2)
                TXT,
                'time_to_maturity' => <<<'TXT'
                2*(-2*RF_interest_rate*log(stock_price/strike_price) + pow(d1, 2)*pow(volatility, 2) + d1*volatility*sqrt(-4*RF_interest_rate*log(stock_price/strike_price) + pow(d1, 2)*pow(volatility, 2) + 4*dividend_yield*log(stock_price/strike_price) - 2*pow(volatility, 2)*log(stock_price/strike_price)) + 2*dividend_yield*log(stock_price/strike_price) - pow(volatility, 2)*log(stock_price/strike_price))/(4*pow(RF_interest_rate, 2) - 8*RF_interest_rate*dividend_yield + 4*RF_interest_rate*pow(volatility, 2) + 4*pow(dividend_yield, 2) - 4*dividend_yield*pow(volatility, 2) + pow(volatility, 4))
                TXT,
                'strike_price' => <<<'TXT'
                stock_price*exp(RF_interest_rate*time_to_maturity - d1*sqrt(time_to_maturity)*volatility - dividend_yield*time_to_maturity + (1/2)*time_to_maturity*pow(volatility, 2))
                TXT,
            ],
        ],
        [
            'title' => 'd2= d1-volatility*sqrt(time_to_maturity)',
            'results' => ['time_to_maturity' => 'pow(d1 - d2, 2)/pow(volatility, 2)', 'd2' => 'd1 - sqrt(time_to_maturity)*volatility', 'volatility' => '(d1 - d2)/sqrt(time_to_maturity)', 'd1' => 'd2 + sqrt(time_to_maturity)*volatility'],
        ],
        [
            'title' => 'call_option_price = one_way(stock_price * exp(-dividend_yield*time_to_maturity)* N_d1 - strike_price * exp(-RF_interest_rate*time_to_maturity)*N_d2)',
            'results' => ['call_option_price' => <<<'TXT'
            (stock_price*((1/2)*(2*erf(d1) - 1) + 1/2)/exp(dividend_yield*time_to_maturity) - strike_price*((1/2)*(2*erf(d2) - 1) + 1/2)/exp(RF_interest_rate*time_to_maturity))
            TXT],
        ],
        [
            'title' => 'put_option_price =  one_way(strike_price * exp(-RF_interest_rate*time_to_maturity)* N_d4 - stock_price * exp(-dividend_yield*time_to_maturity)*N_d3)',
            'results' => ['put_option_price' => <<<'TXT'
            (-stock_price*(1 - ((1/2)*(2*erf(d1) - 1) + 1/2))/exp(dividend_yield*time_to_maturity) + strike_price*(1 - ((1/2)*(2*erf(d2) - 1) + 1/2))/exp(RF_interest_rate*time_to_maturity))
            TXT],
        ],
        [
            'title' => 'confidence_leveld1 = one_way((2* erf(d1)) - 1)',
            'results' => ['confidence_leveld1' => '(2*erf(d1) - 1)'],
        ],
        [
            'title' => 'N_d1 = one_way((1 + confidence_leveld1)/2)',
            'results' => ['N_d1' => '((1/2)*(2*erf(d1) - 1) + 1/2)'],
        ],
        [
            'title' => 'confidence_leveld2 = one_way((2* erf(d2)) - 1)',
            'results' => ['confidence_leveld2' => '(2*erf(d2) - 1)'],
        ],
        [
            'title' => 'N_d2 = one_way((1 + confidence_leveld2)/2)',
            'results' => ['N_d2' => '((1/2)*(2*erf(d2) - 1) + 1/2)'],
        ],
        [
            'title' => 'N_d3 = one_way(1 - N_d1)',
            'results' => ['N_d3' => '(1 - ((1/2)*(2*erf(d1) - 1) + 1/2))'],
        ],
        [
            'title' => 'N_d4 = one_way(1 - N_d2)',
            'results' => ['N_d4' => '(1 - ((1/2)*(2*erf(d2) - 1) + 1/2))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var Z_MAX=6;var ROUND_FLOAT=6;function poz(z){var y,x,w;if(z===0){x=0}else{y=0.5*Math.abs(z);if(y>Z_MAX*0.5){x=1}else if(y<1){w=y*y;x=((((((((0.000124818987*w-0.001075204047)*w+0.005198775019)*w-0.019198292004)*w+0.059054035642)*w-0.151968751364)*w+0.319152932694)*w-0.5319230073)*w+0.797884560593)*y*2}else{y-=2;x=(((((((((((((-0.000045255659*y+0.00015252929)*y-0.000019538132)*y-0.000676904986)*y+0.001390604284)*y-0.00079462082)*y-0.002034254874)*y+0.006549791214)*y-0.010557625006)*y+0.011630447319)*y-0.009279453341)*y+0.005353579108)*y-0.002141268741)*y+0.000535310849)*y+0.999936657524}}return z>0?(x+1)*0.5:(1-x)*0.5}omni.define("erf",function(_z){return poz(_z)});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Current stock price, Strike price and Time to maturity into Black Scholes and the answer comes back as D1 and D2. The arithmetic is the whole method: d1 is worked out from current stock price by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Black Scholes calculator works', 'html' => <<<'TXT'
            <p>Black Scholes answers one question from 6 numbers, and the answer is D1, D2 and Call option price.</p><p>In the form&#039;s own words, D1 = ((1 ÷ 2) × Time to maturity × (Volatility)^(2) + Time to maturity × (Risk-free interest rate − Dividend yield) + ln(Current stock price ÷ Strike price)) ÷ (√(Time to maturity) × Volatility).</p><p>The result panel carries D1, D2, Call option price and Put option price, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 6 boxes, and nothing else.</p><ul><li><strong>Current stock price</strong> — in USD. Spot price.</li><li><strong>Strike price</strong> — in USD</li><li><strong>Time to maturity</strong> — in years. Time until expiration of the options contract.</li><li><strong>Dividend yield</strong> — in percent</li><li><strong>Volatility</strong> — in percent</li><li><strong>Risk-free interest rate</strong> — in percent</li></ul><p>The answers come back as D1, D2, Call option price in USD, Put option price in USD, N d1, N d2, N d3, N d4, Confidence leveld1, Confidence leveld2. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Current stock price = 10 USD, Strike price = 100 USD, Time to maturity = 1000 yrs, Dividend yield = 10 perc, Volatility = 100 perc and Risk-free interest rate = 1000 perc — through the same formula and the panel reports <strong>D1</strong> = -3.75, <strong>D2</strong> = -4.32, <strong>Call option price</strong> = 1.032e-4 USD, <strong>Put option price</strong> = 86.88 USD, <strong>Confidence leveld1</strong> = -0.9998, <strong>N d1</strong> = 8.731e-5, <strong>Confidence leveld2</strong> = -1, <strong>N d2</strong> = 7.945e-6, <strong>N d3</strong> = 0.9999 and <strong>N d4</strong> = 1.</p><ul><li><strong>D1</strong> = -3.75</li><li><strong>D2</strong> = -4.32</li><li><strong>Call option price</strong> = 1.032e-4 USD</li><li><strong>Put option price</strong> = 86.88 USD</li><li><strong>Confidence leveld1</strong> = -0.9998</li><li><strong>N d1</strong> = 8.731e-5</li><li><strong>Confidence leveld2</strong> = -1</li><li><strong>N d2</strong> = 7.945e-6</li><li><strong>N d3</strong> = 0.9999</li><li><strong>N d4</strong> = 1</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>D1</strong> = <code>((1 ÷ 2) × Time to maturity × (Volatility)^(2) + Time to maturity × (Risk-free interest rate − Dividend yield) + ln(Current stock price ÷ Strike price)) ÷ (√(Time to maturity) × Volatility)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>D1</strong> = -3.75, <strong>D2</strong> = -4.32, <strong>Call option price</strong> = 1.032e-4, <strong>Put option price</strong> = 86.88, <strong>Confidence leveld1</strong> = -0.9998, <strong>N d1</strong> = 8.731e-5, <strong>Confidence leveld2</strong> = -1, <strong>N d2</strong> = 7.945e-6, <strong>N d3</strong> = 0.9999 and <strong>N d4</strong> = 1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Time to maturity lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>D1</strong> = <code>((1 ÷ 2) × Time to maturity × (Volatility)^(2) + Time to maturity × (Risk-free interest rate − Dividend yield) + ln(Current stock price ÷ Strike price)) ÷ (√(Time to maturity) × Volatility)</code></li><li><strong>Risk-free interest rate</strong> = <code>D1 × Volatility ÷ √(Time to maturity) + Dividend yield − 1 ÷ 2 × (Volatility)^(2) − ln(Current stock price ÷ Strike price) ÷ Time to maturity</code></li><li><strong>Dividend yield</strong> = <code>Risk-free interest rate − D1 × Volatility ÷ √(Time to maturity) + (1 ÷ 2) × (Volatility)^(2) + ln(Current stock price ÷ Strike price) ÷ Time to maturity</code></li><li><strong>Current stock price</strong> = <code>Strike price × e^( − Risk-free interest rate × Time to maturity + D1 × √(Time to maturity) × Volatility + Dividend yield × Time to maturity − 1 ÷ 2 × Time to maturity × (Volatility)^(2))</code></li><li><strong>Strike price</strong> = <code>Current stock price × e^(Risk-free interest rate × Time to maturity − D1 × √(Time to maturity) × Volatility − Dividend yield × Time to maturity + (1 ÷ 2) × Time to maturity × (Volatility)^(2))</code></li><li><strong>D2</strong> = <code>D1 − √(Time to maturity) × Volatility</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>D1</strong> = <code>((1 ÷ 2) × Time to maturity × (Volatility)^(2) + Time to maturity × (Risk-free interest rate − Dividend yield) + ln(Current stock price ÷ Strike price)) ÷ (√(Time to maturity) × Volatility)</code> — the form to use when Time to maturity, Volatility, Risk-free interest rate and Dividend yield are the values you have.</li><li><strong>Risk-free interest rate</strong> = <code>D1 × Volatility ÷ √(Time to maturity) + Dividend yield − 1 ÷ 2 × (Volatility)^(2) − ln(Current stock price ÷ Strike price) ÷ Time to maturity</code> — the form to use when D1, Volatility, Time to maturity and Dividend yield are the values you have.</li><li><strong>Dividend yield</strong> = <code>Risk-free interest rate − D1 × Volatility ÷ √(Time to maturity) + (1 ÷ 2) × (Volatility)^(2) + ln(Current stock price ÷ Strike price) ÷ Time to maturity</code> — the form to use when Risk-free interest rate, D1, Volatility and Time to maturity are the values you have.</li><li><strong>Current stock price</strong> = <code>Strike price × e^( − Risk-free interest rate × Time to maturity + D1 × √(Time to maturity) × Volatility + Dividend yield × Time to maturity − 1 ÷ 2 × Time to maturity × (Volatility)^(2))</code> — the form to use when Strike price, Risk-free interest rate, Time to maturity and D1 are the values you have.</li><li><strong>Strike price</strong> = <code>Current stock price × e^(Risk-free interest rate × Time to maturity − D1 × √(Time to maturity) × Volatility − Dividend yield × Time to maturity + (1 ÷ 2) × Time to maturity × (Volatility)^(2))</code> — the form to use when Current stock price, Risk-free interest rate, Time to maturity and D1 are the values you have.</li><li><strong>D2</strong> = <code>D1 − √(Time to maturity) × Volatility</code> — the form to use when D1, Time to maturity and Volatility are the values you have.</li><li><strong>Time to maturity</strong> = <code>(D1 − D2)^(2) ÷ (Volatility)^(2)</code> — the form to use when D1, D2 and Volatility are the values you have.</li><li><strong>Volatility</strong> = <code>(D1 − D2) ÷ √(Time to maturity)</code> — the form to use when D1, D2 and Time to maturity are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of D1, Risk-free interest rate and Dividend yield can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Current stock price, from 10 to 20 — and the answers go from <strong>D1</strong> -3.75, <strong>D2</strong> -4.32, <strong>Call option price</strong> 1.032e-4 USD, <strong>Put option price</strong> 86.88 USD, <strong>Confidence leveld1</strong> -0.9998, <strong>N d1</strong> 8.731e-5, <strong>Confidence leveld2</strong> -1, <strong>N d2</strong> 7.945e-6, <strong>N d3</strong> 0.9999 and <strong>N d4</strong> 1 to <strong>D1</strong> -2.52, <strong>D2</strong> -3.08, <strong>Call option price</strong> 0.018 USD, <strong>Put option price</strong> 76.91 USD, <strong>Confidence leveld1</strong> -0.9883, <strong>N d1</strong> 0.0058, <strong>Confidence leveld2</strong> -0.998, <strong>N d2</strong> 0.001, <strong>N d3</strong> 0.9942 and <strong>N d4</strong> 0.999.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Time to maturity, Dividend yield and Volatility carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> D1, D2 and Call option price are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Current stock price left as a guess.</strong> Anything typed into Current stock price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Strike price left as a guess.</strong> Anything typed into Strike price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Current stock price to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Black Scholes form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Current stock price</strong> takes a plain number with no unit attached. Change it and Risk-free interest rate, Dividend yield and D1 changes with it. Fill it from a measurement rather than a memory — Current stock price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Strike price</strong> takes a plain number with no unit attached. Change it and Risk-free interest rate, Dividend yield and Current stock price changes with it. Fill it from a measurement rather than a memory — Strike price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Time to maturity</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. Time until expiration of the options contract. Change it and Risk-free interest rate, Dividend yield and Current stock price changes with it. Fill it from a measurement rather than a memory — Time to maturity is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Dividend yield</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Risk-free interest rate, Current stock price and D1 changes with it. Fill it from a measurement rather than a memory — Dividend yield is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Volatility</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Risk-free interest rate, Dividend yield and Current stock price changes with it. Fill it from a measurement rather than a memory — Volatility is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Risk-free interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Dividend yield, Current stock price and D1 changes with it. Fill it from a measurement rather than a memory — Risk-free interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind D1 is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are years and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Current stock price, Strike price and Time to maturity are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Current stock price, Strike price and Time to maturity measured, D1 and D2 wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/peg-ratio">PEG ratio</a>, <a href="/finance/pence-to-pounds">Pence to pounds converter Calculator</a> and <a href="/finance/percent-off">Percent off Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Black Scholes calculator work out?', 'a' => <<<'TXT'
            D1, D2, Call option price and Put option price, from Time to maturity, Volatility, Risk-free interest rate and Dividend yield. The relationship is D1 = ((1 ÷ 2) × Time to maturity × (Volatility)^(2) + Time to maturity × (Risk-free interest rate − Dividend yield) + ln(Current stock price ÷ Strike price)) ÷ (√(Time to maturity) × Volatility).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current stock price (USD), Strike price (USD), Time to maturity (years), Dividend yield (percent), Volatility (percent). Enter current stock price, strike price and time to maturity; D1 is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. D1, Risk-free interest rate, Dividend yield and Current stock price can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            D1 = -3.75, D2 = -4.32, Call option price = 1.032e-4 USD, Put option price = 86.88 USD, Confidence leveld1 = -0.9998, N d1 = 8.731e-5, Confidence leveld2 = -1, N d2 = 7.945e-6, N d3 = 0.9999 and N d4 = 1. That comes from the page's own defaults, entered in Current stock price; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally D1 is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Current stock price blank and the page solves for it, reporting D1 instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of D1 keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/peg-ratio', 'name' => 'PEG ratio'],
            ['path' => '/finance/pence-to-pounds', 'name' => 'Pence to pounds converter Calculator'],
            ['path' => '/finance/percent-off', 'name' => 'Percent off Calculator'],
        ],
        'authors' => [],
    ],
];
