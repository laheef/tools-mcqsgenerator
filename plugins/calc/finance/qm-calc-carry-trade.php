<?php

/**
 * Carry trade
 * /finance/carry-trade
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Carry trade',
    'meta' => ['title' => 'Carry trade Calculator: Formula, Steps & Examples', 'description' => 'Carry trade works out spot rate differential from initial exchange rate. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Carry trade Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Spot rate differential',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'iniEx',
                            'label' => 'Initial exchange rate',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'endEx',
                            'label' => 'Settle exchange rate',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'srDiff',
                            'label' => 'Spot rate differential',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Investment return',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days',
                            'label' => 'Days until trade settles',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lendRate',
                            'label' => 'Lending rate',
                            'type' => 'number',
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
                            'name' => 'borrowRate',
                            'label' => 'Borrowing rate',
                            'type' => 'number',
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
                            'name' => 'inv_return',
                            'label' => 'Investment return',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Carry trade profit',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amt_invest',
                            'label' => 'Amount invested',
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
                            'name' => 'ct_profit',
                            'label' => 'Carry trade profit',
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
                                ['when' => 'ct_profit > 0', 'text' => 'The carry trade will earn you a positive profit. &nbsp;'],
                                ['when' => 'ct_profit == 0', 'text' => 'Your carry trade just breaks even.&nbsp;'],
                                ['when' => 'ct_profit < 0', 'text' => 'You are making a loss on the carry trade. '],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'srDiff = (endEx - iniEx) / iniEx',
            'results' => ['endEx' => 'iniEx*(srDiff + 1)', 'srDiff' => '(endEx - iniEx)/iniEx', 'iniEx' => 'endEx/(srDiff + 1)'],
        ],
        [
            'title' => 'inv_return = (1 + (lendRate - borrowRate) * (1 + srDiff)) ^ (days/360) - 1 ',
            'results' => ['inv_return' => 'pow(-borrowRate*srDiff - borrowRate + lendRate*srDiff + lendRate + 1, (1/360)*days) - 1', 'days' => '360*log(inv_return + 1)/log(-borrowRate*srDiff - borrowRate + lendRate*srDiff + lendRate + 1)'],
        ],
        [
            'title' => 'ct_profit = inv_return * amt_invest',
            'results' => ['amt_invest' => 'ct_profit/inv_return', 'ct_profit' => 'amt_invest*inv_return', 'inv_return' => 'ct_profit/amt_invest'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Carry trade takes Initial exchange rate and Settle exchange rate and returns Spot rate differential and Days until trade settles. It is a single relationship that reads spot rate differential out of initial exchange rate, not a table of canned results keyed by them. Units for Spot rate differential default to percent and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Carry trade calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Carry trade: it takes 2 numbers and reports Spot rate differential, Days until trade settles and Investment return.</p><p>In the form&#039;s own words, Spot rate differential = (Settle exchange rate − Initial exchange rate) ÷ Initial exchange rate.</p><p>The answers are Spot rate differential, Days until trade settles, Investment return and Amount invested; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Initial exchange rate</strong> — a plain number, no unit</li><li><strong>Settle exchange rate</strong> — a plain number, no unit</li></ul><p>The result boxes are Spot rate differential in percent, Days until trade settles in days, Investment return in percent, Amount invested in USD, Carry trade profit in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Spot rate differential offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Spot rate differential</strong> = <code>(Settle exchange rate − Initial exchange rate) ÷ Initial exchange rate</code></li><li><strong>Settle exchange rate</strong> = <code>Initial exchange rate × (Spot rate differential + 1)</code></li><li><strong>Initial exchange rate</strong> = <code>Settle exchange rate ÷ (Spot rate differential + 1)</code></li><li><strong>Investment return</strong> = <code>(− Borrowing rate × Spot rate differential − Borrowing rate + Lending rate × Spot rate differential + Lending rate + 1)^((1 ÷ 360) × Days until trade settles) − 1</code></li><li><strong>Days until trade settles</strong> = <code>360 × ln(Investment return + 1) ÷ ln( − Borrowing rate × Spot rate differential − Borrowing rate + Lending rate × Spot rate differential + Lending rate + 1)</code></li><li><strong>Carry trade profit</strong> = <code>Amount invested × Investment return</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Spot rate differential</strong> = <code>(Settle exchange rate − Initial exchange rate) ÷ Initial exchange rate</code> — the form to use when Settle exchange rate and Initial exchange rate are the values you have.</li><li><strong>Settle exchange rate</strong> = <code>Initial exchange rate × (Spot rate differential + 1)</code> — the form to use when Initial exchange rate and Spot rate differential are the values you have.</li><li><strong>Initial exchange rate</strong> = <code>Settle exchange rate ÷ (Spot rate differential + 1)</code> — the form to use when Settle exchange rate and Spot rate differential are the values you have.</li><li><strong>Investment return</strong> = <code>(− Borrowing rate × Spot rate differential − Borrowing rate + Lending rate × Spot rate differential + Lending rate + 1)^((1 ÷ 360) × Days until trade settles) − 1</code> — the form to use when Borrowing rate, Spot rate differential, Lending rate and Days until trade settles are the values you have.</li><li><strong>Days until trade settles</strong> = <code>360 × ln(Investment return + 1) ÷ ln( − Borrowing rate × Spot rate differential − Borrowing rate + Lending rate × Spot rate differential + Lending rate + 1)</code> — the form to use when Investment return, Borrowing rate, Spot rate differential and Lending rate are the values you have.</li><li><strong>Carry trade profit</strong> = <code>Amount invested × Investment return</code> — the form to use when Amount invested and Investment return are the values you have.</li><li><strong>Amount invested</strong> = <code>Carry trade profit ÷ Investment return</code> — the form to use when Carry trade profit and Investment return are the values you have.</li><li><strong>Investment return</strong> = <code>Carry trade profit ÷ Amount invested</code> — the form to use when Carry trade profit and Amount invested are the values you have.</li></ul><p>Any one of Spot rate differential, Settle exchange rate and Initial exchange rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Spot rate differential, Days until trade settles and Investment return are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Initial exchange rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Initial exchange rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Settle exchange rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Settle exchange rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Initial exchange rate is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Carry trade form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Initial exchange rate</strong> takes a plain number with no unit attached. It feeds Settle exchange rate and Spot rate differential. Fill it from a measurement rather than a memory — Initial exchange rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Settle exchange rate</strong> takes a plain number with no unit attached. It feeds Spot rate differential and Initial exchange rate. Fill it from a measurement rather than a memory — Settle exchange rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Spot rate differential</strong> is a percent figure. It is worked out from Settle exchange rate and Initial exchange rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Days until trade settles</strong> is a plain number. It is worked out from Investment return, Borrowing rate, Spot rate differential and Lending rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Investment return</strong> is a percent figure. It is worked out from Borrowing rate, Spot rate differential, Lending rate and Days until trade settles. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Amount invested</strong> is a plain number. It is worked out from Carry trade profit and Investment return. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Carry trade profit</strong> is a plain number. It is worked out from Amount invested and Investment return. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Carry trade actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Spot rate differential is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Initial exchange rate and Settle exchange rate and the number you are missing is Spot rate differential and Days until trade settles.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/free-float">Free float Calculator</a>, <a href="/finance/full-time-equivalent">Full-time equivalent</a> and <a href="/finance/ffo">Funds from operation (FFO) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Carry trade calculator work out?', 'a' => <<<'TXT'
            Spot rate differential, Days until trade settles, Investment return and Amount invested, from Settle exchange rate and Initial exchange rate. The relationship is Spot rate differential = (Settle exchange rate − Initial exchange rate) ÷ Initial exchange rate.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial exchange rate, Settle exchange rate. Enter initial exchange rate and settle exchange rate; Spot rate differential is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Spot rate differential, Settle exchange rate, Initial exchange rate and Investment return blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Spot rate differential is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Initial exchange rate blank and the page solves for it, reporting Spot rate differential instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Spot rate differential keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/free-float', 'name' => 'Free float Calculator'],
            ['path' => '/finance/full-time-equivalent', 'name' => 'Full-time equivalent'],
            ['path' => '/finance/ffo', 'name' => 'Funds from operation (FFO) Calculator'],
        ],
        'authors' => [],
    ],
];
