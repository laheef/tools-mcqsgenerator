<?php

/**
 * Credit card payoff
 * /finance/credit-card-payoff
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Credit card payoff',
    'meta' => ['title' => 'Credit card payoff Calculator: Free, With Steps', 'description' => 'Credit card payoff turns credit card balance and Interest rate (APR) into monthly payment. Results come back in USD, with any other unit a click away.', 'h1' => 'Credit card payoff Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amount',
                            'label' => 'Credit card balance',
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
                            'name' => 'interest',
                            'label' => 'Interest rate (APR)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'percentyear',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payment',
                            'label' => 'Monthly payment',
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
                            'name' => 'periods',
                            'label' => 'Paid off after',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmosdays',
                            'rounding' => ['omni', '0.01'],
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
                            'rounding' => ['omni', '0.000001'],
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
            'results' => ['payment' => 'total_paid/periods', 'periods' => 'total_paid/payment', 'total_paid' => 'payment*periods'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Credit card payoff takes Credit card balance, Interest rate (APR) and Paid off after and returns Monthly payment and Total paid. The arithmetic is the whole method: monthly payment is worked out from credit card balance by one formula, applied once. Monthly payment comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Credit card payoff calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Credit card payoff: it takes 3 numbers and reports Monthly payment and Total paid.</p><p>Written with the labels from the form, Monthly payment = Credit card balance × Interest rate (APR) × (Interest rate (APR) + 1)^(Paid off after) ÷ ((Interest rate (APR) + 1)^(Paid off after) − 1).</p><p>What comes back is Monthly payment and Total paid — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Credit card balance</strong> — in USD</li><li><strong>Interest rate (APR)</strong> — in interest rate per year</li><li><strong>Paid off after</strong> — in years / months / days</li></ul><p>The answers come back as Monthly payment in USD, Total paid in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Interest rate (APR) offers 6 units and opens on interest rate per year, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Monthly payment</strong> = <code>Credit card balance × Interest rate (APR) × (Interest rate (APR) + 1)^(Paid off after) ÷ ((Interest rate (APR) + 1)^(Paid off after) − 1)</code></li><li><strong>Credit card balance</strong> = <code>Monthly payment ÷ Interest rate (APR) − Monthly payment × (Interest rate (APR) + 1)^(− Paid off after) ÷ Interest rate (APR)</code></li><li><strong>Paid off after</strong> = <code>ln( − Monthly payment ÷ (Credit card balance × Interest rate (APR) − Monthly payment)) ÷ ln(Interest rate (APR) + 1)</code></li><li><strong>Total paid</strong> = <code>Monthly payment × Paid off after</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Monthly payment</strong> = <code>Credit card balance × Interest rate (APR) × (Interest rate (APR) + 1)^(Paid off after) ÷ ((Interest rate (APR) + 1)^(Paid off after) − 1)</code> — the form to use when Credit card balance, Interest rate (APR) and Paid off after are the values you have.</li><li><strong>Credit card balance</strong> = <code>Monthly payment ÷ Interest rate (APR) − Monthly payment × (Interest rate (APR) + 1)^(− Paid off after) ÷ Interest rate (APR)</code> — the form to use when Monthly payment, Interest rate (APR) and Paid off after are the values you have.</li><li><strong>Paid off after</strong> = <code>ln( − Monthly payment ÷ (Credit card balance × Interest rate (APR) − Monthly payment)) ÷ ln(Interest rate (APR) + 1)</code> — the form to use when Monthly payment, Credit card balance and Interest rate (APR) are the values you have.</li><li><strong>Total paid</strong> = <code>Monthly payment × Paid off after</code> — the form to use when Monthly payment and Paid off after are the values you have.</li><li><strong>Monthly payment</strong> = <code>Total paid ÷ Paid off after</code> — the form to use when Total paid and Paid off after are the values you have.</li><li><strong>Paid off after</strong> = <code>Total paid ÷ Monthly payment</code> — the form to use when Total paid and Monthly payment are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Monthly payment, Credit card balance and Paid off after can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Interest rate (APR) and Paid off after is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Monthly payment and Total paid are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Credit card balance left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Credit card balance is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Interest rate (APR) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Interest rate (APR) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Credit card balance to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Credit card payoff form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Credit card balance</strong> takes a plain number with no unit attached. The page reads it when it works out Monthly payment and Paid off after. Fill it from a measurement rather than a memory — Credit card balance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate (APR)</strong> is a interest rate per year quantity: the page opens it in percentyear and converts anything else you pick before the formula runs. The page reads it when it works out Credit card balance, Monthly payment and Paid off after. Fill it from a measurement rather than a memory — Interest rate (APR) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Paid off after</strong> is a years / months / days quantity: the page opens it in yrsmosdays and converts anything else you pick before the formula runs. The page reads it when it works out Credit card balance, Monthly payment and Total paid. Fill it from a measurement rather than a memory — Paid off after is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Monthly payment</strong> is a plain number. The value follows from Credit card balance, Interest rate (APR) and Paid off after. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total paid</strong> is a plain number. The value follows from Monthly payment and Paid off after. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Credit card payoff actually offers.</p><ul><li><strong>interest rate per year</strong> — opens in <em>percentyear</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years / months / days</strong> — opens in <em>yrsmosdays</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Monthly payment is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are interest rate per year and years / months / days and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Credit card balance, Interest rate (APR) and Paid off after are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Credit card balance, Interest rate (APR) and Paid off after and the number you are missing is Monthly payment and Total paid.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/sabbatical">Sabbatical Calculator</a>, <a href="/finance/safety-stock">Safety stock Calculator</a> and <a href="/finance/salary">Salary Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Credit card payoff is a number to act on, so the useful question is what to do with Monthly payment (USD) and Total paid (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Credit card balance, Interest rate (APR) and Paid off after alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Credit card payoff calculator work out?', 'a' => <<<'TXT'
            Monthly payment and Total paid, from Credit card balance, Interest rate (APR) and Paid off after. The relationship is Monthly payment = Credit card balance × Interest rate (APR) × (Interest rate (APR) + 1)^(Paid off after) ÷ ((Interest rate (APR) + 1)^(Paid off after) − 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Credit card balance (USD), Interest rate (APR) (interest rate per year), Paid off after (years / months / days). Fill credit card balance, interest rate (APR) and paid off after and leave Monthly payment empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Monthly payment, Credit card balance, Paid off after and Total paid can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Monthly payment is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Credit card balance blank and the page solves for it, reporting Monthly payment instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Monthly payment keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/sabbatical', 'name' => 'Sabbatical Calculator'],
            ['path' => '/finance/safety-stock', 'name' => 'Safety stock Calculator'],
            ['path' => '/finance/salary', 'name' => 'Salary Calculator'],
        ],
        'authors' => [],
    ],
];
