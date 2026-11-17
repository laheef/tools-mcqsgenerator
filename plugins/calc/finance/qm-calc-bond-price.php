<?php

/**
 * Bond price
 * /finance/bond-price
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bond price',
    'meta' => ['title' => 'Bond price Calculator: Formula, Steps & Examples', 'description' => 'Bond price works out coupon per period and Annual Coupon and reports both. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Bond price Calculator', 'updated' => '2026-09-14'],
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
                            'label' => 'Annual Coupon',
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
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("bondPrice",function(par,n,ytm,coup_rate,freq){var period=n*freq;var coupon=coup_rate*par/freq;var dis_yield=ytm/freq;var bond_price=0;for(var i=0;i<period;i++){var power=Math.pow(1+dis_yield,i+1);bond_price+=coupon/power}bond_price+=par/Math.pow(1+dis_yield,period);return bond_price});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Bond price works out Coupon per period and Annual Coupon from Face value, Annual coupon rate and Coupon frequency. The arithmetic is the whole method: coupon per period is worked out from face value by one formula, applied once. Coupon per period comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Bond price calculator works', 'html' => <<<'TXT'
            <p>Bond price answers one question from 5 numbers, and the answer is Coupon per period, Annual Coupon and Bond price.</p><p>In the form&#039;s own words, Bond price = bondPrice(Face value, Years to maturity, Yield to maturity (YTM), Annual coupon rate, Coupon frequency).</p><p>What comes back is Coupon per period, Annual Coupon and Bond price — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Face value</strong> — in USD</li><li><strong>Annual coupon rate</strong> — in percent</li><li><strong>Coupon frequency</strong> — a plain number, no unit</li><li><strong>Years to maturity</strong> — in year(s)</li><li><strong>Yield to maturity (YTM)</strong> — in percent</li></ul><p>The result boxes are Coupon per period in USD, Annual Coupon in USD, Bond price in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Years to maturity = 3 year(s) and Yield to maturity (YTM) = 4 perc — through the same formula and the panel reports <strong>Coupon frequency</strong> = 1.</p><ul><li><strong>Coupon frequency</strong> = 1</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Bond price</strong> = <code>bondPrice(Face value, Years to maturity, Yield to maturity (YTM), Annual coupon rate, Coupon frequency)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Coupon frequency</strong> = 1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Annual coupon rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Bond price</strong> = <code>bondPrice(Face value, Years to maturity, Yield to maturity (YTM), Annual coupon rate, Coupon frequency)</code></li><li><strong>Coupon per period</strong> = <code>Annual coupon rate × Face value ÷ Coupon frequency</code></li><li><strong>Coupon frequency</strong> = <code>Annual coupon rate × Face value ÷ Coupon per period</code></li><li><strong>Annual coupon rate</strong> = <code>Coupon per period × Coupon frequency ÷ Face value</code></li><li><strong>Face value</strong> = <code>Coupon per period × Coupon frequency ÷ Annual coupon rate</code></li><li><strong>Annual Coupon</strong> = <code>Annual coupon rate × Face value</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Bond price</strong> = <code>bondPrice(Face value, Years to maturity, Yield to maturity (YTM), Annual coupon rate, Coupon frequency)</code> — the form to use when Face value, Years to maturity, Yield to maturity (YTM) and Annual coupon rate are the values you have.</li><li><strong>Coupon per period</strong> = <code>Annual coupon rate × Face value ÷ Coupon frequency</code> — the form to use when Annual coupon rate, Face value and Coupon frequency are the values you have.</li><li><strong>Coupon frequency</strong> = <code>Annual coupon rate × Face value ÷ Coupon per period</code> — the form to use when Annual coupon rate, Face value and Coupon per period are the values you have.</li><li><strong>Annual coupon rate</strong> = <code>Coupon per period × Coupon frequency ÷ Face value</code> — the form to use when Coupon per period, Coupon frequency and Face value are the values you have.</li><li><strong>Face value</strong> = <code>Coupon per period × Coupon frequency ÷ Annual coupon rate</code> — the form to use when Coupon per period, Coupon frequency and Annual coupon rate are the values you have.</li><li><strong>Annual Coupon</strong> = <code>Annual coupon rate × Face value</code> — the form to use when Annual coupon rate and Face value are the values you have.</li><li><strong>Annual coupon rate</strong> = <code>Annual Coupon ÷ Face value</code> — the form to use when Annual Coupon and Face value are the values you have.</li><li><strong>Face value</strong> = <code>Annual Coupon ÷ Annual coupon rate</code> — the form to use when Annual Coupon and Annual coupon rate are the values you have.</li></ul><p>Any one of Bond price, Coupon per period and Coupon frequency can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Years to maturity, from 3 to 6 — and the answers go from <strong>Coupon frequency</strong> 1 to <strong>Coupon frequency</strong> 1.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Annual coupon rate and Yield to maturity (YTM) carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Coupon per period, Annual Coupon and Bond price are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Face value left as a guess.</strong> Anything typed into Face value is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Annual coupon rate left as a guess.</strong> Anything typed into Annual coupon rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Face value and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Face value</strong> takes a plain number with no unit attached. It feeds Bond price, Coupon frequency and Annual coupon rate. Have it to hand before you start: Face value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Annual coupon rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Bond price, Coupon frequency and Coupon per period. Have it to hand before you start: Annual coupon rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Coupon frequency</strong> takes a plain number with no unit attached. It feeds Bond price, Annual coupon rate and Coupon per period. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Coupon frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Years to maturity</strong> is measured in year(s). It feeds Bond price. Have it to hand before you start: Years to maturity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Yield to maturity (YTM)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Bond price. Have it to hand before you start: Yield to maturity (YTM) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Coupon per period</strong> is a plain number. The value follows from Annual coupon rate, Face value and Coupon frequency. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Annual Coupon</strong> is a plain number. The value follows from Annual coupon rate and Face value. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Bond price</strong> is a plain number. The value follows from Face value, Years to maturity, Yield to maturity (YTM) and Annual coupon rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Coupon frequency</th></tr></thead><tbody><tr><td><strong>Years to maturity</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Yield to maturity (YTM)</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Years to maturity: ten per cent there moves an answer by about 0 per cent, which is why that is the number to measure twice. By contrast, Years to maturity and Yield to maturity (YTM) barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Years to maturity = 1.5 year(s) and Yield to maturity (YTM) = 2 perc, the answer is <strong>Coupon frequency</strong> = 1.</li><li>With Years to maturity = 9 year(s) and Yield to maturity (YTM) = 4 perc, the answer is <strong>Coupon frequency</strong> = 1.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Coupon per period is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Face value, Annual coupon rate and Coupon frequency are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Face value, Annual coupon rate and Coupon frequency is what you already know and Coupon per period and Annual Coupon is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/days-payable-outstanding">Days payable outstanding (DPO) Calculator</a>, <a href="/finance/deadweight-loss">Deadweight loss Calculator</a> and <a href="/finance/debt-avalanche">Debt avalanche Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bond price calculator work out?', 'a' => <<<'TXT'
            Coupon per period, Annual Coupon and Bond price, from Face value, Years to maturity, Yield to maturity (YTM) and Annual coupon rate. The relationship is Bond price = bondPrice(Face value, Years to maturity, Yield to maturity (YTM), Annual coupon rate, Coupon frequency).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Face value (USD), Annual coupon rate (percent), Coupon frequency, Years to maturity (year(s)), Yield to maturity (YTM) (percent). Enter face value, annual coupon rate and coupon frequency; Coupon per period is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Bond price, Coupon per period, Coupon frequency and Annual coupon rate blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Coupon frequency = 1. The figures come from Face value as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Coupon per period is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Face value left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Coupon per period keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/days-payable-outstanding', 'name' => 'Days payable outstanding (DPO) Calculator'],
            ['path' => '/finance/deadweight-loss', 'name' => 'Deadweight loss Calculator'],
            ['path' => '/finance/debt-avalanche', 'name' => 'Debt avalanche Calculator'],
        ],
        'authors' => [],
    ],
];
