<?php

/**
 * Effective duration
 * /finance/effective-duration
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Effective duration',
    'meta' => ['title' => 'Effective duration — Free Online Calculator', 'description' => 'Effective duration works out coupon per period from face value and annual coupon rate. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Effective duration Calculator', 'updated' => '2024-11-14'],
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
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ytm',
                            'label' => 'Yield to maturity (YTM)',
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
            'title' => 'Effective duration',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yield_differential',
                            'label' => 'Yield differential',
                            'type' => 'number',
                            'help' => 'This determine the upward and downward movement of the bond yield.',
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
                            'name' => 'eff_dur',
                            'label' => 'Effective duration',
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
                            'name' => 'freq_copy',
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
                            'name' => 'period',
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
            'results' => ['freq' => 'coup_rate*par/coup', 'coup_rate' => 'coup*freq/par', 'coup' => 'coup_rate*par/freq', 'par' => 'coup*freq/coup_rate'],
        ],
        [
            'title' => 'coup_annual = par * coup_rate',
            'results' => ['coup_annual' => 'coup_rate*par', 'coup_rate' => 'coup_annual/par', 'par' => 'coup_annual/coup_rate'],
        ],
        [
            'title' => 'up_yield = ytm + yield_differential',
            'results' => ['yield_differential' => 'up_yield - ytm', 'up_yield' => 'yield_differential + ytm', 'ytm' => 'up_yield - yield_differential'],
        ],
        [
            'title' => 'down_yield = ytm - yield_differential ',
            'results' => ['yield_differential' => '-down_yield + ytm', 'down_yield' => '-yield_differential + ytm', 'ytm' => 'down_yield + yield_differential'],
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
            'title' => 'eff_dur = one_way((up_price - down_price) / (2 * yield_differential * bond_price))',
            'results' => ['eff_dur' => <<<'TXT'
            ((1/2)*(bondPrice(par, years, down_yield, coup_rate, freq) - bondPrice(par, years, up_yield, coup_rate, freq))/(yield_differential*bondPrice(par, years, ytm, coup_rate, freq)))
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("bondPrice",function(par,n,ytm,coup_rate,freq){var period=n*freq;var coupon=coup_rate*par/freq;var dis_yield=ytm/freq;var bond_price=0;for(var i=0;i<period;i++){var power=Math.pow(1+dis_yield,i+1);bond_price+=coupon/power}bond_price+=par/Math.pow(1+dis_yield,period);return bond_price});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Effective duration works out Coupon per period and Annual coupon from Face value, Annual coupon rate and Coupon frequency. The arithmetic is the whole method: coupon per period is worked out from face value by one formula, applied once. Coupon per period comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Effective duration calculator works', 'html' => <<<'TXT'
            <p>Effective duration answers one question from 5 numbers, and the answer is Coupon per period, Annual coupon and Bond price.</p><p>Written with the labels from the form, Bond price = bondPrice(Face value, Years to maturity, Yield to maturity (YTM), Annual coupon rate, Coupon frequency).</p><p>What comes back is Coupon per period, Annual coupon, Bond price and Yield differential — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Face value</strong> — in USD</li><li><strong>Annual coupon rate</strong> — in percent</li><li><strong>Coupon frequency</strong> — a plain number, no unit</li><li><strong>Years to maturity</strong> — in year(s)</li><li><strong>Yield to maturity (YTM)</strong> — in percent</li></ul><p>The result boxes are Coupon per period in USD, Annual coupon in USD, Bond price in USD, Yield differential in percent, Effective duration, Down yield in percent, Up yield in percent, Downwards bond price in USD, Upwards bond price in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Years to maturity = 3 year(s) gives <strong>Coupon frequency</strong> = 1.</p><ul><li><strong>Coupon frequency</strong> = 1</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Bond price</strong> = <code>bondPrice(Face value, Years to maturity, Yield to maturity (YTM), Annual coupon rate, Coupon frequency)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Coupon frequency</strong> = 1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Yield differential lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Bond price</strong> = <code>bondPrice(Face value, Years to maturity, Yield to maturity (YTM), Annual coupon rate, Coupon frequency)</code></li><li><strong>Coupon per period</strong> = <code>Annual coupon rate × Face value ÷ Coupon frequency</code></li><li><strong>Coupon frequency</strong> = <code>Annual coupon rate × Face value ÷ Coupon per period</code></li><li><strong>Annual coupon rate</strong> = <code>Coupon per period × Coupon frequency ÷ Face value</code></li><li><strong>Face value</strong> = <code>Coupon per period × Coupon frequency ÷ Annual coupon rate</code></li><li><strong>Annual coupon</strong> = <code>Annual coupon rate × Face value</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Bond price</strong> = <code>bondPrice(Face value, Years to maturity, Yield to maturity (YTM), Annual coupon rate, Coupon frequency)</code> — the form to use when Face value, Years to maturity, Yield to maturity (YTM) and Annual coupon rate are the values you have.</li><li><strong>Coupon per period</strong> = <code>Annual coupon rate × Face value ÷ Coupon frequency</code> — the form to use when Annual coupon rate, Face value and Coupon frequency are the values you have.</li><li><strong>Coupon frequency</strong> = <code>Annual coupon rate × Face value ÷ Coupon per period</code> — the form to use when Annual coupon rate, Face value and Coupon per period are the values you have.</li><li><strong>Annual coupon rate</strong> = <code>Coupon per period × Coupon frequency ÷ Face value</code> — the form to use when Coupon per period, Coupon frequency and Face value are the values you have.</li><li><strong>Face value</strong> = <code>Coupon per period × Coupon frequency ÷ Annual coupon rate</code> — the form to use when Coupon per period, Coupon frequency and Annual coupon rate are the values you have.</li><li><strong>Annual coupon</strong> = <code>Annual coupon rate × Face value</code> — the form to use when Annual coupon rate and Face value are the values you have.</li><li><strong>Annual coupon rate</strong> = <code>Annual coupon ÷ Face value</code> — the form to use when Annual coupon and Face value are the values you have.</li><li><strong>Face value</strong> = <code>Annual coupon ÷ Annual coupon rate</code> — the form to use when Annual coupon and Annual coupon rate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Bond price, Coupon per period and Coupon frequency can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Years to maturity, from 3 to 6 — and the answers go from <strong>Coupon frequency</strong> 1 to <strong>Coupon frequency</strong> 1.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Annual coupon rate and Yield to maturity (YTM) carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Coupon per period, Annual coupon and Bond price are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Face value left as a guess.</strong> Anything typed into Face value is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Annual coupon rate left as a guess.</strong> Anything typed into Annual coupon rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Face value is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Effective duration form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Face value</strong> takes a plain number with no unit attached. Change it and Bond price, Coupon frequency and Annual coupon rate changes with it. Fill it from a measurement rather than a memory — Face value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Annual coupon rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Bond price, Coupon frequency and Coupon per period changes with it. Fill it from a measurement rather than a memory — Annual coupon rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Coupon frequency</strong> takes a plain number with no unit attached. Change it and Bond price, Annual coupon rate and Coupon per period changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Coupon frequency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Years to maturity</strong> is measured in year(s). Change it and Bond price, Upwards bond price and Downwards bond price changes with it. Fill it from a measurement rather than a memory — Years to maturity is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Yield to maturity (YTM)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Bond price, Yield differential and Up yield changes with it. Fill it from a measurement rather than a memory — Yield to maturity (YTM) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Face value, Annual coupon rate, Coupon frequency and Years to maturity ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Face value — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Coupon per period in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Coupon per period is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Face value, Annual coupon rate and Coupon frequency are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Face value, Annual coupon rate and Coupon frequency is what you already know and Coupon per period and Annual coupon is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/full-time-equivalent">Full-time equivalent</a>, <a href="/finance/ffo">Funds from operation (FFO) Calculator</a> and <a href="/finance/future-salary">Future salary Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Effective duration calculator work out?', 'a' => <<<'TXT'
            Coupon per period, Annual coupon, Bond price and Yield differential, from Face value, Years to maturity, Yield to maturity (YTM) and Annual coupon rate. The relationship is Bond price = bondPrice(Face value, Years to maturity, Yield to maturity (YTM), Annual coupon rate, Coupon frequency).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Face value (USD), Annual coupon rate (percent), Coupon frequency, Years to maturity (year(s)), Yield to maturity (YTM) (percent). With face value, annual coupon rate and coupon frequency in place, Coupon per period can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Bond price, Coupon per period, Coupon frequency and Annual coupon rate can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Coupon frequency = 1. Those are the defaults written into the form — move Face value and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Coupon per period is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Face value blank and the page solves for it, reporting Coupon per period instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Coupon per period keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/full-time-equivalent', 'name' => 'Full-time equivalent'],
            ['path' => '/finance/ffo', 'name' => 'Funds from operation (FFO) Calculator'],
            ['path' => '/finance/future-salary', 'name' => 'Future salary Calculator'],
        ],
        'authors' => [],
    ],
];
