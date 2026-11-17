<?php

/**
 * Personal loan
 * /finance/personal-loan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Personal loan',
    'meta' => ['title' => 'Personal loan Calculator — Formula & Results', 'description' => 'Personal loan works out monthly payment and total interest paid from loan amount and loan term. Results come back in USD, with any other unit a click away.', 'h1' => 'Personal loan Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
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
                            'name' => 'loan_term',
                            'label' => 'Loan term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
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
                            'help' => 'Insert the annual interest rate.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.00001'],
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
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'monthly_payment = (loan_amount) * (interest_rate / 12) / (1 - (1 + (interest_rate / 12)) ^ (- loan_term))',
            'results' => ['monthly_payment' => '(1/12)*interest_rate*loan_amount*pow(interest_rate + 12, loan_term)/(-pow(12, loan_term) + pow(interest_rate + 12, loan_term))', 'loan_amount' => '12*monthly_payment*(-pow(12, loan_term) + pow(interest_rate + 12, loan_term))*pow(interest_rate + 12, -loan_term)/interest_rate'],
        ],
        [
            'title' => 'total_interest_paid =  monthly_payment * loan_term - loan_amount',
            'results' => ['total_interest_paid' => '-loan_amount + loan_term*monthly_payment', 'monthly_payment' => '(loan_amount + total_interest_paid)/loan_term', 'loan_amount' => 'loan_term*monthly_payment - total_interest_paid', 'loan_term' => '(loan_amount + total_interest_paid)/monthly_payment'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Personal loan takes Loan amount, Loan term and Interest rate and returns Monthly payment and Total interest paid. The arithmetic is the whole method: monthly payment is worked out from loan amount by one formula, applied once. Monthly payment comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Personal loan calculator works', 'html' => <<<'TXT'
            <p>Personal loan answers one question from 3 numbers, and the answer is Monthly payment and Total interest paid.</p><p>In the form&#039;s own words, Monthly payment = (1 ÷ 12) × Interest rate × Loan amount × (Interest rate + 12)^(Loan term) ÷ ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term)).</p><p>What comes back is Monthly payment and Total interest paid — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Loan amount</strong> — in USD</li><li><strong>Loan term</strong> — in years / months</li><li><strong>Interest rate</strong> — in percent. Insert the annual interest rate.</li></ul><p>The result boxes are Monthly payment in USD, Total interest paid in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Loan term offers 9 units and opens on years / months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Monthly payment</strong> = <code>(1 ÷ 12) × Interest rate × Loan amount × (Interest rate + 12)^(Loan term) ÷ ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term))</code></li><li><strong>Loan amount</strong> = <code>12 × Monthly payment × ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term)) × (Interest rate + 12)^(− Loan term) ÷ Interest rate</code></li><li><strong>Total interest paid</strong> = <code>− Loan amount + Loan term × Monthly payment</code></li><li><strong>Loan term</strong> = <code>(Loan amount + Total interest paid) ÷ Monthly payment</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Monthly payment</strong> = <code>(1 ÷ 12) × Interest rate × Loan amount × (Interest rate + 12)^(Loan term) ÷ ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term))</code> — the form to use when Interest rate, Loan amount and Loan term are the values you have.</li><li><strong>Loan amount</strong> = <code>12 × Monthly payment × ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term)) × (Interest rate + 12)^(− Loan term) ÷ Interest rate</code> — the form to use when Monthly payment, Loan term and Interest rate are the values you have.</li><li><strong>Total interest paid</strong> = <code>− Loan amount + Loan term × Monthly payment</code> — the form to use when Loan amount, Loan term and Monthly payment are the values you have.</li><li><strong>Monthly payment</strong> = <code>(Loan amount + Total interest paid) ÷ Loan term</code> — the form to use when Loan amount, Total interest paid and Loan term are the values you have.</li><li><strong>Loan amount</strong> = <code>Loan term × Monthly payment − Total interest paid</code> — the form to use when Loan term, Monthly payment and Total interest paid are the values you have.</li><li><strong>Loan term</strong> = <code>(Loan amount + Total interest paid) ÷ Monthly payment</code> — the form to use when Loan amount, Total interest paid and Monthly payment are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Monthly payment, Loan amount and Total interest paid can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Loan term and Interest rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Monthly payment and Total interest paid are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Loan amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Loan term left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan term is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Loan amount and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Personal loan form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Loan amount</strong> takes a plain number with no unit attached. Change it and Monthly payment, Total interest paid and Loan term changes with it. Fill it from a measurement rather than a memory — Loan amount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Loan term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. Change it and Monthly payment, Loan amount and Total interest paid changes with it. Fill it from a measurement rather than a memory — Loan term is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Insert the annual interest rate. Change it and Monthly payment and Loan amount changes with it. Fill it from a measurement rather than a memory — Interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Monthly payment</strong> is a plain number. The value follows from Interest rate, Loan amount and Loan term. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total interest paid</strong> is a plain number. The value follows from Loan amount, Loan term and Monthly payment. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Personal loan actually offers.</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Loan amount, Loan term and Interest rate ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Loan amount — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Monthly payment in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Monthly payment is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are years / months and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Loan amount, Loan term and Interest rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Loan amount, Loan term and Interest rate measured, Monthly payment and Total interest paid wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/us-income-percentile">US income percentile Calculator</a>, <a href="/finance/va-disability">VA disability Calculator</a> and <a href="/finance/va-loan">VA loan Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Personal loan calculator work out?', 'a' => <<<'TXT'
            Monthly payment and Total interest paid, from Interest rate, Loan amount and Loan term. The relationship is Monthly payment = (1 ÷ 12) × Interest rate × Loan amount × (Interest rate + 12)^(Loan term) ÷ ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan amount (USD), Loan term (years / months), Interest rate (percent). Enter loan amount, loan term and interest rate; Monthly payment is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Monthly payment, Loan amount, Total interest paid and Loan term can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Monthly payment is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Loan amount blank and the page solves for it, reporting Monthly payment instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Monthly payment keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/us-income-percentile', 'name' => 'US income percentile Calculator'],
            ['path' => '/finance/va-disability', 'name' => 'VA disability Calculator'],
            ['path' => '/finance/va-loan', 'name' => 'VA loan Calculator'],
        ],
        'authors' => [],
    ],
];
