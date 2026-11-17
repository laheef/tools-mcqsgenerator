<?php

/**
 * Bond convexity
 * /finance/bond-convexity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bond convexity',
    'meta' => ['title' => 'Bond convexity Calculator — Formula & Results', 'description' => 'Bond convexity turns face value and annual coupon rate into coupon per period and annual coupon. Every box can be solved for, not only the one in the title.', 'h1' => 'Bond convexity Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => 'Coupon per period',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'par',
                            'label' => 'Face value',
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
                            'name' => 'coup_rate',
                            'label' => 'Annual coupon rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'freq',
                            'label' => 'Coupon frequency',
                            'type' => 'select',
                            'options' => [
                                'Annually' => '1.000000000000000',
                                'Semi-annually' => '2.000000000000000',
                                'Quarterly' => '4.000000000000000',
                                'Monthly' => '12.000000000000000',
                                'Weekly' => '52.000000000000000',
                                'Daily' => '365.000000000000000',
                            ],
                            'control' => 'DROPDOWN',
                            'default' => 'Annually',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coup',
                            'label' => 'Coupon per period',
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
                            'name' => 'coup_annual',
                            'label' => 'Annual coupon',
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
            'title' => 'Bond price',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'years',
                            'label' => 'Years to maturity',
                            'type' => 'number',
                            'suffix' => 'year(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ytm',
                            'label' => 'Yield to maturity',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bond_price',
                            'label' => 'Bond price',
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
            'title' => 'Bond convexity',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yield_differential',
                            'label' => 'Yield differential',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eff_cov',
                            'label' => 'Bond convexity',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'There is too much data to show on the chart.'],
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
                            'name' => 'up_yield',
                            'label' => 'Up yield',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'down_yield',
                            'label' => 'Down yield',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'up_price',
                            'label' => 'Upwards bond price',
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
                            'name' => 'down_price',
                            'label' => 'Downwards bond price',
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
                            'name' => 'period',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'freq_chart',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'bond_price = bondPrice(par, years, ytm, coup_rate, freq)',
            'results' => ['bond_price' => 'bondPrice(par, years, ytm, coup_rate, freq)'],
        ],
        [
            'title' => 'coup = (par * coup_rate) / freq',
            'results' => ['coup_rate' => 'coup*freq/par', 'par' => 'coup*freq/coup_rate', 'coup' => 'coup_rate*par/freq', 'freq' => 'coup_rate*par/coup'],
        ],
        [
            'title' => 'coup_annual = par * coup_rate',
            'results' => ['coup_annual' => 'coup_rate*par', 'coup_rate' => 'coup_annual/par', 'par' => 'coup_annual/coup_rate'],
        ],
        [
            'title' => 'up_yield = ytm + yield_differential',
            'results' => ['up_yield' => 'yield_differential + ytm', 'yield_differential' => 'up_yield - ytm', 'ytm' => 'up_yield - yield_differential'],
        ],
        [
            'title' => 'down_yield = ytm - yield_differential',
            'results' => ['down_yield' => '-yield_differential + ytm', 'yield_differential' => '-down_yield + ytm', 'ytm' => 'down_yield + yield_differential'],
        ],
        [
            'title' => 'up_price = bondPrice(par, years, down_yield, coup_rate, freq)',
            'results' => ['up_price' => 'bondPrice(par, years, down_yield, coup_rate, freq)'],
        ],
        [
            'title' => 'down_price = bondPrice(par, years, up_yield, coup_rate, freq)',
            'results' => ['down_price' => 'bondPrice(par, years, up_yield, coup_rate, freq)'],
        ],
        [
            'title' => 'eff_cov = one_way((up_price + down_price - 2 * bond_price) / ((yield_differential ^ 2) * bond_price))',
            'results' => ['eff_cov' => <<<'TXT'
            ((bondPrice(par, years, down_yield, coup_rate, freq) + bondPrice(par, years, up_yield, coup_rate, freq) - 2*bondPrice(par, years, ytm, coup_rate, freq))/(pow(yield_differential, 2)*bondPrice(par, years, ytm, coup_rate, freq)))
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("bondPrice",function(par,n,ytm,coup_rate,freq){var period=n*freq;var coupon=coup_rate*par/freq;var dis_yield=ytm/freq;var bond_price=0;for(var i=0;i<period;i++){var power=Math.pow(1+dis_yield,i+1);bond_price+=coupon/power}bond_price+=par/Math.pow(1+dis_yield,period);return mathjs.bignumber(bond_price)});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Bond convexity takes Face value, Annual coupon rate and Coupon frequency and returns Coupon per period and Annual coupon. Nothing is looked up on this page: coupon per period is computed from face value and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Coupon per period is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Bond convexity calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Bond convexity: it takes 5 numbers and reports Coupon per period, Annual coupon and Bond price.</p><p>The relationship it solves reads Bond price = bondPrice(Face value, Years to maturity, Yield to maturity, Annual coupon rate, Coupon frequency).</p><p>The result panel carries Coupon per period, Annual coupon, Bond price and Yield differential, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Face value</strong> — in USD</li><li><strong>Annual coupon rate</strong> — in percent</li><li><strong>Coupon frequency</strong> — a plain number, no unit</li><li><strong>Years to maturity</strong> — in year(s)</li><li><strong>Yield to maturity</strong> — in percent</li></ul><p>The answers come back as Coupon per period in USD, Annual coupon in USD, Bond price in USD, Yield differential in percent, Bond convexity, Up yield in percent, Down yield in percent, Upwards bond price in USD, Downwards bond price in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Years to maturity = 3 year(s); the answers are <strong>Coupon frequency</strong> = 1.</p><ul><li><strong>Coupon frequency</strong> = 1</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Bond price</strong> = <code>bondPrice(Face value, Years to maturity, Yield to maturity, Annual coupon rate, Coupon frequency)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Coupon frequency</strong> = 1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Yield differential offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Bond price</strong> = <code>bondPrice(Face value, Years to maturity, Yield to maturity, Annual coupon rate, Coupon frequency)</code></li><li><strong>Coupon per period</strong> = <code>Annual coupon rate × Face value ÷ Coupon frequency</code></li><li><strong>Annual coupon rate</strong> = <code>Coupon per period × Coupon frequency ÷ Face value</code></li><li><strong>Face value</strong> = <code>Coupon per period × Coupon frequency ÷ Annual coupon rate</code></li><li><strong>Coupon frequency</strong> = <code>Annual coupon rate × Face value ÷ Coupon per period</code></li><li><strong>Annual coupon</strong> = <code>Annual coupon rate × Face value</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Bond price</strong> = <code>bondPrice(Face value, Years to maturity, Yield to maturity, Annual coupon rate, Coupon frequency)</code> — the form to use when Face value, Years to maturity, Yield to maturity and Annual coupon rate are the values you have.</li><li><strong>Coupon per period</strong> = <code>Annual coupon rate × Face value ÷ Coupon frequency</code> — the form to use when Annual coupon rate, Face value and Coupon frequency are the values you have.</li><li><strong>Annual coupon rate</strong> = <code>Coupon per period × Coupon frequency ÷ Face value</code> — the form to use when Coupon per period, Coupon frequency and Face value are the values you have.</li><li><strong>Face value</strong> = <code>Coupon per period × Coupon frequency ÷ Annual coupon rate</code> — the form to use when Coupon per period, Coupon frequency and Annual coupon rate are the values you have.</li><li><strong>Coupon frequency</strong> = <code>Annual coupon rate × Face value ÷ Coupon per period</code> — the form to use when Annual coupon rate, Face value and Coupon per period are the values you have.</li><li><strong>Annual coupon</strong> = <code>Annual coupon rate × Face value</code> — the form to use when Annual coupon rate and Face value are the values you have.</li><li><strong>Annual coupon rate</strong> = <code>Annual coupon ÷ Face value</code> — the form to use when Annual coupon and Face value are the values you have.</li><li><strong>Face value</strong> = <code>Annual coupon ÷ Annual coupon rate</code> — the form to use when Annual coupon and Annual coupon rate are the values you have.</li></ul><p>Any one of Bond price, Coupon per period and Annual coupon rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Years to maturity, from 3 to 6 — and the answers go from <strong>Coupon frequency</strong> 1 to <strong>Coupon frequency</strong> 1.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Annual coupon rate and Yield to maturity is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Coupon per period, Annual coupon and Bond price are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Face value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Face value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Annual coupon rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Annual coupon rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Face value to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Face value</strong> takes a plain number with no unit attached. Change it and Bond price, Annual coupon rate and Coupon per period changes with it. Have it to hand before you start: Face value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Annual coupon rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Bond price, Face value and Coupon per period changes with it. Have it to hand before you start: Annual coupon rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Coupon frequency</strong> takes a plain number with no unit attached. Change it and Bond price, Annual coupon rate and Face value changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Coupon frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Years to maturity</strong> is measured in year(s). Change it and Bond price, Upwards bond price and Downwards bond price changes with it. Have it to hand before you start: Years to maturity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Yield to maturity</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Bond price, Up yield and Yield differential changes with it. Have it to hand before you start: Yield to maturity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Coupon per period is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Face value, Annual coupon rate and Coupon frequency are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Face value, Annual coupon rate and Coupon frequency measured, Coupon per period and Annual coupon wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/operating-cash-flow-ratio">Operating cash flow ratio Calculator</a>, <a href="/finance/operating-cash-flow">Operating cash flow</a> and <a href="/finance/operating-margin">Operating margin Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Bond convexity is a number to act on, so the useful question is what to do with Coupon per period (USD), Annual coupon (USD) and Bond price (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Face value, Annual coupon rate, Coupon frequency and Years to maturity alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bond convexity calculator work out?', 'a' => <<<'TXT'
            Coupon per period, Annual coupon, Bond price and Yield differential, from Face value, Years to maturity, Yield to maturity and Annual coupon rate. The relationship is Bond price = bondPrice(Face value, Years to maturity, Yield to maturity, Annual coupon rate, Coupon frequency).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Face value (USD), Annual coupon rate (percent), Coupon frequency, Years to maturity (year(s)), Yield to maturity (percent). Fill face value, annual coupon rate and coupon frequency and leave Coupon per period empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Bond price, Coupon per period, Annual coupon rate and Face value blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Coupon frequency = 1. Those are the defaults written into the form — move Face value and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Coupon per period is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Face value left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Coupon per period keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/operating-cash-flow-ratio', 'name' => 'Operating cash flow ratio Calculator'],
            ['path' => '/finance/operating-cash-flow', 'name' => 'Operating cash flow'],
            ['path' => '/finance/operating-margin', 'name' => 'Operating margin Calculator'],
        ],
        'authors' => [],
    ],
];
