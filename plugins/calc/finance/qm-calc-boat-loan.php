<?php

/**
 * Boat loan
 * /finance/boat-loan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Boat loan',
    'meta' => ['title' => 'Boat loan Calculator: Formula, Steps & Examples', 'description' => 'Boat loan works out monthly payment and total interest paid from loan amount and loan term. Results come back in USD, with any other unit a click away.', 'h1' => 'Boat loan Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amount_of_loan',
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
                            'name' => 'term',
                            'label' => 'Loan term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_rate',
                            'label' => 'Annual interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
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
                            'name' => 'cost_of_loan',
                            'label' => 'Total interest paid',
                            'type' => 'number',
                            'help' => 'The total amount you have to pay to the lender in addition to the loan amount.',
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
            'title' => <<<'TXT'
            monthly_payment = amount_of_loan * (1+(interest_rate+0.00000000001)/12)^term * ((1+(interest_rate+0.00000000001)/12)-1)/((1 + (interest_rate+0.00000000001)/12)^term - 1)
            TXT,
            'results' => ['amount_of_loan' => <<<'TXT'
            1200000000000*monthly_payment*(-pow(1200000000000, term) + pow(100000000000*interest_rate + 1200000000001, term))*pow(100000000000*interest_rate + 1200000000001, -term)/(100000000000*interest_rate + 1)
            TXT, 'monthly_payment' => <<<'TXT'
            (1/1200000000000)*amount_of_loan*(100000000000*interest_rate + 1)*pow(100000000000*interest_rate + 1200000000001, term)/(-pow(1200000000000, term) + pow(100000000000*interest_rate + 1200000000001, term))
            TXT],
        ],
        [
            'title' => 'cost_of_loan = term * monthly_payment - amount_of_loan ',
            'results' => ['term' => '(amount_of_loan + cost_of_loan)/monthly_payment', 'amount_of_loan' => '-cost_of_loan + monthly_payment*term', 'cost_of_loan' => '-amount_of_loan + monthly_payment*term', 'monthly_payment' => '(amount_of_loan + cost_of_loan)/term'],
        ],
        [
            'title' => <<<'TXT'
            cost_of_loan = term * amount_of_loan * (1+(interest_rate+0.00000000001)/12)^term * ((1+(interest_rate+0.00000000001)/12)-1)/((1 + (interest_rate+0.00000000001)/12)^term - 1) - amount_of_loan
            TXT,
            'results' => ['amount_of_loan' => <<<'TXT'
            1200000000000*cost_of_loan*(-pow(1200000000000, term) + pow(100000000000*interest_rate + 1200000000001, term))/(pow(1200000000000, term + 1) + 100000000000*interest_rate*term*pow(100000000000*interest_rate + 1200000000001, term) + term*pow(100000000000*interest_rate + 1200000000001, term) - 1200000000000*pow(100000000000*interest_rate + 1200000000001, term))
            TXT, 'cost_of_loan' => <<<'TXT'
            pow(1200000000000, -term - 1)*amount_of_loan*(pow(1200000000000, term + 1)*pow(100000000000*interest_rate + 1200000000001, term) - pow(1200000000000, 2*term + 1) - 100000000000*interest_rate*term*pow(120000000000000000000000*interest_rate + 1440000000001200000000000, term) - term*pow(120000000000000000000000*interest_rate + 1440000000001200000000000, term))/(pow(1200000000000, term) - pow(100000000000*interest_rate + 1200000000001, term))
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Boat loan turns Loan amount, Loan term and Annual interest rate into Monthly payment and Total interest paid. The arithmetic is the whole method: monthly payment is worked out from loan amount by one formula, applied once. Monthly payment comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Boat loan calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Boat loan: it takes 3 numbers and reports Monthly payment and Total interest paid.</p><p>What comes back is Monthly payment and Total interest paid — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Loan amount</strong> — in USD</li><li><strong>Loan term</strong> — in years</li><li><strong>Annual interest rate</strong> — in percent</li></ul><p>What you get back is Monthly payment in USD, Total interest paid in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Loan term offers 5 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total interest paid</strong> = <code>− Loan amount + Monthly payment × Loan term</code></li><li><strong>Loan term</strong> = <code>(Loan amount + Total interest paid) ÷ Monthly payment</code></li><li><strong>Loan amount</strong> = <code>− Total interest paid + Monthly payment × Loan term</code></li><li><strong>Monthly payment</strong> = <code>(Loan amount + Total interest paid) ÷ Loan term</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total interest paid</strong> = <code>− Loan amount + Monthly payment × Loan term</code> — the form to use when Loan amount, Monthly payment and Loan term are the values you have.</li><li><strong>Loan term</strong> = <code>(Loan amount + Total interest paid) ÷ Monthly payment</code> — the form to use when Loan amount, Total interest paid and Monthly payment are the values you have.</li><li><strong>Loan amount</strong> = <code>− Total interest paid + Monthly payment × Loan term</code> — the form to use when Total interest paid, Monthly payment and Loan term are the values you have.</li><li><strong>Monthly payment</strong> = <code>(Loan amount + Total interest paid) ÷ Loan term</code> — the form to use when Loan amount, Total interest paid and Loan term are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Monthly payment, Loan amount and Total interest paid can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Loan term and Annual interest rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Monthly payment and Total interest paid are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Loan amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Loan term left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan term is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Loan amount and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Loan amount</strong> takes a plain number with no unit attached. Change it and Monthly payment, Loan term and Total interest paid changes with it. Have it to hand before you start: Loan amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Loan term</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. Change it and Loan amount, Monthly payment and Total interest paid changes with it. Have it to hand before you start: Loan term is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Annual interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Loan amount, Monthly payment and Total interest paid changes with it. Have it to hand before you start: Annual interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Monthly payment</strong> is a plain number. It is worked out from Loan amount, Annual interest rate and Loan term. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total interest paid</strong> is a plain number. It is worked out from Loan amount, Monthly payment and Loan term. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Loan amount, Loan term and Annual interest rate. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Loan amount into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Monthly payment in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Monthly payment is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover years and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Loan amount, Loan term and Annual interest rate is what you already know and Monthly payment and Total interest paid is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/biden-tax-plan">Biden&#039;s Tax Plan Calculator</a>, <a href="/finance/bill-rate">Bill rate Calculator</a> and <a href="/finance/billable-hours">Billable hours Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Boat loan is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Loan amount, Loan term and Annual interest rate beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Boat loan calculator work out?', 'a' => 'Monthly payment and Total interest paid, from Loan amount, Annual interest rate and Loan term.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan amount (USD), Loan term (years), Annual interest rate (percent). Fill loan amount, loan term and annual interest rate and leave Monthly payment empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Monthly payment, Loan amount, Total interest paid and Loan term can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Monthly payment is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Loan amount left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Monthly payment keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/biden-tax-plan', 'name' => 'Biden\'s Tax Plan Calculator'],
            ['path' => '/finance/bill-rate', 'name' => 'Bill rate Calculator'],
            ['path' => '/finance/billable-hours', 'name' => 'Billable hours Calculator'],
        ],
        'authors' => [],
    ],
];
