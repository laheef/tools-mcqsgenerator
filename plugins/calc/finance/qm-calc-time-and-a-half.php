<?php

/**
 * Time and a half
 * /finance/time-and-a-half
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Time and a half',
    'meta' => ['title' => 'Time and a half — Formula, Steps & Examples', 'description' => 'Time and a half turns standard pay rate and standard hours worked into double time pay rate. Results come back in USD, with any other unit a click away.', 'h1' => 'Time and a half Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => 'Hourly pay rates',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'standardPayRate',
                            'label' => 'Standard pay rate',
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
                            'name' => 'timeAndAHalfRate',
                            'label' => 'Time and a half rate',
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
                            'name' => 'doubleTimePayRate',
                            'label' => 'Double time pay rate',
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
                            'name' => 'tripleTimePayRate',
                            'label' => 'Triple time pay rate',
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
        [
            'title' => 'Number of hours worked',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hoursWorkedStandard',
                            'label' => 'Standard hours worked',
                            'type' => 'number',
                            'suffix' => 'hours',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hoursWorkedForTimeAndAHalf',
                            'label' => 'Hours worked at time and a half ',
                            'type' => 'number',
                            'suffix' => 'hours',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hoursWorkedForDoubleTime',
                            'label' => 'Hours worked for double time',
                            'type' => 'number',
                            'suffix' => 'hours',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hoursWorkedForTripleTime',
                            'label' => 'Hours worked for triple time',
                            'type' => 'number',
                            'suffix' => 'hours',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Amount of money earned',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalPayForStandardHours',
                            'label' => 'Total pay for standard hours',
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
                            'name' => 'totalTimeAndAHalfPay',
                            'label' => 'Total time and a half pay',
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
                            'name' => 'totalDoubleTimePay',
                            'label' => 'Total double time pay',
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
                            'name' => 'tripleTimePay',
                            'label' => 'Total triple time pay',
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
                            'name' => 'totalAmountOfMoneyEarned',
                            'label' => 'Total amount of money earned',
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
            'title' => 'timeAndAHalfRate = standardPayRate + standardPayRate/2',
            'results' => ['timeAndAHalfRate' => '(3/2)*standardPayRate', 'standardPayRate' => '(2/3)*timeAndAHalfRate'],
        ],
        [
            'title' => 'doubleTimePayRate = standardPayRate * 2',
            'results' => ['standardPayRate' => '(1/2)*doubleTimePayRate', 'doubleTimePayRate' => '2*standardPayRate'],
        ],
        [
            'title' => 'tripleTimePayRate = standardPayRate * 3',
            'results' => ['tripleTimePayRate' => '3*standardPayRate', 'standardPayRate' => '(1/3)*tripleTimePayRate'],
        ],
        [
            'title' => 'totalPayForStandardHours = hoursWorkedStandard * standardPayRate',
            'results' => ['standardPayRate' => 'totalPayForStandardHours/hoursWorkedStandard', 'totalPayForStandardHours' => 'hoursWorkedStandard*standardPayRate', 'hoursWorkedStandard' => 'totalPayForStandardHours/standardPayRate'],
        ],
        [
            'title' => 'totalTimeAndAHalfPay =  hoursWorkedForTimeAndAHalf * timeAndAHalfRate',
            'results' => ['totalTimeAndAHalfPay' => 'hoursWorkedForTimeAndAHalf*timeAndAHalfRate', 'timeAndAHalfRate' => 'totalTimeAndAHalfPay/hoursWorkedForTimeAndAHalf', 'hoursWorkedForTimeAndAHalf' => 'totalTimeAndAHalfPay/timeAndAHalfRate'],
        ],
        [
            'title' => 'totalDoubleTimePay =  hoursWorkedForDoubleTime * doubleTimePayRate',
            'results' => ['hoursWorkedForDoubleTime' => 'totalDoubleTimePay/doubleTimePayRate', 'totalDoubleTimePay' => 'doubleTimePayRate*hoursWorkedForDoubleTime', 'doubleTimePayRate' => 'totalDoubleTimePay/hoursWorkedForDoubleTime'],
        ],
        [
            'title' => 'tripleTimePay =  hoursWorkedForTripleTime * tripleTimePayRate',
            'results' => ['tripleTimePayRate' => 'tripleTimePay/hoursWorkedForTripleTime', 'tripleTimePay' => 'hoursWorkedForTripleTime*tripleTimePayRate', 'hoursWorkedForTripleTime' => 'tripleTimePay/tripleTimePayRate'],
        ],
        [
            'title' => 'totalAmountOfMoneyEarned = totalPayForStandardHours +totalTimeAndAHalfPay  + totalDoubleTimePay + tripleTimePay',
            'results' => [
                'tripleTimePay' => 'totalAmountOfMoneyEarned - totalDoubleTimePay - totalPayForStandardHours - totalTimeAndAHalfPay',
                'totalAmountOfMoneyEarned' => 'totalDoubleTimePay + totalPayForStandardHours + totalTimeAndAHalfPay + tripleTimePay',
                'totalPayForStandardHours' => 'totalAmountOfMoneyEarned - totalDoubleTimePay - totalTimeAndAHalfPay - tripleTimePay',
                'totalDoubleTimePay' => 'totalAmountOfMoneyEarned - totalPayForStandardHours - totalTimeAndAHalfPay - tripleTimePay',
                'totalTimeAndAHalfPay' => 'totalAmountOfMoneyEarned - totalDoubleTimePay - totalPayForStandardHours - tripleTimePay',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Time and a half takes Standard pay rate and returns Time and a half rate and Double time pay rate. There is no hidden constant here: change time and a half rate and standard pay rate moves with it. The main result, Time and a half rate, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Time and a half calculator works', 'html' => <<<'TXT'
            <p>The Time and a half calculator applies one relationship to 1 number and reports Time and a half rate, Double time pay rate and Triple time pay rate.</p><p>Written with the labels from the form, Time and a half rate = (3 ÷ 2) × Standard pay rate.</p><p>The answers are Time and a half rate, Double time pay rate, Triple time pay rate and Standard hours worked; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Standard pay rate</strong> — in USD</li></ul><p>What you get back is Time and a half rate in USD, Double time pay rate in USD, Triple time pay rate in USD, Standard hours worked in hours, Hours worked at time and a half in hours, Hours worked for double time in hours, Hours worked for triple time in hours, Total pay for standard hours in USD, Total time and a half pay in USD, Total double time pay in USD, Total triple time pay in USD, Total amount of money earned in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Standard pay rate = 10 USD, Double time pay rate = 100 USD, Triple time pay rate = 1000 USD, Standard hours worked = 10 hours, Hours worked at time and a half = 100 hours, Hours worked for double time = 1000 hours, Hours worked for triple time = 10 hours, Total pay for standard hours = 100 USD, Total time and a half pay = 1000 USD, Total double time pay = 10 USD, Total triple time pay = 100 USD and Total amount of money earned = 1000 USD — through the same formula and the panel reports <strong>Time and a half rate</strong> = 15 USD.</p><ul><li><strong>Time and a half rate</strong> = 15 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Time and a half rate</strong> = <code>(3 ÷ 2) × Standard pay rate</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Time and a half rate</strong> = 15 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Time and a half rate takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Time and a half rate</strong> = <code>(3 ÷ 2) × Standard pay rate</code></li><li><strong>Standard pay rate</strong> = <code>(2 ÷ 3) × Time and a half rate</code></li><li><strong>Double time pay rate</strong> = <code>2 × Standard pay rate</code></li><li><strong>Triple time pay rate</strong> = <code>3 × Standard pay rate</code></li><li><strong>Total pay for standard hours</strong> = <code>Standard hours worked × Standard pay rate</code></li><li><strong>Standard hours worked</strong> = <code>Total pay for standard hours ÷ Standard pay rate</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Time and a half rate</strong> = <code>(3 ÷ 2) × Standard pay rate</code> — the form to use when Standard pay rate are the values you have.</li><li><strong>Standard pay rate</strong> = <code>(2 ÷ 3) × Time and a half rate</code> — the form to use when Time and a half rate are the values you have.</li><li><strong>Double time pay rate</strong> = <code>2 × Standard pay rate</code> — the form to use when Standard pay rate are the values you have.</li><li><strong>Standard pay rate</strong> = <code>(1 ÷ 2) × Double time pay rate</code> — the form to use when Double time pay rate are the values you have.</li><li><strong>Triple time pay rate</strong> = <code>3 × Standard pay rate</code> — the form to use when Standard pay rate are the values you have.</li><li><strong>Standard pay rate</strong> = <code>(1 ÷ 3) × Triple time pay rate</code> — the form to use when Triple time pay rate are the values you have.</li><li><strong>Total pay for standard hours</strong> = <code>Standard hours worked × Standard pay rate</code> — the form to use when Standard hours worked and Standard pay rate are the values you have.</li><li><strong>Standard pay rate</strong> = <code>Total pay for standard hours ÷ Standard hours worked</code> — the form to use when Total pay for standard hours and Standard hours worked are the values you have.</li></ul><p>Any one of Time and a half rate, Standard pay rate and Double time pay rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Standard pay rate from 10 to 20, leaving every other box alone. The panel moves from <strong>Time and a half rate</strong> 15 USD to <strong>Time and a half rate</strong> 30 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Time and a half rate, Double time pay rate and Triple time pay rate are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Standard pay rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Standard pay rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Standard pay rate is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Time and a half form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Standard pay rate</strong> takes a plain number with no unit attached. Change it and Time and a half rate, Double time pay rate and Triple time pay rate changes with it. Fill it from a measurement rather than a memory — Standard pay rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Standard pay rate ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Standard pay rate — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Time and a half rate in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Time and a half rate follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Standard pay rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Standard pay rate is what you already know and Time and a half rate and Double time pay rate is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/mega-millions-payout">Mega Millions payout</a>, <a href="/finance/mileage-reimbursement">Mileage reimbursement Calculator</a> and <a href="/finance/millionaire">Millionaire Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Time and a half is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Time and a half calculator work out?', 'a' => <<<'TXT'
            Time and a half rate, Double time pay rate, Triple time pay rate and Standard hours worked, from Standard pay rate. The relationship is Time and a half rate = (3 ÷ 2) × Standard pay rate.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Standard pay rate (USD). Enter standard pay rate; Time and a half rate is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Time and a half rate, Standard pay rate, Double time pay rate and Triple time pay rate blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Time and a half rate = 15 USD. Those are the defaults written into the form — move Standard pay rate and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Time and a half rate is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Standard pay rate blank and the page solves for it, reporting Time and a half rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Time and a half rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/mega-millions-payout', 'name' => 'Mega Millions payout'],
            ['path' => '/finance/mileage-reimbursement', 'name' => 'Mileage reimbursement Calculator'],
            ['path' => '/finance/millionaire', 'name' => 'Millionaire Calculator'],
        ],
        'authors' => [],
    ],
];
