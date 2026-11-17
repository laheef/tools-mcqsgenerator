<?php

/**
 * Simple interest
 * /finance/simple-interest
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Simple interest',
    'meta' => ['title' => 'Simple interest — Formula, Steps & Examples', 'description' => 'Simple interest works out total interest from principal and interest rate. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Simple interest Calculator', 'updated' => '2026-09-29'],
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
                            'label' => 'Principal',
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
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'help' => 'Annual interest rate.',
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
                            'name' => 'time',
                            'label' => 'Term',
                            'type' => 'number',
                            'help' => 'Time the loan is for.',
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
                            'name' => 'total_interest',
                            'label' => 'Total interest',
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
                            'name' => 'final_balance',
                            'label' => 'Final balance',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Total interest payment calculations',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payment',
                            'label' => 'Payment',
                            'type' => 'number',
                            'help' => 'How much interest you are charged per month/year.',
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
            'title' => 'payment = loan_amount * interest',
            'results' => ['interest' => 'payment/loan_amount', 'payment' => 'interest*loan_amount', 'loan_amount' => 'payment/interest'],
        ],
        [
            'title' => 'total_interest = payment * time',
            'results' => ['payment' => 'total_interest/time', 'total_interest' => 'payment*time', 'time' => 'total_interest/payment'],
        ],
        [
            'title' => 'final_balance = total_interest + loan_amount',
            'results' => ['final_balance' => 'loan_amount + total_interest', 'total_interest' => 'final_balance - loan_amount', 'loan_amount' => 'final_balance - total_interest'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Simple interest turns Principal and Interest rate into Term and Total interest. There is no hidden constant here: change term and principal moves with it. The main result, Term, is reported in years / months.
        TXT,
        'sections' => [
            ['title' => 'How the Simple interest calculator works', 'html' => <<<'TXT'
            <p>The Simple interest calculator applies one relationship to 2 numbers and reports Term, Total interest and Final balance.</p><p>In the form&#039;s own words, Payment = Interest rate × Principal.</p><p>The answers are Term, Total interest, Final balance and Payment; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Principal</strong> — in USD</li><li><strong>Interest rate</strong> — in interest rate per year. Annual interest rate.</li></ul><p>What you get back is Term in years / months, Total interest in USD, Final balance in USD, Payment in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Principal = 10 USD, Interest rate = 100 percentyear, Term = 1000 yrsmos, Total interest = 10 USD and Final balance = 100 USD; the answers are <strong>Payment</strong> = 1000 USD.</p><ul><li><strong>Payment</strong> = 1000 USD</li></ul><p>That is <strong>Payment</strong> = <code>Interest rate × Principal</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Payment</strong> = 1000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Term offers 9 units and opens on years / months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Payment</strong> = <code>Interest rate × Principal</code></li><li><strong>Interest rate</strong> = <code>Payment ÷ Principal</code></li><li><strong>Principal</strong> = <code>Payment ÷ Interest rate</code></li><li><strong>Total interest</strong> = <code>Payment × Term</code></li><li><strong>Term</strong> = <code>Total interest ÷ Payment</code></li><li><strong>Final balance</strong> = <code>Principal + Total interest</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Payment</strong> = <code>Interest rate × Principal</code> — the form to use when Interest rate and Principal are the values you have.</li><li><strong>Interest rate</strong> = <code>Payment ÷ Principal</code> — the form to use when Payment and Principal are the values you have.</li><li><strong>Principal</strong> = <code>Payment ÷ Interest rate</code> — the form to use when Payment and Interest rate are the values you have.</li><li><strong>Total interest</strong> = <code>Payment × Term</code> — the form to use when Payment and Term are the values you have.</li><li><strong>Payment</strong> = <code>Total interest ÷ Term</code> — the form to use when Total interest and Term are the values you have.</li><li><strong>Term</strong> = <code>Total interest ÷ Payment</code> — the form to use when Total interest and Payment are the values you have.</li><li><strong>Final balance</strong> = <code>Principal + Total interest</code> — the form to use when Principal and Total interest are the values you have.</li><li><strong>Total interest</strong> = <code>Final balance − Principal</code> — the form to use when Final balance and Principal are the values you have.</li></ul><p>Any one of Payment, Interest rate and Principal can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Principal from 10 to 20, leaving every other box alone. The panel moves from <strong>Payment</strong> 1000 USD to <strong>Payment</strong> 2000 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Interest rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Term, Total interest and Final balance are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Principal left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Principal is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Interest rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Interest rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Principal and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Principal</strong> takes a plain number with no unit attached. The page reads it when it works out Interest rate, Payment and Final balance. Have it to hand before you start: Principal is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest rate</strong> is a interest rate per year quantity: the page opens it in percentyear and converts anything else you pick before the formula runs. Annual interest rate. The page reads it when it works out Payment and Principal. Have it to hand before you start: Interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Term</strong> is a years / months figure. It is computed from Total interest and Payment, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total interest</strong> is a plain number. It is computed from Payment and Term, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Final balance</strong> is a plain number. It is computed from Principal and Total interest, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Payment</strong> is a plain number and the page's own defaults put it at 1000. It is computed from Interest rate and Principal, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Payment</th></tr></thead><tbody><tr><td><strong>Principal</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Interest rate</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Term</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total interest</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Final balance</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Interest rate sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Term, Total interest and Final balance barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Principal = 5 USD, Interest rate = 50 percentyear, Term = 500 yrsmos, Total interest = 5 USD and Final balance = 50 USD, the answer is <strong>Payment</strong> = 250 USD.</li><li>With Principal = 30 USD, Interest rate = 100 percentyear, Term = 1000 yrsmos, Total interest = 10 USD and Final balance = 100 USD, the answer is <strong>Payment</strong> = 3000 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>interest rate per year</strong> — opens in <em>percentyear</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Term follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover years / months and interest rate per year. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Principal and Interest rate measured, Term and Total interest wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/annual-to-monthly-salary">Annual to monthly salary Calculator</a>, <a href="/finance/annualized-rate-of-return">Annualized rate of return Calculator</a> and <a href="/finance/annualized-return">Annualized return Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Simple interest calculator work out?', 'a' => 'Term, Total interest, Final balance and Payment, from Interest rate and Principal. The relationship is Payment = Interest rate × Principal.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Principal (USD), Interest rate (interest rate per year). Enter principal and interest rate; Term is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Payment, Interest rate, Principal and Total interest blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Payment = 1000 USD. The figures come from Principal as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Term is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Principal left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Term at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/annual-to-monthly-salary', 'name' => 'Annual to monthly salary Calculator'],
            ['path' => '/finance/annualized-rate-of-return', 'name' => 'Annualized rate of return Calculator'],
            ['path' => '/finance/annualized-return', 'name' => 'Annualized return Calculator'],
        ],
        'authors' => [],
    ],
];
