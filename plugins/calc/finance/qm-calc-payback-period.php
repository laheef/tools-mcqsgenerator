<?php

/**
 * Payback period
 * /finance/payback-period
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Payback period',
    'meta' => ['title' => 'Payback period Calculator — Formula & Results', 'description' => 'Payback period turns discount rate and initial investment into discounted payback period. Results come back in yrsmos, with any other unit a click away.', 'h1' => 'Payback period Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discount_rate_R',
                            'label' => 'Discount rate',
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
                            'name' => 'initial_investement_Inv',
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
            'title' => 'Steady cash flow',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_flow_C',
                            'label' => 'Annual cash flow',
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
                            'name' => 'payback_period_PP',
                            'label' => 'Payback period',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discounted_payback_period_DPP',
                            'label' => 'Discounted payback period',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Irregular cash flow',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c1',
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
                            'name' => 'c2',
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
                            'name' => 'c3',
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
                            'name' => 'c4',
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
                            'name' => 'c5',
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
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c6',
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
                            'name' => 'c7',
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
                            'name' => 'c8',
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
                            'name' => 'c9',
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
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'more_years_cash',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Include more years' => '1'],
                            'dataset' => 'more_years',
                            'control' => 'CHECKBOX',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'irregular_dpp',
                            'label' => 'Discounted payback period',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Can\'t calculate the discounted payback period for the current irregular cash flow. Try increasing the cash flow values.'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'discounted_payback_period_DPP = - ln(1 - initial_investement_Inv * discount_rate_R / cash_flow_C)/ln(1 + discount_rate_R)',
            'results' => ['discounted_payback_period_DPP' => '-log((cash_flow_C - discount_rate_R*initial_investement_Inv)/cash_flow_C)/log(discount_rate_R + 1)', 'cash_flow_C' => <<<'TXT'
            discount_rate_R*initial_investement_Inv*exp(discounted_payback_period_DPP*log(discount_rate_R + 1))/(exp(discounted_payback_period_DPP*log(discount_rate_R + 1)) - 1)
            TXT, 'initial_investement_Inv' => 'cash_flow_C/discount_rate_R - cash_flow_C*exp(-discounted_payback_period_DPP*log(discount_rate_R + 1))/discount_rate_R'],
        ],
        [
            'title' => 'payback_period_PP = initial_investement_Inv / cash_flow_C',
            'results' => ['payback_period_PP' => 'initial_investement_Inv/cash_flow_C', 'cash_flow_C' => 'initial_investement_Inv/payback_period_PP', 'initial_investement_Inv' => 'cash_flow_C*payback_period_PP'],
        ],
        [
            'title' => 'irregular_dpp= paybackkperiod(initial_investement_Inv, c1, c2, c3, c4, c5, c6, c7, c8, c9, discount_rate_R)',
            'results' => ['irregular_dpp' => 'paybackkperiod(initial_investement_Inv, c1, c2, c3, c4, c5, c6, c7, c8, c9, discount_rate_R)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("paybackkperiod",function(c0,c1,c2,c3,c4,c5,c6,c7,c8,c9,r){var n=9;if(c9===0){n=8;if(c8===0){n=7;if(c7===0){n=6;if(c6===0){n=5;if(c5===0){n=4;if(c4===0){n=3;if(c3===0){n=2;if(c2===0){n=1}}}}}}}}var CCF=0;var i=0;var cash_flow=-c0;var factorPV=1/Math.pow(1+r,i);var discounted_CF=cash_flow*factorPV;CCF=CCF+discounted_CF;i=1;var nn1=1;var nn2=1;var nn3=1;var nn4=1;var nn5=1;var nn6=1;var nn7=1;var nn8=1;var nn9=1;var factor=1;var A=1;var B=1;var C=0;while(i<=n){nn1=(i-2)*(i-3)*(i-4)*(i-5)*(i-6)*(i-7)*(i-8)*(i-9)/40320;nn2=(i-1)*(i-3)*(i-4)*(i-5)*(i-6)*(i-7)*(i-8)*(i-9)/-5040;nn3=(i-2)*(i-1)*(i-4)*(i-5)*(i-6)*(i-7)*(i-8)*(i-9)/1440;nn4=(i-2)*(i-3)*(i-1)*(i-5)*(i-6)*(i-7)*(i-8)*(i-9)/-720;nn5=(i-2)*(i-3)*(i-4)*(i-1)*(i-6)*(i-7)*(i-8)*(i-9)/576;nn6=(i-2)*(i-3)*(i-4)*(i-5)*(i-1)*(i-7)*(i-8)*(i-9)/-720;nn7=(i-2)*(i-3)*(i-4)*(i-5)*(i-6)*(i-1)*(i-8)*(i-9)/1440;nn8=(i-2)*(i-3)*(i-4)*(i-5)*(i-6)*(i-7)*(i-1)*(i-9)/-5040;nn9=(i-2)*(i-3)*(i-4)*(i-5)*(i-6)*(i-7)*(i-8)*(i-1)/40320;cash_flow=nn1*c1+nn2*c2+nn3*c3+nn4*c4+nn5*c5+nn6*c6+nn7*c7+nn8*c8+nn9*c9;factor=1/Math.pow(1+r,i);discounted_CF=cash_flow*factor;i=i+1;if(-CCF<=discounted_CF){A=i-1;B=-CCF;C=discounted_CF;break}CCF=CCF+discounted_CF}return A-1+B/C});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Payback period works out Payback period and Discounted payback period from Discount rate, Initial investment and Annual cash flow. It is a single relationship that reads payback period out of discount rate, not a table of canned results keyed by them. Units for Payback period default to years / months and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Payback period calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Payback period: it takes 3 numbers and reports Payback period, Discounted payback period and Discounted payback period.</p><p>The relationship it solves reads Discounted payback period = − ln((Annual cash flow − Discount rate × Initial investment) ÷ Annual cash flow) ÷ ln(Discount rate + 1).</p><p>The answers are Payback period, Discounted payback period and Discounted payback period; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Discount rate</strong> — in percent</li><li><strong>Initial investment</strong> — in USD</li><li><strong>Annual cash flow</strong> — in USD</li></ul><p>What you get back is Payback period in years / months, Discounted payback period in years / months, Discounted payback period in years / months, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Payback period lists 9 options and opens on years / months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Discounted payback period</strong> = <code>− ln((Annual cash flow − Discount rate × Initial investment) ÷ Annual cash flow) ÷ ln(Discount rate + 1)</code></li><li><strong>Annual cash flow</strong> = <code>Discount rate × Initial investment × e^(Discounted payback period × ln(Discount rate + 1)) ÷ (e^(Discounted payback period × ln(Discount rate + 1)) − 1)</code></li><li><strong>Initial investment</strong> = <code>Annual cash flow ÷ Discount rate − Annual cash flow × e^( − Discounted payback period × ln(Discount rate + 1)) ÷ Discount rate</code></li><li><strong>Payback period</strong> = <code>Initial investment ÷ Annual cash flow</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Discounted payback period</strong> = <code>− ln((Annual cash flow − Discount rate × Initial investment) ÷ Annual cash flow) ÷ ln(Discount rate + 1)</code> — the form to use when Annual cash flow, Discount rate and Initial investment are the values you have.</li><li><strong>Annual cash flow</strong> = <code>Discount rate × Initial investment × e^(Discounted payback period × ln(Discount rate + 1)) ÷ (e^(Discounted payback period × ln(Discount rate + 1)) − 1)</code> — the form to use when Discount rate, Initial investment and Discounted payback period are the values you have.</li><li><strong>Initial investment</strong> = <code>Annual cash flow ÷ Discount rate − Annual cash flow × e^( − Discounted payback period × ln(Discount rate + 1)) ÷ Discount rate</code> — the form to use when Annual cash flow, Discount rate and Discounted payback period are the values you have.</li><li><strong>Payback period</strong> = <code>Initial investment ÷ Annual cash flow</code> — the form to use when Initial investment and Annual cash flow are the values you have.</li><li><strong>Annual cash flow</strong> = <code>Initial investment ÷ Payback period</code> — the form to use when Initial investment and Payback period are the values you have.</li><li><strong>Initial investment</strong> = <code>Annual cash flow × Payback period</code> — the form to use when Annual cash flow and Payback period are the values you have.</li><li><strong>Discounted payback period</strong> = <code>paybackkperiod(Initial investment, Year 1, Year 2, Year 3, Year 4, Year 5, Year 6, Year 7, Year 8, Year 9, Discount rate)</code> — the form to use when Initial investment, Year 1, Year 2 and Year 3 are the values you have.</li></ul><p>Any one of Discounted payback period, Annual cash flow and Initial investment can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Discount rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Payback period, Discounted payback period and Discounted payback period are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Discount rate left as a guess.</strong> Anything typed into Discount rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Initial investment left as a guess.</strong> Anything typed into Initial investment is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Discount rate to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Payback period form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Discount rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Discounted payback period, Annual cash flow and Initial investment changes with it. Fill it from a measurement rather than a memory — Discount rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Initial investment</strong> takes a plain number with no unit attached. Change it and Discounted payback period, Annual cash flow and Payback period changes with it. Fill it from a measurement rather than a memory — Initial investment is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Annual cash flow</strong> takes a plain number with no unit attached. Change it and Discounted payback period, Initial investment and Payback period changes with it. Fill it from a measurement rather than a memory — Annual cash flow is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Payback period</strong> is a years / months figure. It is computed from Initial investment and Annual cash flow, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Discounted payback period</strong> is a years / months figure. It is computed from Annual cash flow, Discount rate and Initial investment, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Discounted payback period</strong> is a years / months figure. It is computed from Initial investment, Year 1, Year 2 and Year 3, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Payback period actually offers.</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Payback period is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover years / months and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Discount rate, Initial investment and Annual cash flow measured, Payback period and Discounted payback period wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/roth-ira">Roth IRA Calculator</a>, <a href="/finance/rule-of-72">Rule of 72</a> and <a href="/finance/rv-loan">RV loan Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Payback period calculator work out?', 'a' => <<<'TXT'
            Payback period, Discounted payback period and Discounted payback period, from Annual cash flow, Discount rate and Initial investment. The relationship is Discounted payback period = − ln((Annual cash flow − Discount rate × Initial investment) ÷ Annual cash flow) ÷ ln(Discount rate + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Discount rate (percent), Initial investment (USD), Annual cash flow (USD). Enter discount rate, initial investment and annual cash flow; Payback period is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Discounted payback period, Annual cash flow, Initial investment and Payback period blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Payback period is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Discount rate blank and the page solves for it, reporting Payback period instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Payback period keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/roth-ira', 'name' => 'Roth IRA Calculator'],
            ['path' => '/finance/rule-of-72', 'name' => 'Rule of 72'],
            ['path' => '/finance/rv-loan', 'name' => 'RV loan Calculator'],
        ],
        'authors' => [],
    ],
];
