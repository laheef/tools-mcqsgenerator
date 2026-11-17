<?php

/**
 * RV loan
 * /finance/rv-loan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'RV loan',
    'meta' => ['title' => 'RV loan Calculator: Formula, Steps & Examples', 'description' => 'RV loan works out loan amount and payment from RV price, down payment and term. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'RV loan Calculator', 'updated' => '2026-10-01'],
    'sections' => [
        [
            'title' => 'RV loan setup',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rv_price',
                            'label' => 'RV price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
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
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'periods',
                            'label' => 'Term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest',
                            'label' => 'Interest',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'percentyear',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'RV loan payments',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amount',
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
                            'name' => 'payment',
                            'label' => 'Payment',
                            'type' => 'number',
                            'suffix' => '/mos',
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
                            'name' => 'total_paid',
                            'label' => 'Total paid',
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
                            'name' => 'cost_of_loan',
                            'label' => 'Cost of loan',
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
    ],
    'formula' => [
        [
            'title' => 'payment = interest * amount / (1 - (1+interest)^(-periods))',
            'results' => ['amount' => 'payment/interest - payment*pow(interest + 1, -periods)/interest', 'payment' => 'amount*interest*pow(interest + 1, periods)/(pow(interest + 1, periods) - 1)', 'periods' => 'log(-payment/(amount*interest - payment))/log(interest + 1)'],
        ],
        [
            'title' => 'total_paid = periods * payment',
            'results' => ['total_paid' => 'payment*periods', 'payment' => 'total_paid/periods', 'periods' => 'total_paid/payment'],
        ],
        [
            'title' => 'amount = rv_price - down_payment',
            'results' => ['rv_price' => 'amount + down_payment', 'down_payment' => '-amount + rv_price', 'amount' => '-down_payment + rv_price'],
        ],
        [
            'title' => 'cost_of_loan = total_paid - amount',
            'results' => ['amount' => '-cost_of_loan + total_paid', 'total_paid' => 'amount + cost_of_loan', 'cost_of_loan' => '-amount + total_paid'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        RV loan works out RV price and Down payment from Term, Interest and Loan amount. The arithmetic is the whole method: RV price is worked out from term by one formula, applied once. RV price comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the RV loan calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind RV loan: it takes 3 numbers and reports RV price, Down payment and Payment.</p><p>The relationship it solves reads Payment = Loan amount × Interest × (Interest + 1)^(Term) ÷ ((Interest + 1)^(Term) − 1).</p><p>The answers are RV price, Down payment, Payment and Total paid; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Term</strong> — in years / months</li><li><strong>Interest</strong> — in interest rate per year</li><li><strong>Loan amount</strong> — in USD</li></ul><p>What you get back is RV price in USD, Down payment in USD, Payment in /mos, Total paid in USD, Cost of loan in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Term lists 9 options and opens on years / months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Payment</strong> = <code>Loan amount × Interest × (Interest + 1)^(Term) ÷ ((Interest + 1)^(Term) − 1)</code></li><li><strong>Loan amount</strong> = <code>Payment ÷ Interest − Payment × (Interest + 1)^(− Term) ÷ Interest</code></li><li><strong>Term</strong> = <code>ln( − Payment ÷ (Loan amount × Interest − Payment)) ÷ ln(Interest + 1)</code></li><li><strong>Total paid</strong> = <code>Payment × Term</code></li><li><strong>RV price</strong> = <code>Loan amount + Down payment</code></li><li><strong>Down payment</strong> = <code>− Loan amount + RV price</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Payment</strong> = <code>Loan amount × Interest × (Interest + 1)^(Term) ÷ ((Interest + 1)^(Term) − 1)</code> — the form to use when Loan amount, Interest and Term are the values you have.</li><li><strong>Loan amount</strong> = <code>Payment ÷ Interest − Payment × (Interest + 1)^(− Term) ÷ Interest</code> — the form to use when Payment, Interest and Term are the values you have.</li><li><strong>Term</strong> = <code>ln( − Payment ÷ (Loan amount × Interest − Payment)) ÷ ln(Interest + 1)</code> — the form to use when Payment, Loan amount and Interest are the values you have.</li><li><strong>Total paid</strong> = <code>Payment × Term</code> — the form to use when Payment and Term are the values you have.</li><li><strong>Payment</strong> = <code>Total paid ÷ Term</code> — the form to use when Total paid and Term are the values you have.</li><li><strong>Term</strong> = <code>Total paid ÷ Payment</code> — the form to use when Total paid and Payment are the values you have.</li><li><strong>Loan amount</strong> = <code>− Down payment + RV price</code> — the form to use when Down payment and RV price are the values you have.</li><li><strong>RV price</strong> = <code>Loan amount + Down payment</code> — the form to use when Loan amount and Down payment are the values you have.</li></ul><p>Any one of Payment, Loan amount and Term can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Term and Interest carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> RV price, Down payment and Payment are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Term left as a guess.</strong> Anything typed into Term is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Interest left as a guess.</strong> Anything typed into Interest is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Term and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the RV loan form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. It feeds Loan amount, Payment and Total paid. Fill it from a measurement rather than a memory — Term is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest</strong> is a interest rate per year quantity: the page opens it in percentyear and converts anything else you pick before the formula runs. It feeds Loan amount, Payment and Term. Fill it from a measurement rather than a memory — Interest is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Loan amount</strong> takes a plain number with no unit attached. It feeds Payment, Term and RV price. Fill it from a measurement rather than a memory — Loan amount is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>RV price</strong> is a plain number. The value follows from Loan amount and Down payment. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Down payment</strong> is a plain number. The value follows from Loan amount and RV price. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Payment</strong> is a plain number. The value follows from Loan amount, Interest and Term. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total paid</strong> is a plain number. The value follows from Payment and Term. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Cost of loan</strong> is a plain number. The value follows from Loan amount and Total paid. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on RV loan actually offers.</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>interest rate per year</strong> — opens in <em>percentyear</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind RV price is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover years / months and interest rate per year. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Term, Interest and Loan amount and the number you are missing is RV price and Down payment.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/gdp-growth">GDP growth rate Calculator</a>, <a href="/finance/gdp-per-capita">GDP per capita Calculator</a> and <a href="/finance/gdp">GDP</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what RV loan is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Term, Interest and Loan amount beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the RV loan calculator work out?', 'a' => <<<'TXT'
            RV price, Down payment, Payment and Total paid, from Loan amount, Interest and Term. The relationship is Payment = Loan amount × Interest × (Interest + 1)^(Term) ÷ ((Interest + 1)^(Term) − 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Term (years / months), Interest (interest rate per year), Loan amount (USD). Fill term, interest and loan amount and leave RV price empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Payment, Loan amount, Term and Total paid blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            RV price is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Term blank and the page solves for it, reporting RV price instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. RV price keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/gdp-growth', 'name' => 'GDP growth rate Calculator'],
            ['path' => '/finance/gdp-per-capita', 'name' => 'GDP per capita Calculator'],
            ['path' => '/finance/gdp', 'name' => 'GDP'],
        ],
        'authors' => [],
    ],
];
