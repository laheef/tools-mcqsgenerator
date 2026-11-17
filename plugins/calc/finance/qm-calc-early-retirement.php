<?php

/**
 * Early retirement
 * /finance/early-retirement
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Early retirement',
    'meta' => ['title' => 'Early retirement — Formula, Steps & Examples', 'description' => 'Early retirement turns net income, expenses and initial balance into monthly deposit and required balance. The formula is printed in the form\'s own words.', 'h1' => 'Early retirement Calculator', 'updated' => '2026-09-01'],
    'sections' => [
        [
            'title' => 'Monthly deposit',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_income',
                            'label' => 'Net income',
                            'type' => 'number',
                            'help' => 'Your income after taxes.',
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
                            'name' => 'expenses',
                            'label' => 'Expenses',
                            'type' => 'number',
                            'help' => 'How much money you spend (and will keep spending until you die, adjusted for inflation).',
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
                            'name' => 'initial_balance',
                            'label' => 'Initial balance',
                            'type' => 'number',
                            'help' => 'Got any savings right now?',
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
                            'name' => 'monthly_deposit',
                            'label' => 'Monthly deposit',
                            'type' => 'number',
                            'help' => 'Income minus expenses – we assume that all the money you don\'t spend goes towards your early retirement.',
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
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_rate',
                            'label' => 'Return on investment',
                            'type' => 'number',
                            'help' => 'The default is based on Warren Buffet\'s reasoning. It ignores inflation.',
                            'unit' => '37',
                            'unit_default' => 'percentyear',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'withdrawal_rate',
                            'label' => 'Withdrawal rate',
                            'type' => 'number',
                            'help' => 'We want to save enough money, so that this percentage withdrawn annually will cover our expenses.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_balance',
                            'label' => 'Required balance',
                            'type' => 'number',
                            'help' => 'This is how much we need to have in our coffers by the time we go to early retirement.',
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
                            'name' => 'total_contribution',
                            'label' => 'Total contribution',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
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
                            'readonly' => true,
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'months',
                            'label' => 'Duration',
                            'type' => 'number',
                            'help' => 'This is when we\'ll be able to go on early retirement. Mark it on your calendar ',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'final_balance = monthly_deposit * (((1 + interest_rate)^(months) - 1) / interest_rate) + initial_balance * (1 + interest_rate)^months',
            'results' => ['final_balance' => '(initial_balance*interest_rate*pow(interest_rate + 1, months) + monthly_deposit*pow(interest_rate + 1, months) - monthly_deposit)/interest_rate', 'months' => 'log((final_balance*interest_rate + monthly_deposit)/(initial_balance*interest_rate + monthly_deposit))/log(interest_rate + 1)', 'initial_balance' => 'pow(interest_rate + 1, -months)*(final_balance*interest_rate - monthly_deposit*pow(interest_rate + 1, months) + monthly_deposit)/interest_rate', 'monthly_deposit' => 'interest_rate*(final_balance - initial_balance*pow(interest_rate + 1, months))/(pow(interest_rate + 1, months) - 1)'],
        ],
        [
            'title' => 'final_balance = total_interest + total_contribution',
            'results' => ['final_balance' => 'total_contribution + total_interest', 'total_interest' => 'final_balance - total_contribution', 'total_contribution' => 'final_balance - total_interest'],
        ],
        [
            'title' => 'total_contribution = initial_balance + monthly_deposit * months',
            'results' => ['months' => '(-initial_balance + total_contribution)/monthly_deposit', 'initial_balance' => '-monthly_deposit*months + total_contribution', 'monthly_deposit' => '(-initial_balance + total_contribution)/months', 'total_contribution' => 'initial_balance + monthly_deposit*months'],
        ],
        [
            'title' => 'monthly_deposit = net_income - expenses',
            'results' => ['expenses' => '-monthly_deposit + net_income', 'monthly_deposit' => '-expenses + net_income', 'net_income' => 'expenses + monthly_deposit'],
        ],
        [
            'title' => 'final_balance * withdrawal_rate = expenses * 12 ',
            'results' => ['expenses' => '(1/12)*final_balance*withdrawal_rate', 'final_balance' => '12*expenses/withdrawal_rate', 'withdrawal_rate' => '12*expenses/final_balance'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Early retirement turns Net income, Expenses and Initial balance into Total contribution and Total interest. Nothing is looked up on this page: total contribution is computed from net income and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Total contribution is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Early retirement calculator works', 'html' => <<<'TXT'
            <p>The Early retirement calculator applies one relationship to 8 numbers and reports Total contribution and Total interest.</p><p>The relationship it solves reads Required balance = (Initial balance × Return on investment × (Return on investment + 1)^(Duration) + Monthly deposit × (Return on investment + 1)^(Duration) − Monthly deposit) ÷ Return on investment.</p><p>The result panel carries Total contribution and Total interest, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 8 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Net income</strong> — in USD. Your income after taxes.</li><li><strong>Expenses</strong> — in USD. How much money you spend (and will keep spending until you die, adjusted for inflation).</li><li><strong>Initial balance</strong> — in USD. Got any savings right now?</li><li><strong>Monthly deposit</strong> — in USD. Income minus expenses – we assume that all the money you don&#039;t spend goes towards your early retirement.</li><li><strong>Return on investment</strong> — in interest rate per year. The default is based on Warren Buffet&#039;s reasoning. It ignores inflation.</li><li><strong>Withdrawal rate</strong> — in percent. We want to save enough money, so that this percentage withdrawn annually will cover our expenses.</li><li><strong>Required balance</strong> — in USD. This is how much we need to have in our coffers by the time we go to early retirement.</li><li><strong>Duration</strong> — in years / months. This is when we&#039;ll be able to go on early retirement. Mark it on your calendar</li></ul><p>What you get back is Total contribution in USD, Total interest in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Return on investment offers 6 units and opens on interest rate per year, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Required balance</strong> = <code>(Initial balance × Return on investment × (Return on investment + 1)^(Duration) + Monthly deposit × (Return on investment + 1)^(Duration) − Monthly deposit) ÷ Return on investment</code></li><li><strong>Duration</strong> = <code>ln((Required balance × Return on investment + Monthly deposit) ÷ (Initial balance × Return on investment + Monthly deposit)) ÷ ln(Return on investment + 1)</code></li><li><strong>Initial balance</strong> = <code>(Return on investment + 1)^(− Duration) × (Required balance × Return on investment − Monthly deposit × (Return on investment + 1)^(Duration) + Monthly deposit) ÷ Return on investment</code></li><li><strong>Monthly deposit</strong> = <code>Return on investment × (Required balance − Initial balance × (Return on investment + 1)^(Duration)) ÷ ((Return on investment + 1)^(Duration) − 1)</code></li><li><strong>Total interest</strong> = <code>Required balance − Total contribution</code></li><li><strong>Total contribution</strong> = <code>Required balance − Total interest</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Required balance</strong> = <code>(Initial balance × Return on investment × (Return on investment + 1)^(Duration) + Monthly deposit × (Return on investment + 1)^(Duration) − Monthly deposit) ÷ Return on investment</code> — the form to use when Initial balance, Return on investment, Duration and Monthly deposit are the values you have.</li><li><strong>Duration</strong> = <code>ln((Required balance × Return on investment + Monthly deposit) ÷ (Initial balance × Return on investment + Monthly deposit)) ÷ ln(Return on investment + 1)</code> — the form to use when Required balance, Return on investment, Monthly deposit and Initial balance are the values you have.</li><li><strong>Initial balance</strong> = <code>(Return on investment + 1)^(− Duration) × (Required balance × Return on investment − Monthly deposit × (Return on investment + 1)^(Duration) + Monthly deposit) ÷ Return on investment</code> — the form to use when Return on investment, Duration, Required balance and Monthly deposit are the values you have.</li><li><strong>Monthly deposit</strong> = <code>Return on investment × (Required balance − Initial balance × (Return on investment + 1)^(Duration)) ÷ ((Return on investment + 1)^(Duration) − 1)</code> — the form to use when Return on investment, Required balance, Initial balance and Duration are the values you have.</li><li><strong>Required balance</strong> = <code>Total contribution + Total interest</code> — the form to use when Total contribution and Total interest are the values you have.</li><li><strong>Total interest</strong> = <code>Required balance − Total contribution</code> — the form to use when Required balance and Total contribution are the values you have.</li><li><strong>Total contribution</strong> = <code>Required balance − Total interest</code> — the form to use when Required balance and Total interest are the values you have.</li><li><strong>Total contribution</strong> = <code>Initial balance + Monthly deposit × Duration</code> — the form to use when Initial balance, Monthly deposit and Duration are the values you have.</li></ul><p>Any one of Required balance, Duration and Initial balance can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Return on investment, Withdrawal rate and Duration is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total contribution and Total interest are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Net income left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Net income is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Expenses left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Expenses is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Net income is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Early retirement form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Net income</strong> takes a plain number with no unit attached. Your income after taxes. The page reads it when it works out Expenses and Monthly deposit. Fill it from a measurement rather than a memory — Net income is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Expenses</strong> takes a plain number with no unit attached. How much money you spend (and will keep spending until you die, adjusted for inflation). The page reads it when it works out Monthly deposit, Net income and Required balance. Fill it from a measurement rather than a memory — Expenses is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Initial balance</strong> takes a plain number with no unit attached. Got any savings right now?. The page reads it when it works out Required balance, Duration and Monthly deposit. Fill it from a measurement rather than a memory — Initial balance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Monthly deposit</strong> takes a plain number with no unit attached. Income minus expenses – we assume that all the money you don&#039;t spend goes towards your early retirement. The page reads it when it works out Required balance, Duration and Initial balance. Fill it from a measurement rather than a memory — Monthly deposit is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Return on investment</strong> is a interest rate per year quantity: the page opens it in percentyear and converts anything else you pick before the formula runs. The default is based on Warren Buffet&#039;s reasoning. It ignores inflation. The page reads it when it works out Required balance, Duration and Initial balance. Fill it from a measurement rather than a memory — Return on investment is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Withdrawal rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. We want to save enough money, so that this percentage withdrawn annually will cover our expenses. The page reads it when it works out Expenses and Required balance. Fill it from a measurement rather than a memory — Withdrawal rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Required balance</strong> takes a plain number with no unit attached. This is how much we need to have in our coffers by the time we go to early retirement. The page reads it when it works out Duration, Initial balance and Monthly deposit. Fill it from a measurement rather than a memory — Required balance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Duration</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. This is when we&#039;ll be able to go on early retirement. Mark it on your calendar. The page reads it when it works out Required balance, Initial balance and Monthly deposit. Fill it from a measurement rather than a memory — Duration is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Total contribution</strong> is a plain number. It is worked out from Required balance and Total interest. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total interest</strong> is a plain number. It is worked out from Required balance and Total contribution. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Early retirement actually offers.</p><ul><li><strong>interest rate per year</strong> — opens in <em>percentyear</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Total contribution is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover interest rate per year and years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Net income, Expenses and Initial balance measured, Total contribution and Total interest wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/direct-material-price-variance">Direct material price variance Calculator</a>, <a href="/finance/discount-rate">Discount rate Calculator</a> and <a href="/finance/discount">Discount</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Early retirement calculator work out?', 'a' => <<<'TXT'
            Total contribution and Total interest, from Initial balance, Return on investment, Duration and Monthly deposit. The relationship is Required balance = (Initial balance × Return on investment × (Return on investment + 1)^(Duration) + Monthly deposit × (Return on investment + 1)^(Duration) − Monthly deposit) ÷ Return on investment.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Net income (USD), Expenses (USD), Initial balance (USD), Monthly deposit (USD), Return on investment (interest rate per year). Fill net income, expenses and initial balance and leave Total contribution empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Required balance, Duration, Initial balance and Monthly deposit blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Total contribution is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Net income blank and the page solves for it, reporting Total contribution instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Total contribution at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/direct-material-price-variance', 'name' => 'Direct material price variance Calculator'],
            ['path' => '/finance/discount-rate', 'name' => 'Discount rate Calculator'],
            ['path' => '/finance/discount', 'name' => 'Discount'],
        ],
        'authors' => [],
    ],
];
