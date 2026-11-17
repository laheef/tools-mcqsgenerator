<?php

/**
 * Student loan
 * /finance/student-loan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Student loan',
    'meta' => ['title' => 'Student loan Calculator — Formula & Results', 'description' => 'Student loan turns loan balance and remaining term into monthly payment and total interest paid. Results come back in USD, with any other unit a click away.', 'h1' => 'Student loan Calculator', 'updated' => '2026-10-01'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loan_balance',
                            'label' => 'Loan balance',
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
                            'name' => 'term',
                            'label' => 'Remaining term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_rate',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '1'],
                            'default' => '6',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly_payment',
                            'label' => 'Monthly payment',
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
                            'name' => 'total_interest_paid',
                            'label' => 'Total interest paid',
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
                            'name' => 'total_amount_paid',
                            'label' => 'Total amount paid',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'hasValue(total_amount_paid)', 'text' => <<<'TXT'
                                Based on your inputs, you'll pay a total of {{total_amount_paid.monetaryValue}}, with {{total_interest_paid.monetaryValue}} going toward interest alone. That means interest makes up {{interest_percentage.formattedValue}}% of the total amount you'll pay. Making extra payments can help reduce this percentage and let you pay off your debt faster.
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_percentage',
                            'label' => 'Interest percentage',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'monthly_payment = (loan_balance) * (interest_rate / 12) / (1 - (1 + (interest_rate / 12)) ^ (- term))',
            'results' => ['loan_balance' => '12*monthly_payment*(-pow(12, term) + pow(interest_rate + 12, term))*pow(interest_rate + 12, -term)/interest_rate', 'monthly_payment' => '(1/12)*interest_rate*loan_balance*pow(interest_rate + 12, term)/(-pow(12, term) + pow(interest_rate + 12, term))'],
        ],
        [
            'title' => 'total_interest_paid =  monthly_payment * term - loan_balance',
            'results' => ['loan_balance' => 'monthly_payment*term - total_interest_paid', 'term' => '(loan_balance + total_interest_paid)/monthly_payment', 'monthly_payment' => '(loan_balance + total_interest_paid)/term', 'total_interest_paid' => '-loan_balance + monthly_payment*term'],
        ],
        [
            'title' => 'monthly_payment * term = total_amount_paid',
            'results' => ['total_amount_paid' => 'monthly_payment*term', 'term' => 'total_amount_paid/monthly_payment', 'monthly_payment' => 'total_amount_paid/term'],
        ],
        [
            'title' => 'total_interest_paid/total_amount_paid=interest_percentage',
            'results' => ['total_amount_paid' => 'total_interest_paid/interest_percentage', 'interest_percentage' => 'total_interest_paid/total_amount_paid', 'total_interest_paid' => 'interest_percentage*total_amount_paid'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Student loan works out Monthly payment and Total interest paid from Loan balance, Remaining term and Interest rate. The arithmetic is the whole method: monthly payment is worked out from loan balance by one formula, applied once. Monthly payment comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Student loan calculator works', 'html' => <<<'TXT'
            <p>Student loan answers one question from 3 numbers, and the answer is Monthly payment, Total interest paid and Total amount paid.</p><p>In the form&#039;s own words, Monthly payment = (1 ÷ 12) × Interest rate × Loan balance × (Interest rate + 12)^(Remaining term) ÷ ( − (12)^(Remaining term) + (Interest rate + 12)^(Remaining term)).</p><p>What comes back is Monthly payment, Total interest paid, Total amount paid and Interest percentage — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Loan balance</strong> — in USD</li><li><strong>Remaining term</strong> — in years / months</li><li><strong>Interest rate</strong> — in percent</li></ul><p>The answers come back as Monthly payment in USD, Total interest paid in USD, Total amount paid in USD, Interest percentage in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Interest percentage lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Monthly payment</strong> = <code>(1 ÷ 12) × Interest rate × Loan balance × (Interest rate + 12)^(Remaining term) ÷ ( − (12)^(Remaining term) + (Interest rate + 12)^(Remaining term))</code></li><li><strong>Loan balance</strong> = <code>12 × Monthly payment × ( − (12)^(Remaining term) + (Interest rate + 12)^(Remaining term)) × (Interest rate + 12)^(− Remaining term) ÷ Interest rate</code></li><li><strong>Total interest paid</strong> = <code>− Loan balance + Monthly payment × Remaining term</code></li><li><strong>Remaining term</strong> = <code>(Loan balance + Total interest paid) ÷ Monthly payment</code></li><li><strong>Total amount paid</strong> = <code>Monthly payment × Remaining term</code></li><li><strong>Interest percentage</strong> = <code>Total interest paid ÷ Total amount paid</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Monthly payment</strong> = <code>(1 ÷ 12) × Interest rate × Loan balance × (Interest rate + 12)^(Remaining term) ÷ ( − (12)^(Remaining term) + (Interest rate + 12)^(Remaining term))</code> — the form to use when Interest rate, Loan balance and Remaining term are the values you have.</li><li><strong>Loan balance</strong> = <code>12 × Monthly payment × ( − (12)^(Remaining term) + (Interest rate + 12)^(Remaining term)) × (Interest rate + 12)^(− Remaining term) ÷ Interest rate</code> — the form to use when Monthly payment, Remaining term and Interest rate are the values you have.</li><li><strong>Total interest paid</strong> = <code>− Loan balance + Monthly payment × Remaining term</code> — the form to use when Loan balance, Monthly payment and Remaining term are the values you have.</li><li><strong>Loan balance</strong> = <code>Monthly payment × Remaining term − Total interest paid</code> — the form to use when Monthly payment, Remaining term and Total interest paid are the values you have.</li><li><strong>Remaining term</strong> = <code>(Loan balance + Total interest paid) ÷ Monthly payment</code> — the form to use when Loan balance, Total interest paid and Monthly payment are the values you have.</li><li><strong>Monthly payment</strong> = <code>(Loan balance + Total interest paid) ÷ Remaining term</code> — the form to use when Loan balance, Total interest paid and Remaining term are the values you have.</li><li><strong>Total amount paid</strong> = <code>Monthly payment × Remaining term</code> — the form to use when Monthly payment and Remaining term are the values you have.</li><li><strong>Remaining term</strong> = <code>Total amount paid ÷ Monthly payment</code> — the form to use when Total amount paid and Monthly payment are the values you have.</li></ul><p>Any one of Monthly payment, Loan balance and Total interest paid can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Remaining term and Interest rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Monthly payment, Total interest paid and Total amount paid are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Loan balance left as a guess.</strong> Anything typed into Loan balance is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Remaining term left as a guess.</strong> Anything typed into Remaining term is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Loan balance is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Student loan form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Loan balance</strong> takes a plain number with no unit attached. The page reads it when it works out Monthly payment, Remaining term and Total interest paid. Fill it from a measurement rather than a memory — Loan balance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Remaining term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. The page reads it when it works out Loan balance, Monthly payment and Total interest paid. Fill it from a measurement rather than a memory — Remaining term is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Loan balance and Monthly payment. Fill it from a measurement rather than a memory — Interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Monthly payment</strong> is a plain number. It is worked out from Interest rate, Loan balance and Remaining term. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total interest paid</strong> is a plain number. It is worked out from Loan balance, Monthly payment and Remaining term. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total amount paid</strong> is a plain number. It is worked out from Monthly payment and Remaining term. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Interest percentage</strong> is a percent figure. It is worked out from Total interest paid and Total amount paid. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Student loan actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Monthly payment is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years / months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Loan balance, Remaining term and Interest rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Loan balance, Remaining term and Interest rate measured, Monthly payment and Total interest paid wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/reserve-ratio">Reserve ratio Calculator</a>, <a href="/finance/residual-income">Residual income</a> and <a href="/finance/retained-earnings">Retained earnings</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Student loan calculator work out?', 'a' => <<<'TXT'
            Monthly payment, Total interest paid, Total amount paid and Interest percentage, from Interest rate, Loan balance and Remaining term. The relationship is Monthly payment = (1 ÷ 12) × Interest rate × Loan balance × (Interest rate + 12)^(Remaining term) ÷ ( − (12)^(Remaining term) + (Interest rate + 12)^(Remaining term)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan balance (USD), Remaining term (years / months), Interest rate (percent). With loan balance, remaining term and interest rate in place, Monthly payment can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Monthly payment, Loan balance, Total interest paid and Remaining term blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Monthly payment is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Loan balance blank and the page solves for it, reporting Monthly payment instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Monthly payment keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/reserve-ratio', 'name' => 'Reserve ratio Calculator'],
            ['path' => '/finance/residual-income', 'name' => 'Residual income'],
            ['path' => '/finance/retained-earnings', 'name' => 'Retained earnings'],
        ],
        'authors' => [],
    ],
];
