<?php

/**
 * Fixed deposit
 * /finance/fixed-deposit
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fixed deposit',
    'meta' => ['title' => 'Fixed deposit Calculator — Formula, Units & Example', 'description' => 'Fixed deposit reports maturity amount, total interest, payout per month and payout per interest period. The formula is printed in the form\'s own words.', 'h1' => 'Fixed deposit Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => 'Fixed deposit details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fd_type',
                            'label' => 'Fixed deposit type',
                            'type' => 'select',
                            'options' => ['Simple' => '0', 'Cumulative' => '1'],
                            'dataset' => 'fixed_deposit_type',
                            'default' => 'Cumulative',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'principal',
                            'label' => 'Principal amount',
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
                            'name' => 'interest_rate',
                            'label' => 'Interest rate',
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
                            'name' => 'term',
                            'label' => 'Term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compounding_frequency',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => ['Monthly' => '12', 'Quarterly' => '4', 'Semiannually' => '2', 'Annually' => '1'],
                            'dataset' => 'compounding_frequency',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maturity_amount_simple',
                            'label' => 'Maturity amount',
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
                            'name' => 'total_interest_simple',
                            'label' => 'Total interest',
                            'type' => 'number',
                            'help' => 'If you don\'t take any payouts.',
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
                            'name' => 'payout_per_month_simple',
                            'label' => 'Payout per month',
                            'type' => 'number',
                            'help' => 'Amount you will get if you withdraw part of your interest at the end of every month.',
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
                            'name' => 'maturity_amount_cumulative',
                            'label' => 'Maturity amount',
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
                            'name' => 'total_interest_cumulative',
                            'label' => 'Total interest',
                            'type' => 'number',
                            'help' => 'If you don\'t take any payouts.',
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
                            'name' => 'payout_per_interest_period',
                            'label' => 'Payout per interest period',
                            'type' => 'number',
                            'help' => 'Amount you will get if you withdraw your interest at the end of every compounding period.',
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
                            'name' => 'total_payout_cumulative',
                            'label' => 'Total payout',
                            'type' => 'number',
                            'help' => 'Total interest if you take payouts.',
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
            'title' => 'maturity_amount_simple = principal * (1 + (interest_rate*term))',
            'results' => ['interest_rate' => '(maturity_amount_simple - principal)/(principal*term)', 'term' => '(maturity_amount_simple - principal)/(interest_rate*principal)', 'maturity_amount_simple' => 'principal*(interest_rate*term + 1)', 'principal' => 'maturity_amount_simple/(interest_rate*term + 1)'],
        ],
        [
            'title' => 'maturity_amount_cumulative = principal * (1 + interest_rate/compounding_frequency)^(compounding_frequency*term)',
            'results' => ['principal' => 'maturity_amount_cumulative*pow((compounding_frequency + interest_rate)/compounding_frequency, -compounding_frequency*term)', 'maturity_amount_cumulative' => 'principal*pow((compounding_frequency + interest_rate)/compounding_frequency, compounding_frequency*term)', 'interest_rate' => 'compounding_frequency*(pow(maturity_amount_cumulative/principal, 1/(compounding_frequency*term)) - 1)', 'term' => 'log(maturity_amount_cumulative/principal)/(compounding_frequency*log((compounding_frequency + interest_rate)/compounding_frequency))'],
        ],
        [
            'title' => 'total_interest_simple = maturity_amount_simple - principal',
            'results' => ['total_interest_simple' => 'maturity_amount_simple - principal', 'maturity_amount_simple' => 'principal + total_interest_simple', 'principal' => 'maturity_amount_simple - total_interest_simple'],
        ],
        [
            'title' => 'payout_per_month_simple = total_interest_simple / compounding_frequency',
            'results' => ['payout_per_month_simple' => 'total_interest_simple/compounding_frequency', 'total_interest_simple' => 'compounding_frequency*payout_per_month_simple', 'compounding_frequency' => 'total_interest_simple/payout_per_month_simple'],
        ],
        [
            'title' => 'total_interest_cumulative = maturity_amount_cumulative - principal',
            'results' => ['principal' => 'maturity_amount_cumulative - total_interest_cumulative', 'total_interest_cumulative' => 'maturity_amount_cumulative - principal', 'maturity_amount_cumulative' => 'principal + total_interest_cumulative'],
        ],
        [
            'title' => 'payout_per_interest_period = (principal * ( 1+interest_rate)^(1/compounding_frequency)) - principal',
            'results' => ['interest_rate' => 'pow((payout_per_interest_period + principal)/principal, compounding_frequency) - 1', 'payout_per_interest_period' => 'principal*(pow(interest_rate + 1, 1/compounding_frequency) - 1)', 'compounding_frequency' => 'log(interest_rate + 1)/log((payout_per_interest_period + principal)/principal)', 'principal' => 'payout_per_interest_period/(pow(interest_rate + 1, 1/compounding_frequency) - 1)'],
        ],
        [
            'title' => 'total_payout_cumulative = payout_per_interest_period * (compounding_frequency*term)',
            'results' => ['payout_per_interest_period' => 'total_payout_cumulative/(compounding_frequency*term)', 'term' => 'total_payout_cumulative/(compounding_frequency*payout_per_interest_period)', 'compounding_frequency' => 'total_payout_cumulative/(payout_per_interest_period*term)', 'total_payout_cumulative' => 'compounding_frequency*payout_per_interest_period*term'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Fixed deposit turns Principal amount, Interest rate and Term into Compounding frequency and Maturity amount. It is a single relationship that reads compounding frequency out of principal amount, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Fixed deposit calculator works', 'html' => <<<'TXT'
            <p>The Fixed deposit calculator applies one relationship to 3 numbers and reports Compounding frequency, Maturity amount and Total interest.</p><p>Written with the labels from the form, Maturity amount = Principal amount × (Interest rate × Term + 1).</p><p>The result panel carries Compounding frequency, Maturity amount, Total interest and Payout per month, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Principal amount</strong> — in USD</li><li><strong>Interest rate</strong> — in percent</li><li><strong>Term</strong> — in years</li></ul><p>The result boxes are Compounding frequency, Maturity amount in USD, Total interest in USD, Payout per month in USD, Maturity amount in USD, Total interest in USD, Payout per interest period in USD, Total payout in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Fixed deposit type = 1 — through the same formula and the panel reports <strong>Compounding frequency</strong> = 12.</p><ul><li><strong>Compounding frequency</strong> = 12</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Maturity amount</strong> = <code>Principal amount × (Interest rate × Term + 1)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Compounding frequency</strong> = 12 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Interest rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Maturity amount</strong> = <code>Principal amount × (Interest rate × Term + 1)</code></li><li><strong>Interest rate</strong> = <code>(Maturity amount − Principal amount) ÷ (Principal amount × Term)</code></li><li><strong>Term</strong> = <code>(Maturity amount − Principal amount) ÷ (Interest rate × Principal amount)</code></li><li><strong>Principal amount</strong> = <code>Maturity amount ÷ (Interest rate × Term + 1)</code></li><li><strong>Total interest</strong> = <code>Maturity amount − Principal amount</code></li><li><strong>Payout per month</strong> = <code>Total interest ÷ Compounding frequency</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Maturity amount</strong> = <code>Principal amount × (Interest rate × Term + 1)</code> — the form to use when Principal amount, Interest rate and Term are the values you have.</li><li><strong>Interest rate</strong> = <code>(Maturity amount − Principal amount) ÷ (Principal amount × Term)</code> — the form to use when Maturity amount, Principal amount and Term are the values you have.</li><li><strong>Term</strong> = <code>(Maturity amount − Principal amount) ÷ (Interest rate × Principal amount)</code> — the form to use when Maturity amount, Principal amount and Interest rate are the values you have.</li><li><strong>Principal amount</strong> = <code>Maturity amount ÷ (Interest rate × Term + 1)</code> — the form to use when Maturity amount, Interest rate and Term are the values you have.</li><li><strong>Maturity amount</strong> = <code>Principal amount × ((Compounding frequency + Interest rate) ÷ Compounding frequency)^(Compounding frequency × Term)</code> — the form to use when Principal amount, Compounding frequency, Interest rate and Term are the values you have.</li><li><strong>Principal amount</strong> = <code>Maturity amount × ((Compounding frequency + Interest rate) ÷ Compounding frequency)^(− Compounding frequency × Term)</code> — the form to use when Maturity amount, Compounding frequency, Interest rate and Term are the values you have.</li><li><strong>Interest rate</strong> = <code>Compounding frequency × ((Maturity amount ÷ Principal amount)^(1 ÷ (Compounding frequency × Term)) − 1)</code> — the form to use when Compounding frequency, Maturity amount, Principal amount and Term are the values you have.</li><li><strong>Term</strong> = <code>ln(Maturity amount ÷ Principal amount) ÷ (Compounding frequency × ln((Compounding frequency + Interest rate) ÷ Compounding frequency))</code> — the form to use when Maturity amount, Principal amount, Compounding frequency and Interest rate are the values you have.</li></ul><p>Any one of Maturity amount, Interest rate and Term can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Fixed deposit type from 1 to 2, leaving every other box alone. The panel moves from <strong>Compounding frequency</strong> 12 to <strong>Compounding frequency</strong> 12.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Interest rate and Term is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Compounding frequency, Maturity amount and Total interest are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Principal amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Principal amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Interest rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Interest rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Principal amount to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Fixed deposit form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Principal amount</strong> takes a plain number with no unit attached. It feeds Interest rate, Term and Maturity amount. Fill it from a measurement rather than a memory — Principal amount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Term, Maturity amount and Principal amount. Fill it from a measurement rather than a memory — Interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Term</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. It feeds Interest rate, Maturity amount and Principal amount. Fill it from a measurement rather than a memory — Term is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 8 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Compounding frequency</strong> is a plain number and the page's own defaults put it at 12. It is computed from Total interest and Payout per month, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Maturity amount</strong> is a plain number. It is computed from Principal amount, Interest rate and Term, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total interest</strong> is a plain number. It is computed from Maturity amount and Principal amount, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Payout per month</strong> is a plain number. It is computed from Total interest and Compounding frequency, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Maturity amount</strong> is a plain number. It is computed from Principal amount, Compounding frequency, Interest rate and Term, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total interest</strong> is a plain number. It is computed from Maturity amount and Principal amount, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Payout per interest period</strong> is a plain number. It is computed from Principal amount, Interest rate and Compounding frequency, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total payout</strong> is a plain number. It is computed from Compounding frequency, Payout per interest period and Term, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Compounding frequency is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent and years. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Principal amount, Interest rate and Term and the number you are missing is Compounding frequency and Maturity amount.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/annuity-future-value">Future value of annuity</a>, <a href="/finance/future-value">Future value</a> and <a href="/finance/futures-contract">Futures contract Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fixed deposit calculator work out?', 'a' => <<<'TXT'
            Compounding frequency, Maturity amount, Total interest and Payout per month, from Principal amount, Interest rate and Term. The relationship is Maturity amount = Principal amount × (Interest rate × Term + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Principal amount (USD), Interest rate (percent), Term (years). Enter principal amount, interest rate and term; Compounding frequency is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Maturity amount, Interest rate, Term and Principal amount blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Compounding frequency = 12. Those are the defaults written into the form — move Principal amount and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Compounding frequency is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Principal amount blank and the page solves for it, reporting Compounding frequency instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Compounding frequency keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/annuity-future-value', 'name' => 'Future value of annuity'],
            ['path' => '/finance/future-value', 'name' => 'Future value'],
            ['path' => '/finance/futures-contract', 'name' => 'Futures contract Calculator'],
        ],
        'authors' => [],
    ],
];
