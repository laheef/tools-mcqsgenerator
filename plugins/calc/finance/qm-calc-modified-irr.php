<?php

/**
 * MIRR
 * /finance/modified-irr
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'MIRR',
    'meta' => ['title' => 'MIRR Calculator — Free, With Worked Examples', 'description' => 'Enter financing rate and reinvestment rate and get MIRR back. Any box can be the unknown. Results come back in perc, with any other unit a click away.', 'h1' => 'MIRR Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'frate',
                            'label' => 'Financing rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rrate',
                            'label' => 'Reinvestment rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_flow_0',
                            'label' => 'Initial investment',
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
            'title' => 'Annual cash flows',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_flow_1',
                            'label' => 'Year 1',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_flow_2',
                            'label' => 'Year 2',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_flow_3',
                            'label' => 'Year 3',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_flow_4',
                            'label' => 'Year 4',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_flow_5',
                            'label' => 'Year 5',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Enter more annual cash flows',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_flow_6',
                            'label' => 'Year 6',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_flow_7',
                            'label' => 'Year 7',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_flow_8',
                            'label' => 'Year 8',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_flow_9',
                            'label' => 'Year 9',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Result',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mirr',
                            'label' => 'MIRR',
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
            'title' => 'mirr = calc_mirr(cash_flow_0,cash_flow_1,cash_flow_2,cash_flow_3,cash_flow_4,cash_flow_5,cash_flow_6,cash_flow_7,cash_flow_8,cash_flow_9,frate,rrate)',
            'results' => ['mirr' => 'calc_mirr(cash_flow_0, cash_flow_1, cash_flow_2, cash_flow_3, cash_flow_4, cash_flow_5, cash_flow_6, cash_flow_7, cash_flow_8, cash_flow_9, frate, rrate)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("calc_mirr",function(c0,c1,c2,c3,c4,c5,c6,c7,c8,c9,frate,rrate){var n=9;if(c9===0){n=8;if(c8===0){n=7;if(c7===0){n=6;if(c6===0){n=5;if(c5===0){n=4;if(c4===0){n=3;if(c3===0){n=2;if(c2===0){n=1}}}}}}}}var nn1=1;var nn2=1;var nn3=1;var nn4=1;var nn5=1;var nn6=1;var nn7=1;var nn8=1;var nn9=1;if(c9<0){nn9=0}if(c8<0){nn8=0}if(c7<0){nn7=0}if(c6<0){nn6=0}if(c5<0){nn5=0}if(c4<0){nn4=0}if(c3<0){nn3=0}if(c2<0){nn2=0}if(c1<0){nn1=0}var terminal_flows=nn1*c1*Math.pow(1+rrate,n-1)+nn2*c2*Math.pow(1+rrate,n-2)+nn3*c3*Math.pow(1+rrate,n-3)+nn4*c4*Math.pow(1+rrate,n-4)+nn5*c5*Math.pow(1+rrate,n-5)+nn6*c6*Math.pow(1+rrate,n-6)+nn7*c7*Math.pow(1+rrate,n-7)+nn8*c8*Math.pow(1+rrate,n-8)+nn9*c9*Math.pow(1+rrate,n-9);var negative_flows=c0-c1*(1-nn1)/Math.pow(1+frate,1)-c2*(1-nn2)/Math.pow(1+frate,2)-c3*(1-nn3)/Math.pow(1+frate,3)-c4*(1-nn4)/Math.pow(1+frate,4)-c5*(1-nn5)/Math.pow(1+frate,5)-c6*(1-nn6)/Math.pow(1+frate,6)-c7*(1-nn7)/Math.pow(1+frate,7)-c8*(1-nn8)/Math.pow(1+frate,8)-c9*(1-nn9)/Math.pow(1+frate,9);var a=terminal_flows/negative_flows;var x=1/n;var y=Math.pow(a,x)-1;return y});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        MIRR takes Financing rate, Reinvestment rate and Initial investment and returns MIRR. Nothing is looked up on this page: MIRR is computed from financing rate and the other boxes, so an unusual pair of values gives an honest answer rather than an error. MIRR is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the MIRR calculator works', 'html' => <<<'TXT'
            <p>MIRR answers one question from 12 numbers, and the answer is MIRR.</p><p>The relationship it solves reads MIRR = calc_mirr(Initial investment, Year 1, Year 2, Year 3, Year 4, Year 5, Year 6, Year 7, Year 8, Year 9, Financing rate, Reinvestment rate).</p><p>The result panel carries MIRR, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 12 boxes, and nothing else.</p><ul><li><strong>Financing rate</strong> — in percent</li><li><strong>Reinvestment rate</strong> — in percent</li><li><strong>Initial investment</strong> — in USD</li><li><strong>Year 1</strong> — in USD</li><li><strong>Year 2</strong> — in USD</li><li><strong>Year 3</strong> — in USD</li><li><strong>Year 4</strong> — in USD</li><li><strong>Year 5</strong> — in USD</li><li><strong>Year 6</strong> — in USD</li><li><strong>Year 7</strong> — in USD</li><li><strong>Year 8</strong> — in USD</li><li><strong>Year 9</strong> — in USD</li></ul><p>The result box is MIRR in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: MIRR offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>MIRR</strong> = <code>calc_mirr(Initial investment, Year 1, Year 2, Year 3, Year 4, Year 5, Year 6, Year 7, Year 8, Year 9, Financing rate, Reinvestment rate)</code></li></ul>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Financing rate and Reinvestment rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with MIRR is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Financing rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Financing rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Reinvestment rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Reinvestment rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Financing rate is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the MIRR form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Financing rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out MIRR. Fill it from a measurement rather than a memory — Financing rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Reinvestment rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out MIRR. Fill it from a measurement rather than a memory — Reinvestment rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Initial investment</strong> takes a plain number with no unit attached. The page reads it when it works out MIRR. Fill it from a measurement rather than a memory — Initial investment is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 1</strong> takes a plain number with no unit attached. The page reads it when it works out MIRR. Fill it from a measurement rather than a memory — Year 1 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 2</strong> takes a plain number with no unit attached. The page reads it when it works out MIRR. Fill it from a measurement rather than a memory — Year 2 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 3</strong> takes a plain number with no unit attached. The page reads it when it works out MIRR. Fill it from a measurement rather than a memory — Year 3 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 4</strong> takes a plain number with no unit attached. The page reads it when it works out MIRR. Fill it from a measurement rather than a memory — Year 4 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 5</strong> takes a plain number with no unit attached. The page reads it when it works out MIRR. Fill it from a measurement rather than a memory — Year 5 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 6</strong> takes a plain number with no unit attached. The page reads it when it works out MIRR. Fill it from a measurement rather than a memory — Year 6 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 7</strong> takes a plain number with no unit attached. The page reads it when it works out MIRR. Fill it from a measurement rather than a memory — Year 7 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 8</strong> takes a plain number with no unit attached. The page reads it when it works out MIRR. Fill it from a measurement rather than a memory — Year 8 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 9</strong> takes a plain number with no unit attached. The page reads it when it works out MIRR. Fill it from a measurement rather than a memory — Year 9 is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>MIRR</strong> is a percent figure. The value follows from Initial investment, Year 1, Year 2 and Year 3. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on MIRR actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Financing rate, Reinvestment rate, Initial investment and Year 1 ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Financing rate — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check MIRR in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> MIRR follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Financing rate, Reinvestment rate and Initial investment are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Financing rate, Reinvestment rate and Initial investment measured, MIRR wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/lcr">Liquidity coverage ratio (LCR)</a>, <a href="/finance/loan-balance">Loan balance</a> and <a href="/finance/loan">Loan Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the MIRR calculator work out?', 'a' => <<<'TXT'
            MIRR, from Initial investment, Year 1, Year 2 and Year 3. The relationship is MIRR = calc_mirr(Initial investment, Year 1, Year 2, Year 3, Year 4, Year 5, Year 6, Year 7, Year 8, Year 9, Financing rate, Reinvestment rate).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Financing rate (percent), Reinvestment rate (percent), Initial investment (USD), Year 1 (USD), Year 2 (USD). With financing rate, reinvestment rate and initial investment in place, MIRR can stay blank and the page will work it out.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            MIRR is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: MIRR is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to MIRR at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/lcr', 'name' => 'Liquidity coverage ratio (LCR)'],
            ['path' => '/finance/loan-balance', 'name' => 'Loan balance'],
            ['path' => '/finance/loan', 'name' => 'Loan Calculator'],
        ],
        'authors' => [],
    ],
];
