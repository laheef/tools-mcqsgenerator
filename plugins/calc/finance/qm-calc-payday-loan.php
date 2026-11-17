<?php

/**
 * Payday loan
 * /finance/payday-loan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Payday loan',
    'meta' => ['title' => 'Payday loan Calculator — Formula, Units & Example', 'description' => 'Payday loan works out APR and APR amount from loan Amount and finance charge. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Payday loan Calculator', 'updated' => '2026-10-01'],
    'sections' => [
        [
            'title' => 'Loan details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loan',
                            'label' => 'Loan Amount',
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
                            'name' => 'interest',
                            'label' => 'Finance charge',
                            'type' => 'number',
                            'help' => 'The interest you are expected to pay on the loan.',
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
                            'label' => 'Loan term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'apr',
                            'label' => 'APR',
                            'type' => 'number',
                            'help' => 'Annual Percentage Rate - yearly cost of the loan.',
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
                            'name' => 'apr_amount',
                            'label' => 'APR amount',
                            'type' => 'number',
                            'help' => 'The value of the APR in monetary terms - what you will owe as interest on the original loan amount at the end of a year if you don\'t pay off.',
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
                            'name' => 'monthlyFeePercent',
                            'label' => 'Monthly fee percent',
                            'type' => 'number',
                            'help' => 'What percentage of the loan are you expected to pay back each month as a fee?',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthlyFee',
                            'label' => 'Monthly fee',
                            'type' => 'number',
                            'help' => 'Calculated every month on the loan amount each month.',
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
                            'name' => 'debt',
                            'label' => 'Total debt',
                            'type' => 'number',
                            'help' => 'Total amount to repay the loan completely.',
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
            'title' => 'apr = ((interest / loan) * 365) / term',
            'results' => ['apr' => '365*interest/(loan*term)', 'term' => '365*interest/(apr*loan)', 'loan' => '365*interest/(apr*term)', 'interest' => '(1/365)*apr*loan*term'],
        ],
        [
            'title' => 'apr_amount = apr * loan',
            'results' => ['apr_amount' => 'apr*loan', 'loan' => 'apr_amount/apr', 'apr' => 'apr_amount/loan'],
        ],
        [
            'title' => 'monthlyFee = one_way(monthlyFeePercent * loan * ceil(term/30))',
            'results' => ['monthlyFee' => '(loan*monthlyFeePercent*ceil((1/30)*term))'],
        ],
        [
            'title' => 'debt = interest + loan + one_way(monthlyFee)',
            'results' => ['debt' => 'interest + loan + ((loan*monthlyFeePercent*ceil((1/30)*term)))', 'loan' => 'debt - interest - ((loan*monthlyFeePercent*ceil((1/30)*term)))', 'interest' => 'debt - loan - ((loan*monthlyFeePercent*ceil((1/30)*term)))'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Loan Amount, Finance charge and Loan term into Payday loan and the answer comes back as APR and APR amount. Nothing is looked up on this page: APR is computed from loan Amount and the other boxes, so an unusual pair of values gives an honest answer rather than an error. APR is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Payday loan calculator works', 'html' => <<<'TXT'
            <p>The Payday loan calculator applies one relationship to 3 numbers and reports APR, APR amount and Monthly fee.</p><p>The relationship it solves reads APR = 365 × Finance charge ÷ (Loan Amount × Loan term).</p><p>The result panel carries APR, APR amount, Monthly fee and Total debt, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Loan Amount</strong> — in USD</li><li><strong>Finance charge</strong> — in USD. The interest you are expected to pay on the loan.</li><li><strong>Loan term</strong> — in days</li></ul><p>The result boxes are APR in percent, APR amount in USD, Monthly fee in USD, Total debt in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on APR lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>APR</strong> = <code>365 × Finance charge ÷ (Loan Amount × Loan term)</code></li><li><strong>Loan term</strong> = <code>365 × Finance charge ÷ (APR × Loan Amount)</code></li><li><strong>Loan Amount</strong> = <code>365 × Finance charge ÷ (APR × Loan term)</code></li><li><strong>Finance charge</strong> = <code>(1 ÷ 365) × APR × Loan Amount × Loan term</code></li><li><strong>APR amount</strong> = <code>APR × Loan Amount</code></li><li><strong>Monthly fee</strong> = <code>(Loan Amount × Monthly fee percent × ceil((1 ÷ 30) × Loan term))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>APR</strong> = <code>365 × Finance charge ÷ (Loan Amount × Loan term)</code> — the form to use when Finance charge, Loan Amount and Loan term are the values you have.</li><li><strong>Loan term</strong> = <code>365 × Finance charge ÷ (APR × Loan Amount)</code> — the form to use when Finance charge, APR and Loan Amount are the values you have.</li><li><strong>Loan Amount</strong> = <code>365 × Finance charge ÷ (APR × Loan term)</code> — the form to use when Finance charge, APR and Loan term are the values you have.</li><li><strong>Finance charge</strong> = <code>(1 ÷ 365) × APR × Loan Amount × Loan term</code> — the form to use when APR, Loan Amount and Loan term are the values you have.</li><li><strong>APR amount</strong> = <code>APR × Loan Amount</code> — the form to use when APR and Loan Amount are the values you have.</li><li><strong>Loan Amount</strong> = <code>APR amount ÷ APR</code> — the form to use when APR amount and APR are the values you have.</li><li><strong>APR</strong> = <code>APR amount ÷ Loan Amount</code> — the form to use when APR amount and Loan Amount are the values you have.</li><li><strong>Monthly fee</strong> = <code>(Loan Amount × Monthly fee percent × ceil((1 ÷ 30) × Loan term))</code> — the form to use when Loan Amount, Monthly fee percent and Loan term are the values you have.</li></ul><p>Any one of APR, Loan term and Loan Amount can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Loan term carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> APR, APR amount and Monthly fee are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Loan Amount left as a guess.</strong> Anything typed into Loan Amount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Finance charge left as a guess.</strong> Anything typed into Finance charge is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Loan Amount is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Payday loan form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Loan Amount</strong> takes a plain number with no unit attached. It feeds APR, Loan term and Finance charge. Fill it from a measurement rather than a memory — Loan Amount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Finance charge</strong> takes a plain number with no unit attached. The interest you are expected to pay on the loan. It feeds APR, Loan term and Loan Amount. Fill it from a measurement rather than a memory — Finance charge is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Loan term</strong> is a days quantity: the page opens it in days and converts anything else you pick before the formula runs. It feeds APR, Loan Amount and Finance charge. Fill it from a measurement rather than a memory — Loan term is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>APR</strong> is a percent figure. It is computed from Finance charge, Loan Amount and Loan term, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>APR amount</strong> is a plain number. It is computed from APR and Loan Amount, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Monthly fee</strong> is a plain number. It is computed from Loan Amount, Monthly fee percent and Loan term, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total debt</strong> is a plain number. It is computed from Finance charge, Loan Amount, Monthly fee percent and Loan term, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Payday loan actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>days</strong> — opens in <em>days</em>, and the chip also carries hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind APR is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and days and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Loan Amount, Finance charge and Loan term are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Loan Amount, Finance charge and Loan term is what you already know and APR and APR amount is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/student-loan-repayment-us">Student Loan Repayment - Covid</a>, <a href="/finance/subscription-waste">Subscription waste Calculator</a> and <a href="/finance/sustainable-growth-rate">Sustainable growth rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Payday loan calculator work out?', 'a' => <<<'TXT'
            APR, APR amount, Monthly fee and Total debt, from Finance charge, Loan Amount and Loan term. The relationship is APR = 365 × Finance charge ÷ (Loan Amount × Loan term).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan Amount (USD), Finance charge (USD), Loan term (days). Enter loan Amount, finance charge and loan term; APR is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of APR, Loan term, Loan Amount and Finance charge blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of APR is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Loan Amount blank and the page solves for it, reporting APR instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. APR keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/student-loan-repayment-us', 'name' => 'Student Loan Repayment - Covid'],
            ['path' => '/finance/subscription-waste', 'name' => 'Subscription waste Calculator'],
            ['path' => '/finance/sustainable-growth-rate', 'name' => 'Sustainable growth rate Calculator'],
        ],
        'authors' => [],
    ],
];
