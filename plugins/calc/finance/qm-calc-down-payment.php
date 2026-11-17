<?php

/**
 * Down payment
 * /finance/down-payment
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Down payment',
    'meta' => ['title' => 'Down payment Calculator — Formula & Results', 'description' => 'Down payment works out loan amount and rest of down and reports both. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Down payment Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'purchase_amount',
                            'label' => 'Purchase amount',
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
                            'name' => 'loan_amount',
                            'label' => 'Loan amount',
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
                            'name' => 'down_payment',
                            'label' => 'Down payment',
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
                            'name' => 'down_payment_perc',
                            'label' => 'Down payment percentage',
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
            'title' => 'Down payment savings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'current',
                            'label' => 'I already saved...',
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
                            'name' => 'monthly_saving',
                            'label' => '...and every month I\'m saving...',
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
                            'name' => 'rest_of_down',
                            'label' => 'Rest of down',
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
                            'name' => 'time',
                            'label' => '...so I\'ll save for the down payment in',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'loan_amount=purchase_amount-down_payment',
            'results' => ['purchase_amount' => 'down_payment + loan_amount', 'down_payment' => '-loan_amount + purchase_amount', 'loan_amount' => '-down_payment + purchase_amount'],
        ],
        [
            'title' => 'down_payment/purchase_amount=down_payment_perc',
            'results' => ['down_payment_perc' => 'down_payment/purchase_amount', 'purchase_amount' => 'down_payment/down_payment_perc', 'down_payment' => 'down_payment_perc*purchase_amount'],
        ],
        [
            'title' => 'rest_of_down=down_payment-current',
            'results' => ['down_payment' => 'current + rest_of_down', 'rest_of_down' => '-current + down_payment', 'current' => 'down_payment - rest_of_down'],
        ],
        [
            'title' => 'time=rest_of_down/monthly_saving',
            'results' => ['time' => 'rest_of_down/monthly_saving', 'rest_of_down' => 'monthly_saving*time', 'monthly_saving' => 'rest_of_down/time'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Down payment takes Purchase amount and Down payment and returns Loan amount and Down payment percentage. It is a single relationship that reads loan amount out of purchase amount, not a table of canned results keyed by them. Units for Loan amount default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Down payment calculator works', 'html' => <<<'TXT'
            <p>Down payment answers one question from 2 numbers, and the answer is Loan amount, Down payment percentage and I already saved….</p><p>Written with the labels from the form, Loan amount = − Down payment + Purchase amount.</p><p>What comes back is Loan amount, Down payment percentage, I already saved… and ...and every month I&#039;m saving… — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Purchase amount</strong> — in USD</li><li><strong>Down payment</strong> — in USD</li></ul><p>The answers come back as Loan amount in USD, Down payment percentage in percent, I already saved… in USD, ...and every month I&#039;m saving… in USD, Rest of down in USD, ...so I&#039;ll save for the down payment in in years / months. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Purchase amount = 10 USD, Down payment = 100 USD, Down payment percentage = 1000 perc, I already saved… = 10 USD, ...and every month I&amp;#039;m saving… = 100 USD, Rest of down = 1000 USD and ...so I&amp;#039;ll save for the down payment in = 10 yrsmos gives <strong>Loan amount</strong> = -90 USD.</p><ul><li><strong>Loan amount</strong> = -90 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Loan amount</strong> = <code>− Down payment + Purchase amount</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Loan amount</strong> = -90 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Down payment percentage offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Loan amount</strong> = <code>− Down payment + Purchase amount</code></li><li><strong>Purchase amount</strong> = <code>Down payment + Loan amount</code></li><li><strong>Down payment</strong> = <code>− Loan amount + Purchase amount</code></li><li><strong>Down payment percentage</strong> = <code>Down payment ÷ Purchase amount</code></li><li><strong>Rest of down</strong> = <code>− I already saved... + Down payment</code></li><li><strong>I already saved…</strong> = <code>Down payment − Rest of down</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Loan amount</strong> = <code>− Down payment + Purchase amount</code> — the form to use when Down payment and Purchase amount are the values you have.</li><li><strong>Purchase amount</strong> = <code>Down payment + Loan amount</code> — the form to use when Down payment and Loan amount are the values you have.</li><li><strong>Down payment</strong> = <code>− Loan amount + Purchase amount</code> — the form to use when Loan amount and Purchase amount are the values you have.</li><li><strong>Down payment percentage</strong> = <code>Down payment ÷ Purchase amount</code> — the form to use when Down payment and Purchase amount are the values you have.</li><li><strong>Purchase amount</strong> = <code>Down payment ÷ Down payment percentage</code> — the form to use when Down payment and Down payment percentage are the values you have.</li><li><strong>Down payment</strong> = <code>Down payment percentage × Purchase amount</code> — the form to use when Down payment percentage and Purchase amount are the values you have.</li><li><strong>Rest of down</strong> = <code>− I already saved... + Down payment</code> — the form to use when I already saved… and Down payment are the values you have.</li><li><strong>Down payment</strong> = <code>I already saved... + Rest of down</code> — the form to use when I already saved… and Rest of down are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Loan amount, Purchase amount and Down payment can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Purchase amount from 10 to 20, leaving every other box alone. The panel moves from <strong>Loan amount</strong> -90 USD to <strong>Loan amount</strong> -80 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Loan amount, Down payment percentage and I already saved… are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Purchase amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Purchase amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Down payment left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Down payment is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Purchase amount and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Down payment form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Purchase amount</strong> takes a plain number with no unit attached. Change it and Down payment, Loan amount and Down payment percentage changes with it. Fill it from a measurement rather than a memory — Purchase amount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Down payment</strong> takes a plain number with no unit attached. Change it and Purchase amount, Loan amount and Down payment percentage changes with it. Fill it from a measurement rather than a memory — Down payment is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 6 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Loan amount</strong> is a plain number and the page's own defaults put it at -90. It is worked out from Down payment and Purchase amount. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Down payment percentage</strong> is a percent figure. It is worked out from Down payment and Purchase amount. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>I already saved…</strong> is a plain number. It is worked out from Down payment and Rest of down. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>...and every month I&#039;m saving…</strong> is a plain number. It is worked out from Rest of down and ...so I'll save for the down payment in. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Rest of down</strong> is a plain number. It is worked out from I already saved… and Down payment. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>...so I&#039;ll save for the down payment in</strong> is a years / months figure. It is worked out from Rest of down and ...and every month I'm saving…. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Loan amount</th></tr></thead><tbody><tr><td><strong>Purchase amount</strong> +10%</td><td>+1.11%</td></tr><tr><td><strong>Down payment</strong> +10%</td><td>-11.11%</td></tr><tr><td><strong>Down payment percentage</strong> +10%</td><td>+0%</td></tr><tr><td><strong>I already saved…</strong> +10%</td><td>+0%</td></tr><tr><td><strong>...and every month I&#039;m saving…</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Rest of down</strong> +10%</td><td>+0%</td></tr><tr><td><strong>...so I&#039;ll save for the down payment in</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Down payment sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. By contrast, Down payment percentage, I already saved… and ...and every month I&#039;m saving… barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Purchase amount = 5 USD, Down payment = 50 USD, Down payment percentage = 500 perc, I already saved… = 5 USD, ...and every month I&#039;m saving… = 50 USD, Rest of down = 500 USD and ...so I&#039;ll save for the down payment in = 5 yrsmos and the page reports <strong>Loan amount</strong> = -45 USD.</li><li>Feed in Purchase amount = 30 USD, Down payment = 100 USD, Down payment percentage = 1000 perc, I already saved… = 10 USD, ...and every month I&#039;m saving… = 100 USD, Rest of down = 1000 USD and ...so I&#039;ll save for the down payment in = 10 yrsmos and the page reports <strong>Loan amount</strong> = -70 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Down payment actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Loan amount follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent and years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Purchase amount and Down payment and the number you are missing is Loan amount and Down payment percentage.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/buying-power">Buying power Calculator</a>, <a href="/finance/cagr">CAGR Calculator</a> and <a href="/finance/california-overtime">California overtime</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Down payment calculator work out?', 'a' => <<<'TXT'
            Loan amount, Down payment percentage, I already saved… and ...and every month I'm saving…, from Down payment and Purchase amount. The relationship is Loan amount = − Down payment + Purchase amount.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Purchase amount (USD), Down payment (USD). Enter purchase amount and down payment; Loan amount is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Loan amount, Purchase amount, Down payment and Down payment percentage can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Loan amount = -90 USD. Those are the defaults written into the form — move Purchase amount and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Loan amount is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Purchase amount blank and the page solves for it, reporting Loan amount instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Loan amount keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/buying-power', 'name' => 'Buying power Calculator'],
            ['path' => '/finance/cagr', 'name' => 'CAGR Calculator'],
            ['path' => '/finance/california-overtime', 'name' => 'California overtime'],
        ],
        'authors' => [],
    ],
];
